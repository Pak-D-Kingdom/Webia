<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aria Thorne | Author, Essayist & Literary Voice</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts: Playfair Display, Plus Jakarta Sans, Cormorant Garamond -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;0,700;1,400&family=Playfair+Display:ital,wght@0,400;0,600;0,700;0,800;1,400;1,600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- FontAwesome & Lucide Icons CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        mint: {
                            50: '#F4F9F5',
                            100: '#EBF3E8',
                            200: '#D4E7C5',
                            300: '#A9DBB2',
                            400: '#72C488',
                            500: '#3EA862',
                            600: '#2A874B',
                            700: '#1F683A',
                            800: '#0F3D2E', // Deep Forest Mint
                            900: '#0A2A20',
                            950: '#04140F',
                        },
                        gold: {
                            400: '#E5C365',
                            500: '#D4AF37', // Champagne Gold
                            600: '#B89327',
                        },
                        cream: '#FAF8F5',
                        slateDark: '#111827',
                    },
                    fontFamily: {
                        serif: ['Playfair Display', 'serif'],
                        editorial: ['Cormorant Garamond', 'serif'],
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'float-slow': 'float 9s ease-in-out infinite',
                        'pulse-glow': 'pulseGlow 3s infinite',
                        'marquee': 'marquee 25s linear infinite',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0px) rotate(0deg)' },
                            '50%': { transform: 'translateY(-12px) rotate(1.5deg)' },
                        },
                        pulseGlow: {
                            '0%, 100%': { opacity: '0.4', filter: 'blur(20px)' },
                            '50%': { opacity: '0.8', filter: 'blur(30px)' },
                        },
                        marquee: {
                            '0%': { transform: 'translateX(0%)' },
                            '100%': { transform: 'translateX(-50%)' }
                        }
                    }
                }
            }
        }
    </script>

    <link rel="stylesheet" href="{{ asset('css/personal-brand/author-writer/aria-thorne/aria-thorne.css') }}">
    <style>
        /* Aria Thorne layout fixes: keep the sticky navbar from covering section headings. */
        #aria-site-header { position: sticky; top: 12px; z-index: 100; margin-bottom: 2rem; }
        #aria-site-header nav { min-height: 72px; gap: 1rem; }
        #aria-site-header nav > ul { flex-wrap: wrap; row-gap: .5rem; }
        #journal { scroll-margin-top: 120px; padding-top: 5rem; }
        #about, #books, #quiz, #services, #events, #faq, #contact { scroll-margin-top: 120px; }
        #journal .max-w-7xl > .text-center { position: relative; z-index: 1; margin-bottom: 3rem; }
        #journal .max-w-7xl { padding-top: .5rem; }
        #book-modal, #reader-modal { z-index: 200; }
        #wa-modal, #ai-modal { z-index: 210; max-width: calc(100vw - 2rem); }
        @media (max-width: 1023px) {
            #aria-site-header { top: 6px; margin-bottom: 1.5rem; }
            #aria-site-header nav { border-radius: 1.5rem; }
            #journal { padding-top: 3.5rem; }
        }
        @media (max-width: 640px) {
            #aria-site-header { position: relative; top: auto; margin: .5rem auto 1.5rem; }
            #aria-site-header nav { min-height: 60px; }
            #journal { padding-top: 2.5rem; }
            #journal h2 { font-size: clamp(2rem, 8vw, 3rem); line-height: 1.12; }
            #journal .max-w-7xl { padding-left: 1rem; padding-right: 1rem; }
        }
    </style>
