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
@section('title', 'Jadi Kreator — Astraly')
@section('page', 'become-a-creator')

@section('content')
    @include($v . '.partials.page-hero', ['title' => 'Ubah Karyamu Jadi <span class="gt">Penghasilan</span>', 'desc' => 'Jual aset digitalmu ke ribuan pembeli. Bagi hasil hingga 80%, payout mingguan, tanpa biaya bulanan.', 'crumbs' => [['Jadi Kreator', null]], 'bg' => 'nebula-rose-4k.jpg'])
    <section class="section-sm"><div class="wrap grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
        @foreach ([['wallet', 'Bagi Hasil 80%', 'Pendapatan terbesar untuk kreator.'], ['bolt', 'Payout Mingguan', 'Cairkan penghasilan tiap minggu.'], ['shield', 'Perlindungan Lisensi', 'Karyamu terlindungi sistem lisensi.'], ['chart', 'Analitik Lengkap', 'Pantau penjualan dan tren real-time.']] as $b)
            <div class="why-card reveal" style="--d:{{ $loop->index * .08 }}s"><span class="wi">{{ $ic($b[0], 'ico-lg') }}</span><h3>{{ $b[1] }}</h3><p>{{ $b[2] }}</p></div>
        @endforeach
    </div></section>

    <section class="section-sm"><div class="wrap grid gap-8 lg:grid-cols-2 items-start">
        <div class="glass glow-border p-8 reveal reveal-l">
            <span class="eyebrow">Kalkulator Pendapatan</span><h2 class="text-3xl">Berapa potensimu?</h2>
            <div class="grid gap-6 mt-6">
                <label class="field"><span class="label">Harga rata-rata aset: <b id="calcPriceLbl" style="color:var(--tx)"></b></span><input class="range" type="range" id="calcPrice" min="25000" max="500000" step="5000" value="150000"></label>
                <label class="field"><span class="label">Penjualan per bulan: <b id="calcSalesLbl" style="color:var(--tx)"></b></span><input class="range" type="range" id="calcSales" min="1" max="200" value="30"></label>
                <div class="p-6 text-center" style="border-radius:20px;background:var(--grad-soft);border:1px solid var(--line-2)"><p class="muted">Estimasi pendapatan bersih / bulan</p><p class="gt font-bold" id="calcOut" style="font-family:var(--ff-head);font-size:42px;line-height:1.2">Rp 0</p></div>
            </div>
        </div>
        <form class="glass p-8 grid gap-4 reveal reveal-r" id="creatorForm" novalidate>
            <h2 class="text-3xl">Daftar Jadi Kreator</h2>
            <div class="field"><label class="label" for="cfName">Nama / Studio</label><input class="input" id="cfName" name="name" required placeholder="Nama kreator"><span class="err-msg"></span></div>
            <div class="field"><label class="label" for="cfEmail">Email</label><input class="input" id="cfEmail" name="email" type="email" required placeholder="kamu@email.com"><span class="err-msg"></span></div>
            <div class="field"><label class="label" for="cfCat">Kategori Utama</label><select class="select" id="cfCat" name="cat">@foreach ($dam['categories'] as $c)<option>{{ $c['name'] }}</option>@endforeach</select></div>
            <div class="field"><label class="label" for="cfLink">Tautan Portofolio</label><input class="input" id="cfLink" name="link" placeholder="https://"></div>
            <label class="check"><input type="checkbox" required> Saya menyetujui <a href="{{ $u('legal') }}" style="color:var(--cyan)">syarat & lisensi kreator</a>.</label>
            <button class="btn btn-primary btn-lg" type="submit">Kirim Pendaftaran {{ $ic('rocket', 'ico-sm') }}</button>
        </form>
    </div></section>

    <section class="section-sm"><div class="wrap">
        @include($v . '.partials.section-head', ['eyebrow' => 'Alur Kreator', 'title' => 'Mulai dalam <span class="gt">4 Langkah</span>'])
        <div class="steps">@foreach ([['user', 'Daftar', 'Buat profil kreator.'], ['upload', 'Unggah', 'Tambahkan aset dan pratinjau.'], ['shield', 'Kurasi', 'Tim kami meninjau maks. 2 hari.'], ['wallet', 'Hasilkan', 'Jual dan cairkan penghasilan.']] as $s)<div class="step reveal" style="--d:{{ $loop->index * .1 }}s"><span class="si">{{ $ic($s[0], 'ico-lg') }}</span><h3>{{ $s[1] }}</h3><p>{{ $s[2] }}</p></div>@endforeach</div>
    </div></section>
@endsection
