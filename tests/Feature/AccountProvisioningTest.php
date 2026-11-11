<?php

namespace Tests\Feature;

use App\Jobs\SendOrderCredentials;
use App\Mail\AccountCredentialsMail;
use App\Mail\OrderStatusMail;
use App\Models\User;
use App\Models\WebiaOrder;
use App\Models\WebiaPayment;
use App\Services\AccountProvisioner;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;

class AccountProvisioningTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        config(['webia.midtrans.server_key' => 'SB-Mid-server-test-key']);
        config(['webia.midtrans.is_production' => false]);
    }

    public function test_settlement_creates_account_and_sends_credentials_email(): void
    {
        Mail::fake();
        $order = $this->createGuestOrder(['guest_name' => 'Zainul', 'guest_email' => 'zainul@example.com']);

        $this->notifySettlement($order->payments()->firstOrFail());

        $order->refresh();
        $user = User::where('email', 'zainul@example.com')->firstOrFail();
        $this->assertSame($user->id, $order->user_id);
        $this->assertTrue($user->hasVerifiedEmail());
        $this->assertSame('paid', $order->status);
        $this->assertSame('sent', $order->credential_status);
        $this->assertFalse(Schema::hasColumn('webia_orders', 'credential_password'));

        Mail::assertSent(AccountCredentialsMail::class, function (AccountCredentialsMail $mail) use ($order): bool {
            $this->assertTrue($mail->hasTo('zainul@example.com'));
            $this->assertTrue($mail->order->is($order));
            $this->assertNotNull($mail->passwordSetupUrl);

            return true;
        });
    }

    public function test_settlement_keeps_existing_account_password_and_sends_order_notice(): void
    {
        Mail::fake();
        $existing = User::factory()->create(['email' => 'zainul@example.com', 'password' => 'password-lama-rahasia']);
        $originalPassword = $existing->password;
        $order = $this->createGuestOrder(['guest_name' => 'Zainul', 'guest_email' => 'zainul@example.com']);

        $this->notifySettlement($order->payments()->firstOrFail());

        $order->refresh();
        $this->assertSame($existing->id, $order->user_id);
        $this->assertSame(1, User::where('email', 'zainul@example.com')->count());
        $this->assertSame($originalPassword, $existing->fresh()->password);
        Mail::assertSent(AccountCredentialsMail::class, fn (AccountCredentialsMail $mail): bool => $mail->passwordSetupUrl === null
            && $mail->hasTo('zainul@example.com'));
    }

    public function test_job_sends_password_setup_link_without_persisting_plaintext_and_is_idempotent(): void
    {
        Queue::fake();
        Mail::fake();
        $order = $this->createGuestOrder();
        app(AccountProvisioner::class)->provision($order, false);
        $order->refresh();
        $this->assertNotNull($order->user_id);
        $this->assertSame('queued', $order->credential_status);
        $this->assertFalse(Schema::hasColumn('webia_orders', 'credential_password'));

        (new SendOrderCredentials($order->id))->handle(app(AccountProvisioner::class));
        $order->refresh();
        $this->assertSame('sent', $order->credential_status);
        Mail::assertSent(AccountCredentialsMail::class, fn (AccountCredentialsMail $mail): bool => $mail->passwordSetupUrl !== null);

        Mail::assertSentCount(1);
        (new SendOrderCredentials($order->id))->handle(app(AccountProvisioner::class));
        Mail::assertSentCount(1);
    }

    public function test_new_customer_can_set_password_from_provisioning_link(): void
    {
        Mail::fake();
        $order = $this->createGuestOrder();

        $this->notifySettlement($order->payments()->firstOrFail());

        $user = User::where('email', 'zainul@example.com')->firstOrFail();
        $passwordSetupUrl = null;
        Mail::assertSent(AccountCredentialsMail::class, function (AccountCredentialsMail $mail) use (&$passwordSetupUrl): bool {
            $passwordSetupUrl = $mail->passwordSetupUrl;

            return $passwordSetupUrl !== null;
        });
        parse_str((string) parse_url($passwordSetupUrl, PHP_URL_QUERY), $query);
        $token = basename((string) parse_url($passwordSetupUrl, PHP_URL_PATH));

        $this->post(route('password.store'), [
            'token' => $token,
            'email' => $query['email'],
            'password' => 'password-baru-aman',
            'password_confirmation' => 'password-baru-aman',
        ])->assertRedirect(route('login'));

        $this->assertTrue(Hash::check('password-baru-aman', $user->fresh()->password));
    }

    public function test_failed_job_retry_keeps_password_setup_link_for_new_account(): void
    {
        Queue::fake();
        Mail::fake();
        $order = $this->createGuestOrder();
        app(AccountProvisioner::class)->provision($order, false);
        $job = new SendOrderCredentials($order->id);

        $job->failed(new \RuntimeException('SMTP keluar'));
        app(AccountProvisioner::class)->provision($order->fresh(), false);
        $job->handle(app(AccountProvisioner::class));

        $this->assertSame('sent', $order->fresh()->credential_status);
        Mail::assertSent(AccountCredentialsMail::class, fn (AccountCredentialsMail $mail): bool => $mail->passwordSetupUrl !== null);
    }

    public function test_status_polling_does_not_provision_before_payment(): void
    {
        Queue::fake();
        Mail::fake();
        $order = $this->createGuestOrder();

        $this->getJson($this->paymentStatusUrl($order))
            ->assertOk()
            ->assertJson(['status' => 'created', 'credential_status' => 'pending']);

        // Akun & job email hanya dipicu setelah pembayaran terkonfirmasi, bukan tiap polling.
        $this->assertDatabaseCount('users', 0);
        $this->assertNull($order->fresh()->user_id);
        Queue::assertNothingPushed();
    }

    public function test_signed_payment_status_exposes_credential_state(): void
    {
        Mail::fake();
        $order = $this->createGuestOrder();
        $payment = $order->payments()->firstOrFail();

        $this->getJson($this->paymentStatusUrl($order))
            ->assertOk()
            ->assertJson([
                'status' => 'created',
                'credential_status' => 'pending',
                'email' => 'zainul@example.com',
            ]);

        $this->notifySettlement($payment);
        $order->refresh();

        $this->getJson($this->paymentStatusUrl($order))
            ->assertOk()
            ->assertJson([
                'status' => 'paid',
                'terminal' => true,
                'credential_status' => 'sent',
                'email' => 'zainul@example.com',
            ]);
    }

    public function test_admin_transfer_approval_provisions_guest_account(): void
    {
        Mail::fake();
        $admin = User::factory()->create(['role' => 'admin']);
        $order = $this->createGuestOrder(['status' => 'payment_uploaded', 'guest_name' => 'Zainul', 'guest_email' => 'zainul@example.com']);

        $this->actingAs($admin)
            ->post(route('admin.orders.verify', ['order' => $order]), ['action' => 'approve'])
            ->assertRedirect(route('admin.orders.show', $order));

        $order->refresh();
        $user = User::where('email', 'zainul@example.com')->firstOrFail();
        $this->assertSame($user->id, $order->user_id);
        $this->assertSame('sent', $order->credential_status);
        Mail::assertSent(AccountCredentialsMail::class, fn (AccountCredentialsMail $mail): bool => $mail->hasTo('zainul@example.com')
            && $mail->passwordSetupUrl !== null);
    }

    public function test_admin_reject_keeps_awaiting_without_account(): void
    {
        Mail::fake();
        $admin = User::factory()->create(['role' => 'admin']);
        $order = $this->createGuestOrder(['status' => 'payment_uploaded']);

        $this->actingAs($admin)
            ->post(route('admin.orders.verify', ['order' => $order]), ['action' => 'reject', 'note' => 'Bukti tidak valid'])
            ->assertRedirect(route('admin.orders.show', $order));

        $order->refresh();
        $this->assertSame('rejected', $order->status);
        $this->assertNull($order->user_id);
        $this->assertSame('pending', $order->credential_status);
        $this->assertDatabaseCount('users', 1); // hanya admin
        Mail::assertSent(OrderStatusMail::class);
    }

    public function test_repeated_settlements_do_not_duplicate_credentials(): void
    {
        Mail::fake();
        $order = $this->createGuestOrder();
        $payment = $order->payments()->firstOrFail();

        $this->notifySettlement($payment);
        $this->notifySettlement($payment);

        $this->assertSame(1, $order->logs()->where('to_status', 'paid')->count());
        Mail::assertSent(AccountCredentialsMail::class, 1);
    }

    private function createGuestOrder(array $attributes = []): WebiaOrder
    {
        Http::fake([
            'api.sandbox.midtrans.com/snap/v1/transactions' => Http::response([
                'token' => 'snap-token',
                'redirect_url' => 'https://sandbox.midtrans.com/pay/abc',
            ]),
        ]);

        $order = WebiaOrder::factory()->make(array_merge([
            'user_id' => null,
            'guest_name' => $attributes['guest_name'] ?? 'Zainul',
            'guest_email' => $attributes['guest_email'] ?? 'zainul@example.com',
            'credential_status' => 'pending',
        ], $attributes));

        $order->save();
        // Factory payment membuat order+user sendiri; order guest ditepaskan tanpa entri tambahan.
        WebiaPayment::create([
            'webia_order_id' => $order->id,
            'midtrans_order_id' => 'WEB-'.$order->id.'-01',
            'status' => 'created',
            'expires_at' => now()->addHours(24),
        ]);

        return $order;
    }

    private function notifySettlement(WebiaPayment $payment): void
    {
        $payload = [
            'order_id' => $payment->midtrans_order_id,
            'status_code' => '200',
            'gross_amount' => (string) $payment->order->total_price,
            'transaction_status' => 'settlement',
        ];

        $this->postJson(route('payments.midtrans.notify'), $payload + [
            'signature_key' => hash('sha512', $payload['order_id'].$payload['status_code'].$payload['gross_amount'].'SB-Mid-server-test-key'),
        ])->assertOk();
    }

    private function paymentStatusUrl(WebiaOrder $order): string
    {
        return URL::temporarySignedRoute('orders.payment-status', now()->addDay(), ['order' => $order]);
    }
}
