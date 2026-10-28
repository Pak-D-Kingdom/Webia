<?php

namespace App\Models;

use Database\Factories\WebiaOrderFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable([
    'user_id', 'order_number', 'webia_package_id', 'package_snapshot', 'webia_template_id', 'template_snapshot', 'category_slug',
    'addon_ids', 'addon_snapshot', 'status', 'total_price', 'payment_receipt_path', 'payment_note', 'paid_at',
    'business_data', 'delivery_status', 'site_slug',
])]
class WebiaOrder extends Model
{
    /** @use HasFactory<WebiaOrderFactory> */
    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function package(): BelongsTo
    {
        return $this->belongsTo(WebiaPackage::class, 'webia_package_id');
    }

    public function template(): BelongsTo
    {
        return $this->belongsTo(WebiaTemplate::class, 'webia_template_id');
    }

    public function logs(): HasMany
    {
        return $this->hasMany(WebiaOrderLog::class);
    }

    public function payments(): HasMany
    {
        return $this->hasMany(WebiaPayment::class);
    }

    public function supportsCustomerSite(): bool
    {
        return ($this->template_snapshot['slug'] ?? $this->template?->slug) === 'fnb-cafe-minimalis';
    }

    public function getProgressIndexAttribute(): int
    {
        return match (true) {
            $this->delivery_status === 'delivered' => 4,
            $this->delivery_status === 'in_progress' => 3,
            $this->status === 'paid' => 2,
            $this->status === 'payment_uploaded' => 1,
            default => 0,
        };
    }

    protected function casts(): array
    {
        return [
            'package_snapshot' => 'array',
            'template_snapshot' => 'array',
            'addon_ids' => 'array',
            'addon_snapshot' => 'array',
            'business_data' => 'array',
            'paid_at' => 'datetime',
        ];
    }
}
