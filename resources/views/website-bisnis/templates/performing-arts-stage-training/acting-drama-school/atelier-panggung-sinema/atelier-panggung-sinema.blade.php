<!DOCTYPE html>
{{-- WEBIA template: Atelier Panggung & Sinema. Frontend-only preview; connect production data through the backend when ready. --}}
<html lang="id" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ATELIER PANGGUNG & SINEMA | Acting & Drama School</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600;700;800&family=Cormorant+Garamond:ital,wght@0,500;0,600;0,700;1,600&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet" />
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            velvet: '#22201D',
            umber: '#574633',
            spotgold: '#B68A3A',
            champagne: '#E5C77A',
            parchment: '#F8F1E4',
          },
          fontFamily: {
            cinema: ['Cinzel', 'serif'],
            editorial: ['Cormorant Garamond', 'serif'],
            sans: ['Plus Jakarta Sans', 'sans-serif'],
          },
        },
      },
    };
  </script>
  
<link rel="stylesheet" href="{{ asset('css/website-bisnis/templates/performing-arts-stage-training/acting-drama-school/atelier-panggung-sinema/atelier-panggung-sinema.css') }}?v=1.0.1">
</head>
<body class="antialiased selection:bg-spotgold selection:text-velvet" data-whatsapp-number="6281234567890">

  <!-- Formal Spotlight Reticle Cursor -->
  <div id="formal-cursor-ring" aria-hidden="true"></div>
  <div id="formal-cursor-dot" aria-hidden="true"></div>

  <!-- ==================== PERSISTENT TOPBAR NAVIGATION ==================== -->
  <header class="sticky top-0 z-40 bg-velvet/95 backdrop-blur-md border-b border-spotgold/35 shadow-2xl">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between h-20">
        <!-- Brand Emblem: Stage Spotlight & Cinema Aperture Crest -->
        <a href="#hero-stage" onclick="switchStageView('all')" class="flex items-center gap-3.5 group">
          <div class="w-11 h-11 rounded-lg bg-umber/50 border border-spotgold flex items-center justify-center group-hover:border-champagne transition-colors">
            <svg class="w-7 h-7" viewBox="0 0 40 40" fill="none">
              <circle cx="20" cy="20" r="16" stroke="#E5C77A" stroke-width="1.6"/>
              <circle cx="20" cy="20" r="9" stroke="#B68A3A" stroke-width="1.5" stroke-dasharray="4 3"/>
              <path d="M14 25L20 12L26 25M16 21H24" stroke="#F8F1E4" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </div>
          <div>
            <span class="font-cinema font-bold text-lg sm:text-xl tracking-wider text-parchment block leading-none">
              ATELIER <span class="text-champagne">PANGGUNG</span> &amp; SINEMA
            </span>
            <span class="font-editorial italic text-xs tracking-wider text-spotgold mt-1 block">
              Acting &amp; Drama Conservatory
            </span>
          </div>
        </a>

        <!-- Multipage View Switcher (Desktop) -->
        <nav class="hidden xl:flex items-center gap-1 bg-umber/35 p-1.5 rounded-lg border border-spotgold/30">
          <button onclick="switchStageView('all')" data-stage-nav="all" class="stage-nav-btn px-3.5 py-2 rounded text-xs font-cinema font-bold uppercase tracking-wider bg-spotgold text-velvet shadow transition-all">
            <span data-i18n="nav_all">All Stage</span>
          </button>
          <button onclick="switchStageView('craft')" data-stage-nav="craft" class="stage-nav-btn px-3.5 py-2 rounded text-xs font-cinema font-semibold uppercase tracking-wider text-parchment/80 hover:text-champagne transition-all">
            <span data-i18n="nav_craft">Programs &amp; Craft</span>
          </button>
          <button onclick="switchStageView('spaces')" data-stage-nav="spaces" class="stage-nav-btn px-3.5 py-2 rounded text-xs font-cinema font-semibold uppercase tracking-wider text-parchment/80 hover:text-champagne transition-all">
            <span data-i18n="nav_spaces">Schedule &amp; Spaces</span>
          </button>
          <button onclick="switchStageView('showcase')" data-stage-nav="showcase" class="stage-nav-btn px-3.5 py-2 rounded text-xs font-cinema font-semibold uppercase tracking-wider text-parchment/80 hover:text-champagne transition-all">
            <span data-i18n="nav_show">Showcase &amp; Casting</span>
          </button>
          <button onclick="switchStageView('enroll')" data-stage-nav="enroll" class="stage-nav-btn px-3.5 py-2 rounded text-xs font-cinema font-semibold uppercase tracking-wider text-parchment/80 hover:text-champagne transition-all">
            <span data-i18n="nav_enroll">Enrollment</span>
          </button>
        </nav>

        <!-- Right Controls: ID/EN + Join Class CTA -->
        <div class="hidden sm:flex items-center gap-3">
          <div class="flex items-center bg-umber/45 rounded p-1 border border-spotgold/40 text-xs font-bold">
            <button onclick="setCinemaLang('id')" id="lang-id-btn" class="px-2.5 py-1 rounded bg-spotgold text-velvet transition-all">ID</button>
            <button onclick="setCinemaLang('en')" id="lang-en-btn" class="px-2.5 py-1 rounded text-parchment/75 hover:text-champagne transition-all">EN</button>
          </div>
          <a href="#registration-section" onclick="switchStageView('all')" class="px-5 py-2.5 rounded-lg bg-gradient-to-r from-spotgold to-champagne hover:brightness-110 text-velvet font-cinema font-bold text-xs uppercase tracking-wider shadow-lg shadow-spotgold/25 transition-all">
            ✦ <span data-i18n="cta_join_top">Join Class</span>
          </a>
        </div>

        <!-- Mobile Menu Button -->
        <button onclick="toggleStageMobileMenu()" class="xl:hidden p-2.5 rounded-lg bg-umber/40 border border-spotgold/40 text-champagne">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
          </svg>
        </button>
      </div>
    </div>

    <!-- Mobile Drawer -->
    <div id="stage-mobile-menu" class="hidden xl:hidden bg-velvet border-b border-spotgold/40 px-4 pt-3 pb-5 space-y-2">
      <div class="flex items-center justify-between pb-2 border-b border-spotgold/25">
        <span class="font-cinema text-xs text-champagne font-bold uppercase">Stage Navigation</span>
        <div class="flex gap-1 bg-umber/40 p-1 rounded text-xs">
          <button onclick="setCinemaLang('id')" class="px-2 py-0.5 rounded bg-spotgold text-velvet font-bold">ID</button>
          <button onclick="setCinemaLang('en')" class="px-2 py-0.5 rounded text-parchment font-bold">EN</button>
        </div>
      </div>
      <button onclick="switchStageView('all'); toggleStageMobileMenu()" class="block w-full text-left px-4 py-2.5 rounded font-cinema text-xs font-bold uppercase bg-umber/50 text-champagne">All Stage (Beranda Lengkap)</button>
      <button onclick="switchStageView('craft'); toggleStageMobileMenu()" class="block w-full text-left px-4 py-2.5 rounded font-cinema text-xs uppercase text-parchment hover:bg-umber/30">Programs, Craft, Voice &amp; Audition</button>
      <button onclick="switchStageView('spaces'); toggleStageMobileMenu()" class="block w-full text-left px-4 py-2.5 rounded font-cinema text-xs uppercase text-parchment hover:bg-umber/30">Instructors, Schedule &amp; Studios</button>
      <button onclick="switchStageView('showcase'); toggleStageMobileMenu()" class="block w-full text-left px-4 py-2.5 rounded font-cinema text-xs uppercase text-parchment hover:bg-umber/30">Showcase, Portfolio &amp; Casting</button>
      <button onclick="switchStageView('enroll'); toggleStageMobileMenu()" class="block w-full text-left px-4 py-2.5 rounded font-cinema text-xs uppercase text-parchment hover:bg-umber/30">Packages &amp; 7-Step Registration</button>
      <a href="#registration-section" onclick="switchStageView('all'); toggleStageMobileMenu()" class="block text-center py-3 rounded-lg bg-spotgold text-velvet font-cinema font-bold text-xs uppercase">Join Class</a>
    </div>
  </header>

  <!-- ==================== HERO BANNER: DRAMATIC SPOTLIGHT & SCENE MONITOR ==================== -->
  <section id="hero-stage" data-stage-section="hero" class="relative overflow-hidden bg-velvet pt-10 pb-24 sm:pt-14 sm:pb-28 border-b border-spotgold/30">
    <!-- Sweeping Golden Stage Spotlight Beams -->
    <div class="spotlight-cone-left absolute -top-10 left-[12%] w-80 h-[560px] pointer-events-none z-0"></div>
    <div class="spotlight-cone-right absolute -top-10 right-[10%] w-96 h-[580px] pointer-events-none z-0"></div>

    <!-- Opening Velvet Stage Curtains on Load -->
    <div class="velvet-curtain-left fixed inset-y-0 left-0 w-1/2 pointer-events-none z-30 opacity-95 border-r-2 border-spotgold/60" aria-hidden="true"></div>
    <div class="velvet-curtain-right fixed inset-y-0 right-0 w-1/2 pointer-events-none z-30 opacity-95 border-l-2 border-spotgold/60" aria-hidden="true"></div>

    <!-- Floating Cinema & Stage Props (Clapperboard & Condenser Mic) -->
    <div class="hidden lg:block absolute top-12 left-[47%] pointer-events-none anim-prop-a z-20">
      <div class="bg-velvet/90 backdrop-blur-md border border-spotgold/70 px-4 py-2.5 rounded-lg shadow-2xl flex items-center gap-3">
        <!-- Custom SVG Film Clapperboard -->
        <svg class="w-10 h-10 text-champagne" viewBox="0 0 44 44" fill="none">
          <rect x="6" y="16" width="32" height="22" rx="2" stroke="currentColor" stroke-width="2" fill="#574633" fill-opacity="0.45"/>
          <path d="M6 16L36 8L38 14L8 22L6 16Z" stroke="#E5C77A" stroke-width="1.8" fill="#22201D"/>
          <path d="M13 13L16 19M21 11L24 17M29 9L32 15" stroke="#E5C77A" stroke-width="2"/>
          <path d="M12 24H30M12 29H24" stroke="#F8F1E4" stroke-width="1.6" stroke-linecap="round"/>
        </svg>
        <div class="text-xs">
          <span class="font-cinema font-bold text-champagne block">SCENE 14 // TAKE 03</span>
          <span class="font-editorial italic text-parchment/85">Camera Rolling • Action</span>
        </div>
      </div>
    </div>

    <div class="hidden xl:block absolute bottom-10 left-8 pointer-events-none anim-prop-b z-20">
      <div class="bg-velvet/90 backdrop-blur-md border border-spotgold/70 px-4 py-2.5 rounded-lg shadow-2xl flex items-center gap-3">
        <!-- Custom SVG Vintage Studio Condenser Mic -->
        <svg class="w-9 h-9 text-champagne" viewBox="0 0 40 40" fill="none">
          <rect x="14" y="6" width="12" height="18" rx="6" stroke="currentColor" stroke-width="2" fill="#574633" fill-opacity="0.5"/>
          <path d="M10 18C10 23.5 14.5 28 20 28C25.5 28 30 23.5 30 18" stroke="#E5C77A" stroke-width="1.8" stroke-linecap="round"/>
          <path d="M20 28V35M14 35H26" stroke="#F8F1E4" stroke-width="2" stroke-linecap="round"/>
        </svg>
        <div class="text-xs">
          <span class="font-cinema font-bold text-parchment block">VOICE &amp; DICTION LAB</span>
          <span class="font-editorial italic text-champagne">Stage Projection Ready</span>
        </div>
      </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
        <!-- Left 6 Cols: Dramatic Editorial Headline & CTAs -->
        <div class="lg:col-span-6 space-y-6">
          <div class="inline-flex items-center gap-2.5 px-4 py-1.5 rounded-full bg-umber/50 border border-spotgold/60">
            <span class="w-2 h-2 rounded-full bg-champagne animate-ping"></span>
            <span class="font-cinema text-[11px] font-bold uppercase tracking-[0.2em] text-champagne" data-i18n="hero_badge">
              ACTING &amp; DRAMA CONSERVATORY • STAGE &amp; SCREEN
            </span>
          </div>

          <h1 class="font-cinema text-4xl sm:text-5xl lg:text-[3.55rem] font-bold uppercase leading-[1.06] tracking-wide text-parchment">
            <span data-i18n="hero_title_1">Where Truth Meets</span>
            <span class="block font-editorial italic font-bold text-5xl sm:text-6xl text-champagne lowercase mt-1">the spotlight.</span>
          </h1>

          <p class="font-editorial text-xl sm:text-2xl text-parchment/90 leading-snug max-w-xl" data-i18n="hero_subtitle">
            Sekolah seni peran &amp; teater dramatis untuk <strong>Kids, Teens, dan Adults</strong> — mengasah <em>Film Acting, Theatre, TV, Voice Acting, &amp; Musical Theatre</em> dari level Beginner hingga Advanced.
          </p>

          <p class="text-xs sm:text-sm text-parchment/75 leading-relaxed max-w-xl" data-i18n="hero_desc">
            Berlatih di bawah bimbingan aktor panggung, sutradara film, dan pelatih vokal profesional dengan pendekatan <em>Method Acting</em>, improvisasi, analisis naskah, serta persiapan audisi &amp; <em>self-tape</em>.
          </p>

          <!-- Primary & Secondary CTAs -->
          <div class="flex flex-wrap items-center gap-4 pt-1">
            <a href="#registration-section" onclick="switchStageView('all')" class="px-8 py-4 rounded-lg bg-gradient-to-r from-spotgold to-champagne hover:brightness-110 text-velvet font-cinema font-bold text-xs sm:text-sm uppercase tracking-wider shadow-xl shadow-spotgold/25 hover:scale-[1.02] transition-all flex items-center gap-2">
              <span data-i18n="cta_join_class">Join Class</span>
              <span>→</span>
            </a>
            <a href="#programs-craft-section" onclick="switchStageView('all')" class="px-8 py-4 rounded-lg bg-umber/45 hover:bg-umber/70 text-parchment border border-spotgold/60 font-cinema font-bold text-xs sm:text-sm uppercase tracking-wider transition-all">
              <span data-i18n="cta_explore_stage">Explore Stage &amp; Programs</span>
            </a>
          </div>

          <!-- Stage Metrics -->
          <div class="grid grid-cols-3 gap-4 pt-5 border-t border-spotgold/25">
            <div>
              <p class="font-cinema text-2xl sm:text-3xl font-bold text-champagne">4 Studios</p>
              <p class="font-editorial italic text-sm text-parchment/75">Stage, Film, Voice &amp; Rehearsal</p>
            </div>
            <div>
              <p class="font-cinema text-2xl sm:text-3xl font-bold text-parchment">3 Ages</p>
              <p class="font-editorial italic text-sm text-parchment/75">Kids • Teens • Adults</p>
            </div>
            <div>
              <p class="font-cinema text-2xl sm:text-3xl font-bold text-champagne">24+</p>
              <p class="font-editorial italic text-sm text-parchment/75">Annual Plays &amp; Short Films</p>
            </div>
          </div>
        </div>

        <!-- Right 6 Cols: Dramatic Stage/Actor Photography + Interactive Scene Cue Switcher -->
        <div class="lg:col-span-6 space-y-4">
          <div class="relative proscenium-arch rounded-2xl overflow-hidden bg-umber/30 aspect-[16/11] group">
            <img
              id="hero-scene-img"
              src="https://images.unsplash.com/photo-1507924538820-ede94a04019d?auto=format&fit=crop&w=1000&q=85"
              onerror="this.src='https://placehold.co/900x600/574633/F8F1E4?text=Dramatic+Stage+Performance'"
              alt="Aktor di bawah sorotan lampu panggung drama"
              class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
            />
            <div class="film-grain-overlay absolute inset-0 pointer-events-none"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-velvet via-velvet/20 to-transparent"></div>

            <!-- Top Director Slate Badge -->
            <div class="absolute top-4 left-4 right-4 flex items-center justify-between text-xs">
              <span class="px-3 py-1 rounded bg-velvet/85 border border-spotgold/70 font-cinema font-bold text-champagne uppercase tracking-wider">
                <span id="hero-scene-tag">ACT I • PROSCENIUM THEATRE</span>
              </span>
              <span class="px-3 py-1 rounded bg-spotgold/90 text-velvet font-cinema font-bold text-[11px] uppercase">
                LIVE REHEARSAL
              </span>
            </div>

            <!-- Bottom Scene Caption & Cue Switcher -->
            <div class="absolute bottom-4 left-4 right-4 bg-velvet/90 backdrop-blur-md border border-spotgold/50 rounded-xl p-4">
              <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                <div>
                  <p id="hero-scene-caption" class="font-editorial italic text-lg sm:text-xl text-parchment">
                    "Keheningan sebelum dialog pertama adalah ruang tempat karakter lahir."
                  </p>
                </div>
                <div class="flex gap-1.5 shrink-0">
                  <button onclick="setHeroScene(0)" class="hero-cue-btn px-3 py-1.5 rounded bg-spotgold text-velvet font-cinema font-bold text-[10px] uppercase">Cue 01</button>
                  <button onclick="setHeroScene(1)" class="hero-cue-btn px-3 py-1.5 rounded bg-umber/60 text-parchment border border-spotgold/40 font-cinema font-bold text-[10px] uppercase">Cue 02</button>
                  <button onclick="setHeroScene(2)" class="hero-cue-btn px-3 py-1.5 rounded bg-umber/60 text-parchment border border-spotgold/40 font-cinema font-bold text-[10px] uppercase">Cue 03</button>
                </div>
              </div>
            </div>
          </div>

          <!-- Secondary Twin Stills: Cinema Camera Set & Musical Stage -->
          <div class="grid grid-cols-2 gap-4">
            <div class="relative rounded-xl overflow-hidden border border-spotgold/45 bg-umber/30 aspect-[16/9] group">
              <img
                src="https://images.unsplash.com/photo-1485846234645-a62644f84728?auto=format&fit=crop&w=750&q=85"
                onerror="this.src='https://placehold.co/640x360/574633/E5C77A?text=Cinema+Camera+Set'"
                alt="Kamera sinema dan pencahayaan set film"
                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
              />
              <div class="absolute inset-0 bg-gradient-to-t from-velvet/90 via-transparent to-transparent"></div>
              <span class="absolute bottom-2.5 left-3 font-cinema text-[11px] font-bold text-champagne uppercase">Film &amp; TV Camera Craft</span>
            </div>

            <div class="relative rounded-xl overflow-hidden border border-spotgold/45 bg-umber/30 aspect-[16/9] group">
              <img
                src="https://images.unsplash.com/photo-1503095396574-80af35ba3162?auto=format&fit=crop&w=750&q=85"
                onerror="this.src='https://placehold.co/640x360/22201D/F8F1E4?text=Theater+Curtains+Spotlight'"
                alt="Tirai panggung teater dan lampu sorot emas"
                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
              />
              <div class="absolute inset-0 bg-gradient-to-t from-velvet/90 via-transparent to-transparent"></div>
              <span class="absolute bottom-2.5 left-3 font-cinema text-[11px] font-bold text-parchment uppercase">Theatre &amp; Musical Stage</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ==================== ANIMATED FILM SPROCKET MARQUEE DIVIDER ==================== -->
  <div class="bg-umber/55 border-y border-spotgold/40 py-2.5 overflow-hidden relative">
    <div class="film-perforations h-3 w-full opacity-50 mb-1.5"></div>
    <div class="filmstrip-marquee flex items-center gap-10 font-cinema font-bold text-xs uppercase tracking-[0.22em] text-champagne">
      <span>✦ FILM ACTING</span>
      <span>✦ THEATRE ACTING</span>
      <span>✦ TV &amp; MULTI-CAM</span>
      <span>✦ VOICE ACTING &amp; DUBBING</span>
      <span>✦ MUSICAL THEATRE</span>
      <span>✦ METHOD &amp; MEISNER</span>
      <span>✦ AUDITION &amp; SELF-TAPE</span>
      <span>✦ FILM ACTING</span>
      <span>✦ THEATRE ACTING</span>
      <span>✦ TV &amp; MULTI-CAM</span>
      <span>✦ VOICE ACTING &amp; DUBBING</span>
      <span>✦ MUSICAL THEATRE</span>
      <span>✦ METHOD &amp; MEISNER</span>
      <span>✦ AUDITION &amp; SELF-TAPE</span>
    </div>
    <div class="film-perforations h-3 w-full opacity-50 mt-1.5"></div>
  </div>

  <!-- ==================== ABOUT ACADEMY & METHODOLOGY ==================== -->
  <section id="about-academy-section" data-stage-section="craft" class="py-20 bg-velvet relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center reveal-stage">
        <div class="lg:col-span-5">
          <div class="relative proscenium-arch rounded-2xl overflow-hidden bg-umber/35 aspect-[4/5]">
            <img
              src="https://images.unsplash.com/photo-1518834107812-67b0b7c58434?auto=format&fit=crop&w=800&q=85"
              onerror="this.src='https://placehold.co/640x800/574633/E5C77A?text=Stage+Expression'"
              alt="Ekspresi emosional aktor dalam latihan drama"
              class="w-full h-full object-cover"
            />
            <div class="absolute inset-0 bg-gradient-to-t from-velvet via-transparent to-transparent"></div>
            <div class="absolute bottom-5 left-5 right-5 p-4 rounded-xl bg-velvet/90 border border-spotgold/60">
              <p class="font-cinema text-[10px] text-champagne uppercase tracking-widest">CONSERVATORY PHILOSOPHY</p>
              <p class="font-editorial italic text-xl text-parchment mt-1">"Living truthfully under imaginary circumstances."</p>
            </div>
          </div>
        </div>

        <div class="lg:col-span-7 space-y-6">
          <span class="font-cinema text-xs font-bold uppercase tracking-[0.22em] text-spotgold">
            // I. PROFIL AKADEMI, VISI &amp; METODE
          </span>
          <h2 class="font-cinema text-3xl sm:text-4xl font-bold uppercase text-parchment leading-tight">
            Melahirkan Aktor Berkarakter &amp; <span class="text-champagne">Penutur Cerita</span>
          </h2>
          <p class="font-editorial text-xl text-parchment/90 leading-relaxed">
            <strong>Atelier Panggung &amp; Sinema</strong> adalah ruang kawah candradimuka seni peran yang memadukan kedalaman tradisi teater panggung dengan presisi akting layar lebar, televisi, dan seni suara modern.
          </p>
          <p class="text-sm text-parchment/75 leading-relaxed">
            <strong>Visi &amp; Misi:</strong> Menjadikan seni peran sebagai sarana pembebasan ekspresi, empati, dan kepercayaan diri—baik bagi anak-anak yang baru mengenal panggung, remaja yang menumbuhkan identitas, hingga aktor dewasa yang bersiap menembus industri film, drama, dan komersial.
          </p>

          <!-- 3 Method Pillars -->
          <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 pt-2">
            <div class="cinema-card bg-umber/30 border border-spotgold/35 rounded-xl p-5">
              <span class="font-cinema text-xs font-bold text-champagne">01 • STANISLAVSKI &amp; ACTION</span>
              <h3 class="font-cinema font-bold text-base text-parchment uppercase mt-1">Objective &amp; Stakes</h3>
              <p class="text-xs text-parchment/75 mt-2 leading-relaxed">Membangun tujuan karakter yang jelas, rintangan, dan tindakan nyata di setiap baris dialog.</p>
            </div>
            <div class="cinema-card bg-umber/30 border border-spotgold/35 rounded-xl p-5">
              <span class="font-cinema text-xs font-bold text-champagne">02 • MEISNER &amp; PRESENCE</span>
              <h3 class="font-cinema font-bold text-base text-parchment uppercase mt-1">Listening &amp; Impulse</h3>
              <p class="text-xs text-parchment/75 mt-2 leading-relaxed">Melatih kepekaan merespons lawan main secara spontan dan jujur tanpa berakting berlebihan.</p>
            </div>
            <div class="cinema-card bg-umber/30 border border-spotgold/35 rounded-xl p-5">
              <span class="font-cinema text-xs font-bold text-champagne">03 • LABAN &amp; PHYSICALITY</span>
              <h3 class="font-cinema font-bold text-base text-parchment uppercase mt-1">Body &amp; Space</h3>
              <p class="text-xs text-parchment/75 mt-2 leading-relaxed">Mengolah postur, ritme tubuh, dan ruang panggung maupun bingkai kamera secara sadar.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ==================== ACTING PROGRAMS + AGE CATEGORIES & SKILL LEVELS ==================== -->
  <section id="programs-craft-section" data-stage-section="craft" class="py-20 bg-umber/20 border-y border-spotgold/30">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-6 mb-10 reveal-stage">
        <div>
          <span class="font-cinema text-xs font-bold uppercase tracking-[0.22em] text-spotgold">
            // II. ACTING PROGRAMS, AGE &amp; SKILL LEVELS
          </span>
          <h2 class="font-cinema text-3xl sm:text-4xl font-bold uppercase text-parchment mt-1">
            Program Kelas &amp; <span class="text-champagne">Jenjang Kemampuan</span>
          </h2>
        </div>

        <!-- Age & Skill Level Interactive Selector -->
        <div class="bg-velvet/90 border border-spotgold/45 rounded-xl p-3.5 flex flex-wrap items-center gap-3 text-xs">
          <div>
            <span class="font-cinema text-[10px] text-champagne uppercase block mb-1">Kategori Usia</span>
            <div class="flex gap-1">
              <button onclick="setAgeFilter('All')" data-age="All" class="age-pill px-3 py-1 rounded bg-spotgold text-velvet font-bold">Semua</button>
              <button onclick="setAgeFilter('Kids')" data-age="Kids" class="age-pill px-3 py-1 rounded bg-umber/50 text-parchment hover:border-champagne border border-transparent">Kids</button>
              <button onclick="setAgeFilter('Teens')" data-age="Teens" class="age-pill px-3 py-1 rounded bg-umber/50 text-parchment hover:border-champagne border border-transparent">Teens</button>
              <button onclick="setAgeFilter('Adults')" data-age="Adults" class="age-pill px-3 py-1 rounded bg-umber/50 text-parchment hover:border-champagne border border-transparent">Adults</button>
            </div>
          </div>
          <div class="h-8 w-px bg-spotgold/25 hidden sm:block"></div>
          <div>
            <span class="font-cinema text-[10px] text-champagne uppercase block mb-1">Skill Level</span>
            <select id="skill-level-select" onchange="renderActingPrograms()" class="px-3 py-1.5 rounded bg-umber/50 border border-spotgold/40 text-parchment font-semibold">
              <option value="All">All Levels (Beginner – Advanced)</option>
              <option value="Beginner">Beginner</option>
              <option value="Intermediate">Intermediate</option>
              <option value="Advanced">Advanced</option>
            </select>
          </div>
        </div>
      </div>

      <!-- 5 Core Acting Programs Grid -->
      <div id="acting-programs-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 reveal-stage">
        <!-- Populated dynamically via JS -->
      </div>
    </div>
  </section>

  <!-- ==================== ACTING TECHNIQUES, PERFORMANCE, VOICE & AUDITION PREP ==================== -->
  <section id="craft-lab-section" data-stage-section="craft" class="py-20 bg-velvet">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center max-w-3xl mx-auto mb-12 reveal-stage">
        <span class="font-cinema text-xs font-bold uppercase tracking-[0.22em] text-spotgold">
          // III. CORE DISCIPLINES &amp; STAGE/SCREEN LAB
        </span>
        <h2 class="font-cinema text-3xl sm:text-4xl font-bold uppercase text-parchment mt-1">
          Teknik Akting, Vokal &amp; <span class="text-champagne">Persiapan Audisi</span>
        </h2>
        <p class="font-editorial text-xl text-parchment/80 mt-2">
          Empat pilar pelatihan inti yang dibekali animasi gelombang suara, <em>teleprompter</em> naskah berjalan, dan <em>Cue Explorer</em> interaktif.
        </p>
      </div>

      <!-- 4 Discipline Cards with Realistic Kinetic Animations -->
      <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mb-12 reveal-stage">
        <!-- 1. Acting Techniques -->
        <div class="cinema-card bg-umber/25 border border-spotgold/40 rounded-xl p-6 flex flex-col justify-between">
          <div>
            <div class="flex items-center justify-between mb-3">
              <span class="font-cinema text-xs font-bold text-champagne uppercase">01 • ACTING TECHNIQUES</span>
              <span class="px-2 py-0.5 rounded bg-velvet text-[10px] font-cinema text-spotgold border border-spotgold/30">CRAFT</span>
            </div>
            <h3 class="font-cinema text-lg font-bold text-parchment uppercase mb-3">Depth &amp; Spontaneity</h3>
            <ul class="space-y-2 text-xs text-parchment/85">
              <li>✦ <strong>Method Acting:</strong> Penggalian memori afektif &amp; substansi karakter.</li>
              <li>✦ <strong>Improvisation:</strong> Respon spontan tanpa naskah &amp; bangun situasi.</li>
              <li>✦ <strong>Character Development:</strong> Biografi, *backstory*, &amp; ark emosi tokoh.</li>
              <li>✦ <strong>Scene Study:</strong> Bedah konflik, subteks, dan dinamika adegan.</li>
            </ul>
          </div>
          <!-- Animated Script Teleprompter Ticker -->
          <div class="mt-5 h-16 overflow-hidden rounded-lg bg-velvet border border-spotgold/35 p-2.5 relative">
            <div class="teleprompter-track font-editorial italic text-xs text-champagne/90 space-y-1.5">
              <p>"[PAUSE] Kau kira aku tidak tahu ke mana perginya surat malam itu?"</p>
              <p>"[SUBTEXT] Tatap matanya—jangan beri ruang untuk mengelak."</p>
              <p>"[BEAT] Tarik napas dalam sebelum mengucapkannya pelan."</p>
              <p>"[PAUSE] Kau kira aku tidak tahu ke mana perginya surat malam itu?"</p>
              <p>"[SUBTEXT] Tatap matanya—jangan beri ruang untuk mengelak."</p>
            </div>
          </div>
        </div>

        <!-- 2. Performance Training -->
        <div class="cinema-card bg-umber/25 border border-spotgold/40 rounded-xl p-6 flex flex-col justify-between">
          <div>
            <div class="flex items-center justify-between mb-3">
              <span class="font-cinema text-xs font-bold text-champagne uppercase">02 • PERFORMANCE</span>
              <span class="px-2 py-0.5 rounded bg-velvet text-[10px] font-cinema text-spotgold border border-spotgold/30">STAGE &amp; SCRIPT</span>
            </div>
            <h3 class="font-cinema text-lg font-bold text-parchment uppercase mb-3">Commanding The Frame</h3>
            <ul class="space-y-2 text-xs text-parchment/85">
              <li>✦ <strong>Stage Presence:</strong> Karisma, fokus, dan penguasaan ruang panggung.</li>
              <li>✦ <strong>Monologue:</strong> Penuturan tunggal dramatis &amp; komedi berdurasi 1–3 menit.</li>
              <li>✦ <strong>Dialogue:</strong> Ritme *pick-up cue*, *overlap*, dan tensi percakapan.</li>
              <li>✦ <strong>Script Reading:</strong> *Cold reading*, analisis struktur babak, dan *beat*.</li>
            </ul>
          </div>
          <div class="mt-5 p-3 rounded-lg bg-velvet border border-spotgold/35 flex items-center justify-between text-xs">
            <span class="font-cinema text-[11px] text-champagne uppercase">STAGE FOCUS</span>
            <span class="font-editorial italic text-parchment">Proscenium &amp; Close-Up</span>
          </div>
        </div>

        <!-- 3. Voice Training -->
        <div class="cinema-card bg-umber/25 border border-spotgold/40 rounded-xl p-6 flex flex-col justify-between">
          <div>
            <div class="flex items-center justify-between mb-3">
              <span class="font-cinema text-xs font-bold text-champagne uppercase">03 • VOICE TRAINING</span>
              <span class="px-2 py-0.5 rounded bg-velvet text-[10px] font-cinema text-spotgold border border-spotgold/30">RESONANCE</span>
            </div>
            <h3 class="font-cinema text-lg font-bold text-parchment uppercase mb-3">Clarity &amp; Projection</h3>
            <ul class="space-y-2 text-xs text-parchment/85">
              <li>✦ <strong>Diction:</strong> Artikulasi konsonan &amp; vokal yang tajam dan jernih.</li>
              <li>✦ <strong>Speech:</strong> Tempo, intonasi, dan kejelasan pelafalan dialog.</li>
              <li>✦ <strong>Voice Projection:</strong> Dukungan diafragma untuk mengisi gedung teater.</li>
              <li>✦ <strong>Accent Training:</strong> Adaptasi aksen bahasa &amp; karakter regional/asing.</li>
            </ul>
          </div>
          <!-- Animated Voice Projection Equalizer Bars -->
          <div class="mt-5 h-16 rounded-lg bg-velvet border border-spotgold/35 px-4 flex items-end justify-between gap-1.5 py-2.5">
            <span class="voice-bar w-2 h-full rounded-t bg-spotgold" style="animation-delay: 0.0s"></span>
            <span class="voice-bar w-2 h-full rounded-t bg-champagne" style="animation-delay: 0.15s"></span>
            <span class="voice-bar w-2 h-full rounded-t bg-spotgold" style="animation-delay: 0.3s"></span>
            <span class="voice-bar w-2 h-full rounded-t bg-champagne" style="animation-delay: 0.45s"></span>
            <span class="voice-bar w-2 h-full rounded-t bg-spotgold" style="animation-delay: 0.6s"></span>
            <span class="voice-bar w-2 h-full rounded-t bg-champagne" style="animation-delay: 0.75s"></span>
            <span class="voice-bar w-2 h-full rounded-t bg-spotgold" style="animation-delay: 0.25s"></span>
            <span class="voice-bar w-2 h-full rounded-t bg-champagne" style="animation-delay: 0.5s"></span>
            <span class="voice-bar w-2 h-full rounded-t bg-spotgold" style="animation-delay: 0.1s"></span>
            <span class="voice-bar w-2 h-full rounded-t bg-champagne" style="animation-delay: 0.4s"></span>
          </div>
        </div>

        <!-- 4. Audition Preparation -->
        <div class="cinema-card bg-umber/25 border border-spotgold/40 rounded-xl p-6 flex flex-col justify-between">
          <div>
            <div class="flex items-center justify-between mb-3">
              <span class="font-cinema text-xs font-bold text-champagne uppercase">04 • AUDITION PREP</span>
              <span class="px-2 py-0.5 rounded bg-velvet text-[10px] font-cinema text-spotgold border border-spotgold/30">CASTING READY</span>
            </div>
            <h3 class="font-cinema text-lg font-bold text-parchment uppercase mb-3">Booking The Role</h3>
            <ul class="space-y-2 text-xs text-parchment/85">
              <li>✦ <strong>Audition Coaching:</strong> Membaca arahan sutradara &amp; penyesuaian cepat.</li>
              <li>✦ <strong>Self-Tape:</strong> Framing kamera, pencahayaan *key-light*, &amp; *eye-line*.</li>
              <li>✦ <strong>Casting Preparation:</strong> Pemilihan materi monolog yang menonjolkan tipe peran.</li>
            </ul>
          </div>
          <div class="mt-5 p-3 rounded-lg bg-velvet border border-spotgold/35 flex items-center justify-between text-xs">
            <span class="font-cinema text-[11px] text-champagne uppercase">SELF-TAPE LAB</span>
            <span class="font-editorial italic text-parchment">4K Framing &amp; Feedback</span>
          </div>
        </div>
      </div>

      <!-- Interactive Monologue & Audition Cue Explorer -->
      <div class="bg-umber/25 border border-spotgold/50 rounded-2xl p-6 sm:p-8 reveal-stage">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 pb-5 border-b border-spotgold/25">
          <div>
            <span class="font-cinema text-[11px] font-bold uppercase tracking-widest text-champagne">INTERACTIVE REHEARSAL PROMPT</span>
            <h3 class="font-cinema text-2xl font-bold text-parchment uppercase mt-0.5">Monologue &amp; Audition Cue Explorer</h3>
          </div>
          <div class="flex flex-wrap gap-2">
            <button onclick="selectCuePrompt(0)" class="cue-tab px-3.5 py-2 rounded-lg bg-spotgold text-velvet font-cinema font-bold text-xs uppercase">Dramatic Film</button>
            <button onclick="selectCuePrompt(1)" class="cue-tab px-3.5 py-2 rounded-lg bg-velvet text-parchment border border-spotgold/40 font-cinema font-bold text-xs uppercase">Theatre Monologue</button>
            <button onclick="selectCuePrompt(2)" class="cue-tab px-3.5 py-2 rounded-lg bg-velvet text-parchment border border-spotgold/40 font-cinema font-bold text-xs uppercase">Voice / Dubbing</button>
          </div>
        </div>
        <div id="cue-explorer-body" class="pt-6 grid grid-cols-1 lg:grid-cols-12 gap-6 items-center">
          <!-- Populated via JS -->
        </div>
      </div>
    </div>
  </section>

  <!-- ==================== INSTRUCTORS, CLASS SCHEDULE & STUDIO FACILITIES ==================== -->
  <section id="instructors-schedule-spaces-section" data-stage-section="spaces" class="py-20 bg-umber/20 border-t border-spotgold/30">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <!-- Instructor Profiles -->
      <div class="mb-10 reveal-stage">
        <span class="font-cinema text-xs font-bold uppercase tracking-[0.22em] text-spotgold">
          // IV. ACTORS, DIRECTORS &amp; COACHES
        </span>
        <h2 class="font-cinema text-3xl sm:text-4xl font-bold uppercase text-parchment mt-1">
          Profil <span class="text-champagne">Instruktur &amp; Sutradara</span>
        </h2>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-20 reveal-stage">
        <div class="cinema-card bg-velvet border border-spotgold/45 rounded-xl overflow-hidden">
          <div class="aspect-[4/3] bg-umber/40 relative">
            <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=700&q=85" onerror="this.src='https://placehold.co/600x450/574633/F8F1E4?text=Director+Hendra+K.'" alt="Hendra Kusuma" class="w-full h-full object-cover" />
          </div>
          <div class="p-5 space-y-1.5">
            <span class="font-cinema text-[10px] text-champagne font-bold uppercase">FILM DIRECTOR &amp; SCENE COACH</span>
            <h3 class="font-cinema text-lg font-bold text-parchment uppercase">Hendra Kusuma</h3>
            <p class="text-xs text-parchment/75 leading-relaxed">Sutradara 6 film layar lebar &amp; serial drama. Spesialis <em>Film Acting, Subtext &amp; Audition Coaching</em>.</p>
          </div>
        </div>

        <div class="cinema-card bg-velvet border border-spotgold/45 rounded-xl overflow-hidden">
          <div class="aspect-[4/3] bg-umber/40 relative">
            <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=700&q=85" onerror="this.src='https://placehold.co/600x450/574633/E5C77A?text=Clara+Suryani'" alt="Clara Suryani" class="w-full h-full object-cover" />
          </div>
          <div class="p-5 space-y-1.5">
            <span class="font-cinema text-[10px] text-champagne font-bold uppercase">STAGE LEAD &amp; METHOD COACH</span>
            <h3 class="font-cinema text-lg font-bold text-parchment uppercase">Clara Suryani</h3>
            <p class="text-xs text-parchment/75 leading-relaxed">Aktris teater utama dengan 14 tahun pentas drama &amp; monolog. Mengajar <em>Method Acting, Stage Presence &amp; Teens</em>.</p>
          </div>
        </div>

        <div class="cinema-card bg-velvet border border-spotgold/45 rounded-xl overflow-hidden">
          <div class="aspect-[4/3] bg-umber/40 relative">
            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=700&q=85" onerror="this.src='https://placehold.co/600x450/574633/F8F1E4?text=Raka+Pratama'" alt="Raka Pratama" class="w-full h-full object-cover" />
          </div>
          <div class="p-5 space-y-1.5">
            <span class="font-cinema text-[10px] text-champagne font-bold uppercase">VOICE &amp; MUSICAL THEATRE</span>
            <h3 class="font-cinema text-lg font-bold text-parchment uppercase">Raka Pratama</h3>
            <p class="text-xs text-parchment/75 leading-relaxed">Voice actor animasi &amp; pelatih vokal panggung musikal. Ahli <em>Diction, Projection &amp; Character Voice</em>.</p>
          </div>
        </div>

        <div class="cinema-card bg-velvet border border-spotgold/45 rounded-xl overflow-hidden">
          <div class="aspect-[4/3] bg-umber/40 relative">
            <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?auto=format&fit=crop&w=700&q=85" onerror="this.src='https://placehold.co/600x450/574633/E5C77A?text=Maya+Anindita'" alt="Maya Anindita" class="w-full h-full object-cover" />
          </div>
          <div class="p-5 space-y-1.5">
            <span class="font-cinema text-[10px] text-champagne font-bold uppercase">KIDS DRAMA &amp; IMPROVISATION</span>
            <h3 class="font-cinema text-lg font-bold text-parchment uppercase">Maya Anindita</h3>
            <p class="text-xs text-parchment/75 leading-relaxed">Pendidik seni peran anak &amp; improvisator teater. Fokus pada <em>Kids &amp; Teens Confidence, Play &amp; Ensemble</em>.</p>
          </div>
        </div>
      </div>

      <!-- Class Schedule Table with Duration, Instructor & Remaining Seat Quota -->
      <div class="mb-20 reveal-stage">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-6">
          <div>
            <span class="font-cinema text-xs font-bold uppercase tracking-[0.22em] text-spotgold">
              // V. WEEKLY REHEARSAL TIMETABLE
            </span>
            <h3 class="font-cinema text-2xl sm:text-3xl font-bold uppercase text-parchment mt-1">
              Jadwal Kelas &amp; <span class="text-champagne">Kuota Peserta</span>
            </h3>
          </div>
          <div class="flex flex-wrap gap-2 text-xs">
            <select id="sched-prog-filter" onchange="renderActingSchedule()" class="px-3.5 py-2.5 rounded-lg bg-velvet border border-spotgold/45 text-parchment font-semibold">
              <option value="All">Semua Program</option>
              <option value="Film Acting">Film Acting</option>
              <option value="Theatre Acting">Theatre Acting</option>
              <option value="TV Acting">TV Acting</option>
              <option value="Voice Acting">Voice Acting</option>
              <option value="Musical Theatre">Musical Theatre</option>
            </select>
            <select id="sched-age-filter" onchange="renderActingSchedule()" class="px-3.5 py-2.5 rounded-lg bg-velvet border border-spotgold/45 text-parchment font-semibold">
              <option value="All">Semua Usia</option>
              <option value="Kids">Kids (7–12)</option>
              <option value="Teens">Teens (13–17)</option>
              <option value="Adults">Adults (18+)</option>
            </select>
          </div>
        </div>

        <div class="bg-velvet border border-spotgold/45 rounded-2xl overflow-hidden shadow-2xl">
          <div class="overflow-x-auto">
            <table class="w-full text-left text-xs sm:text-sm">
              <thead class="bg-umber/55 text-champagne font-cinema uppercase text-xs border-b border-spotgold/35">
                <tr>
                  <th class="p-4">Hari &amp; Jam</th>
                  <th class="p-4">Program &amp; Level</th>
                  <th class="p-4">Durasi</th>
                  <th class="p-4">Instruktur</th>
                  <th class="p-4">Kuota</th>
                  <th class="p-4 text-right">Daftar</th>
                </tr>
              </thead>
              <tbody id="acting-schedule-tbody" class="divide-y divide-spotgold/15">
                <!-- Populated by JS -->
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- Studio & Facilities with Animated Stage Lights & Recording VU Meter -->
      <div class="reveal-stage">
        <div class="mb-8">
          <span class="font-cinema text-xs font-bold uppercase tracking-[0.22em] text-spotgold">
            // VI. STUDIOS, STAGE &amp; ACOUSTIC SPACES
          </span>
          <h3 class="font-cinema text-2xl sm:text-3xl font-bold uppercase text-parchment mt-1">
            Fasilitas Studio &amp; <span class="text-champagne">Panggung Pertunjukan</span>
          </h3>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
          <!-- Acting Studio -->
          <div class="cinema-card bg-velvet border border-spotgold/40 rounded-xl overflow-hidden">
            <img src="https://images.unsplash.com/photo-1517604931442-7e0c8ed2963c?auto=format&fit=crop&w=700&q=85" alt="Acting Studio" class="w-full h-44 object-cover" />
            <div class="p-5">
              <span class="font-cinema text-[10px] text-champagne uppercase font-bold">ACTING STUDIO</span>
              <h4 class="font-cinema text-base font-bold text-parchment uppercase mt-1">Camera &amp; Scene Studio</h4>
              <p class="text-xs text-parchment/75 mt-1.5">Dilengkapi kamera sinema, *monitor playback*, dan pencahayaan *key/rim light* untuk latihan akting layar.</p>
            </div>
          </div>

          <!-- Rehearsal Room -->
          <div class="cinema-card bg-velvet border border-spotgold/40 rounded-xl overflow-hidden">
            <img src="https://images.unsplash.com/photo-1507924538820-ede94a04019d?auto=format&fit=crop&w=700&q=85" alt="Rehearsal Room" class="w-full h-44 object-cover" />
            <div class="p-5">
              <span class="font-cinema text-[10px] text-champagne uppercase font-bold">REHEARSAL ROOM</span>
              <h4 class="font-cinema text-base font-bold text-parchment uppercase mt-1">Sprung-Floor Rehearsal Hall</h4>
              <p class="text-xs text-parchment/75 mt-1.5">Lantai kayu peredam gerak, cermin latihan penuh, dan ruang terbuka untuk improvisasi serta *blocking*.</p>
            </div>
          </div>

          <!-- Recording Studio with Animated VU Meter Needle -->
          <div class="cinema-card bg-velvet border border-spotgold/40 rounded-xl overflow-hidden">
            <img src="https://images.unsplash.com/photo-1598488035139-bdbb2231ce04?auto=format&fit=crop&w=700&q=85" onerror="this.src='https://placehold.co/600x360/574633/E5C77A?text=Voice+Recording+Booth'" alt="Recording Studio" class="w-full h-44 object-cover" />
            <div class="p-5">
              <div class="flex items-center justify-between">
                <span class="font-cinema text-[10px] text-champagne uppercase font-bold">RECORDING STUDIO</span>
                <!-- Mini Animated VU Meter -->
                <svg class="w-12 h-7 bg-umber/50 rounded border border-spotgold/40 p-0.5" viewBox="0 0 60 36">
                  <path d="M8 28 A22 22 0 0 1 52 28" stroke="#E5C77A" stroke-width="1.5" fill="none"/>
                  <line x1="30" y1="32" x2="30" y2="9" stroke="#F8F1E4" stroke-width="2" class="vu-needle"/>
                </svg>
              </div>
              <h4 class="font-cinema text-base font-bold text-parchment uppercase mt-1">ADR &amp; Voiceover Booth</h4>
              <p class="text-xs text-parchment/75 mt-1.5">Kabin kedap suara akustik dengan *condenser mic* profesional untuk *voice acting, dubbing,* dan *showreel audio*.</p>
            </div>
          </div>

          <!-- Theatre Stage -->
          <div class="cinema-card bg-velvet border border-spotgold/40 rounded-xl overflow-hidden">
            <img src="https://images.unsplash.com/photo-1503095396574-80af35ba3162?auto=format&fit=crop&w=700&q=85" alt="Theatre Stage" class="w-full h-44 object-cover" />
            <div class="p-5">
              <span class="font-cinema text-[10px] text-champagne uppercase font-bold">THEATRE STAGE</span>
              <h4 class="font-cinema text-base font-bold text-parchment uppercase mt-1">Blackbox &amp; Spotlight Stage</h4>
              <p class="text-xs text-parchment/75 mt-1.5">Panggung pertunjukan dengan tirai beludru, *dimmable stage spotlights*, dan tata suara teater langsung.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ==================== SHOWCASE, EVENTS, STUDENT PORTFOLIO & CASTING OPPORTUNITIES ==================== -->
  <section id="showcase-casting-section" data-stage-section="showcase" class="py-20 bg-velvet">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <!-- Showcase & Productions -->
      <div class="mb-16 reveal-stage">
        <span class="font-cinema text-xs font-bold uppercase tracking-[0.22em] text-spotgold">
          // VII. STUDENT SHOWCASE, EVENTS &amp; PRODUCTIONS
        </span>
        <h2 class="font-cinema text-3xl sm:text-4xl font-bold uppercase text-parchment mt-1 mb-8">
          Pertunjukan Drama, <span class="text-champagne">Film Pendek &amp; Workshop</span>
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
          <div class="cinema-card bg-umber/25 border border-spotgold/40 rounded-xl overflow-hidden">
            <img src="https://images.unsplash.com/photo-1485846234645-a62644f84728?auto=format&fit=crop&w=700&q=85" alt="Short Film Production" class="w-full h-44 object-cover" />
            <div class="p-5">
              <span class="font-cinema text-[10px] text-champagne uppercase font-bold">FILM PRODUCTION • DESEMBER</span>
              <h4 class="font-cinema text-lg font-bold text-parchment uppercase mt-1">"Lampu Terakhir di Senja"</h4>
              <p class="text-xs text-parchment/75 mt-1.5">Antologi film pendek siswa yang diproduksi bersama kru sinema dan diputar di layar bioskop mini akademi.</p>
            </div>
          </div>

          <div class="cinema-card bg-umber/25 border border-spotgold/40 rounded-xl overflow-hidden">
            <img src="https://images.unsplash.com/photo-1507924538820-ede94a04019d?auto=format&fit=crop&w=700&q=85" alt="Stage Drama Gala" class="w-full h-44 object-cover" />
            <div class="p-5">
              <span class="font-cinema text-[10px] text-champagne uppercase font-bold">DRAMA PERFORMANCE • JANUARI</span>
              <h4 class="font-cinema text-lg font-bold text-parchment uppercase mt-1">Gala Teater Musim Dingin</h4>
              <p class="text-xs text-parchment/75 mt-1.5">Pentas lakon panggung penuh oleh kelas Teens &amp; Adults dengan tata cahaya dramatis dan musik langsung.</p>
            </div>
          </div>

          <div class="cinema-card bg-umber/25 border border-spotgold/40 rounded-xl overflow-hidden">
            <img src="https://images.unsplash.com/photo-1518834107812-67b0b7c58434?auto=format&fit=crop&w=700&q=85" alt="Casting & Self-Tape Workshop" class="w-full h-44 object-cover" />
            <div class="p-5">
              <span class="font-cinema text-[10px] text-champagne uppercase font-bold">WORKSHOP &amp; SHOWCASE • FEBRUARI</span>
              <h4 class="font-cinema text-lg font-bold text-parchment uppercase mt-1">Monologue &amp; Industry Showcase</h4>
              <p class="text-xs text-parchment/75 mt-1.5">Sesi presentasi *showreel* dan adegan langsung siswa di hadapan *casting director* &amp; produser tamu.</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Student Portfolio Cards -->
      <div class="mb-16 reveal-stage">
        <h3 class="font-cinema text-2xl sm:text-3xl font-bold uppercase text-parchment mb-6">
          Student <span class="text-champagne">Portfolio &amp; Showreels</span>
        </h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
          <div class="bg-umber/25 border border-spotgold/40 rounded-xl p-5 flex gap-4 items-start">
            <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=250&q=80" alt="Nadia Putri Headshot" class="w-20 h-24 rounded-lg object-cover border border-spotgold/50 shrink-0" />
            <div class="text-xs space-y-1.5">
              <span class="font-cinema text-[10px] text-champagne uppercase font-bold">HEADSHOT &amp; SHOWREEL</span>
              <h4 class="font-cinema text-base font-bold text-parchment uppercase">Nadia Putri (22)</h4>
              <p class="font-editorial italic text-sm text-parchment/85">"Monologue: Surat dari Pelabuhan (Drama Psikologis)"</p>
              <p class="text-parchment/70">Karya: Film pendek *Jejak Bayangan* &amp; lakon teater *Malam Puncak*.</p>
            </div>
          </div>

          <div class="bg-umber/25 border border-spotgold/40 rounded-xl p-5 flex gap-4 items-start">
            <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=250&q=80" alt="Bagas Pratama Headshot" class="w-20 h-24 rounded-lg object-cover border border-spotgold/50 shrink-0" />
            <div class="text-xs space-y-1.5">
              <span class="font-cinema text-[10px] text-champagne uppercase font-bold">FILM &amp; VOICE PORTFOLIO</span>
              <h4 class="font-cinema text-base font-bold text-parchment uppercase">Bagas Pratama (26)</h4>
              <p class="font-editorial italic text-sm text-parchment/85">"Monologue: Ruang Interogasi (Thriller Layar Lebar)"</p>
              <p class="text-parchment/70">Karya: Web series *Saksi Kunci* &amp; narasi *voice acting* dokumenter.</p>
            </div>
          </div>

          <div class="bg-umber/25 border border-spotgold/40 rounded-xl p-5 flex gap-4 items-start">
            <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?auto=format&fit=crop&w=250&q=80" alt="Keisha Ramadhani Headshot" class="w-20 h-24 rounded-lg object-cover border border-spotgold/50 shrink-0" />
            <div class="text-xs space-y-1.5">
              <span class="font-cinema text-[10px] text-champagne uppercase font-bold">TEENS &amp; MUSICAL REEL</span>
              <h4 class="font-cinema text-base font-bold text-parchment uppercase">Keisha Ramadhani (16)</h4>
              <p class="font-editorial italic text-sm text-parchment/85">"Scene Study: Dialog Dua Sahabat di Musim Hujan"</p>
              <p class="text-parchment/70">Karya: Ensemble *Musical Theatre* &amp; iklan komersial remaja.</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Casting Opportunities -->
      <div class="reveal-stage">
        <h3 class="font-cinema text-2xl sm:text-3xl font-bold uppercase text-parchment mb-6">
          Casting <span class="text-champagne">Opportunities</span>
        </h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
          <div class="bg-umber/30 border border-spotgold/50 rounded-xl p-5 flex flex-col justify-between">
            <div>
              <span class="px-2.5 py-0.5 rounded bg-spotgold text-velvet font-cinema font-bold text-[10px] uppercase">OPEN CASTING</span>
              <h4 class="font-cinema text-lg font-bold text-parchment uppercase mt-2">Film Pendek "Kota Hujan"</h4>
              <p class="text-xs text-parchment/80 mt-1.5">Mencari pemeran utama pria &amp; wanita (usia 20–28) dengan kemampuan akting emosional depan kamera.</p>
            </div>
            <button onclick="prefillCastingNote('Audisi Film Pendek Kota Hujan')" class="mt-4 py-2.5 px-4 rounded-lg bg-velvet hover:bg-spotgold hover:text-velvet text-champagne border border-spotgold/50 font-cinema font-bold text-xs uppercase transition-all">
              Ajukan Minat Audisi →
            </button>
          </div>

          <div class="bg-umber/30 border border-spotgold/50 rounded-xl p-5 flex flex-col justify-between">
            <div>
              <span class="px-2.5 py-0.5 rounded bg-spotgold text-velvet font-cinema font-bold text-[10px] uppercase">THEATRE CAST</span>
              <h4 class="font-cinema text-lg font-bold text-parchment uppercase mt-2">Pentas Drama "Tirai Emas"</h4>
              <p class="text-xs text-parchment/80 mt-1.5">Terbuka untuk kategori Teens &amp; Adults; diutamakan yang nyaman dengan proyeksi suara dan latihan rutin.</p>
            </div>
            <button onclick="prefillCastingNote('Audisi Pentas Drama Tirai Emas')" class="mt-4 py-2.5 px-4 rounded-lg bg-velvet hover:bg-spotgold hover:text-velvet text-champagne border border-spotgold/50 font-cinema font-bold text-xs uppercase transition-all">
              Ajukan Minat Audisi →
            </button>
          </div>

          <div class="bg-umber/30 border border-spotgold/50 rounded-xl p-5 flex flex-col justify-between">
            <div>
              <span class="px-2.5 py-0.5 rounded bg-champagne text-velvet font-cinema font-bold text-[10px] uppercase">VOICEOVER CALL</span>
              <h4 class="font-cinema text-lg font-bold text-parchment uppercase mt-2">Serial Animasi &amp; Audio Drama</h4>
              <p class="text-xs text-parchment/80 mt-1.5">Peluang pengisi suara karakter anak, remaja, dan narator dengan artikulasi jelas serta variasi karakter.</p>
            </div>
            <button onclick="prefillCastingNote('Audisi Voiceover Serial Animasi & Audio Drama')" class="mt-4 py-2.5 px-4 rounded-lg bg-velvet hover:bg-spotgold hover:text-velvet text-champagne border border-spotgold/50 font-cinema font-bold text-xs uppercase transition-all">
              Ajukan Minat Audisi →
            </button>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ==================== PACKAGES & 7-STEP REGISTRATION FLOW ==================== -->
  <section id="registration-section" data-stage-section="enroll" class="py-20 bg-umber/20 border-t border-spotgold/30">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <!-- Packages -->
      <div class="text-center max-w-3xl mx-auto mb-12 reveal-stage">
        <span class="font-cinema text-xs font-bold uppercase tracking-[0.22em] text-spotgold">
          // VIII. TUITION PACKAGES &amp; ENROLLMENT
        </span>
        <h2 class="font-cinema text-3xl sm:text-4xl font-bold uppercase text-parchment mt-1">
          Paket Kelas &amp; <span class="text-champagne">Pendaftaran 7 Langkah</span>
        </h2>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-16 reveal-stage">
        <div class="cinema-card bg-velvet border border-spotgold/45 rounded-xl p-6 flex flex-col justify-between">
          <div>
            <span class="font-cinema text-[10px] text-champagne uppercase font-bold">FIRST EXPERIENCE</span>
            <h3 class="font-cinema text-xl font-bold text-parchment uppercase mt-1">Trial Class</h3>
            <p class="font-cinema text-2xl font-bold text-champagne my-3">Rp 150.000 <span class="text-xs font-sans text-parchment/65">/ 1 sesi</span></p>
            <ul class="space-y-2 text-xs text-parchment/80">
              <li>✦ 1x sesi pengenalan program pilihan</li>
              <li>✦ Evaluasi awal vokal, ekspresi &amp; *scene*</li>
              <li>✦ Konsultasi jalur belajar bersama pelatih</li>
            </ul>
          </div>
          <button onclick="selectPackageInWizard('Trial Class (Rp 150.000)')" class="mt-6 w-full py-2.5 rounded-lg bg-umber/50 hover:bg-spotgold hover:text-velvet text-parchment font-cinema font-bold text-xs uppercase border border-spotgold/45 transition-all">
            Pilih Trial Class
          </button>
        </div>

        <div class="cinema-card bg-velvet border-2 border-champagne rounded-xl p-6 flex flex-col justify-between shadow-2xl shadow-spotgold/15">
          <div>
            <span class="px-2.5 py-0.5 rounded bg-spotgold text-velvet font-cinema font-bold text-[10px] uppercase">MOST CHOSEN</span>
            <h3 class="font-cinema text-xl font-bold text-parchment uppercase mt-2">Regular Class</h3>
            <p class="font-cinema text-2xl font-bold text-champagne my-3">Rp 1.250.000 <span class="text-xs font-sans text-parchment/65">/ bulan (4x)</span></p>
            <ul class="space-y-2 text-xs text-parchment/85">
              <li>✦ 4x pertemuan reguler per bulan di studio</li>
              <li>✦ Latihan teknik, vokal, dialog &amp; *scene study*</li>
              <li>✦ Akses sesi *showcase* &amp; latihan terbuka</li>
            </ul>
          </div>
          <button onclick="selectPackageInWizard('Regular Class Bulanan (Rp 1.250.000/bln)')" class="mt-6 w-full py-2.5 rounded-lg bg-gradient-to-r from-spotgold to-champagne text-velvet font-cinema font-bold text-xs uppercase transition-all">
            Pilih Regular Class
          </button>
        </div>

        <div class="cinema-card bg-velvet border border-spotgold/45 rounded-xl p-6 flex flex-col justify-between">
          <div>
            <span class="font-cinema text-[10px] text-champagne uppercase font-bold">1-ON-1 MENTORSHIP</span>
            <h3 class="font-cinema text-xl font-bold text-parchment uppercase mt-1">Private Coaching</h3>
            <p class="font-cinema text-2xl font-bold text-champagne my-3">Rp 550.000 <span class="text-xs font-sans text-parchment/65">/ sesi</span></p>
            <ul class="space-y-2 text-xs text-parchment/80">
              <li>✦ Bimbingan privat *monologue*, *casting* &amp; *self-tape*</li>
              <li>✦ Jadwal fleksibel menyesuaikan kebutuhan aktor</li>
              <li>✦ *Playback* &amp; catatan sutradara personal</li>
            </ul>
          </div>
          <button onclick="selectPackageInWizard('Private Coaching 1-on-1 (Rp 550.000/sesi)')" class="mt-6 w-full py-2.5 rounded-lg bg-umber/50 hover:bg-spotgold hover:text-velvet text-parchment font-cinema font-bold text-xs uppercase border border-spotgold/45 transition-all">
            Pilih Private Coaching
          </button>
        </div>

        <div class="cinema-card bg-velvet border border-spotgold/45 rounded-xl p-6 flex flex-col justify-between">
          <div>
            <span class="font-cinema text-[10px] text-champagne uppercase font-bold">PRODUCTION &amp; REEL</span>
            <h3 class="font-cinema text-xl font-bold text-parchment uppercase mt-1">Intensive Program</h3>
            <p class="font-cinema text-2xl font-bold text-champagne my-3">Rp 3.400.000 <span class="text-xs font-sans text-parchment/65">/ 8 minggu</span></p>
            <ul class="space-y-2 text-xs text-parchment/80">
              <li>✦ Program intensif 8 minggu hingga produksi *showcase*</li>
              <li>✦ Rekaman adegan *showreel* &amp; *audition reel*</li>
              <li>✦ Prioritas *casting call* produksi mitra</li>
            </ul>
          </div>
          <button onclick="selectPackageInWizard('Intensive Program 8 Minggu (Rp 3.400.000)')" class="mt-6 w-full py-2.5 rounded-lg bg-umber/50 hover:bg-spotgold hover:text-velvet text-parchment font-cinema font-bold text-xs uppercase border border-spotgold/45 transition-all">
            Pilih Intensive Program
          </button>
        </div>
      </div>

      <!-- 7-STEP BOOKING / REGISTRATION FLOW WIZARD -->
      <div class="max-w-4xl mx-auto bg-velvet border-2 border-spotgold/70 rounded-2xl shadow-2xl overflow-hidden reveal-stage">
        <div class="bg-umber/45 p-6 border-b border-spotgold/35">
          <div class="flex items-center justify-between text-xs font-cinema font-bold mb-2.5">
            <span id="reg-step-title" class="text-champagne uppercase">LANGKAH 1 DARI 7 • PILIH PROGRAM ACTING</span>
            <span id="reg-step-pct" class="text-parchment">14%</span>
          </div>
          <div class="w-full h-2 bg-velvet rounded-full overflow-hidden">
            <div id="reg-progress-bar" class="h-full bg-gradient-to-r from-spotgold to-champagne transition-all duration-500" style="width: 14.28%"></div>
          </div>
          <div class="grid grid-cols-7 gap-1.5 mt-3">
            <button onclick="goToRegStep(1)" class="reg-dot h-1.5 rounded bg-champagne"></button>
            <button onclick="goToRegStep(2)" class="reg-dot h-1.5 rounded bg-umber/60"></button>
            <button onclick="goToRegStep(3)" class="reg-dot h-1.5 rounded bg-umber/60"></button>
            <button onclick="goToRegStep(4)" class="reg-dot h-1.5 rounded bg-umber/60"></button>
            <button onclick="goToRegStep(5)" class="reg-dot h-1.5 rounded bg-umber/60"></button>
            <button onclick="goToRegStep(6)" class="reg-dot h-1.5 rounded bg-umber/60"></button>
            <button onclick="goToRegStep(7)" class="reg-dot h-1.5 rounded bg-umber/60"></button>
          </div>
        </div>

        <div class="p-6 sm:p-8">
          <!-- Step 1: Pilih Program Acting -->
          <div id="reg-step-1" class="reg-step space-y-4">
            <h3 class="font-cinema text-xl font-bold text-parchment uppercase">1. Pilih Program Acting</h3>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 text-xs">
              <label class="cursor-pointer">
                <input type="radio" name="reg_program" value="Film Acting" checked onchange="updateRegSummary()" class="peer sr-only" />
                <div class="p-4 rounded-xl bg-umber/30 border border-spotgold/35 peer-checked:border-champagne peer-checked:bg-spotgold/20 font-cinema font-bold text-parchment">
                  🎬 Film Acting
                </div>
              </label>
              <label class="cursor-pointer">
                <input type="radio" name="reg_program" value="Theatre Acting" onchange="updateRegSummary()" class="peer sr-only" />
                <div class="p-4 rounded-xl bg-umber/30 border border-spotgold/35 peer-checked:border-champagne peer-checked:bg-spotgold/20 font-cinema font-bold text-parchment">
                  🎭 Theatre Acting
                </div>
              </label>
              <label class="cursor-pointer">
                <input type="radio" name="reg_program" value="TV Acting" onchange="updateRegSummary()" class="peer sr-only" />
                <div class="p-4 rounded-xl bg-umber/30 border border-spotgold/35 peer-checked:border-champagne peer-checked:bg-spotgold/20 font-cinema font-bold text-parchment">
                  📺 TV Acting
                </div>
              </label>
              <label class="cursor-pointer">
                <input type="radio" name="reg_program" value="Voice Acting" onchange="updateRegSummary()" class="peer sr-only" />
                <div class="p-4 rounded-xl bg-umber/30 border border-spotgold/35 peer-checked:border-champagne peer-checked:bg-spotgold/20 font-cinema font-bold text-parchment">
                  🎙️ Voice Acting
                </div>
              </label>
              <label class="cursor-pointer sm:col-span-2">
                <input type="radio" name="reg_program" value="Musical Theatre" onchange="updateRegSummary()" class="peer sr-only" />
                <div class="p-4 rounded-xl bg-umber/30 border border-spotgold/35 peer-checked:border-champagne peer-checked:bg-spotgold/20 font-cinema font-bold text-parchment">
                  🎶 Musical Theatre (Acting, Vocal &amp; Stage Movement)
                </div>
              </label>
            </div>
          </div>

          <!-- Step 2: Pilih Kategori Usia & Level Kemampuan -->
          <div id="reg-step-2" class="reg-step hidden space-y-4">
            <h3 class="font-cinema text-xl font-bold text-parchment uppercase">2. Pilih Kategori Usia &amp; Level Kemampuan</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs">
              <div>
                <label class="block font-cinema text-champagne uppercase mb-1.5">Kategori Usia</label>
                <select id="reg_age_cat" onchange="updateRegSummary()" class="w-full p-3.5 rounded-lg bg-umber/35 border border-spotgold/45 text-parchment font-semibold">
                  <option value="Kids (7–12 Tahun)">Kids (7–12 Tahun)</option>
                  <option value="Teens (13–17 Tahun)">Teens (13–17 Tahun)</option>
                  <option value="Adults (18+ Tahun)" selected>Adults (18+ Tahun)</option>
                </select>
              </div>
              <div>
                <label class="block font-cinema text-champagne uppercase mb-1.5">Level Kemampuan</label>
                <select id="reg_skill_lvl" onchange="updateRegSummary()" class="w-full p-3.5 rounded-lg bg-umber/35 border border-spotgold/45 text-parchment font-semibold">
                  <option value="Beginner (Pemula)">Beginner (Pemula)</option>
                  <option value="Intermediate (Menengah)">Intermediate (Menengah)</option>
                  <option value="Advanced (Lanjutan / Audisi)">Advanced (Lanjutan / Audisi)</option>
                </select>
              </div>
            </div>
          </div>

          <!-- Step 3: Pilih Jadwal Serta Instruktur -->
          <div id="reg-step-3" class="reg-step hidden space-y-4">
            <h3 class="font-cinema text-xl font-bold text-parchment uppercase">3. Pilih Jadwal &amp; Instruktur</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs">
              <div>
                <label class="block font-cinema text-champagne uppercase mb-1.5">Jadwal Sesi</label>
                <select id="reg_schedule" onchange="updateRegSummary()" class="w-full p-3.5 rounded-lg bg-umber/35 border border-spotgold/45 text-parchment font-semibold">
                  <option value="Rabu • 18:30 – 20:30 WIB (Film &amp; Camera Acting)">Rabu • 18:30 – 20:30 WIB (Film &amp; Camera Acting)</option>
                  <option value="Kamis • 19:00 – 21:00 WIB (Theatre &amp; Stage Craft)">Kamis • 19:00 – 21:00 WIB (Theatre &amp; Stage Craft)</option>
                  <option value="Jumat • 18:30 – 20:30 WIB (Voice Acting &amp; Diction)">Jumat • 18:30 – 20:30 WIB (Voice Acting &amp; Diction)</option>
                  <option value="Sabtu • 10:00 – 12:00 WIB (Kids &amp; Teens Drama)">Sabtu • 10:00 – 12:00 WIB (Kids &amp; Teens Drama)</option>
                  <option value="Sabtu • 14:00 – 16:30 WIB (Musical Theatre &amp; Audition)">Sabtu • 14:00 – 16:30 WIB (Musical Theatre &amp; Audition)</option>
                </select>
              </div>
              <div>
                <label class="block font-cinema text-champagne uppercase mb-1.5">Instruktur / Sutradara</label>
                <select id="reg_instructor" onchange="updateRegSummary()" class="w-full p-3.5 rounded-lg bg-umber/35 border border-spotgold/45 text-parchment font-semibold">
                  <option value="Hendra Kusuma (Film Director &amp; Scene Coach)">Hendra Kusuma (Film Director &amp; Scene Coach)</option>
                  <option value="Clara Suryani (Stage Lead &amp; Method Coach)">Clara Suryani (Stage Lead &amp; Method Coach)</option>
                  <option value="Raka Pratama (Voice &amp; Musical Theatre)">Raka Pratama (Voice &amp; Musical Theatre)</option>
                  <option value="Maya Anindita (Kids Drama &amp; Improvisation)">Maya Anindita (Kids Drama &amp; Improvisation)</option>
                </select>
              </div>
            </div>
          </div>

          <!-- Step 4: Isi Data Peserta -->
          <div id="reg-step-4" class="reg-step hidden space-y-4">
            <h3 class="font-cinema text-xl font-bold text-parchment uppercase">4. Isi Data Peserta</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs">
              <div>
                <label class="block font-cinema text-champagne uppercase mb-1">Nama Lengkap Peserta *</label>
                <input id="reg_name" type="text" placeholder="Contoh: Kirana Maharani" oninput="updateRegSummary()" class="w-full p-3 rounded-lg bg-umber/35 border border-spotgold/45 text-parchment" />
              </div>
              <div>
                <label class="block font-cinema text-champagne uppercase mb-1">Usia / Tanggal Lahir *</label>
                <input id="reg_age_dob" type="text" placeholder="Contoh: 21 Tahun (14 Mei 2005)" oninput="updateRegSummary()" class="w-full p-3 rounded-lg bg-umber/35 border border-spotgold/45 text-parchment" />
              </div>
              <div>
                <label class="block font-cinema text-champagne uppercase mb-1">Nomor WhatsApp Aktif *</label>
                <input id="reg_wa" type="tel" placeholder="Contoh: 081288776655" oninput="updateRegSummary()" class="w-full p-3 rounded-lg bg-umber/35 border border-spotgold/45 text-parchment" />
              </div>
              <div>
                <label class="block font-cinema text-champagne uppercase mb-1">Pengalaman Akting</label>
                <input id="reg_exp" type="text" placeholder="Contoh: Pemula / Teater kampus / Belum pernah" oninput="updateRegSummary()" class="w-full p-3 rounded-lg bg-umber/35 border border-spotgold/45 text-parchment" />
              </div>
              <div class="sm:col-span-2">
                <label class="block font-cinema text-champagne uppercase mb-1">Catatan Tambahan / Target Audisi</label>
                <input id="reg_notes" type="text" placeholder="Contoh: Ingin melatih monolog drama & self-tape audisi" oninput="updateRegSummary()" class="w-full p-3 rounded-lg bg-umber/35 border border-spotgold/45 text-parchment" />
              </div>
            </div>
          </div>

          <!-- Step 5: Pilih Paket Kelas -->
          <div id="reg-step-5" class="reg-step hidden space-y-4">
            <h3 class="font-cinema text-xl font-bold text-parchment uppercase">5. Pilih Paket Kelas</h3>
            <select id="reg_package" onchange="updateRegSummary()" class="w-full p-3.5 rounded-lg bg-umber/35 border border-spotgold/45 text-sm font-semibold text-parchment">
              <option value="Trial Class (Rp 150.000)">Trial Class — Rp 150.000 (1 sesi percobaan &amp; evaluasi)</option>
              <option value="Regular Class Bulanan (Rp 1.250.000/bln)" selected>Regular Class — Rp 1.250.000 / bulan (4x pertemuan)</option>
              <option value="Private Coaching 1-on-1 (Rp 550.000/sesi)">Private Coaching — Rp 550.000 / sesi (60 menit privat)</option>
              <option value="Intensive Program 8 Minggu (Rp 3.400.000)">Intensive Program — Rp 3.400.000 / 8 minggu (hingga showcase &amp; reel)</option>
            </select>
          </div>

          <!-- Step 6: Tampilkan Ringkasan Pendaftaran -->
          <div id="reg-step-6" class="reg-step hidden space-y-4">
            <h3 class="font-cinema text-xl font-bold text-parchment uppercase">6. Ringkasan Pendaftaran</h3>
            <div id="reg-summary-card" class="bg-umber/30 border border-spotgold/45 rounded-xl p-5 space-y-3 text-xs sm:text-sm">
              <!-- Populated by JS -->
            </div>
          </div>

          <!-- Step 7: Lanjutkan ke WhatsApp dengan Format Pesan Otomatis -->
          <div id="reg-step-7" class="reg-step hidden space-y-4">
            <h3 class="font-cinema text-xl font-bold text-parchment uppercase text-center">7. Kirim Pendaftaran ke WhatsApp Admin</h3>
            <div id="reg-wa-format-box" class="bg-umber/35 text-parchment p-4 rounded-xl text-xs whitespace-pre-line border border-champagne/40 leading-relaxed"></div>
            <div class="flex flex-col sm:flex-row gap-3">
              <button onclick="sendRegistrationWA()" class="flex-1 py-3.5 px-6 rounded-lg bg-[#25D366] hover:bg-[#1ebe5d] text-white font-cinema font-bold text-xs sm:text-sm uppercase tracking-wider shadow-lg">
                ✦ Lanjutkan ke WhatsApp
              </button>
              <button onclick="copyRegistrationWA()" class="py-3.5 px-5 rounded-lg bg-umber/50 hover:bg-umber/80 text-champagne font-cinema font-bold text-xs uppercase border border-spotgold/45">
                Salin Format Pesan
              </button>
            </div>
            <p id="reg-copy-feedback" class="hidden text-center text-xs font-cinema font-bold text-champagne">✓ Format pesan pendaftaran berhasil disalin!</p>
          </div>

          <!-- Navigation Buttons -->
          <div class="flex items-center justify-between mt-7 pt-5 border-t border-spotgold/25">
            <button id="reg-prev-btn" onclick="changeRegStep(-1)" disabled class="px-5 py-2.5 rounded-lg bg-umber/45 text-parchment font-cinema font-bold text-xs uppercase disabled:opacity-35">
              ← Sebelumnya
            </button>
            <button id="reg-next-btn" onclick="changeRegStep(1)" class="px-6 py-2.5 rounded-lg bg-gradient-to-r from-spotgold to-champagne text-velvet font-cinema font-bold text-xs uppercase shadow">
              Langkah Berikutnya →
            </button>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ==================== TESTIMONIALS & FAQ ==================== -->
  <section id="testimonials-faq-section" data-stage-section="showcase" class="py-20 bg-velvet border-t border-spotgold/30">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <!-- Testimonials -->
      <div class="mb-16 reveal-stage">
        <div class="text-center max-w-2xl mx-auto mb-10">
          <span class="font-cinema text-xs font-bold uppercase tracking-[0.22em] text-spotgold">// IX. STUDENT VOICES</span>
          <h2 class="font-cinema text-3xl sm:text-4xl font-bold uppercase text-parchment mt-1">
            Cerita &amp; Pengalaman <span class="text-champagne">Siswa Atelier</span>
          </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
          <div class="bg-umber/25 border border-spotgold/40 rounded-xl p-6">
            <p class="font-editorial italic text-lg text-parchment leading-relaxed">
              "Dulu saya kaku setiap kali diminta berbicara di depan kelas. Melalui latihan improvisasi dan *scene study*, saya berhasil lolos audisi peran pendukung film pendek."
            </p>
            <div class="mt-4 pt-3 border-t border-spotgold/25 flex justify-between items-center text-xs">
              <div><strong class="font-cinema text-champagne block">Aditya Pratama</strong><span class="text-parchment/70">Film &amp; Scene Study • Adults</span></div>
              <span class="text-champagne">★★★★★</span>
            </div>
          </div>

          <div class="bg-umber/25 border border-spotgold/40 rounded-xl p-6">
            <p class="font-editorial italic text-lg text-parchment leading-relaxed">
              "Pelatih vokal membantu saya mengontrol napas, artikulasi, dan karakter suara untuk proyek *voiceover* dan teater musikal tanpa membuat tenggorokan lelah."
            </p>
            <div class="mt-4 pt-3 border-t border-spotgold/25 flex justify-between items-center text-xs">
              <div><strong class="font-cinema text-champagne block">Salsabila Putri</strong><span class="text-parchment/70">Voice Acting &amp; Musical • Teens</span></div>
              <span class="text-champagne">★★★★★</span>
            </div>
          </div>

          <div class="bg-umber/25 border border-spotgold/40 rounded-xl p-6">
            <p class="font-editorial italic text-lg text-parchment leading-relaxed">
              "Anak kami yang tadinya pemalu kini lebih ekspresif, pandai bercerita, dan antusias tampil di panggung *showcase* akhir semester bersama teman-temannya."
            </p>
            <div class="mt-4 pt-3 border-t border-spotgold/25 flex justify-between items-center text-xs">
              <div><strong class="font-cinema text-champagne block">Ibu Lestari Wijaya</strong><span class="text-parchment/70">Orang Tua Siswa Kids Drama</span></div>
              <span class="text-champagne">★★★★★</span>
            </div>
          </div>
        </div>
      </div>

      <!-- FAQ Accordion -->
      <div class="max-w-3xl mx-auto reveal-stage">
        <h3 class="font-cinema text-2xl sm:text-3xl font-bold uppercase text-parchment text-center mb-6">
          Pertanyaan Umum (FAQ)
        </h3>
        <div id="cinema-faq-list" class="space-y-3"></div>
      </div>
    </div>
  </section>

  <!-- ==================== FOOTER ==================== -->
  <footer class="bg-umber/35 text-parchment pt-12 pb-8 border-t border-spotgold/40">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row items-center justify-between gap-6 text-xs">
      <div>
        <span class="font-cinema text-lg font-bold text-parchment uppercase">ATELIER <span class="text-champagne">PANGGUNG</span> &amp; SINEMA</span>
        <p class="text-parchment/75 mt-1">Jl. Teater &amp; Sinema Blok A-08, Jakarta Selatan • Studio Buka Selasa–Minggu (09:00 – 21:30 WIB)</p>
      </div>
      <div class="flex flex-wrap gap-4 font-cinema uppercase text-[11px] text-parchment/85">
        <a href="#about-academy-section" class="hover:text-champagne">About</a>
        <a href="#programs-craft-section" class="hover:text-champagne">Programs</a>
        <a href="#instructors-schedule-spaces-section" class="hover:text-champagne">Schedule &amp; Studios</a>
        <a href="#registration-section" class="hover:text-champagne">Join Class</a>
      </div>
      <p class="text-parchment/60">© 2026 Atelier Panggung &amp; Sinema. All Rights Reserved.</p>
    </div>
  </footer>

  <!-- ==================== FLOATING WHATSAPP & UNIQUE "MAESTRO CUE AI" ==================== -->
  <a
    id="atelier-whatsapp-link" href="https://wa.me/6281234567890"
    target="_blank"
    rel="noopener noreferrer"
    class="fixed bottom-5 left-5 z-40 flex items-center gap-2.5 bg-[#25D366] hover:bg-[#1ebe5d] text-white px-4 py-3.5 rounded-full shadow-2xl transition-transform hover:scale-105"
  >
    <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
      <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.662.591 1.221.774 1.394.86s.274.072.376-.043c.101-.116.433-.506.549-.68.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.045.072.045.419-.1.824z"/>
    </svg>
    <span class="hidden sm:inline font-cinema font-bold text-xs uppercase tracking-wider">WhatsApp</span>
  </a>

  <!-- Unique Floating AI Chatbot: "Maestro Cue AI — Director & Stage Assistant" -->
  <div class="fixed bottom-5 right-5 z-50">
    <div id="maestro-ai-window" class="hidden mb-3 w-[340px] sm:w-[390px] bg-velvet rounded-2xl shadow-2xl border-2 border-spotgold overflow-hidden">
      <div class="bg-umber/65 text-parchment p-4 flex items-center justify-between border-b border-spotgold/40">
        <div class="flex items-center gap-3">
          <div class="w-11 h-11 rounded-xl bg-velvet border border-champagne flex items-center justify-center relative">
            <svg class="w-6 h-6" viewBox="0 0 40 40" fill="none">
              <circle cx="20" cy="20" r="15" stroke="#E5C77A" stroke-width="1.8"/>
              <path d="M13 24L20 11L27 24" stroke="#F8F1E4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              <circle cx="20" cy="28" r="2.2" fill="#E5C77A"/>
            </svg>
            <span class="absolute -bottom-1 -right-1 w-3 h-3 rounded-full bg-[#25D366] border-2 border-velvet"></span>
          </div>
          <div>
            <h4 class="font-cinema font-bold text-sm text-champagne uppercase">Maestro Cue AI ✦</h4>
            <p class="font-editorial italic text-xs text-parchment/85">Sutradara &amp; Konsultan Kelas</p>
          </div>
        </div>
        <button onclick="toggleMaestroAI()" class="w-8 h-8 rounded-lg bg-velvet hover:bg-spotgold hover:text-velvet text-parchment font-bold flex items-center justify-center">✕</button>
      </div>

      <div id="maestro-ai-feed" class="h-72 overflow-y-auto p-4 space-y-3 bg-velvet text-xs sm:text-sm">
        <div class="bg-umber/35 p-3.5 rounded-xl border border-spotgold/35 text-parchment leading-relaxed">
          <em>Cue, please!</em> 🎬 Saya <strong>Maestro Cue AI</strong>. Bingung memilih antara <em>Film Acting, Theatre, Voice Acting,</em> atau <em>Musical Theatre</em>? Atau ingin tahu jadwal, audisi, dan paket kelas? Tanyakan di sini!
        </div>
      </div>

      <div class="px-3 py-2 bg-umber/30 border-t border-spotgold/25 flex gap-1.5 overflow-x-auto">
        <button onclick="askMaestroAI('Rekomendasi program untuk pemula dewasa')" class="whitespace-nowrap px-3 py-1.5 rounded-lg bg-velvet hover:bg-spotgold hover:text-velvet text-champagne border border-spotgold/40 font-cinema text-[10px] uppercase">
          🎬 Program Pemula
        </button>
        <button onclick="askMaestroAI('Tips persiapan audisi dan self-tape')" class="whitespace-nowrap px-3 py-1.5 rounded-lg bg-velvet hover:bg-spotgold hover:text-velvet text-champagne border border-spotgold/40 font-cinema text-[10px] uppercase">
          🎭 Audisi &amp; Self-Tape
        </button>
        <button onclick="askMaestroAI('Info paket Trial Class, Regular & Private')" class="whitespace-nowrap px-3 py-1.5 rounded-lg bg-velvet hover:bg-spotgold hover:text-velvet text-champagne border border-spotgold/40 font-cinema text-[10px] uppercase">
          ✦ Paket &amp; Biaya
        </button>
      </div>

      <form onsubmit="handleMaestroAISubmit(event)" class="p-3 bg-umber/40 border-t border-spotgold/35 flex gap-2">
        <input id="maestro-ai-input" type="text" placeholder="Tanya program, jadwal, audisi, biaya..." class="flex-1 px-3 py-2.5 rounded-lg bg-velvet border border-spotgold/45 text-xs text-parchment focus:outline-none focus:border-champagne" />
        <button type="submit" class="px-4 py-2.5 rounded-lg bg-gradient-to-r from-spotgold to-champagne text-velvet font-cinema font-bold text-xs uppercase">Kirim</button>
      </form>
    </div>

    <button
      onclick="toggleMaestroAI()"
      class="relative ml-auto flex items-center gap-3 bg-umber/75 hover:bg-umber text-parchment pl-3 pr-5 py-2.5 rounded-xl shadow-2xl border-2 border-champagne transition-transform hover:scale-105 group"
    >
      <span class="absolute inset-0 rounded-xl bg-champagne/30 -z-10" style="animation: pulseHalo 2.6s infinite;"></span>
      <div class="w-10 h-10 rounded-lg bg-velvet border border-spotgold flex items-center justify-center group-hover:rotate-6 transition-transform">
        <svg class="w-6 h-6" viewBox="0 0 40 40" fill="none">
          <circle cx="20" cy="20" r="14" stroke="#E5C77A" stroke-width="1.8"/>
          <path d="M13 24L20 11L27 24" stroke="#F8F1E4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </div>
      <div class="text-left">
        <span class="block font-cinema text-[9px] font-bold uppercase tracking-widest text-champagne leading-none">Director Assistant</span>
        <span class="font-cinema font-bold text-xs sm:text-sm text-parchment uppercase">Maestro Cue AI</span>
      </div>
    </button>
  </div>

  <!-- ==================== JAVASCRIPT LOGIC ==================== -->
  
<script src="{{ asset('js/website-bisnis/templates/performing-arts-stage-training/acting-drama-school/atelier-panggung-sinema/atelier-panggung-sinema.js') }}?v=1.0.1"></script>
</body>
</html>
