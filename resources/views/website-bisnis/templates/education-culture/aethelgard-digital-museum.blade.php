<!DOCTYPE html>
<html lang="id" class="scroll-smooth aethelgard-html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aethelgard Archive — Digital Museum & Heritage Platform</title>
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts: Cormorant Garamond (Editorial Classic Serif) & Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;0,700;1,400;1,600&family=Plus+Jakarta+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="aethelgard-page bg-aethelgard-champagne-100 text-aethelgard-navy-900 font-aethelgard-sans antialiased selection:bg-aethelgard-champagne-500 selection:text-aethelgard-navy-950">

    <!-- =================================================================
         1. TOPBAR / NAVBAR (Sticky & Fully Functional Smooth Scroll)
         ================================================================= -->
    <header class="sticky top-0 z-40 bg-aethelgard-navy-900/95 backdrop-blur-md text-aethelgard-champagne-100 aethelgard-editorial-rule shadow-lg">
        <!-- Micro Top Announcement Bar -->
        <div class="bg-aethelgard-navy-950 text-aethelgard-champagne-300 text-xs py-1.5 px-4 text-center tracking-[0.2em] uppercase border-b border-aethelgard-champagne-500/20">
            Pameran Virtual Musim Gugur 2026 &mdash; Arsip Digital Nusantara &amp; Peradaban Klasik
        </div>

        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Brand Logo -->
                <a href="#beranda" class="flex items-center space-x-3 group">
                    <div class="w-10 h-10 border border-aethelgard-champagne-400 flex items-center justify-center rotate-45 group-hover:rotate-0 transition-transform duration-500">
                        <i class="fa-solid fa-landmark text-aethelgard-champagne-400 -rotate-45 group-hover:rotate-0 transition-transform duration-500 text-sm"></i>
                    </div>
                    <div class="pl-1">
                        <span class="font-aethelgard-serif text-2xl font-bold tracking-widest uppercase text-aethelgard-champagne-100 block leading-none">Aethelgard</span>
                        <span class="text-[10px] tracking-[0.28em] uppercase text-aethelgard-champagne-400 block mt-1">Digital Heritage</span>
                    </div>
                </a>

                <!-- Desktop Navigation Links -->
                <div class="hidden md:flex items-center space-x-9 text-xs tracking-[0.18em] uppercase font-medium">
                    <a href="#beranda" class="text-aethelgard-champagne-200 hover:text-aethelgard-champagne-400 transition-colors py-1">Beranda</a>
                    <a href="#koleksi" class="text-aethelgard-champagne-200 hover:text-aethelgard-champagne-400 transition-colors py-1">Koleksi</a>
                    <a href="#tur-virtual" class="text-aethelgard-champagne-200 hover:text-aethelgard-champagne-400 transition-colors py-1">Tur Virtual</a>
                    <a href="#faq" class="text-aethelgard-champagne-200 hover:text-aethelgard-champagne-400 transition-colors py-1">FAQ</a>
                    <a href="#kontak" class="text-aethelgard-champagne-200 hover:text-aethelgard-champagne-400 transition-colors py-1">Kontak</a>
                </div>

                <!-- CTA & Mobile Toggle -->
                <div class="flex items-center space-x-4">
                    <a href="#tur-virtual" class="hidden sm:inline-block px-5 py-2.5 border border-aethelgard-champagne-400 text-aethelgard-champagne-300 hover:bg-aethelgard-champagne-400 hover:text-aethelgard-navy-950 text-xs uppercase tracking-[0.18em] font-semibold transition-all duration-300">
                        Masuk Galeri
                    </a>
                    <button id="mobile-menu-btn" aria-label="Buka Menu" class="md:hidden text-aethelgard-champagne-300 hover:text-aethelgard-champagne-400 p-2 focus:outline-none">
                        <i class="fa-solid fa-bars text-xl"></i>
                    </button>
                </div>
            </div>

            <!-- Mobile Dropdown Menu -->
            <div id="mobile-menu" class="hidden md:hidden pb-6 pt-2 border-t border-aethelgard-champagne-500/20 space-y-3 text-xs uppercase tracking-[0.2em]">
                <a href="#beranda" class="mobile-nav-link block py-2 text-aethelgard-champagne-200 hover:text-aethelgard-champagne-400">Beranda</a>
                <a href="#koleksi" class="mobile-nav-link block py-2 text-aethelgard-champagne-200 hover:text-aethelgard-champagne-400">Koleksi Kuratorial</a>
                <a href="#tur-virtual" class="mobile-nav-link block py-2 text-aethelgard-champagne-200 hover:text-aethelgard-champagne-400">Tur Virtual 360°</a>
                <a href="#faq" class="mobile-nav-link block py-2 text-aethelgard-champagne-200 hover:text-aethelgard-champagne-400">FAQ</a>
                <a href="#kontak" class="mobile-nav-link block py-2 text-aethelgard-champagne-200 hover:text-aethelgard-champagne-400">Kontak &amp; Arsip</a>
            </div>
        </nav>
    </header>

    <!-- =================================================================
         2. HERO SECTION (Editorial Classic Layout)
         ================================================================= -->
    <section id="beranda" class="relative bg-aethelgard-navy-900 text-aethelgard-champagne-100 overflow-hidden aethelgard-editorial-rule">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-24">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-10 items-center">
                
                <!-- Left Editorial Column (7 cols) -->
                <div class="lg:col-span-7 space-y-7">
                    <div class="inline-flex items-center space-x-3 border-b border-aethelgard-champagne-400/50 pb-2">
                        <span class="text-xs uppercase tracking-[0.25em] text-aethelgard-champagne-400 font-semibold">Edisi Kuratorial No. XIV</span>
                        <span class="text-aethelgard-champagne-500">&bull;</span>
                        <span class="text-xs italic font-aethelgard-serif text-aethelgard-champagne-200 text-base">Preservasi Digital Resolusi Ultra-Tinggi</span>
                    </div>

                    <h1 class="font-aethelgard-serif text-4xl sm:text-5xl lg:text-6xl font-normal leading-[1.12] text-aethelgard-champagne-100">
                        Menjaga Jejak <span class="italic text-aethelgard-champagne-400">Peradaban</span> dalam Keabadian Ruang Digital.
                    </h1>

                    <p class="text-aethelgard-champagne-200/80 text-base sm:text-lg leading-relaxed max-w-2xl font-light">
                        Jelajahi ribuan artefak langka, manuskrip kuno, dan rekonstruksi arsitektur bersejarah melalui pengalaman kuratorial interaktif tanpa batas ruang dan waktu.
                    </p>

                    <div class="pt-2 flex flex-wrap items-center gap-4">
                        <a href="#koleksi" class="px-8 py-4 bg-aethelgard-champagne-400 text-aethelgard-navy-950 hover:bg-aethelgard-champagne-300 text-xs uppercase tracking-[0.2em] font-bold transition-all duration-300 shadow-lg">
                            Jelajahi Arsip <i class="fa-solid fa-arrow-right ml-2"></i>
                        </a>
                        <a href="#tur-virtual" class="px-8 py-4 border border-aethelgard-champagne-400/60 text-aethelgard-champagne-200 hover:border-aethelgard-champagne-400 hover:text-aethelgard-champagne-400 text-xs uppercase tracking-[0.2em] font-medium transition-all duration-300">
                            <i class="fa-regular fa-compass mr-2"></i> Tur Virtual 3D
                        </a>
                    </div>

                    <!-- Editorial Stats Bar -->
                    <div class="grid grid-cols-3 gap-6 pt-8 border-t border-aethelgard-champagne-500/20 max-w-xl">
                        <div>
                            <p class="font-aethelgard-serif text-3xl text-aethelgard-champagne-400 font-semibold">14.800+</p>
                            <p class="text-[11px] uppercase tracking-[0.15em] text-aethelgard-champagne-300/70 mt-1">Artefak Terdigitalisasi</p>
                        </div>
                        <div>
                            <p class="font-aethelgard-serif text-3xl text-aethelgard-champagne-400 font-semibold">42</p>
                            <p class="text-[11px] uppercase tracking-[0.15em] text-aethelgard-champagne-300/70 mt-1">Galeri Kuratorial</p>
                        </div>
                        <div>
                            <p class="font-aethelgard-serif text-3xl text-aethelgard-champagne-400 font-semibold">8K</p>
                            <p class="text-[11px] uppercase tracking-[0.15em] text-aethelgard-champagne-300/70 mt-1">Pemindaian Fotogrametri</p>
                        </div>
                    </div>
                </div>

                <!-- Right Editorial Frame Column (5 cols) -->
                <div class="lg:col-span-5">
                    <div class="relative p-4 border border-aethelgard-champagne-400/40 bg-aethelgard-navy-800/50">
                        <div class="overflow-hidden aspect-[4/5] relative bg-aethelgard-navy-950">
                            <img src="https://images.unsplash.com/photo-1566127444979-b3d2b654e3d7?auto=format&fit=crop&w=900&q=80" 
                                 alt="Patung Klasik dan Galeri Museum" 
                                 class="w-full h-full object-cover opacity-90 hover:scale-105 transition-transform duration-700">
                            <div class="absolute inset-0 bg-gradient-to-t from-aethelgard-navy-950 via-transparent to-transparent"></div>
                            <div class="absolute bottom-5 left-5 right-5 border-t border-aethelgard-champagne-400/40 pt-3">
                                <p class="text-[10px] uppercase tracking-[0.22em] text-aethelgard-champagne-400">Sorotan Utama &bull; Ruang IV</p>
                                <p class="font-aethelgard-serif italic text-xl text-aethelgard-champagne-100 mt-0.5">“Mahakarya Pahat Klasik Abad ke-16”</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- =================================================================
         3. KURASI KOLEKSI (Editorial Grid)
         ================================================================= -->
    <section id="koleksi" class="py-20 lg:py-28 bg-aethelgard-champagne-100 border-b border-aethelgard-navy-900/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-end justify-between pb-10 mb-14 border-b border-aethelgard-navy-900/15">
                <div>
                    <span class="text-xs uppercase tracking-[0.25em] text-aethelgard-champagne-600 font-semibold">Katalog Pilihan Kurator</span>
                    <h2 class="font-aethelgard-serif text-3xl sm:text-4xl lg:text-5xl text-aethelgard-navy-900 mt-2">Koleksi Warisan Digital</h2>
                </div>
                <p class="text-aethelgard-navy-800/75 max-w-md text-sm leading-relaxed mt-4 md:mt-0">
                    Setiap objek dipindai menggunakan teknologi fotogrametri multi-spektral untuk menampilkan detail tekstur asli hingga tingkat mikroskopis.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Card 1 -->
                <article class="bg-white p-5 aethelgard-editorial-card shadow-sm flex flex-col justify-between">
                    <div>
                        <div class="aspect-[4/3] overflow-hidden bg-aethelgard-navy-900 mb-5">
                            <img src="https://images.unsplash.com/photo-1582555172866-f73bb12a2ab3?auto=format&fit=crop&w=800&q=80" 
                                 alt="Manuskrip Kuno" class="w-full h-full object-cover hover:scale-105 transition-transform duration-500">
                        </div>
                        <div class="flex items-center justify-between text-[11px] uppercase tracking-[0.18em] text-aethelgard-champagne-600 font-semibold mb-2">
                            <span>Arsip Naskah</span>
                            <span>Tahun 1492</span>
                        </div>
                        <h3 class="font-aethelgard-serif text-2xl text-aethelgard-navy-900 font-semibold mb-2">Kodeks Kartografi Maritim</h3>
                        <p class="text-sm text-aethelgard-navy-800/75 leading-relaxed">
                            Peta pelayaran kuno di atas perkamen dengan ilustrasi tinta emas yang telah direstorasi secara digital.
                        </p>
                    </div>
                    <div class="pt-5 mt-5 border-t border-aethelgard-navy-900/10 flex justify-between items-center">
                        <span class="text-xs italic font-aethelgard-serif text-aethelgard-navy-700">Resolusi: 120 Megapiksel</span>
                        <a href="#tur-virtual" class="text-xs uppercase tracking-[0.18em] font-bold text-aethelgard-navy-900 hover:text-aethelgard-champagne-600 transition-colors">
                            Inspeksi <i class="fa-solid fa-arrow-up-right-from-square ml-1"></i>
                        </a>
                    </div>
                </article>

                <!-- Card 2 -->
                <article class="bg-white p-5 aethelgard-editorial-card shadow-sm flex flex-col justify-between">
                    <div>
                        <div class="aspect-[4/3] overflow-hidden bg-aethelgard-navy-900 mb-5">
                            <img src="https://images.unsplash.com/photo-1518998053901-5348d3961a04?auto=format&fit=crop&w=800&q=80" 
                                 alt="Galeri Seni Klasik" class="w-full h-full object-cover hover:scale-105 transition-transform duration-500">
                        </div>
                        <div class="flex items-center justify-between text-[11px] uppercase tracking-[0.18em] text-aethelgard-champagne-600 font-semibold mb-2">
                            <span>Seni Lukis &amp; Kanvas</span>
                            <span>Abad ke-18</span>
                        </div>
                        <h3 class="font-aethelgard-serif text-2xl text-aethelgard-navy-900 font-semibold mb-2">Galeri Potret Bangsawan</h3>
                        <p class="text-sm text-aethelgard-navy-800/75 leading-relaxed">
                            Eksplorasi lapisan sapuan kuas dan pigmen warna asli melalui fitur pemindaian sinar-X interaktif.
                        </p>
                    </div>
                    <div class="pt-5 mt-5 border-t border-aethelgard-navy-900/10 flex justify-between items-center">
                        <span class="text-xs italic font-aethelgard-serif text-aethelgard-navy-700">Audio Narasi Tersedia</span>
                        <a href="#tur-virtual" class="text-xs uppercase tracking-[0.18em] font-bold text-aethelgard-navy-900 hover:text-aethelgard-champagne-600 transition-colors">
                            Inspeksi <i class="fa-solid fa-arrow-up-right-from-square ml-1"></i>
                        </a>
                    </div>
                </article>

                <!-- Card 3 -->
                <article class="bg-white p-5 aethelgard-editorial-card shadow-sm flex flex-col justify-between">
                    <div>
                        <div class="aspect-[4/3] overflow-hidden bg-aethelgard-navy-900 mb-5">
                            <img src="https://images.unsplash.com/photo-1599420186946-7b6fb4e297f0?auto=format&fit=crop&w=800&q=80" 
                                 alt="Relik Keramik" class="w-full h-full object-cover hover:scale-105 transition-transform duration-500">
                        </div>
                        <div class="flex items-center justify-between text-[11px] uppercase tracking-[0.18em] text-aethelgard-champagne-600 font-semibold mb-2">
                            <span>Artefak 3D</span>
                            <span>Dinasti Klasik</span>
                        </div>
                        <h3 class="font-aethelgard-serif text-2xl text-aethelgard-navy-900 font-semibold mb-2">Bejana Porselen Kekaisaran</h3>
                        <p class="text-sm text-aethelgard-navy-800/75 leading-relaxed">
                            Putar objek 360 derajat untuk mengamati kaligrafi ukir dan glasir porselen dari seluruh sudut pandang.
                        </p>
                    </div>
                    <div class="pt-5 mt-5 border-t border-aethelgard-navy-900/10 flex justify-between items-center">
                        <span class="text-xs italic font-aethelgard-serif text-aethelgard-navy-700">Model 3D Interaktif</span>
                        <a href="#tur-virtual" class="text-xs uppercase tracking-[0.18em] font-bold text-aethelgard-navy-900 hover:text-aethelgard-champagne-600 transition-colors">
                            Inspeksi <i class="fa-solid fa-arrow-up-right-from-square ml-1"></i>
                        </a>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <!-- =================================================================
         4. TUR VIRTUAL & PENGALAMAN KURATORIAL
         ================================================================= -->
    <section id="tur-virtual" class="py-20 bg-aethelgard-navy-900 text-aethelgard-champagne-100 aethelgard-editorial-rule">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="border border-aethelgard-champagne-400/35 p-8 sm:p-12 lg:p-16 bg-aethelgard-navy-800/40 relative">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
                    <div class="lg:col-span-7 space-y-5">
                        <span class="text-xs uppercase tracking-[0.25em] text-aethelgard-champagne-400 font-semibold">Immersive Exhibition</span>
                        <h2 class="font-aethelgard-serif text-3xl sm:text-4xl lg:text-5xl leading-tight">
                            Berjalan Melintasi Lorong Sejarah dari Layar Anda.
                        </h2>
                        <p class="text-aethelgard-champagne-200/80 text-sm sm:text-base leading-relaxed font-light">
                            Dilengkapi panduan suara kurator museum, rekonstruksi arsitektur yang telah hilang, serta asisten kuratorial berbasis AI yang siap menjawab pertanyaan sejarah secara mendalam.
                        </p>
                        <div class="pt-3 flex flex-wrap gap-4">
                            <button onclick="toggleAIModal()" class="px-7 py-3.5 bg-aethelgard-champagne-400 text-aethelgard-navy-950 hover:bg-aethelgard-champagne-300 text-xs uppercase tracking-[0.2em] font-bold transition-colors">
                                <i class="fa-solid fa-sparkles mr-2"></i> Tanya Kurator AI
                            </button>
                            <a href="#faq" class="px-7 py-3.5 border border-aethelgard-champagne-400/50 text-aethelgard-champagne-200 hover:text-aethelgard-champagne-400 text-xs uppercase tracking-[0.2em] transition-colors">
                                Pelajari Akses Riset
                            </a>
                        </div>
                    </div>
                    <div class="lg:col-span-5 grid grid-cols-2 gap-4 text-center">
                        <div class="p-6 border border-aethelgard-champagne-400/25 bg-aethelgard-navy-900/70">
                            <i class="fa-solid fa-vr-cardboard text-2xl text-aethelgard-champagne-400 mb-3"></i>
                            <h4 class="font-aethelgard-serif text-lg text-aethelgard-champagne-100">Mode VR &amp; Web</h4>
                            <p class="text-xs text-aethelgard-champagne-300/70 mt-1">Kompatibel di semua perangkat</p>
                        </div>
                        <div class="p-6 border border-aethelgard-champagne-400/25 bg-aethelgard-navy-900/70">
                            <i class="fa-solid fa-headphones text-2xl text-aethelgard-champagne-400 mb-3"></i>
                            <h4 class="font-aethelgard-serif text-lg text-aethelgard-champagne-100">Audio Narasi</h4>
                            <p class="text-xs text-aethelgard-champagne-300/70 mt-1">Tersedia dalam 6 bahasa</p>
                        </div>
                        <div class="p-6 border border-aethelgard-champagne-400/25 bg-aethelgard-navy-900/70">
                            <i class="fa-solid fa-book-open text-2xl text-aethelgard-champagne-400 mb-3"></i>
                            <h4 class="font-aethelgard-serif text-lg text-aethelgard-champagne-100">Jurnal Akademik</h4>
                            <p class="text-xs text-aethelgard-champagne-300/70 mt-1">Sitasi resmi &amp; metadata</p>
                        </div>
                        <div class="p-6 border border-aethelgard-champagne-400/25 bg-aethelgard-navy-900/70">
                            <i class="fa-solid fa-building-columns text-2xl text-aethelgard-champagne-400 mb-3"></i>
                            <h4 class="font-aethelgard-serif text-lg text-aethelgard-champagne-100">Kemitraan Institusi</h4>
                            <p class="text-xs text-aethelgard-champagne-300/70 mt-1">Akses khusus sekolah &amp; kampus</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- =================================================================
         5. FAQ SECTION (Interactive Editorial Accordion)
         ================================================================= -->
    <section id="faq" class="py-20 lg:py-28 bg-aethelgard-champagne-100">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-14">
                <span class="text-xs uppercase tracking-[0.25em] text-aethelgard-champagne-600 font-semibold">Informasi &amp; Panduan Pengunjung</span>
                <h2 class="font-aethelgard-serif text-3xl sm:text-4xl lg:text-5xl text-aethelgard-navy-900 mt-2">Pertanyaan yang Sering Diajukan</h2>
                <div class="w-20 h-[1px] bg-aethelgard-champagne-500 mx-auto mt-5"></div>
            </div>

            <div class="divide-y divide-aethelgard-navy-900/15 border-y border-aethelgard-navy-900/15" id="faq-container">
                <!-- FAQ 1 -->
                <div class="py-5">
                    <button onclick="toggleFAQ(1)" class="w-full flex items-center justify-between text-left py-2 focus:outline-none group">
                        <span class="font-aethelgard-serif text-xl sm:text-2xl text-aethelgard-navy-900 group-hover:text-aethelgard-champagne-600 transition-colors font-semibold">
                            Apakah akses ke galeri digital dan arsip dasar bersifat gratis?
                        </span>
                        <span id="faq-icon-1" class="text-aethelgard-champagne-600 text-lg transition-transform duration-300 ml-4">
                            <i class="fa-solid fa-plus"></i>
                        </span>
                    </button>
                    <div id="faq-answer-1" class="hidden pt-3 pb-2 text-aethelgard-navy-800/80 text-sm sm:text-base leading-relaxed">
                        Ya. Seluruh pameran publik permanen, katalog artefak utama, serta tur virtual standar dapat diakses secara gratis oleh masyarakat umum. Untuk kebutuhan unduhan file RAW beresolusi tinggi dan arsip riset mendalam, tersedia keanggotaan peneliti dan institusi pendidikan.
                    </div>
                </div>

                <!-- FAQ 2 -->
                <div class="py-5">
                    <button onclick="toggleFAQ(2)" class="w-full flex items-center justify-between text-left py-2 focus:outline-none group">
                        <span class="font-aethelgard-serif text-xl sm:text-2xl text-aethelgard-navy-900 group-hover:text-aethelgard-champagne-600 transition-colors font-semibold">
                            Bagaimana cara mengajukan tur virtual terpandu untuk sekolah atau universitas?
                        </span>
                        <span id="faq-icon-2" class="text-aethelgard-champagne-600 text-lg transition-transform duration-300 ml-4">
                            <i class="fa-solid fa-plus"></i>
                        </span>
                    </button>
                    <div id="faq-answer-2" class="hidden pt-3 pb-2 text-aethelgard-navy-800/80 text-sm sm:text-base leading-relaxed">
                        Institusi pendidikan dapat menjadwalkan sesi tur virtual langsung bersama edukator museum kami melalui tombol WhatsApp layanan kuratorial di pojok layar. Sesi dapat disesuaikan dengan kurikulum sejarah, seni rupa, maupun arkeologi.
                    </div>
                </div>

                <!-- FAQ 3 -->
                <div class="py-5">
                    <button onclick="toggleFAQ(3)" class="w-full flex items-center justify-between text-left py-2 focus:outline-none group">
                        <span class="font-aethelgard-serif text-xl sm:text-2xl text-aethelgard-navy-900 group-hover:text-aethelgard-champagne-600 transition-colors font-semibold">
                            Dapatkah koleksi gambar dan model 3D digunakan untuk publikasi ilmiah?
                        </span>
                        <span id="faq-icon-3" class="text-aethelgard-champagne-600 text-lg transition-transform duration-300 ml-4">
                            <i class="fa-solid fa-plus"></i>
                        </span>
                    </button>
                    <div id="faq-answer-3" class="hidden pt-3 pb-2 text-aethelgard-navy-800/80 text-sm sm:text-base leading-relaxed">
                        Sebagian besar koleksi berstatus Domain Publik (CC0) dan bebas digunakan untuk publikasi akademik maupun non-komersial dengan mencantumkan kredit sitasi resmi Aethelgard Digital Heritage.
                    </div>
                </div>

                <!-- FAQ 4 -->
                <div class="py-5">
                    <button onclick="toggleFAQ(4)" class="w-full flex items-center justify-between text-left py-2 focus:outline-none group">
                        <span class="font-aethelgard-serif text-xl sm:text-2xl text-aethelgard-navy-900 group-hover:text-aethelgard-champagne-600 transition-colors font-semibold">
                            Apa fungsi Asisten Kurator AI di platform ini?
                        </span>
                        <span id="faq-icon-4" class="text-aethelgard-champagne-600 text-lg transition-transform duration-300 ml-4">
                            <i class="fa-solid fa-plus"></i>
                        </span>
                    </button>
                    <div id="faq-answer-4" class="hidden pt-3 pb-2 text-aethelgard-navy-800/80 text-sm sm:text-base leading-relaxed">
                        Asisten Kurator AI dilatih menggunakan literatur terkurasi museum untuk membantu Anda menemukan artefak berdasarkan periode sejarah, menerjemahkan prasasti kuno, serta merekomendasikan rute pameran sesuai minat Anda.
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- =================================================================
         6. FOOTER (Editorial Classic Navy & Champagne Gold)
         ================================================================= -->
    <footer id="kontak" class="bg-aethelgard-navy-950 text-aethelgard-champagne-200 border-t border-aethelgard-champagne-500/30">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 pb-12 border-b border-aethelgard-champagne-500/20">
                <!-- Col 1: Brand -->
                <div class="space-y-4">
                    <div class="flex items-center space-x-3">
                        <i class="fa-solid fa-landmark text-aethelgard-champagne-400 text-xl"></i>
                        <span class="font-aethelgard-serif text-2xl font-bold tracking-widest uppercase text-aethelgard-champagne-100">Aethelgard</span>
                    </div>
                    <p class="text-xs text-aethelgard-champagne-200/70 leading-relaxed">
                        Platform museum digital dan pusat pelestarian warisan budaya berbasis teknologi pemindaian presisi tinggi untuk generasi masa depan.
                    </p>
                    <div class="flex space-x-4 pt-2 text-aethelgard-champagne-400">
                        <a href="#kontak" aria-label="Instagram" class="hover:text-aethelgard-champagne-100 transition-colors"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#kontak" aria-label="YouTube" class="hover:text-aethelgard-champagne-100 transition-colors"><i class="fa-brands fa-youtube"></i></a>
                        <a href="#kontak" aria-label="X Twitter" class="hover:text-aethelgard-champagne-100 transition-colors"><i class="fa-brands fa-x-twitter"></i></a>
                    </div>
                </div>

                <!-- Col 2: Navigasi -->
                <div>
                    <h4 class="text-xs uppercase tracking-[0.22em] text-aethelgard-champagne-400 font-semibold mb-4">Navigasi Galeri</h4>
                    <ul class="space-y-2.5 text-xs tracking-wider">
                        <li><a href="#beranda" class="hover:text-aethelgard-champagne-400 transition-colors">Beranda Utama</a></li>
                        <li><a href="#koleksi" class="hover:text-aethelgard-champagne-400 transition-colors">Koleksi Terkurasi</a></li>
                        <li><a href="#tur-virtual" class="hover:text-aethelgard-champagne-400 transition-colors">Tur Virtual 360°</a></li>
                        <li><a href="#faq" class="hover:text-aethelgard-champagne-400 transition-colors">Panduan &amp; FAQ</a></li>
                    </ul>
                </div>

                <!-- Col 3: Departemen -->
                <div>
                    <h4 class="text-xs uppercase tracking-[0.22em] text-aethelgard-champagne-400 font-semibold mb-4">Layanan Institusi</h4>
                    <ul class="space-y-2.5 text-xs tracking-wider text-aethelgard-champagne-200/80">
                        <li>Digitalisasi &amp; Fotogrametri</li>
                        <li>Lisensi Arsip Akademik</li>
                        <li>Program Edukasi Sekolah</li>
                        <li>Restorasi Manuskrip Digital</li>
                    </ul>
                </div>

                <!-- Col 4: Kontak -->
                <div>
                    <h4 class="text-xs uppercase tracking-[0.22em] text-aethelgard-champagne-400 font-semibold mb-4">Sekretariat Kuratorial</h4>
                    <ul class="space-y-2.5 text-xs text-aethelgard-champagne-200/80 leading-relaxed">
                        <li><i class="fa-solid fa-location-dot text-aethelgard-champagne-400 mr-2"></i> Jl. Pusaka Merdeka No. 18, Pusat Kebudayaan</li>
                        <li><i class="fa-solid fa-envelope text-aethelgard-champagne-400 mr-2"></i> kurator@aethelgard-heritage.id</li>
                        <li><i class="fa-solid fa-clock text-aethelgard-champagne-400 mr-2"></i> Akses Digital: 24 Jam / Setiap Hari</li>
                    </ul>
                </div>
            </div>

            <div class="pt-8 flex flex-col sm:flex-row justify-between items-center text-[11px] tracking-[0.15em] text-aethelgard-champagne-300/60 uppercase">
                <p>&copy; 2026 Aethelgard Digital Heritage. Hak Cipta Dilindungi.</p>
                <p class="mt-2 sm:mt-0 font-aethelgard-serif italic normal-case text-sm text-aethelgard-champagne-400">“Merawat Masa Lalu, Menerangi Masa Depan.”</p>
            </div>
        </div>
    </footer>

    <!-- =================================================================
         7. FLOATING ACTION BUTTONS (AI Curator Button & WhatsApp Button)
         ================================================================= -->
    <div class="fixed bottom-6 right-6 z-50 flex flex-col items-end space-y-3">
        <!-- AI Curator Assistant Button -->
        <button onclick="toggleAIModal()" 
                class="group flex items-center space-x-2.5 bg-aethelgard-navy-900 hover:bg-aethelgard-navy-800 text-aethelgard-champagne-300 border border-aethelgard-champagne-400 px-4 py-3 rounded-full shadow-2xl transition-all duration-300 hover:scale-105">
            <span class="w-7 h-7 rounded-full bg-aethelgard-champagne-400 text-aethelgard-navy-950 flex items-center justify-center text-xs">
                <i class="fa-solid fa-wand-magic-sparkles"></i>
            </span>
            <span class="text-xs uppercase tracking-[0.15em] font-semibold pr-1">Kurator AI</span>
        </button>

        <!-- WhatsApp Button -->
        <a href="https://wa.me/6281234567890?text=Halo%20Kurator%20Aethelgard%2C%20saya%20ingin%20bertanya%20mengenai%20koleksi%20dan%20tur%20virtual%20museum." 
           target="_blank" 
           rel="noopener noreferrer"
           aria-label="Hubungi via WhatsApp"
           class="flex items-center space-x-2.5 bg-[#1E7E48] hover:bg-[#19693C] text-white px-4 py-3 rounded-full shadow-2xl transition-all duration-300 hover:scale-105 border border-white/15">
            <i class="fa-brands fa-whatsapp text-xl"></i>
            <span class="text-xs uppercase tracking-[0.14em] font-semibold pr-1">Info &amp; Tur WA</span>
        </a>
    </div>

    <!-- =================================================================
         INTERACTIVE AI CURATOR MODAL (For AI Button)
         ================================================================= -->
    <div id="ai-modal" class="hidden fixed inset-0 z-50 bg-aethelgard-navy-950/80 backdrop-blur-sm flex items-center justify-center p-4">
        <div class="bg-aethelgard-navy-900 border border-aethelgard-champagne-400/50 max-w-md w-full p-6 text-aethelgard-champagne-100 shadow-2xl relative">
            <button onclick="toggleAIModal()" aria-label="Tutup Modal" class="absolute top-4 right-4 text-aethelgard-champagne-300 hover:text-aethelgard-champagne-400">
                <i class="fa-solid fa-xmark text-lg"></i>
            </button>
            <div class="flex items-center space-x-3 border-b border-aethelgard-champagne-400/25 pb-4 mb-4">
                <div class="w-9 h-9 bg-aethelgard-champagne-400 text-aethelgard-navy-950 flex items-center justify-center">
                    <i class="fa-solid fa-wand-magic-sparkles"></i>
                </div>
                <div>
                    <h3 class="font-aethelgard-serif text-xl text-aethelgard-champagne-100 font-semibold">Asisten Kurator Digital</h3>
                    <p class="text-[11px] uppercase tracking-widest text-aethelgard-champagne-400">Pemandu Arsip &amp; Sejarah</p>
                </div>
            </div>
            <div id="ai-chat-box" class="bg-aethelgard-navy-950/70 border border-aethelgard-champagne-400/20 p-4 h-44 overflow-y-auto text-xs leading-relaxed text-aethelgard-champagne-200 space-y-3 mb-4">
                <p><strong class="text-aethelgard-champagne-400">Kurator AI:</strong> Selamat datang di Aethelgard Digital Heritage. Topik sejarah atau artefak apa yang ingin Anda telusuri hari ini?</p>
            </div>
            <form onsubmit="sendAIMessage(event)" class="flex gap-2">
                <input id="ai-input" type="text" placeholder="Contoh: Rekomendasi manuskrip kuno..." required
                       class="flex-1 bg-aethelgard-navy-950 border border-aethelgard-champagne-400/40 px-3 py-2.5 text-xs text-aethelgard-champagne-100 placeholder-champagne-300/40 focus:outline-none focus:border-aethelgard-champagne-400">
                <button type="submit" class="px-4 py-2.5 bg-aethelgard-champagne-400 text-aethelgard-navy-950 text-xs uppercase tracking-wider font-bold hover:bg-aethelgard-champagne-300">
                    Kirim
                </button>
            </form>
        </div>
    </div>

    <!-- =================================================================
         JAVASCRIPT: Navbar Mobile, Smooth Scroll, FAQ Accordion, AI Modal
         ================================================================= -->
    <script>
        // 1. Mobile Menu Toggle & Auto-Close on Link Click
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        const mobileNavLinks = document.querySelectorAll('.mobile-nav-link');

        mobileMenuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        mobileNavLinks.forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.add('hidden');
            });
        });

        // 2. FAQ Accordion Logic
        function toggleFAQ(id) {
            const answer = document.getElementById(`faq-answer-${id}`);
            const icon = document.getElementById(`faq-icon-${id}`);
            const isHidden = answer.classList.contains('hidden');

            // Tutup semua FAQ lain agar rapi
            for (let i = 1; i <= 4; i++) {
                document.getElementById(`faq-answer-${i}`).classList.add('hidden');
                document.getElementById(`faq-icon-${i}`).innerHTML = '<i class="fa-solid fa-plus"></i>';
            }

            if (isHidden) {
                answer.classList.remove('hidden');
                icon.innerHTML = '<i class="fa-solid fa-minus"></i>';
            }
        }

        // 3. AI Curator Modal Logic
        function toggleAIModal() {
            const modal = document.getElementById('ai-modal');
            modal.classList.toggle('hidden');
        }

        function sendAIMessage(e) {
            e.preventDefault();
            const input = document.getElementById('ai-input');
            const chatBox = document.getElementById('ai-chat-box');
            const userText = input.value.trim();
            if (!userText) return;

            const userMessage = document.createElement('p');
            const userLabel = document.createElement('strong');
            userLabel.className = 'text-white';
            userLabel.textContent = 'Anda:';
            userMessage.append(userLabel, document.createTextNode(` ${userText}`));
            chatBox.append(userMessage);
            input.value = '';

            setTimeout(() => {
                const assistantMessage = document.createElement('p');
                const assistantLabel = document.createElement('strong');
                const recommendedArtifact = document.createElement('em');
                assistantLabel.className = 'text-aethelgard-champagne-400';
                assistantLabel.textContent = 'Kurator AI:';
                recommendedArtifact.textContent = 'Kodeks Kartografi Maritim (1492)';
                assistantMessage.append(
                    assistantLabel,
                    document.createTextNode(' Saya merekomendasikan '),
                    recommendedArtifact,
                    document.createTextNode(' di Ruang Galeri II. Anda dapat mengklik bagian "Koleksi" pada menu atas untuk melihat detail resolusi tingginya.')
                );
                chatBox.append(assistantMessage);
                chatBox.scrollTop = chatBox.scrollHeight;
            }, 500);
        }
    </script>
</body>
</html>