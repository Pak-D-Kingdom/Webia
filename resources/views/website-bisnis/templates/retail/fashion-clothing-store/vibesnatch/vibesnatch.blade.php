<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>VIBESNATCH ✨ Pop-Dopamine & Y2K Gen-Z Fashion</title>
  <link rel="stylesheet" href="{{ asset('css/website-bisnis/templates/retail/fashion-clothing-store/vibesnatch/vibesnatch.css') }}">
  
  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- FontAwesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <!-- Google Fonts: Fredoka (Playful) & Plus Jakarta Sans -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;600;700&family=Plus+Jakarta+Sans:wght@500;700;800;900&display=swap" rel="stylesheet">

  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            vividPink: '#FF007A',
            flameOrange: '#FF5C00',
            goldenYellow: '#FFD600',
            electricViolet: '#8B00FF',
            bubblegumCyan: '#00F0FF',
            limeGreen: '#A3FF00',
            popBg: '#FFFDF5',
            pastelPink: '#FFE5EC',
            pastelCyan: '#E0F7FA',
            pastelYellow: '#FFF9C4',
            pastelPurple: '#F3E5F5',
            popCard: '#FFFFFF',
          },
          fontFamily: {
            fredoka: ['Fredoka', 'sans-serif'],
            sans: ['Plus Jakarta Sans', 'sans-serif'],
          },
          boxShadow: {
            'pop-pink': '5px 5px 0px #FF007A',
            'pop-yellow': '5px 5px 0px #FFD600',
            'pop-violet': '5px 5px 0px #8B00FF',
            'pop-black': '5px 5px 0px #000000',
            'pop-lime': '5px 5px 0px #A3FF00',
            'pop-cyan': '5px 5px 0px #00F0FF',
            'pop-lg': '8px 8px 0px #000000',
          },
          animation: {
            'marquee': 'marquee 18s linear infinite',
            'bounce-gentle': 'bounceGentle 2s ease-in-out infinite',
            'spin-slow': 'spin 12s linear infinite',
            'wiggle': 'wiggle 1s ease-in-out infinite',
          },
          keyframes: {
            marquee: {
              '0%': { transform: 'translateX(0%)' },
              '100%': { transform: 'translateX(-50%)' },
            },
            bounceGentle: {
              '0%, 100%': { transform: 'translateY(0px) rotate(0deg)' },
              '50%': { transform: 'translateY(-8px) rotate(2deg)' },
            },
            wiggle: {
              '0%, 100%': { transform: 'rotate(-3deg)' },
              '50%': { transform: 'rotate(3deg)' },
            }
          }
        }
      }
    }
  </script>

  
