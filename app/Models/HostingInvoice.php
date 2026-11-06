<?php

namespace App\Models;

use Database\Factories\HostingInvoiceFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable([
    'hosting_service_id', 'invoice_number', 'label', 'period_start', 'period_end', 'issued_at', 'due_at',
    'amount', 'status', 'paid_at', 'cancelled_at', 'cancelled_by', 'cancellation_reason', 'replacement_for_id',
])]
class HostingInvoice extends Model
{
    /** @use HasFactory<HostingInvoiceFactory> */
    use HasFactory;

    public function service(): BelongsTo
    {
        return $this->belongsTo(HostingService::class, 'hosting_service_id');
    }

    public function payments(): HasMany
    {
        return $this->hasMany(HostingPayment::class);
    }

    public function notificationEvents(): HasMany
    {
        return $this->hasMany(HostingNotificationEvent::class);
    }

    protected function casts(): array
    {
        return [
            'period_start' => 'date',
            'period_end' => 'date',
            'issued_at' => 'datetime',
            'due_at' => 'datetime',
            'amount' => 'integer',
            'paid_at' => 'datetime',
            'cancelled_at' => 'datetime',
        ];
    }
}
