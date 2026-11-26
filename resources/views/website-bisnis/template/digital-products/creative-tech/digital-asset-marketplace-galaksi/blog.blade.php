@php
    $dam = config('template.digital-products.creative-tech.digital-asset-marketplace-galaksi.digital-asset-marketplace');
    $v = 'website-bisnis.template.digital-products.creative-tech.digital-asset-marketplace-galaksi';
    $u = fn ($p = '') => url(trim($dam['base_path'] . '/' . $p, '/'));
    $img = fn ($f) => asset($dam['assets_path']['images'] . '/' . $f);
    $rp = fn ($n) => $n ? 'Rp ' . number_format($n, 0, ',', '.') : 'Gratis';
    $ic = fn ($n, $c = '') => new \Illuminate\Support\HtmlString('<svg class="ico ' . $c . '" viewBox="0 0 24 24" aria-hidden="true">' . ($dam['icons'][$n] ?? '') . '</svg>');
    $stars = fn ($r) => new \Illuminate\Support\HtmlString('<span class="stars" aria-label="Rating ' . $r . '">' . collect(range(1, 5))->map(fn ($i) => '<svg viewBox="0 0 24 24"' . ($i <= round($r) ? '' : ' class="off"') . '><path d="M12 2l3 6.6 7.2.8-5.4 4.9 1.5 7.1L12 17.8 5.7 21.4l1.5-7.1L1.8 9.4 9 8.6z"/></svg>')->implode('') . '</span>');
    $aurl = fn ($a) => $u('product-details') . '?asset=' . $a['slug'];
    $cat = fn ($a) => $dam['categories'][$a['cat']];
    $cr = fn ($a) => $dam['creators'][$a['creator']];
    $all = collect($dam['assets']);
@endphp
@extends($v . '.layouts.app')
@php $feat = $dam['posts'][0]; $cats = collect($dam['posts'])->pluck(1)->unique(); @endphp
@section('title', 'Blog — Astraly')
@section('page', 'blog')

@section('content')
    @include($v . '.partials.page-hero', ['title' => 'Blog <span class="gt">Astraly</span>', 'desc' => 'Tren, panduan, dan kisah inspiratif dari dunia aset digital.', 'crumbs' => [['Blog', null]], 'bg' => 'nebula-rose-4k.jpg'])
    <section class="section-sm"><div class="wrap">
        <a href="#" class="ef-main reveal" data-toast="Artikel lengkap hadir di versi dinamis (demo)" style="min-height:380px;border:1px solid var(--line-2)"><img src="{{ $img($feat[5]) }}" alt="{{ $feat[0] }}" width="1280" height="720"><div class="in"><span class="badge b-hot">Artikel Utama</span><h2 class="text-3xl mt-4">{{ $feat[0] }}</h2><p class="muted mt-3">{{ $feat[4] }}</p><p class="dim tiny mt-4">{{ $feat[2] }} · {{ $feat[3] }} baca</p></div></a>
        <div class="chip-row mt-10" id="blogFilters"><button type="button" class="chip on" data-blog-filter="all">Semua</button>@foreach ($cats as $c)<button type="button" class="chip" data-blog-filter="{{ $c }}">{{ $c }}</button>@endforeach</div>
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3 mt-8" id="blogGrid">
            @foreach ($dam['posts'] as $p)
                <article class="blog-card reveal" style="--d:{{ $loop->index % 3 * .08 }}s" data-cat="{{ $p[1] }}"><a href="#" class="bc-i" data-toast="Artikel lengkap hadir di versi dinamis (demo)"><img src="{{ $img($p[5]) }}" alt="{{ $p[0] }}" width="1280" height="720" loading="lazy"></a><div class="bc-b"><div class="flex items-center gap-3"><span class="badge b-new">{{ $p[1] }}</span><span class="dim tiny">{{ $p[2] }} · {{ $p[3] }}</span></div><h3>{{ $p[0] }}</h3><p>{{ $p[4] }}</p></div></article>
            @endforeach
        </div>
    </div></section>
    @include($v . '.sections.newsletter')
@endsection
