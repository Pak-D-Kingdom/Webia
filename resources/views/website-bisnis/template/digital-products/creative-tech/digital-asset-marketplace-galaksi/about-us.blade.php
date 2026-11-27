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
@section('title', 'Tentang Kami — Astraly')
@section('page', 'about-us')

@section('content')
    @include($v . '.partials.page-hero', ['title' => 'Menghubungkan <span class="gt">Kreator</span> dengan Dunia', 'desc' => 'Astraly lahir dari keyakinan bahwa karya kreatif layak dihargai dan mudah ditemukan.', 'crumbs' => [['Tentang Kami', null]]])
    <section class="section-sm"><div class="wrap grid gap-10 lg:grid-cols-2 items-center">
        <div class="reveal reveal-l"><span class="eyebrow">Cerita Kami</span><h2 class="h2">Dari komunitas kecil menuju <span class="gt">galaksi aset</span></h2><p class="lead">Dimulai pada 2024 oleh sekelompok desainer, developer, dan komposer di Surabaya, Astraly kini menjadi rumah bagi ribuan kreator dan puluhan ribu aset digital.</p><p class="muted mt-4">Kami percaya marketplace yang baik harus adil: pembeli mendapat kualitas dan lisensi yang jelas, kreator mendapat bagi hasil yang layak.</p></div>
        <div class="relative reveal reveal-r"><img src="{{ $img('collections/col01.jpg') }}" alt="Galaksi Astraly" width="1280" height="720" style="border-radius:28px;border:1px solid var(--line-2);box-shadow:var(--shadow)"><div class="glass p-4 absolute" style="bottom:-20px;left:-10px;display:flex;gap:12px;align-items:center">@include($v . '.partials.mascot', ['mid' => 'ab', 'mclass' => 'mascot-hello'])<div><b>Nova</b><p class="dim tiny">Maskot &amp; asisten AI</p></div></div></div>
    </div></section>
    <section class="section-sm"><div class="wrap grid grid-cols-2 lg:grid-cols-4 gap-5">@foreach ([['12400', '+', 'Aset Premium'], ['3800', '+', 'Kreator'], ['96', 'K', 'Unduhan'], ['4.9', '', 'Rating Rata-rata']] as $s)<div class="stat text-center reveal"><strong class="gt" data-count="{{ $s[0] }}" data-suffix="{{ $s[1] }}">0</strong><small>{{ $s[2] }}</small></div>@endforeach</div></section>
    <section class="section-sm"><div class="wrap">@include($v . '.partials.section-head', ['eyebrow' => 'Nilai Kami', 'title' => 'Yang Kami <span class="gt">Pegang Teguh</span>'])<div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-4">@foreach ([['crown', 'Kualitas', 'Setiap aset dikurasi sebelum tayang.'], ['shield', 'Kejelasan', 'Lisensi dan harga transparan.'], ['wallet', 'Keadilan', 'Bagi hasil terbaik untuk kreator.'], ['rocket', 'Inovasi', 'AI dan teknologi untuk berkarya.']] as $v_)<div class="why-card reveal" style="--d:{{ $loop->index * .08 }}s"><span class="wi">{{ $ic($v_[0], 'ico-lg') }}</span><h3>{{ $v_[1] }}</h3><p>{{ $v_[2] }}</p></div>@endforeach</div></div></section>
    <section class="section-sm"><div class="wrap">@include($v . '.partials.section-head', ['eyebrow' => 'Perjalanan', 'title' => 'Jejak <span class="gt">Astraly</span>'])<div class="grid gap-4 md:grid-cols-4">@foreach ([['2024', 'Astraly berdiri di Surabaya'], ['2025', '1.000 kreator pertama bergabung'], ['2026', 'Peluncuran Rekomendasi AI'], ['Next', 'Ekspansi ke Asia Tenggara']] as $t)<div class="glass p-6 reveal" style="--d:{{ $loop->index * .08 }}s"><b class="gt text-3xl" style="font-family:var(--ff-head)">{{ $t[0] }}</b><p class="muted mt-2">{{ $t[1] }}</p></div>@endforeach</div></div></section>
    <section class="section-sm"><div class="wrap">@include($v . '.partials.section-head', ['eyebrow' => 'Tim', 'title' => 'Orang di Balik <span class="gt">Astraly</span>'])<div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-4">@foreach ([['Rafi Anggara', 'Founder & CEO', 'c09'], ['Dewi Wulandari', 'Head of Design', 'c10'], ['Satria Nugraha', 'Head of Community', 'c11'], ['Bunga Tiara', 'Lead Engineer', 'c12']] as $m)<div class="creator-card reveal" style="--d:{{ $loop->index * .08 }}s"><div class="av"><img src="{{ $img('creators/' . $m[2] . '.jpg') }}" alt="{{ $m[0] }}" width="96" height="96" loading="lazy"></div><h3>{{ $m[0] }}</h3><p class="dim tiny">{{ $m[1] }}</p></div>@endforeach</div></div></section>
@endsection
