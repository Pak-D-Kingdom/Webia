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
}
