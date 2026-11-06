<?php

namespace App\Models;

use Database\Factories\HostingTaskFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['hosting_service_id', 'type', 'status', 'completed_by', 'completed_at', 'cancelled_at'])]
class HostingTask extends Model
{
    /** @use HasFactory<HostingTaskFactory> */
    use HasFactory;

    public function service(): BelongsTo
    {
        return $this->belongsTo(HostingService::class, 'hosting_service_id');
    }

    protected function casts(): array
    {
        return [
            'completed_at' => 'datetime',
            'cancelled_at' => 'datetime',
        ];
    }
}
