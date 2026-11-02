@extends('website-bisnis.template.interior&architecture.luxury.furniture-chocolate-luxe.layouts.app')

@section('title', 'Beranda')

@section('content')
    @php
        $f = $furniture;
        $a = fn ($path) => asset($path);
        $v = 'website-bisnis.template.interior&architecture.luxury.furniture-chocolate-luxe.sections';
    @endphp

    {{-- Hero banner (preview utama; halaman lengkap: /hero) --}}
    @include($v . '.hero')

    <section class="lf-home">
        <div class="lf-container">
            <div class="lf-bento">
                {{-- Furniture catalog --}}
                <div class="lf-bento__catalog">@include($v . '.catalog-preview')</div>

                <div class="lf-bento__right">
                    <div class="lf-bento__row1">
                        <div class="lf-bento__cats">@include($v . '.categories-preview')</div>

                        {{-- Custom design options --}}
                        <div class="lf-bento__custom">@include($v . '.custom-design-preview')</div>
                    </div>

                    <div class="lf-bento__row2">
                        {{-- Materials & finishes --}}
                        @include($v . '.mini-preview', [
                            'miniTitle' => $f['materials']['title'], 'miniText' => $f['materials']['text'],
                            'miniImage' => $f['materials']['image'], 'miniRoute' => 'materials', 'miniCta' => 'Lihat Pilihan',
                        ])

                        {{-- Product dimensions --}}
                        @include($v . '.mini-preview', [
                            'miniTitle' => 'Product Dimensions', 'miniText' => $f['dimensions']['text'],
                            'miniImage' => $f['dimensions']['image'], 'miniRoute' => 'dimensions', 'miniCta' => 'Lihat Detail',
                        ])

                        {{-- Project gallery (kartu kecil) --}}
                        @include($v . '.mini-preview', [
                            'miniTitle' => $f['gallery']['title'], 'miniText' => 'Lihat hasil karya dan proyek custom kami.',
                            'miniImage' => $f['gallery']['collage'], 'miniRoute' => 'gallery', 'miniCta' => 'Lihat Galeri',
                        ])

                        {{-- Custom order form --}}
                        <div class="lf-bento__order">@include($v . '.order-preview')</div>

                        {{-- Production lead time --}}
                        @include($v . '.icon-preview', [
                            'iconName' => 'timer', 'iconTitle' => $f['lead_time']['title'], 'iconText' => $f['lead_time']['text'],
                            'iconRoute' => 'lead-time', 'iconCta' => 'Lihat Estimasi',
                        ])

                        {{-- Quotation request --}}
                        @include($v . '.icon-preview', [
                            'iconName' => 'quote', 'iconTitle' => $f['quotation']['title'], 'iconText' => $f['quotation']['text'],
                            'iconRoute' => 'quotation', 'iconCta' => 'Minta Penawaran',
                        ])
                    </div>
                </div>
            </div>

            <div class="lf-bento__row3">
                {{-- Project gallery (slider) --}}
                <div class="lf-bento__slider">@include($v . '.gallery-preview')</div>

                {{-- AI assistant --}}
                <div class="lf-bento__ai">@include($v . '.ai-preview')</div>
            </div>
        </div>
    </section>
@endsection
