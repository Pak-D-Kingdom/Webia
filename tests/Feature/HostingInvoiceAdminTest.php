<?php

namespace Tests\Feature;

use App\Models\HostingInvoice;
use App\Models\HostingService;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HostingInvoiceAdminTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_change_price_for_future_invoices_without_changing_existing_invoice(): void
    {
        $admin = User::factory()->admin()->create();
        $service = HostingService::factory()->create(['monthly_price' => 150000]);
        $invoice = HostingInvoice::factory()->create(['hosting_service_id' => $service->id, 'amount' => 150000]);

        $this->actingAs($admin)->patch(route('admin.hosting-services.price', $service), ['monthly_price' => 200000])->assertRedirect();

        $this->assertSame(200000, $service->fresh()->monthly_price);
        $this->assertSame(150000, $invoice->fresh()->amount);
        $this->assertDatabaseHas('hosting_price_changes', ['old_price' => 150000, 'new_price' => 200000, 'changed_by' => $admin->id]);
    }

    public function test_admin_can_stop_service_from_a_future_date(): void
    {
        $this->travelTo('2026-11-06');
        $admin = User::factory()->admin()->create();
        $service = HostingService::factory()->create();

        $this->actingAs($admin)->patch(route('admin.hosting-services.stop', $service), ['stopped_at' => '2026-12-01'])->assertRedirect();

        $this->assertSame('2026-12-01', $service->fresh()->stopped_at->toDateString());
    }

    public function test_admin_can_cancel_invoice_with_required_reason(): void
    {
        $admin = User::factory()->admin()->create();
        $invoice = HostingInvoice::factory()->create();

        $this->actingAs($admin)->post(route('admin.hosting-invoices.cancel', $invoice), [])->assertSessionHasErrors('cancellation_reason');
        $this->actingAs($admin)->post(route('admin.hosting-invoices.cancel', $invoice), ['cancellation_reason' => 'Nominal salah.'])->assertRedirect();

        $this->assertSame('cancelled', $invoice->fresh()->status);
        $this->assertSame($admin->id, $invoice->fresh()->cancelled_by);
    }

    public function test_admin_can_create_one_replacement_for_a_cancelled_invoice(): void
    {
        $admin = User::factory()->admin()->create();
        $cancelled = HostingInvoice::factory()->create([
            'status' => 'cancelled',
            'cancelled_at' => now(),
            'cancellation_reason' => 'Nominal salah.',
        ]);

        $this->actingAs($admin)->post(route('admin.hosting-invoices.replace', $cancelled), [
            'amount' => 200000,
        ])->assertRedirect();

        $replacement = HostingInvoice::where('replacement_for_id', $cancelled->id)->sole();
        $this->assertSame($cancelled->period_start->toDateString(), $replacement->period_start->toDateString());
        $this->assertSame(200000, $replacement->amount);
        $this->assertSame('unpaid', $replacement->status);

        $this->actingAs($admin)->post(route('admin.hosting-invoices.replace', $cancelled), [
            'amount' => 250000,
        ])->assertUnprocessable();
    }
}
