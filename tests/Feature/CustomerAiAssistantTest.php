<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\WebiaOrder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class CustomerAiAssistantTest extends TestCase
{
    use RefreshDatabase;

    private User $customer;

    private WebiaOrder $order;

    protected function setUp(): void
    {
        parent::setUp();

        $this->customer = User::factory()->create();
        $this->order = WebiaOrder::factory()->create([
            'user_id' => $this->customer->id,
            'status' => 'paid',
            'delivery_status' => 'delivered',
            'site_slug' => 'klinik-sehat-bersama',
            'business_data' => ['business_name' => 'Klinik Sehat Bersama', 'whatsapp' => '0812-3456-7890'],
        ]);
    }

    private function fakeQuota(array $quota): void
    {
        Http::fake([
            '*/api/v1/tenants/*/quota' => Http::response($quota),
            '*/api/v1/*' => Http::response([], 500),
        ]);
    }

    public function test_delivered_website_shows_modals_and_save_gate(): void
    {
        $this->fakeQuota([
            'monthly_quota' => 500,
            'used_messages' => 10,
            'remaining_messages' => 490,
            'percentage_used' => 2.0,
            'is_quota_exhausted' => false,
        ]);

        $this->actingAs($this->customer)
            ->get(route('customer.ai'))
            ->assertOk()
            ->assertSee('businessInfoForm', false)
            ->assertSee('ai-preview-modal', false)
            ->assertSee('ai-save-modal', false)
            ->assertSee('ai-quota-modal', false);
    }

    public function test_low_quota_opens_quota_modal_automatically(): void
    {
        $this->fakeQuota([
            'monthly_quota' => 500,
            'used_messages' => 480,
            'remaining_messages' => 20,
            'percentage_used' => 96.0,
            'is_quota_exhausted' => false,
        ]);

        $html = $this->actingAs($this->customer)
            ->get(route('customer.ai'))
            ->assertOk()
            ->getContent();

        $modal = substr($html, (int) strpos($html, 'id="ai-quota-modal"') - 200, 600);

        $this->assertStringContainsString('data-modal-autoopen', $modal);
        $this->assertStringContainsString('customer-modal--warning', $modal);
    }

    public function test_quota_banner_button_opens_quota_modal(): void
    {
        $this->fakeQuota([
            'monthly_quota' => 500,
            'used_messages' => 480,
            'remaining_messages' => 20,
            'percentage_used' => 96.0,
            'is_quota_exhausted' => false,
        ]);

        $this->actingAs($this->customer)
            ->get(route('customer.ai'))
            ->assertOk()
            ->assertSee('data-ai-quota-alert', false);
    }
}
