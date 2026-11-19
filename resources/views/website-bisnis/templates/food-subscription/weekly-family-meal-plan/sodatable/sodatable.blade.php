{{-- SodaTable Family Kitchen | Reference layout retained; CSS and JS separated. --}}
<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SodaTable Family Kitchen — Weekly Family Meal Plan Provider</title>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,400;0,9..40,500;0,9..40,700;1,9..40,400&family=Fraunces:opsz,wght@9..144,600;9..144,700;9..144,800&family=JetBrains+Mono:wght@500;700&display=swap" rel="stylesheet">
<script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            coral: '#F28C78',
            'coral-dark': '#DE6F5A',
            peach: '#FFB59E',
            apricot: '#FFD9C7',
            cream: '#FFF4E9',
            plum: '#9B5572',
            'plum-dark': '#7A3E57',
            cocoa: '#3E2731',
            'cocoa-soft': '#6B4C59'
          },
          fontFamily: {
            display: ['"Fraunces"', 'serif'],
            sans: ['"DM Sans"', 'sans-serif'],
            mono: ['"JetBrains Mono"', 'monospace']
          }
        }
      }
    };
  </script>
<link rel="stylesheet" href="{{ asset('css/website-bisnis/templates/food-subscription/weekly-family-meal-plan/sodatable/sodatable.css') }}">
</head>
<body>
 AMBIENT ANIMATED BACKGROUND LAYER (Moves Gently Across Page) 
<div aria-hidden="true" class="fixed inset-0 pointer-events-none z-0 overflow-hidden">
<div class="absolute -top-24 -left-24 w-96 h-96 rounded-full bg-peach/30 blur-3xl animate-float-warm"></div>
<div class="absolute top-[38%] -right-28 w-[420px] h-[420px] rounded-full bg-apricot/45 blur-3xl animate-float-reverse"></div>
<div class="absolute bottom-10 left-[15%] w-80 h-80 rounded-full bg-plum/10 blur-3xl animate-drift"></div>
</div>
 ==================== 1. TOPBAR &amp; PERSISTENT GLASSMORPHIC NAVBAR ==================== 
<header class="fixed top-0 left-0 right-0 z-50 shadow-sm">
<!-- Topbar -->
<div class="bg-plum text-cream text-[11px] sm:text-xs py-1.5 px-4 border-b border-peach/30">
<div class="max-w-7xl mx-auto flex items-center justify-between gap-2">
<div class="flex items-center gap-2 overflow-hidden">
<span class="inline-flex items-center gap-1.5 bg-coral text-white font-bold px-2.5 py-0.5 rounded-full text-[10px] uppercase tracking-wider shrink-0">
<span class="w-1.5 h-1.5 rounded-full bg-[#FFE28A] animate-ping"></span> Paket Keluarga
          </span>
<p class="truncate font-medium">
            Gratis 1 Loyang <em>Kid-Friendly Mac &amp; Cheese</em> + Ongkir Minggu Pertama — Kode:
            <button class="underline decoration-peach font-mono font-bold text-apricot hover:text-white ml-1" onclick="copyPromoCode('MEJAHANGAT')" title="Klik untuk salin" type="button">MEJAHANGAT</button>
</p>
</div>
<div class="hidden md:flex items-center gap-4 text-[11px] text-apricot shrink-0">
<span>🏡 Antar Hangat: 10.30 &amp; 16.30 WIB</span>
<span class="bg-white/15 px-2.5 py-0.5 rounded-full font-semibold text-white">100% Halal • Tanpa MSG</span>
</div>
</div>
</div>
<!-- Main Navbar -->
<nav aria-label="Navigasi Utama" class="bg-cream/92 backdrop-blur-md border-b border-plum/15 relative">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 sm:h-[68px] flex items-center justify-between gap-3">
<!-- Brand Logo -->
<a class="flex items-center gap-2.5 group shrink-0" href="#hero">
<div class="w-10 h-10 rounded-2xl bg-coral flex items-center justify-center border-2 border-plum shadow-[0_3px_0_0_#9B5572] group-hover:rotate-6 transition-transform">
<svg class="w-6 h-6 text-cream" fill="none" viewbox="0 0 32 32">
<path d="M5 17C5 22.5 9.9 27 16 27C22.1 27 27 22.5 27 17H5Z" fill="#FFF4E9" stroke="#9B5572" stroke-width="2"></path>
<path d="M8 14C8 10 11.6 7 16 7C20.4 7 24 10 24 14H8Z" fill="#FFD9C7" stroke="#9B5572" stroke-width="2"></path>
<circle cx="16" cy="5" fill="#9B5572" r="2"></circle>
<!-- ==================== 1. TOPBAR & 2. NAVBAR ==================== -->
<header class="fixed top-0 left-0 right-0 z-50 shadow-sm">
<!-- 1. Topbar: Informasi promo, paket keluarga, dan kontak -->
<div class="bg-plum text-cream text-[11px] sm:text-xs py-1.5 px-4 border-b border-peach/30">
<div class="max-w-7xl mx-auto flex items-center justify-between gap-2">
<div class="flex items-center gap-2 overflow-hidden">
<span class="inline-flex items-center gap-1.5 bg-coral text-white font-bold px-2.5 py-0.5 rounded-full text-[10px] uppercase tracking-wider shrink-0">
<span class="w-1.5 h-1.5 rounded-full bg-[#FFE28A] animate-ping"></span> Promo Keluarga
          </span>
<p class="truncate font-medium">
            Gratis 1 Loyang <em>Kid-Friendly Mac &amp; Cheese</em> + Ongkir Minggu Pertama — Kode:
            <button class="underline decoration-peach font-mono font-bold text-apricot hover:text-white ml-1" onclick="copyPromoCode('MEJAHANGAT')" title="Klik untuk salin" type="button">MEJAHANGAT</button>
</p>
</div>
<div class="hidden md:flex items-center gap-4 text-[11px] text-apricot shrink-0">
<span>📞 Hotline: (021) 789-4410 • WA 0812-3456-7890</span>
<span class="bg-white/15 px-2.5 py-0.5 rounded-full font-semibold text-white">Paket 2–6+ Anggota</span>
</div>
</div>
</div>
<!-- 2. Navbar: Beranda, Paket Keluarga, Menu Mingguan, Cara Berlangganan, Tentang Kami, dan Kontak -->
<nav aria-label="Navigasi Utama" class="bg-cream/92 backdrop-blur-md border-b border-plum/15 relative">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 sm:h-[68px] flex items-center justify-between gap-3">
<a class="flex items-center gap-2.5 group shrink-0" href="#beranda">
<div class="w-10 h-10 rounded-2xl bg-coral flex items-center justify-center border-2 border-plum shadow-[0_3px_0_0_#9B5572] group-hover:rotate-6 transition-transform">
<svg class="w-6 h-6 text-cream" fill="none" viewbox="0 0 32 32">
<path d="M5 17C5 22.5 9.9 27 16 27C22.1 27 27 22.5 27 17H5Z" fill="#FFF4E9" stroke="#9B5572" stroke-width="2"></path>
<path d="M8 14C8 10 11.6 7 16 7C20.4 7 24 10 24 14H8Z" fill="#FFD9C7" stroke="#9B5572" stroke-width="2"></path>
<circle cx="16" cy="5" fill="#9B5572" r="2"></circle>
</svg>
</div>
<div>
<span class="font-display font-extrabold text-lg sm:text-xl tracking-tight text-plum block leading-none">Soda<span class="text-coral">Table</span></span>
<span class="text-[9px] font-bold uppercase tracking-[0.16em] text-cocoa-soft">Weekly Family Kitchen</span>
</div>
</a>
<!-- 6 Menu Utama Sesuai Ketentuan -->
<div class="hidden lg:flex items-center gap-1 bg-apricot/70 p-1 rounded-full border border-plum/15">
<a class="nav-spy-link px-3.5 py-1.5 rounded-full text-xs font-bold bg-plum text-cream transition-all" data-spy="beranda" href="#beranda">Beranda</a>
<a class="nav-spy-link px-3.5 py-1.5 rounded-full text-xs font-semibold text-cocoa hover:bg-white/80 transition-all" data-spy="paket-keluarga" href="#paket-keluarga">Paket Keluarga</a>
<a class="nav-spy-link px-3.5 py-1.5 rounded-full text-xs font-semibold text-cocoa hover:bg-white/80 transition-all" data-spy="menu-mingguan" href="#menu-mingguan">Menu Mingguan</a>
<a class="nav-spy-link px-3.5 py-1.5 rounded-full text-xs font-semibold text-cocoa hover:bg-white/80 transition-all" data-spy="cara-berlangganan" href="#cara-berlangganan">Cara Berlangganan</a>
<a class="nav-spy-link px-3.5 py-1.5 rounded-full text-xs font-semibold text-cocoa hover:bg-white/80 transition-all" data-spy="tentang-kami" href="#tentang-kami">Tentang Kami</a>
<a class="nav-spy-link px-3.5 py-1.5 rounded-full text-xs font-semibold text-cocoa hover:bg-white/80 transition-all" data-spy="kontak" href="#kontak">Kontak</a>
</div>
<div class="flex items-center gap-2 sm:gap-2.5">
<button aria-label="Ringkasan Pesanan" class="relative inline-flex items-center gap-1.5 bg-apricot hover:bg-peach text-cocoa font-bold px-3 py-2 rounded-xl border-2 border-plum text-xs transition-all" onclick="openCheckoutModal()" type="button">
<span>🥘</span>
<span class="hidden sm:inline">Box Keluarga</span>
<span class="bg-plum text-cream font-mono text-[11px] font-bold px-1.5 py-0.5 rounded-full" id="nav-family-count">4</span>
</button>
<a class="btn-shimmer bg-coral hover:bg-coral-dark text-white font-bold px-3.5 sm:px-4 py-2 rounded-xl border-2 border-plum shadow-[0_3px_0_0_#9B5572] text-xs transition-transform active:translate-y-0.5" href="#paket-keluarga">
            Rencanakan Menu
          </a>
