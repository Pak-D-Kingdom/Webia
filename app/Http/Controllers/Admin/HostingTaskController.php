<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HostingTask;
use App\Services\HostingDeployer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Throwable;

class HostingTaskController extends Controller
{
    public function index(): View
    {
        $tasks = HostingTask::with(['service.user'])->where('status', 'pending')->oldest()->paginate(20);

        return view('admin.hosting-tasks.index', compact('tasks'));
    }

    public function complete(Request $request, HostingTask $hostingTask, HostingDeployer $deployer): RedirectResponse
    {
        $task = DB::transaction(function () use ($hostingTask): HostingTask {
            $task = HostingTask::with('service.order')->whereKey($hostingTask->id)->lockForUpdate()->firstOrFail();
            abort_unless($task->status === 'pending', 422);

            if ($task->type === 'deploy_website') {
                $task->update(['status' => 'processing']);
            }

            return $task;
        });

        if ($task->type === 'deploy_website') {
            try {
                $deployer->deploy($task->service);
            } catch (Throwable $exception) {
                HostingTask::whereKey($task->id)->where('status', 'processing')->update(['status' => 'pending']);
                report($exception);

                throw ValidationException::withMessages(['hosting' => 'Deploy website gagal. Periksa konfigurasi dan log server.']);
            }
        }

        DB::transaction(function () use ($request, $task): void {
            $task = HostingTask::whereKey($task->id)->lockForUpdate()->firstOrFail();
            $expectedStatus = $task->type === 'deploy_website' ? 'processing' : 'pending';
            abort_unless($task->status === $expectedStatus, 422);
            $task->update(['status' => 'completed', 'completed_by' => $request->user()->id, 'completed_at' => now()]);
            $task->service->update([
                'operational_status' => $task->type === 'suspend_hosting' ? 'suspended' : 'active',
            ]);
        });

        return back()->with('status', $task->type === 'deploy_website' ? 'Website berhasil di-deploy.' : 'Tindakan hosting berhasil dikonfirmasi.');
    }
}
