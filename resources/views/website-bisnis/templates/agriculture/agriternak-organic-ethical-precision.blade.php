<html class="scroll-smooth" lang="id"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>AgriTernak - Peternakan Organik Beretika &amp; Presisi</title>
<link href="https://fonts.googleapis.com" rel="preconnect"/>
<link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&amp;family=Plus+Jakarta+Sans:wght@500;600;700;800&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>


<style>
    @layer base {
      html { scroll-behavior: smooth; }
      body { overscroll-behavior: none; }
    }
    .custom-scrollbar::-webkit-scrollbar {
      width: 4px;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb {
      background-color: #C2CFC5;
      border-radius: 9999px;
    }
  </style>
<style>body.agriternak-organic-preview main section:not([data-webia-preview-hero]), body.agriternak-organic-preview main footer, body.agriternak-organic-preview > footer, body.agriternak-organic-preview aside { display:none!important; } body.agriternak-organic-preview main { padding-top:0!important; }</style>
@vite('resources/css/app.css')
</head>
<body class="bg-organic-surface font-organic-body text-organic-on-surface antialiased selection:bg-organic-secondary-container/20 selection:text-organic-primary relative{{ request()->boolean('preview') ? ' agriternak-organic-preview' : '' }}">
<!-- ==================== TOAST NOTIFICATION CONTAINER ==================== -->
<div class="fixed top-24 right-6 z-[9999] flex flex-col gap-3 pointer-events-none" id="toast-container"></div>
<!-- ==================== TOP NAVIGATION BAR ==================== -->
<header class="fixed top-0 left-0 right-0 w-full z-50 bg-organic-surface/90 backdrop-blur-md border-b border-organic-outline-variant/30 shadow-[0_1px_12px_rgba(20,83,45,0.05)] transition-all">
<div class="h-20 max-w-[1380px] mx-auto px-6 md:px-10 lg:px-12 flex items-center justify-between gap-4">
<!-- Brand Logo -->
<a class="flex items-center gap-3 group shrink-0" href="#beranda">
<div class="w-11 h-11 rounded-xl bg-gradient-to-br from-organic-primary to-organic-primary-container flex items-center justify-center text-white shadow-md shadow-primary/20 group-hover:scale-105 transition-all">
<span class="material-symbols-outlined text-[26px]">potted_plant</span>
</div>
<div class="flex flex-col">
<span class="font-organic-headline text-[22px] font-bold text-organic-primary tracking-tight leading-none group-hover:text-organic-primary-container transition-colors">AgriTernak</span>
<span class="text-[11px] font-semibold text-organic-outline tracking-wider uppercase mt-1">Organic Precision Pasture</span>
</div>
</a>
<!-- Desktop Navigation Menu -->
<nav class="hidden lg:flex items-center gap-1.5 p-1 bg-organic-surface-container-low/70 rounded-full border border-organic-outline-variant/40 px-3">
<a class="px-4 py-2 rounded-full text-sm font-medium text-organic-on-surface hover:text-organic-primary hover:bg-white transition-all" href="#beranda">Beranda</a>
<a class="px-4 py-2 rounded-full text-sm font-medium text-organic-on-surface-variant hover:text-organic-primary hover:bg-white transition-all" href="#solusi">Solusi Peternakan</a>
<a class="px-4 py-2 rounded-full text-sm font-medium text-organic-on-surface-variant hover:text-organic-primary hover:bg-white transition-all" href="#teknologi">Teknologi</a>
<a class="px-4 py-2 rounded-full text-sm font-medium text-organic-on-surface-variant hover:text-organic-primary hover:bg-white transition-all" href="#pilar">Keunggulan &amp; Pilar</a>
<a class="px-4 py-2 rounded-full text-sm font-medium text-organic-on-surface-variant hover:text-organic-primary hover:bg-white transition-all" href="#cerita-peternak">Kisah Nyata</a>
<a class="px-4 py-2 rounded-full text-sm font-medium text-organic-on-surface-variant hover:text-organic-primary hover:bg-white transition-all" href="#faq">FAQ</a>
</nav>
<!-- Right CTAs -->
<div class="flex items-center gap-3">
<button class="hidden sm:inline-flex items-center gap-2 h-11 px-5 rounded-full bg-organic-primary text-white text-sm font-semibold hover:bg-organic-primary-container shadow-md shadow-primary/25 hover:shadow-lg transition-all active:scale-95" onclick="openBookingModal()">
<span class="material-symbols-outlined text-[18px]">calendar_today</span>
<span>Jadwalkan Tur</span>
</button>
<a class="hidden md:inline-flex items-center justify-center h-11 px-5 rounded-full border border-organic-outline-variant/80 text-organic-on-surface text-sm font-semibold hover:bg-organic-surface-container transition-all" href="#kontak">
          Kontak
        </a>
<button aria-label="Toggle Mobile Menu" class="lg:hidden w-11 h-11 rounded-xl bg-organic-surface-container flex items-center justify-center text-organic-on-surface hover:bg-organic-surface-container-high transition-colors" id="mobile-menu-btn" onclick="toggleMobileMenu()">
<span class="material-symbols-outlined text-[24px]" id="menu-icon">menu</span>
</button>
</div>
</div>
<!-- Mobile Drawer Navigation -->
<div class="hidden lg:hidden bg-organic-surface-container-lowest/98 backdrop-blur-xl border-b border-organic-outline-variant/40 px-6 py-5 shadow-2xl transition-all" id="mobile-menu">
<nav class="flex flex-col gap-2">
<a class="flex items-center gap-3 px-4 py-3 rounded-xl font-medium text-organic-on-surface hover:bg-organic-moss-light hover:text-organic-primary transition-colors" href="#beranda" onclick="closeMobileMenu()">
<span class="material-symbols-outlined text-organic-primary text-[20px]">home</span>
<span>Beranda</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 rounded-xl font-medium text-organic-on-surface hover:bg-organic-moss-light hover:text-organic-primary transition-colors" href="#solusi" onclick="closeMobileMenu()">
<span class="material-symbols-outlined text-organic-primary text-[20px]">psychology_alt</span>
<span>Solusi Peternakan</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 rounded-xl font-medium text-organic-on-surface hover:bg-organic-moss-light hover:text-organic-primary transition-colors" href="#teknologi" onclick="closeMobileMenu()">
<span class="material-symbols-outlined text-organic-primary text-[20px]">satellite_alt</span>
<span>Teknologi &amp; Presisi</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 rounded-xl font-medium text-organic-on-surface hover:bg-organic-moss-light hover:text-organic-primary transition-colors" href="#pilar" onclick="closeMobileMenu()">
<span class="material-symbols-outlined text-organic-primary text-[20px]">spa</span>
<span>4 Pilar Ekologis</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 rounded-xl font-medium text-organic-on-surface hover:bg-organic-moss-light hover:text-organic-primary transition-colors" href="#cerita-peternak" onclick="closeMobileMenu()">
<span class="material-symbols-outlined text-organic-primary text-[20px]">groups</span>
<span>Dampak Komunitas</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 rounded-xl font-medium text-organic-on-surface hover:bg-organic-moss-light hover:text-organic-primary transition-colors" href="#faq" onclick="closeMobileMenu()">
<span class="material-symbols-outlined text-organic-primary text-[20px]">help_center</span>
<span>FAQ Organik</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 rounded-xl font-medium text-organic-on-surface hover:bg-organic-moss-light hover:text-organic-primary transition-colors" href="#kontak" onclick="closeMobileMenu()">
<span class="material-symbols-outlined text-organic-primary text-[20px]">alternate_email</span>
<span>Kontak Mitra</span>
</a>
<div class="pt-3 border-t border-organic-outline-variant/30 flex flex-col gap-2">
<button class="w-full flex items-center justify-center gap-2 h-12 rounded-xl bg-organic-primary text-white font-semibold" onclick="closeMobileMenu(); openBookingModal();">
<span class="material-symbols-outlined text-[20px]">calendar_month</span>
<span>Jadwalkan Tur Ladang Gratis</span>
</button>
</div>
</nav>
</div>
</header>
<!-- ==================== MAIN CONTENT ==================== -->
<main class="w-full pt-20">
<!-- HERO SECTION (#beranda) -->
<section data-webia-preview-hero class="relative w-full overflow-hidden pt-10 md:pt-16 pb-20" id="beranda">
<div class="absolute -top-32 -left-20 w-[28rem] h-[28rem] rounded-full bg-emerald-100/60 blur-3xl pointer-events-none"></div>
<div class="absolute top-96 right-0 w-[32rem] h-[32rem] rounded-full bg-green-100/50 blur-3xl pointer-events-none"></div>
<div class="max-w-[1380px] mx-auto px-6 md:px-10 lg:px-12 relative z-10">
<div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-14 items-center">
<!-- Editorial Pitch -->
<div class="lg:col-span-7 flex flex-col gap-6">
<div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-organic-moss-pale border border-organic-secondary-container/40 text-organic-primary w-fit shadow-xs">
<span class="material-symbols-outlined text-[18px] text-organic-primary-container">nest_eco_leaf</span>
<span class="text-xs font-bold tracking-wider uppercase font-organic-headline">Harmoni Kehidupan Peternakan Regeneratif</span>
</div>
<h1 class="font-organic-display-hero text-4xl sm:text-5xl lg:text-[54px] font-extrabold text-organic-on-surface leading-[1.12] tracking-tight">
              Peternakan Organik Beretika: Merawat Harmoni Alam untuk Kualitas Ternak Terbaik
            </h1>
<p class="text-lg md:text-xl text-organic-on-surface-variant max-w-2xl leading-relaxed">
              100% Bebas Antibiotik Preventif, Pakan Hijauan Alami Tanpa Kimia, dan Komitmen Penuh pada Kesejahteraan Hewan (<span class="italic font-semibold text-organic-primary">Animal Welfare</span>) di lembah pegunungan asri Nusantara.
            </p>
<!-- Trust Badges -->
<div class="flex flex-wrap items-center gap-2.5 pt-1">
<div class="flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-organic-surface-container border border-organic-outline-variant/50 text-xs font-semibold text-organic-on-surface">
<span class="material-symbols-outlined text-organic-primary text-[17px]">verified</span>
<span>Sertifikasi Organik Indonesia</span>
</div>
<div class="flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-organic-surface-container border border-organic-outline-variant/50 text-xs font-semibold text-organic-on-surface">
<span class="material-symbols-outlined text-organic-primary text-[17px]">grass</span>
<span>Grass-Fed Pasture Certified</span>
</div>
<div class="flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-organic-surface-container border border-organic-outline-variant/50 text-xs font-semibold text-organic-on-surface">
<span class="material-symbols-outlined text-organic-primary text-[17px]">health_and_safety</span>
<span>100% Bebas Hormon Sintetis</span>
</div>
</div>
<!-- CTAs -->
<div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-4 pt-2">
<a class="inline-flex items-center justify-center gap-2.5 h-14 px-8 rounded-2xl bg-organic-primary text-white font-semibold text-base shadow-lg shadow-primary/25 hover:bg-organic-primary-container transition-all active:scale-[0.98]" href="#pilar">
<span>Jelajahi Program Peternakan Alami</span>
<span class="material-symbols-outlined text-[20px]">arrow_forward</span>
</a>
<button class="inline-flex items-center justify-center gap-2.5 h-14 px-7 rounded-2xl bg-organic-surface-container text-organic-on-surface font-semibold text-base hover:bg-organic-surface-container-high border border-organic-outline-variant/40 transition-all shadow-xs" onclick="downloadHandbook()">
<span class="material-symbols-outlined text-organic-primary text-[20px]">menu_book</span>
<span>Buku Panduan Beternak (PDF)</span>
</button>
</div>
<!-- Micro Metrics -->
<div class="pt-4 grid grid-cols-3 gap-3 md:gap-5 border-t border-organic-outline-variant/40">
<div class="flex flex-col p-4 rounded-2xl bg-organic-surface-container-low border border-organic-outline-variant/30">
<span class="font-organic-headline text-2xl md:text-3xl font-bold text-organic-primary">2.450+</span>
<span class="text-xs uppercase tracking-wider text-organic-outline font-semibold mt-1">Hektar Padang Alami</span>
</div>
<div class="flex flex-col p-4 rounded-2xl bg-organic-surface-container-low border border-organic-outline-variant/30">
<span class="font-organic-headline text-2xl md:text-3xl font-bold text-organic-primary">0%</span>
<span class="text-xs uppercase tracking-wider text-organic-outline font-semibold mt-1">Residu Kimia Sintetik</span>
</div>
<div class="flex flex-col p-4 rounded-2xl bg-organic-surface-container-low border border-organic-outline-variant/30">
<span class="font-organic-headline text-2xl md:text-3xl font-bold text-organic-primary">4.8/5</span>
<span class="text-xs uppercase tracking-wider text-organic-outline font-semibold mt-1">Skor Animal Welfare</span>
</div>
</div>
</div>
<!-- Hero Right Visual Canvas -->
<div class="lg:col-span-5 relative">
<div class="relative rounded-3xl overflow-hidden shadow-2xl bg-organic-surface-container border border-organic-outline-variant/40 group">
<img alt="Peternakan sapi organik di perbukitan tropis Indonesia yang hijau asri" class="w-full h-[520px] object-cover group-hover:scale-105 transition-transform duration-700 ease-out" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCLMbEjQkkiw0v-RbJw3aLP73GwIYe9G4Ri21Y550UqM2TD2WRTXG8hbqtHOqxH4JeHPzeWyPtKpF50uh1up43kBaG7CMVg-PNEZkrDXwGbPr0SexsiKsACwLwyPGr_wbvshQhZFdBnax3AQeoIGiHiFjJvihaJwqKVUGLbUpXvlbMnOwa5E6pq2XMwBmJT4IQ0Qqiqb9Ohbj0VwoFwn3jpDCfEIQjXN8Q9rMPmNEA"/>
<div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-black/10"></div>
<!-- Bottom Inset Card -->
<div class="absolute bottom-6 left-6 right-6 p-4 rounded-2xl bg-white/95 backdrop-blur-md shadow-xl flex items-center justify-between gap-4 border border-white/50">
<div class="flex items-center gap-3">
<div class="w-12 h-12 rounded-xl bg-organic-moss-light text-organic-primary flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-[26px]">potted_plant</span>
</div>
<div class="flex flex-col">
<span class="text-sm font-bold text-organic-on-surface">Rotasi Padang Rumput Cerdas</span>
<span class="text-xs font-mono text-organic-outline">Siklus Pemulihan Tanah: 21 Hari</span>
</div>
</div>
<div class="flex flex-col items-end shrink-0">
<span class="text-[11px] font-bold text-organic-primary uppercase">Status Aktif</span>
<span class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-pulse mt-1"></span>
</div>
</div>
</div>
<!-- Overlapping Compassion Badge -->
<div class="hidden sm:flex absolute -top-5 -left-5 p-4 rounded-2xl bg-white shadow-xl flex-col gap-1 max-w-[210px] border border-organic-outline-variant/40">
<div class="flex items-center gap-2 text-organic-primary font-bold text-xs uppercase tracking-wider">
<span class="material-symbols-outlined text-[18px]">cruelty_free</span>
<span>Animal Compassion</span>
</div>
<p class="text-xs text-organic-on-surface-variant leading-snug">
                Bebas kandang sempit, bergerak leluasa di bawah sinar matahari hangat.
              </p>
</div>
</div>
</div>
</div>
</section>
<!-- SECTION: SOLUSI PETERNAKAN (#solusi) -->
<section class="w-full bg-organic-surface-container-low/60 py-20 border-t border-organic-outline-variant/30" id="solusi">
<div class="max-w-[1380px] mx-auto px-6 md:px-10 lg:px-12">
<div class="text-center max-w-3xl mx-auto mb-14">
<div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-organic-moss-pale border border-organic-secondary-container/30 text-organic-primary text-xs font-bold uppercase tracking-wider mb-3">
<span class="material-symbols-outlined text-[16px]">psychology_alt</span>
<span>Solusi Terintegrasi</span>
</div>
<h2 class="font-organic-headline text-3xl md:text-4xl font-bold text-organic-on-surface tracking-tight">
            Infrastruktur Peternakan Modern Berkelanjutan
          </h2>
<p class="text-base md:text-lg text-organic-on-surface-variant mt-3">
            Kombinasi sains agrikultur organik dengan kemudahan operasional peternak untuk menghasilkan mutu susu dan daging unggul.
          </p>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
<!-- Solusi 1 -->
<div class="p-8 rounded-3xl bg-white border border-organic-outline-variant/40 shadow-xs hover:shadow-xl hover:-translate-y-1 transition-all">
<div class="w-14 h-14 rounded-2xl bg-emerald-50 text-organic-primary flex items-center justify-center mb-6">
<span class="material-symbols-outlined text-[32px]">science</span>
</div>
<h3 class="font-organic-headline text-xl font-bold text-organic-on-surface mb-2">Formulasi Pakan Hijauan &amp; Fermentasi Hay</h3>
<p class="text-sm text-organic-on-surface-variant leading-relaxed mb-6">
              Perpaduan daun legum liar berprotein tinggi, rumput odot organik, dan inokulasi bakteri asam laktat alami tanpa urea buatan.
            </p>
<ul class="text-xs space-y-2.5 text-organic-on-surface font-medium border-t border-organic-outline-variant/30 pt-4">
<li class="flex items-center gap-2"><span class="material-symbols-outlined text-organic-primary text-[18px]">check_circle</span> pH Rumen Terjaga Stabil</li>
<li class="flex items-center gap-2"><span class="material-symbols-outlined text-organic-primary text-[18px]">check_circle</span> Fermentasi Alami Bebas Bau</li>
</ul>
</div>
<!-- Solusi 2 -->
<div class="p-8 rounded-3xl bg-white border border-organic-outline-variant/40 shadow-xs hover:shadow-xl hover:-translate-y-1 transition-all">
<div class="w-14 h-14 rounded-2xl bg-emerald-50 text-organic-primary flex items-center justify-center mb-6">
<span class="material-symbols-outlined text-[32px]">biotechnology</span>
</div>
<h3 class="font-organic-headline text-xl font-bold text-organic-on-surface mb-2">Fitofarmaka &amp; Imunitas Herbal Hewan</h3>
<p class="text-sm text-organic-on-surface-variant leading-relaxed mb-6">
              Ramuan jamu Nusantara (temulawak, kunyit, daun sirih) tersertifikasi veteriner untuk meningkatkan nafsu makan dan resistensi alami parasit.
            </p>
<ul class="text-xs space-y-2.5 text-organic-on-surface font-medium border-t border-organic-outline-variant/30 pt-4">
<li class="flex items-center gap-2"><span class="material-symbols-outlined text-organic-primary text-[18px]">check_circle</span> Nol Residu Obat dalam Daging</li>
<li class="flex items-center gap-2"><span class="material-symbols-outlined text-organic-primary text-[18px]">check_circle</span> Penanganan Cepat Tanpa Kimia</li>
</ul>
</div>
<!-- Solusi 3 -->
<div class="p-8 rounded-3xl bg-white border border-organic-outline-variant/40 shadow-xs hover:shadow-xl hover:-translate-y-1 transition-all">
<div class="w-14 h-14 rounded-2xl bg-emerald-50 text-organic-primary flex items-center justify-center mb-6">
<span class="material-symbols-outlined text-[32px]">local_shipping</span>
</div>
<h3 class="font-organic-headline text-xl font-bold text-organic-on-surface mb-2">Rantai Pasok Ritel Dingin 'Farm-to-Table'</h3>
<p class="text-sm text-organic-on-surface-variant leading-relaxed mb-6">
              Distribusi langsung dari lembah pegunungan ke restoran gourmet, hotel, dan keluarga dengan pendingin terkendali 0-4°C.
            </p>
<ul class="text-xs space-y-2.5 text-organic-on-surface font-medium border-t border-organic-outline-variant/30 pt-4">
<li class="flex items-center gap-2"><span class="material-symbols-outlined text-organic-primary text-[18px]">check_circle</span> Kesegaran Nutrisi Terjaga Utuh</li>
<li class="flex items-center gap-2"><span class="material-symbols-outlined text-organic-primary text-[18px]">check_circle</span> Garansi Pengiriman Tepat Waktu</li>
</ul>
</div>
</div>
</div>
</section>
<!-- SECTION: TEKNOLOGI & PRESISI (#teknologi) -->
<section class="w-full py-20 bg-organic-surface" id="teknologi">
<div class="max-w-[1380px] mx-auto px-6 md:px-10 lg:px-12">
<div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
<div class="lg:col-span-6 flex flex-col gap-6">
<div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-organic-moss-pale border border-organic-secondary-container/30 text-organic-primary text-xs font-bold uppercase tracking-wider w-fit">
<span class="material-symbols-outlined text-[16px]">satellite_alt</span>
<span>Telemetri Pastura Terpadu</span>
</div>
<h2 class="font-organic-headline text-3xl md:text-4xl font-bold text-organic-on-surface tracking-tight leading-snug">
              Sentuhan Teknologi Presisi untuk Melindungi Kemurnian Alam
            </h2>
<p class="text-base text-organic-on-surface-variant leading-relaxed">
              Meskipun menganut filosofi organik alami, setiap jengkal ladang dan ternak dipantau secara cerdas dengan sensor non-invasif. Tidak mengganggu ketenangan hewan, namun memberikan data akurat bagi tim agronomi.
            </p>
<div class="space-y-4">
<div class="flex items-start gap-3.5 p-4 rounded-2xl bg-organic-surface-container-low border border-organic-outline-variant/30">
<span class="material-symbols-outlined text-organic-primary text-[24px] p-2 rounded-xl bg-white shadow-xs">sensors</span>
<div>
<h4 class="font-bold text-sm text-organic-on-surface">Pelacak Biometrik Non-Invasif</h4>
<p class="text-xs text-organic-on-surface-variant mt-0.5">Mendeteksi ritme kunyah (rumination) dan suhu tubuh hewan untuk mendeteksi stres dini.</p>
</div>
</div>
<div class="flex items-start gap-3.5 p-4 rounded-2xl bg-organic-surface-container-low border border-organic-outline-variant/30">
<span class="material-symbols-outlined text-organic-primary text-[24px] p-2 rounded-xl bg-white shadow-xs">public</span>
<div>
<h4 class="font-bold text-sm text-organic-on-surface">Peta NDVI Satelit Vegetasi</h4>
<p class="text-xs text-organic-on-surface-variant mt-0.5">Memastikan sapi dipindahkan tepat saat klorofil rumput berada pada puncak densitas nutrisi terbaik.</p>
</div>
</div>
</div>
</div>
<div class="lg:col-span-6">
<div class="relative p-6 sm:p-8 rounded-3xl bg-gradient-to-br from-organic-primary to-emerald-900 text-white shadow-xl overflow-hidden">
<div class="absolute -right-16 -top-16 w-60 h-60 bg-emerald-400/20 rounded-full blur-2xl"></div>
<div class="flex items-center justify-between pb-6 border-b border-white/15">
<div class="flex items-center gap-3">
<span class="w-3 h-3 rounded-full bg-emerald-400 animate-pulse"></span>
<span class="text-xs font-mono uppercase tracking-widest text-emerald-200">Sensor Telemetri Aktif: Sektor B-4</span>
</div>
<span class="text-xs px-2.5 py-1 rounded-[0.25rem] bg-white/10 font-mono">Realtime Live</span>
</div>
<div class="grid grid-cols-2 gap-4 my-6">
<div class="p-4 rounded-2xl bg-white/10 backdrop-blur-sm border border-white/10">
<span class="text-xs text-white/70">Kandungan Biomassa Padang</span>
<div class="text-2xl font-bold font-organic-headline mt-1">94.2%</div>
<span class="text-[11px] text-emerald-300 mt-1 block">Optimal untuk Penggembalaan</span>
</div>
<div class="p-4 rounded-2xl bg-white/10 backdrop-blur-sm border border-white/10">
<span class="text-xs text-white/70">Tingkat Stres Kawanan</span>
<div class="text-2xl font-bold font-organic-headline mt-1">1.2/10</div>
<span class="text-[11px] text-emerald-300 mt-1 block">Kategori: Sangat Tenang (Calm)</span>
</div>
</div>
<div class="p-4 rounded-2xl bg-white/5 border border-white/10 flex items-center justify-between">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-emerald-300 text-[26px]">energy_savings_leaf</span>
<div>
<div class="text-xs font-semibold">Biogas Reaktor Mandiri</div>
<div class="text-[11px] text-white/70">Menghasilkan 120 kWh listrik terbarukan/hari</div>
</div>
</div>
<span class="text-xs font-bold text-emerald-300">100% Sirkular</span>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- SECTION: 4 PILAR BUDIDAYA RAMAH LINGKUNGAN (#pilar) -->
<section class="w-full bg-organic-surface-container-low py-20 border-t border-organic-outline-variant/30" id="pilar">
<div class="max-w-[1380px] mx-auto px-6 md:px-10 lg:px-12 flex flex-col gap-12">
<!-- Section Header -->
<div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
<div class="flex flex-col gap-2 max-w-2xl">
<div class="inline-flex items-center gap-1.5 text-organic-primary text-xs font-bold uppercase tracking-wider">
<span class="material-symbols-outlined text-[18px]">spa</span>
<span>Integritas Agrikultur Alami</span>
</div>
<h2 class="font-organic-headline text-3xl md:text-4xl font-bold text-organic-on-surface tracking-tight">
              4 Pilar Budidaya Ramah Lingkungan
            </h2>
<p class="text-base text-organic-on-surface-variant">
              Setiap proses dirancang dengan memperhatikan ritme biologis ternak dan keseimbangan ekosistem tanah, tanpa kompromi bahan sintetik.
            </p>
</div>
<div class="hidden lg:flex items-center gap-2 px-4 py-2 rounded-xl bg-white border border-organic-outline-variant/40 shadow-xs">
<span class="material-symbols-outlined text-organic-primary text-[20px]">compost</span>
<span class="text-xs font-semibold text-organic-on-surface">100% Sirkular Terintegrasi</span>
</div>
</div>
<!-- Pillar Grid (Bento Style) -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
<!-- Pillar 1 -->
<div class="flex flex-col justify-between p-7 rounded-3xl bg-white border border-organic-outline-variant/40 shadow-xs hover:shadow-xl hover:-translate-y-1 hover:border-organic-primary/40 transition-all group">
<div class="flex flex-col gap-4">
<div class="w-14 h-14 rounded-2xl bg-organic-moss-light text-organic-primary flex items-center justify-center group-hover:bg-organic-primary group-hover:text-white transition-colors">
<span class="material-symbols-outlined text-[30px]">agriculture</span>
</div>
<div>
<span class="text-[11px] text-organic-primary uppercase font-bold tracking-wider">Pilar 01</span>
<h3 class="font-organic-headline text-lg font-bold text-organic-on-surface mt-1">Padang Gembala Bebas (Free-Range)</h3>
</div>
<p class="text-sm text-organic-on-surface-variant leading-relaxed">
                Rotasi petak penggembalaan berkala memastikan rumput bertunas segar, tanah tidak padat, dan ternak memuaskan naluri alaminya mencari pakan tanpa stres.
              </p>
</div>
<div class="pt-6 flex items-center gap-2 text-organic-primary text-xs font-bold group-hover:gap-3 transition-all">
<span>Pelajari Siklus Rotasi</span>
<span class="material-symbols-outlined text-[16px]">arrow_forward</span>
</div>
</div>
<!-- Pillar 2 -->
<div class="flex flex-col justify-between p-7 rounded-3xl bg-white border border-organic-outline-variant/40 shadow-xs hover:shadow-xl hover:-translate-y-1 hover:border-organic-primary/40 transition-all group">
<div class="flex flex-col gap-4">
<div class="w-14 h-14 rounded-2xl bg-organic-moss-light text-organic-primary flex items-center justify-center group-hover:bg-organic-primary group-hover:text-white transition-colors">
<span class="material-symbols-outlined text-[30px]">eco</span>
</div>
<div>
<span class="text-[11px] text-organic-primary uppercase font-bold tracking-wider">Pilar 02</span>
<h3 class="font-organic-headline text-lg font-bold text-organic-on-surface mt-1">Nutrisi Probiotik &amp; Hijauan Murni</h3>
</div>
<p class="text-sm text-organic-on-surface-variant leading-relaxed">
                Hay alami, silase fermentasi mikroba lokal, dan daun legum protein tinggi. Tanpa konsentrat urea sintetis, tanpa stimulan hormon pertumbuhan.
              </p>
</div>
<div class="pt-6 flex items-center gap-2 text-organic-primary text-xs font-bold group-hover:gap-3 transition-all">
<span>Formula Hay &amp; Silase</span>
<span class="material-symbols-outlined text-[16px]">arrow_forward</span>
</div>
</div>
<!-- Pillar 3 -->
<div class="flex flex-col justify-between p-7 rounded-3xl bg-white border border-organic-outline-variant/40 shadow-xs hover:shadow-xl hover:-translate-y-1 hover:border-organic-primary/40 transition-all group">
<div class="flex flex-col gap-4">
<div class="w-14 h-14 rounded-2xl bg-organic-moss-light text-organic-primary flex items-center justify-center group-hover:bg-organic-primary group-hover:text-white transition-colors">
<span class="material-symbols-outlined text-[30px]">recycling</span>
</div>
<div>
<span class="text-[11px] text-organic-primary uppercase font-bold tracking-wider">Pilar 03</span>
<h3 class="font-organic-headline text-lg font-bold text-organic-on-surface mt-1">Pengolahan Limbah Sirkular</h3>
</div>
<p class="text-sm text-organic-on-surface-variant leading-relaxed">
                Manur dikonversi jadi biogas pemanas ramah energi dan pupuk vermikompos kaya hara yang dikembalikan ke padang rumput untuk kesuburan permanen.
              </p>
</div>
<div class="pt-6 flex items-center gap-2 text-organic-primary text-xs font-bold group-hover:gap-3 transition-all">
<span>Sirkular Biogas &amp; Kompos</span>
<span class="material-symbols-outlined text-[16px]">arrow_forward</span>
</div>
</div>
<!-- Pillar 4 -->
<div class="flex flex-col justify-between p-7 rounded-3xl bg-white border border-organic-outline-variant/40 shadow-xs hover:shadow-xl hover:-translate-y-1 hover:border-organic-primary/40 transition-all group">
<div class="flex flex-col gap-4">
<div class="w-14 h-14 rounded-2xl bg-organic-moss-light text-organic-primary flex items-center justify-center group-hover:bg-organic-primary group-hover:text-white transition-colors">
<span class="material-symbols-outlined text-[30px]">fingerprint</span>
</div>
<div>
<span class="text-[11px] text-organic-primary uppercase font-bold tracking-wider">Pilar 04</span>
<h3 class="font-organic-headline text-lg font-bold text-organic-on-surface mt-1">Traceability Asal-Usul Transparan</h3>
</div>
<p class="text-sm text-organic-on-surface-variant leading-relaxed">
                Setiap hewan memiliki paspor digital silsilah, riwayat medis herbal, serta titik GPS padang penggembalaannya yang dapat diakses langsung konsumen.
              </p>
</div>
<div class="pt-6 flex items-center gap-2 text-organic-primary text-xs font-bold group-hover:gap-3 transition-all">
<span>Cek Contoh Paspor QR</span>
<span class="material-symbols-outlined text-[16px]">arrow_forward</span>
</div>
</div>
</div>
</div>
</section>
<!-- SECTION: CERITA PETERNAK & DAMPAK LINGKUNGAN (#cerita-peternak) -->
<section class="w-full py-20 relative bg-organic-surface" id="cerita-peternak">
<div class="max-w-[1380px] mx-auto px-6 md:px-10 lg:px-12">
<div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">
<div class="lg:col-span-6 relative">
<div class="rounded-3xl overflow-hidden shadow-xl bg-organic-surface-container border border-organic-outline-variant/40 group">
<img alt="Peternak organik Indonesia tersenyum hangat bersama sapi sehat di padang rumput" class="w-full h-[470px] object-cover group-hover:scale-105 transition-transform duration-700" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDwqRTMPoos6w-mr_l76HC1X8YpB-wmnyM472Hz_NJjopNNidvVasp34UcOs91s7M3Y1Fmxzlr9t4RmFa1sSM50N5ky4oM2m_tCJXtyVIOM0bCDmM3oMKGuJYvxmCNHK_Lp8eElmZkHQyBCpB54b9GKwqQkwAor-V3gnXjheHPUvlQd3uCMraP8dEN0fAwc4pD4VURJVeHexzBeMjZMQM0zmCPrg4lvzTV9WkhbmZc"/>
</div>
<div class="absolute -bottom-6 -right-4 hidden sm:flex p-6 rounded-2xl bg-organic-primary text-white shadow-xl flex-col max-w-xs border border-white/20">
<span class="font-organic-headline text-xl font-bold">-42% Emisi Karbon</span>
<p class="text-xs text-white/90 mt-1 leading-relaxed">
                Melalui teknik <span class="italic font-semibold">silvopasture</span> dan padang rumput polikultur penyerap karbon aktif.
              </p>
</div>
</div>
<div class="lg:col-span-6 flex flex-col gap-6">
<div class="inline-flex items-center gap-1.5 text-organic-primary text-xs font-bold uppercase tracking-wider">
<span class="material-symbols-outlined text-[18px]">volunteer_activism</span>
<span>Dampak Komunitas &amp; Regenerasi Alam</span>
</div>
<h2 class="font-organic-headline text-2xl sm:text-3xl lg:text-4xl font-bold text-organic-on-surface tracking-tight leading-snug">
              “Saat tanah disehatkan dan sapi dihormati martabatnya, mutu pangan mengalir melampaui standar tertinggi.”
            </h2>
<p class="text-base text-organic-on-surface-variant leading-relaxed">
              Pak Wayan Sudarma, salah satu dari 140 mitra peternak BioTernak di dataran tinggi, mempraktikkan warisan kearifan lokal berpadu dengan standar sertifikasi biologis internasional. Kami memastikan peternak lokal menerima bagi hasil adil (Fair Share Margin) 35% lebih tinggi dari pasar umum.
            </p>
<div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-1">
<div class="flex items-start gap-3 p-4 rounded-2xl bg-organic-surface-container-low border border-organic-outline-variant/30">
<span class="material-symbols-outlined text-organic-primary text-[24px] shrink-0">water_drop</span>
<div>
<h4 class="text-sm font-bold text-organic-on-surface">Kualitas Daging &amp; Susu</h4>
<p class="text-xs text-organic-on-surface-variant mt-0.5">Rasio Omega-3 berbanding Omega-6 optimal (1:1.5) serta kaya CLA murni.</p>
</div>
</div>
<div class="flex items-start gap-3 p-4 rounded-2xl bg-organic-surface-container-low border border-organic-outline-variant/30">
<span class="material-symbols-outlined text-organic-primary text-[24px] shrink-0">forest</span>
<div>
<h4 class="text-sm font-bold text-organic-on-surface">Restorasi Lahan Kritis</h4>
<p class="text-xs text-organic-on-surface-variant mt-0.5">Mengembalikan mikrobioma humus tanpa herbisida dan pupuk sintetis.</p>
</div>
</div>
</div>
<!-- Farmer Byline -->
<div class="flex items-center gap-3.5 pt-2">
<div class="w-12 h-12 rounded-full bg-organic-primary/10 border border-organic-primary/20 flex items-center justify-center font-bold text-organic-primary">
                WS
              </div>
<div class="flex flex-col">
<span class="text-sm font-bold text-organic-on-surface">Wayan Sudarma &amp; Keluarga</span>
<span class="text-xs text-organic-outline font-medium">Mitra Peternak BioTernak, Kawasan Lembah Gunung Salak</span>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- SECTION: FAQ (#faq) -->
<section class="w-full bg-organic-surface-container-low py-20 border-t border-organic-outline-variant/30" id="faq">
<div class="max-w-[960px] mx-auto px-6 md:px-10 lg:px-12 flex flex-col gap-10">
<div class="flex flex-col items-center text-center gap-2">
<div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-white border border-organic-outline-variant/40 text-organic-primary text-xs font-bold uppercase tracking-wider">
<span class="material-symbols-outlined text-[16px]">help_center</span>
<span>Transparansi Praktik</span>
</div>
<h2 class="font-organic-headline text-3xl md:text-4xl font-bold text-organic-on-surface tracking-tight">
            Pertanyaan yang Sering Diajukan
          </h2>
<p class="text-base text-organic-on-surface-variant max-w-xl">
            Semua hal yang perlu Anda ketahui mengenai standar pakan organik, sertifikasi veteriner, dan kemitraan suplai.
          </p>
</div>
<!-- Interactive FAQ Accordion List -->
<div class="flex flex-col gap-4" id="faq-accordion-group">
<!-- Item 1 -->
<div class="faq-item rounded-2xl bg-white border border-organic-outline-variant/40 shadow-xs transition-all overflow-hidden">
<button class="w-full p-6 text-left flex items-center justify-between gap-4 focus:outline-none" onclick="toggleFaq(this)">
<span class="font-organic-headline text-base sm:text-lg font-semibold text-organic-on-surface">
                Apa perbedaan utama daging &amp; susu pasture-raised organik dibanding konvensional?
              </span>
<span class="faq-icon material-symbols-outlined text-organic-primary text-[24px] transition-transform duration-300 shrink-0">expand_more</span>
</button>
<div class="faq-body max-h-0 overflow-hidden transition-all duration-300 ease-in-out px-6">
<div class="pb-6 text-sm text-organic-on-surface-variant leading-relaxed border-t border-organic-outline-variant/20 pt-4">
                Ternak yang dipelihara secara <span class="font-semibold text-organic-primary">pasture-raised organik</span> mengonsumsi hijauan alami kaya klorofil dan serat hidup. Hal ini menghasilkan daging dengan profil lemak sehat lebih tinggi (asam linoleat terkonjugasi/CLA), rasio Omega-3 seimbang, bebas residu hormon pemacu pertumbuhan, dan tekstur rasa yang murni gurih alami. Susu yang dihasilkan pun memiliki profil beta-kasein A2 alami yang jauh lebih ramah pencernaan manusia.
              </div>
</div>
</div>
<!-- Item 2 -->
<div class="faq-item rounded-2xl bg-white border border-organic-outline-variant/40 shadow-xs transition-all overflow-hidden">
<button class="w-full p-6 text-left flex items-center justify-between gap-4 focus:outline-none" onclick="toggleFaq(this)">
<span class="font-organic-headline text-base sm:text-lg font-semibold text-organic-on-surface">
                Bagaimana peternakan organik mengatasi penyakit tanpa antibiotik sintetis?
              </span>
<span class="faq-icon material-symbols-outlined text-organic-primary text-[24px] transition-transform duration-300 shrink-0">expand_more</span>
</button>
<div class="faq-body max-h-0 overflow-hidden transition-all duration-300 ease-in-out px-6">
<div class="pb-6 text-sm text-organic-on-surface-variant leading-relaxed border-t border-organic-outline-variant/20 pt-4">
                Kunci utama kami adalah <span class="font-semibold text-organic-primary">pencegahan holistik</span>. Dengan kepadatan rendah, sinar matahari melimpah, dan sirkulasi udara pegunungan segar, sistem imun alami hewan tetap prima. Ketika terjadi gangguan ringan, tim veteriner kami mengaplikasikan fitofarmaka (ekstrak temulawak, kunyit, daun sambiloto, dan probiotik usus aktif). Apabila antibiotik esensial medis terpaksa diberikan demi menyelamatkan nyawa hewan, ternak tersebut segera dikeluarkan dari jalur distribusi organik.
              </div>
</div>
</div>
<!-- Item 3 -->
<div class="faq-item rounded-2xl bg-white border border-organic-outline-variant/40 shadow-xs transition-all overflow-hidden">
<button class="w-full p-6 text-left flex items-center justify-between gap-4 focus:outline-none" onclick="toggleFaq(this)">
<span class="font-organic-headline text-base sm:text-lg font-semibold text-organic-on-surface">
                Apakah pakan yang diberikan tersertifikasi non-GMO dan bebas pestisida?
              </span>
<span class="faq-icon material-symbols-outlined text-organic-primary text-[24px] transition-transform duration-300 shrink-0">expand_more</span>
</button>
<div class="faq-body max-h-0 overflow-hidden transition-all duration-300 ease-in-out px-6">
<div class="pb-6 text-sm text-organic-on-surface-variant leading-relaxed border-t border-organic-outline-variant/20 pt-4">
                Ya, 100% tersertifikasi. Rumput gajah (Napier), odot, indigofera, dan alfalfa ditanam di lahan yang telah melalui masa konversi tanah minimal 3 tahun tanpa paparan pestisida kimia sintetis maupun herbisida. Kami melakukan uji laboratorium berkala terhadap tanah dan sampel hijauan untuk memastikan zero residual chemical.
              </div>
</div>
</div>
<!-- Item 4 -->
<div class="faq-item rounded-2xl bg-white border border-organic-outline-variant/40 shadow-xs transition-all overflow-hidden">
<button class="w-full p-6 text-left flex items-center justify-between gap-4 focus:outline-none" onclick="toggleFaq(this)">
<span class="font-organic-headline text-base sm:text-lg font-semibold text-organic-on-surface">
                Bagaimana cara konsumen atau restoran bermitra untuk pasokan berkala?
              </span>
<span class="faq-icon material-symbols-outlined text-organic-primary text-[24px] transition-transform duration-300 shrink-0">expand_more</span>
</button>
<div class="faq-body max-h-0 overflow-hidden transition-all duration-300 ease-in-out px-6">
<div class="pb-6 text-sm text-organic-on-surface-variant leading-relaxed border-t border-organic-outline-variant/20 pt-4">
                Kami menyediakan skema kemitraan <span class="font-semibold text-organic-primary">Farm-to-Table Hospitality</span> untuk restoran, hotel, dan keluarga mandiri. Anda dapat memesan alokasi ternak (Whole Carcass Reservation atau Cut-Selection Weekly) melalui portal klien kami atau langsung berkonsultasi via WhatsApp bersama representatif peternakan kami untuk jadwal panen dan pengiriman dingin rantai steril.
              </div>
</div>
</div>
</div>
</div>
</section>
<!-- SECTION: PLEDGE & BOOKING BANNER -->
<section class="w-full max-w-[1380px] mx-auto px-6 md:px-10 lg:px-12 py-16">
<div class="rounded-3xl bg-gradient-to-r from-organic-primary via-organic-primary-container to-emerald-900 text-white p-8 md:p-14 relative overflow-hidden flex flex-col md:flex-row items-center justify-between gap-8 shadow-2xl">
<div class="absolute -right-20 -bottom-20 w-80 h-80 rounded-full bg-emerald-400/20 blur-3xl pointer-events-none"></div>
<div class="flex flex-col gap-3 max-w-2xl relative z-10 text-center md:text-left">
<div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/15 backdrop-blur-sm text-emerald-200 text-xs font-semibold w-fit mx-auto md:mx-0">
<span class="material-symbols-outlined text-[16px]">nature</span>
<span>Komitmen Regeneratif 2030</span>
</div>
<h2 class="font-organic-headline text-2xl sm:text-3xl lg:text-4xl font-bold tracking-tight">
            Ingin Mengunjungi Peternakan Kami &amp; Melihat Harmoni Alam Langsung?
          </h2>
<p class="text-sm md:text-base text-white/85 leading-relaxed">
            Pintu padang gembala kami selalu terbuka untuk edukasi keluarga, kemitraan chef restoran, dan transparansi peternakan ramah lingkungan.
          </p>
</div>
<div class="flex flex-col sm:flex-row gap-3 w-full md:w-auto relative z-10 shrink-0">
<button class="h-14 px-8 rounded-2xl bg-white text-organic-primary font-bold text-sm flex items-center justify-center gap-2 hover:bg-emerald-50 transition-all shadow-lg active:scale-95" onclick="openBookingModal()">
<span class="material-symbols-outlined text-[20px]">calendar_today</span>
<span>Jadwalkan Tur Ladang</span>
</button>
</div>
</div>
</section>
</main>
<!-- ==================== FOOTER (#kontak) ==================== -->
<footer class="w-full bg-organic-surface-container-low border-t border-organic-outline-variant/30 pt-16 pb-12" id="kontak">
<div class="max-w-[1380px] mx-auto px-6 md:px-10 lg:px-12">
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-10 lg:gap-12 pb-12 border-b border-organic-outline-variant/40">
<!-- Col 1: Bio -->
<div class="lg:col-span-4 flex flex-col gap-4">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-xl bg-organic-primary text-white flex items-center justify-center">
<span class="material-symbols-outlined text-[22px]">potted_plant</span>
</div>
<span class="font-organic-headline text-xl font-bold text-organic-on-surface">AgriTernak</span>
</div>
<p class="text-xs md:text-sm text-organic-on-surface-variant leading-relaxed">
            Platform integrasi ekosistem peternakan pintar, pemantauan biometrik ternak real-time, dan manajemen pakan regeneratif terdepan di Indonesia.
          </p>
<div class="flex flex-wrap gap-2 pt-1">
<div class="flex items-center gap-1.5 px-3 py-1 rounded-lg bg-white border border-organic-outline-variant/40 text-xs font-medium text-organic-on-surface">
<span class="material-symbols-outlined text-organic-primary text-[16px]">verified</span>
<span>ISO 22000 Terakreditasi</span>
</div>
<div class="flex items-center gap-1.5 px-3 py-1 rounded-lg bg-white border border-organic-outline-variant/40 text-xs font-medium text-organic-on-surface">
<span class="material-symbols-outlined text-organic-primary text-[16px]">eco</span>
<span>Organik &amp; Bebas Hormon</span>
</div>
</div>
</div>
<!-- Col 2: Solusi Nav -->
<div class="lg:col-span-2 flex flex-col gap-3">
<span class="text-xs font-bold uppercase tracking-wider text-organic-on-surface">Solusi</span>
<ul class="flex flex-col gap-2.5 text-xs text-organic-on-surface-variant">
<li><a class="hover:text-organic-primary transition-colors" href="#solusi">Formulasi Hijauan Murni</a></li>
<li><a class="hover:text-organic-primary transition-colors" href="#teknologi">Telemetri Pastura IoT</a></li>
<li><a class="hover:text-organic-primary transition-colors" href="#pilar">Rotasi Regeneratif Tanah</a></li>
<li><a class="hover:text-organic-primary transition-colors" href="#solusi">Program Fitofarmaka Hewan</a></li>
</ul>
</div>
<!-- Col 3: Navigasi Cepat -->
<div class="lg:col-span-2 flex flex-col gap-3">
<span class="text-xs font-bold uppercase tracking-wider text-organic-on-surface">Perusahaan</span>
<ul class="flex flex-col gap-2.5 text-xs text-organic-on-surface-variant">
<li><a class="hover:text-organic-primary transition-colors" href="#beranda">Tentang AgriTernak</a></li>
<li><a class="hover:text-organic-primary transition-colors" href="#pilar">Keunggulan 4 Pilar</a></li>
<li><a class="hover:text-organic-primary transition-colors" href="#faq">Pusat Bantuan &amp; FAQ</a></li>
<li><a class="hover:text-organic-primary transition-colors" href="#cerita-peternak">Kisah Mitra Peternak</a></li>
</ul>
</div>
<!-- Col 4: Kontak & Formulir Singkat -->
<div class="lg:col-span-4 flex flex-col gap-3">
<span class="text-xs font-bold uppercase tracking-wider text-organic-on-surface">Hubungi Kantor Operasional</span>
<div class="flex flex-col gap-2.5 text-xs text-organic-on-surface-variant">
<div class="flex items-start gap-2.5">
<span class="material-symbols-outlined text-[18px] text-organic-primary shrink-0 mt-0.5">location_on</span>
<span>Sentra Agribisnis Terpadu, Jl. Agro Industri No. 42, Bogor, Jawa Barat</span>
</div>
<div class="flex items-center gap-2.5">
<span class="material-symbols-outlined text-[18px] text-organic-primary shrink-0">call</span>
<a class="hover:text-organic-primary font-medium" href="tel:+6282189204100">+62 821 8920 4100</a>
</div>
<div class="flex items-center gap-2.5">
<span class="material-symbols-outlined text-[18px] text-organic-primary shrink-0">mail</span>
<span>halo@agriternak.id</span>
</div>
</div>
<div class="pt-2">
<span class="text-[11px] font-bold text-organic-on-surface uppercase block mb-2">Konsultasi Kemitraan Langsung</span>
<div class="flex items-center gap-2">
<input class="bg-white text-xs px-3 py-2.5 rounded-xl border border-organic-outline-variant/60 focus:ring-2 focus:ring-organic-primary focus:outline-none w-full" id="quick-contact-input" placeholder="Ketik email atau no WhatsApp..." type="text"/>
<button class="bg-organic-primary hover:bg-organic-primary-container text-white px-4 py-2.5 rounded-xl text-xs font-bold shrink-0 shadow-sm transition-all" onclick="handleQuickSubscribe()">Kirim</button>
</div>
</div>
</div>
</div>
<div class="pt-8 flex flex-col md:flex-row items-center justify-between gap-4 text-xs text-organic-outline">
<span>© 2025 PT AgriTernak Presisi Nusantara. Seluruh Hak Cipta Dilindungi.</span>
<div class="flex items-center gap-6">
<a class="hover:text-organic-primary transition-colors" href="#">Kebijakan Privasi</a>
<a class="hover:text-organic-primary transition-colors" href="#">Syarat &amp; Ketentuan</a>
<a class="hover:text-organic-primary transition-colors" href="#">Sertifikasi SNI Organik</a>
</div>
</div>
</div>
</footer>
<!-- ==================== FIXED ACTION FLOATING WIDGETS ==================== -->
<!-- FLOATING AI CONSULTATION BUTTON (Bottom Left - repositioned safely) -->
<div class="fixed bottom-6 left-6 z-40">
<button class="group flex items-center gap-3 h-13 py-2 pl-2.5 pr-4 rounded-full bg-white/95 backdrop-blur-xl shadow-[0_8px_25px_rgba(20,83,45,0.18)] hover:shadow-2xl border border-organic-outline-variant/40 hover:bg-organic-moss-light/50 transition-all active:scale-95" onclick="openAiModal()" type="button">
<div class="relative w-10 h-10 rounded-full bg-gradient-to-tr from-organic-primary to-emerald-600 flex items-center justify-center text-white shadow-sm">
<span class="material-symbols-outlined text-[20px]">smart_toy</span>
<span class="absolute -top-0.5 -right-0.5 flex h-3 w-3">
<span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
<span class="relative inline-flex rounded-full h-3 w-3 bg-emerald-500"></span>
</span>
</div>
<div class="flex flex-col text-left">
<span class="text-xs font-bold text-organic-on-surface leading-tight">Tanya AgriAI</span>
<span class="text-[10px] font-mono text-organic-primary font-semibold">Konsultasi Pakan Herbal</span>
</div>
</button>
</div>
<!-- FLOATING WHATSAPP BUTTON (Bottom Right - with Interactivity Popover) -->
<div class="fixed bottom-6 right-6 z-40 flex items-center gap-3">
<!-- Popover on Hover/Desktop Click -->
<div class="hidden md:flex items-center px-4 py-2 rounded-full bg-white border border-organic-outline-variant/50 shadow-md" id="wa-popover">
<span class="text-xs font-semibold text-organic-on-surface">Tanya Dokter Hewan &amp; Agronom</span>
</div>
<button aria-label="Konsultasi WhatsApp Dokter Hewan" class="relative w-14 h-14 rounded-full bg-[#25D366] text-white flex items-center justify-center shadow-[0_8px_24px_rgba(37,211,102,0.4)] hover:scale-105 active:scale-95 transition-all" onclick="toggleWaModal()">
<span class="material-symbols-outlined text-[30px]">chat</span>
<span class="absolute top-0 right-0 flex h-3.5 w-3.5">
<span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-white opacity-75"></span>
<span class="relative inline-flex rounded-full h-3.5 w-3.5 bg-white"></span>
</span>
</button>
</div>
<!-- ==================== MODALS & INTERACTIVE OVERLAYS ==================== -->
<!-- 1. AI MODAL DIALOG -->
<div class="fixed inset-0 z-50 bg-black/50 backdrop-blur-xs flex items-center justify-center p-4 opacity-0 pointer-events-none transition-all duration-300" id="ai-modal">
<div class="w-full max-w-lg bg-white rounded-3xl shadow-2xl border border-organic-outline-variant/40 flex flex-col max-h-[85vh] overflow-hidden transform scale-95 transition-transform duration-300">
<!-- Modal Header -->
<div class="p-5 bg-gradient-to-r from-organic-primary to-emerald-800 text-white flex items-center justify-between">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-xl bg-white/15 backdrop-blur-sm flex items-center justify-center">
<span class="material-symbols-outlined text-[24px]">psychology</span>
</div>
<div>
<h3 class="font-bold text-sm">AgriAI Organik Assistant</h3>
<span class="text-[11px] text-emerald-200">Spesialis Nutrisi Pastura &amp; Ruminansia</span>
</div>
</div>
<button class="w-8 h-8 rounded-lg bg-white/10 hover:bg-white/20 flex items-center justify-center" onclick="closeAiModal()">
<span class="material-symbols-outlined text-[20px]">close</span>
</button>
</div>
<!-- Chat History Stream -->
<div class="p-5 flex-1 overflow-y-auto space-y-4 custom-scrollbar bg-organic-surface-container-low/40 text-xs" id="ai-chat-box">
<div class="flex items-start gap-3">
<div class="w-8 h-8 rounded-full bg-organic-primary text-white flex items-center justify-center shrink-0 text-xs font-bold">AI</div>
<div class="p-3.5 rounded-2xl rounded-tl-none bg-white border border-organic-outline-variant/40 text-organic-on-surface leading-relaxed max-w-[85%] shadow-xs">
            Halo! Saya asisten pintar <strong>AgriTernak</strong>. Anda bisa menanyakan:
            <ul class="list-disc pl-4 mt-2 space-y-1 text-organic-on-surface-variant">
<li>Racikan fitofarmaka/herbal untuk ternak flu</li>
<li>Perbandingan rasio hijauan legum vs rumput odot</li>
<li>Siklus rotasi padang gembala 21 hari</li>
</ul>
</div>
</div>
</div>
<!-- Quick Prompt Chips -->
<div class="px-5 py-2.5 bg-white border-t border-organic-outline-variant/20 flex gap-2 overflow-x-auto custom-scrollbar">
<button class="text-[11px] whitespace-nowrap px-3 py-1.5 rounded-full bg-organic-moss-pale hover:bg-organic-moss-light text-organic-primary font-medium border border-organic-secondary-container/30" onclick="askPrompt('Berapa takaran fermentasi silase tanpa bau?')">
          Fermentasi Silase Bebas Bau
        </button>
<button class="text-[11px] whitespace-nowrap px-3 py-1.5 rounded-full bg-organic-moss-pale hover:bg-organic-moss-light text-organic-primary font-medium border border-organic-secondary-container/30" onclick="askPrompt('Jamu kunyit temulawak untuk nafsu makan sapi')">
          Jamu Herbal Ternak
        </button>
</div>
<!-- Input Message -->
<form class="p-4 bg-white border-t border-organic-outline-variant/30 flex items-center gap-2" onsubmit="handleAiSubmit(event)">
<input class="flex-1 bg-organic-surface-container-low text-xs px-4 py-3 rounded-xl border border-organic-outline-variant/40 focus:ring-2 focus:ring-organic-primary focus:outline-none" id="ai-input" placeholder="Ketik pertanyaan agrikultur organik..." type="text"/>
<button class="w-11 h-11 rounded-xl bg-organic-primary hover:bg-organic-primary-container text-white flex items-center justify-center transition-all" type="submit">
<span class="material-symbols-outlined text-[20px]">send</span>
</button>
</form>
</div>
</div>
<!-- 2. WHATSAPP EXPERT DIALOG MODAL -->
<div class="fixed inset-0 z-50 bg-black/50 backdrop-blur-xs flex items-center justify-center p-4 opacity-0 pointer-events-none transition-all duration-300" id="wa-modal">
<div class="w-full max-w-md bg-white rounded-3xl shadow-2xl border border-organic-outline-variant/40 overflow-hidden transform scale-95 transition-transform duration-300">
<div class="p-5 bg-[#25D366] text-white flex items-center justify-between">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-full bg-white/20 flex items-center justify-center">
<span class="material-symbols-outlined text-[24px]">support_agent</span>
</div>
<div>
<h3 class="font-bold text-sm">Konsultasi Dokter Hewan &amp; Mitra</h3>
<span class="text-[11px] text-white/90">Respon cepat via WhatsApp Resmi</span>
</div>
</div>
<button class="w-8 h-8 rounded-lg bg-black/10 hover:bg-black/20 flex items-center justify-center text-white" onclick="closeWaModal()">
<span class="material-symbols-outlined text-[20px]">close</span>
</button>
</div>
<div class="p-6 flex flex-col gap-4 text-xs text-organic-on-surface">
<p class="text-organic-on-surface-variant">
          Pilih topik konsultasi untuk langsung terhubung dengan staf veteriner &amp; agronomi kami:
        </p>
<a class="p-3.5 rounded-2xl bg-organic-surface-container-low hover:bg-organic-moss-light border border-organic-outline-variant/40 flex items-center justify-between transition-colors" href="https://wa.me/6282189204100?text=Halo%20Dokter%20Hewan%20AgriTernak,%20saya%20ingin%20konsultasi%20kesehatan%20dan%20pakan%20ternak%20organik." target="_blank">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-organic-primary text-[22px]">medical_services</span>
<div>
<div class="font-bold text-organic-on-surface">Konsultasi Kesehatan Ternak</div>
<div class="text-[11px] text-organic-outline">Diagnosis herbal, fitofarmaka &amp; biosekuriti</div>
</div>
</div>
<span class="material-symbols-outlined text-organic-primary text-[18px]">arrow_forward</span>
</a>
<a class="p-3.5 rounded-2xl bg-organic-surface-container-low hover:bg-organic-moss-light border border-organic-outline-variant/40 flex items-center justify-between transition-colors" href="https://wa.me/6282189204100?text=Halo%20AgriTernak,%20saya%20ingin%20bermitra%20suplai%20daging%2Fsusu%20organik%20restoran%20atau%20pribadi." target="_blank">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-organic-primary text-[22px]">handshake</span>
<div>
<div class="font-bold text-organic-on-surface">Kemitraan Suplai Farm-to-Table</div>
<div class="text-[11px] text-organic-outline">Penyediaan daging/susu organik rutin</div>
</div>
</div>
<span class="material-symbols-outlined text-organic-primary text-[18px]">arrow_forward</span>
</a>
<div class="pt-2 text-center text-[11px] text-organic-outline">
          WhatsApp Resmi: <strong>+62 821 8920 4100</strong> (Aktif 08.00 - 18.00 WIB)
        </div>
</div>
</div>
</div>
<!-- 3. TOUR BOOKING REGISTRATION MODAL -->
<div class="fixed inset-0 z-50 bg-black/60 backdrop-blur-xs flex items-center justify-center p-4 opacity-0 pointer-events-none transition-all duration-300" id="booking-modal">
<div class="w-full max-w-xl bg-white rounded-3xl shadow-2xl border border-organic-outline-variant/40 overflow-hidden transform scale-95 transition-transform duration-300">
<div class="p-6 bg-gradient-to-r from-organic-primary to-emerald-800 text-white flex items-center justify-between">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-xl bg-white/20 flex items-center justify-center">
<span class="material-symbols-outlined text-[24px]">calendar_today</span>
</div>
<div>
<h3 class="font-bold text-base">Registrasi Tur Ladang Pastura</h3>
<span class="text-xs text-emerald-200">Kunjungan Terbuka &amp; Edukasi Alam</span>
</div>
</div>
<button class="w-8 h-8 rounded-lg bg-white/10 hover:bg-white/20 flex items-center justify-center text-white" onclick="closeBookingModal()">
<span class="material-symbols-outlined text-[20px]">close</span>
</button>
</div>
<form class="p-6 sm:p-8 space-y-4" onsubmit="handleBookingSubmit(event)">
<div>
<label class="block text-xs font-bold text-organic-on-surface uppercase mb-1">Nama Lengkap</label>
<input class="w-full text-xs px-4 py-3 rounded-xl bg-organic-surface-container-low border border-organic-outline-variant/50 focus:ring-2 focus:ring-organic-primary focus:outline-none" id="tour-name" placeholder="Contoh: Budi Santoso" required="" type="text"/>
</div>
<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
<div>
<label class="block text-xs font-bold text-organic-on-surface uppercase mb-1">Nomor WhatsApp</label>
<input class="w-full text-xs px-4 py-3 rounded-xl bg-organic-surface-container-low border border-organic-outline-variant/50 focus:ring-2 focus:ring-organic-primary focus:outline-none" id="tour-wa" placeholder="0812xxxxxxx" required="" type="tel"/>
</div>
<div>
<label class="block text-xs font-bold text-organic-on-surface uppercase mb-1">Rencana Tanggal</label>
<input class="w-full text-xs px-4 py-3 rounded-xl bg-organic-surface-container-low border border-organic-outline-variant/50 focus:ring-2 focus:ring-organic-primary focus:outline-none" id="tour-date" required="" type="date"/>
</div>
</div>
<div>
<label class="block text-xs font-bold text-organic-on-surface uppercase mb-1">Tipe Kunjungan</label>
<select class="w-full text-xs px-4 py-3 rounded-xl bg-organic-surface-container-low border border-organic-outline-variant/50 focus:ring-2 focus:ring-organic-primary focus:outline-none" id="tour-type">
<option value="Keluarga &amp; Rekreasi Edukasi">Edukasi Rekreasi Keluarga (Family Tour)</option>
<option value="Kemitraan Restoran &amp; Bisnis">Mitra Bisnis &amp; Restoran (B2B Sourcing)</option>
<option value="Riset Akademis &amp; Studi Peternakan">Riset &amp; Studi Pelajar/Universitas</option>
</select>
</div>
<p class="text-[11px] text-organic-outline">
          * Tur gratis dan mencakup pendampingan agronom, sesi memerah susu alami, dan icip produk olahan organik.
        </p>
<div class="pt-4 flex items-center justify-end gap-3">
<button class="px-5 py-2.5 rounded-xl border border-organic-outline-variant/60 text-xs font-semibold text-organic-on-surface hover:bg-organic-surface-container" onclick="closeBookingModal()" type="button">
            Batal
          </button>
<button class="px-6 py-2.5 rounded-xl bg-organic-primary hover:bg-organic-primary-container text-white text-xs font-bold shadow-md shadow-primary/20" type="submit">
            Konfirmasi Pendaftaran Tur
          </button>
</div>
</form>
</div>
</div>
<!-- ==================== JAVASCRIPT LOGIC ==================== -->
<script>
    // 1. Mobile Menu Drawer
    function toggleMobileMenu() {
      const menu = document.getElementById('mobile-menu');
      const icon = document.getElementById('menu-icon');
      if (menu.classList.contains('hidden')) {
        menu.classList.remove('hidden');
        icon.textContent = 'close';
      } else {
        menu.classList.add('hidden');
        icon.textContent = 'menu';
      }
    }

    function closeMobileMenu() {
      const menu = document.getElementById('mobile-menu');
      const icon = document.getElementById('menu-icon');
      if (menu) {
        menu.classList.add('hidden');
        if (icon) icon.textContent = 'menu';
      }
    }

    // 2. FAQ Accordion Interaction
    function toggleFaq(buttonElement) {
      const item = buttonElement.closest('.faq-item');
      const body = item.querySelector('.faq-body');
      const icon = buttonElement.querySelector('.faq-icon');
      const isOpen = body.style.maxHeight && body.style.maxHeight !== '0px';

      // Close all items
      document.querySelectorAll('.faq-item').forEach(el => {
        const otherBody = el.querySelector('.faq-body');
        const otherIcon = el.querySelector('.faq-icon');
        if (otherBody) otherBody.style.maxHeight = '0px';
        if (otherIcon) otherIcon.style.transform = 'rotate(0deg)';
      });

      // If clicked item was not open, open it
      if (!isOpen) {
        body.style.maxHeight = body.scrollHeight + 'px';
        icon.style.transform = 'rotate(180deg)';
      }
    }

    // Open first FAQ by default for nice presentation
    document.addEventListener('DOMContentLoaded', () => {
      const firstFaqBtn = document.querySelector('.faq-item button');
      if (firstFaqBtn) {
        toggleFaq(firstFaqBtn);
      }
    });

    // 3. Toast Notifications
    function showToast(message, type = 'success') {
      const container = document.getElementById('toast-container');
      const toast = document.createElement('div');
      toast.className = `pointer-events-auto flex items-center gap-3 px-4 py-3 rounded-2xl bg-white shadow-xl border border-outline-variant/40 text-xs font-semibold transition-all duration-300 translate-y-2 opacity-0 ${
        type === 'success' ? 'text-organic-primary' : 'text-organic-on-surface'
      }`;

      const icon = type === 'success' ? 'check_circle' : 'info';
      toast.innerHTML = `
        <span class="material-symbols-outlined text-[20px] text-organic-primary">${icon}</span>
        <span>${message}</span>
      `;

      container.appendChild(toast);
      setTimeout(() => {
        toast.classList.remove('translate-y-2', 'opacity-0');
      }, 10);

      setTimeout(() => {
        toast.classList.add('opacity-0', 'translate-x-4');
        setTimeout(() => toast.remove(), 300);
      }, 3800);
    }

    // 4. Modal Helpers
    function openModalElement(modalId) {
      const modal = document.getElementById(modalId);
      if (!modal) return;
      modal.classList.remove('opacity-0', 'pointer-events-none');
      const inner = modal.querySelector('div');
      if (inner) inner.classList.remove('scale-95');
    }

    function closeModalElement(modalId) {
      const modal = document.getElementById(modalId);
      if (!modal) return;
      modal.classList.add('opacity-0', 'pointer-events-none');
      const inner = modal.querySelector('div');
      if (inner) inner.classList.add('scale-95');
    }

    // Modal controls
    function openAiModal() { openModalElement('ai-modal'); }
    function closeAiModal() { closeModalElement('ai-modal'); }

    function toggleWaModal() { openModalElement('wa-modal'); }
    function closeWaModal() { closeModalElement('wa-modal'); }

    function openBookingModal() { openModalElement('booking-modal'); }
    function closeBookingModal() { closeModalElement('booking-modal'); }

    // 5. AI Chat Simulated Responses
    function handleAiSubmit(event) {
      event.preventDefault();
      const input = document.getElementById('ai-input');
      const query = input.value.trim();
      if (!query) return;

      appendAiMessage(query, 'user');
      input.value = '';

      setTimeout(() => {
        let reply = "Pemberian pakan organik pada peternakan kami berfokus pada keseimbangan rasio 70% hijauan berserat tinggi (odot/alfalfa) dan 30% legum berprotein, ditambah inokulasi probiotik mikroba lokal.";
        if (query.toLowerCase().includes('jamu') || query.toLowerCase().includes('herbal') || query.toLowerCase().includes('sakit')) {
          reply = "Resep fitofarmaka alami standar kami mencakup: perasan ekstrak rimpang kunyit (anti-inflamasi) + temulawak (penambah nafsu makan) + molase tetes tebu yang difermentasikan 24 jam dengan EM-4 organik.";
        } else if (query.toLowerCase().includes('silase') || query.toLowerCase().includes('pakan')) {
          reply = "Untuk silase bebas bau busuk, potong hijauan dengan kadar air 60-70%, padatkan dalam silo anaerobik kedap udara, lalu berikan dedak padi 3% sebagai substrat fermentasi.";
        }
        appendAiMessage(reply, 'bot');
      }, 700);
    }

    function askPrompt(text) {
      document.getElementById('ai-input').value = text;
      handleAiSubmit(new Event('submit'));
    }

    function appendAiMessage(text, sender) {
      const chatBox = document.getElementById('ai-chat-box');
      const msgWrapper = document.createElement('div');
      msgWrapper.className = sender === 'user' ? 'flex items-start gap-3 justify-end' : 'flex items-start gap-3';

      if (sender === 'user') {
        msgWrapper.innerHTML = `
          <div class="p-3 rounded-2xl rounded-tr-none bg-organic-primary text-white leading-relaxed max-w-[85%] shadow-xs">
            ${text}
          </div>
          <div class="w-8 h-8 rounded-full bg-organic-surface-container-high text-organic-on-surface flex items-center justify-center shrink-0 text-xs font-bold">Anda</div>
        `;
      } else {
        msgWrapper.innerHTML = `
          <div class="w-8 h-8 rounded-full bg-organic-primary text-white flex items-center justify-center shrink-0 text-xs font-bold">AI</div>
          <div class="p-3 rounded-2xl rounded-tl-none bg-white border border-organic-outline-variant/40 text-organic-on-surface leading-relaxed max-w-[85%] shadow-xs">
            ${text}
          </div>
        `;
      }
      chatBox.appendChild(msgWrapper);
      chatBox.scrollTop = chatBox.scrollHeight;
    }

    // 6. Form submissions
    function handleBookingSubmit(event) {
      event.preventDefault();
      const name = document.getElementById('tour-name').value;
      const date = document.getElementById('tour-date').value;
      closeBookingModal();
      showToast(`Pendaftaran tur atas nama ${name} untuk tgl ${date} berhasil dicatat! Tim kami akan konfirmasi via WA.`, 'success');
      event.target.reset();
    }

    function handleQuickSubscribe() {
      const input = document.getElementById('quick-contact-input');
      if (input.value.trim().length > 3) {
        showToast('Terima kasih! Kami akan segera menghubungi kontak Anda.', 'success');
        input.value = '';
      } else {
        showToast('Harap masukkan email atau nomor WhatsApp yang valid.', 'info');
      }
    }

    function downloadHandbook() {
      showToast('Mengunduh E-Book: Panduan Peternakan Organik Regeneratif (PDF)...', 'success');
    }
  </script>
</body></html>