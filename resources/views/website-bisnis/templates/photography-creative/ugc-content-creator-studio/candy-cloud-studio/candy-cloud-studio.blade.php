<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candy Cloud Studio — UGC & Content Creator Studio</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Fonts: Syne, Plus Jakarta Sans, Playfair Display & Space Grotesk -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,800;1,400;1,600&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Space+Grotesk:wght@500;700&family=Syne:wght@700;800&display=swap"
        rel="stylesheet">

    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        candy: {
                            pink: '#FF94B9',
                            pinkLight: '#FFD6E5',
                            lilac: '#C792EA',
                            lilacLight: '#E8D5F5',
                            cyan: '#70D6FF',
                            cyanLight: '#D2F3FF',
                            lemon: '#FFEF9F',
                            lemonDark: '#E6D35E',
                            bg: '#FFF7FA',
                            cardBg: 'rgba(255, 255, 255, 0.85)',
                            dark: '#2D1E2F'
                        }
                    },
                    fontFamily: {
                        syne: ['Syne', 'sans-serif'],
                        editorial: ['Playfair Display', 'serif'],
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                        mono: ['Space Grotesk', 'sans-serif']
                    }
                }
            }
        }
    </script>
    <link rel="stylesheet"
        href="{{ asset('css/website-bisnis/templates/photography-creative/ugc-content-creator-studio/candy-cloud-studio/candy-cloud-studio.css') }}">
</head>

