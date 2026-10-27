
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Azure Smile Clinic — premium dental care for a confident, healthy smile.">
    <title>Azure Smile Clinic | The Art of Beautiful Smiles</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/website-bisnis/templates/healthcare/dental/azure-smile-clinic.css') }}">
</head>
<body>
    <!-- TOPBAR -->
    <div class="asc-topbar">
        <span>✦ Premium Dental Care, Thoughtfully Delivered</span>
        <div><span>Mon–Sat</span><span class="asc-topbar-dot">•</span><span>09.00–20.00 WIB</span></div>
    </div>

    <!-- NAVBAR -->
    <header class="asc-navbar">
        <a href="#home" class="asc-brand" aria-label="Azure Smile Clinic home">
            <span class="asc-brand-symbol">A<span>✦</span></span>
            <span class="asc-brand-name">AZURE <small>SMILE CLINIC</small></span>
        </a>

        <button type="button" class="asc-menu-toggle" id="ascMenuToggle"
                aria-label="Buka navigasi" aria-expanded="false">☰</button>

        <nav class="asc-nav" id="ascNav">
            <a href="#about">Our Clinic</a>
            <a href="#treatments">Treatments</a>
            <a href="#dentists">Our Dentists</a>
            <a href="#packages">Packages</a>
            <a href="#gallery">Smile Gallery</a>
            <a href="#contact" class="asc-nav-cta">Book a Visit <span>↗</span></a>
        </nav>
    </header>

    <main>
        <!-- ELEGANT HERO BANNER -->
        <section class="asc-hero" id="home">
            <div class="asc-hero-content">
                <span class="asc-eyebrow"><i></i> EXCEPTIONAL CARE · TIMELESS SMILES</span>
                <h1>The Art of<br>Beautiful <em>Smiles.</em></h1>
                <p>
                    A more thoughtful approach to dental care.
                    Discover personalized treatments in a calm,
                    refined environment designed around you.
                </p>
                <div class="asc-hero-actions">
                    <a href="#booking" class="asc-btn asc-btn-gold">Begin Your Smile Journey <span>↗</span></a>
                    <a href="#treatments" class="asc-link">Explore Treatments <span>→</span></a>
                </div>
                <div class="asc-hero-trust">
                    <span class="asc-trust-icon">✦</span>
                    <span>Personalized care. Considered in every detail.</span>
                </div>
            </div>

            <div class="asc-hero-visual">
                <div class="asc-hero-image">
                    <img src="https://images.unsplash.com/photo-1606811971618-4486d14f3f99?auto=format&fit=crop&w=1100&q=85"
                         alt="Suasana perawatan gigi di klinik">
                </div>
                <div class="asc-hero-stamp">
                    <span>YOUR SMILE</span>
                    <strong>Our Priority</strong>
                    <i>✦</i>
                </div>
                <span class="asc-hero-number">01 — AZURE EXPERIENCE</span>
            </div>
            <span class="asc-hero-watermark">AZURE</span>
        </section>

        <!-- ABOUT CLINIC -->
        <section class="asc-section asc-about" id="about">
            <div class="asc-about-visual">
                <img src="https://images.unsplash.com/photo-1629909613654-28e377c37b09?auto=format&fit=crop&w=1000&q=85"
                     alt="Interior ruang klinik gigi" loading="lazy" decoding="async">
                <div class="asc-about-caption">
                    <span>THE AZURE EXPERIENCE</span>
                    <strong>Care that feels different.</strong>
                </div>
            </div>
            <div class="asc-about-copy">
                <span class="asc-eyebrow">A DIFFERENT KIND OF DENTISTRY</span>
                <h2>Where clinical care meets <em>personal comfort.</em></h2>
                <p>
                    Azure Smile Clinic is designed around one simple belief:
                    exceptional dental care begins with understanding you.
                </p>
                <p>
                    From your first consultation to your ongoing treatment,
                    we aim to make every step clear, considered, and comfortable.
                    Your care plan should reflect your needs, not a one-size-fits-all approach.
                </p>
                <div class="asc-about-points">
                    <div><span>01</span><div><strong>Personalized Approach</strong><p>Care plans shaped around individual needs.</p></div></div>
                    <div><span>02</span><div><strong>Clear Communication</strong><p>Understand your options before treatment.</p></div></div>
                    <div><span>03</span><div><strong>Thoughtful Environment</strong><p>A welcoming space for every visit.</p></div></div>
                </div>
            </div>
        </section>

        <!-- SIGNATURE DENTAL TREATMENTS -->
        <section class="asc-section asc-signature" id="treatments">
            <div class="asc-heading">
                <span class="asc-eyebrow">THE AZURE SIGNATURE</span>
                <h2>Exceptional care,<br><em>beautifully considered.</em></h2>
                <p>Explore selected treatments designed around oral health, comfort, and your individual smile goals.</p>
            </div>

            <div class="asc-signature-grid">
                <article class="asc-signature-card asc-signature-featured">
                    <img src="https://images.unsplash.com/photo-1606811841689-23dfddce3e95?auto=format&fit=crop&w=900&q=85" alt="Ilustrasi konsultasi estetika gigi" loading="lazy" decoding="async">
                    <div class="asc-signature-overlay">
                        <span>01 / AESTHETIC DENTISTRY</span>
                        <h3>Smile Design Consultation</h3>
                        <p>Explore treatment options suited to your smile goals and dental health.</p>
                        <a href="#booking">Discover the treatment ↗</a>
                    </div>
                </article>
                <article class="asc-signature-card">
                    <img src="https://images.unsplash.com/photo-1609840114035-3c981b782dfe?auto=format&fit=crop&w=900&q=85" alt="Perawatan kesehatan gigi" loading="lazy" decoding="async">
                    <div class="asc-signature-overlay">
                        <span>02 / PREVENTIVE CARE</span>
                        <h3>Advanced Dental Care</h3>
                        <p>Preventive and restorative care tailored to your clinical needs.</p>
                        <a href="#services">Discover the treatment ↗</a>
                    </div>
                </article>
            </div>
        </section>

        <!-- DENTAL SERVICES -->
        <section class="asc-section asc-services" id="services">
            <div class="asc-heading">
                <span class="asc-eyebrow">OUR TREATMENT MENU</span>
                <h2>Care for every stage<br>of your <em>smile journey.</em></h2>
                <p>Mulai dari perawatan rutin hingga konsultasi estetika, pilihan tindakan ditentukan berdasarkan pemeriksaan dokter.</p>
            </div>
            <div class="asc-service-grid">
                <article><span class="asc-service-icon">✧</span><small>01 / PREVENTIVE</small><h3>Scaling & Cleaning</h3><p>Pembersihan karang gigi untuk membantu menjaga kesehatan gusi dan gigi.</p><a href="#packages">Explore options ↗</a></article>
                <article><span class="asc-service-icon">◇</span><small>02 / RESTORATIVE</small><h3>Dental Fillings</h3><p>Penanganan gigi berlubang berdasarkan hasil pemeriksaan.</p><a href="#packages">Explore options ↗</a></article>
                <article><span class="asc-service-icon">✦</span><small>03 / AESTHETIC</small><h3>Teeth Whitening</h3><p>Konsultasi pilihan pemutihan gigi yang sesuai dengan kondisi gigi.</p><a href="#packages">Explore options ↗</a></article>
                <article><span class="asc-service-icon">⌁</span><small>04 / ORTHODONTIC</small><h3>Orthodontic Care</h3><p>Konsultasi mengenai susunan gigi dan pilihan perawatan ortodonti.</p><a href="#packages">Explore options ↗</a></article>
                <article><span class="asc-service-icon">♡</span><small>05 / CONSULTATION</small><h3>Dental Check-up</h3><p>Pemeriksaan untuk membantu memahami kebutuhan kesehatan gigi.</p><a href="#booking">Book consultation ↗</a></article>
                <article><span class="asc-service-icon">✳</span><small>06 / PERSONALIZED</small><h3>Personal Care Plan</h3><p>Diskusi rencana perawatan berdasarkan prioritas dan rekomendasi dokter.</p><a href="#booking">Book consultation ↗</a></article>
            </div>
        </section>

        <!-- DENTIST PROFILES & QUALIFICATIONS -->
        <section class="asc-section asc-dentists" id="dentists">
            <div class="asc-heading">
                <span class="asc-eyebrow">MEET YOUR DENTAL TEAM</span>
                <h2>Expertise with a<br><em>personal touch.</em></h2>
                <p>Kenali dokter yang akan mendampingi perawatan Anda. Lengkapi profil ini dengan informasi profesional yang telah diverifikasi.</p>
            </div>
            <div class="asc-doctor-grid">
                <article class="asc-doctor-card">
                    <div class="asc-doctor-image">
                        <img src="https://images.unsplash.com/photo-1559839734-2b71ea197ec2?auto=format&fit=crop&w=750&q=85" alt="Foto profil dokter gigi" loading="lazy" decoding="async">
                        <span>01</span>
                    </div>
                    <div class="asc-doctor-info"><small>GENERAL DENTISTRY</small><h3>Drg. [Nama Dokter]</h3><p>Dokter Gigi Umum</p><div class="asc-qualification">Kualifikasi: [Isi pendidikan dan gelar resmi]</div><a href="#booking">Book a consultation ↗</a></div>
                </article>
                <article class="asc-doctor-card">
                    <div class="asc-doctor-image">
                        <img src="https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?auto=format&fit=crop&w=750&q=85" alt="Foto profil dokter gigi" loading="lazy" decoding="async">
                        <span>02</span>
                    </div>
                    <div class="asc-doctor-info"><small>AESTHETIC DENTISTRY</small><h3>Drg. [Nama Dokter]</h3><p>Dokter Gigi</p><div class="asc-qualification">Kualifikasi: [Isi pendidikan dan gelar resmi]</div><a href="#booking">Book a consultation ↗</a></div>
                </article>
                <article class="asc-doctor-card">
                    <div class="asc-doctor-image">
                        <img src="https://images.unsplash.com/photo-1594824476967-48c8b964273f?auto=format&fit=crop&w=750&q=85" alt="Foto tenaga medis" loading="lazy" decoding="async">
                        <span>03</span>
                    </div>
                    <div class="asc-doctor-info"><small>ORTHODONTIC CARE</small><h3>Drg. [Nama Dokter]</h3><p>[Spesialisasi terverifikasi]</p><div class="asc-qualification">Kualifikasi: [Isi pendidikan dan gelar resmi]</div><a href="#booking">Book a consultation ↗</a></div>
                </article>
            </div>
        </section>

        <!-- TREATMENT PACKAGES -->
        <section class="asc-section asc-packages" id="packages">
            <div class="asc-heading">
                <span class="asc-eyebrow">THOUGHTFULLY CURATED</span>
                <h2>Find your <em>care package.</em></h2>
                <p>Contoh paket untuk kebutuhan desain katalog. Isi treatment dan tarif harus disesuaikan dengan layanan resmi klinik.</p>
            </div>
            <div class="asc-package-grid">
                <article class="asc-package-card">
                    <span class="asc-package-label">01 / ESSENTIAL</span>
                    <h3>Essential Care</h3><p class="asc-package-description">For your everyday oral health.</p>
                    <div class="asc-package-price">Rp350.000<small>/ contoh harga</small></div>
                    <ul><li>Dental consultation</li><li>Oral health assessment</li><li>Personal care recommendations</li></ul>
                    <a href="#booking" class="asc-btn asc-btn-outline">Ask About This Package ↗</a>
                </article>
                <article class="asc-package-card asc-package-featured">
                    <span class="asc-package-badge">FEATURED PACKAGE</span>
                    <span class="asc-package-label">02 / SIGNATURE</span>
                    <h3>Signature Smile</h3><p class="asc-package-description">A more personalized care experience.</p>
                    <div class="asc-package-price">Rp750.000<small>/ contoh harga</small></div>
                    <ul><li>Initial consultation</li><li>Personalized treatment discussion</li><li>Recommended care plan</li></ul>
                    <a href="#booking" class="asc-btn asc-btn-gold">Explore This Package ↗</a>
                </article>
                <article class="asc-package-card">
                    <span class="asc-package-label">03 / PERSONALIZED</span>
                    <h3>Complete Smile Plan</h3><p class="asc-package-description">For a more comprehensive discussion.</p>
                    <div class="asc-package-price">Custom<small> berdasarkan pemeriksaan</small></div>
                    <ul><li>Comprehensive consultation</li><li>Individual treatment planning</li><li>Staged care recommendations</li></ul>
                    <a href="#booking" class="asc-btn asc-btn-outline">Request a Consultation ↗</a>
                </article>
            </div>
            <p class="asc-disclaimer">Paket dan harga di atas adalah konten demo, bukan penawaran klinik terverifikasi. Treatment hanya dilakukan setelah pemeriksaan dan persetujuan pasien.</p>
        </section>

        <!-- SMILE GALLERY: USE CONSENTED PHOTOS ONLY -->
        <section class="asc-section asc-gallery" id="gallery">
            <div class="asc-gallery-heading">
                <div><span class="asc-eyebrow">SMILE STORIES</span><h2>Every smile has<br><em>a story to tell.</em></h2></div>
                <p>Galeri ini disiapkan untuk menampilkan dokumentasi perawatan dengan persetujuan pasien yang sah.</p>
            </div>
            <div class="asc-gallery-grid">
                <figure class="asc-gallery-large">
                    <img src="https://images.unsplash.com/photo-1606811971618-4486d14f3f99?auto=format&fit=crop&w=1000&q=85" alt="Visual ilustratif perawatan gigi, bukan foto hasil pasien" loading="lazy" decoding="async">
                    <figcaption><span>SMILE JOURNEY 01</span><strong>Personalized Dental Care</strong></figcaption>
                </figure>
                <figure>
                    <img src="https://images.unsplash.com/photo-1609840114035-3c981b782dfe?auto=format&fit=crop&w=800&q=85" alt="Visual ilustratif alat dan perawatan dental" loading="lazy" decoding="async">
                    <figcaption><span>SMILE JOURNEY 02</span><strong>Thoughtful Treatment</strong></figcaption>
                </figure>
                <figure>
                    <img src="https://images.unsplash.com/photo-1606811841689-23dfddce3e95?auto=format&fit=crop&w=800&q=85" alt="Visual ilustratif konsultasi dental" loading="lazy" decoding="async">
                    <figcaption><span>SMILE JOURNEY 03</span><strong>Care with Confidence</strong></figcaption>
                </figure>
            </div>
            <p class="asc-disclaimer">Gambar di atas hanya visual demo, bukan dokumentasi hasil perawatan pasien. Ganti dengan foto asli yang telah mendapat persetujuan pasien sebelum dipublikasikan.</p>
        </section>

        <!-- CLINIC FACILITIES -->
        <section class="asc-section asc-facilities" id="facilities">
            <div class="asc-heading">
                <span class="asc-eyebrow">THE SPACE WE CREATED FOR YOU</span>
                <h2>Comfort in every <em>detail.</em></h2>
            </div>
            <div class="asc-facility-grid">
                <article><span>01</span><div><i>⌂</i><h3>Welcoming Reception</h3><p>Area penerimaan yang tertata dan nyaman.</p></div></article>
                <article><span>02</span><div><i>✧</i><h3>Private Consultation</h3><p>Ruang untuk membahas kebutuhan perawatan.</p></div></article>
                <article><span>03</span><div><i>◇</i><h3>Modern Treatment Room</h3><p>Ruang tindakan dengan peralatan sesuai layanan klinik.</p></div></article>
                <article><span>04</span><div><i>✦</i><h3>Patient Comfort</h3><p>Pengalaman kunjungan yang mengutamakan kenyamanan.</p></div></article>
            </div>
        </section>

        <!-- PATIENT TESTIMONIALS -->
        <section class="asc-section asc-testimonials" id="testimonials">
            <div class="asc-heading">
                <span class="asc-eyebrow">KIND WORDS</span>
                <h2>Trust built through <em>care.</em></h2>
            </div>
            <div class="asc-testimonial-grid">
                <article><span class="asc-quote-mark">“</span><p>Penjelasan mengenai pilihan perawatan terasa jelas dan membantu saya memahami langkah berikutnya.</p><div class="asc-testimonial-author"><span>AS</span><div><strong>Contoh Pasien</strong><small>Sample testimonial</small></div></div></article>
                <article><span class="asc-quote-mark">“</span><p>Suasana klinik terasa nyaman dan saya punya kesempatan untuk mendiskusikan kebutuhan saya.</p><div class="asc-testimonial-author"><span>MR</span><div><strong>Contoh Pasien</strong><small>Sample testimonial</small></div></div></article>
                <article><span class="asc-quote-mark">“</span><p>Informasi mengenai perawatan disampaikan dengan cara yang mudah dipahami.</p><div class="asc-testimonial-author"><span>DN</span><div><strong>Contoh Pasien</strong><small>Sample testimonial</small></div></div></article>
            </div>
            <p class="asc-disclaimer">Testimoni di atas adalah contoh konten desain, bukan ulasan pasien nyata.</p>
        </section>

        <!-- ONLINE APPOINTMENT BOOKING -->
        <section class="asc-section asc-booking" id="booking">
            <div class="asc-booking-copy">
                <span class="asc-eyebrow">YOUR NEXT CHAPTER STARTS HERE</span>
                <h2>Let's make room for <em>your smile.</em></h2>
                <p>Isi permintaan janji temu. Tim klinik akan membantu mengonfirmasi jadwal dan informasi yang dibutuhkan.</p>
                <div class="asc-booking-promise"><span>✦</span><div><strong>Personal attention</strong><small>Permintaan Anda disampaikan ke tim klinik.</small></div></div>
                <div class="asc-booking-promise"><span>◇</span><div><strong>Clear next steps</strong><small>Jadwal menunggu konfirmasi dari klinik.</small></div></div>
            </div>

            <form class="asc-booking-form" id="ascBookingForm">
                <div class="asc-form-heading"><span>APPOINTMENT REQUEST</span><h3>Plan your visit.</h3></div>
                <label>Full Name<input type="text" name="name" placeholder="Nama lengkap" required autocomplete="name"></label>
                <label>WhatsApp Number<input type="tel" name="phone" placeholder="08xxxxxxxxxx" required autocomplete="tel"></label>
                <label>Treatment Interest
                    <select name="treatment" required>
                        <option value="">Pilih layanan</option>
                        <option>Dental Check-up</option><option>Scaling & Cleaning</option>
                        <option>Dental Fillings</option><option>Teeth Whitening</option>
                        <option>Orthodontic Care</option><option>Smile Design Consultation</option>
                        <option>Essential Care Package</option><option>Signature Smile Package</option>
                        <option>Complete Smile Plan</option>
                    </select>
                </label>
                <div class="asc-form-row">
                    <label>Preferred Date<input type="date" name="date" required></label>
                    <label>Preferred Time<select name="time" required><option value="">Pilih waktu</option><option>09.00–12.00</option><option>13.00–16.00</option><option>17.00–20.00</option></select></label>
                </div>
                <label>Additional Notes <span class="asc-optional">(Optional)</span><textarea name="notes" rows="3" placeholder="Ceritakan kebutuhan atau pertanyaan Anda"></textarea></label>
                <button type="submit" class="asc-btn asc-btn-navy asc-btn-full">Request an Appointment <span>↗</span></button>
                <small class="asc-form-note">Form ini membuka WhatsApp untuk konfirmasi. Jadwal belum terkonfirmasi sampai dibalas tim klinik.</small>
            </form>
        </section>

        <!-- CONTACT & LOCATION -->
        <section class="asc-section asc-contact" id="contact">
            <div class="asc-contact-copy">
                <span class="asc-eyebrow">WE WOULD LOVE TO WELCOME YOU</span>
                <h2>Let's begin with <em>a conversation.</em></h2>
                <p>Hubungi tim kami untuk menanyakan layanan, paket, dan ketersediaan jadwal.</p>
                <div class="asc-contact-detail"><span>⌖</span><div><strong>Visit Our Clinic</strong><p>[Alamat lengkap klinik]</p></div></div>
                <div class="asc-contact-detail"><span>◷</span><div><strong>Opening Hours</strong><p>Senin–Sabtu: 09.00–20.00 WIB<br>Minggu: sesuai jadwal resmi klinik</p></div></div>
                <div class="asc-contact-detail"><span>☎</span><div><strong>Get in Touch</strong><p>[Nomor telepon resmi klinik]</p></div></div>
                <a href="https://maps.google.com/" target="_blank" rel="noopener noreferrer" class="asc-link">Find Us on Google Maps ↗</a>
            </div>
            <div class="asc-map-placeholder">
                <span class="asc-map-symbol">⌖</span><span class="asc-eyebrow">FIND YOUR WAY TO AZURE</span>
                <h3>We look forward<br>to welcoming you.</h3>
                <p>Sematkan peta Google Maps dari lokasi resmi klinik di sini.</p>
                <a href="https://maps.google.com/" target="_blank" rel="noopener noreferrer">Open Maps ↗</a>
            </div>
        </section>
    </main>

    <!-- FOOTER -->
    <footer class="asc-footer">
        <div class="asc-footer-main">
            <div class="asc-footer-brand">
                <a href="#home" class="asc-brand">
                    <span class="asc-brand-symbol">A<span>✦</span></span>
                    <span class="asc-brand-name">AZURE <small>SMILE CLINIC</small></span>
                </a>
                <p>Thoughtful dentistry.<br>Timeless smiles.</p>
            </div>
            <div><strong>Explore</strong><a href="#about">Our Clinic</a><a href="#treatments">Treatments</a><a href="#dentists">Our Dentists</a></div>
            <div><strong>Discover</strong><a href="#packages">Treatment Packages</a><a href="#gallery">Smile Gallery</a><a href="#facilities">Facilities</a></div>
            <div><strong>Connect</strong><a href="#booking">Book an Appointment</a><a href="#contact">Contact & Location</a><a href="#" id="ascFooterWhatsApp">WhatsApp Us ↗</a></div>
        </div>
        <div class="asc-footer-bottom"><span>© <span id="ascYear"></span> Azure Smile Clinic. All rights reserved.</span><span>Made with care ♡ · Website template by WEBIA</span></div>
    </footer>

    <!-- WHATSAPP BUTTON -->
    <a href="#" class="asc-whatsapp" id="ascWhatsApp" aria-label="Hubungi klinik melalui WhatsApp" title="WhatsApp">◉</a>

    <!-- FAQ CHATBOT -->
    <button type="button" class="asc-chat-toggle" id="ascChatToggle" aria-expanded="false" aria-controls="ascChatPanel"><span>✦</span> Azure Assistant</button>
    <section class="asc-chat-panel" id="ascChatPanel" hidden aria-label="Azure Assistant">
        <div class="asc-chat-header">
            <span class="asc-chat-logo">A✦</span>
            <div><strong>Azure Assistant</strong><small>Dental information assistant</small></div>
            <button type="button" id="ascChatClose" aria-label="Tutup chatbot">×</button>
        </div>
        <div class="asc-chat-messages" id="ascChatMessages" aria-live="polite">
            <p class="asc-chat-bubble">Welcome to Azure Smile Clinic ✦ Aku bisa membantu menjelaskan treatment, paket demo, dan cara meminta appointment. Apa yang ingin kamu ketahui?</p>
        </div>
        <div class="asc-chat-quick">
            <button type="button" data-topic="treatment">Treatment</button>
            <button type="button" data-topic="packages">Packages</button>
            <button type="button" data-topic="booking">Booking FAQ</button>
            <button type="button" data-topic="hours">Opening Hours</button>
        </div>
        <form id="ascChatForm" class="asc-chat-input">
            <input id="ascChatInput" type="text" placeholder="Ask us a question..." aria-label="Tulis pertanyaan" required>
            <button type="submit" aria-label="Kirim pertanyaan">↗</button>
        </form>
        <small class="asc-chat-disclaimer">FAQ demo, bukan diagnosis medis atau konfirmasi booking.</small>
    </section>

    <script src="{{ asset('js/website-bisnis/templates/healthcare/dental/azure-smile-clinic.js') }}" defer></script>
</body>
</html>
