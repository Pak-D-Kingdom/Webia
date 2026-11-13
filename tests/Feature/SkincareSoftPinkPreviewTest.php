<?php

namespace Tests\Feature;

use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class SkincareSoftPinkPreviewTest extends TestCase
{
    #[DataProvider('previewPages')]
    public function test_preview_marks_current_navigation_item_active(string $path, string $label): void
    {
        $this->get('/webia/template/retail/luxury/skincare-soft-pink'.$path)
            ->assertOk()
            ->assertSeeInOrder([
                'class="nav__link is-active"',
                'aria-current="page"',
                '>'.$label.'</a>',
            ], false);
    }

    /**
     * @return array<string, array{string, string}>
     */
    public static function previewPages(): array
    {
        return [
            'home' => ['', 'Home'],
            'catalog' => ['/catalog', 'Katalog'],
            'price' => ['/price', 'Harga'],
            'stock' => ['/stock', 'Stok'],
            'shop' => ['/shop', 'Toko Online'],
            'inquiry' => ['/inquiry', 'Inquiry'],
        ];
    }
}
