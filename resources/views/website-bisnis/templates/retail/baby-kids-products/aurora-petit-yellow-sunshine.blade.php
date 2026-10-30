<!DOCTYPE html>

<html class="scroll-smooth" lang="id"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>AURORA &amp; PETIT (Maison de Bébé) — Luxury Children's Boutique</title>
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com" rel="preconnect"/>
<link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400&amp;family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,600&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>

@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#FDFBF7] text-stone-900 font-sunshine-editorial-sans antialiased relative selection:bg-amber-200 selection:text-stone-900">
<!-- ======================================================== -->
<!-- 1. LUXURY ANNOUNCEMENT & COUNTDOWN BAR                   -->
<!-- ======================================================== -->
<div class="bg-stone-950 text-amber-100 text-xs py-2.5 px-4 border-b border-stone-800 transition-all">
<div class="max-w-7xl mx-auto flex flex-col sm:flex-row items-center justify-between gap-2 text-[11px] sm:text-xs">
<div class="flex items-center space-x-2">
<span class="inline-flex items-center justify-center px-1.5 py-0.5 rounded bg-amber-400 text-stone-950 font-bold text-[9px] tracking-wider uppercase">Privilège</span>
<span class="text-stone-300">Gratis Pengiriman Seluruh Indonesia untuk pesanan di atas <strong class="text-amber-300 font-semibold">Rp 499.000</strong></span>
</div>
<div class="flex items-center space-x-4 text-stone-400">
<div class="flex items-center space-x-1.5">
<span class="text-amber-400 text-xs">⏳</span>
<span>Promo Kurasi Musim Semi Berakhir dalam:</span>
<span class="font-mono text-amber-300 font-bold tracking-wider" id="countdown-timer">08:42:19</span>
</div>
<div class="hidden lg:flex items-center space-x-3 text-stone-400 pl-3 border-l border-stone-800">
<a class="hover:text-amber-300 transition" href="#kontak">Boutique: PIM 3 &amp; Surabaya</a>
<span>•</span>
<span class="text-amber-400 font-medium">Concierge +62 812-3456-7890</span>
</div>
</div>
</div>
</div>
<!-- ======================================================== -->
<!-- 2. STICKY GLASSMORPHIC HEADER & NAVIGATION               -->
<!-- ======================================================== -->
<header class="sticky top-0 z-40 sunshine-glass-nav border-b border-stone-200/80 transition-all duration-300 shadow-sm" id="site-header">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="flex items-center justify-between h-20">
<!-- Mobile Nav Hamburger -->
<div class="flex items-center lg:hidden">
<button aria-label="Menu" class="p-2 text-stone-700 hover:text-stone-950 focus:outline-none" onclick="toggleMobileMenu()" type="button">
<span class="material-symbols-outlined text-2xl">menu</span>
</button>
<button aria-label="Cari" class="p-2 text-stone-700 hover:text-stone-950 ml-1" onclick="openSearchModal()" type="button">
<span class="material-symbols-outlined text-xl">search</span>
</button>
</div>
<!-- Brand Maison Logo -->
<a class="flex flex-col items-center sm:items-start text-center group py-1" href="#beranda">
<span class="font-sunshine-editorial-serif tracking-[0.22em] text-xl sm:text-2xl font-bold text-stone-950 uppercase group-hover:text-amber-700 transition-colors">
            AURORA &amp; PETIT
          </span>
<span class="text-[9px] tracking-[0.35em] text-stone-500 uppercase -mt-0.5 font-semibold">
            Maison de Bébé • Paris &amp; Jakarta
          </span>
</a>
<!-- Desktop Navigation Links with Active Indicator -->
<nav class="hidden lg:flex items-center space-x-8 text-[13px] tracking-widest uppercase font-semibold text-stone-700">
<a class="sunshine-nav-item hover:text-amber-700 py-1 transition-colors border-b-2 border-amber-600 text-stone-950 font-bold" href="#beranda">Beranda</a>
<a class="sunshine-nav-item hover:text-amber-700 py-1 transition-colors border-b-2 border-transparent" href="#koleksi">Koleksi</a>
<a class="sunshine-nav-item hover:text-amber-700 py-1 transition-colors border-b-2 border-transparent" href="#filosofi">Filosofi</a>
<a class="sunshine-nav-item hover:text-amber-700 py-1 transition-colors border-b-2 border-transparent" href="#ulasan">Ulasan Ibu</a>
<a class="sunshine-nav-item hover:text-amber-700 py-1 transition-colors border-b-2 border-transparent" href="#faq">FAQ</a>
<a class="sunshine-nav-item hover:text-amber-700 py-1 transition-colors border-b-2 border-transparent" href="#kontak">Butik</a>
</nav>
<!-- Header Actions: Search, Wishlist, Cart Drawer, Lookbook CTA -->
<div class="flex items-center space-x-2 sm:space-x-4">
<!-- Desktop Search Trigger -->
<button class="hidden sm:flex items-center space-x-2 text-stone-600 hover:text-stone-950 px-3 py-1.5 rounded-full hover:bg-stone-100 transition text-xs" onclick="openSearchModal()" type="button">
<span class="material-symbols-outlined text-lg">search</span>
<span class="text-[11px] font-medium tracking-wide">Cari...</span>
</button>
<!-- Wishlist -->
<button class="relative p-2 text-stone-700 hover:text-amber-700 transition" onclick="toggleWishlistModal()" title="Wishlist" type="button">
<span class="material-symbols-outlined text-2xl">favorite</span>
<span class="absolute top-1 right-1 w-4 h-4 bg-amber-500 text-stone-950 text-[10px] font-bold rounded-full flex items-center justify-center" id="wishlist-count">3</span>
</button>
<!-- Mini Cart Trigger -->
<button class="relative p-2 text-stone-700 hover:text-amber-700 transition" onclick="openCartDrawer()" title="Keranjang Belanja" type="button">
<span class="material-symbols-outlined text-2xl">shopping_bag</span>
<span class="absolute top-1 right-1 w-4 h-4 bg-stone-900 text-white text-[10px] font-bold rounded-full flex items-center justify-center" id="cart-badge-count">2</span>
</button>
<!-- Lookbook CTA -->
<a class="hidden md:inline-flex items-center px-4 py-2 text-[11px] tracking-[0.18em] uppercase font-bold text-stone-950 bg-amber-400 hover:bg-amber-300 border border-amber-500 transition-all shadow-sm" href="#koleksi">
            E-Katalog 2025
          </a>
</div>
</div>
</div>
<!-- Mobile Slide-down Menu -->
<div class="hidden lg:hidden border-t border-stone-200 bg-[#FDFBF7] px-6 py-6 space-y-4 text-xs uppercase tracking-widest font-semibold text-stone-800" id="mobile-menu">
<a class="block py-2 border-b border-stone-100" href="#beranda" onclick="toggleMobileMenu()">Beranda Utama</a>
<a class="block py-2 border-b border-stone-100" href="#koleksi" onclick="toggleMobileMenu()">Koleksi Kurasi</a>
<a class="block py-2 border-b border-stone-100" href="#filosofi" onclick="toggleMobileMenu()">Filosofi &amp; Sertifikasi</a>
<a class="block py-2 border-b border-stone-100" href="#ulasan" onclick="toggleMobileMenu()">Ulasan &amp; Dokter Anak</a>
<a class="block py-2 border-b border-stone-100" href="#faq" onclick="toggleMobileMenu()">Tanya Jawab (FAQ)</a>
<a class="block py-2" href="#kontak" onclick="toggleMobileMenu()">Lokasi Butik &amp; Bantuan</a>
</div>
</header>
<!-- ======================================================== -->
<!-- 3. HERO EDITORIAL SECTION                                -->
<!-- ======================================================== -->
<section class="relative pt-10 pb-20 lg:pt-16 lg:pb-28 overflow-hidden border-b border-stone-200" id="beranda">
<div class="absolute -right-32 -top-32 w-96 h-96 rounded-full bg-amber-200/40 blur-3xl pointer-events-none"></div>
<div class="absolute left-1/4 bottom-0 w-80 h-80 rounded-full bg-amber-100/30 blur-2xl pointer-events-none"></div>
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
<div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
<!-- Hero Text & Commercial Hooks -->
<div class="lg:col-span-7 space-y-6 lg:pr-6">
<div class="inline-flex items-center space-x-2.5 text-[11px] uppercase tracking-[0.2em] font-bold text-amber-900 bg-amber-100/90 px-3.5 py-1.5 border border-amber-300 shadow-sm">
<span class="w-2 h-2 rounded-full bg-amber-500 animate-pulse"></span>
<span>Koleksi Kemilau Musim Panas • 100% Organik Bersertifikat</span>
</div>
<h1 class="font-sunshine-editorial-serif text-4xl sm:text-5xl lg:text-[62px] text-stone-950 leading-[1.1] tracking-tight font-medium">
            Kelembutan Sejati untuk <br/>
<span class="italic font-normal sunshine-text-gold-gradient">Buah Hati Tercinta.</span>
</h1>
<p class="text-stone-600 text-base sm:text-lg leading-relaxed max-w-xl font-normal">
            Didesain dengan sentuhan artistik majalah mode Paris. Menghadirkan pakaian katun serat bambu alami hypoallergenic, perlengkapan tidur mewah, dan mainan sensorik kayu lestari yang aman untuk kulit sensitif bayi baru lahir hingga usia balita.
          </p>
<!-- Primary CTAs -->
<div class="pt-2 flex flex-col sm:flex-row items-stretch sm:items-center gap-4">
<a class="inline-flex justify-center items-center px-8 py-4 text-xs uppercase tracking-[0.22em] font-bold text-stone-950 bg-amber-400 hover:bg-amber-300 transition-all duration-200 shadow-lg shadow-amber-200/60 hover:shadow-xl hover:-translate-y-0.5 border border-amber-500" href="#koleksi">
              Beli Koleksi Eksklusif
              <span class="material-symbols-outlined text-sm ml-2">arrow_forward</span>
</a>
<button class="inline-flex justify-center items-center px-8 py-4 text-xs uppercase tracking-[0.2em] font-medium text-stone-800 bg-white hover:bg-stone-50 border border-stone-300 transition-colors shadow-sm" onclick="openQuickBuy('Pure Bamboo Cloud Swaddle 4-Layer', '245000', 'https://lh3.googleusercontent.com/aida/AEtjO1UMjyQemnZQIhfGZZ8TNmHYjzWTsO9hDwjsS7SFzJheHfIDjLqirSTDPLDWDF6h3hD81j1wheOSZg56nI-jAoqxy1p4lBCA55W4FEUi8gXSs7ueNrBhsHHH4X1HjXwPQ0DjJtN41eY4vQg-bO7EMYpW7RmEIeATcWXHrmbCvEfUlpnJQwH-H1dLHo-H8eRNHLbwSmybvsVub9HwngXMxarPfC5b-GlsPhG12i_eUJQ')">
<span class="material-symbols-outlined text-base mr-2 text-amber-600">electric_bolt</span>
              Pesan Instan Swaddle
            </button>
