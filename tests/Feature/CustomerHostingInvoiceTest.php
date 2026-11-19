<?php

namespace Tests\Feature;

use App\Models\HostingInvoice;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CustomerHostingInvoiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_customer_sees_only_own_hosting_invoices(): void
    {
        $customer = User::factory()->create();
        $own = HostingInvoice::factory()->create();
        $own->service->update(['user_id' => $customer->id, 'website_name' => 'Milik Saya']);
        $other = HostingInvoice::factory()->create();
        $other->service->update(['website_name' => 'Bukan Milik Saya']);

        $this->actingAs($customer)->get(route('hosting-invoices.index'))
            ->assertOk()
            ->assertSee('Milik Saya')
            ->assertDontSee('Bukan Milik Saya');
    }

    public function test_customer_cannot_view_another_customers_invoice(): void
    {
        $invoice = HostingInvoice::factory()->create();

        $this->actingAs(User::factory()->create())
            ->get(route('hosting-invoices.show', $invoice))
            ->assertNotFound();
    }

    public function test_free_invoice_has_no_payment_action(): void
    {
        $invoice = HostingInvoice::factory()->create(['amount' => 0, 'status' => 'paid', 'label' => 'Bulan Pertama Gratis']);

        $this->actingAs($invoice->service->user)
            ->get(route('hosting-invoices.show', $invoice))
            ->assertOk()
            ->assertSee('Bulan Pertama Gratis')
            ->assertDontSee('Bayar melalui Midtrans');
    }

    public function test_confirmed_payment_shows_success_modal(): void
    {
        $invoice = HostingInvoice::factory()->create(['status' => 'paid']);

        $this->actingAs($invoice->service->user)
            ->withSession(['status' => 'Pembayaran berhasil dikonfirmasi.'])
            ->get(route('hosting-invoices.show', $invoice))
            ->assertOk()
            ->assertSee('data-modal-autoopen', false)
            ->assertSee('Pembayaran berhasil')
            ->assertSee('Lunas');
    }

    public function test_failed_payment_creation_shows_retry_modal(): void
    {
        $invoice = HostingInvoice::factory()->create(['status' => 'unpaid']);

        $this->actingAs($invoice->service->user)
            ->withSession(['status' => 'Pembayaran Midtrans gagal dibuat. Coba lagi sebentar.'])
            ->get(route('hosting-invoices.show', $invoice))
            ->assertOk()
            ->assertSee('data-modal-autoopen', false)
            ->assertSee('Pembayaran belum berhasil')
            ->assertSee('Coba lagi');
    }
}
