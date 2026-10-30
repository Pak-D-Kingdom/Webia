<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\WebiaOrder;
use App\Models\WebiaOrderLog;
use App\Models\WebiaPackage;
use App\Models\WebiaTemplate;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class WebiaOrderTest extends TestCase
{
    use RefreshDatabase;

    public function test_customer_can_open_order_form_with_preselected_package(): void
    {
        $customer = User::factory()->create();
        $package = WebiaPackage::factory()->create(['name' => 'Pixel', 'slug' => 'pixel']);

        $this->actingAs($customer)
            ->get(route('orders.create', ['package' => 'pixel']))
            ->assertOk()
            ->assertSee('Pixel')
            ->assertSee('Buat Pesanan');
    }

    public function test_customer_can_create_order_from_active_package(): void
    {
        $customer = User::factory()->create();
        $package = WebiaPackage::factory()->create(['name' => 'Pixel', 'price' => 499000]);

        $response = $this->actingAs($customer)->post(route('orders.store'), [
            'package_id' => $package->id,
            'category_slug' => 'beauty',
        ]);

        $order = WebiaOrder::first();
        $response->assertRedirect(route('orders.show', $order));
        $this->assertSame('awaiting_payment', $order->status);
        $this->assertSame(499000, $order->total_price);
        $this->assertSame('Pixel', $order->package_snapshot['name']);
        $this->assertSame($customer->id, $order->user_id);
    }

    public function test_customer_cannot_order_inactive_package(): void
    {
        $customer = User::factory()->create();
        $package = WebiaPackage::factory()->create(['is_active' => false]);

        $this->actingAs($customer)->post(route('orders.store'), [
            'package_id' => $package->id,
            'category_slug' => 'beauty',
        ])->assertSessionHasErrors('package_id');

        $this->assertDatabaseCount('webia_orders', 0);
    }

    public function test_order_category_is_derived_from_selected_template(): void
    {
        $customer = User::factory()->create();
        $package = WebiaPackage::factory()->create();
        $template = WebiaTemplate::create([
            'name' => 'Beauty',
            'slug' => 'beauty',
            'category_slug' => 'beauty',
            'category_label' => 'Beauty',
            'business_types' => ['Salon'],
            'design_style' => 'Modern',
            'description' => 'Template beauty.',
            'is_active' => true,
        ]);

        $this->actingAs($customer)->post(route('orders.store'), [
            'package_id' => $package->id,
            'template_id' => $template->id,
            'category_slug' => 'wrong-category',
        ]);

        $order = WebiaOrder::first();
        $this->assertSame('beauty', $order->category_slug);
        $this->assertSame('Beauty', $order->template_snapshot['name']);
    }

    public function test_customer_cannot_view_another_customers_order(): void
    {
        $customer = User::factory()->create();
        $otherOrder = WebiaOrder::factory()->create();

        $this->actingAs($customer)
            ->get(route('orders.show', $otherOrder))
            ->assertNotFound();
    }

    public function test_customer_can_filter_orders_by_group(): void
    {
        $customer = User::factory()->create();
        WebiaOrder::factory()->for($customer)->create(['order_number' => 'WEB-PENDING', 'status' => 'awaiting_payment']);
        WebiaOrder::factory()->for($customer)->create(['order_number' => 'WEB-VERIFY', 'status' => 'payment_uploaded']);
        WebiaOrder::factory()->for($customer)->create(['order_number' => 'WEB-WORKING', 'status' => 'paid', 'delivery_status' => 'in_progress']);
        WebiaOrder::factory()->for($customer)->create(['order_number' => 'WEB-DONE', 'status' => 'paid', 'delivery_status' => 'delivered']);

        $this->actingAs($customer)->get(route('orders.index', ['filter' => 'menunggu_pembayaran']))
            ->assertOk()
            ->assertSee('WEB-PENDING')
            ->assertDontSee('WEB-VERIFY')
            ->assertDontSee('WEB-WORKING')
            ->assertDontSee('WEB-DONE');

        $this->actingAs($customer)->get(route('orders.index', ['filter' => 'menunggu_verifikasi']))
            ->assertOk()
            ->assertSee('WEB-VERIFY')
            ->assertDontSee('WEB-PENDING');

        $this->actingAs($customer)->get(route('orders.index', ['filter' => 'dikerjakan']))
            ->assertOk()
            ->assertSee('WEB-WORKING')
            ->assertDontSee('WEB-DONE');

        $this->actingAs($customer)->get(route('orders.index', ['filter' => 'selesai']))
            ->assertOk()
            ->assertSee('WEB-DONE')
            ->assertDontSee('WEB-WORKING');
    }

    public function test_order_form_shows_selected_template_name(): void
    {
        $customer = User::factory()->create();
        $package = WebiaPackage::factory()->create();
        $template = WebiaTemplate::create([
            'name' => 'Cafe Earthtone',
            'slug' => 'fnb-cafe-minimalis',
            'category_slug' => 'fnb',
            'category_label' => 'F&B',
            'business_types' => ['Cafe & Eatery'],
            'design_style' => 'Minimalist',
            'description' => 'Template cafe.',
            'is_active' => true,
        ]);

        $this->actingAs($customer)
            ->get(route('orders.create', ['template' => $template->id, 'package' => $package->slug]))
            ->assertOk()
            ->assertSee('Cafe Earthtone');
    }

    public function test_order_detail_shows_verification_state(): void
    {
        $order = WebiaOrder::factory()->create(['status' => 'payment_uploaded']);

        $this->actingAs($order->user)
            ->get(route('orders.show', $order))
            ->assertOk()
            ->assertSee('Menunggu verifikasi');
    }

    public function test_customer_can_upload_payment_receipt(): void
    {
        Storage::fake('local');
        $order = WebiaOrder::factory()->create(['status' => 'awaiting_payment']);

        $response = $this->actingAs($order->user)->post(route('orders.receipt', $order), [
            'payment_receipt' => UploadedFile::fake()->image('receipt.jpg'),
            'payment_note' => 'Transfer BCA atas nama Zainul.',
        ]);

        $response->assertRedirect(route('orders.show', $order));
        $order->refresh();
        $this->assertSame('payment_uploaded', $order->status);
        Storage::disk('local')->assertExists($order->payment_receipt_path);
    }

    public function test_reupload_replaces_old_private_receipt(): void
    {
        Storage::fake('local');
        Storage::disk('local')->put('payment-receipts/old.jpg', 'old');
        $order = WebiaOrder::factory()->create([
            'status' => 'rejected',
            'payment_receipt_path' => 'payment-receipts/old.jpg',
        ]);

        $this->actingAs($order->user)->post(route('orders.receipt', $order), [
            'payment_receipt' => UploadedFile::fake()->image('new.jpg'),
        ])->assertRedirect(route('orders.show', $order));

        Storage::disk('local')->assertMissing('payment-receipts/old.jpg');
        Storage::disk('local')->assertExists($order->fresh()->payment_receipt_path);
    }

    public function test_customer_cannot_upload_receipt_for_another_customers_order(): void
    {
        Storage::fake('local');
        $customer = User::factory()->create();
        $order = WebiaOrder::factory()->create();

        $this->actingAs($customer)->post(route('orders.receipt', $order), [
            'payment_receipt' => UploadedFile::fake()->image('receipt.jpg'),
        ])->assertNotFound();
    }

    public function test_rejected_order_shows_latest_admin_note(): void
    {
        $order = WebiaOrder::factory()->create(['status' => 'rejected']);
        WebiaOrderLog::create([
            'webia_order_id' => $order->id,
            'from_status' => 'payment_uploaded',
            'to_status' => 'rejected',
            'note' => 'Nominal transfer tidak sesuai.',
        ]);

        $this->actingAs($order->user)
            ->get(route('orders.show', $order))
            ->assertOk()
            ->assertSee('Nominal transfer tidak sesuai.');
    }

    public function test_order_instruction_shows_configured_payment_accounts(): void
    {
        config(['webia.payment_accounts' => [
            ['bank' => 'BCA', 'number' => '0000000000', 'holder' => 'WEBIA (dummy)'],
        ]]);

        $order = WebiaOrder::factory()->create(['status' => 'awaiting_payment']);

        $this->actingAs($order->user)
            ->get(route('orders.show', $order))
            ->assertOk()
            ->assertSee('BCA')
            ->assertSee('0000000000')
            ->assertSee('WEBIA (dummy)');
    }

    public function test_order_instruction_falls_back_without_payment_accounts(): void
    {
        config(['webia.payment_accounts' => []]);

        $order = WebiaOrder::factory()->create(['status' => 'awaiting_payment']);

        $this->actingAs($order->user)
            ->get(route('orders.show', $order))
            ->assertOk()
            ->assertSee('rekening WEBIA yang dikonfirmasi tim')
            ->assertDontSee('0000000000');
    }

    public function test_payment_receipt_rejects_unsafe_file(): void
    {
        Storage::fake('local');
        $order = WebiaOrder::factory()->create(['status' => 'awaiting_payment']);

        $this->actingAs($order->user)->post(route('orders.receipt', $order), [
            'payment_receipt' => UploadedFile::fake()->create('receipt.exe', 20, 'application/x-msdownload'),
        ])->assertSessionHasErrors('payment_receipt');

        $this->assertSame('awaiting_payment', $order->fresh()->status);
    }

    public function test_paid_order_can_save_business_data(): void
    {
        $order = WebiaOrder::factory()->create(['status' => 'paid']);

        $this->actingAs($order->user)->post(route('orders.business', $order), [
            'business_name' => 'Salon Ayu',
            'tagline' => 'Rapi dalam 30 menit',
            'whatsapp' => '+62 812-0000-0000',
            'description' => 'Nail art home service.',
            'address' => 'Jl. Melati No. 8',
            'city' => 'Bandung',
            'address_url' => 'https://maps.google.com/?q=salon-ayu',
            'instagram' => '@salonayu',
        ])->assertRedirect(route('orders.show', $order));

        $order->refresh();
        $this->assertSame('Salon Ayu', $order->business_data['business_name']);
        $this->assertSame('Nail art home service.', $order->business_data['description']);
        $this->assertSame('Jl. Melati No. 8', $order->business_data['address']);
        $this->assertSame('Bandung', $order->business_data['city']);
    }

    public function test_business_data_is_rejected_before_payment_verified(): void
    {
        $order = WebiaOrder::factory()->create(['status' => 'awaiting_payment']);

        $this->actingAs($order->user)->post(route('orders.business', $order), [
            'business_name' => 'Salon Ayu',
        ])->assertUnprocessable();

        $this->assertNull($order->fresh()->business_data);
    }

    public function test_business_data_cannot_be_changed_after_delivery(): void
    {
        $order = WebiaOrder::factory()->create([
            'status' => 'paid',
            'delivery_status' => 'delivered',
            'business_data' => ['business_name' => 'Salon Ayu'],
        ]);

        $this->actingAs($order->user)->post(route('orders.business', $order), [
            'business_name' => 'Salon Baru',
        ])->assertUnprocessable();

        $this->assertSame('Salon Ayu', $order->fresh()->business_data['business_name']);
    }

    public function test_business_data_requires_business_name(): void
    {
        $order = WebiaOrder::factory()->create(['status' => 'paid']);

        $this->actingAs($order->user)->post(route('orders.business', $order), [
            'whatsapp' => '+62 812-0000-0000',
        ])->assertSessionHasErrors('business_name');

        $this->assertNull($order->fresh()->business_data);
    }

    public function test_business_data_validates_address_url(): void
    {
        $order = WebiaOrder::factory()->create(['status' => 'paid']);

        $this->actingAs($order->user)->post(route('orders.business', $order), [
            'business_name' => 'Salon Ayu',
            'address_url' => 'not-a-url',
        ])->assertSessionHasErrors('address_url');

        $this->assertNull($order->fresh()->business_data);
    }
}
