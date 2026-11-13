<?php

namespace Tests\Feature;

use Tests\TestCase;

class RealEstateEmeraldGreenTemplateTest extends TestCase
{
    public function test_blog_index_and_article_pages_render(): void
    {
        $prefix = 'webia/template/property/luxury/real-estate-agency-emerald-green';

        $this->get('/'.$prefix.'/blog')
            ->assertOk()
            ->assertSee('5 Things to Check Before Buying a Villa in Bali');

        $this->get('/'.$prefix.'/blog/checklist-membeli-villa-di-bali')
            ->assertOk()
            ->assertSee('5 Things to Check Before Buying a Villa in Bali')
            ->assertSee('1. Confirm the land status and certificate');
    }

    public function test_property_previews_keep_demo_identity_and_routes(): void
    {
        $this->get('/webia/template/property/luxury/real-estate-agency-emerald-green')
            ->assertOk()
            ->assertSee('GreenHaven')
            ->assertSee('hello@greenhaven.co.id')
            ->assertSee(route('website-bisnis.template.property.luxury.real-estate-agency-emerald-green.property.show', ['slug' => 'modern-luxury-villa-bukit-indah']), false)
            ->assertDontSee('Contoh properti', false);

        $this->get('/webia/template/property/premium-minimal/real-estate-agency-nature-green')
            ->assertOk()
            ->assertSee('GreenEstate')
            ->assertSee('hello@greenestate.id')
            ->assertSee(route('property.premium-minimal.nature-green.property', ['slug' => 'emerald-residence']), false)
            ->assertDontSee('Contoh properti', false);

        $this->get('/webia/template/property/professional/real-estate-agency-coral-peach')
            ->assertOk()
            ->assertSee('Coral Homes')
            ->assertSee('info@coralhomes.id')
            ->assertSee(route('coral-peach.blog.show', ['slug' => 'tips-memilih-rumah-pertama']), false)
            ->assertDontSee('Contoh properti', false);
    }
}
