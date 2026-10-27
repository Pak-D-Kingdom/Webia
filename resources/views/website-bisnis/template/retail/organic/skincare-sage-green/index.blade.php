@php
    $active = 'home';
    $cfg = config('template.retail.organic.skincare-sage-green.skincare');
@endphp
@extends($cfg['view'] . 'layouts.app')

@section('title', 'PureGlow — Natural Skincare & Beauty')

@section('content')
    @include($cfg['view'] . 'sections.hero')
    @include($cfg['view'] . 'sections.categories')

    {{-- Katalog (preview) + banner koleksi + AI Beauty Assistant --}}
    <div class="container home-grid">
        @include($cfg['view'] . 'sections.banners', ['which' => 'collection'])
        @include($cfg['view'] . 'sections.catalog', ['full' => false])
        @include($cfg['view'] . 'sections.ai-faq')
    </div>

    {{-- Banner perawatan + layanan + info promo --}}
    <div class="container home-row">
        @include($cfg['view'] . 'sections.banners', ['which' => 'care'])
        @include($cfg['view'] . 'sections.features')
        @include($cfg['view'] . 'sections.newsletter')
    </div>

    {{-- Preview halaman lain --}}
    @include($cfg['view'] . 'sections.price', ['full' => false])
    @include($cfg['view'] . 'sections.stock', ['full' => false])
    @include($cfg['view'] . 'sections.shop', ['full' => false])
    @include($cfg['view'] . 'sections.inquiry', ['full' => false])
@endsection