</head>
<body class="text-black font-sans selection:bg-goldenYellow selection:text-black">

  <!-- TOAST NOTIFICATION SYSTEM -->
  <div id="toastContainer" class="fixed top-20 right-5 z-[200] flex flex-col gap-2 pointer-events-none"></div>

  <!-- TOPBAR TICKER & LANGUAGE TOGGLE -->
  <div class="bg-goldenYellow text-black font-fredoka font-bold text-xs md:text-sm py-2.5 border-b-3 border-black flex items-center justify-between overflow-hidden relative z-50">
    <div class="flex whitespace-nowrap animate-marquee">
      <span class="mx-4 flex items-center gap-1"><i class="fa-solid fa-sparkles text-vividPink"></i> WELCOME TO VIBESNATCH // DOPAMINE Y2K DROPS</span>
      <span class="mx-4">🌟</span>
      <span class="mx-4 flex items-center gap-1"><i class="fa-solid fa-gift text-electricViolet"></i> USE CODE <span class="bg-black text-white px-2 py-0.5 rounded-md">"POPVIBE20"</span> FOR 20% OFF!</span>
      <span class="mx-4">💖</span>
      <span class="mx-4"><i class="fa-solid fa-truck-fast text-flameOrange"></i> FREE SHIPPING OVER $75 / Rp1.000.000</span>
      <span class="mx-4">⚡</span>
      <span class="mx-4 flex items-center gap-1"><i class="fa-solid fa-sparkles text-vividPink"></i> WELCOME TO VIBESNATCH // DOPAMINE Y2K DROPS</span>
      <span class="mx-4">🌟</span>
      <span class="mx-4 flex items-center gap-1"><i class="fa-solid fa-gift text-electricViolet"></i> USE CODE <span class="bg-black text-white px-2 py-0.5 rounded-md">"POPVIBE20"</span> FOR 20% OFF!</span>
    </div>

    <!-- Language Toggle Flag Button -->
    <button id="langToggleBtn" onclick="toggleLanguage()" class="fixed top-2.5 right-4 z-[60] bg-white text-black px-3.5 py-1.5 rounded-full text-xs font-fredoka font-bold border-2 border-black shadow-pop-pink hover:scale-105 transition flex items-center gap-2">
      <span id="langFlag">🇮🇩</span>
      <span id="langLabel">ID</span>
    </button>
  </div>

  <!-- NAVBAR -->
  <nav class="sticky top-0 z-40 bg-white/90 backdrop-blur-md border-b-3 border-black px-4 md:px-8 py-3">
    <div class="max-w-7xl mx-auto flex items-center justify-between">
      
      <!-- Logo -->
      <a href="#" class="flex items-center gap-2.5 group">
        <div class="w-11 h-11 bg-vividPink text-white rounded-2xl border-2 border-black flex items-center justify-center font-fredoka font-extrabold text-2xl shadow-pop-yellow rotate-[-4deg] group-hover:rotate-6 transition-transform">
          VS
        </div>
        <div class="flex flex-col">
          <span class="font-fredoka font-black text-2xl md:text-3xl text-black tracking-tight leading-none">
            VIBE<span class="text-vividPink">SNATCH</span>
          </span>
          <span class="text-[9px] font-extrabold tracking-widest text-electricViolet uppercase" data-i18n="tagline">Pop Dopamine Store</span>
        </div>
      </a>

      <!-- Desktop Nav Links -->
      <div class="hidden md:flex items-center gap-6 font-fredoka text-sm font-bold">
        <a href="#categories" class="hover:text-vividPink transition flex items-center gap-1" data-i18n="nav_categories">
          <span>KATEGORI</span> <span class="text-xs">✨</span>
        </a>
        <a href="#shop" class="hover:text-vividPink transition" data-i18n="nav_shop">CATALOG</a>
        <a href="#mixmatch" class="hover:text-vividPink transition" data-i18n="nav_lookbook">LOOKBOOK</a>
        <a href="#sizeguide" class="hover:text-vividPink transition" data-i18n="nav_sizeguide">SIZE FIT</a>
        <a href="#howToOrder" class="hover:text-vividPink transition" data-i18n="nav_howto">HOW TO ORDER</a>
        <a href="#faq" class="hover:text-vividPink transition" data-i18n="nav_faq">FAQ</a>
      </div>

      <!-- Action Items & Search -->
      <div class="flex items-center gap-3">
        <!-- Search Input -->
        <div class="relative hidden sm:block">
          <input type="text" id="searchInput" onkeyup="filterProductsBySearch()" placeholder="Search happy fits..." class="bg-pastelPink/60 border-2 border-black rounded-full px-4 py-1.5 pl-9 text-xs font-bold text-black focus:outline-none focus:bg-white focus:shadow-pop-pink w-36 focus:w-52 transition-all">
          <i class="fa-solid fa-magnifying-glass absolute left-3 top-2.5 text-xs text-black"></i>
        </div>

        <!-- Wishlist Icon -->
        <button onclick="toggleWishlistDrawer()" class="relative p-2.5 bg-pastelPurple rounded-2xl border-2 border-black hover:bg-vividPink hover:text-white transition shadow-pop-black">
          <i class="fa-solid fa-heart text-base"></i>
          <span id="wishlistBadge" class="absolute -top-2 -right-2 bg-electricViolet text-white text-[10px] font-fredoka font-bold w-5 h-5 rounded-full flex items-center justify-center border-2 border-black">0</span>
        </button>

        <!-- Cart Button -->
        <button onclick="toggleCartDrawer()" class="p-2.5 bg-limeGreen text-black font-fredoka font-bold rounded-2xl border-2 border-black hover:bg-goldenYellow transition shadow-pop-black flex items-center gap-2">
          <i class="fa-solid fa-bag-shopping text-base"></i>
          <span class="hidden sm:inline text-xs" data-i18n="btn_cart">CART</span>
          <span id="cartBadge" class="bg-black text-white text-xs px-2 py-0.5 rounded-full font-bold">0</span>
        </button>

        <!-- Mobile Menu Toggle -->
        <button onclick="toggleMobileNav()" class="md:hidden p-2 text-xl text-black">
          <i class="fa-solid fa-bars-staggered"></i>
        </button>
      </div>

    </div>

    <!-- Mobile Drawer Menu -->
    <div id="mobileNav" class="hidden md:hidden pt-4 pb-2 border-t-2 border-black mt-3 space-y-2 font-fredoka text-sm font-bold">
      <a href="#categories" onclick="toggleMobileNav()" class="block py-2 px-3 hover:bg-goldenYellow rounded-xl">🌈 KATEGORI CLOTHING</a>
      <a href="#shop" onclick="toggleMobileNav()" class="block py-2 px-3 hover:bg-vividPink hover:text-white rounded-xl">🛍️ PRODUCT CATALOG</a>
      <a href="#mixmatch" onclick="toggleMobileNav()" class="block py-2 px-3 hover:bg-bubblegumCyan rounded-xl">✨ LOOKBOOK OUTFIT</a>
      <a href="#sizeguide" onclick="toggleMobileNav()" class="block py-2 px-3 hover:bg-limeGreen rounded-xl">📏 SIZE GUIDE CALCULATOR</a>
      <a href="#howToOrder" onclick="toggleMobileNav()" class="block py-2 px-3 hover:bg-pastelPurple rounded-xl">🚀 CARA ORDER</a>
    </div>
  </nav>

  <!-- HERO SECTION -->
  <section class="relative py-12 md:py-20 px-4 max-w-7xl mx-auto overflow-hidden">
    <!-- Decorative Floating Embellishments -->
    <div class="absolute top-5 left-5 text-4xl animate-bounce-gentle pointer-events-none">🌸</div>
    <div class="absolute bottom-10 left-1/3 text-4xl animate-wiggle pointer-events-none">⚡</div>
    <div class="absolute top-10 right-10 text-5xl animate-spin-slow pointer-events-none">💖</div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center relative z-10">
      
      <!-- Hero Left Text Column -->
      <div class="lg:col-span-7 space-y-6 text-center lg:text-left">
        
        <!-- Badge -->
        <div class="inline-flex items-center gap-2 bg-pastelPink text-black px-4 py-2 rounded-full text-xs font-fredoka font-bold border-2 border-black shadow-pop-pink rotate-[-2deg]">
          <span class="animate-pulse">🔥</span> <span data-i18n="hero_badge">SS2026 // POP-DOPAMINE RAVE DROP</span>
        </div>

        <!-- Headline -->
        <h1 class="font-fredoka font-black text-4xl sm:text-6xl md:text-7xl leading-[1.05] tracking-tight text-black">
          SEROTONIN <span class="bg-goldenYellow px-3 py-1 rounded-2xl border-3 border-black inline-block rotate-2 shadow-pop-pink text-vividPink">BOOST</span> FOR YOUR WARDROBE! 🌈
        </h1>

        <!-- Subtitle -->
        <p class="text-black/80 font-bold text-sm sm:text-base max-w-xl mx-auto lg:mx-0 leading-relaxed bg-white/80 backdrop-blur-sm p-4 rounded-2xl border-2 border-black shadow-pop-cyan" data-i18n="hero_desc">
          Bosan dengan baju yang flat? Sambut fashion Gen-Z super ceria, colorful, dan playful! Ekspresikan vibe unik kamu dengan style Cyber-Y2K terlengkap!
        </p>

        <!-- CTA Action Buttons -->
        <div class="flex flex-wrap items-center justify-center lg:justify-start gap-4 pt-2">
          <a href="#shop" class="px-8 py-4 bg-vividPink text-white font-fredoka font-black text-base rounded-2xl border-3 border-black shadow-pop-black hover:bg-goldenYellow hover:text-black transition-all transform hover:-translate-y-1 flex items-center gap-2">
            <span data-i18n="hero_cta1">BELANJA NOW!</span> 🛍️
          </a>
          <a href="#mixmatch" class="px-8 py-4 bg-bubblegumCyan text-black font-fredoka font-black text-base rounded-2xl border-3 border-black shadow-pop-yellow hover:bg-limeGreen transition-all transform hover:-translate-y-1 flex items-center gap-2">
            <span data-i18n="hero_cta2">MIX & MATCH FIT</span> ✨
          </a>
        </div>

        <!-- Live Community Stats -->
        <div class="grid grid-cols-3 gap-3 pt-4 max-w-md mx-auto lg:mx-0">
          <div class="bg-white p-3 rounded-2xl border-2 border-black shadow-pop-pink text-center">
            <p class="font-fredoka font-black text-2xl text-vividPink">100%</p>
            <p class="text-[10px] font-bold text-black" data-i18n="stat1">Original Gen-Z</p>
          </div>
          <div class="bg-white p-3 rounded-2xl border-2 border-black shadow-pop-yellow text-center">
            <p class="font-fredoka font-black text-2xl text-flameOrange">50K+</p>
            <p class="text-[10px] font-bold text-black" data-i18n="stat2">Happy Besties</p>
          </div>
          <div class="bg-white p-3 rounded-2xl border-2 border-black shadow-pop-lime text-center">
            <p class="font-fredoka font-black text-2xl text-limeGreen">4.9 ★</p>
            <p class="text-[10px] font-bold text-black" data-i18n="stat3">Top Rating</p>
          </div>
        </div>

      </div>

      <!-- Hero Right Graphic Visuals Column -->
      <div class="lg:col-span-5 relative flex justify-center">
        <!-- Main Model Display Container -->
        <div class="relative w-full max-w-md aspect-[4/5] bg-gradient-to-tr from-pastelPink via-pastelYellow to-pastelCyan rounded-3xl p-3 border-3 border-black shadow-pop-lg group overflow-hidden">
          
          <img src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?w=800&auto=format&fit=crop&q=80" alt="Gen Z Pop Fashion Model" class="w-full h-full object-cover rounded-2xl border-2 border-black group-hover:scale-105 transition-transform duration-500">

          <!-- Cute Floating Sticker 1 -->
          <div class="absolute top-4 -left-3 bg-goldenYellow text-black font-fredoka font-bold text-xs px-3.5 py-1.5 rotate-[-8deg] rounded-xl border-2 border-black shadow-pop-black animate-bounce-gentle">
            💖 NEW OUTFIT DROP!
          </div>

          <!-- Cute Floating Sticker 2 -->
          <div class="absolute bottom-6 -right-3 bg-limeGreen text-black font-fredoka font-bold text-xs px-3.5 py-1.5 rotate-[10deg] rounded-xl border-2 border-black shadow-pop-black">
            ⚡ LIMITED STOCK!
          </div>

          <!-- Spinning Badge -->
          <div class="absolute -top-4 -right-4 w-16 h-16 bg-vividPink rounded-full border-2 border-black text-white flex items-center justify-center font-fredoka text-[10px] font-black text-center animate-spin-slow shadow-pop-black">
            POP * VIBE * BEST *
          </div>
        </div>
      </div>

    </div>
  </section>

  <!-- PROMOTIONAL FLASH SALE BANNER WITH DYNAMIC COUNTDOWN -->
  <section class="py-6 px-4 max-w-7xl mx-auto">
    <div class="bg-gradient-to-r from-vividPink via-flameOrange to-goldenYellow p-6 md:p-8 rounded-3xl border-3 border-black shadow-pop-lg text-black flex flex-col md:flex-row items-center justify-between gap-6 relative overflow-hidden">
      
      <div class="space-y-2 text-center md:text-left z-10">
        <span class="bg-black text-limeGreen font-fredoka text-xs font-bold px-3 py-1 rounded-full uppercase tracking-widest border border-white">
          ⏰ FLASH SALE ENDS SOON!
        </span>
        <h2 class="font-fredoka font-black text-2xl md:text-4xl text-white drop-shadow-[2px_2px_0px_#000]">
          DISCOUNT UP TO 50% OFF!
        </h2>
        <p class="font-bold text-xs md:text-sm text-black bg-white/90 px-3 py-1 rounded-lg inline-block border border-black" data-i18n="sale_voucher">
          Gunakan Kode Voucher: <span class="text-vividPink font-black">POPVIBE20</span>
        </p>
      </div>

      <!-- Live Countdown Timer Boxes -->
      <div class="flex items-center gap-3 z-10 font-fredoka">
        <div class="bg-white border-2 border-black p-3 rounded-2xl text-center min-w-[65px] shadow-pop-black">
          <span id="cdHours" class="font-black text-2xl md:text-3xl text-vividPink">08</span>
          <p class="text-[9px] font-bold uppercase text-black">Jam</p>
        </div>
        <span class="font-black text-2xl text-white">:</span>
        <div class="bg-white border-2 border-black p-3 rounded-2xl text-center min-w-[65px] shadow-pop-black">
          <span id="cdMins" class="font-black text-2xl md:text-3xl text-vividPink">42</span>
          <p class="text-[9px] font-bold uppercase text-black">Menit</p>
        </div>
        <span class="font-black text-2xl text-white">:</span>
        <div class="bg-white border-2 border-black p-3 rounded-2xl text-center min-w-[65px] shadow-pop-black">
          <span id="cdSecs" class="font-black text-2xl md:text-3xl text-vividPink">15</span>
          <p class="text-[9px] font-bold uppercase text-black">Detik</p>
        </div>
      </div>

    </div>
  </section>

  <!-- CLOTHING CATEGORIES SECTION -->
  <section id="categories" class="py-12 px-4 max-w-7xl mx-auto">
    <div class="text-center max-w-2xl mx-auto mb-10">
      <span class="bg-pastelPink text-vividPink border border-black font-fredoka text-xs font-bold px-3 py-1 rounded-full uppercase" data-i18n="cat_tag">// CATEGORIES</span>
      <h2 class="font-fredoka font-black text-3xl sm:text-5xl text-black mt-2" data-i18n="cat_title">
        EXPLORE VIBE CATEGORIES 🌈
      </h2>
      <p class="text-xs sm:text-sm font-bold text-black/70 mt-1" data-i18n="cat_subtitle">Pilih kategori favorit kamu untuk memfilter produk!</p>
    </div>

    <!-- Categories Grid Cards -->
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4">
      
      <div onclick="filterCategory('tees')" class="cat-card cursor-pointer bg-pastelPink p-4 rounded-3xl border-3 border-black shadow-pop-pink hover:bg-vividPink hover:text-white transition group text-center">
        <div class="w-14 h-14 mx-auto bg-white rounded-2xl border-2 border-black flex items-center justify-center text-2xl mb-2 group-hover:scale-110 transition">👕</div>
        <h3 class="font-fredoka font-bold text-sm">Baby Tees</h3>
      </div>

      <div onclick="filterCategory('hoodies')" class="cat-card cursor-pointer bg-pastelYellow p-4 rounded-3xl border-3 border-black shadow-pop-yellow hover:bg-goldenYellow transition group text-center">
        <div class="w-14 h-14 mx-auto bg-white rounded-2xl border-2 border-black flex items-center justify-center text-2xl mb-2 group-hover:scale-110 transition">🧥</div>
        <h3 class="font-fredoka font-bold text-sm">Hoodies</h3>
      </div>

      <div onclick="filterCategory('skirts')" class="cat-card cursor-pointer bg-pastelCyan p-4 rounded-3xl border-3 border-black shadow-pop-cyan hover:bg-bubblegumCyan transition group text-center">
        <div class="w-14 h-14 mx-auto bg-white rounded-2xl border-2 border-black flex items-center justify-center text-2xl mb-2 group-hover:scale-110 transition">👗</div>
        <h3 class="font-fredoka font-bold text-sm">Cyber Skirts</h3>
      </div>

      <div onclick="filterCategory('cargos')" class="cat-card cursor-pointer bg-pastelPurple p-4 rounded-3xl border-3 border-black shadow-pop-violet hover:bg-electricViolet hover:text-white transition group text-center">
        <div class="w-14 h-14 mx-auto bg-white rounded-2xl border-2 border-black flex items-center justify-center text-2xl mb-2 group-hover:scale-110 transition">👖</div>
        <h3 class="font-fredoka font-bold text-sm">Baggy Cargo</h3>
      </div>

      <div onclick="filterCategory('rave')" class="cat-card cursor-pointer bg-lime-200 p-4 rounded-3xl border-3 border-black shadow-pop-lime hover:bg-limeGreen transition group text-center">
        <div class="w-14 h-14 mx-auto bg-white rounded-2xl border-2 border-black flex items-center justify-center text-2xl mb-2 group-hover:scale-110 transition">⚡</div>
        <h3 class="font-fredoka font-bold text-sm">Rave Fits</h3>
      </div>

      <div onclick="filterCategory('accessories')" class="cat-card cursor-pointer bg-orange-200 p-4 rounded-3xl border-3 border-black shadow-pop-black hover:bg-flameOrange hover:text-white transition group text-center">
        <div class="w-14 h-14 mx-auto bg-white rounded-2xl border-2 border-black flex items-center justify-center text-2xl mb-2 group-hover:scale-110 transition">🕶️</div>
        <h3 class="font-fredoka font-bold text-sm">Accessories</h3>
      </div>

    </div>
  </section>

  <!-- MAIN PRODUCT CATALOG GRID SECTION -->
  <section id="shop" class="py-12 px-4 max-w-7xl mx-auto">
    <!-- Header Controls -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
      <div>
        <h2 class="font-fredoka font-black text-3xl sm:text-5xl text-black">
          POPULAR <span class="text-vividPink underline decoration-wavy decoration-goldenYellow">DROP CATALOG</span>
        </h2>
        <p class="text-xs sm:text-sm font-bold text-black/70 mt-1" data-i18n="shop_desc">Klik pada produk untuk Quick View & rekomendasi ukuran!</p>
      </div>

      <!-- Filter Tabs -->
      <div class="flex flex-wrap gap-2 font-fredoka text-xs font-bold">
        <button onclick="filterTab('all')" class="tab-btn bg-vividPink text-white px-4 py-2.5 rounded-xl border-2 border-black shadow-pop-black">ALL ITEMS</button>
        <button onclick="filterTab('trending')" class="tab-btn bg-white text-black hover:bg-goldenYellow px-4 py-2.5 rounded-xl border-2 border-black shadow-pop-black">TRENDING 🔥</button>
        <button onclick="filterTab('new')" class="tab-btn bg-white text-black hover:bg-goldenYellow px-4 py-2.5 rounded-xl border-2 border-black shadow-pop-black">NEW ARRIVALS ✨</button>
        <button onclick="filterTab('sale')" class="tab-btn bg-white text-black hover:bg-goldenYellow px-4 py-2.5 rounded-xl border-2 border-black shadow-pop-black">SALE DISCOUNTS 🏷️</button>
      </div>
    </div>

    <!-- Product Grid Container -->
    <div id="productGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
      <!-- Products dynamically generated in JavaScript -->
    </div>
  </section>

  <!-- MIX AND MATCH OUTFIT LOOKBOOK WITH HOTSPOTS -->
  <section id="mixmatch" class="py-16 px-4 max-w-7xl mx-auto">
    <div class="bg-pastelPurple p-6 md:p-12 rounded-3xl border-3 border-black shadow-pop-lg relative overflow-hidden">
      
      <div class="text-center max-w-2xl mx-auto mb-10">
        <span class="bg-goldenYellow text-black border border-black font-fredoka text-xs font-bold px-3 py-1 rounded-full uppercase" data-i18n="lookbook_tag">// STYLE INSPIRATION</span>
        <h2 class="font-fredoka font-black text-3xl sm:text-5xl text-black mt-2" data-i18n="lookbook_title">
          MIX & MATCH LOOKBOOK ✨
        </h2>
        <p class="text-xs sm:text-sm font-bold text-black/80 mt-1" data-i18n="lookbook_desc">Klik titik hotspot interaktif pada gambar untuk beli langsung per item outfit!</p>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
        <!-- Interactive Image Frame -->
        <div class="lg:col-span-7 relative rounded-3xl overflow-hidden border-3 border-black shadow-pop-black bg-white">
          <img src="https://images.unsplash.com/photo-1509631179647-0177331693ae?w=1000&auto=format&fit=crop&q=80" alt="Y2K Streetwear Lookbook" class="w-full h-[450px] object-cover">

          <!-- Hotspot Pin 1: Jacket -->
          <div class="absolute top-[25%] left-[45%] group">
            <button onclick="openProductModal(1)" class="w-9 h-9 bg-vividPink text-white rounded-full flex items-center justify-center font-fredoka font-bold border-2 border-black shadow-pop-black animate-bounce">
              1
            </button>
            <div class="hidden group-hover:block absolute top-10 left-0 bg-white border-2 border-black p-3 rounded-2xl shadow-pop-black w-48 text-xs z-20">
              <p class="font-bold font-fredoka text-black">Cyber Rave Puffer</p>
              <p class="text-vividPink font-black">$129.99 / Rp1.800k</p>
              <span class="text-[10px] text-electricViolet font-bold underline">Click for Quick View →</span>
            </div>
          </div>

          <!-- Hotspot Pin 2: Cargo Pants -->
          <div class="absolute top-[65%] left-[55%] group">
            <button onclick="openProductModal(3)" class="w-9 h-9 bg-goldenYellow text-black rounded-full flex items-center justify-center font-fredoka font-bold border-2 border-black shadow-pop-black animate-bounce">
              2
            </button>
            <div class="hidden group-hover:block absolute top-10 left-0 bg-white border-2 border-black p-3 rounded-2xl shadow-pop-black w-48 text-xs z-20">
              <p class="font-bold font-fredoka text-black">Y2K Baggy Cargo</p>
              <p class="text-vividPink font-black">$89.99 / Rp1.200k</p>
              <span class="text-[10px] text-electricViolet font-bold underline">Click for Quick View →</span>
            </div>
          </div>
        </div>

        <!-- Lookbook Sidebar Item List Cards -->
        <div class="lg:col-span-5 space-y-4">
          <div class="p-4 bg-white rounded-2xl border-2 border-black shadow-pop-pink flex items-center justify-between">
            <div class="flex items-center gap-3">
              <span class="w-8 h-8 rounded-full bg-vividPink text-white font-fredoka font-bold flex items-center justify-center text-xs">01</span>
              <div>
                <h4 class="font-fredoka font-bold text-sm text-black">Cyber Rave Puffer Jacket</h4>
                <p class="text-xs font-bold text-vividPink">$129.99</p>
              </div>
            </div>
            <button onclick="openProductModal(1)" class="px-4 py-2 bg-goldenYellow text-black font-fredoka text-xs font-bold rounded-xl border border-black hover:bg-vividPink hover:text-white transition">INSPECT</button>
          </div>

          <div class="p-4 bg-white rounded-2xl border-2 border-black shadow-pop-yellow flex items-center justify-between">
            <div class="flex items-center gap-3">
              <span class="w-8 h-8 rounded-full bg-goldenYellow text-black font-fredoka font-bold flex items-center justify-center text-xs">02</span>
              <div>
                <h4 class="font-fredoka font-bold text-sm text-black">Y2K Multi-Pocket Cargo</h4>
                <p class="text-xs font-bold text-vividPink">$89.99</p>
              </div>
            </div>
            <button onclick="openProductModal(3)" class="px-4 py-2 bg-bubblegumCyan text-black font-fredoka text-xs font-bold rounded-xl border border-black hover:bg-vividPink hover:text-white transition">INSPECT</button>
          </div>

          <div class="p-4 bg-white rounded-2xl border-2 border-black shadow-pop-lime flex items-center justify-between">
            <div class="flex items-center gap-3">
              <span class="w-8 h-8 rounded-full bg-limeGreen text-black font-fredoka font-bold flex items-center justify-center text-xs">03</span>
              <div>
                <h4 class="font-fredoka font-bold text-sm text-black">Matrix Chrome Goggles</h4>
                <p class="text-xs font-bold text-vividPink">$45.00</p>
              </div>
            </div>
            <button onclick="openProductModal(2)" class="px-4 py-2 bg-pastelPink text-black font-fredoka text-xs font-bold rounded-xl border border-black hover:bg-vividPink hover:text-white transition">INSPECT</button>
          </div>
        </div>

      </div>

    </div>
  </section>

  <!-- INTERACTIVE SIZE GUIDE CALCULATOR WIDGET -->
  <section id="sizeguide" class="py-12 px-4 max-w-4xl mx-auto">
    <div class="bg-pastelYellow p-8 md:p-10 rounded-3xl border-3 border-black shadow-pop-lg text-center">
      <span class="bg-white border border-black font-fredoka text-xs font-bold px-3 py-1 rounded-full uppercase" data-i18n="size_tag">📏 SIZE FIT CALCULATOR</span>
      <h2 class="font-fredoka font-black text-3xl sm:text-4xl text-black mt-2 mb-6" data-i18n="size_title">
        CARI UKURAN OVERSIZED KAMU ✨
      </h2>

      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 max-w-lg mx-auto text-left">
        <div>
          <label class="block text-xs font-fredoka font-bold text-black mb-1" data-i18n="lbl_height">TINGGI BADAN (CM)</label>
          <input type="number" id="calcHeight" placeholder="e.g. 165" class="w-full bg-white border-2 border-black rounded-2xl px-4 py-3 text-sm font-bold focus:outline-none focus:shadow-pop-pink">
        </div>
        <div>
          <label class="block text-xs font-fredoka font-bold text-black mb-1" data-i18n="lbl_weight">BERAT BADAN (KG)</label>
          <input type="number" id="calcWeight" placeholder="e.g. 58" class="w-full bg-white border-2 border-black rounded-2xl px-4 py-3 text-sm font-bold focus:outline-none focus:shadow-pop-pink">
        </div>
      </div>

      <button onclick="calculateSize()" class="mt-6 px-8 py-3.5 bg-vividPink text-white font-fredoka font-black rounded-2xl border-2 border-black shadow-pop-black hover:bg-goldenYellow hover:text-black transition transform hover:scale-105" data-i18n="btn_calc">
        HITUNG UKURAN IDEAL ⚡
      </button>

      <!-- Calculation Result Box -->
      <div id="sizeResult" class="hidden mt-6 p-4 bg-white rounded-2xl border-2 border-black max-w-md mx-auto shadow-pop-black">
        <p class="text-xs font-bold text-black/60" data-i18n="size_rec_text">Rekomendasi Ukuran Kamu:</p>
        <p id="sizeOutput" class="font-fredoka font-black text-2xl text-vividPink mt-1">OVERSIZED - M</p>
        <p class="text-xs font-bold text-electricViolet mt-1" data-i18n="size_fit_desc">Memberikan potongan boxy & comfy khas Gen-Z!</p>
      </div>
    </div>
  </section>

  <!-- HOW TO ORDER & SHOPPING TIMELINE SECTION -->
  <section id="howToOrder" class="py-12 px-4 max-w-7xl mx-auto">
    <div class="text-center max-w-2xl mx-auto mb-10">
      <h2 class="font-fredoka font-black text-3xl sm:text-4xl text-black uppercase" data-i18n="order_title">
        CARA BELANJA SUPER EASY 🚀
      </h2>
      <p class="text-xs sm:text-sm font-bold text-black/70 mt-1" data-i18n="order_subtitle">3 langkah gampang buat dapetin fit ter-kece kamu!</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <div class="bg-white p-6 rounded-3xl border-3 border-black shadow-pop-pink text-center space-y-3">
        <div class="w-14 h-14 bg-pastelPink rounded-2xl border-2 border-black flex items-center justify-center text-2xl font-black text-vividPink mx-auto">1</div>
        <h3 class="font-fredoka font-bold text-lg text-black" data-i18n="step1_title">Pilih Fit & Quick Add</h3>
        <p class="text-xs font-bold text-black/70 leading-relaxed" data-i18n="step1_desc">Pilih baju favorit kamu, cek ukuran dengan kalkulator otomatis, lalu klik Add to Cart.</p>
      </div>

      <div class="bg-white p-6 rounded-3xl border-3 border-black shadow-pop-yellow text-center space-y-3">
        <div class="w-14 h-14 bg-pastelYellow rounded-2xl border-2 border-black flex items-center justify-center text-2xl font-black text-flameOrange mx-auto">2</div>
        <h3 class="font-fredoka font-bold text-lg text-black" data-i18n="step2_title">Checkout & WhatsApp Confirm</h3>
        <p class="text-xs font-bold text-black/70 leading-relaxed" data-i18n="step2_desc">Lakukan checkout instan di website atau konfirmasi pembayaran via WhatsApp admin.</p>
      </div>

      <div class="bg-white p-6 rounded-3xl border-3 border-black shadow-pop-lime text-center space-y-3">
        <div class="w-14 h-14 bg-lime-200 rounded-2xl border-2 border-black flex items-center justify-center text-2xl font-black text-limeGreen mx-auto">3</div>
        <h3 class="font-fredoka font-bold text-lg text-black" data-i18n="step3_title">Unbox & Flex Your Style</h3>
        <p class="text-xs font-bold text-black/70 leading-relaxed" data-i18n="step3_desc">Paket tiba dalam 48 jam! Unbox sticker eksklusif dan flex OOTD kamu di TikTok!</p>
      </div>
    </div>
  </section>

  <!-- ACCORDION FAQ SECTION -->
  <section id="faq" class="py-12 px-4 max-w-4xl mx-auto">
    <div class="text-center mb-8">
      <h2 class="font-fredoka font-black text-3xl sm:text-4xl text-black uppercase" data-i18n="faq_title">FREQUENTLY ASKED QUESTIONS 💬</h2>
    </div>

    <div class="space-y-4">
      <div class="bg-white rounded-2xl border-2 border-black shadow-pop-black overflow-hidden">
        <button onclick="toggleAccordion('faq1')" class="w-full p-4 text-left font-fredoka font-bold text-sm flex justify-between items-center hover:text-vividPink">
          <span data-i18n="faq1_q">⚡ Apakah bahannya adem dan nyaman untuk dipakai harian?</span>
          <i class="fa-solid fa-chevron-down text-xs"></i>
        </button>
        <div id="faq1" class="hidden p-4 pt-0 text-xs font-bold text-black/80 border-t border-black/10" data-i18n="faq1_a">
          100%! Semua baju VIBESNATCH menggunakan bahan Heavy Cotton Combed 30s/24s & fleece tebal 330GSM yang tetap dingin dan menyerap keringat.
        </div>
      </div>

      <div class="bg-white rounded-2xl border-2 border-black shadow-pop-black overflow-hidden">
        <button onclick="toggleAccordion('faq2')" class="w-full p-4 text-left font-fredoka font-bold text-sm flex justify-between items-center hover:text-vividPink">
          <span data-i18n="faq2_q">📦 Berapa lama pengiriman pesanan saya?</span>
          <i class="fa-solid fa-chevron-down text-xs"></i>
        </button>
        <div id="faq2" class="hidden p-4 pt-0 text-xs font-bold text-black/80 border-t border-black/10" data-i18n="faq2_a">
          Pesanan diproses dalam 1x24 jam. Pengiriman reguler memakan waktu 2-3 hari kerja untuk Jabodetabek dan 3-5 hari untuk luar pulau.
        </div>
      </div>

      <div class="bg-white rounded-2xl border-2 border-black shadow-pop-black overflow-hidden">
        <button onclick="toggleAccordion('faq3')" class="w-full p-4 text-left font-fredoka font-bold text-sm flex justify-between items-center hover:text-vividPink">
          <span data-i18n="faq3_q">🔄 Apakah bisa tukar size jika kebesaran/kekecilan?</span>
          <i class="fa-solid fa-chevron-down text-xs"></i>
        </button>
        <div id="faq3" class="hidden p-4 pt-0 text-xs font-bold text-black/80 border-t border-black/10" data-i18n="faq3_a">
          Bisa banget! Garansi retur/penukaran size berlaku hingga 7 hari setelah barang diterima.
        </div>
      </div>
    </div>
  </section>

  <!-- TESTIMONIALS SECTION -->
  <section class="py-12 px-4 max-w-7xl mx-auto">
    <h2 class="font-fredoka font-black text-3xl sm:text-4xl text-center text-black uppercase mb-8">
      HAPPY BESTIES REVIEWS 🥰
    </h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <div class="bg-white p-5 rounded-3xl border-3 border-black shadow-pop-pink relative space-y-3">
        <div class="flex text-goldenYellow text-xs">★★★★★</div>
        <p class="text-xs font-bold text-black italic">"Warnanya beneran se-pop dan se-vibrant itu! Pas dipakai bikin mood naik seharian!"</p>
        <div class="flex items-center gap-2 pt-2">
          <span class="w-8 h-8 rounded-full bg-pastelPink text-vividPink font-bold flex items-center justify-center border border-black text-xs">S</span>
          <div>
            <p class="font-fredoka font-bold text-xs text-black">@sasha_pop</p>
            <p class="text-[9px] text-black/60 font-bold">Verified Bestie • Jakarta</p>
          </div>
        </div>
      </div>

      <div class="bg-white p-5 rounded-3xl border-3 border-black shadow-pop-yellow relative space-y-3">
        <div class="flex text-goldenYellow text-xs">★★★★★</div>
        <p class="text-xs font-bold text-black italic">"Kalkulator sizenya berguna banget. Dapet oversized fit yang pas banget di badan aku!"</p>
        <div class="flex items-center gap-2 pt-2">
          <span class="w-8 h-8 rounded-full bg-pastelYellow text-flameOrange font-bold flex items-center justify-center border border-black text-xs">N</span>
          <div>
            <p class="font-fredoka font-bold text-xs text-black">@nadin_y2k</p>
            <p class="text-[9px] text-black/60 font-bold">Verified Bestie • Bandung</p>
          </div>
        </div>
      </div>

      <div class="bg-white p-5 rounded-3xl border-3 border-black shadow-pop-lime relative space-y-3">
        <div class="flex text-goldenYellow text-xs">★★★★★</div>
        <p class="text-xs font-bold text-black italic">"Packagingnya lucu banyak sticker gratisnya. Langsung jadi toko favorit buat beli baju!"</p>
        <div class="flex items-center gap-2 pt-2">
          <span class="w-8 h-8 rounded-full bg-lime-200 text-limeGreen font-bold flex items-center justify-center border border-black text-xs">R</span>
          <div>
            <p class="font-fredoka font-bold text-xs text-black">@rizky_fit</p>
            <p class="text-[9px] text-black/60 font-bold">Verified Bestie • Surabaya</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- FOOTER -->
  <footer class="bg-white border-t-3 border-black pt-12 pb-8 px-4">
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-12 gap-8 mb-8">
      
      <div class="md:col-span-5 space-y-3">
        <div class="flex items-center gap-2">
          <div class="w-8 h-8 bg-vividPink text-white rounded-xl border-2 border-black flex items-center justify-center font-fredoka font-extrabold text-base">VS</div>
          <span class="font-fredoka font-black text-2xl text-black">VIBESNATCH</span>
        </div>
        <p class="text-xs font-bold text-black/70 max-w-sm" data-i18n="footer_desc">
          Brand fashion Gen-Z terlengkap dengan konsep Pop-Dopamine dan Y2K streetwear yang penuh warna dan kebahagiaan!
        </p>
      </div>

      <div class="md:col-span-3 text-xs font-bold space-y-2">
        <h4 class="font-fredoka font-bold text-sm text-black uppercase mb-2">PAGES</h4>
        <p><a href="#shop" class="hover:text-vividPink">Katalog Produk</a></p>
        <p><a href="#mixmatch" class="hover:text-vividPink">Lookbook Outfit</a></p>
        <p><a href="#sizeguide" class="hover:text-vividPink">Size Guide</a></p>
      </div>

      <div class="md:col-span-4 space-y-2">
        <h4 class="font-fredoka font-bold text-sm text-black uppercase mb-2">JOIN VIBE CLUB</h4>
        <form onsubmit="handleNewsletter(event)" class="flex gap-2">
          <input type="email" id="newsEmail" required placeholder="your.email@vibe.com" class="bg-pastelPink/60 border-2 border-black rounded-xl px-3 py-2 text-xs font-bold text-black flex-1 focus:outline-none">
          <button type="submit" class="px-4 py-2 bg-vividPink text-white font-fredoka font-bold text-xs rounded-xl border-2 border-black shadow-pop-black">
            CLAIM $10
          </button>
        </form>
      </div>

    </div>

    <div class="max-w-7xl mx-auto pt-4 border-t border-black/10 flex flex-col sm:flex-row justify-between items-center text-[11px] font-bold text-black/60 gap-2">
      <p>© 2026 VIBESNATCH POP STORE. ALL RIGHTS RESERVED.</p>
        <p class="text-center">Made with care ♡ · Website template by WEBIA</p>
      <div class="flex gap-4">
        <span>TERMS OF SERVICE</span>
        <span>PRIVACY POLICY</span>
      </div>
    </div>
  </footer>

  <!-- FLOATING BUTTONS (WHATSAPP & AI CHATBOT) -->
  <div class="fixed bottom-6 right-6 z-50 flex flex-row items-center gap-3">
    <!-- WhatsApp Trigger -->
    <button onclick="toggleWaDrawer()" class="w-12 h-12 bg-limeGreen text-black rounded-2xl flex items-center justify-center text-xl font-bold shadow-pop-black border-2 border-black hover:scale-110 transition">
      <i class="fa-brands fa-whatsapp"></i>
    </button>

    <!-- AI Bot Trigger -->
    <button onclick="toggleAiBot()" class="w-14 h-14 bg-goldenYellow text-black rounded-2xl flex items-center justify-center text-2xl font-bold shadow-pop-pink border-2 border-black animate-bounce hover:scale-110 transition">
      🤖
    </button>
  </div>


  <!-- CHECKOUT CUSTOMER DETAILS MODAL -->
  <div id="checkoutModal" class="fixed inset-0 bg-black/70 backdrop-blur-sm z-[130] hidden items-center justify-center p-4">
    <div class="bg-white border-3 border-black rounded-3xl max-w-xl w-full max-h-[92vh] overflow-y-auto p-5 sm:p-7 relative shadow-pop-lg text-black">
      <button type="button" onclick="closeCheckoutModal()" class="absolute top-4 right-4 text-black hover:text-vividPink text-2xl" aria-label="Tutup checkout">
        <i class="fa-solid fa-xmark"></i>
      </button>
      <div class="mb-5 pr-8">
        <span class="inline-block bg-goldenYellow border-2 border-black rounded-full px-3 py-1 text-[10px] font-fredoka font-black">ONE LAST STEP ✨</span>
        <h3 class="font-fredoka font-black text-2xl sm:text-3xl mt-2">Checkout, Bestie! 💖</h3>
        <p class="text-xs font-bold text-black/60 mt-1">Isi data penerima dulu. Setelah itu, nota pesanan akan disiapkan di WhatsApp admin untuk konfirmasi.</p>
      </div>
      <div id="checkoutOrderSummary" class="bg-pastelPink/50 border-2 border-black rounded-2xl p-4 mb-5 text-xs font-bold"></div>
      <form id="checkoutCustomerForm" onsubmit="submitCheckoutToWhatsApp(event)" class="space-y-3">
        <div>
          <label for="buyerName" class="block text-xs font-fredoka font-bold mb-1">Nama lengkap *</label>
          <input id="buyerName" name="buyerName" required maxlength="100" autocomplete="name" class="w-full bg-white border-2 border-black rounded-xl px-3 py-2.5 text-sm font-bold focus:outline-none focus:shadow-pop-pink" placeholder="Nama penerima">
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
          <div>
            <label for="buyerPhone" class="block text-xs font-fredoka font-bold mb-1">Nomor WhatsApp *</label>
            <input id="buyerPhone" name="buyerPhone" type="tel" required maxlength="25" autocomplete="tel" class="w-full bg-white border-2 border-black rounded-xl px-3 py-2.5 text-sm font-bold focus:outline-none focus:shadow-pop-pink" placeholder="08xxxxxxxxxx">
          </div>
          <div>
            <label for="buyerEmail" class="block text-xs font-fredoka font-bold mb-1">Email (opsional)</label>
            <input id="buyerEmail" name="buyerEmail" type="email" maxlength="120" autocomplete="email" class="w-full bg-white border-2 border-black rounded-xl px-3 py-2.5 text-sm font-bold focus:outline-none focus:shadow-pop-pink" placeholder="email@contoh.com">
          </div>
        </div>
        <div>
          <label for="buyerAddress" class="block text-xs font-fredoka font-bold mb-1">Alamat lengkap *</label>
          <textarea id="buyerAddress" name="buyerAddress" required maxlength="500" autocomplete="street-address" rows="2" class="w-full bg-white border-2 border-black rounded-xl px-3 py-2.5 text-sm font-bold focus:outline-none focus:shadow-pop-pink" placeholder="Jalan, nomor rumah, RT/RW, kelurahan, kecamatan"></textarea>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
          <div>
            <label for="buyerCity" class="block text-xs font-fredoka font-bold mb-1">Kota/Kabupaten *</label>
            <input id="buyerCity" name="buyerCity" required maxlength="100" autocomplete="address-level2" class="w-full bg-white border-2 border-black rounded-xl px-3 py-2.5 text-sm font-bold focus:outline-none focus:shadow-pop-pink" placeholder="Kota tujuan">
          </div>
          <div>
            <label for="buyerShipping" class="block text-xs font-fredoka font-bold mb-1">Metode pengiriman *</label>
            <select id="buyerShipping" name="buyerShipping" required class="w-full bg-white border-2 border-black rounded-xl px-3 py-2.5 text-sm font-bold focus:outline-none focus:shadow-pop-pink">
              <option value="Reguler">Reguler</option>
              <option value="Express">Express</option>
              <option value="Instant (jika tersedia)">Instant (jika tersedia)</option>
            </select>
          </div>
        </div>
        <div>
          <label for="buyerNotes" class="block text-xs font-fredoka font-bold mb-1">Catatan pesanan (opsional)</label>
          <textarea id="buyerNotes" name="buyerNotes" maxlength="300" rows="2" class="w-full bg-white border-2 border-black rounded-xl px-3 py-2.5 text-sm font-bold focus:outline-none focus:shadow-pop-pink" placeholder="Contoh: warna/ukuran pilihan atau instruksi kurir"></textarea>
        </div>
        <p class="text-[10px] font-bold text-black/60">Harga pada nota adalah subtotal produk. Admin akan mengonfirmasi ketersediaan ukuran/warna, ongkir, promo, dan total akhir sebelum pembayaran.</p>
        <div class="flex flex-col sm:flex-row gap-3 pt-2">
          <button type="button" onclick="closeCheckoutModal()" class="px-5 py-3 bg-white text-black font-fredoka font-bold text-xs rounded-xl border-2 border-black hover:bg-pastelYellow">Kembali ke keranjang</button>
          <button type="submit" class="flex-1 px-5 py-3 bg-limeGreen text-black font-fredoka font-black text-sm rounded-xl border-2 border-black shadow-pop-black hover:bg-goldenYellow transition">
            KIRIM NOTA KE WHATSAPP <i class="fa-brands fa-whatsapp ml-1"></i>
          </button>
        </div>
      </form>
    </div>
  </div>

  <!-- PRODUCT QUICK VIEW MODAL -->
  <div id="productModal" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-[100] hidden flex items-center justify-center p-4">
    <div class="bg-white border-3 border-black rounded-3xl max-w-2xl w-full max-h-[90vh] overflow-y-auto p-6 relative shadow-pop-lg text-black">
      <button onclick="closeProductModal()" class="absolute top-4 right-4 text-black hover:text-vividPink text-2xl">
        <i class="fa-solid fa-xmark"></i>
      </button>

      <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
        <div class="relative">
          <img id="modalImg" src="" alt="Product Image" class="w-full aspect-square object-cover rounded-2xl border-2 border-black shadow-pop-pink">
          <span id="modalBadge" class="absolute top-2 left-2 bg-vividPink text-white text-[10px] font-fredoka font-bold px-2.5 py-1 rounded-lg border border-black">SALE</span>
        </div>

        <div class="space-y-3">
          <h3 id="modalTitle" class="font-fredoka font-black text-2xl">Product Title</h3>
          <p id="modalCategory" class="text-xs text-vividPink font-bold uppercase">Category</p>
          
          <div class="flex items-center gap-3">
            <span id="modalPrice" class="font-fredoka font-black text-2xl text-flameOrange">$0.00</span>
            <span id="modalOldPrice" class="text-xs text-black/40 line-through">$0.00</span>
          </div>

          <p id="modalDesc" class="text-xs font-bold text-black/70 leading-relaxed">Detailed product description goes here...</p>

          <!-- Swatches -->
          <div>
            <label class="block text-[11px] font-fredoka font-bold text-black mb-1">COLOR SWATCHES</label>
            <div class="flex gap-2">
              <button type="button" onclick="selectProductColor('Vivid Pink', this)" aria-label="Vivid Pink" class="variant-color w-6 h-6 rounded-full bg-vividPink border-2 border-black cursor-pointer ring-2 ring-offset-2 ring-black"></button>
              <button type="button" onclick="selectProductColor('Golden Yellow', this)" aria-label="Golden Yellow" class="variant-color w-6 h-6 rounded-full bg-goldenYellow border-2 border-black cursor-pointer"></button>
              <button type="button" onclick="selectProductColor('Bubblegum Cyan', this)" aria-label="Bubblegum Cyan" class="variant-color w-6 h-6 rounded-full bg-bubblegumCyan border-2 border-black cursor-pointer"></button>
            </div>
          </div>

          <!-- Sizes -->
          <div>
            <label class="block text-[11px] font-fredoka font-bold text-black mb-1">PILIH UKURAN</label>
            <div class="flex gap-2 font-fredoka text-xs font-bold">
              <button type="button" onclick="selectProductSize('S', this)" class="variant-size px-3 py-1 bg-pastelPink border border-black rounded-lg">S</button>
              <button type="button" onclick="selectProductSize('M', this)" class="variant-size px-3 py-1 bg-vividPink text-white border border-black rounded-lg">M</button>
              <button type="button" onclick="selectProductSize('L', this)" class="variant-size px-3 py-1 bg-pastelPink border border-black rounded-lg">L</button>
              <button type="button" onclick="selectProductSize('XL', this)" class="variant-size px-3 py-1 bg-pastelPink border border-black rounded-lg">XL</button>
            </div>
          </div>

          <button id="modalAddBtn" onclick="" class="w-full py-3 bg-goldenYellow text-black font-fredoka font-black rounded-xl border-2 border-black hover:bg-vividPink hover:text-white transition shadow-pop-black">
            TAMBAH KE KERANJANG 🛍️
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- SHOPPING CART DRAWER -->
  <div id="cartDrawer" class="fixed inset-y-0 right-0 w-full max-w-md bg-white border-l-3 border-black z-[110] transform translate-x-full transition-transform duration-300 p-6 flex flex-col justify-between shadow-pop-lg">
    <div>
      <div class="flex justify-between items-center pb-4 border-b-2 border-black">
        <h3 class="font-fredoka font-black text-xl text-black flex items-center gap-2">
          🛒 KERANJANG BELANJA
        </h3>
        <button onclick="toggleCartDrawer()" class="text-black hover:text-vividPink text-xl">
          <i class="fa-solid fa-xmark"></i>
        </button>
      </div>

      <div id="cartItemsContainer" class="py-4 space-y-3 max-h-[60vh] overflow-y-auto">
        <!-- Dynamic Cart Items -->
      </div>
    </div>

    <div class="pt-4 border-t-2 border-black space-y-3">
      <div class="flex justify-between font-fredoka font-black text-base text-black">
        <span>SUBTOTAL:</span>
        <span id="cartSubtotal" class="text-vividPink">$0.00</span>
      </div>
      <button onclick="checkoutMock()" class="w-full py-3.5 bg-limeGreen text-black font-fredoka font-black text-sm rounded-2xl border-2 border-black hover:bg-goldenYellow transition shadow-pop-black">
        PROCEED TO CHECKOUT ⚡
      </button>
    </div>
  </div>

  <!-- WISHLIST DRAWER -->
  <div id="wishlistDrawer" class="fixed inset-y-0 right-0 w-full max-w-md bg-white border-l-3 border-black z-[110] transform translate-x-full transition-transform duration-300 p-6 flex flex-col shadow-pop-lg">
    <div class="flex justify-between items-center pb-4 border-b-2 border-black">
      <h3 class="font-fredoka font-black text-xl text-black flex items-center gap-2">
        💖 WISHLIST ITEMS
      </h3>
      <button onclick="toggleWishlistDrawer()" class="text-black hover:text-vividPink text-xl">
        <i class="fa-solid fa-xmark"></i>
      </button>
    </div>
    <div id="wishlistItemsContainer" class="py-4 space-y-3 flex-1 overflow-y-auto">
      <!-- Dynamic Wishlist Items -->
    </div>
  </div>

  <!-- FLOATING WHATSAPP CHAT DRAWER -->
  <div id="waDrawer" class="fixed bottom-24 right-6 w-80 bg-white border-3 border-black rounded-3xl p-5 z-[90] hidden shadow-pop-lg">
    <div class="flex justify-between items-center mb-3">
      <div class="flex items-center gap-2">
        <span class="w-3 h-3 bg-limeGreen rounded-full border border-black animate-ping"></span>
        <h4 class="font-fredoka font-bold text-sm text-black">WhatsApp Admin CS</h4>
      </div>
      <button onclick="toggleWaDrawer()" class="text-black"><i class="fa-solid fa-xmark"></i></button>
    </div>
    <p class="text-xs font-bold text-black/70 mb-3">Halo Bestie! Mau tanya seputar produk atau bantuan order?</p>
    <div class="space-y-2">
      <a href="https://wa.me/628123456789?text=Hi%20VIBESNATCH,%20mau%20tanya%20size%20baju!" target="_blank" class="block w-full text-left p-2.5 bg-pastelPink hover:bg-vividPink hover:text-white rounded-xl text-xs font-bold border border-black transition">
        📏 Tanya Sizing & Stok Baju
      </a>
      <a href="https://wa.me/628123456789?text=Hi%20VIBESNATCH,%20mau%20cek%20resi%20pesanan!" target="_blank" class="block w-full text-left p-2.5 bg-pastelYellow hover:bg-goldenYellow rounded-xl text-xs font-bold border border-black transition">
        📦 Cek Resi & Status Pengiriman
      </a>
    </div>
  </div>

  <!-- VIBEBOT AI ASSISTANT POPUP -->
  <div id="aiBotDrawer" class="fixed bottom-24 right-6 w-80 sm:w-96 bg-white border-3 border-black rounded-3xl p-5 z-[90] hidden shadow-pop-lg">
    <div class="flex justify-between items-center mb-3 pb-2 border-b-2 border-black">
      <div class="flex items-center gap-2">
        <span class="text-xl">🤖</span>
        <div>
          <h4 class="font-fredoka font-bold text-sm text-black">VibeBot AI Assistant</h4>
          <p class="text-[10px] text-vividPink font-bold">Online • Style Advisor</p>
        </div>
      </div>
      <button onclick="toggleAiBot()" class="text-black"><i class="fa-solid fa-xmark"></i></button>
    </div>

    <div id="aiChatBox" class="h-48 overflow-y-auto space-y-2.5 p-2 bg-pastelPurple/40 rounded-xl text-xs font-bold mb-3">
      <div class="bg-white p-2.5 rounded-xl border border-black max-w-[85%]">
        Halo bestie! 👋 Ada yang bisa VibeBot bantu buat style OOTD kamu hari ini?
      </div>
    </div>

    <form onsubmit="handleAiMessage(event)" class="flex gap-2">
      <input type="text" id="aiInput" placeholder="Tanya rekomendasi style..." class="flex-1 bg-white border-2 border-black rounded-xl px-3 py-2 text-xs font-bold text-black focus:outline-none">
      <button type="submit" class="px-3 py-2 bg-vividPink text-white font-fredoka font-bold text-xs rounded-xl border-2 border-black">SEND</button>
    </form>
  </div>

  <!-- JAVASCRIPT LOGIC -->
  
  <script src="{{ asset('js/website-bisnis/templates/retail/fashion-clothing-store/vibesnatch/vibesnatch.js') }}" defer></script>
</body>
</html>