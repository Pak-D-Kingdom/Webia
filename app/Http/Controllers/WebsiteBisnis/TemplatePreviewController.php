<?php

namespace App\Http\Controllers\WebsiteBisnis;

use App\Http\Controllers\Controller;
use App\Models\WebiaTemplate;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Schema;

class TemplatePreviewController extends Controller
{
    public function __invoke(string $path): View
    {
        abort_unless(Schema::hasTable('webia_templates'), 404);

        $template = WebiaTemplate::query()
            ->where('template_url', '/webia/template/'.$path)
            ->where('is_active', true)
            ->firstOrFail();

        abort_unless($template->preview_view !== null && view()->exists($template->preview_view), 404);

        return view($template->preview_view);
    }
}
