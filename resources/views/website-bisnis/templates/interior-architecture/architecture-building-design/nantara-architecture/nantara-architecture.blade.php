<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nantara Architecture | Arsitektur Etnik & Heritage Nusantara</title>
    <link rel="stylesheet" href="{{ asset('css/website-bisnis/templates/interior-architecture/architecture-building-design/nantara-architecture/nantara-architecture.css') }}?v=1">
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts: Playfair Display, Plus Jakarta Sans, Cinzel -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500;700;900&family=Playfair+Display:ital,wght@0,400;0,600;0,700;0,900;1,400;1,700&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        teak: {
                            50: '#FBF8F3',
                            100: '#F3ECE0',
                            200: '#E2D3BE',
                            300: '#CBB295',
                            400: '#A98967',
                            500: '#8C6C4B',
                            600: '#6E5136',
                            700: '#523B26',
                            800: '#3D2A1B',
                            900: '#2B1810', // Deep Teak Wood
                            950: '#180C07',
                        },
                        terracotta: {
                            500: '#B84A28',
                            600: '#963D1E', // Clay Terracotta
                            700: '#752E15',
                        },
                        brass: {
                            300: '#E5C578',
                            400: '#D6AE52',
                            500: '#C89B3C', // Antique Brass Gold
                            600: '#A67D2C',
                        },
                        moss: {
                            500: '#4E5F48',
                            600: '#3B4836', // Deep Wood Moss
                            700: '#2A3427',
                        },
                        sand: '#FAF5EE',
                        parchment: '#F3ECE0',
                    },
                    fontFamily: {
                        serif: ['Playfair Display', 'serif'],
                        cinzel: ['Cinzel', 'serif'],
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                    },
                    backgroundImage: {
                        'batik-pattern': "url('data:image/svg+xml,%3Csvg width=\"60\" height=\"60\" viewBox=\"0 0 60 60\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cpath d=\"M30 0L60 30L30 60L0 30L30 0zm0 10L10 30l20 20 20-20L30 10z\" fill=\"%23C89B3C\" fill-opacity=\"0.05\" fill-rule=\"evenodd\"/%3E%3C/svg%3E')",
                    }
                }
            }
        }
    </script>

    
