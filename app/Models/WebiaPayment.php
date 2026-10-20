<?php

namespace App\Models;

use Database\Factories\WebiaPaymentFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'webia_order_id', 'provider', 'midtrans_order_id', 'snap_token', 'snap_redirect_url',
    'status', 'payload', 'paid_at', 'expires_at',
])]
class WebiaPayment extends Model
{
    /** @use HasFactory<WebiaPaymentFactory> */
    use HasFactory;

    public function order(): BelongsTo
    {
        return $this->belongsTo(WebiaOrder::class, 'webia_order_id');
    }

    protected function casts(): array
    {
        return [
            'payload' => 'array',
            'paid_at' => 'datetime',
            'expires_at' => 'datetime',
        ];
    }
}