</div>
<!-- Trust Badges & Certifications -->
<div class="pt-8 border-t border-stone-200/90 grid grid-cols-2 sm:grid-cols-4 gap-4 text-stone-700 text-xs">
<div class="flex items-center space-x-2">
<span class="material-symbols-outlined text-amber-600 text-lg">verified</span>
<div>
<strong class="block text-stone-900 font-semibold text-[11px]">OEKO-TEX®</strong>
<span class="text-[10px] text-stone-500">Class 1 Infant Safe</span>
</div>
</div>
<div class="flex items-center space-x-2">
<span class="material-symbols-outlined text-amber-600 text-lg">spa</span>
<div>
<strong class="block text-stone-900 font-semibold text-[11px]">GOTS Organic</strong>
<span class="text-[10px] text-stone-500">100% Tanpa Pestisida</span>
</div>
</div>
<div class="flex items-center space-x-2">
<span class="material-symbols-outlined text-amber-600 text-lg">health_and_safety</span>
<div>
<strong class="block text-stone-900 font-semibold text-[11px]">SNI Resmi</strong>
<span class="text-[10px] text-stone-500">Uji Klinis Bebas Kimia</span>
</div>
</div>
<div class="flex items-center space-x-2">
<span class="material-symbols-outlined text-amber-600 text-lg">sentiment_very_satisfied</span>
<div>
<strong class="block text-stone-900 font-semibold text-[11px]">99.8% Kepuasan</strong>
<span class="text-[10px] text-stone-500">Ibu di Indonesia</span>
</div>
</div>
</div>
</div>
<!-- Editorial Hero Photography Showcase -->
<div class="lg:col-span-5 relative">
<div class="relative bg-amber-100/70 p-4 border border-amber-200/90 shadow-2xl">
<!-- Big Visual Image -->
<div class="overflow-hidden bg-white relative aspect-[4/5] border border-stone-200 group">
<img alt="Bayi tidur nyenyak dalam balutan bedong bambu organik" class="w-full h-full object-cover object-center transition-all duration-700 group-hover:scale-105" src="https://lh3.googleusercontent.com/aida/AEtjO1Wj-TthwTR7FaHf-7EPoX-e-EuSZFTNUgNPkgUuYYAm2tPHbxHIXpFRSo2xtDpg3bjqun97vk7WPBuPPDZXHovqDby1l4NJ7YHyJ4mAN36WJ_hFRQQX6HJUfBvZe1-w14A0UJevQ8m9ABwOXWIjgWzT_R7RKA5P0LymrIQFiWUaR9ZkSwjwoWNQRNXjv65gA9fpeNvwUWVyxzBb6gTrhukm6tHO7tV9sxtm0rviWzPb"/>
<!-- Floating Quick Add / Featured Overlay -->
<div class="absolute bottom-4 left-4 right-4 bg-white/95 backdrop-blur-md p-4 border border-stone-200 shadow-xl transition-all">
<div class="flex justify-between items-center mb-2">
<div>
<span class="text-[10px] uppercase tracking-wider text-amber-800 font-bold bg-amber-100 px-2 py-0.5">Signature Series</span>
<p class="font-sunshine-editorial-serif font-bold text-stone-900 text-base mt-1">Sunlit Organic Bamboo Swaddle</p>
</div>
<div class="text-right">
<span class="text-xs text-stone-400 line-through">Rp 380.000</span>
<span class="block text-base font-bold text-stone-950 font-sunshine-editorial-serif">Rp 329.000</span>
</div>
</div>
<button class="w-full mt-1 bg-stone-950 hover:bg-amber-600 text-white text-[11px] tracking-widest uppercase font-bold py-2 transition-colors flex items-center justify-center space-x-1.5" onclick="addToCart('Sunlit Organic Bamboo Swaddle', 329000, 'https://lh3.googleusercontent.com/aida/AEtjO1Wj-TthwTR7FaHf-7EPoX-e-EuSZFTNUgNPkgUuYYAm2tPHbxHIXpFRSo2xtDpg3bjqun97vk7WPBuPPDZXHovqDby1l4NJ7YHyJ4mAN36WJ_hFRQQX6HJUfBvZe1-w14A0UJevQ8m9ABwOXWIjgWzT_R7RKA5P0LymrIQFiWUaR9ZkSwjwoWNQRNXjv65gA9fpeNvwUWVyxzBb6gTrhukm6tHO7tV9sxtm0rviWzPb')">
<span class="material-symbols-outlined text-sm">shopping_bag</span>
<span>+ Tambah ke Keranjang</span>
</button>
</div>
</div>
<!-- Floating Badge Metric -->
<div class="absolute -bottom-6 -left-6 bg-amber-400 p-5 shadow-2xl border border-amber-500 max-w-[210px] hidden sm:block">
<p class="font-sunshine-editorial-serif text-3xl font-bold text-stone-950">99.8%</p>
<p class="text-[11px] text-stone-900 font-semibold leading-snug mt-1">
                Kepuasan ibu di Indonesia untuk kelembutan kain anti-ruam &amp; sirkulasi adem.
              </p>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- ======================================================== -->
<!-- 4. TRUST & EDITORIAL PRESS MARQUEE                       -->
<!-- ======================================================== -->
<div class="bg-stone-100/70 border-b border-stone-200 py-6 overflow-hidden">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<p class="text-center text-[10px] tracking-[0.3em] uppercase text-stone-500 font-bold mb-4">
        Diliput &amp; Direkomendasikan Oleh Media Parenting Terkemuka
      </p>
<div class="flex flex-wrap items-center justify-center gap-8 sm:gap-14 opacity-75 grayscale hover:grayscale-0 transition-all text-stone-700 font-sunshine-editorial-serif text-sm sm:text-base font-semibold">
<span class="tracking-widest">HARPER'S BAZAAR JUNIOR</span>
<span>•</span>
<span class="tracking-wider italic">Vogue Bambini</span>
<span>•</span>
<span class="font-sans font-bold text-xs uppercase tracking-widest text-stone-800">MOTHER &amp; BABY INDONESIA</span>
<span>•</span>
<span class="tracking-wider font-sans text-xs uppercase text-amber-800 font-bold bg-amber-200/80 px-2 py-1">POPMAMA AWARDS 2024</span>
</div>
</div>
</div>
<!-- ======================================================== -->
<!-- 5. CURATED COLLECTION SECTION WITH WORKING FILTERS       -->
<!-- ======================================================== -->
<section class="py-20 lg:py-28 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" id="koleksi">
<div class="flex flex-col md:flex-row md:items-end justify-between mb-10 border-b border-stone-200 pb-6">
<div>
<span class="text-xs uppercase tracking-[0.28em] text-amber-700 font-bold flex items-center gap-1.5">
<span class="w-2 h-2 rounded-full bg-amber-500"></span> Katalog Kurasi Musim Ini
        </span>
<h2 class="font-sunshine-editorial-serif text-3xl sm:text-4xl text-stone-950 font-semibold mt-1">
          Edisi Esensial Si Kecil
        </h2>
</div>
<p class="text-stone-500 text-sm max-w-md mt-4 md:mt-0 font-normal leading-relaxed">
        Dibuat secara etis, menggunakan serat bambu dan kayu lestari tanpa zat pewarna kimia berbahaya yang rentan memicu alergi bayi.
      </p>
</div>
<!-- Interactive Category Filter Pills -->
<div class="flex items-center space-x-2 overflow-x-auto pb-4 mb-8 sunshine-custom-scroll text-xs">
<button class="category-btn px-5 py-2.5 rounded-full font-bold uppercase tracking-wider bg-stone-950 text-white transition-all" onclick="filterProducts('all', this)">
        Semua Koleksi (4)
      </button>
<button class="category-btn px-5 py-2.5 rounded-full font-medium uppercase tracking-wider bg-stone-100 hover:bg-stone-200 text-stone-700 transition-all" onclick="filterProducts('pakaian', this)">
        Pakaian Bambu
      </button>
<button class="category-btn px-5 py-2.5 rounded-full font-medium uppercase tracking-wider bg-stone-100 hover:bg-stone-200 text-stone-700 transition-all" onclick="filterProducts('makan', this)">
        Peralatan Makan Silikon
      </button>
<button class="category-btn px-5 py-2.5 rounded-full font-medium uppercase tracking-wider bg-stone-100 hover:bg-stone-200 text-stone-700 transition-all" onclick="filterProducts('kayu', this)">
        Sensori Kayu
      </button>
<button class="category-btn px-5 py-2.5 rounded-full font-medium uppercase tracking-wider bg-stone-100 hover:bg-stone-200 text-stone-700 transition-all" onclick="filterProducts('hampers', this)">
        Gift Hampers
      </button>
</div>
<!-- Product Grid: 4 Rich Commercial Cards -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-7" id="product-grid">
<!-- Product 1: Wooden Sensory Ring -->
<article class="product-item group bg-white border border-stone-200 hover:border-amber-400 transition-all duration-300 p-4 flex flex-col justify-between shadow-sm hover:shadow-xl" data-category="kayu">
<div>
<div class="relative overflow-hidden aspect-square bg-stone-100 mb-4">
<img alt="Wooden Sensory Stacking Ring" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" src="https://lh3.googleusercontent.com/aida/AEtjO1XcVjPgkZ_r4nOuMqiZpK74rSr16qGX2FIQ6xzkPMmtXFshcRtY1SmgmsSJLMz4WzAEU1iiPpASMenecingCefoNHF_f_Mq6prSN6Rd_suxfZ2MEVSOdp2anzaSqNvbpIFpWVd6Eo6LIH1B3q8I_n61VxBaMk8OaJuC965jOEylI0Ubbzr24n4usJKBPsHtQQ0UCKAZ30977xIHMtgHarljisUpKdhiSj37IGXQlI8"/>
<span class="absolute top-3 left-3 bg-amber-300 text-stone-950 font-bold text-[10px] tracking-wider uppercase px-2 py-0.5 shadow-sm">Best Seller</span>
<button class="absolute top-3 right-3 p-1.5 rounded-full bg-white/90 text-stone-600 hover:text-rose-600 shadow-sm transition" onclick="quickWishlist(this, 'Wooden Sensory Stacking Ring')" title="Tambah ke Favorit">
<span class="material-symbols-outlined text-base">favorite</span>
</button>
</div>
<div class="flex items-center space-x-1 text-amber-500 text-xs mb-1">
<span>★★★★★</span>
<span class="text-stone-500 text-[10px] font-semibold">(4.9 • 84 ulasan)</span>
</div>
<span class="text-[10px] uppercase tracking-wider text-stone-400 font-semibold block">Montessori Collection</span>
<h3 class="font-sunshine-editorial-serif text-base font-bold text-stone-900 group-hover:text-amber-700 transition-colors line-clamp-1">
            Wooden Sensory Stacking Ring
          </h3>
<p class="text-stone-500 text-xs mt-1 leading-snug line-clamp-2">
            Kayu pinus bersertifikasi FSC dengan cat ramah makanan (food-grade), aman digigit bayi saat fase teething.
          </p>
