<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>VOLTCOURT RACQUET ACADEMY | Padel, Badminton, Tennis & Table Tennis</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Chakra+Petch:ital,wght@0,600;0,700;1,700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            indigoDeep: '#343A8F',
            violetPop: '#7468E8',
            coralNeon: '#FF6B8A',
            voltLime: '#D8F05B',
            creamCanvas: '#FFF7F0',
            darkArena: '#151842',
          },
          fontFamily: {
            sport: ['Chakra Petch', 'sans-serif'],
            sans: ['Plus Jakarta Sans', 'sans-serif'],
          },
        },
      },
    };
  </script>
  
  <link rel="stylesheet" href="{{ asset('css/website-bisnis/templates/sport-others/racquet-sports/voltcourt/voltcourt.css') }}?v=2">
</head>
<body class="antialiased selection:bg-voltLime selection:text-indigoDeep" data-whatsapp-number="6281234567890">

  <!-- ==================== STICKY FLOATING TOPBAR NAVIGATION ==================== -->
  <header class="sticky top-0 z-40 bg-indigoDeep/95 backdrop-blur-md border-b-2 border-voltLime/70 text-white shadow-2xl">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between h-20">
        <!-- Brand Emblem -->
        <a href="#hero-arena" onclick="switchPage('all')" class="flex items-center gap-3 group">
          <div class="relative w-12 h-12 rounded-2xl bg-gradient-to-br from-voltLime to-[#bce028] text-indigoDeep flex items-center justify-center shadow-lg group-hover:rotate-12 transition-transform">
            <svg class="w-7 h-7" viewBox="0 0 40 40" fill="none">
              <ellipse cx="16" cy="15" rx="8" ry="10" transform="rotate(-30 16 15)" stroke="#343A8F" stroke-width="2.8"/>
              <path d="M21 22L31 34" stroke="#343A8F" stroke-width="3.2" stroke-linecap="round"/>
              <circle cx="29" cy="11" r="4.8" fill="#FF6B8A"/>
              <path d="M13 15H19M16 11V19" stroke="#7468E8" stroke-width="1.8"/>
            </svg>
          </div>
          <div>
            <span class="font-sport font-bold text-xl sm:text-2xl tracking-wider text-voltLime block leading-none">
              VOLTCOURT
            </span>
            <span class="text-[10px] font-extrabold uppercase tracking-[0.22em] text-creamCanvas/85 mt-1 block">
              4-Racquet Sports Hub
            </span>
          </div>
        </a>

        <!-- Multipage Switcher Pills (Desktop) -->
        <nav class="hidden xl:flex items-center gap-1 bg-darkArena/75 p-1.5 rounded-full border border-violetPop/50 shadow-inner">
          <button onclick="switchPage('all')" data-nav="all" class="nav-tab px-4 py-2 rounded-full text-xs font-extrabold transition-all bg-voltLime text-indigoDeep shadow">
            <span data-i18n="nav_all">Semua Halaman</span>
          </button>
          <button onclick="switchPage('sports')" data-nav="sports" class="nav-tab px-4 py-2 rounded-full text-xs font-bold text-white/85 hover:text-voltLime transition-all">
            <span data-i18n="nav_sports">4 Cabang & Arena Visual</span>
          </button>
          <button onclick="switchPage('schedule')" data-nav="schedule" class="nav-tab px-4 py-2 rounded-full text-xs font-bold text-white/85 hover:text-voltLime transition-all">
            <span data-i18n="nav_sched">Jadwal & Court</span>
          </button>
          <button onclick="switchPage('coaches')" data-nav="coaches" class="nav-tab px-4 py-2 rounded-full text-xs font-bold text-white/85 hover:text-voltLime transition-all">
            <span data-i18n="nav_coach">Pelatih & Paket</span>
          </button>
          <button onclick="switchPage('booking')" data-nav="booking" class="nav-tab px-4 py-2 rounded-full text-xs font-bold text-white/85 hover:text-voltLime transition-all">
            <span data-i18n="nav_book">Booking & Turnamen</span>
          </button>
        </nav>

        <!-- Right Controls: ID/EN + Trial CTA -->
        <div class="hidden sm:flex items-center gap-3">
          <div class="flex items-center bg-darkArena/85 rounded-full p-1 border border-violetPop/50 text-xs font-extrabold">
            <button onclick="setLanguage('id')" id="lang-id" class="px-2.5 py-1 rounded-full bg-voltLime text-indigoDeep transition-all">ID</button>
            <button onclick="setLanguage('en')" id="lang-en" class="px-2.5 py-1 rounded-full text-white/80 hover:text-white transition-all">EN</button>
          </div>

          <a href="#booking-wizard-section" onclick="preselectTrial()" class="px-5 py-2.5 rounded-full text-xs font-extrabold uppercase tracking-wider bg-coralNeon hover:brightness-110 text-white shadow-lg shadow-coralNeon/40 hover:scale-105 transition-all">
            ⚡ <span data-i18n="cta_trial">Book a Trial</span>
          </a>
        </div>

        <!-- Mobile Menu Button -->
        <button onclick="toggleMobileMenu()" class="xl:hidden p-2.5 rounded-xl bg-darkArena border border-voltLime/50 text-voltLime">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M4 6h16M4 12h16M4 18h16"/>
          </svg>
        </button>
      </div>
    </div>

    <!-- Mobile Navigation Drawer -->
    <div id="mobile-menu" class="hidden xl:hidden bg-darkArena border-b border-voltLime/40 px-4 pt-3 pb-5 space-y-2">
      <div class="flex items-center justify-between pb-2 border-b border-white/15">
        <span class="text-xs font-bold text-voltLime">Navigasi Multipage</span>
        <div class="flex gap-1 bg-indigoDeep p-1 rounded-full text-xs font-bold">
          <button onclick="setLanguage('id')" class="px-2.5 py-0.5 rounded-full bg-voltLime text-indigoDeep">ID</button>
          <button onclick="setLanguage('en')" class="px-2.5 py-0.5 rounded-full text-white">EN</button>
        </div>
      </div>
      <button onclick="switchPage('all'); toggleMobileMenu()" class="block w-full text-left px-4 py-2.5 rounded-xl font-bold bg-indigoDeep text-voltLime">Semua Halaman (Overview)</button>
      <button onclick="switchPage('sports'); toggleMobileMenu()" class="block w-full text-left px-4 py-2.5 rounded-xl font-semibold text-white hover:bg-indigoDeep/60">4 Cabang: Padel, Badminton, Tennis, Table Tennis</button>
      <button onclick="switchPage('schedule'); toggleMobileMenu()" class="block w-full text-left px-4 py-2.5 rounded-xl font-semibold text-white hover:bg-indigoDeep/60">Jadwal Latihan, Court & Reservasi Lapangan</button>
      <button onclick="switchPage('coaches'); toggleMobileMenu()" class="block w-full text-left px-4 py-2.5 rounded-xl font-semibold text-white hover:bg-indigoDeep/60">Pelatih Bersertifikat & Paket Membership</button>
      <button onclick="switchPage('booking'); toggleMobileMenu()" class="block w-full text-left px-4 py-2.5 rounded-xl font-semibold text-white hover:bg-indigoDeep/60">Booking 7 Langkah & Turnamen</button>
      <a href="#booking-wizard-section" onclick="preselectTrial(); toggleMobileMenu()" class="block text-center py-3 rounded-xl bg-coralNeon text-white font-extrabold text-xs uppercase">⚡ Book a Trial Sekarang</a>
    </div>
  </header>

  <!-- ==================== HERO SECTION: AVANT-GARDE STADIUM ORBIT & 4-SPORT ACTION ==================== -->
  <section id="hero-arena" data-section="hero" class="relative overflow-hidden bg-gradient-to-br from-indigoDeep via-[#2C338A] to-darkArena text-white pt-10 pb-24 sm:pt-14 sm:pb-28">
    <!-- Rotating Stadium Radar & Animated Trajectory Lines -->
    <div class="absolute -top-32 -right-32 w-[560px] h-[560px] opacity-20 pointer-events-none anim-radar">
      <svg viewBox="0 0 400 400" fill="none" class="w-full h-full">
        <circle cx="200" cy="200" r="185" stroke="#D8F05B" stroke-width="2" stroke-dasharray="14 10"/>
        <circle cx="200" cy="200" r="135" stroke="#FF6B8A" stroke-width="2.5"/>
        <circle cx="200" cy="200" r="85" stroke="#7468E8" stroke-width="2" stroke-dasharray="8 8"/>
        <line x1="200" y1="10" x2="200" y2="390" stroke="#D8F05B" stroke-width="1.5"/>
        <line x1="10" y1="200" x2="390" y2="200" stroke="#D8F05B" stroke-width="1.5"/>
      </svg>
    </div>

    <!-- Animated Court Parabolic Trajectory SVG -->
    <svg class="absolute inset-0 w-full h-full opacity-25 pointer-events-none" viewBox="0 0 1440 760" fill="none" preserveAspectRatio="none">
      <path d="M-40 580 Q 420 120 960 440 T 1500 220" stroke="#D8F05B" stroke-width="3.5" class="anim-dash"/>
      <path d="M120 720 Q 680 240 1320 620" stroke="#FF6B8A" stroke-width="2.5" class="anim-dash"/>
    </svg>

    <!-- Floating Animated Sports Equipment Across Hero -->
    <!-- 1. Floating Padel Racket -->
    <div class="hidden md:block absolute top-12 left-8 pointer-events-none anim-orbit">
      <svg class="w-24 h-24 drop-shadow-2xl" viewBox="0 0 100 100" fill="none">
        <rect x="24" y="10" width="44" height="54" rx="22" transform="rotate(-25 24 10)" fill="#FF6B8A" stroke="#D8F05B" stroke-width="3.5"/>
        <circle cx="38" cy="32" r="2.5" fill="#151842"/><circle cx="48" cy="28" r="2.5" fill="#151842"/>
        <circle cx="43" cy="41" r="2.5" fill="#151842"/><circle cx="53" cy="37" r="2.5" fill="#151842"/>
        <path d="M54 58L74 88" stroke="#D8F05B" stroke-width="9" stroke-linecap="round"/>
      </svg>
    </div>

    <!-- 2. Flying Shuttlecock -->
    <div class="hidden sm:block absolute top-16 right-[46%] pointer-events-none anim-shuttle-flight">
      <svg class="w-16 h-16 drop-shadow-2xl" viewBox="0 0 64 64" fill="none">
        <path d="M20 14L44 22L36 44L14 36L20 14Z" fill="#FFF7F0" stroke="#7468E8" stroke-width="2.2"/>
        <path d="M26 16L39 40M34 19L22 39" stroke="#7468E8" stroke-width="1.6"/>
        <circle cx="16" cy="42" r="7.5" fill="#D8F05B" stroke="#151842" stroke-width="2"/>
      </svg>
    </div>

    <!-- 3. Bouncing Tennis Ball with Motion Trail -->
    <div class="hidden lg:block absolute bottom-16 left-[43%] pointer-events-none anim-tennis-rally">
      <svg class="w-16 h-16 drop-shadow-2xl" viewBox="0 0 60 60" fill="none">
        <circle cx="30" cy="30" r="22" fill="#D8F05B" stroke="#151842" stroke-width="2.5"/>
        <path d="M14 16C24 24 24 36 14 44M46 16C36 24 36 36 46 44" stroke="#FFF7F0" stroke-width="3" stroke-linecap="round"/>
      </svg>
    </div>

    <!-- 4. Floating Table Tennis Paddle -->
    <div class="hidden md:block absolute bottom-10 right-8 pointer-events-none anim-orbit-rev">
      <svg class="w-24 h-24 drop-shadow-2xl" viewBox="0 0 100 100" fill="none">
        <circle cx="46" cy="40" r="26" fill="#7468E8" stroke="#D8F05B" stroke-width="3.5"/>
        <path d="M62 60L82 84" stroke="#FF6B8A" stroke-width="9" stroke-linecap="round"/>
        <circle cx="22" cy="70" r="8.5" fill="#FFF7F0" stroke="#FF6B8A" stroke-width="2.5"/>
      </svg>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
        <!-- Left 6 Cols: Energetic Editorial Typography -->
        <div class="lg:col-span-6 space-y-6">
          <div class="inline-flex items-center gap-2.5 px-4 py-2 rounded-full bg-violetPop/35 border-2 border-voltLime/80 backdrop-blur-md shadow-lg">
            <span class="w-2.5 h-2.5 rounded-full bg-voltLime animate-ping"></span>
            <span class="text-xs font-extrabold uppercase tracking-widest text-voltLime" data-i18n="hero_badge">
              Multi-Court Kinetic Racquet Academy
            </span>
          </div>

          <h1 class="font-sport text-4xl sm:text-5xl lg:text-[3.6rem] font-bold uppercase leading-[1.04] tracking-tight">
            <span data-i18n="hero_h1_a">Unleash Your</span>
            <span class="block text-voltLime mt-1 italic">Court Velocity:</span>
            <span class="block text-coralNeon text-3xl sm:text-4xl lg:text-[2.6rem] mt-1">
              Padel • Badminton • Tennis • Pingpong
            </span>
          </h1>

          <p class="text-sm sm:text-base text-creamCanvas/90 leading-relaxed max-w-xl" data-i18n="hero_desc">
            Akademi olahraga raket modern berenergi tinggi untuk <strong>Kids, Teens, Adults hingga Seniors</strong>. Kuasai teknik, kelincahan footwork, dan strategi bertanding bersama pelatih bersertifikat BWF, ITF, FIP & ITTF.
          </p>

          <!-- Interactive Sport Pill Switchers -->
          <div class="flex flex-wrap gap-2">
            <button onclick="selectSportAndScroll('padel')" class="px-4 py-2 rounded-full bg-voltLime text-indigoDeep font-extrabold text-xs hover:scale-105 transition-transform shadow">
              🎾 Padel Academy
            </button>
            <button onclick="selectSportAndScroll('badminton')" class="px-4 py-2 rounded-full bg-coralNeon text-white font-extrabold text-xs hover:scale-105 transition-transform shadow">
              🏸 Badminton Coaching
            </button>
            <button onclick="selectSportAndScroll('tennis')" class="px-4 py-2 rounded-full bg-violetPop text-white font-extrabold text-xs hover:scale-105 transition-transform shadow">
              🎾 Tennis Lessons
            </button>
            <button onclick="selectSportAndScroll('tabletennis')" class="px-4 py-2 rounded-full bg-white/15 hover:bg-voltLime hover:text-indigoDeep border border-white/30 text-white font-extrabold text-xs transition-all">
              🏓 Table Tennis
            </button>
          </div>

          <!-- Primary Hero CTAs -->
          <div class="flex flex-wrap items-center gap-4 pt-2">
            <a href="#booking-wizard-section" onclick="preselectJoin()" class="px-8 py-4 rounded-full bg-voltLime hover:brightness-105 text-indigoDeep font-sport font-bold text-sm uppercase tracking-wider shadow-xl shadow-voltLime/30 hover:scale-[1.04] transition-all flex items-center gap-2">
              <span data-i18n="cta_join">Join Academy</span>
              <span>→</span>
            </a>
            <a href="#booking-wizard-section" onclick="preselectTrial()" class="px-8 py-4 rounded-full bg-coralNeon hover:brightness-110 text-white font-sport font-bold text-sm uppercase tracking-wider shadow-xl shadow-coralNeon/35 hover:scale-[1.04] transition-all flex items-center gap-2">
              <span>⚡</span>
              <span data-i18n="cta_trial_hero">Book a Trial</span>
            </a>
          </div>

          <!-- Quick Floating Metrics Strip -->
          <div class="flex flex-wrap items-center gap-6 pt-4 border-t border-white/20 text-xs">
            <div class="flex items-center gap-2.5">
              <span class="w-10 h-10 rounded-2xl bg-voltLime/20 border border-voltLime flex items-center justify-center font-sport font-bold text-voltLime text-base">16</span>
              <div><strong class="block text-white">Pro Courts</strong><span class="text-creamCanvas/70">Indoor & Glass Arena</span></div>
            </div>
            <div class="flex items-center gap-2.5">
              <span class="w-10 h-10 rounded-2xl bg-coralNeon/20 border border-coralNeon flex items-center justify-center font-sport font-bold text-coralNeon text-base">24</span>
              <div><strong class="block text-white">Certified Coaches</strong><span class="text-creamCanvas/70">BWF • ITF • FIP • ITTF</span></div>
            </div>
            <div class="flex items-center gap-2.5">
              <span class="w-10 h-10 rounded-2xl bg-violetPop/30 border border-violetPop flex items-center justify-center font-sport font-bold text-white text-base">4</span>
              <div><strong class="block text-white">Skill Levels</strong><span class="text-creamCanvas/70">Beginner to Pro</span></div>
            </div>
          </div>
        </div>

        <!-- Right 6 Cols: Organic Overlapping Stadium Collage (Anti-Rigid Grid) -->
        <div class="lg:col-span-6 relative">
          <div class="relative mx-auto max-w-lg sm:max-w-xl h-[470px] sm:h-[520px]">
            <!-- 1. Main Center-Left Capsule: Padel -->
            <div onclick="selectSportAndScroll('padel')" class="group absolute top-0 left-0 w-[56%] h-[56%] stadium-capsule overflow-hidden border-4 border-voltLime shadow-2xl cursor-pointer z-20">
              <img
                src="https://images.unsplash.com/photo-1554068865-24cecd4e34b8?auto=format&fit=crop&w=800&q=85"
                onerror="this.src='https://placehold.co/600x500/343A8F/D8F05B?text=Padel+Action'"
                alt="Atlet bermain Padel di lapangan kaca"
                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
              />
              <div class="absolute inset-0 bg-gradient-to-t from-darkArena/90 via-transparent to-transparent"></div>
              <span class="absolute top-3 left-3 px-3 py-1 rounded-full bg-voltLime text-indigoDeep font-sport font-bold text-[11px]">01 • PADEL</span>
              <p class="absolute bottom-3 left-4 font-sport font-bold text-sm sm:text-base text-white">Glass-Wall Tactics</p>
            </div>

            <!-- 2. Top-Right Arch Capsule: Badminton -->
            <div onclick="selectSportAndScroll('badminton')" class="group absolute top-4 right-0 w-[50%] h-[50%] stadium-arch-card overflow-hidden border-4 border-coralNeon shadow-2xl cursor-pointer z-10 anim-orbit">
              <img
                src="https://images.unsplash.com/photo-1626224583764-f87db24ac4ea?auto=format&fit=crop&w=800&q=85"
                onerror="this.src='https://placehold.co/600x500/7468E8/FFF7F0?text=Badminton+Smash'"
                alt="Atlet Badminton melakukan jump smash"
                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
              />
              <div class="absolute inset-0 bg-gradient-to-t from-darkArena/90 via-transparent to-transparent"></div>
              <span class="absolute top-3 right-3 px-3 py-1 rounded-full bg-coralNeon text-white font-sport font-bold text-[11px]">02 • BADMINTON</span>
              <p class="absolute bottom-3 left-4 font-sport font-bold text-sm text-white">Agility & Smash</p>
            </div>

            <!-- 3. Bottom-Left Arch Capsule: Tennis -->
            <div onclick="selectSportAndScroll('tennis')" class="group absolute bottom-2 left-3 w-[48%] h-[46%] stadium-arch-card overflow-hidden border-4 border-violetPop shadow-2xl cursor-pointer z-10 anim-orbit-rev">
              <img
                src="https://images.unsplash.com/photo-1595435934249-5df7ed86e1c0?auto=format&fit=crop&w=800&q=85"
                onerror="this.src='https://placehold.co/600x500/343A8F/FF6B8A?text=Tennis+Pro'"
                alt="Pemain Tennis melakukan forehand"
                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
              />
              <div class="absolute inset-0 bg-gradient-to-t from-darkArena/90 via-transparent to-transparent"></div>
              <span class="absolute top-3 left-3 px-3 py-1 rounded-full bg-violetPop text-white font-sport font-bold text-[11px]">03 • TENNIS</span>
              <p class="absolute bottom-3 left-4 font-sport font-bold text-sm text-white">Baseline & Serve</p>
            </div>

            <!-- 4. Bottom-Right Capsule: Table Tennis -->
            <div onclick="selectSportAndScroll('tabletennis')" class="group absolute bottom-0 right-2 w-[54%] h-[52%] stadium-capsule overflow-hidden border-4 border-white shadow-2xl cursor-pointer z-20">
              <img
                src="https://images.unsplash.com/photo-1534158914592-062992fbe900?auto=format&fit=crop&w=800&q=85"
                onerror="this.src='https://placehold.co/600x500/FF6B8A/FFF7F0?text=Table+Tennis'"
                alt="Atlet Table Tennis melatih spin"
                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
              />
              <div class="absolute inset-0 bg-gradient-to-t from-darkArena/90 via-transparent to-transparent"></div>
              <span class="absolute top-3 right-3 px-3 py-1 rounded-full bg-voltLime text-indigoDeep font-sport font-bold text-[11px]">04 • TABLE TENNIS</span>
              <p class="absolute bottom-3 left-4 font-sport font-bold text-sm sm:text-base text-white">Spin & Reflex Arena</p>
            </div>

            <!-- Center Floating Badge -->
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-30 bg-darkArena/95 text-voltLime px-4 py-2.5 rounded-full border-2 border-voltLime shadow-2xl font-sport font-bold text-xs uppercase tracking-wider whitespace-nowrap">
              ⚡ 4 Arenas • 1 Membership
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ==================== DUAL KINETIC SPORT MARQUEE TICKER ==================== -->
  <div class="bg-voltLime border-y-2 border-indigoDeep py-3 overflow-hidden text-indigoDeep">
    <div class="anim-marquee flex items-center gap-8 font-sport font-bold text-xs sm:text-sm uppercase tracking-widest">
      <span>🎾 PADEL DOUBLES & RACKET RENTAL</span>
      <span>🏸 BADMINTON 6-CORNER FOOTWORK & SPARRING</span>
      <span>🎾 TENNIS TOPSPIN & SERVE CLINIC</span>
      <span>🏓 TABLE TENNIS MULTI-BALL SPIN & SIMULATION</span>
      <span>🏆 KIDS, TEENS, ADULT & SENIOR CLASSES</span>
      <span>📊 LIVE PROGRESS & VIDEO ANALYSIS</span>
      <span>🎾 PADEL DOUBLES & RACKET RENTAL</span>
      <span>🏸 BADMINTON 6-CORNER FOOTWORK & SPARRING</span>
      <span>🎾 TENNIS TOPSPIN & SERVE CLINIC</span>
      <span>🏓 TABLE TENNIS MULTI-BALL SPIN & SIMULATION</span>
      <span>🏆 KIDS, TEENS, ADULT & SENIOR CLASSES</span>
      <span>📊 LIVE PROGRESS & VIDEO ANALYSIS</span>
    </div>
  </div>

  <!-- ==================== VISUAL SHOWCASE OF ALL 4 SPORTS + INTERACTIVE COURT BLUEPRINT ==================== -->
  <section id="sports-categories-section" data-section="sports" class="py-20 arena-mesh relative overflow-hidden">
    <!-- Moving Animated Ball Accent in Section Background -->
    <div class="hidden xl:block absolute top-14 left-10 pointer-events-none anim-pingpong-spin opacity-60">
      <div class="w-8 h-8 rounded-full bg-coralNeon border-2 border-indigoDeep shadow-lg"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center max-w-3xl mx-auto mb-12 reveal">
        <span class="inline-block px-4 py-1.5 rounded-full bg-violetPop/15 border border-violetPop/40 text-indigoDeep font-extrabold text-xs uppercase tracking-widest mb-3">
          Visual Arena & Kurikulum 4 Bidang
        </span>
        <h2 class="font-sport text-3xl sm:text-5xl font-bold text-indigoDeep uppercase">
          Eksplorasi Visual <span class="text-violetPop">Setiap Cabang Olahraga</span>
        </h2>
        <p class="mt-3 text-darkArena/80 text-sm sm:text-base">
          Setiap bidang olahraga memiliki lapangan standar turnamen, simulasi taktik visual interaktif, peralatan khusus, serta kurikulum dari pemula hingga profesional.
        </p>
      </div>

      <!-- 4 Visual Sport Showcase Strip (Click any to inspect deep tactical court diagram) -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-10 reveal">
        <!-- 1. Padel Visual Card -->
        <div onclick="selectSportTab('padel')" data-sport-card="padel" class="sport-visual-card lively-card cursor-pointer rounded-[2rem] overflow-hidden bg-indigoDeep text-white border-4 border-voltLime shadow-xl">
          <div class="relative h-44 overflow-hidden">
            <img src="https://images.unsplash.com/photo-1554068865-24cecd4e34b8?auto=format&fit=crop&w=700&q=85" alt="Padel Academy" class="w-full h-full object-cover" />
            <div class="absolute inset-0 bg-gradient-to-t from-indigoDeep via-indigoDeep/30 to-transparent"></div>
            <span class="absolute top-3 left-3 px-3 py-1 rounded-full bg-voltLime text-indigoDeep font-sport font-bold text-[11px]">🎾 PADEL</span>
          </div>
          <div class="p-5">
            <h3 class="font-sport font-bold text-lg text-voltLime uppercase">Padel Academy & Training</h3>
            <p class="text-xs text-creamCanvas/85 mt-1">Glass-wall tactics, bandeja, doubles strategy & racket rental.</p>
          </div>
        </div>

        <!-- 2. Badminton Visual Card -->
        <div onclick="selectSportTab('badminton')" data-sport-card="badminton" class="sport-visual-card lively-card cursor-pointer rounded-[2rem] overflow-hidden bg-white text-indigoDeep border-2 border-violetPop/30 shadow-lg">
          <div class="relative h-44 overflow-hidden">
            <img src="https://images.unsplash.com/photo-1626224583764-f87db24ac4ea?auto=format&fit=crop&w=700&q=85" alt="Badminton Coaching" class="w-full h-full object-cover" />
            <div class="absolute inset-0 bg-gradient-to-t from-darkArena/80 via-transparent to-transparent"></div>
            <span class="absolute top-3 left-3 px-3 py-1 rounded-full bg-coralNeon text-white font-sport font-bold text-[11px]">🏸 BADMINTON</span>
          </div>
          <div class="p-5">
            <h3 class="font-sport font-bold text-lg uppercase">Badminton Coaching</h3>
            <p class="text-xs text-darkArena/75 mt-1">6-corner agility footwork, jump smash, junior dev & sparring.</p>
          </div>
        </div>

        <!-- 3. Tennis Visual Card -->
        <div onclick="selectSportTab('tennis')" data-sport-card="tennis" class="sport-visual-card lively-card cursor-pointer rounded-[2rem] overflow-hidden bg-white text-indigoDeep border-2 border-violetPop/30 shadow-lg">
          <div class="relative h-44 overflow-hidden">
            <img src="https://images.unsplash.com/photo-1595435934249-5df7ed86e1c0?auto=format&fit=crop&w=700&q=85" alt="Tennis Lessons" class="w-full h-full object-cover" />
            <div class="absolute inset-0 bg-gradient-to-t from-darkArena/80 via-transparent to-transparent"></div>
            <span class="absolute top-3 left-3 px-3 py-1 rounded-full bg-violetPop text-white font-sport font-bold text-[11px]">🎾 TENNIS</span>
          </div>
          <div class="p-5">
            <h3 class="font-sport font-bold text-lg uppercase">Tennis Academy & Lessons</h3>
            <p class="text-xs text-darkArena/75 mt-1">Topspin forehand, kick serve, match play & junior tennis.</p>
          </div>
        </div>

        <!-- 4. Table Tennis Visual Card -->
        <div onclick="selectSportTab('tabletennis')" data-sport-card="tabletennis" class="sport-visual-card lively-card cursor-pointer rounded-[2rem] overflow-hidden bg-white text-indigoDeep border-2 border-violetPop/30 shadow-lg">
          <div class="relative h-44 overflow-hidden">
            <img src="https://images.unsplash.com/photo-1534158914592-062992fbe900?auto=format&fit=crop&w=700&q=85" alt="Table Tennis Center" class="w-full h-full object-cover" />
            <div class="absolute inset-0 bg-gradient-to-t from-darkArena/80 via-transparent to-transparent"></div>
            <span class="absolute top-3 left-3 px-3 py-1 rounded-full bg-voltLime text-indigoDeep font-sport font-bold text-[11px]">🏓 TABLE TENNIS</span>
          </div>
          <div class="p-5">
            <h3 class="font-sport font-bold text-lg uppercase">Table Tennis Center</h3>
            <p class="text-xs text-darkArena/75 mt-1">Grip & stance, spin ball control, footwork & match simulation.</p>
          </div>
        </div>
      </div>

      <!-- Interactive Tactical Court Diagram + Curriculum Detail Panel -->
      <div id="sport-detail-panel" class="bg-white rounded-[2.5rem] p-6 sm:p-10 border-2 border-indigoDeep/20 shadow-2xl reveal">
        <div class="volt-init-fallback">Memuat detail cabang olahraga dan simulasi court…</div>
      </div>

      <!-- 4 Levels & Age Groups Capsule Bento -->
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 mt-12 reveal">
        <div class="lg:col-span-7 bg-gradient-to-br from-indigoDeep to-darkArena text-white rounded-[2.4rem] p-7 sm:p-8 shadow-xl relative overflow-hidden">
          <span class="text-xs font-extrabold uppercase tracking-widest text-voltLime">4 Jenjang Kurikulum</span>
          <h3 class="font-sport text-2xl sm:text-3xl font-bold uppercase mt-1 mb-5">Beginner • Intermediate • Advanced • Pro</h3>
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-3.5">
            <div class="bg-white/10 p-4 rounded-2xl border border-voltLime/50 hover:bg-white/15 transition-colors">
              <span class="px-2.5 py-0.5 rounded-full bg-voltLime text-indigoDeep font-sport font-bold text-xs">01 • BEGINNER</span>
              <p class="text-xs text-creamCanvas/90 mt-2">Pengenalan grip, footwork dasar, kontrol arah pukulan, dan aturan permainan dari nol.</p>
            </div>
            <div class="bg-white/10 p-4 rounded-2xl border border-violetPop/60 hover:bg-white/15 transition-colors">
              <span class="px-2.5 py-0.5 rounded-full bg-violetPop text-white font-sport font-bold text-xs">02 • INTERMEDIATE</span>
              <p class="text-xs text-creamCanvas/90 mt-2">Konsistensi rally panjang, variasi spin/slice, transisi menyerang-bertahan, dan taktik ganda.</p>
            </div>
            <div class="bg-white/10 p-4 rounded-2xl border border-coralNeon/60 hover:bg-white/15 transition-colors">
              <span class="px-2.5 py-0.5 rounded-full bg-coralNeon text-white font-sport font-bold text-xs">03 • ADVANCED</span>
              <p class="text-xs text-creamCanvas/90 mt-2">Kecepatan footwork eksplosif, penempatan bola presisi, analisis video, dan simulasi turnamen.</p>
            </div>
            <div class="bg-white/10 p-4 rounded-2xl border border-white/40 hover:bg-white/15 transition-colors">
              <span class="px-2.5 py-0.5 rounded-full bg-white text-indigoDeep font-sport font-bold text-xs">04 • PROFESSIONAL</span>
              <p class="text-xs text-creamCanvas/90 mt-2">Persiapan atlet kompetisi resmi, periodisasi fisik intensif, dan sparing lawan bertaraf nasional.</p>
            </div>
          </div>
        </div>

        <div class="lg:col-span-5 bg-white rounded-[2.4rem] p-7 sm:p-8 border-2 border-violetPop/35 shadow-xl flex flex-col justify-between">
          <div>
            <span class="text-xs font-extrabold uppercase tracking-widest text-coralNeon">Usia & Format Latihan</span>
            <h3 class="font-sport text-2xl font-bold text-indigoDeep uppercase mt-1 mb-4">Kids, Teens, Adults & Private</h3>
            <div class="space-y-3 text-xs">
              <div class="p-3.5 rounded-2xl bg-creamCanvas border border-violetPop/25 flex items-center justify-between">
                <div>
                  <strong class="text-indigoDeep block text-sm">Kids & Teens Academy (5 – 17 Thn)</strong>
                  <span class="text-darkArena/75">Koordinasi motorik, kelincahan & pembibitan atlet muda.</span>
                </div>
                <span class="px-3 py-1 rounded-full bg-voltLime text-indigoDeep font-extrabold">Junior</span>
              </div>
              <div class="p-3.5 rounded-2xl bg-creamCanvas border border-violetPop/25 flex items-center justify-between">
                <div>
                  <strong class="text-indigoDeep block text-sm">Adult & Senior Active (18 – 65+ Thn)</strong>
                  <span class="text-darkArena/75">Kebugaran kardio, teknik kompetitif & komunitas sparring.</span>
                </div>
                <span class="px-3 py-1 rounded-full bg-violetPop text-white font-extrabold">Adult+</span>
              </div>
              <div class="p-3.5 rounded-2xl bg-creamCanvas border border-violetPop/25 flex items-center justify-between">
                <div>
                  <strong class="text-indigoDeep block text-sm">Private 1-on-1 vs Group (Max 6 Org)</strong>
                  <span class="text-darkArena/75">Fokus koreksi teknik personal atau latihan grup energik.</span>
                </div>
                <span class="px-3 py-1 rounded-full bg-coralNeon text-white font-extrabold">1:1 / Group</span>
              </div>
            </div>
          </div>
          <a href="#booking-wizard-section" class="mt-5 w-full py-3.5 rounded-full bg-indigoDeep hover:bg-violetPop text-voltLime font-sport font-bold text-xs uppercase tracking-wider text-center shadow transition-all">
            Pilih Kelas Sesuai Usia →
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- ==================== INTERACTIVE SKILL ASSESSMENT & ATHLETE PROGRESS TRACKING ==================== -->
  <section id="assessment-progress-section" data-section="sports" class="py-20 bg-white border-y border-indigoDeep/10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-stretch reveal">
        <!-- Left 6 Cols: Skill Assessment -->
        <div class="lg:col-span-6 bg-creamCanvas rounded-[2.4rem] p-7 sm:p-9 border-2 border-indigoDeep/15 shadow-xl flex flex-col justify-between">
          <div>
            <span class="inline-block px-3.5 py-1 rounded-full bg-coralNeon text-white font-extrabold text-xs uppercase tracking-wider mb-3">
              Evaluasi Kemampuan Awal
            </span>
            <h3 class="font-sport text-2xl sm:text-3xl font-bold text-indigoDeep uppercase">
              Interactive Skill Assessment
            </h3>
            <p class="text-xs sm:text-sm text-darkArena/75 mt-1 mb-5">
              Tentukan level kelas paling ideal untuk Anda dalam 15 detik melalui simulasi evaluasi pelatih kami.
            </p>

            <div class="space-y-4 text-xs">
              <div>
                <label class="block font-extrabold text-indigoDeep mb-1.5">1. Pilih Cabang Olahraga</label>
                <select id="assess-sport" class="w-full p-3.5 rounded-2xl bg-white border border-violetPop/40 font-bold text-indigoDeep">
                  <option value="Padel">Padel Academy & Training</option>
                  <option value="Badminton">Badminton Academy & Coaching</option>
                  <option value="Tennis">Tennis Academy & Lessons</option>
                  <option value="Table Tennis">Table Tennis Training Center</option>
                </select>
              </div>
              <div>
                <label class="block font-extrabold text-indigoDeep mb-1.5">2. Pengalaman Bermain Saat Ini</label>
                <select id="assess-exp" class="w-full p-3.5 rounded-2xl bg-white border border-violetPop/40 font-bold text-indigoDeep">
                  <option value="0">Baru pertama kali mencoba / belum paham aturan dasar</option>
                  <option value="1">Sudah bisa rally dasar & servis, ingin perbaiki teknik</option>
                  <option value="2">Rutin sparring / ikut turnamen komunitas, butuh taktik</option>
                  <option value="3">Atlet kompetitif / persiapan turnamen resmi</option>
                </select>
              </div>
              <div>
                <label class="block font-extrabold text-indigoDeep mb-1.5">3. Target Latihan Anda</label>
                <select id="assess-goal" class="w-full p-3.5 rounded-2xl bg-white border border-violetPop/40 font-bold text-indigoDeep">
                  <option value="Fun & Kebugaran">Kebugaran, koordinasi & teknik fundamental</option>
                  <option value="Taktik Ganda & Rally">Strategi pertandingan & konsistensi pukulan</option>
                  <option value="Kompetisi Intensif">Performa maksimal & kejuaraan</option>
                </select>
              </div>
            </div>
          </div>

          <div class="mt-6">
            <button onclick="runSkillAssessment()" class="w-full py-4 rounded-full bg-indigoDeep hover:bg-violetPop text-voltLime font-sport font-bold text-xs uppercase tracking-wider shadow-lg transition-all">
              ⚡ Analisa Level Latihan Saya
            </button>
            <div id="assess-result" class="hidden mt-4 p-4 rounded-2xl bg-white border-2 border-voltLime text-xs space-y-1.5"></div>
          </div>
        </div>

        <!-- Right 6 Cols: Athlete Progress Tracking -->
        <div class="lg:col-span-6 bg-gradient-to-br from-indigoDeep via-[#2B317D] to-darkArena text-white rounded-[2.4rem] p-7 sm:p-9 border-2 border-voltLime/70 shadow-2xl flex flex-col justify-between">
          <div>
            <div class="flex flex-wrap items-center justify-between gap-2 mb-3">
              <span class="px-3.5 py-1 rounded-full bg-voltLime text-indigoDeep font-extrabold text-xs uppercase tracking-wider">
                Digital Athlete Report
              </span>
              <select id="progress-sport-preview" onchange="updateProgressPreview()" class="px-3.5 py-1.5 rounded-full bg-white/15 border border-white/30 text-xs font-bold text-voltLime focus:outline-none">
                <option value="padel" class="text-indigoDeep">Cabang: Padel</option>
                <option value="badminton" class="text-indigoDeep">Cabang: Badminton</option>
                <option value="tennis" class="text-indigoDeep">Cabang: Tennis</option>
                <option value="tabletennis" class="text-indigoDeep">Cabang: Table Tennis</option>
              </select>
            </div>
            <h3 class="font-sport text-2xl sm:text-3xl font-bold uppercase">
              Progress Tracking & <span class="text-voltLime">Skill Metrics</span>
            </h3>
            <p class="text-xs sm:text-sm text-creamCanvas/85 mt-1 mb-6">
              Rapor digital peserta diperbarui setiap 4 minggu oleh pelatih untuk memantau perkembangan teknik, kelincahan, dan akurasi pukulan.
            </p>

            <div id="progress-bars-box" class="space-y-4"><p class="text-xs text-creamCanvas/80">Memuat metrik progres atlet…</p></div>
          </div>

          <div class="mt-6 pt-4 border-t border-white/15 flex flex-wrap items-center justify-between gap-3 text-xs">
            <div class="flex items-center gap-2">
              <span class="px-3 py-1 rounded-full bg-coralNeon text-white font-bold">🏅 Badge Unlocked</span>
              <span class="text-creamCanvas/90 font-semibold" id="progress-badge-label">Glass-Wall Bandeja Master</span>
            </div>
            <span class="text-voltLime font-bold">Evaluasi Bulanan</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ==================== TRAINING SCHEDULE, LIVE CAPACITY & COURT FACILITIES ==================== -->
  <section id="schedule-court-section" data-section="schedule" class="py-20 arena-mesh relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <!-- Schedule & Live Capacity -->
      <div class="flex flex-col md:flex-row md:items-end justify-between mb-8 gap-4 reveal">
        <div>
          <span class="text-xs font-extrabold uppercase tracking-widest text-coralNeon">Live Class Capacity & Kuota</span>
          <h2 class="font-sport text-3xl sm:text-4xl font-bold text-indigoDeep uppercase mt-1">
            Jadwal Latihan & <span class="text-violetPop">Ketersediaan Slot</span>
          </h2>
        </div>

        <div class="flex flex-wrap gap-2">
          <select id="sched-sport-filter" onchange="renderScheduleTable()" class="px-4 py-2.5 rounded-full bg-white border border-indigoDeep/20 text-xs font-bold text-indigoDeep shadow-sm">
            <option value="All">Semua Cabang Olahraga</option>
            <option value="Padel">Padel</option>
            <option value="Badminton">Badminton</option>
            <option value="Tennis">Tennis</option>
            <option value="Table Tennis">Table Tennis</option>
          </select>
          <select id="sched-level-filter" onchange="renderScheduleTable()" class="px-4 py-2.5 rounded-full bg-white border border-indigoDeep/20 text-xs font-bold text-indigoDeep shadow-sm">
            <option value="All">Semua Level</option>
            <option value="Beginner">Beginner</option>
            <option value="Intermediate">Intermediate</option>
            <option value="Advanced">Advanced</option>
            <option value="Kids">Kids Junior</option>
          </select>
        </div>
      </div>

      <div class="bg-white rounded-[2.2rem] border-2 border-indigoDeep/15 shadow-xl overflow-hidden mb-16 reveal">
        <div class="overflow-x-auto">
          <table class="w-full text-left text-xs sm:text-sm">
            <thead class="bg-indigoDeep text-voltLime font-sport uppercase text-xs">
              <tr>
                <th class="p-4">Cabang & Program</th>
                <th class="p-4">Hari & Jam</th>
                <th class="p-4">Pelatih & Court</th>
                <th class="p-4">Kuota & Kapasitas</th>
                <th class="p-4 text-right">Aksi</th>
              </tr>
            </thead>
            <tbody id="schedule-tbody" class="divide-y divide-indigoDeep/10 font-medium"><tr><td colspan="5" class="p-5 text-center text-xs text-indigoDeep/70">Memuat jadwal latihan…</td></tr></tbody>
          </table>
        </div>
      </div>

      <!-- Court & Facilities + Equipment + Court Reservation -->
      <div class="mb-8 reveal">
        <span class="text-xs font-extrabold uppercase tracking-widest text-violetPop">World-Class Venue & Equipment</span>
        <h3 class="font-sport text-3xl sm:text-4xl font-bold text-indigoDeep uppercase mt-1">
          Fasilitas Lapangan, Perlengkapan & <span class="text-coralNeon">Sewa Court</span>
        </h3>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10 reveal">
        <!-- Court 1: Padel -->
        <div class="lively-card bg-white rounded-[2rem] overflow-hidden border-2 border-indigoDeep/15 shadow-lg flex flex-col justify-between">
          <div>
            <div class="relative aspect-[16/10]">
              <img src="https://images.unsplash.com/photo-1554068865-24cecd4e34b8?auto=format&fit=crop&w=700&q=85" alt="Lapangan Padel Panoramic" class="w-full h-full object-cover" />
              <span class="absolute top-3 left-3 px-3 py-1 rounded-full bg-voltLime text-indigoDeep font-sport font-bold text-[11px]">4 Panoramic Courts</span>
            </div>
            <div class="p-5 space-y-2 text-xs">
              <h4 class="font-sport font-bold text-lg text-indigoDeep">Padel Glass Arena</h4>
              <p class="text-darkArena/75">Ukuran standar FIP <strong>20m × 10m</strong>, kaca tempered 12mm, rumput sintetis biru & lampu LED anti-silau.</p>
              <p class="text-indigoDeep font-bold">🎒 Raket karbon & bola padel tersedia untuk sewa/latihan.</p>
            </div>
          </div>
          <div class="px-5 pb-5">
            <button onclick="openCourtReserveModal('Padel Glass Arena (Rp 280.000/jam)')" class="w-full py-2.5 rounded-full bg-indigoDeep hover:bg-violetPop text-voltLime font-bold text-xs transition-all">
              Booking Lapangan Padel
            </button>
          </div>
        </div>

        <!-- Court 2: Badminton -->
        <div class="lively-card bg-white rounded-[2rem] overflow-hidden border-2 border-indigoDeep/15 shadow-lg flex flex-col justify-between">
          <div>
            <div class="relative aspect-[16/10]">
              <img src="https://images.unsplash.com/photo-1626224583764-f87db24ac4ea?auto=format&fit=crop&w=700&q=85" alt="Hall Badminton BWF" class="w-full h-full object-cover" />
              <span class="absolute top-3 left-3 px-3 py-1 rounded-full bg-coralNeon text-white font-sport font-bold text-[11px]">6 BWF Pro Courts</span>
            </div>
            <div class="p-5 space-y-2 text-xs">
              <h4 class="font-sport font-bold text-lg text-indigoDeep">BWF Badminton Hall</h4>
              <p class="text-darkArena/75">Ukuran resmi <strong>13.4m × 6.1m</strong>, karpet vinyl peredam kejut 5mm, plafon 12m bebas angin & lampu side-LED.</p>
              <p class="text-indigoDeep font-bold">🏸 Shuttlecock bulu angsa premium & mesin feeding tersedia.</p>
            </div>
          </div>
          <div class="px-5 pb-5">
            <button onclick="openCourtReserveModal('BWF Badminton Hall (Rp 120.000/jam)')" class="w-full py-2.5 rounded-full bg-indigoDeep hover:bg-violetPop text-voltLime font-bold text-xs transition-all">
              Booking Lapangan Badminton
            </button>
          </div>
        </div>

        <!-- Court 3: Tennis -->
        <div class="lively-card bg-white rounded-[2rem] overflow-hidden border-2 border-indigoDeep/15 shadow-lg flex flex-col justify-between">
          <div>
            <div class="relative aspect-[16/10]">
              <img src="https://images.unsplash.com/photo-1595435934249-5df7ed86e1c0?auto=format&fit=crop&w=700&q=85" alt="Lapangan Tennis Hardcourt" class="w-full h-full object-cover" />
              <span class="absolute top-3 left-3 px-3 py-1 rounded-full bg-violetPop text-white font-sport font-bold text-[11px]">3 Cushion Hardcourts</span>
            </div>
            <div class="p-5 space-y-2 text-xs">
              <h4 class="font-sport font-bold text-lg text-indigoDeep">ITF Tennis Hardcourt</h4>
              <p class="text-darkArena/75">Ukuran standar <strong>23.77m × 10.97m</strong>, permukaan akrilik multi-cushion ramah lutut, indoor & outdoor.</p>
              <p class="text-indigoDeep font-bold">🎾 Bola tekanan turnamen & ball machine otomatis tersedia.</p>
            </div>
          </div>
          <div class="px-5 pb-5">
            <button onclick="openCourtReserveModal('ITF Tennis Hardcourt (Rp 220.000/jam)')" class="w-full py-2.5 rounded-full bg-indigoDeep hover:bg-violetPop text-voltLime font-bold text-xs transition-all">
              Booking Lapangan Tennis
            </button>
          </div>
        </div>

        <!-- Court 4: Table Tennis -->
        <div class="lively-card bg-white rounded-[2rem] overflow-hidden border-2 border-indigoDeep/15 shadow-lg flex flex-col justify-between">
          <div>
            <div class="relative aspect-[16/10]">
              <img src="https://images.unsplash.com/photo-1534158914592-062992fbe900?auto=format&fit=crop&w=700&q=85" alt="Arena Meja Pingpong ITTF" class="w-full h-full object-cover" />
              <span class="absolute top-3 left-3 px-3 py-1 rounded-full bg-voltLime text-indigoDeep font-sport font-bold text-[11px]">8 ITTF Pro Tables</span>
            </div>
            <div class="p-5 space-y-2 text-xs">
              <h4 class="font-sport font-bold text-lg text-indigoDeep">ITTF Table Tennis Arena</h4>
              <p class="text-darkArena/75">Meja standar <strong>2.74m × 1.525m</strong> ketebalan 25mm, ruang ber-AC dengan lantai merah anti-slip & robot spin.</p>
              <p class="text-indigoDeep font-bold">🏓 Bet karbon custom & bola 3-star ABS 40+ disediakan.</p>
            </div>
          </div>
          <div class="px-5 pb-5">
            <button onclick="openCourtReserveModal('ITTF Table Tennis Arena (Rp 85.000/jam)')" class="w-full py-2.5 rounded-full bg-indigoDeep hover:bg-violetPop text-voltLime font-bold text-xs transition-all">
              Booking Meja Pingpong
            </button>
          </div>
        </div>
      </div>

      <!-- Venue Location & Amenities Ribbon -->
      <div class="bg-indigoDeep text-white rounded-full px-6 py-4 flex flex-wrap items-center justify-between gap-4 text-xs shadow-lg reveal">
        <span class="font-sport font-bold text-sm text-voltLime uppercase">📍 VoltCourt Sports Hub, Jl. Senopati Arena No. 88, Jakarta Selatan</span>
        <div class="flex flex-wrap gap-4 font-semibold text-creamCanvas/90">
          <span>🚿 Locker & Hot Shower</span>
          <span>🧃 Athlete Recovery Bar</span>
          <span>🩹 Sports Physio Corner</span>
          <span>🅿️ Parkir Luas & Wi-Fi</span>
        </div>
      </div>
    </div>
  </section>

  <!-- ==================== COACH PROFILES & MEMBERSHIP PACKAGES ==================== -->
  <section id="coaches-packages-section" data-section="coaches" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <!-- Certified Coaches -->
      <div class="text-center max-w-3xl mx-auto mb-12 reveal">
        <span class="inline-block px-4 py-1.5 rounded-full bg-coralNeon/15 text-coralNeon font-extrabold text-xs uppercase tracking-widest mb-3">
          Tim Pelatih Bersertifikat
        </span>
        <h2 class="font-sport text-3xl sm:text-4xl font-bold text-indigoDeep uppercase">
          Belajar Langsung dari <span class="text-violetPop">Master Coaches</span>
        </h2>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-20 reveal">
        <!-- Coach 1 -->
        <div class="lively-card bg-creamCanvas rounded-[2.2rem] p-6 border-2 border-indigoDeep/10 text-center">
          <img src="https://images.unsplash.com/photo-1568602471122-7832951cc4c5?auto=format&fit=crop&w=400&q=85" alt="Coach Mateo Alvarez" class="w-24 h-24 rounded-full object-cover mx-auto border-4 border-voltLime shadow-lg" />
          <span class="inline-block mt-3 px-3 py-0.5 rounded-full bg-indigoDeep text-voltLime font-sport font-bold text-[10px]">PADEL HEAD COACH</span>
          <h4 class="font-sport font-bold text-lg text-indigoDeep mt-1">Coach Mateo Alvarez</h4>
          <p class="text-[11px] font-bold text-coralNeon">FIP Certified Level 2 • 9 Thn Pengalaman</p>
          <p class="text-xs text-darkArena/75 mt-2">Spesialis <em>Bandeja, Vibora, glass-wall rebound</em>, dan strategi pasangan ganda.</p>
        </div>

        <!-- Coach 2 -->
        <div class="lively-card bg-creamCanvas rounded-[2.2rem] p-6 border-2 border-indigoDeep/10 text-center">
          <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=400&q=85" alt="Coach Dimas Pratama" class="w-24 h-24 rounded-full object-cover mx-auto border-4 border-coralNeon shadow-lg" />
          <span class="inline-block mt-3 px-3 py-0.5 rounded-full bg-coralNeon text-white font-sport font-bold text-[10px]">BADMINTON COACH</span>
          <h4 class="font-sport font-bold text-lg text-indigoDeep mt-1">Coach Dimas Pratama</h4>
          <p class="text-[11px] font-bold text-violetPop">BWF Level 2 • Eks Pelatnas & 11 Thn Melatih</p>
          <p class="text-xs text-darkArena/75 mt-2">Spesialis <em>explosive footwork</em>, akurasi jump smash, dan pembinaan atlet junior.</p>
        </div>

        <!-- Coach 3 -->
        <div class="lively-card bg-creamCanvas rounded-[2.2rem] p-6 border-2 border-indigoDeep/10 text-center">
          <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?auto=format&fit=crop&w=400&q=85" alt="Coach Clara Wijaya" class="w-24 h-24 rounded-full object-cover mx-auto border-4 border-violetPop shadow-lg" />
          <span class="inline-block mt-3 px-3 py-0.5 rounded-full bg-violetPop text-white font-sport font-bold text-[10px]">TENNIS DIRECTOR</span>
          <h4 class="font-sport font-bold text-lg text-indigoDeep mt-1">Coach Clara Wijaya</h4>
          <p class="text-[11px] font-bold text-coralNeon">ITF Play & Stay Certified • 10 Thn Melatih</p>
          <p class="text-xs text-darkArena/75 mt-2">Spesialis biomekanika servis modern, <em>topspin forehand</em>, dan mental bertanding.</p>
        </div>

        <!-- Coach 4 -->
        <div class="lively-card bg-creamCanvas rounded-[2.2rem] p-6 border-2 border-indigoDeep/10 text-center">
          <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=400&q=85" alt="Coach Kenji Tanaka" class="w-24 h-24 rounded-full object-cover mx-auto border-4 border-voltLime shadow-lg" />
          <span class="inline-block mt-3 px-3 py-0.5 rounded-full bg-indigoDeep text-voltLime font-sport font-bold text-[10px]">TABLE TENNIS PRO</span>
          <h4 class="font-sport font-bold text-lg text-indigoDeep mt-1">Coach Kenji Tanaka</h4>
          <p class="text-[11px] font-bold text-violetPop">ITTF Level 2 • Juara Nasional & 12 Thn Melatih</p>
          <p class="text-xs text-darkArena/75 mt-2">Spesialis variasi <em>loop topspin</em>, servis pendek mematikan, dan <em>third-ball attack</em>.</p>
        </div>
      </div>

      <!-- Membership Packages -->
      <div class="text-center max-w-3xl mx-auto mb-10 reveal">
        <span class="inline-block px-4 py-1.5 rounded-full bg-voltLime text-indigoDeep font-extrabold text-xs uppercase tracking-widest mb-3">
          Flexible Training Plans
        </span>
        <h3 class="font-sport text-3xl sm:text-4xl font-bold text-indigoDeep uppercase">
          Paket Latihan & <span class="text-coralNeon">Membership</span>
        </h3>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4 reveal">
        <div class="lively-card bg-creamCanvas rounded-[2rem] p-5 border-2 border-indigoDeep/15 flex flex-col justify-between">
          <div>
            <span class="px-3 py-1 rounded-full bg-coralNeon text-white font-bold text-[10px] uppercase">First Timer</span>
            <h4 class="font-sport font-bold text-xl text-indigoDeep mt-2">Trial Class</h4>
            <p class="font-sport text-2xl font-bold text-violetPop my-2">Rp 150.000</p>
            <p class="text-[11px] text-darkArena/75 mb-3">1x Sesi Evaluasi + Raket & Bola disediakan.</p>
          </div>
          <button onclick="pickPackageForWizard('Trial Class (Rp 150.000)')" class="w-full py-2.5 rounded-full bg-indigoDeep text-voltLime font-bold text-xs">Pilih Trial</button>
        </div>

        <div class="lively-card bg-creamCanvas rounded-[2rem] p-5 border-2 border-indigoDeep/15 flex flex-col justify-between">
          <div>
            <span class="px-3 py-1 rounded-full bg-violetPop text-white font-bold text-[10px] uppercase">Pay As You Go</span>
            <h4 class="font-sport font-bold text-xl text-indigoDeep mt-2">Single Session</h4>
            <p class="font-sport text-2xl font-bold text-indigoDeep my-2">Rp 250.000</p>
            <p class="text-[11px] text-darkArena/75 mb-3">1x Sesi Reguler (90 Menit) semua cabang.</p>
          </div>
          <button onclick="pickPackageForWizard('Single Session (Rp 250.000)')" class="w-full py-2.5 rounded-full bg-indigoDeep text-voltLime font-bold text-xs">Pilih Single</button>
        </div>

        <div class="lively-card bg-indigoDeep text-white rounded-[2rem] p-5 border-4 border-voltLime shadow-2xl flex flex-col justify-between lg:-translate-y-2">
          <div>
            <span class="px-3 py-1 rounded-full bg-voltLime text-indigoDeep font-extrabold text-[10px] uppercase">Most Popular ⭐</span>
            <h4 class="font-sport font-bold text-xl mt-2">Monthly Training</h4>
            <p class="font-sport text-2xl font-bold text-voltLime my-2">Rp 1.450.000</p>
            <p class="text-[11px] text-creamCanvas/80 mb-3">8x Pertemuan / Bulan + Digital Progress Report.</p>
          </div>
          <button onclick="pickPackageForWizard('Monthly Training 8x (Rp 1.450.000)')" class="w-full py-2.5 rounded-full bg-voltLime text-indigoDeep font-extrabold text-xs">Pilih Monthly</button>
        </div>

        <div class="lively-card bg-creamCanvas rounded-[2rem] p-5 border-2 border-indigoDeep/15 flex flex-col justify-between">
          <div>
            <span class="px-3 py-1 rounded-full bg-coralNeon text-white font-bold text-[10px] uppercase">Pro Track</span>
            <h4 class="font-sport font-bold text-xl text-indigoDeep mt-2">Intensive Camp</h4>
            <p class="font-sport text-2xl font-bold text-coralNeon my-2">Rp 2.600.000</p>
            <p class="text-[11px] text-darkArena/75 mb-3">16x Sesi / Bulan + Sparring Liga & Video Analisis.</p>
          </div>
          <button onclick="pickPackageForWizard('Intensive Program 16x (Rp 2.600.000)')" class="w-full py-2.5 rounded-full bg-indigoDeep text-voltLime font-bold text-xs">Pilih Intensive</button>
        </div>

        <div class="lively-card bg-creamCanvas rounded-[2rem] p-5 border-2 border-indigoDeep/15 flex flex-col justify-between">
          <div>
            <span class="px-3 py-1 rounded-full bg-indigoDeep text-voltLime font-bold text-[10px] uppercase">1-on-1 Focus</span>
            <h4 class="font-sport font-bold text-xl text-indigoDeep mt-2">Private Coaching</h4>
            <p class="font-sport text-2xl font-bold text-indigoDeep my-2">Rp 550.000</p>
            <p class="text-[11px] text-darkArena/75 mb-3">1x Sesi Privat (60 Menit) jadwal fleksibel + Court.</p>
          </div>
          <button onclick="pickPackageForWizard('Private Coaching 1-on-1 (Rp 550.000)')" class="w-full py-2.5 rounded-full bg-indigoDeep text-voltLime font-bold text-xs">Pilih Private</button>
        </div>
      </div>
    </div>
  </section>

  <!-- ==================== 7-STEP CLASS BOOKING WIZARD & TOURNAMENT EVENTS ==================== -->
  <section id="booking-wizard-section" data-section="booking" class="py-20 bg-gradient-to-b from-creamCanvas via-[#F1E7FF] to-creamCanvas">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start reveal">
        <!-- Left 7 Cols: 7-Step Class Booking Wizard -->
        <div class="lg:col-span-7 bg-white rounded-[2.4rem] shadow-2xl border-2 border-indigoDeep/20 overflow-hidden">
          <div class="bg-indigoDeep text-white p-6">
            <div class="flex items-center justify-between text-xs font-bold mb-2">
              <span id="bk-step-title" class="text-voltLime uppercase tracking-wider">Langkah 1 dari 7: Pilih Cabang Olahraga</span>
              <span id="bk-step-pct">14%</span>
            </div>
            <div class="w-full h-2.5 bg-darkArena rounded-full overflow-hidden">
              <div id="bk-progress-bar" class="h-full bg-gradient-to-r from-voltLime via-coralNeon to-violetPop transition-all duration-500" style="width: 14.28%"></div>
            </div>
            <div class="grid grid-cols-7 gap-1.5 mt-3">
              <button onclick="goToBookingStep(1)" class="bk-dot h-1.5 rounded-full bg-voltLime"></button>
              <button onclick="goToBookingStep(2)" class="bk-dot h-1.5 rounded-full bg-white/25"></button>
              <button onclick="goToBookingStep(3)" class="bk-dot h-1.5 rounded-full bg-white/25"></button>
              <button onclick="goToBookingStep(4)" class="bk-dot h-1.5 rounded-full bg-white/25"></button>
              <button onclick="goToBookingStep(5)" class="bk-dot h-1.5 rounded-full bg-white/25"></button>
              <button onclick="goToBookingStep(6)" class="bk-dot h-1.5 rounded-full bg-white/25"></button>
              <button onclick="goToBookingStep(7)" class="bk-dot h-1.5 rounded-full bg-white/25"></button>
            </div>
          </div>

          <div class="p-6 sm:p-8">
            <!-- STEP 1: Pilih Cabang Olahraga -->
            <div id="bk-step-1" class="bk-step space-y-4">
              <h3 class="font-sport text-xl font-bold text-indigoDeep uppercase">1. Pilih Cabang Olahraga</h3>
              <div class="grid grid-cols-2 gap-3">
                <label class="cursor-pointer">
                  <input type="radio" name="bk_sport" value="Padel" checked onchange="syncBookingCoach(); updateBookingSummary()" class="peer sr-only" />
                  <div class="p-4 rounded-2xl border-2 border-indigoDeep/15 peer-checked:border-indigoDeep peer-checked:bg-voltLime/35 font-bold text-sm">
                    🎾 Padel Academy
                  </div>
                </label>
                <label class="cursor-pointer">
                  <input type="radio" name="bk_sport" value="Badminton" onchange="syncBookingCoach(); updateBookingSummary()" class="peer sr-only" />
                  <div class="p-4 rounded-2xl border-2 border-indigoDeep/15 peer-checked:border-indigoDeep peer-checked:bg-voltLime/35 font-bold text-sm">
                    🏸 Badminton Academy
                  </div>
                </label>
                <label class="cursor-pointer">
                  <input type="radio" name="bk_sport" value="Tennis" onchange="syncBookingCoach(); updateBookingSummary()" class="peer sr-only" />
                  <div class="p-4 rounded-2xl border-2 border-indigoDeep/15 peer-checked:border-indigoDeep peer-checked:bg-voltLime/35 font-bold text-sm">
                    🎾 Tennis Academy
                  </div>
                </label>
                <label class="cursor-pointer">
                  <input type="radio" name="bk_sport" value="Table Tennis" onchange="syncBookingCoach(); updateBookingSummary()" class="peer sr-only" />
                  <div class="p-4 rounded-2xl border-2 border-indigoDeep/15 peer-checked:border-indigoDeep peer-checked:bg-voltLime/35 font-bold text-sm">
                    🏓 Table Tennis Center
                  </div>
                </label>
              </div>
            </div>

            <!-- STEP 2: Pilih Program Latihan -->
            <div id="bk-step-2" class="bk-step hidden space-y-4">
              <h3 class="font-sport text-xl font-bold text-indigoDeep uppercase">2. Pilih Program & Level Latihan</h3>
              <select id="bk_program" onchange="updateBookingSummary()" class="w-full p-3.5 rounded-2xl bg-creamCanvas border border-violetPop/40 text-sm font-bold text-indigoDeep">
                <option value="Beginner Fundamentals">Beginner Fundamentals (Pemula)</option>
                <option value="Intermediate Tactics & Rally">Intermediate Tactics & Rally</option>
                <option value="Advanced Competitive">Advanced Competitive</option>
                <option value="Kids & Junior Development (5-17 Thn)">Kids & Junior Development (5–17 Thn)</option>
                <option value="Adult & Senior Active">Adult & Senior Active</option>
                <option value="Private Coaching 1-on-1">Private Coaching 1-on-1</option>
              </select>
            </div>

            <!-- STEP 3: Pilih Pelatih dan Jadwal -->
            <div id="bk-step-3" class="bk-step hidden space-y-4">
              <h3 class="font-sport text-xl font-bold text-indigoDeep uppercase">3. Pilih Pelatih, Lokasi Court & Jadwal</h3>
              <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-xs">
                <div>
                  <label class="block font-extrabold text-indigoDeep mb-1">Instruktur / Pelatih</label>
                  <select id="bk_coach" onchange="updateBookingSummary()" class="w-full p-3 rounded-xl bg-creamCanvas border border-violetPop/40 font-bold"></select>
                </div>
                <div>
                  <label class="block font-extrabold text-indigoDeep mb-1">Lokasi Lapangan</label>
                  <select id="bk_court" onchange="updateBookingSummary()" class="w-full p-3 rounded-xl bg-creamCanvas border border-violetPop/40 font-bold">
                    <option value="VoltCourt Senopati Main Arena">VoltCourt Senopati Main Arena</option>
                    <option value="VoltCourt BSD Indoor Dome">VoltCourt BSD Indoor Dome</option>
                    <option value="VoltCourt Kelapa Gading Hub">VoltCourt Kelapa Gading Hub</option>
                  </select>
                </div>
                <div>
                  <label class="block font-extrabold text-indigoDeep mb-1">Tanggal Mulai Latihan</label>
                  <input id="bk_date" type="date" onchange="updateBookingSummary()" class="w-full p-3 rounded-xl bg-creamCanvas border border-violetPop/40 font-bold" />
                </div>
                <div>
                  <label class="block font-extrabold text-indigoDeep mb-1">Sesi Waktu</label>
                  <select id="bk_time" onchange="updateBookingSummary()" class="w-full p-3 rounded-xl bg-creamCanvas border border-violetPop/40 font-bold">
                    <option value="Pagi (08:00 - 09:30 WIB)">Pagi (08:00 – 09:30 WIB)</option>
                    <option value="Sore (16:00 - 17:30 WIB)">Sore (16:00 – 17:30 WIB)</option>
                    <option value="Malam (19:00 - 20:30 WIB)">Malam (19:00 – 20:30 WIB)</option>
                  </select>
                </div>
              </div>
            </div>

            <!-- STEP 4: Isi Data Peserta -->
            <div id="bk-step-4" class="bk-step hidden space-y-4">
              <h3 class="font-sport text-xl font-bold text-indigoDeep uppercase">4. Data Lengkap Peserta</h3>
              <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-xs">
                <div>
                  <label class="block font-extrabold text-indigoDeep mb-1">Nama Lengkap Peserta *</label>
                  <input id="bk_name" type="text" placeholder="Contoh: Raka Mahendra" oninput="updateBookingSummary()" class="w-full p-3 rounded-xl bg-creamCanvas border border-violetPop/40 font-semibold" />
                </div>
                <div>
                  <label class="block font-extrabold text-indigoDeep mb-1">Usia / Tanggal Lahir *</label>
                  <input id="bk_age" type="text" placeholder="Contoh: 24 Tahun / 14 Mei 2002" oninput="updateBookingSummary()" class="w-full p-3 rounded-xl bg-creamCanvas border border-violetPop/40 font-semibold" />
                </div>
                <div>
                  <label class="block font-extrabold text-indigoDeep mb-1">Nomor WhatsApp Aktif *</label>
                  <input id="bk_wa" type="tel" placeholder="Contoh: 081234567890" oninput="updateBookingSummary()" class="w-full p-3 rounded-xl bg-creamCanvas border border-violetPop/40 font-semibold" />
                </div>
                <div>
                  <label class="block font-extrabold text-indigoDeep mb-1">Pengalaman Bermain</label>
                  <select id="bk_exp" onchange="updateBookingSummary()" class="w-full p-3 rounded-xl bg-creamCanvas border border-violetPop/40 font-bold">
                    <option value="Pemula (Belum Pernah)">Pemula (Belum Pernah)</option>
                    <option value="Rekreasional (< 1 Tahun)">Rekreasional (&lt; 1 Tahun)</option>
                    <option value="Menengah (1 - 3 Tahun)">Menengah (1 – 3 Tahun)</option>
                    <option value="Kompetitif (> 3 Tahun)">Kompetitif (&gt; 3 Tahun)</option>
                  </select>
                </div>
              </div>
            </div>

            <!-- STEP 5: Pilih Paket -->
            <div id="bk-step-5" class="bk-step hidden space-y-4">
              <h3 class="font-sport text-xl font-bold text-indigoDeep uppercase">5. Pilih Paket Latihan</h3>
              <select id="bk_package" onchange="updateBookingSummary()" class="w-full p-3.5 rounded-2xl bg-creamCanvas border border-violetPop/40 text-sm font-bold text-indigoDeep">
                <option value="Trial Class (Rp 150.000)" data-price="150000">Trial Class — Rp 150.000 (1x Sesi + Raket Gratis)</option>
                <option value="Single Session (Rp 250.000)" data-price="250000">Single Session — Rp 250.000 (1x Sesi Reguler)</option>
                <option value="Monthly Training 8x (Rp 1.450.000)" data-price="1450000" selected>Monthly Training (8x Sesi/Bulan) — Rp 1.450.000</option>
                <option value="Intensive Program 16x (Rp 2.600.000)" data-price="2600000">Intensive Program (16x Sesi/Bulan) — Rp 2.600.000</option>
                <option value="Private Coaching 1-on-1 (Rp 550.000)" data-price="550000">Private Coaching 1-on-1 — Rp 550.000</option>
              </select>
              <label class="flex items-center gap-2.5 p-3 rounded-xl bg-creamCanvas border border-violetPop/30 text-xs font-bold cursor-pointer">
                <input id="bk_racket_rent" type="checkbox" onchange="updateBookingSummary()" class="accent-indigoDeep w-4 h-4" />
                <span>Pinjam / Sewa Raket & Bola dari Akademi (+Rp 35.000, Gratis untuk Trial Class)</span>
              </label>
            </div>

            <!-- STEP 6: Ringkasan Pemesanan -->
            <div id="bk-step-6" class="bk-step hidden space-y-4">
              <h3 class="font-sport text-xl font-bold text-indigoDeep uppercase">6. Ringkasan Pemesanan Kelas</h3>
              <div id="bk-summary-box" class="bg-creamCanvas rounded-2xl p-5 border-2 border-violetPop/30 space-y-2.5 text-xs sm:text-sm"></div>
            </div>

            <!-- STEP 7: Kirim Reservasi via WhatsApp -->
            <div id="bk-step-7" class="bk-step hidden space-y-4">
              <h3 class="font-sport text-xl font-bold text-indigoDeep uppercase text-center">7. Kirim Reservasi via WhatsApp</h3>
              <div id="bk-wa-preview" class="bg-darkArena text-creamCanvas p-4 rounded-2xl font-mono text-xs whitespace-pre-line border border-voltLime/50"></div>
              <div class="flex flex-col sm:flex-row gap-3">
                <button onclick="sendBookingWhatsApp()" class="flex-1 py-3.5 px-5 rounded-full bg-[#25D366] hover:bg-[#1ebe5d] text-white font-extrabold text-sm shadow-lg">
                  💬 Kirim Pendaftaran ke Admin WA
                </button>
                <button onclick="copyBookingWA()" class="py-3.5 px-5 rounded-full bg-creamCanvas border border-indigoDeep/30 text-indigoDeep font-bold text-xs">
                  📋 Salin Pesan
                </button>
              </div>
              <p id="bk-copy-toast" class="hidden text-center text-xs font-bold text-indigoDeep">✓ Pesan berhasil disalin!</p>
            </div>

            <!-- Navigation Buttons -->
            <div class="flex items-center justify-between mt-7 pt-5 border-t border-indigoDeep/10">
              <button id="bk-prev" onclick="changeBookingStep(-1)" disabled class="px-5 py-2.5 rounded-full bg-creamCanvas text-indigoDeep font-bold text-xs disabled:opacity-40">
                ← Sebelumnya
              </button>
              <button id="bk-next" onclick="changeBookingStep(1)" class="px-6 py-2.5 rounded-full bg-indigoDeep hover:bg-violetPop text-voltLime font-bold text-xs shadow">
                Lanjut →
              </button>
            </div>
          </div>
        </div>

        <!-- Right 5 Cols: Tournament & Events + Training Rules -->
        <div class="lg:col-span-5 space-y-6">
          <div class="bg-indigoDeep text-white rounded-[2.2rem] p-6 sm:p-7 border-2 border-voltLime/60 shadow-xl">
            <span class="px-3 py-1 rounded-full bg-coralNeon text-white font-extrabold text-[10px] uppercase tracking-wider">🏆 Tournament & Events</span>
            <h3 class="font-sport text-2xl font-bold uppercase mt-2 mb-4">Agenda Kompetisi & Sparring</h3>
            <div class="space-y-3 text-xs">
              <div class="p-3.5 rounded-2xl bg-white/10 border border-white/15">
                <div class="flex justify-between font-bold text-voltLime">
                  <span>Jumat, 27 Nov 2026</span>
                  <span>Padel & Badminton</span>
                </div>
                <p class="font-bold text-sm mt-1">Friday Night Smash & Padel Social League</p>
                <p class="text-creamCanvas/75 mt-0.5">Friendly match internal antar member semua level.</p>
              </div>
              <div class="p-3.5 rounded-2xl bg-white/10 border border-white/15">
                <div class="flex justify-between font-bold text-coralNeon">
                  <span>Sabtu, 5 Des 2026</span>
                  <span>Tennis & Table Tennis</span>
                </div>
                <p class="font-bold text-sm mt-1">VoltCourt Junior & Youth Open Cup 2026</p>
                <p class="text-creamCanvas/75 mt-0.5">Turnamen U-10, U-14, dan U-18 berhadiah trofi & beasiswa latihan.</p>
              </div>
            </div>
          </div>

          <div class="bg-white rounded-[2.2rem] p-6 sm:p-7 border-2 border-indigoDeep/15 shadow-xl">
            <span class="text-xs font-extrabold uppercase tracking-widest text-violetPop">Aturan & Etika Akademi</span>
            <h3 class="font-sport text-xl font-bold text-indigoDeep uppercase mt-1 mb-3">Training Rules & Kebijakan</h3>
            <ul class="space-y-2 text-xs text-darkArena/80">
              <li class="flex gap-2"><strong class="text-indigoDeep">👟 Sepatu Khusus Court:</strong> Wajib menggunakan sepatu <em>non-marking court shoes</em> untuk menjaga permukaan karpet & hardcourt.</li>
              <li class="flex gap-2"><strong class="text-indigoDeep">👕 Pakaian Olahraga:</strong> Gunakan pakaian olahraga nyaman yang menyerap keringat (jersey/kaos olahraga).</li>
              <li class="flex gap-2"><strong class="text-indigoDeep">⏰ Ketepatan Waktu:</strong> Hadir 10 menit sebelum sesi untuk pemanasan bersama pelatih.</li>
              <li class="flex gap-2"><strong class="text-indigoDeep">🔄 Reschedule Kelas:</strong> Konfirmasi pembatalan/ganti jadwal maksimal H-1 (24 jam sebelumnya).</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ==================== TESTIMONIALS & FAQ ==================== -->
  <section id="testimonials-faq-section" data-section="coaches" class="py-20 bg-white border-t border-indigoDeep/10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center max-w-3xl mx-auto mb-12 reveal">
        <span class="text-xs font-extrabold uppercase tracking-widest text-coralNeon">Athlete Stories</span>
        <h2 class="font-sport text-3xl sm:text-4xl font-bold text-indigoDeep uppercase mt-1">
          Testimoni & <span class="text-violetPop">Perkembangan Peserta</span>
        </h2>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-16 reveal">
        <div class="lively-card bg-creamCanvas rounded-[2rem] p-6 border border-violetPop/30">
          <p class="text-xs sm:text-sm text-darkArena/85 leading-relaxed">
            "Mulai dari nol di Padel Beginner, dalam 6 minggu dengan Coach Mateo sudah berani ikut Friday Doubles League! Lapangan kacanya keren dan fasilitasnya lengkap."
          </p>
          <div class="mt-4 pt-3 border-t border-indigoDeep/10 flex items-center justify-between">
            <div>
              <p class="font-bold text-sm text-indigoDeep">Kevin Tanujaya (29 Thn)</p>
              <p class="text-xs text-violetPop font-bold">Padel Intermediate Member</p>
            </div>
            <span class="text-coralNeon font-bold">★★★★★</span>
          </div>
        </div>

        <div class="lively-card bg-creamCanvas rounded-[2rem] p-6 border border-violetPop/30">
          <p class="text-xs sm:text-sm text-darkArena/85 leading-relaxed">
            "Anak saya (11 tahun) ikut Junior Badminton & Tennis di VoltCourt. Footwork-nya jauh lebih lincah dan pelatihnya sangat sabar memantau progres bulanannya."
          </p>
          <div class="mt-4 pt-3 border-t border-indigoDeep/10 flex items-center justify-between">
            <div>
              <p class="font-bold text-sm text-indigoDeep">Ibu Melisa Gunawan</p>
              <p class="text-xs text-violetPop font-bold">Orang Tua Siswa Junior</p>
            </div>
            <span class="text-coralNeon font-bold">★★★★★</span>
          </div>
        </div>

        <div class="lively-card bg-creamCanvas rounded-[2rem] p-6 border border-violetPop/30">
          <p class="text-xs sm:text-sm text-darkArena/85 leading-relaxed">
            "Latihan Table Tennis dengan robot spin dan Coach Kenji bikin kontrol backhand topspin saya naik drastis. Sangat direkomendasikan!"
          </p>
          <div class="mt-4 pt-3 border-t border-indigoDeep/10 flex items-center justify-between">
            <div>
              <p class="font-bold text-sm text-indigoDeep">dr. Hendra Saputra (42 Thn)</p>
              <p class="text-xs text-violetPop font-bold">Table Tennis Competitive</p>
            </div>
            <span class="text-coralNeon font-bold">★★★★★</span>
          </div>
        </div>
      </div>

      <!-- FAQ -->
      <div class="max-w-3xl mx-auto reveal">
        <h3 class="font-sport text-2xl sm:text-3xl font-bold text-indigoDeep uppercase text-center mb-6">
          Frequently Asked Questions (FAQ)
        </h3>
        <div id="faq-container" class="space-y-3"><p class="volt-init-fallback">Memuat pertanyaan yang sering diajukan…</p></div>
      </div>
    </div>
  </section>

  <!-- ==================== FOOTER ==================== -->
  <footer class="bg-darkArena text-white pt-14 pb-8 border-t-4 border-voltLime">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row items-center justify-between gap-6 text-xs">
      <div>
        <span class="font-sport text-xl font-bold text-voltLime">VOLTCOURT RACQUET ACADEMY</span>
        <p class="text-creamCanvas/70 mt-1">Padel • Badminton • Tennis • Table Tennis Training Center — Jakarta</p>
      </div>
      <div class="flex flex-wrap gap-4 font-bold text-creamCanvas/80">
        <a href="#sports-categories-section" class="hover:text-voltLime">4 Cabang Olahraga</a>
        <a href="#schedule-court-section" class="hover:text-voltLime">Jadwal & Court</a>
        <a href="#coaches-packages-section" class="hover:text-voltLime">Pelatih & Paket</a>
        <a href="#booking-wizard-section" class="hover:text-voltLime">Booking Kelas</a>
      </div>
      <p class="text-creamCanvas/50">© 2026 VoltCourt Racquet Academy. <br> Made with care ♡ · Website template by WEBIA</p>
    </div>
  </footer>

  <!-- ==================== STANDALONE COURT RESERVATION MODAL ==================== -->
  <div id="court-modal" class="fixed inset-0 z-50 hidden items-center justify-center bg-darkArena/80 backdrop-blur-sm p-4">
    <div class="bg-creamCanvas rounded-[2rem] max-w-md w-full p-6 sm:p-8 border-2 border-voltLime shadow-2xl relative">
      <button onclick="closeCourtModal()" class="absolute top-5 right-5 w-9 h-9 rounded-full bg-indigoDeep text-voltLime font-bold">✕</button>
      <span class="text-xs font-extrabold uppercase text-coralNeon">Court Booking Mandiri</span>
      <h3 class="font-sport text-2xl font-bold text-indigoDeep uppercase mt-1">Reservasi Lapangan</h3>
      <p id="court-modal-name" class="text-xs font-bold text-violetPop mt-1 mb-4"></p>
      <div class="space-y-3 text-xs">
        <input id="cm-name" type="text" placeholder="Nama Pemesan" class="w-full p-3 rounded-xl bg-white border border-violetPop/40 font-semibold" />
        <input id="cm-date" type="date" class="w-full p-3 rounded-xl bg-white border border-violetPop/40 font-semibold" />
        <select id="cm-hours" class="w-full p-3 rounded-xl bg-white border border-violetPop/40 font-bold">
          <option value="1 Jam">Durasi: 1 Jam</option>
          <option value="2 Jam">Durasi: 2 Jam</option>
          <option value="3 Jam">Durasi: 3 Jam</option>
        </select>
        <label class="flex items-center gap-2 font-bold text-indigoDeep">
          <input id="cm-racket" type="checkbox" class="accent-indigoDeep" />
          <span>Tambah Sewa Raket & Bola (+Rp 40.000)</span>
        </label>
        <button onclick="sendCourtReserveWA()" class="w-full py-3.5 rounded-full bg-indigoDeep hover:bg-violetPop text-voltLime font-sport font-bold uppercase tracking-wider">
          Konfirmasi Court via WhatsApp →
        </button>
      </div>
    </div>
  </div>

  <!-- ==================== FLOATING WHATSAPP & UNIQUE "COACH VOLT AI" CHATBOT ==================== -->
  <a
    href="#" id="voltcourt-whatsapp-fab"
    target="_blank"
    rel="noopener noreferrer"
    class="fixed bottom-5 left-5 z-40 flex items-center gap-2.5 bg-[#25D366] hover:bg-[#1ebe5d] text-white px-4 py-3.5 rounded-full shadow-2xl transition-transform hover:scale-105"
  >
    <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
      <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.662.591 1.221.774 1.394.86s.274.072.376-.043c.101-.116.433-.506.549-.68.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.045.072.045.419-.1.824z"/>
    </svg>
    <span class="hidden sm:inline font-bold text-xs">WhatsApp Admin</span>
  </a>

  <!-- Unique Floating AI Chatbot: "Coach Volt AI" -->
  <div class="fixed bottom-5 right-5 z-50">
    <div id="volt-ai-window" class="hidden mb-3 w-[340px] sm:w-[390px] bg-creamCanvas rounded-[2rem] shadow-2xl border-2 border-indigoDeep overflow-hidden">
      <div class="bg-gradient-to-r from-indigoDeep via-violetPop to-darkArena text-white p-4 flex items-center justify-between">
        <div class="flex items-center gap-3">
          <div class="w-11 h-11 rounded-2xl bg-voltLime flex items-center justify-center shadow-inner relative">
            <svg class="w-7 h-7" viewBox="0 0 44 44" fill="none">
              <rect x="8" y="10" width="28" height="24" rx="8" fill="#343A8F"/>
              <rect x="12" y="16" width="20" height="8" rx="4" fill="#151842"/>
              <circle cx="18" cy="20" r="2.5" fill="#D8F05B" style="animation: visorGlint 2s infinite"/>
              <circle cx="26" cy="20" r="2.5" fill="#FF6B8A" style="animation: visorGlint 2s infinite"/>
              <path d="M22 4V10" stroke="#343A8F" stroke-width="2.5" stroke-linecap="round"/>
              <circle cx="22" cy="4" r="3" fill="#FF6B8A"/>
            </svg>
            <span class="absolute -bottom-1 -right-1 w-3.5 h-3.5 rounded-full bg-[#25D366] border-2 border-darkArena"></span>
          </div>
          <div>
            <h4 class="font-sport font-bold text-sm text-voltLime uppercase">Coach Volt AI ⚡</h4>
            <p class="text-[11px] text-white/85">Asisten Program Padel, Badminton, Tennis & Pingpong</p>
          </div>
        </div>
        <button onclick="toggleVoltAI()" class="w-8 h-8 rounded-full bg-white/15 hover:bg-white/25 flex items-center justify-center text-voltLime font-bold">✕</button>
      </div>

      <div id="volt-ai-feed" class="h-72 overflow-y-auto p-4 space-y-3 arena-mesh text-xs sm:text-sm">
        <div class="bg-white p-3.5 rounded-2xl rounded-tl-none border border-violetPop/30 shadow-sm text-darkArena leading-relaxed">
          Halo Atlet! ⚡ Saya <strong>Coach Volt AI</strong>. Mau latihan <strong>Padel, Badminton, Tennis, atau Table Tennis</strong>? Tanyakan level, jadwal, harga paket, atau klik topik cepat di bawah!
        </div>
      </div>

      <div class="px-3 py-2 bg-white border-t border-indigoDeep/10 flex gap-1.5 overflow-x-auto">
        <button onclick="askVoltAI('Rekomendasi kelas Padel & sewa raket pemula')" class="whitespace-nowrap px-3 py-1.5 rounded-full bg-creamCanvas hover:bg-indigoDeep hover:text-voltLime text-indigoDeep font-bold text-[11px] border border-indigoDeep/20">
          🎾 Padel Pemula
        </button>
        <button onclick="askVoltAI('Program Junior Badminton & Tennis anak')" class="whitespace-nowrap px-3 py-1.5 rounded-full bg-creamCanvas hover:bg-indigoDeep hover:text-voltLime text-indigoDeep font-bold text-[11px] border border-indigoDeep/20">
          🏸 Kids & Junior
        </button>
        <button onclick="askVoltAI('Jadwal latihan malam & akhir pekan')" class="whitespace-nowrap px-3 py-1.5 rounded-full bg-creamCanvas hover:bg-indigoDeep hover:text-voltLime text-indigoDeep font-bold text-[11px] border border-indigoDeep/20">
          🗓️ Jadwal Kelas
        </button>
        <button onclick="askVoltAI('Harga paket Trial, Monthly & Private Coaching')" class="whitespace-nowrap px-3 py-1.5 rounded-full bg-creamCanvas hover:bg-indigoDeep hover:text-voltLime text-indigoDeep font-bold text-[11px] border border-indigoDeep/20">
          💳 Paket & Biaya
        </button>
      </div>

      <form onsubmit="handleVoltAISubmit(event)" class="p-3 bg-white border-t border-indigoDeep/15 flex gap-2">
        <input id="volt-ai-input" type="text" placeholder="Tanya cabang, level, jadwal, biaya..." class="flex-1 px-3.5 py-2.5 rounded-full bg-creamCanvas border border-violetPop/40 text-xs font-medium focus:outline-none focus:border-indigoDeep" />
        <button type="submit" class="px-4 py-2.5 rounded-full bg-indigoDeep hover:bg-violetPop text-voltLime font-bold text-xs">Kirim</button>
      </form>
    </div>

    <button
      onclick="toggleVoltAI()"
      class="relative ml-auto flex items-center gap-3 bg-gradient-to-r from-indigoDeep to-violetPop text-white pl-3 pr-5 py-2.5 rounded-full shadow-2xl border-2 border-voltLime transition-transform hover:scale-105 group"
    >
      <span class="absolute inset-0 rounded-full bg-voltLime/40 -z-10" style="animation: pulseBeacon 2.4s infinite;"></span>
      <div class="w-10 h-10 rounded-full bg-voltLime flex items-center justify-center group-hover:rotate-12 transition-transform">
        <svg class="w-6 h-6" viewBox="0 0 44 44" fill="none">
          <rect x="8" y="10" width="28" height="24" rx="8" fill="#343A8F"/>
          <circle cx="18" cy="20" r="2.5" fill="#D8F05B"/>
          <circle cx="26" cy="20" r="2.5" fill="#FF6B8A"/>
          <circle cx="22" cy="5" r="3" fill="#FF6B8A"/>
        </svg>
      </div>
      <div class="text-left">
        <span class="block text-[9px] font-extrabold uppercase tracking-widest text-voltLime leading-none">Smart Sport Bot</span>
        <span class="font-sport font-bold text-xs sm:text-sm text-white">Coach Volt AI</span>
      </div>
    </button>
  </div>

  <!-- ==================== JAVASCRIPT LOGIC ==================== -->
  <script>
    // 1. FOUR SPORTS VISUAL COURT BLUEPRINTS & CURRICULUM DATA
    const sportsData = 