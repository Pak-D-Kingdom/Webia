<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebiaTemplate extends Model
{
    protected $fillable = [
        'name', 'slug', 'category_slug', 'category_label', 'business_types',
        'design_style', 'color_theme', 'description', 'preview_style',
        'eyebrow', 'headline', 'tag', 'preview_folder', 'template_url',
        'is_active', 'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'business_types' => 'array',
            'is_active' => 'boolean',
            'sort_order' => 'integer',
        ];
    }
}
