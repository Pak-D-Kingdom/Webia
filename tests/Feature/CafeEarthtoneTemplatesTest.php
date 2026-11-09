<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CafeEarthtoneTemplatesTest extends TestCase
{
    use RefreshDatabase;

    public function test_vintage_preview_renders_demo_brand(): void
    {
        $this->get('/webia/template/fnb/vintage')
            ->assertOk()
            ->assertSee('Kopi Lembang')
            ->assertSee('/webia/template/fnb/vintage/menu', false);
    }

    public function test_elegant_preview_renders_demo_brand(): void
    {
        $this->get('/webia/template/fnb/elegan')
            ->assertOk()
            ->assertSee('The Lumière')
            ->assertSee('/webia/template/fnb/elegan/menu', false);
    }

    public function test_minimalis_preview_renders_demo_brand(): void
    {
        $this->get('/webia/template/fnb/minimalis')
            ->assertOk()
            ->assertSee('Origins Cafe')
            ->assertSee('/webia/template/fnb/minimalis/menu', false);
    }
}
