<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="theme-color" content="#06304f">
    <title>Laut Biru — Restoran Seafood Modern</title>
    <meta name="description" content="Seafood segar dari dermaga ke meja, dengan bumbu Nusantara dan suasana tepi laut.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:wght@500;700;800&family=Figtree:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/website-bisnis/templates/fnb/restaurant/laut-biru-seafood.css') }}">
</head>
<body class="laut-biru-template{{ request()->boolean('preview') ? ' laut-biru-preview-mode' : '' }}">
    <svg class="lb-symbols" aria-hidden="true" focusable="false">
        <symbol id="lb-fish" viewBox="0 0 24 24"><path d="M3 12c3-5 8-7 12-5 2 1 3 2 4 3l3-3v10l-3-3c-1 1-2 2-4 3-4 2-9 0-12-5z"/><circle cx="8" cy="11" r="1"/></symbol>
        <symbol id="lb-shrimp" viewBox="0 0 24 24"><path d="M5 9c3-5 12-5 14 1 1 4-2 8-7 8M5 9c-1 2 0 5 3 6M9 17l-1 3M13 17l1 3M17 15l2 2M7 5 5 3"/></symbol>
        <symbol id="lb-shell" viewBox="0 0 24 24"><path d="M3 14a9 9 0 0 1 18 0c0 3-4 6-9 6s-9-3-9-6zM12 5v15M7.5 7 9 19M16.5 7 15 19"/></symbol>
        <symbol id="lb-utensils" viewBox="0 0 24 24"><path d="M7 3v8M5 3v5a2 2 0 0 0 4 0V3M7 11v10M17 21V3c-2 1-3 4-3 8h3"/></symbol>
        <symbol id="lb-bowl" viewBox="0 0 24 24"><path d="M3 11h18a9 9 0 0 1-18 0zM8 7c0-2 2-2 2-4M13 7c0-2 2-2 2-4"/></symbol>
        <symbol id="lb-glass" viewBox="0 0 24 24"><path d="M6 4h12l-1 15a2 2 0 0 1-2 2H9a2 2 0 0 1-2-2zM7 10h10"/></symbol>
        <symbol id="lb-dessert" viewBox="0 0 24 24"><path d="M7 11a5 5 0 0 1 10 0zM8 11l4 10 4-10M9 7a3 3 0 0 1 6 0"/></symbol>
        <symbol id="lb-truck" viewBox="0 0 24 24"><path d="M2 6h12v10H2zM14 10h4l3 3v3h-7zM8 19a2 2 0 1 0-4 0 2 2 0 0 0 4 0zM20 19a2 2 0 1 0-4 0 2 2 0 0 0 4 0z"/></symbol>
        <symbol id="lb-calendar" viewBox="0 0 24 24"><path d="M4 6h16v14H4zM4 10h16M8 3v4M16 3v4"/></symbol>
        <symbol id="lb-tag" viewBox="0 0 24 24"><path d="M3 12V4h8l10 10-8 8zM7.5 7.5h.01"/></symbol>
        <symbol id="lb-clock" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></symbol>
        <symbol id="lb-pin" viewBox="0 0 24 24"><path d="M12 21s7-6 7-11a7 7 0 0 0-14 0c0 5 7 11 7 11z"/><circle cx="12" cy="10" r="2.5"/></symbol>
        <symbol id="lb-chat" viewBox="0 0 24 24"><path d="M4 20l1.5-4A8 8 0 1 1 8 18.5zM9 10c0 3 2 5 5 5l1-2-2-1-1 1c-1-.5-2-1.5-2.5-2.5l1-1-1-2z"/></symbol>
        <symbol id="lb-sparkle" viewBox="0 0 24 24"><path d="m12 3 2 6 6 2-6 2-2 6-2-6-6-2 6-2zM19 3v4M17 5h4"/></symbol>
        <symbol id="lb-wave" viewBox="0 0 24 24"><path d="M2 9c3-3 5 3 10 0s7 3 10 0M2 15c3-3 5 3 10 0s7 3 10 0"/></symbol>
    </svg>

    <nav class="lb-nav" aria-label="Navigasi utama">
        <div class="lb-wrap lb-nav-inner">
            <a class="lb-logo" href="#top"><svg class="lb-icon"><use href="#lb-fish"/></svg><span>Laut Biru</span></a>
            <button class="lb-burger" id="lb-burger" type="button" aria-label="Buka menu navigasi" aria-expanded="false" aria-controls="lb-links">☰</button>
            <div class="lb-links" id="lb-links">
                <a href="#menu">Menu</a><a href="#layanan">Layanan</a><a href="#promo">Promo</a><a href="#lokasi">Lokasi &amp; Jam</a><a href="#faq">FAQ</a>
                <a class="lb-button lb-button-nav" href="#reservasi">Reservasi</a>
            </div>
        </div>
    </nav>

    <header class="lb-hero" id="top">
        <div class="lb-wrap lb-hero-grid">
            <div class="lb-hero-copy">
                <div class="lb-status"><span class="lb-status-dot" id="lb-dot"></span><span id="lb-status-text">Memeriksa jam buka…</span></div>
                <h1>Seafood segar, langsung dari dermaga ke meja Anda.</h1>
                <p>Ikan, udang, dan kerang dipilih setiap pagi dan dimasak dengan bumbu Nusantara. Pesan meja untuk makan siang keluarga atau makan malam bersama teman.</p>
                <div class="lb-hero-actions"><a class="lb-button" href="#reservasi">Pesan meja</a><a class="lb-button lb-button-ghost" href="#menu">Lihat menu</a></div>
            </div>
            <aside class="lb-catch-board" aria-label="Tangkapan hari ini">
                <svg class="lb-art" viewBox="0 0 420 170" role="img" aria-label="Ilustrasi ikan, kerang, dan gelombang laut"><rect width="420" height="170" fill="#0a5e93"/><circle cx="335" cy="45" r="26" fill="#f2d9a6" opacity=".92"/><path d="M0 100C60 75 110 120 180 98S320 75 420 105v65H0Z" fill="#0b84b8" opacity=".75"/><path d="M0 135c70-25 130 20 210-2s130-18 210 7v30H0Z" fill="#3fc1d4" opacity=".6"/><g fill="none" stroke="#fff" stroke-width="1.4" opacity=".7"><circle cx="40" cy="40" r="5"/><circle cx="62" cy="22" r="3"/><circle cx="150" cy="34" r="4"/></g><use href="#lb-fish" x="70" y="48" width="84" height="84" stroke="#fff" stroke-width="1.3" fill="none"/><use href="#lb-fish" x="180" y="84" width="50" height="50" stroke="#f2d9a6" stroke-width="1.5" fill="none"/><use href="#lb-shrimp" x="250" y="70" width="64" height="64" stroke="#fff" stroke-width="1.4" fill="none"/><use href="#lb-shell" x="338" y="96" width="48" height="48" stroke="#fff" stroke-width="1.5" fill="none"/></svg>
                <h2><svg class="lb-icon"><use href="#lb-fish"/></svg> Tangkapan hari ini</h2>
                <small>Stok terbatas, habis lebih cepat saat akhir pekan</small>
                <ul><li><span>Kakap merah bakar</span><strong>Rp 98.000</strong></li><li><span>Udang windu saus padang</span><strong>Rp 115.000</strong></li><li><span>Kepiting soka goreng</span><strong>Rp 89.000</strong></li><li><span>Cumi bakar kecap</span><strong>Rp 72.000</strong></li></ul>
            </aside>
        </div>
        <svg class="lb-wave" viewBox="0 0 1440 80" preserveAspectRatio="none" aria-hidden="true"><path d="M0 40c240 50 480-40 720 0s480 40 720-10v50H0Z" fill="var(--lb-bg)"/></svg>
    </header>

    <main>
        <section class="lb-section" id="menu">
            <div class="lb-wrap"><h2 class="lb-section-title"><svg class="lb-icon"><use href="#lb-utensils"/></svg> Menu</h2><p class="lb-lead">Harga sudah termasuk pajak. Tanyakan pelayan untuk tingkat kepedasan dan alergi makanan.</p><div class="lb-tabs" id="lb-tabs" role="tablist" aria-label="Kategori menu"></div><div class="lb-menu-grid" id="lb-menu-list"></div></div>
        </section>
        <section class="lb-section lb-band" id="layanan">
            <div class="lb-wrap"><h2 class="lb-section-title">Layanan</h2><p class="lb-lead">Pilih cara menikmati hidangan yang paling cocok untuk acara Anda.</p><div class="lb-grid3">
                <article class="lb-service"><span class="lb-service-icon"><svg class="lb-icon"><use href="#lb-utensils"/></svg></span><h3>Makan di tempat</h3><p>Area indoor ber-AC dan teras tepi laut untuk 2 sampai 40 orang.</p></article>
                <article class="lb-service"><span class="lb-service-icon"><svg class="lb-icon"><use href="#lb-truck"/></svg></span><h3>Bawa pulang &amp; antar</h3><p>Pesan lewat WhatsApp, siap dalam 25 menit. Antar gratis dalam radius 5 km.</p></article>
                <article class="lb-service"><span class="lb-service-icon"><svg class="lb-icon"><use href="#lb-calendar"/></svg></span><h3>Katering &amp; acara</h3><p>Paket prasmanan untuk arisan, ulang tahun, dan rapat kantor mulai 20 porsi.</p></article>
            </div></div>
        </section>
        <section class="lb-section" id="galeri">
            <div class="lb-wrap"><h2 class="lb-section-title"><svg class="lb-icon"><use href="#lb-wave"/></svg> Dari dapur dan dermaga</h2><p class="lb-lead">Cuplikan hidangan favorit dan suasana makan di tepi laut.</p><div class="lb-gallery">
                <div class="lb-tile lb-tile-fish"><svg viewBox="0 0 100 110" aria-hidden="true"><circle cx="78" cy="20" r="9" fill="#f2d9a6" stroke="none"/><use href="#lb-fish" x="12" y="26" width="76" height="76"/></svg><span>Kakap merah bakar</span></div>
                <div class="lb-tile lb-tile-shrimp"><svg viewBox="0 0 100 110" aria-hidden="true"><circle cx="22" cy="22" r="3"/><circle cx="80" cy="30" r="4"/><use href="#lb-shrimp" x="12" y="26" width="76" height="76"/></svg><span>Udang saus padang</span></div>
                <div class="lb-tile lb-tile-wave"><svg viewBox="0 0 100 110" aria-hidden="true"><circle cx="72" cy="24" r="11" fill="#f2d9a6" stroke="none"/><use href="#lb-wave" x="8" y="34" width="84" height="84"/></svg><span>Teras tepi laut</span></div>
                <div class="lb-tile lb-tile-drink"><svg viewBox="0 0 100 110" aria-hidden="true"><circle cx="24" cy="24" r="3"/><circle cx="78" cy="34" r="2.5"/><use href="#lb-glass" x="16" y="26" width="68" height="68"/></svg><span>Es kelapa muda</span></div>
            </div></div>
        </section>
        <section class="lb-section" id="promo">
            <div class="lb-wrap"><h2 class="lb-section-title"><svg class="lb-icon"><use href="#lb-tag"/></svg> Promo bulan ini</h2><p class="lb-lead">Ketuk kode untuk menyalin, lalu sebutkan saat memesan.</p><div class="lb-grid3">
                <article class="lb-promo"><svg class="lb-icon"><use href="#lb-tag"/></svg><h3>Diskon 20% makan siang</h3><p>Senin sampai Kamis, pukul 11.00–14.00.</p><button type="button" class="lb-code" data-code="SIANG20">SIANG20</button></article>
                <article class="lb-promo"><svg class="lb-icon"><use href="#lb-glass"/></svg><h3>Gratis es kelapa muda</h3><p>Setiap pemesanan meja untuk 4 orang atau lebih.</p><button type="button" class="lb-code" data-code="KELAPA4">KELAPA4</button></article>
                <article class="lb-promo"><svg class="lb-icon"><use href="#lb-shell"/></svg><h3>Paket keluarga hemat</h3><p>Ikan bakar, udang, cumi, nasi, dan 4 minuman Rp 399.000.</p><button type="button" class="lb-code" data-code="KELUARGA">KELUARGA</button></article>
            </div></div>
        </section>
        <section class="lb-section lb-location" id="lokasi">
            <div class="lb-wrap lb-two"><div><h2 class="lb-section-title"><svg class="lb-icon"><use href="#lb-clock"/></svg> Jam buka</h2><p class="lb-lead">Dapur menerima pesanan terakhir 30 menit sebelum tutup.</p><table class="lb-hours" id="lb-hours"></table></div>
                <div><h2 class="lb-section-title"><svg class="lb-icon"><use href="#lb-pin"/></svg> Lokasi</h2><p class="lb-lead">Jl. Bahari No. 21, Kawasan Dermaga Utara. Parkir luas untuk mobil dan motor.</p><div class="lb-map"><svg viewBox="0 0 400 260" preserveAspectRatio="xMidYMid slice" aria-hidden="true"><path d="M0 150c80-30 140 40 220 10s120-40 180-10v110H0Z" fill="#6db9d8" opacity=".6"/><path d="M0 190c90-30 160 40 250 10s110-30 150-5v65H0Z" fill="#3a9ac4" opacity=".6"/><circle cx="230" cy="90" r="12" fill="#0a6ea8"/><circle cx="230" cy="90" r="22" fill="#0a6ea8" opacity=".25"/></svg><div><svg class="lb-icon"><use href="#lb-pin"/></svg><strong>Laut Biru Seafood</strong><br><a href="https://www.google.com/maps/search/?api=1&amp;query=Laut+Biru+Seafood" target="_blank" rel="noopener">Buka di Google Maps</a></div></div></div>
            </div>
        </section>
        <section class="lb-section lb-band" id="reservasi">
            <div class="lb-wrap lb-reservation-wrap"><h2 class="lb-section-title"><svg class="lb-icon"><use href="#lb-calendar"/></svg> Reservasi meja</h2><p class="lb-lead">Isi formulir, lalu kami lanjutkan konfirmasi lewat WhatsApp.</p>
                <form class="lb-form" id="lb-reservation-form">
                    <label>Nama<input id="lb-name" name="name" required autocomplete="name"></label><label>Nomor WhatsApp<input id="lb-phone" name="phone" type="tel" required autocomplete="tel" placeholder="0812…"></label>
                    <label>Tanggal<input id="lb-date" name="date" type="date" required></label><label>Jam<select id="lb-time" name="time"></select></label>
                    <label>Jumlah tamu<select id="lb-guests" name="guests"></select></label><label>Area<select id="lb-area" name="area"><option>Indoor ber-AC</option><option>Teras tepi laut</option><option>Ruang privat</option></select></label>
                    <label class="lb-full">Catatan (opsional)<textarea id="lb-notes" name="notes" rows="2" placeholder="Alergi, kursi bayi, acara ulang tahun…"></textarea></label>
                    <button class="lb-button lb-submit lb-full" type="submit">Kirim reservasi lewat WhatsApp <span>↗</span></button>
                </form><div class="lb-confirmation" id="lb-confirmation" role="status" aria-live="polite" hidden></div>
            </div>
        </section>
        <section class="lb-section" id="faq"><div class="lb-wrap lb-faq-wrap"><h2 class="lb-section-title"><svg class="lb-icon"><use href="#lb-sparkle"/></svg> Pertanyaan umum</h2><p class="lb-lead">Tidak menemukan jawabannya? Tanya asisten di pojok kanan bawah.</p><div id="lb-faq-list"></div></div></section>
    </main>

    <footer class="lb-footer"><div class="lb-wrap lb-footer-grid">
        <div><h2>Laut Biru</h2><p>Restoran seafood modern dengan bahan segar dari nelayan lokal.</p></div>
        <div><h3>Navigasi</h3><a href="#menu">Menu</a><a href="#promo">Promo</a><a href="#reservasi">Reservasi</a><a href="#faq">FAQ</a></div>
        <div><h3>Kontak</h3><a href="https://wa.me/6281234567890" target="_blank" rel="noopener"><svg class="lb-icon"><use href="#lb-chat"/></svg> WhatsApp 0812-3456-7890</a><a href="#lokasi"><svg class="lb-icon"><use href="#lb-pin"/></svg> Jl. Bahari No. 21</a><a href="#lokasi"><svg class="lb-icon"><use href="#lb-clock"/></svg> Buka setiap hari 10.00</a></div>
    </div><div class="lb-wrap lb-copyright">© 2026 Laut Biru Seafood. Semua hak dilindungi.</div></footer>

    <aside class="lb-chat" id="lb-chat" role="dialog" aria-label="Asisten Laut Biru" aria-modal="false" hidden>
        <div class="lb-chat-head"><strong><svg class="lb-icon"><use href="#lb-sparkle"/></svg> Asisten Laut Biru</strong><button type="button" id="lb-chat-close" aria-label="Tutup">×</button></div>
        <div class="lb-messages" id="lb-messages" aria-live="polite"></div><div class="lb-chips" id="lb-chips"></div>
        <form class="lb-chat-form" id="lb-chat-form"><input id="lb-chat-input" placeholder="Tulis pertanyaan…" aria-label="Pertanyaan" required><button type="submit" class="lb-button">Kirim</button></form>
    </aside>
    <a class="lb-fab lb-whatsapp" href="https://wa.me/6281234567890?text=Halo%20Laut%20Biru%2C%20saya%20ingin%20bertanya." target="_blank" rel="noopener noreferrer"><svg class="lb-icon"><use href="#lb-chat"/></svg> WhatsApp</a>
    <button class="lb-fab lb-ai-button" id="lb-ai-button" type="button" aria-controls="lb-chat" aria-expanded="false"><svg class="lb-icon"><use href="#lb-sparkle"/></svg> Tanya AI</button>

    <script src="{{ asset('js/website-bisnis/templates/fnb/restaurant/laut-biru-seafood.js') }}" defer></script>
</body>
</html>