<!-- Color swatch dots -->
<div class="flex items-center space-x-1.5 mt-3">
<span class="text-[10px] text-stone-400">Pilihan:</span>
<span class="w-3 h-3 rounded-full bg-[#E5D2BA] border border-stone-300 inline-block" title="Natural Pine"></span>
<span class="w-3 h-3 rounded-full bg-[#D4DFCF] border border-stone-300 inline-block" title="Sage Tint"></span>
<span class="w-3 h-3 rounded-full bg-[#F3D5C0] border border-stone-300 inline-block" title="Blush Oat"></span>
</div>
</div>
<div class="mt-4 pt-3 border-t border-stone-100">
<div class="flex items-baseline justify-between mb-2.5">
<span class="font-sunshine-editorial-serif font-bold text-stone-950 text-base">Rp 189.000</span>
<span class="text-[10px] text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded font-medium">Stok Ready</span>
</div>
<div class="grid grid-cols-2 gap-2">
<button class="text-xs uppercase tracking-wider font-semibold text-stone-800 hover:text-amber-800 bg-stone-100 hover:bg-stone-200 py-2 text-center transition" onclick="openQuickBuy('Wooden Sensory Stacking Ring', '189000', 'https://lh3.googleusercontent.com/aida/AEtjO1XcVjPgkZ_r4nOuMqiZpK74rSr16qGX2FIQ6xzkPMmtXFshcRtY1SmgmsSJLMz4WzAEU1iiPpASMenecingCefoNHF_f_Mq6prSN6Rd_suxfZ2MEVSOdp2anzaSqNvbpIFpWVd6Eo6LIH1B3q8I_n61VxBaMk8OaJuC965jOEylI0Ubbzr24n4usJKBPsHtQQ0UCKAZ30977xIHMtgHarljisUpKdhiSj37IGXQlI8')">
              Detail
            </button>
<button class="text-xs uppercase tracking-wider font-bold text-stone-950 bg-amber-400 hover:bg-amber-300 py-2 text-center transition flex items-center justify-center space-x-1" onclick="addToCart('Wooden Sensory Stacking Ring', 189000, 'https://lh3.googleusercontent.com/aida/AEtjO1XcVjPgkZ_r4nOuMqiZpK74rSr16qGX2FIQ6xzkPMmtXFshcRtY1SmgmsSJLMz4WzAEU1iiPpASMenecingCefoNHF_f_Mq6prSN6Rd_suxfZ2MEVSOdp2anzaSqNvbpIFpWVd6Eo6LIH1B3q8I_n61VxBaMk8OaJuC965jOEylI0Ubbzr24n4usJKBPsHtQQ0UCKAZ30977xIHMtgHarljisUpKdhiSj37IGXQlI8')">
<span class="material-symbols-outlined text-sm">add_shopping_cart</span>
<span>+ Beli</span>
</button>
</div>
</div>
</article>
<!-- Product 2: Pure Bamboo Cloud Swaddle -->
<article class="product-item group bg-white border border-stone-200 hover:border-amber-400 transition-all duration-300 p-4 flex flex-col justify-between shadow-sm hover:shadow-xl" data-category="pakaian">
<div>
<div class="relative overflow-hidden aspect-square bg-stone-100 mb-4">
<img alt="Pure Bamboo Cloud Swaddle 4-Layer" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" src="https://lh3.googleusercontent.com/aida/AEtjO1UMjyQemnZQIhfGZZ8TNmHYjzWTsO9hDwjsS7SFzJheHfIDjLqirSTDPLDWDF6h3hD81j1wheOSZg56nI-jAoqxy1p4lBCA55W4FEUi8gXSs7ueNrBhsHHH4X1HjXwPQ0DjJtN41eY4vQg-bO7EMYpW7RmEIeATcWXHrmbCvEfUlpnJQwH-H1dLHo-H8eRNHLbwSmybvsVub9HwngXMxarPfC5b-GlsPhG12i_eUJQ"/>
<span class="absolute top-3 left-3 bg-stone-950 text-white font-bold text-[10px] tracking-wider uppercase px-2 py-0.5 shadow-sm">Edisi Baru</span>
<button class="absolute top-3 right-3 p-1.5 rounded-full bg-white/90 text-stone-600 hover:text-rose-600 shadow-sm transition" onclick="quickWishlist(this, 'Pure Bamboo Cloud Swaddle 4-Layer')" title="Tambah ke Favorit">
<span class="material-symbols-outlined text-base">favorite</span>
</button>
</div>
<div class="flex items-center space-x-1 text-amber-500 text-xs mb-1">
<span>★★★★★</span>
<span class="text-stone-500 text-[10px] font-semibold">(5.0 • 132 ulasan)</span>
</div>
<span class="text-[10px] uppercase tracking-wider text-stone-400 font-semibold block">Bedding Luxury</span>
<h3 class="font-sunshine-editorial-serif text-base font-bold text-stone-900 group-hover:text-amber-700 transition-colors line-clamp-1">
            Pure Bamboo Cloud Swaddle 4-Layer
          </h3>
<p class="text-stone-500 text-xs mt-1 leading-snug line-clamp-2">
            Bedong ekstra adem dengan tenunan 4 lapis breathable, termoregulasi otomatis menjaga tidur lelap sepanjang malam.
          </p>
<!-- Stock Urgency Alert -->
<div class="mt-3 flex items-center space-x-1.5 text-[11px] font-bold text-rose-600 bg-rose-50 px-2.5 py-1 rounded">
<span class="w-1.5 h-1.5 rounded-full bg-rose-600 animate-ping"></span>
<span>Segera Habis: Tersisa 4 pcs</span>
</div>
</div>
<div class="mt-4 pt-3 border-t border-stone-100">
<div class="flex items-baseline justify-between mb-2.5">
<div>
<span class="font-sunshine-editorial-serif font-bold text-stone-950 text-base">Rp 245.000</span>
<span class="text-[10px] text-stone-400 line-through ml-1">Rp 285.000</span>
</div>
<span class="text-[10px] text-amber-800 font-semibold">120 x 120 cm</span>
</div>
<div class="grid grid-cols-2 gap-2">
<button class="text-xs uppercase tracking-wider font-semibold text-stone-800 hover:text-amber-800 bg-stone-100 hover:bg-stone-200 py-2 text-center transition" onclick="openQuickBuy('Pure Bamboo Cloud Swaddle 4-Layer', '245000', 'https://lh3.googleusercontent.com/aida/AEtjO1UMjyQemnZQIhfGZZ8TNmHYjzWTsO9hDwjsS7SFzJheHfIDjLqirSTDPLDWDF6h3hD81j1wheOSZg56nI-jAoqxy1p4lBCA55W4FEUi8gXSs7ueNrBhsHHH4X1HjXwPQ0DjJtN41eY4vQg-bO7EMYpW7RmEIeATcWXHrmbCvEfUlpnJQwH-H1dLHo-H8eRNHLbwSmybvsVub9HwngXMxarPfC5b-GlsPhG12i_eUJQ')">
              Detail
            </button>
<button class="text-xs uppercase tracking-wider font-bold text-stone-950 bg-amber-400 hover:bg-amber-300 py-2 text-center transition flex items-center justify-center space-x-1" onclick="addToCart('Pure Bamboo Cloud Swaddle 4-Layer', 245000, 'https://lh3.googleusercontent.com/aida/AEtjO1UMjyQemnZQIhfGZZ8TNmHYjzWTsO9hDwjsS7SFzJheHfIDjLqirSTDPLDWDF6h3hD81j1wheOSZg56nI-jAoqxy1p4lBCA55W4FEUi8gXSs7ueNrBhsHHH4X1HjXwPQ0DjJtN41eY4vQg-bO7EMYpW7RmEIeATcWXHrmbCvEfUlpnJQwH-H1dLHo-H8eRNHLbwSmybvsVub9HwngXMxarPfC5b-GlsPhG12i_eUJQ')">
<span class="material-symbols-outlined text-sm">add_shopping_cart</span>
<span>+ Beli</span>
</button>
</div>
</div>
</article>
<!-- Product 3: Silicone Suction Dining Set -->
<article class="product-item group bg-white border border-stone-200 hover:border-amber-400 transition-all duration-300 p-4 flex flex-col justify-between shadow-sm hover:shadow-xl" data-category="makan">
<div>
<div class="relative overflow-hidden aspect-square bg-stone-100 mb-4">
<img alt="Silicone Suction Dining Set" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" src="https://lh3.googleusercontent.com/aida/AEtjO1Xif6eshlBF3Cdlvs_-qkn4mGntEiFBmcOc66qrI9ky1oEyVxzoj0tMiOh3IoPcR15BGLNielv50wtqlgVlDNbTsJWaxaFP0pFRp_1MT1wgHvhilroCNu7zZiHCU6Om9rGCRcvSoHqGZ1eR5OKvFrLUFPnaXQxncvav6QXIe8brw7_4UOy1XdJGpxbQfxNSpSRsLRZJxINXvtivNyVVg-8cMHR8ou3p3V3Rtb8IXEBL"/>
<span class="absolute top-3 left-3 bg-amber-100 text-amber-900 border border-amber-300 font-bold text-[10px] tracking-wider uppercase px-2 py-0.5 shadow-sm">BPA &amp; PVC Free</span>
<button class="absolute top-3 right-3 p-1.5 rounded-full bg-white/90 text-stone-600 hover:text-rose-600 shadow-sm transition" onclick="quickWishlist(this, 'Silicone Suction Dining Set Complete')" title="Tambah ke Favorit">
<span class="material-symbols-outlined text-base">favorite</span>
</button>
</div>
<div class="flex items-center space-x-1 text-amber-500 text-xs mb-1">
<span>★★★★★</span>
<span class="text-stone-500 text-[10px] font-semibold">(4.9 • 67 ulasan)</span>
</div>
<span class="text-[10px] uppercase tracking-wider text-stone-400 font-semibold block">Mealtime Ease</span>
<h3 class="font-sunshine-editorial-serif text-base font-bold text-stone-900 group-hover:text-amber-700 transition-colors line-clamp-1">
            Silicone Suction Dining Set Complete
          </h3>
<p class="text-stone-500 text-xs mt-1 leading-snug line-clamp-2">
            Piring sekat vakum anti-tumpah, sendok &amp; garpu lembut untuk gusi bayi saat awal MPASI mandiri.
          </p>
