
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Bold Pastel Beauty — Beauty & Skincare Clinic</title>
    <meta name="description" content="Temukan perawatan kecantikan dan skincare pilihan untuk kulit sehat, glowing, dan percaya diri.">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@500;600;700;800&display=swap" rel="stylesheet">
    <script src="{{ asset('js/website-bisnis/bold-pastel-beauty-ai.js') }}" defer></script>
    <link rel="stylesheet" href="{{ asset('css/website-bisnis/templates/beauty/bold-pastel-beauty.css') }}">
</head>
<body class="bold-beauty">

    <!-- Announcement -->
    <div class="bb-announcement">
        <p>Your beauty, your power. ✦ Discover your best skin today.</p>
    </div>

    <!-- Navigation -->
    <header class="bb-header">
        <div class="bb-container bb-navbar">
            <a href="#home" class="bb-logo">
                <span class="bb-logo-icon">B.</span>
                <span class="bb-logo-text">
                    <strong>bold beauty</strong>
                    <small>SKINCARE & AESTHETIC CLINIC</small>
                </span>
            </a>

            <nav class="bb-nav" id="bbNav">
                <a href="#home">Home</a>
                <a href="#about">About Us</a>
                <a href="#treatments">Treatments</a>
                <a href="#products">Products</a>
                <a href="#pricing">Pricing</a>
            </nav>

            <a href="#booking" class="bb-button bb-button-primary bb-nav-cta">
                Book Appointment <span>↗</span>
            </a>

            <button class="bb-menu-toggle" id="bbMenuToggle"
                type="button" aria-label="Buka navigasi" aria-expanded="false">
                <span></span><span></span><span></span>
            </button>
        </div>
    </header>

    <main>
        <!-- Hero -->
        <section class="bb-hero" id="home">
            <div class="bb-container bb-hero-grid">
                <div class="bb-hero-copy">
                    <span class="bb-eyebrow">
                        <span class="bb-eyebrow-dot"></span>
                        YOUR BEAUTY, YOUR POWER
                    </span>

                    <h1>
                        Beauty is<br>
                        <span>number one.</span>
                    </h1>

                    <p class="bb-hero-description">
                        Your skin deserves a little extra love.
                        Temukan perawatan kecantikan yang dirancang
                        untuk membuatmu tampil sehat dan percaya diri.
                    </p>

                    <div class="bb-hero-actions">
                        <a href="#booking" class="bb-button bb-button-primary">
                            Start Your Glow <span>↗</span>
                        </a>
                        <a href="#treatments" class="bb-button bb-button-outline">
                            Explore Treatments
                        </a>
                    </div>

                    <div class="bb-hero-proof">
                        <div class="bb-avatar-stack">
                            <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=100&q=80" alt="Pelanggan Bold Beauty">
                            <img src="https://images.unsplash.com/photo-1524504388940-b1c1722653e1?auto=format&fit=crop&w=100&q=80" alt="Pelanggan klinik">
                            <img src="https://images.unsplash.com/photo-1508214751196-bcfd4ca60f91?auto=format&fit=crop&w=100&q=80" alt="Pelanggan skincare">
                        </div>
                        <div>
                            <strong>Your skin, our care.</strong>
                            <p>Personalized care for every skin story.</p>
                        </div>
                    </div>
                </div>

                <div class="bb-hero-visual">
                    <div class="bb-hero-image-wrap">
                        <img
                            class="bb-hero-image"
                            src="https://images.unsplash.com/photo-1616394584738-fc6e612e71b9?auto=format&fit=crop&w=1000&q=85"
                            alt="Perawatan kulit wajah di klinik kecantikan"
                        >
                    </div>

                    <div class="bb-floating-card bb-floating-top">
                        <span class="bb-floating-icon">✦</span>
                        <div>
                            <strong>Glow with confidence</strong>
                            <small>Your beauty journey starts here</small>
                        </div>
                    </div>

                    <div class="bb-floating-card bb-floating-bottom">
                        <span class="bb-rating">★★★★★</span>
                        <strong>Love your skin</strong>
                        <small>Care that feels personal</small>
                    </div>

                    <div class="bb-hero-sticker">BE<br>YOUR<br>BEST</div>
                    <div class="bb-hero-orb"></div>
                </div>
            </div>

            <div class="bb-hero-bottom">
                <div class="bb-container bb-hero-bottom-inner">
                    <span>SKINCARE</span><i>✳</i>
                    <span>SELF-LOVE</span><i>✳</i>
                    <span>CONFIDENCE</span><i>✳</i>
                    <span>YOUR GLOW ERA</span>
                </div>
            </div>
        </section>

        <!-- About -->
        <section class="bb-section bb-about" id="about">
            <div class="bb-container bb-about-grid">
                <div class="bb-about-visual">
                    <div class="bb-about-image-main">
                        <img
                            src="https://images.unsplash.com/photo-1570172619644-dfd03ed5d881?auto=format&fit=crop&w=900&q=85"
                            alt="Suasana perawatan wajah"
                            loading="lazy"
                        >
                    </div>
                    <div class="bb-about-image-small">
                        <img
                            src="https://images.unsplash.com/photo-1600334129128-685c5582fd35?auto=format&fit=crop&w=500&q=85"
                            alt="Ruang treatment kecantikan"
                            loading="lazy"
                        >
                    </div>
                    <div class="bb-about-note">
                        <span>✳</span>
                        <strong>Care for your skin.<br>Love yourself more.</strong>
                    </div>
                </div>

                <div class="bb-about-copy">
                    <span class="bb-section-label">A LITTLE ABOUT US</span>
                    <h2>Good skin days<br>start with <span>good care.</span></h2>

                    <p>
                        Bold Beauty hadir sebagai ruang perawatan kecantikan
                        modern yang mengutamakan kenyamanan, kualitas layanan,
                        dan perawatan sesuai kebutuhan kulit setiap individu.
                    </p>

                    <p>
                        Kami percaya setiap orang memiliki keunikan kulitnya
                        sendiri. Karena itu, perjalanan kecantikanmu dimulai
                        dengan konsultasi dan pilihan treatment yang tepat.
                    </p>

                    <div class="bb-about-points">
                        <div><span>✓</span> Personalized skin consultation</div>
                        <div><span>✓</span> Professional beauty treatments</div>
                        <div><span>✓</span> Carefully selected skincare</div>
                    </div>

                    <a href="#booking" class="bb-text-link">
                        Get to know us <span>↗</span>
                    </a>
                </div>
            </div>
        </section>

        <!-- Treatments -->
        <section class="bb-section bb-treatments" id="treatments">
            <div class="bb-container">
                <div class="bb-section-heading">
                    <div>
                        <span class="bb-section-label">YOUR SKIN, YOUR RULES</span>
                        <h2>Find your <span>glow.</span></h2>
                    </div>
                    <p>
                        Pilih perawatan favoritmu dan berikan kulitmu
                        perhatian yang layak didapatkan.
                    </p>
                </div>

                <div class="bb-treatment-grid">
                    <article class="bb-treatment-card">
                        <div class="bb-treatment-image">
                            <img
                                src="https://images.unsplash.com/photo-1570172619644-dfd03ed5d881?auto=format&fit=crop&w=700&q=85"
                                alt="Signature facial treatment"
                                loading="lazy"
                            >
                            <span class="bb-treatment-number">01</span>
                        </div>
                        <div class="bb-treatment-content">
                            <span class="bb-card-tag">MOST LOVED</span>
                            <h3>Signature Facial</h3>
                            <p>Perawatan wajah untuk membantu membersihkan dan merawat kulit agar terasa lebih segar.</p>
                            <div class="bb-card-footer">
                                <span>Mulai dari <strong>Rp150.000</strong></span>
                                <a href="#booking" aria-label="Booking Signature Facial">↗</a>
                            </div>
                        </div>
                    </article>

                    <article class="bb-treatment-card bb-treatment-featured">
                        <div class="bb-treatment-image">
                            <img
                                src="https://images.unsplash.com/photo-1512290923902-8a9f81dc236c?auto=format&fit=crop&w=700&q=85"
                                alt="Glow facial treatment"
                                loading="lazy"
                            >
                            <span class="bb-treatment-number">02</span>
                        </div>
                        <div class="bb-treatment-content">
                            <span class="bb-card-tag">GLOW ESSENTIAL</span>
                            <h3>Glow Facial</h3>
                            <p>Ritual perawatan untuk membantu kulit tampak lebih cerah, lembap, dan terawat.</p>
                            <div class="bb-card-footer">
                                <span>Mulai dari <strong>Rp250.000</strong></span>
                                <a href="#booking" aria-label="Booking Glow Facial">↗</a>
                            </div>
                        </div>
                    </article>

                    <article class="bb-treatment-card">
                        <div class="bb-treatment-image">
                            <img
                                src="https://images.unsplash.com/photo-1616394584738-fc6e612e71b9?auto=format&fit=crop&w=700&q=85"
                                alt="Skin consultation"
                                loading="lazy"
                            >
                            <span class="bb-treatment-number">03</span>
                        </div>
                        <div class="bb-treatment-content">
                            <span class="bb-card-tag">START HERE</span>
                            <h3>Skin Consultation</h3>
                            <p>Konsultasi untuk memahami kondisi kulit dan menentukan rutinitas perawatan yang sesuai.</p>
                            <div class="bb-card-footer">
                                <span>Mulai dari <strong>Rp100.000</strong></span>
                                <a href="#booking" aria-label="Booking Skin Consultation">↗</a>
                            </div>
                        </div>
                    </article>
                </div>

                <div class="bb-centered-action">
                    <a href="#pricing" class="bb-button bb-button-dark">
                        View All Treatments <span>↗</span>
                    </a>
                </div>
            </div>
        </section>

        <!-- Promotional banner -->
        <section class="bb-promo">
            <div class="bb-container bb-promo-inner">
                <div class="bb-promo-copy">
                    <span class="bb-section-label">A LITTLE TREAT FOR YOU</span>
                    <h2>Your glow era<br>starts <span>now.</span></h2>
                    <p>
                        Jadwalkan konsultasi pertamamu dan temukan
                        rangkaian perawatan yang sesuai dengan kebutuhanmu.
                    </p>
                    <a href="#booking" class="bb-button bb-button-dark">
                        Book Your Visit <span>↗</span>
                    </a>
                </div>

                <div class="bb-promo-visual">
                    <div class="bb-promo-circle">LOVE<br>YOUR<br>SKIN <span>✳</span></div>
                    <img
                        src="https://images.unsplash.com/photo-1598440947619-2c35fc9aa908?auto=format&fit=crop&w=900&q=85"
                        alt="Produk skincare dan perawatan kecantikan"
                        loading="lazy"
                    >
                </div>
            </div>
        </section>

        <!-- Products -->
        <section class="bb-section bb-products" id="products">
            <div class="bb-container">
                <div class="bb-section-heading">
                    <div>
                        <span class="bb-section-label">YOUR DAILY SKIN RITUAL</span>
                        <h2>Skincare <span>must-haves.</span></h2>
                    </div>
                    <p>
                        Temukan produk pilihan untuk melengkapi rutinitas
                        perawatan kulitmu di rumah.
                    </p>
                </div>

                <div class="bb-product-grid">
                    <article class="bb-product-card">
                        <div class="bb-product-image bb-product-pink">
                            <span class="bb-product-badge">BEST SELLER</span>
                            <img
                                src="https://images.unsplash.com/photo-1608248543803-ba4f8c70ae0b?auto=format&fit=crop&w=600&q=85"
                                alt="Gentle facial cleanser"
                                loading="lazy"
                            >
                        </div>
                        <div class="bb-product-info">
                            <span>DAILY CLEANSER</span>
                            <h3>Gentle Glow Cleanser</h3>
                            <div class="bb-product-bottom">
                                <strong>Rp129.000</strong>
                                <a href="#booking" aria-label="Tanya Gentle Glow Cleanser">↗</a>
                            </div>
                        </div>
                    </article>

                    <article class="bb-product-card">
                        <div class="bb-product-image bb-product-lilac">
                            <span class="bb-product-badge">DAILY FAVORITE</span>
                            <img
                                src="https://images.unsplash.com/photo-1601049541289-9b1b7bbbfe19?auto=format&fit=crop&w=600&q=85"
                                alt="Serum skincare"
                                loading="lazy"
                            >
                        </div>
                        <div class="bb-product-info">
                            <span>SKIN SERUM</span>
                            <h3>Radiance Boost Serum</h3>
                            <div class="bb-product-bottom">
                                <strong>Rp189.000</strong>
                                <a href="#booking" aria-label="Tanya Radiance Boost Serum">↗</a>
                            </div>
                        </div>
                    </article>

                    <article class="bb-product-card">
                        <div class="bb-product-image bb-product-yellow">
                            <span class="bb-product-badge">SKIN ESSENTIAL</span>
                            <img
                                src="https://images.unsplash.com/photo-1556229010-6c3f2c9ca5f8?auto=format&fit=crop&w=600&q=85"
                                alt="Moisturizer skincare"
                                loading="lazy"
                            >
                        </div>
                        <div class="bb-product-info">
                            <span>DAILY MOISTURIZER</span>
                            <h3>Cloud Soft Moisturizer</h3>
                            <div class="bb-product-bottom">
                                <strong>Rp159.000</strong>
                                <a href="#booking" aria-label="Tanya Cloud Soft Moisturizer">↗</a>
                            </div>
                        </div>
                    </article>
                </div>

                <p class="bb-disclaimer">
                    *Nama produk, ketersediaan, dan harga di atas merupakan contoh
                    konten template yang dapat disesuaikan.
                </p>
            </div>
        </section>

        <!-- Pricing -->
        <section class="bb-section bb-pricing" id="pricing">
            <div class="bb-container">
                <div class="bb-section-heading">
                    <div>
                        <span class="bb-section-label">SIMPLE, CLEAR & PERSONAL</span>
                        <h2>Pick your <span>self-care.</span></h2>
                    </div>
                    <p>
                        Pilihan layanan dengan harga transparan untuk membantu
                        kamu merencanakan perawatan.
                    </p>
                </div>

                <div class="bb-pricing-grid">
                    <article class="bb-price-card">
                        <span class="bb-price-category">THE ESSENTIAL</span>
                        <h3>Fresh Start</h3>
                        <p>Untuk kamu yang ingin memulai rutinitas perawatan kulit.</p>
                        <div class="bb-price">Rp150.000 <small>/ sesi</small></div>
                        <ul>
                            <li>✓ Skin cleansing</li>
                            <li>✓ Basic facial care</li>
                            <li>✓ Aftercare tips</li>
                        </ul>
                        <a href="#booking" class="bb-button bb-button-outline bb-button-full">
                            Choose Package
                        </a>
                    </article>

                    <article class="bb-price-card bb-price-popular">
                        <span class="bb-price-ribbon">MOST POPULAR ✦</span>
                        <span class="bb-price-category">THE GLOW UP</span>
                        <h3>Glow Routine</h3>
                        <p>Perawatan pilihan untuk pengalaman self-care yang lebih lengkap.</p>
                        <div class="bb-price">Rp250.000 <small>/ sesi</small></div>
                        <ul>
                            <li>✓ Personalized consultation</li>
                            <li>✓ Facial treatment</li>
                            <li>✓ Skincare recommendations</li>
                        </ul>
                        <a href="#booking" class="bb-button bb-button-primary bb-button-full">
                            Choose Package <span>↗</span>
                        </a>
                    </article>

                    <article class="bb-price-card">
                        <span class="bb-price-category">THE SELF-LOVE</span>
                        <h3>Skin Journey</h3>
                        <p>Untuk kamu yang ingin berkonsultasi dan merencanakan perawatan.</p>
                        <div class="bb-price">Rp350.000 <small>/ sesi</small></div>
                        <ul>
                            <li>✓ Extended consultation</li>
                            <li>✓ Treatment recommendation</li>
                            <li>✓ Personal care plan</li>
                        </ul>
                        <a href="#booking" class="bb-button bb-button-outline bb-button-full">
                            Choose Package
                        </a>
                    </article>
                </div>

                <p class="bb-disclaimer">
                    *Harga paket di atas adalah contoh untuk desain template, bukan
                    daftar harga klinik tertentu. Sesuaikan sebelum website dipublikasikan.
                </p>
            </div>
        </section>

        <!-- Testimonials -->
        <section class="bb-section bb-testimonials" id="testimonials">
            <div class="bb-container bb-testimonial-layout">
                <div class="bb-testimonial-heading">
                    <span class="bb-section-label">KIND WORDS, REAL CONNECTIONS</span>
                    <h2>A little love<br>from our <span>community.</span></h2>
                    <p>
                        Pengalaman perawatan yang nyaman dimulai dari perhatian
                        terhadap setiap kebutuhan kulit.
                    </p>
                    <div class="bb-testimonial-arrows">
                        <button type="button" id="bbPrev" aria-label="Testimoni sebelumnya">←</button>
                        <button type="button" id="bbNext" aria-label="Testimoni berikutnya">→</button>
                    </div>
                </div>

                <div class="bb-testimonial-track" id="bbTestimonialTrack">
                    <article class="bb-testimonial-card">
                        <div class="bb-rating">★★★★★</div>
                        <blockquote>
                            “Tempatnya nyaman dan proses konsultasinya terasa personal.
                            Saya jadi lebih paham cara merawat kulit sehari-hari.”
                        </blockquote>
                        <div class="bb-reviewer">
                            <img
                                src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=120&q=80"
                                alt="Foto pelanggan"
                                loading="lazy"
                            >
                            <div><strong>Sarah A.</strong><small>Beauty care client</small></div>
                        </div>
                    </article>

                    <article class="bb-testimonial-card">
                        <div class="bb-rating">★★★★★</div>
                        <blockquote>
                            “Treatment-nya menyenangkan, stafnya ramah, dan saya
                            mendapat rekomendasi yang sesuai dengan kebutuhan kulit.”
                        </blockquote>
                        <div class="bb-reviewer">
                            <img
                                src="https://images.unsplash.com/photo-1524504388940-b1c1722653e1?auto=format&fit=crop&w=120&q=80"
                                alt="Foto pelanggan"
                                loading="lazy"
                            >
                            <div><strong>Michelle R.</strong><small>Skincare enthusiast</small></div>
                        </div>
                    </article>

                    <article class="bb-testimonial-card">
                        <div class="bb-rating">★★★★★</div>
                        <blockquote>
                            “Suasananya cantik dan bikin rileks. Saya suka karena
                            bisa berdiskusi dahulu sebelum memilih treatment.”
                        </blockquote>
                        <div class="bb-reviewer">
                            <img
                                src="https://images.unsplash.com/photo-1508214751196-bcfd4ca60f91?auto=format&fit=crop&w=120&q=80"
                                alt="Foto pelanggan"
                                loading="lazy"
                            >
                            <div><strong>Clara M.</strong><small>Beauty care client</small></div>
                        </div>
                    </article>
                </div>
            </div>
            <p class="bb-disclaimer bb-container">
                *Testimoni di atas adalah contoh teks untuk preview template.
            </p>
        </section>

        <!-- Booking -->
        <section class="bb-section bb-booking" id="booking">
            <div class="bb-container bb-booking-grid">
                <div class="bb-booking-copy">
                    <span class="bb-section-label">LET'S TALK ABOUT YOUR SKIN</span>
                    <h2>Ready for your<br><span>glow era?</span></h2>
                    <p>
                        Isi detail berikut untuk menyiapkan pesan booking.
                        Tim kami dapat membantu mengonfirmasi jadwal dan treatment pilihanmu.
                    </p>

                    <div class="bb-booking-contact">
                        <span class="bb-contact-icon">✳</span>
                        <div>
                            <strong>Prefer chatting?</strong>
                            <p>Hubungi kami melalui WhatsApp untuk informasi dan reservasi.</p>
                            <a href="https://wa.me/6281234567890"
                                class="bb-text-link" target="_blank" rel="noopener">
                                Chat on WhatsApp ↗
                            </a>
                        </div>
                    </div>
                </div>

                <form class="bb-booking-form" id="bbBookingForm">
                    <div class="bb-form-heading">
                        <span>✳ YOUR NEXT SELF-CARE DAY</span>
                        <h3>Book an appointment</h3>
                        <p>Lengkapi detail di bawah ini.</p>
                    </div>

                    <div class="bb-form-row">
                        <div class="bb-form-group">
                            <label for="bbName">Nama lengkap</label>
                            <input type="text" id="bbName" name="name"
                                placeholder="Nama kamu" required>
                        </div>
                        <div class="bb-form-group">
                            <label for="bbPhone">Nomor WhatsApp</label>
                            <input type="tel" id="bbPhone" name="phone"
                                placeholder="08xxxxxxxxxx" required>
                        </div>
                    </div>

                    <div class="bb-form-group">
                        <label for="bbTreatment">Pilih treatment</label>
                        <select id="bbTreatment" name="treatment" required>
                            <option value="">Pilih layanan</option>
                            <option>Signature Facial</option>
                            <option>Glow Facial</option>
                            <option>Skin Consultation</option>
                            <option>Fresh Start</option>
                            <option>Glow Routine</option>
                            <option>Skin Journey</option>
                        </select>
                    </div>

                    <div class="bb-form-row">
                        <div class="bb-form-group">
                            <label for="bbDate">Tanggal pilihan</label>
                            <input type="date" id="bbDate" name="date" required>
                        </div>
                        <div class="bb-form-group">
                            <label for="bbTime">Waktu pilihan</label>
                            <select id="bbTime" name="time" required>
                                <option value="">Pilih waktu</option>
                                <option>10.00–12.00</option>
                                <option>12.00–14.00</option>
                                <option>14.00–16.00</option>
                                <option>16.00–18.00</option>
                            </select>
                        </div>
                    </div>

                    <div class="bb-form-group">
                        <label for="bbNotes">Catatan (opsional)</label>
                        <textarea id="bbNotes" name="notes" rows="3"
                            placeholder="Ceritakan kebutuhan kulitmu..."></textarea>
                    </div>

                    <button type="submit" class="bb-button bb-button-primary bb-button-full">
                        Continue via WhatsApp <span>↗</span>
                    </button>
                    <small class="bb-form-note">
                        Permintaan jadwal akan dikirim melalui WhatsApp untuk konfirmasi.
                    </small>
                </form>
            </div>
        </section>

        <!-- Social media -->
        <section class="bb-social">
            <div class="bb-container bb-social-heading">
                <div>
                    <span class="bb-section-label">LET'S BE BEAUTY FRIENDS</span>
                    <h2>Stay in your <span>glow era.</span></h2>
                </div>
                <a href="https://www.instagram.com/" target="_blank" rel="noopener"
                    class="bb-text-link">@boldbeauty.clinic ↗</a>
            </div>

            <div class="bb-social-grid">
                <a href="https://www.instagram.com/" target="_blank" rel="noopener" aria-label="Instagram Bold Beauty">
                    <img src="https://images.unsplash.com/photo-1608248543803-ba4f8c70ae0b?auto=format&fit=crop&w=500&q=80" alt="Inspirasi skincare" loading="lazy">
                    <span>↗</span>
                </a>
                <a href="https://www.instagram.com/" target="_blank" rel="noopener" aria-label="Instagram Bold Beauty">
                    <img src="https://images.unsplash.com/photo-1556229010-6c3f2c9ca5f8?auto=format&fit=crop&w=500&q=80" alt="Produk kecantikan" loading="lazy">
                    <span>↗</span>
                </a>
                <a href="https://www.instagram.com/" target="_blank" rel="noopener" aria-label="Instagram Bold Beauty">
                    <img src="https://images.unsplash.com/photo-1598440947619-2c35fc9aa908?auto=format&fit=crop&w=500&q=80" alt="Beauty routine" loading="lazy">
                    <span>↗</span>
                </a>
                <a href="https://www.instagram.com/" target="_blank" rel="noopener" aria-label="Instagram Bold Beauty">
                    <img src="https://images.unsplash.com/photo-1570172619644-dfd03ed5d881?auto=format&fit=crop&w=500&q=80" alt="Facial treatment" loading="lazy">
                    <span>↗</span>
                </a>
                <a href="https://www.instagram.com/" target="_blank" rel="noopener" aria-label="Instagram Bold Beauty">
                    <img src="https://images.unsplash.com/photo-1601049541289-9b1b7bbbfe19?auto=format&fit=crop&w=500&q=80" alt="Skincare collection" loading="lazy">
                    <span>↗</span>
                </a>
            </div>
        </section>
    </main>

    <!-- AI BEAUTY FAQ -->