<body
    class="font-sans bg-candy-bg text-candy-dark antialiased overflow-x-hidden selection:bg-candy-pink selection:text-white relative">

    <!-- FLOATING CANVAS BUBBLE BACKGROUND -->
    <canvas id="bubble-canvas" class="fixed inset-0 pointer-events-none z-0 opacity-50"></canvas>

    <!-- TOPBAR & NAVBAR -->
    <header class="sticky top-0 z-40 bg-candy-bg/90 backdrop-blur-md border-b border-candy-pinkLight">
        <!-- TOP TICKER ANNOUNCEMENT -->
        <div
            class="bg-gradient-to-r from-candy-pink via-candy-lilac to-candy-cyan text-white text-[11px] font-bold py-1.5 px-4 overflow-hidden">
            <div class="max-w-7xl mx-auto flex justify-between items-center">
                <div class="flex items-center space-x-2">
                    <span class="px-2 py-0.5 rounded-full bg-white/30 text-white uppercase text-[9px]">Studio
                        Announcement</span>
                    <span>✨ Q4 Brand Collaborations Open | 🎬 180+ High-Converting UGC Campaigns Delivered</span>
                </div>
                <div class="hidden sm:flex items-center space-x-4 font-mono">
                    <a href="mailto:hello@candycloudstudio.com" class="hover:underline"><i
                            class="far fa-envelope mr-1"></i> hello@candycloudstudio.com</a>
                    <span>•</span>
                    <span><i class="fab fa-instagram text-candy-lemon"></i> @candycloud.ugc</span>
                </div>
            </div>
        </div>

        <!-- MAIN NAVBAR -->
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Logo -->
                <a href="#home" class="flex items-center space-x-3 group">
                    <div
                        class="w-11 h-11 rounded-2xl bg-gradient-to-tr from-candy-pink via-candy-lilac to-candy-cyan p-0.5 shadow-md group-hover:rotate-6 transition">
                        <div
                            class="w-full h-full bg-white rounded-[14px] flex items-center justify-center text-candy-pink text-lg">
                            <i class="fas fa-wand-magic-sparkles"></i>
                        </div>
                    </div>
                    <div>
                        <span
                            class="font-syne font-extrabold text-2xl tracking-tight bg-gradient-to-r from-candy-pink via-candy-lilac to-candy-dark bg-clip-text text-transparent">CandyCloud</span>
                        <span
                            class="block text-[9px] font-mono uppercase tracking-[0.2em] text-candy-dark/60 font-bold">UGC
                            & Creator Studio</span>
                    </div>
                </a>

                <!-- Nav Items (Scroll Links) -->
                <div
                    class="hidden lg:flex items-center space-x-1 bg-white/80 p-1.5 rounded-full border border-candy-pinkLight shadow-inner text-xs font-bold font-mono">
                    <a href="#home"
                        class="px-4 py-2 rounded-full text-candy-dark/70 hover:text-candy-pink transition">01. Home</a>
                    <a href="#dna"
                        class="px-4 py-2 rounded-full text-candy-dark/70 hover:text-candy-pink transition">02. DNA</a>
                    <a href="#playground"
                        class="px-4 py-2 rounded-full text-candy-dark/70 hover:text-candy-pink transition">03.
                        Playground</a>
                    <a href="#matchboard"
                        class="px-4 py-2 rounded-full text-candy-dark/70 hover:text-candy-pink transition">04. Vibe
                        Finder</a>
                    <a href="#mediakit"
                        class="px-4 py-2 rounded-full text-candy-dark/70 hover:text-candy-pink transition">05. Media
                        Kit</a>
                    <a href="#packages"
                        class="px-4 py-2 rounded-full text-candy-dark/70 hover:text-candy-pink transition">06. Rate &
                        Brief</a>
                </div>

                <!-- CTA -->
                <button onclick="openModal('modal-brief')"
                    class="px-5 py-2.5 rounded-full bg-candy-dark text-white font-mono text-xs uppercase font-bold tracking-wider hover:bg-candy-pink transition shadow-md flex items-center space-x-2">
                    <span>Book Studio</span>
                    <i class="fas fa-paper-plane text-candy-lemon"></i>
                </button>
            </div>
        </nav>
    </header>

    <!-- MAIN CONTAINER (ALL SECTIONS UNROLLED FOR SINGLE PAGE SCROLLING) -->
    <main class="relative z-10 space-y-24 py-8">

        <!-- SECTION 01: HERO SECTION -->
        <section id="home" class="relative pt-6 pb-16 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto scroll-mt-28">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">

                <!-- Left Hero Text -->
                <div class="lg:col-span-7 space-y-6">
                    <div
                        class="inline-flex items-center space-x-2 px-3 py-1.5 rounded-full bg-candy-pinkLight/80 border border-candy-pink text-candy-dark text-xs font-mono font-bold">
                        <span class="w-2 h-2 rounded-full bg-candy-pink animate-ping"></span>
                        <span>UGC & Content Creator Studio</span>
                    </div>

                    <h1 class="font-editorial text-4xl sm:text-6xl font-extrabold text-candy-dark leading-[1.1]">
                        Crafting <span
                            class="bg-gradient-to-r from-candy-pink via-candy-lilac to-candy-cyan bg-clip-text text-transparent italic">Viral
                            UGC Content</span> for Iconic Brands
                    </h1>

                    <p class="text-gray-600 text-sm sm:text-base max-w-xl leading-relaxed font-sans">
                        Kami mengombinasikan kreativitas estetik, psikologi penonton 3-detik hook, dan produksi video
                        profesional untuk mendorong konversi iklan TikTok & Instagram Reels brand Anda.
                    </p>

                    <div class="flex flex-wrap items-center gap-4 pt-2 font-mono text-xs font-bold">
                        <a href="#playground"
                            class="px-6 py-3.5 rounded-full bg-gradient-to-r from-candy-pink to-candy-lilac text-white shadow-lg hover:shadow-candy-pink/50 transition flex items-center space-x-2">
                            <span>Explore My Work</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>

                        <button onclick="openModal('modal-brief')"
                            class="px-6 py-3.5 rounded-full bg-white text-candy-dark border-2 border-candy-dark hover:bg-candy-dark hover:text-white transition">
                            Let's Collaborate
                        </button>
                    </div>
                </div>

                <!-- Right Hero Graphic Collage (EXACT DESIGN FROM REFERENCE IMAGE) -->
                <div class="lg:col-span-5 relative">
                    <div class="relative w-full max-w-md mx-auto py-8">

                        <!-- POLAROID 1: LEFT TOP (SHOOT DAY!) -->
                        <div
                            class="absolute -top-2 -left-4 z-20 bg-white p-3 rounded-xl shadow-2xl border border-gray-200 rotate-[-12deg] w-36 sm:w-40 animate-float">
                            <div
                                class="w-14 h-4 washi-tape absolute -top-2 left-1/2 -translate-x-1/2 rounded-sm rotate-[-2deg]">
                            </div>
                            <div class="bg-[#FFF4A3] aspect-square rounded-lg flex items-center justify-center">
                                <span class="text-3xl">📸</span>
                            </div>
                            <p class="text-center font-editorial italic text-xs font-bold text-candy-dark mt-2">shoot
                                day!</p>
                        </div>

                        <!-- POLAROID 2: RIGHT BOTTOM (YUMMY!) -->
                        <div
                            class="absolute -bottom-4 -right-2 z-20 bg-white p-3 rounded-xl shadow-2xl border border-gray-200 rotate-[10deg] w-36 sm:w-40 animate-float-reverse">
                            <div
                                class="w-14 h-4 washi-tape absolute -top-2 left-1/2 -translate-x-1/2 rounded-sm rotate-[3deg]">
                            </div>
                            <div class="bg-[#BCEEFF] aspect-square rounded-lg flex items-center justify-center">
                                <span class="text-3xl">🍓</span>
                            </div>
                            <p class="text-center font-editorial italic text-xs font-bold text-candy-dark mt-2">yummy!
                            </p>
                        </div>

                        <!-- STICKER CIRCLE: NEW CONTENT DAILY -->
                        <div
                            class="absolute top-2 -right-2 z-20 w-20 h-20 rounded-full bg-[#FFF3B0] border-2 border-candy-dark flex items-center justify-center text-center p-2 shadow-lg rotate-[15deg]">
                            <span
                                class="font-mono text-[9px] font-extrabold uppercase leading-tight text-candy-dark tracking-tighter">NEW<br>CONTENT<br>DAILY</span>
                        </div>

                        <!-- SPEECH BUBBLE 1: POV NEMU KONTEN FAVORIT -->
                        <div
                            class="absolute bottom-24 -left-6 z-30 bg-[#FF94B9] text-white px-3.5 py-1.5 rounded-full rounded-br-none border-2 border-candy-dark shadow-xl text-xs font-editorial italic font-bold rotate-[-4deg]">
                            POV: nemu konten favorit
                        </div>

                        <!-- SPEECH BUBBLE 2: 2.4RB SUKA REEL-MU -->
                        <div
                            class="absolute top-24 -right-4 z-30 bg-white text-candy-dark px-3.5 py-1.5 rounded-full rounded-bl-none border-2 border-candy-dark shadow-xl text-xs font-mono font-bold flex items-center space-x-1.5 rotate-[4deg]">
                            <span class="text-red-500">❤️</span>
                            <span>2,4rb suka reel-mu</span>
                        </div>

                        <!-- SPEECH BUBBLE 3: BRAND BARU DM! -->
                        <div
                            class="absolute -bottom-6 left-4 z-30 bg-white text-candy-dark px-3.5 py-1.5 rounded-full border-2 border-candy-dark shadow-xl text-xs font-mono font-bold flex items-center space-x-1.5">
                            <span>🔔</span>
                            <span>Brand baru DM!</span>
                        </div>

                        <!-- SMARTPHONE FRAME MOCKUP (CENTER) -->
                        <div
                            class="relative mx-auto w-60 sm:w-64 aspect-[9/18] rounded-[40px] bg-candy-dark p-3 shadow-2xl border-4 border-candy-dark">
                            <div
                                class="w-full h-full rounded-[32px] bg-gradient-to-b from-[#FFB8D2] via-[#E2C2FF] to-[#A0EAFF] relative overflow-hidden flex flex-col justify-between p-4">

                                <!-- Dynamic Island & REC -->
                                <div class="flex justify-between items-center z-10 pt-1">
                                    <div class="w-14 h-3 bg-candy-dark rounded-full mx-auto"></div>
                                    <div
                                        class="absolute top-3 left-4 bg-white/80 backdrop-blur-md px-2 py-0.5 rounded-full text-[9px] font-mono font-bold text-candy-dark flex items-center space-x-1">
                                        <span class="w-2 h-2 rounded-full bg-red-500 animate-pulse"></span>
                                        <span>REC 01:21</span>
                                    </div>
                                </div>

                                <!-- Blue Dress Illustration -->
                                <div class="my-auto relative flex flex-col items-center justify-center">
                                    <div
                                        class="w-32 h-32 rounded-3xl bg-white/60 backdrop-blur-md border-2 border-white flex items-center justify-center shadow-lg relative">
                                        <svg class="w-20 h-20 text-blue-500 drop-shadow-md" viewBox="0 0 64 64"
                                            fill="currentColor">
                                            <path
                                                d="M22 12C22 12 26 18 32 18C38 18 42 12 42 12L48 20L42 24V32L52 54H12L22 32V24L16 20L22 12Z" />
                                        </svg>

                                        <div class="absolute -right-2 bottom-2 text-red-500 text-base animate-heart-1">
                                            ❤️</div>
                                        <div class="absolute -right-4 bottom-8 text-red-500 text-sm animate-heart-2">💖
                                        </div>
                                    </div>
                                </div>

                                <!-- Bottom Caption Overlay inside Phone -->
                                <div class="space-y-2 z-10 pb-1">
                                    <div
                                        class="text-[10px] font-mono font-extrabold text-candy-dark bg-white/50 backdrop-blur-md px-2.5 py-1 rounded-lg inline-block">
                                        OOTD hari ini #fashion
                                    </div>
                                    <div
                                        class="flex justify-between items-center text-candy-dark text-[10px] font-mono font-bold">
                                        <span>💭 142 comments</span>
                                        <div
                                            class="w-5 h-5 rounded bg-blue-500 text-white flex items-center justify-center text-[9px]">
                                            ↗</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- HASHTAG MARQUEE TICKER -->
        <section class="marquee-ticker py-3 text-white font-mono text-xs font-extrabold tracking-widest uppercase">

            <div class="animate-marquee">

                <!-- GROUP PERTAMA -->
                <div class="marquee-group">

                    <span>✦ #SHORTS</span>
                    <span>✦ #UGC</span>
                    <span>✦ #GRWM</span>
                    <span>✦ #UNBOXING</span>
                    <span>✦ #POV</span>
                    <span>✦ #OOTD</span>
                    <span>✦ #ASMR</span>
                    <span>✦ #HOOKS</span>

                </div>

                <!-- GROUP KEDUA: DUPLIKASI PERSIS -->
                <div class="marquee-group" aria-hidden="true">

                    <span>✦ #SHORTS</span>
                    <span>✦ #UGC</span>
                    <span>✦ #GRWM</span>
                    <span>✦ #UNBOXING</span>
                    <span>✦ #POV</span>
                    <span>✦ #OOTD</span>
                    <span>✦ #ASMR</span>
                    <span>✦ #HOOKS</span>

                </div>

            </div>

        </section>

        <!-- SECTION 02: MY CREATIVE DNA -->
        <section id="dna" class="px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto space-y-10 scroll-mt-28">
            <div class="text-center max-w-3xl mx-auto space-y-2">
                <span class="font-mono text-xs font-extrabold tracking-[0.2em] text-candy-pink uppercase">02 — CREATOR
                    DNA & IDENTITY</span>
                <h2 class="font-editorial text-3xl sm:text-4xl font-extrabold text-candy-dark">The Anatomy of Our
                    Aesthetic</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- DNA Card 1 -->
                <div
                    class="glass-candy p-7 rounded-[32px] border-2 border-candy-pinkLight space-y-4 hover:border-candy-pink transition shadow-md">
                    <div
                        class="w-12 h-12 rounded-2xl bg-candy-pinkLight text-candy-pink flex items-center justify-center text-xl">
                        <i class="fas fa-palette"></i>
                    </div>
                    <h3 class="font-editorial text-2xl font-bold text-candy-dark">Color Palette & Mood</h3>
                    <p class="text-xs text-gray-600 leading-relaxed">Pencahayaan alami hangat, sentuhan warna pastel
                        yang ceria namun editorial, serta framing presisi tinggi untuk estetika Instagram & TikTok.</p>

                    <div class="flex space-x-2 pt-2">
                        <span class="w-5 h-5 rounded-full bg-candy-pink border border-white shadow"></span>
                        <span class="w-5 h-5 rounded-full bg-candy-lilac border border-white shadow"></span>
                        <span class="w-5 h-5 rounded-full bg-candy-cyan border border-white shadow"></span>
                        <span class="w-5 h-5 rounded-full bg-candy-lemon border border-white shadow"></span>
                    </div>
                </div>

                <!-- DNA Card 2 -->
                <div
                    class="glass-candy p-7 rounded-[32px] border-2 border-candy-lilacLight space-y-4 hover:border-candy-lilac transition shadow-md">
                    <div
                        class="w-12 h-12 rounded-2xl bg-candy-lilacLight text-candy-lilac flex items-center justify-center text-xl">
                        <i class="fas fa-comment-dots"></i>
                    </div>
                    <h3 class="font-editorial text-2xl font-bold text-candy-dark">Communication Tone</h3>
                    <p class="text-xs text-gray-600 leading-relaxed">Gaya bicara conversational, jujur, *relatable*,
                        seperti rekomendasi dari sahabat baik tanpa terasa seperti *hard-selling* berlebihan.</p>
                    <div
                        class="inline-block px-3 py-1 bg-candy-lilacLight text-candy-dark text-[10px] font-mono font-bold rounded-full uppercase">
                        Relatable & Converting</div>
                </div>

                <!-- DNA Card 3 -->
                <div
                    class="glass-candy p-7 rounded-[32px] border-2 border-candy-cyanLight space-y-4 hover:border-candy-cyan transition shadow-md">
                    <div
                        class="w-12 h-12 rounded-2xl bg-candy-cyanLight text-candy-cyan flex items-center justify-center text-xl">
                        <i class="fas fa-clapperboard"></i>
                    </div>
                    <h3 class="font-editorial text-2xl font-bold text-candy-dark">Editing Signature</h3>
                    <p class="text-xs text-gray-600 leading-relaxed">Dynamic hooks 3 detik pertama, *fast-paced cuts*,
                        efek suara *soft pop*, serta subtitle kustom yang menarik perhatian penonton.</p>
                    <div
                        class="inline-block px-3 py-1 bg-candy-cyanLight text-candy-dark text-[10px] font-mono font-bold rounded-full uppercase">
                        High-Retention Edits</div>
                </div>
            </div>
        </section>

        <!-- SECTION 03: CONTENT PLAYGROUND -->
        <section id="playground" class="px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto space-y-10 scroll-mt-28">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-6">
                <div>
                    <span class="font-mono text-xs font-extrabold tracking-[0.2em] text-candy-pink uppercase">03 —
                        PORTFOLIO GALLERY</span>
                    <h2 class="font-editorial text-3xl sm:text-4xl font-extrabold text-candy-dark">Content Playground
                    </h2>
                </div>

                <!-- Filter Buttons -->
                <div class="flex flex-wrap gap-2 font-mono text-xs font-bold" id="ugc-filters">
                    <button onclick="filterUgc('all')"
                        class="ugc-btn active px-4 py-2 rounded-full bg-candy-dark text-white border border-candy-dark transition">All
                        Categories</button>
                    <button onclick="filterUgc('beauty')"
                        class="ugc-btn px-4 py-2 rounded-full bg-white text-candy-dark border border-candy-pinkLight hover:bg-candy-pinkLight transition">Beauty
                        & Skincare</button>
                    <button onclick="filterUgc('fashion')"
                        class="ugc-btn px-4 py-2 rounded-full bg-white text-candy-dark border border-candy-pinkLight hover:bg-candy-pinkLight transition">Fashion
                        & Apparel</button>
                    <button onclick="filterUgc('food')"
                        class="ugc-btn px-4 py-2 rounded-full bg-white text-candy-dark border border-candy-pinkLight hover:bg-candy-pinkLight transition">Food
                        & Beverage</button>
                </div>
            </div>

            <!-- Showcase Cards Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8" id="ugc-cards-grid">
                <div
                    class="ugc-card beauty glass-candy rounded-[32px] overflow-hidden border-2 border-candy-pinkLight hover:border-candy-pink transition shadow-lg group">
                    <div class="aspect-[9/14] relative bg-candy-pinkLight overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1522337360788-8b13dee7a37e?auto=format&fit=crop&w=600&q=80"
                            alt="Beauty UGC"
                            class="w-full h-full object-cover group-hover:scale-105 transition duration-700">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-candy-dark/90 via-transparent to-transparent">
                        </div>

                        <button
                            onclick="playReelModal('Aesthetic Skincare ASMR & Unboxing', 'Glowinc Serum', 'https://images.unsplash.com/photo-1522337360788-8b13dee7a37e?auto=format&fit=crop&w=800&q=80')"
                            class="absolute inset-0 flex items-center justify-center">
                            <div
                                class="w-14 h-14 rounded-full bg-candy-pink text-white flex items-center justify-center text-xl shadow-xl group-hover:scale-110 transition">
                                <i class="fas fa-play ml-1"></i>
                            </div>
                        </button>

                        <span
                            class="absolute top-4 left-4 px-3 py-1 bg-white/90 backdrop-blur-md rounded-full text-[10px] font-mono font-bold text-candy-dark">BEAUTY
                            / REEL</span>
                    </div>
                    <div class="p-5 space-y-2">
                        <h4 class="font-editorial text-lg font-bold text-candy-dark">Skincare ASMR & Unboxing</h4>
                        <p class="text-xs text-gray-600">Dynamic hook + texture close-up + honest 7-day review.</p>
                    </div>
                </div>

                <div
                    class="ugc-card fashion glass-candy rounded-[32px] overflow-hidden border-2 border-candy-lilacLight hover:border-candy-lilac transition shadow-lg group">
                    <div class="aspect-[9/14] relative bg-candy-lilacLight overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1483985988355-763728e1935b?auto=format&fit=crop&w=600&q=80"
                            alt="Fashion UGC"
                            class="w-full h-full object-cover group-hover:scale-105 transition duration-700">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-candy-dark/90 via-transparent to-transparent">
                        </div>

                        <button
                            onclick="playReelModal('3 Ways to Style Pastel Cardigan', 'Velvet Apparel', 'https://images.unsplash.com/photo-1483985988355-763728e1935b?auto=format&fit=crop&w=800&q=80')"
                            class="absolute inset-0 flex items-center justify-center">
                            <div
                                class="w-14 h-14 rounded-full bg-candy-lilac text-white flex items-center justify-center text-xl shadow-xl group-hover:scale-110 transition">
                                <i class="fas fa-play ml-1"></i>
                            </div>
                        </button>

                        <span
                            class="absolute top-4 left-4 px-3 py-1 bg-white/90 backdrop-blur-md rounded-full text-[10px] font-mono font-bold text-candy-dark">FASHION
                            / STYLING</span>
                    </div>
                    <div class="p-5 space-y-2">
                        <h4 class="font-editorial text-lg font-bold text-candy-dark">3 Ways to Style Cardigan</h4>
                        <p class="text-xs text-gray-600">Transitions in sync with trending audio sound script.</p>
                    </div>
                </div>

                <div
                    class="ugc-card food glass-candy rounded-[32px] overflow-hidden border-2 border-candy-cyanLight hover:border-candy-cyan transition shadow-lg group">
                    <div class="aspect-[9/14] relative bg-candy-cyanLight overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1551024709-8f23befc6f87?auto=format&fit=crop&w=600&q=80"
                            alt="Food UGC"
                            class="w-full h-full object-cover group-hover:scale-105 transition duration-700">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-candy-dark/90 via-transparent to-transparent">
                        </div>

                        <button
                            onclick="playReelModal('Matcha Cold Brew Morning Recipe', 'Neo Drinks', 'https://images.unsplash.com/photo-1551024709-8f23befc6f87?auto=format&fit=crop&w=800&q=80')"
                            class="absolute inset-0 flex items-center justify-center">
                            <div
                                class="w-14 h-14 rounded-full bg-candy-cyan text-white flex items-center justify-center text-xl shadow-xl group-hover:scale-110 transition">
                                <i class="fas fa-play ml-1"></i>
                            </div>
                        </button>

                        <span
                            class="absolute top-4 left-4 px-3 py-1 bg-white/90 backdrop-blur-md rounded-full text-[10px] font-mono font-bold text-candy-dark">FOOD
                            / RECIPE</span>
                    </div>
                    <div class="p-5 space-y-2">
                        <h4 class="font-editorial text-lg font-bold text-candy-dark">Matcha Cold Brew Recipe</h4>
                        <p class="text-xs text-gray-600">Crisp pour shots + upbeat voiceover storytelling.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- SECTION 04: BRAND MATCHBOARD -->
        <section id="matchboard" class="px-4 sm:px-6 lg:px-8 max-w-4xl mx-auto space-y-8 scroll-mt-28">
            <div class="text-center space-y-2">
                <span class="font-mono text-xs font-extrabold tracking-[0.2em] text-candy-pink uppercase">04 — BRAND
                    MATCHBOARD</span>
                <h2 class="font-editorial text-3xl sm:text-4xl font-extrabold text-candy-dark">Find Your Brand's UGC
                    Vibe</h2>
            </div>

            <div class="glass-candy p-8 rounded-[32px] border-2 border-candy-pinkLight space-y-6 shadow-xl">
                <div class="space-y-3 font-mono text-xs">
                    <label class="block font-bold text-candy-dark text-sm">Pilih Niche Brand Anda:</label>
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                        <button onclick="selectMatchIndustry(this, 'beauty')"
                            class="match-ind p-3 rounded-2xl bg-white border border-candy-pinkLight text-center font-bold hover:bg-candy-pinkLight transition">Beauty</button>
                        <button onclick="selectMatchIndustry(this, 'fashion')"
                            class="match-ind p-3 rounded-2xl bg-white border border-candy-pinkLight text-center font-bold hover:bg-candy-pinkLight transition">Fashion</button>
                        <button onclick="selectMatchIndustry(this, 'food')"
                            class="match-ind p-3 rounded-2xl bg-white border border-candy-pinkLight text-center font-bold hover:bg-candy-pinkLight transition">Food
                            & Drinks</button>
                        <button onclick="selectMatchIndustry(this, 'lifestyle')"
                            class="match-ind p-3 rounded-2xl bg-white border border-candy-pinkLight text-center font-bold hover:bg-candy-pinkLight transition">Lifestyle</button>
                    </div>
                </div>

                <div id="match-result-box"
                    class="p-6 rounded-2xl bg-gradient-to-r from-candy-pinkLight to-candy-cyanLight border border-white space-y-2 font-mono text-xs">
                    <span
                        class="px-3 py-1 bg-white text-candy-pink rounded-full font-bold uppercase text-[9px]">RECOMMENDED
                        CONTENT STYLE</span>
                    <h4 id="match-title" class="font-editorial text-xl font-bold text-candy-dark">ASMR Unboxing &
                        Conversational Storytelling</h4>
                    <p id="match-desc" class="text-gray-700">Pencahayaan alami hangat dengan audio mic jernih untuk
                        mempromosikan manfaat nyata produk kepada audiens secara jujur.</p>
                </div>
            </div>
        </section>

        <!-- SECTION 05: CREATOR MEDIA KIT & STATS -->
        <section id="mediakit" class="px-4 sm:px-6 lg:px-8 max-w-5xl mx-auto space-y-8 scroll-mt-28">
            <div class="text-center space-y-2">
                <span class="font-mono text-xs font-extrabold tracking-[0.2em] text-candy-pink uppercase">05 — CREATOR
                    MEDIA KIT</span>
                <h2 class="font-editorial text-3xl sm:text-4xl font-extrabold text-candy-dark">Audience Reach &
                    Performance</h2>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 font-mono">
                <div
                    class="glass-candy p-6 rounded-3xl border-2 border-candy-pinkLight flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <div
                            class="w-12 h-12 rounded-xl bg-candy-pink text-white flex items-center justify-center text-xl shadow">
                            <i class="fab fa-tiktok"></i>
                        </div>
                        <div>
                            <h4 class="font-editorial text-lg font-bold text-candy-dark">TikTok Studio</h4>
                            <span class="text-xs text-gray-500">@candycloud.ugc</span>
                        </div>
                    </div>
                    <div class="text-right">
                        <span class="text-2xl font-extrabold text-candy-pink">120K+</span>
                        <span class="block text-[10px] text-gray-500 uppercase">Followers</span>
                    </div>
                </div>

                <div
                    class="glass-candy p-6 rounded-3xl border-2 border-candy-lilacLight flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <div
                            class="w-12 h-12 rounded-xl bg-candy-lilac text-white flex items-center justify-center text-xl shadow">
                            <i class="fab fa-instagram"></i>
                        </div>
                        <div>
                            <h4 class="font-editorial text-lg font-bold text-candy-dark">Instagram Creator</h4>
                            <span class="text-xs text-gray-500">@candycloud.studio</span>
                        </div>
                    </div>
                    <div class="text-right">
                        <span class="text-2xl font-extrabold text-candy-lilac">65K+</span>
                        <span class="block text-[10px] text-gray-500 uppercase">Reach / Mo</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- SECTION 06: RATE CARD & PROJECT BRIEF SUBMISSION -->
        <section id="packages" class="px-4 sm:px-6 lg:px-8 max-w-5xl mx-auto space-y-10 scroll-mt-28">
            <div class="text-center space-y-2">
                <span class="font-mono text-xs font-extrabold tracking-[0.2em] text-candy-pink uppercase">06 — DYNAMIC
                    PRICING & BRIEF</span>
                <h2 class="font-editorial text-3xl sm:text-4xl font-extrabold text-candy-dark">Packages & Brief Form
                </h2>
            </div>

            <!-- Dynamic Calculator -->
            <div
                class="glass-candy p-6 sm:p-8 rounded-[32px] border-2 border-candy-pinkLight grid grid-cols-1 lg:grid-cols-12 gap-8 font-mono text-xs shadow-xl">
                <div class="lg:col-span-7 space-y-4">
                    <label class="block font-bold text-candy-dark text-sm">Estimasi Jumlah Video UGC</label>
                    <input type="range" id="calc-qty" min="1" max="10" value="3"
                        oninput="updateCalculator()" class="w-full accent-candy-pink">
                    <div class="flex justify-between font-bold text-candy-pink text-sm">
                        <span>1 Video</span>
                        <span id="calc-qty-val" class="text-lg">3 Videos</span>
                        <span>10 Videos</span>
                    </div>
                    <p class="text-[11px] text-gray-500">Sudah termasuk hak guna ads 30 hari + raw footage + 2x revisi
                        minor.</p>
                </div>

                <div
                    class="lg:col-span-5 bg-gradient-to-tr from-candy-pink via-candy-lilac to-candy-cyan p-6 rounded-2xl text-white space-y-3 flex flex-col justify-between shadow-lg">
                    <div>
                        <span class="uppercase text-[9px] font-bold tracking-widest text-white/90">Estimated
                            Investment</span>
                        <div id="calc-total-price" class="text-3xl font-extrabold text-candy-lemon">Rp 3.900.000</div>
                    </div>
                    <button onclick="openModal('modal-brief')"
                        class="w-full py-3 rounded-xl bg-candy-dark text-white font-bold uppercase text-xs hover:bg-white hover:text-candy-dark transition shadow">
                        Book Brief Estimate
                    </button>
                </div>
            </div>

            <!-- Form -->
            <div class="glass-candy p-6 sm:p-8 rounded-[32px] border-2 border-candy-pinkLight space-y-4 shadow-xl">
                <h3 class="font-editorial text-2xl font-bold text-candy-dark text-center">Project Brief Submission</h3>
                <form onsubmit="handleBriefSubmit(event)" class="space-y-4 font-mono text-xs">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <input type="text" required placeholder="Brand Name *"
                            class="w-full px-4 py-3 rounded-xl bg-white border border-candy-pinkLight focus:outline-none focus:border-candy-pink">
                        <input type="text" required placeholder="Instagram / TikTok Username *"
                            class="w-full px-4 py-3 rounded-xl bg-white border border-candy-pinkLight focus:outline-none focus:border-candy-pink">
                    </div>
                    <input type="email" required placeholder="Contact Email *"
                        class="w-full px-4 py-3 rounded-xl bg-white border border-candy-pinkLight focus:outline-none focus:border-candy-pink">
                    <textarea rows="3" placeholder="Campaign Brief & Notes (Target audience, product USP, key message)..."
                        class="w-full px-4 py-3 rounded-xl bg-white border border-candy-pinkLight focus:outline-none focus:border-candy-pink"></textarea>
                    <button type="submit"
                        class="w-full py-3.5 rounded-xl bg-candy-pink text-white font-bold uppercase tracking-wider hover:bg-candy-dark transition shadow-md">Submit
                        Campaign Brief</button>
                </form>
            </div>
        </section>

        <!-- FAQ SECTION -->
        <section class="py-6 px-4 sm:px-6 lg:px-8 max-w-3xl mx-auto space-y-4">
            <h3 class="font-editorial text-2xl font-bold text-candy-dark text-center">Frequently Asked Questions</h3>

            <div class="glass-candy rounded-2xl border border-candy-pinkLight overflow-hidden font-mono text-xs">
                <button onclick="toggleFaq(this)"
                    class="w-full p-4 text-left font-bold text-candy-dark flex justify-between items-center">
                    <span>Berapa lama waktu pengerjaan 1 video UGC?</span>
                    <i class="fas fa-chevron-down text-candy-pink"></i>
                </button>
                <div class="px-4 pb-4 text-gray-600 hidden">
                    Waktu pengerjaan standar adalah 3 - 5 hari kerja setelah produk sampel fisik sampai di studio kami.
                </div>
            </div>

            <div class="glass-candy rounded-2xl border border-candy-pinkLight overflow-hidden font-mono text-xs">
                <button onclick="toggleFaq(this)"
                    class="w-full p-4 text-left font-bold text-candy-dark flex justify-between items-center">
                    <span>Apakah sudah termasuk lisensi iklan (Whitelisting)?</span>
                    <i class="fas fa-chevron-down text-candy-pink"></i>
                </button>
                <div class="px-4 pb-4 text-gray-600 hidden">
                    Ya, seluruh paket studio kami sudah memuat lisensi hak guna iklan organik & komersial selama 30
                    hari.
                </div>
            </div>
        </section>

        <!-- FOOTER -->
        <footer class="bg-candy-dark text-white border-t-2 border-candy-pink py-10 px-4 text-center font-mono text-xs">
            <p>© 2026 Candy Cloud Studio — UGC & Content Creator Studio. All rights reserved.</p>
            <p class="mt-3 text-[10px] text-white/70">Made with care ♡ · Website template by WEBIA</p>
        </footer>

    </main>

    <!-- FLOATING ACTIONS (PRECISE MATCH FOR REFERENCE IMAGE) -->
    <div class="fixed bottom-6 right-6 z-50 flex items-center space-x-3">
        <!-- WhatsApp Mint Green Button -->
        <a href="https://wa.me/6281234567890" target="_blank" rel="noopener noreferrer"
            class="w-14 h-14 rounded-full bg-[#6EE7B7] hover:bg-[#4ADE80] text-candy-dark flex items-center justify-center shadow-2xl transition-transform transform hover:scale-110 border-2 border-candy-dark"
            title="WhatsApp Studio Desk">
            <i class="fas fa-comment text-2xl"></i>
        </a>

        <!-- AI Assistant Mascot Button -->
        <button id="candy-ai-trigger" onclick="toggleCandyAi()"
            class="animate-bounce-candy w-14 h-14 rounded-full bg-gradient-to-tr from-[#FFB8D2] via-[#E2C2FF] to-[#A0EAFF] text-candy-dark flex items-center justify-center shadow-2xl border-2 border-candy-dark relative group"
            title="Candy Assistant AI">
            <div class="text-2xl transform group-hover:scale-125 transition">🤖</div>
            <span
                class="absolute -top-1 -right-1 w-4 h-4 bg-candy-lemon rounded-full border-2 border-candy-dark"></span>
        </button>
    </div>

    <!-- AI CHATBOT WINDOW -->
    <div id="candy-ai-window"
        class="hidden fixed bottom-24 right-6 z-50 w-80 sm:w-88 glass-candy border-2 border-candy-pink rounded-[32px] shadow-2xl overflow-hidden flex flex-col h-[440px]">
        <div
            class="bg-gradient-to-r from-candy-pink to-candy-lilac p-4 text-white flex items-center justify-between font-mono">
            <div class="flex items-center space-x-3">
                <div class="w-8 h-8 rounded-full bg-white/20 flex items-center justify-center text-candy-lemon">
                    <i class="fas fa-robot text-sm"></i>
                </div>
                <div>
                    <h4 class="font-bold text-xs">Candy Assistant AI</h4>
                    <span class="text-[9px] text-white/80 block">Online • 24/7 Creator Helper</span>
                </div>
            </div>
            <button onclick="toggleCandyAi()" class="text-white/80 hover:text-white"><i
                    class="fas fa-times"></i></button>
        </div>

        <div id="candy-ai-messages" class="flex-1 p-4 overflow-y-auto space-y-3 font-mono text-xs">
            <div class="bg-white p-3 rounded-2xl rounded-tl-none border border-candy-pinkLight max-w-[85%] shadow-sm">
                Hi there! ✨ Selamat datang di Candy Cloud Studio. Ada yang bisa dibantu mengenai Rate Card atau jadwal
                shooting?
            </div>
        </div>

        <form onsubmit="handleCandyAiSubmit(event)" class="p-3 bg-white border-t border-candy-pinkLight flex gap-2">
            <input type="text" id="candy-ai-input" placeholder="Tanyakan sesuatu..."
                class="flex-1 bg-candy-bg text-candy-dark text-xs px-4 py-2 rounded-full border border-candy-pinkLight focus:outline-none">
            <button type="submit"
                class="w-8 h-8 rounded-full bg-candy-pink text-white flex items-center justify-center text-xs"><i
                    class="fas fa-paper-plane"></i></button>
        </form>
    </div>

    <!-- MODAL REEL PREVIEW -->
    <div id="modal-reel"
        class="hidden fixed inset-0 z-50 bg-black/80 backdrop-blur-md flex items-center justify-center p-4">
        <div class="bg-white rounded-[32px] max-w-sm w-full p-4 border-2 border-candy-pink relative">
            <button onclick="closeModal('modal-reel')"
                class="absolute top-4 right-4 text-white bg-candy-dark/70 w-8 h-8 rounded-full flex items-center justify-center z-10"><i
                    class="fas fa-times"></i></button>
            <div class="aspect-[9/16] rounded-[24px] overflow-hidden relative bg-black">
                <img id="reel-modal-img" src="" class="w-full h-full object-cover">
                <div class="absolute bottom-4 left-4 right-4 text-white font-mono space-y-1">
                    <span id="reel-modal-brand"
                        class="px-2 py-0.5 bg-candy-pink text-white text-[9px] font-bold rounded-full">BRAND</span>
                    <h4 id="reel-modal-title" class="font-editorial text-sm font-bold">Video Preview</h4>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL BRIEF QUICK CHOICE -->
    <div id="modal-brief"
        class="hidden fixed inset-0 z-50 bg-black/80 backdrop-blur-md flex items-center justify-center p-4">
        <div
            class="glass-candy rounded-[32px] max-w-md w-full p-6 border-2 border-candy-pink relative text-center space-y-4 font-mono text-xs">
            <button onclick="closeModal('modal-brief')" class="absolute top-4 right-4 text-candy-dark"><i
                    class="fas fa-times"></i></button>
            <h3 class="font-editorial text-2xl font-bold text-candy-dark">Book Studio Campaign</h3>
            <a href="https://wa.me/6281234567890" target="_blank"
                class="w-full py-3 rounded-2xl bg-emerald-500 text-white font-bold flex items-center justify-center space-x-2 shadow">
                <i class="fab fa-whatsapp text-lg"></i>
                <span>Chat Direct via WhatsApp</span>
            </a>
            <a href="#packages" onclick="closeModal('modal-brief')"
                class="w-full py-3 rounded-2xl bg-candy-dark text-white font-bold block text-center">Fill Campaign Form
                Below</a>
        </div>
    </div>

    <!-- JAVASCRIPT LOGIC -->
    <script>
        window.CANDY_CLOUD_WA_ADMIN = window.CANDY_CLOUD_WA_ADMIN || '6281234567890';
    </script>
    <script
        src="{{ asset('js/website-bisnis/templates/photography-creative/ugc-content-creator-studio/candy-cloud-studio/candy-cloud-studio.js') }}"
        defer></script>
</body>

</html>