<div class="mt-3 flex items-center space-x-2 text-[10px] text-stone-600 bg-stone-50 px-2 py-1 border border-stone-200">
<span class="material-symbols-outlined text-xs text-amber-600">microwave</span>
<span>Microwave &amp; Dishwasher Safe (-40°C ~ 220°C)</span>
</div>
</div>
<div class="mt-4 pt-3 border-t border-stone-100">
<div class="flex items-baseline justify-between mb-2.5">
<span class="font-sunshine-editorial-serif font-bold text-stone-950 text-base">Rp 279.000</span>
<span class="text-[10px] text-stone-500">Isi: 4 Item</span>
</div>
<div class="grid grid-cols-2 gap-2">
<button class="text-xs uppercase tracking-wider font-semibold text-stone-800 hover:text-amber-800 bg-stone-100 hover:bg-stone-200 py-2 text-center transition" onclick="openQuickBuy('Silicone Suction Dining Set Complete', '279000', 'https://lh3.googleusercontent.com/aida/AEtjO1Xif6eshlBF3Cdlvs_-qkn4mGntEiFBmcOc66qrI9ky1oEyVxzoj0tMiOh3IoPcR15BGLNielv50wtqlgVlDNbTsJWaxaFP0pFRp_1MT1wgHvhilroCNu7zZiHCU6Om9rGCRcvSoHqGZ1eR5OKvFrLUFPnaXQxncvav6QXIe8brw7_4UOy1XdJGpxbQfxNSpSRsLRZJxINXvtivNyVVg-8cMHR8ou3p3V3Rtb8IXEBL')">
              Detail
            </button>
<button class="text-xs uppercase tracking-wider font-bold text-stone-950 bg-amber-400 hover:bg-amber-300 py-2 text-center transition flex items-center justify-center space-x-1" onclick="addToCart('Silicone Suction Dining Set Complete', 279000, 'https://lh3.googleusercontent.com/aida/AEtjO1Xif6eshlBF3Cdlvs_-qkn4mGntEiFBmcOc66qrI9ky1oEyVxzoj0tMiOh3IoPcR15BGLNielv50wtqlgVlDNbTsJWaxaFP0pFRp_1MT1wgHvhilroCNu7zZiHCU6Om9rGCRcvSoHqGZ1eR5OKvFrLUFPnaXQxncvav6QXIe8brw7_4UOy1XdJGpxbQfxNSpSRsLRZJxINXvtivNyVVg-8cMHR8ou3p3V3Rtb8IXEBL')">
<span class="material-symbols-outlined text-sm">add_shopping_cart</span>
<span>+ Beli</span>
</button>
</div>
</div>
</article>
<!-- Product 4: Luxury Newborn Welcome Hamper Box -->
<article class="product-item group bg-white border border-stone-200 hover:border-amber-400 transition-all duration-300 p-4 flex flex-col justify-between shadow-sm hover:shadow-xl" data-category="hampers">
<div>
<div class="relative overflow-hidden aspect-square bg-stone-100 mb-4">
<img alt="Newborn Welcome Hamper Box" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" src="https://lh3.googleusercontent.com/aida/AEtjO1Wj-TthwTR7FaHf-7EPoX-e-EuSZFTNUgNPkgUuYYAm2tPHbxHIXpFRSo2xtDpg3bjqun97vk7WPBuPPDZXHovqDby1l4NJ7YHyJ4mAN36WJ_hFRQQX6HJUfBvZe1-w14A0UJevQ8m9ABwOXWIjgWzT_R7RKA5P0LymrIQFiWUaR9ZkSwjwoWNQRNXjv65gA9fpeNvwUWVyxzBb6gTrhukm6tHO7tV9sxtm0rviWzPb"/>
<span class="absolute top-3 left-3 bg-stone-900 text-amber-300 font-bold text-[10px] tracking-wider uppercase px-2 py-0.5 shadow-sm">Gift Box Exclusive</span>
<button class="absolute top-3 right-3 p-1.5 rounded-full bg-white/90 text-stone-600 hover:text-rose-600 shadow-sm transition" onclick="quickWishlist(this, 'Le Petit Newborn Welcome Gift Trunk')" title="Tambah ke Favorit">
<span class="material-symbols-outlined text-base">favorite</span>
</button>
</div>
<div class="flex items-center space-x-1 text-amber-500 text-xs mb-1">
<span>★★★★★</span>
<span class="text-stone-500 text-[10px] font-semibold">(5.0 • 49 ulasan)</span>
</div>
<span class="text-[10px] uppercase tracking-wider text-stone-400 font-semibold block">Personalized Hamper</span>
<h3 class="font-sunshine-editorial-serif text-base font-bold text-stone-900 group-hover:text-amber-700 transition-colors line-clamp-1">
            Le Petit Newborn Welcome Trunk
          </h3>
<p class="text-stone-500 text-xs mt-1 leading-snug line-clamp-2">
            Paket kado kelahiran berisi 2 swaddle bambu, 1 set sendok silikon, 1 teether kayu, dan gratis kartu ucapan kaligrafi.
          </p>
<div class="mt-3 flex items-center space-x-1 text-[11px] text-amber-800 font-semibold">
<span class="material-symbols-outlined text-sm">edit_note</span>
<span>Gratis Grafir Nama Si Kecil</span>
</div>
</div>
<div class="mt-4 pt-3 border-t border-stone-100">
<div class="flex items-baseline justify-between mb-2.5">
<span class="font-sunshine-editorial-serif font-bold text-stone-950 text-base">Rp 649.000</span>
<span class="text-[10px] text-amber-600 bg-amber-50 px-2 py-0.5 rounded font-bold">Hardbox Pita</span>
</div>
<div class="grid grid-cols-2 gap-2">
<button class="text-xs uppercase tracking-wider font-semibold text-stone-800 hover:text-amber-800 bg-stone-100 hover:bg-stone-200 py-2 text-center transition" onclick="openQuickBuy('Le Petit Newborn Welcome Trunk', '649000', 'https://lh3.googleusercontent.com/aida/AEtjO1Wj-TthwTR7FaHf-7EPoX-e-EuSZFTNUgNPkgUuYYAm2tPHbxHIXpFRSo2xtDpg3bjqun97vk7WPBuPPDZXHovqDby1l4NJ7YHyJ4mAN36WJ_hFRQQX6HJUfBvZe1-w14A0UJevQ8m9ABwOXWIjgWzT_R7RKA5P0LymrIQFiWUaR9ZkSwjwoWNQRNXjv65gA9fpeNvwUWVyxzBb6gTrhukm6tHO7tV9sxtm0rviWzPb')">
              Detail
            </button>
<button class="text-xs uppercase tracking-wider font-bold text-stone-950 bg-amber-400 hover:bg-amber-300 py-2 text-center transition flex items-center justify-center space-x-1" onclick="addToCart('Le Petit Newborn Welcome Trunk', 649000, 'https://lh3.googleusercontent.com/aida/AEtjO1Wj-TthwTR7FaHf-7EPoX-e-EuSZFTNUgNPkgUuYYAm2tPHbxHIXpFRSo2xtDpg3bjqun97vk7WPBuPPDZXHovqDby1l4NJ7YHyJ4mAN36WJ_hFRQQX6HJUfBvZe1-w14A0UJevQ8m9ABwOXWIjgWzT_R7RKA5P0LymrIQFiWUaR9ZkSwjwoWNQRNXjv65gA9fpeNvwUWVyxzBb6gTrhukm6tHO7tV9sxtm0rviWzPb')">
<span class="material-symbols-outlined text-sm">add_shopping_cart</span>
<span>+ Beli</span>
</button>
</div>
</div>
</article>
</div>
<!-- Collection Bottom Assurance Banner -->
<div class="mt-14 bg-amber-50/80 border border-amber-200 p-6 flex flex-col md:flex-row items-center justify-between gap-4">
<div class="flex items-center space-x-4">
<div class="w-12 h-12 rounded-full bg-amber-400 flex items-center justify-center text-stone-950 text-2xl font-bold shadow-sm">
<span class="material-symbols-outlined">package_2</span>
</div>
<div>
<h4 class="font-sunshine-editorial-serif font-bold text-stone-900 text-base">Kemasan Ramah Lingkungan &amp; Bebas Plastik</h4>
<p class="text-stone-600 text-xs">Setiap pesanan dibungkus kotak biodegradable bersertifikasi FSC dan segel lilin higienis.</p>
</div>
</div>
<a class="whitespace-nowrap px-6 py-2.5 bg-stone-950 hover:bg-amber-600 text-white text-xs uppercase tracking-widest font-bold transition" href="https://wa.me/6281234567890?text=Halo%20Admin%20Aurora%20Petit,%20saya%20butuh%20katalog%20lengkap%20PDF%20dan%20size%20guide." rel="noopener noreferrer" target="_blank">
        Minta Katalog PDF Lengkap
      </a>
</div>
</section>
<!-- ======================================================== -->
<!-- 6. BRAND STORY & CRAFTSMANSHIP PILLARS                   -->
<!-- ======================================================== -->
<section class="bg-amber-100/50 py-20 border-y border-amber-200/80" id="filosofi">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center mb-16">
<div class="lg:col-span-5 font-sunshine-editorial-serif">
<span class="text-xs tracking-[0.25em] uppercase font-bold text-amber-800 block mb-2">Filosofi &amp; Standar Mutu</span>
<h2 class="text-3xl sm:text-4xl text-stone-950 font-medium leading-snug">
            "Kenyamanan adalah bahasa cinta pertama yang dipahami seorang bayi."
          </h2>
</div>
<div class="lg:col-span-7 space-y-4 text-stone-700 text-sm sm:text-base leading-relaxed">
<p>
            Kami mengawali perjalanan dari keinginan sederhana para orang tua: menemukan produk perlengkapan bayi yang tidak hanya estetis diabadikan dalam foto keluarga, tetapi memenuhi standar kemurnian tekstil tertinggi dunia tanpa kompromi bahan berbahaya.
          </p>
<p>
            Setiap jahitan dihaluskan ke bagian luar agar tidak menekan kulit bayi prematur maupun balita yang aktif bereksplorasi. Kami berkomitmen menjaga transparansi rantai pasok lokal dan ramah bumi.
          </p>
</div>
</div>
<!-- 3 Value Pillars -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-8 pt-8 border-t border-amber-200">
<div class="bg-white/80 p-8 border border-stone-200/80 shadow-sm hover:shadow-md transition">
<div class="w-12 h-12 rounded-lg bg-amber-200 flex items-center justify-center text-amber-900 mb-4">
<span class="material-symbols-outlined text-2xl">eco</span>
</div>
<h3 class="font-sunshine-editorial-serif text-xl font-bold text-stone-950 mb-2">100% Organik &amp; Hipoalergenik</h3>
<p class="text-stone-600 text-xs sm:text-sm leading-relaxed">
            Serat bambu organik termoregulasi mendinginkan saat gerah dan menghangatkan saat dingin. Sangat ramah untuk bayi penderita dermatitis atopik dan eksim.
          </p>
</div>
<div class="bg-white/80 p-8 border border-stone-200/80 shadow-sm hover:shadow-md transition">
<div class="w-12 h-12 rounded-lg bg-amber-200 flex items-center justify-center text-amber-900 mb-4">
<span class="material-symbols-outlined text-2xl">medical_services</span>
</div>
<h3 class="font-sunshine-editorial-serif text-xl font-bold text-stone-950 mb-2">Standar Medis Neonatal</h3>
<p class="text-stone-600 text-xs sm:text-sm leading-relaxed">
            Lolos uji laboratorium terakreditasi internasional bebas logam berat, formaldehida, ftalat, serta zat pewarna azo terlarang. Standar aman untuk ruang rawat neonatal.
          </p>