<section class="bb-ai-faq" id="ai-faq">
    <div class="bb-container bb-ai-grid">

        <div class="bb-ai-intro">
            <span class="bb-section-label">YOUR PERSONAL BEAUTY ASSISTANT</span>

            <h2>
                Ask us anything,<br>
                <span>beauty lover.</span>
            </h2>

            <p>
                Bingung memilih treatment atau produk skincare?
                Beauty Assistant siap membantu menemukan informasi
                yang kamu butuhkan.
            </p>

            <div class="bb-ai-benefits">
                <div>
                    <span class="bb-ai-check">✓</span>
                    Informasi layanan dan treatment
                </div>
                <div>
                    <span class="bb-ai-check">✓</span>
                    Panduan harga dan booking
                </div>
                <div>
                    <span class="bb-ai-check">✓</span>
                    Rekomendasi informasi skincare
                </div>
            </div>

            <div class="bb-ai-note">
                <span>✦</span>
                <p>Assistant virtual untuk membantu menjawab pertanyaan umum.</p>
            </div>
        </div>

        <div class="bb-ai-chat">
            <div class="bb-ai-chat-header">
                <div class="bb-ai-avatar">✦</div>

                <div class="bb-ai-profile">
                    <strong>Beauty Assistant</strong>
                    <span>
                        <i></i>
                        Virtual assistant
                    </span>
                </div>

                <span class="bb-ai-header-label">AI FAQ</span>
            </div>

            <div class="bb-ai-messages" id="bbAiMessages" aria-live="polite">
                <div class="bb-ai-message bb-ai-bot">
                    <span class="bb-ai-message-avatar">✦</span>
                    <div class="bb-ai-bubble">
                        <strong>Hi, beauty lover! ♡</strong>
                        <p>
                            Selamat datang! Ada yang ingin kamu ketahui
                            tentang treatment, skincare, atau booking?
                            Aku siap membantu.
                        </p>
                    </div>
                </div>
            </div>

            <div class="bb-ai-suggestions">
                <span>ASK ME ABOUT</span>

                <div class="bb-ai-suggestion-list">
                    <button type="button" data-ai-question="Apa saja treatment yang tersedia?">
                        ✧ Daftar treatment
                    </button>

                    <button type="button" data-ai-question="Berapa harga treatment?">
                        ♡ Harga treatment
                    </button>

                    <button type="button" data-ai-question="Bagaimana cara booking appointment?">
                        ↗ Cara booking
                    </button>

                    <button type="button" data-ai-question="Bagaimana memilih skincare yang tepat?">
                        ✦ Tips skincare
                    </button>
                </div>
            </div>

            <form class="bb-ai-input-area" id="bbAiForm">
                <label class="bb-ai-sr-only" for="bbAiInput">
                    Tulis pertanyaan
                </label>

                <input
                    type="text"
                    id="bbAiInput"
                    placeholder="Tanyakan sesuatu..."
                    autocomplete="off"
                    maxlength="500"
                    required
                >

                <button type="submit" aria-label="Kirim pertanyaan">
                    ↑
                </button>
            </form>

            <p class="bb-ai-disclaimer">
                Informasi umum saja. Konsultasikan kebutuhan medis
                atau kondisi kulit dengan tenaga profesional.
            </p>
        </div>
    </div>
