<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="theme-color" content="#741C2C" />
  <title>Kencana Wastra | Royal Traditional Costume & Heritage Atelier</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600;700;800&family=Playfair+Display:ital,wght@0,600;0,700;1,600&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    window.tailwind = window.tailwind || {};
    window.tailwind.config = {
      theme: {
        extend: {
          colors: {
            ruby: '#741C2C',
            crimson: '#A52A3A',
            gold: '#C99A3C',
            champagne: '#E5C77B',
            ivory: '#F8F0DF',
            ivoryDark: '#EFE3C8',
            charcoal: '#342329',
          },
          fontFamily: {
            royal: ['Cinzel', 'serif'],
            serif: ['Playfair Display', 'serif'],
            sans: ['Plus Jakarta Sans', 'sans-serif'],
          },
        },
      },
    };
  </script>
  <link rel="stylesheet" href="{{ asset('css/website-bisnis/templates/traditional-textiles-heritage-fashion/traditional-costume-rental/kencana-wastra/kencana-wastra.css') }}?v=20261123-fix1" />
</head>
<body class="antialiased selection:bg-gold selection:text-ruby">

  <!-- ==================== TOP ROYAL HEADER & MULTIPAGE NAVIGATION ==================== -->
  <header class="sticky top-0 z-40 bg-ruby/95 backdrop-blur-md border-b-2 border-gold/50 text-ivory shadow-xl">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between h-20">
        <!-- Brand Emblem: Gunungan & Crown Crest -->
        <a href="#beranda" onclick="switchPage('all')" class="flex items-center gap-3.5 group">
          <div class="relative w-12 h-12 rounded-2xl bg-gradient-to-br from-gold via-champagne to-gold p-0.5 shadow-lg shadow-black/30 group-hover:scale-105 transition-transform">
            <div class="w-full h-full bg-ruby rounded-[14px] flex items-center justify-center">
              <!-- Custom Gunungan & Mahkota SVG -->
              <svg class="w-8 h-8 text-champagne" viewBox="0 0 48 48" fill="none">
                <path d="M24 4L37 22L32 42H16L11 22L24 4Z" stroke="currentColor" stroke-width="2.2" fill="rgba(201,154,60,0.18)"/>
                <path d="M24 11L30 23L27 37H21L18 23L24 11Z" stroke="#E5C77B" stroke-width="1.5"/>
                <circle cx="24" cy="23" r="3" fill="#E5C77B"/>
                <path d="M13 42H35" stroke="#C99A3C" stroke-width="2.5" stroke-linecap="round"/>
              </svg>
            </div>
          </div>
          <div>
            <span class="font-royal font-bold text-lg sm:text-xl tracking-wider text-champagne block leading-none">
              KENCANA WASTRA
            </span>
            <span class="text-[10px] font-semibold uppercase tracking-[0.22em] text-ivory/80 mt-1 block">
              Royal Heritage Atelier
            </span>
          </div>
        </a>

        <!-- Multipage View Switcher (Desktop) -->
        <nav class="hidden xl:flex items-center gap-1 bg-charcoal/55 p-1.5 rounded-full border border-gold/35">
          <button onclick="switchPage('all')" data-nav="all" class="nav-pill px-4 py-2 rounded-full text-xs font-bold tracking-wide transition-all bg-gold text-charcoal shadow">
            <span data-i18n="nav_all">Beranda Lengkap</span>
          </button>
          <button onclick="switchPage('koleksi')" data-nav="koleksi" class="nav-pill px-4 py-2 rounded-full text-xs font-semibold tracking-wide text-ivory/85 hover:text-champagne transition-all">
            <span data-i18n="nav_col">Koleksi Busana</span>
          </button>
          <button onclick="switchPage('paket')" data-nav="paket" class="nav-pill px-4 py-2 rounded-full text-xs font-semibold tracking-wide text-ivory/85 hover:text-champagne transition-all">
            <span data-i18n="nav_pkg">Aksesoris & Paket</span>
          </button>
          <button onclick="switchPage('reservasi')" data-nav="reservasi" class="nav-pill px-4 py-2 rounded-full text-xs font-semibold tracking-wide text-ivory/85 hover:text-champagne transition-all">
            <span data-i18n="nav_res">Ketersediaan & Reservasi</span>
          </button>
          <button onclick="switchPage('filosofi')" data-nav="filosofi" class="nav-pill px-4 py-2 rounded-full text-xs font-semibold tracking-wide text-ivory/85 hover:text-champagne transition-all">
            <span data-i18n="nav_phi">Filosofi & Panduan</span>
          </button>
        </nav>

        <!-- Right Controls: Language Toggle + Size Guide + Rent CTA -->
        <div class="hidden sm:flex items-center gap-2.5">
          <!-- ID / EN Toggle -->
          <div class="flex items-center bg-charcoal/60 rounded-full p-1 border border-gold/40 text-xs font-bold">
            <button onclick="setLanguage('id')" id="lang-id" class="px-2.5 py-1 rounded-full bg-gold text-charcoal transition-all">ID</button>
            <button onclick="setLanguage('en')" id="lang-en" class="px-2.5 py-1 rounded-full text-ivory/80 hover:text-white transition-all">EN</button>
          </div>

          <button onclick="openSizeModal()" class="px-3.5 py-2 rounded-full text-xs font-bold text-champagne border border-gold/60 hover:bg-gold/15 transition-all">
            📏 <span data-i18n="btn_size">Panduan Ukuran</span>
          </button>

          <a href="#reservasi-section" onclick="switchPage('all')" class="px-5 py-2.5 rounded-full text-xs font-extrabold uppercase tracking-wider text-charcoal bg-gradient-to-r from-gold via-champagne to-gold hover:brightness-110 transition-all shadow-lg shadow-black/25">
            <span data-i18n="btn_rent">Rent Now</span>
          </a>
        </div>

        <!-- Mobile Menu Button -->
        <button onclick="toggleMobileMenu()" class="xl:hidden p-2.5 rounded-xl bg-charcoal/50 border border-gold/40 text-champagne">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
          </svg>
        </button>
      </div>
    </div>

    <!-- Mobile Navigation Drawer -->
    <div id="mobile-menu" class="hidden xl:hidden bg-charcoal border-b border-gold/40 px-4 pt-3 pb-5 space-y-2">
      <div class="flex items-center justify-between pb-2 border-b border-gold/20">
        <span class="text-xs text-champagne font-bold">Navigasi Halaman</span>
        <div class="flex gap-1 bg-ruby p-1 rounded-full border border-gold/30 text-xs font-bold">
          <button onclick="setLanguage('id')" class="px-2.5 py-0.5 rounded-full bg-gold text-charcoal">ID</button>
          <button onclick="setLanguage('en')" class="px-2.5 py-0.5 rounded-full text-ivory">EN</button>
        </div>
      </div>
      <button onclick="switchPage('all'); toggleMobileMenu()" class="block w-full text-left px-4 py-2.5 rounded-xl font-bold bg-ruby text-champagne">Beranda Lengkap</button>
      <button onclick="switchPage('koleksi'); toggleMobileMenu()" class="block w-full text-left px-4 py-2.5 rounded-xl font-semibold text-ivory hover:bg-ruby/60">Koleksi Busana Nusantara</button>
      <button onclick="switchPage('paket'); toggleMobileMenu()" class="block w-full text-left px-4 py-2.5 rounded-xl font-semibold text-ivory hover:bg-ruby/60">Aksesoris, Couple & Paket Sewa</button>
      <button onclick="switchPage('reservasi'); toggleMobileMenu()" class="block w-full text-left px-4 py-2.5 rounded-xl font-semibold text-ivory hover:bg-ruby/60">Kalender & Reservasi 7 Langkah</button>
      <button onclick="switchPage('filosofi'); toggleMobileMenu()" class="block w-full text-left px-4 py-2.5 rounded-xl font-semibold text-ivory hover:bg-ruby/60">Filosofi Budaya, Kebijakan & FAQ</button>
      <div class="pt-2 flex gap-2">
        <button onclick="openSizeModal(); toggleMobileMenu()" class="flex-1 py-2.5 rounded-xl border border-gold text-champagne text-xs font-bold">📏 Panduan Ukuran</button>
        <a href="#reservasi-section" onclick="switchPage('all'); toggleMobileMenu()" class="flex-1 py-2.5 rounded-xl bg-gold text-charcoal text-center text-xs font-extrabold">Rent Now</a>
      </div>
    </div>
  </header>

  <!-- ==================== HERO SECTION: ROYAL ARCHWAY & NUSANTARA HERITAGE STAGE ==================== -->
  <section id="beranda" data-section="hero" class="relative overflow-hidden bg-gradient-to-b from-ruby via-[#5D1422] to-charcoal text-ivory pt-10 pb-24 sm:pt-14 sm:pb-28">
    <!-- Floating Jasmine Petals & Gold Dust Container -->
    <div id="royal-particles" class="absolute inset-0 pointer-events-none overflow-hidden"></div>

    <!-- Rotating Sacred Mandala / Surya Majapahit SVG Backdrop -->
    <div class="absolute -top-24 -right-24 w-[520px] h-[520px] opacity-15 pointer-events-none animate-spin-slow">
      <svg viewBox="0 0 400 400" fill="none" class="w-full h-full text-champagne">
        <circle cx="200" cy="200" r="185" stroke="currentColor" stroke-width="2" stroke-dasharray="10 8"/>
        <circle cx="200" cy="200" r="145" stroke="currentColor" stroke-width="3"/>
        <circle cx="200" cy="200" r="95" stroke="currentColor" stroke-width="1.5" stroke-dasharray="4 6"/>
        <polygon points="200,12 232,125 345,95 270,185 388,200 270,215 345,305 232,275 200,388 168,275 55,305 130,215 12,200 130,185 55,95 168,125" stroke="currentColor" stroke-width="2" fill="rgba(201,154,60,0.08)"/>
      </svg>
    </div>

    <!-- Second Counter-Rotating Mandala Left -->
    <div class="hidden lg:block absolute bottom-12 -left-28 w-[380px] h-[380px] opacity-10 pointer-events-none animate-spin-reverse-slow">
      <svg viewBox="0 0 300 300" fill="none" class="w-full h-full text-gold">
        <circle cx="150" cy="150" r="135" stroke="currentColor" stroke-width="2"/>
        <circle cx="150" cy="150" r="100" stroke="currentColor" stroke-width="2" stroke-dasharray="12 6"/>
        <rect x="65" y="65" width="170" height="170" stroke="currentColor" stroke-width="2"/>
        <rect x="65" y="65" width="170" height="170" transform="rotate(45 150 150)" stroke="currentColor" stroke-width="2"/>
      </svg>
    </div>

    <!-- Traditional Nusantara Architecture Silhouettes (Rumah Gadang, Joglo, Pura) -->
    <div class="absolute bottom-0 left-0 right-0 pointer-events-none opacity-20 flex items-end justify-between px-4 sm:px-12">
      <!-- Rumah Gadang Silhouette -->
      <svg class="w-44 sm:w-64 h-28 text-champagne animate-float-royal" viewBox="0 0 260 120" fill="currentColor">
        <path d="M15 35C45 65 85 72 130 52C175 72 215 65 245 35C228 75 190 88 130 78C70 88 32 75 15 35Z"/>
        <path d="M55 75H205L215 115H45L55 75Z"/>
        <rect x="118" y="85" width="24" height="30" fill="#342329"/>
      </svg>
      <!-- Candi Bentar / Pura Bali Silhouette -->
      <svg class="hidden md:block w-52 h-32 text-gold animate-float-reverse" viewBox="0 0 220 130" fill="currentColor">
        <path d="M40 125V55L65 30L85 55V125H40Z"/>
        <path d="M135 125V55L155 30L180 55V125H135Z"/>
        <path d="M32 65H92M36 85H90M130 65H188M132 85H184" stroke="#342329" stroke-width="4"/>
      </svg>
      <!-- Rumah Joglo Jawa Silhouette -->
      <svg class="w-48 sm:w-72 h-28 text-champagne animate-float-royal" viewBox="0 0 280 120" fill="currentColor">
        <path d="M140 18L175 52L255 78H25L105 52L140 18Z"/>
        <rect x="65" y="78" width="150" height="38"/>
        <rect x="125" y="88" width="30" height="28" fill="#342329"/>
      </svg>
    </div>

    <!-- Main Hero Content Container -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-8 items-center">
        <!-- Left Editorial Typography (6 cols) -->
        <div class="lg:col-span-6 space-y-6">
          <div class="inline-flex items-center gap-2.5 px-4 py-2 rounded-full bg-charcoal/75 border border-gold/70 shadow-lg">
            <span class="text-champagne text-sm">👑</span>
            <span class="text-xs font-bold uppercase tracking-[0.18em] text-champagne" data-i18n="hero_badge">
              Kurasi Wastra Sabang–Merauke & Busana Budaya Dunia
            </span>
          </div>

          <h1 class="font-royal text-4xl sm:text-5xl lg:text-[3.35rem] font-bold leading-[1.14] tracking-tight">
            <span data-i18n="hero_title_1">Keagungan</span>
            <span class="block gold-shimmer-text mt-1" data-i18n="hero_title_2">Nusantara & Dunia</span>
            <span class="font-serif italic font-semibold text-2xl sm:text-3xl text-ivory/90 block mt-2" data-i18n="hero_title_3">
              Dalam Setiap Helai Tenun, Songket & Sulam Emas
            </span>
          </h1>

          <p class="text-sm sm:text-base text-ivory/85 leading-relaxed max-w-xl" data-i18n="hero_desc">
            Penyewaan busana adat autentik terlengkap dari Sabang hingga Merauke—Aceh, Minang, Jawa, Bali, Dayak, Bugis, Maluku, Papua—hingga busana budaya mancanegara viral seperti Kimono Jepang, Hanbok Korea Selatan, dan Volendam Belanda.
          </p>

          <!-- Regional & International Quick Tags -->
          <div class="flex flex-wrap gap-2">
            <button onclick="filterCollectionFromHero('All', 'Nusantara')" class="px-3 py-1.5 rounded-full bg-gold/25 hover:bg-gold hover:text-charcoal border border-gold text-champagne text-xs font-bold transition-all">🇮🇩 Sabang – Merauke</button>
            <button onclick="filterCollectionFromHero('Jawa & Sunda', 'Nusantara')" class="px-3 py-1.5 rounded-full bg-white/10 hover:bg-gold hover:text-charcoal border border-gold/40 text-xs font-semibold transition-all">Jawa, Sunda & Betawi</button>
            <button onclick="filterCollectionFromHero('Sumatra', 'Nusantara')" class="px-3 py-1.5 rounded-full bg-white/10 hover:bg-gold hover:text-charcoal border border-gold/40 text-xs font-semibold transition-all">Aceh, Minang & Palembang</button>
            <button onclick="filterCollectionFromHero('Bali & Nusa Tenggara', 'Nusantara')" class="px-3 py-1.5 rounded-full bg-white/10 hover:bg-gold hover:text-charcoal border border-gold/40 text-xs font-semibold transition-all">Bali, Sasak & Sumba</button>
            <button onclick="filterCollectionFromHero('All', 'Mancanegara')" class="px-3 py-1.5 rounded-full bg-crimson/70 hover:bg-gold hover:text-charcoal border border-champagne text-champagne text-xs font-bold transition-all">🌏 Jepang, Korea & Belanda</button>
          </div>

          <!-- Dual Hero CTAs -->
          <div class="flex flex-wrap items-center gap-4 pt-2">
            <a href="#koleksi-section" class="px-7 py-4 rounded-full bg-gradient-to-r from-gold via-champagne to-gold text-charcoal font-royal font-extrabold text-xs sm:text-sm uppercase tracking-wider shadow-xl shadow-black/30 hover:scale-[1.03] transition-all flex items-center gap-2.5">
              <span data-i18n="cta_explore">Explore Collection</span>
              <span>→</span>
            </a>
            <a href="#reservasi-section" class="px-7 py-4 rounded-full bg-crimson/80 hover:bg-crimson text-ivory border-2 border-champagne font-royal font-bold text-xs sm:text-sm uppercase tracking-wider shadow-lg transition-all flex items-center gap-2">
              <span>✨</span>
              <span data-i18n="cta_rent">Rent Now</span>
            </a>
          </div>

          <!-- Heritage Stats -->
          <div class="grid grid-cols-3 gap-4 pt-5 border-t border-gold/30 max-w-lg">
            <div>
              <p class="font-royal text-2xl sm:text-3xl font-bold text-champagne">38 Provinsi</p>
              <p class="text-xs text-ivory/75">Sabang sampai Merauke</p>
            </div>
            <div>
              <p class="font-royal text-2xl sm:text-3xl font-bold text-champagne">10+ Negara</p>
              <p class="text-xs text-ivory/75">Jepang, Korea, Belanda</p>
            </div>
            <div>
              <p class="font-royal text-2xl sm:text-3xl font-bold text-champagne">100%</p>
              <p class="text-xs text-ivory/75">Wastra Steam-Sanitized</p>
            </div>
          </div>
        </div>

        <!-- Right Visual Showcase: Royal Archway Frame & Floating Heritage Cards (6 cols) -->
        <div class="lg:col-span-6 relative">
          <div class="relative mx-auto max-w-md sm:max-w-lg">
            <!-- Outer Golden Arch Halo -->
            <div class="absolute -inset-3 royal-arch border-2 border-gold/60 rotate-2 pointer-events-none"></div>
            <div class="absolute -inset-6 royal-arch border border-dashed border-champagne/35 -rotate-2 pointer-events-none"></div>

            <!-- Main Royal Archway Portrait -->
            <div class="relative royal-arch overflow-hidden border-4 border-gold shadow-2xl aspect-[4/5] bg-charcoal">
              <img
                src="https://images.unsplash.com/photo-1610030469983-98e550d6193c?auto=format&fit=crop&w=950&q=85"
                onerror="this.src='https://placehold.co/700x850/741C2C/E5C77B?text=Busana+Adat+Nusantara+Kencana+Wastra'"
                alt="Model mengenakan busana adat tradisional berhiaskan sulaman emas"
                class="w-full h-full object-cover hover:scale-105 transition-transform duration-700"
              />
              <div class="absolute inset-0 bg-gradient-to-t from-charcoal/90 via-transparent to-ruby/20"></div>
              <div class="absolute bottom-6 left-6 right-6 text-ivory">
                <span class="px-3 py-1 rounded-full bg-gold text-charcoal text-[11px] font-extrabold uppercase tracking-wider">
                  Signature Royal Collection
                </span>
                <h2 class="font-serif text-2xl font-bold text-champagne mt-2">
                  Kebaya Agung & Songket Kencana
                </h2>
                <p class="text-xs text-ivory/80 mt-0.5">
                  Lengkap dengan mahkota, selendang tenun tangan & perhiasan sepuh emas.
                </p>
              </div>
            </div>

            <!-- Floating Card 1: Aksesoris Suntiang / Mahkota -->
            <div class="hidden sm:flex items-center gap-3 absolute top-10 -left-8 bg-ivory text-charcoal p-3 rounded-2xl shadow-2xl border-2 border-gold animate-float-royal max-w-[235px]">
              <div class="w-12 h-12 rounded-xl bg-ruby text-champagne flex items-center justify-center flex-shrink-0">
                <!-- SVG Mahkota / Siger -->
                <svg class="w-8 h-8" viewBox="0 0 48 48" fill="none">
                  <path d="M8 34L12 16L20 24L24 10L28 24L36 16L40 34H8Z" stroke="currentColor" stroke-width="2.5" fill="rgba(229,199,123,0.25)"/>
                  <path d="M8 38H40" stroke="#C99A3C" stroke-width="3" stroke-linecap="round"/>
                </svg>
              </div>
              <div>
                <p class="text-[10px] font-extrabold uppercase tracking-wider text-crimson">Full Accessories</p>
                <p class="text-xs font-bold text-charcoal leading-snug">Sanggul, Suntiang, Keris & Perhiasan Lengkap</p>
              </div>
            </div>

            <!-- Floating Card 2: Couple & Family Ensemble -->
            <div class="hidden sm:flex items-center gap-3 absolute -bottom-5 -right-5 bg-charcoal text-ivory p-3.5 rounded-2xl shadow-2xl border-2 border-champagne animate-float-reverse max-w-[250px]">
              <img
                src="https://images.unsplash.com/photo-1583939003579-730e3918a45a?auto=format&fit=crop&w=300&q=80"
                onerror="this.src='https://placehold.co/120x120/A52A3A/F8F0DF?text=Couple+Adat'"
                alt="Pasangan busana adat pernikahan"
                class="w-14 h-14 rounded-xl object-cover border border-gold flex-shrink-0"
              />
              <div>
                <p class="text-[10px] font-extrabold uppercase tracking-wider text-champagne">Couple & Family</p>
                <p class="text-xs font-bold leading-snug">Paket Seragam Keluarga & Pengantin Adat</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ==================== ANIMATED ROYAL GOLD MARQUEE RIBBON ==================== -->
  <div class="bg-charcoal border-y-2 border-gold/60 py-3.5 overflow-hidden text-champagne">
    <div class="animate-marquee flex items-center gap-8 text-xs sm:text-sm font-royal tracking-[0.2em] uppercase">
      <span>✦ ACEH ULEE BALANG</span>
      <span>✦ MINANGKABAU SUNTIANG</span>
      <span>✦ JAWA KERATON & SUNDA SIGER</span>
      <span>✦ BALI PAYAS AGUNG</span>
      <span>✦ DAYAK & BUGIS BODO</span>
      <span>✦ MALUKU CELE & PAPUA CENDERAWASIH</span>
      <span>✦ JAPAN FURISODE KIMONO</span>
      <span>✦ SOUTH KOREA ROYAL HANBOK</span>
      <span>✦ NETHERLANDS VOLENDAM</span>
      <span>✦ IMPERIAL HANFU & OTTOMAN KAFTAN</span>
      <span>✦ ACEH ULEE BALANG</span>
      <span>✦ MINANGKABAU SUNTIANG</span>
      <span>✦ JAWA KERATON & SUNDA SIGER</span>
      <span>✦ BALI PAYAS AGUNG</span>
      <span>✦ DAYAK & BUGIS BODO</span>
      <span>✦ MALUKU CELE & PAPUA CENDERAWASIH</span>
      <span>✦ JAPAN FURISODE KIMONO</span>
      <span>✦ SOUTH KOREA ROYAL HANBOK</span>
      <span>✦ NETHERLANDS VOLENDAM</span>
      <span>✦ IMPERIAL HANFU & OTTOMAN KAFTAN</span>
    </div>
  </div>

  <!-- ==================== COSTUME COLLECTION & REGIONAL / INTERNATIONAL FILTERS ==================== -->
  <section id="koleksi-section" data-section="koleksi" class="py-20 kawung-bg relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <!-- Section Header -->
      <div class="text-center max-w-3xl mx-auto mb-10 reveal">
        <span class="inline-block px-4 py-1.5 rounded-full bg-ruby/10 border border-ruby/30 text-ruby font-bold text-xs uppercase tracking-widest mb-3">
          Katalog Pusaka Nusantara & Budaya Dunia
        </span>
        <h2 class="font-royal text-3xl sm:text-4xl font-bold text-charcoal">
          Koleksi Busana Adat <span class="text-ruby">Sabang–Merauke & Mancanegara</span>
        </h2>
        <p class="mt-3 text-charcoal/80 text-sm sm:text-base">
          Jelajahi kurasi autentik seluruh provinsi Indonesia dari Aceh hingga Papua serta busana tradisional negara viral seperti Jepang, Korea Selatan, Belanda, Tiongkok, India, Turki & Skotlandia.
        </p>
      </div>

      <!-- Realm Switcher: Semua | Nusantara (Sabang-Merauke) | Mancanegara (Viral World Heritage) -->
      <div class="flex flex-wrap justify-center gap-3 mb-6 reveal">
        <button onclick="setRealmFilter('All')" data-realm="All" class="realm-btn px-6 py-3 rounded-full text-xs font-extrabold uppercase tracking-wider transition-all bg-ruby text-champagne border-2 border-gold shadow-lg">
          👑 Semua Koleksi (25+ Mahakarya)
        </button>
        <button onclick="setRealmFilter('Nusantara')" data-realm="Nusantara" class="realm-btn px-6 py-3 rounded-full text-xs font-extrabold uppercase tracking-wider transition-all bg-white text-charcoal hover:bg-ruby/10 border-2 border-gold/50">
          🇮🇩 Nusantara (Sabang – Merauke)
        </button>
        <button onclick="setRealmFilter('Mancanegara')" data-realm="Mancanegara" class="realm-btn px-6 py-3 rounded-full text-xs font-extrabold uppercase tracking-wider transition-all bg-white text-charcoal hover:bg-ruby/10 border-2 border-gold/50">
          🌏 Mancanegara Viral (Jepang, Korea, Belanda & Dunia)
        </button>
      </div>

      <!-- Regional / Country Sub-Category Pills -->
      <div class="flex flex-wrap justify-center gap-2 sm:gap-2.5 mb-6 reveal" id="region-filters">
        <button onclick="setRegionFilter('All')" data-region="All" class="region-btn px-4 py-2 rounded-full text-xs font-bold transition-all bg-charcoal text-champagne border border-gold shadow">
          Semua Wilayah / Negara
        </button>
        <button onclick="setRegionFilter('Sumatra')" data-region="Sumatra" class="region-btn px-4 py-2 rounded-full text-xs font-bold transition-all bg-white text-charcoal hover:bg-ruby/10 border border-gold/40">
          Sumatra (Aceh – Lampung)
        </button>
        <button onclick="setRegionFilter('Jawa & Sunda')" data-region="Jawa & Sunda" class="region-btn px-4 py-2 rounded-full text-xs font-bold transition-all bg-white text-charcoal hover:bg-ruby/10 border border-gold/40">
          Jawa, Sunda & Betawi
        </button>
        <button onclick="setRegionFilter('Bali & Nusa Tenggara')" data-region="Bali & Nusa Tenggara" class="region-btn px-4 py-2 rounded-full text-xs font-bold transition-all bg-white text-charcoal hover:bg-ruby/10 border border-gold/40">
          Bali, NTB & NTT
        </button>
        <button onclick="setRegionFilter('Kalimantan')" data-region="Kalimantan" class="region-btn px-4 py-2 rounded-full text-xs font-bold transition-all bg-white text-charcoal hover:bg-ruby/10 border border-gold/40">
          Kalimantan (Dayak & Kutai)
        </button>
        <button onclick="setRegionFilter('Sulawesi')" data-region="Sulawesi" class="region-btn px-4 py-2 rounded-full text-xs font-bold transition-all bg-white text-charcoal hover:bg-ruby/10 border border-gold/40">
          Sulawesi (Bugis, Toraja, Minahasa)
        </button>
        <button onclick="setRegionFilter('Maluku & Papua')" data-region="Maluku & Papua" class="region-btn px-4 py-2 rounded-full text-xs font-bold transition-all bg-white text-charcoal hover:bg-ruby/10 border border-gold/40">
          Maluku & Papua
        </button>
        <button onclick="setRegionFilter('Asia Timur')" data-region="Asia Timur" class="region-btn px-4 py-2 rounded-full text-xs font-bold transition-all bg-white text-charcoal hover:bg-ruby/10 border border-gold/40">
          🇯🇵🇰🇷🇨🇳 Jepang, Korea & Tiongkok
        </button>
        <button onclick="setRegionFilter('Eropa & Timur Tengah')" data-region="Eropa & Timur Tengah" class="region-btn px-4 py-2 rounded-full text-xs font-bold transition-all bg-white text-charcoal hover:bg-ruby/10 border border-gold/40">
          🇳🇱🇮🇳🇹🇷 Belanda, India, Turki & Skotlandia
        </button>
      </div>

      <!-- Event Category & Search Sub-Filter -->
      <div class="flex flex-wrap items-center justify-center gap-3 mb-10 reveal">
        <div class="flex items-center gap-2">
          <span class="text-xs font-bold text-charcoal/70">Filter Acara:</span>
          <select id="event-filter" onchange="renderCostumeGrid()" class="px-4 py-2.5 rounded-xl bg-white border border-gold/60 text-xs font-bold text-charcoal focus:outline-none focus:border-ruby">
            <option value="All">Semua Acara (Pernikahan, Wisuda, Festival, Photoshoot)</option>
            <option value="Pernikahan Adat">Pernikahan Adat</option>
            <option value="Wisuda">Wisuda & Kartinian</option>
            <option value="Festival Budaya">Festival Budaya & Karnaval</option>
            <option value="Photoshoot">Prewedding, Travel & Studio Photoshoot</option>
            <option value="Pertunjukan">Pertunjukan Seni & Tari</option>
          </select>
        </div>
        <div class="relative w-full sm:w-72">
          <input
            id="costume-search"
            type="text"
            oninput="renderCostumeGrid()"
            placeholder="Cari: Aceh, Kimono, Hanbok, Volendam, Papua..."
            class="w-full px-4 py-2.5 rounded-xl bg-white border border-gold/60 text-xs font-semibold text-charcoal focus:outline-none focus:border-ruby"
          />
        </div>
      </div>

      <!-- Costumes Grid -->
      <div id="costume-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-7 reveal">
        <div class="col-span-full rounded-3xl border border-gold/40 bg-white p-6 text-center text-sm text-charcoal/70">Katalog busana sedang disiapkan. Muat ulang halaman apabila koleksi belum tampil.</div>
      </div>
    </div>
  </section>

  <!-- ==================== ACCESSORIES COLLECTION & COUPLE / FAMILY SHOWCASE ==================== -->
  <section id="aksesoris-couple-section" data-section="paket" class="py-20 bg-white border-y border-gold/30">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <!-- Part A: Accessories Collection -->
      <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 gap-4 reveal">
        <div>
          <span class="text-xs font-extrabold uppercase tracking-widest text-crimson">Pelengkap Keagungan Busana</span>
          <h2 class="font-royal text-3xl sm:text-4xl font-bold text-charcoal mt-1">
            Koleksi <span class="text-ruby">Aksesoris & Pusaka</span>
          </h2>
          <p class="text-sm text-charcoal/75 mt-1 max-w-2xl">
            Tersedia termasuk dalam paket Complete/Premium atau dapat disewa terpisah sebagai pelengkap busana pribadi Anda.
          </p>
        </div>
        <a href="#reservasi-section" class="self-start md:self-auto px-5 py-2.5 rounded-full bg-ivory hover:bg-gold/25 border border-gold text-xs font-bold text-charcoal transition-all">
          Tambah Aksesoris di Form Sewa →
        </a>
      </div>

      <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4 mb-20 reveal">
        <!-- Accessory 1 -->
        <div class="group bg-ivory/70 rounded-3xl p-4 border border-gold/40 hover:border-ruby transition-all text-center hover:-translate-y-1">
          <div class="w-16 h-16 mx-auto rounded-2xl bg-ruby text-champagne flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
            <svg class="w-9 h-9" viewBox="0 0 48 48" fill="none">
              <path d="M6 34L12 14L20 24L24 8L28 24L36 14L42 34H6Z" stroke="currentColor" stroke-width="2.5"/>
              <circle cx="24" cy="27" r="3" fill="#E5C77B"/>
            </svg>
          </div>
          <h4 class="font-serif font-bold text-sm text-charcoal">Mahkota & Suntiang</h4>
          <p class="text-[11px] text-charcoal/70 mt-1">Siger Sunda, Suntiang Minang, Gelung Agung Bali</p>
          <span class="inline-block mt-2.5 text-[11px] font-extrabold text-ruby">+Rp 120.000</span>
        </div>

        <!-- Accessory 2 -->
        <div class="group bg-ivory/70 rounded-3xl p-4 border border-gold/40 hover:border-ruby transition-all text-center hover:-translate-y-1">
          <div class="w-16 h-16 mx-auto rounded-2xl bg-ruby text-champagne flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
            <svg class="w-9 h-9" viewBox="0 0 48 48" fill="none">
              <ellipse cx="24" cy="26" rx="15" ry="11" stroke="currentColor" stroke-width="2.5"/>
              <path d="M12 15L36 37M36 15L12 37" stroke="#E5C77B" stroke-width="2" stroke-linecap="round"/>
            </svg>
          </div>
          <h4 class="font-serif font-bold text-sm text-charcoal">Sanggul & Cunduk</h4>
          <p class="text-[11px] text-charcoal/70 mt-1">Sanggul Tekuk Jawa, Cunduk Mentul & Bunga Melati</p>
          <span class="inline-block mt-2.5 text-[11px] font-extrabold text-ruby">+Rp 85.000</span>
        </div>

        <!-- Accessory 3 -->
        <div class="group bg-ivory/70 rounded-3xl p-4 border border-gold/40 hover:border-ruby transition-all text-center hover:-translate-y-1">
          <div class="w-16 h-16 mx-auto rounded-2xl bg-ruby text-champagne flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
            <svg class="w-9 h-9" viewBox="0 0 48 48" fill="none">
              <path d="M24 6L28 16L22 24L27 32L24 42" stroke="currentColor" stroke-width="2.8" stroke-linecap="round"/>
              <path d="M17 14H31" stroke="#E5C77B" stroke-width="3" stroke-linecap="round"/>
            </svg>
          </div>
          <h4 class="font-serif font-bold text-sm text-charcoal">Keris Replika & Rencong</h4>
          <p class="text-[11px] text-charcoal/70 mt-1">Keris Ladrang Solo, Gayaman Jogja & Mandau Hias</p>
          <span class="inline-block mt-2.5 text-[11px] font-extrabold text-ruby">+Rp 95.000</span>
        </div>

        <!-- Accessory 4 -->
        <div class="group bg-ivory/70 rounded-3xl p-4 border border-gold/40 hover:border-ruby transition-all text-center hover:-translate-y-1">
          <div class="w-16 h-16 mx-auto rounded-2xl bg-ruby text-champagne flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
            <svg class="w-9 h-9" viewBox="0 0 48 48" fill="none">
              <path d="M10 30C10 20 16 14 24 14C32 14 38 20 38 30H10Z" stroke="currentColor" stroke-width="2.5"/>
              <path d="M16 22L24 16L32 22" stroke="#E5C77B" stroke-width="2"/>
            </svg>
          </div>
          <h4 class="font-serif font-bold text-sm text-charcoal">Blangkon, Udeng & Cap</h4>
          <p class="text-[11px] text-charcoal/70 mt-1">Blangkon, Udeng Bali, Tanjak Melayu, Gat Korea & Volendam Lace Cap</p>
          <span class="inline-block mt-2.5 text-[11px] font-extrabold text-ruby">+Rp 65.000</span>
        </div>

        <!-- Accessory 5 -->
        <div class="group bg-ivory/70 rounded-3xl p-4 border border-gold/40 hover:border-ruby transition-all text-center hover:-translate-y-1">
          <div class="w-16 h-16 mx-auto rounded-2xl bg-ruby text-champagne flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
            <svg class="w-9 h-9" viewBox="0 0 48 48" fill="none">
              <path d="M12 10C18 18 14 30 22 38M26 10C32 18 28 30 36 38" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
            </svg>
          </div>
          <h4 class="font-serif font-bold text-sm text-charcoal">Selendang, Obi & Noken</h4>
          <p class="text-[11px] text-charcoal/70 mt-1">Songket Palembang, Tenun NTT, Obi Silk Jepang & Noken Papua</p>
          <span class="inline-block mt-2.5 text-[11px] font-extrabold text-ruby">+Rp 110.000</span>
        </div>

        <!-- Accessory 6 -->
        <div class="group bg-ivory/70 rounded-3xl p-4 border border-gold/40 hover:border-ruby transition-all text-center hover:-translate-y-1">
          <div class="w-16 h-16 mx-auto rounded-2xl bg-ruby text-champagne flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
            <svg class="w-9 h-9" viewBox="0 0 48 48" fill="none">
              <path d="M12 14C12 26 18 34 24 34C30 34 36 26 36 14" stroke="currentColor" stroke-width="2.5"/>
              <circle cx="24" cy="34" r="4" fill="#E5C77B"/>
            </svg>
          </div>
          <h4 class="font-serif font-bold text-sm text-charcoal">Perhiasan & Properti</h4>
          <p class="text-[11px] text-charcoal/70 mt-1">Kalung Susun, Kipas Sensu Jepang, Binyeo Korea & Klompen Belanda</p>
          <span class="inline-block mt-2.5 text-[11px] font-extrabold text-ruby">+Rp 90.000</span>
        </div>
      </div>

      <!-- Part B: Couple, Family & Customization Banner -->
      <div class="rounded-[2.2rem] bg-gradient-to-r from-ruby via-[#681827] to-charcoal text-ivory p-7 sm:p-11 border-2 border-gold shadow-2xl relative overflow-hidden reveal">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center relative z-10">
          <div class="lg:col-span-7 space-y-4">
            <span class="inline-block px-3.5 py-1 rounded-full bg-gold text-charcoal text-xs font-extrabold uppercase tracking-wider">
              Couple, Family & Custom Bespoke
            </span>
            <h3 class="font-royal text-2xl sm:text-4xl font-bold text-champagne leading-tight">
              Koleksi Busana Pasangan & Seragam Keluarga Besar
            </h3>
            <p class="text-sm text-ivory/85 leading-relaxed">
              Selaraskan motif kain pasangan (Sarimbit) hingga 15 anggota keluarga besar (Orang Tua, Anak, Besan, dan Pagar Ayu/Bagus). Tersedia layanan <strong>Custom Alteration</strong> (penyesuaian panjang lengan, lingkar pinggang, dan padu padan aksesoris) tanpa merusak kain asli.
            </p>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 pt-2 text-xs">
              <div class="bg-white/10 p-3.5 rounded-2xl border border-gold/30">
                <p class="font-bold text-champagne">💑 Sarimbit Pengantin</p>
                <p class="text-ivory/75 mt-1">Sepasang busana pengantin + aksesoris lengkap.</p>
              </div>
              <div class="bg-white/10 p-3.5 rounded-2xl border border-gold/30">
                <p class="font-bold text-champagne">👨‍👩‍👧‍👦 Family Ensemble</p>
                <p class="text-ivory/75 mt-1">Diskon hingga 20% untuk sewa minimal 4 set keluarga.</p>
              </div>
              <div class="bg-white/10 p-3.5 rounded-2xl border border-gold/30">
                <p class="font-bold text-champagne">🪡 Custom Fitting</p>
                <p class="text-ivory/75 mt-1">Penyesuaian ukuran sementara oleh penjahit atelier.</p>
              </div>
            </div>
            <div class="pt-3 flex flex-wrap gap-3">
              <button onclick="selectPackageAndScroll('Couple / Family Ensemble Package - Mulai Rp 950.000')" class="px-6 py-3.5 rounded-full bg-gold hover:bg-champagne text-charcoal font-extrabold text-xs uppercase tracking-wider transition-all">
                Reservasi Paket Couple / Keluarga
              </button>
              <button onclick="openConsultationModal()" class="px-6 py-3.5 rounded-full border border-champagne text-champagne hover:bg-white/10 font-bold text-xs uppercase tracking-wider transition-all">
                Jadwalkan Styling Consultation
              </button>
            </div>
          </div>

          <div class="lg:col-span-5">
            <div class="relative rounded-3xl overflow-hidden border-2 border-gold shadow-xl aspect-[4/3]">
              <img
                src="https://images.unsplash.com/photo-1583939003579-730e3918a45a?auto=format&fit=crop&w=900&q=85"
                onerror="this.src='https://placehold.co/700x520/A52A3A/E5C77B?text=Couple+dan+Family+Collection'"
                alt="Pasangan mengenakan busana pernikahan adat"
                class="w-full h-full object-cover"
              />
              <div class="absolute bottom-3 left-3 right-3 bg-charcoal/85 backdrop-blur-sm px-4 py-2.5 rounded-2xl border border-gold/40 text-xs flex items-center justify-between">
                <span class="font-bold text-champagne">Tersedia Ukuran Anak (3 Thn) – XXXL</span>
                <span class="text-ivory/80">Ready Stock</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ==================== CULTURAL HERITAGE STORY (FILOSOFI MOTIF & RUMAH ADAT) ==================== -->
  <section id="filosofi-section" data-section="filosofi" class="py-20 bg-ivory kawung-bg relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center max-w-3xl mx-auto mb-12 reveal">
        <span class="inline-block px-4 py-1.5 rounded-full bg-ruby/10 border border-ruby/30 text-ruby font-bold text-xs uppercase tracking-widest mb-3">
          Cultural Heritage Story
        </span>
        <h2 class="font-royal text-3xl sm:text-4xl font-bold text-charcoal">
          Filosofi Wastra & <span class="text-ruby">Arsitektur Rumah Adat</span>
        </h2>
        <p class="mt-3 text-charcoal/80 text-sm sm:text-base">
          Setiap busana adat yang Anda kenakan menyimpan doa, status kearifan lokal, dan kisah peradaban Nusantara. Jelajahi cerita di baliknya:
        </p>
      </div>

              <!-- Quick Suggestion Chips -->
      <div class="px-3 py-2 bg-white border-t border-gold/30 flex gap-1.5 overflow-x-auto">
        <button onclick="askWastraAI('Rekomendasi busana pernikahan adat Jawa, Minang & Sunda')" class="whitespace-nowrap px-3 py-1.5 rounded-full bg-ivory hover:bg-ruby hover:text-champagne text-charcoal border border-gold/50 font-bold text-[11px] transition-colors">
          💍 Nikah Adat
        </button>
        <button onclick="askWastraAI('Rekomendasi Kimono Jepang, Hanbok Korea & Volendam Belanda')" class="whitespace-nowrap px-3 py-1.5 rounded-full bg-ivory hover:bg-ruby hover:text-champagne text-charcoal border border-gold/50 font-bold text-[11px] transition-colors">
          🌏 Jepang/Korea/Belanda
        </button>
        <button onclick="askWastraAI('Koleksi busana adat dari Sabang Aceh sampai Merauke Papua')" class="whitespace-nowrap px-3 py-1.5 rounded-full bg-ivory hover:bg-ruby hover:text-champagne text-charcoal border border-gold/50 font-bold text-[11px] transition-colors">
          🇮🇩 Sabang–Merauke
        </button>
        <button onclick="askWastraAI('Berapa harga sewa dan deposit jaminan?')" class="whitespace-nowrap px-3 py-1.5 rounded-full bg-ivory hover:bg-ruby hover:text-champagne text-charcoal border border-gold/50 font-bold text-[11px] transition-colors">
          💰 Harga & Deposit
        </button>
      </div>

      <!-- Dynamic Story Display Card -->
      <div id="heritage-story-box" class="bg-white rounded-[2.2rem] p-7 sm:p-10 border-2 border-gold/50 shadow-xl reveal">
        <p class="text-sm text-charcoal/70">Cerita filosofi wastra sedang dimuat.</p>
      </div>
    </div>
  </section>

  <!-- ==================== RENTAL PACKAGES & RENTAL DURATION ==================== -->
  <section id="paket-section" data-section="paket" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center max-w-3xl mx-auto mb-12 reveal">
        <span class="inline-block px-4 py-1.5 rounded-full bg-gold/20 text-charcoal font-extrabold text-xs uppercase tracking-widest mb-3">
          Transparan & Fleksibel
        </span>
        <h2 class="font-royal text-3xl sm:text-4xl font-bold text-charcoal">
          Paket Penyewaan & <span class="text-ruby">Pilihan Durasi</span>
        </h2>
        <p class="mt-2 text-charcoal/75 text-sm">
          Pilih durasi sewa Harian, 2 Hari, atau 3 Hari untuk melihat simulasi harga setiap paket secara langsung.
        </p>

        <!-- Interactive Duration Switcher -->
        <div class="inline-flex items-center bg-ivory p-1.5 rounded-full border border-gold/60 mt-6 shadow-sm">
          <button onclick="setPricingDuration(1)" data-dur="1" class="dur-btn px-4 py-2 rounded-full text-xs font-bold bg-ruby text-champagne transition-all">
            Harian (1 Hari)
          </button>
          <button onclick="setPricingDuration(2)" data-dur="2" class="dur-btn px-4 py-2 rounded-full text-xs font-bold text-charcoal hover:text-ruby transition-all">
            2 Hari (Hemat 15%)
          </button>
          <button onclick="setPricingDuration(3)" data-dur="3" class="dur-btn px-4 py-2 rounded-full text-xs font-bold text-charcoal hover:text-ruby transition-all">
            3 Hari Acara (Hemat 25%)
          </button>
        </div>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 reveal" id="packages-grid">
        <div class="col-span-full rounded-3xl border border-gold/40 bg-ivory p-6 text-center text-sm text-charcoal/70">Pilihan paket sedang dimuat.</div>
      </div>
    </div>
  </section>

  <!-- ==================== AVAILABILITY CALENDAR & 7-STEP RENTAL BOOKING WIZARD ==================== -->
  <section id="reservasi-section" data-section="reservasi" class="py-20 bg-gradient-to-b from-ivory via-[#F4E7CC] to-ivory relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center max-w-3xl mx-auto mb-12 reveal">
        <span class="inline-block px-4 py-1.5 rounded-full bg-ruby text-champagne font-bold text-xs uppercase tracking-widest mb-3">
          Cek Jadwal & Reservasi Instan
        </span>
        <h2 class="font-royal text-3xl sm:text-4xl font-bold text-charcoal">
          Kalender Ketersediaan & <span class="text-ruby">Reservasi 7 Langkah</span>
        </h2>
        <p class="mt-2 text-charcoal/80 text-sm">
          Periksa ketersediaan tanggal acara Anda pada kalender butik kami, lalu lengkapi 7 langkah pemesanan yang langsung terhubung ke WhatsApp Admin.
        </p>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start reveal">
        <!-- Left 4 Cols: Interactive Availability Calendar -->
        <div class="lg:col-span-4 bg-white rounded-[2rem] p-6 border-2 border-gold/60 shadow-xl">
          <div class="flex items-center justify-between mb-4">
            <div>
              <span class="text-[11px] font-extrabold uppercase tracking-wider text-crimson">Live Boutique Calendar</span>
              <h3 id="cal-month-title" class="font-royal text-lg font-bold text-charcoal">November 2026</h3>
            </div>
            <div class="flex gap-1.5">
              <button onclick="changeCalendarMonth(-1)" class="w-8 h-8 rounded-full bg-ivory hover:bg-gold/30 text-charcoal font-bold text-xs">‹</button>
              <button onclick="changeCalendarMonth(1)" class="w-8 h-8 rounded-full bg-ivory hover:bg-gold/30 text-charcoal font-bold text-xs">›</button>
            </div>
          </div>

          <!-- Days Header -->
          <div class="grid grid-cols-7 gap-1 text-center text-[11px] font-extrabold text-charcoal/60 mb-2">
            <span>Min</span><span>Sen</span><span>Sel</span><span>Rab</span><span>Kam</span><span>Jum</span><span>Sab</span>
          </div>

          <!-- Calendar Grid -->
          <div id="calendar-days-grid" class="grid grid-cols-7 gap-1.5 text-center text-xs font-bold">
            <div class="col-span-7 py-5 text-xs text-charcoal/60">Kalender sedang dimuat.</div>
          </div>

          <!-- Legend -->
          <div class="mt-5 pt-4 border-t border-gold/30 space-y-2 text-xs">
            <div class="flex items-center justify-between">
              <span class="flex items-center gap-2"><span class="w-3 h-3 rounded-full bg-emerald-500"></span> Tersedia Banyak</span>
              <span class="text-charcoal/60">Siap Sewa</span>
            </div>
            <div class="flex items-center justify-between">
              <span class="flex items-center gap-2"><span class="w-3 h-3 rounded-full bg-amber-400"></span> Slot Terbatas</span>
              <span class="text-charcoal/60">Booking Cepat</span>
            </div>
            <div class="flex items-center justify-between">
              <span class="flex items-center gap-2"><span class="w-3 h-3 rounded-full bg-rose-500"></span> Full Booked</span>
              <span class="text-charcoal/60">Penuh</span>
            </div>
          </div>

          <div id="calendar-selected-info" class="mt-4 p-3 rounded-xl bg-ivory border border-gold/50 text-xs text-charcoal">
            💡 Klik tanggal hijau/kuning untuk mengisi tanggal acara. Status kalender ini contoh tampilan; ketersediaan akhir dikonfirmasi Admin melalui WhatsApp.
          </div>
        </div>

        <!-- Right 8 Cols: 7-Step Rental Booking Wizard -->
        <div class="lg:col-span-8 bg-white rounded-[2rem] shadow-2xl border-2 border-gold/60 overflow-hidden">
          <!-- Wizard Header -->
          <div class="bg-ruby text-ivory px-6 py-5 border-b border-gold/40">
            <div class="flex items-center justify-between text-xs font-bold mb-2.5">
              <span id="wiz-step-title" class="text-champagne uppercase tracking-wider">Langkah 1 dari 7: Pilih Kategori Busana</span>
              <span id="wiz-step-pct" class="text-ivory/80">14%</span>
            </div>
            <div class="w-full h-2 bg-charcoal/60 rounded-full overflow-hidden">
              <div id="wiz-progress-bar" class="h-full bg-gradient-to-r from-gold via-champagne to-gold transition-all duration-500" style="width: 14.28%"></div>
            </div>
            <div class="grid grid-cols-7 gap-1.5 mt-3">
              <button onclick="goToRentalStep(1)" class="wiz-dot h-1.5 rounded-full bg-champagne" title="1. Kategori"></button>
              <button onclick="goToRentalStep(2)" class="wiz-dot h-1.5 rounded-full bg-white/25" title="2. Kostum"></button>
              <button onclick="goToRentalStep(3)" class="wiz-dot h-1.5 rounded-full bg-white/25" title="3. Ukuran & Paket"></button>
              <button onclick="goToRentalStep(4)" class="wiz-dot h-1.5 rounded-full bg-white/25" title="4. Tanggal & Kirim"></button>
              <button onclick="goToRentalStep(5)" class="wiz-dot h-1.5 rounded-full bg-white/25" title="5. Data Penyewa"></button>
              <button onclick="goToRentalStep(6)" class="wiz-dot h-1.5 rounded-full bg-white/25" title="6. Ringkasan"></button>
              <button onclick="goToRentalStep(7)" class="wiz-dot h-1.5 rounded-full bg-white/25" title="7. WhatsApp"></button>
            </div>
          </div>

          <!-- Wizard Steps Body -->
          <div class="p-6 sm:p-8">
            <!-- STEP 1: Pilih Kategori Busana -->
            <div id="r-step-1" class="r-step space-y-4">
              <h3 class="font-royal text-xl font-bold text-charcoal">1. Pilih Kategori Daerah & Jenis Acara</h3>
              <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                  <label class="block text-xs font-extrabold uppercase text-charcoal/70 mb-1.5">Asal Daerah / Budaya</label>
                  <select id="rb_region" onchange="syncCostumeDropdown(); updateRentalSummary();" class="w-full p-3.5 rounded-2xl bg-ivory border border-gold/60 text-sm font-bold text-charcoal focus:outline-none focus:border-ruby">
                    <option value="All">Semua Daerah Nusantara</option>
                    <option value="Jawa & Sunda">Jawa, Sunda & Betawi (Solo, Yogyakarta, Priangan)</option>
                    <option value="Bali & Nusa Tenggara">Bali & Nusa Tenggara (Payas Agung, Sasak & Sumba)</option>
                    
                    <option value="Sumatra">Sumatra (Minangkabau, Palembang, Melayu)</option>
                    <option value="Kalimantan">Kalimantan (Dayak & Banjar)</option>
                    <option value="Sulawesi">Sulawesi (Bugis Makassar & Toraja)</option>
                    <option value="Maluku & Papua">Maluku & Papua (Baju Cele, Cenderawasih & Rumbai)</option>
                  </select>
                </div>
                <div>
                  <label class="block text-xs font-extrabold uppercase text-charcoal/70 mb-1.5">Kebutuhan Acara</label>
                  <select id="rb_event" onchange="updateRentalSummary()" class="w-full p-3.5 rounded-2xl bg-ivory border border-gold/60 text-sm font-bold text-charcoal focus:outline-none focus:border-ruby">
                    <option value="Pernikahan Adat">Pernikahan Adat / Akad / Resepsi</option>
                    <option value="Wisuda">Wisuda & Hari Kartini</option>
                    <option value="Festival Budaya">Festival Budaya & Karnaval</option>
                    <option value="Photoshoot">Prewedding & Studio Photoshoot</option>
                    <option value="Pertunjukan">Pertunjukan Tari & Teater</option>
                  </select>
                </div>
              </div>
            </div>

            <!-- STEP 2: Pilih Kostum -->
            <div id="r-step-2" class="r-step hidden space-y-4">
              <h3 class="font-royal text-xl font-bold text-charcoal">2. Pilih Busana Adat</h3>
              <div>
                <label class="block text-xs font-extrabold uppercase text-charcoal/70 mb-1.5">Koleksi Kostum Tersedia</label>
                <select id="rb_costume" onchange="updateRentalSummary()" class="w-full p-3.5 rounded-2xl bg-ivory border border-gold/60 text-sm font-bold text-charcoal focus:outline-none focus:border-ruby">
                  <!-- Populated dynamically from costumesData -->
                </select>
              </div>
              <div id="rb_costume_preview" class="bg-ivory/80 rounded-2xl p-4 border border-gold/50 flex flex-col sm:flex-row gap-4 items-center">
                <!-- Preview populated by JS -->
              </div>
            </div>

            <!-- STEP 3: Pilih Ukuran, Paket & Aksesoris -->
            <div id="r-step-3" class="r-step hidden space-y-4">
              <h3 class="font-royal text-xl font-bold text-charcoal">3. Tentukan Ukuran, Jumlah & Paket Sewa</h3>
              <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div>
                  <label class="block text-xs font-extrabold uppercase text-charcoal/70 mb-1.5">Ukuran Busana</label>
                  <select id="rb_size" onchange="updateRentalSummary()" class="w-full p-3 rounded-xl bg-ivory border border-gold/60 text-xs font-bold text-charcoal">
                    <option value="S (LD 88cm)">S (LD 88cm)</option>
                    <option value="M (LD 94cm)" selected>M (LD 94cm)</option>
                    <option value="L (LD 100cm)">L (LD 100cm)</option>
                    <option value="XL (LD 108cm)">XL (LD 108cm)</option>
                    <option value="XXL - XXXL (LD 116-124cm)">XXL - XXXL (LD 116-124cm)</option>
                    <option value="Custom Fitting Atelier">Custom Fitting Atelier</option>
                  </select>
                </div>
                <div>
                  <label class="block text-xs font-extrabold uppercase text-charcoal/70 mb-1.5">Jumlah Set</label>
                  <input id="rb_qty" type="number" min="1" max="20" value="1" oninput="updateRentalSummary()" class="w-full p-3 rounded-xl bg-ivory border border-gold/60 text-xs font-bold text-charcoal" />
                </div>
                <div>
                  <label class="block text-xs font-extrabold uppercase text-charcoal/70 mb-1.5">Paket Penyewaan</label>
                  <select id="rb_package" onchange="updateRentalSummary()" class="w-full p-3 rounded-xl bg-ivory border border-gold/60 text-xs font-bold text-charcoal">
                    <option value="Basic Heritage (Busana Utama)">Basic Heritage (Busana Utama)</option>
                    <option value="Complete Royal (Busana + Aksesoris Lengkap)" selected>Complete Royal (+ Aksesoris Lengkap)</option>
                    <option value="Premium Maestro (Wastra Tulis + Fitting)">Premium Maestro (Wastra Tulis + Fitting)</option>
                    <option value="Couple / Family Ensemble">Couple / Family Ensemble</option>
                  </select>
                </div>
              </div>

              <div>
                <label class="block text-xs font-extrabold uppercase text-charcoal/70 mb-1.5">Tambahan Aksesoris Ekstra (Opsional)</label>
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-2 text-xs">
                  <label class="flex items-center gap-2 p-2.5 rounded-xl bg-ivory border border-gold/40 cursor-pointer">
                    <input type="checkbox" class="rb-addon accent-ruby" value="Mahkota/Suntiang (+Rp 120.000)" data-price="120000" onchange="updateRentalSummary()" />
                    <span>Mahkota / Suntiang</span>
                  </label>
                  <label class="flex items-center gap-2 p-2.5 rounded-xl bg-ivory border border-gold/40 cursor-pointer">
                    <input type="checkbox" class="rb-addon accent-ruby" value="Keris Replika (+Rp 95.000)" data-price="95000" onchange="updateRentalSummary()" />
                    <span>Keris Replika</span>
                  </label>
                  <label class="flex items-center gap-2 p-2.5 rounded-xl bg-ivory border border-gold/40 cursor-pointer">
                    <input type="checkbox" class="rb-addon accent-ruby" value="Selendang Songket (+Rp 110.000)" data-price="110000" onchange="updateRentalSummary()" />
                    <span>Selendang Songket</span>
                  </label>
                </div>
              </div>
            </div>

            <!-- STEP 4: Pilih Tanggal Penyewaan & Pengiriman -->
            <div id="r-step-4" class="r-step hidden space-y-4">
              <h3 class="font-royal text-xl font-bold text-charcoal">4. Tanggal Penyewaan & Metode Pengambilan</h3>
              <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div>
                  <label class="block text-xs font-extrabold uppercase text-charcoal/70 mb-1.5">Tanggal Pengambilan</label>
                  <input id="rb_pickup_date" type="date" onchange="updateRentalSummary()" class="w-full p-3 rounded-xl bg-ivory border border-gold/60 text-xs font-bold text-charcoal" />
                </div>
                <div>
                  <label class="block text-xs font-extrabold uppercase text-charcoal/70 mb-1.5">Tanggal Pemakaian Acara</label>
                  <input id="rb_event_date" type="date" onchange="updateRentalSummary()" class="w-full p-3 rounded-xl bg-ivory border border-gold/60 text-xs font-bold text-charcoal" />
                </div>
                <div>
                  <label class="block text-xs font-extrabold uppercase text-charcoal/70 mb-1.5">Tanggal Pengembalian</label>
                  <input id="rb_return_date" type="date" onchange="updateRentalSummary()" class="w-full p-3 rounded-xl bg-ivory border border-gold/60 text-xs font-bold text-charcoal" />
                </div>
              </div>

              <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2">
                <div>
                  <label class="block text-xs font-extrabold uppercase text-charcoal/70 mb-1.5">Durasi Sewa</label>
                  <select id="rb_duration" onchange="updateRentalSummary()" class="w-full p-3 rounded-xl bg-ivory border border-gold/60 text-xs font-bold text-charcoal">
                    <option value="1">Harian (1 Hari)</option>
                    <option value="2">2 Hari (Diskon 15%)</option>
                    <option value="3">3 Hari Paket Acara (Diskon 25%)</option>
                  </select>
                </div>
                <div>
                  <label class="block text-xs font-extrabold uppercase text-charcoal/70 mb-1.5">Delivery & Pickup</label>
                  <select id="rb_delivery" onchange="updateRentalSummary()" class="w-full p-3 rounded-xl bg-ivory border border-gold/60 text-xs font-bold text-charcoal">
                    <option value="Pickup Langsung di Butik Atelier (Gratis)" data-fee="0">Pickup Langsung di Butik Atelier (Gratis)</option>
                    <option value="Kurir Khusus Garment Box Jabodetabek (+Rp 50.000)" data-fee="50000">Kurir Khusus Garment Box Jabodetabek (+Rp 50.000)</option>
                    <option value="Ekspedisi Luar Kota Insured (+Rp 120.000)" data-fee="120000">Ekspedisi Luar Kota Insured (+Rp 120.000)</option>
                  </select>
                </div>
              </div>
            </div>

            <!-- STEP 5: Isi Data Penyewa -->
            <div id="r-step-5" class="r-step hidden space-y-4">
              <h3 class="font-royal text-xl font-bold text-charcoal">5. Data Lengkap Penyewa</h3>
              <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                  <label class="block text-xs font-extrabold uppercase text-charcoal/70 mb-1.5">Nama Lengkap Penyewa *</label>
                  <input id="rb_name" type="text" placeholder="Contoh: Raden Ayu Larasati" oninput="updateRentalSummary()" class="w-full p-3 rounded-xl bg-ivory border border-gold/60 text-xs font-semibold text-charcoal" />
                </div>
                <div>
                  <label class="block text-xs font-extrabold uppercase text-charcoal/70 mb-1.5">Nomor WhatsApp Aktif *</label>
                  <input id="rb_wa" type="tel" placeholder="Contoh: 081298765432" oninput="updateRentalSummary()" class="w-full p-3 rounded-xl bg-ivory border border-gold/60 text-xs font-semibold text-charcoal" />
                </div>
                <div class="sm:col-span-2">
                  <label class="block text-xs font-extrabold uppercase text-charcoal/70 mb-1.5">Alamat Lengkap (Untuk Pengiriman / Verifikasi)</label>
                  <input id="rb_address" type="text" placeholder="Contoh: Jl. Dharmawangsa Raya No. 12, Kebayoran Baru, Jakarta Selatan" oninput="updateRentalSummary()" class="w-full p-3 rounded-xl bg-ivory border border-gold/60 text-xs font-semibold text-charcoal" />
                </div>
                <div class="sm:col-span-2">
                  <label class="block text-xs font-extrabold uppercase text-charcoal/70 mb-1.5">Catatan Penyesuaian Ukuran / Tema Acara</label>
                  <input id="rb_notes" type="text" placeholder="Contoh: Tinggi badan 165cm, butuh penyesuaian panjang kain lilit & selendang maroon" oninput="updateRentalSummary()" class="w-full p-3 rounded-xl bg-ivory border border-gold/60 text-xs font-semibold text-charcoal" />
                </div>
              </div>
            </div>

            <!-- STEP 6: Ringkasan Pesanan -->
            <div id="r-step-6" class="r-step hidden space-y-4">
              <h3 class="font-royal text-xl font-bold text-charcoal">6. Ringkasan Pesanan & Estimasi Biaya</h3>
              <div id="rental-summary-box" class="bg-ivory rounded-2xl p-5 border-2 border-gold/60 space-y-3 text-xs sm:text-sm">
                <!-- Populated by JS -->
              </div>
            </div>

            <!-- STEP 7: Kirim Pesanan via WhatsApp -->
            <div id="r-step-7" class="r-step hidden space-y-4">
              <div class="text-center">
                <span class="text-3xl">📜</span>
                <h3 class="font-royal text-xl font-bold text-charcoal mt-1">7. Kirim Pesanan ke Admin Atelier</h3>
                <p class="text-xs text-charcoal/75">Seluruh detail penyewaan Anda telah terangkum rapi dan siap dikirim via WhatsApp.</p>
              </div>
              <div id="rental-wa-preview" class="bg-charcoal text-ivory/95 p-4 rounded-2xl font-mono text-xs whitespace-pre-line border border-gold/50 leading-relaxed"></div>
              <div class="flex flex-col sm:flex-row gap-3">
                <button onclick="sendRentalToWhatsApp()" class="flex-1 py-3.5 px-6 rounded-2xl bg-[#25D366] hover:bg-[#1ebe5d] text-white font-extrabold text-sm shadow-lg transition-all">
                  💬 Kirim Pesanan via WhatsApp
                </button>
                <button onclick="copyRentalWA()" class="py-3.5 px-5 rounded-2xl bg-ivory hover:bg-gold/30 text-charcoal font-bold text-xs border border-gold transition-all">
                  📋 Salin Ringkasan
                </button>
              </div>
              <p id="rental-copy-toast" class="hidden text-center text-xs font-bold text-ruby">✓ Ringkasan pesanan berhasil disalin!</p>
            </div>

            <!-- Wizard Navigation Controls -->
            <div class="flex items-center justify-between mt-7 pt-5 border-t border-gold/30">
              <button id="wiz-prev" onclick="changeRentalStep(-1)" disabled class="px-5 py-2.5 rounded-xl bg-ivory hover:bg-gold/25 text-charcoal font-bold text-xs disabled:opacity-40 transition-all">
                ← Sebelumnya
              </button>
              <button id="wiz-next" onclick="changeRentalStep(1)" class="px-6 py-2.5 rounded-xl bg-ruby hover:bg-crimson text-champagne font-bold text-xs shadow transition-all">
                Lanjut Langkah Berikutnya →
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ==================== DEPOSIT & RENTAL POLICY, REVIEWS & FAQ ==================== -->
  <section id="kebijakan-faq-section" data-section="filosofi" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <!-- Deposit & Rental Policy Cards -->
      <div class="text-center max-w-3xl mx-auto mb-12 reveal">
        <span class="inline-block px-4 py-1.5 rounded-full bg-ruby/10 text-ruby font-bold text-xs uppercase tracking-widest mb-3">
          Standar Pelayanan Atelier
        </span>
        <h2 class="font-royal text-3xl sm:text-4xl font-bold text-charcoal">
          Kebijakan Deposit, Perawatan & <span class="text-ruby">Pengembalian</span>
        </h2>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-20 reveal">
        <div class="bg-ivory/70 rounded-3xl p-6 border border-gold/50">
          <div class="w-11 h-11 rounded-2xl bg-ruby text-champagne flex items-center justify-center text-xl mb-3">💰</div>
          <h4 class="font-serif font-bold text-lg text-charcoal">Refundable Deposit</h4>
          <p class="text-xs text-charcoal/80 mt-2 leading-relaxed">
            Deposit jaminan sebesar <strong>Rp 250.000 / set</strong> (atau Rp 500.000 untuk koleksi Premium). Dikembalikan <strong>100% penuh</strong> maksimal 1x24 jam setelah kostum dicek kembali.
          </p>
        </div>

        <div class="bg-ivory/70 rounded-3xl p-6 border border-gold/50">
          <div class="w-11 h-11 rounded-2xl bg-ruby text-champagne flex items-center justify-center text-xl mb-3">✨</div>
          <h4 class="font-serif font-bold text-lg text-charcoal">Wastra Steam-Clean</h4>
          <p class="text-xs text-charcoal/80 mt-2 leading-relaxed">
            Penyewa <strong>tidak perlu mencuci</strong> kostum sebelum dikembalikan. Tim kami melakukan dry-clean & sanitasi uap khusus benang emas agar wastra tetap awet.
          </p>
        </div>

        <div class="bg-ivory/70 rounded-3xl p-6 border border-gold/50">
          <div class="w-11 h-11 rounded-2xl bg-ruby text-champagne flex items-center justify-center text-xl mb-3">⏳</div>
          <h4 class="font-serif font-bold text-lg text-charcoal">Keterlambatan & Reschedule</h4>
          <p class="text-xs text-charcoal/80 mt-2 leading-relaxed">
            Perubahan tanggal acara (Reschedule) gratis hingga H-3. Keterlambatan pengembalian tanpa konfirmasi dikenakan biaya 20% dari tarif harian per hari.
          </p>
        </div>

        <div class="bg-ivory/70 rounded-3xl p-6 border border-gold/50">
          <div class="w-11 h-11 rounded-2xl bg-ruby text-champagne flex items-center justify-center text-xl mb-3">🛡️</div>
          <h4 class="font-serif font-bold text-lg text-charcoal">Garansi Perlindungan</h4>
          <p class="text-xs text-charcoal/80 mt-2 leading-relaxed">
            Noda ringan pemakaian wajar ditanggung atelier. Kerusakan berat atau kehilangan aksesoris akan disesuaikan dengan biaya restorasi pengrajin.
          </p>
        </div>
      </div>

      <!-- Customer Reviews & Photo Gallery -->
      <div class="mb-20 reveal">
        <h3 class="font-royal text-2xl sm:text-3xl font-bold text-charcoal text-center mb-10">
          Testimoni Pelanggan & <span class="text-ruby">Momen Istimewa</span>
        </h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
          <div class="bg-ivory rounded-3xl p-6 border border-gold/50 shadow-sm">
            <div class="flex items-center gap-3 mb-4">
              <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?auto=format&fit=crop&w=200&q=80" onerror="this.src='https://placehold.co/100x100/741C2C/E5C77B?text=Nadia'" alt="Nadia & Dimas" class="w-12 h-12 rounded-full object-cover border-2 border-gold" />
              <div>
                <p class="font-bold text-sm text-charcoal">Nadia & Dimas</p>
                <p class="text-xs text-ruby font-bold">Akad Nikah Adat Sunda Siger</p>
              </div>
            </div>
            <p class="text-xs sm:text-sm text-charcoal/80 leading-relaxed">
              "Kebaya beludru dan mahkota Siger dari Kencana Wastra terlihat sangat mewah di foto pernikahan kami. Fitting-nya pas sekali di badan dan wanginya segar!"
            </p>
            <div class="mt-3 text-gold text-sm">★★★★★</div>
          </div>

          <div class="bg-ivory rounded-3xl p-6 border border-gold/50 shadow-sm">
            <div class="flex items-center gap-3 mb-4">
              <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=200&q=80" onerror="this.src='https://placehold.co/100x100/A52A3A/F8F0DF?text=Putri'" alt="Putri Maharani" class="w-12 h-12 rounded-full object-cover border-2 border-gold" />
              <div>
                <p class="font-bold text-sm text-charcoal">Putri Maharani, S.Hub.Int</p>
                <p class="text-xs text-ruby font-bold">Wisuda — Baju Kurung Songket Minang</p>
              </div>
            </div>
            <p class="text-xs sm:text-sm text-charcoal/80 leading-relaxed">
              "Sewa paket 3 hari untuk wisuda di luar kota sangat praktis karena dikirim pakai garment box rapi. Tenun songketnya asli berkilau kena cahaya!"
            </p>
            <div class="mt-3 text-gold text-sm">★★★★★</div>
          </div>

          <div class="bg-ivory rounded-3xl p-6 border border-gold/50 shadow-sm">
            <div class="flex items-center gap-3 mb-4">
              <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=200&q=80" onerror="this.src='https://placehold.co/100x100/342329/E5C77B?text=Keluarga+Wijaya'" alt="Keluarga Wijaya" class="w-12 h-12 rounded-full object-cover border-2 border-gold" />
              <div>
                <p class="font-bold text-sm text-charcoal">Keluarga Besar Bapak Wijaya</p>
                <p class="text-xs text-ruby font-bold">Family Ensemble — Payas Agung Bali</p>
              </div>
            </div>
            <p class="text-xs sm:text-sm text-charcoal/80 leading-relaxed">
              "Kami menyewa 8 set busana keluarga dengan ukuran dari anak sampai dewasa. Tim stylist membantu mencocokkan udeng, kamben, dan selendang dengan sempurna."
            </p>
            <div class="mt-3 text-gold text-sm">★★★★★</div>
          </div>
        </div>
      </div>

      <!-- FAQ Accordion -->
      <div class="max-w-3xl mx-auto reveal">
        <h3 class="font-royal text-2xl sm:text-3xl font-bold text-charcoal text-center mb-8">
          Pertanyaan yang Sering Diajukan (FAQ)
        </h3>
        <div class="space-y-3" id="faq-list">
          <p class="rounded-2xl border border-gold/40 bg-white p-4 text-sm text-charcoal/70">Informasi FAQ sedang dimuat. Muat ulang halaman jika daftar belum tampil.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ==================== ROYAL FOOTER ==================== -->
  <footer class="bg-charcoal text-ivory pt-16 pb-10 border-t-4 border-gold">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid grid-cols-1 md:grid-cols-4 gap-10 pb-12 border-b border-gold/25">
        <div class="md:col-span-2 space-y-4">
          <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-ruby border border-gold flex items-center justify-center font-royal font-bold text-champagne">KW</div>
            <span class="font-royal text-xl font-bold text-champagne">KENCANA WASTRA</span>
          </div>
          <p class="text-xs sm:text-sm text-ivory/75 max-w-md leading-relaxed">
            Atelier penyewaan busana adat & wastra tradisional Nusantara. Melestarikan keagungan budaya Indonesia untuk pernikahan, wisuda, festival, dan perhelatan istimewa Anda.
          </p>
          <p class="text-xs text-champagne font-semibold">
            📍 Jl. Gunawarman Heritage No. 45, Jakarta Selatan • Buka Setiap Hari (09.00 – 20.00 WIB)
          </p>
        </div>

        <div>
          <h4 class="font-royal font-bold text-champagne text-sm mb-3">Koleksi Daerah</h4>
          <ul class="space-y-2 text-xs text-ivory/80">
            <li><a href="#koleksi-section" onclick="switchPage('all'); setRegionFilter('Jawa & Sunda')" class="hover:text-champagne">Busana Adat Jawa & Keraton</a></li>
            <li><a href="#koleksi-section" onclick="switchPage('all'); setRegionFilter('Bali & Nusa Tenggara')" class="hover:text-champagne">Payas Agung & Madya Bali</a></li>
            <li><a href="#koleksi-section" onclick="setRegionFilter('Sumatra')" class="hover:text-champagne">Minangkabau & Palembang</a></li>
            <li><a href="#koleksi-section" onclick="switchPage('all'); setRegionFilter('Jawa & Sunda')" class="hover:text-champagne">Sunda Siger & Priangan</a></li>
            <li><a href="#koleksi-section" onclick="setRegionFilter('Sulawesi')" class="hover:text-champagne">Bugis Makassar & Toraja</a></li>
          </ul>
        </div>

        <div>
          <h4 class="font-royal font-bold text-champagne text-sm mb-3">Layanan Atelier</h4>
          <ul class="space-y-2 text-xs text-ivory/80">
            <li><button onclick="openSizeModal()" class="hover:text-champagne">Panduan Ukuran & Kalkulator</button></li>
            <li><button onclick="openConsultationModal()" class="hover:text-champagne">Styling Consultation & Fitting</button></li>
            <li><a href="#reservasi-section" class="hover:text-champagne">Kalender & Reservasi 7 Langkah</a></li>
            <li><a href="#kebijakan-faq-section" class="hover:text-champagne">Kebijakan Deposit & Pengiriman</a></li>
          </ul>
        </div>
      </div>
      <div class="pt-6 flex flex-col sm:flex-row items-center justify-between text-xs text-ivory/55 gap-3">
        <p>© 2026 Kencana Wastra — Royal Traditional Costume & Heritage Atelier.</p>
        <p>Preserving Indonesian Heritage with Regal Elegance.</p>
      </div>
      <p class="mt-5 text-center text-[10px] text-ivory/40 tracking-wide">Made with care ♡ · Website template by WEBIA</p>
    </div>
  </footer>

  <!-- ==================== MODAL 1: COSTUME DETAIL & MULTI-ANGLE GALLERY ==================== -->
  <div id="costume-detail-modal" class="fixed inset-0 z-50 hidden items-center justify-center bg-charcoal/80 backdrop-blur-sm p-4 overflow-y-auto">
    <div class="bg-ivory rounded-[2rem] max-w-4xl w-full border-2 border-gold shadow-2xl overflow-hidden my-8 relative">
      <button onclick="closeCostumeModal()" class="absolute top-4 right-4 z-20 w-10 h-10 rounded-full bg-ruby text-champagne hover:bg-crimson font-bold flex items-center justify-center shadow-lg">
        ✕
      </button>
      <div id="costume-modal-content" class="p-6 sm:p-8">
        <!-- Populated dynamically -->
      </div>
    </div>
  </div>

  <!-- ==================== MODAL 2: INTERACTIVE SIZE GUIDE & CALCULATOR ==================== -->
  <div id="size-modal" class="fixed inset-0 z-50 hidden items-center justify-center bg-charcoal/80 backdrop-blur-sm p-4 overflow-y-auto">
    <div class="bg-ivory rounded-[2rem] max-w-2xl w-full p-6 sm:p-8 border-2 border-gold shadow-2xl relative my-8">
      <button onclick="closeSizeModal()" class="absolute top-5 right-5 w-9 h-9 rounded-full bg-ruby text-champagne font-bold flex items-center justify-center">✕</button>
      <span class="text-xs font-extrabold uppercase tracking-widest text-crimson">Atelier Fitting Standard</span>
      <h3 class="font-royal text-2xl font-bold text-charcoal mt-1">Panduan Ukuran Busana Adat</h3>
      <p class="text-xs text-charcoal/75 mt-1 mb-5">Gunakan tabel standar atau masukkan ukuran tubuh Anda untuk rekomendasi ukuran terbaik.</p>

      <!-- Quick Size Finder -->
      <div class="bg-white p-4 rounded-2xl border border-gold/50 mb-5 grid grid-cols-1 sm:grid-cols-3 gap-3 items-end">
        <div>
          <label class="block text-[11px] font-bold text-charcoal/70 mb-1">Lingkar Dada (cm)</label>
          <input id="calc-chest" type="number" placeholder="94" class="w-full p-2.5 rounded-xl bg-ivory border border-gold/50 text-xs font-bold" />
        </div>
        <div>
          <label class="block text-[11px] font-bold text-charcoal/70 mb-1">Tinggi Badan (cm)</label>
          <input id="calc-height" type="number" placeholder="165" class="w-full p-2.5 rounded-xl bg-ivory border border-gold/50 text-xs font-bold" />
        </div>
        <button onclick="recommendSize()" class="py-2.5 px-4 rounded-xl bg-ruby text-champagne font-bold text-xs hover:bg-crimson transition-all">
          Cek Rekomendasi Ukuran
        </button>
        <p id="size-rec-output" class="sm:col-span-3 text-xs font-bold text-ruby hidden"></p>
      </div>

      <!-- Measurement Table -->
      <div class="overflow-x-auto rounded-2xl border border-gold/50 bg-white">
        <table class="w-full text-left text-xs">
          <thead class="bg-ruby text-champagne font-royal">
            <tr>
              <th class="p-3">Ukuran</th>
              <th class="p-3">Lingkar Dada</th>
              <th class="p-3">Lingkar Pinggang</th>
              <th class="p-3">Panjang Baju</th>
              <th class="p-3">Tinggi Badan</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gold/25 font-medium text-charcoal">
            <tr><td class="p-3 font-bold">S</td><td class="p-3">86 – 88 cm</td><td class="p-3">68 – 72 cm</td><td class="p-3">65 cm</td><td class="p-3">150 – 158 cm</td></tr>
            <tr><td class="p-3 font-bold">M</td><td class="p-3">92 – 94 cm</td><td class="p-3">74 – 78 cm</td><td class="p-3">68 cm</td><td class="p-3">158 – 165 cm</td></tr>
            <tr><td class="p-3 font-bold">L</td><td class="p-3">98 – 100 cm</td><td class="p-3">80 – 84 cm</td><td class="p-3">71 cm</td><td class="p-3">163 – 172 cm</td></tr>
            <tr><td class="p-3 font-bold">XL</td><td class="p-3">106 – 108 cm</td><td class="p-3">88 – 92 cm</td><td class="p-3">74 cm</td><td class="p-3">168 – 178 cm</td></tr>
            <tr><td class="p-3 font-bold">XXL–XXXL</td><td class="p-3">114 – 124 cm</td><td class="p-3">96 – 106 cm</td><td class="p-3">76 cm</td><td class="p-3">170 – 185 cm</td></tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- ==================== MODAL 3: STYLING CONSULTATION ==================== -->
  <div id="consult-modal" class="fixed inset-0 z-50 hidden items-center justify-center bg-charcoal/80 backdrop-blur-sm p-4">
    <div class="bg-ivory rounded-[2rem] max-w-md w-full p-6 sm:p-8 border-2 border-gold shadow-2xl relative">
      <button onclick="closeConsultationModal()" class="absolute top-5 right-5 w-9 h-9 rounded-full bg-ruby text-champagne font-bold flex items-center justify-center">✕</button>
      <span class="text-xs font-extrabold uppercase tracking-widest text-crimson">Private Atelier Stylist</span>
      <h3 class="font-royal text-2xl font-bold text-charcoal mt-1">Konsultasi Styling & Fitting</h3>
      <p class="text-xs text-charcoal/75 mt-1 mb-4">Diskusikan tema acara, warna dekorasi, dan kecocokan busana adat dengan kurator wastra kami.</p>
      <div class="space-y-3 text-xs">
        <input id="cons-name" type="text" placeholder="Nama Anda" class="w-full p-3 rounded-xl bg-white border border-gold/60 font-semibold" />
        <input id="cons-theme" type="text" placeholder="Tema Acara (Misal: Akad Adat Jawa / Wisuda)" class="w-full p-3 rounded-xl bg-white border border-gold/60 font-semibold" />
        <input id="cons-date" type="date" class="w-full p-3 rounded-xl bg-white border border-gold/60 font-semibold" />
        <button onclick="sendConsultationWA()" class="w-full py-3.5 rounded-xl bg-ruby hover:bg-crimson text-champagne font-extrabold uppercase tracking-wider shadow">
          Hubungi Stylist via WhatsApp →
        </button>
      </div>
    </div>
  </div>

  <!-- ==================== FLOATING WHATSAPP & UNIQUE AI CHATBOT ("KANJENG WASTRA AI") ==================== -->
  <!-- Floating WhatsApp Button (Bottom Left) -->
  <a
    href="https://wa.me/6281234567890?text=Halo%20Admin%20Kencana%20Wastra%20Atelier!%20Saya%20ingin%20konsultasi%20penyewaan%20busana%20adat."
    target="_blank"
    rel="noopener noreferrer"
    aria-label="Konsultasi WhatsApp"
    class="fixed bottom-5 left-5 z-40 flex items-center gap-2.5 bg-[#25D366] hover:bg-[#1ebe5d] text-white px-4 py-3.5 rounded-full shadow-2xl transition-transform hover:scale-105"
  >
    <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
      <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.662.591 1.221.774 1.394.86s.274.072.376-.043c.101-.116.433-.506.549-.68.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.045.072.045.419-.1.824z"/>
    </svg>
    <span class="hidden sm:inline font-bold text-xs tracking-wide">Concierge WhatsApp</span>
  </a>

  <!-- Unique Floating AI Chatbot: "Kanjeng Wastra AI" (Royal Crown & Gunungan Emblem - Bottom Right) -->
  <div class="fixed bottom-5 right-5 z-50">
    <!-- Chat Window -->
    <div id="ai-wastra-window" class="hidden mb-3 w-[340px] sm:w-[390px] bg-ivory rounded-[2rem] shadow-2xl border-2 border-gold overflow-hidden">
      <!-- Royal Ruby & Gold Header -->
      <div class="bg-gradient-to-r from-ruby via-crimson to-charcoal text-ivory p-4 flex items-center justify-between border-b border-gold/50">
        <div class="flex items-center gap-3">
          <div class="w-11 h-11 rounded-2xl bg-gradient-to-br from-gold to-champagne flex items-center justify-center shadow-inner relative">
            <!-- Custom Royal Crown Mascot SVG -->
            <svg class="w-7 h-7 text-charcoal" viewBox="0 0 48 48" fill="none">
              <path d="M8 33L12 15L20 23L24 10L28 23L36 15L40 33H8Z" stroke="currentColor" stroke-width="2.5" fill="rgba(116,28,44,0.18)"/>
              <circle cx="24" cy="26" r="2.5" fill="#741C2C"/>
              <path d="M9 37H39" stroke="#741C2C" stroke-width="2.8" stroke-linecap="round"/>
            </svg>
            <span class="absolute -bottom-1 -right-1 w-3.5 h-3.5 rounded-full bg-[#25D366] border-2 border-charcoal"></span>
          </div>
          <div>
            <h4 class="font-royal font-bold text-sm text-champagne">Kanjeng Wastra AI 👑</h4>
            <p class="text-[11px] text-ivory/85">Kurator Virtual Busana Adat & Ukuran</p>
          </div>
        </div>
        <button onclick="toggleWastraAI()" class="w-8 h-8 rounded-full bg-white/15 hover:bg-white/25 flex items-center justify-center text-champagne font-bold">
          ✕
        </button>
      </div>

      <!-- Messages Feed -->
      <div id="wastra-ai-feed" class="h-72 overflow-y-auto p-4 space-y-3 bg-ivory kawung-bg text-xs sm:text-sm">
        <div class="bg-white p-3.5 rounded-2xl rounded-tl-none border border-gold/50 shadow-sm text-charcoal leading-relaxed">
          Sugeng Rawuh di <strong>Kencana Wastra</strong> 👑✨ Saya <em>Kanjeng Wastra AI</em>. Sebutkan <strong>daerah asal, jenis acara (nikah/wisuda/festival), atau ukuran Anda</strong>—akan saya pilihkan busana adat terbaik!
        </div>
      </div>

      <!-- Quick Suggestion Chips -->
      <div class="px-3 py-2 bg-white border-t border-gold/30 flex gap-1.5 overflow-x-auto">
        <button onclick="askWastraAI('Rekomendasi busana pernikahan adat Jawa & Sunda')" class="whitespace-nowrap px-3 py-1.5 rounded-full bg-ivory hover:bg-ruby hover:text-champagne text-charcoal border border-gold/50 font-bold text-[11px] transition-colors">
          💍 Nikah Adat
        </button>
        <button onclick="askWastraAI('Busana adat untuk wisuda yang anggun')" class="whitespace-nowrap px-3 py-1.5 rounded-full bg-ivory hover:bg-ruby hover:text-champagne text-charcoal border border-gold/50 font-bold text-[11px] transition-colors">
          🎓 Busana Wisuda
        </button>
        <button onclick="askWastraAI('Berapa harga sewa dan deposit jaminan?')" class="whitespace-nowrap px-3 py-1.5 rounded-full bg-ivory hover:bg-ruby hover:text-champagne text-charcoal border border-gold/50 font-bold text-[11px] transition-colors">
          💰 Harga & Deposit
        </button>
        <button onclick="askWastraAI('Apakah tersedia paket keluarga dan ukuran XXL?')" class="whitespace-nowrap px-3 py-1.5 rounded-full bg-ivory hover:bg-ruby hover:text-champagne text-charcoal border border-gold/50 font-bold text-[11px] transition-colors">
          👨‍👩‍👧‍👦 Keluarga & XXL
        </button>
      </div>

      <!-- Input Form -->
      <form onsubmit="handleWastraAISubmit(event)" class="p-3 bg-white border-t border-gold/40 flex gap-2">
        <input
          id="wastra-ai-input"
          type="text"
          placeholder="Cari daerah, acara, ukuran, harga..."
          class="flex-1 px-3.5 py-2.5 rounded-xl bg-ivory border border-gold/60 text-xs font-medium text-charcoal focus:outline-none focus:border-ruby"
        />
        <button type="submit" class="px-4 py-2.5 rounded-xl bg-ruby hover:bg-crimson text-champagne font-bold text-xs shadow transition-colors">
          Kirim
        </button>
      </form>
    </div>

    <!-- Unique Royal Crown Floating Trigger Button -->
    <button
      onclick="toggleWastraAI()"
      aria-label="Buka Kanjeng Wastra AI"
      class="relative ml-auto flex items-center gap-3 bg-gradient-to-r from-ruby to-charcoal text-ivory pl-3 pr-5 py-2.5 rounded-full shadow-2xl border-2 border-gold transition-transform hover:scale-105 group"
    >
      <span class="absolute inset-0 rounded-full bg-gold/40 -z-10" style="animation: pulseAura 2.6s infinite;"></span>
      <div class="w-10 h-10 rounded-full bg-gradient-to-br from-gold to-champagne flex items-center justify-center group-hover:rotate-12 transition-transform">
        <svg class="w-6 h-6 text-charcoal" viewBox="0 0 48 48" fill="none">
          <path d="M8 33L12 15L20 23L24 10L28 23L36 15L40 33H8Z" stroke="currentColor" stroke-width="2.5" fill="rgba(116,28,44,0.2)"/>
          <path d="M9 37H39" stroke="#741C2C" stroke-width="2.8" stroke-linecap="round"/>
        </svg>
      </div>
      <div class="text-left">
        <span class="block text-[9px] font-extrabold uppercase tracking-[0.18em] text-champagne leading-none">Royal Stylist AI</span>
        <span class="font-royal font-bold text-xs sm:text-sm text-ivory">Kanjeng Wastra</span>
      </div>
    </button>
  </div>

  
  <script src="{{ asset('js/website-bisnis/templates/traditional-textiles-heritage-fashion/traditional-costume-rental/kencana-wastra/kencana-wastra.js') }}?v=20261123-fix1" defer></script>
</body>
</html>
