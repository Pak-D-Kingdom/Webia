
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Mint Dental House — klinik gigi keluarga dengan pelayanan nyaman, profesional, dan penuh perhatian.">
    <title>Mint Dental House | Your Smile, Our Care</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/website-bisnis/templates/healthcare/dental/mint-dental-house.css') }}">
</head>
<body>
    <!-- TOPBAR -->
    <div class="mdh-topbar">
        <span>🌿 Gentle care for every smile</span>
        <span>Senin–Sabtu · 09.00–20.00 WIB</span>
    </div>

    <!-- NAVBAR -->
    <header class="mdh-navbar">
        <a class="mdh-brand" href="#home">
            <span class="mdh-brand-icon">✳</span>
            <span>mint<span class="mdh-brand-light"> dental</span><small>HOUSE OF HEALTHY SMILES</small></span>
        </a>

        <button class="mdh-menu-toggle" id="mdhMenuToggle"
                aria-label="Buka menu" aria-expanded="false">☰</button>

        <nav class="mdh-nav" id="mdhNav">
            <a href="#about">Tentang Kami</a>
            <a href="#services">Layanan</a>
            <a href="#dentists">Dokter</a>
            <a href="#pricing">Harga</a>
            <a href="#location">Lokasi</a>
            <a class="mdh-nav-cta" href="#appointment">Buat Janji ↗</a>
        </nav>
    </header>

    <main>
        <!-- HERO BANNER -->
        <section class="mdh-hero" id="home">
            <div class="mdh-hero-copy">
                <span class="mdh-eyebrow">A LITTLE CARE, A BIGGER SMILE</span>
                <h1>Your Smile,<br>Our <em>Gentle Care.</em></h1>
                <p>
                    Perawatan gigi yang nyaman, penuh perhatian, dan dirancang
                    untuk membuat setiap kunjungan terasa lebih menyenangkan.
                </p>
                <div class="mdh-hero-actions">
                    <a class="mdh-btn mdh-btn-primary" href="#appointment">Jadwalkan Kunjungan ↗</a>
                    <a class="mdh-text-link" href="#services">Jelajahi Layanan →</a>
                </div>
                <div class="mdh-hero-note">
                    <span class="mdh-avatar-stack">✦ ♡ ✿</span>
                    <span>Care that makes you smile.</span>
                </div>
            </div>
            <div class="mdh-hero-art">
                <div class="mdh-image-frame">
                    <img src="https://images.unsplash.com/photo-1606811971618-4486d14f3f99?auto=format&fit=crop&w=1000&q=85"
                         alt="Ilustrasi suasana perawatan di klinik gigi">
                </div>
                <div class="mdh-float-card">
                    <span>✳</span>
                    <div><strong>Gentle & Caring</strong><small>Comfort comes first</small></div>
                </div>
                <span class="mdh-deco mdh-deco-one">✳</span>
                <span class="mdh-deco mdh-deco-two">✿</span>
            </div>
        </section>

        <!-- ABOUT CLINIC -->
        <section class="mdh-section mdh-about" id="about">
            <div class="mdh-about-visual">
                <img src="https://images.unsplash.com/photo-1629909613654-28e377c37b09?auto=format&fit=crop&w=900&q=85"
                     alt="Ruang konsultasi klinik gigi">
                <div class="mdh-image-caption">A calmer kind of dental care.</div>
            </div>
            <div class="mdh-about-copy">
                <span class="mdh-eyebrow">GET TO KNOW US</span>
                <h2>We believe every smile deserves <em>gentle care.</em></h2>
                <p>
                    Mint Dental House hadir untuk membantu Anda menjaga kesehatan
                    gigi dengan pelayanan yang ramah, lingkungan yang nyaman,
                    dan penjelasan perawatan yang mudah dipahami.
                </p>
                <p>
                    Kami percaya bahwa kunjungan ke dokter gigi seharusnya menjadi
                    pengalaman yang lebih tenang, bukan sesuatu yang perlu ditakuti.
                </p>
                <div class="mdh-values">
                    <div><span>✳</span><strong>Patient First</strong><small>Kenyamanan pasien diutamakan.</small></div>
                    <div><span>♡</span><strong>Gentle Approach</strong><small>Perawatan dengan penuh perhatian.</small></div>
                </div>
            </div>
        </section>

        <!-- DENTAL SERVICES -->
        <section class="mdh-section mdh-services" id="services">
            <div class="mdh-section-heading">
                <span class="mdh-eyebrow">WHAT WE DO</span>
                <h2>Care for every <em>kind of smile.</em></h2>
                <p>Temukan layanan yang sesuai dengan kebutuhan kesehatan gigi Anda.</p>
            </div>
            <div class="mdh-service-grid">
                <article class="mdh-service-card">
                    <span class="mdh-service-icon">✧</span><small>01 / PREVENTIVE</small>
                    <h3>Scaling & Cleaning</h3>
                    <p>Membantu membersihkan karang gigi dan menjaga kebersihan mulut.</p>
                    <a href="#pricing">Lihat harga ↗</a>
                </article>
                <article class="mdh-service-card">
                    <span class="mdh-service-icon">♡</span><small>02 / RESTORATIVE</small>
                    <h3>Dental Filling</h3>
                    <p>Perawatan gigi berlubang sesuai hasil pemeriksaan dokter.</p>
                    <a href="#pricing">Lihat harga ↗</a>
                </article>
                <article class="mdh-service-card">
                    <span class="mdh-service-icon">✳</span><small>03 / ORTHODONTIC</small>
                    <h3>Braces Consultation</h3>
                    <p>Konsultasi untuk memahami pilihan perawatan susunan gigi.</p>
                    <a href="#pricing">Lihat harga ↗</a>
                </article>
                <article class="mdh-service-card">
                    <span class="mdh-service-icon">☼</span><small>04 / AESTHETIC</small>
                    <h3>Teeth Whitening</h3>
                    <p>Konsultasi pilihan perawatan untuk membantu mencerahkan senyum.</p>
                    <a href="#pricing">Lihat harga ↗</a>
                </article>
            </div>
        </section>

        <!-- TREATMENT DETAILS -->
        <section class="mdh-section mdh-treatment" id="treatments">
            <div>
                <span class="mdh-eyebrow">YOUR CARE JOURNEY</span>
                <h2>Carefully planned,<br><em>comfortably delivered.</em></h2>
                <p>Setiap tindakan diawali dengan konsultasi dan pemeriksaan. Dokter akan menjelaskan kondisi, pilihan perawatan, serta estimasi biaya sebelum tindakan dilakukan.</p>
                <a class="mdh-btn mdh-btn-primary" href="#appointment">Konsultasi Sekarang ↗</a>
            </div>
            <div class="mdh-steps">
                <article><span>01</span><div><h3>Listen & Understand</h3><p>Ceritakan keluhan dan tujuan perawatan Anda.</p></div></article>
                <article><span>02</span><div><h3>Examination</h3><p>Dokter melakukan pemeriksaan sesuai kebutuhan.</p></div></article>
                <article><span>03</span><div><h3>Personalized Plan</h3><p>Pahami pilihan tindakan, biaya, dan tindak lanjut.</p></div></article>
            </div>
        </section>

        <!-- DENTIST PROFILES -->
        <section class="mdh-section" id="dentists">
            <div class="mdh-section-heading">
                <span class="mdh-eyebrow">MEET YOUR DENTIST</span>
                <h2>Care from people who <em>care.</em></h2>
                <p>Kenali tim dokter yang akan mendampingi perjalanan perawatan Anda.</p>
            </div>
            <div class="mdh-doctor-grid">
                <article class="mdh-doctor-card">
                    <img src="https://images.unsplash.com/photo-1559839734-2b71ea197ec2?auto=format&fit=crop&w=650&q=85" alt="Foto dokter gigi">
                    <div><h3>Drg. [Nama Dokter]</h3><p>Dokter Gigi Umum</p><span>Preventive & Restorative Care</span></div>
                </article>
                <article class="mdh-doctor-card">
                    <img src="https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?auto=format&fit=crop&w=650&q=85" alt="Foto dokter gigi">
                    <div><h3>Drg. [Nama Dokter]</h3><p>Dokter Gigi</p><span>Dental Consultation</span></div>
                </article>
                <article class="mdh-doctor-card">
                    <img src="https://images.unsplash.com/photo-1594824476967-48c8b964273f?auto=format&fit=crop&w=650&q=85" alt="Foto tenaga medis klinik">
                    <div><h3>Dental Care Team</h3><p>Tim Pendukung</p><span>Patient Care & Assistance</span></div>
                </article>
            </div>
        </section>

        <!-- CLINIC FACILITIES -->
        <section class="mdh-section mdh-facilities" id="facilities">
            <div class="mdh-section-heading">
                <span class="mdh-eyebrow">YOUR COMFORT MATTERS</span>
                <h2>A little more comfort, <em>at every visit.</em></h2>
            </div>
            <div class="mdh-facility-grid">
                <article><span>⌂</span><h3>Comfortable Waiting Area</h3><p>Area tunggu yang dirancang nyaman.</p></article>
                <article><span>✳</span><h3>Modern Treatment Room</h3><p>Ruang perawatan yang tertata rapi.</p></article>
                <article><span>♡</span><h3>Patient-Centered Care</h3><p>Informasi dan komunikasi yang jelas.</p></article>
                <article><span>＋</span><h3>Hygiene Protocol</h3><p>Prosedur kebersihan mengikuti standar klinik.</p></article>
            </div>
        </section>

        <!-- TREATMENT PRICE LIST -->
        <section class="mdh-section mdh-pricing" id="pricing">
            <div class="mdh-section-heading">
                <span class="mdh-eyebrow">TRANSPARENT CARE</span>
                <h2>Know your options, <em>before you begin.</em></h2>
                <p>Harga di bawah adalah data demo template. Ganti dengan tarif resmi klinik sebelum dipublikasikan.</p>
            </div>
            <div class="mdh-price-list">
                <article><div><h3>Konsultasi Dokter Gigi</h3><p>Pemeriksaan awal dan diskusi kebutuhan.</p></div><strong>Rp50.000</strong></article>
                <article><div><h3>Scaling Gigi</h3><p>Pembersihan karang gigi berdasarkan kondisi.</p></div><strong>Rp250.000</strong></article>
                <article><div><h3>Tambal Gigi</h3><p>Estimasi untuk tindakan sederhana.</p></div><strong>Rp200.000</strong></article>
                <article><div><h3>Konsultasi Behel</h3><p>Diskusi pilihan perawatan ortodonti.</p></div><strong>Rp75.000</strong></article>
                <article><div><h3>Teeth Whitening</h3><p>Estimasi tindakan pemutihan gigi.</p></div><strong>Rp800.000</strong></article>
            </div>
            <p class="mdh-price-note">Biaya akhir bergantung pada hasil pemeriksaan dan rencana perawatan. Konfirmasi tarif kepada klinik.</p>
            <a class="mdh-btn mdh-btn-primary" href="#appointment">Tanyakan Tarif & Jadwal ↗</a>
        </section>

        <!-- PATIENT TESTIMONIALS -->
        <section class="mdh-section mdh-testimonials" id="testimonials">
            <div class="mdh-section-heading">
                <span class="mdh-eyebrow">KIND WORDS</span>
                <h2>Smiles that make <em>our day.</em></h2>
            </div>
            <div class="mdh-testimonial-grid">
                <article><span class="mdh-stars">★★★★★</span><p>“Suasananya nyaman dan penjelasan perawatannya mudah dipahami.”</p><strong>— Contoh Testimoni Pasien</strong></article>
                <article><span class="mdh-stars">★★★★★</span><p>“Timnya ramah dan membantu saya memahami pilihan perawatan.”</p><strong>— Contoh Testimoni Pasien</strong></article>
                <article><span class="mdh-stars">★★★★★</span><p>“Proses konsultasi terasa lebih tenang karena informasinya jelas.”</p><strong>— Contoh Testimoni Pasien</strong></article>
            </div>
            <p class="mdh-demo-note">Testimoni di atas merupakan contoh konten desain, bukan ulasan pasien nyata.</p>
        </section>

        <!-- APPOINTMENT BOOKING -->
        <section class="mdh-section mdh-appointment" id="appointment">
            <div class="mdh-appointment-copy">
                <span class="mdh-eyebrow">LET'S PLAN YOUR VISIT</span>
                <h2>Your healthier smile starts <em>here.</em></h2>
                <p>Isi formulir untuk menyiapkan permintaan jadwal konsultasi. Tim klinik dapat mengonfirmasi ketersediaan melalui WhatsApp.</p>
                <div class="mdh-appointment-perk">✳ Konsultasi sesuai kebutuhan</div>
                <div class="mdh-appointment-perk">♡ Konfirmasi jadwal oleh tim klinik</div>
            </div>
            <form class="mdh-booking-form" id="mdhBookingForm">
                <h3>Request an Appointment</h3>
                <label>Nama lengkap<input name="name" required placeholder="Nama Anda"></label>
                <label>Nomor WhatsApp<input name="phone" type="tel" required placeholder="08xxxxxxxxxx"></label>
                <label>Layanan yang diminati
                    <select name="service" required>
                        <option value="">Pilih layanan</option>
                        <option>Konsultasi Dokter Gigi</option>
                        <option>Scaling Gigi</option>
                        <option>Tambal Gigi</option>
                        <option>Konsultasi Behel</option>
                        <option>Teeth Whitening</option>
                    </select>
                </label>
                <div class="mdh-form-row">
                    <label>Tanggal<input name="date" type="date" required></label>
                    <label>Waktu
                        <select name="time" required>
                            <option value="">Pilih waktu</option>
                            <option>09.00–12.00</option>
                            <option>13.00–16.00</option>
                            <option>17.00–20.00</option>
                        </select>
                    </label>
                </div>
                <label>Catatan (opsional)<textarea name="notes" rows="3" placeholder="Ceritakan kebutuhan Anda"></textarea></label>
                <button class="mdh-btn mdh-btn-primary mdh-btn-full" type="submit">Kirim Permintaan via WhatsApp ↗</button>
                <small>Pengiriman ini membuka WhatsApp untuk konfirmasi, bukan menyimpan booking ke database.</small>
            </form>
        </section>

        <!-- LOCATION & OPENING HOURS -->
        <section class="mdh-section mdh-location" id="location">
            <div>
                <span class="mdh-eyebrow">COME SAY HELLO</span>
                <h2>We look forward to <em>seeing you.</em></h2>
                <p>Ganti alamat, jam operasional, dan peta dengan informasi resmi klinik.</p>
                <div class="mdh-location-item"><span>⌖</span><div><strong>Alamat Klinik</strong><p>[Alamat lengkap klinik]</p></div></div>
                <div class="mdh-location-item"><span>◷</span><div><strong>Jam Operasional</strong><p>Senin–Sabtu: 09.00–20.00 WIB<br>Minggu: sesuai jadwal klinik</p></div></div>
                <div class="mdh-location-item"><span>☎</span><div><strong>Hubungi Kami</strong><p>[Nomor telepon klinik]</p></div></div>
                <a class="mdh-text-link" href="https://maps.google.com/" target="_blank" rel="noopener">Buka Google Maps ↗</a>
            </div>
            <div class="mdh-map-placeholder">
                <span>⌖</span><h3>Find Our Clinic</h3>
                <p>Sematkan Google Maps klinik yang sebenarnya di area ini.</p>
            </div>
        </section>
    </main>

    <!-- FOOTER -->
    <footer class="mdh-footer">
        <div class="mdh-footer-main">
            <a class="mdh-brand mdh-footer-brand" href="#home"><span class="mdh-brand-icon">✳</span><span>mint<span class="mdh-brand-light"> dental</span><small>HOUSE OF HEALTHY SMILES</small></span></a>
            <p>A gentler approach to your everyday dental care.</p>
            <a href="#appointment" class="mdh-footer-link">Let's make you smile ↗</a>
        </div>
        <div class="mdh-footer-bottom"><span>© <span id="mdhYear"></span> Mint Dental House.</span><span>Made with care ♡ · Website template by WEBIA</span></div>
    </footer>

    <!-- WHATSAPP BUTTON -->
    <a href="#" class="mdh-whatsapp" id="mdhWhatsApp" aria-label="Hubungi klinik melalui WhatsApp" title="Chat WhatsApp">◉</a>

    <!-- AI CHATBOT BUTTON -->
    <button class="mdh-chat-toggle" id="mdhChatToggle" aria-label="Buka asisten virtual" aria-expanded="false">✳ <span>Ask Mint</span></button>
    <section class="mdh-chat-panel" id="mdhChatPanel" aria-label="Asisten virtual Mint Dental House" hidden>
        <div class="mdh-chat-head"><div><strong>Mint Assistant ✳</strong><small>Asisten informasi klinik</small></div><button type="button" id="mdhChatClose" aria-label="Tutup chatbot">×</button></div>
        <div class="mdh-chat-messages" id="mdhChatMessages" aria-live="polite">
            <p class="mdh-chat-bubble">Hai! 👋 Aku Mint Assistant. Mau tahu layanan, harga demo, atau cara membuat janji?</p>
        </div>
        <div class="mdh-chat-quick">
            <button type="button" data-question="layanan">Layanan</button>
            <button type="button" data-question="harga">Harga</button>
            <button type="button" data-question="appointment">Buat janji</button>
            <button type="button" data-question="jam">Jam buka</button>
        </div>
        <form id="mdhChatForm" class="mdh-chat-input"><input id="mdhChatInput" placeholder="Tulis pertanyaan..." aria-label="Pertanyaan Anda" required><button type="submit" aria-label="Kirim pesan">➤</button></form>
        <small class="mdh-chat-disclaimer">Asisten demo untuk FAQ umum, bukan pengganti diagnosis dokter.</small>
    </section>

    <script src="{{ asset('js/website-bisnis/templates/healthcare/dental/mint-dental-house.js') }}" defer></script>
</body>
</html>
