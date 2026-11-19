<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PusakaMotion 3D Studio — Motion Graphics &amp; 3D Studio Traditional Cultural Coral &amp; Peach</title>
    <meta name="description" content="PusakaMotion 3D Studio adalah agensi seni gerak dan rekayasa CGI 3D bernuansa tradisional kultural Nusantara dengan palet hangat Coral & Peach. Menghadirkan visualisasi cagar budaya fotorealistik, animasi kinetik motif etnik, dan sinema cerita rakyat berstandar global.">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500;600;700;800;900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&family=Marcellus&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                        serif: ['"Cinzel"', 'serif'],
                        cultural: ['"Marcellus"', 'serif'],
                        mono: ['"JetBrains Mono"', 'monospace'],
                    },
                    colors: {
                        coral: {
                            50: '#fff5f3',
                            100: '#ffe8e4',
                            200: '#ffd4cc',
                            300: '#ffb5a6',
                            400: '#fa8672',
                            500: '#f06457',
                            600: '#de473a',
                            700: '#ba3327',
                            800: '#992d24',
                            900: '#7e2b24',
                            950: '#44120e',
                        },
                        peach: {
                            50: '#fff9f6',
                            100: '#fff1ea',
                            200: '#ffe1d3',
                            300: '#ffc8b1',
                            400: '#ffa484',
                            500: '#ff865c',
                            600: '#f06637',
                            700: '#c84d23',
                            800: '#9f3e20',
                            900: '#80371f',
                            950: '#451a0c',
                        },
                        terracotta: {
                            800: '#3c1d16',
                            900: '#2c1510',
                            950: '#1e0c08',
                        }
                    },
                    animation: {
                        'float-gentle': 'floatGentle 6s ease-in-out infinite',
                        'spin-slow': 'spin 40s linear infinite',
                        'pulse-glow': 'pulseGlow 5s ease-in-out infinite',
                    },
                    keyframes: {
                        floatGentle: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-10px)' },
                        },
                        pulseGlow: {
                            '0%, 100%': { opacity: '0.4', transform: 'scale(1)' },
                            '50%': { opacity: '0.8', transform: 'scale(1.05)' },
                        }
                    }
                }
            }
        }
    </script>

    <style>
        .cultural-pattern-bg {
            background-color: #fffaf7;
            background-image: 
                radial-gradient(circle at 10% 20%, rgba(240, 100, 87, 0.08) 0%, transparent 40%),
                radial-gradient(circle at 90% 80%, rgba(255, 164, 132, 0.12) 0%, transparent 45%),
                radial-gradient(circle at 50% 50%, rgba(255, 225, 211, 0.18) 0%, transparent 60%);
        }
        
        .batik-ornament-border {
            background: linear-gradient(90deg, #de473a 0%, #ff865c 50%, #ffa484 100%);
            height: 3px;
        }

        .cultural-glass {
            background: rgba(255, 255, 255, 0.82);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            border: 1px solid rgba(255, 181, 166, 0.5);
            transition: all 0.35s ease;
        }

        .cultural-glass:hover {
            border-color: rgba(240, 100, 87, 0.7);
            box-shadow: 0 16px 36px -12px rgba(222, 71, 58, 0.2);
            transform: translateY(-4px);
        }

        .coral-gradient-text {
            background: linear-gradient(135deg, #ba3327 0%, #f06457 50%, #ff865c 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .peach-gradient-text {
            background: linear-gradient(135deg, #ff865c 0%, #ffa484 50%, #f06457 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
</head>

<body class="bg-peach-50 text-terracotta-950 font-sans antialiased overflow-x-hidden cultural-pattern-bg selection:bg-coral-200 selection:text-coral-950">

    <!-- ETHNIC CORAL & PEACH AMBIENT GLOW -->
    <div class="fixed inset-0 pointer-events-none z-0 overflow-hidden">
        <div class="absolute -top-36 right-0 w-[550px] h-[550px] bg-coral-300/20 rounded-full blur-[140px] animate-pulse-glow"></div>
        <div class="absolute top-1/2 -left-48 w-[600px] h-[600px] bg-peach-300/25 rounded-full blur-[160px] animate-float-gentle"></div>
        <div class="absolute -bottom-40 right-1/4 w-[500px] h-[500px] bg-coral-200/20 rounded-full blur-[150px]"></div>
    </div>

    <!-- TOPBAR: CULTURAL BROADCAST & PIPELINE TELEMETRY -->
    <aside aria-label="Studio Dispatch" class="relative z-50 bg-terracotta-950 text-peach-200 text-xs py-2 px-4 border-b border-coral-900/60">
        <div class="max-w-7xl mx-auto flex flex-wrap items-center justify-between gap-3 font-mono text-[11px]">
            <div class="flex items-center gap-2">
                <span class="inline-flex items-center px-2 py-0.5 rounded-full bg-coral-900/80 text-coral-300 border border-coral-700/60 font-medium">
                    <span class="w-1.5 h-1.5 rounded-full bg-coral-400 animate-ping mr-1.5"></span>
                    PRODUKSI KULTURAL AKTIF
                </span>
                <span class="hidden md:inline text-peach-300">Rekonstruksi 3D Epik Candi Prambanan &amp; Wayang Purwa Tahap 03 Sedang Dirender (Octane GPU Farm)</span>
            </div>
            <div class="flex items-center gap-4 text-peach-200/80">
                <span class="hidden sm:inline">📍 Studio Yogyakarta &bull; Bali &bull; Jakarta</span>
                <span class="text-coral-400 font-semibold">FPS Render: 30 / 60 Sinematik</span>
                <a href="#estimasi" class="text-coral-300 hover:text-white underline underline-offset-2">Simulasi Biaya Proyek &rarr;</a>
            </div>
        </div>
    </aside>

    <!-- MAIN NAVBAR: TRADITIONAL / CULTURAL GLASS -->
    <header class="sticky top-0 z-40 cultural-glass border-b border-coral-200/60 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
            
            <!-- Brand Logo with Cultural Motif -->
            <a href="#" class="flex items-center gap-3 group">
                <div class="w-11 h-11 rounded-2xl bg-gradient-to-br from-coral-500 via-peach-500 to-coral-600 flex items-center justify-center text-white shadow-md shadow-coral-500/25 group-hover:scale-105 transition-transform">
                    <svg class="w-6 h-6 transform group-hover:rotate-12 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
                    </svg>
                </div>
                <div>
                    <span class="font-serif text-xl tracking-wider font-bold text-terracotta-950 block leading-tight">
                        PUSAKA<span class="text-coral-600">MOTION</span>
                    </span>
                    <span class="text-[10px] font-mono tracking-widest text-coral-800 uppercase block font-semibold">
                        CULTURAL 3D &amp; MOTION STUDIO
                    </span>
                </div>
            </a>

            <!-- Nav Links -->
            <nav class="hidden lg:flex items-center gap-7 font-sans text-xs font-semibold uppercase tracking-wider text-terracotta-900">
                <a href="#showreel" class="hover:text-coral-600 transition">Showreel</a>
                <a href="#portfolio" class="hover:text-coral-600 transition">Karya Budaya</a>
                <a href="#pipeline" class="hover:text-coral-600 transition">Pipeline 3D</a>
                <a href="#estimasi" class="hover:text-coral-600 transition">Estimator</a>
                <a href="#layanan" class="hover:text-coral-600 transition">Paket Kolaborasi</a>
                <a href="#faq" class="hover:text-coral-600 transition">FAQ</a>
                <button onclick="openPusakaAI()" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-peach-100 border border-coral-300 text-coral-800 hover:bg-coral-500 hover:text-white transition">
                    <svg class="w-3.5 h-3.5 text-coral-600 group-hover:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    <span>PusakaAI Assistant</span>
                </button>
            </nav>

            <!-- Action CTA -->
            <div class="hidden sm:flex items-center gap-3">
                <a href="https://wa.me/6281234567890?text=Halo%20PusakaMotion%203D%20Studio,%20saya%20tertarik%20berkolaborasi%20untuk%20produksi%20motion%20graphics%20dan%20visual%203D%20bertema%20budaya." 
                   target="_blank" 
                   rel="noopener"
                   class="px-5 py-2.5 rounded-xl text-xs font-bold uppercase tracking-wider text-white bg-gradient-to-r from-coral-600 to-peach-600 hover:from-coral-700 hover:to-peach-700 shadow-md shadow-coral-500/20 transition flex items-center gap-2">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.662.591 1.221.774 1.394.86s.275.072.376-.043c.101-.116.433-.506.549-.68.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.043.073.043.419-.101.825z"/></svg>
                    <span>Konsultasi Proyek</span>
                </a>
            </div>

            <!-- Mobile Menu Toggle Button -->
            <div class="lg:hidden flex items-center gap-2">
                <button onclick="toggleMobileMenu()" class="p-2 rounded-xl text-coral-800 hover:bg-peach-100 transition" aria-label="Toggle Menu">
                    <svg id="menu-icon" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Drawer -->
        <div id="mobile-menu" class="hidden lg:hidden border-t border-coral-200 bg-white/95 px-6 py-5 space-y-4 text-sm font-semibold uppercase tracking-wider text-terracotta-900">
            <a href="#showreel" onclick="toggleMobileMenu()" class="block py-1 hover:text-coral-600">Showreel</a>
            <a href="#portfolio" onclick="toggleMobileMenu()" class="block py-1 hover:text-coral-600">Karya Budaya</a>
            <a href="#pipeline" onclick="toggleMobileMenu()" class="block py-1 hover:text-coral-600">Pipeline 3D</a>
            <a href="#estimasi" onclick="toggleMobileMenu()" class="block py-1 hover:text-coral-600">Kalkulator Proyek</a>
            <a href="#layanan" onclick="toggleMobileMenu()" class="block py-1 hover:text-coral-600">Paket Kolaborasi</a>
            <a href="#faq" onclick="toggleMobileMenu()" class="block py-1 hover:text-coral-600">FAQ</a>
            <button onclick="openPusakaAI(); toggleMobileMenu();" class="w-full py-2.5 rounded-xl text-xs font-semibold text-coral-900 bg-peach-200 text-center">Buka PusakaAI Assistant</button>
        </div>
    </header>

    <main class="relative z-10">

        <!-- HERO SECTION: TRADITIONAL / CULTURAL CORAL & PEACH -->
        <section class="relative min-h-[90vh] flex items-center justify-center pt-10 pb-20 overflow-hidden">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
                <div class="grid lg:grid-cols-12 gap-12 items-center">
                    
                    <!-- Left Hero Text -->
                    <div class="lg:col-span-7 space-y-6">
                        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-peach-200/80 border border-coral-300 text-coral-900 text-[11px] font-mono tracking-widest uppercase">
                            <span class="w-2 h-2 rounded-full bg-coral-500 animate-ping"></span>
                            TRADITIONAL / CULTURAL &bull; CORAL &amp; PEACH
                        </div>

                        <h1 class="font-serif text-3xl sm:text-5xl lg:text-6xl text-terracotta-950 leading-[1.12] tracking-tight">
                            Menghidupkan Pusaka Nusantara,<br>
                            <span class="coral-gradient-text not-italic font-bold">
                                Lewat Dimensi 3D &amp; Gerak Sinematik.
                            </span>
                        </h1>

                        <p class="text-base sm:text-lg text-terracotta-800/85 font-cultural leading-relaxed max-w-2xl">
                            PusakaMotion 3D Studio menjembatani filosofi adiluhung warisan budaya Indonesia dengan rekayasa visual 3D tercanggih, simulasi partikel kinetik batik, serta rekonstruksi cagar budaya berstandar bioskop global.
                        </p>

                        <!-- CTA Group -->
                        <div class="pt-3 flex flex-wrap items-center gap-4 font-sans text-xs">
                            <a href="#portfolio" class="px-7 py-3.5 rounded-xl font-bold uppercase tracking-wider text-white bg-gradient-to-r from-coral-600 to-peach-600 hover:from-coral-700 hover:to-peach-700 transition shadow-lg shadow-coral-500/25 flex items-center gap-2">
                                <span>Eksplorasi Galeri Pusaka</span>
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                            </a>
                            <a href="#showreel" class="px-6 py-3.5 rounded-xl font-semibold text-terracotta-900 bg-white/90 hover:bg-white border border-coral-300 transition flex items-center gap-2 shadow-sm">
                                <svg class="w-4 h-4 text-coral-600" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                <span>Tonton Showreel 2026 (01:45)</span>
                            </a>
                        </div>

                        <!-- Studio Trust Numbers -->
                        <div class="pt-8 border-t border-coral-200/80 grid grid-cols-3 gap-6 font-mono">
                            <div>
                                <div class="font-serif font-extrabold text-2xl sm:text-3xl text-coral-700">180+</div>
                                <div class="text-[11px] text-terracotta-800 uppercase mt-0.5 tracking-wider font-sans">Aset 3D Budaya</div>
                            </div>
                            <div>
                                <div class="font-serif font-extrabold text-2xl sm:text-3xl text-peach-600">8K Cine</div>
                                <div class="text-[11px] text-terracotta-800 uppercase mt-0.5 tracking-wider font-sans">Photoreal Render</div>
                            </div>
                            <div>
                                <div class="font-serif font-extrabold text-2xl sm:text-3xl text-coral-600">24</div>
                                <div class="text-[11px] text-terracotta-800 uppercase mt-0.5 tracking-wider font-sans">Penghargaan Budaya</div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Hero Visual: Interactive Cultural 3D Viewport -->
                    <div class="lg:col-span-5 relative">
                        <div class="relative rounded-3xl p-6 cultural-glass border-2 border-coral-300/80 shadow-2xl overflow-hidden">
                            
                            <!-- Card Header -->
                            <div class="flex items-center justify-between pb-4 border-b border-coral-200 font-mono text-xs">
                                <div class="flex items-center gap-2">
                                    <div class="w-3 h-3 rounded-full bg-coral-500"></div>
                                    <div class="w-3 h-3 rounded-full bg-peach-400"></div>
                                    <div class="w-3 h-3 rounded-full bg-amber-400"></div>
                                    <span class="ml-2 font-bold text-coral-950">PUSAKA-VIEWPORT // v4.8</span>
                                </div>
                                <span class="px-2 py-0.5 rounded bg-coral-100 text-coral-800 font-semibold text-[10px]">REAL-TIME CANVAS</span>
                            </div>

                            <!-- Interactive 3D Canvas Box -->
                            <div class="relative h-72 sm:h-80 w-full rounded-2xl bg-gradient-to-b from-terracotta-950 to-terracotta-900 flex items-center justify-center my-4 overflow-hidden border border-coral-900/40">
                                
                                <canvas id="heroCanvas" class="w-full h-full cursor-grab active:cursor-grabbing"></canvas>

                                <!-- Cultural Overlay UI Tag -->
                                <div class="absolute bottom-3 left-3 right-3 bg-terracotta-950/80 backdrop-blur-md p-3 rounded-xl border border-coral-500/30 flex items-center justify-between font-mono text-[11px]">
                                    <div>
                                        <div class="text-peach-200 font-bold">Subjek: Candi Prambanan Kinematik</div>
                                        <div class="text-coral-400 text-[10px]">Poligon: 2.8M Poly &bull; Shader: Coral Terracotta PBR</div>
                                    </div>
                                    <button onclick="rotateCanvasSubject()" class="px-2.5 py-1 rounded bg-coral-600 text-white text-[10px] uppercase font-bold hover:bg-coral-500 transition">
                                        Rotasi Aset
                                    </button>
                                </div>
                            </div>

                            <!-- Viewport Controls & Tags -->
                            <div class="flex items-center justify-between text-xs font-mono text-terracotta-800 pt-1">
                                <span>Shader: Photoreal Coral Peach</span>
                                <span class="text-coral-700 font-bold">● Live Ray-Tracing Preview</span>
                            </div>
                        </div>

                        <!-- Decorative Floating Badges -->
                        <div class="absolute -bottom-6 -left-6 bg-white p-4 rounded-2xl border border-coral-300 shadow-xl hidden sm:flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-coral-100 text-coral-600 flex items-center justify-center font-serif text-lg font-bold">
                                ꦥ
                            </div>
                            <div>
                                <div class="font-bold text-xs text-terracotta-950">Akurasi Etnografi Terverifikasi</div>
                                <div class="text-[11px] text-coral-700 font-mono">Bekerjasama dengan Balai Pelestarian Budaya</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- SHOWREEL SHOWCASE SECTION -->
        <section id="showreel" class="py-20 relative bg-gradient-to-b from-transparent via-coral-100/40 to-transparent">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                
                <div class="text-center max-w-3xl mx-auto space-y-4 mb-12">
                    <span class="text-coral-700 font-mono text-xs uppercase tracking-widest font-bold">CINEMATIC SHOWREEL 2026</span>
                    <h2 class="font-serif text-3xl sm:text-4xl text-terracotta-950">
                        Mahakarya Visual Gerak &amp; <span class="coral-gradient-text">Rekonstruksi Pusaka</span>
                    </h2>
                    <p class="text-terracotta-800/80 text-sm sm:text-base font-cultural">
                        Kompilasi proyek sinematik motion graphics 3D yang menggabungkan visual CGI mutakhir dengan orkestrasi gamelan dan estetika budaya Nusantara.
                    </p>

                    <!-- Filter Tabs for Reel -->
                    <div class="pt-4 flex flex-wrap justify-center gap-2 font-mono text-xs">
                        <button onclick="filterReel('all', this)" class="reel-tab px-4 py-2 rounded-xl bg-coral-600 text-white font-bold transition shadow-sm">Semua Showreel</button>
                        <button onclick="filterReel('candi', this)" class="reel-tab px-4 py-2 rounded-xl bg-white border border-coral-200 text-terracotta-800 font-semibold hover:bg-peach-100 transition">Rekonstruksi Candi</button>
                        <button onclick="filterReel('wayang', this)" class="reel-tab px-4 py-2 rounded-xl bg-white border border-coral-200 text-terracotta-800 font-semibold hover:bg-peach-100 transition">Wayang CGI &amp; Tokoh</button>
                        <button onclick="filterReel('batik', this)" class="reel-tab px-4 py-2 rounded-xl bg-white border border-coral-200 text-terracotta-800 font-semibold hover:bg-peach-100 transition">Kinetik Motif Batik</button>
                    </div>
                </div>

                <!-- Video Showcase Player Box -->
                <div class="relative rounded-3xl overflow-hidden shadow-2xl border-2 border-coral-300 bg-terracotta-950 aspect-video max-w-5xl mx-auto group">
                    <img src="https://images.unsplash.com/photo-1596402184320-417e7178b2cd?auto=format&fit=crop&w=1600&q=80" 
                         alt="PusakaMotion 3D Reel" 
                         id="reelPoster"
                         class="w-full h-full object-cover opacity-75 group-hover:scale-105 transition-transform duration-700">
                    
                    <div class="absolute inset-0 bg-gradient-to-t from-terracotta-950 via-terracotta-950/40 to-transparent flex flex-col justify-between p-6 sm:p-10">
                        <div class="flex items-center justify-between">
                            <span class="px-3 py-1 rounded-full bg-coral-600/90 text-white font-mono text-xs tracking-wider uppercase font-bold backdrop-blur-md">
                                MASTER REEL 4K // 60 FPS
                            </span>
                            <span class="text-peach-200 font-mono text-xs">Durasi: 01:45</span>
                        </div>

                        <!-- Center Play Button with Pulse -->
                        <div class="self-center">
                            <button onclick="playShowreelModal()" class="w-20 h-20 sm:w-24 sm:h-24 rounded-full bg-gradient-to-tr from-coral-600 to-peach-500 text-white flex items-center justify-center shadow-2xl shadow-coral-500/50 hover:scale-110 active:scale-95 transition-all group-hover:rotate-6">
                                <svg class="w-10 h-10 fill-current translate-x-1" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                            </button>
                        </div>

                        <div class="flex flex-wrap items-end justify-between gap-4">
                            <div>
                                <h3 class="font-serif text-xl sm:text-2xl text-white font-bold" id="reelTitle">
                                    Simfoni Pusaka: Kisah 1.000 Relief Menari dalam CGI
                                </h3>
                                <p class="text-xs sm:text-sm text-peach-200/90 font-mono mt-1">
                                    Unreal Engine 5.4 &bull; Houdini Cloth &bull; Octane Photoreal &bull; Dolby Atmos Audio
                                </p>
                            </div>
                            <div class="font-mono text-xs text-coral-300">
                                4K HDR MASTER READY
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- CURATED CULTURAL PORTFOLIO GRID -->
        <section id="portfolio" class="py-24 relative">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                
                <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-6 border-b border-coral-200 pb-8">
                    <div>
                        <span class="text-coral-700 font-mono text-xs uppercase tracking-widest font-bold">ARSIP KARYA PILIHAN</span>
                        <h2 class="font-serif text-3xl sm:text-4xl text-terracotta-950 mt-1">
                            Galeri 3D &amp; Motion <span class="coral-gradient-text">Pusaka Nusantara</span>
                        </h2>
                    </div>
                    <div class="flex flex-wrap gap-2 font-mono text-xs">
                        <button onclick="filterPortfolio('all', this)" class="port-filter px-3.5 py-1.5 rounded-lg bg-coral-600 text-white font-bold transition">Semua (6)</button>
                        <button onclick="filterPortfolio('monumen', this)" class="port-filter px-3.5 py-1.5 rounded-lg bg-white border border-coral-200 text-terracotta-800 hover:bg-coral-50 transition">Monumen (2)</button>
                        <button onclick="filterPortfolio('tokoh', this)" class="port-filter px-3.5 py-1.5 rounded-lg bg-white border border-coral-200 text-terracotta-800 hover:bg-coral-50 transition">Wayang &amp; Tokoh (2)</button>
                        <button onclick="filterPortfolio('ornamen', this)" class="port-filter px-3.5 py-1.5 rounded-lg bg-white border border-coral-200 text-terracotta-800 hover:bg-coral-50 transition">Ornamen &amp; Tekstil (2)</button>
                    </div>
                </div>

                <!-- 6 Curated Cultural 3D Projects -->
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    
                    <!-- Card 1 -->
                    <article data-cat="monumen" class="port-card cultural-glass rounded-3xl overflow-hidden border border-coral-200 shadow-md hover:shadow-xl transition flex flex-col justify-between">
                        <div>
                            <div class="relative h-60 overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1596402184320-417e7178b2cd?auto=format&fit=crop&w=800&q=80" 
                                     alt="Borobudur Celestial Dawn 3D" 
                                     class="w-full h-full object-cover hover:scale-105 transition duration-500">
                                <div class="absolute top-3 left-3 bg-terracotta-950/80 backdrop-blur-md px-2.5 py-1 rounded-md text-coral-300 font-mono text-[10px] font-bold">
                                    REKONSTRUKSI ARCHVIZ
                                </div>
                                <div class="absolute top-3 right-3 bg-coral-600 text-white px-2 py-0.5 rounded text-[10px] font-mono font-bold">
                                    8K CINE
                                </div>
                            </div>
                            <div class="p-6 space-y-3">
                                <div class="flex items-center justify-between text-xs font-mono text-coral-800">
                                    <span>Durasi: 03:10 Menit</span>
                                    <span>Unreal Engine 5</span>
                                </div>
                                <h3 class="font-serif text-xl font-bold text-terracotta-950">
                                    Borobudur Celestial Dawn: Rekonstruksi Purbakala Abad ke-8
                                </h3>
                                <p class="text-terracotta-800/80 text-xs sm:text-sm font-cultural leading-relaxed">
                                    Restorasi digital arsitektur stupa dengan kalkulasi lintasan matahari astronomis purba dan simulasi kabut pagi fotorealistik.
                                </p>
                            </div>
                        </div>
                        <div class="px-6 pb-6 pt-2 border-t border-coral-100 flex items-center justify-between font-mono text-xs">
                            <span class="text-terracotta-700">Deliverable: ProRes 4444</span>
                            <button onclick="openProjectModal('Borobudur Celestial Dawn', 'Restorasi arsitektur stupa 3D berbasis LiDAR scan dan manuskrip sejarah. Menghasilkan visualisasi fotorealistik untuk dokumenter internasional.')" class="text-coral-600 hover:text-coral-800 font-bold underline">Detail &rarr;</button>
                        </div>
                    </article>

                    <!-- Card 2 -->
                    <article data-cat="tokoh" class="port-card cultural-glass rounded-3xl overflow-hidden border border-coral-200 shadow-md hover:shadow-xl transition flex flex-col justify-between">
                        <div>
                            <div class="relative h-60 overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1578328819058-b69f3a3b0f6b?auto=format&fit=crop&w=800&q=80" 
                                     alt="The Legend of Roro Jonggrang 3D" 
                                     class="w-full h-full object-cover hover:scale-105 transition duration-500">
                                <div class="absolute top-3 left-3 bg-terracotta-950/80 backdrop-blur-md px-2.5 py-1 rounded-md text-peach-300 font-mono text-[10px] font-bold">
                                    CINEMATIC MOTION 4K
                                </div>
                                <div class="absolute top-3 right-3 bg-coral-600 text-white px-2 py-0.5 rounded text-[10px] font-mono font-bold">
                                    SHORT FILM
                                </div>
                            </div>
                            <div class="p-6 space-y-3">
                                <div class="flex items-center justify-between text-xs font-mono text-coral-800">
                                    <span>Durasi: 04:30 Menit</span>
                                    <span>Houdini &bull; Maya</span>
                                </div>
                                <h3 class="font-serif text-xl font-bold text-terracotta-950">
                                    Roro Jonggrang &amp; Seribu Arca: Sinema Kinetik CGI
                                </h3>
                                <p class="text-terracotta-800/80 text-xs sm:text-sm font-cultural leading-relaxed">
                                    Visualisasi dramatik kutukan seribu candi dengan simulasi transformasi batu volumetrik dan pencahayaan mistis coral-peach.
                                </p>
                            </div>
                        </div>
                        <div class="px-6 pb-6 pt-2 border-t border-coral-100 flex items-center justify-between font-mono text-xs">
                            <span class="text-terracotta-700">Deliverable: DCP Cinema</span>
                            <button onclick="openProjectModal('Roro Jonggrang Sinema CGI', 'Animasi sinematik dengan karakter rig ekspresif dan pergerakan kain tradisional yang disimulasikan menggunakan GPU solver modern.')" class="text-coral-600 hover:text-coral-800 font-bold underline">Detail &rarr;</button>
                        </div>
                    </article>

                    <!-- Card 3 -->
                    <article data-cat="ornamen" class="port-card cultural-glass rounded-3xl overflow-hidden border border-coral-200 shadow-md hover:shadow-xl transition flex flex-col justify-between">
                        <div>
                            <div class="relative h-60 overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1607604276583-eef5d076aa5f?auto=format&fit=crop&w=800&q=80" 
                                     alt="Kawung Fractal Kinetic" 
                                     class="w-full h-full object-cover hover:scale-105 transition duration-500">
                                <div class="absolute top-3 left-3 bg-terracotta-950/80 backdrop-blur-md px-2.5 py-1 rounded-md text-coral-300 font-mono text-[10px] font-bold">
                                    KINETIC TYPOGRAPHY
                                </div>
                                <div class="absolute top-3 right-3 bg-coral-600 text-white px-2 py-0.5 rounded text-[10px] font-mono font-bold">
                                    BRANDING
                                </div>
                            </div>
                            <div class="p-6 space-y-3">
                                <div class="flex items-center justify-between text-xs font-mono text-coral-800">
                                    <span>Durasi: 01:00 Menit</span>
                                    <span>Cinema 4D &bull; Redshift</span>
                                </div>
                                <h3 class="font-serif text-xl font-bold text-terracotta-950">
                                    Geometri Fraktal Motif Kawung: Identitas Visual Brand
                                </h3>
                                <p class="text-terracotta-800/80 text-xs sm:text-sm font-cultural leading-relaxed">
                                    Eksplorasi matematika sakral motif batik Kawung dalam bentuk partikel 3D mengambang dan transisi logo dinamis.
                                </p>
                            </div>
                        </div>
                        <div class="px-6 pb-6 pt-2 border-t border-coral-100 flex items-center justify-between font-mono text-xs">
                            <span class="text-terracotta-700">Deliverable: Apple ProRes</span>
                            <button onclick="openProjectModal('Fraktal Motif Kawung', 'Pemanfaatan motion design mograph procedural untuk menciptakan identitas merk mewah berbasis warisan batik kraton.')" class="text-coral-600 hover:text-coral-800 font-bold underline">Detail &rarr;</button>
                        </div>
                    </article>

                    <!-- Card 4 -->
                    <article data-cat="monumen" class="port-card cultural-glass rounded-3xl overflow-hidden border border-coral-200 shadow-md hover:shadow-xl transition flex flex-col justify-between">
                        <div>
                            <div class="relative h-60 overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1544644181-1484b3fdfc62?auto=format&fit=crop&w=800&q=80" 
                                     alt="Garuda Wisnu Kencana Projection" 
                                     class="w-full h-full object-cover hover:scale-105 transition duration-500">
                                <div class="absolute top-3 left-3 bg-terracotta-950/80 backdrop-blur-md px-2.5 py-1 rounded-md text-coral-300 font-mono text-[10px] font-bold">
                                    PROJECTION MAPPING
                                </div>
                                <div class="absolute top-3 right-3 bg-coral-600 text-white px-2 py-0.5 rounded text-[10px] font-mono font-bold">
                                    LIVE EVENT
                                </div>
                            </div>
                            <div class="p-6 space-y-3">
                                <div class="flex items-center justify-between text-xs font-mono text-coral-800">
                                    <span>Durasi: 08:00 Menit</span>
                                    <span>TouchDesigner &bull; UE5</span>
                                </div>
                                <h3 class="font-serif text-xl font-bold text-terracotta-950">
                                    Garuda Wisnu Kencana: Architectural Projection 3D
                                </h3>
                                <p class="text-terracotta-800/80 text-xs sm:text-sm font-cultural leading-relaxed">
                                    Pementasan visual mapping skala monumental pada patung perunggu raksasa, mengisahkan pembebasan tirta amerta.
                                </p>
                            </div>
                        </div>
                        <div class="px-6 pb-6 pt-2 border-t border-coral-100 flex items-center justify-between font-mono text-xs">
                            <span class="text-terracotta-700">Deliverable: 16K Canvas</span>
                            <button onclick="openProjectModal('GWK Projection Mapping', 'Koreografi animasi visual 3D yang dipetakan secara presisi pada geometri patung setinggi 121 meter untuk perayaan KTT internasional.')" class="text-coral-600 hover:text-coral-800 font-bold underline">Detail &rarr;</button>
                        </div>
                    </article>

                    <!-- Card 5 -->
                    <article data-cat="tokoh" class="port-card cultural-glass rounded-3xl overflow-hidden border border-coral-200 shadow-md hover:shadow-xl transition flex flex-col justify-between">
                        <div>
                            <div class="relative h-60 overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1518709268805-4e9042af9f23?auto=format&fit=crop&w=800&q=80" 
                                     alt="Batara Guru Wayang 3D" 
                                     class="w-full h-full object-cover hover:scale-105 transition duration-500">
                                <div class="absolute top-3 left-3 bg-terracotta-950/80 backdrop-blur-md px-2.5 py-1 rounded-md text-coral-300 font-mono text-[10px] font-bold">
                                    DIGITAL WAYANG
                                </div>
                                <div class="absolute top-3 right-3 bg-coral-600 text-white px-2 py-0.5 rounded text-[10px] font-mono font-bold">
                                    METAVERSE
                                </div>
                            </div>
                            <div class="p-6 space-y-3">
                                <div class="flex items-center justify-between text-xs font-mono text-coral-800">
                                    <span>Durasi: Interactive</span>
                                    <span>Blender &bull; ZBrush</span>
                                </div>
                                <h3 class="font-serif text-xl font-bold text-terracotta-950">
                                    Batara Guru &amp; Tokoh Wayang: Rigging 3D Etnik
                                </h3>
                                <p class="text-terracotta-800/80 text-xs sm:text-sm font-cultural leading-relaxed">
                                    Model karakter wayang kulit berornamen ukiran emas dan corak coral-peach dengan rigging sendi luwes bergaya tari klasik.
                                </p>
                            </div>
                        </div>
                        <div class="px-6 pb-6 pt-2 border-t border-coral-100 flex items-center justify-between font-mono text-xs">
                            <span class="text-terracotta-700">Deliverable: FBX / USD / GLB</span>
                            <button onclick="openProjectModal('Wayang Kulit 3D Rigged', 'Karakter wayang siap pakai untuk game engine dan motion capture dengan tekstur PBR detail kulit kerbau asli.')" class="text-coral-600 hover:text-coral-800 font-bold underline">Detail &rarr;</button>
                        </div>
                    </article>

                    <!-- Card 6 -->
                    <article data-cat="ornamen" class="port-card cultural-glass rounded-3xl overflow-hidden border border-coral-200 shadow-md hover:shadow-xl transition flex flex-col justify-between">
                        <div>
                            <div class="relative h-60 overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1584917865442-de89df76afd3?auto=format&fit=crop&w=800&q=80" 
                                     alt="Tenun Ikat Sumba Cloth Simulation" 
                                     class="w-full h-full object-cover hover:scale-105 transition duration-500">
                                <div class="absolute top-3 left-3 bg-terracotta-950/80 backdrop-blur-md px-2.5 py-1 rounded-md text-coral-300 font-mono text-[10px] font-bold">
                                    CLOTH SIMULATION
                                </div>
                                <div class="absolute top-3 right-3 bg-coral-600 text-white px-2 py-0.5 rounded text-[10px] font-mono font-bold">
                                    COMMERCIAL
                                </div>
                            </div>
                            <div class="p-6 space-y-3">
                                <div class="flex items-center justify-between text-xs font-mono text-coral-800">
                                    <span>Durasi: 00:45 Menit</span>
                                    <span>Marvelous &bull; Octane</span>
                                </div>
                                <h3 class="font-serif text-xl font-bold text-terracotta-950">
                                    Simulasi Fisika Tenun Ikat Sumba: Gelombang Serat Alami
                                </h3>
                                <p class="text-terracotta-800/80 text-xs sm:text-sm font-cultural leading-relaxed">
                                    Micro-fiber simulation fotorealistik kain tenun pewarna alami yang berkibar mengikuti hembusan angin savana NTT.
                                </p>
                            </div>
                        </div>
                        <div class="px-6 pb-6 pt-2 border-t border-coral-100 flex items-center justify-between font-mono text-xs">
                            <span class="text-terracotta-700">Deliverable: OpenEXR 32-bit</span>
                            <button onclick="openProjectModal('Simulasi Tenun Ikat', 'Teknik dynamic cloth physics tingkat tinggi untuk kampanye fashion mewah bertema tradisi lokal.')" class="text-coral-600 hover:text-coral-800 font-bold underline">Detail &rarr;</button>
                        </div>
                    </article>

                </div>

            </div>
        </section>

        <!-- PIPELINE 3D CULTURAL ENGINEERING SECTION -->
        <section id="pipeline" class="py-24 bg-terracotta-950 text-peach-100 relative overflow-hidden">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                
                <div class="text-center max-w-3xl mx-auto space-y-4 mb-16">
                    <span class="text-coral-400 font-mono text-xs uppercase tracking-widest font-bold">METODOLOGI KULTURAL</span>
                    <h2 class="font-serif text-3xl sm:text-4xl text-white">
                        4 Pilar Rekayasa <span class="coral-gradient-text">CGI Warisan Budaya</span>
                    </h2>
                    <p class="text-peach-200/80 text-sm sm:text-base font-cultural">
                        Kombinasi ketat antara validasi sejarah bersama kurator dan keahlian komputasi grafis kelas industri.
                    </p>
                </div>

                <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    
                    <!-- Pilar 1 -->
                    <div class="bg-terracotta-900/80 p-8 rounded-3xl border border-coral-800/50 hover:border-coral-500 transition space-y-4">
                        <div class="w-12 h-12 rounded-2xl bg-coral-900/60 text-coral-400 flex items-center justify-center font-mono font-bold text-lg border border-coral-700">
                            01
                        </div>
                        <h3 class="font-serif text-xl font-bold text-white">Riset Filologi &amp; Arkeologi</h3>
                        <p class="text-xs sm:text-sm text-peach-200/80 font-cultural leading-relaxed">
                            Mengkaji naskah lontar purba, arca asli museum, dan literatur sejarah untuk memastikan setiap detail motif dan proporsi memiliki dasar otentik.
                        </p>
                    </div>

                    <!-- Pilar 2 -->
                    <div class="bg-terracotta-900/80 p-8 rounded-3xl border border-coral-800/50 hover:border-coral-500 transition space-y-4">
                        <div class="w-12 h-12 rounded-2xl bg-coral-900/60 text-coral-400 flex items-center justify-center font-mono font-bold text-lg border border-coral-700">
                            02
                        </div>
                        <h3 class="font-serif text-xl font-bold text-white">LiDAR Scan &amp; Photogrammetry</h3>
                        <p class="text-xs sm:text-sm text-peach-200/80 font-cultural leading-relaxed">
                            Pemindaian laser jutaan titik koordinat pada artefak bersejarah untuk mereplikasi tekstur batu andesit, kayu jati tua, dan pigmen warna tradisional.
                        </p>
                    </div>

                    <!-- Pilar 3 -->
                    <div class="bg-terracotta-900/80 p-8 rounded-3xl border border-coral-800/50 hover:border-coral-500 transition space-y-4">
                        <div class="w-12 h-12 rounded-2xl bg-coral-900/60 text-coral-400 flex items-center justify-center font-mono font-bold text-lg border border-coral-700">
                            03
                        </div>
                        <h3 class="font-serif text-xl font-bold text-white">Rigging Kinetik Tradisional</h3>
                        <p class="text-xs sm:text-sm text-peach-200/80 font-cultural leading-relaxed">
                            Pengembangan sistem inverse kinematic khusus yang mengadaptasi gerak sabetan dalang dan gemulai penari keraton dalam ruang 3 dimensi.
                        </p>
                    </div>

                    <!-- Pilar 4 -->
                    <div class="bg-terracotta-900/80 p-8 rounded-3xl border border-coral-800/50 hover:border-coral-500 transition space-y-4">
                        <div class="w-12 h-12 rounded-2xl bg-coral-900/60 text-coral-400 flex items-center justify-center font-mono font-bold text-lg border border-coral-700">
                            04
                        </div>
                        <h3 class="font-serif text-xl font-bold text-white">Komposisi Musik Etnik Dolby</h3>
                        <p class="text-xs sm:text-sm text-peach-200/80 font-cultural leading-relaxed">
                            Desain tata suara spasial 3D menggunakan instrumen gamelan slendro-pelog, suling bambu, dan vokal sinden berkualitas rekaman studio akustik.
                        </p>
                    </div>

                </div>

            </div>
        </section>

        <!-- INTERACTIVE CULTURAL PROJECT & RENDER ESTIMATOR -->
        <section id="estimasi" class="py-24 relative">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                
                <div class="grid lg:grid-cols-12 gap-12 items-center">
                    
                    <!-- Left: Description -->
                    <div class="lg:col-span-5 space-y-5">
                        <span class="text-coral-700 font-mono text-xs uppercase tracking-widest font-bold">
                            INTERACTIVE CULTURAL ESTIMATOR
                        </span>
                        <h2 class="font-serif text-3xl sm:text-4xl text-terracotta-950 leading-tight">
                            Simulasi Estimasi Durasi &amp; <span class="coral-gradient-text">Kompleksitas Render 3D</span>
                        </h2>
                        <p class="text-terracotta-800/85 text-sm sm:text-base font-cultural leading-relaxed">
                            Gunakan kalkulator interaktif kami untuk memperkirakan durasi pengerjaan, jumlah frame produksi, dan spesifikasi render berdasarkan ruang lingkup proyek kultural Anda.
                        </p>

                        <div class="p-5 rounded-2xl bg-coral-100/60 border border-coral-200 space-y-3 font-mono text-xs">
                            <div class="font-bold text-coral-900 flex items-center gap-2">
                                <svg class="w-4 h-4 text-coral-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                Standar Format Deliverable Pusaka:
                            </div>
                            <ul class="space-y-1.5 text-terracotta-800 pl-6 list-disc">
                                <li>Apple ProRes 4444 XQ / Avid DNxHR HQX</li>
                                <li>Master Resolusi 4K (3840x2160) atau 8K DCI</li>
                                <li>Full Stills Render untuk OOH &amp; Cetak Museum (300 DPI)</li>
                                <li>Non-Disclosure Agreement (NDA) Kerahasiaan Hak Cipta</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Right: Calculator Widget -->
                    <div class="lg:col-span-7">
                        <div class="p-8 sm:p-10 rounded-3xl cultural-glass border-2 border-coral-300 shadow-xl space-y-7">
                            
                            <!-- Step 1: Jenis Aset Kultural -->
                            <div>
                                <label class="block font-mono text-xs uppercase tracking-wider text-terracotta-900 font-bold mb-3">
                                    1. Jenis Aset Kultural &amp; Gaya Animasi
                                </label>
                                <div class="grid grid-cols-3 gap-3 text-xs font-mono">
                                    <button type="button" onclick="setAssetType('ornamen')" id="btn-ornamen" class="py-3 px-2 rounded-xl border border-coral-500 bg-terracotta-950 text-peach-200 font-bold text-center transition">
                                        Motif / Batik 3D
                                    </button>
                                    <button type="button" onclick="setAssetType('karakter')" id="btn-karakter" class="py-3 px-2 rounded-xl border border-coral-200 bg-white text-terracotta-800 hover:bg-peach-100 font-semibold text-center transition">
                                        Wayang / Karakter
                                    </button>
                                    <button type="button" onclick="setAssetType('candi')" id="btn-candi" class="py-3 px-2 rounded-xl border border-coral-200 bg-white text-terracotta-800 hover:bg-peach-100 font-semibold text-center transition">
                                        Candi / Archviz
                                    </button>
                                </div>
                            </div>

                            <!-- Step 2: Durasi Animasi -->
                            <div>
                                <div class="flex items-center justify-between mb-2 font-mono text-xs">
                                    <span class="font-bold text-terracotta-900 uppercase tracking-wider">2. Durasi Animasi (Detik)</span>
                                    <span id="label-durasi" class="font-bold text-coral-600 text-sm">30 Detik</span>
                                </div>
                                <input type="range" id="input-durasi" min="15" max="180" step="15" value="30" oninput="calculateEstimate()" 
                                       class="w-full accent-coral-600 bg-coral-200 rounded-lg h-2 cursor-pointer">
                                <div class="flex justify-between text-[10px] font-mono text-terracotta-600 mt-1">
                                    <span>15 Detik (Teaser)</span>
                                    <span>60 Detik (TVC)</span>
                                    <span>180 Detik (Film Pendek)</span>
                                </div>
                            </div>

                            <!-- Step 3: Detail Shading & Engine -->
                            <div>
                                <label class="block font-mono text-xs uppercase tracking-wider text-terracotta-900 font-bold mb-3">
                                    3. Tingkat Resolusi &amp; Pipeline Render
                                </label>
                                <select id="select-engine" onchange="calculateEstimate()" class="w-full py-3 px-4 rounded-xl border border-coral-300 bg-white font-mono text-xs text-terracotta-900 focus:outline-none focus:border-coral-600">
                                    <option value="4k-standard">4K Sinematik — Octane / Redshift Photoreal</option>
                                    <option value="unreal-live">4K Real-Time Interactive — Unreal Engine 5.4 Nanite</option>
                                    <option value="8k-monumental">8K Monumental DCI — IMAX &amp; Candi Projection Mapping</option>
                                </select>
                            </div>

                            <!-- Calculation Result Box -->
                            <div class="p-6 rounded-2xl bg-terracotta-950 text-white font-mono space-y-4 border border-coral-800">
                                <div class="flex items-center justify-between pb-3 border-b border-coral-900 text-xs">
                                    <span class="text-peach-200">Total Frame Produksi (30 FPS):</span>
                                    <span id="hasil-frame" class="font-bold text-coral-400 text-base">900 Frames</span>
                                </div>
                                <div class="flex items-center justify-between pb-3 border-b border-coral-900 text-xs">
                                    <span class="text-peach-200">Estimasi Waktu Pengerjaan:</span>
                                    <span id="hasil-waktu" class="font-bold text-peach-300 text-base">3 - 4 Minggu</span>
                                </div>
                                <div class="flex items-center justify-between text-xs">
                                    <span class="text-peach-200">Rekomendasi Paket:</span>
                                    <span id="hasil-paket" class="font-bold text-coral-300 text-sm">Paket Pusaka Kinetic</span>
                                </div>
                            </div>

                            <div class="text-center pt-2">
                                <a href="#konsultasi" class="inline-flex items-center gap-2 px-8 py-3.5 rounded-xl text-xs font-bold uppercase tracking-wider text-white bg-gradient-to-r from-coral-600 to-peach-600 hover:from-coral-700 hover:to-peach-700 transition shadow-lg shadow-coral-500/25">
                                    <span>Kunci Jadwal Produksi Anda</span>
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                                </a>
                            </div>

                        </div>
                    </div>

                </div>

            </div>
        </section>

        <!-- BESPOKE COLLABORATION TIERS -->
        <section id="layanan" class="py-24 bg-gradient-to-b from-transparent via-peach-100/50 to-transparent">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                
                <div class="text-center max-w-3xl mx-auto space-y-4 mb-16">
                    <span class="text-coral-700 font-mono text-xs uppercase tracking-widest font-bold">PAKET ENGAGEMENT</span>
                    <h2 class="font-serif text-3xl sm:text-4xl text-terracotta-950">
                        Pilihan Kolaborasi <span class="coral-gradient-text">Studio Kultural</span>
                    </h2>
                    <p class="text-terracotta-800/80 text-sm sm:text-base font-cultural">
                        Tiga tingkatan paket produksi motion graphics 3D yang dirancang khusus untuk brand komersial, institusi budaya, dan pagelaran seni akbar.
                    </p>
                </div>

                <div class="grid lg:grid-cols-3 gap-8 items-stretch">
                    
                    <!-- Tier 1 -->
                    <div class="cultural-glass rounded-3xl p-8 border border-coral-200 flex flex-col justify-between space-y-6">
                        <div class="space-y-4">
                            <span class="text-xs font-mono text-coral-700 font-bold uppercase tracking-wider">TIER 01 // BRANDING</span>
                            <h3 class="font-serif text-2xl font-bold text-terracotta-950">Paket Pusaka Kinetic</h3>
                            <p class="text-xs sm:text-sm text-terracotta-800 font-cultural leading-relaxed">
                                Ideal untuk identitas motion brand, video peluncuran produk kemasan bermotif etnik, dan konten media sosial sinematik.
                            </p>
                            <div class="py-4 border-y border-coral-100 font-mono">
                                <span class="text-xs text-terracotta-600 block">Lead-Time Pengerjaan:</span>
                                <span class="font-bold text-terracotta-950 text-base">2 - 3 Minggu Kerja</span>
                            </div>
                            <ul class="space-y-2.5 font-mono text-xs text-terracotta-800">
                                <li class="flex items-center gap-2"><svg class="w-4 h-4 text-coral-600 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> Durasi hingga 30 detik (1080p / 4K)</li>
                                <li class="flex items-center gap-2"><svg class="w-4 h-4 text-coral-600 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> 2 Aset Motif Batik / Etnik Prosedural</li>
                                <li class="flex items-center gap-2"><svg class="w-4 h-4 text-coral-600 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> Sound Design Musik Tradisional Lisensi</li>
                                <li class="flex items-center gap-2"><svg class="w-4 h-4 text-coral-600 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> 2x Putaran Revisi Art Direction</li>
                            </ul>
                        </div>
                        <a href="#konsultasi" class="w-full py-3.5 rounded-xl border border-coral-400 text-coral-800 font-bold font-mono text-xs uppercase tracking-wider text-center hover:bg-coral-600 hover:text-white transition">
                            Pilih Paket Kinetic
                        </a>
                    </div>

                    <!-- Tier 2 (Featured) -->
                    <div class="relative cultural-glass rounded-3xl p-8 border-2 border-coral-500 shadow-2xl flex flex-col justify-between space-y-6 bg-white/90">
                        <div class="absolute -top-3.5 left-1/2 -translate-x-1/2 bg-gradient-to-r from-coral-600 to-peach-600 text-white px-4 py-1 rounded-full font-mono text-[11px] font-bold tracking-widest uppercase shadow-md">
                            PALING POPULER // KOMERSIAL
                        </div>
                        <div class="space-y-4 pt-2">
                            <span class="text-xs font-mono text-coral-700 font-bold uppercase tracking-wider">TIER 02 // CINEMA TVC</span>
                            <h3 class="font-serif text-2xl font-bold text-terracotta-950">Paket Sinema Heritage 3D</h3>
                            <p class="text-xs sm:text-sm text-terracotta-800 font-cultural leading-relaxed">
                                Diformulasikan untuk kampanye iklan komersial TVC nasional, video eksibisi museum interaktif, dan kampanye budaya berskala besar.
                            </p>
                            <div class="py-4 border-y border-coral-200 font-mono">
                                <span class="text-xs text-terracotta-600 block">Lead-Time Pengerjaan:</span>
                                <span class="font-bold text-coral-700 text-base">4 - 6 Minggu Kerja</span>
                            </div>
                            <ul class="space-y-2.5 font-mono text-xs text-terracotta-800">
                                <li class="flex items-center gap-2"><svg class="w-4 h-4 text-coral-600 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> Durasi hingga 60 detik (4K Master ProRes)</li>
                                <li class="flex items-center gap-2"><svg class="w-4 h-4 text-coral-600 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> Karakter Wayang / Kostum Tradisional Rigged</li>
                                <li class="flex items-center gap-2"><svg class="w-4 h-4 text-coral-600 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> Simulasi Fisika Kain &amp; Partikel Atmosfer</li>
                                <li class="flex items-center gap-2"><svg class="w-4 h-4 text-coral-600 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> Musik Orisinil Gamelan Kontemporer 5.1</li>
                                <li class="flex items-center gap-2"><svg class="w-4 h-4 text-coral-600 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> 3x Putaran Revisi Komprehensif</li>
                            </ul>
                        </div>
                        <a href="#konsultasi" class="w-full py-4 rounded-xl bg-gradient-to-r from-coral-600 to-peach-600 text-white font-bold font-mono text-xs uppercase tracking-wider text-center shadow-lg shadow-coral-500/30 hover:opacity-95 transition">
                            Pilih Paket Sinema
                        </a>
                    </div>

                    <!-- Tier 3 -->
                    <div class="cultural-glass rounded-3xl p-8 border border-coral-200 flex flex-col justify-between space-y-6">
                        <div class="space-y-4">
                            <span class="text-xs font-mono text-coral-700 font-bold uppercase tracking-wider">TIER 03 // MONUMENTAL</span>
                            <h3 class="font-serif text-2xl font-bold text-terracotta-950">Paket Masterpiece Immersive</h3>
                            <p class="text-xs sm:text-sm text-terracotta-800 font-cultural leading-relaxed">
                                Produksi visual skala raksasa untuk pemetaan proyeksi gedung purbakala, film dome planetarium, dan metaverse cagar budaya global.
                            </p>
                            <div class="py-4 border-y border-coral-100 font-mono">
                                <span class="text-xs text-terracotta-600 block">Lead-Time Pengerjaan:</span>
                                <span class="font-bold text-terracotta-950 text-base">8 - 12 Minggu Kerja</span>
                            </div>
                            <ul class="space-y-2.5 font-mono text-xs text-terracotta-800">
                                <li class="flex items-center gap-2"><svg class="w-4 h-4 text-coral-600 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> Durasi Custom (8K / 16K Projection Canvas)</li>
                                <li class="flex items-center gap-2"><svg class="w-4 h-4 text-coral-600 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> Full LiDAR Field Survey &amp; Rekonstruksi Sejarah</li>
                                <li class="flex items-center gap-2"><svg class="w-4 h-4 text-coral-600 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> Technical Director On-Site saat Pementasan</li>
                                <li class="flex items-center gap-2"><svg class="w-4 h-4 text-coral-600 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> Penyerahan Source Asset File (USD / FBX)</li>
                            </ul>
                        </div>
                        <a href="#konsultasi" class="w-full py-3.5 rounded-xl border border-coral-400 text-coral-800 font-bold font-mono text-xs uppercase tracking-wider text-center hover:bg-coral-600 hover:text-white transition">
                            Inquiry Masterpiece
                        </a>
                    </div>

                </div>

            </div>
        </section>

        <!-- ETHICS & CLIENT TESTIMONIALS -->
        <section class="py-20 relative">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                
                <div class="grid lg:grid-cols-2 gap-12 items-center">
                    
                    <div class="space-y-6">
                        <span class="text-coral-700 font-mono text-xs uppercase tracking-widest font-bold">ETIKA PELESTARIAN BUDAYA</span>
                        <h2 class="font-serif text-3xl sm:text-4xl text-terracotta-950 leading-tight">
                            Menghormati Marwah Sakral, <br>Mengangkatnya ke <span class="coral-gradient-text">Panggung Masa Depan</span>
                        </h2>
                        <p class="text-terracotta-800/85 font-cultural text-base leading-relaxed">
                            Kami memegang teguh pedoman etika kebudayaan. Setiap visualisasi 3D yang menyentuh simbol sakral, figur leluhur, atau naskah babad purba dikerjakan lewat persetujuan dewan tetua adat serta peneliti arkeologi.
                        </p>
                        
                        <div class="grid grid-cols-2 gap-4 pt-2 font-mono text-xs">
                            <div class="p-4 rounded-xl bg-peach-100/70 border border-coral-200">
                                <div class="font-bold text-coral-800 text-sm">100% Hak Moral Terjaga</div>
                                <div class="text-terracotta-700 text-[11px] mt-1">Atribusi penuh kepada komunitas perajin asli.</div>
                            </div>
                            <div class="p-4 rounded-xl bg-peach-100/70 border border-coral-200">
                                <div class="font-bold text-coral-800 text-sm">Arsip Terenkripsi</div>
                                <div class="text-terracotta-700 text-[11px] mt-1">Data scan artefak terlindungi enkripsi tingkat tinggi.</div>
                            </div>
                        </div>
                    </div>

                    <!-- Testimonial Quote Card -->
                    <div class="cultural-glass p-8 sm:p-10 rounded-3xl border border-coral-300 shadow-xl relative">
                        <div class="text-coral-400 font-serif text-6xl leading-none mb-4">&ldquo;</div>
                        <p class="font-cultural text-base sm:text-lg text-terracotta-900 italic leading-relaxed mb-6">
                            Kolaborasi bersama PusakaMotion pada proyek pameran virtual Candi Sewu mengubah cara generasi muda memandang warisan arsitektur kita. Detail CGI batunya sangat realistis hingga ke lumut dan reliefnya yang lapuk karena waktu.
                        </p>
                        <div class="flex items-center gap-4 pt-4 border-t border-coral-200">
                            <div class="w-12 h-12 rounded-full bg-gradient-to-tr from-coral-500 to-peach-400 flex items-center justify-center font-bold text-white font-serif">
                                DR
                            </div>
                            <div>
                                <div class="font-serif font-bold text-terracotta-950">Dr. Raden Mas Dananjaya</div>
                                <div class="font-mono text-xs text-coral-800">Kurator Arkeologi Digital &bull; Yayasan Kebudayaan Nusantara</div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section>

        <!-- FREQUENTLY ASKED QUESTIONS (ACCORDION) -->
        <section id="faq" class="py-24 bg-gradient-to-b from-transparent via-coral-50/60 to-transparent">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                
                <div class="text-center space-y-3 mb-14">
                    <span class="text-coral-700 font-mono text-xs uppercase tracking-widest font-bold">PERTANYAAN UMUM</span>
                    <h2 class="font-serif text-3xl sm:text-4xl text-terracotta-950">
                        Tanya Jawab Seputar <span class="coral-gradient-text">Produksi 3D Kultural</span>
                    </h2>
                </div>

                <div class="space-y-4" id="faqAccordion">
                    
                    <!-- FAQ 1 -->
                    <div class="cultural-glass rounded-2xl border border-coral-200 overflow-hidden">
                        <button onclick="toggleFaq(1)" class="w-full p-5 text-left font-serif text-base sm:text-lg font-bold text-terracotta-950 flex items-center justify-between gap-4">
                            <span>Bagaimana proses validasi keaslian motif batik atau arsitektur candi yang dimodelkan?</span>
                            <span id="faq-icon-1" class="font-mono text-xl text-coral-600 transition-transform">&plus;</span>
                        </button>
                        <div id="faq-content-1" class="hidden px-5 pb-5 text-xs sm:text-sm text-terracotta-800 font-cultural leading-relaxed border-t border-coral-100 pt-3">
                            Setiap proyek kultural didampingi oleh kurator tradisi dan arkeolog rekanan kami. Kami merujuk pada katalog ragam hias resmi Balai Pelestarian Kebudayaan dan naskah filologi, memastikan ornamen sakral tidak disalahartikan atau ditempatkan sembarangan.
                        </div>
                    </div>

                    <!-- FAQ 2 -->
                    <div class="cultural-glass rounded-2xl border border-coral-200 overflow-hidden">
                        <button onclick="toggleFaq(2)" class="w-full p-5 text-left font-serif text-base sm:text-lg font-bold text-terracotta-950 flex items-center justify-between gap-4">
                            <span>Berapa lama rata-rata durasi pengerjaan video motion graphics 3D bertema budaya?</span>
                            <span id="faq-icon-2" class="font-mono text-xl text-coral-600 transition-transform">&plus;</span>
                        </button>
                        <div id="faq-content-2" class="hidden px-5 pb-5 text-xs sm:text-sm text-terracotta-800 font-cultural leading-relaxed border-t border-coral-100 pt-3">
                            Untuk animasi motion kinetik 30 detik (branding/sosial media), durasi rata-rata adalah 2-3 minggu. Untuk rekayasa penuh karakter wayang rigging atau rekonstruksi cagar budaya beresolusi 4K/8K, durasi berkisar antara 4 hingga 8 minggu kerja.
                        </div>
                    </div>

                    <!-- FAQ 3 -->
                    <div class="cultural-glass rounded-2xl border border-coral-200 overflow-hidden">
                        <button onclick="toggleFaq(3)" class="w-full p-5 text-left font-serif text-base sm:text-lg font-bold text-terracotta-950 flex items-center justify-between gap-4">
                            <span>Apakah kami menerima file mentah 3D (source files) setelah proyek selesai?</span>
                            <span id="faq-icon-3" class="font-mono text-xl text-coral-600 transition-transform">&plus;</span>
                        </button>
                        <div id="faq-content-3" class="hidden px-5 pb-5 text-xs sm:text-sm text-terracotta-800 font-cultural leading-relaxed border-t border-coral-100 pt-3">
                            Ya, pada paket Masterpiece Immersive atau dengan opsi buy-out aset pada kontrak kolaborasi. Kami menyediakan file siap buka dalam format FBX, USD, GLB, maupun project files Unreal Engine / Blender yang tertata rapi.
                        </div>
                    </div>

                    <!-- FAQ 4 -->
                    <div class="cultural-glass rounded-2xl border border-coral-200 overflow-hidden">
                        <button onclick="toggleFaq(4)" class="w-full p-5 text-left font-serif text-base sm:text-lg font-bold text-terracotta-950 flex items-center justify-between gap-4">
                            <span>Bagaimana dengan hak cipta dan perlindungan kerahasiaan materi (NDA)?</span>
                            <span id="faq-icon-4" class="font-mono text-xl text-coral-600 transition-transform">&plus;</span>
                        </button>
                        <div id="faq-content-4" class="hidden px-5 pb-5 text-xs sm:text-sm text-terracotta-800 font-cultural leading-relaxed border-t border-coral-100 pt-3">
                            Kami selalu menandatangani Non-Disclosure Agreement (NDA) sebelum menerima materi brief dari klien. Hak cipta komersial hasil akhir sepenuhnya dialihkan kepada Anda sesuai klausul perjanjian kerja sama.
                        </div>
                    </div>

                    <!-- FAQ 5 -->
                    <div class="cultural-glass rounded-2xl border border-coral-200 overflow-hidden">
                        <button onclick="toggleFaq(5)" class="w-full p-5 text-left font-serif text-base sm:text-lg font-bold text-terracotta-950 flex items-center justify-between gap-4">
                            <span>Apakah musik dan sound effects gamelan yang digunakan bebas klaim hak cipta?</span>
                            <span id="faq-icon-5" class="font-mono text-xl text-coral-600 transition-transform">&plus;</span>
                        </button>
                        <div id="faq-content-5" class="hidden px-5 pb-5 text-xs sm:text-sm text-terracotta-800 font-cultural leading-relaxed border-t border-coral-100 pt-3">
                            Seluruh musik dikomposisi secara orisinil oleh sound designer etnomusikologi kami dengan rekaman instrumen hidup di studio kami, bebas royalti (royalty-free commercial license) untuk penayangan global di bioskop, televisi, dan internet.
                        </div>
                    </div>

                </div>

            </div>
        </section>

        <!-- PRIVATE CREATIVE BRIEF FORM & CONTACT -->
        <section id="konsultasi" class="py-24 relative">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                
                <div class="p-8 sm:p-12 rounded-3xl cultural-glass border-2 border-coral-300 shadow-2xl relative overflow-hidden">
                    
                    <div class="text-center max-w-xl mx-auto space-y-3 mb-10">
                        <span class="text-coral-700 font-mono text-xs uppercase tracking-widest font-bold">KOLABORASI EKSKLUSIF</span>
                        <h2 class="font-serif text-3xl sm:text-4xl text-terracotta-950">
                            Mulai Proyek 3D <span class="coral-gradient-text">Pusaka Anda</span>
                        </h2>
                        <p class="text-terracotta-800/80 font-cultural text-xs sm:text-sm">
                            Kirimkan intisari visi proyek Anda. Tim Creative Director kami akan merespons dalam 1x24 jam kerja dengan proposal pipeline dan jadwal konsultasi privat.
                        </p>
                    </div>

                    <form id="briefForm" onsubmit="handleBriefSubmit(event)" class="space-y-6">
                        
                        <div class="grid sm:grid-cols-2 gap-6">
                            <div>
                                <label class="block font-mono text-xs uppercase tracking-wider text-terracotta-900 font-bold mb-2">Nama Lengkap / Instansi</label>
                                <input type="text" required placeholder="Contoh: Sanggar Seni Nusantara" class="w-full px-4 py-3 rounded-xl border border-coral-300 bg-white/90 text-sm focus:outline-none focus:border-coral-600 text-terracotta-950 font-sans">
                            </div>
                            <div>
                                <label class="block font-mono text-xs uppercase tracking-wider text-terracotta-900 font-bold mb-2">Email Profesional</label>
                                <input type="email" required placeholder="director@studio.id" class="w-full px-4 py-3 rounded-xl border border-coral-300 bg-white/90 text-sm focus:outline-none focus:border-coral-600 text-terracotta-950 font-sans">
                            </div>
                        </div>

                        <div class="grid sm:grid-cols-2 gap-6">
                            <div>
                                <label class="block font-mono text-xs uppercase tracking-wider text-terracotta-900 font-bold mb-2">Nomor WhatsApp Aktif</label>
                                <input type="tel" required placeholder="+62 812-xxxx-xxxx" class="w-full px-4 py-3 rounded-xl border border-coral-300 bg-white/90 text-sm focus:outline-none focus:border-coral-600 text-terracotta-950 font-sans">
                            </div>
                            <div>
                                <label class="block font-mono text-xs uppercase tracking-wider text-terracotta-900 font-bold mb-2">Tipe Proyek Budaya</label>
                                <select class="w-full px-4 py-3 rounded-xl border border-coral-300 bg-white/90 text-sm focus:outline-none focus:border-coral-600 text-terracotta-950 font-sans">
                                    <option>Video Iklan Komersial TVC Tradisi</option>
                                    <option>Rekonstruksi Arsitektur Candi &amp; Keraton</option>
                                    <option>Animasi Tokoh Wayang Kulit 3D</option>
                                    <option>Projection Mapping Monumen / Cagar Budaya</option>
                                    <option>Metaverse &amp; Museum Digital AR/VR</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label class="block font-mono text-xs uppercase tracking-wider text-terracotta-900 font-bold mb-2">Ceritakan Ringkasan Visi &amp; Narasi Budaya Proyek</label>
                            <textarea rows="4" required placeholder="Jelaskan inspirasi budaya, target penayangan, estimasi durasi, dan jadwal rilis yang diinginkan..." class="w-full px-4 py-3 rounded-xl border border-coral-300 bg-white/90 text-sm focus:outline-none focus:border-coral-600 text-terracotta-950 font-sans"></textarea>
                        </div>

                        <div class="flex items-center gap-3">
                            <input type="checkbox" id="ndaCheck" checked class="w-4 h-4 rounded text-coral-600 accent-coral-600 border-coral-300">
                            <label for="ndaCheck" class="text-xs font-mono text-terracotta-800">
                                Sertakan draf Non-Disclosure Agreement (NDA) sebelum pembahasan teknis rahasia.
                            </label>
                        </div>

                        <button type="submit" class="w-full py-4 rounded-xl bg-gradient-to-r from-coral-600 via-coral-700 to-peach-600 text-white font-bold font-mono text-xs uppercase tracking-widest shadow-xl shadow-coral-500/25 hover:opacity-95 transition">
                            Kirim Brief Proyek Kultural &rarr;
                        </button>
                    </form>

                    <!-- Success State -->
                    <div id="brief-success" class="hidden mt-6 p-6 rounded-2xl bg-coral-100 border border-coral-300 text-center space-y-2">
                        <div class="w-10 h-10 rounded-full bg-coral-600 text-white flex items-center justify-center mx-auto font-bold text-lg">✓</div>
                        <h4 class="font-serif font-bold text-terracotta-950 text-base">Brief Berhasil Diterima</h4>
                        <p class="text-xs font-cultural text-terracotta-800">
                            Creative Director PusakaMotion akan segera menghubungi Anda melalui WhatsApp dan Email resmi.
                        </p>
                    </div>

                </div>

            </div>
        </section>

    </main>

    <!-- FOOTER: TRADITIONAL CULTURAL HERITAGE BRANDING -->
    <footer class="bg-terracotta-950 text-peach-200 pt-16 pb-12 border-t-2 border-coral-600 relative z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-10 pb-12 border-b border-coral-900/60">
                
                <!-- Col 1: Brand Info -->
                <div class="lg:col-span-2 space-y-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-2xl bg-gradient-to-br from-coral-500 to-peach-500 flex items-center justify-center text-white shadow-md">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
                            </svg>
                        </div>
                        <span class="font-serif text-xl tracking-wider font-bold text-white block">
                            PUSAKA<span class="text-coral-400">MOTION</span>
                        </span>
                    </div>
                    <p class="text-xs sm:text-sm text-peach-200/80 font-cultural leading-relaxed max-w-sm">
                        Agensi rekayasa 3D dan animasi gerak kinetik terdepan yang mendedikasikan komputasi grafis fotorealistik untuk memuliakan pusaka kebudayaan Nusantara ke kancah peradaban dunia.
                    </p>
                    <div class="text-[11px] font-mono text-coral-400">
                        YOGYAKARTA &bull; DENPASAR &bull; JAKARTA &bull; BANDUNG
                    </div>
                </div>

                <!-- Col 2: Eksplorasi Karya -->
                <div class="space-y-3 font-sans text-xs">
                    <div class="font-mono font-bold uppercase tracking-wider text-white">Karya Unggulan</div>
                    <ul class="space-y-2 text-peach-200/80 font-cultural">
                        <li><a href="#showreel" class="hover:text-coral-400 transition">Showreel Borobudur 8K</a></li>
                        <li><a href="#portfolio" class="hover:text-coral-400 transition">Candi Prambanan CGI</a></li>
                        <li><a href="#portfolio" class="hover:text-coral-400 transition">Kinetik Geometri Kawung</a></li>
                        <li><a href="#portfolio" class="hover:text-coral-400 transition">Projection GWK Bali</a></li>
                        <li><a href="#portfolio" class="hover:text-coral-400 transition">Wayang Batara Guru 3D</a></li>
                    </ul>
                </div>

                <!-- Col 3: Solusi Kultural -->
                <div class="space-y-3 font-sans text-xs">
                    <div class="font-mono font-bold uppercase tracking-wider text-white">Layanan Studio</div>
                    <ul class="space-y-2 text-peach-200/80 font-cultural">
                        <li><a href="#layanan" class="hover:text-coral-400 transition">Paket Pusaka Kinetic</a></li>
                        <li><a href="#layanan" class="hover:text-coral-400 transition">Sinema TVC Heritage 3D</a></li>
                        <li><a href="#layanan" class="hover:text-coral-400 transition">Masterpiece Projection</a></li>
                        <li><a href="#pipeline" class="hover:text-coral-400 transition">LiDAR Field Scanning</a></li>
                        <li><a href="#estimasi" class="hover:text-coral-400 transition">Kalkulator Estimasi Render</a></li>
                    </ul>
                </div>

                <!-- Col 4: Kontak Cepat -->
                <div class="space-y-3 font-sans text-xs">
                    <div class="font-mono font-bold uppercase tracking-wider text-white">Hubungi Kami</div>
                    <ul class="space-y-2 text-peach-200/80 font-mono text-[11px]">
                        <li>Email: brief@pusakamotion.id</li>
                        <li>WA: +62 812-3456-7890</li>
                        <li>Studio: Jl. Tirtodipuran No. 45, Mantrijeron, D.I. Yogyakarta 55143</li>
                        <li>Senin &ndash; Jumat (09:00 &ndash; 18:00 WIB)</li>
                    </ul>
                </div>

            </div>

            <!-- Bottom Copyright & Credit -->
            <div class="pt-8 flex flex-col sm:flex-row items-center justify-between gap-4 font-mono text-[11px] text-peach-300/70">
                <div>
                    &copy; {{ date('Y') }} PusakaMotion 3D Studio. Hak Cipta Dilindungi Undang-Undang.
                </div>
                <div class="flex items-center gap-4">
                    <span>Traditional / Cultural &bull; Coral &amp; Peach Edition</span>
                    <a href="#" class="hover:text-coral-400 transition">Kode Etik Tradisi</a>
                    <a href="#" class="hover:text-coral-400 transition">Kebijakan Privasi</a>
                </div>
            </div>

        </div>
    </footer>

    <!-- FLOATING WHATSAPP BUTTON -->
    <a href="https://wa.me/6281234567890?text=Halo%20PusakaMotion%203D%20Studio,%20saya%20ingin%20berkonsultasi%20mengenai%20proyek%20motion%20graphics%20dan%20animasi%203D%20kultural." 
       target="_blank" 
       rel="noopener"
       aria-label="Hubungi WhatsApp Studio"
       class="fixed bottom-6 right-6 z-50 p-3.5 rounded-full bg-gradient-to-tr from-coral-600 to-peach-500 text-white shadow-2xl shadow-coral-600/50 hover:scale-110 active:scale-95 transition-all flex items-center justify-center border-2 border-white/80">
        <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.662.591 1.221.774 1.394.86s.275.072.376-.043c.101-.116.433-.506.549-.68.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.043.073.043.419-.101.825z"/></svg>
    </a>

    <!-- FLOATING PUSAKAAI MODAL -->
    <div id="pusaka-ai-modal" class="fixed inset-0 z-50 bg-terracotta-950/70 backdrop-blur-sm hidden items-center justify-center p-4">
        <div class="cultural-glass w-full max-w-lg rounded-3xl border-2 border-coral-400 p-6 space-y-4 shadow-2xl bg-white">
            <div class="flex items-center justify-between pb-3 border-b border-coral-200">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 rounded-xl bg-coral-600 text-white flex items-center justify-center font-bold text-xs">ꦥ</div>
                    <span class="font-serif font-bold text-terracotta-950 text-sm">PusakaAI Creative Assistant</span>
                </div>
                <button onclick="closePusakaAI()" class="text-terracotta-600 hover:text-coral-600 font-mono text-lg font-bold">&times;</button>
            </div>
            
            <div id="pusaka-chat-stream" class="h-64 overflow-y-auto space-y-3 font-sans text-xs pr-2">
                <div class="p-3 rounded-2xl bg-peach-100 border border-coral-200 text-terracotta-900">
                    <strong>PusakaAI:</strong> Rahayu! Saya asisten cerdas PusakaMotion. Anda dapat menanyakan estimasi durasi render, teknik fotogrametri candi, legalitas ornamen tradisional, atau format deliverable 4K/8K.
                </div>
            </div>

            <!-- Preset Quick Prompts -->
            <div class="flex flex-wrap gap-1.5 font-mono text-[10px]">
                <button onclick="askPusakaPreset('Berapa lama render 3D wayang kulit?')" class="px-2.5 py-1 rounded-full bg-coral-100 text-coral-800 hover:bg-coral-200 transition">Durasi Render Wayang?</button>
                <button onclick="askPusakaPreset('Format master apa yang diserahkan?')" class="px-2.5 py-1 rounded-full bg-coral-100 text-coral-800 hover:bg-coral-200 transition">Format Master File?</button>
                <button onclick="askPusakaPreset('Apakah ada klausul NDA rahasia dagang?')" class="px-2.5 py-1 rounded-full bg-coral-100 text-coral-800 hover:bg-coral-200 transition">Perjanjian NDA?</button>
            </div>

            <!-- Chat Input -->
            <div class="flex gap-2 pt-2">
                <input type="text" id="ai-chat-input" placeholder="Tanyakan seputar produksi 3D kultural..." onkeydown="if(event.key === 'Enter') sendPusakaMessage()" class="flex-1 px-4 py-2.5 rounded-xl border border-coral-300 text-xs focus:outline-none focus:border-coral-600">
                <button onclick="sendPusakaMessage()" class="px-4 py-2.5 rounded-xl bg-coral-600 text-white font-mono text-xs font-bold hover:bg-coral-700 transition">Kirim</button>
            </div>
        </div>
    </div>

    <!-- PROJECT DETAIL MODAL -->
    <div id="project-modal" class="fixed inset-0 z-50 bg-terracotta-950/75 backdrop-blur-sm hidden items-center justify-center p-4">
        <div class="cultural-glass w-full max-w-lg rounded-3xl border-2 border-coral-400 p-6 space-y-4 shadow-2xl bg-white">
            <div class="flex items-center justify-between pb-3 border-b border-coral-200">
                <h4 id="modal-project-title" class="font-serif font-bold text-terracotta-950 text-lg">Judul Proyek</h4>
                <button onclick="closeProjectModal()" class="text-terracotta-600 hover:text-coral-600 font-mono text-xl font-bold">&times;</button>
            </div>
            <p id="modal-project-desc" class="text-xs sm:text-sm font-cultural text-terracotta-800 leading-relaxed"></p>
            <div class="p-4 rounded-xl bg-peach-50 border border-coral-200 font-mono text-xs text-coral-900 space-y-1">
                <div>✓ Pipeline: Maya / Houdini / Octane / UE 5.4</div>
                <div>✓ Lisensi: Hak Siar Komersial Global</div>
                <div>✓ Master: ProRes 4444 XQ &bull; OpenEXR 32-bit Float</div>
            </div>
            <div class="flex justify-end gap-3 pt-2">
                <button onclick="closeProjectModal()" class="px-4 py-2 rounded-xl border border-coral-300 font-mono text-xs font-bold text-terracotta-800 hover:bg-peach-100">Tutup</button>
                <a href="#konsultasi" onclick="closeProjectModal()" class="px-4 py-2 rounded-xl bg-coral-600 text-white font-mono text-xs font-bold hover:bg-coral-700">Inquiry Proyek Serupa &rarr;</a>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT LOGIC -->
    <script>
        // Mobile Menu Drawer Toggle
        function toggleMobileMenu() {
            const m = document.getElementById('mobile-menu');
            m.classList.toggle('hidden');
        }

        // Hero 3D Canvas Visualizer (Mandala & Rotating Cultural Polygons in Coral & Peach)
        const canvas = document.getElementById('heroCanvas');
        const ctx = canvas ? canvas.getContext('2d') : null;
        let animationId;
        let angle = 0;
        let rotSpeed = 0.008;

        function resizeCanvas() {
            if (!canvas) return;
            canvas.width = canvas.parentElement.clientWidth;
            canvas.height = canvas.parentElement.clientHeight;
        }

        window.addEventListener('resize', resizeCanvas);
        resizeCanvas();

        function drawCultural3DScene() {
            if (!ctx || !canvas) return;
            ctx.clearRect(0, 0, canvas.width, canvas.height);

            const cx = canvas.width / 2;
            const cy = canvas.height / 2;
            const maxRadius = Math.min(cx, cy) * 0.78;

            // Draw Subtle Concentric Mandala Rings in Coral & Peach
            for (let r = 40; r <= maxRadius; r += 35) {
                ctx.beginPath();
                ctx.arc(cx, cy, r, 0, Math.PI * 2);
                ctx.strokeStyle = 'rgba(255, 134, 92, 0.15)';
                ctx.lineWidth = 1;
                ctx.stroke();
            }

            // Draw Rotating 8-Point Stupa / Mandala Geometry
            const points = 8;
            ctx.save();
            ctx.translate(cx, cy);
            ctx.rotate(angle);

            ctx.beginPath();
            for (let i = 0; i <= points; i++) {
                const a = (i * 2 * Math.PI) / points;
                const rad = i % 2 === 0 ? maxRadius : maxRadius * 0.55;
                const x = Math.cos(a) * rad;
                const y = Math.sin(a) * rad;
                if (i === 0) ctx.moveTo(x, y);
                else ctx.lineTo(x, y);
            }
            ctx.closePath();
            ctx.strokeStyle = 'rgba(240, 100, 87, 0.75)';
            ctx.lineWidth = 2;
            ctx.shadowColor = '#f06457';
            ctx.shadowBlur = 12;
            ctx.stroke();

            // Inner Flower / Kawung Cross
            ctx.rotate(-angle * 1.8);
            ctx.beginPath();
            for (let j = 0; j < 4; j++) {
                const radAngle = (j * Math.PI) / 2;
                const px = Math.cos(radAngle) * (maxRadius * 0.45);
                const py = Math.sin(radAngle) * (maxRadius * 0.45);
                ctx.arc(px, py, maxRadius * 0.35, 0, Math.PI * 2);
            }
            ctx.strokeStyle = 'rgba(255, 164, 132, 0.6)';
            ctx.lineWidth = 1.5;
            ctx.stroke();

            // Center Core Core Particle
            ctx.beginPath();
            ctx.arc(0, 0, 7, 0, Math.PI * 2);
            ctx.fillStyle = '#ff865c';
            ctx.shadowColor = '#ffa484';
            ctx.shadowBlur = 16;
            ctx.fill();

            ctx.restore();

            angle += rotSpeed;
            animationId = requestAnimationFrame(drawCultural3DScene);
        }

        if (canvas) {
            drawCultural3DScene();
        }

        function rotateCanvasSubject() {
            rotSpeed = rotSpeed === 0.008 ? 0.03 : 0.008;
        }

        // Showreel Filter Switcher
        function filterReel(cat, btn) {
            document.querySelectorAll('.reel-tab').forEach(b => {
                b.className = 'reel-tab px-4 py-2 rounded-xl bg-white border border-coral-200 text-terracotta-800 font-semibold hover:bg-peach-100 transition';
            });
            btn.className = 'reel-tab px-4 py-2 rounded-xl bg-coral-600 text-white font-bold transition shadow-sm';

            const title = document.getElementById('reelTitle');
            const poster = document.getElementById('reelPoster');

            if (cat === 'candi') {
                title.innerText = 'Candi Borobudur & Prambanan: Rekonstruksi Laser 8K DCI';
                poster.src = 'https://images.unsplash.com/photo-1596402184320-417e7178b2cd?auto=format&fit=crop&w=1600&q=80';
            } else if (cat === 'wayang') {
                title.innerText = 'Babad Bharatayuddha: Karakter Rigging Digital Wayang Purwa';
                poster.src = 'https://images.unsplash.com/photo-1578328819058-b69f3a3b0f6b?auto=format&fit=crop&w=1600&q=80';
            } else if (cat === 'batik') {
                title.innerText = 'Kinetika Megamendung & Parang: Fisika Partikel Serat Tekstil';
                poster.src = 'https://images.unsplash.com/photo-1607604276583-eef5d076aa5f?auto=format&fit=crop&w=1600&q=80';
            } else {
                title.innerText = 'Simfoni Pusaka: Kisah 1.000 Relief Menari dalam CGI';
                poster.src = 'https://images.unsplash.com/photo-1596402184320-417e7178b2cd?auto=format&fit=crop&w=1600&q=80';
            }
        }

        function playShowreelModal() {
            alert('Memutar Master Video Pusaka 4K HDR dalam mode sinematik audio Dolby Atmos.');
        }

        // Portfolio Filter Switcher
        function filterPortfolio(category, btn) {
            document.querySelectorAll('.port-filter').forEach(b => {
                b.className = 'port-filter px-3.5 py-1.5 rounded-lg bg-white border border-coral-200 text-terracotta-800 hover:bg-coral-50 transition';
            });
            btn.className = 'port-filter px-3.5 py-1.5 rounded-lg bg-coral-600 text-white font-bold transition';

            document.querySelectorAll('.port-card').forEach(card => {
                const cardCat = card.getAttribute('data-cat');
                if (category === 'all' || cardCat === category) {
                    card.classList.remove('hidden');
                } else {
                    card.classList.add('hidden');
                }
            });
        }

        // Interactive Project Estimator
        let currentAsset = 'ornamen';

        function setAssetType(type) {
            currentAsset = type;
            ['ornamen', 'karakter', 'candi'].forEach(t => {
                const b = document.getElementById('btn-' + t);
                if (t === type) {
                    b.className = 'py-3 px-2 rounded-xl border border-coral-500 bg-terracotta-950 text-peach-200 font-bold text-center transition';
                } else {
                    b.className = 'py-3 px-2 rounded-xl border border-coral-200 bg-white text-terracotta-800 hover:bg-peach-100 font-semibold text-center transition';
                }
            });
            calculateEstimate();
        }

        function calculateEstimate() {
            const sec = parseInt(document.getElementById('input-durasi').value);
            document.getElementById('label-durasi').innerText = sec + ' Detik';

            const frames = sec * 30;
            document.getElementById('hasil-frame').innerText = frames.toLocaleString() + ' Frames';

            let waktu = '2 - 3 Minggu';
            let paket = 'Paket Pusaka Kinetic';

            if (currentAsset === 'ornamen') {
                if (sec <= 30) {
                    waktu = '2 - 3 Minggu';
                    paket = 'Paket Pusaka Kinetic';
                } else if (sec <= 60) {
                    waktu = '3 - 4 Minggu';
                    paket = 'Paket Sinema Heritage 3D';
                } else {
                    waktu = '5 - 6 Minggu';
                    paket = 'Paket Masterpiece Immersive';
                }
            } else if (currentAsset === 'karakter') {
                if (sec <= 30) {
                    waktu = '3 - 4 Minggu';
                    paket = 'Paket Sinema Heritage 3D';
                } else {
                    waktu = '5 - 7 Minggu';
                    paket = 'Paket Sinema Heritage 3D / Masterpiece';
                }
            } else { // candi / archviz
                if (sec <= 30) {
                    waktu = '4 - 5 Minggu';
                    paket = 'Paket Sinema Heritage 3D';
                } else {
                    waktu = '8 - 12 Minggu';
                    paket = 'Paket Masterpiece Immersive';
                }
            }

            document.getElementById('hasil-waktu').innerText = waktu;
            document.getElementById('hasil-paket').innerText = paket;
        }

        // Accordion Logic
        function toggleFaq(id) {
            const content = document.getElementById('faq-content-' + id);
            const icon = document.getElementById('faq-icon-' + id);
            if (content.classList.contains('hidden')) {
                content.classList.remove('hidden');
                icon.innerHTML = '&minus;';
            } else {
                content.classList.add('hidden');
                icon.innerHTML = '&plus;';
            }
        }

        // Brief Submission
        function handleBriefSubmit(e) {
            e.preventDefault();
            document.getElementById('briefForm').classList.add('opacity-50', 'pointer-events-none');
            setTimeout(() => {
                document.getElementById('brief-success').classList.remove('hidden');
            }, 400);
        }

        // Project Modal
        function openProjectModal(title, desc) {
            document.getElementById('modal-project-title').innerText = title;
            document.getElementById('modal-project-desc').innerText = desc;
            document.getElementById('project-modal').classList.remove('hidden');
            document.getElementById('project-modal').classList.add('flex');
        }

        function closeProjectModal() {
            document.getElementById('project-modal').classList.add('hidden');
            document.getElementById('project-modal').classList.remove('flex');
        }

        // PusakaAI Modal
        function openPusakaAI() {
            document.getElementById('pusaka-ai-modal').classList.remove('hidden');
            document.getElementById('pusaka-ai-modal').classList.add('flex');
        }

        function closePusakaAI() {
            document.getElementById('pusaka-ai-modal').classList.add('hidden');
            document.getElementById('pusaka-ai-modal').classList.remove('flex');
        }

        function askPusakaPreset(text) {
            document.getElementById('ai-chat-input').value = text;
            sendPusakaMessage();
        }

        function sendPusakaMessage() {
            const input = document.getElementById('ai-chat-input');
            const stream = document.getElementById('pusaka-chat-stream');
            const val = input.value.trim();
            if (!val) return;

            // User Message
            const userMsg = document.createElement('div');
            userMsg.className = 'p-3 rounded-2xl bg-coral-100 border border-coral-200 text-right text-terracotta-900';
            userMsg.innerHTML = '<strong>Anda:</strong> ' + val;
            stream.appendChild(userMsg);

            input.value = '';
            stream.scrollTop = stream.scrollHeight;

            // AI Response simulation
            setTimeout(() => {
                let ans = 'PusakaMotion siap mendiskusikan kebutuhan visual 3D kultural Anda bersama tim Art Direction dan Etnomusikolog kami.';
                const low = val.toLowerCase();
                if (low.includes('durasi') || low.includes('wayang') || low.includes('lama')) {
                    ans = 'Untuk karakter Wayang 3D rigged ekspresif, proses modeling dan rigging memakan waktu 2-3 minggu, diikuti animasi dan lighting render 1-2 minggu.';
                } else if (low.includes('format') || low.includes('master')) {
                    ans = 'Kami menyerahkan deliverable standar industri: Apple ProRes 4444 XQ, OpenEXR 32-bit floating point, audio uncompressed 48kHz/24-bit, dan file 3D USD/FBX.';
                } else if (low.includes('nda') || low.includes('rahasia')) {
                    ans = 'Kami selalu menandatangani Non-Disclosure Agreement (NDA) resmi sebelum menerima materi naskah atau CAD untuk memastikan keamanan mutlak hak cipta Anda.';
                }

                const aiMsg = document.createElement('div');
                aiMsg.className = 'p-3 rounded-2xl bg-peach-100 border border-coral-200 text-terracotta-900';
                aiMsg.innerHTML = '<strong>PusakaAI:</strong> ' + ans;
                stream.appendChild(aiMsg);
                stream.scrollTop = stream.scrollHeight;
            }, 450);
        }
    </script>

</body>
</html>