</div>
<div class="bg-white/80 p-8 border border-stone-200/80 shadow-sm hover:shadow-md transition">
<div class="w-12 h-12 rounded-lg bg-amber-200 flex items-center justify-center text-amber-900 mb-4">
<span class="material-symbols-outlined text-2xl">all_inclusive</span>
</div>
<h3 class="font-sunshine-editorial-serif text-xl font-bold text-stone-950 mb-2">Etis &amp; Ramah Lingkungan</h3>
<p class="text-stone-600 text-xs sm:text-sm leading-relaxed">
            Kayu dipanen dari hutan pinus bersertifikat FSC dan diproduksi bersama pengrajin kayu keluarga terpercaya dengan upah berkeadilan (Fair Trade Certified).
          </p>
</div>
</div>
</div>
</section>
<!-- ======================================================== -->
<!-- 7. VERIFIED REVIEWS & SOCIAL PROOF                       -->
<!-- ======================================================== -->
<section class="py-20 lg:py-28 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" id="ulasan">
<div class="text-center max-w-2xl mx-auto mb-16">
<span class="text-xs uppercase tracking-[0.25em] font-bold text-amber-800 block">Kisah &amp; Rekomendasi Nyata</span>
<h2 class="font-sunshine-editorial-serif text-3xl sm:text-4xl font-semibold text-stone-950 mt-1">
        Dipercaya Ribuan Ibu &amp; Dokter Anak
      </h2>
<p class="text-stone-500 text-sm mt-3">
        Kenyamanan buah hati dibuktikan langsung oleh keluarga di seluruh Indonesia.
      </p>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
<!-- Review 1: Bunda Clarissa -->
<div class="bg-white border border-stone-200 p-8 shadow-sm flex flex-col justify-between hover:shadow-md transition">
<div>
<div class="flex items-center space-x-1 text-amber-500 text-sm mb-4">
<span>★★★★★</span>
<span class="ml-2 text-[10px] font-bold uppercase tracking-wider text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded">Terverifikasi Beli</span>
</div>
<p class="font-sunshine-editorial-serif text-stone-900 text-base italic leading-relaxed mb-6">
            "Anak kedua saya ada bakat eksim turunan. Pakai swaddle bambu Aurora &amp; Petit ini beda banget sama kain katun biasa, ademnya pas dan nggak ada lagi bintik merah di leher tiap bangun pagi."
          </p>
</div>
<div class="pt-4 border-t border-stone-100 flex items-center space-x-3">
<div class="w-10 h-10 rounded-full bg-amber-200 text-stone-900 font-bold flex items-center justify-center font-sunshine-editorial-serif text-sm">
            CA
          </div>
<div>
<h4 class="font-bold text-xs text-stone-900">Bunda Clarissa Anindya</h4>
<p class="text-[11px] text-stone-500">Ibu 2 Anak • Pondok Indah, Jakarta</p>
</div>
</div>
</div>
<!-- Review 2: Dokter Spesialis Anak -->
<div class="bg-[#FFFDF3] border-2 border-amber-300 p-8 shadow-md flex flex-col justify-between hover:shadow-lg transition relative">
<span class="absolute -top-3 right-6 bg-amber-400 text-stone-950 text-[10px] font-bold uppercase tracking-wider px-3 py-0.5 shadow-sm">
          Pediatrician Endorsement
        </span>
<div>
<div class="flex items-center space-x-1 text-amber-500 text-sm mb-4">
<span>★★★★★</span>
<span class="ml-2 text-[10px] font-bold uppercase tracking-wider text-amber-900 bg-amber-100 px-2 py-0.5 rounded">Dokter Spesialis Anak</span>
</div>
<p class="font-sunshine-editorial-serif text-stone-900 text-base italic leading-relaxed mb-6">
            "Sebagai dokter anak, saya sangat memperhatikan faktor sirkulasi kain dan zat aditif warna. Aurora &amp; Petit memenuhi standar tekstil OEKO-TEX Class 1 yang minim risiko dermatitis kontak pada newborn."
          </p>
</div>
<div class="pt-4 border-t border-amber-200 flex items-center space-x-3">
<div class="w-10 h-10 rounded-full bg-amber-400 text-stone-950 font-bold flex items-center justify-center text-sm">
<span class="material-symbols-outlined text-base">stethoscope</span>
</div>
<div>
<h4 class="font-bold text-xs text-stone-900">dr. Natasha R., Sp.A</h4>
<p class="text-[11px] text-amber-900 font-medium">Spesialis Anak &amp; Konsultan Tumbuh Kembang</p>
</div>
</div>
</div>
<!-- Review 3: Bunda Aurel -->
<div class="bg-white border border-stone-200 p-8 shadow-sm flex flex-col justify-between hover:shadow-md transition">
<div>
<div class="flex items-center space-x-1 text-amber-500 text-sm mb-4">
<span>★★★★★</span>
<span class="ml-2 text-[10px] font-bold uppercase tracking-wider text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded">Terverifikasi Beli</span>
</div>
<p class="font-sunshine-editorial-serif text-stone-900 text-base italic leading-relaxed mb-6">
            "Peralatan makan silikonnya vakumnya kencang banget di highchair! MPASI anak saya jadi lebih mandiri tanpa drama mangkok terlempar. Warnanya juga mewah banget khas Scandic chic."
          </p>
</div>
<div class="pt-4 border-t border-stone-100 flex items-center space-x-3">
<div class="w-10 h-10 rounded-full bg-amber-200 text-stone-900 font-bold flex items-center justify-center font-sunshine-editorial-serif text-sm">
            AW
          </div>
<div>
<h4 class="font-bold text-xs text-stone-900">Bunda Aurel Wicaksono</h4>
<p class="text-[11px] text-stone-500">Ibu 1 Anak (8 Bulan) • Surabaya</p>
</div>
</div>
</div>
</div>
</section>
<!-- ======================================================== -->
<!-- 8. FAQ ACCORDION SECTION (5 DETAILED QUESTIONS)          -->
<!-- ======================================================== -->
<section class="py-20 lg:py-24 bg-amber-50/40 border-t border-stone-200" id="faq">
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="text-center mb-14">
<span class="text-xs uppercase tracking-[0.25em] font-bold text-amber-800 block">Pusat Informasi</span>
<h2 class="font-sunshine-editorial-serif text-3xl sm:text-4xl font-bold text-stone-950 mt-1">
          Pertanyaan yang Sering Diajukan
        </h2>
<p class="text-stone-500 text-sm mt-3">
          Jawaban transparan mengenai bahan baku, pengiriman kilat, panduan ukuran, dan jaminan keamanan bayi.
        </p>
</div>
<div class="space-y-4" id="faq-accordion-group">
<!-- FAQ 1 -->
<div class="border border-stone-200 bg-white transition-all">
<button class="w-full text-left px-6 py-5 flex items-center justify-between font-sunshine-editorial-serif text-base sm:text-lg font-semibold text-stone-900 hover:text-amber-800 transition" onclick="toggleFaq(1)">
<span>1. Apakah bahan kain aman untuk bayi baru lahir dengan riwayat eksim atau kulit sensitif?</span>
<span class="text-xl text-stone-400 font-normal transition-transform duration-300" id="faq-icon-1">+</span>
</button>
<div class="hidden px-6 pb-6 text-sm text-stone-600 leading-relaxed border-t border-stone-100 pt-4" id="faq-content-1">
            Sangat aman. Seluruh lini pakaian kami memakai 100% serat bambu organik bersertifikat OEKO-TEX® Class 1 (standar tertinggi uji dermatologi bayi). Bersifat hypoallergenic, berpori termal adaptif yang mencegah biang keringat, serta bebas dari residu zat pemutih klorin maupun pestisida kimia.
          </div>
</div>
<!-- FAQ 2 -->
<div class="border border-stone-200 bg-white transition-all">
<button class="w-full text-left px-6 py-5 flex items-center justify-between font-sunshine-editorial-serif text-base sm:text-lg font-semibold text-stone-900 hover:text-amber-800 transition" onclick="toggleFaq(2)">
<span>2. Bagaimana cara mencuci pakaian dan bedong bambu agar kelembutannya tahan lama?</span>
<span class="text-xl text-stone-400 font-normal transition-transform duration-300" id="faq-icon-2">+</span>
</button>
<div class="hidden px-6 pb-6 text-sm text-stone-600 leading-relaxed border-t border-stone-100 pt-4" id="faq-content-2">
            Disarankan mencuci tangan atau menggunakan mesin cuci dengan kantong laundry (delicate mode) memakai deterjen bayi bebas enzim keras. Jangan gunakan pemutih klorin. Hindari pengering mesin suhu tinggi (tumble dry hot); cukup keringkan alami di tempat teduh berangin agar serat bambu tetap halus seperti sutra.
          </div>
</div>
<!-- FAQ 3 -->
<div class="border border-stone-200 bg-white transition-all">
<button class="w-full text-left px-6 py-5 flex items-center justify-between font-sunshine-editorial-serif text-base sm:text-lg font-semibold text-stone-900 hover:text-amber-800 transition" onclick="toggleFaq(3)">
<span>3. Apakah tersedia pengiriman di hari yang sama (Same-Day / Instan)?</span>
<span class="text-xl text-stone-400 font-normal transition-transform duration-300" id="faq-icon-3">+</span>
</button>
<div class="hidden px-6 pb-6 text-sm text-stone-600 leading-relaxed border-t border-stone-100 pt-4" id="faq-content-3">
            Ya! Kami menyediakan kurir GoSend / GrabExpress Instant &amp; Sameday untuk wilayah Jabodetabek dan Surabaya (dari butik PIM 3 &amp; Surabaya) untuk order yang masuk sebelum pukul 15.00 WIB setiap Senin–Sabtu. Untuk kota lain, pesanan reguler tiba dalam 1–3 hari kerja dengan garansi asuransi penuh.
          </div>
</div>
<!-- FAQ 4 -->
<div class="border border-stone-200 bg-white transition-all">
<button class="w-full text-left px-6 py-5 flex items-center justify-between font-sunshine-editorial-serif text-base sm:text-lg font-semibold text-stone-900 hover:text-amber-800 transition" onclick="toggleFaq(4)">
<span>4. Bisakah melakukan penukaran ukuran jika pakaian tidak pas saat dicoba?</span>
<span class="text-xl text-stone-400 font-normal transition-transform duration-300" id="faq-icon-4">+</span>
</button>
<div class="hidden px-6 pb-6 text-sm text-stone-600 leading-relaxed border-t border-stone-100 pt-4" id="faq-content-4">
            Tentu. Kami menyediakan kebijakan penukaran ukuran bebas repot dalam jangka waktu 14 hari sejak barang diterima. Syaratnya: label tag belum dilepas, belum dicuci, dan dalam kemasan aslinya. Tim Concierge kami di WhatsApp siap memandu proses penjemputan paket pengganti ke alamat Anda.
          </div>
