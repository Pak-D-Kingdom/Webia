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
@section('title', 'Pusat Bantuan — Astraly')
@section('page', 'help-center')

@section('content')
    @include($v . '.partials.page-hero', ['title' => 'Pusat <span class="gt">Bantuan</span>', 'desc' => 'Temukan panduan dan jawaban cepat seputar Astraly.', 'crumbs' => [['Pusat Bantuan', null]]])
    <section class="section-sm"><div class="wrap">
        <div class="search-field big mx-auto" style="max-width:680px">{{ $ic('search') }}<input type="search" id="helpSearch" placeholder="Cari artikel bantuan…" aria-label="Cari bantuan" autocomplete="off"><button type="button" class="sf-clear" data-clear="#helpSearch" aria-label="Hapus">{{ $ic('close', 'ico-sm') }}</button></div>
        <div class="chip-row justify-center mt-4">@foreach (['lisensi', 'pembayaran', 'unduh', 'refund', 'kreator'] as $hq)<button type="button" class="chip" data-fill-input="#helpSearch" data-v="{{ $hq }}">{{ $hq }}</button>@endforeach</div>
        <div class="grid gap-5 md:grid-cols-2 lg:grid-cols-3 mt-12" id="helpGrid">
            @foreach ($dam['help'] as $h)
                <div class="why-card help-card reveal" data-text="{{ strtolower($h[0] . ' ' . implode(' ', $h[2])) }}"><span class="wi">{{ $ic($h[1], 'ico-lg') }}</span><h3>{{ $h[0] }}</h3><ul class="grid gap-2 mt-3" style="list-style:none;padding:0">@foreach ($h[2] as $art)<li><a href="{{ $u('contact-us') }}" class="flex justify-between muted" style="font-size:14.5px;padding:6px 0">{{ $art }} {{ $ic('arrow', 'ico-sm') }}</a></li>@endforeach</ul></div>
            @endforeach
        </div>
        <div class="empty hidden mt-8" id="helpEmpty">{{ $ic('search') }}<p>Tidak ada artikel yang cocok. Coba tanyakan ke Nova atau hubungi kami.</p></div>
        <div class="glass glow-border p-8 mt-12 text-center"><h3 class="text-2xl">Masih butuh bantuan?</h3><p class="muted mt-2">Tanya Nova atau hubungi tim kami langsung.</p><div class="flex gap-3 justify-center flex-wrap mt-5"><button type="button" class="btn btn-primary" data-chat-open>{{ $ic('chat', 'ico-sm') }} Tanya Nova</button><a href="{{ $u('contact-us') }}" class="btn btn-ghost">Hubungi Kami</a></div></div>
        <div class="mt-16"><div class="sec-head"><div class="ttl"><span class="eyebrow">FAQ</span><h2 class="h2">Pertanyaan Populer</h2></div></div><div class="acc">@foreach ($dam['faqs'] as $f)<details><summary>{{ $f[0] }} {{ $ic('plus') }}</summary><p class="ans">{{ $f[1] }}</p></details>@endforeach</div></div>
    </div></section>
@endsection
