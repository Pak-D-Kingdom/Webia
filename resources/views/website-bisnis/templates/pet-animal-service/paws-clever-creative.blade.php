<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Paws & Clever - Akademi & Pelatihan Hewan Peliharaan</title>
<!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Fredoka:wght@500;600;700&display=swap" rel="stylesheet">
  @vite('resources/css/app.css')
  <!-- Font Awesome CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
    .bg-blob-pattern {
      background-color: #FDFBF7;
      background-image: radial-gradient(#d7eff2 1.5px, transparent 1.5px), radial-gradient(#EDE4D1 1.5px, #FDFBF7 1.5px);
      background-size: 60px 60px;
      background-position: 0 0, 30px 30px;
    }
    .custom-shape-divider {
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100%;
      overflow: hidden;
      line-height: 0;
    }
    details > summary::-webkit-details-marker {
      display: none;
    }
    body.paws-template-preview > :not(header):not(#beranda) { display: none !important; }
  </style>
</head>
<body class="bg-paws-sand-50 text-slate-800 font-paws-sans antialiased selection:bg-paws-amber-400 selection:text-white{{ request()->boolean('preview') ? ' paws-template-preview' : '' }}">

  <!-- 1. TOPBAR KECIL -->
  <header class="w-full">
    <div class="bg-paws-teal-900 text-paws-teal-100 text-xs sm:text-sm py-2 px-4 transition-all">
      <div class="max-w-7xl mx-auto flex flex-col sm:flex-row justify-between items-center gap-2">
        <div class="flex items-center space-x-2 font-medium">
          <span class="bg-paws-amber-500 text-white text-[10px] font-bold px-2 py-0.5 rounded-full uppercase tracking-wider">Promo Khusus</span>
          <span class="flex items-center gap-1.5">
            <i class="fa-solid fa-graduation-cap text-paws-amber-400"></i>
            Daftar Batch Pelatihan Bulan Ini & Diskon Sesi Trial 30%!
          </span>
        </div>
        <div class="flex items-center space-x-6 text-xs text-teal-200">
          <div class="flex items-center gap-1.5">
            <i class="fa-regular fa-clock text-paws-amber-400"></i>
            <span>Jadwal Kelas: Selasa - Minggu (08:00 - 17:00)</span>
          </div>
          <div class="hidden md:flex items-center gap-1.5 border-l border-paws-teal-700/60 pl-4">
            <i class="fa-solid fa-location-dot text-paws-amber-400"></i>
            <span>Tangerang & BSD City</span>
          </div>
        </div>
      </div>
    </div>

    <!-- NAVBAR UTAMA -->
    <nav class="sticky top-0 z-40 bg-paws-sand-50/95 backdrop-blur-md border-b border-paws-sand-200 shadow-sm transition">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
          
          <!-- Brand Logo -->
          <a href="#" class="flex items-center gap-3 group">
            <div class="w-12 h-12 rounded-2xl bg-paws-teal-800 flex items-center justify-center p-1.5 shadow-md shadow-paws-teal-900/10 group-hover:rotate-6 transition-transform overflow-hidden">
              <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuB1DeCsspdWbkr10K_S7D2On0GcZj7E6iSCRUuyQETDBu_3I3F1cE344e1Jz3wZc8TKiH69RX6tcyKPgI2ClXZm4TXowXeb7w6IpIlSpc8EyKMjwZXJDVXMYleNVwod8FNG1bbG7iOe6rf7lfb7ZCy1avKlcX0xtzs9nbSAsVrnqLu-QYv_SKU6RJdgYBgQNIepXMhksMrmh2pfeQ9kvS0gJXVY3q5hJx8HiiUJFf3xeeMBtLlmRL28" alt="Logo Paws & Clever" class="w-full h-full object-contain">
            </div>
            <div class="flex flex-col">
              <span class="text-2xl font-paws-display font-bold text-paws-teal-900 tracking-tight leading-none group-hover:text-paws-amber-500 transition-colors">Paws & Clever</span>
              <span class="text-[11px] font-semibold text-slate-500 tracking-wider uppercase mt-1">Pet Training Academy</span>
            </div>
          </a>

          <!-- Nav Links -->
          <div class="hidden md:flex items-center space-x-8 font-semibold text-sm text-slate-700">
            <a href="#beranda" class="text-paws-teal-800 hover:text-paws-amber-500 transition flex items-center gap-1">
              <i class="fa-solid fa-house-chimney text-xs"></i> Beranda
            </a>
            <a href="#program" class="hover:text-paws-teal-800 transition flex items-center gap-1">
              <i class="fa-solid fa-bone text-xs"></i> Program Pelatihan
            </a>
            <a href="#metode" class="hover:text-paws-teal-800 transition flex items-center gap-1">
              <i class="fa-solid fa-award text-xs"></i> Metode
            </a>
            <a href="#galeri" class="hover:text-paws-teal-800 transition flex items-center gap-1">
              <i class="fa-solid fa-camera text-xs"></i> Galeri
            </a>
            <a href="#faq" class="hover:text-paws-teal-800 transition flex items-center gap-1">
              <i class="fa-solid fa-circle-question text-xs"></i> FAQ
            </a>
          </div>

          <!-- CTA Button -->
          <div class="flex items-center gap-3">
            <a href="#kontak" class="hidden sm:inline-flex items-center gap-2 text-sm font-bold text-paws-teal-800 hover:text-paws-amber-600 px-4 py-2.5 rounded-full transition">
              <i class="fa-solid fa-phone"></i> Hubungi Kami
            </a>
            <a href="#trial" class="inline-flex items-center gap-2 bg-paws-amber-500 hover:bg-paws-amber-600 text-white text-sm font-bold px-6 py-3 rounded-full shadow-lg shadow-paws-amber-500/25 hover:shadow-xl hover:-translate-y-0.5 active:translate-y-0 transition duration-200">
              <i class="fa-solid fa-paw"></i>
              <span>Daftar Kelas</span>
            </a>
          </div>

        </div>
      </div>
    </nav>
  </header>

  <!-- 2. HERO SECTION DENGAN GAYA CREATIVE & ORGANIC SHAPES -->
  <section id="beranda" class="relative pt-12 pb-24 lg:pt-16 lg:pb-32 overflow-hidden bg-blob-pattern">
    <!-- Decorative floating organic blobs -->
    <div class="absolute -top-24 -right-24 w-96 h-96 bg-paws-amber-400/15 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute top-1/2 -left-28 w-80 h-80 bg-paws-teal-700/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-10 right-1/3 w-64 h-64 bg-amber-200/40 rounded-full blur-2xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center">
        
        <!-- Text Content -->
        <div class="lg:col-span-7 space-y-6 text-center lg:text-left">
          
          <div class="inline-flex items-center gap-2.5 bg-paws-sand-100 border border-paws-sand-200/80 px-4 py-2 rounded-full text-paws-teal-900 text-xs sm:text-sm font-bold shadow-sm">
            <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-pulse"></span>
            <i class="fa-solid fa-heart text-paws-amber-500"></i>
            Pelatihan Berbasis Positive Reinforcement 100% Bebas Paksaan
          </div>

          <h1 class="font-paws-display text-4xl sm:text-5xl lg:text-6xl font-bold text-paws-teal-900 leading-[1.15] tracking-tight">
            Membentuk Sahabat Bulu yang <span class="relative inline-block text-paws-amber-500">
              Pintar
              <svg class="absolute -bottom-2 left-0 w-full" viewBox="0 0 100 12" fill="none" preserveAspectRatio="none">
                <path d="M0 6C30 14 70 -2 100 6" stroke="#D97706" stroke-width="4" stroke-linecap="round"/>
              </svg>
            </span> & Bahagia!
          </h1>

          <p class="text-slate-600 text-base sm:text-lg max-w-2xl mx-auto lg:mx-0 leading-relaxed font-normal">
            Bukan sekadar kepatuhan kaku. Di <strong class="text-paws-teal-900">Paws & Clever</strong>, kami membangun komunikasi dua arah yang harmonis antara anabul dan pawrents melalui metode bermain terarah, stimulasi kognitif, dan cinta kasih.
          </p>

          <!-- Action Buttons -->
          <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4 pt-2">
            <a href="#trial" class="w-full sm:w-auto inline-flex items-center justify-center gap-3 bg-paws-teal-800 hover:bg-paws-teal-900 text-white font-bold text-base px-8 py-4 rounded-full shadow-xl shadow-paws-teal-900/20 hover:scale-[1.02] active:scale-[0.98] transition">
              <i class="fa-solid fa-calendar-check text-paws-amber-400 text-lg"></i>
              <span>Pesan Sesi Trial</span>
            </a>
            <a href="#program" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-white hover:bg-paws-sand-100 text-paws-teal-900 font-bold text-base px-7 py-4 rounded-full border border-paws-sand-200 shadow-sm hover:border-paws-amber-400 transition">
              <i class="fa-solid fa-compass text-paws-amber-500"></i>
              <span>Eksplor Program</span>
            </a>
          </div>

          <!-- Trust Badges & Micro Metrics -->
          <div class="pt-6 border-t border-paws-sand-200/80 grid grid-cols-3 gap-4 max-w-lg mx-auto lg:mx-0">
            <div class="text-center lg:text-left">
              <p class="font-paws-display text-2xl sm:text-3xl font-bold text-paws-teal-900">1.200+</p>
              <p class="text-xs text-slate-500 font-medium mt-0.5">Anabul Lulus Ceria</p>
            </div>
            <div class="text-center lg:text-left">
              <p class="font-paws-display text-2xl sm:text-3xl font-bold text-paws-amber-500">15+</p>
              <p class="text-xs text-slate-500 font-medium mt-0.5">Trainer Tersertifikasi</p>
            </div>
            <div class="text-center lg:text-left">
              <p class="font-paws-display text-2xl sm:text-3xl font-bold text-paws-teal-800">4.9 / 5</p>
              <p class="text-xs text-slate-500 font-medium mt-0.5">Kepuasan Pawrents</p>
            </div>
          </div>

        </div>

        <!-- Hero Visuals (Asymmetrical & Organic Composition) -->
        <div class="lg:col-span-5 relative">
          <!-- Main Hero Image Frame -->
          <div class="relative mx-auto max-w-md lg:max-w-none">
            
            <!-- Background artistic frame -->
            <div class="absolute inset-0 bg-paws-amber-400 rounded-paws-organic transform rotate-3 scale-105 opacity-80"></div>
            <div class="absolute inset-0 bg-paws-teal-800 rounded-paws-organic-alt transform -rotate-2 scale-102 opacity-20"></div>
            
            <!-- Real Generated Image -->
            <div class="relative bg-white p-3 rounded-paws-organic shadow-2xl overflow-hidden border-4 border-white">
              <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuDJmexABnWNF60Of-yYNxwCVJF1C9YPo3kjCzBsKitEwS7OMmd91gZW4FcAyNNXADPhIw5GWTX5JD9g_9cYPADckH__i-jqm-L9qIjRvJhxnSOwbamS9k-lp27YJxkQOs-vB2idEMMIpXXZA1WlaavBVSYgwHhsfHNT-tP8gCUpRmSHiAgI02fsgWapFUuYKX2kkc5mLMnLP9m-g5cej7PDukw1zzLzp2ookacyOCq53gAp-h6Cbx4R" alt="Sesi Pelatihan Anjing Outdoor Paws & Clever" class="w-full h-[380px] sm:h-[420px] object-cover rounded-2xl hover:scale-105 transition-transform duration-500">
              
              <!-- Subtle badge on image -->
              <div class="absolute bottom-6 left-6 right-6 bg-white/95 backdrop-blur-md p-3.5 rounded-2xl shadow-lg border border-paws-sand-100 flex items-center justify-between">
                <div class="flex items-center gap-3">
                  <div class="w-10 h-10 rounded-xl bg-amber-100 text-paws-amber-600 flex items-center justify-center font-bold text-lg">
                    <i class="fa-solid fa-shield-dog"></i>
                  </div>
                  <div>
                    <h2 class="text-xs font-bold text-paws-teal-900">Outdoor Agility & Fun Park</h2>
                    <p class="text-[11px] text-slate-500 font-medium">Area rumput aman 2.000m²</p>
                  </div>
                </div>
                <span class="inline-flex items-center text-xs font-bold text-emerald-600 bg-emerald-50 px-2.5 py-1 rounded-full">
                  <i class="fa-solid fa-check-double mr-1"></i> Terakreditasi
                </span>
              </div>
            </div>

            <!-- Floating Stamp Card 1 -->
            <div class="absolute -top-6 -left-6 bg-paws-teal-800 text-white p-3 sm:p-4 rounded-2xl shadow-xl flex items-center gap-3 border-2 border-white animate-bounce" style="animation-duration: 4s;">
              <div class="w-9 h-9 rounded-xl bg-paws-amber-400 text-paws-teal-900 flex items-center justify-center font-bold text-base">
                <i class="fa-solid fa-thumbs-up"></i>
              </div>
              <div class="text-left pr-2">
                <p class="text-[10px] text-teal-200 uppercase font-bold tracking-wider">Garansi Suasana</p>
                <p class="text-xs font-bold">100% Happy Tail</p>
              </div>
            </div>

            <!-- Floating Stamp Card 2 -->
            <div class="absolute -bottom-6 -right-4 bg-paws-sand-100 text-paws-teal-900 p-3 sm:p-4 rounded-2xl shadow-xl flex items-center gap-3 border-2 border-paws-amber-400">
              <div class="w-9 h-9 rounded-full bg-paws-amber-500 text-white flex items-center justify-center text-sm">
                <i class="fa-solid fa-certificate"></i>
              </div>
              <div>
                <p class="text-xs font-bold">CPDT-KA Certified</p>
                <p class="text-[10px] text-slate-500">Standar Internasional</p>
              </div>
            </div>

          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- 3. SECTION NILAI KEUNGGULAN / KENAPA MEMILIH KAMI -->
  <section class="py-16 bg-white border-y border-paws-sand-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center max-w-3xl mx-auto mb-12">
        <span class="text-paws-amber-500 font-bold uppercase text-xs tracking-wider">Pendekatan Ramah Hewan</span>
        <h2 class="font-paws-display text-3xl sm:text-4xl font-bold text-paws-teal-900 mt-2">Prinsip Pelatihan Paws & Clever</h2>
        <p class="text-slate-600 text-sm sm:text-base mt-2">Kami mengutamakan kesejahteraan psikologis hewan kesayangan Anda tanpa rasa takut atau intimidasi.</p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        
        <!-- Pillar 1 -->
        <div class="p-8 rounded-3xl bg-paws-sand-50 border border-paws-sand-200/80 hover:border-paws-amber-400 hover:shadow-lg transition group">
          <div class="w-14 h-14 rounded-2xl bg-amber-100 text-paws-amber-600 flex items-center justify-center text-2xl mb-6 group-hover:scale-110 group-hover:bg-paws-amber-500 group-hover:text-white transition">
            <i class="fa-solid fa-cookie-bite"></i>
          </div>
          <h3 class="font-paws-display text-xl font-bold text-paws-teal-900 mb-2">Hadiah Positif (Treat & Praise)</h3>
          <p class="text-slate-600 text-sm leading-relaxed">
            Menghargai perilaku baik dengan stimulasi camilan lezat, mainan favorit, dan pujian hangat agar anabul bersemangat belajar.
          </p>
        </div>

        <!-- Pillar 2 -->
        <div class="p-8 rounded-3xl bg-paws-sand-50 border border-paws-sand-200/80 hover:border-paws-teal-700 hover:shadow-lg transition group">
          <div class="w-14 h-14 rounded-2xl bg-paws-teal-100 text-paws-teal-800 flex items-center justify-center text-2xl mb-6 group-hover:scale-110 group-hover:bg-paws-teal-800 group-hover:text-white transition">
            <i class="fa-solid fa-brain"></i>
          </div>
          <h3 class="font-paws-display text-xl font-bold text-paws-teal-900 mb-2">Stimulasi Kognitif Berimbang</h3>
          <p class="text-slate-600 text-sm leading-relaxed">
            Melatih daya pikir dan pemecahan masalah dengan permainan puzzle serta rintangan menyenangkan untuk mencegah rasa bosan.
          </p>
        </div>

        <!-- Pillar 3 -->
        <div class="p-8 rounded-3xl bg-paws-sand-50 border border-paws-sand-200/80 hover:border-paws-amber-400 hover:shadow-lg transition group">
          <div class="w-14 h-14 rounded-2xl bg-amber-100 text-paws-amber-600 flex items-center justify-center text-2xl mb-6 group-hover:scale-110 group-hover:bg-paws-amber-500 group-hover:text-white transition">
            <i class="fa-solid fa-hands-holding-child"></i>
          </div>
          <h3 class="font-paws-display text-xl font-bold text-paws-teal-900 mb-2">Edukasi Terpadu untuk Pawrents</h3>
          <p class="text-slate-600 text-sm leading-relaxed">
            Kami membimbing pemilik agar mengerti bahasa tubuh anabul, sinyal stres, dan cara konsisten menerapkan aturan di rumah.
          </p>
        </div>

      </div>
    </div>
  </section>

  <!-- 4. SECTION LAYANAN / PROGRAM PELATIHAN (4 PROGRAM UTAMA) -->
  <section id="program" class="py-20 bg-paws-sand-100/60 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      
      <div class="flex flex-col md:flex-row md:items-end justify-between mb-14 gap-6">
        <div>
          <div class="inline-flex items-center gap-2 text-xs font-bold text-paws-amber-600 uppercase tracking-wider mb-2">
            <i class="fa-solid fa-list-check"></i> Kurikulum Terstruktur
          </div>
          <h2 class="font-paws-display text-3xl sm:text-4xl font-bold text-paws-teal-900">Program Pelatihan Unggulan</h2>
          <p class="text-slate-600 text-base max-w-xl mt-2">Pilih kelas yang paling sesuai dengan tingkatan usia, karakter, serta kebutuhan spesifik anabul Anda.</p>
        </div>

        <!-- Filter Pill Preview / Info -->
        <div class="flex items-center gap-2 bg-white px-4 py-2 rounded-2xl border border-paws-sand-200 shadow-sm text-xs font-semibold text-paws-teal-900">
          <i class="fa-solid fa-users text-paws-amber-500"></i>
          <span>Maksimal 4-6 anjing per batch kelas tatap muka</span>
        </div>
      </div>

      <!-- 4 Program Cards -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        
        <!-- Program 1: Puppy Socialization -->
        <div class="bg-white rounded-3xl p-6 border border-paws-sand-200 shadow-sm hover:shadow-xl hover:-translate-y-1 transition duration-300 flex flex-col justify-between group">
          <div>
            <div class="relative rounded-2xl overflow-hidden mb-5 h-44 bg-paws-teal-50">
              <span class="absolute top-3 left-3 bg-paws-amber-500 text-white text-[11px] font-bold px-3 py-1 rounded-full z-10 shadow-sm">
                Usia 2 - 5 Bulan
              </span>
              <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuCManRIZhw0EYA-STkyeZw9cDQfdaqxY0ZhkM8xIJdZs8NUBERR0_bFSg6cDQ4K5aJzq9tdgLSlDfRysVpx_LVf3MSIjrFxk_CyQjBPJ2dy8OFsCLPl9hPu6hBRINIj2IlYd-HbLtuZbdk_Xl42A1ytc6CKymZdvPPetIMUwQ0Zo1IbkMk3E7w5Oabby1UHN_3geI-QR-uvdBGk-UhUdEed7famM2GTWv1b4N1hAspX59au0zCSK3mh" alt="Puppy Socialization Class" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
            </div>
            
            <div class="flex items-center gap-2 text-xs font-bold text-paws-teal-800 mb-1">
              <i class="fa-solid fa-paw text-paws-amber-500"></i> Fondasi Dini
            </div>
            <h3 class="font-paws-display text-xl font-bold text-paws-teal-900 group-hover:text-paws-amber-500 transition-colors">Puppy Socialization</h3>
            
            <p class="text-slate-600 text-xs sm:text-sm mt-2 leading-relaxed">
              Membangun rasa percaya diri anak anjing saat berinteraksi dengan manusia, suara sekitar, permukaan baru, dan anjing ramah lainnya.
            </p>

            <ul class="mt-4 space-y-2 text-xs text-slate-700">
              <li class="flex items-center gap-2">
                <i class="fa-solid fa-circle-check text-emerald-500"></i> Toilet & Crate Training
              </li>
              <li class="flex items-center gap-2">
                <i class="fa-solid fa-circle-check text-emerald-500"></i> Mengatasi Kebiasaan Menggigit
              </li>
              <li class="flex items-center gap-2">
                <i class="fa-solid fa-circle-check text-emerald-500"></i> Adaptasi Suara & Sentuhan
              </li>
            </ul>
          </div>

          <div class="pt-6 mt-6 border-t border-paws-sand-100 flex items-center justify-between">
            <div>
              <span class="text-[11px] text-slate-400 block font-medium">Durasi: 4 Minggu</span>
              <span class="text-sm font-bold text-paws-teal-900">Rp 1.450.000</span>
            </div>
            <a href="#trial" class="w-9 h-9 rounded-full bg-paws-sand-100 text-paws-teal-800 group-hover:bg-paws-amber-500 group-hover:text-white flex items-center justify-center transition">
              <i class="fa-solid fa-arrow-right text-xs"></i>
            </a>
          </div>
        </div>

        <!-- Program 2: Basic Obedience -->
        <div class="bg-white rounded-3xl p-6 border-2 border-paws-teal-800/20 shadow-md hover:shadow-xl hover:-translate-y-1 transition duration-300 flex flex-col justify-between group relative">
          <div class="absolute -top-3 right-6 bg-paws-teal-800 text-amber-300 text-[10px] font-extrabold uppercase tracking-wider px-3 py-0.5 rounded-full shadow">
            Favorit Pawrents
          </div>

          <div>
            <div class="relative rounded-2xl overflow-hidden mb-5 h-44 bg-paws-sand-200">
              <span class="absolute top-3 left-3 bg-paws-teal-800 text-white text-[11px] font-bold px-3 py-1 rounded-full z-10 shadow-sm">
                Usia 5 Bulan Ke Atas
              </span>
              <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuDJmexABnWNF60Of-yYNxwCVJF1C9YPo3kjCzBsKitEwS7OMmd91gZW4FcAyNNXADPhIw5GWTX5JD9g_9cYPADckH__i-jqm-L9qIjRvJhxnSOwbamS9k-lp27YJxkQOs-vB2idEMMIpXXZA1WlaavBVSYgwHhsfHNT-tP8gCUpRmSHiAgI02fsgWapFUuYKX2kkc5mLMnLP9m-g5cej7PDukw1zzLzp2ookacyOCq53gAp-h6Cbx4R" alt="Basic Obedience Training" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
            </div>

            <div class="flex items-center gap-2 text-xs font-bold text-paws-teal-800 mb-1">
              <i class="fa-solid fa-medal text-paws-amber-500"></i> Kepatuhan Etika
            </div>
            <h3 class="font-paws-display text-xl font-bold text-paws-teal-900 group-hover:text-paws-amber-500 transition-colors">Basic Obedience</h3>
            
            <p class="text-slate-600 text-xs sm:text-sm mt-2 leading-relaxed">
              Mengajarkan komando krusial sehari-hari untuk keamanan di rumah maupun ruang publik dengan kendali tali yang santai.
            </p>

            <ul class="mt-4 space-y-2 text-xs text-slate-700">
              <li class="flex items-center gap-2">
                <i class="fa-solid fa-circle-check text-emerald-500"></i> Duduk, Diam, Tunggu, Datang
              </li>
              <li class="flex items-center gap-2">
                <i class="fa-solid fa-circle-check text-emerald-500"></i> Loose-Leash Walking (Jalan Santai)
              </li>
              <li class="flex items-center gap-2">
                <i class="fa-solid fa-circle-check text-emerald-500"></i> Kontrol Impuls & Drop It
              </li>
            </ul>
          </div>

          <div class="pt-6 mt-6 border-t border-paws-sand-100 flex items-center justify-between">
            <div>
              <span class="text-[11px] text-slate-400 block font-medium">Durasi: 6 Minggu</span>
              <span class="text-sm font-bold text-paws-teal-900">Rp 1.950.000</span>
            </div>
            <a href="#trial" class="w-9 h-9 rounded-full bg-paws-teal-800 text-white group-hover:bg-paws-amber-500 flex items-center justify-center transition">
              <i class="fa-solid fa-arrow-right text-xs"></i>
            </a>
          </div>
        </div>

        <!-- Program 3: Behavioral Modification -->
        <div class="bg-white rounded-3xl p-6 border border-paws-sand-200 shadow-sm hover:shadow-xl hover:-translate-y-1 transition duration-300 flex flex-col justify-between group">
          <div>
            <div class="relative rounded-2xl overflow-hidden mb-5 h-44 bg-amber-50 flex items-center justify-center text-paws-teal-800">
              <span class="absolute top-3 left-3 bg-paws-amber-600 text-white text-[11px] font-bold px-3 py-1 rounded-full z-10 shadow-sm">
                Sesi Privat 1-on-1
              </span>
              <div class="text-center p-4">
                <div class="w-16 h-16 rounded-2xl bg-amber-100 text-paws-amber-600 mx-auto flex items-center justify-center text-3xl mb-2">
                  <i class="fa-solid fa-heart-pulse"></i>
                </div>
                <span class="text-xs font-bold text-paws-teal-900">Solusi Perilaku Spesifik</span>
              </div>
            </div>

            <div class="flex items-center gap-2 text-xs font-bold text-paws-teal-800 mb-1">
              <i class="fa-solid fa-user-shield text-paws-amber-500"></i> Terapi Khusus
            </div>
            <h3 class="font-paws-display text-xl font-bold text-paws-teal-900 group-hover:text-paws-amber-500 transition-colors">Behavioral Modification</h3>
            
            <p class="text-slate-600 text-xs sm:text-sm mt-2 leading-relaxed">
              Program intensif untuk anabul yang mengalami kecemasan berlebih, gonggongan reaktif, rasa takut trauma, atau agresivitas makanan.
            </p>

            <ul class="mt-4 space-y-2 text-xs text-slate-700">
              <li class="flex items-center gap-2">
                <i class="fa-solid fa-circle-check text-emerald-500"></i> Desensitisasi & Counter-conditioning
              </li>
              <li class="flex items-center gap-2">
                <i class="fa-solid fa-circle-check text-emerald-500"></i> Separation Anxiety Relief
              </li>
              <li class="flex items-center gap-2">
                <i class="fa-solid fa-circle-check text-emerald-500"></i> Analisis Perilaku di Tempat
              </li>
            </ul>
          </div>

          <div class="pt-6 mt-6 border-t border-paws-sand-100 flex items-center justify-between">
            <div>
              <span class="text-[11px] text-slate-400 block font-medium">Durasi: Paket 5 Sesi</span>
              <span class="text-sm font-bold text-paws-teal-900">Rp 2.400.000</span>
            </div>
            <a href="#trial" class="w-9 h-9 rounded-full bg-paws-sand-100 text-paws-teal-800 group-hover:bg-paws-amber-500 group-hover:text-white flex items-center justify-center transition">
              <i class="fa-solid fa-arrow-right text-xs"></i>
            </a>
          </div>
        </div>

        <!-- Program 4: Agility Fun & Fitness -->
        <div class="bg-white rounded-3xl p-6 border border-paws-sand-200 shadow-sm hover:shadow-xl hover:-translate-y-1 transition duration-300 flex flex-col justify-between group">
          <div>
            <div class="relative rounded-2xl overflow-hidden mb-5 h-44 bg-paws-teal-50 flex items-center justify-center text-paws-teal-800">
              <span class="absolute top-3 left-3 bg-emerald-600 text-white text-[11px] font-bold px-3 py-1 rounded-full z-10 shadow-sm">
                Aktif & Enerjik
              </span>
              <div class="text-center p-4">
                <div class="w-16 h-16 rounded-2xl bg-paws-teal-100 text-paws-teal-800 mx-auto flex items-center justify-center text-3xl mb-2">
                  <i class="fa-solid fa-person-running"></i>
                </div>
                <span class="text-xs font-bold text-paws-teal-900">Outdoor Agility Obstacles</span>
              </div>
            </div>

            <div class="flex items-center gap-2 text-xs font-bold text-paws-teal-800 mb-1">
              <i class="fa-solid fa-bolt text-paws-amber-500"></i> Olahraga & Bonding
            </div>
            <h3 class="font-paws-display text-xl font-bold text-paws-teal-900 group-hover:text-paws-amber-500 transition-colors">Agility Fun</h3>
            
            <p class="text-slate-600 text-xs sm:text-sm mt-2 leading-relaxed">
              Salurkan energi berlebih anjing Anda lewat rintangan terowongan, lompatan ceria, dan slalom untuk ketangkasan fisik yang prima.
            </p>

            <ul class="mt-4 space-y-2 text-xs text-slate-700">
              <li class="flex items-center gap-2">
                <i class="fa-solid fa-circle-check text-emerald-500"></i> Rintangan Terowongan & Weave Poles
              </li>
              <li class="flex items-center gap-2">
                <i class="fa-solid fa-circle-check text-emerald-500"></i> Koordinasi Gerak & Kecepatan
              </li>
              <li class="flex items-center gap-2">
                <i class="fa-solid fa-circle-check text-emerald-500"></i> Memperkuat Ikatan Pawrents-Anjing
              </li>
            </ul>
          </div>

          <div class="pt-6 mt-6 border-t border-paws-sand-100 flex items-center justify-between">
            <div>
              <span class="text-[11px] text-slate-400 block font-medium">Durasi: 4 Sesi Akhir Pekan</span>
              <span class="text-sm font-bold text-paws-teal-900">Rp 1.650.000</span>
            </div>
            <a href="#trial" class="w-9 h-9 rounded-full bg-paws-sand-100 text-paws-teal-800 group-hover:bg-paws-amber-500 group-hover:text-white flex items-center justify-center transition">
              <i class="fa-solid fa-arrow-right text-xs"></i>
            </a>
          </div>
        </div>

      </div>

    </div>
  </section>

  <!-- 5. GALERI & MOMEN PELATIHAN -->
  <section id="galeri" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center max-w-2xl mx-auto mb-14">
        <span class="text-paws-amber-500 font-bold uppercase text-xs tracking-wider">Keseruan Kelas</span>
        <h2 class="font-paws-display text-3xl sm:text-4xl font-bold text-paws-teal-900 mt-2">Momen Gembira Bersama Sahabat Bulu</h2>
        <p class="text-slate-600 text-sm sm:text-base mt-2">Setiap sesi di Paws & Clever dirancang dengan suasana yang memicu keceriaan dan antusiasme belajar alami.</p>
      </div>

      <!-- Gallery Grid Creative -->
      <div class="grid grid-cols-1 md:grid-cols-12 gap-6 items-stretch">
        
        <!-- Large Card Left -->
        <div class="md:col-span-7 bg-paws-sand-100 rounded-3xl overflow-hidden border border-paws-sand-200 relative group min-h-[340px]">
          <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuDJmexABnWNF60Of-yYNxwCVJF1C9YPo3kjCzBsKitEwS7OMmd91gZW4FcAyNNXADPhIw5GWTX5JD9g_9cYPADckH__i-jqm-L9qIjRvJhxnSOwbamS9k-lp27YJxkQOs-vB2idEMMIpXXZA1WlaavBVSYgwHhsfHNT-tP8gCUpRmSHiAgI02fsgWapFUuYKX2kkc5mLMnLP9m-g5cej7PDukw1zzLzp2ookacyOCq53gAp-h6Cbx4R" alt="Sesi Latihan Outdoor" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
          <div class="absolute inset-0 bg-gradient-to-t from-teal-950/80 via-transparent to-transparent flex flex-col justify-end p-8 text-white">
            <span class="bg-paws-amber-500 text-white text-[11px] font-bold px-3 py-1 rounded-full w-max mb-2">Area Rumput Alami</span>
            <h3 class="font-paws-display text-2xl font-bold">Latihan High-Five & Fokus Di Ruang Terbuka</h3>
            <p class="text-xs text-paws-sand-100/90 mt-1">Belajar mempertahankan konsentrasi di tengah distraksi alami lingkungan taman.</p>
          </div>
        </div>

        <!-- Two Stacked Cards Right -->
        <div class="md:col-span-5 flex flex-col gap-6">
          
          <div class="bg-paws-teal-900 rounded-3xl overflow-hidden relative group min-h-[180px] flex-1">
            <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuCManRIZhw0EYA-STkyeZw9cDQfdaqxY0ZhkM8xIJdZs8NUBERR0_bFSg6cDQ4K5aJzq9tdgLSlDfRysVpx_LVf3MSIjrFxk_CyQjBPJ2dy8OFsCLPl9hPu6hBRINIj2IlYd-HbLtuZbdk_Xl42A1ytc6CKymZdvPPetIMUwQ0Zo1IbkMk3E7w5Oabby1UHN_3geI-QR-uvdBGk-UhUdEed7famM2GTWv1b4N1hAspX59au0zCSK3mh" alt="Studio Indoor Puppy" class="w-full h-full object-cover opacity-85 group-hover:scale-105 transition-transform duration-700">
            <div class="absolute inset-0 bg-gradient-to-t from-teal-950/90 via-teal-950/40 to-transparent flex flex-col justify-end p-6 text-white">
              <span class="text-paws-amber-400 font-semibold text-xs mb-1">Studio Ber-AC & Higienis</span>
              <h3 class="font-paws-display text-lg font-bold">Sesi Sosialisasi Puppy Indoor</h3>
            </div>
          </div>

          <!-- Creative Quote Banner -->
          <div class="bg-paws-sand-100 border border-paws-sand-200 rounded-3xl p-6 flex items-center gap-4">
            <div class="w-12 h-12 rounded-2xl bg-paws-amber-400 text-paws-teal-900 flex items-center justify-center font-bold text-xl shrink-0">
              <i class="fa-solid fa-quote-left"></i>
            </div>
            <div>
              <p class="text-xs italic text-slate-700 font-medium">
                "Anjing tidak membutuhkan pemilik yang keras, mereka membutuhkan guru yang sabar dan konsisten."
              </p>
              <span class="text-[11px] font-bold text-paws-teal-900 block mt-1">— Kepala Pelatih Paws & Clever</span>
            </div>
          </div>

        </div>

      </div>
    </div>
  </section>

  <!-- 6. SECTION TRIAL CLASS & FORM PENDAFTARAN -->
  <section id="trial" class="py-20 bg-paws-teal-900 text-white relative overflow-hidden">
    <div class="absolute -bottom-24 -left-24 w-80 h-80 bg-paws-teal-800 rounded-full blur-3xl opacity-50"></div>
    <div class="absolute top-0 right-0 w-96 h-96 bg-paws-amber-500/10 rounded-full blur-3xl"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
        
        <div class="lg:col-span-6 space-y-6">
          <div class="inline-flex items-center gap-2 bg-paws-teal-800/80 border border-paws-teal-700 px-3.5 py-1.5 rounded-full text-paws-amber-400 text-xs font-bold">
            <i class="fa-solid fa-sparkles"></i> Langkah Pertama
          </div>
          <h2 class="font-paws-display text-3xl sm:text-4xl lg:text-5xl font-bold leading-tight">
            Coba Dahulu Lewat <span class="text-paws-amber-400">Sesi Trial 60 Menit</span>
          </h2>
          <p class="text-paws-teal-100 text-sm sm:text-base leading-relaxed">
            Tidak yakin kelas mana yang tepat? Ikuti sesi evaluasi karakter anabul bersama pelatih profesional kami. Dapatkan asesmen langsung mengenai temperamen, level energi, dan rencana pelatihan yang ideal.
          </p>
          
          <div class="space-y-3.5 pt-2">
            <div class="flex items-start gap-3">
              <div class="w-6 h-6 rounded-full bg-paws-amber-400 text-paws-teal-900 flex items-center justify-center text-xs mt-0.5 font-bold">
                <i class="fa-solid fa-check"></i>
              </div>
              <p class="text-xs sm:text-sm text-paws-teal-100">Evaluasi temperamen gratis & konsultasi nutrisi/kebutuhan aktivitas.</p>
            </div>
            <div class="flex items-start gap-3">
              <div class="w-6 h-6 rounded-full bg-paws-amber-400 text-paws-teal-900 flex items-center justify-center text-xs mt-0.5 font-bold">
                <i class="fa-solid fa-check"></i>
              </div>
              <p class="text-xs sm:text-sm text-paws-teal-100">Camilan pelatihan & welcome kit khusus anabul saat sesi trial.</p>
            </div>
            <div class="flex items-start gap-3">
              <div class="w-6 h-6 rounded-full bg-paws-amber-400 text-paws-teal-900 flex items-center justify-center text-xs mt-0.5 font-bold">
                <i class="fa-solid fa-check"></i>
              </div>
              <p class="text-xs sm:text-sm text-paws-teal-100">Garansi kenyamanan: tidak ada komitmen pendaftaran wajib.</p>
            </div>
          </div>
        </div>

        <!-- Registration Form Card -->
        <div class="lg:col-span-6">
          <div class="bg-white rounded-3xl p-6 sm:p-8 text-slate-800 shadow-2xl border-4 border-paws-teal-800">
            <div class="flex items-center justify-between mb-6">
              <div>
                <h3 class="font-paws-display text-2xl font-bold text-paws-teal-900">Formulir Pesan Sesi Trial</h3>
                <p class="text-xs text-slate-500">Tim kami akan mengonfirmasi jadwal via WhatsApp dalam 2 jam kerja.</p>
              </div>
              <div class="w-10 h-10 rounded-2xl bg-amber-100 text-paws-amber-600 flex items-center justify-center text-lg">
                <i class="fa-solid fa-dog"></i>
              </div>
            </div>

            <form id="paws-trial-form" class="space-y-4">
              <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                  <label class="block text-xs font-bold text-slate-700 mb-1">Nama Pemilik (Pawrent)</label>
                  <input type="text" name="owner_name" placeholder="Contoh: Sarah Wijaya" required class="w-full px-4 py-2.5 rounded-xl border border-paws-sand-200 text-xs sm:text-sm focus:outline-none focus:ring-2 focus:ring-paws-amber-400">
                </div>
                <div>
                  <label class="block text-xs font-bold text-slate-700 mb-1">Nomor WhatsApp Aktif</label>
                  <input type="tel" name="whatsapp" placeholder="0812-xxxx-xxxx" required class="w-full px-4 py-2.5 rounded-xl border border-paws-sand-200 text-xs sm:text-sm focus:outline-none focus:ring-2 focus:ring-paws-amber-400">
                </div>
              </div>

              <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                  <label class="block text-xs font-bold text-slate-700 mb-1">Nama & Jenis Anabul</label>
                  <input type="text" name="pet_name" placeholder="Contoh: Milo (Golden Retriever)" required class="w-full px-4 py-2.5 rounded-xl border border-paws-sand-200 text-xs sm:text-sm focus:outline-none focus:ring-2 focus:ring-paws-amber-400">
                </div>
                <div>
                  <label class="block text-xs font-bold text-slate-700 mb-1">Usia Anabul</label>
                  <select class="w-full px-4 py-2.5 rounded-xl border border-paws-sand-200 text-xs sm:text-sm focus:outline-none focus:ring-2 focus:ring-paws-amber-400 text-slate-600">
                    <option>2 - 4 Bulan (Puppy)</option>
                    <option>5 - 11 Bulan (Junior)</option>
                    <option>1 - 3 Tahun (Dewasa)</option>
                    <option>> 3 Tahun (Senior)</option>
                  </select>
                </div>
              </div>

              <div>
                <label class="block text-xs font-bold text-slate-700 mb-1">Pilihan Program Pelatihan</label>
                <select class="w-full px-4 py-2.5 rounded-xl border border-paws-sand-200 text-xs sm:text-sm focus:outline-none focus:ring-2 focus:ring-paws-amber-400 text-slate-600">
                  <option>Puppy Socialization Class</option>
                  <option>Basic Obedience Course</option>
                  <option>Behavioral Modification (Privat)</option>
                  <option>Agility Fun & Obstacles</option>
                  <option>Konsultasi Umum Dahulu</option>
                </select>
              </div>

              <button type="submit" class="w-full bg-paws-amber-500 hover:bg-paws-amber-600 text-white font-bold text-sm py-3.5 px-6 rounded-xl shadow-lg shadow-paws-amber-500/30 transition flex items-center justify-center gap-2">
                <i class="fa-solid fa-paper-plane"></i>
                <span>Kirim Pendaftaran Trial Sekarang</span>
              </button>
            </form>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- 7. FAQ SECTION (AKORDEON PERTANYAAN UMUM) -->
  <section id="faq" class="py-20 bg-paws-sand-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
      
      <div class="text-center mb-14">
        <span class="text-paws-amber-500 font-bold uppercase text-xs tracking-wider">Tanya Jawab</span>
        <h2 class="font-paws-display text-3xl sm:text-4xl font-bold text-paws-teal-900 mt-2">Pertanyaan yang Sering Diajukan</h2>
        <p class="text-slate-600 text-sm sm:text-base mt-2">Segala hal yang perlu Anda ketahui mengenai persyaratan, metode, dan fasilitas kami.</p>
      </div>

      <!-- Accordion List -->
      <div class="space-y-4">
        
        <!-- FAQ 1 -->
        <details class="group bg-white rounded-2xl border border-paws-sand-200 p-5 shadow-sm transition [&_svg]:open:-rotate-180" open>
          <summary class="flex justify-between items-center font-bold text-paws-teal-900 cursor-pointer list-none text-base">
            <span class="flex items-center gap-3">
              <i class="fa-solid fa-shield-dog text-paws-amber-500"></i>
              Berapa usia minimal anjing untuk dapat mengikuti kelas?
            </span>
            <svg class="w-5 h-5 text-slate-400 transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
          </summary>
          <div class="mt-4 text-slate-600 text-sm leading-relaxed border-t border-paws-sand-100 pt-3">
            Anak anjing dapat mulai bergabung di kelas Puppy Socialization sejak usia <strong>8 minggu (2 bulan)</strong>, dengan syarat minimal telah mendapatkan vaksin dasar pertama dan obat cacing terkontrol demi menjaga keamanan kesehatan bersama di akademi.
          </div>
        </details>

        <!-- FAQ 2 -->
        <details class="group bg-white rounded-2xl border border-paws-sand-200 p-5 shadow-sm transition [&_svg]:open:-rotate-180">
          <summary class="flex justify-between items-center font-bold text-paws-teal-900 cursor-pointer list-none text-base">
            <span class="flex items-center gap-3">
              <i class="fa-solid fa-heart-circle-check text-paws-amber-500"></i>
              Apa itu metode Positive Reinforcement yang digunakan?
            </span>
            <svg class="w-5 h-5 text-slate-400 transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
          </summary>
          <div class="mt-4 text-slate-600 text-sm leading-relaxed border-t border-paws-sand-100 pt-3">
            Metode penguatan positif fokus memberikan penghargaan berupa treats bernilai tinggi, mainan, atau kasih sayang setiap kali anjing menunjukkan perilaku yang benar. Kami <strong>tidak pernah menggunakan</strong> rantai jerat (choke chain), kejutan listrik, pukulan, atau teriakan kasar.
          </div>
        </details>

        <!-- FAQ 3 -->
        <details class="group bg-white rounded-2xl border border-paws-sand-200 p-5 shadow-sm transition [&_svg]:open:-rotate-180">
          <summary class="flex justify-between items-center font-bold text-paws-teal-900 cursor-pointer list-none text-base">
            <span class="flex items-center gap-3">
              <i class="fa-solid fa-user-group text-paws-amber-500"></i>
              Apakah pemilik (pawrents) wajib ikut hadir selama sesi?
            </span>
            <svg class="w-5 h-5 text-slate-400 transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
          </summary>
          <div class="mt-4 text-slate-600 text-sm leading-relaxed border-t border-paws-sand-100 pt-3">
            Sangat disarankan! Kunci keberhasilan latihan adalah konsistensi di rumah. Pelatih kami melatih <em>Anda</em> bagaimana berkomunikasi dengan anabul, sehingga ikatan emosional terjalin langsung antara pemilik dan hewan kesayangannya.
          </div>
        </details>

        <!-- FAQ 4 -->
        <details class="group bg-white rounded-2xl border border-paws-sand-200 p-5 shadow-sm transition [&_svg]:open:-rotate-180">
          <summary class="flex justify-between items-center font-bold text-paws-teal-900 cursor-pointer list-none text-base">
            <span class="flex items-center gap-3">
              <i class="fa-solid fa-map-location-dot text-paws-amber-500"></i>
              Di mana saja lokasi pelatihan dan apakah melayani home visit?
            </span>
            <svg class="w-5 h-5 text-slate-400 transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
          </summary>
          <div class="mt-4 text-slate-600 text-sm leading-relaxed border-t border-paws-sand-100 pt-3">
            Kampus utama dan taman agility kami berlokasi di <strong>BSD City, Tangerang</strong>. Kami juga menyediakan program privat <em>Home Visit</em> khusus area Jakarta Barat, Jakarta Selatan, Tangerang, dan Tangerang Selatan untuk kasus modifikasi perilaku tertentu.
          </div>
        </details>

      </div>

    </div>
  </section>

  <!-- 8. FOOTER LENGKAP -->
  <footer id="kontak" class="bg-teal-950 text-slate-300 pt-16 pb-12 border-t border-paws-teal-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-10 pb-12 border-b border-paws-teal-900/80">
        
        <!-- Col 1: Brand Info -->
        <div class="lg:col-span-4 space-y-4">
          <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-paws-teal-800 flex items-center justify-center p-1 border border-paws-teal-700">
              <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuB1DeCsspdWbkr10K_S7D2On0GcZj7E6iSCRUuyQETDBu_3I3F1cE344e1Jz3wZc8TKiH69RX6tcyKPgI2ClXZm4TXowXeb7w6IpIlSpc8EyKMjwZXJDVXMYleNVwod8FNG1bbG7iOe6rf7lfb7ZCy1avKlcX0xtzs9nbSAsVrnqLu-QYv_SKU6RJdgYBgQNIepXMhksMrmh2pfeQ9kvS0gJXVY3q5hJx8HiiUJFf3xeeMBtLlmRL28" alt="Logo Paws & Clever" class="w-full h-full object-contain">
            </div>
            <div>
              <span class="text-xl font-paws-display font-bold text-white tracking-tight">Paws & Clever</span>
              <p class="text-[10px] text-paws-amber-400 font-semibold uppercase tracking-wider">Pet Training Academy</p>
            </div>
          </div>
          <p class="text-xs sm:text-sm text-slate-400 leading-relaxed">
            Menciptakan keharmonisan antara keluarga dan hewan peliharaan melalui metode pelatihan modern yang menyenangkan, aman, dan ilmiah.
          </p>
          <div class="flex items-center space-x-3 pt-2">
            <a href="#" aria-label="Instagram" class="w-9 h-9 rounded-full bg-paws-teal-900 hover:bg-paws-amber-500 hover:text-white text-teal-300 flex items-center justify-center transition">
              <i class="fa-brands fa-instagram text-sm"></i>
            </a>
            <a href="#" aria-label="TikTok" class="w-9 h-9 rounded-full bg-paws-teal-900 hover:bg-paws-amber-500 hover:text-white text-teal-300 flex items-center justify-center transition">
              <i class="fa-brands fa-tiktok text-sm"></i>
            </a>
            <a href="#" aria-label="YouTube" class="w-9 h-9 rounded-full bg-paws-teal-900 hover:bg-paws-amber-500 hover:text-white text-teal-300 flex items-center justify-center transition">
              <i class="fa-brands fa-youtube text-sm"></i>
            </a>
            <a href="#" aria-label="Facebook" class="w-9 h-9 rounded-full bg-paws-teal-900 hover:bg-paws-amber-500 hover:text-white text-teal-300 flex items-center justify-center transition">
              <i class="fa-brands fa-facebook-f text-sm"></i>
            </a>
          </div>
        </div>

        <!-- Col 2: Program Tautan -->
        <div class="lg:col-span-2 space-y-3">
          <h4 class="text-sm font-bold text-white uppercase tracking-wider">Program</h4>
          <ul class="space-y-2 text-xs">
            <li><a href="#program" class="hover:text-paws-amber-400 transition">Puppy Socialization</a></li>
            <li><a href="#program" class="hover:text-paws-amber-400 transition">Basic Obedience</a></li>
            <li><a href="#program" class="hover:text-paws-amber-400 transition">Behavioral Therapy</a></li>
            <li><a href="#program" class="hover:text-paws-amber-400 transition">Agility & Fun Sports</a></li>
            <li><a href="#trial" class="hover:text-paws-amber-400 transition">Sesi Evaluasi Trial</a></li>
          </ul>
        </div>

        <!-- Col 3: Navigasi Cepat -->
        <div class="lg:col-span-2 space-y-3">
          <h4 class="text-sm font-bold text-white uppercase tracking-wider">Eksplorasi</h4>
          <ul class="space-y-2 text-xs">
            <li><a href="#beranda" class="hover:text-paws-amber-400 transition">Tentang Kami</a></li>
            <li><a href="#metode" class="hover:text-paws-amber-400 transition">Standar Pelatih</a></li>
            <li><a href="#galeri" class="hover:text-paws-amber-400 transition">Fasilitas Agility Park</a></li>
            <li><a href="#faq" class="hover:text-paws-amber-400 transition">FAQ & Kebijakan</a></li>
            <li><a href="#" class="hover:text-paws-amber-400 transition">Blog Tips Anabul</a></li>
          </ul>
        </div>

        <!-- Col 4: Jam & Alamat Lokasi -->
        <div class="lg:col-span-4 space-y-3">
          <h4 class="text-sm font-bold text-white uppercase tracking-wider">Pusat Pelatihan & Kontak</h4>
          <div class="space-y-2 text-xs text-slate-300">
            <div class="flex items-start gap-2.5">
              <i class="fa-solid fa-location-dot text-paws-amber-400 mt-1"></i>
              <span>Jl. Taman Flora Boulevard No. 18, BSD City, Serpong, Tangerang Selatan 15310</span>
            </div>
            <div class="flex items-center gap-2.5">
              <i class="fa-regular fa-clock text-paws-amber-400"></i>
              <span>Selasa - Minggu: 08.00 - 17.00 WIB (Senin Tutup Sanitasi)</span>
            </div>
            <div class="flex items-center gap-2.5">
              <i class="fa-solid fa-phone text-paws-amber-400"></i>
              <span>(021) 5389-7721 / WhatsApp: +62 812-9900-8812</span>
            </div>
            <div class="flex items-center gap-2.5">
              <i class="fa-solid fa-envelope text-paws-amber-400"></i>
              <span>halo@pawsandclever.id</span>
            </div>
          </div>
        </div>

      </div>

      <!-- Copyright Bar -->
      <div class="pt-8 flex flex-col sm:flex-row justify-between items-center text-xs text-slate-400 gap-4">
        <p>© 2025 Paws & Clever Pet Training Academy. Seluruh Hak Cipta Dilindungi.</p>
        <div class="flex space-x-6 text-xs">
          <a href="#" class="hover:text-white transition">Kebijakan Privasi</a>
          <a href="#" class="hover:text-white transition">Syarat & Ketentuan</a>
          <a href="#" class="hover:text-white transition">Prosedur Sanitasi</a>
        </div>
      </div>
    </div>
  </footer>

  <!-- 9. FLOATING BUTTONS DI POJOK KANAN BAWAH -->
  <div class="fixed bottom-6 right-6 z-50 flex flex-col items-end space-y-3">
    
    <!-- Floating AI Assistant Chatbot Button -->
    <div class="relative group">
      <span class="absolute right-full mr-3 top-1/2 -translate-y-1/2 bg-paws-teal-900 text-white text-[11px] font-semibold py-1 px-3 rounded-xl whitespace-nowrap opacity-0 group-hover:opacity-100 transition-opacity duration-200 pointer-events-none shadow-md">
        Tanya PawsAI Assistant
      </span>
      <button onclick="alert('PawsAI Assistant siap membantu menjawab pertanyaan Anda seputar tips pelatihan & pemilihan jadwal kelas.')" aria-label="Tanya AI Assistant" class="w-13 h-13 p-3.5 bg-gradient-to-r from-paws-teal-800 to-paws-teal-700 hover:from-paws-teal-700 hover:to-teal-600 text-white rounded-full shadow-xl hover:scale-110 active:scale-95 transition-all flex items-center justify-center border-2 border-white/80">
        <i class="fa-solid fa-robot text-lg text-amber-300"></i>
      </button>
    </div>

    <!-- Floating WhatsApp Button -->
    <div class="relative group">
      <span class="absolute right-full mr-3 top-1/2 -translate-y-1/2 bg-emerald-800 text-white text-[11px] font-semibold py-1 px-3 rounded-xl whitespace-nowrap opacity-0 group-hover:opacity-100 transition-opacity duration-200 pointer-events-none shadow-md">
        Konsultasi via WhatsApp
      </span>
      <a href="https://wa.me/6281299008812?text=Halo%20Paws%20%26%20Clever,%20saya%20ingin%20tanya%20jadwal%20dan%20trial%20pelatihan%20hewan" target="_blank" rel="noopener noreferrer" aria-label="Chat WhatsApp" class="w-14 h-14 bg-emerald-500 hover:bg-emerald-600 text-white rounded-full shadow-2xl hover:scale-110 active:scale-95 transition-all flex items-center justify-center border-2 border-white">
        <i class="fa-brands fa-whatsapp text-2xl"></i>
      </a>
    </div>

  </div>

<script>
  document.getElementById('paws-trial-form').addEventListener('submit', function (event) {
    event.preventDefault();

    const formData = new FormData(event.currentTarget);
    const message = [
      'Halo Paws & Clever, saya ingin memesan sesi trial pelatihan.',
      `Nama pemilik: ${formData.get('owner_name')}`,
      `WhatsApp: ${formData.get('whatsapp')}`,
      `Nama dan jenis anabul: ${formData.get('pet_name')}`,
      `Usia anabul: ${formData.get('pet_age')}`,
      `Program: ${formData.get('program')}`,
    ].join('\n');

    window.open(`https://wa.me/6281299008812?text=${encodeURIComponent(message)}`, '_blank', 'noopener,noreferrer');
  });
</script>
</body>
</html>
