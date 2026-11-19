<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FrostyAgro Equipment — Perlengkapan &amp; Peralatan Pertanian Playful &amp; Colorful Arctic Frost</title>
    <meta name="description" content="FrostyAgro Equipment adalah distributor perlengkapan dan peralatan pertanian cerdas bergaya Playful & Colorful bernuansa Arctic Frost. Hadirkan mini tractor, drone semprot robotik, dan alat tani modern yang ceria dan bertenaga!">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Outfit:wght@400;500;600;700;800;900&family=JetBrains+Mono:wght@400;600&display=swap" rel="stylesheet">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                        outfit: ['"Outfit"', 'sans-serif'],
                        mono: ['"JetBrains Mono"', 'monospace'],
                    },
                    colors: {
                        frost: {
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
                            950: '#031e33',
                        },
                        pop: {
                            pink: '#f472b6',
                            rose: '#fb7185',
                            yellow: '#facc15',
                            lime: '#4ade80',
                            purple: '#a855f7',
                            cyan: '#06b6d4',
                            coral: '#fb923c',
                        }
                    },
                    animation: {
                        'bounce-gentle': 'bounceSoft 3s ease-in-out infinite',
                        'float-candy': 'floatCandy 5s ease-in-out infinite',
                        'spin-slow': 'spin 18s linear infinite',
                    },
                    keyframes: {
                        bounceSoft: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-8px)' },
                        },
                        floatCandy: {
                            '0%, 100%': { transform: 'translateY(0px) rotate(0deg)' },
                            '50%': { transform: 'translateY(-12px) rotate(2deg)' },
                        }
                    }
                }
            }
        }
    </script>

    <style>
        .frost-bubble-bg {
            background-color: #f0f9ff;
            background-image: 
                radial-gradient(circle at 10% 20%, rgba(56, 189, 248, 0.18) 0px, transparent 40%),
                radial-gradient(circle at 90% 30%, rgba(244, 114, 182, 0.15) 0px, transparent 40%),
                radial-gradient(circle at 50% 85%, rgba(74, 222, 128, 0.14) 0px, transparent 45%),
                radial-gradient(circle at 80% 80%, rgba(168, 85, 247, 0.12) 0px, transparent 35%);
        }
        .bubbly-card {
            background: rgba(255, 255, 255, 0.88);
            backdrop-filter: blur(12px);
            border: 2px solid #bae6fd;
            transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
        }
        .bubbly-card:hover {
            transform: translateY(-6px) scale(1.01);
            border-color: #38bdf8;
            box-shadow: 0 20px 35px -10px rgba(14, 165, 233, 0.22);
        }
        .pop-shadow {
            box-shadow: 4px 4px 0px #0284c7;
        }
        .pop-shadow-pink {
            box-shadow: 4px 4px 0px #db2777;
        }
        .pop-shadow-lime {
            box-shadow: 4px 4px 0px #16a34a;
        }
        .pop-shadow-yellow {
            box-shadow: 4px 4px 0px #ca8a04;
        }
    </style>
</head>