</div>
<!-- FAQ 5 -->
<div class="border border-stone-200 bg-white transition-all">
<button class="w-full text-left px-6 py-5 flex items-center justify-between font-sunshine-editorial-serif text-base sm:text-lg font-semibold text-stone-900 hover:text-amber-800 transition" onclick="toggleFaq(5)">
<span>5. Apakah tersedia bingkisan kado (Newborn Hampers) kustom dengan grafir nama bayi?</span>
<span class="text-xl text-stone-400 font-normal transition-transform duration-300" id="faq-icon-5">+</span>
</button>
<div class="hidden px-6 pb-6 text-sm text-stone-600 leading-relaxed border-t border-stone-100 pt-4" id="faq-content-5">
            Tentu saja. Anda bisa memesan kemasan hardbox mewah berpita satin dengan kartu ucapan tulisan tangan kaligrafi gratis. Untuk lini mainan kayu dan teether, kami melayani grafir laser inisial atau nama panggilan bayi dengan waktu pengerjaan 1 hari kerja sebelum dikirim langsung ke penerima kado.
          </div>
</div>
</div>
</div>
</section>
<!-- ======================================================== -->
<!-- 9. FOOTER, NEWSLETTER & PAYMENT BADGES                   -->
<!-- ======================================================== -->
<footer class="bg-stone-950 text-stone-300 pt-20 pb-12 border-t border-stone-800" id="kontak">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<!-- Newsletter Banner inside Footer -->
<div class="bg-stone-900 border border-stone-800 p-8 sm:p-10 mb-16 flex flex-col lg:flex-row items-center justify-between gap-8">
<div class="max-w-xl text-center lg:text-left">
<span class="text-amber-400 text-xs uppercase tracking-widest font-bold">Warta Editorial &amp; Privilege Club</span>
<h3 class="font-sunshine-editorial-serif text-2xl sm:text-3xl font-bold text-white mt-1">
            Bergabunglah dengan Maison Family
          </h3>
<p class="text-stone-400 text-xs sm:text-sm mt-2">
            Dapatkan voucher selamat datang <strong class="text-amber-300">Rp 100.000</strong>, panduan milestone bayi mingguan, dan akses awal koleksi edisi terbatas.
          </p>
</div>
<form class="w-full lg:w-auto flex flex-col sm:flex-row gap-2 max-w-md" onsubmit="handleNewsletter(event)">
<input class="bg-stone-950 border border-stone-700 px-4 py-3 text-xs text-white placeholder-stone-500 focus:outline-none focus:border-amber-400 w-full sm:w-72" id="newsletter-email" placeholder="Masukkan alamat email Anda..." required="" type="email"/>
<button class="bg-amber-400 hover:bg-amber-300 text-stone-950 font-bold uppercase tracking-widest text-xs px-6 py-3 transition whitespace-nowrap" type="submit">
            Daftar Sekarang
          </button>
</form>
</div>
<!-- Footer Columns -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 pb-14 border-b border-stone-800">
<!-- Brand Summary -->
<div class="space-y-4">
<span class="font-sunshine-editorial-serif text-2xl tracking-wider text-amber-300 font-bold block">
            AURORA &amp; PETIT
          </span>
<span class="text-[10px] tracking-[0.3em] uppercase text-stone-500 font-bold block -mt-2">
            Maison de Bébé
          </span>
<p class="text-xs text-stone-400 leading-relaxed">
            Butik kurasi perlengkapan bayi dan anak bergaya editorial Paris. Menggabungkan standar kemurnian medis alam dan kenyamanan estetis harian keluarga.
          </p>
<div class="text-xs text-stone-300 space-y-1 pt-1">
<p><strong class="text-amber-400">Jam Operasional:</strong></p>
<p class="text-stone-400">Senin – Minggu: 09.00 – 21.00 WIB</p>
<p class="text-stone-400">WhatsApp Concierge: 24/7 Respon Cepat</p>
</div>
</div>
<!-- Flagship Boutiques -->
<div>
<h4 class="text-xs uppercase tracking-widest text-white font-bold mb-4 flex items-center gap-1.5">
<span class="material-symbols-outlined text-amber-400 text-sm">storefront</span> Lokasi Butik Fisik
          </h4>
<ul class="space-y-4 text-xs text-stone-400">
<div>
<strong class="text-stone-200 block text-xs font-semibold">Flagship Boutique Jakarta:</strong>
<p class="mt-0.5">Pondok Indah Mall 3 (PIM 3), Lantai 2 Unit 208, Jakarta Selatan</p>
</div>
<div>
<strong class="text-stone-200 block text-xs font-semibold">Boutique Atelier Surabaya:</strong>
<p class="mt-0.5">Tunjungan Plaza 6, Lantai 4, Surabaya Pusat</p>
</div>
</ul>
</div>
<!-- Customer Care Navigation -->
<div>
<h4 class="text-xs uppercase tracking-widest text-white font-bold mb-4">Layanan &amp; Informasi</h4>
<ul class="space-y-2.5 text-xs text-stone-400">
<li><a class="hover:text-amber-300 transition" href="#koleksi">Panduan Ukuran (Size &amp; Age Chart)</a></li>
<li><a class="hover:text-amber-300 transition" href="#faq">Kebijakan Garansi Mutu 14 Hari</a></li>
<li><a class="hover:text-amber-300 transition" href="#koleksi">Personalisasi Kartu Ucapan &amp; Kado</a></li>
<li><a class="hover:text-amber-300 transition" href="#filosofi">Sertifikasi Laboratorium OEKO-TEX®</a></li>
<li><a class="hover:text-amber-300 transition" href="https://wa.me/6281234567890?text=Halo%20Admin,%20saya%20ingin%20melacak%20status%20resi%20pesanan." rel="noopener noreferrer" target="_blank">Pelacakan Resi Pengiriman Kilat</a></li>
</ul>
</div>
<!-- Payment Channels & Trust -->
<div>
<h4 class="text-xs uppercase tracking-widest text-white font-bold mb-4">Metode Pembayaran Aman</h4>
<p class="text-xs text-stone-400 mb-4">
            Menerima pembayaran resmi instan terenkripsi SSL 256-bit:
          </p>
<div class="grid grid-cols-3 gap-2 text-center text-[10px] font-bold">
<span class="bg-stone-900 border border-stone-800 text-stone-300 py-1.5 px-2">BCA VA</span>
<span class="bg-stone-900 border border-stone-800 text-stone-300 py-1.5 px-2">MANDIRI</span>
<span class="bg-stone-900 border border-stone-800 text-stone-300 py-1.5 px-2">QRIS</span>
<span class="bg-stone-900 border border-stone-800 text-stone-300 py-1.5 px-2">VISA</span>
<span class="bg-stone-900 border border-stone-800 text-stone-300 py-1.5 px-2">MASTERCARD</span>
<span class="bg-stone-900 border border-stone-800 text-amber-400 py-1.5 px-2">GOPAY</span>
</div>
<div class="mt-4 pt-3 border-t border-stone-800 flex items-center space-x-2 text-[11px] text-stone-500">
<span class="material-symbols-outlined text-emerald-400 text-sm">lock</span>
<span>Enkripsi Pembayaran Aman Terjamin</span>
</div>
</div>
</div>
<!-- Bottom Legal and Socials -->
<div class="pt-8 flex flex-col sm:flex-row items-center justify-between text-[11px] text-stone-500 gap-4">
<p>© 2025 AURORA &amp; PETIT (Maison de Bébé). Seluruh hak cipta dilindungi undang-undang.</p>
<div class="flex items-center space-x-6">
<a class="hover:text-amber-300 transition" href="#">Instagram @aurorapetit.id</a>
<a class="hover:text-amber-300 transition" href="#">Pinterest Lookbook</a>
<a class="hover:text-amber-300 transition" href="#">Syarat &amp; Ketentuan</a>
<a class="hover:text-amber-300 transition" href="#">Kebijakan Privasi</a>
</div>
</div>
</div>
</footer>
<!-- ======================================================== -->
<!-- 10. SLIDE-OVER MINI CART DRAWER (INTERACTIVE)            -->
<!-- ======================================================== -->
<div class="fixed inset-0 bg-stone-950/60 backdrop-blur-sm z-50 hidden transition-opacity" id="cart-drawer-backdrop" onclick="closeCartDrawer()"></div>
<aside class="fixed top-0 right-0 h-full w-full max-w-md bg-white shadow-2xl z-50 transform translate-x-full transition-transform duration-300 flex flex-col" id="cart-drawer">
<!-- Drawer Header -->
<div class="p-6 border-b border-stone-200 flex items-center justify-between bg-stone-50">
<div class="flex items-center space-x-2">
<span class="material-symbols-outlined text-amber-700">shopping_bag</span>
<h3 class="font-sunshine-editorial-serif font-bold text-stone-950 text-lg">Keranjang Belanja Anda</h3>
<span class="bg-amber-400 text-stone-950 text-xs font-bold px-2 py-0.5 rounded-full" id="cart-drawer-count">2</span>
</div>
<button class="p-2 text-stone-400 hover:text-stone-900 transition" onclick="closeCartDrawer()">
<span class="material-symbols-outlined text-xl">close</span>
</button>
</div>
<!-- Free Delivery Progress Bar -->
<div class="bg-amber-50 px-6 py-3 border-b border-amber-200 text-xs">
<div class="flex justify-between font-semibold text-stone-800 mb-1">
<span>Bebas Ongkir Nasional:</span>
<span class="text-amber-800" id="delivery-progress-text">Tercapai! (Total &gt; Rp 499.000)</span>
</div>
<div class="w-full bg-amber-200 h-1.5 rounded-full overflow-hidden">
<div class="bg-amber-500 h-full w-full rounded-full"></div>
</div>
</div>
<!-- Cart Items List -->
<div class="flex-1 overflow-y-auto p-6 space-y-4 sunshine-custom-scroll" id="cart-items-container">
<!-- Item 1 -->
<div class="flex items-center space-x-4 border-b border-stone-100 pb-4">
<img alt="Swaddle" class="w-16 h-16 object-cover border border-stone-200" src="https://lh3.googleusercontent.com/aida/AEtjO1UMjyQemnZQIhfGZZ8TNmHYjzWTsO9hDwjsS7SFzJheHfIDjLqirSTDPLDWDF6h3hD81j1wheOSZg56nI-jAoqxy1p4lBCA55W4FEUi8gXSs7ueNrBhsHHH4X1HjXwPQ0DjJtN41eY4vQg-bO7EMYpW7RmEIeATcWXHrmbCvEfUlpnJQwH-H1dLHo-H8eRNHLbwSmybvsVub9HwngXMxarPfC5b-GlsPhG12i_eUJQ"/>
<div class="flex-1">
<h4 class="font-bold text-xs text-stone-900 font-sunshine-editorial-serif">Pure Bamboo Cloud Swaddle 4-Layer</h4>
<span class="text-[11px] text-stone-500">Warna: Cream Oat • Ukuran: 120cm</span>
<div class="flex items-center justify-between mt-2">
<span class="text-xs font-bold text-stone-900 font-mono">Rp 245.000</span>
<div class="flex items-center border border-stone-200">
<button class="px-2 py-0.5 text-xs hover:bg-stone-100" onclick="updateCartQty(-1)">-</button>
<span class="px-2 text-xs font-mono">1</span>
<button class="px-2 py-0.5 text-xs hover:bg-stone-100" onclick="updateCartQty(1)">+</button>
</div>
</div>
</div>
</div>
<!-- Item 2 -->
<div class="flex items-center space-x-4 border-b border-stone-100 pb-4">
<img alt="Dining Set" class="w-16 h-16 object-cover border border-stone-200" src="https://lh3.googleusercontent.com/aida/AEtjO1Xif6eshlBF3Cdlvs_-qkn4mGntEiFBmcOc66qrI9ky1oEyVxzoj0tMiOh3IoPcR15BGLNielv50wtqlgVlDNbTsJWaxaFP0pFRp_1MT1wgHvhilroCNu7zZiHCU6Om9rGCRcvSoHqGZ1eR5OKvFrLUFPnaXQxncvav6QXIe8brw7_4UOy1XdJGpxbQfxNSpSRsLRZJxINXvtivNyVVg-8cMHR8ou3p3V3Rtb8IXEBL"/>
<div class="flex-1">
<h4 class="font-bold text-xs text-stone-900 font-sunshine-editorial-serif">Silicone Suction Dining Set Complete</h4>
<span class="text-[11px] text-stone-500">Warna: Sage Green • 4-Piece</span>
<div class="flex items-center justify-between mt-2">
<span class="text-xs font-bold text-stone-900 font-mono">Rp 279.000</span>
<div class="flex items-center border border-stone-200">
<button class="px-2 py-0.5 text-xs hover:bg-stone-100">-</button>
<span class="px-2 text-xs font-mono">1</span>
<button class="px-2 py-0.5 text-xs hover:bg-stone-100">+</button>
</div>
</div>
</div>
</div>
</div>
<!-- Drawer Footer / Checkout -->
<div class="p-6 border-t border-stone-200 bg-stone-50 space-y-3">
<div class="space-y-1.5 text-xs">
<div class="flex justify-between text-stone-500">
<span>Subtotal</span>
<span class="font-mono text-stone-900" id="cart-subtotal">Rp 524.000</span>
</div>
<div class="flex justify-between text-stone-500">
<span>Estimasi Pengiriman</span>
<span class="font-bold text-emerald-700 uppercase">Gratis</span>
</div>
<div class="flex justify-between text-sm font-bold text-stone-950 pt-2 border-t border-stone-200">
<span>Total Pesanan</span>
<span class="font-mono text-amber-800" id="cart-total">Rp 524.000</span>
</div>
</div>
<button class="w-full bg-stone-950 hover:bg-amber-600 text-white font-bold py-3.5 uppercase tracking-widest text-xs transition flex items-center justify-center space-x-2" onclick="handleCheckout()">
<span>Lanjutkan ke Pembayaran</span>
<span class="material-symbols-outlined text-sm">arrow_forward</span>
</button>
<button class="w-full text-center text-xs text-stone-500 hover:text-stone-900 py-1 transition" onclick="closeCartDrawer()">
        Lanjutkan Berbelanja
      </button>
