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
    $a = $all->firstWhere('slug', request('asset')) ?? $all->first();
    $c = $cat($a); $creator = $cr($a);
    $related = $all->where('id', '!=', $a['id'])->sortByDesc(fn ($x) => ($x['cat'] === $a['cat'] ? 10 : 0) + count(array_intersect($x['tags'], $a['tags'])) * 3 + $x['rating'])->take(4);
    $dist = [5 => 72, 4 => 19, 3 => 6, 2 => 2, 1 => 1];
@endphp
@section('title', $a['title'] . ' — Astraly')
@section('page', 'product-details')

@section('content')
    <section class="section-sm" style="padding-top:36px">
        <div class="wrap">
            <nav class="crumbs"><a href="{{ $u('') }}">Beranda</a><span>/</span><a href="{{ $u('explore-assets') }}">Jelajahi</a><span>/</span><a href="{{ $u('explore-assets') }}?cat={{ $a['cat'] }}">{{ $c['name'] }}</a><span>/</span><span>{{ $a['title'] }}</span></nav>
            <div class="pd-layout" data-product="{{ $a['id'] }}">
                <div>
                    <div class="pd-viewer" id="pdViewer" data-zoomable><img id="pdImg" src="{{ $img($a['img']) }}" alt="{{ $a['title'] }}" width="1280" height="720"><span class="badge hint">{{ $ic('zoom', 'ico-sm') }} Arahkan kursor untuk zoom</span></div>
                    <div class="pd-thumbs">
                        @foreach (['render' => 'Render', 'wire' => 'Wireframe', 'night' => 'Nebula', 'zoom' => 'Detail'] as $m => $l)
                            <button type="button" class="pd-thumb {{ $loop->first ? 'on' : '' }}" data-mode="{{ $m }}"><img src="{{ $img($a['img']) }}" alt="" width="320" height="180" loading="lazy" style="{{ ['render' => '', 'wire' => 'filter:grayscale(1) contrast(1.6)', 'night' => 'filter:hue-rotate(70deg) saturate(1.3)', 'zoom' => 'transform:scale(1.8)'][$m] }}"><span>{{ $l }}</span></button>
                        @endforeach
                    </div>
                    <div class="mt-10">
                        <div class="tabs" data-tabs>
                            <button type="button" class="tab on" data-tab="desc">Deskripsi</button><button type="button" class="tab" data-tab="spec">Spesifikasi</button><button type="button" class="tab" data-tab="reviews">Ulasan ({{ $a['reviews'] }})</button><button type="button" class="tab" data-tab="license">Lisensi</button>
                        </div>
                        <div class="mt-6">
                            <div class="tab-pane on prose" id="tab-desc">
                                <p>{{ $a['title'] }} adalah aset {{ strtolower($c['name']) }} premium karya {{ $creator['name'] }}. {{ $c['desc'] }}</p>
                                <h2>Yang kamu dapatkan</h2>
                                <ul class="grid gap-2" style="list-style:none;padding:0">@foreach ($c['includes'] as $inc)<li class="flex gap-2 muted"><span style="color:var(--emerald)">{{ $ic('check', 'ico-sm') }}</span>{{ $inc }}</li>@endforeach<li class="flex gap-2 muted"><span style="color:var(--emerald)">{{ $ic('check', 'ico-sm') }}</span>Update gratis & dukungan kreator</li></ul>
                                <div class="chip-row mt-6">@foreach ($a['tags'] as $t)<a class="chip" href="{{ $u('explore-assets') }}?q={{ $t }}">#{{ $t }}</a>@endforeach</div>
                            </div>
                            <div class="tab-pane" id="tab-spec"><div class="spec"><div>Format<b>{{ $a['format'] }}</b></div><div>Ukuran File<b>{{ $a['size'] }}</b></div><div>Kategori<b>{{ $c['name'] }}</b></div><div>Terakhir Diperbarui<b>{{ $a['days'] }} hari lalu</b></div><div>Terjual<b>{{ number_format($a['sales'], 0, ',', '.') }}</b></div><div>Kompatibilitas<b>Windows · macOS · Linux</b></div></div></div>
                            <div class="tab-pane" id="tab-reviews">
                                <div class="grid gap-8 md:grid-cols-[220px_1fr] mb-8">
                                    <div class="text-center glass p-6"><div class="font-bold" style="font-family:var(--ff-head);font-size:52px;line-height:1">{{ $a['rating'] }}</div><div class="flex justify-center mt-2">{{ $stars($a['rating']) }}</div><p class="dim tiny mt-2">{{ $a['reviews'] }} ulasan</p></div>
                                    <div class="grid gap-2 content-center">@foreach ($dist as $s => $pct)<div class="flex items-center gap-3 tiny"><span style="width:28px">{{ $s }} ★</span><div class="bar"><i style="width:{{ $pct }}%"></i></div><span class="dim" style="width:34px">{{ $pct }}%</span></div>@endforeach</div>
                                </div>
                                <div class="grid gap-4" id="reviewList">
                                    @foreach ([['Rafi A.', 5, 'Kualitasnya melampaui ekspektasi. File rapi dan dokumentasinya jelas.', '2 minggu lalu'], ['Dewi W.', 5, 'Sangat membantu pekerjaan klien. Lisensi komersialnya jelas.', '1 bulan lalu'], ['Satria N.', 4, 'Bagus dan mudah dikustomisasi. Semoga ada lebih banyak variasi.', '2 bulan lalu']] as $r)
                                        <article class="review"><header><span class="rav">{{ substr($r[0], 0, 1) }}</span><div><b>{{ $r[0] }}</b><div class="dim tiny">{{ $r[3] }}</div></div><span style="margin-left:auto">{{ $stars($r[1]) }}</span></header><p class="muted">{{ $r[2] }}</p></article>
                                    @endforeach
                                </div>
                                <form class="pd-box mt-8 grid gap-4" id="reviewForm" novalidate>
                                    <h3 class="text-xl">Tulis ulasan</h3>
                                    <div class="rate-input" role="radiogroup" aria-label="Rating">@for ($i = 5; $i >= 1; $i--)<input type="radio" name="rate" id="rt{{ $i }}" value="{{ $i }}" @checked($i == 5)><label for="rt{{ $i }}" title="{{ $i }} bintang"><svg viewBox="0 0 24 24"><path d="M12 2l3 6.6 7.2.8-5.4 4.9 1.5 7.1L12 17.8 5.7 21.4l1.5-7.1L1.8 9.4 9 8.6z"/></svg></label>@endfor</div>
                                    <div class="grid gap-4 sm:grid-cols-2"><div class="field"><label class="label" for="rvName">Nama</label><input class="input" id="rvName" name="name" placeholder="Nama kamu"></div><div class="field"><label class="label" for="rvText">Ulasan</label><input class="input" id="rvText" name="text" placeholder="Bagikan pengalamanmu"></div></div>
                                    <button class="btn btn-primary" type="submit" style="width:max-content">Kirim Ulasan</button>
                                </form>
                            </div>
                            <div class="tab-pane prose" id="tab-license">@foreach ($dam['licenses'] as $l)<h2>{{ $l['name'] }}</h2><p>{{ $l['desc'] }}. {{ implode(' · ', $l['points']) }}.</p>@endforeach<p><a href="{{ $u('legal') }}#license" style="color:var(--cyan)">Baca perjanjian lisensi lengkap</a></p></div>
                        </div>
                    </div>
                </div>

                <aside class="pd-sticky grid gap-5">
                    <div class="pd-box">
                        <div class="flex gap-2 flex-wrap mb-3"><a class="badge b-new" href="{{ $u('explore-assets') }}?cat={{ $a['cat'] }}">{{ $c['name'] }}</a>@if (!$a['price'])<span class="badge b-free">Gratis</span>@endif</div>
                        <h1 style="font-size:clamp(26px,3vw,36px)">{{ $a['title'] }}</h1>
                        <div class="flex items-center gap-3 mt-3 flex-wrap">{{ $stars($a['rating']) }}<span class="muted tiny">{{ $a['rating'] }} ({{ $a['reviews'] }} ulasan) · {{ number_format($a['sales'], 0, ',', '.') }} terjual</span></div>
                        <a href="{{ $u('creator-profile') }}?creator={{ $a['creator'] }}" class="flex items-center gap-3 mt-5 p-3" style="border-radius:16px;background:rgba(255,255,255,.04);border:1px solid var(--line)"><img src="{{ $img($creator['avatar']) }}" alt="" width="44" height="44" style="width:44px;height:44px;border-radius:50%;object-fit:cover"><span><b>{{ $creator['name'] }}</b><br><small class="dim">{{ $creator['role'] }} · {{ $creator['city'] }}</small></span><span style="margin-left:auto;color:var(--cyan)">{{ $ic('arrow', 'ico-sm') }}</span></a>

                        <h3 class="text-lg mt-6 mb-3">Pilih Lisensi</h3>
                        <div class="lic" id="licenseSelector" data-base="{{ $a['price'] }}" data-old="{{ $a['old'] ?? 0 }}">
                            @foreach ($dam['licenses'] as $k => $l)
                                <label><input type="radio" name="license" value="{{ $k }}" data-mult="{{ $l['mult'] }}" @checked($loop->first)>
                                    <span><b>{{ $l['name'] }}</b><br><small class="dim">{{ $l['desc'] }}</small><ul>@foreach ($l['points'] as $pt)<li>• {{ $pt }}</li>@endforeach</ul></span>
                                    <span class="lp" data-lic-price="{{ $k }}">{{ $rp($a['price'] ? round($a['price'] * $l['mult'] / 1000) * 1000 : 0) }}</span></label>
                            @endforeach
                        </div>
                        <div class="flex items-end justify-between mt-6"><span class="dim">Total</span><span class="price" style="font-size:32px"><span data-price-now>{{ $rp($a['price']) }}</span>@if ($a['old'])<s data-price-old>{{ $rp($a['old']) }}</s>@endif</span></div>
                        <div class="grid gap-3 mt-5">
                            @if ($a['price'])
                                <button type="button" class="btn btn-primary btn-lg btn-block" data-add-lic="{{ $a['id'] }}">{{ $ic('cart', 'ico-sm') }} Tambah ke Keranjang</button>
                                <button type="button" class="btn btn-ghost btn-block" data-buy-now="{{ $a['id'] }}">Beli Sekarang</button>
                            @else
                                <button type="button" class="btn btn-primary btn-lg btn-block" data-download="{{ $a['id'] }}">{{ $ic('download', 'ico-sm') }} Unduh Gratis</button>
                            @endif
                            <div class="grid grid-cols-2 gap-3"><button type="button" class="btn btn-ghost" data-wish="{{ $a['id'] }}" data-wish-label>{{ $ic('heart', 'ico-sm') }} Wishlist</button><button type="button" class="btn btn-ghost" data-preview="{{ $a['id'] }}">{{ $ic('eye', 'ico-sm') }} Pratinjau</button></div>
                        </div>
                        <ul class="mt-5 grid gap-2 muted" style="list-style:none;padding:0;font-size:13.5px"><li class="flex gap-2">{{ $ic('bolt', 'ico-sm') }} Unduh instan setelah pembayaran</li><li class="flex gap-2">{{ $ic('shield', 'ico-sm') }} Garansi refund 7 hari</li><li class="flex gap-2">{{ $ic('refresh', 'ico-sm') }} Update gratis sesuai lisensi</li></ul>
                    </div>
                </aside>
            </div>
        </div>
    </section>

    <section class="section-sm">
        <div class="wrap">
            @include($v . '.partials.section-head', ['eyebrow' => 'Rekomendasi AI', 'title' => 'Mungkin Kamu <span class="gt">Suka</span>', 'desc' => 'Dipilih berdasarkan kategori, tag, dan rating yang mirip dengan aset ini.'])
            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">@foreach ($related as $r)@include($v . '.partials.asset-card', ['a' => $r])@endforeach</div>
        </div>
    </section>
@endsection
