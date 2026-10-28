<?php

namespace App\Http\Controllers;

use App\Models\WebiaOrder;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CustomerSiteController extends Controller
{
    public function __invoke(WebiaOrder $order, ?string $page = null): View
    {
        abort_unless(
            $order->delivery_status === 'delivered'
            && $order->supportsCustomerSite(),
            404,
        );

        $page = $page ?? 'home';
        $views = [
            'home' => 'index',
            'menu' => 'menu',
            'reservasi' => 'reservasi',
        ];
        abort_unless(isset($views[$page]), 404);

        $business = $order->business_data ?? [];
        $whatsapp = $this->whatsappNumber($business['whatsapp'] ?? '');
        $instagram = ltrim($business['instagram'] ?? '', '@');
        $cafe = array_replace(config('template.f&b.minimalis.cafe-earthtone.cafe'), [
            'name' => $business['business_name'] ?? 'Cafe',
            'tagline' => ($business['tagline'] ?? null) ?: 'Cafe & Eatery',
            'hero_title' => ($business['tagline'] ?? null) ?: ($business['business_name'] ?? 'Cafe & Eatery'),
            'description' => ($business['description'] ?? null) ?: 'Tempat nyaman untuk menikmati kopi, makanan, dan kebersamaan.',
            'phone' => $business['whatsapp'] ?? '',
            'whatsapp' => $whatsapp,
            'email' => $order->user?->email ?? '',
            'address' => $business['address'] ?? '',
            'city' => $business['city'] ?? '',
            'city_short' => $business['city'] ?? '',
            'social' => $instagram === '' ? [] : [['Instagram', 'ig', 'https://instagram.com/'.$instagram]],
        ]);
        config(['cafe' => $cafe]);

        $path = 'website-bisnis/template/f&b/minimalis/cafe-earthtone';
        $view = str_replace('/', '.', $path);

        return view($view.'.'.$views[$page], [
            'v' => $view,
            'path' => $path,
            'currentPage' => $page,
            'pageUrl' => fn (string $name = 'home', string $hash = ''): string => route('sites.show', [
                'order' => $order->site_slug,
                'page' => $name === 'home' ? null : $name,
            ]).$hash,
        ]);
    }

    private function whatsappNumber(string $number): string
    {
        $digits = preg_replace('/\D/', '', $number) ?? '';

        return Str::startsWith($digits, '0') ? '62'.substr($digits, 1) : $digits;
    }
}
