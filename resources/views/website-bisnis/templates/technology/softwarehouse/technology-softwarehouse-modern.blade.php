<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nexora Digital — Software House & Enterprise Tech Studio</title>
    <meta name="description" content="Nexora Digital adalah software house modern yang membangun solusi aplikasi web, mobile, cloud computing, dan integrasi kecerdasan buatan (AI) berskala enterprise.">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;500;700&display=swap" rel="stylesheet">

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
                        sage: {
                            50: '#f4f7f4',
                            100: '#e5ece5',
                            200: '#cadbc9',
                            300: '#a8c4ab',
                            400: '#86aa8a',
                            500: '#698f6d',
                            600: '#527255',
                            700: '#425b45',
                            800: '#364a39',
                            900: '#2d3e30',
                            950: '#172219',
                        },
                        dark: {
                            bg: '#0a100e',
                            surface: '#101916',
                            card: '#14201c',
                            border: '#1f312b',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        .sage-glow {
            box-shadow: 0 0 35px -5px rgba(134, 170, 138, 0.28);
        }
        .code-gradient {
            background: linear-gradient(135deg, #0d1512 0%, #15221d 100%);
        }
    </style>
</head>
<body class="bg-[#0a100e] text-[#d6ded7] antialiased font-sans selection:bg-[#698f6d] selection:text-white">

    <!-- 1. TOPBAR -->
    <div class="bg-gradient-to-r from-[#060a09] via-[#0e1714] to-[#060a09] border-b border-[#1b2b25] text-xs py-2 px-4 sm:px-8">
        <div class="max-w-7xl mx-auto flex flex-wrap justify-between items-center gap-2">
            <div class="flex items-center gap-2 text-slate-300">
                <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-[#698f6d]/15 text-[#a8c4ab] border border-[#698f6d]/30 font-medium text-[11px]">
                    <span class="w-1.5 h-1.5 rounded-full bg-[#86aa8a] animate-pulse"></span>
                    Open for Q4 2026 Projects · Sage Edition
                </span>
                <span class="hidden md:inline text-[#8fa093]">· Garansi SLA 99.9% & Dedicated Support</span>
            </div>
            <div class="flex items-center gap-4 text-[#8fa093]">
                <span>📧 hello@nexora.digital</span>
                <span class="hidden sm:inline">📍 Jakarta & Bandung, ID</span>
            </div>
        </div>
    </div>

    <!-- 2. NAVBAR -->
    <header class="sticky top-0 z-40 bg-[#0a100e]/90 backdrop-blur-md border-b border-[#1b2b25]">
        <div class="max-w-7xl mx-auto px-4 sm:px-8 h-18 flex items-center justify-between">
            <a href="#hero" class="flex items-center gap-2.5 text-white font-bold text-xl tracking-tight">
                <div class="w-9 h-9 rounded-xl bg-gradient-to-tr from-[#698f6d] to-[#425b45] flex items-center justify-center text-white shadow-lg shadow-[#698f6d]/20 font-mono border border-[#86aa8a]/30">
                    N/
                </div>
                <span>NEXORA<span class="text-[#a8c4ab] font-light">DIGITAL</span></span>
            </a>

            <nav class="hidden md:flex items-center gap-7 text-sm font-medium text-[#c0ccc2]">
                <a href="#services" class="hover:text-[#a8c4ab] transition">Layanan</a>
                <a href="#tech-stack" class="hover:text-[#a8c4ab] transition">Tech Stack</a>
                <a href="#portfolio" class="hover:text-[#a8c4ab] transition">Portfolio</a>
                <a href="#pricing" class="hover:text-[#a8c4ab] transition">Estimasi Biaya</a>
                <a href="#faq" class="hover:text-[#a8c4ab] transition">FAQ</a>
            </nav>

            <div class="flex items-center gap-3">
                <a href="#contact" class="hidden sm:inline-flex items-center gap-2 bg-gradient-to-r from-[#698f6d] to-[#425b45] hover:from-[#78a37c] hover:to-[#527255] text-white text-sm font-semibold px-4.5 py-2.5 rounded-xl transition shadow-lg shadow-[#698f6d]/20 border border-[#86aa8a]/40">
                    Mulai Proyek <span>↗</span>
                </a>
                <button id="mobileMenuBtn" class="md:hidden p-2 text-[#8fa093] hover:text-white" aria-label="Toggle Menu">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"/></svg>
                </button>
            </div>
        </div>

        <!-- Mobile Nav Menu -->
        <div id="mobileMenu" class="hidden md:hidden bg-[#101916] border-b border-[#1b2b25] px-6 py-4 space-y-3 text-sm">
            <a href="#services" class="block text-[#c0ccc2] hover:text-[#a8c4ab] py-1">Layanan</a>
            <a href="#tech-stack" class="block text-[#c0ccc2] hover:text-[#a8c4ab] py-1">Tech Stack</a>
            <a href="#portfolio" class="block text-[#c0ccc2] hover:text-[#a8c4ab] py-1">Portfolio</a>
            <a href="#pricing" class="block text-[#c0ccc2] hover:text-[#a8c4ab] py-1">Estimasi Biaya</a>
            <a href="#faq" class="block text-[#c0ccc2] hover:text-[#a8c4ab] py-1">FAQ</a>
            <a href="#contact" class="block text-[#a8c4ab] font-semibold pt-2">Mulai Proyek ↗</a>
        </div>
    </header>

    <main>
        <!-- 3. HERO SECTION -->
        <section id="hero" class="relative pt-12 pb-20 md:py-24 overflow-hidden">
            <!-- Background Orbs Sage -->
            <div class="absolute top-1/4 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[350px] bg-[#698f6d]/15 blur-[120px] rounded-full pointer-events-none"></div>
            <div class="absolute top-1/3 left-1/4 w-[300px] h-[250px] bg-[#425b45]/20 blur-[100px] rounded-full pointer-events-none"></div>

            <div class="max-w-7xl mx-auto px-4 sm:px-8">
                <div class="grid lg:grid-cols-12 gap-12 items-center">
                    <!-- Hero Copy -->
                    <div class="lg:col-span-7 space-y-6">
                        <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-[#14201c] border border-[#263d34] text-[#a8c4ab] text-xs font-mono">
                            <span class="w-2 h-2 rounded-full bg-[#86aa8a] animate-ping"></span>
                            SOFTWARE ENGINEERING & ARCHITECTURE
                        </div>

                        <h1 class="text-3xl sm:text-5xl lg:text-6xl font-extrabold text-white tracking-tight leading-[1.15]">
                            Membangun Software <span class="bg-gradient-to-r from-[#a8c4ab] via-[#86aa8a] to-[#cadbc9] bg-clip-text text-transparent">Tangguh & Skalabel</span> untuk Bisnis Modern.
                        </h1>

                        <p class="text-[#b0beb3] text-base sm:text-lg leading-relaxed max-w-2xl">
                            Nexora Digital merancang aplikasi web kustom, sistem mobile, platform SaaS, serta otomatisasi AI dengan arsitektur cloud berstandar tinggi yang siap bertumbuh bersama perusahaan Anda.
                        </p>

                        <div class="flex flex-wrap gap-4 pt-2">
                            <a href="#contact" class="inline-flex items-center justify-center gap-2 bg-gradient-to-r from-[#698f6d] to-[#425b45] hover:from-[#78a37c] hover:to-[#527255] text-white font-bold px-7 py-3.5 rounded-xl transition shadow-xl shadow-[#698f6d]/25 border border-[#86aa8a]/40">
                                Konsultasi Arsitektur Gratis <span>↗</span>
                            </a>
                            <a href="#portfolio" class="inline-flex items-center justify-center gap-2 bg-[#101916] hover:bg-[#15221e] text-[#d6ded7] border border-[#1f312b] font-semibold px-6 py-3.5 rounded-xl transition">
                                Lihat Kasus Proyek →
                            </a>
                        </div>

                        <!-- Stats Bar -->
                        <div class="grid grid-cols-3 gap-4 pt-6 border-t border-[#1b2b25] max-w-lg">
                            <div>
                                <div class="text-2xl sm:text-3xl font-extrabold text-white font-mono">60+</div>
                                <div class="text-xs text-[#8fa093] mt-0.5">Sistem Terdeploy</div>
                            </div>
                            <div>
                                <div class="text-2xl sm:text-3xl font-extrabold text-[#a8c4ab] font-mono">99.98%</div>
                                <div class="text-xs text-[#8fa093] mt-0.5">Rata-rata Uptime</div>
                            </div>
                            <div>
                                <div class="text-2xl sm:text-3xl font-extrabold text-white font-mono">4.9/5</div>
                                <div class="text-xs text-[#8fa093] mt-0.5">Kepuasan Klien</div>
                            </div>
                        </div>
                    </div>

                    <!-- Hero Visual / Code Card -->
                    <div class="lg:col-span-5">
                        <div class="rounded-2xl code-gradient border border-[#263d34] sage-glow p-5 font-mono text-xs shadow-2xl relative">
                            <div class="flex items-center justify-between pb-3 border-b border-[#1b2b25] text-[#8fa093]">
                                <div class="flex items-center gap-2">
                                    <span class="w-3 h-3 rounded-full bg-rose-500/80"></span>
                                    <span class="w-3 h-3 rounded-full bg-amber-500/80"></span>
                                    <span class="w-3 h-3 rounded-full bg-[#86aa8a]"></span>
                                    <span class="ml-2 text-[11px] text-[#cadbc9]">NexoraAppService.php</span>
                                </div>
                                <span class="text-[10px] bg-[#101916] border border-[#263d34] px-2 py-0.5 rounded text-[#a8c4ab]">PHP 8.4</span>
                            </div>

                            <div class="pt-4 space-y-1.5 leading-relaxed text-[#c0ccc2]">
                                <p><span class="text-emerald-400">namespace</span> App\Services\Core;</p>
                                <p class="text-[#647467]">// Modern Enterprise Architecture (Sage Edition)</p>
                                <p><span class="text-[#a8c4ab]">class</span> <span class="text-amber-200">NexoraEngine</span></p>
                                <p>{</p>
                                <p class="pl-4"><span class="text-emerald-400">public function</span> <span class="text-[#cadbc9]">deploySolution</span>(<span class="text-[#86aa8a]">Client</span> $client): <span class="text-emerald-400">ProductResult</span></p>
                                <p class="pl-4">{</p>
                                <p class="pl-8 text-[#8fa093]">$app = $this->buildModularStack([</p>
                                <p class="pl-12 text-[#a8c4ab]">'frontend' => 'Next.js / Vue / Blade',</p>
                                <p class="pl-12 text-[#a8c4ab]">'backend'  => 'Laravel 12 / Go',</p>
                                <p class="pl-12 text-[#a8c4ab]">'database' => 'PostgreSQL + Redis',</p>
                                <p class="pl-12 text-[#a8c4ab]">'theme'    => 'Sage Green Aesthetic',</p>
                                <p class="pl-8 text-[#8fa093]"]);</p>
                                <p class="pl-8"><span class="text-emerald-400">return</span> $app->scaleToHighTraffic();</p>
                                <p class="pl-4">}</p>
                                <p>}</p>
                            </div>

                            <div class="mt-4 pt-3 border-t border-[#1b2b25] flex items-center justify-between text-[11px]">
                                <span class="text-[#86aa8a] flex items-center gap-1.5">
                                    <span class="w-2 h-2 rounded-full bg-[#86aa8a]"></span> CI/CD Pipeline Passed
                                </span>
                                <span class="text-[#8fa093]">Docker · AWS EKS</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 4. SERVICES SECTION -->
        <section id="services" class="py-20 bg-[#0d1411] border-t border-[#1b2b25]">
            <div class="max-w-7xl mx-auto px-4 sm:px-8">
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <span class="text-[#a8c4ab] text-xs font-mono font-bold tracking-wider uppercase">CORE CAPABILITIES</span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-white mt-2">Layanan Rekayasa Perangkat Lunak</h2>
                    <p class="text-[#8fa093] mt-3 text-sm sm:text-base">Mulai dari inception produk, implementasi kode berkualitas tinggi, hingga deployment cloud berskala tinggi.</p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Service 1 -->
                    <div class="bg-[#121c18]/80 hover:bg-[#121c18] border border-[#1f312b] hover:border-[#698f6d]/60 rounded-2xl p-6 transition duration-300 space-y-3">
                        <div class="w-12 h-12 rounded-xl bg-[#1a2823] border border-[#263d34] flex items-center justify-center text-[#a8c4ab] text-xl font-mono">
                            ⚡
                        </div>
                        <h3 class="text-lg font-bold text-white">Custom Web Applications</h3>
                        <p class="text-[#b0beb3] text-sm leading-relaxed">Portal internal, SaaS B2B, dashboard analitik, dan sistem ERP terintegrasi dengan UX intuitif dan performa kilat.</p>
                        <div class="pt-2 flex flex-wrap gap-1.5 text-[11px] font-mono text-[#a8c4ab]">
                            <span class="bg-[#182621] px-2 py-0.5 rounded border border-[#243830]">Laravel</span>
                            <span class="bg-[#182621] px-2 py-0.5 rounded border border-[#243830]">React / Vue</span>
                            <span class="bg-[#182621] px-2 py-0.5 rounded border border-[#243830]">Tailwind</span>
                        </div>
                    </div>

                    <!-- Service 2 -->
                    <div class="bg-[#121c18]/80 hover:bg-[#121c18] border border-[#1f312b] hover:border-[#698f6d]/60 rounded-2xl p-6 transition duration-300 space-y-3">
                        <div class="w-12 h-12 rounded-xl bg-[#1a2823] border border-[#263d34] flex items-center justify-center text-[#86aa8a] text-xl font-mono">
                            📱
                        </div>
                        <h3 class="text-lg font-bold text-white">Mobile App Development</h3>
                        <p class="text-[#b0beb3] text-sm leading-relaxed">Aplikasi iOS & Android cross-platform berkinerja native, aman untuk transaksi, dan sinkronisasi real-time offline-first.</p>
                        <div class="pt-2 flex flex-wrap gap-1.5 text-[11px] font-mono text-[#86aa8a]">
                            <span class="bg-[#182621] px-2 py-0.5 rounded border border-[#243830]">Flutter</span>
                            <span class="bg-[#182621] px-2 py-0.5 rounded border border-[#243830]">React Native</span>
                            <span class="bg-[#182621] px-2 py-0.5 rounded border border-[#243830]">REST & GraphQL</span>
                        </div>
                    </div>

                    <!-- Service 3 -->
                    <div class="bg-[#121c18]/80 hover:bg-[#121c18] border border-[#1f312b] hover:border-[#698f6d]/60 rounded-2xl p-6 transition duration-300 space-y-3">
                        <div class="w-12 h-12 rounded-xl bg-[#1a2823] border border-[#263d34] flex items-center justify-center text-[#cadbc9] text-xl font-mono">
                            🤖
                        </div>
                        <h3 class="text-lg font-bold text-white">AI & Automation Workflows</h3>
                        <p class="text-[#b0beb3] text-sm leading-relaxed">Integrasi model bahasa (LLM), chatbot layanan pelanggan cerdas, semantic search, dan otomatisasi ekstraksi dokumen bisnis.</p>
                        <div class="pt-2 flex flex-wrap gap-1.5 text-[11px] font-mono text-[#cadbc9]">
                            <span class="bg-[#182621] px-2 py-0.5 rounded border border-[#243830]">OpenAI / Claude API</span>
                            <span class="bg-[#182621] px-2 py-0.5 rounded border border-[#243830]">Vector DB</span>
                            <span class="bg-[#182621] px-2 py-0.5 rounded border border-[#243830]">Python FastAPI</span>
                        </div>
                    </div>

                    <!-- Service 4 -->
                    <div class="bg-[#121c18]/80 hover:bg-[#121c18] border border-[#1f312b] hover:border-[#698f6d]/60 rounded-2xl p-6 transition duration-300 space-y-3">
                        <div class="w-12 h-12 rounded-xl bg-[#1a2823] border border-[#263d34] flex items-center justify-center text-[#86aa8a] text-xl font-mono">
                            ☁️
                        </div>
                        <h3 class="text-lg font-bold text-white">Cloud Architecture & DevOps</h3>
                        <p class="text-[#b0beb3] text-sm leading-relaxed">Infrastruktur cloud auto-scaling, setup CI/CD pipeline otomatis, pemantauan log 24/7, serta audit keamanan siber.</p>
                        <div class="pt-2 flex flex-wrap gap-1.5 text-[11px] font-mono text-[#86aa8a]">
                            <span class="bg-[#182621] px-2 py-0.5 rounded border border-[#243830]">AWS / GCP</span>
                            <span class="bg-[#182621] px-2 py-0.5 rounded border border-[#243830]">Docker & K8s</span>
                            <span class="bg-[#182621] px-2 py-0.5 rounded border border-[#243830]">Terraform</span>
                        </div>
                    </div>

                    <!-- Service 5 -->
                    <div class="bg-[#121c18]/80 hover:bg-[#121c18] border border-[#1f312b] hover:border-[#698f6d]/60 rounded-2xl p-6 transition duration-300 space-y-3">
                        <div class="w-12 h-12 rounded-xl bg-[#1a2823] border border-[#263d34] flex items-center justify-center text-[#a8c4ab] text-xl font-mono">
                            🔄
                        </div>
                        <h3 class="text-lg font-bold text-white">Legacy System Modernization</h3>
                        <p class="text-[#b0beb3] text-sm leading-relaxed">Refactoring kode monolitik lama ke arsitektur microservices modern tanpa downtime operasional bisnis yang sedang berjalan.</p>
                        <div class="pt-2 flex flex-wrap gap-1.5 text-[11px] font-mono text-[#a8c4ab]">
                            <span class="bg-[#182621] px-2 py-0.5 rounded border border-[#243830]">Database Migration</span>
                            <span class="bg-[#182621] px-2 py-0.5 rounded border border-[#243830]">API Gateway</span>
                            <span class="bg-[#182621] px-2 py-0.5 rounded border border-[#243830]">Security Audit</span>
                        </div>
                    </div>

                    <!-- Service 6 -->
                    <div class="bg-[#121c18]/80 hover:bg-[#121c18] border border-[#1f312b] hover:border-[#698f6d]/60 rounded-2xl p-6 transition duration-300 space-y-3">
                        <div class="w-12 h-12 rounded-xl bg-[#1a2823] border border-[#263d34] flex items-center justify-center text-[#cadbc9] text-xl font-mono">
                            🛡️
                        </div>
                        <h3 class="text-lg font-bold text-white">Dedicated Tech Squad</h3>
                        <p class="text-[#b0beb3] text-sm leading-relaxed">Penyediaan tim developer senior khusus (Tech Lead, Backend, Frontend, QA) yang siap berintegrasi dengan workflow internal Anda.</p>
                        <div class="pt-2 flex flex-wrap gap-1.5 text-[11px] font-mono text-[#cadbc9]">
                            <span class="bg-[#182621] px-2 py-0.5 rounded border border-[#243830]">Agile Scrum</span>
                            <span class="bg-[#182621] px-2 py-0.5 rounded border border-[#243830]">Bi-weekly Sprint</span>
                            <span class="bg-[#182621] px-2 py-0.5 rounded border border-[#243830]">Daily Standup</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 5. TECH STACK SHOWCASE -->
        <section id="tech-stack" class="py-20 border-t border-[#1b2b25]">
            <div class="max-w-7xl mx-auto px-4 sm:px-8">
                <div class="flex flex-col md:flex-row md:items-end justify-between mb-12">
                    <div>
                        <span class="text-[#a8c4ab] text-xs font-mono font-bold uppercase tracking-wider">MODERN TOOLING</span>
                        <h2 class="text-3xl font-extrabold text-white mt-1">Teknologi yang Kami Gunakan</h2>
                    </div>
                    <p class="text-[#8fa093] text-sm max-w-md mt-2 md:mt-0">Kami hanya mengadopsi teknologi matang, didukung komunitas global, dan terbukti mampu menangani jutaan request.</p>
                </div>

                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4">
                    <div class="bg-[#111a17] border border-[#1f312b] rounded-xl p-4 text-center hover:border-[#698f6d]/60 transition">
                        <div class="text-2xl mb-1">🐘</div>
                        <div class="font-bold text-white text-sm">Laravel 12</div>
                        <div class="text-[11px] text-[#8fa093] font-mono">PHP Backend</div>
                    </div>
                    <div class="bg-[#111a17] border border-[#1f312b] rounded-xl p-4 text-center hover:border-[#698f6d]/60 transition">
                        <div class="text-2xl mb-1">⚛️</div>
                        <div class="font-bold text-white text-sm">React & Next.js</div>
                        <div class="text-[11px] text-[#8fa093] font-mono">Frontend SSR</div>
                    </div>
                    <div class="bg-[#111a17] border border-[#1f312b] rounded-xl p-4 text-center hover:border-[#698f6d]/60 transition">
                        <div class="text-2xl mb-1">🎯</div>
                        <div class="font-bold text-white text-sm">Flutter</div>
                        <div class="text-[11px] text-[#8fa093] font-mono">Cross Platform</div>
                    </div>
                    <div class="bg-[#111a17] border border-[#1f312b] rounded-xl p-4 text-center hover:border-[#698f6d]/60 transition">
                        <div class="text-2xl mb-1">🐬</div>
                        <div class="font-bold text-white text-sm">PostgreSQL</div>
                        <div class="text-[11px] text-[#8fa093] font-mono">Relational DB</div>
                    </div>
                    <div class="bg-[#111a17] border border-[#1f312b] rounded-xl p-4 text-center hover:border-[#698f6d]/60 transition">
                        <div class="text-2xl mb-1">⚡</div>
                        <div class="font-bold text-white text-sm">Redis</div>
                        <div class="text-[11px] text-[#8fa093] font-mono">In-Memory Cache</div>
                    </div>
                    <div class="bg-[#111a17] border border-[#1f312b] rounded-xl p-4 text-center hover:border-[#698f6d]/60 transition">
                        <div class="text-2xl mb-1">☁️</div>
                        <div class="font-bold text-white text-sm">AWS Cloud</div>
                        <div class="text-[11px] text-[#8fa093] font-mono">Infrastructure</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 6. PORTFOLIO & CASE STUDIES -->
        <section id="portfolio" class="py-20 bg-[#0d1411] border-t border-[#1b2b25]">
            <div class="max-w-7xl mx-auto px-4 sm:px-8">
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <span class="text-[#a8c4ab] text-xs font-mono font-bold uppercase tracking-wider">PROVEN RESULTS</span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-white mt-2">Koleksi Studi Kasus & Proyek</h2>
                    <p class="text-[#8fa093] mt-2 text-sm sm:text-base">Membantu startup unicorn hingga instrumen logistik nasional mendigitalkan alur bisnis penting.</p>
                </div>

                <div class="grid md:grid-cols-3 gap-8">
                    <!-- Project 1 -->
                    <div class="bg-[#121c18] border border-[#1f312b] rounded-2xl overflow-hidden hover:border-[#698f6d]/60 transition duration-300">
                        <div class="h-48 bg-gradient-to-tr from-[#172520] to-[#253931] p-6 flex flex-col justify-between">
                            <span class="text-xs font-mono text-[#a8c4ab] bg-[#0e1714] px-2.5 py-1 rounded w-fit border border-[#263d34]">Logistics SaaS</span>
                            <div class="text-white font-bold text-xl">TransTrack Global</div>
                        </div>
                        <div class="p-6 space-y-3">
                            <p class="text-[#b0beb3] text-sm leading-relaxed">Platform telematika armada truk real-time dengan pelacakan GPS latensi rendah dan pemantauan efisiensi bahan bakar.</p>
                            <div class="pt-2 text-xs text-[#8fa093] flex justify-between border-t border-[#1b2b25]">
                                <span>Hasil: <strong class="text-white">+34% Efisiensi Armada</strong></span>
                                <span class="text-[#a8c4ab] font-medium">Lihat Detail →</span>
                            </div>
                        </div>
                    </div>

                    <!-- Project 2 -->
                    <div class="bg-[#121c18] border border-[#1f312b] rounded-2xl overflow-hidden hover:border-[#698f6d]/60 transition duration-300">
                        <div class="h-48 bg-gradient-to-tr from-[#172520] to-[#253931] p-6 flex flex-col justify-between">
                            <span class="text-xs font-mono text-[#86aa8a] bg-[#0e1714] px-2.5 py-1 rounded w-fit border border-[#263d34]">FinTech Banking</span>
                            <div class="text-white font-bold text-xl">PaySphere Core</div>
                        </div>
                        <div class="p-6 space-y-3">
                            <p class="text-[#b0beb3] text-sm leading-relaxed">Modul microservices pembayaran B2B dengan integrasi Snap Midtrans, KYC otomatis, dan enkripsi data end-to-end PCI-DSS.</p>
                            <div class="pt-2 text-xs text-[#8fa093] flex justify-between border-t border-[#1b2b25]">
                                <span>Volume: <strong class="text-white">1.2 Juta Tx/Bulan</strong></span>
                                <span class="text-[#a8c4ab] font-medium">Lihat Detail →</span>
                            </div>
                        </div>
                    </div>

                    <!-- Project 3 -->
                    <div class="bg-[#121c18] border border-[#1f312b] rounded-2xl overflow-hidden hover:border-[#698f6d]/60 transition duration-300">
                        <div class="h-48 bg-gradient-to-tr from-[#172520] to-[#253931] p-6 flex flex-col justify-between">
                            <span class="text-xs font-mono text-[#cadbc9] bg-[#0e1714] px-2.5 py-1 rounded w-fit border border-[#263d34]">HealthTech App</span>
                            <div class="text-white font-bold text-xl">MediSync Hospital</div>
                        </div>
                        <div class="p-6 space-y-3">
                            <p class="text-[#b0beb3] text-sm leading-relaxed">Sistem rekam medis elektronik terdistribusi (EMR) dengan portal booking dokter terintegrasi BPJS dan WhatsApp API.</p>
                            <div class="pt-2 text-xs text-[#8fa093] flex justify-between border-t border-[#1b2b25]">
                                <span>Adopsi: <strong class="text-white">18 RS Terhubung</strong></span>
                                <span class="text-[#a8c4ab] font-medium">Lihat Detail →</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 7. PRICING & ESTIMATION -->
        <section id="pricing" class="py-20 border-t border-[#1b2b25]">
            <div class="max-w-7xl mx-auto px-4 sm:px-8">
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <span class="text-[#a8c4ab] text-xs font-mono font-bold uppercase tracking-wider">INVESTMENT TIERS</span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-white mt-2">Paket Pengembangan Transparan</h2>
                    <p class="text-[#8fa093] mt-2 text-sm sm:text-base">Pilih opsi yang sesuai dengan tahap pertumbuhan bisnis Anda. Semua paket mencakup garansi bug & source code milik Anda 100%.</p>
                </div>

                <div class="grid md:grid-cols-3 gap-8 items-stretch">
                    <!-- Tier 1 -->
                    <div class="bg-[#111a17] border border-[#1f312b] rounded-2xl p-7 flex flex-col justify-between hover:border-[#263d34] transition">
                        <div class="space-y-4">
                            <span class="text-xs font-mono text-[#8fa093] uppercase">MVP & FAST PROTOTYPE</span>
                            <h3 class="text-xl font-bold text-white">Starter Sprint</h3>
                            <p class="text-[#8fa093] text-xs leading-relaxed">Cocok untuk validasi ide bisnis atau peluncuran awal produk dalam waktu 3–4 minggu.</p>
                            <div class="text-3xl font-extrabold text-white font-mono pt-2">
                                Rp25jt <span class="text-xs font-sans text-[#8fa093] font-normal">/ project</span>
                            </div>
                            <ul class="text-xs text-[#c0ccc2] space-y-2.5 pt-4 border-t border-[#1b2b25]">
                                <li class="flex items-center gap-2">✔ Web App Responsive (Tailwind + Laravel)</li>
                                <li class="flex items-center gap-2">✔ Hingga 5 Modul / Halaman Inti</li>
                                <li class="flex items-center gap-2">✔ Integrasi Pembayaran / WhatsApp API</li>
                                <li class="flex items-center gap-2">✔ Setup VPS Cloud & SSL</li>
                                <li class="flex items-center gap-2">✔ 1 Bulan Pemeliharaan & Bug Fix</li>
                            </ul>
                        </div>
                        <a href="#contact" class="mt-8 text-center bg-[#182621] hover:bg-[#1f312b] text-white font-semibold py-3 rounded-xl transition text-xs border border-[#243830]">Pilih Starter</a>
                    </div>

                    <!-- Tier 2 (Featured) -->
                    <div class="bg-[#14221c] border-2 border-[#698f6d] rounded-2xl p-7 flex flex-col justify-between relative shadow-2xl sage-glow">
                        <div class="absolute -top-3 left-1/2 -translate-x-1/2 bg-gradient-to-r from-[#698f6d] to-[#425b45] text-white text-[11px] font-bold px-3.5 py-1 rounded-full uppercase tracking-wider font-mono border border-[#86aa8a]/50">
                            MOST POPULAR · SAGE EDITION
                        </div>
                        <div class="space-y-4">
                            <span class="text-xs font-mono text-[#a8c4ab] uppercase">ENTERPRISE READY</span>
                            <h3 class="text-xl font-bold text-white">Business Scale</h3>
                            <p class="text-[#c0ccc2] text-xs leading-relaxed">Sistem custom komprehensif dengan dashboard multi-role, automasi database, dan performa tinggi.</p>
                            <div class="text-3xl font-extrabold text-[#a8c4ab] font-mono pt-2">
                                Rp55jt <span class="text-xs font-sans text-[#8fa093] font-normal">/ project</span>
                            </div>
                            <ul class="text-xs text-[#d6ded7] space-y-2.5 pt-4 border-t border-[#1f312b]">
                                <li class="flex items-center gap-2 text-[#cadbc9]">✔ Full Custom Web & Mobile App</li>
                                <li class="flex items-center gap-2">✔ Arsitektur Database Teroptimasi</li>
                                <li class="flex items-center gap-2">✔ Multi-role RBAC & Audit Trails</li>
                                <li class="flex items-center gap-2">✔ Integrasi Asisten AI / Chatbot Pintar</li>
                                <li class="flex items-center gap-2">✔ Setup Docker CI/CD Auto Deployment</li>
                                <li class="flex items-center gap-2">✔ 3 Bulan Garansi SLA & Support Prioritas</li>
                            </ul>
                        </div>
                        <a href="#contact" class="mt-8 text-center bg-gradient-to-r from-[#698f6d] to-[#425b45] hover:from-[#78a37c] hover:to-[#527255] text-white font-bold py-3.5 rounded-xl transition text-xs shadow-lg shadow-[#698f6d]/25 border border-[#86aa8a]/40">Konsultasi Sekarang ↗</a>
                    </div>

                    <!-- Tier 3 -->
                    <div class="bg-[#111a17] border border-[#1f312b] rounded-2xl p-7 flex flex-col justify-between hover:border-[#263d34] transition">
                        <div class="space-y-4">
                            <span class="text-xs font-mono text-[#cadbc9] uppercase">DEDICATED TEAM</span>
                            <h3 class="text-xl font-bold text-white">Dedicated Squad</h3>
                            <p class="text-[#8fa093] text-xs leading-relaxed">Tim pengembang penuh waktu (Tech Lead, Fullstack, QA) yang bekerja eksklusif untuk roadmap Anda.</p>
                            <div class="text-3xl font-extrabold text-white font-mono pt-2">
                                Rp40jt <span class="text-xs font-sans text-[#8fa093] font-normal">/ bulan</span>
                            </div>
                            <ul class="text-xs text-[#c0ccc2] space-y-2.5 pt-4 border-t border-[#1b2b25]">
                                <li class="flex items-center gap-2">✔ 2–4 Senior Engineers Penuh Waktu</li>
                                <li class="flex items-center gap-2">✔ Fleksibilitas Scope Sprint Agile</li>
                                <li class="flex items-center gap-2">✔ Code Review & Automated QA Testing</li>
                                <li class="flex items-center gap-2">✔ Weekly Tech Demo & Delivery Report</li>
                                <li class="flex items-center gap-2">✔ Akses Langsung Slack & Jira Team</li>
                            </ul>
                        </div>
                        <a href="#contact" class="mt-8 text-center bg-[#182621] hover:bg-[#1f312b] text-white font-semibold py-3 rounded-xl transition text-xs border border-[#243830]">Diskusi Squad</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- 8. FAQ ACCORDION -->
        <section id="faq" class="py-20 bg-[#0d1411] border-t border-[#1b2b25]">
            <div class="max-w-4xl mx-auto px-4 sm:px-8">
                <div class="text-center mb-14">
                    <span class="text-[#a8c4ab] text-xs font-mono font-bold uppercase tracking-wider">QUESTIONS & ANSWERS</span>
                    <h2 class="text-3xl font-extrabold text-white mt-1">Frequently Asked Questions</h2>
                    <p class="text-[#8fa093] text-sm mt-2">Pertanyaan umum seputar proses pengerjaan, hak cipta source code, dan pemeliharaan.</p>
                </div>

                <div class="space-y-4" id="faqAccordion">
                    <!-- Q1 -->
                    <div class="bg-[#121c18] border border-[#1f312b] rounded-xl overflow-hidden">
                        <button type="button" class="faq-toggle w-full p-5 text-left flex justify-between items-center text-sm font-bold text-white hover:text-[#a8c4ab] transition" onclick="toggleFaq(this)">
                            <span>1. Siapakah pemilik hak cipta dan kode sumber (source code) proyek?</span>
                            <span class="faq-icon text-[#a8c4ab] text-xl font-mono">+</span>
                        </button>
                        <div class="faq-answer hidden px-5 pb-5 text-xs sm:text-sm text-[#b0beb3] leading-relaxed border-t border-[#1b2b25] pt-3">
                            Source code 100% adalah milik Anda setelah pelunasan proyek. Kami menyerahkan seluruh repositori Git, dokumentasi arsitektur, dan kredensial akses server tanpa biaya lisensi tersembunyi.
                        </div>
                    </div>

                    <!-- Q2 -->
                    <div class="bg-[#121c18] border border-[#1f312b] rounded-xl overflow-hidden">
                        <button type="button" class="faq-toggle w-full p-5 text-left flex justify-between items-center text-sm font-bold text-white hover:text-[#a8c4ab] transition" onclick="toggleFaq(this)">
                            <span>2. Berapa lama rata-rata durasi pembuatan aplikasi?</span>
                            <span class="faq-icon text-[#a8c4ab] text-xl font-mono">+</span>
                        </button>
                        <div class="faq-answer hidden px-5 pb-5 text-xs sm:text-sm text-[#b0beb3] leading-relaxed border-t border-[#1b2b25] pt-3">
                            Untuk paket Starter Sprint / MVP berkisar antara 3 hingga 5 minggu. Untuk sistem Business Scale atau enterprise berkisar 2 hingga 4 bulan, tergantung kompleksitas modul dan integrasi pihak ketiga.
                        </div>
                    </div>

                    <!-- Q3 -->
                    <div class="bg-[#121c18] border border-[#1f312b] rounded-xl overflow-hidden">
                        <button type="button" class="faq-toggle w-full p-5 text-left flex justify-between items-center text-sm font-bold text-white hover:text-[#a8c4ab] transition" onclick="toggleFaq(this)">
                            <span>3. Bagaimana sistem pembayaran proyek di Nexora Digital?</span>
                            <span class="faq-icon text-[#a8c4ab] text-xl font-mono">+</span>
                        </button>
                        <div class="faq-answer hidden px-5 pb-5 text-xs sm:text-sm text-[#b0beb3] leading-relaxed border-t border-[#1b2b25] pt-3">
                            Kami menerapkan sistem termin berbasis milestone: DP 30% saat kickoff, 30% setelah prototype/desain disetujui, 30% saat fase UAT (User Acceptance Test), dan 10% final setelah live deployment & handover.
                        </div>
                    </div>

                    <!-- Q4 -->
                    <div class="bg-[#121c18] border border-[#1f312b] rounded-xl overflow-hidden">
                        <button type="button" class="faq-toggle w-full p-5 text-left flex justify-between items-center text-sm font-bold text-white hover:text-[#a8c4ab] transition" onclick="toggleFaq(this)">
                            <span>4. Apakah disediakan garansi setelah aplikasi diluncurkan?</span>
                            <span class="faq-icon text-[#a8c4ab] text-xl font-mono">+</span>
                        </button>
                        <div class="faq-answer hidden px-5 pb-5 text-xs sm:text-sm text-[#b0beb3] leading-relaxed border-t border-[#1b2b25] pt-3">
                            Ya, setiap proyek dilengkapi dengan garansi perbaikan bug gratis selama 30 hingga 90 hari. Kami juga menyediakan opsi kontrak SLA Maintenance bulanan untuk monitoring keamanan dan update fitur lanjutan.
                        </div>
                    </div>

                    <!-- Q5 -->
                    <div class="bg-[#121c18] border border-[#1f312b] rounded-xl overflow-hidden">
                        <button type="button" class="faq-toggle w-full p-5 text-left flex justify-between items-center text-sm font-bold text-white hover:text-[#a8c4ab] transition" onclick="toggleFaq(this)">
                            <span>5. Bisakah Nexora melanjutkan atau memperbaiki codebase warisan (legacy code)?</span>
                            <span class="faq-icon text-[#a8c4ab] text-xl font-mono">+</span>
                        </button>
                        <div class="faq-answer hidden px-5 pb-5 text-xs sm:text-sm text-[#b0beb3] leading-relaxed border-t border-[#1b2b25] pt-3">
                            Tentu! Tim tech lead kami akan melakukan Code Audit komprehensif terlebih dahulu untuk menganalisis keamanan, performa database, dan utang teknis (technical debt) sebelum menentukan strategi refactoring yang aman.
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 9. CONTACT & CONSULTATION FORM -->
        <section id="contact" class="py-20 border-t border-[#1b2b25]">
            <div class="max-w-4xl mx-auto px-4 sm:px-8">
                <div class="bg-gradient-to-b from-[#121d19] to-[#0c1411] border border-[#263d34] rounded-3xl p-8 sm:p-12 sage-glow">
                    <div class="text-center max-w-xl mx-auto mb-8">
                        <span class="text-[#a8c4ab] text-xs font-mono font-bold uppercase tracking-wider">PROJECT INITIATION</span>
                        <h2 class="text-2xl sm:text-3xl font-extrabold text-white mt-1">Konsultasikan Kebutuhan Software Anda</h2>
                        <p class="text-[#8fa093] text-xs sm:text-sm mt-2">Isi formulir singkat di bawah, tim arsitek solusi kami akan menghubungi Anda dalam waktu 1x24 jam kerja.</p>
                    </div>

                    <form id="projectForm" onsubmit="handleProjectSubmit(event)" class="space-y-4">
                        <div class="grid sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-medium text-[#c0ccc2] mb-1">Nama Lengkap *</label>
                                <input type="text" id="clientName" required placeholder="Contoh: Budi Pratama" class="w-full bg-[#0a100e] border border-[#1f312b] rounded-xl px-4 py-2.5 text-xs text-white placeholder-[#647467] focus:outline-none focus:border-[#698f6d]">
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-[#c0ccc2] mb-1">Perusahaan / Bisnis *</label>
                                <input type="text" id="clientCompany" required placeholder="PT Inovasi Mandiri" class="w-full bg-[#0a100e] border border-[#1f312b] rounded-xl px-4 py-2.5 text-xs text-white placeholder-[#647467] focus:outline-none focus:border-[#698f6d]">
                            </div>
                        </div>

                        <div class="grid sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-medium text-[#c0ccc2] mb-1">Email Bisnis *</label>
                                <input type="email" id="clientEmail" required placeholder="budi@perusahaan.co.id" class="w-full bg-[#0a100e] border border-[#1f312b] rounded-xl px-4 py-2.5 text-xs text-white placeholder-[#647467] focus:outline-none focus:border-[#698f6d]">
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-[#c0ccc2] mb-1">Nomor WhatsApp *</label>
                                <input type="tel" id="clientPhone" required placeholder="081234567890" class="w-full bg-[#0a100e] border border-[#1f312b] rounded-xl px-4 py-2.5 text-xs text-white placeholder-[#647467] focus:outline-none focus:border-[#698f6d]">
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-medium text-[#c0ccc2] mb-1">Tipe Solusi yang Dibutuhkan</label>
                            <select id="projectType" class="w-full bg-[#0a100e] border border-[#1f312b] rounded-xl px-4 py-2.5 text-xs text-white focus:outline-none focus:border-[#698f6d]">
                                <option>Aplikasi Web Kustom (SaaS / Portal Internal)</option>
                                <option>Aplikasi Mobile (iOS & Android)</option>
                                <option>Integrasi AI & Automasi Workflow</option>
                                <option>Modernisasi Legacy System & Cloud Migration</option>
                                <option>Dedicated Tech Squad</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-medium text-[#c0ccc2] mb-1">Ringkasan Kebutuhan Proyek</label>
                            <textarea id="projectNotes" rows="3" placeholder="Ceritakan tujuan proyek, estimasi target peluncuran, atau preferensi stack teknologi..." class="w-full bg-[#0a100e] border border-[#1f312b] rounded-xl px-4 py-2.5 text-xs text-white placeholder-[#647467] focus:outline-none focus:border-[#698f6d]"></textarea>
                        </div>

                        <button type="submit" class="w-full bg-gradient-to-r from-[#698f6d] to-[#425b45] hover:from-[#78a37c] hover:to-[#527255] text-white font-bold py-3.5 rounded-xl transition text-sm shadow-xl shadow-[#698f6d]/25 border border-[#86aa8a]/40 flex items-center justify-center gap-2">
                            Kirim Permintaan Konsultasi via WhatsApp ↗
                        </button>
                        <p class="text-[11px] text-center text-[#8fa093]">Kerahasiaan ide dan data bisnis Anda dijamin melalui Perjanjian Kerahasiaan (NDA).</p>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <!-- 10. FOOTER -->
    <footer class="bg-[#060a09] border-t border-[#1b2b25] text-[#8fa093] text-xs py-14">
        <div class="max-w-7xl mx-auto px-4 sm:px-8">
            <div class="grid grid-cols-2 md:grid-cols-5 gap-8 pb-10 border-b border-[#1b2b25]">
                <div class="col-span-2 space-y-3">
                    <div class="flex items-center gap-2 text-white font-bold text-lg font-mono">
                        <span class="text-[#a8c4ab]">N/</span> NEXORA DIGITAL
                    </div>
                    <p class="text-[#8fa093] text-xs leading-relaxed max-w-sm">
                        Software house berstandar rekayasa tinggi untuk akselerasi produk digital, SaaS, dan transformasi sistem enterprise modern.
                    </p>
                    <div class="text-[11px] text-[#647467]">
                        Jakarta · Bandung · Surabaya, Indonesia
                    </div>
                </div>

                <div class="space-y-2.5">
                    <p class="font-bold text-white text-xs uppercase tracking-wider font-mono">Layanan</p>
                    <ul class="space-y-1.5">
                        <li><a href="#services" class="hover:text-[#a8c4ab] transition">Web Application</a></li>
                        <li><a href="#services" class="hover:text-[#a8c4ab] transition">Mobile App</a></li>
                        <li><a href="#services" class="hover:text-[#a8c4ab] transition">AI Automation</a></li>
                        <li><a href="#services" class="hover:text-[#a8c4ab] transition">Cloud & DevOps</a></li>
                    </ul>
                </div>

                <div class="space-y-2.5">
                    <p class="font-bold text-white text-xs uppercase tracking-wider font-mono">Perusahaan</p>
                    <ul class="space-y-1.5">
                        <li><a href="#portfolio" class="hover:text-[#a8c4ab] transition">Portfolio</a></li>
                        <li><a href="#pricing" class="hover:text-[#a8c4ab] transition">Investasi Biaya</a></li>
                        <li><a href="#tech-stack" class="hover:text-[#a8c4ab] transition">Tech Stack</a></li>
                        <li><a href="#faq" class="hover:text-[#a8c4ab] transition">FAQ</a></li>
                    </ul>
                </div>

                <div class="col-span-2 md:col-span-1 space-y-2.5">
                    <p class="font-bold text-white text-xs uppercase tracking-wider font-mono">Hubungi Kami</p>
                    <div class="space-y-1 text-[#8fa093]">
                        <p>WhatsApp: +62 858-5018-0285</p>
                        <p>Email: hello@nexora.digital</p>
                        <p>Jam: Sen–Jum 09.00–18.00 WIB</p>
                    </div>
                </div>
            </div>

            <div class="pt-8 flex flex-col sm:flex-row justify-between items-center gap-4 text-[11px] text-[#647467]">
                <p>&copy; 2026 Nexora Digital Studio. All rights reserved.</p>
                <p class="text-[#8fa093]">Website template by <strong class="text-[#a8c4ab]">WEBIA</strong></p>
            </div>
        </div>
    </footer>

    <!-- 11. FLOATING WHATSAPP BUTTON -->
    <a href="https://wa.me/6285850180285?text=Halo%20Nexora%20Digital,%20saya%20tertarik%20konsultasi%20pembuatan%20software/aplikasi." target="_blank" rel="noopener noreferrer" class="fixed bottom-6 left-6 z-50 flex items-center gap-2 bg-[#25D366] hover:bg-[#20bd5a] text-white px-4 py-3 rounded-full shadow-2xl transition duration-300 font-semibold text-xs tracking-wide group">
        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
        <span>Chat WhatsApp</span>
    </a>

    <!-- 12. FLOATING AI ASSISTANT BUTTON & MODAL -->
    <button id="aiToggleBtn" onclick="toggleNexoraBot()" class="fixed bottom-6 right-6 z-50 flex items-center gap-2.5 bg-gradient-to-r from-[#698f6d] to-[#425b45] hover:from-[#78a37c] hover:to-[#527255] text-white px-4.5 py-3 rounded-full shadow-2xl transition duration-300 font-semibold text-xs tracking-wide sage-glow border border-[#86aa8a]/40">
        <span class="w-2.5 h-2.5 rounded-full bg-[#86aa8a] animate-pulse"></span>
        <span class="font-mono">🌿 Nexora AI</span>
    </button>

    <!-- AI Bot Modal Window -->
    <div id="nexoraBotModal" class="hidden fixed bottom-22 right-6 z-50 w-80 sm:w-96 bg-[#0e1714] border border-[#263d34] rounded-2xl shadow-2xl overflow-hidden flex flex-col h-[460px] sage-glow">
        <!-- Header -->
        <div class="bg-gradient-to-r from-[#14221c] to-[#1c2e26] p-3.5 border-b border-[#1b2b25] flex justify-between items-center text-white">
            <div class="flex items-center gap-2">
                <div class="w-7 h-7 rounded-lg bg-[#698f6d]/20 text-[#a8c4ab] border border-[#698f6d]/40 flex items-center justify-center text-xs font-mono">
                    N/
                </div>
                <div>
                    <h4 class="font-bold text-xs">Nexora AI Architect</h4>
                    <span class="text-[10px] text-[#86aa8a] flex items-center gap-1 font-mono">
                        <span class="w-1.5 h-1.5 rounded-full bg-[#86aa8a]"></span> Online FAQ & Estimator
                    </span>
                </div>
            </div>
            <button onclick="toggleNexoraBot()" class="text-[#8fa093] hover:text-white text-lg p-1">&times;</button>
        </div>

        <!-- Chat messages container -->
        <div id="botMessages" class="p-4 flex-1 overflow-y-auto space-y-3 text-xs font-sans">
            <div class="bg-[#121c18] border border-[#1f312b] p-3 rounded-2xl rounded-tl-none text-[#c0ccc2]">
                Halo! 👋 Saya <strong>Nexora AI</strong>. Butuh konsultasi cepat tentang estimasi biaya, pemilihan stack teknologi, atau proses pengerjaan aplikasi?
            </div>

            <div class="space-y-1.5 pt-1">
                <p class="text-[10px] font-mono text-[#a8c4ab] uppercase">Pertanyaan Cepat:</p>
                <button onclick="sendQuickReply('Berapa estimasi biaya aplikasi web/mobile?')" class="w-full text-left bg-[#15221e] hover:bg-[#1a2c27] text-[#d6ded7] p-2 rounded-lg border border-[#243830] transition">
                    💡 Berapa perkiraan biaya aplikasi MVP?
                </button>
                <button onclick="sendQuickReply('Apakah source code menjadi milik klien?')" class="w-full text-left bg-[#15221e] hover:bg-[#1a2c27] text-[#d6ded7] p-2 rounded-lg border border-[#243830] transition">
                    🛡️ Bagaimana kepemilikan source code?
                </button>
                <button onclick="sendQuickReply('Berapa lama waktu pembuatan sistem?')" class="w-full text-left bg-[#15221e] hover:bg-[#1a2c27] text-[#d6ded7] p-2 rounded-lg border border-[#243830] transition">
                    ⏱️ Berapa lama durasi pengerjaan?
                </button>
            </div>
        </div>

        <!-- Input Bar -->
        <div class="p-2.5 bg-[#0a100e] border-t border-[#1b2b25] flex gap-2">
            <input type="text" id="botInput" placeholder="Tanya tentang tech stack / biaya..." onkeydown="if(event.key==='Enter') sendCustomReply()" class="flex-1 bg-[#121c18] border border-[#1f312b] rounded-xl px-3 py-2 text-xs text-white placeholder-[#647467] focus:outline-none focus:border-[#698f6d]">
            <button onclick="sendCustomReply()" class="bg-[#698f6d] hover:bg-[#78a37c] text-white font-bold px-3 py-2 rounded-xl text-xs transition">
                Kirim
            </button>
        </div>
    </div>

    <!-- SCRIPT LOGIC -->
    <script>
        // Toggle Mobile Menu
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const mobileMenu = document.getElementById('mobileMenu');
        if (mobileMenuBtn && mobileMenu) {
            mobileMenuBtn.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        }

        // Toggle FAQ Accordion
        function toggleFaq(btn) {
            const answer = btn.nextElementSibling;
            const icon = btn.querySelector('.faq-icon');
            const isHidden = answer.classList.contains('hidden');

            // Close all
            document.querySelectorAll('.faq-answer').forEach(el => el.classList.add('hidden'));
            document.querySelectorAll('.faq-icon').forEach(el => el.textContent = '+');

            if (isHidden) {
                answer.classList.remove('hidden');
                icon.textContent = '−';
            }
        }

        // Toggle AI Chatbot
        function toggleNexoraBot() {
            const modal = document.getElementById('nexoraBotModal');
            modal.classList.toggle('hidden');
        }

        // Quick Reply AI Bot
        function sendQuickReply(question) {
            appendUserMsg(question);
            let reply = "Terima kasih atas pertanyaannya! Tim tech architect kami siap mendiskusikan kebutuhan spesifik Anda lebih mendalam. Anda dapat langsung terhubung via WhatsApp melalui tombol hijau di kiri bawah atau mengisi form di atas!";

            if (question.includes('biaya')) {
                reply = "Untuk paket Starter Sprint mulai dari Rp25 Juta (MVP 3-4 minggu), Business Scale Rp55 Juta (Enterprise Web/Mobile), atau Dedicated Squad Rp40 Juta/bulan. Semua include garansi & 100% source code!";
            } else if (question.includes('source code')) {
                reply = "Ya, 100% source code, repositori Git, dan hak cipta diserahkan penuh kepada Anda setelah pelunasan tanpa biaya royalti.";
            } else if (question.includes('waktu')) {
                reply = "Durasi MVP rata-rata 3–5 minggu, sedangkan sistem custom enterprise berkisar 2–3 bulan.";
            }

            setTimeout(() => {
                appendBotMsg(reply);
            }, 500);
        }

        function sendCustomReply() {
            const input = document.getElementById('botInput');
            const val = input.value.trim();
            if (!val) return;
            appendUserMsg(val);
            input.value = '';

            setTimeout(() => {
                appendBotMsg("Terima kasih atas pertanyaannya! Untuk kebutuhan '" + val + "', solusi terbaik dapat kita rancang secara terperinci. Silakan klik tombol 'Chat WhatsApp' di kiri bawah untuk berdiskusi langsung dengan tech lead kami! 🌿");
            }, 600);
        }

        function appendUserMsg(msg) {
            const container = document.getElementById('botMessages');
            const div = document.createElement('div');
            div.className = "bg-[#698f6d] text-white p-2.5 rounded-2xl rounded-tr-none text-xs ml-auto max-w-[85%]";
            div.textContent = msg;
            container.appendChild(div);
            container.scrollTop = container.scrollHeight;
        }

        function appendBotMsg(msg) {
            const container = document.getElementById('botMessages');
            const div = document.createElement('div');
            div.className = "bg-[#14201c] border border-[#1f312b] text-[#c0ccc2] p-2.5 rounded-2xl rounded-tl-none text-xs mr-auto max-w-[85%]";
            div.textContent = msg;
            container.appendChild(div);
            container.scrollTop = container.scrollHeight;
        }

        // Form Submit to WhatsApp
        function handleProjectSubmit(e) {
            e.preventDefault();
            const name = document.getElementById('clientName').value;
            const company = document.getElementById('clientCompany').value;
            const phone = document.getElementById('clientPhone').value;
            const type = document.getElementById('projectType').value;
            const notes = document.getElementById('projectNotes').value;

            const text = encodeURIComponent(
                `Halo Nexora Digital, saya ingin konsultasi proyek:\n\n` +
                `*Nama:* ${name}\n` +
                `*Perusahaan:* ${company}\n` +
                `*WhatsApp:* ${phone}\n` +
                `*Tipe Solusi:* ${type}\n` +
                `*Catatan:* ${notes}\n\n` +
                `Mohon informasi jadwal diskusi teknis lebih lanjut.`
            );

            window.open(`https://wa.me/6285850180285?text=${text}`, '_blank');
        }
    </script>
</body>
</html>
