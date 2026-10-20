<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Template website nail art profesional dengan desain soft pink, galeri nail art, layanan, harga, testimoni, dan booking appointment.">
    <title>Blush Nail Studio — Nail Art & Care</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/website-bisnis/templates/beauty/nailart/nailart-professional-softpink.css') }}">
</head>
<body class="blush-template{{ request()->boolean('preview') ? ' webia-hero-preview-mode' : '' }}">
    <div class="blush-announcement">YOUR LITTLE MOMENT OF SELF-CARE <span>✦</span> BOOK YOUR NAIL APPOINTMENT</div>
    <header class="blush-header">
        <a class="blush-brand" href="#home" aria-label="Blush Nail Studio home"><span class="blush-brand-mark">b.</span><span><strong>BLUSH</strong><small>NAIL STUDIO</small></span></a>
        <button class="blush-menu-toggle" type="button" aria-label="Buka navigasi" aria-expanded="false">☰</button>
        <nav class="blush-nav" aria-label="Navigasi utama">
            <a href="#services">Services</a><a href="#gallery">Nail Gallery</a><a href="#pricing">Pricing</a><a href="#reviews">Reviews</a>
            <a class="blush-nav-cta" href="#booking">Book an Appointment <span>↗</span></a>
        </nav>
    </header>

    <main>
        <section class="blush-hero" id="home">
            <div class="blush-hero-copy">
                <span class="blush-eyebrow"><i></i> NAIL ART · NAIL CARE · SELF LOVE</span>
                <h1>Your nails,<br>your <em>little</em><br>work of art.</h1>
                <p>Detail kecil yang bikin kamu merasa lebih percaya diri. Temukan nail art favoritmu dan nikmati me-time di studio yang nyaman.</p>
                <div class="blush-hero-actions"><a class="blush-button blush-button-dark" href="#booking">Book your session <span>↗</span></a><a class="blush-text-link" href="#gallery">Explore our work <span>↓</span></a></div>
                <div class="blush-hero-note"><span class="blush-avatar-stack"><i>✿</i><i>♡</i><i>✦</i></span><span><strong>Made with care</strong><small>Detail, hygiene, and your comfort first.</small></span></div>
            </div>
            <div class="blush-hero-art">
                <div class="blush-hero-image"><img src="https://images.unsplash.com/photo-1604654894610-df63bc536371?auto=format&fit=crop&w=1100&q=85" alt="Nail art soft pink dengan detail elegan" fetchpriority="high"></div>
                <div class="blush-floating-card"><span class="blush-sparkle">✳</span><span><strong>Your nails, your mood.</strong><small>Find your signature set.</small></span></div>
                <div class="blush-round-stamp">PRETTY<br>IN EVERY<br>DETAIL <span>✦</span></div>
            </div>
        </section>

        <section class="blush-trust-strip" aria-label="Keunggulan studio"><span>✦ Hygienic tools</span><span>✦ Skilled nail artists</span><span>✦ Premium products</span><span>✦ A cozy little studio</span></section>

        <section class="blush-section blush-services" id="services">
            <div class="blush-section-heading"><div><span class="blush-eyebrow">A LITTLE SOMETHING FOR YOU</span><h2>Find your <em>nail moment.</em></h2></div><p>Mulai dari clean and simple sampai detail nail art yang unik, kami bantu wujudkan gaya yang kamu suka.</p></div>
            <div class="blush-service-grid">
                <article class="blush-service-card"><span class="blush-service-number">01 / CARE</span><div class="blush-service-icon">♡</div><h3>Nail Care</h3><p>Perawatan kuku dan cuticle agar kuku terasa bersih, sehat, dan terawat.</p><a href="#pricing">Explore service <span>↗</span></a></article>
                <article class="blush-service-card blush-service-featured"><span class="blush-service-number">02 / ART</span><div class="blush-service-icon">✳</div><h3>Nail Art</h3><p>Custom design sesuai mood, occasion, dan inspirasi favoritmu.</p><a href="#gallery">See the gallery <span>↗</span></a></article>
                <article class="blush-service-card"><span class="blush-service-number">03 / EXTENSION</span><div class="blush-service-icon">✧</div><h3>Nail Extension</h3><p>Bentuk dan panjang kuku yang dirancang untuk melengkapi gayamu.</p><a href="#pricing">Explore service <span>↗</span></a></article>
            </div>
        </section>

        <section class="blush-gallery-section" id="gallery">
            <div class="blush-section blush-gallery-inner">
                <div class="blush-section-heading"><div><span class="blush-eyebrow">YOUR NEXT NAIL INSPO</span><h2>Little details,<br><em>big feelings.</em></h2></div><p>Swipe through some of our favorite looks. Punya referensi sendiri? Bawa inspirasimu saat booking.</p></div>
                <div class="blush-gallery-grid">
                    <figure class="blush-gallery-item blush-gallery-tall"><img src="https://images.unsplash.com/photo-1610992015732-2449b76344bc?auto=format&fit=crop&w=800&q=85" alt="Inspirasi nail art soft pink" loading="lazy"><figcaption><span>01</span><strong>Soft & Sweet</strong><small>Blush pink · Glossy finish</small></figcaption></figure>
                    <figure class="blush-gallery-item"><img src="https://images.unsplash.com/photo-1632345031435-8727f6897d53?auto=format&fit=crop&w=800&q=85" alt="Inspirasi nail art minimalis" loading="lazy"><figcaption><span>02</span><strong>Clean Girl</strong><small>Minimal · Timeless</small></figcaption></figure>
                    <figure class="blush-gallery-item"><img src="https://images.unsplash.com/photo-1604902396830-aca29e19b067?auto=format&fit=crop&w=800&q=85" alt="Inspirasi nail art kreatif" loading="lazy"><figcaption><span>03</span><strong>Playful Bloom</strong><small>Artistic · Custom</small></figcaption></figure>
                </div>
                <p class="blush-demo-note">*Foto galeri merupakan contoh visual template dan dapat diganti dengan portofolio bisnis.</p>
            </div>
        </section>

        <section class="blush-section blush-pricing" id="pricing">
            <div class="blush-section-heading"><div><span class="blush-eyebrow">SIMPLE, LOVELY, TRANSPARENT</span><h2>A little treat<br><em>for yourself.</em></h2></div><p>Harga di bawah adalah contoh konten template. Sesuaikan dengan layanan, durasi, dan harga studio kamu.</p></div>
            <div class="blush-price-grid">
                <article class="blush-price-card"><span class="blush-price-label">THE ESSENTIAL</span><h3>Nail Care</h3><p>Clean, neat, and refreshed.</p><div class="blush-price">Rp75.000<span>/session</span></div><ul><li>Basic nail shaping</li><li>Cuticle care</li><li>Buff & natural finish</li></ul><a href="#booking" class="blush-price-link">Choose this service ↗</a></article>
                <article class="blush-price-card blush-price-popular"><span class="blush-price-badge">MOST LOVED ✦</span><span class="blush-price-label">THE SIGNATURE</span><h3>Nail Art</h3><p>Your idea, our little magic.</p><div class="blush-price">Rp150.000<span>/session</span></div><ul><li>Basic nail care</li><li>Custom art up to 2 accent nails</li><li>Glossy top coat</li></ul><a href="#booking" class="blush-button blush-button-dark">Choose this service ↗</a></article>
                <article class="blush-price-card"><span class="blush-price-label">THE STATEMENT</span><h3>Nail Extension</h3><p>Extra length, extra confidence.</p><div class="blush-price">Rp250.000<span>/session</span></div><ul><li>Nail extension application</li><li>Shape & color of your choice</li><li>Simple art included</li></ul><a href="#booking" class="blush-price-link">Choose this service ↗</a></article>
            </div>
            <p class="blush-price-disclaimer">Harga final dapat menyesuaikan panjang kuku, tingkat detail desain, dan material yang digunakan.</p>
        </section>

        <section class="blush-review-section" id="reviews"><div class="blush-section blush-review-inner"><span class="blush-eyebrow">KIND WORDS, HAPPY NAILS</span><h2>A little love<br>from our <em>clients.</em></h2><div class="blush-review-grid"><blockquote><div class="blush-stars">★★★★★</div><p>“Tempatnya nyaman, nail artist-nya teliti banget. Hasilnya sesuai referensi yang aku bawa!”</p><footer><span class="blush-review-avatar">A</span><span><strong>Amelia R.</strong><small>Regular client</small></span></footer></blockquote><blockquote><div class="blush-stars">★★★★★</div><p>“Suka banget sama detail dan finishing-nya. Kuku jadi cantik dan tetap kelihatan clean.”</p><footer><span class="blush-review-avatar">N</span><span><strong>Nadia P.</strong><small>First-time client</small></span></footer></blockquote><blockquote><div class="blush-stars">★★★★★</div><p>“Booking-nya gampang dan hasilnya rapi. Pasti balik lagi buat coba design yang lain.”</p><footer><span class="blush-review-avatar">S</span><span><strong>Sarah K.</strong><small>Happy client</small></span></footer></blockquote></div><p class="blush-demo-note">*Nama dan testimoni di atas adalah contoh untuk preview template.</p></div></section>

        <section class="blush-booking-section" id="booking"><div class="blush-booking-card"><div class="blush-booking-copy"><span class="blush-eyebrow">YOUR ME-TIME STARTS HERE</span><h2>Ready for your<br><em>nail moment?</em></h2><p>Pilih layanan favoritmu, tinggalkan detail kontak, dan kami akan bantu atur jadwal yang cocok.</p><div class="blush-contact-lines"><span>✉ hello@blushnail.example</span><span>⌖ Your Studio Address, Indonesia</span><span>◷ Tue–Sun · 10.00–19.00</span></div></div><form class="blush-booking-form" id="blush-booking-form"><label>Nama kamu<input name="name" type="text" placeholder="Masukkan nama" required></label><label>Nomor WhatsApp<input name="phone" type="tel" placeholder="08xxxxxxxxxx" required></label><label>Layanan yang diminati<select name="service" required><option value="">Pilih layanan</option><option>Nail Care</option><option>Nail Art</option><option>Nail Extension</option></select></label><label>Tanggal pilihan<input name="date" type="date" required></label><button class="blush-button blush-button-dark" type="submit">Request an appointment <span>↗</span></button><small>Form ini masih demo. Hubungkan ke WhatsApp atau backend saat template digunakan oleh bisnis.</small></form></div></section>
    </main>

    <footer class="blush-footer" id="contact">
        <div class="blush-footer-main">
            <div class="blush-footer-brand-col">
                <a class="blush-brand" href="#home" aria-label="Blush Nail Studio home"><span class="blush-brand-mark">b.</span><span><strong>BLUSH</strong><small>NAIL STUDIO</small></span></a>
                <p class="blush-footer-about">A little love in every detail. Kami percaya setiap orang pantas punya waktu untuk merawat diri dan mengekspresikan gaya lewat kuku yang cantik.</p>
                <a class="blush-footer-cta" href="#booking">Book your little moment <span>↗</span></a>
            </div>
            <div class="blush-footer-col"><h3>Explore</h3><a href="#services">Our Services</a><a href="#gallery">Nail Art Gallery</a><a href="#pricing">Services & Pricing</a><a href="#reviews">Client Reviews</a><a href="#booking">Appointment Booking</a></div>
            <div class="blush-footer-col"><h3>Visit the Studio</h3><p><span>⌖</span> Your Studio Address, Indonesia</p><p><span>◷</span> Tuesday – Sunday<br>10.00 – 19.00 WIB</p><p><span>✉</span> hello@blushnail.example</p><p><span>☏</span> +62 858-5018-0285</p></div>
            <div class="blush-footer-col blush-footer-social"><h3>Let's Connect</h3><p>Butuh rekomendasi layanan atau ingin konsultasi desain nail art? Kami siap membantu.</p><a href="https://wa.me/6285850180285?text=Halo%20Blush%20Nail%20Studio%2C%20saya%20ingin%20bertanya%20tentang%20layanan%20nail%20art." target="_blank" rel="noopener noreferrer">WhatsApp Studio ↗</a><a href="#booking">Request an Appointment ↗</a><a href="#home">Back to Top ↑</a></div>
        </div>
        <div class="blush-footer-bottom"><span>© <span id="blush-current-year">2026</span> Blush Nail Studio. All rights reserved.</span><span>Made with care ♡ · Website template by WEBIA</span></div>
    </footer>

    <a class="blush-whatsapp-fab" href="https://wa.me/6285850180285?text=Halo%20Blush%20Nail%20Studio%2C%20saya%20ingin%20bertanya%20tentang%20layanan%20nail%20art." target="_blank" rel="noopener noreferrer" aria-label="Chat Blush Nail Studio via WhatsApp" title="Chat via WhatsApp">
        <svg viewBox="0 0 32 32" aria-hidden="true"><path fill="currentColor" d="M16.02 3.2A12.7 12.7 0 0 0 5.08 22.34L3.3 28.8l6.62-1.73A12.7 12.7 0 1 0 16.02 3.2Zm0 23.25c-1.96 0-3.89-.53-5.57-1.54l-.4-.24-3.93 1.03 1.05-3.83-.26-.42a10.5 10.5 0 1 1 9.11 5Zm5.76-7.87c-.32-.16-1.89-.93-2.18-1.03-.3-.11-.51-.16-.73.16-.21.32-.83 1.03-1.02 1.24-.19.21-.38.24-.7.08-.32-.16-1.35-.5-2.57-1.58-.95-.84-1.59-1.88-1.78-2.2-.19-.32-.02-.49.14-.65.14-.14.32-.38.48-.57.16-.19.21-.32.32-.54.1-.21.05-.4-.03-.56-.08-.16-.73-1.76-1-2.41-.26-.63-.53-.54-.73-.55l-.62-.01c-.22 0-.57.08-.86.4-.3.32-1.13 1.1-1.13 2.69 0 1.59 1.16 3.12 1.32 3.34.16.21 2.28 3.48 5.53 4.88.77.33 1.37.21 2.02.13.62-.09 1.89-.77 2.15-1.52.27-.75.27-1.4.19-1.53-.08-.13-.29-.21-.61-.37Z"/></svg>
    </a>
    <div class="blush-chat-widget" id="blush-chat-widget">
        <section class="blush-chat-panel" id="blush-chat-panel" aria-label="AI assistant Blush Nail Studio" hidden>
            <div class="blush-chat-head"><span class="blush-chat-avatar">✦</span><span><strong>Blush Beauty Assistant</strong><small><i></i> Siap membantu · Demo</small></span><button type="button" id="blush-chat-close" aria-label="Tutup chat">×</button></div>
            <div class="blush-chat-messages" id="blush-chat-messages" aria-live="polite"><div class="blush-chat-message blush-chat-bot">Hi, beauty! ♡ Aku asisten virtual Blush. Mau tanya layanan, harga, atau cara booking?</div></div>
            <div class="blush-chat-quick" id="blush-chat-quick"><button type="button" data-chat-question="price">Info harga</button><button type="button" data-chat-question="service">Pilihan layanan</button><button type="button" data-chat-question="booking">Cara booking</button></div>
            <form class="blush-chat-form" id="blush-chat-form"><input id="blush-chat-input" type="text" placeholder="Tulis pertanyaanmu..." aria-label="Tulis pertanyaan" autocomplete="off"><button type="submit" aria-label="Kirim pesan">➤</button></form>
            <p class="blush-chat-disclaimer">Asisten demo · Untuk jawaban langsung, hubungi studio via WhatsApp.</p>
        </section>
        <button class="blush-ai-fab" id="blush-ai-fab" type="button" aria-expanded="false" aria-controls="blush-chat-panel"><span class="blush-ai-icon">✦</span><span>AI Chatbot</span></button>
    </div>
    <div class="blush-template-ribbon">WEBIA TEMPLATE PREVIEW <span>01 · PROFESSIONAL SOFT PINK</span></div>
    <script src="{{ asset('js/website-bisnis/templates/beauty/nailart/nailart-professional-softpink.js') }}" defer></script>
</body>
</html>
