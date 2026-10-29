<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AuraMetrics Studio — Data Analytics Luxury Pastel Mix</title>
    <meta name="description" content="AuraMetrics Studio adalah konsultan analitik data enterprise bergaya Luxury dengan palet Pastel Mix. Hadirkan dashboard eksekutif, predictive AI, lakehouse modern, dan arsitektur analitik bernilai tinggi.">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Playfair+Display:ital,wght@0,500;0,600;0,700;0,800;1,500;1,600&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                        serif: ['"Playfair Display"', 'serif'],
                        mono: ['"JetBrains Mono"', 'monospace'],
                    },
                    colors: {
                        pastel: {
                            lavender: {
                                50:  '#faf5ff',
                                100: '#f3e8ff',
                                200: '#e9d5ff',
                                300: '#d8b4fe',
                                400: '#c084fc',
                                500: '#a855f7',
                                600: '#9333ea',
                            },
                            rose: {
                                50:  '#fdf2f8',
                                100: '#fce7f3',
                                200: '#fbcfe8',
                                300: '#f9a8d4',
                                400: '#f472b6',
                                500: '#ec4899',
                            },
                            mint: {
                                50:  '#f0fdf4',
                                100: '#dcfce7',
                                200: '#bbf7d0',
                                300: '#86efac',
                                400: '#4ade80',
                                500: '#22c55e',
                            },
                            sky: {
                                50:  '#f0f9ff',
                                100: '#e0f2fe',
                                200: '#bae6fd',
                                300: '#7dd3fc',
                                400: '#38bdf8',
                                500: '#0ea5e9',
                            },
                            peach: {
                                50:  '#fffbeb',
                                100: '#fef3c7',
                                200: '#fde68a',
                                300: '#fcd34d',
                                400: '#fbbf24',
                                500: '#f59e0b',
                            },
                            pearl: '#faf8fc',
                        },
                        luxury: {
                            gold:   '#d4af37',
                            champagne: '#f5e6d3',
                            slate:  '#0f172a',
                            charcoal: '#1e293b',
                            glass:  'rgba(255, 255, 255, 0.85)',
                            border: '#ede9fe',
                        }
                    }
                }
            }
        }
    </script>

    <style>
        body {
            background: linear-gradient(180deg, #faf8fc 0%, #ffffff 40%, #fdf9fb 100%);
            color: #1e293b;
        }

        /* Luxury Pastel Glows */
        .glow-pastel {
            box-shadow: 0 16px 48px -12px rgba(168, 85, 247, 0.16);
        }

        .glow-rose {
            box-shadow: 0 16px 40px -10px rgba(236, 72, 153, 0.18);
        }

        .glow-mint {
            box-shadow: 0 16px 40px -10px rgba(34, 197, 94, 0.16);
        }

        .card-luxury {
            background: rgba(255, 255, 255, 0.88);
            backdrop-filter: blur(14px);
            border: 1px solid rgba(233, 213, 255, 0.8);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .card-luxury:hover {
            transform: translateY(-4px);
            border-color: rgba(192, 132, 252, 0.85);
            box-shadow: 0 20px 45px -15px rgba(168, 85, 247, 0.22);
        }

        /* Pastel Mix Gradient Text */
        .text-gradient-pastel {
            background: linear-gradient(135deg, #9333ea 0%, #ec4899 45%, #0284c7 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .text-gradient-gold {
            background: linear-gradient(135deg, #b45309 0%, #d97706 50%, #f59e0b 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Iridescent Pastel Badge */
        .badge-pastel-mix {
            background: linear-gradient(135deg, rgba(243, 232, 255, 0.9) 0%, rgba(252, 231, 243, 0.9) 50%, rgba(224, 242, 254, 0.9) 100%);
            border: 1px solid rgba(216, 180, 254, 0.7);
        }

        /* Button Luxury Pastel */
        .btn-luxury-primary {
            background: linear-gradient(135deg, #9333ea 0%, #c026d3 50%, #e11d48 100%);
            color: #ffffff;
            box-shadow: 0 8px 24px -4px rgba(147, 51, 234, 0.35);
            transition: all 0.25s ease;
        }

        .btn-luxury-primary:hover {
            background: linear-gradient(135deg, #7e22ce 0%, #a21caf 50%, #be123c 100%);
            box-shadow: 0 12px 30px -4px rgba(147, 51, 234, 0.5);
            transform: translateY(-1px);
        }

        .btn-luxury-secondary {
            background: rgba(255, 255, 255, 0.9);
            border: 1px solid rgba(216, 180, 254, 0.8);
            color: #581c87;
            transition: all 0.2s ease;
        }

        .btn-luxury-secondary:hover {
            background: #faf5ff;
            border-color: #a855f7;
            color: #3b0764;
            transform: translateY(-1px);
        }

        /* Navigation blur */
        .navbar-luxury {
            background: rgba(250, 248, 252, 0.92);
            backdrop-filter: blur(18px);
            border-bottom: 1px solid rgba(233, 213, 255, 0.75);
        }

        /* Delicate grid pattern */
        .grid-pattern-pastel {
            background-image:
                linear-gradient(to right, rgba(168, 85, 247, 0.05) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(236, 72, 153, 0.05) 1px, transparent 1px);
            background-size: 40px 40px;
        }
    </style>
</head>
<body class="font-sans antialiased selection:bg-pastel-lavender-200 selection:text-purple-950">

    {{-- ============================================================ --}}
    {{-- 1. TOP ANNOUNCEMENT BAR (LUXURY C-SUITE) --}}
    {{-- ============================================================ --}}
    <div class="bg-gradient-to-r from-pastel-lavender-100 via-pastel-rose-100 to-pastel-sky-100 border-b border-pastel-lavender-200/80 text-[11px] sm:text-xs text-purple-950 py-2 px-4 text-center font-medium tracking-wide">
        <span class="inline-flex items-center gap-2">
            <span class="px-2 py-0.5 rounded-full bg-white/80 text-purple-700 font-semibold border border-purple-200 text-[10px] uppercase tracking-wider">Executive Advisory</span>
            <span>✦ Layanan Analitik Data Mewah & Business Intelligence untuk Enterprise & Brand Skala Tinggi</span>
            <a href="#consultation" class="font-bold underline hover:text-purple-700 ml-1">Jadwalkan Sesi Konsultasi Private ↗</a>
        </span>
    </div>

    {{-- ============================================================ --}}
    {{-- 2. NAVIGATION BAR --}}
    {{-- ============================================================ --}}
    <header class="navbar-luxury sticky top-0 z-40 transition-all duration-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-8 py-3.5 flex items-center justify-between">
            <!-- Brand Logo -->
            <a href="#hero" class="flex items-center gap-3 group">
                <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-purple-600 via-pink-500 to-sky-400 p-[1.5px] shadow-sm group-hover:shadow-md transition">
                    <div class="w-full h-full bg-white rounded-[10px] flex items-center justify-center">
                        <span class="font-serif font-bold text-lg text-gradient-pastel">AM</span>
                    </div>
                </div>
                <div>
                    <span class="font-serif font-bold text-lg sm:text-xl text-neutral-900 tracking-tight block">AURAMETRICS</span>
                    <span class="text-[9px] font-mono tracking-widest text-purple-600 uppercase font-semibold block -mt-1">Studio · Data Analytics Luxury</span>
                </div>
            </a>

            <!-- Desktop Navigation -->
            <nav class="hidden lg:flex items-center gap-7 text-xs font-semibold text-neutral-700 tracking-wide">
                <a href="#overview" class="hover:text-purple-700 transition">Overview</a>
                <a href="#services" class="hover:text-purple-700 transition">Kapabilitas</a>
                <a href="#dashboard" class="hover:text-purple-700 transition">Executive Dashboard</a>
                <a href="#cases" class="hover:text-purple-700 transition">Studi Kasus</a>
                <a href="#calculator" class="hover:text-purple-700 transition flex items-center gap-1.5">
                    <span>Estimasi ROI</span>
                    <span class="px-1.5 py-0.5 rounded-full bg-pink-100 text-pink-700 text-[9px] font-bold">Interaktif</span>
                </a>
                <a href="#pricing" class="hover:text-purple-700 transition">Paket Investasi</a>
                <a href="#faq" class="hover:text-purple-700 transition">FAQ</a>
            </nav>

            <!-- CTA Button & Mobile Trigger -->
            <div class="flex items-center gap-3">
                <a href="#consultation" class="btn-luxury-primary text-xs font-bold px-4 sm:px-5 py-2.5 rounded-full tracking-wide hidden sm:inline-flex items-center gap-1.5">
                    <span>Konsultasi VIP</span>
                    <span>↗</span>
                </a>

                <button id="mobileMenuBtn" onclick="toggleMobileMenu()" class="lg:hidden p-2 text-neutral-700 hover:text-purple-700" aria-label="Toggle Menu">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu Dropdown -->
        <div id="mobileMenu" class="hidden lg:hidden border-t border-pastel-lavender-200 bg-white/95 px-6 py-5 space-y-3.5 text-xs font-semibold text-neutral-800">
            <a href="#overview" onclick="toggleMobileMenu()" class="block py-1 hover:text-purple-700">Overview</a>
            <a href="#services" onclick="toggleMobileMenu()" class="block py-1 hover:text-purple-700">Kapabilitas & Layanan</a>
            <a href="#dashboard" onclick="toggleMobileMenu()" class="block py-1 hover:text-purple-700">Executive Dashboard</a>
            <a href="#cases" onclick="toggleMobileMenu()" class="block py-1 hover:text-purple-700">Studi Kasus</a>
            <a href="#calculator" onclick="toggleMobileMenu()" class="block py-1 hover:text-purple-700">Estimasi ROI Proyek</a>
            <a href="#pricing" onclick="toggleMobileMenu()" class="block py-1 hover:text-purple-700">Paket Investasi</a>
            <a href="#faq" onclick="toggleMobileMenu()" class="block py-1 hover:text-purple-700">FAQ</a>
            <div class="pt-2">
                <a href="#consultation" onclick="toggleMobileMenu()" class="btn-luxury-primary w-full text-center block text-xs font-bold py-2.5 rounded-full">
                    Konsultasi VIP via WhatsApp
                </a>
            </div>
        </div>
    </header>

    <main>
        {{-- ============================================================ --}}
        {{-- 3. HERO SECTION (LUXURY PASTEL DATA ANALYTICS) --}}
        {{-- ============================================================ --}}
        <section id="hero" class="relative pt-12 sm:pt-20 pb-20 overflow-hidden grid-pattern-pastel">
            <!-- Ambient Pastel Orbs -->
            <div class="absolute top-10 left-1/4 w-96 h-96 rounded-full bg-pastel-lavender-300/30 blur-3xl -z-10 pointer-events-none"></div>
            <div class="absolute top-36 right-10 w-96 h-96 rounded-full bg-pastel-rose-300/25 blur-3xl -z-10 pointer-events-none"></div>
            <div class="absolute bottom-10 left-10 w-80 h-80 rounded-full bg-pastel-sky-300/25 blur-3xl -z-10 pointer-events-none"></div>
            <div class="absolute bottom-0 right-1/4 w-80 h-80 rounded-full bg-pastel-mint-300/20 blur-3xl -z-10 pointer-events-none"></div>

            <div class="max-w-7xl mx-auto px-4 sm:px-8">
                <!-- Eyebrow Tag -->
                <div class="text-center max-w-3xl mx-auto mb-6">
                    <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full badge-pastel-mix text-xs font-semibold text-purple-900 shadow-xs">
                        <span class="w-2 h-2 rounded-full bg-pink-500 animate-ping"></span>
                        <span class="font-mono text-[11px] tracking-wider uppercase">BESPOKE ENTERPRISE DATA INTELLIGENCE</span>
                    </span>
                </div>

                <!-- Main Title & Copy -->
                <div class="text-center max-w-4xl mx-auto mb-10 space-y-4">
                    <h1 class="font-serif text-3xl sm:text-5xl lg:text-6xl text-neutral-900 font-bold tracking-tight leading-[1.15]">
                        Presisi Data Mewah,<br>
                        <span class="text-gradient-pastel">Keputusan Eksekutif Bernilai Tinggi.</span>
                    </h1>
                    <p class="text-neutral-600 text-sm sm:text-base md:text-lg max-w-2xl mx-auto leading-relaxed font-normal">
                        AuraMetrics Studio mentransformasikan jutaan titik data kompleks menjadi visualisasi elegan, model prediksi akurat, dan infrastruktur modern yang mendorong profitabilitas enterprise Anda.
                    </p>

                    <!-- Dual CTAs -->
                    <div class="pt-4 flex flex-col sm:flex-row items-center justify-center gap-3.5">
                        <a href="#consultation" class="btn-luxury-primary text-xs sm:text-sm font-bold px-7 py-3.5 rounded-full tracking-wide inline-flex items-center gap-2">
                            <span>Mulai Transformasi Data</span>
                            <span class="font-mono">↗</span>
                        </a>
                        <a href="#dashboard" class="btn-luxury-secondary text-xs sm:text-sm font-bold px-7 py-3.5 rounded-full tracking-wide inline-flex items-center gap-2">
                            <span>Eksplorasi Demo Dashboard</span>
                            <span>✦</span>
                        </a>
                    </div>
                </div>

                <!-- Key Metrics Strip -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-3.5 sm:gap-4 max-w-5xl mx-auto my-12">
                    <div class="card-luxury p-5 rounded-2xl text-center border-pastel-lavender-200">
                        <span class="font-mono text-2xl sm:text-3xl font-extrabold text-purple-700 block">99.8%</span>
                        <span class="text-xs font-semibold text-neutral-800 mt-1 block">Akurasi Model Prediksi</span>
                        <span class="text-[11px] text-neutral-500">Benchmark ensemble AI</span>
                    </div>
                    <div class="card-luxury p-5 rounded-2xl text-center border-pastel-rose-200">
                        <span class="font-mono text-2xl sm:text-3xl font-extrabold text-pink-600 block">500M+</span>
                        <span class="text-xs font-semibold text-neutral-800 mt-1 block">Data Points Terproses</span>
                        <span class="text-[11px] text-neutral-500">Pipeline lakehouse aktif</span>
                    </div>
                    <div class="card-luxury p-5 rounded-2xl text-center border-pastel-sky-200">
                        <span class="font-mono text-2xl sm:text-3xl font-extrabold text-sky-600 block">4.8x</span>
                        <span class="text-xs font-semibold text-neutral-800 mt-1 block">Rata-rata ROI Klien</span>
                        <span class="text-[11px] text-neutral-500">Dalam 6 bulan implementasi</span>
                    </div>
                    <div class="card-luxury p-5 rounded-2xl text-center border-pastel-mint-200">
                        <span class="font-mono text-2xl sm:text-3xl font-extrabold text-emerald-600 block">100%</span>
                        <span class="text-xs font-semibold text-neutral-800 mt-1 block">Kepatuhan & Keamanan</span>
                        <span class="text-[11px] text-neutral-500">ISO 27001 & Non-Disclosure</span>
                    </div>
                </div>

                {{-- ============================================================ --}}
                {{-- 4. INTERACTIVE HERO EXECUTIVE DASHBOARD PREVIEW --}}
                {{-- ============================================================ --}}
                <div id="dashboard" class="relative max-w-5xl mx-auto mt-6">
                    <!-- Glassmorphism Container with Shimmer Border -->
                    <div class="rounded-3xl p-1 bg-gradient-to-r from-purple-200 via-pink-200 to-sky-200 shadow-2xl">
                        <div class="bg-white/95 backdrop-blur-xl rounded-[22px] p-4 sm:p-7 border border-white">
                            <!-- Window Bar -->
                            <div class="flex flex-wrap items-center justify-between gap-3 pb-4 border-b border-pastel-lavender-100">
                                <div class="flex items-center gap-2">
                                    <div class="flex gap-1.5">
                                        <span class="w-3 h-3 rounded-full bg-rose-300"></span>
                                        <span class="w-3 h-3 rounded-full bg-amber-300"></span>
                                        <span class="w-3 h-3 rounded-full bg-emerald-300"></span>
                                    </div>
                                    <span class="text-xs font-mono font-medium text-neutral-500 ml-2">aurametrics-executive-suite.v4.0</span>
                                </div>

                                <div class="flex items-center gap-2">
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200 text-[10px] font-mono font-semibold">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                                        LIVE SYNCED · LATENCY 14ms
                                    </span>
                                </div>
                            </div>

                            <!-- Dashboard Controls / Metric Tabs -->
                            <div class="pt-5 pb-3 flex flex-wrap gap-2 items-center justify-between">
                                <div class="flex flex-wrap gap-2">
                                    <button onclick="switchHeroTab('revenue')" id="tab-revenue" class="hero-tab px-3.5 py-1.5 rounded-xl text-xs font-bold transition bg-purple-100 text-purple-900 border border-purple-300">
                                        ✦ Revenue & Profit AI
                                    </button>
                                    <button onclick="switchHeroTab('customer')" id="tab-customer" class="hero-tab px-3.5 py-1.5 rounded-xl text-xs font-semibold text-neutral-600 hover:bg-neutral-100 border border-transparent transition">
                                        ✦ Customer LTV & Cohorts
                                    </button>
                                    <button onclick="switchHeroTab('pipeline')" id="tab-pipeline" class="hero-tab px-3.5 py-1.5 rounded-xl text-xs font-semibold text-neutral-600 hover:bg-neutral-100 border border-transparent transition">
                                        ✦ Lakehouse Health & Stream
                                    </button>
                                </div>

                                <div class="text-[11px] font-mono text-neutral-500">
                                    Period: <strong class="text-neutral-800">Q3 FY2026 (Live Forecast)</strong>
                                </div>
                            </div>

                            <!-- Tab 1: Revenue & Profit AI (Active by default) -->
                            <div id="content-revenue" class="tab-content block space-y-5 pt-3">
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-3.5">
                                    <div class="p-4 rounded-2xl bg-gradient-to-br from-pastel-lavender-50 to-white border border-purple-100">
                                        <span class="text-[11px] font-semibold text-purple-700 uppercase tracking-wider block">Gross Revenue YTD</span>
                                        <div class="flex items-baseline gap-2 mt-1">
                                            <span class="font-mono text-2xl font-bold text-neutral-900">Rp 48,25 M</span>
                                            <span class="text-xs font-bold text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded-full border border-emerald-100">+24.6%</span>
                                        </div>
                                        <p class="text-[11px] text-neutral-500 mt-1.5">97.8% confidence interval interval</p>
                                    </div>
                                    <div class="p-4 rounded-2xl bg-gradient-to-br from-pastel-rose-50 to-white border border-pink-100">
                                        <span class="text-[11px] font-semibold text-pink-700 uppercase tracking-wider block">Predicted Q4 Outturn</span>
                                        <div class="flex items-baseline gap-2 mt-1">
                                            <span class="font-mono text-2xl font-bold text-neutral-900">Rp 62,80 M</span>
                                            <span class="text-xs font-bold text-pink-600 bg-pink-50 px-2 py-0.5 rounded-full border border-pink-100">+31.2% Target</span>
                                        </div>
                                        <p class="text-[11px] text-neutral-500 mt-1.5">Machine learning ensemble forecast</p>
                                    </div>
                                    <div class="p-4 rounded-2xl bg-gradient-to-br from-pastel-sky-50 to-white border border-sky-100">
                                        <span class="text-[11px] font-semibold text-sky-700 uppercase tracking-wider block">CAC to LTV Efficiency</span>
                                        <div class="flex items-baseline gap-2 mt-1">
                                            <span class="font-mono text-2xl font-bold text-neutral-900">1 : 6.8x</span>
                                            <span class="text-xs font-bold text-sky-600 bg-sky-50 px-2 py-0.5 rounded-full border border-sky-100">Optimal Tier</span>
                                        </div>
                                        <p class="text-[11px] text-neutral-500 mt-1.5">Peningkatan 180 bps vs Q2</p>
                                    </div>
                                </div>

                                <!-- Simulated Visual Chart -->
                                <div class="p-5 rounded-2xl bg-white border border-pastel-lavender-200">
                                    <div class="flex items-center justify-between mb-4">
                                        <div>
                                            <h4 class="text-xs sm:text-sm font-bold text-neutral-900">Forecasting Kurva Penjualan & Margin Bersih</h4>
                                            <p class="text-[11px] text-neutral-500">Data historis 12 bulan vs Proyeksi Prediktif AI AuraMetrics</p>
                                        </div>
                                        <div class="flex items-center gap-3 text-[11px] font-mono">
                                            <span class="flex items-center gap-1.5"><span class="w-3 h-3 rounded-md bg-purple-500"></span> Aktual</span>
                                            <span class="flex items-center gap-1.5"><span class="w-3 h-3 rounded-md bg-pink-400"></span> Proyeksi AI</span>
                                        </div>
                                    </div>

                                    <!-- Chart Visual representation -->
                                    <div class="h-44 flex items-end gap-2 sm:gap-4 pt-4 border-b border-neutral-100">
                                        <div class="flex-1 flex flex-col items-center gap-1 group">
                                            <div class="w-full bg-purple-200 rounded-t-lg transition-all group-hover:bg-purple-300" style="height: 48%"></div>
                                            <span class="text-[10px] font-mono text-neutral-500">Mei</span>
                                        </div>
                                        <div class="flex-1 flex flex-col items-center gap-1 group">
                                            <div class="w-full bg-purple-300 rounded-t-lg transition-all group-hover:bg-purple-400" style="height: 58%"></div>
                                            <span class="text-[10px] font-mono text-neutral-500">Jun</span>
                                        </div>
                                        <div class="flex-1 flex flex-col items-center gap-1 group">
                                            <div class="w-full bg-purple-400 rounded-t-lg transition-all group-hover:bg-purple-500" style="height: 65%"></div>
                                            <span class="text-[10px] font-mono text-neutral-500">Jul</span>
                                        </div>
                                        <div class="flex-1 flex flex-col items-center gap-1 group">
                                            <div class="w-full bg-purple-500 rounded-t-lg transition-all group-hover:bg-purple-600" style="height: 76%"></div>
                                            <span class="text-[10px] font-mono text-neutral-500">Agu</span>
                                        </div>
                                        <div class="flex-1 flex flex-col items-center gap-1 group">
                                            <div class="w-full bg-pink-400 rounded-t-lg border-2 border-dashed border-pink-500 transition-all group-hover:bg-pink-500" style="height: 86%"></div>
                                            <span class="text-[10px] font-mono text-pink-600 font-bold">Sep*</span>
                                        </div>
                                        <div class="flex-1 flex flex-col items-center gap-1 group">
                                            <div class="w-full bg-pink-500 rounded-t-lg border-2 border-dashed border-pink-600 transition-all group-hover:bg-pink-600" style="height: 94%"></div>
                                            <span class="text-[10px] font-mono text-pink-600 font-bold">Okt*</span>
                                        </div>
                                        <div class="flex-1 flex flex-col items-center gap-1 group">
                                            <div class="w-full bg-gradient-to-t from-pink-500 to-purple-600 rounded-t-lg border-2 border-dashed border-purple-700 transition-all" style="height: 100%"></div>
                                            <span class="text-[10px] font-mono text-purple-700 font-bold">Nov*</span>
                                        </div>
                                    </div>
                                    <div class="pt-2 text-[10px] text-neutral-600 flex justify-between">
                                        <span>*Estimasi berbasis model time-series neural AuraMetrics dengan deviasi < 1.2%</span>
                                        <span class="text-purple-600 font-bold font-mono">Simulasi Selesai</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Tab 2: Customer LTV & Cohorts -->
                            <div id="content-customer" class="tab-content hidden space-y-4 pt-3">
                                <div class="grid sm:grid-cols-3 gap-3.5">
                                    <div class="p-4 rounded-2xl bg-pastel-mint-50 border border-emerald-100">
                                        <span class="text-[11px] font-semibold text-emerald-800 uppercase block">High-Value VIP Cohort</span>
                                        <span class="font-mono text-2xl font-bold text-neutral-900 block mt-1">14.820 Akun</span>
                                        <span class="text-[11px] text-emerald-700 mt-1 block">Kontribusi 64% total profit margin</span>
                                    </div>
                                    <div class="p-4 rounded-2xl bg-pastel-peach-50 border border-amber-100">
                                        <span class="text-[11px] font-semibold text-amber-800 uppercase block">Churn Risk Detected</span>
                                        <span class="font-mono text-2xl font-bold text-neutral-900 block mt-1">2.1% (Low)</span>
                                        <span class="text-[11px] text-amber-700 mt-1 block">Tereduksi 3.4% lewat intervensi AI</span>
                                    </div>
                                    <div class="p-4 rounded-2xl bg-pastel-sky-50 border border-sky-100">
                                        <span class="text-[11px] font-semibold text-sky-800 uppercase block">Net Retention Rate (NRR)</span>
                                        <span class="font-mono text-2xl font-bold text-neutral-900 block mt-1">134.2%</span>
                                        <span class="text-[11px] text-sky-700 mt-1 block">Pertumbuhan ekspansi akun organik</span>
                                    </div>
                                </div>
                                <div class="p-4 rounded-2xl bg-neutral-50 border border-neutral-200 text-xs text-neutral-700 space-y-2">
                                    <p class="font-semibold text-neutral-900">Insight Mesin Segmentasi AuraMetrics:</p>
                                    <p class="text-neutral-600 leading-relaxed">
                                        Pelanggan kategori luxury retail menunjukkan sensitivitas waktu pembelian tertinggi pada akhir pekan dengan rekomendasi keranjang belanja otomatis berbasis deep learning.
                                    </p>
                                </div>
                            </div>

                            <!-- Tab 3: Lakehouse Health & Stream -->
                            <div id="content-pipeline" class="tab-content hidden space-y-4 pt-3">
                                <div class="grid sm:grid-cols-3 gap-3.5">
                                    <div class="p-4 rounded-2xl bg-purple-50 border border-purple-100">
                                        <span class="text-[11px] font-semibold text-purple-800 uppercase block">Snowflake & BigQuery Health</span>
                                        <span class="font-mono text-2xl font-bold text-purple-950 block mt-1">99.99% Up</span>
                                        <span class="text-[11px] text-purple-600 mt-1 block">Zero pipeline downtime</span>
                                    </div>
                                    <div class="p-4 rounded-2xl bg-sky-50 border border-sky-100">
                                        <span class="text-[11px] font-semibold text-sky-800 uppercase block">Throughput Streaming</span>
                                        <span class="font-mono text-2xl font-bold text-sky-950 block mt-1">42.000 msg/s</span>
                                        <span class="text-[11px] text-sky-600 mt-1 block">Kafka cluster terenkripsi</span>
                                    </div>
                                    <div class="p-4 rounded-2xl bg-emerald-50 border border-emerald-100">
                                        <span class="text-[11px] font-semibold text-emerald-800 uppercase block">Governance & Masking</span>
                                        <span class="font-mono text-2xl font-bold text-emerald-950 block mt-1">Active PII Mask</span>
                                        <span class="text-[11px] text-emerald-600 mt-1 block">Kepatuhan GDPR & UU PDP</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- ============================================================ --}}
        {{-- 5. THE LUXURY ADVANTAGE (VALUE PROPOSITION) --}}
        {{-- ============================================================ --}}
        <section id="overview" class="py-20 bg-white border-t border-b border-pastel-lavender-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-8">
                <div class="text-center max-w-2xl mx-auto mb-14">
                    <span class="text-xs font-mono font-bold tracking-widest text-purple-600 uppercase">THE AURAMETRICS DISTINCTION</span>
                    <h2 class="font-serif text-2xl sm:text-4xl font-bold text-neutral-900 mt-2">
                        Bukan Sekadar Grafik,<br>
                        <span class="text-gradient-pastel">Arsitektur Nilai untuk Pimpinan Bisnis.</span>
                    </h2>
                    <p class="text-neutral-600 text-xs sm:text-sm mt-3 leading-relaxed">
                        Kami menyatukan kecanggihan matematika data science dengan keanggunan presentasi eksekutif. Setiap laporan siap disajikan langsung di hadapan dewan komisaris dan investor global.
                    </p>
                </div>

                <div class="grid md:grid-cols-3 gap-6">
                    <!-- Pillar 1 -->
                    <div class="card-luxury p-7 rounded-3xl border-pastel-lavender-200">
                        <div class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-purple-500 to-pink-400 text-white flex items-center justify-center text-xl shadow-md mb-5">
                            ✦
                        </div>
                        <h3 class="font-serif text-lg font-bold text-neutral-900">Bespoke Intelligence, Never Template</h3>
                        <p class="text-neutral-600 text-xs leading-relaxed mt-2.5">
                            Kami tidak menerapkan dashboard generik. Seluruh metric, hierarki KPI, dan visualisasi dirancang eksklusif sesuai rantai nilai unik industri Anda.
                        </p>
                        <ul class="mt-4 space-y-2 text-xs font-medium text-neutral-700">
                            <li class="flex items-center gap-2"><span class="text-purple-600 font-bold">✓</span> Data model kustom sesuai strategi perusahaan</li>
                            <li class="flex items-center gap-2"><span class="text-purple-600 font-bold">✓</span> Desain UI dashboard sekelas majalah editorial</li>
                        </ul>
                    </div>

                    <!-- Pillar 2 -->
                    <div class="card-luxury p-7 rounded-3xl border-pastel-rose-200">
                        <div class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-pink-500 to-rose-400 text-white flex items-center justify-center text-xl shadow-md mb-5">
                            ⚡
                        </div>
                        <h3 class="font-serif text-lg font-bold text-neutral-900">Modern Lakehouse & Cloud Agnostic</h3>
                        <p class="text-neutral-600 text-xs leading-relaxed mt-2.5">
                            Infrastruktur berbasis Snowflake, Databricks, Google BigQuery, atau AWS Redshift yang hemat biaya query, berkinerja kilat, dan bebas lock-in.
                        </p>
                        <ul class="mt-4 space-y-2 text-xs font-medium text-neutral-700">
                            <li class="flex items-center gap-2"><span class="text-pink-600 font-bold">✓</span> Eliminasi 40%+ biaya cloud yang mubazir</li>
                            <li class="flex items-center gap-2"><span class="text-pink-600 font-bold">✓</span> Pipeline data terorkestrasi dbt & Airflow</li>
                        </ul>
                    </div>

                    <!-- Pillar 3 -->
                    <div class="card-luxury p-7 rounded-3xl border-pastel-sky-200">
                        <div class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-sky-500 to-indigo-400 text-white flex items-center justify-center text-xl shadow-md mb-5">
                            🛡️
                        </div>
                        <h3 class="font-serif text-lg font-bold text-neutral-900">Kerahasiaan Tingkat Perbankan (NDA)</h3>
                        <p class="text-neutral-600 text-xs leading-relaxed mt-2.5">
                            Integritas data Anda terlindungi dengan enkripsi AES-256 end-to-end, anonymization, dan perjanjian non-disclosure menyeluruh yang mengikat secara hukum.
                        </p>
                        <ul class="mt-4 space-y-2 text-xs font-medium text-neutral-700">
                            <li class="flex items-center gap-2"><span class="text-sky-600 font-bold">✓</span> Kepatuhan penuh UU PDP & regulasi perbankan</li>
                            <li class="flex items-center gap-2"><span class="text-sky-600 font-bold">✓</span> Isolasi lingkungan data kustom (VPC Peering)</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        {{-- ============================================================ --}}
        {{-- 6. CORE CAPABILITIES (LAYANAN DATA ANALYTICS) --}}
        {{-- ============================================================ --}}
        <section id="services" class="py-20 bg-pastel-pearl">
            <div class="max-w-7xl mx-auto px-4 sm:px-8">
                <div class="flex flex-col md:flex-row md:items-end justify-between mb-14 gap-6">
                    <div>
                        <span class="text-xs font-mono font-bold tracking-widest text-purple-600 uppercase">OUR MASTERPIECE SUITE</span>
                        <h2 class="font-serif text-2xl sm:text-4xl font-bold text-neutral-900 mt-2">
                            Solusi Analitik Data Komprehensif.
                        </h2>
                    </div>
                    <p class="text-neutral-600 text-xs sm:text-sm max-w-md leading-relaxed">
                        Enam spektrum keahlian dari arsitektur pipeline hulu hingga dashboard eksekutif hilir untuk memastikan data Anda berbuah profit riil.
                    </p>
                </div>

                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Service 1 -->
                    <div class="card-luxury p-6 rounded-3xl">
                        <span class="text-xs font-mono font-semibold text-purple-600">01 / VISUALIZATION</span>
                        <h3 class="font-serif text-base sm:text-lg font-bold text-neutral-900 mt-1.5">Executive BI & Luxury Dashboard</h3>
                        <p class="text-neutral-600 text-xs mt-2 leading-relaxed">
                            Penyusunan dashboard C-Level pada PowerBI, Tableau, Looker Studio, atau kustom web analytics berbasis React dengan tipografi editorial dan refresh otomatis.
                        </p>
                        <div class="mt-4 flex flex-wrap gap-1.5">
                            <span class="px-2 py-0.5 rounded-md bg-purple-50 text-purple-700 text-[10px] font-mono font-semibold">Tableau</span>
                            <span class="px-2 py-0.5 rounded-md bg-purple-50 text-purple-700 text-[10px] font-mono font-semibold">PowerBI</span>
                            <span class="px-2 py-0.5 rounded-md bg-purple-50 text-purple-700 text-[10px] font-mono font-semibold">Custom Web</span>
                        </div>
                    </div>

                    <!-- Service 2 -->
                    <div class="card-luxury p-6 rounded-3xl">
                        <span class="text-xs font-mono font-semibold text-pink-600">02 / MACHINE LEARNING</span>
                        <h3 class="font-serif text-base sm:text-lg font-bold text-neutral-900 mt-1.5">Predictive AI & Forecasting Modeling</h3>
                        <p class="text-neutral-600 text-xs mt-2 leading-relaxed">
                            Algoritma prediksi permintaan, dinamika harga, penilaian risiko kredit, dan churn prevention dengan tingkat akurasi tinggi dan interpretasi bisnis yang jelas.
                        </p>
                        <div class="mt-4 flex flex-wrap gap-1.5">
                            <span class="px-2 py-0.5 rounded-md bg-pink-50 text-pink-700 text-[10px] font-mono font-semibold">Prophet</span>
                            <span class="px-2 py-0.5 rounded-md bg-pink-50 text-pink-700 text-[10px] font-mono font-semibold">XGBoost</span>
                            <span class="px-2 py-0.5 rounded-md bg-pink-50 text-pink-700 text-[10px] font-mono font-semibold">Deep Learning</span>
                        </div>
                    </div>

                    <!-- Service 3 -->
                    <div class="card-luxury p-6 rounded-3xl">
                        <span class="text-xs font-mono font-semibold text-sky-600">03 / DATA ENGINEERING</span>
                        <h3 class="font-serif text-base sm:text-lg font-bold text-neutral-900 mt-1.5">Lakehouse & Modern Data Pipeline</h3>
                        <p class="text-neutral-600 text-xs mt-2 leading-relaxed">
                            Pembangunan pipeline otomatis yang membersihkan, memvalidasi, dan mengkonsolidasikan data dari ratusan sumber ke single source of truth enterprise.
                        </p>
                        <div class="mt-4 flex flex-wrap gap-1.5">
                            <span class="px-2 py-0.5 rounded-md bg-sky-50 text-sky-700 text-[10px] font-mono font-semibold">Snowflake</span>
                            <span class="px-2 py-0.5 rounded-md bg-sky-50 text-sky-700 text-[10px] font-mono font-semibold">Databricks</span>
                            <span class="px-2 py-0.5 rounded-md bg-sky-50 text-sky-700 text-[10px] font-mono font-semibold">dbt Core</span>
                        </div>
                    </div>

                    <!-- Service 4 -->
                    <div class="card-luxury p-6 rounded-3xl">
                        <span class="text-xs font-mono font-semibold text-emerald-600">04 / CUSTOMER INTELLIGENCE</span>
                        <h3 class="font-serif text-base sm:text-lg font-bold text-neutral-900 mt-1.5">CLV & Segmentasi Perilaku Pelanggan</h3>
                        <p class="text-neutral-600 text-xs mt-2 leading-relaxed">
                            Analisis kohort RFM mendalam untuk memetakan pelanggan bernilai tinggi, peluang up-sell/cross-sell, serta personalisasi strategi retensi omnichannel.
                        </p>
                        <div class="mt-4 flex flex-wrap gap-1.5">
                            <span class="px-2 py-0.5 rounded-md bg-emerald-50 text-emerald-700 text-[10px] font-mono font-semibold">RFM Modeling</span>
                            <span class="px-2 py-0.5 rounded-md bg-emerald-50 text-emerald-700 text-[10px] font-mono font-semibold">Cohort Matrix</span>
                            <span class="px-2 py-0.5 rounded-md bg-emerald-50 text-emerald-700 text-[10px] font-mono font-semibold">Basket Analysis</span>
                        </div>
                    </div>

                    <!-- Service 5 -->
                    <div class="card-luxury p-6 rounded-3xl">
                        <span class="text-xs font-mono font-semibold text-amber-600">05 / REAL-TIME STREAMING</span>
                        <h3 class="font-serif text-base sm:text-lg font-bold text-neutral-900 mt-1.5">Real-Time Metrics & Low-Latency Alerts</h3>
                        <p class="text-neutral-600 text-xs mt-2 leading-relaxed">
                            Pemrosesan streaming transaksi dan event log berkecepatan mikrodetik dengan sistem peringatan anomali instan ke Telegram/Slack/WhatsApp tim manajemen.
                        </p>
                        <div class="mt-4 flex flex-wrap gap-1.5">
                            <span class="px-2 py-0.5 rounded-md bg-amber-50 text-amber-700 text-[10px] font-mono font-semibold">Kafka</span>
                            <span class="px-2 py-0.5 rounded-md bg-amber-50 text-amber-700 text-[10px] font-mono font-semibold">Flink</span>
                            <span class="px-2 py-0.5 rounded-md bg-amber-50 text-amber-700 text-[10px] font-mono font-semibold">Anomali AI</span>
                        </div>
                    </div>

                    <!-- Service 6 -->
                    <div class="card-luxury p-6 rounded-3xl">
                        <span class="text-xs font-mono font-semibold text-purple-600">06 / STRATEGIC ADVISORY</span>
                        <h3 class="font-serif text-base sm:text-lg font-bold text-neutral-900 mt-1.5">Fractional Chief Data Officer (CDO)</h3>
                        <p class="text-neutral-600 text-xs mt-2 leading-relaxed">
                            Pendampingan eksekutif data senior langsung untuk jajaran Direksi, mulai dari data governance, audit regulasi, hingga arsitektur AI jangka panjang.
                        </p>
                        <div class="mt-4 flex flex-wrap gap-1.5">
                            <span class="px-2 py-0.5 rounded-md bg-purple-50 text-purple-700 text-[10px] font-mono font-semibold">C-Suite Sparring</span>
                            <span class="px-2 py-0.5 rounded-md bg-purple-50 text-purple-700 text-[10px] font-mono font-semibold">Audit Governance</span>
                            <span class="px-2 py-0.5 rounded-md bg-purple-50 text-purple-700 text-[10px] font-mono font-semibold">Roadmap AI</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- ============================================================ --}}
        {{-- 7. PROVEN ENTERPRISE CASE STUDIES (PORTFOLIO) --}}
        {{-- ============================================================ --}}
        <section id="cases" class="py-20 bg-white border-t border-b border-pastel-lavender-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-8">
                <div class="text-center max-w-2xl mx-auto mb-14">
                    <span class="text-xs font-mono font-bold tracking-widest text-purple-600 uppercase">PROVEN BUSINESS IMPACT</span>
                    <h2 class="font-serif text-2xl sm:text-4xl font-bold text-neutral-900 mt-2">
                        Hasil Terukur di Dunia Nyata.
                    </h2>
                    <p class="text-neutral-600 text-xs sm:text-sm mt-3">
                        Bagaimana arsitektur analitik AuraMetrics mentransformasi performa bisnis klien kami di berbagai sektor.
                    </p>
                </div>

                <div class="grid md:grid-cols-2 gap-7">
                    <!-- Case 1 -->
                    <div class="card-luxury p-7 rounded-3xl flex flex-col justify-between border-pastel-rose-200">
                        <div>
                            <div class="flex items-center justify-between mb-4">
                                <span class="px-3 py-1 rounded-full bg-pink-100 text-pink-700 text-[11px] font-bold">Luxury Retail & Skincare</span>
                                <span class="text-xs font-mono text-neutral-500">Nasional · 84 Gerai</span>
                            </div>
                            <h3 class="font-serif text-xl font-bold text-neutral-900">
                                Personalisasi Omnichannel & Prediksi Permintaan Multi-Gudang
                            </h3>
                            <p class="text-neutral-600 text-xs sm:text-sm leading-relaxed mt-2.5">
                                Mengintegrasikan data POS offline, e-commerce, dan WhatsApp CRM ke dalam satu modern lakehouse Snowflake, dipadukan dengan algoritma rekomendasi personalized cross-selling.
                            </p>
                        </div>
                        <div class="pt-6 mt-6 border-t border-pastel-lavender-100 grid grid-cols-3 gap-2 text-center">
                            <div>
                                <span class="font-mono text-xl font-bold text-pink-600">+38%</span>
                                <span class="text-[10px] text-neutral-500 block mt-0.5">Repeat Order Rate</span>
                            </div>
                            <div>
                                <span class="font-mono text-xl font-bold text-purple-600">-42%</span>
                                <span class="text-[10px] text-neutral-500 block mt-0.5">Dead Stock Gudang</span>
                            </div>
                            <div>
                                <span class="font-mono text-xl font-bold text-emerald-600">5.2x</span>
                                <span class="text-[10px] text-neutral-500 block mt-0.5">Investasi ROI</span>
                            </div>
                        </div>
                    </div>

                    <!-- Case 2 -->
                    <div class="card-luxury p-7 rounded-3xl flex flex-col justify-between border-pastel-sky-200">
                        <div>
                            <div class="flex items-center justify-between mb-4">
                                <span class="px-3 py-1 rounded-full bg-sky-100 text-sky-700 text-[11px] font-bold">Fintech & Digital Lending</span>
                                <span class="text-xs font-mono text-neutral-500">Asia Tenggara · 2M+ User</span>
                            </div>
                            <h3 class="font-serif text-xl font-bold text-neutral-900">
                                Real-Time Credit Scoring & Fraud Detection Engine
                            </h3>
                            <p class="text-neutral-600 text-xs sm:text-sm leading-relaxed mt-2.5">
                                Membangun pipeline streaming latensi rendah yang menganalisis pola transaksi dalam tempo 45 milidetik untuk mencegah fraud sekaligus mempercepat persetujuan pinjaman sehat.
                            </p>
                        </div>
                        <div class="pt-6 mt-6 border-t border-pastel-lavender-100 grid grid-cols-3 gap-2 text-center">
                            <div>
                                <span class="font-mono text-xl font-bold text-sky-600">-31%</span>
                                <span class="text-[10px] text-neutral-500 block mt-0.5">Tingkat NPL / Default</span>
                            </div>
                            <div>
                                <span class="font-mono text-xl font-bold text-purple-600">45ms</span>
                                <span class="text-[10px] text-neutral-500 block mt-0.5">Kecepatan Keputusan</span>
                            </div>
                            <div>
                                <span class="font-mono text-xl font-bold text-emerald-600">Rp 18M+</span>
                                <span class="text-[10px] text-neutral-500 block mt-0.5">Fraud Terselamatkan</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- ============================================================ --}}
        {{-- 8. INTERACTIVE LIVE ROI & PROJECT ESTIMATOR CALCULATOR --}}
        {{-- ============================================================ --}}
        <section id="calculator" class="py-20 bg-gradient-to-b from-pastel-pearl to-white">
            <div class="max-w-4xl mx-auto px-4 sm:px-8">
                <div class="text-center max-w-2xl mx-auto mb-12">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-pink-100 text-pink-800 text-[11px] font-mono font-bold uppercase tracking-wider">
                        ✦ Interactive Tool
                    </span>
                    <h2 class="font-serif text-2xl sm:text-4xl font-bold text-neutral-900 mt-2">
                        Kalkulator Estimasi Kebutuhan & ROI Proyek Data
                    </h2>
                    <p class="text-neutral-600 text-xs sm:text-sm mt-3">
                        Pilih skala data bisnis Anda untuk melihat rekomendasi arsitektur, estimasi durasi pengerjaan, dan proyeksi efisiensi.
                    </p>
                </div>

                <div class="card-luxury p-6 sm:p-10 rounded-3xl shadow-xl border-pastel-lavender-300">
                    <div class="space-y-6">
                        <!-- Step 1: Volume Data -->
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-purple-900 mb-2">
                                1. Perkiraan Volume Data Bulanan:
                            </label>
                            <div class="grid grid-cols-3 gap-2.5 sm:gap-3">
                                <button type="button" onclick="setVolume('small', this)" class="vol-btn p-3 rounded-2xl border text-center transition text-xs font-bold border-purple-400 bg-purple-50 text-purple-950">
                                    <span class="block text-sm sm:text-base font-mono">100K – 1M</span>
                                    <span class="text-[10px] font-normal text-neutral-600 block">Startup / Mid-Biz</span>
                                </button>
                                <button type="button" onclick="setVolume('medium', this)" class="vol-btn p-3 rounded-2xl border text-center transition text-xs font-semibold border-neutral-200 hover:border-purple-300 text-neutral-700">
                                    <span class="block text-sm sm:text-base font-mono">1M – 50M</span>
                                    <span class="text-[10px] font-normal text-neutral-600 block">Growing Enterprise</span>
                                </button>
                                <button type="button" onclick="setVolume('large', this)" class="vol-btn p-3 rounded-2xl border text-center transition text-xs font-semibold border-neutral-200 hover:border-purple-300 text-neutral-700">
                                    <span class="block text-sm sm:text-base font-mono">50M+ Data</span>
                                    <span class="text-[10px] font-normal text-neutral-600 block">Tier-1 Corporate</span>
                                </button>
                            </div>
                        </div>

                        <!-- Step 2: Kebutuhan Utama -->
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-purple-900 mb-2">
                                2. Prioritas Kebutuhan Analitik:
                            </label>
                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-2.5">
                                <button type="button" onclick="setGoal('bi', this)" class="goal-btn p-3 rounded-2xl border text-left transition text-xs font-bold border-pink-400 bg-pink-50 text-pink-950">
                                    <span class="block font-bold">✦ Executive BI Suite</span>
                                    <span class="text-[11px] font-normal text-neutral-600 block mt-0.5">Dashboard C-Suite & KPI Visual</span>
                                </button>
                                <button type="button" onclick="setGoal('ai', this)" class="goal-btn p-3 rounded-2xl border text-left transition text-xs font-semibold border-neutral-200 hover:border-pink-300 text-neutral-700">
                                    <span class="block font-bold">✦ Predictive ML / AI</span>
                                    <span class="text-[11px] font-normal text-neutral-600 block mt-0.5">Forecasting, LTV & Churn</span>
                                </button>
                                <button type="button" onclick="setGoal('full', this)" class="goal-btn p-3 rounded-2xl border text-left transition text-xs font-semibold border-neutral-200 hover:border-pink-300 text-neutral-700">
                                    <span class="block font-bold">✦ Full Lakehouse End-to-End</span>
                                    <span class="text-[11px] font-normal text-neutral-600 block mt-0.5">Pipeline + ML + BI Suite</span>
                                </button>
                            </div>
                        </div>

                        <!-- Calculator Dynamic Result Box -->
                        <div class="mt-8 p-5 sm:p-6 rounded-2xl bg-gradient-to-br from-pastel-lavender-50 via-white to-pastel-rose-50 border border-purple-200">
                            <div class="flex items-center justify-between pb-3 border-b border-purple-100">
                                <span class="text-xs font-bold text-purple-900 uppercase tracking-wide">Rekomendasi Rancang Bangun:</span>
                                <span id="calcPackageName" class="font-mono text-xs font-extrabold text-purple-700 bg-purple-100/80 px-2.5 py-0.5 rounded-full">
                                    INSIGHT EXECUTIVE SPRINT
                                </span>
                            </div>

                            <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 pt-4 text-center">
                                <div>
                                    <span class="text-[11px] text-neutral-500 block">Estimasi Timeline</span>
                                    <span id="calcTimeline" class="font-mono text-lg sm:text-xl font-bold text-neutral-900 block mt-0.5">3 – 5 Minggu</span>
                                </div>
                                <div>
                                    <span class="text-[11px] text-neutral-500 block">Proyeksi Efisiensi Biaya</span>
                                    <span id="calcRoi" class="font-mono text-lg sm:text-xl font-bold text-emerald-600 block mt-0.5">+32% Biaya Cloud</span>
                                </div>
                                <div class="col-span-2 sm:col-span-1">
                                    <span class="text-[11px] text-neutral-500 block">Rekomendasi Stack</span>
                                    <span id="calcStack" class="font-mono text-xs sm:text-sm font-bold text-purple-800 block mt-1">Snowflake + PowerBI</span>
                                </div>
                            </div>

                            <div class="pt-4 mt-4 border-t border-purple-100 flex flex-col sm:flex-row items-center justify-between gap-3">
                                <p class="text-[11px] text-neutral-600 text-center sm:text-left">
                                    Estimasi awal ini dapat disesuaikan dengan arsitektur eksisting perusahaan Anda.
                                </p>
                                <a id="calcWaLink" href="https://wa.me/6281234567890?text=Halo%20AuraMetrics%20Studio%2C%20saya%20telah%20menghitung%20kebutuhan%20analitik%20data%20saya%20lewat%20kalkulator%20dan%20ingin%20konsultasi%20eksekutif."
                                   target="_blank" rel="noopener noreferrer"
                                   class="btn-luxury-primary text-xs font-bold px-5 py-2.5 rounded-full inline-flex items-center gap-1.5 whitespace-nowrap">
                                    <span>Konsultasikan Hasil Estimasi ↗</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- ============================================================ --}}
        {{-- 9. TRANSPARENT INVESTMENT TIERS (PRICING) --}}
        {{-- ============================================================ --}}
        <section id="pricing" class="py-20 bg-white border-t border-b border-pastel-lavender-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-8">
                <div class="text-center max-w-2xl mx-auto mb-14">
                    <span class="text-xs font-mono font-bold tracking-widest text-purple-600 uppercase">ENGAGEMENT MODELS</span>
                    <h2 class="font-serif text-2xl sm:text-4xl font-bold text-neutral-900 mt-2">
                        Pilihan Kemitraan Strategis.
                    </h2>
                    <p class="text-neutral-600 text-xs sm:text-sm mt-3">
                        Model investasi transparan tanpa biaya tersembunyi. Disesuaikan dengan tahapan kematangan data perusahaan Anda.
                    </p>
                </div>

                <div class="grid md:grid-cols-3 gap-7 max-w-6xl mx-auto items-stretch">
                    <!-- Tier 1 -->
                    <div class="card-luxury p-7 rounded-3xl flex flex-col justify-between border-pastel-lavender-200">
                        <div>
                            <span class="text-xs font-mono font-bold text-purple-600 uppercase">TIER 01 / SPRINT</span>
                            <h3 class="font-serif text-xl font-bold text-neutral-900 mt-1">Executive BI Sprint</h3>
                            <p class="text-neutral-600 text-xs mt-2">Untuk bisnis yang membutuhkan visualisasi C-level cepat dan KPI audit terstruktur.</p>

                            <div class="mt-5 pb-5 border-b border-pastel-lavender-100">
                                <span class="text-xs text-neutral-500">Mulai dari</span>
                                <div class="text-2xl sm:text-3xl font-mono font-extrabold text-neutral-900">Rp 28 Juta</div>
                                <span class="text-[11px] text-purple-600 font-semibold">Durasi sprint 3 – 4 minggu</span>
                            </div>

                            <ul class="mt-5 space-y-2.5 text-xs text-neutral-700">
                                <li class="flex items-center gap-2"><span class="text-purple-600 font-bold">✓</span> Hingga 3 Interactive Executive Dashboards</li>
                                <li class="flex items-center gap-2"><span class="text-purple-600 font-bold">✓</span> Integrasi 2 sumber data (CRM / DB / ERP)</li>
                                <li class="flex items-center gap-2"><span class="text-purple-600 font-bold">✓</span> Pembersihan & standarisasi skema data</li>
                                <li class="flex items-center gap-2"><span class="text-purple-600 font-bold">✓</span> Pelatihan tim internal & dokumentasi</li>
                                <li class="flex items-center gap-2 text-neutral-400"><span>✕</span> Predictive machine learning AI</li>
                            </ul>
                        </div>
                        <div class="pt-6 mt-6">
                            <a href="#consultation" class="btn-luxury-secondary w-full text-center block text-xs font-bold py-3 rounded-full">
                                Pilih Paket Sprint
                            </a>
                        </div>
                    </div>

                    <!-- Tier 2 (Highlighted) -->
                    <div class="relative card-luxury p-7 sm:p-8 rounded-3xl flex flex-col justify-between border-2 border-purple-400 glow-pastel bg-white">
                        <div class="absolute -top-3.5 left-1/2 -translate-x-1/2 px-4 py-1 rounded-full bg-gradient-to-r from-purple-600 via-pink-600 to-sky-500 text-white font-mono text-[10px] font-extrabold tracking-widest uppercase shadow-md">
                            ★ MOST POPULAR SIGNATURE
                        </div>
                        <div>
                            <span class="text-xs font-mono font-bold text-pink-600 uppercase">TIER 02 / ENTERPRISE SUITE</span>
                            <h3 class="font-serif text-2xl font-bold text-neutral-900 mt-1">Enterprise Analytics Suite</h3>
                            <p class="text-neutral-600 text-xs mt-2">Solusi analitik menyeluruh: Modern lakehouse, predictive AI model, dan BI eksekutif.</p>

                            <div class="mt-5 pb-5 border-b border-purple-100">
                                <span class="text-xs text-neutral-500">Mulai dari</span>
                                <div class="text-2xl sm:text-3xl font-mono font-extrabold text-gradient-pastel">Rp 65 Juta</div>
                                <span class="text-[11px] text-pink-600 font-semibold">Durasi implementasi 6 – 8 minggu</span>
                            </div>

                            <ul class="mt-5 space-y-2.5 text-xs text-neutral-700">
                                <li class="flex items-center gap-2"><span class="text-pink-600 font-bold">✓</span> <strong>Unlimited</strong> Interactive Dashboards</li>
                                <li class="flex items-center gap-2"><span class="text-pink-600 font-bold">✓</span> Integrasi hingga 6 data sources tanpa batas record</li>
                                <li class="flex items-center gap-2"><span class="text-pink-600 font-bold">✓</span> <strong>Predictive AI Model</strong> (Forecasting & Churn Risk)</li>
                                <li class="flex items-center gap-2"><span class="text-pink-600 font-bold">✓</span> Modern Lakehouse Setup (Snowflake / BigQuery / dbt)</li>
                                <li class="flex items-center gap-2"><span class="text-pink-600 font-bold">✓</span> Otomasi sistem alert WhatsApp & Email</li>
                                <li class="flex items-center gap-2"><span class="text-pink-600 font-bold">✓</span> Garansi SLA 3 bulan & support prioritas</li>
                            </ul>
                        </div>
                        <div class="pt-6 mt-6">
                            <a href="#consultation" class="btn-luxury-primary w-full text-center block text-xs font-bold py-3.5 rounded-full shadow-lg">
                                Konsultasi Enterprise Suite ↗
                            </a>
                        </div>
                    </div>

                    <!-- Tier 3 -->
                    <div class="card-luxury p-7 rounded-3xl flex flex-col justify-between border-pastel-sky-200">
                        <div>
                            <span class="text-xs font-mono font-bold text-sky-600 uppercase">TIER 03 / PRIVATE ATELIER</span>
                            <h3 class="font-serif text-xl font-bold text-neutral-900 mt-1">Private Data Atelier</h3>
                            <p class="text-neutral-600 text-xs mt-2">Dedicated senior data squad & Fractional CDO untuk transformasi jangka panjang.</p>

                            <div class="mt-5 pb-5 border-b border-pastel-sky-100">
                                <span class="text-xs text-neutral-500">Retainer Bulanan</span>
                                <div class="text-2xl sm:text-3xl font-mono font-extrabold text-neutral-900">Rp 35 Juta<span class="text-xs text-neutral-400 font-normal">/bln</span></div>
                                <span class="text-[11px] text-sky-600 font-semibold">Komitmen fleksibel 6 atau 12 bulan</span>
                            </div>

                            <ul class="mt-5 space-y-2.5 text-xs text-neutral-700">
                                <li class="flex items-center gap-2"><span class="text-sky-600 font-bold">✓</span> Dedicated Senior Data Scientist & Engineer Squad</li>
                                <li class="flex items-center gap-2"><span class="text-sky-600 font-bold">✓</span> Fractional CDO Advisory untuk Dewan Direksi</li>
                                <li class="flex items-center gap-2"><span class="text-sky-600 font-bold">✓</span> Continuous Machine Learning Model Retraining</li>
                                <li class="flex items-center gap-2"><span class="text-sky-600 font-bold">✓</span> 24/7 Pipeline Monitoring & SLA 99.9%</li>
                                <li class="flex items-center gap-2"><span class="text-sky-600 font-bold">✓</span> Prioritas pengerjaan ad-hoc executive requests</li>
                            </ul>
                        </div>
                        <div class="pt-6 mt-6">
                            <a href="#consultation" class="btn-luxury-secondary w-full text-center block text-xs font-bold py-3 rounded-full">
                                Request Private Dossier
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- ============================================================ --}}
        {{-- 10. INTERACTIVE FAQ (ACCORDION) --}}
        {{-- ============================================================ --}}
        <section id="faq" class="py-20 bg-pastel-pearl">
            <div class="max-w-3xl mx-auto px-4 sm:px-8">
                <div class="text-center mb-12">
                    <span class="text-xs font-mono font-bold tracking-widest text-purple-600 uppercase">CLARITY & ASSURANCE</span>
                    <h2 class="font-serif text-2xl sm:text-4xl font-bold text-neutral-900 mt-2">
                        Pertanyaan Umum Eksekutif.
                    </h2>
                    <p class="text-neutral-600 text-xs sm:text-sm mt-2">
                        Jawaban transparan seputar kerahasiaan data, teknologi, dan kepemilikan aset.
                    </p>
                </div>

                <div class="space-y-3.5">
                    <!-- FAQ 1 -->
                    <div class="card-luxury rounded-2xl overflow-hidden border-pastel-lavender-200">
                        <button onclick="toggleFaq(1)" class="w-full text-left p-4 sm:p-5 flex justify-between items-center gap-3 font-serif font-bold text-sm sm:text-base text-neutral-900">
                            <span>Bagaimana jaminan keamanan dan kerahasiaan data perusahaan kami?</span>
                            <span id="faq-icon-1" class="text-lg text-purple-600 transition font-mono">+</span>
                        </button>
                        <div id="faq-answer-1" class="hidden px-5 pb-5 text-xs text-neutral-600 leading-relaxed border-t border-pastel-lavender-100 pt-3">
                            Keamanan data adalah pilar tertinggi kami. Seluruh proses pengerjaan dilindungi oleh Non-Disclosure Agreement (NDA) yang mengikat secara hukum. Akses data dilakukan melalui Virtual Private Cloud (VPC) berenkripsi TLS 1.3/AES-256 tanpa penyimpanan data sensitif di luar infrastruktur resmi Anda. Kami juga sepenuhnya patuh pada UU Pelindungan Data Pribadi (UU PDP).
                        </div>
                    </div>

                    <!-- FAQ 2 -->
                    <div class="card-luxury rounded-2xl overflow-hidden border-pastel-lavender-200">
                        <button onclick="toggleFaq(2)" class="w-full text-left p-4 sm:p-5 flex justify-between items-center gap-3 font-serif font-bold text-sm sm:text-base text-neutral-900">
                            <span>Siapakah pemilik penuh atas script pipeline dan model AI yang dibangun?</span>
                            <span id="faq-icon-2" class="text-lg text-purple-600 transition font-mono">+</span>
                        </button>
                        <div id="faq-answer-2" class="hidden px-5 pb-5 text-xs text-neutral-600 leading-relaxed border-t border-pastel-lavender-100 pt-3">
                            100% Hak Kekayaan Intelektual (IP), repository source code, model machine learning, dan konfigurasi dashboard diserahkan seutuhnya kepada perusahaan Anda begitu proyek rampung. Kami tidak menagih lisensi kepemilikan berulang.
                        </div>
                    </div>

                    <!-- FAQ 3 -->
                    <div class="card-luxury rounded-2xl overflow-hidden border-pastel-lavender-200">
                        <button onclick="toggleFaq(3)" class="w-full text-left p-4 sm:p-5 flex justify-between items-center gap-3 font-serif font-bold text-sm sm:text-base text-neutral-900">
                            <span>Apakah data kami harus dipindahkan dari sistem eksisting (ERP/CRM)?</span>
                            <span id="faq-icon-3" class="text-lg text-purple-600 transition font-mono">+</span>
                        </button>
                        <div id="faq-answer-3" class="hidden px-5 pb-5 text-xs text-neutral-600 leading-relaxed border-t border-pastel-lavender-100 pt-3">
                            Tidak. Kami menghubungkan pipeline analitik langsung ke database operasional Anda (seperti SAP, Oracle, PostgreSQL, Salesforce, HubSpot, atau flat files) menggunakan teknik Read-Replica atau ELT modern sehingga tidak mengganggu kinerja sistem operasional harian Anda sedikit pun.
                        </div>
                    </div>

                    <!-- FAQ 4 -->
                    <div class="card-luxury rounded-2xl overflow-hidden border-pastel-lavender-200">
                        <button onclick="toggleFaq(4)" class="w-full text-left p-4 sm:p-5 flex justify-between items-center gap-3 font-serif font-bold text-sm sm:text-base text-neutral-900">
                            <span>Berapa lama waktu implementasi hingga dashboard live dan siap pakai?</span>
                            <span id="faq-icon-4" class="text-lg text-purple-600 transition font-mono">+</span>
                        </button>
                        <div id="faq-answer-4" class="hidden px-5 pb-5 text-xs text-neutral-600 leading-relaxed border-t border-pastel-lavender-100 pt-3">
                            Untuk paket Sprint, prototype pertama siap ditinjau dalam 10 hari kerja, dan fully-live dalam 3–4 minggu. Untuk implementasi arsitektur enterprise menyeluruh beserta predictive AI, rata-rata durasi berkisar antara 6 hingga 8 minggu dengan milestone berkala setiap minggu.
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- ============================================================ --}}
        {{-- 11. EXECUTIVE CONSULTATION FORM --}}
        {{-- ============================================================ --}}
        <section id="consultation" class="py-20 bg-white">
            <div class="max-w-3xl mx-auto px-4 sm:px-8">
                <div class="text-center mb-10">
                    <span class="text-xs font-mono font-bold tracking-widest text-purple-600 uppercase">START YOUR JOURNEY</span>
                    <h2 class="font-serif text-2xl sm:text-4xl font-bold text-neutral-900 mt-2">
                        Jadwalkan Konsultasi Eksekutif.
                    </h2>
                    <p class="text-neutral-600 text-xs sm:text-sm mt-2">
                        Kirimkan ringkasan kebutuhan data Anda. Tim Principal Consultant kami akan merespons dalam tempo kurang dari 2 jam kerja.
                    </p>
                </div>

                <div class="card-luxury p-7 sm:p-10 rounded-3xl border-pastel-lavender-300 shadow-xl">
                    <form onsubmit="handleConsultationSubmit(event)" class="space-y-4">
                        <div class="grid sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-semibold text-neutral-700 mb-1">Nama Lengkap & Gelar *</label>
                                <input type="text" id="clientName" required placeholder="Dr. / Ir. / Nama Lengkap"
                                       class="w-full bg-pastel-lavender-50/50 border border-purple-200 rounded-xl px-3.5 py-2.5 text-xs sm:text-sm text-neutral-900 focus:outline-none focus:border-purple-500 focus:bg-white transition">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-neutral-700 mb-1">Perusahaan / Institusi *</label>
                                <input type="text" id="clientCompany" required placeholder="PT Enterprise Nusantara"
                                       class="w-full bg-pastel-lavender-50/50 border border-purple-200 rounded-xl px-3.5 py-2.5 text-xs sm:text-sm text-neutral-900 focus:outline-none focus:border-purple-500 focus:bg-white transition">
                            </div>
                        </div>

                        <div class="grid sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-semibold text-neutral-700 mb-1">Email Bisnis Resmi *</label>
                                <input type="email" id="clientEmail" required placeholder="eksekutif@perusahaan.com"
                                       class="w-full bg-pastel-lavender-50/50 border border-purple-200 rounded-xl px-3.5 py-2.5 text-xs sm:text-sm text-neutral-900 focus:outline-none focus:border-purple-500 focus:bg-white transition">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-neutral-700 mb-1">Nomor WhatsApp Aktif *</label>
                                <input type="tel" id="clientPhone" required placeholder="081234567890"
                                       class="w-full bg-pastel-lavender-50/50 border border-purple-200 rounded-xl px-3.5 py-2.5 text-xs sm:text-sm text-neutral-900 focus:outline-none focus:border-purple-500 focus:bg-white transition">
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-neutral-700 mb-1">Fokus Layanan yang Dibutuhkan</label>
                            <select id="serviceFocus" class="w-full bg-pastel-lavender-50/50 border border-purple-200 rounded-xl px-3.5 py-2.5 text-xs sm:text-sm text-neutral-900 focus:outline-none focus:border-purple-500 focus:bg-white transition">
                                <option>Executive BI & Luxury Dashboard</option>
                                <option>Predictive AI & Machine Learning Modeling</option>
                                <option>Modern Lakehouse & Data Engineering</option>
                                <option>Customer Lifetime Value & Churn Analytics</option>
                                <option>Full End-to-End Enterprise Transformation</option>
                                <option>Fractional Chief Data Officer (CDO) Advisory</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-neutral-700 mb-1">Catatan Singkat / Tantangan Data Saat Ini</label>
                            <textarea id="projectNotes" rows="3" placeholder="Sebutkan jenis database saat ini, tantangan pelaporan, atau target KPI yang ingin dicapai..."
                                      class="w-full bg-pastel-lavender-50/50 border border-purple-200 rounded-xl px-3.5 py-2.5 text-xs sm:text-sm text-neutral-900 focus:outline-none focus:border-purple-500 focus:bg-white transition"></textarea>
                        </div>

                        <button type="submit" class="btn-luxury-primary w-full font-bold py-3.5 rounded-xl transition text-xs sm:text-sm tracking-wide">
                            Kirim & Hubungkan Langsung ke WhatsApp Concierge ↗
                        </button>
                        <p class="text-[11px] text-center text-neutral-500">
                            🔒 Seluruh data dan informasi Anda dilindungi kerahasiaannya dengan standar Non-Disclosure Agreement (NDA).
                        </p>
                    </form>
                </div>
            </div>
        </section>
    </main>

    {{-- ============================================================ --}}
    {{-- 12. FOOTER --}}
    {{-- ============================================================ --}}
    <footer class="bg-neutral-950 text-neutral-400 text-xs py-14 border-t border-neutral-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 pb-10 border-b border-neutral-800">
                <div class="col-span-2 space-y-3">
                    <div class="flex items-center gap-2.5 text-white font-bold text-base tracking-tight">
                        <span class="w-7 h-7 rounded-lg bg-gradient-to-tr from-purple-500 to-pink-500 flex items-center justify-center text-white text-xs font-serif font-bold">AM</span>
                        <span class="font-serif tracking-wider">AURAMETRICS STUDIO</span>
                    </div>
                    <p class="text-neutral-500 text-xs leading-relaxed max-w-sm">
                        Konsultan analitik data enterprise bergaya Luxury dengan sentuhan Pastel Mix. Menghadirkan visualisasi bernilai tinggi, arsitektur lakehouse tangguh, dan machine learning presisi.
                    </p>
                    <div class="text-[11px] text-neutral-500 font-mono">SCBD Tower Level 28, Sudirman, Jakarta Selatan</div>
                </div>

                <div class="space-y-2.5">
                    <p class="font-bold text-white uppercase tracking-wider text-[11px]">Kapabilitas</p>
                    <ul class="space-y-1.5 text-neutral-500">
                        <li><a href="#services" class="hover:text-purple-300 transition">Executive BI</a></li>
                        <li><a href="#services" class="hover:text-purple-300 transition">Predictive AI</a></li>
                        <li><a href="#services" class="hover:text-purple-300 transition">Modern Lakehouse</a></li>
                        <li><a href="#services" class="hover:text-purple-300 transition">Fractional CDO</a></li>
                    </ul>
                </div>

                <div class="space-y-2.5">
                    <p class="font-bold text-white uppercase tracking-wider text-[11px]">Kontak VIP</p>
                    <div class="space-y-1 text-neutral-500">
                        <p>WA: +62 812-3456-7890</p>
                        <p>Email: advisory@aurametrics.studio</p>
                        <p>Senin – Jumat, 08:30 – 18:00 WIB</p>
                    </div>
                </div>
            </div>

            <div class="pt-8 flex flex-col sm:flex-row justify-between items-center gap-4 text-[11px] text-neutral-500">
                <p>&copy; 2026 AuraMetrics Studio. Seluruh hak cipta dilindungi undang-undang.</p>
                <p>Koleksi template resmi oleh <strong class="text-purple-400">WEBIA</strong></p>
            </div>
        </div>
    </footer>

    {{-- ============================================================ --}}
    {{-- 13. FLOATING WHATSAPP BUTTON (Bottom-Left) --}}
    {{-- ============================================================ --}}
    <a href="https://wa.me/6281234567890?text=Halo%20AuraMetrics%20Studio%2C%20saya%20tertarik%20konsultasi%20analitik%20data%20eksekutif."
       target="_blank" rel="noopener noreferrer"
       class="fixed bottom-6 left-6 z-50 flex items-center gap-2 bg-[#25D366] hover:bg-[#20bd5a] text-white px-4 py-3 rounded-full shadow-2xl transition font-semibold text-xs tracking-wide">
        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
        </svg>
        <span>Chat WhatsApp</span>
    </a>

    {{-- ============================================================ --}}
    {{-- 14. FLOATING AI BUTTON & MODAL (Bottom-Right) --}}
    {{-- ============================================================ --}}
    <button id="aiToggleBtn" onclick="toggleAiBot()"
            class="fixed bottom-6 right-6 z-50 flex items-center gap-2 btn-luxury-primary px-4 py-3 rounded-full shadow-2xl transition font-semibold text-xs tracking-wide">
        <span class="w-2 h-2 rounded-full bg-white animate-pulse"></span>
        <span>✦ AuraData AI</span>
    </button>

    <!-- AI Bot Modal -->
    <div id="aiBotModal" class="hidden fixed bottom-20 right-6 z-50 w-80 sm:w-96 bg-white border border-purple-200 rounded-3xl shadow-2xl overflow-hidden flex-col h-[470px] glow-pastel">
        <!-- Header -->
        <div class="bg-gradient-to-r from-purple-700 via-pink-600 to-sky-600 p-4 flex justify-between items-center text-white">
            <div class="flex items-center gap-2.5">
                <div class="w-8 h-8 rounded-xl bg-white/20 text-white border border-white/30 flex items-center justify-center text-xs font-serif font-bold">AM</div>
                <div>
                    <h4 class="font-bold text-xs font-serif">AuraData Executive AI</h4>
                    <span class="text-[10px] text-purple-100 flex items-center gap-1">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span> Online · Data Advisory Assistant
                    </span>
                </div>
            </div>
            <button onclick="toggleAiBot()" class="text-white/80 hover:text-white text-xl p-1 leading-none">&times;</button>
        </div>

        <!-- Messages Area -->
        <div id="botMessages" class="p-4 flex-1 overflow-y-auto space-y-3 text-xs bg-pastel-pearl">
            <div class="bg-white border border-purple-100 p-3.5 rounded-2xl rounded-tl-none text-neutral-800 shadow-xs leading-relaxed">
                Selamat datang di <strong class="text-purple-700">AuraMetrics Studio</strong>. Saya asisten cerdas Anda untuk konsultasi analitik data, estimasi arsitektur, dan kepatuhan enterprise.
            </div>

            <div class="space-y-1.5 pt-1">
                <p class="text-[10px] font-bold text-purple-600 uppercase tracking-wider">Topik Cepat:</p>
                <button onclick="sendQuickReply('Berapa estimasi waktu implementasi dashboard?')" class="w-full text-left bg-white hover:bg-purple-50 text-neutral-700 p-2.5 rounded-xl border border-purple-100 transition shadow-xs text-xs">
                    ⏱️ Berapa lama durasi implementasi dashboard?
                </button>
                <button onclick="sendQuickReply('Bagaimana keamanan data dan NDA perusahaan?')" class="w-full text-left bg-white hover:bg-purple-50 text-neutral-700 p-2.5 rounded-xl border border-purple-100 transition shadow-xs text-xs">
                    🔒 Bagaimana kepatuhan NDA & keamanan data?
                </button>
                <button onclick="sendQuickReply('Bisa integrasi dengan SAP / Oracle / Salesforce?')" class="w-full text-left bg-white hover:bg-purple-50 text-neutral-700 p-2.5 rounded-xl border border-purple-100 transition shadow-xs text-xs">
                    🔌 Apakah bisa dihubungkan ke SAP atau Salesforce?
                </button>
            </div>
        </div>

        <!-- Input Area -->
        <div class="p-3 bg-white border-t border-purple-100 flex gap-2">
            <input type="text" id="botInput" onkeypress="if(event.key === 'Enter') sendUserMessage()" placeholder="Ketik pertanyaan analitik data..."
                   class="flex-1 bg-pastel-lavender-50/50 border border-purple-200 rounded-xl px-3 py-2 text-xs text-neutral-900 focus:outline-none focus:border-purple-500">
            <button onclick="sendUserMessage()" class="btn-luxury-primary px-3.5 py-2 rounded-xl text-xs font-bold">
                Kirim
            </button>
        </div>
    </div>

    {{-- ============================================================ --}}
    {{-- 15. SCRIPTS (INTERACTIVITY & LOGIC) --}}
    {{-- ============================================================ --}}
    <script>
        // Mobile Menu Toggle
        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('hidden');
        }

        // Hero Dashboard Tab Switcher
        function switchHeroTab(tabId) {
            document.querySelectorAll('.hero-tab').forEach(btn => {
                btn.classList.remove('bg-purple-100', 'text-purple-900', 'border-purple-300');
                btn.classList.add('text-neutral-600', 'border-transparent');
            });

            const activeBtn = document.getElementById('tab-' + tabId);
            if (activeBtn) {
                activeBtn.classList.add('bg-purple-100', 'text-purple-900', 'border-purple-300');
                activeBtn.classList.remove('text-neutral-600', 'border-transparent');
            }

            document.querySelectorAll('.tab-content').forEach(content => {
                content.classList.add('hidden');
                content.classList.remove('block');
            });

            const activeContent = document.getElementById('content-' + tabId);
            if (activeContent) {
                activeContent.classList.remove('hidden');
                activeContent.classList.add('block');
            }
        }

        // ROI Calculator Logic
        let calcState = {
            volume: 'small',
            goal: 'bi'
        };

        const calcMatrix = {
            small: {
                bi:   { name: 'EXECUTIVE BI SPRINT', timeline: '3 – 4 Minggu', roi: '+28% Efisiensi Pelaporan', stack: 'PostgreSQL + PowerBI' },
                ai:   { name: 'PREDICTIVE SPRINT', timeline: '4 – 5 Minggu', roi: '+34% Akurasi Forecast', stack: 'Python ML + Streamlit' },
                full: { name: 'MID-BIZ LAKEHOUSE', timeline: '5 – 6 Minggu', roi: '+40% Kecepatan Data', stack: 'BigQuery + dbt + Metabase' }
            },
            medium: {
                bi:   { name: 'ENTERPRISE BI SUITE', timeline: '4 – 6 Minggu', roi: '+45% Produktivitas Tim', stack: 'Snowflake + Tableau C-Level' },
                ai:   { name: 'PREDICTIVE AI ENGINE', timeline: '6 – 8 Minggu', roi: '+48% Mitigasi Churn', stack: 'Databricks ML + Snowflake' },
                full: { name: 'SIGNATURE LAKEHOUSE SUITE', timeline: '6 – 8 Minggu', roi: '+55% Efisiensi Cloud', stack: 'Snowflake + dbt + Tableau' }
            },
            large: {
                bi:   { name: 'OMNICHANNEL CORPORATE BI', timeline: '6 – 8 Minggu', roi: '+60% Visibilitas Direksi', stack: 'Snowflake Enterprise + Looker' },
                ai:   { name: 'HIGH-FREQUENCY AI PLATFORM', timeline: '8 – 10 Minggu', roi: '+65% Akurasi Prediksi', stack: 'Databricks + Kafka Stream' },
                full: { name: 'BESPOKE PRIVATE DATA ATELIER', timeline: '10 – 12 Minggu', roi: '+70% Penghematan Query', stack: 'Modern Data Stack Terintegrasi' }
            }
        };

        function setVolume(vol, btn) {
            calcState.volume = vol;
            document.querySelectorAll('.vol-btn').forEach(b => {
                b.classList.remove('border-purple-400', 'bg-purple-50', 'text-purple-950', 'font-bold');
                b.classList.add('border-neutral-200', 'text-neutral-700', 'font-semibold');
            });
            btn.classList.add('border-purple-400', 'bg-purple-50', 'text-purple-950', 'font-bold');
            btn.classList.remove('border-neutral-200', 'text-neutral-700', 'font-semibold');
            updateCalculator();
        }

        function setGoal(goal, btn) {
            calcState.goal = goal;
            document.querySelectorAll('.goal-btn').forEach(b => {
                b.classList.remove('border-pink-400', 'bg-pink-50', 'text-pink-950', 'font-bold');
                b.classList.add('border-neutral-200', 'text-neutral-700', 'font-semibold');
            });
            btn.classList.add('border-pink-400', 'bg-pink-50', 'text-pink-950', 'font-bold');
            btn.classList.remove('border-neutral-200', 'text-neutral-700', 'font-semibold');
            updateCalculator();
        }

        function updateCalculator() {
            const data = calcMatrix[calcState.volume][calcState.goal];
            document.getElementById('calcPackageName').textContent = data.name;
            document.getElementById('calcTimeline').textContent = data.timeline;
            document.getElementById('calcRoi').textContent = data.roi;
            document.getElementById('calcStack').textContent = data.stack;

            const text = encodeURIComponent(
                `Halo AuraMetrics Studio, saya ingin konsultasi mengenai paket ${data.name} (Volume: ${calcState.volume}, Kebutuhan: ${calcState.goal}, Stack: ${data.stack}).`
            );
            document.getElementById('calcWaLink').href = `https://wa.me/6281234567890?text=${text}`;
        }

        // FAQ Toggle
        function toggleFaq(index) {
            const answer = document.getElementById(`faq-answer-${index}`);
            const icon   = document.getElementById(`faq-icon-${index}`);

            if (answer.classList.contains('hidden')) {
                answer.classList.remove('hidden');
                icon.textContent = '−';
                icon.classList.add('text-pink-600');
            } else {
                answer.classList.add('hidden');
                icon.textContent = '+';
                icon.classList.remove('text-pink-600');
            }
        }

        // Form Submit Handler
        function handleConsultationSubmit(e) {
            e.preventDefault();
            const name    = document.getElementById('clientName').value.trim();
            const company = document.getElementById('clientCompany').value.trim();
            const email   = document.getElementById('clientEmail').value.trim();
            const phone   = document.getElementById('clientPhone').value.trim();
            const focus   = document.getElementById('serviceFocus').value;
            const notes   = document.getElementById('projectNotes').value.trim();

            const text = encodeURIComponent(
                `Halo AuraMetrics Studio,\n\nSaya ingin mengajukan Konsultasi Eksekutif Data Analytics:\n` +
                `• Nama: ${name}\n` +
                `• Perusahaan: ${company}\n` +
                `• Email Bisnis: ${email}\n` +
                `• WhatsApp: ${phone}\n` +
                `• Fokus Layanan: ${focus}\n` +
                `• Catatan Singkat: ${notes || '-'}\n\n` +
                `Mohon informasi ketersediaan jadwal diskusi. Terima kasih.`
            );

            window.open(`https://wa.me/6281234567890?text=${text}`, '_blank');
        }

        // AI Assistant Functions
        function toggleAiBot() {
            const modal = document.getElementById('aiBotModal');
            modal.classList.toggle('hidden');
            modal.classList.toggle('flex');
        }

        function appendBotMessage(text, isUser = false) {
            const container = document.getElementById('botMessages');
            const div = document.createElement('div');
            if (isUser) {
                div.className = 'bg-gradient-to-r from-purple-600 to-pink-600 text-white p-3 rounded-2xl rounded-tr-none text-xs ml-auto max-w-[85%] shadow-xs leading-relaxed';
                div.textContent = text;
            } else {
                div.className = 'bg-white border border-purple-100 p-3 rounded-2xl rounded-tl-none text-neutral-800 shadow-xs leading-relaxed max-w-[90%]';
                div.innerHTML = text;
            }
            container.appendChild(div);
            container.scrollTop = container.scrollHeight;
        }

        function sendQuickReply(question) {
            appendBotMessage(question, true);
            setTimeout(() => {
                respondToQuery(question);
            }, 600);
        }

        function sendUserMessage() {
            const input = document.getElementById('botInput');
            const val = input.value.trim();
            if (!val) return;
            appendBotMessage(val, true);
            input.value = '';
            setTimeout(() => {
                respondToQuery(val);
            }, 600);
        }

        function respondToQuery(query) {
            const q = query.toLowerCase();
            let reply = '';

            if (q.includes('waktu') || q.includes('durasi') || q.includes('lama')) {
                reply = 'Untuk paket <strong>Executive BI Sprint</strong>, prototype awal siap dalam 10 hari dan final dalam <strong>3–4 minggu</strong>. Implementasi lengkap Lakehouse & AI berkisar antara <strong>6–8 minggu</strong> dengan milestone rilis berkala.';
            } else if (q.includes('keamanan') || q.includes('nda') || q.includes('bocor') || q.includes('privasi')) {
                reply = 'Kami menjamin kerahasiaan penuh dengan <strong>perjanjian Non-Disclosure (NDA)</strong> berstandar legal perbankan, enkripsi data in-transit & at-rest, serta kepatuhan penuh terhadap UU Perlindungan Data Pribadi (UU PDP).';
            } else if (q.includes('sap') || q.includes('oracle') || q.includes('salesforce') || q.includes('integrasi') || q.includes('sumber')) {
                reply = 'Ya, tentu! Kami memiliki pre-built connectors untuk <strong>SAP, Oracle, PostgreSQL, MySQL, Salesforce, Google Ads, dan sistem POS</strong> tanpa membebani performa database operasional Anda.';
            } else if (q.includes('biaya') || q.includes('harga') || q.includes('paket') || q.includes('investasi')) {
                reply = 'Paket kami dimulai dari <strong>Rp 28 Juta</strong> untuk Executive BI Sprint, <strong>Rp 65 Juta</strong> untuk Enterprise Analytics Suite, dan opsi retainership bulanan <strong>Rp 35 Juta/bulan</strong> untuk dedicated data squad.';
            } else {
                reply = `Terima kasih atas pertanyaannya. Terkait <em>"${query}"</em>, Principal Consultant kami dapat memberikan audit arsitektur data awal gratis. Anda dapat langsung terhubung via <a href="#consultation" class="text-purple-600 font-bold underline">Formulir VIP</a> atau WhatsApp kami di +62 812-3456-7890.`;
            }

            appendBotMessage(reply, false);
        }
    </script>
</body>
</html>
