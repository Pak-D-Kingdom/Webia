@extends('website-bisnis.layouts.app')

@section('title', 'Sage Bloom Salon — Modern Beauty & Hair Studio')
@section('meta_description', 'Temukan perawatan rambut dan kecantikan di Sage Bloom Salon. Lihat layanan, harga, durasi treatment, stylist, promo, dan reservasi jadwal dengan mudah.')

@push('styles')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/website-bisnis/salon-modern-sage.css') }}">
@endpush

@section('content')
    <main class="sage-salon" id="top">
        <div class="sage-announcement">
            <span class="sage-announcement-dot"></span>
            A little time for yourself. <a href="#promo">Lihat promo bulan ini ↗</a>
        </div>

        <header class="sage-header">
            <a href="#top" class="sage-brand" aria-label="Sage Bloom Salon, kembali ke atas">
                <span class="sage-brand-mark">sb.</span>
                <span class="sage-brand-copy"><strong>SAGE BLOOM</strong><small>HAIR & BEAUTY STUDIO</small></span>
            </a>
            <button class="sage-menu-toggle" type="button" aria-expanded="false" aria-controls="sage-navigation" aria-label="Buka navigasi">☰</button>
            <nav class="sage-nav" id="sage-navigation" aria-label="Navigasi utama">
                <a href="#services">Layanan</a>
                <a href="#about">Tentang Kami</a>
                <a href="#stylists">Stylist</a>
                <a href="#reviews">Testimoni</a>
                <a href="#location">Lokasi</a>
            </nav>
            <a class="sage-button sage-button-dark sage-header-cta" href="#booking">Booking Sekarang <span>↗</span></a>
        </header>

        <section class="sage-hero">
            <div class="sage-hero-copy">
                <span class="sage-eyebrow"><i></i> YOUR MODERN BEAUTY RITUAL</span>
                <h1>A little care.<br>A <em>whole new</em> you.</h1>
                <p>Ruang untuk merawat diri, menyegarkan penampilan, dan pulang dengan rasa percaya diri yang baru.</p>
                <div class="sage-hero-actions">
                    <a class="sage-button sage-button-dark" href="#booking">Temukan Waktu Terbaikmu <span>↗</span></a>
                    <a class="sage-text-link" href="#services">Jelajahi layanan <span>↓</span></a>
                </div>
                <div class="sage-hero-proof">
                    <div class="sage-avatar-stack" aria-hidden="true"><span>A</span><span>N</span><span>S</span></div>
                    <div><strong>Perawatan yang terasa personal</strong><small>Ditangani stylist yang memahami kebutuhanmu</small></div>
                </div>
            </div>
            <div class="sage-hero-visual">
                <img src="https://images.unsplash.com/photo-1560066984-138dadb4c035?auto=format&fit=crop&w=1200&q=85" alt="Interior salon modern yang nyaman dan terang" fetchpriority="high">
                <div class="sage-image-note"><span class="sage-note-icon">✳</span><span><strong>Your moment, your glow.</strong><small>Feel-good beauty starts here.</small></span></div>
                <div class="sage-hero-stamp"><span>CARE</span><b>✳</b><span>CONFIDENCE</span></div>
            </div>
            <div class="sage-hero-bottom"><span>01 / A SPACE TO RESET</span><span>SCROLL TO FEEL THE DIFFERENCE ↓</span></div>
        </section>

        <section class="sage-service-strip" aria-label="Keunggulan salon">
            <span>Thoughtful treatments</span><i>✳</i><span>Skilled stylists</span><i>✳</i><span>Feel-good atmosphere</span><i>✳</i><span>Made for you</span>
        </section>

        <section class="sage-section sage-services" id="services">
            <div class="sage-section-heading">
                <div><span class="sage-eyebrow">THE SERVICE MENU</span><h2>Good hair days<br>start <em>right here.</em></h2></div>
                <p>Dari refresh sederhana hingga perubahan tampilan yang baru, pilih perawatan yang paling sesuai dengan kebutuhanmu.</p>
            </div>
            <div class="sage-service-grid">
                <article class="sage-service-card">
                    <div class="sage-service-image"><img src="https://images.unsplash.com/photo-1521590832167-7bcbfaa6381f?auto=format&fit=crop&w=900&q=80" alt="Styling dan perawatan rambut di salon" loading="lazy"><span>01</span></div>
                    <div class="sage-service-info"><div><h3>Haircut & Styling</h3><span class="sage-service-duration">45–60 menit</span></div><p>Potongan dan styling yang disesuaikan dengan bentuk wajah serta gaya personalmu.</p><div class="sage-service-price"><strong>Mulai Rp85.000</strong><a href="#booking" data-service="Haircut & Styling" aria-label="Booking Haircut dan Styling">↗</a></div></div>
                </article>
                <article class="sage-service-card sage-service-featured">
                    <div class="sage-service-image"><img src="https://images.unsplash.com/photo-1633681926022-84c23e8cb2d5?auto=format&fit=crop&w=900&q=80" alt="Perawatan dan pewarnaan rambut" loading="lazy"><span>02</span><b>CLIENT FAVOURITE</b></div>
                    <div class="sage-service-info"><div><h3>Hair Color</h3><span class="sage-service-duration">90–150 menit</span></div><p>Eksplorasi warna yang memberi dimensi dan karakter baru pada rambutmu.</p><div class="sage-service-price"><strong>Mulai Rp250.000</strong><a href="#booking" data-service="Hair Color" aria-label="Booking Hair Color">↗</a></div></div>
                </article>
                <article class="sage-service-card">
                    <div class="sage-service-image"><img src="https://images.unsplash.com/photo-1519699047748-de8e457a634e?auto=format&fit=crop&w=900&q=80" alt="Perawatan rambut agar terasa lebih sehat" loading="lazy"><span>03</span></div>
                    <div class="sage-service-info"><div><h3>Hair Treatment</h3><span class="sage-service-duration">45–75 menit</span></div><p>Waktu ekstra untuk membantu rambut terasa lebih lembut, terawat, dan mudah diatur.</p><div class="sage-service-price"><strong>Mulai Rp150.000</strong><a href="#booking" data-service="Hair Treatment" aria-label="Booking Hair Treatment">↗</a></div></div>
                </article>
            </div>
            <p class="sage-disclaimer">*Harga dan durasi di atas merupakan contoh konten template. Sesuaikan dengan daftar layanan salon sebenarnya.</p>
        </section>

        <section class="sage-about" id="about">
            <div class="sage-about-image"><img src="https://images.unsplash.com/photo-1522337360788-8b13dee7a37e?auto=format&fit=crop&w=1100&q=85" alt="Stylist sedang memberikan layanan kecantikan kepada pelanggan" loading="lazy"><span class="sage-about-caption">A softer pace. A better you.</span></div>
            <div class="sage-about-copy"><span class="sage-eyebrow">MORE THAN A SALON VISIT</span><h2>Your beauty,<br>your <em>own kind</em><br>of confidence.</h2><p>Kami percaya perawatan terbaik dimulai dari mendengarkan. Tim kami akan membantumu memilih layanan yang sesuai dengan kondisi rambut, preferensi, dan hasil yang ingin kamu capai.</p><ul><li><span>✳</span> Konsultasi sebelum perawatan</li><li><span>✳</span> Rekomendasi sesuai kebutuhan</li><li><span>✳</span> Suasana nyaman dan personal</li></ul><a class="sage-button sage-button-outline" href="#booking">Kenali kebutuhanmu <span>↗</span></a></div>
        </section>

        <section class="sage-section sage-stylists" id="stylists">
            <div class="sage-section-heading"><div><span class="sage-eyebrow">MEET YOUR STYLISTS</span><h2>Good hands.<br><em>Good energy.</em></h2></div><p>Kenali tim yang akan menemani perjalanan perawatanmu. Setiap stylist punya keahlian dan pendekatan yang berbeda.</p></div>
            <div class="sage-stylist-grid">
                <article class="sage-stylist-card"><img src="https://images.unsplash.com/photo-1580618672591-eb180b1a973f?auto=format&fit=crop&w=800&q=80" alt="Potret stylist salon pertama" loading="lazy"><div><span>HAIR STYLIST</span><h3>Amara Putri</h3><p>Haircut · Everyday styling</p></div></article>
                <article class="sage-stylist-card"><img src="https://images.unsplash.com/photo-1595476108010-b4d1f102b1b1?auto=format&fit=crop&w=800&q=80" alt="Potret stylist salon kedua" loading="lazy"><div><span>COLOUR SPECIALIST</span><h3>Nadia Kirana</h3><p>Hair color · Colour consultation</p></div></article>
                <article class="sage-stylist-card"><img src="https://images.unsplash.com/photo-1560869713-7d0a29430803?auto=format&fit=crop&w=800&q=80" alt="Potret stylist salon ketiga" loading="lazy"><div><span>TREATMENT SPECIALIST</span><h3>Keisha Anindya</h3><p>Hair spa · Hair treatment</p></div></article>
            </div>
            <p class="sage-disclaimer">*Nama, foto, dan spesialisasi stylist adalah data contoh yang dapat diganti.</p>
        </section>

        <section class="sage-promo" id="promo"><div class="sage-promo-decoration">✳</div><div><span class="sage-eyebrow">A LITTLE SOMETHING FOR YOU</span><h2>Your first visit,<br>a little <em>more special.</em></h2><p>Nikmati potongan 10% untuk kunjungan pertamamu. Ceritakan layanan yang kamu inginkan kepada tim kami saat reservasi.</p><small>*Contoh promo template. Syarat dan periode berlaku dapat disesuaikan.</small></div><a class="sage-button sage-button-light" href="#booking">Klaim promo <span>↗</span></a></section>

        <section class="sage-section sage-reviews" id="reviews"><div class="sage-section-heading"><div><span class="sage-eyebrow">KIND WORDS</span><h2>A little love<br>from <em>our clients.</em></h2></div><div class="sage-review-rating"><strong>4.9</strong><span>★★★★★</span><small>Illustrative rating</small></div></div><div class="sage-review-grid"><blockquote><div>★★★★★</div><p>“Stylist-nya mendengarkan dulu apa yang aku mau. Hasilnya terasa pas dan rambut jadi lebih gampang diatur.”</p><footer><span class="sage-review-avatar">D</span><span><strong>Dea P.</strong><small>Haircut & Styling</small></span></footer></blockquote><blockquote><div>★★★★★</div><p>“Tempatnya nyaman, proses konsultasinya jelas, dan aku dibantu memilih warna yang sesuai.”</p><footer><span class="sage-review-avatar">M</span><span><strong>Maya R.</strong><small>Hair Color</small></span></footer></blockquote><blockquote><div>★★★★★</div><p>“Booking-nya mudah dan timnya ramah. Rasanya seperti punya waktu khusus untuk diri sendiri.”</p><footer><span class="sage-review-avatar">A</span><span><strong>Alin S.</strong><small>Hair Treatment</small></span></footer></blockquote></div><p class="sage-disclaimer">*Testimoni dan rating merupakan contoh visual, bukan ulasan pelanggan terverifikasi.</p></section>

        <section class="sage-booking" id="booking"><div class="sage-booking-copy"><span class="sage-eyebrow">YOUR NEXT GOOD HAIR DAY</span><h2>Ready for a little <em>reset?</em></h2><p>Pilih layanan dan waktu yang kamu inginkan. Kami akan meneruskan detail reservasi ke WhatsApp agar tim salon dapat mengonfirmasi jadwalmu.</p><div class="sage-booking-contact"><span>NEED A LITTLE HELP?</span><a href="https://wa.me/6281234567890" target="_blank" rel="noopener">Chat with our team ↗</a><small>Ganti nomor contoh dengan WhatsApp salon.</small></div></div>
            <form class="sage-booking-form" id="sage-booking-form" data-whatsapp="6281234567890">
                <div class="sage-form-heading"><span>LET'S BOOK YOUR VISIT</span><h3>Make time for you.</h3></div>
                <label>Nama lengkap<input type="text" name="name" placeholder="Nama kamu" autocomplete="name" required></label>
                <div class="sage-form-row"><label>Pilih layanan<select name="service" id="sage-service-select" required><option value="">Pilih layanan</option><option>Haircut & Styling</option><option>Hair Color</option><option>Hair Treatment</option><option>Konsultasi terlebih dahulu</option></select></label><label>Tanggal pilihan<input type="date" name="date" id="sage-booking-date" required></label></div>
                <label>Catatan (opsional)<textarea name="notes" rows="3" placeholder="Ceritakan kebutuhan atau preferensimu"></textarea></label>
                <button class="sage-button sage-button-dark sage-form-submit" type="submit">Kirim permintaan booking <span>↗</span></button>
                <small class="sage-form-note">Jadwal belum terkonfirmasi sampai tim salon menghubungimu kembali.</small>
                <p class="sage-form-status" id="sage-booking-status" role="status" aria-live="polite"></p>
            </form>
        </section>

        <section class="sage-location" id="location"><div><span class="sage-eyebrow">COME SAY HELLO</span><h2>Your little escape<br><em>is closer than you think.</em></h2><p>Datang untuk konsultasi atau nikmati waktu perawatan di studio kami.</p></div><div class="sage-location-details"><span class="sage-location-icon">⌖</span><div><strong>Sage Bloom Hair & Beauty Studio</strong><p>Jl. Contoh No. 10, Kota Anda</p><p>Senin–Sabtu · 09.00–19.00 WIB</p><a href="https://maps.google.com/?q=Sage+Bloom+Salon" target="_blank" rel="noopener">Lihat petunjuk arah ↗</a></div></div></section>

        <footer class="sage-footer"><a href="#top" class="sage-brand"><span class="sage-brand-mark">sb.</span><span class="sage-brand-copy"><strong>SAGE BLOOM</strong><small>HAIR & BEAUTY STUDIO</small></span></a><p>A little care goes a long way.</p><div><a href="#services">Layanan</a><a href="#booking">Booking</a><a href="#location">Lokasi</a><a href="https://instagram.com/" target="_blank" rel="noopener">Instagram ↗</a></div><small>© {{ date('Y') }} Sage Bloom Salon. Demo template WEBIA.</small></footer>

        <button class="sage-chat-launcher" type="button" id="sage-chat-launcher" aria-label="Buka asisten salon"><span>✳</span><b>Tanya AI</b></button>
        <aside class="sage-chat-panel" id="sage-chat-panel" aria-label="Asisten salon" hidden><div class="sage-chat-head"><span class="sage-chat-symbol">✳</span><div><strong>Sage Assistant</strong><small>Beauty guide · Demo UI</small></div><button type="button" id="sage-chat-close" aria-label="Tutup chat">×</button></div><div class="sage-chat-messages" id="sage-chat-messages"><p class="sage-chat-bubble">Hai! ✨ Aku bisa bantu kamu melihat layanan dan menyiapkan pertanyaan untuk tim salon. Mau tahu tentang apa?</p></div><div class="sage-chat-suggestions"><button type="button" data-chat-question="Layanan apa saja yang tersedia?">Lihat layanan</button><button type="button" data-chat-question="Bagaimana cara booking?">Cara booking</button><button type="button" data-chat-question="Bagaimana memilih treatment?">Rekomendasi treatment</button></div><form id="sage-chat-form" class="sage-chat-input"><input type="text" id="sage-chat-question" placeholder="Tulis pertanyaan..." aria-label="Pertanyaan untuk asisten salon" required><button type="submit" aria-label="Kirim pertanyaan">↑</button></form><small class="sage-chat-disclaimer">Demo antarmuka. Hubungkan ke layanan AI untuk jawaban bisnis otomatis.</small></aside>
    </main>
@endsection

@push('scripts')
    <script src="{{ asset('js/website-bisnis/salon-modern-sage.js') }}" defer></script>
@endpush
