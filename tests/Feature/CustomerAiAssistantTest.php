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

    public function test_update_business_info_persists_data_and_handles_ai_engine_offline_gracefully(): void
    {
        // Fake AI engine returning connection error / 500
        Http::fake([
            '*/api/v1/tenants/*/knowledge' => Http::response([], 500),
        ]);

        $response = $this->actingAs($this->customer)
            ->postJson(route('customer.ai.business-info'), [
                'welcome_message' => 'Halo! Selamat datang di klinik kami.',
                'whatsapp_cs' => '0812-9999-8888',
                'alamat' => 'Jl. Pahlawan No. 10',
            ]);

        $response->assertOk()
            ->assertJsonPath('status', 'success')
            ->assertJsonPath('ai_synced', false);

        $this->order->refresh();
        $this->assertSame('Halo! Selamat datang di klinik kami.', $this->order->business_data['welcome_message']);
        $this->assertSame('0812-9999-8888', $this->order->business_data['whatsapp']);
        $this->assertSame('Jl. Pahlawan No. 10', $this->order->business_data['address']);
    }

    public function test_update_business_info_syncs_when_ai_engine_online(): void
    {
        Http::fake([
            '*/api/v1/tenants/*/knowledge' => Http::response(['status' => 'success']),
        ]);

        $response = $this->actingAs($this->customer)
            ->postJson(route('customer.ai.business-info'), [
                'welcome_message' => 'Halo dari AI online!',
                'whatsapp_cs' => '0812-1111-2222',
            ]);

        $response->assertOk()
            ->assertJsonPath('status', 'success')
            ->assertJsonPath('ai_synced', true);

        $this->order->refresh();
        $this->assertSame('Halo dari AI online!', $this->order->business_data['welcome_message']);
    }

    public function test_saving_knowledge_records_when_the_rag_index_was_updated(): void
    {
        Http::preventStrayRequests();
        Http::fake([
            '*/api/v1/tenants/*/knowledge' => Http::response([
                'status' => 'success',
                'knowledge_saved_at' => '2026-11-23T09:10:00Z',
                'rag_indexed_at' => '2026-11-23T09:10:02Z',
            ]),
        ]);

        $this->actingAs($this->customer)
            ->postJson(route('customer.ai.knowledge'), [
                'profil' => 'Profil bisnis yang diperbarui',
                'layanan' => 'Layanan utama',
            ])
            ->assertOk()
            ->assertJsonPath('status', 'success')
            ->assertJsonPath('knowledge_saved_at', '2026-11-23T09:10:00Z')
            ->assertJsonPath('rag_indexed_at', '2026-11-23T09:10:02Z');

        $this->order->refresh();
        $this->assertSame('2026-11-23T09:10:00Z', $this->order->business_data['ai_knowledge_saved_at']);
        $this->assertSame('2026-11-23T09:10:02Z', $this->order->business_data['ai_rag_indexed_at']);
    }

    public function test_returns_403_and_hides_knowledge_editor_when_customer_access_is_disabled(): void
    {
        $this->order->update([
            'customer_ai_knowledge_editable' => false,
            'business_data' => ['kb_layanan' => 'Data resmi sebelumnya'],
        ]);
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
            ->assertDontSee('custKnowledgeForm', false)
            ->assertSee('Knowledge Base dikelola WEBIA');

        $this->actingAs($this->customer)
            ->postJson(route('customer.ai.knowledge'), ['layanan' => 'Data yang tidak boleh tersimpan'])
            ->assertForbidden()
            ->assertJsonPath('message', 'Editor Knowledge Base saat ini dikelola oleh tim WEBIA.');

        $this->order->refresh();
        $this->assertSame('Data resmi sebelumnya', $this->order->business_data['kb_layanan']);
    }
}
