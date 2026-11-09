<?php

namespace Tests\Feature;

use App\Models\HostingInvoice;
use App\Models\HostingService;
use App\Models\HostingTask;
use App\Models\User;
use App\Notifications\HostingTaskCreated;
use App\Services\HostingBilling;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HostingTaskAdminTest extends TestCase
{
    use RefreshDatabase;

    public function test_overdue_invoice_suspends_service_after_grace_period_and_creates_one_task(): void
    {
        $this->travelTo('2026-03-24 08:00:00');
        $admin = User::factory()->admin()->create();
        $service = HostingService::factory()->create(['billing_status' => 'active']);
        HostingInvoice::factory()->create([
            'hosting_service_id' => $service->id,
            'status' => 'unpaid',
            'issued_at' => '2026-03-10',
            'due_at' => '2026-03-17',
        ]);

        app(HostingBilling::class)->processToday();
        app(HostingBilling::class)->processToday();

        $this->assertSame('suspended', $service->fresh()->billing_status);
        $this->assertSame('overdue', $service->invoices()->firstOrFail()->status);
        $this->assertSame(1, HostingTask::where('type', 'suspend_hosting')->count());
        $this->assertDatabaseHas('notifications', ['notifiable_id' => $admin->id, 'type' => HostingTaskCreated::class]);
    }

    public function test_admin_can_confirm_manual_hosting_task(): void
    {
        $admin = User::factory()->admin()->create();
        $task = HostingTask::factory()->create(['type' => 'suspend_hosting', 'status' => 'pending']);

        $this->actingAs($admin)->post(route('admin.hosting-tasks.complete', $task))->assertRedirect();

        $this->assertSame('completed', $task->fresh()->status);
        $this->assertSame($admin->id, $task->fresh()->completed_by);
        $this->assertSame('suspended', $task->service->fresh()->operational_status);
    }
}
