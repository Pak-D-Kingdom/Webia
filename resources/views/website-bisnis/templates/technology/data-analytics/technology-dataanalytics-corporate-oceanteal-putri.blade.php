<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quantix Data Corp — Data Analytics Corporate Ocean Teal</title>
    <meta name="description" content="Quantix Data Corp adalah konsultan analitik data enterprise bergaya Corporate dengan tema Ocean Teal. Hadirkan solusi data warehouse, business intelligence, tata kelola data, dan predictive AI terpercaya untuk korporasi modern.">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                        inter: ['"Inter"', 'sans-serif'],
                        mono: ['"JetBrains Mono"', 'monospace'],
                    },
                    colors: {
                        teal: {
                            50:  '#f0fdfa',
                            100: '#ccfbf1',
                            200: '#99f6e4',
                            300: '#5eead4',
                            400: '#2dd4bf',
                            500: '#14b8a6',
                            600: '#0d9488',
                            700: '#0f766e',
                            800: '#115e59',
                            900: '#134e4a',
                            950: '#042f2e',
                        },
                        ocean: {
                            deep:    '#091823',
                            navy:    '#0e2433',
                            surface: '#f4faf9',
                            card:    '#ffffff',
                            border:  '#d1f2eb',
                            muted:   '#4c6a7d',
                            accent:  '#0284c7',
                        }
                    }
                }
            }
        }
    </script>

    <style>
        body {
            background-color: #f7fbfb;
            color: #1a2e3b;
        }

        /* Corporate Ocean Teal Glows & Accents */
        .glow-teal {
            box-shadow: 0 16px 40px -12px rgba(13, 148, 136, 0.18);
        }

        .glow-ocean-subtle {
            box-shadow: 0 10px 30px -10px rgba(15, 118, 110, 0.12);
        }

        .card-corporate {
            background: #ffffff;
            border: 1px solid #d8f0ea;
            transition: all 0.25s ease-in-out;
        }

        .card-corporate:hover {
            transform: translateY(-3px);
            border-color: #5eead4;
            box-shadow: 0 16px 36px -10px rgba(13, 148, 136, 0.16);
        }

        /* Corporate Gradient Text */
        .text-gradient-teal {
            background: linear-gradient(135deg, #0f766e 0%, #0d9488 40%, #0284c7 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Corporate Primary Button */
        .btn-teal-primary {
            background: linear-gradient(135deg, #0d9488 0%, #0f766e 100%);
            color: #ffffff;
            box-shadow: 0 4px 16px -2px rgba(13, 148, 136, 0.35);
            transition: all 0.2s ease;
        }

        .btn-teal-primary:hover {
            background: linear-gradient(135deg, #0f766e 0%, #115e59 100%);
            box-shadow: 0 8px 24px -2px rgba(13, 148, 136, 0.45);
            transform: translateY(-1px);
        }

        .btn-teal-secondary {
            background: #ffffff;
            border: 1px solid #99f6e4;
            color: #0f766e;
            transition: all 0.2s ease;
        }

        .btn-teal-secondary:hover {
            background: #f0fdfa;
            border-color: #0d9488;
            color: #115e59;
            transform: translateY(-1px);
        }

        /* Corporate Navbar */
        .navbar-corporate {
            background: rgba(255, 255, 255, 0.94);
            backdrop-filter: blur(14px);
            border-bottom: 1px solid #d8f0ea;
        }

        /* Corporate Grid Pattern */
        .grid-pattern-corporate {
            background-image:
                linear-gradient(to right, rgba(13, 148, 136, 0.05) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(13, 148, 136, 0.05) 1px, transparent 1px);
            background-size: 36px 36px;
        }
    </style>
</head>
<body class="font-sans antialiased selection:bg-teal-200 selection:text-teal-950">

    {{-- ============================================================ --}}
    {{-- 1. CORPORATE TOP BAR (GOVERNANCE & TRUST) --}}
    {{-- ============================================================ --}}
    <div class="bg-ocean-deep text-neutral-300 text-[11px] sm:text-xs py-2 px-4 border-b border-ocean-navy">
        <div class="max-w-7xl mx-auto flex flex-wrap items-center justify-between gap-2">
            <div class="flex items-center gap-3">
                <span class="inline-flex items-center gap-1.5 text-teal-400 font-semibold font-mono">
                    <span class="w-2 h-2 rounded-full bg-teal-400 animate-pulse"></span>
                    ISO/IEC 27001 & SOC-2 TYPE II CERTIFIED
                </span>
                <span class="hidden md:inline text-neutral-600">|</span>
                <span class="hidden md:inline text-neutral-400">Enterprise Data Governance & Bank-Grade Security</span>
            </div>

            <div class="flex items-center gap-4 text-neutral-400">
                <span class="hidden sm:inline">Hubungi Divisi Korporasi: <strong>+62 (021) 5088-9200</strong></span>
                <a href="#contact" class="text-teal-300 hover:text-white transition font-medium">Request RFP ↗</a>
            </div>
        </div>
    </div>

    {{-- ============================================================ --}}
    {{-- 2. NAVIGATION BAR --}}
    {{-- ============================================================ --}}
    <header class="navbar-corporate sticky top-0 z-40 transition-all duration-200 shadow-xs">
        <div class="max-w-7xl mx-auto px-4 sm:px-8 py-3.5 flex items-center justify-between">
            <!-- Corporate Brand Logo -->
            <a href="#hero" class="flex items-center gap-3 group">
                <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-teal-600 via-teal-700 to-ocean-navy p-0.5 shadow-sm">
                    <div class="w-full h-full bg-ocean-deep rounded-[10px] flex items-center justify-center">
                        <svg class="w-5 h-5 text-teal-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="18" y1="20" x2="18" y2="10"></line>
                            <line x1="12" y1="20" x2="12" y2="4"></line>
                            <line x1="6" y1="20" x2="6" y2="14"></line>
                        </svg>
                    </div>
                </div>
                <div>
                    <span class="font-extrabold text-base sm:text-lg text-neutral-900 tracking-tight block">QUANTIX DATA CORP</span>
                    <span class="text-[9px] font-mono tracking-widest text-teal-700 uppercase font-bold block -mt-1">Enterprise Analytics & Lakehouse</span>
                </div>
            </a>

            <!-- Desktop Navigation -->
            <nav class="hidden lg:flex items-center gap-6 text-xs font-semibold text-neutral-700 tracking-wide">
                <a href="#overview" class="hover:text-teal-700 transition">Solusi Korporasi</a>
                <a href="#capabilities" class="hover:text-teal-700 transition">Kapabilitas Data</a>
                <a href="#dashboard" class="hover:text-teal-700 transition">Operations Console</a>
                <a href="#industries" class="hover:text-teal-700 transition">Sektor Industri</a>
                <a href="#calculator" class="hover:text-teal-700 transition flex items-center gap-1.5">
                    <span>Estimasi Efisiensi</span>
                    <span class="px-1.5 py-0.5 rounded bg-teal-100 text-teal-800 text-[9px] font-bold">Kalkulator</span>
                </a>
                <a href="#pricing" class="hover:text-teal-700 transition">Engagement Model</a>
                <a href="#faq" class="hover:text-teal-700 transition">Tata Kelola & FAQ</a>
            </nav>

            <!-- Corporate CTA -->
            <div class="flex items-center gap-3">
                <a href="#contact" class="btn-teal-primary text-xs font-bold px-4 sm:px-5 py-2.5 rounded-xl tracking-wide hidden sm:inline-flex items-center gap-1.5">
                    <span>Konsultasi Korporasi</span>
                    <span>↗</span>
                </a>

                <button id="mobileMenuBtn" onclick="toggleMobileMenu()" class="lg:hidden p-2 text-neutral-700 hover:text-teal-700" aria-label="Toggle Menu">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobileMenu" class="hidden lg:hidden border-t border-teal-100 bg-white px-6 py-5 space-y-3 text-xs font-semibold text-neutral-800 shadow-md">
            <a href="#overview" onclick="toggleMobileMenu()" class="block py-1 hover:text-teal-700">Solusi Korporasi</a>
            <a href="#capabilities" onclick="toggleMobileMenu()" class="block py-1 hover:text-teal-700">Kapabilitas Data & BI</a>
            <a href="#dashboard" onclick="toggleMobileMenu()" class="block py-1 hover:text-teal-700">Operations Console</a>
            <a href="#industries" onclick="toggleMobileMenu()" class="block py-1 hover:text-teal-700">Sektor Industri</a>
            <a href="#calculator" onclick="toggleMobileMenu()" class="block py-1 hover:text-teal-700">Estimasi Efisiensi Proyek</a>
            <a href="#pricing" onclick="toggleMobileMenu()" class="block py-1 hover:text-teal-700">Engagement Model</a>
            <a href="#faq" onclick="toggleMobileMenu()" class="block py-1 hover:text-teal-700">Tata Kelola & FAQ</a>
            <div class="pt-2">
                <a href="#contact" onclick="toggleMobileMenu()" class="btn-teal-primary w-full text-center block text-xs font-bold py-2.5 rounded-xl">
                    Konsultasi Korporasi via WhatsApp
                </a>
            </div>
        </div>
    </header>

    <main>
        {{-- ============================================================ --}}
        {{-- 3. HERO SECTION (CORPORATE OCEAN TEAL) --}}
        {{-- ============================================================ --}}
        <section id="hero" class="relative pt-12 sm:pt-20 pb-20 overflow-hidden grid-pattern-corporate">
            <!-- Ocean Ambient Gradients -->
            <div class="absolute top-12 left-1/4 w-96 h-96 rounded-full bg-teal-200/20 blur-3xl -z-10 pointer-events-none"></div>
            <div class="absolute top-32 right-12 w-96 h-96 rounded-full bg-cyan-200/20 blur-3xl -z-10 pointer-events-none"></div>

            <div class="max-w-7xl mx-auto px-4 sm:px-8">
                <!-- Corporate Eyebrow Badge -->
                <div class="text-center max-w-3xl mx-auto mb-6">
                    <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-teal-50 border border-teal-200 text-xs font-bold text-teal-800 shadow-2xs">
                        <span class="w-2 h-2 rounded-full bg-teal-600"></span>
                        <span class="font-mono text-[11px] tracking-wider uppercase">ENTERPRISE DATA INTELLIGENCE & GOVERNANCE</span>
                    </span>
                </div>

                <!-- Main Headline & Copy -->
                <div class="text-center max-w-4xl mx-auto mb-10 space-y-4">
                    <h1 class="font-extrabold text-3xl sm:text-5xl lg:text-6xl text-neutral-900 tracking-tight leading-[1.18]">
                        Kekuatan Data Terstruktur,<br>
                        <span class="text-gradient-teal">Fondasi Keputusan Korporasi.</span>
                    </h1>
                    <p class="text-neutral-600 text-sm sm:text-base md:text-lg max-w-3xl mx-auto leading-relaxed font-normal">
                        Quantix Data Corp membangun arsitektur analitik terintegrasi untuk holding korporasi dan institusi skala besar. Menghubungkan silo data multi-sistem menjadi Single Source of Truth yang kredibel, teratur, dan sesuai regulasi.
                    </p>

                    <!-- Dual Corporate CTAs -->
                    <div class="pt-4 flex flex-col sm:flex-row items-center justify-center gap-3.5">
                        <a href="#contact" class="btn-teal-primary text-xs sm:text-sm font-bold px-7 py-3.5 rounded-xl tracking-wide inline-flex items-center gap-2">
                            <span>Jadwalkan Konsultasi Solusi Enterprise</span>
                            <span class="font-mono">↗</span>
                        </a>
                        <a href="#dashboard" class="btn-teal-secondary text-xs sm:text-sm font-bold px-7 py-3.5 rounded-xl tracking-wide inline-flex items-center gap-2">
                            <span>Tinjau Enterprise Operations Console</span>
                            <span>✦</span>
                        </a>
                    </div>
                </div>

                <!-- Enterprise Trust Strip / Badges -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-3.5 sm:gap-4 max-w-5xl mx-auto my-12">
                    <div class="card-corporate p-5 rounded-2xl text-center">
                        <span class="font-mono text-2xl sm:text-3xl font-extrabold text-teal-700 block">99.99%</span>
                        <span class="text-xs font-bold text-neutral-900 mt-1 block">Enterprise SLA Uptime</span>
                        <span class="text-[11px] text-neutral-500">Ketersediaan pipeline data 24/7</span>
                    </div>
                    <div class="card-corporate p-5 rounded-2xl text-center">
                        <span class="font-mono text-2xl sm:text-3xl font-extrabold text-teal-800 block">1.2 M+</span>
                        <span class="text-xs font-bold text-neutral-900 mt-1 block">Titik Data Harian</span>
                        <span class="text-[11px] text-neutral-500">Throughput terorkestrasi real-time</span>
                    </div>
                    <div class="card-corporate p-5 rounded-2xl text-center">
                        <span class="font-mono text-2xl sm:text-3xl font-extrabold text-teal-600 block">Rp 42 M+</span>
                        <span class="text-xs font-bold text-neutral-900 mt-1 block">Efisiensi Biaya Operasional</span>
                        <span class="text-[11px] text-neutral-500">Optimasi beban query & lisensi</span>
                    </div>
                    <div class="card-corporate p-5 rounded-2xl text-center">
                        <span class="font-mono text-2xl sm:text-3xl font-extrabold text-teal-900 block">100%</span>
                        <span class="text-xs font-bold text-neutral-900 mt-1 block">Kepatuhan Regulasi</span>
                        <span class="text-[11px] text-neutral-500">Standar audit OJK, BI & UU PDP</span>
                    </div>
                </div>

                <!-- Trusted By Sectors Strip -->
                <div class="py-6 border-t border-b border-teal-100 max-w-5xl mx-auto text-center">
                    <span class="text-[11px] font-mono uppercase tracking-wider text-neutral-500 font-semibold block mb-4">
                        Dipercaya oleh Dewan Direksi & Tim Data Lintas Sektor Strategis
                    </span>
                    <div class="flex flex-wrap items-center justify-center gap-6 sm:gap-10 text-xs sm:text-sm font-bold text-neutral-600">
                        <span class="flex items-center gap-2"><span class="w-2 h-2 rounded-full bg-teal-600"></span> Perbankan & Jasa Keuangan</span>
                        <span class="flex items-center gap-2"><span class="w-2 h-2 rounded-full bg-teal-600"></span> Konglomerasi FMCG & Retail</span>
                        <span class="flex items-center gap-2"><span class="w-2 h-2 rounded-full bg-teal-600"></span> Manufaktur & Rantai Pasok</span>
                        <span class="flex items-center gap-2"><span class="w-2 h-2 rounded-full bg-teal-600"></span> Energi, Infrastruktur & Logistik</span>
                    </div>
                </div>

                {{-- ============================================================ --}}
                {{-- 4. INTERACTIVE ENTERPRISE OPERATIONS CONSOLE --}}
                {{-- ============================================================ --}}
                <div id="dashboard" class="relative max-w-5xl mx-auto mt-14">
                    <div class="rounded-2xl p-1 bg-gradient-to-r from-teal-700 via-teal-600 to-ocean-navy shadow-xl">
                        <div class="bg-ocean-deep rounded-[14px] p-4 sm:p-6 text-white border border-teal-800/60">
                            <!-- Console Header Bar -->
                            <div class="flex flex-wrap items-center justify-between gap-3 pb-4 border-b border-ocean-navy">
                                <div class="flex items-center gap-3">
                                    <div class="flex gap-1.5">
                                        <span class="w-3 h-3 rounded-full bg-rose-500/80"></span>
                                        <span class="w-3 h-3 rounded-full bg-amber-500/80"></span>
                                        <span class="w-3 h-3 rounded-full bg-teal-400"></span>
                                    </div>
                                    <span class="text-xs font-mono font-medium text-teal-300">QUANTIX // ENTERPRISE DATA CONTROL CENTER v5.2</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-md bg-teal-950 text-teal-300 border border-teal-700/60 text-[11px] font-mono">
                                        <span class="w-2 h-2 rounded-full bg-teal-400 animate-ping"></span>
                                        LAKEHOUSE REPLICA SYNCED · 18ms
                                    </span>
                                </div>
                            </div>

                            <!-- Tabs Switcher -->
                            <div class="pt-4 pb-2 flex flex-wrap gap-2 items-center justify-between">
                                <div class="flex flex-wrap gap-2">
                                    <button onclick="switchCorporateTab('kpi')" id="tab-kpi" class="corp-tab px-3.5 py-1.5 rounded-lg text-xs font-bold transition bg-teal-600 text-white border border-teal-400">
                                        1. Konsolidasi KPI & EBITDA Holding
                                    </button>
                                    <button onclick="switchCorporateTab('governance')" id="tab-governance" class="corp-tab px-3.5 py-1.5 rounded-lg text-xs font-semibold text-neutral-300 hover:bg-ocean-navy border border-transparent transition">
                                        2. Data Governance & Audit Log
                                    </button>
                                    <button onclick="switchCorporateTab('supply')" id="tab-supply" class="corp-tab px-3.5 py-1.5 rounded-lg text-xs font-semibold text-neutral-300 hover:bg-ocean-navy border border-transparent transition">
                                        3. Supply Chain & Predictive Demand
                                    </button>
                                </div>
                                <div class="text-[11px] font-mono text-teal-300/80">
                                    Entity: <strong class="text-white">PT Holding Multinasional Tbk</strong>
                                </div>
                            </div>

                            <!-- Content Tab 1: Konsolidasi KPI -->
                            <div id="content-kpi" class="corp-tab-content block space-y-4 pt-3">
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-3.5">
                                    <div class="p-4 rounded-xl bg-ocean-navy/80 border border-teal-900">
                                        <span class="text-[11px] font-semibold text-teal-300 uppercase tracking-wider block">Konsolidasi Revenue YTD</span>
                                        <div class="flex items-baseline gap-2 mt-1">
                                            <span class="font-mono text-2xl font-bold text-white">Rp 1,42 T</span>
                                            <span class="text-xs font-bold text-teal-400 bg-teal-950 px-2 py-0.5 rounded border border-teal-800">+18.4% YoY</span>
                                        </div>
                                        <p class="text-[11px] text-neutral-400 mt-1">12 Unit Bisnis Anak Perusahaan</p>
                                    </div>
                                    <div class="p-4 rounded-xl bg-ocean-navy/80 border border-teal-900">
                                        <span class="text-[11px] font-semibold text-teal-300 uppercase tracking-wider block">EBITDA Margin Rata-rata</span>
                                        <div class="flex items-baseline gap-2 mt-1">
                                            <span class="font-mono text-2xl font-bold text-white">24.8%</span>
                                            <span class="text-xs font-bold text-teal-400 bg-teal-950 px-2 py-0.5 rounded border border-teal-800">+220 bps</span>
                                        </div>
                                        <p class="text-[11px] text-neutral-400 mt-1">Model konsolidasi real-time</p>
                                    </div>
                                    <div class="p-4 rounded-xl bg-ocean-navy/80 border border-teal-900">
                                        <span class="text-[11px] font-semibold text-teal-300 uppercase tracking-wider block">Query Cost Reduksi</span>
                                        <div class="flex items-baseline gap-2 mt-1">
                                            <span class="font-mono text-2xl font-bold text-white">-44.6%</span>
                                            <span class="text-xs font-bold text-teal-400 bg-teal-950 px-2 py-0.5 rounded border border-teal-800">Hemat Biaya</span>
                                        </div>
                                        <p class="text-[11px] text-neutral-400 mt-1">Arsitektur Lakehouse terkompresi</p>
                                    </div>
                                </div>

                                <!-- Visual Bar & Metrics -->
                                <div class="p-4 rounded-xl bg-ocean-navy/50 border border-teal-900/60">
                                    <div class="flex justify-between items-center mb-3">
                                        <div>
                                            <h4 class="text-xs sm:text-sm font-bold text-white">Kontribusi Laba Operasional per Sektor Holding</h4>
                                            <p class="text-[11px] text-neutral-400">Data terverifikasi otomatis melalui pipeline dbt Core harian</p>
                                        </div>
                                        <span class="text-[11px] font-mono text-teal-400">Aktif Terhubung SAP ERP</span>
                                    </div>
                                    <div class="space-y-2.5 pt-2">
                                        <div>
                                            <div class="flex justify-between text-xs mb-1">
                                                <span>Divisi Financial Services & FinTech</span>
                                                <span class="font-mono text-teal-300">42% (Rp 596 M)</span>
                                            </div>
                                            <div class="w-full bg-ocean-deep rounded-full h-2.5 overflow-hidden">
                                                <div class="bg-gradient-to-r from-teal-500 to-cyan-400 h-2.5 rounded-full" style="width: 42%"></div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="flex justify-between text-xs mb-1">
                                                <span>Divisi Manufaktur & Distribusi</span>
                                                <span class="font-mono text-teal-300">34% (Rp 482 M)</span>
                                            </div>
                                            <div class="w-full bg-ocean-deep rounded-full h-2.5 overflow-hidden">
                                                <div class="bg-gradient-to-r from-teal-600 to-teal-400 h-2.5 rounded-full" style="width: 34%"></div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="flex justify-between text-xs mb-1">
                                                <span>Divisi Supply Chain & Logistik</span>
                                                <span class="font-mono text-teal-300">24% (Rp 342 M)</span>
                                            </div>
                                            <div class="w-full bg-ocean-deep rounded-full h-2.5 overflow-hidden">
                                                <div class="bg-gradient-to-r from-teal-700 to-teal-500 h-2.5 rounded-full" style="width: 24%"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Content Tab 2: Governance -->
                            <div id="content-governance" class="corp-tab-content hidden space-y-4 pt-3">
                                <div class="grid sm:grid-cols-3 gap-3.5">
                                    <div class="p-4 rounded-xl bg-ocean-navy/80 border border-teal-900">
                                        <span class="text-[11px] font-semibold text-teal-300 uppercase block">PII Masking & Enkripsi</span>
                                        <span class="font-mono text-2xl font-bold text-white block mt-1">100% Enkripsi</span>
                                        <span class="text-[11px] text-teal-400 mt-1 block">Zero plain-text exposure</span>
                                    </div>
                                    <div class="p-4 rounded-xl bg-ocean-navy/80 border border-teal-900">
                                        <span class="text-[11px] font-semibold text-teal-300 uppercase block">Audit Trail Logging</span>
                                        <span class="font-mono text-2xl font-bold text-white block mt-1">Immutable Log</span>
                                        <span class="text-[11px] text-teal-400 mt-1 block">Tersimpan selama 7 tahun audit</span>
                                    </div>
                                    <div class="p-4 rounded-xl bg-ocean-navy/80 border border-teal-900">
                                        <span class="text-[11px] font-semibold text-teal-300 uppercase block">RBAC Permission Matrix</span>
                                        <span class="font-mono text-2xl font-bold text-white block mt-1">Role-Based OK</span>
                                        <span class="text-[11px] text-teal-400 mt-1 block">Akses granulasi per departemen</span>
                                    </div>
                                </div>
                                <div class="p-3.5 rounded-xl bg-ocean-navy/50 border border-teal-900 text-xs text-neutral-300">
                                    Status Kepatuhan Terkini: <strong>Sesuai UU No. 27/2022 (UU PDP) & Regulasi OJK POJK.04/2021</strong> untuk tata kelola teknologi informasi perbankan dan konglomerasi keuangan.
                                </div>
                            </div>

                            <!-- Content Tab 3: Supply Chain -->
                            <div id="content-supply" class="corp-tab-content hidden space-y-4 pt-3">
                                <div class="grid sm:grid-cols-3 gap-3.5">
                                    <div class="p-4 rounded-xl bg-ocean-navy/80 border border-teal-900">
                                        <span class="text-[11px] font-semibold text-teal-300 uppercase block">Forecast Akurasi Permintaan</span>
                                        <span class="font-mono text-2xl font-bold text-white block mt-1">96.4%</span>
                                        <span class="text-[11px] text-teal-400 mt-1 block">Deviasi stok tereduksi 28%</span>
                                    </div>
                                    <div class="p-4 rounded-xl bg-ocean-navy/80 border border-teal-900">
                                        <span class="text-[11px] font-semibold text-teal-300 uppercase block">Lead Time Pengiriman</span>
                                        <span class="font-mono text-2xl font-bold text-white block mt-1">1.8 Hari</span>
                                        <span class="text-[11px] text-teal-400 mt-1 block">Rata-rata nasional antar hub</span>
                                    </div>
                                    <div class="p-4 rounded-xl bg-ocean-navy/80 border border-teal-900">
                                        <span class="text-[11px] font-semibold text-teal-300 uppercase block">Deteksi Botol Leher (Bottleneck)</span>
                                        <span class="font-mono text-2xl font-bold text-white block mt-1">Otomatis AI</span>
                                        <span class="text-[11px] text-teal-400 mt-1 block">Peringatan dini anomali rute</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- ============================================================ --}}
        {{-- 5. CORPORATE VALUE PROPOSITION (MENGAPA QUANTIX DATA) --}}
        {{-- ============================================================ --}}
        <section id="overview" class="py-20 bg-white border-t border-b border-teal-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-8">
                <div class="text-center max-w-3xl mx-auto mb-14">
                    <span class="text-xs font-mono font-bold tracking-widest text-teal-700 uppercase">THE CORPORATE STANDARD</span>
                    <h2 class="font-extrabold text-2xl sm:text-4xl text-neutral-900 mt-2">
                        Mengapa Korporasi Memilih Quantix Data Corp.
                    </h2>
                    <p class="text-neutral-600 text-xs sm:text-sm mt-3 leading-relaxed">
                        Kami memahami kompleksitas organisasi holding multi-anak perusahaan, sistem legasi warisan puluhan tahun, dan tuntutan kepatuhan audit yang ketat.
                    </p>
                </div>

                <div class="grid md:grid-cols-4 gap-6">
                    <!-- Pillar 1 -->
                    <div class="card-corporate p-6 rounded-2xl">
                        <div class="w-10 h-10 rounded-xl bg-teal-50 border border-teal-200 text-teal-700 flex items-center justify-center font-bold text-base mb-4">
                            01
                        </div>
                        <h3 class="font-bold text-base text-neutral-900">Zero Trust Data Security</h3>
                        <p class="text-neutral-600 text-xs leading-relaxed mt-2">
                            Arsitektur tanpa kompromi dengan enkripsi in-transit & at-rest, VPC peering privat, dan isolasi jaringan data on-premise maupun hybrid cloud.
                        </p>
                    </div>

                    <!-- Pillar 2 -->
                    <div class="card-corporate p-6 rounded-2xl">
                        <div class="w-10 h-10 rounded-xl bg-teal-50 border border-teal-200 text-teal-700 flex items-center justify-center font-bold text-base mb-4">
                            02
                        </div>
                        <h3 class="font-bold text-base text-neutral-900">Konektivitas ERP Legasi</h3>
                        <p class="text-neutral-600 text-xs leading-relaxed mt-2">
                            Konektor teruji ke SAP S/4HANA, Oracle ERP, AS/400, Microsoft Dynamics, dan ratusan basis data SQL/NoSQL tanpa mengganggu proses transaksi.
                        </p>
                    </div>

                    <!-- Pillar 3 -->
                    <div class="card-corporate p-6 rounded-2xl">
                        <div class="w-10 h-10 rounded-xl bg-teal-50 border border-teal-200 text-teal-700 flex items-center justify-center font-bold text-base mb-4">
                            03
                        </div>
                        <h3 class="font-bold text-base text-neutral-900">Katalog & Tata Kelola Data</h3>
                        <p class="text-neutral-600 text-xs leading-relaxed mt-2">
                            Penyusunan Master Data Management (MDM), silsilah data (data lineage) otomatis, dan standarisasi kamus data korporasi yang siap diaudit.
                        </p>
                    </div>

                    <!-- Pillar 4 -->
                    <div class="card-corporate p-6 rounded-2xl">
                        <div class="w-10 h-10 rounded-xl bg-teal-50 border border-teal-200 text-teal-700 flex items-center justify-center font-bold text-base mb-4">
                            04
                        </div>
                        <h3 class="font-bold text-base text-neutral-900">Dedicated Enterprise COE</h3>
                        <p class="text-neutral-600 text-xs leading-relaxed mt-2">
                            Tim spesialis data scientist, data engineer senior, dan certified solutions architect dengan garansi SLA respon cepat untuk kebutuhan mendesak direksi.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        {{-- ============================================================ --}}
        {{-- 6. CORE CAPABILITIES (KAPABILITAS ANALITIK KORPORASI) --}}
        {{-- ============================================================ --}}
        <section id="capabilities" class="py-20 bg-ocean-surface">
            <div class="max-w-7xl mx-auto px-4 sm:px-8">
                <div class="flex flex-col md:flex-row md:items-end justify-between mb-14 gap-6">
                    <div>
                        <span class="text-xs font-mono font-bold tracking-widest text-teal-700 uppercase">SOLUSI STRATEGIS</span>
                        <h2 class="font-extrabold text-2xl sm:text-4xl text-neutral-900 mt-2">
                            Kapabilitas Analitik Data Skala Korporat.
                        </h2>
                    </div>
                    <p class="text-neutral-600 text-xs sm:text-sm max-w-md leading-relaxed">
                        Dirancang untuk menjawab tantangan integrasi data skala petabyte, pelaporan eksekutif, dan automasi pemodelan AI.
                    </p>
                </div>

                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Capability 1 -->
                    <div class="card-corporate p-6 rounded-2xl">
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-xs font-mono font-bold text-teal-700">SOLUSI 01</span>
                            <span class="px-2 py-0.5 rounded bg-teal-100 text-teal-800 text-[10px] font-bold">LAKEHOUSE</span>
                        </div>
                        <h3 class="font-bold text-lg text-neutral-900">Enterprise Data Warehouse & Modern Lakehouse</h3>
                        <p class="text-neutral-600 text-xs mt-2 leading-relaxed">
                            Penyusunan arsitektur data warehouse terdistribusi menggunakan Snowflake, Databricks, atau BigQuery dengan pemodelan Medallion (Bronze, Silver, Gold).
                        </p>
                        <div class="mt-4 pt-4 border-t border-teal-100 flex flex-wrap gap-1.5 text-[10px] font-mono font-semibold text-teal-800">
                            <span class="bg-teal-50 px-2 py-0.5 rounded border border-teal-200">Snowflake</span>
                            <span class="bg-teal-50 px-2 py-0.5 rounded border border-teal-200">Databricks</span>
                            <span class="bg-teal-50 px-2 py-0.5 rounded border border-teal-200">dbt Core</span>
                        </div>
                    </div>

                    <!-- Capability 2 -->
                    <div class="card-corporate p-6 rounded-2xl">
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-xs font-mono font-bold text-teal-700">SOLUSI 02</span>
                            <span class="px-2 py-0.5 rounded bg-teal-100 text-teal-800 text-[10px] font-bold">BI & REPORTING</span>
                        </div>
                        <h3 class="font-bold text-lg text-neutral-900">Executive BI & C-Level Automated Reporting</h3>
                        <p class="text-neutral-600 text-xs mt-2 leading-relaxed">
                            Dashboard interaktif berstandar eksekutif pada Tableau dan PowerBI yang menyajikan laporan laba rugi, konsolidasi arus kas, dan KPI operasional otomatis.
                        </p>
                        <div class="mt-4 pt-4 border-t border-teal-100 flex flex-wrap gap-1.5 text-[10px] font-mono font-semibold text-teal-800">
                            <span class="bg-teal-50 px-2 py-0.5 rounded border border-teal-200">PowerBI</span>
                            <span class="bg-teal-50 px-2 py-0.5 rounded border border-teal-200">Tableau Enterprise</span>
                            <span class="bg-teal-50 px-2 py-0.5 rounded border border-teal-200">Scheduled PDF</span>
                        </div>
                    </div>

                    <!-- Capability 3 -->
                    <div class="card-corporate p-6 rounded-2xl">
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-xs font-mono font-bold text-teal-700">SOLUSI 03</span>
                            <span class="px-2 py-0.5 rounded bg-teal-100 text-teal-800 text-[10px] font-bold">PREDICTIVE AI</span>
                        </div>
                        <h3 class="font-bold text-lg text-neutral-900">Predictive Modeling & Operational Risk AI</h3>
                        <p class="text-neutral-600 text-xs mt-2 leading-relaxed">
                            Pemodelan machine learning prediktif untuk estimasi pendapatan musiman, pencegahan churn pelanggan bernilai tinggi, dan mitigasi risiko default kredit.
                        </p>
                        <div class="mt-4 pt-4 border-t border-teal-100 flex flex-wrap gap-1.5 text-[10px] font-mono font-semibold text-teal-800">
                            <span class="bg-teal-50 px-2 py-0.5 rounded border border-teal-200">XGBoost</span>
                            <span class="bg-teal-50 px-2 py-0.5 rounded border border-teal-200">Time-Series</span>
                            <span class="bg-teal-50 px-2 py-0.5 rounded border border-teal-200">Scoring Engine</span>
                        </div>
                    </div>

                    <!-- Capability 4 -->
                    <div class="card-corporate p-6 rounded-2xl">
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-xs font-mono font-bold text-teal-700">SOLUSI 04</span>
                            <span class="px-2 py-0.5 rounded bg-teal-100 text-teal-800 text-[10px] font-bold">DATA GOVERNANCE</span>
                        </div>
                        <h3 class="font-bold text-lg text-neutral-900">Master Data Management & Data Quality Cleansing</h3>
                        <p class="text-neutral-600 text-xs mt-2 leading-relaxed">
                            Harmonisasi entitas pelanggan, vendor, dan produk di seluruh cabang holding untuk menghapus duplikasi data dan menghasilkan konsistensi transaksi 100%.
                        </p>
                        <div class="mt-4 pt-4 border-t border-teal-100 flex flex-wrap gap-1.5 text-[10px] font-mono font-semibold text-teal-800">
                            <span class="bg-teal-50 px-2 py-0.5 rounded border border-teal-200">MDM Hub</span>
                            <span class="bg-teal-50 px-2 py-0.5 rounded border border-teal-200">Deduplikasi</span>
                            <span class="bg-teal-50 px-2 py-0.5 rounded border border-teal-200">Data Cleansing</span>
                        </div>
                    </div>

                    <!-- Capability 5 -->
                    <div class="card-corporate p-6 rounded-2xl">
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-xs font-mono font-bold text-teal-700">SOLUSI 05</span>
                            <span class="px-2 py-0.5 rounded bg-teal-100 text-teal-800 text-[10px] font-bold">REGULATORY AUDIT</span>
                        </div>
                        <h3 class="font-bold text-lg text-neutral-900">Audit Kepatuhan UU PDP & Kredensial Perbankan</h3>
                        <p class="text-neutral-600 text-xs mt-2 leading-relaxed">
                            Penerapan kontrol data pribadi, anonimisasi otomatis, kebijakan retensi data hukum, dan kesiapan berkas pelaporan regulasi audit independen.
                        </p>
                        <div class="mt-4 pt-4 border-t border-teal-100 flex flex-wrap gap-1.5 text-[10px] font-mono font-semibold text-teal-800">
                            <span class="bg-teal-50 px-2 py-0.5 rounded border border-teal-200">UU PDP Kepatuhan</span>
                            <span class="bg-teal-50 px-2 py-0.5 rounded border border-teal-200">Audit Trail</span>
                            <span class="bg-teal-50 px-2 py-0.5 rounded border border-teal-200">PII Masking</span>
                        </div>
                    </div>

                    <!-- Capability 6 -->
                    <div class="card-corporate p-6 rounded-2xl">
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-xs font-mono font-bold text-teal-700">SOLUSI 06</span>
                            <span class="px-2 py-0.5 rounded bg-teal-100 text-teal-800 text-[10px] font-bold">STREAMING IOT</span>
                        </div>
                        <h3 class="font-bold text-lg text-neutral-900">Real-Time Event Streaming & Anomaly Detection</h3>
                        <p class="text-neutral-600 text-xs mt-2 leading-relaxed">
                            Pipeline berbasis Apache Kafka untuk memantau ribuan sensor industri, armada logistik, atau transaksi kasir secara live dengan peringatan anomali instan.
                        </p>
                        <div class="mt-4 pt-4 border-t border-teal-100 flex flex-wrap gap-1.5 text-[10px] font-mono font-semibold text-teal-800">
                            <span class="bg-teal-50 px-2 py-0.5 rounded border border-teal-200">Apache Kafka</span>
                            <span class="bg-teal-50 px-2 py-0.5 rounded border border-teal-200">Spark Streaming</span>
                            <span class="bg-teal-50 px-2 py-0.5 rounded border border-teal-200">Alert Bot</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- ============================================================ --}}
        {{-- 7. INDUSTRY VERTICALS (SEKTOR INDUSTRI) --}}
        {{-- ============================================================ --}}
        <section id="industries" class="py-20 bg-white border-t border-b border-teal-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-8">
                <div class="text-center max-w-2xl mx-auto mb-14">
                    <span class="text-xs font-mono font-bold tracking-widest text-teal-700 uppercase">INDUSTRY EXPERTISE</span>
                    <h2 class="font-extrabold text-2xl sm:text-4xl text-neutral-900 mt-2">
                        Pengalaman Teruji Lintas Sektor Industri.
                    </h2>
                    <p class="text-neutral-600 text-xs sm:text-sm mt-3">
                        Setiap industri memiliki bahasa data dan dinamika operasional yang berbeda. Kami menghadirkan solusi yang dirancang sesuai standar spesifik industri Anda.
                    </p>
                </div>

                <div class="grid md:grid-cols-2 gap-6">
                    <!-- Sector 1: Banking & Finance -->
                    <div class="card-corporate p-6 sm:p-7 rounded-2xl">
                        <div class="flex items-center gap-3 mb-3">
                            <span class="px-2.5 py-1 rounded bg-teal-100 text-teal-800 font-bold text-xs">FINANCIAL SERVICES</span>
                            <span class="text-xs font-mono text-neutral-500">Perbankan, Asuransi & Multifinance</span>
                        </div>
                        <h3 class="font-bold text-lg text-neutral-900">Credit Risk Engine & Anti-Money Laundering (AML)</h3>
                        <p class="text-neutral-600 text-xs mt-2 leading-relaxed">
                            Membangun sistem pemeringkat kredit otomatis berbasis perilaku nasabah dan deteksi dini pola transaksi mencurigakan dengan kepatuhan penuh regulasi regulator keuangan.
                        </p>
                        <div class="mt-4 pt-3 border-t border-teal-100 flex items-center justify-between text-xs">
                            <span class="text-neutral-500">Dampak terukur:</span>
                            <span class="font-mono font-bold text-teal-700">-28% Risiko Kredit Macet (NPL)</span>
                        </div>
                    </div>

                    <!-- Sector 2: FMCG & Retail -->
                    <div class="card-corporate p-6 sm:p-7 rounded-2xl">
                        <div class="flex items-center gap-3 mb-3">
                            <span class="px-2.5 py-1 rounded bg-teal-100 text-teal-800 font-bold text-xs">RETAIL & FMCG</span>
                            <span class="text-xs font-mono text-neutral-500">Jaringan Distributor & Ritel Nasional</span>
                        </div>
                        <h3 class="font-bold text-lg text-neutral-900">Peramalan Permintaan Stok & Analisis Keranjang Belanja</h3>
                        <p class="text-neutral-600 text-xs mt-2 leading-relaxed">
                            Konsolidasi data ribuan cabang dan kanal e-commerce untuk peramalan pesanan harian, optimasi penataan rak produk, dan efisiensi logistik terdistribusi.
                        </p>
                        <div class="mt-4 pt-3 border-t border-teal-100 flex items-center justify-between text-xs">
                            <span class="text-neutral-500">Dampak terukur:</span>
                            <span class="font-mono font-bold text-teal-700">+34% Perputaran Persediaan Barang</span>
                        </div>
                    </div>

                    <!-- Sector 3: Manufacturing & Supply Chain -->
                    <div class="card-corporate p-6 sm:p-7 rounded-2xl">
                        <div class="flex items-center gap-3 mb-3">
                            <span class="px-2.5 py-1 rounded bg-teal-100 text-teal-800 font-bold text-xs">MANUFACTURING</span>
                            <span class="text-xs font-mono text-neutral-500">Pabrik & Rantai Pasok Terpadu</span>
                        </div>
                        <h3 class="font-bold text-lg text-neutral-900">Overall Equipment Effectiveness (OEE) & Maintenance AI</h3>
                        <p class="text-neutral-600 text-xs mt-2 leading-relaxed">
                            Monitoring performa lini produksi secara real-time untuk memprediksi jadwal pemeliharaan mesin sebelum terjadi downtime yang merugikan.
                        </p>
                        <div class="mt-4 pt-3 border-t border-teal-100 flex items-center justify-between text-xs">
                            <span class="text-neutral-500">Dampak terukur:</span>
                            <span class="font-mono font-bold text-teal-700">-40% Waktu Berhenti Mesin Tak Terduga</span>
                        </div>
                    </div>

                    <!-- Sector 4: Energy & Telecommunications -->
                    <div class="card-corporate p-6 sm:p-7 rounded-2xl">
                        <div class="flex items-center gap-3 mb-3">
                            <span class="px-2.5 py-1 rounded bg-teal-100 text-teal-800 font-bold text-xs">ENERGY & TELCO</span>
                            <span class="text-xs font-mono text-neutral-500">Infrastruktur & Penyedia Jaringan</span>
                        </div>
                        <h3 class="font-bold text-lg text-neutral-900">Network Traffic Optimization & ESG Compliance</h3>
                        <p class="text-neutral-600 text-xs mt-2 leading-relaxed">
                            Analisis pola beban jaringan berkecepatan gigabit per detik dipadukan dengan modul otomatisasi pelaporan emisi karbon dan pemenuhan standar ESG.
                        </p>
                        <div class="mt-4 pt-3 border-t border-teal-100 flex items-center justify-between text-xs">
                            <span class="text-neutral-500">Dampak terukur:</span>
                            <span class="font-mono font-bold text-teal-700">100% Otomasi Audit Berkas ESG</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- ============================================================ --}}
        {{-- 8. INTERACTIVE CORPORATE ROI & EFFICIENCY CALCULATOR --}}
        {{-- ============================================================ --}}
        <section id="calculator" class="py-20 bg-ocean-surface">
            <div class="max-w-4xl mx-auto px-4 sm:px-8">
                <div class="text-center max-w-2xl mx-auto mb-12">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-teal-100 text-teal-900 text-[11px] font-mono font-bold uppercase tracking-wider">
                        ✦ Interactive Enterprise Tool
                    </span>
                    <h2 class="font-extrabold text-2xl sm:text-4xl text-neutral-900 mt-2">
                        Kalkulator Proyeksi Efisiensi Data Korporasi
                    </h2>
                    <p class="text-neutral-600 text-xs sm:text-sm mt-3">
                        Tentukan profil skala data dan kebutuhan arsitektur Anda untuk menghitung rekomendasi framework, durasi implementasi, dan penghematan biaya.
                    </p>
                </div>

                <div class="card-corporate p-6 sm:p-9 rounded-2xl shadow-lg border-teal-200">
                    <div class="space-y-6">
                        <!-- Parameter 1: Volume Data -->
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-teal-900 mb-2">
                                1. Skala Volume Transaksi / Catatan Data:
                            </label>
                            <div class="grid grid-cols-3 gap-2.5">
                                <button type="button" onclick="setCorpVolume('medium', this)" class="cvol-btn p-3 rounded-xl border text-center transition text-xs font-bold border-teal-500 bg-teal-50 text-teal-950">
                                    <span class="block text-sm sm:text-base font-mono">1M – 20M</span>
                                    <span class="text-[10px] font-normal text-neutral-600 block">Divisi Korporasi</span>
                                </button>
                                <button type="button" onclick="setCorpVolume('large', this)" class="cvol-btn p-3 rounded-xl border text-center transition text-xs font-semibold border-neutral-200 hover:border-teal-300 text-neutral-700">
                                    <span class="block text-sm sm:text-base font-mono">20M – 100M</span>
                                    <span class="text-[10px] font-normal text-neutral-600 block">Anak Perusahaan</span>
                                </button>
                                <button type="button" onclick="setCorpVolume('enterprise', this)" class="cvol-btn p-3 rounded-xl border text-center transition text-xs font-semibold border-neutral-200 hover:border-teal-300 text-neutral-700">
                                    <span class="block text-sm sm:text-base font-mono">100M+ Records</span>
                                    <span class="text-[10px] font-normal text-neutral-600 block">Holding Multi-Nasional</span>
                                </button>
                            </div>
                        </div>

                        <!-- Parameter 2: Kebutuhan Utama -->
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-teal-900 mb-2">
                                2. Prioritas Kebutuhan Utama:
                            </label>
                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-2.5">
                                <button type="button" onclick="setCorpGoal('bi', this)" class="cgoal-btn p-3 rounded-xl border text-left transition text-xs font-bold border-teal-500 bg-teal-50 text-teal-950">
                                    <span class="block font-bold">✦ Konsolidasi BI & KPI</span>
                                    <span class="text-[11px] font-normal text-neutral-600 block mt-0.5">Dashboard C-Suite & PowerBI</span>
                                </button>
                                <button type="button" onclick="setCorpGoal('ml', this)" class="cgoal-btn p-3 rounded-xl border text-left transition text-xs font-semibold border-neutral-200 hover:border-teal-300 text-neutral-700">
                                    <span class="block font-bold">✦ Predictive Risk AI</span>
                                    <span class="text-[11px] font-normal text-neutral-600 block mt-0.5">Scoring, Churn & Peramalan</span>
                                </button>
                                <button type="button" onclick="setCorpGoal('lakehouse', this)" class="cgoal-btn p-3 rounded-xl border text-left transition text-xs font-semibold border-neutral-200 hover:border-teal-300 text-neutral-700">
                                    <span class="block font-bold">✦ Full Lakehouse & MDM</span>
                                    <span class="text-[11px] font-normal text-neutral-600 block mt-0.5">Data Governance End-to-End</span>
                                </button>
                            </div>
                        </div>

                        <!-- Dynamic Output Box -->
                        <div class="mt-6 p-5 sm:p-6 rounded-xl bg-gradient-to-br from-teal-50/80 via-white to-cyan-50/50 border border-teal-200">
                            <div class="flex items-center justify-between pb-3 border-b border-teal-100">
                                <span class="text-xs font-bold text-teal-900 uppercase tracking-wide">Rekomendasi Arsitektur Korporat:</span>
                                <span id="corpPackageName" class="font-mono text-xs font-extrabold text-teal-800 bg-teal-100 px-2.5 py-0.5 rounded">
                                    CORPORATE BI ACCELERATION
                                </span>
                            </div>

                            <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 pt-4 text-center">
                                <div>
                                    <span class="text-[11px] text-neutral-500 block">Estimasi Timeline Rollout</span>
                                    <span id="corpTimeline" class="font-mono text-lg sm:text-xl font-bold text-neutral-900 block mt-0.5">4 – 6 Minggu</span>
                                </div>
                                <div>
                                    <span class="text-[11px] text-neutral-500 block">Proyeksi Efisiensi Biaya</span>
                                    <span id="corpSavings" class="font-mono text-lg sm:text-xl font-bold text-teal-700 block mt-0.5">+35% Query Optimization</span>
                                </div>
                                <div class="col-span-2 sm:col-span-1">
                                    <span class="text-[11px] text-neutral-500 block">Rekomendasi Tech Stack</span>
                                    <span id="corpStack" class="font-mono text-xs sm:text-sm font-bold text-teal-900 block mt-1">PostgreSQL/Snowflake + PowerBI</span>
                                </div>
                            </div>

                            <div class="pt-4 mt-4 border-t border-teal-100 flex flex-col sm:flex-row items-center justify-between gap-3">
                                <p class="text-[11px] text-neutral-600 text-center sm:text-left">
                                    Estimasi dapat diintegrasikan dengan infrastruktur eksisting cloud (AWS / Azure / GCP) perusahaan Anda.
                                </p>
                                <a id="corpWaLink" href="https://wa.me/6281234567890?text=Halo%20Quantix%20Data%20Corp%2C%20saya%20tertarik%20dengan%20rekomendasi%20kalkulator%20arsitektur%20data%20enterprise."
                                   target="_blank" rel="noopener noreferrer"
                                   class="btn-teal-primary text-xs font-bold px-5 py-2.5 rounded-xl inline-flex items-center gap-1.5 whitespace-nowrap">
                                    <span>Diskusikan Rencana Rollout ↗</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- ============================================================ --}}
        {{-- 9. CORPORATE ENGAGEMENT MODELS (PRICING) --}}
        {{-- ============================================================ --}}
        <section id="pricing" class="py-20 bg-white border-t border-b border-teal-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-8">
                <div class="text-center max-w-2xl mx-auto mb-14">
                    <span class="text-xs font-mono font-bold tracking-widest text-teal-700 uppercase">TRANSPARENT ENGAGEMENT</span>
                    <h2 class="font-extrabold text-2xl sm:text-4xl text-neutral-900 mt-2">
                        Pilihan Skema Kerjasama Korporasi.
                    </h2>
                    <p class="text-neutral-600 text-xs sm:text-sm mt-3">
                        Model pengikatan kerja profesional dengan kejelasan milestone deliverable, transfer teknologi, dan dukungan operasional pasca-implementasi.
                    </p>
                </div>

                <div class="grid md:grid-cols-3 gap-6 max-w-6xl mx-auto items-stretch">
                    <!-- Package 1: Corporate Pilot -->
                    <div class="card-corporate p-7 rounded-2xl flex flex-col justify-between">
                        <div>
                            <span class="text-xs font-mono font-bold text-teal-700 uppercase">SKEMA 01 / PILOT</span>
                            <h3 class="font-bold text-xl text-neutral-900 mt-1">Data Mart & BI Pilot</h3>
                            <p class="text-neutral-600 text-xs mt-2">Fokus akselerasi pada 1–2 divisi bisnis prioritas untuk membuktikan validitas nilai analitik data.</p>

                            <div class="mt-5 pb-5 border-b border-teal-100">
                                <span class="text-xs text-neutral-500">Mulai dari</span>
                                <div class="text-2xl sm:text-3xl font-mono font-extrabold text-neutral-900">Rp 38 Juta</div>
                                <span class="text-[11px] text-teal-700 font-semibold">Durasi implementasi 4 – 5 minggu</span>
                            </div>

                            <ul class="mt-5 space-y-2.5 text-xs text-neutral-700">
                                <li class="flex items-center gap-2"><span class="text-teal-600 font-bold">✓</span> Hingga 4 Dashboard Eksekutif Divisi</li>
                                <li class="flex items-center gap-2"><span class="text-teal-600 font-bold">✓</span> Integrasi 2 sumber data utama (ERP/CRM)</li>
                                <li class="flex items-center gap-2"><span class="text-teal-600 font-bold">✓</span> Standarisasi metrik KPI & kamus data</li>
                                <li class="flex items-center gap-2"><span class="text-teal-600 font-bold">✓</span> Transfer pengetahuan tim data internal</li>
                                <li class="flex items-center gap-2 text-neutral-400"><span>✕</span> Pemodelan predictive machine learning</li>
                            </ul>
                        </div>
                        <div class="pt-6 mt-6">
                            <a href="#contact" class="btn-teal-secondary w-full text-center block text-xs font-bold py-3 rounded-xl">
                                Pilih Skema Pilot
                            </a>
                        </div>
                    </div>

                    <!-- Package 2: Enterprise Rollout (Featured) -->
                    <div class="relative card-corporate p-7 sm:p-8 rounded-2xl flex flex-col justify-between border-2 border-teal-600 glow-teal bg-white">
                        <div class="absolute -top-3.5 left-1/2 -translate-x-1/2 px-4 py-1 rounded-md bg-teal-700 text-white font-mono text-[10px] font-extrabold tracking-wider uppercase shadow-sm">
                            ★ REKOMENDASI KORPORASI
                        </div>
                        <div>
                            <span class="text-xs font-mono font-bold text-teal-700 uppercase">SKEMA 02 / ENTERPRISE SUITE</span>
                            <h3 class="font-bold text-2xl text-neutral-900 mt-1">Enterprise Lakehouse & AI Suite</h3>
                            <p class="text-neutral-600 text-xs mt-2">Solusi konsolidasi data menyeluruh tingkat holding dengan lakehouse modern dan predictive AI.</p>

                            <div class="mt-5 pb-5 border-b border-teal-100">
                                <span class="text-xs text-neutral-500">Mulai dari</span>
                                <div class="text-2xl sm:text-3xl font-mono font-extrabold text-gradient-teal">Rp 85 Juta</div>
                                <span class="text-[11px] text-teal-700 font-semibold">Durasi implementasi 8 – 10 minggu</span>
                            </div>

                            <ul class="mt-5 space-y-2.5 text-xs text-neutral-700">
                                <li class="flex items-center gap-2"><span class="text-teal-600 font-bold">✓</span> <strong>Unlimited</strong> Dashboard Eksekutif Holding</li>
                                <li class="flex items-center gap-2"><span class="text-teal-600 font-bold">✓</span> Integrasi hingga 8 data sources (SAP, Oracle, DB, POS)</li>
                                <li class="flex items-center gap-2"><span class="text-teal-600 font-bold">✓</span> <strong>Predictive AI Model</strong> (Demand Forecast & Risk)</li>
                                <li class="flex items-center gap-2"><span class="text-teal-600 font-bold">✓</span> Modern Lakehouse (Snowflake / BigQuery + dbt)</li>
                                <li class="flex items-center gap-2"><span class="text-teal-600 font-bold">✓</span> Setup Master Data Management & Data Catalog</li>
                                <li class="flex items-center gap-2"><span class="text-teal-600 font-bold">✓</span> Garansi SLA 6 bulan & pendampingan rilis</li>
                            </ul>
                        </div>
                        <div class="pt-6 mt-6">
                            <a href="#contact" class="btn-teal-primary w-full text-center block text-xs font-bold py-3.5 rounded-xl shadow-md">
                                Ajukan Proposal Enterprise ↗
                            </a>
                        </div>
                    </div>

                    <!-- Package 3: Retainer / COE -->
                    <div class="card-corporate p-7 rounded-2xl flex flex-col justify-between">
                        <div>
                            <span class="text-xs font-mono font-bold text-teal-700 uppercase">SKEMA 03 / STRATEGIC RETAINER</span>
                            <h3 class="font-bold text-xl text-neutral-900 mt-1">Dedicated Data COE Retainer</h3>
                            <p class="text-neutral-600 text-xs mt-2">Penyediaan tim ahli data terdedikasi (Center of Excellence) untuk pemeliharaan dan inovasi berkelanjutan.</p>

                            <div class="mt-5 pb-5 border-b border-teal-100">
                                <span class="text-xs text-neutral-500">Investasi Bulanan</span>
                                <div class="text-2xl sm:text-3xl font-mono font-extrabold text-neutral-900">Rp 45 Juta<span class="text-xs text-neutral-400 font-normal">/bln</span></div>
                                <span class="text-[11px] text-teal-700 font-semibold">Komitmen kontrak 6 atau 12 bulan</span>
                            </div>

                            <ul class="mt-5 space-y-2.5 text-xs text-neutral-700">
                                <li class="flex items-center gap-2"><span class="text-teal-600 font-bold">✓</span> Dedicated Lead Data Architect & ML Engineer</li>
                                <li class="flex items-center gap-2"><span class="text-teal-600 font-bold">✓</span> Monitoring pipeline 24/7 dengan respons insiden < 15 menit</li>
                                <li class="flex items-center gap-2"><span class="text-teal-600 font-bold">✓</span> Retraining model AI & optimasi biaya cloud berkala</li>
                                <li class="flex items-center gap-2"><span class="text-teal-600 font-bold">✓</span> Penasihat strategis data untuk jajaran Direksi</li>
                            </ul>
                        </div>
                        <div class="pt-6 mt-6">
                            <a href="#contact" class="btn-teal-secondary w-full text-center block text-xs font-bold py-3 rounded-xl">
                                Request Partnership Term
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- ============================================================ --}}
        {{-- 10. CORPORATE GOVERNANCE & FAQ (ACCORDION) --}}
        {{-- ============================================================ --}}
        <section id="faq" class="py-20 bg-ocean-surface">
            <div class="max-w-3xl mx-auto px-4 sm:px-8">
                <div class="text-center mb-12">
                    <span class="text-xs font-mono font-bold tracking-widest text-teal-700 uppercase">ASSURANCE & GOVERNANCE</span>
                    <h2 class="font-extrabold text-2xl sm:text-4xl text-neutral-900 mt-2">
                        Tata Kelola Data & Pertanyaan Korporasi.
                    </h2>
                    <p class="text-neutral-600 text-xs sm:text-sm mt-2">
                        Jawaban transparan seputar kepatuhan hukum, keamanan sistem perbankan, dan proses alih kelola teknologi.
                    </p>
                </div>

                <div class="space-y-3.5">
                    <!-- FAQ 1 -->
                    <div class="card-corporate rounded-xl overflow-hidden">
                        <button onclick="toggleCorpFaq(1)" class="w-full text-left p-4 sm:p-5 flex justify-between items-center gap-3 font-bold text-sm sm:text-base text-neutral-900">
                            <span>Bagaimana prosedur penandatanganan Non-Disclosure Agreement (NDA)?</span>
                            <span id="cfaq-icon-1" class="text-lg text-teal-700 font-mono">+</span>
                        </button>
                        <div id="cfaq-answer-1" class="hidden px-5 pb-5 text-xs text-neutral-600 leading-relaxed border-t border-teal-100 pt-3">
                            Sebelum diskusi teknis mendalam atau akses ke skema data dimulai, kami menandatangani Non-Disclosure Agreement (NDA) dua arah yang mengikat secara hukum sesuai yurisdiksi Indonesia. Seluruh konsultan kami terikat klausul kerahasiaan ketat dengan sanksi hukum perdata dan pidana.
                        </div>
                    </div>

                    <!-- FAQ 2 -->
                    <div class="card-corporate rounded-xl overflow-hidden">
                        <button onclick="toggleCorpFaq(2)" class="w-full text-left p-4 sm:p-5 flex justify-between items-center gap-3 font-bold text-sm sm:text-base text-neutral-900">
                            <span>Apakah solusi ini dapat di-deploy pada infrastruktur On-Premise perusahaan?</span>
                            <span id="cfaq-icon-2" class="text-lg text-teal-700 font-mono">+</span>
                        </button>
                        <div id="cfaq-answer-2" class="hidden px-5 pb-5 text-xs text-neutral-600 leading-relaxed border-t border-teal-100 pt-3">
                            Ya. Selain arsitektur modern cloud (AWS, Azure, GCP), solusi Quantix Data Corp dapat di-deploy secara penuh di Data Center On-Premise milik perusahaan Anda, private cloud, atau arsitektur hybrid tanpa mengekspos data ke internet publik.
                        </div>
                    </div>

                    <!-- FAQ 3 -->
                    <div class="card-corporate rounded-xl overflow-hidden">
                        <button onclick="toggleCorpFaq(3)" class="w-full text-left p-4 sm:p-5 flex justify-between items-center gap-3 font-bold text-sm sm:text-base text-neutral-900">
                            <span>Bagaimana proses transfer pengetahuan dan alih kelola ke tim internal?</span>
                            <span id="cfaq-icon-3" class="text-lg text-teal-700 font-mono">+</span>
                        </button>
                        <div id="cfaq-answer-3" class="hidden px-5 pb-5 text-xs text-neutral-600 leading-relaxed border-t border-teal-100 pt-3">
                            Setiap proyek dilengkapi dengan modul dokumentasi teknis lengkap (Arsitektur ERD, kamus data, pipeline code repo, standard operating procedure / SOP). Kami menyelenggarakan workshop pelatihan intensif untuk tim data internal Anda sebelum fase Handover resmi dilakukan.
                        </div>
                    </div>

                    <!-- FAQ 4 -->
                    <div class="card-corporate rounded-xl overflow-hidden">
                        <button onclick="toggleCorpFaq(4)" class="w-full text-left p-4 sm:p-5 flex justify-between items-center gap-3 font-bold text-sm sm:text-base text-neutral-900">
                            <span>Bagaimana jaminan Service Level Agreement (SLA) untuk operasional data?</span>
                            <span id="cfaq-icon-4" class="text-lg text-teal-700 font-mono">+</span>
                        </button>
                        <div id="cfaq-answer-4" class="hidden px-5 pb-5 text-xs text-neutral-600 leading-relaxed border-t border-teal-100 pt-3">
                            Kami menyediakan kontrak SLA formal dengan jaminan ketersediaan pipeline hingga 99.99%. Untuk insiden tingkat kritis (Severity 1), tim respons darurat kami bersiaga 24/7 dengan target penanganan kurang dari 15 menit.
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- ============================================================ --}}
        {{-- 11. CORPORATE RFP & CONSULTATION FORM --}}
        {{-- ============================================================ --}}
        <section id="contact" class="py-20 bg-white">
            <div class="max-w-3xl mx-auto px-4 sm:px-8">
                <div class="text-center mb-10">
                    <span class="text-xs font-mono font-bold tracking-widest text-teal-700 uppercase">OFFICIAL ENGAGEMENT</span>
                    <h2 class="font-extrabold text-2xl sm:text-4xl text-neutral-900 mt-2">
                        Pengajuan Konsultasi & Permohonan RFP.
                    </h2>
                    <p class="text-neutral-600 text-xs sm:text-sm mt-2">
                        Silakan lengkapi formulir resmi di bawah ini. Tim Enterprise Solutions kami akan menghubungi Anda untuk koordinasi jadwal briefing teknis.
                    </p>
                </div>

                <div class="card-corporate p-6 sm:p-9 rounded-2xl border-teal-200 shadow-md">
                    <form onsubmit="handleCorporateFormSubmit(event)" class="space-y-4">
                        <div class="grid sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-neutral-700 mb-1">Nama Pejabat / Perwakilan *</label>
                                <input type="text" id="corpName" required placeholder="Nama Lengkap & Jabatan"
                                       class="w-full bg-teal-50/50 border border-teal-200 rounded-xl px-3.5 py-2.5 text-xs sm:text-sm text-neutral-900 focus:outline-none focus:border-teal-600 focus:bg-white transition">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-neutral-700 mb-1">Nama Korporasi / Institusi *</label>
                                <input type="text" id="corpCompany" required placeholder="PT Nama Korporasi Tbk"
                                       class="w-full bg-teal-50/50 border border-teal-200 rounded-xl px-3.5 py-2.5 text-xs sm:text-sm text-neutral-900 focus:outline-none focus:border-teal-600 focus:bg-white transition">
                            </div>
                        </div>

                        <div class="grid sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-neutral-700 mb-1">Email Perusahaan Resmi *</label>
                                <input type="email" id="corpEmail" required placeholder="name@perusahaan.co.id"
                                       class="w-full bg-teal-50/50 border border-teal-200 rounded-xl px-3.5 py-2.5 text-xs sm:text-sm text-neutral-900 focus:outline-none focus:border-teal-600 focus:bg-white transition">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-neutral-700 mb-1">Nomor Telepon / WhatsApp Kantor *</label>
                                <input type="tel" id="corpPhone" required placeholder="081234567890"
                                       class="w-full bg-teal-50/50 border border-teal-200 rounded-xl px-3.5 py-2.5 text-xs sm:text-sm text-neutral-900 focus:outline-none focus:border-teal-600 focus:bg-white transition">
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-neutral-700 mb-1">Fokus Kebutuhan Solusi</label>
                            <select id="corpFocus" class="w-full bg-teal-50/50 border border-teal-200 rounded-xl px-3.5 py-2.5 text-xs sm:text-sm text-neutral-900 focus:outline-none focus:border-teal-600 focus:bg-white transition">
                                <option>Enterprise Data Warehouse & Modern Lakehouse</option>
                                <option>Executive Business Intelligence & Reporting Konsolidasi</option>
                                <option>Predictive Machine Learning & Risk Modeling</option>
                                <option>Master Data Management & Data Quality Cleansing</option>
                                <option>Audit Kepatuhan UU PDP & Kredensial Perbankan</option>
                                <option>Dedicated Center of Excellence (COE) Retainer</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-neutral-700 mb-1">Gambaran Singkat Proyek / Tantangan Arsitektur</label>
                            <textarea id="corpNotes" rows="3" placeholder="Jelaskan jenis database eksisting, target timeline rollout, atau lingkup RFP..."
                                      class="w-full bg-teal-50/50 border border-teal-200 rounded-xl px-3.5 py-2.5 text-xs sm:text-sm text-neutral-900 focus:outline-none focus:border-teal-600 focus:bg-white transition"></textarea>
                        </div>

                        <button type="submit" class="btn-teal-primary w-full font-bold py-3.5 rounded-xl transition text-xs sm:text-sm tracking-wide">
                            Kirimkan Pengajuan Resmi via WhatsApp Concierge ↗
                        </button>
                        <p class="text-[11px] text-center text-neutral-500">
                            🛡️ Informasi yang Anda sampaikan dilindungi kerahasiaannya sesuai standar kerahasiaan korporasi.
                        </p>
                    </form>
                </div>
            </div>
        </section>
    </main>

    {{-- ============================================================ --}}
    {{-- 12. CORPORATE FOOTER --}}
    {{-- ============================================================ --}}
    <footer class="bg-ocean-deep text-neutral-400 text-xs py-14 border-t border-ocean-navy">
        <div class="max-w-7xl mx-auto px-4 sm:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 pb-10 border-b border-ocean-navy">
                <div class="col-span-2 space-y-3">
                    <div class="flex items-center gap-2.5 text-white font-bold text-base tracking-tight">
                        <span class="w-7 h-7 rounded bg-teal-600 flex items-center justify-center text-white text-xs font-bold">QD</span>
                        <span class="tracking-wider">QUANTIX DATA CORP</span>
                    </div>
                    <p class="text-neutral-400 text-xs leading-relaxed max-w-sm">
                        Konsultan analitik data enterprise bergaya Corporate dengan tema warna Ocean Teal. Menyediakan solusi enterprise data warehouse, tata kelola data terpadu, dan predictive AI terpercaya.
                    </p>
                    <div class="text-[11px] text-teal-400 font-mono">Menara Sudirman Lantai 32, Kawasan Niaga Terpadu SCBD, Jakarta</div>
                </div>

                <div class="space-y-2.5">
                    <p class="font-bold text-white uppercase tracking-wider text-[11px]">Kapabilitas Data</p>
                    <ul class="space-y-1.5 text-neutral-400">
                        <li><a href="#capabilities" class="hover:text-teal-300 transition">Modern Lakehouse</a></li>
                        <li><a href="#capabilities" class="hover:text-teal-300 transition">Executive BI Suite</a></li>
                        <li><a href="#capabilities" class="hover:text-teal-300 transition">Predictive Risk AI</a></li>
                        <li><a href="#capabilities" class="hover:text-teal-300 transition">Master Data Management</a></li>
                    </ul>
                </div>

                <div class="space-y-2.5">
                    <p class="font-bold text-white uppercase tracking-wider text-[11px]">Hubungan Korporasi</p>
                    <div class="space-y-1 text-neutral-400">
                        <p>Telp: +62 (021) 5088-9200</p>
                        <p>WA: +62 812-3456-7890</p>
                        <p>Email: enterprise@quantixdata.com</p>
                        <p>Senin – Jumat, 08:00 – 18:00 WIB</p>
                    </div>
                </div>
            </div>

            <div class="pt-8 flex flex-col sm:flex-row justify-between items-center gap-4 text-[11px] text-neutral-500">
                <p>&copy; 2026 Quantix Data Corp. Seluruh hak cipta dilindungi undang-undang.</p>
                <p>Koleksi template resmi oleh <strong class="text-teal-400">WEBIA</strong></p>
            </div>
        </div>
    </footer>

    {{-- ============================================================ --}}
    {{-- 13. FLOATING WHATSAPP BUTTON (Bottom-Left) --}}
    {{-- ============================================================ --}}
    <a href="https://wa.me/6281234567890?text=Halo%20Quantix%20Data%20Corp%2C%20saya%20tertarik%20konsultasi%20analitik%20data%20enterprise."
       target="_blank" rel="noopener noreferrer"
       class="fixed bottom-6 left-6 z-50 flex items-center gap-2 bg-[#0d9488] hover:bg-[#0f766e] text-white px-4 py-3 rounded-full shadow-2xl transition font-semibold text-xs tracking-wide">
        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
        </svg>
        <span>Chat WhatsApp</span>
    </a>

    {{-- ============================================================ --}}
    {{-- 14. FLOATING QUANTIX AI BUTTON & MODAL (Bottom-Right) --}}
    {{-- ============================================================ --}}
    <button id="aiToggleBtn" onclick="toggleCorpAiBot()"
            class="fixed bottom-6 right-6 z-50 flex items-center gap-2 btn-teal-primary px-4 py-3 rounded-full shadow-2xl transition font-semibold text-xs tracking-wide">
        <span class="w-2 h-2 rounded-full bg-white animate-pulse"></span>
        <span>✦ Quantix AI Assistant</span>
    </button>

    <!-- AI Modal -->
    <div id="aiCorpBotModal" class="hidden fixed bottom-20 right-6 z-50 w-80 sm:w-96 bg-white border border-teal-200 rounded-2xl shadow-2xl overflow-hidden flex-col h-[470px] glow-teal">
        <!-- Header -->
        <div class="bg-gradient-to-r from-ocean-deep via-teal-900 to-teal-800 p-4 flex justify-between items-center text-white">
            <div class="flex items-center gap-2.5">
                <div class="w-8 h-8 rounded-lg bg-teal-600 text-white flex items-center justify-center text-xs font-bold font-mono">QD</div>
                <div>
                    <h4 class="font-bold text-xs">Quantix Corporate AI</h4>
                    <span class="text-[10px] text-teal-300 flex items-center gap-1">
                        <span class="w-1.5 h-1.5 rounded-full bg-teal-400"></span> Online · Data Architecture Advisor
                    </span>
                </div>
            </div>
            <button onclick="toggleCorpAiBot()" class="text-white/80 hover:text-white text-xl p-1 leading-none">&times;</button>
        </div>

        <!-- Messages Area -->
        <div id="corpBotMessages" class="p-4 flex-1 overflow-y-auto space-y-3 text-xs bg-ocean-surface">
            <div class="bg-white border border-teal-100 p-3.5 rounded-xl rounded-tl-none text-neutral-800 shadow-xs leading-relaxed">
                Halo, saya <strong class="text-teal-800">Quantix Corporate AI</strong>. Ada yang dapat saya bantu terkait arsitektur data warehouse, konektor ERP, atau kepatuhan regulasi OJK & UU PDP?
            </div>

            <div class="space-y-1.5 pt-1">
                <p class="text-[10px] font-bold text-teal-700 uppercase tracking-wider">Pertanyaan Korporasi:</p>
                <button onclick="sendCorpQuickReply('Bagaimana keamanan data dan NDA perusahaan?')" class="w-full text-left bg-white hover:bg-teal-50 text-neutral-700 p-2.5 rounded-xl border border-teal-100 transition shadow-xs text-xs">
                    🔒 Bagaimana skema NDA & keamanan data perbankan?
                </button>
                <button onclick="sendCorpQuickReply('Bisa integrasi ke SAP S/4HANA atau Oracle ERP?')" class="w-full text-left bg-white hover:bg-teal-50 text-neutral-700 p-2.5 rounded-xl border border-teal-100 transition shadow-xs text-xs">
                    🔌 Apakah bisa dihubungkan ke SAP atau Oracle ERP?
                </button>
                <button onclick="sendCorpQuickReply('Berapa estimasi waktu implementasi Lakehouse?')" class="w-full text-left bg-white hover:bg-teal-50 text-neutral-700 p-2.5 rounded-xl border border-teal-100 transition shadow-xs text-xs">
                    ⏱️ Berapa durasi implementasi Lakehouse enterprise?
                </button>
            </div>
        </div>

        <!-- Input Area -->
        <div class="p-3 bg-white border-t border-teal-100 flex gap-2">
            <input type="text" id="corpBotInput" onkeypress="if(event.key === 'Enter') sendCorpUserMessage()" placeholder="Ketik pertanyaan analitik data..."
                   class="flex-1 bg-teal-50/50 border border-teal-200 rounded-xl px-3 py-2 text-xs text-neutral-900 focus:outline-none focus:border-teal-600">
            <button onclick="sendCorpUserMessage()" class="btn-teal-primary px-3.5 py-2 rounded-xl text-xs font-bold">
                Kirim
            </button>
        </div>
    </div>

    {{-- ============================================================ --}}
    {{-- 15. SCRIPTS --}}
    {{-- ============================================================ --}}
    <script>
        // Mobile Menu
        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('hidden');
        }

        // Corporate Tab Switcher
        function switchCorporateTab(tabId) {
            document.querySelectorAll('.corp-tab').forEach(btn => {
                btn.classList.remove('bg-teal-600', 'text-white', 'border-teal-400');
                btn.classList.add('text-neutral-300', 'border-transparent');
            });

            const activeBtn = document.getElementById('tab-' + tabId);
            if (activeBtn) {
                activeBtn.classList.add('bg-teal-600', 'text-white', 'border-teal-400');
                activeBtn.classList.remove('text-neutral-300', 'border-transparent');
            }

            document.querySelectorAll('.corp-tab-content').forEach(content => {
                content.classList.add('hidden');
                content.classList.remove('block');
            });

            const activeContent = document.getElementById('content-' + tabId);
            if (activeContent) {
                activeContent.classList.remove('hidden');
                activeContent.classList.add('block');
            }
        }

        // Corporate Calculator Logic
        let corpState = {
            vol: 'medium',
            goal: 'bi'
        };

        const corpMatrix = {
            medium: {
                bi:        { name: 'CORPORATE BI ACCELERATION', timeline: '4 – 6 Minggu', savings: '+35% Biaya Query', stack: 'PostgreSQL/Snowflake + PowerBI' },
                ml:        { name: 'PREDICTIVE PILOT SUITE', timeline: '5 – 7 Minggu', savings: '+30% Akurasi Risiko', stack: 'Python ML + Streamlit/Tableau' },
                lakehouse: { name: 'MID-ENTERPRISE LAKEHOUSE', timeline: '6 – 8 Minggu', savings: '+40% Kecepatan Laporan', stack: 'BigQuery + dbt Core + Tableau' }
            },
            large: {
                bi:        { name: 'ENTERPRISE BI CONSOLIDATION', timeline: '6 – 8 Minggu', savings: '+45% Efisiensi Lisensi', stack: 'Snowflake + PowerBI Enterprise' },
                ml:        { name: 'ENTERPRISE RISK & ML SUITE', timeline: '7 – 9 Minggu', savings: '+48% Mitigasi Kerugian', stack: 'Databricks ML + Snowflake' },
                lakehouse: { name: 'SIGNATURE ENTERPRISE LAKEHOUSE', timeline: '8 – 10 Minggu', savings: '+50% Total Cost of Ownership', stack: 'Snowflake + dbt + PowerBI' }
            },
            enterprise: {
                bi:        { name: 'HOLDING OMNICHANNEL BI', timeline: '8 – 10 Minggu', savings: '+55% Waktu Rekonsiliasi', stack: 'Snowflake + Databricks + Tableau' },
                ml:        { name: 'HIGH-FREQUENCY STREAMING AI', timeline: '10 – 12 Minggu', savings: '+60% Deteksi Anomali', stack: 'Kafka + Databricks + Real-time Hub' },
                lakehouse: { name: 'CONGLOMERATE DATA FABRIC', timeline: '12 – 14 Minggu', savings: '+65% Penghematan Cloud Terpadu', stack: 'Multi-Cloud Lakehouse & MDM Hub' }
            }
        };

        function setCorpVolume(vol, btn) {
            corpState.vol = vol;
            document.querySelectorAll('.cvol-btn').forEach(b => {
                b.classList.remove('border-teal-500', 'bg-teal-50', 'text-teal-950', 'font-bold');
                b.classList.add('border-neutral-200', 'text-neutral-700', 'font-semibold');
            });
            btn.classList.add('border-teal-500', 'bg-teal-50', 'text-teal-950', 'font-bold');
            btn.classList.remove('border-neutral-200', 'text-neutral-700', 'font-semibold');
            updateCorpCalculator();
        }

        function setCorpGoal(goal, btn) {
            corpState.goal = goal;
            document.querySelectorAll('.cgoal-btn').forEach(b => {
                b.classList.remove('border-teal-500', 'bg-teal-50', 'text-teal-950', 'font-bold');
                b.classList.add('border-neutral-200', 'text-neutral-700', 'font-semibold');
            });
            btn.classList.add('border-teal-500', 'bg-teal-50', 'text-teal-950', 'font-bold');
            btn.classList.remove('border-neutral-200', 'text-neutral-700', 'font-semibold');
            updateCorpCalculator();
        }

        function updateCorpCalculator() {
            const data = corpMatrix[corpState.vol][corpState.goal];
            document.getElementById('corpPackageName').textContent = data.name;
            document.getElementById('corpTimeline').textContent = data.timeline;
            document.getElementById('corpSavings').textContent = data.savings;
            document.getElementById('corpStack').textContent = data.stack;

            const text = encodeURIComponent(
                `Halo Quantix Data Corp, saya ingin mendiskusikan implementasi ${data.name} (Volume: ${corpState.vol}, Target: ${corpState.goal}, Stack: ${data.stack}).`
            );
            document.getElementById('corpWaLink').href = `https://wa.me/6281234567890?text=${text}`;
        }

        // Corporate FAQ Toggle
        function toggleCorpFaq(index) {
            const answer = document.getElementById(`cfaq-answer-${index}`);
            const icon   = document.getElementById(`cfaq-icon-${index}`);

            if (answer.classList.contains('hidden')) {
                answer.classList.remove('hidden');
                icon.textContent = '−';
                icon.classList.add('text-teal-600');
            } else {
                answer.classList.add('hidden');
                icon.textContent = '+';
                icon.classList.remove('text-teal-600');
            }
        }

        // Form Submit
        function handleCorporateFormSubmit(e) {
            e.preventDefault();
            const name    = document.getElementById('corpName').value.trim();
            const company = document.getElementById('corpCompany').value.trim();
            const email   = document.getElementById('corpEmail').value.trim();
            const phone   = document.getElementById('corpPhone').value.trim();
            const focus   = document.getElementById('corpFocus').value;
            const notes   = document.getElementById('corpNotes').value.trim();

            const text = encodeURIComponent(
                `Yth. Quantix Data Corp,\n\nPengajuan Konsultasi & RFP Data Analytics Enterprise:\n` +
                `• Perwakilan: ${name}\n` +
                `• Korporasi: ${company}\n` +
                `• Email Kantor: ${email}\n` +
                `• WhatsApp/Telp: ${phone}\n` +
                `• Fokus Solusi: ${focus}\n` +
                `• Lingkup Proyek: ${notes || '-'}\n\n` +
                `Mohon ditindaklanjuti untuk penjadwalan pembahasan awal. Terima kasih.`
            );

            window.open(`https://wa.me/6281234567890?text=${text}`, '_blank');
        }

        // Corporate AI Bot
        function toggleCorpAiBot() {
            const modal = document.getElementById('aiCorpBotModal');
            modal.classList.toggle('hidden');
            modal.classList.toggle('flex');
        }

        function appendCorpBotMessage(text, isUser = false) {
            const container = document.getElementById('corpBotMessages');
            const div = document.createElement('div');
            if (isUser) {
                div.className = 'bg-teal-700 text-white p-3 rounded-xl rounded-tr-none text-xs ml-auto max-w-[85%] shadow-xs leading-relaxed';
                div.textContent = text;
            } else {
                div.className = 'bg-white border border-teal-100 p-3 rounded-xl rounded-tl-none text-neutral-800 shadow-xs leading-relaxed max-w-[90%]';
                div.innerHTML = text;
            }
            container.appendChild(div);
            container.scrollTop = container.scrollHeight;
        }

        function sendCorpQuickReply(question) {
            appendCorpBotMessage(question, true);
            setTimeout(() => {
                respondToCorpQuery(question);
            }, 500);
        }

        function sendCorpUserMessage() {
            const input = document.getElementById('corpBotInput');
            const val = input.value.trim();
            if (!val) return;
            appendCorpBotMessage(val, true);
            input.value = '';
            setTimeout(() => {
                respondToCorpQuery(val);
            }, 500);
        }

        function respondToCorpQuery(query) {
            const q = query.toLowerCase();
            let reply = '';

            if (q.includes('keamanan') || q.includes('nda') || q.includes('pdp') || q.includes('privasi')) {
                reply = 'Seluruh keterlibatan dilindungi <strong>Non-Disclosure Agreement (NDA)</strong> berkekuatan hukum, kepatuhan <strong>ISO 27001</strong>, dan standar <strong>UU PDP No. 27/2022</strong> dengan enkripsi bank-grade.';
            } else if (q.includes('sap') || q.includes('oracle') || q.includes('erp') || q.includes('integrasi')) {
                reply = 'Quantix memiliki konektor native untuk <strong>SAP S/4HANA, Oracle ERP, AS/400, Microsoft Dynamics, dan Salesforce</strong> via read-replica aman tanpa mengganggu transaksi operasional.';
            } else if (q.includes('waktu') || q.includes('lama') || q.includes('durasi') || q.includes('timeline')) {
                reply = 'Paket Pilot Data Mart membutuhkan <strong>4–5 minggu</strong>, sedangkan implementasi Enterprise Lakehouse menyeluruh rata-rata <strong>8–10 minggu</strong> dengan sprint milestone berkala.';
            } else if (q.includes('biaya') || q.includes('harga') || q.includes('paket') || q.includes('investasi')) {
                reply = 'Skema investasi dimulai dari <strong>Rp 38 Juta</strong> untuk Pilot Data Mart, <strong>Rp 85 Juta</strong> untuk Enterprise Suite, atau opsi retainership <strong>Rp 45 Juta/bulan</strong> untuk Dedicated Data COE.';
            } else {
                reply = `Terima kasih atas pertanyaan Anda seputar <em>"${query}"</em>. Tim Principal Solutions Architect kami dapat menyusun telaah arsitektur awal. Silakan ajukan melalui <a href="#contact" class="text-teal-700 font-bold underline">Formulir RFP</a> atau WhatsApp kantor kami di +62 812-3456-7890.`;
            }

            appendCorpBotMessage(reply, false);
        }
    </script>
</body>
</html>
