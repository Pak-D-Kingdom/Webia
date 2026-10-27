<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Little Corner — Good Coffee, Good Mood</title>

    <meta name="description"
          content="Nikmati kopi pilihan, fresh bakery, promo spesial, dan suasana nyaman di Little Corner Cafe. Lihat menu, jam buka, lokasi, dan reservasi meja.">

    <link rel="stylesheet"
          href="{{ asset('css/website-bisnis/templates/fnb/restaurant/little-corner.css') }}">
</head>
<body>

    {{-- NAVBAR --}}
    <header class="lc-navbar">
        <a href="#home" class="lc-logo">little<span>corner.</span></a>

        <nav>
            <a href="#home">Home</a>
            
            <a href="#about">About</a>
            <a href="#menu">Menu</a>
            <a href="#promo">Promo</a>
            <a href="#location">Location</a>
            <a href="#faq">FAQ</a>
        </nav>

        <a href="#reservation" class="lc-nav-button">
            Book a Table ↗
        </a>
    </header>

    <main>

        {{-- HERO --}}
        <section class="lc-hero" id="home">
            <div class="lc-hero-content">
                <span class="lc-eyebrow">YOUR DAILY HAPPY PLACE</span>

                <h1>Good coffee.<br>Good mood.</h1>

                <p>
                    A little pause, a little coffee, and a lot of happiness.
                    Temukan tempat favoritmu untuk menikmati setiap momen.
                </p>

                <div class="lc-actions">
                    <a href="#menu" class="lc-primary">
                        Discover Our Menu ↗
                    </a>

                    <a href="#about" class="lc-secondary">
                        Our Story
                    </a>
                </div>

                <div class="lc-note">
                    Freshly brewed · Made with love
                </div>
            </div>

            <div class="lc-hero-image">
                <img
                    src="https://images.unsplash.com/photo-1442512595331-e89e73853f31?auto=format&fit=crop&w=1100&q=85"
                    alt="Suasana dan racikan kopi di Little Corner Cafe"
                >

                <div class="lc-floating-card">
                    <span>YOUR DAILY RITUAL</span>
                    <strong>Made for slow mornings.</strong>
                </div>
            </div>
        </section>

        {{-- ABOUT --}}
        <section class="lc-about" id="about">
            <span class="lc-eyebrow">A PLACE TO SLOW DOWN</span>

            <h2>More than coffee,<br>a little moment for you.</h2>

            <p>
                Kami percaya hal sederhana bisa membuat hari lebih istimewa.
                Nikmati kopi pilihan, makanan lezat, dan suasana nyaman
                bersama orang-orang tersayang.
            </p>
        </section>

        {{-- MENU / PRODUCT --}}
        <section class="lc-menu" id="menu">
            <span class="lc-eyebrow">MADE FRESH FOR YOU</span>
            <h2>Something delicious awaits.</h2>

            <div class="lc-menu-grid">
                <article>
                    <img
                        src="https://images.unsplash.com/photo-1509042239860-f550ce710b93?auto=format&fit=crop&w=700&q=80"
                        alt="Signature coffee"
                        loading="lazy"
                    >
                    <h3>Signature Coffee</h3>
                    <p>Kopi pilihan untuk menemani harimu.</p>
                    <strong>Mulai Rp18.000</strong>
                </article>

                <article>
                    <img
                        src="https://images.unsplash.com/photo-1509440159596-0249088772ff?auto=format&fit=crop&w=700&q=80"
                        alt="Fresh bakery"
                        loading="lazy"
                    >
                    <h3>Fresh Bakery</h3>
                    <p>Roti dan pastry sebagai teman minum kopi.</p>
                    <strong>Mulai Rp15.000</strong>
                </article>

                <article>
                    <img
                        src="https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?auto=format&fit=crop&w=700&q=80"
                        alt="Daily coffee favorites"
                        loading="lazy"
                    >
                    <h3>Daily Favorites</h3>
                    <p>Temukan menu favoritmu berikutnya.</p>
                    <strong>Mulai Rp20.000</strong>
                </article>
            </div>

            <a href="#reservation" class="lc-primary">
                Order or Reserve ↗
            </a>
        </section>

        {{-- PROMO --}}
        <section class="lc-promo" id="promo">
            <span class="lc-eyebrow">A LITTLE TREAT FOR YOU</span>

            <h2>Good coffee, better deals.</h2>

            <p>
                Nikmati penawaran spesial dari Little Corner
                dan buat waktu santaimu semakin menyenangkan.
            </p>

            <div class="lc-promo-card">
                <span>WEEKLY SPECIAL</span>
                <h3>Special Coffee Deal</h3>
                <p>
                    Dapatkan promo pilihan untuk menu favoritmu.
                    Hubungi kami untuk informasi promo terbaru.
                </p>

                <a href="https://wa.me/6281234567890"
                   target="_blank"
                   rel="noopener noreferrer">
                    Tanya Promo ↗
                </a>
            </div>
        </section>

        {{-- OPENING HOURS --}}
        <section class="lc-hours" id="hours">
            <span class="lc-eyebrow">COME VISIT US</span>

            <h2>Your coffee break starts here.</h2>

            <p>Catat jam operasional kami sebelum berkunjung.</p>

            <div class="lc-hours-list">
                <p><span>Senin – Jumat</span> <strong>08.00 – 21.00</strong></p>
                <p><span>Sabtu – Minggu</span> <strong>09.00 – 22.00</strong></p>
                <p><span>Hari libur</span> <strong>Hubungi kami</strong></p>
            </div>
        </section>

        {{-- LOCATION --}}
        <section class="lc-location" id="location">
            <span class="lc-eyebrow">FIND YOUR HAPPY PLACE</span>

            <h2>Meet you at Little Corner.</h2>

            <p>
                Kunjungi kami untuk menikmati kopi, makanan,
                dan waktu berkualitas bersama orang terdekat.
            </p>

            <div class="lc-location-details">
                <h3>Little Corner Cafe</h3>
                <p>
                    Jl. Contoh No. 10, Surabaya, Jawa Timur
                </p>

                <a
                    href="https://www.google.com/maps/search/?api=1&query=Little+Corner+Cafe+Surabaya"
                    target="_blank"
                    rel="noopener noreferrer"
                >
                    Get Directions ↗
                </a>
            </div>
        </section>

        {{-- RESERVATION / BOOKING --}}
        <section class="lc-reservation" id="reservation">
            <span class="lc-eyebrow">SAVE YOUR SEAT</span>

            <h2>A table is waiting for you.</h2>

            <p>
                Rencanakan kunjunganmu dan reservasi meja
                melalui WhatsApp dengan mudah.
            </p>

            <form
                class="lc-reservation-form"
                action="https://wa.me/6281234567890"
                method="get"
                target="_blank"
            >
                <label for="guest-name">Nama</label>
                <input
                    type="text"
                    id="guest-name"
                    name="nama"
                    placeholder="Nama kamu"
                    required
                >

                <label for="guest-date">Tanggal Reservasi</label>
                <input
                    type="date"
                    id="guest-date"
                    name="tanggal"
                    required
                >

                <label for="guest-time">Waktu</label>
                <input
                    type="time"
                    id="guest-time"
                    name="waktu"
                    required
                >

                <label for="guest-count">Jumlah Tamu</label>
                <input
                    type="number"
                    id="guest-count"
                    name="jumlah_tamu"
                    min="1"
                    value="2"
                    required
                >

                <button type="submit" class="lc-primary">
                    Reserve via WhatsApp ↗
                </button>
            </form>
        </section>

        {{-- WHATSAPP CONTACT --}}
        <section class="lc-contact" id="contact">
            <span class="lc-eyebrow">LET'S TALK COFFEE</span>

            <h2>Need something? We're here.</h2>

            <p>
                Hubungi kami untuk pertanyaan menu, pesanan,
                reservasi, atau informasi lainnya.
            </p>

            <a
                href="https://wa.me/6281234567890"
                target="_blank"
                rel="noopener noreferrer"
            >
                Chat on WhatsApp ↗
            </a>
        </section>

        {{-- AI FAQ --}}
        <section class="lc-faq" id="faq">
            <span class="lc-eyebrow">HERE TO HELP</span>

            <h2>Frequently asked questions.</h2>

            <p>
                Temukan jawaban cepat seputar menu, jam buka,
                lokasi, reservasi, dan promo Little Corner.
            </p>

            <div class="lc-faq-list">
                <details>
                    <summary>Apa saja menu yang tersedia?</summary>
                    <p>
                        Kami menyediakan kopi pilihan, minuman,
                        fresh bakery, dan menu favorit lainnya.
                        Hubungi kami untuk daftar menu terbaru.
                    </p>
                </details>

                <details>
                    <summary>Jam berapa Little Corner buka?</summary>
                    <p>
                        Senin–Jumat pukul 08.00–21.00 dan
                        Sabtu–Minggu pukul 09.00–22.00.
                        Jadwal dapat berubah pada hari libur.
                    </p>
                </details>

                <details>
                    <summary>Bagaimana cara reservasi meja?</summary>
                    <p>
                        Isi formulir reservasi di halaman ini,
                        lalu lanjutkan komunikasi melalui WhatsApp.
                    </p>
                </details>

                <details>
                    <summary>Apakah ada promo saat ini?</summary>
                    <p>
                        Promo dapat berubah sewaktu-waktu.
                        Hubungi tim kami melalui WhatsApp untuk
                        mengetahui penawaran yang tersedia.
                    </p>
                </details>

                <details>
                    <summary>Di mana lokasi Little Corner?</summary>
                    <p>
                        Lihat bagian Location untuk alamat dan
                        petunjuk arah menuju kafe kami.
                    </p>
                </details>
            </div>

            <div class="lc-ai-assistant">
                <h3>Still have questions?</h3>
                <p>
                    Butuh bantuan lebih lanjut? Hubungi tim kami
                    untuk mendapatkan informasi yang kamu butuhkan.
                </p>

                <a
                    href="https://wa.me/6281234567890?text=Halo%20Little%20Corner%2C%20saya%20ingin%20bertanya."
                    target="_blank"
                    rel="noopener noreferrer"
                >
                    Ask Us on WhatsApp ↗
                </a>
            </div>
        </section>

    </main>

    {{-- FOOTER --}}
    <footer class="lc-footer">
        <a href="#home" class="lc-logo">little<span>corner.</span></a>

        <p>Good coffee. Good mood. Good moments.</p>

        <div class="lc-footer-links">
            <a href="#menu">Menu</a>
            <a href="#promo">Promo</a>
            <a href="#location">Location</a>
            <a href="#reservation">Reservation</a>
            <a href="#faq">FAQ</a>
        </div>

        <small>© {{ date('Y') }} Little Corner Cafe.</small>
    </footer>

</body>
</html>
