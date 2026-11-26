<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\WebiaOrder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminAiKnowledgeAccessTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_disable_customer_knowledge_editor_for_a_tenant(): void
    {
        $admin = User::factory()->admin()->create();
        $order = WebiaOrder::factory()->create([
            'site_slug' => 'tenant-kopi',
            'customer_ai_knowledge_editable' => true,
        ]);

        $this->actingAs($admin)
            ->postJson(route('admin.ai.knowledge.access', ['tenant_id' => 'tenant-kopi']), [
                'customer_ai_knowledge_editable' => false,
            ])
            ->assertOk()
            ->assertJsonPath('status', 'success')
            ->assertJsonPath('customer_ai_knowledge_editable', false);

        $order->refresh();
        $this->assertFalse($order->customer_ai_knowledge_editable);
    }

    public function test_customer_is_forbidden_from_changing_tenant_knowledge_access(): void
    {
        $customer = User::factory()->create();
        WebiaOrder::factory()->create(['site_slug' => 'tenant-kopi']);

        $this->actingAs($customer)
            ->postJson(route('admin.ai.knowledge.access', ['tenant_id' => 'tenant-kopi']), [
                'customer_ai_knowledge_editable' => false,
            ])
            ->assertForbidden();
    }
}
