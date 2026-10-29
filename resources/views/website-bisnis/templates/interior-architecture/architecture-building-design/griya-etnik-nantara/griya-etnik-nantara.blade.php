<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Griya Etnik Nantara — Arsitektur Jawa & Nusantara</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts: Cinzel, Playfair Display, Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500;700;800;900&family=Playfair+Display:ital,wght@0,600;0,700;0,800;1,400&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <!-- FontAwesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        teak: {
                            50: '#FDFBF7',
                            100: '#F5EFE6',
                            200: '#E8D8C8',
                            300: '#D2B49A',
                            400: '#A67B5B',
                            500: '#6F4E37',
                            600: '#523A28',
                            700: '#3E2718',
                            800: '#2C1A11', // Deep Teak Wood
                            900: '#1C100B',
                            950: '#110906',
                        },
                        terracotta: {
                            400: '#C25943',
                            500: '#A03A2B', // Terracotta Brick
                            600: '#83281B',
                        },
                        keratonGold: {
                            400: '#E5C365',
                            500: '#D4AF37', // Royal Gold
                            600: '#B89327',
                        },
                        mossEarth: '#3D4A3E',
                    },
                    fontFamily: {
                        royal: ['Cinzel', 'serif'],
                        serif: ['Playfair Display', 'serif'],
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                    },
                }
            }
        }
    </script>

    <style>
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #2C1A11;
        }

        ::-webkit-scrollbar-thumb {
            background: #D4AF37;
            border-radius: 4px;
        }

        /* SVG Batik Parang Overlay Pattern */
        .bg-batik-parang {
            background-color: #2C1A11;
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23d4af37' fill-opacity='0.07' fill-rule='evenodd'%3E%3Cpath d='M30 30L0 0h30l30 30H30zM0 30l30 30H0V30z'/%3E%3C/g%3E%3C/svg%3E");
        }

        /* SVG Batik Kawung Light Pattern */
        .bg-batik-kawung-light {
            background-color: #FDFBF7;
            background-image: url("data:image/svg+xml,%3Csvg width='40' height='40' viewBox='0 0 40 40' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%233e2718' fill-opacity='0.04'%3E%3Ccircle cx='20' cy='0' r='12'/%3E%3Ccircle cx='20' cy='40' r='12'/%3E%3Ccircle cx='0' cy='20' r='12'/%3E%3Ccircle cx='40' cy='20' r='12'/%3E%3C/g%3E%3C/svg%3E");
        }

        .gold-border-glow {
            border: 1px solid rgba(212, 175, 55, 0.4);
            box-shadow: 0 0 15px rgba(212, 175, 55, 0.15);
        }

        .wood-card-shadow {
            box-shadow: 0 12px 30px -5px rgba(28, 16, 11, 0.4);
        }

        .text-gold-gradient {
            background: linear-gradient(135deg, #FFE89C 0%, #D4AF37 50%, #9E7D20 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Wayang Gunungan Shape Outline Mask Effect */
        .gunungan-mask {
            clip-path: polygon(50% 0%, 100% 70%, 85% 100%, 15% 100%, 0% 70%);
        }
    </style>
    <!-- Custom WEBIA stylesheet: wajib dimuat agar layout batik, grid kartu, hero, dan tombol floating aktif -->
    <link rel="stylesheet"
        href="{{ asset('css/website-bisnis/templates/interior-architecture/architecture-building-design/griya-etnik-nantara/griya-etnik-nantara.css') }}?v=99">


</head>

<body
    class="bg-teak-50 text-teak-900 font-sans antialiased selection:bg-keratonGold-500 selection:text-teak-950 transition-colors duration-300">

    <!-- TOPBAR ANNOUNCEMENT & CONTACT -->
    <div class="bg-teak-950 text-teak-200 text-xs py-2 px-4 border-b border-keratonGold-500/30 relative z-50">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center gap-2">
            <div class="flex items-center space-x-4 text-center md:text-left">
                <span
                    class="bg-keratonGold-500 text-teak-950 font-bold px-2 py-0.5 rounded text-[10px] uppercase tracking-widest flex items-center gap-1">
                    <i class="fa-solid fa-crown text-[9px]"></i> <span data-i18n="topbar_badge">SPESIALIS JOGLO &
                        LIMASAN</span>
                </span>
                <span class="text-teak-300 hidden sm:inline" data-i18n="topbar_area">Wilayah Layanan: Jogja, Solo, Bali,
                    Jabodetabek & Seluruh Indonesia</span>
            </div>

            <div class="flex items-center space-x-4">
                <a href="tel:+6281234567890" class="hover:text-keratonGold-400 transition flex items-center gap-1">
                    <i class="fa-solid fa-phone text-keratonGold-500"></i> <span>+62 812-3456-7890</span>
                </a>
                <span class="text-teak-700">|</span>
                <!-- Dual Language Switcher -->
            </div>
        </div>
    </div>

    <!-- NAVBAR WITH GEBYOK MOTIF -->
    <header
        class="sticky top-0 z-40 bg-teak-900/95 backdrop-blur-md text-white border-b border-keratonGold-500/40 shadow-xl">
        <nav class="max-w-7xl mx-auto px-4 sm:px-8 py-3.5 flex items-center justify-between">
            <!-- Brand Logo -->
            <a href="#" class="flex items-center gap-3 group">
                <div
                    class="w-11 h-11 rounded-xl bg-gradient-to-br from-keratonGold-500 to-terracotta-500 flex items-center justify-center text-teak-950 font-royal font-black text-2xl shadow-lg border border-keratonGold-400 group-hover:scale-105 transition-transform">
                    🏛️
                </div>
                <div>
                    <span
                        class="font-royal font-bold text-lg sm:text-xl tracking-wider text-gold-gradient block leading-tight">GRIYA
                        ETNIK NANTARA</span>
                    <span class="text-[9px] tracking-widest text-teak-300 uppercase font-semibold block"
                        data-i18n="nav_subtitle">Arsitektur Rumah Jawa & Etnik Nusantara</span>
                </div>
            </a>

            <!-- Desktop Links -->
            <ul
                class="hidden lg:flex items-center space-x-7 text-xs font-semibold tracking-wider uppercase text-teak-200">
                <li><a href="#about" class="hover:text-keratonGold-400 transition" data-i18n="nav_about">Filosofi</a>
                </li>
                <li><a href="#styles" class="hover:text-keratonGold-400 transition" data-i18n="nav_styles">Gaya
                        Etnik</a></li>
                <li><a href="#gallery" class="hover:text-keratonGold-400 transition" data-i18n="nav_gallery">Galeri &
                        Denah 3D</a></li>
                <li><a href="#materials" class="hover:text-keratonGold-400 transition"
                        data-i18n="nav_materials">Material Kayu Jati</a></li>
                <li><a href="#calculator" class="hover:text-keratonGold-400 transition"
                        data-i18n="nav_calculator">Kalkulator Biaya</a></li>
                <li><a href="#process" class="hover:text-keratonGold-400 transition" data-i18n="nav_process">Alur
                        Kerja</a></li>
                <li><a href="#faq" class="hover:text-keratonGold-400 transition" data-i18n="nav_faq">FAQ</a></li>
            </ul>

            <!-- CTA & Mobile Toggle -->
            <div class="flex items-center space-x-3">
                <a href="#consultation"
                    class="bg-gradient-to-r from-keratonGold-500 to-terracotta-500 hover:from-keratonGold-600 hover:to-terracotta-600 text-teak-950 px-5 py-2.5 rounded-xl font-bold text-xs uppercase tracking-wider shadow-lg transition-all hover:scale-105 hidden sm:inline-block border border-keratonGold-400">
                    <i class="fa-solid fa-scroll mr-1"></i> <span data-i18n="nav_cta">Konsultasi Desain</span>
                </a>
                <button onclick="toggleMobileMenu()"
                    class="lg:hidden w-10 h-10 rounded-xl bg-teak-800 border border-keratonGold-500/40 flex items-center justify-center text-keratonGold-400 focus:outline-none">
                    <i class="fa-solid fa-bars text-lg"></i>
                </button>
            </div>
        </nav>

        <!-- Mobile Drawer -->
        <div id="mobile-menu"
            class="hidden lg:hidden bg-teak-950 border-t border-keratonGold-500/30 px-6 py-6 space-y-4">
            <ul class="flex flex-col space-y-3 text-sm font-semibold uppercase text-teak-200">
                <li><a href="#about" onclick="toggleMobileMenu()" data-i18n="nav_about">Filosofi</a></li>
                <li><a href="#styles" onclick="toggleMobileMenu()" data-i18n="nav_styles">Gaya Etnik</a></li>
                <li><a href="#gallery" onclick="toggleMobileMenu()" data-i18n="nav_gallery">Galeri & Denah 3D</a>
                </li>
                <li><a href="#materials" onclick="toggleMobileMenu()" data-i18n="nav_materials">Material Kayu
                        Jati</a></li>
                <li><a href="#calculator" onclick="toggleMobileMenu()" data-i18n="nav_calculator">Kalkulator
                        Biaya</a></li>
                <li><a href="#process" onclick="toggleMobileMenu()" data-i18n="nav_process">Alur Kerja</a></li>
                <li><a href="#faq" onclick="toggleMobileMenu()" data-i18n="nav_faq">FAQ</a></li>
            </ul>
            <a href="#consultation" onclick="toggleMobileMenu()"
                class="w-full text-center bg-keratonGold-500 text-teak-950 py-3 rounded-xl font-bold block uppercase tracking-wider text-xs">
                Konsultasi Desain
            </a>
        </div>
    </header>

    <!-- HERO BANNER (GRAND JAVANESE PALACE & JOGLO SHOWCASE) -->
    <section
        class="relative bg-batik-parang py-20 lg:py-28 overflow-hidden text-white border-b-4 border-keratonGold-500">
        <div class="max-w-7xl mx-auto px-4 sm:px-8 grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">

            <!-- Left Text Content -->
            <div class="lg:col-span-7 space-y-6">
                <div
                    class="inline-flex items-center gap-2 bg-teak-900/90 border border-keratonGold-500/50 px-4 py-1.5 rounded-full text-xs text-keratonGold-400 font-semibold uppercase tracking-widest">
                    <i class="fa-solid fa-compass-drafting"></i>
                    <span data-i18n="hero_tag">Mahakarya Arsitektur Tradisional Jawa & Nusantara</span>
                </div>

                <h1 class="font-serif text-4xl sm:text-6xl font-bold leading-tight text-white">
                    <span data-i18n="hero_title_1">Keanggunan Rumah</span>
                    <span class="text-gold-gradient block italic font-royal" data-i18n="hero_title_2">Joglo & Limasan
                        Etnik Modern.</span>
                </h1>

                <p class="text-sm sm:text-base text-teak-200 font-light leading-relaxed max-w-2xl"
                    data-i18n="hero_desc">
                    Mewujudkan hunian berjiwa warisan budaya Keraton. Memadukan kemegahan struktur kayu jati ukir ukiran
                    Gebyok Jepara, soko guru kokoh, serta penataan tata ruang modern yang nyaman dan sejuk alami.
                </p>

                <!-- Hero Action Buttons -->
                <div class="flex flex-wrap items-center gap-4 pt-2">
                    <a href="#gallery"
                        class="bg-gradient-to-r from-keratonGold-500 to-terracotta-500 hover:from-keratonGold-600 hover:to-terracotta-600 text-teak-950 font-extrabold px-8 py-4 rounded-xl shadow-2xl transition transform hover:-translate-y-1 flex items-center gap-3 uppercase text-xs tracking-wider">
                        <i class="fa-solid fa-house-chimney-window"></i>
                        <span data-i18n="hero_btn_explore">Lihat Portofolio Karya</span>
                    </a>
                    <a href="#calculator"
                        class="bg-teak-900/80 hover:bg-teak-800 text-teak-100 border border-keratonGold-500/50 font-bold px-6 py-4 rounded-xl transition flex items-center gap-2 text-xs uppercase tracking-wider">
                        <i class="fa-solid fa-calculator text-keratonGold-400"></i>
                        <span data-i18n="hero_btn_calc">Simulasi Biaya Pembangunan</span>
                    </a>
                </div>

                <!-- Heritage Stats Bar -->
                <div class="pt-8 border-t border-teak-800/80 grid grid-cols-3 gap-6 text-center sm:text-left">
                    <div>
                        <div class="font-serif text-2xl sm:text-3xl font-bold text-keratonGold-400">150+</div>
                        <div class="text-[11px] text-teak-300 uppercase tracking-wider" data-i18n="stat_built">Rumah
                            Etnik Terbangun</div>
                    </div>
                    <div>
                        <div class="font-serif text-2xl sm:text-3xl font-bold text-keratonGold-400">100%</div>
                        <div class="text-[11px] text-teak-300 uppercase tracking-wider" data-i18n="stat_wood">Kayu
                            Jati Perhutani</div>
                    </div>
                    <div>
                        <div class="font-serif text-2xl sm:text-3xl font-bold text-keratonGold-400">35 Thn</div>
                        <div class="text-[11px] text-teak-300 uppercase tracking-wider" data-i18n="stat_craft">
                            Pengalaman Empu Ukir</div>
                    </div>
                </div>
            </div>

            <!-- Right Hero Image Showcase -->
            <div class="lg:col-span-5 relative flex justify-center">
                <div
                    class="relative w-full max-w-md rounded-3xl bg-teak-900/90 p-4 border-2 border-keratonGold-500/60 shadow-2xl wood-card-shadow">
                    <div class="relative rounded-2xl overflow-hidden aspect-[4/5] border border-teak-700">
                        <!-- Authentic Traditional Javanese House Image -->
                        <img src="{{ asset('images/griya-etnik-nantara/joglo-hero.jpg') }}"
                            alt="Rumah Joglo Pendopo Jawa Etnik"
                            class="w-full h-full object-cover transform hover:scale-105 transition duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-teak-950 via-transparent to-transparent">
                        </div>

                        <div
                            class="absolute bottom-4 left-4 right-4 p-4 rounded-xl bg-teak-950/90 backdrop-blur-md border border-keratonGold-500/40 text-xs space-y-1">
                            <span class="text-keratonGold-400 font-bold uppercase tracking-widest text-[10px]"
                                data-i18n="hero_card_tag">PROJECT HIGHLIGHT</span>
                            <h3 class="font-serif text-base font-bold text-white">Pendopo Joglo Agung Sleman</h3>
                            <p class="text-teak-300 text-[11px]">Pendopo Pendopo Luas 300m² • Soko Guru 25cm • Ukiran
                                Kudus</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- JAVANESE HERITAGE CATEGORY STRIP -->
    <section class="griya-heritage-strip" aria-label="Kategori arsitektur Jawa">
        <div class="griya-heritage-strip-inner">
            <div class="griya-heritage-stat"><span class="griya-stat-icon">⌂</span><strong>150+</strong><small>Rumah
                    Etnik Terbangun</small></div>
            <div class="griya-heritage-stat"><span
                    class="griya-stat-icon">❧</span><strong>100%</strong><small>Dedikasi Material Pilihan</small></div>
            <div class="griya-heritage-stat"><span class="griya-stat-icon">♙</span><strong>35
                    Thn</strong><small>Pengalaman Empu Ukir</small></div>
            <div class="griya-heritage-quote"><span class="griya-quote-mark">“</span>
                <p>Setiap rumah adalah cerita tentang budaya, alam, dan manusia.</p><small>Tim Griya Etnik
                    Nantara</small>
            </div>
        </div>
    </section>
    <section class="griya-category-band" aria-label="Jelajahi kategori karya">
        <a href="#styles" class="griya-category-tile"><img
                src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&q=85&w=600"
                alt="Inspirasi rumah Joglo"><span class="griya-tile-icon">⌂</span><span><strong>Rumah
                    Joglo</strong><small>Kemegahan klasik dan ruang terbuka</small></span><b>↗</b></a>
        <a href="#styles" class="griya-category-tile"><img
                src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&q=85&w=600"
                alt="Inspirasi rumah Limasan"><span class="griya-tile-icon">⌂</span><span><strong>Rumah
                    Limasan</strong><small>Tradisi yang nyaman untuk masa kini</small></span><b>↗</b></a>
        <a href="#gallery" class="griya-category-tile"><img
                src="https://images.unsplash.com/photo-1510798831971-661eb04b3739?auto=format&fit=crop&q=85&w=600"
                alt="Villa dan resort etnik"><span class="griya-tile-icon">⌂</span><span><strong>Villa & Resort
                    Etnik</strong><small>Suasana alam dan budaya</small></span><b>↗</b></a>
        <a href="#materials" class="griya-category-tile"><img
                src="https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?auto=format&fit=crop&q=85&w=600"
                alt="Interior dan elemen kayu"><span class="griya-tile-icon">✥</span><span><strong>Interior &
                    Gebyok</strong><small>Ukiran tradisional, detail modern</small></span><b>↗</b></a>
        <a href="#gallery" class="griya-category-tile"><img
                src="https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?auto=format&fit=crop&q=85&w=600"
                alt="Bangunan komersial bernuansa alam"><span class="griya-tile-icon">⌂</span><span><strong>Bangunan
                    Komersial</strong><small>Resto, kantor, dan ruang budaya</small></span><b>↗</b></a>
    </section>

    <!-- ARCHITECTURAL STYLES & REGIONAL SHOWCASE -->
    <section id="styles" class="py-20 bg-batik-kawung-light">
        <div class="max-w-7xl mx-auto px-4 sm:px-8 space-y-12">

            <div class="text-center max-w-3xl mx-auto space-y-3">
                <span
                    class="text-xs font-bold uppercase tracking-widest text-terracotta-500 bg-terracotta-50 px-3 py-1 rounded-full border border-terracotta-200"
                    data-i18n="styles_tag">RAGAM ARCHITECTURAL STYLE</span>
                <h2 class="font-serif text-3xl sm:text-5xl font-bold text-teak-950" data-i18n="styles_heading">
                    Kategori Bangunan Etnik Nusantara</h2>
                <p class="text-xs sm:text-sm text-teak-700" data-i18n="styles_sub">Pilihan gaya arsitektur tradisional
                    yang disesuaikan dengan kebutuhan hunian pribadi, villa resort, hingga resto bernuansa budaya.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

                <!-- Category 1: Joglo Keraton -->
                <div
                    class="bg-white rounded-2xl p-5 border border-teak-200 shadow-lg hover:border-keratonGold-500 transition group space-y-4">
                    <div class="h-48 rounded-xl overflow-hidden relative">
                        <img src="https://images.unsplash.com/photo-1540555700478-4be289fbecef?auto=format&fit=crop&q=80&w=600"
                            alt="Joglo Pendopo"
                            class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                        <span
                            class="absolute top-3 left-3 bg-teak-900 text-keratonGold-400 text-[10px] font-bold px-2.5 py-1 rounded-full uppercase">Kategori
                            Hunian Utama</span>
                    </div>
                    <div class="space-y-2">
                        <h3 class="font-serif text-xl font-bold text-teak-950" data-i18n="cat_1_title">Joglo Agung &
                            Pendopo</h3>
                        <p class="text-xs text-teak-700 leading-relaxed" data-i18n="cat_1_desc">
                            Struktur atap tumpang sari megah dengan 4 soko guru utama. Cocok untuk pendopo utama, ruang
                            pertemuan, dan rumah kediaman mewah.
                        </p>
                    </div>
                </div>

                <!-- Category 2: Limasan Etnik Modern -->
                <div
                    class="bg-white rounded-2xl p-5 border border-teak-200 shadow-lg hover:border-keratonGold-500 transition group space-y-4">
                    <div class="h-48 rounded-xl overflow-hidden relative">
                        <img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750?auto=format&fit=crop&q=80&w=600"
                            alt="Limasan Etnik"
                            class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                        <span
                            class="absolute top-3 left-3 bg-teak-900 text-keratonGold-400 text-[10px] font-bold px-2.5 py-1 rounded-full uppercase">Favorit
                            Keluarga</span>
                    </div>
                    <div class="space-y-2">
                        <h3 class="font-serif text-xl font-bold text-teak-950" data-i18n="cat_2_title">Rumah Limasan
                            Jawa</h3>
                        <p class="text-xs text-teak-700 leading-relaxed" data-i18n="cat_2_desc">
                            Desain atap limas yang proporsional, ramah angin, dan sangat ideal dikombinasikan dengan
                            bata ekspos serta dinding kaca modern.
                        </p>
                    </div>
                </div>

                <!-- Category 3: Gladak & Rumah Kayu Antik -->
                <div
                    class="bg-white rounded-2xl p-5 border border-teak-200 shadow-lg hover:border-keratonGold-500 transition group space-y-4">
                    <div class="h-48 rounded-xl overflow-hidden relative">
                        <img src="https://images.unsplash.com/photo-1587061949409-02df41d5e562?auto=format&fit=crop&q=80&w=600"
                            alt="Rumah Gladak"
                            class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                        <span
                            class="absolute top-3 left-3 bg-teak-900 text-keratonGold-400 text-[10px] font-bold px-2.5 py-1 rounded-full uppercase">Knockdown
                            Wooden House</span>
                    </div>
                    <div class="space-y-2">
                        <h3 class="font-serif text-xl font-bold text-teak-950" data-i18n="cat_3_title">Rumah Gladak &
                            Panggung</h3>
                        <p class="text-xs text-teak-700 leading-relaxed" data-i18n="cat_3_desc">
                            Rumah panggung kayu jati antik sistem bongkar pasang (knockdown). Sangat diminati untuk
                            villa kebun, pavilion tamu, dan homestay.
                        </p>
                    </div>
                </div>

                <!-- Category 4: Resort Etnik Bali-Jawa -->
                <div
                    class="bg-white rounded-2xl p-5 border border-teak-200 shadow-lg hover:border-keratonGold-500 transition group space-y-4">
                    <div class="h-48 rounded-xl overflow-hidden relative">
                        <img src="https://images.unsplash.com/photo-1580587771525-78b9dba3b914?auto=format&fit=crop&q=80&w=600"
                            alt="Resort Etnik"
                            class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                        <span
                            class="absolute top-3 left-3 bg-teak-900 text-keratonGold-400 text-[10px] font-bold px-2.5 py-1 rounded-full uppercase">Commercial
                            & Resort</span>
                    </div>
                    <div class="space-y-2">
                        <h3 class="font-serif text-xl font-bold text-teak-950" data-i18n="cat_4_title">Villa Resort &
                            Resto Etnik</h3>
                        <p class="text-xs text-teak-700 leading-relaxed" data-i18n="cat_4_desc">
                            Konsep gabungan arsitektur kayu Nusantara dengan fasilitas kolam renang, taman tropis, dan
                            interior mewah kekinian.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- TRADITIONAL GALLERY & INTERACTIVE 3D FLOOR PLAN VIEWER -->
    <section id="gallery" class="py-20 bg-teak-900 text-white border-y border-keratonGold-500/40">
        <div class="max-w-7xl mx-auto px-4 sm:px-8 space-y-12">

            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
                <div class="space-y-2">
                    <span
                        class="text-xs font-bold uppercase tracking-widest text-keratonGold-400 bg-teak-800 px-3 py-1 rounded-full border border-keratonGold-500/30"
                        data-i18n="gallery_tag">PORTOFOLIO & VISUALISASI 3D</span>
                    <h2 class="font-serif text-3xl sm:text-5xl font-bold text-white" data-i18n="gallery_heading">
                        Galeri Proyek & Layout Denah</h2>
                </div>
                <p class="text-xs sm:text-sm text-teak-300 max-w-md" data-i18n="gallery_sub">Klik pada setiap proyek
                    untuk membuka visualisasi denah tata ruang tradisional (Soko Guru, Pendopo, Dalem) dan render 3D.
                </p>
            </div>

            <!-- Gallery Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                <!-- Project Item 1 -->
                <div class="bg-teak-950 rounded-2xl overflow-hidden border border-teak-800 hover:border-keratonGold-500 transition shadow-xl group cursor-pointer"
                    onclick="openPlanModal('joglo-sleman')">
                    <div class="h-64 overflow-hidden relative">
                        <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&q=80&w=800"
                            alt="Joglo Sleman"
                            class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                        <span
                            class="absolute bottom-3 left-3 bg-teak-900/90 text-keratonGold-400 text-xs px-3 py-1 rounded-full border border-keratonGold-500/40 font-bold">
                            <i class="fa-solid fa-cube mr-1"></i> Open 3D Layout
                        </span>
                    </div>
                    <div class="p-6 space-y-2">
                        <span
                            class="text-[10px] text-terracotta-400 font-bold uppercase tracking-wider block">Yogyakarta
                            • 2025</span>
                        <h3 class="font-serif text-xl font-bold text-white">Joglo Pendopo Agung Sleman</h3>
                        <p class="text-xs text-teak-300 line-clamp-2">Perpaduan Pendopo kayu Jati ukir dengan hunian
                            privat modern di bagian Dalem Agung.</p>
                    </div>
                </div>

                <!-- Project Item 2 -->
                <div class="bg-teak-950 rounded-2xl overflow-hidden border border-teak-800 hover:border-keratonGold-500 transition shadow-xl group cursor-pointer"
                    onclick="openPlanModal('limasan-solo')">
                    <div class="h-64 overflow-hidden relative">
                        <img src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?auto=format&fit=crop&q=80&w=800"
                            alt="Limasan Solo"
                            class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                        <span
                            class="absolute bottom-3 left-3 bg-teak-900/90 text-keratonGold-400 text-xs px-3 py-1 rounded-full border border-keratonGold-500/40 font-bold">
                            <i class="fa-solid fa-cube mr-1"></i> Open 3D Layout
                        </span>
                    </div>
                    <div class="p-6 space-y-2">
                        <span
                            class="text-[10px] text-terracotta-400 font-bold uppercase tracking-wider block">Surakarta
                            • 2025</span>
                        <h3 class="font-serif text-xl font-bold text-white">Limasan Modern Heritage Solo</h3>
                        <p class="text-xs text-teak-300 line-clamp-2">Atap Limasan dengan bata terracota ekspos,
                            halaman inner-court, dan pencahayaan alami.</p>
                    </div>
                </div>

                <!-- Project Item 3 -->
                <div class="bg-teak-950 rounded-2xl overflow-hidden border border-teak-800 hover:border-keratonGold-500 transition shadow-xl group cursor-pointer"
                    onclick="openPlanModal('villa-ubud')">
                    <div class="h-64 overflow-hidden relative">
                        <img src="https://images.unsplash.com/photo-1512918728675-ed5a9ecdebfd?auto=format&fit=crop&q=80&w=800"
                            alt="Villa Etnik Ubud"
                            class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                        <span
                            class="absolute bottom-3 left-3 bg-teak-900/90 text-keratonGold-400 text-xs px-3 py-1 rounded-full border border-keratonGold-500/40 font-bold">
                            <i class="fa-solid fa-cube mr-1"></i> Open 3D Layout
                        </span>
                    </div>
                    <div class="p-6 space-y-2">
                        <span class="text-[10px] text-terracotta-400 font-bold uppercase tracking-wider block">Ubud,
                            Bali • 2026</span>
                        <h3 class="font-serif text-xl font-bold text-white">Gladak Resort Etnik Ubud</h3>
                        <p class="text-xs text-teak-300 line-clamp-2">Rumah gladak kayu jati panggung antik yang
                            dipadukan dengan infinity pool view lembah.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- CULTURAL DESIGN ELEMENTS & MATERIALS CATALOG -->
    <section id="materials" class="py-20 bg-batik-kawung-light">
        <div class="max-w-7xl mx-auto px-4 sm:px-8 space-y-12">

            <div class="text-center max-w-3xl mx-auto space-y-3">
                <span
                    class="text-xs font-bold uppercase tracking-widest text-terracotta-500 bg-terracotta-50 px-3 py-1 rounded-full border border-terracotta-200"
                    data-i18n="mat_tag">MATERIAL OTENTIK NUSANTARA</span>
                <h2 class="font-serif text-3xl sm:text-5xl font-bold text-teak-950" data-i18n="mat_heading">Elemen &
                    Material Budaya Jawa</h2>
                <p class="text-xs sm:text-sm text-teak-700" data-i18n="mat_sub">Kami hanya menggunakan kayu jati
                    perhutani kelas A dan ornamen kayu ukir otentik yang diawetkan secara alami.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

                <div class="bg-white p-6 rounded-2xl border border-teak-200 shadow-md space-y-3">
                    <div
                        class="w-12 h-12 rounded-xl bg-teak-900 text-keratonGold-400 flex items-center justify-center text-xl">
                        🪵
                    </div>
                    <h3 class="font-serif text-lg font-bold text-teak-950" data-i18n="mat_1_title">Kayu Jati Perhutani
                        Grade A</h3>
                    <p class="text-xs text-teak-700 leading-relaxed" data-i18n="mat_1_desc">Kayu jati tua pilihan
                        bertekstur serat padat, bebas rayap, dan tahan hingga ratusan tahun.</p>
                </div>

                <div class="bg-white p-6 rounded-2xl border border-teak-200 shadow-md space-y-3">
                    <div
                        class="w-12 h-12 rounded-xl bg-teak-900 text-keratonGold-400 flex items-center justify-center text-xl">
                        🏛️
                    </div>
                    <h3 class="font-serif text-lg font-bold text-teak-950" data-i18n="mat_2_title">Ukiran Gebyok
                        Jepara/Kudus</h3>
                    <p class="text-xs text-teak-700 leading-relaxed" data-i18n="mat_2_desc">Pintu & dinding ukir
                        pahatan tangan detail motif klasik nan mewah simbol keagungan rumah.</p>
                </div>

                <div class="bg-white p-6 rounded-2xl border border-teak-200 shadow-md space-y-3">
                    <div
                        class="w-12 h-12 rounded-xl bg-teak-900 text-keratonGold-400 flex items-center justify-center text-xl">
                        🧱
                    </div>
                    <h3 class="font-serif text-lg font-bold text-teak-950" data-i18n="mat_3_title">Batu Candi &
                        Genteng Terakota</h3>
                    <p class="text-xs text-teak-700 leading-relaxed" data-i18n="mat_3_desc">Genteng tanah liat bakar
                        tradisional yang menjaga suhu ruangan tetap dingin alami.</p>
                </div>

                <div class="bg-white p-6 rounded-2xl border border-teak-200 shadow-md space-y-3">
                    <div
                        class="w-12 h-12 rounded-xl bg-teak-900 text-keratonGold-400 flex items-center justify-center text-xl">
                        🎨
                    </div>
                    <h3 class="font-serif text-lg font-bold text-teak-950" data-i18n="mat_4_title">Tegel Kunci Motif
                        Klasik</h3>
                    <p class="text-xs text-teak-700 leading-relaxed" data-i18n="mat_4_desc">Ubin semen motif vintage
                        buatan tangan yang memberikan nuansa artistik nostalgia.</p>
                </div>

            </div>
        </div>
    </section>

    <!-- INTERACTIVE COST ESTIMATOR / CALCULATOR -->
    <section id="calculator"
        class="py-20 bg-teak-900 text-white relative overflow-hidden border-y border-keratonGold-500/40">
        <div class="max-w-4xl mx-auto px-4 sm:px-8 relative z-10">
            <div
                class="bg-teak-950 rounded-3xl p-8 sm:p-12 border-2 border-keratonGold-500/60 shadow-2xl wood-card-shadow space-y-8">

                <div class="text-center space-y-2">
                    <span
                        class="text-xs font-bold uppercase tracking-widest text-keratonGold-400 bg-teak-900 px-3 py-1 rounded-full border border-keratonGold-500/30"
                        data-i18n="calc_tag">KALKULATOR ESTIMASI BIAYA</span>
                    <h2 class="font-serif text-2xl sm:text-4xl font-bold text-white" data-i18n="calc_heading">Simulasi
                        Biaya Rumah Joglo & Etnik</h2>
                    <p class="text-xs sm:text-sm text-teak-300" data-i18n="calc_sub">Hitung perkiraan estimasi
                        anggaran pembangunan rumah etnik Anda berdasarkan luas tanah & jenis kayu.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <!-- Input 1: House Type -->
                    <div class="space-y-2">
                        <label class="block text-xs font-bold uppercase tracking-wider text-teak-200"
                            data-i18n="calc_label_type">Pilih Jenis Bangunan</label>
                        <select id="calc-type" onchange="calculateCost()"
                            class="w-full bg-teak-900 border border-keratonGold-500/40 text-white px-4 py-3 rounded-xl text-xs sm:text-sm focus:outline-none">
                            <option value="joglo" data-i18n="opt_joglo">Joglo Agung Pendopo (Mewah)</option>
                            <option value="limasan" data-i18n="opt_limasan">Rumah Limasan Jawa Modern</option>
                            <option value="gladak" data-i18n="opt_gladak">Rumah Gladak Kayu Panggung</option>
                            <option value="resort" data-i18n="opt_resort">Villa Resort Etnik Bali-Jawa</option>
                        </select>
                    </div>

                    <!-- Input 2: Wood Grade -->
                    <div class="space-y-2">
                        <label class="block text-xs font-bold uppercase tracking-wider text-teak-200"
                            data-i18n="calc_label_wood">Kualitas Kayu Jati</label>
                        <select id="calc-wood" onchange="calculateCost()"
                            class="w-full bg-teak-900 border border-keratonGold-500/40 text-white px-4 py-3 rounded-xl text-xs sm:text-sm focus:outline-none">
                            <option value="perhutani" data-i18n="opt_wood_1">Kayu Jati Perhutani Grade A (Terbaik)
                            </option>
                            <option value="etnik_a" data-i18n="opt_wood_2">Kayu Jati Sulawesian / Kuno Klasik</option>
                            <option value="campuran" data-i18n="opt_wood_3">Kayu Jati Kombinasi Mahoni/Nangka</option>
                        </select>
                    </div>

                </div>

                <!-- Input 3: Land Slider Area -->
                <div class="space-y-3">
                    <div
                        class="flex justify-between items-center text-xs font-bold uppercase tracking-wider text-teak-200">
                        <span data-i18n="calc_label_area">Luas Bangunan (m²)</span>
                        <span id="area-val" class="text-keratonGold-400 font-serif text-lg">150 m²</span>
                    </div>
                    <input id="calc-area" type="range" min="36" max="600" value="150"
                        oninput="calculateCost()"
                        class="w-full accent-keratonGold-500 h-2 bg-teak-800 rounded-lg cursor-pointer">
                </div>

                <!-- Estimation Result Output Box -->
                <div
                    class="bg-teak-900 p-6 rounded-2xl border border-keratonGold-500/50 flex flex-col sm:flex-row justify-between items-center gap-4">
                    <div>
                        <span class="text-[10px] text-teak-400 uppercase tracking-widest font-bold block"
                            data-i18n="calc_result_label">ESTIMASI ANGGARAN PEMBANGUNAN</span>
                        <div id="cost-result" class="font-serif text-2xl sm:text-4xl font-bold text-gold-gradient">Rp
                            825.000.000</div>
                        <span class="text-[10px] text-teak-300 block" data-i18n="calc_result_sub">*Termasuk struktur
                            rangka kayu jati, fondasi, atap genteng, & garansi 10 thn</span>
                    </div>
                    <a href="#consultation"
                        class="bg-keratonGold-500 hover:bg-keratonGold-600 text-teak-950 font-bold px-6 py-3 rounded-xl text-xs uppercase tracking-wider whitespace-nowrap">
                        <span data-i18n="calc_btn">Klaim Rincian RAB &rarr;</span>
                    </a>
                </div>

            </div>
        </div>
    </section>

    <!-- DESIGN & PLANNING PROCESS TIMELINE -->
    <section id="process" class="py-20 bg-batik-kawung-light">
        <div class="max-w-7xl mx-auto px-4 sm:px-8 space-y-12">

            <div class="text-center max-w-2xl mx-auto space-y-2">
                <span
                    class="text-xs font-bold uppercase tracking-widest text-terracotta-500 bg-terracotta-50 px-3 py-1 rounded-full border border-terracotta-200"
                    data-i18n="proc_tag">ALUR KERJA TRADISIONAL MODERN</span>
                <h2 class="font-serif text-3xl sm:text-4xl font-bold text-teak-950" data-i18n="proc_heading">5 Tahapan
                    Pembangunan Rumah Etnik</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-5 gap-4">

                <div class="bg-white p-5 rounded-2xl border border-teak-200 space-y-3 relative text-center">
                    <div
                        class="w-10 h-10 rounded-full bg-teak-900 text-keratonGold-400 font-bold mx-auto flex items-center justify-center text-sm">
                        1</div>
                    <h3 class="font-bold text-sm text-teak-950" data-i18n="p1_title">Konsultasi Tata Ruang</h3>
                    <p class="text-[11px] text-teak-700" data-i18n="p1_desc">Diskusi kebutuhan lahan, orientasi arah
                        mata angin rumah Jawa, dan budget.</p>
                </div>

                <div class="bg-white p-5 rounded-2xl border border-teak-200 space-y-3 relative text-center">
                    <div
                        class="w-10 h-10 rounded-full bg-teak-900 text-keratonGold-400 font-bold mx-auto flex items-center justify-center text-sm">
                        2</div>
                    <h3 class="font-bold text-sm text-teak-950" data-i18n="p2_title">Desain 3D & Denah</h3>
                    <p class="text-[11px] text-teak-700" data-i18n="p2_desc">Penyusunan arsitektur 3D visual dan tata
                        ruang Pendopo, Pringgitan, Dalem.</p>
                </div>

                <div class="bg-white p-5 rounded-2xl border border-teak-200 space-y-3 relative text-center">
                    <div
                        class="w-10 h-10 rounded-full bg-teak-900 text-keratonGold-400 font-bold mx-auto flex items-center justify-center text-sm">
                        3</div>
                    <h3 class="font-bold text-sm text-teak-950" data-i18n="p3_title">Seleksi Kayu & Ukiran</h3>
                    <p class="text-[11px] text-teak-700" data-i18n="p3_desc">Pemilihan balok kayu jati tua dan proses
                        pemahatan Gebyok oleh Empu Ukir.</p>
                </div>

                <div class="bg-white p-5 rounded-2xl border border-teak-200 space-y-3 relative text-center">
                    <div
                        class="w-10 h-10 rounded-full bg-teak-900 text-keratonGold-400 font-bold mx-auto flex items-center justify-center text-sm">
                        4</div>
                    <h3 class="font-bold text-sm text-teak-950" data-i18n="p4_title">Ereksi Knockdown</h3>
                    <p class="text-[11px] text-teak-700" data-i18n="p4_desc">Perakitan struktur kayu soko guru di
                        lokasi proyek dengan sistem pasak kayu presisi.</p>
                </div>

                <div class="bg-white p-5 rounded-2xl border border-teak-200 space-y-3 relative text-center">
                    <div
                        class="w-10 h-10 rounded-full bg-teak-900 text-keratonGold-400 font-bold mx-auto flex items-center justify-center text-sm">
                        5</div>
                    <h3 class="font-bold text-sm text-teak-950" data-i18n="p5_title">Finishing & Serah Terima</h3>
                    <p class="text-[11px] text-teak-700" data-i18n="p5_desc">Pemberian lapisan pelindung kayu,
                        instalasi interior, dan serah terima kunci.</p>
                </div>

            </div>
        </div>
    </section>

    <!-- ARCHITECT & MASTER CRAFTSMAN PROFILE -->
    <section id="about" class="py-20 bg-teak-950 text-white border-y border-keratonGold-500/30">
        <div class="max-w-7xl mx-auto px-4 sm:px-8 grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">

            <div class="lg:col-span-5 relative">
                <div class="relative rounded-3xl overflow-hidden border-2 border-keratonGold-500/60 shadow-2xl">
                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&q=80&w=800"
                        alt="Principal Architect & Empu Kayu" class="w-full h-[450px] object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-teak-950 via-transparent to-transparent"></div>
                    <div
                        class="absolute bottom-6 left-6 right-6 p-4 rounded-xl bg-teak-900/90 border border-keratonGold-500/40">
                        <span class="text-serif font-bold text-lg text-white block">Ki Arsitek Wisnu Broto,
                            S.Ars</span>
                        <span class="text-xs text-keratonGold-400 block font-semibold">Principal Architect & Budayawan
                            Arsitektur Jawa</span>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-7 space-y-6">
                <span
                    class="text-xs font-bold uppercase tracking-widest text-keratonGold-400 bg-teak-900 px-3 py-1 rounded-full border border-keratonGold-500/30"
                    data-i18n="about_tag">PROFIL ARSITEK & EMPU KAYU</span>
                <h2 class="font-serif text-3xl sm:text-5xl font-bold text-white leading-tight"
                    data-i18n="about_heading">
                    Merawat Jiwa Tradisi Dalam Arsitektur Modern.
                </h2>
                <p class="text-xs sm:text-base text-teak-200 leading-relaxed font-light" data-i18n="about_desc_1">
                    Berdiri sejak tahun 1990 di Yogyakarta, Griya Etnik Nantara berawal dari dedikasi sekelompok arsitek
                    dan empu ukir kayu asal Jepara dan Kudus. Kami berkomitmen menjaga keaslian proporsi estetika
                    arsitektur Nusantara tanpa mengorbankan kenyamanan era modern.
                </p>
                <p class="text-xs sm:text-base text-teak-200 leading-relaxed font-light" data-i18n="about_desc_2">
                    Setiap rumah Joglo dan Limasan yang kami bangun tidak sekadar struktur kayu, melainkan simbol
                    keharmonisan antara manusia, alam, dan nilai filosofi luhur.
                </p>
            </div>

        </div>
    </section>

    <!-- CONSULTATION & QUOTATION FORM -->
    <section id="consultation" class="py-20 bg-batik-kawung-light">
        <div class="max-w-4xl mx-auto px-4 sm:px-8">
            <div class="bg-white rounded-3xl p-8 sm:p-12 shadow-2xl border-2 border-teak-300 space-y-6">

                <div class="text-center max-w-xl mx-auto space-y-2">
                    <span
                        class="text-xs font-bold uppercase tracking-widest text-terracotta-500 bg-terracotta-50 px-3 py-1 rounded-full border border-terracotta-200"
                        data-i18n="form_tag">FORMULIR KONSULTASI PROYEK</span>
                    <h2 class="font-serif text-3xl sm:text-4xl font-bold text-teak-950" data-i18n="form_heading">Mulai
                        Rencanakan Rumah Etnik Anda</h2>
                    <p class="text-xs sm:text-sm text-teak-700" data-i18n="form_sub">Isi formulir di bawah ini untuk
                        menjadwalkan konsultasi langsung dengan tim tim arsitek ahli kami.</p>
                </div>

                <form onsubmit="handleFormSubmit(event)" class="space-y-4">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-teak-900 mb-1" data-i18n="f_name">Nama Lengkap
                                *</label>
                            <input type="text" required placeholder="Contoh: Bpk. Raden Hendra"
                                class="w-full px-4 py-3 rounded-xl border border-teak-300 focus:outline-none focus:border-teak-800 text-xs sm:text-sm">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-teak-900 mb-1" data-i18n="f_phone">Nomor
                                WhatsApp / HP *</label>
                            <input type="tel" required placeholder="08123456789"
                                class="w-full px-4 py-3 rounded-xl border border-teak-300 focus:outline-none focus:border-teak-800 text-xs sm:text-sm">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-teak-900 mb-1" data-i18n="f_location">Lokasi
                                Proyek Rencana *</label>
                            <input type="text" required placeholder="Contoh: Sleman, Yogyakarta / Jakarta Selatan"
                                class="w-full px-4 py-3 rounded-xl border border-teak-300 focus:outline-none focus:border-teak-800 text-xs sm:text-sm">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-teak-900 mb-1" data-i18n="f_type">Rencana Jenis
                                Bangunan *</label>
                            <select
                                class="w-full px-4 py-3 rounded-xl border border-teak-300 focus:outline-none focus:border-teak-800 text-xs sm:text-sm bg-white">
                                <option>Joglo Agung Pendopo</option>
                                <option>Rumah Limasan Modern</option>
                                <option>Rumah Gladak Kayu Panggung</option>
                                <option>Villa Resort / Resto Etnik</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-teak-900 mb-1" data-i18n="f_msg">Detail Keinginan /
                            Catatan Khusus</label>
                        <textarea rows="4" placeholder="Tuliskan perkiraan luas tanah, keinginan ukiran Gebyok, atau konsep khusus..."
                            class="w-full px-4 py-3 rounded-xl border border-teak-300 focus:outline-none focus:border-teak-800 text-xs sm:text-sm"></textarea>
                    </div>

                    <button type="submit"
                        class="w-full bg-gradient-to-r from-teak-900 to-teak-800 hover:from-teak-950 hover:to-teak-900 text-keratonGold-400 font-bold text-sm py-4 rounded-xl transition shadow-xl uppercase tracking-wider border border-keratonGold-500/40">
                        <i class="fa-solid fa-paper-plane mr-1"></i> <span data-i18n="f_submit">Kirim Permohonan
                            Konsultasi</span>
                    </button>
                </form>

            </div>
        </div>
    </section>

    <!-- FAQ ACCORDION -->
    <section id="faq" class="py-16 bg-teak-50">
        <div class="max-w-3xl mx-auto px-4 sm:px-8 space-y-6">
            <div class="text-center space-y-2">
                <span
                    class="text-xs font-bold uppercase tracking-widest text-terracotta-500 bg-terracotta-50 px-3 py-1 rounded-full border border-terracotta-200"
                    data-i18n="faq_tag">PERTANYAAN UMUM</span>
                <h2 class="font-serif text-2xl sm:text-4xl font-bold text-teak-950" data-i18n="faq_heading">Frequently
                    Asked Questions</h2>
            </div>

            <div class="space-y-3">
                <div class="border border-teak-300 bg-white rounded-2xl overflow-hidden">
                    <button onclick="toggleFAQ(1)"
                        class="w-full p-5 text-left font-serif font-bold text-teak-950 flex justify-between items-center text-sm">
                        <span data-i18n="faq_q1">Apakah struktur kayu rumah Joglo tahan terhadap serangan rayap?</span>
                        <i id="faq-icon-1" class="fa-solid fa-chevron-down text-teak-700 transition-transform"></i>
                    </button>
                    <div id="faq-ans-1"
                        class="hidden p-5 pt-0 text-xs sm:text-sm text-teak-700 border-t border-teak-100 leading-relaxed"
                        data-i18n="faq_a1">
                        Ya. Kami menggunakan kayu Jati Perhutani tua yang dikeringkan secara oven kilned serta diberi
                        perlakuan perendaman bahan pengawet organik anti-rayap alami sebelum proses konstruksi.
                    </div>
                </div>

                <div class="border border-teak-300 bg-white rounded-2xl overflow-hidden">
                    <button onclick="toggleFAQ(2)"
                        class="w-full p-5 text-left font-serif font-bold text-teak-950 flex justify-between items-center text-sm">
                        <span data-i18n="faq_q2">Apakah rumah kayu Gladak bisa dipindahkan ke kota lain
                            (Knockdown)?</span>
                        <i id="faq-icon-2" class="fa-solid fa-chevron-down text-teak-700 transition-transform"></i>
                    </button>
                    <div id="faq-ans-2"
                        class="hidden p-5 pt-0 text-xs sm:text-sm text-teak-700 border-t border-teak-100 leading-relaxed"
                        data-i18n="faq_a2">
                        Sangat bisa. Seluruh struktur rumah Gladak & Limasan dirancang dengan sistem bongkar pasang
                        (knockdown) menggunakan pasak kayu tradisional, memudahkan perakitan di mana saja.
                    </div>
                </div>

                <div class="border border-teak-300 bg-white rounded-2xl overflow-hidden">
                    <button onclick="toggleFAQ(3)"
                        class="w-full p-5 text-left font-serif font-bold text-teak-950 flex justify-between items-center text-sm">
                        <span data-i18n="faq_q3">Apakah Griya Etnik Nantara melayani pengurusan IMB/PBG izin
                            bangunan?</span>
                        <i id="faq-icon-3" class="fa-solid fa-chevron-down text-teak-700 transition-transform"></i>
                    </button>
                    <div id="faq-ans-3"
                        class="hidden p-5 pt-0 text-xs sm:text-sm text-teak-700 border-t border-teak-100 leading-relaxed"
                        data-i18n="faq_a3">
                        Tentu. Tim arsitek kami menyediakan dokumen gambar kerja teknis lengkap bersertifikat untuk
                        kemudahan pengurusan IMB/PBG di dinas setempat.
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="bg-teak-950 text-teak-300 text-xs py-12 border-t-4 border-keratonGold-500">
        <div class="max-w-7xl mx-auto px-4 sm:px-8 grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
            <div class="space-y-3">
                <span class="font-royal text-xl font-bold text-keratonGold-400 block">GRIYA ETNIK NANTARA</span>
                <p class="text-teak-400 leading-relaxed" data-i18n="foot_desc">
                    Spesialis Arsitektur & Pembangunan Rumah Joglo, Limasan, dan Villa Etnik Nusantara Berbahan Kayu
                    Jati Pilihan.
                </p>
            </div>
            <div>
                <strong class="text-white block font-semibold mb-3 uppercase tracking-wider text-[11px]"
                    data-i18n="foot_nav">Navigasi Utama</strong>
                <ul class="space-y-2">
                    <li><a href="#about" class="hover:text-keratonGold-400 transition">Filosofi Arsitektur</a></li>
                    <li><a href="#styles" class="hover:text-keratonGold-400 transition">Kategori Gaya Etnik</a></li>
                    <li><a href="#gallery" class="hover:text-keratonGold-400 transition">Portofolio & Denah 3D</a>
                    </li>
                    <li><a href="#calculator" class="hover:text-keratonGold-400 transition">Simulasi Biaya RAB</a>
                    </li>
                </ul>
            </div>
            <div>
                <strong class="text-white block font-semibold mb-3 uppercase tracking-wider text-[11px]"
                    data-i18n="foot_office">Studio & Workshop</strong>
                <p class="text-teak-400 leading-relaxed">
                    Jl. Palagan Tentara Pelajar Km 9, Ngaglik, Sleman, DI Yogyakarta.<br>
                    Workshop Ukir: Tahunan, Jepara, Jawa Tengah.
                </p>
            </div>
            <div>
                <strong class="text-white block font-semibold mb-3 uppercase tracking-wider text-[11px]"
                    data-i18n="foot_social">Media Sosial</strong>
                <div class="flex space-x-3 text-base pt-1">
                    <a href="#"
                        class="w-8 h-8 rounded-full bg-teak-900 hover:bg-keratonGold-500 hover:text-teak-950 flex items-center justify-center transition"><i
                            class="fa-brands fa-instagram"></i></a>
                    <a href="#"
                        class="w-8 h-8 rounded-full bg-teak-900 hover:bg-keratonGold-500 hover:text-teak-950 flex items-center justify-center transition"><i
                            class="fa-brands fa-youtube"></i></a>
                    <a href="#"
                        class="w-8 h-8 rounded-full bg-teak-900 hover:bg-keratonGold-500 hover:text-teak-950 flex items-center justify-center transition"><i
                            class="fa-brands fa-tiktok"></i></a>
                </div>
            </div>
        </div>

        <div
            class="max-w-7xl mx-auto px-4 sm:px-8 pt-8 border-t border-teak-900 text-center text-[11px] text-teak-500">
            &copy; 2026 GRIYA ETNIK NANTARA. All rights reserved. Spesialis Arsitektur Tradisional Jawa & Nusantara.<div
                class="webia-credit">Made with care ♡ · Website template by WEBIA</div>
        </div>
    </footer>

    <!-- FLOATING ACTION WIDGETS -->
    <div class="griya-floating-actions fixed bottom-6 right-6 z-50 flex flex-row items-center gap-3">

        <!-- WhatsApp Floating Button -->
        <button onclick="toggleWADrawer()"
            class="w-13 h-13 sm:w-14 sm:h-14 bg-emerald-700 hover:bg-emerald-800 text-white rounded-full shadow-2xl flex items-center justify-center text-2xl transition-transform hover:scale-110 border-2 border-emerald-400">
            <i class="fa-brands fa-whatsapp"></i>
        </button>


        <!-- Ki Arsitek AI Chatbot Floating Button -->
        <button type="button" onclick="toggleAIChatbot()" aria-label="Buka Ki Arsitek AI Assistant"
            title="Ki Arsitek AI Assistant"
            class="w-13 h-13 sm:w-14 sm:h-14 bg-teak-900 hover:bg-teak-800 text-keratonGold-400 rounded-full shadow-2xl flex flex-col items-center justify-center gap-0 transition-transform hover:scale-110 border-2 border-keratonGold-500"
            style="min-width: 56px; min-height: 56px; position: relative; z-index: 1000;">

            <i class="fa-solid fa-wand-magic-sparkles" aria-hidden="true"
                style="display:block; font-size:22px; line-height:1.2; color:#e9c65b;">
            </i>

            <span
                style="display:block; font-size:9px; font-weight:800; letter-spacing:1px; line-height:1.2; color:#e9c65b;">
                AI
            </span>
        </button>

    </div>

    <!-- WHATSAPP DRAWER POPUP -->
    <div id="wa-drawer"
        class="hidden fixed bottom-24 right-6 z-50 w-80 bg-teak-950 text-white rounded-2xl p-5 shadow-2xl border border-keratonGold-500/50">
        <div class="flex justify-between items-center mb-3 border-b border-teak-800 pb-2">
            <strong class="text-xs font-bold text-keratonGold-400">WhatsApp Konsultasi Arsitek</strong>
            <button onclick="toggleWADrawer()" class="text-teak-400 hover:text-white"><i
                    class="fa-solid fa-xmark"></i></button>
        </div>
        <p class="text-xs text-teak-200 mb-3">Sugeng rawuh! Ada yang bisa kami bantu terkait konsultasi denah atau
            estimasi kayu jati Joglo?</p>
        <a href="https://wa.me/6281234567890?text=Halo%20Griya%20Etnik%20Nantara,%20saya%20ingin%20konsultasi%20desain%20rumah..."
            target="_blank"
            class="w-full bg-emerald-700 hover:bg-emerald-800 text-white text-xs font-bold py-2.5 rounded-xl flex items-center justify-center gap-2">
            <i class="fa-brands fa-whatsapp text-lg"></i> Chat Tim Arsitek WA
        </a>
    </div>

    <!-- KI ARSITEK AI CHATBOT DRAWER -->
    <div id="ai-drawer"
        class="hidden fixed bottom-24 right-6 z-50 w-85 sm:w-96 bg-teak-950 text-white rounded-2xl p-5 shadow-2xl border-2 border-keratonGold-500 flex flex-col h-[420px]">
        <div class="flex justify-between items-center pb-3 border-b border-teak-800">
            <div class="flex items-center gap-3">
                <div
                    class="w-8 h-8 rounded-full bg-keratonGold-500 text-teak-950 flex items-center justify-center font-bold text-xs">
                    🏛️</div>
                <div>
                    <strong class="text-xs font-bold text-white block">Ki Arsitek AI Assistant</strong>
                    <span class="text-[10px] text-keratonGold-400 block">Pakar Tata Ruang & Material Etnik Jawa</span>
                </div>
            </div>
            <button onclick="toggleAIChatbot()" class="text-teak-400 hover:text-white"><i
                    class="fa-solid fa-xmark"></i></button>
        </div>

        <div id="ai-history" class="flex-grow overflow-y-auto my-3 space-y-3 text-xs pr-1">
            <div class="bg-teak-900 p-3 rounded-xl border border-teak-800 text-teak-200">
                Sugeng rawuh! Saya Ki Arsitek AI. Silakan tanyakan seputar estimasi biaya Joglo, posisi soko guru, atau
                pilihan kayu Jati!
            </div>
        </div>

        <div class="flex gap-1 overflow-x-auto pb-2 text-[10px]">
            <button onclick="sendAIChip('Rekomendasi posisi rumah Jawa')"
                class="bg-teak-800 text-keratonGold-400 px-2.5 py-1 rounded-full whitespace-nowrap">🧭 Fengshui
                Jawa</button>
            <button onclick="sendAIChip('Perbedaan Joglo vs Limasan')"
                class="bg-teak-800 text-keratonGold-400 px-2.5 py-1 rounded-full whitespace-nowrap">📐 Joglo vs
                Limasan</button>
        </div>

        <div class="flex gap-2 pt-2 border-t border-teak-800">
            <input id="ai-input" type="text" placeholder="Tanyakan pada Ki Arsitek..."
                class="flex-grow px-3 py-2 bg-teak-900 text-white rounded-xl text-xs focus:outline-none border border-teak-800">
            <button onclick="sendAIChat()"
                class="bg-keratonGold-500 text-teak-950 font-bold px-3 py-2 rounded-xl text-xs"><i
                    class="fa-solid fa-paper-plane"></i></button>
        </div>
    </div>

    <!-- 3D FLOOR PLAN & RENDER MODAL -->
    <div id="plan-modal"
        class="hidden fixed inset-0 z-50 bg-teak-950/80 backdrop-blur-md flex items-center justify-center p-4">
        <div
            class="bg-teak-900 text-white rounded-3xl max-w-3xl w-full p-6 sm:p-8 relative shadow-2xl border-2 border-keratonGold-500 max-h-[90vh] overflow-y-auto">
            <button onclick="closePlanModal()"
                class="absolute top-4 right-4 text-teak-400 hover:text-white text-lg w-8 h-8 rounded-full bg-teak-800 flex items-center justify-center">
                <i class="fa-solid fa-xmark"></i>
            </button>
            <div id="plan-modal-content" class="space-y-4">
                <!-- Content injected dynamically -->
            </div>
        </div>
    </div>

    <script
        src="{{ asset('js/interior-architecture/architecture-building-design/griya-etnik-nantara/griya-etnik-nantara.js') }}"
        defer></script>

</body>

</html>