</head>
<body class="bg-cream text-slate-800 font-sans antialiased selection:bg-mint-200 selection:text-mint-900 transition-colors duration-300">

    <!-- TOPBAR ANNOUNCEMENT TICKER -->
    <div class="bg-mint-800 text-mint-100 text-xs sm:text-sm py-2 px-4 relative z-50 overflow-hidden border-b border-mint-700">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center gap-2">
            <!-- Dynamic Announcement Ticker -->
            <div class="flex items-center space-x-3 text-center md:text-left overflow-hidden">
                <span class="bg-gold-500 text-mint-950 font-bold px-2 py-0.5 rounded-full text-[10px] uppercase tracking-wider animate-pulse flex-shrink-0">
                    <i class="fa-solid fa-sparkles mr-1"></i> <span data-i18n="topbar_tag">PRE-ORDER OPEN</span>
                </span>
                <div class="truncate">
                    <span class="font-serif italic mr-1" data-i18n="topbar_msg">"Whispers of the Emerald Canopy" Hardcover Signed Edition is now available!</span>
                    <a href="#books" class="underline hover:text-gold-400 transition font-medium text-xs ml-2" data-i18n="topbar_cta">Claim Copy &rarr;</a>
                </div>
            </div>
            <!-- Quick Actions & Language Toggle -->
            <div class="flex items-center space-x-4 text-xs">
                <a href="#events" class="hover:text-gold-400 transition hidden sm:inline-flex items-center">
                    <i class="fa-regular fa-calendar-star mr-1"></i> <span data-i18n="topbar_event">Next Event: Jakarta Book Fair (Nov 12)</span>
                </a>
                <span class="text-mint-600 hidden sm:inline">|</span>
                <!-- Dual Language Switcher -->
                <div class="flex items-center bg-mint-900/80 rounded-full p-1 border border-mint-700">
                    <button id="lang-id" onclick="setLanguage('id')" class="px-2 py-0.5 rounded-full font-bold transition-all text-mint-950 bg-mint-200 text-xs flex items-center gap-1">
                        🇮🇩 <span class="hidden sm:inline">ID</span>
                    </button>
                    <button id="lang-en" onclick="setLanguage('en')" class="px-2 py-0.5 rounded-full font-bold transition-all text-mint-300 hover:text-white text-xs flex items-center gap-1">
                        🇬🇧 <span class="hidden sm:inline">EN</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- CURVED / BENTO GLASSMORPHIC NAVBAR -->
    <header id="aria-site-header" class="sticky top-4 z-40 px-4 sm:px-8 max-w-7xl mx-auto">
        <nav class="glass-pill rounded-full px-4 sm:px-6 py-3 flex items-center justify-between shadow-xl transition-all duration-300">
            <!-- Brand Logo -->
            <a href="#" class="flex items-center gap-3 group">
                <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-mint-800 to-mint-600 flex items-center justify-center text-cream font-serif font-bold text-xl shadow-md group-hover:scale-105 transition-transform">
                    AT
                </div>
                <div>
                    <span class="font-serif font-bold text-lg sm:text-xl tracking-tight text-mint-900 block leading-tight">Aria Thorne</span>
                    <span class="text-[10px] tracking-widest text-mint-600 uppercase font-semibold block" data-i18n="nav_subtitle">Novelism & Philosophy</span>
                </div>
            </a>

            <!-- Desktop Navigation Links -->
            <ul class="hidden lg:flex items-center space-x-7 text-sm font-medium text-slate-700">
                <li><a href="#about" class="hover:text-mint-700 transition" data-i18n="nav_about">Biography</a></li>
                <li><a href="#books" class="hover:text-mint-700 transition" data-i18n="nav_books">Works & Books</a></li>
                <li><a href="#quiz" class="hover:text-mint-700 transition" data-i18n="nav_quiz">Book Matcher</a></li>
                <li><a href="#journal" class="hover:text-mint-700 transition" data-i18n="nav_journal">Essays & Journal</a></li>
                <li><a href="#services" class="hover:text-mint-700 transition" data-i18n="nav_services">Speaking & Services</a></li>
                <li><a href="#faq" class="hover:text-mint-700 transition" data-i18n="nav_faq">FAQ</a></li>
            </ul>

            <!-- CTA & Mobile Menu Toggle -->
            <div class="flex items-center space-x-3">
                <a href="#contact" class="hidden sm:inline-flex items-center gap-2 bg-mint-800 hover:bg-mint-900 text-cream px-4 py-2 rounded-full font-medium text-xs sm:text-sm shadow-md transition-all hover:shadow-lg hover:-translate-y-0.5">
                    <i class="fa-solid fa-feather-pointed text-gold-400"></i>
                    <span data-i18n="nav_cta">Invite / Collaborate</span>
                </a>
                <button id="mobile-menu-btn" onclick="toggleMobileMenu()" class="lg:hidden w-10 h-10 rounded-full bg-mint-100 flex items-center justify-center text-mint-800 focus:outline-none">
                    <i class="fa-solid fa-bars text-lg"></i>
                </button>
            </div>
        </nav>

        <!-- Mobile Drawer Navigation -->
        <div id="mobile-menu" class="hidden lg:hidden mt-2 glass-card rounded-2xl p-6 shadow-2xl transition-all border border-mint-200">
            <ul class="flex flex-col space-y-4 text-base font-medium text-slate-800">
                <li><a href="#about" onclick="toggleMobileMenu()" class="block hover:text-mint-600" data-i18n="nav_about">Biography</a></li>
                <li><a href="#books" onclick="toggleMobileMenu()" class="block hover:text-mint-600" data-i18n="nav_books">Works & Books</a></li>
                <li><a href="#quiz" onclick="toggleMobileMenu()" class="block hover:text-mint-600" data-i18n="nav_quiz">Book Matcher Quiz</a></li>
                <li><a href="#journal" onclick="toggleMobileMenu()" class="block hover:text-mint-600" data-i18n="nav_journal">Essays & Journal</a></li>
                <li><a href="#services" onclick="toggleMobileMenu()" class="block hover:text-mint-600" data-i18n="nav_services">Speaking & Services</a></li>
                <li><a href="#events" onclick="toggleMobileMenu()" class="block hover:text-mint-600" data-i18n="nav_events">Events & Releases</a></li>
                <li><a href="#faq" onclick="toggleMobileMenu()" class="block hover:text-mint-600" data-i18n="nav_faq">FAQ</a></li>
                <li class="pt-2 border-t border-mint-200">
                    <a href="#contact" onclick="toggleMobileMenu()" class="w-full text-center bg-mint-800 text-white py-3 rounded-xl flex items-center justify-center gap-2 font-medium">
                        <i class="fa-solid fa-feather-pointed text-gold-400"></i>
                        <span data-i18n="nav_cta">Invite / Collaborate</span>
                    </a>
                </li>
            </ul>
        </div>
    </header>

    <!-- HERO BANNER (Asymmetrical Magazine Split Layout) -->
    <section class="relative pt-8 pb-20 md:py-24 overflow-hidden">
        <!-- Mint Fresh Background Lighting Gradients -->
        <div class="absolute top-0 left-1/4 w-96 h-96 bg-mint-200/50 rounded-full blur-3xl -z-10 animate-pulse-glow"></div>
        <div class="absolute bottom-10 right-10 w-80 h-80 bg-gold-400/20 rounded-full blur-3xl -z-10"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-8 grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <!-- Left Column: Editorial Intro -->
            <div class="lg:col-span-7 space-y-6">
                <div class="inline-flex items-center gap-2 bg-mint-100 border border-mint-300 text-mint-900 text-xs sm:text-sm font-semibold px-4 py-1.5 rounded-full">
                    <i class="fa-solid fa-award text-gold-500"></i>
                    <span data-i18n="hero_badge">Penman of the Year 2025 • International Bestseller</span>
                </div>

                <h1 class="font-serif text-4xl sm:text-6xl lg:text-7xl font-extrabold text-mint-950 leading-[1.1] tracking-tight">
                    <span data-i18n="hero_title_1">Crafting Worlds Out of</span> 
                    <span class="text-gradient-mint italic block font-editorial font-normal" data-i18n="hero_title_2">Ink, Silence & Soul.</span>
                </h1>

                <p class="text-base sm:text-lg text-slate-600 font-normal leading-relaxed max-w-2xl" data-i18n="hero_desc">
                    Selamat datang di ruang literasi Aria Thorne. Penulis 4 novel bestseller internasional, pengulas filsafat eksistensial, dan penceramah sastra yang mendedikasikan kata-kata untuk mengeksplorasi kedalaman jiwa manusia.
                </p>

                <!-- Hero Action Buttons & Audio Player Snippet -->
                <div class="flex flex-wrap items-center gap-4 pt-2">
                    <a href="#books" class="bg-mint-800 hover:bg-mint-900 text-cream font-medium px-7 py-3.5 rounded-full shadow-lg hover:shadow-mint-900/30 transition transform hover:-translate-y-1 flex items-center gap-3">
                        <i class="fa-solid fa-book-open"></i>
                        <span data-i18n="hero_btn_explore">Jelajahi Katalog Buku</span>
                    </a>
                    
                    <!-- Audio Prologue Player Button -->
                    <button onclick="playAudioSnippet()" class="glass-pill border border-mint-300 text-mint-900 font-medium px-5 py-3.5 rounded-full hover:bg-mint-100 transition flex items-center gap-3 group">
                        <div id="audio-icon-bg" class="w-8 h-8 rounded-full bg-mint-700 text-white flex items-center justify-center group-hover:scale-110 transition">
                            <i id="audio-icon" class="fa-solid fa-play text-xs"></i>
                        </div>
                        <div class="text-left">
                            <span class="block text-xs text-mint-600 font-bold uppercase tracking-wider" data-i18n="hero_audio_label">Audio Preview</span>
                            <span id="audio-status-text" class="block text-xs font-semibold text-slate-800" data-i18n="hero_audio_title">Dengar Prolog Audio (1:15)</span>
                        </div>
                    </button>
                </div>

                <!-- Live Social Reader Badge Counters -->
                <div class="pt-6 border-t border-mint-200/80 grid grid-cols-3 gap-4">
                    <div>
                        <div class="font-serif text-2xl sm:text-3xl font-bold text-mint-900">500K+</div>
                        <div class="text-xs text-slate-500 font-medium" data-i18n="stat_copies">Buku Terjual</div>
                    </div>
                    <div>
                        <div class="font-serif text-2xl sm:text-3xl font-bold text-mint-900">4.9 ★</div>
                        <div class="text-xs text-slate-500 font-medium" data-i18n="stat_rating">Goodreads Rating</div>
                    </div>
                    <div>
                        <div class="font-serif text-2xl sm:text-3xl font-bold text-mint-900">12+</div>
                        <div class="text-xs text-slate-500 font-medium" data-i18n="stat_languages">Bahasa Diterjemahkan</div>
                    </div>
                </div>
            </div>

            <!-- Right Column: 3D Interactive Book Showcase Frame -->
            <div class="lg:col-span-5 relative flex justify-center">
                <div class="relative w-full max-w-sm sm:max-w-md aspect-[3/4] rounded-3xl p-6 glass-card shadow-2xl flex flex-col justify-between overflow-hidden border-2 border-mint-200 animate-float">
                    <!-- Background Glow inside Frame -->
                    <div class="absolute -top-12 -right-12 w-48 h-48 bg-mint-300/40 rounded-full blur-2xl"></div>

                    <!-- Header Badge inside Card -->
                    <div class="flex justify-between items-center z-10">
                        <span class="bg-mint-800 text-mint-100 text-[11px] font-bold px-3 py-1 rounded-full uppercase tracking-widest" data-i18n="hero_featured_tag">Masterpiece Terbaru</span>
                        <div class="flex text-gold-500 text-xs space-x-1">
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                        </div>
                    </div>

                    <!-- 3D Book Visual Representation -->
                    <div class="my-6 relative flex justify-center items-center group cursor-pointer" onclick="openBookModal('whispers')">
                        <div class="w-48 sm:w-56 h-72 sm:h-80 bg-gradient-to-br from-mint-900 via-mint-800 to-slate-900 rounded-r-xl rounded-l-sm shadow-2xl book-shadow relative overflow-hidden transform group-hover:rotate-2 group-hover:scale-105 transition-all duration-500 flex flex-col justify-between p-5 text-white">
                            <div class="book-spine-effect absolute inset-0"></div>
                            
                            <!-- Book Cover Content -->
                            <div class="space-y-2 z-10">
                                <span class="text-[9px] uppercase tracking-widest text-mint-300 font-mono block">A Novel by Aria Thorne</span>
                                <h2 class="font-serif text-2xl font-bold text-cream leading-tight">Whispers of the Emerald Canopy</h2>
                            </div>

                            <div class="relative z-10 text-center py-4">
                                <div class="w-16 h-16 mx-auto border border-gold-500/50 rounded-full flex items-center justify-center">
                                    <i class="fa-solid fa-leaf text-gold-400 text-xl"></i>
                                </div>
                            </div>

                            <div class="z-10 flex justify-between items-end border-t border-mint-700/50 pt-3">
                                <div>
                                    <span class="text-[9px] text-mint-200 block uppercase" data-i18n="hero_genre">Fiksi Spekulatif</span>
                                    <span class="text-xs font-semibold text-gold-400">Ed. Ke-3</span>
                                </div>
                                <span class="text-xs bg-gold-500 text-mint-950 font-bold px-2 py-0.5 rounded" data-i18n="hero_read_btn">Baca Sampel</span>
                            </div>
                        </div>
                    </div>

                    <!-- Floating Reader Recommendation Quote Card -->
                    <div class="glass-pill p-3 rounded-xl border border-mint-200 text-xs text-slate-700 italic flex items-center gap-3">
                        <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&q=80&w=120" alt="Reviewer" class="w-9 h-9 rounded-full object-cover border-2 border-mint-400 flex-shrink-0">
                        <div>
                            <p class="line-clamp-2">"Karya paling puitis dan mendalam tahun ini. Thorne membawa kita ke batas imajinasi baru."</p>
                            <span class="text-[10px] text-mint-800 font-bold not-italic block mt-0.5">— Literary Review Monthly</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- MEDIA PRESS BADGE MARQUEE -->
    <section class="py-6 bg-mint-900 text-mint-100 overflow-hidden border-y border-mint-800">
        <div class="max-w-7xl mx-auto px-4 mb-3 text-center">
            <span class="text-[11px] font-semibold tracking-widest text-mint-300 uppercase" data-i18n="press_title">Diliput & Dipuji Oleh Media Ternama</span>
        </div>
        <div class="flex overflow-hidden relative">
            <div class="flex animate-marquee space-x-12 whitespace-nowrap text-mint-200/70 text-lg font-serif italic font-semibold">
                <span>The New York Times Book Review</span>
                <span>•</span>
                <span>Kompas Literasi</span>
                <span>•</span>
                <span>BBC Culture World</span>
                <span>•</span>
                <span>Harper's Bazaar Review</span>
                <span>•</span>
                <span>Tempo Suara Bahasa</span>
                <span>•</span>
                <span>The Guardian Books</span>
                <span>•</span>
                <span>The New York Times Book Review</span>
                <span>•</span>
                <span>Kompas Literasi</span>
                <span>•</span>
                <span>BBC Culture World</span>
                <span>•</span>
            </div>
        </div>
    </section>

    <!-- INTERACTIVE LITERARY DISCOVERY QUIZ ("Mana Buku yang Cocok untuk Mood-mu?") -->
    <section id="quiz" class="py-16 bg-gradient-to-b from-cream to-mint-50/60">
        <div class="max-w-4xl mx-auto px-4 sm:px-8">
            <div class="glass-card rounded-3xl p-8 sm:p-10 shadow-xl border border-mint-200 relative overflow-hidden">
                <div class="absolute -right-10 -bottom-10 w-40 h-40 bg-mint-200/50 rounded-full blur-2xl"></div>

                <div class="text-center max-w-xl mx-auto mb-8 space-y-2">
                    <span class="text-xs font-bold uppercase tracking-widest text-mint-700 bg-mint-100 px-3 py-1 rounded-full" data-i18n="quiz_tag">Kuis Rekomendasi Bacaan</span>
                    <h2 class="font-serif text-2xl sm:text-3xl font-bold text-mint-950" data-i18n="quiz_heading">Mana Buku Aria Thorne yang Cocok Untukmu Saat Ini?</h2>
                    <p class="text-xs sm:text-sm text-slate-600" data-i18n="quiz_sub">Pilih suasana hati atau preferensi membacamu dalam 1-klik untuk menemukan rekomendasi personal.</p>
                </div>

                <!-- Quiz Vibe Selector Options -->
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 mb-6" id="quiz-options">
                    <button onclick="selectQuizVibe('philosophical')" class="vibe-btn p-4 rounded-2xl border border-mint-200 bg-white hover:bg-mint-800 hover:text-white transition flex flex-col items-center gap-2 text-center group">
                        <i class="fa-solid fa-brain text-2xl text-mint-700 group-hover:text-gold-400"></i>
                        <span class="text-xs font-bold" data-i18n="vibe_1">Reflektif & Filsafat</span>
                    </button>
                    <button onclick="selectQuizVibe('mystery')" class="vibe-btn p-4 rounded-2xl border border-mint-200 bg-white hover:bg-mint-800 hover:text-white transition flex flex-col items-center gap-2 text-center group">
                        <i class="fa-solid fa-compass text-2xl text-mint-700 group-hover:text-gold-400"></i>
                        <span class="text-xs font-bold" data-i18n="vibe_2">Misteri & Alam</span>
                    </button>
                    <button onclick="selectQuizVibe('poetic')" class="vibe-btn p-4 rounded-2xl border border-mint-200 bg-white hover:bg-mint-800 hover:text-white transition flex flex-col items-center gap-2 text-center group">
                        <i class="fa-solid fa-feather text-2xl text-mint-700 group-hover:text-gold-400"></i>
                        <span class="text-xs font-bold" data-i18n="vibe_3">Puitis & Jiwa</span>
                    </button>
                    <button onclick="selectQuizVibe('growth')" class="vibe-btn p-4 rounded-2xl border border-mint-200 bg-white hover:bg-mint-800 hover:text-white transition flex flex-col items-center gap-2 text-center group">
                        <i class="fa-solid fa-seedling text-2xl text-mint-700 group-hover:text-gold-400"></i>
                        <span class="text-xs font-bold" data-i18n="vibe_4">Pengembangan Diri</span>
                    </button>
                </div>

                <!-- Dynamic Quiz Recommendation Result Box -->
                <div id="quiz-result" class="hidden bg-mint-900 text-cream p-6 rounded-2xl flex flex-col sm:flex-row items-center gap-6 animate-fade-in">
                    <div id="quiz-book-img" class="w-24 h-36 bg-mint-800 rounded-lg flex-shrink-0 flex items-center justify-center text-4xl shadow-md border border-mint-700">
                        📚
                    </div>
                    <div class="space-y-2 text-center sm:text-left flex-grow">
                        <span class="text-[10px] bg-gold-500 text-mint-950 font-bold px-2 py-0.5 rounded uppercase" data-i18n="quiz_match">Cocok 99% Untukmu</span>
                        <h3 id="quiz-book-title" class="font-serif text-xl font-bold text-white">Title Here</h3>
                        <p id="quiz-book-desc" class="text-xs text-mint-200 leading-relaxed">Description goes here.</p>
                        <div class="pt-2 flex flex-wrap gap-2 justify-center sm:justify-start">
                            <button id="quiz-btn-buy" onclick="openPurchaseModal('Whispers of the Emerald Canopy')" class="bg-gold-500 hover:bg-gold-600 text-mint-950 font-bold text-xs px-4 py-2 rounded-full transition">
                                <i class="fa-solid fa-cart-shopping mr-1"></i> <span data-i18n="btn_buy_now">Beli Sekarang</span>
                            </button>
                            <button id="quiz-btn-preview" class="border border-mint-400 text-mint-100 hover:bg-mint-800 text-xs px-4 py-2 rounded-full transition">
                                <span data-i18n="btn_read_sample">Baca Bab 1</span>
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- AUTHOR PROFILE & BIOGRAPHY (Magazine Spread Layout) -->
    <section id="about" class="py-20 bg-cream relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                
                <!-- Left: Author Portrait & Floating Quotes -->
                <div class="lg:col-span-5 relative">
                    <div class="relative mx-auto max-w-md">
                        <!-- Decorative Frame -->
                        <div class="absolute -inset-3 rounded-3xl border-2 border-mint-300 transform -rotate-2"></div>
                        
                        <img src="https://images.unsplash.com/photo-1544717305-2782549b5136?auto=format&fit=crop&q=80&w=800" alt="Aria Thorne Author Portrait" class="relative rounded-2xl object-cover w-full h-[500px] shadow-2xl">
                        
                        <!-- Floating Badge -->
                        <div class="absolute -bottom-6 -right-6 glass-card p-4 rounded-2xl shadow-xl max-w-xs border border-mint-200 flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-mint-800 text-gold-400 flex items-center justify-center text-lg flex-shrink-0">
                                <i class="fa-solid fa-pen-nib"></i>
                            </div>
                            <div>
                                <span class="text-xs font-bold text-mint-900 block" data-i18n="bio_badge_title">10+ Tahun Menulis</span>
                                <span class="text-[11px] text-slate-500 block" data-i18n="bio_badge_sub">Eksplorasi Sastra & Humaniora</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right: Interactive Story Tabs & Biography -->
                <div class="lg:col-span-7 space-y-6">
                    <div class="space-y-2">
                        <span class="text-xs font-bold uppercase tracking-widest text-mint-700 bg-mint-100 px-3 py-1 rounded-full" data-i18n="bio_tag">Tentang Penulis</span>
                        <h2 class="font-serif text-3xl sm:text-5xl font-bold text-mint-950 leading-tight" data-i18n="bio_heading">
                            Menenun Narasi Antara Reality & Imajinasi.
                        </h2>
                    </div>

                    <!-- Interactive Story Tabs -->
                    <div class="flex border-b border-mint-200 space-x-6 text-sm font-medium">
                        <button onclick="switchBioTab('journey')" id="tab-journey" class="bio-tab-btn pb-3 border-b-2 border-mint-800 text-mint-900 font-bold transition" data-i18n="tab_journey">Perjalanan Karir</button>
                        <button onclick="switchBioTab('philosophy')" id="tab-philosophy" class="bio-tab-btn pb-3 border-b-2 border-transparent text-slate-500 hover:text-mint-800 transition" data-i18n="tab_philosophy">Filosofi Kepenulisan</button>
                        <button onclick="switchBioTab('achievements')" id="tab-achievements" class="bio-tab-btn pb-3 border-b-2 border-transparent text-slate-500 hover:text-mint-800 transition" data-i18n="tab_achievements">Penghargaan Sastra</button>
                    </div>

                    <!-- Tab Content Container -->
                    <div id="bio-content-journey" class="bio-tab-content space-y-4 text-slate-600 text-sm sm:text-base leading-relaxed">
                        <p data-i18n="bio_text_1">
                            Aria Thorne mengawali karir kepenulisannya sejak lulus dari Studi Komparatif Sastra di Universitas Oxford. Karya terobosannya, *The Silent Architecture* (2020), memenangkan Penghargaan Sastra Asia Tenggara dan diterjemahkan ke dalam 8 bahasa.
                        </p>
                        <p data-i18n="bio_text_2">
                            Selain menulis novel, Aria rutin menyumbang esai kebudayaan untuk koran nasional dan jurnal sastra internasional. Gaya tulisannya dikenal puitis, kaya metafora alam, serta mendalam secara psikologis.
                        </p>
                    </div>

                    <div id="bio-content-philosophy" class="bio-tab-content hidden space-y-4 text-slate-600 text-sm sm:text-base leading-relaxed">
                        <blockquote class="italic border-l-4 border-mint-600 pl-4 py-1 text-mint-900 font-serif text-lg">
                            "Menulis bukanlah tentang menciptakan kebohongan yang indah, melainkan mengungkap kebenaran yang tersembunyi di balik riuk kebisingan dunia."
                        </blockquote>
                        <p data-i18n="bio_philo_text">
                            Aria percaya bahwa setiap buku adalah percakapan sunyi antara jiwa penulis dan pembaca. Pendekatannya menekankan kedalaman empati, ekologi bahasa, dan penyembuhan luka batin melalui seni bercerita.
                        </p>
                    </div>

                    <div id="bio-content-achievements" class="bio-tab-content hidden space-y-3">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-xs sm:text-sm">
                            <div class="p-3 bg-mint-50 rounded-xl border border-mint-200 flex items-center gap-3">
                                <i class="fa-solid fa-trophy text-gold-500 text-xl"></i>
                                <div>
                                    <strong class="block text-mint-950">Southeast Asia Literary Award 2021</strong>
                                    <span class="text-slate-500">Pemenang Novel Terbaik</span>
                                </div>
                            </div>
                            <div class="p-3 bg-mint-50 rounded-xl border border-mint-200 flex items-center gap-3">
                                <i class="fa-solid fa-medal text-gold-500 text-xl"></i>
                                <div>
                                    <strong class="block text-mint-950">National Book Critics Circle Finalist</strong>
                                    <span class="text-slate-500">Kategori Fiksi Spekulatif</span>
                                </div>
                            </div>
                            <div class="p-3 bg-mint-50 rounded-xl border border-mint-200 flex items-center gap-3">
                                <i class="fa-solid fa-award text-gold-500 text-xl"></i>
                                <div>
                                    <strong class="block text-mint-950">Anugerah Pena Emas Indonesia 2023</strong>
                                    <span class="text-slate-500">Pengabdian Sastra Berkelanjutan</span>
                                </div>
                            </div>
                            <div class="p-3 bg-mint-50 rounded-xl border border-mint-200 flex items-center gap-3">
                                <i class="fa-solid fa-star text-gold-500 text-xl"></i>
                                <div>
                                    <strong class="block text-mint-950">International Dublin Literary Nominee</strong>
                                    <span class="text-slate-500">Tahun 2024</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Author Signature -->
                    <div class="pt-4 flex items-center justify-between border-t border-mint-200">
                        <div>
                            <span class="font-editorial italic text-3xl text-mint-900 font-bold block">Aria Thorne</span>
                            <span class="text-xs text-slate-500 uppercase tracking-widest font-semibold" data-i18n="bio_location">Jakarta & Oxford</span>
                        </div>
                        <a href="#contact" class="text-xs font-bold text-mint-800 hover:text-mint-600 underline" data-i18n="bio_contact_link">Hubungi Manajemen Penulis &rarr;</a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- PUBLISHED BOOKS & WRITTEN WORKS CATALOG -->
    <section id="books" class="py-20 bg-mint-50/50 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-8">
            
            <!-- Section Header & Category Filters -->
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-6">
                <div class="space-y-2">
                    <span class="text-xs font-bold uppercase tracking-widest text-mint-700 bg-mint-100 px-3 py-1 rounded-full" data-i18n="books_tag">Katalog Karya Terpublikasi</span>
                    <h2 class="font-serif text-3xl sm:text-5xl font-bold text-mint-950" data-i18n="books_heading">Jelajahi Koleksi Novel & Esai</h2>
                </div>

                <!-- Book Filter Pills -->
                <div class="flex flex-wrap gap-2 text-xs font-semibold">
                    <button onclick="filterBooks('all')" class="book-filter-btn px-4 py-2 rounded-full bg-mint-800 text-white shadow-md" data-i18n="filter_all">Semua Karya</button>
                    <button onclick="filterBooks('fiction')" class="book-filter-btn px-4 py-2 rounded-full bg-white text-slate-700 hover:bg-mint-100 border border-mint-200" data-i18n="filter_fiction">Novel & Fiksi</button>
                    <button onclick="filterBooks('essay')" class="book-filter-btn px-4 py-2 rounded-full bg-white text-slate-700 hover:bg-mint-100 border border-mint-200" data-i18n="filter_essay">Esai & Filsafat</button>
                    <button onclick="filterBooks('poetry')" class="book-filter-btn px-4 py-2 rounded-full bg-white text-slate-700 hover:bg-mint-100 border border-mint-200" data-i18n="filter_poetry">Puisi & Antologi</button>
                </div>
            </div>

            <!-- Books Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                <!-- Book Card 1: Whispers of the Emerald Canopy -->
                <div class="book-item fiction glass-card rounded-3xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 border border-mint-200 flex flex-col justify-between group">
                    <div class="space-y-4">
                        <div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-mint-900 to-mint-800 h-64 flex items-center justify-center p-6 text-white text-center shadow-inner">
                            <span class="absolute top-3 right-3 bg-gold-500 text-mint-950 font-bold text-[10px] px-2 py-0.5 rounded uppercase">Bestseller</span>
                            <div class="space-y-2">
                                <span class="text-[10px] uppercase tracking-widest text-mint-300">Novel • 2025</span>
                                <h3 class="font-serif text-2xl font-bold text-cream">Whispers of the Emerald Canopy</h3>
                                <p class="text-xs text-mint-200 italic">"Di antara rimbun dedaunan, rahasia peradaban tua berbisik."</p>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <div class="flex justify-between items-center text-xs text-slate-500">
                                <span><i class="fa-regular fa-file-lines mr-1"></i> 384 Halaman</span>
                                <span><i class="fa-solid fa-star text-gold-500 mr-1"></i> 4.92 / 5.0</span>
                            </div>
                            <p class="text-xs text-slate-600 line-clamp-3 leading-relaxed" data-i18n="book1_desc">
                                Sebuah epik fiksi spekulatif yang menceritakan perjalanan seorang botanis muda dalam mengungkap bahasa rahasia hutan hujan purba di pedalaman Kalimantan.
                            </p>
                        </div>
                    </div>

                    <div class="pt-6 mt-4 border-t border-mint-200 flex items-center justify-between gap-2">
                        <button onclick="openBookModal('whispers')" class="text-xs font-bold text-mint-800 hover:text-mint-600 flex items-center gap-1">
                            <i class="fa-solid fa-eye"></i> <span data-i18n="btn_quick_view">Detail & Sinopsis</span>
                        </button>
                        <button onclick="openReaderModal('whispers')" class="bg-mint-800 hover:bg-mint-900 text-white text-xs font-semibold px-4 py-2 rounded-full transition shadow">
                            <i class="fa-solid fa-book-reader mr-1"></i> <span data-i18n="btn_read_chapter">Baca Bab 1</span>
                        </button>
                    </div>
                </div>

                <!-- Book Card 2: The Silent Architecture -->
                <div class="book-item fiction glass-card rounded-3xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 border border-mint-200 flex flex-col justify-between group">
                    <div class="space-y-4">
                        <div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-slate-900 to-mint-900 h-64 flex items-center justify-center p-6 text-white text-center shadow-inner">
                            <span class="absolute top-3 right-3 bg-mint-200 text-mint-950 font-bold text-[10px] px-2 py-0.5 rounded uppercase">Award Winner</span>
                            <div class="space-y-2">
                                <span class="text-[10px] uppercase tracking-widest text-mint-300">Novel • 2022</span>
                                <h3 class="font-serif text-2xl font-bold text-cream">The Silent Architecture</h3>
                                <p class="text-xs text-mint-200 italic">"Bangunan yang kita dirikan adalah cermin ingatan yang terlupakan."</p>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <div class="flex justify-between items-center text-xs text-slate-500">
                                <span><i class="fa-regular fa-file-lines mr-1"></i> 412 Halaman</span>
                                <span><i class="fa-solid fa-star text-gold-500 mr-1"></i> 4.88 / 5.0</span>
                            </div>
                            <p class="text-xs text-slate-600 line-clamp-3 leading-relaxed" data-i18n="book2_desc">
                                Eksplorasi keheningan kota pasca-perang melalui sudut pandang seorang arsitek katedral tua yang menyembunyikan cetak biru kenangan bangsa.
                            </p>
                        </div>
                    </div>

                    <div class="pt-6 mt-4 border-t border-mint-200 flex items-center justify-between gap-2">
                        <button onclick="openBookModal('silent')" class="text-xs font-bold text-mint-800 hover:text-mint-600 flex items-center gap-1">
                            <i class="fa-solid fa-eye"></i> <span data-i18n="btn_quick_view">Detail & Sinopsis</span>
                        </button>
                        <button onclick="openReaderModal('silent')" class="bg-mint-800 hover:bg-mint-900 text-white text-xs font-semibold px-4 py-2 rounded-full transition shadow">
                            <i class="fa-solid fa-book-reader mr-1"></i> <span data-i18n="btn_read_chapter">Baca Bab 1</span>
                        </button>
                    </div>
                </div>

                <!-- Book Card 3: Solitude & Modern Solace -->
                <div class="book-item essay glass-card rounded-3xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 border border-mint-200 flex flex-col justify-between group">
                    <div class="space-y-4">
                        <div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-mint-800 via-mint-700 to-gold-600/30 h-64 flex items-center justify-center p-6 text-white text-center shadow-inner">
                            <span class="absolute top-3 right-3 bg-gold-400 text-mint-950 font-bold text-[10px] px-2 py-0.5 rounded uppercase">Essay Collection</span>
                            <div class="space-y-2">
                                <span class="text-[10px] uppercase tracking-widest text-mint-200">Esai Filsafat • 2024</span>
                                <h3 class="font-serif text-2xl font-bold text-cream">Solitude & Modern Solace</h3>
                                <p class="text-xs text-mint-100 italic">"Menemukan kedamaian di era kejenuhan digital."</p>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <div class="flex justify-between items-center text-xs text-slate-500">
                                <span><i class="fa-regular fa-file-lines mr-1"></i> 256 Halaman</span>
                                <span><i class="fa-solid fa-star text-gold-500 mr-1"></i> 4.95 / 5.0</span>
                            </div>
                            <p class="text-xs text-slate-600 line-clamp-3 leading-relaxed" data-i18n="book3_desc">
                                Kumpulan 24 esai kritis yang merenungkan pentingnya kesendirian yang disengaja, seni melambat, dan merawat kewarasan jiwa.
                            </p>
                        </div>
                    </div>

                    <div class="pt-6 mt-4 border-t border-mint-200 flex items-center justify-between gap-2">
                        <button onclick="openBookModal('solitude')" class="text-xs font-bold text-mint-800 hover:text-mint-600 flex items-center gap-1">
                            <i class="fa-solid fa-eye"></i> <span data-i18n="btn_quick_view">Detail & Sinopsis</span>
                        </button>
                        <button onclick="openReaderModal('solitude')" class="bg-mint-800 hover:bg-mint-900 text-white text-xs font-semibold px-4 py-2 rounded-full transition shadow">
                            <i class="fa-solid fa-book-reader mr-1"></i> <span data-i18n="btn_read_chapter">Baca Bab 1</span>
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- FEATURED ARTICLES, ESSAYS & BLOG JOURNAL -->
    <section id="journal" class="py-20 bg-cream">
        <div class="max-w-7xl mx-auto px-4 sm:px-8 space-y-12">
            
            <div class="text-center max-w-2xl mx-auto space-y-3">
                <span class="text-xs font-bold uppercase tracking-widest text-mint-700 bg-mint-100 px-3 py-1 rounded-full" data-i18n="journal_tag">Ruang Baca & Jurnal Penulis</span>
                <h2 class="font-serif text-3xl sm:text-5xl font-bold text-mint-950" data-i18n="journal_heading">Esai, Catatan & Pemikiran Terkini</h2>
                <p class="text-xs sm:text-sm text-slate-600" data-i18n="journal_sub">Refleksi mingguan seputar proses kreatif, kritik sastra, dan filosofi kehidupan.</p>
            </div>

            <!-- Articles Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                
                <!-- Article 1 -->
                <article class="glass-card rounded-2xl p-6 border border-mint-200 hover:shadow-xl transition space-y-4 flex flex-col justify-between">
                    <div class="space-y-3">
                        <div class="flex justify-between items-center text-xs text-mint-700 font-semibold">
                            <span><i class="fa-regular fa-clock mr-1"></i> 6 Mins Read</span>
                            <span class="bg-mint-100 px-2.5 py-0.5 rounded-full text-[10px]">Filosofi Sastra</span>
                        </div>
                        <h3 class="font-serif text-xl font-bold text-mint-950 hover:text-mint-700 transition cursor-pointer" onclick="openArticleModal(1)">
                            Seni Menatap Sunyi: Mengapa Penulis Membutuhkan Jarak dari Keramaian
                        </h3>
                        <p class="text-xs text-slate-600 line-clamp-3 leading-relaxed">
                            Di dunia yang terobsesi dengan konektivitas konstan, tindakan mengundurkan diri secara sukarela menjadi bentuk perlawanan puitis terhebat.
                        </p>
                    </div>

                    <div class="pt-4 border-t border-mint-100 flex items-center justify-between text-xs">
                        <span class="text-slate-400">18 Oktober 2026</span>
                        <button onclick="openArticleModal(1)" class="font-bold text-mint-800 hover:underline flex items-center gap-1">
                            <span data-i18n="btn_read_essay">Baca Esai Full</span> &rarr;
                        </button>
                    </div>
                </article>

                <!-- Article 2 -->
                <article class="glass-card rounded-2xl p-6 border border-mint-200 hover:shadow-xl transition space-y-4 flex flex-col justify-between">
                    <div class="space-y-3">
                        <div class="flex justify-between items-center text-xs text-mint-700 font-semibold">
                            <span><i class="fa-regular fa-clock mr-1"></i> 8 Mins Read</span>
                            <span class="bg-mint-100 px-2.5 py-0.5 rounded-full text-[10px]">Proses Kreatif</span>
                        </div>
                        <h3 class="font-serif text-xl font-bold text-mint-950 hover:text-mint-700 transition cursor-pointer" onclick="openArticleModal(2)">
                            Metafora Hutan dan Bahasa Purba dalam Fiksi Spekulatif
                        </h3>
                        <p class="text-xs text-slate-600 line-clamp-3 leading-relaxed">
                            Bagaimana struktur ekosistem ekologis dapat mengilhami perancangan plot dan arsitektur karakter dalam prosa modern.
                        </p>
                    </div>

                    <div class="pt-4 border-t border-mint-100 flex items-center justify-between text-xs">
                        <span class="text-slate-400">02 Oktober 2026</span>
                        <button onclick="openArticleModal(2)" class="font-bold text-mint-800 hover:underline flex items-center gap-1">
                            <span data-i18n="btn_read_essay">Baca Esai Full</span> &rarr;
                        </button>
                    </div>
                </article>

                <!-- Article 3 -->
                <article class="glass-card rounded-2xl p-6 border border-mint-200 hover:shadow-xl transition space-y-4 flex flex-col justify-between">
                    <div class="space-y-3">
                        <div class="flex justify-between items-center text-xs text-mint-700 font-semibold">
                            <span><i class="fa-regular fa-clock mr-1"></i> 5 Mins Read</span>
                            <span class="bg-mint-100 px-2.5 py-0.5 rounded-full text-[10px]">Catatan Budaya</span>
                        </div>
                        <h3 class="font-serif text-xl font-bold text-mint-950 hover:text-mint-700 transition cursor-pointer" onclick="openArticleModal(3)">
                            Masa Depan Buku Cetak di Era Kecerdasan Buatan
                        </h3>
                        <p class="text-xs text-slate-600 line-clamp-3 leading-relaxed">
                            Meskipun AI dapat mereplikasi sintaksis, taktil aroma kertas dan keintiman aura teks tetap tak tergantikan.
                        </p>
                    </div>

                    <div class="pt-4 border-t border-mint-100 flex items-center justify-between text-xs">
                        <span class="text-slate-400">14 September 2026</span>
                        <button onclick="openArticleModal(3)" class="font-bold text-mint-800 hover:underline flex items-center gap-1">
                            <span data-i18n="btn_read_essay">Baca Esai Full</span> &rarr;
                        </button>
                    </div>
                </article>

            </div>
        </div>
    </section>

    <!-- UPCOMING BOOK RELEASES & EVENT SCHEDULE -->
    <section id="events" class="py-20 bg-mint-900 text-mint-100 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-8 relative z-10 space-y-12">
            
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 border-b border-mint-800 pb-8">
                <div class="space-y-2">
                    <span class="text-xs font-bold uppercase tracking-widest text-gold-400 bg-mint-800 px-3 py-1 rounded-full border border-mint-700" data-i18n="events_tag">Agenda & Temu Pembaca</span>
                    <h2 class="font-serif text-3xl sm:text-5xl font-bold text-cream" data-i18n="events_heading">Jadwal Tur Buku & Workshop</h2>
                </div>
                <p class="text-xs sm:text-sm text-mint-300 max-w-md" data-i18n="events_sub">
                    Daftar peluncuran buku, diskusi terbuka, masterclass penulisan kreatif, dan bedah karya secara tatap muka maupun daring.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                
                <!-- Event Card 1 -->
                <div class="bg-mint-950/80 rounded-2xl p-6 border border-mint-800 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-6 hover:border-mint-600 transition">
                    <div class="flex gap-4 items-center">
                        <div class="bg-mint-800 text-gold-400 font-serif text-center p-3 rounded-xl w-16 flex-shrink-0 border border-mint-700">
                            <span class="block text-2xl font-bold">12</span>
                            <span class="block text-[10px] uppercase tracking-wider font-sans text-mint-200">NOV 2026</span>
                        </div>
                        <div class="space-y-1">
                            <span class="text-[10px] bg-gold-500/20 text-gold-400 border border-gold-500/40 font-bold px-2 py-0.5 rounded uppercase">Jakarta Book Fair</span>
                            <h3 class="font-serif text-lg font-bold text-white">Grand Book Signing & Dialogue</h3>
                            <p class="text-xs text-mint-300"><i class="fa-solid fa-location-dot mr-1"></i> Main Stage Hall A, JCC Senayan</p>
                        </div>
                    </div>

                    <button onclick="openRSVPModal('Jakarta Book Fair')" class="w-full sm:w-auto bg-gold-500 hover:bg-gold-600 text-mint-950 font-bold text-xs px-5 py-2.5 rounded-full transition flex-shrink-0 text-center">
                        <i class="fa-regular fa-ticket mr-1"></i> <span data-i18n="btn_rsvp">Reservasi Kursi</span>
                    </button>
                </div>

                <!-- Event Card 2 -->
                <div class="bg-mint-950/80 rounded-2xl p-6 border border-mint-800 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-6 hover:border-mint-600 transition">
                    <div class="flex gap-4 items-center">
                        <div class="bg-mint-800 text-gold-400 font-serif text-center p-3 rounded-xl w-16 flex-shrink-0 border border-mint-700">
                            <span class="block text-2xl font-bold">28</span>
                            <span class="block text-[10px] uppercase tracking-wider font-sans text-mint-200">NOV 2026</span>
                        </div>
                        <div class="space-y-1">
                            <span class="text-[10px] bg-mint-700 text-mint-100 font-bold px-2 py-0.5 rounded uppercase">Webinar Masterclass</span>
                            <h3 class="font-serif text-lg font-bold text-white">Creative Writing & Worldbuilding</h3>
                            <p class="text-xs text-mint-300"><i class="fa-solid fa-video mr-1"></i> Live via Zoom Interactive</p>
                        </div>
                    </div>

                    <button onclick="openRSVPModal('Webinar Masterclass')" class="w-full sm:w-auto bg-gold-500 hover:bg-gold-600 text-mint-950 font-bold text-xs px-5 py-2.5 rounded-full transition flex-shrink-0 text-center">
                        <i class="fa-regular fa-ticket mr-1"></i> <span data-i18n="btn_rsvp">Reservasi Kursi</span>
                    </button>
                </div>

            </div>
        </div>
    </section>

    <!-- SPEAKING & COLLABORATION SERVICES -->
    <section id="services" class="py-20 bg-cream">
        <div class="max-w-7xl mx-auto px-4 sm:px-8 space-y-12">
            
            <div class="text-center max-w-2xl mx-auto space-y-3">
                <span class="text-xs font-bold uppercase tracking-widest text-mint-700 bg-mint-100 px-3 py-1 rounded-full" data-i18n="services_tag">Layanan & Undang Pembicara</span>
                <h2 class="font-serif text-3xl sm:text-5xl font-bold text-mint-950" data-i18n="services_heading">Kolaborasi Professional</h2>
                <p class="text-xs sm:text-sm text-slate-600" data-i18n="services_sub">Aria Thorne menerima pencerahan naskah, pembicara seminar, hingga kerja sama lisensi karya.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                
                <!-- Service 1 -->
                <div class="glass-card rounded-2xl p-6 border border-mint-200 hover:border-mint-500 transition space-y-4">
                    <div class="w-12 h-12 rounded-xl bg-mint-800 text-gold-400 flex items-center justify-center text-xl">
                        <i class="fa-solid fa-microphone-lines"></i>
                    </div>
                    <h3 class="font-serif text-lg font-bold text-mint-950" data-i18n="service_1_title">Keynote Speaker</h3>
                    <p class="text-xs text-slate-600 leading-relaxed" data-i18n="service_1_desc">
                        Pembicara utama dalam festival literasi, konferensi kebudayaan, simposium pendidikan, dan diskusi buku nasional.
                    </p>
                </div>

                <!-- Service 2 -->
                <div class="glass-card rounded-2xl p-6 border border-mint-200 hover:border-mint-500 transition space-y-4">
                    <div class="w-12 h-12 rounded-xl bg-mint-800 text-gold-400 flex items-center justify-center text-xl">
                        <i class="fa-solid fa-chalkboard-user"></i>
                    </div>
                    <h3 class="font-serif text-lg font-bold text-mint-950" data-i18n="service_2_title">Writing Workshop</h3>
                    <p class="text-xs text-slate-600 leading-relaxed" data-i18n="service_2_desc">
                        Pelatihan intensif penulisan fiksi spekulatif, penyusunan narasi mendalam, dan teknik eksplorasi metafora puitis.
                    </p>
                </div>

                <!-- Service 3 -->
                <div class="glass-card rounded-2xl p-6 border border-mint-200 hover:border-mint-500 transition space-y-4">
                    <div class="w-12 h-12 rounded-xl bg-mint-800 text-gold-400 flex items-center justify-center text-xl">
                        <i class="fa-solid fa-scroll"></i>
                    </div>
                    <h3 class="font-serif text-lg font-bold text-mint-950" data-i18n="service_3_title">Literary Consultancy</h3>
                    <p class="text-xs text-slate-600 leading-relaxed" data-i18n="service_3_desc">
                        Konsultasi penyuntingan naskah novel, pengembangan plot cerita film/skenario, dan kurasi antologi fiksi.
                    </p>
                </div>

                <!-- Service 4 -->
                <div class="glass-card rounded-2xl p-6 border border-mint-200 hover:border-mint-500 transition space-y-4">
                    <div class="w-12 h-12 rounded-xl bg-mint-800 text-gold-400 flex items-center justify-center text-xl">
                        <i class="fa-solid fa-handshake"></i>
                    </div>
                    <h3 class="font-serif text-lg font-bold text-mint-950" data-i18n="service_4_title">Media & Brand Collaboration</h3>
                    <p class="text-xs text-slate-600 leading-relaxed" data-i18n="service_4_desc">
                        Kolaborasi pembuatan narasi brand, esai kampanye tematik, serta kerja sama lisensi hak cipta adaptasi film.
                    </p>
                </div>

            </div>
        </div>
    </section>

    <!-- TESTIMONIALS / CRITIC REVIEWS -->
    <section class="py-20 bg-mint-50/60 border-y border-mint-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-8 space-y-12">
            
            <div class="text-center max-w-2xl mx-auto space-y-2">
                <span class="text-xs font-bold uppercase tracking-widest text-mint-700 bg-mint-100 px-3 py-1 rounded-full" data-i18n="reviews_tag">Ulasan Pembaca & Kritikus</span>
                <h2 class="font-serif text-3xl sm:text-4xl font-bold text-mint-950" data-i18n="reviews_heading">Kata Merekas yang Membaca</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                
                <div class="glass-card p-6 rounded-2xl border border-mint-200 space-y-4 shadow-sm">
                    <div class="flex text-gold-500 text-xs space-x-1">
                        <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                    </div>
                    <p class="text-xs sm:text-sm text-slate-700 italic leading-relaxed">
                        "Prosa Aria Thorne memiliki kekuatan langka yang bisa menghentikan waktu. Saya merinding membaca bab terakhir Whispers of the Emerald Canopy."
                    </p>
                    <div class="flex items-center gap-3 pt-2">
                        <div class="w-9 h-9 rounded-full bg-mint-800 text-white font-bold text-xs flex items-center justify-center">
                            DR
                        </div>
                        <div>
                            <span class="font-bold text-xs text-mint-950 block">Dr. Rian Hardianto</span>
                            <span class="text-[10px] text-slate-500 block">Kritikus Sastra & Dosen Oxford</span>
                        </div>
                    </div>
                </div>

                <div class="glass-card p-6 rounded-2xl border border-mint-200 space-y-4 shadow-sm">
                    <div class="flex text-gold-500 text-xs space-x-1">
                        <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                    </div>
                    <p class="text-xs sm:text-sm text-slate-700 italic leading-relaxed">
                        "Buku 'Solitude & Modern Solace' menjadi panduan hidup saya di tengah stresnya pekerjaan ibu kota. Sangat menenangkan dan berbobot."
                    </p>
                    <div class="flex items-center gap-3 pt-2">
                        <div class="w-9 h-9 rounded-full bg-mint-800 text-white font-bold text-xs flex items-center justify-center">
                            N
                        </div>
                        <div>
                            <span class="font-bold text-xs text-mint-950 block">Nadia Sastrowardoyo</span>
                            <span class="text-[10px] text-slate-500 block">Verified Goodreads Reader</span>
                        </div>
                    </div>
                </div>

                <div class="glass-card p-6 rounded-2xl border border-mint-200 space-y-4 shadow-sm">
                    <div class="flex text-gold-500 text-xs space-x-1">
                        <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                    </div>
                    <p class="text-xs sm:text-sm text-slate-700 italic leading-relaxed">
                        "Setiap paragraf dirangkai dengan presisi kata yang tinggi. Tidak diragukan lagi Thorne adalah salah satu penulis terpenting dekade ini."
                    </p>
                    <div class="flex items-center gap-3 pt-2">
                        <div class="w-9 h-9 rounded-full bg-mint-800 text-white font-bold text-xs flex items-center justify-center">
                            TL
                        </div>
                        <div>
                            <span class="font-bold text-xs text-mint-950 block">The Literary Gazette</span>
                            <span class="text-[10px] text-slate-500 block">Editorial Review</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- CONTACT & COLLABORATION FORM -->
    <section id="contact" class="py-20 bg-cream">
        <div class="max-w-4xl mx-auto px-4 sm:px-8">
            <div class="glass-card rounded-3xl p-8 sm:p-12 shadow-2xl border border-mint-200 relative overflow-hidden">
                <div class="space-y-3 text-center max-w-xl mx-auto mb-8">
                    <span class="text-xs font-bold uppercase tracking-widest text-mint-700 bg-mint-100 px-3 py-1 rounded-full" data-i18n="contact_tag">Formulir Kontak Direct</span>
                    <h2 class="font-serif text-3xl sm:text-4xl font-bold text-mint-950" data-i18n="contact_heading">Mulai Diskusi atau Undangan</h2>
                    <p class="text-xs sm:text-sm text-slate-600" data-i18n="contact_sub">Tim manajemen Aria Thorne akan merespons pesan Anda dalam 1-2 hari kerja.</p>
                </div>

                <form id="contact-form" onsubmit="handleFormSubmit(event)" class="space-y-5">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-xs font-bold text-mint-900 mb-1" data-i18n="form_name">Nama Lengkap *</label>
                            <input type="text" required placeholder="Contoh: Sarah Wijaya" class="w-full px-4 py-3 rounded-xl border border-mint-200 focus:outline-none focus:ring-2 focus:ring-mint-600 text-xs sm:text-sm">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-mint-900 mb-1" data-i18n="form_email">Alamat Email *</label>
                            <input type="email" required placeholder="sarah@domain.com" class="w-full px-4 py-3 rounded-xl border border-mint-200 focus:outline-none focus:ring-2 focus:ring-mint-600 text-xs sm:text-sm">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-xs font-bold text-mint-900 mb-1" data-i18n="form_purpose">Tujuan Komunikasi *</label>
                            <select class="w-full px-4 py-3 rounded-xl border border-mint-200 focus:outline-none focus:ring-2 focus:ring-mint-600 text-xs sm:text-sm bg-white">
                                <option value="speaking" data-i18n="opt_1">Undangan Keynote / Speaker</option>
                                <option value="media" data-i18n="opt_2">Wawancara Press & Media</option>
                                <option value="rights" data-i18n="opt_3">Hak Cipta & Terjemahan</option>
                                <option value="general" data-i18n="opt_4">Pesan Apresiasi Pembaca</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-mint-900 mb-1" data-i18n="form_org">Instansi / Perusahaan</label>
                            <input type="text" placeholder="Contoh: Universitas Indonesia / Media" class="w-full px-4 py-3 rounded-xl border border-mint-200 focus:outline-none focus:ring-2 focus:ring-mint-600 text-xs sm:text-sm">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-mint-900 mb-1" data-i18n="form_message">Isi Pesan / Detail Undangan *</label>
                        <textarea rows="4" required placeholder="Tuliskan detail acara, tanggal, atau pesan Anda secara lengkap..." class="w-full px-4 py-3 rounded-xl border border-mint-200 focus:outline-none focus:ring-2 focus:ring-mint-600 text-xs sm:text-sm"></textarea>
                    </div>

                    <button type="submit" class="w-full bg-mint-800 hover:bg-mint-900 text-white font-bold text-sm py-3.5 rounded-xl transition shadow-lg flex items-center justify-center gap-2">
                        <i class="fa-solid fa-paper-plane text-gold-400"></i>
                        <span data-i18n="form_submit">Kirim Pesan Sekarang</span>
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- FAQ ACCORDION -->
    <section id="faq" class="py-16 bg-mint-50/50">
        <div class="max-w-3xl mx-auto px-4 sm:px-8 space-y-8">
            <div class="text-center space-y-2">
                <span class="text-xs font-bold uppercase tracking-widest text-mint-700 bg-mint-100 px-3 py-1 rounded-full" data-i18n="faq_tag">Pertanyaan Umum</span>
                <h2 class="font-serif text-2xl sm:text-4xl font-bold text-mint-950" data-i18n="faq_heading">Frequently Asked Questions</h2>
            </div>

            <div class="space-y-4">
                <div class="border border-mint-200 bg-white rounded-2xl overflow-hidden">
                    <button onclick="toggleFAQ(1)" class="w-full p-5 text-left font-serif font-bold text-mint-950 flex justify-between items-center text-sm sm:text-base">
                        <span data-i18n="faq_q1">Di mana saya bisa membeli buku yang ditandatangani langsung oleh Aria Thorne?</span>
                        <i id="faq-icon-1" class="fa-solid fa-chevron-down text-mint-700 transition-transform"></i>
                    </button>
                    <div id="faq-ans-1" class="hidden p-5 pt-0 text-xs sm:text-sm text-slate-600 border-t border-mint-100 leading-relaxed" data-i18n="faq_a1">
                        Edisi bertanda tangan khusus (Signed Edition) tersedia secara terbatas melalui link Pre-Order di toko resmi penerbit serta pada sesi bedah buku langsung di toko Gramedia utama.
                    </div>
                </div>

                <div class="border border-mint-200 bg-white rounded-2xl overflow-hidden">
                    <button onclick="toggleFAQ(2)" class="w-full p-5 text-left font-serif font-bold text-mint-950 flex justify-between items-center text-sm sm:text-base">
                        <span data-i18n="faq_q2">Apakah Aria menerima bimbingan naskah privat untuk penulis pemula?</span>
                        <i id="faq-icon-2" class="fa-solid fa-chevron-down text-mint-700 transition-transform"></i>
                    </button>
                    <div id="faq-ans-2" class="hidden p-5 pt-0 text-xs sm:text-sm text-slate-600 border-t border-mint-100 leading-relaxed" data-i18n="faq_a2">
                        Saat ini bimbingan privat dibuka secara berkala melalui program Masterclass kelompok kecil 4x setahun. Silakan pantau seksi Events & Masterclass untuk pendaftaran gelombang berikutnya.
                    </div>
                </div>

                <div class="border border-mint-200 bg-white rounded-2xl overflow-hidden">
                    <button onclick="toggleFAQ(3)" class="w-full p-5 text-left font-serif font-bold text-mint-950 flex justify-between items-center text-sm sm:text-base">
                        <span data-i18n="faq_q3">Bagaimana tata cara mengajukan lisensi terjemahan atau adaptasi film?</span>
                        <i id="faq-icon-3" class="fa-solid fa-chevron-down text-mint-700 transition-transform"></i>
                    </button>
                    <div id="faq-ans-3" class="hidden p-5 pt-0 text-xs sm:text-sm text-slate-600 border-t border-mint-100 leading-relaxed" data-i18n="faq_a3">
                        Seluruh permohonan hak adaptasi media dan lisensi penerbitan luar negeri dikelola oleh Literary Agency kami. Silakan pilih opsi 'Hak Cipta & Terjemahan' pada formulir kontak di atas.
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- NEWSLETTER SUBSCRIPTION -->
    <section class="py-16 bg-mint-900 text-cream">
        <div class="max-w-4xl mx-auto px-4 sm:px-8 text-center space-y-6">
            <div class="w-12 h-12 mx-auto rounded-full bg-mint-800 border border-gold-500/40 text-gold-400 flex items-center justify-center text-xl">
                <i class="fa-solid fa-envelope-open-text"></i>
            </div>
            <h2 class="font-serif text-2xl sm:text-4xl font-bold text-white" data-i18n="news_title">Berlangganan "The Ink & Coffee Journal"</h2>
            <p class="text-xs sm:text-sm text-mint-200 max-w-xl mx-auto" data-i18n="news_sub">
                Dapatkan surat puitis mingguan, naskah bab rahasia yang belum diterbitkan, dan diskon khusus buku bertanda tangan langsung ke inbox Anda.
            </p>
            <form onsubmit="handleNewsletter(event)" class="flex flex-col sm:flex-row gap-3 max-w-md mx-auto">
                <input type="email" required placeholder="Masukkan alamat email Anda..." class="px-5 py-3 rounded-full text-slate-900 text-xs sm:text-sm flex-grow focus:outline-none">
                <button type="submit" class="bg-gold-500 hover:bg-gold-600 text-mint-950 font-bold px-6 py-3 rounded-full text-xs sm:text-sm transition flex-shrink-0">
                    <span data-i18n="news_btn">Gabung Gratis</span>
                </button>
            </form>
            <span class="text-[10px] text-mint-400 block" data-i18n="news_disclaimer">Tanpa spam. Anda dapat berhenti berlangganan kapan saja.</span>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="bg-mint-950 text-mint-300 text-xs py-12 border-t border-mint-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-8 grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
            <div class="space-y-3">
                <span class="font-serif text-xl font-bold text-white block">Aria Thorne</span>
                <p class="text-mint-400 leading-relaxed" data-i18n="footer_bio">
                    Penulis, Esaiwan, dan Penceramah Sastra Internasional. Mendedikasikan kata untuk kedalaman jiwa.
                </p>
            </div>
            <div>
                <strong class="text-white block font-semibold mb-3 uppercase tracking-wider text-[10px]" data-i18n="foot_nav">Navigasi Sastra</strong>
                <ul class="space-y-2">
                    <li><a href="#about" class="hover:text-gold-400 transition">Biografi Penulis</a></li>
                    <li><a href="#books" class="hover:text-gold-400 transition">Katalog Buku</a></li>
                    <li><a href="#journal" class="hover:text-gold-400 transition">Jurnal Esai</a></li>
                    <li><a href="#events" class="hover:text-gold-400 transition">Jadwal Tur Buku</a></li>
                </ul>
            </div>
            <div>
                <strong class="text-white block font-semibold mb-3 uppercase tracking-wider text-[10px]" data-i18n="foot_media">Kemitraan Media</strong>
                <ul class="space-y-2">
                    <li><a href="#services" class="hover:text-gold-400 transition">Undang Pembicara</a></li>
                    <li><a href="#contact" class="hover:text-gold-400 transition">Press Kit & Foto Resmi</a></li>
                    <li><a href="#contact" class="hover:text-gold-400 transition">Lisensi Hak Cipta</a></li>
                </ul>
            </div>
            <div>
                <strong class="text-white block font-semibold mb-3 uppercase tracking-wider text-[10px]" data-i18n="foot_social">Media Sosial Penulis</strong>
                <div class="flex space-x-3 text-base pt-1">
                    <a href="#" class="w-8 h-8 rounded-full bg-mint-900 hover:bg-gold-500 hover:text-mint-950 flex items-center justify-center transition"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#" class="w-8 h-8 rounded-full bg-mint-900 hover:bg-gold-500 hover:text-mint-950 flex items-center justify-center transition"><i class="fa-brands fa-x-twitter"></i></a>
                    <a href="#" class="w-8 h-8 rounded-full bg-mint-900 hover:bg-gold-500 hover:text-mint-950 flex items-center justify-center transition"><i class="fa-brands fa-goodreads-g"></i></a>
                    <a href="#" class="w-8 h-8 rounded-full bg-mint-900 hover:bg-gold-500 hover:text-mint-950 flex items-center justify-center transition"><i class="fa-solid fa-podcast"></i></a>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-8 pt-8 border-t border-mint-900 flex flex-col sm:flex-row justify-between items-center gap-4 text-center sm:text-left text-[11px] text-mint-500">
            <div>
                &copy; 2026 Aria Thorne Literary Estate. All rights reserved. Designed with Mint Fresh Luxury Theme.
            </div>
            <div class="flex space-x-4">
                <a href="#" class="hover:underline">Privacy Policy</a>
                <a href="#" class="hover:underline">Terms of Literary Service</a>
            </div>
        </div>
    <div class="text-center text-xs text-slate-500 py-4 border-t border-mint-200">Made with care ♡ · Website template by WEBIA</div>
