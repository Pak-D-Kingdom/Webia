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
@section('title', 'Hubungi Kami — Astraly')
@section('page', 'contact-us')

@section('content')
    @include($v . '.partials.page-hero', ['title' => 'Hubungi <span class="gt">Kami</span>', 'desc' => 'Pertanyaan, kolaborasi, atau kendala? Tim kami siap membantu.', 'crumbs' => [['Hubungi Kami', null]], 'bg' => 'nebula-cyan-4k.jpg'])
    <section class="section-sm"><div class="wrap grid gap-8 lg:grid-cols-[1fr_1.2fr]">
        <div class="grid gap-4 content-start">
            @foreach ([['phone', 'WhatsApp', $dam['brand']['phone']], ['mail', 'Email', $dam['brand']['email']], ['pin', 'Alamat', $dam['brand']['address']], ['clock', 'Jam Layanan', 'Senin–Sabtu, 09.00–21.00 WIB']] as $i)<div class="glass p-5 flex gap-4 items-center reveal" style="--d:{{ $loop->index * .06 }}s"><span class="di" style="width:48px;height:48px;border-radius:14px;display:grid;place-items:center;background:var(--grad-soft);color:var(--cyan);border:1px solid var(--line)">{{ $ic($i[0]) }}</span><div><small class="dim">{{ $i[1] }}</small><p><b>{{ $i[2] }}</b></p></div></div>@endforeach
            <div class="map-box"><div class="text-center" style="position:relative">{{ $ic('pin', 'ico-lg mx-auto') }}<p class="mt-2"><b>Surabaya, Jawa Timur</b></p></div></div>
        </div>
        <form class="glass p-8 grid gap-4 reveal reveal-r" id="contactForm" novalidate>
            <h2 class="text-3xl">Kirim Pesan</h2><p class="muted -mt-2">Pesan akan dikirim langsung via WhatsApp.</p>
            <div class="grid gap-4 sm:grid-cols-2"><div class="field"><label class="label" for="ctName">Nama</label><input class="input" id="ctName" name="name" required placeholder="Nama kamu"><span class="err-msg"></span></div><div class="field"><label class="label" for="ctEmail">Email</label><input class="input" id="ctEmail" name="email" type="email" required placeholder="email@contoh.com"><span class="err-msg"></span></div></div>
            <div class="field"><label class="label" for="ctTopic">Topik</label><select class="select" id="ctTopic" name="topic"><option>Pertanyaan Umum</option><option>Pembayaran</option><option>Lisensi</option><option>Kolaborasi Kreator</option><option>Refund</option></select></div>
            <div class="field"><label class="label" for="ctMsg">Pesan</label><textarea class="textarea" id="ctMsg" name="message" required placeholder="Tulis pesanmu…"></textarea><span class="err-msg"></span></div>
            <button class="btn btn-wa btn-lg" type="submit">{{ $ic('send', 'ico-sm') }} Kirim via WhatsApp</button>
        </form>
    </div></section>
@endsection
