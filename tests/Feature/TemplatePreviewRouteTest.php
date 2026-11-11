<?php

namespace Tests\Feature;

use App\Http\Controllers\WebsiteBisnis\TemplatePreviewController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class TemplatePreviewRouteTest extends TestCase
{
    use RefreshDatabase;

    public function test_mapped_preview_url_is_resolved_by_the_database_controller(): void
    {
        $route = app('router')->getRoutes()->match(Request::create(
            '/webia/template/matcha-clean-organic-deep-cleaning',
            'GET',
        ));

        $this->assertSame('webia.template.preview', $route->getName());
        $this->assertSame(TemplatePreviewController::class, $route->getControllerClass());
    }

    public function test_active_database_template_renders_its_preview_view(): void
    {
        $this->insertTemplate(
            templateUrl: '/webia/template/database-preview-test',
            previewView: 'website-bisnis.templates.home-services.home-cleaning-deep-cleaning.matcha-clean.matcha-clean',
        );

        $this->get('/webia/template/database-preview-test')
            ->assertOk()
            ->assertViewIs('website-bisnis.templates.home-services.home-cleaning-deep-cleaning.matcha-clean.matcha-clean');
    }

    public function test_unknown_inactive_or_unrenderable_database_template_returns_not_found(): void
    {
        $this->insertTemplate(
            slug: 'inactive-preview-test',
            templateUrl: '/webia/template/inactive-preview-test',
            previewView: 'website-bisnis.templates.home-services.home-cleaning-deep-cleaning.matcha-clean.matcha-clean',
            isActive: false,
        );
        $this->insertTemplate(
            slug: 'missing-view-preview-test',
            templateUrl: '/webia/template/missing-view-preview-test',
            previewView: 'website-bisnis.templates.missing-view',
        );

        $this->get('/webia/template/unknown-preview-test')->assertNotFound();
        $this->get('/webia/template/inactive-preview-test')->assertNotFound();
        $this->get('/webia/template/missing-view-preview-test')->assertNotFound();
    }

    public function test_collection_only_links_to_renderable_database_previews(): void
    {
        $this->insertTemplate(
            templateUrl: '/webia/template/database-preview-test',
            previewView: 'website-bisnis.templates.home-services.home-cleaning-deep-cleaning.matcha-clean.matcha-clean',
        );
        $this->insertTemplate(
            slug: 'missing-view-preview-test',
            templateUrl: '/webia/template/missing-view-preview-test',
            previewView: 'website-bisnis.templates.missing-view',
        );

        $this->get('/webia/koleksi')
            ->assertOk()
            ->assertSee('/webia/template/database-preview-test', false)
            ->assertDontSee('/webia/template/missing-view-preview-test', false);
    }

    private function insertTemplate(
        string $slug = 'database-preview-test',
        string $templateUrl = '/webia/template/database-preview-test',
        ?string $previewView = null,
        bool $isActive = true,
    ): void {
        DB::table('webia_templates')->insert([
            'name' => 'Database Preview Test',
            'slug' => $slug,
            'category_slug' => 'test',
            'category_label' => 'Test',
            'business_types' => json_encode(['Test']),
            'design_style' => 'Test',
            'description' => 'Template preview route test.',
            'preview_style' => 'preview-test',
            'template_url' => $templateUrl,
            'preview_view' => $previewView,
            'is_active' => $isActive,
            'sort_order' => 1,
        ]);
    }
}
