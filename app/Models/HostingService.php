<?php

namespace App\Models;

use Database\Factories\HostingServiceFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable([
    'user_id', 'website_name', 'domain', 'monthly_price', 'activation_date', 'billing_cycle_day',
    'stopped_at', 'billing_status', 'operational_status',
])]
class HostingService extends Model
{
    /** @use HasFactory<HostingServiceFactory> */
    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function invoices(): HasMany
    {
        return $this->hasMany(HostingInvoice::class);
    }

    public function priceChanges(): HasMany
    {
        return $this->hasMany(HostingPriceChange::class);
    }

    public function tasks(): HasMany
    {
        return $this->hasMany(HostingTask::class);
    }

    protected function casts(): array
    {
        return [
            'monthly_price' => 'integer',
            'activation_date' => 'date',
            'stopped_at' => 'date',
        ];
    }
}
