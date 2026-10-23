<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class WebsiteNavigationTest extends TestCase
{
    use RefreshDatabase;

    public function test_dkreasi_links_remain_visible_without_a_configured_destination(): void
    {
        config(['webia.dkreasi_url' => null]);

        $response = $this->get('/');

        $response->assertOk()
            ->assertSee('href="#"', false)
            ->assertSee('webia-homebase-link', false)
            ->assertSee('webia-portal', false)
            ->assertSee('← D-KREASI', false)
            ->assertSee('Portal D-KREASI', false)
            ->assertSee('Jelajahi D-KREASI Homebase', false)
            ->assertSee('D-KREASI Homebase', false);
    }

    public function test_configured_dkreasi_links_open_in_a_new_tab(): void
    {
        config(['webia.dkreasi_url' => 'https://dkreasi.example']);

        $response = $this->get('/');
        $html = (string) $response->getContent();

        $response->assertOk();
        $this->assertSame(4, substr_count($html, 'href="https://dkreasi.example"'));
        $this->assertSame(4, preg_match_all(
            '/<a\b(?=[^>]*href="https:\/\/dkreasi\.example")(?=[^>]*target="_blank")(?=[^>]*rel="noopener noreferrer")[^>]*>/',
            $html,
        ));
    }

    public function test_mobile_navigation_script_is_loaded_on_the_template_gallery(): void
    {
        $this->get(route('collections'))
            ->assertOk()
            ->assertSee('js/website-bisnis/website-bisnis.js', false);
    }
}
