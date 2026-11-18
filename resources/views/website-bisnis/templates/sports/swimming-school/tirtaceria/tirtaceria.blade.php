<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>TirtaCeria Swim Academy | Sekolah Renang Bayi, Anak, Remaja & Dewasa</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            aqua: '#18B6B0',
            aquaDark: '#0F8E89',
            mint: '#8CE0D5',
            coral: '#FF8066',
            coralDark: '#E8654B',
            sunny: '#FFE18A',
            bgLight: '#F5FBF8',
            navy: '#0B3948',
          },
          fontFamily: {
            display: ['Fredoka', 'sans-serif'],
            sans: ['Plus Jakarta Sans', 'sans-serif'],
          },
        },
      },
    };
  </script>
  <link rel="stylesheet" href="{{ asset('css/sports/swimming-school/tirtaceria.css') }}">
</head>
<body class="antialiased selection:bg-sunny selection:text-navy">

  <!-- ==================== TOP NAVIGATION (MULTIPAGE / VIEW SWITCHER) ==================== -->
  <header class="sticky top-0 z-40 bg-[#F5FBF8]/90 backdrop-blur-md border-b border-mint/40 transition-all">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between h-20">
        <!-- Brand Logo -->
        <a href="#beranda" onclick="switchPage('all')" class="flex items-center gap-3 group">
          <div class="relative w-12 h-12 rounded-2xl bg-gradient-to-br from-aqua to-mint flex items-center justify-center shadow-md shadow-aqua/25 group-hover:scale-105 transition-transform">
            <!-- Custom SVG Pelampung & Gelombang -->
            <svg class="w-8 h-8 text-white" viewBox="0 0 48 48" fill="none">
              <circle cx="24" cy="24" r="16" stroke="white" stroke-width="5"/>
              <circle cx="24" cy="24" r="7" stroke="#FFE18A" stroke-width="3"/>
              <path d="M11 15L16 19M37 15L32 19M11 33L16 29M37 33L32 29" stroke="#FF8066" stroke-width="3.5" stroke-linecap="round"/>
            </svg>
          </div>
          <div>
            <span class="font-display font-bold text-xl sm:text-2xl tracking-tight text-navy block leading-none">
              Tirta<span class="text-aqua">Ceria</span>
            </span>
            <span class="text-[11px] font-bold uppercase tracking-widest text-coral">Swim Academy</span>
          </div>
        </a>

        <!-- Multipage Navigation Tabs (Desktop) -->
        <nav class="hidden lg:flex items-center gap-1.5 bg-white/80 p-1.5 rounded-full border border-mint/50 shadow-sm">
          <button onclick="switchPage('all')" data-nav="all" class="nav-pill active-pill px-4 py-2 rounded-full text-sm font-bold transition-all bg-aqua text-white shadow-sm">
            Semua Halaman
          </button>
          <button onclick="switchPage('program')" data-nav="program" class="nav-pill px-4 py-2 rounded-full text-sm font-semibold text-navy/80 hover:text-aqua transition-all">
            Program & Level
          </button>
          <button onclick="switchPage('jadwal')" data-nav="jadwal" class="nav-pill px-4 py-2 rounded-full text-sm font-semibold text-navy/80 hover:text-aqua transition-all">
            Jadwal & Fasilitas
          </button>
          <button onclick="switchPage('paket')" data-nav="paket" class="nav-pill px-4 py-2 rounded-full text-sm font-semibold text-navy/80 hover:text-aqua transition-all">
            Paket & Booking
          </button>
          <button onclick="switchPage('panduan')" data-nav="panduan" class="nav-pill px-4 py-2 rounded-full text-sm font-semibold text-navy/80 hover:text-aqua transition-all">
            Safety & Panduan
          </button>
        </nav>

        <!-- Action CTAs -->
        <div class="hidden sm:flex items-center gap-3">
          <button onclick="openPlacementModal()" class="px-4 py-2.5 rounded-full text-sm font-bold text-navy bg-sunny hover:bg-sunny/80 transition-all shadow-sm flex items-center gap-1.5">
            <span>🎯</span> Cek Level
          </button>
          <a href="#booking-section" onclick="switchPage('all')" class="px-5 py-2.5 rounded-full text-sm font-bold text-white bg-coral hover:bg-coralDark transition-all shadow-md shadow-coral/30">
            Daftar Kelas
          </a>
        </div>

        <!-- Mobile Menu Button -->
        <button id="mobile-menu-btn" onclick="toggleMobileMenu()" class="lg:hidden p-2.5 rounded-xl bg-white border border-mint/60 text-navy">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6h16M4 12h16M4 18h16"/>
          </svg>
        </button>
      </div>
    </div>

    <!-- Mobile Navigation Drawer -->
    <div id="mobile-menu" class="hidden lg:hidden bg-white border-b border-mint/50 px-4 pt-2 pb-5 space-y-2 shadow-lg">
      <button onclick="switchPage('all'); toggleMobileMenu()" class="block w-full text-left px-4 py-2.5 rounded-xl font-bold bg-aqua/10 text-aqua">Beranda Lengkap</button>
      <button onclick="switchPage('program'); toggleMobileMenu()" class="block w-full text-left px-4 py-2.5 rounded-xl font-semibold text-navy hover:bg-bgLight">Program Usia & Level</button>
      <button onclick="switchPage('jadwal'); toggleMobileMenu()" class="block w-full text-left px-4 py-2.5 rounded-xl font-semibold text-navy hover:bg-bgLight">Jadwal, Pelatih & Kolam</button>
      <button onclick="switchPage('paket'); toggleMobileMenu()" class="block w-full text-left px-4 py-2.5 rounded-xl font-semibold text-navy hover:bg-bgLight">Paket & Reservasi 7 Langkah</button>
      <button onclick="switchPage('panduan'); toggleMobileMenu()" class="block w-full text-left px-4 py-2.5 rounded-xl font-semibold text-navy hover:bg-bgLight">Info Orang Tua, Safety & FAQ</button>
      <div class="pt-2 flex gap-2">
        <button onclick="openPlacementModal(); toggleMobileMenu()" class="flex-1 py-2.5 rounded-xl font-bold bg-sunny text-navy text-center text-sm">🎯 Tes Level</button>
        <a href="#booking-section" onclick="switchPage('all'); toggleMobileMenu()" class="flex-1 py-2.5 rounded-xl font-bold bg-coral text-white text-center text-sm">Daftar Kelas</a>
      </div>
    </div>
  </header>

  <!-- ==================== HERO SECTION: INTERACTIVE AQUATIC STAGE ==================== -->
  <section id="beranda" data-section="hero" class="relative overflow-hidden pt-8 pb-28 sm:pt-12 sm:pb-36 bg-gradient-to-b from-[#E3F8F5] via-[#F5FBF8] to-[#F5FBF8]">
    <!-- Animated Floating Bubbles Background -->
    <div id="hero-bubbles" class="absolute inset-0 pointer-events-none overflow-hidden"></div>

    <!-- Parallax Floating Swim Gear Illustrations (Kacamata, Pelampung, Kickboard, Peluit) -->
    <div id="parallax-stage" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
      <!-- Floating SVG 1: Pelampung Donat Coral -->
      <div data-speed="0.04" class="parallax-item hidden md:block absolute -top-4 left-[44%] animate-float-slow pointer-events-none">
        <svg class="w-20 h-20 drop-shadow-lg" viewBox="0 0 100 100" fill="none">
          <circle cx="50" cy="50" r="36" stroke="#FF8066" stroke-width="18"/>
          <circle cx="50" cy="50" r="36" stroke="white" stroke-width="18" stroke-dasharray="18 38"/>
          <circle cx="50" cy="50" r="27" stroke="#0B3948" stroke-width="2" stroke-opacity="0.15"/>
        </svg>
      </div>

      <!-- Floating SVG 2: Kacamata Renang Aqua & Sunny -->
      <div data-speed="-0.05" class="parallax-item hidden lg:block absolute bottom-8 left-[38%] animate-float-reverse pointer-events-none">
        <svg class="w-28 h-16 drop-shadow-md" viewBox="0 0 140 70" fill="none">
          <path d="M10 35C10 22 25 18 42 18C56 18 62 25 65 32H75C78 25 84 18 98 18C115 18 130 22 130 35C130 48 115 52 98 52C82 52 76 44 75 38H65C64 44 58 52 42 52C25 52 10 48 10 35Z" fill="#18B6B0"/>
          <rect x="20" y="24" width="38" height="22" rx="11" fill="#FFE18A"/>
          <rect x="82" y="24" width="38" height="22" rx="11" fill="#FFE18A"/>
          <path d="M27 29L36 39" stroke="white" stroke-width="3" stroke-linecap="round"/>
          <path d="M89 29L98 39" stroke="white" stroke-width="3" stroke-linecap="round"/>
        </svg>
      </div>

      <!-- Asymmetric Bento-Organic Hero Layout -->
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-8 items-center">
        <!-- Left Content (6 cols) -->
        <div class="lg:col-span-6 space-y-6 text-left">
          <div class="inline-flex items-center gap-2.5 px-4 py-2 rounded-full bg-white border-2 border-mint shadow-sm animate-bob">
            <span class="w-2.5 h-2.5 rounded-full bg-coral animate-ping"></span>
            <span class="text-xs sm:text-sm font-extrabold text-navy tracking-wide">
              Usia 6 Bulan – Dewasa • Kolam Air Hangat 32°C
            </span>
          </div>

          <h1 class="font-display text-4xl sm:text-5xl lg:text-[3.4rem] font-bold text-navy leading-[1.12]">
            Belajar Berenang Jadi Momen <span class="relative inline-block text-aqua">
              Paling Ceria
              <svg class="absolute -bottom-2 left-0 w-full h-3 text-sunny" viewBox="0 0 200 14" fill="none">
                <path d="M3 10C45 2 145 2 197 10" stroke="currentColor" stroke-width="6" stroke-linecap="round"/>
              </svg>
            </span> & Aman!
          </h1>

          <p class="text-base sm:text-lg text-navy/80 leading-relaxed max-w-xl">
            Dari <strong>Baby Water Sensory (6 bulan)</strong>, membangun percaya diri anak, hingga kelas teknik & anti-takut air untuk dewasa. Didampingi pelatih bersertifikat PRSI & Lifeguard internasional.
          </p>

          <!-- Interactive Age Pill Preview -->
          <div class="flex flex-wrap gap-2 pt-1">
            <span class="px-3 py-1.5 rounded-xl bg-mint/30 text-navy text-xs font-bold">👶 Baby (6-24 Bln)</span>
            <span class="px-3 py-1.5 rounded-xl bg-sunny/50 text-navy text-xs font-bold">🧒 Toddler & Kids</span>
            <span class="px-3 py-1.5 rounded-xl bg-coral/15 text-coralDark text-xs font-bold">🏊 Teens & Adults</span>
          </div>

          <!-- Dual Primary CTAs -->
          <div class="flex flex-wrap items-center gap-4 pt-2">
            <a href="#booking-section" class="group px-7 py-4 rounded-2xl bg-coral hover:bg-coralDark text-white font-bold text-base shadow-xl shadow-coral/30 transition-all flex items-center gap-3 hover:-translate-y-0.5">
              <span>Daftar Kelas Sekarang</span>
              <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
              </svg>
            </a>
            <a href="#jadwal-section" class="px-7 py-4 rounded-2xl bg-white hover:bg-mint/20 text-navy border-2 border-aqua font-bold text-base shadow-sm transition-all flex items-center gap-2.5">
              <svg class="w-5 h-5 text-aqua" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
              </svg>
              <span>Cek Jadwal & Kuota</span>
            </a>
          </div>

          <!-- Trust Metrics -->
          <div class="grid grid-cols-3 gap-4 pt-4 border-t border-mint/50 max-w-lg">
            <div>
              <p class="font-display text-2xl sm:text-3xl font-bold text-aqua">1.450+</p>
              <p class="text-xs font-semibold text-navy/70">Siswa Lulus Renang</p>
            </div>
            <div>
              <p class="font-display text-2xl sm:text-3xl font-bold text-coral">1 : 4</p>
              <p class="text-xs font-semibold text-navy/70">Rasio Maks. Kelas Bayi</p>
            </div>
            <div>
              <p class="font-display text-2xl sm:text-3xl font-bold text-navy">100%</p>
              <p class="text-xs font-semibold text-navy/70">Coach Bersertifikat</p>
            </div>
          </div>
        </div>

        <!-- Right Visual Collage: Layered Organic Aquatic Stage (6 cols) -->
        <div class="lg:col-span-6 relative">
          <div class="relative mx-auto max-w-lg">
            <!-- Decorative Yellow Splash Backdrop -->
            <div class="absolute -inset-4 bg-gradient-to-tr from-mint via-sunny/70 to-coral/30 blob-frame-2 rotate-6 animate-pulse opacity-80"></div>

            <!-- Main Swimming Photo in Organic Blob Frame -->
            <div class="relative overflow-hidden blob-frame-1 border-4 border-white shadow-2xl aspect-[4/3] bg-aqua/20">
              <img
                src="https://images.unsplash.com/photo-1519315901367-f34ff9154487?auto=format&fit=crop&w=1000&q=80"
                onerror="this.src='https://placehold.co/800x600/18B6B0/FFFFFF?text=Kelas+Renang+Ceria+TirtaCeria'"
                alt="Aktivitas belajar berenang ceria bersama instruktur di kolam renang"
                class="w-full h-full object-cover hover:scale-105 transition-transform duration-700"
              />
              <div class="absolute inset-0 bg-gradient-to-t from-navy/50 via-transparent to-transparent"></div>
              <div class="absolute bottom-4 left-6 right-6 flex items-center justify-between text-white">
                <div>
                  <span class="text-xs uppercase tracking-wider font-bold bg-aqua px-2.5 py-1 rounded-full">Metode Play-Based</span>
                  <p class="font-display text-lg font-bold mt-1">Belajar Tanpa Rasa Takut</p>
                </div>
              </div>
            </div>

            <!-- Floating Secondary Photo Card (Baby Swimming) -->
            <div class="hidden sm:flex items-center gap-3 absolute -bottom-7 -left-6 bg-white p-3 rounded-3xl shadow-xl border-2 border-mint animate-float-slow max-w-[250px]">
              <img
                src="https://images.unsplash.com/photo-1560089000-7433a4ebbd64?auto=format&fit=crop&w=300&q=80"
                onerror="this.src='https://placehold.co/120x120/8CE0D5/0B3948?text=Baby+Swim'"
                alt="Baby Swimming dengan pendamping orang tua"
                class="w-16 h-16 rounded-2xl object-cover flex-shrink-0"
              />
              <div>
                <span class="text-[11px] font-extrabold text-coral uppercase">Baby Swim 6m+</span>
                <p class="text-xs font-bold text-navy leading-snug">Kolam Hangat 32°C + Pendamping Ortu</p>
              </div>
            </div>

            <!-- Floating Kickboard & Whistle Badge -->
            <div class="absolute -top-5 -right-3 sm:-right-6 bg-sunny text-navy p-3.5 rounded-3xl shadow-lg border-2 border-white animate-wiggle">
              <div class="flex items-center gap-2">
                <!-- SVG Kickboard -->
                <svg class="w-9 h-9" viewBox="0 0 48 48" fill="none">
                  <path d="M12 18C12 10.268 18.268 4 26 4H22C29.732 4 36 10.268 36 18V38C36 41.3137 33.3137 44 30 44H18C14.6863 44 12 41.3137 12 38V18Z" fill="#FF8066"/>
                  <rect x="17" y="28" width="5" height="9" rx="2.5" fill="#F5FBF8"/>
                  <rect x="26" y="28" width="5" height="9" rx="2.5" fill="#F5FBF8"/>
                </svg>
                <div class="pr-1">
                  <p class="text-[11px] font-extrabold uppercase tracking-wider text-navy/70">Gratis</p>
                  <p class="font-display font-bold text-sm leading-tight">Placement Test!</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Animated Multi-Layer Ocean Wave Divider -->
    <div class="absolute bottom-0 left-0 right-0 overflow-hidden leading-none pointer-events-none">
      <div class="wave-track-slow opacity-40">
        <svg class="w-1/2 h-16 sm:h-24 text-mint" viewBox="0 0 1200 120" preserveAspectRatio="none">
          <path d="M0,40 C300,120 450,0 600,60 C750,120 900,0 1200,40 L1200,120 L0,120 Z" fill="currentColor"/>
        </svg>
        <svg class="w-1/2 h-16 sm:h-24 text-mint" viewBox="0 0 1200 120" preserveAspectRatio="none">
          <path d="M0,40 C300,120 450,0 600,60 C750,120 900,0 1200,40 L1200,120 L0,120 Z" fill="currentColor"/>
        </svg>
      </div>
      <div class="wave-track -mt-12 sm:-mt-16">
        <svg class="w-1/2 h-16 sm:h-24 text-white" viewBox="0 0 1200 120" preserveAspectRatio="none">
          <path d="M0,60 C240,0 360,120 600,60 C840,0 960,120 1200,60 L1200,120 L0,120 Z" fill="currentColor"/>
        </svg>
        <svg class="w-1/2 h-16 sm:h-24 text-white" viewBox="0 0 1200 120" preserveAspectRatio="none">
          <path d="M0,60 C240,0 360,120 600,60 C840,0 960,120 1200,60 L1200,120 L0,120 Z" fill="currentColor"/>
        </svg>
      </div>
    </div>
  </section>

  <!-- ==================== PROGRAM BERDASARKAN USIA & LEVEL ==================== -->
  <section id="program-section" data-section="program" class="py-20 bg-white relative overflow-hidden">
    <!-- Animated Swimmer Silhouette Crossing Section -->
    <div class="absolute top-6 left-0 w-full pointer-events-none opacity-15">
      <div class="animate-swim inline-flex items-center gap-2 text-aqua">
        <svg class="w-16 h-8" viewBox="0 0 80 40" fill="currentColor">
          <circle cx="62" cy="14" r="6"/>
          <path d="M12 24C24 16 40 16 54 22L44 28C32 25 22 26 12 24Z"/>
          <path d="M36 17L48 6L53 10L42 20Z"/>
        </svg>
        <span class="text-xs font-bold tracking-widest">~ ~ ~</span>
      </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
      <!-- Section Header -->
      <div class="text-center max-w-3xl mx-auto mb-12 reveal">
        <span class="inline-block px-4 py-1.5 rounded-full bg-aqua/15 text-aquaDark font-extrabold text-xs uppercase tracking-wider mb-3">
          Kurikulum Terstruktur 6 Bulan – Dewasa
        </span>
        <h2 class="font-display text-3xl sm:text-4xl font-bold text-navy">
          Program Berdasarkan <span class="text-aqua">Kelompok Usia</span> & <span class="text-coral">Level Kemampuan</span>
        </h2>
        <p class="mt-3 text-navy/75 text-base">
          Setiap tahap usia memiliki pendekatan psikologis, suhu kolam, dan perlengkapan bantu renang yang dirancang khusus.
        </p>
      </div>

      <!-- Interactive Age Group Selector Tabs -->
      <div class="flex flex-wrap justify-center gap-2.5 sm:gap-3 mb-10 reveal" id="age-tabs">
        <button onclick="selectAgeProgram('baby')" data-age="baby" class="age-tab-btn px-5 py-3 rounded-2xl font-bold text-sm transition-all bg-aqua text-white shadow-lg shadow-aqua/25 flex items-center gap-2">
          <span>👶</span> Baby (6–24 Bln)
        </button>
        <button onclick="selectAgeProgram('toddler')" data-age="toddler" class="age-tab-btn px-5 py-3 rounded-2xl font-bold text-sm transition-all bg-bgLight text-navy hover:bg-mint/30 border border-mint/60 flex items-center gap-2">
          <span>🦆</span> Toddler (2–4 Thn)
        </button>
        <button onclick="selectAgeProgram('kids')" data-age="kids" class="age-tab-btn px-5 py-3 rounded-2xl font-bold text-sm transition-all bg-bgLight text-navy hover:bg-mint/30 border border-mint/60 flex items-center gap-2">
          <span>🥽</span> Kids (5–12 Thn)
        </button>
        <button onclick="selectAgeProgram('teens')" data-age="teens" class="age-tab-btn px-5 py-3 rounded-2xl font-bold text-sm transition-all bg-bgLight text-navy hover:bg-mint/30 border border-mint/60 flex items-center gap-2">
          <span>🏅</span> Teens (13–17 Thn)
        </button>
        <button onclick="selectAgeProgram('adults')" data-age="adults" class="age-tab-btn px-5 py-3 rounded-2xl font-bold text-sm transition-all bg-bgLight text-navy hover:bg-mint/30 border border-mint/60 flex items-center gap-2">
          <span>🏊‍♂️</span> Adults (18+ Thn)
        </button>
      </div>

      <!-- Dynamic Age Program Showcase Card -->
      <div id="age-program-display" class="bg-bgLight rounded-[2.2rem] p-6 sm:p-10 border-2 border-mint/60 shadow-xl mb-16 reveal">
        <!-- Populated by JS -->
      </div>

      <!-- Level Progression Roadmap (Beginner -> Professional) -->
      <div class="mt-16 reveal">
        <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-8 gap-4">
          <div>
            <span class="text-xs font-extrabold uppercase tracking-wider text-coral">Jenjang Sertifikasi TirtaCeria</span>
            <h3 class="font-display text-2xl sm:text-3xl font-bold text-navy mt-1">5 Tingkat Kemampuan Renang</h3>
          </div>
          <button onclick="openPlacementModal()" class="self-start sm:self-auto px-5 py-2.5 rounded-xl bg-navy text-white text-sm font-bold hover:bg-aqua transition-colors flex items-center gap-2">
            <span>🧭</span> Tidak yakin levelmu? Ikuti Tes 30 Detik
          </button>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4">
          <!-- Level 1 -->
          <div class="group bg-white rounded-3xl p-5 border-2 border-mint/50 hover:border-aqua transition-all hover:-translate-y-1.5 shadow-sm">
            <div class="flex items-center justify-between mb-3">
              <span class="w-10 h-10 rounded-2xl bg-mint/40 text-navy font-display font-bold flex items-center justify-center">01</span>
              <span class="text-xs font-extrabold px-2.5 py-1 rounded-full bg-mint/30 text-navy">Bubble Star</span>
            </div>
            <h4 class="font-display text-xl font-bold text-navy group-hover:text-aqua transition-colors">Beginner</h4>
            <p class="text-xs text-navy/70 mt-2 leading-relaxed">
              Adaptasi air, meniup gelembung (bubbling), membuka mata di air, serta mengapung telentang & telungkup dibantu.
            </p>
            <div class="mt-4 pt-3 border-t border-gray-100 text-[11px] font-bold text-aquaDark">
              Target: Water Confidence
            </div>
          </div>

          <!-- Level 2 -->
          <div class="group bg-white rounded-3xl p-5 border-2 border-mint/50 hover:border-aqua transition-all hover:-translate-y-1.5 shadow-sm">
            <div class="flex items-center justify-between mb-3">
              <span class="w-10 h-10 rounded-2xl bg-aqua/20 text-aquaDark font-display font-bold flex items-center justify-center">02</span>
              <span class="text-xs font-extrabold px-2.5 py-1 rounded-full bg-aqua/15 text-aquaDark">Glide Dolphin</span>
            </div>
            <h4 class="font-display text-xl font-bold text-navy group-hover:text-aqua transition-colors">Basic</h4>
            <p class="text-xs text-navy/70 mt-2 leading-relaxed">
              Meluncur mandiri (streamline glide), gerakan kaki flutter kick dengan kickboard, dan ambil napas ritmis.
            </p>
            <div class="mt-4 pt-3 border-t border-gray-100 text-[11px] font-bold text-aquaDark">
              Target: Meluncur 10 Meter
            </div>
          </div>

          <!-- Level 3 -->
          <div class="group bg-white rounded-3xl p-5 border-2 border-mint/50 hover:border-sunny transition-all hover:-translate-y-1.5 shadow-sm">
            <div class="flex items-center justify-between mb-3">
              <span class="w-10 h-10 rounded-2xl bg-sunny text-navy font-display font-bold flex items-center justify-center">03</span>
              <span class="text-xs font-extrabold px-2.5 py-1 rounded-full bg-sunny/60 text-navy">Wave Rider</span>
            </div>
            <h4 class="font-display text-xl font-bold text-navy group-hover:text-coral transition-colors">Intermediate</h4>
            <p class="text-xs text-navy/70 mt-2 leading-relaxed">
              Koordinasi penuh Gaya Bebas (Freestyle) & Gaya Punggung (Backstroke), serta pengenalan dasar Gaya Dada.
            </p>
            <div class="mt-4 pt-3 border-t border-gray-100 text-[11px] font-bold text-coralDark">
              Target: 25m Tanpa Berhenti
            </div>
          </div>

          <!-- Level 4 -->
          <div class="group bg-white rounded-3xl p-5 border-2 border-mint/50 hover:border-coral transition-all hover:-translate-y-1.5 shadow-sm">
            <div class="flex items-center justify-between mb-3">
              <span class="w-10 h-10 rounded-2xl bg-coral/20 text-coralDark font-display font-bold flex items-center justify-center">04</span>
              <span class="text-xs font-extrabold px-2.5 py-1 rounded-full bg-coral/15 text-coralDark">Aqua Marlin</span>
            </div>
            <h4 class="font-display text-xl font-bold text-navy group-hover:text-coral transition-colors">Advanced</h4>
            <p class="text-xs text-navy/70 mt-2 leading-relaxed">
              Penguasaan 4 gaya renang (termasuk Gaya Kupu-Kupu), teknik flip turn, water tread (injak-injak air), dan stamina.
            </p>
            <div class="mt-4 pt-3 border-t border-gray-100 text-[11px] font-bold text-coralDark">
              Target: 4 Gaya & Water Rescue
            </div>
          </div>

          <!-- Level 5 -->
          <div class="group bg-gradient-to-br from-navy to-[#125368] text-white rounded-3xl p-5 border-2 border-navy hover:-translate-y-1.5 transition-all shadow-md">
            <div class="flex items-center justify-between mb-3">
              <span class="w-10 h-10 rounded-2xl bg-sunny text-navy font-display font-bold flex items-center justify-center">05</span>
              <span class="text-xs font-extrabold px-2.5 py-1 rounded-full bg-white/15 text-sunny">Elite Shark</span>
            </div>
            <h4 class="font-display text-xl font-bold text-white">Professional</h4>
            <p class="text-xs text-white/80 mt-2 leading-relaxed">
              Persiapan kompetisi, efisiensi stroke rate, diving start block, sprint & endurance training untuk atlet muda/dewasa.
            </p>
            <div class="mt-4 pt-3 border-t border-white/15 text-[11px] font-bold text-sunny">
              Target: Prestasi & Kompetisi
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ==================== JADWAL KELAS & KAPASITAS SLOT ==================== -->
  <section id="jadwal-section" data-section="jadwal" class="py-20 bg-bgLight relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-6 mb-10 reveal">
        <div>
          <span class="inline-block px-4 py-1.5 rounded-full bg-coral/15 text-coralDark font-extrabold text-xs uppercase tracking-wider mb-3">
            Live Class Capacity & Kuota
          </span>
          <h2 class="font-display text-3xl sm:text-4xl font-bold text-navy">
            Jadwal Kelas & <span class="text-aqua">Ketersediaan Slot</span>
          </h2>
          <p class="text-navy/75 mt-2 max-w-2xl">
            Kami membatasi jumlah peserta di setiap sesi demi keamanan dan fokus maksimal pelatih. Pilih jadwal dan langsung kunci slot Anda.
          </p>
        </div>

        <!-- Filters -->
        <div class="flex flex-wrap gap-3 bg-white p-3 rounded-2xl border border-mint/60 shadow-sm">
          <select id="filter-day" onchange="renderSchedule()" class="px-3.5 py-2 rounded-xl bg-bgLight border border-mint/50 text-sm font-bold text-navy focus:outline-none focus:border-aqua">
            <option value="all">Semua Hari</option>
            <option value="Selasa">Selasa</option>
            <option value="Kamis">Kamis</option>
            <option value="Sabtu">Sabtu</option>
            <option value="Minggu">Minggu</option>
          </select>
          <select id="filter-age" onchange="renderSchedule()" class="px-3.5 py-2 rounded-xl bg-bgLight border border-mint/50 text-sm font-bold text-navy focus:outline-none focus:border-aqua">
            <option value="all">Semua Usia</option>
            <option value="Baby">Baby (6-24 Bln)</option>
            <option value="Toddler">Toddler (2-4 Thn)</option>
            <option value="Kids">Kids (5-12 Thn)</option>
            <option value="Teens">Teens (13-17 Thn)</option>
            <option value="Adults">Adults (18+ Thn)</option>
          </select>
          <select id="filter-level" onchange="renderSchedule()" class="px-3.5 py-2 rounded-xl bg-bgLight border border-mint/50 text-sm font-bold text-navy focus:outline-none focus:border-aqua">
            <option value="all">Semua Level</option>
            <option value="Beginner">Beginner</option>
            <option value="Basic">Basic</option>
            <option value="Intermediate">Intermediate</option>
            <option value="Advanced">Advanced</option>
          </select>
        </div>
      </div>

      <!-- Schedule Cards Grid -->
      <div id="schedule-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 reveal">
        <!-- Rendered dynamically by JS -->
      </div>
    </div>
  </section>

  <!-- ==================== INSTRUCTOR PROFILES ==================== -->
  <section id="instruktur-section" data-section="jadwal" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center max-w-3xl mx-auto mb-14 reveal">
        <span class="inline-block px-4 py-1.5 rounded-full bg-sunny/60 text-navy font-extrabold text-xs uppercase tracking-wider mb-3">
          Tim Pelatih Profesional
        </span>
        <h2 class="font-display text-3xl sm:text-4xl font-bold text-navy">
          Kenalan dengan <span class="text-aqua">Coach Sahabat Air</span> Kami
        </h2>
        <p class="mt-3 text-navy/75">
          Seluruh pelatih TirtaCeria memiliki sertifikasi kepelatihan renang resmi, lisensi Baby Aquatics, serta sertifikat Pertolongan Pertama & CPR.
        </p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-7 reveal">
        <!-- Coach 1 -->
        <div class="group bg-bgLight rounded-[2rem] p-5 border-2 border-mint/50 hover:border-aqua transition-all hover:-translate-y-2 shadow-sm">
          <div class="relative mb-4 overflow-hidden rounded-3xl aspect-[4/4]">
            <img
              src="https://images.unsplash.com/photo-1594381898411-846e7d193883?auto=format&fit=crop&w=600&q=80"
              onerror="this.src='https://placehold.co/400x400/18B6B0/FFFFFF?text=Coach+Nadia'"
              alt="Coach Nadia Putri - Spesialis Baby dan Toddler Swimming"
              class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
            />
            <span class="absolute top-3 left-3 px-3 py-1 rounded-full bg-coral text-white text-xs font-bold shadow">
              8 Thn Pengalaman
            </span>
          </div>
          <h3 class="font-display text-xl font-bold text-navy">Coach Nadia Putri</h3>
          <p class="text-xs font-extrabold text-aquaDark uppercase tracking-wide mt-0.5">Head of Baby & Toddler Swim</p>
          <p class="text-xs text-navy/75 mt-3 leading-relaxed">
            Sabar, ekspresif, dan ahli metode stimulasi sensorik bayi di air. Membantu ratusan bayi & batita mencintai air sejak dini.
          </p>
          <div class="mt-4 flex flex-wrap gap-1.5">
            <span class="px-2.5 py-1 rounded-lg bg-white text-[11px] font-bold text-navy border border-mint">WABC Baby Certified</span>
            <span class="px-2.5 py-1 rounded-lg bg-white text-[11px] font-bold text-navy border border-mint">Pediatric CPR</span>
          </div>
        </div>

        <!-- Coach 2 -->
        <div class="group bg-bgLight rounded-[2rem] p-5 border-2 border-mint/50 hover:border-aqua transition-all hover:-translate-y-2 shadow-sm">
          <div class="relative mb-4 overflow-hidden rounded-3xl aspect-[4/4]">
            <img
              src="https://images.unsplash.com/photo-1568602471122-7832951cc4c5?auto=format&fit=crop&w=600&q=80"
              onerror="this.src='https://placehold.co/400x400/0B3948/FFFFFF?text=Coach+Raka'"
              alt="Coach Raka Pratama - Spesialis Kids dan Competitive Strokes"
              class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
            />
            <span class="absolute top-3 left-3 px-3 py-1 rounded-full bg-aqua text-white text-xs font-bold shadow">
              10 Thn Pengalaman
            </span>
          </div>
          <h3 class="font-display text-xl font-bold text-navy">Coach Raka Pratama</h3>
          <p class="text-xs font-extrabold text-aquaDark uppercase tracking-wide mt-0.5">Kids & Competitive Coach</p>
          <p class="text-xs text-navy/75 mt-3 leading-relaxed">
            Mantan atlet renang daerah yang berfokus pada penyempurnaan 4 gaya renang anak dan remaja dengan pendekatan fun-drill.
          </p>
          <div class="mt-4 flex flex-wrap gap-1.5">
            <span class="px-2.5 py-1 rounded-lg bg-white text-[11px] font-bold text-navy border border-mint">Lisensi PRSI Nasional</span>
            <span class="px-2.5 py-1 rounded-lg bg-white text-[11px] font-bold text-navy border border-mint">Lifeguard Pro</span>
          </div>
        </div>

        <!-- Coach 3 -->
        <div class="group bg-bgLight rounded-[2rem] p-5 border-2 border-mint/50 hover:border-aqua transition-all hover:-translate-y-2 shadow-sm">
          <div class="relative mb-4 overflow-hidden rounded-3xl aspect-[4/4]">
            <img
              src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=600&q=80"
              onerror="this.src='https://placehold.co/400x400/FF8066/FFFFFF?text=Coach+Clara'"
              alt="Coach Clara Wijaya - Spesialis Adult Hydrophobia dan Teknik"
              class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
            />
            <span class="absolute top-3 left-3 px-3 py-1 rounded-full bg-sunny text-navy text-xs font-bold shadow">
              7 Thn Pengalaman
            </span>
          </div>
          <h3 class="font-display text-xl font-bold text-navy">Coach Clara Wijaya</h3>
          <p class="text-xs font-extrabold text-aquaDark uppercase tracking-wide mt-0.5">Adult Hydrophobia & Stamina</p>
          <p class="text-xs text-navy/75 mt-3 leading-relaxed">
            Spesialis membantu peserta dewasa mengatasi trauma/takut air dalam serta koreksi teknik pernapasan & efisiensi gaya dada/bebas.
          </p>
          <div class="mt-4 flex flex-wrap gap-1.5">
            <span class="px-2.5 py-1 rounded-lg bg-white text-[11px] font-bold text-navy border border-mint">ASCA Level 2</span>
            <span class="px-2.5 py-1 rounded-lg bg-white text-[11px] font-bold text-navy border border-mint">First Aid & AED</span>
          </div>
        </div>

        <!-- Coach 4 -->
        <div class="group bg-bgLight rounded-[2rem] p-5 border-2 border-mint/50 hover:border-aqua transition-all hover:-translate-y-2 shadow-sm">
          <div class="relative mb-4 overflow-hidden rounded-3xl aspect-[4/4]">
            <img
              src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=600&q=80"
              onerror="this.src='https://placehold.co/400x400/8CE0D5/0B3948?text=Coach+Dimas'"
              alt="Coach Dimas Saputra - Spesialis Kids Confidence dan Teen Endurance"
              class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
            />
            <span class="absolute top-3 left-3 px-3 py-1 rounded-full bg-navy text-white text-xs font-bold shadow">
              6 Thn Pengalaman
            </span>
          </div>
          <h3 class="font-display text-xl font-bold text-navy">Coach Dimas Saputra</h3>
          <p class="text-xs font-extrabold text-aquaDark uppercase tracking-wide mt-0.5">Water Safety & Teen Coach</p>
          <p class="text-xs text-navy/75 mt-3 leading-relaxed">
            Enerjik dan komunikatif. Mengajarkan teknik water survival, loncat indah dasar, serta peningkatan daya tahan kardio remaja.
          </p>
          <div class="mt-4 flex flex-wrap gap-1.5">
            <span class="px-2.5 py-1 rounded-lg bg-white text-[11px] font-bold text-navy border border-mint">Water Safety Instructor</span>
            <span class="px-2.5 py-1 rounded-lg bg-white text-[11px] font-bold text-navy border border-mint">BLS Certified</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ==================== SWIMMING POOL FACILITIES (BENTO GALLERY) ==================== -->
  <section id="fasilitas-section" data-section="jadwal" class="py-20 bg-gradient-to-b from-bgLight to-[#E6F7F4]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center max-w-3xl mx-auto mb-14 reveal">
        <span class="inline-block px-4 py-1.5 rounded-full bg-aqua/15 text-aquaDark font-extrabold text-xs uppercase tracking-wider mb-3">
          Standar Higienis & Ramah Keluarga
        </span>
        <h2 class="font-display text-3xl sm:text-4xl font-bold text-navy">
          Fasilitas Kolam Renang <span class="text-coral">Indoor & Semi-Indoor</span>
        </h2>
        <p class="mt-3 text-navy/75">
          Dirancang khusus untuk kenyamanan bayi, anak, dan orang tua pendamping dengan sistem filtrasi UV + Ozon yang lembut di kulit dan mata.
        </p>
      </div>

      <!-- Bento Grid Facilities -->
      <div class="grid grid-cols-1 md:grid-cols-12 gap-6 reveal">
        <!-- Main Pool Card (7 cols) -->
        <div class="md:col-span-7 relative rounded-[2rem] overflow-hidden shadow-lg group min-h-[320px]">
          <img
            src="https://images.unsplash.com/photo-1576013551627-0cc20b96c2a7?auto=format&fit=crop&w=1000&q=80"
            onerror="this.src='https://placehold.co/800x500/18B6B0/FFFFFF?text=Kolam+Utama+dan+Baby+Pool'"
            alt="Kolam Renang Utama TirtaCeria dengan air jernih"
            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
          />
          <div class="absolute inset-0 bg-gradient-to-t from-navy/85 via-navy/25 to-transparent"></div>
          <div class="absolute bottom-6 left-6 right-6 text-white">
            <div class="flex flex-wrap gap-2 mb-2">
              <span class="px-3 py-1 rounded-full bg-aqua text-xs font-bold">Kedalaman 0.6m – 1.8m</span>
              <span class="px-3 py-1 rounded-full bg-coral text-xs font-bold">Baby Pool Hangat 31°–32°C</span>
            </div>
            <h3 class="font-display text-2xl font-bold">Kolam Baby Warm-Water & Kolam Utama 25m</h3>
            <p class="text-sm text-white/85 mt-1">
              Terpisah antara kolam dangkal bersuhu hangat (32°C) khusus bayi/balita dan kolam 6 lintasan (28°C) untuk anak, remaja & dewasa.
            </p>
          </div>
        </div>

        <!-- Right Specs & Secondary Facilities (5 cols) -->
        <div class="md:col-span-5 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-1 gap-6">
          <!-- Warm Shower & Family Changing Room -->
          <div class="bg-white rounded-[2rem] p-6 border-2 border-mint/60 shadow-sm flex flex-col justify-between">
            <div class="flex items-start justify-between gap-4">
              <div>
                <span class="text-xs font-extrabold text-coral uppercase">Higienis & Nyaman</span>
                <h4 class="font-display text-xl font-bold text-navy mt-1">Shower Air Hangat & Ruang Ganti Keluarga</h4>
                <p class="text-xs text-navy/75 mt-2 leading-relaxed">
                  Tersedia 14 bilik shower water heater, baby changing table (meja ganti popok), pengering rambut, dan loker pribadi.
                </p>
              </div>
              <div class="w-12 h-12 rounded-2xl bg-sunny/60 flex items-center justify-center text-2xl flex-shrink-0 animate-bob">
                🚿
              </div>
            </div>
          </div>

          <!-- Waiting Lounge -->
          <div class="bg-white rounded-[2rem] p-6 border-2 border-mint/60 shadow-sm flex flex-col justify-between">
            <div class="flex items-start justify-between gap-4">
              <div>
                <span class="text-xs font-extrabold text-aquaDark uppercase">Parents Comfort</span>
                <h4 class="font-display text-xl font-bold text-navy mt-1">Viewing Deck & Area Tunggu Ber-AC</h4>
                <p class="text-xs text-navy/75 mt-2 leading-relaxed">
                  Orang tua dapat memantau latihan anak dari ruang tunggu kaca ber-AC dilengkapi Wi-Fi gratis, charging station, dan healthy snack corner.
                </p>
              </div>
              <div class="w-12 h-12 rounded-2xl bg-mint/40 flex items-center justify-center text-2xl flex-shrink-0 animate-bob">
                ☕
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Quick Facility Badges Strip -->
      <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mt-6 reveal">
        <div class="bg-white/90 rounded-2xl p-4 border border-mint/60 flex items-center gap-3">
          <span class="text-2xl">🌡️</span>
          <div>
            <p class="font-bold text-sm text-navy">Suhu Terkontrol</p>
            <p class="text-xs text-navy/70">32°C Baby / 28°C Reguler</p>
          </div>
        </div>
        <div class="bg-white/90 rounded-2xl p-4 border border-mint/60 flex items-center gap-3">
          <span class="text-2xl">💧</span>
          <div>
            <p class="font-bold text-sm text-navy">UV + Ozone Filter</p>
            <p class="text-xs text-navy/70">Minim Klorin, Aman Mata</p>
          </div>
        </div>
        <div class="bg-white/90 rounded-2xl p-4 border border-mint/60 flex items-center gap-3">
          <span class="text-2xl">🛟</span>
          <div>
            <p class="font-bold text-sm text-navy">Alat Bantu Lengkap</p>
            <p class="text-xs text-navy/70">Kickboard, Noodle, Fin</p>
          </div>
        </div>
        <div class="bg-white/90 rounded-2xl p-4 border border-mint/60 flex items-center gap-3">
          <span class="text-2xl">🅿️</span>
          <div>
            <p class="font-bold text-sm text-navy">Parkir Luas & Aman</p>
            <p class="text-xs text-navy/70">Akses Stroller Friendly</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ==================== CLASS PACKAGES & PRICING ==================== -->
  <section id="paket-section" data-section="paket" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center max-w-3xl mx-auto mb-14 reveal">
        <span class="inline-block px-4 py-1.5 rounded-full bg-coral/15 text-coralDark font-extrabold text-xs uppercase tracking-wider mb-3">
          Pilihan Paket Fleksibel
        </span>
        <h2 class="font-display text-3xl sm:text-4xl font-bold text-navy">
          Paket Kelas Renang <span class="text-aqua">Sesuai Kebutuhan</span>
        </h2>
        <p class="mt-3 text-navy/75">
          Mulai dari sesi percobaan (Trial Class), kelas grup yang seru, hingga latihan privat intensif 1-on-1.
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 reveal">
        <!-- Package 1: Trial Class -->
        <div class="bg-bgLight rounded-[2rem] p-6 border-2 border-mint/60 flex flex-col justify-between hover:border-aqua transition-all">
          <div>
            <span class="inline-block px-3 py-1 rounded-full bg-sunny text-navy text-xs font-extrabold">Coba Dulu</span>
            <h3 class="font-display text-2xl font-bold text-navy mt-3">Trial Class</h3>
            <p class="text-xs text-navy/70 mt-1">1x Pertemuan + Placement Assessment</p>
            <div class="my-5">
              <span class="font-display text-3xl font-bold text-navy">Rp 125.000</span>
              <span class="text-xs text-navy/60"> / sesi</span>
            </div>
            <ul class="space-y-2.5 text-xs font-medium text-navy/85">
              <li class="flex items-center gap-2"><span class="text-aqua font-bold">✓</span> Durasi 30–45 menit sesuai usia</li>
              <li class="flex items-center gap-2"><span class="text-aqua font-bold">✓</span> Evaluasi level kemampuan awal</li>
              <li class="flex items-center gap-2"><span class="text-aqua font-bold">✓</span> Pinjam kickboard & pelampung</li>
              <li class="flex items-center gap-2"><span class="text-aqua font-bold">✓</span> Voucher diskon Rp 50rb lanjut paket</li>
            </ul>
          </div>
          <button onclick="selectPackageAndScroll('Trial Class (1x Sesi) - Rp 125.000')" class="mt-6 w-full py-3 rounded-xl bg-white hover:bg-aqua hover:text-white text-navy font-bold text-sm border-2 border-aqua transition-all">
            Pilih Trial Class
          </button>
        </div>

        <!-- Package 2: Regular Group Class (Popular) -->
        <div class="bg-navy text-white rounded-[2rem] p-6 border-4 border-sunny shadow-xl flex flex-col justify-between relative lg:-translate-y-2">
          <div class="absolute -top-3.5 right-6 px-3.5 py-1 rounded-full bg-coral text-white text-xs font-extrabold shadow">
            Paling Favorit
          </div>
          <div>
            <span class="inline-block px-3 py-1 rounded-full bg-aqua/25 text-mint text-xs font-extrabold">Group Class (Maks 4-6)</span>
            <h3 class="font-display text-2xl font-bold text-white mt-3">Regular Paket 8x</h3>
            <p class="text-xs text-white/75 mt-1">2x Seminggu • Berlaku 60 Hari</p>
            <div class="my-5">
              <span class="font-display text-3xl font-bold text-sunny">Rp 880.000</span>
              <span class="text-xs text-white/70"> / 8 sesi</span>
            </div>
            <ul class="space-y-2.5 text-xs font-medium text-white/90">
              <li class="flex items-center gap-2"><span class="text-sunny font-bold">✓</span> Hemat Rp 110rb per sesi</li>
              <li class="flex items-center gap-2"><span class="text-sunny font-bold">✓</span> Buku Rapor Digital (Swim Passport)</li>
              <li class="flex items-center gap-2"><span class="text-sunny font-bold">✓</span> Gratis 2x Make-up Class jika sakit</li>
              <li class="flex items-center gap-2"><span class="text-sunny font-bold">✓</span> Sertifikat kelulusan tiap level</li>
            </ul>
          </div>
          <button onclick="selectPackageAndScroll('Regular Group (8x Pertemuan) - Rp 880.000')" class="mt-6 w-full py-3.5 rounded-xl bg-coral hover:bg-coralDark text-white font-bold text-sm shadow-lg transition-all">
            Pilih Paket Regular
          </button>
        </div>

        <!-- Package 3: Private Lesson -->
        <div class="bg-bgLight rounded-[2rem] p-6 border-2 border-mint/60 flex flex-col justify-between hover:border-aqua transition-all">
          <div>
            <span class="inline-block px-3 py-1 rounded-full bg-aqua/20 text-aquaDark text-xs font-extrabold">1-on-1 Intensif</span>
            <h3 class="font-display text-2xl font-bold text-navy mt-3">Private Lesson</h3>
            <p class="text-xs text-navy/70 mt-1">Paket 4x Pertemuan • Jadwal Fleksibel</p>
            <div class="my-5">
              <span class="font-display text-3xl font-bold text-navy">Rp 950.000</span>
              <span class="text-xs text-navy/60"> / 4 sesi</span>
            </div>
            <ul class="space-y-2.5 text-xs font-medium text-navy/85">
              <li class="flex items-center gap-2"><span class="text-aqua font-bold">✓</span> 1 Pelatih khusus 1 Peserta</li>
              <li class="flex items-center gap-2"><span class="text-aqua font-bold">✓</span> Cocok untuk terapi takut air / atlet</li>
              <li class="flex items-center gap-2"><span class="text-aqua font-bold">✓</span> Bebas pilih hari & jam latihan</li>
              <li class="flex items-center gap-2"><span class="text-aqua font-bold">✓</span> Video analisis gerakan bawah air</li>
            </ul>
          </div>
          <button onclick="selectPackageAndScroll('Private Lesson 1-on-1 (4x Sesi) - Rp 950.000')" class="mt-6 w-full py-3 rounded-xl bg-white hover:bg-aqua hover:text-white text-navy font-bold text-sm border-2 border-aqua transition-all">
            Pilih Private Lesson
          </button>
        </div>

        <!-- Package 4: Monthly Membership -->
        <div class="bg-bgLight rounded-[2rem] p-6 border-2 border-mint/60 flex flex-col justify-between hover:border-aqua transition-all">
          <div>
            <span class="inline-block px-3 py-1 rounded-full bg-coral/15 text-coralDark text-xs font-extrabold">Unlimited Access</span>
            <h3 class="font-display text-2xl font-bold text-navy mt-3">Monthly Club</h3>
            <p class="text-xs text-navy/70 mt-1">Hingga 12x Kelas + Free Swim</p>
            <div class="my-5">
              <span class="font-display text-3xl font-bold text-navy">Rp 1.250.000</span>
              <span class="text-xs text-navy/60"> / bulan</span>
            </div>
            <ul class="space-y-2.5 text-xs font-medium text-navy/85">
              <li class="flex items-center gap-2"><span class="text-aqua font-bold">✓</span> Latihan 3x seminggu terjadwal</li>
              <li class="flex items-center gap-2"><span class="text-aqua font-bold">✓</span> Gratis akses latihan mandiri akhir pekan</li>
              <li class="flex items-center gap-2"><span class="text-aqua font-bold">✓</span> Gratis Topi Renang TirtaCeria</li>
              <li class="flex items-center gap-2"><span class="text-aqua font-bold">✓</span> Prioritas kuota jam favorit</li>
            </ul>
          </div>
          <button onclick="selectPackageAndScroll('Monthly Membership (Unlimited) - Rp 1.250.000')" class="mt-6 w-full py-3 rounded-xl bg-white hover:bg-aqua hover:text-white text-navy font-bold text-sm border-2 border-aqua transition-all">
            Pilih Membership
          </button>
        </div>
      </div>
    </div>
  </section>

  <!-- ==================== 7-STEP INTERACTIVE BOOKING & RESERVATION WIZARD ==================== -->
  <section id="booking-section" data-section="paket" class="py-20 bg-gradient-to-br from-[#E2F7F4] via-[#F5FBF8] to-[#FFF6DF] relative overflow-hidden">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
      <div class="text-center max-w-2xl mx-auto mb-10 reveal">
        <span class="inline-block px-4 py-1.5 rounded-full bg-aqua text-white font-extrabold text-xs uppercase tracking-wider mb-3 shadow-sm">
          Reservasi Mudah & Instan
        </span>
        <h2 class="font-display text-3xl sm:text-4xl font-bold text-navy">
          Formulir Pendaftaran Kelas <span class="text-coral">7 Langkah</span>
        </h2>
        <p class="mt-2 text-navy/75 text-sm sm:text-base">
          Lengkapi pilihan program, jadwal, dan data peserta. Sistem akan otomatis merangkum rincian reservasi untuk dikirim ke WhatsApp Admin.
        </p>
      </div>

      <!-- Wizard Container -->
      <div class="bg-white rounded-[2.2rem] shadow-2xl border-2 border-mint/70 overflow-hidden reveal">
        <!-- 7-Step Progress Header -->
        <div class="bg-navy text-white px-5 sm:px-8 py-5">
          <div class="flex items-center justify-between text-xs font-bold mb-3">
            <span id="wizard-step-label" class="text-sunny uppercase tracking-wider">Langkah 1 dari 7: Kategori Peserta</span>
            <span id="wizard-progress-text" class="text-mint">14% Selesai</span>
          </div>
          <div class="w-full h-2.5 bg-white/15 rounded-full overflow-hidden">
            <div id="wizard-progress-bar" class="h-full bg-gradient-to-r from-aqua via-sunny to-coral transition-all duration-500 rounded-full" style="width: 14.28%"></div>
          </div>
          <!-- Step Pills -->
          <div class="grid grid-cols-7 gap-1.5 mt-4">
            <button onclick="goToStep(1)" class="step-dot h-2 rounded-full bg-sunny transition-all" title="1. Kategori"></button>
            <button onclick="goToStep(2)" class="step-dot h-2 rounded-full bg-white/25 transition-all" title="2. Program & Level"></button>
            <button onclick="goToStep(3)" class="step-dot h-2 rounded-full bg-white/25 transition-all" title="3. Jadwal & Pelatih"></button>
            <button onclick="goToStep(4)" class="step-dot h-2 rounded-full bg-white/25 transition-all" title="4. Data Peserta"></button>
            <button onclick="goToStep(5)" class="step-dot h-2 rounded-full bg-white/25 transition-all" title="5. Paket Kelas"></button>
            <button onclick="goToStep(6)" class="step-dot h-2 rounded-full bg-white/25 transition-all" title="6. Ringkasan"></button>
            <button onclick="goToStep(7)" class="step-dot h-2 rounded-full bg-white/25 transition-all" title="7. Kirim WhatsApp"></button>
          </div>
        </div>

        <!-- Wizard Body -->
        <div class="p-6 sm:p-10">
          <!-- STEP 1: Kategori Peserta -->
          <div id="step-1" class="wizard-step space-y-5">
            <h3 class="font-display text-2xl font-bold text-navy">1. Pilih Kategori Usia Peserta</h3>
            <p class="text-sm text-navy/70">Pilih kelompok usia calon siswa agar kami menyesuaikan suhu kolam dan rasio pelatih.</p>
            <div class="grid grid-cols-1 sm:grid-cols-3 lg:grid-cols-5 gap-3.5 pt-2">
              <label class="cursor-pointer">
                <input type="radio" name="bk_category" value="Baby (6-24 Bulan)" class="peer sr-only" checked onchange="updateBookingState()" />
                <div class="p-4 rounded-2xl border-2 border-mint/60 peer-checked:border-aqua peer-checked:bg-aqua/10 text-center transition-all hover:border-aqua">
                  <div class="text-3xl mb-2">👶</div>
                  <p class="font-display font-bold text-navy">Baby</p>
                  <p class="text-xs text-navy/65">6–24 Bulan</p>
                </div>
              </label>
              <label class="cursor-pointer">
                <input type="radio" name="bk_category" value="Toddler (2-4 Tahun)" class="peer sr-only" onchange="updateBookingState()" />
                <div class="p-4 rounded-2xl border-2 border-mint/60 peer-checked:border-aqua peer-checked:bg-aqua/10 text-center transition-all hover:border-aqua">
                  <div class="text-3xl mb-2">🦆</div>
                  <p class="font-display font-bold text-navy">Toddler</p>
                  <p class="text-xs text-navy/65">2–4 Tahun</p>
                </div>
              </label>
              <label class="cursor-pointer">
                <input type="radio" name="bk_category" value="Kids (5-12 Tahun)" class="peer sr-only" onchange="updateBookingState()" />
                <div class="p-4 rounded-2xl border-2 border-mint/60 peer-checked:border-aqua peer-checked:bg-aqua/10 text-center transition-all hover:border-aqua">
                  <div class="text-3xl mb-2">🥽</div>
                  <p class="font-display font-bold text-navy">Kids</p>
                  <p class="text-xs text-navy/65">5–12 Tahun</p>
                </div>
              </label>
              <label class="cursor-pointer">
                <input type="radio" name="bk_category" value="Teens (13-17 Tahun)" class="peer sr-only" onchange="updateBookingState()" />
                <div class="p-4 rounded-2xl border-2 border-mint/60 peer-checked:border-aqua peer-checked:bg-aqua/10 text-center transition-all hover:border-aqua">
                  <div class="text-3xl mb-2">🏅</div>
                  <p class="font-display font-bold text-navy">Teens</p>
                  <p class="text-xs text-navy/65">13–17 Tahun</p>
                </div>
              </label>
              <label class="cursor-pointer">
                <input type="radio" name="bk_category" value="Adults (18+ Tahun)" class="peer sr-only" onchange="updateBookingState()" />
                <div class="p-4 rounded-2xl border-2 border-mint/60 peer-checked:border-aqua peer-checked:bg-aqua/10 text-center transition-all hover:border-aqua">
                  <div class="text-3xl mb-2">🏊‍♂️</div>
                  <p class="font-display font-bold text-navy">Adults</p>
                  <p class="text-xs text-navy/65">18+ Tahun</p>
                </div>
              </label>
            </div>
          </div>

          <!-- STEP 2: Program & Level -->
          <div id="step-2" class="wizard-step hidden space-y-6">
            <h3 class="font-display text-2xl font-bold text-navy">2. Pilih Program & Level Kemampuan</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <div>
                <label class="block text-xs font-extrabold uppercase text-navy/70 mb-2">Level Kemampuan</label>
                <div class="space-y-2.5">
                  <label class="flex items-center gap-3 p-3.5 rounded-2xl border-2 border-mint/60 cursor-pointer hover:border-aqua">
                    <input type="radio" name="bk_level" value="Beginner (Pengenalan Air)" class="accent-aqua w-4 h-4" checked onchange="updateBookingState()" />
                    <div>
                      <p class="font-bold text-sm text-navy">Beginner</p>
                      <p class="text-xs text-navy/65">Belum bisa berenang / adaptasi air</p>
                    </div>
                  </label>
                  <label class="flex items-center gap-3 p-3.5 rounded-2xl border-2 border-mint/60 cursor-pointer hover:border-aqua">
                    <input type="radio" name="bk_level" value="Basic (Meluncur & Napas)" class="accent-aqua w-4 h-4" onchange="updateBookingState()" />
                    <div>
                      <p class="font-bold text-sm text-navy">Basic</p>
                      <p class="text-xs text-navy/65">Sudah berani masuk air & belajar meluncur</p>
                    </div>
                  </label>
                  <label class="flex items-center gap-3 p-3.5 rounded-2xl border-2 border-mint/60 cursor-pointer hover:border-aqua">
                    <input type="radio" name="bk_level" value="Intermediate (Gaya Bebas & Punggung)" class="accent-aqua w-4 h-4" onchange="updateBookingState()" />
                    <div>
                      <p class="font-bold text-sm text-navy">Intermediate</p>
                      <p class="text-xs text-navy/65">Bisa berenang 15-25m, perbaiki gaya</p>
                    </div>
                  </label>
                  <label class="flex items-center gap-3 p-3.5 rounded-2xl border-2 border-mint/60 cursor-pointer hover:border-aqua">
                    <input type="radio" name="bk_level" value="Advanced / Professional" class="accent-aqua w-4 h-4" onchange="updateBookingState()" />
                    <div>
                      <p class="font-bold text-sm text-navy">Advanced / Professional</p>
                      <p class="text-xs text-navy/65">4 Gaya renang, stamina & persiapan lomba</p>
                    </div>
                  </label>
                </div>
              </div>

              <div>
                <label class="block text-xs font-extrabold uppercase text-navy/70 mb-2">Format Kelas</label>
                <div class="space-y-3">
                  <label class="flex items-start gap-3 p-4 rounded-2xl border-2 border-mint/60 cursor-pointer hover:border-aqua">
                    <input type="radio" name="bk_format" value="Group Class (Rasio 1:4 - 1:6)" class="accent-aqua w-4 h-4 mt-1" checked onchange="updateBookingState()" />
                    <div>
                      <p class="font-bold text-sm text-navy">Group Class (Kelompok Kecil)</p>
                      <p class="text-xs text-navy/65 mt-0.5">Belajar seru bersama teman sebaya. Maksimal 4 bayi atau 6 anak/dewasa per pelatih.</p>
                    </div>
                  </label>
                  <label class="flex items-start gap-3 p-4 rounded-2xl border-2 border-mint/60 cursor-pointer hover:border-aqua">
                    <input type="radio" name="bk_format" value="Private Lesson (1-on-1 Eksklusif)" class="accent-aqua w-4 h-4 mt-1" onchange="updateBookingState()" />
                    <div>
                      <p class="font-bold text-sm text-navy">Private Lesson (1-on-1)</p>
                      <p class="text-xs text-navy/65 mt-0.5">Fokus penuh 1 pelatih untuk 1 peserta. Sangat efektif untuk bayi sensitif atau dewasa takut air.</p>
                    </div>
                  </label>
                </div>
              </div>
            </div>
          </div>

          <!-- STEP 3: Jadwal & Instruktur -->
          <div id="step-3" class="wizard-step hidden space-y-5">
            <h3 class="font-display text-2xl font-bold text-navy">3. Pilih Jadwal, Lokasi Kolam & Instruktur</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
              <div>
                <label class="block text-xs font-extrabold uppercase text-navy/70 mb-1.5">Pilihan Hari & Jam</label>
                <select id="bk_schedule" onchange="updateBookingState()" class="w-full p-3.5 rounded-2xl bg-bgLight border-2 border-mint/60 font-bold text-sm text-navy focus:outline-none focus:border-aqua">
                  <option value="Selasa & Kamis • 09:00 WIB (Pagi)">Selasa & Kamis • 09:00 WIB (Pagi)</option>
                  <option value="Selasa & Kamis • 16:00 WIB (Sore)">Selasa & Kamis • 16:00 WIB (Sore)</option>
                  <option value="Sabtu • 08:30 WIB (Weekend Pagi)">Sabtu • 08:30 WIB (Weekend Pagi)</option>
                  <option value="Sabtu • 10:30 WIB (Weekend Siang)">Sabtu • 10:30 WIB (Weekend Siang)</option>
                  <option value="Minggu • 09:00 WIB (Family Sunday)">Minggu • 09:00 WIB (Family Sunday)</option>
                  <option value="Fleksibel (Khusus Private Lesson)">Fleksibel (Khusus Private Lesson)</option>
                </select>
              </div>
              <div>
                <label class="block text-xs font-extrabold uppercase text-navy/70 mb-1.5">Lokasi Kolam</label>
                <select id="bk_pool" onchange="updateBookingState()" class="w-full p-3.5 rounded-2xl bg-bgLight border-2 border-mint/60 font-bold text-sm text-navy focus:outline-none focus:border-aqua">
                  <option value="TirtaCeria Arena Selatan (Indoor Warm Pool 32°C)">TirtaCeria Arena Selatan (Indoor Warm Pool 32°C)</option>
                  <option value="TirtaCeria Aquatic Center Barat (Semi-Indoor 25m)">TirtaCeria Aquatic Center Barat (Semi-Indoor 25m)</option>
                </select>
              </div>
              <div>
                <label class="block text-xs font-extrabold uppercase text-navy/70 mb-1.5">Pilih Instruktur</label>
                <select id="bk_instructor" onchange="updateBookingState()" class="w-full p-3.5 rounded-2xl bg-bgLight border-2 border-mint/60 font-bold text-sm text-navy focus:outline-none focus:border-aqua">
                  <option value="Coach Nadia Putri (Spesialis Baby & Toddler)">Coach Nadia Putri (Spesialis Baby & Toddler)</option>
                  <option value="Coach Raka Pratama (Kids & Competitive)">Coach Raka Pratama (Kids & Competitive)</option>
                  <option value="Coach Clara Wijaya (Adult & Hydrophobia)">Coach Clara Wijaya (Adult & Hydrophobia)</option>
                  <option value="Coach Dimas Saputra (Water Safety & Teens)">Coach Dimas Saputra (Water Safety & Teens)</option>
                  <option value="Rekomendasikan Pelatih Terbaik">Rekomendasikan Pelatih Terbaik</option>
                </select>
              </div>
              <div>
                <label class="block text-xs font-extrabold uppercase text-navy/70 mb-1.5">Jumlah Peserta</label>
                <select id="bk_participants" onchange="updateBookingState()" class="w-full p-3.5 rounded-2xl bg-bgLight border-2 border-mint/60 font-bold text-sm text-navy focus:outline-none focus:border-aqua">
                  <option value="1 Peserta">1 Peserta</option>
                  <option value="2 Peserta (Kakak-Adik / Pasangan)">2 Peserta (Kakak-Adik / Pasangan)</option>
                  <option value="3 Peserta (Mini Group)">3 Peserta (Mini Group)</option>
                </select>
              </div>
            </div>
          </div>

          <!-- STEP 4: Data Peserta -->
          <div id="step-4" class="wizard-step hidden space-y-5">
            <h3 class="font-display text-2xl font-bold text-navy">4. Isi Data Peserta</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
              <div>
                <label class="block text-xs font-extrabold uppercase text-navy/70 mb-1.5">Nama Lengkap Peserta *</label>
                <input id="bk_name" type="text" placeholder="Contoh: Kenzo Alfarizi" oninput="updateBookingState()" class="w-full p-3.5 rounded-2xl bg-bgLight border-2 border-mint/60 text-sm font-semibold text-navy focus:outline-none focus:border-aqua" />
              </div>
              <div>
                <label class="block text-xs font-extrabold uppercase text-navy/70 mb-1.5">Tanggal Lahir Peserta *</label>
                <input id="bk_dob" type="date" oninput="updateBookingState()" class="w-full p-3.5 rounded-2xl bg-bgLight border-2 border-mint/60 text-sm font-semibold text-navy focus:outline-none focus:border-aqua" />
              </div>
              <div id="parent-field-wrapper">
                <label class="block text-xs font-extrabold uppercase text-navy/70 mb-1.5">Nama Orang Tua / Wali (Wajib untuk Bayi/Anak)</label>
                <input id="bk_parent" type="text" placeholder="Contoh: Ibu Sarah Wijaya" oninput="updateBookingState()" class="w-full p-3.5 rounded-2xl bg-bgLight border-2 border-mint/60 text-sm font-semibold text-navy focus:outline-none focus:border-aqua" />
              </div>
              <div>
                <label class="block text-xs font-extrabold uppercase text-navy/70 mb-1.5">Nomor WhatsApp Aktif *</label>
                <input id="bk_wa" type="tel" placeholder="Contoh: 081234567890" oninput="updateBookingState()" class="w-full p-3.5 rounded-2xl bg-bgLight border-2 border-mint/60 text-sm font-semibold text-navy focus:outline-none focus:border-aqua" />
              </div>
              <div class="sm:col-span-2">
                <label class="block text-xs font-extrabold uppercase text-navy/70 mb-1.5">Pengalaman Berenang / Catatan Khusus</label>
                <input id="bk_exp" type="text" placeholder="Contoh: Baru pertama kali ke kolam besar / sedikit takut air dalam" oninput="updateBookingState()" class="w-full p-3.5 rounded-2xl bg-bgLight border-2 border-mint/60 text-sm font-semibold text-navy focus:outline-none focus:border-aqua" />
              </div>
            </div>
          </div>

          <!-- STEP 5: Pilih Paket Kelas -->
          <div id="step-5" class="wizard-step hidden space-y-5">
            <h3 class="font-display text-2xl font-bold text-navy">5. Pilih Paket Kelas</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
              <label class="cursor-pointer">
                <input type="radio" name="bk_package" value="Trial Class (1x Sesi) - Rp 125.000" data-price="125000" class="peer sr-only" onchange="updateBookingState()" />
                <div class="p-4 rounded-2xl border-2 border-mint/60 peer-checked:border-coral peer-checked:bg-coral/5 transition-all">
                  <div class="flex justify-between items-center">
                    <span class="font-display font-bold text-lg text-navy">Trial Class (1x Sesi)</span>
                    <span class="font-extrabold text-coral">Rp 125.000</span>
                  </div>
                  <p class="text-xs text-navy/70 mt-1">Termasuk tes penempatan level & konsultasi pelatih.</p>
                </div>
              </label>

              <label class="cursor-pointer">
                <input type="radio" name="bk_package" value="Regular Group (4x Pertemuan) - Rp 480.000" data-price="480000" class="peer sr-only" onchange="updateBookingState()" />
                <div class="p-4 rounded-2xl border-2 border-mint/60 peer-checked:border-coral peer-checked:bg-coral/5 transition-all">
                  <div class="flex justify-between items-center">
                    <span class="font-display font-bold text-lg text-navy">Regular 4x Pertemuan</span>
                    <span class="font-extrabold text-aquaDark">Rp 480.000</span>
                  </div>
                  <p class="text-xs text-navy/70 mt-1">1x seminggu (berlaku 35 hari) + Swim Passport.</p>
                </div>
              </label>

              <label class="cursor-pointer">
                <input type="radio" name="bk_package" value="Regular Group (8x Pertemuan) - Rp 880.000" data-price="880000" class="peer sr-only" checked onchange="updateBookingState()" />
                <div class="p-4 rounded-2xl border-2 border-mint/60 peer-checked:border-coral peer-checked:bg-coral/5 transition-all">
                  <div class="flex justify-between items-center">
                    <span class="font-display font-bold text-lg text-navy">Regular 8x Pertemuan ⭐</span>
                    <span class="font-extrabold text-aquaDark">Rp 880.000</span>
                  </div>
                  <p class="text-xs text-navy/70 mt-1">Paling hemat! 2x seminggu + 2x kuota Make-up Class.</p>
                </div>
              </label>

              <label class="cursor-pointer">
                <input type="radio" name="bk_package" value="Private Lesson 1-on-1 (4x Sesi) - Rp 950.000" data-price="950000" class="peer sr-only" onchange="updateBookingState()" />
                <div class="p-4 rounded-2xl border-2 border-mint/60 peer-checked:border-coral peer-checked:bg-coral/5 transition-all">
                  <div class="flex justify-between items-center">
                    <span class="font-display font-bold text-lg text-navy">Private Lesson (4x Sesi)</span>
                    <span class="font-extrabold text-aquaDark">Rp 950.000</span>
                  </div>
                  <p class="text-xs text-navy/70 mt-1">1 pelatih eksklusif untuk 1 peserta, jadwal fleksibel.</p>
                </div>
              </label>

              <label class="cursor-pointer sm:col-span-2">
                <input type="radio" name="bk_package" value="Monthly Membership (Unlimited) - Rp 1.250.000" data-price="1250000" class="peer sr-only" onchange="updateBookingState()" />
                <div class="p-4 rounded-2xl border-2 border-mint/60 peer-checked:border-coral peer-checked:bg-coral/5 transition-all">
                  <div class="flex justify-between items-center">
                    <span class="font-display font-bold text-lg text-navy">Monthly Club Membership (Unlimited)</span>
                    <span class="font-extrabold text-coral">Rp 1.250.000 / bln</span>
                  </div>
                  <p class="text-xs text-navy/70 mt-1">Latihan hingga 3x seminggu + Free Swim weekend + Gratis Topi Renang.</p>
                </div>
              </label>
            </div>
          </div>

          <!-- STEP 6: Ringkasan Reservasi -->
          <div id="step-6" class="wizard-step hidden space-y-5">
            <h3 class="font-display text-2xl font-bold text-navy">6. Ringkasan Reservasi Kelas</h3>
            <p class="text-sm text-navy/70">Periksa kembali detail pendaftaran Anda sebelum mengirim ke Admin WhatsApp.</p>
            <div id="booking-summary-card" class="bg-bgLight rounded-3xl p-6 border-2 border-aqua/40 space-y-3 text-sm">
              <!-- Populated dynamically -->
            </div>
          </div>

          <!-- STEP 7: Kirim Pendaftaran via WhatsApp -->
          <div id="step-7" class="wizard-step hidden space-y-5">
            <div class="text-center max-w-lg mx-auto">
              <div class="w-16 h-16 rounded-full bg-aqua/20 text-aquaDark flex items-center justify-center text-3xl mx-auto mb-3 animate-bounce">
                📲
              </div>
              <h3 class="font-display text-2xl font-bold text-navy">7. Siap Dikirim ke Admin WhatsApp!</h3>
              <p class="text-sm text-navy/75 mt-1">
                Klik tombol di bawah untuk membuka WhatsApp dengan format data reservasi yang sudah terisi otomatis.
              </p>
            </div>

            <div class="bg-navy text-white/95 rounded-2xl p-4 sm:p-5 font-mono text-xs leading-relaxed whitespace-pre-line border border-mint/30" id="wa-preview-box">
            </div>

            <div class="flex flex-col sm:flex-row gap-3 pt-2">
              <button onclick="sendBookingToWhatsApp()" class="flex-1 py-4 px-6 rounded-2xl bg-[#25D366] hover:bg-[#1ebe5d] text-white font-extrabold text-base shadow-lg flex items-center justify-center gap-2.5 transition-all">
                <span>💬 Kirim Pendaftaran via WhatsApp</span>
              </button>
              <button onclick="copyWhatsAppText()" class="py-4 px-5 rounded-2xl bg-bgLight hover:bg-mint/30 text-navy font-bold text-sm border-2 border-mint transition-all">
                📋 Salin Teks
              </button>
            </div>
            <p id="copy-feedback" class="text-center text-xs font-bold text-aquaDark hidden">✓ Teks reservasi berhasil disalin ke clipboard!</p>
          </div>

          <!-- Wizard Navigation Buttons -->
          <div class="flex items-center justify-between mt-8 pt-6 border-t border-mint/50">
            <button id="btn-prev-step" onclick="changeStep(-1)" class="px-5 py-3 rounded-xl bg-bgLight hover:bg-mint/30 text-navy font-bold text-sm disabled:opacity-40 transition-all" disabled>
              ← Sebelumnya
            </button>
            <button id="btn-next-step" onclick="changeStep(1)" class="px-7 py-3 rounded-xl bg-aqua hover:bg-aquaDark text-white font-bold text-sm shadow-md transition-all">
              Lanjut Langkah Berikutnya →
            </button>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ==================== PARENT INFO, SAFETY & HYGIENE, PROGRESS TRACKING & MAKE-UP CLASS ==================== -->
  <section id="panduan-section" data-section="panduan" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center max-w-3xl mx-auto mb-14 reveal">
        <span class="inline-block px-4 py-1.5 rounded-full bg-mint/40 text-navy font-extrabold text-xs uppercase tracking-wider mb-3">
          Kenyamanan, Keamanan & Transparansi
        </span>
        <h2 class="font-display text-3xl sm:text-4xl font-bold text-navy">
          Panduan Orang Tua, <span class="text-aqua">Safety & Rapor Renang</span>
        </h2>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 reveal">
        <!-- Left 7 Cols: Parent Info, Safety & Make-up Class -->
        <div class="lg:col-span-7 space-y-6">
          <!-- Parent Information Checklist -->
          <div class="bg-bgLight rounded-[2rem] p-6 sm:p-7 border-2 border-mint/60">
            <div class="flex items-center gap-3 mb-4">
              <span class="w-11 h-11 rounded-2xl bg-sunny flex items-center justify-center text-xl">🎒</span>
              <div>
                <h3 class="font-display text-xl font-bold text-navy">Parent Information & Perlengkapan</h3>
                <p class="text-xs text-navy/70">Checklist perlengkapan wajib sebelum masuk ke area kolam</p>
              </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-xs font-semibold text-navy/85">
              <div class="bg-white p-3.5 rounded-2xl border border-mint/50">
                <p class="font-extrabold text-aquaDark mb-1">👶 Khusus Baby & Toddler (6 Bln - 3 Thn)</p>
                <ul class="space-y-1">
                  <li>• Wajib memakai <strong>Reusable Swim Diaper</strong> (popok renang khusus anti bocor).</li>
                  <li>• 1 Orang tua/wali wajib ikut turun ke kolam mendampingi.</li>
                  <li>• Susui/beri makan ringan minimal 45 menit sebelum berenang.</li>
                </ul>
              </div>
              <div class="bg-white p-3.5 rounded-2xl border border-mint/50">
                <p class="font-extrabold text-coralDark mb-1">🥽 Kids, Teens & Adults</p>
                <ul class="space-y-1">
                  <li>• Baju renang berbahan lycra/spandex (bukan kaos katun).</li>
                  <li>• Kacamata renang anti-fog & topi renang (untuk rambut panjang).</li>
                  <li>• Handuk pribadi, sandal anti-slip, dan botol minum.</li>
                </ul>
              </div>
            </div>
          </div>

          <!-- Safety & Hygiene + Make-up Class Grid -->
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div class="bg-bgLight rounded-[2rem] p-6 border-2 border-mint/60">
              <div class="w-10 h-10 rounded-xl bg-aqua/20 text-aquaDark flex items-center justify-center text-xl mb-3">🛡️</div>
              <h4 class="font-display text-lg font-bold text-navy">Safety & Hygiene SOP</h4>
              <ul class="text-xs text-navy/80 space-y-2 mt-2.5 leading-relaxed">
                <li>• <strong>Lifeguard Siaga:</strong> Pengawas kolam bersertifikat selalu berjaga di tepi kolam.</li>
                <li>• <strong>Cek Kualitas Air 3x/Hari:</strong> Kadar pH & sanitasi UV-Ozon dipantau ketat.</li>
                <li>• <strong>Prosedur Darurat:</strong> Kotak P3K lengkap, oksigen portabel, dan jalur evakuasi jelas.</li>
              </ul>
            </div>

            <div class="bg-bgLight rounded-[2rem] p-6 border-2 border-mint/60">
              <div class="w-10 h-10 rounded-xl bg-coral/20 text-coralDark flex items-center justify-center text-xl mb-3">🔄</div>
              <h4 class="font-display text-lg font-bold text-navy">Kebijakan Make-up Class</h4>
              <ul class="text-xs text-navy/80 space-y-2 mt-2.5 leading-relaxed">
                <li>• <strong>Berhalangan / Sakit?</strong> Jadwal dapat diganti tanpa hangus.</li>
                <li>• <strong>Konfirmasi H-6 Jam:</strong> Infokan ke Admin WA maksimal 6 jam sebelum sesi dimulai.</li>
                <li>• <strong>Kuota Pengganti:</strong> Maksimal 2x sesi pengganti per siklus paket 8x pertemuan.</li>
              </ul>
            </div>
          </div>
        </div>

        <!-- Right 5 Cols: Interactive Progress Tracking Preview ("Swim Passport") -->
        <div class="lg:col-span-5">
          <div class="bg-gradient-to-br from-navy to-[#134E63] text-white rounded-[2.2rem] p-6 sm:p-8 shadow-xl border-4 border-mint/40 relative overflow-hidden">
            <div class="flex items-center justify-between mb-4">
              <div>
                <span class="text-[11px] font-extrabold uppercase tracking-widest text-sunny">Fitur Progress Tracking</span>
                <h3 class="font-display text-2xl font-bold mt-0.5">Digital Swim Passport</h3>
              </div>
              <span class="text-3xl animate-bob">🏅</span>
            </div>
            <p class="text-xs text-white/80 mb-5">
              Setiap siswa mendapatkan catatan perkembangan digital setelah sesi latihan. Coba klik tombol simulasi level di bawah:
            </p>

            <!-- Interactive Demo Switcher -->
            <div class="flex gap-2 mb-4">
              <button onclick="setPassportDemo('baby')" id="pass-btn-baby" class="px-3 py-1.5 rounded-xl text-xs font-bold bg-aqua text-white">Contoh: Baby</button>
              <button onclick="setPassportDemo('kids')" id="pass-btn-kids" class="px-3 py-1.5 rounded-xl text-xs font-bold bg-white/15 text-white hover:bg-white/25">Contoh: Kids</button>
              <button onclick="setPassportDemo('adult')" id="pass-btn-adult" class="px-3 py-1.5 rounded-xl text-xs font-bold bg-white/15 text-white hover:bg-white/25">Contoh: Adult</button>
            </div>

            <div id="swim-passport-card" class="bg-white/10 backdrop-blur-md rounded-2xl p-4 border border-white/20 space-y-3">
              <!-- Populated by JS -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ==================== TESTIMONIALS & FAQ ==================== -->
  <section id="testimoni-faq" data-section="panduan" class="py-20 bg-bgLight">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <!-- Testimonials -->
      <div class="text-center max-w-2xl mx-auto mb-12 reveal">
        <span class="inline-block px-4 py-1.5 rounded-full bg-coral/15 text-coralDark font-extrabold text-xs uppercase tracking-wider mb-3">
          Cerita Perkembangan Siswa
        </span>
        <h2 class="font-display text-3xl sm:text-4xl font-bold text-navy">
          Kata Orang Tua & <span class="text-aqua">Peserta Dewasa</span>
        </h2>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-20 reveal">
        <div class="bg-white rounded-3xl p-6 border-2 border-mint/50 shadow-sm">
          <div class="flex items-center gap-3 mb-4">
            <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?auto=format&fit=crop&w=200&q=80" onerror="this.src='https://placehold.co/100x100/FF8066/FFFFFF?text=Bunda+Rina'" alt="Bunda Rina" class="w-12 h-12 rounded-full object-cover" />
            <div>
              <p class="font-bold text-sm text-navy">Bunda Rina & Baby Arka (9 Bln)</p>
              <p class="text-xs text-coral font-bold">Program Baby Swimming</p>
            </div>
          </div>
          <p class="text-xs sm:text-sm text-navy/80 leading-relaxed">
            "Awalnya khawatir Arka kedinginan, ternyata kolam bayinya hangat banget 32°C! Coach Nadia sabar sekali ngajarin stimulasi air. Sekarang Arka tidur lebih nyenyak tiap habis berenang."
          </p>
          <div class="mt-4 text-sunny text-sm">★★★★★</div>
        </div>

        <div class="bg-white rounded-3xl p-6 border-2 border-mint/50 shadow-sm">
          <div class="flex items-center gap-3 mb-4">
            <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=200&q=80" onerror="this.src='https://placehold.co/100x100/18B6B0/FFFFFF?text=Pak+Hendra'" alt="Pak Hendra" class="w-12 h-12 rounded-full object-cover" />
            <div>
              <p class="font-bold text-sm text-navy">Bapak Hendra (Ayah Kayla, 7 Thn)</p>
              <p class="text-xs text-aquaDark font-bold">Kids Basic → Intermediate</p>
            </div>
          </div>
          <p class="text-xs sm:text-sm text-navy/80 leading-relaxed">
            "Dulu Kayla nangis tiap mukanya kena cipratan air. Dalam 8 pertemuan di TirtaCeria, dia sudah berani meluncur 15 meter dan mulai belajar gaya bebas. Rapor digitalnya juga jelas!"
          </p>
          <div class="mt-4 text-sunny text-sm">★★★★★</div>
        </div>

        <div class="bg-white rounded-3xl p-6 border-2 border-mint/50 shadow-sm">
          <div class="flex items-center gap-3 mb-4">
            <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=200&q=80" onerror="this.src='https://placehold.co/100x100/0B3948/FFFFFF?text=Dina'" alt="Dina Maharani" class="w-12 h-12 rounded-full object-cover" />
            <div>
              <p class="font-bold text-sm text-navy">Dina Maharani (29 Tahun)</p>
              <p class="text-xs text-aquaDark font-bold">Adult Private Lesson</p>
            </div>
          </div>
          <p class="text-xs sm:text-sm text-navy/80 leading-relaxed">
            "Usia 29 tahun baru berani belajar renang karena dulu pernah trauma tenggelam. Coach Clara ngajarin teknik mengapung dan pernapasan dari nol tanpa paksaan. Akhirnya bisa berenang 50m!"
          </p>
          <div class="mt-4 text-sunny text-sm">★★★★★</div>
        </div>
      </div>

      <!-- FAQ Accordion -->
      <div class="max-w-3xl mx-auto reveal">
        <h3 class="font-display text-2xl sm:text-3xl font-bold text-navy text-center mb-8">
          Pertanyaan yang Sering Diajukan (FAQ)
        </h3>
        <div class="space-y-3" id="faq-container">
          <!-- Populated by JS -->
        </div>
      </div>
    </div>
  </section>

  <!-- ==================== FOOTER ==================== -->
  <footer class="bg-navy text-white pt-16 pb-10 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid grid-cols-1 md:grid-cols-4 gap-10 pb-12 border-b border-white/15">
        <div class="md:col-span-2 space-y-4">
          <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-aqua flex items-center justify-center font-display font-bold text-xl">TC</div>
            <span class="font-display text-2xl font-bold">Tirta<span class="text-mint">Ceria</span> Swim Academy</span>
          </div>
          <p class="text-sm text-white/75 max-w-md leading-relaxed">
            Sekolah renang ramah keluarga untuk usia 6 bulan hingga dewasa. Menggabungkan kurikulum keselamatan air internasional dengan suasana belajar yang menyenangkan.
          </p>
          <p class="text-xs text-mint font-semibold">
            📍 Jl. Tirta Boulevard No. 88, Jakarta Selatan • Buka Selasa – Minggu (07.30 – 19.30 WIB)
          </p>
        </div>

        <div>
          <h4 class="font-display font-bold text-sunny mb-3">Program Kelas</h4>
          <ul class="space-y-2 text-xs text-white/80">
            <li><a href="#program-section" onclick="selectAgeProgram('baby')" class="hover:text-mint">Baby Swimming (6–24 Bln)</a></li>
            <li><a href="#program-section" onclick="selectAgeProgram('toddler')" class="hover:text-mint">Toddler Swimming (2–4 Thn)</a></li>
            <li><a href="#program-section" onclick="selectAgeProgram('kids')" class="hover:text-mint">Kids Swimming (5–12 Thn)</a></li>
            <li><a href="#program-section" onclick="selectAgeProgram('teens')" class="hover:text-mint">Teen Swimming (13–17 Thn)</a></li>
            <li><a href="#program-section" onclick="selectAgeProgram('adults')" class="hover:text-mint">Adult & Hydrophobia Class</a></li>
          </ul>
        </div>

        <div>
          <h4 class="font-display font-bold text-sunny mb-3">Bantuan Cepat</h4>
          <ul class="space-y-2 text-xs text-white/80">
            <li><button onclick="openPlacementModal()" class="hover:text-mint">Tes Penentuan Level</button></li>
            <li><a href="#jadwal-section" class="hover:text-mint">Jadwal & Kuota Kelas</a></li>
            <li><a href="#booking-section" class="hover:text-mint">Reservasi 7 Langkah</a></li>
            <li><a href="#panduan-section" class="hover:text-mint">Kebijakan Make-up Class</a></li>
          </ul>
        </div>
      </div>
      <div class="pt-6 flex flex-col sm:flex-row items-center justify-between text-xs text-white/60 gap-3">
        <p>© 2026 TirtaCeria Swim Academy. Semua Hak Dilindungi.</p>
        <p>Fresh Aquatic Playful Edition • Safe & Hygienic Certified</p>
      </div>
    </div>
  <div class="text-center text-[10px] text-navy/50 py-3">Website template by WEBIA · Informasi jadwal dan kuota merupakan data contoh hingga terhubung ke sistem admin.</div></footer>

  <!-- ==================== MODAL: MINI PLACEMENT ASSESSMENT QUIZ ==================== -->
  <div id="placement-modal" class="fixed inset-0 z-50 hidden items-center justify-center bg-navy/60 backdrop-blur-sm p-4">
    <div class="bg-white rounded-[2rem] max-w-lg w-full p-6 sm:p-8 shadow-2xl border-2 border-mint relative animate-bob" style="animation-iteration-count: 1;">
      <button onclick="closePlacementModal()" class="absolute top-5 right-5 w-9 h-9 rounded-full bg-bgLight hover:bg-coral hover:text-white text-navy font-bold flex items-center justify-center transition-colors">
        ✕
      </button>
      <span class="inline-block px-3 py-1 rounded-full bg-sunny text-navy text-xs font-extrabold mb-2">🎯 Mini Placement Quiz</span>
      <h3 class="font-display text-2xl font-bold text-navy">Temukan Level Kelas yang Tepat</h3>
      <p class="text-xs text-navy/70 mt-1 mb-5">Jawab 3 pertanyaan singkat ini untuk mendapatkan rekomendasi program & level otomatis.</p>

      <div class="space-y-4 text-sm">
        <div>
          <label class="block text-xs font-extrabold uppercase text-navy/70 mb-1.5">1. Kelompok Usia Peserta</label>
          <select id="quiz-age" class="w-full p-3 rounded-xl bg-bgLight border border-mint font-bold text-navy">
            <option value="Baby (6-24 Bulan)">Bayi (6 – 24 Bulan)</option>
            <option value="Toddler (2-4 Tahun)">Balita / Toddler (2 – 4 Tahun)</option>
            <option value="Kids (5-12 Tahun)">Anak-anak / Kids (5 – 12 Tahun)</option>
            <option value="Teens (13-17 Tahun)">Remaja / Teens (13 – 17 Tahun)</option>
            <option value="Adults (18+ Tahun)">Dewasa / Adults (18+ Tahun)</option>
          </select>
        </div>

        <div>
          <label class="block text-xs font-extrabold uppercase text-navy/70 mb-1.5">2. Kenyamanan di Dalam Air</label>
          <select id="quiz-comfort" class="w-full p-3 rounded-xl bg-bgLight border border-mint font-bold text-navy">
            <option value="Beginner">Masih takut air / belum berani masukkan wajah ke air</option>
            <option value="Basic">Sudah berani basah & celup wajah, tapi belum bisa mengapung</option>
            <option value="Intermediate">Sudah bisa mengapung & meluncur 10-20 meter</option>
            <option value="Advanced">Sudah lancar gaya bebas/dada, ingin tingkatkan teknik & stamina</option>
          </select>
        </div>

        <div>
          <label class="block text-xs font-extrabold uppercase text-navy/70 mb-1.5">3. Preferensi Suasana Belajar</label>
          <select id="quiz-pref" class="w-full p-3 rounded-xl bg-bgLight border border-mint font-bold text-navy">
            <option value="Group">Seru bersama teman sebaya (Group Class)</option>
            <option value="Private">Fokus intensif 1-on-1 dengan pelatih (Private Lesson)</option>
          </select>
        </div>
      </div>

      <div id="quiz-result-box" class="hidden mt-5 p-4 rounded-2xl bg-aqua/15 border-2 border-aqua">
        <p class="text-xs font-extrabold text-aquaDark uppercase">Rekomendasi Sistem:</p>
        <p id="quiz-result-title" class="font-display text-lg font-bold text-navy mt-0.5"></p>
        <p id="quiz-result-desc" class="text-xs text-navy/80 mt-1"></p>
        <button onclick="applyQuizToBooking()" class="mt-3 w-full py-2.5 rounded-xl bg-coral text-white font-bold text-xs hover:bg-coralDark transition-all">
          Gunakan Rekomendasi Ini di Form Booking →
        </button>
      </div>

      <button onclick="calculatePlacement()" class="mt-6 w-full py-3.5 rounded-2xl bg-navy hover:bg-aqua text-white font-bold text-sm transition-all">
        Lihat Hasil Rekomendasi Level
      </button>
    </div>
  </div>

  <!-- ==================== FLOATING WHATSAPP & UNIQUE FLOATING AI CHATBOT ("COACH SPLASH AI") ==================== -->
  <!-- Floating WhatsApp Button (Bottom Left) -->
  <a
    href="https://wa.me/6281234567890?text=Halo%20Admin%20TirtaCeria%20Swim%20Academy!%20Saya%20ingin%20konsultasi%20jadwal%20dan%20program%20kursus%20renang."
    target="_blank"
    rel="noopener noreferrer"
    aria-label="Konsultasi via WhatsApp"
    class="fixed bottom-5 left-5 z-40 group flex items-center gap-2.5 bg-[#25D366] hover:bg-[#1ebe5d] text-white px-4 py-3.5 rounded-full shadow-xl shadow-green-600/30 transition-all hover:scale-105"
  >
    <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
      <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.662.591 1.221.774 1.394.86s.274.072.376-.043c.101-.116.433-.506.549-.68.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.045.072.045.419-.1.824z"/>
    </svg>
    <span class="hidden sm:inline font-bold text-sm">Tanya Admin WA</span>
  </a>

  <!-- Unique Floating AI Chatbot: "Coach Splash AI" (Lifebuoy Mascot Widget - Bottom Right) -->
  <div class="fixed bottom-5 right-5 z-50">
    <!-- Chat Window -->
    <div id="ai-chat-window" class="hidden mb-3 w-[340px] sm:w-[380px] bg-white rounded-[2rem] shadow-2xl border-2 border-aqua overflow-hidden transition-all">
      <!-- Mascot Header -->
      <div class="bg-gradient-to-r from-aqua to-[#129A94] text-white p-4 flex items-center justify-between">
        <div class="flex items-center gap-3">
          <!-- Custom Lifebuoy + Goggles AI Avatar -->
          <div class="w-11 h-11 rounded-2xl bg-sunny flex items-center justify-center shadow-inner relative">
            <svg class="w-8 h-8" viewBox="0 0 48 48" fill="none">
              <circle cx="24" cy="24" r="17" stroke="#FF8066" stroke-width="6"/>
              <circle cx="24" cy="24" r="17" stroke="white" stroke-width="6" stroke-dasharray="9 18"/>
              <circle cx="19" cy="22" r="2.5" fill="#0B3948"/>
              <circle cx="29" cy="22" r="2.5" fill="#0B3948"/>
              <path d="M19 28C21 30.5 27 30.5 29 28" stroke="#0B3948" stroke-width="2.5" stroke-linecap="round"/>
            </svg>
            <span class="absolute -bottom-1 -right-1 w-3.5 h-3.5 rounded-full bg-[#25D366] border-2 border-white"></span>
          </div>
          <div>
            <h4 class="font-display font-bold text-base leading-tight">Coach Splash AI 🛟</h4>
            <p class="text-[11px] text-white/90">Asisten Pintar Pilih Kelas & Jadwal</p>
          </div>
        </div>
        <button onclick="toggleAIChat()" class="w-8 h-8 rounded-full bg-white/20 hover:bg-white/30 flex items-center justify-center text-white font-bold">
          ✕
        </button>
      </div>

      <!-- Messages Feed -->
      <div id="ai-messages" class="h-72 overflow-y-auto p-4 space-y-3 bg-bgLight text-xs sm:text-sm">
        <div class="bg-white p-3.5 rounded-2xl rounded-tl-none border border-mint/60 shadow-sm text-navy">
          Halo! Saya <strong>Coach Splash AI</strong> 🏊‍♂️✨ Siap bantu pilih kelas renang untuk bayi (6 bln), anak, remaja, atau dewasa. Mau tanya apa hari ini?
        </div>
      </div>

      <!-- Quick Reply Chips -->
      <div class="px-3 py-2 bg-white border-t border-mint/40 flex gap-1.5 overflow-x-auto">
        <button onclick="askCoachAI('Rekomendasi kelas untuk bayi 6-24 bulan')" class="whitespace-nowrap px-3 py-1.5 rounded-full bg-mint/30 hover:bg-aqua hover:text-white text-navy font-bold text-[11px] transition-colors">
          👶 Kelas Bayi
        </button>
        <button onclick="askCoachAI('Berapa biaya paket dan trial class?')" class="whitespace-nowrap px-3 py-1.5 rounded-full bg-sunny/60 hover:bg-coral hover:text-white text-navy font-bold text-[11px] transition-colors">
          💰 Harga Paket
        </button>
        <button onclick="askCoachAI('Kelas dewasa takut air ada?')" class="whitespace-nowrap px-3 py-1.5 rounded-full bg-mint/30 hover:bg-aqua hover:text-white text-navy font-bold text-[11px] transition-colors">
          🏊 Dewasa Pemula
        </button>
        <button onclick="askCoachAI('Apa saja perlengkapan yang dibawa?')" class="whitespace-nowrap px-3 py-1.5 rounded-full bg-mint/30 hover:bg-aqua hover:text-white text-navy font-bold text-[11px] transition-colors">
          🥽 Perlengkapan
        </button>
      </div>

      <!-- Input Form -->
      <form onsubmit="handleAIChatSubmit(event)" class="p-3 bg-white border-t border-mint/50 flex gap-2">
        <input
          id="ai-input"
          type="text"
          placeholder="Tanya usia, jadwal, level, biaya..."
          class="flex-1 px-3.5 py-2.5 rounded-xl bg-bgLight border border-mint/60 text-xs font-medium text-navy focus:outline-none focus:border-aqua"
        />
        <button type="submit" class="px-4 py-2.5 rounded-xl bg-coral hover:bg-coralDark text-white font-bold text-xs shadow transition-colors">
          Kirim
        </button>
      </form>
    </div>

    <!-- Unique Lifebuoy Floating Trigger Button -->
    <button
      onclick="toggleAIChat()"
      aria-label="Buka Coach Splash AI Chatbot"
      class="relative ml-auto flex items-center gap-3 bg-navy hover:bg-[#114b5e] text-white pl-3 pr-5 py-2.5 rounded-full shadow-2xl border-2 border-sunny transition-transform hover:scale-105 group"
    >
      <span class="absolute inset-0 rounded-full bg-aqua/40 -z-10" style="animation: pulseRing 2.4s infinite;"></span>
      <div class="w-10 h-10 rounded-full bg-sunny flex items-center justify-center group-hover:rotate-12 transition-transform">
        <svg class="w-7 h-7" viewBox="0 0 48 48" fill="none">
          <circle cx="24" cy="24" r="16" stroke="#FF8066" stroke-width="6"/>
          <circle cx="24" cy="24" r="16" stroke="white" stroke-width="6" stroke-dasharray="8 17"/>
          <circle cx="20" cy="22" r="2" fill="#0B3948"/>
          <circle cx="28" cy="22" r="2" fill="#0B3948"/>
          <path d="M20 27C22 29 26 29 28 27" stroke="#0B3948" stroke-width="2" stroke-linecap="round"/>
        </svg>
      </div>
      <div class="text-left">
        <span class="block text-[10px] font-extrabold uppercase tracking-wider text-sunny leading-none">AI Swim Helper</span>
        <span class="font-display font-bold text-sm">Coach Splash</span>
      </div>
    </button>
  </div>

  <!-- ==================== JAVASCRIPT LOGIC ==================== -->
  <script src="{{ asset('js/website-bisnis/templates/sports/swimming-school/tirtaceria.js') }}" defer></script>
</body>
</html>