<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="theme-color" content="#f6fafd">
    <title>Restoran Azura — Hidangan Klasik</title>
    <meta name="description"
        content="Restoran Azura menyajikan hidangan klasik dengan bahan segar, suasana hangat, dan reservasi mudah.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600;700&family=Lato:wght@400;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet"
        href="{{ asset('css/website-bisnis/templates/fnb/restaurant/restoran-azura.css') }}">
</head>

<body class="azura-template{{ request()->boolean('preview') ? ' webia-hero-preview-mode' : '' }}">
    <svg class="azura-symbols" width="0" height="0" aria-hidden="true" focusable="false">
        <defs>
            <symbol id="azura-soup" viewBox="0 0 200 200">
                <ellipse cx="100" cy="170" rx="70" ry="9" fill="#1d3557" opacity=".12" />
                <path d="M30 95h140a70 62 0 0 1-140 0z" fill="#fff" stroke="#1d3557" stroke-width="4" />
                <ellipse cx="100" cy="95" rx="70" ry="14" fill="#e9a23b" stroke="#1d3557" stroke-width="4" />
                <circle cx="80" cy="92" r="8" fill="#c0392b" />
                <circle cx="112" cy="97" r="7" fill="#6aa84f" />
                <circle cx="130" cy="91" r="6" fill="#fff3c4" />
                <path d="M80 70c-8-10 8-14 0-26M105 68c-8-10 8-14 0-26M128 70c-8-10 8-14 0-26"
                    fill="none" stroke="#7fa9cc" stroke-width="4" stroke-linecap="round" />
            </symbol>
            <symbol id="azura-steak" viewBox="0 0 200 200">
                <ellipse cx="100" cy="100" rx="86" ry="86" fill="#fff" stroke="#1d3557" stroke-width="4" />
                <circle cx="100" cy="100" r="62" fill="none" stroke="#a9d3f0" stroke-width="3" />
                <path d="M52 98c-6-30 30-42 62-36 34 6 40 40 22 56-22 20-78 14-84-20z"
                    fill="#8a4b2d" stroke="#1d3557" stroke-width="4" />
                <path d="M70 90q30-16 52 0M68 106q34-10 58 4" stroke="#5c2f1a" stroke-width="4"
                    fill="none" stroke-linecap="round" />
                <circle cx="148" cy="70" r="10" fill="#6aa84f" />
                <circle cx="58" cy="140" r="9" fill="#f4c542" />
            </symbol>
            <symbol id="azura-pasta" viewBox="0 0 200 200">
                <ellipse cx="100" cy="100" rx="86" ry="86" fill="#fff" stroke="#1d3557" stroke-width="4" />
                <path d="M45 105c0-34 30-52 56-52s54 18 54 52c0 18-24 32-54 32s-56-14-56-32z"
                    fill="#f2c96b" stroke="#1d3557" stroke-width="4" />
                <path d="M60 95c20-20 60-20 80 0M62 112c22-14 54-14 76 0M76 80c14-8 34-8 48 0"
                    fill="none" stroke="#d99a2b" stroke-width="4" stroke-linecap="round" />
                <circle cx="100" cy="86" r="12" fill="#c0392b" />
                <circle cx="82" cy="104" r="8" fill="#c0392b" />
                <path d="m118 98 8-6 6 8-8 6z" fill="#6aa84f" />
            </symbol>
            <symbol id="azura-cake" viewBox="0 0 200 200">
                <ellipse cx="100" cy="164" rx="76" ry="10" fill="#1d3557" opacity=".12" />
                <path d="M42 98h116v56a58 10 0 0 1-116 0z" fill="#f6d9b0" stroke="#1d3557"
                    stroke-width="4" />
                <path d="M42 98a58 16 0 0 1 116 0c-6 14-18 8-24 18-6-10-18-4-24 8-6-12-18-6-24 6-6-12-26-4-44-32z"
                    fill="#7b4a2e" stroke="#1d3557" stroke-width="4" />
                <circle cx="100" cy="66" r="14" fill="#c0392b" stroke="#1d3557" stroke-width="4" />
                <path d="M100 52c0-10 6-14 12-16" stroke="#3d7a35" stroke-width="4" fill="none"
                    stroke-linecap="round" />
            </symbol>
        </defs>
    </svg>

    <header class="azura-header">
        <div class="wrap nav">
            <a href="#top" class="logo" aria-label="Restoran Azura">
                <svg viewBox="0 0 40 40" fill="none" stroke="currentColor" stroke-width="2.4"
                    stroke-linecap="round" aria-hidden="true">
                    <circle cx="20" cy="20" r="17" />
                    <path d="M13 10v8a3 3 0 0 0 6 0v-8M16 10v22M27 10c-4 4-4 12 0 14v8" />
                </svg>
                Restoran Azura
            </a>
            <nav aria-label="Navigasi utama">
                <ul id="menu">
                    <li><a href="#beranda">Beranda</a></li>
                    <li><a href="#keunggulan">Keunggulan</a></li>
                    <li><a href="#menu-favorit">Menu</a></li>
                    <li><a href="#faq">FAQ</a></li>
                    <li><a href="#kontak">Kontak</a></li>
                </ul>
            </nav>
            <a class="btn" href="#kontak">Reservasi Meja</a>
            <button class="burger" type="button" aria-label="Buka menu" aria-expanded="false"
                aria-controls="menu" id="burger">☰</button>
        </div>
    </header>

    <main id="top">
        <div class="hero" id="beranda">
            <div class="wrap">
                <div>
                    <h1>Hidangan klasik, meja yang hangat</h1>
                    <p>Sejak 1998, Restoran Azura menyajikan masakan rumahan bergaya Eropa dan Nusantara dengan bahan
                        segar pilihan, di ruang bernuansa biru langit yang tenang.</p>
                    <div class="cta">
                        <a class="btn" href="#kontak">Pesan Meja 🍽️</a>
                        <a class="btn ghost" href="#menu-favorit">Lihat Menu</a>
                    </div>
                    <div class="stats">
                        <div><b>25+</b>tahun berdiri</div>
                        <div><b>60</b>pilihan menu</div>
                        <div><b>4,9★</b>ulasan tamu</div>
                    </div>
                </div>
                <div class="arch">
                    <svg viewBox="0 0 400 500" role="img" aria-label="Ilustrasi meja makan">
                        <rect width="400" height="500" fill="#a9d3f0" />
                        <circle cx="200" cy="170" r="90" fill="#d6eaf8" />
                        <path d="M150 60h100M150 80h100" stroke="#fff" stroke-width="3" opacity=".7" />
                        <rect y="330" width="400" height="170" fill="#fff" />
                        <path d="M0 330h400" stroke="#1d3557" stroke-width="3" />
                        <g stroke="#a9d3f0" stroke-width="2">
                            <path d="M0 370h400M0 420h400M0 470h400" />
                        </g>
                        <ellipse cx="200" cy="420" rx="130" ry="26" fill="#1d3557" opacity=".1" />
                        <use href="#azura-pasta" x="95" y="250" width="210" height="210" />
                        <g stroke="#1d3557" stroke-width="4" stroke-linecap="round" fill="none">
                            <path d="M60 360v80M50 360v22a10 10 0 0 0 20 0v-22" />
                            <path d="M340 360v80M340 360c-14 8-14 30 0 36" />
                        </g>
                        <g transform="translate(300 235)">
                            <path d="M0 0h34l-4 52a13 13 0 0 1-26 0z" fill="#fff" stroke="#1d3557"
                                stroke-width="3" />
                            <path d="M4 22h26l-2 30a11 11 0 0 1-22 0z" fill="#c0392b" opacity=".85" />
                            <path d="M17 66v26M6 92h22" stroke="#1d3557" stroke-width="3"
                                stroke-linecap="round" />
                        </g>
                        <g transform="translate(46 262)">
                            <rect x="8" y="30" width="26" height="40" rx="4" fill="#f6d9b0" stroke="#1d3557"
                                stroke-width="3" />
                            <path d="M21 30c-6-10 6-14 0-24" stroke="#1d3557" stroke-width="3" fill="none"
                                stroke-linecap="round" />
                            <path d="M21 30c2-8 10-10 14-8" stroke="#3d7a35" stroke-width="3" fill="none" />
                        </g>
                    </svg>
                    <div class="badge">🌿 Bahan segar, dimasak setiap hari</div>
                </div>
            </div>
        </div>

        <section id="keunggulan">
            <div class="wrap">
                <div class="title">
                    <div class="orn">✦</div>
                    <h2>Mengapa tamu kembali lagi</h2>
                    <p>Detail kecil yang membuat makan malam terasa istimewa.</p>
                </div>
                <div class="feat">
                    <div><i>👨‍🍳</i><h3>Chef berpengalaman</h3><p>Resep klasik diracik langsung dari dapur terbuka kami.</p></div>
                    <div><i>🥖</i><h3>Roti panggang harian</h3><p>Dipanggang setiap pagi dan disajikan hangat.</p></div>
                    <div><i>🍷</i><h3>Minuman pilihan</h3><p>Teh, kopi, dan mocktail segar yang menemani hidangan.</p></div>
                    <div><i>🕯️</i><h3>Suasana hangat</h3><p>Cocok untuk keluarga, kencan, atau rapat kecil.</p></div>
                </div>
            </div>
        </section>

        <section id="menu-favorit" class="menu-section">
            <div class="wrap">
                <div class="title">
                    <div class="orn">✦</div>
                    <h2>Menu favorit kami</h2>
                    <p>Empat hidangan yang paling sering dipesan minggu ini.</p>
                </div>
                <div class="menu">
                    <article class="card">
                        <div class="img"><svg viewBox="0 0 200 200" aria-hidden="true"><use href="#azura-soup" /></svg></div>
                        <div class="body"><h3>Sup Krim Jamur</h3><p>Jamur champignon, krim segar, dan roti bawang panggang.</p>
                            <div class="price">Rp 42.000<button class="add" type="button" data-n="Sup Krim Jamur">Pilih</button></div>
                        </div>
                    </article>
                    <article class="card">
                        <div class="img"><svg viewBox="0 0 200 200" aria-hidden="true"><use href="#azura-steak" /></svg></div>
                        <div class="body"><h3>Tenderloin Steak</h3><p>Daging sapi 200 g, saus lada hitam, kentang dan buncis.</p>
                            <div class="price">Rp 135.000<button class="add" type="button" data-n="Tenderloin Steak">Pilih</button></div>
                        </div>
                    </article>
                    <article class="card">
                        <div class="img"><svg viewBox="0 0 200 200" aria-hidden="true"><use href="#azura-pasta" /></svg></div>
                        <div class="body"><h3>Spaghetti Bolognese</h3><p>Saus tomat daging sapi yang dimasak pelan selama empat jam.</p>
                            <div class="price">Rp 68.000<button class="add" type="button" data-n="Spaghetti Bolognese">Pilih</button></div>
                        </div>
                    </article>
                    <article class="card">
                        <div class="img"><svg viewBox="0 0 200 200" aria-hidden="true"><use href="#azura-cake" /></svg></div>
                        <div class="body"><h3>Choco Cherry Cake</h3><p>Kue cokelat lembut dengan ceri dan krim vanila.</p>
                            <div class="price">Rp 38.000<button class="add" type="button" data-n="Choco Cherry Cake">Pilih</button></div>
                        </div>
                    </article>
                </div>
            </div>
        </section>

        <section class="quote">
            <div class="wrap">
                <blockquote>“Rasanya seperti makan di rumah nenek, hanya saja dengan taplak yang jauh lebih rapi.”</blockquote>
                <small>Rina A., tamu langganan sejak 2015</small>
            </div>
        </section>

        <section id="faq">
            <div class="wrap">
                <div class="title"><div class="orn">✦</div><h2>Pertanyaan yang sering diajukan</h2></div>
                <div class="faq">
                    <details open><summary>Jam buka restoran?</summary><p>Setiap hari pukul 10.00–22.00 WIB. Dapur menerima pesanan terakhir pukul 21.15.</p></details>
                    <details><summary>Apakah perlu reservasi?</summary><p>Disarankan untuk akhir pekan dan rombongan lebih dari 6 orang. Reservasi bisa lewat tombol WhatsApp di pojok layar.</p></details>
                    <details><summary>Apakah makanan halal?</summary><p>Ya, seluruh menu kami bersertifikat halal dan tidak menggunakan alkohol.</p></details>
                    <details><summary>Ada pilihan vegetarian?</summary><p>Ada. Sup krim jamur, pasta aglio olio, dan salad kebun adalah pilihan favorit tamu vegetarian.</p></details>
                    <details><summary>Bisa pesan antar atau acara privat?</summary><p>Bisa. Kami melayani pesan antar dalam kota dan ruang privat untuk 10–30 tamu. Hubungi kami untuk paket dan harga.</p></details>
                </div>
            </div>
        </section>
    </main>

    <footer id="kontak">
        <div class="wrap">
            <div class="fgrid">
                <div><a href="#top" class="logo footer-logo">Restoran Azura</a><p>Restoran klasik dengan hidangan hangat dan suasana biru langit yang menenangkan.</p></div>
                <div><h3>Kunjungi kami</h3><ul><li>📍 Jl. Raya Darmo No. 88, Surabaya</li><li>🕙 Setiap hari, 10.00–22.00</li><li>📞 +62 812-3456-7890</li><li>✉️ halo@restoranazura.id</li></ul></div>
                <div><h3>Tautan</h3><ul><li><a href="#menu-favorit">Menu favorit</a></li><li><a href="#faq">FAQ</a></li><li><a href="https://wa.me/6281234567890" target="_blank" rel="noopener noreferrer">Reservasi via WhatsApp</a></li></ul></div>
            </div>
            <div class="copy">© 2026 Restoran Azura. Semua hak dilindungi.</div>
        </div>
    </footer>
    <div class="credit">Website template by <b>WEBIA</b></div>

    <div class="chat" id="chat" role="dialog" aria-label="Asisten AI Azura" aria-modal="false">
        <header><span>Asisten Azura</span><button type="button" id="x" aria-label="Tutup">×</button></header>
        <div id="log" aria-live="polite"><div class="m b">Halo! Saya asisten Azura. Mau tanya menu, jam buka, atau reservasi? 😊</div></div>
        <div class="qs"><button type="button">Menu rekomendasi</button><button type="button">Jam buka</button><button type="button">Reservasi</button><button type="button">Vegetarian</button></div>
        <form id="f"><input id="q" placeholder="Tulis pertanyaan…" autocomplete="off" aria-label="Pertanyaan"><button type="submit">Kirim</button></form>
    </div>
    <button class="fab ai" type="button" id="aib" aria-label="Buka asisten AI" aria-controls="chat">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
            stroke-linejoin="round" aria-hidden="true">
            <path d="M12 3l1.8 4.7L18.5 9.5l-4.7 1.8L12 16l-1.8-4.7L5.5 9.5l4.7-1.8z" />
            <path d="M19 15l.8 2.2L22 18l-2.2.8L19 21l-.8-2.2L16 18l2.2-.8z" />
        </svg>
    </button>
    <a class="fab wa" href="https://wa.me/6281234567890?text=Halo%20Restoran%20Azura%2C%20saya%20ingin%20reservasi%20meja."
        target="_blank" rel="noopener noreferrer" aria-label="Chat WhatsApp">
        <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
            <path d="M12 2a10 10 0 0 0-8.6 15.1L2 22l5-1.3A10 10 0 1 0 12 2zm5.2 14c-.2.6-1.3 1.2-1.8 1.2-.5.1-1 .2-3.3-.7-2.8-1.2-4.6-4-4.7-4.2-.1-.2-1.1-1.5-1.1-2.8s.7-2 1-2.3c.2-.3.5-.3.7-.3h.5c.2 0 .4 0 .6.5l.8 2c.1.2.1.4 0 .6l-.4.6c-.1.2-.3.3-.1.6.2.3.8 1.3 1.7 2.1 1.1 1 2.1 1.3 2.4 1.5.3.1.5.1.6-.1l.9-1.1c.2-.3.4-.2.6-.1l1.9.9c.3.1.5.2.5.3.1.2.1.8-.1 1.4z" />
        </svg>
    </a>

    <script src="{{ asset('js/website-bisnis/templates/fnb/restaurant/restoran-azura.js') }}" defer></script>
</body>

</html>
