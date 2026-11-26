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
@php
    $cid = isset($dam['creators'][request('creator')]) ? request('creator') : 'c01';
    $c = $dam['creators'][$cid];
    $items = $all->where('creator', $cid)->values();
@endphp
@section('title', $c['name'] . ' — Kreator Astraly')
@section('page', 'creator-profile')

@section('content')
    <section class="section-sm" style="padding-top:36px">
        <div class="wrap">
            <nav class="crumbs"><a href="{{ $u('') }}">Beranda</a><span>/</span><span>Kreator</span><span>/</span><span>{{ $c['name'] }}</span></nav>
            <div class="profile-head glass">
                <div class="profile-cover" style="background-image:url('{{ $img('backgrounds/nebula-' . ['violet', 'cyan', 'rose'][(int) substr($cid, 1) % 3] . '-4k.jpg') }}')"></div>
                <div class="profile-info">
                    <div class="av"><img src="{{ $img($c['avatar']) }}" alt="{{ $c['name'] }}" width="112" height="112"></div>
                    <div class="flex-1" style="min-width:220px"><h1 class="text-3xl flex items-center gap-2">{{ $c['name'] }} <span style="color:var(--cyan)">{{ $ic('shield') }}</span></h1><p class="muted">{{ $c['handle'] }} · {{ $c['role'] }} · {{ $c['city'] }}</p></div>
                    <div class="flex gap-3 flex-wrap"><button type="button" class="btn btn-primary" data-follow>{{ $ic('plus', 'ico-sm') }} <span>Ikuti</span></button><a class="btn btn-ghost" href="https://wa.me/{{ $dam['whatsapp']['number'] }}?text={{ rawurlencode('Halo ' . $c['name'] . ', saya tertarik dengan karyamu di Astraly.') }}" target="_blank" rel="noopener">{{ $ic('chat', 'ico-sm') }} Hubungi</a></div>
                </div>
                <div class="grid grid-cols-3 gap-4 p-6 text-center" style="border-top:1px solid var(--line)"><div><b class="text-2xl" style="font-family:var(--ff-head)">{{ $c['assets'] }}</b><p class="dim tiny">Aset</p></div><div><b class="text-2xl" style="font-family:var(--ff-head)">{{ $c['followers'] }}</b><p class="dim tiny">Pengikut</p></div><div><b class="text-2xl" style="font-family:var(--ff-head)">{{ $c['rating'] }}</b><p class="dim tiny">Rating</p></div></div>
            </div>
            <div class="mt-10">
                <div class="tabs" data-tabs><button type="button" class="tab on" data-tab="assets">Aset ({{ $items->count() }})</button><button type="button" class="tab" data-tab="about">Tentang</button><button type="button" class="tab" data-tab="others">Kreator Lain</button></div>
                <div class="mt-8">
                    <div class="tab-pane on" id="tab-assets"><div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">@foreach ($items as $a)@include($v . '.partials.asset-card', ['a' => $a])@endforeach</div></div>
                    <div class="tab-pane prose" id="tab-about"><p>{{ $c['bio'] }}</p><p>Bergabung di Astraly sejak 2024 dengan {{ $c['assets'] }} aset terbit dan komunitas {{ $c['followers'] }} pengikut. Semua aset melalui kurasi kualitas Astraly dan dilengkapi lisensi yang jelas.</p></div>
                    <div class="tab-pane" id="tab-others"><div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-4">@foreach (collect($dam['creators'])->except($cid)->take(4) as $oid => $o)@include($v . '.partials.creator-card', ['cid' => $oid, 'c' => $o])@endforeach</div></div>
                </div>
            </div>
        </div>
    </section>
@endsection
