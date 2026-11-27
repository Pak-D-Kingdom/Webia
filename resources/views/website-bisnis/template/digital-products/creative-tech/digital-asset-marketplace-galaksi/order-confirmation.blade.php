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
@section('title', 'Pesanan Berhasil — Astraly')
@section('page', 'order-confirmation')

@section('content')
    <section class="section"><div class="wrap" style="max-width:820px">
        <div id="orderRoot" class="text-center">
            <div class="success-ring">{{ $ic('check', 'ico-lg') }}</div>
            <h1 class="h2">Pembayaran <span class="gt">Berhasil!</span></h1>
            <p class="lead">Terima kasih. Aset kamu sudah siap diunduh.</p>
            <div class="glass p-6 mt-8 text-left grid gap-4" id="orderBox"></div>
            <div class="flex gap-3 justify-center flex-wrap mt-8"><a href="{{ $u('my-downloads') }}" class="btn btn-primary btn-lg">{{ $ic('download', 'ico-sm') }} Buka Unduhan Saya</a><a href="{{ $u('explore-assets') }}" class="btn btn-ghost btn-lg">Lanjut Belanja</a></div>
        </div>
    </div></section>
@endsection
