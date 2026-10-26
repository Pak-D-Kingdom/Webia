@verbatim
<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>KUSUMA NINGRAT | Royal Heritage Keraton Catering & Haute Gastronomie</title>

  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Lucide Icons CDN -->
  <script src="https://unpkg.com/lucide@latest"></script>

  <!-- Google Fonts: Cinzel Decorative, Cormorant Garamond & Plus Jakarta Sans -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@400;700;900&family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;0,700;1,400;1,600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            emerald: {
              950: '#03130C',
              900: '#051F14',
              850: '#082F20',
              800: '#0C3D2B',
              700: '#14533B',
              600: '#1D7051'
            },
            royalGold: {
              100: '#FBF5DF',
              200: '#F3E5AB',
              300: '#E5C158',
              400: '#D4AF37',
              500: '#B89428',
              600: '#997A15',
              700: '#6E560B',
              800: '#4D3C06'
            },
            mahogany: '#260F0D',
            pearl: '#F8F5EE'
          },
          fontFamily: {
            regal: ['"Cinzel Decorative"', 'serif'],
            serif: ['"Cormorant Garamond"', 'serif'],
            sans: ['"Plus Jakarta Sans"', 'sans-serif'],
          },
          backgroundImage: {
            'gold-shimmer': 'linear-gradient(135deg, #FBF5DF 0%, #E5C158 25%, #D4AF37 50%, #997A15 80%, #E5C158 100%)',
            'gold-foil': 'linear-gradient(90deg, #997A15 0%, #F3E5AB 50%, #997A15 100%)',
            'emerald-radial': 'radial-gradient(circle at 50% 30%, #0C3D2B 0%, #051F14 60%, #03130C 100%)',
            'ornate-pattern': 'radial-gradient(circle at center, rgba(212,175,55,0.08) 1px, transparent 1px)'
          }
        }
      }
    }
  </script>

  <style>
    /* Custom Gold & Emerald Scrollbar */
    ::-webkit-scrollbar {
      width: 7px;
    }
    ::-webkit-scrollbar-track {
      background: #03130C;
    }
    ::-webkit-scrollbar-thumb {
      background: linear-gradient(180deg, #997A15, #D4AF37, #997A15);
      border-radius: 4px;
    }
    ::-webkit-scrollbar-thumb:hover {
      background: #F3E5AB;
    }

    /* Filigree Ornamental Border Style */
    .ornate-border {
      border: 1px solid rgba(212, 175, 55, 0.35);
      box-shadow: inset 0 0 18px rgba(212, 175, 55, 0.05);
    }
    .ornate-double-border {
      border: 3px double rgba(212, 175, 55, 0.5);
    }
    .gold-glow {
      box-shadow: 0 0 25px rgba(212, 175, 55, 0.22);
    }
    .gold-glow-strong {
      box-shadow: 0 0 40px rgba(212, 175, 55, 0.45);
    }
    .text-gold-gradient {
      background: linear-gradient(135deg, #FFF3CA 0%, #E5C158 40%, #D4AF37 70%, #997A15 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    /* Custom range thumb for Banquet Slider */
    input[type=range]::-webkit-slider-thumb {
      -webkit-appearance: none;
      height: 24px;
      width: 24px;
      border-radius: 50%;
      background: radial-gradient(circle, #FFF3CA 20%, #D4AF37 70%, #997A15 100%);
      border: 2px solid #03130C;
      cursor: pointer;
      box-shadow: 0 0 12px rgba(212, 175, 55, 0.8);
      transition: all 0.2s ease;
    }
    input[type=range]::-webkit-slider-thumb:hover {
      transform: scale(1.18);
      box-shadow: 0 0 20px rgba(243, 229, 171, 0.95);
    }

    /* Batik / Songket Motif Watermark SVG */
    .batik-bg {
      background-image: 
        radial-gradient(rgba(212, 175, 55, 0.06) 1.5px, transparent 1.5px),
        radial-gradient(rgba(212, 175, 55, 0.03) 1.5px, transparent 1.5px);
      background-size: 36px 36px;
      background-position: 0 0, 18px 18px;
    }
  </style>
</head>

<body class="bg-emerald-950 text-pearl font-sans antialiased selection:bg-royalGold-400 selection:text-emerald-950 overflow-x-hidden batik-bg">

  <!-- ================= NOTIFICATION TOAST ================= -->
  <div id="toast" class="fixed bottom-24 left-6 z-50 transform -translate-y-12 opacity-0 pointer-events-none transition-all duration-300 flex items-center space-x-3 bg-emerald-900 ornate-double-border text-pearl px-5 py-4 rounded-lg shadow-2xl">
    <div class="w-8 h-8 rounded-full bg-royalGold-400/20 text-royalGold-300 flex items-center justify-center">
      <i data-lucide="crown" class="w-4 h-4"></i>
    </div>
    <span id="toast-message" class="text-xs font-serif tracking-wider">Titah Perjamuan Tercatat</span>
  </div>

  <!-- ================= 1. ROYAL HERITAGE TOPBAR ================= -->
  <aside aria-label="Titah Keraton" class="w-full bg-gradient-to-r from-emerald-950 via-emerald-900 to-emerald-950 border-b border-royalGold-500/30 text-xs py-2.5 px-6">
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center gap-2">
      <div class="flex items-center space-x-3 text-center md:text-left">
        <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-royalGold-500/20 text-royalGold-300 border border-royalGold-400/40 text-[10px] font-serif uppercase tracking-widest">
          <i data-lucide="sparkles" class="w-3 h-3 text-royalGold-300 inline"></i> Titah Dalem 2026/2027
        </span>
        <span class="text-royalGold-200/90 font-serif tracking-widest text-[11px]">
          Menerima Reservasi Jamuan Adat Ageng, Pernikahan Ningrat &amp; Resepsi Diplomatik
        </span>
      </div>
      
      <div class="flex items-center space-x-6 text-[11px] tracking-widest text-royalGold-300/80 font-serif uppercase">
        <span class="hidden sm:inline-flex items-center gap-1.5">
          <i data-lucide="shield-check" class="w-3.5 h-3.5 text-royalGold-400"></i> Dapur Pusaka 100% Halal
        </span>
        <a href="tel:+6281234567890" class="hover:text-royalGold-200 transition-colors flex items-center gap-1.5">
          <i data-lucide="phone-call" class="w-3.5 h-3.5 text-royalGold-400"></i> Protokoler Keraton (+62 812-3456-7890)
        </a>
      </div>
    </div>
  </aside>

  <!-- ================= 2. GRAND PALACE NAVBAR ================= -->
  <header class="sticky top-0 z-40 bg-emerald-950/90 backdrop-blur-md border-b border-royalGold-500/30 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-6 lg:px-12 h-24 flex items-center justify-between">
      
      <!-- Regal Crest & Brand Mark -->
      <a href="#" class="flex items-center gap-3.5 group">
        <div class="w-12 h-12 rounded-full border-2 border-royalGold-400/80 bg-gradient-to-br from-emerald-900 to-emerald-950 flex items-center justify-center gold-glow group-hover:border-royalGold-300 transition-all">
          <svg class="w-7 h-7 text-royalGold-300 transform group-hover:scale-110 transition-transform" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
            <path d="M12 2L15 8L21 9L17 14L18 20L12 17L6 20L7 14L3 9L9 8L12 2Z" fill="rgba(212,175,55,0.18)" stroke="#E5C158"/>
            <circle cx="12" cy="12" r="3" stroke="#FFF3CA"/>
          </svg>
        </div>
        <div class="flex flex-col">
          <span class="font-regal text-lg sm:text-xl tracking-[0.22em] text-royalGold-300 font-bold group-hover:text-royalGold-200 transition-colors">KUSUMA NINGRAT</span>
          <span class="text-[9px] uppercase tracking-[0.38em] text-pearl/70 font-serif">Royal Heritage Banquet &amp; Atelier</span>
        </div>
      </a>

      <!-- Desktop Links -->
      <nav class="hidden lg:flex items-center space-x-8 text-xs uppercase tracking-[0.22em] font-serif font-medium text-pearl/85">
        <a href="#pedigree" class="hover:text-royalGold-300 transition-colors">Filosofi Pusaka</a>
        <a href="#menus" class="hover:text-royalGold-300 transition-colors">Hidangan Ageng</a>
        <a href="#architect" class="text-royalGold-300 hover:text-royalGold-200 flex items-center gap-1.5">
          <span class="w-1.5 h-1.5 rounded-full bg-royalGold-400 animate-ping"></span> Arsitek Perjamuan
        </a>
        <a href="#heritage-gallery" class="hover:text-royalGold-300 transition-colors">Arsip Visual</a>
        <a href="#tasting-room" class="hover:text-royalGold-300 transition-colors">Uji Rasa Sultan</a>
      </nav>

      <!-- Right CTAs -->
      <div class="hidden sm:flex items-center space-x-4">
        <!-- Ceremonial Ambient Bell / Gamelan Chime Tone -->
        <button onclick="playGamelanGong()" class="p-2.5 rounded-full border border-royalGold-400/40 bg-emerald-900/60 text-royalGold-300 hover:bg-royalGold-500/20 transition-all" title="Bunyikan Gong Upacara">
          <i data-lucide="bell" class="w-4 h-4"></i>
        </button>

        <a href="#tasting-room" class="px-6 py-3 rounded-none border border-royalGold-400 bg-gold-shimmer text-emerald-950 text-xs font-serif font-bold uppercase tracking-[0.2em] shadow-lg shadow-royalGold-500/20 hover:brightness-110 active:scale-95 transition-all">
          Titah Audiensi
        </a>
      </div>

      <!-- Mobile Hamburger -->
      <button onclick="toggleMobileNav()" class="lg:hidden p-2 text-royalGold-300 hover:text-royalGold-200 focus:outline-none" aria-label="Toggle navigation">
        <i data-lucide="menu" class="w-6 h-6"></i>
      </button>
    </div>

    <!-- Mobile Navigation Drawer -->
    <div id="mobile-nav" class="hidden lg:hidden bg-emerald-950/98 border-b border-royalGold-500/30 px-6 py-8 space-y-4 text-xs font-serif uppercase tracking-[0.2em]">
      <a href="#pedigree" onclick="toggleMobileNav()" class="block py-2 text-pearl/90 hover:text-royalGold-300 border-b border-royalGold-500/10">Filosofi Pusaka</a>
      <a href="#menus" onclick="toggleMobileNav()" class="block py-2 text-pearl/90 hover:text-royalGold-300 border-b border-royalGold-500/10">Hidangan Ageng</a>
      <a href="#architect" onclick="toggleMobileNav()" class="block py-2 text-royalGold-300 border-b border-royalGold-500/10">Arsitek Perjamuan</a>
      <a href="#heritage-gallery" onclick="toggleMobileNav()" class="block py-2 text-pearl/90 hover:text-royalGold-300 border-b border-royalGold-500/10">Arsip Visual</a>
      <a href="#tasting-room" onclick="toggleMobileNav()" class="block py-2 text-pearl/90 hover:text-royalGold-300 border-b border-royalGold-500/10">Uji Rasa Sultan</a>
      <div class="pt-4 flex flex-col gap-3">
        <button onclick="playGamelanGong()" class="py-2.5 border border-royalGold-400/50 text-royalGold-300 text-center uppercase tracking-widest text-[11px]">
          <i data-lucide="bell" class="w-3.5 h-3.5 inline mr-1"></i> Genta Kehormatan
        </button>
        <a href="#tasting-room" onclick="toggleMobileNav()" class="py-3 bg-gold-shimmer text-emerald-950 text-center font-bold tracking-widest text-xs uppercase">
          Titah Audiensi
        </a>
      </div>
    </div>
  </header>

  <!-- ================= 3. MAJESTIC REGAL HERO BANNER ================= -->
  <section class="relative min-h-[92vh] flex items-center justify-center overflow-hidden px-6 py-20">
    <!-- Majestic Backdrop Image with Emerald Vignette -->
    <div class="absolute inset-0 -z-10">
      <img src="https://images.unsplash.com/photo-1544025162-d76694265947?auto=format&fit=crop&w=2000&q=85" 
           alt="Perjamuan Keraton Ageng" 
           class="w-full h-full object-cover object-center filter brightness-40 contrast-125 scale-105 animate-pulse duration-[10000ms]">
      <div class="absolute inset-0 bg-gradient-to-t from-emerald-950 via-emerald-950/80 to-emerald-900/40"></div>
      <div class="absolute inset-0 bg-radial-vignette opacity-90"></div>
    </div>

    <!-- Ornamental Gold Frame Corner Accents -->
    <div class="absolute top-10 left-10 w-24 h-24 border-t-2 border-l-2 border-royalGold-400/60 pointer-events-none hidden md:block"></div>
    <div class="absolute top-10 right-10 w-24 h-24 border-t-2 border-r-2 border-royalGold-400/60 pointer-events-none hidden md:block"></div>
    <div class="absolute bottom-10 left-10 w-24 h-24 border-b-2 border-l-2 border-royalGold-400/60 pointer-events-none hidden md:block"></div>
    <div class="absolute bottom-10 right-10 w-24 h-24 border-b-2 border-r-2 border-royalGold-400/60 pointer-events-none hidden md:block"></div>

    <div class="relative z-10 max-w-5xl mx-auto text-center flex flex-col items-center">
      
      <!-- Floating Imperial Crest Pill -->
      <div class="inline-flex items-center gap-2.5 px-6 py-2 rounded-full border border-royalGold-400/60 bg-emerald-900/80 backdrop-blur-md mb-8 gold-glow">
        <i data-lucide="crown" class="w-4 h-4 text-royalGold-300"></i>
        <span class="text-[11px] font-serif uppercase tracking-[0.3em] text-royalGold-200">Adat Keraton Surakarta &amp; Yogyakarta Heritage</span>
      </div>

      <!-- Grand Classical Headline -->
      <h1 class="font-regal text-3xl sm:text-5xl md:text-6xl lg:text-7xl font-normal tracking-wide text-pearl leading-[1.18] mb-6">
        Keagungan Rasa <br>
        <span class="text-gold-gradient italic font-serif">Wangsa Ningrat Nusantara.</span>
      </h1>

      <p class="max-w-3xl text-sm sm:text-base md:text-lg text-pearl/80 font-serif italic leading-relaxed mb-10 tracking-wide">
        Menghidupkan kembali manuskrip kuliner keraton abad ke-18. Perjamuan agung bertabur kuningan murni, wadah perak berukir, serta tata cara saji ksatria dan putri keraton untuk resepsi termegah di Indonesia.
      </p>

      <!-- Royal Action Dual Buttons -->
      <div class="flex flex-col sm:flex-row gap-5 w-full sm:w-auto items-center justify-center">
        <a href="#architect" class="w-full sm:w-auto px-8 py-4 bg-gold-shimmer text-emerald-950 font-serif font-bold text-xs uppercase tracking-[0.24em] shadow-xl shadow-royalGold-500/25 hover:brightness-110 active:scale-95 transition-all">
          Rancang Perjamuan Agung
        </a>
        <a href="#menus" class="w-full sm:w-auto px-8 py-4 border ornate-border bg-emerald-900/60 text-royalGold-200 font-serif text-xs uppercase tracking-[0.24em] hover:bg-royalGold-500/10 hover:border-royalGold-400 transition-all">
          Pustaka Resep Pusaka
        </a>
      </div>

      <!-- Imperial Distinction Bar -->
      <div class="mt-16 pt-8 border-t border-royalGold-500/20 w-full grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
        <div class="p-4 bg-emerald-900/30 border border-royalGold-500/20">
          <span class="font-regal text-2xl sm:text-3xl text-royalGold-300 block mb-1">36 Resep</span>
          <span class="text-[10px] uppercase font-serif tracking-widest text-pearl/70">Manuskrip Rahasia Keraton</span>
        </div>
        <div class="p-4 bg-emerald-900/30 border border-royalGold-500/20">
          <span class="font-regal text-2xl sm:text-3xl text-royalGold-300 block mb-1">280+ Gala</span>
          <span class="text-[10px] uppercase font-serif tracking-widest text-pearl/70">Perjamuan Pejabat &amp; Ningrat</span>
        </div>
        <div class="p-4 bg-emerald-900/30 border border-royalGold-500/20">
          <span class="font-regal text-2xl sm:text-3xl text-royalGold-300 block mb-1">100% Halal</span>
          <span class="text-[10px] uppercase font-serif tracking-widest text-pearl/70">Sertifikasi Grade-A MUI</span>
        </div>
        <div class="p-4 bg-emerald-900/30 border border-royalGold-500/20">
          <span class="font-regal text-2xl sm:text-3xl text-royalGold-300 block mb-1">1 : 4 Ratio</span>
          <span class="text-[10px] uppercase font-serif tracking-widest text-pearl/70">Pramusaji Berbusana Prada</span>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= 4. THE ROYAL PEDIGREE / FILOSOFI PUSAKA ================= -->
  <section id="pedigree" class="py-24 px-6 border-y border-royalGold-500/30 bg-gradient-to-b from-emerald-950 via-emerald-900/40 to-emerald-950 relative">
    <div class="max-w-7xl mx-auto">
      
      <!-- Section Title with Golden Filigree Motif -->
      <div class="text-center max-w-3xl mx-auto mb-16">
        <div class="flex items-center justify-center gap-3 mb-3">
          <div class="h-[1px] w-12 bg-royalGold-400"></div>
          <span class="text-[11px] font-regal uppercase tracking-[0.35em] text-royalGold-400">Pustaka Adat Dalem</span>
          <div class="h-[1px] w-12 bg-royalGold-400"></div>
        </div>
        <h2 class="font-serif text-3xl sm:text-5xl font-normal text-pearl">Filosofi &amp; Kemegahan Santapan Adat</h2>
        <p class="text-xs sm:text-sm text-pearl/70 font-serif italic mt-4 leading-relaxed">
          Dalam tradisi keraton, santapan bukanlah sekadar pemuas raga, melainkan doa kemakmuran, wujud penghormatan tertinggi kepada para tamu kehormatan, dan mahakarya rempah Nusantara yang dimasak dengan kesabaran waktu.
        </p>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <!-- Pillar 1 -->
        <div class="p-8 bg-emerald-900/40 ornate-border relative group hover:border-royalGold-400 transition-all duration-500">
          <div class="w-14 h-14 rounded-full border border-royalGold-400/50 bg-emerald-950 flex items-center justify-center text-royalGold-300 mb-6 group-hover:scale-110 transition-transform">
            <i data-lucide="scroll" class="w-6 h-6"></i>
          </div>
          <h3 class="font-regal text-xl text-royalGold-200 mb-3">Otentisitas Manuskrip Kuno</h3>
          <p class="text-xs text-pearl/75 font-serif leading-relaxed">
            Mengekstraksi racikan rempah dari naskah klasik <em>Serat Centhini</em> dan arsip kuliner dapur istana abad ke-18. Bumbu digiling batu andesit tradisional tanpa perisa sintetis untuk menjaga aroma leluhur.
          </p>
        </div>

        <!-- Pillar 2 -->
        <div class="p-8 bg-emerald-900/40 ornate-border relative group hover:border-royalGold-400 transition-all duration-500">
          <div class="w-14 h-14 rounded-full border border-royalGold-400/50 bg-emerald-950 flex items-center justify-center text-royalGold-300 mb-6 group-hover:scale-110 transition-transform">
            <i data-lucide="flame" class="w-6 h-6"></i>
          </div>
          <h3 class="font-regal text-xl text-royalGold-200 mb-3">Peranti Tembaga &amp; Kuningan Murni</h3>
          <p class="text-xs text-pearl/75 font-serif leading-relaxed">
            Disajikan di atas meja bertingkat kayu jati berukir prada, dilengkapi pemanas tembaga (*chafing dish*) tempaan tangan pengrajin Tumang, piring porselen ningrat emas, dan cawan perak murni.
          </p>
        </div>

        <!-- Pillar 3 -->
        <div class="p-8 bg-emerald-900/40 ornate-border relative group hover:border-royalGold-400 transition-all duration-500">
          <div class="w-14 h-14 rounded-full border border-royalGold-400/50 bg-emerald-950 flex items-center justify-center text-royalGold-300 mb-6 group-hover:scale-110 transition-transform">
            <i data-lucide="users" class="w-6 h-6"></i>
          </div>
          <h3 class="font-regal text-xl text-royalGold-200 mb-3">Tata Laku Pradaksina &amp; Abdi Dalem</h3>
          <p class="text-xs text-pearl/75 font-serif leading-relaxed">
            Staf pelayan terlatih dalam etiket keraton berseragam beskap dan jarik batik tulis prada emas. Membawakan hidangan dengan langkah anggun beriringan gending gamelan laras pelog dan slendro.
          </p>
        </div>

      </div>
    </div>
  </section>

  <!-- ================= 5. INTERACTIVE IMPERIAL MENU SHOWCASE ================= -->
  <section id="menus" class="py-24 px-6 max-w-7xl mx-auto">
    
    <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-6">
      <div>
        <span class="text-[11px] font-regal uppercase tracking-[0.35em] text-royalGold-400 block mb-2">Mahakarya Dapur Istana</span>
        <h2 class="font-serif text-3xl sm:text-5xl font-light text-pearl">Pustaka Hidangan Ageng</h2>
      </div>
      <p class="text-xs sm:text-sm text-pearl/70 font-serif italic max-w-md">
        Klik setiap hidangan untuk membuka manuskrip asal-usul pusaka, panduan suhu saji, serta filosofi perlambang berkah yang terkandung di dalamnya.
      </p>
    </div>

    <!-- Category Tabs Filter -->
    <div class="flex flex-wrap gap-3 mb-12 border-b border-royalGold-500/20 pb-4">
      <button onclick="filterRoyalMenu('all', this)" class="royal-tab-btn active px-6 py-2.5 text-xs font-serif uppercase tracking-widest bg-gold-shimmer text-emerald-950 font-bold border border-royalGold-400">
        Semua Koleksi
      </button>
      <button onclick="filterRoyalMenu('prasmanan', this)" class="royal-tab-btn px-6 py-2.5 text-xs font-serif uppercase tracking-widest bg-emerald-900/60 text-royalGold-200 border border-royalGold-500/30 hover:border-royalGold-400 transition">
        Prasmanan Keraton
      </button>
      <button onclick="filterRoyalMenu('rijsttafel', this)" class="royal-tab-btn px-6 py-2.5 text-xs font-serif uppercase tracking-widest bg-emerald-900/60 text-royalGold-200 border border-royalGold-500/30 hover:border-royalGold-400 transition">
        Rijsttafel Ningrat
      </button>
      <button onclick="filterRoyalMenu('canapes', this)" class="royal-tab-btn px-6 py-2.5 text-xs font-serif uppercase tracking-widest bg-emerald-900/60 text-royalGold-200 border border-royalGold-500/30 hover:border-royalGold-400 transition">
        Kudapan &amp; Canapé Pusaka
      </button>
      <button onclick="filterRoyalMenu('elixirs', this)" class="royal-tab-btn px-6 py-2.5 text-xs font-serif uppercase tracking-widest bg-emerald-900/60 text-royalGold-200 border border-royalGold-500/30 hover:border-royalGold-400 transition">
        Jamu &amp; Elixir Kerajaan
      </button>
    </div>

    <!-- Dishes Grid -->
    <div id="royal-dishes-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      
      <!-- Dish 1 -->
      <article class="royal-card bg-emerald-900/40 ornate-border overflow-hidden flex flex-col justify-between group hover:border-royalGold-400 transition-all duration-300" data-cat="prasmanan">
        <div>
          <div class="relative h-64 overflow-hidden">
            <img src="https://images.unsplash.com/photo-1544025162-d76694265947?auto=format&fit=crop&w=800&q=80" 
                 alt="Gereh Penyu & Bistik Lidah Keraton" 
                 loading="lazy" decoding="async"
                 class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
            <div class="absolute top-4 left-4 bg-emerald-950/90 border border-royalGold-400/50 px-3 py-1 text-[10px] font-regal uppercase tracking-widest text-royalGold-300">
              Prasmanan Utama
            </div>
            <div class="absolute bottom-4 right-4 bg-emerald-950/90 border border-royalGold-400/40 px-3 py-1 text-xs font-serif text-pearl">
              Sajian Pusaka Dalem
            </div>
          </div>
          <div class="p-6">
            <div class="flex justify-between items-center text-xs text-royalGold-300 mb-2 font-serif">
              <span>Serat Centhini Pupuh 42</span>
              <span>100% Halal Certified</span>
            </div>
            <h3 class="font-regal text-xl text-royalGold-200 mb-2 group-hover:text-royalGold-300 transition">Bistik Lidah Sapi Saus Pala Keraton</h3>
            <p class="text-xs text-pearl/70 font-serif leading-relaxed">
              Lidah sapi empuk pilihan dimasak perlahan 18 jam dengan rempah pala Banda, cengkeh pusaka, dan disajikan di atas pemanas tembaga berukir bunga melati.
            </p>
          </div>
        </div>
        <div class="p-6 pt-0">
          <button onclick="openDishDetail(0)" class="w-full py-2.5 border border-royalGold-400/50 text-xs font-serif uppercase tracking-widest text-royalGold-300 hover:bg-gold-shimmer hover:text-emerald-950 hover:font-bold transition duration-300">
            Buka Kitab Hidangan +
          </button>
        </div>
      </article>

      <!-- Dish 2 -->
      <article class="royal-card bg-emerald-900/40 ornate-border overflow-hidden flex flex-col justify-between group hover:border-royalGold-400 transition-all duration-300" data-cat="rijsttafel">
        <div>
          <div class="relative h-64 overflow-hidden">
            <img src="https://images.unsplash.com/photo-1555244162-803834f70033?auto=format&fit=crop&w=800&q=80" 
                 alt="Tumpeng Robyong Mahkota Emas" 
                 loading="lazy" decoding="async"
                 class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
            <div class="absolute top-4 left-4 bg-emerald-950/90 border border-royalGold-400/50 px-3 py-1 text-[10px] font-regal uppercase tracking-widest text-royalGold-300">
              Rijsttafel Agung
            </div>
            <div class="absolute bottom-4 right-4 bg-emerald-950/90 border border-royalGold-400/40 px-3 py-1 text-xs font-serif text-pearl">
              Simbol Kemakmuran
            </div>
          </div>
          <div class="p-6">
            <div class="flex justify-between items-center text-xs text-royalGold-300 mb-2 font-serif">
              <span>Tradisi Wilujengan</span>
              <span>Kuningan Asli</span>
            </div>
            <h3 class="font-regal text-xl text-royalGold-200 mb-2 group-hover:text-royalGold-300 transition">Tumpeng Robyong Mahkota Emas 24K</h3>
            <p class="text-xs text-pearl/70 font-serif leading-relaxed">
              Nasi gurih kunyit lereng Gunung Merapi dengan 17 macam lauk pusaka: dendeng balado basah, ayam bekakak bumbu rujak, sambal goreng ati kenari, dan hiasan janur kuning prada.
            </p>
          </div>
        </div>
        <div class="p-6 pt-0">
          <button onclick="openDishDetail(1)" class="w-full py-2.5 border border-royalGold-400/50 text-xs font-serif uppercase tracking-widest text-royalGold-300 hover:bg-gold-shimmer hover:text-emerald-950 hover:font-bold transition duration-300">
            Buka Kitab Hidangan +
          </button>
        </div>
      </article>

      <!-- Dish 3 -->
      <article class="royal-card bg-emerald-900/40 ornate-border overflow-hidden flex flex-col justify-between group hover:border-royalGold-400 transition-all duration-300" data-cat="canapes">
        <div>
          <div class="relative h-64 overflow-hidden">
            <img src="https://images.unsplash.com/photo-1541544741938-0af808871cc0?auto=format&fit=crop&w=800&q=80" 
                 alt="Semar Mendem Foie Gras & Jamur Hutan" 
                 loading="lazy" decoding="async"
                 class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
            <div class="absolute top-4 left-4 bg-emerald-950/90 border border-royalGold-400/50 px-3 py-1 text-[10px] font-regal uppercase tracking-widest text-royalGold-300">
              Kudapan Bangsawan
            </div>
            <div class="absolute bottom-4 right-4 bg-emerald-950/90 border border-royalGold-400/40 px-3 py-1 text-xs font-serif text-pearl">
              Passed Canapés
            </div>
          </div>
          <div class="p-6">
            <div class="flex justify-between items-center text-xs text-royalGold-300 mb-2 font-serif">
              <span>Modern Keraton Fusion</span>
              <span>Amuse-Bouche</span>
            </div>
            <h3 class="font-regal text-xl text-royalGold-200 mb-2 group-hover:text-royalGold-300 transition">Semar Mendem Ayam Suwir Truffle</h3>
            <p class="text-xs text-pearl/70 font-serif leading-relaxed">
              Beras ketan wangi berbalut dadar telur tipis emas, berisikan ayam suwir bumbu areh santan kental yang disempurnakan dengan tetesan minyak truffle putih dan serpihan daun emas.
            </p>
          </div>
        </div>
        <div class="p-6 pt-0">
          <button onclick="openDishDetail(2)" class="w-full py-2.5 border border-royalGold-400/50 text-xs font-serif uppercase tracking-widest text-royalGold-300 hover:bg-gold-shimmer hover:text-emerald-950 hover:font-bold transition duration-300">
            Buka Kitab Hidangan +
          </button>
        </div>
      </article>

      <!-- Dish 4 -->
      <article class="royal-card bg-emerald-900/40 ornate-border overflow-hidden flex flex-col justify-between group hover:border-royalGold-400 transition-all duration-300" data-cat="elixirs">
        <div>
          <div class="relative h-64 overflow-hidden">
            <img src="https://images.unsplash.com/photo-1514362545857-3bc16c4c7d1b?auto=format&fit=crop&w=800&q=80" 
                 alt="Bir Pletok Emas & Wedang Secang" 
                 loading="lazy" decoding="async"
                 class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
            <div class="absolute top-4 left-4 bg-emerald-950/90 border border-royalGold-400/50 px-3 py-1 text-[10px] font-regal uppercase tracking-widest text-royalGold-300">
              Minuman Para Raja
            </div>
            <div class="absolute bottom-4 right-4 bg-emerald-950/90 border border-royalGold-400/40 px-3 py-1 text-xs font-serif text-pearl">
              0.0% Non-Alkohol
            </div>
          </div>
          <div class="p-6">
            <div class="flex justify-between items-center text-xs text-royalGold-300 mb-2 font-serif">
              <span>Ramuan Awet Muda</span>
              <span>Cawan Perak</span>
            </div>
            <h3 class="font-regal text-xl text-royalGold-200 mb-2 group-hover:text-royalGold-300 transition">Elixir Ratu Ayu: Secang &amp; Kolagen Madu</h3>
            <p class="text-xs text-pearl/70 font-serif leading-relaxed">
              Seduhan kayu secang merah delima dengan kapulaga Jawa, kayu manis hutan Sumatra, perasan jeruk purut segar, serta madu hutan liar bertabur serbuk emas kemilau.
            </p>
          </div>
        </div>
        <div class="p-6 pt-0">
          <button onclick="openDishDetail(3)" class="w-full py-2.5 border border-royalGold-400/50 text-xs font-serif uppercase tracking-widest text-royalGold-300 hover:bg-gold-shimmer hover:text-emerald-950 hover:font-bold transition duration-300">
            Buka Kitab Hidangan +
          </button>
        </div>
      </article>

    </div>
  </section>

  <!-- ================= 6. THE IMPERIAL BANQUET ARCHITECT (INTERACTIVE ESTIMATOR) ================= -->
  <section id="architect" class="py-24 px-6 border-y border-royalGold-500/30 bg-gradient-to-b from-emerald-950 via-emerald-900 to-emerald-950 relative">
    
    <div class="max-w-6xl mx-auto">
      
      <div class="text-center max-w-3xl mx-auto mb-16">
        <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border border-royalGold-400/50 bg-royalGold-400/10 text-royalGold-300 text-[10px] font-regal tracking-widest uppercase mb-4">
          <i data-lucide="scale" class="w-3.5 h-3.5"></i> Perhitungan Titah Jamuan Agung
        </div>
        <h2 class="font-regal text-3xl sm:text-5xl font-normal text-pearl">Arsitek Perjamuan Keraton</h2>
        <p class="text-xs sm:text-sm text-pearl/75 font-serif italic mt-3">
          Tentukan skala hadirin bangsawan, paket perjamuan adat, dan ornamen kebesaran untuk menghitung estimasi biaya dan mengekspor titah resmi langsung ke WhatsApp протоkoler.
        </p>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start">
        
        <!-- Controls Column (Left) -->
        <div class="lg:col-span-7 bg-emerald-900/60 p-8 rounded-none ornate-double-border gold-glow space-y-8">
          
          <!-- Step 1: Format Perjamuan -->
          <div>
            <label class="block text-xs uppercase font-regal tracking-widest text-royalGold-300 mb-4">
              1. Pilih Struktur Perjamuan Adat
            </label>
            <div class="space-y-3" id="banquet-format-group">
              
              <label class="flex items-center justify-between p-4 border-2 border-royalGold-400 bg-emerald-950/90 cursor-pointer format-option transition-all">
                <div class="flex items-center space-x-3.5">
                  <input type="radio" name="banquet_format" value="Perjamuan Agung Keraton (Full Royal Feast)" data-price="485000" checked onchange="updateBanquetFormat(this)" class="accent-royalGold-400 w-4 h-4">
                  <div>
                    <div class="font-regal text-sm text-royalGold-200">Perjamuan Agung Keraton (Grand Buffet)</div>
                    <div class="text-[11px] font-serif text-pearl/70">14 Menu Pusaka + 3 Pondokan Tempa Tembaga Tumang + Pemanas Emas</div>
                  </div>
                </div>
                <span class="font-serif text-xs text-royalGold-300 font-bold whitespace-nowrap">Rp 485.000 / pax</span>
              </label>

              <label class="flex items-center justify-between p-4 border border-royalGold-500/30 bg-emerald-950/50 cursor-pointer format-option transition-all hover:border-royalGold-400/60">
                <div class="flex items-center space-x-3.5">
                  <input type="radio" name="banquet_format" value="Rijsttafel Sultan Ningrat (Seated Royal Service)" data-price="750000" onchange="updateBanquetFormat(this)" class="accent-royalGold-400 w-4 h-4">
                  <div>
                    <div class="font-regal text-sm text-royalGold-200">Rijsttafel Sultan Ningrat (Seated 7-Course)</div>
                    <div class="text-[11px] font-serif text-pearl/70">Layanan Meja Duduk Lengkap dengan Piring Keramik Emas &amp; Abdi Dalem Pribadi</div>
                  </div>
                </div>
                <span class="font-serif text-xs text-royalGold-300 font-bold whitespace-nowrap">Rp 750.000 / pax</span>
              </label>

              <label class="flex items-center justify-between p-4 border border-royalGold-500/30 bg-emerald-950/50 cursor-pointer format-option transition-all hover:border-royalGold-400/60">
                <div class="flex items-center space-x-3.5">
                  <input type="radio" name="banquet_format" value="High Soirée & Canapés Bangsawan" data-price="325000" onchange="updateBanquetFormat(this)" class="accent-royalGold-400 w-4 h-4">
                  <div>
                    <div class="font-regal text-sm text-royalGold-200">High Soirée &amp; Kudapan Pusaka</div>
                    <div class="text-[11px] font-serif text-pearl/70">12 Macam Canapés passed trays, Elixir Bar, &amp; Jamu Keraton live pour</div>
                  </div>
                </div>
                <span class="font-serif text-xs text-royalGold-300 font-bold whitespace-nowrap">Rp 325.000 / pax</span>
              </label>

            </div>
          </div>

          <!-- Step 2: Slider Jumlah Tamu -->
          <div>
            <div class="flex justify-between items-center mb-3">
              <label class="text-xs uppercase font-regal tracking-widest text-royalGold-300">2. Kapasitas Hadirin Tamu Agung</label>
              <span class="font-regal text-2xl text-royalGold-200">
                <span id="guest-count-label">250</span> <span class="text-xs font-serif text-pearl/70">Tamu Terhormat</span>
              </span>
            </div>
            <input id="guest-slider" type="range" min="50" max="1500" step="25" value="250" oninput="updateGuestSlider(this.value)" class="w-full h-2 bg-emerald-950 rounded-lg appearance-none cursor-pointer">
            <div class="flex justify-between text-[10px] font-serif text-pearl/60 mt-2">
              <span>50 (Intimate Ningrat)</span>
              <span>250 (Gala Agung)</span>
              <span>1500+ (Royal Wedding Akbar)</span>
            </div>
          </div>

          <!-- Step 3: Add-ons Ornamen Kebesaran -->
          <div>
            <label class="block text-xs uppercase font-regal tracking-widest text-royalGold-300 mb-3">
              3. Tambahan Kemegahan Tradisi Keraton (Opsional)
            </label>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
              
              <label class="flex items-center space-x-3 p-3.5 border border-royalGold-500/20 bg-emerald-950/60 hover:border-royalGold-400 cursor-pointer">
                <input type="checkbox" id="addon-gamelan" value="8500000" onchange="recalculateRoyalBanquet()" class="accent-royalGold-400 w-4 h-4 rounded">
                <span class="text-xs font-serif text-pearl/90">Ensembel Gamelan &amp; Pengrawit Live (+8.5 Jt)</span>
              </label>

              <label class="flex items-center space-x-3 p-3.5 border border-royalGold-500/20 bg-emerald-950/60 hover:border-royalGold-400 cursor-pointer">
                <input type="checkbox" id="addon-chafing" value="12000000" onchange="recalculateRoyalBanquet()" class="accent-royalGold-400 w-4 h-4 rounded">
                <span class="text-xs font-serif text-pearl/90">Pemanas Tembaga Ukir Relief Keraton (+12 Jt)</span>
              </label>

              <label class="flex items-center space-x-3 p-3.5 border border-royalGold-500/20 bg-emerald-950/60 hover:border-royalGold-400 cursor-pointer">
                <input type="checkbox" id="addon-batik" value="6500000" onchange="recalculateRoyalBanquet()" class="accent-royalGold-400 w-4 h-4 rounded">
                <span class="text-xs font-serif text-pearl/90">Seragam Abdi Dalem Batik Tulis Prada (+6.5 Jt)</span>
              </label>

              <label class="flex items-center space-x-3 p-3.5 border border-royalGold-500/20 bg-emerald-950/60 hover:border-royalGold-400 cursor-pointer">
                <input type="checkbox" id="addon-keris" value="5000000" onchange="recalculateRoyalBanquet()" class="accent-royalGold-400 w-4 h-4 rounded">
                <span class="text-xs font-serif text-pearl/90">Pajangan Pusaka &amp; Ronce Melati (+5 Jt)</span>
              </label>

            </div>
          </div>

        </div>

        <!-- Dynamic Proposal Dossier Card (Right) -->
        <div class="lg:col-span-5 sticky top-28 space-y-6">
          <div class="bg-emerald-950 p-8 ornate-double-border gold-glow relative">
            
            <!-- Crest Watermark -->
            <div class="border-b border-royalGold-500/30 pb-4 mb-6 flex justify-between items-start">
              <div>
                <span class="text-[9px] tracking-[0.3em] uppercase text-royalGold-400 font-regal">SURAT TITAH PERJAMUAN</span>
                <h3 class="font-regal text-2xl text-pearl mt-1" id="dossier-package-title">Perjamuan Agung Keraton</h3>
              </div>
              <span class="text-[10px] font-mono text-royalGold-300 bg-royalGold-500/10 border border-royalGold-400/30 px-2 py-1">2026/2027</span>
            </div>

            <!-- Specs Rows -->
            <div class="space-y-3 text-xs font-serif text-pearl/80">
              <div class="flex justify-between py-1 border-b border-royalGold-500/10">
                <span class="text-pearl/60">Bentuk Layanan:</span>
                <span class="font-medium text-royalGold-200" id="dossier-format-name">Grand Buffet Pusaka</span>
              </div>
              <div class="flex justify-between py-1 border-b border-royalGold-500/10">
                <span class="text-pearl/60">Hadirin:</span>
                <span class="font-medium text-pearl" id="dossier-guests">250 Tamu Agung</span>
              </div>
              <div class="flex justify-between py-1 border-b border-royalGold-500/10">
                <span class="text-pearl/60">Alokasi Abdi Dalem:</span>
                <span class="font-medium text-pearl" id="dossier-staff">63 Pramusaji (1:4 Ratio)</span>
              </div>
              <div class="flex justify-between py-1 border-b border-royalGold-500/10">
                <span class="text-pearl/60">Ornamen Tambahan:</span>
                <span class="font-medium text-royalGold-300" id="dossier-addons-count">0 Ornamen Terpilih</span>
              </div>
            </div>

            <!-- Grand Total -->
            <div class="mt-8 pt-6 border-t border-royalGold-500/30">
              <span class="text-[10px] uppercase font-regal tracking-widest text-pearl/60 block">Estimasi Investasi Kemegahan</span>
              <div class="font-regal text-3xl sm:text-4xl text-royalGold-300 font-bold mt-1" id="dossier-grand-total">
                Rp 121.250.000
              </div>
              <p class="text-[11px] text-pearl/60 font-serif italic mt-1">
                Setara <span id="dossier-per-guest" class="text-royalGold-200 font-mono">Rp 485.000</span> per tamu terhormat
              </p>
            </div>

            <!-- Actions -->
            <div class="mt-8 space-y-3">
              <button onclick="sendRoyalDossierToWA()" class="w-full py-4 bg-gold-shimmer text-emerald-950 font-serif font-bold text-xs uppercase tracking-[0.2em] shadow-xl hover:brightness-110 active:scale-95 transition-all flex items-center justify-center gap-2">
                <i data-lucide="message-square" class="w-4 h-4"></i>
                <span>Kirim Titah ke WhatsApp Protokoler</span>
              </button>

              <button onclick="copyRoyalDossier()" class="w-full py-3 border border-royalGold-400/40 bg-emerald-900/50 text-royalGold-200 text-xs font-serif uppercase tracking-[0.15em] hover:bg-royalGold-500/20 transition flex items-center justify-center gap-2">
                <i data-lucide="copy" class="w-4 h-4"></i>
                <span>Salin Ringkasan Titah</span>
              </button>
            </div>

            <p class="text-[10px] text-center text-pearl/50 font-serif mt-4">
              *Sudah termasuk sesi uji rasa (food tasting) privat untuk 6 orang perwakilan keluarga ageng.
            </p>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ================= 7. ROYAL TABLE SETUP & VISUAL ARCHIVE ================= -->
  <section id="heritage-gallery" class="py-24 px-6 max-w-7xl mx-auto">
    
    <div class="max-w-3xl mx-auto text-center mb-16">
      <span class="text-[11px] font-regal uppercase tracking-[0.35em] text-royalGold-400 block mb-2">Dokumentasi Upacara</span>
      <h2 class="font-serif text-3xl sm:text-5xl font-light text-pearl">Arsip Kemegahan Tata Meja</h2>
      <p class="text-xs sm:text-sm text-pearl/70 font-serif italic mt-3">
        Sentuhan seni tata ruang khas keraton dengan kombinasi janur kuning ronce, piring emas bersaput prada, dan wadah tembaga kuno.
      </p>
    </div>

    <!-- Gallery Grid with Ornate Borders -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      
      <!-- Frame 1 -->
      <div class="group relative h-96 overflow-hidden ornate-border cursor-pointer">
        <img src="https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=900&q=80" 
             alt="Tata Meja Pernikahan Keraton" 
             loading="lazy" decoding="async"
             class="w-full h-full object-cover group-hover:scale-105 transition duration-700">
        <div class="absolute inset-0 bg-gradient-to-t from-emerald-950 via-emerald-950/40 to-transparent flex flex-col justify-end p-6">
          <span class="text-[10px] font-regal uppercase tracking-widest text-royalGold-300">Pernikahan Dalem Ageng</span>
          <h4 class="font-serif text-xl text-pearl mt-1">Meja Santap Panjang Kayu Jati Ukir Jepara</h4>
          <p class="text-[11px] text-pearl/70 font-serif italic mt-1">Dipadukan dengan bunga melati basah ronce &amp; lilin aromaterapi kenanga.</p>
        </div>
      </div>

      <!-- Frame 2 -->
      <div class="group relative h-96 overflow-hidden ornate-border cursor-pointer">
        <img src="https://images.unsplash.com/photo-1555396273-367ea4eb4db5?auto=format&fit=crop&w=900&q=80" 
             alt="Pondokan Pemanas Tembaga" 
             loading="lazy" decoding="async"
             class="w-full h-full object-cover group-hover:scale-105 transition duration-700">
        <div class="absolute inset-0 bg-gradient-to-t from-emerald-950 via-emerald-950/40 to-transparent flex flex-col justify-end p-6">
          <span class="text-[10px] font-regal uppercase tracking-widest text-royalGold-300">Pondokan Klangenan</span>
          <h4 class="font-serif text-xl text-pearl mt-1">Chafing Dish Tembaga Relief Batara Wisnu</h4>
          <p class="text-[11px] text-pearl/70 font-serif italic mt-1">Menjaga kehangatan kuah gulai dan opor dengan bara api aromatik.</p>
        </div>
      </div>

      <!-- Frame 3 -->
      <div class="group relative h-96 overflow-hidden ornate-border cursor-pointer">
        <img src="https://images.unsplash.com/photo-1530103862676-de8c9debad1d?auto=format&fit=crop&w=900&q=80" 
             alt="Perjamuan Diplomatik Kenegaraan" 
             loading="lazy" decoding="async"
             class="w-full h-full object-cover group-hover:scale-105 transition duration-700">
        <div class="absolute inset-0 bg-gradient-to-t from-emerald-950 via-emerald-950/40 to-transparent flex flex-col justify-end p-6">
          <span class="text-[10px] font-regal uppercase tracking-widest text-royalGold-300">Resepsi Kenegaraan</span>
          <h4 class="font-serif text-xl text-pearl mt-1">Jamuan Jamu &amp; Teh Sri Sultan</h4>
          <p class="text-[11px] text-pearl/70 font-serif italic mt-1">Cangkir keramik motif parang garuda khusus tamu kehormatan istana.</p>
        </div>
      </div>

    </div>
  </section>

  <!-- ================= 8. SESI UJI RASA / FOOD TASTING BOOKING ================= -->
  <section id="tasting-room" class="py-24 px-6 border-t border-royalGold-500/30 bg-emerald-900/30">
    <div class="max-w-4xl mx-auto">
      
      <div class="text-center space-y-3 mb-12">
        <span class="text-[11px] font-regal uppercase tracking-[0.35em] text-royalGold-400">Sasana Icip Rasa</span>
        <h2 class="font-serif text-3xl sm:text-5xl font-light text-pearl">Permohonan Uji Rasa Sultan</h2>
        <p class="text-xs sm:text-sm text-pearl/70 font-serif italic max-w-lg mx-auto">
          Kami mengundang calon pengantin dan panitia perjamuan untuk mencicipi langsung 7 hidangan utama di Bale Paringgitan pribadi kami sebelum hari perhelatan agung.
        </p>
      </div>

      <form id="royalTastingForm" onsubmit="submitRoyalTasting(event)" class="bg-emerald-950 p-8 sm:p-12 ornate-double-border space-y-6 shadow-2xl">
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div class="space-y-2">
            <label class="text-xs uppercase font-regal tracking-widest text-royalGold-300">Nama Pemangku Hajat / Gelar</label>
            <input type="text" id="tasting-host" required placeholder="Contoh: K.R.T. Hardjodiningrat / Bpk. Hendra Kusuma" class="w-full bg-emerald-900/60 border border-royalGold-500/30 px-4 py-3 text-xs text-pearl focus:border-royalGold-400 focus:outline-none">
          </div>
          <div class="space-y-2">
            <label class="text-xs uppercase font-regal tracking-widest text-royalGold-300">Nomor WhatsApp Pribadi</label>
            <input type="tel" id="tasting-wa" required placeholder="+62 812-xxxx-xxxx" class="w-full bg-emerald-900/60 border border-royalGold-500/30 px-4 py-3 text-xs text-pearl focus:border-royalGold-400 focus:outline-none">
          </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
          <div class="space-y-2">
            <label class="text-xs uppercase font-regal tracking-widest text-royalGold-300">Rangkaian Acara</label>
            <select id="tasting-event-type" class="w-full bg-emerald-900/60 border border-royalGold-500/30 px-4 py-3 text-xs text-pearl focus:border-royalGold-400 focus:outline-none">
              <option>Pernikahan Adat Keraton (Ageng)</option>
              <option>Gala Dinner Kenegaraan / VIP</option>
              <option>Upacara Syukuran Wilujengan</option>
              <option>Peringatan Ulang Tahun Ningrat</option>
            </select>
          </div>
          <div class="space-y-2">
            <label class="text-xs uppercase font-regal tracking-widest text-royalGold-300">Rencana Tanggal Perhelatan</label>
            <input type="date" id="tasting-event-date" required class="w-full bg-emerald-900/60 border border-royalGold-500/30 px-4 py-3 text-xs text-pearl focus:border-royalGold-400 focus:outline-none">
          </div>
          <div class="space-y-2">
            <label class="text-xs uppercase font-regal tracking-widest text-royalGold-300">Estimasi Hadirin (Pax)</label>
            <input type="number" id="tasting-event-pax" min="50" max="3000" value="300" class="w-full bg-emerald-900/60 border border-royalGold-500/30 px-4 py-3 text-xs text-pearl focus:border-royalGold-400 focus:outline-none">
          </div>
        </div>

        <div class="space-y-2">
          <label class="text-xs uppercase font-regal tracking-widest text-royalGold-300">Permintaan Khusus / Pantangan Makanan</label>
          <textarea id="tasting-event-notes" rows="3" placeholder="Contoh: Menghendaki sambal tidak terlalu pedas untuk tamu asing, sertakan jamu beras kencur hangat saat pembuka..." class="w-full bg-emerald-900/60 border border-royalGold-500/30 px-4 py-3 text-xs text-pearl focus:border-royalGold-400 focus:outline-none"></textarea>
        </div>

        <button type="submit" class="w-full py-4 bg-gold-shimmer text-emerald-950 font-serif font-bold text-xs uppercase tracking-[0.24em] hover:brightness-110 shadow-xl transition flex items-center justify-center gap-2">
          <i data-lucide="crown" class="w-4 h-4 text-emerald-950"></i>
          <span>Daftarkan Jadwal Uji Rasa ke Protokoler Keraton</span>
        </button>
      </form>
    </div>
  </section>

  <!-- ================= FOOTER ================= -->
  <footer class="bg-emerald-950 border-t border-royalGold-500/30 pt-20 pb-12 text-pearl/70 text-xs font-serif">
    <div class="max-w-7xl mx-auto px-6 lg:px-12">
      <div class="grid grid-cols-1 md:grid-cols-12 gap-12 pb-16 border-b border-royalGold-500/20">
        
        <!-- Brand Info -->
        <div class="md:col-span-5 space-y-4">
          <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-full border border-royalGold-400 flex items-center justify-center text-royalGold-300">
              <i data-lucide="crown" class="w-5 h-5"></i>
            </div>
            <div>
              <span class="font-regal text-lg tracking-[0.2em] text-royalGold-300 block">KUSUMA NINGRAT</span>
              <span class="text-[9px] uppercase tracking-widest text-pearl/60">Royal Heritage Atelier</span>
            </div>
          </div>
          <p class="leading-relaxed text-pearl/70 max-w-sm">
            Pelestari adat perjamuan wangsa keraton Indonesia. Menghadirkan rasa, tata krama, dan ornamen istana langsung ke tempat perhelatan Anda di seluruh Nusantara.
          </p>
          <div class="text-[11px] text-royalGold-300/80 space-y-1 pt-2">
            <p>Bale Dapur Keraton: Ndalem Pringgokusuman No. 09, Surakarta &amp; D.I. Yogyakarta</p>
            <p>Wilayah Layanan: Solo, Jogja, Semarang, Surabaya, Jakarta, Bali &amp; Seluruh Indonesia</p>
          </div>
        </div>

        <!-- Links -->
        <div class="md:col-span-3 space-y-3">
          <p class="text-xs uppercase font-regal tracking-widest text-royalGold-300 font-bold">Ragam Perjamuan</p>
          <ul class="space-y-2 text-pearl/80">
            <li><a href="#menus" class="hover:text-royalGold-300">Prasmanan Bistik Pala Ageng</a></li>
            <li><a href="#menus" class="hover:text-royalGold-300">Rijsttafel Tumpeng Robyong 24K</a></li>
            <li><a href="#menus" class="hover:text-royalGold-300">Canapé Semar Mendem Truffle</a></li>
            <li><a href="#menus" class="hover:text-royalGold-300">Wedang Secang &amp; Jamu Keraton</a></li>
          </ul>
        </div>

        <!-- Direct Contact -->
        <div class="md:col-span-4 space-y-4">
          <p class="text-xs uppercase font-regal tracking-widest text-royalGold-300 font-bold">Protokoler Jamuan</p>
          <p class="text-pearl/75">
            Konsultasikan hari baik, susunan gending gamelan, dan kurasi menu adat bersama kurator jamuan kami.
          </p>
          <a href="https://wa.me/6281234567890?text=Kula%20nuwun%20Kusuma%20Ningrat%2C%20saya%20ingin%20berkonsultasi%20mengenai%20perjamuan%20adat%20keraton." target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 px-6 py-3 border border-royalGold-400 bg-gold-shimmer text-emerald-950 font-bold text-xs uppercase tracking-widest hover:brightness-110 transition">
            <i data-lucide="message-square" class="w-4 h-4"></i>
            <span>Hubungi Protokoler via WA</span>
          </a>
        </div>

      </div>

      <div class="pt-8 flex flex-col sm:flex-row justify-between items-center text-[11px] text-pearl/50 gap-4">
        <p>© 2026 Kusuma Ningrat Heritage Atelier. Hak Cipta Dilindungi Undang-Undang.</p>
        <div class="flex gap-6">
          <a href="#" class="hover:text-royalGold-300">Sertifikasi Halal</a>
          <a href="#" class="hover:text-royalGold-300">Pedoman Adat</a>
          <a href="#" class="hover:text-royalGold-300">Ketentuan Perjamuan</a>
        </div>
      </div>
    </div>
  </footer>

  <!-- ================= 9. FLOATING BUTTONS: WHATSAPP & AI ABDI DALEM ================= -->
  <div class="fixed bottom-6 right-6 z-50 flex flex-col items-end gap-3">
    
    <!-- AI Concierge Toggle Button -->
    <button onclick="toggleAbdiDalemChat()" class="flex items-center gap-2 px-4 py-2.5 bg-emerald-900 border border-royalGold-400 text-royalGold-200 shadow-2xl rounded-none gold-glow hover:bg-emerald-850 hover:text-royalGold-100 transition-all text-xs font-serif uppercase tracking-widest">
      <i data-lucide="bot" class="w-4 h-4 text-royalGold-400"></i>
      <span class="hidden sm:inline">Abdi Dalem AI</span>
    </button>

    <!-- Floating Direct WhatsApp Button with Pulsing Gold Glow -->
    <a href="https://wa.me/6281234567890?text=Kula%20nuwun%20Kusuma%20Ningrat%2C%20saya%20ingin%20berkonsultasi%20perjamuan%20adat%20keraton." target="_blank" rel="noopener noreferrer" class="flex items-center gap-2.5 px-6 py-3.5 bg-gold-shimmer text-emerald-950 shadow-2xl rounded-none gold-glow-strong hover:brightness-110 active:scale-95 transition-all group font-serif uppercase tracking-widest text-xs font-bold">
      <i data-lucide="message-circle" class="w-5 h-5 text-emerald-950 group-hover:scale-110 transition-transform"></i>
      <span>Titah WhatsApp</span>
    </a>
  </div>

  <!-- ================= 10. ABDI DALEM AI CONCIERGE CHATBOT DRAWER ================= -->
  <div id="abdiDalemDrawer" class="fixed bottom-24 right-6 z-50 w-80 sm:w-96 bg-emerald-950 ornate-double-border shadow-2xl rounded-none hidden flex-col overflow-hidden transition-all duration-300">
    
    <!-- Header -->
    <div class="bg-gradient-to-r from-emerald-900 to-emerald-950 p-4 border-b border-royalGold-500/30 flex justify-between items-center text-pearl">
      <div class="flex items-center gap-2.5">
        <div class="w-8 h-8 rounded-full border border-royalGold-400 bg-emerald-950 flex items-center justify-center text-royalGold-300">
          <i data-lucide="crown" class="w-4 h-4"></i>
        </div>
        <div>
          <p class="text-xs font-regal tracking-wider text-royalGold-200">ABDI DALEM AI</p>
          <p class="text-[9px] text-pearl/70 font-serif uppercase">Pustakawan Protokoler Jamuan Keraton</p>
        </div>
      </div>
      <button onclick="toggleAbdiDalemChat()" class="text-royalGold-300 hover:text-royalGold-100">
        <i data-lucide="x" class="w-4 h-4"></i>
      </button>
    </div>

    <!-- Messages Container -->
    <div id="chatMessages" class="p-4 h-72 overflow-y-auto space-y-3 text-xs font-serif">
      <div class="bg-emerald-900/60 p-3.5 border border-royalGold-500/20 text-pearl/90 leading-relaxed">
        <em>Kula nuwun.</em> Selamat datang di Balairung Kusuma Ningrat. Saya Abdi Dalem AI, siap mendampingi Anda mengenai naskah menu pusaka, sertifikasi halal keraton, ketentuan hadirin, maupun panduan tata cara jamuan.
      </div>
    </div>

    <!-- Quick Question Chips -->
    <div class="px-3 py-2 bg-emerald-900/40 border-t border-royalGold-500/20 flex gap-1.5 overflow-x-auto text-[10px] font-serif">
      <button onclick="askAbdiDalem('Apakah hidangannya 100% Halal?')" class="whitespace-nowrap px-2.5 py-1 bg-emerald-950 border border-royalGold-500/30 text-royalGold-200 hover:border-royalGold-400">100% Halal?</button>
      <button onclick="askAbdiDalem('Berapa minimal tamu untuk perjamuan?')" class="whitespace-nowrap px-2.5 py-1 bg-emerald-950 border border-royalGold-500/30 text-royalGold-200 hover:border-royalGold-400">Minimal Hadirin?</button>
      <button onclick="askAbdiDalem('Bagaimana cara memesan Uji Rasa?')" class="whitespace-nowrap px-2.5 py-1 bg-emerald-950 border border-royalGold-500/30 text-royalGold-200 hover:border-royalGold-400">Jadwal Uji Rasa?</button>
      <button onclick="askAbdiDalem('Apakah bisa melayani ke luar kota / Jakarta / Bali?')" class="whitespace-nowrap px-2.5 py-1 bg-emerald-950 border border-royalGold-500/30 text-royalGold-200 hover:border-royalGold-400">Luar Kota?</button>
    </div>

    <!-- Chat Input Form & Direct WhatsApp Transfer Button -->
    <div class="p-3 border-t border-royalGold-500/20 bg-emerald-900/50 space-y-2">
      <form onsubmit="handleChatSubmit(event)" class="flex gap-2">
        <input type="text" id="chatInput" placeholder="Ketik pertanyaan untuk Abdi Dalem..." class="flex-1 bg-emerald-950 border border-royalGold-500/30 px-3 py-2 text-xs text-pearl focus:outline-none focus:border-royalGold-400 font-serif">
        <button type="submit" class="px-3.5 bg-gold-shimmer text-emerald-950 hover:brightness-110">
          <i data-lucide="send" class="w-3.5 h-3.5"></i>
        </button>
      </form>
      <button onclick="handoverChatToWhatsApp()" class="w-full py-2 bg-emerald-950 border border-royalGold-400/40 text-[10px] font-serif text-royalGold-300 hover:bg-royalGold-400 hover:text-emerald-950 transition flex items-center justify-center gap-1.5 uppercase tracking-wider">
        <i data-lucide="message-square" class="w-3 h-3"></i> Lanjutkan Obrolan ini ke WhatsApp Protokoler
      </button>
    </div>
  </div>

  <!-- ================= 11. DISH DETAILS MODAL ================= -->
  <div id="dishModal" class="fixed inset-0 z-50 bg-emerald-950/85 backdrop-blur-md hidden items-center justify-center p-4">
    <div class="bg-emerald-950 max-w-xl w-full p-8 ornate-double-border shadow-2xl relative space-y-6">
      
      <button onclick="closeDishDetail()" class="absolute top-6 right-6 text-royalGold-300 hover:text-royalGold-100">
        <i data-lucide="x" class="w-5 h-5"></i>
      </button>

      <div>
        <span id="modalDishManuscript" class="text-[10px] font-regal tracking-widest text-royalGold-400 uppercase">MANUSKRIP KERATON</span>
        <h3 id="modalDishTitle" class="font-regal text-2xl sm:text-3xl text-pearl mt-1">Nama Hidangan</h3>
      </div>

      <p id="modalDishPhilosophy" class="text-xs sm:text-sm text-pearl/80 font-serif leading-relaxed italic"></p>

      <div class="pt-4 border-t border-royalGold-500/20 space-y-3 font-serif text-xs">
        <div>
          <span class="text-[10px] uppercase font-regal tracking-widest text-royalGold-300 block">Rempah Pusaka Utama:</span>
          <p id="modalDishSpices" class="text-pearl/90 mt-0.5"></p>
        </div>
        <div>
          <span class="text-[10px] uppercase font-regal tracking-widest text-royalGold-300 block">Wadah Saji &amp; Suhu:</span>
          <p id="modalDishVessel" class="text-pearl/90 mt-0.5"></p>
        </div>
      </div>

      <div class="pt-4 flex gap-3">
        <button onclick="closeDishDetail()" class="flex-1 py-3 border border-royalGold-400/50 text-royalGold-300 text-xs font-serif uppercase tracking-widest hover:bg-royalGold-500/20 transition">
          Tutup Manuskrip
        </button>
        <a href="#architect" onclick="closeDishDetail()" class="flex-1 py-3 bg-gold-shimmer text-emerald-950 text-center text-xs font-serif font-bold uppercase tracking-widest hover:brightness-110 transition">
          Pilih Dalam Perjamuan
        </a>
      </div>

    </div>
  </div>

  <!-- ================= JAVASCRIPT LOGIC ================= -->
  <script>
    // Initialize Lucide Icons
    lucide.createIcons();

    // Mobile Navigation Toggle
    function toggleMobileNav() {
      const nav = document.getElementById('mobile-nav');
      nav.classList.toggle('hidden');
    }

    // Audio Synthetic Tone Generator for Ceremonial Gamelan Chime
    function playGamelanGong() {
      try {
        const audioCtx = new (window.AudioContext || window.webkitAudioContext)();
        
        // Deep fundamental Gong Tone (65Hz & 130Hz)
        const osc1 = audioCtx.createOscillator();
        const osc2 = audioCtx.createOscillator();
        const gainNode = audioCtx.createGain();

        osc1.type = 'sine';
        osc1.frequency.setValueAtTime(65.4, audioCtx.currentTime); // C2 Deep Gong
        osc2.type = 'triangle';
        osc2.frequency.setValueAtTime(130.8, audioCtx.currentTime); // Harmonic overtone

        gainNode.gain.setValueAtTime(0.5, audioCtx.currentTime);
        gainNode.gain.exponentialRampToValueAtTime(0.0001, audioCtx.currentTime + 3.2);

        osc1.connect(gainNode);
        osc2.connect(gainNode);
        gainNode.connect(audioCtx.destination);

        osc1.start();
        osc2.start();
        osc1.stop(audioCtx.currentTime + 3.2);
        osc2.stop(audioCtx.currentTime + 3.2);

        showToast("Genta Kehormatan Berbunyi • Berkah Perjamuan Ageng");
      } catch(e) {
        showToast("Suara Kehormatan Diaktifkan");
      }
    }

    // Toast System
    function showToast(message) {
      const toast = document.getElementById('toast');
      const msgElem = document.getElementById('toast-message');
      msgElem.innerText = message;
      toast.classList.remove('opacity-0', 'pointer-events-none', '-translate-y-12');
      toast.classList.add('opacity-100', 'translate-y-0');

      setTimeout(() => {
        toast.classList.add('opacity-0', 'pointer-events-none', '-translate-y-12');
        toast.classList.remove('opacity-100', 'translate-y-0');
      }, 3500);
    }

    // Royal Dishes Database
    const royalDishes = [
      {
        title: "Bistik Lidah Sapi Saus Pala Keraton",
        manuscript: "Serat Centhini Pupuh 42 • Dapur Ageng Surakarta",
        philosophy: "Perpaduan diplomasi kuliner Hindia Belanda dan keraton Jawa. Menjadi hidangan favorit Sri Susuhunan Pakubuwono X saat menyambut duta kerajaan Eropa.",
        spices: "Pala Banda, Cengkeh Ambon, Kayu Manis Hutan, Lada Putih Mentok, Bawang Merah Brebes",
        vessel: "Chafing dish tembaga berukir dengan api lilin parafin, disajikan pada suhu 72°C."
      },
      {
        title: "Tumpeng Robyong Mahkota Emas 24K",
        manuscript: "Kitab Wilujengan Ageng • Kasultanan Ngayogyakarta",
        philosophy: "Bentuk kerucut melambangkan Gunung Merapi dan poros ketuhanan. Melambangkan doa kemakmuran tahta dan kelanggengan bagi kedua mempelai agung.",
        spices: "Kunyit Basah Lereng Merapi, Santan Kelapa Parut Tua, Daun Salam, Serai Wangi, Pandan Wangi",
        vessel: "Nampan kuningan berdiameter 1 meter bertatahkan daun pisang kluthuk lipat sari & janur prada."
      },
      {
        title: "Semar Mendem Ayam Suwir Truffle",
        manuscript: "Pustaka Kudapan Selir Ningrat",
        philosophy: "Dinamai Semar Mendem karena kenikmatan gurih ketan dan areh yang konon membuat tokoh pewayangan Semar mabuk kepayang. Direka cipta ulang dengan aroma minyak truffle modern.",
        spices: "Beras Ketan Putih Purworejo, Suwiran Ayam Kampung Rebus Areh Santan, Daun Jeruk Purut, Truffle Oil, Gold Leaf 24K",
        vessel: "Cawan perak beralas daun pisang lipat mawar per porsi passed canapé."
      },
      {
        title: "Elixir Ratu Ayu: Secang & Kolagen Madu",
        manuscript: "Racikan Keputren Tamansari Keraton",
        philosophy: "Minuman pencerah raga permaisuri dan para putri keraton. Kaya antioksidan alami dari serutan kayu secang yang menghasilkan rona merah permata alami.",
        spices: "Kayu Secang Hutan, Kapulaga Jawa, Jahe Merah Emprit Bakar, Jeruk Purut, Madu Hutan Odeng",
        vessel: "Gelas kristal beraksen prada emas dengan pengaduk kayu manis utuh."
      }
    ];

    // Menu Filter
    function filterRoyalMenu(cat, btn) {
      document.querySelectorAll('.royal-tab-btn').forEach(b => {
        b.classList.remove('bg-gold-shimmer', 'text-emerald-950', 'font-bold');
        b.classList.add('bg-emerald-900/60', 'text-royalGold-200');
      });
      btn.classList.add('bg-gold-shimmer', 'text-emerald-950', 'font-bold');
      btn.classList.remove('bg-emerald-900/60', 'text-royalGold-200');

      document.querySelectorAll('.royal-card').forEach(card => {
        if (cat === 'all' || card.getAttribute('data-cat') === cat) {
          card.style.display = 'flex';
        } else {
          card.style.display = 'none';
        }
      });
    }

    // Modal Details
    function openDishDetail(index) {
      const item = royalDishes[index];
      if (!item) return;

      document.getElementById('modalDishTitle').innerText = item.title;
      document.getElementById('modalDishManuscript').innerText = item.manuscript;
      document.getElementById('modalDishPhilosophy').innerText = item.philosophy;
      document.getElementById('modalDishSpices').innerText = item.spices;
      document.getElementById('modalDishVessel').innerText = item.vessel;

      const modal = document.getElementById('dishModal');
      modal.classList.remove('hidden');
      modal.classList.add('flex');
    }

    function closeDishDetail() {
      const modal = document.getElementById('dishModal');
      modal.classList.add('hidden');
      modal.classList.remove('flex');
    }

    // Imperial Banquet Architect State
    let selectedBanquetName = 'Perjamuan Agung Keraton (Full Royal Feast)';
    let selectedPricePerPax = 485000;
    let selectedGuests = 250;

    function formatRupiah(num) {
      return 'Rp ' + Math.round(num).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

    function updateBanquetFormat(radio) {
      selectedBanquetName = radio.value;
      selectedPricePerPax = parseInt(radio.getAttribute('data-price'), 10);

      document.querySelectorAll('.format-option').forEach(el => {
        el.classList.remove('border-2', 'border-royalGold-400');
        el.classList.add('border', 'border-royalGold-500/30');
      });
      radio.closest('.format-option').classList.add('border-2', 'border-royalGold-400');
      radio.closest('.format-option').classList.remove('border', 'border-royalGold-500/30');

      recalculateRoyalBanquet();
    }

    function updateGuestSlider(val) {
      selectedGuests = parseInt(val, 10);
      document.getElementById('guest-count-label').innerText = selectedGuests;
      recalculateRoyalBanquet();
    }

    function recalculateRoyalBanquet() {
      // Addons
      let addonsCost = 0;
      let addonCount = 0;

      const gamelan = document.getElementById('addon-gamelan');
      const chafing = document.getElementById('addon-chafing');
      const batik = document.getElementById('addon-batik');
      const keris = document.getElementById('addon-keris');

      if (gamelan && gamelan.checked) { addonsCost += parseInt(gamelan.value); addonCount++; }
      if (chafing && chafing.checked) { addonsCost += parseInt(chafing.value); addonCount++; }
      if (batik && batik.checked) { addonsCost += parseInt(batik.value); addonCount++; }
      if (keris && keris.checked) { addonsCost += parseInt(keris.value); addonCount++; }

      // Total
      const foodSubtotal = selectedPricePerPax * selectedGuests;
      const grandTotal = foodSubtotal + addonsCost;

      // Staff calculation: 1 staff per 4 guests
      const staffTotal = Math.ceil(selectedGuests / 4);

      // Update UI Dossier
      document.getElementById('dossier-package-title').innerText = selectedBanquetName;
      document.getElementById('dossier-format-name').innerText = selectedBanquetName;
      document.getElementById('dossier-guests').innerText = `${selectedGuests} Tamu Terhormat`;
      document.getElementById('dossier-staff').innerText = `${staffTotal} Pramusaji (1:4 Ratio)`;
      document.getElementById('dossier-addons-count').innerText = `${addonCount} Ornamen Ditambahkan`;
      document.getElementById('dossier-grand-total').innerText = formatRupiah(grandTotal);
      document.getElementById('dossier-per-guest').innerText = formatRupiah(selectedPricePerPax);
    }

    // Direct WhatsApp Dossier Export
    function sendRoyalDossierToWA() {
      const grandTotal = document.getElementById('dossier-grand-total').innerText;
      const staffTotal = document.getElementById('dossier-staff').innerText;
      const gamelan = document.getElementById('addon-gamelan').checked ? 'Ya' : 'Tidak';
      const chafing = document.getElementById('addon-chafing').checked ? 'Ya' : 'Tidak';
      const batik = document.getElementById('addon-batik').checked ? 'Ya' : 'Tidak';
      const keris = document.getElementById('addon-keris').checked ? 'Ya' : 'Tidak';

      const message = `*TITAH PERJAMUAN AGUNG - KUSUMA NINGRAT*%0A%0A` +
        `Kula nuwun Protokoler Keraton, saya telah menyusun spesifikasi jamuan agung melalui Arsitek Perjamuan:%0A%0A` +
        `• *Paket Perjamuan:* ${encodeURIComponent(selectedBanquetName)}%0A` +
        `• *Jumlah Tamu Agung:* ${selectedGuests} Hadirin%0A` +
        `• *Alokasi Abdi Dalem:* ${encodeURIComponent(staffTotal)}%0A` +
        `• *Ensembel Gamelan Live:* ${gamelan}%0A` +
        `• *Pemanas Tembaga Ukir:* ${chafing}%0A` +
        `• *Seragam Batik Prada:* ${batik}%0A` +
        `• *Pajangan Pusaka & Ronce:* ${keris}%0A` +
        `• *Estimasi Investasi:* ${encodeURIComponent(grandTotal)}%0A%0A` +
        `Mohon konfirmasi ketersediaan tanggal dan jadwal audiensi uji rasa di Bale Keraton. Matur nuwun.`;

      window.open(`https://wa.me/6281234567890?text=${message}`, '_blank', 'noopener,noreferrer');
      showToast("Menghubungkan ke WhatsApp Protokoler Keraton...");
    }

    function copyRoyalDossier() {
      const text = `[TITAH PERJAMUAN AGUNG KUSUMA NINGRAT]\n` +
        `Paket: ${selectedBanquetName}\n` +
        `Kapasitas: ${selectedGuests} Tamu Terhormat\n` +
        `Estimasi Total: ${document.getElementById('dossier-grand-total').innerText}\n` +
        `Rasio Pelayanan: 1 Pramusaji tiap 4 Tamu\n` +
        `Dapur Keraton 100% Halal MUI.`;

      const el = document.createElement("textarea");
      el.value = text;
      document.body.appendChild(el);
      el.select();
      document.execCommand('copy');
      document.body.removeChild(el);

      showToast("Ringkasan Titah Berhasil Disalin");
    }

    // Tasting Form Submit
    function submitRoyalTasting(e) {
      e.preventDefault();
      const host = document.getElementById('tasting-host').value;
      const wa = document.getElementById('tasting-wa').value;
      const type = document.getElementById('tasting-event-type').value;
      const date = document.getElementById('tasting-event-date').value;
      const pax = document.getElementById('tasting-event-pax').value;
      const notes = document.getElementById('tasting-event-notes').value || 'Tidak ada';

      const message = `*PERMOHONAN UJI RASA SULTAN - KUSUMA NINGRAT*%0A%0A` +
        `Kula nuwun, saya bermaksud memohon sesi uji rasa hidangan keraton:%0A` +
        `• *Nama Pemangku Hajat:* ${encodeURIComponent(host)}%0A` +
        `• *Nomor WhatsApp:* ${encodeURIComponent(wa)}%0A` +
        `• *Rangkaian Acara:* ${encodeURIComponent(type)}%0A` +
        `• *Rencana Tanggal:* ${encodeURIComponent(date)}%0A` +
        `• *Estimasi Hadirin:* ${pax} Orang%0A` +
        `• *Catatan / Pantangan:* ${encodeURIComponent(notes)}%0A%0A` +
        `Mohon arahan ketersediaan jadwal di Bale Paringgitan. Sembah nuwun.`;

      window.open(`https://wa.me/6281234567890?text=${message}`, '_blank', 'noopener,noreferrer');
      showToast("Permohonan Terkirim ke WhatsApp Protokoler");
    }

    // Abdi Dalem AI Chatbot Logic
    function toggleAbdiDalemChat() {
      const drawer = document.getElementById('abdiDalemDrawer');
      drawer.classList.toggle('hidden');
      drawer.classList.toggle('flex');
    }

    function appendChatMessage(sender, text) {
      const box = document.getElementById('chatMessages');
      const item = document.createElement('div');
      item.className = sender === 'user' 
        ? 'bg-royalGold-400 text-emerald-950 font-bold p-3 rounded-none ml-6 text-xs' 
        : 'bg-emerald-900/60 p-3 border border-royalGold-500/20 text-pearl/90 mr-6 text-xs leading-relaxed';
      if (sender === 'user') {
        item.textContent = text;
      } else {
        item.innerHTML = text;
      }
      box.appendChild(item);
      box.scrollTop = box.scrollHeight;
    }

    function askAbdiDalem(question) {
      appendChatMessage('user', question);
      processAbdiDalemReply(question);
    }

    function handleChatSubmit(e) {
      e.preventDefault();
      const input = document.getElementById('chatInput');
      const val = input.value.trim();
      if (!val) return;
      appendChatMessage('user', val);
      input.value = '';
      processAbdiDalemReply(val);
    }

    function processAbdiDalemReply(rawQuery) {
      const q = rawQuery.toLowerCase();
      setTimeout(() => {
        let reply = "Matur nuwun atas pertanyaannya. Segala kebutuhan khusus jamuan agung dapat dikomunikasikan secara mendalam bersama Protokoler Keraton kami melalui tautan WhatsApp di bawah ini.";
        
        if (q.includes('halal') || q.includes('sertifikat') || q.includes('mui')) {
          reply = "<em>Ngestoni dhawuh.</em> Dapur Pusaka Kusuma Ningrat memegang sertifikasi Halal MUI Grade-A penuh. Seluruh daging sapi, unggas, serta bumbu rempah diolah tanpa arak, alkohol, maupun unsur non-halal lainnya.";
        } else if (q.includes('minimal') || q.includes('pax') || q.includes('tamu') || q.includes('hadirin')) {
          reply = "Kami melayani jamuan mulai dari <strong>50 tamu terhormat</strong> (Intimate Ningrat) hingga <strong>3.000+ hadirin</strong> untuk resepsi pernikahan agung akbar di ballroom maupun pelataran keraton terbuka.";
        } else if (q.includes('tasting') || q.includes('icip') || q.includes('coba') || q.includes('uji rasa')) {
          reply = "Sesi <strong>Uji Rasa Sultan</strong> dapat dijadwalkan setiap hari Selasa hingga Minggu di Bale Paringgitan kami. Anda dapat mengisi formulir Uji Rasa di situs ini atau langsung menghubungi WhatsApp untuk penentuan tanggal.";
        } else if (q.includes('harga') || q.includes('biaya') || q.includes('paket') || q.includes('budget')) {
          reply = "Paket jamuan kami berkisar dari <strong>Rp 325.000/pax</strong> (Kudapan & Canapés), <strong>Rp 485.000/pax</strong> (Prasmanan Agung), hingga <strong>Rp 750.000/pax</strong> (Rijsttafel Seated). Anda dapat menghitungnya langsung pada kalkulator Arsitek Perjamuan di atas.";
        } else if (q.includes('luar kota') || q.includes('jakarta') || q.includes('bali') || q.includes('surabaya') || q.includes('semarang')) {
          reply = "Tentu saja. Kusuma Ningrat memiliki armada dapur bergerak (*mobile kitchen*) lengkap dengan tim abdi dalem berbusana prada yang siap bertolak ke Jakarta, Bali, Surabaya, Semarang, maupun kota lainnya di seluruh Nusantara.";
        }

        appendChatMessage('bot', reply);
      }, 450);
    }

    function handoverChatToWhatsApp() {
      const message = `Kula%20nuwun%20Protokoler%20Kusuma%20Ningrat%2C%20saya%20telah%20berbincang%20dengan%20Abdi%20Dalem%20AI%20dan%20ingin%20melanjutkan%20konsultasi%20langsung%20dengan%20tim%20protokoler.`;
      window.open(`https://wa.me/6281234567890?text=${message}`, '_blank', 'noopener,noreferrer');
    }

    // Run initial calculation
    window.onload = function() {
      recalculateRoyalBanquet();
    };
  </script>
</body>
</html>
@endverbatim
