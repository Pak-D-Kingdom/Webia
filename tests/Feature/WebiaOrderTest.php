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
            ->assertSee('Buat pesanan');
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
}
