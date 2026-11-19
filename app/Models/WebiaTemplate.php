<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class WebiaTemplate extends Model
{
    protected $fillable = [
        'name', 'slug', 'category_slug', 'category_label', 'business_types',
        'design_style', 'color_theme', 'description', 'preview_style',
        'eyebrow', 'headline', 'tag', 'preview_folder', 'template_url',
        'preview_view', 'site_config_path', 'is_active', 'sort_order',
    ];

    public function packages(): BelongsToMany
    {
        return $this->belongsToMany(WebiaPackage::class, 'webia_package_template');
    }

    protected function casts(): array
    {
        return [
            'business_types' => 'array',
            'is_active' => 'boolean',
            'sort_order' => 'integer',
        ];
    }
}
