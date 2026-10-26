<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AzuraCraft Studio — Software House Elegant Baby Blue</title>
    <meta name="description" content="AzuraCraft Studio adalah software house elegan bernuansa Baby Blue yang menghadirkan solusi digital premium untuk bisnis modern.">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        serif: ['"Playfair Display"', 'serif'],
                        sans:  ['"Inter"', 'sans-serif'],
                    },
                    colors: {
                        azure: {
                            50:  '#f0f7ff',
                            100: '#dbeeff',
                            200: '#b9deff',
                            300: '#89caff',
                            400: '#52aeff',
                            500: '#2690ff',
                            600: '#0e72f5',
                            700: '#075ce1',
                            800: '#0c4ab6',
                            900: '#11408f',
                            950: '#0d2657',
                        },
                        babyblue: {
                            light: '#e8f4fd',
                            soft:  '#c8e6f8',
                            mid:   '#89caff',
                            main:  '#52aeff',
                            deep:  '#2690ff',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        /* Elegant baby blue background */
        body { background: linear-gradient(135deg, #f0f7ff 0%, #ffffff 50%, #e8f4fd 100%); }

        .blue-glow    { box-shadow: 0 0 60px -15px rgba(38, 144, 255, 0.20); }
        .card-elegant {
            background: rgba(255,255,255,0.85);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(137, 202, 255, 0.35);
            transition: transform .3s ease, box-shadow .3s ease;
        }
        .card-elegant:hover {
            transform: translateY(-5px);
            box-shadow: 0 16px 48px -12px rgba(38, 144, 255, 0.18);
            border-color: rgba(82, 174, 255, 0.5);
        }
        .section-divider { background: linear-gradient(90deg, transparent, rgba(137,202,255,0.4), transparent); height: 1px; }
        .text-gradient-blue { background: linear-gradient(135deg, #0e72f5, #52aeff, #89caff); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; }
        .btn-elegant {
            background: linear-gradient(135deg, #0e72f5, #2690ff);
            box-shadow: 0 6px 24px -6px rgba(14, 114, 245, 0.35);
        }
        .btn-elegant:hover { background: linear-gradient(135deg, #075ce1, #0e72f5); }
        .navbar-glass {
            background: rgba(255,255,255,0.92);
            backdrop-filter: blur(16px);
            border-bottom: 1px solid rgba(137, 202, 255, 0.30);
        }
        .topbar-blue { background: linear-gradient(90deg, #0e72f5, #2690ff, #52aeff); }
        .hero-pattern {
            background-image:
                radial-gradient(circle at 20% 30%, rgba(137,202,255,0.18) 0%, transparent 60%),
                radial-gradient(circle at 80% 70%, rgba(38,144,255,0.12) 0%, transparent 50%);
        }
        .faq-icon-blue { color: #2690ff; }
    </style>
</head>
<body class="text-[#1e2d3d] antialiased font-sans">

    {{-- ============================================================ --}}
    {{-- 1. TOP BAR --}}
    {{-- ============================================================ --}}
    <div class="topbar-blue text-white text-[11px] py-2 px-4 sm:px-8">
        <div class="max-w-7xl mx-auto flex flex-wrap justify-between items-center gap-2">
            <div class="flex items-center gap-3">
                <span class="inline-flex items-center gap-1.5 bg-white/15 px-2.5 py-0.5 rounded-full font-medium">
                    <span class="w-1.5 h-1.5 rounded-full bg-white animate-pulse"></span>
                    Open for Collaboration 2026 — Elegant Baby Blue Edition
                </span>
            </div>
            <div class="flex items-center gap-5 opacity-90">
                <span>📧 hello@azuracraft.studio</span>
                <span class="hidden sm:inline">📍 Jakarta · Surabaya, Indonesia</span>
            </div>
        </div>
    </div>

    {{-- ============================================================ --}}
    {{-- 2. NAVBAR --}}
    {{-- ============================================================ --}}
    <header class="sticky top-0 z-40 navbar-glass shadow-sm shadow-azure-100/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-8 h-16 flex items-center justify-between">
            <!-- Logo -->
            <a href="#hero" class="flex items-center gap-2.5">
                <div class="w-9 h-9 rounded-xl btn-elegant flex items-center justify-center text-white font-bold text-sm shadow-md">
                    AZ
                </div>
                <span class="font-bold text-lg text-[#0d2657]">AZURA<span class="text-gradient-blue font-light">CRAFT</span></span>
            </a>

            <!-- Desktop Nav -->
            <nav class="hidden md:flex items-center gap-7 text-sm font-medium text-[#4a6585]">
                <a href="#services"  class="hover:text-azure-600 transition">Layanan</a>
                <a href="#portfolio" class="hover:text-azure-600 transition">Portfolio</a>
                <a href="#pricing"   class="hover:text-azure-600 transition">Harga</a>
                <a href="#faq"       class="hover:text-azure-600 transition">FAQ</a>
                <a href="#contact"   class="hover:text-azure-600 transition">Kontak</a>
            </nav>

            <div class="flex items-center gap-3">
                <a href="#contact" class="hidden sm:inline-flex items-center gap-1.5 btn-elegant text-white text-sm font-semibold px-5 py-2.5 rounded-xl transition">
                    Mulai Proyek <span>↗</span>
                </a>
                <button id="mobileMenuBtn" class="md:hidden p-2 text-azure-600" aria-label="Toggle Menu">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobileMenu" class="hidden md:hidden bg-white border-b border-azure-100 px-6 py-4 space-y-3 text-sm shadow-sm">
            <a href="#services"  class="block text-[#4a6585] hover:text-azure-600 py-1">Layanan</a>
            <a href="#portfolio" class="block text-[#4a6585] hover:text-azure-600 py-1">Portfolio</a>
            <a href="#pricing"   class="block text-[#4a6585] hover:text-azure-600 py-1">Harga</a>
            <a href="#faq"       class="block text-[#4a6585] hover:text-azure-600 py-1">FAQ</a>
            <a href="#contact"   class="block text-azure-600 font-semibold pt-2">Mulai Proyek ↗</a>
        </div>
    </header>

    <main>
        {{-- ============================================================ --}}
        {{-- 3. HERO SECTION --}}
        {{-- ============================================================ --}}
        <section id="hero" class="relative pt-16 pb-28 overflow-hidden hero-pattern">
            <div class="max-w-7xl mx-auto px-4 sm:px-8">
                <div class="grid lg:grid-cols-2 gap-16 items-center">
                    <!-- Hero Copy -->
                    <div class="space-y-8">
                        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-azure-50 border border-azure-200 text-azure-700 text-xs font-medium">
                            <span class="w-2 h-2 rounded-full bg-azure-400 animate-ping"></span>
                            CRAFTING ELEGANT DIGITAL EXPERIENCES
                        </div>

                        <h1 class="font-serif text-4xl sm:text-5xl lg:text-6xl font-bold text-[#0d2657] leading-[1.15]">
                            Teknologi Elegan, <br>
                            <span class="text-gradient-blue italic">Solusi</span><br>
                            Tak Terbatas.
                        </h1>

                        <p class="text-[#4a6585] text-base sm:text-lg leading-relaxed max-w-lg">
                            AzuraCraft Studio menghadirkan pengalaman digital premium — aplikasi web & mobile elegan, platform SaaS bersih, dan solusi AI yang terintegrasi sempurna.
                        </p>

                        <div class="flex flex-wrap gap-4">
                            <a href="#contact"   class="btn-elegant inline-flex items-center gap-2 text-white font-bold px-7 py-3.5 rounded-xl transition">
                                Konsultasi Gratis ↗
                            </a>
                            <a href="#portfolio" class="inline-flex items-center gap-2 bg-white hover:bg-azure-50 text-[#0d2657] border border-azure-200 font-semibold px-6 py-3.5 rounded-xl transition shadow-sm">
                                Lihat Portfolio →
                            </a>
                        </div>

                        <!-- Stats -->
                        <div class="grid grid-cols-3 gap-6 pt-6 border-t border-azure-100 max-w-md">
                            <div>
                                <div class="text-3xl font-bold text-azure-600">90+</div>
                                <div class="text-xs text-[#6b87a8] mt-0.5">Proyek Selesai</div>
                            </div>
                            <div>
                                <div class="text-3xl font-bold text-azure-500">99.9%</div>
                                <div class="text-xs text-[#6b87a8] mt-0.5">Uptime SLA</div>
                            </div>
                            <div>
                                <div class="text-3xl font-bold text-azure-700">5★</div>
                                <div class="text-xs text-[#6b87a8] mt-0.5">Rating Klien</div>
                            </div>
                        </div>
                    </div>

                    <!-- Hero Visual — Elegant Dashboard Card -->
                    <div class="hidden lg:block">
                        <div class="card-elegant rounded-3xl p-8 blue-glow">
                            <div class="flex items-center justify-between mb-6">
                                <div>
                                    <h3 class="font-serif text-lg font-bold text-[#0d2657]">AzuraCraft Dashboard</h3>
                                    <p class="text-xs text-[#6b87a8]">Elegant Enterprise Suite 2026</p>
                                </div>
                                <span class="bg-azure-50 text-azure-600 text-[10px] font-semibold px-3 py-1 rounded-full border border-azure-200">● Live</span>
                            </div>

                            <div class="space-y-4">
                                @foreach ([
                                    ['label'=>'Project Velocity','value'=>92,'color'=>'bg-azure-500'],
                                    ['label'=>'Code Quality Score','value'=>98,'color'=>'bg-azure-400'],
                                    ['label'=>'Client Satisfaction','value'=>99,'color'=>'bg-azure-300'],
                                ] as $bar)
                                <div>
                                    <div class="flex justify-between text-xs text-[#4a6585] mb-1.5">
                                        <span>{{ $bar['label'] }}</span>
                                        <span class="font-semibold text-azure-700">{{ $bar['value'] }}%</span>
                                    </div>
                                    <div class="h-2 bg-azure-50 rounded-full overflow-hidden">
                                        <div class="{{ $bar['color'] }} h-full rounded-full" style="width: {{ $bar['value'] }}%"></div>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                            <div class="mt-6 grid grid-cols-3 gap-3 text-center">
                                @foreach ([['80+','Projects'],['5yr','Experience'],['30+','Clients']] as $stat)
                                <div class="bg-azure-50 rounded-xl py-3 border border-azure-100">
                                    <div class="font-bold text-azure-700 text-lg">{{ $stat[0] }}</div>
                                    <div class="text-[10px] text-[#6b87a8] mt-0.5">{{ $stat[1] }}</div>
                                </div>
                                @endforeach
                            </div>

                            <div class="mt-5 pt-4 border-t border-azure-100 text-xs text-[#6b87a8] flex justify-between">
                                <span class="text-azure-600 flex items-center gap-1.5"><span class="w-2 h-2 rounded-full bg-azure-400"></span> Baby Blue · Elegant Style</span>
                                <span>Laravel 12 · React · AWS</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- ============================================================ --}}
        {{-- 4. SERVICES --}}
        {{-- ============================================================ --}}
        <section id="services" class="py-20 bg-white">
            <div class="section-divider mb-0"></div>
            <div class="max-w-7xl mx-auto px-4 sm:px-8 pt-20">
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <span class="text-azure-500 text-xs font-medium tracking-widest uppercase">CORE SERVICES</span>
                    <h2 class="font-serif text-3xl sm:text-4xl font-bold text-[#0d2657] mt-2">Layanan Kami yang Elegan</h2>
                    <p class="text-[#6b87a8] mt-3">Setiap solusi dirancang dengan estetika tinggi dan performa enterprise.</p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ([
                        ['icon'=>'🌐','title'=>'Custom Web Application','desc'=>'Portal B2B, SaaS multi-tenant, dashboard analitik, dan ERP terintegrasi dengan UI bersih dan elegan.','tags'=>['Laravel','React','Tailwind']],
                        ['icon'=>'📱','title'=>'Mobile App Development','desc'=>'Aplikasi iOS & Android cross-platform berkinerja native dengan desain premium dan pengalaman pengguna intuitif.','tags'=>['Flutter','React Native','GraphQL']],
                        ['icon'=>'✨','title'=>'AI & Smart Automation','desc'=>'Integrasi AI elegan — chatbot pintar, automasi dokumen, dan analitik prediktif untuk efisiensi bisnis.','tags'=>['OpenAI API','Python','Vector DB']],
                        ['icon'=>'☁️','title'=>'Cloud Architecture','desc'=>'Infrastruktur cloud premium, CI/CD pipeline otomatis, monitoring 24/7 dengan keamanan enterprise.','tags'=>['AWS','Docker','Kubernetes']],
                        ['icon'=>'🔄','title'=>'Digital Transformation','desc'=>'Modernisasi sistem warisan ke arsitektur microservices modern tanpa gangguan operasional bisnis.','tags'=>['Microservices','API Design','Migration']],
                        ['icon'=>'👥','title'=>'Elite Tech Team','desc'=>'Tim developer senior pilihan — Tech Lead, Fullstack, QA — bekerja penuh mengikuti ritme bisnis Anda.','tags'=>['Agile','Scrum','Jira']],
                    ] as $svc)
                    <div class="card-elegant rounded-2xl p-6 space-y-4">
                        <div class="w-12 h-12 rounded-xl bg-azure-50 border border-azure-100 flex items-center justify-center text-xl">
                            {{ $svc['icon'] }}
                        </div>
                        <h3 class="text-base font-bold text-[#0d2657]">{{ $svc['title'] }}</h3>
                        <p class="text-[#6b87a8] text-sm leading-relaxed">{{ $svc['desc'] }}</p>
                        <div class="flex flex-wrap gap-1.5 text-[11px] text-azure-600">
                            @foreach ($svc['tags'] as $tag)
                                <span class="bg-azure-50 px-2.5 py-0.5 rounded-full border border-azure-200 font-medium">{{ $tag }}</span>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- ============================================================ --}}
        {{-- 5. PORTFOLIO --}}
        {{-- ============================================================ --}}
        <section id="portfolio" class="py-20 bg-azure-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-8">
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <span class="text-azure-500 text-xs font-medium tracking-widest uppercase">ELEGANT RESULTS</span>
                    <h2 class="font-serif text-3xl sm:text-4xl font-bold text-[#0d2657] mt-2">Portofolio Karya Kami</h2>
                    <p class="text-[#6b87a8] mt-3">Setiap proyek adalah karya digital yang dirancang dengan penuh perhatian.</p>
                </div>

                <div class="grid md:grid-cols-3 gap-8">
                    @foreach ([
                        ['badge'=>'E-Commerce Platform','name'=>'LuxeShop ID','desc'=>'Platform marketplace premium multi-vendor dengan UX elegan, integrasi pembayaran, dan panel seller yang intuitif.','stat'=>'+250% Konversi'],
                        ['badge'=>'EdTech Platform','name'=>'BrightMind LMS','desc'=>'Sistem manajemen belajar online dengan video streaming adaptif, kuis interaktif, dan sertifikat digital.','stat'=>'50K+ Pengguna Aktif'],
                        ['badge'=>'PropTech Dashboard','name'=>'ClearView Realty','desc'=>'Dashboard properti real-time untuk agen dan investor dengan visualisasi data elegan dan notifikasi cerdas.','stat'=>'3x Produktivitas Agen'],
                    ] as $proj)
                    <div class="card-elegant rounded-2xl overflow-hidden">
                        <div class="h-44 bg-gradient-to-br from-azure-100 via-babyblue-soft to-azure-200 p-6 flex flex-col justify-between relative overflow-hidden">
                            <div class="absolute top-0 right-0 w-32 h-32 bg-azure-300/20 rounded-full -translate-y-1/2 translate-x-1/2 blur-xl"></div>
                            <span class="text-xs font-medium text-azure-700 bg-white/70 px-3 py-1 rounded-full w-fit border border-azure-200 backdrop-blur">{{ $proj['badge'] }}</span>
                            <div class="font-serif text-xl font-bold text-[#0d2657]">{{ $proj['name'] }}</div>
                        </div>
                        <div class="p-6 space-y-3">
                            <p class="text-[#6b87a8] text-sm leading-relaxed">{{ $proj['desc'] }}</p>
                            <div class="pt-3 text-xs flex justify-between border-t border-azure-100 text-[#6b87a8]">
                                <span>Hasil: <strong class="text-azure-700">{{ $proj['stat'] }}</strong></span>
                                <span class="text-azure-500 font-medium">Lihat Detail →</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- ============================================================ --}}
        {{-- 6. PRICING --}}
        {{-- ============================================================ --}}
        <section id="pricing" class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-8">
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <span class="text-azure-500 text-xs font-medium tracking-widest uppercase">INVESTMENT PLANS</span>
                    <h2 class="font-serif text-3xl sm:text-4xl font-bold text-[#0d2657] mt-2">Paket Harga Transparan</h2>
                    <p class="text-[#6b87a8] mt-3">Semua paket mencakup garansi bug & 100% source code milik Anda.</p>
                </div>

                <div class="grid md:grid-cols-3 gap-8 items-stretch">
                    <!-- Starter -->
                    <div class="card-elegant rounded-2xl p-7 flex flex-col justify-between">
                        <div class="space-y-4">
                            <span class="text-xs font-medium text-[#6b87a8] uppercase tracking-wider">MVP & PROTOTYPE</span>
                            <h3 class="font-serif text-xl font-bold text-[#0d2657]">Starter Elegant</h3>
                            <p class="text-[#6b87a8] text-xs leading-relaxed">Ideal untuk validasi ide bisnis dalam waktu 3–4 minggu.</p>
                            <div class="text-3xl font-bold text-[#0d2657] pt-2">Rp25jt <span class="text-sm font-normal text-[#6b87a8]">/ project</span></div>
                            <ul class="text-xs text-[#4a6585] space-y-2 pt-4 border-t border-azure-100">
                                <li class="flex items-center gap-2"><span class="text-azure-500">✔</span> Web App Responsive</li>
                                <li class="flex items-center gap-2"><span class="text-azure-500">✔</span> Hingga 5 Modul Inti</li>
                                <li class="flex items-center gap-2"><span class="text-azure-500">✔</span> Integrasi WhatsApp API</li>
                                <li class="flex items-center gap-2"><span class="text-azure-500">✔</span> Setup VPS & SSL</li>
                                <li class="flex items-center gap-2"><span class="text-azure-500">✔</span> 1 Bulan Bug Fix</li>
                            </ul>
                        </div>
                        <a href="#contact" class="mt-8 block text-center bg-azure-50 hover:bg-azure-100 text-azure-700 border border-azure-200 font-semibold py-3 rounded-xl transition text-sm">Pilih Starter</a>
                    </div>

                    <!-- Business (Featured) -->
                    <div class="rounded-2xl p-7 flex flex-col justify-between relative shadow-xl blue-glow bg-gradient-to-b from-azure-600 to-azure-800 text-white border border-azure-400/20">
                        <div class="absolute -top-3.5 left-1/2 -translate-x-1/2 bg-white text-azure-700 text-[11px] font-bold px-4 py-1 rounded-full uppercase tracking-wider shadow-md">
                            PALING POPULAR
                        </div>
                        <div class="space-y-4">
                            <span class="text-xs font-medium text-azure-200 uppercase tracking-wider">ENTERPRISE READY</span>
                            <h3 class="font-serif text-xl font-bold">Business Elegant</h3>
                            <p class="text-azure-100 text-xs leading-relaxed">Sistem custom komprehensif dengan dashboard multi-role dan performa tinggi.</p>
                            <div class="text-3xl font-bold pt-2">Rp55jt <span class="text-sm font-normal text-azure-200">/ project</span></div>
                            <ul class="text-xs text-azure-100 space-y-2 pt-4 border-t border-azure-500/40">
                                <li class="flex items-center gap-2"><span class="text-azure-200">✔</span> Full Custom Web & Mobile App</li>
                                <li class="flex items-center gap-2"><span class="text-azure-200">✔</span> Arsitektur Database Premium</li>
                                <li class="flex items-center gap-2"><span class="text-azure-200">✔</span> Multi-role RBAC & Audit</li>
                                <li class="flex items-center gap-2"><span class="text-azure-200">✔</span> Integrasi AI / Chatbot</li>
                                <li class="flex items-center gap-2"><span class="text-azure-200">✔</span> Setup Docker CI/CD</li>
                                <li class="flex items-center gap-2"><span class="text-azure-200">✔</span> 3 Bulan Garansi SLA</li>
                            </ul>
                        </div>
                        <a href="#contact" class="mt-8 block text-center bg-white text-azure-700 hover:bg-azure-50 font-bold py-3.5 rounded-xl transition text-sm shadow-lg">Konsultasi Sekarang ↗</a>
                    </div>

                    <!-- Elite Squad -->
                    <div class="card-elegant rounded-2xl p-7 flex flex-col justify-between">
                        <div class="space-y-4">
                            <span class="text-xs font-medium text-[#6b87a8] uppercase tracking-wider">ELITE TEAM</span>
                            <h3 class="font-serif text-xl font-bold text-[#0d2657]">Elite Squad</h3>
                            <p class="text-[#6b87a8] text-xs leading-relaxed">Tim developer pilihan yang bekerja penuh untuk roadmap bisnis Anda.</p>
                            <div class="text-3xl font-bold text-[#0d2657] pt-2">Rp40jt <span class="text-sm font-normal text-[#6b87a8]">/ bulan</span></div>
                            <ul class="text-xs text-[#4a6585] space-y-2 pt-4 border-t border-azure-100">
                                <li class="flex items-center gap-2"><span class="text-azure-500">✔</span> 2–4 Senior Engineers</li>
                                <li class="flex items-center gap-2"><span class="text-azure-500">✔</span> Agile Sprint Fleksibel</li>
                                <li class="flex items-center gap-2"><span class="text-azure-500">✔</span> Code Review & QA</li>
                                <li class="flex items-center gap-2"><span class="text-azure-500">✔</span> Weekly Demo Report</li>
                                <li class="flex items-center gap-2"><span class="text-azure-500">✔</span> Slack & Jira Access</li>
                            </ul>
                        </div>
                        <a href="#contact" class="mt-8 block text-center bg-azure-50 hover:bg-azure-100 text-azure-700 border border-azure-200 font-semibold py-3 rounded-xl transition text-sm">Diskusi Squad</a>
                    </div>
                </div>
            </div>
        </section>

        {{-- ============================================================ --}}
        {{-- 7. FAQ --}}
        {{-- ============================================================ --}}
        <section id="faq" class="py-20 bg-azure-50">
            <div class="max-w-4xl mx-auto px-4 sm:px-8">
                <div class="text-center mb-14">
                    <span class="text-azure-500 text-xs font-medium tracking-widest uppercase">QUESTIONS & ANSWERS</span>
                    <h2 class="font-serif text-3xl font-bold text-[#0d2657] mt-2">Frequently Asked Questions</h2>
                    <p class="text-[#6b87a8] text-sm mt-2">Semua yang perlu Anda ketahui sebelum memulai proyek bersama kami.</p>
                </div>

                <div class="space-y-4">
                    @foreach ([
                        ['q'=>'1. Siapa pemilik source code setelah proyek selesai?','a'=>'Source code 100% milik Anda setelah pelunasan. Kami menyerahkan seluruh repositori Git, dokumentasi arsitektur, dan akses server tanpa biaya lisensi atau royalti tersembunyi.'],
                        ['q'=>'2. Berapa lama rata-rata durasi pengerjaan aplikasi?','a'=>'Paket Starter Elegant berkisar 3–5 minggu. Sistem Business Elegant atau enterprise biasanya 2–4 bulan, tergantung kompleksitas modul dan jumlah integrasi pihak ketiga.'],
                        ['q'=>'3. Bagaimana mekanisme pembayaran proyek?','a'=>'Kami menggunakan sistem termin berbasis milestone: DP 30% saat kickoff, 30% setelah prototype disetujui, 30% saat fase UAT, dan 10% final setelah live deployment.'],
                        ['q'=>'4. Apakah ada garansi setelah aplikasi diluncurkan?','a'=>'Ya, setiap proyek mendapat garansi bug fix gratis 30–90 hari. Tersedia juga kontrak SLA Maintenance bulanan untuk monitoring keamanan dan pengembangan fitur lanjutan.'],
                        ['q'=>'5. Apakah AzuraCraft bisa menangani legacy system?','a'=>'Tentu! Tim kami akan melakukan Code Audit komprehensif untuk menganalisis keamanan, performa database, dan technical debt, lalu merancang strategi modernisasi yang aman dan bertahap.'],
                    ] as $faq)
                    <div class="card-elegant rounded-xl overflow-hidden">
                        <button type="button" class="faq-toggle w-full p-5 text-left flex justify-between items-center text-sm font-semibold text-[#0d2657] hover:text-azure-600 transition" onclick="toggleFaq(this)">
                            <span>{{ $faq['q'] }}</span>
                            <span class="faq-icon faq-icon-blue text-xl font-light flex-shrink-0 ml-3">+</span>
                        </button>
                        <div class="faq-answer hidden px-5 pb-5 text-sm text-[#6b87a8] leading-relaxed border-t border-azure-100 pt-3">
                            {{ $faq['a'] }}
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- ============================================================ --}}
        {{-- 8. CONTACT FORM --}}
        {{-- ============================================================ --}}
        <section id="contact" class="py-20 bg-white">
            <div class="max-w-3xl mx-auto px-4 sm:px-8">
                <div class="card-elegant rounded-3xl p-8 sm:p-12 blue-glow">
                    <div class="text-center mb-10">
                        <span class="text-azure-500 text-xs font-medium tracking-widest uppercase">PROJECT INITIATION</span>
                        <h2 class="font-serif text-2xl sm:text-3xl font-bold text-[#0d2657] mt-2">Mulai Proyek Anda Hari Ini</h2>
                        <p class="text-[#6b87a8] text-sm mt-2">Tim kami akan merespons dalam 1×24 jam kerja.</p>
                    </div>

                    <form id="projectForm" onsubmit="handleFormSubmit(event)" class="space-y-5">
                        <div class="grid sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-medium text-[#4a6585] mb-1.5">Nama Lengkap *</label>
                                <input type="text" id="clientName" required placeholder="Contoh: Putri Ayu" class="w-full bg-azure-50 border border-azure-200 rounded-xl px-4 py-2.5 text-sm text-[#0d2657] placeholder-[#9ab5cc] focus:outline-none focus:border-azure-500 focus:bg-white transition">
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-[#4a6585] mb-1.5">Perusahaan / Bisnis *</label>
                                <input type="text" id="clientCompany" required placeholder="PT Inovasi Nusantara" class="w-full bg-azure-50 border border-azure-200 rounded-xl px-4 py-2.5 text-sm text-[#0d2657] placeholder-[#9ab5cc] focus:outline-none focus:border-azure-500 focus:bg-white transition">
                            </div>
                        </div>
                        <div class="grid sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-medium text-[#4a6585] mb-1.5">Email Bisnis *</label>
                                <input type="email" id="clientEmail" required placeholder="putri@perusahaan.co.id" class="w-full bg-azure-50 border border-azure-200 rounded-xl px-4 py-2.5 text-sm text-[#0d2657] placeholder-[#9ab5cc] focus:outline-none focus:border-azure-500 focus:bg-white transition">
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-[#4a6585] mb-1.5">Nomor WhatsApp *</label>
                                <input type="tel" id="clientPhone" required placeholder="081234567890" class="w-full bg-azure-50 border border-azure-200 rounded-xl px-4 py-2.5 text-sm text-[#0d2657] placeholder-[#9ab5cc] focus:outline-none focus:border-azure-500 focus:bg-white transition">
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-[#4a6585] mb-1.5">Tipe Layanan</label>
                            <select id="projectType" class="w-full bg-azure-50 border border-azure-200 rounded-xl px-4 py-2.5 text-sm text-[#0d2657] focus:outline-none focus:border-azure-500 focus:bg-white transition">
                                <option>Aplikasi Web Kustom (SaaS / Portal)</option>
                                <option>Aplikasi Mobile (iOS & Android)</option>
                                <option>Integrasi AI & Automasi</option>
                                <option>Digital Transformation & Cloud</option>
                                <option>Elite Tech Squad</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-[#4a6585] mb-1.5">Ceritakan Kebutuhan Anda</label>
                            <textarea id="projectNotes" rows="3" placeholder="Gambarkan tujuan proyek, timeline, atau preferensi teknologi..." class="w-full bg-azure-50 border border-azure-200 rounded-xl px-4 py-2.5 text-sm text-[#0d2657] placeholder-[#9ab5cc] focus:outline-none focus:border-azure-500 focus:bg-white transition"></textarea>
                        </div>
                        <button type="submit" class="btn-elegant w-full text-white font-bold py-3.5 rounded-xl transition text-sm">
                            Kirim via WhatsApp ↗
                        </button>
                        <p class="text-[11px] text-center text-[#6b87a8]">Data Anda dijamin kerahasiaannya melalui perjanjian NDA.</p>
                    </form>
                </div>
            </div>
        </section>
    </main>

    {{-- ============================================================ --}}
    {{-- 9. FOOTER --}}
    {{-- ============================================================ --}}
    <footer class="bg-[#0d2657] text-azure-200 text-xs py-14">
        <div class="max-w-7xl mx-auto px-4 sm:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 pb-10 border-b border-azure-700/40">
                <div class="col-span-2 space-y-3">
                    <div class="flex items-center gap-2 text-white font-bold text-lg font-serif">
                        <span class="text-azure-300">AZ/</span> AZURACRAFT STUDIO
                    </div>
                    <p class="text-azure-300 leading-relaxed max-w-sm text-xs">
                        Software house elegan berlatar Baby Blue untuk akselerasi produk digital premium, SaaS, dan transformasi sistem bisnis modern.
                    </p>
                    <div class="text-[11px] text-azure-400">Jakarta · Surabaya, Indonesia</div>
                </div>

                <div class="space-y-2.5">
                    <p class="font-bold text-white uppercase tracking-wider">Layanan</p>
                    <ul class="space-y-1.5">
                        <li><a href="#services" class="hover:text-azure-300 transition">Web Application</a></li>
                        <li><a href="#services" class="hover:text-azure-300 transition">Mobile App</a></li>
                        <li><a href="#services" class="hover:text-azure-300 transition">AI Automation</a></li>
                        <li><a href="#services" class="hover:text-azure-300 transition">Cloud Architecture</a></li>
                    </ul>
                </div>

                <div class="space-y-2.5">
                    <p class="font-bold text-white uppercase tracking-wider">Hubungi Kami</p>
                    <div class="space-y-1 text-azure-300">
                        <p>WhatsApp: +62 812-3456-7890</p>
                        <p>Email: hello@azuracraft.studio</p>
                        <p>Jam: Sen–Jum 09.00–18.00 WIB</p>
                    </div>
                </div>
            </div>

            <div class="pt-8 flex flex-col sm:flex-row justify-between items-center gap-4 text-[11px] text-azure-400">
                <p>&copy; 2026 AzuraCraft Studio. All rights reserved.</p>
                <p class="text-azure-300">Website template by <strong class="text-white">WEBIA</strong></p>
            </div>
        </div>
    </footer>

    {{-- ============================================================ --}}
    {{-- 10. FLOATING WA BUTTON --}}
    {{-- ============================================================ --}}
    <a href="https://wa.me/6281234567890?text=Halo%20AzuraCraft%20Studio%2C%20saya%20ingin%20konsultasi%20pembuatan%20software." target="_blank" rel="noopener noreferrer"
       class="fixed bottom-6 left-6 z-50 flex items-center gap-2 bg-[#25D366] hover:bg-[#20bd5a] text-white px-4 py-3 rounded-full shadow-2xl transition font-semibold text-xs tracking-wide">
        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
        </svg>
        <span>Chat WhatsApp</span>
    </a>

    {{-- ============================================================ --}}
    {{-- 11. FLOATING AI BUTTON --}}
    {{-- ============================================================ --}}
    <button id="aiToggleBtn" onclick="toggleAiBot()"
            class="fixed bottom-6 right-6 z-50 flex items-center gap-2.5 btn-elegant text-white px-4 py-3 rounded-full shadow-2xl transition font-semibold text-xs tracking-wide">
        <span class="w-2 h-2 rounded-full bg-white animate-pulse"></span>
        <span>✦ AzuraCraft AI</span>
    </button>

    <!-- AI Bot Modal -->
    <div id="aiBotModal" class="hidden fixed bottom-20 right-6 z-50 w-80 sm:w-96 bg-white border border-azure-200 rounded-2xl shadow-2xl overflow-hidden flex-col h-[460px] blue-glow">
        <!-- Header -->
        <div class="bg-gradient-to-r from-azure-600 to-azure-500 p-3.5 flex justify-between items-center text-white">
            <div class="flex items-center gap-2">
                <div class="w-7 h-7 rounded-lg bg-white/20 text-white border border-white/30 flex items-center justify-center text-xs font-bold">AZ</div>
                <div>
                    <h4 class="font-bold text-xs">AzuraCraft AI Assistant</h4>
                    <span class="text-[10px] text-azure-100 flex items-center gap-1">
                        <span class="w-1.5 h-1.5 rounded-full bg-white"></span> Online · FAQ & Estimator
                    </span>
                </div>
            </div>
            <button onclick="toggleAiBot()" class="text-white/70 hover:text-white text-lg p-1">&times;</button>
        </div>

        <!-- Messages -->
        <div id="botMessages" class="p-4 flex-1 overflow-y-auto space-y-3 text-xs font-sans bg-azure-50">
            <div class="bg-white border border-azure-100 p-3 rounded-2xl rounded-tl-none text-[#4a6585] shadow-sm">
                Halo! 👋 Saya <strong class="text-azure-700">AzuraCraft AI</strong>. Ada yang ingin ditanyakan soal estimasi biaya, tech stack, atau proses pengerjaan?
            </div>
            <div class="space-y-1.5 pt-1">
                <p class="text-[10px] font-medium text-azure-500 uppercase">Pertanyaan Cepat:</p>
                <button onclick="sendQuickReply('Berapa estimasi biaya aplikasi?')" class="w-full text-left bg-white hover:bg-azure-50 text-[#4a6585] p-2.5 rounded-xl border border-azure-100 transition shadow-sm">💡 Berapa perkiraan biaya MVP?</button>
                <button onclick="sendQuickReply('Siapa pemilik source code?')" class="w-full text-left bg-white hover:bg-azure-50 text-[#4a6585] p-2.5 rounded-xl border border-azure-100 transition shadow-sm">🛡️ Soal kepemilikan source code?</button>
                <button onclick="sendQuickReply('Berapa lama pengerjaan?')" class="w-full text-left bg-white hover:bg-azure-50 text-[#4a6585] p-2.5 rounded-xl border border-azure-100 transition shadow-sm">⏱️ Berapa lama durasi pengerjaan?</button>
            </div>
        </div>

        <!-- Input -->
        <div class="p-2.5 bg-white border-t border-azure-100 flex gap-2">
            <input type="text" id="botInput" placeholder="Tanya tentang layanan / biaya..." onkeydown="if(event.key==='Enter') sendCustomReply()"
                   class="flex-1 bg-azure-50 border border-azure-200 rounded-xl px-3 py-2 text-xs text-[#0d2657] placeholder-[#9ab5cc] focus:outline-none focus:border-azure-500">
            <button onclick="sendCustomReply()" class="btn-elegant text-white font-bold px-3 py-2 rounded-xl text-xs transition">Kirim</button>
        </div>
    </div>

    {{-- SCRIPTS --}}
    <script>
        // Mobile menu
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const mobileMenu    = document.getElementById('mobileMenu');
        if (mobileMenuBtn && mobileMenu) {
            mobileMenuBtn.addEventListener('click', () => mobileMenu.classList.toggle('hidden'));
        }

        // FAQ
        function toggleFaq(btn) {
            const answer   = btn.nextElementSibling;
            const icon     = btn.querySelector('.faq-icon');
            const isHidden = answer.classList.contains('hidden');
            document.querySelectorAll('.faq-answer').forEach(el => el.classList.add('hidden'));
            document.querySelectorAll('.faq-icon').forEach(el => el.textContent = '+');
            if (isHidden) {
                answer.classList.remove('hidden');
                icon.textContent = '−';
            }
        }

        // AI Bot
        function toggleAiBot() {
            const modal = document.getElementById('aiBotModal');
            modal.classList.toggle('hidden');
            modal.classList.toggle('flex');
        }

        function sendQuickReply(question) {
            appendUserMsg(question);
            let reply = 'Terima kasih! Tim kami siap membantu. Klik tombol WhatsApp hijau untuk diskusi langsung!';
            if (question.includes('biaya'))        reply = 'Paket Starter Elegant mulai Rp25 Juta (MVP 3–4 minggu), Business Elegant Rp55 Juta, atau Elite Squad Rp40 Juta/bulan. Semua include garansi & 100% source code!';
            else if (question.includes('source'))  reply = 'Ya, 100% source code, repositori Git, dan hak cipta diserahkan penuh ke Anda setelah pelunasan — tanpa biaya royalti.';
            else if (question.includes('lama'))    reply = 'Starter Elegant berkisar 3–5 minggu. Proyek Business Elegant enterprise biasanya 2–4 bulan tergantung kompleksitas.';
            setTimeout(() => appendBotMsg(reply), 500);
        }

        function sendCustomReply() {
            const input = document.getElementById('botInput');
            const val   = input.value.trim();
            if (!val) { return; }
            appendUserMsg(val);
            input.value = '';
            setTimeout(() => appendBotMsg("Untuk kebutuhan '" + val + "', klik tombol Chat WhatsApp agar tim kami bisa mendiskusikannya secara mendalam! ✦"), 600);
        }

        function appendUserMsg(msg) {
            const c   = document.getElementById('botMessages');
            const div = document.createElement('div');
            div.className = 'bg-azure-500 text-white p-2.5 rounded-2xl rounded-tr-none text-xs ml-auto max-w-[85%] shadow-sm';
            div.textContent = msg;
            c.appendChild(div);
            c.scrollTop = c.scrollHeight;
        }

        function appendBotMsg(msg) {
            const c   = document.getElementById('botMessages');
            const div = document.createElement('div');
            div.className = 'bg-white border border-azure-100 text-[#4a6585] p-2.5 rounded-2xl rounded-tl-none text-xs mr-auto max-w-[85%] shadow-sm';
            div.textContent = msg;
            c.appendChild(div);
            c.scrollTop = c.scrollHeight;
        }

        // Contact form → WhatsApp
        function handleFormSubmit(e) {
            e.preventDefault();
            const name  = document.getElementById('clientName').value;
            const comp  = document.getElementById('clientCompany').value;
            const phone = document.getElementById('clientPhone').value;
            const type  = document.getElementById('projectType').value;
            const notes = document.getElementById('projectNotes').value;
            const text  = encodeURIComponent(
                `Halo AzuraCraft Studio, saya ingin konsultasi proyek:\n\n` +
                `*Nama:* ${name}\n*Perusahaan:* ${comp}\n*WA:* ${phone}\n*Tipe:* ${type}\n*Catatan:* ${notes}\n\nMohon info jadwal diskusi. ✦`
            );
            window.open(`https://wa.me/6281234567890?text=${text}`, '_blank');
        }
    </script>
</body>
</html>
