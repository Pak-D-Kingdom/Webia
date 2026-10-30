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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Queue;
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
        $this->assertSame('paid', $order->status);
        // Queue sync: job langsung dieksekusi, status final dan password plaintext bersih.
        $this->assertSame('sent', $order->credential_status);
        $this->assertNull(DB::table('webia_orders')->where('id', $order->id)->value('credential_password'));

        Mail::assertSent(AccountCredentialsMail::class, function (AccountCredentialsMail $mail) use ($order, $user): bool {
            $this->assertNotNull($mail->plainPassword);
            $this->assertTrue($mail->hasTo('zainul@example.com'));
            $this->assertTrue($mail->order->is($order));
            // Password acak yang dikirim memang bisa dipakai login.
            $this->assertTrue(password_verify($mail->plainPassword, $user->password));

            return true;
        });
    }

    public function test_settlement_reuses_existing_account_without_changing_password(): void
    {
        Mail::fake();
        $existing = User::factory()->create(['email' => 'zainul@example.com', 'password' => 'password123']);
        $order = $this->createGuestOrder(['guest_name' => 'Zainul', 'guest_email' => 'zainul@example.com']);

        $this->notifySettlement($order->payments()->firstOrFail());

        $order->refresh();
        $this->assertSame($existing->id, $order->user_id);
        $this->assertSame(1, User::where('email', 'zainul@example.com')->count());
        $this->assertTrue(password_verify('password123', $existing->fresh()->password));
        // Akun lama tanpa password baru: email hanya pemberitahuan.
        $this->assertNull(DB::table('webia_orders')->where('id', $order->id)->value('credential_password'));
        Mail::assertSent(AccountCredentialsMail::class, fn (AccountCredentialsMail $mail): bool => $mail->plainPassword === null
            && $mail->hasTo('zainul@example.com'));
    }

    public function test_job_clears_encrypted_password_after_sent_and_is_idempotent(): void
    {
        Queue::fake();
        Mail::fake();
        $order = $this->createGuestOrder();
        app(AccountProvisioner::class)->provision($order, false);
        $order->refresh();
        $this->assertNotNull($order->user_id);
        $this->assertNotNull($order->credential_password);
        $this->assertSame('queued', $order->credential_status);

        $plainPassword = $order->credential_password;
        // Plaintext hanya tersimpan terenkripsi, bukan polos.
        $this->assertNotSame($plainPassword, (string) DB::table('webia_orders')->where('id', $order->id)->value('credential_password'));

        (new SendOrderCredentials($order->id))->handle(app(AccountProvisioner::class));
        $order->refresh();
        $this->assertSame('sent', $order->credential_status);
        $this->assertNull($order->credential_password);

        // Dipanggil ulang tidak mengirim email kedua.
        Mail::assertSentCount(1);
        (new SendOrderCredentials($order->id))->handle(app(AccountProvisioner::class));
        Mail::assertSentCount(1);
    }

    public function test_failed_job_marks_credential_failed_for_admin_awareness(): void
    {
        $order = $this->createGuestOrder();

        (new SendOrderCredentials($order->id))->failed(new \RuntimeException('SMTP keluar'));

        $this->assertSame('failed', $order->fresh()->credential_status);
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
        // Sync queue: email terkirim segera, plaintext password dihapus setelah sukses.
        $this->assertSame('sent', $order->credential_status);
        $this->assertNull($order->credential_password);
        Mail::assertSent(AccountCredentialsMail::class, fn (AccountCredentialsMail $mail): bool => $mail->hasTo('zainul@example.com')
            && $mail->plainPassword !== null
            && password_verify($mail->plainPassword, $user->password));
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
