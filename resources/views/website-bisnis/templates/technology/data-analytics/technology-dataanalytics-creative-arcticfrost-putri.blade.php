<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FrostByte Analytics — Data Analytics Creative Arctic Frost</title>
    <meta name="description" content="FrostByte Analytics adalah studio analitik data kreatif dengan nuansa Arctic Frost. Transformasikan kompleksitas big data menjadi kecerdasan visual presisi, predictive AI, dan arsitektur data masa depan.">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&family=Space+Grotesk:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Outfit"', 'sans-serif'],
                        display: ['"Space Grotesk"', 'sans-serif'],
                        mono: ['"JetBrains Mono"', 'monospace'],
                    },
                    colors: {
                        polar: {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            200: '#bae6fd',
                            300: '#7dd3fc',
                            400: '#38bdf8',
                            500: '#0ea5e9',
                            600: '#0284c7',
                            700: '#0369a1',
                            800: '#075985',
                            900: '#0c4a6e',
                            950: '#031726',
                        },
                        arctic: {
                            abyss: '#030712',
                            deep: '#06101e',
                            glacier: '#0a1d33',
                            surface: '#0f294a',
                            ice: '#38bdf8',
                            glow: '#00f0ff',
                            frost: '#e2f4ff',
                            silver: '#94a3b8',
                        }
                    },
                    animation: {
                        'float-slow': 'float 7s ease-in-out infinite',
                        'float-reverse': 'floatRev 8s ease-in-out infinite',
                        'pulse-glow': 'pulseGlow 4s ease-in-out infinite',
                        'shimmer': 'shimmer 2.5s infinite',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0px) rotate(0deg)' },
                            '50%': { transform: 'translateY(-14px) rotate(1.5deg)' },
                        },
                        floatRev: {
                            '0%, 100%': { transform: 'translateY(0px) rotate(0deg)' },
                            '50%': { transform: 'translateY(14px) rotate(-1.5deg)' },
                        },
                        pulseGlow: {
                            '0%, 100%': { opacity: '0.4', filter: 'blur(30px)' },
                            '50%': { opacity: '0.85', filter: 'blur(45px)' },
                        },
                        shimmer: {
                            '0%': { transform: 'translateX(-100%)' },
                            '100%': { transform: 'translateX(100%)' },
                        }
                    }
                }
            }
        }
    </script>

    <style>
        /* Arctic Frost Custom Styles */
        .glass-panel {
            background: rgba(8, 25, 48, 0.65);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(56, 189, 248, 0.18);
        }
        .glass-card {
            background: rgba(10, 30, 56, 0.55);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            border: 1px solid rgba(125, 211, 252, 0.14);
            transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .glass-card:hover {
            border-color: rgba(56, 189, 248, 0.5);
            transform: translateY(-4px);
            box-shadow: 0 16px 36px -10px rgba(0, 240, 255, 0.22);
        }
        .text-glow {
            text-shadow: 0 0 24px rgba(56, 189, 248, 0.55);
        }
        .frost-grid {
            background-image: 
                radial-gradient(rgba(56, 189, 248, 0.12) 1px, transparent 1px),
                radial-gradient(rgba(0, 240, 255, 0.08) 1px, transparent 1px);
            background-size: 32px 32px;
            background-position: 0 0, 16px 16px;
        }
        .frost-border-gradient {
            border-image: linear-gradient(135deg, rgba(56, 189, 248, 0.7), rgba(14, 165, 233, 0.2), rgba(255, 255, 255, 0.5)) 1;
        }
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #030712;
        }
        ::-webkit-scrollbar-thumb {
            background: #0c4a6e;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #0284c7;
        }
    </style>
</head>

