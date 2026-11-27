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
@section('title', 'Kategori Aset — Astraly')
@section('page', 'categories')

@section('content')
    @include($v . '.partials.page-hero', ['title' => 'Semua <span class="gt">Kategori</span>', 'desc' => 'Delapan semesta aset digital untuk setiap kebutuhan kreatif.', 'crumbs' => [['Kategori', null]], 'bg' => 'nebula-cyan-4k.jpg'])
    <section class="section-sm">
        <div class="wrap grid gap-6 md:grid-cols-2">
            @foreach ($dam['categories'] as $slug => $c)
                @php $items = $all->where('cat', $slug)->values(); @endphp
                <div class="glass p-6 reveal tone-{{ $c['tone'] }}" style="--d:{{ $loop->index % 2 * .08 }}s">
                    <div class="flex items-start gap-4">
                        <span class="cat-card ci" style="width:60px;height:60px;border-radius:18px;display:grid;place-items:center;background:linear-gradient(135deg,var(--c),rgba(255,255,255,.1));padding:0;border:0;flex:none">{{ $ic($c['icon'], 'ico-lg') }}</span>
                        <div class="flex-1"><h2 class="text-2xl">{{ $c['name'] }}</h2><p class="muted mt-1">{{ $c['desc'] }}</p></div>
                    </div>
                    <ul class="mt-5 grid gap-2" style="list-style:none;padding:0">@foreach ($c['includes'] as $inc)<li class="flex gap-2 muted" style="font-size:14.5px"><span style="color:var(--emerald)">{{ $ic('check', 'ico-sm') }}</span>{{ $inc }}</li>@endforeach</ul>
                    <div class="grid grid-cols-3 gap-3 mt-6">
                        @foreach ($items as $it)<a href="{{ $aurl($it) }}" title="{{ $it['title'] }}"><img src="{{ $img($it['img']) }}" alt="{{ $it['title'] }}" width="1280" height="720" loading="lazy" style="border-radius:14px;aspect-ratio:16/10;object-fit:cover;width:100%"></a>@endforeach
                    </div>
                    <a href="{{ $u('explore-assets') }}?cat={{ $slug }}" class="btn btn-ghost btn-block mt-6">Lihat {{ $c['name'] }} {{ $ic('arrow', 'ico-sm') }}</a>
                </div>
            @endforeach
        </div>
    </section>
@endsection
