<!DOCTYPE html>
<html lang="id" class="scroll-smooth rubra-html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RUBRA MEMORIA — Artistic Experimental Heritage Exhibition</title>
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts: Syne (Avant-Garde Artistic Display), Cormorant Garamond & Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,600;1,500;1,700&family=Plus+Jakarta+Sans:wght@300;400;500;600&family=Syne:wght@600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="rubra-page font-rubra-sans antialiased selection:bg-rubra-burgundy-400 selection:text-rubra-burgundy-950 rubra-grain-overlay overflow-x-hidden">

    <!-- =================================================================
         1. TOPBAR & NAVBAR (Sticky Artistic Glassmorphic + Functional Links)
         ================================================================= -->
    <header class="sticky top-0 z-40 rubra-wine-glass border-b border-rubra-burgundy-400/25">
        <!-- Experimental Marquee / Topbar -->
        <div class="bg-rubra-burgundy-950 text-rubra-burgundy-300 text-[11px] py-2 px-4 text-center tracking-[0.22em] uppercase border-b border-rubra-burgundy-500/25">
            Ekshibisi Sensorik Musim Ini &mdash; <span class="font-rubra-editorial italic normal-case text-sm text-rubra-parchment-100">“Gema Warna &amp; Memori Tenun Nusantara”</span> &bull; Tiket Tersedia
        </div>

        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Artistic Monogram Logo -->
                <a href="#beranda" class="flex items-center space-x-3 group">
                    <div class="w-11 h-11 rubra-art-blob-1 bg-gradient-to-tr from-rubra-burgundy-700 to-rubra-burgundy-400 flex items-center justify-center text-rubra-parchment-100 shadow-lg shadow-rubra-burgundy-600/40 group-hover:rotate-12 transition-transform duration-500">
                        <span class="font-rubra-avant font-extrabold text-base tracking-tighter">RM</span>
                    </div>
                    <div>
                        <span class="font-rubra-avant text-lg sm:text-xl font-extrabold tracking-wider text-rubra-parchment-100 block leading-none">RUBRA<span class="text-rubra-burgundy-400">.MEMORIA</span></span>
                        <span class="font-rubra-editorial italic text-xs text-rubra-burgundy-300 block mt-0.5">Experimental Heritage Space</span>
                    </div>
                </a>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-8 text-xs uppercase tracking-[0.18em] font-medium text-rubra-parchment-200">
                    <a href="#beranda" class="hover:text-rubra-burgundy-300 transition-colors">Beranda</a>
                    <a href="#instalasi" class="hover:text-rubra-burgundy-300 transition-colors">Instalasi</a>
                    <a href="#tiket" class="hover:text-rubra-burgundy-300 transition-colors">Tiket &amp; Pass</a>
                    <a href="#faq" class="hover:text-rubra-burgundy-300 transition-colors">FAQ</a>
                    <a href="#kontak" class="hover:text-rubra-burgundy-300 transition-colors">Kontak</a>
                </div>

                <!-- CTA & Mobile Toggle -->
                <div class="flex items-center space-x-3">
                    <a href="#tiket" class="hidden sm:inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-rubra-burgundy-500 hover:bg-rubra-burgundy-400 text-rubra-parchment-100 font-rubra-avant font-bold text-xs uppercase tracking-wider shadow-lg shadow-rubra-burgundy-600/35 transition-all">
                        Reservasi Sesi <i class="fa-solid fa-arrow-up-right-from-square text-[10px]"></i>
                    </a>
                    <button id="mobile-menu-btn" aria-label="Buka Menu" class="md:hidden text-rubra-parchment-100 hover:text-rubra-burgundy-300 p-2">
                        <i class="fa-solid fa-bars-staggered text-xl"></i>
                    </button>
                </div>
            </div>

            <!-- Mobile Dropdown Menu -->
            <div id="mobile-menu" class="hidden md:hidden pb-5 pt-2 border-t border-rubra-burgundy-400/20 space-y-2 text-xs uppercase tracking-[0.2em]">
                <a href="#beranda" class="mobile-link block py-2 text-rubra-parchment-100 hover:text-rubra-burgundy-300">Beranda</a>
                <a href="#instalasi" class="mobile-link block py-2 text-rubra-parchment-100 hover:text-rubra-burgundy-300">Instalasi Eksperimental</a>
                <a href="#tiket" class="mobile-link block py-2 text-rubra-parchment-100 hover:text-rubra-burgundy-300">Tiket &amp; Pass</a>
                <a href="#faq" class="mobile-link block py-2 text-rubra-parchment-100 hover:text-rubra-burgundy-300">FAQ</a>
                <a href="#kontak" class="mobile-link block py-2 text-rubra-parchment-100 hover:text-rubra-burgundy-300">Lokasi &amp; Kontak</a>
            </div>
        </nav>
    </header>

    <!-- =================================================================
         2. HERO BANNER (Asymmetric Artistic Experimental Composition)
         ================================================================= -->
    <section id="beranda" class="relative py-16 sm:py-24 lg:py-28 border-b border-rubra-burgundy-400/20 overflow-hidden">
        <!-- Ambient Wine Glow Orbs -->
        <div class="absolute -top-24 right-10 w-96 h-96 bg-rubra-burgundy-600/25 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute bottom-0 -left-24 w-[28rem] h-[28rem] bg-rubra-burgundy-700/20 rounded-full blur-3xl pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                
                <!-- Left Asymmetric Typography (7 Cols) -->
                <div class="lg:col-span-7 space-y-7">
                    <div class="inline-flex items-center gap-3 px-4 py-1.5 rounded-full border border-rubra-burgundy-400/40 bg-rubra-burgundy-900/70 text-rubra-burgundy-300 text-xs tracking-widest uppercase">
                        <span class="w-2 h-2 rounded-full bg-rubra-burgundy-400 animate-pulse"></span>
                        <span>Artistic &amp; Tactile Heritage Lab</span>
                    </div>

                    <h1 class="font-rubra-avant text-4xl sm:text-5xl lg:text-6xl font-extrabold text-rubra-parchment-100 leading-[1.08] tracking-tight">
                        Merajut Ulang <span class="font-rubra-editorial italic font-bold text-rubra-burgundy-300 text-5xl sm:text-6xl lg:text-7xl">Warisan</span> Lewat Cahaya &amp; Sentuhan.
                    </h1>

                    <p class="text-rubra-parchment-200/80 text-base sm:text-lg leading-relaxed max-w-xl font-light">
                        Sebuah pameran interaktif eksperimental tempat tekstil kuno, pigmentasi alam, dan syair sejarah bertransformasi menjadi instalasi cahaya responsif dan lanskap suara spasial.
                    </p>

                    <div class="flex flex-wrap items-center gap-4 pt-2">
                        <a href="#instalasi" class="px-8 py-4 rounded-full bg-rubra-parchment-100 hover:bg-rubra-burgundy-300 text-rubra-burgundy-950 font-rubra-avant font-bold text-xs uppercase tracking-[0.16em] transition-all shadow-xl">
                            Eksplorasi Ruang <i class="fa-solid fa-arrow-right ml-2"></i>
                        </a>
                        <button onclick="toggleAIModal()" class="px-7 py-4 rounded-full rubra-wine-glass hover:border-rubra-burgundy-300 text-rubra-parchment-100 font-rubra-avant font-semibold text-xs uppercase tracking-[0.16em] transition-all">
                            <i class="fa-solid fa-wand-magic-sparkles text-rubra-burgundy-300 mr-2"></i> Kurator AI
                        </button>
                    </div>

                    <!-- Artistic Metrics Strip -->
                    <div class="grid grid-cols-3 gap-6 pt-6 border-t border-rubra-burgundy-400/20 max-w-lg">
                        <div>
                            <p class="font-rubra-avant text-2xl sm:text-3xl font-extrabold text-rubra-burgundy-300">05</p>
                            <p class="text-xs text-rubra-parchment-200/70 mt-1">Ruang Instalasi Sensorik</p>
                        </div>
                        <div>
                            <p class="font-rubra-avant text-2xl sm:text-3xl font-extrabold text-rubra-burgundy-300">360°</p>
                            <p class="text-xs text-rubra-parchment-200/70 mt-1">Pemetaan Cahaya Kain</p>
                        </div>
                        <div>
                            <p class="font-rubra-avant text-2xl sm:text-3xl font-extrabold text-rubra-burgundy-300">AR/VR</p>
                            <p class="text-xs text-rubra-parchment-200/70 mt-1">Arsip Tenun Interaktif</p>
                        </div>
                    </div>
                </div>

                <!-- Right Organic Sculptural Frame (5 Cols) -->
                <div class="lg:col-span-5 relative">
                    <div class="relative mx-auto max-w-md">
                        <!-- Decorative Offset Border Blob -->
                        <div class="absolute -inset-3 rubra-art-blob-2 border border-rubra-burgundy-400/45 rotate-3 pointer-events-none"></div>
                        
                        <div class="relative rubra-art-blob-1 overflow-hidden aspect-[4/5] bg-rubra-burgundy-900 border-2 border-rubra-burgundy-400/40 shadow-2xl">
                            <img src="https://images.unsplash.com/photo-1547891654-e66ed7ebb968?auto=format&fit=crop&w=900&q=80" 
                                 alt="Instalasi Seni Eksperimental Burgundy" 
                                 class="w-full h-full object-cover opacity-90 hover:scale-105 transition-transform duration-700">
                            <div class="absolute inset-0 bg-gradient-to-t from-rubra-burgundy-950 via-rubra-burgundy-950/25 to-transparent"></div>
                            
                            <div class="absolute bottom-7 left-7 right-7 text-center">
                                <span class="text-[10px] uppercase tracking-[0.25em] text-rubra-burgundy-300 block">Instalasi Utama &bull; Ruang Crimson</span>
                                <p class="font-rubra-editorial italic text-2xl text-rubra-parchment-100 mt-1">“Simfoni Benang &amp; Waktu”</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- =================================================================
         3. AVANT-GARDE INSTALLATIONS CATALOG (Asymmetric Staggered Cards)
         ================================================================= -->
    <section id="instalasi" class="py-20 lg:py-28 border-b border-rubra-burgundy-400/20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-6">
                <div>
                    <span class="text-xs uppercase tracking-[0.26em] text-rubra-burgundy-300 font-semibold">Katalog Ruang &amp; Medium</span>
                    <h2 class="font-rubra-avant text-3xl sm:text-4xl lg:text-5xl font-extrabold text-rubra-parchment-100 mt-2">
                        Instalasi Warisan <span class="font-rubra-editorial italic font-normal text-rubra-burgundy-300">Eksperimental</span>
                    </h2>
                </div>
                <p class="text-sm text-rubra-parchment-200/75 max-w-md leading-relaxed">
                    Perpaduan artefak tekstil autentik, sensor sentuhan kapasitif, dan proyeksi generatif yang bereaksi terhadap gerak langkah pengunjung.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-start">
                <!-- Card 1 -->
                <article class="rubra-wine-card rounded-3xl p-6">
                    <div class="aspect-[4/3] rounded-2xl overflow-hidden mb-5 bg-rubra-burgundy-900 relative">
                        <img src="https://images.unsplash.com/photo-1513364776144-60967b0f800f?auto=format&fit=crop&w=800&q=80" 
                             alt="Pigmen Warna Alam" class="w-full h-full object-cover">
                        <span class="absolute top-3 left-3 px-3 py-1 rounded-full bg-rubra-burgundy-950/85 text-rubra-burgundy-300 text-[10px] uppercase tracking-widest border border-rubra-burgundy-400/30">
                            Ruang 01 &bull; Tactile
                        </span>
                    </div>
                    <h3 class="font-rubra-avant text-xl font-bold text-rubra-parchment-100 mb-2">Alkimia Pigmen &amp; Tekstil</h3>
                    <p class="text-sm text-rubra-parchment-200/75 leading-relaxed mb-5">
                        Sentuh sampel serat tenun kuno yang terhubung dengan sensor suara; setiap motif memicu alunan instrumen tradisional dan kisah pewarnaan alam.
                    </p>
                    <div class="pt-4 border-t border-rubra-burgundy-400/20 flex items-center justify-between text-xs text-rubra-burgundy-300">
                        <span><i class="fa-solid fa-hand-sparkles mr-1.5"></i> Capacitive Tapestry</span>
                        <a href="#tiket" class="font-rubra-avant font-bold hover:text-white">Pesan Sesi &rarr;</a>
                    </div>
                </article>

                <!-- Card 2 (Staggered Down on Desktop for Experimental Feel) -->
                <article class="rubra-wine-card rounded-3xl p-6 md:mt-10">
                    <div class="aspect-[4/3] rounded-2xl overflow-hidden mb-5 bg-rubra-burgundy-900 relative">
                        <img src="https://images.unsplash.com/photo-1579783902614-a3fb3927b6a5?auto=format&fit=crop&w=800&q=80" 
                             alt="Proyeksi Fresko Digital" class="w-full h-full object-cover">
                        <span class="absolute top-3 left-3 px-3 py-1 rounded-full bg-rubra-burgundy-500 text-rubra-parchment-100 text-[10px] uppercase tracking-widest font-bold">
                            Ruang 02 &bull; Sorotan Utama
                        </span>
                    </div>
                    <h3 class="font-rubra-avant text-xl font-bold text-rubra-parchment-100 mb-2">Labirin Cahaya Manuskrip</h3>
                    <p class="text-sm text-rubra-parchment-200/75 leading-relaxed mb-5">
                        Tirai sutra transparan sepanjang 18 meter yang memproyeksikan kaligrafi dan iluminasi naskah kuno secara dinamis mengikuti pergerakan tubuh Anda.
                    </p>
                    <div class="pt-4 border-t border-rubra-burgundy-400/20 flex items-center justify-between text-xs text-rubra-burgundy-300">
                        <span><i class="fa-solid fa-eye mr-1.5"></i> LiDAR Motion Mapping</span>
                        <a href="#tiket" class="font-rubra-avant font-bold hover:text-white">Pesan Sesi &rarr;</a>
                    </div>
                </article>

                <!-- Card 3 -->
                <article class="rubra-wine-card rounded-3xl p-6">
                    <div class="aspect-[4/3] rounded-2xl overflow-hidden mb-5 bg-rubra-burgundy-900 relative">
                        <img src="https://images.unsplash.com/photo-1507676184212-d03ab07a01bf?auto=format&fit=crop&w=800&q=80" 
                             alt="Ruang Akustik Spasial" class="w-full h-full object-cover">
                        <span class="absolute top-3 left-3 px-3 py-1 rounded-full bg-rubra-burgundy-950/85 text-rubra-burgundy-300 text-[10px] uppercase tracking-widest border border-rubra-burgundy-400/30">
                            Ruang 03 &bull; Sonic Vault
                        </span>
                    </div>
                    <h3 class="font-rubra-avant text-xl font-bold text-rubra-parchment-100 mb-2">Kubah Gema Lisan</h3>
                    <p class="text-sm text-rubra-parchment-200/75 leading-relaxed mb-5">
                        Instalasi akustik melingkar yang merekonstruksi pembacaan hikayat dan sastra klasik dalam tata suara 24-kanal yang intim.
                    </p>
                    <div class="pt-4 border-t border-rubra-burgundy-400/20 flex items-center justify-between text-xs text-rubra-burgundy-300">
                        <span><i class="fa-solid fa-wave-square mr-1.5"></i> 24-Channel Spatial Audio</span>
                        <a href="#tiket" class="font-rubra-avant font-bold hover:text-white">Pesan Sesi &rarr;</a>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <!-- =================================================================
         4. TICKETS, VIRTUAL PASS & INSTITUTIONAL BOOKING
         ================================================================= -->
    <section id="tiket" class="py-20 bg-rubra-burgundy-900/45 border-b border-rubra-burgundy-400/20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-14">
                <span class="text-xs uppercase tracking-[0.25em] text-rubra-burgundy-300 font-semibold">Tiket &amp; Kunjungan Kelompok</span>
                <h2 class="font-rubra-avant text-3xl sm:text-4xl font-extrabold text-rubra-parchment-100 mt-2">Pilih Pengalaman Anda</h2>
                <p class="text-sm text-rubra-parchment-200/75 mt-3">Tersedia tiket kunjungan galeri langsung, sesi malam eksklusif, maupun paket rombongan akademik.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Tier 1 -->
                <div class="rubra-wine-card rounded-3xl p-7 flex flex-col justify-between">
                    <div>
                        <span class="text-xs uppercase tracking-widest text-rubra-burgundy-300">Digital Remote</span>
                        <h3 class="font-rubra-avant text-2xl font-bold text-rubra-parchment-100 mt-1">Virtual Gallery Pass</h3>
                        <p class="font-rubra-avant text-3xl font-extrabold text-rubra-burgundy-300 mt-4">Rp 50.000 <span class="text-xs font-rubra-sans font-normal text-rubra-parchment-200/70">/ akses 72 jam</span></p>
                        <ul class="space-y-3 text-sm text-rubra-parchment-100/85 mt-6">
                            <li><i class="fa-solid fa-check text-rubra-burgundy-400 mr-2"></i> Tur virtual interaktif 360° semua ruang</li>
                            <li><i class="fa-solid fa-check text-rubra-burgundy-400 mr-2"></i> Akses arsip tekstil &amp; manuskrip 8K</li>
                            <li><i class="fa-solid fa-check text-rubra-burgundy-400 mr-2"></i> Panduan suara kurator bilingual</li>
                        </ul>
                    </div>
                    <a href="https://wa.me/6281234567890?text=Halo%20Rubra%20Memoria%2C%20saya%20ingin%20memesan%20Virtual%20Gallery%20Pass." target="_blank" class="mt-8 block text-center py-3.5 rounded-full border border-rubra-burgundy-300 text-rubra-parchment-100 hover:bg-rubra-burgundy-300 hover:text-rubra-burgundy-950 font-rubra-avant font-bold text-xs uppercase tracking-wider transition-all" rel="noopener noreferrer">
                        Pesan Virtual Pass
                    </a>
                </div>

                <!-- Tier 2 (Featured) -->
                <div class="rounded-3xl p-7 bg-gradient-to-b from-rubra-burgundy-700 to-rubra-burgundy-950 border-2 border-rubra-burgundy-300 shadow-2xl shadow-rubra-burgundy-600/30 flex flex-col justify-between relative">
                    <span class="absolute -top-3.5 right-6 px-3.5 py-1 rounded-full bg-rubra-parchment-100 text-rubra-burgundy-950 font-rubra-avant text-[10px] font-extrabold uppercase tracking-wider">
                        Paling Diminati
                    </span>
                    <div>
                        <span class="text-xs uppercase tracking-widest text-rubra-burgundy-300">Onsite Sensory</span>
                        <h3 class="font-rubra-avant text-2xl font-bold text-rubra-parchment-100 mt-1">Full Exhibition Pass</h3>
                        <p class="font-rubra-avant text-3xl font-extrabold text-rubra-parchment-100 mt-4">Rp 135.000 <span class="text-xs font-rubra-sans font-normal text-rubra-parchment-200/75">/ pengunjung</span></p>
                        <ul class="space-y-3 text-sm text-rubra-parchment-100 mt-6">
                            <li><i class="fa-solid fa-check text-rubra-burgundy-300 mr-2"></i> Akses seluruh 5 Ruang Instalasi Eksperimental</li>
                            <li><i class="fa-solid fa-check text-rubra-burgundy-300 mr-2"></i> Perangkat AR Lens selama kunjungan</li>
                            <li><i class="fa-solid fa-check text-rubra-burgundy-300 mr-2"></i> Katalog mini cetak edisi pameran</li>
                        </ul>
                    </div>
                    <a href="https://wa.me/6281234567890?text=Halo%20Rubra%20Memoria%2C%20saya%20ingin%20reservasi%20Full%20Exhibition%20Pass." target="_blank" class="mt-8 block text-center py-3.5 rounded-full bg-rubra-parchment-100 hover:bg-rubra-burgundy-300 text-rubra-burgundy-950 font-rubra-avant font-bold text-xs uppercase tracking-wider transition-all" rel="noopener noreferrer">
                        Reservasi Tiket Galeri
                    </a>
                </div>

                <!-- Tier 3 -->
                <div class="rubra-wine-card rounded-3xl p-7 flex flex-col justify-between">
                    <div>
                        <span class="text-xs uppercase tracking-widest text-rubra-burgundy-300">Akademik &amp; Komunitas</span>
                        <h3 class="font-rubra-avant text-2xl font-bold text-rubra-parchment-100 mt-1">Group &amp; Institutional</h3>
                        <p class="font-rubra-avant text-3xl font-extrabold text-rubra-burgundy-300 mt-4">Hemat 25% <span class="text-xs font-rubra-sans font-normal text-rubra-parchment-200/70">/ min. 15 orang</span></p>
                        <ul class="space-y-3 text-sm text-rubra-parchment-100/85 mt-6">
                            <li><i class="fa-solid fa-check text-rubra-burgundy-400 mr-2"></i> Tur privat terpandu bersama kurator</li>
                            <li><i class="fa-solid fa-check text-rubra-burgundy-400 mr-2"></i> Sesi diskusi proses kreatif &amp; digitalisasi</li>
                            <li><i class="fa-solid fa-check text-rubra-burgundy-400 mr-2"></i> E-Sertifikat kunjungan studi budaya</li>
                        </ul>
                    </div>
                    <a href="https://wa.me/6281234567890?text=Halo%20Rubra%20Memoria%2C%20saya%20ingin%20menanyakan%20paket%20rombongan%20institusi." target="_blank" class="mt-8 block text-center py-3.5 rounded-full border border-rubra-burgundy-300 text-rubra-parchment-100 hover:bg-rubra-burgundy-300 hover:text-rubra-burgundy-950 font-rubra-avant font-bold text-xs uppercase tracking-wider transition-all" rel="noopener noreferrer">
                        Hubungi Koordinator Grup
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- =================================================================
         5. FAQ SECTION (Interactive Accordion)
         ================================================================= -->
    <section id="faq" class="py-20 lg:py-28 border-b border-rubra-burgundy-400/20">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <span class="text-xs uppercase tracking-[0.25em] text-rubra-burgundy-300 font-semibold">Informasi Pengunjung</span>
                <h2 class="font-rubra-avant text-3xl sm:text-4xl font-extrabold text-rubra-parchment-100 mt-2">Pertanyaan yang Sering Diajukan</h2>
            </div>

            <div class="space-y-4">
                <!-- FAQ 1 -->
                <div class="rubra-wine-card rounded-2xl overflow-hidden">
                    <button onclick="toggleFAQ(1)" class="w-full px-6 py-4 text-left flex items-center justify-between focus:outline-none">
                        <span class="font-rubra-avant font-bold text-rubra-parchment-100 text-base sm:text-lg">Apakah pengunjung boleh menyentuh instalasi tekstil di dalam galeri?</span>
                        <i id="faq-icon-1" class="fa-solid fa-chevron-down text-rubra-burgundy-300 transition-transform duration-300 ml-4"></i>
                    </button>
                    <div id="faq-answer-1" class="hidden px-6 pb-5 text-sm text-rubra-parchment-200/80 leading-relaxed border-t border-rubra-burgundy-400/15 pt-3">
                        Ya, pada zona <em>Tactile Tapestry</em> tersedia panel replika tenun bersensor yang memang dirancang khusus untuk disentuh pengunjung guna memicu respons visual dan audio. Artefak asli di vitrin tetap dilindungi kaca konservasi.
                    </div>
                </div>

                <!-- FAQ 2 -->
                <div class="rubra-wine-card rounded-2xl overflow-hidden">
                    <button onclick="toggleFAQ(2)" class="w-full px-6 py-4 text-left flex items-center justify-between focus:outline-none">
                        <span class="font-rubra-avant font-bold text-rubra-parchment-100 text-base sm:text-lg">Berapa lama durasi ideal untuk menikmati seluruh pameran?</span>
                        <i id="faq-icon-2" class="fa-solid fa-chevron-down text-rubra-burgundy-300 transition-transform duration-300 ml-4"></i>
                    </button>
                    <div id="faq-answer-2" class="hidden px-6 pb-5 text-sm text-rubra-parchment-200/80 leading-relaxed border-t border-rubra-burgundy-400/15 pt-3">
                        Waktu kunjungan rata-rata adalah 75 hingga 90 menit untuk menjelajahi kelima ruang instalasi dan mengikuti pertunjukan proyeksi utama di Ruang Crimson.
                    </div>
                </div>

                <!-- FAQ 3 -->
                <div class="rubra-wine-card rounded-2xl overflow-hidden">
                    <button onclick="toggleFAQ(3)" class="w-full px-6 py-4 text-left flex items-center justify-between focus:outline-none">
                        <span class="font-rubra-avant font-bold text-rubra-parchment-100 text-base sm:text-lg">Apakah tiket dapat dibeli langsung di lokasi (on the spot)?</span>
                        <i id="faq-icon-3" class="fa-solid fa-chevron-down text-rubra-burgundy-300 transition-transform duration-300 ml-4"></i>
                    </button>
                    <div id="faq-answer-3" class="hidden px-6 pb-5 text-sm text-rubra-parchment-200/80 leading-relaxed border-t border-rubra-burgundy-400/15 pt-3">
                        Tiket tersedia di loket selama kuota per jam masih mencukupi. Namun karena kapasitas ruang sensorik dibatasi maksimal 25 orang per sesi agar interaksi optimal, kami sangat menyarankan reservasi slot lebih awal.
                    </div>
                </div>

                <!-- FAQ 4 -->
                <div class="rubra-wine-card rounded-2xl overflow-hidden">
                    <button onclick="toggleFAQ(4)" class="w-full px-6 py-4 text-left flex items-center justify-between focus:outline-none">
                        <span class="font-rubra-avant font-bold text-rubra-parchment-100 text-base sm:text-lg">Bagaimana cara kerja Virtual Gallery Pass bagi pengunjung jarak jauh?</span>
                        <i id="faq-icon-4" class="fa-solid fa-chevron-down text-rubra-burgundy-300 transition-transform duration-300 ml-4"></i>
                    </button>
                    <div id="faq-answer-4" class="hidden px-6 pb-5 text-sm text-rubra-parchment-200/80 leading-relaxed border-t border-rubra-burgundy-400/15 pt-3">
                        Setelah pemesanan dikonfirmasi, Anda akan menerima tautan akses pribadi yang dapat dibuka melalui peramban laptop, ponsel, maupun headset VR selama 72 jam penuh.
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- =================================================================
         6. FOOTER (Gallery Location, Hours & Links)
         ================================================================= -->
    <footer id="kontak" class="bg-rubra-burgundy-950 text-rubra-parchment-200 pt-16 pb-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 pb-12 border-b border-rubra-burgundy-400/20">
                <!-- Brand -->
                <div class="space-y-4">
                    <div class="flex items-center space-x-2.5">
                        <div class="w-8 h-8 rubra-art-blob-1 bg-rubra-burgundy-500 flex items-center justify-center text-rubra-parchment-100 font-rubra-avant font-bold text-xs">RM</div>
                        <span class="font-rubra-avant text-lg font-extrabold tracking-wider text-rubra-parchment-100">RUBRA.MEMORIA</span>
                    </div>
                    <p class="text-xs text-rubra-parchment-200/70 leading-relaxed">
                        Laboratorium seni eksperimental dan pameran warisan budaya interaktif yang menjembatani tradisi masa lalu dengan teknologi sensorik masa kini.
                    </p>
                    <div class="flex space-x-4 text-rubra-burgundy-300 pt-1">
                        <a href="#kontak" aria-label="Instagram" class="hover:text-white"><i class="fa-brands fa-instagram text-lg"></i></a>
                        <a href="#kontak" aria-label="YouTube" class="hover:text-white"><i class="fa-brands fa-youtube text-lg"></i></a>
                        <a href="#kontak" aria-label="TikTok" class="hover:text-white"><i class="fa-brands fa-tiktok text-lg"></i></a>
                    </div>
                </div>

                <!-- Navigasi -->
                <div>
                    <h4 class="font-rubra-avant text-xs uppercase tracking-widest text-rubra-burgundy-300 font-bold mb-4">Navigasi Galeri</h4>
                    <ul class="space-y-2.5 text-xs">
                        <li><a href="#beranda" class="hover:text-rubra-burgundy-300 transition-colors">Beranda Utama</a></li>
                        <li><a href="#instalasi" class="hover:text-rubra-burgundy-300 transition-colors">Instalasi Eksperimental</a></li>
                        <li><a href="#tiket" class="hover:text-rubra-burgundy-300 transition-colors">Tiket &amp; Virtual Pass</a></li>
                        <li><a href="#faq" class="hover:text-rubra-burgundy-300 transition-colors">FAQ Pengunjung</a></li>
                    </ul>
                </div>

                <!-- Lokasi & Jam -->
                <div>
                    <h4 class="font-rubra-avant text-xs uppercase tracking-widest text-rubra-burgundy-300 font-bold mb-4">Lokasi &amp; Jam Buka</h4>
                    <ul class="space-y-2.5 text-xs text-rubra-parchment-200/80 leading-relaxed">
                        <li><i class="fa-solid fa-location-dot text-rubra-burgundy-400 mr-2"></i> Gedung Arsip Seni Kontemporer, Distrik Budaya</li>
                        <li><i class="fa-regular fa-clock text-rubra-burgundy-400 mr-2"></i> Selasa – Minggu: 11.00 – 21.00 WIB</li>
                        <li><i class="fa-solid fa-moon text-rubra-burgundy-400 mr-2"></i> Sesi Malam Eksklusif: Jumat &amp; Sabtu</li>
                    </ul>
                </div>

                <!-- Reservasi -->
                <div>
                    <h4 class="font-rubra-avant text-xs uppercase tracking-widest text-rubra-burgundy-300 font-bold mb-4">Layanan Kuratorial</h4>
                    <p class="text-xs text-rubra-parchment-200/75 leading-relaxed mb-4">
                        Pertanyaan seputar jadwal sesi, kolaborasi seniman, atau kunjungan studi institusi?
                    </p>
                    <a href="https://wa.me/6281234567890" target="_blank" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-full bg-rubra-burgundy-800 hover:bg-rubra-burgundy-700 border border-rubra-burgundy-400/40 text-xs font-rubra-avant font-bold text-rubra-parchment-100 transition-colors" rel="noopener noreferrer">
                        <i class="fa-brands fa-whatsapp text-emerald-400 text-base"></i> Chat Admin Galeri
                    </a>
                </div>
            </div>

            <div class="pt-8 flex flex-col sm:flex-row justify-between items-center text-xs text-rubra-parchment-200/50">
                <p>&copy; 2026 Rubra Memoria Experimental Heritage. Hak Cipta Dilindungi.</p>
                <p class="mt-2 sm:mt-0 font-rubra-editorial italic text-sm text-rubra-burgundy-300">“Every thread holds a memory.”</p>
            </div>
        </div>
    </footer>

    <!-- =================================================================
         7. FLOATING ACTION BUTTONS (AI Guide Button & WhatsApp Button)
         ================================================================= -->
    <div class="fixed bottom-6 right-6 z-50 flex flex-col items-end space-y-3">
        <!-- AI Exhibition Assistant Button -->
        <button onclick="toggleAIModal()" 
                class="flex items-center gap-2.5 bg-rubra-burgundy-900/95 hover:bg-rubra-burgundy-800 text-rubra-parchment-100 border border-rubra-burgundy-300 px-4 py-3 rounded-full shadow-2xl shadow-rubra-burgundy-600/30 transition-all hover:scale-105">
            <span class="w-7 h-7 rounded-full bg-rubra-burgundy-300 text-rubra-burgundy-950 flex items-center justify-center text-xs">
                <i class="fa-solid fa-wand-magic-sparkles"></i>
            </span>
            <span class="font-rubra-avant text-xs font-bold uppercase tracking-wider pr-1">Kurator AI</span>
        </button>

        <!-- WhatsApp Button -->
        <a href="https://wa.me/6281234567890?text=Halo%20Rubra%20Memoria%2C%20saya%20ingin%20bertanya%20mengenai%20jadwal%20pameran%20interaktif." 
           target="_blank" 
           rel="noopener noreferrer"
           aria-label="Chat WhatsApp"
           class="flex items-center gap-2.5 bg-emerald-600 hover:bg-emerald-500 text-white px-4 py-3 rounded-full shadow-2xl transition-all hover:scale-105 border border-white/20">
            <i class="fa-brands fa-whatsapp text-xl"></i>
            <span class="font-rubra-avant text-xs font-bold uppercase tracking-wider pr-1">WhatsApp</span>
        </a>
    </div>

    <!-- =================================================================
         INTERACTIVE AI CURATOR MODAL
         ================================================================= -->
    <div id="ai-modal" class="hidden fixed inset-0 z-50 bg-rubra-burgundy-950/85 backdrop-blur-md flex items-center justify-center p-4">
        <div class="rubra-wine-glass rounded-3xl max-w-md w-full p-6 shadow-2xl relative">
            <button onclick="toggleAIModal()" aria-label="Tutup" class="absolute top-4 right-4 text-rubra-parchment-200 hover:text-white">
                <i class="fa-solid fa-xmark text-lg"></i>
            </button>
            <div class="flex items-center gap-3 pb-4 mb-4 border-b border-rubra-burgundy-400/25">
                <div class="w-9 h-9 rounded-full bg-rubra-burgundy-300 text-rubra-burgundy-950 flex items-center justify-center">
                    <i class="fa-solid fa-wand-magic-sparkles"></i>
                </div>
                <div>
                    <h3 class="font-rubra-avant text-lg font-bold text-rubra-parchment-100">Rubra AI Guide</h3>
                    <p class="text-[11px] text-rubra-burgundy-300">Pemandu Instalasi, Slot Tiket &amp; Kunjungan Grup</p>
                </div>
            </div>
            <div id="ai-chat-box" class="bg-rubra-burgundy-950/80 border border-rubra-burgundy-400/20 rounded-2xl p-4 h-44 overflow-y-auto text-xs text-rubra-parchment-100 space-y-3 mb-4">
                <p><strong class="text-rubra-burgundy-300">Kurator AI:</strong> Selamat datang di Rubra Memoria. Ingin tahu konsep instalasi cahaya kami, ketersediaan slot hari ini, atau paket kunjungan rombongan?</p>
            </div>
            <form onsubmit="sendAIMessage(event)" class="flex gap-2">
                <input id="ai-input" type="text" placeholder="Tanya konsep ruang atau jadwal..." required
                       class="flex-1 bg-rubra-burgundy-950 border border-rubra-burgundy-400/40 rounded-full px-4 py-2.5 text-xs text-rubra-parchment-100 placeholder-rubra-burgundy-300/45 focus:outline-none focus:border-rubra-burgundy-300">
                <button type="submit" class="px-5 py-2.5 rounded-full bg-rubra-burgundy-300 hover:bg-rubra-parchment-100 text-rubra-burgundy-950 font-rubra-avant font-bold text-xs uppercase">
                    Kirim
                </button>
            </form>
        </div>
    </div>

    <!-- =================================================================
         JAVASCRIPT INTERACTIVITY
         ================================================================= -->
    <script>
        // Mobile Menu Toggle
        const mobileBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        mobileBtn.addEventListener('click', () => mobileMenu.classList.toggle('hidden'));
        document.querySelectorAll('.mobile-link').forEach(link => {
            link.addEventListener('click', () => mobileMenu.classList.add('hidden'));
        });

        // FAQ Accordion
        function toggleFAQ(id) {
            const answer = document.getElementById(`faq-answer-${id}`);
            const icon = document.getElementById(`faq-icon-${id}`);
            const isHidden = answer.classList.contains('hidden');

            for (let i = 1; i <= 4; i++) {
                document.getElementById(`faq-answer-${i}`).classList.add('hidden');
                document.getElementById(`faq-icon-${i}`).style.transform = 'rotate(0deg)';
            }

            if (isHidden) {
                answer.classList.remove('hidden');
                icon.style.transform = 'rotate(180deg)';
            }
        }

        // AI Guide Modal
        function toggleAIModal() {
            document.getElementById('ai-modal').classList.toggle('hidden');
        }

        function sendAIMessage(e) {
            e.preventDefault();
            const input = document.getElementById('ai-input');
            const box = document.getElementById('ai-chat-box');
            const text = input.value.trim();
            if (!text) return;

            const userMessage = document.createElement('p');
            const userLabel = document.createElement('strong');
            userLabel.className = 'text-white';
            userLabel.textContent = 'Anda:';
            userMessage.append(userLabel, document.createTextNode(` ${text}`));
            box.append(userMessage);
            input.value = '';

            setTimeout(() => {
                const assistantMessage = document.createElement('p');
                const assistantLabel = document.createElement('strong');
                assistantLabel.className = 'text-rubra-rubra-burgundy-300';
                assistantLabel.textContent = 'Kurator AI:';
                assistantMessage.append(
                    assistantLabel,
                    document.createTextNode(' Sesi ekshibisi dibuka setiap jam (11.00-20.00 WIB) dengan kapasitas 25 pengunjung per sesi. Tiket Full Exhibition Pass Rp 135.000, atau tersedia diskon 25% untuk grup 15 orang atau lebih via WhatsApp.')
                );
                box.append(assistantMessage);
                box.scrollTop = box.scrollHeight;
            }, 450);
        }
    </script>
</body>
</html>