<button aria-label="Buka Menu" class="lg:hidden p-2 rounded-xl bg-white border-2 border-plum text-plum" onclick="toggleMobileMenu()" type="button">
<svg class="w-5 h-5" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path d="M4 6h16M4 12h16M4 18h16" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2"></path></svg>
</button>
</div>
</div>
<div class="w-full h-[3px] bg-plum/10">
<div class="h-full bg-gradient-to-r from-coral via-peach to-plum w-0 transition-all duration-150" id="scroll-progress-bar"></div>
</div>
<div class="hidden lg:hidden bg-cream border-b-2 border-plum px-4 py-3 grid grid-cols-2 gap-2" id="mobile-menu">
<a class="px-3 py-2 rounded-xl text-xs font-bold bg-apricot text-cocoa" href="#beranda" onclick="toggleMobileMenu()">🏡 Beranda</a>
<a class="px-3 py-2 rounded-xl text-xs font-bold bg-white border border-plum/15 text-cocoa" href="#paket-keluarga" onclick="toggleMobileMenu()">👨‍👩‍👧‍👦 Paket Keluarga</a>
<a class="px-3 py-2 rounded-xl text-xs font-bold bg-white border border-plum/15 text-cocoa" href="#menu-mingguan" onclick="toggleMobileMenu()">📅 Menu Mingguan</a>
<a class="px-3 py-2 rounded-xl text-xs font-bold bg-white border border-plum/15 text-cocoa" href="#cara-berlangganan" onclick="toggleMobileMenu()">📋 Cara Berlangganan</a>
<a class="px-3 py-2 rounded-xl text-xs font-bold bg-white border border-plum/15 text-cocoa" href="#tentang-kami" onclick="toggleMobileMenu()">🍲 Tentang Kami</a>
<a class="px-3 py-2 rounded-xl text-xs font-bold bg-white border border-plum/15 text-cocoa" href="#kontak" onclick="toggleMobileMenu()">📞 Kontak</a>
</div>
</nav>
</header>
<!-- ==================== 3. HERO BANNER (Foto Hidangan Keluarga, Slogan & Tombol Rencanakan Menu Keluarga) ==================== -->
<section class="relative overflow-hidden pt-6 pb-16 lg:pt-12 lg:pb-24 bg-gradient-to-b from-cream via-apricot/45 to-cream z-10" id="beranda">
<span class="hidden md:inline-block absolute top-14 left-[46%] text-2xl animate-drift pointer-events-none select-none">🍲</span>
<span class="hidden md:inline-block absolute bottom-28 left-12 text-2xl animate-wiggle pointer-events-none select-none">🥐</span>
<span class="hidden md:inline-block absolute top-20 right-14 text-2xl animate-bounce-soft pointer-events-none select-none">🏡</span>
<span class="hidden lg:inline-block absolute bottom-32 right-[45%] text-2xl animate-float-warm pointer-events-none select-none">🧸</span>
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
<div class="grid lg:grid-cols-12 gap-10 lg:gap-8 items-center">
<div class="lg:col-span-6 space-y-6 text-center lg:text-left">
<div class="inline-flex items-center gap-2.5 bg-white px-4 py-2 rounded-full border-2 border-plum shadow-sm animate-float-warm">
<span class="text-base">👨‍👩‍👧‍👦</span>
<span class="text-xs font-bold uppercase tracking-wider text-plum">Katering Mingguan Keluarga Modern</span>
</div>
<h1 class="font-display font-extrabold text-4xl sm:text-5xl lg:text-[3.35rem] leading-[1.12] text-cocoa tracking-tight">
            Meja Makan Hangat Setiap Hari,
            <span class="relative inline-block text-plum italic">
              Tanpa Pusing Masak &amp; Belanja.
              <svg class="absolute -bottom-2 left-0 w-full h-3 text-coral" fill="none" viewbox="0 0 220 12">
<path d="M2 9C65 2 155 2 218 9" stroke="currentColor" stroke-linecap="round" stroke-width="5"></path>
</svg>
</span>
</h1>
<p class="text-base sm:text-lg text-cocoa-soft leading-relaxed max-w-xl mx-auto lg:mx-0">
            Sajian rumahan bergizi untuk seluruh anggota keluarga—mulai dari menu ramah anak (<span class="bg-apricot px-2 py-0.5 rounded-lg font-bold text-cocoa">No-Spicy &amp; Bebas MSG</span>) hingga wadah berbagi keluarga yang diantar hangat sesuai jadwal Anda.
          </p>
<div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-3.5 pt-1">
<a class="btn-shimmer w-full sm:w-auto inline-flex items-center justify-center gap-2.5 bg-coral hover:bg-coral-dark text-white font-bold px-7 py-4 rounded-2xl border-2 border-plum shadow-[0_4px_0_0_#9B5572] text-sm sm:text-base transition-transform active:translate-y-0.5" href="#paket-keluarga">
<span>🍽️</span> Rencanakan Menu Keluarga
            </a>
