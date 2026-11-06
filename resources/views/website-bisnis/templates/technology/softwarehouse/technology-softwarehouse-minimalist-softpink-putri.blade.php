<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RoseCode Studio — Software House Minimalist Soft Pink</title>
    <meta name="description" content="RoseCode Studio adalah software house modern bergaya minimalis bertema Soft Pink yang membangun aplikasi web, mobile, SaaS, dan integrasi AI dengan arsitektur presisi.">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                        mono: ['"JetBrains Mono"', 'monospace'],
                    },
                    colors: {
                        softpink: {
                            50:  '#fff5f7',
                            100: '#ffe4ec',
                            200: '#fecdd6',
                            300: '#fea3b4',
                            400: '#f87192',
                            500: '#e05375',
                            600: '#c83b5f',
                            700: '#a62848',
                            800: '#841f39',
                            900: '#5c1427',
                            950: '#380a16',
                        },
                        blush: {
                            bg:     '#fffbfa',
                            card:   '#ffffff',
                            border: '#fde2e8',
                            hover:  '#fff0f4',
                            dark:   '#1e1418',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        /* Minimalist Soft Pink Background & Accents */
        body {
            background-color: #fffbfa;
            color: #261b20;
        }

        .pink-glow {
            box-shadow: 0 12px 40px -15px rgba(224, 83, 117, 0.20);
        }

        .card-minimal {
            background: #ffffff;
            border: 1px solid #fde2e8;
            transition: all 0.25s ease-in-out;
        }

        .card-minimal:hover {
            transform: translateY(-4px);
            border-color: #fca5b9;
            box-shadow: 0 16px 36px -12px rgba(224, 83, 117, 0.16);
        }

        .text-gradient-pink {
            background: linear-gradient(135deg, #c83b5f 0%, #e05375 50%, #f47294 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .btn-pink-primary {
            background: #e05375;
            color: #ffffff;
            transition: all 0.2s ease;
        }

        .btn-pink-primary:hover {
            background: #c83b5f;
            box-shadow: 0 6px 20px -4px rgba(200, 59, 95, 0.35);
        }

        .navbar-minimal {
            background: rgba(255, 251, 250, 0.94);
            backdrop-filter: blur(14px);
            border-bottom: 1px solid #fde2e8;
        }

        .hero-grid-pattern {
            background-image:
                linear-gradient(to right, rgba(244, 114, 148, 0.06) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(244, 114, 148, 0.06) 1px, transparent 1px);
            background-size: 32px 32px;
        }

        .tag-pill {
            background: #fff5f7;
            border: 1px solid #ffe4ec;
            color: #c83b5f;
        }

        /* Minimalist scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        ::-webkit-scrollbar-track {
            background: #fff5f7;
        }
        ::-webkit-scrollbar-thumb {
            background: #fecdd6;
            border-radius: 9999px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #fea3b4;
        }
    </style>
</head>
<body class="antialiased font-sans selection:bg-softpink-100 selection:text-softpink-900">

    {{-- ============================================================ --}}
    {{-- 1. TOP BAR --}}
    {{-- ============================================================ --}}
    <div class="bg-softpink-50 border-b border-softpink-100 text-softpink-900 text-[11px] py-2 px-4 sm:px-8">
        <div class="max-w-7xl mx-auto flex flex-wrap justify-between items-center gap-2">
            <div class="flex items-center gap-2.5">
                <span class="inline-flex items-center gap-1.5 bg-white px-2.5 py-0.5 rounded-full font-medium border border-softpink-200/70 text-softpink-700">
                    <span class="w-1.5 h-1.5 rounded-full bg-softpink-500 animate-pulse"></span>
                    Open for Q1–Q2 2026 Collaboration — Minimalist Soft Pink Edition
                </span>
            </div>
            <div class="flex items-center gap-5 text-softpink-800/80 font-medium text-xs">
                <span class="flex items-center gap-1.5">
                    <svg class="w-3.5 h-3.5 text-softpink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    hello@rosecode.studio
                </span>
                <span class="hidden sm:flex items-center gap-1.5">
                    <svg class="w-3.5 h-3.5 text-softpink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    Jakarta · Bandung, Indonesia
                </span>
            </div>
        </div>
    </div>

    {{-- ============================================================ --}}
    {{-- 2. NAVBAR --}}
    {{-- ============================================================ --}}
    <header class="sticky top-0 z-40 navbar-minimal">
        <div class="max-w-7xl mx-auto px-4 sm:px-8 h-16 flex items-center justify-between">
            <!-- Logo Minimalist -->
            <a href="#hero" class="flex items-center gap-2.5 group">
                <div class="w-9 h-9 rounded-xl bg-softpink-500 flex items-center justify-center text-white font-bold text-sm tracking-tighter shadow-sm transition-transform group-hover:scale-95">
                    RC
                </div>
                <div class="flex flex-col leading-none">
                    <span class="font-extrabold text-base tracking-tight text-neutral-900">ROSE<span class="text-gradient-pink font-light tracking-wide">CODE</span></span>
                    <span class="text-[9px] uppercase tracking-widest text-neutral-600 font-medium">Software Studio</span>
                </div>
            </a>

            <!-- Desktop Navigation -->
            <nav class="hidden md:flex items-center gap-8 text-xs font-semibold tracking-wide text-neutral-600">
                <a href="#services"  class="hover:text-softpink-600 transition">LAYANAN</a>
                <a href="#portfolio" class="hover:text-softpink-600 transition">PORTFOLIO</a>
                <a href="#pricing"   class="hover:text-softpink-600 transition">BIAYA</a>
                <a href="#faq"       class="hover:text-softpink-600 transition">FAQ</a>
                <a href="#contact"   class="hover:text-softpink-600 transition">KONTAK</a>
            </nav>

            <div class="flex items-center gap-3">
                <a href="#contact" class="hidden sm:inline-flex items-center gap-1.5 btn-pink-primary text-xs font-bold px-4 py-2.5 rounded-xl">
                    <span>Mulai Proyek</span>
                    <span class="text-xs">↗</span>
                </a>
                <button id="mobileMenuBtn" class="md:hidden p-2 text-softpink-600 hover:bg-softpink-50 rounded-lg transition" aria-label="Toggle Menu">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobileMenu" class="hidden md:hidden bg-white border-b border-softpink-100 px-6 py-4 space-y-3 text-sm shadow-sm">
            <a href="#services"  class="block text-neutral-600 hover:text-softpink-600 py-1 font-medium">Layanan</a>
            <a href="#portfolio" class="block text-neutral-600 hover:text-softpink-600 py-1 font-medium">Portfolio</a>
            <a href="#pricing"   class="block text-neutral-600 hover:text-softpink-600 py-1 font-medium">Biaya & Paket</a>
            <a href="#faq"       class="block text-neutral-600 hover:text-softpink-600 py-1 font-medium">FAQ</a>
            <a href="#contact"   class="block text-softpink-600 font-bold pt-2 border-t border-softpink-50">Mulai Proyek Sekarang ↗</a>
        </div>
    </header>

    <main>
        {{-- ============================================================ --}}
        {{-- 3. HERO SECTION --}}
        {{-- ============================================================ --}}
        <section id="hero" class="relative pt-16 pb-24 overflow-hidden hero-grid-pattern">
            <div class="max-w-7xl mx-auto px-4 sm:px-8">
                <div class="grid lg:grid-cols-12 gap-12 items-center">
                    <!-- Hero Left Text -->
                    <div class="lg:col-span-7 space-y-7">
                        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white border border-softpink-200 text-softpink-700 text-xs font-semibold shadow-xs">
                            <span class="w-2 h-2 rounded-full bg-softpink-500 animate-ping"></span>
                            MINIMALIST SOFTWARE ENGINEERING
                        </div>

                        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-neutral-900 tracking-tight leading-[1.12]">
                            Software Bersih, <br>
                            <span class="text-gradient-pink">Arsitektur Presisi,</span><br>
                            Dampak Nyata.
                        </h1>

                        <p class="text-neutral-600 text-base sm:text-lg leading-relaxed max-w-xl">
                            RoseCode Studio membantu founder dan enterprise membangun produk digital scalable — dari web platform modern, aplikasi mobile, hingga otomasi AI dengan kode yang rapi dan terukur.
                        </p>

                        <div class="flex flex-wrap items-center gap-3 pt-2">
                            <a href="#contact" class="btn-pink-primary inline-flex items-center gap-2 text-xs font-bold px-6 py-3.5 rounded-xl">
                                <span>Konsultasi Proyek</span>
                                <span>↗</span>
                            </a>
                            <a href="#portfolio" class="inline-flex items-center gap-2 bg-white hover:bg-softpink-50 text-neutral-800 border border-softpink-200 text-xs font-bold px-5 py-3.5 rounded-xl transition">
                                <span>Lihat Portofolio</span>
                                <span>→</span>
                            </a>
                        </div>

                        <!-- Stats Bar -->
                        <div class="grid grid-cols-3 gap-6 pt-6 border-t border-softpink-100 max-w-lg">
                            <div>
                                <div class="text-2xl sm:text-3xl font-extrabold text-softpink-600">95+</div>
                                <div class="text-[11px] text-neutral-600 font-medium mt-0.5">Sistem Dirilis</div>
                            </div>
                            <div>
                                <div class="text-2xl sm:text-3xl font-extrabold text-neutral-900">99.9%</div>
                                <div class="text-[11px] text-neutral-600 font-medium mt-0.5">Uptime SLA</div>
                            </div>
                            <div>
                                <div class="text-2xl sm:text-3xl font-extrabold text-softpink-700">4.9/5</div>
                                <div class="text-[11px] text-neutral-600 font-medium mt-0.5">Kepuasan Klien</div>
                            </div>
                        </div>
                    </div>

                    <!-- Hero Right Visual - Minimalist Tech Specimen -->
                    <div class="lg:col-span-5">
                        <div class="card-minimal rounded-2xl p-6 sm:p-7 pink-glow relative">
                            <div class="flex items-center justify-between pb-4 mb-4 border-b border-softpink-100">
                                <div class="flex items-center gap-2">
                                    <div class="w-3 h-3 rounded-full bg-softpink-400"></div>
                                    <div class="w-3 h-3 rounded-full bg-softpink-200"></div>
                                    <div class="w-3 h-3 rounded-full bg-softpink-100"></div>
                                    <span class="text-xs font-mono font-medium text-neutral-600 ml-2">rosecode-engine.v2</span>
                                </div>
                                <span class="text-[10px] font-mono uppercase bg-softpink-50 text-softpink-700 px-2 py-0.5 rounded-md border border-softpink-200 font-semibold">Ready to Ship</span>
                            </div>

                            <div class="font-mono text-xs text-neutral-700 space-y-2.5 bg-softpink-50/60 p-4 rounded-xl border border-softpink-100">
                                <div class="text-softpink-600 font-semibold">// Architecture Overview</div>
                                <div><span class="text-neutral-600">stack:</span> ['Laravel 12', 'Vue 3', 'Tailwind', 'Docker']</div>
                                <div><span class="text-neutral-600">database:</span> PostgreSQL + Redis Cluster</div>
                                <div><span class="text-neutral-600">monitoring:</span> Automated Health Check & Sentry</div>
                                <div><span class="text-neutral-600">ai_agent:</span> Integrated LLM Workflow & API</div>
                            </div>

                            <div class="mt-5 space-y-3">
                                <div>
                                    <div class="flex justify-between text-xs font-medium text-neutral-600 mb-1">
                                        <span>Code Cleanliness & Test Coverage</span>
                                        <span class="font-bold text-softpink-700">98.4%</span>
                                    </div>
                                    <div class="h-2 bg-softpink-100 rounded-full overflow-hidden">
                                        <div class="h-full bg-softpink-500 rounded-full" style="width: 98.4%"></div>
                                    </div>
                                </div>
                                <div>
                                    <div class="flex justify-between text-xs font-medium text-neutral-600 mb-1">
                                        <span>Lighthouse Performance Score</span>
                                        <span class="font-bold text-softpink-700">99 / 100</span>
                                    </div>
                                    <div class="h-2 bg-softpink-100 rounded-full overflow-hidden">
                                        <div class="h-full bg-softpink-400 rounded-full" style="width: 99%"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-5 pt-4 border-t border-softpink-100 flex items-center justify-between text-[11px] text-neutral-600">
                                <span class="flex items-center gap-1.5 font-medium text-softpink-700">
                                    <span class="w-2 h-2 rounded-full bg-softpink-500"></span> Minimalist Soft Pink Theme
                                </span>
                                <span class="font-mono">Clean · Scalable · Fast</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- ============================================================ --}}
        {{-- 4. SERVICES SECTION --}}
        {{-- ============================================================ --}}
        <section id="services" class="py-20 bg-white border-t border-b border-softpink-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-8">
                <div class="text-center max-w-2xl mx-auto mb-16">
                    <span class="text-softpink-600 text-xs font-bold tracking-widest uppercase">CAPABILITIES</span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-neutral-900 tracking-tight mt-2">Layanan Rekayasa Software</h2>
                    <p class="text-neutral-600 text-sm mt-3">Pendekatan minimalis berfokus pada apa yang krusial: stabilitas tinggi, kode mudah dirawat, dan performa maksimal.</p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @php
                        $services = [
                            [
                                'icon' => '🌐',
                                'title' => 'Custom Web Platform & SaaS',
                                'desc' => 'Arsitektur modular untuk portal bisnis, aplikasi SaaS multi-tenant, dan sistem manajemen internal dengan performa tinggi.',
                                'tags' => ['Laravel', 'Vue.js', 'PostgreSQL'],
                            ],
                            [
                                'icon' => '📱',
                                'title' => 'Mobile App Engineering',
                                'desc' => 'Aplikasi native-grade iOS & Android dengan UI minimalis, responsif, dan konsumsi baterai serta data yang sangat efisien.',
                                'tags' => ['Flutter', 'React Native', 'REST API'],
                            ],
                            [
                                'icon' => '✦',
                                'title' => 'AI Integration & Automation',
                                'desc' => 'Penerapan AI praktis: asisten virtual cerdas, otomasi pipeline data, OCR dokumen, dan analitik prediktif.',
                                'tags' => ['OpenAI API', 'LangChain', 'Python'],
                            ],
                            [
                                'icon' => '☁️',
                                'title' => 'Cloud & DevOps Scalability',
                                'desc' => 'Setup infrastruktur cloud zero-downtime, kontainerisasi Docker, automasi CI/CD, dan audit keamanan data berkala.',
                                'tags' => ['AWS', 'Docker', 'GitHub Actions'],
                            ],
                            [
                                'icon' => '⚡',
                                'title' => 'System Refactoring & Audit',
                                'desc' => 'Optimasi sistem lama menjadi microservices modern tanpa mengganggu operasional harian bisnis Anda.',
                                'tags' => ['Code Audit', 'DB Tuning', 'Security'],
                            ],
                            [
                                'icon' => '🤝',
                                'title' => 'Dedicated Tech Squad',
                                'desc' => 'Tim insinyur senior yang berdedikasi penuh untuk mengakselerasi roadmap produk digital perusahaan Anda.',
                                'tags' => ['Fullstack', 'Tech Lead', 'QA Engine'],
                            ],
                        ];
                    @endphp

                    @foreach ($services as $svc)
                    <div class="card-minimal rounded-2xl p-6 flex flex-col justify-between">
                        <div class="space-y-3.5">
                            <div class="w-11 h-11 rounded-xl bg-softpink-50 border border-softpink-100 flex items-center justify-center text-lg text-softpink-600">
                                {{ $svc['icon'] }}
                            </div>
                            <h3 class="text-base font-bold text-neutral-900 tracking-tight">{{ $svc['title'] }}</h3>
                            <p class="text-neutral-600 text-xs sm:text-sm leading-relaxed">{{ $svc['desc'] }}</p>
                        </div>
                        <div class="flex flex-wrap gap-1.5 pt-5 mt-4 border-t border-softpink-50">
                            @foreach ($svc['tags'] as $tag)
                                <span class="tag-pill text-[10px] font-semibold px-2.5 py-0.5 rounded-full">{{ $tag }}</span>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- ============================================================ --}}
        {{-- 5. PORTFOLIO SECTION --}}
        {{-- ============================================================ --}}
        <section id="portfolio" class="py-20 bg-softpink-50/50">
            <div class="max-w-7xl mx-auto px-4 sm:px-8">
                <div class="text-center max-w-2xl mx-auto mb-16">
                    <span class="text-softpink-600 text-xs font-bold tracking-widest uppercase">PROVEN IMPACT</span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-neutral-900 tracking-tight mt-2">Karya & Rekayasa Kami</h2>
                    <p class="text-neutral-600 text-sm mt-3">Beberapa sistem yang kami rancang dan kembangkan untuk mitra bisnis berskala nasional.</p>
                </div>

                <div class="grid md:grid-cols-3 gap-8">
                    @php
                        $projects = [
                            [
                                'badge' => 'Fintech SaaS',
                                'title' => 'PayNest Corporate',
                                'desc' => 'Platform otomasi rekonsiliasi keuangan multi-bank untuk 200+ korporasi dengan standar enkripsi level perbankan.',
                                'metric' => '99.98% Akurasi Data',
                                'stack' => 'Laravel 12 · Redis · Vue',
                            ],
                            [
                                'badge' => 'Supply Chain ERP',
                                'title' => 'LogisPro Nexus',
                                'desc' => 'Dashboard pelacakan inventaris real-time terintegrasi barcode scanner mobile untuk 45 gudang distribusi.',
                                'metric' => '3.5x Kecepatan Dispatch',
                                'stack' => 'PostgreSQL · Flutter · Node',
                            ],
                            [
                                'badge' => 'Healthtech & Clinic',
                                'title' => 'MedicaFlow Cloud',
                                'desc' => 'Sistem rekam medis digital (EMR) terstandarisasi SATUSEHAT Kementerian Kesehatan dengan antrean online WhatsApp.',
                                'metric' => '120K+ Pasien Terlayani',
                                'stack' => 'Microservices · AWS · AI Bot',
                            ],
                        ];
                    @endphp

                    @foreach ($projects as $proj)
                    <div class="card-minimal rounded-2xl overflow-hidden flex flex-col justify-between">
                        <div>
                            <div class="h-44 bg-gradient-to-br from-softpink-100 via-softpink-50 to-white p-6 flex flex-col justify-between border-b border-softpink-100">
                                <div class="flex justify-between items-center">
                                    <span class="text-[10px] font-bold text-softpink-700 bg-white px-2.5 py-1 rounded-full border border-softpink-200">
                                        {{ $proj['badge'] }}
                                    </span>
                                    <span class="text-softpink-400 font-mono text-xs">Case Study</span>
                                </div>
                                <h3 class="text-xl font-extrabold text-neutral-900 tracking-tight">{{ $proj['title'] }}</h3>
                            </div>
                            <div class="p-6">
                                <p class="text-neutral-600 text-xs sm:text-sm leading-relaxed">{{ $proj['desc'] }}</p>
                            </div>
                        </div>
                        <div class="px-6 pb-6 pt-3 border-t border-softpink-50 flex items-center justify-between text-xs">
                            <div>
                                <span class="text-[10px] text-neutral-600 uppercase font-semibold block">Hasil</span>
                                <span class="font-bold text-softpink-700">{{ $proj['metric'] }}</span>
                            </div>
                            <span class="font-mono text-[10px] text-neutral-600">{{ $proj['stack'] }}</span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- ============================================================ --}}
        {{-- 6. PRICING SECTION --}}
        {{-- ============================================================ --}}
        <section id="pricing" class="py-20 bg-white border-t border-b border-softpink-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-8">
                <div class="text-center max-w-2xl mx-auto mb-16">
                    <span class="text-softpink-600 text-xs font-bold tracking-widest uppercase">TRANSPARENT VALUE</span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-neutral-900 tracking-tight mt-2">Investasi Proyek Terukur</h2>
                    <p class="text-neutral-600 text-sm mt-3">Tanpa biaya terselubung. 100% kepemilikan source code dan repositori diserahkan kepada Anda.</p>
                </div>

                <div class="grid md:grid-cols-3 gap-8 items-stretch">
                    <!-- Starter Minimalist -->
                    <div class="card-minimal rounded-2xl p-7 flex flex-col justify-between">
                        <div class="space-y-4">
                            <span class="text-[10px] font-bold uppercase tracking-wider text-neutral-600">MVP / VALIDASI CEPAT</span>
                            <h3 class="text-xl font-extrabold text-neutral-900">Starter Minimalist</h3>
                            <p class="text-neutral-600 text-xs leading-relaxed">Cocok untuk peluncuran MVP atau portal operasional awal dalam 3–4 minggu.</p>
                            <div class="text-3xl font-extrabold text-neutral-900 pt-2">
                                Rp24jt <span class="text-xs font-normal text-neutral-600">/ project</span>
                            </div>
                            <ul class="text-xs text-neutral-600 space-y-2.5 pt-4 border-t border-softpink-100 font-medium">
                                <li class="flex items-center gap-2"><span class="text-softpink-600 font-bold">✓</span> Web App Responsive (Desktop & Mobile)</li>
                                <li class="flex items-center gap-2"><span class="text-softpink-600 font-bold">✓</span> Hingga 5 Modul Utama</li>
                                <li class="flex items-center gap-2"><span class="text-softpink-600 font-bold">✓</span> Integrasi WhatsApp Gateway</li>
                                <li class="flex items-center gap-2"><span class="text-softpink-600 font-bold">✓</span> Setup VPS, Domain & SSL</li>
                                <li class="flex items-center gap-2"><span class="text-softpink-600 font-bold">✓</span> 30 Hari Garansi Bug Fix</li>
                            </ul>
                        </div>
                        <a href="#contact" class="mt-8 block text-center bg-softpink-50 hover:bg-softpink-100 text-softpink-700 font-bold py-3 rounded-xl border border-softpink-200 transition text-xs">
                            Pilih Starter Minimalist
                        </a>
                    </div>

                    <!-- Business Scale (Featured) -->
                    <div class="rounded-2xl p-7 flex flex-col justify-between relative shadow-xl pink-glow bg-neutral-900 text-white border border-softpink-300/40">
                        <div class="absolute -top-3.5 left-1/2 -translate-x-1/2 bg-softpink-500 text-white text-[10px] font-extrabold px-3.5 py-1 rounded-full uppercase tracking-wider shadow-sm">
                            PALING DIREKOMENDASIKAN
                        </div>
                        <div class="space-y-4">
                            <span class="text-[10px] font-bold uppercase tracking-wider text-softpink-300">ENTERPRISE ARCHITECTURE</span>
                            <h3 class="text-xl font-extrabold text-white">Business Scale</h3>
                            <p class="text-neutral-400 text-xs leading-relaxed">Sistem skala penuh dengan arsitektur modular, role permissions, dan AI workflow.</p>
                            <div class="text-3xl font-extrabold text-white pt-2">
                                Rp52jt <span class="text-xs font-normal text-neutral-400">/ project</span>
                            </div>
                            <ul class="text-xs text-neutral-300 space-y-2.5 pt-4 border-t border-neutral-800 font-medium">
                                <li class="flex items-center gap-2"><span class="text-softpink-400 font-bold">✓</span> Full Web & Mobile App Support</li>
                                <li class="flex items-center gap-2"><span class="text-softpink-400 font-bold">✓</span> Multi-role RBAC & Audit Trails</li>
                                <li class="flex items-center gap-2"><span class="text-softpink-400 font-bold">✓</span> Integrasi AI Assistant / Chatbot Kustom</li>
                                <li class="flex items-center gap-2"><span class="text-softpink-400 font-bold">✓</span> Automated CI/CD Docker Pipeline</li>
                                <li class="flex items-center gap-2"><span class="text-softpink-400 font-bold">✓</span> 90 Hari Garansi & Pemeliharaan</li>
                            </ul>
                        </div>
                        <a href="#contact" class="mt-8 block text-center btn-pink-primary font-bold py-3.5 rounded-xl transition text-xs shadow-md">
                            Mulai Konsultasi Business ↗
                        </a>
                    </div>

                    <!-- Dedicated Squad -->
                    <div class="card-minimal rounded-2xl p-7 flex flex-col justify-between">
                        <div class="space-y-4">
                            <span class="text-[10px] font-bold uppercase tracking-wider text-neutral-600">FULL DEDICATION</span>
                            <h3 class="text-xl font-extrabold text-neutral-900">Dedicated Squad</h3>
                            <p class="text-neutral-600 text-xs leading-relaxed">Tim engineering berdedikasi penuh untuk percepatan delivery produk perusahaan Anda.</p>
                            <div class="text-3xl font-extrabold text-neutral-900 pt-2">
                                Rp38jt <span class="text-xs font-normal text-neutral-600">/ bulan</span>
                            </div>
                            <ul class="text-xs text-neutral-600 space-y-2.5 pt-4 border-t border-softpink-100 font-medium">
                                <li class="flex items-center gap-2"><span class="text-softpink-600 font-bold">✓</span> 2–3 Senior Software Engineers</li>
                                <li class="flex items-center gap-2"><span class="text-softpink-600 font-bold">✓</span> Agile Sprint & Daily Standup</li>
                                <li class="flex items-center gap-2"><span class="text-softpink-600 font-bold">✓</span> Quality Assurance & Security Review</li>
                                <li class="flex items-center gap-2"><span class="text-softpink-600 font-bold">✓</span> Akses Langsung Slack & Jira Team</li>
                                <li class="flex items-center gap-2"><span class="text-softpink-600 font-bold">✓</span> Fleksibel Scaling Sesuai Kebutuhan</li>
                            </ul>
                        </div>
                        <a href="#contact" class="mt-8 block text-center bg-softpink-50 hover:bg-softpink-100 text-softpink-700 font-bold py-3 rounded-xl border border-softpink-200 transition text-xs">
                            Hubungi Tim Squad
                        </a>
                    </div>
                </div>
            </div>
        </section>

        {{-- ============================================================ --}}
        {{-- 7. FAQ SECTION --}}
        {{-- ============================================================ --}}
        <section id="faq" class="py-20 bg-softpink-50/50">
            <div class="max-w-3xl mx-auto px-4 sm:px-8">
                <div class="text-center mb-14">
                    <span class="text-softpink-600 text-xs font-bold tracking-widest uppercase">FAQ</span>
                    <h2 class="text-3xl font-extrabold text-neutral-900 tracking-tight mt-2">Pertanyaan yang Sering Diajukan</h2>
                    <p class="text-neutral-600 text-sm mt-2">Transparansi dan kejelasan adalah prinsip utama kami dalam setiap kerja sama.</p>
                </div>

                <div class="space-y-3.5">
                    @php
                        $faqs = [
                            [
                                'q' => 'Apakah hak cipta dan source code sepenuhnya milik klien?',
                                'a' => 'Ya, 100%. Setelah pelunasan proyek, seluruh repositori kode Git, aset desain, konfigurasi server, dan dokumentasi teknis sepenuhnya menjadi hak milik Anda tanpa biaya lisensi berkelanjutan.',
                            ],
                            [
                                'q' => 'Berapa lama waktu pengerjaan sebuah sistem aplikasi?',
                                'a' => 'Untuk paket Starter Minimalist membutuhkan waktu rata-rata 3 hingga 5 minggu. Sementara sistem skala Business atau enterprise biasanya berkisar antara 2 sampai 4 bulan tergantung lingkup fitur.',
                            ],
                            [
                                'q' => 'Bagaimana sistem pembayaran proyek di RoseCode Studio?',
                                'a' => 'Kami menggunakan sistem milestone bertahap: DP 30% saat kickoff, 30% setelah wireframe dan prototype disetujui, 30% saat pengujian UAT, dan 10% final setelah deploy live ke server produksi.',
                            ],
                            [
                                'q' => 'Apakah ada garansi setelah aplikasi resmi diluncurkan?',
                                'a' => 'Tentu. Setiap proyek kami sertai garansi perbaikan bug dan kendala teknis secara gratis selama 30 hingga 90 hari, dengan opsi perpanjangan maintenance SLA bulanan.',
                            ],
                            [
                                'q' => 'Bisakah RoseCode Studio mengintegrasikan AI ke sistem yang sudah ada?',
                                'a' => 'Sangat bisa. Kami dapat menghubungkan workflow AI seperti chatbot cerdas, analisis dokumen otomatis, maupun rekomendasi prediktif ke API sistem yang sedang berjalan.',
                            ],
                        ];
                    @endphp

                    @foreach ($faqs as $faq)
                    <div class="card-minimal rounded-xl overflow-hidden">
                        <button type="button" class="w-full p-4 sm:p-5 text-left flex justify-between items-center text-sm font-bold text-neutral-900 hover:text-softpink-600 transition" onclick="toggleFaq(this)">
                            <span>{{ $faq['q'] }}</span>
                            <span class="faq-icon text-softpink-500 text-xl font-light ml-3 flex-shrink-0">+</span>
                        </button>
                        <div class="faq-answer hidden px-4 sm:px-5 pb-5 text-xs sm:text-sm text-neutral-600 leading-relaxed border-t border-softpink-100 pt-3 bg-white">
                            {{ $faq['a'] }}
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- ============================================================ --}}
        {{-- 8. CONTACT FORM SECTION --}}
        {{-- ============================================================ --}}
        <section id="contact" class="py-20 bg-white">
            <div class="max-w-2xl mx-auto px-4 sm:px-8">
                <div class="card-minimal rounded-3xl p-7 sm:p-10 pink-glow">
                    <div class="text-center mb-8">
                        <span class="text-softpink-600 text-xs font-bold tracking-widest uppercase">GET IN TOUCH</span>
                        <h2 class="text-2xl sm:text-3xl font-extrabold text-neutral-900 tracking-tight mt-1">Konsultasikan Ide Anda</h2>
                        <p class="text-neutral-600 text-xs sm:text-sm mt-1.5">Isi formulir singkat di bawah, kami akan segera merespons via WhatsApp.</p>
                    </div>

                    <form id="projectForm" onsubmit="handleFormSubmit(event)" class="space-y-4">
                        <div class="grid sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-semibold text-neutral-700 mb-1">Nama Lengkap *</label>
                                <input type="text" id="clientName" required placeholder="Contoh: Putri Ayu"
                                       class="w-full bg-softpink-50/50 border border-softpink-200 rounded-xl px-3.5 py-2.5 text-xs sm:text-sm text-neutral-900 focus:outline-none focus:border-softpink-500 focus:bg-white transition">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-neutral-700 mb-1">Perusahaan / Brand *</label>
                                <input type="text" id="clientCompany" required placeholder="PT Inovasi Digital"
                                       class="w-full bg-softpink-50/50 border border-softpink-200 rounded-xl px-3.5 py-2.5 text-xs sm:text-sm text-neutral-900 focus:outline-none focus:border-softpink-500 focus:bg-white transition">
                            </div>
                        </div>

                        <div class="grid sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-semibold text-neutral-700 mb-1">Email Bisnis *</label>
                                <input type="email" id="clientEmail" required placeholder="putri@perusahaan.com"
                                       class="w-full bg-softpink-50/50 border border-softpink-200 rounded-xl px-3.5 py-2.5 text-xs sm:text-sm text-neutral-900 focus:outline-none focus:border-softpink-500 focus:bg-white transition">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-neutral-700 mb-1">Nomor WhatsApp *</label>
                                <input type="tel" id="clientPhone" required placeholder="081234567890"
                                       class="w-full bg-softpink-50/50 border border-softpink-200 rounded-xl px-3.5 py-2.5 text-xs sm:text-sm text-neutral-900 focus:outline-none focus:border-softpink-500 focus:bg-white transition">
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-neutral-700 mb-1">Tipe Kebutuhan Layanan</label>
                            <select id="projectType" class="w-full bg-softpink-50/50 border border-softpink-200 rounded-xl px-3.5 py-2.5 text-xs sm:text-sm text-neutral-900 focus:outline-none focus:border-softpink-500 focus:bg-white transition">
                                <option>Aplikasi Web & SaaS Kustom</option>
                                <option>Aplikasi Mobile (iOS & Android)</option>
                                <option>Integrasi AI & Automasi Alur Kerja</option>
                                <option>Cloud Infrastructure & DevOps</option>
                                <option>Dedicated Tech Squad</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-neutral-700 mb-1">Catatan / Lingkup Proyek</label>
                            <textarea id="projectNotes" rows="3" placeholder="Ceritakan gambaran singkat fitur, target timeline, atau tantangan bisnis Anda..."
                                      class="w-full bg-softpink-50/50 border border-softpink-200 rounded-xl px-3.5 py-2.5 text-xs sm:text-sm text-neutral-900 focus:outline-none focus:border-softpink-500 focus:bg-white transition"></textarea>
                        </div>

                        <button type="submit" class="btn-pink-primary w-full font-bold py-3.5 rounded-xl transition text-xs sm:text-sm tracking-wide">
                            Kirim & Diskusikan via WhatsApp ↗
                        </button>
                        <p class="text-[11px] text-center text-neutral-600">Seluruh data Anda dilindungi kerahasiaannya dengan NDA.</p>
                    </form>
                </div>
            </div>
        </section>
    </main>

    {{-- ============================================================ --}}
    {{-- 9. FOOTER --}}
    {{-- ============================================================ --}}
    <footer class="bg-neutral-950 text-neutral-400 text-xs py-14 border-t border-neutral-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 pb-10 border-b border-neutral-800">
                <div class="col-span-2 space-y-3">
                    <div class="flex items-center gap-2 text-white font-bold text-base tracking-tight">
                        <span class="w-6 h-6 rounded-md bg-softpink-500 flex items-center justify-center text-white text-xs">RC</span>
                        <span>ROSECODE STUDIO</span>
                    </div>
                    <p class="text-neutral-600 text-xs leading-relaxed max-w-sm">
                        Software house minimalis bertema Soft Pink. Mengembangkan platform web modern, aplikasi mobile tangguh, dan solusi AI dengan presisi tinggi.
                    </p>
                    <div class="text-[11px] text-neutral-600 font-mono">Jakarta · Bandung, Indonesia</div>
                </div>

                <div class="space-y-2.5">
                    <p class="font-bold text-white uppercase tracking-wider text-[11px]">Layanan</p>
                    <ul class="space-y-1.5 text-neutral-600">
                        <li><a href="#services" class="hover:text-softpink-300 transition">Web Application</a></li>
                        <li><a href="#services" class="hover:text-softpink-300 transition">Mobile App Dev</a></li>
                        <li><a href="#services" class="hover:text-softpink-300 transition">AI & Automation</a></li>
                        <li><a href="#services" class="hover:text-softpink-300 transition">Cloud & DevOps</a></li>
                    </ul>
                </div>

                <div class="space-y-2.5">
                    <p class="font-bold text-white uppercase tracking-wider text-[11px]">Kontak</p>
                    <div class="space-y-1 text-neutral-600">
                        <p>WA: +62 812-3456-7890</p>
                        <p>Email: hello@rosecode.studio</p>
                        <p>Senin – Jumat, 09:00 – 18:00 WIB</p>
                    </div>
                </div>
            </div>

            <div class="pt-8 flex flex-col sm:flex-row justify-between items-center gap-4 text-[11px] text-neutral-600">
                <p>&copy; 2026 RoseCode Studio. Hak cipta dilindungi undang-undang.</p>
                <p>Website template koleksi oleh <strong class="text-softpink-400">WEBIA</strong></p>
            </div>
        </div>
    </footer>

    {{-- ============================================================ --}}
    {{-- 10. FLOATING WA BUTTON (Bottom-Left) --}}
    {{-- ============================================================ --}}
    <a href="https://wa.me/6281234567890?text=Halo%20RoseCode%20Studio%2C%20saya%20tertarik%20konsultasi%20pembuatan%20software."
       target="_blank" rel="noopener noreferrer"
       class="fixed bottom-6 left-6 z-50 flex items-center gap-2 bg-[#25D366] hover:bg-[#20bd5a] text-white px-4 py-3 rounded-full shadow-2xl transition font-semibold text-xs tracking-wide">
        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
        </svg>
        <span>Chat WhatsApp</span>
    </a>

    {{-- ============================================================ --}}
    {{-- 11. FLOATING AI BUTTON (Bottom-Right) --}}
    {{-- ============================================================ --}}
    <button id="aiToggleBtn" onclick="toggleAiBot()"
            class="fixed bottom-6 right-6 z-50 flex items-center gap-2 btn-pink-primary px-4 py-3 rounded-full shadow-2xl transition font-semibold text-xs tracking-wide">
        <span class="w-2 h-2 rounded-full bg-white animate-pulse"></span>
        <span>✦ RoseCode AI</span>
    </button>

    <!-- AI Bot Modal -->
    <div id="aiBotModal" class="hidden fixed bottom-20 right-6 z-50 w-80 sm:w-96 bg-white border border-softpink-200 rounded-2xl shadow-2xl overflow-hidden flex-col h-[460px] pink-glow">
        <!-- Header -->
        <div class="bg-gradient-to-r from-softpink-600 to-softpink-500 p-3.5 flex justify-between items-center text-white">
            <div class="flex items-center gap-2">
                <div class="w-7 h-7 rounded-lg bg-white/20 text-white border border-white/30 flex items-center justify-center text-xs font-bold">RC</div>
                <div>
                    <h4 class="font-bold text-xs">RoseCode AI Assistant</h4>
                    <span class="text-[10px] text-softpink-100 flex items-center gap-1">
                        <span class="w-1.5 h-1.5 rounded-full bg-white"></span> Online · Estimasi & Konsultasi
                    </span>
                </div>
            </div>
            <button onclick="toggleAiBot()" class="text-white/70 hover:text-white text-lg p-1">&times;</button>
        </div>

        <!-- Messages Area -->
        <div id="botMessages" class="p-4 flex-1 overflow-y-auto space-y-3 text-xs font-sans bg-softpink-50/50">
            <div class="bg-white border border-softpink-100 p-3 rounded-2xl rounded-tl-none text-neutral-700 shadow-xs leading-relaxed">
                Halo! 👋 Saya <strong class="text-softpink-600">RoseCode AI</strong>. Ada yang ingin Anda tanyakan seputar estimasi biaya, alur pengerjaan, atau tech stack kami?
            </div>
            <div class="space-y-1.5 pt-1">
                <p class="text-[10px] font-bold text-softpink-500 uppercase tracking-wider">Pertanyaan Cepat:</p>
                <button onclick="sendQuickReply('Berapa estimasi biaya aplikasi?')" class="w-full text-left bg-white hover:bg-softpink-50 text-neutral-700 p-2.5 rounded-xl border border-softpink-100 transition shadow-xs text-xs">
                    💡 Berapa perkiraan biaya pengerjaan aplikasi?
                </button>
                <button onclick="sendQuickReply('Siapa pemilik source code?')" class="w-full text-left bg-white hover:bg-softpink-50 text-neutral-700 p-2.5 rounded-xl border border-softpink-100 transition shadow-xs text-xs">
                    🛡️ Bagaimana status kepemilikan source code?
                </button>
                <button onclick="sendQuickReply('Berapa lama waktu pengerjaan?')" class="w-full text-left bg-white hover:bg-softpink-50 text-neutral-700 p-2.5 rounded-xl border border-softpink-100 transition shadow-xs text-xs">
                    ⏱️ Berapa lama durasi rata-rata proyek?
                </button>
            </div>
        </div>

        <!-- Input Area -->
        <div class="p-2.5 bg-white border-t border-softpink-100 flex gap-2">
            <input type="text" id="botInput" placeholder="Ketik pertanyaan Anda..." onkeydown="if(event.key==='Enter') sendCustomReply()"
                   class="flex-1 bg-softpink-50/50 border border-softpink-200 rounded-xl px-3 py-2 text-xs text-neutral-900 placeholder-neutral-400 focus:outline-none focus:border-softpink-500">
            <button onclick="sendCustomReply()" class="btn-pink-primary font-bold px-3 py-2 rounded-xl text-xs transition">
                Kirim
            </button>
        </div>
    </div>

    {{-- ============================================================ --}}
    {{-- SCRIPTS --}}
    {{-- ============================================================ --}}
    <script>
        // Mobile Navigation Toggle
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const mobileMenu    = document.getElementById('mobileMenu');
        if (mobileMenuBtn && mobileMenu) {
            mobileMenuBtn.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        }

        // Accordion FAQ Toggle
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

        // AI Assistant Modal Toggle
        function toggleAiBot() {
            const modal = document.getElementById('aiBotModal');
            modal.classList.toggle('hidden');
            modal.classList.toggle('flex');
        }

        function sendQuickReply(question) {
            appendUserMsg(question);
            let reply = 'Terima kasih atas pertanyaannya! Tim RoseCode siap berdiskusi langsung melalui tombol WhatsApp.';
            if (question.includes('biaya')) {
                reply = 'Paket Starter Minimalist mulai dari Rp24 Juta (MVP 3–4 minggu), paket Business Scale Rp52 Juta, dan Dedicated Squad Rp38 Juta/bulan. Semua mencakup garansi serta source code 100% milik Anda!';
            } else if (question.includes('source') || question.includes('pemilik')) {
                reply = '100% source code, repositori Git, dan akses server diserahkan sepenuhnya kepada Anda setelah pelunasan. Tidak ada biaya royalti atau lisensi tersembunyi.';
            } else if (question.includes('lama') || question.includes('waktu')) {
                reply = 'Durasi pengerjaan MVP berkisar antara 3 hingga 5 minggu. Untuk platform enterprise berskala besar, umumnya memerlukan 2 hingga 4 bulan tergantung kompleksitas modul.';
            }
            setTimeout(() => appendBotMsg(reply), 450);
        }

        function sendCustomReply() {
            const input = document.getElementById('botInput');
            const val   = input.value.trim();
            if (!val) return;
            appendUserMsg(val);
            input.value = '';
            setTimeout(() => {
                appendBotMsg("Terima kasih atas pertanyaannya mengenai '" + val + "'. Untuk mendiskusikan spesifikasi teknis dan estimasi akurat, silakan hubungi tim kami via Chat WhatsApp! ✦");
            }, 550);
        }

        function appendUserMsg(msg) {
            const container = document.getElementById('botMessages');
            const div       = document.createElement('div');
            div.className   = 'bg-softpink-500 text-white p-2.5 rounded-2xl rounded-tr-none text-xs ml-auto max-w-[85%] shadow-xs';
            div.textContent = msg;
            container.appendChild(div);
            container.scrollTop = container.scrollHeight;
        }

        function appendBotMsg(msg) {
            const container = document.getElementById('botMessages');
            const div       = document.createElement('div');
            div.className   = 'bg-white border border-softpink-100 text-neutral-700 p-2.5 rounded-2xl rounded-tl-none text-xs mr-auto max-w-[85%] shadow-xs leading-relaxed';
            div.textContent = msg;
            container.appendChild(div);
            container.scrollTop = container.scrollHeight;
        }

        // Contact Form to WhatsApp Dispatcher
        function handleFormSubmit(e) {
            e.preventDefault();
            const name  = document.getElementById('clientName').value;
            const comp  = document.getElementById('clientCompany').value;
            const phone = document.getElementById('clientPhone').value;
            const type  = document.getElementById('projectType').value;
            const notes = document.getElementById('projectNotes').value;

            const text  = encodeURIComponent(
                `Halo RoseCode Studio, saya ingin berkonsultasi mengenai pembuatan software:\n\n` +
                `*Nama:* ${name}\n` +
                `*Perusahaan:* ${comp}\n` +
                `*Nomor WhatsApp:* ${phone}\n` +
                `*Kebutuhan:* ${type}\n` +
                `*Catatan Proyek:* ${notes}\n\n` +
                `Mohon informasi lebih lanjut. Terima kasih!`
            );
            window.open(`https://wa.me/6281234567890?text=${text}`, '_blank');
        }
    </script>
</body>
</html>
