<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Template website nail art minimalis dengan palet sage green, nail care journal, signature rituals, membership, dan appointment booking.">
    <title>Sage Nail Atelier — Nail Art & Care</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/website-bisnis/templates/beauty/nailart/nailart-minimalist-sagegreen.css') }}">
</head>
<body class="sage-template{{ request()->boolean('preview') ? ' webia-hero-preview-mode' : '' }}">
    <div class="sage-announcement">SLOW BEAUTY, THOUGHTFUL DETAILS <span>·</span> YOUR NAIL RITUAL</div>
    <header class="sage-header">
        <a class="sage-brand" href="#home" aria-label="Sage Nail Atelier home"><span class="sage-brand-mark">b.</span><span><strong>SAGE</strong><small>NAIL ATELIER</small></span></a>
        <button class="sage-menu-toggle" type="button" aria-label="Buka navigasi" aria-expanded="false">☰</button>
        <nav class="sage-nav" aria-label="Navigasi utama">
            <a href="#rituals">Rituals</a><a href="#journal">The Journal</a><a href="#membership">Membership</a><a href="#approach">Our Approach</a>
            <a class="sage-nav-cta" href="#booking">Reserve a Ritual <span>↗</span></a>
        </nav>
    </header>

    <main>
        <section class="sage-hero" id="home">
            <div class="sage-hero-copy">
                <span class="sage-eyebrow"><i></i> MINIMAL NAIL CARE · CONSCIOUS BEAUTY</span>
                <h1>Less, but<br><em>lovelier.</em></h1>
                <p>Ruang kecil untuk memperlambat hari. Kami merawat kuku dengan pendekatan yang mindful, detail yang tenang, dan desain yang terasa seperti dirimu sendiri.</p>
                <div class="sage-hero-actions"><a class="sage-button sage-button-dark" href="#booking">Reserve a ritual <span>↗</span></a><a class="sage-text-link" href="#approach">Our approach <span>↓</span></a></div>
                <div class="sage-hero-note"><span class="sage-avatar-stack"><i>○</i><i>✳</i><i>⌁</i></span><span><strong>Thoughtfully made</strong><small>Gentle care. Considered design. No rush.</small></span></div>
            </div>
            <div class="sage-hero-art"><div class="sage-hero-image"><img src="https://images.unsplash.com/photo-1604654894610-df63bc536371?auto=format&fit=crop&w=1100&q=85" alt="Nail manicure dengan nuansa natural dan minimalis" fetchpriority="high"></div><div class="sage-floating-card"><span class="sage-sparkle">✳</span><span><strong>A softer kind of beauty.</strong><small>Find space for your own ritual.</small></span></div><div class="sage-round-stamp">SLOW<br>BEAUTY<br>CLUB <span>✳</span></div></div>
        </section>

        <section class="sage-trust-strip" aria-label="Prinsip Sage Nail Atelier"><span>✦ Gentle nail care</span><span>✦ Calm appointments</span><span>✦ Thoughtful details</span><span>✦ Your natural style</span></section>

        <section class="sage-section sage-services" id="rituals">
            <div class="sage-section-heading"><div><span class="sage-eyebrow">CHOOSE YOUR MOMENT</span><h2>Small rituals,<br><em>lasting comfort.</em></h2></div><p>Bukan sekadar mempercantik kuku. Setiap sesi dirancang sebagai jeda yang nyaman, personal, dan sesuai kebutuhanmu.</p></div>
            <div class="sage-service-grid">
                <article class="sage-service-card"><span class="sage-service-number">RITUAL 01</span><div class="sage-service-icon">○</div><h3>The Reset</h3><p>Perawatan kuku natural, shaping, cuticle care, dan hasil akhir bersih untuk keseharian.</p><a href="#membership">Explore ritual <span>↗</span></a></article>
                <article class="sage-service-card sage-service-featured"><span class="sage-service-number">RITUAL 02</span><div class="sage-service-icon">⌁</div><h3>The Barely There</h3><p>Sheer tint, soft nude, dan detail tipis untuk tampilan effortless yang tetap terasa polished.</p><a href="#journal">Find your finish <span>↗</span></a></article>
                <article class="sage-service-card"><span class="sage-service-number">RITUAL 03</span><div class="sage-service-icon">✳</div><h3>The Personal Edit</h3><p>Desain minimal yang dikurasi dari bentuk, warna, dan inspirasi yang paling kamu suka.</p><a href="#booking">Plan your session <span>↗</span></a></article>
            </div>
        </section>

        <section class="sage-gallery-section" id="journal"><div class="sage-section sage-gallery-inner"><div class="sage-section-heading"><div><span class="sage-eyebrow">THE NAIL JOURNAL</span><h2>Quiet tones.<br><em>Intentional details.</em></h2></div><p>Kurasi inspirasi bernuansa earthy, translucent, dan clean. Pilih detail yang terasa paling dekat dengan gaya personalmu.</p></div>
            <div class="sage-gallery-grid"><figure class="sage-gallery-item sage-gallery-tall"><img src="https://images.unsplash.com/photo-1610992015732-2449b76344bc?auto=format&fit=crop&w=800&q=85" alt="Inspirasi kuku natural dengan sentuhan lembut" loading="lazy"><figcaption><span>01</span><strong>Soft Form</strong><small>Sheer nude · Natural shape</small></figcaption></figure><figure class="sage-gallery-item"><img src="https://images.unsplash.com/photo-1632345031435-8727f6897d53?auto=format&fit=crop&w=800&q=85" alt="Inspirasi manicure minimalis" loading="lazy"><figcaption><span>02</span><strong>Quiet French</strong><small>Fine line · Timeless</small></figcaption></figure><figure class="sage-gallery-item"><img src="https://images.unsplash.com/photo-1604902396830-aca29e19b067?auto=format&fit=crop&w=800&q=85" alt="Inspirasi nail art earthy" loading="lazy"><figcaption><span>03</span><strong>Earth Notes</strong><small>Sage accents · Organic</small></figcaption></figure></div><p class="sage-demo-note">*Foto inspirasi merupakan contoh visual. Ganti dengan portofolio asli saat website digunakan.</p>
        </div></section>

        <section class="sage-section sage-approach" id="approach"><div class="sage-section-heading"><div><span class="sage-eyebrow">A MORE MINDFUL APPOINTMENT</span><h2>Good care is<br><em>in the details.</em></h2></div><p>Kami menjaga proses tetap sederhana agar kamu tahu apa yang dilakukan, merasa nyaman, dan bisa menikmati hasilnya.</p></div><div class="sage-process-grid"><article><span>01</span><h3>Listen first</h3><p>Kami mulai dengan memahami kondisi kuku, rutinitas, dan hasil yang kamu inginkan.</p></article><article><span>02</span><h3>Care gently</h3><p>Setiap langkah dilakukan dengan teliti, memperhatikan kebersihan alat dan kenyamananmu.</p></article><article><span>03</span><h3>Keep it yours</h3><p>Rekomendasi bentuk dan warna dibuat personal, bukan mengikuti tren semata.</p></article></div><div class="sage-care-note"><span class="sage-care-mark">✳</span><div><strong>A little note for your nails</strong><p>Gunakan cuticle oil secara rutin, beri jeda bila kuku terasa rapuh, dan konsultasikan kondisi kuku sebelum memilih layanan tertentu.</p></div></div></section>

        <section class="sage-section sage-pricing" id="membership"><div class="sage-section-heading"><div><span class="sage-eyebrow">A ROUTINE THAT FITS YOU</span><h2>Your own kind<br><em>of consistency.</em></h2></div><p>Pilih sesi sesuai kebutuhanmu. Harga berikut merupakan contoh dan dapat disesuaikan dengan layanan studio.</p></div><div class="sage-price-grid"><article class="sage-price-card"><span class="sage-price-label">THE RESET</span><h3>Natural Care</h3><p>For a clean, healthy-looking finish.</p><div class="sage-price">Rp85.000<span>/sesi</span></div><ul><li>Nail shaping & buffing</li><li>Gentle cuticle care</li><li>Natural finish</li></ul><a href="#booking" class="sage-price-link">Choose this ritual ↗</a></article><article class="sage-price-card sage-price-popular"><span class="sage-price-badge">ATELIER FAVORITE ✳</span><span class="sage-price-label">THE BARELY THERE</span><h3>Sheer Manicure</h3><p>A subtle tint, thoughtfully finished.</p><div class="sage-price">Rp135.000<span>/sesi</span></div><ul><li>Natural care ritual</li><li>Sheer color or soft nude</li><li>Gloss or satin finish</li></ul><a href="#booking" class="sage-button sage-button-dark">Choose this ritual ↗</a></article><article class="sage-price-card"><span class="sage-price-label">THE PERSONAL EDIT</span><h3>Minimal Art</h3><p>Quiet details made just for you.</p><div class="sage-price">Rp185.000<span>/sesi</span></div><ul><li>Manicure preparation</li><li>Minimal custom design</li><li>Personal color consultation</li></ul><a href="#booking" class="sage-price-link">Choose this ritual ↗</a></article></div><p class="sage-price-disclaimer">Harga final menyesuaikan panjang kuku, material, dan tingkat detail desain.</p></section>

        <section class="sage-review-section" id="notes"><div class="sage-section sage-review-inner"><span class="sage-eyebrow">NOTES FROM THE ATELIER</span><h2>Little reflections<br>from <em>our guests.</em></h2><div class="sage-review-grid"><blockquote><div class="sage-stars">★★★★★</div><p>“Aku suka suasananya yang tenang. Hasilnya clean dan cocok banget buat aktivitas sehari-hari.”</p><footer><span class="sage-review-avatar">D</span><span><strong>Dina A.</strong><small>Guest note · Demo</small></span></footer></blockquote><blockquote><div class="sage-stars">★★★★★</div><p>“Nggak buru-buru, dijelasin juga perawatannya. Pilihan warna nude-nya cantik dan subtle.”</p><footer><span class="sage-review-avatar">M</span><span><strong>Maya R.</strong><small>Guest note · Demo</small></span></footer></blockquote><blockquote><div class="sage-stars">★★★★★</div><p>“Suka karena desainnya nggak berlebihan tapi tetap rapi. Rasanya jadi punya me-time beneran.”</p><footer><span class="sage-review-avatar">L</span><span><strong>Laras P.</strong><small>Guest note · Demo</small></span></footer></blockquote></div><p class="sage-demo-note">*Catatan dan nama di atas merupakan konten contoh untuk preview template.</p></div></section>

        <section class="sage-booking-section" id="booking"><div class="sage-booking-card"><div class="sage-booking-copy"><span class="sage-eyebrow">MAKE ROOM FOR YOURSELF</span><h2>A slower day<br><em>starts here.</em></h2><p>Ceritakan ritual yang kamu cari dan tanggal yang diinginkan. Kami akan membantu menyiapkan sesi yang terasa pas untukmu.</p><div class="sage-contact-lines"><span>✉ hello@sagenail.example</span><span>⌖ Studio address · update before launch</span><span>◷ Tue–Sun · 10.00–18.00</span></div></div><form class="sage-booking-form" id="sage-booking-form"><label>Nama<input name="name" type="text" placeholder="Nama kamu" required></label><label>Nomor WhatsApp<input name="phone" type="tel" placeholder="08xxxxxxxxxx" required></label><label>Ritual pilihan<select name="service" required><option value="">Pilih ritual</option><option>The Reset — Natural Care</option><option>The Barely There — Sheer Manicure</option><option>The Personal Edit — Minimal Art</option></select></label><label>Tanggal yang diinginkan<input name="date" type="date" required></label><button class="sage-button sage-button-dark" type="submit">Request a quiet moment <span>↗</span></button><small>Form masih demo. Hubungkan ke WhatsApp atau backend untuk menerima booking.</small></form></div></section>
    </main>

    <footer class="sage-footer" id="contact">
        <div class="sage-footer-main">
            <div class="sage-footer-brand-col">
                <a class="sage-brand" href="#home" aria-label="Sage Nail Atelier home"><span class="sage-brand-mark">b.</span><span><strong>SAGE</strong><small>NAIL ATELIER</small></span></a>
                <p class="sage-footer-about">A quiet space for thoughtful nail care. Kami mengutamakan kenyamanan, detail yang sederhana, dan ritual kecil yang terasa personal.</p>
                <a class="sage-footer-cta" href="#booking">Reserve your ritual <span>↗</span></a>
            </div>
            <div class="sage-footer-col"><h3>Explore the atelier</h3><a href="#services">Signature Rituals</a><a href="#gallery">The Nail Journal</a><a href="#pricing">Rituals & Pricing</a><a href="#reviews">Guest Notes</a><a href="#booking">Reserve a Session</a></div>
            <div class="sage-footer-col"><h3>Studio Details</h3><p><span>⌖</span> Studio address · update before launch</p><p><span>◷</span> Tuesday – Sunday<br>10.00 – 19.00 WIB</p><p><span>✉</span> hello@sagenail.example</p><p><span>☏</span> +62 858-5018-0285</p></div>
            <div class="sage-footer-col sage-footer-social"><h3>Let's Connect</h3><p>Butuh rekomendasi layanan atau ingin konsultasi desain nail art? Kami siap membantu.</p><a href="https://wa.me/6285850180285?text=Halo%20Sage%20Nail%20Atelier%2C%20saya%20ingin%20bertanya%20tentang%20layanan%20nail%20art." target="_blank" rel="noopener noreferrer">WhatsApp Studio ↗</a><a href="#booking">Request an Appointment ↗</a><a href="#home">Back to Top ↑</a></div>
        </div>
        <div class="sage-footer-bottom"><span>© <span id="sage-current-year">2026</span> Sage Nail Atelier. All rights reserved.</span><span>Made with care ♡ · Website template by WEBIA</span></div>
    </footer>

    <a class="sage-whatsapp-fab" href="https://wa.me/6285850180285?text=Halo%20Sage%20Nail%20Atelier%2C%20saya%20ingin%20bertanya%20tentang%20layanan%20nail%20art." target="_blank" rel="noopener noreferrer" aria-label="Chat Sage Nail Atelier via WhatsApp" title="Chat via WhatsApp">
        <svg viewBox="0 0 32 32" aria-hidden="true"><path fill="currentColor" d="M16.02 3.2A12.7 12.7 0 0 0 5.08 22.34L3.3 28.8l6.62-1.73A12.7 12.7 0 1 0 16.02 3.2Zm0 23.25c-1.96 0-3.89-.53-5.57-1.54l-.4-.24-3.93 1.03 1.05-3.83-.26-.42a10.5 10.5 0 1 1 9.11 5Zm5.76-7.87c-.32-.16-1.89-.93-2.18-1.03-.3-.11-.51-.16-.73.16-.21.32-.83 1.03-1.02 1.24-.19.21-.38.24-.7.08-.32-.16-1.35-.5-2.57-1.58-.95-.84-1.59-1.88-1.78-2.2-.19-.32-.02-.49.14-.65.14-.14.32-.38.48-.57.16-.19.21-.32.32-.54.1-.21.05-.4-.03-.56-.08-.16-.73-1.76-1-2.41-.26-.63-.53-.54-.73-.55l-.62-.01c-.22 0-.57.08-.86.4-.3.32-1.13 1.1-1.13 2.69 0 1.59 1.16 3.12 1.32 3.34.16.21 2.28 3.48 5.53 4.88.77.33 1.37.21 2.02.13.62-.09 1.89-.77 2.15-1.52.27-.75.27-1.4.19-1.53-.08-.13-.29-.21-.61-.37Z"/></svg>
    </a>
    <div class="sage-chat-widget" id="sage-chat-widget">
        <section class="sage-chat-panel" id="sage-chat-panel" aria-label="AI assistant Sage Nail Atelier" hidden>
            <div class="sage-chat-head"><span class="sage-chat-avatar">✦</span><span><strong>Sage Ritual Assistant</strong><small><i></i> Siap membantu · Demo</small></span><button type="button" id="sage-chat-close" aria-label="Tutup chat">×</button></div>
            <div class="sage-chat-messages" id="sage-chat-messages" aria-live="polite"><div class="sage-chat-message sage-chat-bot">Hi, beauty! ♡ Aku asisten virtual Blush. Mau tanya layanan, harga, atau cara booking?</div></div>
            <div class="sage-chat-quick" id="sage-chat-quick"><button type="button" data-chat-question="price">Info harga</button><button type="button" data-chat-question="service">Pilihan layanan</button><button type="button" data-chat-question="booking">Cara booking</button></div>
            <form class="sage-chat-form" id="sage-chat-form"><input id="sage-chat-input" type="text" placeholder="Tulis pertanyaanmu..." aria-label="Tulis pertanyaan" autocomplete="off"><button type="submit" aria-label="Kirim pesan">➤</button></form>
            <p class="sage-chat-disclaimer">Asisten demo · Untuk konfirmasi langsung, hubungi atelier via WhatsApp.</p>
        </section>
        <button class="sage-ai-fab" id="sage-ai-fab" type="button" aria-expanded="false" aria-controls="sage-chat-panel"><span class="sage-ai-icon">✦</span><span>AI Assistant</span></button>
    </div>
    <div class="sage-template-ribbon">WEBIA TEMPLATE PREVIEW <span>02 · MINIMALIST SAGE GREEN</span></div>
    <script src="{{ asset('js/website-bisnis/templates/beauty/nailart/nailart-professional-minimalist-sagegreen.js') }}" defer></script>
</body>
</html>