</section>

    <!-- Footer -->
    <footer class="bb-footer">
        <div class="bb-container bb-footer-main">
            <div class="bb-footer-brand">
                <a href="#home" class="bb-logo">
                    <span class="bb-logo-icon">B.</span>
                    <span class="bb-logo-text">
                        <strong>bold beauty</strong>
                        <small>SKINCARE & AESTHETIC CLINIC</small>
                    </span>
                </a>
                <p>Your beauty, your power. Ruang untuk merawat kulit dan mencintai diri sendiri.</p>
            </div>

            <div class="bb-footer-column">
                <strong>Explore</strong>
                <a href="#about">About Us</a>
                <a href="#treatments">Treatments</a>
                <a href="#products">Products</a>
                <a href="#pricing">Pricing</a>
            </div>

            <div class="bb-footer-column">
                <strong>Get in touch</strong>
                <a href="#booking">Book Appointment</a>
                <a href="https://wa.me/6281234567890" target="_blank" rel="noopener">WhatsApp</a>
                <a href="https://www.instagram.com/" target="_blank" rel="noopener">Instagram</a>
                <a href="https://www.tiktok.com/" target="_blank" rel="noopener">TikTok</a>
            </div>

            <div class="bb-footer-column">
                <strong>Visit us</strong>
                <p>Alamat klinik kamu<br>Kota, Indonesia</p>
                <p>Senin–Sabtu<br>09.00–18.00 WIB</p>
            </div>
        </div>

        <div class="bb-container bb-footer-bottom">
            <span>© {{ date('Y') }} Bold Beauty. All rights reserved.</span>
            <span>Made with love & a little pink ✳</span>
        </div>
    </footer>

    <a href="https://wa.me/6281234567890"
        class="bb-whatsapp-float" target="_blank" rel="noopener"
        aria-label="Hubungi Bold Beauty melalui WhatsApp">
        <span>✆</span> Chat with us
    </a>

</body>
</html>
