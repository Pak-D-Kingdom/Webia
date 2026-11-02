<!DOCTYPE html>

<html class="scroll-smooth" lang="id"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Petit Wonder — Candy Cloud Edition | Official Kids Boutique</title>
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com" rel="preconnect"/>
<link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
<link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;500;600;700&amp;family=Plus+Jakarta+Sans:wght@400;500;600;700;800&amp;family=Quicksand:wght@500;600;700&amp;display=swap" rel="stylesheet"/>

@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-candy-body bg-gradient-to-b from-[#FFFDF7] via-candy-pink-light to-candy-cyan-light/40 text-slate-800 antialiased relative min-h-screen selection:bg-pink-200 selection:text-pink-900">
<!-- ===================================================================== -->
<!-- TOP ANNOUNCEMENT BAR -->
<!-- ===================================================================== -->
<div class="bg-gradient-to-r from-candy-pink via-purple-500 to-candy-cyan text-white text-xs sm:text-sm font-candy-display py-2.5 px-4 text-center tracking-wide shadow-sm relative z-50">
<div class="max-w-7xl mx-auto flex items-center justify-center gap-2 overflow-x-auto whitespace-nowrap scrollbar-none font-medium">
<span>🎉 Diskon Opening 35% Kode: <strong class="underline decoration-yellow-300 font-bold tracking-wider">CANDYFUN</strong></span>
<span class="opacity-70">•</span>
<span>🚚 Gratis Ongkir Se-Indonesia Min. Rp 250rb</span>
<span class="opacity-70">•</span>
<span>🛡️ Garansi 100 Hari Bebas Khawatir</span>
</div>
</div>
<!-- ===================================================================== -->
<!-- STICKY NAVBAR -->
<!-- ===================================================================== -->
<nav class="sticky top-0 z-40 bg-white/85 backdrop-blur-xl border-b-4 border-candy-lilac/30 shadow-sm transition-all" id="beranda">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="flex items-center justify-between h-20">
<!-- Brand Logo -->
<a class="flex items-center space-x-3 group" href="#beranda">
<div class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-candy-pink to-candy-cyan flex items-center justify-center text-white text-2xl font-candy-display shadow-md group-hover:rotate-12 transition-transform">
          ☁️
        </div>
<div>
<span class="font-candy-display text-2xl font-bold bg-gradient-to-r from-pink-500 via-purple-600 to-cyan-500 bg-clip-text text-transparent">
            Petit Wonder
          </span>
<span class="block text-[11px] text-purple-600 font-bold tracking-widest uppercase -mt-1 font-candy-display">
            Candy Cloud Edition ✨
          </span>
</div>
</a>
<!-- Smooth Anchor Navigation -->
<div class="hidden md:flex items-center space-x-7 text-sm lg:text-base font-bold text-slate-700">
<a class="hover:text-pink-500 hover:scale-105 transition-all" href="#beranda">🎈 Beranda</a>
<a class="hover:text-purple-600 hover:scale-105 transition-all" href="#produk">🍼 Produk Ceria</a>
<a class="hover:text-cyan-600 hover:scale-105 transition-all" href="#keunggulan">⭐ Nilai Keamanan</a>
<a class="hover:text-amber-600 hover:scale-105 transition-all" href="#ulasan">💬 Ulasan Bunda</a>
<a class="hover:text-pink-500 hover:scale-105 transition-all" href="#faq">❓ FAQ</a>
<a class="hover:text-purple-600 hover:scale-105 transition-all" href="#kontak">💌 Kontak</a>
</div>
<!-- Action Utilities: Search, Wishlist, Cart Drawer CTA -->
<div class="flex items-center space-x-2 sm:space-x-3">
<!-- Search Trigger -->
<button aria-label="Cari produk" class="w-10 h-10 rounded-full bg-slate-100 hover:bg-candy-pink-light text-slate-700 hover:text-candy-pink flex items-center justify-center transition-all" onclick="toggleSearchModal()">
<svg class="w-5 h-5" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
</button>
<!-- Wishlist Badge -->
<button class="relative w-10 h-10 rounded-full bg-slate-100 hover:bg-candy-lilac-light text-slate-700 hover:text-purple-600 flex items-center justify-center transition-all" onclick="showToast('💖 Wishlist kamu memiliki 3 produk impian si kecil!')" title="Wishlist">
<span class="text-base">💖</span>
<span class="absolute -top-1 -right-1 bg-pink-500 text-white font-candy-display text-[10px] font-bold w-5 h-5 rounded-full flex items-center justify-center border-2 border-white shadow-sm">3</span>
</button>
<!-- Cart Drawer Toggle -->
<button class="relative flex items-center space-x-2 bg-gradient-to-r from-candy-pink via-purple-500 to-candy-cyan hover:opacity-95 text-white px-4 py-2 rounded-full font-candy-display font-bold text-xs sm:text-sm shadow-md hover:scale-105 transition-all" onclick="openCartDrawer()">
<span>🛍️</span>
<span class="hidden sm:inline">Keranjang</span>
<span class="bg-white text-purple-700 px-1.5 py-0.2 rounded-full text-xs font-bold" id="cart-badge-count">2</span>
</button>
</div>
</div>
</div>
</nav>
<!-- ===================================================================== -->
<!-- HERO SECTION -->
<!-- ===================================================================== -->
<section class="relative pt-8 pb-20 lg:pt-14 lg:pb-28 overflow-hidden">
<!-- Pastel Ambient Blobs -->
<div class="absolute top-10 left-10 w-80 h-80 bg-candy-pink/30 candy-blob-1 filter blur-3xl animate-candy-pulse-glow -z-10"></div>
<div class="absolute bottom-10 right-10 w-96 h-96 bg-candy-cyan/30 candy-blob-2 filter blur-3xl animate-candy-float -z-10"></div>
<div class="absolute top-1/2 left-1/3 w-64 h-64 bg-candy-lemon/35 rounded-full filter blur-2xl -z-10"></div>
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
<!-- Hero Content -->
<div class="lg:col-span-6 space-y-6 text-center lg:text-left">
<div class="inline-flex items-center space-x-2 px-4 py-2 rounded-full bg-white/90 border-2 border-candy-pink shadow-sm text-xs font-bold text-pink-600">
<span class="animate-bounce">🍭</span>
<span>Edisi Spesial: Koleksi Awan Manis Si Kecil</span>
</div>
<h1 class="font-candy-display text-4xl sm:text-5xl lg:text-6xl text-slate-800 font-bold leading-tight">
          Tumbuh Bahagia dalam <br class="hidden sm:inline"/>
<span class="bg-gradient-to-r from-pink-500 via-candy-lilac to-cyan-500 bg-clip-text text-transparent">Pelukan Manis Awan Permen!</span>
</h1>
<p class="text-slate-600 text-base sm:text-lg leading-relaxed max-w-xl mx-auto lg:mx-0 font-medium">
          Perlengkapan premium berstandar medis untuk bayi &amp; balita. Pakaian organik super lembut, dining set anti-tumpah, hingga mainan sensorik Montessori dengan sentuhan palet pastel yang menenangkan visual anak.
        </p>
<!-- CTA Buttons -->
<div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4 pt-2">
<a class="w-full sm:w-auto inline-flex justify-center items-center px-8 py-4 rounded-full font-candy-display text-base font-bold text-white bg-gradient-to-r from-pink-500 via-purple-500 to-cyan-500 hover:opacity-95 shadow-xl shadow-pink-300 hover:scale-105 transition-all" href="#produk">
            Belanja Sekarang 🚀
          </a>
<button class="w-full sm:w-auto inline-flex justify-center items-center px-7 py-4 rounded-full font-candy-display text-base font-bold text-purple-700 bg-white hover:bg-candy-lilac-light border-2 border-candy-lilac shadow-md transition-all" onclick="toggleAIBubble()">
            Konsultasi Usia Bayi 🧸
          </button>
</div>
<!-- Trust Badges -->
<div class="pt-4 flex flex-wrap justify-center lg:justify-start gap-3 text-xs font-bold">
<div class="flex items-center space-x-2 bg-candy-cyan-light px-3.5 py-2 rounded-full text-cyan-800 border border-candy-cyan">
<span>🛡️</span>
<span>BPA-Free &amp; Food-Grade</span>
</div>
<div class="flex items-center space-x-2 bg-candy-lemon-light px-3.5 py-2 rounded-full text-amber-900 border border-candy-lemon">
<span>🌱</span>
<span>100% Organik Hypoallergenic</span>
</div>
<div class="flex items-center space-x-2 bg-candy-pink-light px-3.5 py-2 rounded-full text-pink-700 border border-candy-pink">
<span>🚚</span>
<span>Gratis Ongkir Seluruh Indonesia</span>
</div>
</div>
</div>
<!-- Hero Focal Lifestyle Photo -->
<div class="lg:col-span-6 relative flex justify-center">
<div class="relative w-full max-w-lg">
<!-- Floating Badge Top Right -->
<div class="absolute -top-5 -right-3 bg-white p-3.5 rounded-3xl shadow-2xl border-2 border-candy-lemon flex items-center space-x-3 z-20 animate-candy-float">
<span class="text-3xl">⭐</span>
<div>
<div class="font-candy-display font-bold text-slate-800 text-sm">Rating 4.9 / 5.0</div>
<div class="text-[11px] text-slate-500 font-medium">28.000+ Bunda Puas di Indonesia</div>
</div>
</div>
<!-- Floating Badge Bottom Left -->
<div class="absolute -bottom-5 -left-3 bg-white p-3.5 rounded-3xl shadow-2xl border-2 border-candy-cyan flex items-center space-x-3 z-20 animate-candy-float-delayed">
<span class="text-3xl">🎉</span>
<div>
<div class="font-candy-display font-bold text-purple-700 text-sm">Flash Sale Opening 35%</div>
<div class="text-[11px] text-slate-500 font-medium">Kode Kupon: CANDYFUN</div>
</div>
</div>
<!-- Focal Toddler Image with playful frame -->
<div class="candy-blob-card overflow-hidden bg-gradient-to-tr from-candy-pink via-candy-lilac to-candy-cyan p-3 shadow-2xl">
<div class="candy-blob-card overflow-hidden bg-white aspect-[4/3] sm:aspect-[1.15/1] relative">
<img alt="Toddler playing with pastel wooden sensory toys" class="w-full h-full object-cover hover:scale-105 transition-transform duration-700" src="https://lh3.googleusercontent.com/aida-public/AB6AXuC_Pl9eUDJ2vgLkxQNA7HJEljYYs5ER7EEkVLjiICVcBVBR-vTviv1CKXmtvcspDwb2j9iEMTxKQZ062mV5sXZ3pF93p2TpsXxawWHLQhLbuGoBTJqEf6HFuMtDw07rtYprUkNmV1U-LjoQ6C0BA4_-VeP1PjC7BZXvrllli5EYrJv1-44OY90a0aXH0FRijCcl7HrCxQgOG9FQEyw911r9jhVwK9c1IB_lD1TOXN4"/>
<div class="absolute bottom-0 inset-x-0 bg-gradient-to-t from-slate-900/70 via-slate-900/30 to-transparent p-6 text-white">
<span class="bg-candy-lemon text-slate-900 text-[10px] font-bold px-2.5 py-1 rounded-full uppercase tracking-wider font-candy-display">Mainan Motorik Montessori</span>
<h3 class="font-candy-display text-lg sm:text-xl font-bold mt-1">Dunia Belajar &amp; Tumbuh Kembang Penuh Warna</h3>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- ===================================================================== -->
<!-- FLASH SALE & FEATURED ETALASE (#produk) -->
<!-- ===================================================================== -->
<section class="py-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" id="produk">
<div class="text-center max-w-3xl mx-auto mb-12">
<span class="font-candy-display text-xs sm:text-sm font-bold text-pink-600 uppercase tracking-widest bg-candy-pink-light px-5 py-2 rounded-full border border-candy-pink shadow-sm">
      🌈 Etalase Penuh Cerita &amp; Kualitas Terbaik
    </span>
<h2 class="font-candy-display text-3xl sm:text-4xl font-bold text-slate-800 mt-4">
      Koleksi Pilihan Malaikat Kecil
    </h2>
<p class="text-slate-600 text-sm sm:text-base mt-2">
      Setiap produk dirancang empuk, aman dari bahan kimia berbahaya, dan siap menemani petualangan emas si buah hati.
    </p>
<!-- Interactive Category Filter Pills -->
<div class="flex flex-wrap items-center justify-center gap-2.5 mt-8" id="category-pills">
<button class="px-5 py-2 rounded-full font-candy-display text-xs sm:text-sm font-bold bg-pink-500 text-white shadow-md transition-all scale-105" onclick="filterCategory('all', this)">
        Semua Produk
      </button>
<button class="px-5 py-2 rounded-full font-candy-display text-xs sm:text-sm font-bold bg-white text-slate-700 hover:bg-candy-lilac-light hover:text-purple-700 border border-slate-200 transition-all" onclick="filterCategory('pakaian', this)">
        Pakaian Lilac Cloud
      </button>
<button class="px-5 py-2 rounded-full font-candy-display text-xs sm:text-sm font-bold bg-white text-slate-700 hover:bg-candy-cyan-light hover:text-cyan-700 border border-slate-200 transition-all" onclick="filterCategory('makan', this)">
        Alat Makan Ceria
      </button>
<button class="px-5 py-2 rounded-full font-candy-display text-xs sm:text-sm font-bold bg-white text-slate-700 hover:bg-candy-lemon-light hover:text-amber-800 border border-slate-200 transition-all" onclick="filterCategory('mainan', this)">
        Mainan Sensorik Kayu
      </button>
<button class="px-5 py-2 rounded-full font-candy-display text-xs sm:text-sm font-bold bg-white text-slate-700 hover:bg-candy-pink-light hover:text-pink-600 border border-slate-200 transition-all" onclick="filterCategory('newborn', this)">
        Paket Kado Newborn
      </button>
</div>
</div>
<!-- Product Grid -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-7" id="product-grid">
<!-- Card 1: Lilac Cloud Romper -->
<div class="product-item bg-white rounded-3xl p-4 sm:p-5 border-2 border-candy-lilac/50 hover:border-purple-500 shadow-lg hover:shadow-purple-200 transition-all hover:-translate-y-2 flex flex-col justify-between group" data-category="pakaian">
<div>
<div class="relative rounded-2xl overflow-hidden bg-candy-lilac-light aspect-square mb-4">
<img alt="Lilac Cloud Organic Sleepwear Romper" class="w-full h-full object-cover group-hover:scale-108 transition-all duration-500" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDBDLxPRzedxk15XLGJgGzSrjuSyQz7LuoNmxgrhXdeEpQeS9q5p3DJo5usRfB5ETidJcOwUBb8i-zcjekykfgUZu3VIfS9aiQYQuz2wipFFRblWgiyFwTx13DUR4kPDowUqSQS8RC2GxxVrd-3nKqpL-MhXL-TBfUPPAQvNgC2wf4xvKImwYR0QkdMTAUWRCFINiF0EQabZ8adVrUKHkmThaaSU4XM2jPePyOdBRE"/>
<span class="absolute top-3 left-3 bg-purple-600 text-white font-candy-display font-bold text-xs px-3 py-1 rounded-full shadow-md">Tidur Pulas</span>
<span class="absolute top-3 right-3 bg-red-500 text-white font-candy-display font-bold text-[10px] px-2 py-0.5 rounded-full">-24%</span>
</div>
<div class="flex items-center justify-between text-xs mb-1">
<span class="font-bold text-purple-600 uppercase tracking-wide">Sleepwear Dream</span>
<span class="text-amber-500 font-bold flex items-center">⭐ 4.9 <span class="text-slate-400 ml-1">(1.2rb)</span></span>
</div>
<h3 class="font-candy-display text-lg font-bold text-slate-800 group-hover:text-purple-700 transition">Lilac Cloud Organic Romper</h3>
<p class="text-slate-500 text-xs mt-1 leading-relaxed">Katun organik ribbed bernapas dengan resleting 2 arah anti-jepit untuk ganti popok cepat.</p>
<!-- Swatch Selector -->
<div class="flex items-center space-x-2 mt-3 pt-2">
<span class="text-[11px] text-slate-400 font-bold">Warna:</span>
<span class="w-4 h-4 rounded-full bg-purple-300 ring-2 ring-purple-600 cursor-pointer" title="Lilac Pastel"></span>
<span class="w-4 h-4 rounded-full bg-rose-200 cursor-pointer" title="Soft Rose"></span>
<span class="w-4 h-4 rounded-full bg-sky-200 cursor-pointer" title="Baby Cyan"></span>
</div>
</div>
<div class="mt-5 pt-3 border-t border-slate-100 flex items-center justify-between">
<div>
<span class="text-xs text-slate-400 line-through">Rp 230.000</span>
<div class="font-candy-display text-lg font-bold text-purple-600">Rp 175.000</div>
</div>
<button class="bg-purple-600 hover:bg-purple-700 active:scale-95 text-white p-3 rounded-2xl shadow-md shadow-purple-200 transition-all flex items-center space-x-1" onclick="addToCart('Lilac Cloud Organic Romper', 175000)" title="Tambah ke Keranjang">
<svg class="w-4 h-4" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path d="M12 4v16m8-8H4" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
<span class="text-xs font-candy-display font-bold">Beli</span>
</button>
</div>
</div>
<!-- Card 2: Silicone Suction Dining Bowl & Cutlery -->
<div class="product-item bg-white rounded-3xl p-4 sm:p-5 border-2 border-candy-cyan/50 hover:border-cyan-500 shadow-lg hover:shadow-cyan-200 transition-all hover:-translate-y-2 flex flex-col justify-between group" data-category="makan">
<div>
<div class="relative rounded-2xl overflow-hidden bg-candy-cyan-light aspect-square mb-4">
<img alt="Silicone Suction Dining Bowl &amp; Cutlery Set" class="w-full h-full object-cover group-hover:scale-108 transition-all duration-500" src="https://lh3.googleusercontent.com/aida/AEtjO1Xif6eshlBF3Cdlvs_-qkn4mGntEiFBmcOc66qrI9ky1oEyVxzoj0tMiOh3IoPcR15BGLNielv50wtqlgVlDNbTsJWaxaFP0pFRp_1MT1wgHvhilroCNu7zZiHCU6Om9rGCRcvSoHqGZ1eR5OKvFrLUFPnaXQxncvav6QXIe8brw7_4UOy1XdJGpxbQfxNSpSRsLRZJxINXvtivNyVVg-8cMHR8ou3p3V3Rtb8IXEBL"/>
<span class="absolute top-3 left-3 bg-cyan-600 text-white font-candy-display font-bold text-xs px-3 py-1 rounded-full shadow-md">Anti-Tumpah</span>
<span class="absolute top-3 right-3 bg-red-500 text-white font-candy-display font-bold text-[10px] px-2 py-0.5 rounded-full">-25%</span>
</div>
<div class="flex items-center justify-between text-xs mb-1">
<span class="font-bold text-cyan-600 uppercase tracking-wide">Makan Mandiri MPASI</span>
<span class="text-amber-500 font-bold flex items-center">⭐ 4.9 <span class="text-slate-400 ml-1">(890)</span></span>
</div>
<h3 class="font-candy-display text-lg font-bold text-slate-800 group-hover:text-cyan-700 transition">Silicone Suction Dining Bowl Set</h3>
<p class="text-slate-500 text-xs mt-1 leading-relaxed">Food-grade silicone dengan daya rekat suction kuat ke meja makan anak. Bebas BPA &amp; tahan microwave.</p>
<div class="flex items-center space-x-2 mt-3 pt-2">
<span class="text-[11px] text-slate-400 font-bold">Warna:</span>
<span class="w-4 h-4 rounded-full bg-emerald-300 ring-2 ring-emerald-500 cursor-pointer" title="Sage Green"></span>
<span class="w-4 h-4 rounded-full bg-amber-200 cursor-pointer" title="Warm Oat"></span>
<span class="w-4 h-4 rounded-full bg-pink-200 cursor-pointer" title="Blush Pink"></span>
</div>
</div>
<div class="mt-5 pt-3 border-t border-slate-100 flex items-center justify-between">
<div>
<span class="text-xs text-slate-400 line-through">Rp 199.000</span>
<div class="font-candy-display text-lg font-bold text-cyan-600">Rp 149.000</div>
</div>
<button class="bg-cyan-500 hover:bg-cyan-600 active:scale-95 text-white p-3 rounded-2xl shadow-md shadow-cyan-200 transition-all flex items-center space-x-1" onclick="addToCart('Silicone Suction Dining Bowl Set', 149000)" title="Tambah ke Keranjang">
<svg class="w-4 h-4" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path d="M12 4v16m8-8H4" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
<span class="text-xs font-candy-display font-bold">Beli</span>
</button>
</div>
</div>
<!-- Card 3: Pastel Sensory Stacking Ring Wood -->
<div class="product-item bg-white rounded-3xl p-4 sm:p-5 border-2 border-candy-lemon/70 hover:border-amber-400 shadow-lg hover:shadow-yellow-200 transition-all hover:-translate-y-2 flex flex-col justify-between group" data-category="mainan">
<div>
<div class="relative rounded-2xl overflow-hidden bg-candy-lemon-light aspect-square mb-4">
<img alt="Pastel Sensory Stacking Ring Wood" class="w-full h-full object-cover group-hover:scale-108 transition-all duration-500" src="https://lh3.googleusercontent.com/aida/AEtjO1XcVjPgkZ_r4nOuMqiZpK74rSr16qGX2FIQ6xzkPMmtXFshcRtY1SmgmsSJLMz4WzAEU1iiPpASMenecingCefoNHF_f_Mq6prSN6Rd_suxfZ2MEVSOdp2anzaSqNvbpIFpWVd6Eo6LIH1B3q8I_n61VxBaMk8OaJuC965jOEylI0Ubbzr24n4usJKBPsHtQQ0UCKAZ30977xIHMtgHarljisUpKdhiSj37IGXQlI8"/>
<span class="absolute top-3 left-3 bg-amber-500 text-white font-candy-display font-bold text-xs px-3 py-1 rounded-full shadow-md">Kayu Pinus Alami</span>
</div>
<div class="flex items-center justify-between text-xs mb-1">
<span class="font-bold text-amber-700 uppercase tracking-wide">Montessori Toddler</span>
<span class="text-amber-500 font-bold flex items-center">⭐ 5.0 <span class="text-slate-400 ml-1">(640)</span></span>
</div>
<h3 class="font-candy-display text-lg font-bold text-slate-800 group-hover:text-amber-700 transition">Pastel Stacking Ring Wood</h3>
<p class="text-slate-500 text-xs mt-1 leading-relaxed">Kayu solid dengan cat berbahan dasar air (water-based non-toxic) yang memantik koordinasi motorik anak.</p>
<div class="flex items-center space-x-2 mt-3 pt-2">
<span class="text-[11px] text-slate-400 font-bold">Varian:</span>
<span class="text-xs bg-amber-50 text-amber-800 font-semibold px-2 py-0.5 rounded-md border border-amber-200">Natural Pinewood 7-Ring</span>
</div>
</div>
<div class="mt-5 pt-3 border-t border-slate-100 flex items-center justify-between">
<div>
<span class="text-xs text-slate-400 line-through">Rp 239.000</span>
<div class="font-candy-display text-lg font-bold text-amber-600">Rp 189.000</div>
</div>
<button class="bg-amber-500 hover:bg-amber-600 active:scale-95 text-white p-3 rounded-2xl shadow-md shadow-amber-200 transition-all flex items-center space-x-1" onclick="addToCart('Pastel Stacking Ring Wood', 189000)" title="Tambah ke Keranjang">
<svg class="w-4 h-4" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path d="M12 4v16m8-8H4" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
<span class="text-xs font-candy-display font-bold">Beli</span>
</button>
</div>
</div>
<!-- Card 4: Organic Bamboo Swaddle Blanket -->
<div class="product-item bg-white rounded-3xl p-4 sm:p-5 border-2 border-candy-pink/50 hover:border-pink-500 shadow-lg hover:shadow-pink-200 transition-all hover:-translate-y-2 flex flex-col justify-between group" data-category="newborn">
<div>
<div class="relative rounded-2xl overflow-hidden bg-candy-pink-light aspect-square mb-4">
<img alt="Organic Bamboo Cloud Swaddle Blanket" class="w-full h-full object-cover group-hover:scale-108 transition-all duration-500" src="https://lh3.googleusercontent.com/aida/AEtjO1UMjyQemnZQIhfGZZ8TNmHYjzWTsO9hDwjsS7SFzJheHfIDjLqirSTDPLDWDF6h3hD81j1wheOSZg56nI-jAoqxy1p4lBCA55W4FEUi8gXSs7ueNrBhsHHH4X1HjXwPQ0DjJtN41eY4vQg-bO7EMYpW7RmEIeATcWXHrmbCvEfUlpnJQwH-H1dLHo-H8eRNHLbwSmybvsVub9HwngXMxarPfC5b-GlsPhG12i_eUJQ"/>
<span class="absolute top-3 left-3 bg-pink-500 text-white font-candy-display font-bold text-xs px-3 py-1 rounded-full shadow-md">Ultra Soft</span>
<span class="absolute top-3 right-3 bg-pink-100 text-pink-700 font-candy-display font-bold text-[10px] px-2 py-0.5 rounded-full border border-pink-300">Newborn Must-Have</span>
</div>
<div class="flex items-center justify-between text-xs mb-1">
<span class="font-bold text-pink-600 uppercase tracking-wide">Bedong Lembut</span>
<span class="text-amber-500 font-bold flex items-center">⭐ 4.9 <span class="text-slate-400 ml-1">(2.1rb)</span></span>
</div>
<h3 class="font-candy-display text-lg font-bold text-slate-800 group-hover:text-pink-600 transition">Organic Bamboo Swaddle Blanket</h3>
<p class="text-slate-500 text-xs mt-1 leading-relaxed">Kombinasi serat bambu organik 70% dan katun 30%. Adem di cuaca tropis, hangat saat tidur ber-AC.</p>
<div class="flex items-center space-x-2 mt-3 pt-2">
<span class="text-[11px] text-slate-400 font-bold">Ukuran:</span>
<span class="text-xs bg-pink-50 text-pink-800 font-semibold px-2 py-0.5 rounded-md border border-pink-200">120 x 120 cm (Jumbo)</span>
</div>
</div>
<div class="mt-5 pt-3 border-t border-slate-100 flex items-center justify-between">
<div>
<span class="text-xs text-slate-400 line-through">Rp 250.000</span>
<div class="font-candy-display text-lg font-bold text-pink-600">Rp 195.000</div>
</div>
<button class="bg-pink-500 hover:bg-pink-600 active:scale-95 text-white p-3 rounded-2xl shadow-md shadow-pink-200 transition-all flex items-center space-x-1" onclick="addToCart('Organic Bamboo Swaddle Blanket', 195000)" title="Tambah ke Keranjang">
<svg class="w-4 h-4" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path d="M12 4v16m8-8H4" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
<span class="text-xs font-candy-display font-bold">Beli</span>
</button>
</div>
</div>
</div>
<!-- Bottom Sale Banner Callout -->
<div class="mt-14 p-6 sm:p-8 rounded-3xl bg-gradient-to-r from-candy-pink-light via-candy-lilac-light to-candy-cyan-light border-2 border-dashed border-purple-300 flex flex-col md:flex-row items-center justify-between gap-6">
<div class="flex items-center space-x-4">
<div class="text-4xl">🎁</div>
<div>
<h4 class="font-candy-display text-lg sm:text-xl font-bold text-slate-800">Mencari Paket Hampers Kelahiran Bayi Siap Kirim?</h4>
<p class="text-slate-600 text-xs sm:text-sm">Dilengkapi hardbox pastel premium, pita satin eksklusif, dan kartu ucapan kustom tulisan tangan.</p>
</div>
</div>
<a class="whitespace-nowrap px-6 py-3 rounded-full font-candy-display font-bold text-sm bg-purple-600 hover:bg-purple-700 text-white shadow-lg transition-all hover:scale-105" href="https://wa.me/6281234567890?text=Halo%20Admin%20Petit%20Wonder,%20saya%20ingin%20konsultasi%20paket%20hampers%20kado%20newborn." target="_blank">
      Kustom Hampers Sekarang 🎀
    </a>
</div>
</section>
<!-- ===================================================================== -->
<!-- MENGAPA BUNDA MEMILIH PETIT WONDER (#keunggulan) -->
<!-- ===================================================================== -->
<section class="py-20 bg-white/70 border-y-4 border-candy-pink/20 relative" id="keunggulan">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="text-center max-w-2xl mx-auto mb-16">
<span class="font-candy-display text-xs sm:text-sm font-bold text-purple-600 bg-candy-lilac-light px-4 py-1.5 rounded-full border border-candy-lilac">
        ⭐ Standar Tertinggi Untuk Buah Hati
      </span>
<h2 class="font-candy-display text-3xl sm:text-4xl font-bold text-slate-800 mt-3">
        Mengapa 28.000+ Bunda Memilih Kami?
      </h2>
<p class="text-slate-600 text-sm mt-2">Komitmen keamanan tanpa kompromi, dibuat dengan cinta dari para ibu untuk para ibu.</p>
</div>
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
<!-- Card 1 -->
<div class="p-7 rounded-3xl bg-candy-pink-light/90 border-2 border-candy-pink flex flex-col items-center text-center hover:-translate-y-1.5 transition-all shadow-sm">
<div class="w-16 h-16 rounded-2xl bg-white flex items-center justify-center text-3xl shadow-sm mb-4">🛡️</div>
<h4 class="font-candy-display text-lg font-bold text-pink-700">100% Bebas Racun</h4>
<p class="text-slate-600 text-xs mt-2 leading-relaxed">
          Telah lulus uji lab bersertifikasi bebas BPA, Lead, Phthalate, dan bahan kimia berbahaya. Sangat aman walau digigit bayi fase oral.
        </p>
</div>
<!-- Card 2 -->
<div class="p-7 rounded-3xl bg-candy-lilac-light/90 border-2 border-candy-lilac flex flex-col items-center text-center hover:-translate-y-1.5 transition-all shadow-sm">
<div class="w-16 h-16 rounded-2xl bg-white flex items-center justify-center text-3xl shadow-sm mb-4">🎨</div>
<h4 class="font-candy-display text-lg font-bold text-purple-700">Palet Sensorik Kalem</h4>
<p class="text-slate-600 text-xs mt-2 leading-relaxed">
          Kombinasi warna pastel lembut merangsang sensorik visual secara bertahap tanpa memicu overstimulasi atau tantrum visual.
        </p>
</div>
<!-- Card 3 -->
<div class="p-7 rounded-3xl bg-candy-lemon-light/90 border-2 border-candy-lemon flex flex-col items-center text-center hover:-translate-y-1.5 transition-all shadow-sm">
<div class="w-16 h-16 rounded-2xl bg-white flex items-center justify-center text-3xl shadow-sm mb-4">🔄</div>
<h4 class="font-candy-display text-lg font-bold text-amber-900">Garansi Tukar 14 Hari</h4>
<p class="text-slate-600 text-xs mt-2 leading-relaxed">
          Ukuran baju kurang pas atau si kecil ingin warna lain? Kami ganti tanpa ribet dan ongkos kirim penukaran ditanggung Petit Wonder.
        </p>
</div>
<!-- Card 4 -->
<div class="p-7 rounded-3xl bg-candy-cyan-light/90 border-2 border-candy-cyan flex flex-col items-center text-center hover:-translate-y-1.5 transition-all shadow-sm">
<div class="w-16 h-16 rounded-2xl bg-white flex items-center justify-center text-3xl shadow-sm mb-4">🫧</div>
<h4 class="font-candy-display text-lg font-bold text-cyan-800">Sterilisasi UV-C Medis</h4>
<p class="text-slate-600 text-xs mt-2 leading-relaxed">
          Setiap produk disterilisasi sebelum dikemas dalam sealed bag kedap udara, siap langsung digunakan si kecil tanpa cemas debu gudang.
        </p>
</div>
</div>
</div>
</section>
<!-- ===================================================================== -->
<!-- REAL REVIEWS & SOCIAL PROOF (#ulasan) -->
<!-- ===================================================================== -->
<section class="py-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" id="ulasan">
<div class="text-center max-w-2xl mx-auto mb-14">
<span class="font-candy-display text-xs sm:text-sm font-bold text-cyan-700 bg-candy-cyan-light px-4 py-1.5 rounded-full border border-candy-cyan">
      ❤️ Cerita Dari Ruang Tamu Bunda
    </span>
<h2 class="font-candy-display text-3xl sm:text-4xl font-bold text-slate-800 mt-3">
      Kebahagiaan Nyata di Seluruh Nusantara
    </h2>
<p class="text-slate-600 text-sm mt-2">Dengarkan ulasan tulus dari para Bunda yang mempercayakan kebutuhan tumbuh kembang si kecil kepada Petit Wonder.</p>
</div>
<!-- Review Cards -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-7">
<!-- Testimonial 1 -->
<div class="bg-white p-6 rounded-3xl border-2 border-candy-pink/40 shadow-md relative hover:shadow-lg transition">
<div class="flex items-center space-x-1 text-amber-400 text-lg mb-3">
        ★★★★★
      </div>
<p class="text-slate-700 text-sm italic leading-relaxed mb-6 font-medium">
        "Romper Lilac Cloud-nya beneran penyelamat! Anakku tipe yang kulitnya gampang ruam biang keringat kalau pakai katun biasa. Pas pakai Petit Wonder tidur pules semalaman. Resletingnya juga aman bgt ga bikin kejepit."
      </p>
<div class="flex items-center space-x-3 pt-3 border-t border-slate-100">
<div class="w-11 h-11 rounded-full bg-gradient-to-tr from-pink-400 to-purple-400 text-white flex items-center justify-center font-bold text-sm">
          DA
        </div>
<div>
<h5 class="font-candy-display font-bold text-slate-800 text-sm">dr. Dinda Aurelia</h5>
<span class="text-[11px] text-slate-500">Bunda dari Kenzo (7 bulan) • Jakarta Selatan</span>
</div>
</div>
</div>
<!-- Testimonial 2 -->
<div class="bg-white p-6 rounded-3xl border-2 border-candy-lilac/40 shadow-md relative hover:shadow-lg transition">
<div class="flex items-center space-x-1 text-amber-400 text-lg mb-3">
        ★★★★★
      </div>
<p class="text-slate-700 text-sm italic leading-relaxed mb-6 font-medium">
        "Alat makan suction silicone-nya ga kaleng-kaleng. Nempel kenceng banget di high chair, si kecil ga bisa ngelempar piring lagi pas MPASI! Warnanya juga aesthetic pastel banget, cuci berkali-kali ga pudar ataupun bau."
      </p>
<div class="flex items-center space-x-3 pt-3 border-t border-slate-100">
<div class="w-11 h-11 rounded-full bg-gradient-to-tr from-purple-400 to-cyan-400 text-white flex items-center justify-center font-bold text-sm">
          SL
        </div>
<div>
<h5 class="font-candy-display font-bold text-slate-800 text-sm">Sherly Lestari, S.Psi</h5>
<span class="text-[11px] text-slate-500">Bunda dari Maya (14 bulan) • Surabaya Barat</span>
</div>
</div>
</div>
<!-- Testimonial 3 -->
<div class="bg-white p-6 rounded-3xl border-2 border-candy-cyan/40 shadow-md relative hover:shadow-lg transition">
<div class="flex items-center space-x-1 text-amber-400 text-lg mb-3">
        ★★★★★
      </div>
<p class="text-slate-700 text-sm italic leading-relaxed mb-6 font-medium">
        "Pesan paket hampers kado newborn buat teman kantor, packagingnya super mewah ada pita pastel dan kartu ucapan kustom. Pengiriman instant GoSend nyampe dalam 2 jam rapi banget! Pasti reorder lagi."
      </p>
<div class="flex items-center space-x-3 pt-3 border-t border-slate-100">
<div class="w-11 h-11 rounded-full bg-gradient-to-tr from-cyan-400 to-amber-400 text-white flex items-center justify-center font-bold text-sm">
          RP
        </div>
<div>
<h5 class="font-candy-display font-bold text-slate-800 text-sm">Riana Pratiwi</h5>
<span class="text-[11px] text-slate-500">Bunda dari Mika (2 tahun) • Bandung</span>
</div>
</div>
</div>
</div>
<!-- Featured by Parenting Communities -->
<div class="mt-14 pt-8 border-t border-slate-200/80 text-center">
<span class="text-xs uppercase font-candy-display font-bold text-slate-400 tracking-wider">
      Direkomendasikan Komunitas Parenting &amp; Ibu Indonesia:
    </span>
<div class="flex flex-wrap items-center justify-center gap-8 sm:gap-14 mt-5 opacity-70 grayscale hover:grayscale-0 transition-all">
<span class="font-candy-display text-lg sm:text-xl font-bold text-purple-800">🌸 Mommies Daily</span>
<span class="font-candy-display text-lg sm:text-xl font-bold text-pink-600">🤰 Teman Bumil</span>
<span class="font-candy-display text-lg sm:text-xl font-bold text-cyan-700">🍼 Orami Parenting</span>
<span class="font-candy-display text-lg sm:text-xl font-bold text-amber-700">🧸 Ayahbunda</span>
</div>
</div>
</section>
<!-- ===================================================================== -->
<!-- INTERACTIVE FAQ ACCORDION SECTION (#faq) -->
<!-- ===================================================================== -->
<section class="py-20 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8" id="faq">
<div class="text-center mb-14">
<span class="font-candy-display text-xs sm:text-sm font-bold text-purple-600 bg-candy-lilac-light px-4 py-1.5 rounded-full border border-candy-lilac">
      💬 Pusat Tanya Jawab Ceria
    </span>
<h2 class="font-candy-display text-3xl sm:text-4xl font-bold text-slate-800 mt-3">
      Pertanyaan yang Sering Diajukan
    </h2>
<p class="text-slate-600 text-sm mt-2">Bunda &amp; Ayah butuh panduan cepat? Temukan semua jawaban lengkapnya di sini.</p>
</div>
<div class="space-y-4">
<!-- FAQ 1 -->
<div class="bg-white rounded-2xl border-2 border-candy-pink/40 shadow-sm overflow-hidden transition-all">
<button class="w-full text-left px-6 py-5 flex items-center justify-between font-candy-display text-base sm:text-lg font-bold text-slate-800 hover:text-pink-600 transition" onclick="toggleArtisticAccordion(1)">
<span class="flex items-center space-x-3">
<span class="text-xl">🌸</span>
<span>Berapa batas usia anak untuk produk pakaian &amp; romper Petit Wonder?</span>
</span>
<span class="w-8 h-8 rounded-full bg-candy-pink-light text-pink-600 flex items-center justify-center font-bold text-base transition-transform duration-300" id="art-faq-icon-1">▼</span>
</button>
<div class="hidden px-6 pb-6 text-sm text-slate-600 leading-relaxed border-t border-candy-pink-light pt-3" id="art-faq-content-1">
        Koleksi pakaian kami tersedia lengkap mulai dari Newborn (0-3 bulan), Bayi (3-12 bulan), hingga Balita (1-5 tahun). Setiap produk dilengkapi tabel panduan ukuran detail berdasarkan berat dan tinggi badan anak. Jika bingung memilih, Anda dapat berkonsultasi via AI Assistant atau WhatsApp kami!
      </div>
</div>
<!-- FAQ 2 -->
<div class="bg-white rounded-2xl border-2 border-candy-lilac/40 shadow-sm overflow-hidden transition-all">
<button class="w-full text-left px-6 py-5 flex items-center justify-between font-candy-display text-base sm:text-lg font-bold text-slate-800 hover:text-purple-600 transition" onclick="toggleArtisticAccordion(2)">
<span class="flex items-center space-x-3">
<span class="text-xl">🧼</span>
<span>Bagaimana cara merawat mainan kayu Montessori dan mencuci romper bambu?</span>
</span>
<span class="w-8 h-8 rounded-full bg-candy-lilac-light text-purple-600 flex items-center justify-center font-bold text-base transition-transform duration-300" id="art-faq-icon-2">▼</span>
</button>
<div class="hidden px-6 pb-6 text-sm text-slate-600 leading-relaxed border-t border-candy-lilac-light pt-3" id="art-faq-content-2">
        Untuk mainan kayu pinus ber-cat air, cukup lap dengan kain mikrofiber lembap yang sudah dicampur sabun bayi dan angin-anginkan (jangan direndam air). Untuk romper dan bedong bambu, gunakan deterjen cair khusus bayi dan laundry net pada putaran lembut (delicate).
      </div>
</div>
<!-- FAQ 3 -->
<div class="bg-white rounded-2xl border-2 border-candy-cyan/40 shadow-sm overflow-hidden transition-all">
<button class="w-full text-left px-6 py-5 flex items-center justify-between font-candy-display text-base sm:text-lg font-bold text-slate-800 hover:text-cyan-600 transition" onclick="toggleArtisticAccordion(3)">
<span class="flex items-center space-x-3">
<span class="text-xl">🎁</span>
<span>Apakah bisa dikirim langsung sebagai kado kelahiran dengan kartu ucapan custom?</span>
</span>
<span class="w-8 h-8 rounded-full bg-candy-cyan-light text-cyan-600 flex items-center justify-center font-bold text-base transition-transform duration-300" id="art-faq-icon-3">▼</span>
</button>
<div class="hidden px-6 pb-6 text-sm text-slate-600 leading-relaxed border-t border-candy-cyan-light pt-3" id="art-faq-content-3">
        Bisa banget! Pilih opsi "Gift Wrapping Box" di keranjang belanja. Kami akan membungkusnya dengan hardbox warna pastel, pita satin, pita segel lilin, serta kartu ucapan custom bertinta emas tanpa melampirkan nominal invoice/struk harga.
      </div>
</div>
<!-- FAQ 4 -->
<div class="bg-white rounded-2xl border-2 border-candy-lemon/40 shadow-sm overflow-hidden transition-all">
<button class="w-full text-left px-6 py-5 flex items-center justify-between font-candy-display text-base sm:text-lg font-bold text-slate-800 hover:text-amber-600 transition" onclick="toggleArtisticAccordion(4)">
<span class="flex items-center space-x-3">
<span class="text-xl">🚀</span>
<span>Apakah melayani kurir instan (GoSend / GrabExpress) hari ini?</span>
</span>
<span class="w-8 h-8 rounded-full bg-candy-lemon-light text-amber-700 flex items-center justify-center font-bold text-base transition-transform duration-300" id="art-faq-icon-4">▼</span>
</button>
<div class="hidden px-6 pb-6 text-sm text-slate-600 leading-relaxed border-t border-candy-lemon-light pt-3" id="art-faq-content-4">
        Sangat bisa! Untuk area Jadetabek &amp; Surabaya, order sebelum pukul 16.00 WIB setiap hari Senin–Minggu langsung dikirim pada hari yang sama menggunakan layanan Instant Delivery.
      </div>
</div>
<!-- FAQ 5 -->
<div class="bg-white rounded-2xl border-2 border-purple-200 shadow-sm overflow-hidden transition-all">
<button class="w-full text-left px-6 py-5 flex items-center justify-between font-candy-display text-base sm:text-lg font-bold text-slate-800 hover:text-purple-600 transition" onclick="toggleArtisticAccordion(5)">
<span class="flex items-center space-x-3">
<span class="text-xl">🛡️</span>
<span>Bagaimana klaim Garansi 100 Hari jika ada jahitan lepas atau cacat produksi?</span>
</span>
<span class="w-8 h-8 rounded-full bg-purple-50 text-purple-600 flex items-center justify-center font-bold text-base transition-transform duration-300" id="art-faq-icon-5">▼</span>
</button>
<div class="hidden px-6 pb-6 text-sm text-slate-600 leading-relaxed border-t border-purple-100 pt-3" id="art-faq-content-5">
        Cukup kirimkan foto/video produk cacat beserta nomor pesanan ke WhatsApp resmi kami. Tim kami akan langsung mengirim produk pengganti baru tanpa perlu ribet mengembalikan barang rusak lama.
      </div>
</div>
</div>
</section>
<!-- ===================================================================== -->
<!-- COMPREHENSIVE E-COMMERCE FOOTER (#kontak) -->
<!-- ===================================================================== -->
<footer class="bg-candy-dark text-slate-200 pt-16 pb-12 rounded-t-[48px]" id="kontak">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-10 pb-12 border-b border-purple-900/60">
<!-- Brand & Offline Boutiques -->
<div class="space-y-4 lg:col-span-2">
<div class="flex items-center space-x-2">
<span class="text-3xl">☁️</span>
<span class="font-candy-display text-2xl font-bold bg-gradient-to-r from-pink-400 to-cyan-400 bg-clip-text text-transparent">
            Petit Wonder
          </span>
</div>
<p class="text-xs text-purple-200 leading-relaxed font-medium max-w-sm">
          Boutique perlengkapan anak bergaya Candy Cloud. Menghadirkan keceriaan masa kecil melalui desain pastel ceria, bahan organik medis, dan keamanan terpercaya.
        </p>
<div class="space-y-2 text-xs text-pink-300 font-medium">
<p>📍 <strong>Boutique Jakarta:</strong> Jl. Kemang Timur No. 42B, Jakarta Selatan</p>
<p>📍 <strong>Boutique Surabaya:</strong> Pakuwon Mall Level 2, Unit 88, Surabaya</p>
<p>📞 <strong>CS WhatsApp:</strong> +62 812-3456-7890 (Online 24/7)</p>
</div>
</div>
<!-- Quick Nav -->
<div>
<h4 class="font-candy-display text-sm font-bold text-white mb-4">Navigasi Belanja</h4>
<ul class="space-y-2.5 text-xs text-purple-200">
<li><a class="hover:text-pink-300 transition" href="#beranda">🎈 Beranda Utama</a></li>
<li><a class="hover:text-pink-300 transition" href="#produk">🍼 Katalog Flash Sale</a></li>
<li><a class="hover:text-pink-300 transition" href="#keunggulan">⭐ Standar Higienis UV-C</a></li>
<li><a class="hover:text-pink-300 transition" href="#ulasan">💬 Ulasan Verified Bunda</a></li>
<li><a class="hover:text-pink-300 transition" href="#faq">❓ Panduan Ukuran &amp; FAQ</a></li>
</ul>
</div>
<!-- Customer Care & Policies -->
<div>
<h4 class="font-candy-display text-sm font-bold text-white mb-4">Layanan Bunda</h4>
<ul class="space-y-2.5 text-xs text-purple-200">
<li><a class="hover:text-cyan-300 transition" href="#faq">Kebijakan Garansi 100 Hari</a></li>
<li><a class="hover:text-cyan-300 transition" href="#faq">Panduan Pengiriman Instan</a></li>
<li><a class="hover:text-cyan-300 transition" href="#faq">Konsultasi Ukuran Bayi</a></li>
<li><a class="hover:text-cyan-300 transition" href="#faq">Kemitraan Reseller / Kado</a></li>
</ul>
</div>
<!-- Newsletter & Subscription -->
<div>
<h4 class="font-candy-display text-sm font-bold text-white mb-4">Surat Kejutan Bulanan 📬</h4>
<p class="text-xs text-purple-200 mb-3">Dapatkan voucher kado senilai <strong>Rp 50.000</strong> untuk pembelian pertama Bunda!</p>
<form class="space-y-2" onsubmit="handleNewsletter(event)">
<div class="flex rounded-full overflow-hidden p-1 bg-white/10 border border-purple-400/40">
<input class="bg-transparent px-3 py-1.5 text-xs text-white placeholder-purple-300 focus:outline-none w-full" id="newsletter-email" placeholder="Email Bunda..." required="" type="email"/>
<button class="bg-gradient-to-r from-pink-500 to-purple-500 text-white px-4 py-1.5 rounded-full text-xs font-bold font-candy-display hover:opacity-90 transition">
              Kirim
            </button>
</div>
<span class="text-[10px] text-purple-400 block">*Bebas spam. Bisa berhenti berlangganan kapan saja.</span>
</form>
</div>
</div>
<!-- Payment Badges & Copyright -->
<div class="pt-8 flex flex-col md:flex-row items-center justify-between gap-4 text-xs text-purple-300">
<div>
<p>© 2025 Petit Wonder Indonesia (Candy Cloud Edition). Hak Cipta Dilindungi.</p>
<div class="flex items-center space-x-2 mt-2">
<span class="text-[11px] text-purple-400">Metode Pembayaran:</span>
<span class="bg-white/10 px-2 py-0.5 rounded text-[10px] text-white">QRIS</span>
<span class="bg-white/10 px-2 py-0.5 rounded text-[10px] text-white">GoPay</span>
<span class="bg-white/10 px-2 py-0.5 rounded text-[10px] text-white">ShopeePay</span>
<span class="bg-white/10 px-2 py-0.5 rounded text-[10px] text-white">BCA</span>
<span class="bg-white/10 px-2 py-0.5 rounded text-[10px] text-white">Mandiri</span>
</div>
</div>
<div class="flex space-x-6 font-bold">
<a class="hover:text-pink-300 transition" href="#">Instagram @petitwonder.id</a>
<a class="hover:text-pink-300 transition" href="#">TikTok @petitwonderkids</a>
</div>
</div>
</div>
</footer>
<!-- ===================================================================== -->
<!-- SLIDE-IN CART DRAWER (INTERACTIVE) -->
<!-- ===================================================================== -->
<div class="fixed inset-0 z-50 pointer-events-none transition-opacity duration-300 opacity-0" id="cart-drawer-overlay">
<div class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm pointer-events-auto" onclick="closeCartDrawer()"></div>
<div class="absolute top-0 right-0 h-full w-full max-w-md bg-white shadow-2xl flex flex-col pointer-events-auto transform translate-x-full transition-transform duration-300 ease-in-out" id="cart-drawer-panel">
<!-- Drawer Header -->
<div class="p-5 border-b border-slate-100 flex items-center justify-between bg-gradient-to-r from-candy-pink-light to-candy-lilac-light">
<div class="flex items-center space-x-2">
<span class="text-2xl">🛍️</span>
<h3 class="font-candy-display text-lg font-bold text-slate-800">Keranjang Belanja Bunda</h3>
</div>
<button class="w-8 h-8 rounded-full bg-white hover:bg-slate-100 text-slate-500 font-bold flex items-center justify-center transition" onclick="closeCartDrawer()">✕</button>
</div>
<!-- Free Shipping Progress -->
<div class="p-4 bg-candy-lemon-light border-b border-candy-lemon/40 text-xs">
<div class="flex items-center justify-between font-bold text-amber-900 mb-1">
<span>🚚 Gratis Ongkir Aktif!</span>
<span>Hemat Rp 25.000</span>
</div>
<div class="w-full bg-amber-200 h-2 rounded-full overflow-hidden">
<div class="bg-emerald-500 h-full w-full"></div>
</div>
</div>
<!-- Cart Item List -->
<div class="flex-1 overflow-y-auto p-5 space-y-4" id="cart-items-container">
<!-- Pre-filled Item 1 -->
<div class="flex items-center space-x-3 p-3 rounded-2xl border border-slate-100 bg-slate-50/50">
<img alt="Lilac Cloud Romper" class="w-16 h-16 rounded-xl object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDBDLxPRzedxk15XLGJgGzSrjuSyQz7LuoNmxgrhXdeEpQeS9q5p3DJo5usRfB5ETidJcOwUBb8i-zcjekykfgUZu3VIfS9aiQYQuz2wipFFRblWgiyFwTx13DUR4kPDowUqSQS8RC2GxxVrd-3nKqpL-MhXL-TBfUPPAQvNgC2wf4xvKImwYR0QkdMTAUWRCFINiF0EQabZ8adVrUKHkmThaaSU4XM2jPePyOdBRE"/>
<div class="flex-1 min-w-0">
<h4 class="font-candy-display font-bold text-slate-800 text-sm truncate">Lilac Cloud Romper</h4>
<span class="text-[11px] text-purple-600 font-semibold">Warna: Lilac Pastel (3-6 Bulan)</span>
<div class="font-bold text-sm text-slate-800 mt-1">Rp 175.000</div>
</div>
<button class="text-slate-400 hover:text-red-500 p-1" onclick="removeItem(this, 175000)">🗑️</button>
</div>
<!-- Pre-filled Item 2 -->
<div class="flex items-center space-x-3 p-3 rounded-2xl border border-slate-100 bg-slate-50/50">
<img alt="Dining Bowl Set" class="w-16 h-16 rounded-xl object-cover" src="https://lh3.googleusercontent.com/aida/AEtjO1Xif6eshlBF3Cdlvs_-qkn4mGntEiFBmcOc66qrI9ky1oEyVxzoj0tMiOh3IoPcR15BGLNielv50wtqlgVlDNbTsJWaxaFP0pFRp_1MT1wgHvhilroCNu7zZiHCU6Om9rGCRcvSoHqGZ1eR5OKvFrLUFPnaXQxncvav6QXIe8brw7_4UOy1XdJGpxbQfxNSpSRsLRZJxINXvtivNyVVg-8cMHR8ou3p3V3Rtb8IXEBL"/>
<div class="flex-1 min-w-0">
<h4 class="font-candy-display font-bold text-slate-800 text-sm truncate">Silicone Dining Bowl Set</h4>
<span class="text-[11px] text-cyan-600 font-semibold">Warna: Sage Green Anti-Tumpah</span>
<div class="font-bold text-sm text-slate-800 mt-1">Rp 149.000</div>
</div>
<button class="text-slate-400 hover:text-red-500 p-1" onclick="removeItem(this, 149000)">🗑️</button>
</div>
</div>
<!-- Drawer Footer -->
<div class="p-5 border-t border-slate-100 bg-slate-50/80 space-y-3">
<div class="flex items-center justify-between text-xs text-slate-600">
<span>Subtotal Pesanan</span>
<span class="font-bold text-slate-800 text-sm" id="cart-subtotal-price">Rp 324.000</span>
</div>
<div class="flex items-center justify-between text-xs text-emerald-600">
<span>Potongan Kupon (CANDYFUN -35%)</span>
<span class="font-bold">-Rp 113.400</span>
</div>
<div class="flex items-center justify-between text-sm font-bold text-slate-800 pt-2 border-t border-slate-200">
<span>Total Pembayaran</span>
<span class="font-candy-display text-lg text-pink-600" id="cart-total-price">Rp 210.600</span>
</div>
<button class="w-full py-3.5 rounded-full font-candy-display font-bold text-white bg-gradient-to-r from-pink-500 via-purple-500 to-cyan-500 hover:opacity-95 shadow-lg shadow-pink-200 text-sm transition-all hover:scale-[1.02] flex items-center justify-center space-x-2" onclick="checkoutViaWhatsApp()">
<span>Lanjut ke Checkout WhatsApp</span>
<span>🚀</span>
</button>
</div>
</div>
</div>
<!-- ===================================================================== -->
<!-- QUICK SEARCH MODAL -->
<!-- ===================================================================== -->
<div class="fixed inset-0 z-50 hidden" id="search-modal">
<div class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm" onclick="toggleSearchModal()"></div>
<div class="relative max-w-xl mx-auto mt-24 p-6 bg-white rounded-3xl shadow-2xl border-2 border-candy-lilac">
<div class="flex items-center justify-between pb-3 border-b border-slate-100 mb-4">
<span class="font-candy-display font-bold text-slate-800 text-base">🔍 Cari Produk Si Kecil</span>
<button class="text-slate-400 hover:text-slate-600 text-lg" onclick="toggleSearchModal()">✕</button>
</div>
<div class="relative">
<input class="w-full px-4 py-3 rounded-2xl bg-slate-50 border border-purple-200 focus:outline-none focus:ring-2 focus:ring-purple-400 text-sm font-medium" id="search-input" onkeyup="handleSearchInput()" placeholder="Ketik kata kunci: romper, silicone bowl, kayu, kado..." type="text"/>
</div>
<div class="mt-4 text-xs text-slate-500 flex flex-wrap gap-2 items-center">
<span>Paling Dicari:</span>
<button class="bg-candy-pink-light text-pink-700 px-3 py-1 rounded-full font-semibold" onclick="applySearchTag('romper')">#romper</button>
<button class="bg-candy-cyan-light text-cyan-700 px-3 py-1 rounded-full font-semibold" onclick="applySearchTag('bowl')">#diningbowl</button>
<button class="bg-candy-lemon-light text-amber-800 px-3 py-1 rounded-full font-semibold" onclick="applySearchTag('kayu')">#stackingring</button>
<button class="bg-candy-lilac-light text-purple-700 px-3 py-1 rounded-full font-semibold" onclick="applySearchTag('swaddle')">#bedong</button>
</div>
</div>
</div>
<!-- ===================================================================== -->
<!-- FLOATING ACTION BUTTONS -->
<!-- ===================================================================== -->
<!-- 1. AI Assistant Bubble & Launcher (Bottom Left) -->
<div class="fixed bottom-6 left-6 z-40">
<div class="hidden mb-3 bg-white p-5 rounded-3xl shadow-2xl border-2 border-purple-300 w-80 text-xs transition-all" id="ai-chat-bubble">
<div class="flex items-center justify-between pb-2 border-b border-slate-100 mb-3">
<div class="flex items-center space-x-2">
<span class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-pulse"></span>
<strong class="text-slate-800 font-bold font-candy-display text-sm">Teman Ceria AI Petit</strong>
</div>
<button class="text-slate-400 hover:text-slate-600 font-bold text-base" onclick="toggleAIBubble()">×</button>
</div>
<p class="text-slate-600 mb-3 leading-relaxed">
      Halo Bunda! Berapa usia si kecil sekarang? AI kami siap memilihkan ukuran romper dan mainan sensorik motorik yang paling tepat!
    </p>
<div class="space-y-2">
<button class="w-full text-left px-3.5 py-2 rounded-xl bg-pink-50 hover:bg-pink-100 text-pink-900 font-semibold transition" onclick="selectAIRec('Bayi Baru Lahir (0 - 6 Bulan)')">
        👶 Bayi Baru Lahir (0 - 6 Bulan)
      </button>
<button class="w-full text-left px-3.5 py-2 rounded-xl bg-purple-50 hover:bg-purple-100 text-purple-900 font-semibold transition" onclick="selectAIRec('Fase Merangkak &amp; MPASI (6 - 18 Bulan)')">
        🍼 Fase MPASI &amp; Gerak (6 - 18 Bulan)
      </button>
<button class="w-full text-left px-3.5 py-2 rounded-xl bg-cyan-50 hover:bg-cyan-100 text-cyan-900 font-semibold transition" onclick="selectAIRec('Balita Eksplorasi (2 - 5 Tahun)')">
        🎨 Balita Aktif Eksploratif (2 - 5 Tahun)
      </button>
</div>
</div>
<button class="group flex items-center space-x-2.5 bg-gradient-to-r from-candy-soft-dark to-candy-dark text-white px-4 py-3 rounded-full shadow-2xl hover:scale-105 transition-all duration-300 border-2 border-candy-lilac" id="ai-assistant-toggle-btn" onclick="toggleAIBubble()">
<div class="relative">
<span class="text-xl">🧸</span>
<span class="absolute -top-1 -right-1 w-2.5 h-2.5 bg-pink-400 rounded-full animate-ping"></span>
<span class="absolute -top-1 -right-1 w-2.5 h-2.5 bg-pink-400 rounded-full"></span>
</div>
<div class="text-left">
<span class="block text-[9px] uppercase tracking-wider text-pink-300 font-bold leading-none">AI Konsultan Bayi</span>
<span class="text-xs font-bold leading-tight font-candy-display text-white">Teman Ceria AI</span>
</div>
</button>
</div>
<!-- 2. WhatsApp Official Launcher (Bottom Right) -->
<div class="fixed bottom-6 right-6 z-40 flex flex-col items-end">
<div class="hidden sm:block opacity-0 group-hover:opacity-100 transition-opacity mb-2 bg-slate-900 text-white text-[11px] font-medium py-1.5 px-3 rounded-xl shadow-lg whitespace-nowrap">
    Konsultasi Bidan &amp; Order Cepat via WhatsApp 👋
  </div>
<a class="flex items-center space-x-2.5 bg-[#25D366] hover:bg-[#20ba5a] text-white px-5 py-3.5 rounded-full shadow-2xl hover:scale-105 hover:shadow-emerald-400/40 transition-all duration-300 group" href="https://wa.me/6281234567890?text=Halo%20Admin%20Petit%20Wonder,%20saya%20tertarik%20dengan%20koleksi%20Candy%20Cloud%20dan%20ingin%20konsultasi%20pemesanan." rel="noopener noreferrer" target="_blank">
<svg class="w-6 h-6 fill-current" viewbox="0 0 24 24">
<path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.303-.058.116-.087.188-.173.289l-.26.302c-.087.086-.178.18-.076.355.101.174.449.741.964 1.201.662.591 1.221.774 1.394.86.173.086.275.072.376-.044.101-.116.433-.506.549-.68.116-.173.231-.145.39-.086s1.011.477 1.184.564.289.13.332.203c.043.072.043.419-.101.824z"></path>
</svg>
<span class="font-bold text-sm tracking-wide">Tanya via WhatsApp</span>
</a>
</div>
<!-- Floating Toast Notification -->
<div class="fixed top-24 right-6 z-50 hidden bg-slate-900 text-white text-xs sm:text-sm font-semibold px-5 py-3 rounded-2xl shadow-2xl border-2 border-candy-pink items-center space-x-2 transition-all" id="toast">
<span id="toast-text">✨ Berhasil ditambahkan ke keranjang belanja!</span>
</div>
<!-- ===================================================================== -->
<!-- JAVASCRIPT LOGIC & INTERACTIONS -->
<!-- ===================================================================== -->
<script>
  let cartCount = 2;
  let subtotal = 324000;

  // 1. Toast Notification Feedback
  function showToast(message) {
    const toast = document.getElementById('toast');
    const toastText = document.getElementById('toast-text');
    toastText.innerText = message;
    toast.classList.remove('hidden');
    toast.classList.add('flex');
    setTimeout(() => {
      toast.classList.add('hidden');
      toast.classList.remove('flex');
    }, 3200);
  }

  // 2. Add To Cart Functionality
  function addToCart(title, price) {
    cartCount++;
    subtotal += price;
    document.getElementById('cart-badge-count').innerText = cartCount;

    // Append to cart drawer
    const container = document.getElementById('cart-items-container');
    const newItem = document.createElement('div');
    newItem.className = "flex items-center space-x-3 p-3 rounded-2xl border border-slate-100 bg-slate-50/50 animate-fade";
    newItem.innerHTML = `
      <div class="w-16 h-16 rounded-xl bg-purple-100 flex items-center justify-center text-2xl">✨</div>
      <div class="flex-1 min-w-0">
        <h4 class="font-candy-display font-bold text-slate-800 text-sm truncate">${title}</h4>
        <span class="text-[11px] text-pink-600 font-semibold">Pilihan Bunda Terbaru</span>
        <div class="font-bold text-sm text-slate-800 mt-1">Rp ${price.toLocaleString('id-ID')}</div>
      </div>
      <button onclick="removeItem(this, ${price})" class="text-slate-400 hover:text-red-500 p-1">🗑️</button>
    `;
    container.appendChild(newItem);

    // Update totals
    updateCartTotals();
    showToast(`✨ "${title}" berhasil dimasukkan ke keranjang belanja!`);
    openCartDrawer();
  }

  function removeItem(button, price) {
    const itemRow = button.closest('div');
    itemRow.remove();
    cartCount = Math.max(0, cartCount - 1);
    subtotal = Math.max(0, subtotal - price);
    document.getElementById('cart-badge-count').innerText = cartCount;
    updateCartTotals();
    showToast("🗑️ Item telah dihapus dari keranjang.");
  }

  function updateCartTotals() {
    const discount = subtotal * 0.35;
    const finalTotal = subtotal - discount;
    document.getElementById('cart-subtotal-price').innerText = `Rp ${subtotal.toLocaleString('id-ID')}`;
    document.getElementById('cart-total-price').innerText = `Rp ${Math.round(finalTotal).toLocaleString('id-ID')}`;
  }

  // 3. Cart Drawer open/close
  function openCartDrawer() {
    const overlay = document.getElementById('cart-drawer-overlay');
    const panel = document.getElementById('cart-drawer-panel');
    overlay.classList.remove('opacity-0', 'pointer-events-none');
    overlay.classList.add('opacity-100');
    panel.classList.remove('translate-x-full');
  }

  function closeCartDrawer() {
    const overlay = document.getElementById('cart-drawer-overlay');
    const panel = document.getElementById('cart-drawer-panel');
    overlay.classList.add('opacity-0', 'pointer-events-none');
    overlay.classList.remove('opacity-100');
    panel.classList.add('translate-x-full');
  }

  function checkoutViaWhatsApp() {
    window.open(`https://wa.me/6281234567890?text=Halo%20Admin%20Petit%20Wonder,%20saya%20siap%20checkout%20pesanan%20dengan%20total%20Rp%20${subtotal.toLocaleString('id-ID')}%20(Kode%20Kupon:%20CANDYFUN).%20Mohon%20data%20rekening%20dan%20alamat%20pengiriman.`, '_blank');
  }

  // 4. Category Filter Pills
  function filterCategory(cat, btn) {
    const buttons = document.querySelectorAll('#category-pills button');
    buttons.forEach(b => {
      b.className = "px-5 py-2 rounded-full font-candy-display text-xs sm:text-sm font-bold bg-white text-slate-700 hover:bg-slate-100 border border-slate-200 transition-all";
    });
    btn.className = "px-5 py-2 rounded-full font-candy-display text-xs sm:text-sm font-bold bg-pink-500 text-white shadow-md transition-all scale-105";

    const items = document.querySelectorAll('.product-item');
    items.forEach(item => {
      if (cat === 'all' || item.getAttribute('data-category') === cat) {
        item.classList.remove('hidden');
      } else {
        item.classList.add('hidden');
      }
    });
  }

  // 5. Accordion for FAQ
  function toggleArtisticAccordion(id) {
    const content = document.getElementById(`art-faq-content-${id}`);
    const icon = document.getElementById(`art-faq-icon-${id}`);
    const isHidden = content.classList.contains('hidden');

    for (let i = 1; i <= 5; i++) {
      const c = document.getElementById(`art-faq-content-${i}`);
      const ic = document.getElementById(`art-faq-icon-${i}`);
      if (c && ic) {
        c.classList.add('hidden');
        ic.classList.remove('rotate-180');
      }
    }

    if (isHidden) {
      content.classList.remove('hidden');
      icon.classList.add('rotate-180');
    }
  }

  // 6. AI Assistant Bubble Interaction
  function toggleAIBubble() {
    const bubble = document.getElementById('ai-chat-bubble');
    bubble.classList.toggle('hidden');
  }

  function selectAIRec(category) {
    alert(`[Rekomendasi AI Petit Wonder]\nKategori: ${category}\n\n✨ Rekomendasi Utama: Kami menyarankan Lilac Cloud Organic Romper (Hypoallergenic) & Mainan Sensorik Kayu Montessori non-toxic.\n\nKlik WhatsApp untuk terhubung dengan konsultan anak kami!`);
    toggleAIBubble();
  }

  // 7. Search Modal
  function toggleSearchModal() {
    const modal = document.getElementById('search-modal');
    modal.classList.toggle('hidden');
  }

  function applySearchTag(tag) {
    document.getElementById('search-input').value = tag;
    handleSearchInput();
  }

  function handleSearchInput() {
    const query = document.getElementById('search-input').value.toLowerCase();
    const items = document.querySelectorAll('.product-item');
    items.forEach(item => {
      const text = item.innerText.toLowerCase();
      if (text.includes(query)) {
        item.classList.remove('hidden');
      } else {
        item.classList.add('hidden');
      }
    });
  }

  // 8. Newsletter Submission
  function handleNewsletter(e) {
    e.preventDefault();
    const email = document.getElementById('newsletter-email').value;
    showToast(` Terima kasih! Kode voucher CANDY50K telah dikirim ke ${email}`);
    document.getElementById('newsletter-email').value = '';
  }
</script>
</body></html>