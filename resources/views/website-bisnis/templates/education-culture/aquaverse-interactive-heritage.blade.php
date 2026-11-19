<!DOCTYPE html>
<html lang="id" class="scroll-smooth aquaverse-html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AQUAVERSE HERITAGE — Interactive Heritage Exhibition</title>
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts: Orbitron / Space Grotesk (Futuristic) & Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="aquaverse-page font-aquaverse-sans antialiased selection:bg-aquaverse-ocean-400 selection:text-aquaverse-ocean-950 aquaverse-cyber-grid">

    <!-- =================================================================
         1. TOPBAR & NAVBAR (Sticky Glassmorphic + Functional Smooth Scroll)
         ================================================================= -->
    <header class="sticky top-0 z-40 aquaverse-ocean-glass border-b border-aquaverse-ocean-400/25">
        <!-- Topbar Announcement -->
        <div class="bg-gradient-to-r from-aquaverse-ocean-950 via-aquaverse-ocean-800 to-aquaverse-ocean-950 text-aquaverse-ocean-200 text-xs py-2 px-4 text-center tracking-wider border-b border-aquaverse-ocean-400/20">
            <span class="inline-flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-aquaverse-ocean-300 animate-ping"></span>
                <span>PAMERAN IMERSIF 360° LIVE: <strong>Jejak Maritim Nusantara &amp; Kota Tenggelam</strong> &mdash; Slot Tiket Hari Ini Tersedia</span>
            </span>
        </div>

        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Brand Logo -->
                <a href="#beranda" class="flex items-center space-x-3 group">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-aquaverse-ocean-400 to-aquaverse-ocean-700 flex items-center justify-center text-aquaverse-ocean-950 shadow-lg shadow-aquaverse-ocean-400/30 group-hover:scale-105 transition-transform">
                        <i class="fa-solid fa-water text-lg"></i>
                    </div>
                    <div>
                        <span class="font-aquaverse-display text-xl font-bold tracking-wider text-white block leading-none">AQUA<span class="text-aquaverse-ocean-300">VERSE</span></span>
                        <span class="text-[10px] tracking-[0.25em] uppercase text-aquaverse-ocean-300/80 block mt-1">Heritage Lab</span>
                    </div>
                </a>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-8 text-sm font-medium text-aquaverse-ocean-200">
                    <a href="#beranda" class="hover:text-aquaverse-ocean-300 transition-colors">Beranda</a>
                    <a href="#ekshibisi" class="hover:text-aquaverse-ocean-300 transition-colors">Ekshibisi</a>
                    <a href="#tiket" class="hover:text-aquaverse-ocean-300 transition-colors">Tiket &amp; Pass</a>
                    <a href="#faq" class="hover:text-aquaverse-ocean-300 transition-colors">FAQ</a>
                    <a href="#kontak" class="hover:text-aquaverse-ocean-300 transition-colors">Lokasi &amp; Kontak</a>
                </div>

                <!-- Action CTA & Mobile Button -->
                <div class="flex items-center space-x-3">
                    <a href="#tiket" class="hidden sm:inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-aquaverse-ocean-400 hover:bg-aquaverse-ocean-300 text-aquaverse-ocean-950 font-aquaverse-display font-bold text-xs uppercase tracking-wider shadow-lg shadow-aquaverse-ocean-400/30 transition-all">
                        <i class="fa-solid fa-ticket"></i> Reservasi Slot
                    </a>
                    <button id="mobile-menu-btn" aria-label="Buka Menu" class="md:hidden text-aquaverse-ocean-200 hover:text-white p-2">
                        <i class="fa-solid fa-bars-staggered text-xl"></i>
                    </button>
                </div>
            </div>

            <!-- Mobile Dropdown Menu -->
            <div id="mobile-menu" class="hidden md:hidden pb-5 pt-2 border-t border-aquaverse-ocean-400/20 space-y-2 text-sm">
                <a href="#beranda" class="mobile-link block py-2 text-aquaverse-ocean-100 hover:text-aquaverse-ocean-300">Beranda</a>
                <a href="#ekshibisi" class="mobile-link block py-2 text-aquaverse-ocean-100 hover:text-aquaverse-ocean-300">Ekshibisi Interaktif</a>
                <a href="#tiket" class="mobile-link block py-2 text-aquaverse-ocean-100 hover:text-aquaverse-ocean-300">Tiket &amp; Pass</a>
                <a href="#faq" class="mobile-link block py-2 text-aquaverse-ocean-100 hover:text-aquaverse-ocean-300">FAQ</a>
                <a href="#kontak" class="mobile-link block py-2 text-aquaverse-ocean-100 hover:text-aquaverse-ocean-300">Lokasi &amp; Kontak</a>
            </div>
        </nav>
    </header>

    <!-- =================================================================
         2. HERO BANNER (Immersive Futuristic Ocean Blue)
         ================================================================= -->
    <section id="beranda" class="relative overflow-hidden py-20 lg:py-28 border-b border-aquaverse-ocean-400/20">
        <!-- Ambient Radial Glow -->
        <div class="absolute -top-32 -left-32 w-96 h-96 bg-aquaverse-ocean-500/20 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute bottom-0 right-0 w-[30rem] h-[30rem] bg-aquaverse-ocean-400/15 rounded-full blur-3xl pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                <!-- Left Copy -->
                <div class="lg:col-span-7 space-y-6">
                    <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-aquaverse-ocean-800/80 border border-aquaverse-ocean-300/30 text-aquaverse-ocean-300 text-xs font-medium tracking-wider uppercase">
                        <i class="fa-solid fa-vr-cardboard"></i> Holographic &amp; Spatial Heritage Experience
                    </div>

                    <h1 class="font-aquaverse-display text-4xl sm:text-5xl lg:text-6xl font-bold text-white leading-[1.12] aquaverse-glow-text">
                        Selami Sejarah dalam Dimensi <span class="text-transparent bg-clip-text bg-gradient-to-r from-aquaverse-ocean-300 to-aquaverse-ocean-500">Imersif Futuristik.</span>
                    </h1>

                    <p class="text-aquaverse-ocean-200/80 text-base sm:text-lg leading-relaxed max-w-2xl">
                        Rasakan rekonstruksi artefak maritim, arsitektur kuno, dan kisah peradaban melalui proyeksi kubah 360°, audio spasial, dan interaksi hologram beresolusi tinggi.
                    </p>

                    <div class="flex flex-wrap gap-4 pt-2">
                        <a href="#ekshibisi" class="px-7 py-4 rounded-full bg-gradient-to-r from-aquaverse-ocean-400 to-aquaverse-ocean-500 hover:from-aquaverse-ocean-300 hover:to-aquaverse-ocean-400 text-aquaverse-ocean-950 font-aquaverse-display font-bold text-sm uppercase tracking-wider shadow-xl shadow-aquaverse-ocean-400/25 transition-all">
                            Jelajahi Zona Imersif <i class="fa-solid fa-arrow-right ml-2"></i>
                        </a>
                        <button onclick="toggleAIModal()" class="px-7 py-4 rounded-full aquaverse-ocean-glass hover:border-aquaverse-ocean-300 text-aquaverse-ocean-100 font-aquaverse-display font-semibold text-sm uppercase tracking-wider transition-all">
                            <i class="fa-solid fa-robot text-aquaverse-ocean-300 mr-2"></i> Tanya Pemandu AI
                        </button>
                    </div>

                    <!-- Quick Spec Metrics -->
                    <div class="grid grid-cols-3 gap-4 pt-6 border-t border-aquaverse-ocean-400/20 max-w-lg">
                        <div>
                            <span class="font-aquaverse-display text-2xl sm:text-3xl font-bold text-aquaverse-ocean-300">360°</span>
                            <p class="text-xs text-aquaverse-ocean-200/70 mt-1">Proyeksi Kubah Laser</p>
                        </div>
                        <div>
                            <span class="font-aquaverse-display text-2xl sm:text-3xl font-bold text-aquaverse-ocean-300">12K</span>
                            <p class="text-xs text-aquaverse-ocean-200/70 mt-1">Resolusi Hologram</p>
                        </div>
                        <div>
                            <span class="font-aquaverse-display text-2xl sm:text-3xl font-bold text-aquaverse-ocean-300">6 Zona</span>
                            <p class="text-xs text-aquaverse-ocean-200/70 mt-1">Instalasi Sensorik</p>
                        </div>
                    </div>
                </div>

                <!-- Right Interactive Preview Frame -->
                <div class="lg:col-span-5">
                    <div class="relative rounded-3xl p-3 aquaverse-ocean-glass shadow-2xl">
                        <div class="relative rounded-2xl overflow-hidden aspect-[4/5] bg-aquaverse-ocean-900">
                            <img src="https://images.unsplash.com/photo-1518709268805-4e9042af9f23?auto=format&fit=crop&w=900&q=80" 
                                 alt="Instalasi Cahaya Biru Imersif" 
                                 class="w-full h-full object-cover opacity-90 hover:scale-105 transition-transform duration-700">
                            <div class="absolute inset-0 bg-gradient-to-t from-aquaverse-ocean-950 via-aquaverse-ocean-950/20 to-transparent"></div>
                            
                            <!-- Floating HUD Badge -->
                            <div class="absolute top-4 left-4 right-4 flex justify-between items-center text-[11px] font-aquaverse-display uppercase tracking-wider">
                                <span class="px-3 py-1 rounded-full bg-aquaverse-ocean-950/80 border border-aquaverse-ocean-300/40 text-aquaverse-ocean-300">
                                    ● ZONA 01: ABYSSAL ARCHIVE
                                </span>
                                <span class="px-3 py-1 rounded-full bg-aquaverse-ocean-400 text-aquaverse-ocean-950 font-bold">
                                    AR READY
                                </span>
                            </div>

                            <div class="absolute bottom-5 left-5 right-5 p-4 rounded-xl aquaverse-ocean-glass">
                                <p class="text-xs text-aquaverse-ocean-300 uppercase tracking-widest font-semibold">Instalasi Unggulan</p>
                                <h3 class="font-aquaverse-display text-lg font-bold text-white mt-0.5">Rekonstruksi Kapal Niaga Abad ke-14</h3>
                                <p class="text-xs text-aquaverse-ocean-200/80 mt-1">Interaksi sentuh &amp; pemindaian AR langsung melalui perangkat pengunjung.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- =================================================================
         3. INTERACTIVE EXHIBITION CATALOG & SPECS
         ================================================================= -->
    <section id="ekshibisi" class="py-20 lg:py-28 border-b border-aquaverse-ocean-400/20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-14 gap-4">
                <div>
                    <span class="text-xs font-aquaverse-display uppercase tracking-[0.25em] text-aquaverse-ocean-300">Katalog Zona &amp; Instalasi</span>
                    <h2 class="font-aquaverse-display text-3xl sm:text-4xl font-bold text-white mt-2">Pengalaman Warisan Interaktif</h2>
                </div>
                <p class="text-sm text-aquaverse-ocean-200/75 max-w-md">
                    Setiap zona memadukan artefak terkurasi dengan sensor gerak, pemetaan proyeksi, dan narasi audio spasial.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-7">
                <!-- Zona 1 -->
                <div class="aquaverse-ocean-card rounded-2xl p-6 flex flex-col justify-between">
                    <div>
                        <div class="aspect-video rounded-xl overflow-hidden mb-5 bg-aquaverse-ocean-900 relative">
                            <img src="https://images.unsplash.com/photo-1550751827-4bd374c3f58b?auto=format&fit=crop&w=800&q=80" alt="Hologram Artefak" class="w-full h-full object-cover">
                            <span class="absolute top-3 right-3 px-2.5 py-1 rounded-md bg-aquaverse-ocean-950/85 text-aquaverse-ocean-300 text-[10px] font-aquaverse-display uppercase border border-aquaverse-ocean-400/30">
                                Tersedia Live
                            </span>
                        </div>
                        <span class="text-xs font-aquaverse-display uppercase tracking-widest text-aquaverse-ocean-400">Zona 01 &bull; Holo-Chamber</span>
                        <h3 class="font-aquaverse-display text-xl font-bold text-white mt-1 mb-2">Galeri Relik Holografik</h3>
                        <p class="text-sm text-aquaverse-ocean-200/75 leading-relaxed">
                            Perbesar dan putar model 3D artefak maritim kuno di udara tanpa menyentuh kaca pelindung menggunakan sensor gestur tangan.
                        </p>
                    </div>
                    <div class="mt-6 pt-4 border-t border-aquaverse-ocean-400/20 flex items-center justify-between text-xs text-aquaverse-ocean-300">
                        <span><i class="fa-solid fa-microchip mr-1.5"></i> LiDAR + LeapMotion</span>
                        <a href="#tiket" class="font-aquaverse-display font-bold hover:text-white">Pilih Sesi &rarr;</a>
                    </div>
                </div>

                <!-- Zona 2 -->
                <div class="aquaverse-ocean-card rounded-2xl p-6 flex flex-col justify-between">
                    <div>
                        <div class="aspect-video rounded-xl overflow-hidden mb-5 bg-aquaverse-ocean-900 relative">
                            <img src="https://images.unsplash.com/photo-1534447677768-be436bb09401?auto=format&fit=crop&w=800&q=80" alt="Proyeksi Laut" class="w-full h-full object-cover">
                            <span class="absolute top-3 right-3 px-2.5 py-1 rounded-md bg-aquaverse-ocean-950/85 text-aquaverse-ocean-300 text-[10px] font-aquaverse-display uppercase border border-aquaverse-ocean-400/30">
                                Paling Populer
                            </span>
                        </div>
                        <span class="text-xs font-aquaverse-display uppercase tracking-widest text-aquaverse-ocean-400">Zona 02 &bull; 360° Ocean Dome</span>
                        <h3 class="font-aquaverse-display text-xl font-bold text-white mt-1 mb-2">Pelayaran Jalur Rempah</h3>
                        <p class="text-sm text-aquaverse-ocean-200/75 leading-relaxed">
                            Simulasi pelayaran malam lintas samudra dengan navigasi bintang kuno dan efek suara ombak surround 32-kanal.
                        </p>
                    </div>
                    <div class="mt-6 pt-4 border-t border-aquaverse-ocean-400/20 flex items-center justify-between text-xs text-aquaverse-ocean-300">
                        <span><i class="fa-solid fa-volume-high mr-1.5"></i> Dolby Atmos Spatial</span>
                        <a href="#tiket" class="font-aquaverse-display font-bold hover:text-white">Pilih Sesi &rarr;</a>
                    </div>
                </div>

                <!-- Zona 3 -->
                <div class="aquaverse-ocean-card rounded-2xl p-6 flex flex-col justify-between">
                    <div>
                        <div class="aspect-video rounded-xl overflow-hidden mb-5 bg-aquaverse-ocean-900 relative">
                            <img src="https://images.unsplash.com/photo-1614850523459-c2f4c699c52e?auto=format&fit=crop&w=800&q=80" alt="Arsip Digital" class="w-full h-full object-cover">
                            <span class="absolute top-3 right-3 px-2.5 py-1 rounded-md bg-aquaverse-ocean-950/85 text-aquaverse-ocean-300 text-[10px] font-aquaverse-display uppercase border border-aquaverse-ocean-400/30">
                                Akses Web &amp; Onsite
                            </span>
                        </div>
                        <span class="text-xs font-aquaverse-display uppercase tracking-widest text-aquaverse-ocean-400">Zona 03 &bull; Temporal Archive</span>
                        <h3 class="font-aquaverse-display text-xl font-bold text-white mt-1 mb-2">Dinding Manuskrip Interaktif</h3>
                        <p class="text-sm text-aquaverse-ocean-200/75 leading-relaxed">
                            Sentuh aksara kuno di layar dinding interaktif untuk menerjemahkan naskah secara real-time ke bahasa modern.
                        </p>
                    </div>
                    <div class="mt-6 pt-4 border-t border-aquaverse-ocean-400/20 flex items-center justify-between text-xs text-aquaverse-ocean-300">
                        <span><i class="fa-solid fa-language mr-1.5"></i> AI OCR Translator</span>
                        <a href="#tiket" class="font-aquaverse-display font-bold hover:text-white">Pilih Sesi &rarr;</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- =================================================================
         4. TICKETS, VIRTUAL PASS & INSTITUTIONAL BULK BOOKING
         ================================================================= -->
    <section id="tiket" class="py-20 bg-aquaverse-ocean-900/50 border-b border-aquaverse-ocean-400/20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-14">
                <span class="text-xs font-aquaverse-display uppercase tracking-[0.25em] text-aquaverse-ocean-300">Akses Kunjungan &amp; Virtual</span>
                <h2 class="font-aquaverse-display text-3xl sm:text-4xl font-bold text-white mt-2">Pilih Pass Eksplorasi Anda</h2>
                <p class="text-sm text-aquaverse-ocean-200/75 mt-3">Tersedia tiket kunjungan galeri fisik maupun akses Virtual VR Pass dari rumah.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Pass 1 -->
                <div class="aquaverse-ocean-card rounded-2xl p-7 flex flex-col justify-between">
                    <div>
                        <span class="text-xs font-aquaverse-display uppercase tracking-wider text-aquaverse-ocean-300">Virtual Explorer</span>
                        <h3 class="font-aquaverse-display text-2xl font-bold text-white mt-1">Web &amp; VR Remote Pass</h3>
                        <p class="font-aquaverse-display text-3xl font-bold text-aquaverse-ocean-300 mt-4">Rp 45.000 <span class="text-xs font-normal text-aquaverse-ocean-200/70">/ akses 48 jam</span></p>
                        <ul class="space-y-3 text-sm text-aquaverse-ocean-100/85 mt-6">
                            <li><i class="fa-solid fa-check text-aquaverse-ocean-300 mr-2"></i> Akses seluruh tur 360° via browser/VR</li>
                            <li><i class="fa-solid fa-check text-aquaverse-ocean-300 mr-2"></i> Inspeksi 50+ model artefak 3D</li>
                            <li><i class="fa-solid fa-check text-aquaverse-ocean-300 mr-2"></i> Panduan audio kurator digital</li>
                        </ul>
                    </div>
                    <a href="https://wa.me/6281234567890?text=Halo%20Aquaverse%2C%20saya%20ingin%20memesan%20Virtual%20Explorer%20Pass." target="_blank" class="mt-8 block text-center py-3 rounded-full border border-aquaverse-ocean-300 text-aquaverse-ocean-200 hover:bg-aquaverse-ocean-300 hover:text-aquaverse-ocean-950 font-aquaverse-display font-bold text-xs uppercase tracking-wider transition-all" rel="noopener noreferrer">
                        Pesan Virtual Pass
                    </a>
                </div>

                <!-- Pass 2 (Highlighted) -->
                <div class="rounded-2xl p-7 bg-gradient-to-b from-aquaverse-ocean-800 to-aquaverse-ocean-950 border-2 border-aquaverse-ocean-300 shadow-2xl shadow-aquaverse-ocean-400/20 flex flex-col justify-between relative">
                    <span class="absolute -top-3.5 right-6 px-3 py-1 rounded-full bg-aquaverse-ocean-300 text-aquaverse-ocean-950 font-aquaverse-display text-[10px] font-bold uppercase tracking-wider">
                        Rekomendasi Utama
                    </span>
                    <div>
                        <span class="text-xs font-aquaverse-display uppercase tracking-wider text-aquaverse-ocean-300">Onsite Immersive</span>
                        <h3 class="font-aquaverse-display text-2xl font-bold text-white mt-1">All-Zone Dome Ticket</h3>
                        <p class="font-aquaverse-display text-3xl font-bold text-white mt-4">Rp 120.000 <span class="text-xs font-normal text-aquaverse-ocean-200/70">/ pengunjung</span></p>
                        <ul class="space-y-3 text-sm text-aquaverse-ocean-100 mt-6">
                            <li><i class="fa-solid fa-check text-aquaverse-ocean-300 mr-2"></i> Akses penuh 6 Zona Instalasi &amp; 360° Dome</li>
                            <li><i class="fa-solid fa-check text-aquaverse-ocean-300 mr-2"></i> Pinjam perangkat AR Smart-Visor</li>
                            <li><i class="fa-solid fa-check text-aquaverse-ocean-300 mr-2"></i> Suvenir foto hologram digital</li>
                        </ul>
                    </div>
                    <a href="https://wa.me/6281234567890?text=Halo%20Aquaverse%2C%20saya%20ingin%20reservasi%20All-Zone%20Dome%20Ticket." target="_blank" class="mt-8 block text-center py-3.5 rounded-full bg-aquaverse-ocean-300 hover:bg-white text-aquaverse-ocean-950 font-aquaverse-display font-bold text-xs uppercase tracking-wider transition-all" rel="noopener noreferrer">
                        Reservasi Tiket Galeri
                    </a>
                </div>

                <!-- Pass 3 -->
                <div class="aquaverse-ocean-card rounded-2xl p-7 flex flex-col justify-between">
                    <div>
                        <span class="text-xs font-aquaverse-display uppercase tracking-wider text-aquaverse-ocean-300">Rombongan &amp; Sekolah</span>
                        <h3 class="font-aquaverse-display text-2xl font-bold text-white mt-1">Institutional Bulk Pass</h3>
                        <p class="font-aquaverse-display text-3xl font-bold text-aquaverse-ocean-300 mt-4">Diskon 30% <span class="text-xs font-normal text-aquaverse-ocean-200/70">/ min. 20 orang</span></p>
                        <ul class="space-y-3 text-sm text-aquaverse-ocean-100/85 mt-6">
                            <li><i class="fa-solid fa-check text-aquaverse-ocean-300 mr-2"></i> Sesi privat dengan edukator &amp; kurator</li>
                            <li><i class="fa-solid fa-check text-aquaverse-ocean-300 mr-2"></i> Modul lembar kerja sejarah digital</li>
                            <li><i class="fa-solid fa-check text-aquaverse-ocean-300 mr-2"></i> Penjadwalan fleksibel hari kerja</li>
                        </ul>
                    </div>
                    <a href="https://wa.me/6281234567890?text=Halo%20Aquaverse%2C%20saya%20ingin%20konsultasi%20paket%20rombongan%20sekolah%2Finstitusi." target="_blank" class="mt-8 block text-center py-3 rounded-full border border-aquaverse-ocean-300 text-aquaverse-ocean-200 hover:bg-aquaverse-ocean-300 hover:text-aquaverse-ocean-950 font-aquaverse-display font-bold text-xs uppercase tracking-wider transition-all" rel="noopener noreferrer">
                        Konsultasi Rombongan
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- =================================================================
         5. FAQ SECTION (Interactive Accordion)
         ================================================================= -->
    <section id="faq" class="py-20 lg:py-28 border-b border-aquaverse-ocean-400/20">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <span class="text-xs font-aquaverse-display uppercase tracking-[0.25em] text-aquaverse-ocean-300">Pusat Bantuan Pengunjung</span>
                <h2 class="font-aquaverse-display text-3xl sm:text-4xl font-bold text-white mt-2">Pertanyaan Umum (FAQ)</h2>
            </div>

            <div class="space-y-4">
                <!-- FAQ 1 -->
                <div class="aquaverse-ocean-card rounded-xl overflow-hidden">
                    <button onclick="toggleFAQ(1)" class="w-full px-6 py-4 text-left flex items-center justify-between focus:outline-none">
                        <span class="font-aquaverse-display font-semibold text-white text-base sm:text-lg">Apakah pameran ini aman untuk anak-anak dan penderita sensitivitas cahaya?</span>
                        <i id="faq-icon-1" class="fa-solid fa-chevron-down text-aquaverse-ocean-300 transition-transform duration-300"></i>
                    </button>
                    <div id="faq-answer-1" class="hidden px-6 pb-5 text-sm text-aquaverse-ocean-200/80 leading-relaxed border-t border-aquaverse-ocean-400/15 pt-3">
                        Ya, seluruh proyeksi laser kami menggunakan standar kalibrasi ramah mata tanpa efek strobo cepat. Pengunjung anak-anak wajib didampingi orang tua, dan tersedia mode pencahayaan tenang pada sesi pagi hari (pukul 10.00–11.30).
                    </div>
                </div>

                <!-- FAQ 2 -->
                <div class="aquaverse-ocean-card rounded-xl overflow-hidden">
                    <button onclick="toggleFAQ(2)" class="w-full px-6 py-4 text-left flex items-center justify-between focus:outline-none">
                        <span class="font-aquaverse-display font-semibold text-white text-base sm:text-lg">Berapa lama durasi rata-rata menjelajahi seluruh zona ekshibisi?</span>
                        <i id="faq-icon-2" class="fa-solid fa-chevron-down text-aquaverse-ocean-300 transition-transform duration-300"></i>
                    </button>
                    <div id="faq-answer-2" class="hidden px-6 pb-5 text-sm text-aquaverse-ocean-200/80 leading-relaxed border-t border-aquaverse-ocean-400/15 pt-3">
                        Durasi rata-rata kunjungan adalah 60 hingga 90 menit untuk menikmati keenam zona interaktif dan pertunjukan utama di 360° Ocean Dome secara menyeluruh.
                    </div>
                </div>

                <!-- FAQ 3 -->
                <div class="aquaverse-ocean-card rounded-xl overflow-hidden">
                    <button onclick="toggleFAQ(3)" class="w-full px-6 py-4 text-left flex items-center justify-between focus:outline-none">
                        <span class="font-aquaverse-display font-semibold text-white text-base sm:text-lg">Apakah pengunjung diperbolehkan mengambil foto dan video?</span>
                        <i id="faq-icon-3" class="fa-solid fa-chevron-down text-aquaverse-ocean-300 transition-transform duration-300"></i>
                    </button>
                    <div id="faq-answer-3" class="hidden px-6 pb-5 text-sm text-aquaverse-ocean-200/80 leading-relaxed border-t border-aquaverse-ocean-400/15 pt-3">
                        Sangat diperbolehkan untuk keperluan pribadi dan media sosial, selama tidak menggunakan lampu kilat (flash) atau tripod profesional agar tidak mengganggu sensor proyeksi dan kenyamanan pengunjung lain.
                    </div>
                </div>

                <!-- FAQ 4 -->
                <div class="aquaverse-ocean-card rounded-xl overflow-hidden">
                    <button onclick="toggleFAQ(4)" class="w-full px-6 py-4 text-left flex items-center justify-between focus:outline-none">
                        <span class="font-aquaverse-display font-semibold text-white text-base sm:text-lg">Bagaimana cara memesan kunjungan rombongan sekolah atau institusi?</span>
                        <i id="faq-icon-4" class="fa-solid fa-chevron-down text-aquaverse-ocean-300 transition-transform duration-300"></i>
                    </button>
                    <div id="faq-answer-4" class="hidden px-6 pb-5 text-sm text-aquaverse-ocean-200/80 leading-relaxed border-t border-aquaverse-ocean-400/15 pt-3">
                        Untuk pemesanan minimal 20 peserta, Anda dapat menghubungi tim koordinator edukasi kami melalui tombol WhatsApp mengambang untuk mendapatkan jadwal sesi privat dan harga khusus institusi.
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- =================================================================
         6. FOOTER (Venue Location, Hours & Links)
         ================================================================= -->
    <footer id="kontak" class="bg-aquaverse-ocean-950 text-aquaverse-ocean-200 pt-16 pb-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 pb-12 border-b border-aquaverse-ocean-400/20">
                <!-- Brand -->
                <div class="space-y-4">
                    <div class="flex items-center space-x-2.5">
                        <i class="fa-solid fa-water text-aquaverse-ocean-300 text-xl"></i>
                        <span class="font-aquaverse-display text-xl font-bold tracking-wider text-white">AQUAVERSE</span>
                    </div>
                    <p class="text-xs text-aquaverse-ocean-200/70 leading-relaxed">
                        Ruang ekshibisi warisan budaya interaktif yang menghidupkan kembali sejarah maritim dan peradaban melalui teknologi imersif.
                    </p>
                    <div class="flex space-x-4 text-aquaverse-ocean-300 pt-1">
                        <a href="#kontak" aria-label="Instagram" class="hover:text-white"><i class="fa-brands fa-instagram text-lg"></i></a>
                        <a href="#kontak" aria-label="TikTok" class="hover:text-white"><i class="fa-brands fa-tiktok text-lg"></i></a>
                        <a href="#kontak" aria-label="YouTube" class="hover:text-white"><i class="fa-brands fa-youtube text-lg"></i></a>
                    </div>
                </div>

                <!-- Navigasi -->
                <div>
                    <h4 class="font-aquaverse-display text-xs uppercase tracking-widest text-aquaverse-ocean-300 font-bold mb-4">Navigasi Cepat</h4>
                    <ul class="space-y-2.5 text-xs">
                        <li><a href="#beranda" class="hover:text-aquaverse-ocean-300 transition-colors">Beranda</a></li>
                        <li><a href="#ekshibisi" class="hover:text-aquaverse-ocean-300 transition-colors">Katalog Zona Imersif</a></li>
                        <li><a href="#tiket" class="hover:text-aquaverse-ocean-300 transition-colors">Tiket &amp; Virtual Pass</a></li>
                        <li><a href="#faq" class="hover:text-aquaverse-ocean-300 transition-colors">FAQ Pengunjung</a></li>
                    </ul>
                </div>

                <!-- Lokasi & Jam -->
                <div>
                    <h4 class="font-aquaverse-display text-xs uppercase tracking-widest text-aquaverse-ocean-300 font-bold mb-4">Lokasi &amp; Jam Buka</h4>
                    <ul class="space-y-2.5 text-xs text-aquaverse-ocean-200/80 leading-relaxed">
                        <li><i class="fa-solid fa-location-dot text-aquaverse-ocean-300 mr-2"></i> Paviliun Maritim Digital, Kawasan Pelabuhan Budaya</li>
                        <li><i class="fa-regular fa-clock text-aquaverse-ocean-300 mr-2"></i> Selasa – Minggu: 10.00 – 21.00 WIB</li>
                        <li><i class="fa-solid fa-globe text-aquaverse-ocean-300 mr-2"></i> Tur Virtual Web: Aktif 24 Jam</li>
                    </ul>
                </div>

                <!-- Kontak -->
                <div>
                    <h4 class="font-aquaverse-display text-xs uppercase tracking-widest text-aquaverse-ocean-300 font-bold mb-4">Reservasi &amp; Kemitraan</h4>
                    <p class="text-xs text-aquaverse-ocean-200/75 leading-relaxed mb-4">
                        Butuh informasi ketersediaan slot hari ini atau paket rombongan sekolah?
                    </p>
                    <a href="https://wa.me/6281234567890" target="_blank" class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-aquaverse-ocean-800 hover:bg-aquaverse-ocean-700 border border-aquaverse-ocean-400/40 text-xs font-aquaverse-display font-semibold text-white transition-colors" rel="noopener noreferrer">
                        <i class="fa-brands fa-whatsapp text-emerald-400 text-base"></i> Hubungi Admin Galeri
                    </a>
                </div>
            </div>

            <div class="pt-8 flex flex-col sm:flex-row justify-between items-center text-xs text-aquaverse-ocean-200/50">
                <p>&copy; 2026 Aquaverse Heritage Lab. All rights reserved.</p>
                <p class="mt-2 sm:mt-0">Powered by Spatial Digital Preservation</p>
            </div>
        </div>
    </footer>

    <!-- =================================================================
         7. FLOATING ACTION BUTTONS (AI Guide Button & WhatsApp Button)
         ================================================================= -->
    <div class="fixed bottom-6 right-6 z-50 flex flex-col items-end space-y-3">
        <!-- AI Exhibition Guide Button -->
        <button onclick="toggleAIModal()" 
                class="flex items-center gap-2.5 bg-aquaverse-ocean-900/95 hover:bg-aquaverse-ocean-800 text-aquaverse-ocean-100 border border-aquaverse-ocean-300 px-4 py-3 rounded-full shadow-2xl shadow-aquaverse-ocean-400/20 transition-all hover:scale-105">
            <span class="w-7 h-7 rounded-full bg-aquaverse-ocean-300 text-aquaverse-ocean-950 flex items-center justify-center text-xs">
                <i class="fa-solid fa-robot"></i>
            </span>
            <span class="font-aquaverse-display text-xs font-bold uppercase tracking-wider pr-1">Pemandu AI</span>
        </button>

        <!-- WhatsApp Button -->
        <a href="https://wa.me/6281234567890?text=Halo%20Aquaverse%20Heritage%2C%20saya%20ingin%20bertanya%20jadwal%20slot%20pameran%20interaktif." 
           target="_blank" 
           rel="noopener noreferrer"
           aria-label="Chat WhatsApp"
           class="flex items-center gap-2.5 bg-emerald-600 hover:bg-emerald-500 text-white px-4 py-3 rounded-full shadow-2xl transition-all hover:scale-105 border border-white/20">
            <i class="fa-brands fa-whatsapp text-xl"></i>
            <span class="font-aquaverse-display text-xs font-bold uppercase tracking-wider pr-1">WhatsApp</span>
        </a>
    </div>

    <!-- =================================================================
         AI EXHIBITION GUIDE MODAL
         ================================================================= -->
    <div id="ai-modal" class="hidden fixed inset-0 z-50 bg-aquaverse-ocean-950/80 backdrop-blur-md flex items-center justify-center p-4">
        <div class="aquaverse-ocean-glass rounded-2xl max-w-md w-full p-6 shadow-2xl relative">
            <button onclick="toggleAIModal()" aria-label="Tutup" class="absolute top-4 right-4 text-aquaverse-ocean-200 hover:text-white">
                <i class="fa-solid fa-xmark text-lg"></i>
            </button>
            <div class="flex items-center gap-3 pb-4 mb-4 border-b border-aquaverse-ocean-400/25">
                <div class="w-9 h-9 rounded-full bg-aquaverse-ocean-300 text-aquaverse-ocean-950 flex items-center justify-center">
                    <i class="fa-solid fa-robot"></i>
                </div>
                <div>
                    <h3 class="font-aquaverse-display text-lg font-bold text-white">Aquaverse AI Guide</h3>
                    <p class="text-[11px] text-aquaverse-ocean-300">Info Ekshibisi, Slot Tiket &amp; Rombongan</p>
                </div>
            </div>
            <div id="ai-chat-box" class="bg-aquaverse-ocean-950/80 border border-aquaverse-ocean-400/20 rounded-xl p-4 h-44 overflow-y-auto text-xs text-aquaverse-ocean-100 space-y-3 mb-4">
                <p><strong class="text-aquaverse-ocean-300">AI Guide:</strong> Halo! Saya siap membantu informasi jadwal sesi 360° Ocean Dome, harga tiket, maupun pemesanan rombongan sekolah. Ada yang ingin ditanyakan?</p>
            </div>
            <form onsubmit="sendAIMessage(event)" class="flex gap-2">
                <input id="ai-input" type="text" placeholder="Tanya jadwal sesi atau paket..." required
                       class="flex-1 bg-aquaverse-ocean-950 border border-aquaverse-ocean-400/40 rounded-lg px-3 py-2.5 text-xs text-white placeholder-ocean-300/40 focus:outline-none focus:border-aquaverse-ocean-300">
                <button type="submit" class="px-4 py-2.5 rounded-lg bg-aquaverse-ocean-300 hover:bg-white text-aquaverse-ocean-950 font-aquaverse-display font-bold text-xs uppercase">
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
                assistantLabel.className = 'text-aquaverse-ocean-300';
                assistantLabel.textContent = 'AI Guide:';
                assistantMessage.append(
                    assistantLabel,
                    document.createTextNode(' Sesi 360-degree Ocean Dome hari ini tersedia setiap jam (10.00-20.00 WIB) dengan tiket Rp 120.000. Untuk grup 20 orang atau lebih tersedia diskon 30% via tombol WhatsApp.')
                );
                box.append(assistantMessage);
                box.scrollTop = box.scrollHeight;
            }, 450);
        }
    </script>
</body>
</html>