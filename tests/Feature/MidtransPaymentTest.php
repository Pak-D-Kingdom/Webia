<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\WebiaOrder;
use App\Models\WebiaPayment;
use App\Services\Midtrans;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class MidtransPaymentTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        config(['webia.midtrans.server_key' => 'SB-Mid-server-test-key']);
        config(['webia.midtrans.is_production' => false]);
    }

    public function test_signature_is_verified_against_server_key(): void
    {
        $midtrans = app(Midtrans::class);

        $valid = hash('sha512', 'WEB-1-01200499000SB-Mid-server-test-key');

        $this->assertTrue($midtrans->signatureValid('WEB-1-01', '200', '499000', $valid));
        $this->assertFalse($midtrans->signatureValid('WEB-1-01', '200', '499000', 'salah'));
    }

    public function test_signature_fails_without_server_key(): void
    {
        config(['webia.midtrans.server_key' => null]);
        $midtrans = app(Midtrans::class);

        $this->assertFalse($midtrans->signatureValid('WEB-1-01', '200', '499000', 'apa-pun'));
    }

    public function test_customer_can_start_midtrans_payment(): void
    {
        Http::fake([
            'api.sandbox.midtrans.com/snap/v1/transactions' => Http::response(['token' => 'snap-token-1', 'redirect_url' => 'https://sandbox.midtrans.com/pay/abc'], 200),
        ]);

        $order = WebiaOrder::factory()->create(['status' => 'awaiting_payment']);

        $this->actingAs($order->user)
            ->post(route('orders.pay', $order))
            ->assertRedirect('https://sandbox.midtrans.com/pay/abc');

        $this->assertDatabaseHas('webia_payments', [
            'webia_order_id' => $order->id,
            'midtrans_order_id' => 'WEB-'.$order->id.'-01',
            'status' => 'created',
        ]);

        $payment = $order->payments()->first();
        $this->assertTrue($payment->expires_at->greaterThan(now()->addHours(23)));
        $this->assertTrue($payment->expires_at->lessThan(now()->addHours(25)));
    }

    public function test_payment_is_reused_while_still_pending(): void
    {
        $order = WebiaOrder::factory()->create(['status' => 'awaiting_payment']);
        $payment = WebiaPayment::factory()->create(['webia_order_id' => $order->id, 'midtrans_order_id' => 'WEB-'.$order->id.'-01']);

        $this->actingAs($order->user)->post(route('orders.pay', $order))->assertRedirect($payment->snap_redirect_url);

        $this->assertSame(1, $order->payments()->count());
    }

    public function test_expired_payment_session_is_replaced_by_a_new_one(): void
    {
        Http::fake([
            'api.sandbox.midtrans.com/snap/v1/transactions' => Http::response(['token' => 'snap-token-2', 'redirect_url' => 'https://sandbox.midtrans.com/pay/new'], 200),
        ]);

        $order = WebiaOrder::factory()->create(['status' => 'awaiting_payment']);
        $expiredPayment = WebiaPayment::factory()->create([
            'webia_order_id' => $order->id,
            'midtrans_order_id' => 'WEB-'.$order->id.'-01',
            'expires_at' => now()->subMinute(),
        ]);

        $this->actingAs($order->user)
            ->post(route('orders.pay', $order))
            ->assertRedirect('https://sandbox.midtrans.com/pay/new');

        $this->assertSame('superseded', $expiredPayment->fresh()->status);
        $this->assertSame('WEB-'.$order->id.'-02', $order->payments()->latest('id')->first()->midtrans_order_id);
        $this->assertSame(2, $order->payments()->count());
    }

    public function test_superseded_payment_can_settle_then_repeated_notification_is_idempotent(): void
    {
        Http::fake([
            'api.sandbox.midtrans.com/snap/v1/transactions' => Http::response(['token' => 'snap-token-2', 'redirect_url' => 'https://sandbox.midtrans.com/pay/new'], 200),
        ]);

        $order = WebiaOrder::factory()->create(['status' => 'awaiting_payment']);
        $oldPayment = WebiaPayment::factory()->create([
            'webia_order_id' => $order->id,
            'midtrans_order_id' => 'WEB-'.$order->id.'-01',
            'expires_at' => now()->subMinute(),
        ]);

        $this->actingAs($order->user)->post(route('orders.pay', $order));
        $newPayment = $order->payments()->latest('id')->firstOrFail();

        $oldPayload = ['order_id' => $oldPayment->midtrans_order_id, 'status_code' => '200', 'gross_amount' => '499000', 'transaction_status' => 'settlement'];
        $this->postJson(route('payments.midtrans.notify'), $oldPayload + ['signature_key' => $this->signature($oldPayload)])->assertOk();
        $this->postJson(route('payments.midtrans.notify'), $oldPayload + ['signature_key' => $this->signature($oldPayload)])->assertOk();

        $this->assertSame('paid', $oldPayment->fresh()->status);
        $this->assertSame('paid', $order->fresh()->status);
        $this->assertSame(1, $order->logs()->where('to_status', 'paid')->count());

        $newPayload = ['order_id' => $newPayment->midtrans_order_id, 'status_code' => '200', 'gross_amount' => '499000', 'transaction_status' => 'settlement'];
        $this->postJson(route('payments.midtrans.notify'), $newPayload + ['signature_key' => $this->signature($newPayload)])->assertOk();
        $this->postJson(route('payments.midtrans.notify'), $newPayload + ['signature_key' => $this->signature($newPayload)])->assertOk();

        $this->assertSame('duplicate', $newPayment->fresh()->status);
        $this->assertSame(1, $order->logs()->where('note', 'like', 'Dibayar via Midtrans%')->count());
        $this->assertSame(1, $order->logs()->where('note', 'like', 'Pembayaran ganda%')->count());
    }

    public function test_failed_replacement_keeps_unknown_transaction_for_late_settlement(): void
    {
        Http::fake([
            'api.sandbox.midtrans.com/snap/v1/transactions' => Http::failedConnection(),
        ]);
        config(['webia.midtrans.server_key' => 'SB-Mid-server-test-key']);

        $order = WebiaOrder::factory()->create(['status' => 'awaiting_payment']);
        $oldPayment = WebiaPayment::factory()->create([
            'webia_order_id' => $order->id,
            'midtrans_order_id' => 'WEB-'.$order->id.'-01',
            'expires_at' => now()->subMinute(),
        ]);

        $this->actingAs($order->user)
            ->post(route('orders.pay', $order))
            ->assertSessionHas('status', 'Pembayaran Midtrans gagal dibuat. Coba lagi sebentar.');

        $unknownPayment = $order->payments()->latest('id')->firstOrFail();
        $this->assertSame('created', $oldPayment->fresh()->status);
        $this->assertNull($unknownPayment->snap_token);
        $this->assertNull($unknownPayment->snap_redirect_url);
        $this->assertSame(2, $order->payments()->count());

        $payload = ['order_id' => $unknownPayment->midtrans_order_id, 'status_code' => '200', 'gross_amount' => '499000', 'transaction_status' => 'settlement'];
        $this->postJson(route('payments.midtrans.notify'), $payload + ['signature_key' => $this->signature($payload)])->assertOk();

        $this->assertSame('paid', $unknownPayment->fresh()->status);
        $this->assertSame('paid', $order->fresh()->status);
    }

    public function test_payment_without_redirect_url_is_not_reused(): void
    {
        Http::fake([
            'api.sandbox.midtrans.com/snap/v1/transactions' => Http::response(['token' => 'snap-token-3', 'redirect_url' => 'https://sandbox.midtrans.com/pay/retry'], 200),
        ]);

        $order = WebiaOrder::factory()->create(['status' => 'awaiting_payment']);
        WebiaPayment::factory()->create([
            'webia_order_id' => $order->id,
            'midtrans_order_id' => 'WEB-'.$order->id.'-01',
            'snap_token' => null,
            'snap_redirect_url' => null,
        ]);

        $this->actingAs($order->user)
            ->post(route('orders.pay', $order))
            ->assertRedirect('https://sandbox.midtrans.com/pay/retry');

        $this->assertSame(2, $order->payments()->count());
        $this->assertSame('WEB-'.$order->id.'-02', $order->payments()->latest('id')->firstOrFail()->midtrans_order_id);
    }

    public function test_pay_requires_ownership(): void
    {
        $order = WebiaOrder::factory()->create(['status' => 'awaiting_payment']);
        $other = User::factory()->create();

        $this->actingAs($other)->post(route('orders.pay', $order))->assertNotFound();
    }

    public function test_pay_rejects_orders_that_are_not_awaiting_payment(): void
    {
        $order = WebiaOrder::factory()->create(['status' => 'paid']);

        $this->actingAs($order->user)->post(route('orders.pay', $order))->assertUnprocessable();
    }

    public function test_without_server_key_payment_is_simulated_locally(): void
    {
        config(['webia.midtrans.server_key' => null]);
        $order = WebiaOrder::factory()->create(['status' => 'awaiting_payment']);

        $this->actingAs($order->user)
            ->post(route('orders.pay', $order))
            ->assertRedirect(route('payments.midtrans.simulate', ['payment' => WebiaPayment::where('webia_order_id', $order->id)->first() ?? 0]));

        $payment = $order->payments()->first();
        $this->assertSame('created', $payment->status);
        $this->assertStringStartsWith('fake-', (string) $payment->snap_token);
    }

    public function test_simulate_page_and_pay_are_absent_when_server_key_exists(): void
    {
        $payment = WebiaPayment::factory()->create();

        $this->actingAs($payment->order->user)->get(route('payments.midtrans.simulate', $payment))->assertNotFound();
    }

    public function test_notification_marks_order_paid(): void
    {
        $order = WebiaOrder::factory()->create(['status' => 'awaiting_payment']);
        $payment = WebiaPayment::factory()->create(['webia_order_id' => $order->id, 'midtrans_order_id' => 'WEB-'.$order->id.'-01']);

        $payload = ['order_id' => 'WEB-'.$order->id.'-01', 'status_code' => '200', 'gross_amount' => '499000', 'transaction_status' => 'settlement'];

        $this->postJson(route('payments.midtrans.notify'), $payload + ['signature_key' => $this->signature($payload)])
            ->assertOk();

        $payment->refresh();
        $this->assertSame('paid', $payment->status);
        $this->assertNotNull($payment->paid_at);
        $order->refresh();
        $this->assertSame('paid', $order->status);
        $this->assertNotNull($order->paid_at);
        $this->assertDatabaseHas('webia_order_logs', [
            'webia_order_id' => $order->id,
            'from_status' => 'awaiting_payment',
            'to_status' => 'paid',
            'actor_id' => null,
        ]);
    }

    public function test_notification_rejects_invalid_signature(): void
    {
        $order = WebiaOrder::factory()->create(['status' => 'awaiting_payment']);
        WebiaPayment::factory()->create(['webia_order_id' => $order->id, 'midtrans_order_id' => 'WEB-'.$order->id.'-01']);

        $this->postJson(route('payments.midtrans.notify'), [
            'order_id' => 'WEB-'.$order->id.'-01',
            'status_code' => '200',
            'gross_amount' => '499000',
            'transaction_status' => 'settlement',
            'signature_key' => 'palintet',
        ])->assertForbidden();

        $this->assertSame('awaiting_payment', $order->fresh()->status);
    }

    public function test_notification_rejects_amount_mismatch(): void
    {
        $order = WebiaOrder::factory()->create(['status' => 'awaiting_payment']);
        WebiaPayment::factory()->create(['webia_order_id' => $order->id, 'midtrans_order_id' => 'WEB-'.$order->id.'-01']);

        $payload = ['order_id' => 'WEB-'.$order->id.'-01', 'status_code' => '200', 'gross_amount' => '1000', 'transaction_status' => 'settlement'];

        $this->postJson(route('payments.midtrans.notify'), $payload + ['signature_key' => $this->signature($payload)])
            ->assertBadRequest();

        $this->assertSame('created', $order->payments()->first()->status);
        $this->assertSame('awaiting_payment', $order->fresh()->status);
    }

    public function test_notification_rejects_merchant_id_mismatch(): void
    {
        config(['webia.midtrans.merchant_id' => 'G12345']);
        $order = WebiaOrder::factory()->create(['status' => 'awaiting_payment']);
        WebiaPayment::factory()->create(['webia_order_id' => $order->id, 'midtrans_order_id' => 'WEB-'.$order->id.'-01']);

        $payload = ['order_id' => 'WEB-'.$order->id.'-01', 'status_code' => '200', 'gross_amount' => '499000', 'transaction_status' => 'settlement', 'merchant_id' => 'G99999'];

        $this->postJson(route('payments.midtrans.notify'), $payload + ['signature_key' => $this->signature($payload)])
            ->assertBadRequest();

        $this->assertSame('awaiting_payment', $order->fresh()->status);
    }

    public function test_duplicate_settlement_is_flagged_for_admin_refund(): void
    {
        $order = WebiaOrder::factory()->create(['status' => 'awaiting_payment']);
        $first = WebiaPayment::factory()->create(['webia_order_id' => $order->id, 'midtrans_order_id' => 'WEB-'.$order->id.'-01']);
        $second = WebiaPayment::factory()->create(['webia_order_id' => $order->id, 'midtrans_order_id' => 'WEB-'.$order->id.'-02']);

        $firstPayload = ['order_id' => 'WEB-'.$order->id.'-01', 'status_code' => '200', 'gross_amount' => '499000', 'transaction_status' => 'settlement'];
        $this->postJson(route('payments.midtrans.notify'), $firstPayload + ['signature_key' => $this->signature($firstPayload)])->assertOk();

        $secondPayload = ['order_id' => 'WEB-'.$order->id.'-02', 'status_code' => '200', 'gross_amount' => '499000', 'transaction_status' => 'settlement'];
        $this->postJson(route('payments.midtrans.notify'), $secondPayload + ['signature_key' => $this->signature($secondPayload, 'WEB-'.$order->id.'-02')])->assertOk();

        $order->refresh();
        $this->assertSame('paid', $order->status);
        $this->assertSame('paid', $first->fresh()->status);
        $this->assertSame('duplicate', $second->fresh()->status);
        $this->assertDatabaseHas('webia_order_logs', [
            'webia_order_id' => $order->id,
            'note' => 'Pembayaran ganda (WEB-'.$order->id.'-02) terdeteksi — perlu refund manual admin.',
        ]);
    }

    public function test_notification_is_idempotent(): void
    {
        $order = WebiaOrder::factory()->create(['status' => 'awaiting_payment']);
        WebiaPayment::factory()->create(['webia_order_id' => $order->id, 'midtrans_order_id' => 'WEB-'.$order->id.'-01']);

        $payload = ['order_id' => 'WEB-'.$order->id.'-01', 'status_code' => '200', 'gross_amount' => '499000', 'transaction_status' => 'settlement'];

        $signed = fn (): array => $payload + ['signature_key' => $this->signature($payload)];

        $this->postJson(route('payments.midtrans.notify'), $signed())->assertOk();
        $this->postJson(route('payments.midtrans.notify'), $signed())->assertOk();

        $this->assertSame('paid', WebiaOrder::find($order->id)->status);
        $this->assertSame(1, $order->logs()->where('to_status', 'paid')->count());
    }

    public function test_notification_records_failure_without_marking_order_paid(): void
    {
        $order = WebiaOrder::factory()->create(['status' => 'awaiting_payment']);
        WebiaPayment::factory()->create(['webia_order_id' => $order->id, 'midtrans_order_id' => 'WEB-'.$order->id.'-01']);

        $payload = ['order_id' => 'WEB-'.$order->id.'-01', 'status_code' => '200', 'gross_amount' => '499000', 'transaction_status' => 'cancel'];

        $this->postJson(route('payments.midtrans.notify'), $payload + ['signature_key' => $this->signature($payload)])->assertOk();

        $this->assertSame('failed', $order->payments()->first()->status);
        $this->assertSame('awaiting_payment', $order->fresh()->status);
    }

    public function test_notification_for_unknown_payment_is_not_found(): void
    {
        $payload = ['order_id' => 'WEB-999-01', 'status_code' => '200', 'gross_amount' => '499000', 'transaction_status' => 'settlement'];

        $this->postJson(route('payments.midtrans.notify'), $payload + ['signature_key' => $this->signature($payload, 'SB-Mid-server-test-key')])->assertNotFound();
    }

    public function test_check_status_confirms_paid_order_via_status_api(): void
    {
        $order = WebiaOrder::factory()->create(['status' => 'awaiting_payment']);
        WebiaPayment::factory()->create(['webia_order_id' => $order->id, 'midtrans_order_id' => 'WEB-'.$order->id.'-01']);

        Http::fake([
            'api.sandbox.midtrans.com/v2/WEB-'.$order->id.'-01/status' => Http::response(['transaction_status' => 'settlement', 'status_code' => '200', 'gross_amount' => '499000'], 200),
        ]);

        $this->actingAs($order->user)
            ->post(route('orders.pay.check', $order))
            ->assertRedirect(route('orders.show', $order));

        $this->assertSame('paid', $order->fresh()->status);
    }

    public function test_check_status_without_payment_redirects_with_notice(): void
    {
        $order = WebiaOrder::factory()->create(['status' => 'awaiting_payment']);

        $this->actingAs($order->user)
            ->post(route('orders.pay.check', $order))
            ->assertRedirect(route('orders.show', $order))
            ->assertSessionHas('status', 'Belum ada pembayaran Midtrans untuk dicek.');
    }

    public function test_callback_redirects_to_order_page(): void
    {
        $order = WebiaOrder::factory()->create(['status' => 'awaiting_payment']);
        WebiaPayment::factory()->create(['webia_order_id' => $order->id, 'midtrans_order_id' => 'WEB-'.$order->id.'-01', 'snap_redirect_url' => 'https://sandbox.midtrans.com/pay/abc']);

        Http::fake([
            'api.sandbox.midtrans.com/v2/WEB-'.$order->id.'-01/status' => Http::response(['transaction_status' => 'settlement', 'status_code' => '200', 'gross_amount' => '499000'], 200),
        ]);

        $this->get(route('payments.midtrans.callback', ['order_id' => 'WEB-'.$order->id.'-01']))
            ->assertRedirect(route('orders.show', $order));

        $this->assertSame('paid', $order->fresh()->status);
    }

    private function signature(array $payload): string
    {
        return hash('sha512', $payload['order_id'].$payload['status_code'].$payload['gross_amount'].'SB-Mid-server-test-key');
    }
}
