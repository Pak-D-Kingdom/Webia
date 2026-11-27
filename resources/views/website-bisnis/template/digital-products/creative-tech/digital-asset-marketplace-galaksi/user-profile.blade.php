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
@section('title', 'Profil Saya — Astraly')
@section('page', 'user-profile')

@section('content')
    @include($v . '.partials.page-hero', ['title' => 'Profil <span class="gt">Saya</span>', 'crumbs' => [['Profil Saya', null]]])
    <section class="section-sm"><div class="wrap grid gap-8 lg:grid-cols-[320px_1fr] items-start">
        <aside class="glass p-6 text-center">
            <div class="creator-card" style="border:0;background:none;padding:0"><div class="av"><img id="pfAvatar" src="{{ $img('creators/c09.jpg') }}" alt="Foto profil" width="96" height="96"></div></div>
            <h2 class="text-2xl" id="pfShowName">Rafi Anggara</h2><p class="muted tiny" id="pfShowEmail">rafi@email.com</p>
            <div class="grid grid-cols-3 gap-2 mt-5 pt-5" style="border-top:1px solid var(--line)"><div><b data-stat="library">0</b><p class="dim tiny">Aset</p></div><div><b data-stat="wish">0</b><p class="dim tiny">Wishlist</p></div><div><b data-stat="orders">0</b><p class="dim tiny">Pesanan</p></div></div>
            <a href="{{ $u('my-downloads') }}" class="btn btn-ghost btn-block mt-5">Unduhan Saya</a>
        </aside>
        <div>
            <div class="tabs" data-tabs><button type="button" class="tab on" data-tab="info">Informasi</button><button type="button" class="tab" data-tab="orders">Pesanan</button><button type="button" class="tab" data-tab="security">Keamanan</button><button type="button" class="tab" data-tab="ai">Preferensi AI</button></div>
            <div class="mt-6">
                <div class="tab-pane on" id="tab-info"><form class="glass p-6 grid gap-4 sm:grid-cols-2" id="profileForm" novalidate>
                    <div class="field"><label class="label" for="pfName">Nama</label><input class="input" id="pfName" name="name" value="Rafi Anggara"></div>
                    <div class="field"><label class="label" for="pfEmail">Email</label><input class="input" id="pfEmail" name="email" type="email" value="rafi@email.com"></div>
                    <div class="field"><label class="label" for="pfPhone">No. WhatsApp</label><input class="input" id="pfPhone" name="phone" value="0895630300345"></div>
                    <div class="field"><label class="label" for="pfCity">Kota</label><input class="input" id="pfCity" name="city" value="Surabaya"></div>
                    <div class="field sm:col-span-2"><label class="label" for="pfBio">Bio</label><textarea class="textarea" id="pfBio" name="bio" style="min-height:100px">Indie game developer yang suka eksplorasi aset sci-fi.</textarea></div>
                    <button class="btn btn-primary" type="submit" style="width:max-content">Simpan Perubahan</button></form></div>
                <div class="tab-pane" id="tab-orders"><div class="table-wrap"><table><thead><tr><th>No. Pesanan</th><th>Tanggal</th><th>Item</th><th>Total</th></tr></thead><tbody id="orderTable"></tbody></table></div></div>
                <div class="tab-pane" id="tab-security"><form class="glass p-6 grid gap-4" style="max-width:520px" data-demo-form="Kata sandi berhasil diperbarui (demo)"><div class="field"><label class="label">Kata sandi saat ini</label><input class="input" type="password" placeholder="••••••••"></div><div class="field"><label class="label">Kata sandi baru</label><input class="input" type="password" placeholder="Minimal 8 karakter"></div><label class="check"><input type="checkbox" checked> Aktifkan verifikasi 2 langkah</label><button class="btn btn-primary" type="submit" style="width:max-content">Perbarui</button></form></div>
                <div class="tab-pane" id="tab-ai"><div class="glass p-6"><h3 class="text-xl">Minat kreatifmu</h3><p class="muted mt-1 mb-4">Dipakai AI untuk menyusun rekomendasi.</p><div class="chip-row" id="interestChips">@foreach (['Game', 'UI/UX', 'Web', 'Video', 'Musik', 'Branding', 'Belajar'] as $i)<button type="button" class="chip" data-interest="{{ strtolower($i) }}">{{ $i }}</button>@endforeach</div></div></div>
            </div>
        </div>
    </div></section>
@endsection
