<?php

namespace Tests\Feature;

use App\Models\HostingInvoice;
use App\Models\HostingPayment;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class HostingInvoicePaymentTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        config(['webia.midtrans.server_key' => 'test-key', 'webia.midtrans.is_production' => false]);
    }

    public function test_customer_can_start_payment_for_own_invoice(): void
    {
        Http::preventStrayRequests();
        Http::fake(['api.sandbox.midtrans.com/snap/v1/transactions' => Http::response(['token' => 'token', 'redirect_url' => 'https://sandbox.midtrans.com/pay/hosting'], 200)]);
        $invoice = HostingInvoice::factory()->create();

        $this->actingAs($invoice->service->user)
            ->post(route('hosting-invoices.pay', $invoice))
            ->assertRedirect('https://sandbox.midtrans.com/pay/hosting');

        $this->assertDatabaseHas('hosting_payments', ['hosting_invoice_id' => $invoice->id, 'status' => 'created']);
    }

    public function test_customer_cannot_pay_another_customers_invoice(): void
    {
        $invoice = HostingInvoice::factory()->create();

        $this->actingAs(User::factory()->create())
            ->post(route('hosting-invoices.pay', $invoice))
            ->assertNotFound();
    }

    public function test_valid_midtrans_notification_marks_invoice_paid_idempotently(): void
    {
        $invoice = HostingInvoice::factory()->create(['amount' => 150000, 'status' => 'overdue']);
        $payment = HostingPayment::factory()->create(['hosting_invoice_id' => $invoice->id]);
        $payload = [
            'order_id' => $payment->midtrans_order_id,
            'status_code' => '200',
            'gross_amount' => '150000',
            'transaction_status' => 'settlement',
        ];
        $payload['signature_key'] = hash('sha512', $payload['order_id'].$payload['status_code'].$payload['gross_amount'].'test-key');

        $this->postJson(route('payments.midtrans.notify'), $payload)->assertOk();
        $this->postJson(route('payments.midtrans.notify'), $payload)->assertOk();

        $this->assertSame('paid', $invoice->fresh()->status);
        $this->assertSame('paid', $payment->fresh()->status);
        $this->assertNotNull($invoice->fresh()->paid_at);
    }

    public function test_paid_free_and_cancelled_invoices_cannot_be_paid(): void
    {
        foreach (['paid', 'cancelled'] as $status) {
            $invoice = HostingInvoice::factory()->create(['status' => $status]);
            $this->actingAs($invoice->service->user)->post(route('hosting-invoices.pay', $invoice))->assertUnprocessable();
        }
    }

    public function test_midtrans_callback_redirects_hosting_payment_to_its_invoice(): void
    {
        Http::fake(['api.sandbox.midtrans.com/v2/*/status' => Http::response(['transaction_status' => 'pending'], 200)]);
        $payment = HostingPayment::factory()->create();

        $this->get(route('payments.midtrans.callback', ['order_id' => $payment->midtrans_order_id]))
            ->assertRedirect(route('hosting-invoices.show', $payment->hosting_invoice_id));
    }

    public function test_customer_can_complete_local_hosting_payment_simulation(): void
    {
        config(['webia.midtrans.server_key' => null, 'app.env' => 'local']);
        $payment = HostingPayment::factory()->create();

        $this->actingAs($payment->invoice->service->user)
            ->post(route('payments.midtrans.hosting.simulate.pay', $payment))
            ->assertRedirect(route('hosting-invoices.show', $payment->hosting_invoice_id));

        $this->assertSame('paid', $payment->fresh()->status);
        $this->assertSame('paid', $payment->invoice->fresh()->status);
    }

    public function test_hosting_simulate_page_and_pay_are_absent_in_production_without_server_key(): void
    {
        config(['app.env' => 'production', 'webia.midtrans.server_key' => null]);
        $payment = HostingPayment::factory()->create();
        $user = $payment->invoice->service->user;

        $this->actingAs($user)->get(route('payments.midtrans.hosting.simulate', $payment))->assertNotFound();
        $this->actingAs($user)->post(route('payments.midtrans.hosting.simulate.pay', $payment))->assertNotFound();
        $this->assertSame('created', $payment->fresh()->status);
    }
}
