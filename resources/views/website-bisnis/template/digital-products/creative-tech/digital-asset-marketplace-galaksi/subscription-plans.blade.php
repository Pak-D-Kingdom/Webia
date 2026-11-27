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
@section('title', 'Paket Langganan — Astraly')
@section('page', 'subscription-plans')

@section('content')
    @include($v . '.partials.page-hero', ['title' => 'Pilih Paket <span class="gt">Langganan</span>', 'desc' => 'Akses aset premium tanpa batas dengan lisensi komersial. Batalkan kapan saja.', 'crumbs' => [['Langganan', null]]])
    <section class="section-sm"><div class="wrap">
        <div class="text-center mb-12"><div class="switch" id="billingSwitch"><button type="button" class="on" data-billing="m">Bulanan</button><button type="button" data-billing="y">Tahunan <span class="badge b-hot" style="margin-left:6px">-20%</span></button></div></div>
        <div class="grid gap-6 lg:grid-cols-3 items-stretch">
            @foreach ($dam['plans'] as $p)
                <div class="plan reveal {{ $p[5] ? 'pop' : '' }}" style="--d:{{ $loop->index * .1 }}s">
                    @if ($p[5])<span class="badge b-hot ribbon">Paling Populer</span>@endif
                    <div><h3 class="text-2xl">{{ $p[0] }}</h3><p class="muted mt-1">{{ $p[3] }}</p></div>
                    <div class="price" style="font-size:40px"><span data-price-m="{{ $p[1] }}" data-price-y="{{ $p[2] }}">{{ $rp($p[1]) }}</span><small class="dim" style="font-size:14px;font-weight:400">{{ $p[1] ? ' / bulan' : '' }}</small></div>
                    <ul>@foreach ($p[4] as $f)<li>{{ $ic('check', 'ico-sm') }} {{ $f }}</li>@endforeach</ul>
                    <button type="button" class="btn {{ $p[5] ? 'btn-primary' : 'btn-ghost' }} btn-block mt-auto" data-toast="Paket {{ $p[0] }} dipilih (demo)">{{ $p[1] ? 'Pilih ' . $p[0] : 'Mulai Gratis' }}</button>
                </div>
            @endforeach
        </div>
        <div class="mt-16"><h2 class="h2 mb-6">Bandingkan <span class="gt">Fitur</span></h2>
            <div class="table-wrap"><table><thead><tr><th>Fitur</th><th>Starter</th><th>Pro</th><th>Studio</th></tr></thead><tbody>
                @foreach ([['Unduhan premium', '5 / bulan', 'Tanpa batas', 'Tanpa batas'], ['Lisensi', 'Personal', 'Komersial', 'Extended'], ['Anggota tim', '1', '1', '10'], ['Diskon aset', '-', '20%', '30%'], ['Support', 'Komunitas', 'Prioritas', 'Account manager']] as $r)<tr><td>{{ $r[0] }}</td><td>{{ $r[1] }}</td><td>{{ $r[2] }}</td><td>{{ $r[3] }}</td></tr>@endforeach
            </tbody></table></div></div>
    </div></section>
    @include($v . '.sections.faq')
@endsection
