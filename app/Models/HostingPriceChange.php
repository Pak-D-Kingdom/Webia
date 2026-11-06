<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['hosting_service_id', 'changed_by', 'old_price', 'new_price'])]
class HostingPriceChange extends Model
{
    public function service(): BelongsTo
    {
        return $this->belongsTo(HostingService::class, 'hosting_service_id');
    }

    public function actor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'changed_by');
    }
}
