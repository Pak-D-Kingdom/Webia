<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MatchaAgro Machinery — Perlengkapan &amp; Peralatan Pertanian Creative Matcha Latte</title>
    <meta name="description" content="MatchaAgro Machinery adalah distributor alat dan perlengkapan pertanian modern bergaya Creative dengan tema warna Matcha Latte. Solusi traktor efisien, drone sprayer presisi, dan mekanisasi ramah lingkungan.">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Space+Grotesk:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                        display: ['"Space Grotesk"', 'sans-serif'],
                        mono: ['"JetBrains Mono"', 'monospace'],
                    },
                    colors: {
                        matcha: {
                            50: '#f8faf3',
                            100: '#eff4e5',
                            200: '#dee8cb',
                            300: '#c5d8a7',
                            400: '#a5c37e',
                            500: '#85ab59',
                            600: '#698c41',
                            700: '#526e34',
                            800: '#42572c',
                            900: '#384927',
                            950: '#1d2713',
                        },
                        latte: {
                            50: '#fcfaf6',
                            100: '#f8f4ec',
                            200: '#f1e7d8',
                            300: '#e7d6bf',
                            400: '#d7bea0',
                            500: '#c8a683',
                            600: '#b78e6c',
                            700: '#997356',
                            800: '#7c5d47',
                            900: '#654c3c',
                            950: '#37271e',
                        },
                        crema: {
                            gold: '#c29b38',
                            warm: '#d4a373',
                            leaf: '#556b2f',
                        }
                    },
                    animation: {
                        'float-soft': 'float 6s ease-in-out infinite',
                        'float-slow': 'floatSlow 8s ease-in-out infinite',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-10px)' },
                        },
                        floatSlow: {
                            '0%, 100%': { transform: 'translateY(0px) rotate(0deg)' },
                            '50%': { transform: 'translateY(-12px) rotate(1deg)' },
                        }
                    }
                }
            }
        }
    </script>

    <style>
        .matcha-gradient {
            background: linear-gradient(135deg, #f8faf3 0%, #eff4e5 50%, #f1e7d8 100%);
        }
        .matcha-mesh {
            background-color: #fbf9f4;
            background-image: 
                radial-gradient(at 10% 20%, rgba(133, 171, 89, 0.18) 0px, transparent 50%),
                radial-gradient(at 90% 10%, rgba(200, 166, 131, 0.16) 0px, transparent 50%),
                radial-gradient(at 50% 80%, rgba(105, 140, 65, 0.12) 0px, transparent 50%);
        }
        .card-froth {
            background: rgba(255, 255, 255, 0.82);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            border: 1px solid rgba(133, 171, 89, 0.22);
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .card-froth:hover {
            border-color: rgba(105, 140, 65, 0.55);
            transform: translateY(-4px);
            box-shadow: 0 16px 32px -10px rgba(82, 110, 52, 0.15);
        }
        .badge-matcha {
            background: #eff4e5;
            color: #42572c;
            border: 1px solid #c5d8a7;
        }
        .organic-blob {
            border-radius: 42% 58% 70% 30% / 45% 45% 55% 55%;
        }
    </style>
</head>

<body class="bg-latte-50 text-slate-800 font-sans antialiased overflow-x-hidden selection:bg-matcha-500 selection:text-white">

    <!-- ATMOSPHERIC MATCHA LATTE GLOW ORBS -->
    <div class="fixed inset-0 pointer-events-none z-0 overflow-hidden">
        <div class="absolute -top-32 -left-32 w-96 h-96 bg-matcha-300/30 rounded-full blur-3xl animate-float-soft"></div>
        <div class="absolute top-1/3 -right-32 w-[480px] h-[480px] bg-latte-300/35 rounded-full blur-3xl animate-float-slow"></div>
        <div class="absolute bottom-10 left-1/4 w-[420px] h-[420px] bg-matcha-200/25 rounded-full blur-3xl"></div>
    </div>

    <!-- LIVE TELEMETRY & ECO-BANNER -->
    <aside aria-label="Eco Telemetry" class="relative z-50 bg-matcha-950 text-latte-100 text-xs py-2 px-4 border-b border-matcha-800">
        <div class="max-w-7xl mx-auto flex flex-wrap items-center justify-between gap-3">
            <div class="flex items-center gap-2 font-mono text-[11px] text-matcha-200">
                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-matcha-800 text-matcha-300 border border-matcha-600">
                    <span class="w-1.5 h-1.5 rounded-full bg-matcha-400 animate-ping mr-1.5"></span>
                    MATCHA ECO-FLEET v3.4
                </span>
                <span class="hidden sm:inline">Efisiensi Bahan Bakar +38% &bull; Emisi Karbon -45% pada 1.200+ Hektar Lahan Mitra.</span>
            </div>
            <div class="flex items-center gap-4 text-[11px] font-mono">
                <span class="text-matcha-300">Hub Servis: Jawa, Sumatera, Bali &amp; NTB</span>
                <a href="#simulator" class="text-crema-gold hover:text-white underline font-bold transition">Hitung Hemat Lahan &rarr;</a>
            </div>
        </div>
    </aside>

    <!-- CREATIVE STICKY NAVBAR -->
    <header class="sticky top-0 z-40 bg-latte-50/90 backdrop-blur-md border-b border-matcha-200/80 transition-all">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
            
            <!-- Brand Logo -->
            <a href="#" class="flex items-center gap-3 group">
                <div class="w-11 h-11 rounded-2xl bg-gradient-to-br from-matcha-500 via-matcha-600 to-matcha-800 p-0.5 shadow-md shadow-matcha-900/10 group-hover:scale-105 transition-transform">
                    <div class="w-full h-full bg-latte-50 rounded-[14px] flex items-center justify-center text-matcha-700">
                        <!-- Leaf & Gear Icon -->
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                </div>
                <div>
                    <span class="font-display font-extrabold text-2xl tracking-tight text-matcha-950 flex items-center gap-1">
                        Matcha<span class="text-matcha-600">Agro</span>
                    </span>
                    <span class="block text-[10px] font-mono uppercase tracking-widest text-latte-700 -mt-1 font-bold">
                        Smart Creative Machinery
                    </span>
                </div>
            </a>

            <!-- Desktop Nav Links -->
            <nav class="hidden md:flex items-center gap-7 text-sm font-semibold text-slate-700 font-sans">
                <a href="#armada" class="hover:text-matcha-700 transition">Armada Mesin</a>
                <a href="#fitur" class="hover:text-matcha-700 transition">Inovasi Presisi</a>
                <a href="#simulator" class="hover:text-matcha-700 transition">Simulator Lahan</a>
                <a href="#paket" class="hover:text-matcha-700 transition">Skema Kepemilikan</a>
                <a href="#faq" class="hover:text-matcha-700 transition">FAQ</a>
            </nav>

            <!-- Actions -->
            <div class="hidden sm:flex items-center gap-3 font-sans">
                <button onclick="openMatchaAI()" class="px-4 py-2 rounded-xl text-xs font-mono font-bold text-matcha-800 bg-matcha-100 hover:bg-matcha-200 border border-matcha-300 transition flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-matcha-600 animate-pulse"></span>
                    MatchaAgro AI
                </button>
                <a href="#trial" class="px-5 py-2.5 rounded-xl font-display font-bold text-xs uppercase tracking-wider text-white bg-gradient-to-r from-matcha-600 to-matcha-800 hover:from-matcha-700 hover:to-matcha-900 transition shadow-md shadow-matcha-800/20 flex items-center gap-1.5">
                    <span>Uji Demo Lahan</span>
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
            </div>

            <!-- Mobile Hamburger -->
            <button onclick="toggleMobileMenu()" class="md:hidden p-2 rounded-xl text-slate-700 hover:bg-matcha-100" aria-label="Toggle Navigation">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
            </button>
        </div>

        <!-- Mobile Drawer -->
        <div id="mobile-menu" class="hidden md:hidden border-t border-matcha-200 bg-latte-50/98 px-6 py-5 space-y-3 font-sans">
            <a href="#armada" onclick="toggleMobileMenu()" class="block py-2 text-sm font-semibold text-slate-700 hover:text-matcha-700">Armada Mesin Kreatif</a>
            <a href="#fitur" onclick="toggleMobileMenu()" class="block py-2 text-sm font-semibold text-slate-700 hover:text-matcha-700">Inovasi Presisi &amp; IoT</a>
            <a href="#simulator" onclick="toggleMobileMenu()" class="block py-2 text-sm font-semibold text-slate-700 hover:text-matcha-700">Simulator Produktivitas Lahan</a>
            <a href="#paket" onclick="toggleMobileMenu()" class="block py-2 text-sm font-semibold text-slate-700 hover:text-matcha-700">Skema Kepemilikan &amp; Leasing</a>
            <a href="#faq" onclick="toggleMobileMenu()" class="block py-2 text-sm font-semibold text-slate-700 hover:text-matcha-700">FAQ</a>
            <div class="pt-3 border-t border-matcha-200 flex flex-col gap-2">
                <button onclick="openMatchaAI(); toggleMobileMenu();" class="w-full py-2.5 rounded-xl text-xs font-mono font-bold text-matcha-800 bg-matcha-100 text-center">Buka MatchaAgro AI Assistant</button>
                <a href="#trial" onclick="toggleMobileMenu()" class="w-full py-2.5 rounded-xl text-xs font-display font-bold text-white bg-matcha-700 text-center uppercase tracking-wider">Daftar Demo di Lahan Anda</a>
            </div>
        </div>
    </header>

    <main class="relative z-10">

        <!-- HERO SECTION: Creative Asymmetric & Organic Flow -->
        <section class="relative matcha-mesh pt-12 pb-24 border-b border-matcha-200/60 overflow-hidden">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid lg:grid-cols-12 gap-12 items-center">
                    
                    <!-- Left Hero Content -->
                    <div class="lg:col-span-7 space-y-6">
                        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full badge-matcha text-xs font-mono font-bold tracking-wider uppercase">
                            <span class="w-2 h-2 rounded-full bg-matcha-600 animate-pulse"></span>
                            CREATIVE AGRI-MACHINERY &amp; SMART GEAR
                        </div>

                        <h1 class="font-display font-extrabold text-4xl sm:text-5xl lg:text-6xl text-matcha-950 leading-[1.12]">
                            Harmoni Alam &amp; Mesin,<br>
                            <span class="text-transparent bg-clip-text bg-gradient-to-r from-matcha-700 via-matcha-600 to-latte-700">
                                Inovasi Pertanian
                            </span><br>
                            Berkelanjutan.
                        </h1>

                        <p class="text-base sm:text-lg text-slate-600 leading-relaxed max-w-2xl font-light">
                            MatchaAgro mendefinisikan ulang mekanisasi agrikultur nusantara. Kami merancang dan menyalurkan alat pertanian modern dengan efisiensi bahan bakar superior, sensor IoT presisi, dan desain ergonomis yang bersahabat dengan ekosistem tanah.
                        </p>

                        <!-- CTA Group -->
                        <div class="pt-2 flex flex-wrap items-center gap-4">
                            <a href="#trial" class="px-7 py-3.5 rounded-2xl font-display font-bold text-sm uppercase tracking-wider text-white bg-gradient-to-r from-matcha-600 via-matcha-700 to-matcha-800 hover:from-matcha-700 hover:to-matcha-900 transition shadow-lg shadow-matcha-800/25 flex items-center gap-2">
                                <span>Booking Demo Unit Gratis</span>
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                            </a>
                            <a href="#armada" class="px-6 py-3.5 rounded-2xl font-display font-semibold text-sm text-matcha-900 bg-white/90 hover:bg-white border border-matcha-300 transition flex items-center gap-2">
                                <svg class="w-5 h-5 text-matcha-700" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"/></svg>
                                <span>Jelajahi Seri Mesin 2026</span>
                            </a>
                        </div>

                        <!-- Creative Metrics Strip -->
                        <div class="pt-8 border-t border-matcha-200/80 grid grid-cols-3 gap-6">
                            <div>
                                <div class="font-display font-extrabold text-2xl sm:text-3xl text-matcha-800">42%</div>
                                <div class="text-xs text-slate-500 font-mono mt-0.5">Lebih Hemat Solar</div>
                            </div>
                            <div>
                                <div class="font-display font-extrabold text-2xl sm:text-3xl text-matcha-800">12 Menit</div>
                                <div class="text-xs text-slate-500 font-mono mt-0.5">Spraying / Hektar</div>
                            </div>
                            <div>
                                <div class="font-display font-extrabold text-2xl sm:text-3xl text-latte-800">99.8%</div>
                                <div class="text-xs text-slate-500 font-mono mt-0.5">Presisi Sebar Benih</div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column: Interactive Machine Showcase Card -->
                    <div class="lg:col-span-5 relative">
                        <!-- Fluid Blob Background Behind Card -->
                        <div class="absolute -inset-4 bg-gradient-to-tr from-matcha-300/40 via-latte-300/40 to-matcha-200/30 rounded-3xl blur-xl -z-10"></div>
                        
                        <div class="card-froth rounded-3xl p-7 space-y-6 shadow-xl relative overflow-hidden">
                            <!-- Card Header -->
                            <div class="flex items-center justify-between pb-4 border-b border-matcha-200">
                                <div class="flex items-center gap-2">
                                    <span class="w-3 h-3 rounded-full bg-matcha-500 animate-ping"></span>
                                    <span class="font-mono text-xs font-bold uppercase tracking-wider text-matcha-900">
                                        TELEMETRI MESIN AKTIF
                                    </span>
                                </div>
                                <span class="px-2.5 py-1 rounded-full bg-matcha-100 text-matcha-800 font-mono text-[10px] font-bold border border-matcha-300">
                                    LIVE DEMO MODEL
                                </span>
                            </div>

                            <!-- Model Switcher Tabs -->
                            <div class="grid grid-cols-3 gap-1.5 p-1 bg-latte-100 rounded-xl border border-matcha-200">
                                <button onclick="switchHeroModel('tractor')" id="btn-hero-tractor" class="py-2 rounded-lg text-xs font-display font-bold bg-matcha-600 text-white transition">
                                    Mini 4WD
                                </button>
                                <button onclick="switchHeroModel('drone')" id="btn-hero-drone" class="py-2 rounded-lg text-xs font-display font-bold text-slate-700 hover:bg-latte-200 transition">
                                    Drone 25L
                                </button>
                                <button onclick="switchHeroModel('harvester')" id="btn-hero-harvester" class="py-2 rounded-lg text-xs font-display font-bold text-slate-700 hover:bg-latte-200 transition">
                                    Harvester
                                </button>
                            </div>

                            <!-- Showcase View Box -->
                            <div id="hero-model-box" class="p-5 rounded-2xl bg-gradient-to-br from-latte-100/90 to-matcha-50/90 border border-matcha-200/80 space-y-4">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h3 class="font-display font-bold text-lg text-matcha-950" id="hero-model-title">
                                            MatchaCraft T-45 Mini 4WD
                                        </h3>
                                        <p class="text-xs text-slate-500" id="hero-model-sub">
                                            Traktor Kompak Lahan Sawah &amp; Kebun Organik
                                        </p>
                                    </div>
                                    <span class="px-2 py-0.5 rounded bg-matcha-200 text-matcha-900 text-[11px] font-mono font-bold" id="hero-model-badge">
                                        Eco-Diesel 45 HP
                                    </span>
                                </div>

                                <!-- Dynamic Specs Grid -->
                                <div class="grid grid-cols-2 gap-2.5 text-xs font-sans">
                                    <div class="p-2.5 bg-white/90 rounded-xl border border-matcha-100">
                                        <span class="text-slate-400 text-[10px] block font-mono">Konsumsi BBM:</span>
                                        <strong class="text-matcha-900" id="hero-spec-1">2.4 Liter / Hektar</strong>
                                    </div>
                                    <div class="p-2.5 bg-white/90 rounded-xl border border-matcha-100">
                                        <span class="text-slate-400 text-[10px] block font-mono">Radius Manuver:</span>
                                        <strong class="text-matcha-900" id="hero-spec-2">2.1 Meter (Terasering)</strong>
                                    </div>
                                    <div class="p-2.5 bg-white/90 rounded-xl border border-matcha-100">
                                        <span class="text-slate-400 text-[10px] block font-mono">Tekanan Tanah:</span>
                                        <strong class="text-matcha-900" id="hero-spec-3">18.5 kPa (Zero Hardpan)</strong>
                                    </div>
                                    <div class="p-2.5 bg-white/90 rounded-xl border border-matcha-100">
                                        <span class="text-slate-400 text-[10px] block font-mono">Koneksi IoT:</span>
                                        <strong class="text-matcha-900" id="hero-spec-4">GPS + Telemetri HP</strong>
                                    </div>
                                </div>
                            </div>

                            <a href="#trial" class="block w-full py-3 rounded-2xl text-center font-display font-bold text-xs uppercase tracking-wider text-matcha-900 bg-matcha-200 hover:bg-matcha-300 transition">
                                Konsultasi Kesesuaian Lahan Anda &rarr;
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- SUSTAINABLE COLLABORATORS BAR -->
        <section class="py-8 bg-latte-100/70 border-b border-matcha-200/60">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <p class="text-center font-mono text-xs uppercase tracking-widest text-slate-500 mb-5">
                    Didukung oleh Komunitas Petani Berkelanjutan &amp; Ekosistem Pangan Nusantara
                </p>
                <div class="flex flex-wrap items-center justify-center gap-8 md:gap-14 font-display font-bold text-slate-500 text-sm md:text-base opacity-80">
                    <span class="hover:text-matcha-800 transition flex items-center gap-2"><span class="w-2.5 h-2.5 rounded-full bg-matcha-600"></span> ALIANSI ORGANIK NUSANTARA</span>
                    <span class="hover:text-matcha-800 transition flex items-center gap-2"><span class="w-2.5 h-2.5 rounded-full bg-matcha-600"></span> AGRI-TECH LAB INDONESIA</span>
                    <span class="hover:text-matcha-800 transition flex items-center gap-2"><span class="w-2.5 h-2.5 rounded-full bg-matcha-600"></span> KOPERASI PETANI REGEN</span>
                    <span class="hover:text-matcha-800 transition flex items-center gap-2"><span class="w-2.5 h-2.5 rounded-full bg-matcha-600"></span> JAVA ECO FARM HOLDING</span>
                    <span class="hover:text-matcha-800 transition flex items-center gap-2"><span class="w-2.5 h-2.5 rounded-full bg-matcha-600"></span> SMART HARVEST HUB</span>
                </div>
            </div>
        </section>

        <!-- PRODUCT CATALOG WITH INTERACTIVE CATEGORY TABS -->
        <section id="armada" class="py-24 relative">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                
                <div class="text-center max-w-2xl mx-auto mb-16 space-y-3">
                    <span class="text-matcha-700 font-mono text-xs uppercase tracking-widest font-bold">
                        CREATIVE FLEET SHOWCASE
                    </span>
                    <h2 class="font-display font-extrabold text-3xl sm:text-4xl text-matcha-950">
                        Katalog Perlengkapan &amp; Mesin Pilihan
                    </h2>
                    <p class="text-slate-600 text-sm">
                        Kombinasi material tangguh, konsumsi energi efisien, dan antarmuka operasional yang mudah dikuasai dalam waktu 1 hari pelatihan.
                    </p>
                </div>

                <!-- Tabs -->
                <div class="flex flex-wrap justify-center gap-2 mb-12" id="catalog-tabs">
                    <button onclick="filterCatalog('all')" id="tab-all" class="px-5 py-2.5 rounded-xl font-display font-bold text-xs uppercase tracking-wider bg-matcha-700 text-white transition shadow-sm">
                        Semua Perlengkapan
                    </button>
                    <button onclick="filterCatalog('tractor')" id="tab-tractor" class="px-5 py-2.5 rounded-xl font-display font-bold text-xs uppercase tracking-wider bg-white text-slate-700 border border-matcha-200 hover:bg-matcha-50 transition">
                        Traktor Kompak &amp; Bajak
                    </button>
                    <button onclick="filterCatalog('drone')" id="tab-drone" class="px-5 py-2.5 rounded-xl font-display font-bold text-xs uppercase tracking-wider bg-white text-slate-700 border border-matcha-200 hover:bg-matcha-50 transition">
                        Smart Drone &amp; Sensorik
                    </button>
                    <button onclick="filterCatalog('harvest')" id="tab-harvest" class="px-5 py-2.5 rounded-xl font-display font-bold text-xs uppercase tracking-wider bg-white text-slate-700 border border-matcha-200 hover:bg-matcha-50 transition">
                        Panen &amp; Pasca-Panen
                    </button>
                </div>

                <!-- Catalog Grid -->
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    
                    <!-- Item 1 -->
                    <div class="card-froth rounded-3xl p-6 space-y-4 flex flex-col justify-between" data-cat="tractor">
                        <div class="space-y-3">
                            <div class="flex justify-between items-center text-xs font-mono">
                                <span class="px-2.5 py-0.5 rounded-full badge-matcha font-bold">Traktor 4WD</span>
                                <span class="text-slate-400">SERI M-45</span>
                            </div>
                            <h3 class="font-display font-bold text-xl text-matcha-950">MatchaCraft T-45 Eco 4WD</h3>
                            <p class="text-xs text-slate-600 leading-relaxed">
                                Traktor mini roda 4 bersuspensi lembut dengan attachment bajak piringan &amp; rotary tiller. Ideal untuk sawah berteras dan kebun sayur dataran tinggi.
                            </p>
                            <div class="p-3 bg-latte-50 rounded-2xl text-xs space-y-1.5 font-mono border border-matcha-100">
                                <div class="flex justify-between"><span class="text-slate-500">Kapasitas Kerja:</span> <strong class="text-matcha-900">1.2 Ha / Jam</strong></div>
                                <div class="flex justify-between"><span class="text-slate-500">Tenaga Mesin:</span> <strong class="text-matcha-900">45 HP Direct Injection</strong></div>
                                <div class="flex justify-between"><span class="text-slate-500">Bobot Total:</span> <strong class="text-matcha-900">1.350 Kg (Anti-Ambles)</strong></div>
                            </div>
                        </div>
                        <div class="pt-4 border-t border-matcha-100 flex items-center justify-between">
                            <span class="text-xs font-mono text-matcha-700 font-bold">Garansi 2 Tahun</span>
                            <a href="#trial" class="px-4 py-2 rounded-xl bg-matcha-700 hover:bg-matcha-800 text-white font-display font-bold text-xs">Minta Brosur Spek</a>
                        </div>
                    </div>

                    <!-- Item 2 -->
                    <div class="card-froth rounded-3xl p-6 space-y-4 flex flex-col justify-between" data-cat="tractor">
                        <div class="space-y-3">
                            <div class="flex justify-between items-center text-xs font-mono">
                                <span class="px-2.5 py-0.5 rounded-full badge-matcha font-bold">Traktor Lahan Kering</span>
                                <span class="text-slate-400">SERI M-75</span>
                            </div>
                            <h3 class="font-display font-bold text-xl text-matcha-950">MatchaCraft T-75 Heavy Tiller</h3>
                            <p class="text-xs text-slate-600 leading-relaxed">
                                Didesain khusus untuk pembukaan lahan tebu, singkong, dan jagung dengan transmisi synchromesh 16-speed dan kabin AC ergonomis.
                            </p>
                            <div class="p-3 bg-latte-50 rounded-2xl text-xs space-y-1.5 font-mono border border-matcha-100">
                                <div class="flex justify-between"><span class="text-slate-500">Kapasitas Kerja:</span> <strong class="text-matcha-900">1.9 Ha / Jam</strong></div>
                                <div class="flex justify-between"><span class="text-slate-500">Tenaga Mesin:</span> <strong class="text-matcha-900">75 HP Turbo Intercooler</strong></div>
                                <div class="flex justify-between"><span class="text-slate-500">Kapasitas Angkat:</span> <strong class="text-matcha-900">1.800 Kg Hidrolik</strong></div>
                            </div>
                        </div>
                        <div class="pt-4 border-t border-matcha-100 flex items-center justify-between">
                            <span class="text-xs font-mono text-matcha-700 font-bold">Garansi 2 Tahun</span>
                            <a href="#trial" class="px-4 py-2 rounded-xl bg-matcha-700 hover:bg-matcha-800 text-white font-display font-bold text-xs">Minta Brosur Spek</a>
                        </div>
                    </div>

                    <!-- Item 3 -->
                    <div class="card-froth rounded-3xl p-6 space-y-4 flex flex-col justify-between" data-cat="drone">
                        <div class="space-y-3">
                            <div class="flex justify-between items-center text-xs font-mono">
                                <span class="px-2.5 py-0.5 rounded-full bg-crema-gold/20 text-latte-900 font-bold">Drone Sprayer</span>
                                <span class="text-slate-400">SERI D-25</span>
                            </div>
                            <h3 class="font-display font-bold text-xl text-matcha-950">MatchaFlyer HexaDrone 25L</h3>
                            <p class="text-xs text-slate-600 leading-relaxed">
                                Drone penyemprot pupuk organik cair dan biopestisida dengan sistem droplet kabut atomisasi mikro sentrifugal, hemat air hingga 90%.
                            </p>
                            <div class="p-3 bg-latte-50 rounded-2xl text-xs space-y-1.5 font-mono border border-matcha-100">
                                <div class="flex justify-between"><span class="text-slate-500">Kapasitas Tangki:</span> <strong class="text-matcha-900">25 Liter / 30 Kg Benih</strong></div>
                                <div class="flex justify-between"><span class="text-slate-500">Kecepatan Semprot:</span> <strong class="text-matcha-900">12 Menit / Hektar</strong></div>
                                <div class="flex justify-between"><span class="text-slate-500">Fitur Cerdas:</span> <strong class="text-matcha-900">Penghindar Radar 360°</strong></div>
                            </div>
                        </div>
                        <div class="pt-4 border-t border-matcha-100 flex items-center justify-between">
                            <span class="text-xs font-mono text-matcha-700 font-bold">Free Training Pilot</span>
                            <a href="#trial" class="px-4 py-2 rounded-xl bg-matcha-700 hover:bg-matcha-800 text-white font-display font-bold text-xs">Minta Brosur Spek</a>
                        </div>
                    </div>

                    <!-- Item 4 -->
                    <div class="card-froth rounded-3xl p-6 space-y-4 flex flex-col justify-between" data-cat="drone">
                        <div class="space-y-3">
                            <div class="flex justify-between items-center text-xs font-mono">
                                <span class="px-2.5 py-0.5 rounded-full bg-crema-gold/20 text-latte-900 font-bold">Sensor Tanah</span>
                                <span class="text-slate-400">SERI S-IOT</span>
                            </div>
                            <h3 class="font-display font-bold text-xl text-matcha-950">AgroSense Soil &amp; Weather Pod</h3>
                            <p class="text-xs text-slate-600 leading-relaxed">
                                Stasiun sensor nirkabel bertenaga surya untuk memantau NPK tanah, kelembaban, pH, serta curah hujan real-time langsung ke WhatsApp Anda.
                            </p>
                            <div class="p-3 bg-latte-50 rounded-2xl text-xs space-y-1.5 font-mono border border-matcha-100">
                                <div class="flex justify-between"><span class="text-slate-500">Konektivitas:</span> <strong class="text-matcha-900">LoRaWAN + 4G GSM</strong></div>
                                <div class="flex justify-between"><span class="text-slate-500">Daya Tahan:</span> <strong class="text-matcha-900">Solar Panel + Baterai 5 Thn</strong></div>
                                <div class="flex justify-between"><span class="text-slate-500">Cakupan Radius:</span> <strong class="text-matcha-900">5 Km per Pod Hub</strong></div>
                            </div>
                        </div>
                        <div class="pt-4 border-t border-matcha-100 flex items-center justify-between">
                            <span class="text-xs font-mono text-matcha-700 font-bold">Aplikasi Mobile Gratis</span>
                            <a href="#trial" class="px-4 py-2 rounded-xl bg-matcha-700 hover:bg-matcha-800 text-white font-display font-bold text-xs">Minta Brosur Spek</a>
                        </div>
                    </div>

                    <!-- Item 5 -->
                    <div class="card-froth rounded-3xl p-6 space-y-4 flex flex-col justify-between" data-cat="harvest">
                        <div class="space-y-3">
                            <div class="flex justify-between items-center text-xs font-mono">
                                <span class="px-2.5 py-0.5 rounded-full badge-matcha font-bold">Combine Harvester</span>
                                <span class="text-slate-400">SERI H-80</span>
                            </div>
                            <h3 class="font-display font-bold text-xl text-matcha-950">MatchaHarvest Compact CH-80</h3>
                            <p class="text-xs text-slate-600 leading-relaxed">
                                Pemanen padi multi-alur ukuran kompak yang lincah di petak sawah kecil. Dilengkapi perontok ganda dengan tingkat gabah hampa terbuang &lt; 1%.
                            </p>
                            <div class="p-3 bg-latte-50 rounded-2xl text-xs space-y-1.5 font-mono border border-matcha-100">
                                <div class="flex justify-between"><span class="text-slate-500">Lebar Potong:</span> <strong class="text-matcha-900">1.8 Meter Header</strong></div>
                                <div class="flex justify-between"><span class="text-slate-500">Kapasitas Tangki:</span> <strong class="text-matcha-900">950 Kg Gabah Bersih</strong></div>
                                <div class="flex justify-between"><span class="text-slate-500">Kecepatan Panen:</span> <strong class="text-matcha-900">2.5 Jam / Hektar</strong></div>
                            </div>
                        </div>
                        <div class="pt-4 border-t border-matcha-100 flex items-center justify-between">
                            <span class="text-xs font-mono text-matcha-700 font-bold">Garansi Mesin 2 Tahun</span>
                            <a href="#trial" class="px-4 py-2 rounded-xl bg-matcha-700 hover:bg-matcha-800 text-white font-display font-bold text-xs">Minta Brosur Spek</a>
                        </div>
                    </div>

                    <!-- Item 6 -->
                    <div class="card-froth rounded-3xl p-6 space-y-4 flex flex-col justify-between" data-cat="harvest">
                        <div class="space-y-3">
                            <div class="flex justify-between items-center text-xs font-mono">
                                <span class="px-2.5 py-0.5 rounded-full badge-matcha font-bold">Solar Dryer</span>
                                <span class="text-slate-400">SERI SD-15</span>
                            </div>
                            <h3 class="font-display font-bold text-xl text-matcha-950">MatchaDry Solar Hybrid Dome 15T</h3>
                            <p class="text-xs text-slate-600 leading-relaxed">
                                Kubah pengering gabah, biji kopi, dan kakao efek rumah kaca berpelindung UV dengan ventilasi sirkulasi cerdas bertenaga panel surya mandiri.
                            </p>
                            <div class="p-3 bg-latte-50 rounded-2xl text-xs space-y-1.5 font-mono border border-matcha-100">
                                <div class="flex justify-between"><span class="text-slate-500">Kapasitas Batch:</span> <strong class="text-matcha-900">15 Ton Sekali Kering</strong></div>
                                <div class="flex justify-between"><span class="text-slate-500">Kadar Air Akhir:</span> <strong class="text-matcha-900">12% - 13% Standar Bulog</strong></div>
                                <div class="flex justify-between"><span class="text-slate-500">Sumber Energi:</span> <strong class="text-matcha-900">Surya + Biomassa Backup</strong></div>
                            </div>
                        </div>
                        <div class="pt-4 border-t border-matcha-100 flex items-center justify-between">
                            <span class="text-xs font-mono text-matcha-700 font-bold">Sertifikasi SNI</span>
                            <a href="#trial" class="px-4 py-2 rounded-xl bg-matcha-700 hover:bg-matcha-800 text-white font-display font-bold text-xs">Minta Brosur Spek</a>
                        </div>
                    </div>

                </div>

            </div>
        </section>

        <!-- INTERACTIVE LAND EFFICIENCY & SIMULATOR -->
        <section id="simulator" class="py-24 matcha-gradient border-y border-matcha-200/80">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                
                <div class="grid lg:grid-cols-12 gap-12 items-center">
                    
                    <div class="lg:col-span-5 space-y-6">
                        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full badge-matcha text-xs font-mono font-bold uppercase">
                            INTERACTIVE AGRI-SIMULATOR
                        </div>
                        <h2 class="font-display font-extrabold text-3xl sm:text-4xl text-matcha-950 leading-tight">
                            Simulasi Efisiensi Jam Kerja &amp; <span class="text-matcha-700">Hasil Panen Lahan</span>
                        </h2>
                        <p class="text-slate-600 text-sm leading-relaxed">
                            Bandingkan cara kerja tradisional dengan armada modern MatchaAgro. Geser estimasi luas lahan Anda untuk melihat proyeksi penghematan waktu olah dan penurunan biaya produksi.
                        </p>

                        <div class="p-4 bg-white/80 rounded-2xl border border-matcha-200 text-xs space-y-2">
                            <div class="font-bold text-matcha-900 flex items-center gap-1.5">
                                <svg class="w-4 h-4 text-matcha-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                Tolok Ukur Data Lapangan Aktual
                            </div>
                            <p class="text-slate-500">
                                Berdasarkan evaluasi 48 cluster demplot kemitraan tani di Jawa Timur, Jawa Barat, dan Lampung periode 2025-2026.
                            </p>
                        </div>
                    </div>

                    <!-- Simulator Inputs & Output Box -->
                    <div class="lg:col-span-7 card-froth rounded-3xl p-8 border-2 border-matcha-300 space-y-8">
                        
                        <div class="space-y-6">
                            <!-- Slider 1: Luas Lahan -->
                            <div>
                                <div class="flex justify-between items-center text-xs font-mono mb-2">
                                    <label for="sim-land" class="text-slate-700 font-bold">Luas Lahan Pertanian (Hektar):</label>
                                    <span class="text-matcha-800 font-bold text-sm" id="lbl-land">15 Hektar</span>
                                </div>
                                <input type="range" id="sim-land" min="1" max="100" step="1" value="15" oninput="runSimulator()"
                                    class="w-full h-2 bg-matcha-200 rounded-lg appearance-none cursor-pointer accent-matcha-600">
                            </div>

                            <!-- Crop Type Selector -->
                            <div>
                                <label class="block text-xs font-mono font-bold text-slate-700 mb-2">Komoditas Utama Lahan:</label>
                                <div class="grid grid-cols-4 gap-2">
                                    <button onclick="setCrop('padi')" id="btn-crop-padi" class="py-2 text-xs font-display font-bold rounded-xl bg-matcha-600 text-white transition">Padi Sawah</button>
                                    <button onclick="setCrop('jagung')" id="btn-crop-jagung" class="py-2 text-xs font-display font-bold rounded-xl bg-latte-100 text-slate-700 hover:bg-latte-200 transition">Jagung</button>
                                    <button onclick="setCrop('kopi')" id="btn-crop-kopi" class="py-2 text-xs font-display font-bold rounded-xl bg-latte-100 text-slate-700 hover:bg-latte-200 transition">Kopi / Kakao</button>
                                    <button onclick="setCrop('sayur')" id="btn-crop-sayur" class="py-2 text-xs font-display font-bold rounded-xl bg-latte-100 text-slate-700 hover:bg-latte-200 transition">Hortikultura</button>
                                </div>
                            </div>
                        </div>

                        <!-- Computed Outputs -->
                        <div class="p-6 rounded-2xl bg-white border border-matcha-200 grid sm:grid-cols-3 gap-4 text-center">
                            <div>
                                <span class="text-[10px] font-mono text-slate-400 uppercase block">Waktu Olah Lahan</span>
                                <span class="font-display font-extrabold text-2xl text-matcha-700 mt-1 block" id="out-days">3 Hari</span>
                                <span class="text-[10px] text-slate-400">vs 18 Hari Tradisional</span>
                            </div>
                            <div>
                                <span class="text-[10px] font-mono text-slate-400 uppercase block">Hemat Biaya Operasional</span>
                                <span class="font-display font-extrabold text-2xl text-crema-gold mt-1 block" id="out-saving">Rp 22,5 Jt</span>
                                <span class="text-[10px] text-slate-400">per musim tanam</span>
                            </div>
                            <div>
                                <span class="text-[10px] font-mono text-slate-400 uppercase block">Potensi Tambah Hasil</span>
                                <span class="font-display font-extrabold text-2xl text-matcha-800 mt-1 block" id="out-yield">+24%</span>
                                <span class="text-[10px] text-slate-400">losses gabah berkurang</span>
                            </div>
                        </div>

                        <div class="text-center pt-2">
                            <a href="#trial" class="inline-flex items-center gap-2 px-6 py-3 rounded-2xl font-display font-bold text-xs uppercase tracking-wider text-white bg-matcha-700 hover:bg-matcha-800 transition">
                                Konsultasikan Blueprint Lahan Ini &rarr;
                            </a>
                        </div>

                    </div>
                </div>

            </div>
        </section>

        <!-- CREATIVE FINANCING & SHARING PACKAGES -->
        <section id="paket" class="py-24 relative">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                
                <div class="text-center max-w-2xl mx-auto mb-16 space-y-3">
                    <span class="text-matcha-700 font-mono text-xs uppercase tracking-widest font-bold">
                        FLEXIBLE OWNERSHIP MODELS
                    </span>
                    <h2 class="font-display font-extrabold text-3xl sm:text-4xl text-matcha-950">
                        Skema Kepemilikan &amp; Kemitraan Mesin
                    </h2>
                    <p class="text-slate-600 text-sm">
                        Mekanisme pembiayaan fleksibel yang diselaraskan dengan siklus panen tanpa membebani arus kas kelompok tani.
                    </p>
                </div>

                <div class="grid lg:grid-cols-3 gap-8">
                    
                    <!-- Plan 1 -->
                    <div class="card-froth rounded-3xl p-8 border border-matcha-200 flex flex-col justify-between space-y-8">
                        <div class="space-y-4">
                            <span class="px-3 py-1 rounded-full bg-latte-200 text-latte-900 text-xs font-mono font-bold">
                                KELOMPOK TANI &amp; KUD
                            </span>
                            <h3 class="font-display font-extrabold text-2xl text-matcha-950">Matcha Seedling</h3>
                            <p class="text-xs text-slate-600 leading-relaxed">
                                Paket pengadaan traktor kompak dan sprayer semi-otomatis dengan skema angsuran musiman (Bayar Setelah Panen).
                            </p>
                            <div class="pt-4 border-t border-matcha-100">
                                <span class="text-3xl font-extrabold text-matcha-900">Rp 12.500.000</span>
                                <span class="text-xs text-slate-500 block font-mono mt-1">/ angsuran panen (DP mulai 15%)</span>
                            </div>
                            <ul class="space-y-2.5 text-xs font-sans text-slate-600 pt-2">
                                <li class="flex items-center gap-2"><span class="text-matcha-600 font-bold">&check;</span> 1 Unit Traktor 45HP + Implemen Rotary</li>
                                <li class="flex items-center gap-2"><span class="text-matcha-600 font-bold">&check;</span> Free Training 2 Operator Lahan</li>
                                <li class="flex items-center gap-2"><span class="text-matcha-600 font-bold">&check;</span> Garansi Suku Cadang 1 Tahun Penuh</li>
                                <li class="flex items-center gap-2"><span class="text-matcha-600 font-bold">&check;</span> Kunjungan Teknisi Rutin Pra-Tanam</li>
                            </ul>
                        </div>
                        <a href="https://wa.me/6281234567890?text=Halo%20MatchaAgro,%20saya%20tertarik%20dengan%20Skema%20Matcha%20Seedling" target="_blank" rel="noopener noreferrer" class="block w-full py-3 rounded-2xl text-center font-display font-bold text-xs uppercase tracking-wider bg-white hover:bg-latte-100 text-matcha-900 border border-matcha-300 transition">
                            Pilih Skema Seedling
                        </a>
                    </div>

                    <!-- Plan 2: Featured -->
                    <div class="card-froth rounded-3xl p-8 border-2 border-matcha-600 relative flex flex-col justify-between space-y-8 shadow-xl bg-white">
                        <div class="absolute -top-3.5 left-1/2 -translate-x-1/2 px-4 py-1 rounded-full bg-gradient-to-r from-matcha-600 to-matcha-700 text-white font-mono text-[10px] font-bold uppercase tracking-wider">
                            PILIHAN FAVORIT MITRA
                        </div>
                        <div class="space-y-4">
                            <span class="px-3 py-1 rounded-full bg-matcha-100 text-matcha-800 text-xs font-mono font-bold">
                                PERKEBUNAN &amp; AGRIBISNIS
                            </span>
                            <h3 class="font-display font-extrabold text-2xl text-matcha-950">Verdant Harvest Pro</h3>
                            <p class="text-xs text-slate-600 leading-relaxed">
                                Paket komplit traktor menengah 75HP, combine harvester hemat losses, serta drone penyemprot 25 liter terintegrasi sensorik.
                            </p>
                            <div class="pt-4 border-t border-matcha-100">
                                <span class="text-3xl font-extrabold text-matcha-700">Rp 28.000.000</span>
                                <span class="text-xs text-slate-500 block font-mono mt-1">/ angsuran panen (Leasing BUMN/Bank)</span>
                            </div>
                            <ul class="space-y-2.5 text-xs font-sans text-slate-700 pt-2 font-medium">
                                <li class="flex items-center gap-2"><span class="text-matcha-600 font-bold">&check;</span> 1 Unit Traktor 75HP 4WD Kabin AC</li>
                                <li class="flex items-center gap-2"><span class="text-matcha-600 font-bold">&check;</span> 1 Unit Combine Harvester CH-80</li>
                                <li class="flex items-center gap-2"><span class="text-matcha-600 font-bold">&check;</span> 1 Unit HexaDrone 25L + Lisensi Pilot</li>
                                <li class="flex items-center gap-2"><span class="text-matcha-600 font-bold">&check;</span> Layanan Darurat Mobil Servis 24 Jam</li>
                                <li class="flex items-center gap-2"><span class="text-matcha-600 font-bold">&check;</span> Garansi Mesin 2 Tahun + Free Oli 3x</li>
                            </ul>
                        </div>
                        <a href="https://wa.me/6281234567890?text=Halo%20MatchaAgro,%20saya%20ingin%20berdiskusi%20tentang%20Paket%20Verdant%20Harvest%20Pro" target="_blank" rel="noopener noreferrer" class="block w-full py-3.5 rounded-2xl text-center font-display font-bold text-xs uppercase tracking-wider text-white bg-gradient-to-r from-matcha-600 to-matcha-800 hover:from-matcha-700 hover:to-matcha-900 transition shadow-md shadow-matcha-800/25">
                            Konsultasikan Paket Ini
                        </a>
                    </div>

                    <!-- Plan 3 -->
                    <div class="card-froth rounded-3xl p-8 border border-matcha-200 flex flex-col justify-between space-y-8">
                        <div class="space-y-4">
                            <span class="px-3 py-1 rounded-full bg-latte-200 text-latte-900 text-xs font-mono font-bold">
                                ENTERPRISE &amp; HOLDING
                            </span>
                            <h3 class="font-display font-extrabold text-2xl text-matcha-950">Sovereign Agro Fleet</h3>
                            <p class="text-xs text-slate-600 leading-relaxed">
                                Pengadaan armada terintegrasi multi-komoditas dengan sistem dashboard telemetri central, suku cadang on-site, dan dedicated mekanik.
                            </p>
                            <div class="pt-4 border-t border-matcha-100">
                                <span class="text-3xl font-extrabold text-matcha-950">Kustom</span>
                                <span class="text-xs text-slate-500 block font-mono mt-1">/ disesuaikan luas wilayah kebun</span>
                            </div>
                            <ul class="space-y-2.5 text-xs font-sans text-slate-600 pt-2">
                                <li class="flex items-center gap-2"><span class="text-matcha-600 font-bold">&check;</span> Armada Traktor &amp; Harvester Skala Besar</li>
                                <li class="flex items-center gap-2"><span class="text-matcha-600 font-bold">&check;</span> Sistem Sensorik IoT Lahan Lengkap</li>
                                <li class="flex items-center gap-2"><span class="text-matcha-600 font-bold">&check;</span> Depot Suku Cadang Khusus di Lokasi Kebun</li>
                                <li class="flex items-center gap-2"><span class="text-matcha-600 font-bold">&check;</span> Tim Mekanik Tetap Ditempatkan di Lahan</li>
                            </ul>
                        </div>
                        <a href="https://wa.me/6281234567890?text=Halo%20MatchaAgro,%20kami%20memerlukan%20solusi%20armada%20Sovereign%20Agro%20Fleet" target="_blank" rel="noopener noreferrer" class="block w-full py-3 rounded-2xl text-center font-display font-bold text-xs uppercase tracking-wider bg-white hover:bg-latte-100 text-matcha-900 border border-matcha-300 transition">
                            Hubungi Tim Korporat
                        </a>
                    </div>

                </div>

            </div>
        </section>

        <!-- ACCORDION FAQ -->
        <section id="faq" class="py-24 matcha-gradient">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
                
                <div class="text-center space-y-3">
                    <span class="text-matcha-700 font-mono text-xs uppercase tracking-widest font-bold">
                        FREQUENTLY ASKED QUESTIONS
                    </span>
                    <h2 class="font-display font-extrabold text-3xl sm:text-4xl text-matcha-950">
                        Pertanyaan Seputar Operasional &amp; Servis
                    </h2>
                </div>

                <div class="space-y-4">
                    
                    <div class="card-froth rounded-2xl border border-matcha-200 overflow-hidden">
                        <button onclick="toggleFaq(1)" class="w-full p-6 text-left flex justify-between items-center hover:bg-matcha-50 transition">
                            <span class="font-display font-bold text-sm sm:text-base text-matcha-950">Apakah traktor mini 4WD cocok untuk sawah lumpur dalam?</span>
                            <span id="faq-ico-1" class="text-matcha-700 font-mono text-lg font-bold transition">+</span>
                        </button>
                        <div id="faq-ans-1" class="hidden px-6 pb-6 text-xs sm:text-sm text-slate-600 leading-relaxed border-t border-matcha-100 pt-4">
                            Sangat cocok. Traktor seri MatchaCraft T-45 dirancang dengan rasio bobot ringan dan roda ban tapak sawah (paddy tire) berprofil tinggi sehingga tidak mudah amblas bahkan di kedalaman lumpur hingga 40 cm.
                        </div>
                    </div>

                    <div class="card-froth rounded-2xl border border-matcha-200 overflow-hidden">
                        <button onclick="toggleFaq(2)" class="w-full p-6 text-left flex justify-between items-center hover:bg-matcha-50 transition">
                            <span class="font-display font-bold text-sm sm:text-base text-matcha-950">Bagaimana jika drone penyemprot mengalami kerusakan saat di lahan?</span>
                            <span id="faq-ico-2" class="text-matcha-700 font-mono text-lg font-bold transition">+</span>
                        </button>
                        <div id="faq-ans-2" class="hidden px-6 pb-6 text-xs sm:text-sm text-slate-600 leading-relaxed border-t border-matcha-100 pt-4">
                            Setiap pembelian unit drone MatchaFlyer dilengkapi garansi servis cepat dan unit cadangan (swap unit) jika perbaikan memakan waktu lebih dari 48 jam. Tim teknisi kami tersebar di hub regional untuk penanganan langsung di lapangan.
                        </div>
                    </div>

                    <div class="card-froth rounded-2xl border border-matcha-200 overflow-hidden">
                        <button onclick="toggleFaq(3)" class="w-full p-6 text-left flex justify-between items-center hover:bg-matcha-50 transition">
                            <span class="font-display font-bold text-sm sm:text-base text-matcha-950">Apakah disediakan pelatihan hingga operator kami mahir?</span>
                            <span id="faq-ico-3" class="text-matcha-700 font-mono text-lg font-bold transition">+</span>
                        </button>
                        <div id="faq-ans-3" class="hidden px-6 pb-6 text-xs sm:text-sm text-slate-600 leading-relaxed border-t border-matcha-100 pt-4">
                            Ya, gratis. Tim instruktur kami akan tinggal selama 2-3 hari di lokasi perkebunan/desa Anda untuk memberikan pelatihan teori, keselamatan kerja, perawatan berkala harian, serta uji praktik lapangan bagi calon operator.
                        </div>
                    </div>

                    <div class="card-froth rounded-2xl border border-matcha-200 overflow-hidden">
                        <button onclick="toggleFaq(4)" class="w-full p-6 text-left flex justify-between items-center hover:bg-matcha-50 transition">
                            <span class="font-display font-bold text-sm sm:text-base text-matcha-950">Apakah pembayaran bisa dicicil mengikuti siklus panen padi/jagung?</span>
                            <span id="faq-ico-4" class="text-matcha-700 font-mono text-lg font-bold transition">+</span>
                        </button>
                        <div id="faq-ans-4" class="hidden px-6 pb-6 text-xs sm:text-sm text-slate-600 leading-relaxed border-t border-matcha-100 pt-4">
                            Bisa. Kami bekerjasama dengan lembaga pembiayaan mikro syariah dan perbankan BUMN untuk menyediakan skema Yarnen (Bayar Panen), di mana angsuran dibayarkan 1 kali per siklus panen (setiap 3-4 bulan).
                        </div>
                    </div>

                </div>

            </div>
        </section>

        <!-- BOOKING DEMO & CONSULTATION FORM -->
        <section id="trial" class="py-24 relative bg-latte-100/60 border-t border-matcha-200/60">
            <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
                
                <div class="bg-matcha-900 rounded-3xl p-8 sm:p-12 text-latte-50 shadow-2xl relative overflow-hidden">
                    <div class="grid lg:grid-cols-12 gap-8 items-center">
                        
                        <div class="lg:col-span-6 space-y-4">
                            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-matcha-800 text-matcha-300 text-xs font-mono font-bold">
                                DEMO UNIT ON-SITE DI LAHAN ANDA
                            </div>
                            <h2 class="font-display font-extrabold text-3xl sm:text-4xl text-white">
                                Saksikan Kekuatan Mesin Langsung di Tanah Anda.
                            </h2>
                            <p class="text-latte-200 text-xs sm:text-sm leading-relaxed">
                                Daftarkan kelompok tani atau perkebunan Anda untuk uji demo operasional traktor, harvester, atau drone tanpa biaya sepeser pun.
                            </p>
                            <div class="space-y-2 text-xs font-mono text-matcha-300 pt-2">
                                <div class="flex items-center gap-2">&check; Pengantaran unit demo gratis ke lokasi lahan</div>
                                <div class="flex items-center gap-2">&check; Didampingi instruktur teknis bersertifikat</div>
                                <div class="flex items-center gap-2">&check; Simulasi analisis hemat biaya sebelum membeli</div>
                            </div>
                        </div>

                        <div class="lg:col-span-6 bg-white rounded-2xl p-6 text-slate-800 space-y-4">
                            <form id="trialForm" onsubmit="submitTrialForm(event)" class="space-y-3 font-sans">
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 mb-1">Nama Lengkap &amp; Peran</label>
                                    <input type="text" required placeholder="Contoh: Pak Supriyadi (Ketua Gapoktan)"
                                        class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-matcha-200 text-xs text-slate-900 focus:outline-none focus:border-matcha-600">
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 mb-1">Nama Kelompok Tani / Usaha / Perusahaan</label>
                                    <input type="text" required placeholder="Gapoktan Tani Makmur / PT Agro Hijau"
                                        class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-matcha-200 text-xs text-slate-900 focus:outline-none focus:border-matcha-600">
                                </div>
                                <div class="grid grid-cols-2 gap-3">
                                    <div>
                                        <label class="block text-xs font-bold text-slate-700 mb-1">Nomor WhatsApp</label>
                                        <input type="tel" required placeholder="081234567890"
                                            class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-matcha-200 text-xs text-slate-900 focus:outline-none focus:border-matcha-600">
                                    </div>
                                    <div>
                                        <label class="block text-xs font-bold text-slate-700 mb-1">Lokasi Lahan (Kab/Kota)</label>
                                        <input type="text" required placeholder="Contoh: Subang / Malang"
                                            class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-matcha-200 text-xs text-slate-900 focus:outline-none focus:border-matcha-600">
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 mb-1">Unit Mesin yang Ingin Dicoba</label>
                                    <select class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-matcha-200 text-xs text-slate-900 focus:outline-none focus:border-matcha-600">
                                        <option value="tractor-mini">MatchaCraft T-45 Mini 4WD (Sawah/Kebun)</option>
                                        <option value="tractor-heavy">MatchaCraft T-75 Heavy Tiller (Lahan Kering)</option>
                                        <option value="drone">MatchaFlyer HexaDrone 25L Sprayer</option>
                                        <option value="harvester">MatchaHarvest Compact Combine Harvester</option>
                                        <option value="dryer">Solar Hybrid Grain &amp; Coffee Dryer</option>
                                    </select>
                                </div>
                                <button type="submit" class="w-full py-3 rounded-xl font-display font-bold text-xs uppercase tracking-wider text-white bg-matcha-600 hover:bg-matcha-700 transition shadow-md shadow-matcha-800/20">
                                    Daftarkan Jadwal Demo Lapangan
                                </button>
                            </form>
                            <div id="trial-success" class="hidden p-3 rounded-xl bg-matcha-100 border border-matcha-300 text-matcha-900 text-xs font-mono text-center">
                                Terima kasih! Tim koordinator wilayah MatchaAgro akan menghubungi WhatsApp Anda dalam 3 jam kerja untuk konfirmasi jadwal.
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </section>

    </main>

    <!-- FOOTER -->
    <footer class="bg-matcha-950 text-latte-200 text-xs py-14 border-t border-matcha-800 relative z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-5 gap-8 pb-10 border-b border-matcha-800">
                
                <div class="col-span-2 space-y-4">
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 rounded-xl bg-matcha-600 flex items-center justify-center text-white font-bold font-display">
                            MA
                        </div>
                        <span class="font-display font-extrabold text-lg text-white">MatchaAgro Machinery</span>
                    </div>
                    <p class="text-xs text-latte-300 max-w-sm leading-relaxed">
                        Inovasi mekanisasi pertanian cerdas, ramah lingkungan, dan terjangkau untuk mewujudkan kedaulatan pangan nusantara.
                    </p>
                    <div class="text-[11px] font-mono text-matcha-300">
                        Pusat Workshop &amp; R&amp;D: Kawasan Agroteknologi Lembang, Jawa Barat.
                    </div>
                </div>

                <div>
                    <h4 class="font-display font-bold text-white text-sm mb-3">Armada Mesin</h4>
                    <ul class="space-y-2">
                        <li><a href="#armada" class="hover:text-white transition">Traktor Kompak 4WD</a></li>
                        <li><a href="#armada" class="hover:text-white transition">Drone Sprayer &amp; Sensor</a></li>
                        <li><a href="#armada" class="hover:text-white transition">Combine Harvester</a></li>
                        <li><a href="#armada" class="hover:text-white transition">Solar Hybrid Dryer</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-display font-bold text-white text-sm mb-3">Kemitraan</h4>
                    <ul class="space-y-2">
                        <li><a href="#paket" class="hover:text-white transition">Skema Bayar Panen</a></li>
                        <li><a href="#paket" class="hover:text-white transition">Kemitraan Koperasi Desa</a></li>
                        <li><a href="#trial" class="hover:text-white transition">Permintaan Uji Demo</a></li>
                        <li><a href="#simulator" class="hover:text-white transition">Simulator Lahan</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-display font-bold text-white text-sm mb-3">Legal &amp; Trust</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-white transition">Sertifikasi Standar SNI</a></li>
                        <li><a href="#" class="hover:text-white transition">Uji UPT Mekanisasi Kementan</a></li>
                        <li><a href="#" class="hover:text-white transition">Garansi Resmi 2 Tahun</a></li>
                        <li><a href="#" class="hover:text-white transition">Kebijakan Privasi Data</a></li>
                    </ul>
                </div>

            </div>

            <div class="pt-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-[11px] text-latte-400">
                <p>&copy; 2026 MatchaAgro Machinery Studio. Seluruh hak cipta dilindungi undang-undang.</p>
                <div class="flex items-center gap-4 text-matcha-300 font-mono">
                    <span>Matcha Latte Edition</span>
                    <span>&bull;</span>
                    <span>Webia Ecosystem</span>
                </div>
            </div>
        </div>
    </footer>

    <!-- FLOATING WHATSAPP BUTTON -->
    <a href="https://wa.me/6281234567890?text=Halo%20MatchaAgro%20Machinery,%20saya%20tertarik%20dengan%20katalog%20alat%20pertanian%20kreatif%20ini"
       target="_blank" rel="noopener noreferrer"
       class="fixed bottom-6 right-6 z-50 p-3.5 rounded-2xl bg-emerald-600 hover:bg-emerald-500 text-white shadow-xl hover:scale-105 transition-all flex items-center gap-2 group"
       title="Konsultasi WhatsApp">
        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
            <path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0012.04 2m.01 1.67c2.2 0 4.26.86 5.82 2.42a8.225 8.225 0 012.41 5.83c0 4.54-3.7 8.24-8.24 8.24-1.48 0-2.93-.4-4.2-1.15l-.3-.18-3.12.82.83-3.04-.2-.31a8.196 8.196 0 01-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24m4.52 11.66c-.25-.13-1.47-.72-1.7-.81-.23-.08-.39-.13-.56.13-.17.25-.64.81-.79.97-.14.17-.29.19-.54.06-.25-.13-1.06-.39-2.01-1.24-.74-.66-1.24-1.48-1.39-1.73-.14-.25-.02-.39.11-.51.11-.11.25-.29.37-.43.13-.15.17-.25.25-.42.08-.17.04-.31-.02-.44-.06-.13-.56-1.34-.76-1.84-.2-.49-.4-.42-.56-.43h-.48c-.17 0-.44.06-.67.31-.23.25-.88.86-.88 2.1 0 1.24.9 2.44 1.03 2.61.13.17 1.77 2.71 4.3 3.8 2.52 1.09 2.52.73 2.98.69.45-.05 1.47-.6 1.68-1.18.21-.58.21-1.07.15-1.18-.07-.12-.23-.19-.48-.32z"/>
        </svg>
        <span class="max-w-0 overflow-hidden whitespace-nowrap group-hover:max-w-xs transition-all duration-300 font-mono text-xs font-bold pr-1">
            WhatsApp Konsultan
        </span>
    </a>

    <!-- FLOATING MATCHA AGRO AI MODAL -->
    <div id="matcha-ai-modal" class="fixed inset-0 z-50 bg-black/60 backdrop-blur-sm hidden items-center justify-center p-4">
        <div class="card-froth w-full max-w-lg rounded-3xl border border-matcha-400 p-6 space-y-4 shadow-2xl bg-white/95">
            <div class="flex items-center justify-between pb-3 border-b border-matcha-200">
                <div class="flex items-center gap-2">
                    <div class="w-3 h-3 rounded-full bg-matcha-500 animate-ping"></div>
                    <span class="font-display font-bold text-matcha-950 text-sm">MatchaAgro Smart Assistant</span>
                    <span class="text-[10px] font-mono px-2 py-0.5 rounded bg-matcha-100 text-matcha-800 font-bold">Online</span>
                </div>
                <button onclick="closeMatchaAI()" class="text-slate-400 hover:text-slate-800 p-1">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>

            <div class="h-64 overflow-y-auto space-y-3 p-3 rounded-2xl bg-latte-50 border border-matcha-100 text-xs font-sans" id="chat-stream">
                <div class="p-3 rounded-xl bg-matcha-100 border border-matcha-200 text-matcha-950">
                    <strong>MatchaAgro AI:</strong> Halo! Saya dapat membantu menghitung rekomendasi traktor untuk jenis tanah Anda, estimasi penghematan bahan bakar, atau mendaftarkan jadwal demo mesin di desa/kebun Anda.
                </div>
            </div>

            <!-- Quick presets -->
            <div class="flex flex-wrap gap-1.5 pt-1">
                <button onclick="askPreset('Traktor apa yang cocok untuk sawah terasering?')" class="text-[11px] font-mono px-2.5 py-1 rounded-lg bg-latte-100 hover:bg-latte-200 text-matcha-900 border border-matcha-200">
                    Sawah Terasering?
                </button>
                <button onclick="askPreset('Berapa biaya sewa/angsuran panen drone?')" class="text-[11px] font-mono px-2.5 py-1 rounded-lg bg-latte-100 hover:bg-latte-200 text-matcha-900 border border-matcha-200">
                    Skema Bayar Panen?
                </button>
                <button onclick="askPreset('Saya ingin mendaftar demo unit di lahan')" class="text-[11px] font-mono px-2.5 py-1 rounded-lg bg-matcha-600 text-white font-bold">
                    Demo Unit Lahan
                </button>
            </div>

            <div class="flex gap-2">
                <input type="text" id="ai-input" placeholder="Tanyakan seputar mesin &amp; lahan..."
                    class="flex-1 px-4 py-2 rounded-xl bg-latte-50 border border-matcha-300 text-slate-800 placeholder-slate-400 text-xs focus:outline-none focus:border-matcha-600">
                <button onclick="sendChatMessage()" class="px-4 py-2 rounded-xl bg-matcha-600 hover:bg-matcha-700 text-white font-bold text-xs font-display">
                    Kirim
                </button>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT LOGIC -->
    <script>
        function toggleMobileMenu() {
            const m = document.getElementById('mobile-menu');
            m.classList.toggle('hidden');
        }

        // Hero Model Switcher
        const models = {
            tractor: {
                title: 'MatchaCraft T-45 Mini 4WD',
                sub: 'Traktor Kompak Lahan Sawah & Kebun Organik',
                badge: 'Eco-Diesel 45 HP',
                s1: '2.4 Liter / Hektar',
                s2: '2.1 Meter (Terasering)',
                s3: '18.5 kPa (Zero Hardpan)',
                s4: 'GPS + Telemetri HP'
            },
            drone: {
                title: 'MatchaFlyer HexaDrone 25L',
                sub: 'Drone Semprot Atomisasi Mikro & Penabur Benih',
                badge: 'Kapasitas 25L',
                s1: '0.8 Liter / Ha (Mikro-Kabut)',
                s2: '12 Menit / Hektar',
                s3: 'Radar 360° Omnidirectional',
                s4: 'Auto RTH Saat Baterai 20%'
            },
            harvester: {
                title: 'MatchaHarvest Compact CH-80',
                sub: 'Pemanen Padi Lincah Petak Kecil losses < 1%',
                badge: 'Header 1.8M',
                s1: '4.2 Liter / Hektar',
                s2: '2.5 Jam / Hektar Panen',
                s3: '950 Kg Tangki Gabah',
                s4: 'Perontok Ganda Bersih'
            }
        };

        function switchHeroModel(type) {
            ['tractor', 'drone', 'harvester'].forEach(m => {
                const b = document.getElementById('btn-hero-' + m);
                if (m === type) {
                    b.className = 'py-2 rounded-lg text-xs font-display font-bold bg-matcha-600 text-white transition';
                } else {
                    b.className = 'py-2 rounded-lg text-xs font-display font-bold text-slate-700 hover:bg-latte-200 transition';
                }
            });

            const d = models[type];
            document.getElementById('hero-model-title').innerText = d.title;
            document.getElementById('hero-model-sub').innerText = d.sub;
            document.getElementById('hero-model-badge').innerText = d.badge;
            document.getElementById('hero-spec-1').innerText = d.s1;
            document.getElementById('hero-spec-2').innerText = d.s2;
            document.getElementById('hero-spec-3').innerText = d.s3;
            document.getElementById('hero-spec-4').innerText = d.s4;
        }

        // Filter Catalog
        function filterCatalog(cat) {
            ['all', 'tractor', 'drone', 'harvest'].forEach(t => {
                const btn = document.getElementById('tab-' + t);
                if (t === cat) {
                    btn.className = 'px-5 py-2.5 rounded-xl font-display font-bold text-xs uppercase tracking-wider bg-matcha-700 text-white transition shadow-sm';
                } else {
                    btn.className = 'px-5 py-2.5 rounded-xl font-display font-bold text-xs uppercase tracking-wider bg-white text-slate-700 border border-matcha-200 hover:bg-matcha-50 transition';
                }
            });

            const cards = document.querySelectorAll('[data-cat]');
            cards.forEach(card => {
                if (cat === 'all' || card.getAttribute('data-cat') === cat) {
                    card.classList.remove('hidden');
                } else {
                    card.classList.add('hidden');
                }
            });
        }

        // Simulator
        let currentCrop = 'padi';

        function setCrop(crop) {
            currentCrop = crop;
            ['padi', 'jagung', 'kopi', 'sayur'].forEach(c => {
                const btn = document.getElementById('btn-crop-' + c);
                if (c === crop) {
                    btn.className = 'py-2 text-xs font-display font-bold rounded-xl bg-matcha-600 text-white transition';
                } else {
                    btn.className = 'py-2 text-xs font-display font-bold rounded-xl bg-latte-100 text-slate-700 hover:bg-latte-200 transition';
                }
            });
            runSimulator();
        }

        function runSimulator() {
            const ha = parseInt(document.getElementById('sim-land').value);
            document.getElementById('lbl-land').innerText = ha + ' Hektar';

            // Days calculation
            const speedPerHa = currentCrop === 'padi' ? 0.2 : (currentCrop === 'jagung' ? 0.18 : 0.25);
            const days = Math.max(1, Math.round(ha * speedPerHa));
            const savingsMillions = Math.round(ha * 1.5);
            const yieldBoost = currentCrop === 'padi' ? 24 : (currentCrop === 'jagung' ? 22 : 18);

            document.getElementById('out-days').innerText = days + ' Hari';
            document.getElementById('out-saving').innerText = 'Rp ' + savingsMillions + ' Jt';
            document.getElementById('out-yield').innerText = '+' + yieldBoost + '%';
        }

        // FAQ Toggle
        function toggleFaq(idx) {
            const ans = document.getElementById('faq-ans-' + idx);
            const ico = document.getElementById('faq-ico-' + idx);
            if (ans.classList.contains('hidden')) {
                ans.classList.remove('hidden');
                ico.innerText = '−';
            } else {
                ans.classList.add('hidden');
                ico.innerText = '+';
            }
        }

        // Matcha AI Modal
        function openMatchaAI() {
            document.getElementById('matcha-ai-modal').classList.remove('hidden');
            document.getElementById('matcha-ai-modal').classList.add('flex');
        }

        function closeMatchaAI() {
            document.getElementById('matcha-ai-modal').classList.add('hidden');
            document.getElementById('matcha-ai-modal').classList.remove('flex');
        }

        function askPreset(txt) {
            document.getElementById('ai-input').value = txt;
            sendChatMessage();
        }

        function sendChatMessage() {
            const input = document.getElementById('ai-input');
            const stream = document.getElementById('chat-stream');
            const val = input.value.trim();
            if (!val) return;

            const u = document.createElement('div');
            u.className = 'p-3 rounded-xl bg-latte-100 border border-matcha-200 text-right text-slate-900';
            u.innerHTML = '<strong>Anda:</strong> ' + val;
            stream.appendChild(u);

            input.value = '';
            stream.scrollTop = stream.scrollHeight;

            setTimeout(() => {
                let ans = 'Tim spesialis mekanisasi MatchaAgro siap membantu konsultasi unit terbaik untuk lahan Anda. Silakan isi form uji demo atau hubungi konsultan kami via WhatsApp.';
                const low = val.toLowerCase();
                if (low.includes('terasering') || low.includes('sawah')) {
                    ans = 'Untuk sawah terasering, kami sarankan MatchaCraft T-45 Mini 4WD dengan radius putar 2.1m dan bobot ringan anti-amblas, sangat stabil di pematang sawah.';
                } else if (low.includes('bayar') || low.includes('angsuran') || low.includes('panen')) {
                    ans = 'Skema Yarnen (Bayar Setelah Panen) memungkinkan kelompok tani mencicil setiap 3-4 bulan pasca panen gabah/jagung dengan bunga rendah bermitra bersama bank BUMN.';
                } else if (low.includes('demo')) {
                    ans = 'Demo unit lapangan gratis! Cukup tentukan lokasi kabupaten dan komoditas Anda melalui formulir di bawah, koordinator wilayah kami akan mengatur jadwal.';
                }

                const b = document.createElement('div');
                b.className = 'p-3 rounded-xl bg-matcha-100 border border-matcha-200 text-matcha-950';
                b.innerHTML = '<strong>MatchaAgro AI:</strong> ' + ans;
                stream.appendChild(b);
                stream.scrollTop = stream.scrollHeight;
            }, 500);
        }

        function submitTrialForm(e) {
            e.preventDefault();
            document.getElementById('trialForm').classList.add('opacity-50', 'pointer-events-none');
            setTimeout(() => {
                document.getElementById('trial-success').classList.remove('hidden');
            }, 400);
        }
    </script>

</body>
</html>
