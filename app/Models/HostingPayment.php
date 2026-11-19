<?php

namespace App\Models;

use Database\Factories\HostingPaymentFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'hosting_invoice_id', 'provider', 'midtrans_order_id', 'snap_token', 'snap_redirect_url',
    'status', 'payload', 'paid_at', 'expires_at',
])]
class HostingPayment extends Model
{
    /** @use HasFactory<HostingPaymentFactory> */
    use HasFactory;

    public function invoice(): BelongsTo
    {
        return $this->belongsTo(HostingInvoice::class, 'hosting_invoice_id');
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
