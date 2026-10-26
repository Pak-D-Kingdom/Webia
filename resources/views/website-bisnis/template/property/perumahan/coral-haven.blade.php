<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#ff766b">
    <meta name="description" content="Temukan hunian nyaman dan modern di Coral Haven.">

    <title>Coral Haven — Temukan Rumah Impianmu</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/website-bisnis/template/property/perumahan/coral-haven.css') }}">
</head>

<body>

    {{-- ANNOUNCEMENT --}}
    <div class="announcement">
        <span class="announcement-dot"></span>
        <span>Promo spesial bulan ini — wujudkan rumah pertamamu bersama Coral Haven</span>
        <a href="#promo">Lihat promo ↗</a>
    </div>

    {{-- HEADER --}}
    <header class="site-header" id="top">

        <a class="brand" href="#top">
            <span class="brand-mark">
                <i></i><i></i><i></i>
            </span>

            <span class="brand-copy">
                <strong>coral<span>haven</span></strong>
                <small>LIVE IN YOUR OWN STORY</small>
            </span>
        </a>

        <button
            class="menu-toggle"
            aria-label="Buka navigasi"
            aria-expanded="false"
            type="button"
        >
            <span></span>
            <span></span>
        </button>

        <nav class="main-nav">
            <a href="#tentang">Tentang</a>
            <a href="#tipe">Tipe Rumah</a>
            <a href="#fasilitas">Fasilitas</a>
            <a href="#lokasi">Lokasi</a>
            <a class="nav-cta" href="#kontak">
                Jadwalkan Kunjungan ↗
            </a>
        </nav>

    </header>

    <main>

        {{-- HERO: GAMBAR KIRI, TEKS KANAN --}}
        <section class="hero">

            <div class="hero-glow glow-one"></div>
            <div class="hero-glow glow-two"></div>

            {{-- GAMBAR UTAMA --}}
            <div class="hero-visual reveal">

                <div class="hero-image-wrap">

                    <img
                        src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=1400&q=88"
                        alt="Rumah modern dengan taman"
                    >

                    <div class="image-shade"></div>

                    <div class="image-label">
                        <span class="label-icon">⌂</span>

                        <div>
                            <small>YOUR NEXT CHAPTER</small>
                            <strong>Dimulai dari sini.</strong>
                        </div>
                    </div>

                    <div class="floating-card">
                        <span class="floating-icon">✦</span>

                        <div>
                            <strong>Desain modern</strong>
                            <small>Nyaman, fungsional, timeless</small>
                        </div>
                    </div>

                </div>

                <div class="hero-pagination">
                    <span class="active"></span>
                    <span></span>
                    <span></span>
                    <small>01 / 03</small>
                </div>

            </div>

            {{-- TEKS HERO --}}
            <div class="hero-content reveal">

                <div class="eyebrow">
                    <span class="eyebrow-line"></span>
                    A NEW WAY TO FEEL AT HOME
                </div>

                <h1>
                    Rumah yang terasa<br>
                    seperti <em>pulang.</em>
                </h1>

                <p>
                    Temukan ruang untuk tumbuh, berbagi cerita, dan menikmati
                    hidup dengan lebih tenang. Selamat datang di hunian yang
                    dirancang untuk masa depanmu.
                </p>

                <div class="hero-actions">

                    <a class="button button-dark" href="#tipe">
                        Temukan Rumahmu <span>↗</span>
                    </a>

                    <a class="text-link" href="#tentang">
                        <span class="play-icon">▶</span>
                        Jelajahi Coral Haven
                    </a>

                </div>

                <div class="hero-trust">

                    <div class="avatar-stack">
                        <span>R</span>
                        <span>A</span>
                        <span>D</span>
                        <span>+</span>
                    </div>

                    <div>
                        <strong>Tempat untuk cerita baru</strong>
                        <small>Hunian nyaman untuk setiap fase kehidupan</small>
                    </div>

                </div>

            </div>

            <div class="hero-bottom-note">
                <span>01</span> HUNIAN DENGAN HATI
            </div>

        </section>

        {{-- STATISTIK --}}
        <section class="stats-strip">

            <div>
                <strong data-count="3">0</strong>
                <span>Pilihan tipe hunian</span>
            </div>

            <div>
                <strong data-count="24">0</strong>
                <span>Jam rasa aman</span>
            </div>

            <div>
                <strong data-count="100">0</strong>
                <span>Ruang untuk berkembang</span>
            </div>

            <div class="stats-note">
                Bukan sekadar alamat.<br>
                <em>Ini tempatmu bertumbuh.</em>
            </div>

        </section>

        {{-- TENTANG --}}
        <section class="section about-section" id="tentang">

            <div class="section-heading reveal">

                <span class="eyebrow">
                    <span class="eyebrow-line"></span>
                    THE CORAL HAVEN DIFFERENCE
                </span>

                <h2>
                    Lebih dari sebuah rumah.<br>
                    <em>Tempat hidup berkembang.</em>
                </h2>

            </div>

            <div class="about-grid">

                <div class="about-photo reveal">

                    <img
                        src="https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?auto=format&fit=crop&w=1100&q=85"
                        alt="Interior ruang keluarga"
                    >

                    <span class="photo-caption">
                        Ruang yang mengerti caramu hidup.
                    </span>

                </div>

                <div class="about-copy reveal">

                    <span class="big-number">01</span>

                    <h3>
                        Dirancang untuk<br>
                        hari ini dan nanti.
                    </h3>

                    <p>
                        Setiap sudut Coral Haven dirancang untuk memadukan
                        estetika, fungsi, dan kenyamanan. Dari pagi yang tenang
                        hingga momen hangat bersama keluarga, semuanya punya tempat.
                    </p>

                    <div class="feature-list">

                        <div>
                            <span class="feature-icon">⌂</span>

                            <div>
                                <strong>Desain thoughtful</strong>
                                <small>Tata ruang efisien dan cahaya alami.</small>
                            </div>
                        </div>

                        <div>
                            <span class="feature-icon">♡</span>

                            <div>
                                <strong>Lingkungan hangat</strong>
                                <small>Ruang bersama untuk membangun koneksi.</small>
                            </div>
                        </div>

                        <div>
                            <span class="feature-icon">✧</span>

                            <div>
                                <strong>Nilai jangka panjang</strong>
                                <small>Hunian yang siap mengikuti langkahmu.</small>
                            </div>
                        </div>

                    </div>

                    <a class="text-link coral-link" href="#fasilitas">
                        Kenali keunggulan kami ↗
                    </a>

                </div>

            </div>

        </section>

        {{-- TIPE RUMAH --}}
        <section class="section homes-section" id="tipe">

            <div class="section-heading centered reveal">

                <span class="eyebrow">
                    <span class="eyebrow-line"></span>
                    FIND YOUR SPACE
                </span>

                <h2>
                    Temukan yang paling<br>
                    <em>pas untukmu.</em>
                </h2>

                <p>
                    Setiap kebutuhan punya rumahnya sendiri. Mulai dari ruang
                    pertama hingga tempat tumbuh bersama keluarga.
                </p>

            </div>

            <div class="home-filters reveal">
                <button class="filter-btn active" data-filter="all" type="button">
                    Semua tipe
                </button>

                <button class="filter-btn" data-filter="starter" type="button">
                    Rumah pertama
                </button>

                <button class="filter-btn" data-filter="family" type="button">
                    Keluarga
                </button>

                <button class="filter-btn" data-filter="flexible" type="button">
                    Ruang fleksibel
                </button>
            </div>

            <div class="home-grid">

                {{-- TIPE HAVEN --}}
                <article class="home-card reveal" data-category="starter">

                    <div class="home-image">

                        <img
                            src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=900&q=85"
                            alt="Rumah tipe Haven"
                        >

                        <span class="home-badge">STARTER HOME</span>

                        <button
                            class="heart-btn"
                            aria-label="Simpan tipe Haven"
                            aria-pressed="false"
                            type="button"
                        >
                            ♡
                        </button>

                    </div>

                    <div class="home-info">

                        <div class="home-title">

                            <div>
                                <small>TIPE 36</small>
                                <h3>Haven</h3>
                            </div>

                            <div class="price">
                                Mulai dari
                                <strong>Rp 4xx jt</strong>
                            </div>

                        </div>

                        <div class="home-specs">
                            <span>▦ 36 m² bangunan</span>
                            <span>⌂ 60 m² tanah</span>
                            <span>▤ 2 KT</span>
                            <span>♧ 1 KM</span>
                        </div>

                        <p>Awal yang nyaman untuk cerita barumu.</p>

                        <button
                            class="card-link interest-btn"
                            data-house="Haven"
                            type="button"
                        >
                            Tanya tipe ini <span>↗</span>
                        </button>

                    </div>

                </article>

                {{-- TIPE COVE --}}
                <article class="home-card reveal" data-category="family">

                    <div class="home-image">

                        <img
                            src="https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?auto=format&fit=crop&w=900&q=85"
                            alt="Rumah tipe Cove"
                        >

                        <span class="home-badge badge-coral">MOST LOVED</span>

                        <button
                            class="heart-btn"
                            aria-label="Simpan tipe Cove"
                            aria-pressed="false"
                            type="button"
                        >
                            ♡
                        </button>

                    </div>

                    <div class="home-info">

                        <div class="home-title">

                            <div>
                                <small>TIPE 45</small>
                                <h3>Cove</h3>
                            </div>

                            <div class="price">
                                Mulai dari
                                <strong>Rp 5xx jt</strong>
                            </div>

                        </div>

                        <div class="home-specs">
                            <span>▦ 45 m² bangunan</span>
                            <span>⌂ 72 m² tanah</span>
                            <span>▤ 2 KT</span>
                            <span>♧ 2 KM</span>
                        </div>

                        <p>Lebih banyak ruang untuk kebersamaan.</p>

                        <button
                            class="card-link interest-btn"
                            data-house="Cove"
                            type="button"
                        >
                            Tanya tipe ini <span>↗</span>
                        </button>

                    </div>

                </article>

                {{-- TIPE SOL --}}
                <article class="home-card reveal" data-category="flexible">

                    <div class="home-image">

                        <img
                            src="https://images.unsplash.com/photo-1600566753086-00f18fb6b3ea?auto=format&fit=crop&w=900&q=85"
                            alt="Rumah tipe Sol"
                        >

                        <span class="home-badge">FLEXIBLE LIVING</span>

                        <button
                            class="heart-btn"
                            aria-label="Simpan tipe Sol"
                            aria-pressed="false"
                            type="button"
                        >
                            ♡
                        </button>

                    </div>

                    <div class="home-info">

                        <div class="home-title">

                            <div>
                                <small>TIPE 60</small>
                                <h3>Sol</h3>
                            </div>

                            <div class="price">
                                Mulai dari
                                <strong>Rp 7xx jt</strong>
                            </div>

                        </div>

                        <div class="home-specs">
                            <span>▦ 60 m² bangunan</span>
                            <span>⌂ 90 m² tanah</span>
                            <span>▤ 3 KT</span>
                            <span>♧ 2 KM</span>
                        </div>

                        <p>Ruang ekstra untuk rencana yang lebih besar.</p>

                        <button
                            class="card-link interest-btn"
                            data-house="Sol"
                            type="button"
                        >
                            Tanya tipe ini <span>↗</span>
                        </button>

                    </div>

                </article>

            </div>

            <p class="disclaimer">
                *Harga dan spesifikasi merupakan ilustrasi. Ganti dengan data resmi proyek.
            </p>

        </section>

        {{-- FASILITAS --}}
        <section class="amenities-section" id="fasilitas">

            <div class="amenities-inner">

                <div class="section-heading reveal">

                    <span class="eyebrow light">
                        <span class="eyebrow-line"></span>
                        LITTLE THINGS, BIG FEELINGS
                    </span>

                    <h2>
                        Nyaman di dalam.<br>
                        <em>Tenang di luar.</em>
                    </h2>

                    <p>
                        Fasilitas untuk membuat hari-harimu terasa lebih mudah,
                        lebih dekat, dan lebih menyenangkan.
                    </p>

                    <a href="#kontak" class="button button-light">
                        Jelajahi kawasan ↗
                    </a>

                </div>

                <div class="amenity-grid">

                    <div class="amenity-item reveal">
                        <span>♧</span>
                        <strong>Green pocket park</strong>
                        <small>Ruang hijau untuk rehat sejenak.</small>
                    </div>

                    <div class="amenity-item reveal">
                        <span>⌁</span>
                        <strong>One-gate system</strong>
                        <small>Akses kawasan yang lebih terkontrol.</small>
                    </div>

                    <div class="amenity-item reveal">
                        <span>☼</span>
                        <strong>Natural lighting</strong>
                        <small>Rumah terang dengan sirkulasi baik.</small>
                    </div>

                    <div class="amenity-item reveal">
                        <span>♡</span>
                        <strong>Family-friendly</strong>
                        <small>Lingkungan untuk tumbuh bersama.</small>
                    </div>

                </div>

            </div>

            <div class="amenities-orb"></div>

        </section>

        {{-- LOKASI --}}
        <section class="section location-section" id="lokasi">

            <div class="location-copy reveal">

                <span class="eyebrow">
                    <span class="eyebrow-line"></span>
                    CLOSE TO WHAT MATTERS
                </span>

                <h2>
                    Lebih dekat dengan<br>
                    <em>hal-hal penting.</em>
                </h2>

                <p>
                    Lokasi yang strategis membuat rutinitas terasa lebih ringan.
                    Perjalanan kerja, sekolah, belanja, dan waktu bersama keluarga
                    jadi lebih mudah direncanakan.
                </p>

                <div class="location-points">

                    <div>
                        <span>01</span>
                        <div>
                            <strong>Akses transportasi</strong>
                            <small>Hubungkan perjalanan harianmu.</small>
                        </div>
                    </div>

                    <div>
                        <span>02</span>
                        <div>
                            <strong>Area pendidikan</strong>
                            <small>Lebih dekat ke tempat belajar.</small>
                        </div>
                    </div>

                    <div>
                        <span>03</span>
                        <div>
                            <strong>Pusat kebutuhan</strong>
                            <small>Belanja dan layanan harian di sekitar.</small>
                        </div>
                    </div>

                </div>

                <p class="location-note">
                    Tambahkan alamat dan estimasi jarak yang telah diverifikasi.
                </p>

            </div>

            <div class="map-card reveal">

                <div class="map-art">

                    <div class="map-road road-a"></div>
                    <div class="map-road road-b"></div>
                    <div class="map-road road-c"></div>

                    <div class="map-block block-a"></div>
                    <div class="map-block block-b"></div>
                    <div class="map-block block-c"></div>
                    <div class="map-block block-d"></div>

                    <div class="map-pin">
                        <span>⌂</span>
                    </div>

                    <div class="map-label">
                        CORAL HAVEN
                        <small>YOUR NEW ADDRESS</small>
                    </div>

                </div>

                <div class="map-footer">

                    <span class="map-footer-icon">⌖</span>

                    <div>
                        <strong>Coral Haven Residence</strong>
                        <small>Alamat proyek akan ditampilkan di sini</small>
                    </div>

                    <a href="#kontak" aria-label="Tanya lokasi">↗</a>

                </div>

            </div>

        </section>

        {{-- PROMO --}}
        <section class="promo-section" id="promo">

            <div class="promo-shape shape-a"></div>
            <div class="promo-shape shape-b"></div>

            <div class="promo-content reveal">

                <span class="eyebrow light">
                    <span class="eyebrow-line"></span>
                    YOUR DREAM, YOUR TIMING
                </span>

                <h2>
                    Bab baru dalam hidupmu<br>
                    bisa dimulai <em>hari ini.</em>
                </h2>

                <p>
                    Tanyakan promo, ketersediaan unit, dan pilihan pembayaran
                    yang sesuai dengan rencanamu.
                </p>

                <a class="button button-dark" href="#kontak">
                    Konsultasi Gratis <span>↗</span>
                </a>

            </div>

            <div class="promo-stamp">
                MAKE<br>
                ROOM FOR<br>
                <em>HAPPINESS</em> ✳
            </div>

        </section>

        {{-- FORM MINAT --}}
        <section class="section contact-section" id="kontak">

            <div class="contact-intro reveal">

                <span class="eyebrow">
                    <span class="eyebrow-line"></span>
                    LET'S TALK ABOUT HOME
                </span>

                <h2>
                    Rumah impianmu<br>
                    mulai dari <em>satu obrolan.</em>
                </h2>

                <p>
                    Ceritakan kebutuhanmu. Tim kami akan membantu menemukan
                    tipe rumah dan langkah berikutnya.
                </p>

                <div class="contact-note">
                    <span>✦</span>
                    Tanpa tekanan. Mulai dari konsultasi santai.
                </div>

            </div>

            <form class="interest-form reveal" id="interestForm">

                <h3>Yuk, kenalan dulu.</h3>

                <p>
                    Isi data singkat berikut untuk mendapat informasi lebih lanjut.
                </p>

                <label for="name">Nama lengkap</label>
                <input
                    id="name"
                    name="name"
                    type="text"
                    placeholder="Nama kamu"
                    required
                >

                <label for="phone">Nomor WhatsApp</label>
                <input
                    id="phone"
                    name="phone"
                    type="tel"
                    placeholder="08xxxxxxxxxx"
                    required
                >

                <label for="houseType">Tipe rumah yang diminati</label>

                <select id="houseType" name="houseType">
                    <option value="">Belum yakin, bantu saya memilih</option>
                    <option>Haven — Tipe 36</option>
                    <option>Cove — Tipe 45</option>
                    <option>Sol — Tipe 60</option>
                </select>

                <label for="budget">Rencana anggaran</label>

                <select id="budget" name="budget">
                    <option value="">Pilih kisaran anggaran</option>
                    <option>Di bawah Rp 500 juta</option>
                    <option>Rp 500–700 juta</option>
                    <option>Di atas Rp 700 juta</option>
                    <option>Ingin konsultasi dulu</option>
                </select>

                <button class="button button-dark form-submit" type="submit">
                    Kirim via WhatsApp <span>↗</span>
                </button>

                <small class="form-privacy">
                    Data digunakan untuk menindaklanjuti permintaan informasi kamu.
                </small>

            </form>

        </section>

    </main>

    {{-- FOOTER --}}
    <footer class="site-footer">

        <a class="brand footer-brand" href="#top">

            <span class="brand-mark">
                <i></i><i></i><i></i>
            </span>

            <span class="brand-copy">
                <strong>coral<span>haven</span></strong>
                <small>LIVE IN YOUR OWN STORY</small>
            </span>

        </a>

        <p>
            Tempat untuk tumbuh, ruang untuk menjadi diri sendiri.
        </p>

        {{-- SOCIAL MEDIA --}}
        <div class="footer-social">

            <span>Ikuti Coral Haven</span>

            <div class="social-links">

                <a
                    href="https://instagram.com/USERNAME_INSTAGRAM"
                    target="_blank"
                    rel="noopener noreferrer"
                    aria-label="Instagram Coral Haven"
                    title="Instagram"
                >
                    IG
                </a>

                <a
                    href="https://facebook.com/USERNAME_FACEBOOK"
                    target="_blank"
                    rel="noopener noreferrer"
                    aria-label="Facebook Coral Haven"
                    title="Facebook"
                >
                    FB
                </a>

                <a
                    href="https://tiktok.com/@USERNAME_TIKTOK"
                    target="_blank"
                    rel="noopener noreferrer"
                    aria-label="TikTok Coral Haven"
                    title="TikTok"
                >
                    TT
                </a>

            </div>

        </div>

        <div class="footer-bottom">

            <span>
                © <span id="year"></span> Coral Haven Residence
            </span>

            <a href="#top">Kembali ke atas ↑</a>

            <span>Made for better living.</span>

        </div>

    </footer>

    {{-- TOMBOL WHATSAPP MELAYANG --}}
    <a
        class="whatsapp-float"
        href="https://wa.me/6281234567890?text=Halo%20Coral%20Haven,%20saya%20ingin%20bertanya%20tentang%20unit%20rumah."
        target="_blank"
        rel="noopener noreferrer"
        aria-label="Hubungi Coral Haven melalui WhatsApp"
    >

        <span class="whatsapp-icon" aria-hidden="true">✆</span>

        <span class="whatsapp-text">
            Tanya via WhatsApp
        </span>

    </a>

    {{-- AI CHATBOT --}}
    <button
        class="chat-launcher"
        id="chatLauncher"
        aria-label="Buka AI Property Assistant"
        type="button"
    >
        <span class="chat-launcher-icon">✦</span>
        <span class="chat-launcher-text">Tanya AI</span>
        <span class="chat-notification"></span>
    </button>

    <aside
        class="chat-panel"
        id="chatPanel"
        aria-label="AI Property Assistant"
        aria-hidden="true"
    >

        <div class="chat-header">

            <div class="bot-avatar">✦</div>

            <div>
                <strong>Coral AI Assistant</strong>
                <small>
                    <span class="online-dot"></span>
                    Siap membantu memilih rumah
                </small>
            </div>

            <button id="chatClose" aria-label="Tutup chatbot" type="button">
                ×
            </button>

        </div>

        <div class="chat-messages" id="chatMessages">

            <div class="chat-date">PROPERTY CONCIERGE</div>

            <div class="message bot-message">
                Hai! 👋 Aku Coral AI, asisten properti kamu.
                Aku bisa bantu memilih tipe rumah berdasarkan kebutuhan,
                anggaran, dan rencana keluargamu. Mau mulai dari mana?
            </div>

            <div class="quick-prompts">

                <button type="button" data-prompt="Bantu saya memilih tipe rumah">
                    🏡 Pilih tipe rumah
                </button>

                <button type="button" data-prompt="Jelaskan pilihan anggaran">
                    💰 Sesuaikan anggaran
                </button>

                <button type="button" data-prompt="Apa saja fasilitasnya?">
                    ✨ Tanya fasilitas
                </button>

                <button type="button" data-prompt="Saya ingin jadwalkan kunjungan">
                    📅 Jadwalkan kunjungan
                </button>

            </div>

        </div>

        <form class="chat-input-row" id="chatForm">

            <input
                id="chatInput"
                type="text"
                placeholder="Tulis pertanyaanmu..."
                autocomplete="off"
                aria-label="Pesan untuk AI"
            >

            <button type="submit" aria-label="Kirim pesan">
                ↑
            </button>

        </form>

        <div class="chat-disclaimer">
            AI demo • Untuk harga dan ketersediaan terbaru, hubungi tim kami.
        </div>

    </aside>

    {{-- NOTIFIKASI --}}
    <div
        class="toast"
        id="toast"
        role="status"
        aria-live="polite"
    ></div>

    {{-- JAVASCRIPT --}}
    <script src="{{ asset('js/website-bisnis/template/property/perumahan/coral-haven.js') }}" defer></script>

</body>
</html>
