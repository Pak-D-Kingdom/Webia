@extends('website-bisnis.layouts.app')

@section('title', 'Maison Élise Salon — Classic Warm Neutral')
@section('meta_description', 'Temukan pengalaman perawatan rambut dan kecantikan yang personal di Maison Élise Salon. Lihat layanan, harga, stylist, promo, dan buat janji dengan mudah.')

@section('content')
<main class="classic-salon">
    <div class="classic-announcement">A LITTLE TIME FOR YOURSELF — BOOK YOUR NEXT VISIT</div>

    <header class="classic-header">
        <a class="classic-brand" href="#classic-home" aria-label="Maison Élise Salon beranda">
            <span class="classic-brand-mark">M<span>É</span></span>
            <span class="classic-brand-name">MAISON ÉLISE<small>HAIR & BEAUTY ATELIER</small></span>
        </a>
        <button class="classic-menu-toggle" type="button" aria-expanded="false" aria-controls="classic-nav" aria-label="Buka menu">☰</button>
        <nav class="classic-nav" id="classic-nav" aria-label="Navigasi utama">
            <a href="#classic-home">Beranda</a><a href="#classic-about">Tentang</a><a href="#classic-services">Layanan</a><a href="#classic-team">Stylist</a><a href="#classic-contact">Kontak</a>
            <a class="classic-nav-cta" href="#classic-booking">Buat Janji <span>↗</span></a>
        </nav>
    </header>

    <section class="classic-hero" id="classic-home">
        <div class="classic-hero-copy">
            <span class="classic-kicker"><i></i> THE ART OF PERSONAL CARE <i></i></span>
            <h1>Beauty in every<br><em>little detail.</em></h1>
            <p>Tempat untuk berhenti sejenak, merawat diri, dan kembali merasa menjadi versi terbaik dirimu.</p>
            <div class="classic-hero-actions"><a class="classic-button classic-button-dark" href="#classic-services">Jelajahi Layanan <span>↗</span></a><a class="classic-text-link" href="#classic-about">Cerita kami <span>→</span></a></div>
            <div class="classic-hero-note"><span class="classic-note-icon">✳</span><span><b>Thoughtfully made for you</b><small>Perawatan personal dengan sentuhan profesional.</small></span></div>
        </div>
        <div class="classic-hero-visual">
            <img src="https://images.unsplash.com/photo-1560066984-138dadb4c035?auto=format&fit=crop&w=1100&q=85" alt="Interior salon yang hangat dan elegan" fetchpriority="high">
            <div class="classic-image-label"><span>EST. WITH CARE</span><b>Your moment<br>of calm.</b><i>✳</i></div>
            <div class="classic-vertical-caption">HAIR · BEAUTY · YOU</div>
        </div>
        <div class="classic-hero-bottom"><span>01 / A MORE PERSONAL SALON EXPERIENCE</span><span>SCROLL TO DISCOVER ↓</span></div>
    </section>

    <section class="classic-intro" id="classic-about">
        <div class="classic-section-label"><span>01</span><i></i> OUR PHILOSOPHY</div>
        <div class="classic-intro-content"><h2>Good hair days<br>begin with <em>good care.</em></h2><div><p>Setiap orang punya cerita dan gaya yang berbeda. Kami percaya perawatan terbaik dimulai dari mendengarkan kebutuhanmu, memberi rekomendasi yang jujur, dan menghadirkan hasil yang terasa personal.</p><a class="classic-text-link" href="#classic-team">Kenali stylist kami <span>→</span></a></div></div>
        <div class="classic-values"><div><span>✳</span><b>Personal approach</b><p>Rekomendasi yang disesuaikan dengan kebutuhan dan gayamu.</p></div><div><span>✳</span><b>Thoughtful details</b><p>Perhatian pada kenyamanan dari awal hingga akhir kunjungan.</p></div><div><span>✳</span><b>Professional care</b><p>Ditangani oleh tim yang mengutamakan kualitas dan ketelitian.</p></div></div>
    </section>

    <section class="classic-services" id="classic-services">
        <div class="classic-section-heading"><div><div class="classic-section-label"><span>02</span><i></i> OUR SERVICES</div><h2>Little rituals,<br><em>lovely results.</em></h2></div><p>Temukan perawatan yang cocok untukmu. Harga dan durasi di bawah merupakan contoh yang dapat disesuaikan dengan layanan salon.</p></div>
        <div class="classic-service-grid">
            <article class="classic-service-card"><div class="classic-service-photo"><img src="https://images.unsplash.com/photo-1562322140-8baeececf3df?auto=format&fit=crop&w=900&q=80" alt="Perawatan potong dan styling rambut" loading="lazy"><span>01</span></div><div class="classic-service-info"><div><h3>Cut & Styling</h3><p>Potongan dan styling yang mengikuti karakter personalmu.</p></div><span class="classic-service-price">Rp85K<small>45–60 menit</small></span></div><button type="button" class="classic-select-service" data-service="Cut & Styling">Pilih layanan <span>↗</span></button></article>
            <article class="classic-service-card"><div class="classic-service-photo"><img src="https://images.unsplash.com/photo-1633681926022-84c23e8cb2d2?auto=format&fit=crop&w=900&q=80" alt="Layanan pewarnaan rambut di salon" loading="lazy"><span>02</span></div><div class="classic-service-info"><div><h3>Hair Coloring</h3><p>Warna yang menyatu dengan gaya dan kepribadianmu.</p></div><span class="classic-service-price">Rp250K<small>120–180 menit</small></span></div><button type="button" class="classic-select-service" data-service="Hair Coloring">Pilih layanan <span>↗</span></button></article>
            <article class="classic-service-card"><div class="classic-service-photo"><img src="https://images.unsplash.com/photo-1527799820374-dcf8d9d4a388?auto=format&fit=crop&w=900&q=80" alt="Perawatan rambut di salon" loading="lazy"><span>03</span></div><div class="classic-service-info"><div><h3>Hair Treatment</h3><p>Perawatan untuk membantu rambut terasa lebih lembut.</p></div><span class="classic-service-price">Rp150K<small>60–90 menit</small></span></div><button type="button" class="classic-select-service" data-service="Hair Treatment">Pilih layanan <span>↗</span></button></article>
        </div>
        <p class="classic-price-note">*Harga dan durasi adalah ilustrasi template. Konfirmasi layanan dan harga aktual melalui WhatsApp.</p>
    </section>

    <section class="classic-promo">
        <div class="classic-promo-stamp">A MOMENT<br>JUST FOR YOU <span>✳</span></div>
        <div class="classic-promo-copy"><span class="classic-kicker">A LITTLE SOMETHING SPECIAL</span><h2>Your first visit,<br><em>a lovely beginning.</em></h2><p>Nikmati pengalaman pertama yang lebih istimewa. Hubungi kami untuk mengetahui promo dan paket perawatan yang sedang tersedia.</p><a class="classic-button classic-button-light" href="#classic-booking">Tanyakan Promo <span>↗</span></a></div>
        <div class="classic-promo-image"><img src="https://images.unsplash.com/photo-1521590832167-7bcbfaa6381f?auto=format&fit=crop&w=900&q=80" alt="Suasana salon yang nyaman" loading="lazy"></div>
    </section>

    <section class="classic-team" id="classic-team">
        <div class="classic-section-heading"><div><div class="classic-section-label"><span>03</span><i></i> MEET YOUR STYLIST</div><h2>Good hands.<br><em>Great energy.</em></h2></div><p>Kenali tim yang siap membantu menemukan gaya dan perawatan yang paling sesuai untukmu.</p></div>
        <div class="classic-team-grid"><article><img src="https://images.unsplash.com/photo-1580618672591-eb180b1a973f?auto=format&fit=crop&w=700&q=80" alt="Potret stylist salon" loading="lazy"><div><span>HAIR STYLIST</span><h3>Amara Putri</h3><p>Cut & everyday styling</p></div></article><article><img src="https://images.unsplash.com/photo-1595476108010-b4d1f102b1b1?auto=format&fit=crop&w=700&q=80" alt="Potret hair colorist" loading="lazy"><div><span>COLOR SPECIALIST</span><h3>Clara Anindya</h3><p>Color & hair transformation</p></div></article><article><img src="https://images.unsplash.com/photo-1600948836101-f9ffda59d250?auto=format&fit=crop&w=700&q=80" alt="Potret beauty therapist" loading="lazy"><div><span>BEAUTY THERAPIST</span><h3>Naomi Laras</h3><p>Hair & scalp treatment</p></div></article></div>
        <p class="classic-price-note">*Nama dan profil stylist merupakan contoh untuk kebutuhan demo.</p>
    </section>

    <section class="classic-booking" id="classic-booking">
        <div class="classic-booking-copy"><div class="classic-section-label"><span>04</span><i></i> YOUR NEXT APPOINTMENT</div><h2>A little time<br><em>for yourself.</em></h2><p>Isi detail kunjunganmu. Kami akan membantu melanjutkan permintaan booking melalui WhatsApp.</p><div class="classic-booking-contact"><span>✳</span><div><b>Prefer to chat first?</b><small>Tanyakan layanan, ketersediaan jadwal, atau rekomendasi perawatan.</small></div></div></div>
        <form class="classic-booking-form" id="classic-booking-form">
            <label>Nama lengkap<input type="text" name="name" placeholder="Nama kamu" required></label>
            <label>Nomor WhatsApp<input type="tel" name="phone" placeholder="08xxxxxxxxxx" required></label>
            <label>Layanan pilihan<select name="service" id="classic-booking-service" required><option value="">Pilih layanan</option><option>Cut & Styling</option><option>Hair Coloring</option><option>Hair Treatment</option><option>Konsultasi layanan</option></select></label>
            <div class="classic-form-row"><label>Tanggal pilihan<input type="date" name="date" id="classic-booking-date" required></label><label>Waktu pilihan<select name="time" required><option value="">Pilih waktu</option><option>09.00–11.00</option><option>11.00–13.00</option><option>13.00–15.00</option><option>15.00–17.00</option></select></label></div>
            <label>Catatan <span>(opsional)</span><textarea name="note" rows="3" placeholder="Ada kebutuhan khusus? Ceritakan di sini."></textarea></label>
            <button class="classic-button classic-button-dark classic-submit" type="submit">Lanjutkan via WhatsApp <span>↗</span></button><small class="classic-form-disclaimer">Permintaan jadwal akan dikonfirmasi oleh tim salon.</small>
        </form>
    </section>

    <section class="classic-location" id="classic-contact"><div><div class="classic-section-label"><span>05</span><i></i> COME SAY HELLO</div><h2>Find your way<br><em>to a little calm.</em></h2><p>Kami menantikan kunjunganmu. Hubungi salon untuk memastikan alamat, jam operasional, dan ketersediaan jadwal.</p><a class="classic-text-link" href="#classic-booking">Rencanakan kunjungan <span>→</span></a></div><div class="classic-location-card"><div class="classic-location-icon">⌖</div><span>VISIT OUR ATELIER</span><h3>Maison Élise Salon</h3><p>Alamat salon ditampilkan di sini<br>Kota, Provinsi</p><div class="classic-location-line"></div><div class="classic-hours"><span>Jam operasional</span><b>Senin – Sabtu · 09.00–17.00</b><small>Jam operasional merupakan contoh demo.</small></div><a href="#classic-booking">Tanyakan arah & jadwal ↗</a></div></section>

    <section class="classic-quote"><span>✳</span><blockquote>“Taking care of yourself is not a luxury.<br>It is a lovely little ritual.”</blockquote><small>A NOTE FROM MAISON ÉLISE</small></section>

    <footer class="classic-footer"><a class="classic-brand" href="#classic-home"><span class="classic-brand-mark">M<span>É</span></span><span class="classic-brand-name">MAISON ÉLISE<small>HAIR & BEAUTY ATELIER</small></span></a><p>Thoughtful care, timeless beauty.</p><div><a href="#classic-services">Layanan</a><a href="#classic-booking">Booking</a><a href="#classic-contact">Kontak</a></div><small>© <span id="classic-year"></span> Maison Élise Salon. Template demo WEBIA.</small></footer>

    <button class="classic-chat-toggle" id="classic-chat-toggle" type="button" aria-label="Buka asisten salon" aria-expanded="false"><span>✳</span><b>Tanya Salon</b></button>
    <aside class="classic-chat-panel" id="classic-chat-panel" aria-label="Asisten salon" hidden><div class="classic-chat-head"><span class="classic-chat-avatar">✳</span><div><b>Salon Assistant</b><small>Asisten informasi demo</small></div><button type="button" id="classic-chat-close" aria-label="Tutup chat">×</button></div><div class="classic-chat-body" id="classic-chat-body"><p class="classic-chat-message">Halo, welcome! ✨ Ada yang bisa kami bantu? Pilih pertanyaan di bawah untuk melihat informasi salon.</p><div class="classic-chat-quick"><button type="button" data-question="services">Layanan apa saja?</button><button type="button" data-question="price">Berapa harganya?</button><button type="button" data-question="booking">Cara booking?</button><button type="button" data-question="location">Lokasi & jam buka</button></div></div><form id="classic-chat-form" class="classic-chat-input"><input type="text" id="classic-chat-question" placeholder="Tulis pertanyaan..." aria-label="Tulis pertanyaan"><button type="submit" aria-label="Kirim pertanyaan">↑</button></form><div class="classic-chat-foot">Jawaban otomatis ini masih demo, belum terhubung ke AI.</div></aside>
</main>
@endsection

@push('styles')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,500;0,600;1,400;1,500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/website-bisnis/salon-classic-warm-neutral.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('js/website-bisnis/salon-classic-warm-neutral.js') }}" defer></script>
@endpush
