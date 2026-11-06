
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Temukan perawatan kulit modern dengan teknologi kecantikan terkini. Konsultasikan kebutuhan kulit Anda dan jadwalkan treatment bersama AURA Skin Lab.">
    <meta name="theme-color" content="#eafaff">
    <title>AURA Skin Lab | Advanced Skincare & Beauty Treatment</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/website-bisnis/templates/beauty/icy-blue-tech.css') }}">
</head>
<body>
    <div class="tech-grid"></div>

    <header class="site-header">
        <a href="#home" class="brand">
            <span class="brand-symbol">A</span>
            <span>
                <strong>AURA</strong>
                <small>SKIN LAB</small>
            </span>
        </a>

        <button class="menu-toggle" id="menuToggle"
                aria-label="Buka navigasi" aria-expanded="false">
            <span></span><span></span><span></span>
        </button>

        <nav class="main-nav" id="mainNav">
            <a href="#home">Home</a>
            <a href="#treatments">Treatments</a>
            <a href="#technology">Technology</a>
            <a href="#results">Results</a>
            <a href="#contact">Contact</a>
            <a href="#booking" class="nav-cta">Book Treatment <span>↗</span></a>
        </nav>
    </header>

    <main>
        <section class="hero section" id="home">
            <div class="hero-content">
                <div class="eyebrow">
                    <span class="status-dot"></span>
                    NEXT-GEN SKINCARE EXPERIENCE
                </div>

                <h1>
                    Your Skin.<br>
                    <span>Our Science.</span><br>
                    Your Glow.
                </h1>

                <p class="hero-description">
                    Discover advanced skincare treatments powered by
                    modern beauty technology and personalized skin care.
                </p>

                <div class="hero-actions">
                    <a href="#booking" class="button button-primary">
                        Explore Treatments <span>↗</span>
                    </a>
                    <a href="#technology" class="button button-outline">
                        Discover Our Technology
                    </a>
                </div>

                <div class="hero-trust">
                    <div class="trust-icon">✧</div>
                    <div>
                        <strong>Personalized Skin Journey</strong>
                        <p>Care designed around your skin's needs.</p>
                    </div>
                </div>
            </div>

            <div class="hero-visual">
                <div class="orbit orbit-one"></div>
                <div class="orbit orbit-two"></div>

                <div class="hero-image">
                    <img
                        src="https://images.unsplash.com/photo-1616394584738-fc6e612e71b9?auto=format&fit=crop&w=1000&q=85"
                        alt="Perawatan wajah dan kecantikan modern"
                    >
                </div>

                <div class="floating-card floating-top">
                    <span class="floating-icon">✧</span>
                    <div>
                        <small>YOUR SKIN JOURNEY</small>
                        <strong>Made for You</strong>
                    </div>
                </div>

                <div class="floating-card floating-bottom">
                    <span class="scan-icon">◉</span>
                    <div>
                        <small>SMART SKINCARE</small>
                        <strong>Technology Meets Beauty</strong>
                    </div>
                </div>

                <div class="hero-caption">SCIENCE · SKIN · CONFIDENCE</div>
            </div>
        </section>

        <section class="stats-strip">
            <div><strong>01</strong><span>Skin Consultation</span></div>
            <div><strong>02</strong><span>Advanced Treatment</span></div>
            <div><strong>03</strong><span>Personalized Care</span></div>
            <div><strong>04</strong><span>Skin Progress Review</span></div>
        </section>

        <section class="section treatments-section" id="treatments">
            <div class="section-heading">
                <div>
                    <div class="eyebrow">CURATED FOR YOUR SKIN</div>
                    <h2>Discover Your<br><span>Skin Solution.</span></h2>
                </div>
                <p>
                    Explore our treatment collection, designed to support
                    different skin needs through a personalized approach.
                </p>
            </div>

            <div class="treatment-grid">
                <article class="treatment-card">
                    <div class="treatment-image">
                        <img src="https://images.unsplash.com/photo-1570172619644-dfd03ed5d881?auto=format&fit=crop&w=800&q=80"
                             alt="Facial treatment">
                        <span class="treatment-number">01 / FACIAL</span>
                    </div>
                    <div class="treatment-info">
                        <div class="card-label">SKIN ESSENTIALS</div>
                        <h3>Signature Facial</h3>
                        <p>Perawatan untuk membantu membersihkan dan merawat kulit wajah.</p>
                        <a href="#booking" class="text-link" data-treatment="Signature Facial">
                            Discover Treatment <span>↗</span>
                        </a>
                    </div>
                </article>

                <article class="treatment-card">
                    <div class="treatment-image">
                        <img src="https://images.unsplash.com/photo-1600334129128-685c5582fd35?auto=format&fit=crop&w=800&q=80"
                             alt="Advanced beauty treatment">
                        <span class="treatment-number">02 / ADVANCED</span>
                    </div>
                    <div class="treatment-info">
                        <div class="card-label">TECH-POWERED CARE</div>
                        <h3>Advanced Skin Treatment</h3>
                        <p>Perawatan dengan pendekatan teknologi sesuai kebutuhan kulit.</p>
                        <a href="#booking" class="text-link" data-treatment="Advanced Skin Treatment">
                            Discover Treatment <span>↗</span>
                        </a>
                    </div>
                </article>

                <article class="treatment-card">
                    <div class="treatment-image">
                        <img src="https://images.unsplash.com/photo-1611930022073-b7a4ba5fcccd?auto=format&fit=crop&w=800&q=80"
                             alt="Skincare product collection">
                        <span class="treatment-number">03 / SKINCARE</span>
                    </div>
                    <div class="treatment-info">
                        <div class="card-label">DAILY SKIN RITUAL</div>
                        <h3>Personal Skincare</h3>
                        <p>Pilihan produk untuk melengkapi rutinitas perawatan kulit Anda.</p>
                        <a href="#products" class="text-link">
                            Explore Products <span>↗</span>
                        </a>
                    </div>
                </article>
            </div>
        </section>

        <section class="technology-section" id="technology">
            <div class="section technology-layout">
                <div class="technology-visual">
                    <img src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&fit=crop&w=1000&q=85"
                         alt="Teknologi dan konsultasi perawatan kulit">
                    <div class="tech-overlay">
                        <span class="status-dot"></span>
                        A MORE PERSONALIZED APPROACH
                    </div>
                </div>

                <div class="technology-content">
                    <div class="eyebrow">BEAUTY MEETS INNOVATION</div>
                    <h2>Smarter Care.<br><span>Better Skin Journey.</span></h2>
                    <p>
                        Setiap kulit memiliki kebutuhan berbeda. Kami mengutamakan
                        konsultasi, pemilihan treatment yang sesuai, dan evaluasi
                        berkala untuk mendukung perjalanan perawatan Anda.
                    </p>

                    <div class="feature-list">
                        <div class="feature-item">
                            <span>01</span>
                            <div>
                                <h3>Skin Consultation</h3>
                                <p>Diskusikan kondisi dan kebutuhan kulit Anda.</p>
                            </div>
                        </div>
                        <div class="feature-item">
                            <span>02</span>
                            <div>
                                <h3>Personalized Treatment</h3>
                                <p>Pilihan perawatan berdasarkan hasil konsultasi.</p>
                            </div>
                        </div>
                        <div class="feature-item">
                            <span>03</span>
                            <div>
                                <h3>Progress Monitoring</h3>
                                <p>Pantau perkembangan kulit bersama terapis.</p>
                            </div>
                        </div>
                    </div>

                    <a href="#booking" class="button button-primary">
                        Start Your Skin Journey <span>↗</span>
                    </a>
                </div>
            </div>
        </section>

        <section class="section products-section" id="products">
            <div class="section-heading">
                <div>
                    <div class="eyebrow">YOUR DAILY SKIN RITUAL</div>
                    <h2>Care Beyond<br><span>The Clinic.</span></h2>
                </div>
                <p>
                    Lengkapi perawatan di klinik dengan rutinitas skincare
                    yang sesuai dengan kebutuhan kulit sehari-hari.
                </p>
            </div>

            <div class="product-panel">
                <div class="product-copy">
                    <span class="product-tag">PERSONAL SKINCARE EDIT</span>
                    <h3>Your Routine.<br>Your <span>Radiance.</span></h3>
                    <p>
                        Konsultasikan pilihan cleanser, moisturizer, sunscreen,
                        dan produk perawatan lain bersama tim kami.
                    </p>
                    <a href="#booking" class="button button-dark">
                        Ask Our Team <span>↗</span>
                    </a>
                </div>
                <div class="product-image">
                    <img src="https://images.unsplash.com/photo-1608248543803-ba4f8c70ae0b?auto=format&fit=crop&w=900&q=85"
                         alt="Produk skincare untuk perawatan sehari-hari">
                </div>
            </div>
        </section>

        <section class="section therapists-section" id="therapists">
            <div class="section-heading">
                <div>
                    <div class="eyebrow">MEET YOUR SKINCARE TEAM</div>
                    <h2>Care You Can<br><span>Feel Confident In.</span></h2>
                </div>
                <p>
                    Kenali tim yang siap membantu Anda memahami pilihan
                    perawatan dan menjaga rutinitas skincare.
                </p>
            </div>

            <div class="therapist-grid">
                <article class="therapist-card">
                    <img src="https://images.unsplash.com/photo-1559839734-2b71ea197ec2?auto=format&fit=crop&w=700&q=80"
                         alt="Ilustrasi profil profesional kecantikan">
                    <div>
                        <span>SKIN CONSULTATION</span>
                        <h3>Skin Consultant</h3>
                        <p>Membantu memahami kebutuhan dan rutinitas kulit.</p>
                    </div>
                </article>
                <article class="therapist-card">
                    <img src="https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?auto=format&fit=crop&w=700&q=80"
                         alt="Ilustrasi profil profesional kesehatan">
                    <div>
                        <span>PROFESSIONAL CARE</span>
                        <h3>Beauty Professional</h3>
                        <p>Mendampingi Anda memilih perawatan yang sesuai.</p>
                    </div>
                </article>
            </div>
            <p class="disclaimer">
                Profil di atas merupakan contoh tampilan. Ganti dengan nama,
                foto, dan kualifikasi tim klinik yang sebenarnya.
            </p>
        </section>

        <section class="results-section" id="results">
            <div class="section results-layout">
                <div>
                    <div class="eyebrow">YOUR SKIN, YOUR STORY</div>
                    <h2>Progress Worth<br><span>Celebrating.</span></h2>
                    <p>
                        Perjalanan perawatan kulit membutuhkan konsistensi.
                        Dokumentasikan progres dan diskusikan hasilnya bersama
                        tenaga profesional.
                    </p>
                    <a href="#booking" class="button button-primary">
                        Book a Consultation <span>↗</span>
                    </a>
                </div>

                <div class="results-gallery">
                    <div class="result-photo">
                        <img src="https://images.unsplash.com/photo-1556229010-6c3f2c9ca5f8?auto=format&fit=crop&w=700&q=80"
                             alt="Contoh visual perawatan kulit">
                        <span>SKINCARE JOURNEY</span>
                    </div>
                    <div class="result-photo result-offset">
                        <img src="https://images.unsplash.com/photo-1556228578-0d85b1a4d571?auto=format&fit=crop&w=700&q=80"
                             alt="Contoh visual produk dan perawatan kulit">
                        <span>PERSONALIZED CARE</span>
                    </div>
                </div>
            </div>
            <p class="disclaimer section">
                Gambar ini bukan klaim hasil sebelum dan sesudah treatment.
                Gunakan foto pasien asli hanya dengan persetujuan mereka.
            </p>
        </section>

        <section class="section packages-section" id="packages">
            <div class="section-heading">
                <div>
                    <div class="eyebrow">CURATED CARE PACKAGES</div>
                    <h2>Your Glow,<br><span>Your Way.</span></h2>
                </div>
                <p>Pilih paket perawatan sesuai kebutuhan setelah berkonsultasi dengan tim kami.</p>
            </div>

            <div class="package-grid">
                <article class="package-card">
                    <span class="package-index">PACKAGE / 01</span>
                    <h3>Skin Reset</h3>
                    <p>Untuk memulai rutinitas perawatan dengan konsultasi dan facial dasar.</p>
                    <a href="#booking" class="text-link" data-treatment="Paket Skin Reset">
                        Ask for Details ↗
                    </a>
                </article>
                <article class="package-card package-featured">
                    <span class="package-index">PACKAGE / 02</span>
                    <div class="popular-label">PERSONALIZED</div>
                    <h3>Skin Renewal</h3>
                    <p>Rangkaian perawatan yang disesuaikan dengan kebutuhan kulit Anda.</p>
                    <a href="#booking" class="text-link" data-treatment="Paket Skin Renewal">
                        Ask for Details ↗
                    </a>
                </article>
                <article class="package-card">
                    <span class="package-index">PACKAGE / 03</span>
                    <h3>Skin Maintenance</h3>
                    <p>Perawatan berkala untuk mendukung konsistensi rutinitas skincare.</p>
                    <a href="#booking" class="text-link" data-treatment="Paket Skin Maintenance">
                        Ask for Details ↗
                    </a>
                </article>
            </div>
        </section>

        <section class="section testimonials-section" id="testimonials">
            <div class="eyebrow">REAL EXPERIENCES MATTER</div>
            <h2>Every Skin Journey<br><span>Is Personal.</span></h2>

            <div class="testimonial-box">
                <span class="quote-mark">“</span>
                <p id="testimonialText">
                    Bagian ini dapat menampilkan pengalaman pelanggan
                    setelah menjalani perawatan di klinik.
                </p>
                <div class="testimonial-author">
                    <strong id="testimonialName">Customer Experience</strong>
                    <span id="testimonialRole">AURA Skin Lab</span>
                </div>
                <div class="testimonial-controls">
                    <button id="testimonialPrev" aria-label="Testimoni sebelumnya">←</button>
                    <span id="testimonialCount">01 / 03</span>
                    <button id="testimonialNext" aria-label="Testimoni berikutnya">→</button>
                </div>
            </div>
            <p class="disclaimer">
                Testimoni yang ditampilkan merupakan teks demo. Ganti dengan
                ulasan pelanggan nyata yang telah mendapatkan izin publikasi.
            </p>
        </section>

        <section class="section faq-section" id="faq">
            <div class="faq-intro">
                <div class="eyebrow">NEED TO KNOW</div>
                <h2>Questions?<br><span>We've Got You.</span></h2>
                <p>Temukan informasi awal sebelum mengunjungi klinik kami.</p>
            </div>

            <div class="faq-list">
                <details>
                    <summary>Bagaimana cara memilih treatment yang tepat?</summary>
                    <p>Mulailah dengan konsultasi agar tim dapat memahami kondisi dan kebutuhan kulit Anda.</p>
                </details>
                <details>
                    <summary>Apakah perlu membuat janji terlebih dahulu?</summary>
                    <p>Kami menyarankan reservasi terlebih dahulu untuk membantu mengatur jadwal kunjungan Anda.</p>
                </details>
                <details>
                    <summary>Apakah tersedia konsultasi melalui WhatsApp?</summary>
                    <p>Anda dapat menghubungi tim kami melalui WhatsApp untuk menanyakan layanan dan jadwal.</p>
                </details>
                <details>
                    <summary>Bagaimana mengetahui harga treatment?</summary>
                    <p>Hubungi tim kami untuk memperoleh informasi harga dan paket terbaru.</p>
                </details>
            </div>
        </section>

        <section class="booking-section" id="booking">
            <div class="section booking-layout">
                <div class="booking-copy">
                    <div class="eyebrow">YOUR NEXT STEP STARTS HERE</div>
                    <h2>Let's Talk About<br><span>Your Skin.</span></h2>
                    <p>
                        Isi detail singkat berikut. Tim kami akan membantu
                        mengonfirmasi jadwal dan informasi treatment.
                    </p>
                    <div class="booking-note">
                        <span>✧</span>
                        Personalized care begins with a conversation.
                    </div>
                </div>

                <form class="booking-form" id="bookingForm">
                    <label for="customerName">Nama lengkap</label>
                    <input type="text" id="customerName" name="name"
                           placeholder="Masukkan nama Anda" required>

                    <label for="customerPhone">Nomor WhatsApp</label>
                    <input type="tel" id="customerPhone" name="phone"
                           placeholder="08xxxxxxxxxx" required>

                    <label for="treatmentSelect">Pilihan treatment</label>
                    <select id="treatmentSelect" name="treatment" required>
                        <option value="">Pilih treatment</option>
                        <option>Skin Consultation</option>
                        <option>Signature Facial</option>
                        <option>Advanced Skin Treatment</option>
                        <option>Personal Skincare</option>
                        <option>Paket Skin Reset</option>
                        <option>Paket Skin Renewal</option>
                        <option>Paket Skin Maintenance</option>
                    </select>

                    <label for="appointmentDate">Tanggal yang diinginkan</label>
                    <input type="date" id="appointmentDate" name="date" required>

                    <label for="customerMessage">Catatan (opsional)</label>
                    <textarea id="customerMessage" name="message"
                              rows="3" placeholder="Ceritakan kebutuhan Anda"></textarea>

                    <button type="submit" class="button button-primary booking-submit">
                        Continue to WhatsApp <span>↗</span>
                    </button>
                    <small>Jadwal akan dikonfirmasi oleh tim klinik.</small>
                </form>
            </div>
        </section>

        <section class="section contact-section" id="contact">
            <div>
                <div class="eyebrow">VISIT AURA SKIN LAB</div>
                <h2>Your Skin Journey<br><span>Starts Here.</span></h2>
            </div>
            <div class="contact-details">
                <div>
                    <span>LOCATION</span>
                    <p>Isi alamat lengkap klinik Anda</p>
                </div>
                <div>
                    <span>OPENING HOURS</span>
                    <p>Senin–Sabtu · Isi jam operasional</p>
                </div>
                <div>
                    <span>CONTACT</span>
                    <p>Hubungi kami untuk jadwal dan informasi layanan</p>
                </div>
                <a href="#booking" class="button button-dark">Plan Your Visit ↗</a>
            </div>
        </section>
    </main>

    <footer class="site-footer">
        <a href="#home" class="brand">
            <span class="brand-symbol">A</span>
            <span><strong>AURA</strong><small>SKIN LAB</small></span>
        </a>
        <p>Modern skincare. Thoughtful care. Your journey.</p>
        <span>© <span id="currentYear"></span> AURA Skin Lab. Demo template.</span>
    </footer>

    <a class="floating-whatsapp" id="whatsappFloat"
       href="#booking" aria-label="Konsultasi melalui WhatsApp">
        <span>✳</span> Let's Talk
    </a>

    <script src="{{ asset('js/website-bisnis/icy-blue-tech.js') }}"></script>
</body>
</html>
