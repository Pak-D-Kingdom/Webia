<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['hosting_invoice_id', 'type', 'scheduled_for', 'dispatched_at'])]
class HostingNotificationEvent extends Model
{
    public function invoice(): BelongsTo
    {
        return $this->belongsTo(HostingInvoice::class, 'hosting_invoice_id');
    }

    protected function casts(): array
    {
        return [
            'scheduled_for' => 'date',
            'dispatched_at' => 'datetime',
        ];
    }
}