<a class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-white hover:bg-apricot/70 text-cocoa font-bold px-6 py-4 rounded-2xl border-2 border-plum shadow-[0_4px_0_0_#9B5572] text-sm sm:text-base transition-transform active:translate-y-0.5" href="#menu-mingguan">
              Lihat Kalender 7 Hari
              <span class="bg-peach text-cocoa text-xs font-extrabold px-2 py-0.5 rounded-full">28 Menu</span>
</a>
</div>
</div>
<!-- Kinetic Family Dining Table Stage -->
<div class="lg:col-span-6 relative flex items-center justify-center py-6">
<div class="relative w-[330px] h-[330px] sm:w-[450px] sm:h-[450px] flex items-center justify-center">
<div class="absolute inset-3 bg-gradient-to-tr from-peach/70 via-apricot to-coral/35 animate-blob-breathe border-2 border-plum/15"></div>
<svg class="absolute inset-0 w-full h-full animate-orbit pointer-events-none" viewbox="0 0 420 420">
<circle cx="210" cy="210" fill="none" opacity="0.45" r="196" stroke="#9B5572" stroke-dasharray="10 10" stroke-width="2"></circle>
<circle cx="210" cy="14" fill="#F28C78" r="8"></circle>
<circle cx="406" cy="210" fill="#9B5572" r="8"></circle>
<circle cx="210" cy="406" fill="#FFB59E" r="8"></circle>
<circle cx="14" cy="210" fill="#F28C78" r="8"></circle>
</svg>
<svg class="absolute inset-8 w-[calc(100%-4rem)] h-[calc(100%-4rem)] animate-orbit-counter pointer-events-none" viewbox="0 0 340 340">
<circle cx="170" cy="170" fill="none" r="158" stroke="#F28C78" stroke-dasharray="28 14 6 14" stroke-width="2.5"></circle>
</svg>
<div class="relative w-60 h-60 sm:w-76 sm:h-76 rounded-full p-2.5 bg-white border-4 border-plum shadow-2xl z-10 overflow-hidden group">
<img alt="Foto Hidangan Keluarga SodaTable" class="w-full h-full object-cover rounded-full transition-transform duration-700 group-hover:scale-110" id="hero-dining-img" onerror="this.src='https://placehold.co/650x650/FFD9C7/3E2731?text=SodaTable+Family+Dinner'" src="https://images.unsplash.com/photo-1547592180-85f173990554?auto=format&amp;fit=crop&amp;w=900&amp;q=85"/>
<div class="absolute bottom-4 inset-x-0 flex justify-center px-3">
<span class="bg-plum/95 backdrop-blur-md text-cream text-[11px] font-bold px-3.5 py-1 rounded-full border border-peach text-center shadow" id="hero-table-banner">
                  Makan Malam Keluarga • Ayam Madu &amp; Sup Jagung
                </span>
</div>
</div>
<div class="absolute -top-2 left-0 sm:left-2 z-20 bg-white px-3.5 py-2.5 rounded-2xl border-2 border-plum shadow-md animate-float-warm">
<div class="flex items-center gap-2.5">
<span class="w-9 h-9 rounded-xl bg-apricot text-cocoa font-bold text-base flex items-center justify-center">🧒</span>
<div>
<p class="text-[10px] font-extrabold text-plum uppercase">Menu Anak</p>
<p class="font-bold text-xs text-cocoa" id="hero-kid-dish">Chicken Katsu Mild</p>
</div>
</div>
</div>
<div class="absolute top-10 -right-2 sm:-right-3 z-20 bg-apricot px-3.5 py-2.5 rounded-2xl border-2 border-plum shadow-md animate-float-reverse">
<div class="flex items-center gap-2.5">
<span class="w-9 h-9 rounded-xl bg-plum text-cream font-bold text-base flex items-center justify-center">🍲</span>
<div>
<p class="text-[10px] font-extrabold text-plum uppercase">Wadah Keluarga</p>
<p class="font-bold text-xs text-cocoa" id="hero-sharing-dish">4 Porsi Lauk + Sayur</p>
</div>
</div>
</div>
<div class="absolute bottom-8 -left-2 sm:left-0 z-20 bg-white px-3.5 py-2.5 rounded-2xl border-2 border-plum shadow-md animate-float-reverse">
<div class="flex items-center gap-2.5">
<span class="w-9 h-9 rounded-xl bg-coral text-white font-bold text-base flex items-center justify-center">⏱️</span>
<div>
<p class="text-[10px] font-extrabold text-cocoa-soft uppercase">Waktu Hemat</p>
<p class="font-bold text-xs text-cocoa">9.5 Jam / Minggu</p>
</div>
</div>
</div>
<div class="absolute -bottom-5 right-0 sm:right-2 z-20 bg-plum text-cream p-1.5 rounded-2xl border-2 border-peach shadow-lg flex items-center gap-1">
<button class="hero-moment-btn bg-coral text-white text-[11px] font-bold px-2.5 py-1.5 rounded-xl transition-all" id="hero-moment-0" onclick="switchHeroMoment(0)" type="button">Dinner</button>
<button class="hero-moment-btn hover:bg-white/15 text-apricot text-[11px] font-bold px-2.5 py-1.5 rounded-xl transition-all" id="hero-moment-1" onclick="switchHeroMoment(1)" type="button">Bekal Anak</button>
<button class="hero-moment-btn hover:bg-white/15 text-apricot text-[11px] font-bold px-2.5 py-1.5 rounded-xl transition-all" id="hero-moment-2" onclick="switchHeroMoment(2)" type="button">Weekend</button>
</div>
</div>
</div>
</div>
</div>
<div class="mt-14 bg-plum text-cream py-3 border-y-2 border-plum overflow-hidden">
<div class="animate-marquee flex items-center gap-8 text-xs font-bold tracking-wider uppercase">
<span>🏡 ROTASI MENU BARU SETIAP MINGGU</span>
<span class="text-peach">●</span>
<span>KOLEKSI MENU RAMAH ANAK &amp; INFORMASI ALERGEN LENGKAP</span>
<span class="text-coral">●</span>
<span>PILIHAN PORSI INDIVIDU &amp; WADAH SHARING KELUARGA</span>
<span class="text-peach">●</span>
<span>FLEKSIBEL TUKAR MENU, LEWATI JADWAL, ATAU JEDA LANGGANAN</span>
<span class="text-coral">●</span>
<span>🏡 ROTASI MENU BARU SETIAP MINGGU</span>
<span class="text-peach">●</span>
<span>KOLEKSI MENU RAMAH ANAK &amp; INFORMASI ALERGEN LENGKAP</span>
<span class="text-coral">●</span>
<span>PILIHAN PORSI INDIVIDU &amp; WADAH SHARING KELUARGA</span>
<span class="text-peach">●</span>
<span>FLEKSIBEL TUKAR MENU, LEWATI JADWAL, ATAU JEDA LANGGANAN</span>
<span class="text-coral">●</span>
</div>
</div>
</section>
<!-- ==================== 4. PENGENALAN LAYANAN ==================== -->
<section class="py-16 lg:py-22 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto reveal-on-scroll relative z-10" id="pengenalan-layanan">
<div class="grid lg:grid-cols-12 gap-8 items-center bg-white rounded-3xl p-6 sm:p-10 border-2 border-plum shadow-[0_6px_0_0_#9B5572]">
<div class="lg:col-span-5">
<div class="relative rounded-3xl overflow-hidden border-2 border-plum">
<img alt="Layanan Katering Keluarga SodaTable" class="w-full h-64 sm:h-72 object-cover" onerror="this.src='https://placehold.co/600x450/FFD9C7/3E2731?text=SodaTable+Family+Service'" src="https://images.unsplash.com/photo-1556910103-1c02745aae4d?auto=format&amp;fit=crop&amp;w=800&amp;q=85"/>
<span class="absolute bottom-3 left-3 bg-plum/95 text-cream text-xs font-bold px-3.5 py-1.5 rounded-full border border-peach">100% Halal • Tanpa MSG &amp; Pengawet</span>
</div>
</div>
<div class="lg:col-span-7 space-y-4">
<span class="inline-block bg-apricot text-plum font-extrabold text-xs uppercase tracking-widest px-4 py-1.5 rounded-full">4. Pengenalan Layanan</span>
<h2 class="font-display font-extrabold text-2xl sm:text-4xl text-cocoa">Penyedia Makanan Keluarga Berbasis Langganan Mingguan</h2>
<p class="text-sm text-cocoa-soft leading-relaxed">
<strong>SodaTable Family Kitchen</strong> hadir membantu orang tua menyajikan hidangan rumahan segar setiap hari tanpa perlu repot merencanakan menu, berbelanja ke pasar, atau mencuci banyak peralatan dapur. Setiap paket disesuaikan dengan jumlah anggota keluarga, kebutuhan porsi dewasa maupun anak-anak, serta jadwal pengiriman rumah Anda.
        </p>
<div class="grid sm:grid-cols-3 gap-3 pt-2">
<div class="bg-cream p-3.5 rounded-2xl border border-plum/20">
<strong class="font-display text-sm text-plum block">Masak Segar Harian</strong>
<span class="text-[11px] text-cocoa-soft">Dimasak pagi hari sebelum diantar hangat ke rumah Anda.</span>
</div>
<div class="bg-cream p-3.5 rounded-2xl border border-plum/20">
<strong class="font-display text-sm text-plum block">Ramah Anak &amp; Lansia</strong>
<span class="text-[11px] text-cocoa-soft">Sambal &amp; bumbu pedas selalu dipisah dalam wadah tersendiri.</span>
</div>
<div class="bg-cream p-3.5 rounded-2xl border border-plum/20">
<strong class="font-display text-sm text-plum block">Kontrol Penuh</strong>
<span class="text-[11px] text-cocoa-soft">Bebas tukar menu, ubah alamat, atau jeda saat liburan.</span>
</div>
</div>
</div>
</div>
</section>
<!-- ==================== 5, 8, 9, 12, 18, 19, 20, 21. PAKET KELUARGA, PEMILIHAN ANGGOTA, KALKULATOR PORSI & ANGGARAN ==================== -->
<section class="py-16 lg:py-24 bg-white border-y-2 border-plum/15 px-4 sm:px-6 lg:px-8 reveal-on-scroll relative z-10 overflow-hidden" id="paket-keluarga">
<div class="absolute -right-20 -bottom-20 w-72 h-72 rounded-full border-2 border-dashed border-coral/35 animate-orbit pointer-events-none"></div>
<div class="max-w-7xl mx-auto space-y-14">
<div class="text-center max-w-3xl mx-auto">
<span class="inline-block bg-peach/60 text-plum font-extrabold text-xs uppercase tracking-widest px-4 py-1.5 rounded-full mb-3">5 • 8 • 9 • 12 • 18–21 • Paket &amp; Kalkulator Keluarga</span>
<h2 class="font-display font-extrabold text-3xl sm:text-4xl text-cocoa">Atur Anggota Keluarga, Kalkulator Porsi &amp; Perencana Anggaran</h2>
</div>
<!-- 8. Paket Langganan Keluarga (Berdasarkan Jumlah Anggota & Kebutuhan Porsi) -->
<div class="grid md:grid-cols-3 gap-6">
<div class="bg-cream rounded-3xl p-6 border-2 border-plum/25 flex flex-col justify-between">
<div>
<span class="text-[11px] font-extrabold uppercase bg-white px-3 py-1 rounded-full text-cocoa-soft">Paket Pasangan (2 Orang)</span>
<h3 class="font-display font-bold text-xl text-cocoa mt-3">Cozy Duo Plan</h3>
<p class="font-mono font-bold text-2xl text-plum mt-1">Rp 35.000<span class="text-xs font-sans font-normal text-cocoa-soft"> / porsi</span></p>
<ul class="mt-4 space-y-2 text-xs text-cocoa-soft">
<li>✔ Cocok untuk 2 anggota keluarga (20 porsi/minggu)</li>
<li>✔ Pilihan 2 lauk utama + sayur + nasi setiap hari</li>
<li>✔ Bebas pilih wadah individu atau sharing</li>
</ul>
</div>
<button class="mt-5 w-full bg-white hover:bg-apricot text-cocoa font-bold py-2.5 rounded-xl border-2 border-plum text-xs" onclick="selectFamilySize(2); openCheckoutModal()" type="button">Pilih Paket 2 Orang</button>
</div>
<div class="bg-apricot/75 rounded-3xl p-6 border-2 border-plum shadow-[0_6px_0_0_#9B5572] flex flex-col justify-between relative">
<span class="absolute -top-3 right-4 bg-coral text-white text-[10px] font-extrabold px-3 py-1 rounded-full border border-plum">Paling Favorit</span>
<div>
<span class="text-[11px] font-extrabold uppercase bg-white px-3 py-1 rounded-full text-plum">Paket Keluarga Ideal (4 Orang)</span>
<h3 class="font-display font-bold text-xl text-cocoa mt-3">Warm Home 4 Plan</h3>
<p class="font-mono font-bold text-2xl text-plum mt-1">Rp 32.000<span class="text-xs font-sans font-normal text-cocoa-soft"> / porsi</span></p>
<ul class="mt-4 space-y-2 text-xs text-cocoa">
<li>✔ Ideal untuk 2 Dewasa + 2 Anak (40 porsi/minggu)</li>
<li>✔ Gratis 2x Camilan Sore Anak setiap minggu</li>
<li>✔ Termasuk opsi menu ramah anak &amp; sambal terpisah</li>
</ul>
</div>
<button class="btn-shimmer mt-5 w-full bg-coral text-white font-extrabold py-2.5 rounded-xl border-2 border-plum text-xs" onclick="selectFamilySize(4); openCheckoutModal()" type="button">Pilih Paket 4 Orang</button>
</div>
<div class="bg-cream rounded-3xl p-6 border-2 border-plum/25 flex flex-col justify-between">
<div>
<span class="text-[11px] font-extrabold uppercase bg-white px-3 py-1 rounded-full text-cocoa-soft">Paket Keluarga Besar (6 Orang)</span>
<h3 class="font-display font-bold text-xl text-cocoa mt-3">Big Feast 6 Plan</h3>
<p class="font-mono font-bold text-2xl text-plum mt-1">Rp 29.500<span class="text-xs font-sans font-normal text-cocoa-soft"> / porsi</span></p>
<ul class="mt-4 space-y-2 text-xs text-cocoa-soft">
<li>✔ Untuk rumah multi-generasi (60 porsi/minggu)</li>
<li>✔ Wadah loyang keluarga besar (Family Sharing Tray)</li>
<li>✔ Prioritas pengiriman &amp; gratis buah potong mingguan</li>
</ul>
</div>
<button class="mt-5 w-full bg-white hover:bg-apricot text-cocoa font-bold py-2.5 rounded-xl border-2 border-plum text-xs" onclick="selectFamilySize(6); openCheckoutModal()" type="button">Pilih Paket 6 Orang</button>
</div>
</div>
<!-- Interactive Calculator Grid -->
<div class="grid lg:grid-cols-12 gap-8 items-start">
<div class="lg:col-span-7 bg-cream rounded-3xl p-6 sm:p-8 border-2 border-plum shadow-md space-y-6">
<!-- 5. Pemilihan Jumlah Anggota Keluarga -->
<div>
<label class="block text-xs font-extrabold uppercase tracking-wider text-plum mb-2.5">5. Pemilihan Jumlah Anggota Keluarga (2–6+ Orang)</label>
<div class="grid grid-cols-3 sm:grid-cols-6 gap-2.5">
<button class="fsize-card p-3 rounded-2xl border-2 border-plum/25 bg-white text-center transition-all" data-fsize="2" onclick="selectFamilySize(2)" type="button">
<span class="block font-mono font-bold text-base text-cocoa">2</span>
<span class="text-[10px] font-bold text-cocoa-soft">2 Orang</span>
</button>
<button class="fsize-card p-3 rounded-2xl border-2 border-plum/25 bg-white text-center transition-all" data-fsize="3" onclick="selectFamilySize(3)" type="button">
<span class="block font-mono font-bold text-base text-cocoa">3</span>
<span class="text-[10px] font-bold text-cocoa-soft">3 Orang</span>
</button>
<button class="fsize-card p-3 rounded-2xl border-2 border-plum bg-coral text-white text-center shadow-[0_3px_0_0_#9B5572] transition-all" data-fsize="4" onclick="selectFamilySize(4)" type="button">
<span class="block font-mono font-bold text-base">4</span>
<span class="text-[10px] font-bold text-cream">4 Orang</span>
</button>
<button class="fsize-card p-3 rounded-2xl border-2 border-plum/25 bg-white text-center transition-all" data-fsize="5" onclick="selectFamilySize(5)" type="button">
<span class="block font-mono font-bold text-base text-cocoa">5</span>
<span class="text-[10px] font-bold text-cocoa-soft">5 Orang</span>
</button>
<button class="fsize-card p-3 rounded-2xl border-2 border-plum/25 bg-white text-center transition-all" data-fsize="6" onclick="selectFamilySize(6)" type="button">
<span class="block font-mono font-bold text-base text-cocoa">6</span>
<span class="text-[10px] font-bold text-cocoa-soft">6 Orang</span>
</button>
<button class="fsize-card p-3 rounded-2xl border-2 border-plum/25 bg-white text-center transition-all" data-fsize="8" onclick="selectFamilySize(8)" type="button">
<span class="block font-mono font-bold text-base text-cocoa">6+</span>
<span class="text-[10px] font-bold text-cocoa-soft">6+ Orang</span>
</button>
</div>
</div>
<!-- 9. Kalkulator Jumlah Porsi (Dewasa & Anak) -->
<div class="grid sm:grid-cols-2 gap-4 bg-white p-4 rounded-2xl border border-plum/15">
<div>
<div class="flex justify-between text-xs font-bold text-cocoa mb-1">
<span>🧑 Porsi Dewasa:</span>
<strong class="font-mono text-plum" id="adult-count-label">2 Porsi</strong>
</div>
<input class="w-full accent-plum" id="adult-slider" max="8" min="1" oninput="recalcFamilyPlan()" type="range" value="2"/>
</div>
<div>
<div class="flex justify-between text-xs font-bold text-cocoa mb-1">
<span>🧒 Porsi Anak (Ramah Anak):</span>
<strong class="font-mono text-coral-dark" id="kid-count-label">2 Porsi</strong>
</div>
<input class="w-full accent-coral" id="kid-slider" max="6" min="0" oninput="recalcFamilyPlan()" type="range" value="2"/>
</div>
</div>
<!-- 12. Pilihan Porsi Individu dan Keluarga -->
<div>
<label class="block text-xs font-extrabold uppercase tracking-wider text-plum mb-2">12. Pilihan Porsi Individu atau Wadah Keluarga</label>
<div class="grid sm:grid-cols-2 gap-3">
<button class="p-4 rounded-2xl border-2 border-plum bg-apricot/70 text-left shadow-sm transition-all" id="style-btn-sharing" onclick="setServingStyle('sharing')" type="button">
<span class="font-display font-bold text-sm text-cocoa block">🥘 Wadah Besar Keluarga (Sharing Tray)</span>
<span class="text-[11px] text-cocoa-soft">Disajikan dalam loyang/rantang hangat untuk disantap bersama di meja makan.</span>
</button>
<button class="p-4 rounded-2xl border-2 border-plum/25 bg-white text-left hover:bg-apricot/30 transition-all" id="style-btn-individual" onclick="setServingStyle('individual')" type="button">
<span class="font-display font-bold text-sm text-cocoa block">🍱 Porsi Per Orang (Individual Box)</span>
<span class="text-[11px] text-cocoa-soft">Dikemas rapi per anggota keluarga—praktis untuk makan siang &amp; bekal.</span>
</button>
</div>
</div>
<!-- 20 & 21. Perencana Anggaran Mingguan & Durasi Langganan (Mingguan / Bulanan) -->
<div class="grid sm:grid-cols-2 gap-4">
<div>
<label class="block text-xs font-extrabold uppercase text-plum mb-1.5">Frekuensi Makan Harian</label>
<select class="w-full p-3 rounded-2xl border-2 border-plum/25 bg-white text-xs font-bold text-cocoa" id="family-meal-times" onchange="recalcFamilyPlan()">
<option value="1">1x Sehari (Makan Malam Keluarga)</option>
<option selected="" value="2">2x Sehari (Makan Siang + Malam)</option>
<option value="3">3x Sehari (Sarapan + Siang + Malam + Camilan)</option>
</select>
</div>
<div>
<label class="block text-xs font-extrabold uppercase text-plum mb-1.5">21. Durasi Langganan (Mingguan / Bulanan)</label>
<select class="w-full p-3 rounded-2xl border-2 border-plum/25 bg-white text-xs font-bold text-cocoa" id="family-duration-weeks" onchange="recalcFamilyPlan()">
<option value="1">Langganan Mingguan (1 Minggu / 5 Hari)</option>
<option selected="" value="2">Langganan 2 Mingguan (Hemat 8%)</option>
<option value="4">Langganan Bulanan (4 Minggu — Hemat 15%)</option>
</select>
</div>
</div>
<!-- 20. Target Anggaran Mingguan -->
<div class="bg-white p-4 rounded-2xl border border-plum/15 space-y-2">
<div class="flex justify-between items-center text-xs font-bold">
<span class="text-plum">20. Target Anggaran Makan Mingguan Keluarga Anda:</span>
<strong class="font-mono text-cocoa" id="target-budget-label">Rp 1.500.000 / minggu</strong>
</div>
<input class="w-full accent-plum" id="target-budget-slider" max="4000000" min="500000" oninput="recalcFamilyPlan()" step="100000" type="range" value="1500000"/>
<p class="text-[11px] font-bold text-plum" id="target-budget-status">✓ Estimasi paket saat ini masuk dalam batas anggaran mingguan keluarga Anda.</p>
</div>
</div>
<!-- 9, 18, 19. Hasil Kalkulator Porsi, Harga per Porsi & Anggaran Mingguan/Bulanan -->
<div class="lg:col-span-5 bg-plum text-cream rounded-3xl p-6 sm:p-8 border-2 border-plum shadow-xl space-y-5">
<div class="flex items-center justify-between">
<span class="bg-peach text-cocoa text-xs font-extrabold px-3.5 py-1 rounded-full uppercase">18 &amp; 19. Kalkulator Anggaran</span>
<span class="font-mono text-xs font-bold text-apricot" id="plan-total-portions-badge">80 Porsi Total</span>
</div>
<div class="bg-white/10 p-4 rounded-2xl border border-white/15 space-y-1.5">
<p class="text-xs text-apricot">19. Perhitungan Harga per Porsi Anggota Keluarga</p>
<div class="flex items-baseline gap-2">
<span class="font-mono font-bold text-3xl sm:text-4xl text-white" id="plan-per-serving">Rp 32.000</span>
<span class="text-xs text-peach">/ anggota / makan</span>
</div>
</div>
<!-- Safe container for weekly total summary -->
<div class="text-xs text-apricot font-medium" id="plan-weekly-total"></div>
<div class="grid grid-cols-2 gap-3 text-xs">
<div class="bg-white/10 p-3.5 rounded-2xl">
<span class="text-apricot/80 block text-[11px]">Estimasi Per Minggu</span>
<strong class="font-mono text-base text-white" id="plan-weekly-est">Rp 1.280.000</strong>
</div>
<div class="bg-white/10 p-3.5 rounded-2xl">
<span class="text-apricot/80 block text-[11px]">Estimasi Per Bulan (4 Mgg)</span>
<strong class="font-mono text-base text-[#FFE28A]" id="plan-monthly-est">Rp 5.120.000</strong>
</div>
</div>
<div class="grid grid-cols-2 gap-3 text-xs">
<div class="bg-white/10 p-3 rounded-2xl">
<span class="text-apricot/80 block text-[11px]">Format Kemasan</span>
<strong class="text-white" id="plan-format-summary">Wadah Besar Keluarga</strong>
</div>
<div class="bg-white/10 p-3 rounded-2xl">
<span class="text-apricot/80 block text-[11px]">Komposisi Porsi</span>
<strong class="text-white" id="plan-breakdown-summary">2 Dewasa + 2 Anak</strong>
</div>
</div>
<button class="btn-shimmer w-full bg-coral hover:bg-coral-dark text-white font-extrabold py-4 rounded-2xl border-2 border-cream text-sm" onclick="openCheckoutModal()" type="button">
            Lanjut ke Ringkasan Pesanan →
          </button>
</div>
</div>
</div>
</section>
<!-- Hidden reference spans to prevent null property assignment in recalcFamilyPlan -->
<div class="hidden">
<span id="budget-family-label"></span>
<span id="grocery-cost-val"></span>
<span id="delivery-app-val"></span>
<span id="sodatable-cost-val"></span>
<span id="budget-savings-val"></span>
</div>
<!-- ==================== 6, 7, 13. KALENDER MENU KELUARGA, KATEGORI WAKTU MAKAN & ROTASI MINGGUAN ==================== -->
<section class="py-16 lg:py-24 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto reveal-on-scroll relative z-10" id="menu-mingguan">
<div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-8">
<div>
<span class="inline-block bg-apricot text-plum font-extrabold text-xs uppercase tracking-widest px-4 py-1.5 rounded-full mb-3">6 • 7 • 13 • Kalender &amp; Rotasi Menu 7 Hari</span>
<h2 class="font-display font-extrabold text-3xl sm:text-4xl text-cocoa">Kalender Menu Keluarga Senin – Minggu</h2>
</div>
<!-- 13. Rotasi Menu Mingguan -->
<div class="bg-white p-1.5 rounded-2xl border-2 border-plum flex items-center gap-1">
<button class="week-rot-btn bg-plum text-cream text-xs font-bold px-3.5 py-2 rounded-xl" id="week-rot-1" onclick="switchWeekRotation(1)" type="button">Rotasi Pekan 1</button>
<button class="week-rot-btn text-cocoa hover:bg-apricot/60 text-xs font-bold px-3.5 py-2 rounded-xl" id="week-rot-2" onclick="switchWeekRotation(2)" type="button">Rotasi Pekan 2</button>
</div>
</div>
<div class="grid grid-cols-7 gap-1.5 sm:gap-2.5 mb-6" id="calendar-day-tabs"></div>
<!-- 7. Kategori Waktu Makan: Sarapan, Makan Siang, Makan Malam, dan Camilan Keluarga -->
<div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5" id="calendar-day-meals"></div>
</section>
<!-- ==================== 10, 11, 14, 15, 16, 17. KUSTOMISASI PAKET, KOLEKSI RAMAH ANAK, KATEGORI MASAKAN, PREFERENSI, ALERGI & KANDUNGAN ==================== -->
<section class="py-16 lg:py-24 bg-apricot/35 border-y-2 border-plum/15 px-4 sm:px-6 lg:px-8 reveal-on-scroll relative z-10" id="eksplorasi-menu">
<div class="max-w-7xl mx-auto space-y-12">
<div>
<div class="text-center max-w-3xl mx-auto mb-8">
<span class="inline-block bg-white text-plum font-extrabold text-xs uppercase tracking-widest px-4 py-1.5 rounded-full border border-plum/20 mb-3">11 • 14 • 15 • 16 • 17 • Koleksi Menu Keluarga &amp; Ramah Anak</span>
<h2 class="font-display font-extrabold text-3xl sm:text-4xl text-cocoa">Kategori Masakan, Preferensi Keluarga &amp; Info Alergen</h2>
</div>
<!-- 14. Kategori Masakan: Indonesia, Asia, Western, Tradisional, Internasional -->
<div class="flex flex-wrap justify-center gap-2 mb-6">
<button class="cuisine-btn px-4 py-2 rounded-full text-xs font-bold border-2 border-plum bg-plum text-cream" data-cuisine="all" onclick="filterCuisine('all')" type="button">Semua Masakan</button>
<button class="cuisine-btn px-4 py-2 rounded-full text-xs font-bold border-2 border-plum bg-white text-cocoa hover:bg-peach/50" data-cuisine="Indonesian" onclick="filterCuisine('Indonesian')" type="button">🇮🇩 Indonesia</button>
<button class="cuisine-btn px-4 py-2 rounded-full text-xs font-bold border-2 border-plum bg-white text-cocoa hover:bg-peach/50" data-cuisine="Asian" onclick="filterCuisine('Asian')" type="button">🥢 Asia</button>
<button class="cuisine-btn px-4 py-2 rounded-full text-xs font-bold border-2 border-plum bg-white text-cocoa hover:bg-peach/50" data-cuisine="Western" onclick="filterCuisine('Western')" type="button">🍝 Western</button>
<button class="cuisine-btn px-4 py-2 rounded-full text-xs font-bold border-2 border-plum bg-white text-cocoa hover:bg-peach/50" data-cuisine="Traditional" onclick="filterCuisine('Traditional')" type="button">🍲 Tradisional</button>
<button class="cuisine-btn px-4 py-2 rounded-full text-xs font-bold border-2 border-plum bg-white text-cocoa hover:bg-peach/50" data-cuisine="International" onclick="filterCuisine('International')" type="button">🌍 Internasional</button>
</div>
<!-- 15. Preferensi Makanan Keluarga & 16. Informasi Alergi dan Pantangan -->
<div class="bg-white p-4 rounded-3xl border-2 border-plum/20 mb-8 flex flex-wrap items-center justify-between gap-3">
<div class="flex flex-wrap items-center gap-2">
<span class="text-xs font-extrabold uppercase text-plum mr-1">15. Preferensi &amp; Pantangan:</span>
<button class="ftag-btn px-3 py-1.5 rounded-xl text-xs font-bold bg-cream border border-plum/25 text-cocoa" id="tag-kidFriendly" onclick="toggleFamilyTag('kidFriendly')" type="button">🧒 Koleksi Ramah Anak</button>
<button class="ftag-btn px-3 py-1.5 rounded-xl text-xs font-bold bg-cream border border-plum/25 text-cocoa" id="tag-pickyEater" onclick="toggleFamilyTag('pickyEater')" type="button">⭐ Favorit Picky Eater</button>
<button class="ftag-btn px-3 py-1.5 rounded-xl text-xs font-bold bg-cream border border-plum/25 text-cocoa" id="tag-noSpicy" onclick="toggleFamilyTag('noSpicy')" type="button">🌿 Tidak Pedas</button>
<button class="ftag-btn px-3 py-1.5 rounded-xl text-xs font-bold bg-cream border border-plum/25 text-cocoa" id="tag-nutFree" onclick="toggleFamilyTag('nutFree')" type="button">🥜 Bebas Kacang</button>
</div>
<span class="text-xs font-bold text-cocoa-soft" id="cuisine-result-count">Menampilkan 8 Hidangan Keluarga</span>
</div>
<div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6" id="family-dishes-grid"></div>
</div>
<!-- 10. Kustomisasi Paket Keluarga & 16. Informasi Alergi dan Alternatif -->
<div class="bg-white rounded-3xl p-6 sm:p-8 border-2 border-plum shadow-md grid lg:grid-cols-12 gap-8 items-start">
<div class="lg:col-span-7 space-y-4">
<span class="inline-block bg-peach text-cocoa font-extrabold text-xs uppercase px-3.5 py-1 rounded-full">10. Kustomisasi Paket Keluarga</span>
<h3 class="font-display font-extrabold text-2xl text-cocoa">Pilih Kombinasi Menu untuk Seluruh Anggota Keluarga</h3>
<div class="grid sm:grid-cols-2 gap-4">
<div>
<label class="block text-xs font-bold text-plum mb-1">🍲 Lauk Utama Keluarga</label>
<select class="w-full p-3 rounded-2xl border-2 border-plum/20 bg-cream text-xs font-bold text-cocoa" id="box-main-dish" onchange="updateFamilyBoxSummary()"></select>
</div>
<div>
<label class="block text-xs font-bold text-plum mb-1">🧒 Menu Khusus Anak</label>
<select class="w-full p-3 rounded-2xl border-2 border-plum/20 bg-cream text-xs font-bold text-cocoa" id="box-kid-dish" onchange="updateFamilyBoxSummary()"></select>
</div>
<div>
<label class="block text-xs font-bold text-plum mb-1">🥬 Sayur &amp; Sup Pendamping</label>
<select class="w-full p-3 rounded-2xl border-2 border-plum/20 bg-cream text-xs font-bold text-cocoa" id="box-veggie-dish" onchange="updateFamilyBoxSummary()">
<option value="Sup Krim Jagung &amp; Ayam Kampung">Sup Krim Jagung &amp; Ayam Kampung</option>
<option value="Capcay Kuah Bening Sayur Organik">Capcay Kuah Bening Sayur Organik</option>
<option value="Tumis Brokoli Bawang Putih &amp; Tahu Sutra">Tumis Brokoli Bawang Putih &amp; Tahu Sutra</option>
<option value="Sayur Asem Jakarta Segar (Sambal Terpisah)">Sayur Asem Jakarta Segar (Sambal Terpisah)</option>
</select>
</div>
<div>
<label class="block text-xs font-bold text-plum mb-1">🧁 Camilan Sore Keluarga</label>
<select class="w-full p-3 rounded-2xl border-2 border-plum/20 bg-cream text-xs font-bold text-cocoa" id="box-snack-dish" onchange="updateFamilyBoxSummary()">
<option value="Puding Susu Mangga Chia (4 Cup)">Puding Susu Mangga Chia (4 Cup)</option>
<option value="Bolu Pisang Kukus Gula Aren">Bolu Pisang Kukus Gula Aren</option>
<option value="Pastel Panggang Isi Ayam &amp; Wortel">Pastel Panggang Isi Ayam &amp; Wortel</option>
<option value="Potongan Buah Segar Musiman">Potongan Buah Segar Musiman</option>
</select>
</div>
</div>
<div class="pt-3 border-t border-plum/10">
<span class="block text-xs font-extrabold uppercase text-plum mb-2">16. Pengecualian Alergen &amp; Pilihan Alternatif:</span>
<div class="flex flex-wrap gap-2 text-xs">
<label class="inline-flex items-center gap-1.5 bg-cream px-3 py-1.5 rounded-xl border border-plum/20">
<input checked="" class="accent-plum" type="checkbox"/> Pisahkan Sambal/Cabai
              </label>
<label class="inline-flex items-center gap-1.5 bg-cream px-3 py-1.5 rounded-xl border border-plum/20">
<input class="accent-plum" type="checkbox"/> Bebas Kacang (Ganti Biji Labu)
              </label>
<label class="inline-flex items-center gap-1.5 bg-cream px-3 py-1.5 rounded-xl border border-plum/20">
<input class="accent-plum" type="checkbox"/> Bebas Seafood (Ganti Ayam/Daging)
              </label>
<label class="inline-flex items-center gap-1.5 bg-cream px-3 py-1.5 rounded-xl border border-plum/20">
<input class="accent-plum" type="checkbox"/> Bebas Susu Sapi (Ganti Oat/Kedelai)
              </label>
</div>
</div>
</div>
<div class="lg:col-span-5 bg-apricot/65 rounded-3xl p-6 border-2 border-plum space-y-4">
<div class="flex items-center justify-between">
<h4 class="font-display font-bold text-lg text-cocoa">Kombinasi Pilihan Keluarga</h4>
<span class="bg-plum text-cream text-[11px] font-bold px-3 py-1 rounded-full">Tersimpan</span>
</div>
<div class="space-y-2.5 text-xs" id="family-box-preview-list"></div>
<button class="btn-shimmer w-full bg-coral hover:bg-coral-dark text-white font-extrabold py-3.5 rounded-2xl border-2 border-plum text-xs sm:text-sm" onclick="openCheckoutModal()" type="button">
            Simpan Kombinasi ke Pesanan ✓
          </button>
</div>
</div>
</div>
</section>
<!-- ==================== 22, 23, 29, 30. CARA BERLANGGANAN, JADWAL, ALAMAT, DASHBOARD & PENGATURAN LANGGANAN ==================== -->
<section class="py-16 lg:py-24 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto reveal-on-scroll relative z-10 space-y-12" id="cara-berlangganan">
<div class="text-center max-w-3xl mx-auto">
<span class="inline-block bg-apricot text-plum font-extrabold text-xs uppercase tracking-widest px-4 py-1.5 rounded-full mb-3">22 • 23 • 29 • 30 • Cara Berlangganan &amp; Dashboard Keluarga</span>
<h2 class="font-display font-extrabold text-3xl sm:text-4xl text-cocoa">Atur Jadwal Pengiriman, Alamat Ganda &amp; Kelola Langganan</h2>
</div>
<!-- 22. Pengaturan Jadwal Pengiriman & 23. Pengelolaan Alamat Pengiriman -->
<div class="grid lg:grid-cols-12 gap-6">
<div class="lg:col-span-5 bg-white rounded-3xl p-6 border-2 border-plum shadow-sm space-y-4">
<span class="bg-peach text-cocoa text-[11px] font-extrabold uppercase px-3 py-1 rounded-full">22. Pengaturan Jadwal Pengiriman</span>
<h3 class="font-display font-bold text-xl text-cocoa">Pilih Tanggal Mulai &amp; Slot Jam Antar</h3>
<div class="space-y-3 text-xs">
<div>
<label class="block font-bold text-plum mb-1">Tanggal Mulai Pengiriman Pertama</label>
<input class="w-full p-3 rounded-2xl border-2 border-plum/20 bg-cream font-bold text-cocoa" id="delivery-start-date" onchange="syncDeliveryInfo()" type="date"/>
</div>
<div>
<label class="block font-bold text-plum mb-1">Slot Jam Pengiriman Harian</label>
<select class="w-full p-3 rounded-2xl border-2 border-plum/20 bg-cream font-bold text-cocoa" id="delivery-time-slot" onchange="syncDeliveryInfo()">
<option value="10.30 WIB (Makan Siang) &amp; 16.30 WIB (Makan Malam)">10.30 WIB (Siang) &amp; 16.30 WIB (Malam)</option>
<option value="06.15 WIB (Bekal Pagi) &amp; 17.00 WIB (Makan Malam)">06.15 WIB (Bekal Pagi) &amp; 17.00 WIB (Malam)</option>
<option value="16.30 WIB (Paket Makan Malam Keluarga)">16.30 WIB (Makan Malam Keluarga Saja)</option>
</select>
</div>
</div>
</div>
<div class="lg:col-span-7 bg-white rounded-3xl p-6 border-2 border-plum shadow-sm space-y-4">
<span class="bg-apricot text-plum text-[11px] font-extrabold uppercase px-3 py-1 rounded-full">23. Pengelolaan Alamat Pengiriman</span>
<h3 class="font-display font-bold text-xl text-cocoa">Alamat Utama Rumah &amp; Alamat Alternatif (Kantor / Sekolah)</h3>
<div class="grid sm:grid-cols-2 gap-4 text-xs">
<div class="bg-cream p-4 rounded-2xl border-2 border-plum">
<div class="flex justify-between items-center mb-1.5">
<strong class="text-plum">🏡 Alamat Utama (Rumah)</strong>
<span class="bg-plum text-cream text-[10px] px-2 py-0.5 rounded-full">Aktif</span>
</div>
<p class="font-bold text-cocoa">Jl. Melati Indah No. 14, Bintaro Sektor 7</p>
<p class="text-cocoa-soft mt-1">Penerima: Ibu Maya • Pengiriman Makan Malam</p>
</div>
<div class="bg-cream p-4 rounded-2xl border border-plum/25">
<div class="flex justify-between items-center mb-1.5">
<strong class="text-coral-dark">🏢 Alamat Pilihan Kedua</strong>
<span class="bg-apricot text-cocoa text-[10px] px-2 py-0.5 rounded-full">Opsional</span>
</div>
<p class="font-bold text-cocoa">Menara Sudirman Lt. 12, Jakarta Selatan</p>
<p class="text-cocoa-soft mt-1">Khusus 2 Porsi Makan Siang Ayah &amp; Ibu</p>
</div>
</div>
</div>
</div>
<!-- 29. Dashboard Langganan Keluarga & 30. Pengaturan Langganan -->
<div class="bg-white rounded-3xl p-6 sm:p-8 border-2 border-plum shadow-lg grid lg:grid-cols-12 gap-8">
<div class="lg:col-span-7 space-y-4">
<div class="flex flex-wrap items-center justify-between gap-2 pb-3 border-b border-plum/10">
<div>
<span class="text-[11px] font-extrabold uppercase text-plum">29. Preview Dashboard Langganan Keluarga</span>
<h3 class="font-display font-bold text-xl text-cocoa">Paket Aktif: Warm Home 4 Plan (4 Anggota)</h3>
</div>
<span class="bg-coral/20 text-coral-dark text-xs font-extrabold px-3 py-1 rounded-full" id="fam-dash-status">● Aktif Minggu Ini</span>
</div>
<div class="grid sm:grid-cols-3 gap-3 text-xs">
<div class="bg-cream p-3.5 rounded-2xl border border-plum/15">
<span class="text-cocoa-soft block text-[11px]">Jadwal Pengiriman</span>
<strong class="text-cocoa">Senin – Jumat (16.30)</strong>
</div>
<div class="bg-cream p-3.5 rounded-2xl border border-plum/15">
<span class="text-cocoa-soft block text-[11px]">Sisa Kuota Pekan Ini</span>
<strong class="font-mono text-plum">24 / 40 Porsi</strong>
</div>
<div class="bg-cream p-3.5 rounded-2xl border border-plum/15">
<span class="text-cocoa-soft block text-[11px]">Riwayat Pesanan</span>
<strong class="text-cocoa">12 Pekan Terkirim ✓</strong>
</div>
</div>
</div>
<!-- 30. Pengaturan Langganan: Mengganti menu, melewati jadwal, menjeda, melanjutkan -->
<div class="lg:col-span-5 bg-cream rounded-2xl p-5 border-2 border-plum/20 space-y-3">
<span class="text-xs font-extrabold uppercase text-plum block">30. Pengaturan Langganan (H-1 Pukul 18.00)</span>
<div class="bg-white p-3.5 rounded-xl border border-plum/15 flex items-center justify-between gap-2">
<div>
<span class="text-[10px] text-cocoa-soft block">Menu Besok</span>
<strong class="text-xs text-cocoa" id="fam-tomorrow-menu">Ayam Bakar Madu &amp; Sayur Asem</strong>
</div>
<button class="bg-apricot hover:bg-peach text-cocoa font-bold text-xs px-3 py-1.5 rounded-xl border border-plum" onclick="swapFamilyTomorrowMenu()" type="button">🔄 Ganti Menu</button>
</div>
<div class="grid grid-cols-2 gap-2.5">
<button class="bg-white hover:bg-apricot text-cocoa font-bold text-xs py-2.5 rounded-xl border border-plum" id="fam-pause-btn" onclick="toggleFamilyPause()" type="button">⏸ Jeda Langganan</button>
<button class="bg-white hover:bg-apricot text-cocoa font-bold text-xs py-2.5 rounded-xl border border-plum" onclick="showToast('1 jadwal pengiriman dilewati (Skip). Kuota otomatis digeser!')" type="button">⏭ Lewati Jadwal</button>
</div>
</div>
</div>
</section>
<!-- ==================== 24, 25, 26, 27, 28, 31. TENTANG KAMI, ACARA, BEKAL SEKOLAH, PENYIMPANAN, GALERI DAPUR, ULASAN & KORPORAT ==================== -->
<section class="py-16 lg:py-24 bg-apricot/35 border-y-2 border-plum/15 px-4 sm:px-6 lg:px-8 reveal-on-scroll relative z-10 space-y-14" id="tentang-kami">
<div class="max-w-7xl mx-auto space-y-14">
<!-- 24. Paket Acara Keluarga & 25. Paket Makan Siang Anak Sekolah -->
<div>
<div class="text-center max-w-3xl mx-auto mb-8">
<span class="inline-block bg-white text-plum font-extrabold text-xs uppercase tracking-widest px-4 py-1.5 rounded-full border border-plum/20 mb-2">24 &amp; 25 • Paket Spesial Keluarga &amp; Bekal Sekolah</span>
<h2 class="font-display font-extrabold text-3xl sm:text-4xl text-cocoa">Momen Spesial Keluarga &amp; Bekal Sehat Si Kecil</h2>
</div>
<div class="grid md:grid-cols-2 gap-6">
<!-- 24. Paket Acara Keluarga -->
<div class="bg-white rounded-3xl overflow-hidden border-2 border-plum shadow-sm flex flex-col sm:flex-row">
<img alt="Paket Acara Keluarga" class="sm:w-48 h-48 sm:h-auto object-cover" onerror="this.src='https://placehold.co/400x400/FFB59E/3E2731?text=Paket+Acara+Keluarga'" src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&amp;fit=crop&amp;w=600&amp;q=80"/>
<div class="p-6 flex flex-col justify-between">
<div>
<span class="bg-coral text-white text-[10px] font-extrabold uppercase px-3 py-1 rounded-full">24. Paket Acara Keluarga</span>
<h3 class="font-display font-bold text-xl text-cocoa mt-2">Ulang Tahun, Pertemuan &amp; Akhir Pekan</h3>
<p class="text-xs text-cocoa-soft mt-1.5 leading-relaxed">Paket hidangan berbagi untuk syukuran rumah, ulang tahun anak, arisan keluarga, hingga pesta panggang akhir pekan (8–20 porsi).</p>
</div>
<button class="mt-4 bg-cream hover:bg-apricot text-cocoa font-bold text-xs py-2.5 px-4 rounded-xl border border-plum self-start" onclick="showToast('Paket Acara Keluarga ditambahkan ke catatan konsultasi!')" type="button">Pesan Paket Acara</button>
</div>
</div>
<!-- 25. Paket Makan Siang Anak Sekolah -->
<div class="bg-white rounded-3xl overflow-hidden border-2 border-plum shadow-sm flex flex-col sm:flex-row">
<img alt="Paket Makan Siang Anak Sekolah" class="sm:w-48 h-48 sm:h-auto object-cover" onerror="this.src='https://placehold.co/400x400/FFD9C7/3E2731?text=Bekal+Anak+Sekolah'" src="https://images.unsplash.com/photo-1512621776951-a57141f2eefd?auto=format&amp;fit=crop&amp;w=600&amp;q=80"/>
<div class="p-6 flex flex-col justify-between">
<div>
<span class="bg-apricot text-plum text-[10px] font-extrabold uppercase px-3 py-1 rounded-full">25. Paket Makan Siang Anak Sekolah</span>
<h3 class="font-display font-bold text-xl text-cocoa mt-2">Bento Bekal Sekolah Pagi (06.15 WIB)</h3>
<p class="text-xs text-cocoa-soft mt-1.5 leading-relaxed">Bekal makan siang anak sekolah dengan porsi seimbang, sayuran lembut mudah dikunyah, tanpa tulang/duri, dan kemasan anti-tumpah.</p>
</div>
<button class="mt-4 bg-cream hover:bg-apricot text-cocoa font-bold text-xs py-2.5 px-4 rounded-xl border border-plum self-start" onclick="showToast('Paket Bekal Anak Sekolah siap ditambahkan ke langganan!')" type="button">Tambah Bekal Anak</button>
</div>
</div>
</div>
</div>
<!-- 26. Panduan Penyimpanan Makanan & 27. Galeri Dapur dan Persiapan Makanan -->
<div class="bg-white rounded-3xl p-6 sm:p-8 border-2 border-plum grid lg:grid-cols-12 gap-8 items-center">
<div class="lg:col-span-6 space-y-4">
<span class="inline-block bg-apricot text-plum font-extrabold text-xs uppercase px-3.5 py-1 rounded-full">26. Panduan Penyimpanan &amp; Penyajian</span>
<h3 class="font-display font-extrabold text-2xl text-cocoa">Petunjuk Penyimpanan, Masa Konsumsi &amp; Cara Memanaskan</h3>
<div class="grid sm:grid-cols-3 gap-3 text-xs">
<div class="bg-cream p-3.5 rounded-2xl border border-plum/15">
<span class="text-xl block mb-1">❄️</span>
<strong class="text-cocoa block">Penyimpanan</strong>
<span class="text-cocoa-soft text-[11px]">Simpan di kulkas suhu 2–4°C segera jika belum disantap.</span>
</div>
<div class="bg-cream p-3.5 rounded-2xl border border-plum/15">
<span class="text-xl block mb-1">⏳</span>
<strong class="text-cocoa block">Masa Konsumsi</strong>
<span class="text-cocoa-soft text-[11px]">Terbaik dikonsumsi dalam 6 jam (suhu ruang) atau 48 jam (kulkas).</span>
</div>
<div class="bg-cream p-3.5 rounded-2xl border border-plum/15">
<span class="text-xl block mb-1">♨️</span>
<strong class="text-cocoa block">Cara Memanaskan</strong>
<span class="text-cocoa-soft text-[11px]">Microwave 2 menit atau kukus 4 menit agar tetap juicy.</span>
</div>
</div>
</div>
<div class="lg:col-span-6 space-y-2.5">
<span class="text-xs font-extrabold uppercase text-plum block">27. Galeri Dapur &amp; Persiapan Makanan Keluarga</span>
<div class="grid grid-cols-3 gap-3">
<img alt="Dapur Higienis" class="rounded-2xl h-32 w-full object-cover border-2 border-plum/20" onerror="this.src='https://placehold.co/300x300/FFD9C7/3E2731?text=Dapur+Higienis'" src="https://images.unsplash.com/photo-1556910103-1c02745aae4d?auto=format&amp;fit=crop&amp;w=500&amp;q=80"/>
<img alt="Bahan Segar" class="rounded-2xl h-32 w-full object-cover border-2 border-plum/20" onerror="this.src='https://placehold.co/300x300/FFB59E/3E2731?text=Bahan+Segar'" src="https://images.unsplash.com/photo-1547592180-85f173990554?auto=format&amp;fit=crop&amp;w=500&amp;q=80"/>
<img alt="Pengemasan Makanan" class="rounded-2xl h-32 w-full object-cover border-2 border-plum/20" onerror="this.src='https://placehold.co/300x300/F28C78/FFF4E9?text=Pengemasan'" src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?auto=format&amp;fit=crop&amp;w=500&amp;q=80"/>
</div>
</div>
</div>
<!-- 28. Cerita dan Ulasan Keluarga -->
<div>
<div class="text-center max-w-3xl mx-auto mb-8">
<span class="inline-block bg-white text-plum font-extrabold text-xs uppercase tracking-widest px-4 py-1.5 rounded-full border border-plum/20 mb-2">28. Cerita &amp; Ulasan Keluarga</span>
<h2 class="font-display font-extrabold text-3xl text-cocoa">Pengalaman Keluarga Bersama SodaTable</h2>
</div>
<div class="grid md:grid-cols-3 gap-6">
<div class="bg-white rounded-3xl p-6 border-2 border-plum shadow-sm">
<p class="text-xs text-cocoa-soft italic leading-relaxed mb-4">"Anak sulung saya picky eater, tapi Chicken Katsu Mild dan Sup Krim Jagung dari SodaTable selalu habis bersih! Saya jadi punya lebih banyak waktu mendampingi anak belajar."</p>
<div class="flex items-center gap-3 pt-3 border-t border-plum/10">
<img alt="Ibu Rina" class="w-10 h-10 rounded-full object-cover border border-plum" onerror="this.src='https://placehold.co/100x100/FFD9C7/3E2731?text=Rina'" src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?auto=format&amp;fit=crop&amp;w=200&amp;q=80"/>
<div>
<h4 class="font-bold text-xs text-cocoa">Ibu Rina &amp; Keluarga (4 Anggota)</h4>
<span class="text-[10px] font-bold text-plum">Langganan 7 Bulan • Jakarta Selatan</span>
</div>
</div>
</div>
<div class="bg-white rounded-3xl p-6 border-2 border-plum shadow-sm">
<p class="text-xs text-cocoa-soft italic leading-relaxed mb-4">"Fitur kirim 2 alamat sangat membantu. Makan siang suami diantar ke kantor Sudirman, sementara makan malam keluarga tiba hangat di rumah tepat pukul 16.30."</p>
<div class="flex items-center gap-3 pt-3 border-t border-plum/10">
<img alt="Ibu Dina" class="w-10 h-10 rounded-full object-cover border border-plum" onerror="this.src='https://placehold.co/100x100/FFB59E/3E2731?text=Dina'" src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&amp;fit=crop&amp;w=200&amp;q=80"/>
<div>
<h4 class="font-bold text-xs text-cocoa">Keluarga Bpk. Kevin &amp; Dina</h4>
<span class="text-[10px] font-bold text-plum">Langganan 5 Bulan • Tangerang Selatan</span>
</div>
</div>
</div>
<div class="bg-white rounded-3xl p-6 border-2 border-plum shadow-sm">
<p class="text-xs text-cocoa-soft italic leading-relaxed mb-4">"Anggaran makan keluarga jauh lebih terkontrol dibanding belanja harian yang sering tersisa. Rasanya gurih alami tanpa MSG, cocok juga untuk orang tua kami."</p>
<div class="flex items-center gap-3 pt-3 border-t border-plum/10">
<img alt="Bpk Arif" class="w-10 h-10 rounded-full object-cover border border-plum" onerror="this.src='https://placehold.co/100x100/F28C78/FFF4E9?text=Arif'" src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&amp;fit=crop&amp;w=200&amp;q=80"/>
<div>
<h4 class="font-bold text-xs text-cocoa">Bpk. Arif &amp; Orang Tua (5 Anggota)</h4>
<span class="text-[10px] font-bold text-plum">Langganan 9 Bulan • Bandung</span>
</div>
</div>
</div>
</div>
</div>
<!-- 31. Paket Kerja Sama Komunitas dan Perusahaan -->
<div class="bg-plum text-cream rounded-3xl p-7 sm:p-10 border-2 border-plum shadow-xl grid lg:grid-cols-12 gap-8 items-center">
<div class="lg:col-span-7 space-y-3">
<span class="inline-block bg-peach text-cocoa font-extrabold text-xs uppercase px-3.5 py-1 rounded-full">31. Paket Kerja Sama Komunitas &amp; Perusahaan</span>
<h3 class="font-display font-extrabold text-2xl sm:text-3xl text-white">Penawaran Paket Makanan Keluarga dalam Jumlah Besar</h3>
<p class="text-apricot text-xs sm:text-sm leading-relaxed">Program tunjangan makan malam keluarga untuk karyawan perusahaan, komunitas parenting, maupun acara besar dengan harga khusus grup dan pengiriman terjadwal.</p>
</div>
<div class="lg:col-span-5 bg-white text-cocoa p-5 rounded-2xl border-2 border-peach space-y-3">
<div class="flex justify-between text-xs font-bold">
<span>Jumlah Keluarga: <strong id="corp-fam-label">25 Keluarga</strong></span>
<span class="font-mono text-plum font-bold">Hemat Hingga 18%</span>
</div>
<input class="w-full accent-coral" max="150" min="10" oninput="document.getElementById('corp-fam-label').textContent = this.value + ' Keluarga'" step="5" type="range" value="25"/>
<button class="w-full bg-coral text-white font-extrabold py-2.5 rounded-xl border-2 border-plum text-xs" onclick="showToast('Penawaran Paket Kerja Sama Komunitas &amp; Perusahaan telah dikirim!')" type="button">
            Minta Penawaran Grup / Perusahaan
          </button>
</div>
</div>
</div>
</section>
<!-- ==================== 32. RINGKASAN DAN CHECKOUT PESANAN + 33. FAQ ==================== -->
<section class="py-16 lg:py-22 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto reveal-on-scroll relative z-10 space-y-14" id="ringkasan-pesanan">
<!-- 32. Ringkasan dan Checkout Pesanan (Inline Card + Modal) -->
<div class="bg-white rounded-3xl p-6 sm:p-8 border-2 border-plum shadow-lg grid lg:grid-cols-12 gap-8 items-center">
<div class="lg:col-span-7 space-y-3">
<span class="inline-block bg-apricot text-plum font-extrabold text-xs uppercase px-3.5 py-1 rounded-full">32. Ringkasan &amp; Checkout Pesanan</span>
<h3 class="font-display font-extrabold text-2xl sm:text-3xl text-cocoa">Rincian Porsi, Menu Pilihan, Jadwal &amp; Alamat</h3>
<div class="grid sm:grid-cols-2 gap-3 text-xs pt-2">
<div class="bg-cream p-3.5 rounded-2xl border border-plum/15">
<span class="text-cocoa-soft block">Jumlah Porsi &amp; Paket</span>
<strong class="text-cocoa" id="inline-chk-portions">4 Anggota (2 Dewasa + 2 Anak) • 40 Porsi/Mgg</strong>
</div>
<div class="bg-cream p-3.5 rounded-2xl border border-plum/15">
<span class="text-cocoa-soft block">Jadwal &amp; Alamat Utama</span>
<strong class="text-cocoa" id="inline-chk-schedule">16.30 WIB • Jl. Melati Indah No. 14</strong>
</div>
</div>
</div>
<div class="lg:col-span-5 bg-cream p-5 rounded-2xl border-2 border-plum/25 space-y-3">
<div class="flex justify-between items-center">
<span class="text-xs font-bold text-cocoa">Total Tagihan Mingguan:</span>
<strong class="font-mono text-2xl text-plum" id="inline-chk-total">Rp 1.280.000</strong>
</div>
<button class="btn-shimmer w-full bg-coral hover:bg-coral-dark text-white font-extrabold py-3.5 rounded-2xl border-2 border-plum text-sm" onclick="openCheckoutModal()" type="button">
          Buka Form Checkout &amp; Konfirmasi →
        </button>
</div>
</div>
<!-- 33. FAQ (Paket keluarga, jumlah porsi, menu anak, alergi, pembayaran, dan pengiriman) -->
<div class="max-w-4xl mx-auto">
<div class="text-center mb-8">
<span class="inline-block bg-apricot text-plum font-extrabold text-xs uppercase tracking-widest px-4 py-1.5 rounded-full mb-2">33. Pertanyaan Umum (FAQ)</span>
<h2 class="font-display font-extrabold text-2xl sm:text-3xl text-cocoa">Paket Keluarga, Porsi, Menu Anak, Alergi, Pembayaran &amp; Pengiriman</h2>
</div>
<div class="space-y-3">
<details class="group bg-white rounded-2xl border-2 border-plum/20 open:border-plum p-4" open="">
<summary class="font-bold text-sm text-cocoa flex items-center justify-between list-none">
<span>Bagaimana pembagian jumlah porsi dewasa dan menu anak dalam paket keluarga?</span>
<span class="text-coral font-extrabold text-lg group-open:rotate-45 transition-transform">+</span>
</summary>
<p class="text-xs text-cocoa-soft mt-2.5 leading-relaxed">Anda dapat memilih paket 2 hingga 6+ anggota keluarga serta menentukan rasio porsi dewasa dan porsi anak secara fleksibel. Menu anak dimasak tanpa pedas, tanpa MSG, dan dengan tekstur yang ramah dikunyah.</p>
</details>
<details class="group bg-white rounded-2xl border-2 border-plum/20 open:border-plum p-4">
<summary class="font-bold text-sm text-cocoa flex items-center justify-between list-none">
<span>Bagaimana penanganan alergi makanan dan pantangan keluarga?</span>
<span class="text-coral font-extrabold text-lg group-open:rotate-45 transition-transform">+</span>
</summary>
<p class="text-xs text-cocoa-soft mt-2.5 leading-relaxed">Setiap kartu menu mencantumkan label alergen secara jelas (kacang, seafood, susu, telur, gluten). Anda dapat mencentang pengecualian bahan dan tim dapur kami akan menggantinya dengan alternatif protein/bahan aman tanpa biaya tambahan.</p>
</details>
<details class="group bg-white rounded-2xl border-2 border-plum/20 open:border-plum p-4">
<summary class="font-bold text-sm text-cocoa flex items-center justify-between list-none">
<span>Metode pembayaran dan jadwal pengiriman apa saja yang tersedia?</span>
<span class="text-coral font-extrabold text-lg group-open:rotate-45 transition-transform">+</span>
</summary>
<p class="text-xs text-cocoa-soft mt-2.5 leading-relaxed">Pembayaran mendukung Transfer Virtual Account, QRIS, Kartu Kredit, dan e-Wallet untuk siklus mingguan maupun bulanan. Pengiriman tersedia pada slot pagi (06.15 WIB), siang (10.30 WIB), dan sore (16.30 WIB) dengan fitur 2 alamat berbeda.</p>
</details>
</div>
</div>
</section>
<!-- ==================== 34. FOOTER (Profil bisnis, alamat, kontak, dan media sosial) ==================== -->
<footer class="bg-plum text-cream pt-14 pb-28 px-4 sm:px-6 lg:px-8 border-t-4 border-coral relative z-10" id="kontak">
<div class="max-w-7xl mx-auto grid sm:grid-cols-2 lg:grid-cols-4 gap-8 pb-10 border-b border-white/15">
<div class="space-y-3">
<span class="font-display font-extrabold text-2xl text-white">Soda<span class="text-peach">Table</span></span>
<p class="text-xs text-apricot leading-relaxed">Penyedia layanan katering mingguan keluarga modern yang menghadirkan kehangatan masakan rumahan bergizi, ramah anak, dan praktis langsung ke meja makan Anda.</p>
<div class="flex items-center gap-2 pt-1 text-xs font-bold">
<a class="bg-white/15 hover:bg-coral px-3 py-1.5 rounded-full" href="#kontak" onclick="showToast('Membuka Instagram @sodatable.family')">Instagram</a>
<a class="bg-white/15 hover:bg-coral px-3 py-1.5 rounded-full" href="#kontak" onclick="showToast('Membuka TikTok @sodatable.kitchen')">TikTok</a>
<a class="bg-white/15 hover:bg-coral px-3 py-1.5 rounded-full" href="#kontak" onclick="showToast('Membuka YouTube SodaTable Family')">YouTube</a>
</div>
</div>
<div>
<h4 class="font-display font-bold text-sm text-white mb-3">Navigasi Layanan</h4>
<ul class="space-y-1.5 text-xs text-apricot">
<li><a class="hover:text-white" href="#beranda">Beranda</a></li>
<li><a class="hover:text-white" href="#paket-keluarga">Paket Keluarga &amp; Kalkulator</a></li>
<li><a class="hover:text-white" href="#menu-mingguan">Menu Mingguan 7 Hari</a></li>
<li><a class="hover:text-white" href="#cara-berlangganan">Cara Berlangganan &amp; Dashboard</a></li>
<li><a class="hover:text-white" href="#tentang-kami">Tentang Kami &amp; Galeri Dapur</a></li>
</ul>
</div>
<div>
<h4 class="font-display font-bold text-sm text-white mb-3">Alamat &amp; Kontak Resmi</h4>
<ul class="space-y-1.5 text-xs text-apricot leading-relaxed">
<li>🏡 Dapur Pusat: Jl. Kemang Raya Keluarga No. 18, Jakarta Selatan 12730</li>
<li>📞 Telepon: (021) 789-4410</li>
<li>💬 WhatsApp: +62 812-3456-7890</li>
<li>✉️ Email: halo@sodatable.id</li>
</ul>
</div>
<div class="space-y-2.5">
<h4 class="font-display font-bold text-sm text-white">Katalog Menu Pekan Depan</h4>
<form class="flex gap-2" onsubmit="event.preventDefault(); showToast('Daftar menu keluarga minggu depan dikirim ke email Anda!')">
<input class="w-full px-3 py-2 rounded-xl bg-white/15 border border-white/25 text-xs text-white placeholder:text-apricot/60 focus:outline-none" placeholder="Email keluarga Anda..." required="" type="email"/>
<button class="bg-coral text-white font-extrabold text-xs px-3.5 rounded-xl hover:bg-coral-dark" type="submit">Kirim</button>
</form>
</div>
</div>
<div class="max-w-7xl mx-auto pt-5 flex flex-col sm:flex-row items-center justify-between gap-2 text-xs text-apricot/80">
<p>© 2026 SodaTable Family Kitchen Indonesia. Seluruh Hak Cipta Dilindungi.</p>
<p>100% Halal Certified • Tanpa MSG • Higienis Standar Dapur Keluarga</p>
</div>
</footer>
<!-- ==================== 14. CHECKOUT MODAL ==================== -->
<div class="fixed inset-0 z-50 hidden items-center justify-center bg-cocoa/70 backdrop-blur-sm p-4" id="checkout-modal">
<div class="bg-white rounded-3xl max-w-lg w-full border-2 border-plum shadow-2xl overflow-hidden">
<div class="bg-plum text-cream p-5 flex items-center justify-between">
<div>
<h3 class="font-display font-bold text-lg">Checkout Langganan Keluarga</h3>
<p class="text-xs text-apricot" id="chk-family-summary">4 Anggota Keluarga • 2x Makan/Hari • 2 Minggu</p>
</div>
<button class="w-8 h-8 rounded-full bg-white/15 text-white font-bold" onclick="closeCheckoutModal()" type="button">✕</button>
</div>
<form class="p-6 space-y-3.5 max-h-[80vh] overflow-y-auto text-xs" onsubmit="completeFamilyOrder(event)">
<div class="grid sm:grid-cols-2 gap-3">
<input class="w-full p-3 rounded-xl border border-plum/25 bg-cream" id="chk-parent-name" placeholder="Nama Ayah / Ibu" required="" type="text"/>
<input class="w-full p-3 rounded-xl border border-plum/25 bg-cream" placeholder="No. WhatsApp (0812...)" required="" type="tel"/>
</div>
<textarea class="w-full p-3 rounded-xl border border-plum/25 bg-cream" placeholder="Alamat utama pengiriman rumah..." required="" rows="2"></textarea>
<input class="w-full p-3 rounded-xl border border-plum/25 bg-cream" placeholder="Alamat kedua (opsional: kantor / rumah nenek)" type="text"/>
<div class="bg-apricot/55 p-3.5 rounded-2xl border border-plum/20 flex justify-between items-center">
<span class="font-bold text-cocoa">Total Mingguan (Gratis Ongkir):</span>
<span class="font-mono font-bold text-xl text-plum" id="chk-family-total">Rp 1.380.000</span>
</div>
<button class="btn-shimmer w-full bg-coral hover:bg-coral-dark text-white font-extrabold py-3.5 rounded-2xl border-2 border-plum text-sm" type="submit">
          Konfirmasi Jadwal Makan Keluarga ✓
        </button>
</form>
</div>
</div>
<!-- ==================== 15. INGREDIENT & NUTRITION DETAIL MODAL ==================== -->
<div class="fixed inset-0 z-50 hidden items-center justify-center bg-cocoa/70 backdrop-blur-sm p-4" id="dish-detail-modal">
<div class="bg-white rounded-3xl max-w-md w-full border-2 border-plum shadow-2xl overflow-hidden">
<div class="relative h-44">
<img alt="Detail Hidangan Keluarga" class="w-full h-full object-cover" id="dmodal-img" src=""/>
<button class="absolute top-3 right-3 w-8 h-8 rounded-full bg-plum text-white font-bold flex items-center justify-center border border-white" onclick="closeDishDetailModal()" type="button">✕</button>
<span class="absolute bottom-3 left-3 bg-coral text-white text-xs font-extrabold px-3 py-1 rounded-full" id="dmodal-badge">Kid-Friendly</span>
</div>
<div class="p-5 space-y-3 text-xs">
<h3 class="font-display font-extrabold text-xl text-cocoa" id="dmodal-title">Nama Menu</h3>
<p class="text-cocoa-soft leading-relaxed" id="dmodal-ingredients"></p>
<div class="bg-cream p-3.5 rounded-2xl border border-plum/20 grid grid-cols-4 text-center">
<div><span class="text-[10px] text-cocoa-soft block">Energi</span><strong class="font-mono text-plum" id="dmodal-kcal">420 kcal</strong></div>
<div><span class="text-[10px] text-cocoa-soft block">Protein</span><strong class="font-mono text-cocoa" id="dmodal-protein">28g</strong></div>
<div><span class="text-[10px] text-cocoa-soft block">Karbo</span><strong class="font-mono text-cocoa" id="dmodal-carbs">44g</strong></div>
<div><span class="text-[10px] text-cocoa-soft block">Lemak</span><strong class="font-mono text-coral-dark" id="dmodal-fat">12g</strong></div>
</div>
<div class="flex flex-wrap gap-1.5" id="dmodal-allergen-tags"></div>
<button class="btn-shimmer w-full bg-coral text-white font-extrabold py-3 rounded-2xl border-2 border-plum" onclick="closeDishDetailModal(); showToast('Hidangan ditambahkan ke Family Meal Box!')" type="button">
          + Masukkan ke Family Meal Box
        </button>
</div>
</div>
</div>
<!-- ==================== 16. TOAST NOTIFICATION ==================== -->
<div class="fixed top-24 right-5 z-50 hidden items-center gap-2.5 bg-plum text-cream px-4 py-3 rounded-2xl border-2 border-peach shadow-xl text-xs font-bold max-w-sm" id="toast-banner">
<span class="w-2.5 h-2.5 rounded-full bg-[#FFE28A] shrink-0"></span>
<span id="toast-message">Notifikasi</span>
</div>
<!-- ==================== 17. SODATABLE FAMILY AI CHATBOT WINDOW ==================== -->
<div class="fixed bottom-24 right-5 z-50 hidden w-[330px] sm:w-[360px] bg-white rounded-3xl border-2 border-plum shadow-2xl overflow-hidden" id="ai-chat-window">
<div class="bg-plum text-cream p-3.5 flex items-center justify-between border-b border-peach/30">
<div class="flex items-center gap-2.5">
<div class="w-8 h-8 rounded-full bg-coral flex items-center justify-center border border-[#FFE28A] relative">
<span class="text-sm">🍽️</span>
<span class="w-2 h-2 rounded-full bg-[#FFE28A] absolute -top-0.5 -right-0.5 animate-ping"></span>
</div>
<div>
<h4 class="font-bold text-xs text-white leading-none">SodaAI Family Assistant</h4>
<span class="text-[10px] text-apricot font-semibold">● Siap Bantu Menu Keluarga (<span id="ai-fam-size-ref">4 Org</span>)</span>
</div>
</div>
<button class="text-apricot hover:text-white font-bold text-base px-1.5" onclick="toggleAIChat()" type="button">✕</button>
</div>
<div class="p-3.5 h-60 overflow-y-auto space-y-2.5 bg-cream/80 text-xs" id="ai-chat-messages">
<div class="bg-white p-3 rounded-2xl rounded-tl-none border border-plum/15 text-cocoa leading-relaxed">
        Halo Ayah &amp; Ibu! 👋 Saya <strong>SodaAI</strong>. Saya sudah menyesuaikan rekomendasi untuk <strong class="text-plum" id="ai-chat-size-text">4 Anggota Keluarga</strong>. Mau saran menu untuk anak <em>picky eater</em> atau cek hemat belanja minggu ini?
      </div>
</div>
<div class="px-3 py-2 bg-apricot/45 border-t border-plum/10 flex gap-1.5 overflow-x-auto">
<button class="shrink-0 bg-white hover:bg-apricot text-[10px] font-bold px-2.5 py-1 rounded-full border border-plum/20 text-cocoa" onclick="sendQuickAIPrompt('Rekomendasi menu anak picky eater')" type="button">🧒 Picky Eater</button>
<button class="shrink-0 bg-white hover:bg-apricot text-[10px] font-bold px-2.5 py-1 rounded-full border border-plum/20 text-cocoa" onclick="sendQuickAIPrompt('Berapa estimasi biaya untuk keluarga saya?')" type="button">💰 Biaya Mingguan</button>
<button class="shrink-0 bg-white hover:bg-apricot text-[10px] font-bold px-2.5 py-1 rounded-full border border-plum/20 text-cocoa" onclick="sendQuickAIPrompt('Cara ubah alamat siang dan malam')" type="button">🏡 2 Alamat</button>
</div>
<form class="p-2.5 bg-white border-t border-plum/10 flex gap-2" onsubmit="handleAIChatSubmit(event)">
<input class="flex-1 text-xs p-2.5 rounded-xl bg-cream border border-plum/20 focus:outline-none" id="ai-chat-input" placeholder="Tanya menu anak, alergi, atau porsi..." type="text"/>
<button class="bg-coral text-white font-bold text-xs px-3.5 rounded-xl hover:bg-coral-dark" type="submit">Kirim</button>
</form>
</div>
<!-- ==================== 18. DUAL FIXED BOTTOM-RIGHT FLOATING BUTTONS ==================== -->
<div class="fixed bottom-5 right-5 z-50 flex items-center gap-3.5">
<!-- Floating WhatsApp Button (Side-by-Side Left) -->
<a aria-label="Konsultasi WhatsApp Keluarga" class="group relative flex items-center gap-2 bg-[#25D366] hover:bg-[#1EBE5D] text-white font-extrabold px-4 py-3 rounded-full border-2 border-plum shadow-lg transition-transform hover:-translate-y-1" href="https://wa.me/6281234567890?text=Halo%20SodaTable%20Family%20Kitchen!%20Saya%20ingin%20tanya%20paket%20katering%20mingguan%20keluarga." rel="noopener noreferrer" target="_blank">
<span class="absolute -inset-1 rounded-full bg-[#25D366]/35 animate-ping pointer-events-none"></span>
<svg class="w-5 h-5 relative z-10 fill-current" viewbox="0 0 24 24">
<path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.662.591 1.221.774 1.394.86s.274.072.376-.043c.101-.116.433-.506.549-.68.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.045.072.045.419-.1.824z"></path>
</svg>
<span class="hidden sm:inline text-xs relative z-10">WhatsApp Ibu</span>
</a>
<!-- Floating AI Chatbot Button (Warm Animated Dinner-Table Illustration, Floating Food Sparkles & Cozy Golden Glow) -->
<div class="relative flex items-center justify-center">
<!-- Floating Food Sparkles -->
<span class="food-sparkle" style="top: 4px; left: 8px; --sx: -15px; --sy: -46px; --dur: 2.5s; --delay: 0s;">✨</span>
<span class="food-sparkle" style="top: 8px; right: 10px; --sx: 16px; --sy: -48px; --dur: 2.9s; --delay: 0.6s;">🍲</span>
<span class="food-sparkle" style="bottom: 14px; left: 6px; --sx: -18px; --sy: -40px; --dur: 2.4s; --delay: 1.1s;">🥐</span>
<span class="food-sparkle" style="bottom: 12px; right: 8px; --sx: 15px; --sy: -42px; --dur: 2.7s; --delay: 1.6s;">✨</span>
<!-- Rotating Warm Tablecloth Halo -->
<svg class="w-[74px] h-[74px] absolute pointer-events-none animate-orbit-fast" viewbox="0 0 80 80">
<circle cx="40" cy="40" fill="none" opacity="0.95" r="36" stroke="#FFE28A" stroke-dasharray="14 8 4 8" stroke-width="2"></circle>
<circle cx="40" cy="4" fill="#FFE28A" r="3.5"></circle>
<circle cx="76" cy="40" fill="#FFB59E" r="3"></circle>
</svg>
<!-- Family Size Status Pill -->
<div class="absolute -top-7 whitespace-nowrap bg-plum text-[#FFE28A] font-mono text-[10px] font-bold px-2.5 py-0.5 rounded-full border border-[#FFE28A]/80 shadow-md pointer-events-none" id="floating-ai-family-pill">
        🏡 Meja 4 Org
      </div>
<!-- Core SodaAI Button with Animated Dinner-Table & Steaming Pot SVG -->
<button aria-label="Buka SodaAI Family Assistant" class="ai-cozy-btn relative z-10 w-15 h-15 w-[60px] h-[60px] rounded-full bg-gradient-to-br from-plum via-coral-dark to-coral text-cream border-2 border-[#FFE28A] flex flex-col items-center justify-center shadow-xl" onclick="toggleAIChat()" type="button">
<!-- Animated Warm Dinner-Table Illustration -->
<svg class="w-7 h-7" fill="none" viewbox="0 0 36 36">
<!-- Rising Warm Steam -->
<path class="steam-line-1" d="M13 11C13 9 14.5 8 14.5 6" stroke="#FFE28A" stroke-linecap="round" stroke-width="1.6"></path>
<path class="steam-line-2" d="M18 10C18 8 19.5 7 19.5 5" stroke="#FFF4E9" stroke-linecap="round" stroke-width="1.6"></path>
<path class="steam-line-3" d="M23 11C23 9 24.5 8 24.5 6" stroke="#FFE28A" stroke-linecap="round" stroke-width="1.6"></path>
<!-- Warm Casserole Pot on Table -->
<path d="M11 16H25C25 20.5 22 23 18 23C14 23 11 20.5 11 16Z" fill="#FFF4E9" stroke="#3E2731" stroke-width="1.5"></path>
<path d="M10 15.5H26" stroke="#FFE28A" stroke-linecap="round" stroke-width="2"></path>
<!-- Dinner Table & Legs -->
<path d="M5 24.5H31" stroke="#FFE28A" stroke-linecap="round" stroke-width="2.4"></path>
<path d="M10 24.5L8.5 31M26 24.5L27.5 31" stroke="#FFF4E9" stroke-linecap="round" stroke-width="2"></path>
</svg>
<span class="text-[8.5px] font-extrabold tracking-wider uppercase text-[#FFE28A] leading-none">SodaAI</span>
</button>
</div>
</div>
<!-- ==================== JAVASCRIPT FAMILY APPLICATION LOGIC ==================== -->

</svg></div></a></div></nav></header>
<script src="{{ asset('js/website-bisnis/templates/food-subscription/weekly-family-meal-plan/sodatable/sodatable.js') }}" defer></script>
</body>
</html>
