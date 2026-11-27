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
@php $mine = $all->where('creator', 'c01')->values(); $me = $dam['creators']['c01']; @endphp
@section('title', 'Dashboard Kreator — Astraly')
@section('page', 'creator-dashboard')

@section('content')
    <section class="section-sm" style="padding-top:36px"><div class="wrap">
        <nav class="crumbs"><a href="{{ $u('') }}">Beranda</a><span>/</span><span>Dashboard Kreator</span></nav>
        <div class="dash">
            <aside class="dash-side">
                <div class="flex items-center gap-3 p-2 mb-3"><img src="{{ $img($me['avatar']) }}" alt="" width="48" height="48" style="width:48px;height:48px;border-radius:50%;object-fit:cover"><div><b>{{ $me['name'] }}</b><br><small class="dim">Kreator Terverifikasi</small></div></div>
                @foreach ([['chart', 'Ringkasan', true], ['package', 'Aset Saya', false], ['wallet', 'Pendapatan', false], ['star', 'Ulasan', false], ['settings', 'Pengaturan', false]] as $m)<a href="#" class="{{ $m[2] ? 'on' : '' }}" data-toast="Menu {{ $m[1] }} (demo)">{{ $ic($m[0], 'ico-sm') }} {{ $m[1] }}</a>@endforeach
                <a href="{{ $u('') }}">{{ $ic('logout', 'ico-sm') }} Kembali ke Toko</a>
            </aside>
            <div class="grid gap-6">
                <div class="flex items-center justify-between flex-wrap gap-3"><div><h1 class="text-3xl">Selamat datang, {{ explode(' ', $me['name'])[0] }}</h1><p class="muted">Ringkasan performa 30 hari terakhir.</p></div><button type="button" class="btn btn-primary" data-open-upload>{{ $ic('upload', 'ico-sm') }} Unggah Aset</button></div>
                <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
                    @foreach ([['Pendapatan', 'Rp 18,4 jt', '+12,5%'], ['Penjualan', '312', '+8,2%'], ['Unduhan', '1.284', '+21%'], ['Rating Rata-rata', '4,9 / 5', '+0,1']] as $s)<div class="stat reveal" style="--d:{{ $loop->index * .06 }}s"><small>{{ $s[0] }}</small><strong>{{ $s[1] }}</strong><span class="up">{{ $s[2] }} bulan ini</span></div>@endforeach
                </div>
                <div class="glass p-6"><div class="flex justify-between items-center mb-4"><h3 class="text-xl">Pendapatan Harian</h3><span class="chip">30 hari</span></div><svg class="chart" id="salesChart" viewBox="0 0 800 260" preserveAspectRatio="none" role="img" aria-label="Grafik pendapatan"></svg></div>
                <div class="glass p-6"><h3 class="text-xl mb-4">Aset Saya</h3>
                    <div class="table-wrap"><table><thead><tr><th>Aset</th><th>Harga</th><th>Terjual</th><th>Rating</th><th>Status</th></tr></thead><tbody>
                        @foreach ($mine as $a)<tr><td><div class="flex items-center gap-3"><img src="{{ $img($a['img']) }}" alt="" width="64" height="40" style="width:64px;height:40px;border-radius:9px;object-fit:cover"><b>{{ $a['title'] }}</b></div></td><td>{{ $rp($a['price']) }}</td><td>{{ number_format($a['sales'], 0, ',', '.') }}</td><td>{{ $a['rating'] }}</td><td><span class="badge b-free">Aktif</span></td></tr>@endforeach
                    </tbody></table></div>
                </div>
            </div>
        </div>
    </div></section>

    <div class="overlay center" id="uploadOverlay" role="dialog" aria-modal="true" aria-label="Unggah aset">
        <div class="modal" style="width:min(560px,100%);padding:32px">
            <button type="button" class="icon-btn modal-x" data-close-upload aria-label="Tutup">{{ $ic('close') }}</button>
            <h3 class="text-2xl mb-5">Unggah Aset Baru</h3>
            <label class="upload-zone block" id="uploadZone" for="uploadFile">{{ $ic('upload', 'ico-lg mx-auto') }}<p class="mt-3"><b>Seret file ke sini</b> atau klik untuk memilih</p><p class="dim tiny mt-1">ZIP, FIG, FBX, SVG, WAV, PDF hingga 2 GB</p><input type="file" id="uploadFile" class="hidden"></label>
            <div class="dl-bar hidden" id="upBarWrap"><i id="upBar"></i></div><p class="tiny dim" id="upName"></p>
            <div class="grid gap-4 mt-5"><input class="input" placeholder="Judul aset"><select class="select">@foreach ($dam['categories'] as $c)<option>{{ $c['name'] }}</option>@endforeach</select></div>
            <button type="button" class="btn btn-primary btn-block mt-6" data-submit-upload>Kirim untuk Kurasi</button>
        </div>
    </div>
@endsection
