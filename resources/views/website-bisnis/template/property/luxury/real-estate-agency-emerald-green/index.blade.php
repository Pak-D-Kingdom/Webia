{{--
|--------------------------------------------------------------------------
| GreenHaven · Real Estate Agency · Luxury / Emerald Green
|--------------------------------------------------------------------------
| View  : website-bisnis.template.property.luxury.real-estate-agency-emerald-green.index
| Data  : config/template/property/luxury/real-estate-agency-emerald-green/real-estate-agency.php
| CSS   : public/css/website-bisnis/template/property/luxury/real-estate-agency-emerald-green/real-estate-agency.css
| JS    : public/js/website-bisnis/template/property/luxury/real-estate-agency-emerald-green/real-estate-agency.js
| Gambar: public/images/website-bisnis/template/property/luxury/real-estate-agency-emerald-green/
--}}
@php
    // Nama view dasar (untuk @include layouts/partials/sections)
    $v   = 'website-bisnis.template.property.luxury.real-estate-agency-emerald-green';

    // Data halaman dari config
    $cfg       = config('template.property.luxury.real-estate-agency-emerald-green.real-estate-agency');
    $paths     = $cfg['paths'];
    $site      = $cfg['site'];
    $nav       = $cfg['nav'];
    $property  = $cfg['property'];
    $features  = $cfg['features'];
    $assistant = $cfg['assistant'];
    $timeSlots = $cfg['time_slots'];

    // Helper
    $img  = fn (string $file): string => asset($paths['images'] . '/' . $file);
    $icon = fn (string $name, string $class = ''): \Illuminate\Support\HtmlString => new \Illuminate\Support\HtmlString(
        '<svg class="rea-icon ' . e($class) . '" aria-hidden="true" focusable="false"><use href="#i-' . e($name) . '"></use></svg>'
    );

    // Lengkapi URL gambar untuk slider & galeri
    $property['slides']  = array_map(fn (array $s): array => $s + ['src' => $img($s['file'])], $property['slides']);
    $property['gallery'] = array_map(fn (array $g): array => $g + ['src' => $img($g['file'])], $property['gallery']);
@endphp

@extends($v . '.layouts.app')

@section('content')
    {{-- Property listing --}}
    @include($v . '.sections.hero')

    <div class="rea-container rea-layout">
        <div class="rea-layout__main">
            <div class="rea-split">
                {{-- Gallery --}}
                @include($v . '.sections.gallery')

                {{-- Specification + Location --}}
                @include($v . '.sections.details')
            </div>

            {{-- Booking / Viewing --}}
            @include($v . '.sections.booking')
        </div>

        <aside class="rea-layout__aside" aria-label="Price and inquiry">
            {{-- Price --}}
            @include($v . '.sections.price')

            {{-- Inquiry --}}
            @include($v . '.sections.inquiry')
        </aside>
    </div>

    {{-- Highlights --}}
    @include($v . '.sections.features')
@endsection
