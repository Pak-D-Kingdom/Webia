<?php

namespace Tests\Feature;

use App\Models\WebiaTemplate;
use Database\Seeders\WebiaTemplateSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class VallaCoCateringTemplateTest extends TestCase
{
    use RefreshDatabase;

    public function test_demo_route_renders_the_vallaco_template_and_interactions(): void
    {
        $this->get(route('webia.template.vallaco-catering'))
            ->assertOk()
            ->assertSee('<title>VALLA & CO. | Nordic Botanical Catering & Gathering Studio</title>', false)
            ->assertSee('Quiet luxury,', false)
            ->assertSee('function filterMenu(category, activeButton)', false)
            ->assertSee('rel="noopener noreferrer"', false)
            ->assertSee("'noopener,noreferrer'", false)
            ->assertSee('function handleTastingSubmit(e)', false);
    }

    public function test_template_is_available_in_the_collection_after_seeding(): void
    {
        Artisan::call('db:seed', [
            '--class' => WebiaTemplateSeeder::class,
            '--force' => true,
            '--no-interaction' => true,
        ]);

        $template = WebiaTemplate::query()
            ->where('slug', 'vallaco-catering')
            ->firstOrFail();

        $this->assertDatabaseHas('webia_templates', [
            'slug' => 'vallaco-catering',
            'template_url' => '/webia/template/vallaco-catering',
            'is_active' => true,
        ]);

        $this->get(route('collections'))
            ->assertOk()
            ->assertSee('Valla &amp; Co. — Nordic Botanical Catering', false)
            ->assertSee('src="/webia/template/vallaco-catering?preview=1"', false)
            ->assertSee(e(route('orders.create', ['template' => $template->id, 'category' => 'fnb'])), false)
            ->assertSee('Catering', false);
    }
}
