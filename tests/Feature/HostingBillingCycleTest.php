<?php

namespace Tests\Feature;

use App\Models\HostingInvoice;
use App\Models\HostingService;
use App\Models\User;
use App\Services\HostingBilling;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HostingBillingCycleTest extends TestCase
{
    use RefreshDatabase;

    public function test_activation_creates_a_paid_free_invoice_once(): void
    {
        $this->travelTo('2026-01-31 08:00:00');
        $service = HostingService::factory()->create([
            'activation_date' => '2026-01-31',
            'billing_cycle_day' => 31,
            'billing_status' => 'scheduled',
        ]);

        app(HostingBilling::class)->processToday();
        app(HostingBilling::class)->processToday();

        $invoice = HostingInvoice::sole();
        $this->assertSame('Bulan Pertama Gratis', $invoice->label);
        $this->assertSame(0, $invoice->amount);
        $this->assertSame('paid', $invoice->status);
        $this->assertSame('2026-01-31', $invoice->period_start->toDateString());
        $this->assertSame('2026-02-27', $invoice->period_end->toDateString());
        $this->assertSame('active', $service->fresh()->billing_status);
    }

    public function test_cycle_day_returns_after_a_short_month(): void
    {
        $this->travelTo('2026-03-31 08:00:00');
        $service = HostingService::factory()->create([
            'activation_date' => '2026-01-31',
            'billing_cycle_day' => 31,
            'billing_status' => 'active',
            'monthly_price' => 150000,
        ]);
        HostingInvoice::factory()->create([
            'hosting_service_id' => $service->id,
            'period_start' => '2026-01-31',
            'period_end' => '2026-02-27',
            'amount' => 0,
            'status' => 'paid',
        ]);
        HostingInvoice::factory()->create([
            'hosting_service_id' => $service->id,
            'period_start' => '2026-02-28',
            'period_end' => '2026-03-30',
            'amount' => 150000,
        ]);

        app(HostingBilling::class)->processToday();

        $invoice = HostingInvoice::whereDate('period_start', '2026-03-31')->sole();
        $this->assertSame('2026-04-29', $invoice->period_end->toDateString());
        $this->assertSame(150000, $invoice->amount);
        $this->assertSame('2026-04-07', $invoice->due_at->toDateString());
    }

    public function test_stopped_service_does_not_receive_a_new_invoice(): void
    {
        $this->travelTo('2026-03-10 08:00:00');
        HostingService::factory()->create([
            'activation_date' => '2026-01-10',
            'billing_cycle_day' => 10,
            'stopped_at' => '2026-03-10',
            'billing_status' => 'active',
        ]);

        app(HostingBilling::class)->processToday();

        $this->assertDatabaseCount('hosting_invoices', 0);
        $this->assertDatabaseHas('hosting_services', ['billing_status' => 'stopped']);
    }

    public function test_user_relationship_exposes_hosting_services(): void
    {
        $customer = User::factory()->create();
        HostingService::factory()->for($customer)->create();

        $this->assertCount(1, $customer->hostingServices);
    }
}