<body class="bg-frost-50 text-slate-800 font-sans antialiased overflow-x-hidden frost-bubble-bg selection:bg-pop-cyan selection:text-white">

    <!-- PLAYFUL COLORFUL STICKER ACCENTS -->
    <div class="fixed inset-0 pointer-events-none z-0 overflow-hidden">
        <div class="absolute top-20 left-10 w-24 h-24 rounded-full bg-pop-pink/20 blur-xl animate-float-candy"></div>
        <div class="absolute top-1/2 -right-12 w-48 h-48 rounded-full bg-frost-300/30 blur-2xl animate-bounce-gentle"></div>
        <div class="absolute bottom-20 left-1/3 w-36 h-36 rounded-full bg-pop-lime/25 blur-xl"></div>
    </div>

    <!-- TOPBAR: Playful Arctic Announcement -->
    <aside aria-label="Pengumuman Ceria" class="relative z-50 bg-gradient-to-r from-frost-900 via-frost-800 to-frost-950 text-white text-xs py-2 px-4 border-b-2 border-frost-400">
        <div class="max-w-7xl mx-auto flex flex-wrap items-center justify-between gap-3">
            <div class="flex items-center gap-2 font-mono text-[11px] text-frost-200">
                <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full font-bold bg-pop-pink text-white pop-shadow-pink text-[10px]">
                    🎉 PROMO SPESIAL PETANI CERIA
                </span>
                <span class="hidden sm:inline">Diskon Panen Raya 15% + Garansi Tukar Baru 1 Tahun untuk Semua Alat &amp; Drone!</span>
            </div>
            <div class="flex items-center gap-4 text-[11px] font-mono">
                <span class="text-frost-300">Hub Servis Cepat: Seluruh Indonesia</span>
                <a href="#simulator" class="text-pop-yellow hover:underline font-bold transition">Uji Simulasi Panen &rarr;</a>
            </div>
        </div>
    </aside>

    <!-- PLAYFUL NAVBAR -->
    <header class="sticky top-0 z-40 bg-white/90 backdrop-blur-md border-b-2 border-frost-200 shadow-sm transition-all">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
            
            <!-- Logo -->
            <a href="#" class="flex items-center gap-3 group">
                <div class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-frost-500 via-pop-cyan to-pop-lime p-1 shadow-md group-hover:rotate-6 transition-transform">
                    <div class="w-full h-full bg-white rounded-xl flex items-center justify-center text-frost-600 font-extrabold text-2xl font-outfit">
                        🚜
                    </div>
                </div>
                <div>
                    <span class="font-outfit font-black text-2xl tracking-tight text-frost-950 flex items-center gap-1">
                        Frosty<span class="text-transparent bg-clip-text bg-gradient-to-r from-frost-600 to-pop-pink">Agro</span>
                        <span class="text-xs px-2 py-0.5 rounded-full bg-pop-yellow text-slate-900 font-bold ml-1">v4.2</span>
                    </span>
                    <span class="block text-[10px] font-mono uppercase tracking-widest text-frost-700 -mt-1 font-bold">
                        Smart &amp; Playful Farm Gear
                    </span>
                </div>
            </a>

            <!-- Nav Links -->
            <nav class="hidden md:flex items-center gap-7 text-sm font-bold text-slate-700 font-outfit">
                <a href="#katalog" class="hover:text-frost-600 transition">Katalog Ceria</a>
                <a href="#quiz" class="hover:text-pop-pink transition">Kuis Pilih Alat</a>
                <a href="#simulator" class="hover:text-frost-600 transition">Simulasi Panen</a>
                <a href="#paket" class="hover:text-pop-purple transition">Paket Gear</a>
                <a href="#faq" class="hover:text-frost-600 transition">FAQ</a>
            </nav>

            <!-- Buttons -->
            <div class="hidden sm:flex items-center gap-3 font-outfit">
                <button onclick="openFrostyAI()" class="px-4 py-2 rounded-xl text-xs font-bold text-frost-900 bg-frost-100 hover:bg-frost-200 border-2 border-frost-300 transition flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-pop-pink animate-ping"></span>
                    FrostyBot AI
                </button>
                <a href="#demo" class="px-5 py-2.5 rounded-xl font-bold text-xs uppercase tracking-wider text-white bg-gradient-to-r from-frost-500 to-frost-700 hover:from-frost-600 hover:to-frost-800 transition shadow-md pop-shadow">
                    Mulai Bertani Asik &rarr;
                </a>
            </div>

            <!-- Mobile Menu Toggle -->
            <button onclick="toggleMobileMenu()" class="md:hidden p-2 rounded-xl text-slate-700 hover:bg-frost-100" aria-label="Toggle Mobile Menu">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
            </button>
        </div>

        <!-- Mobile Drawer -->
        <div id="mobile-menu" class="hidden md:hidden border-t-2 border-frost-200 bg-white/95 px-6 py-5 space-y-3 font-outfit">
            <a href="#katalog" onclick="toggleMobileMenu()" class="block py-2 text-sm font-bold text-slate-700 hover:text-frost-600">Katalog Alat Ceria</a>
            <a href="#quiz" onclick="toggleMobileMenu()" class="block py-2 text-sm font-bold text-slate-700 hover:text-pop-pink">Kuis Pilih Alat Cocok</a>
            <a href="#simulator" onclick="toggleMobileMenu()" class="block py-2 text-sm font-bold text-slate-700 hover:text-frost-600">Simulasi Panen Melimpah</a>
            <a href="#paket" onclick="toggleMobileMenu()" class="block py-2 text-sm font-bold text-slate-700 hover:text-pop-purple">Pilihan Paket Gear</a>
            <a href="#faq" onclick="toggleMobileMenu()" class="block py-2 text-sm font-bold text-slate-700 hover:text-frost-600">Tanya Jawab (FAQ)</a>
            <div class="pt-3 border-t border-frost-100 flex flex-col gap-2">
                <button onclick="openFrostyAI(); toggleMobileMenu();" class="w-full py-2.5 rounded-xl text-xs font-bold text-frost-900 bg-frost-100 text-center">Buka FrostyBot AI Chat</button>
                <a href="#demo" onclick="toggleMobileMenu()" class="w-full py-2.5 rounded-xl text-xs font-bold text-white bg-frost-600 text-center uppercase tracking-wider">Coba Demo Unit di Sawah</a>
            </div>
        </div>
    </header>

    <main class="relative z-10">

        <!-- HERO SECTION: Playful & Colorful Arctic Frost -->
        <section class="relative pt-12 pb-24 overflow-hidden">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid lg:grid-cols-12 gap-12 items-center">
                    
                    <!-- Left Hero Text -->
                    <div class="lg:col-span-7 space-y-6">
                        
                        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white border-2 border-frost-300 text-frost-800 text-xs font-mono font-bold tracking-wide shadow-sm">
                            <span class="text-base">❄️</span>
                            PLAYFUL &amp; SMART FARM GEAR // ARCTIC EDITION
                        </div>

                        <h1 class="font-outfit font-black text-4xl sm:text-5xl lg:text-6xl text-frost-950 leading-[1.12]">
                            Bertani Ceria &amp; Canggih,<br>
                            <span class="text-transparent bg-clip-text bg-gradient-to-r from-frost-600 via-pop-cyan to-pop-pink">
                                Bikin Panen Makin Melimpah!
                            </span>
                        </h1>

                        <p class="text-base sm:text-lg text-slate-600 leading-relaxed max-w-2xl font-medium">
                            Siapa bilang alat tani harus kaku dan membosankan? FrostyAgro menghadirkan mini traktor lincah, drone robotik sebar benih, dan sensorik pintar berdesain ceria warna Arctic Frost yang siap bikin pekerjaan di sawah &amp; kebun 5x lebih ringan!
                        </p>

                        <!-- CTA Group -->
                        <div class="pt-2 flex flex-wrap items-center gap-4 font-outfit">
                            <a href="#quiz" class="px-7 py-3.5 rounded-2xl font-extrabold text-sm uppercase tracking-wider text-white bg-gradient-to-r from-frost-500 via-pop-cyan to-frost-600 hover:from-frost-600 hover:to-frost-700 transition shadow-lg pop-shadow flex items-center gap-2">
                                <span>Ikuti Kuis Pilih Alat (1 Menit)</span>
                                <span class="text-lg">🎯</span>
                            </a>
                            <a href="#demo" class="px-6 py-3.5 rounded-2xl font-bold text-sm text-frost-900 bg-white hover:bg-frost-50 border-2 border-frost-300 transition flex items-center gap-2">
                                <span>Booking Demo Lapangan</span>
                                <span class="text-lg">🚜</span>
                            </a>
                        </div>

                        <!-- Cheerful Stats Pills -->
                        <div class="pt-8 border-t-2 border-frost-200 grid grid-cols-3 gap-4 font-outfit">
                            <div class="p-3 bg-white/80 rounded-2xl border border-frost-200 text-center">
                                <span class="text-2xl font-black text-frost-600">3.400+</span>
                                <span class="text-xs text-slate-500 block font-bold">Sahabat Petani Ceria</span>
                            </div>
                            <div class="p-3 bg-white/80 rounded-2xl border border-frost-200 text-center">
                                <span class="text-2xl font-black text-pop-pink">99.4%</span>
                                <span class="text-xs text-slate-500 block font-bold">Tingkat Kepuasan</span>
                            </div>
                            <div class="p-3 bg-white/80 rounded-2xl border border-frost-200 text-center">
                                <span class="text-2xl font-black text-pop-lime">5 Menit</span>
                                <span class="text-xs text-slate-500 block font-bold">Paham Cara Pakai</span>
                            </div>
                        </div>

                    </div>

                    <!-- Right Column: Interactive Bubbly Machinery Showcase -->
                    <div class="lg:col-span-5 relative">
                        <div class="bubbly-card rounded-3xl p-7 space-y-6 shadow-2xl relative overflow-hidden bg-white/95">
                            
                            <!-- Header Card -->
                            <div class="flex items-center justify-between pb-4 border-b-2 border-frost-100">
                                <div class="flex items-center gap-2">
                                    <span class="w-3 h-3 rounded-full bg-pop-pink animate-ping"></span>
                                    <span class="font-outfit font-black text-xs uppercase tracking-wider text-frost-900">
                                        GEAR UNGGULAN MUSIM INI
                                    </span>
                                </div>
                                <span class="px-3 py-1 rounded-full bg-pop-yellow text-slate-900 font-outfit font-black text-xs">
                                    BEST SELLER 🌟
                                </span>
                            </div>

                            <!-- Model Selector Pills -->
                            <div class="grid grid-cols-3 gap-2">
                                <button onclick="switchPlayfulModel('minitractor')" id="btn-play-minitractor" class="py-2 px-3 rounded-xl text-xs font-outfit font-bold bg-frost-600 text-white transition pop-shadow">
                                    Mini Traktor
                                </button>
                                <button onclick="switchPlayfulModel('dronebot')" id="btn-play-dronebot" class="py-2 px-3 rounded-xl text-xs font-outfit font-bold bg-frost-100 text-slate-700 hover:bg-frost-200 transition">
                                    Drone Bot
                                </button>
                                <button onclick="switchPlayfulModel('hydrobox')" id="btn-play-hydrobox" class="py-2 px-3 rounded-xl text-xs font-outfit font-bold bg-frost-100 text-slate-700 hover:bg-frost-200 transition">
                                    Smart Hydro
                                </button>
                            </div>

                            <!-- Showcase Display Box -->
                            <div class="p-5 rounded-2xl bg-gradient-to-br from-frost-100 via-white to-frost-50 border-2 border-frost-200 space-y-4 font-outfit">
                                <div class="flex items-start justify-between">
                                    <div>
                                        <span class="text-2xl" id="hero-emoji">🚜</span>
                                        <h3 class="font-black text-xl text-frost-950 mt-1" id="hero-title">
                                            FrostyRider Mini-Tractor 35
                                        </h3>
                                        <p class="text-xs text-slate-500 font-medium" id="hero-sub">
                                            Traktor imut bertenaga badak untuk sawah sempit &amp; kebun buah
                                        </p>
                                    </div>
                                </div>

                                <!-- Dynamic Specs -->
                                <div class="grid grid-cols-2 gap-2 text-xs">
                                    <div class="p-2.5 bg-white rounded-xl border border-frost-200">
                                        <span class="text-[10px] text-slate-400 font-mono block">Daya Kuda</span>
                                        <strong class="text-frost-900 text-sm" id="hero-spec1">35 HP Eco-Power</strong>
                                    </div>
                                    <div class="p-2.5 bg-white rounded-xl border border-frost-200">
                                        <span class="text-[10px] text-slate-400 font-mono block">Berat Mesin</span>
                                        <strong class="text-frost-900 text-sm" id="hero-spec2">Ringan Anti-Ambles</strong>
                                    </div>
                                    <div class="p-2.5 bg-white rounded-xl border border-frost-200">
                                        <span class="text-[10px] text-slate-400 font-mono block">Fitur Unik</span>
                                        <strong class="text-frost-900 text-sm" id="hero-spec3">Koneksi Bluetooth HP</strong>
                                    </div>
                                    <div class="p-2.5 bg-white rounded-xl border border-frost-200">
                                        <span class="text-[10px] text-slate-400 font-mono block">Garansi</span>
                                        <strong class="text-pop-pink text-sm" id="hero-spec4">Tukar Baru 1 Tahun</strong>
                                    </div>
                                </div>
                            </div>

                            <a href="#demo" class="block w-full py-3 rounded-2xl text-center font-outfit font-black text-xs uppercase tracking-wider text-white bg-gradient-to-r from-pop-pink to-pop-rose hover:opacity-95 transition shadow-md pop-shadow-pink">
                                Minta Uji Coba Gratis di Kebun Anda &rarr;
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- BRAND & COMMUNITY MARQUEE -->
        <section class="py-6 bg-white border-y-2 border-frost-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-wrap items-center justify-center gap-8 md:gap-14 font-outfit font-black text-slate-400 text-sm md:text-base">
                    <span class="hover:text-frost-600 transition flex items-center gap-2">🌱 KOMUNITAS PETANI MUDA</span>
                    <span class="hover:text-pop-pink transition flex items-center gap-2">⭐ URBAN FARMING INDONESIA</span>
                    <span class="hover:text-pop-lime transition flex items-center gap-2">🍎 AGRI-KREATIF NUSANTARA</span>
                    <span class="hover:text-frost-600 transition flex items-center gap-2">🚜 GABUNGAN GAPOKTAN MILENIAL</span>
                    <span class="hover:text-pop-purple transition flex items-center gap-2">💧 HYDROPONIC SMART CLUB</span>
                </div>
            </div>
        </section>

        <!-- SMART GEAR PICKER QUIZ (INTERACTIVE PLAYFUL TOOL) -->
        <section id="quiz" class="py-20 bg-gradient-to-b from-white via-frost-50 to-white border-b-2 border-frost-200">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">
                
                <div class="text-center space-y-3">
                    <span class="px-3.5 py-1.5 rounded-full bg-pop-pink text-white font-mono text-xs font-bold pop-shadow-pink inline-block">
                        INTERACTIVE GEAR MATCHMAKER
                    </span>
                    <h2 class="font-outfit font-black text-3xl sm:text-4xl text-frost-950">
                        Bingung Pilih Alat? Ikuti Kuis 1 Menit! 🎯
                    </h2>
                    <p class="text-slate-600 text-sm font-medium">
                        Jawab 2 pertanyaan singkat di bawah, dan asisten cerdas kami akan langsung memberikan rekomendasi paket mesin paling pas untuk lahan Anda.
                    </p>
                </div>

                <!-- Quiz Card -->
                <div class="bubbly-card rounded-3xl p-8 space-y-8 bg-white font-outfit">
                    
                    <!-- Question 1 -->
                    <div>
                        <label class="block font-black text-base text-frost-950 mb-3">
                            1. Apa jenis lahan pertanian utama Anda?
                        </label>
                        <div class="grid sm:grid-cols-3 gap-3">
                            <button onclick="selectQuizQ1('sawah')" id="quiz-q1-sawah" class="p-4 rounded-2xl border-2 border-frost-500 bg-frost-50 text-frost-900 font-bold text-sm text-left transition flex items-center gap-3">
                                <span class="text-2xl">🌾</span> Sawah Padi Basah
                            </button>
                            <button onclick="selectQuizQ1('kebun')" id="quiz-q1-kebun" class="p-4 rounded-2xl border-2 border-slate-200 bg-white text-slate-700 font-bold text-sm text-left hover:border-frost-300 transition flex items-center gap-3">
                                <span class="text-2xl">🌽</span> Kebun Sayur / Palawija
                            </button>
                            <button onclick="selectQuizQ1('greenhouse')" id="quiz-q1-greenhouse" class="p-4 rounded-2xl border-2 border-slate-200 bg-white text-slate-700 font-bold text-sm text-left hover:border-frost-300 transition flex items-center gap-3">
                                <span class="text-2xl">🏡</span> Greenhouse / Hidroponik
                            </button>
                        </div>
                    </div>

                    <!-- Question 2 -->
                    <div>
                        <label class="block font-black text-base text-frost-950 mb-3">
                            2. Berapa perkiraan luas lahan yang Anda kelola?
                        </label>
                        <div class="grid sm:grid-cols-3 gap-3">
                            <button onclick="selectQuizQ2('small')" id="quiz-q2-small" class="p-4 rounded-2xl border-2 border-frost-500 bg-frost-50 text-frost-900 font-bold text-sm text-left transition flex items-center gap-3">
                                <span class="text-2xl">🤏</span> &lt; 1 Hektar (Skala Kecil)
                            </button>
                            <button onclick="selectQuizQ2('medium')" id="quiz-q2-medium" class="p-4 rounded-2xl border-2 border-slate-200 bg-white text-slate-700 font-bold text-sm text-left hover:border-frost-300 transition flex items-center gap-3">
                                <span class="text-2xl">🌿</span> 1 - 5 Hektar (Menengah)
                            </button>
                            <button onclick="selectQuizQ2('large')" id="quiz-q2-large" class="p-4 rounded-2xl border-2 border-slate-200 bg-white text-slate-700 font-bold text-sm text-left hover:border-frost-300 transition flex items-center gap-3">
                                <span class="text-2xl">🚜</span> &gt; 5 Hektar (Komersial)
                            </button>
                        </div>
                    </div>

                    <!-- Result Box -->
                    <div id="quiz-result-box" class="p-6 rounded-2xl bg-gradient-to-r from-frost-100 via-pop-cyan/10 to-frost-50 border-2 border-frost-400 space-y-3">
                        <div class="flex items-center gap-2">
                            <span class="text-xl">✨</span>
                            <span class="font-black text-sm uppercase tracking-wider text-frost-900">Rekomendasi Paket Cocok:</span>
                        </div>
                        <h4 class="font-black text-xl text-frost-950" id="quiz-res-title">
                            Paket Starter Sawah: FrostyRider Mini-Tractor 35 + Bajak Rotary
                        </h4>
                        <p class="text-xs text-slate-600 font-medium" id="quiz-res-desc">
                            Cocok sekali untuk petak sawah berteras dengan waktu olah tanah 3x lebih cepat tanpa merusak struktur tanah.
                        </p>
                        <div class="pt-2 flex flex-wrap gap-3">
                            <a href="#demo" class="px-5 py-2.5 rounded-xl font-bold text-xs uppercase text-white bg-frost-600 hover:bg-frost-700 transition pop-shadow">
                                Konsultasikan Paket Ini
                            </a>
                            <button onclick="openFrostyAI()" class="px-5 py-2.5 rounded-xl font-bold text-xs bg-white text-frost-900 border-2 border-frost-300 hover:bg-frost-50 transition">
                                Tanya FrostyBot AI
                            </button>
                        </div>
                    </div>

                </div>

            </div>
        </section>

        <!-- PRODUCT CATALOG: Bubbly Cards -->
        <section id="katalog" class="py-24">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                
                <div class="text-center max-w-2xl mx-auto mb-16 space-y-3 font-outfit">
                    <span class="px-3 py-1 rounded-full bg-frost-200 text-frost-900 text-xs font-mono font-bold uppercase inline-block">
                        FROST FARM COLLECTION
                    </span>
                    <h2 class="font-black text-3xl sm:text-4xl text-frost-950">
                        Peralatan &amp; Mesin Tani Serba Asik
                    </h2>
                    <p class="text-slate-600 text-sm font-medium">
                        Kualitas industri berstandar SNI dengan sentuhan estetika ceria dan kemudahan pengoperasian tanpa ribet!
                    </p>
                </div>

                <!-- Catalog Grid -->
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 font-outfit">
                    
                    <!-- Item 1 -->
                    <div class="bubbly-card rounded-3xl p-6 space-y-4 flex flex-col justify-between">
                        <div class="space-y-3">
                            <div class="flex justify-between items-center text-xs font-mono">
                                <span class="px-2.5 py-0.5 rounded-full bg-frost-200 text-frost-900 font-bold">Mini Traktor</span>
                                <span class="text-slate-400">SERI FR-35</span>
                            </div>
                            <h3 class="font-black text-xl text-frost-950">FrostyRider Mini-Tractor 35</h3>
                            <p class="text-xs text-slate-600 font-medium leading-relaxed">
                                Traktor mini roda empat yang lincah bermanuver di gang sempit dan sawah terasering. Dilengkapi tombol starter elektrik instan.
                            </p>
                            <div class="p-3 bg-frost-50 rounded-2xl text-xs space-y-1.5 font-mono border border-frost-200">
                                <div class="flex justify-between"><span class="text-slate-500">Kapasitas Kerja:</span> <strong class="text-frost-900">1 Ha / 2 Jam</strong></div>
                                <div class="flex justify-between"><span class="text-slate-500">Tenaga Mesin:</span> <strong class="text-frost-900">35 HP Silent-Diesel</strong></div>
                                <div class="flex justify-between"><span class="text-slate-500">Warna Body:</span> <strong class="text-frost-600">Arctic Cyan &amp; Pop White</strong></div>
                            </div>
                        </div>
                        <div class="pt-4 border-t-2 border-frost-100 flex items-center justify-between">
                            <span class="text-xs font-mono text-pop-pink font-bold">Garansi 2 Tahun</span>
                            <a href="#demo" class="px-4 py-2 rounded-xl bg-frost-600 hover:bg-frost-700 text-white font-bold text-xs pop-shadow">Minta Brosur</a>
                        </div>
                    </div>

                    <!-- Item 2 -->
                    <div class="bubbly-card rounded-3xl p-6 space-y-4 flex flex-col justify-between">
                        <div class="space-y-3">
                            <div class="flex justify-between items-center text-xs font-mono">
                                <span class="px-2.5 py-0.5 rounded-full bg-pop-pink/20 text-pop-pink font-bold">Drone Robotik</span>
                                <span class="text-slate-400">SERI DR-20</span>
                            </div>
                            <h3 class="font-black text-xl text-frost-950">FrostySky HexaDrone Sprayer</h3>
                            <p class="text-xs text-slate-600 font-medium leading-relaxed">
                                Drone robotik penyemprot pupuk dan pestisida berkecepatan tinggi dengan sensor penghindar pohon otomatis dan auto-return to home.
                            </p>
                            <div class="p-3 bg-frost-50 rounded-2xl text-xs space-y-1.5 font-mono border border-frost-200">
                                <div class="flex justify-between"><span class="text-slate-500">Kapasitas Tangki:</span> <strong class="text-frost-900">20 Liter Cairan</strong></div>
                                <div class="flex justify-between"><span class="text-slate-500">Kecepatan:</span> <strong class="text-frost-900">10 Menit / Hektar</strong></div>
                                <div class="flex justify-between"><span class="text-slate-500">Pilot Training:</span> <strong class="text-frost-900">Gratis Sampai Mahir</strong></div>
                            </div>
                        </div>
                        <div class="pt-4 border-t-2 border-frost-100 flex items-center justify-between">
                            <span class="text-xs font-mono text-pop-pink font-bold">Swap Unit Cepat</span>
                            <a href="#demo" class="px-4 py-2 rounded-xl bg-frost-600 hover:bg-frost-700 text-white font-bold text-xs pop-shadow">Minta Brosur</a>
                        </div>
                    </div>

                    <!-- Item 3 -->
                    <div class="bubbly-card rounded-3xl p-6 space-y-4 flex flex-col justify-between">
                        <div class="space-y-3">
                            <div class="flex justify-between items-center text-xs font-mono">
                                <span class="px-2.5 py-0.5 rounded-full bg-pop-lime/20 text-slate-900 font-bold">Smart Hydro</span>
                                <span class="text-slate-400">SERI GH-100</span>
                            </div>
                            <h3 class="font-black text-xl text-frost-950">FrostyGreen Smart Greenhouse Kit</h3>
                            <p class="text-xs text-slate-600 font-medium leading-relaxed">
                                Modul greenhouse portabel dengan sirkulasi nutrisi otomatis, misting nozzle pendingin suhu, dan lampu LED tumbuh fotosintesis.
                            </p>
                            <div class="p-3 bg-frost-50 rounded-2xl text-xs space-y-1.5 font-mono border border-frost-200">
                                <div class="flex justify-between"><span class="text-slate-500">Lubang Tanam:</span> <strong class="text-frost-900">600 Titik Sayuran</strong></div>
                                <div class="flex justify-between"><span class="text-slate-500">Otomasi:</span> <strong class="text-frost-900">Kontrol Suhu &amp; pH Otomatis</strong></div>
                                <div class="flex justify-between"><span class="text-slate-500">Hemat Air:</span> <strong class="text-frost-900">Hingga 85% Lebih Efisien</strong></div>
                            </div>
                        </div>
                        <div class="pt-4 border-t-2 border-frost-100 flex items-center justify-between">
                            <span class="text-xs font-mono text-pop-pink font-bold">Plug &amp; Play</span>
                            <a href="#demo" class="px-4 py-2 rounded-xl bg-frost-600 hover:bg-frost-700 text-white font-bold text-xs pop-shadow">Minta Brosur</a>
                        </div>
                    </div>

                    <!-- Item 4 -->
                    <div class="bubbly-card rounded-3xl p-6 space-y-4 flex flex-col justify-between">
                        <div class="space-y-3">
                            <div class="flex justify-between items-center text-xs font-mono">
                                <span class="px-2.5 py-0.5 rounded-full bg-pop-yellow text-slate-900 font-bold">Panen Cepat</span>
                                <span class="text-slate-400">SERI CH-60</span>
                            </div>
                            <h3 class="font-black text-xl text-frost-950">FrostyHarvest Mini Combine</h3>
                            <p class="text-xs text-slate-600 font-medium leading-relaxed">
                                Mesin pemanen dan perontok gabah kompak yang tidak merusak pematang sawah. Mengurangi butir gabah tercecer hingga di bawah 1%.
                            </p>
                            <div class="p-3 bg-frost-50 rounded-2xl text-xs space-y-1.5 font-mono border border-frost-200">
                                <div class="flex justify-between"><span class="text-slate-500">Kapasitas Panen:</span> <strong class="text-frost-900">0.8 Ha / Jam</strong></div>
                                <div class="flex justify-between"><span class="text-slate-500">Tangki Karung:</span> <strong class="text-frost-900">Auto-Bagger System</strong></div>
                                <div class="flex justify-between"><span class="text-slate-500">Konsumsi BBM:</span> <strong class="text-frost-900">3.5 Liter Solar / Ha</strong></div>
                            </div>
                        </div>
                        <div class="pt-4 border-t-2 border-frost-100 flex items-center justify-between">
                            <span class="text-xs font-mono text-pop-pink font-bold">Siap Panen Raya</span>
                            <a href="#demo" class="px-4 py-2 rounded-xl bg-frost-600 hover:bg-frost-700 text-white font-bold text-xs pop-shadow">Minta Brosur</a>
                        </div>
                    </div>

                    <!-- Item 5 -->
                    <div class="bubbly-card rounded-3xl p-6 space-y-4 flex flex-col justify-between">
                        <div class="space-y-3">
                            <div class="flex justify-between items-center text-xs font-mono">
                                <span class="px-2.5 py-0.5 rounded-full bg-pop-purple/20 text-pop-purple font-bold">Sensorik IoT</span>
                                <span class="text-slate-400">SERI SOIL-POD</span>
                            </div>
                            <h3 class="font-black text-xl text-frost-950">FrostySense IoT Soil Buddy</h3>
                            <p class="text-xs text-slate-600 font-medium leading-relaxed">
                                Tongkat sensor ceria yang ditancapkan ke tanah untuk memantau kadar air, unsur hara NPK, dan suhu tanah langsung ke smartphone Anda.
                            </p>
                            <div class="p-3 bg-frost-50 rounded-2xl text-xs space-y-1.5 font-mono border border-frost-200">
                                <div class="flex justify-between"><span class="text-slate-500">Baterai:</span> <strong class="text-frost-900">Surya Mandiri 3 Tahun</strong></div>
                                <div class="flex justify-between"><span class="text-slate-500">Koneksi:</span> <strong class="text-frost-900">Bluetooth + 4G Auto Sync</strong></div>
                                <div class="flex justify-between"><span class="text-slate-500">Notifikasi:</span> <strong class="text-frost-900">Alert WhatsApp Tani</strong></div>
                            </div>
                        </div>
                        <div class="pt-4 border-t-2 border-frost-100 flex items-center justify-between">
                            <span class="text-xs font-mono text-pop-pink font-bold">App Gratis</span>
                            <a href="#demo" class="px-4 py-2 rounded-xl bg-frost-600 hover:bg-frost-700 text-white font-bold text-xs pop-shadow">Minta Brosur</a>
                        </div>
                    </div>

                    <!-- Item 6 -->
                    <div class="bubbly-card rounded-3xl p-6 space-y-4 flex flex-col justify-between">
                        <div class="space-y-3">
                            <div class="flex justify-between items-center text-xs font-mono">
                                <span class="px-2.5 py-0.5 rounded-full bg-frost-200 text-frost-900 font-bold">Irigasi Cerdas</span>
                                <span class="text-slate-400">SERI DRIP-EZ</span>
                            </div>
                            <h3 class="font-black text-xl text-frost-950">FrostyDrop Smart Solar Drip</h3>
                            <p class="text-xs text-slate-600 font-medium leading-relaxed">
                                Sistem irigasi tetes presisi berbasis panel surya yang menyiram tanaman secara otomatis saat tanah mulai kering. Hemat tenaga manusia!
                            </p>
                            <div class="p-3 bg-frost-50 rounded-2xl text-xs space-y-1.5 font-mono border border-frost-200">
                                <div class="flex justify-between"><span class="text-slate-500">Cakupan Lahan:</span> <strong class="text-frost-900">Hingga 2 Hektar / Kit</strong></div>
                                <div class="flex justify-between"><span class="text-slate-500">Pipa Tahan UV:</span> <strong class="text-frost-900">Garansi 5 Tahun</strong></div>
                                <div class="flex justify-between"><span class="text-slate-500">Instalasi:</span> <strong class="text-frost-900">Mudah Pasang Sendiri</strong></div>
                            </div>
                        </div>
                        <div class="pt-4 border-t-2 border-frost-100 flex items-center justify-between">
                            <span class="text-xs font-mono text-pop-pink font-bold">Zero Listrik PLN</span>
                            <a href="#demo" class="px-4 py-2 rounded-xl bg-frost-600 hover:bg-frost-700 text-white font-bold text-xs pop-shadow">Minta Brosur</a>
                        </div>
                    </div>

                </div>

            </div>
        </section>

        <!-- INTERACTIVE HARVEST FUN SIMULATOR -->
        <section id="simulator" class="py-24 bg-white border-y-2 border-frost-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                
                <div class="grid lg:grid-cols-12 gap-12 items-center">
                    
                    <div class="lg:col-span-5 space-y-6 font-outfit">
                        <span class="px-3.5 py-1.5 rounded-full bg-pop-lime text-slate-900 text-xs font-mono font-bold pop-shadow-lime inline-block">
                            HARVEST FUN SIMULATOR
                        </span>
                        <h2 class="font-black text-3xl sm:text-4xl text-frost-950 leading-tight">
                            Hitung Waktu &amp; Senyum yang Bisa Anda Hemat! 🌾
                        </h2>
                        <p class="text-slate-600 text-sm font-medium leading-relaxed">
                            Bandingkan cara bertani manual yang melelahkan dengan kombinasi alat cerdas FrostyAgro. Geser slider di samping untuk melihat perkiraan panen dan efisiensi!
                        </p>

                        <div class="p-4 bg-frost-50 rounded-2xl border-2 border-frost-200 text-xs space-y-2">
                            <div class="font-black text-frost-900 flex items-center gap-2">
                                <span class="text-base">💡</span> Fakta Menarik:
                            </div>
                            <p class="text-slate-600 font-medium">
                                Penggunaan mini traktor dan drone bot memangkas 70% keletihan fisik petani dan mengembalikan waktu luang berharga bersama keluarga.
                            </p>
                        </div>
                    </div>

                    <!-- Simulator Box -->
                    <div class="lg:col-span-7 bubbly-card rounded-3xl p-8 border-2 border-frost-300 space-y-6 font-outfit">
                        
                        <div class="space-y-6">
                            <!-- Slider 1 -->
                            <div>
                                <div class="flex justify-between items-center text-xs font-bold mb-2">
                                    <label for="sim-area" class="text-slate-700">Luas Lahan yang Digarap (Hektar):</label>
                                    <span class="text-frost-700 font-black text-sm" id="sim-lbl-area">5 Hektar</span>
                                </div>
                                <input type="range" id="sim-area" min="1" max="50" step="1" value="5" oninput="runPlayfulSim()"
                                    class="w-full h-3 bg-frost-200 rounded-lg appearance-none cursor-pointer accent-frost-600">
                            </div>

                            <!-- Slider 2 -->
                            <div>
                                <div class="flex justify-between items-center text-xs font-bold mb-2">
                                    <label for="sim-worker" class="text-slate-700">Jumlah Pekerja Lahan Saat Ini:</label>
                                    <span class="text-frost-700 font-black text-sm" id="sim-lbl-worker">4 Orang</span>
                                </div>
                                <input type="range" id="sim-worker" min="1" max="20" step="1" value="4" oninput="runPlayfulSim()"
                                    class="w-full h-3 bg-frost-200 rounded-lg appearance-none cursor-pointer accent-frost-600">
                            </div>
                        </div>

                        <!-- Results -->
                        <div class="p-6 rounded-2xl bg-frost-50 border-2 border-frost-200 grid sm:grid-cols-3 gap-4 text-center">
                            <div>
                                <span class="text-[10px] font-mono font-bold text-slate-400 uppercase block">Waktu Selesai Olah</span>
                                <span class="font-black text-2xl text-frost-600 mt-1 block" id="sim-res-days">2 Hari</span>
                                <span class="text-[10px] text-slate-500 font-medium">vs 12 Hari Cangkul</span>
                            </div>
                            <div>
                                <span class="text-[10px] font-mono font-bold text-slate-400 uppercase block">Hemat Biaya Upah</span>
                                <span class="font-black text-2xl text-pop-pink mt-1 block" id="sim-res-money">Rp 6,8 Jt</span>
                                <span class="text-[10px] text-slate-500 font-medium">per musim panen</span>
                            </div>
                            <div>
                                <span class="text-[10px] font-mono font-bold text-slate-400 uppercase block">Senyum Petani Meter</span>
                                <span class="font-black text-2xl text-pop-lime mt-1 block">100% Ceria 😄</span>
                                <span class="text-[10px] text-slate-500 font-medium">bebas pegal linu</span>
                            </div>
                        </div>

                        <div class="text-center pt-2">
                            <a href="#demo" class="inline-flex items-center gap-2 px-6 py-3.5 rounded-2xl font-black text-xs uppercase tracking-wider text-white bg-gradient-to-r from-frost-500 to-frost-700 hover:from-frost-600 hover:to-frost-800 transition pop-shadow">
                                Realisasikan Penghematan Ini Sekarang &rarr;
                            </a>
                        </div>

                    </div>

                </div>

            </div>
        </section>

        <!-- PACKAGES: Playful & Colorful Pricing -->
        <section id="paket" class="py-24">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                
                <div class="text-center max-w-2xl mx-auto mb-16 space-y-3 font-outfit">
                    <span class="px-3.5 py-1.5 rounded-full bg-pop-purple text-white text-xs font-mono font-bold pop-shadow inline-block">
                        PAKET GEAR TANI
                    </span>
                    <h2 class="font-black text-3xl sm:text-4xl text-frost-950">
                        Pilihan Investasi yang Bersahabat
                    </h2>
                    <p class="text-slate-600 text-sm font-medium">
                        Bisa tunai maupun skema cicilan musim panen ringan bekerjasama dengan bank BUMN dan koperasi tani.
                    </p>
                </div>

                <div class="grid lg:grid-cols-3 gap-8 font-outfit">
                    
                    <!-- Plan 1 -->
                    <div class="bubbly-card rounded-3xl p-8 border-2 border-frost-200 flex flex-col justify-between space-y-8 bg-white">
                        <div class="space-y-4">
                            <span class="px-3 py-1 rounded-full bg-frost-100 text-frost-800 text-xs font-bold font-mono">
                                LEVEL 1 — PEMULA &amp; KEBUN RUMAH
                            </span>
                            <h3 class="font-black text-2xl text-frost-950">Paket Tani Asik</h3>
                            <p class="text-xs text-slate-600 font-medium leading-relaxed">
                                Cocok untuk kebun pekarangan, greenhouse sayuran hidroponik, dan pertanian hobi modern.
                            </p>
                            <div class="pt-4 border-t-2 border-frost-100">
                                <span class="text-3xl font-black text-frost-950">Rp 8.900.000</span>
                                <span class="text-xs text-slate-400 block font-mono mt-1">/ paket lengkap siap tanam</span>
                            </div>
                            <ul class="space-y-2.5 text-xs text-slate-700 font-medium pt-2">
                                <li class="flex items-center gap-2"><span class="text-pop-lime font-bold">✔</span> 1 Kit Smart Greenhouse 600 Lubang</li>
                                <li class="flex items-center gap-2"><span class="text-pop-lime font-bold">✔</span> 1 IoT Soil Buddy + App HP Gratis</li>
                                <li class="flex items-center gap-2"><span class="text-pop-lime font-bold">✔</span> Paket Benih Organik Super 5 Varietas</li>
                                <li class="flex items-center gap-2"><span class="text-pop-lime font-bold">✔</span> Garansi Alat 1 Tahun Ganti Baru</li>
                            </ul>
                        </div>
                        <a href="https://wa.me/6281234567890?text=Halo%20FrostyAgro,%20saya%20tertarik%20dengan%20Paket%20Tani%20Asik" target="_blank" rel="noopener noreferrer" class="block w-full py-3 rounded-2xl text-center font-bold text-xs uppercase tracking-wider bg-frost-100 hover:bg-frost-200 text-frost-900 border-2 border-frost-300 transition">
                            Pilih Paket Tani Asik
                        </a>
                    </div>

                    <!-- Plan 2: Featured -->
                    <div class="bubbly-card rounded-3xl p-8 border-4 border-frost-500 relative flex flex-col justify-between space-y-8 bg-white shadow-2xl scale-105 z-10">
                        <div class="absolute -top-3.5 left-1/2 -translate-x-1/2 px-4 py-1 rounded-full bg-gradient-to-r from-pop-pink to-pop-rose text-white font-mono text-[10px] font-black uppercase tracking-wider pop-shadow-pink">
                            PALING FAVORIT PETANI SAWAH ⭐
                        </div>
                        <div class="space-y-4">
                            <span class="px-3 py-1 rounded-full bg-pop-pink/20 text-pop-pink text-xs font-bold font-mono">
                                LEVEL 2 — SAWAH &amp; KELOMPOK TANI
                            </span>
                            <h3 class="font-black text-2xl text-frost-950">Paket Juara Sawah</h3>
                            <p class="text-xs text-slate-600 font-medium leading-relaxed">
                                Kombinasi mini traktor 35HP dan kit irigasi tetes untuk lahan 1-5 hektar dengan hasil panen maksimal.
                            </p>
                            <div class="pt-4 border-t-2 border-frost-100">
                                <span class="text-3xl font-black text-frost-600">Rp 38.500.000</span>
                                <span class="text-xs text-slate-400 block font-mono mt-1">/ unit lengkap (Bisa Cicil Panen)</span>
                            </div>
                            <ul class="space-y-2.5 text-xs text-slate-800 font-bold pt-2">
                                <li class="flex items-center gap-2"><span class="text-pop-lime">✔</span> 1 Unit FrostyRider Mini-Tractor 35HP</li>
                                <li class="flex items-center gap-2"><span class="text-pop-lime">✔</span> Implemen Bajak Piringan &amp; Rotary Tiller</li>
                                <li class="flex items-center gap-2"><span class="text-pop-lime">✔</span> Pelatihan Operator Gratis di Sawah Anda</li>
                                <li class="flex items-center gap-2"><span class="text-pop-lime">✔</span> Garansi Mesin 2 Tahun + Free Servis 3x</li>
                                <li class="flex items-center gap-2"><span class="text-pop-lime">✔</span> Opsi Angsuran Pasca-Panen (Yarnen)</li>
                            </ul>
                        </div>
                        <a href="https://wa.me/6281234567890?text=Halo%20FrostyAgro,%20saya%20ingin%20berkonsultasi%20Paket%20Juara%20Sawah" target="_blank" rel="noopener noreferrer" class="block w-full py-3.5 rounded-2xl text-center font-black text-xs uppercase tracking-wider text-white bg-gradient-to-r from-frost-500 to-frost-700 hover:from-frost-600 hover:to-frost-800 transition pop-shadow">
                            Ambil Paket Juara Sawah &rarr;
                        </a>
                    </div>

                    <!-- Plan 3 -->
                    <div class="bubbly-card rounded-3xl p-8 border-2 border-frost-200 flex flex-col justify-between space-y-8 bg-white">
                        <div class="space-y-4">
                            <span class="px-3 py-1 rounded-full bg-frost-100 text-frost-800 text-xs font-bold font-mono">
                                LEVEL 3 — PERKEBUNAN &amp; KOMERSIAL
                            </span>
                            <h3 class="font-black text-2xl text-frost-950">Paket Sultan Panen</h3>
                            <p class="text-xs text-slate-600 font-medium leading-relaxed">
                                Solusi mekanisasi skala besar dengan drone bot 20L dan mini combine harvester terpadu.
                            </p>
                            <div class="pt-4 border-t-2 border-frost-100">
                                <span class="text-3xl font-black text-frost-950">Rp 74.000.000</span>
                                <span class="text-xs text-slate-400 block font-mono mt-1">/ full fleet (Leasing BUMN Ready)</span>
                            </div>
                            <ul class="space-y-2.5 text-xs text-slate-700 font-medium pt-2">
                                <li class="flex items-center gap-2"><span class="text-pop-lime font-bold">✔</span> 1 Unit FrostySky HexaDrone Sprayer 20L</li>
                                <li class="flex items-center gap-2"><span class="text-pop-lime font-bold">✔</span> 1 Unit Mini Combine Harvester CH-60</li>
                                <li class="flex items-center gap-2"><span class="text-pop-lime font-bold">✔</span> 2 Paket Sertifikasi Lisensi Pilot Drone</li>
                                <li class="flex items-center gap-2"><span class="text-pop-lime font-bold">✔</span> Prioritas Panggilan Servis Cepat 24 Jam</li>
                            </ul>
                        </div>
                        <a href="https://wa.me/6281234567890?text=Halo%20FrostyAgro,%20kami%20membutuhkan%20Paket%20Sultan%20Panen" target="_blank" rel="noopener noreferrer" class="block w-full py-3 rounded-2xl text-center font-bold text-xs uppercase tracking-wider bg-frost-100 hover:bg-frost-200 text-frost-900 border-2 border-frost-300 transition">
                            Pilih Paket Sultan
                        </a>
                    </div>

                </div>

            </div>
        </section>

        <!-- ACCORDION FAQ -->
        <section id="faq" class="py-24 bg-white border-b-2 border-frost-200">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
                
                <div class="text-center space-y-3 font-outfit">
                    <span class="px-3.5 py-1.5 rounded-full bg-pop-yellow text-slate-900 font-mono text-xs font-bold pop-shadow-yellow inline-block">
                        FREQUENTLY ASKED QUESTIONS
                    </span>
                    <h2 class="font-black text-3xl sm:text-4xl text-frost-950">
                        Tanya Jawab Seputar Alat FrostyAgro
                    </h2>
                </div>

                <div class="space-y-4 font-outfit">
                    
                    <div class="bubbly-card rounded-2xl border-2 border-frost-200 overflow-hidden">
                        <button onclick="toggleFaq(1)" class="w-full p-6 text-left flex justify-between items-center hover:bg-frost-50 transition">
                            <span class="font-bold text-sm sm:text-base text-frost-950">Apakah pemula yang belum pernah mengoperasikan traktor bisa langsung bisa?</span>
                            <span id="faq-ico-1" class="text-frost-700 font-mono text-xl font-bold">+</span>
                        </button>
                        <div id="faq-ans-1" class="hidden px-6 pb-6 text-xs sm:text-sm text-slate-600 font-medium leading-relaxed border-t-2 border-frost-100 pt-4">
                            Tentu saja! Desain kemudi FrostyRider dibuat intuitif seperti mengendarai mobil matic dengan tuas gigi simpel dan tombol starter elektrik. Ditambah lagi, instruktur ramah kami akan mendampingi Anda di sawah sampai mahir.
                        </div>
                    </div>

                    <div class="bubbly-card rounded-2xl border-2 border-frost-200 overflow-hidden">
                        <button onclick="toggleFaq(2)" class="w-full p-6 text-left flex justify-between items-center hover:bg-frost-50 transition">
                            <span class="font-bold text-sm sm:text-base text-frost-950">Bagaimana pengiriman unit ke luar pulau Jawa?</span>
                            <span id="faq-ico-2" class="text-frost-700 font-mono text-xl font-bold">+</span>
                        </button>
                        <div id="faq-ans-2" class="hidden px-6 pb-6 text-xs sm:text-sm text-slate-600 font-medium leading-relaxed border-t-2 border-frost-100 pt-4">
                            Kami melayani pengiriman ke seluruh nusantara (Sumatera, Kalimantan, Sulawesi, Bali, NTB, NTT, Maluku, dan Papua) menggunakan ekspedisi kargo pelayaran resmi dengan peti kemas aman dan asuransi penuh sampai ke depan pintu kebun Anda.
                        </div>
                    </div>

                    <div class="bubbly-card rounded-2xl border-2 border-frost-200 overflow-hidden">
                        <button onclick="toggleFaq(3)" class="w-full p-6 text-left flex justify-between items-center hover:bg-frost-50 transition">
                            <span class="font-bold text-sm sm:text-base text-frost-950">Apakah suku cadang mudah dicari jika ada komponen yang aus?</span>
                            <span id="faq-ico-3" class="text-frost-700 font-mono text-xl font-bold">+</span>
                        </button>
                        <div id="faq-ans-3" class="hidden px-6 pb-6 text-xs sm:text-sm text-slate-600 font-medium leading-relaxed border-t-2 border-frost-100 pt-4">
                            Sangat mudah! Kami memiliki garansi ketersediaan spare parts original 100%. Suku cadang fast-moving seperti pisau bajak, v-belt, oli filter, dan baling-baling drone tersedia di lebih dari 45 kota atau bisa dikirim kilat 1x24 jam.
                        </div>
                    </div>

                    <div class="bubbly-card rounded-2xl border-2 border-frost-200 overflow-hidden">
                        <button onclick="toggleFaq(4)" class="w-full p-6 text-left flex justify-between items-center hover:bg-frost-50 transition">
                            <span class="font-bold text-sm sm:text-base text-frost-950">Apakah boleh mencoba unit langsung di areal sawah kami dulu?</span>
                            <span id="faq-ico-4" class="text-frost-700 font-mono text-xl font-bold">+</span>
                        </button>
                        <div id="faq-ans-4" class="hidden px-6 pb-6 text-xs sm:text-sm text-slate-600 font-medium leading-relaxed border-t-2 border-frost-100 pt-4">
                            Boleh banget! Kami menyediakan program Demo Gratis Lapangan untuk kelompok tani dan perkebunan. Cukup isi formulir pendaftaran demo di bawah, tim kami akan menjadwalkan kunjungan unit ke desa Anda.
                        </div>
                    </div>

                </div>

            </div>
        </section>

        <!-- BOOKING DEMO & CONSULTATION FORM -->
        <section id="demo" class="py-24 relative bg-gradient-to-br from-frost-100 via-white to-pop-pink/10">
            <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
                
                <div class="bg-gradient-to-br from-frost-900 via-frost-800 to-frost-950 rounded-3xl p-8 sm:p-12 text-white shadow-2xl relative overflow-hidden font-outfit border-4 border-frost-300">
                    <div class="grid lg:grid-cols-12 gap-8 items-center">
                        
                        <div class="lg:col-span-6 space-y-4">
                            <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-pop-pink text-white text-xs font-mono font-bold pop-shadow-pink">
                                JADWAL DEMO GRATIS DI SAWAH
                            </div>
                            <h2 class="font-black text-3xl sm:text-4xl text-white">
                                Rasakan Langsung Mudahnya Bertani Canggih! 🚜
                            </h2>
                            <p class="text-frost-200 text-xs sm:text-sm font-medium leading-relaxed">
                                Daftarkan kelompok tani atau kebun Anda. Tim kami akan membawa unit mini traktor atau drone sprayer langsung ke lahan Anda untuk uji coba bebas biaya!
                            </p>
                            <div class="space-y-2 text-xs font-mono text-frost-300 pt-2">
                                <div class="flex items-center gap-2">⭐ Bebas biaya sewa &amp; bahan bakar selama demo</div>
                                <div class="flex items-center gap-2">⭐ Ditemani instruktur sabar &amp; berpengalaman</div>
                                <div class="flex items-center gap-2">⭐ Konsultasi skema cicilan musim panen di tempat</div>
                            </div>
                        </div>

                        <div class="lg:col-span-6 bg-white rounded-2xl p-6 text-slate-800 space-y-4 shadow-xl">
                            <form id="demoForm" onsubmit="handleDemoSubmit(event)" class="space-y-3 font-outfit">
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 mb-1">Nama Lengkap Anda</label>
                                    <input type="text" required placeholder="Contoh: Kang Asep Sunarya"
                                        class="w-full px-3.5 py-2.5 rounded-xl bg-frost-50 border-2 border-frost-200 text-xs text-slate-900 focus:outline-none focus:border-frost-500">
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 mb-1">Nama Kelompok Tani / Usaha</label>
                                    <input type="text" required placeholder="Poktan Tani Makmur / Kebun Organik"
                                        class="w-full px-3.5 py-2.5 rounded-xl bg-frost-50 border-2 border-frost-200 text-xs text-slate-900 focus:outline-none focus:border-frost-500">
                                </div>
                                <div class="grid grid-cols-2 gap-3">
                                    <div>
                                        <label class="block text-xs font-bold text-slate-700 mb-1">Nomor WhatsApp</label>
                                        <input type="tel" required placeholder="081234567890"
                                            class="w-full px-3.5 py-2.5 rounded-xl bg-frost-50 border-2 border-frost-200 text-xs text-slate-900 focus:outline-none focus:border-frost-500">
                                    </div>
                                    <div>
                                        <label class="block text-xs font-bold text-slate-700 mb-1">Lokasi Sawah/Kebun</label>
                                        <input type="text" required placeholder="Kab. Garut / Sleman"
                                            class="w-full px-3.5 py-2.5 rounded-xl bg-frost-50 border-2 border-frost-200 text-xs text-slate-900 focus:outline-none focus:border-frost-500">
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 mb-1">Alat yang Ingin Dicoba</label>
                                    <select class="w-full px-3.5 py-2.5 rounded-xl bg-frost-50 border-2 border-frost-200 text-xs text-slate-900 focus:outline-none focus:border-frost-500">
                                        <option value="minitractor">FrostyRider Mini-Tractor 35HP</option>
                                        <option value="drone">FrostySky HexaDrone Sprayer 20L</option>
                                        <option value="combine">FrostyHarvest Mini Combine Harvester</option>
                                        <option value="greenhouse">FrostyGreen Smart Greenhouse Kit</option>
                                    </select>
                                </div>
                                <button type="submit" class="w-full py-3 rounded-xl font-black text-xs uppercase tracking-wider text-white bg-gradient-to-r from-frost-500 to-frost-700 hover:from-frost-600 hover:to-frost-800 transition pop-shadow">
                                    Daftarkan Jadwal Demo Ceria &rarr;
                                </button>
                            </form>
                            <div id="demo-success" class="hidden p-3 rounded-xl bg-pop-lime/20 border-2 border-pop-lime text-slate-900 text-xs font-bold text-center">
                                Hore! Pendaftaran demo Anda berhasil diterima. Tim ramah FrostyAgro akan menghubungi WhatsApp Anda dalam 2 jam kerja.
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </section>

    </main>

    <!-- FOOTER -->
    <footer class="bg-frost-950 text-frost-200 text-xs py-14 border-t-2 border-frost-300 relative z-10 font-outfit">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-5 gap-8 pb-10 border-b border-frost-800">
                
                <div class="col-span-2 space-y-4">
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 rounded-xl bg-gradient-to-r from-frost-400 to-pop-pink flex items-center justify-center text-white font-bold text-sm">
                            FA
                        </div>
                        <span class="font-black text-lg text-white">FrostyAgro Equipment</span>
                    </div>
                    <p class="text-xs text-frost-300 max-w-sm font-medium leading-relaxed">
                        Mendukung modernisasi pertanian nusantara dengan alat-alat cerdas yang tangguh, ramah lingkungan, dan membahagiakan petani.
                    </p>
                    <div class="text-[11px] font-mono text-frost-400">
                        Workshop Pusat: Sentra Inovasi Agroteknologi, Malang, Jawa Timur.
                    </div>
                </div>

                <div>
                    <h4 class="font-black text-white text-sm mb-3">Produk Unggulan</h4>
                    <ul class="space-y-2">
                        <li><a href="#katalog" class="hover:text-white transition">Mini Traktor Sawah</a></li>
                        <li><a href="#katalog" class="hover:text-white transition">Drone Robotik Sprayer</a></li>
                        <li><a href="#katalog" class="hover:text-white transition">Smart Greenhouse</a></li>
                        <li><a href="#katalog" class="hover:text-white transition">Irigasi Tetes Surya</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-black text-white text-sm mb-3">Fitur Ceria</h4>
                    <ul class="space-y-2">
                        <li><a href="#quiz" class="hover:text-white transition">Kuis Pilih Alat</a></li>
                        <li><a href="#simulator" class="hover:text-white transition">Simulasi Panen</a></li>
                        <li><a href="#paket" class="hover:text-white transition">Cicilan Bayar Panen</a></li>
                        <li><a href="#demo" class="hover:text-white transition">Booking Demo Sawah</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-black text-white text-sm mb-3">Standar Kualitas</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-white transition">Sertifikasi Resmi SNI</a></li>
                        <li><a href="#" class="hover:text-white transition">Uji UPT Balai Alsintan</a></li>
                        <li><a href="#" class="hover:text-white transition">Garansi 2 Tahun Tukar</a></li>
                        <li><a href="#" class="hover:text-white transition">Suku Cadang Ready 100%</a></li>
                    </ul>
                </div>

            </div>

            <div class="pt-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-[11px] text-frost-400 font-medium">
                <p>&copy; 2026 FrostyAgro Equipment Indonesia. Seluruh hak cipta dilindungi.</p>
                <div class="flex items-center gap-4 text-frost-300 font-mono">
                    <span>Playful &amp; Colorful Arctic Frost Edition</span>
                    <span>&bull;</span>
                    <span>Webia Ecosystem</span>
                </div>
            </div>
        </div>
    </footer>

    <!-- FLOATING WHATSAPP CHAT -->
    <a href="https://wa.me/6281234567890?text=Halo%20FrostyAgro%20Equipment,%20saya%20tertarik%20dengan%20alat%20pertanian%20kreatif%20ini"
       target="_blank" rel="noopener noreferrer"
       class="fixed bottom-6 right-6 z-50 p-3.5 rounded-2xl bg-emerald-500 hover:bg-emerald-400 text-white shadow-xl hover:scale-105 transition-all flex items-center gap-2 group pop-shadow"
       title="Chat WhatsApp Ramah">
        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
            <path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0012.04 2m.01 1.67c2.2 0 4.26.86 5.82 2.42a8.225 8.225 0 012.41 5.83c0 4.54-3.7 8.24-8.24 8.24-1.48 0-2.93-.4-4.2-1.15l-.3-.18-3.12.82.83-3.04-.2-.31a8.196 8.196 0 01-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24m4.52 11.66c-.25-.13-1.47-.72-1.7-.81-.23-.08-.39-.13-.56.13-.17.25-.64.81-.79.97-.14.17-.29.19-.54.06-.25-.13-1.06-.39-2.01-1.24-.74-.66-1.24-1.48-1.39-1.73-.14-.25-.02-.39.11-.51.11-.11.25-.29.37-.43.13-.15.17-.25.25-.42.08-.17.04-.31-.02-.44-.06-.13-.56-1.34-.76-1.84-.2-.49-.4-.42-.56-.43h-.48c-.17 0-.44.06-.67.31-.23.25-.88.86-.88 2.1 0 1.24.9 2.44 1.03 2.61.13.17 1.77 2.71 4.3 3.8 2.52 1.09 2.52.73 2.98.69.45-.05 1.47-.6 1.68-1.18.21-.58.21-1.07.15-1.18-.07-.12-.23-.19-.48-.32z"/>
        </svg>
        <span class="max-w-0 overflow-hidden whitespace-nowrap group-hover:max-w-xs transition-all duration-300 font-outfit text-xs font-black pr-1">
            Chat WhatsApp
        </span>
    </a>

    <!-- FLOATING FROSTYBOT AI MODAL -->
    <div id="frosty-ai-modal" class="fixed inset-0 z-50 bg-black/50 backdrop-blur-sm hidden items-center justify-center p-4">
        <div class="bubbly-card w-full max-w-lg rounded-3xl border-4 border-frost-400 p-6 space-y-4 shadow-2xl bg-white">
            <div class="flex items-center justify-between pb-3 border-b-2 border-frost-100 font-outfit">
                <div class="flex items-center gap-2">
                    <span class="text-xl">🤖</span>
                    <span class="font-black text-frost-950 text-sm">FrostyBot Farm Companion</span>
                    <span class="text-[10px] font-mono px-2 py-0.5 rounded-full bg-pop-lime text-slate-900 font-bold">Online</span>
                </div>
                <button onclick="closeFrostyAI()" class="text-slate-400 hover:text-slate-800 p-1 font-bold">
                    ✕
                </button>
            </div>

            <div class="h-64 overflow-y-auto space-y-3 p-3 rounded-2xl bg-frost-50 border border-frost-200 text-xs font-outfit" id="chat-stream">
                <div class="p-3 rounded-2xl bg-white border border-frost-200 text-slate-800">
                    <strong>FrostyBot:</strong> Halo Sahabat Tani! 👋 Ada yang bisa saya bantu hari ini? Mau tahu traktor yang cocok untuk sawah Anda, tanya harga, atau daftar demo unit gratis?
                </div>
            </div>

            <!-- Quick Questions -->
            <div class="flex flex-wrap gap-1.5 pt-1 font-outfit">
                <button onclick="askFrostyPreset('Traktor mana yang cocok untuk sawah 2 hektar?')" class="text-[11px] font-bold px-2.5 py-1 rounded-lg bg-frost-100 hover:bg-frost-200 text-frost-900 border border-frost-300">
                    Traktor Sawah 2 Ha?
                </button>
                <button onclick="askFrostyPreset('Bagaimana cara bayar cicil panen?')" class="text-[11px] font-bold px-2.5 py-1 rounded-lg bg-frost-100 hover:bg-frost-200 text-frost-900 border border-frost-300">
                    Skema Bayar Panen?
                </button>
                <button onclick="askFrostyPreset('Daftar demo unit di desa saya')" class="text-[11px] font-bold px-2.5 py-1 rounded-lg bg-pop-pink text-white pop-shadow-pink">
                    Demo di Desa Saya
                </button>
            </div>

            <div class="flex gap-2 font-outfit">
                <input type="text" id="ai-input" placeholder="Ketik pertanyaan ceria Anda..."
                    class="flex-1 px-4 py-2 rounded-xl bg-frost-50 border-2 border-frost-200 text-slate-800 placeholder-slate-400 text-xs focus:outline-none focus:border-frost-500">
                <button onclick="sendChatMessage()" class="px-4 py-2 rounded-xl bg-frost-600 hover:bg-frost-700 text-white font-black text-xs">
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

        // Hero Model Switcher
        const models = {
            minitractor: {
                emoji: '🚜',
                title: 'FrostyRider Mini-Tractor 35',
                sub: 'Traktor imut bertenaga badak untuk sawah sempit & kebun buah',
                s1: '35 HP Eco-Power',
                s2: 'Ringan Anti-Ambles',
                s3: 'Koneksi Bluetooth HP',
                s4: 'Tukar Baru 1 Tahun'
            },
            dronebot: {
                emoji: '🛸',
                title: 'FrostySky HexaDrone Sprayer',
                sub: 'Drone semprot otomatis pintar sensor radar anti-nabrak',
                s1: 'Kapasitas 20 Liter',
                s2: '10 Menit / Hektar',
                s3: 'Radar 360° Omnidirectional',
                s4: 'Pelatihan Pilot Gratis'
            },
            hydrobox: {
                emoji: '🌱',
                title: 'FrostyGreen Smart Greenhouse',
                sub: 'Modul kebun sayur pintar dengan sirkulasi nutrisi otomatis',
                s1: '600 Lubang Tanam',
                s2: 'Suhu Otomatis Mist',
                s3: 'Sensor pH Pintar',
                s4: 'Garansi 2 Tahun'
            }
        };

        function switchPlayfulModel(type) {
            ['minitractor', 'dronebot', 'hydrobox'].forEach(m => {
                const b = document.getElementById('btn-play-' + m);
                if (m === type) {
                    b.className = 'py-2 px-3 rounded-xl text-xs font-outfit font-bold bg-frost-600 text-white transition pop-shadow';
                } else {
                    b.className = 'py-2 px-3 rounded-xl text-xs font-outfit font-bold bg-frost-100 text-slate-700 hover:bg-frost-200 transition';
                }
            });

            const d = models[type];
            document.getElementById('hero-emoji').innerText = d.emoji;
            document.getElementById('hero-title').innerText = d.title;
            document.getElementById('hero-sub').innerText = d.sub;
            document.getElementById('hero-spec1').innerText = d.s1;
            document.getElementById('hero-spec2').innerText = d.s2;
            document.getElementById('hero-spec3').innerText = d.s3;
            document.getElementById('hero-spec4').innerText = d.s4;
        }

        // Quiz Logic
        let q1 = 'sawah';
        let q2 = 'small';

        function selectQuizQ1(val) {
            q1 = val;
            ['sawah', 'kebun', 'greenhouse'].forEach(v => {
                const b = document.getElementById('quiz-q1-' + v);
                if (v === val) {
                    b.className = 'p-4 rounded-2xl border-2 border-frost-500 bg-frost-50 text-frost-900 font-bold text-sm text-left transition flex items-center gap-3';
                } else {
                    b.className = 'p-4 rounded-2xl border-2 border-slate-200 bg-white text-slate-700 font-bold text-sm text-left hover:border-frost-300 transition flex items-center gap-3';
                }
            });
            updateQuizResult();
        }

        function selectQuizQ2(val) {
            q2 = val;
            ['small', 'medium', 'large'].forEach(v => {
                const b = document.getElementById('quiz-q2-' + v);
                if (v === val) {
                    b.className = 'p-4 rounded-2xl border-2 border-frost-500 bg-frost-50 text-frost-900 font-bold text-sm text-left transition flex items-center gap-3';
                } else {
                    b.className = 'p-4 rounded-2xl border-2 border-slate-200 bg-white text-slate-700 font-bold text-sm text-left hover:border-frost-300 transition flex items-center gap-3';
                }
            });
            updateQuizResult();
        }

        function updateQuizResult() {
            const titleEl = document.getElementById('quiz-res-title');
            const descEl = document.getElementById('quiz-res-desc');

            if (q1 === 'greenhouse') {
                titleEl.innerText = 'Paket Tani Asik: FrostyGreen Smart Greenhouse + Sensor pH Cerdas';
                descEl.innerText = 'Sangat pas untuk kebun pekarangan atau produksi sayur selada premium berteknologi otomatis.';
            } else if (q2 === 'large') {
                titleEl.innerText = 'Paket Sultan Panen: Combine Harvester CH-60 + HexaDrone Sprayer 20L';
                descEl.innerText = 'Kombinasi armada terbaik untuk menggarap lahan komersial luas dengan hasil panen maksimal tanpa jeda.';
            } else {
                titleEl.innerText = 'Paket Juara Sawah: FrostyRider Mini-Tractor 35 + Implemen Rotary Tiller';
                descEl.innerText = 'Solusi favorit petani untuk membajak dan mengolah tanah sawah 5x lebih cepat tanpa pegal linu!';
            }
        }

        // Fun Simulator
        function runPlayfulSim() {
            const area = parseInt(document.getElementById('sim-area').value);
            const workers = parseInt(document.getElementById('sim-worker').value);

            document.getElementById('sim-lbl-area').innerText = area + ' Hektar';
            document.getElementById('sim-lbl-worker').innerText = workers + ' Orang';

            const days = Math.max(1, Math.round(area * 0.4));
            const savings = Math.round(area * 1.35 * (workers * 0.25));

            document.getElementById('sim-res-days').innerText = days + ' Hari';
            document.getElementById('sim-res-money').innerText = 'Rp ' + savings.toFixed(1) + ' Jt';
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
        function openFrostyAI() {
            document.getElementById('frosty-ai-modal').classList.remove('hidden');
            document.getElementById('frosty-ai-modal').classList.add('flex');
        }

        function closeFrostyAI() {
            document.getElementById('frosty-ai-modal').classList.add('hidden');
            document.getElementById('frosty-ai-modal').classList.remove('flex');
        }

        function askFrostyPreset(txt) {
            document.getElementById('ai-input').value = txt;
            sendChatMessage();
        }

        function sendChatMessage() {
            const input = document.getElementById('ai-input');
            const stream = document.getElementById('chat-stream');
            const val = input.value.trim();
            if (!val) return;

            const u = document.createElement('div');
            u.className = 'p-3 rounded-2xl bg-frost-100 border border-frost-200 text-right text-slate-800';
            u.innerHTML = '<strong>Anda:</strong> ' + val;
            stream.appendChild(u);

            input.value = '';
            stream.scrollTop = stream.scrollHeight;

            setTimeout(() => {
                let ans = 'Asik banget! Tim ramah FrostyAgro siap membantu mencarikan alat tani terbaik untuk Anda. Silakan isi form demo atau hubungi konsultan kami via WhatsApp.';
                const low = val.toLowerCase();
                if (low.includes('sawah') || low.includes('traktor') || low.includes('2')) {
                    ans = 'Untuk sawah 2 hektar, FrostyRider Mini-Tractor 35HP adalah juara sejati! Ringan, tidak mudah amblas di lumpur, dan sangat hemat solar.';
                } else if (low.includes('bayar') || low.includes('panen') || low.includes('cicil')) {
                    ans = 'Kami menyediakan skema Yarnen (Bayar Setelah Panen) dengan bunga ringan. Jadi Anda bisa panen dulu, baru bayar angsurannya!';
                } else if (low.includes('demo') || low.includes('desa')) {
                    ans = 'Demo di desa gratis tanpa biaya! Tim kami akan bawa unit demo langsung ke sawah Anda. Tinggal daftarkan nomor WA Anda di form bawah ya.';
                }

                const b = document.createElement('div');
                b.className = 'p-3 rounded-2xl bg-white border-2 border-frost-300 text-frost-950';
                b.innerHTML = '<strong>FrostyBot:</strong> ' + ans;
                stream.appendChild(b);
                stream.scrollTop = stream.scrollHeight;
            }, 450);
        }

        function handleDemoSubmit(e) {
            e.preventDefault();
            document.getElementById('demoForm').classList.add('opacity-50', 'pointer-events-none');
            setTimeout(() => {
                document.getElementById('demo-success').classList.remove('hidden');
            }, 350);
        }
    </script>

</body>
</html>
