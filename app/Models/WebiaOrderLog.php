<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['webia_order_id', 'actor_id', 'from_status', 'to_status', 'note'])]
class WebiaOrderLog extends Model
{
    public function order(): BelongsTo
    {
        return $this->belongsTo(WebiaOrder::class, 'webia_order_id');
    }

    public function actor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'actor_id');
    }
}
