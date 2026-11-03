<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lentera Nusantara — Gerakan Relawan Budaya</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500;700;800&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            brand: {
                                dark: '#07271D',
                                emerald: '#0A3B2C',
                                mid: '#114B3A',
                                light: '#1A5D4A',
                                cream: '#F4EFE6',
                                creamLight: '#FAF7F2',
                                gold: '#E5CB95',
                                goldHover: '#D4B87D',
                                amber: '#D4AF37',
                                orange: '#C88327',
                                accent: '#E09F3E'
                            }
                        },
                        fontFamily: {
                            serif: ['Playfair Display', 'serif'],
                            cinzel: ['Cinzel', 'serif'],
                            sans: ['Plus Jakarta Sans', 'sans-serif']
                        }
                    }
                };
    </script>
    <link rel="stylesheet"
        href="{{ asset('css/website-bisnis/templates/nonprofit-community/volunteer-group/lentera-nusantara/lentera-nusantara.css') }}">
</head>

<body
    class="font-sans bg-brand-cream text-gray-800 antialiased leading-relaxed selection:bg-brand-gold selection:text-brand-dark">


    <!-- 1. TOPBAR & NAVBAR -->
    <div id="topbar" class="bg-brand-dark text-brand-gold text-xs py-2 px-4 border-b border-brand-mid/40">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center gap-2">
            <div class="flex items-center gap-2">
                <span class="inline-block w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                <span class="font-medium tracking-wide">Panggilan Kerabatan: Ekspedisi Desa Adat Sumba & Toraja Buka
                    Pendaftaran Hingga 25 Bulan Ini!</span>
            </div>
            <div class="flex items-center space-x-6 text-brand-cream/80">
                <a href="#jadwal" class="hover:text-brand-gold transition"><i class="far fa-calendar-alt mr-1"></i>
                    Agenda Kebudayaan</a>
                <a href="#kontak" class="hover:text-brand-gold transition"><i class="fas fa-phone-alt mr-1"></i> Posko
                    Budaya</a>
                <div class="flex space-x-3 text-brand-gold">
                    <a href="#" class="hover:opacity-75"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="hover:opacity-75"><i class="fab fa-youtube"></i></a>
                    <a href="#" class="hover:opacity-75"><i class="fab fa-tiktok"></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- MAIN NAVBAR -->
    <nav
        class="sticky top-0 z-40 bg-brand-cream/95 backdrop-blur-md border-b border-brand-gold/20 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Brand Logo -->
                <a href="#" class="flex items-center space-x-3 group">
                    <div
                        class="w-11 h-11 rounded-full bg-brand-emerald border-2 border-brand-gold flex items-center justify-center text-brand-gold shadow-md group-hover:scale-105 transition">
                        <i class="fas fa-seedling text-lg"></i>
                    </div>
                    <div>
                        <span
                            class="block font-serif text-xl font-bold text-brand-emerald leading-tight tracking-tight">Lentera
                            Nusantara</span>
                        <span class="block text-[10px] uppercase font-bold tracking-[0.2em] text-brand-orange">GERAKAN
                            RELAWAN BUDAYA</span>
                    </div>
                </a>

                <!-- Desktop Navigation Links -->
                <div class="hidden lg:flex items-center space-x-7 font-medium text-sm text-brand-emerald">
                    <a href="#tentang" class="hover:text-brand-orange transition py-1">Tentang</a>
                    <a href="#gotong-royong" class="hover:text-brand-orange transition py-1">Gotong Royong</a>
                    <a href="#kebutuhan-desa" class="hover:text-brand-orange transition py-1">Kebutuhan Desa</a>
                    <a href="#program" class="hover:text-brand-orange transition py-1">Program</a>
                    <a href="#kalender" class="hover:text-brand-orange transition py-1">Kalender</a>
                    <a href="#jurnal" class="hover:text-brand-orange transition py-1">Jurnal</a>
                </div>

                <!-- CTA Button -->
                <div class="hidden sm:flex items-center space-x-4">
                    <button onclick="openModal('modal-relawan')"
                        class="px-6 py-2.5 rounded-full bg-brand-emerald text-brand-cream font-medium text-sm border-2 border-brand-gold/40 hover:bg-brand-mid hover:shadow-lg transition flex items-center space-x-2">
                        <span>Daftar Relawan</span>
                        <i class="fas fa-arrow-right text-xs text-brand-gold"></i>
                    </button>
                </div>

                <!-- Mobile Menu Button -->
                <div class="lg:hidden flex items-center">
                    <button id="mobile-menu-btn"
                        class="text-brand-emerald p-2 rounded-md hover:bg-brand-gold/20 focus:outline-none">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu Dropdown -->
        <div id="mobile-menu"
            class="hidden lg:hidden bg-brand-cream border-b border-brand-gold/30 px-4 pt-2 pb-6 space-y-3">
            <a href="#tentang" class="block py-2 text-brand-emerald font-medium border-b border-gray-200/50">Tentang</a>
            <a href="#gotong-royong"
                class="block py-2 text-brand-emerald font-medium border-b border-gray-200/50">Gotong Royong</a>
            <a href="#kebutuhan-desa"
                class="block py-2 text-brand-emerald font-medium border-b border-gray-200/50">Kebutuhan Desa</a>
            <a href="#program" class="block py-2 text-brand-emerald font-medium border-b border-gray-200/50">Program</a>
            <a href="#kalender"
                class="block py-2 text-brand-emerald font-medium border-b border-gray-200/50">Kalender</a>
            <a href="#jurnal" class="block py-2 text-brand-emerald font-medium">Jurnal</a>
            <button onclick="openModal('modal-relawan')"
                class="w-full mt-2 py-3 rounded-full bg-brand-emerald text-brand-cream font-medium text-center">
                Daftar Relawan Sekarang
            </button>
        </div>
    </nav>

    <!-- 2. HERO BANNER (REPLICATING THE REFERENCE IMAGE EXACTLY) -->
    <section class="relative bg-batik-wavy text-brand-cream pt-12 pb-24 px-4 sm:px-6 lg:px-8 overflow-hidden">
        <!-- SVG Decorative Swirls -->
        <svg class="absolute top-10 right-10 text-brand-gold opacity-10 w-64 h-64 pointer-events-none"
            viewBox="0 0 100 100" fill="currentColor">
            <path d="M50 0 C75 25, 75 75, 50 100 C25 75, 25 25, 50 0 Z" />
        </svg>

        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-12 items-center relative z-10">
            <!-- Left Hero Content -->
            <div class="lg:col-span-6 space-y-8">
                <!-- Tag Badge -->
                <div
                    class="inline-flex items-center space-x-2 px-4 py-1.5 rounded-full bg-brand-mid/80 border border-brand-gold/30 text-brand-gold text-xs font-semibold tracking-widest uppercase">
                    <span class="w-2 h-2 rounded-full bg-brand-gold"></span>
                    <span>SEJAK 2016 · NUSANTARA</span>
                </div>

                <!-- Headline -->
                <h1
                    class="font-serif text-4xl sm:text-5xl lg:text-6xl font-normal leading-tight text-brand-cream tracking-tight">
                    Merawat warisan,<br />
                    <span class="italic font-serif text-brand-gold font-light">menguatkan sesama.</span>
                </h1>

                <!-- Subheadline -->
                <p class="text-brand-cream/80 text-base sm:text-lg max-w-xl font-light leading-relaxed">
                    Lentera Nusantara mempertemukan relawan dengan desa-desa adat yang membutuhkan tangan. Dari batik,
                    gamelan, hingga dokumentasi bahasa ibu — setiap keterampilan punya tempat dalam lingkaran gotong
                    royong.
                </p>

                <!-- Dual CTA Buttons -->
                <div class="flex flex-wrap gap-4 pt-2">
                    <button onclick="openModal('modal-relawan')"
                        class="px-7 py-4 rounded-full bg-brand-accent hover:bg-brand-orange text-brand-dark font-bold text-sm tracking-wide transition shadow-lg hover:shadow-xl flex items-center space-x-3 transform hover:-translate-y-0.5">
                        <span class="uppercase">Gabung Sebagai Relawan</span>
                        <i class="fas fa-arrow-right"></i>
                    </button>

                    <a href="#kebutuhan-desa"
                        class="px-7 py-4 rounded-full border border-brand-gold/40 text-brand-cream hover:bg-brand-mid/50 font-medium text-sm tracking-wide transition flex items-center space-x-3">
                        <i class="fas fa-map-marker-alt text-brand-gold"></i>
                        <span>LIHAT PETA KEBUTUHAN</span>
                    </a>
                </div>

                <!-- Stats Counter Row -->
                <div class="pt-8 border-t border-brand-gold/20 grid grid-cols-3 gap-6">
                    <div>
                        <div class="font-serif text-3xl sm:text-4xl text-brand-gold font-semibold">1.240</div>
                        <div class="text-xs text-brand-cream/70 uppercase tracking-wider mt-1 font-medium">Relawan
                            Aktif</div>
                    </div>
                    <div>
                        <div class="font-serif text-3xl sm:text-4xl text-brand-gold font-semibold">38</div>
                        <div class="text-xs text-brand-cream/70 uppercase tracking-wider mt-1 font-medium">Desa
                            Dampingan</div>
                    </div>
                    <div>
                        <div class="font-serif text-3xl sm:text-4xl text-brand-gold font-semibold">12.800</div>
                        <div class="text-xs text-brand-cream/70 uppercase tracking-wider mt-1 font-medium">Jam Gotong
                            Royong</div>
                    </div>
                </div>
            </div>

            <!-- Right Hero Artwork Frame (Exact Match to Reference Image) -->
            <div class="lg:col-span-6 relative flex justify-center">
                <!-- Main Arch Container -->
                <div class="relative max-w-md w-full">

                    <!-- Floating Open Initiative Badge -->
                    <div
                        class="absolute -top-3 right-6 z-20 bg-brand-cream text-brand-emerald px-4 py-1.5 rounded-full text-xs font-bold shadow-lg border border-brand-gold/40 uppercase tracking-wider flex items-center space-x-2">
                        <span class="w-2 h-2 rounded-full bg-emerald-600 animate-ping"></span>
                        <span>6 Inisiatif Terbuka</span>
                    </div>

                    <!-- Arch Image Frame -->
                    <div class="arch-frame relative aspect-[4/5] bg-brand-dark">
                        <!-- High quality illustration image simulating traditional rural gotong royong under banyan tree -->
                        <img src="https://images.unsplash.com/photo-1544717305-2782549b5136?auto=format&fit=crop&w=1000&q=80"
                            alt="Gotong Royong Masyarakat Desa"
                            class="w-full h-full object-cover filter contrast-105 opacity-90 hover:scale-105 transition duration-700"
                            onerror="this.src='https://placehold.co/800x1000/0A3B2C/E5CB95?text=Gotong+Royong+Budaya'" />
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-brand-dark/80 via-transparent to-transparent">
                        </div>
                    </div>

                    <!-- Quote Overlay Card at Bottom Left of Image -->
                    <div
                        class="absolute -bottom-6 -left-6 z-20 max-w-xs bg-brand-dark/95 border border-brand-gold/40 rounded-2xl p-4 text-brand-cream shadow-2xl backdrop-blur-md">
                        <p class="font-serif italic text-sm text-brand-cream/90">
                            "Satu tangan menanam, seribu tangan menuai."
                        </p>
                        <span
                            class="block text-[10px] uppercase font-bold text-brand-gold tracking-widest mt-2">PEPATAH
                            DESA</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Wave Bottom Separator -->
        <div class="absolute bottom-0 left-0 right-0 h-10 overflow-hidden leading-none">
            <svg class="relative block w-full h-12 text-brand-cream" viewBox="0 0 1200 120"
                preserveAspectRatio="none">
                <path d="M0,0 C150,90 350,-40 500,65 C650,165 900,10 1200,40 L1200,120 L0,120 Z" fill="currentColor">
                </path>
            </svg>
        </div>
    </section>

    <!-- 3. CULTURAL IDENTITY SHOWCASE -->
    <section id="tentang" class="py-20 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
        <div class="text-center max-w-3xl mx-auto mb-16 space-y-4">
            <span class="text-xs uppercase font-bold tracking-[0.3em] text-brand-orange">IDENTITAS KAMI</span>
            <h2 class="font-serif text-3xl sm:text-4xl text-brand-emerald font-bold">Akar Tradisi, Nafas Keberlanjutan
            </h2>
            <div class="w-16 h-1 bg-brand-amber mx-auto rounded-full"></div>
            <p class="text-gray-600 text-base">
                Lentera Nusantara berdiri sejak 2016 dari kegelisahan akan meluruhnya pengetahuan lokal desa adat. Kami
                percaya bahwa pelestarian kebudayaan tidak cukup hanya dipajang di museum, melainkan dilakoni bersama
                masyarakat.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div
                class="bg-white rounded-2xl p-8 border border-brand-gold/30 shadow-sm hover:shadow-md transition space-y-4 relative overflow-hidden group">
                <div
                    class="w-14 h-14 rounded-xl bg-brand-cream text-brand-emerald flex items-center justify-center text-2xl font-serif font-bold group-hover:bg-brand-emerald group-hover:text-brand-gold transition">
                    <i class="fas fa-hands-holding"></i>
                </div>
                <h3 class="font-serif text-xl font-bold text-brand-emerald">Asal Usul Gerakan</h3>
                <p class="text-sm text-gray-600">
                    Bermula dari 5 pemuda yang menjelajah Desa Adat Baduy dan Cigugur, mencatat mantra tutur yang mulai
                    dilupakan generasi muda.
                </p>
            </div>

            <div
                class="bg-white rounded-2xl p-8 border border-brand-gold/30 shadow-sm hover:shadow-md transition space-y-4 relative overflow-hidden group">
                <div
                    class="w-14 h-14 rounded-xl bg-brand-cream text-brand-emerald flex items-center justify-center text-2xl font-serif font-bold group-hover:bg-brand-emerald group-hover:text-brand-gold transition">
                    <i class="fas fa-heart"></i>
                </div>
                <h3 class="font-serif text-xl font-bold text-brand-emerald">Filosofi "Rukun & Lengket"</h3>
                <p class="text-sm text-gray-600">
                    Mengadopsi prinsip kebersamaan Nusantara di mana relawan tidak bertindak sebagai 'pahlawan',
                    melainkan saudara kandung yang datang untuk belajar dan membantu.
                </p>
            </div>

            <div
                class="bg-white rounded-2xl p-8 border border-brand-gold/30 shadow-sm hover:shadow-md transition space-y-4 relative overflow-hidden group">
                <div
                    class="w-14 h-14 rounded-xl bg-brand-cream text-brand-emerald flex items-center justify-center text-2xl font-serif font-bold group-hover:bg-brand-emerald group-hover:text-brand-gold transition">
                    <i class="fas fa-shield-halved"></i>
                </div>
                <h3 class="font-serif text-xl font-bold text-brand-emerald">Etika Menjaga Adat</h3>
                <p class="text-sm text-gray-600">
                    Setiap langkah di lapangan dipandu oleh tetua adat setempat. Menghormati tabu, menjaga kearifan
                    lokal, serta memuliakan tetua desa.
                </p>
            </div>
        </div>
    </section>

    <!-- 4. GOTONG ROYONG HUB (Active Campaigns) -->
    <section id="gotong-royong" class="py-20 bg-brand-dark text-brand-cream px-4 sm:px-6 lg:px-8 relative">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-12">
                <div>
                    <span class="text-xs uppercase font-bold tracking-[0.3em] text-brand-gold">HUB INISIATIF
                        AKTIF</span>
                    <h2 class="font-serif text-3xl sm:text-4xl text-brand-cream font-bold mt-2">Ruang Kolaborasi Gotong
                        Royong</h2>
                </div>
                <a href="#kebutuhan-desa"
                    class="mt-4 md:mt-0 text-brand-gold hover:underline text-sm font-medium flex items-center space-x-2">
                    <span>Lihat Semua Inisiatif Terbuka</span>
                    <i class="fas fa-arrow-right text-xs"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Card 1 -->
                <div
                    class="bg-brand-emerald/80 border border-brand-gold/30 rounded-2xl overflow-hidden hover:border-brand-gold transition flex flex-col justify-between">
                    <div>
                        <div class="h-48 relative overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1606293926075-69a00dbfde81?auto=format&fit=crop&w=600&q=80"
                                alt="Batik Woven" class="w-full h-full object-cover">
                            <span
                                class="absolute top-3 left-3 bg-brand-dark/90 text-brand-gold text-xs px-3 py-1 rounded-full font-semibold border border-brand-gold/30">Desa
                                Bayan, Lombok</span>
                        </div>
                        <div class="p-6 space-y-4">
                            <h3 class="font-serif text-xl font-bold text-brand-cream">Restorasi Rumah Adat Karang Bajo
                            </h3>
                            <p class="text-xs text-brand-cream/80 line-clamp-3">Perbaikan atap ilalang dan pemugaran
                                tiang kayu tiang enam bersama pengrajin lokal desa adat.</p>

                            <!-- Progress -->
                            <div class="space-y-1">
                                <div class="flex justify-between text-xs text-brand-gold">
                                    <span>Terkumpul: 18 Relawan</span>
                                    <span>Target: 25 Relawan</span>
                                </div>
                                <div class="w-full bg-brand-dark h-2 rounded-full overflow-hidden">
                                    <div class="bg-brand-amber h-full w-[72%] rounded-full"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-6 pt-0">
                        <button onclick="openModal('modal-relawan')"
                            class="w-full py-2.5 rounded-xl bg-brand-amber hover:bg-brand-orange text-brand-dark font-bold text-xs uppercase tracking-wider transition">
                            Gabung Inisiatif Ini
                        </button>
                    </div>
                </div>

                <!-- Card 2 -->
                <div
                    class="bg-brand-emerald/80 border border-brand-gold/30 rounded-2xl overflow-hidden hover:border-brand-gold transition flex flex-col justify-between">
                    <div>
                        <div class="h-48 relative overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1516450360452-9312f5e86fc7?auto=format&fit=crop&w=600&q=80"
                                alt="Gamelan Music" class="w-full h-full object-cover">
                            <span
                                class="absolute top-3 left-3 bg-brand-dark/90 text-brand-gold text-xs px-3 py-1 rounded-full font-semibold border border-brand-gold/30">Kutasari,
                                Purbalingga</span>
                        </div>
                        <div class="p-6 space-y-4">
                            <h3 class="font-serif text-xl font-bold text-brand-cream">Digitalisasi Notasi Gamelan Jawa
                                Old</h3>
                            <p class="text-xs text-brand-cream/80 line-clamp-3">Pendokumentasian naskah tembang kuna
                                dan rekaman audio frekuensi tinggi maestro gamelan usia 80+ tahun.</p>

                            <!-- Progress -->
                            <div class="space-y-1">
                                <div class="flex justify-between text-xs text-brand-gold">
                                    <span>Terkumpul: 5 Relawan Audio</span>
                                    <span>Target: 6 Relawan</span>
                                </div>
                                <div class="w-full bg-brand-dark h-2 rounded-full overflow-hidden">
                                    <div class="bg-brand-amber h-full w-[85%] rounded-full"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-6 pt-0">
                        <button onclick="openModal('modal-relawan')"
                            class="w-full py-2.5 rounded-xl bg-brand-amber hover:bg-brand-orange text-brand-dark font-bold text-xs uppercase tracking-wider transition">
                            Gabung Inisiatif Ini
                        </button>
                    </div>
                </div>

                <!-- Card 3 -->
                <div
                    class="bg-brand-emerald/80 border border-brand-gold/30 rounded-2xl overflow-hidden hover:border-brand-gold transition flex flex-col justify-between">
                    <div>
                        <div class="h-48 relative overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1596402184320-417e7178b2cd?auto=format&fit=crop&w=600&q=80"
                                alt="Language Preservation" class="w-full h-full object-cover">
                            <span
                                class="absolute top-3 left-3 bg-brand-dark/90 text-brand-gold text-xs px-3 py-1 rounded-full font-semibold border border-brand-gold/30">Kelimutu,
                                Flores</span>
                        </div>
                        <div class="p-6 space-y-4">
                            <h3 class="font-serif text-xl font-bold text-brand-cream">Kamus Visual Bahasa Lio</h3>
                            <p class="text-xs text-brand-cream/80 line-clamp-3">Penyusunan kamus bergambar bahasa ibu
                                suku Lio untuk anak-anak sekolah dasar di wilayah pedalaman.</p>

                            <!-- Progress -->
                            <div class="space-y-1">
                                <div class="flex justify-between text-xs text-brand-gold">
                                    <span>Terkumpul: 12 Relawan</span>
                                    <span>Target: 15 Relawan</span>
                                </div>
                                <div class="w-full bg-brand-dark h-2 rounded-full overflow-hidden">
                                    <div class="bg-brand-amber h-full w-[80%] rounded-full"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-6 pt-0">
                        <button onclick="openModal('modal-relawan')"
                            class="w-full py-2.5 rounded-xl bg-brand-amber hover:bg-brand-orange text-brand-dark font-bold text-xs uppercase tracking-wider transition">
                            Gabung Inisiatif Ini
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 5. VILLAGE & COMMUNITY NEEDS MAP & SKILL MATCHING SECTION -->
    <section id="kebutuhan-desa" class="py-20 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto space-y-16">
        <!-- Interactive Map Visual Section -->
        <div>
            <div class="text-center max-w-3xl mx-auto mb-10 space-y-3">
                <span class="text-xs uppercase font-bold tracking-[0.3em] text-brand-orange">PETA DISTRIBUSI
                    RELAWAN</span>
                <h2 class="font-serif text-3xl sm:text-4xl text-brand-emerald font-bold">Peta Kebutuhan Desa Adat</h2>
                <p class="text-gray-600 text-sm">Pilihlah wilayah pendampingan yang membutuhkan keahlian dan kepedulian
                    Anda saat ini.</p>
            </div>

            <!-- Simulated Map Visual -->
            <div
                class="relative w-full h-[450px] bg-brand-dark rounded-3xl overflow-hidden border-2 border-brand-gold/40 shadow-xl flex items-center justify-center">
                <!-- Map Graphic Background -->
                <div
                    class="absolute inset-0 opacity-40 bg-[radial-gradient(#E5CB95_1px,transparent_1px)] [background-size:16px_16px]">
                </div>

                <!-- Map SVG Outline Concept -->
                <svg class="absolute inset-0 w-full h-full text-brand-mid/50 stroke-brand-gold/20"
                    viewBox="0 0 800 400" fill="none">
                    <path d="M150 180 Q 200 120 280 160 T 400 150 T 550 200 T 700 180" stroke-width="2"
                        stroke-dasharray="4 4" />
                </svg>

                <!-- Interactive Map Markers -->
                <div class="absolute top-1/3 left-1/4 group cursor-pointer">
                    <div
                        class="w-8 h-8 rounded-full bg-brand-amber/80 text-brand-dark flex items-center justify-center font-bold text-xs animate-bounce border-2 border-white shadow-lg">
                        <i class="fas fa-map-pin"></i>
                    </div>
                    <div
                        class="hidden group-hover:block absolute bottom-10 -left-20 w-52 bg-white text-gray-800 p-3 rounded-xl shadow-2xl border border-brand-gold text-xs z-30">
                        <div class="font-bold text-brand-emerald">Kasepuhan Ciptagelar</div>
                        <div class="text-gray-500 mt-1">Butuh: 4 Pendokumentasi Pertanian Adat</div>
                    </div>
                </div>

                <div class="absolute top-1/2 left-2/4 group cursor-pointer">
                    <div
                        class="w-8 h-8 rounded-full bg-emerald-500/80 text-white flex items-center justify-center font-bold text-xs animate-bounce border-2 border-white shadow-lg">
                        <i class="fas fa-map-pin"></i>
                    </div>
                    <div
                        class="hidden group-hover:block absolute bottom-10 -left-20 w-52 bg-white text-gray-800 p-3 rounded-xl shadow-2xl border border-brand-gold text-xs z-30">
                        <div class="font-bold text-brand-emerald">Desa Sade, Lombok</div>
                        <div class="text-gray-500 mt-1">Butuh: 3 Pengajar Bahasa Inggris Tradisi</div>
                    </div>
                </div>

                <div class="absolute top-2/3 right-1/4 group cursor-pointer">
                    <div
                        class="w-8 h-8 rounded-full bg-amber-600/80 text-white flex items-center justify-center font-bold text-xs animate-bounce border-2 border-white shadow-lg">
                        <i class="fas fa-map-pin"></i>
                    </div>
                    <div
                        class="hidden group-hover:block absolute bottom-10 -left-20 w-52 bg-white text-gray-800 p-3 rounded-xl shadow-2xl border border-brand-gold text-xs z-30">
                        <div class="font-bold text-brand-emerald">Sumba Barat</div>
                        <div class="text-gray-500 mt-1">Butuh: 2 Ahli Konservasi Kain Tenun Ikat</div>
                    </div>
                </div>

                <div
                    class="absolute bottom-6 left-6 bg-brand-dark/90 backdrop-blur-md p-4 rounded-xl border border-brand-gold/30 text-brand-cream text-xs space-y-2">
                    <div class="font-bold text-brand-gold">Keterangan Status Desa:</div>
                    <div class="flex items-center space-x-2"><span
                            class="w-3 h-3 rounded-full bg-brand-amber inline-block"></span><span>Mendesak (Butuh < 1
                                Minggu)</span>
                    </div>
                    <div class="flex items-center space-x-2"><span
                            class="w-3 h-3 rounded-full bg-emerald-500 inline-block"></span><span>Terbuka Pendaftaran
                            Reguler</span></div>
                </div>
            </div>
        </div>

        <!-- 6. SKILL-BASED VOLUNTEER MATCHING FILTER -->
        <div class="bg-brand-creamLight border border-brand-gold/40 rounded-3xl p-8 sm:p-10 shadow-sm">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8">
                <div>
                    <h3 class="font-serif text-2xl font-bold text-brand-emerald">Pencocokan Keahlian Relawan</h3>
                    <p class="text-sm text-gray-600">Temukan misi gotong royong yang pas dengan latar belakang Anda.
                    </p>
                </div>

                <!-- Skill Filters -->
                <div class="flex flex-wrap gap-2" id="skill-filters">
                    <button onclick="filterSkills('all', this)"
                        class="skill-btn active px-4 py-2 rounded-full text-xs font-semibold bg-brand-emerald text-brand-gold border border-brand-emerald transition">Semua
                        Keahlian</button>
                    <button onclick="filterSkills('arsitektur', this)"
                        class="skill-btn px-4 py-2 rounded-full text-xs font-semibold bg-white text-brand-emerald border border-brand-gold/40 hover:bg-brand-emerald hover:text-brand-gold transition">Arsitektur
                        & Bangunan</button>
                    <button onclick="filterSkills('media', this)"
                        class="skill-btn px-4 py-2 rounded-full text-xs font-semibold bg-white text-brand-emerald border border-brand-gold/40 hover:bg-brand-emerald hover:text-brand-gold transition">Fotografi
                        & Video</button>
                    <button onclick="filterSkills('bahasa', this)"
                        class="skill-btn px-4 py-2 rounded-full text-xs font-semibold bg-white text-brand-emerald border border-brand-gold/40 hover:bg-brand-emerald hover:text-brand-gold transition">Linguistik
                        & Riset</button>
                    <button onclick="filterSkills('seni', this)"
                        class="skill-btn px-4 py-2 rounded-full text-xs font-semibold bg-white text-brand-emerald border border-brand-gold/40 hover:bg-brand-emerald hover:text-brand-gold transition">Seni
                        Tari & Musik</button>
                </div>
            </div>

            <!-- Filter Results Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="skills-grid">
                <!-- Skill Card 1 -->
                <div
                    class="skill-card arsitektur bg-white p-6 rounded-2xl border border-gray-200 shadow-sm hover:border-brand-gold transition">
                    <span
                        class="inline-block px-3 py-1 bg-amber-100 text-amber-800 text-[10px] font-bold rounded-full uppercase tracking-wider mb-3">Arsitektur</span>
                    <h4 class="font-serif text-lg font-bold text-brand-emerald">Peta Struktur Umah Adat Gayo</h4>
                    <p class="text-xs text-gray-600 mt-2 mb-4">Membuat cetak biru arsitektur kayu tanpa paku untuk
                        inventarisasi cagar budaya.</p>
                    <div class="flex justify-between items-center text-xs text-gray-500 pt-4 border-t border-gray-100">
                        <span><i class="far fa-clock mr-1"></i> 2 Minggu Fleksibel</span>
                        <button onclick="openModal('modal-relawan')"
                            class="text-brand-emerald font-bold hover:underline">Lamar Misi →</button>
                    </div>
                </div>

                <!-- Skill Card 2 -->
                <div
                    class="skill-card media bg-white p-6 rounded-2xl border border-gray-200 shadow-sm hover:border-brand-gold transition">
                    <span
                        class="inline-block px-3 py-1 bg-blue-100 text-blue-800 text-[10px] font-bold rounded-full uppercase tracking-wider mb-3">Media
                        & Dokumentasi</span>
                    <h4 class="font-serif text-lg font-bold text-brand-emerald">Video Dokudrama Tari Seudati</h4>
                    <p class="text-xs text-gray-600 mt-2 mb-4">Pengambilan gambar sinematik pertunjukan maestro tari
                        Seudati yang tersisa.</p>
                    <div class="flex justify-between items-center text-xs text-gray-500 pt-4 border-t border-gray-100">
                        <span><i class="far fa-clock mr-1"></i> 5 Hari On-Site</span>
                        <button onclick="openModal('modal-relawan')"
                            class="text-brand-emerald font-bold hover:underline">Lamar Misi →</button>
                    </div>
                </div>

                <!-- Skill Card 3 -->
                <div
                    class="skill-card bahasa bg-white p-6 rounded-2xl border border-gray-200 shadow-sm hover:border-brand-gold transition">
                    <span
                        class="inline-block px-3 py-1 bg-emerald-100 text-emerald-800 text-[10px] font-bold rounded-full uppercase tracking-wider mb-3">Linguistik</span>
                    <h4 class="font-serif text-lg font-bold text-brand-emerald">Transkripsi Aksara Lontara</h4>
                    <p class="text-xs text-gray-600 mt-2 mb-4">Membantu penerjemahan naskah lontar Bugis kuno ke format
                        digital Indonesia/Inggris.</p>
                    <div class="flex justify-between items-center text-xs text-gray-500 pt-4 border-t border-gray-100">
                        <span><i class="far fa-clock mr-1"></i> Daring (Remote)</span>
                        <button onclick="openModal('modal-relawan')"
                            class="text-brand-emerald font-bold hover:underline">Lamar Misi →</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 7. COMMUNITY TRADITION CALENDAR & INTERGENERATIONAL LEARNING -->
    <section id="kalender" class="py-20 bg-brand-emerald text-brand-cream px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto space-y-16">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                <!-- Left: Tradition Calendar -->
                <div class="lg:col-span-7 space-y-6">
                    <span class="text-xs uppercase font-bold tracking-[0.3em] text-brand-gold">AGENDA KEBUDAYAAN</span>
                    <h2 class="font-serif text-3xl sm:text-4xl text-brand-cream font-bold">Kalender Upacara & Ritual
                        Lokal</h2>
                    <p class="text-brand-cream/80 text-sm">Hadir dan berpartisipasi langsung dalam perayaan adat
                        masyarakat pendampingan.</p>

                    <div class="space-y-4">
                        <div
                            class="bg-brand-dark/60 border border-brand-gold/30 rounded-2xl p-5 flex items-center space-x-6 hover:bg-brand-dark/90 transition">
                            <div
                                class="text-center bg-brand-amber text-brand-dark rounded-xl px-4 py-3 font-serif font-bold min-w-[70px]">
                                <span class="block text-xl">14</span>
                                <span class="text-[10px] uppercase tracking-wider">NOV</span>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-serif text-lg font-bold text-brand-gold">Upacara Seren Taun Kasepuhan
                                </h4>
                                <p class="text-xs text-brand-cream/70">Cisungsang, Banten — Syukuran hasil panen padi
                                    dan penghormatan pada Dewi Sri.</p>
                            </div>
                            <button onclick="openModal('modal-gathering', 'Upacara / Festival Adat')"
                                class="hidden sm:block text-xs font-semibold px-4 py-2 bg-brand-mid rounded-full border border-brand-gold/30 hover:bg-brand-gold hover:text-brand-dark transition">Daftar
                                Hadir</button>
                        </div>

                        <div
                            class="bg-brand-dark/60 border border-brand-gold/30 rounded-2xl p-5 flex items-center space-x-6 hover:bg-brand-dark/90 transition">
                            <div
                                class="text-center bg-brand-amber text-brand-dark rounded-xl px-4 py-3 font-serif font-bold min-w-[70px]">
                                <span class="block text-xl">02</span>
                                <span class="text-[10px] uppercase tracking-wider">DES</span>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-serif text-lg font-bold text-brand-gold">Festival Pasola Sumba</h4>
                                <p class="text-xs text-brand-cream/70">Wainyapu, Sumba Barat Daya — Ritual ketangkasan
                                    berkuda dan melempar lembing kayu.</p>
                            </div>
                            <button onclick="openModal('modal-gathering', 'Upacara / Festival Adat')"
                                class="hidden sm:block text-xs font-semibold px-4 py-2 bg-brand-mid rounded-full border border-brand-gold/30 hover:bg-brand-gold hover:text-brand-dark transition">Daftar
                                Hadir</button>
                        </div>
                    </div>
                </div>

                <!-- Right: Intergenerational Learning Program Feature -->
                <div class="lg:col-span-5 bg-brand-dark/90 border border-brand-gold/40 rounded-3xl p-8 space-y-6">
                    <div
                        class="w-12 h-12 rounded-full bg-brand-gold/20 text-brand-gold flex items-center justify-center text-xl">
                        <i class="fas fa-people-arrows"></i>
                    </div>
                    <h3 class="font-serif text-2xl font-bold text-brand-gold">Program Belajar Lintas Generasi</h3>
                    <p class="text-xs text-brand-cream/80 leading-relaxed">
                        Menghubungkan anak muda perkotaan dengan *Empu* dan Tetua Adat desa. Belajar kearifan hidup,
                        naskah kuno, jamu tradisional, dan ukiran kayu langsung dari sumbernya.
                    </p>
                    <ul class="text-xs text-brand-cream/90 space-y-2">
                        <li class="flex items-center space-x-2"><i
                                class="fas fa-check text-brand-gold text-[10px]"></i><span>Magang Adat 1-2 Minggu di
                                Posko Desa</span></li>
                        <li class="flex items-center space-x-2"><i
                                class="fas fa-check text-brand-gold text-[10px]"></i><span>Sertifikat Apresiasi
                                Pelestari Kebudayaan</span></li>
                        <li class="flex items-center space-x-2"><i
                                class="fas fa-check text-brand-gold text-[10px]"></i><span>Dokumentasi Portofolio
                                Kebudayaan Digital</span></li>
                    </ul>
                    <button onclick="openModal('modal-relawan')"
                        class="w-full py-3 rounded-xl bg-brand-gold text-brand-dark font-bold text-xs uppercase tracking-wider hover:bg-brand-goldHover transition">Ikuti
                        Program Belajar</button>
                </div>
            </div>
        </div>
    </section>

    <!-- 8. HERITAGE PRESERVATION MISSIONS & TRADITIONAL SKILLS EXCHANGE -->
    <section id="program" class="py-20 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto space-y-16">
        <div>
            <div class="text-center max-w-3xl mx-auto mb-12 space-y-3">
                <span class="text-xs uppercase font-bold tracking-[0.3em] text-brand-orange">PILAR UTAMA</span>
                <h2 class="font-serif text-3xl sm:text-4xl text-brand-emerald font-bold">Misi Pelestarian Cagar Adat
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <!-- Pillar 1 -->
                <div
                    class="bg-white p-6 rounded-2xl border border-brand-gold/30 text-center space-y-4 hover:shadow-lg transition">
                    <div
                        class="w-16 h-16 rounded-full bg-amber-50 text-brand-orange flex items-center justify-center text-2xl mx-auto">
                        <i class="fas fa-scroll"></i>
                    </div>
                    <h4 class="font-serif font-bold text-brand-emerald text-lg">Bahasa & Naskah Ibu</h4>
                    <p class="text-xs text-gray-500">Penyelamatan kamus tutur dan digitalisasi manuskrip kuno pada daun
                        lontar.</p>
                </div>

                <!-- Pillar 2 -->
                <div
                    class="bg-white p-6 rounded-2xl border border-brand-gold/30 text-center space-y-4 hover:shadow-lg transition">
                    <div
                        class="w-16 h-16 rounded-full bg-emerald-50 text-brand-emerald flex items-center justify-center text-2xl mx-auto">
                        <i class="fas fa-gem"></i>
                    </div>
                    <h4 class="font-serif font-bold text-brand-emerald text-lg">Kriya & Tenun Nusantara</h4>
                    <p class="text-xs text-gray-500">Regenerasi penenun muda dan pewarnaan alami berbasis
                        keanekaragaman hayati.</p>
                </div>

                <!-- Pillar 3 -->
                <div
                    class="bg-white p-6 rounded-2xl border border-brand-gold/30 text-center space-y-4 hover:shadow-lg transition">
                    <div
                        class="w-16 h-16 rounded-full bg-amber-50 text-brand-orange flex items-center justify-center text-2xl mx-auto">
                        <i class="fas fa-archway"></i>
                    </div>
                    <h4 class="font-serif font-bold text-brand-emerald text-lg">Konservasi Situs & Rumah</h4>
                    <p class="text-xs text-gray-500">Perbaikan fisik arsitektur vernacular tradisional yang terdampak
                        cuaca.</p>
                </div>

                <!-- Pillar 4 -->
                <div
                    class="bg-white p-6 rounded-2xl border border-brand-gold/30 text-center space-y-4 hover:shadow-lg transition">
                    <div
                        class="w-16 h-16 rounded-full bg-emerald-50 text-brand-emerald flex items-center justify-center text-2xl mx-auto">
                        <i class="fas fa-drum"></i>
                    </div>
                    <h4 class="font-serif font-bold text-brand-emerald text-lg">Seni Pertunjukan Langka</h4>
                    <p class="text-xs text-gray-500">Pemberdayaan sanggar tari adat dan teater rakyat di daerah
                        terpencil.</p>
                </div>
            </div>
        </div>

        <!-- Traditional Skills Exchange - Redesigned -->
        <div class="ln-skill-exchange">

            <div class="ln-skill-decoration ln-skill-decoration-one"></div>
            <div class="ln-skill-decoration ln-skill-decoration-two"></div>

            <div class="ln-skill-content">

                <div class="ln-skill-label">
                    <span class="ln-skill-label-icon">
                        <i class="fas fa-hands-helping"></i>
                    </span>
                    <span>PERTUKARAN KETERAMPILAN TRADISIONAL</span>
                </div>

                <h3 class="ln-skill-title">
                    Beri Keterampilan Modern,
                    <span>Pulang Membawa Kearifan Adat.</span>
                </h3>

                <p class="ln-skill-description">
                    Bagikan keahlian digital, desain, teknologi, dan pemasaran
                    kepada masyarakat desa. Sebagai gantinya, pelajari langsung
                    rahasia pewarnaan alami, tenun tradisional, dan kearifan lokal
                    dari para empu Nusantara.
                </p>

                <div class="ln-skill-highlights">
                    <div class="ln-skill-highlight">
                        <i class="fas fa-laptop-code"></i>
                        <span>Berbagi Keahlian Modern</span>
                    </div>

                    <div class="ln-skill-highlight">
                        <i class="fas fa-palette"></i>
                        <span>Belajar Seni Tradisional</span>
                    </div>

                    <div class="ln-skill-highlight">
                        <i class="fas fa-people-group"></i>
                        <span>Kolaborasi Lintas Generasi</span>
                    </div>
                </div>

            </div>

            <div class="ln-skill-action">

                <div class="ln-skill-action-icon">
                    <i class="fas fa-seedling"></i>
                </div>

                <span class="ln-skill-action-caption">
                    SATU KETERAMPILAN, SERIBU MANFAAT
                </span>

                <button type="button" onclick="openModal('modal-proposal')" class="ln-skill-button">
                    Buka Pertukaran Skill
                    <i class="fas fa-arrow-right"></i>
                </button>

                <span class="ln-skill-action-note">
                    Mari tumbuh dan belajar bersama.
                </span>

            </div>

        </div>
    </section>

    <!-- 9. COMMUNITY CONTRIBUTION LEDGER & LOCAL IMPACT JOURNEY -->
    <section class="py-20 bg-brand-creamLight border-y border-brand-gold/30 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto space-y-16">
            <!-- Contribution Ledger -->
            <div>
                <div class="text-center max-w-2xl mx-auto mb-10 space-y-2">
                    <span class="text-xs uppercase font-bold tracking-[0.3em] text-brand-orange">TRANSPARANSI
                        KONTRIBUSI</span>
                    <h2 class="font-serif text-3xl font-bold text-brand-emerald">Catatan Gotong Royong Relawan</h2>
                </div>

                <div class="bg-white rounded-2xl border border-brand-gold/30 overflow-x-auto shadow-sm">
                    <table class="w-full text-left text-xs">
                        <thead class="bg-brand-emerald text-brand-gold uppercase tracking-wider font-semibold">
                            <tr>
                                <th class="p-4">Tanggal</th>
                                <th class="p-4">Desa Adat</th>
                                <th class="p-4">Bentuk Inisiatif</th>
                                <th class="p-4">Jam Kerja Relawan</th>
                                <th class="p-4">Status Misi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 text-gray-700">
                            <tr class="hover:bg-brand-cream/50">
                                <td class="p-4 font-medium">01 Nov 2026</td>
                                <td class="p-4">Desa Kampong Takpala, Alor</td>
                                <td class="p-4">Pemugaran Mebeler Rumah Fala Fata</td>
                                <td class="p-4 font-semibold text-brand-emerald">320 Jam</td>
                                <td class="p-4"><span
                                        class="px-2.5 py-1 rounded-full bg-emerald-100 text-emerald-800 text-[10px] font-bold">Selesai</span>
                                </td>
                            </tr>
                            <tr class="hover:bg-brand-cream/50">
                                <td class="p-4 font-medium">28 Okt 2026</td>
                                <td class="p-4">Desa Wae Rebo, Manggarai</td>
                                <td class="p-4">Pencatatan Silsilah Lisan Ruteng</td>
                                <td class="p-4 font-semibold text-brand-emerald">180 Jam</td>
                                <td class="p-4"><span
                                        class="px-2.5 py-1 rounded-full bg-emerald-100 text-emerald-800 text-[10px] font-bold">Selesai</span>
                                </td>
                            </tr>
                            <tr class="hover:bg-brand-cream/50">
                                <td class="p-4 font-medium">15 Okt 2026</td>
                                <td class="p-4">Kasepuhan Ciptagelar</td>
                                <td class="p-4">Restorasi Leuit (Lumbung Padi)</td>
                                <td class="p-4 font-semibold text-brand-emerald">450 Jam</td>
                                <td class="p-4"><span
                                        class="px-2.5 py-1 rounded-full bg-emerald-100 text-emerald-800 text-[10px] font-bold">Selesai</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Impact Journey Timeline -->
            <div>
                <h3 class="font-serif text-2xl font-bold text-brand-emerald text-center mb-10">Jejak Transformasi Desa
                </h3>
                <div class="relative border-l-2 border-brand-gold/50 ml-4 md:ml-32 space-y-8">
                    <!-- Timeline Item 1 -->
                    <div class="relative pl-8">
                        <span
                            class="absolute -left-[9px] top-1.5 w-4 h-4 rounded-full bg-brand-orange border-2 border-white"></span>
                        <span class="text-xs font-bold text-brand-orange">2016 — Awal Langkah</span>
                        <h4 class="font-serif font-bold text-brand-emerald text-base">Rintisan 3 Desa Dampingan Pertama
                            di Jawa Barat</h4>
                        <p class="text-xs text-gray-600 mt-1">Mengirimkan 15 relawan peneliti budaya untuk
                            mendokumentasikan tutur lisan suku Sunda Wiwitan.</p>
                    </div>

                    <!-- Timeline Item 2 -->
                    <div class="relative pl-8">
                        <span
                            class="absolute -left-[9px] top-1.5 w-4 h-4 rounded-full bg-brand-emerald border-2 border-white"></span>
                        <span class="text-xs font-bold text-brand-emerald">2020 — Memperluas Cakupan Nusantara</span>
                        <h4 class="font-serif font-bold text-brand-emerald text-base">Ekspedisi Kebudayaan Nusa
                            Tenggara & Maluku</h4>
                        <p class="text-xs text-gray-600 mt-1">Pendokumentasian pewarnaan kain tenun ikat dan jaringan
                            pelestari bahasa daerah langka.</p>
                    </div>

                    <!-- Timeline Item 3 -->
                    <div class="relative pl-8">
                        <span
                            class="absolute -left-[9px] top-1.5 w-4 h-4 rounded-full bg-brand-amber border-2 border-white"></span>
                        <span class="text-xs font-bold text-brand-amber">2026 — Gerakan Masif Digital</span>
                        <h4 class="font-serif font-bold text-brand-emerald text-base">Terhubungnya 1.200+ Relawan Aktif
                            dan 38 Desa</h4>
                        <p class="text-xs text-gray-600 mt-1">Menggabungkan kekuatan teknologi digital dengan aksi
                            gotong royong lapangan.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 10. VOLUNTEER FIELD JOURNAL & TESTIMONIALS -->
    <section id="jurnal" class="py-20 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto space-y-16">
        <!-- Field Journal -->
        <div>
            <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-12">
                <div>
                    <span class="text-xs uppercase font-bold tracking-[0.3em] text-brand-orange">DOKUMENTASI
                        LAPANGAN</span>
                    <h2 class="font-serif text-3xl sm:text-4xl text-brand-emerald font-bold mt-2">Jurnal Catatan
                        Relawan</h2>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div
                    class="bg-white rounded-2xl overflow-hidden border border-brand-gold/30 shadow-sm hover:shadow-md transition">
                    <img src="https://images.unsplash.com/photo-1544717305-2782549b5136?auto=format&fit=crop&w=600&q=80"
                        alt="Journal 1" class="h-48 w-full object-cover">
                    <div class="p-6 space-y-3">
                        <span class="text-[10px] uppercase font-bold text-brand-orange">Jurnal Desa Baduy</span>
                        <h4 class="font-serif font-bold text-brand-emerald text-lg">Malam Cerita di Saung Humut</h4>
                        <p class="text-xs text-gray-600">"Menghabiskan malam tanpa listrik sambil mendengarkan dongeng
                            leluhur dari Pu'un..."</p>
                        <div class="text-[10px] text-gray-400 pt-2">Oleh: Anindya (Relawan Penulis)</div>
                    </div>
                </div>

                <div
                    class="bg-white rounded-2xl overflow-hidden border border-brand-gold/30 shadow-sm hover:shadow-md transition">
                    <img src="https://images.unsplash.com/photo-1606293926075-69a00dbfde81?auto=format&fit=crop&w=600&q=80"
                        alt="Journal 2" class="h-48 w-full object-cover">
                    <div class="p-6 space-y-3">
                        <span class="text-[10px] uppercase font-bold text-brand-orange">Jurnal Tenun Sumba</span>
                        <h4 class="font-serif font-bold text-brand-emerald text-lg">Belajar Kesabaran dari Akar
                            Mengkudu</h4>
                        <p class="text-xs text-gray-600">"Ternyata merahnya benang tenun Sumba butuh fermentasi akar
                            hingga berbulan-bulan..."</p>
                        <div class="text-[10px] text-gray-400 pt-2">Oleh: Rizky (Relawan Fotografer)</div>
                    </div>
                </div>

                <div
                    class="bg-white rounded-2xl overflow-hidden border border-brand-gold/30 shadow-sm hover:shadow-md transition">
                    <img src="https://images.unsplash.com/photo-1516450360452-9312f5e86fc7?auto=format&fit=crop&w=600&q=80"
                        alt="Journal 3" class="h-48 w-full object-cover">
                    <div class="p-6 space-y-3">
                        <span class="text-[10px] uppercase font-bold text-brand-orange">Jurnal Musik Adat</span>
                        <h4 class="font-serif font-bold text-brand-emerald text-lg">Harmoni Bambu Sunda di Kaki Gunung
                        </h4>
                        <p class="text-xs text-gray-600">"Merekam nada angklung buhun yang dinyanyikan saat proses
                            penanaman padi pertama..."</p>
                        <div class="text-[10px] text-gray-400 pt-2">Oleh: Kevin (Relawan Etnomusikologi)</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Testimonials & Community Voices -->
        <div class="bg-brand-emerald text-brand-cream rounded-3xl p-8 sm:p-12 relative overflow-hidden">
            <div class="max-w-3xl mx-auto text-center space-y-6 relative z-10">
                <i class="fas fa-quote-left text-4xl text-brand-gold opacity-50"></i>
                <p class="font-serif text-lg sm:text-xl italic text-brand-cream/90 leading-relaxed">
                    "Kehadiran anak-anak muda relawan Lentera Nusantara tidak mengubah adat kami, justru memberi kami
                    semangat baru bahwa warisan nenek moyang ini sangat berharga di mata dunia luar."
                </p>
                <div>
                    <h5 class="font-bold text-brand-gold text-base">Abah Uci Sanusi</h5>
                    <span class="text-xs text-brand-cream/70">Tokoh Adat Kasepuhan Banten Kidul</span>
                </div>
            </div>
        </div>
    </section>

    <!-- 11. PARTNER DIRECTORY & CODE OF CONDUCT -->
    <section
        class="py-16 bg-brand-cream border-t border-brand-gold/30 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto space-y-12">
        <!-- Partner Directory -->
        <div>
            <h4 class="text-xs uppercase font-bold tracking-[0.3em] text-brand-orange text-center mb-6">MITRA & TOKOH
                ADALAH KELUARGA KAMI</h4>
            <div
                class="flex flex-wrap justify-center items-center gap-8 opacity-70 grayscale hover:grayscale-0 transition duration-300 text-brand-emerald font-serif font-bold text-lg">
                <span>• Aliansi Masyarakat Adat (AMAN)</span>
                <span>• Kasepuhan Ciptagelar</span>
                <span>• Yayasan Kebudayaan Nusantara</span>
                <span>• Balai Pelestarian Kebudayaan</span>
            </div>
        </div>

        <!-- Code of Conduct Highlight Box -->
        <div class="bg-white rounded-2xl p-6 border border-brand-gold/30 max-w-4xl mx-auto text-center space-y-3">
            <h4 class="font-serif font-bold text-brand-emerald text-lg"><i
                    class="fas fa-book-read text-brand-orange mr-2"></i>Kode Etik Relawan Budaya</h4>
            <p class="text-xs text-gray-600 max-w-2xl mx-auto">
                Setiap relawan wajib mematuhi 5 Etika Adat: Meminta izin pada ketua adat, berbusana sopan sesuai
                kebiasaan setempat, tidak mengambil benda adat tanpa izin, menjaga kebersihan lingkungan, dan tidak
                memaksakan budaya luar.
            </p>
        </div>
    </section>

    <!-- 12. FAQ SECTION -->
    <section class="py-20 bg-brand-creamLight px-4 sm:px-6 lg:px-8 max-w-4xl mx-auto">
        <div class="text-center mb-12 space-y-2">
            <span class="text-xs uppercase font-bold tracking-[0.3em] text-brand-orange">TANYA JAWAB</span>
            <h2 class="font-serif text-3xl font-bold text-brand-emerald">Pertanyaan Umum (FAQ)</h2>
        </div>

        <div class="space-y-4">
            <!-- FAQ 1 -->
            <div class="bg-white rounded-xl border border-brand-gold/30 overflow-hidden">
                <button onclick="toggleFaq(this)"
                    class="w-full text-left p-5 font-serif font-bold text-brand-emerald flex justify-between items-center text-sm sm:text-base">
                    <span>Apakah saya harus memiliki latar belakang seni/budaya untuk jadi relawan?</span>
                    <i class="fas fa-chevron-down text-brand-gold transition-transform"></i>
                </button>
                <div class="px-5 pb-5 text-xs text-gray-600 hidden leading-relaxed">
                    Tidak mutlak! Kami membutuhkan beragam latar belakang: dokumentator, pengajar, tim medis, arsitek,
                    hingga tenaga umum yang mau gotong royong fisik.
                </div>
            </div>

            <!-- FAQ 2 -->
            <div class="bg-white rounded-xl border border-brand-gold/30 overflow-hidden">
                <button onclick="toggleFaq(this)"
                    class="w-full text-left p-5 font-serif font-bold text-brand-emerald flex justify-between items-center text-sm sm:text-base">
                    <span>Bagaimana dengan akomodasi dan biaya selama mengabdi di desa?</span>
                    <i class="fas fa-chevron-down text-brand-gold transition-transform"></i>
                </button>
                <div class="px-5 pb-5 text-xs text-gray-600 hidden leading-relaxed">
                    Akomodasi (tempat tinggal di rumah warga/posko) dan makan disediakan oleh program gotong royong
                    desa. Relawan hanya menanggung transportasi menuju meeting point utama.
                </div>
            </div>

            <!-- FAQ 3 -->
            <div class="bg-white rounded-xl border border-brand-gold/30 overflow-hidden">
                <button onclick="toggleFaq(this)"
                    class="w-full text-left p-5 font-serif font-bold text-brand-emerald flex justify-between items-center text-sm sm:text-base">
                    <span>Berapa lama durasi program pengabdian di desa adat?</span>
                    <i class="fas fa-chevron-down text-brand-gold transition-transform"></i>
                </button>
                <div class="px-5 pb-5 text-xs text-gray-600 hidden leading-relaxed">
                    Durasi bervariasi dari 3 hari (ekspedisi akhir pekan), 2 minggu (misi khusus), hingga 1 bulan untuk
                    program pengabdian penuh.
                </div>
            </div>
        </div>
    </section>

    <!-- 13. FOOTER -->
    <footer id="kontak"
        class="bg-brand-dark text-brand-cream border-t border-brand-gold/30 pt-16 pb-8 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-10 pb-12 border-b border-brand-gold/20">
            <!-- Col 1 -->
            <div class="space-y-4">
                <div class="flex items-center space-x-3">
                    <div
                        class="w-10 h-10 rounded-full bg-brand-emerald border border-brand-gold flex items-center justify-center text-brand-gold">
                        <i class="fas fa-seedling"></i>
                    </div>
                    <span class="font-serif text-lg font-bold text-brand-gold">Lentera Nusantara</span>
                </div>
                <p class="text-xs text-brand-cream/70 leading-relaxed">
                    Gerakan gotong royong relawan pelestari kebudayaan dan kearifan lokal desa adat Nusantara.
                </p>
            </div>

            <!-- Col 2 -->
            <div>
                <h5 class="font-serif font-bold text-brand-gold text-sm mb-4">Navigasi Utama</h5>
                <ul class="space-y-2 text-xs text-brand-cream/80">
                    <li><a href="#tentang" class="hover:text-brand-gold">Tentang Gerakan</a></li>
                    <li><a href="#gotong-royong" class="hover:text-brand-gold">Gotong Royong Hub</a></li>
                    <li><a href="#kebutuhan-desa" class="hover:text-brand-gold">Peta Kebutuhan Desa</a></li>
                    <li><a href="#kalender" class="hover:text-brand-gold">Kalender Adat</a></li>
                </ul>
            </div>

            <!-- Col 3 -->
            <div>
                <h5 class="font-serif font-bold text-brand-gold text-sm mb-4">Formulir & Pendaftaran</h5>
                <ul class="space-y-2 text-xs text-brand-cream/80">
                    <li><button onclick="openModal('modal-relawan')"
                            class="hover:text-brand-gold text-left">Pendaftaran Relawan</button></li>
                    <li><button onclick="openModal('modal-proposal')"
                            class="hover:text-brand-gold text-left">Pengajuan Proposal Desa</button></li>
                    <li><button onclick="openModal('modal-gathering', 'Upacara / Festival Adat')"
                            class="hover:text-brand-gold text-left">Registrasi Rembuk Warga</button></li>
                </ul>
            </div>

            <!-- Col 4: Newsletter -->
            <div class="space-y-4">
                <h5 class="font-serif font-bold text-brand-gold text-sm">Warta Budaya Nusantara</h5>
                <p class="text-xs text-brand-cream/70">Dapatkan kabar pembaruan ekspedisi desa adat langsung di surel
                    Anda.</p>
                <form onsubmit="event.preventDefault(); alert('Terima kasih telah berlangganan Warta Budaya!');"
                    class="flex space-x-2">
                    <input type="email" placeholder="Email Anda..." required
                        class="px-3 py-2 text-xs bg-brand-emerald border border-brand-gold/30 rounded-lg text-brand-cream placeholder-brand-cream/50 focus:outline-none w-full">
                    <button type="submit"
                        class="px-4 py-2 bg-brand-gold text-brand-dark font-bold text-xs rounded-lg hover:bg-brand-goldHover transition">Kirim</button>
                </form>
            </div>
        </div>

        <div
            class="max-w-7xl mx-auto pt-6 flex flex-col sm:flex-row justify-between items-center text-[11px] text-brand-cream/60 space-y-4 sm:space-y-0">
            <div>© 2026 Lentera Nusantara — Gerakan Relawan Budaya. Dari Desa Untuk Indonesia.</div>
            <div class="flex space-x-6">
                <a href="#" class="hover:text-brand-gold">Privasi & Etika</a>
                <a href="#" class="hover:text-brand-gold">Syarat Relawan</a>
            </div>
        </div>
    </footer>


    <!-- ================= FLOATING BUTTONS (WHATSAPP & AI CHATBOT SIDE-BY-SIDE) ================= -->
    <div class="fixed bottom-6 right-6 z-50 flex items-center space-x-3">
        <!-- Floating WhatsApp Button -->
        <a href="https://wa.me/6281234567890" target="_blank" rel="noopener noreferrer"
            class="w-14 h-14 rounded-full bg-emerald-600 hover:bg-emerald-500 text-white flex items-center justify-center shadow-2xl transition-transform transform hover:scale-110 border-2 border-white/20"
            title="Hubungi Posko WA Relawan">
            <i class="fab fa-whatsapp text-2xl"></i>
        </a>

        <!-- Floating AI Chatbot Button (With Unique Cultural Animated Pattern & Ripple Glow) -->
        <button id="ai-chat-trigger" onclick="toggleAiChat()"
            class="ai-btn-pulse w-14 h-14 rounded-full bg-brand-dark text-brand-gold border-2 border-brand-gold flex items-center justify-center shadow-2xl relative group overflow-hidden transition-transform transform hover:scale-110">
            <!-- Animated Batik Pattern Layer inside Button -->
            <div class="absolute inset-0 opacity-20 bg-[radial-gradient(#E5CB95_1px,transparent_1px)] [background-size:6px_6px] animate-spin"
                style="animation-duration: 20s;"></div>

            <i class="fas fa-sparkles text-xl relative z-10 text-brand-gold group-hover:rotate-12 transition"></i>
            <span class="absolute -top-1 -right-1 w-3 h-3 bg-brand-amber rounded-full border border-brand-dark"></span>
        </button>
    </div>

    <!-- AI CHATBOT INTERACTIVE MODAL / DIALOG -->
    <div id="ai-chat-window"
        class="hidden fixed bottom-24 right-6 z-50 w-80 sm:w-96 bg-brand-dark border-2 border-brand-gold/60 rounded-3xl shadow-2xl overflow-hidden flex flex-col h-[480px]">
        <!-- Chat Header -->
        <div class="bg-brand-emerald p-4 border-b border-brand-gold/30 flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <div
                    class="w-9 h-9 rounded-full bg-brand-dark border border-brand-gold flex items-center justify-center text-brand-gold">
                    <i class="fas fa-robot text-sm"></i>
                </div>
                <div>
                    <h4 class="font-serif font-bold text-brand-gold text-xs">Asisten Budaya Nusantara</h4>
                    <span class="text-[10px] text-brand-cream/70 block flex items-center gap-1">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span> Siap Membantu 24/7
                    </span>
                </div>
            </div>
            <button onclick="toggleAiChat()" class="text-brand-cream/70 hover:text-brand-gold text-sm"><i
                    class="fas fa-times"></i></button>
        </div>

        <!-- Chat Messages Container -->
        <div id="ai-messages" class="flex-1 p-4 overflow-y-auto space-y-3 text-xs bg-batik-pattern">
            <div
                class="bg-brand-emerald/90 text-brand-cream p-3 rounded-2xl rounded-tl-none border border-brand-gold/20 max-w-[85%]">
                Tabik! Saya Asisten Budaya Lentera Nusantara. Ada yang ingin ditanyakan seputar misi relawan, agenda
                adat, atau kearifan lokal desa?
            </div>
        </div>

        <!-- Quick Questions Chips -->
        <div class="p-2 bg-brand-dark/90 border-t border-brand-gold/20 flex space-x-2 overflow-x-auto text-[10px]">
            <button onclick="quickAsk('Bagaimana cara mendaftar relawan?')"
                class="px-2.5 py-1 bg-brand-mid text-brand-gold rounded-full whitespace-nowrap border border-brand-gold/30 hover:bg-brand-gold hover:text-brand-dark transition">Cara
                Daftar</button>
            <button onclick="quickAsk('Apa saja syarat ekspedisi desa?')"
                class="px-2.5 py-1 bg-brand-mid text-brand-gold rounded-full whitespace-nowrap border border-brand-gold/30 hover:bg-brand-gold hover:text-brand-dark transition">Syarat
                Ekspedisi</button>
        </div>

        <!-- Chat Input Form -->
        <form onsubmit="handleAiSubmit(event)" class="p-3 bg-brand-dark border-t border-brand-gold/30 flex gap-2">
            <input type="text" id="ai-input" placeholder="Tanyakan seputar kebudayaan..."
                class="flex-1 bg-brand-emerald text-brand-cream text-xs px-3 py-2 rounded-full border border-brand-gold/30 focus:outline-none focus:border-brand-gold">
            <button type="submit"
                class="w-8 h-8 rounded-full bg-brand-gold text-brand-dark flex items-center justify-center font-bold text-xs hover:bg-white transition"><i
                    class="fas fa-paper-plane"></i></button>
        </form>
    </div>


    <!-- ================= MODALS SECTION ================= -->
    <!-- 1. VOLUNTEER REGISTRATION FORM MODAL -->
    <div id="modal-relawan"
        class="hidden fixed inset-0 z-50 bg-black/70 backdrop-blur-sm flex items-center justify-center p-4">
        <div
            class="bg-white rounded-3xl max-w-xl w-full p-6 sm:p-8 border-2 border-brand-gold shadow-2xl relative max-h-[90vh] overflow-y-auto">
            <button onclick="closeModal('modal-relawan')"
                class="absolute top-4 right-4 text-gray-400 hover:text-brand-emerald text-xl"><i
                    class="fas fa-times"></i></button>

            <div class="text-center mb-6">
                <span class="text-[10px] uppercase font-bold tracking-[0.2em] text-brand-orange">FORMULIR
                    PENDAFTARAN</span>
                <h3 class="font-serif text-2xl font-bold text-brand-emerald mt-1">Gabung Sebagai Relawan Budaya</h3>
            </div>

            <form onsubmit="handleFormSubmit(event, 'Relawan')" class="space-y-4 text-xs">
                <div>
                    <label class="block font-semibold text-gray-700 mb-1">Nama Lengkap</label>
                    <input type="text" required name="Nama Lengkap" placeholder="Contoh: Rahma Melati"
                        class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:border-brand-emerald focus:outline-none">
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block font-semibold text-gray-700 mb-1">Email</label>
                        <input type="email" name="Email" required placeholder="nama@email.com"
                            class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:border-brand-emerald focus:outline-none">
                    </div>
                    <div>
                        <label class="block font-semibold text-gray-700 mb-1">Nomor WhatsApp</label>
                        <input type="tel" name="Nomor WhatsApp" required placeholder="08123456789"
                            class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:border-brand-emerald focus:outline-none">
                    </div>
                </div>

                <div>
                    <label class="block font-semibold text-gray-700 mb-1">Keahlian Utama yang Ingin
                        Didedikasikan</label>
                    <select name="Keahlian Utama"
                        class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:border-brand-emerald focus:outline-none bg-white">
                        <option>Dokumentasi & Fotografi / Video</option>
                        <option>Arsitektur & Pemugaran Fisik</option>
                        <option>Linguistik & Riset Bahasa Ibu</option>
                        <option>Seni Musik / Gamelan / Tari</option>
                        <option>Pengajaran & Pembelajaran Anak</option>
                        <option>Tenaga Gotong Royong Umum</option>
                    </select>
                </div>

                <div>
                    <label class="block font-semibold text-gray-700 mb-1">Motivasi Singkat</label>
                    <textarea name="Motivasi" rows="3" placeholder="Mengapa Anda tertarik menjaga kebudayaan desa adat?"
                        class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:border-brand-emerald focus:outline-none"></textarea>
                </div>

                <div class="pt-2">
                    <button type="submit"
                        class="w-full py-3 rounded-xl bg-brand-emerald text-brand-gold font-bold uppercase tracking-wider text-xs hover:bg-brand-mid transition">Kirim
                        Pendaftaran Relawan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- 2. COMMUNITY COLLABORATION PROPOSAL FORM MODAL -->
    <div id="modal-proposal"
        class="hidden fixed inset-0 z-50 bg-black/70 backdrop-blur-sm flex items-center justify-center p-4">
        <div
            class="bg-white rounded-3xl max-w-xl w-full p-6 sm:p-8 border-2 border-brand-gold shadow-2xl relative max-h-[90vh] overflow-y-auto">
            <button onclick="closeModal('modal-proposal')"
                class="absolute top-4 right-4 text-gray-400 hover:text-brand-emerald text-xl"><i
                    class="fas fa-times"></i></button>

            <div class="text-center mb-6">
                <span class="text-[10px] uppercase font-bold tracking-[0.2em] text-brand-orange">MITRA & DESA
                    ADAT</span>
                <h3 class="font-serif text-2xl font-bold text-brand-emerald mt-1">Ajukan Kolaborasi Desa / Inisiatif
                </h3>
            </div>

            <form onsubmit="handleFormSubmit(event, 'Proposal')" class="space-y-4 text-xs">
                <div>
                    <label class="block font-semibold text-gray-700 mb-1">Nama Lembaga / Komunitas Adat</label>
                    <input type="text" required name="Nama Lembaga / Komunitas Adat"
                        placeholder="Contoh: Sanggar Seni Desa Sade"
                        class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:border-brand-emerald focus:outline-none">
                </div>

                <div>
                    <label class="block font-semibold text-gray-700 mb-1">Nama Penanggung Jawab / Tokoh Adat</label>
                    <input type="text" required placeholder="Nama Lengkap"
                        class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:border-brand-emerald focus:outline-none">
                </div>

                <div>
                    <label class="block font-semibold text-gray-700 mb-1">Bentuk Kebutuhan Pendampingan</label>
                    <textarea name="Kebutuhan Pendampingan" rows="3"
                        placeholder="Jelaskan kebutuhan relawan atau pelestarian budaya yang dibutuhkan di wilayah Anda..."
                        class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:border-brand-emerald focus:outline-none"></textarea>
                </div>

                <div class="pt-2">
                    <button type="submit"
                        class="w-full py-3 rounded-xl bg-brand-emerald text-brand-gold font-bold uppercase tracking-wider text-xs hover:bg-brand-mid transition">Kirim
                        Proposal Kolaborasi</button>
                </div>
            </form>
        </div>
    </div>

    <!-- 3. COMMUNITY GATHERING REGISTRATION MODAL -->
    <div id="modal-gathering"
        class="hidden fixed inset-0 z-50 bg-black/70 backdrop-blur-sm flex items-center justify-center p-4">
        <div class="bg-white rounded-3xl max-w-md w-full p-6 border-2 border-brand-gold shadow-2xl relative">
            <button onclick="closeModal('modal-gathering')"
                class="absolute top-4 right-4 text-gray-400 hover:text-brand-emerald text-xl"><i
                    class="fas fa-times"></i></button>
            <div class="text-center space-y-2 mb-4">
                <h3 class="font-serif text-xl font-bold text-brand-emerald">Registrasi Hadir Ritual / Festival</h3>
                <p class="text-xs text-gray-500">Konfirmasi kehadiran Anda dalam acara ritual adat agar panitia posko
                    dapat mempersiapkan tempat penampungan.</p>
            </div>
            <form onsubmit="handleFormSubmit(event, 'Kehadiran Event')" class="space-y-3 text-xs"><input
                    type="hidden" name="Acara" id="gathering-event" value="Festival / Ritual Adat">
                <input type="text" name="Nama Lengkap" required placeholder="Nama Lengkap"
                    class="w-full px-4 py-2.5 rounded-xl border border-gray-300">
                <input type="tel" name="Nomor WhatsApp" required placeholder="Nomor WhatsApp"
                    class="w-full px-4 py-2.5 rounded-xl border border-gray-300">
                <button type="submit"
                    class="w-full py-3 rounded-xl bg-brand-emerald text-brand-gold font-bold">Konfirmasi
                    Kehadiran</button>
            </form>
        </div>
    </div>

    <script
        src="{{ asset('js/website-bisnis/templates/nonprofit-community/volunteer-group/lentera-nusantara/lentera-nusantara.js') }}">
    </script>
</body>

</html>