</div>
</aside>
<!-- ======================================================== -->
<!-- 11. QUICK BUY / PRODUCT DETAIL MODAL                     -->
<!-- ======================================================== -->
<div class="fixed inset-0 bg-stone-950/60 backdrop-blur-sm z-50 hidden transition-opacity" id="quick-modal-backdrop" onclick="closeQuickBuy()"></div>
<div class="fixed inset-0 z-50 hidden flex items-center justify-center p-4" id="quick-buy-modal">
<div class="bg-white max-w-xl w-full border border-stone-200 shadow-2xl relative p-6 sm:p-8 animate-fadeIn">
<button class="absolute top-4 right-4 p-2 text-stone-400 hover:text-stone-900 transition" onclick="closeQuickBuy()">
<span class="material-symbols-outlined text-xl">close</span>
</button>
<div class="grid grid-cols-1 sm:grid-cols-2 gap-6 items-center">
<div class="aspect-square bg-stone-100 overflow-hidden border border-stone-200">
<img alt="Product" class="w-full h-full object-cover" id="quick-modal-img" src=""/>
</div>
<div>
<span class="text-[10px] uppercase tracking-widest font-bold text-amber-800 bg-amber-100 px-2 py-0.5">Quick Checkout</span>
<h3 class="font-sunshine-editorial-serif text-xl font-bold text-stone-950 mt-2" id="quick-modal-title">Nama Produk</h3>
<p class="text-xs text-stone-500 mt-1">Sertifikasi OEKO-TEX® &amp; Bahan Hypoallergenic Alami.</p>
<div class="font-sunshine-editorial-serif text-xl font-bold text-amber-900 my-3" id="quick-modal-price">Rp 0</div>
<!-- Color options -->
<div class="space-y-1.5 mb-4">
<span class="text-xs text-stone-600 font-semibold block">Pilih Varian:</span>
<div class="flex gap-2">
<button class="px-3 py-1 text-xs border border-stone-950 font-bold bg-stone-50">Natural Oat</button>
<button class="px-3 py-1 text-xs border border-stone-200 hover:border-stone-400 text-stone-600">Sage Light</button>
</div>
</div>
<div class="space-y-2">
<button class="w-full bg-amber-400 hover:bg-amber-300 text-stone-950 text-xs font-bold uppercase tracking-widest py-3 transition flex items-center justify-center space-x-1.5" onclick="confirmQuickAdd()">
<span class="material-symbols-outlined text-sm">shopping_bag</span>
<span>Tambah ke Keranjang</span>
</button>
<a class="w-full bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold uppercase tracking-widest py-2.5 transition flex items-center justify-center space-x-1.5" href="#" id="quick-wa-btn" rel="noopener noreferrer" target="_blank">
<span>Beli via WhatsApp</span>
</a>
</div>
</div>
</div>
</div>
</div>
<!-- ======================================================== -->
<!-- 12. SEARCH MODAL TRIGGER                                 -->
<!-- ======================================================== -->
<div class="fixed inset-0 bg-stone-950/80 backdrop-blur-md z-50 hidden flex items-start justify-center pt-24 px-4" id="search-modal">
<div class="bg-white w-full max-w-2xl p-6 sm:p-8 shadow-2xl relative">
<button class="absolute top-4 right-4 text-stone-400 hover:text-stone-900" onclick="closeSearchModal()">
<span class="material-symbols-outlined text-2xl">close</span>
</button>
<span class="text-[10px] tracking-widest uppercase font-bold text-amber-800">Pencarian Koleksi</span>
<h3 class="font-sunshine-editorial-serif text-xl font-bold text-stone-900 mt-1 mb-4">Cari Produk Bayi Berdasarkan Nama / Kategori</h3>
<div class="relative">
<input class="w-full border-b-2 border-stone-900 py-3 text-base sm:text-lg focus:outline-none placeholder-stone-400 font-sunshine-editorial-serif" id="site-search-input" onkeyup="handleLiveSearch(event)" placeholder="Ketik: swaddle, bambu, pinewood, mangkok silikon..." type="text"/>
<span class="material-symbols-outlined absolute right-2 top-3 text-stone-400">search</span>
</div>
<div class="mt-6">
<p class="text-xs uppercase tracking-wider text-stone-400 font-semibold mb-2">Pencarian Populer:</p>
<div class="flex flex-wrap gap-2 text-xs">
<button class="bg-stone-100 hover:bg-amber-100 px-3 py-1 rounded text-stone-700" onclick="searchQuickTag('swaddle')">Bedong Bambu 4-Lapis</button>
<button class="bg-stone-100 hover:bg-amber-100 px-3 py-1 rounded text-stone-700" onclick="searchQuickTag('dining')">Piring Silikon MPASI</button>
<button class="bg-stone-100 hover:bg-amber-100 px-3 py-1 rounded text-stone-700" onclick="searchQuickTag('wooden')">Mainan Sensori Kayu</button>
<button class="bg-stone-100 hover:bg-amber-100 px-3 py-1 rounded text-stone-700" onclick="searchQuickTag('hampers')">Kado Newborn Eksklusif</button>
</div>
</div>
</div>
</div>
<!-- ======================================================== -->
<!-- 13. FLOATING ACTION BUTTONS                              -->
<!-- ======================================================== -->
<!-- AI Concierge Modal & Toggle (Bottom Left) -->
<div class="fixed bottom-6 left-6 z-40">
<!-- Concierge Interactive Chat Card -->
<div class="hidden mb-3 bg-white p-5 rounded-none border border-stone-300 shadow-2xl w-80 text-xs animate-fadeIn" id="ai-concierge-card">
<div class="flex items-center justify-between pb-2 border-b border-stone-200 mb-3">
<div class="flex items-center space-x-2">
<span class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-pulse"></span>
<strong class="font-sunshine-editorial-serif text-sm font-bold text-stone-900">AI Concierge Rekomendasi</strong>
</div>
<button class="text-stone-400 hover:text-stone-800 text-base font-bold" onclick="toggleAIConcierge()">✕</button>
</div>
<p class="text-stone-600 mb-3 leading-relaxed">
        Selamat datang di <em>Aurora &amp; Petit</em>. Butuh panduan ukuran atau kado kelahiran tepat sesuai usia bayi?
      </p>
<div class="space-y-1.5">
<button class="w-full text-left px-3 py-2 bg-stone-50 hover:bg-amber-100 text-stone-800 text-xs font-medium border border-stone-200 transition" onclick="askConcierge('Newborn (0-3 Bulan)')">
          👶 Kado Newborn &amp; Swaddle (0-3 Bulan)
        </button>
<button class="w-full text-left px-3 py-2 bg-stone-50 hover:bg-amber-100 text-stone-800 text-xs font-medium border border-stone-200 transition" onclick="askConcierge('Fase MPASI (6-12 Bulan)')">
          🥣 Set Makan Silikon MPASI (6-12 Bulan)
        </button>
<button class="w-full text-left px-3 py-2 bg-stone-50 hover:bg-amber-100 text-stone-800 text-xs font-medium border border-stone-200 transition" onclick="askConcierge('Sensori Kayu Montessori (1-3 Tahun)')">
          🧩 Mainan Kayu Motorik (1-3 Tahun)
        </button>
