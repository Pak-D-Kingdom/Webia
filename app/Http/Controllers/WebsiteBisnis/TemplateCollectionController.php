<?php

namespace App\Http\Controllers\WebsiteBisnis;

use App\Http\Controllers\Controller;
use App\Models\WebiaTemplate;

class TemplateCollectionController extends Controller
{
    public function index()
    {
        $templates = WebiaTemplate::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get()
            ->map(fn (WebiaTemplate $template) => [
                'id' => $template->id,
                'name' => $template->name,
                'category' => $template->category_slug,
                'business_types' => $template->business_types ?? [],
                'design_style' => $template->design_style,
                'color_theme' => $template->color_theme ?? '',
                'label' => $template->category_label,
                'desc' => $template->description,
                'style' => $template->preview_style,
                'eyebrow' => $template->eyebrow ?? '',
                'headline' => $template->headline ?? '',
                'tag' => $template->tag ?? $template->category_label . ' website',
                'preview_folder' => $template->preview_folder,
                'template_url' => $template->template_url,
            ])
            ->all();

        return view('website-bisnis.collections.index', compact('templates'));
    }
}
