<?php

namespace App\Notifications;

use App\Models\HostingTask;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class HostingTaskCreated extends Notification
{
    use Queueable;

    public function __construct(public HostingTask $task) {}

    /** @return array<int, string> */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /** @return array<string, mixed> */
    public function toArray(object $notifiable): array
    {
        return [
            'hosting_task_id' => $this->task->id,
            'type' => $this->task->type,
            'message' => ($this->task->type === 'suspend_hosting' ? 'Suspend' : 'Aktifkan').' hosting '.$this->task->service->domain.'.',
            'url' => route('admin.hosting-tasks.index'),
        ];
    }
}
