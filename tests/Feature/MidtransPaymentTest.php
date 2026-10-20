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
    }

    public function test_payment_is_reused_while_still_pending(): void
    {
        $order = WebiaOrder::factory()->create(['status' => 'awaiting_payment']);
        $payment = WebiaPayment::factory()->create(['webia_order_id' => $order->id, 'midtrans_order_id' => 'WEB-'.$order->id.'-01']);

        $this->actingAs($order->user)->post(route('orders.pay', $order))->assertRedirect($payment->snap_redirect_url);

        $this->assertSame(1, $order->payments()->count());
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
