<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HostingTask;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class HostingTaskController extends Controller
{
    public function index(): View
    {
        $tasks = HostingTask::with(['service.user'])->where('status', 'pending')->oldest()->paginate(20);

        return view('admin.hosting-tasks.index', compact('tasks'));
    }

    public function complete(Request $request, HostingTask $hostingTask): RedirectResponse
    {
        DB::transaction(function () use ($request, $hostingTask): void {
            $task = HostingTask::whereKey($hostingTask->id)->lockForUpdate()->firstOrFail();
            abort_unless($task->status === 'pending', 422);
            $task->update(['status' => 'completed', 'completed_by' => $request->user()->id, 'completed_at' => now()]);
            $task->service->update([
                'operational_status' => $task->type === 'suspend_hosting' ? 'suspended' : 'active',
            ]);
        });

        return back()->with('status', 'Tindakan hosting berhasil dikonfirmasi.');
    }
}
