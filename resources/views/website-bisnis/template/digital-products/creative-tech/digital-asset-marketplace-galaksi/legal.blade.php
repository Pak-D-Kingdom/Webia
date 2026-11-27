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
@section('title', 'Legal & Lisensi — Astraly')
@section('page', 'legal')

@section('content')
    @include($v . '.partials.page-hero', ['title' => 'Legal &amp; <span class="gt">Lisensi</span>', 'desc' => 'Syarat penggunaan, privasi, lisensi aset, dan kebijakan refund Astraly.', 'crumbs' => [['Legal', null]], 'bg' => 'nebula-cyan-4k.jpg'])
    <section class="section-sm"><div class="wrap grid gap-10 lg:grid-cols-[260px_1fr] items-start">
        <aside class="glass p-3 legal-side" id="legalNav">@foreach ($dam['legal'] as $k => $l)<a href="#{{ $k }}" data-legal="{{ $k }}" class="{{ $loop->first ? 'on' : '' }}">{{ $l[0] }}</a>@endforeach</aside>
        <div>
            @foreach ($dam['legal'] as $k => $l)
                <article class="tab-pane prose {{ $loop->first ? 'on' : '' }}" id="legal-{{ $k }}"><h1 class="text-4xl">{{ $l[0] }}</h1><p class="dim tiny mt-2">Terakhir diperbarui: 1 November 2026</p>@foreach ($l[1] as $i => $s)<h2>{{ $i + 1 }}. {{ $s[0] }}</h2><p>{{ $s[1] }}</p>@endforeach</article>
            @endforeach
        </div>
    </div></section>
@endsection
