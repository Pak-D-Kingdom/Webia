<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="BlushBowl Nutrition — layanan meal subscription diet dengan pilihan kalori dan makro." />
  <title>BlushBowl Nutrition — Diet & Calorie-Controlled Meal Service</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,400;0,9..40,500;0,9..40,700;1,9..40,400&family=JetBrains+Mono:wght@500;700&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap" rel="stylesheet" />
  <script>
tailwind.config = {
      theme: {
        extend: {
          colors: {
            sage: '#647D68',
            'sage-dark': '#4E6352',
            'sage-light': '#E6EFE8',
            blush: '#D9A7A0',
            'blush-dark': '#C1877F',
            peach: '#F1D8CE',
            linen: '#FAF4EC',
            espresso: '#493B38',
            'espresso-soft': '#6D5A56'
          },
          fontFamily: {
            display: ['"Plus Jakarta Sans"', 'sans-serif'],
            sans: ['"DM Sans"', 'sans-serif'],
            mono: ['"JetBrains Mono"', 'monospace']
          }
        }
      }
    };
  </script>
  <link rel="stylesheet" href="{{ asset('css/website-bisnis/templates/food-subscription/diet-meal/blushbowl/blushbowl.css') }}" />
</head>
<body class="font-sans antialiased pt-[108px] sm:pt-[112px] selection:bg-blush selection:text-espresso">


  <!-- ==================== 1. FIXED TOPBAR + STICKY GLASSMORPHIC NAVBAR ==================== -->
  <header class="fixed top-0 left-0 right-0 z-50 shadow-sm">
    <!-- Topbar -->
    <div class="bg-espresso text-linen text-[11px] sm:text-xs py-1.5 px-4 border-b border-blush/20">
      <div class="max-w-7xl mx-auto flex items-center justify-between gap-2">
        <div class="flex items-center gap-2 overflow-hidden">
          <span class="inline-flex items-center gap-1.5 bg-sage text-white font-bold px-2.5 py-0.5 rounded-full text-[10px] uppercase tracking-wider shrink-0">
            <span class="w-1.5 h-1.5 rounded-full bg-[#39FF14] animate-ping"></span> Promo Gizi
          </span>
          <p class="truncate font-medium">
            Gratis Konsultasi Ahli Gizi (S.Gz) & Ongkir Minggu Pertama — Kode:
            <button type="button" onclick="copyPromoCode('BLUSHFIT26')" class="underline decoration-blush font-mono font-bold text-peach hover:text-white ml-1" title="Klik untuk salin">BLUSHFIT26</button>
          </p>
        </div>
        <div class="hidden md:flex items-center gap-4 text-[11px] text-peach/90 shrink-0">
          <span>⏰ Kirim Segar: 06.30 & 11.30 WIB</span>
          <span class="bg-white/10 px-2.5 py-0.5 rounded-full font-semibold text-white">100% Halal & Terukur Lab</span>
        </div>
      </div>
    </div>

    <!-- Main Navbar -->
    <nav class="bg-linen/92 backdrop-blur-md border-b border-espresso/12 relative" aria-label="Navigasi Utama">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 sm:h-[68px] flex items-center justify-between gap-3">
        <!-- Brand Logo -->
        <a href="#hero" class="flex items-center gap-2.5 group shrink-0">
          <div class="w-10 h-10 rounded-2xl bg-sage flex items-center justify-center border-2 border-espresso shadow-[0_3px_0_0_#493B38] group-hover:rotate-6 transition-transform">
            <svg class="w-5 h-5 text-linen" viewBox="0 0 32 32" fill="none">
              <path d="M5 16C5 22.0751 9.92487 27 16 27C22.0751 27 27 22.0751 27 16H5Z" fill="#F1D8CE" stroke="#FAF4EC" stroke-width="2"/>
              <circle cx="12" cy="11" r="3" fill="#D9A7A0"/>
              <circle cx="19" cy="10" r="3.5" fill="#FAF4EC"/>
              <path d="M16 4C18.5 4 20.5 6 20.5 8.5C18 8.5 16 6.5 16 4Z" fill="#A7D7B8"/>
            </svg>
          </div>
          <div>
            <span class="font-display font-extrabold text-lg sm:text-xl tracking-tight text-espresso block leading-none">Blush<span class="text-sage">Bowl</span></span>
            <span class="text-[9px] font-bold uppercase tracking-[0.18em] text-espresso-soft">Calorie Precision Lab</span>
          </div>
        </a>

        <!-- Desktop Section Links with Scroll-Spy -->
        <div class="hidden lg:flex items-center gap-1 bg-peach/55 p-1 rounded-full border border-espresso/10">
          <a href="#hero" data-spy="hero" class="nav-spy-link px-3.5 py-1.5 rounded-full text-xs font-bold bg-espresso text-linen transition-all">Beranda</a>
          <a href="#calculator-section" data-spy="calculator-section" class="nav-spy-link px-3.5 py-1.5 rounded-full text-xs font-semibold text-espresso hover:bg-white/75 transition-all">Kalkulator Makro</a>
          <a href="#programs-section" data-spy="programs-section" class="nav-spy-link px-3.5 py-1.5 rounded-full text-xs font-semibold text-espresso hover:bg-white/75 transition-all">Program Diet</a>
          <a href="#catalog-section" data-spy="catalog-section" class="nav-spy-link px-3.5 py-1.5 rounded-full text-xs font-semibold text-espresso hover:bg-white/75 transition-all">Katalog Menu</a>
          <a href="#builder-section" data-spy="builder-section" class="nav-spy-link px-3.5 py-1.5 rounded-full text-xs font-semibold text-espresso hover:bg-white/75 transition-all">Meal Builder</a>
          <a href="#subscription-section" data-spy="subscription-section" class="nav-spy-link px-3.5 py-1.5 rounded-full text-xs font-semibold text-espresso hover:bg-white/75 transition-all">Paket & Biaya</a>
          <a href="#nutritionist-section" data-spy="nutritionist-section" class="nav-spy-link px-3.5 py-1.5 rounded-full text-xs font-semibold text-espresso hover:bg-white/75 transition-all">Ahli Gizi & Edukasi</a>
        </div>

        <!-- Right Actions -->
        <div class="flex items-center gap-2 sm:gap-2.5">
          <button type="button" onclick="openCheckoutDrawer()" class="relative inline-flex items-center gap-1.5 bg-peach hover:bg-blush/50 text-espresso font-bold px-3 py-2 rounded-xl border-2 border-espresso text-xs transition-all" aria-label="Buka Keranjang Paket">
            <span>🥗</span>
            <span class="hidden sm:inline">Meal Box</span>
            <span id="nav-box-count" class="bg-sage text-white font-mono text-[11px] font-bold px-1.5 py-0.5 rounded-full">4</span>
          </button>

          <a href="#calculator-section" class="btn-shimmer bg-sage hover:bg-sage-dark text-white font-bold px-3.5 sm:px-4 py-2 rounded-xl border-2 border-espresso shadow-[0_3px_0_0_#493B38] text-xs transition-transform active:translate-y-0.5">
            Hitung Kalori
          </a>

          <button type="button" onclick="toggleMobileMenu()" class="lg:hidden p-2 rounded-xl bg-white border-2 border-espresso text-espresso" aria-label="Menu Navigasi">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M4 6h16M4 12h16M4 18h16"/></svg>
          </button>
        </div>
      </div>

      <!-- Reading Progress Bar -->
      <div class="w-full h-[3px] bg-espresso/10">
        <div id="scroll-progress-bar" class="h-full bg-gradient-to-r from-sage via-blush to-espresso w-0 transition-all duration-150"></div>
      </div>

      <!-- Mobile Dropdown Drawer -->
      <div id="mobile-menu" class="hidden lg:hidden bg-linen border-b-2 border-espresso px-4 py-3 grid grid-cols-2 gap-2">
        <a href="#hero" onclick="toggleMobileMenu()" class="px-3 py-2 rounded-xl text-xs font-bold bg-peach text-espresso">🏠 Beranda</a>
        <a href="#calculator-section" onclick="toggleMobileMenu()" class="px-3 py-2 rounded-xl text-xs font-bold bg-white border border-espresso/15 text-espresso">🧮 Kalkulator Makro</a>
        <a href="#programs-section" onclick="toggleMobileMenu()" class="px-3 py-2 rounded-xl text-xs font-bold bg-white border border-espresso/15 text-espresso">🥗 Program Diet</a>
        <a href="#catalog-section" onclick="toggleMobileMenu()" class="px-3 py-2 rounded-xl text-xs font-bold bg-white border border-espresso/15 text-espresso">🍱 Katalog Menu</a>
        <a href="#builder-section" onclick="toggleMobileMenu()" class="px-3 py-2 rounded-xl text-xs font-bold bg-white border border-espresso/15 text-espresso">📅 Meal Builder</a>
        <a href="#subscription-section" onclick="toggleMobileMenu()" class="px-3 py-2 rounded-xl text-xs font-bold bg-white border border-espresso/15 text-espresso">💳 Paket Langganan</a>
        <a href="#dashboard-section" onclick="toggleMobileMenu()" class="px-3 py-2 rounded-xl text-xs font-bold bg-white border border-espresso/15 text-espresso">📈 Jurnal Progres</a>
        <a href="#nutritionist-section" onclick="toggleMobileMenu()" class="px-3 py-2 rounded-xl text-xs font-bold bg-white border border-espresso/15 text-espresso">🩺 Ahli Gizi</a>
      </div>
    </nav>
  </header>

  <!-- ==================== 2. UNIQUE CREATIVE & BRANDED HERO SECTION ==================== -->
  <section id="hero" class="relative overflow-hidden pt-6 pb-16 lg:pt-12 lg:pb-24 bg-gradient-to-b from-linen via-peach/35 to-linen">
    <!-- Floating Botanical & Nutrition Ornaments -->
    <div class="absolute top-10 left-6 w-24 h-24 rounded-full bg-blush/35 blur-xl pointer-events-none animate-float-slow"></div>
    <div class="absolute bottom-20 right-8 w-40 h-40 rounded-full bg-sage/25 blur-2xl pointer-events-none animate-float-reverse"></div>
    <span class="hidden md:inline-block absolute top-14 left-[44%] text-2xl animate-drift pointer-events-none select-none">🥑</span>
    <span class="hidden md:inline-block absolute bottom-28 left-12 text-2xl animate-wiggle pointer-events-none select-none">🥦</span>
    <span class="hidden md:inline-block absolute top-24 right-12 text-2xl animate-bounce-gentle pointer-events-none select-none">🍓</span>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
      <div class="grid lg:grid-cols-12 gap-10 lg:gap-8 items-center">
        <!-- Left Messaging & CTAs (6 Cols) -->
        <div class="lg:col-span-6 space-y-6 text-center lg:text-left">
          <div class="inline-flex items-center gap-2.5 bg-white px-4 py-2 rounded-full border-2 border-espresso shadow-sm animate-float-slow">
            <span class="flex h-2.5 w-2.5 relative">
              <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-sage opacity-75"></span>
              <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-sage"></span>
            </span>
            <span class="text-xs font-bold uppercase tracking-wider text-espresso">Akurasi Kalori ±5 kcal • Kurasi Ahli Gizi</span>
          </div>

          <h1 class="font-display font-extrabold text-4xl sm:text-5xl lg:text-[3.4rem] leading-[1.12] text-espresso tracking-tight">
            Diet Enak Tanpa Tebak-Tebakan
            <span class="relative inline-block text-sage italic">
              Kalori & Makro.
              <svg class="absolute -bottom-2 left-0 w-full h-3 text-blush" viewBox="0 0 200 12" fill="none">
                <path d="M2 9C55 2 145 2 198 9" stroke="currentColor" stroke-width="5" stroke-linecap="round"/>
              </svg>
            </span>
          </h1>

          <p class="text-base sm:text-lg text-espresso-soft leading-relaxed max-w-xl mx-auto lg:mx-0">
            Setiap kotak <strong class="text-espresso">BlushBowl</strong> ditimbang hingga gramasi terakhir dengan rasio <span class="bg-peach px-2 py-0.5 rounded-lg font-bold text-espresso">Protein Tinggi</span>, karbohidrat kompleks indeks glikemik rendah, dan saus racikan segar tanpa gula rafinasi.
          </p>

          <!-- CTAs -->
          <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-3.5 pt-1">
            <a href="#calculator-section" class="btn-shimmer w-full sm:w-auto inline-flex items-center justify-center gap-2.5 bg-sage hover:bg-sage-dark text-white font-bold px-7 py-4 rounded-2xl border-2 border-espresso shadow-[0_4px_0_0_#493B38] text-sm sm:text-base transition-transform active:translate-y-0.5">
              <span>🧮</span> Hitung Meal Plan Saya
            </a>
            <a href="#catalog-section" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-white hover:bg-peach/65 text-espresso font-bold px-6 py-4 rounded-2xl border-2 border-espresso shadow-[0_4px_0_0_#493B38] text-sm sm:text-base transition-transform active:translate-y-0.5">
              Eksplor Menu Kalori
              <span class="bg-blush/45 text-espresso text-xs font-extrabold px-2 py-0.5 rounded-full">8 Menu</span>
            </a>
          </div>

          <!-- Trust Metrics -->
          <div class="grid grid-cols-3 gap-3 pt-3 max-w-lg mx-auto lg:mx-0">
            <div class="bg-white/90 p-3.5 rounded-2xl border border-espresso/15">
              <p class="font-mono font-bold text-lg sm:text-xl text-sage">320–650</p>
              <p class="text-xs font-semibold text-espresso-soft">kcal / Porsi</p>
            </div>
            <div class="bg-white/90 p-3.5 rounded-2xl border border-espresso/15">
              <p class="font-mono font-bold text-lg sm:text-xl text-espresso">35g–48g</p>
              <p class="text-xs font-semibold text-espresso-soft">Lean Protein</p>
            </div>
            <div class="bg-white/90 p-3.5 rounded-2xl border border-espresso/15">
              <p class="font-mono font-bold text-lg sm:text-xl text-blush-dark">4.9 ★</p>
              <p class="text-xs font-semibold text-espresso-soft">14.200+ Member</p>
            </div>
          </div>
        </div>

        <!-- Right Kinetic Macro Orbit & Interactive Bowl Stage (6 Cols) -->
        <div class="lg:col-span-6 relative flex items-center justify-center py-6">
          <div class="relative w-[320px] h-[320px] sm:w-[430px] sm:h-[430px] flex items-center justify-center">
            <!-- Morphing Blob Backdrop -->
            <div class="absolute inset-4 bg-gradient-to-tr from-blush/55 via-peach to-sage/35 animate-blob border-2 border-espresso/15"></div>

            <!-- Outer Orbit Ring -->
            <svg class="absolute inset-0 w-full h-full animate-orbit pointer-events-none" viewBox="0 0 400 400">
              <circle cx="200" cy="200" r="188" fill="none" stroke="#647D68" stroke-width="2" stroke-dasharray="10 10" opacity="0.6"/>
              <circle cx="200" cy="12" r="7" fill="#647D68"/>
              <circle cx="388" cy="200" r="7" fill="#D9A7A0"/>
              <circle cx="200" cy="388" r="7" fill="#493B38"/>
            </svg>

            <!-- Inner Reverse Ring -->
            <svg class="absolute inset-7 w-[calc(100%-3.5rem)] h-[calc(100%-3.5rem)] animate-orbit-reverse pointer-events-none" viewBox="0 0 340 340">
              <circle cx="170" cy="170" r="158" fill="none" stroke="#D9A7A0" stroke-width="2.5" stroke-dasharray="26 14 6 14"/>
            </svg>

            <!-- Central Fitness Meal Bowl Photo -->
            <div class="relative w-56 h-56 sm:w-72 sm:h-72 rounded-full p-2.5 bg-white border-4 border-espresso shadow-xl z-10 overflow-hidden group">
              <img
                id="hero-bowl-img"
                src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?auto=format&fit=crop&w=800&q=85"
                onerror="this.src='https://placehold.co/600x600/F1D8CE/493B38?text=Salmon+Quinoa+Bowl'"
                alt="BlushBowl Teriyaki Salmon Quinoa Bowl"
                class="w-full h-full object-cover rounded-full transition-transform duration-700 group-hover:scale-110"
              />
              <div class="absolute bottom-4 inset-x-0 flex justify-center">
                <span id="hero-bowl-kcal" class="bg-espresso/90 backdrop-blur-md text-linen font-mono text-[11px] font-bold px-3.5 py-1 rounded-full border border-blush">
                  440 kcal • Teriyaki Salmon Bowl
                </span>
              </div>
            </div>

            <!-- Floating Macro Badge: Protein -->
            <div class="absolute -top-2 left-0 sm:left-2 z-20 bg-white px-3.5 py-2.5 rounded-2xl border-2 border-espresso shadow-md animate-float-slow">
              <div class="flex items-center gap-2.5">
                <span class="w-8 h-8 rounded-xl bg-sage text-white font-mono font-bold text-xs flex items-center justify-center">P</span>
                <div>
                  <p class="text-[10px] font-bold text-espresso-soft uppercase">Protein</p>
                  <p id="hero-macro-p" class="font-mono font-bold text-sm text-espresso">42g <span class="text-xs text-sage">(38%)</span></p>
                </div>
              </div>
            </div>

            <!-- Floating Macro Badge: Carbs -->
            <div class="absolute top-8 -right-2 sm:-right-3 z-20 bg-peach px-3.5 py-2.5 rounded-2xl border-2 border-espresso shadow-md animate-float-reverse">
              <div class="flex items-center gap-2.5">
                <span class="w-8 h-8 rounded-xl bg-espresso text-peach font-mono font-bold text-xs flex items-center justify-center">C</span>
                <div>
                  <p class="text-[10px] font-bold text-espresso-soft uppercase">Karbo</p>
                  <p id="hero-macro-c" class="font-mono font-bold text-sm text-espresso">38g <span class="text-xs text-sage-dark">(35%)</span></p>
                </div>
              </div>
            </div>

            <!-- Floating Macro Badge: Healthy Fat -->
            <div class="absolute bottom-7 -left-2 sm:left-0 z-20 bg-white px-3.5 py-2.5 rounded-2xl border-2 border-espresso shadow-md animate-float-reverse">
              <div class="flex items-center gap-2.5">
                <span class="w-8 h-8 rounded-xl bg-blush text-espresso font-mono font-bold text-xs flex items-center justify-center">F</span>
                <div>
                  <p class="text-[10px] font-bold text-espresso-soft uppercase">Lemak</p>
                  <p id="hero-macro-f" class="font-mono font-bold text-sm text-espresso">12g <span class="text-xs text-blush-dark">(27%)</span></p>
                </div>
              </div>
            </div>

            <!-- Interactive Hero Dish Switcher -->
            <div class="absolute -bottom-5 right-0 sm:right-2 z-20 bg-espresso text-linen p-1.5 rounded-2xl border-2 border-blush shadow-lg flex items-center gap-1">
              <button type="button" onclick="switchHeroDish(0)" id="hero-dish-btn-0" class="hero-dish-btn bg-sage text-white text-[11px] font-bold px-2.5 py-1.5 rounded-xl transition-all">Salmon 440</button>
              <button type="button" onclick="switchHeroDish(1)" id="hero-dish-btn-1" class="hero-dish-btn hover:bg-white/15 text-peach text-[11px] font-bold px-2.5 py-1.5 rounded-xl transition-all">Chicken 390</button>
              <button type="button" onclick="switchHeroDish(2)" id="hero-dish-btn-2" class="hero-dish-btn hover:bg-white/15 text-peach text-[11px] font-bold px-2.5 py-1.5 rounded-xl transition-all">Tempeh 350</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Dual-Direction Kinetic Marquee Ticker -->
    <div class="mt-14 bg-espresso text-linen py-3 border-y-2 border-espresso overflow-hidden space-y-1.5">
      <div class="animate-marquee flex items-center gap-8 text-xs font-bold tracking-wider uppercase">
        <span>✦ KALORI TERUKUR LABORATORIUM (±5 KCAL)</span>
        <span class="text-blush">●</span>
        <span>TANPA MSG & GULA RAFINASI</span>
        <span class="text-sage">●</span>
        <span>MASAK SEGAR TIAP SUBUH PUKUL 04.00 WIB</span>
        <span class="text-blush">●</span>
        <span>LABEL NUTRITION FACTS BPOM DI SETIAP BOX</span>
        <span class="text-sage">●</span>
        <span>BEBAS TUKAR MENU H-1</span>
        <span class="text-blush">●</span>
        <span>100% BERSERTIFIKAT HALAL</span>
        <span class="text-sage">●</span>
        <span>✦ KALORI TERUKUR LABORATORIUM (±5 KCAL)</span>
        <span class="text-blush">●</span>
        <span>TANPA MSG & GULA RAFINASI</span>
        <span class="text-sage">●</span>
        <span>MASAK SEGAR TIAP SUBUH PUKUL 04.00 WIB</span>
        <span class="text-blush">●</span>
        <span>LABEL NUTRITION FACTS BPOM DI SETIAP BOX</span>
        <span class="text-sage">●</span>
        <span>BEBAS TUKAR MENU H-1</span>
        <span class="text-blush">●</span>
        <span>100% BERSERTIFIKAT HALAL</span>
        <span class="text-sage">●</span>
      </div>
    </div>
  </section>

  <!-- ==================== 3. PERSONALIZED NUTRITION INTRODUCTION ==================== -->
  <section id="intro-section" class="py-16 lg:py-22 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto reveal-on-scroll relative">
    <span class="hidden lg:inline-block absolute top-8 right-10 text-3xl animate-float-slow pointer-events-none">🥗</span>
    <div class="text-center max-w-3xl mx-auto mb-12 space-y-3">
      <span class="inline-block bg-peach text-espresso font-extrabold text-xs uppercase tracking-widest px-4 py-1.5 rounded-full border border-espresso/20">Cara Kerja BlushBowl</span>
      <h2 class="font-display font-extrabold text-3xl sm:text-4xl text-espresso">3 Langkah Menuju Target Berat & Komposisi Tubuh Ideal</h2>
      <p class="text-espresso-soft text-sm sm:text-base">Dirancang oleh Ahli Gizi klinis dan dimasak oleh chef profesional agar diet terasa seperti menikmati hidangan restoran sehat.</p>
    </div>

    <div class="grid md:grid-cols-3 gap-6">
      <div class="bg-white rounded-3xl p-7 border-2 border-espresso shadow-[0_6px_0_0_#493B38] hover:-translate-y-1.5 transition-transform">
        <div class="w-12 h-12 rounded-2xl bg-sage text-white font-mono font-bold text-lg flex items-center justify-center mb-4 animate-bounce-gentle">01</div>
        <h3 class="font-display font-bold text-xl text-espresso mb-2">Ukur Kebutuhan Kalori</h3>
        <p class="text-sm text-espresso-soft leading-relaxed">Hitung BMR, TDEE, dan rasio makronutrisi harian menggunakan kalkulator interaktif berbasis tujuan kebugaran Anda.</p>
      </div>
      <div class="bg-peach/45 rounded-3xl p-7 border-2 border-espresso shadow-[0_6px_0_0_#493B38] hover:-translate-y-1.5 transition-transform">
        <div class="w-12 h-12 rounded-2xl bg-espresso text-peach font-mono font-bold text-lg flex items-center justify-center mb-4 animate-wiggle">02</div>
        <h3 class="font-display font-bold text-xl text-espresso mb-2">Pilih Menu Presisi Makro</h3>
        <p class="text-sm text-espresso-soft leading-relaxed">Filter ratusan variasi hidangan berdasarkan kalori, tinggi protein, pantangan alergen, serta ukuran porsi pilihan.</p>
      </div>
      <div class="bg-white rounded-3xl p-7 border-2 border-espresso shadow-[0_6px_0_0_#493B38] hover:-translate-y-1.5 transition-transform">
        <div class="w-12 h-12 rounded-2xl bg-blush text-espresso font-mono font-bold text-lg flex items-center justify-center mb-4 animate-bounce-gentle">03</div>
        <h3 class="font-display font-bold text-xl text-espresso mb-2">Antar Segar Setiap Hari</h3>
        <p class="text-sm text-espresso-soft leading-relaxed">Tim dapur memasak segar setiap pagi dan mengirimkan dalam <em>thermal bag</em> berpendingin langsung ke rumah atau kantor Anda.</p>
      </div>
    </div>
  </section>

  <!-- ==================== 4. INTERACTIVE CALORIE & MACRO CALCULATOR ==================== -->
  <section id="calculator-section" class="py-16 lg:py-24 bg-[#3D312E] text-linen border-y-2 border-espresso/20 px-4 sm:px-6 lg:px-8 reveal-on-scroll relative overflow-hidden">
    <!-- Decorative Kinetic Ornaments -->
    <div class="absolute -top-16 -right-16 w-64 h-64 rounded-full bg-sage/15 blur-3xl pointer-events-none animate-float-slow"></div>
    <div class="absolute -bottom-16 -left-16 w-64 h-64 rounded-full bg-blush/15 blur-3xl pointer-events-none animate-float-reverse"></div>
    <span class="hidden lg:inline-block absolute top-12 right-14 text-2xl animate-drift pointer-events-none select-none opacity-80">🥗</span>
    <span class="hidden lg:inline-block absolute bottom-12 left-12 text-2xl animate-wiggle pointer-events-none select-none opacity-80">⚖️</span>

    <div class="max-w-6xl mx-auto relative z-10">
      <!-- Section Header -->
      <div class="mb-8">
        <span class="inline-flex items-center gap-2 text-sage font-extrabold text-xs sm:text-sm tracking-wide mb-2">
          <span class="w-2 h-2 rounded-full bg-[#39FF14] animate-pulse"></span>
          Kalkulator Kalori &amp; Makro
        </span>
        <h2 class="font-display font-extrabold text-3xl sm:text-4xl lg:text-[2.6rem] text-linen tracking-tight">
          Hitung target harianmu
        </h2>
      </div>

      <!-- 2-Column Layout Matching Reference -->
      <div class="grid lg:grid-cols-12 gap-6 lg:gap-8 items-stretch">
        <!-- Left Card: Vertical Biometric Form (#493B38) -->
        <div class="lg:col-span-6 bg-[#493B38] rounded-3xl p-6 sm:p-8 border border-white/10 shadow-2xl space-y-4">
          <!-- Jenis Kelamin -->
          <div>
            <label for="calc-gender" class="block text-xs font-bold text-linen/95 mb-1.5">Jenis kelamin</label>
            <div class="relative">
              <select id="calc-gender" onchange="calculateNutrition()" class="w-full appearance-none p-3.5 pr-10 rounded-xl border border-white/15 bg-[#3B2F2C] text-linen font-medium text-sm focus:outline-none focus:border-sage transition-colors">
                <option value="male" selected>Laki-laki</option>
                <option value="female">Perempuan</option>
              </select>
              <span class="pointer-events-none absolute right-3.5 top-1/2 -translate-y-1/2 text-linen/70 text-xs">▼</span>
            </div>
          </div>

          <!-- Usia (tahun) -->
          <div>
            <label for="calc-age" class="block text-xs font-bold text-linen/95 mb-1.5">Usia (tahun)</label>
            <input type="number" id="calc-age" value="28" min="15" max="85" oninput="calculateNutrition()" class="w-full p-3.5 rounded-xl border border-white/15 bg-[#3B2F2C] text-linen font-mono font-semibold text-sm focus:outline-none focus:border-sage transition-colors" />
          </div>

          <!-- Tinggi (cm) -->
          <div>
            <label for="calc-height" class="block text-xs font-bold text-linen/95 mb-1.5">Tinggi (cm)</label>
            <input type="number" id="calc-height" value="165" min="130" max="220" oninput="calculateNutrition()" class="w-full p-3.5 rounded-xl border border-white/15 bg-[#3B2F2C] text-linen font-mono font-semibold text-sm focus:outline-none focus:border-sage transition-colors" />
          </div>

          <!-- Berat (kg) -->
          <div>
            <label for="calc-weight" class="block text-xs font-bold text-linen/95 mb-1.5">Berat (kg)</label>
            <input type="number" id="calc-weight" value="65" min="35" max="180" oninput="calculateNutrition()" class="w-full p-3.5 rounded-xl border border-white/15 bg-[#3B2F2C] text-linen font-mono font-semibold text-sm focus:outline-none focus:border-sage transition-colors" />
          </div>

          <!-- Tingkat aktivitas -->
          <div>
            <label for="calc-activity" class="block text-xs font-bold text-linen/95 mb-1.5">Tingkat aktivitas</label>
            <div class="relative">
              <select id="calc-activity" onchange="calculateNutrition()" class="w-full appearance-none p-3.5 pr-10 rounded-xl border border-white/15 bg-[#3B2F2C] text-linen font-medium text-sm focus:outline-none focus:border-sage transition-colors">
                <option value="1.2">Sangat Jarang (Minim olahraga)</option>
                <option value="1.375">Ringan (1-2x/minggu)</option>
                <option value="1.55" selected>Sedang (3-5x/minggu)</option>
                <option value="1.725">Aktif (6-7x/minggu)</option>
                <option value="1.9">Atlet (Latihan intensif harian)</option>
              </select>
              <span class="pointer-events-none absolute right-3.5 top-1/2 -translate-y-1/2 text-linen/70 text-xs">▼</span>
            </div>
          </div>

          <!-- Tujuan (5 Pill Buttons) -->
          <div class="pt-1">
            <label class="block text-xs font-bold text-linen/95 mb-2.5">Tujuan</label>
            <div class="flex flex-wrap gap-2">
              <button type="button" onclick="selectFitnessGoal('weight_management')" data-goal="weight_management" class="goal-card px-4 py-2 rounded-full border-2 border-sage bg-transparent text-linen hover:bg-sage/25 font-bold text-xs transition-all">
                Weight Management
              </button>
              <button type="button" onclick="selectFitnessGoal('muscle_building')" data-goal="muscle_building" class="goal-card px-4 py-2 rounded-full border-2 border-sage bg-transparent text-linen hover:bg-sage/25 font-bold text-xs transition-all">
                Muscle Building
              </button>
              <button type="button" onclick="selectFitnessGoal('fat_loss')" data-goal="fat_loss" class="goal-card px-4 py-2 rounded-full border-2 border-sage bg-sage text-linen font-bold text-xs shadow-sm transition-all">
                Fat Loss
              </button>
              <button type="button" onclick="selectFitnessGoal('weight_maintenance')" data-goal="weight_maintenance" class="goal-card px-4 py-2 rounded-full border-2 border-sage bg-transparent text-linen hover:bg-sage/25 font-bold text-xs transition-all">
                Weight Maintenance
              </button>
              <button type="button" onclick="selectFitnessGoal('general_fitness')" data-goal="general_fitness" class="goal-card px-4 py-2 rounded-full border-2 border-sage bg-transparent text-linen hover:bg-sage/25 font-bold text-xs transition-all">
                General Fitness
              </button>
            </div>
          </div>
        </div>

        <!-- Right Card: Donut Ring & Macro Distribution Bars (#493B38) -->
        <div class="lg:col-span-6 bg-[#493B38] rounded-3xl p-6 sm:p-8 border border-white/10 shadow-2xl flex flex-col justify-between relative overflow-hidden">
          <!-- Subtle Kinetic Orbit Accent -->
          <div class="absolute -right-14 -top-14 w-44 h-44 rounded-full border border-dashed border-sage/25 animate-orbit pointer-events-none"></div>

          <div class="space-y-6">
            <!-- Top Center 3-Segment SVG Donut Ring -->
            <div class="flex flex-col items-center justify-center pt-2">
              <div class="relative w-44 h-44 flex items-center justify-center">
                <svg class="w-full h-full -rotate-90 drop-shadow-md" viewBox="0 0 120 120">
                  <!-- Track -->
                  <circle cx="60" cy="60" r="46" fill="none" stroke="rgba(255,255,255,0.08)" stroke-width="14"/>
                  <!-- Segment 1: Protein (#647D68) -->
                  <circle id="donut-seg-protein" cx="60" cy="60" r="46" fill="none" stroke="#647D68" stroke-width="14" stroke-dasharray="101 289" stroke-dashoffset="0" class="transition-all duration-700"/>
                  <!-- Segment 2: Karbohidrat (#D9A7A0) -->
                  <circle id="donut-seg-carbs" cx="60" cy="60" r="46" fill="none" stroke="#D9A7A0" stroke-width="14" stroke-dasharray="101 289" stroke-dashoffset="-101" class="transition-all duration-700"/>
                  <!-- Segment 3: Lemak (#FAF4EC) -->
                  <circle id="donut-seg-fat" cx="60" cy="60" r="46" fill="none" stroke="#FAF4EC" stroke-width="14" stroke-dasharray="87 289" stroke-dashoffset="-202" class="transition-all duration-700"/>
                </svg>
                <div class="absolute inset-0 flex flex-col items-center justify-center text-center">
                  <span id="target-kcal-display" class="font-display font-extrabold text-3xl text-linen tracking-tight leading-none">1897</span>
                  <span class="text-[11px] font-bold text-linen/80 mt-1.5">kkal/hari</span>
                </div>
              </div>

              <p class="text-[11px] text-linen/75 text-center mt-3">
                *Estimasi (rumus Mifflin-St Jeor), bukan diagnosis medis. Konsultasikan dengan ahli gizi.
              </p>
            </div>

            <!-- 3 Horizontal Macro Progress Bars -->
            <div class="space-y-4 pt-1">
              <!-- Protein -->
              <div>
                <div class="flex items-center justify-between text-xs sm:text-sm font-bold text-linen mb-1.5">
                  <span>Protein <strong id="macro-protein-g" class="font-extrabold text-white ml-1">166 g</strong></span>
                  <span id="macro-protein-pct" class="text-[11px] font-mono text-sage">35%</span>
                </div>
                <div class="w-full h-2.5 rounded-full bg-[#362B28] overflow-hidden">
                  <div id="bar-protein" style="width: 35%" class="h-full bg-sage rounded-full transition-all duration-500"></div>
                </div>
              </div>

              <!-- Karbohidrat -->
              <div>
                <div class="flex items-center justify-between text-xs sm:text-sm font-bold text-linen mb-1.5">
                  <span>Karbohidrat <strong id="macro-carbs-g" class="font-extrabold text-white ml-1">166 g</strong></span>
                  <span id="macro-carbs-pct" class="text-[11px] font-mono text-blush">35%</span>
                </div>
                <div class="w-full h-2.5 rounded-full bg-[#362B28] overflow-hidden">
                  <div id="bar-carbs" style="width: 35%" class="h-full bg-blush rounded-full transition-all duration-500"></div>
                </div>
              </div>

              <!-- Lemak -->
              <div>
                <div class="flex items-center justify-between text-xs sm:text-sm font-bold text-linen mb-1.5">
                  <span>Lemak <strong id="macro-fat-g" class="font-extrabold text-white ml-1">63 g</strong></span>
                  <span id="macro-fat-pct" class="text-[11px] font-mono text-linen/80">30%</span>
                </div>
                <div class="w-full h-2.5 rounded-full bg-[#362B28] overflow-hidden">
                  <div id="bar-fat" style="width: 30%" class="h-full bg-linen rounded-full transition-all duration-500"></div>
                </div>
              </div>
            </div>

            <!-- Dynamic Recommendation Line -->
            <p id="recommended-plan-title" class="text-xs sm:text-sm text-linen/90 leading-relaxed pt-1">
              Rekomendasi: program <strong class="text-white">High Protein</strong> sekitar <strong class="text-white">632 kkal</strong> per makan.
            </p>
          </div>

          <!-- Quick Action Buttons -->
          <div class="mt-6 pt-4 border-t border-white/10 flex flex-col sm:flex-row items-center justify-between gap-3">
            <span id="calc-bmr-tdee-label" class="font-mono text-[11px] text-peach/80">BMR: 1,546 kkal • TDEE: 2,397 kkal</span>
            <div class="flex items-center gap-2 w-full sm:w-auto">
              <button type="button" onclick="applyTargetToBuilder()" class="flex-1 sm:flex-initial bg-[#3B2F2C] hover:bg-white/15 text-linen border border-white/15 font-bold text-xs px-3.5 py-2.5 rounded-xl transition-colors">
                Ke Meal Builder
              </button>
              <a href="#subscription-section" class="btn-shimmer flex-1 sm:flex-initial text-center bg-sage hover:bg-sage-dark text-white font-bold text-xs px-4 py-2.5 rounded-xl transition-colors">
                Pilih Paket →
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ==================== 5. DIET PROGRAM CATEGORIES (5 PROGRAMS) ==================== -->
  <section id="programs-section" class="py-16 lg:py-22 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto reveal-on-scroll">
    <div class="text-center max-w-3xl mx-auto mb-10">
      <span class="inline-block bg-blush/35 text-espresso font-extrabold text-xs uppercase tracking-widest px-4 py-1.5 rounded-full mb-3">5 Kategori Program Spesifik</span>
      <h2 class="font-display font-extrabold text-3xl sm:text-4xl text-espresso">Kurasi Program Diet Sesuai Metabolisme & Gaya Hidup</h2>
    </div>

    <div class="flex flex-wrap justify-center gap-2.5 mb-8">
      <button type="button" onclick="selectDietProgram('High Protein')" data-prog="High Protein" class="prog-tab px-5 py-2.5 rounded-full font-bold text-xs sm:text-sm border-2 border-espresso bg-espresso text-linen shadow-[0_3px_0_0_#647D68] transition-all">High Protein</button>
      <button type="button" onclick="selectDietProgram('Low Calorie')" data-prog="Low Calorie" class="prog-tab px-5 py-2.5 rounded-full font-bold text-xs sm:text-sm border-2 border-espresso bg-white text-espresso hover:bg-peach transition-all">Low Calorie</button>
      <button type="button" onclick="selectDietProgram('Balanced Diet')" data-prog="Balanced Diet" class="prog-tab px-5 py-2.5 rounded-full font-bold text-xs sm:text-sm border-2 border-espresso bg-white text-espresso hover:bg-peach transition-all">Balanced Diet</button>
      <button type="button" onclick="selectDietProgram('Low Carb')" data-prog="Low Carb" class="prog-tab px-5 py-2.5 rounded-full font-bold text-xs sm:text-sm border-2 border-espresso bg-white text-espresso hover:bg-peach transition-all">Low Carb</button>
      <button type="button" onclick="selectDietProgram('Plant-Based')" data-prog="Plant-Based" class="prog-tab px-5 py-2.5 rounded-full font-bold text-xs sm:text-sm border-2 border-espresso bg-white text-espresso hover:bg-peach transition-all">Plant-Based</button>
    </div>

    <div class="bg-white rounded-3xl border-2 border-espresso shadow-lg overflow-hidden grid lg:grid-cols-12">
      <div class="lg:col-span-5 relative min-h-[260px] sm:min-h-[320px]">
        <img id="prog-img" src="https://images.unsplash.com/photo-1532550907401-a500c9a57435?auto=format&fit=crop&w=900&q=85" onerror="this.src='https://placehold.co/800x600/647D68/FAF4EC?text=High+Protein+Meal'" alt="Program Diet BlushBowl" class="w-full h-full object-cover" />
        <div id="prog-kcal-range" class="absolute top-4 left-4 bg-espresso/90 text-linen font-mono text-xs font-bold px-3.5 py-1.5 rounded-full border border-blush">
          420 – 550 kcal / porsi
        </div>
      </div>
      <div class="lg:col-span-7 p-6 sm:p-9 flex flex-col justify-between space-y-5">
        <div>
          <div class="flex flex-wrap items-center gap-2 mb-3">
            <span id="prog-badge" class="bg-sage text-white text-xs font-extrabold px-3 py-1 rounded-full">Paling Populer</span>
            <span id="prog-macro-ratio" class="bg-peach text-espresso text-xs font-bold px-3 py-1 rounded-full">Rasio: 42% Protein • 33% Karbo • 25% Lemak</span>
          </div>
          <h3 id="prog-title" class="font-display font-extrabold text-2xl sm:text-3xl text-espresso mb-2.5">High Protein Muscle & Lean Sculpt</h3>
          <p id="prog-desc" class="text-espresso-soft text-sm leading-relaxed mb-4">
            Diformulasikan dengan 38g–48g protein berkualitas tinggi per kotak dari dada ayam organik, salmon Norwegia, dan tenderloin sapi rendah lemak untuk menjaga massa otot dan rasa kenyang lebih lama.
          </p>
          <div class="grid sm:grid-cols-2 gap-2.5" id="prog-highlights">
            <div class="flex items-center gap-2 bg-linen p-3 rounded-xl border border-espresso/10 text-xs font-bold text-espresso">
              <span class="text-sage">✓</span> Ideal untuk gym-goers & fat loss aktif
            </div>
            <div class="flex items-center gap-2 bg-linen p-3 rounded-xl border border-espresso/10 text-xs font-bold text-espresso">
              <span class="text-sage">✓</span> Bebas gorengan & saus tinggi gula
            </div>
          </div>
        </div>
        <div class="flex flex-wrap items-center justify-between gap-4 pt-4 border-t border-espresso/10">
          <div>
            <span class="text-xs text-espresso-soft block">Mulai dari</span>
            <span id="prog-price" class="font-mono font-bold text-2xl text-espresso">Rp 49.000 <span class="text-xs font-sans font-normal text-espresso-soft">/ box</span></span>
          </div>
          <button type="button" onclick="filterCatalogByProgram()" class="btn-shimmer bg-sage hover:bg-sage-dark text-white font-bold px-6 py-3 rounded-2xl border-2 border-espresso shadow-[0_3px_0_0_#493B38] text-xs sm:text-sm">
            Lihat Semua Menu Program Ini →
          </button>
        </div>
      </div>
    </div>
  </section>

  <!-- ==================== 6. CALORIE-BASED MEAL CATALOG, MACRO FILTER & PORTION COMPARISON ==================== -->
  <section id="catalog-section" class="py-16 lg:py-24 bg-white border-y-2 border-espresso/10 px-4 sm:px-6 lg:px-8 reveal-on-scroll">
    <div class="max-w-7xl mx-auto">
      <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-5 mb-8">
        <div>
          <span class="inline-block bg-sage-light text-sage-dark font-extrabold text-xs uppercase tracking-widest px-4 py-1.5 rounded-full mb-3">Katalog Menu Terkalibrasi</span>
          <h2 class="font-display font-extrabold text-3xl sm:text-4xl text-espresso">Eksplor Menu Berdasarkan Kalori, Makro & Alergen</h2>
        </div>

        <!-- Portion Size Comparison Switcher -->
        <div class="bg-peach/55 p-2.5 rounded-2xl border-2 border-espresso flex flex-wrap items-center gap-1.5">
          <span class="text-xs font-extrabold uppercase text-espresso px-2">Ukuran Porsi:</span>
          <button type="button" onclick="setPortionMultiplier(1.0, 'Regular')" id="portion-btn-Regular" class="portion-btn bg-espresso text-linen text-xs font-bold px-3 py-1.5 rounded-xl">Regular (1.0x)</button>
          <button type="button" onclick="setPortionMultiplier(1.15, 'Fit')" id="portion-btn-Fit" class="portion-btn bg-white text-espresso text-xs font-bold px-3 py-1.5 rounded-xl border border-espresso/20">Fit+ (1.15x)</button>
          <button type="button" onclick="setPortionMultiplier(1.35, 'Athlete')" id="portion-btn-Athlete" class="portion-btn bg-white text-espresso text-xs font-bold px-3 py-1.5 rounded-xl border border-espresso/20">Athlete (1.35x)</button>
        </div>
      </div>

      <!-- Filter Bar -->
      <div class="bg-linen p-4 sm:p-5 rounded-3xl border-2 border-espresso/15 mb-8 grid sm:grid-cols-2 lg:grid-cols-4 gap-3.5">
        <div>
          <label class="block text-[11px] font-extrabold uppercase text-espresso-soft mb-1">Rentang Kalori</label>
          <select id="filter-calorie" onchange="renderMealCatalog()" class="w-full p-2.5 rounded-xl border border-espresso/25 bg-white text-xs font-bold text-espresso">
            <option value="all">Semua Kalori (195–650 kcal)</option>
            <option value="under400">&lt; 400 kcal (Light Deficit)</option>
            <option value="400to500">400 – 500 kcal (Balanced Fit)</option>
            <option value="over500">&gt; 500 kcal (High Energy)</option>
          </select>
        </div>
        <div>
          <label class="block text-[11px] font-extrabold uppercase text-espresso-soft mb-1">Kategori Diet</label>
          <select id="filter-program" onchange="renderMealCatalog()" class="w-full p-2.5 rounded-xl border border-espresso/25 bg-white text-xs font-bold text-espresso">
            <option value="all">Semua Program Diet</option>
            <option value="High Protein">High Protein</option>
            <option value="Low Calorie">Low Calorie</option>
            <option value="Balanced Diet">Balanced Diet</option>
            <option value="Low Carb">Low Carb</option>
            <option value="Plant-Based">Plant-Based</option>
          </select>
        </div>
        <div>
          <label class="block text-[11px] font-extrabold uppercase text-espresso-soft mb-1">Fokus Makro</label>
          <select id="filter-macro" onchange="renderMealCatalog()" class="w-full p-2.5 rounded-xl border border-espresso/25 bg-white text-xs font-bold text-espresso">
            <option value="all">Semua Profil Makro</option>
            <option value="high-protein">Tinggi Protein (&ge; 35g)</option>
            <option value="low-carb">Rendah Karbo (&le; 22g)</option>
            <option value="low-fat">Rendah Lemak (&le; 10g)</option>
          </select>
        </div>
        <div>
          <label class="block text-[11px] font-extrabold uppercase text-espresso-soft mb-1">Pantangan & Alergen</label>
          <select id="filter-restriction" onchange="renderMealCatalog()" class="w-full p-2.5 rounded-xl border border-espresso/25 bg-white text-xs font-bold text-espresso">
            <option value="all">Semua (100% Halal)</option>
            <option value="Gluten-Free">Gluten-Free</option>
            <option value="Dairy-Free">Tanpa Dairy (Dairy-Free)</option>
            <option value="Nut-Free">Bebas Kacang (Nut-Free)</option>
            <option value="Seafood-Free">Tanpa Seafood</option>
          </select>
        </div>
      </div>

      <!-- Meal Cards Grid -->
      <div id="meal-catalog-grid" class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6"></div>
    </div>
  </section>

  <!-- ==================== 7. DAILY MEAL COMBINATION BUILDER & WEEKLY CALORIE DISTRIBUTION ==================== -->
  <section id="builder-section" class="py-16 lg:py-24 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto reveal-on-scroll">
    <div class="text-center max-w-3xl mx-auto mb-10">
      <span class="inline-block bg-peach text-espresso font-extrabold text-xs uppercase tracking-widest px-4 py-1.5 rounded-full mb-3">Custom Meal Plan Builder</span>
      <h2 class="font-display font-extrabold text-3xl sm:text-4xl text-espresso">Alokasi Makan Harian & Distribusi Kalori Mingguan</h2>
    </div>

    <div class="grid lg:grid-cols-12 gap-8 items-start">
      <!-- 4 Meal Slots -->
      <div class="lg:col-span-7 space-y-3.5">
        <div class="bg-white p-5 rounded-3xl border-2 border-espresso shadow-sm">
          <div class="flex items-center justify-between mb-2">
            <span class="font-display font-bold text-base text-espresso">🌅 Sarapan (Breakfast)</span>
            <span class="text-[11px] font-bold text-sage bg-sage-light px-2.5 py-0.5 rounded-full">~25% Target</span>
          </div>
          <select id="slot-breakfast" onchange="updateDailyBuilder()" class="w-full p-3 rounded-2xl border-2 border-espresso/20 bg-linen font-bold text-xs sm:text-sm text-espresso"></select>
        </div>

        <div class="bg-white p-5 rounded-3xl border-2 border-espresso shadow-sm">
          <div class="flex items-center justify-between mb-2">
            <span class="font-display font-bold text-base text-espresso">☀️ Makan Siang (Lunch)</span>
            <span class="text-[11px] font-bold text-sage bg-sage-light px-2.5 py-0.5 rounded-full">~35% Target</span>
          </div>
          <select id="slot-lunch" onchange="updateDailyBuilder()" class="w-full p-3 rounded-2xl border-2 border-espresso/20 bg-linen font-bold text-xs sm:text-sm text-espresso"></select>
        </div>

        <div class="bg-white p-5 rounded-3xl border-2 border-espresso shadow-sm">
          <div class="flex items-center justify-between mb-2">
            <span class="font-display font-bold text-base text-espresso">🌙 Makan Malam (Dinner)</span>
            <span class="text-[11px] font-bold text-sage bg-sage-light px-2.5 py-0.5 rounded-full">~30% Target</span>
          </div>
          <select id="slot-dinner" onchange="updateDailyBuilder()" class="w-full p-3 rounded-2xl border-2 border-espresso/20 bg-linen font-bold text-xs sm:text-sm text-espresso"></select>
        </div>

        <div class="bg-white p-5 rounded-3xl border-2 border-espresso shadow-sm">
          <div class="flex items-center justify-between mb-2">
            <span class="font-display font-bold text-base text-espresso">🍓 Fit Snack & Recovery</span>
            <span class="text-[11px] font-bold text-sage bg-sage-light px-2.5 py-0.5 rounded-full">~10% Target</span>
          </div>
          <select id="slot-snack" onchange="updateDailyBuilder()" class="w-full p-3 rounded-2xl border-2 border-espresso/20 bg-linen font-bold text-xs sm:text-sm text-espresso"></select>
        </div>
      </div>

      <!-- Daily Tally & 7-Day Weekly Distribution -->
      <div class="lg:col-span-5 space-y-6">
        <div class="bg-peach/50 rounded-3xl p-6 border-2 border-espresso shadow-md">
          <h3 class="font-display font-bold text-lg text-espresso mb-3">Total Nutrisi Kombinasi Harian</h3>
          <div class="flex items-end justify-between mb-2">
            <div>
              <span id="builder-total-kcal" class="font-mono font-bold text-3xl text-espresso">1,295</span>
              <span class="text-xs font-bold text-espresso-soft"> / <span id="builder-goal-kcal">1,415</span> kcal</span>
            </div>
            <span id="builder-status-badge" class="bg-sage text-white text-xs font-extrabold px-3 py-1 rounded-full">Presisi Optimal ✓</span>
          </div>
          <div class="w-full h-3.5 bg-white rounded-full border border-espresso/20 overflow-hidden mb-4">
            <div id="builder-progress-bar" style="width: 92%" class="h-full bg-sage transition-all duration-500"></div>
          </div>
          <div class="grid grid-cols-3 gap-2.5 text-center mb-4">
            <div class="bg-white p-2.5 rounded-2xl border border-espresso/15">
              <span class="text-[11px] font-bold text-espresso-soft block">Protein</span>
              <span id="builder-total-p" class="font-mono font-bold text-base text-sage">114g</span>
            </div>
            <div class="bg-white p-2.5 rounded-2xl border border-espresso/15">
              <span class="text-[11px] font-bold text-espresso-soft block">Karbo</span>
              <span id="builder-total-c" class="font-mono font-bold text-base text-espresso">91g</span>
            </div>
            <div class="bg-white p-2.5 rounded-2xl border border-espresso/15">
              <span class="text-[11px] font-bold text-espresso-soft block">Lemak</span>
              <span id="builder-total-f" class="font-mono font-bold text-base text-blush-dark">48g</span>
            </div>
          </div>
          <button type="button" onclick="saveCustomBoxToCheckout()" class="btn-shimmer w-full bg-sage hover:bg-sage-dark text-white font-extrabold py-3.5 rounded-2xl border-2 border-espresso shadow-[0_3px_0_0_#493B38] text-xs sm:text-sm">
            Simpan Custom Meal Box & Checkout
          </button>
        </div>

        <!-- 7-Day Weekly Calorie Distribution Preview -->
        <div class="bg-white rounded-3xl p-6 border-2 border-espresso shadow-sm">
          <div class="flex items-center justify-between gap-2 mb-3">
            <h4 class="font-display font-bold text-base text-espresso">Distribusi Kalori 7 Hari</h4>
            <select id="weekly-mode" onchange="renderWeeklyBars()" class="text-xs font-bold bg-linen border border-espresso/20 rounded-xl px-2.5 py-1 text-espresso">
              <option value="steady">Konsisten Harian</option>
              <option value="cycling">Calorie Cycling (Sabtu Refeed)</option>
            </select>
          </div>
          <div id="weekly-bars-container" class="grid grid-cols-7 gap-2 items-end h-32 pt-3"></div>
        </div>
      </div>
    </div>
  </section>

  <!-- ==================== 8. WEEKLY DIET SUBSCRIPTION PACKAGES & COST CALCULATOR ==================== -->
  <section id="subscription-section" class="py-16 lg:py-24 bg-sage-light/60 border-y-2 border-espresso/10 px-4 sm:px-6 lg:px-8 reveal-on-scroll">
    <div class="max-w-7xl mx-auto">
      <div class="text-center max-w-3xl mx-auto mb-10">
        <span class="inline-block bg-sage text-white font-extrabold text-xs uppercase tracking-widest px-4 py-1.5 rounded-full mb-3">Paket Langganan & Kalkulator Biaya</span>
        <h2 class="font-display font-extrabold text-3xl sm:text-4xl text-espresso">Atur Durasi, Frekuensi & Jadwal Pengiriman</h2>
      </div>

      <div class="grid lg:grid-cols-12 gap-8">
        <div class="lg:col-span-7 bg-white rounded-3xl p-6 sm:p-8 border-2 border-espresso shadow-md space-y-5">
          <div>
            <label class="block text-xs font-extrabold uppercase text-espresso mb-2">1. Durasi Langganan</label>
            <div class="grid grid-cols-3 gap-3">
              <button type="button" onclick="setSubOption('weeks', 1)" id="sub-week-1" class="sub-week-btn p-3.5 rounded-2xl border-2 border-espresso bg-white font-bold text-center">
                <span class="block font-display text-base">1 Minggu</span>
                <span class="text-[11px] text-espresso-soft">5 Hari Kerja</span>
              </button>
              <button type="button" onclick="setSubOption('weeks', 2)" id="sub-week-2" class="sub-week-btn p-3.5 rounded-2xl border-2 border-espresso bg-sage text-white font-bold text-center shadow-[0_3px_0_0_#493B38]">
                <span class="block font-display text-base">2 Minggu</span>
                <span class="text-[11px] text-peach">Hemat 10% 🔥</span>
              </button>
              <button type="button" onclick="setSubOption('weeks', 4)" id="sub-week-4" class="sub-week-btn p-3.5 rounded-2xl border-2 border-espresso bg-white font-bold text-center">
                <span class="block font-display text-base">4 Minggu</span>
                <span class="text-[11px] text-sage font-extrabold">Hemat 18% ⭐</span>
              </button>
            </div>
          </div>

          <div>
            <label class="block text-xs font-extrabold uppercase text-espresso mb-2">2. Frekuensi Makan Harian</label>
            <div class="grid sm:grid-cols-3 gap-2.5">
              <button type="button" onclick="setSubOption('freq', 1)" id="sub-freq-1" class="sub-freq-btn p-3.5 rounded-2xl border-2 border-espresso bg-white text-espresso text-left">
                <span class="font-bold text-xs block">Lunch Only (1x)</span>
                <span class="text-[11px] text-espresso-soft">~450 kcal/hari</span>
              </button>
              <button type="button" onclick="setSubOption('freq', 2)" id="sub-freq-2" class="sub-freq-btn p-3.5 rounded-2xl border-2 border-espresso bg-sage text-white text-left shadow-[0_3px_0_0_#493B38]">
                <span class="font-bold text-xs block">Lunch + Dinner (2x)</span>
                <span class="text-[11px] opacity-90">~920 kcal/hari</span>
              </button>
              <button type="button" onclick="setSubOption('freq', 3)" id="sub-freq-3" class="sub-freq-btn p-3.5 rounded-2xl border-2 border-espresso bg-white text-espresso text-left">
                <span class="font-bold text-xs block">Full Day (3x + Snack)</span>
                <span class="text-[11px] text-espresso-soft">~1,450 kcal/hari</span>
              </button>
            </div>
          </div>

          <div class="grid sm:grid-cols-2 gap-4">
            <div>
              <label class="block text-xs font-extrabold uppercase text-espresso mb-1.5">3. Tier Kalori Paket</label>
              <select id="sub-calorie-tier" onchange="calculateSubscriptionCost()" class="w-full p-3 rounded-2xl border-2 border-espresso bg-linen font-bold text-xs text-espresso">
                <option value="1.0">Light Deficit (350–420 kcal/box)</option>
                <option value="1.12" selected>Active Fit (430–520 kcal/box)</option>
                <option value="1.25">Athlete High-Protein (550–650 kcal/box)</option>
              </select>
            </div>
            <div>
              <label class="block text-xs font-extrabold uppercase text-espresso mb-1.5">4. Jadwal Pengiriman</label>
              <select id="sub-delivery-slot" onchange="calculateSubscriptionCost()" class="w-full p-3 rounded-2xl border-2 border-espresso bg-linen font-bold text-xs text-espresso">
                <option value="Batch Pagi (06.30 - 08.30 WIB)">Batch Pagi (06.30 - 08.30 WIB)</option>
                <option value="Batch Siang (10.30 - 12.00 WIB)">Batch Siang (10.30 - 12.00 WIB)</option>
                <option value="2x Kirim Hangat (Pagi & Sore)">2x Kirim Hangat (Pagi & Sore)</option>
              </select>
            </div>
          </div>

          <div class="bg-peach/45 p-4 rounded-2xl border border-espresso/15 flex items-start gap-3">
            <span class="text-xl">🔄</span>
            <div class="text-xs text-espresso">
              <p class="font-bold">Meal Plan Adjustment & Menu Replacement Guarantee</p>
              <p class="text-espresso-soft mt-0.5">Bebas tukar menu besok atau jeda pengiriman kapan saja hingga <strong>H-1 pukul 17.00 WIB</strong> tanpa kehilangan kuota box.</p>
            </div>
          </div>
        </div>

        <!-- Cost Output Card -->
        <div class="lg:col-span-5 bg-espresso text-linen rounded-3xl p-6 sm:p-8 border-2 border-espresso shadow-xl flex flex-col justify-between">
          <div class="space-y-4">
            <div class="flex items-center justify-between">
              <span class="bg-blush text-espresso text-xs font-extrabold px-3 py-1 rounded-full uppercase">Estimasi Biaya</span>
              <span id="sub-total-boxes" class="font-mono text-xs font-bold text-peach">20 Box Makanan</span>
            </div>
            <div>
              <p class="text-xs text-peach/80">Total Investasi Nutrisi</p>
              <div class="flex items-baseline gap-2.5">
                <span id="sub-final-price" class="font-mono font-bold text-3xl sm:text-4xl text-white">Rp 985.000</span>
                <span id="sub-original-price" class="font-mono text-sm line-through text-blush/80">Rp 1.095.000</span>
              </div>
              <p id="sub-per-box-price" class="text-xs text-sage-light font-semibold mt-1">Setara Rp 49.250 / box • Gratis Thermal Bag</p>
            </div>
            <ul class="space-y-2 pt-4 border-t border-white/15 text-xs text-peach">
              <li>✔ Gratis Ongkir Kurir Berpendingin (Jabodetabek & Bandung)</li>
              <li>✔ Label Barcode Kalori & Makro BPOM di setiap kemasan</li>
              <li>✔ 1x Sesi Evaluasi Progres bersama Ahli Gizi S.Gz</li>
            </ul>
          </div>
          <button type="button" onclick="openCheckoutDrawer()" class="btn-shimmer mt-6 w-full bg-blush hover:bg-peach text-espresso font-extrabold py-4 rounded-2xl border-2 border-white text-sm">
            Checkout Paket Langganan Ini →
          </button>
        </div>
      </div>
    </div>
  </section>

  <!-- ==================== 9. DIET PROGRESS JOURNAL & SUBSCRIPTION MANAGEMENT DASHBOARD ==================== -->
  <section id="dashboard-section" class="py-16 lg:py-22 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto reveal-on-scroll">
    <div class="mb-8">
      <span class="inline-block bg-peach text-espresso font-extrabold text-xs uppercase tracking-widest px-4 py-1.5 rounded-full mb-3">Member Dashboard Preview</span>
      <h2 class="font-display font-extrabold text-3xl sm:text-4xl text-espresso">Jurnal Progres Diet & Manajemen Langganan</h2>
    </div>

    <div class="bg-white rounded-3xl border-2 border-espresso shadow-lg p-6 sm:p-8 grid lg:grid-cols-12 gap-8">
      <div class="lg:col-span-7 space-y-5">
        <div class="flex flex-wrap items-center justify-between gap-2 border-b border-espresso/10 pb-3">
          <div>
            <p class="text-xs font-bold text-espresso-soft">Nadia Putri • Minggu ke-4 Program Fat Loss</p>
            <h3 class="font-display font-bold text-lg text-espresso">Ringkasan Nutrisi & Tren Komposisi Tubuh</h3>
          </div>
          <span class="bg-sage-light text-sage-dark text-xs font-extrabold px-3 py-1 rounded-full">🔥 Streak 19 Hari</span>
        </div>

        <div class="grid grid-cols-3 gap-3">
          <div class="bg-linen p-3.5 rounded-2xl border border-espresso/15">
            <span class="text-[11px] font-bold text-espresso-soft block">Berat Badan</span>
            <span class="font-mono font-bold text-xl text-sage">-2.8 kg</span>
            <span class="text-[10px] text-espresso-soft block">64.0 → 61.2 kg</span>
          </div>
          <div class="bg-linen p-3.5 rounded-2xl border border-espresso/15">
            <span class="text-[11px] font-bold text-espresso-soft block">Kepatuhan Makro</span>
            <span class="font-mono font-bold text-xl text-espresso">94%</span>
            <span class="text-[10px] text-sage font-bold block">~1,430 kcal/hari</span>
          </div>
          <div class="bg-linen p-3.5 rounded-2xl border border-espresso/15">
            <span class="text-[11px] font-bold text-espresso-soft block">Rata-Rata Protein</span>
            <span class="font-mono font-bold text-xl text-blush-dark">132g/hr</span>
            <span class="text-[10px] text-espresso-soft block">Massa otot terjaga</span>
          </div>
        </div>

        <div class="bg-linen/70 p-4 rounded-2xl border border-espresso/15">
          <div class="flex justify-between text-xs font-bold text-espresso mb-1.5">
            <span>Grafik Progres Penurunan Lemak (4 Minggu)</span>
            <span class="text-sage">Target: 59.0 kg</span>
          </div>
          <svg viewBox="0 0 420 100" class="w-full h-24 overflow-visible">
            <line x1="20" y1="82" x2="400" y2="82" stroke="#493B38" stroke-opacity="0.15" stroke-width="1"/>
            <path d="M 30 18 Q 115 34, 155 44 T 280 64 T 390 76" fill="none" stroke="#647D68" stroke-width="4" stroke-linecap="round"/>
            <circle cx="30" cy="18" r="5" fill="#493B38"/>
            <circle cx="155" cy="44" r="5" fill="#647D68"/>
            <circle cx="280" cy="64" r="5" fill="#647D68"/>
            <circle cx="390" cy="76" r="6" fill="#D9A7A0" stroke="#493B38" stroke-width="2"/>
            <text x="20" y="96" font-size="10" fill="#6D5A56" font-weight="bold">Mgg 1</text>
            <text x="145" y="96" font-size="10" fill="#6D5A56" font-weight="bold">Mgg 2</text>
            <text x="270" y="96" font-size="10" fill="#6D5A56" font-weight="bold">Mgg 3</text>
            <text x="375" y="96" font-size="10" fill="#493B38" font-weight="bold">Mgg 4</text>
          </svg>
        </div>
      </div>

      <!-- Interactive Subscription Controls -->
      <div class="lg:col-span-5 bg-peach/45 rounded-2xl p-5 border-2 border-espresso/20 flex flex-col justify-between space-y-4">
        <div>
          <span class="text-xs font-extrabold uppercase text-sage-dark">Kontrol Pengiriman Besok</span>
          <div class="mt-3 bg-white p-4 rounded-2xl border border-espresso/15 space-y-3">
            <div class="flex items-center justify-between gap-2">
              <div>
                <span class="text-[10px] font-bold text-espresso-soft block">Menu Makan Siang Besok</span>
                <p id="dash-tomorrow-meal" class="font-bold text-xs text-espresso">Sous-Vide Herb Chicken & Sweet Potato (410 kcal)</p>
              </div>
              <button type="button" onclick="swapTomorrowMealDemo()" class="shrink-0 bg-peach hover:bg-blush text-espresso font-bold text-xs px-3 py-1.5 rounded-xl border border-espresso/20">🔄 Tukar</button>
            </div>
            <div class="flex items-center justify-between pt-2.5 border-t border-espresso/10">
              <div>
                <span class="text-[10px] font-bold text-espresso-soft block">Status Jadwal</span>
                <p id="dash-delivery-status" class="font-bold text-xs text-sage">● Terjadwal Aktif</p>
              </div>
              <button type="button" onclick="togglePauseDemo()" id="dash-pause-btn" class="bg-white hover:bg-linen text-espresso font-bold text-xs px-3 py-1.5 rounded-xl border border-espresso">⏸ Jeda 1 Hari</button>
            </div>
          </div>
        </div>

        <div class="bg-white p-4 rounded-2xl border border-espresso/15">
          <label class="text-xs font-bold text-espresso block mb-1.5">Catatan Jurnal Diet Hari Ini:</label>
          <div class="flex gap-2">
            <input type="text" value="Kenyang lebih lama, energi stabil saat workout!" class="w-full text-xs p-2.5 rounded-xl bg-linen border border-espresso/20 text-espresso" />
            <button type="button" onclick="showToast('Catatan jurnal harian berhasil disimpan!')" class="bg-sage text-white font-bold text-xs px-3.5 rounded-xl">Simpan</button>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ==================== 10. NUTRITIONIST SHOWCASE, CONSULTATION & EDUCATION CENTER ==================== -->
  <section id="nutritionist-section" class="py-16 lg:py-24 bg-white border-y-2 border-espresso/10 px-4 sm:px-6 lg:px-8 reveal-on-scroll">
    <div class="max-w-7xl mx-auto space-y-16">
      <!-- Dietitians + Booking -->
      <div>
        <div class="text-center max-w-3xl mx-auto mb-10">
          <span class="inline-block bg-sage-light text-sage-dark font-extrabold text-xs uppercase tracking-widest px-4 py-1.5 rounded-full mb-3">Tim Klinis Terdaftar</span>
          <h2 class="font-display font-extrabold text-3xl sm:text-4xl text-espresso">Konsultasi Langsung dengan Ahli Gizi (S.Gz, RD)</h2>
        </div>

        <div class="grid lg:grid-cols-12 gap-8 items-start">
          <div class="lg:col-span-7 grid sm:grid-cols-2 gap-5">
            <div class="bg-linen rounded-3xl p-6 border-2 border-espresso shadow-sm">
              <div class="flex items-center gap-3.5 mb-3">
                <img src="https://images.unsplash.com/photo-1594824476967-48c8b964273f?auto=format&fit=crop&w=400&q=80" onerror="this.src='https://placehold.co/200x200/D9A7A0/493B38?text=Clara+S.Gz'" alt="Clara Wijaya, S.Gz, RD" class="w-16 h-16 rounded-2xl object-cover border-2 border-espresso" />
                <div>
                  <span class="bg-sage text-white text-[10px] font-extrabold px-2.5 py-0.5 rounded-full">Clinical Dietitian</span>
                  <h3 class="font-display font-bold text-base text-espresso mt-1">Clara Wijaya, S.Gz, RD</h3>
                  <p class="text-[11px] text-espresso-soft">STR Aktif • 8 Thn Pengalaman</p>
                </div>
              </div>
              <p class="text-xs text-espresso-soft leading-relaxed">Spesialis manajemen berat badan berkelanjutan, resistensi insulin, dan nutrisi kesehatan wanita tanpa diet ekstrem.</p>
            </div>

            <div class="bg-linen rounded-3xl p-6 border-2 border-espresso shadow-sm">
              <div class="flex items-center gap-3.5 mb-3">
                <img src="https://images.unsplash.com/photo-1622253692010-333f2da6031d?auto=format&fit=crop&w=400&q=80" onerror="this.src='https://placehold.co/200x200/647D68/FAF4EC?text=Reza+M.Gizi'" alt="Reza Pratama, M.Gizi" class="w-16 h-16 rounded-2xl object-cover border-2 border-espresso" />
                <div>
                  <span class="bg-blush text-espresso text-[10px] font-extrabold px-2.5 py-0.5 rounded-full">Sports Nutritionist</span>
                  <h3 class="font-display font-bold text-base text-espresso mt-1">Reza Pratama, M.Gizi</h3>
                  <p class="text-[11px] text-espresso-soft">Certified ISSN • 6 Thn Pengalaman</p>
                </div>
              </div>
              <p class="text-xs text-espresso-soft leading-relaxed">Fokus pada <em>body recomposition</em>, hipertrofi otot, dan periodisasi karbohidrat untuk pelari maupun atlet.</p>
            </div>
          </div>

          <form onsubmit="submitConsultationBooking(event)" class="lg:col-span-5 bg-peach/45 rounded-3xl p-6 border-2 border-espresso space-y-3.5">
            <h3 class="font-display font-bold text-lg text-espresso">Reservasi Jadwal Konsultasi</h3>
            <input type="text" id="consult-name" required placeholder="Nama Lengkap Anda" class="w-full p-3 rounded-xl border border-espresso/25 bg-white text-xs text-espresso" />
            <div class="grid grid-cols-2 gap-2.5">
              <select id="consult-expert" class="w-full p-3 rounded-xl border border-espresso/25 bg-white text-xs font-bold text-espresso">
                <option>Clara Wijaya, S.Gz, RD</option>
                <option>Reza Pratama, M.Gizi</option>
              </select>
              <input type="date" id="consult-date" required class="w-full p-3 rounded-xl border border-espresso/25 bg-white text-xs font-bold text-espresso" />
            </div>
            <button type="submit" class="btn-shimmer w-full bg-sage hover:bg-sage-dark text-white font-extrabold py-3 rounded-xl border-2 border-espresso text-xs">
              Konfirmasi Jadwal Konsultasi (Gratis Member)
            </button>
          </form>
        </div>
      </div>

      <!-- Healthy Plate Portion Control Guide & Education Center -->
      <div class="grid lg:grid-cols-12 gap-8 items-center pt-6 border-t border-espresso/10">
        <div class="lg:col-span-6 bg-linen rounded-3xl p-6 sm:p-8 border-2 border-espresso">
          <span class="inline-block bg-blush/35 text-espresso font-extrabold text-xs uppercase px-3 py-1 rounded-full mb-2">Panduan Kontrol Porsi</span>
          <h3 class="font-display font-extrabold text-2xl text-espresso mb-2">Metode Piring Makro 50 / 25 / 25</h3>
          <p class="text-xs text-espresso-soft mb-5">Klik tiap bagian piring untuk melihat standar gramasi BlushBowl.</p>
          <div class="flex flex-col sm:flex-row items-center gap-5">
            <svg viewBox="0 0 220 220" class="w-44 h-44 shrink-0">
              <circle cx="110" cy="110" r="102" fill="#FAF4EC" stroke="#493B38" stroke-width="4"/>
              <path onclick="showPlateInfo('veggies')" d="M110,16 A94,94 0 0,0 110,204 Z" fill="#647D68" class="hover:opacity-85 transition-opacity cursor-pointer"/>
              <path onclick="showPlateInfo('protein')" d="M110,16 A94,94 0 0,1 204,110 L110,110 Z" fill="#D9A7A0" class="hover:opacity-85 transition-opacity cursor-pointer"/>
              <path onclick="showPlateInfo('carbs')" d="M204,110 A94,94 0 0,1 110,204 L110,110 Z" fill="#F1D8CE" class="hover:opacity-85 transition-opacity cursor-pointer"/>
              <line x1="110" y1="16" x2="110" y2="204" stroke="#493B38" stroke-width="3"/>
              <line x1="110" y1="110" x2="204" y2="110" stroke="#493B38" stroke-width="3"/>
              <text x="58" y="114" fill="#FAF4EC" font-size="12" font-weight="800" text-anchor="middle" pointer-events="none">50% Serat</text>
              <text x="152" y="75" fill="#493B38" font-size="11" font-weight="800" text-anchor="middle" pointer-events="none">25% Protein</text>
              <text x="152" y="152" fill="#493B38" font-size="11" font-weight="800" text-anchor="middle" pointer-events="none">25% Karbo</text>
            </svg>
            <div id="plate-info-box" class="bg-white p-4 rounded-2xl border border-espresso/15 flex-1">
              <span class="text-xs font-extrabold uppercase text-sage">50% Sayuran & Fitonutrien</span>
              <h4 class="font-display font-bold text-base text-espresso mt-1">Volume Tinggi, Kalori Rendah</h4>
              <p class="text-xs text-espresso-soft leading-relaxed mt-1">Brokoli, edamame, bayam baby, dan paprika memberikan volume kenyang fisik di lambung sekaligus memperlambat penyerapan glukosa.</p>
            </div>
          </div>
        </div>

        <div class="lg:col-span-6 space-y-3.5">
          <span class="inline-block bg-sage-light text-sage-dark font-extrabold text-xs uppercase px-3 py-1 rounded-full">Pusat Edukasi Gizi</span>
          <h3 class="font-display font-extrabold text-2xl text-espresso">Artikel Singkat Sains Nutrisi</h3>
          <div class="bg-linen p-4 rounded-2xl border border-espresso/15">
            <h4 class="font-bold text-sm text-espresso">1. Mengapa Defisit Kalori Terlalu Ekstrem Justru Gagal?</h4>
            <p class="text-xs text-espresso-soft mt-1">Memangkas kalori di bawah BMR memicu adaptasi metabolik dan kehilangan massa otot. BlushBowl menjaga defisit aman di 15–20% dari TDEE.</p>
          </div>
          <div class="bg-linen p-4 rounded-2xl border border-espresso/15">
            <h4 class="font-bold text-sm text-espresso">2. Thermic Effect of Food (TEF) pada Diet Tinggi Protein</h4>
            <p class="text-xs text-espresso-soft mt-1">Tubuh membakar 20–30% kalori protein hanya untuk mencernanya—jauh lebih tinggi dibanding karbohidrat olahan maupun lemak.</p>
          </div>
          <div class="bg-linen p-4 rounded-2xl border border-espresso/15">
            <h4 class="font-bold text-sm text-espresso">3. Panduan Penyimpanan Chiller & Pemanasan Microwave</h4>
            <p class="text-xs text-espresso-soft mt-1">Simpan kemasan di chiller 2–4°C dan panaskan selama 90 detik dengan tutup sedikit terbuka agar tekstur daging tetap lembut.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ==================== 11. CUSTOMER TRANSFORMATION STORIES & CORPORATE PACKAGES ==================== -->
  <section id="stories-section" class="py-16 lg:py-22 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto reveal-on-scroll space-y-16">
    <div>
      <div class="text-center max-w-3xl mx-auto mb-10">
        <span class="inline-block bg-peach text-espresso font-extrabold text-xs uppercase tracking-widest px-4 py-1.5 rounded-full mb-3">Cerita Klien Terverifikasi</span>
        <h2 class="font-display font-extrabold text-3xl sm:text-4xl text-espresso">Perjalanan Sehat yang Bertanggung Jawab</h2>
        <p class="text-[11px] text-espresso-soft mt-1.5">*Ditampilkan atas persetujuan tertulis klien. Hasil individu bergantung pada konsistensi pola makan, metabolisme, dan aktivitas fisik.</p>
      </div>

      <div class="grid md:grid-cols-3 gap-6">
        <div class="bg-white rounded-3xl p-6 border-2 border-espresso shadow-sm flex flex-col justify-between">
          <div>
            <div class="flex items-center gap-3 mb-3">
              <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=300&q=80" onerror="this.src='https://placehold.co/120x120/F1D8CE/493B38?text=Alya'" alt="Alya M." class="w-11 h-11 rounded-full object-cover border-2 border-sage" />
              <div>
                <h4 class="font-bold text-sm text-espresso">Alya Mahardika (29)</h4>
                <span class="text-[11px] font-bold text-sage">12 Minggu • Low Calorie Plan</span>
              </div>
            </div>
            <p class="text-xs text-espresso-soft italic leading-relaxed">"Dengan BlushBowl 1,400 kcal/hari, saya tidak lagi bingung menghitung kalori makan siang kantor. Lingkar pinggang turun 7 cm tanpa lemas."</p>
          </div>
          <div class="mt-4 pt-3 border-t border-espresso/10 flex justify-between text-xs font-extrabold text-espresso">
            <span>Progres: -6.4 kg</span>
            <span class="text-sage">✓ Consent Verified</span>
          </div>
        </div>

        <div class="bg-white rounded-3xl p-6 border-2 border-espresso shadow-sm flex flex-col justify-between">
          <div>
            <div class="flex items-center gap-3 mb-3">
              <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=300&q=80" onerror="this.src='https://placehold.co/120x120/647D68/FAF4EC?text=Dimas'" alt="Dimas K." class="w-11 h-11 rounded-full object-cover border-2 border-sage" />
              <div>
                <h4 class="font-bold text-sm text-espresso">Dimas Kusuma (34)</h4>
                <span class="text-[11px] font-bold text-sage">10 Minggu • High Protein Plan</span>
              </div>
            </div>
            <p class="text-xs text-espresso-soft italic leading-relaxed">"Target 150g protein harian tercapai konsisten. Menu Dori Sambal Matah dan Herb Chicken-nya enak banget—nggak terasa sedang defisit!"</p>
          </div>
          <div class="mt-4 pt-3 border-t border-espresso/10 flex justify-between text-xs font-extrabold text-espresso">
            <span>Body Fat: 23% → 17.5%</span>
            <span class="text-sage">✓ Consent Verified</span>
          </div>
        </div>

        <div class="bg-white rounded-3xl p-6 border-2 border-espresso shadow-sm flex flex-col justify-between">
          <div>
            <div class="flex items-center gap-3 mb-3">
              <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?auto=format&fit=crop&w=300&q=80" onerror="this.src='https://placehold.co/120x120/D9A7A0/493B38?text=Sinta'" alt="Sinta L." class="w-11 h-11 rounded-full object-cover border-2 border-sage" />
              <div>
                <h4 class="font-bold text-sm text-espresso">Sinta Larasati (31)</h4>
                <span class="text-[11px] font-bold text-sage">8 Minggu • Balanced Diet</span>
              </div>
            </div>
            <p class="text-xs text-espresso-soft italic leading-relaxed">"Nutrisi seimbang membantu energi harian saya tetap stabil dan hasil lab kolesterol membaik dalam dua bulan."</p>
          </div>
          <div class="mt-4 pt-3 border-t border-espresso/10 flex justify-between text-xs font-extrabold text-espresso">
            <span>Energi & Lab Membaik</span>
            <span class="text-sage">✓ Consent Verified</span>
          </div>
        </div>
      </div>
    </div>

    <!-- Corporate Wellness Banner -->
    <div id="corporate-section" class="bg-espresso text-linen rounded-3xl p-7 sm:p-10 border-2 border-espresso shadow-xl grid lg:grid-cols-12 gap-8 items-center">
      <div class="lg:col-span-7 space-y-3">
        <span class="inline-block bg-blush text-espresso font-extrabold text-xs uppercase px-3.5 py-1 rounded-full">Corporate Wellness B2B</span>
        <h3 class="font-display font-extrabold text-2xl sm:text-3xl text-white">Paket Makan Siang Sehat & Kebugaran Karyawan</h3>
        <p class="text-peach/90 text-xs sm:text-sm leading-relaxed">Tingkatkan fokus tim dengan katering kantor rendah indeks glikemik, lengkap dengan sesi <em>Nutrition Talk</em> dan tantangan kebugaran antardivisi.</p>
      </div>
      <div class="lg:col-span-5 bg-white text-espresso p-5 rounded-2xl border-2 border-blush space-y-3">
        <div class="flex justify-between text-xs font-bold">
          <span>Jumlah Karyawan: <strong id="corp-pax-label">30 Pax</strong></span>
          <span class="font-mono text-sage font-bold" id="corp-price-est">Rp 42.500 / box</span>
        </div>
        <input type="range" min="15" max="200" step="5" value="30" oninput="updateCorporateQuote(this.value)" class="w-full accent-sage" />
        <button type="button" onclick="showToast('Tim B2B BlushBowl siap mengirimkan proposal & sample box gratis ke kantor Anda!')" class="w-full bg-sage text-white font-extrabold py-2.5 rounded-xl border-2 border-espresso text-xs">
          Minta Proposal & Free Tasting Box
        </button>
      </div>
    </div>
  </section>

  <!-- ==================== 12. FAQ ACCORDION ==================== -->
  <section id="faq-section" class="py-14 px-4 sm:px-6 lg:px-8 max-w-4xl mx-auto reveal-on-scroll">
    <div class="text-center mb-8">
      <span class="inline-block bg-peach text-espresso font-extrabold text-xs uppercase tracking-widest px-4 py-1.5 rounded-full mb-2">FAQ</span>
      <h2 class="font-display font-extrabold text-2xl sm:text-3xl text-espresso">Pertanyaan yang Sering Diajukan</h2>
    </div>
    <div class="space-y-3">
      <details class="group bg-white rounded-2xl border-2 border-espresso/20 open:border-espresso p-4" open>
        <summary class="font-bold text-sm text-espresso flex items-center justify-between list-none">
          <span>Bagaimana akurasi perhitungan kalori dan makro di setiap menu?</span>
          <span class="text-sage font-extrabold text-lg group-open:rotate-45 transition-transform">+</span>
        </summary>
        <p class="text-xs text-espresso-soft mt-2.5 leading-relaxed">Seluruh resep ditimbang per bahan menggunakan timbangan digital presisi 0.1 gram di dapur pusat kami, dengan toleransi akurasi ±5 kcal per porsi.</p>
      </details>
      <details class="group bg-white rounded-2xl border-2 border-espresso/20 open:border-espresso p-4">
        <summary class="font-bold text-sm text-espresso flex items-center justify-between list-none">
          <span>Apakah semua menu Halal dan bebas pengawet?</span>
          <span class="text-sage font-extrabold text-lg group-open:rotate-45 transition-transform">+</span>
        </summary>
        <p class="text-xs text-espresso-soft mt-2.5 leading-relaxed">Ya, 100% bahan baku bersertifikat Halal, dimasak segar setiap subuh tanpa pengawet kimia maupun MSG tambahan.</p>
      </details>
      <details class="group bg-white rounded-2xl border-2 border-espresso/20 open:border-espresso p-4">
        <summary class="font-bold text-sm text-espresso flex items-center justify-between list-none">
          <span>Area mana saja yang terjangkau pengiriman BlushBowl?</span>
          <span class="text-sage font-extrabold text-lg group-open:rotate-45 transition-transform">+</span>
        </summary>
        <p class="text-xs text-espresso-soft mt-2.5 leading-relaxed">Melayani DKI Jakarta, Tangerang Selatan, Kota Tangerang, Depok, Bekasi, Bogor Kota, dan Bandung Kota menggunakan kurir berpendingin termal.</p>
      </details>
    </div>
  </section>

  <!-- ==================== 13. FOOTER ==================== -->
  <footer class="bg-espresso text-linen pt-14 pb-28 px-4 sm:px-6 lg:px-8 border-t-4 border-sage">
    <div class="max-w-7xl mx-auto grid sm:grid-cols-2 lg:grid-cols-4 gap-8 pb-10 border-b border-white/15">
      <div class="space-y-3">
        <span class="font-display font-extrabold text-2xl text-white">Blush<span class="text-blush">Bowl</span></span>
        <p class="text-xs text-peach/85 leading-relaxed">Katering diet & kontrol kalori presisi dengan cita rasa kuliner modern. Membantu Anda mencapai komposisi tubuh ideal secara berkelanjutan.</p>
      </div>
      <div>
        <h4 class="font-display font-bold text-sm text-white mb-3">Program Diet</h4>
        <ul class="space-y-1.5 text-xs text-peach/85">
          <li><a href="#programs-section" onclick="selectDietProgram('High Protein')" class="hover:text-blush">High Protein Muscle Sculpt</a></li>
          <li><a href="#programs-section" onclick="selectDietProgram('Low Calorie')" class="hover:text-blush">Low Calorie Fat Loss</a></li>
          <li><a href="#programs-section" onclick="selectDietProgram('Balanced Diet')" class="hover:text-blush">Balanced Daily Wellness</a></li>
          <li><a href="#programs-section" onclick="selectDietProgram('Low Carb')" class="hover:text-blush">Low Carb Metabolic Reset</a></li>
        </ul>
      </div>
      <div>
        <h4 class="font-display font-bold text-sm text-white mb-3">Navigasi Cepat</h4>
        <ul class="space-y-1.5 text-xs text-peach/85">
          <li><a href="#calculator-section" class="hover:text-blush">Kalkulator Kalori & Makro</a></li>
          <li><a href="#catalog-section" class="hover:text-blush">Katalog Menu & Nutrition Facts</a></li>
          <li><a href="#builder-section" class="hover:text-blush">Custom Daily Meal Builder</a></li>
          <li><a href="#nutritionist-section" class="hover:text-blush">Konsultasi Ahli Gizi</a></li>
        </ul>
      </div>
      <div class="space-y-2.5">
        <h4 class="font-display font-bold text-sm text-white">Newsletter Nutrisi</h4>
        <form onsubmit="event.preventDefault(); showToast('Terima kasih! Panduan makro mingguan dikirim ke email Anda.')" class="flex gap-2">
          <input type="email" required placeholder="Email Anda..." class="w-full px-3 py-2 rounded-xl bg-white/10 border border-white/20 text-xs text-white placeholder:text-peach/50 focus:outline-none" />
          <button type="submit" class="bg-blush text-espresso font-extrabold text-xs px-3.5 rounded-xl hover:bg-peach">Gabung</button>
        </form>
      </div>
    </div>
    <div class="max-w-7xl mx-auto pt-5 flex flex-col sm:flex-row items-center justify-between gap-2 text-xs text-peach/70">
      <p>© 2026 BlushBowl Nutrition Indonesia. Seluruh Hak Cipta Dilindungi.</p>
      <p>Jl. Senopati Nutrisi No. 28, Jakarta Selatan</p>
    </div>
  </footer>

  <!-- ==================== 14. CHECKOUT DRAWER MODAL ==================== -->
  <div id="checkout-modal" class="fixed inset-0 z-50 hidden items-center justify-center bg-espresso/70 backdrop-blur-sm p-4">
    <div class="bg-white rounded-3xl max-w-lg w-full border-2 border-espresso shadow-2xl overflow-hidden">
      <div class="bg-espresso text-linen p-5 flex items-center justify-between">
        <div>
          <h3 class="font-display font-bold text-lg">Checkout Paket BlushBowl</h3>
          <p id="chk-plan-summary" class="text-xs text-peach">Paket 2 Minggu (2x Makan/Hari) • 20 Box</p>
        </div>
        <button type="button" onclick="closeCheckoutDrawer()" class="w-8 h-8 rounded-full bg-white/15 text-white font-bold">✕</button>
      </div>
      <form onsubmit="completeCheckoutOrder(event)" class="p-6 space-y-3.5 max-h-[80vh] overflow-y-auto text-xs">
        <div class="grid sm:grid-cols-2 gap-3">
          <input type="text" id="chk-name" required placeholder="Nama Penerima" class="w-full p-3 rounded-xl border border-espresso/25 bg-linen" />
          <input type="tel" id="chk-phone" required placeholder="No. WhatsApp (0812...)" class="w-full p-3 rounded-xl border border-espresso/25 bg-linen" />
        </div>
        <textarea id="chk-address" rows="2" required placeholder="Alamat lengkap pengiriman..." class="w-full p-3 rounded-xl border border-espresso/25 bg-linen"></textarea>
        <div class="flex gap-2">
          <input type="text" id="chk-promo-input" placeholder="Kode Promo: BLUSHFIT26" class="flex-1 p-2.5 rounded-xl border border-espresso/25 bg-linen font-mono uppercase" />
          <button type="button" onclick="applyCheckoutPromo()" class="bg-espresso text-linen font-bold px-4 rounded-xl">Pakai</button>
        </div>
        <div class="bg-peach/45 p-3.5 rounded-2xl border border-espresso/15 flex justify-between items-center">
          <span class="font-bold text-espresso">Total Pembayaran (Gratis Ongkir):</span>
          <span id="chk-grand-total" class="font-mono font-bold text-xl text-sage">Rp 985.000</span>
        </div>
        <button type="submit" class="btn-shimmer w-full bg-sage hover:bg-sage-dark text-white font-extrabold py-3.5 rounded-2xl border-2 border-espresso text-sm">
          Konfirmasi Pesanan Sekarang ✓
        </button>
      </form>
    </div>
  </div>

  <!-- ==================== 15. NUTRITION FACTS & ALLERGEN MODAL ==================== -->
  <div id="nutrition-modal" class="fixed inset-0 z-50 hidden items-center justify-center bg-espresso/70 backdrop-blur-sm p-4">
    <div class="bg-white rounded-3xl max-w-md w-full border-2 border-espresso shadow-2xl overflow-hidden">
      <div class="relative h-44">
        <img id="modal-meal-img" src="" alt="Detail Menu" class="w-full h-full object-cover" />
        <button type="button" onclick="closeNutritionModal()" class="absolute top-3 right-3 w-8 h-8 rounded-full bg-espresso text-white font-bold flex items-center justify-center border border-white">✕</button>
        <span id="modal-meal-tag" class="absolute bottom-3 left-3 bg-sage text-white text-xs font-extrabold px-3 py-1 rounded-full">High Protein</span>
      </div>
      <div class="p-5 space-y-3.5 max-h-[75vh] overflow-y-auto">
        <div>
          <h3 id="modal-meal-title" class="font-display font-extrabold text-xl text-espresso">Menu</h3>
          <p id="modal-meal-desc" class="text-xs text-espresso-soft mt-1"></p>
        </div>
        <div class="border-2 border-espresso rounded-2xl p-3.5 bg-linen">
          <div class="border-b-4 border-espresso pb-1.5 mb-2 flex justify-between items-end">
            <div>
              <h4 class="font-extrabold text-sm uppercase text-espresso">Informasi Nilai Gizi</h4>
              <p id="modal-serving-size" class="text-[11px] text-espresso-soft">Takaran Saji: 1 Box</p>
            </div>
            <span id="modal-kcal" class="font-mono font-bold text-xl text-sage">440 kcal</span>
          </div>
          <div class="divide-y divide-espresso/15 text-xs">
            <div class="py-1 flex justify-between font-extrabold"><span>Protein</span><span id="modal-protein" class="font-mono">38g</span></div>
            <div class="py-1 flex justify-between font-bold"><span>Karbohidrat Total</span><span id="modal-carbs" class="font-mono">42g</span></div>
            <div class="py-1 flex justify-between pl-3 text-espresso-soft"><span>Serat Pangan</span><span id="modal-fiber" class="font-mono">7g</span></div>
            <div class="py-1 flex justify-between font-bold"><span>Lemak Total</span><span id="modal-fat" class="font-mono">13g</span></div>
            <div class="py-1 flex justify-between text-espresso-soft"><span>Natrium</span><span id="modal-sodium" class="font-mono">410mg</span></div>
          </div>
        </div>
        <div id="modal-allergens" class="flex flex-wrap gap-1.5 text-[11px]"></div>
        <button type="button" onclick="addModalMealToBuilder()" class="btn-shimmer w-full bg-sage text-white font-extrabold py-3 rounded-2xl border-2 border-espresso text-xs">
          + Tambahkan ke Meal Plan Saya
        </button>
      </div>
    </div>
  </div>

  <!-- ==================== 16. TOAST BANNER ==================== -->
  <div id="toast-banner" class="fixed top-24 right-5 z-50 hidden items-center gap-2.5 bg-espresso text-linen px-4 py-3 rounded-2xl border-2 border-blush shadow-xl text-xs font-bold max-w-sm">
    <span class="w-2.5 h-2.5 rounded-full bg-[#39FF14] shrink-0"></span>
    <span id="toast-message">Notifikasi</span>
  </div>

  <!-- ==================== 17. BLUSH-AI CHATBOT POPOVER ==================== -->
  <div id="ai-chat-window" class="fixed bottom-24 right-5 z-50 hidden w-[330px] sm:w-[360px] bg-white rounded-3xl border-2 border-espresso shadow-2xl overflow-hidden">
    <div class="bg-espresso text-linen p-3.5 flex items-center justify-between border-b border-blush/30">
      <div class="flex items-center gap-2.5">
        <div class="w-8 h-8 rounded-full bg-sage flex items-center justify-center border border-[#39FF14] relative">
          <span class="font-mono font-bold text-xs text-white">AI</span>
          <span class="w-2 h-2 rounded-full bg-[#39FF14] absolute -top-0.5 -right-0.5 animate-ping"></span>
        </div>
        <div>
          <h4 class="font-bold text-xs text-white leading-none">BlushAI Macro Coach</h4>
          <span class="text-[10px] text-[#39FF14] font-semibold">● Online • Kalibrasi Kalori Aktif</span>
        </div>
      </div>
      <button type="button" onclick="toggleAIChat()" class="text-peach hover:text-white font-bold text-base px-1.5">✕</button>
    </div>

    <div id="ai-chat-messages" class="p-3.5 h-60 overflow-y-auto space-y-2.5 bg-linen/70 text-xs">
      <div class="bg-white p-3 rounded-2xl rounded-tl-none border border-espresso/15 text-espresso leading-relaxed">
        Halo! Saya <strong>BlushAI</strong> 🥗. Target kalori harian Anda terkalibrasi di <strong id="ai-chat-kcal-ref" class="font-mono text-sage">1,415 kcal</strong>. Mau rekomendasi menu tinggi protein atau hitung paket langganan?
      </div>
    </div>

    <div class="px-3 py-2 bg-peach/35 border-t border-espresso/10 flex gap-1.5 overflow-x-auto">
      <button type="button" onclick="sendQuickAIPrompt('Menu fat loss di bawah 400 kcal')" class="shrink-0 bg-white hover:bg-peach text-[10px] font-bold px-2.5 py-1 rounded-full border border-espresso/20 text-espresso">🔥 &lt;400 kcal</button>
      <button type="button" onclick="sendQuickAIPrompt('Menu protein di atas 40g')" class="shrink-0 bg-white hover:bg-peach text-[10px] font-bold px-2.5 py-1 rounded-full border border-espresso/20 text-espresso">💪 &gt;40g Protein</button>
      <button type="button" onclick="sendQuickAIPrompt('Info harga paket 2 minggu')" class="shrink-0 bg-white hover:bg-peach text-[10px] font-bold px-2.5 py-1 rounded-full border border-espresso/20 text-espresso">💳 Harga Paket</button>
    </div>

    <form onsubmit="handleAIChatSubmit(event)" class="p-2.5 bg-white border-t border-espresso/10 flex gap-2">
      <input type="text" id="ai-chat-input" placeholder="Tanya kalori, makro, atau alergen..." class="flex-1 text-xs p-2.5 rounded-xl bg-linen border border-espresso/20 focus:outline-none" />
      <button type="submit" class="bg-sage text-white font-bold text-xs px-3.5 rounded-xl hover:bg-sage-dark">Kirim</button>
    </form>
  </div>

  <!-- ==================== 18. DUAL FIXED BOTTOM-RIGHT FLOATING BUTTONS ==================== -->
  <div class="fixed bottom-5 right-5 z-50 flex items-center gap-3.5">
    <!-- Floating WhatsApp Button (Side-by-Side Left) -->
    <a
      href="https://wa.me/6281234567890?text=Halo%20BlushBowl%20Nutrition!%20Saya%20ingin%20konsultasi%20paket%20katering%20diet%20kalori."
      target="_blank"
      rel="noopener noreferrer"
      aria-label="Konsultasi WhatsApp Ahli Gizi"
      class="group relative flex items-center gap-2 bg-[#25D366] hover:bg-[#1EBE5D] text-white font-extrabold px-4 py-3 rounded-full border-2 border-espresso shadow-lg transition-transform hover:-translate-y-1"
    >
      <span class="absolute -inset-1 rounded-full bg-[#25D366]/35 animate-ping pointer-events-none"></span>
      <svg class="w-5 h-5 relative z-10 fill-current" viewBox="0 0 24 24">
        <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.662.591 1.221.774 1.394.86s.274.072.376-.043c.101-.116.433-.506.549-.68.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.045.072.045.419-.1.824z"/>
      </svg>
      <span class="hidden sm:inline text-xs relative z-10">WhatsApp Gizi</span>
    </a>

    <!-- Floating AI Chatbot Button (Animated Macro Rings, Pulsing Calorie Counter & Neon-Green Particles) -->
    <div class="relative flex items-center justify-center">
      <!-- Dynamic Neon-Green Nutrition Particles -->
      <span class="neon-particle" style="top: 6px; left: 10px; --dx: -14px; --dy: -44px; --dur: 2.3s; --delay: 0s;"></span>
      <span class="neon-particle" style="top: 10px; right: 12px; --dx: 16px; --dy: -48px; --dur: 2.7s; --delay: 0.5s;"></span>
      <span class="neon-particle" style="bottom: 14px; left: 8px; --dx: -18px; --dy: -38px; --dur: 2.2s; --delay: 1.0s;"></span>
      <span class="neon-particle" style="bottom: 12px; right: 10px; --dx: 14px; --dy: -42px; --dur: 2.5s; --delay: 1.5s;"></span>

      <!-- Rotating Outer Macro Ring -->
      <svg class="w-[74px] h-[74px] absolute pointer-events-none animate-orbit-fast" viewBox="0 0 80 80">
        <circle cx="40" cy="40" r="36" fill="none" stroke="#39FF14" stroke-width="2" stroke-dasharray="14 8 4 8" opacity="0.95"/>
        <circle cx="40" cy="4" r="3.5" fill="#39FF14"/>
        <circle cx="76" cy="40" r="3" fill="#D9A7A0"/>
      </svg>

      <!-- Reverse Rotating Inner Ring -->
      <svg class="w-[64px] h-[64px] absolute pointer-events-none animate-orbit-reverse" viewBox="0 0 70 70">
        <circle cx="35" cy="35" r="31" fill="none" stroke="#D9A7A0" stroke-width="1.8" stroke-dasharray="18 10"/>
      </svg>

      <!-- Pulsing Calorie Counter Badge -->
      <div id="floating-ai-kcal-pill" class="absolute -top-7 whitespace-nowrap bg-espresso text-[#39FF14] font-mono text-[10px] font-bold px-2.5 py-0.5 rounded-full border border-[#39FF14]/75 shadow-md pointer-events-none">
        ⚡ 1,415 kcal
      </div>

      <!-- Core BlushAI Button -->
      <button
        type="button"
        onclick="toggleAIChat()"
        aria-label="Buka BlushAI Macro Coach"
        class="ai-neon-btn relative z-10 w-14 h-14 rounded-full bg-gradient-to-br from-espresso via-sage-dark to-sage text-white border-2 border-[#39FF14] flex flex-col items-center justify-center shadow-xl"
      >
        <svg class="w-5 h-5 text-[#39FF14]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
        </svg>
        <span class="text-[9px] font-extrabold tracking-wider uppercase text-linen leading-none mt-0.5">BlushAI</span>
      </button>
    </div>
  </div>

  <!-- ==================== JAVASCRIPT APPLICATION LOGIC ==================== -->

  <script src="{{ asset('js/website-bisnis/templates/food-subscription/diet-meal/blushbowl/blushbowl.js') }}" defer></script>
</body>
</html>