<body class="bg-arctic-abyss text-slate-100 font-sans antialiased overflow-x-hidden frost-grid selection:bg-cyan-500/30 selection:text-cyan-200">

    <!-- Atmospheric Aurora / Frost Glow Background Elements -->
    <div class="fixed inset-0 pointer-events-none z-0 overflow-hidden">
        <div class="absolute -top-40 left-1/4 w-[650px] h-[650px] bg-cyan-500/15 rounded-full blur-[140px] animate-pulse-glow"></div>
        <div class="absolute top-1/3 -right-32 w-[550px] h-[550px] bg-blue-600/15 rounded-full blur-[150px] animate-float-slow"></div>
        <div class="absolute bottom-10 left-10 w-[600px] h-[600px] bg-sky-400/10 rounded-full blur-[160px] animate-float-reverse"></div>
    </div>

    <!-- Top Notice / Live Telemetry Bar -->
    <aside aria-label="Announcement" class="relative z-50 bg-gradient-to-r from-arctic-glacier/90 via-polar-950/90 to-arctic-glacier/90 border-b border-cyan-500/20 text-xs py-2 px-4 backdrop-blur-md">
        <div class="max-w-7xl mx-auto flex flex-wrap items-center justify-between gap-3 text-polar-200">
            <div class="flex items-center gap-2">
                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-mono font-bold bg-cyan-500/20 text-cyan-300 border border-cyan-400/30">
                    <span class="w-1.5 h-1.5 rounded-full bg-cyan-400 animate-ping mr-1.5"></span>
                    ARCTIC ENGINE v4.8
                </span>
                <span class="hidden sm:inline text-slate-300">Algoritma Frost Neural Stream: Menghubungkan 12M+ Data Points/Detik Real-time.</span>
            </div>
            <div class="flex items-center gap-4 text-[11px] font-mono text-cyan-300">
                <span class="flex items-center gap-1.5">
                    <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                    Cluster Status: 99.99% Latency &lt; 4ms
                </span>
                <a href="#demo" class="hover:text-white underline transition">Uji Coba Sandbox &rarr;</a>
            </div>
        </div>
    </aside>

    <!-- Navigation Header -->
    <header class="sticky top-0 z-40 glass-panel border-b border-cyan-500/20 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
            <!-- Brand Logo -->
            <a href="#" class="flex items-center gap-3 group">
                <div class="w-11 h-11 rounded-xl bg-gradient-to-br from-cyan-400 via-sky-500 to-blue-700 p-0.5 shadow-[0_0_20px_rgba(0,240,255,0.4)] group-hover:shadow-[0_0_28px_rgba(0,240,255,0.7)] transition-all">
                    <div class="w-full h-full bg-arctic-deep rounded-[10px] flex items-center justify-center relative overflow-hidden">
                        <svg class="w-6 h-6 text-cyan-300 group-hover:scale-110 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                        <div class="absolute inset-0 bg-gradient-to-t from-cyan-500/20 to-transparent pointer-events-none"></div>
                    </div>
                </div>
                <div>
                    <span class="font-display font-extrabold text-2xl tracking-tight text-white flex items-center gap-1">
                        Frost<span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-sky-300">Byte</span>
                    </span>
                    <span class="block text-[10px] font-mono uppercase tracking-widest text-cyan-400/90 -mt-1">
                        Creative Data Studio
                    </span>
                </div>
            </a>

            <!-- Desktop Nav Links -->
            <nav class="hidden md:flex items-center gap-8 text-sm font-medium text-slate-300">
                <a href="#visualizer" class="hover:text-cyan-300 transition-colors">Visualizer</a>
                <a href="#capabilities" class="hover:text-cyan-300 transition-colors">Kapabilitas</a>
                <a href="#pipeline" class="hover:text-cyan-300 transition-colors">Arsitektur</a>
                <a href="#calculator" class="hover:text-cyan-300 transition-colors">Kalkulator ROI</a>
                <a href="#pricing" class="hover:text-cyan-300 transition-colors">Investasi</a>
                <a href="#faq" class="hover:text-cyan-300 transition-colors">FAQ</a>
            </nav>

            <!-- CTA Actions -->
            <div class="hidden sm:flex items-center gap-3">
                <button onclick="openFrostAI()" class="px-4 py-2 rounded-xl text-xs font-mono font-semibold bg-cyan-950/70 hover:bg-cyan-900 text-cyan-300 border border-cyan-500/40 hover:border-cyan-400 transition-all flex items-center gap-2 shadow-[0_0_15px_rgba(56,189,248,0.15)]">
                    <span class="w-2 h-2 rounded-full bg-cyan-400 animate-pulse"></span>
                    FrostAI Concierge
                </button>
                <a href="#consultation" class="relative group overflow-hidden px-5 py-2.5 rounded-xl font-display font-bold text-xs uppercase tracking-wider text-slate-900 bg-gradient-to-r from-cyan-300 via-sky-300 to-cyan-400 hover:from-white hover:to-cyan-200 transition-all shadow-[0_0_25px_rgba(56,189,248,0.45)] hover:shadow-[0_0_35px_rgba(0,240,255,0.7)]">
                    <span class="relative z-10 flex items-center gap-1.5">
                        Mulai Eksplorasi
                        <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </span>
                </a>
            </div>

            <!-- Mobile Menu Toggle -->
            <button onclick="toggleMobileMenu()" class="md:hidden p-2 rounded-lg bg-arctic-glacier text-slate-300 hover:text-white border border-cyan-500/30">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
            </button>
        </div>

        <!-- Mobile Drawer Menu -->
        <div id="mobile-menu" class="hidden md:hidden border-t border-cyan-500/20 bg-arctic-deep/95 backdrop-blur-2xl px-6 py-6 space-y-4">
            <nav class="flex flex-col space-y-3 font-medium text-slate-300">
                <a href="#visualizer" onclick="toggleMobileMenu()" class="hover:text-cyan-300">Live Visualizer</a>
                <a href="#capabilities" onclick="toggleMobileMenu()" class="hover:text-cyan-300">Kapabilitas Solusi</a>
                <a href="#pipeline" onclick="toggleMobileMenu()" class="hover:text-cyan-300">Arsitektur Pipeline</a>
                <a href="#calculator" onclick="toggleMobileMenu()" class="hover:text-cyan-300">Kalkulator ROI</a>
                <a href="#pricing" onclick="toggleMobileMenu()" class="hover:text-cyan-300">Paket Investasi</a>
                <a href="#faq" onclick="toggleMobileMenu()" class="hover:text-cyan-300">FAQ</a>
            </nav>
            <div class="pt-4 border-t border-cyan-500/20 flex flex-col gap-3">
                <button onclick="openFrostAI(); toggleMobileMenu();" class="w-full py-2.5 rounded-xl text-center text-xs font-mono font-semibold bg-cyan-950/80 text-cyan-300 border border-cyan-500/40">
                    Buka FrostAI Concierge
                </button>
                <a href="#consultation" onclick="toggleMobileMenu()" class="w-full py-3 rounded-xl text-center font-bold text-xs uppercase text-slate-900 bg-gradient-to-r from-cyan-300 to-sky-300">
                    Konsultasi Big Data
                </a>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="relative z-10">

        <!-- HERO SECTION: Creative Asymmetric Layout -->
        <section class="relative min-h-[92vh] flex items-center justify-center pt-8 pb-20 overflow-hidden">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
                <div class="grid lg:grid-cols-12 gap-12 items-center">
                    
                    <!-- Left Column: Storytelling & Hook -->
                    <div class="lg:col-span-7 space-y-6 text-left">
                        <!-- Eyebrow Badge -->
                        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-cyan-500/10 border border-cyan-400/30 text-cyan-300 text-xs font-mono tracking-wider uppercase">
                            <span class="w-2 h-2 rounded-full bg-cyan-400 animate-ping"></span>
                            CREATIVE DATA INTELLIGENCE & ARTISTRY
                        </div>

                        <!-- Main Headline -->
                        <h1 class="font-display font-extrabold text-4xl sm:text-5xl lg:text-6xl tracking-tight leading-[1.1] text-white">
                            Menyingkap Tabir Data,<br>
                            <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-300 via-sky-200 to-blue-400 text-glow">
                                Menciptakan Mahakarya
                            </span><br>
                            Wawasan Prediktif.
                        </h1>

                        <!-- Subtitle Description -->
                        <p class="text-base sm:text-lg text-slate-300 max-w-2xl font-light leading-relaxed">
                            Kami mengubah jutaan record tak beraturan menjadi orkestrasi visual yang elegan. Memberdayakan C-Level & Data Leader dengan arsitektur cloud lakehouse, neural predictive modeling, dan visualisasi berkecepatan tinggi.
                        </p>

                        <!-- CTA Actions Group -->
                        <div class="pt-2 flex flex-wrap items-center gap-4">
                            <a href="#consultation" class="px-7 py-3.5 rounded-xl font-display font-bold text-sm uppercase tracking-wider text-slate-950 bg-gradient-to-r from-cyan-300 via-sky-200 to-cyan-400 hover:from-white hover:to-cyan-300 transition-all shadow-[0_0_30px_rgba(56,189,248,0.5)] hover:shadow-[0_0_40px_rgba(0,240,255,0.8)] flex items-center gap-2">
                                <span>Audit Data Gratis (30 Menit)</span>
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                            </a>
                            <a href="#visualizer" class="px-6 py-3.5 rounded-xl font-display font-semibold text-sm text-cyan-200 bg-arctic-glacier/70 hover:bg-arctic-surface border border-cyan-500/30 hover:border-cyan-400 transition-all flex items-center gap-2">
                                <svg class="w-5 h-5 text-cyan-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                <span>Lihat Sandbox Visual</span>
                            </a>
                        </div>

                        <!-- Trust Metrics Grid -->
                        <div class="pt-8 border-t border-cyan-500/20 grid grid-cols-3 gap-6">
                            <div>
                                <div class="font-display font-extrabold text-2xl sm:text-3xl text-cyan-300">99.4%</div>
                                <div class="text-xs text-slate-400 font-mono mt-0.5">Akurasi Prediksi Model</div>
                            </div>
                            <div>
                                <div class="font-display font-extrabold text-2xl sm:text-3xl text-sky-300">14.8M+</div>
                                <div class="text-xs text-slate-400 font-mono mt-0.5">Events Diproses / Menit</div>
                            </div>
                            <div>
                                <div class="font-display font-extrabold text-2xl sm:text-3xl text-polar-200">&lt; 28 Hari</div>
                                <div class="text-xs text-slate-400 font-mono mt-0.5">Time-to-Value Delivery</div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column: Creative Interactive Glacial HUD / Visual Glass Artifact -->
                    <div class="lg:col-span-5 relative">
                        <!-- Outer Ambient Frame -->
                        <div class="relative p-1 rounded-3xl bg-gradient-to-br from-cyan-400/40 via-sky-500/20 to-transparent shadow-[0_0_50px_rgba(0,240,255,0.25)]">
                            <div class="glass-card rounded-[22px] p-6 space-y-6 relative overflow-hidden bg-arctic-deep/80">
                                
                                <!-- Card Header -->
                                <div class="flex items-center justify-between pb-4 border-b border-cyan-500/20">
                                    <div class="flex items-center gap-3">
                                        <div class="w-3 h-3 rounded-full bg-cyan-400 animate-ping"></div>
                                        <span class="font-mono text-xs font-bold uppercase tracking-wider text-cyan-300">
                                            ARCTIC_TELEMETRY // LIVE
                                        </span>
                                    </div>
                                    <span class="px-2.5 py-1 rounded bg-cyan-500/10 text-[10px] font-mono text-cyan-200 border border-cyan-400/30">
                                        STREAMING AKTIF
                                    </span>
                                </div>

                                <!-- Dynamic Sparkline Mockup -->
                                <div class="space-y-2">
                                    <div class="flex justify-between items-baseline">
                                        <span class="text-xs text-slate-400">Total Pipeline Throughput</span>
                                        <span class="font-mono text-sm font-bold text-cyan-300" id="live-throughput">3,492 MB/s</span>
                                    </div>
                                    <div class="h-28 w-full bg-arctic-abyss/80 rounded-xl p-3 border border-cyan-500/20 flex items-end gap-1.5 relative overflow-hidden">
                                        <!-- Bars with animated heights -->
                                        <div class="flex-1 bg-gradient-to-t from-cyan-900 to-cyan-400 rounded-t h-[45%]"></div>
                                        <div class="flex-1 bg-gradient-to-t from-cyan-900 to-cyan-400 rounded-t h-[70%]"></div>
                                        <div class="flex-1 bg-gradient-to-t from-cyan-900 to-cyan-300 rounded-t h-[55%]"></div>
                                        <div class="flex-1 bg-gradient-to-t from-cyan-900 to-sky-400 rounded-t h-[85%]"></div>
                                        <div class="flex-1 bg-gradient-to-t from-cyan-900 to-cyan-400 rounded-t h-[60%]"></div>
                                        <div class="flex-1 bg-gradient-to-t from-cyan-900 to-cyan-300 rounded-t h-[95%]"></div>
                                        <div class="flex-1 bg-gradient-to-t from-cyan-900 to-cyan-400 rounded-t h-[68%]"></div>
                                        <div class="flex-1 bg-gradient-to-t from-cyan-900 to-sky-400 rounded-t h-[78%]"></div>
                                        <div class="flex-1 bg-gradient-to-t from-cyan-900 to-cyan-200 rounded-t h-[90%] shadow-[0_0_12px_rgba(0,240,255,0.7)]"></div>
                                        <div class="flex-1 bg-gradient-to-t from-cyan-900 to-cyan-400 rounded-t h-[82%]"></div>
                                        <div class="flex-1 bg-gradient-to-t from-cyan-900 to-cyan-300 rounded-t h-[88%]"></div>
                                        <div class="flex-1 bg-gradient-to-t from-cyan-900 to-sky-300 rounded-t h-[72%]"></div>
                                        <!-- Scanning laser line -->
                                        <div class="absolute inset-y-0 w-1 bg-cyan-300/80 blur-[2px] animate-shimmer"></div>
                                    </div>
                                </div>

                                <!-- Key Indicators Grid -->
                                <div class="grid grid-cols-2 gap-3 pt-2">
                                    <div class="p-3 rounded-xl bg-arctic-glacier/60 border border-cyan-500/20">
                                        <div class="text-[10px] font-mono text-slate-400 uppercase">Anomaly Detection</div>
                                        <div class="text-base font-bold text-emerald-300 flex items-center gap-1.5 mt-0.5">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                            Zero Anomalies
                                        </div>
                                        <div class="text-[10px] text-slate-500 mt-1">94.8k audit nodes checked</div>
                                    </div>
                                    <div class="p-3 rounded-xl bg-arctic-glacier/60 border border-cyan-500/20">
                                        <div class="text-[10px] font-mono text-slate-400 uppercase">Revenue Uplift Model</div>
                                        <div class="text-base font-bold text-cyan-300 flex items-center gap-1.5 mt-0.5">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                                            +34.6% Proyeksi
                                        </div>
                                        <div class="text-[10px] text-slate-500 mt-1">Confidence 98.2%</div>
                                    </div>
                                </div>

                                <!-- Floating Glacial Frost Artifact Badge -->
                                <div class="p-3.5 rounded-xl bg-gradient-to-r from-cyan-950/80 to-blue-950/80 border border-cyan-400/30 flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-lg bg-cyan-400/20 flex items-center justify-center text-cyan-300 font-mono font-bold text-xs">
                                            AI
                                        </div>
                                        <div>
                                            <div class="text-xs font-bold text-white">Frost Insight Suggestion</div>
                                            <div class="text-[11px] text-slate-300">Cluster B segmen pelanggan berpotensi churn +12%</div>
                                        </div>
                                    </div>
                                    <button onclick="openFrostAI()" class="text-xs font-mono text-cyan-400 hover:text-cyan-200 underline">
                                        Audit
                                    </button>
                                </div>

                            </div>
                        </div>

                        <!-- Floating Frost Badges around right column -->
                        <div class="absolute -bottom-6 -left-6 glass-card p-3 rounded-2xl border border-cyan-400/30 hidden sm:flex items-center gap-3 animate-float-slow shadow-xl">
                            <div class="w-9 h-9 rounded-xl bg-cyan-500/20 flex items-center justify-center text-cyan-300">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                            </div>
                            <div>
                                <div class="text-xs font-bold text-white">Cloud Data Lakehouse</div>
                                <div class="text-[10px] text-cyan-300">Zero Ingestion Bottlenecks</div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <!-- CLIENT & PARTNER LOGOS BAR -->
        <section class="border-y border-cyan-500/20 bg-arctic-deep/50 py-8 backdrop-blur-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <p class="text-center font-mono text-xs uppercase tracking-widest text-slate-400 mb-6">
                    Dipercaya oleh Enterprise, FinTech, &amp; Unicorn Terkemuka
                </p>
                <div class="flex flex-wrap items-center justify-center gap-8 md:gap-14 opacity-75 grayscale hover:grayscale-0 transition-all duration-300 text-slate-300 font-display font-bold text-lg">
                    <span class="hover:text-cyan-300 transition flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded bg-cyan-400"></span> POLARIX BANK
                    </span>
                    <span class="hover:text-cyan-300 transition flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded bg-sky-400"></span> NORDIC LOGISTICS
                    </span>
                    <span class="hover:text-cyan-300 transition flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded bg-blue-400"></span> AURORA HEALTH
                    </span>
                    <span class="hover:text-cyan-300 transition flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded bg-cyan-300"></span> GLACIER RETAIL
                    </span>
                    <span class="hover:text-cyan-300 transition flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded bg-teal-400"></span> CYBERMETRIC ID
                    </span>
                </div>
            </div>
        </section>

        <!-- INTERACTIVE LIVE DATA VISUALIZER SANDBOX -->
        <section id="visualizer" class="py-24 relative">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                
                <!-- Section Header -->
                <div class="text-center max-w-3xl mx-auto space-y-4 mb-16">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-cyan-500/10 border border-cyan-400/30 text-cyan-300 text-xs font-mono">
                        EXPERIMENT LIVE DATA CANVAS
                    </div>
                    <h2 class="font-display font-extrabold text-3xl sm:text-4xl text-white">
                        Simulasi Visual: <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-300 to-sky-400">Bukan Sekadar Angka</span>, Tapi Keputusan Strategis.
                    </h2>
                    <p class="text-slate-300 text-sm sm:text-base">
                        Ganti skenario di bawah untuk melihat bagaimana FrostByte menguraikan anomali, klaster perilaku pelanggan, dan proyeksi EBITDA secara real-time.
                    </p>
                </div>

                <!-- Sandbox Container -->
                <div class="glass-panel rounded-3xl p-6 sm:p-8 border border-cyan-500/30 shadow-[0_0_40px_rgba(0,240,255,0.15)] space-y-8">
                    
                    <!-- Sandbox Mode Switcher Tabs -->
                    <div class="flex flex-wrap items-center justify-between gap-4 border-b border-cyan-500/20 pb-6">
                        <div class="flex flex-wrap gap-2" id="canvas-tabs">
                            <button onclick="switchCanvasTab('forecast')" id="tab-forecast" class="px-5 py-2.5 rounded-xl font-display font-bold text-xs uppercase tracking-wider bg-cyan-400 text-slate-950 transition-all shadow-[0_0_20px_rgba(56,189,248,0.5)]">
                                Predictive Forecast
                            </button>
                            <button onclick="switchCanvasTab('cluster')" id="tab-cluster" class="px-5 py-2.5 rounded-xl font-display font-bold text-xs uppercase tracking-wider bg-arctic-glacier/80 text-slate-300 hover:text-white border border-cyan-500/30 hover:border-cyan-400 transition-all">
                                Neural Cluster Behavior
                            </button>
                            <button onclick="switchCanvasTab('pipeline-health')" id="tab-pipeline-health" class="px-5 py-2.5 rounded-xl font-display font-bold text-xs uppercase tracking-wider bg-arctic-glacier/80 text-slate-300 hover:text-white border border-cyan-500/30 hover:border-cyan-400 transition-all">
                                Lakehouse Ingestion Health
                            </button>
                        </div>
                        <div class="flex items-center gap-3 text-xs font-mono text-cyan-300">
                            <span class="w-2 h-2 rounded-full bg-cyan-400 animate-ping"></span>
                            Live Engine Feed: <span class="font-bold text-white">42.1k events/sec</span>
                        </div>
                    </div>

                    <!-- Sandbox Viewport 1: Predictive Forecast -->
                    <div id="view-forecast" class="space-y-6">
                        <div class="grid lg:grid-cols-3 gap-6">
                            
                            <!-- Main Visualization Chart Card -->
                            <div class="lg:col-span-2 p-6 rounded-2xl bg-arctic-deep/90 border border-cyan-500/20 space-y-4">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h3 class="font-display font-bold text-base text-white">Proyeksi Pertumbuhan Laba Bersih Q1-Q4 (2026)</h3>
                                        <p class="text-xs text-slate-400">Algoritma Auto-Regressive Deep Forest dengan 95% Confidence Interval</p>
                                    </div>
                                    <span class="px-2.5 py-1 rounded bg-emerald-500/20 text-emerald-300 text-xs font-mono font-bold">
                                        +42.8% Target
                                    </span>
                                </div>

                                <!-- Dynamic Visual Canvas Representation -->
                                <div class="h-64 rounded-xl bg-arctic-abyss/90 p-4 border border-cyan-500/20 flex flex-col justify-between relative overflow-hidden">
                                    <!-- Upper Stats Overlay -->
                                    <div class="flex justify-between items-center text-xs font-mono text-slate-400">
                                        <span>Skala: Rp (Miliar)</span>
                                        <div class="flex items-center gap-4 text-[11px]">
                                            <span class="flex items-center gap-1.5"><span class="w-3 h-1 bg-cyan-400 rounded"></span> Model Terlatih</span>
                                            <span class="flex items-center gap-1.5"><span class="w-3 h-1 bg-sky-200 border-dashed border-t rounded"></span> Ekspektasi Konservatif</span>
                                        </div>
                                    </div>

                                    <!-- Chart Visual Bars & Curve -->
                                    <div class="h-44 w-full flex items-end gap-3 sm:gap-6 pt-4">
                                        <div class="flex-1 flex flex-col items-center gap-2 group">
                                            <div class="text-[10px] font-mono text-cyan-300 opacity-0 group-hover:opacity-100 transition">Rp 12.4M</div>
                                            <div class="w-full bg-cyan-950/80 rounded-t-lg h-[40%] border-t-2 border-cyan-400 group-hover:bg-cyan-900 transition relative"></div>
                                            <span class="text-[11px] font-mono text-slate-400">Q1 Akt</span>
                                        </div>
                                        <div class="flex-1 flex flex-col items-center gap-2 group">
                                            <div class="text-[10px] font-mono text-cyan-300 opacity-0 group-hover:opacity-100 transition">Rp 16.8M</div>
                                            <div class="w-full bg-cyan-950/80 rounded-t-lg h-[55%] border-t-2 border-cyan-400 group-hover:bg-cyan-900 transition relative"></div>
                                            <span class="text-[11px] font-mono text-slate-400">Q2 Akt</span>
                                        </div>
                                        <div class="flex-1 flex flex-col items-center gap-2 group">
                                            <div class="text-[10px] font-mono text-cyan-300 opacity-0 group-hover:opacity-100 transition">Rp 22.1M</div>
                                            <div class="w-full bg-cyan-950/80 rounded-t-lg h-[70%] border-t-2 border-cyan-300 group-hover:bg-cyan-900 transition relative"></div>
                                            <span class="text-[11px] font-mono text-slate-400">Q3 Proj</span>
                                        </div>
                                        <div class="flex-1 flex flex-col items-center gap-2 group">
                                            <div class="text-[10px] font-mono text-cyan-300 opacity-0 group-hover:opacity-100 transition">Rp 31.5M</div>
                                            <div class="w-full bg-gradient-to-t from-cyan-900 via-cyan-600 to-cyan-300 rounded-t-lg h-[92%] border-t-2 border-white shadow-[0_0_20px_rgba(0,240,255,0.5)] group-hover:opacity-90 transition relative"></div>
                                            <span class="text-[11px] font-mono font-bold text-cyan-300">Q4 AI</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Right Insights Panel -->
                            <div class="p-6 rounded-2xl bg-arctic-deep/90 border border-cyan-500/20 space-y-4 flex flex-col justify-between">
                                <div>
                                    <div class="text-xs font-mono uppercase tracking-wider text-cyan-400 mb-2">Pilar Rekomendasi AI</div>
                                    <h4 class="font-display font-bold text-lg text-white mb-3">Fokus Ekspansi Q3-Q4</h4>
                                    <ul class="space-y-3 text-xs text-slate-300">
                                        <li class="flex items-start gap-2">
                                            <span class="w-1.5 h-1.5 rounded-full bg-cyan-400 mt-1.5"></span>
                                            <span><strong>Alokasi Budget:</strong> Pindahkan 18% ad-spend ke saluran direct retention dengan LTV tertinggi.</span>
                                        </li>
                                        <li class="flex items-start gap-2">
                                            <span class="w-1.5 h-1.5 rounded-full bg-cyan-400 mt-1.5"></span>
                                            <span><strong>Optimasi Stock:</strong> Kurangi safety stock cabang regional hingga 14% tanpa resiko stockout.</span>
                                        </li>
                                        <li class="flex items-start gap-2">
                                            <span class="w-1.5 h-1.5 rounded-full bg-cyan-400 mt-1.5"></span>
                                            <span><strong>Penghematan Kas:</strong> Est. penghematan operasional Rp 4.2 Miliar dalam 6 bulan pertama.</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="pt-4 border-t border-cyan-500/20">
                                    <a href="#consultation" class="block w-full text-center py-2.5 rounded-xl bg-cyan-500/20 hover:bg-cyan-500/30 text-cyan-200 border border-cyan-400/40 font-mono text-xs font-bold transition">
                                        Ekspor Laporan PDF &rarr;
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Sandbox Viewport 2: Neural Cluster (Hidden by default) -->
                    <div id="view-cluster" class="hidden space-y-6">
                        <div class="grid lg:grid-cols-3 gap-6">
                            <div class="lg:col-span-2 p-6 rounded-2xl bg-arctic-deep/90 border border-cyan-500/20 space-y-4">
                                <h3 class="font-display font-bold text-base text-white">Segmentasi K-Means Multi-Dimensi (540,000 Pelanggan)</h3>
                                <p class="text-xs text-slate-400">Pengelompokan otomatis berdasarkan frekuensi transaksi, margin per pesanan, dan skor churn risk.</p>
                                <div class="h-64 rounded-xl bg-arctic-abyss/90 p-4 border border-cyan-500/20 grid grid-cols-3 gap-4">
                                    <div class="p-4 rounded-xl bg-cyan-950/40 border border-cyan-500/30 flex flex-col justify-between">
                                        <div>
                                            <span class="px-2 py-0.5 rounded bg-cyan-400/20 text-cyan-300 text-[10px] font-mono">Klaster Alpha</span>
                                            <div class="text-xl font-bold text-white mt-2">32% User</div>
                                            <div class="text-xs text-slate-400 mt-1">High Spenders, Low Churn</div>
                                        </div>
                                        <div class="text-xs font-mono text-cyan-300">EBITDA Contribution: 68%</div>
                                    </div>
                                    <div class="p-4 rounded-xl bg-sky-950/40 border border-sky-500/30 flex flex-col justify-between">
                                        <div>
                                            <span class="px-2 py-0.5 rounded bg-sky-400/20 text-sky-300 text-[10px] font-mono">Klaster Beta</span>
                                            <div class="text-xl font-bold text-white mt-2">45% User</div>
                                            <div class="text-xs text-slate-400 mt-1">Regular Shoppers</div>
                                        </div>
                                        <div class="text-xs font-mono text-sky-300">Potensi Upsell: +24%</div>
                                    </div>
                                    <div class="p-4 rounded-xl bg-indigo-950/40 border border-indigo-500/30 flex flex-col justify-between">
                                        <div>
                                            <span class="px-2 py-0.5 rounded bg-rose-400/20 text-rose-300 text-[10px] font-mono">Klaster Gamma</span>
                                            <div class="text-xl font-bold text-white mt-2">23% User</div>
                                            <div class="text-xs text-slate-400 mt-1">Dormant &gt; 90 Hari</div>
                                        </div>
                                        <div class="text-xs font-mono text-rose-300">Target Win-back Flow</div>
                                    </div>
                                </div>
                            </div>
                            <div class="p-6 rounded-2xl bg-arctic-deep/90 border border-cyan-500/20 flex flex-col justify-between">
                                <div class="space-y-3">
                                    <div class="text-xs font-mono text-cyan-400 uppercase">Automated Trigger</div>
                                    <h4 class="font-display font-bold text-lg text-white">Integrasi Webhook CDP</h4>
                                    <p class="text-xs text-slate-300">Setiap perubahan klaster memicu integrasi otomatis ke CRM (Salesforce, HubSpot, Braze) secara real-time.</p>
                                </div>
                                <button onclick="openFrostAI()" class="w-full py-2.5 rounded-xl bg-cyan-400 text-slate-950 font-bold text-xs font-mono uppercase">
                                    Uji Rule Segmentasi
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Sandbox Viewport 3: Ingestion Health (Hidden by default) -->
                    <div id="view-pipeline-health" class="hidden space-y-6">
                        <div class="p-6 rounded-2xl bg-arctic-deep/90 border border-cyan-500/20 grid sm:grid-cols-4 gap-4">
                            <div class="p-4 rounded-xl bg-arctic-glacier/60 border border-cyan-500/20">
                                <div class="text-[10px] font-mono text-slate-400 uppercase">Kafka Stream Throughput</div>
                                <div class="text-xl font-extrabold text-cyan-300 mt-1">920k msg/s</div>
                                <div class="text-[11px] text-emerald-400 mt-1">Latency 1.8ms</div>
                            </div>
                            <div class="p-4 rounded-xl bg-arctic-glacier/60 border border-cyan-500/20">
                                <div class="text-[10px] font-mono text-slate-400 uppercase">Snowflake / Databricks Sync</div>
                                <div class="text-xl font-extrabold text-sky-300 mt-1">Zero Lag</div>
                                <div class="text-[11px] text-emerald-400 mt-1">Streaming Iceberg Table</div>
                            </div>
                            <div class="p-4 rounded-xl bg-arctic-glacier/60 border border-cyan-500/20">
                                <div class="text-[10px] font-mono text-slate-400 uppercase">Data Quality Score</div>
                                <div class="text-xl font-extrabold text-white mt-1">99.98%</div>
                                <div class="text-[11px] text-cyan-300 mt-1">Schema Drift Enforced</div>
                            </div>
                            <div class="p-4 rounded-xl bg-arctic-glacier/60 border border-cyan-500/20">
                                <div class="text-[10px] font-mono text-slate-400 uppercase">Cost Optimization Rate</div>
                                <div class="text-xl font-extrabold text-emerald-300 mt-1">-38% Biaya</div>
                                <div class="text-[11px] text-slate-400 mt-1">Auto-scaling Micro-cluster</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- CAPABILITIES & SERVICES: Creative Glacial Cards -->
        <section id="capabilities" class="py-24 relative bg-arctic-deep/40">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                
                <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-16">
                    <div>
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-cyan-500/10 border border-cyan-400/30 text-cyan-300 text-xs font-mono mb-3">
                            CORE CAPABILITIES
                        </div>
                        <h2 class="font-display font-extrabold text-3xl sm:text-4xl text-white">
                            Arsitektur Analitik <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-300 to-sky-400">Kelas Enterprise</span>
                        </h2>
                    </div>
                    <p class="text-slate-300 text-sm max-w-md">
                        Dirancang untuk tim data yang menuntut reliabilitas mutlak, latensi ultra-rendah, serta visualisasi yang mudah dipahami hingga level dewan komisaris.
                    </p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    
                    <!-- Capability 1 -->
                    <div class="glass-card rounded-2xl p-8 space-y-5 group relative overflow-hidden">
                        <div class="w-12 h-12 rounded-xl bg-cyan-500/10 border border-cyan-400/30 flex items-center justify-center text-cyan-300 group-hover:scale-110 group-hover:bg-cyan-500/20 transition-all">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"/></svg>
                        </div>
                        <h3 class="font-display font-bold text-xl text-white group-hover:text-cyan-300 transition">
                            Modern Cloud Data Lakehouse
                        </h3>
                        <p class="text-slate-300 text-sm leading-relaxed">
                            Penyatuan data lake & warehouse berkinerja tinggi berbasis Apache Iceberg, Snowflake, BigQuery, atau Databricks dengan arsitektur Medallion (Bronze/Silver/Gold).
                        </p>
                        <ul class="space-y-2 text-xs font-mono text-cyan-300/80">
                            <li>&bull; Zero Data Redundancy</li>
                            <li>&bull; Automated Time-Travel Query</li>
                            <li>&bull; Multi-Cloud Interoperability</li>
                        </ul>
                    </div>

                    <!-- Capability 2 -->
                    <div class="glass-card rounded-2xl p-8 space-y-5 group relative overflow-hidden">
                        <div class="w-12 h-12 rounded-xl bg-sky-500/10 border border-sky-400/30 flex items-center justify-center text-sky-300 group-hover:scale-110 group-hover:bg-sky-500/20 transition-all">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        </div>
                        <h3 class="font-display font-bold text-xl text-white group-hover:text-cyan-300 transition">
                            Real-Time Stream Processing
                        </h3>
                        <p class="text-slate-300 text-sm leading-relaxed">
                            Proses data streaming dengan latensi sub-detik menggunakan Kafka, Flink, dan Spark Streaming untuk pemantauan fraud, sensor IoT, serta transaksi pembayaran seketika.
                        </p>
                        <ul class="space-y-2 text-xs font-mono text-sky-300/80">
                            <li>&bull; Event-Driven Architecture</li>
                            <li>&bull; In-Flight Data Transformation</li>
                            <li>&bull; SLA 99.99% Uptime Guarantee</li>
                        </ul>
                    </div>

                    <!-- Capability 3 -->
                    <div class="glass-card rounded-2xl p-8 space-y-5 group relative overflow-hidden">
                        <div class="w-12 h-12 rounded-xl bg-blue-500/10 border border-blue-400/30 flex items-center justify-center text-blue-300 group-hover:scale-110 group-hover:bg-blue-500/20 transition-all">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <h3 class="font-display font-bold text-xl text-white group-hover:text-cyan-300 transition">
                            Executive BI &amp; Creative Dashboards
                        </h3>
                        <p class="text-slate-300 text-sm leading-relaxed">
                            Dashboard visual kelas dunia yang bukan hanya menyajikan angka, melainkan mengarahkan tindakan. Kompatibel dengan Tableau, PowerBI, Looker, atau kustom React canvas.
                        </p>
                        <ul class="space-y-2 text-xs font-mono text-blue-300/80">
                            <li>&bull; C-Level Mobile First Layouts</li>
                            <li>&bull; Role-Based Data Security</li>
                            <li>&bull; Automated PDF/Slack Digests</li>
                        </ul>
                    </div>

                    <!-- Capability 4 -->
                    <div class="glass-card rounded-2xl p-8 space-y-5 group relative overflow-hidden">
                        <div class="w-12 h-12 rounded-xl bg-teal-500/10 border border-teal-400/30 flex items-center justify-center text-teal-300 group-hover:scale-110 transition-all">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/></svg>
                        </div>
                        <h3 class="font-display font-bold text-xl text-white group-hover:text-cyan-300 transition">
                            Predictive AI &amp; Machine Learning
                        </h3>
                        <p class="text-slate-300 text-sm leading-relaxed">
                            Model machine learning produksi untuk demand forecasting, churn prediction, recommendation engine, dan dynamic pricing yang terintegrasi langsung ke sistem operasional.
                        </p>
                        <ul class="space-y-2 text-xs font-mono text-teal-300/80">
                            <li>&bull; MLOps &amp; Automated Retraining</li>
                            <li>&bull; Explainable AI (SHAP / LIME)</li>
                            <li>&bull; Real-time Inference API</li>
                        </ul>
                    </div>

                    <!-- Capability 5 -->
                    <div class="glass-card rounded-2xl p-8 space-y-5 group relative overflow-hidden">
                        <div class="w-12 h-12 rounded-xl bg-cyan-500/10 border border-cyan-400/30 flex items-center justify-center text-cyan-300 group-hover:scale-110 transition-all">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                        </div>
                        <h3 class="font-display font-bold text-xl text-white group-hover:text-cyan-300 transition">
                            Data Governance &amp; Compliance
                        </h3>
                        <p class="text-slate-300 text-sm leading-relaxed">
                            Kepatuhan regulasi PDP (Pelindungan Data Pribadi), ISO 27001, dan GDPR dengan katalog data otomatis, lineage tracking menyeluruh, dan enkripsi data end-to-end.
                        </p>
                        <ul class="space-y-2 text-xs font-mono text-cyan-300/80">
                            <li>&bull; Automated Data Lineage</li>
                            <li>&bull; PII Masking &amp; Anonymization</li>
                            <li>&bull; Audit-Ready Security Logs</li>
                        </ul>
                    </div>

                    <!-- Capability 6 -->
                    <div class="glass-card rounded-2xl p-8 space-y-5 group relative overflow-hidden">
                        <div class="w-12 h-12 rounded-xl bg-sky-500/10 border border-sky-400/30 flex items-center justify-center text-sky-300 group-hover:scale-110 transition-all">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                        </div>
                        <h3 class="font-display font-bold text-xl text-white group-hover:text-cyan-300 transition">
                            Embedded Analytics &amp; Data Monetization
                        </h3>
                        <p class="text-slate-300 text-sm leading-relaxed">
                            Ubah data Anda menjadi sumber pendapatan baru (revenue stream) dengan menghadirkan analitik bertenaga tinggi langsung di dalam aplikasi SaaS atau portal klien Anda.
                        </p>
                        <ul class="space-y-2 text-xs font-mono text-sky-300/80">
                            <li>&bull; White-label Portal Integration</li>
                            <li>&bull; Multi-tenant Isolation</li>
                            <li>&bull; Direct API Monetization</li>
                        </ul>
                    </div>

                </div>
            </div>
        </section>

        <!-- PIPELINE ARCHITECTURE: Creative Glacial Step Flow -->
        <section id="pipeline" class="py-24 relative">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                
                <div class="text-center max-w-2xl mx-auto mb-16 space-y-3">
                    <span class="text-cyan-400 font-mono text-xs uppercase tracking-widest">
                        ARCTIC DATA FLOW // 4-STAGE PIPELINE
                    </span>
                    <h2 class="font-display font-extrabold text-3xl sm:text-4xl text-white">
                        Dari Raw Chaos Menjadi <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-300 to-sky-300">Aksi Strategis</span>
                    </h2>
                    <p class="text-slate-300 text-sm">
                        Proses standardisasi teruji FrostByte yang menjamin integritas data dari sumber mentah hingga keputusan eksekutif.
                    </p>
                </div>

                <div class="grid md:grid-cols-4 gap-6 relative">
                    
                    <!-- Step 1 -->
                    <div class="glass-card rounded-2xl p-6 border border-cyan-500/20 relative space-y-4">
                        <div class="font-mono text-3xl font-extrabold text-cyan-500/40">01</div>
                        <h3 class="font-display font-bold text-lg text-white">Ingestion &amp; Unification</h3>
                        <p class="text-slate-300 text-xs leading-relaxed">
                            Koneksi ke 150+ sumber data (RDBMS, ERP, CRM, NoSQL, IoT, Event Streams) tanpa interupsi operasional.
                        </p>
                        <div class="p-2.5 rounded-lg bg-arctic-glacier/80 text-[11px] font-mono text-cyan-300 border border-cyan-500/20">
                            Status: Auto-discovery
                        </div>
                    </div>

                    <!-- Step 2 -->
                    <div class="glass-card rounded-2xl p-6 border border-cyan-500/20 relative space-y-4">
                        <div class="font-mono text-3xl font-extrabold text-cyan-500/40">02</div>
                        <h3 class="font-display font-bold text-lg text-white">Frost Lakehouse Cleansing</h3>
                        <p class="text-slate-300 text-xs leading-relaxed">
                            Deduplikasi otomatis, penanganan missing values, audit kualitas data (dbt tests), dan schema enforcement.
                        </p>
                        <div class="p-2.5 rounded-lg bg-arctic-glacier/80 text-[11px] font-mono text-cyan-300 border border-cyan-500/20">
                            Status: 100% Verified
                        </div>
                    </div>

                    <!-- Step 3 -->
                    <div class="glass-card rounded-2xl p-6 border border-cyan-500/20 relative space-y-4">
                        <div class="font-mono text-3xl font-extrabold text-cyan-500/40">03</div>
                        <h3 class="font-display font-bold text-lg text-white">Predictive AI Inference</h3>
                        <p class="text-slate-300 text-xs leading-relaxed">
                            Penerapan model pembelajaran mesin, analisis korelasi tersembunyi, skenario what-if, dan forecasting tren.
                        </p>
                        <div class="p-2.5 rounded-lg bg-arctic-glacier/80 text-[11px] font-mono text-cyan-300 border border-cyan-500/20">
                            Status: Continuous Learn
                        </div>
                    </div>

                    <!-- Step 4 -->
                    <div class="glass-card rounded-2xl p-6 border border-cyan-500/20 relative space-y-4">
                        <div class="font-mono text-3xl font-extrabold text-cyan-500/40">04</div>
                        <h3 class="font-display font-bold text-lg text-white">Executive Action Engine</h3>
                        <p class="text-slate-300 text-xs leading-relaxed">
                            Visualisasi instan, auto-alert ke WhatsApp &amp; Slack, serta integrasi webhook untuk aksi otomasi tanpa tunggu.
                        </p>
                        <div class="p-2.5 rounded-lg bg-arctic-glacier/80 text-[11px] font-mono text-cyan-300 border border-cyan-500/20">
                            Status: Real-time Dispatch
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- INTERACTIVE CALCULATOR: ROI & Efficiency Simulator -->
        <section id="calculator" class="py-24 relative bg-arctic-deep/60 border-y border-cyan-500/20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                
                <div class="grid lg:grid-cols-12 gap-12 items-center">
                    
                    <div class="lg:col-span-5 space-y-6">
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-cyan-500/10 border border-cyan-400/30 text-cyan-300 text-xs font-mono">
                            INTERACTIVE ESTIMATOR
                        </div>
                        <h2 class="font-display font-extrabold text-3xl sm:text-4xl text-white leading-tight">
                            Kalkulator Nilai ROI &amp; <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-300 to-sky-300">Kecepatan Data</span>
                        </h2>
                        <p class="text-slate-300 text-sm leading-relaxed">
                            Ketahui berapa ratus jam kerja analis yang dapat dihemat dan berapa potensi efisiensi biaya server cloud yang dapat direduksi dengan modernisasi arsitektur FrostByte.
                        </p>
                        
                        <div class="p-4 rounded-xl bg-arctic-glacier/80 border border-cyan-500/20 space-y-2">
                            <div class="flex items-center gap-2 text-cyan-300 font-bold text-xs">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                Formula Berbasis Metrik Aktual
                            </div>
                            <p class="text-[11px] text-slate-400">
                                Berdasarkan rata-rata 32 implementasi klien enterprise FrostByte pada tahun 2025-2026.
                            </p>
                        </div>
                    </div>

                    <!-- Calculator Input & Live Output Box -->
                    <div class="lg:col-span-7 glass-panel rounded-3xl p-8 border border-cyan-500/30 space-y-8">
                        
                        <div class="space-y-6">
                            <!-- Slider 1: Data Volume -->
                            <div>
                                <div class="flex justify-between items-center text-xs font-mono mb-2">
                                    <label for="range-volume" class="text-slate-300">Volume Data Bulanan (GB / TB):</label>
                                    <span class="text-cyan-300 font-bold text-sm" id="label-volume">250 GB</span>
                                </div>
                                <input type="range" id="range-volume" min="50" max="5000" step="50" value="250" oninput="calculateROI()" 
                                    class="w-full h-2 bg-arctic-glacier rounded-lg appearance-none cursor-pointer accent-cyan-400">
                            </div>

                            <!-- Slider 2: Analyst Team Size -->
                            <div>
                                <div class="flex justify-between items-center text-xs font-mono mb-2">
                                    <label for="range-analysts" class="text-slate-300">Jumlah Tim Analis &amp; Engineer:</label>
                                    <span class="text-cyan-300 font-bold text-sm" id="label-analysts">6 Orang</span>
                                </div>
                                <input type="range" id="range-analysts" min="1" max="50" step="1" value="6" oninput="calculateROI()" 
                                    class="w-full h-2 bg-arctic-glacier rounded-lg appearance-none cursor-pointer accent-cyan-400">
                            </div>

                            <!-- Slider 3: Current Pipeline Latency -->
                            <div>
                                <div class="flex justify-between items-center text-xs font-mono mb-2">
                                    <label for="range-latency" class="text-slate-300">Waktu Tunggu Laporan Saat Ini:</label>
                                    <span class="text-cyan-300 font-bold text-sm" id="label-latency">24 Jam (Batch Harian)</span>
                                </div>
                                <input type="range" id="range-latency" min="2" max="72" step="2" value="24" oninput="calculateROI()" 
                                    class="w-full h-2 bg-arctic-glacier rounded-lg appearance-none cursor-pointer accent-cyan-400">
                            </div>
                        </div>

                        <!-- Live Calculated Results Box -->
                        <div class="pt-6 border-t border-cyan-500/20 grid sm:grid-cols-3 gap-4">
                            <div class="p-4 rounded-xl bg-arctic-abyss/80 border border-cyan-500/20 text-center">
                                <div class="text-[10px] font-mono text-slate-400 uppercase">Waktu Tim Dihemat</div>
                                <div class="text-2xl font-extrabold text-cyan-300 mt-1" id="res-hours">168 Jam</div>
                                <div class="text-[10px] text-slate-500 mt-0.5">per bulan</div>
                            </div>
                            <div class="p-4 rounded-xl bg-arctic-abyss/80 border border-cyan-500/20 text-center">
                                <div class="text-[10px] font-mono text-slate-400 uppercase">Efisiensi Biaya Cloud</div>
                                <div class="text-2xl font-extrabold text-emerald-300 mt-1" id="res-savings">Rp 48M+</div>
                                <div class="text-[10px] text-slate-500 mt-0.5">proyeksi tahunan</div>
                            </div>
                            <div class="p-4 rounded-xl bg-arctic-abyss/80 border border-cyan-500/20 text-center">
                                <div class="text-[10px] font-mono text-slate-400 uppercase">Peningkatan Speed</div>
                                <div class="text-2xl font-extrabold text-white mt-1" id="res-speed">12x Lipat</div>
                                <div class="text-[10px] text-cyan-400 mt-0.5">sub-detik queries</div>
                            </div>
                        </div>

                        <div class="text-center pt-2">
                            <a href="#consultation" class="inline-flex items-center gap-2 px-6 py-3 rounded-xl font-display font-bold text-xs uppercase tracking-wider text-slate-950 bg-gradient-to-r from-cyan-300 to-sky-300 hover:from-white hover:to-cyan-200 transition">
                                Konsultasikan Skema Efisiensi Ini &rarr;
                            </a>
                        </div>

                    </div>
                </div>

            </div>
        </section>

        <!-- PRICING & INVESTMENT PACKAGES -->
        <section id="pricing" class="py-24 relative">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                
                <div class="text-center max-w-2xl mx-auto mb-16 space-y-3">
                    <span class="text-cyan-400 font-mono text-xs uppercase tracking-widest">
                        TRANSPARENT VALUE PLANS
                    </span>
                    <h2 class="font-display font-extrabold text-3xl sm:text-4xl text-white">
                        Pilihan Investasi <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-300 to-sky-300">Modern Data Analytics</span>
                    </h2>
                    <p class="text-slate-300 text-sm">
                        Paket dirancang sesuai skala maturitas data organisasi Anda tanpa biaya tersembunyi.
                    </p>
                </div>

                <div class="grid lg:grid-cols-3 gap-8 items-stretch">
                    
                    <!-- Plan 1: Starter Frost -->
                    <div class="glass-card rounded-3xl p-8 border border-cyan-500/20 flex flex-col justify-between space-y-8">
                        <div class="space-y-4">
                            <span class="px-3 py-1 rounded-full bg-slate-800 text-slate-300 text-xs font-mono">
                                LEVEL 1 — FOUNDATION
                            </span>
                            <h3 class="font-display font-extrabold text-2xl text-white">Arctic Foundation</h3>
                            <p class="text-slate-300 text-xs leading-relaxed">
                                Ideal untuk startup &amp; bisnis bertumbuh yang membutuhkan integrasi data tunggal dan dashboard otomatis pertama.
                            </p>
                            <div class="pt-4 border-t border-cyan-500/20">
                                <span class="text-3xl font-extrabold text-white">Rp 24.500.000</span>
                                <span class="text-xs text-slate-400 block font-mono mt-1">/ setup awal &amp; 30 hari pendampingan</span>
                            </div>
                            <ul class="space-y-3 text-xs text-slate-300 pt-2 font-mono">
                                <li class="flex items-center gap-2"><span class="text-cyan-400">&check;</span> Hingga 5 Sumber Data (SQL/API/Sheets)</li>
                                <li class="flex items-center gap-2"><span class="text-cyan-400">&check;</span> Cloud Data Warehouse Setup (BigQuery/Snowflake)</li>
                                <li class="flex items-center gap-2"><span class="text-cyan-400">&check;</span> 3 Executive BI Dashboards</li>
                                <li class="flex items-center gap-2"><span class="text-cyan-400">&check;</span> Refresh Harian Terjadwal</li>
                                <li class="flex items-center gap-2"><span class="text-cyan-400">&check;</span> Dokumentasi Data Dictionary</li>
                            </ul>
                        </div>
                        <a href="https://wa.me/6281234567890?text=Halo%20FrostByte,%20saya%20tertarik%20dengan%20Paket%20Arctic%20Foundation" target="_blank" rel="noopener noreferrer" class="block w-full py-3 rounded-xl text-center font-display font-bold text-xs uppercase tracking-wider bg-arctic-glacier hover:bg-arctic-surface text-cyan-200 border border-cyan-500/40 transition">
                            Pilih Arctic Foundation
                        </a>
                    </div>

                    <!-- Plan 2: Glacier Pro (Featured) -->
                    <div class="glass-panel rounded-3xl p-8 border-2 border-cyan-400/60 relative flex flex-col justify-between space-y-8 shadow-[0_0_50px_rgba(0,240,255,0.25)]">
                        <div class="absolute -top-3.5 left-1/2 -translate-x-1/2 px-4 py-1 rounded-full bg-gradient-to-r from-cyan-400 to-sky-300 text-slate-950 font-mono text-[10px] font-extrabold uppercase tracking-widest">
                            PALING DIREKOMENDASIKAN
                        </div>
                        <div class="space-y-4">
                            <span class="px-3 py-1 rounded-full bg-cyan-500/20 text-cyan-300 text-xs font-mono">
                                LEVEL 2 — SCALE &amp; PREDICT
                            </span>
                            <h3 class="font-display font-extrabold text-2xl text-white">Glacier Velocity</h3>
                            <p class="text-slate-300 text-xs leading-relaxed">
                                Solusi analitik komprehensif dengan real-time stream data, predictive AI churn/sales, dan arsitektur lakehouse modern.
                            </p>
                            <div class="pt-4 border-t border-cyan-500/20">
                                <span class="text-3xl font-extrabold text-cyan-300">Rp 58.000.000</span>
                                <span class="text-xs text-slate-400 block font-mono mt-1">/ implementasi turnkey &amp; 90 hari SLA</span>
                            </div>
                            <ul class="space-y-3 text-xs text-slate-200 pt-2 font-mono">
                                <li class="flex items-center gap-2"><span class="text-cyan-400 font-bold">&check;</span> Unlimited Sumber Data Enterprise</li>
                                <li class="flex items-center gap-2"><span class="text-cyan-400 font-bold">&check;</span> Medallion Lakehouse (Bronze/Silver/Gold)</li>
                                <li class="flex items-center gap-2"><span class="text-cyan-400 font-bold">&check;</span> 8 Custom C-Level &amp; Operational Dashboards</li>
                                <li class="flex items-center gap-2"><span class="text-cyan-400 font-bold">&check;</span> Real-time Streaming (Kafka / Spark)</li>
                                <li class="flex items-center gap-2"><span class="text-cyan-400 font-bold">&check;</span> 2 Predictive ML Models (Churn &amp; LTV)</li>
                                <li class="flex items-center gap-2"><span class="text-cyan-400 font-bold">&check;</span> Auto Alerting ke WhatsApp &amp; Slack</li>
                            </ul>
                        </div>
                        <a href="https://wa.me/6281234567890?text=Halo%20FrostByte,%20saya%20ingin%20berdiskusi%20tentang%20Paket%20Glacier%20Velocity" target="_blank" rel="noopener noreferrer" class="block w-full py-3.5 rounded-xl text-center font-display font-bold text-xs uppercase tracking-wider text-slate-950 bg-gradient-to-r from-cyan-300 via-sky-200 to-cyan-400 hover:from-white hover:to-cyan-200 transition shadow-[0_0_20px_rgba(56,189,248,0.5)]">
                            Konsultasikan Paket Ini
                        </a>
                    </div>

                    <!-- Plan 3: Polar Enterprise -->
                    <div class="glass-card rounded-3xl p-8 border border-cyan-500/20 flex flex-col justify-between space-y-8">
                        <div class="space-y-4">
                            <span class="px-3 py-1 rounded-full bg-slate-800 text-slate-300 text-xs font-mono">
                                LEVEL 3 — FULL BESPOKE
                            </span>
                            <h3 class="font-display font-extrabold text-2xl text-white">Polar Sovereign</h3>
                            <p class="text-slate-300 text-xs leading-relaxed">
                                Arsitektur berdaulat untuk korporasi besar, multi-entity holding, perbankan, dan data governance standar regulasi ketat.
                            </p>
                            <div class="pt-4 border-t border-cyan-500/20">
                                <span class="text-3xl font-extrabold text-white">Bespoke</span>
                                <span class="text-xs text-slate-400 block font-mono mt-1">/ disesuaikan kompleksitas arsitektur</span>
                            </div>
                            <ul class="space-y-3 text-xs text-slate-300 pt-2 font-mono">
                                <li class="flex items-center gap-2"><span class="text-cyan-400">&check;</span> Dedicated Data Squad On-Demand</li>
                                <li class="flex items-center gap-2"><span class="text-cyan-400">&check;</span> Multi-Cloud &amp; Hybrid Data Mesh</li>
                                <li class="flex items-center gap-2"><span class="text-cyan-400">&check;</span> Full UU PDP / GDPR Compliance Framework</li>
                                <li class="flex items-center gap-2"><span class="text-cyan-400">&check;</span> Custom Neural Engine &amp; LLM Tuning</li>
                                <li class="flex items-center gap-2"><span class="text-cyan-400">&check;</span> 24/7 Dedicated Data Ops NOC</li>
                            </ul>
                        </div>
                        <a href="https://wa.me/6281234567890?text=Halo%20FrostByte,%20kami%20membutuhkan%20solusi%20enterprise%20Polar%20Sovereign" target="_blank" rel="noopener noreferrer" class="block w-full py-3 rounded-xl text-center font-display font-bold text-xs uppercase tracking-wider bg-arctic-glacier hover:bg-arctic-surface text-cyan-200 border border-cyan-500/40 transition">
                            Hubungi Tim Solusi
                        </a>
                    </div>

                </div>
            </div>
        </section>

        <!-- TESTIMONIALS & CASE STUDIES -->
        <section class="py-24 relative bg-arctic-deep/40">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                
                <div class="text-center max-w-2xl mx-auto mb-16 space-y-3">
                    <span class="text-cyan-400 font-mono text-xs uppercase tracking-widest">
                        PROVEN IMPACT
                    </span>
                    <h2 class="font-display font-extrabold text-3xl sm:text-4xl text-white">
                        Apa Kata <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-300 to-sky-300">Para Data Leader</span>
                    </h2>
                </div>

                <div class="grid md:grid-cols-3 gap-8">
                    
                    <!-- Quote 1 -->
                    <div class="glass-card rounded-2xl p-6 border border-cyan-500/20 space-y-4 flex flex-col justify-between">
                        <div class="space-y-3">
                            <div class="flex text-cyan-300 gap-1 text-sm">
                                ★★★★★
                            </div>
                            <p class="text-slate-300 text-xs sm:text-sm italic leading-relaxed">
                                &ldquo;FrostByte mengubah waktu pelaporan bulanan kami dari 14 hari menjadi 12 detik. Model prediktifnya membantu kami menghemat Rp 3.8 Miliar biaya inventori tahun lalu.&rdquo;
                            </p>
                        </div>
                        <div class="pt-4 border-t border-cyan-500/20 flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-cyan-400/20 flex items-center justify-center font-bold text-cyan-300 font-mono">
                                AH
                            </div>
                            <div>
                                <div class="text-xs font-bold text-white">Aditya Hardiansyah</div>
                                <div class="text-[10px] text-slate-400">Head of Data, Polarix FinTech</div>
                            </div>
                        </div>
                    </div>

                    <!-- Quote 2 -->
                    <div class="glass-card rounded-2xl p-6 border border-cyan-500/20 space-y-4 flex flex-col justify-between">
                        <div class="space-y-3">
                            <div class="flex text-cyan-300 gap-1 text-sm">
                                ★★★★★
                            </div>
                            <p class="text-slate-300 text-xs sm:text-sm italic leading-relaxed">
                                &ldquo;Desain visual dashboard-nya sangat kreatif namun elegan. Untuk pertama kalinya, Dewan Direksi kami membaca dan mengambil keputusan langsung dari BI tanpa perlu slide deck manual.&rdquo;
                            </p>
                        </div>
                        <div class="pt-4 border-t border-cyan-500/20 flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-sky-400/20 flex items-center justify-center font-bold text-sky-300 font-mono">
                                SM
                            </div>
                            <div>
                                <div class="text-xs font-bold text-white">Siti Marwah, Ph.D.</div>
                                <div class="text-[10px] text-slate-400">Chief Strategy Officer, Nordic Retail</div>
                            </div>
                        </div>
                    </div>

                    <!-- Quote 3 -->
                    <div class="glass-card rounded-2xl p-6 border border-cyan-500/20 space-y-4 flex flex-col justify-between">
                        <div class="space-y-3">
                            <div class="flex text-cyan-300 gap-1 text-sm">
                                ★★★★★
                            </div>
                            <p class="text-slate-300 text-xs sm:text-sm italic leading-relaxed">
                                &ldquo;Lakehouse modern FrostByte memangkas cloud compute bill kami di AWS hingga 41% sambil meningkatkan throughput data 4 kali lipat. Investasi data terbaik kami.&rdquo;
                            </p>
                        </div>
                        <div class="pt-4 border-t border-cyan-500/20 flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-blue-400/20 flex items-center justify-center font-bold text-blue-300 font-mono">
                                BP
                            </div>
                            <div>
                                <div class="text-xs font-bold text-white">Bambang Pratama</div>
                                <div class="text-[10px] text-slate-400">VP of Technology, Aurora Group</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- FAQ ACCORDION -->
        <section id="faq" class="py-24 relative">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
                
                <div class="text-center space-y-3">
                    <span class="text-cyan-400 font-mono text-xs uppercase tracking-widest">
                        FREQUENTLY ASKED QUESTIONS
                    </span>
                    <h2 class="font-display font-extrabold text-3xl sm:text-4xl text-white">
                        Pertanyaan Umum Mengenai Implementasi Data
                    </h2>
                </div>

                <div class="space-y-4">
                    <!-- FAQ 1 -->
                    <div class="glass-card rounded-2xl border border-cyan-500/20 overflow-hidden">
                        <button onclick="toggleFAQ(1)" class="w-full p-6 text-left flex justify-between items-center gap-4 hover:bg-cyan-500/5 transition">
                            <span class="font-display font-bold text-sm sm:text-base text-white">Berapa lama durasi implementasi pipeline data dari nol hingga siap pakai?</span>
                            <span id="faq-icon-1" class="text-cyan-300 font-mono text-lg transition-transform">+</span>
                        </button>
                        <div id="faq-body-1" class="hidden px-6 pb-6 text-xs sm:text-sm text-slate-300 leading-relaxed border-t border-cyan-500/10 pt-4">
                            Untuk paket Foundation, rata-rata implementasi memakan waktu 2 hingga 3 minggu. Untuk skala Enterprise Glacier Velocity dengan multi-source lakehouse dan real-time stream, durasi berkisar antara 4 hingga 8 minggu dengan milestone berkala setiap minggu.
                        </div>
                    </div>

                    <!-- FAQ 2 -->
                    <div class="glass-card rounded-2xl border border-cyan-500/20 overflow-hidden">
                        <button onclick="toggleFAQ(2)" class="w-full p-6 text-left flex justify-between items-center gap-4 hover:bg-cyan-500/5 transition">
                            <span class="font-display font-bold text-sm sm:text-base text-white">Bagaimana FrostByte menjamin keamanan dan kerahasiaan data perusahaan kami?</span>
                            <span id="faq-icon-2" class="text-cyan-300 font-mono text-lg transition-transform">+</span>
                        </button>
                        <div id="faq-body-2" class="hidden px-6 pb-6 text-xs sm:text-sm text-slate-300 leading-relaxed border-t border-cyan-500/10 pt-4">
                            Kami menerapkan prinsip zero-trust dan zero data retention pada server kami. Seluruh infrastruktur pipeline dibangun langsung di dalam cloud tenant milik Anda sendiri (AWS / GCP / Azure). Kami juga menandatangani NDA ketat dan mematuhi kepatuhan UU PDP &amp; ISO 27001.
                        </div>
                    </div>

                    <!-- FAQ 3 -->
                    <div class="glass-card rounded-2xl border border-cyan-500/20 overflow-hidden">
                        <button onclick="toggleFAQ(3)" class="w-full p-6 text-left flex justify-between items-center gap-4 hover:bg-cyan-500/5 transition">
                            <span class="font-display font-bold text-sm sm:text-base text-white">Apakah kami harus mengganti tools BI atau database yang sedang kami pakai?</span>
                            <span id="faq-icon-3" class="text-cyan-300 font-mono text-lg transition-transform">+</span>
                        </button>
                        <div id="faq-body-3" class="hidden px-6 pb-6 text-xs sm:text-sm text-slate-300 leading-relaxed border-t border-cyan-500/10 pt-4">
                            Tidak. FrostByte mengadopsi pendekatan modular. Jika tim Anda sudah nyaman dengan Tableau, PowerBI, atau Metabase, kami akan mengoptimalkan layer lakehouse di baliknya sehingga query menjadi instan tanpa merombak visual yang sudah ada.
                        </div>
                    </div>

                    <!-- FAQ 4 -->
                    <div class="glass-card rounded-2xl border border-cyan-500/20 overflow-hidden">
                        <button onclick="toggleFAQ(4)" class="w-full p-6 text-left flex justify-between items-center gap-4 hover:bg-cyan-500/5 transition">
                            <span class="font-display font-bold text-sm sm:text-base text-white">Bagaimana skema pendampingan setelah sistem live?</span>
                            <span id="faq-icon-4" class="text-cyan-300 font-mono text-lg transition-transform">+</span>
                        </button>
                        <div id="faq-body-4" class="hidden px-6 pb-6 text-xs sm:text-sm text-slate-300 leading-relaxed border-t border-cyan-500/10 pt-4">
                            Setiap paket sudah mencakup garansi pasca-peluncuran, pemantauan proaktif, knowledge transfer untuk tim internal, serta opsi perpanjangan Managed DataOps dengan SLA respons 15 menit.
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- LEAD GENERATION & DATA AUDIT BOOKING FORM -->
        <section id="consultation" class="py-24 relative bg-arctic-deep/80 border-t border-cyan-500/20">
            <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
                
                <div class="glass-panel rounded-3xl p-8 sm:p-12 border border-cyan-400/40 shadow-[0_0_60px_rgba(0,240,255,0.2)]">
                    <div class="grid lg:grid-cols-12 gap-8 items-center">
                        
                        <div class="lg:col-span-6 space-y-4">
                            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-cyan-500/10 border border-cyan-400/30 text-cyan-300 text-xs font-mono">
                                30-MIN DATA MATURITY AUDIT
                            </div>
                            <h2 class="font-display font-extrabold text-3xl sm:text-4xl text-white">
                                Mulai Rancang Masa Depan Data Anda.
                            </h2>
                            <p class="text-slate-300 text-xs sm:text-sm leading-relaxed">
                                Jadwalkan sesi eksplorasi privat bersama Principal Data Architect kami. Dapatkan asesmen arsitektur data gratis tanpa komitmen.
                            </p>
                            <div class="space-y-2 text-xs font-mono text-cyan-300/80 pt-2">
                                <div class="flex items-center gap-2">✓ Asesmen Arsitektur &amp; Bottleneck Lakehouse</div>
                                <div class="flex items-center gap-2">✓ Estimasi Penghematan Cloud Compute</div>
                                <div class="flex items-center gap-2">✓ Blueprint Roadmap 90 Hari</div>
                            </div>
                        </div>

                        <div class="lg:col-span-6 bg-arctic-abyss/90 rounded-2xl p-6 border border-cyan-500/30 space-y-4">
                            <form id="auditForm" onsubmit="submitAuditForm(event)" class="space-y-4">
                                <div>
                                    <label class="block text-xs font-mono text-slate-300 mb-1">Nama Lengkap &amp; Gelar</label>
                                    <input type="text" required placeholder="Contoh: Budi Santoso, S.Kom." 
                                        class="w-full px-4 py-2.5 rounded-xl bg-arctic-glacier/80 border border-cyan-500/30 text-white placeholder-slate-500 text-xs focus:outline-none focus:border-cyan-400">
                                </div>
                                <div>
                                    <label class="block text-xs font-mono text-slate-300 mb-1">Email Korporat</label>
                                    <input type="email" required placeholder="budi@perusahaan.co.id" 
                                        class="w-full px-4 py-2.5 rounded-xl bg-arctic-glacier/80 border border-cyan-500/30 text-white placeholder-slate-500 text-xs focus:outline-none focus:border-cyan-400">
                                </div>
                                <div>
                                    <label class="block text-xs font-mono text-slate-300 mb-1">Fokus Kebutuhan Data</label>
                                    <select class="w-full px-4 py-2.5 rounded-xl bg-arctic-glacier/80 border border-cyan-500/30 text-white text-xs focus:outline-none focus:border-cyan-400">
                                        <option value="lakehouse">Modernisasi Lakehouse &amp; Warehouse</option>
                                        <option value="bi">Executive BI &amp; Dashboard Kreatif</option>
                                        <option value="ml">Predictive AI &amp; Machine Learning</option>
                                        <option value="cost">Optimasi Biaya Cloud Big Data</option>
                                        <option value="audit">Audit Komprehensif Menyeluruh</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-xs font-mono text-slate-300 mb-1">Estimasi Volume Data</label>
                                    <select class="w-full px-4 py-2.5 rounded-xl bg-arctic-glacier/80 border border-cyan-500/30 text-white text-xs focus:outline-none focus:border-cyan-400">
                                        <option value="small">&lt; 500 GB</option>
                                        <option value="medium">500 GB - 5 TB</option>
                                        <option value="large">5 TB - 50 TB</option>
                                        <option value="enterprise">&gt; 50 TB (Big Data Streaming)</option>
                                    </select>
                                </div>
                                <button type="submit" class="w-full py-3 rounded-xl font-display font-bold text-xs uppercase tracking-wider text-slate-950 bg-gradient-to-r from-cyan-300 to-sky-300 hover:from-white hover:to-cyan-200 transition shadow-[0_0_20px_rgba(0,240,255,0.4)]">
                                    Kirim Permintaan Konsultasi
                                </button>
                            </form>
                            <div id="form-success" class="hidden p-3 rounded-xl bg-emerald-500/20 border border-emerald-400/40 text-emerald-300 text-xs font-mono text-center">
                                Terima kasih! Tim Principal Architect kami akan menghubungi Anda via email dalam 2 jam kerja.
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </section>

    </main>

    <!-- FOOTER -->
    <footer class="bg-arctic-abyss border-t border-cyan-500/20 pt-16 pb-12 relative z-10 text-xs text-slate-400">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-5 gap-8 pb-12 border-b border-cyan-500/20">
                
                <div class="col-span-2 space-y-4">
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-cyan-400 to-blue-600 flex items-center justify-center text-slate-950 font-bold">
                            FB
                        </div>
                        <span class="font-display font-extrabold text-xl text-white">FrostByte Analytics</span>
                    </div>
                    <p class="text-xs text-slate-300 max-w-sm leading-relaxed">
                        Studio analitik data kreatif dan rekayasa kecerdasan data berkecepatan tinggi. Membawa kekuatan prediktif ke jantung korporasi modern.
                    </p>
                    <div class="text-[11px] font-mono text-cyan-400">
                        Jakarta &bull; Singapore &bull; Remote Cloud Operations
                    </div>
                </div>

                <div>
                    <h4 class="font-display font-bold text-white text-sm mb-3">Kapabilitas</h4>
                    <ul class="space-y-2">
                        <li><a href="#capabilities" class="hover:text-cyan-300 transition">Modern Lakehouse</a></li>
                        <li><a href="#capabilities" class="hover:text-cyan-300 transition">Stream Processing</a></li>
                        <li><a href="#capabilities" class="hover:text-cyan-300 transition">Predictive AI</a></li>
                        <li><a href="#capabilities" class="hover:text-cyan-300 transition">Executive BI</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-display font-bold text-white text-sm mb-3">Solusi Industri</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-cyan-300 transition">FinTech &amp; Banking</a></li>
                        <li><a href="#" class="hover:text-cyan-300 transition">Retail &amp; E-Commerce</a></li>
                        <li><a href="#" class="hover:text-cyan-300 transition">Logistik &amp; Supply Chain</a></li>
                        <li><a href="#" class="hover:text-cyan-300 transition">Healthcare Analytics</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-display font-bold text-white text-sm mb-3">Legal &amp; Trust</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-cyan-300 transition">UU PDP Compliance</a></li>
                        <li><a href="#" class="hover:text-cyan-300 transition">ISO 27001 Standard</a></li>
                        <li><a href="#" class="hover:text-cyan-300 transition">SLA 99.99% Policy</a></li>
                        <li><a href="#" class="hover:text-cyan-300 transition">Privacy Statement</a></li>
                    </ul>
                </div>

            </div>

            <div class="pt-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-[11px]">
                <p>&copy; 2026 FrostByte Analytics Inc. Seluruh hak cipta dilindungi undang-undang.</p>
                <div class="flex items-center gap-4 text-cyan-300 font-mono">
                    <span>Designed for Webia Ecosystem</span>
                    <span>&bull;</span>
                    <span>Arctic Frost Edition</span>
                </div>
            </div>
        </div>
    </footer>

    <!-- FLOATING WHATSAPP BUTTON -->
    <a href="https://wa.me/6281234567890?text=Halo%20FrostByte%20Analytics,%20saya%20ingin%20berkonsultasi%20mengenai%20solusi%20Data%20Analytics%20Creative" 
       target="_blank" rel="noopener noreferrer" 
       class="fixed bottom-6 right-6 z-50 p-3.5 rounded-2xl bg-emerald-500 hover:bg-emerald-400 text-white shadow-[0_0_25px_rgba(16,185,129,0.5)] hover:scale-105 transition-all flex items-center gap-2 group"
       title="Hubungi Konsultan Data via WhatsApp">
        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
            <path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0012.04 2m.01 1.67c2.2 0 4.26.86 5.82 2.42a8.225 8.225 0 012.41 5.83c0 4.54-3.7 8.24-8.24 8.24-1.48 0-2.93-.4-4.2-1.15l-.3-.18-3.12.82.83-3.04-.2-.31a8.196 8.196 0 01-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24m4.52 11.66c-.25-.13-1.47-.72-1.7-.81-.23-.08-.39-.13-.56.13-.17.25-.64.81-.79.97-.14.17-.29.19-.54.06-.25-.13-1.06-.39-2.01-1.24-.74-.66-1.24-1.48-1.39-1.73-.14-.25-.02-.39.11-.51.11-.11.25-.29.37-.43.13-.15.17-.25.25-.42.08-.17.04-.31-.02-.44-.06-.13-.56-1.34-.76-1.84-.2-.49-.4-.42-.56-.43h-.48c-.17 0-.44.06-.67.31-.23.25-.88.86-.88 2.1 0 1.24.9 2.44 1.03 2.61.13.17 1.77 2.71 4.3 3.8 2.52 1.09 2.52.73 2.98.69.45-.05 1.47-.6 1.68-1.18.21-.58.21-1.07.15-1.18-.07-.12-.23-.19-.48-.32z"/>
        </svg>
        <span class="max-w-0 overflow-hidden whitespace-nowrap group-hover:max-w-xs transition-all duration-300 font-mono text-xs font-bold pr-1">
            Konsultasi WhatsApp
        </span>
    </a>

    <!-- FLOATING FROST AI CONCIERGE MODAL -->
    <div id="frost-ai-modal" class="fixed inset-0 z-50 bg-black/70 backdrop-blur-md hidden items-center justify-center p-4">
        <div class="glass-panel w-full max-w-lg rounded-3xl border border-cyan-400/40 p-6 space-y-4 shadow-[0_0_50px_rgba(0,240,255,0.3)]">
            <div class="flex items-center justify-between pb-3 border-b border-cyan-500/20">
                <div class="flex items-center gap-2">
                    <div class="w-3 h-3 rounded-full bg-cyan-400 animate-ping"></div>
                    <span class="font-display font-bold text-white text-sm">FrostAI Data Assistant</span>
                    <span class="text-[10px] font-mono px-2 py-0.5 rounded bg-cyan-500/20 text-cyan-300">v4.8 Active</span>
                </div>
                <button onclick="closeFrostAI()" class="text-slate-400 hover:text-white p-1">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>

            <div class="h-64 overflow-y-auto space-y-3 p-3 rounded-2xl bg-arctic-abyss/80 border border-cyan-500/20 text-xs" id="chat-stream">
                <div class="p-3 rounded-xl bg-cyan-950/60 border border-cyan-500/30 text-cyan-200">
                    <strong>FrostAI:</strong> Selamat datang di FrostByte Analytics! Saya dapat membantu menjelaskan arsitektur data lakehouse, mengestimasi penghematan cloud, atau menjadwalkan audit gratis untuk perusahaan Anda.
                </div>
            </div>

            <!-- Pre-Canned Quick Questions -->
            <div class="flex flex-wrap gap-1.5 pt-1">
                <button onclick="askPreset('Berapa estimasi penghematan cloud kami?')" class="text-[11px] font-mono px-2.5 py-1 rounded-lg bg-arctic-glacier hover:bg-arctic-surface text-cyan-300 border border-cyan-500/30">
                    Penghematan Cloud?
                </button>
                <button onclick="askPreset('Bagaimana kepatuhan UU PDP &amp; privasi?')" class="text-[11px] font-mono px-2.5 py-1 rounded-lg bg-arctic-glacier hover:bg-arctic-surface text-cyan-300 border border-cyan-500/30">
                    Kepatuhan UU PDP?
                </button>
                <button onclick="askPreset('Saya ingin jadwalkan audit data gratis')" class="text-[11px] font-mono px-2.5 py-1 rounded-lg bg-cyan-500/20 hover:bg-cyan-500/30 text-cyan-200 border border-cyan-400/40 font-bold">
                    Jadwalkan Audit
                </button>
            </div>

            <!-- Input Bar -->
            <div class="flex gap-2">
                <input type="text" id="ai-input" placeholder="Tanyakan seputar data stack..." 
                    class="flex-1 px-4 py-2 rounded-xl bg-arctic-glacier/80 border border-cyan-500/30 text-white placeholder-slate-500 text-xs focus:outline-none focus:border-cyan-400">
                <button onclick="sendChatMessage()" class="px-4 py-2 rounded-xl bg-cyan-400 text-slate-950 font-bold text-xs">
                    Kirim
                </button>
            </div>
        </div>
    </div>

    <!-- CLIENT JAVASCRIPT LOGIC -->
    <script>
        // Toggle Mobile Menu
        function toggleMobileMenu() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        }

        // Live Canvas Tabs Switcher
        function switchCanvasTab(tabName) {
            const tabs = ['forecast', 'cluster', 'pipeline-health'];
            tabs.forEach(t => {
                const btn = document.getElementById('tab-' + t);
                const view = document.getElementById('view-' + t);
                if (t === tabName) {
                    btn.className = 'px-5 py-2.5 rounded-xl font-display font-bold text-xs uppercase tracking-wider bg-cyan-400 text-slate-950 transition-all shadow-[0_0_20px_rgba(56,189,248,0.5)]';
                    view.classList.remove('hidden');
                } else {
                    btn.className = 'px-5 py-2.5 rounded-xl font-display font-bold text-xs uppercase tracking-wider bg-arctic-glacier/80 text-slate-300 hover:text-white border border-cyan-500/30 hover:border-cyan-400 transition-all';
                    view.classList.add('hidden');
                }
            });
        }

        // Live ROI & Velocity Calculator
        function calculateROI() {
            const vol = parseInt(document.getElementById('range-volume').value);
            const analysts = parseInt(document.getElementById('range-analysts').value);
            const latency = parseInt(document.getElementById('range-latency').value);

            // Update Labels
            document.getElementById('label-volume').innerText = vol >= 1000 ? (vol / 1000).toFixed(1) + ' TB' : vol + ' GB';
            document.getElementById('label-analysts').innerText = analysts + ' Orang';
            document.getElementById('label-latency').innerText = latency + ' Jam (' + (latency <= 6 ? 'Intraday' : 'Batch') + ')';

            // Computations
            const hoursSaved = Math.round(analysts * 28 + (vol / 50) * 1.5);
            const savingsMillions = Math.round((vol / 100) * 14 + analysts * 6.5);
            const speedup = Math.min(32, Math.round((latency / 2) * 1.8));

            document.getElementById('res-hours').innerText = hoursSaved + ' Jam';
            document.getElementById('res-savings').innerText = 'Rp ' + savingsMillions + 'M+';
            document.getElementById('res-speed').innerText = speedup + 'x Lipat';
        }

        // FAQ Toggle
        function toggleFAQ(idx) {
            const body = document.getElementById('faq-body-' + idx);
            const icon = document.getElementById('faq-icon-' + idx);
            if (body.classList.contains('hidden')) {
                body.classList.remove('hidden');
                icon.innerText = '−';
                icon.style.transform = 'rotate(180deg)';
            } else {
                body.classList.add('hidden');
                icon.innerText = '+';
                icon.style.transform = 'rotate(0deg)';
            }
        }

        // FrostAI Modal Open/Close
        function openFrostAI() {
            document.getElementById('frost-ai-modal').classList.remove('hidden');
            document.getElementById('frost-ai-modal').classList.add('flex');
        }

        function closeFrostAI() {
            document.getElementById('frost-ai-modal').classList.add('hidden');
            document.getElementById('frost-ai-modal').classList.remove('flex');
        }

        // FrostAI Chat Messaging
        function askPreset(text) {
            document.getElementById('ai-input').value = text;
            sendChatMessage();
        }

        function sendChatMessage() {
            const input = document.getElementById('ai-input');
            const stream = document.getElementById('chat-stream');
            const q = input.value.trim();
            if (!q) return;

            // User Message
            const userMsg = document.createElement('div');
            userMsg.className = 'p-3 rounded-xl bg-arctic-glacier/80 border border-cyan-500/20 text-slate-100 text-right';
            userMsg.innerHTML = '<strong>Anda:</strong> ' + q;
            stream.appendChild(userMsg);

            input.value = '';
            stream.scrollTop = stream.scrollHeight;

            // Dynamic Response Simulation
            setTimeout(() => {
                const aiMsg = document.createElement('div');
                aiMsg.className = 'p-3 rounded-xl bg-cyan-950/60 border border-cyan-500/30 text-cyan-200';
                
                let answer = 'Tim arsitek FrostByte siap merancang proof-of-concept untuk kebutuhan data Anda. Silakan isi form konsultasi atau hubungi kami via WhatsApp concierge.';
                if (q.toLowerCase().includes('cloud') || q.toLowerCase().includes('hemat')) {
                    answer = 'FrostByte menerapkan auto-scaling micro cluster dan query tiering berbasis Apache Iceberg, menghasilkan penghematan biaya compute rata-rata 35-48% di AWS, GCP, maupun Snowflake.';
                } else if (q.toLowerCase().includes('pdp') || q.toLowerCase().includes('privasi') || q.toLowerCase().includes('keamanan')) {
                    answer = 'Seluruh data tetap tersimpan di VPC cloud Anda sendiri dengan enkripsi AES-256. Kami menyertakan audit log lengkap dan masking PII untuk kepatuhan mutlak UU PDP.';
                } else if (q.toLowerCase().includes('audit')) {
                    answer = 'Audit data 30 menit kami mencakup peninjauan skema pipeline, deteksi query lambat, serta roadmap 90 hari. Jadwalkan langsung melalui formulir di bawah.';
                }

                aiMsg.innerHTML = '<strong>FrostAI:</strong> ' + answer;
                stream.appendChild(aiMsg);
                stream.scrollTop = stream.scrollHeight;
            }, 600);
        }

        // Lead Generation Form Handler
        function submitAuditForm(e) {
            e.preventDefault();
            document.getElementById('auditForm').classList.add('opacity-50', 'pointer-events-none');
            setTimeout(() => {
                document.getElementById('form-success').classList.remove('hidden');
            }, 500);
        }

        // Live Simulated Throughput Fluctuations
        setInterval(() => {
            const el = document.getElementById('live-throughput');
            if (el) {
                const val = (3200 + Math.random() * 600).toFixed(0);
                el.innerText = Number(val).toLocaleString() + ' MB/s';
            }
        }, 3000);
    </script>

</body>
</html>