</head>
<body class="bg-teak-900 text-teak-100 font-sans antialiased selection:bg-brass-500 selection:text-teak-950 bg-batik-pattern">


    <!-- TOPBAR ANNOUNCEMENT TICKER -->
    <div class="bg-teak-950 text-teak-200 text-xs py-2 px-4 border-b border-brass-500/30 relative z-50">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center gap-2">
            <div class="flex items-center space-x-3 overflow-hidden text-center md:text-left">
                <span class="bg-brass-500 text-teak-950 font-bold px-2 py-0.5 rounded text-[10px] uppercase tracking-wider flex-shrink-0">
                    <i class="fa-solid fa-crown mr-1"></i> <span data-i18n="topbar_badge">HERITAGE CERTIFIED</span>
                </span>
                <p class="truncate text-teak-300">
                    <span class="text-brass-300 font-semibold" data-i18n="topbar_msg">Konsultasi Arsitektur Joglo & Limasan Kayu Jati TPK Perhutani Heritage</span>
                    <a href="#estimator" class="underline hover:text-brass-400 ml-2 font-medium" data-i18n="topbar_cta">Hitung Estimasi Biaya &rarr;</a>
                </p>
            </div>
            
            <div class="flex items-center space-x-4">
                <a href="tel:+628123456789" class="hover:text-brass-400 transition text-[11px] hidden sm:flex items-center gap-1">
                    <i class="fa-solid fa-phone text-brass-500"></i> +62 812-3456-7890
                </a>
                <span class="text-teak-700 hidden sm:inline">|</span>
                <!-- Language Switcher -->
                <div class="flex items-center bg-teak-900 rounded-full p-0.5 border border-brass-500/30 text-[11px]">
                    <button id="btn-lang-id" onclick="setLanguage('id')" class="px-2 py-0.5 rounded-full font-bold bg-brass-500 text-teak-950">🇮🇩 ID</button>
                    <button id="btn-lang-en" onclick="setLanguage('en')" class="px-2 py-0.5 rounded-full font-bold text-teak-300 hover:text-white">🇬🇧 EN</button>
                </div>
            </div>
        </div>
    </div>

    <!-- MAIN STICKY NAVBAR -->
    <header class="sticky top-2 z-40 px-4 sm:px-8 max-w-7xl mx-auto">
        <nav class="glass-wood rounded-2xl px-5 py-3.5 flex items-center justify-between shadow-2xl">
            <!-- Brand Logo with Javanese Crest -->
            <a href="#" class="flex items-center gap-3 group">
                <div class="w-11 h-11 rounded-xl bg-gradient-to-tr from-teak-800 to-terracotta-600 border border-brass-500/50 flex items-center justify-center text-brass-400 text-2xl font-serif shadow-lg group-hover:scale-105 transition">
                    🏛️
                </div>
                <div>
                    <span class="font-serif text-xl font-bold tracking-wider text-teak-50 block leading-none">NANTARA</span>
                    <span class="text-[9px] tracking-widest text-brass-400 uppercase font-cinzel block mt-1" data-i18n="nav_subtitle">Arsitektur Etnik Nusantara</span>
                </div>
            </a>

            <!-- Desktop Links -->
            <ul class="hidden lg:flex items-center space-x-7 text-xs uppercase font-semibold tracking-wider text-teak-200">
                <li><a href="#regional" class="hover:text-brass-400 transition" data-i18n="nav_regional">Gaya Regional</a></li>
                <li><a href="#portfolio" class="hover:text-brass-400 transition" data-i18n="nav_portfolio">Portofolio Karya</a></li>
                <li><a href="#viewer3d" class="hover:text-brass-400 transition" data-i18n="nav_viewer">Denah & 3D Layer</a></li>
                <li><a href="#materials" class="hover:text-brass-400 transition" data-i18n="nav_materials">Material Etnik</a></li>
                <li><a href="#estimator" class="hover:text-brass-400 transition" data-i18n="nav_estimator">Kalkulator Biaya</a></li>
                <li><a href="#packages" class="hover:text-brass-400 transition" data-i18n="nav_packages">Paket Desain</a></li>
            </ul>

            <!-- CTA Button -->
            <div class="flex items-center space-x-3">
                <a href="#contact" class="bg-gradient-to-r from-brass-500 to-terracotta-600 hover:from-brass-600 hover:to-terracotta-700 text-teak-950 font-bold px-5 py-2.5 rounded-xl text-xs uppercase tracking-wider transition shadow-lg flex items-center gap-2">
                    <i class="fa-solid fa-compass"></i>
                    <span data-i18n="nav_cta">Konsultasi Project</span>
                </a>
                <button onclick="toggleMobileNav()" class="lg:hidden text-brass-400 text-xl p-2 focus:outline-none">
                    <i class="fa-solid fa-bars"></i>
                </button>
            </div>
        </nav>

        <!-- Mobile Drawer -->
        <div id="mobile-nav" class="hidden lg:hidden mt-2 glass-wood rounded-2xl p-6 space-y-4 border border-brass-500/30 text-xs uppercase tracking-wider">
            <a href="#regional" onclick="toggleMobileNav()" class="block py-1 hover:text-brass-400" data-i18n="nav_regional">Gaya Regional</a>
            <a href="#portfolio" onclick="toggleMobileNav()" class="block py-1 hover:text-brass-400" data-i18n="nav_portfolio">Portofolio Karya</a>
            <a href="#viewer3d" onclick="toggleMobileNav()" class="block py-1 hover:text-brass-400" data-i18n="nav_viewer">Denah & 3D Layer</a>
            <a href="#materials" onclick="toggleMobileNav()" class="block py-1 hover:text-brass-400" data-i18n="nav_materials">Material Etnik</a>
            <a href="#estimator" onclick="toggleMobileNav()" class="block py-1 hover:text-brass-400" data-i18n="nav_estimator">Kalkulator Biaya</a>
            <a href="#packages" onclick="toggleMobileNav()" class="block py-1 hover:text-brass-400" data-i18n="nav_packages">Paket Desain</a>
        </div>
    </header>

    <!-- HERO BANNER (Interactive Hotspot Structure Tour) -->
    <section class="relative pt-12 pb-24 px-4 sm:px-8 max-w-7xl mx-auto overflow-hidden">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <!-- Hero Left Typography & Story -->
            <div class="lg:col-span-6 space-y-6">
                <div class="inline-flex items-center gap-2 bg-teak-800/80 border border-brass-500/40 text-brass-300 text-xs px-4 py-1.5 rounded-full">
                    <i class="fa-solid fa-gem text-brass-400"></i>
                    <span data-i18n="hero_badge">Kemewahan Tradisi Jawi & Modernitas</span>
                </div>

                <h1 class="font-serif text-4xl sm:text-6xl font-bold leading-tight text-teak-50">
                    <span data-i18n="hero_title1">Membangun Mahakarya</span>
                    <span class="text-gradient-gold block italic font-cinzel" data-i18n="hero_title2">Joglo & Heritage Nusantara</span>
                </h1>

                <p class="text-teak-200 text-sm sm:text-base leading-relaxed" data-i18n="hero_desc">
                    Nantara Architecture memadukan filosofi tata ruang Primbon Jawa, keagungan struktur kayu Jati TPK Perhutani, dan kenyamanan arsitektur modern ramah energi untuk hunian etnik, resort, dan pendopo bernilai tinggi.
                </p>

                <!-- Action Buttons -->
                <div class="flex flex-wrap items-center gap-4 pt-2">
                    <a href="#estimator" class="bg-brass-500 hover:bg-brass-400 text-teak-950 font-bold px-7 py-3.5 rounded-xl text-xs uppercase tracking-wider transition shadow-xl flex items-center gap-2">
                        <i class="fa-solid fa-calculator"></i>
                        <span data-i18n="hero_btn_calc">Simulasi Estimasi Biaya</span>
                    </a>
                    <a href="#portfolio" class="bg-teak-800 hover:bg-teak-700 text-teak-100 border border-brass-500/40 font-semibold px-6 py-3.5 rounded-xl text-xs uppercase tracking-wider transition flex items-center gap-2">
                        <i class="fa-solid fa-images"></i>
                        <span data-i18n="hero_btn_gallery">Galeri Joglo & Limasan</span>
                    </a>
                </div>

                <!-- Stats Ticker -->
                <div class="grid grid-cols-3 gap-4 pt-8 border-t border-brass-500/20 text-center sm:text-left">
                    <div>
                        <span class="font-serif text-2xl sm:text-3xl font-bold text-brass-400 block">250+</span>
                        <span class="text-[11px] text-teak-300 uppercase tracking-wider" data-i18n="stat_projects">Proyek Joglo & Resort</span>
                    </div>
                    <div>
                        <span class="font-serif text-2xl sm:text-3xl font-bold text-brass-400 block">100%</span>
                        <span class="text-[11px] text-teak-300 uppercase tracking-wider" data-i18n="stat_wood">Kayu Jati Perhutani</span>
                    </div>
                    <div>
                        <span class="font-serif text-2xl sm:text-3xl font-bold text-brass-400 block">18 Thn</span>
                        <span class="text-[11px] text-teak-300 uppercase tracking-wider" data-i18n="stat_exp">Pengalaman Etnik</span>
                    </div>
                </div>
            </div>

            <!-- Hero Right: Interactive Hotspot Tour Frame -->
            <div class="lg:col-span-6 relative">
                <div class="relative rounded-3xl overflow-hidden border-2 border-brass-500/40 shadow-2xl group">
                    <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&q=80&w=1200" alt="Rumah Joglo Modern Etnik" class="w-full h-[480px] object-cover filter brightness-90 group-hover:scale-105 transition duration-700">

                    <!-- Hotspot 1: Tumpangsari Canopy -->
                    <div class="absolute top-[28%] left-[48%] group/hp">
                        <button onclick="showHotspotInfo('tumpangsari')" class="w-8 h-8 rounded-full bg-brass-500 text-teak-950 font-bold flex items-center justify-center hotspot-pulse text-xs">
                            1
                        </button>
                        <div class="absolute bottom-full left-1/2 -translate-x-1/2 mb-2 w-48 glass-wood p-3 rounded-xl border border-brass-500/50 text-[11px] hidden group-hover/hp:block z-20 shadow-xl">
                            <strong class="text-brass-300 block font-serif" data-i18n="hp1_title">Struktur Tumpangsari</strong>
                            <p class="text-teak-200" data-i18n="hp1_desc">Ukiran balok bersusun kayu jati penopang atap tajuk utama.</p>
                        </div>
                    </div>

                    <!-- Hotspot 2: Saka Guru Pillars -->
                    <div class="absolute top-[55%] left-[32%] group/hp">
                        <button onclick="showHotspotInfo('sakaguru')" class="w-8 h-8 rounded-full bg-brass-500 text-teak-950 font-bold flex items-center justify-center hotspot-pulse text-xs">
                            2
                        </button>
                        <div class="absolute bottom-full left-1/2 -translate-x-1/2 mb-2 w-48 glass-wood p-3 rounded-xl border border-brass-500/50 text-[11px] hidden group-hover/hp:block z-20 shadow-xl">
                            <strong class="text-brass-300 block font-serif" data-i18n="hp2_title">4 Saka Guru Utama</strong>
                            <p class="text-teak-200" data-i18n="hp2_desc">Tiang kayu jati solid tanpa sambungan dengan kancing kayu kuno.</p>
                        </div>
                    </div>

                    <!-- Hotspot 3: Gebyok Carving Wall -->
                    <div class="absolute top-[68%] left-[72%] group/hp">
                        <button onclick="showHotspotInfo('gebyok')" class="w-8 h-8 rounded-full bg-brass-500 text-teak-950 font-bold flex items-center justify-center hotspot-pulse text-xs">
                            3
                        </button>
                        <div class="absolute bottom-full left-1/2 -translate-x-1/2 mb-2 w-48 glass-wood p-3 rounded-xl border border-brass-500/50 text-[11px] hidden group-hover/hp:block z-20 shadow-xl">
                            <strong class="text-brass-300 block font-serif" data-i18n="hp3_title">Dinding Ukir Gebyok Jepara</strong>
                            <p class="text-teak-200" data-i18n="hp3_desc">Pintu & dinding ukir 3D gaya Kudusan dan Jepara klasik.</p>
                        </div>
                    </div>

                    <!-- Bottom Overlay Badge -->
                    <div class="absolute bottom-4 left-4 right-4 glass-wood p-4 rounded-2xl border border-brass-500/30 flex justify-between items-center text-xs">
                        <div>
                            <span class="text-brass-400 font-bold uppercase tracking-wider block" data-i18n="hero_frame_title">Model: Joglo Sinom Modern Heritage</span>
                            <span class="text-teak-300" data-i18n="hero_frame_sub">Klik angka hotspot pada gambar untuk detail arsitektural</span>
                        </div>
                        <span class="bg-terracotta-600 text-white font-bold px-3 py-1 rounded-full text-[10px]" data-i18n="hero_frame_tag">AR-READY</span>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- REGIONAL ARCHITECTURAL STYLES SHOWCASE -->
    <section id="regional" class="py-20 bg-teak-950/90 border-y border-brass-500/20">
        <div class="max-w-7xl mx-auto px-4 sm:px-8 space-y-12">
            
            <div class="text-center max-w-2xl mx-auto space-y-3">
                <span class="text-xs font-bold uppercase tracking-widest text-brass-400 bg-teak-800 px-3 py-1 rounded-full border border-brass-500/30" data-i18n="reg_tag">Ragams Arsitektur Nusantara</span>
                <h2 class="font-serif text-3xl sm:text-5xl font-bold text-teak-50" data-i18n="reg_heading">Eksplorasi Tipologi Rumah Etnik</h2>
                <p class="text-teak-300 text-xs sm:text-sm" data-i18n="reg_sub">Setiap bentuk atap dan struktur kayu memiliki makna filosofi kosmologis dan keagungan sejarahnya masing-masing.</p>
            </div>

            <!-- Tabs Header -->
            <div class="flex flex-wrap justify-center gap-3 text-xs font-bold uppercase tracking-wider">
                <button onclick="switchRegionalTab('joglo')" id="tab-joglo" class="reg-tab px-5 py-3 rounded-xl bg-brass-500 text-teak-950 shadow-lg">Joglo Agung Jawa</button>
                <button onclick="switchRegionalTab('limasan')" id="tab-limasan" class="reg-tab px-5 py-3 rounded-xl bg-teak-800 text-teak-200 hover:bg-teak-700">Limasan Modern</button>
                <button onclick="switchRegionalTab('gladak')" id="tab-gladak" class="reg-tab px-5 py-3 rounded-xl bg-teak-800 text-teak-200 hover:bg-teak-700">Rumah Gladak Timber</button>
                <button onclick="switchRegionalTab('wantilan')" id="tab-wantilan" class="reg-tab px-5 py-3 rounded-xl bg-teak-800 text-teak-200 hover:bg-teak-700">Bali Wantilan</button>
            </div>

            <!-- Tab Content Container -->
            <div class="glass-wood p-6 sm:p-10 rounded-3xl border border-brass-500/30">
                <div id="reg-content-joglo" class="reg-content grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                    <div class="lg:col-span-6 space-y-4">
                        <span class="text-xs text-brass-400 font-mono">TYPE: JOGLO PENDOPO AGUNG</span>
                        <h3 class="font-serif text-2xl sm:text-3xl font-bold text-teak-50">Mahakarya Joglo Sinom & Pencu Surakarta</h3>
                        <p class="text-teak-200 text-xs sm:text-sm leading-relaxed" data-i18n="joglo_desc">
                            Atap tajuk menjulang tinggi melambangkan gunung suci (Mahameru). Dilengkapi tumpangsari bersusun 5 hingga 9 tingkat dengan ukiran floral relief halus Jepara. Ideal untuk pendopo utama, ruang resepsi, atau villa mewah berpemandangan alam.
                        </p>
                        <ul class="text-xs space-y-2 text-teak-300">
                            <li><i class="fa-solid fa-check text-brass-400 mr-2"></i> Kategori: Pendopo Reseksi & Hunian Mewah</li>
                            <li><i class="fa-solid fa-check text-brass-400 mr-2"></i> Struktur: Kayu Jati TPK Perhutani Diameter 25-35cm</li>
                            <li><i class="fa-solid fa-check text-brass-400 mr-2"></i> Ketahanan Gempa: Sistem Sambungan Purus & Pen (Tanpa Paku)</li>
                        </ul>
                    </div>
                    <div class="lg:col-span-6">
                        <img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750?auto=format&fit=crop&q=80&w=800" alt="Joglo Architecture" class="rounded-2xl border border-brass-500/40 h-80 w-full object-cover shadow-2xl">
                    </div>
                </div>

                <div id="reg-content-limasan" class="reg-content hidden grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                    <div class="lg:col-span-6 space-y-4">
                        <span class="text-xs text-brass-400 font-mono">TYPE: LIMASAN TRAMPAS MODERN</span>
                        <h3 class="font-serif text-2xl sm:text-3xl font-bold text-teak-50">Rumah Limasan Tropis Minimalis</h3>
                        <p class="text-teak-200 text-xs sm:text-sm leading-relaxed">
                            Bentuk atap perisai empat sisi dengan proporsi ruangan yang lebih seimbang untuk hunian keluarga modern. Mudah dipadukan dengan kaca frameless besar, AC, dan interior Scandinavian-Javanese.
                        </p>
                        <ul class="text-xs space-y-2 text-teak-300">
                            <li><i class="fa-solid fa-check text-brass-400 mr-2"></i> Kategori: Rumah Tinggal & Cottage Resort</li>
                            <li><i class="fa-solid fa-check text-brass-400 mr-2"></i> Efisiensi Suhu: Atap Genteng Terakota Handmade Kuno</li>
                        </ul>
                    </div>
                    <div class="lg:col-span-6">
                        <img src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?auto=format&fit=crop&q=80&w=800" alt="Limasan Modern" class="rounded-2xl border border-brass-500/40 h-80 w-full object-cover shadow-2xl">
                    </div>
                </div>

                <div id="reg-content-gladak" class="reg-content hidden grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                    <div class="lg:col-span-6 space-y-4">
                        <span class="text-xs text-brass-400 font-mono">TYPE: RUMAH GLADAK PANGGUNG</span>
                        <h3 class="font-serif text-2xl sm:text-3xl font-bold text-teak-50">Rumah Kayu Stage Gladak Antik</h3>
                        <p class="text-teak-200 text-xs sm:text-sm leading-relaxed">
                            Rumah panggung kayu jati antik knocks-down. Solusi hunian unik kontur tanah berbukit, area persawahan, atau villa pinggir pantai dengan sistem panggung ventilasi alami bawah lantai.
                        </p>
                    </div>
                    <div class="lg:col-span-6">
                        <img src="https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?auto=format&fit=crop&q=80&w=800" alt="Rumah Gladak" class="rounded-2xl border border-brass-500/40 h-80 w-full object-cover shadow-2xl">
                    </div>
                </div>

                <div id="reg-content-wantilan" class="reg-content hidden grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                    <div class="lg:col-span-6 space-y-4">
                        <span class="text-xs text-brass-400 font-mono">TYPE: BALI WANTILAN HERITAGE</span>
                        <h3 class="font-serif text-2xl sm:text-3xl font-bold text-teak-50">Bale Wantilan & Pavilion Etnik Bali</h3>
                        <p class="text-teak-200 text-xs sm:text-sm leading-relaxed">
                            Penerapan ornamen ukir paras Jogja/Batu Paras Kerobokan dengan tiang kayu jati ornamen Bali. Mengikuti kaidah tata ruang Nawa Sanga Bali dan fengshui Jawa.
                        </p>
                    </div>
                    <div class="lg:col-span-6">
                        <img src="https://images.unsplash.com/photo-1537996194471-e657df975ab4?auto=format&fit=crop&q=80&w=800" alt="Bali Heritage Villa" class="rounded-2xl border border-brass-500/40 h-80 w-full object-cover shadow-2xl">
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- ARCHITECTURAL PORTFOLIO & SHOWCASE GALLERY -->
    <section id="portfolio" class="py-20 bg-teak-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-8 space-y-12">
            
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
                <div class="space-y-2">
                    <span class="text-xs font-bold uppercase tracking-widest text-brass-400 bg-teak-800 px-3 py-1 rounded-full border border-brass-500/30" data-i18n="port_tag">Portofolio & Mahakarya</span>
                    <h2 class="font-serif text-3xl sm:text-5xl font-bold text-teak-50" data-i18n="port_heading">Galeri Proyek Terbangun</h2>
                </div>

                <!-- Gallery Category Filters -->
                <div class="flex flex-wrap gap-2 text-xs uppercase font-bold">
                    <button onclick="filterPortfolio('all')" class="port-filter bg-brass-500 text-teak-950 px-4 py-2 rounded-lg">Semua Proyek</button>
                    <button onclick="filterPortfolio('residential')" class="port-filter bg-teak-800 text-teak-200 px-4 py-2 rounded-lg hover:bg-teak-700">Rumah Tinggal</button>
                    <button onclick="filterPortfolio('resort')" class="port-filter bg-teak-800 text-teak-200 px-4 py-2 rounded-lg hover:bg-teak-700">Resort & Villa</button>
                    <button onclick="filterPortfolio('pendopo')" class="port-filter bg-teak-800 text-teak-200 px-4 py-2 rounded-lg hover:bg-teak-700">Pendopo & Resto</button>
                </div>
            </div>

            <!-- Portfolio Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                <!-- Card 1 -->
                <div class="port-item residential glass-wood rounded-3xl overflow-hidden border border-brass-500/30 group hover:border-brass-400 transition duration-500">
                    <div class="relative h-64 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&q=80&w=800" alt="Joglo Modern Residence" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                        <span class="absolute top-3 right-3 bg-brass-500 text-teak-950 font-bold text-[10px] px-2.5 py-1 rounded-full uppercase">Yogyakarta</span>
                    </div>
                    <div class="p-6 space-y-3">
                        <span class="text-[10px] text-brass-400 font-mono block">RUMAH TINGGAL • 450 m²</span>
                        <h3 class="font-serif text-xl font-bold text-teak-50">Omah Joglo Kaliurang Modern</h3>
                        <p class="text-teak-300 text-xs line-clamp-2">Perpaduan Joglo Lawakan kayu jati antik dengan bukaan dinding kaca frameless pemandangan Gunung Merapi.</p>
                        <div class="pt-3 border-t border-brass-500/20 flex justify-between items-center text-xs">
                            <span class="text-teak-400"><i class="fa-solid fa-tree mr-1"></i> Jati TPK Grade A</span>
                            <button onclick="openProjectModal('kaliurang')" class="text-brass-400 font-bold hover:underline">Detail & Floorplan &rarr;</button>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="port-item resort glass-wood rounded-3xl overflow-hidden border border-brass-500/30 group hover:border-brass-400 transition duration-500">
                    <div class="relative h-64 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1540555700478-4be289fbecef?auto=format&fit=crop&q=80&w=800" alt="Heritage Resort Bali" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                        <span class="absolute top-3 right-3 bg-brass-500 text-teak-950 font-bold text-[10px] px-2.5 py-1 rounded-full uppercase">Ubud, Bali</span>
                    </div>
                    <div class="p-6 space-y-3">
                        <span class="text-[10px] text-brass-400 font-mono block">RESORT & SPA • 1,200 m²</span>
                        <h3 class="font-serif text-xl font-bold text-teak-50">Ayung Heritage Gladak Resort</h3>
                        <p class="text-teak-300 text-xs line-clamp-2">Kompleks 8 unit villa Gladak kayu jati panggung melayang di atas tebing lembah Sungai Ayung.</p>
                        <div class="pt-3 border-t border-brass-500/20 flex justify-between items-center text-xs">
                            <span class="text-teak-400"><i class="fa-solid fa-tree mr-1"></i> Kayu Recycled Teak</span>
                            <button onclick="openProjectModal('ubud')" class="text-brass-400 font-bold hover:underline">Detail & Floorplan &rarr;</button>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="port-item pendopo glass-wood rounded-3xl overflow-hidden border border-brass-500/30 group hover:border-brass-400 transition duration-500">
                    <div class="relative h-64 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750?auto=format&fit=crop&q=80&w=800" alt="Pendopo Agung Resto" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                        <span class="absolute top-3 right-3 bg-brass-500 text-teak-950 font-bold text-[10px] px-2.5 py-1 rounded-full uppercase">Surakarta</span>
                    </div>
                    <div class="p-6 space-y-3">
                        <span class="text-[10px] text-brass-400 font-mono block">COMMERCIAL HALL • 800 m²</span>
                        <h3 class="font-serif text-xl font-bold text-teak-50">Pendopo Agung Keraton Solo Style</h3>
                        <p class="text-teak-300 text-xs line-clamp-2">Pendopo skala besar tanpa tiang tengah tambahan dengan bentang tumpangsari 9 tingkat lapis prada emas.</p>
                        <div class="pt-3 border-t border-brass-500/20 flex justify-between items-center text-xs">
                            <span class="text-teak-400"><i class="fa-solid fa-tree mr-1"></i> Ukiran Prada Gold</span>
                            <button onclick="openProjectModal('solo')" class="text-brass-400 font-bold hover:underline">Detail & Floorplan &rarr;</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- INTERACTIVE FLOOR PLAN & 3D LAYER VIEWER -->
    <section id="viewer3d" class="py-20 bg-teak-950 border-y border-brass-500/20">
        <div class="max-w-7xl mx-auto px-4 sm:px-8 space-y-8">
            
            <div class="text-center max-w-2xl mx-auto space-y-2">
                <span class="text-xs font-bold uppercase tracking-widest text-brass-400 bg-teak-800 px-3 py-1 rounded-full border border-brass-500/30" data-i18n="viewer_tag">Interactive Architectural Blueprint</span>
                <h2 class="font-serif text-3xl sm:text-4xl font-bold text-teak-50" data-i18n="viewer_heading">Penjelajah Layer Denah & Render 3D</h2>
                <p class="text-teak-300 text-xs" data-i18n="viewer_sub">Ganti layer tampilan untuk melihat struktur kayu, zonasi Primbon Jawa, dan render 3D visual.</p>
            </div>

            <div class="glass-wood p-6 sm:p-8 rounded-3xl border border-brass-500/40 space-y-6">
                <!-- Layer Toggle Buttons -->
                <div class="flex flex-wrap justify-center gap-3 text-xs font-bold uppercase">
                    <button onclick="setLayer('structure')" id="btn-layer-structure" class="px-4 py-2.5 rounded-xl bg-brass-500 text-teak-950">
                        <i class="fa-solid fa-cubes mr-1"></i> Layer 1: Rangka Kayu
                    </button>
                    <button onclick="setLayer('primbon')" id="btn-layer-primbon" class="px-4 py-2.5 rounded-xl bg-teak-800 text-teak-200 hover:bg-teak-700">
                        <i class="fa-solid fa-compass mr-1"></i> Layer 2: Fengshui / Primbon
                    </button>
                    <button onclick="setLayer('render')" id="btn-layer-render" class="px-4 py-2.5 rounded-xl bg-teak-800 text-teak-200 hover:bg-teak-700">
                        <i class="fa-solid fa-vr-cardboard mr-1"></i> Layer 3: Render 3D Realistis
                    </button>
                </div>

                <!-- Canvas Preview Container -->
                <div class="relative min-h-[380px] bg-teak-950/80 rounded-2xl border border-brass-500/30 p-6 flex flex-col justify-between overflow-hidden">
                    
                    <!-- Dynamic Layer Displays -->
                    <div id="view-layer-structure" class="layer-view space-y-4">
                        <div class="flex justify-between items-start">
                            <div>
                                <span class="text-[10px] bg-brass-500/20 text-brass-300 px-2.5 py-0.5 rounded border border-brass-500/30">STRUCTURAL BLUEPRINT</span>
                                <h4 class="font-serif text-lg font-bold text-teak-50 mt-1">Sistem Konstruksi Kayu Kuno (Purus & Pen)</h4>
                            </div>
                            <span class="text-xs text-teak-400">Skala 1:100</span>
                        </div>
                        <div class="p-6 border border-dashed border-brass-500/40 rounded-xl bg-teak-900/60 font-mono text-xs space-y-2 text-teak-300">
                            <p>├── [PENDOPO UTAMA] : 10m x 10m (Saka Guru 4x Ø30cm Kayu Jati TPK)</p>
                            <p>├── [PRINGGITAN]    : 4m x 10m (Penghubung Ruang Tamu & Dalam)</p>
                            <p>├── [DALEM AGUNG]   : 8m x 10m (Senthon Kiwa, Senthon Tengah, Senthon Tengen)</p>
                            <p>└── [GANDHOK KIWA]   : 4m x 8m (Kamar Tidur Utama & Inner Courtyard)</p>
                        </div>
                    </div>

                    <div id="view-layer-primbon" class="layer-view hidden space-y-4">
                        <div class="flex justify-between items-start">
                            <div>
                                <span class="text-[10px] bg-terracotta-600/30 text-terracotta-400 px-2.5 py-0.5 rounded border border-terracotta-500/30">PRIMBON HASTA KOSALA KOSALI</span>
                                <h4 class="font-serif text-lg font-bold text-teak-50 mt-1">Zonasi Kosmologis & Arah Mata Angin Ideal</h4>
                            </div>
                            <span class="text-xs text-brass-400"><i class="fa-solid fa-sun"></i> Hadap Selatan (Sinar Ideal)</span>
                        </div>
                        <div class="grid grid-cols-3 gap-3 text-center text-xs font-serif">
                            <div class="p-4 bg-teak-900 rounded-xl border border-brass-500/20">
                                <span class="text-brass-400 font-bold block">Senthon Kiwa</span>
                                <span class="text-[10px] text-teak-300">Ruang Simpan & Pusaka</span>
                            </div>
                            <div class="p-4 bg-brass-500/20 rounded-xl border border-brass-500 text-brass-300">
                                <span class="font-bold block">Senthon Tengah</span>
                                <span class="text-[10px]">Ruang Sacred Dewi Sri</span>
                            </div>
                            <div class="p-4 bg-teak-900 rounded-xl border border-brass-500/20">
                                <span class="text-brass-400 font-bold block">Senthon Tengen</span>
                                <span class="text-[10px] text-teak-300">Kamar Utama Pemimpin</span>
                            </div>
                        </div>
                    </div>

                    <div id="view-layer-render" class="layer-view hidden space-y-4">
                        <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&q=80&w=1200" alt="3D Visual Render" class="w-full h-64 object-cover rounded-xl border border-brass-500/40">
                    </div>

                    <!-- Bottom Controls -->
                    <div class="pt-4 border-t border-brass-500/20 flex justify-between items-center text-xs">
                        <span class="text-teak-300"><i class="fa-solid fa-circle-info text-brass-400 mr-1"></i> Visualisasi ini disesuaikan dengan kontur tanah Anda</span>
                        <a href="#contact" class="bg-brass-500 text-teak-950 font-bold px-4 py-2 rounded-lg hover:bg-brass-400">Request Custom Layout &rarr;</a>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- CULTURAL MATERIALS & CRAFTSMANSHIP GALLERY -->
    <section id="materials" class="py-20 bg-teak-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-8 space-y-12">
            
            <div class="text-center max-w-2xl mx-auto space-y-2">
                <span class="text-xs font-bold uppercase tracking-widest text-brass-400 bg-teak-800 px-3 py-1 rounded-full border border-brass-500/30" data-i18n="mat_tag">Material & Pengrajin Heritage</span>
                <h2 class="font-serif text-3xl sm:text-5xl font-bold text-teak-50" data-i18n="mat_heading">Kualitas Bahan Alam Terbaik</h2>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                
                <div class="glass-wood p-6 rounded-3xl border border-brass-500/30 space-y-4">
                    <div class="w-12 h-12 rounded-2xl bg-brass-500/20 border border-brass-500/40 text-brass-400 flex items-center justify-center text-2xl">
                        🪵
                    </div>
                    <h3 class="font-serif text-lg font-bold text-teak-50">Jati TPK Perhutani</h3>
                    <p class="text-xs text-teak-300 leading-relaxed">Kayu Jati tua bersertifikat dari hutan Perhutani Jawa Tengah dengan kadar air di bawah 12% anti rayap mutlak.</p>
                </div>

                <div class="glass-wood p-6 rounded-3xl border border-brass-500/30 space-y-4">
                    <div class="w-12 h-12 rounded-2xl bg-brass-500/20 border border-brass-500/40 text-brass-400 flex items-center justify-center text-2xl">
                        ⛩️
                    </div>
                    <h3 class="font-serif text-lg font-bold text-teak-50">Ukiran Ukir Jepara</h3>
                    <p class="text-xs text-teak-300 leading-relaxed">Pahat relief 3D oleh empu pengrajin ukir Jepara dan Kudus berdedikasi puluhan tahun.</p>
                </div>

                <div class="glass-wood p-6 rounded-3xl border border-brass-500/30 space-y-4">
                    <div class="w-12 h-12 rounded-2xl bg-brass-500/20 border border-brass-500/40 text-brass-400 flex items-center justify-center text-2xl">
                        🧱
                    </div>
                    <h3 class="font-serif text-lg font-bold text-teak-50">Genteng Terakota Handmade</h3>
                    <p class="text-xs text-teak-300 leading-relaxed">Genteng tanah liat bakar tradisional yang meredam panas terik matahari tropis secara alami.</p>
                </div>

                <div class="glass-wood p-6 rounded-3xl border border-brass-500/30 space-y-4">
                    <div class="w-12 h-12 rounded-2xl bg-brass-500/20 border border-brass-500/40 text-brass-400 flex items-center justify-center text-2xl">
                        🪨
                    </div>
                    <h3 class="font-serif text-lg font-bold text-teak-50">Batu Candi Andesit</h3>
                    <p class="text-xs text-teak-300 leading-relaxed">Batuan alam candi hitam dari lereng Gunung Merapi untuk pondasi umpak dan dinding aksen etnik.</p>
                </div>

            </div>
        </div>
    </section>

    <!-- ARCHITECT PROFILE & PHILOSOPHY -->
    <section class="py-20 bg-teak-950/80 border-t border-brass-500/20">
        <div class="max-w-7xl mx-auto px-4 sm:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                
                <div class="lg:col-span-5 relative">
                    <div class="relative mx-auto max-w-md">
                        <div class="absolute -inset-4 rounded-3xl border-2 border-brass-500/40 transform -rotate-2"></div>
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&q=80&w=800" alt="Principal Architect Ki Hendro Supriyo" class="relative rounded-2xl object-cover w-full h-[450px] shadow-2xl filter contrast-105">
                    </div>
                </div>

                <div class="lg:col-span-7 space-y-6">
                    <div class="space-y-2">
                        <span class="text-xs font-bold uppercase tracking-widest text-brass-400 bg-teak-800 px-3 py-1 rounded-full border border-brass-500/30" data-i18n="arch_tag">Principal Architect Profile</span>
                        <h2 class="font-serif text-3xl sm:text-5xl font-bold text-teak-50">Ki Hendro Supriyo, IAI</h2>
                        <span class="text-xs text-brass-400 font-mono block">PAKAR ARSITEKTUR HERITAGE NUSANTARA</span>
                    </div>

                    <blockquote class="italic border-l-4 border-brass-500 pl-4 py-1 text-teak-200 font-serif text-base sm:text-lg">
                        "Omah dudu mung tatanan kayu lan bata, nanging wadhah jiwo kang nyawiji kalawan alam lan Sang Pencipta."
                    </blockquote>

                    <p class="text-teak-300 text-xs sm:text-sm leading-relaxed" data-i18n="arch_bio">
                        Berpengalaman lebih dari 20 tahun merancang dan merekonstruksi bangunan heritage di Jawa, Bali, dan mancanegara. Beliau memadukan lisensi arsitek profesional IAI dengan pengetahuan mendalam manuskrip kuno Primbon Hasta Kosala Kosali.
                    </p>

                    <div class="pt-4 flex items-center gap-6 border-t border-brass-500/20 text-xs text-teak-200">
                        <div>
                            <strong class="text-brass-400 font-serif text-lg block">20+ Thn</strong>
                            <span>DEDIKASI ARSITEKTUR</span>
                        </div>
                        <div>
                            <strong class="text-brass-400 font-serif text-lg block">IAI CERTIFIED</strong>
                            <span>IKATAN ARSITEK INDONESIA</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- INTERACTIVE ESTIMATOR & BUDGET CALCULATOR -->
    <section id="estimator" class="py-20 bg-teak-900">
        <div class="max-w-4xl mx-auto px-4 sm:px-8">
            <div class="glass-wood p-8 sm:p-12 rounded-3xl border border-brass-500/40 shadow-2xl space-y-8">
                
                <div class="text-center max-w-xl mx-auto space-y-2">
                    <span class="text-xs font-bold uppercase tracking-widest text-brass-400 bg-teak-800 px-3 py-1 rounded-full border border-brass-500/30" data-i18n="calc_tag">Kalkulator Budget Transparan</span>
                    <h2 class="font-serif text-2xl sm:text-4xl font-bold text-teak-50" data-i18n="calc_heading">Simulasi Estimasi Biaya Bangun</h2>
                    <p class="text-xs text-teak-300" data-i18n="calc_sub">Hitung perkiraan biaya desain dan konstruksi rumah etnik berdasarkan luas dan grade kayu.</p>
                </div>

                <div class="space-y-6 text-xs">
                    
                    <!-- Input 1: Project Type -->
                    <div class="space-y-2">
                        <label class="font-bold text-brass-300 uppercase block" data-i18n="calc_type_label">1. Pilih Jenis Bangunan:</label>
                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                            <button type="button" onclick=\"setCalcType('joglo', 8500000, this)\" class="calc-type-btn p-3 rounded-xl border border-brass-500/40 bg-brass-500 text-teak-950 font-bold text-center">Joglo Agung</button>
                            <button type="button" onclick=\"setCalcType('limasan', 6500000, this)\" class="calc-type-btn p-3 rounded-xl border border-brass-500/40 bg-teak-800 text-teak-200 text-center">Limasan Modern</button>
                            <button type="button" onclick=\"setCalcType('gladak', 5500000, this)\" class="calc-type-btn p-3 rounded-xl border border-brass-500/40 bg-teak-800 text-teak-200 text-center">Rumah Gladak</button>
                            <button type="button" onclick=\"setCalcType('resort', 9500000, this)\" class="calc-type-btn p-3 rounded-xl border border-brass-500/40 bg-teak-800 text-teak-200 text-center">Resort / Villa</button>
                        </div>
                    </div>

                    <!-- Input 2: Land Area Slider -->
                    <div class="space-y-2">
                        <div class="flex justify-between items-center font-bold text-brass-300 uppercase">
                            <span data-i18n="calc_area_label">2. Luas Bangunan (m²):</span>
                            <span id="area-val" class="text-brass-400 font-mono text-base">150 m²</span>
                        </div>
                        <input type="range" id="area-slider" min="50" max="1000" step="10" value="150" oninput="updateCalculator()" class="w-full accent-brass-500">
                    </div>

                    <!-- Input 3: Wood Quality Grade -->
                    <div class="space-y-2">
                        <label class="font-bold text-brass-300 uppercase block" data-i18n="calc_wood_label">3. Grade Kualitas Kayu Jati:</label>
                        <select id="wood-grade" onchange="updateCalculator()" class="w-full p-3 rounded-xl bg-teak-950 border border-brass-500/40 text-teak-100 focus:outline-none">
                            <option value="1.0">Grade A - Jati TPK Perhutani Old Growth (Sertifikat Official)</option>
                            <option value="0.85">Grade B - Jati Emas Sulawesi / Perhutani Muda</option>
                            <option value="1.2">Grade Heritage - Kayu Jati Recycled Antik Kuno (Langka)</option>
                        </select>
                    </div>

                    <!-- Estimated Cost Output Card -->
                    <div class="bg-teak-950 p-6 rounded-2xl border-2 border-brass-500/50 flex flex-col sm:flex-row justify-between items-center gap-4 text-center sm:text-left">
                        <div>
                            <span class="text-[10px] uppercase text-teak-400 font-mono block" data-i18n="calc_result_label">ESTIMASI TOTAL BIAYA KONSTRUKSI:</span>
                            <span id="calc-result" class="font-serif text-2xl sm:text-3xl font-bold text-brass-400">Rp 1.275.000.000</span>
                            <span class="text-[10px] text-teak-400 block mt-1">*Sudah termasuk struktur kayu, pondasi umpak, genteng terakota, & finishing minyak alami</span>
                        </div>
                        <button onclick="exportEstimateToWA()" class="bg-brass-500 hover:bg-brass-400 text-teak-950 font-bold px-5 py-3 rounded-xl transition text-xs uppercase flex items-center gap-2 flex-shrink-0">
                            <i class="fa-brands fa-whatsapp text-sm"></i> Kirim Rincian ke WA
                        </button>
                    </div>

                </div>

            </div>
        </div>
    </section>

    <!-- DESIGN PACKAGES & CONSULTATION PRICING -->
    <section id="packages" class="py-20 bg-teak-950 border-t border-brass-500/20">
        <div class="max-w-7xl mx-auto px-4 sm:px-8 space-y-12">
            
            <div class="text-center max-w-2xl mx-auto space-y-2">
                <span class="text-xs font-bold uppercase tracking-widest text-brass-400 bg-teak-800 px-3 py-1 rounded-full border border-brass-500/30" data-i18n="pack_tag">Paket Layanan Arsitektur</span>
                <h2 class="font-serif text-3xl sm:text-5xl font-bold text-teak-50" data-i18n="pack_heading">Pilihan Kerjasama Desain & Build</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                
                <!-- Package 1 -->
                <div class="glass-wood p-8 rounded-3xl border border-brass-500/30 flex flex-col justify-between space-y-6">
                    <div class="space-y-4">
                        <span class="text-xs text-brass-400 font-mono uppercase block">PAKET 01</span>
                        <h3 class="font-serif text-2xl font-bold text-teak-50">Desain Gambar Kerja (DED)</h3>
                        <div class="font-serif text-3xl font-bold text-brass-400">Rp 120.000 <span class="text-xs font-sans text-teak-300 font-normal">/ m²</span></div>
                        <p class="text-xs text-teak-300">Cocok bagi Anda yang telah memiliki tim kontraktor mandiri dan membutuhkan gambar kerja etnik presisi.</p>
                        <ul class="text-xs text-teak-200 space-y-2 pt-2 border-t border-brass-500/20">
                            <li><i class="fa-solid fa-check text-brass-400 mr-2"></i> Conceptual 3D Exterior & Interior</li>
                            <li><i class="fa-solid fa-check text-brass-400 mr-2"></i> Gambar Kerja Detail Kayu & Tumpangsari</li>
                            <li><i class="fa-solid fa-check text-brass-400 mr-2"></i> Analisis Primbon & Arah Mata Angin</li>
                            <li><i class="fa-solid fa-check text-brass-400 mr-2"></i> Rencana Anggaran Biaya (RAB)</li>
                        </ul>
                    </div>
                    <a href="#contact" class="w-full text-center bg-teak-800 hover:bg-teak-700 text-teak-100 font-bold py-3 rounded-xl border border-brass-500/30 text-xs uppercase">Pilih Paket Desain</a>
                </div>

                <!-- Package 2: Highlighted -->
                <div class="glass-wood p-8 rounded-3xl border-2 border-brass-500 bg-teak-900/90 shadow-2xl flex flex-col justify-between space-y-6 relative">
                    <span class="absolute -top-3 right-6 bg-brass-500 text-teak-950 font-bold text-[10px] px-3 py-1 rounded-full uppercase">Paling Populer</span>
                    <div class="space-y-4">
                        <span class="text-xs text-brass-400 font-mono uppercase block">PAKET 02</span>
                        <h3 class="font-serif text-2xl font-bold text-teak-50">Turnkey Build Joglo & Limasan</h3>
                        <div class="font-serif text-3xl font-bold text-brass-400">Rp 7.500.000+ <span class="text-xs font-sans text-teak-300 font-normal">/ m²</span></div>
                        <p class="text-xs text-teak-300">Layanan penuh terima kunci. Mulai dari suplai kayu Jati TPK, ukiran gebyok, konstruksi, hingga finishing.</p>
                        <ul class="text-xs text-teak-200 space-y-2 pt-2 border-t border-brass-500/20">
                            <li><i class="fa-solid fa-check text-brass-400 mr-2"></i> Bebas Biaya Desain 3D & RAB</li>
                            <li><i class="fa-solid fa-check text-brass-400 mr-2"></i> Kayu Jati TPK Perhutani Old Growth</li>
                            <li><i class="fa-solid fa-check text-brass-400 mr-2"></i> Garansi Struktur Kayu 10 Tahun</li>
                            <li><i class="fa-solid fa-check text-brass-400 mr-2"></i> Pengawasan Oleh Arsitek Senior IAI</li>
                        </ul>
                    </div>
                    <a href="#contact" class="w-full text-center bg-brass-500 hover:bg-brass-400 text-teak-950 font-bold py-3 rounded-xl text-xs uppercase shadow-lg">Konsultasi Turnkey Build</a>
                </div>

                <!-- Package 3 -->
                <div class="glass-wood p-8 rounded-3xl border border-brass-500/30 flex flex-col justify-between space-y-6">
                    <div class="space-y-4">
                        <span class="text-xs text-brass-400 font-mono uppercase block">PAKET 03</span>
                        <h3 class="font-serif text-2xl font-bold text-teak-50">Restorasi Rumah Kuno & Relokasi</h3>
                        <div class="font-serif text-3xl font-bold text-brass-400">Custom Quote</div>
                        <p class="text-xs text-teak-300">Layanan pemindahan (knock-down), perbaikan kayu tua lapuk, dan pembongkaran rumah Joglo tua antik.</p>
                        <ul class="text-xs text-teak-200 space-y-2 pt-2 border-t border-brass-500/20">
                            <li><i class="fa-solid fa-check text-brass-400 mr-2"></i> Survei Kelayakan Kayu Antik</li>
                            <li><i class="fa-solid fa-check text-brass-400 mr-2"></i> Pembersihan & Treatment Obat Anti Rayap</li>
                            <li><i class="fa-solid fa-check text-brass-400 mr-2"></i> Penggantian Tiang Saka Lapis Baru</li>
                        </ul>
                    </div>
                    <a href="#contact" class="w-full text-center bg-teak-800 hover:bg-teak-700 text-teak-100 font-bold py-3 rounded-xl border border-brass-500/30 text-xs uppercase">Konsultasi Restorasi</a>
                </div>

            </div>
        </div>
    </section>

    <!-- CLIENT TESTIMONIALS -->
    <section class="py-20 bg-teak-900 border-t border-brass-500/20">
        <div class="max-w-7xl mx-auto px-4 sm:px-8 space-y-12">
            
            <div class="text-center max-w-2xl mx-auto space-y-2">
                <span class="text-xs font-bold uppercase tracking-widest text-brass-400 bg-teak-800 px-3 py-1 rounded-full border border-brass-500/30" data-i18n="testi_tag">Kepercayaan Klien</span>
                <h2 class="font-serif text-3xl sm:text-4xl font-bold text-teak-50" data-i18n="testi_heading">Testimoni Pemilik Joglo & Resort</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                
                <div class="glass-wood p-6 rounded-3xl border border-brass-500/30 space-y-4">
                    <div class="flex text-brass-400 text-xs space-x-1">
                        <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                    </div>
                    <p class="text-xs text-teak-200 italic leading-relaxed">
                        "Nantara Architecture berhasil merealisasikan impian kami membangun Omah Joglo modern di Kaliurang. Kayu Jati TPK-nya sangat berkualitas dan pengerjaan sambungan kayu sangat rapi!"
                    </p>
                    <div class="flex items-center gap-3 pt-2">
                        <div class="w-9 h-9 rounded-full bg-brass-500 text-teak-950 font-bold text-xs flex items-center justify-center">
                            BS
                        </div>
                        <div>
                            <strong class="text-xs text-teak-50 block">Bambang Setyawan</strong>
                            <span class="text-[10px] text-teak-400 block">Pemilik Omah Joglo Kaliurang</span>
                        </div>
                    </div>
                </div>

                <div class="glass-wood p-6 rounded-3xl border border-brass-500/30 space-y-4">
                    <div class="flex text-brass-400 text-xs space-x-1">
                        <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                    </div>
                    <p class="text-xs text-teak-200 italic leading-relaxed">
                        "Desain resort villa panggung kami di Ubud Bali sangat disukai tamu mancanegara. Sentuhan Etnik Nusantara dipadukan dengan kaca modern membuat suasana sangat mewah."
                    </p>
                    <div class="flex items-center gap-3 pt-2">
                        <div class="w-9 h-9 rounded-full bg-brass-500 text-teak-950 font-bold text-xs flex items-center justify-center">
                            NW
                        </div>
                        <div>
                            <span class="font-bold text-xs text-teak-50 block">Ni Wayan Sinta</span>
                            <span class="text-[10px] text-teak-400 block">Owner Ayung Heritage Villa Bali</span>
                        </div>
                    </div>
                </div>

                <div class="glass-wood p-6 rounded-3xl border border-brass-500/30 space-y-4">
                    <div class="flex text-brass-400 text-xs space-x-1">
                        <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                    </div>
                    <p class="text-xs text-teak-200 italic leading-relaxed">
                        "Sangat puas dengan konsultasi Primbon Jawi dan penghitungan zonasi ruangan. Rumah Limasan kami terasa sangat adem walau tanpa menyalakan AC di siang hari."
                    </p>
                    <div class="flex items-center gap-3 pt-2">
                        <div class="w-9 h-9 rounded-full bg-brass-500 text-teak-950 font-bold text-xs flex items-center justify-center">
                            RH
                        </div>
                        <div>
                            <span class="font-bold text-xs text-teak-50 block">Dr. Raden Haryo</span>
                            <span class="text-[10px] text-teak-400 block">Kediaman Limasan Solo</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- FAQ ACCORDION -->
    <section class="py-16 bg-teak-950">
        <div class="max-w-3xl mx-auto px-4 sm:px-8 space-y-8">
            <div class="text-center space-y-2">
                <span class="text-xs font-bold uppercase tracking-widest text-brass-400 bg-teak-800 px-3 py-1 rounded-full border border-brass-500/30" data-i18n="faq_tag">Pertanyaan Sering Diajukan</span>
                <h2 class="font-serif text-2xl sm:text-4xl font-bold text-teak-50" data-i18n="faq_heading">Frequently Asked Questions</h2>
            </div>

            <div class="space-y-4">
                <div class="border border-brass-500/30 bg-teak-900 rounded-2xl overflow-hidden">
                    <button onclick="toggleFAQ(1)" class="w-full p-5 text-left font-serif font-bold text-teak-50 flex justify-between items-center text-xs sm:text-sm">
                        <span>Apakah struktur Joglo aman dari guncangan gempa bumi?</span>
                        <i id="faq-icon-1" class="fa-solid fa-chevron-down text-brass-400 transition-transform"></i>
                    </button>
                    <div id="faq-ans-1" class="hidden p-5 pt-0 text-xs text-teak-300 border-t border-teak-800 leading-relaxed">
                        Sangat aman. Arsitektur kayu Joglo tradisional menggunakan sistem sambungan ekor burung (purus & pen) fleksibel tanpa paku mati. Saat gempa, struktur kayu meredam energi getaran dengan elastis.
                    </div>
                </div>

                <div class="border border-brass-500/30 bg-teak-900 rounded-2xl overflow-hidden">
                    <button onclick="toggleFAQ(2)" class="w-full p-5 text-left font-serif font-bold text-teak-50 flex justify-between items-center text-xs sm:text-sm">
                        <span>Bagaimana perawatan kayu Jati agar bebas dari serangan rayap?</span>
                        <i id="faq-icon-2" class="fa-solid fa-chevron-down text-brass-400 transition-transform"></i>
                    </button>
                    <div id="faq-ans-2" class="hidden p-5 pt-0 text-xs text-teak-300 border-t border-teak-800 leading-relaxed">
                        Kami hanya menggunakan Kayu Jati TPK Perhutani Old Growth yang secara alami mengandung minyak teak oil pekat yang tidak disukai rayap. Kami juga memberikan treatment vakum cairan anti-termite standar museum.
                    </div>
                </div>

                <div class="border border-brass-500/30 bg-teak-900 rounded-2xl overflow-hidden">
                    <button onclick="toggleFAQ(3)" class="w-full p-5 text-left font-serif font-bold text-teak-50 flex justify-between items-center text-xs sm:text-sm">
                        <span>Apakah Nantara Architecture melayani proyek di luar Pulau Jawa?</span>
                        <i id="faq-icon-3" class="fa-solid fa-chevron-down text-brass-400 transition-transform"></i>
                    </button>
                    <div id="faq-ans-3" class="hidden p-5 pt-0 text-xs text-teak-300 border-t border-teak-800 leading-relaxed">
                        Ya, kami melayani proyek di seluruh wilayah Indonesia (Bali, Sumatra, Kalimantan, Sulawesi) dan mancanegara dengan sistem pabrikasi knock-down di workshop Solo/Jepara lalu dikirim dan dirakit di lokasi Anda.
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CONTACT & PROJECT CONSULTATION FORM -->
    <section id="contact" class="py-20 bg-teak-900">
        <div class="max-w-4xl mx-auto px-4 sm:px-8">
            <div class="glass-wood p-8 sm:p-12 rounded-3xl border border-brass-500/40 shadow-2xl space-y-8">
                
                <div class="text-center max-w-xl mx-auto space-y-2">
                    <span class="text-xs font-bold uppercase tracking-widest text-brass-400 bg-teak-800 px-3 py-1 rounded-full border border-brass-500/30" data-i18n="form_tag">Diskusi Proyek Etnik</span>
                    <h2 class="font-serif text-3xl sm:text-4xl font-bold text-teak-50" data-i18n="form_heading">Mulai Konsultasi Arsitektur</h2>
                    <p class="text-xs text-teak-300" data-i18n="form_sub">Isi formulir di bawah ini untuk menjadwalkan sesi konsultasi langsung bersama Ki Hendro Supriyo, IAI.</p>
                </div>

                <form id="nantara-consultation-form" onsubmit="handleContactSubmit(event)" class="space-y-4 text-xs">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block font-bold text-brass-300 mb-1" data-i18n="f_name">Nama Lengkap *</label>
                            <input type="text" name="nama" required placeholder="Contoh: Budi Santoso" class="w-full p-3 rounded-xl bg-teak-950 border border-brass-500/40 text-teak-100 focus:outline-none">
                        </div>
                        <div>
                            <label class="block font-bold text-brass-300 mb-1" data-i18n="f_phone">Nomor WhatsApp *</label>
                            <input type="tel" name="whatsapp" required placeholder="081234567890" class="w-full p-3 rounded-xl bg-teak-950 border border-brass-500/40 text-teak-100 focus:outline-none">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block font-bold text-brass-300 mb-1" data-i18n="f_loc">Lokasi Lahan Proyek *</label>
                            <input type="text" name="lokasi" required placeholder="Contoh: Sleman, Yogyakarta / Badung, Bali" class="w-full p-3 rounded-xl bg-teak-950 border border-brass-500/40 text-teak-100 focus:outline-none">
                        </div>
                        <div>
                            <label class="block font-bold text-brass-300 mb-1" data-i18n="f_type">Tipe Bangunan yang Diinginkan *</label>
                            <select name="tipe_bangunan" required class="w-full p-3 rounded-xl bg-teak-950 border border-brass-500/40 text-teak-100 focus:outline-none">
                                <option>Omah Joglo Modern</option>
                                <option>Rumah Limasan Tropis</option>
                                <option>Rumah Gladak Panggung</option>
                                <option>Resort / Villa Etnik</option>
                                <option>Pendopo Reseksi / Resto</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block font-bold text-brass-300 mb-1" data-i18n="f_msg">Detail Keinginan / Catatan Khusus</label>
                        <textarea name="catatan" rows="4" placeholder="Ceritakan gambaran ukuran tanah, jumlah kamar, atau kebutuhan khusus Anda..." class="w-full p-3 rounded-xl bg-teak-950 border border-brass-500/40 text-teak-100 focus:outline-none"></textarea>
                    </div>

                    <button type="submit" class="w-full bg-brass-500 hover:bg-brass-400 text-teak-950 font-bold py-3.5 rounded-xl uppercase tracking-wider text-xs transition shadow-xl">
                        Kirim Formulir Konsultasi &rarr;
                    </button>
                </form>

            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="bg-teak-950 text-teak-300 text-xs py-12 border-t border-brass-500/30">
        <div class="max-w-7xl mx-auto px-4 sm:px-8 grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
            <div class="space-y-3">
                <span class="font-serif text-xl font-bold text-teak-50 block">NANTARA ARCHITECTURE</span>
                <p class="text-teak-400 leading-relaxed">
                    Studio Konsultan Arsitektur Spesialis Rumah Joglo, Limasan, dan Resort Heritage Nusantara Berstandar Internasional.
                </p>
            </div>
            <div>
                <strong class="text-brass-300 block font-semibold mb-3 uppercase tracking-wider text-[10px]">Navigasi Utama</strong>
                <ul class="space-y-2">
                    <li><a href="#regional" class="hover:text-brass-400 transition">Gaya Regional</a></li>
                    <li><a href="#portfolio" class="hover:text-brass-400 transition">Portofolio Karya</a></li>
                    <li><a href="#viewer3d" class="hover:text-brass-400 transition">Blueprint 3D</a></li>
                    <li><a href="#estimator" class="hover:text-brass-400 transition">Kalkulator Biaya</a></li>
                </ul>
            </div>
            <div>
                <strong class="text-brass-300 block font-semibold mb-3 uppercase tracking-wider text-[10px]">Studio & Workshop</strong>
                <p class="text-teak-400 leading-relaxed">
                    Jl. Palagan Tentara Pelajar Km 9, Sleman, DI Yogyakarta<br>
                    Workshop Kayu: Jl. Raya Solo-Jepara Km 12, Surakarta
                </p>
            </div>
            <div>
                <strong class="text-brass-300 block font-semibold mb-3 uppercase tracking-wider text-[10px]">Media Sosial</strong>
                <div class="flex space-x-3 text-base pt-1">
                    <a href="#" class="w-8 h-8 rounded-full bg-teak-900 hover:bg-brass-500 hover:text-teak-950 flex items-center justify-center transition border border-brass-500/30"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#" class="w-8 h-8 rounded-full bg-teak-900 hover:bg-brass-500 hover:text-teak-950 flex items-center justify-center transition border border-brass-500/30"><i class="fa-brands fa-youtube"></i></a>
                    <a href="#" class="w-8 h-8 rounded-full bg-teak-900 hover:bg-brass-500 hover:text-teak-950 flex items-center justify-center transition border border-brass-500/30"><i class="fa-brands fa-pinterest"></i></a>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-8 pt-8 border-t border-teak-900 flex flex-col sm:flex-row justify-between items-center gap-4 text-center sm:text-left text-[11px] text-teak-500">
            <div>
                &copy; 2026 Nantara Architecture Estate. All rights reserved. Javanese Cultural Heritage Theme.
            </div>
            <div class="flex space-x-4">
                <a href="#" class="hover:underline">Privacy Policy</a>
                <a href="#" class="hover:underline">Terms of Heritage Service</a>
            </div>
        </div>
    <div class="text-center text-[11px] text-teak-500 pb-5">Made with care ♡ · Website template by WEBIA</div>
    </footer>

    <!-- FLOATING ACTION BUTTONS (WhatsApp & Mbah Arsitek AI Assistant) -->
    <div class="nantara-floating-actions fixed bottom-6 right-6 z-50 flex items-center gap-3">
        <!-- WhatsApp Floating Button -->
        <button onclick="toggleWADrawer()" class="w-13 h-13 sm:w-14 sm:h-14 bg-emerald-700 hover:bg-emerald-600 text-white rounded-full shadow-2xl flex items-center justify-center text-2xl transition transform hover:scale-110 border border-brass-500/40 group relative">
            <i class="fa-brands fa-whatsapp"></i>
            <span class="absolute right-full mr-3 bg-teak-950 text-white text-[10px] font-bold px-2.5 py-1 rounded-lg whitespace-nowrap opacity-0 group-hover:opacity-100 transition shadow">
                Konsultasi WhatsApp
            </span>
        </button>

        <!-- Mbah Arsitek AI Bot Floating Button -->
        <button onclick="toggleAIBot()" class="w-13 h-13 sm:w-14 sm:h-14 bg-brass-500 hover:bg-brass-400 text-teak-950 rounded-full shadow-2xl flex items-center justify-center text-2xl transition transform hover:scale-110 border-2 border-teak-950 group relative">
            🏛️
            <span class="absolute right-full mr-3 bg-teak-950 text-brass-300 text-[10px] font-bold px-2.5 py-1 rounded-lg whitespace-nowrap opacity-0 group-hover:opacity-100 transition shadow border border-brass-500/30">
                Mbah Arsitek AI
            </span>
        </button>
    </div>

    <!-- WHATSAPP DRAWER MODAL -->
    <div id="wa-drawer" class="hidden fixed bottom-24 right-6 z-50 w-80 glass-wood rounded-2xl p-5 shadow-2xl border border-brass-500/40 text-xs space-y-3">
        <div class="flex justify-between items-center border-b border-brass-500/30 pb-2">
            <strong class="text-brass-300 font-serif">Tim Arsitek Nantara</strong>
            <button onclick="toggleWADrawer()" class="text-teak-400 hover:text-white"><i class="fa-solid fa-xmark"></i></button>
        </div>
        <p class="text-teak-200">Sugeng rawuh! Ada yang bisa kami bantu terkait desain Joglo atau konsultasi harga kayu Jati?</p>
        <a href="https://wa.me/6281234567890?text=Halo%20Nantara%20Architecture,%20saya%20ingin%20konsultasi%20mengenai%20desain%20rumah%20Joglo..." target="_blank" class="w-full bg-emerald-700 hover:bg-emerald-600 text-white font-bold py-2.5 rounded-xl flex items-center justify-center gap-2">
            <i class="fa-brands fa-whatsapp text-base"></i> Chat WhatsApp Sekarang
        </a>
    </div>

    <!-- MBAH ARSITEK AI CHATBOT DRAWER MODAL -->
    <div id="ai-drawer" class="hidden fixed bottom-24 right-6 z-50 w-85 sm:w-96 glass-wood rounded-2xl p-5 shadow-2xl border-2 border-brass-500 flex flex-col h-[420px] text-xs">
        <div class="flex justify-between items-center pb-3 border-b border-brass-500/30">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-full bg-brass-500 text-teak-950 flex items-center justify-center font-bold">
                    🏛️
                </div>
                <div>
                    <strong class="text-teak-50 font-serif block">Mbah Arsitek AI</strong>
                    <span class="text-[10px] text-brass-400 block">Pakar Arsitektur Jawi & Primbon</span>
                </div>
            </div>
            <button onclick="toggleAIBot()" class="text-teak-400 hover:text-white"><i class="fa-solid fa-xmark"></i></button>
        </div>

        <div id="ai-messages" class="flex-grow overflow-y-auto my-3 space-y-3 pr-1">
            <div class="bg-teak-950 p-3 rounded-xl border border-brass-500/20 text-teak-200 max-w-[88%]">
                Sugeng rawuh! Saya Mbah Arsitek AI. Silakan tanyakan seputar jenis Joglo, kualitas kayu Jati, atau perhitungan Primbon Jawa.
            </div>
        </div>

        <div class="flex gap-2 pt-2 border-t border-brass-500/30">
            <input id="ai-input-text" type="text" placeholder="Tanyakan seputar Joglo / Limasan..." class="flex-grow p-2 bg-teak-950 text-teak-100 rounded-xl border border-brass-500/30 focus:outline-none">
            <button onclick="sendAIChatMsg()" class="bg-brass-500 hover:bg-brass-400 text-teak-950 font-bold px-3 py-2 rounded-xl">
                <i class="fa-solid fa-paper-plane"></i>
            </button>
        </div>
    </div>

    <!-- PROJECT QUICK VIEW MODAL -->
    <div id="project-modal" class="hidden fixed inset-0 z-50 bg-teak-950/80 backdrop-blur-md flex items-center justify-center p-4">
        <div class="glass-wood rounded-3xl max-w-2xl w-full p-6 sm:p-8 relative border border-brass-500/50 shadow-2xl max-h-[90vh] overflow-y-auto space-y-4">
            <button onclick="closeProjectModal()" class="absolute top-4 right-4 text-teak-400 hover:text-white text-lg w-8 h-8 rounded-full bg-teak-900 flex items-center justify-center">
                <i class="fa-solid fa-xmark"></i>
            </button>
            <div id="project-modal-body">
                <!-- Injected dynamically via JS -->
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT LOGIC CONTROLLERS -->
    <script>
        // --- DUAL LANGUAGE DICTIONARY ---
        const i18nData = {
            id: {
                topbar_badge: "HERITAGE CERTIFIED",
                topbar_msg: "Konsultasi Arsitektur Joglo & Limasan Kayu Jati TPK Perhutani Heritage",
                topbar_cta: "Hitung Estimasi Biaya →",
                nav_subtitle: "Arsitektur Etnik Nusantara",
                nav_regional: "Gaya Regional",
                nav_portfolio: "Portofolio Karya",
                nav_viewer: "Denah & 3D Layer",
                nav_materials: "Material Etnik",
                nav_estimator: "Kalkulator Biaya",
                nav_packages: "Paket Desain",
                nav_cta: "Konsultasi Project",
                hero_badge: "Kemewahan Tradisi Jawi & Modernitas",
                hero_title1: "Membangun Mahakarya",
                hero_title2: "Joglo & Heritage Nusantara",
                hero_desc: "Nantara Architecture memadukan filosofi tata ruang Primbon Jawa, keagungan struktur kayu Jati TPK Perhutani, dan kenyamanan arsitektur modern ramah energi untuk hunian etnik, resort, dan pendopo bernilai tinggi.",
                hero_btn_calc: "Simulasi Estimasi Biaya",
                hero_btn_gallery: "Galeri Joglo & Limasan",
                stat_projects: "Proyek Joglo & Resort",
                stat_wood: "Kayu Jati Perhutani",
                stat_exp: "Pengalaman Etnik",
                hp1_title: "Struktur Tumpangsari",
                hp1_desc: "Ukiran balok bersusun kayu jati penopang atap tajuk utama.",
                hp2_title: "4 Saka Guru Utama",
                hp2_desc: "Tiang kayu jati solid tanpa sambungan dengan kancing kayu kuno.",
                hp3_title: "Dinding Ukir Gebyok Jepara",
                hp3_desc: "Pintu & dinding ukir 3D gaya Kudusan dan Jepara klasik.",
                hero_frame_title: "Model: Joglo Sinom Modern Heritage",
                hero_frame_sub: "Klik angka hotspot pada gambar untuk detail arsitektural",
                hero_frame_tag: "AR-READY",
                reg_tag: "Ragams Arsitektur Nusantara",
                reg_heading: "Eksplorasi Tipologi Rumah Etnik",
                reg_sub: "Setiap bentuk atap dan struktur kayu memiliki makna filosofi kosmologis dan keagungan sejarahnya masing-masing.",
                joglo_desc: "Atap tajuk menjulang tinggi melambangkan gunung suci (Mahameru). Dilengkapi tumpangsari bersusun 5 hingga 9 tingkat dengan ukiran floral relief halus Jepara.",
                port_tag: "Portofolio & Mahakarya",
                port_heading: "Galeri Proyek Terbangun",
                viewer_tag: "Interactive Architectural Blueprint",
                viewer_heading: "Penjelajah Layer Denah & Render 3D",
                viewer_sub: "Ganti layer tampilan untuk melihat struktur kayu, zonasi Primbon Jawa, dan render 3D visual.",
                mat_tag: "Material & Pengrajin Heritage",
                mat_heading: "Kualitas Bahan Alam Terbaik",
                arch_tag: "Principal Architect Profile",
                arch_bio: "Berpengalaman lebih dari 20 tahun merancang dan merekonstruksi bangunan heritage di Jawa, Bali, dan mancanegara. Beliau memadukan lisensi arsitek profesional IAI dengan pengetahuan mendalam manuskrip kuno Primbon Hasta Kosala Kosali.",
                calc_tag: "Kalkulator Budget Transparan",
                calc_heading: "Simulasi Estimasi Biaya Bangun",
                calc_sub: "Hitung perkiraan biaya desain dan konstruksi rumah etnik berdasarkan luas dan grade kayu.",
                calc_type_label: "1. Pilih Jenis Bangunan:",
                calc_area_label: "2. Luas Bangunan (m²):",
                calc_wood_label: "3. Grade Kualitas Kayu Jati:",
                calc_result_label: "ESTIMASI TOTAL BIAYA KONSTRUKSI:",
                pack_tag: "Paket Layanan Arsitektur",
                pack_heading: "Pilihan Kerjasama Desain & Build",
                testi_tag: "Kepercayaan Klien",
                testi_heading: "Testimoni Pemilik Joglo & Resort",
                faq_tag: "Pertanyaan Sering Diajukan",
                faq_heading: "Frequently Asked Questions",
                form_tag: "Diskusi Proyek Etnik",
                form_heading: "Mulai Konsultasi Arsitektur",
                form_sub: "Isi formulir di bawah ini untuk menjadwalkan sesi konsultasi langsung bersama Ki Hendro Supriyo, IAI.",
                f_name: "Nama Lengkap *",
                f_phone: "Nomor WhatsApp *",
                f_loc: "Lokasi Lahan Proyek *",
                f_type: "Tipe Bangunan yang Diinginkan *",
                f_msg: "Detail Keinginan / Catatan Khusus"
            },
            en: {
                topbar_badge: "HERITAGE CERTIFIED",
                topbar_msg: "Consultation for Joglo & Limasan Perhutani Teak Wood Heritage Architecture",
                topbar_cta: "Calculate Estimate →",
                nav_subtitle: "Nusantara Ethnic Architecture",
                nav_regional: "Regional Styles",
                nav_portfolio: "Works Portfolio",
                nav_viewer: "Floorplan & 3D Layer",
                nav_materials: "Ethnic Materials",
                nav_estimator: "Cost Calculator",
                nav_packages: "Design Packages",
                nav_cta: "Project Inquiry",
                hero_badge: "Luxury Javanese Tradition & Modernity",
                hero_title1: "Crafting Masterpieces of",
                hero_title2: "Joglo & Nusantara Heritage",
                hero_desc: "Nantara Architecture combines Javanese Primbon spatial philosophy, solid Perhutani Teak timber majesty, and eco-friendly modern luxury for ethnic residences, resorts, and heritage pavilions.",
                hero_btn_calc: "Simulate Cost Estimate",
                hero_btn_gallery: "Joglo & Limasan Gallery",
                stat_projects: "Joglo & Resort Projects",
                stat_wood: "Perhutani Teak Wood",
                stat_exp: "Years Ethnic Expertise",
                hp1_title: "Tumpangsari Canopy Structure",
                hp1_desc: "Tiered carved teak wood beams supporting the central roof peak.",
                hp2_title: "4 Main Saka Guru Pillars",
                hp2_desc: "Solid seamless teak pillars connected via ancient wooden dowels.",
                hp3_title: "Jepara Gebyok Carved Wall",
                hp3_desc: "3D relief carved doors & walls in Kudusan and Jepara classic style.",
                hero_frame_title: "Model: Joglo Sinom Modern Heritage",
                hero_frame_sub: "Click hotspot numbers on the photo for architectural details",
                hero_frame_tag: "AR-READY",
                reg_tag: "Nusantara Architectural Typologies",
                reg_heading: "Explore Ethnic House Typologies",
                reg_sub: "Every roof contour and timber joinery carries cosmological philosophy and historical majesty.",
                joglo_desc: "High soaring tajuk roof symbolizing sacred mountains (Mahameru). Equipped with 5 to 9 tiered tumpangsari carved floral reliefs.",
                port_tag: "Portfolio & Masterpieces",
                port_heading: "Gallery of Built Projects",
                viewer_tag: "Interactive Architectural Blueprint",
                viewer_heading: "Floorplan Layer & 3D Render Viewer",
                viewer_sub: "Switch display layers to view timber framing, Javanese Primbon zoning, and realistic 3D renders.",
                mat_tag: "Heritage Craftsmanship & Materials",
                mat_heading: "Highest Quality Natural Elements",
                arch_tag: "Principal Architect Profile",
                arch_bio: "Over 20 years of experience designing and restoring heritage structures across Java, Bali, and internationally. Member of IAI with deep mastery of ancient Primbon manuscripts.",
                calc_tag: "Transparent Budget Calculator",
                calc_heading: "Build Cost Estimation Calculator",
                calc_sub: "Calculate estimated design and construction costs based on floor area and teak wood grade.",
                calc_type_label: "1. Select Building Type:",
                calc_area_label: "2. Floor Area (sqm):",
                calc_wood_label: "3. Teak Wood Grade Quality:",
                calc_result_label: "ESTIMATED TOTAL CONSTRUCTION COST:",
                pack_tag: "Architectural Service Packages",
                pack_heading: "Design & Build Partnership Options",
                testi_tag: "Client Trust & Reviews",
                testi_heading: "Testimonials from Joglo & Resort Owners",
                faq_tag: "Frequently Asked Questions",
                faq_heading: "Frequently Asked Questions",
                form_tag: "Ethnic Project Inquiry",
                form_heading: "Start Architectural Consultation",
                form_sub: "Fill in the form below to schedule a direct consultation with Ki Hendro Supriyo, IAI.",
                f_name: "Full Name *",
                f_phone: "WhatsApp Number *",
                f_loc: "Project Site Location *",
                f_type: "Desired Building Typology *",
                f_msg: "Design Requirements / Notes"
            }
        };

        let activeLang = 'id';

        function setLanguage(lang) {
            activeLang = lang;
            document.querySelectorAll('[data-i18n]').forEach(el => {
                const key = el.getAttribute('data-i18n');
                if (i18nData[lang] && i18nData[lang][key]) {
                    el.textContent = i18nData[lang][key];
                }
            });

            if (lang === 'id') {
                document.getElementById('btn-lang-id').className = "px-2 py-0.5 rounded-full font-bold bg-brass-500 text-teak-950";
                document.getElementById('btn-lang-en').className = "px-2 py-0.5 rounded-full font-bold text-teak-300 hover:text-white";
            } else {
                document.getElementById('btn-lang-en').className = "px-2 py-0.5 rounded-full font-bold bg-brass-500 text-teak-950";
                document.getElementById('btn-lang-id').className = "px-2 py-0.5 rounded-full font-bold text-teak-300 hover:text-white";
            }
        }

        // --- MOBILE NAV TOGGLE ---
        function toggleMobileNav() {
            document.getElementById('mobile-nav').classList.toggle('hidden');
        }

        // --- REGIONAL TABS SWITCHER ---
        function switchRegionalTab(tabKey) {
            document.querySelectorAll('.reg-content').forEach(el => el.classList.add('hidden'));
            document.querySelectorAll('.reg-tab').forEach(btn => {
                btn.className = "reg-tab px-5 py-3 rounded-xl bg-teak-800 text-teak-200 hover:bg-teak-700 font-bold text-xs uppercase tracking-wider";
            });

            document.getElementById(`reg-content-${tabKey}`).classList.remove('hidden');
            document.getElementById(`tab-${tabKey}`).className = "reg-tab px-5 py-3 rounded-xl bg-brass-500 text-teak-950 shadow-lg font-bold text-xs uppercase tracking-wider";
        }

        // --- PORTFOLIO GALLERY FILTER ---
        function filterPortfolio(cat) {
            const items = document.querySelectorAll('.port-item');
            items.forEach(item => {
                if (cat === 'all' || item.classList.contains(cat)) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        }

        // --- BLUEPRINT LAYER SWITCHER ---
        function setLayer(layerKey) {
            document.querySelectorAll('.layer-view').forEach(el => el.classList.add('hidden'));
            
            document.getElementById('btn-layer-structure').className = "px-4 py-2.5 rounded-xl bg-teak-800 text-teak-200 hover:bg-teak-700";
            document.getElementById('btn-layer-primbon').className = "px-4 py-2.5 rounded-xl bg-teak-800 text-teak-200 hover:bg-teak-700";
            document.getElementById('btn-layer-render').className = "px-4 py-2.5 rounded-xl bg-teak-800 text-teak-200 hover:bg-teak-700";

            document.getElementById(`view-layer-${layerKey}`).classList.remove('hidden');
            document.getElementById(`btn-layer-${layerKey}`).className = "px-4 py-2.5 rounded-xl bg-brass-500 text-teak-950 font-bold";
        }

        // --- CALCULATOR LOGIC ---
        let selectedRate = 8500000;

        function setCalcType(type, rate) {
            selectedRate = rate;
            document.querySelectorAll('.calc-type-btn').forEach(btn => {
                btn.className = "calc-type-btn p-3 rounded-xl border border-brass-500/40 bg-teak-800 text-teak-200 text-center";
            });
            event.target.className = "calc-type-btn p-3 rounded-xl border border-brass-500/40 bg-brass-500 text-teak-950 font-bold text-center";
            updateCalculator();
        }

        function updateCalculator() {
            const area = parseInt(document.getElementById('area-slider').value);
            const woodMultiplier = parseFloat(document.getElementById('wood-grade').value);
            
            document.getElementById('area-val').textContent = `${area} m²`;

            const total = area * selectedRate * woodMultiplier;
            const formatted = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', maximumFractionDigits: 0 }).format(total);
            
            document.getElementById('calc-result').textContent = formatted;
        }

        function exportEstimateToWA() {
            const area = document.getElementById('area-val').textContent;
            const total = document.getElementById('calc-result').textContent;
            const url = `https://wa.me/6281234567890?text=Halo%20Nantara%20Architecture,%20saya%20telah%20menghitung%20estimasi%20biaya%20pembangunan%20luas%20${encodeURIComponent(area)}%20dengan%20total%20estimasi%20${encodeURIComponent(total)}.%20Mohon%20jadwal%20konsultasi.`;
            window.open(url, '_blank');
        }

        // --- FAQ ACCORDION ---
        function toggleFAQ(num) {
            const ans = document.getElementById(`faq-ans-${num}`);
            const icon = document.getElementById(`faq-icon-${num}`);
            ans.classList.toggle('hidden');
            icon.classList.toggle('rotate-180');
        }

        // --- DRAWER TOGGLES ---
        function toggleWADrawer() {
            document.getElementById('wa-drawer').classList.toggle('hidden');
        }

        function toggleAIBot() {
            document.getElementById('ai-drawer').classList.toggle('hidden');
        }

        // --- MBAH ARSITEK AI CHAT ---
        function sendAIChatMsg() {
            const input = document.getElementById('ai-input-text');
            const messages = document.getElementById('ai-messages');
            const txt = input.value.trim();

            if (!txt) return;

            // User Bubble
            const userMsg = document.createElement('div');
            userMsg.className = "bg-brass-500 text-teak-950 font-medium p-3 rounded-xl max-w-[88%] ml-auto text-xs";
            userMsg.textContent = txt;
            messages.appendChild(userMsg);

            input.value = '';
            messages.scrollTop = messages.scrollHeight;

            // Bot Response
            setTimeout(() => {
                const botMsg = document.createElement('div');
                botMsg.className = "bg-teak-950 p-3 rounded-xl border border-brass-500/30 text-teak-200 max-w-[88%] text-xs space-y-1";
                
                if (txt.toLowerCase().includes('harga') || txt.toLowerCase().includes('biaya')) {
                    botMsg.innerHTML = "Estimasi biaya bangun turnkey Joglo/Limasan berkisar <strong>Rp 6.500.000 - Rp 9.500.000 / m²</strong> tergantung grade Kayu Jati TPK dan kerumitan tumpangsari. Coba gunakan fitur Kalkulator Biaya kami!";
                } else if (txt.toLowerCase().includes('joglo') || txt.toLowerCase().includes('kayu')) {
                    botMsg.innerHTML = "Nantara Architecture secara khusus menggunakan <strong>Kayu Jati TPK Perhutani Old Growth</strong> yang memiliki kepadatan serat tinggi, anti rayap, dan garansi struktur hingga 10 tahun.";
                } else {
                    botMsg.innerHTML = "Matur nuwun telah bertanya! Saya Mbah Arsitek AI siap membantu Anda memahami tata ruang Primbon Hasta Kosala Kosali maupun pilihan material bangunan etnik.";
                }

                messages.appendChild(botMsg);
                messages.scrollTop = messages.scrollHeight;
            }, 600);
        }

        // --- PROJECT MODAL ---
        function openProjectModal(key) {
            const modal = document.getElementById('project-modal');
            const body = document.getElementById('project-modal-content') || document.getElementById('project-modal-body');

            body.innerHTML = `
                <div class="space-y-4">
                    <span class="text-xs bg-brass-500 text-teak-950 font-bold px-2.5 py-1 rounded uppercase">Mahakarya Terpilih</span>
                    <h3 class="font-serif text-2xl font-bold text-teak-50">Omah Joglo Kaliurang Heritage</h3>
                    <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&q=80&w=800" class="w-full h-56 object-cover rounded-xl border border-brass-500/40">
                    <p class="text-xs text-teak-200 leading-relaxed">
                        Proyek hunian seluas 450 m² yang memadukan keindahan struktur Joglo Lawakan tua dengan fasad kaca modern. Dilengkapi 4 Saka Guru tiang jati utuh tanpa sambungan berukuran 30cm x 30cm.
                    </p>
                    <div class="pt-2 border-t border-brass-500/20 flex justify-between items-center text-xs">
                        <span class="text-brass-400 font-mono">LOKASI: SLEMAN, YOGYAKARTA</span>
                        <a href="https://wa.me/6281234567890" target="_blank" class="bg-brass-500 text-teak-950 font-bold px-4 py-2 rounded-xl">Minta Blueprint PDF</a>
                    </div>
                </div>
            `;

            modal.classList.remove('hidden');
        }

        function closeProjectModal() {
            document.getElementById('project-modal').classList.add('hidden');
        }

        function showHotspotInfo(part) {
            if (part === 'tumpangsari') alert("Tumpangsari: Struktur balok kayu jati bersusun penopang puncak atap Joglo.");
            if (part === 'sakaguru') alert("Saka Guru: 4 tiang utama penopang kekuatan seluruh bangunan Joglo.");
            if (part === 'gebyok') alert("Gebyok: Dinding dan pintu peninggalan seni ukir 3D khas Jepara/Kudus.");
        }

        function handleContactSubmit(e) {
            e.preventDefault();
            alert("Matur nuwun! Formulir konsultasi proyek Anda telah diterima. Tim arsitek Nantara akan menghubungi WhatsApp Anda dalam 1x24 jam.");
            e.target.reset();
        }

        window.onload = function() {
            setLanguage('id');
            updateCalculator();
        }
    </script>

<script src="{{ asset('js/website-bisnis/templates/interior-architecture/architecture-building-design/nantara-architecture/nantara-architecture.js') }}?v=1"></script>
</body>
</html>
