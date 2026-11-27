<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>GARDA GRAPPLE | Tactical Brazilian Jiu-Jitsu & Submission Grappling Academy</title>
  <!-- WEBIA: Brazilian Jiu-Jitsu Academy / Tactical Modern / Blackout Combat -->
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Chakra+Petch:ital,wght@0,600;0,700;1,700&family=JetBrains+Mono:wght@400;500;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            obsidian: '#111318',
            carbon: '#292D35',
            steel: '#555D68',
            crimson: '#C43B35',
            bone: '#D6D0C5',
          },
          fontFamily: {
            tactical: ['Chakra Petch', 'sans-serif'],
            sans: ['Plus Jakarta Sans', 'sans-serif'],
            mono: ['JetBrains Mono', 'monospace'],
          },
        },
      },
    };
  </script>
  <link rel="stylesheet" href="{{ asset('css/website-bisnis/templates/martial-arts-self-defense/brazilian-jiu-jitsu/garda-grapple/garda-grapple.css') }}?v=1">
</head>
<body class="antialiased selection:bg-crimson selection:text-bone" data-whatsapp-number="6281234567890">

  <!-- ==================== STICKY TACTICAL TOPBAR NAVIGATION ==================== -->
  <header class="sticky top-0 z-40 bg-obsidian/95 backdrop-blur-md border-b border-steel/40 shadow-2xl">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between h-20">
        <!-- Brand Emblem: Octagon Black-Belt Crest -->
        <a href="#hero-arena" onclick="switchPage('all')" class="flex items-center gap-3.5 group">
          <div class="relative w-11 h-11 bg-carbon border-2 border-crimson flex items-center justify-center chamfer-sm group-hover:scale-105 transition-transform">
            <svg class="w-7 h-7" viewBox="0 0 40 40" fill="none">
              <polygon points="12,3 28,3 37,12 37,28 28,37 12,37 3,28 3,12" stroke="#D6D0C5" stroke-width="2.2" fill="#111318"/>
              <path d="M9 20H31" stroke="#C43B35" stroke-width="4.5"/>
              <path d="M16 14L24 26M24 14L16 26" stroke="#D6D0C5" stroke-width="2" stroke-linecap="round"/>
            </svg>
          </div>
          <div>
            <span class="font-tactical font-bold text-xl sm:text-2xl tracking-wider text-bone block leading-none">
              GARDA <span class="text-crimson">GRAPPLE</span>
            </span>
            <span class="font-mono text-[10px] uppercase tracking-[0.22em] text-steel mt-1 block">
              Tactical BJJ & Submission Lab
            </span>
          </div>
        </a>

        <!-- Multipage View Switcher (Desktop) -->
        <nav class="hidden xl:flex items-center gap-1 bg-carbon/90 p-1.5 rounded-lg border border-steel/40">
          <button onclick="switchPage('all')" data-nav="all" class="nav-pill px-3.5 py-2 rounded text-xs font-tactical font-bold uppercase tracking-wider transition-all bg-crimson text-bone shadow">
            <span data-i18n="nav_all">All Sectors</span>
          </button>
          <button onclick="switchPage('programs')" data-nav="programs" class="nav-pill px-3.5 py-2 rounded text-xs font-tactical font-semibold uppercase tracking-wider text-bone/75 hover:text-bone transition-all">
            <span data-i18n="nav_prog">Programs & Belts</span>
          </button>
          <button onclick="switchPage('schedule')" data-nav="schedule" class="nav-pill px-3.5 py-2 rounded text-xs font-tactical font-semibold uppercase tracking-wider text-bone/75 hover:text-bone transition-all">
            <span data-i18n="nav_sched">Schedule & Mats</span>
          </button>
          <button onclick="switchPage('gear')" data-nav="gear" class="nav-pill px-3.5 py-2 rounded text-xs font-tactical font-semibold uppercase tracking-wider text-bone/75 hover:text-bone transition-all">
            <span data-i18n="nav_gear">Gear & Safety</span>
          </button>
          <button onclick="switchPage('booking')" data-nav="booking" class="nav-pill px-3.5 py-2 rounded text-xs font-tactical font-semibold uppercase tracking-wider text-bone/75 hover:text-bone transition-all">
            <span data-i18n="nav_book">Trial Booking</span>
          </button>
        </nav>

        <!-- Right Controls: ID/EN + Free Trial CTA -->
        <div class="hidden sm:flex items-center gap-3">
          <div class="flex items-center bg-carbon rounded p-1 border border-steel/50 font-mono text-xs font-bold">
            <button onclick="setLanguage('id')" id="lang-id" class="px-2.5 py-1 rounded bg-crimson text-bone transition-all">ID</button>
            <button onclick="setLanguage('en')" id="lang-en" class="px-2.5 py-1 rounded text-bone/70 hover:text-bone transition-all">EN</button>
          </div>

          <a href="#trial-booking-section" onclick="switchPage('all')" class="px-5 py-2.5 chamfer-sm bg-crimson hover:bg-[#d8443e] text-bone font-tactical font-bold text-xs uppercase tracking-wider shadow-lg shadow-crimson/30 transition-all">
            ⚡ <span data-i18n="cta_nav">Join Free Trial</span>
          </a>
        </div>

        <!-- Mobile Menu Toggle -->
        <button onclick="toggleMobileMenu()" class="xl:hidden p-2.5 rounded bg-carbon border border-steel/50 text-bone">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
          </svg>
        </button>
      </div>
    </div>

    <!-- Mobile Drawer -->
    <div id="mobile-menu" class="hidden xl:hidden bg-carbon border-b border-steel/40 px-4 pt-3 pb-5 space-y-2">
      <div class="flex items-center justify-between pb-2 border-b border-steel/30">
        <span class="font-mono text-xs text-crimson font-bold">TACTICAL NAVIGATION</span>
        <div class="flex gap-1 bg-obsidian p-1 rounded font-mono text-xs">
          <button onclick="setLanguage('id')" class="px-2 py-0.5 rounded bg-crimson text-bone">ID</button>
          <button onclick="setLanguage('en')" class="px-2 py-0.5 rounded text-bone">EN</button>
        </div>
      </div>
      <button onclick="switchPage('all'); toggleMobileMenu()" class="block w-full text-left px-4 py-2.5 rounded font-tactical font-bold bg-obsidian text-crimson">All Sectors (Beranda Lengkap)</button>
      <button onclick="switchPage('programs'); toggleMobileMenu()" class="block w-full text-left px-4 py-2.5 rounded font-tactical text-bone hover:bg-obsidian/60">Programs, Women-Only & Belt System</button>
      <button onclick="switchPage('schedule'); toggleMobileMenu()" class="block w-full text-left px-4 py-2.5 rounded font-tactical text-bone hover:bg-obsidian/60">Weekly Schedule, Open Mat & Professors</button>
      <button onclick="switchPage('gear'); toggleMobileMenu()" class="block w-full text-left px-4 py-2.5 rounded font-tactical text-bone hover:bg-obsidian/60">Facilities, Beginner & Equipment Guide</button>
      <button onclick="switchPage('booking'); toggleMobileMenu()" class="block w-full text-left px-4 py-2.5 rounded font-tactical text-bone hover:bg-obsidian/60">7-Step Trial Reservation & Packages</button>
      <a href="#trial-booking-section" onclick="switchPage('all'); toggleMobileMenu()" class="block text-center py-3 rounded bg-crimson text-bone font-tactical font-bold text-xs uppercase">Join a Trial Class</a>
    </div>
  </header>

  <!-- ==================== HERO SECTION: THE HUMAN CHESS ARENA (TACTICAL HUD & GRAPPLING FLOW) ==================== -->
  <section id="hero-arena" data-section="hero" class="relative overflow-hidden bg-obsidian tatami-grid pt-10 pb-24 sm:pt-14 sm:pb-28 border-b border-steel/30">
    <!-- Ambient Crimson Glow -->
    <div class="absolute -top-28 -left-28 w-[480px] h-[480px] rounded-full bg-crimson/15 blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-0 right-0 w-[440px] h-[440px] rounded-full bg-steel/15 blur-3xl pointer-events-none"></div>

    <!-- Floating Animated BJJ Gear Vector 1: Woven Black Belt with 4 Crimson Stripes -->
    <div class="hidden lg:block absolute top-10 right-[45%] pointer-events-none anim-float z-20">
      <div class="bg-carbon/90 backdrop-blur-md border border-steel/60 px-4 py-2.5 chamfer-sm shadow-2xl flex items-center gap-3">
        <svg class="w-16 h-6" viewBox="0 0 96 32" fill="none">
          <rect x="2" y="6" width="92" height="20" rx="2" fill="#111318" stroke="#555D68" stroke-width="1.5"/>
          <rect x="58" y="6" width="24" height="20" fill="#C43B35"/>
          <rect x="61" y="6" width="2.5" height="20" fill="#D6D0C5"/>
          <rect x="66" y="6" width="2.5" height="20" fill="#D6D0C5"/>
          <rect x="71" y="6" width="2.5" height="20" fill="#D6D0C5"/>
          <rect x="76" y="6" width="2.5" height="20" fill="#D6D0C5"/>
        </svg>
        <div class="font-mono text-[10px]">
          <span class="text-crimson font-bold block">IBJJF CERTIFIED</span>
          <span class="text-bone/80">4th Degree Lineage</span>
        </div>
      </div>
    </div>

    <!-- Floating Animated BJJ Gear Vector 2: Pearl-Weave Kimono Gi Badge -->
    <div class="hidden xl:block absolute bottom-12 left-8 pointer-events-none anim-float-alt z-20">
      <div class="bg-carbon/90 backdrop-blur-md border border-crimson/60 px-4 py-2.5 chamfer-sm shadow-2xl flex items-center gap-3">
        <svg class="w-9 h-9 text-bone" viewBox="0 0 44 44" fill="none">
          <path d="M12 8L22 16L32 8L38 16L32 22V36H12V22L6 16L12 8Z" stroke="currentColor" stroke-width="2.2" fill="rgba(214,208,197,0.1)"/>
          <path d="M12 24H32" stroke="#C43B35" stroke-width="3.5"/>
          <path d="M19 24L16 32M25 24L28 32" stroke="#C43B35" stroke-width="2.5" stroke-linecap="round"/>
        </svg>
        <div class="font-mono text-[10px]">
          <span class="text-bone font-bold block">450GSM PEARL-WEAVE GI</span>
          <span class="text-crimson">Free Loaner for Trial</span>
        </div>
      </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
        <!-- Left 6 Cols: Tactical Combat Typography -->
        <div class="lg:col-span-6 space-y-6">
          <div class="inline-flex items-center gap-2.5 px-3.5 py-1.5 bg-carbon border border-crimson/70 chamfer-sm">
            <span class="w-2 h-2 rounded-full bg-crimson animate-ping"></span>
            <span class="font-mono text-xs font-bold uppercase tracking-widest text-bone" data-i18n="hero_tag">
              TACTICAL GRAPPLING • GI & NO-GI • JAKARTA
            </span>
          </div>

          <h1 class="font-tactical text-4xl sm:text-5xl lg:text-[3.65rem] font-bold uppercase leading-[1.03] tracking-tight text-bone">
            <span data-i18n="hero_h1_1">Master The Art Of</span>
            <span class="block text-crimson mt-1">Human Chess.</span>
            <span class="block text-2xl sm:text-3xl text-bone/80 font-semibold mt-2" data-i18n="hero_h1_2">
              Leverage Over Strength. Precision Under Pressure.
            </span>
          </h1>

          <p class="text-sm sm:text-base text-bone/80 leading-relaxed max-w-xl" data-i18n="hero_desc">
            Akademi Brazilian Jiu-Jitsu modern dengan kurikulum sistematis untuk <strong>Kids, Teens, Adults, Women-Only Self-Defense, hingga Competition Team</strong>. Dirancang aman untuk pemula tanpa latar belakang bela diri.
          </p>

          <!-- Dual High-Contrast CTAs -->
          <div class="flex flex-wrap items-center gap-4 pt-1">
            <a href="#trial-booking-section" class="px-8 py-4 chamfer-sm bg-crimson hover:bg-[#d8443e] text-bone font-tactical font-bold text-sm uppercase tracking-wider shadow-xl shadow-crimson/30 hover:scale-[1.03] transition-all flex items-center gap-2.5">
              <span data-i18n="cta_hero_trial">Join a Trial Class</span>
              <span>→</span>
            </a>
            <a href="#programs-section" class="px-8 py-4 chamfer-sm bg-carbon hover:bg-steel/40 text-bone border border-bone/35 font-tactical font-bold text-sm uppercase tracking-wider transition-all">
              <span data-i18n="cta_hero_prog">Explore Programs</span>
            </a>
          </div>

          <!-- Tactical Telemetry Strip -->
          <div class="grid grid-cols-3 gap-4 pt-5 border-t border-steel/35 font-mono">
            <div>
              <p class="text-2xl sm:text-3xl font-bold text-crimson">400m²</p>
              <p class="text-[11px] text-bone/70 uppercase">Zebra Pro Tatami</p>
            </div>
            <div>
              <p class="text-2xl sm:text-3xl font-bold text-bone">100%</p>
              <p class="text-[11px] text-bone/70 uppercase">Beginner Friendly</p>
            </div>
            <div>
              <p class="text-2xl sm:text-3xl font-bold text-crimson">5 Belts</p>
              <p class="text-[11px] text-bone/70 uppercase">IBJJF Rank System</p>
            </div>
          </div>
        </div>

        <!-- Right 6 Cols: Staggered Combat Photography + Live Animated BJJ Positional Flow HUD -->
        <div class="lg:col-span-6 space-y-4">
          <!-- Asymmetric Staggered Action Photos -->
          <div class="grid grid-cols-12 gap-3.5 items-end">
            <div class="col-span-7 relative chamfer-card overflow-hidden border-2 border-crimson/70 bg-carbon aspect-[4/3] shadow-2xl group">
              <img
                src="https://images.unsplash.com/photo-1555597673-b21d5c935865?auto=format&fit=crop&w=850&q=85"
                onerror="this.src='https://placehold.co/700x520/292D35/D6D0C5?text=BJJ+Sparring+Action'"
                alt="Atlet Brazilian Jiu-Jitsu melakukan teknik grappling di atas matras"
                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
              />
              <div class="absolute inset-0 bg-gradient-to-t from-obsidian/90 via-transparent to-transparent"></div>
              <div class="absolute bottom-3 left-3 right-3 flex items-center justify-between font-mono text-[10px]">
                <span class="px-2 py-0.5 bg-crimson text-bone font-bold">LIVE DRILL // MAT 01</span>
                <span class="text-bone/80">GI & NO-GI</span>
              </div>
            </div>

            <div class="col-span-5 relative chamfer-card overflow-hidden border border-steel/60 bg-carbon aspect-[3/4] shadow-2xl group">
              <img
                src="https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?auto=format&fit=crop&w=650&q=85"
                onerror="this.src='https://placehold.co/500x650/111318/C43B35?text=Kimono+Grip+Training'"
                alt="Latihan teknik kontrol dan keseimbangan bela diri"
                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
              />
              <div class="absolute inset-0 bg-gradient-to-t from-obsidian/90 via-transparent to-transparent"></div>
              <div class="absolute bottom-3 left-3 font-mono text-[10px]">
                <span class="text-crimson font-bold block">WOMEN & ADULTS</span>
                <span class="text-bone">Self-Defense Lab</span>
              </div>
            </div>
          </div>

          <!-- Live Animated BJJ Positional Flow & Mat Radar HUD -->
          <div class="bg-carbon/90 border border-steel/50 chamfer-sm p-4 shadow-xl relative overflow-hidden tactical-crosshair">
            <div class="flex items-center justify-between font-mono text-[11px] mb-2">
              <span class="text-crimson font-bold flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-crimson animate-pulse"></span>
                TACTICAL POSITIONAL FLOW // SYSTEM TELEMETRY
              </span>
              <span class="text-bone/60">LEVERAGE ENGINE v4.2</span>
            </div>

            <svg viewBox="0 0 600 110" class="w-full h-24 bg-obsidian/90 rounded border border-steel/35">
              <!-- Animated Flow Path -->
              <path d="M55 55 H175 H295 H415 H535" stroke="#555D68" stroke-width="2"/>
              <path d="M55 55 H535" stroke="#C43B35" stroke-width="2.5" class="anim-dash"/>

              <!-- Node 1: Takedown / Pull -->
              <circle cx="55" cy="55" r="16" fill="#292D35" stroke="#D6D0C5" stroke-width="2"/>
              <text x="55" y="58" text-anchor="middle" fill="#D6D0C5" font-size="9" font-family="JetBrains Mono" font-weight="bold">01</text>
              <text x="55" y="90" text-anchor="middle" fill="#D6D0C5" font-size="9" font-family="Chakra Petch" font-weight="bold">TAKEDOWN</text>

              <!-- Node 2: Guard -->
              <circle cx="175" cy="55" r="16" fill="#292D35" stroke="#D6D0C5" stroke-width="2"/>
              <text x="175" y="58" text-anchor="middle" fill="#D6D0C5" font-size="9" font-family="JetBrains Mono" font-weight="bold">02</text>
              <text x="175" y="90" text-anchor="middle" fill="#D6D0C5" font-size="9" font-family="Chakra Petch" font-weight="bold">GUARD CONTROL</text>

              <!-- Node 3: Sweep / Pass -->
              <circle cx="295" cy="55" r="16" fill="#292D35" stroke="#C43B35" stroke-width="2.5"/>
              <text x="295" y="58" text-anchor="middle" fill="#C43B35" font-size="9" font-family="JetBrains Mono" font-weight="bold">03</text>
              <text x="295" y="90" text-anchor="middle" fill="#C43B35" font-size="9" font-family="Chakra Petch" font-weight="bold">SWEEP / PASS</text>

              <!-- Node 4: Mount / Back -->
              <circle cx="415" cy="55" r="16" fill="#292D35" stroke="#D6D0C5" stroke-width="2"/>
              <text x="415" y="58" text-anchor="middle" fill="#D6D0C5" font-size="9" font-family="JetBrains Mono" font-weight="bold">04</text>
              <text x="415" y="90" text-anchor="middle" fill="#D6D0C5" font-size="9" font-family="Chakra Petch" font-weight="bold">MOUNT / BACK</text>

              <!-- Node 5: Submission -->
              <circle cx="535" cy="55" r="18" fill="#C43B35" stroke="#D6D0C5" stroke-width="2" style="animation: pulseNode 2.4s infinite"/>
              <text x="535" y="58" text-anchor="middle" fill="#D6D0C5" font-size="9" font-family="JetBrains Mono" font-weight="bold">SUB</text>
              <text x="535" y="90" text-anchor="middle" fill="#C43B35" font-size="9" font-family="Chakra Petch" font-weight="bold">SUBMISSION</text>
            </svg>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ==================== CONTINUOUS TACTICAL TICKER RIBBON ==================== -->
  <div class="bg-crimson text-bone py-3 overflow-hidden border-b border-bone/20">
    <div class="anim-marquee flex items-center gap-8 font-tactical font-bold text-xs sm:text-sm uppercase tracking-[0.2em]">
      <span>⚔️ POSITION BEFORE SUBMISSION</span>
      <span>🥋 GI & NO-GI SUBMISSION GRAPPLING</span>
      <span>🛡️ WOMEN-ONLY SELF-DEFENSE</span>
      <span>👦 KIDS & TEENS ANTI-BULLYING BJJ</span>
      <span>🏆 IBJJF & ADCC COMPETITION PREP</span>
      <span>🔥 FRIDAY NIGHT OPEN MAT SPARRING</span>
      <span>⚔️ POSITION BEFORE SUBMISSION</span>
      <span>🥋 GI & NO-GI SUBMISSION GRAPPLING</span>
      <span>🛡️ WOMEN-ONLY SELF-DEFENSE</span>
      <span>👦 KIDS & TEENS ANTI-BULLYING BJJ</span>
      <span>🏆 IBJJF & ADCC COMPETITION PREP</span>
      <span>🔥 FRIDAY NIGHT OPEN MAT SPARRING</span>
    </div>
  </div>

  <!-- ==================== ACADEMY INTRODUCTION & TEACHING METHODOLOGY ==================== -->
  <section id="academy-intro-section" data-section="programs" class="py-20 bg-obsidian relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center reveal">
        <div class="lg:col-span-5 relative">
          <div class="chamfer-card overflow-hidden border-2 border-steel/50 bg-carbon aspect-[4/5] shadow-2xl">
            <img
              src="https://images.unsplash.com/photo-1517438322307-e67111335449?auto=format&fit=crop&w=800&q=85"
              onerror="this.src='https://placehold.co/650x800/292D35/D6D0C5?text=Garda+Grapple+Dojo'"
              alt="Suasana latihan di tatami mat Garda Grapple BJJ Academy"
              class="w-full h-full object-cover"
            />
            <div class="absolute inset-0 bg-gradient-to-t from-obsidian via-transparent to-transparent"></div>
            <div class="absolute bottom-5 left-5 right-5 p-4 bg-obsidian/90 border border-crimson/60 chamfer-sm">
              <p class="font-mono text-[10px] text-crimson font-bold uppercase">ACADEMY DOCTRINE</p>
              <p class="font-tactical text-base font-bold text-bone mt-0.5">"Ego Left Outside The Mat."</p>
            </div>
          </div>
        </div>

        <div class="lg:col-span-7 space-y-6">
          <span class="font-mono text-xs font-bold uppercase tracking-widest text-crimson">
            // 01. ACADEMY PROFILE & METHODOLOGY
          </span>
          <h2 class="font-tactical text-3xl sm:text-4xl font-bold uppercase text-bone leading-tight">
            Bela Diri Modern Berbasis <span class="text-crimson">Mekanika & Strategi</span>
          </h2>
          <p class="text-sm sm:text-base text-bone/80 leading-relaxed">
            <strong>Garda Grapple Academy</strong> didirikan untuk menghadirkan standar pelatihan Brazilian Jiu-Jitsu kelas dunia dalam lingkungan yang inklusif, bebas ego, dan terukur. Kami percaya setiap individu—tanpa memandang usia, postur, atau kekuatan fisik—mampu mengendalikan situasi pertarungan jarak dekat melalui teknik ungkitan (<em>leverage</em>) dan kontrol posisi.
          </p>

          <!-- 3-Phase Tactical Teaching Method -->
          <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 pt-2">
            <div class="tactical-card bg-carbon p-5 border border-steel/40 chamfer-sm">
              <span class="font-mono text-xs font-bold text-crimson">PHASE 01</span>
              <h3 class="font-tactical font-bold text-lg text-bone uppercase mt-1">Technical Drilling</h3>
              <p class="text-xs text-bone/75 mt-2 leading-relaxed">Pengulangan gerakan presisi tanpa perlawanan untuk membangun memori otot yang aman.</p>
            </div>
            <div class="tactical-card bg-carbon p-5 border border-steel/40 chamfer-sm">
              <span class="font-mono text-xs font-bold text-crimson">PHASE 02</span>
              <h3 class="font-tactical font-bold text-lg text-bone uppercase mt-1">Positional Sparring</h3>
              <p class="text-xs text-bone/75 mt-2 leading-relaxed">Latihan situasional dari posisi spesifik (guard escape, side control) dengan resistensi bertahap.</p>
            </div>
            <div class="tactical-card bg-carbon p-5 border border-steel/40 chamfer-sm">
              <span class="font-mono text-xs font-bold text-crimson">PHASE 03</span>
              <h3 class="font-tactical font-bold text-lg text-bone uppercase mt-1">Live Rolling</h3>
              <p class="text-xs text-bone/75 mt-2 leading-relaxed">Simulasi pertarungan penuh di bawah pengawasan ketat instruktur dengan budaya <em>tap early</em>.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ==================== BJJ PROGRAMS (BY LEVEL, AGE & WOMEN-ONLY CLASSES) ==================== -->
  <section id="programs-section" data-section="programs" class="py-20 bg-carbon/40 tatami-grid border-y border-steel/30">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 gap-4 reveal">
        <div>
          <span class="font-mono text-xs font-bold uppercase tracking-widest text-crimson">
            // 02. COMBAT CURRICULUM & DEMOGRAPHICS
          </span>
          <h2 class="font-tactical text-3xl sm:text-4xl font-bold uppercase text-bone mt-1">
            Program Latihan <span class="text-crimson">BJJ & Self-Defense</span>
          </h2>
        </div>

        <!-- Program Filter Tabs -->
        <div class="flex flex-wrap gap-2">
          <button onclick="filterPrograms('All')" data-prog-cat="All" class="prog-filter-btn px-4 py-2 rounded text-xs font-tactical font-bold uppercase bg-crimson text-bone">
            Semua Program (8)
          </button>
          <button onclick="filterPrograms('Level')" data-prog-cat="Level" class="prog-filter-btn px-4 py-2 rounded text-xs font-tactical font-bold uppercase bg-carbon text-bone/80 border border-steel/50 hover:border-crimson">
            By Skill Level
          </button>
          <button onclick="filterPrograms('Age')" data-prog-cat="Age" class="prog-filter-btn px-4 py-2 rounded text-xs font-tactical font-bold uppercase bg-carbon text-bone/80 border border-steel/50 hover:border-crimson">
            Kids & Teens
          </button>
          <button onclick="filterPrograms('Women')" data-prog-cat="Women" class="prog-filter-btn px-4 py-2 rounded text-xs font-tactical font-bold uppercase bg-carbon text-bone/80 border border-steel/50 hover:border-crimson">
            🛡️ Women Only
          </button>
        </div>
      </div>

      <!-- Programs Grid -->
      <div id="programs-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 reveal">
        <!-- Populated dynamically via JS -->
      </div>
    </div>
  </section>

  <!-- ==================== INTERACTIVE IBJJF BELT RANKING & STUDENT PROGRESS TRACKER ==================== -->
  <section id="belts-progress-section" data-section="programs" class="py-20 bg-obsidian">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center max-w-3xl mx-auto mb-12 reveal">
        <span class="font-mono text-xs font-bold uppercase tracking-widest text-crimson">
          // 03. IBJJF RANKING ARCHITECTURE
        </span>
        <h2 class="font-tactical text-3xl sm:text-4xl font-bold uppercase text-bone mt-1">
          Sistem Sabuk & <span class="text-crimson">Progres Siswa</span>
        </h2>
        <p class="mt-2 text-bone/75 text-sm">
          Klik setiap tingkatan sabuk di bawah untuk melihat kurikulum teknis, sistem 4 stripe, serta rata-rata jam latihan di matras.
        </p>
      </div>

      <!-- Interactive 5-Belt Selector -->
      <div class="grid grid-cols-2 sm:grid-cols-5 gap-3 mb-8 reveal">
        <button onclick="selectBelt('white')" data-belt="white" class="belt-btn p-4 rounded-lg bg-carbon border-2 border-crimson text-left transition-all">
          <div class="h-4 w-full bg-[#F2EFE9] rounded-sm mb-2.5 flex justify-end overflow-hidden border border-black/30">
            <div class="w-7 h-full bg-[#111318] flex items-center justify-evenly px-0.5">
              <span class="w-0.5 h-full bg-white"></span><span class="w-0.5 h-full bg-white"></span>
            </div>
          </div>
          <span class="font-tactical font-bold text-sm text-bone uppercase block">White Belt</span>
          <span class="font-mono text-[10px] text-bone/65">0 – 1.5 Tahun</span>
        </button>

        <button onclick="selectBelt('blue')" data-belt="blue" class="belt-btn p-4 rounded-lg bg-carbon border border-steel/40 hover:border-crimson text-left transition-all">
          <div class="h-4 w-full bg-[#1E56A0] rounded-sm mb-2.5 flex justify-end overflow-hidden">
            <div class="w-7 h-full bg-[#111318] flex items-center justify-evenly px-0.5">
              <span class="w-0.5 h-full bg-white"></span><span class="w-0.5 h-full bg-white"></span><span class="w-0.5 h-full bg-white"></span>
            </div>
          </div>
          <span class="font-tactical font-bold text-sm text-bone uppercase block">Blue Belt</span>
          <span class="font-mono text-[10px] text-bone/65">1.5 – 3.5 Tahun</span>
        </button>

        <button onclick="selectBelt('purple')" data-belt="purple" class="belt-btn p-4 rounded-lg bg-carbon border border-steel/40 hover:border-crimson text-left transition-all">
          <div class="h-4 w-full bg-[#6A2C91] rounded-sm mb-2.5 flex justify-end overflow-hidden">
            <div class="w-7 h-full bg-[#111318] flex items-center justify-evenly px-0.5">
              <span class="w-0.5 h-full bg-white"></span><span class="w-0.5 h-full bg-white"></span><span class="w-0.5 h-full bg-white"></span><span class="w-0.5 h-full bg-white"></span>
            </div>
          </div>
          <span class="font-tactical font-bold text-sm text-bone uppercase block">Purple Belt</span>
          <span class="font-mono text-[10px] text-bone/65">4 – 6 Tahun</span>
        </button>

        <button onclick="selectBelt('brown')" data-belt="brown" class="belt-btn p-4 rounded-lg bg-carbon border border-steel/40 hover:border-crimson text-left transition-all">
          <div class="h-4 w-full bg-[#5C3A21] rounded-sm mb-2.5 flex justify-end overflow-hidden">
            <div class="w-7 h-full bg-[#111318] flex items-center justify-evenly px-0.5">
              <span class="w-0.5 h-full bg-white"></span><span class="w-0.5 h-full bg-white"></span>
            </div>
          </div>
          <span class="font-tactical font-bold text-sm text-bone uppercase block">Brown Belt</span>
          <span class="font-mono text-[10px] text-bone/65">6.5 – 8.5 Tahun</span>
        </button>

        <button onclick="selectBelt('black')" data-belt="black" class="belt-btn p-4 rounded-lg bg-carbon border border-steel/40 hover:border-crimson text-left transition-all col-span-2 sm:col-span-1">
          <div class="h-4 w-full bg-[#111318] border border-steel rounded-sm mb-2.5 flex justify-end overflow-hidden">
            <div class="w-8 h-full bg-[#C43B35] flex items-center justify-evenly px-0.5">
              <span class="w-0.5 h-full bg-white"></span><span class="w-0.5 h-full bg-white"></span><span class="w-0.5 h-full bg-white"></span><span class="w-0.5 h-full bg-white"></span>
            </div>
          </div>
          <span class="font-tactical font-bold text-sm text-crimson uppercase block">Black Belt</span>
          <span class="font-mono text-[10px] text-bone/65">9+ Tahun Mastery</span>
        </button>
      </div>

      <!-- Belt Visualizer + Student Mat Telemetry Dashboard -->
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-stretch reveal">
        <!-- Left 7 Cols: Selected Belt Deep Breakdown -->
        <div id="belt-detail-box" class="lg:col-span-7 bg-carbon border border-steel/50 chamfer-card p-6 sm:p-8 flex flex-col justify-between">
          <!-- Populated dynamically via JS -->
        </div>

        <!-- Right 5 Cols: Interactive Student Mat Log & Progress Simulator -->
        <div class="lg:col-span-5 bg-carbon border-2 border-crimson/60 chamfer-card p-6 sm:p-8 flex flex-col justify-between">
          <div>
            <div class="flex items-center justify-between mb-3">
              <span class="font-mono text-[11px] font-bold text-crimson uppercase">STUDENT MAT TELEMETRY</span>
              <span class="px-2.5 py-0.5 rounded bg-obsidian font-mono text-[10px] text-bone border border-steel/40">APP MEMBER LOG</span>
            </div>
            <h3 class="font-tactical text-2xl font-bold uppercase text-bone">
              Simulasi Tracking <span class="text-crimson">Progres Latihan</span>
            </h3>
            <p class="text-xs text-bone/75 mt-1 mb-5">
              Setiap anggota mendapatkan kartu log digital untuk memantau kehadiran matras, penguasaan teknik, dan kesiapan kenaikan <em>stripe</em>.
            </p>

            <!-- Interactive Mat Hours Slider -->
            <div class="bg-obsidian p-4 rounded border border-steel/40 mb-5">
              <div class="flex justify-between font-mono text-xs mb-2">
                <span class="text-bone/80">Simulasi Total Mat Hours:</span>
                <span id="sim-hours-val" class="text-crimson font-bold">145 Jam (Stripe 3 Ready)</span>
              </div>
              <input id="sim-hours-slider" type="range" min="10" max="450" value="145" oninput="updateStudentProgressSim()" class="w-full accent-crimson" />
            </div>

            <div id="student-skill-bars" class="space-y-3 text-xs">
              <!-- Populated by JS -->
            </div>
          </div>

          <div class="mt-6 pt-4 border-t border-steel/30 flex items-center justify-between font-mono text-[11px]">
            <span class="text-bone/70">Next Evaluation:</span>
            <span class="text-crimson font-bold">Sabtu, 19 Des 2026</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ==================== PROFESSORS & COACHES + WEEKLY & OPEN MAT SCHEDULE ==================== -->
  <section id="schedule-coaches-section" data-section="schedule" class="py-20 bg-carbon/35 tatami-grid border-t border-steel/30">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <!-- Professors & Coaches -->
      <div class="mb-10 reveal">
        <span class="font-mono text-xs font-bold uppercase tracking-widest text-crimson">
          // 04. LINEAGE & INSTRUCTORS
        </span>
        <h2 class="font-tactical text-3xl sm:text-4xl font-bold uppercase text-bone mt-1">
          Professors & <span class="text-crimson">Black Belt Coaches</span>
        </h2>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-20 reveal">
        <!-- Prof 1 -->
        <div class="tactical-card bg-obsidian border border-steel/50 chamfer-card overflow-hidden flex flex-col justify-between">
          <div>
            <div class="relative aspect-[4/3] bg-carbon">
              <img src="https://images.unsplash.com/photo-1583473848882-f9a5bc7fd2ee?auto=format&fit=crop&w=700&q=85" onerror="this.src='https://placehold.co/600x450/292D35/D6D0C5?text=Prof.+Rafael+Santoso'" alt="Professor Rafael Santoso" class="w-full h-full object-cover" />
              <span class="absolute top-3 left-3 px-2.5 py-1 bg-obsidian/90 border border-crimson font-mono text-[10px] text-bone font-bold">BLACK BELT 3°</span>
            </div>
            <div class="p-5 space-y-2">
              <h3 class="font-tactical font-bold text-lg text-bone uppercase">Prof. Rafael Santoso</h3>
              <p class="font-mono text-[11px] text-crimson font-bold">Head Professor • IBJJF & ADCC Veteran</p>
              <p class="text-xs text-bone/75">16 tahun pengalaman BJJ. Juara Asian Open No-Gi & spesialis <em>Closed Guard, Back Control & Submission Chains</em>.</p>
            </div>
          </div>
          <!-- Rank Bar -->
          <div class="h-3 w-full bg-[#111318] border-t border-steel/40 flex justify-end">
            <div class="w-16 h-full bg-crimson flex items-center justify-evenly px-1">
              <span class="w-0.5 h-full bg-bone"></span><span class="w-0.5 h-full bg-bone"></span><span class="w-0.5 h-full bg-bone"></span>
            </div>
          </div>
        </div>

        <!-- Prof 2 -->
        <div class="tactical-card bg-obsidian border border-steel/50 chamfer-card overflow-hidden flex flex-col justify-between">
          <div>
            <div class="relative aspect-[4/3] bg-carbon">
              <img src="https://images.unsplash.com/photo-1594381898411-846e7d193883?auto=format&fit=crop&w=700&q=85" onerror="this.src='https://placehold.co/600x450/292D35/D6D0C5?text=Coach+Nadia+Kartika'" alt="Coach Nadia Kartika" class="w-full h-full object-cover" />
              <span class="absolute top-3 left-3 px-2.5 py-1 bg-obsidian/90 border border-crimson font-mono text-[10px] text-bone font-bold">BLACK BELT 1°</span>
            </div>
            <div class="p-5 space-y-2">
              <h3 class="font-tactical font-bold text-lg text-bone uppercase">Coach Nadia Kartika</h3>
              <p class="font-mono text-[11px] text-crimson font-bold">Women-Only & Fundamentals Lead</p>
              <p class="text-xs text-bone/75">11 tahun pengalaman. Medalis SEA Grappling & instruktur utama program <em>Women-Only Self-Defense</em>.</p>
            </div>
          </div>
          <div class="h-3 w-full bg-[#111318] border-t border-steel/40 flex justify-end">
            <div class="w-14 h-full bg-crimson flex items-center justify-evenly px-1">
              <span class="w-0.5 h-full bg-bone"></span>
            </div>
          </div>
        </div>

        <!-- Prof 3 -->
        <div class="tactical-card bg-obsidian border border-steel/50 chamfer-card overflow-hidden flex flex-col justify-between">
          <div>
            <div class="relative aspect-[4/3] bg-carbon">
              <img src="https://images.unsplash.com/photo-1567013127542-490d757e51fc?auto=format&fit=crop&w=700&q=85" onerror="this.src='https://placehold.co/600x450/292D35/D6D0C5?text=Coach+Marcus+Silva'" alt="Coach Marcus Silva" class="w-full h-full object-cover" />
              <span class="absolute top-3 left-3 px-2.5 py-1 bg-obsidian/90 border border-crimson font-mono text-[10px] text-bone font-bold">BLACK BELT 2°</span>
            </div>
            <div class="p-5 space-y-2">
              <h3 class="font-tactical font-bold text-lg text-bone uppercase">Coach Marcus Silva</h3>
              <p class="font-mono text-[11px] text-crimson font-bold">Competition Team & No-Gi Coach</p>
              <p class="text-xs text-bone/75">14 tahun pengalaman. Spesialis <em>Wrestling Takedowns, Leg Locks & High-Pace Competition Sparring</em>.</p>
            </div>
          </div>
          <div class="h-3 w-full bg-[#111318] border-t border-steel/40 flex justify-end">
            <div class="w-14 h-full bg-crimson flex items-center justify-evenly px-1">
              <span class="w-0.5 h-full bg-bone"></span><span class="w-0.5 h-full bg-bone"></span>
            </div>
          </div>
        </div>

        <!-- Prof 4 -->
        <div class="tactical-card bg-obsidian border border-steel/50 chamfer-card overflow-hidden flex flex-col justify-between">
          <div>
            <div class="relative aspect-[4/3] bg-carbon">
              <img src="https://images.unsplash.com/photo-1534438327276-14e5300c3a48?auto=format&fit=crop&w=700&q=85" onerror="this.src='https://placehold.co/600x450/292D35/D6D0C5?text=Coach+Bima+Wijaya'" alt="Coach Bima Wijaya" class="w-full h-full object-cover" />
              <span class="absolute top-3 left-3 px-2.5 py-1 bg-obsidian/90 border border-steel font-mono text-[10px] text-bone font-bold">BROWN BELT 4°</span>
            </div>
            <div class="p-5 space-y-2">
              <h3 class="font-tactical font-bold text-lg text-bone uppercase">Coach Bima Wijaya</h3>
              <p class="font-mono text-[11px] text-crimson font-bold">Kids & Teens BJJ Coordinator</p>
              <p class="text-xs text-bone/75">9 tahun pengalaman melatih anak & remaja. Fokus pada disiplin, kepercayaan diri, dan teknik anti-bullying.</p>
            </div>
          </div>
          <div class="h-3 w-full bg-[#5C3A21] border-t border-steel/40 flex justify-end">
            <div class="w-14 h-full bg-obsidian flex items-center justify-evenly px-1">
              <span class="w-0.5 h-full bg-bone"></span><span class="w-0.5 h-full bg-bone"></span><span class="w-0.5 h-full bg-bone"></span><span class="w-0.5 h-full bg-bone"></span>
            </div>
          </div>
        </div>
      </div>

      <!-- Weekly Class Schedule & Open Mat Schedule -->
      <div class="flex flex-col md:flex-row md:items-end justify-between mb-6 gap-4 reveal">
        <div>
          <span class="font-mono text-xs font-bold uppercase tracking-widest text-crimson">
            // 05. WEEKLY TIMETABLE & OPEN MAT
          </span>
          <h3 class="font-tactical text-3xl font-bold uppercase text-bone mt-1">
            Jadwal Kelas Mingguan & <span class="text-crimson">Open Mat</span>
          </h3>
        </div>

        <div class="flex flex-wrap gap-2">
          <select id="sched-day-filter" onchange="renderSchedule()" class="px-3.5 py-2.5 rounded bg-obsidian border border-steel/50 text-xs font-tactical font-bold text-bone">
            <option value="All">Semua Hari (Senin – Minggu)</option>
            <option value="Senin">Senin</option>
            <option value="Selasa">Selasa</option>
            <option value="Rabu">Rabu</option>
            <option value="Kamis">Kamis</option>
            <option value="Jumat">Jumat (Open Mat)</option>
            <option value="Sabtu">Sabtu (Kids & Women)</option>
          </select>
          <select id="sched-type-filter" onchange="renderSchedule()" class="px-3.5 py-2.5 rounded bg-obsidian border border-steel/50 text-xs font-tactical font-bold text-bone">
            <option value="All">Semua Jenis Kelas</option>
            <option value="Fundamentals">Fundamentals / Beginner</option>
            <option value="Kids & Teens">Kids & Teens BJJ</option>
            <option value="Women Only">Women Only</option>
            <option value="Competition">Intermediate / Competition</option>
            <option value="Open Mat">Open Mat Sparring</option>
          </select>
        </div>
      </div>

      <div class="bg-obsidian border border-steel/50 chamfer-sm overflow-hidden shadow-2xl reveal">
        <div class="overflow-x-auto">
          <table class="w-full text-left text-xs sm:text-sm">
            <thead class="bg-carbon text-bone font-tactical uppercase text-xs border-b border-steel/40">
              <tr>
                <th class="p-4">Hari & Jam</th>
                <th class="p-4">Kelas & Level</th>
                <th class="p-4">Dress Code</th>
                <th class="p-4">Professor / Coach</th>
                <th class="p-4 text-right">Reservasi</th>
              </tr>
            </thead>
            <tbody id="bjj-schedule-body" class="divide-y divide-steel/25">
              <!-- Populated dynamically -->
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>

  <!-- ==================== FACILITIES, BEGINNER GUIDE, EQUIPMENT & SAFETY ETIQUETTE ==================== -->
  <section id="facilities-gear-section" data-section="gear" class="py-20 bg-obsidian">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <!-- Facilities Showcase -->
      <div class="mb-12 reveal">
        <span class="font-mono text-xs font-bold uppercase tracking-widest text-crimson">
          // 06. TACTICAL DOJO FACILITIES
        </span>
        <h2 class="font-tactical text-3xl sm:text-4xl font-bold uppercase text-bone mt-1">
          Fasilitas Matras & <span class="text-crimson">Zona Latihan</span>
        </h2>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-20 reveal">
        <div class="tactical-card bg-carbon border border-steel/40 chamfer-card overflow-hidden">
          <img src="https://images.unsplash.com/photo-1555597673-b21d5c935865?auto=format&fit=crop&w=750&q=85" alt="Zebra Tatami Mat Area" class="w-full h-48 object-cover" />
          <div class="p-5">
            <span class="font-mono text-[10px] text-crimson font-bold">ZONE 01 // 400m² MAT SPACE</span>
            <h4 class="font-tactical font-bold text-lg text-bone uppercase mt-1">Zebra Competition Tatami</h4>
            <p class="text-xs text-bone/75 mt-1.5">Matras anti-bakteri standar IBJJF setebal 5cm dengan sistem peredam bantingan (<em>sub-floor spring system</em>).</p>
          </div>
        </div>

        <div class="tactical-card bg-carbon border border-steel/40 chamfer-card overflow-hidden">
          <img src="https://images.unsplash.com/photo-1534438327276-14e5300c3a48?auto=format&fit=crop&w=750&q=85" alt="Strength and Conditioning Zone" class="w-full h-48 object-cover" />
          <div class="p-5">
            <span class="font-mono text-[10px] text-crimson font-bold">ZONE 02 // PERFORMANCE LAB</span>
            <h4 class="font-tactical font-bold text-lg text-bone uppercase mt-1">Grappling Strength & Mobility</h4>
            <p class="text-xs text-bone/75 mt-1.5">Area kettlebell, pull-up rig, grappling dummies, dan ruang pemulihan untuk meningkatkan daya tahan bertanding.</p>
          </div>
        </div>

        <div class="tactical-card bg-carbon border border-steel/40 chamfer-card overflow-hidden">
          <img src="https://images.unsplash.com/photo-1517438322307-e67111335449?auto=format&fit=crop&w=750&q=85" alt="Locker, Shower & Athlete Lounge" class="w-full h-48 object-cover" />
          <div class="p-5">
            <span class="font-mono text-[10px] text-crimson font-bold">ZONE 03 // HYGIENE & LOUNGE</span>
            <h4 class="font-tactical font-bold text-lg text-bone uppercase mt-1">Locker Room, Hot Shower & Lounge</h4>
            <p class="text-xs text-bone/75 mt-1.5">Ruang ganti pria & wanita terpisah dengan loker digital, hot shower, penyewaan Gi bersih, dan area tunggu orang tua.</p>
          </div>
        </div>
      </div>

      <!-- Beginner Guide + Equipment Guide + Safety & Etiquette -->
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 reveal">
        <!-- Beginner Guide (4 Cols) -->
        <div class="lg:col-span-4 bg-carbon border border-steel/50 chamfer-card p-6 sm:p-7 space-y-4">
          <span class="px-3 py-1 bg-crimson text-bone font-mono text-[10px] font-bold uppercase">FIRST-TIMER PROTOCOL</span>
          <h3 class="font-tactical text-2xl font-bold uppercase text-bone">Beginner Guide</h3>
          <p class="text-xs text-bone/80 leading-relaxed">
            Belum pernah berlatih bela diri sama sekali? Tidak masalah. 70% siswa kami memulai dari nol.
          </p>
          <ol class="space-y-2.5 text-xs text-bone/85 list-decimal list-inside">
            <li><strong>Datang 15 Menit Lebih Awal:</strong> Tim front-desk akan menyiapkan ukuran <em>Loaner Gi</em> (seragam pinjaman) gratis untuk Anda.</li>
            <li><strong>Belajar Jatuh Aman (Ukemi):</strong> Hari pertama berfokus pada cara berguling aman, postur dasar, dan menjaga jarak.</li>
            <li><strong>Tanpa Sparring Keras di Awal:</strong> Pemula berlatih teknik kooperatif bersama partner berpengalaman.</li>
          </ol>
        </div>

        <!-- Equipment Guide (4 Cols) -->
        <div class="lg:col-span-4 bg-carbon border border-steel/50 chamfer-card p-6 sm:p-7 space-y-4">
          <span class="px-3 py-1 bg-obsidian border border-crimson text-crimson font-mono text-[10px] font-bold uppercase">COMBAT LOADOUT</span>
          <h3 class="font-tactical text-2xl font-bold uppercase text-bone">Equipment Guide</h3>
          <ul class="space-y-3 text-xs text-bone/85">
            <li class="p-2.5 bg-obsidian/80 rounded border border-steel/30">
              <strong class="text-bone block">🥋 Kimono Gi & Rank Belt</strong>
              <span class="text-bone/70">Kain katun Pearl-Weave 450gsm (Putih, Biru, atau Hitam). Pinjaman gratis tersedia untuk sesi Trial.</span>
            </li>
            <li class="p-2.5 bg-obsidian/80 rounded border border-steel/30">
              <strong class="text-bone block">👕 No-Gi Rash Guard & Fight Shorts</strong>
              <span class="text-bone/70">Pakaian kompresi tanpa ritsleting/saku untuk sesi latihan No-Gi submission grappling.</span>
            </li>
            <li class="p-2.5 bg-obsidian/80 rounded border border-steel/30">
              <strong class="text-bone block">🛡️ Mouthguard & Ear Guards</strong>
              <span class="text-bone/70">Pelindung gigi & telinga opsional sangat disarankan saat sesi sparring intensif.</span>
            </li>
          </ul>
        </div>

        <!-- Safety & Mat Etiquette (4 Cols) -->
        <div class="lg:col-span-4 bg-carbon border-2 border-crimson/70 chamfer-card p-6 sm:p-7 space-y-4">
          <span class="px-3 py-1 bg-crimson text-bone font-mono text-[10px] font-bold uppercase">ZERO-INJURY CODE</span>
          <h3 class="font-tactical text-2xl font-bold uppercase text-bone">Safety & Mat Etiquette</h3>
          <ul class="space-y-2.5 text-xs text-bone/85">
            <li class="flex gap-2"><span class="text-crimson font-bold">✓</span><span><strong>Kebersihan Gi & Tubuh:</strong> Wajib mengenakan Gi yang dicuci bersih setiap sesi dan kuku tangan/kaki dipotong pendek.</span></li>
            <li class="flex gap-2"><span class="text-crimson font-bold">✓</span><span><strong>Alas Kaki di Luar Matras:</strong> Selalu gunakan sandal saat keluar dari area tatami (termasuk ke toilet).</span></li>
            <li class="flex gap-2"><span class="text-crimson font-bold">✓</span><span><strong>Tap Early, Tap Often:</strong> Tepuk tubuh partner atau matras ("Tap") segera saat kuncian terasa mengunci, dan wajib langsung dilepas.</span></li>
            <li class="flex gap-2"><span class="text-crimson font-bold">✓</span><span><strong>Lepas Perhiasan:</strong> Cincin, jam tangan, kalung, dan tindik wajib dilepas sebelum naik ke matras.</span></li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <!-- ==================== TRAINING PACKAGES & 7-STEP TRIAL CLASS BOOKING WIZARD ==================== -->
  <section id="trial-booking-section" data-section="booking" class="py-20 bg-carbon/45 tatami-grid border-t border-steel/30">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <!-- Training Packages -->
      <div class="text-center max-w-3xl mx-auto mb-12 reveal">
        <span class="font-mono text-xs font-bold uppercase tracking-widest text-crimson">
          // 07. MEMBERSHIP & TRIAL OPTIONS
        </span>
        <h2 class="font-tactical text-3xl sm:text-4xl font-bold uppercase text-bone mt-1">
          Paket Latihan & <span class="text-crimson">Trial Class</span>
        </h2>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-20 reveal">
        <div class="tactical-card bg-obsidian border border-steel/50 chamfer-card p-6 flex flex-col justify-between">
          <div>
            <span class="font-mono text-[10px] text-crimson font-bold uppercase">FIRST VISIT</span>
            <h3 class="font-tactical text-xl font-bold text-bone uppercase mt-1">Trial Class</h3>
            <p class="font-tactical text-3xl font-bold text-bone my-3">GRATIS <span class="text-xs font-mono text-bone/60">/ Rp 100rb (+Gi)</span></p>
            <ul class="space-y-2 text-xs text-bone/75">
              <li>• 1x Sesi Fundamentals / Women / Kids</li>
              <li>• Konsultasi level bersama Professor</li>
              <li>• Opsi pinjaman Gi steril</li>
            </ul>
          </div>
          <button onclick="selectSessionForWizard('Free Trial (Gratis - Bawa Pakaian Olahraga)')" class="mt-6 w-full py-3 rounded bg-carbon hover:bg-crimson text-bone font-tactical font-bold text-xs uppercase border border-steel/50 transition-all">
            Pilih Trial Class
          </button>
        </div>

        <div class="tactical-card bg-obsidian border border-steel/50 chamfer-card p-6 flex flex-col justify-between">
          <div>
            <span class="font-mono text-[10px] text-bone/70 font-bold uppercase">VISITOR PASS</span>
            <h3 class="font-tactical text-xl font-bold text-bone uppercase mt-1">Single Drop-In</h3>
            <p class="font-tactical text-3xl font-bold text-bone my-3">Rp 220.000 <span class="text-xs font-mono text-bone/60">/ sesi</span></p>
            <ul class="space-y-2 text-xs text-bone/75">
              <li>• Akses 1x kelas Gi, No-Gi, atau Open Mat</li>
              <li>• Berlaku untuk tamu dari luar kota/negara</li>
              <li>• Akses locker & hot shower</li>
            </ul>
          </div>
          <button onclick="selectSessionForWizard('Drop-in Single Session (Rp 220.000)')" class="mt-6 w-full py-3 rounded bg-carbon hover:bg-crimson text-bone font-tactical font-bold text-xs uppercase border border-steel/50 transition-all">
            Pilih Drop-In
          </button>
        </div>

        <div class="tactical-card bg-obsidian border-2 border-crimson chamfer-card p-6 flex flex-col justify-between shadow-2xl shadow-crimson/20">
          <div>
            <span class="px-2.5 py-0.5 bg-crimson text-bone font-mono text-[10px] font-bold uppercase">MOST POPULAR</span>
            <h3 class="font-tactical text-xl font-bold text-bone uppercase mt-2">Monthly Unlimited</h3>
            <p class="font-tactical text-3xl font-bold text-crimson my-3">Rp 1.350.000 <span class="text-xs font-mono text-bone/60">/ bulan</span></p>
            <ul class="space-y-2 text-xs text-bone/85">
              <li>• Unlimited kelas Gi, No-Gi & Open Mat</li>
              <li>• Digital Student Progress & Grading Eligibility</li>
              <li>• Akses Strength & Conditioning Zone</li>
            </ul>
          </div>
          <button onclick="selectSessionForWizard('Free Trial (Lanjut Monthly Unlimited)')" class="mt-6 w-full py-3 rounded bg-crimson hover:bg-[#d8443e] text-bone font-tactical font-bold text-xs uppercase transition-all">
            Mulai dengan Trial
          </button>
        </div>

        <div class="tactical-card bg-obsidian border border-steel/50 chamfer-card p-6 flex flex-col justify-between">
          <div>
            <span class="font-mono text-[10px] text-crimson font-bold uppercase">1-ON-1 ACCELERATOR</span>
            <h3 class="font-tactical text-xl font-bold text-bone uppercase mt-1">Private Coaching</h3>
            <p class="font-tactical text-3xl font-bold text-bone my-3">Rp 600.000 <span class="text-xs font-mono text-bone/60">/ 60 mnt</span></p>
            <ul class="space-y-2 text-xs text-bone/75">
              <li>• Latihan privat 1-on-1 bersama Black Belt</li>
              <li>• Kurikulum personal & analisis video sparring</li>
              <li>• Jadwal fleksibel di luar jam reguler</li>
            </ul>
          </div>
          <button onclick="selectSessionForWizard('Private Intro Session 1-on-1 (Rp 600.000)')" class="mt-6 w-full py-3 rounded bg-carbon hover:bg-crimson text-bone font-tactical font-bold text-xs uppercase border border-steel/50 transition-all">
            Booking Private
          </button>
        </div>
      </div>

      <!-- 7-STEP TRIAL CLASS RESERVATION WIZARD -->
      <div class="max-w-4xl mx-auto bg-obsidian border-2 border-crimson/70 chamfer-card shadow-2xl overflow-hidden reveal">
        <div class="bg-carbon p-6 border-b border-steel/40">
          <div class="flex items-center justify-between font-mono text-xs font-bold mb-2.5">
            <span id="tr-step-label" class="text-crimson uppercase">STEP 1 OF 7 // PILIH PROGRAM BJJ</span>
            <span id="tr-step-pct" class="text-bone">14%</span>
          </div>
          <div class="w-full h-2 bg-obsidian rounded-full overflow-hidden">
            <div id="tr-progress-bar" class="h-full bg-crimson transition-all duration-500" style="width: 14.28%"></div>
          </div>
          <div class="grid grid-cols-7 gap-1.5 mt-3">
            <button type="button" aria-hidden="true" tabindex="-1" class="tr-dot h-1.5 rounded bg-crimson"></button>
            <button type="button" aria-hidden="true" tabindex="-1" class="tr-dot h-1.5 rounded bg-steel/40"></button>
            <button type="button" aria-hidden="true" tabindex="-1" class="tr-dot h-1.5 rounded bg-steel/40"></button>
            <button type="button" aria-hidden="true" tabindex="-1" class="tr-dot h-1.5 rounded bg-steel/40"></button>
            <button type="button" aria-hidden="true" tabindex="-1" class="tr-dot h-1.5 rounded bg-steel/40"></button>
            <button type="button" aria-hidden="true" tabindex="-1" class="tr-dot h-1.5 rounded bg-steel/40"></button>
            <button type="button" aria-hidden="true" tabindex="-1" class="tr-dot h-1.5 rounded bg-steel/40"></button>
          </div>
        </div>

        <div class="p-6 sm:p-8">
          <!-- STEP 1: Pilih Program -->
          <div id="tr-step-1" class="tr-step space-y-4">
            <h3 class="font-tactical text-xl font-bold text-bone uppercase">1. Pilih Program Latihan</h3>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 text-xs">
              <label class="cursor-pointer">
                <input type="radio" name="tr_program" value="Adult BJJ (Fundamentals / Gi & No-Gi)" checked onchange="toggleParentField(); updateTrialSummary()" class="peer sr-only" />
                <div class="p-4 rounded bg-carbon border border-steel/50 peer-checked:border-crimson peer-checked:bg-crimson/20 font-bold text-bone">
                  🥋 Adult BJJ (18+ Thn)
                </div>
              </label>
              <label class="cursor-pointer">
                <input type="radio" name="tr_program" value="Women Only BJJ & Self-Defense" onchange="toggleParentField(); updateTrialSummary()" class="peer sr-only" />
                <div class="p-4 rounded bg-carbon border border-steel/50 peer-checked:border-crimson peer-checked:bg-crimson/20 font-bold text-bone">
                  🛡️ Women Only BJJ
                </div>
              </label>
              <label class="cursor-pointer">
                <input type="radio" name="tr_program" value="Kids BJJ (5 - 12 Thn)" onchange="toggleParentField(); updateTrialSummary()" class="peer sr-only" />
                <div class="p-4 rounded bg-carbon border border-steel/50 peer-checked:border-crimson peer-checked:bg-crimson/20 font-bold text-bone">
                  👦 Kids BJJ (5–12 Thn)
                </div>
              </label>
              <label class="cursor-pointer">
                <input type="radio" name="tr_program" value="Teen BJJ (13 - 17 Thn)" onchange="toggleParentField(); updateTrialSummary()" class="peer sr-only" />
                <div class="p-4 rounded bg-carbon border border-steel/50 peer-checked:border-crimson peer-checked:bg-crimson/20 font-bold text-bone">
                  ⚡ Teen BJJ (13–17 Thn)
                </div>
              </label>
              <label class="cursor-pointer sm:col-span-2">
                <input type="radio" name="tr_program" value="Competition Team & Submission Grappling" onchange="toggleParentField(); updateTrialSummary()" class="peer sr-only" />
                <div class="p-4 rounded bg-carbon border border-steel/50 peer-checked:border-crimson peer-checked:bg-crimson/20 font-bold text-bone">
                  🏆 Competition Training (Gi & No-Gi Sparring)
                </div>
              </label>
            </div>
          </div>

          <!-- STEP 2: Pilih Level Pengalaman -->
          <div id="tr-step-2" class="tr-step hidden space-y-4">
            <h3 class="font-tactical text-xl font-bold text-bone uppercase">2. Pilih Level Pengalaman</h3>
            <select id="tr_level" onchange="updateTrialSummary()" class="w-full p-3.5 rounded bg-carbon border border-steel/50 text-sm font-bold text-bone">
              <option value="Complete Beginner (Belum Pernah Bela Diri)">Complete Beginner (Belum Pernah Bela Diri)</option>
              <option value="Beginner (White Belt / < 1 Tahun)">Beginner (White Belt / &lt; 1 Tahun)</option>
              <option value="Intermediate (Blue Belt / Berpengalaman)">Intermediate (Blue Belt / Berpengalaman)</option>
              <option value="Advanced (Purple / Brown / Black Belt)">Advanced (Purple / Brown / Black Belt)</option>
            </select>
          </div>

          <!-- STEP 3: Pilih Jadwal & Instruktur -->
          <div id="tr-step-3" class="tr-step hidden space-y-4">
            <h3 class="font-tactical text-xl font-bold text-bone uppercase">3. Pilih Hari, Jam & Professor</h3>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 text-xs">
              <div>
                <label class="block font-mono text-bone/70 mb-1">Hari Latihan</label>
                <select id="tr_day" onchange="updateTrialSummary()" class="w-full p-3 rounded bg-carbon border border-steel/50 font-bold text-bone">
                  <option value="Senin">Senin</option>
                  <option value="Selasa">Selasa</option>
                  <option value="Rabu">Rabu</option>
                  <option value="Kamis">Kamis</option>
                  <option value="Jumat (Open Mat)">Jumat (Open Mat)</option>
                  <option value="Sabtu (Weekend Session)">Sabtu (Weekend Session)</option>
                </select>
              </div>
              <div>
                <label class="block font-mono text-bone/70 mb-1">Sesi Jam</label>
                <select id="tr_time" onchange="updateTrialSummary()" class="w-full p-3 rounded bg-carbon border border-steel/50 font-bold text-bone">
                  <option value="Pagi (07:30 - 09:00 WIB)">Pagi (07:30 – 09:00 WIB)</option>
                  <option value="Sore Kids/Teens (16:00 - 17:15 WIB)">Sore Kids/Teens (16:00 – 17:15 WIB)</option>
                  <option value="Malam Adult/Women (19:00 - 20:30 WIB)" selected>Malam Adult/Women (19:00 – 20:30 WIB)</option>
                </select>
              </div>
              <div>
                <label class="block font-mono text-bone/70 mb-1">Professor / Coach</label>
                <select id="tr_prof" onchange="updateTrialSummary()" class="w-full p-3 rounded bg-carbon border border-steel/50 font-bold text-bone">
                  <option value="Prof. Rafael Santoso (Black Belt 3°)">Prof. Rafael Santoso (Black Belt 3°)</option>
                  <option value="Coach Nadia Kartika (Black Belt 1° - Women)">Coach Nadia Kartika (Black Belt 1°)</option>
                  <option value="Coach Marcus Silva (Black Belt 2° - No-Gi)">Coach Marcus Silva (Black Belt 2°)</option>
                  <option value="Coach Bima Wijaya (Brown Belt - Kids/Teens)">Coach Bima Wijaya (Brown Belt)</option>
                </select>
              </div>
            </div>
          </div>

          <!-- STEP 4: Isi Data Peserta -->
          <div id="tr-step-4" class="tr-step hidden space-y-4">
            <h3 class="font-tactical text-xl font-bold text-bone uppercase">4. Data Lengkap Peserta</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-xs">
              <div>
                <label class="block font-mono text-bone/70 mb-1">Nama Lengkap Peserta *</label>
                <input id="tr_name" type="text" placeholder="Contoh: Arya Pratama" oninput="updateTrialSummary()" class="w-full p-3 rounded bg-carbon border border-steel/50 text-bone" />
              </div>
              <div>
                <label class="block font-mono text-bone/70 mb-1">Usia Peserta *</label>
                <input id="tr_age" type="number" min="4" max="75" placeholder="Contoh: 26" oninput="updateTrialSummary()" class="w-full p-3 rounded bg-carbon border border-steel/50 text-bone" />
              </div>
              <div>
                <label class="block font-mono text-bone/70 mb-1">Nomor WhatsApp Aktif *</label>
                <input id="tr_wa" type="tel" placeholder="Contoh: 081299887766" oninput="updateTrialSummary()" class="w-full p-3 rounded bg-carbon border border-steel/50 text-bone" />
              </div>
              <div>
                <label class="block font-mono text-bone/70 mb-1">Pengalaman Martial Arts</label>
                <input id="tr_exp" type="text" placeholder="Contoh: Belum pernah / Pernah Judo 1 thn" oninput="updateTrialSummary()" class="w-full p-3 rounded bg-carbon border border-steel/50 text-bone" />
              </div>
              <div id="parent-contact-wrap" class="hidden sm:col-span-2">
                <label class="block font-mono text-crimson font-bold mb-1">Nama & Nomor WhatsApp Orang Tua / Wali (Wajib untuk Kids & Teens) *</label>
                <input id="tr_parent" type="text" placeholder="Contoh: Bapak Hendra - 081211223344" oninput="updateTrialSummary()" class="w-full p-3 rounded bg-carbon border border-crimson/60 text-bone" />
              </div>
            </div>
          </div>

          <!-- STEP 5: Pilih Jenis Sesi -->
          <div id="tr-step-5" class="tr-step hidden space-y-4">
            <h3 class="font-tactical text-xl font-bold text-bone uppercase">5. Pilih Jenis Sesi Trial</h3>
            <select id="tr_session" onchange="updateTrialSummary()" class="w-full p-3.5 rounded bg-carbon border border-steel/50 text-sm font-bold text-bone">
              <option value="Free Trial (Gratis - Bawa Pakaian Olahraga)" data-cost="GRATIS (Rp 0)">Free Trial — Gratis (Gunakan kaos olahraga & celana training)</option>
              <option value="Paid Trial + Sterile Loaner Gi (Rp 100.000)" data-cost="Rp 100.000">Paid Trial + Sterile Loaner Gi — Rp 100.000 (Termasuk pinjaman Kimono Gi)</option>
              <option value="Drop-in Single Session (Rp 220.000)" data-cost="Rp 220.000">Drop-in Single Session — Rp 220.000</option>
              <option value="Private Intro Session 1-on-1 (Rp 600.000)" data-cost="Rp 600.000">Private Intro Session 1-on-1 — Rp 600.000</option>
            </select>
          </div>

          <!-- STEP 6: Review Reservasi -->
          <div id="tr-step-6" class="tr-step hidden space-y-4">
            <h3 class="font-tactical text-xl font-bold text-bone uppercase">6. Review Reservasi Trial Class</h3>
            <div id="tr-summary-box" class="bg-carbon p-5 rounded border border-steel/50 space-y-2.5 text-xs sm:text-sm">
              <!-- Populated by JS -->
            </div>
          </div>

          <!-- STEP 7: Kirim Reservasi via WhatsApp -->
          <div id="tr-step-7" class="tr-step hidden space-y-4">
            <h3 class="font-tactical text-xl font-bold text-bone uppercase text-center">7. Kirim Reservasi ke Admin Dojo</h3>
            <div id="tr-wa-preview" class="bg-carbon text-bone/95 p-4 rounded font-mono text-xs whitespace-pre-line border border-crimson/50 leading-relaxed"></div>
            <div class="flex flex-col sm:flex-row gap-3">
              <button onclick="sendTrialToWhatsApp()" class="flex-1 py-3.5 px-6 rounded bg-[#25D366] hover:bg-[#1ebe5d] text-white font-tactical font-bold text-sm uppercase tracking-wider shadow-lg">
                💬 Kirim Reservasi via WhatsApp
              </button>
              <button onclick="copyTrialWA()" class="py-3.5 px-5 rounded bg-carbon hover:bg-steel/30 text-bone font-mono text-xs border border-steel/50">
                📋 Salin Pesan
              </button>
            </div>
            <p id="tr-copy-toast" class="hidden text-center font-mono text-xs text-crimson font-bold">✓ Ringkasan reservasi berhasil disalin!</p>
          </div>

          <!-- Wizard Nav Buttons -->
          <div class="flex items-center justify-between mt-7 pt-5 border-t border-steel/30">
            <button id="tr-prev" onclick="changeTrialStep(-1)" disabled class="px-5 py-2.5 rounded bg-carbon text-bone font-tactical font-bold text-xs uppercase disabled:opacity-40">
              ← Back
            </button>
            <button id="tr-next" onclick="changeTrialStep(1)" class="px-6 py-2.5 rounded bg-crimson hover:bg-[#d8443e] text-bone font-tactical font-bold text-xs uppercase shadow">
              Next Step →
            </button>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ==================== EVENTS, TOURNAMENTS, TESTIMONIALS & FAQ ==================== -->
  <section id="events-faq-section" data-section="schedule" class="py-20 bg-obsidian border-t border-steel/30">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <!-- Events & Tournaments -->
      <div class="mb-16 reveal">
        <span class="font-mono text-xs font-bold uppercase tracking-widest text-crimson">
          // 08. EVENTS, SEMINARS & GRADING
        </span>
        <h2 class="font-tactical text-3xl sm:text-4xl font-bold uppercase text-bone mt-1 mb-8">
          Agenda Turnamen, <span class="text-crimson">Seminar & Belt Grading</span>
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
          <div class="tactical-card bg-carbon border border-steel/40 chamfer-sm p-6">
            <span class="font-mono text-xs text-crimson font-bold">EVERY FRIDAY • 19:30 WIB</span>
            <h4 class="font-tactical text-lg font-bold text-bone uppercase mt-1">Friday Night Open Mat</h4>
            <p class="text-xs text-bone/75 mt-2">Sesi sparring bebas 6 menit/ronde terbuka bagi seluruh anggota dan tamu dari akademi sahabat.</p>
          </div>

          <div class="tactical-card bg-carbon border border-steel/40 chamfer-sm p-6">
            <span class="font-mono text-xs text-crimson font-bold">19 DESEMBER 2026 • 10:00 WIB</span>
            <h4 class="font-tactical text-lg font-bold text-bone uppercase mt-1">Winter Belt Grading & Promotion</h4>
            <p class="text-xs text-bone/75 mt-2">Upacara evaluasi kenaikan sabuk dan penyematan stripe resmi dipimpin langsung oleh Prof. Rafael Santoso.</p>
          </div>

          <div class="tactical-card bg-carbon border border-steel/40 chamfer-sm p-6">
            <span class="font-mono text-xs text-crimson font-bold">24 JANUARI 2027 • FULL DAY</span>
            <h4 class="font-tactical text-lg font-bold text-bone uppercase mt-1">Garda Submission Challenge IV</h4>
            <p class="text-xs text-bone/75 mt-2">Turnamen internal & antar dojo kategori Kids, Juveniles, Adult Gi & No-Gi Submission Only.</p>
          </div>
        </div>
      </div>

      <!-- Testimonials -->
      <div class="mb-16 reveal">
        <h3 class="font-tactical text-2xl sm:text-3xl font-bold uppercase text-bone text-center mb-8">
          Cerita Transformasi <span class="text-crimson">Anggota Dojo</span>
        </h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
          <div class="bg-carbon p-6 border border-steel/40 chamfer-sm">
            <p class="text-xs sm:text-sm text-bone/85 leading-relaxed">
              "Saya bergabung tanpa pengalaman olahraga sama sekali. Dalam 8 bulan berat badan turun 11 kg, stamina meningkat, dan baru saja meraih Stripe ke-3 White Belt!"
            </p>
            <div class="mt-4 pt-3 border-t border-steel/30 flex justify-between items-center font-mono text-xs">
              <div><strong class="text-bone block">Daniel Kusuma (31 Thn)</strong><span class="text-crimson">White Belt 3° • Adult Gi</span></div>
              <span class="text-crimson">★★★★★</span>
            </div>
          </div>

          <div class="bg-carbon p-6 border border-steel/40 chamfer-sm">
            <p class="text-xs sm:text-sm text-bone/85 leading-relaxed">
              "Kelas Women-Only bersama Coach Nadia membuat saya merasa sangat nyaman belajar teknik melepaskan diri dari kuncian dan membangun kepercayaan diri."
            </p>
            <div class="mt-4 pt-3 border-t border-steel/30 flex justify-between items-center font-mono text-xs">
              <div><strong class="text-bone block">clarissa Wijaya (25 Thn)</strong><span class="text-crimson">Blue Belt • Women Only</span></div>
              <span class="text-crimson">★★★★★</span>
            </div>
          </div>

          <div class="bg-carbon p-6 border border-steel/40 chamfer-sm">
            <p class="text-xs sm:text-sm text-bone/85 leading-relaxed">
              "Anak kami (8 tahun) menjadi jauh lebih disiplin, fokus, dan tenang menghadapi situasi di sekolah sejak berlatih di kelas Kids BJJ Garda Grapple."
            </p>
            <div class="mt-4 pt-3 border-t border-steel/30 flex justify-between items-center font-mono text-xs">
              <div><strong class="text-bone block">Ibu Ratna Sari</strong><span class="text-crimson">Orang Tua Siswa Kids BJJ</span></div>
              <span class="text-crimson">★★★★★</span>
            </div>
          </div>
        </div>
      </div>

      <!-- FAQ -->
      <div class="max-w-3xl mx-auto reveal">
        <h3 class="font-tactical text-2xl sm:text-3xl font-bold uppercase text-bone text-center mb-6">
          Frequently Asked Questions (FAQ)
        </h3>
        <div id="bjj-faq-list" class="space-y-3"></div>
      </div>
    </div>
  </section>

  <!-- ==================== FOOTER ==================== -->
  <footer class="bg-carbon text-bone pt-12 pb-8 border-t-2 border-crimson">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row items-center justify-between gap-6 text-xs font-mono">
      <div>
        <span class="font-tactical text-xl font-bold text-bone">GARDA <span class="text-crimson">GRAPPLE</span></span>
        <p class="text-bone/70 mt-1">Jl. Panglima Polim Tactical Block No. 19, Jakarta Selatan • Buka Senin–Minggu (07:00 – 21:30 WIB)</p>
      </div>
      <div class="flex flex-wrap gap-4 text-bone/80">
        <a href="#programs-section" class="hover:text-crimson">Programs</a>
        <a href="#belts-progress-section" class="hover:text-crimson">Belt System</a>
        <a href="#schedule-coaches-section" class="hover:text-crimson">Schedule</a>
        <a href="#trial-booking-section" class="hover:text-crimson">Free Trial</a>
      </div>
      <p class="text-steel">© 2026 Garda Grapple BJJ Academy. Oss.</p>
    </div>
  </footer>

  <!-- ==================== FLOATING WHATSAPP & UNIQUE "PROFESSOR KIRA AI" ==================== -->
  <a
    href="https://wa.me/6281234567890?text=Oss%20Admin%20Garda%20Grapple%20BJJ!%20Saya%20ingin%20bertanya%20tentang%20jadwal%20Trial%20Class."
    target="_blank"
    rel="noopener noreferrer"
    id="garda-wa-link" data-whatsapp-link class="fixed bottom-5 left-5 z-40 flex items-center gap-2.5 bg-[#25D366] hover:bg-[#1ebe5d] text-white px-4 py-3.5 rounded-full shadow-2xl transition-transform hover:scale-105"
  >
    <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
      <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.662.591 1.221.774 1.394.86s.274.072.376-.043c.101-.116.433-.506.549-.68.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.045.072.045.419-.1.824z"/>
    </svg>
    <span class="hidden sm:inline font-tactical font-bold text-xs uppercase tracking-wider">Dojo WhatsApp</span>
  </a>

  <!-- Unique Floating AI Chatbot: "Professor Kira — Tactical BJJ AI" -->
  <div class="fixed bottom-5 right-5 z-50">
    <div id="kira-ai-window" class="hidden mb-3 w-[340px] sm:w-[390px] bg-obsidian rounded-xl shadow-2xl border-2 border-crimson overflow-hidden">
      <div class="bg-carbon text-bone p-4 flex items-center justify-between border-b border-steel/40">
        <div class="flex items-center gap-3">
          <div class="w-11 h-11 bg-obsidian border border-crimson chamfer-sm flex items-center justify-center relative">
            <svg class="w-7 h-7" viewBox="0 0 40 40" fill="none">
              <polygon points="12,3 28,3 37,12 37,28 28,37 12,37 3,28 3,12" stroke="#C43B35" stroke-width="2.2" fill="#111318"/>
              <rect x="8" y="17" width="24" height="6" fill="#D6D0C5"/>
              <rect x="24" y="17" width="8" height="6" fill="#C43B35"/>
            </svg>
            <span class="absolute -bottom-1 -right-1 w-3 h-3 rounded-full bg-[#25D366] border-2 border-obsidian"></span>
          </div>
          <div>
            <h4 class="font-tactical font-bold text-sm text-bone uppercase">Professor Kira AI 🥋</h4>
            <p class="font-mono text-[10px] text-crimson">Tactical BJJ & Membership Advisor</p>
          </div>
        </div>
        <button onclick="toggleKiraAI()" class="w-8 h-8 rounded bg-obsidian hover:bg-crimson text-bone font-bold flex items-center justify-center">✕</button>
      </div>

      <div id="kira-ai-feed" class="h-72 overflow-y-auto p-4 space-y-3 tatami-grid text-xs sm:text-sm">
        <div class="bg-carbon p-3.5 rounded border border-steel/40 text-bone leading-relaxed">
          Oss! 🥋 Saya <strong>Professor Kira AI</strong>. Baru pertama kali ingin coba Brazilian Jiu-Jitsu, mencari kelas <strong>Women-Only / Kids</strong>, atau butuh info jadwal & biaya? Tanyakan di sini!
        </div>
      </div>

      <div class="px-3 py-2 bg-carbon border-t border-steel/30 flex gap-1.5 overflow-x-auto">
        <button onclick="askKiraAI('Saya pemula total belum pernah bela diri, mulai dari mana?')" class="whitespace-nowrap px-3 py-1.5 rounded bg-obsidian hover:bg-crimson text-bone border border-steel/50 font-mono text-[10px]">
          🥋 Pemula Total
        </button>
        <button onclick="askKiraAI('Info kelas Women Only BJJ & Self-Defense')" class="whitespace-nowrap px-3 py-1.5 rounded bg-obsidian hover:bg-crimson text-bone border border-steel/50 font-mono text-[10px]">
          🛡️ Women Only
        </button>
        <button onclick="askKiraAI('Apa perbedaan kelas Gi dan No-Gi?')" class="whitespace-nowrap px-3 py-1.5 rounded bg-obsidian hover:bg-crimson text-bone border border-steel/50 font-mono text-[10px]">
          ⚔️ Gi vs No-Gi
        </button>
        <button onclick="askKiraAI('Berapa biaya Trial Class dan Monthly Membership?')" class="whitespace-nowrap px-3 py-1.5 rounded bg-obsidian hover:bg-crimson text-bone border border-steel/50 font-mono text-[10px]">
          💳 Biaya & Trial
        </button>
      </div>

      <form onsubmit="handleKiraAISubmit(event)" class="p-3 bg-carbon border-t border-steel/40 flex gap-2">
        <input id="kira-ai-input" type="text" placeholder="Tanya program, belt, jadwal, biaya..." class="flex-1 px-3 py-2.5 rounded bg-obsidian border border-steel/50 text-xs text-bone focus:outline-none focus:border-crimson" />
        <button type="submit" class="px-4 py-2.5 rounded bg-crimson hover:bg-[#d8443e] text-bone font-tactical font-bold text-xs uppercase">Kirim</button>
      </form>
    </div>

    <button
      onclick="toggleKiraAI()"
      class="relative ml-auto flex items-center gap-3 bg-carbon hover:bg-[#323741] text-bone pl-3 pr-5 py-2.5 chamfer-sm shadow-2xl border-2 border-crimson transition-transform hover:scale-105 group"
    >
      <span class="absolute inset-0 bg-crimson/35 -z-10" style="animation: pulseRing 2.5s infinite;"></span>
      <div class="w-10 h-10 bg-obsidian border border-crimson flex items-center justify-center group-hover:rotate-12 transition-transform">
        <svg class="w-6 h-6" viewBox="0 0 40 40" fill="none">
          <polygon points="12,3 28,3 37,12 37,28 28,37 12,37 3,28 3,12" stroke="#C43B35" stroke-width="2.4" fill="#111318"/>
          <rect x="8" y="17" width="24" height="6" fill="#D6D0C5"/>
          <rect x="24" y="17" width="8" height="6" fill="#C43B35"/>
        </svg>
      </div>
      <div class="text-left">
        <span class="block font-mono text-[9px] font-bold uppercase tracking-widest text-crimson leading-none">Tactical Advisor</span>
        <span class="font-tactical font-bold text-xs sm:text-sm text-bone uppercase">Prof. Kira AI</span>
      </div>
    </button>
  </div>

  <!-- ==================== JAVASCRIPT LOGIC ==================== -->
  <script src="{{ asset('js/website-bisnis/templates/martial-arts-self-defense/brazilian-jiu-jitsu/garda-grapple/garda-grapple.js') }}?v=2" defer></script>
</body>
</html>