</footer>

    <!-- FLOATING ACTION BUTTONS (WhatsApp & Lumi AI Author Chatbot) -->
    <div class="fixed bottom-6 right-6 z-50 flex flex-col items-end space-y-3">
        
        <!-- WhatsApp Floating Drawer Button -->
        <button onclick="toggleWAPopup()" class="w-13 h-13 sm:w-14 sm:h-14 bg-emerald-600 hover:bg-emerald-700 text-white rounded-full shadow-2xl flex items-center justify-center text-2xl transition-transform hover:scale-110 relative group">
            <i class="fa-brands fa-whatsapp"></i>
            <span class="absolute right-full mr-3 bg-slate-900 text-white text-[11px] font-bold px-2.5 py-1 rounded-lg whitespace-nowrap opacity-0 group-hover:opacity-100 transition shadow">
                Tanya via WhatsApp
            </span>
        </button>

        <!-- AI Chatbot Floating Button ("Lumi AI Author Assistant") -->
        <button onclick="toggleAIChatbot()" class="w-13 h-13 sm:w-14 sm:h-14 bg-mint-800 hover:bg-mint-900 text-gold-400 border-2 border-gold-400/50 rounded-full shadow-2xl flex items-center justify-center text-2xl transition-transform hover:scale-110 relative group">
            <i class="fa-solid fa-sparkles"></i>
            <span class="absolute right-full mr-3 bg-mint-950 text-gold-400 text-[11px] font-bold px-2.5 py-1 rounded-lg whitespace-nowrap opacity-0 group-hover:opacity-100 transition shadow border border-gold-500/30">
                Lumi AI Author Assistant
            </span>
        </button>
    </div>

    <!-- WHATSAPP POPUP DRAWER MODAL -->
    <div id="wa-modal" class="hidden fixed bottom-24 right-6 z-50 w-80 glass-card rounded-2xl p-5 shadow-2xl border border-mint-300 animate-fade-in">
        <div class="flex justify-between items-center mb-3 border-b border-mint-200 pb-2">
            <div class="flex items-center gap-2">
                <div class="w-3 h-3 rounded-full bg-emerald-500 animate-ping"></div>
                <strong class="text-xs font-bold text-mint-950">Tim Manajemen Penulis</strong>
            </div>
            <button onclick="toggleWAPopup()" class="text-slate-400 hover:text-slate-700 text-xs"><i class="fa-solid fa-xmark"></i></button>
        </div>
        <p class="text-xs text-slate-600 mb-3">Halo! Ada yang bisa kami bantu terkait pesanan buku bertanda tangan atau jadwal acara?</p>
        <a href="https://wa.me/628123456789?text=Halo%20Tim%20Aria%20Thorne,%20saya%20ingin%20bertanya%20mengenai..." target="_blank" class="w-full bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold py-2.5 rounded-xl flex items-center justify-center gap-2 shadow">
            <i class="fa-brands fa-whatsapp text-lg"></i> Buka Chat WhatsApp
        </a>
    </div>

    <!-- LUMI AI CHATBOT DRAWER MODAL -->
    <div id="ai-modal" class="hidden fixed bottom-24 right-6 z-50 w-85 sm:w-96 glass-card bg-mint-950 text-cream rounded-2xl p-5 shadow-2xl border border-gold-500/40 flex flex-col h-[420px] animate-fade-in">
        <div class="flex justify-between items-center pb-3 border-b border-mint-800">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-full bg-gold-500 text-mint-950 flex items-center justify-center text-xs font-bold">
                    <i class="fa-solid fa-feather-pointed"></i>
                </div>
                <div>
                    <strong class="text-xs font-bold text-white block">Lumi AI Assistant</strong>
                    <span class="text-[10px] text-mint-300 block">Pakar Rekomendasi Buku Aria Thorne</span>
                </div>
            </div>
            <button onclick="toggleAIChatbot()" class="text-mint-400 hover:text-white text-xs"><i class="fa-solid fa-xmark"></i></button>
        </div>

        <!-- Chat History Window -->
        <div id="ai-chat-history" class="flex-grow overflow-y-auto my-3 space-y-3 text-xs pr-1">
            <div class="bg-mint-900 p-3 rounded-xl border border-mint-800 text-mint-100 max-w-[85%]">
                Salam hangat! Saya Lumi, asisten AI Aria Thorne. Mau minta rekomendasi buku, jadwal acara, atau sinopsis?
            </div>
        </div>

        <!-- Quick AI Suggestion Chips -->
        <div class="flex gap-1 overflow-x-auto pb-2 text-[10px]">
            <button onclick="sendQuickAIQuery('Rekomendasikan buku terbaru')" class="bg-mint-800 hover:bg-mint-700 text-mint-200 px-2.5 py-1 rounded-full whitespace-nowrap">📚 Buku Terbaru</button>
            <button onclick="sendQuickAIQuery('Kapan jadwal acara terdekat?')" class="bg-mint-800 hover:bg-mint-700 text-mint-200 px-2.5 py-1 rounded-full whitespace-nowrap">📅 Event Terdekat</button>
            <button onclick="sendQuickAIQuery('Cara beli buku bertanda tangan')" class="bg-mint-800 hover:bg-mint-700 text-mint-200 px-2.5 py-1 rounded-full whitespace-nowrap">✍️ Signed Copy</button>
        </div>

        <!-- Input Box -->
        <div class="flex gap-2 pt-2 border-t border-mint-800">
            <input id="ai-input" type="text" placeholder="Tanyakan sesuatu pada Lumi..." class="flex-grow px-3 py-2 bg-mint-900 text-white rounded-xl text-xs focus:outline-none border border-mint-800">
            <button onclick="sendAIChat()" class="bg-gold-500 hover:bg-gold-600 text-mint-950 font-bold px-3 py-2 rounded-xl text-xs"><i class="fa-solid fa-paper-plane"></i></button>
        </div>
    </div>

    <!-- BOOK SINOPSIS & PURCHASE MODAL -->
    <div id="book-modal" class="hidden fixed inset-0 z-50 bg-slate-900/80 backdrop-blur-md flex items-center justify-center p-4">
        <div class="bg-white rounded-3xl max-w-2xl w-full p-6 sm:p-8 relative shadow-2xl max-h-[90vh] overflow-y-auto border border-mint-200">
            <button onclick="closeBookModal()" class="absolute top-4 right-4 text-slate-400 hover:text-slate-800 text-lg w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center">
                <i class="fa-solid fa-xmark"></i>
            </button>
            <div id="book-modal-content" class="space-y-4">
                <!-- Content injected dynamically via JS -->
            </div>
        </div>
    </div>

    <!-- CHAPTER SAMPLE E-READER MODAL -->
    <div id="reader-modal" class="hidden fixed inset-0 z-50 bg-mint-950/90 backdrop-blur-lg flex items-center justify-center p-2 sm:p-6">
        <div class="bg-cream rounded-3xl max-w-3xl w-full h-[85vh] p-6 sm:p-10 relative shadow-2xl flex flex-col justify-between border-2 border-mint-300">
            <div class="flex justify-between items-center border-b border-mint-200 pb-4">
                <div>
                    <span class="text-[10px] uppercase font-bold text-mint-700 tracking-widest block">Pratinjau E-Reader</span>
                    <h3 id="reader-title" class="font-serif text-lg sm:text-xl font-bold text-mint-950">Bab 1: Bisikan Akar Purba</h3>
                </div>
                <button onclick="closeReaderModal()" class="text-slate-400 hover:text-slate-800 text-lg w-8 h-8 rounded-full bg-mint-100 flex items-center justify-center">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <!-- E-Reader Chapter Text Body -->
            <div class="overflow-y-auto my-4 pr-2 font-serif text-sm sm:text-base leading-relaxed text-slate-800 space-y-4">
                <p class="first-letter:text-4xl first-letter:font-bold first-letter:text-mint-800 first-letter:float-left first-letter:mr-2">
                    Matahari belum sepenuhnya terbit ketika Elena melangkahkan kakinya menembus kabut tebal di batas hutan. Di sini, keheningan bukanlah ketiadaan suara, melainkan orchestrasi tak kasat mata dari jutaan dedaunan yang bernapas dalam ritme yang sama.
                </p>
                <p>
                    Setiap langkah di atas lumut basah mengirimkan getaran halus. Dalam catatan jurnal ilmiahnya, spesies pohon raksasa ini seharusnya telah punah dua abad silam. Namun di hadapannya, kanopi hijau itu berdiri kokoh, membiaskan sinar emas pertama menjadi berkas-berkas cahaya puitis.
                </p>
                <p>
                    "Jika kau mendengarkan cukup dekat," bisik suara di balik benaknya, "kayu dan batu tidak pernah benar-benar diam. Mereka menyimpan memori tanah yang kita pijak."
                </p>
            </div>

            <div class="border-t border-mint-200 pt-4 flex justify-between items-center text-xs">
                <span class="text-slate-500">Halaman 1 dari 12 (Sampel Gratis)</span>
                <button onclick="closeReaderModal(); openBookModal('whispers');" class="bg-mint-800 text-white font-bold px-4 py-2 rounded-full">
                    Beli Buku Lengkap &rarr;
                </button>
            </div>
        </div>
    </div>

    <!-- AUDIO PROLOGUE PLAYER HTML5 AUDIO -->
    <audio id="hero-audio" src="https://cdn.pixabay.com/download/audio/2022/05/27/audio_1808fbf07a.mp3?filename=ambient-nature-112521.mp3" preload="none"></audio>

    <!-- JAVASCRIPT CONTROLLERS -->
    <script>
    (() => {
        const books = {
            whispers: { title: 'Whispers of the Emerald Canopy', category: 'Novel · 2025', pages: '384 halaman', rating: '4.92 / 5.0', description: 'Sebuah epik fiksi spekulatif tentang botanis muda yang mengungkap bahasa rahasia hutan hujan purba di pedalaman Kalimantan.' },
            silent: { title: 'The Silent Architecture', category: 'Novel · 2022', pages: '412 halaman', rating: '4.88 / 5.0', description: 'Eksplorasi keheningan kota pasca-perang melalui sudut pandang seorang arsitek yang menyimpan cetak biru kenangan bangsa.' },
            solitude: { title: 'Solitude & Modern Solace', category: 'Esai Filsafat · 2024', pages: '256 halaman', rating: '4.95 / 5.0', description: 'Kumpulan esai tentang kesendirian yang disengaja, seni melambat, dan merawat kewarasan jiwa.' }
        };
        const articles = {
            1: { title: 'Seni Menatap Sunyi: Mengapa Penulis Membutuhkan Jarak dari Keramaian', body: 'Di dunia yang terobsesi dengan konektivitas konstan, mengambil jarak dari keramaian dapat menjadi ruang untuk mendengar pikiran sendiri. Kesunyian bukan berarti menolak dunia, melainkan memberi perhatian pada hal-hal yang sering terlewat. Bagi penulis, jeda membantu pengalaman sehari-hari tumbuh menjadi gagasan dan cerita.' },
            2: { title: 'Metafora Hutan dan Bahasa Purba dalam Fiksi Spekulatif', body: 'Hutan menawarkan model narasi yang saling terhubung: setiap akar, kanopi, dan organisme memiliki peran. Dalam fiksi spekulatif, ekosistem dapat menjadi inspirasi untuk membangun dunia, konflik, serta karakter yang saling memengaruhi.' },
            3: { title: 'Masa Depan Buku Cetak di Era Kecerdasan Buatan', body: 'Teknologi membantu penulis dan pembaca menemukan cara baru berinteraksi dengan teks. Namun buku cetak tetap menawarkan pengalaman fisik yang khas: tekstur kertas, aroma halaman, catatan di tepi buku, dan hubungan personal dengan sebuah karya.' }
        };
        const $ = (id) => document.getElementById(id);
        const show = (id) => { const el = $(id); if (el) { el.classList.remove('hidden'); document.body.classList.add('overflow-hidden'); } };
        const hide = (id) => { const el = $(id); if (el) { el.classList.add('hidden'); if (!document.querySelector('#book-modal:not(.hidden), #reader-modal:not(.hidden)')) document.body.classList.remove('overflow-hidden'); } };

        window.openBookModal = function(key) {
            const book = books[key] || books.whispers;
            const target = $('book-modal-content');
            if (target) target.innerHTML = `<span class="text-xs font-bold uppercase tracking-widest text-emerald-700">${book.category}</span><h2 class="font-serif text-2xl sm:text-3xl font-bold text-emerald-950 pr-8">${book.title}</h2><div class="flex gap-4 text-sm text-slate-500"><span>${book.pages}</span><span>★ ${book.rating}</span></div><p class="text-sm leading-relaxed text-slate-700">${book.description}</p><p class="text-xs text-slate-500">Untuk pemesanan, admin akan mengonfirmasi ketersediaan, harga akhir, ongkir, dan metode pembayaran.</p><button type="button" onclick="window.orderBook('${book.title.replace(/'/g, "\\'")}')" class="bg-emerald-900 hover:bg-emerald-800 text-white font-bold text-sm px-5 py-3 rounded-full">Tanyakan pemesanan via WhatsApp</button>`;
            show('book-modal');
        };
        window.closeBookModal = () => hide('book-modal');
        window.openReaderModal = function(key) {
            const book = books[key] || books.whispers;
            if ($('reader-title')) $('reader-title').textContent = `Sampel Bab 1 · ${book.title}`;
            show('reader-modal');
        };
        window.closeReaderModal = () => hide('reader-modal');
        window.openArticleModal = function(id) {
            const article = articles[id]; if (!article) return;
            let modal = $('article-modal');
            if (!modal) {
                modal = document.createElement('div'); modal.id = 'article-modal';
                modal.className = 'fixed inset-0 z-[220] bg-slate-950/70 backdrop-blur-sm flex items-center justify-center p-4';
                modal.innerHTML = '<div class="bg-cream max-w-2xl w-full max-h-[85vh] overflow-y-auto rounded-3xl p-6 sm:p-8 shadow-2xl"><div class="flex justify-end"><button type="button" id="close-article-modal" class="text-slate-500 hover:text-slate-900 text-xl" aria-label="Tutup">&times;</button></div><h2 id="article-modal-title" class="font-serif text-2xl sm:text-3xl font-bold text-mint-950 mb-4"></h2><p id="article-modal-body" class="text-sm sm:text-base leading-7 text-slate-700"></p><div class="mt-6 pt-4 border-t border-mint-200 text-xs text-slate-500">Aria Thorne · Essays & Journal</div></div>';
                document.body.appendChild(modal);
                modal.addEventListener('click', (event) => { if (event.target === modal) modal.remove(); });
                $('close-article-modal').addEventListener('click', () => modal.remove());
            }
            $('article-modal-title').textContent = article.title;
            $('article-modal-body').textContent = article.body;
            modal.classList.remove('hidden');
        };
        window.filterBooks = function(category) {
            document.querySelectorAll('.book-item').forEach(card => { card.classList.toggle('hidden', category !== 'all' && !card.classList.contains(category)); });
            document.querySelectorAll('.book-filter-btn').forEach(btn => {
                const active = (btn.getAttribute('onclick') || '').includes(`'${category}'`);
                btn.classList.toggle('bg-mint-800', active); btn.classList.toggle('text-white', active);
                btn.classList.toggle('bg-white', !active); btn.classList.toggle('text-slate-700', !active);
            });
        };
        window.toggleWAPopup = () => { const el = $('wa-modal'); if (el) el.classList.toggle('hidden'); if ($('ai-modal')) $('ai-modal').classList.add('hidden'); };
        window.toggleAIChatbot = () => { const el = $('ai-modal'); if (el) el.classList.toggle('hidden'); if ($('wa-modal')) $('wa-modal').classList.add('hidden'); };
        window.orderBook = function(title) {
            const message = `Halo Tim Aria Thorne, saya ingin bertanya tentang pemesanan buku: ${title}. Mohon konfirmasi ketersediaan, harga akhir, ongkir, dan metode pembayaran.`;
            window.open(`https://wa.me/628123456789?text=${encodeURIComponent(message)}`, '_blank', 'noopener');
        };
        window.sendQuickAIQuery = function(query) {
            if ($('ai-input')) $('ai-input').value = query;
            window.sendAIChat();
        };
        window.sendAIChat = function() {
            const input = $('ai-input'); const history = $('ai-chat-history'); if (!input || !history) return;
            const query = input.value.trim(); if (!query) return;
            const user = document.createElement('div'); user.className = 'ml-auto bg-mint-700 text-white p-3 rounded-xl max-w-[90%]'; user.textContent = query; history.appendChild(user);
            const reply = document.createElement('div'); reply.className = 'bg-mint-900 p-3 rounded-xl border border-mint-800 text-mint-100 max-w-[90%]';
            const q = query.toLowerCase();
            reply.textContent = q.includes('event') || q.includes('jadwal') ? 'Agenda terdekat: Jakarta Book Fair pada 12 November 2026 dan webinar Creative Writing pada 28 November 2026. Tekan tombol reservasi pada bagian Agenda untuk meminta konfirmasi admin.' : q.includes('beli') || q.includes('pesan') || q.includes('signed') ? 'Untuk menanyakan buku bertanda tangan, hubungi tim melalui tombol WhatsApp. Admin akan mengonfirmasi stok, harga akhir, ongkir, dan pembayaran.' : q.includes('terbaru') || q.includes('buku') || q.includes('rekomendasi') ? 'Aku merekomendasikan “Whispers of the Emerald Canopy” untuk kisah misteri alam, atau “Solitude & Modern Solace” untuk bacaan reflektif. Klik Detail & Sinopsis pada katalog untuk info lebih lanjut.' : 'Aku Lumi, asisten demo untuk katalog dan agenda Aria Thorne. Kamu bisa bertanya tentang buku, rekomendasi bacaan, acara, atau pemesanan. Untuk jawaban personal lebih lanjut, hubungi tim melalui WhatsApp.';
            history.appendChild(reply); history.scrollTop = history.scrollHeight; input.value = '';
        };
        window.setLanguage = function(language) {
            const id = $('lang-id'), en = $('lang-en');
            if (id) id.classList.toggle('bg-mint-200', language === 'id');
            if (en) en.classList.toggle('bg-mint-200', language === 'en');
            // The current page copy is Indonesian; this switch preserves its controls without breaking the page.
        };
        window.toggleMobileMenu = function() { const menu = $('mobile-menu'); if (menu) menu.classList.toggle('hidden'); };
        window.playAudioSnippet = function() {
            const audio = $('hero-audio'); if (!audio) return;
            if (audio.paused) { audio.play().catch(() => {}); if ($('audio-icon')) $('audio-icon').className = 'fa-solid fa-pause text-xs'; }
            else { audio.pause(); if ($('audio-icon')) $('audio-icon').className = 'fa-solid fa-play text-xs'; }
        };
        window.selectQuizVibe = function(vibe) {
            const result = $('quiz-result'); if (!result) return;
            const data = {
                philosophical: ['Solitude & Modern Solace', 'Kumpulan esai untuk suasana reflektif dan filosofis.', 'solitude'],
                mystery: ['Whispers of the Emerald Canopy', 'Misteri hutan purba dan bahasa alam yang tersembunyi.', 'whispers'],
                poetic: ['Whispers of the Emerald Canopy', 'Narasi puitis dengan metafora alam dan jiwa.', 'whispers'],
                growth: ['Solitude & Modern Solace', 'Renungan tentang kesendirian, jeda, dan pertumbuhan diri.', 'solitude']
            }[vibe] || ['Whispers of the Emerald Canopy', 'Pilihan bacaan untukmu.', 'whispers'];
            if ($('quiz-book-title')) $('quiz-book-title').textContent = data[0];
            if ($('quiz-book-desc')) $('quiz-book-desc').textContent = data[1];
            const buy = $('quiz-btn-buy'); if (buy) buy.onclick = () => window.orderBook(data[0]);
            const preview = $('quiz-btn-preview'); if (preview) preview.onclick = () => window.openReaderModal(data[2]);
            result.classList.remove('hidden');
        };
        window.switchBioTab = function(tab) {
            document.querySelectorAll('.bio-tab-content').forEach(el => el.classList.add('hidden'));
            const content = $('bio-content-' + tab); if (content) content.classList.remove('hidden');
            document.querySelectorAll('.bio-tab-btn').forEach(el => { el.classList.remove('border-mint-800','text-mint-900','font-bold'); el.classList.add('border-transparent','text-slate-500'); });
            const active = $('tab-' + tab); if (active) { active.classList.add('border-mint-800','text-mint-900','font-bold'); active.classList.remove('border-transparent','text-slate-500'); }
        };
        window.openRSVPModal = function(eventName) {
            const msg = `Halo Tim Aria Thorne, saya ingin reservasi untuk ${eventName}. Mohon konfirmasi ketersediaan kursi, biaya, dan detail acara.`;
            window.open(`https://wa.me/628123456789?text=${encodeURIComponent(msg)}`, '_blank', 'noopener');
        };
        window.toggleFAQ = function(button) { const answer = button?.nextElementSibling; if (answer) answer.classList.toggle('hidden'); };
        window.openPurchaseModal = (title) => window.orderBook(title || books.whispers.title);
        document.addEventListener('keydown', (event) => { if (event.key === 'Escape') { hide('book-modal'); hide('reader-modal'); $('article-modal')?.remove(); } });
    })();
    </script>
    <script src="{{ asset('js/personal-brand/author-writer/aria-thorne/aria-thorne.js') }}" defer></script>
</body>
</html>
