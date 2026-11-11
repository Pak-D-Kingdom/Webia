<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AstroClean - Spesialis Sanitasi & Deep Cleaning Rumah</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-galaxy-950 text-slate-200 font-astroclean-sans antialiased selection:bg-purple-600 selection:text-white relative">

  <!-- Background decorative cosmic textures -->
  <div class="fixed inset-0 pointer-events-none z-0 overflow-hidden">
    <div class="absolute -top-40 -left-40 w-96 h-96 bg-purple-900/20 rounded-full blur-3xl"></div>
    <div class="absolute top-1/3 -right-40 w-96 h-96 bg-indigo-900/15 rounded-full blur-3xl"></div>
    <div class="absolute bottom-10 left-1/4 w-[500px] h-96 bg-blue-950/25 rounded-full blur-3xl"></div>
    <div class="absolute inset-0 bg-[radial-gradient(#312e81_1px,transparent_1px)] [background-size:28px_28px] opacity-15"></div>
  </div>

  <!-- Header / Navbar -->
  <header class="sticky top-0 z-40 bg-galaxy-950/90 backdrop-blur-md border-b border-purple-900/30">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
      <a href="#beranda" class="flex items-center gap-3 group">
        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-purple-500 to-indigo-700 flex items-center justify-center text-white shadow-lg shadow-purple-500/25 group-hover:scale-105 transition-transform">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
          </svg>
        </div>
        <div>
          <span class="font-astroclean-display font-bold text-xl tracking-tight text-white flex items-center gap-1.5">
            ASTRO<span class="text-purple-400">CLEAN</span>
          </span>
          <span class="text-[10px] uppercase tracking-widest text-slate-400 block -mt-1 font-semibold">Home & Deep Sanitizing</span>
        </div>
      </a>

      <!-- Desktop Nav Menu -->
      <nav class="hidden md:flex items-center gap-8 text-sm font-medium">
        <a href="#beranda" class="text-slate-200 hover:text-purple-400 transition-colors">Beranda</a>
        <a href="#layanan" class="text-slate-300 hover:text-purple-400 transition-colors">Layanan & Paket</a>
        <a href="#keunggulan" class="text-slate-300 hover:text-purple-400 transition-colors">Keunggulan</a>
        <a href="#faq" class="text-slate-300 hover:text-purple-400 transition-colors">FAQ</a>
        <a href="#kontak" class="text-slate-300 hover:text-purple-400 transition-colors">Kontak</a>
      </nav>

      <!-- Action Button -->
      <div class="flex items-center gap-3">
        <a href="#layanan" class="hidden sm:inline-flex items-center gap-2 bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-500 hover:to-indigo-500 text-white text-sm font-semibold px-5 py-2.5 rounded-xl astroclean-rustic-border transition-all duration-300 hover:shadow-lg hover:shadow-purple-600/30">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
          Pesan Sekarang
        </a>
      </div>
    </div>
  </header>

  <!-- Hero Section -->
  <section id="beranda" class="relative z-10 pt-16 pb-24 lg:pt-24 lg:pb-32 overflow-hidden border-b border-purple-900/30">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
        
        <!-- Left Content -->
        <div class="lg:col-span-7 space-y-6 text-center lg:text-left">
          <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-purple-950/80 border border-purple-500/30 text-purple-300 text-xs font-semibold tracking-wide">
            <span class="w-2 h-2 rounded-full bg-purple-400 animate-pulse"></span>
            Spesialis Sanitasi & Deep Cleaning Rumah Bergaransi
          </div>

          <h1 class="text-4xl sm:text-5xl lg:text-6xl font-astroclean-display font-extrabold text-white tracking-tight leading-tight">
            Rumah Sehat Tanpa Kompromi, <br>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-400 via-indigo-300 to-sky-300">
              Bersih Bersinar Sekelas Kosmik.
            </span>
          </h1>

          <p class="text-base sm:text-lg text-slate-300 max-w-2xl mx-auto lg:mx-0 leading-relaxed font-normal">
            Kombinasi tenaga ahli bersertifikasi, teknologi steam sanitasi 120°C, dan cairan ramah lingkungan yang mengeliminasi 99.9% bakteri, tungau, serta noda membandel demi kehangatan keluarga tercinta.
          </p>

          <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4 pt-2">
            <a href="#layanan" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-500 hover:to-indigo-500 text-white font-semibold px-8 py-3.5 rounded-xl shadow-lg shadow-purple-600/30 transition-all">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
              Pesan Jasa Sekarang
            </a>
            <button onclick="document.getElementById('ai-modal').classList.remove('hidden')" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-galaxy-850 hover:bg-galaxy-800 text-slate-200 border border-purple-500/30 font-semibold px-6 py-3.5 rounded-xl transition-all">
              <svg class="w-5 h-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
              Konsultasi AI & Estimasi Biaya
            </button>
          </div>

          <!-- Quick Metrics -->
          <div class="grid grid-cols-3 gap-6 pt-6 border-t border-purple-900/40 text-center lg:text-left">
            <div>
              <div class="text-2xl sm:text-3xl font-astroclean-display font-bold text-white">12.500+</div>
              <div class="text-xs text-slate-400 mt-1">Rumah Dibersihkan</div>
            </div>
            <div>
              <div class="text-2xl sm:text-3xl font-astroclean-display font-bold text-purple-400">99.8%</div>
              <div class="text-xs text-slate-400 mt-1">Kepuasan Klien</div>
            </div>
            <div>
              <div class="text-2xl sm:text-3xl font-astroclean-display font-bold text-white">100%</div>
              <div class="text-xs text-slate-400 mt-1">Kru Tersertifikasi</div>
            </div>
          </div>
        </div>

        <!-- Right Visual Card -->
        <div class="lg:col-span-5 relative">
          <div class="astroclean-rustic-card astroclean-rustic-border rounded-3xl p-6 sm:p-8 relative z-10 space-y-6">
            <div class="flex items-center justify-between border-b border-purple-800/40 pb-4">
              <div class="flex items-center gap-2">
                <span class="w-3 h-3 rounded-full bg-red-500/80"></span>
                <span class="w-3 h-3 rounded-full bg-yellow-500/80"></span>
                <span class="w-3 h-3 rounded-full bg-green-500/80"></span>
              </div>
              <span class="text-xs font-mono text-purple-300 uppercase tracking-widest">Astro-Steam Pro-V4</span>
            </div>

            <div class="p-5 rounded-2xl bg-galaxy-900/90 border border-purple-500/20 text-center space-y-3">
              <div class="w-16 h-16 mx-auto rounded-2xl bg-purple-900/40 border border-purple-500/40 flex items-center justify-center text-purple-300">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
              </div>
              <div class="inline-block px-2.5 py-0.5 rounded-full bg-emerald-500/20 text-emerald-300 text-[11px] font-bold tracking-wider uppercase">Grade A+</div>
              <h3 class="font-astroclean-display font-bold text-lg text-white">Standar Higienitas Medis</h3>
              <p class="text-xs text-slate-300 leading-relaxed">Cairan desinfektan food-grade non-toksik aman untuk anak & hewan peliharaan.</p>
            </div>

            <div class="grid grid-cols-2 gap-3 text-xs">
              <div class="p-3.5 rounded-xl bg-galaxy-900/70 border border-purple-900/50">
                <span class="text-slate-400 block text-[10px] uppercase font-semibold">Durasi Kerja</span>
                <span class="font-semibold text-white text-sm">2 - 5 Jam Tuntas</span>
              </div>
              <div class="p-3.5 rounded-xl bg-galaxy-900/70 border border-purple-900/50">
                <span class="text-slate-400 block text-[10px] uppercase font-semibold">Garansi</span>
                <span class="font-semibold text-purple-400 text-sm">1x24 Jam Re-Clean</span>
              </div>
            </div>

            <div class="flex items-center gap-3 p-3 bg-purple-950/40 rounded-xl border border-purple-800/40">
              <div class="w-10 h-10 rounded-full bg-purple-800/60 flex items-center justify-center text-purple-300">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
              </div>
              <div class="text-xs">
                <div class="flex items-center text-amber-400">
                  ★★★★★
                </div>
                <div class="text-slate-200 font-semibold">Tim Profesional Terlatih</div>
                <div class="text-[10px] text-slate-400">SKCK Terverifikasi & Bebas Narkoba</div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- Layanan & Paket Section -->
  <section id="layanan" class="py-24 relative z-10 border-b border-purple-900/30">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center max-w-3xl mx-auto mb-16 space-y-4">
        <span class="text-xs uppercase font-mono tracking-widest text-purple-400 font-semibold">Pilihan Solusi</span>
        <h2 class="text-3xl sm:text-4xl font-astroclean-display font-bold text-white tracking-tight">Paket Layanan Kebersihan Komprehensif</h2>
        <p class="text-slate-400 text-sm sm:text-base">Pilih kategori layanan yang paling cocok dengan kebutuhan hunian atau kantor Anda.</p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        
        <!-- Paket 1 -->
        <div class="astroclean-rustic-card astroclean-rustic-border rounded-2xl p-7 flex flex-col justify-between hover:border-purple-500/60 transition-all duration-300">
          <div>
            <div class="w-12 h-12 rounded-xl bg-purple-900/40 border border-purple-500/30 flex items-center justify-center text-purple-300 mb-6">
              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
            </div>
            <h3 class="text-xl font-astroclean-display font-bold text-white mb-2">Daily & General Cleaning</h3>
            <p class="text-xs text-slate-400 leading-relaxed mb-6">Perawatan harian atau mingguan untuk menjaga lantai, debu furnitur, kamar tidur, dan kerapian ruangan.</p>
            
            <div class="mb-6">
              <span class="text-3xl font-astroclean-display font-bold text-white">Rp 149.000</span>
              <span class="text-xs text-slate-400">/ 2 Jam</span>
            </div>

            <ul class="space-y-3 text-xs text-slate-300 border-t border-purple-900/40 pt-6">
              <li class="flex items-center gap-2">
                <svg class="w-4 h-4 text-purple-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                Sapu & Pel Lantai Higienis
              </li>
              <li class="flex items-center gap-2">
                <svg class="w-4 h-4 text-purple-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                Dusting Meja, Rak & Lemari
              </li>
              <li class="flex items-center gap-2">
                <svg class="w-4 h-4 text-purple-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                Pembersihan Dapur Ringan
              </li>
              <li class="flex items-center gap-2">
                <svg class="w-4 h-4 text-purple-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                Perapian Tempat Tidur & Sampah
              </li>
            </ul>
          </div>
          <a href="https://wa.me/6281234567890?text=Halo%20AstroClean,%20saya%20mau%20pesan%20Paket%20Daily%20Cleaning" target="_blank" class="mt-8 w-full block text-center bg-galaxy-850 hover:bg-purple-900/40 border border-purple-500/30 text-white font-semibold py-2.5 rounded-xl text-xs transition-colors" rel="noopener noreferrer">
            Pilih Paket Ini
          </a>
        </div>

        <!-- Paket 2 (Featured) -->
        <div class="astroclean-rustic-card border-2 border-purple-500 rounded-2xl p-7 flex flex-col justify-between relative shadow-xl shadow-purple-950/60">
          <div class="absolute -top-3 left-1/2 -translate-x-1/2 bg-purple-600 text-white text-[10px] font-bold uppercase tracking-wider px-3.5 py-1 rounded-full">
            Paling Populer
          </div>
          <div>
            <div class="w-12 h-12 rounded-xl bg-purple-600/30 border border-purple-400 flex items-center justify-center text-purple-300 mb-6">
              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>
            </div>
            <h3 class="text-xl font-astroclean-display font-bold text-white mb-2">Deep Sanitizing Cleaning</h3>
            <p class="text-xs text-slate-400 leading-relaxed mb-6">Pembersihan mendalam untuk kerak kamar mandi, kerak dapur menahun, sela jendela, dan sudut sempit tersembunyi.</p>
            
            <div class="mb-6">
              <span class="text-3xl font-astroclean-display font-bold text-purple-300">Rp 399.000</span>
              <span class="text-xs text-slate-400">/ Paket Ruang</span>
            </div>

            <ul class="space-y-3 text-xs text-slate-300 border-t border-purple-900/40 pt-6">
              <li class="flex items-center gap-2">
                <svg class="w-4 h-4 text-emerald-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                <strong class="text-white">Pembersihan Kerak Kamar Mandi Total</strong>
              </li>
              <li class="flex items-center gap-2">
                <svg class="w-4 h-4 text-emerald-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                Steam Uap Panas Suhu Tinggi (120°C)
              </li>
              <li class="flex items-center gap-2">
                <svg class="w-4 h-4 text-emerald-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                Degreasing Minyak Kompor & Cookerhood
              </li>
              <li class="flex items-center gap-2">
                <svg class="w-4 h-4 text-emerald-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                Fogging Desinfektan Ruangan Gratis
              </li>
            </ul>
          </div>
          <a href="https://wa.me/6281234567890?text=Halo%20AstroClean,%20saya%20mau%20booking%20Paket%20Deep%20Sanitizing" target="_blank" class="mt-8 w-full block text-center bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-500 hover:to-indigo-500 text-white font-semibold py-3 rounded-xl text-xs shadow-lg shadow-purple-600/30 transition-all" rel="noopener noreferrer">
            Booking Deep Clean
          </a>
        </div>

        <!-- Paket 3 -->
        <div class="astroclean-rustic-card astroclean-rustic-border rounded-2xl p-7 flex flex-col justify-between hover:border-purple-500/60 transition-all duration-300">
          <div>
            <div class="w-12 h-12 rounded-xl bg-purple-900/40 border border-purple-500/30 flex items-center justify-center text-purple-300 mb-6">
              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
            </div>
            <h3 class="text-xl font-astroclean-display font-bold text-white mb-2">Hydro Vacuum Tungau & Soft Furniture</h3>
            <p class="text-xs text-slate-400 leading-relaxed mb-6">Penyedotan tungau debu kasur, sofa, karpet & gorden menggunakan teknologi separator air berkekuatan tinggi.</p>
            
            <div class="mb-6">
              <span class="text-3xl font-astroclean-display font-bold text-white">Rp 249.000</span>
              <span class="text-xs text-slate-400">/ Kasur King Size</span>
            </div>

            <ul class="space-y-3 text-xs text-slate-300 border-t border-purple-900/40 pt-6">
              <li class="flex items-center gap-2">
                <svg class="w-4 h-4 text-purple-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                Sedot Tungau Debu Kasur & Bantal
              </li>
              <li class="flex items-center gap-2">
                <svg class="w-4 h-4 text-purple-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                Ekstraksi Sofa Kain & Karpet Bulu
              </li>
              <li class="flex items-center gap-2">
                <svg class="w-4 h-4 text-purple-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                Pemberian Aromaterapi Antibakteri
              </li>
              <li class="flex items-center gap-2">
                <svg class="w-4 h-4 text-purple-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                Tes Filter Air Sebelum & Sesudah
              </li>
            </ul>
          </div>
          <a href="https://wa.me/6281234567890?text=Halo%20AstroClean,%20saya%20mau%20pesan%20Hydro%20Vacuum" target="_blank" class="mt-8 w-full block text-center bg-galaxy-850 hover:bg-purple-900/40 border border-purple-500/30 text-white font-semibold py-2.5 rounded-xl text-xs transition-colors" rel="noopener noreferrer">
            Pilih Paket Ini
          </a>
        </div>

      </div>
    </div>
  </section>

  <!-- Keunggulan Section -->
  <section id="keunggulan" class="py-24 relative z-10 border-b border-purple-900/30">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
        
        <div class="lg:col-span-6 space-y-6">
          <span class="text-xs uppercase font-mono tracking-widest text-purple-400 font-semibold">Mengapa Kami Berbeda</span>
          <h2 class="text-3xl sm:text-4xl font-astroclean-display font-bold text-white tracking-tight">Standar Pembersihan Presisi Tinggi Tanpa Merusak Furnitur Anda</h2>
          <p class="text-slate-300 text-sm leading-relaxed">Kami memahami bahwa rumah adalah tempat perlindungan keluarga. Setiap cairan, alat mikrofiber, dan mesin yang kami gunakan diseleksi ketat agar aman bagi marmer, kayu jati, dan lantai granit Anda.</p>

          <div class="space-y-4 pt-4">
            <div class="flex gap-4 p-4 rounded-xl bg-galaxy-900/60 border border-purple-900/40">
              <div class="w-10 h-10 rounded-lg bg-purple-900/50 flex items-center justify-center text-purple-300 flex-shrink-0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
              </div>
              <div>
                <h4 class="text-sm font-semibold text-white">Pembersih Profesional Tersertifikasi</h4>
                <p class="text-xs text-slate-400 mt-1">Lulus pelatihan 120 jam intensif mengenai chemical safety dan SOP deep cleaning.</p>
              </div>
            </div>

            <div class="flex gap-4 p-4 rounded-xl bg-galaxy-900/60 border border-purple-900/40">
              <div class="w-10 h-10 rounded-lg bg-purple-900/50 flex items-center justify-center text-purple-300 flex-shrink-0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/></svg>
              </div>
              <div>
                <h4 class="text-sm font-semibold text-white">Chemical Eco-Friendly & Food Grade</h4>
                <p class="text-xs text-slate-400 mt-1">Bebas bau menyengat asam klorida berbahaya, nyaman langsung ditempati setelah pengerjaan.</p>
              </div>
            </div>

            <div class="flex gap-4 p-4 rounded-xl bg-galaxy-900/60 border border-purple-900/40">
              <div class="w-10 h-10 rounded-lg bg-purple-900/50 flex items-center justify-center text-purple-300 flex-shrink-0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
              </div>
              <div>
                <h4 class="text-sm font-semibold text-white">Jaminan Garansi 1x24 Jam Re-Clean</h4>
                <p class="text-xs text-slate-400 mt-1">Bila ada sudut yang belum bersih sesuai standar checklist, tim kami datang kembali gratis.</p>
              </div>
            </div>
          </div>
        </div>

        <div class="lg:col-span-6">
          <div class="astroclean-rustic-card astroclean-rustic-border rounded-3xl p-8 space-y-6">
            <div class="flex items-center justify-between border-b border-purple-900/40 pb-4">
              <h3 class="font-astroclean-display font-bold text-white text-lg">Perbandingan Hasil Pengerjaan</h3>
              <span class="text-xs font-mono text-purple-400">Real Case Audit</span>
            </div>

            <div class="grid grid-cols-2 gap-4">
              <div class="p-4 rounded-xl bg-galaxy-900/90 border border-red-500/20 text-center space-y-2">
                <span class="text-[10px] font-bold uppercase tracking-wider text-red-400 bg-red-950/60 px-2 py-0.5 rounded">Sebelum</span>
                <div class="h-28 rounded-lg bg-slate-900 flex items-center justify-center border border-slate-800 text-slate-500">
                  <svg class="w-8 h-8 opacity-40" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <p class="text-[11px] text-slate-400">Kerak kalsium tebal, jamur nat keramik, & aroma lembap</p>
              </div>

              <div class="p-4 rounded-xl bg-galaxy-900/90 border border-emerald-500/30 text-center space-y-2">
                <span class="text-[10px] font-bold uppercase tracking-wider text-emerald-400 bg-emerald-950/60 px-2 py-0.5 rounded">Sesudah</span>
                <div class="h-28 rounded-lg bg-purple-950/30 flex items-center justify-center border border-emerald-500/30 text-emerald-400">
                  <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>
                </div>
                <p class="text-[11px] text-slate-300 font-medium">Kinclong mengkilap, steril 99%, dan harum aromatik segar</p>
              </div>
            </div>

            <div class="p-4 rounded-xl bg-purple-950/30 border border-purple-800/40 text-xs text-center text-slate-300">
              Peralatan dibawa lengkap oleh tim: Vacuum wet/dry, Mesin Polisher, Steamer, Stepladder & 8 Jenis Chemical Khusus.
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- FAQ Section (Accordion) -->
  <section id="faq" class="py-24 relative z-10 border-b border-purple-900/30">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center mb-16 space-y-3">
        <span class="text-xs uppercase font-mono tracking-widest text-purple-400 font-semibold">Pusat Bantuan</span>
        <h2 class="text-3xl sm:text-4xl font-astroclean-display font-bold text-white">Pertanyaan yang Sering Diajukan (FAQ)</h2>
        <p class="text-slate-400 text-sm">Informasi transparan mengenai pemesanan, durasi kerja, dan jaminan keamanan tim kami.</p>
      </div>

      <!-- Accordion Container -->
      <div class="space-y-4" id="faq-container">
        
        <!-- Item 1 -->
        <div class="astroclean-rustic-card astroclean-rustic-border rounded-xl overflow-hidden">
          <button type="button" onclick="toggleFaq(this)" class="w-full text-left px-6 py-5 flex items-center justify-between text-sm sm:text-base font-semibold text-white hover:text-purple-300 transition-colors">
            <span>Bagaimana alur pemesanan jasa cleaning di AstroClean?</span>
            <svg class="w-5 h-5 text-purple-400 transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
          </button>
          <div class="faq-content hidden px-6 pb-5 text-xs sm:text-sm text-slate-300 leading-relaxed border-t border-purple-900/40 pt-4">
            Anda dapat memilih paket layanan di website ini atau menekan tombol WhatsApp. Tim customer support kami akan memandu konfirmasi jenis ruangan, jadwal kunjungan kru, dan metode pembayaran aman (transfer/cashless).
          </div>
        </div>

        <!-- Item 2 -->
        <div class="astroclean-rustic-card astroclean-rustic-border rounded-xl overflow-hidden">
          <button type="button" onclick="toggleFaq(this)" class="w-full text-left px-6 py-5 flex items-center justify-between text-sm sm:text-base font-semibold text-white hover:text-purple-300 transition-colors">
            <span>Apakah saya perlu menyiapkan alat dan cairan pembersih sendiri?</span>
            <svg class="w-5 h-5 text-purple-400 transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
          </button>
          <div class="faq-content hidden px-6 pb-5 text-xs sm:text-sm text-slate-300 leading-relaxed border-t border-purple-900/40 pt-4">
            Tidak perlu repot! Tim profesional kami datang membawa perlengkapan lengkap berstandar industri: vacuum cleaner wet & dry, steam machine suhu tinggi, cairan pembersih ramah lingkungan, lap microfiber steril terpisah kode warna, serta tangga lipat.
          </div>
        </div>

        <!-- Item 3 -->
        <div class="astroclean-rustic-card astroclean-rustic-border rounded-xl overflow-hidden">
          <button type="button" onclick="toggleFaq(this)" class="w-full text-left px-6 py-5 flex items-center justify-between text-sm sm:text-base font-semibold text-white hover:text-purple-300 transition-colors">
            <span>Apakah bahan kimia yang digunakan aman untuk balita & hewan peliharaan?</span>
            <svg class="w-5 h-5 text-purple-400 transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
          </button>
          <div class="faq-content hidden px-6 pb-5 text-xs sm:text-sm text-slate-300 leading-relaxed border-t border-purple-900/40 pt-4">
            Sangat aman. Kami menggunakan formula chemical food-grade yang ramah lingkungan, tanpa uap racun korosif. Ruangan langsung siap dihuni tanpa aroma menyengat yang membuat batuk atau iritasi kulit.
          </div>
        </div>

        <!-- Item 4 -->
        <div class="astroclean-rustic-card astroclean-rustic-border rounded-xl overflow-hidden">
          <button type="button" onclick="toggleFaq(this)" class="w-full text-left px-6 py-5 flex items-center justify-between text-sm sm:text-base font-semibold text-white hover:text-purple-300 transition-colors">
            <span>Berapa lama rata-rata durasi pengerjaan deep cleaning?</span>
            <svg class="w-5 h-5 text-purple-400 transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
          </button>
          <div class="faq-content hidden px-6 pb-5 text-xs sm:text-sm text-slate-300 leading-relaxed border-t border-purple-900/40 pt-4">
            Durasi sangat bergantung pada luasan dan tingkat keparahan kerak noda. Untuk 1 kamar mandi deep cleaning memerlukan 1.5 - 2.5 jam. Sedangkan untuk 1 unit apartemen 2BR berkisar antara 3 - 5 jam oleh tim 2-3 orang terlatih.
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer id="kontak" class="bg-galaxy-950 border-t border-purple-900/50 pt-16 pb-12 relative z-10 text-slate-400 text-xs">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid grid-cols-1 md:grid-cols-4 gap-10 pb-12 border-b border-purple-900/40">
        
        <div class="space-y-4">
          <div class="flex items-center gap-2">
            <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-purple-500 to-indigo-700 flex items-center justify-center text-white">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/></svg>
            </div>
            <span class="font-astroclean-display font-bold text-lg text-white">ASTRO<span class="text-purple-400">CLEAN</span></span>
          </div>
          <p class="text-slate-400 leading-relaxed">Layanan sanitasi dan deep cleaning hunian berstandar industri dengan jaminan kualitas kebersihan maksimal dan perlindungan furnitur.</p>
          <div class="flex items-center gap-3 pt-2">
            <a href="#" class="w-8 h-8 rounded-lg bg-galaxy-850 flex items-center justify-center text-slate-400 hover:text-white hover:bg-purple-900/50 transition-colors">
              <span class="sr-only">Instagram</span>
              <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
            </a>
            <a href="#" class="w-8 h-8 rounded-lg bg-galaxy-850 flex items-center justify-center text-slate-400 hover:text-white hover:bg-purple-900/50 transition-colors">
              <span class="sr-only">Facebook</span>
              <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.325-1.325z"/></svg>
            </a>
          </div>
        </div>

        <div>
          <h4 class="text-white font-semibold mb-4 uppercase tracking-wider text-[11px]">Cakupan Wilayah</h4>
          <ul class="space-y-2">
            <li class="flex items-center gap-1.5"><span class="text-purple-400">📍</span> Jakarta Selatan & Pusat</li>
            <li class="flex items-center gap-1.5"><span class="text-purple-400">📍</span> Jakarta Barat & Timur</li>
            <li class="flex items-center gap-1.5"><span class="text-purple-400">📍</span> Tangerang & BSD City</li>
            <li class="flex items-center gap-1.5"><span class="text-purple-400">📍</span> Bekasi & Depok</li>
          </ul>
        </div>

        <div>
          <h4 class="text-white font-semibold mb-4 uppercase tracking-wider text-[11px]">Navigasi Presisi</h4>
          <ul class="space-y-2">
            <li><a href="#beranda" class="hover:text-purple-400 transition-colors">Beranda Utama</a></li>
            <li><a href="#layanan" class="hover:text-purple-400 transition-colors">Daftar Paket Harga</a></li>
            <li><a href="#keunggulan" class="hover:text-purple-400 transition-colors">SOP & Sertifikasi Kru</a></li>
            <li><a href="#faq" class="hover:text-purple-400 transition-colors">Tanya Jawab (FAQ)</a></li>
          </ul>
        </div>

        <div>
          <h4 class="text-white font-semibold mb-4 uppercase tracking-wider text-[11px]">Kontak & Operasional</h4>
          <ul class="space-y-2">
            <li class="flex items-center gap-2"><span class="text-purple-400">📞</span> (021) 7890-4321</li>
            <li class="flex items-center gap-2"><span class="text-purple-400">💬</span> +62 812-3456-7890</li>
            <li class="flex items-center gap-2"><span class="text-purple-400">🕒</span> Setiap Hari: 07.30 - 20.00 WIB</li>
          </ul>
        </div>

      </div>

      <div class="pt-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-slate-400">
        <p>© 2025 AstroClean Indonesia. Seluruh hak cipta dilindungi.</p>
        <p class="text-[11px] text-purple-400">Desain 1: Konsep Rustic berkarakter kosmis & higienitas modern</p>
      </div>
    </div>
  </footer>

  <!-- Floating WhatsApp Button (Kanan Bawah) -->
  <a href="https://wa.me/6281234567890?text=Halo%20Admin%20AstroClean,%20saya%20ingin%20konsultasi%20jasa%20cleaning" target="_blank" class="fixed bottom-6 right-6 z-50 flex items-center gap-3 bg-emerald-500 hover:bg-emerald-600 text-white px-4 py-3 rounded-full shadow-2xl hover:scale-105 transition-all duration-300 group" rel="noopener noreferrer">
    <div class="w-8 h-8 rounded-full bg-white/20 flex items-center justify-center">
      <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
    </div>
    <span class="font-bold text-xs pr-1">Chat WhatsApp</span>
  </a>

  <!-- Floating AI Assistant Button (Kiri Bawah) -->
  <button onclick="document.getElementById('ai-modal').classList.remove('hidden')" class="fixed bottom-6 left-6 z-50 flex items-center gap-3 bg-galaxy-900/95 hover:bg-purple-900 text-purple-300 border border-purple-500/40 px-4 py-3 rounded-full shadow-2xl backdrop-blur-md hover:scale-105 transition-all duration-300">
    <div class="w-8 h-8 rounded-full bg-purple-600/30 border border-purple-400 flex items-center justify-center">
      <svg class="w-5 h-5 text-purple-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
    </div>
    <span class="font-bold text-xs pr-1 text-white">Estimasi AI</span>
  </button>

  <!-- Interactive AI Estimator Modal -->
  <div id="ai-modal" class="fixed inset-0 z-50 bg-black/80 backdrop-blur-sm flex items-center justify-center p-4 hidden">
    <div class="astroclean-rustic-card astroclean-rustic-border rounded-2xl max-w-md w-full p-6 space-y-5 border border-purple-500/40 shadow-2xl">
      <div class="flex items-center justify-between border-b border-purple-900/50 pb-3">
        <div class="flex items-center gap-2">
          <div class="w-7 h-7 rounded-lg bg-purple-600 flex items-center justify-center text-white">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
          </div>
          <h3 class="font-astroclean-display font-bold text-white text-base">AstroClean AI Estimator</h3>
        </div>
        <button onclick="document.getElementById('ai-modal').classList.add('hidden')" class="text-slate-400 hover:text-white p-1 rounded-lg">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
      </div>

      <div class="space-y-4 text-xs">
        <div>
          <label class="block text-slate-300 font-medium mb-1.5">Tipe Hunian / Ruangan</label>
          <select id="tipe-hunian" onchange="calculateEstimate()" class="w-full bg-galaxy-950 border border-purple-800 rounded-lg px-3 py-2 text-white focus:outline-none focus:border-purple-400">
            <option value="150000">Studio / Apartemen 1 BR (Estimasi Rp 150.000)</option>
            <option value="250000">Rumah / Apartemen 2 BR (Estimasi Rp 250.000)</option>
            <option value="400000">Rumah Menengah 3 BR (Estimasi Rp 400.000)</option>
            <option value="350000">Kamar Mandi Deep Clean Kerak (Estimasi Rp 350.000)</option>
            <option value="250000">Hydro Vacuum Kasur King Size (Estimasi Rp 250.000)</option>
          </select>
        </div>

        <div>
          <label class="block text-slate-300 font-medium mb-1.5">Kebutuhan Ekstra</label>
          <div class="grid grid-cols-2 gap-2">
            <label class="flex items-center gap-2 p-2 bg-galaxy-950/70 border border-purple-900/50 rounded-lg cursor-pointer">
              <input type="checkbox" id="add-fogging" onchange="calculateEstimate()" class="rounded border-purple-600 text-purple-600">
              <span class="text-slate-300 text-[11px]">Fogging Desinfektan (+50k)</span>
            </label>
            <label class="flex items-center gap-2 p-2 bg-galaxy-950/70 border border-purple-900/50 rounded-lg cursor-pointer">
              <input type="checkbox" id="add-steam" onchange="calculateEstimate()" class="rounded border-purple-600 text-purple-600">
              <span class="text-slate-300 text-[11px]">High Steam Sanitasi (+75k)</span>
            </label>
          </div>
        </div>

        <!-- Result Box -->
        <div class="p-4 rounded-xl bg-purple-950/40 border border-purple-500/30 text-center">
          <span class="text-slate-400 text-[11px] block">Estimasi Investasi Bersih:</span>
          <span id="total-price" class="text-2xl font-astroclean-display font-bold text-white block mt-1">Rp 150.000</span>
          <span class="text-[10px] text-purple-400 block mt-1">✓ Garansi 1x24 Jam Re-Clean</span>
        </div>

        <a id="btn-booking-wa" href="https://wa.me/6281234567890?text=Halo%20AstroClean,%20saya%20ingin%20booking%20jadwal%20cleaning%20dengan%20estimasi%20Rp%20150.000" target="_blank" class="w-full flex items-center justify-center gap-2 bg-emerald-500 hover:bg-emerald-600 text-white font-semibold py-2.5 rounded-xl transition-all" rel="noopener noreferrer">
          <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
          Pesan Jadwal Via WhatsApp
        </a>
      </div>
    </div>
  </div>

  <script>
    function toggleFaq(button) {
      const content = button.nextElementSibling;
      const icon = button.querySelector('svg');
      const isHidden = content.classList.contains('hidden');
      
      // Close all other faqs in container
      const allContents = document.querySelectorAll('#faq-container .faq-content');
      const allIcons = document.querySelectorAll('#faq-container button svg');
      allContents.forEach(c => c.classList.add('hidden'));
      allIcons.forEach(i => i.classList.remove('rotate-180'));

      if (isHidden) {
        content.classList.remove('hidden');
        icon.classList.add('rotate-180');
      }
    }

    function calculateEstimate() {
      const base = parseInt(document.getElementById('tipe-hunian').value) || 0;
      const fogging = document.getElementById('add-fogging').checked ? 50000 : 0;
      const steam = document.getElementById('add-steam').checked ? 75000 : 0;
      const total = base + fogging + steam;

      const formatted = 'Rp ' + total.toLocaleString('id-ID');
      document.getElementById('total-price').textContent = formatted;
      document.getElementById('btn-booking-wa').href = "https://wa.me/6281234567890?text=" + encodeURIComponent("Halo AstroClean, saya ingin booking jadwal dengan estimasi total: " + formatted);
    }
  </script>
</body>
</html>