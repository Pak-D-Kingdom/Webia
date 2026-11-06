<?php

namespace App\Models;

use Database\Factories\WebiaPackageFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable([
    'name',
    'slug',
    'description',
    'old_price',
    'price',
    'cms_enabled',
    'chatbot_monthly_quota',
    'features',
    'is_active',
    'sort_order',
])]
class WebiaPackage extends Model
{
    /** @use HasFactory<WebiaPackageFactory> */
    use HasFactory;

    public function orders(): HasMany
    {
        return $this->hasMany(WebiaOrder::class);
    }

    protected function casts(): array
    {
        return [
            'features' => 'array',
            'cms_enabled' => 'boolean',
            'is_active' => 'boolean',
        ];
    }
}
