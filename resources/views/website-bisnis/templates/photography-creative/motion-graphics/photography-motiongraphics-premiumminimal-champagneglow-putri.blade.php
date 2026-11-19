<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AuraMotion 3D Studio — Motion Graphics &amp; 3D Studio Premium Minimal Champagne Glow</title>
    <meta name="description" content="AuraMotion 3D Studio adalah agensi kreatif motion graphics dan visualisasi 3D premium minimal dengan estetika Champagne Glow. Menghadirkan CGI produk fotorealistik, animasi kinetik, dan visual direction kelas dunia.">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&family=Italiana&family=Space+Grotesk:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                        serif: ['"Italiana"', 'serif'],
                        display: ['"Space Grotesk"', 'sans-serif'],
                        mono: ['"JetBrains Mono"', 'monospace'],
                    },
                    colors: {
                        champagne: {
                            50: '#fdfbf7',
                            100: '#faf5eb',
                            200: '#f3e8d2',
                            300: '#ebd6b3',
                            400: '#dfbf8d',
                            500: '#d1a768',
                            600: '#be8f4f',
                            700: '#9e733e',
                            800: '#815c36',
                            900: '#694b2f',
                            950: '#3a2717',
                        },
                        obsidian: {
                            900: '#141210',
                            950: '#0a0908',
                        }
                    },
                    animation: {
                        'glow-pulse': 'glowPulse 6s ease-in-out infinite',
                        'float-subtle': 'floatSubtle 7s ease-in-out infinite',
                    },
                    keyframes: {
                        glowPulse: {
                            '0%, 100%': { opacity: '0.45', transform: 'scale(1)' },
                            '50%': { opacity: '0.8', transform: 'scale(1.04)' },
                        },
                        floatSubtle: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-8px)' },
                        }
                    }
                }
            }
        }
    </script>

    <style>
        .champagne-silk-bg {
            background-color: #faf7f2;
            background-image: 
                radial-gradient(at 0% 0%, rgba(243, 232, 210, 0.5) 0px, transparent 50%),
                radial-gradient(at 100% 0%, rgba(209, 167, 104, 0.18) 0px, transparent 50%),
                radial-gradient(at 50% 100%, rgba(243, 232, 210, 0.4) 0px, transparent 60%);
        }
        .luxury-glass {
            background: rgba(255, 255, 255, 0.75);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(223, 191, 141, 0.35);
            transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .luxury-glass:hover {
            border-color: rgba(209, 167, 104, 0.7);
            box-shadow: 0 16px 36px -10px rgba(158, 115, 62, 0.15);
            transform: translateY(-3px);
        }
        .glow-champagne {
            box-shadow: 0 0 45px -10px rgba(209, 167, 104, 0.35);
        }
        .text-champagne-gradient {
            background: linear-gradient(135deg, #815c36 0%, #be8f4f 50%, #d1a768 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
</head>

<body class="bg-champagne-50 text-stone-800 font-sans antialiased overflow-x-hidden champagne-silk-bg selection:bg-champagne-300 selection:text-stone-900">

    <!-- ATMOSPHERIC GLOWS -->
    <div class="fixed inset-0 pointer-events-none z-0 overflow-hidden">
        <div class="absolute -top-40 right-10 w-[550px] h-[550px] bg-champagne-300/25 rounded-full blur-[140px] animate-glow-pulse"></div>
        <div class="absolute top-1/2 -left-40 w-[600px] h-[600px] bg-champagne-200/30 rounded-full blur-[160px] animate-float-subtle"></div>
    </div>

    <!-- TOPBAR: STUDIO REEL & GLOBAL TELEMETRY -->
    <aside aria-label="Studio Announcement" class="relative z-50 bg-stone-950 text-champagne-200 text-xs py-2.5 px-4 border-b border-champagne-900/50">
        <div class="max-w-7xl mx-auto flex flex-wrap items-center justify-between gap-3 font-mono text-[11px]">
            <div class="flex items-center gap-2">
                <span class="inline-flex items-center px-2 py-0.5 rounded-full bg-champagne-900/80 text-champagne-300 border border-champagne-700/60 font-medium">
                    <span class="w-1.5 h-1.5 rounded-full bg-champagne-400 animate-ping mr-1.5"></span>
                    2026 SHOWREEL RELEASED
                </span>
                <span class="hidden sm:inline text-stone-300">Visual Direction &bull; 3D Photorealism &bull; Redshift / Octane 8K Pipeline.</span>
            </div>
            <div class="flex items-center gap-4 text-champagne-300">
                <span>Studio: Jakarta &bull; Singapore</span>
                <a href="#showreel" class="text-white hover:text-champagne-300 underline transition">Tonton Showreel 4K &rarr;</a>
            </div>
        </div>
    </aside>

    <!-- PREMIUM MINIMAL HEADER -->
    <header class="sticky top-0 z-40 bg-champagne-50/85 backdrop-blur-md border-b border-champagne-200/60 transition-all">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
            
            <!-- Brand Logo -->
            <a href="#" class="flex items-center gap-3 group">
                <div class="w-11 h-11 rounded-xl bg-gradient-to-br from-champagne-300 via-champagne-500 to-champagne-700 p-0.5 shadow-sm group-hover:scale-105 transition-transform">
                    <div class="w-full h-full bg-stone-950 rounded-[10px] flex items-center justify-center text-champagne-300">
                        <!-- Minimal Kinetic Icon -->
                        <svg class="w-5 h-5 text-champagne-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 7.5l-9-5.25L3 7.5m18 0l-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" />
                        </svg>
                    </div>
                </div>
                <div>
                    <span class="font-display font-bold text-2xl tracking-tight text-stone-950 flex items-center gap-1">
                        Aura<span class="text-champagne-600 font-serif italic font-normal">Motion</span>
                    </span>
                    <span class="block text-[10px] font-mono uppercase tracking-widest text-champagne-800 -mt-1 font-semibold">
                        3D &amp; Motion Studio
                    </span>
                </div>
            </a>

            <!-- Nav Links -->
            <nav class="hidden md:flex items-center gap-8 text-xs font-mono uppercase tracking-wider text-stone-700">
                <a href="#showreel" class="hover:text-champagne-700 transition">Showreel</a>
                <a href="#layanan" class="hover:text-champagne-700 transition">Disiplin Studio</a>
                <a href="#karya" class="hover:text-champagne-700 transition">Koleksi Karya</a>
                <a href="#estimasi" class="hover:text-champagne-700 transition">Kalkulator Proyek</a>
                <a href="#investasi" class="hover:text-champagne-700 transition">Investasi</a>
                <a href="#faq" class="hover:text-champagne-700 transition">FAQ</a>
            </nav>

            <!-- Actions -->
            <div class="hidden sm:flex items-center gap-3 font-mono">
                <button onclick="openAuraAI()" class="px-4 py-2 rounded-xl text-xs font-semibold text-champagne-900 bg-champagne-200/80 hover:bg-champagne-200 border border-champagne-300 transition flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-champagne-600 animate-pulse"></span>
                    AuraMotion AI
                </button>
                <a href="#konsultasi" class="px-5 py-2.5 rounded-xl text-xs font-bold uppercase tracking-wider text-white bg-stone-900 hover:bg-stone-800 border border-champagne-400/40 transition shadow-sm">
                    Inquiry Proyek &rarr;
                </a>
            </div>

            <!-- Mobile Hamburger -->
            <button onclick="toggleMobileMenu()" class="md:hidden p-2 rounded-xl text-stone-700 hover:bg-champagne-200/50" aria-label="Toggle Menu">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
            </button>
        </div>

        <!-- Mobile Menu Drawer -->
        <div id="mobile-menu" class="hidden md:hidden border-t border-champagne-200 bg-champagne-50/98 px-6 py-6 space-y-4 font-mono text-xs uppercase tracking-wider">
            <a href="#showreel" onclick="toggleMobileMenu()" class="block py-2 text-stone-700 hover:text-champagne-700">Showreel 4K</a>
            <a href="#layanan" onclick="toggleMobileMenu()" class="block py-2 text-stone-700 hover:text-champagne-700">Disiplin Studio 3D</a>
            <a href="#karya" onclick="toggleMobileMenu()" class="block py-2 text-stone-700 hover:text-champagne-700">Koleksi Karya</a>
            <a href="#estimasi" onclick="toggleMobileMenu()" class="block py-2 text-stone-700 hover:text-champagne-700">Kalkulator Proyek</a>
            <a href="#investasi" onclick="toggleMobileMenu()" class="block py-2 text-stone-700 hover:text-champagne-700">Investasi &amp; Paket</a>
            <a href="#faq" onclick="toggleMobileMenu()" class="block py-2 text-stone-700 hover:text-champagne-700">FAQ</a>
            <div class="pt-4 border-t border-champagne-200 flex flex-col gap-2.5">
                <button onclick="openAuraAI(); toggleMobileMenu();" class="w-full py-2.5 rounded-xl text-xs font-semibold text-champagne-900 bg-champagne-200 text-center">Buka AuraMotion AI</button>
                <a href="#konsultasi" onclick="toggleMobileMenu()" class="w-full py-2.5 rounded-xl text-xs font-bold text-white bg-stone-900 text-center uppercase tracking-wider">Inquiry Proyek Privat</a>
            </div>
        </div>
    </header>

    <main class="relative z-10">

        <!-- HERO SECTION: Premium Minimal Champagne Glow -->
        <section class="relative min-h-[88vh] flex items-center justify-center pt-10 pb-20 overflow-hidden">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
                <div class="grid lg:grid-cols-12 gap-12 items-center">
                    
                    <!-- Left Hero Text -->
                    <div class="lg:col-span-7 space-y-6">
                        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-champagne-200/70 border border-champagne-400/50 text-champagne-900 text-[11px] font-mono tracking-widest uppercase">
                            <span class="w-1.5 h-1.5 rounded-full bg-champagne-600"></span>
                            PREMIUM MOTION GRAPHICS &amp; 3D VISUAL STUDIO
                        </div>

                        <h1 class="font-serif text-4xl sm:text-6xl lg:text-7xl text-stone-950 leading-[1.08] tracking-tight">
                            Seni Gerak Presisi,<br>
                            <span class="font-sans font-bold text-champagne-gradient not-italic">
                                Visual 3D Bernilai
                            </span> Tinggi.
                        </h1>

                        <p class="text-base sm:text-lg text-stone-600 font-light leading-relaxed max-w-2xl">
                            AuraMotion merancang pengalaman visual 3D fotorealistik, motion graphics kinetik, dan commercial storytelling tingkat tinggi untuk brand mewah, produk teknologi, dan visual identitas global.
                        </p>

                        <!-- CTA Group -->
                        <div class="pt-2 flex flex-wrap items-center gap-4 font-mono text-xs">
                            <a href="#konsultasi" class="px-7 py-3.5 rounded-xl font-bold uppercase tracking-wider text-white bg-stone-950 hover:bg-stone-900 border border-champagne-400/40 transition shadow-lg glow-champagne flex items-center gap-2">
                                <span>Inquiry Proyek Eksklusif</span>
                                <svg class="w-4 h-4 text-champagne-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                            </a>
                            <a href="#showreel" class="px-6 py-3.5 rounded-xl font-semibold text-stone-800 bg-white/80 hover:bg-white border border-champagne-300 transition flex items-center gap-2">
                                <svg class="w-4 h-4 text-champagne-600" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                <span>Tonton Reel 2026 (01:24)</span>
                            </a>
                        </div>

                        <!-- Studio Trust Numbers -->
                        <div class="pt-8 border-t border-champagne-200/80 grid grid-cols-3 gap-6 font-mono">
                            <div>
                                <div class="font-display font-extrabold text-2xl sm:text-3xl text-stone-900">140+</div>
                                <div class="text-[11px] text-stone-500 uppercase mt-0.5 tracking-wider">Karya Dirilis</div>
                            </div>
                            <div>
                                <div class="font-display font-extrabold text-2xl sm:text-3xl text-champagne-700">8K Cinema</div>
                                <div class="text-[11px] text-stone-500 uppercase mt-0.5 tracking-wider">Render Resolution</div>
                            </div>
                            <div>
                                <div class="font-display font-extrabold text-2xl sm:text-3xl text-stone-900">18 Global</div>
                                <div class="text-[11px] text-stone-500 uppercase mt-0.5 tracking-wider">Design Awards</div>
                            </div>
                        </div>

                    </div>

                    <!-- Right Column: Interactive 3D Reel Viewport Canvas -->
                    <div class="lg:col-span-5 relative" id="showreel">
                        <div class="luxury-glass rounded-3xl p-6 space-y-5 relative overflow-hidden bg-white/85 shadow-xl">
                            
                            <!-- Card Header -->
                            <div class="flex items-center justify-between pb-3 border-b border-champagne-200/70 font-mono text-xs">
                                <div class="flex items-center gap-2">
                                    <span class="w-2.5 h-2.5 rounded-full bg-champagne-600 animate-pulse"></span>
                                    <span class="text-stone-900 font-bold uppercase tracking-wider">3D_VIEWPORT // OC_RENDER</span>
                                </div>
                                <span class="px-2.5 py-0.5 rounded-full bg-champagne-100 text-champagne-900 font-bold text-[10px] border border-champagne-300">
                                    REDSHIFT 8K
                                </span>
                            </div>

                            <!-- Interactive Scene Preview Selector -->
                            <div class="space-y-3">
                                <div class="flex gap-2">
                                    <button onclick="switchHeroScene('watch')" id="btn-scene-watch" class="flex-1 py-1.5 rounded-lg text-xs font-mono font-bold bg-stone-900 text-champagne-200 border border-champagne-400/40 transition">
                                        Luxury Timepiece
                                    </button>
                                    <button onclick="switchHeroScene('perfume')" id="btn-scene-perfume" class="flex-1 py-1.5 rounded-lg text-xs font-mono font-bold bg-champagne-100 text-stone-700 hover:bg-champagne-200 transition">
                                        Haute Parfumerie
                                    </button>
                                    <button onclick="switchHeroScene('kinetic')" id="btn-scene-kinetic" class="flex-1 py-1.5 rounded-lg text-xs font-mono font-bold bg-champagne-100 text-stone-700 hover:bg-champagne-200 transition">
                                        Kinetic Brand
                                    </button>
                                </div>

                                <!-- Dynamic Viewport Box -->
                                <div class="h-60 rounded-2xl bg-stone-950 p-4 border border-champagne-800/60 relative overflow-hidden flex flex-col justify-between text-white font-mono">
                                    <div class="flex justify-between items-start text-[11px] text-champagne-300/80">
                                        <span id="scene-cam">CAM_01 // 85MM T1.5</span>
                                        <span id="scene-fps">60.00 FPS REALTIME</span>
                                    </div>

                                    <!-- Visual Wireframe Simulation Graphic -->
                                    <div class="flex-1 flex items-center justify-center relative">
                                        <div class="w-28 h-28 rounded-full border border-champagne-400/40 animate-spin-slow flex items-center justify-center">
                                            <div class="w-20 h-20 rounded-full border-dashed border border-champagne-300/60 animate-glow-pulse flex items-center justify-center">
                                                <div class="w-10 h-10 bg-gradient-to-tr from-champagne-600 to-champagne-300 rounded-lg rotate-45 shadow-lg shadow-champagne-400/30"></div>
                                            </div>
                                        </div>
                                        <div class="absolute inset-x-0 bottom-2 text-center text-xs font-serif text-champagne-200 italic" id="scene-title">
                                            &ldquo;Chronos Chronograph &mdash; Photoreal Metallic Shader&rdquo;
                                        </div>
                                    </div>

                                    <!-- Render Telemetry Specs -->
                                    <div class="pt-2 border-t border-stone-800 flex justify-between text-[10px] text-stone-400">
                                        <span id="scene-samples">Samples: 4,096 &bull; Ray Depth: 32</span>
                                        <span class="text-champagne-400">Denoise: OptiX AI</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Card Subtext & Direct CTA -->
                            <div class="pt-1 flex items-center justify-between text-xs font-mono">
                                <span class="text-stone-500">Kapasitas Produksi Q1-Q2:</span>
                                <span class="text-champagne-800 font-bold">2 Slot Eksklusif Tersedia</span>
                            </div>

                            <a href="#konsultasi" class="block w-full py-2.5 rounded-xl text-center font-mono text-xs font-bold uppercase tracking-wider text-stone-900 bg-champagne-200 hover:bg-champagne-300 border border-champagne-400 transition">
                                Jadwalkan Creative Direction Brief &rarr;
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- LUXURY BRAND CLIENT MARQUEE -->
        <section class="py-8 bg-stone-950 border-y border-champagne-900/50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <p class="text-center font-mono text-xs uppercase tracking-widest text-champagne-400/70 mb-5">
                    Kolaborasi Visual Studio Terpilih &bull; Global &amp; Luxury Clients
                </p>
                <div class="flex flex-wrap items-center justify-center gap-8 md:gap-14 font-display font-medium text-stone-400 text-sm md:text-base opacity-75">
                    <span class="hover:text-champagne-300 transition tracking-wider flex items-center gap-2">✦ KINETIC AUTOMOTIVE UK</span>
                    <span class="hover:text-champagne-300 transition tracking-wider flex items-center gap-2">✦ VALENCE HAUTE HORLOGERIE</span>
                    <span class="hover:text-champagne-300 transition tracking-wider flex items-center gap-2">✦ ATELIER BOTANICA PARIS</span>
                    <span class="hover:text-champagne-300 transition tracking-wider flex items-center gap-2">✦ NEXUS SPATIAL AUDIO</span>
                    <span class="hover:text-champagne-300 transition tracking-wider flex items-center gap-2">✦ LUMINA ARCHITECTURAL LAB</span>
                </div>
            </div>
        </section>

        <!-- STUDIO DISCIPLINES & SERVICES -->
        <section id="layanan" class="py-24 relative">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                
                <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-16">
                    <div>
                        <span class="text-champagne-800 font-mono text-xs uppercase tracking-widest font-bold">
                            CORE DISCIPLINES
                        </span>
                        <h2 class="font-serif text-3xl sm:text-5xl text-stone-950 mt-1">
                            Disiplin Kreatif Studio
                        </h2>
                    </div>
                    <p class="text-stone-600 text-sm max-w-md font-light leading-relaxed">
                        Kami memadukan teknik rekayasa 3D presisi tinggi dengan kepekaan artistik minimalis untuk menghasilkan dampak visual yang mendalam.
                    </p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    
                    <!-- Discipline 1 -->
                    <div class="luxury-glass rounded-3xl p-8 space-y-4 flex flex-col justify-between">
                        <div class="space-y-4">
                            <span class="font-mono text-xs text-champagne-700 font-bold">01 // PHOTOREAL 3D</span>
                            <h3 class="font-display font-bold text-xl text-stone-950">
                                3D Product Visualization &amp; CGI
                            </h3>
                            <p class="text-xs text-stone-600 font-light leading-relaxed">
                                Render produk fotorealistik dengan akurasi tekstur mikroskopis (metalik, kaca, kulit, dan cairan) untuk peluncuran kampanye komersial global.
                            </p>
                            <ul class="space-y-2 text-xs font-mono text-stone-500 pt-2">
                                <li>&bull; Sub-Surface Scattering Shader</li>
                                <li>&bull; Studio Light Rigging 8K</li>
                                <li>&bull; CAD &amp; NURBS Polygon Topology</li>
                            </ul>
                        </div>
                        <div class="pt-4 border-t border-champagne-200">
                            <span class="font-mono text-[11px] text-champagne-800 font-semibold">Cinema 4D &bull; Houdini &bull; Redshift</span>
                        </div>
                    </div>

                    <!-- Discipline 2 -->
                    <div class="luxury-glass rounded-3xl p-8 space-y-4 flex flex-col justify-between">
                        <div class="space-y-4">
                            <span class="font-mono text-xs text-champagne-700 font-bold">02 // MOTION DIRECTION</span>
                            <h3 class="font-display font-bold text-xl text-stone-950">
                                Kinetic Identity &amp; Typography
                            </h3>
                            <p class="text-xs text-stone-600 font-light leading-relaxed">
                                Gerak tipografi dinamis dan sistem identitas merek animasi yang menyatu dengan audio sound design untuk pameran digital &amp; brand launching.
                            </p>
                            <ul class="space-y-2 text-xs font-mono text-stone-500 pt-2">
                                <li>&bull; Custom Type Choreography</li>
                                <li>&bull; Variable Font Physics Engine</li>
                                <li>&bull; Adaptive Screen Dimension (9:16 - 32:9)</li>
                            </ul>
                        </div>
                        <div class="pt-4 border-t border-champagne-200">
                            <span class="font-mono text-[11px] text-champagne-800 font-semibold">After Effects &bull; TouchDesigner</span>
                        </div>
                    </div>

                    <!-- Discipline 3 -->
                    <div class="luxury-glass rounded-3xl p-8 space-y-4 flex flex-col justify-between">
                        <div class="space-y-4">
                            <span class="font-mono text-xs text-champagne-700 font-bold">03 // SIMULATION</span>
                            <h3 class="font-display font-bold text-xl text-stone-950">
                                VFX &amp; Particle Dynamics
                            </h3>
                            <p class="text-xs text-stone-600 font-light leading-relaxed">
                                Simulasi fluida, kain sutra, partikel kristal, dan fenomena atmosferik abstrak untuk TVC komersial parfum, perhiasan, dan teknologi mutakhir.
                            </p>
                            <ul class="space-y-2 text-xs font-mono text-stone-500 pt-2">
                                <li>&bull; FLIP Fluid &amp; Pyro Dynamics</li>
                                <li>&bull; Vellum Cloth &amp; Soft Body</li>
                                <li>&bull; Procedural Crystal Shading</li>
                            </ul>
                        </div>
                        <div class="pt-4 border-t border-champagne-200">
                            <span class="font-mono text-[11px] text-champagne-800 font-semibold">Houdini Solaris &bull; Octane Render</span>
                        </div>
                    </div>

                    <!-- Discipline 4 -->
                    <div class="luxury-glass rounded-3xl p-8 space-y-4 flex flex-col justify-between">
                        <div class="space-y-4">
                            <span class="font-mono text-xs text-champagne-700 font-bold">04 // ARCHITECTURAL</span>
                            <h3 class="font-display font-bold text-xl text-stone-950">
                                Spatial Concept &amp; Cinematic Tour
                            </h3>
                            <p class="text-xs text-stone-600 font-light leading-relaxed">
                                Tur sinematik arsitektur luxury villa, galeri seni kontemporer, dan instalasi spasial imersif dengan pencahayaan natural yang puitis.
                            </p>
                            <ul class="space-y-2 text-xs font-mono text-stone-500 pt-2">
                                <li>&bull; Architectural Mood Lighting</li>
                                <li>&bull; Photoreal PBR Material Library</li>
                                <li>&bull; Virtual Camera Steadicam Motion</li>
                            </ul>
                        </div>
                        <div class="pt-4 border-t border-champagne-200">
                            <span class="font-mono text-[11px] text-champagne-800 font-semibold">Unreal Engine 5.4 &bull; Lumen</span>
                        </div>
                    </div>

                    <!-- Discipline 5 -->
                    <div class="luxury-glass rounded-3xl p-8 space-y-4 flex flex-col justify-between">
                        <div class="space-y-4">
                            <span class="font-mono text-xs text-champagne-700 font-bold">05 // COMMERCIAL FILM</span>
                            <h3 class="font-display font-bold text-xl text-stone-950">
                                3D Commercial Explainer &amp; TVC
                            </h3>
                            <p class="text-xs text-stone-600 font-light leading-relaxed">
                                Produksi video komersial lengkap dari storyboard, visual R&amp;D, layout 3D, compositing, hingga master audio berstandar broadcast TV dan OTT.
                            </p>
                            <ul class="space-y-2 text-xs font-mono text-stone-500 pt-2">
                                <li>&bull; Narrative &amp; Storyboard R&amp;D</li>
                                <li>&bull; Nuke Compositing &amp; ACES Color</li>
                                <li>&bull; Original Sound Design &amp; Foley</li>
                            </ul>
                        </div>
                        <div class="pt-4 border-t border-champagne-200">
                            <span class="font-mono text-[11px] text-champagne-800 font-semibold">ACEScg &bull; DaVinci Resolve Studio</span>
                        </div>
                    </div>

                    <!-- Discipline 6 -->
                    <div class="luxury-glass rounded-3xl p-8 space-y-4 flex flex-col justify-between">
                        <div class="space-y-4">
                            <span class="font-mono text-xs text-champagne-700 font-bold">06 // IMMERSIVE &amp; DOOH</span>
                            <h3 class="font-display font-bold text-xl text-stone-950">
                                3D Anamorphic Billboard &amp; DOOH
                            </h3>
                            <p class="text-xs text-stone-600 font-light leading-relaxed">
                                Efek visual 3D ilusi kedalaman tanpa kacamata (naked-eye 3D) untuk layar raksasa billboard Times Square, Shibuya, dan Senayan.
                            </p>
                            <ul class="space-y-2 text-xs font-mono text-stone-500 pt-2">
                                <li>&bull; Corner-Perspective Calculation</li>
                                <li>&bull; High-Contrast Photoreal Shading</li>
                                <li>&bull; Massive Resolution Delivery (16K+)</li>
                            </ul>
                        </div>
                        <div class="pt-4 border-t border-champagne-200">
                            <span class="font-mono text-[11px] text-champagne-800 font-semibold">Anamorphic 3D &bull; Cinema LED</span>
                        </div>
                    </div>

                </div>

            </div>
        </section>

        <!-- CURATED WORKS SHOWCASE -->
        <section id="karya" class="py-24 bg-stone-950 text-white border-y border-champagne-900/50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                
                <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-14">
                    <div>
                        <span class="text-champagne-400 font-mono text-xs uppercase tracking-widest font-semibold">
                            SELECTED PORTFOLIO
                        </span>
                        <h2 class="font-serif text-3xl sm:text-5xl text-white mt-1">
                            Karya Sinematik Terpilih
                        </h2>
                    </div>
                    <div class="flex gap-2 font-mono text-xs" id="portfolio-tabs">
                        <button onclick="filterPortfolio('all')" id="port-all" class="px-4 py-2 rounded-lg bg-champagne-400 text-stone-950 font-bold transition">Semua</button>
                        <button onclick="filterPortfolio('product')" id="port-product" class="px-4 py-2 rounded-lg bg-stone-900 text-stone-300 hover:text-white border border-stone-800 transition">3D Product</button>
                        <button onclick="filterPortfolio('kinetic')" id="port-kinetic" class="px-4 py-2 rounded-lg bg-stone-900 text-stone-300 hover:text-white border border-stone-800 transition">Kinetic Motion</button>
                    </div>
                </div>

                <!-- Showcase Cards Grid -->
                <div class="grid md:grid-cols-3 gap-8">
                    
                    <!-- Work 1 -->
                    <div class="group relative rounded-2xl bg-stone-900 border border-stone-800 overflow-hidden" data-type="product">
                        <div class="h-64 bg-gradient-to-tr from-stone-900 via-stone-800 to-champagne-950 flex items-center justify-center relative p-6">
                            <div class="w-32 h-32 rounded-full border border-champagne-500/30 group-hover:scale-110 transition-transform duration-500 flex items-center justify-center">
                                <span class="font-serif text-3xl text-champagne-200 italic">Chronos</span>
                            </div>
                            <span class="absolute top-4 right-4 px-2.5 py-1 rounded bg-stone-950/80 text-[10px] font-mono text-champagne-300 border border-champagne-800">
                                4K CGI REEL
                            </span>
                        </div>
                        <div class="p-6 space-y-2">
                            <span class="text-[10px] font-mono text-champagne-400 uppercase tracking-widest">Valence Horlogerie &bull; Switzerland</span>
                            <h3 class="font-display font-bold text-lg text-white group-hover:text-champagne-300 transition">
                                The Titanium Skeleton Tourbillon
                            </h3>
                            <p class="text-xs text-stone-400 font-light">
                                Visualisasi mikroskopis 248 komponen roda gigi jam mewah dengan depth-of-field sinematik.
                            </p>
                        </div>
                    </div>

                    <!-- Work 2 -->
                    <div class="group relative rounded-2xl bg-stone-900 border border-stone-800 overflow-hidden" data-type="kinetic">
                        <div class="h-64 bg-gradient-to-tr from-champagne-950 via-stone-900 to-stone-800 flex items-center justify-center relative p-6">
                            <div class="text-center space-y-2 group-hover:scale-105 transition-transform duration-500">
                                <span class="font-display font-extrabold text-4xl tracking-tighter text-transparent bg-clip-text bg-gradient-to-r from-champagne-200 to-champagne-400">
                                    NEXUS_AUDIO
                                </span>
                                <div class="text-[11px] font-mono text-stone-400">Kinetic Spatial Brand System</div>
                            </div>
                            <span class="absolute top-4 right-4 px-2.5 py-1 rounded bg-stone-950/80 text-[10px] font-mono text-champagne-300 border border-champagne-800">
                                MOTION BRANDING
                            </span>
                        </div>
                        <div class="p-6 space-y-2">
                            <span class="text-[10px] font-mono text-champagne-400 uppercase tracking-widest">Nexus Acoustic Lab &bull; Tokyo</span>
                            <h3 class="font-display font-bold text-lg text-white group-hover:text-champagne-300 transition">
                                Spatial Resonance Identity
                            </h3>
                            <p class="text-xs text-stone-400 font-light">
                                Harmoni gerak tipografi dan gelombang suara kinetik yang merespons frekuensi audio spasial.
                            </p>
                        </div>
                    </div>

                    <!-- Work 3 -->
                    <div class="group relative rounded-2xl bg-stone-900 border border-stone-800 overflow-hidden" data-type="product">
                        <div class="h-64 bg-gradient-to-tr from-stone-900 via-stone-850 to-champagne-900/60 flex items-center justify-center relative p-6">
                            <div class="w-28 h-40 rounded-2xl border border-champagne-400/40 group-hover:rotate-6 transition-transform duration-500 flex flex-col items-center justify-center p-4 text-center">
                                <span class="font-serif text-2xl text-champagne-300">Éclat</span>
                                <span class="text-[9px] font-mono text-stone-400 mt-1">EAU DE PARFUM</span>
                            </div>
                            <span class="absolute top-4 right-4 px-2.5 py-1 rounded bg-stone-950/80 text-[10px] font-mono text-champagne-300 border border-champagne-800">
                                FLUID SIMULATION
                            </span>
                        </div>
                        <div class="p-6 space-y-2">
                            <span class="text-[10px] font-mono text-champagne-400 uppercase tracking-widest">Atelier Botanica &bull; Paris</span>
                            <h3 class="font-display font-bold text-lg text-white group-hover:text-champagne-300 transition">
                                L'Ambre Doré Commercial TVC
                            </h3>
                            <p class="text-xs text-stone-400 font-light">
                                Simulasi tetesan cairan emas dan helai kelopak mawar fotorealistik dalam gerak lambat 1.000 FPS.
                            </p>
                        </div>
                    </div>

                </div>

            </div>
        </section>

        <!-- INTERACTIVE PROJECT ESTIMATOR & TIMELINE SIMULATOR -->
        <section id="estimasi" class="py-24 relative">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                
                <div class="grid lg:grid-cols-12 gap-12 items-center">
                    
                    <div class="lg:col-span-5 space-y-5">
                        <span class="text-champagne-800 font-mono text-xs uppercase tracking-widest font-bold">
                            INTERACTIVE PRODUCTION ESTIMATOR
                        </span>
                        <h2 class="font-serif text-3xl sm:text-4xl text-stone-950 leading-tight">
                            Simulasi Estimasi Durasi &amp; <span class="italic font-normal">Kompleksitas Render</span>
                        </h2>
                        <p class="text-stone-600 text-sm font-light leading-relaxed">
                            Hitung proyeksi timeline produksi dan kebutuhan render farm berdasarkan durasi detik video dan tingkat kerumitan simulasi 3D proyek Anda.
                        </p>

                        <div class="p-4 bg-white/80 rounded-2xl border border-champagne-300 text-xs space-y-2 font-mono">
                            <div class="font-bold text-stone-900 flex items-center gap-1.5">
                                <span class="text-champagne-600">✦</span> Jaminan Pipeline Standar Industri:
                            </div>
                            <p class="text-stone-500 text-[11px]">
                                Setiap proyek mencakup 3 putaran review milestone (Styleframe &rarr; Animatic 3D &rarr; Final Color Graded 4K).
                            </p>
                        </div>
                    </div>

                    <!-- Estimator Widget -->
                    <div class="lg:col-span-7 luxury-glass rounded-3xl p-8 border border-champagne-300 space-y-6">
                        
                        <div class="space-y-6">
                            <!-- Slider 1: Durasi -->
                            <div>
                                <div class="flex justify-between items-center text-xs font-mono mb-2">
                                    <label for="est-duration" class="text-stone-700 font-bold">Durasi Video Animasi (Detik):</label>
                                    <span class="text-champagne-800 font-bold text-sm" id="lbl-duration">30 Detik</span>
                                </div>
                                <input type="range" id="est-duration" min="5" max="120" step="5" value="30" oninput="calculateEstimate()"
                                    class="w-full h-2 bg-champagne-200 rounded-lg appearance-none cursor-pointer accent-champagne-600">
                            </div>

                            <!-- Scope Complexity Radio Buttons -->
                            <div>
                                <label class="block text-xs font-mono font-bold text-stone-700 mb-2">Tingkat Kompleksitas Visual:</label>
                                <div class="grid grid-cols-3 gap-2 font-mono text-xs">
                                    <button onclick="setComplexity('clean')" id="comp-clean" class="py-2.5 px-3 rounded-xl border border-champagne-400 bg-stone-950 text-champagne-200 font-bold text-center transition">
                                        Clean Minimal
                                    </button>
                                    <button onclick="setComplexity('photoreal')" id="comp-photoreal" class="py-2.5 px-3 rounded-xl border border-champagne-200 bg-white text-stone-700 hover:bg-champagne-100 font-semibold text-center transition">
                                        Photoreal CGI
                                    </button>
                                    <button onclick="setComplexity('vfx')" id="comp-vfx" class="py-2.5 px-3 rounded-xl border border-champagne-200 bg-white text-stone-700 hover:bg-champagne-100 font-semibold text-center transition">
                                        Fluid &amp; VFX 8K
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Results Breakdown Box -->
                        <div class="p-6 rounded-2xl bg-stone-950 text-white border border-champagne-800 grid sm:grid-cols-3 gap-4 text-center font-mono">
                            <div>
                                <span class="text-[10px] text-stone-400 uppercase tracking-wider block">Estimasi Lead Time</span>
                                <span class="font-display font-extrabold text-xl text-champagne-300 mt-1 block" id="out-timeline">3 - 4 Minggu</span>
                                <span class="text-[10px] text-stone-500">termasuk R&amp;D shader</span>
                            </div>
                            <div>
                                <span class="text-[10px] text-stone-400 uppercase tracking-wider block">Render Farm Load</span>
                                <span class="font-display font-extrabold text-xl text-white mt-1 block" id="out-frames">900 Frames</span>
                                <span class="text-[10px] text-stone-500">60 FPS Cinema Spec</span>
                            </div>
                            <div>
                                <span class="text-[10px] text-stone-400 uppercase tracking-wider block">Format Delivery</span>
                                <span class="font-display font-extrabold text-lg text-champagne-400 mt-1 block">ProRes 4444</span>
                                <span class="text-[10px] text-stone-500">+ Alpha Channel</span>
                            </div>
                        </div>

                        <div class="text-center pt-2">
                            <a href="#konsultasi" class="inline-flex items-center gap-2 px-6 py-3 rounded-xl font-mono text-xs font-bold uppercase tracking-wider text-white bg-stone-900 hover:bg-stone-800 border border-champagne-400/40 transition">
                                Diskusikan Spesifikasi Ini dengan Creative Director &rarr;
                            </a>
                        </div>

                    </div>
                </div>

            </div>
        </section>

        <!-- PACKAGES & STUDIO ENGAGEMENT -->
        <section id="investasi" class="py-24 bg-white/60 border-y border-champagne-200/80">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                
                <div class="text-center max-w-2xl mx-auto mb-16 space-y-3 font-mono">
                    <span class="text-champagne-800 text-xs uppercase tracking-widest font-bold">
                        STUDIO ENGAGEMENT
                    </span>
                    <h2 class="font-serif text-3xl sm:text-5xl text-stone-950 font-normal">
                        Struktur Investasi &amp; Kolaborasi
                    </h2>
                    <p class="text-stone-600 text-xs font-sans max-w-md mx-auto font-light">
                        Dipilih berdasarkan skala visibilitas kampanye, tingkat kompleksitas render, dan hak lisensi komersial penayangan.
                    </p>
                </div>

                <div class="grid lg:grid-cols-3 gap-8">
                    
                    <!-- Package 1 -->
                    <div class="luxury-glass rounded-3xl p-8 border border-champagne-200 flex flex-col justify-between space-y-8 bg-white/90">
                        <div class="space-y-4">
                            <span class="px-3 py-1 rounded-full bg-champagne-100 text-champagne-900 text-[10px] font-mono font-bold">
                                TIER 1 &mdash; EDITORIAL &amp; DIGITAL
                            </span>
                            <h3 class="font-display font-bold text-2xl text-stone-950">Aura Essential</h3>
                            <p class="text-xs text-stone-600 font-light leading-relaxed">
                                Ideal untuk visualisasi produk peluncuran e-commerce, teaser media sosial resolusi 4K, dan aset kinetik brand identity.
                            </p>
                            <div class="pt-4 border-t border-champagne-200 font-mono">
                                <span class="text-3xl font-extrabold text-stone-950">Rp 28.000.000</span>
                                <span class="text-[11px] text-stone-500 block mt-1">/ video durasi hingga 15 detik</span>
                            </div>
                            <ul class="space-y-2.5 text-xs text-stone-600 font-light pt-2">
                                <li class="flex items-center gap-2"><span class="text-champagne-700 font-bold">&check;</span> 1 Model 3D Produk Fotorealistik High-Poly</li>
                                <li class="flex items-center gap-2"><span class="text-champagne-700 font-bold">&check;</span> 15 Detik Animasi Sinematik 4K UHD</li>
                                <li class="flex items-center gap-2"><span class="text-champagne-700 font-bold">&check;</span> 4 Still Render Resolusi Tinggi (Poster Print)</li>
                                <li class="flex items-center gap-2"><span class="text-champagne-700 font-bold">&check;</span> Sound Design &amp; Master Audio Lisensi Komersial</li>
                            </ul>
                        </div>
                        <a href="https://wa.me/6281234567890?text=Halo%20AuraMotion,%20saya%20tertarik%20dengan%20Paket%20Aura%20Essential" target="_blank" rel="noopener noreferrer" class="block w-full py-3 rounded-xl text-center font-mono text-xs font-bold uppercase tracking-wider bg-champagne-100 hover:bg-champagne-200 text-stone-900 border border-champagne-300 transition">
                            Inquiry Paket Essential
                        </a>
                    </div>

                    <!-- Package 2: Featured -->
                    <div class="luxury-glass rounded-3xl p-8 border-2 border-champagne-500 relative flex flex-col justify-between space-y-8 bg-white shadow-2xl scale-105 z-10 glow-champagne">
                        <div class="absolute -top-3.5 left-1/2 -translate-x-1/2 px-4 py-1 rounded-full bg-stone-950 text-champagne-300 font-mono text-[10px] font-bold uppercase tracking-wider border border-champagne-400">
                            SIGNATURE STUDIO CHOICE &bull; TVC READY
                        </div>
                        <div class="space-y-4">
                            <span class="px-3 py-1 rounded-full bg-champagne-200 text-champagne-950 text-[10px] font-mono font-bold">
                                TIER 2 &mdash; GLOBAL CAMPAIGN TVC
                            </span>
                            <h3 class="font-display font-bold text-2xl text-stone-950">Aura Cinematic</h3>
                            <p class="text-xs text-stone-600 font-light leading-relaxed">
                                Kampanye komersial prestisius dengan visual direction terarah, simulasi fluida/partikel, dan tata cahaya fotorealistik bioskop.
                            </p>
                            <div class="pt-4 border-t border-champagne-200 font-mono">
                                <span class="text-3xl font-extrabold text-champagne-800">Rp 65.000.000</span>
                                <span class="text-[11px] text-stone-500 block mt-1">/ video durasi 30 - 45 detik</span>
                            </div>
                            <ul class="space-y-2.5 text-xs text-stone-800 font-medium pt-2">
                                <li class="flex items-center gap-2"><span class="text-champagne-700 font-bold">&check;</span> Multi-Object 3D Asset &amp; Bespoke Texture R&amp;D</li>
                                <li class="flex items-center gap-2"><span class="text-champagne-700 font-bold">&check;</span> 30-45 Detik Master Sinematik ProRes 4444 8K</li>
                                <li class="flex items-center gap-2"><span class="text-champagne-700 font-bold">&check;</span> Advanced Particle / Fluid Dynamics Simulation</li>
                                <li class="flex items-center gap-2"><span class="text-champagne-700 font-bold">&check;</span> 8 Master Still Renders untuk Billboard &amp; OOH</li>
                                <li class="flex items-center gap-2"><span class="text-champagne-700 font-bold">&check;</span> Hak Penayangan Komersial Global Sepenuhnya</li>
                            </ul>
                        </div>
                        <a href="https://wa.me/6281234567890?text=Halo%20AuraMotion,%20saya%20ingin%20berdiskusi%20mengenai%20Paket%20Aura%20Cinematic" target="_blank" rel="noopener noreferrer" class="block w-full py-3.5 rounded-xl text-center font-mono text-xs font-bold uppercase tracking-wider text-white bg-stone-950 hover:bg-stone-900 border border-champagne-400 transition shadow-md">
                            Booking Slot Cinematic &rarr;
                        </a>
                    </div>

                    <!-- Package 3 -->
                    <div class="luxury-glass rounded-3xl p-8 border border-champagne-200 flex flex-col justify-between space-y-8 bg-white/90">
                        <div class="space-y-4">
                            <span class="px-3 py-1 rounded-full bg-champagne-100 text-champagne-900 text-[10px] font-mono font-bold">
                                TIER 3 &mdash; FULL IMMERSIVE &amp; DOOH
                            </span>
                            <h3 class="font-display font-bold text-2xl text-stone-950">Haute Bespoke</h3>
                            <p class="text-xs text-stone-600 font-light leading-relaxed">
                                Produksi visual 3D berdaulat untuk proyek billboard anamorphic raksasa, pameran seni museum, atau peluncuran lini supercar.
                            </p>
                            <div class="pt-4 border-t border-champagne-200 font-mono">
                                <span class="text-3xl font-extrabold text-stone-950">Bespoke</span>
                                <span class="text-[11px] text-stone-500 block mt-1">/ disesuaikan spesifikasi teknis layar</span>
                            </div>
                            <ul class="space-y-2.5 text-xs text-stone-600 font-light pt-2">
                                <li class="flex items-center gap-2"><span class="text-champagne-700 font-bold">&check;</span> Anamorphic 3D Optical Illusion Engineering</li>
                                <li class="flex items-center gap-2"><span class="text-champagne-700 font-bold">&check;</span> Resolusi Raksasa Tanpa Batas (16K+)</li>
                                <li class="flex items-center gap-2"><span class="text-champagne-700 font-bold">&check;</span> On-Site Testing &amp; Color Calibration Layar</li>
                                <li class="flex items-center gap-2"><span class="text-champagne-700 font-bold">&check;</span> Dedicated Lead 3D Artist &amp; Art Director</li>
                            </ul>
                        </div>
                        <a href="https://wa.me/6281234567890?text=Halo%20AuraMotion,%20kami%20memerlukan%20penawaran%20proyek%20Haute%20Bespoke" target="_blank" rel="noopener noreferrer" class="block w-full py-3 rounded-xl text-center font-mono text-xs font-bold uppercase tracking-wider bg-champagne-100 hover:bg-champagne-200 text-stone-900 border border-champagne-300 transition">
                            Konsultasi Kustom
                        </a>
                    </div>

                </div>

            </div>
        </section>

        <!-- ACCORDION FAQ -->
        <section id="faq" class="py-24 relative">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
                
                <div class="text-center space-y-3 font-mono">
                    <span class="text-champagne-800 text-xs uppercase tracking-widest font-bold">
                        FREQUENTLY ASKED QUESTIONS
                    </span>
                    <h2 class="font-serif text-3xl sm:text-4xl text-stone-950 font-normal">
                        Pertanyaan Umum Klien &amp; Agensi
                    </h2>
                </div>

                <div class="space-y-4">
                    
                    <div class="luxury-glass rounded-2xl border border-champagne-300 overflow-hidden">
                        <button onclick="toggleFaq(1)" class="w-full p-6 text-left flex justify-between items-center hover:bg-champagne-100/40 transition">
                            <span class="font-display font-bold text-sm sm:text-base text-stone-950">Berapa lama rata-rata waktu yang dibutuhkan untuk menyelesaikan video 3D 30 detik?</span>
                            <span id="faq-ico-1" class="text-champagne-700 font-mono text-lg font-bold">+</span>
                        </button>
                        <div id="faq-ans-1" class="hidden px-6 pb-6 text-xs sm:text-sm text-stone-600 leading-relaxed border-t border-champagne-200 pt-4 font-light">
                            Rata-rata proyek komersial 30 detik membutuhkan waktu 3 hingga 5 minggu kerja. Proses mencakup eksplorasi styleframe (minggu 1), animatic 3D &amp; layout kamera (minggu 2), shading &amp; pencahayaan fotorealistik (minggu 3), serta final compositing, sound design, dan color grading (minggu 4-5).
                        </div>
                    </div>

                    <div class="luxury-glass rounded-2xl border border-champagne-300 overflow-hidden">
                        <button onclick="toggleFaq(2)" class="w-full p-6 text-left flex justify-between items-center hover:bg-champagne-100/40 transition">
                            <span class="font-display font-bold text-sm sm:text-base text-stone-950">Format data apa yang perlu kami sediakan untuk produk yang akan dirender?</span>
                            <span id="faq-ico-2" class="text-champagne-700 font-mono text-lg font-bold">+</span>
                        </button>
                        <div id="faq-ans-2" class="hidden px-6 pb-6 text-xs sm:text-sm text-stone-600 leading-relaxed border-t border-champagne-200 pt-4 font-light">
                            Kami dapat menerima file CAD industri seperti STEP, IGES, OBJ, FBX, atau STL. Jika Anda belum memiliki model 3D, tim modeler kami dapat membuatkan aset 3D fotorealistik dari awal hanya bermodalkan foto produk asli dan lembar blueprint dimensi.
                        </div>
                    </div>

                    <div class="luxury-glass rounded-2xl border border-champagne-300 overflow-hidden">
                        <button onclick="toggleFaq(3)" class="w-full p-6 text-left flex justify-between items-center hover:bg-champagne-100/40 transition">
                            <span class="font-display font-bold text-sm sm:text-base text-stone-950">Apakah hak cipta dan file master 3D diserahkan sepenuhnya ke klien?</span>
                            <span id="faq-ico-3" class="text-champagne-700 font-mono text-lg font-bold">+</span>
                        </button>
                        <div id="faq-ans-3" class="hidden px-6 pb-6 text-xs sm:text-sm text-stone-600 leading-relaxed border-t border-champagne-200 pt-4 font-light">
                            Ya, hak guna penayangan komersial global tanpa batas waktu menjadi milik klien sepenuhnya. Kami juga menyediakan opsi penyerahan full project file Houdini/C4D dan raw shader pack sesuai klausul kontrak yang disepakati.
                        </div>
                    </div>

                    <div class="luxury-glass rounded-2xl border border-champagne-300 overflow-hidden">
                        <button onclick="toggleFaq(4)" class="w-full p-6 text-left flex justify-between items-center hover:bg-champagne-100/40 transition">
                            <span class="font-display font-bold text-sm sm:text-base text-stone-950">Bagaimana prosedur penandatanganan NDA (Non-Disclosure Agreement)?</span>
                            <span id="faq-ico-4" class="text-champagne-700 font-mono text-lg font-bold">+</span>
                        </button>
                        <div id="faq-ans-4" class="hidden px-6 pb-6 text-xs sm:text-sm text-stone-600 leading-relaxed border-t border-champagne-200 pt-4 font-light">
                            Kerahasiaan produk sebelum peluncuran resmi adalah prioritas tertinggi kami. Kami selalu menandatangani NDA resmi sebelum pertukaran materi desain atau data CAD dimulai, memastikan data Anda terlindungi secara hukum.
                        </div>
                    </div>

                </div>

            </div>
        </section>

        <!-- PRIVATE CONSULTATION & BRIEF SUBMISSION FORM -->
        <section id="konsultasi" class="py-24 relative bg-stone-950 text-white border-t border-champagne-900/50">
            <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
                
                <div class="rounded-3xl p-8 sm:p-12 border border-champagne-700/60 bg-gradient-to-br from-stone-950 via-stone-900 to-stone-950 shadow-2xl relative overflow-hidden">
                    <div class="grid lg:grid-cols-12 gap-8 items-center">
                        
                        <div class="lg:col-span-6 space-y-4">
                            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-champagne-900/60 text-champagne-300 text-[10px] font-mono font-bold tracking-widest uppercase border border-champagne-700/40">
                                PRIVATE STUDIO BRIEFING
                            </div>
                            <h2 class="font-serif text-3xl sm:text-4xl text-white">
                                Mulai Wujudkan Visi Sinematik Anda.
                            </h2>
                            <p class="text-stone-300 text-xs sm:text-sm font-light leading-relaxed">
                                Ceritakan konsep kampanye produk atau kebutuhan motion branding Anda. Art Director kami akan meninjau dan merespons dengan moodboard visual awal dalam 1x24 jam kerja.
                            </p>
                            <div class="space-y-2 text-xs font-mono text-champagne-300 pt-2">
                                <div class="flex items-center gap-2">✦ Peninjauan materi teknis &amp; CAD secara rahasia (NDA)</div>
                                <div class="flex items-center gap-2">✦ Moodboard visual &amp; proposal breakdown timeline gratis</div>
                                <div class="flex items-center gap-2">✦ Diskusi langsung dengan Lead 3D Artist</div>
                            </div>
                        </div>

                        <div class="lg:col-span-6 bg-white/95 text-stone-900 rounded-2xl p-6 space-y-4 font-mono shadow-xl">
                            <form id="briefForm" onsubmit="handleBriefSubmit(event)" class="space-y-3 text-xs">
                                <div>
                                    <label class="block font-bold text-stone-800 mb-1">Nama Lengkap &amp; Gelar</label>
                                    <input type="text" required placeholder="Contoh: Adrian Wijaya, Creative Director"
                                        class="w-full px-3.5 py-2.5 rounded-xl bg-champagne-50 border border-champagne-300 text-stone-900 focus:outline-none focus:border-champagne-600 font-sans">
                                </div>
                                <div>
                                    <label class="block font-bold text-stone-800 mb-1">Brand / Nama Perusahaan</label>
                                    <input type="text" required placeholder="Atelier / Studio / PT Nama Brand"
                                        class="w-full px-3.5 py-2.5 rounded-xl bg-champagne-50 border border-champagne-300 text-stone-900 focus:outline-none focus:border-champagne-600 font-sans">
                                </div>
                                <div class="grid grid-cols-2 gap-3">
                                    <div>
                                        <label class="block font-bold text-stone-800 mb-1">Email Resmi</label>
                                        <input type="email" required placeholder="adrian@brand.com"
                                            class="w-full px-3.5 py-2.5 rounded-xl bg-champagne-50 border border-champagne-300 text-stone-900 focus:outline-none focus:border-champagne-600 font-sans">
                                    </div>
                                    <div>
                                        <label class="block font-bold text-stone-800 mb-1">WhatsApp / Hotline</label>
                                        <input type="tel" required placeholder="081234567890"
                                            class="w-full px-3.5 py-2.5 rounded-xl bg-champagne-50 border border-champagne-300 text-stone-900 focus:outline-none focus:border-champagne-600 font-sans">
                                    </div>
                                </div>
                                <div>
                                    <label class="block font-bold text-stone-800 mb-1">Fokus Layanan yang Diperlukan</label>
                                    <select class="w-full px-3.5 py-2.5 rounded-xl bg-champagne-50 border border-champagne-300 text-stone-900 focus:outline-none focus:border-champagne-600 font-sans">
                                        <option value="3d-product">3D Product Render Fotorealistik</option>
                                        <option value="motion-tvc">Motion Graphics Commercial TVC</option>
                                        <option value="kinetic-brand">Kinetic Brand Identity &amp; Typography</option>
                                        <option value="vfx-fluid">Simulasi Fluida / Partikel VFX</option>
                                        <option value="anamorphic">3D Anamorphic Billboard (DOOH)</option>
                                    </select>
                                </div>
                                <button type="submit" class="w-full py-3 rounded-xl font-bold uppercase tracking-wider text-white bg-stone-950 hover:bg-stone-900 border border-champagne-400 transition shadow-md">
                                    Kirim Briefing Proyek &rarr;
                                </button>
                            </form>
                            <div id="brief-success" class="hidden p-3 rounded-xl bg-champagne-100 border border-champagne-400 text-champagne-950 text-xs font-mono text-center">
                                Terima kasih. Briefing proyek Anda telah diterima secara rahasia. Art Director kami akan menghubungi Anda via email dalam 1x24 jam kerja.
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </section>

    </main>

    <!-- FOOTER -->
    <footer class="bg-stone-950 text-stone-400 text-xs py-14 border-t border-stone-800 relative z-10 font-mono">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-5 gap-8 pb-10 border-b border-stone-800">
                
                <div class="col-span-2 space-y-4">
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 rounded-lg bg-champagne-400 flex items-center justify-center text-stone-950 font-bold">
                            AM
                        </div>
                        <span class="font-serif text-lg text-white">AuraMotion 3D Studio</span>
                    </div>
                    <p class="text-xs text-stone-400 max-w-sm font-sans font-light leading-relaxed">
                        Studio animasi kinetik dan rekayasa visual 3D berstandar internasional. Menyatukan teknologi render fotorealistik dengan estetika minimalis bernilai tinggi.
                    </p>
                    <div class="text-[11px] text-champagne-400">
                        Studio Suites: Senopati Creative Hub, Jakarta &bull; Marina Bay, Singapore.
                    </div>
                </div>

                <div>
                    <h4 class="font-bold text-white text-xs uppercase tracking-wider mb-3">Keahlian</h4>
                    <ul class="space-y-2">
                        <li><a href="#layanan" class="hover:text-champagne-300 transition">3D Product CGI</a></li>
                        <li><a href="#layanan" class="hover:text-champagne-300 transition">Kinetic Typography</a></li>
                        <li><a href="#layanan" class="hover:text-champagne-300 transition">VFX Fluid Physics</a></li>
                        <li><a href="#layanan" class="hover:text-champagne-300 transition">DOOH Anamorphic</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-bold text-white text-xs uppercase tracking-wider mb-3">Kolaborasi</h4>
                    <ul class="space-y-2">
                        <li><a href="#investasi" class="hover:text-champagne-300 transition">Engagement Plans</a></li>
                        <li><a href="#estimasi" class="hover:text-champagne-300 transition">Kalkulator Render</a></li>
                        <li><a href="#konsultasi" class="hover:text-champagne-300 transition">Perjanjian NDA</a></li>
                        <li><a href="#showreel" class="hover:text-champagne-300 transition">Showreel 4K</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-bold text-white text-xs uppercase tracking-wider mb-3">Standar Kualitas</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-champagne-300 transition">ACES Color Workflow</a></li>
                        <li><a href="#" class="hover:text-champagne-300 transition">Redshift / Octane Farm</a></li>
                        <li><a href="#" class="hover:text-champagne-300 transition">ProRes 4444 Master</a></li>
                        <li><a href="#" class="hover:text-champagne-300 transition">Hak Cipta Global</a></li>
                    </ul>
                </div>

            </div>

            <div class="pt-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-[11px] text-stone-500">
                <p>&copy; 2026 AuraMotion 3D &amp; Motion Graphics Studio. Seluruh hak cipta dilindungi.</p>
                <div class="flex items-center gap-4 text-champagne-400 font-mono">
                    <span>Premium Minimal &bull; Champagne Glow Edition</span>
                    <span>&bull;</span>
                    <span>Webia Ecosystem</span>
                </div>
            </div>
        </div>
    </footer>

    <!-- FLOATING WHATSAPP BUTTON -->
    <a href="https://wa.me/6281234567890?text=Halo%20AuraMotion%203D%20Studio,%20saya%20ingin%20berkonsultasi%20mengenai%20proyek%20Motion%20Graphics%20&%20Visual%203D"
       target="_blank" rel="noopener noreferrer"
       class="fixed bottom-6 right-6 z-50 p-3.5 rounded-2xl bg-stone-900 hover:bg-stone-800 text-champagne-300 border border-champagne-400/50 shadow-2xl hover:scale-105 transition-all flex items-center gap-2 group glow-champagne"
       title="WhatsApp Executive Concierge">
        <svg class="w-6 h-6 text-champagne-300" fill="currentColor" viewBox="0 0 24 24">
            <path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0012.04 2m.01 1.67c2.2 0 4.26.86 5.82 2.42a8.225 8.225 0 012.41 5.83c0 4.54-3.7 8.24-8.24 8.24-1.48 0-2.93-.4-4.2-1.15l-.3-.18-3.12.82.83-3.04-.2-.31a8.196 8.196 0 01-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24m4.52 11.66c-.25-.13-1.47-.72-1.7-.81-.23-.08-.39-.13-.56.13-.17.25-.64.81-.79.97-.14.17-.29.19-.54.06-.25-.13-1.06-.39-2.01-1.24-.74-.66-1.24-1.48-1.39-1.73-.14-.25-.02-.39.11-.51.11-.11.25-.29.37-.43.13-.15.17-.25.25-.42.08-.17.04-.31-.02-.44-.06-.13-.56-1.34-.76-1.84-.2-.49-.4-.42-.56-.43h-.48c-.17 0-.44.06-.67.31-.23.25-.88.86-.88 2.1 0 1.24.9 2.44 1.03 2.61.13.17 1.77 2.71 4.3 3.8 2.52 1.09 2.52.73 2.98.69.45-.05 1.47-.6 1.68-1.18.21-.58.21-1.07.15-1.18-.07-.12-.23-.19-.48-.32z"/>
        </svg>
        <span class="max-w-0 overflow-hidden whitespace-nowrap group-hover:max-w-xs transition-all duration-300 font-mono text-xs font-bold text-white pr-1">
            WhatsApp Concierge
        </span>
    </a>

    <!-- FLOATING AURAMOTION AI MODAL -->
    <div id="aura-ai-modal" class="fixed inset-0 z-50 bg-stone-950/70 backdrop-blur-md hidden items-center justify-center p-4">
        <div class="luxury-glass w-full max-w-lg rounded-3xl border border-champagne-400 p-6 space-y-4 shadow-2xl bg-white/95">
            <div class="flex items-center justify-between pb-3 border-b border-champagne-200 font-mono">
                <div class="flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-champagne-500 animate-ping"></span>
                    <span class="font-bold text-stone-950 text-xs uppercase tracking-wider">AuraMotion AI Assistant</span>
                    <span class="text-[10px] px-2 py-0.5 rounded-full bg-champagne-100 text-champagne-900 font-bold">Online</span>
                </div>
                <button onclick="closeAuraAI()" class="text-stone-400 hover:text-stone-800 p-1 font-bold">
                    ✕
                </button>
            </div>

            <div class="h-64 overflow-y-auto space-y-3 p-3 rounded-2xl bg-champagne-50/70 border border-champagne-200 text-xs font-sans" id="chat-stream">
                <div class="p-3.5 rounded-2xl bg-white border border-champagne-300/80 text-stone-800">
                    <strong>AuraMotion AI:</strong> Salam. Saya dapat membantu memberikan rekomendasi pipeline 3D, kalkulasi estimasi lead-time render, atau menjadwalkan creative brief privat bersama Art Director kami.
                </div>
            </div>

            <!-- Quick Questions -->
            <div class="flex flex-wrap gap-1.5 pt-1 font-mono">
                <button onclick="askAuraPreset('Berapa estimasi waktu render produk jam tangan?')" class="text-[11px] font-semibold px-2.5 py-1 rounded-lg bg-champagne-100 hover:bg-champagne-200 text-champagne-900 border border-champagne-300">
                    Render Jam Tangan?
                </button>
                <button onclick="askAuraPreset('Format apa saja yang diserahkan untuk master?') " class="text-[11px] font-semibold px-2.5 py-1 rounded-lg bg-champagne-100 hover:bg-champagne-200 text-champagne-900 border border-champagne-300">
                    Format Master Deliverables?
                </button>
                <button onclick="askAuraPreset('Saya ingin konsultasi rahasia dengan NDA')" class="text-[11px] font-bold px-2.5 py-1 rounded-lg bg-stone-900 text-champagne-300">
                    Klausul NDA
                </button>
            </div>

            <div class="flex gap-2 font-mono">
                <input type="text" id="ai-input" placeholder="Tanyakan seputar spesifikasi 3D / motion..."
                    class="flex-1 px-4 py-2 rounded-xl bg-white border border-champagne-300 text-stone-900 placeholder-stone-400 text-xs focus:outline-none focus:border-champagne-600 font-sans">
                <button onclick="sendChatMessage()" class="px-4 py-2 rounded-xl bg-stone-900 hover:bg-stone-800 text-white font-bold text-xs uppercase tracking-wider border border-champagne-400">
                    Kirim
                </button>
            </div>
        </div>
    </div>

    <!-- SCRIPT LOGIC -->
    <script>
        function toggleMobileMenu() {
            const m = document.getElementById('mobile-menu');
            m.classList.toggle('hidden');
        }

        // Hero Viewport Switcher
        const scenes = {
            watch: {
                cam: 'CAM_01 // 85MM T1.5',
                fps: '60.00 FPS REALTIME',
                title: '“Chronos Chronograph — Photoreal Metallic Shader”',
                samples: 'Samples: 4,096 • Ray Depth: 32'
            },
            perfume: {
                cam: 'CAM_02 // 50MM MACRO',
                fps: '1,000 FPS HIGH-SPEED',
                title: '“L’Ambre Doré — Viscous Fluid & Glass Refraction”',
                samples: 'Samples: 8,192 • Caustics: Enabled'
            },
            kinetic: {
                cam: 'CAM_03 // ORTHOGRAPHIC',
                fps: '120.00 FPS KINETIC',
                title: '“Nexus Spatial Identity — Procedural Particle Wave”',
                samples: 'Samples: 2,048 • Motion Blur: Curved'
            }
        };

        function switchHeroScene(type) {
            ['watch', 'perfume', 'kinetic'].forEach(s => {
                const b = document.getElementById('btn-scene-' + s);
                if (s === type) {
                    b.className = 'flex-1 py-1.5 rounded-lg text-xs font-mono font-bold bg-stone-900 text-champagne-200 border border-champagne-400/40 transition';
                } else {
                    b.className = 'flex-1 py-1.5 rounded-lg text-xs font-mono font-bold bg-champagne-100 text-stone-700 hover:bg-champagne-200 transition';
                }
            });

            const sc = scenes[type];
            document.getElementById('scene-cam').innerText = sc.cam;
            document.getElementById('scene-fps').innerText = sc.fps;
            document.getElementById('scene-title').innerText = sc.title;
            document.getElementById('scene-samples').innerText = sc.samples;
        }

        // Portfolio Filter
        function filterPortfolio(cat) {
            ['all', 'product', 'kinetic'].forEach(c => {
                const btn = document.getElementById('port-' + c);
                if (c === cat) {
                    btn.className = 'px-4 py-2 rounded-lg bg-champagne-400 text-stone-950 font-bold transition';
                } else {
                    btn.className = 'px-4 py-2 rounded-lg bg-stone-900 text-stone-300 hover:text-white border border-stone-800 transition';
                }
            });

            const cards = document.querySelectorAll('[data-type]');
            cards.forEach(card => {
                if (cat === 'all' || card.getAttribute('data-type') === cat) {
                    card.classList.remove('hidden');
                } else {
                    card.classList.add('hidden');
                }
            });
        }

        // Project Estimator
        let currentComplexity = 'clean';

        function setComplexity(comp) {
            currentComplexity = comp;
            ['clean', 'photoreal', 'vfx'].forEach(c => {
                const b = document.getElementById('comp-' + c);
                if (c === comp) {
                    b.className = 'py-2.5 px-3 rounded-xl border border-champagne-400 bg-stone-950 text-champagne-200 font-bold text-center transition';
                } else {
                    b.className = 'py-2.5 px-3 rounded-xl border border-champagne-200 bg-white text-stone-700 hover:bg-champagne-100 font-semibold text-center transition';
                }
            });
            calculateEstimate();
        }

        function calculateEstimate() {
            const sec = parseInt(document.getElementById('est-duration').value);
            document.getElementById('lbl-duration').innerText = sec + ' Detik';

            const frames = sec * 30; // standard 30fps commercial
            let timelineWeeks = '2 - 3 Minggu';

            if (currentComplexity === 'clean') {
                timelineWeeks = sec <= 30 ? '2 - 3 Minggu' : '3 - 4 Minggu';
            } else if (currentComplexity === 'photoreal') {
                timelineWeeks = sec <= 30 ? '3 - 4 Minggu' : '4 - 6 Minggu';
            } else {
                timelineWeeks = sec <= 30 ? '4 - 6 Minggu' : '6 - 8 Minggu';
            }

            document.getElementById('out-timeline').innerText = timelineWeeks;
            document.getElementById('out-frames').innerText = frames.toLocaleString() + ' Frames';
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

        // AI Modal
        function openAuraAI() {
            document.getElementById('aura-ai-modal').classList.remove('hidden');
            document.getElementById('aura-ai-modal').classList.add('flex');
        }

        function closeAuraAI() {
            document.getElementById('aura-ai-modal').classList.add('hidden');
            document.getElementById('aura-ai-modal').classList.remove('flex');
        }

        function askAuraPreset(txt) {
            document.getElementById('ai-input').value = txt;
            sendChatMessage();
        }

        function sendChatMessage() {
            const input = document.getElementById('ai-input');
            const stream = document.getElementById('chat-stream');
            const val = input.value.trim();
            if (!val) return;

            const u = document.createElement('div');
            u.className = 'p-3 rounded-xl bg-champagne-200/80 border border-champagne-300 text-right text-stone-900';
            u.innerHTML = '<strong>Anda:</strong> ' + val;
            stream.appendChild(u);

            input.value = '';
            stream.scrollTop = stream.scrollHeight;

            setTimeout(() => {
                let ans = 'Visi Anda adalah prioritas kami. Tim Art Direction AuraMotion siap menjadwalkan creative brief tertutup untuk mengeksplorasi konsep proyek Anda.';
                const low = val.toLowerCase();
                if (low.includes('jam') || low.includes('render') || low.includes('produk')) {
                    ans = 'Untuk visualisasi 3D jam tangan atau produk luxury, durasi produksi berkisar 3-4 minggu dengan resolusi 4K/8K, mencakup perlakuan shader mikro-metalik dan lighting bioskop.';
                } else if (low.includes('master') || low.includes('format')) {
                    ans = 'Deliverables standar kami mencakup Apple ProRes 4444 XQ, OpenEXR 32-bit float, still renders 8K untuk OOH, serta file audio uncompressed 48kHz/24-bit.';
                } else if (low.includes('nda') || low.includes('rahasia')) {
                    ans = 'Kami selalu menandatangani Non-Disclosure Agreement (NDA) sebelum menerima materi CAD atau konsep kampanye Anda demi keamanan mutlak rahasia dagang.';
                }

                const b = document.createElement('div');
                b.className = 'p-3 rounded-xl bg-white border border-champagne-300 text-stone-900';
                b.innerHTML = '<strong>AuraMotion AI:</strong> ' + ans;
                stream.appendChild(b);
                stream.scrollTop = stream.scrollHeight;
            }, 500);
        }

        function handleBriefSubmit(e) {
            e.preventDefault();
            document.getElementById('briefForm').classList.add('opacity-50', 'pointer-events-none');
            setTimeout(() => {
                document.getElementById('brief-success').classList.remove('hidden');
            }, 400);
        }
    </script>

</body>
</html>
