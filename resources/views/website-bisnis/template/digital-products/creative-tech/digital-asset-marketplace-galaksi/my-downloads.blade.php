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
@section('title', 'Unduhan Saya — Astraly')
@section('page', 'my-downloads')

@section('content')
    @include($v . '.partials.page-hero', ['title' => 'Unduhan <span class="gt">Saya</span>', 'desc' => 'Perpustakaan aset yang sudah kamu miliki. Unduh ulang kapan saja.', 'crumbs' => [['Unduhan Saya', null]], 'bg' => 'nebula-cyan-4k.jpg'])
    <section class="section-sm"><div class="wrap">
        <div class="toolbar"><p class="muted"><b id="dlCount" style="color:var(--tx)">0</b> aset di perpustakaanmu</p><a href="{{ $u('explore-assets') }}" class="btn btn-ghost btn-sm">Cari aset lain</a></div>
        <div class="grid gap-4" id="dlList"></div>
        <div class="empty hidden" id="dlEmpty">{{ $ic('download') }}<h3 class="text-xl" style="color:var(--tx)">Belum ada unduhan</h3><p class="mt-2">Aset yang kamu beli atau unduh gratis akan muncul di sini.</p><a href="{{ $u('explore-assets') }}" class="btn btn-primary mt-5">Jelajahi Aset</a></div>
    </div></section>
@endsection
