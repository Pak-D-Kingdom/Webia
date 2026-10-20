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

    protected function casts(): array
    {
        return [
            'package_snapshot' => 'array',
            'template_snapshot' => 'array',
            'addon_ids' => 'array',
            'addon_snapshot' => 'array',
            'paid_at' => 'datetime',
        ];
    }
}
