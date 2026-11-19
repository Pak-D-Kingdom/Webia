<?php

namespace Tests\Feature;

use Tests\TestCase;

class UmrahHajiEmeraldGreenRouteTest extends TestCase
{
    public function test_navigation_links_stay_within_emerald_green_template(): void
    {
        $baseUrl = '/webia/template/travel-tourism/classic/umrah-haji-emerald-green';

        $this->get($baseUrl)
            ->assertOk()
            ->assertSee($baseUrl.'/paket', false)
            ->assertSee($baseUrl.'/jadwal', false)
            ->assertSee($baseUrl.'/itinerary', false)
            ->assertSee($baseUrl.'/chatbot', false)
            ->assertDontSee('/webia/template/travel-tourism/elegan/umrah-haji-navy-champagne-gold', false);
    }

    public function test_navy_template_uses_its_own_route_namespace(): void
    {
        $baseUrl = '/webia/template/travel-tourism/elegan/umrah-haji-navy-champagne-gold';

        $this->assertSame($baseUrl, route('umrah-haji-navy.home', absolute: false));
        $this->assertSame($baseUrl.'/itinerary', route('umrah-haji-navy.itinerary', absolute: false));
    }
}
