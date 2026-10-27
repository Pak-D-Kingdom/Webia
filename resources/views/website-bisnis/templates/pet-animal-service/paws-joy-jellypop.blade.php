<!DOCTYPE html>

<html class="scroll-smooth" lang="id"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Paws &amp; Joy - Playful &amp; Colorful Pet Academy</title>
<!-- Tailwind CSS with Forms & Container Queries -->
<!-- Google Fonts: Fredoka & Outfit -->
<link href="https://fonts.googleapis.com" rel="preconnect"/>
<link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
<link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;500;600;700&amp;family=Outfit:wght@300;400;500;600;700;800&amp;display=swap" rel="stylesheet"/>
<!-- Font Awesome Pro Icons -->
  @vite('resources/css/app.css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"/>
<style>
    body {
      font-family: 'Outfit', sans-serif;
      background-color: #FAF8FF;
    }
    h1, h2, h3, h4, .font-joy-display {
      font-family: 'Fredoka', cursive;
    }
    /* Playful glassmorphism tokens */
    .joy-glass-jelly {
      background: rgba(255, 255, 255, 0.82);
      backdrop-filter: blur(16px);
      -webkit-backdrop-filter: blur(16px);
      border: 1.5px solid rgba(255, 255, 255, 0.9);
    }
    .joy-glass-dark {
      background: rgba(74, 21, 75, 0.85);
      backdrop-filter: blur(16px);
      -webkit-backdrop-filter: blur(16px);
      border: 1px solid rgba(255, 255, 255, 0.15);
    }
    .joy-mesh-jelly-bg {
      background: radial-gradient(circle at 10% 20%, rgba(244, 63, 94, 0.12) 0%, transparent 40%),
                  radial-gradient(circle at 90% 15%, rgba(168, 85, 247, 0.16) 0%, transparent 45%),
                  radial-gradient(circle at 50% 60%, rgba(56, 189, 248, 0.12) 0%, transparent 50%),
                  radial-gradient(circle at 80% 90%, rgba(236, 72, 153, 0.14) 0%, transparent 40%),
                  #FAF8FF;
    }
    details > summary { list-style: none; }
    details > summary::-webkit-details-marker { display: none; }
    body.joy-template-preview > :not(header):not(#beranda) { display: none !important; }
  </style>
</head>
<body class="text-slate-800 antialiased selection:bg-joy-cotton/30 selection:text-joy-grape-deep joy-mesh-jelly-bg{{ request()->boolean('preview') ? ' joy-template-preview' : '' }}">
<!-- 1. Ticker Topbar Promo Ceria -->
<div class="relative bg-gradient-to-r from-joy-grape-deep via-joy-grape via-joy-cotton to-joy-powder text-white text-xs sm:text-sm font-medium py-2.5 px-4 shadow-sm z-50">
<div class="max-w-7xl mx-auto flex flex-col sm:flex-row items-center justify-between gap-2.5">
<div class="flex items-center gap-2 flex-wrap justify-center sm:justify-start">
<span class="inline-flex items-center gap-1.5 bg-white/20 backdrop-blur-md text-white font-joy-display font-semibold px-2.5 py-0.5 rounded-full text-[11px] tracking-wide border border-white/30 animate-pulse">
<i class="fa-solid fa-sparkles text-yellow-300"></i> Jelly Pop Spring Fest
        </span>
<span class="font-normal text-white/95">Diskon Trial 35% + Free Sensory Puppy Toy Box minggu ini!</span>
</div>
<div class="flex items-center gap-4 text-xs text-white/90 font-medium">
<span class="inline-flex items-center gap-1.5"><i class="fa-regular fa-clock text-pink-200"></i> Sel - Min: 08.30 - 17.30 WIB</span>
<span class="hidden md:inline text-white/40">|</span>
<span class="inline-flex items-center gap-1.5"><i class="fa-solid fa-map-location-dot text-sky-200"></i> Cabang Kelapa Gading &amp; BSD City</span>
</div>
</div>
</div>
<!-- 2. Navbar Floating Modern Style -->
<header class="sticky top-3 z-40 px-3 sm:px-6 max-w-7xl mx-auto transition-all duration-300">
<nav class="joy-glass-jelly rounded-3xl shadow-joy-floating-pill px-4 sm:px-6 py-3 border border-white/80">
<div class="flex items-center justify-between">
<!-- Logo Paws & Joy -->
<a class="flex items-center gap-3 group" href="#beranda">
<div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-joy-cotton via-joy-grape to-joy-powder flex items-center justify-center text-white shadow-md shadow-joy-grape/30 group-hover:rotate-6 group-hover:scale-105 transition-transform duration-300">
<i class="fa-solid fa-paw text-2xl drop-shadow"></i>
</div>
<div>
<div class="flex items-center gap-1.5">
<span class="font-joy-display text-2xl sm:text-3xl font-bold tracking-tight text-joy-grape-deep">
                Paws<span class="text-joy-cotton">&amp;</span>Joy
              </span>
<span class="inline-block px-1.5 py-0.5 rounded-md bg-joy-lilac/15 text-joy-grape-vibrant text-[10px] font-bold font-joy-display tracking-wider border border-joy-lilac/30">
                ACADEMY
              </span>
</div>
<p class="text-[11px] font-semibold tracking-wider text-slate-500 uppercase -mt-0.5 flex items-center gap-1">
<span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span> Playful Pet Behaviorists
            </p>
</div>
</a>
<!-- Desktop Navigation Links -->
<div class="hidden lg:flex items-center gap-1 xl:gap-2">
<a class="px-4 py-2 rounded-full font-joy-display font-bold text-sm text-joy-grape-deep bg-joy-lilac-soft/80 text-joy-grape-vibrant border border-joy-lilac-bright/30 transition-all" href="#beranda">
            Beranda
          </a>
<a class="px-4 py-2 rounded-full font-joy-display font-semibold text-sm text-slate-600 hover:text-joy-grape-deep hover:bg-white/80 transition-all" href="#metode">
            Metode Ceria
          </a>
<a class="px-4 py-2 rounded-full font-joy-display font-semibold text-sm text-slate-600 hover:text-joy-grape-deep hover:bg-white/80 transition-all" href="#program">
            Kurikulum Kelas
          </a>
<a class="px-4 py-2 rounded-full font-joy-display font-semibold text-sm text-slate-600 hover:text-joy-grape-deep hover:bg-white/80 transition-all" href="#fasilitas">
            Wahana Sensori
          </a>
<a class="px-4 py-2 rounded-full font-joy-display font-semibold text-sm text-slate-600 hover:text-joy-grape-deep hover:bg-white/80 transition-all" href="#testimoni">
            Cerita Lulusan
          </a>
<a class="px-4 py-2 rounded-full font-joy-display font-semibold text-sm text-slate-600 hover:text-joy-grape-deep hover:bg-white/80 transition-all" href="#faq">
            FAQ
          </a>
</div>
<!-- Action CTA Button -->
<div class="flex items-center gap-3">
<a class="hidden sm:inline-flex items-center gap-1.5 text-xs font-bold font-joy-display text-joy-grape-deep px-3.5 py-2 rounded-full hover:bg-joy-cotton-soft transition-colors" href="#jadwal">
<i class="fa-regular fa-calendar-check text-joy-cotton"></i> Cek Jadwal
          </a>
<a class="relative group overflow-hidden bg-gradient-to-r from-joy-cotton via-joy-cotton-vibrant to-joy-cotton text-white font-joy-display font-bold text-sm sm:text-base px-5 sm:px-6 py-2.5 rounded-full shadow-joy-jelly-pink hover:translate-y-[-2px] active:translate-y-[2px] transition-all flex items-center gap-2" href="#trial">
<span class="relative z-10 flex items-center gap-2">
<span>Daftar Kelas Ceria</span>
<i class="fa-solid fa-arrow-right text-xs group-hover:translate-x-1 transition-transform"></i>
</span>
<div class="absolute inset-0 bg-white/20 transform -skew-x-12 -translate-x-full group-hover:translate-x-full transition-transform duration-700"></div>
</a>
</div>
</div>
</nav>
</header>
<!-- 3. Hero Section (Atraktif, Berlapis & Multi-Dimensi) -->
<section class="relative pt-10 sm:pt-16 pb-20 overflow-hidden" id="beranda">
<!-- Ambient Floating Jelly Blobs -->
<div class="absolute top-12 left-8 w-72 h-72 bg-gradient-to-br from-joy-cotton-blush via-joy-lilac-soft to-transparent rounded-full blur-3xl opacity-70 pointer-events-none animate-joy-float-slow"></div>
<div class="absolute top-1/3 right-10 w-96 h-96 bg-gradient-to-tr from-joy-powder-ice via-joy-lilac-mist to-joy-cotton-soft rounded-full blur-3xl opacity-60 pointer-events-none animate-joy-float"></div>
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
<div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center">
<!-- Left Content -->
<div class="lg:col-span-7 space-y-6 text-center lg:text-left">
<!-- Fear-Free Status Pill -->
<div class="inline-flex items-center gap-2.5 px-4 py-2 rounded-full bg-white/90 border border-joy-lilac-bright/40 shadow-sm shadow-joy-lilac/20">
<span class="flex h-3 w-3 relative">
<span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-joy-cotton opacity-75"></span>
<span class="relative inline-flex rounded-full h-3 w-3 bg-joy-cotton"></span>
</span>
<span class="font-joy-display text-xs uppercase tracking-wider font-bold text-joy-grape-deep">
              100% Fear-Free • Positive Reinforcement Certified
            </span>
<span class="bg-joy-cotton-soft text-joy-cotton text-[10px] font-bold px-2 py-0.5 rounded-full">New Batch</span>
</div>
<!-- Main Dynamic Multi-Colored Headline -->
<h1 class="font-joy-display text-4xl sm:text-5xl lg:text-6xl font-extrabold text-joy-grape-deep leading-[1.12] tracking-tight">
            Belajar Sambil Bermain, 
            <span class="block mt-1">
              Anabul 
              <span class="relative inline-block text-transparent bg-clip-text bg-gradient-to-r from-joy-cotton via-joy-cotton-vibrant to-joy-lilac">
                Pintar, Santun
                <svg class="absolute -bottom-2 left-0 w-full h-3 text-joy-powder-light" fill="none" viewbox="0 0 200 12" xmlns="http://www.w3.org/2000/svg">
<path d="M2 9C40 2 80 12 120 4C160 -4 185 8 198 9" stroke="currentColor" stroke-linecap="round" stroke-width="4"></path>
</svg>
</span>
              &amp; Riang!
            </span>
</h1>
<p class="text-base sm:text-lg text-slate-600 max-w-xl mx-auto lg:mx-0 leading-relaxed font-normal">
            Metode pelatihan modern berdimensi keceriaan: gabungan game interaktif, stimulasi sensorik aroma-tekstur, serta camilan sehat bergizi. Membentuk ikatan harmonis tanpa paksaan fisik selamanya.
          </p>
<!-- Dual Action Buttons -->
<div class="flex flex-col sm:flex-row items-center gap-4 pt-2 justify-center lg:justify-start">
<a class="w-full sm:w-auto text-center bg-gradient-to-r from-joy-grape-vibrant to-joy-grape hover:from-joy-grape hover:to-joy-grape-deep text-white font-joy-display text-base sm:text-lg font-bold px-8 py-4 rounded-2xl shadow-joy-jelly-purple hover:-translate-y-1 active:translate-y-0.5 transition-all flex items-center justify-center gap-3" href="#trial">
<i class="fa-solid fa-wand-magic-sparkles text-pink-300"></i>
<span>Pesan Sesi Trial 60 Menit</span>
</a>
<a class="w-full sm:w-auto text-center bg-white/95 hover:bg-joy-powder-soft border-2 border-joy-powder text-joy-powder font-joy-display text-base sm:text-lg font-bold px-7 py-3.5 rounded-2xl shadow-joy-jelly-blue hover:-translate-y-1 active:translate-y-0.5 transition-all flex items-center justify-center gap-2" href="#program">
<i class="fa-solid fa-shapes text-joy-powder"></i>
<span>Eksplor 4 Program</span>
</a>
</div>
<!-- Counter Cards Bergradasi Halus -->
<div class="grid grid-cols-3 gap-3 sm:gap-4 pt-6 max-w-lg mx-auto lg:mx-0">
<div class="joy-glass-jelly rounded-2xl p-3 sm:p-4 text-center border border-joy-lilac-bright/30 shadow-sm hover:scale-105 transition-transform">
<div class="font-joy-display text-2xl sm:text-3xl font-extrabold text-joy-grape-vibrant">1.500+</div>
<div class="text-xs font-semibold text-slate-600 mt-0.5 flex items-center justify-center gap-1">
<i class="fa-solid fa-shield-dog text-joy-lilac"></i> Anabul Lulus
              </div>
</div>
<div class="joy-glass-jelly rounded-2xl p-3 sm:p-4 text-center border border-joy-cotton/30 shadow-sm hover:scale-105 transition-transform">
<div class="font-joy-display text-2xl sm:text-3xl font-extrabold text-joy-cotton">18+</div>
<div class="text-xs font-semibold text-slate-600 mt-0.5 flex items-center justify-center gap-1">
<i class="fa-solid fa-user-check text-joy-cotton"></i> Trainer Berijazah
              </div>
</div>
<div class="joy-glass-jelly rounded-2xl p-3 sm:p-4 text-center border border-joy-powder/30 shadow-sm hover:scale-105 transition-transform">
<div class="font-joy-display text-2xl sm:text-3xl font-extrabold text-joy-powder">4.95★</div>
<div class="text-xs font-semibold text-slate-600 mt-0.5 flex items-center justify-center gap-1">
<i class="fa-solid fa-heart text-rose-500"></i> Cinta Pawrents
              </div>
</div>
</div>
</div>
<!-- Right Hero Visual with Interactive Layered Blobs -->
<div class="lg:col-span-5 relative">
<div class="relative mx-auto max-w-md lg:max-w-none">
<!-- Playful Blob Backdrops -->
<div class="absolute -inset-4 bg-gradient-to-tr from-joy-lilac via-joy-cotton to-joy-powder-light rounded-[48px] rotate-3 opacity-70 blur-lg"></div>
<div class="absolute -inset-2 bg-gradient-to-bl from-joy-powder via-joy-cotton-vibrant to-joy-grape rounded-[44px] -rotate-2 opacity-50"></div>
<!-- Main Interactive Card Frame -->
<div class="relative bg-white p-3.5 rounded-[40px] shadow-2xl border-4 border-white overflow-hidden">
<img alt="Sesi Pelatihan Anabul Menyenangkan" class="w-full h-[430px] object-cover rounded-[32px]" src="https://lh3.googleusercontent.com/aida/AEtjO1XUyh39Rth58Wv1PKjMYRKEOzYf_-moYIOJ1ScceYSSxPDq8evPZt5vE4mP6kkBE_malClmIqQeDLmmDQkswh2VW-Wqs_pGIAmOEJQ5VgxUYAtS0h0ZsqTQGNVBcDz3Hl2E5xw0mQvuRzR1cKW4J0ueEfXFqR4Up1IfOImXDTwa9pDGxOCeGdCkPeneM_xPRwjQQSv1UgDZDDutUkzt2XXb_yWrM0gdnJDkoYngCTlT3JsIh0OUR6zpdg"/>
<!-- Floating Pill 1: Joyful Rewards -->
<div class="absolute top-7 left-7 joy-glass-jelly px-4 py-2.5 rounded-2xl shadow-joy-floating-pill border border-white flex items-center gap-3 animate-joy-float">
<div class="w-10 h-10 rounded-xl bg-gradient-to-br from-joy-cotton to-joy-cotton-vibrant text-white flex items-center justify-center shadow-md shadow-joy-cotton/30">
<i class="fa-solid fa-cookie-bite text-lg"></i>
</div>
<div>
<div class="font-joy-display font-bold text-xs text-joy-grape-deep">Joyful Rewards</div>
<div class="text-[11px] font-semibold text-slate-500">Praise, Lick &amp; Treats</div>
</div>
</div>
<!-- Floating Pill 2: Indoor Agility Arena -->
<div class="absolute bottom-7 right-7 joy-glass-jelly px-4 py-2.5 rounded-2xl shadow-joy-floating-pill border border-white flex items-center gap-3 animate-joy-float-delayed">
<div class="w-10 h-10 rounded-xl bg-gradient-to-br from-joy-powder to-joy-powder-light text-white flex items-center justify-center shadow-md shadow-joy-powder/30">
<i class="fa-solid fa-wind text-lg"></i>
</div>
<div>
<div class="font-joy-display font-bold text-xs text-joy-powder">Indoor Agility Arena</div>
<div class="text-[11px] font-semibold text-slate-500">AC Dingin, Anti-Slip, UV-C</div>
</div>
</div>
<!-- Tiny Cute Floating Badge -->
<div class="absolute bottom-28 left-6 bg-yellow-400 text-joy-grape-deep font-joy-display text-[11px] font-bold px-3 py-1.5 rounded-full shadow-lg flex items-center gap-1.5 rotate-[-6deg]">
<i class="fa-solid fa-certificate"></i> No Shock Collars Ever!
              </div>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- 4. Section Metode Belajar Ceria (Card Bertingkat dengan 3D Look) -->
<section class="py-20 bg-white relative" id="metode">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="text-center max-w-3xl mx-auto mb-14">
<span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-joy-lilac-soft text-joy-grape-vibrant font-joy-display font-bold text-xs uppercase tracking-wider mb-3">
<i class="fa-solid fa-sparkles"></i> Filosofi Jelly Pop Learning
        </span>
<h2 class="text-3xl sm:text-4xl font-extrabold text-joy-grape-deep font-joy-display">
          Belajar Tanpa Rasa Cemas, Mengasah Kecerdasan Alami
        </h2>
<p class="text-slate-600 mt-3 text-base">
          Kami menolak hukuman intimidasi. Tiga pilar holistik kami memastikan anabul merasa aman, dimengerti, dan termotivasi untuk bertingkah laku manis.
        </p>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
<!-- Card 1: Positive Reward System -->
<div class="group relative rounded-3xl p-8 bg-gradient-to-b from-joy-lilac-mist to-white border-2 border-joy-lilac-bright/40 shadow-joy-jelly-sm hover:-translate-y-2 transition-all duration-300">
<div class="w-16 h-16 rounded-2xl bg-gradient-to-tr from-joy-grape-deep to-joy-lilac text-white flex items-center justify-center text-2xl mb-6 shadow-md shadow-joy-grape/30 group-hover:scale-110 transition-transform">
<i class="fa-solid fa-medal"></i>
</div>
<div class="inline-block px-2.5 py-1 rounded-lg bg-joy-lilac-soft text-joy-grape-vibrant text-[11px] font-bold uppercase tracking-wider mb-2">Pilar 01</div>
<h3 class="text-2xl font-bold font-joy-display text-joy-grape-deep mb-3">Positive Reward System</h3>
<p class="text-slate-600 text-sm leading-relaxed mb-6 font-normal">
            Memanfaatkan 'clicker timing' tepat dan reward multi-level (camilan alami, mainan teether bertekstur, serta afirmasi verbal lembut) untuk mengunci kebiasaan baik permanen.
          </p>
<div class="pt-4 border-t border-joy-lilac-bright/20 flex flex-col gap-2 text-xs font-bold text-joy-grape-vibrant">
<div class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-joy-cotton"></i> Fear-Free &amp; Force-Free Certified</div>
<div class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-joy-cotton"></i> Mengikis kecenderungan agresifitas</div>
</div>
</div>
<!-- Card 2: Brain Puzzle & Scent Work -->
<div class="group relative rounded-3xl p-8 bg-gradient-to-b from-joy-cotton-soft to-white border-2 border-joy-cotton/40 shadow-joy-jelly-sm hover:-translate-y-2 transition-all duration-300">
<div class="w-16 h-16 rounded-2xl bg-gradient-to-tr from-joy-cotton-vibrant to-joy-cotton text-white flex items-center justify-center text-2xl mb-6 shadow-md shadow-joy-cotton/30 group-hover:scale-110 transition-transform">
<i class="fa-solid fa-puzzle-piece"></i>
</div>
<div class="inline-block px-2.5 py-1 rounded-lg bg-joy-cotton-blush text-joy-cotton font-bold text-[11px] uppercase tracking-wider mb-2">Pilar 02</div>
<h3 class="text-2xl font-bold font-joy-display text-joy-grape-deep mb-3">Brain Puzzle &amp; Scent Work</h3>
<p class="text-slate-600 text-sm leading-relaxed mb-6 font-normal">
            15 menit latihan hidung (sniffing) menyerap energi setara 1 jam berlari! Kami menggunakan snuffle mat, maze labirin interaktif, dan puzzle level 1-3 untuk menenangkan anabul hiperaktif.
          </p>
<div class="pt-4 border-t border-joy-cotton/20 flex flex-col gap-2 text-xs font-bold text-joy-cotton">
<div class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-joy-cotton"></i> Mencegah gigitan barang rumah tangga</div>
<div class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-joy-cotton"></i> Menurunkan hormon kortisol stres</div>
</div>
</div>
<!-- Card 3: Pawrent Interactive Academy -->
<div class="group relative rounded-3xl p-8 bg-gradient-to-b from-joy-powder-soft to-white border-2 border-joy-powder/40 shadow-joy-jelly-sm hover:-translate-y-2 transition-all duration-300">
<div class="w-16 h-16 rounded-2xl bg-gradient-to-tr from-joy-powder to-joy-powder-light text-white flex items-center justify-center text-2xl mb-6 shadow-md shadow-joy-powder/30 group-hover:scale-110 transition-transform">
<i class="fa-solid fa-graduation-cap"></i>
</div>
<div class="inline-block px-2.5 py-1 rounded-lg bg-joy-powder-ice text-joy-powder font-bold text-[11px] uppercase tracking-wider mb-2">Pilar 03</div>
<h3 class="text-2xl font-bold font-joy-display text-joy-grape-deep mb-3">Pawrent Academy Terpandu</h3>
<p class="text-slate-600 text-sm leading-relaxed mb-6 font-normal">
            Bukan hanya anabul yang dilatih, kami mendampingi pemilik memahami bahasa tubuh mikro (calming signals, telinga, kibasan ekor) agar instruksi di rumah seirama dengan akademi.
          </p>
<div class="pt-4 border-t border-joy-powder/20 flex flex-col gap-2 text-xs font-bold text-joy-powder">
<div class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-joy-powder"></i> Modul video &amp; WhatsApp Support 24/7</div>
<div class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-joy-powder"></i> Panduan rutinitas tidur &amp; potong kuku</div>
</div>
</div>
</div>
</div>
</section>
<!-- 5. Section Kurikulum Kelas Unggulan (4 Program Ceria Lengkap) -->
<section class="py-20 bg-joy-iris-mist relative overflow-hidden" id="program">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4">
<div>
<span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-joy-cotton-soft text-joy-cotton font-joy-display font-bold text-xs uppercase tracking-wider mb-3">
<i class="fa-solid fa-paw"></i> Kurikulum Berjenjang &amp; Terukur
          </span>
<h2 class="text-3xl sm:text-4xl font-extrabold text-joy-grape-deep font-joy-display">
            Pilihan Program Pelatihan Unggulan
          </h2>
<p class="text-slate-600 mt-2 text-base">Rasio eksklusif: 1 Pelatih hanya membimbing maksimal 4 anabul untuk perhatian personal.</p>
</div>
<div class="flex items-center gap-3 bg-white px-5 py-3 rounded-2xl border-2 border-joy-lilac-bright/30 shadow-sm text-xs font-bold text-joy-grape-deep">
<div class="w-8 h-8 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center text-sm">
<i class="fa-solid fa-users"></i>
</div>
<div>
<div>Maks. 4 Anabul per Batch</div>
<span class="text-slate-500 font-normal">Garansi bebas trauma</span>
</div>
</div>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
<!-- Program 1: Puppy Socialization -->
<div class="bg-white rounded-[32px] p-6 border-2 border-joy-lilac-bright/40 flex flex-col justify-between shadow-joy-glass-card hover:-translate-y-2 transition-all duration-300">
<div>
<div class="flex justify-between items-start mb-4">
<span class="px-3 py-1 rounded-full text-xs font-bold font-joy-display bg-joy-lilac-soft text-joy-grape-vibrant">
                Usia 2 - 5 Bulan
              </span>
<div class="w-10 h-10 rounded-2xl bg-joy-lilac-soft text-joy-grape-vibrant flex items-center justify-center font-bold">
<i class="fa-solid fa-baby"></i>
</div>
</div>
<h3 class="text-xl font-bold font-joy-display text-joy-grape-deep mb-2">Puppy Socialization</h3>
<p class="text-xs text-slate-500 mb-5 leading-relaxed font-normal">
              Fase krusial emas puppy! Membangun rasa percaya diri terhadap keramaian, suara petir, sentuhan dokter hewan, dan sesama anjing.
            </p>
<ul class="space-y-2.5 text-xs font-medium text-slate-700 mb-6">
<li class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-joy-cotton"></i> Toilet &amp; Pee Pad Habituation</li>
<li class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-joy-cotton"></i> Mencegah Play-Biting &amp; Mengunyah Sepatu</li>
<li class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-joy-cotton"></i> Desensitisasi Grooming &amp; Suara Blender</li>
<li class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-joy-cotton"></i> Adaptasi Crate Nyaman &amp; Mandiri</li>
<li class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-joy-cotton"></i> Sesi Main Ceria Terbimbing</li>
</ul>
</div>
<div class="pt-5 border-t border-slate-100 flex items-center justify-between">
<div>
<span class="text-[11px] text-slate-400 font-bold uppercase">Durasi 4 Pekan</span>
<div class="text-xl font-joy-display font-bold text-joy-grape-deep">Rp 1.450.000</div>
</div>
<a class="w-11 h-11 rounded-full bg-joy-grape-deep text-white flex items-center justify-center shadow-md hover:bg-joy-grape-vibrant transition-colors" href="#trial">
<i class="fa-solid fa-arrow-right text-sm"></i>
</a>
</div>
</div>
<!-- Program 2: Basic Obedience (Favorit Pawrents) -->
<div class="bg-white rounded-[32px] p-6 border-2 border-joy-cotton relative flex flex-col justify-between shadow-joy-jelly-pink hover:-translate-y-2 transition-all duration-300">
<div class="absolute -top-3.5 right-6 bg-gradient-to-r from-joy-cotton-vibrant to-joy-cotton text-white text-[10px] font-joy-display font-bold uppercase tracking-wider px-3.5 py-1 rounded-full shadow-md flex items-center gap-1.5">
<i class="fa-solid fa-star"></i> Terfavorit Pawrents
          </div>
<div>
<div class="flex justify-between items-start mb-4">
<span class="px-3 py-1 rounded-full text-xs font-bold font-joy-display bg-joy-cotton-soft text-joy-cotton">
                Usia &gt; 5 Bulan
              </span>
<div class="w-10 h-10 rounded-2xl bg-joy-cotton-soft text-joy-cotton flex items-center justify-center font-bold">
<i class="fa-solid fa-award"></i>
</div>
</div>
<h3 class="text-xl font-bold font-joy-display text-joy-grape-deep mb-2">Basic Obedience</h3>
<p class="text-xs text-slate-500 mb-5 leading-relaxed font-normal">
              Disiplin santun tanpa ketakutan. Menanamkan fokus responsif saat diajak jalan di cafe pet-friendly, mall, dan jalan raya.
            </p>
<ul class="space-y-2.5 text-xs font-medium text-slate-700 mb-6">
<li class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-joy-cotton"></i> Duduk, Tunggu, Diam &amp; "Come" Akurat</li>
<li class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-joy-cotton"></i> Loose-Leash Walking tanpa Menarik Tali</li>
<li class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-joy-cotton"></i> Kontrol Impuls "Leave It" (Anti Makan Sampah)</li>
<li class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-joy-cotton"></i> Etika Menyambut Tamu Tanpa Melompat</li>
<li class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-joy-cotton"></i> Sertifikat Kelulusan + Medali Ceria</li>
</ul>
</div>
<div class="pt-5 border-t border-slate-100 flex items-center justify-between">
<div>
<span class="text-[11px] text-slate-400 font-bold uppercase">Durasi 6 Pekan</span>
<div class="text-xl font-joy-display font-bold text-joy-cotton">Rp 1.950.000</div>
</div>
<a class="w-11 h-11 rounded-full bg-joy-cotton text-white flex items-center justify-center shadow-md hover:bg-joy-cotton-vibrant transition-colors" href="#trial">
<i class="fa-solid fa-arrow-right text-sm"></i>
</a>
</div>
</div>
<!-- Program 3: Behavioral Modification (Privat 1-on-1) -->
<div class="bg-white rounded-[32px] p-6 border-2 border-joy-powder-light flex flex-col justify-between shadow-joy-glass-card hover:-translate-y-2 transition-all duration-300">
<div>
<div class="flex justify-between items-start mb-4">
<span class="px-3 py-1 rounded-full text-xs font-bold font-joy-display bg-joy-powder-soft text-joy-powder">
                Sesi Privat 1-on-1
              </span>
<div class="w-10 h-10 rounded-2xl bg-joy-powder-soft text-joy-powder flex items-center justify-center font-bold">
<i class="fa-solid fa-heart-pulse"></i>
</div>
</div>
<h3 class="text-xl font-bold font-joy-display text-joy-grape-deep mb-2">Behavioral Therapy</h3>
<p class="text-xs text-slate-500 mb-5 leading-relaxed font-normal">
              Pemulihan mendalam untuk anabul yang mengalami separation anxiety parah, reaktif terhadap anjing lain, atau trauma masa lalu.
            </p>
<ul class="space-y-2.5 text-xs font-medium text-slate-700 mb-6">
<li class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-joy-powder"></i> Konsultasi Psikologi &amp; Sinyal Stres</li>
<li class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-joy-powder"></i> Desensitisasi Counter-Conditioning</li>
<li class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-joy-powder"></i> Terapi Menangkal Gonggongan Panik</li>
<li class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-joy-powder"></i> Rekonstruksi Lingkungan Rumah</li>
<li class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-joy-powder"></i> Tersedia Pilihan Home Visit Jabodetabek</li>
</ul>
</div>
<div class="pt-5 border-t border-slate-100 flex items-center justify-between">
<div>
<span class="text-[11px] text-slate-400 font-bold uppercase">5 Sesi Khusus + Eval</span>
<div class="text-xl font-joy-display font-bold text-joy-grape-deep">Rp 2.400.000</div>
</div>
<a class="w-11 h-11 rounded-full bg-joy-powder text-white flex items-center justify-center shadow-md hover:bg-joy-powder-light transition-colors" href="#trial">
<i class="fa-solid fa-arrow-right text-sm"></i>
</a>
</div>
</div>
<!-- Program 4: Agility & Fun Sports -->
<div class="bg-white rounded-[32px] p-6 border-2 border-joy-lilac-bright/40 flex flex-col justify-between shadow-joy-glass-card hover:-translate-y-2 transition-all duration-300">
<div>
<div class="flex justify-between items-start mb-4">
<span class="px-3 py-1 rounded-full text-xs font-bold font-joy-display bg-joy-lilac-soft text-joy-grape-vibrant">
                Enerjik &amp; Aktif
              </span>
<div class="w-10 h-10 rounded-2xl bg-joy-lilac-soft text-joy-grape-vibrant flex items-center justify-center font-bold">
<i class="fa-solid fa-bolt-lightning"></i>
</div>
</div>
<h3 class="text-xl font-bold font-joy-display text-joy-grape-deep mb-2">Agility &amp; Play Fun</h3>
<p class="text-xs text-slate-500 mb-5 leading-relaxed font-normal">
              Saluran terbaik bagi anabul dengan tenaga berlebih! Melatih ketangkasan melalui terowongan warna-warni, rintangan melompat aman, dan weave poles.
            </p>
<ul class="space-y-2.5 text-xs font-medium text-slate-700 mb-6">
<li class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-joy-cotton"></i> Agility Tunnel &amp; Mini A-Frame</li>
<li class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-joy-cotton"></i> Melatih Kecepatan Reaksi &amp; Konsentrasi</li>
<li class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-joy-cotton"></i> Menguatkan Bonding Batin Pawrent &amp; Anabul</li>
<li class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-joy-cotton"></i> Matras Khusus Pelindung Persendian</li>
<li class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-joy-cotton"></i> Fun Agility Mini Games &amp; Goodie Snack</li>
</ul>
</div>
<div class="pt-5 border-t border-slate-100 flex items-center justify-between">
<div>
<span class="text-[11px] text-slate-400 font-bold uppercase">4 Sesi Akhir Pekan</span>
<div class="text-xl font-joy-display font-bold text-joy-grape-deep">Rp 1.650.000</div>
</div>
<a class="w-11 h-11 rounded-full bg-joy-grape-deep text-white flex items-center justify-center shadow-md hover:bg-joy-grape-vibrant transition-colors" href="#trial">
<i class="fa-solid fa-arrow-right text-sm"></i>
</a>
</div>
</div>
</div>
</div>
</section>
<!-- 6. Section Fasilitas & Wahana Sensori (Detail Baru Ceria) -->
<section class="py-20 bg-white" id="fasilitas">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="text-center max-w-3xl mx-auto mb-14">
<span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-joy-powder-soft text-joy-powder font-joy-display font-bold text-xs uppercase tracking-wider mb-3">
<i class="fa-solid fa-shield-dog"></i> Fasilitas Standar Internasional
        </span>
<h2 class="text-3xl sm:text-4xl font-extrabold text-joy-grape-deep font-joy-display">
          Wahana Sensori Indoor &amp; Keamanan Medis
        </h2>
<p class="text-slate-600 mt-2 text-base">Dirancang khusus untuk kenyamanan temperatur iklim tropis, higienis, serta ramah persendian anabul.</p>
</div>
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
<!-- Fasilitas 1 -->
<div class="p-6 rounded-3xl bg-joy-lilac-mist/80 border border-joy-lilac-bright/30 hover:shadow-lg transition-all group">
<div class="w-14 h-14 rounded-2xl bg-white shadow-sm flex items-center justify-center text-joy-grape-vibrant text-2xl mb-4 group-hover:scale-110 transition-transform">
<i class="fa-solid fa-baseball-bat-ball text-joy-cotton"></i>
</div>
<h4 class="font-joy-display text-lg font-bold text-joy-grape-deep mb-2">Jelly Ball &amp; Sniff Lounge</h4>
<p class="text-xs text-slate-600 leading-relaxed">
            Kolam bola pastel food-grade &amp; alas karpet scent-work aroma rumput lavender untuk relaksasi mental anabul.
          </p>
</div>
<!-- Fasilitas 2 -->
<div class="p-6 rounded-3xl bg-joy-cotton-soft/80 border border-joy-cotton/30 hover:shadow-lg transition-all group">
<div class="w-14 h-14 rounded-2xl bg-white shadow-sm flex items-center justify-center text-joy-cotton text-2xl mb-4 group-hover:scale-110 transition-transform">
<i class="fa-solid fa-rug"></i>
</div>
<h4 class="font-joy-display text-lg font-bold text-joy-grape-deep mb-2">Orthopedic Soft Mats</h4>
<p class="text-xs text-slate-600 leading-relaxed">
            Lantai busa peredam densitas tinggi dengan tekstur anti-slip, melindungi tempurung lutut (patella) ras anjing kecil dan besar.
          </p>
</div>
<!-- Fasilitas 3 -->
<div class="p-6 rounded-3xl bg-joy-powder-soft/80 border border-joy-powder/30 hover:shadow-lg transition-all group">
<div class="w-14 h-14 rounded-2xl bg-white shadow-sm flex items-center justify-center text-joy-powder text-2xl mb-4 group-hover:scale-110 transition-transform">
<i class="fa-solid fa-snowflake"></i>
</div>
<h4 class="font-joy-display text-lg font-bold text-joy-grape-deep mb-2">Full AC &amp; Hepa Filter</h4>
<p class="text-xs text-slate-600 leading-relaxed">
            Suhu terjaga stabil 22-24°C untuk mencegah heatstroke, dilengkapi 4 lapis HEPA filter penangkap bulu dan bulir alergen.
          </p>
</div>
<!-- Fasilitas 4 -->
<div class="p-6 rounded-3xl bg-purple-50 border border-purple-200 hover:shadow-lg transition-all group">
<div class="w-14 h-14 rounded-2xl bg-white shadow-sm flex items-center justify-center text-joy-grape-deep text-2xl mb-4 group-hover:scale-110 transition-transform">
<i class="fa-solid fa-pump-medical text-emerald-500"></i>
</div>
<h4 class="font-joy-display text-lg font-bold text-joy-grape-deep mb-2">Sanitasi UV-C &amp; Parvo Guard</h4>
<p class="text-xs text-slate-600 leading-relaxed">
            Sterilisasi lampu UV-C medis setiap pergantian batch dan disinfektan pet-safe untuk membasmi virus Parvo &amp; bakteri jahat.
          </p>
</div>
</div>
</div>
</section>
<!-- 7. Section Galeri Momen Latihan Anabul -->
<section class="py-16 bg-joy-iris-mist/70" id="galeri">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="flex flex-col sm:flex-row items-center justify-between mb-10 gap-4">
<div>
<span class="px-3.5 py-1.5 rounded-full bg-joy-powder-soft text-joy-powder font-joy-display font-bold text-xs uppercase tracking-wider">
            Dokumentasi Kelas Harian
          </span>
<h2 class="text-3xl sm:text-4xl font-extrabold text-joy-grape-deep font-joy-display mt-2">
            Galeri Keceriaan Para Lulusan
          </h2>
</div>
<div class="text-xs font-bold text-joy-grape-deep flex items-center gap-2 bg-white px-4 py-2 rounded-full border border-joy-lilac-bright/30">
<i class="fa-brands fa-instagram text-joy-cotton text-base"></i> @pawsandjoy.academy
        </div>
</div>
<div class="grid grid-cols-1 md:grid-cols-12 gap-6">
<!-- Big Card 1 -->
<div class="md:col-span-7 rounded-[32px] overflow-hidden border-4 border-white shadow-xl relative group">
<img alt="Golden Retriever Training di Taman Rumput" class="w-full h-[380px] object-cover group-hover:scale-105 transition-transform duration-700" src="https://lh3.googleusercontent.com/aida/AEtjO1Vh4s0l7fqrO0zYQqg2LnEH4gNVAgVzeARBvvy2H8jG5xdCdWGOgaBHTW8oEIUq7AL-M9KDY_K6wWBrsmzJnlI_azlGlCFMGafA9pktcGESkfCsV8OoscrNay6vlL5gsbZ_e1o7XXdkqr7Utsz2d_3geUFb1tlE7qA57JegH8kNpPcx39z-zJNmOfVpgVg9pxyrNKK4rhFD4xEJ6CjYS2S-b_19Gjw5jXH6ON-PQnJ2ShOYGV3EeKSZWRo"/>
<div class="absolute inset-0 bg-gradient-to-t from-joy-grape-deep/90 via-joy-grape-deep/30 to-transparent flex flex-col justify-end p-6 sm:p-8 text-white">
<span class="inline-block w-fit bg-joy-cotton text-white text-[10px] font-joy-display font-bold px-3 py-1 rounded-full uppercase tracking-wider mb-2">
              Outdoor Sensory Park BSD Hub
            </span>
<h4 class="text-xl sm:text-2xl font-bold font-joy-display">Latihan Fokus 'High-Five' &amp; Recall di Area Terbuka</h4>
<p class="text-xs text-white/80 mt-1">Membiasakan anabul tetap menatap mata pemilik meski ada distraksi burung dan aroma bunga.</p>
</div>
</div>
<!-- Big Card 2 -->
<div class="md:col-span-5 rounded-[32px] overflow-hidden border-4 border-white shadow-xl relative group">
<img alt="Puppy Academy Indoor Studio AC Kelapa Gading" class="w-full h-[380px] object-cover group-hover:scale-105 transition-transform duration-700" src="https://lh3.googleusercontent.com/aida/AEtjO1XUyh39Rth58Wv1PKjMYRKEOzYf_-moYIOJ1ScceYSSxPDq8evPZt5vE4mP6kkBE_malClmIqQeDLmmDQkswh2VW-Wqs_pGIAmOEJQ5VgxUYAtS0h0ZsqTQGNVBcDz3Hl2E5xw0mQvuRzR1cKW4J0ueEfXFqR4Up1IfOImXDTwa9pDGxOCeGdCkPeneM_xPRwjQQSv1UgDZDDutUkzt2XXb_yWrM0gdnJDkoYngCTlT3JsIh0OUR6zpdg"/>
<div class="absolute inset-0 bg-gradient-to-t from-joy-grape-deep/90 via-joy-grape-deep/30 to-transparent flex flex-col justify-end p-6 sm:p-8 text-white">
<span class="inline-block w-fit bg-joy-powder text-white text-[10px] font-joy-display font-bold px-3 py-1 rounded-full uppercase tracking-wider mb-2">
              Indoor AC Studio Kelapa Gading
            </span>
<h4 class="text-xl sm:text-2xl font-bold font-joy-display">Sosialisasi Anak Anjing yang Nyaman &amp; Tenang</h4>
<p class="text-xs text-white/80 mt-1">Interaksi aman antar anak anjing seumuran dengan pengawasan ketat trainer ahli.</p>
</div>
</div>
</div>
</div>
</section>
<!-- 8. Section Testimoni Pawrents Ceria (Cerita Nyata Lulusan) -->
<section class="py-20 bg-white relative" id="testimoni">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="text-center max-w-3xl mx-auto mb-14">
<span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-joy-cotton-soft text-joy-cotton font-joy-display font-bold text-xs uppercase tracking-wider mb-3">
<i class="fa-solid fa-heart"></i> Cerita Bahagia Keluarga Pawrents
        </span>
<h2 class="text-3xl sm:text-4xl font-extrabold text-joy-grape-deep font-joy-display">
          Transformasi Ceria Tanpa Rasa Trauma
        </h2>
<p class="text-slate-600 mt-2 text-base">Inilah perubahan nyata dari anabul yang dulunya cemas &amp; destruktif kini menjadi sahabat paling santun.</p>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
<!-- Review 1 -->
<div class="joy-glass-jelly p-7 rounded-[32px] border-2 border-joy-lilac-bright/30 shadow-sm relative flex flex-col justify-between">
<div>
<div class="flex items-center gap-1 text-amber-400 text-sm mb-4">
<i class="fa-solid fa-star"></i>
<i class="fa-solid fa-star"></i>
<i class="fa-solid fa-star"></i>
<i class="fa-solid fa-star"></i>
<i class="fa-solid fa-star"></i>
<span class="text-xs font-bold text-slate-400 ml-1">5.0</span>
</div>
<p class="text-slate-700 text-sm leading-relaxed mb-6 italic">
              "Sebelum ke Paws &amp; Joy, Mocha (Poodle 6 bulan) suka menggigit kabel charger dan histeris kalau ditinggal 5 menit. Setelah 4 sesi di sini, dia belajar mandiri di crate-nya tanpa menangis sama sekali!"
            </p>
</div>
<div class="flex items-center gap-3 pt-4 border-t border-slate-100">
<div class="w-12 h-12 rounded-full bg-gradient-to-tr from-joy-cotton to-joy-lilac text-white font-joy-display font-bold flex items-center justify-center text-base shadow-sm">
              CW
            </div>
<div>
<h5 class="font-joy-display font-bold text-joy-grape-deep text-sm">Clara &amp; Mocha</h5>
<p class="text-[11px] font-semibold text-joy-cotton">Lulusan Puppy Socialization</p>
</div>
</div>
</div>
<!-- Review 2 -->
<div class="joy-glass-jelly p-7 rounded-[32px] border-2 border-joy-cotton/40 shadow-sm relative flex flex-col justify-between">
<div>
<div class="flex items-center gap-1 text-amber-400 text-sm mb-4">
<i class="fa-solid fa-star"></i>
<i class="fa-solid fa-star"></i>
<i class="fa-solid fa-star"></i>
<i class="fa-solid fa-star"></i>
<i class="fa-solid fa-star"></i>
<span class="text-xs font-bold text-slate-400 ml-1">5.0</span>
</div>
<p class="text-slate-700 text-sm leading-relaxed mb-6 italic">
              "Boba si Corgi energinya ga pernah habis dan selalu narik tali leash sampai tangan lecet. Sekarang jalan-jalan santai di mall udah bisa jalan di samping saya dengan tenang tanpa gonggong orang asing."
            </p>
</div>
<div class="flex items-center gap-3 pt-4 border-t border-slate-100">
<div class="w-12 h-12 rounded-full bg-gradient-to-tr from-joy-powder to-joy-grape-vibrant text-white font-joy-display font-bold flex items-center justify-center text-base shadow-sm">
              RS
            </div>
<div>
<h5 class="font-joy-display font-bold text-joy-grape-deep text-sm">Reyhan &amp; Boba</h5>
<p class="text-[11px] font-semibold text-joy-cotton-vibrant">Lulusan Basic Obedience</p>
</div>
</div>
</div>
<!-- Review 3 -->
<div class="joy-glass-jelly p-7 rounded-[32px] border-2 border-joy-powder/40 shadow-sm relative flex flex-col justify-between">
<div>
<div class="flex items-center gap-1 text-amber-400 text-sm mb-4">
<i class="fa-solid fa-star"></i>
<i class="fa-solid fa-star"></i>
<i class="fa-solid fa-star"></i>
<i class="fa-solid fa-star"></i>
<i class="fa-solid fa-star"></i>
<span class="text-xs font-bold text-slate-400 ml-1">5.0</span>
</div>
<p class="text-slate-700 text-sm leading-relaxed mb-6 italic">
              "Pendekatan trainernya bener-bener ramah banget! Enggak ada bentakan atau tarik-tarik leher kasar. Anjing Golden kami malah excited banget tiap hari Sabtu waktu mobil belok ke arah academy."
            </p>
</div>
<div class="flex items-center gap-3 pt-4 border-t border-slate-100">
<div class="w-12 h-12 rounded-full bg-gradient-to-tr from-joy-grape-deep to-joy-cotton text-white font-joy-display font-bold flex items-center justify-center text-base shadow-sm">
              DS
            </div>
<div>
<h5 class="font-joy-display font-bold text-joy-grape-deep text-sm">dr. Stefanie &amp; Bailey</h5>
<p class="text-[11px] font-semibold text-joy-powder">Lulusan Agility &amp; Fun</p>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- 9. Section Formulir Booking Sesi Trial (Glassmorphism Grape Purple to Cotton Pink) -->
<section class="py-20 relative" id="trial">
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="rounded-[40px] shadow-2xl border-4 border-white/80 overflow-hidden grid grid-cols-1 lg:grid-cols-12 bg-white">
<!-- Left Side: Vibrant Purple-to-Pink Info -->
<div class="lg:col-span-5 bg-gradient-to-br from-joy-grape-deep via-joy-grape to-joy-cotton-vibrant text-white p-8 sm:p-10 flex flex-col justify-between relative overflow-hidden">
<!-- Cute subtle Paw prints decor -->
<div class="absolute -right-10 -bottom-10 opacity-10 text-white text-9xl pointer-events-none">
<i class="fa-solid fa-paw"></i>
</div>
<div class="relative z-10">
<div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-white/20 backdrop-blur-md text-xs font-joy-display font-bold mb-6 border border-white/30">
<i class="fa-solid fa-sparkles text-yellow-300"></i> Langkah Pertama Ceria
            </div>
<h3 class="text-3xl font-joy-display font-extrabold mb-4 leading-tight">
              Coba Dahulu Sesi Trial 60 Menit!
            </h3>
<p class="text-white/85 text-sm leading-relaxed mb-8">
              Belum yakin program mana yang pas? Trainer spesialis kami akan mengevaluasi bahasa tubuh, tingkat energi, dan kecerdasan adaptasi anabul Anda secara menyeluruh.
            </p>
<div class="space-y-4 text-xs font-semibold">
<div class="flex items-center gap-3">
<div class="w-8 h-8 rounded-xl bg-white/20 backdrop-blur flex items-center justify-center text-pink-200">
<i class="fa-solid fa-apple-whole"></i>
</div>
<span>Gratis Konsultasi Nutrisi &amp; Kebiasaan Tidur</span>
</div>
<div class="flex items-center gap-3">
<div class="w-8 h-8 rounded-xl bg-white/20 backdrop-blur flex items-center justify-center text-sky-200">
<i class="fa-solid fa-box-open"></i>
</div>
<span>Gratis Sensory Puppy Snack Box &amp; Clicker</span>
</div>
<div class="flex items-center gap-3">
<div class="w-8 h-8 rounded-xl bg-white/20 backdrop-blur flex items-center justify-center text-yellow-200">
<i class="fa-solid fa-heart-circle-check"></i>
</div>
<span>Garansi: No Force, Full Joy &amp; Bebas Komitmen</span>
</div>
</div>
</div>
<div class="pt-8 border-t border-white/20 text-xs text-white/80 relative z-10">
<span class="font-bold"><i class="fa-solid fa-headset mr-1"></i> Hubungi Konsultan Pelatih:</span>
<div class="mt-1 font-mono text-sm">+62 812-9900-8812</div>
</div>
</div>
<!-- Right Side: Clean Modern Form -->
<div class="lg:col-span-7 p-8 sm:p-10 bg-white">
<div class="flex items-center justify-between mb-6">
<h4 class="text-2xl font-bold font-joy-display text-joy-grape-deep">
              Formulir Reservasi Sesi Trial
            </h4>
<span class="text-2xl text-joy-cotton animate-bounce">
<i class="fa-solid fa-paw"></i>
</span>
</div>
<form id="joy-trial-form" class="space-y-4">
<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
<div>
<label class="block text-xs font-bold text-slate-700 mb-1.5">Nama Lengkap Pawrent</label>
<input class="w-full px-4 py-3 rounded-2xl bg-slate-50 border border-joy-lilac-bright/30 focus:bg-white focus:outline-none focus:ring-2 focus:ring-joy-cotton text-sm text-slate-800" placeholder="Contoh: Clara Wijaya" required="" type="text"/>
</div>
<div>
<label class="block text-xs font-bold text-slate-700 mb-1.5">Nomor WhatsApp Aktif</label>
<input class="w-full px-4 py-3 rounded-2xl bg-slate-50 border border-joy-lilac-bright/30 focus:bg-white focus:outline-none focus:ring-2 focus:ring-joy-cotton text-sm text-slate-800" placeholder="0812-xxxx-xxxx" required="" type="tel"/>
</div>
</div>
<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
<div>
<label class="block text-xs font-bold text-slate-700 mb-1.5">Nama &amp; Ras Anabul</label>
<input class="w-full px-4 py-3 rounded-2xl bg-slate-50 border border-joy-lilac-bright/30 focus:bg-white focus:outline-none focus:ring-2 focus:ring-joy-cotton text-sm text-slate-800" placeholder="Contoh: Mocha (Toy Poodle)" required="" type="text"/>
</div>
<div>
<label class="block text-xs font-bold text-slate-700 mb-1.5">Usia Anabul Saat Ini</label>
<select class="w-full px-4 py-3 rounded-2xl bg-slate-50 border border-joy-lilac-bright/30 focus:bg-white focus:outline-none focus:ring-2 focus:ring-joy-cotton text-sm text-slate-800">
<option>2 - 4 Bulan (Puppy Dini)</option>
<option>5 - 11 Bulan (Puppy Junior)</option>
<option>1 - 3 Tahun (Dewasa Muda)</option>
<option>&gt; 3 Tahun (Dewasa / Senior)</option>
</select>
</div>
</div>
<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
<div>
<label class="block text-xs font-bold text-slate-700 mb-1.5">Pilihan Lokasi Hub</label>
<select class="w-full px-4 py-3 rounded-2xl bg-slate-50 border border-joy-lilac-bright/30 focus:bg-white focus:outline-none focus:ring-2 focus:ring-joy-cotton text-sm text-slate-800">
<option>Kelapa Gading (Indoor Studio AC)</option>
<option>BSD City (Taman Rumput &amp; Agility Arena)</option>
<option>Home Visit (Khusus Terapi Privat)</option>
</select>
</div>
<div>
<label class="block text-xs font-bold text-slate-700 mb-1.5">Program Diminati</label>
<select class="w-full px-4 py-3 rounded-2xl bg-slate-50 border border-joy-lilac-bright/30 focus:bg-white focus:outline-none focus:ring-2 focus:ring-joy-cotton text-sm text-slate-800">
<option>Puppy Socialization (2 - 5 Bulan)</option>
<option>Basic Obedience (Kepatuhan Harian)</option>
<option>Behavioral Therapy (Masalah Reaktif)</option>
<option>Agility &amp; Play Fun Sports</option>
<option>Butuh Rekomendasi Trainer</option>
</select>
</div>
</div>
<div>
<label class="block text-xs font-bold text-slate-700 mb-1.5">Tantangan Utama Anabul (Opsional)</label>
<input class="w-full px-4 py-3 rounded-2xl bg-slate-50 border border-joy-lilac-bright/30 focus:bg-white focus:outline-none focus:ring-2 focus:ring-joy-cotton text-sm text-slate-800" placeholder="Contoh: Suka narik tali, takut petir, gigit jari tangan" type="text"/>
</div>
<button class="w-full mt-2 bg-gradient-to-r from-joy-cotton via-joy-cotton-vibrant to-joy-cotton text-white font-joy-display font-bold py-4 rounded-2xl shadow-joy-jelly-pink hover:translate-y-[-2px] active:translate-y-[2px] transition-all text-base flex items-center justify-center gap-2" type="submit">
<i class="fa-solid fa-paper-plane"></i>
<span>Kirim &amp; Ambil Diskon Trial 35%</span>
</button>
<p class="text-[11px] text-center text-slate-400 mt-2">
              🔒 Privasi terjamin. Kami tidak pernah membagikan data nomor telepon Anda kepada pihak ketiga.
            </p>
</form>
</div>
</div>
</div>
</section>
<!-- 10. Section FAQ Accordion Interaktif & Playful -->
<section class="py-20 bg-white" id="faq">
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="text-center mb-12">
<span class="px-3.5 py-1.5 rounded-full bg-joy-lilac-soft text-joy-grape-vibrant font-joy-display font-bold text-xs uppercase tracking-wider">
          Tanya Jawab Populer
        </span>
<h2 class="text-3xl sm:text-4xl font-extrabold text-joy-grape-deep font-joy-display mt-2">
          FAQ Seputar Pelatihan Ceria
        </h2>
<p class="text-slate-600 text-sm mt-2">Segala hal yang ingin Anda ketahui sebelum mengajak anabul ke akademi.</p>
</div>
<div class="space-y-4">
<details class="group bg-joy-iris rounded-3xl p-6 border-2 border-joy-lilac-bright/30 transition-all open:bg-white open:shadow-joy-jelly-sm" open="">
<summary class="flex items-center justify-between font-joy-display font-bold text-joy-grape-deep cursor-pointer text-base sm:text-lg">
<span class="flex items-center gap-3">
<i class="fa-solid fa-circle-question text-joy-cotton text-xl"></i>
<span>Berapa usia minimal anabul untuk mulai bergabung di kelas?</span>
</span>
<span class="w-8 h-8 rounded-full bg-joy-lilac-soft flex items-center justify-center text-joy-grape-vibrant group-open:rotate-180 transition-transform">
<i class="fa-solid fa-chevron-down text-xs"></i>
</span>
</summary>
<p class="text-slate-600 text-sm mt-4 pt-4 border-t border-joy-lilac-bright/20 leading-relaxed font-normal">
            Untuk kelas <strong>Puppy Socialization</strong>, usia minimal adalah <strong>8 minggu (2 bulan)</strong> dengan syarat minimal telah mendapatkan vaksinasi tahap pertama (Parvovirus &amp; Distemper) dan obat cacing rutin demi melindungi seluruh anabul di akademi.
          </p>
</details>
<details class="group bg-joy-iris rounded-3xl p-6 border-2 border-joy-lilac-bright/30 transition-all open:bg-white open:shadow-joy-jelly-sm">
<summary class="flex items-center justify-between font-joy-display font-bold text-joy-grape-deep cursor-pointer text-base sm:text-lg">
<span class="flex items-center gap-3">
<i class="fa-solid fa-circle-question text-joy-cotton text-xl"></i>
<span>Apa yang membedakan metode Fear-Free &amp; Positive Reinforcement?</span>
</span>
<span class="w-8 h-8 rounded-full bg-joy-lilac-soft flex items-center justify-center text-joy-grape-vibrant group-open:rotate-180 transition-transform">
<i class="fa-solid fa-chevron-down text-xs"></i>
</span>
</summary>
<p class="text-slate-600 text-sm mt-4 pt-4 border-t border-joy-lilac-bright/20 leading-relaxed font-normal">
            Metode lama kerap menggunakan penekanan (choke chain, kejutan, atau intimidasi suara keras). Di Paws &amp; Joy, kami memakai pendekatan berbasis sains perilaku modern: menghargai respons baik dengan <em>treats bernutrisi tinggi, pujian hangat, dan stimulasi ceria</em>, sehingga anabul mematuhi pawrent atas dasar cinta, bukan rasa takut.
          </p>
</details>
<details class="group bg-joy-iris rounded-3xl p-6 border-2 border-joy-lilac-bright/30 transition-all open:bg-white open:shadow-joy-jelly-sm">
<summary class="flex items-center justify-between font-joy-display font-bold text-joy-grape-deep cursor-pointer text-base sm:text-lg">
<span class="flex items-center gap-3">
<i class="fa-solid fa-circle-question text-joy-cotton text-xl"></i>
<span>Apakah pemilik (pawrents) harus hadir mendampingi selama sesi?</span>
</span>
<span class="w-8 h-8 rounded-full bg-joy-lilac-soft flex items-center justify-center text-joy-grape-vibrant group-open:rotate-180 transition-transform">
<i class="fa-solid fa-chevron-down text-xs"></i>
</span>
</summary>
<p class="text-slate-600 text-sm mt-4 pt-4 border-t border-joy-lilac-bright/20 leading-relaxed font-normal">
<strong>Sangat dianjurkan!</strong> Kunci keberhasilan belajar adalah transfer ilmu kepada orang tua anabul. Trainer kami memandu teknik gerak tubuh dan instruksi sehingga anabul akan tetap patuh dan ceria kepada Anda di rumah maupun tempat publik.
          </p>
</details>
<details class="group bg-joy-iris rounded-3xl p-6 border-2 border-joy-lilac-bright/30 transition-all open:bg-white open:shadow-joy-jelly-sm">
<summary class="flex items-center justify-between font-joy-display font-bold text-joy-grape-deep cursor-pointer text-base sm:text-lg">
<span class="flex items-center gap-3">
<i class="fa-solid fa-circle-question text-joy-cotton text-xl"></i>
<span>Apakah ada garansi jika anabul belum menguasai materi?</span>
</span>
<span class="w-8 h-8 rounded-full bg-joy-lilac-soft flex items-center justify-center text-joy-grape-vibrant group-open:rotate-180 transition-transform">
<i class="fa-solid fa-chevron-down text-xs"></i>
</span>
</summary>
<p class="text-slate-600 text-sm mt-4 pt-4 border-t border-joy-lilac-bright/20 leading-relaxed font-normal">
            Tentu! Kami menyediakan <strong>1 Sesi Remedial Ceria Tambahan gratis</strong> untuk program Basic Obedience dan pendampingan konsultasi video melalui WhatsApp Group privat bersama trainer selama 3 bulan setelah kelulusan.
          </p>
</details>
</div>
</div>
</section>
<!-- 11. Footer Mewah & Lengkap -->
<footer class="bg-gradient-to-b from-joy-grape-deep to-[#320c33] text-white pt-16 pb-12 border-t-4 border-joy-lilac-bright">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<!-- Top Newsletter Row -->
<div class="p-8 rounded-3xl bg-white/5 border border-white/10 backdrop-blur-md mb-12 flex flex-col md:flex-row items-center justify-between gap-6">
<div>
<div class="flex items-center gap-2 text-joy-cotton text-sm font-joy-display font-bold uppercase tracking-wider mb-1">
<i class="fa-solid fa-envelope-open-text"></i> Joyful Pawletter
          </div>
<h4 class="text-2xl font-joy-display font-bold">Dapatkan Tips Perilaku Anabul Setiap Selasa</h4>
<p class="text-xs text-white/70">Panduan gratis mengatasi stres anabul, resep treats alami, dan info promo kelas.</p>
</div>
<form class="flex w-full md:w-auto gap-2" onsubmit="event.preventDefault(); alert('Terima kasih! Anda telah terdaftar di buletin mingguan Paws &amp; Joy.');">
<input class="px-4 py-3 rounded-2xl bg-white/10 border border-white/20 text-white placeholder-white/50 text-xs focus:outline-none focus:ring-2 focus:ring-joy-cotton w-full sm:w-64" placeholder="Masukkan email Anda..." required="" type="email"/>
<button class="bg-joy-cotton hover:bg-joy-cotton-vibrant text-white font-joy-display font-bold px-5 py-3 rounded-2xl text-xs whitespace-nowrap shadow-md" type="submit">
            Langganan
          </button>
</form>
</div>
<!-- Main Columns -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-10 pb-12 border-b border-white/10">
<!-- Brand Summary -->
<div class="space-y-4">
<div class="flex items-center gap-3">
<div class="w-11 h-11 rounded-2xl bg-gradient-to-tr from-joy-cotton to-joy-powder flex items-center justify-center text-white shadow-md">
<i class="fa-solid fa-paw text-xl"></i>
</div>
<span class="font-joy-display text-2xl font-bold tracking-tight">Paws<span class="text-joy-cotton">&amp;</span>Joy</span>
</div>
<p class="text-xs text-joy-lilac-soft/80 leading-relaxed font-normal">
            Akademi pelatihan anabul modern dengan pendekatan ceria, positif, dan teruji ilmiah. Mengubah tantangan perilaku menjadi petualangan komunikasi penuh kasih.
          </p>
<div class="flex items-center gap-2.5 pt-2">
<a class="w-9 h-9 rounded-full bg-white/10 flex items-center justify-center hover:bg-joy-cotton hover:scale-110 transition-all text-sm" href="#"><i class="fa-brands fa-instagram"></i></a>
<a class="w-9 h-9 rounded-full bg-white/10 flex items-center justify-center hover:bg-joy-powder hover:scale-110 transition-all text-sm" href="#"><i class="fa-brands fa-tiktok"></i></a>
<a class="w-9 h-9 rounded-full bg-white/10 flex items-center justify-center hover:bg-joy-cotton-vibrant hover:scale-110 transition-all text-sm" href="#"><i class="fa-brands fa-youtube"></i></a>
<a class="w-9 h-9 rounded-full bg-white/10 flex items-center justify-center hover:bg-emerald-500 hover:scale-110 transition-all text-sm" href="https://wa.me/6281299008812"><i class="fa-brands fa-whatsapp"></i></a>
</div>
</div>
<!-- Links 1: Program Belajar -->
<div>
<h5 class="font-joy-display font-bold text-sm text-pink-300 uppercase tracking-wider mb-4">Kurikulum Unggulan</h5>
<ul class="space-y-2.5 text-xs text-white/80 font-medium">
<li><a class="hover:text-pink-300 transition-colors flex items-center gap-1.5" href="#program"><i class="fa-solid fa-angle-right text-[10px] text-pink-400"></i> Puppy Socialization (2-5 Bln)</a></li>
<li><a class="hover:text-pink-300 transition-colors flex items-center gap-1.5" href="#program"><i class="fa-solid fa-angle-right text-[10px] text-pink-400"></i> Basic Obedience Ramah</a></li>
<li><a class="hover:text-pink-300 transition-colors flex items-center gap-1.5" href="#program"><i class="fa-solid fa-angle-right text-[10px] text-pink-400"></i> Behavioral Modification</a></li>
<li><a class="hover:text-pink-300 transition-colors flex items-center gap-1.5" href="#program"><i class="fa-solid fa-angle-right text-[10px] text-pink-400"></i> Agility &amp; Play Fun Arena</a></li>
<li><a class="hover:text-pink-300 transition-colors flex items-center gap-1.5" href="#trial"><i class="fa-solid fa-angle-right text-[10px] text-pink-400"></i> Asesmen Trial 60 Menit</a></li>
</ul>
</div>
<!-- Links 2: Fasilitas & Kebijakan -->
<div>
<h5 class="font-joy-display font-bold text-sky-300 uppercase tracking-wider mb-4 text-sm">Fasilitas &amp; Edukasi</h5>
<ul class="space-y-2.5 text-xs text-white/80 font-medium">
<li><a class="hover:text-sky-300 transition-colors flex items-center gap-1.5" href="#fasilitas"><i class="fa-solid fa-angle-right text-[10px] text-sky-400"></i> Wahana Jelly Ball Pool</a></li>
<li><a class="hover:text-sky-300 transition-colors flex items-center gap-1.5" href="#fasilitas"><i class="fa-solid fa-angle-right text-[10px] text-sky-400"></i> Matras Ortopedi Anti-Cedera</a></li>
<li><a class="hover:text-sky-300 transition-colors flex items-center gap-1.5" href="#metode"><i class="fa-solid fa-angle-right text-[10px] text-sky-400"></i> Protokol Medis Fear-Free</a></li>
<li><a class="hover:text-sky-300 transition-colors flex items-center gap-1.5" href="#faq"><i class="fa-solid fa-angle-right text-[10px] text-sky-400"></i> Jadwal Weekend &amp; Weekday</a></li>
<li><a class="hover:text-sky-300 transition-colors flex items-center gap-1.5" href="#faq"><i class="fa-solid fa-angle-right text-[10px] text-sky-400"></i> Syarat Vaksinasi Anabul</a></li>
</ul>
</div>
<!-- Location & Contact -->
<div>
<h5 class="font-joy-display font-bold text-joy-lilac-bright uppercase tracking-wider mb-4 text-sm">Lokasi &amp; Jam Operasional</h5>
<div class="space-y-3 text-xs text-white/80 leading-relaxed font-normal">
<p class="flex items-start gap-2">
<i class="fa-solid fa-map-pin text-joy-cotton mt-1"></i>
<span><strong>Hub 1:</strong> Jl. Boulevard Raya Blok PA-12, Kelapa Gading (Indoor AC Studio)</span>
</p>
<p class="flex items-start gap-2">
<i class="fa-solid fa-map-pin text-sky-400 mt-1"></i>
<span><strong>Hub 2:</strong> Taman Tekno Blok G-5, BSD City (Agility &amp; Grass Park)</span>
</p>
<p class="flex items-center gap-2 pt-1 text-white font-semibold">
<i class="fa-regular fa-clock text-yellow-300"></i>
<span>Selasa - Minggu: 08.30 - 17.30 WIB</span>
</p>
</div>
</div>
</div>
<!-- Copyright -->
<div class="pt-8 flex flex-col sm:flex-row items-center justify-between text-xs text-white/60">
<p>© 2025 Paws &amp; Joy Pet Academy. Seluruh Hak Cipta Dilindungi.</p>
<div class="flex gap-6 mt-4 sm:mt-0">
<a class="hover:text-white transition-colors" href="#">Kebijakan Privasi</a>
<a class="hover:text-white transition-colors" href="#">Syarat &amp; Ketentuan Akademi</a>
<a class="hover:text-white transition-colors" href="#">Sertifikasi Pelatih</a>
</div>
</div>
</div>
</footer>
<!-- 12. Floating Action Buttons (AI Assistant & WhatsApp) -->
<div class="fixed bottom-6 right-6 z-50 flex flex-col items-end gap-3.5 pointer-events-auto">
<!-- Floating AI Chatbot Button -->
<a class="w-14 h-14 rounded-full bg-gradient-to-r from-joy-grape-vibrant to-joy-cotton text-white flex items-center justify-center shadow-joy-jelly-purple hover:scale-110 active:scale-95 transition-all border-2 border-white group relative" href="#trial" title="Tanya AI PawsBot">
<i class="fa-solid fa-robot text-xl"></i>
<span class="absolute -top-1 -right-1 flex h-4 w-4">
<span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-joy-cotton opacity-75"></span>
<span class="relative inline-flex rounded-full h-4 w-4 bg-joy-cotton border-2 border-white"></span>
</span>
<span class="absolute right-16 top-2 bg-joy-grape-deep text-white font-joy-display text-xs font-bold px-3 py-1.5 rounded-xl shadow-lg whitespace-nowrap opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none border border-joy-lilac-bright/40">
        🤖 Tanya AI PawsBot
      </span>
</a>
<!-- Floating WhatsApp Button -->
<a class="w-14 h-14 rounded-full bg-emerald-500 hover:bg-emerald-600 text-white flex items-center justify-center shadow-lg hover:scale-110 active:scale-95 transition-all border-2 border-white group relative" href="https://wa.me/6281299008812?text=Halo%20Paws%20%26%20Joy!%20Saya%20ingin%20tanya%20jadwal%20trial%20anabul." target="_blank" title="Chat WhatsApp CS">
<i class="fa-brands fa-whatsapp text-2xl"></i>
<span class="absolute right-16 top-2 bg-emerald-700 text-white font-joy-display text-xs font-bold px-3 py-1.5 rounded-xl shadow-lg whitespace-nowrap opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none">
        💬 Chat CS Konsultan
      </span>
</a>
</div>
<script>
  document.getElementById('joy-trial-form')?.addEventListener('submit', function (event) {
    event.preventDefault();

    const fields = Array.from(this.querySelectorAll('input, select, textarea'))
      .map(function (field) {
        const label = field.parentElement.querySelector('label');
        return label ? label.textContent.trim() + ': ' + field.value.trim() : null;
      })
      .filter(Boolean);
    const message = 'Halo Paws & Joy! Saya ingin mendaftar untuk sesi trial.\n' + fields.join('\n');

    window.open('https://wa.me/6281299008812?text=' + encodeURIComponent(message), '_blank', 'noopener,noreferrer');
  });
</script>
</body></html>