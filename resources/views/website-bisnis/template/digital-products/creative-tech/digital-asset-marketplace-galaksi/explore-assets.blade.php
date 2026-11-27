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
@section('title', 'Jelajahi Aset — Astraly')
@section('page', 'explore-assets')

@section('content')
    @include($v . '.partials.page-hero', ['title' => 'Jelajahi <span class="gt">Aset Digital</span>', 'desc' => 'Cari dengan filter lanjutan, urutkan, dan pratinjau aset sebelum membeli.', 'crumbs' => [['Jelajahi Aset', null]]])
    <section class="section-sm">
        <div class="wrap">
            <div class="mb-10">@include($v . '.partials.ai-recommend')</div>
            <div class="explore-layout">
                <aside class="filters mobile-hidden" id="filters" aria-label="Filter lanjutan">
                    <form id="filterForm" onsubmit="return false">
                        <div class="flex items-center justify-between mb-4"><h3 class="text-xl">Filter</h3><button type="button" class="tiny" style="color:var(--cyan)" id="filterReset">Reset</button></div>
                        <div class="filter-group"><h4>Kata Kunci</h4><label class="sf" style="display:flex;gap:10px;align-items:center" for="fq"><input class="input" id="fq" type="search" name="q" placeholder="Cari judul, tag, kreator…" autocomplete="off"></label></div>
                        <div class="filter-group"><h4>Kategori</h4>
                            @foreach ($dam['categories'] as $slug => $c)
                                <div class="opt"><label><input type="checkbox" name="cat" value="{{ $slug }}"> {{ $c['name'] }}</label><em>{{ $all->where('cat', $slug)->count() }}</em></div>
                            @endforeach
                        </div>
                        <div class="filter-group"><h4>Harga Maksimal: <b id="pmaxLabel" style="color:var(--tx)">Bebas</b></h4><input class="range" type="range" name="pmax" min="0" max="500000" step="25000" value="500000" aria-label="Harga maksimal"></div>
                        <div class="filter-group"><h4>Rating Minimal</h4>
                            @foreach (['0' => 'Semua rating', '4' => '4.0 ke atas', '4.5' => '4.5 ke atas', '4.8' => '4.8 ke atas'] as $val => $lbl)
                                <div class="opt"><label><input type="radio" name="rating" value="{{ $val }}" @checked($val == 0)> {{ $lbl }}</label></div>
                            @endforeach
                        </div>
                        <div class="filter-group"><h4>Format File</h4>
                            <div class="chip-row">@foreach (['figma', 'fbx', 'svg', 'wav', 'mov', 'pdf', 'html'] as $f)<label class="chip"><input type="checkbox" name="format" value="{{ $f }}" class="hidden">{{ strtoupper($f) }}</label>@endforeach</div>
                        </div>
                        <div class="filter-group"><h4>Penawaran</h4>
                            <div class="opt"><label><input type="checkbox" name="free"> Hanya gratis</label></div>
                            <div class="opt"><label><input type="checkbox" name="sale"> Sedang diskon</label></div>
                        </div>
                    </form>
                </aside>
                <div>
                    <div class="toolbar">
                        <div class="flex items-center gap-3 flex-wrap"><button type="button" class="btn btn-ghost btn-sm lg:hidden" id="filterToggle">{{ $ic('filter', 'ico-sm') }} Filter</button><p class="muted"><b id="resultCount" style="color:var(--tx)">{{ $all->count() }}</b> aset ditemukan</p></div>
                        <label class="flex items-center gap-3"><span class="dim tiny hidden sm:inline">Urutkan</span>
                            <select class="select" id="sortSelect" style="width:auto;padding-block:10px" aria-label="Urutkan">
                                <option value="relevance">Paling Relevan</option><option value="popular">Terpopuler</option><option value="new">Terbaru</option><option value="rating">Rating Tertinggi</option><option value="price-asc">Harga Terendah</option><option value="price-desc">Harga Tertinggi</option>
                            </select>
                        </label>
                    </div>
                    <div class="chip-row mb-5" id="activeFilters"></div>
                    <div class="grid gap-6 sm:grid-cols-2 xl:grid-cols-3" id="assetGrid">
                        @foreach ($all as $a)@include($v . '.partials.asset-card', ['a' => $a])@endforeach
                    </div>
                    <div class="empty hidden" id="assetEmpty">{{ $ic('search') }}<h3 class="text-xl" style="color:var(--tx)">Aset tidak ditemukan</h3><p class="mt-2">Coba ubah kata kunci atau reset filter.</p><button type="button" class="btn btn-primary btn-sm mt-5" id="emptyReset">Reset Filter</button></div>
                    <div class="text-center mt-10"><button type="button" class="btn btn-ghost" id="loadMore">Muat Lebih Banyak {{ $ic('chev', 'ico-sm') }}</button></div>
                </div>
            </div>
        </div>
    </section>
@endsection
