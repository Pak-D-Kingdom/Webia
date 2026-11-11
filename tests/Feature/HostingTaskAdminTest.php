<?php

namespace Tests\Feature;

use App\Models\HostingInvoice;
use App\Models\HostingService;
use App\Models\HostingTask;
use App\Models\User;
use App\Notifications\HostingTaskCreated;
use App\Services\HostingBilling;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Process;
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

    public function test_admin_can_execute_website_deploy_task(): void
    {
        Process::preventStrayProcesses();
        Process::fake(['*' => Process::result(output: 'deployed')]);
        config([
            'webia.hosting.ssh.host' => '203.0.113.10',
            'webia.hosting.ssh.port' => 2222,
            'webia.hosting.ssh.user' => 'deployer',
            'webia.hosting.ssh.private_key' => 'C:/keys/webia',
            'webia.hosting.ssh.known_hosts' => 'C:/keys/known_hosts',
            'webia.hosting.ssh.deploy_command' => '/srv/webia/bin/deploy-site',
        ]);
        $admin = User::factory()->admin()->create();
        $task = HostingTask::factory()->create(['type' => 'deploy_website', 'status' => 'pending']);

        $this->actingAs($admin)->post(route('admin.hosting-tasks.complete', $task))->assertRedirect();

        $this->assertSame('completed', $task->fresh()->status);
        $this->assertSame('active', $task->service->fresh()->operational_status);
        Process::assertRan(fn ($process) => $process->timeout === 120
            && $process->command === [
                'ssh', '-p', '2222', '-i', 'C:/keys/webia',
                '-o', 'BatchMode=yes', '-o', 'StrictHostKeyChecking=yes',
                '-o', 'UserKnownHostsFile=C:/keys/known_hosts',
                '--', 'deployer@203.0.113.10', '/srv/webia/bin/deploy-site',
            ]
            && $process->input === json_encode([
                'domain' => $task->service->domain,
                'order_number' => null,
                'site_config_path' => null,
            ], JSON_THROW_ON_ERROR));
    }

    public function test_processing_website_deploy_cannot_run_again(): void
    {
        Process::preventStrayProcesses();
        Process::fake();
        $admin = User::factory()->admin()->create();
        $task = HostingTask::factory()->create(['type' => 'deploy_website', 'status' => 'processing']);

        $this->actingAs($admin)->post(route('admin.hosting-tasks.complete', $task))->assertUnprocessable();

        Process::assertNothingRan();
        $this->assertSame('processing', $task->fresh()->status);
    }

    public function test_failed_website_deploy_keeps_task_and_service_pending(): void
    {
        Process::preventStrayProcesses();
        Process::fake(['*' => Process::result(errorOutput: 'deploy failed', exitCode: 1)]);
        config([
            'webia.hosting.ssh.host' => '203.0.113.10',
            'webia.hosting.ssh.user' => 'deployer',
            'webia.hosting.ssh.private_key' => 'C:/keys/webia',
            'webia.hosting.ssh.known_hosts' => 'C:/keys/known_hosts',
            'webia.hosting.ssh.deploy_command' => '/srv/webia/bin/deploy-site',
        ]);
        $admin = User::factory()->admin()->create();
        $task = HostingTask::factory()->create(['type' => 'deploy_website', 'status' => 'pending']);

        $this->actingAs($admin)->post(route('admin.hosting-tasks.complete', $task))
            ->assertRedirect()
            ->assertSessionHasErrors('hosting');

        $this->assertSame('pending', $task->fresh()->status);
        $this->assertSame('pending_activation', $task->service->fresh()->operational_status);
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