</div>
</div>
<!-- AI Toggle Button -->
<button class="group flex items-center space-x-2.5 bg-stone-950 text-white px-4 py-3.5 shadow-2xl hover:bg-amber-600 transition-all duration-300 border border-stone-700" onclick="toggleAIConcierge()" title="Konsultasi AI Ukuran Bayi">
<div class="relative">
<span class="material-symbols-outlined text-amber-300 text-xl">smart_toy</span>
<span class="absolute -top-1 -right-1 w-2 h-2 bg-amber-400 rounded-full animate-ping"></span>
</div>
<div class="text-left hidden sm:block">
<span class="block text-[9px] uppercase tracking-wider text-amber-300 font-bold leading-none">Maison Concierge</span>
<span class="text-xs font-bold leading-tight font-sunshine-editorial-serif">Bantu Pilih Produk</span>
</div>
</button>
</div>
<!-- WhatsApp Floating Action (Bottom Right) -->
<div class="fixed bottom-6 right-6 z-40 flex flex-col items-end">
<div class="hidden sm:block opacity-0 hover:opacity-100 transition-opacity mb-2 bg-stone-900 text-white text-[11px] font-medium py-1.5 px-3 shadow-lg whitespace-nowrap">
      Chat Konsultasi Bidan &amp; Concierge Butik 👋
    </div>
<a class="flex items-center space-x-2.5 bg-[#25D366] hover:bg-[#20ba5a] text-white px-5 py-3.5 shadow-2xl hover:scale-105 transition-all duration-300 group border border-emerald-400/40" href="https://wa.me/6281234567890?text=Halo%20Admin%20Aurora%20Petit,%20saya%20tertarik%20dengan%20koleksi%20perlengkapan%20bayi%20dan%20ingin%20konsultasi%20rekomendasi." rel="noopener noreferrer" target="_blank" title="Tanya WhatsApp">
<svg class="w-5 h-5 fill-current" viewbox="0 0 24 24">
<path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.303-.058.116-.087.188-.173.289l-.26.302c-.087.086-.178.18-.076.355.101.174.449.741.964 1.201.662.591 1.221.774 1.394.86.173.086.275.072.376-.044.101-.116.433-.506.549-.68.116-.173.231-.145.39-.086s1.011.477 1.184.564.289.13.332.203c.043.072.043.419-.101.824z"></path>
</svg>
<span class="font-bold text-xs tracking-wider uppercase font-sans">Tanya via WhatsApp</span>
</a>
</div>
<!-- Toast Notification Alert -->
<div class="fixed top-24 right-6 z-50 hidden bg-stone-950 text-white px-5 py-3.5 border-l-4 border-amber-400 shadow-2xl flex items-center space-x-3 text-xs animate-bounce-short" id="toast-notification">
<span class="material-symbols-outlined text-amber-400 text-lg">check_circle</span>
<span id="toast-message">Produk berhasil ditambahkan ke keranjang!</span>
</div>
<!-- ======================================================== -->
<!-- 14. COMPREHENSIVE COMMERCIAL SCRIPTS                     -->
<!-- ======================================================== -->
<script>
    // State
    let cartCount = 2;
    let wishlistCount = 3;

    // Toast Alert Helper
    function showToast(message) {
      const toast = document.getElementById('toast-notification');
      const text = document.getElementById('toast-message');
      text.innerText = message;
      toast.classList.remove('hidden');
      setTimeout(() => {
        toast.classList.add('hidden');
      }, 3500);
    }

    // Add to Cart Logic
    function addToCart(title, price, imgUrl) {
      cartCount++;
      document.getElementById('cart-badge-count').innerText = cartCount;
      document.getElementById('cart-drawer-count').innerText = cartCount;

      const container = document.getElementById('cart-items-container');
      const newItem = document.createElement('div');
      newItem.className = 'flex items-center space-x-4 border-b border-stone-100 pb-4 animate-fadeIn';
      newItem.innerHTML = `
        <img src="${imgUrl}" alt="${title}" class="w-16 h-16 object-cover border border-stone-200">
        <div class="flex-1">
          <h4 class="font-bold text-xs text-stone-900 font-sunshine-editorial-serif">${title}</h4>
          <span class="text-[11px] text-stone-500">Koleksi Terpilih • 100% Organik</span>
          <div class="flex items-center justify-between mt-2">
            <span class="text-xs font-bold text-stone-900 font-mono">Rp ${Number(price).toLocaleString('id-ID')}</span>
            <div class="flex items-center border border-stone-200">
              <span class="px-2 text-xs font-mono">1</span>
            </div>
          </div>
        </div>
      `;
      container.prepend(newItem);

      showToast(`+1 "${title}" berhasil dimasukkan ke keranjang belanja.`);
      openCartDrawer();
    }

    // Cart Drawer Controls
    function openCartDrawer() {
      document.getElementById('cart-drawer-backdrop').classList.remove('hidden');
      document.getElementById('cart-drawer').classList.remove('translate-x-full');
    }

    function closeCartDrawer() {
      document.getElementById('cart-drawer-backdrop').classList.add('hidden');
      document.getElementById('cart-drawer').classList.add('translate-x-full');
    }

    function updateCartQty(delta) {
      showToast('Kuantitas produk berhasil diperbarui.');
    }

    function handleCheckout() {
      alert("Terima kasih telah berbelanja di AURORA & PETIT.\n\nAnda akan diarahkan ke Payment Gateway resmi (BCA, Mandiri, QRIS, Kartu Kredit).");
      closeCartDrawer();
    }

    // Category Filter Pills
    function filterProducts(category, btnElement) {
      const buttons = document.querySelectorAll('.category-btn');
      buttons.forEach(b => {
        b.className = 'category-btn px-5 py-2.5 rounded-full font-medium uppercase tracking-wider bg-stone-100 hover:bg-stone-200 text-stone-700 transition-all';
      });
      btnElement.className = 'category-btn px-5 py-2.5 rounded-full font-bold uppercase tracking-wider bg-stone-950 text-white transition-all';

      const items = document.querySelectorAll('.product-item');
      items.forEach(item => {
        const itemCat = item.getAttribute('data-category');
        if (category === 'all' || itemCat === category) {
          item.classList.remove('hidden');
        } else {
          item.classList.add('hidden');
        }
      });
    }

    // Quick Wishlist Trigger
    function quickWishlist(btn, productName) {
      const icon = btn.querySelector('.material-symbols-outlined');
      if (icon.classList.contains('text-rose-600')) {
        icon.classList.remove('text-rose-600');
        wishlistCount = Math.max(0, wishlistCount - 1);
        showToast(`"${productName}" dihapus dari daftar impian.`);
      } else {
        icon.classList.add('text-rose-600');
        wishlistCount++;
        showToast(`"${productName}" ditambahkan ke daftar impian.`);
      }
      document.getElementById('wishlist-count').innerText = wishlistCount;
    }

    function toggleWishlistModal() {
      showToast(`Daftar impian Anda memiliki ${wishlistCount} item favorit.`);
    }

    // Quick Buy Modal
    let activeQuickProduct = {};
    function openQuickBuy(title, price, imgUrl) {
      activeQuickProduct = { title, price, imgUrl };
      document.getElementById('quick-modal-title').innerText = title;
      document.getElementById('quick-modal-price').innerText = 'Rp ' + Number(price).toLocaleString('id-ID');
      document.getElementById('quick-modal-img').src = imgUrl;
      document.getElementById('quick-wa-btn').href = `https://wa.me/6281234567890?text=Halo%20Aurora%20Petit,%20saya%20ingin%20pesan%20cepat:%20${encodeURIComponent(title)}%20seharga%20Rp%20${Number(price).toLocaleString('id-ID')}`;

      document.getElementById('quick-modal-backdrop').classList.remove('hidden');
      document.getElementById('quick-buy-modal').classList.remove('hidden');
    }

    function closeQuickBuy() {
      document.getElementById('quick-modal-backdrop').classList.add('hidden');
      document.getElementById('quick-buy-modal').classList.add('hidden');
    }

    function confirmQuickAdd() {
      if (activeQuickProduct.title) {
        addToCart(activeQuickProduct.title, activeQuickProduct.price, activeQuickProduct.imgUrl);
        closeQuickBuy();
      }
    }

    // FAQ Accordion Controls
    function toggleFaq(id) {
      const content = document.getElementById(`faq-content-${id}`);
      const icon = document.getElementById(`faq-icon-${id}`);
      const isHidden = content.classList.contains('hidden');

      // Close other FAQs
      for (let i = 1; i <= 5; i++) {
        const c = document.getElementById(`faq-content-${i}`);
        const ic = document.getElementById(`faq-icon-${i}`);
        if (c && ic) {
          c.classList.add('hidden');
          ic.innerText = '+';
        }
      }

      if (isHidden) {
        content.classList.remove('hidden');
        icon.innerText = '−';
      }
    }

    // AI Concierge Widget
    function toggleAIConcierge() {
      const card = document.getElementById('ai-concierge-card');
      card.classList.toggle('hidden');
    }

    function askConcierge(topic) {
      alert(`[Maison AI Concierge]\n\nRekomendasi untuk "${topic}":\nKami merekomendasikan Pure Bamboo Swaddle & Silicone Dining Set yang telah tersertifikasi SNI & OEKO-TEX Class 1.\n\nMenghubungkan Anda ke perwakilan butik melalui WhatsApp...`);
      toggleAIConcierge();
      window.open(`https://wa.me/6281234567890?text=Halo%20Maison%20Concierge,%20saya%20butuh%20rekomendasi%20untuk%20${encodeURIComponent(topic)}`, '_blank');
    }

    // Search Modal Controls
    function openSearchModal() {
      document.getElementById('search-modal').classList.remove('hidden');
      setTimeout(() => document.getElementById('site-search-input').focus(), 100);
    }

    function closeSearchModal() {
      document.getElementById('search-modal').classList.add('hidden');
    }

    function searchQuickTag(keyword) {
      document.getElementById('site-search-input').value = keyword;
      handleLiveSearch({ key: 'Enter' });
    }

    function handleLiveSearch(event) {
      if (event.key === 'Enter') {
        const query = document.getElementById('site-search-input').value.toLowerCase();
        closeSearchModal();
        const collectionEl = document.getElementById('koleksi');
        collectionEl.scrollIntoView({ behavior: 'smooth' });
        showToast(`Menampilkan hasil pencarian untuk "${query}"`);
      }
    }

    // Mobile Menu Toggle
    function toggleMobileMenu() {
      const menu = document.getElementById('mobile-menu');
      menu.classList.toggle('hidden');
    }

    // Newsletter Form
    function handleNewsletter(event) {
      event.preventDefault();
      const email = document.getElementById('newsletter-email').value;
      alert(`Merci! Terima kasih telah mendaftar (${email}).\nVoucher selamat datang Rp 100.000 telah dikirimkan ke email Anda.`);
      document.getElementById('newsletter-email').value = '';
    }

    // Countdown Timer Simulator
    let timeLeft = 8 * 3600 + 42 * 60 + 19;
    setInterval(() => {
      if (timeLeft > 0) {
        timeLeft--;
        const hours = String(Math.floor(timeLeft / 3600)).padStart(2, '0');
        const minutes = String(Math.floor((timeLeft % 3600) / 60)).padStart(2, '0');
        const seconds = String(timeLeft % 60).padStart(2, '0');
        const timerEl = document.getElementById('countdown-timer');
        if (timerEl) {
          timerEl.innerText = `${hours}:${minutes}:${seconds}`;
        }
      }
    }, 1000);
  </script>
</body></html>