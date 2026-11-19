<?php

namespace App\Http\Controllers\WebsiteBisnis;

use App\Http\Controllers\Controller;
use App\Models\WebiaTemplate;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Routing\Router;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class TemplateCollectionController extends Controller
{
    public function index(Router $router): View
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
                'tag' => $template->tag ?? $template->category_label.' website',
                'preview_folder' => $template->preview_folder,
                'template_url' => $this->availableTemplateUrl($template, $router),
            ])
            ->all();

        return view('website-bisnis.collections.index', compact('templates'));
    }

    private function availableTemplateUrl(WebiaTemplate $template, Router $router): ?string
    {
        if ($template->template_url === null || $template->template_url === '') {
            return null;
        }

        if ($template->preview_view !== null) {
            return view()->exists($template->preview_view) ? $template->template_url : null;
        }

        $templateUrl = $template->template_url;

        try {
            $route = $router->getRoutes()->match(Request::create($templateUrl, 'GET'));
        } catch (NotFoundHttpException) {
            return null;
        }

        if ($route->getName() === 'webia.template.preview') {
            return null;
        }

        $view = $route->defaults['view'] ?? $route->getAction('view');

        return $view !== null && ! view()->exists($view) ? null : $templateUrl;
    }
}
