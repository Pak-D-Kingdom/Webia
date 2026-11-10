<!DOCTYPE html><html class="scroll-smooth" lang="id"><head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<title>Kolektif Aksi Kita | Nonprofit &amp; Community Volunteer</title>
<!-- Tailwind CSS CDN -->
<!-- FontAwesome Icons CDN -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
<!-- Google Fonts: Inter & Plus Jakarta Sans & Outfit & Fraunces -->
<link href="https://fonts.googleapis.com" rel="preconnect">
<link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect">
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&amp;family=Plus+Jakarta+Sans:wght@400;500;600;700;800&amp;family=Fraunces:ital,opsz,wght@0,9..144,600;0,9..144,700;1,9..144,600&amp;display=swap" rel="stylesheet">

@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="text-slate-100 antialiased selection:bg-cyan-500 selection:text-white bg-relakita2-navy-950 relakita2-page">
<!-- ========================================== -->
<!-- TOP PERSISTENT CONTROLLER: DESIGN SWITCHER -->
<!-- ========================================== -->

<!-- Spacer for topbar -->

<!-- ========================================================================================== -->
<!-- [DESAIN 1: MODERN STYLE - THEME: MIDNIGHT NAVY & ELECTRIC CYAN]                            -->
<!-- ========================================================================================== -->
<div class="relakita2-view-container font-relakita2-modern bg-relakita2-navy-950 text-slate-100 min-h-screen relative overflow-hidden" id="landingModern">
<!-- Ambient Background Glows -->
<div class="absolute -top-40 -left-40 w-96 h-96 bg-cyan-500/10 rounded-full blur-3xl pointer-events-none"></div>
<div class="absolute top-1/3 -right-40 w-[30rem] h-[30rem] bg-indigo-600/10 rounded-full blur-3xl pointer-events-none"></div>
<div class="absolute bottom-40 left-1/4 w-[28rem] h-[28rem] bg-cyan-400/5 rounded-full blur-3xl pointer-events-none"></div>
<!-- 1. HEADER / NAVBAR (DESAIN 1) -->
<nav class="sticky z-40 relakita2-glass-navy border-b border-cyan-500/20 py-3.5 px-4 sm:px-8 top-0">
<div class="max-w-7xl mx-auto flex items-center justify-between">
<!-- Brand Logo -->
<a class="flex items-center gap-3 group" href="#beranda">
<div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-relakita2-cyan-accent-500 to-indigo-600 p-0.5 shadow-lg shadow-cyan-500/20 group-hover:scale-105 transition-transform">
<div class="w-full h-full bg-relakita2-navy-900 rounded-[10px] flex items-center justify-center">
<i class="fa-solid fa-hand-holding-heart text-relakita2-cyan-accent-400 text-lg"></i>
</div>
</div>
<div>
<span class="text-lg font-bold tracking-tight text-white flex items-center gap-1.5">
              RELAKITA <span class="text-xs px-2 py-0.5 rounded-full bg-cyan-500/10 text-relakita2-cyan-accent-400 border border-cyan-500/30 font-medium">MODERN</span>
</span>
<p class="text-[10px] text-slate-400 uppercase tracking-wider font-medium">Aksi Nyata Pemuda Bergerak</p>
</div>
</a>
<!-- Desktop Navigation Links (Anchor Links Smooth Scroll) -->
<div class="hidden md:flex items-center gap-7 text-sm font-medium text-slate-300"><a class="hover:text-relakita2-cyan-accent-400 transition-colors" href="#beranda">Beranda</a>
<a class="hover:text-relakita2-cyan-accent-400 transition-colors" href="#tentang-kami">Tentang Kami</a>
<a class="hover:text-relakita2-cyan-accent-400 transition-colors" href="#program">Program Relawan</a>
<a class="hover:text-relakita2-cyan-accent-400 transition-colors" href="#dampak">Dampak Aksi</a>
<a class="hover:text-relakita2-cyan-accent-400 transition-colors" href="#faq">FAQ</a>
<a class="hover:text-relakita2-cyan-accent-400 transition-colors" href="#kontak">Kontak</a></div>
<!-- Action CTA -->
<div class="hidden sm:flex items-center gap-3"><a class="text-xs font-semibold px-4 py-2.5 rounded-xl border border-slate-700 hover:border-relakita2-cyan-accent-500/50 hover:bg-slate-800/80 transition text-slate-300" href="#program">
            Jelajah Program
          </a>
<a class="text-xs font-bold px-4 py-2.5 rounded-xl bg-gradient-to-r from-cyan-500 to-blue-600 hover:from-cyan-400 hover:to-blue-500 text-relakita2-navy-950 shadow-lg shadow-cyan-500/25 transition hover:scale-105 active:scale-95" href="#daftar">
            Daftar Relawan <i class="fa-solid fa-arrow-right ml-1"></i>
</a></div>
<!-- Mobile Menu Toggle Button -->
<button class="md:hidden text-slate-300 hover:text-relakita2-cyan-accent-400 p-2 text-lg" onclick="toggleMobileNav('mobileMenuModern')">
<i class="fa-solid fa-bars"></i>
</button>
</div>
<!-- Mobile Dropdown Nav -->
<div class="hidden md:hidden pt-4 pb-2 border-t border-slate-800/80 mt-3 flex flex-col gap-3 text-sm" id="mobileMenuModern"><a class="py-1 px-2 rounded hover:bg-slate-800 text-slate-200" href="#beranda" onclick="closeMobileNav('mobileMenuModern')">Beranda</a>
<a class="py-1 px-2 rounded hover:bg-slate-800 text-slate-200" href="#tentang-kami" onclick="closeMobileNav('mobileMenuModern')">Tentang Kami</a>
<a class="py-1 px-2 rounded hover:bg-slate-800 text-slate-200" href="#program" onclick="closeMobileNav('mobileMenuModern')">Program Relawan</a>
<a class="py-1 px-2 rounded hover:bg-slate-800 text-slate-200" href="#dampak" onclick="closeMobileNav('mobileMenuModern')">Dampak Aksi</a>
<a class="py-1 px-2 rounded hover:bg-slate-800 text-slate-200" href="#faq" onclick="closeMobileNav('mobileMenuModern')">FAQ</a>
<a class="py-1 px-2 rounded hover:bg-slate-800 text-slate-200" href="#kontak" onclick="closeMobileNav('mobileMenuModern')">Kontak</a>
<a class="mt-2 text-center text-xs font-bold py-2.5 rounded-lg bg-cyan-500 text-relakita2-navy-950" href="#daftar" onclick="closeMobileNav('mobileMenuModern')">
          Daftar Jadi Relawan
        </a></div>
</nav>
<!-- 2. HERO SECTION (DESAIN 1) -->
<section class="relative pt-16 pb-24 px-4 sm:px-8 border-b border-slate-800/60" id="beranda">
<div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
<!-- Left Content -->
<div class="lg:col-span-7 space-y-6">
<div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-cyan-500/10 border border-cyan-500/30 text-relakita2-cyan-accent-400 text-xs font-semibold tracking-wide">
<span class="w-2 h-2 rounded-full bg-cyan-400 animate-pulse"></span>
            Gerakan Solidaritas Pemuda Terbuka 2025
          </div>
<h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight leading-[1.12] text-white">
            Satu Jam Tenagamu, <br class="hidden sm:inline">
<span class="bg-gradient-to-r from-cyan-400 via-sky-300 to-indigo-400 bg-clip-text text-transparent">
              Sejuta Harapan
            </span> untuk Nusantara.
          </h1>
<p class="text-base sm:text-lg text-slate-300 font-normal leading-relaxed max-w-2xl">
            Bergabunglah bersama ribuan relawan muda terampil. Kami menghubungkan dedikasi, keahlian profesional, dan ketulusan hati langsung ke titik-titik bencana, pendidikan pelosok, dan aksi konservasi lingkungan hidup.
          </p>
<!-- Buttons -->
<div class="pt-2 flex flex-wrap items-center gap-4"><a class="px-7 py-3.5 rounded-xl bg-gradient-to-r from-relakita2-cyan-accent-500 to-blue-600 hover:from-relakita2-cyan-accent-400 hover:to-blue-500 text-relakita2-navy-950 font-bold text-sm tracking-wide shadow-xl shadow-cyan-500/20 hover:shadow-cyan-500/35 transition hover:-translate-y-0.5 flex items-center gap-2" href="#daftar">
<i class="fa-solid fa-users-gear text-sm"></i>
              Daftar Jadi Relawan
            </a>
<a class="px-6 py-3.5 rounded-xl border border-slate-700 hover:border-cyan-400/50 bg-relakita2-navy-900/60 hover:bg-slate-800 text-white font-semibold text-sm transition flex items-center gap-2" href="#program">
<i class="fa-solid fa-compass text-relakita2-cyan-accent-400"></i>
              Eksplorasi Agenda Aksi
            </a></div>
<!-- Trust Badges / Quick Stats -->
<div class="pt-6 grid grid-cols-3 gap-4 border-t border-slate-800/80">
<div>
<div class="text-2xl sm:text-3xl font-extrabold text-relakita2-cyan-accent-400">14.8K+</div>
<div class="text-xs text-slate-400 font-medium">Relawan Aktif Terdaftar</div>
</div>
<div>
<div class="text-2xl sm:text-3xl font-extrabold text-white">128+</div>
<div class="text-xs text-slate-400 font-medium">Aksi Sosial Lapangan</div>
</div>
<div>
<div class="text-2xl sm:text-3xl font-extrabold text-sky-400">34</div>
<div class="text-xs text-slate-400 font-medium">Kota &amp; Daerah Pelosok</div>
</div>
</div>
</div>
<!-- Right Visual Display (Modern Glassmorphic Interactive Card Stack) -->
<div class="lg:col-span-5 relative">
<!-- Geometric accent frame -->
<div class="relative mx-auto max-w-md">
<div class="relakita2-glass-card-navy rounded-3xl p-4 shadow-2xl relative z-10">
<!-- Visual Hero Image with overlay -->
<div class="relative h-72 sm:h-80 rounded-2xl overflow-hidden group">
<img alt="Relawan berbagi dan mengajar" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCckiASJ4SZ6zQUWNdw1qDqmKOu61BsfftrEVj8SdcfGqh30Qgcl6M92IP6nsicY6VFG3ghmUjJIfP3Yo-sKyLkALP5MlGgE7ulR30nra4NyFAMO5Sg-MlfntkWI_8URQNRxvEXuw62B5hFkFnqajuT0l5gFLXvgfux6k4fBFfEAcONqF2wKzbAkWN6hAzdym3NSccMvZngyE_O5ck_fU8mtbt-JNSTuCOfsNCQ9oo">
<div class="absolute inset-0 bg-gradient-to-t from-relakita2-navy-950 via-relakita2-navy-950/40 to-transparent"></div>
<div class="absolute bottom-4 left-4 right-4 p-3 bg-relakita2-navy-900/80 backdrop-blur-md rounded-xl border border-cyan-500/20">
<div class="flex items-center justify-between text-xs mb-1">
<span class="text-relakita2-cyan-accent-400 font-bold tracking-wide">AKSI TANGGAP PENDIDIKAN</span>
<span class="bg-cyan-500/20 text-cyan-300 px-2 py-0.5 rounded text-[10px]">On-Going</span>
</div>
<p class="text-xs text-white font-medium">Mengajar &amp; Revitalisasi Sekolah Ambruk di Lebak</p>
</div>
</div>
<!-- Live Stat Floating Card -->
<div class="mt-4 p-4 rounded-xl bg-relakita2-navy-900/90 border border-slate-700/60 flex items-center justify-between">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-lg bg-cyan-500/20 text-relakita2-cyan-accent-400 flex items-center justify-center font-bold">
<i class="fa-solid fa-bullhorn text-sm"></i>
</div>
<div>
<div class="text-xs font-bold text-white">Batch #24 Siaga Bencana</div>
<div class="text-[11px] text-slate-400">Pendaftaran ditutup dalam 3 hari</div>
</div>
</div>
<span class="text-xs font-bold text-relakita2-cyan-accent-400 bg-cyan-950/80 px-2.5 py-1 rounded-md border border-cyan-500/30">
                  Open
                </span>
</div>
</div>
<!-- Decorative Floating Glass Bubble -->
<div class="absolute -bottom-6 -left-6 z-20 relakita2-glass-card-navy p-3.5 rounded-2xl shadow-xl flex items-center gap-3">
<div class="w-9 h-9 rounded-xl bg-emerald-500/20 text-emerald-400 flex items-center justify-center text-sm">
<i class="fa-solid fa-shield-halved"></i>
</div>
<div class="text-left">
<div class="text-xs font-bold text-white">100% Bebas Biaya</div>
<div class="text-[10px] text-slate-400">Akreditasi Dinsos &amp; Sertifikat Resmi</div>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- 3. TENTANG KAMI SECTION (DESAIN 1) -->
<section class="py-20 px-4 sm:px-8 border-b border-slate-800/60 relative" id="tentang-kami">
<div class="max-w-7xl mx-auto">
<div class="text-center max-w-2xl mx-auto mb-14">
<span class="text-xs font-bold tracking-wider text-relakita2-cyan-accent-400 uppercase bg-cyan-500/10 px-3 py-1 rounded-full border border-cyan-500/30">
            Nilai &amp; Prinsip Kami
          </span>
<h2 class="text-3xl sm:text-4xl font-extrabold text-white mt-3">Mengapa Bergerak Bersama Relakita?</h2>
<p class="text-slate-400 text-sm mt-2">Prinsip kerja transparan berbasis data, dampak terukur, dan perlindungan keamanan maksimal bagi setiap relawan di garis depan.</p>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
<div class="relakita2-glass-card-navy p-6 rounded-2xl transition duration-300">
<div class="w-12 h-12 rounded-xl bg-gradient-to-br from-cyan-500/20 to-blue-500/10 border border-cyan-500/30 text-relakita2-cyan-accent-400 flex items-center justify-center text-xl mb-4">
<i class="fa-solid fa-chart-line"></i>
</div>
<h3 class="text-lg font-bold text-white mb-2">Transparansi &amp; Dampak Riil</h3>
<p class="text-sm text-slate-300 leading-relaxed">
              Setiap jam aksi dan donasi logistik diaudit secara terbuka. Relawan dapat memantau indikator dampak langsung melalui dashboard relawan terpusat.
            </p>
</div>
<div class="relakita2-glass-card-navy p-6 rounded-2xl transition duration-300">
<div class="w-12 h-12 rounded-xl bg-gradient-to-br from-indigo-500/20 to-purple-500/10 border border-indigo-500/30 text-indigo-400 flex items-center justify-center text-xl mb-4">
<i class="fa-solid fa-kit-medical"></i>
</div>
<h3 class="text-lg font-bold text-white mb-2">Asuransi &amp; Pelatihan Khusus</h3>
<p class="text-sm text-slate-300 leading-relaxed">
              Kami tidak mengirim relawan tanpa kesiapan. Anda dibekali briefing keselamatan SOP ketat, asuransi kecelakaan lapangan, serta modul pertolongan pertama.
            </p>
</div>
<div class="relakita2-glass-card-navy p-6 rounded-2xl transition duration-300">
<div class="w-12 h-12 rounded-xl bg-gradient-to-br from-emerald-500/20 to-teal-500/10 border border-emerald-500/30 text-emerald-400 flex items-center justify-center text-xl mb-4">
<i class="fa-solid fa-certificate"></i>
</div>
<h3 class="text-lg font-bold text-white mb-2">Portofolio &amp; Jejaring Nasional</h3>
<p class="text-sm text-slate-300 leading-relaxed">
              Dapatkan e-certificate resmi bertaraf nasional, rekomendasi profesional untuk karir, serta jejaring dengan komunitas filantropi terkemuka.
            </p>
</div>
</div>
</div>
</section>
<!-- 4. PROGRAM RELAWAN SECTION (DESAIN 1) -->
<section class="py-20 px-4 sm:px-8 border-b border-slate-800/60 bg-relakita2-navy-900/30" id="program">
<div class="max-w-7xl mx-auto">
<div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4">
<div>
<span class="text-xs font-bold tracking-wider text-relakita2-cyan-accent-400 uppercase bg-cyan-500/10 px-3 py-1 rounded-full border border-cyan-500/30">
              Pilihan Kontribusi
            </span>
<h2 class="text-3xl sm:text-4xl font-extrabold text-white mt-3">Program Relawan Terbuka</h2>
<p class="text-slate-400 text-sm mt-1">Pilih klaster aksi yang paling sesuai dengan passion dan keahlian spesifik Anda.</p>
</div>
<div class="text-xs text-slate-400">
            Pembaruan kuota: <span class="text-relakita2-cyan-accent-400 font-semibold">Minggu Ini</span>
</div>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
<!-- Program Card 1 -->
<div class="relakita2-glass-card-navy rounded-2xl overflow-hidden flex flex-col group">
<div class="h-48 overflow-hidden relative">
<img alt="Sahabat Mengajar Pelosok Desa" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA_yZwi9wpQdeICvr4MK76dkkuiJuUX3TlJwNmoz4LHZkNg5JwvbwLNluipoBQCK8qyAsVz2FEZoOuzax1CtPgEokUJKqRTqjdwdp7PtHeir3FTMg__YGXxPEF4uZvE5JMs3Jmyii142xy0pf1XXqJtwv_a3fqdN_7Zp0G44k43sy10bX-gKERywfdmh9B6othACqzia_f8Exji2uF9YB4JlG5H_lIBOuy71Ran6UM">
<span class="absolute top-3 left-3 bg-relakita2-navy-950/80 backdrop-blur-md text-relakita2-cyan-accent-400 border border-cyan-500/30 text-[11px] font-bold px-2.5 py-1 rounded-md">
                Pendidikan Anak
              </span>
</div>
<div class="p-6 flex-1 flex flex-col justify-between space-y-4">
<div>
<h3 class="text-lg font-bold text-white group-hover:text-relakita2-cyan-accent-400 transition-colors">Sahabat Mengajar Pelosok Desa</h3>
<p class="text-xs text-slate-300 mt-2 line-clamp-3">
                  Mengajar literasi dasar, numerasi kreatif, dan teknologi komputer untuk anak-anak sekolah dasar di wilayah 3T selama 2 pekan.
                </p>
<div class="mt-3 flex items-center gap-3 text-xs text-slate-400">
<span class=""><i class="fa-solid fa-location-dot text-relakita2-cyan-accent-400 mr-1"></i> NTT &amp; Halmahera</span>
<span class=""><i class="fa-solid fa-clock text-relakita2-cyan-accent-400 mr-1"></i> Weekend / Cuti</span>
</div>
</div>
<div class="pt-3 border-t border-slate-800 flex items-center justify-between">
<span class="text-[11px] text-emerald-400 font-semibold"><i class="fa-solid fa-user-check mr-1"></i> Kuota Sisa: 12 Orang</span>
<a class="text-xs font-bold text-relakita2-cyan-accent-400 hover:text-white flex items-center gap-1 group-hover:translate-x-1 transition-transform" href="#daftar">
                  Daftar <i class="fa-solid fa-arrow-right"></i>
</a>
</div>
</div>
</div>
<!-- Program Card 2 -->
<div class="relakita2-glass-card-navy rounded-2xl overflow-hidden flex flex-col group">
<div class="h-48 overflow-hidden relative">
<img alt="Restorasi Mangrove &amp; Pesisir" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDYEWIxCZeiIgti_RGRVX9PnQ72GV1iwh0Fd4faG9RWxKiMQC0VCgzECS5Gkj_aaFJkF06VOnRyOwBFZDXLEeew5TnTBizgIxfgJGc97OjmQk5l9RwvCyR9jFEK6ouKX49jAbHLQmUElLJJLgqeVnx3HR-VGzxFc_98GQMSkF9O59Swp7faPvaGsrCzp_pmkHWXrrBQdnDBc0uONUDva9Ve5JJwYOznE0SXcG-Qh4I">
<span class="absolute top-3 left-3 bg-relakita2-navy-950/80 backdrop-blur-md text-emerald-400 border border-emerald-500/30 text-[11px] font-bold px-2.5 py-1 rounded-md">
                Lingkungan Hidup
              </span>
</div>
<div class="p-6 flex-1 flex flex-col justify-between space-y-4">
<div>
<h3 class="text-lg font-bold text-white group-hover:text-relakita2-cyan-accent-400 transition-colors">Restorasi Mangrove &amp; Pesisir</h3>
<p class="text-xs text-slate-300 mt-2 line-clamp-3">
                  Penanaman 10.000 bibit mangrove pelindung abrasi pantai, pembersihan limbah mikroplastik bersama nelayan lokal.
                </p>
<div class="mt-3 flex items-center gap-3 text-xs text-slate-400">
<span class=""><i class="fa-solid fa-location-dot text-relakita2-cyan-accent-400 mr-1"></i> Muara Gembong, Jabar</span>
<span class=""><i class="fa-solid fa-clock text-relakita2-cyan-accent-400 mr-1"></i> Sab-Minggu</span>
</div>
</div>
<div class="pt-3 border-t border-slate-800 flex items-center justify-between">
<span class="text-[11px] text-emerald-400 font-semibold"><i class="fa-solid fa-user-check mr-1"></i> Kuota Sisa: 25 Orang</span>
<a class="text-xs font-bold text-relakita2-cyan-accent-400 hover:text-white flex items-center gap-1 group-hover:translate-x-1 transition-transform" href="#daftar">
                  Daftar <i class="fa-solid fa-arrow-right"></i>
</a>
</div>
</div>
</div>
<!-- Program Card 3 -->
<div class="relakita2-glass-card-navy rounded-2xl overflow-hidden flex flex-col group">
<div class="h-48 overflow-hidden relative">
<img alt="Dapur Umum &amp; Logistik Darurat" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBg-8qanDRiubwhlv4CJpZPigdkiOXaHJ7Kf1yJes6257-WI2Lkqe4QHwqwwil02ju7K9Jz8tPjOwm3vZliJrcKSkznQy8510X0NIYn6Go2aGUU_2frm6BtTQVYRvmCPzkaiTAVO0o658IX5V3k-S_5uxFYlvHDwtLvn57VL11LnS-TsifS0cbhwNEJu4wr5E1eXk0gB2CBDo9dJUvfjZlrOVmAKAVMQxj4sOydpD4">
<span class="absolute top-3 left-3 bg-relakita2-navy-950/80 backdrop-blur-md text-amber-400 border border-amber-500/30 text-[11px] font-bold px-2.5 py-1 rounded-md">
                Respon Cepat
              </span>
</div>
<div class="p-6 flex-1 flex flex-col justify-between space-y-4">
<div>
<h3 class="text-lg font-bold text-white group-hover:text-relakita2-cyan-accent-400 transition-colors">Dapur Umum &amp; Logistik Darurat</h3>
<p class="text-xs text-slate-300 mt-2 line-clamp-3">
                  Distribusi makanan sehat, penyaluran obat-obatan, serta pendampingan trauma healing anak pasca gempa dan banjir bandang.
                </p>
<div class="mt-3 flex items-center gap-3 text-xs text-slate-400">
<span class=""><i class="fa-solid fa-location-dot text-relakita2-cyan-accent-400 mr-1"></i> Posko Siaga Nasional</span>
<span class=""><i class="fa-solid fa-clock text-relakita2-cyan-accent-400 mr-1"></i> Panggilan Siaga</span>
</div>
</div>
<div class="pt-3 border-t border-slate-800 flex items-center justify-between">
<span class="text-[11px] text-amber-400 font-semibold"><i class="fa-solid fa-user-check mr-1"></i> Kuota Sisa: 8 Orang</span>
<a class="text-xs font-bold text-relakita2-cyan-accent-400 hover:text-white flex items-center gap-1 group-hover:translate-x-1 transition-transform" href="#daftar">
                  Daftar <i class="fa-solid fa-arrow-right"></i>
</a>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- 5. IMPACT & EVIDENCE (DESAIN 1) -->
<section class="py-16 px-4 sm:px-8 border-b border-slate-800/60" id="dampak">
<div class="max-w-7xl mx-auto relakita2-glass-card-navy rounded-3xl p-8 sm:p-12 relative overflow-hidden">
<div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
<div>
<span class="text-xs font-bold text-relakita2-cyan-accent-400 uppercase tracking-widest">Dampak Nyata Komunitas</span>
<h3 class="text-2xl sm:text-3xl font-extrabold text-white mt-2">
              "Menjadi relawan mengubah cara saya memandang privilege dan arti empati sejati."
            </h3>
<p class="text-slate-300 text-sm mt-3">
              Fadhil Rahman - Product Designer &amp; Relawan Pendidikan Lebak (Batch 20)
            </p>
</div>
<div class="grid grid-cols-2 gap-4">
<div class="bg-relakita2-navy-950/80 p-5 rounded-xl border border-slate-800">
<div class="text-3xl font-extrabold text-relakita2-cyan-accent-400">85.000+</div>
<div class="text-xs text-slate-400 mt-1">Porsi Makanan Bergizi Tersalurkan</div>
</div>
<div class="bg-relakita2-navy-950/80 p-5 rounded-xl border border-slate-800">
<div class="text-3xl font-extrabold text-white">42</div>
<div class="text-xs text-slate-400 mt-1">Perpustakaan Desa Terbangun</div>
</div>
<div class="bg-relakita2-navy-950/80 p-5 rounded-xl border border-slate-800">
<div class="text-3xl font-extrabold text-indigo-400">12.400</div>
<div class="text-xs text-slate-400 mt-1">Bibit Pohon Tertanam Rimbun</div>
</div>
<div class="bg-relakita2-navy-950/80 p-5 rounded-xl border border-slate-800">
<div class="text-3xl font-extrabold text-emerald-400">100%</div>
<div class="text-xs text-slate-400 mt-1">Audit Keuangan WTP Publik</div>
</div>
</div>
</div>
</div>
</section>
<!-- 6. FAQ ACCORDION SECTION (DESAIN 1) -->
<section class="py-20 px-4 sm:px-8 border-b border-slate-800/60" id="faq">
<div class="max-w-4xl mx-auto">
<div class="text-center mb-12">
<span class="text-xs font-bold tracking-wider text-relakita2-cyan-accent-400 uppercase bg-cyan-500/10 px-3 py-1 rounded-full border border-cyan-500/30">
            Pusat Informasi
          </span>
<h2 class="text-3xl sm:text-4xl font-extrabold text-white mt-3">Frequently Asked Questions</h2>
<p class="text-slate-400 text-sm mt-2">Semua hal yang perlu Anda ketahui mengenai alur seleksi, syarat, dan akomodasi kegiatan.</p>
</div>
<!-- Accordion List -->
<div class="space-y-4">
<!-- Accordion Item 1 -->
<div class="relakita2-glass-card-navy rounded-xl overflow-hidden border border-slate-800 transition">
<button class="w-full p-5 text-left font-semibold text-white flex items-center justify-between gap-4 hover:text-relakita2-cyan-accent-400 transition" onclick="toggleAccordion('faqModern1', 'iconModern1')">
<span class="text-sm sm:text-base">1. Apa saja syarat utama untuk mendaftar sebagai relawan?</span>
<i class="fa-solid fa-chevron-down text-xs text-relakita2-cyan-accent-400 transition-transform duration-300" id="iconModern1"></i>
</button>
<div class="hidden px-5 pb-5 text-xs sm:text-sm text-slate-300 leading-relaxed border-t border-slate-800/60 pt-3" id="faqModern1">
              Syarat umum mencakup usia minimal 17 tahun (atau 16 tahun dengan izin orang tua/wali), memiliki komitmen waktu sesuai jadwal program yang dipilih, berbadan sehat untuk kegiatan lapangan, serta memiliki dedikasi dan empati sosial tinggi. Tidak ada batasan latar belakang profesi maupun jurusan pendidikan!
            </div>
</div>
<!-- Accordion Item 2 -->
<div class="relakita2-glass-card-navy rounded-xl overflow-hidden border border-slate-800 transition">
<button class="w-full p-5 text-left font-semibold text-white flex items-center justify-between gap-4 hover:text-relakita2-cyan-accent-400 transition" onclick="toggleAccordion('faqModern2', 'iconModern2')">
<span class="text-sm sm:text-base">2. Bagaimana alur pendaftaran dari awal hingga diterjunkan ke lokasi?</span>
<i class="fa-solid fa-chevron-down text-xs text-relakita2-cyan-accent-400 transition-transform duration-300" id="iconModern2"></i>
</button>
<div class="hidden px-5 pb-5 text-xs sm:text-sm text-slate-300 leading-relaxed border-t border-slate-800/60 pt-3" id="faqModern2">
              Alur pendaftaran terdiri dari 4 langkah mudah:
              <ul class="list-disc pl-5 mt-2 space-y-1">
<li class=""><strong>Tahap 1:</strong> Mengisi formulir online &amp; melengkapi profil keahlian.</li>
<li class=""><strong>Tahap 2:</strong> Screening singkat &amp; onboarding virtual via Zoom/Google Meet.</li>
<li class=""><strong>Tahap 3:</strong> Briefing teknis &amp; simulasi lapangan bersama koordinator wilayah.</li>
<li class=""><strong>Tahap 4:</strong> Penugasan aksi di lokasi serta penerbitan kartu identitas relawan.</li>
</ul>
</div>
</div>
<!-- Accordion Item 3 -->
<div class="relakita2-glass-card-navy rounded-xl overflow-hidden border border-slate-800 transition">
<button class="w-full p-5 text-left font-semibold text-white flex items-center justify-between gap-4 hover:text-relakita2-cyan-accent-400 transition" onclick="toggleAccordion('faqModern3', 'iconModern3')">
<span class="text-sm sm:text-base">3. Apakah kegiatan ini dipungut biaya dan apakah relawan mendapat akomodasi?</span>
<i class="fa-solid fa-chevron-down text-xs text-relakita2-cyan-accent-400 transition-transform duration-300" id="iconModern3"></i>
</button>
<div class="hidden px-5 pb-5 text-xs sm:text-sm text-slate-300 leading-relaxed border-t border-slate-800/60 pt-3" id="faqModern3">
              Pendaftaran relawan <strong>100% GRATIS</strong> tanpa dipungut biaya sepeser pun. Untuk program aksi lapangan di luar kota/pelosok, konsumsi harian, tempat tinggal/homestay di posko relawan, logistik kegiatan, dan asuransi ditanggung penuh oleh yayasan dan mitra donor komunitas.
            </div>
</div>
<!-- Accordion Item 4 -->
<div class="relakita2-glass-card-navy rounded-xl overflow-hidden border border-slate-800 transition">
<button class="w-full p-5 text-left font-semibold text-white flex items-center justify-between gap-4 hover:text-relakita2-cyan-accent-400 transition" onclick="toggleAccordion('faqModern4', 'iconModern4')">
<span class="text-sm sm:text-base">4. Di mana saja lokasi kegiatan komunitas berlangsung?</span>
<i class="fa-solid fa-chevron-down text-xs text-relakita2-cyan-accent-400 transition-transform duration-300" id="iconModern4"></i>
</button>
<div class="hidden px-5 pb-5 text-xs sm:text-sm text-slate-300 leading-relaxed border-t border-slate-800/60 pt-3" id="faqModern4">
              Kami memiliki posko relawan aktif di 14 kota besar (Jabodetabek, Bandung, Yogyakarta, Surabaya, Medan, Makassar, Denpasar) serta penugasan insidental aksi bencana dan pendidikan pelosok yang tersebar di wilayah Jawa Barat, Banten, Sulawesi Tengah, hingga NTT.
            </div>
</div>
<!-- Accordion Item 5 -->
<div class="relakita2-glass-card-navy rounded-xl overflow-hidden border border-slate-800 transition">
<button class="w-full p-5 text-left font-semibold text-white flex items-center justify-between gap-4 hover:text-relakita2-cyan-accent-400 transition" onclick="toggleAccordion('faqModern5', 'iconModern5')">
<span class="text-sm sm:text-base">5. Apakah relawan mendapatkan sertifikat resmi?</span>
<i class="fa-solid fa-chevron-down text-xs text-relakita2-cyan-accent-400 transition-transform duration-300" id="iconModern5"></i>
</button>
<div class="hidden px-5 pb-5 text-xs sm:text-sm text-slate-300 leading-relaxed border-t border-slate-800/60 pt-3" id="faqModern5">
              Ya, seluruh relawan yang menyelesaikan minimal 1 kali program aksi akan menerima e-sertifikat resmi berkode verifikasi QR, ringkasan jam kontribusi (volunteer hours), serta surat rekomendasi pengalaman aksi jika dibutuhkan untuk keperluan beasiswa atau karir.
            </div>
</div>
</div>
</div>
</section>
<!-- 7. CTA FORM SECTION (DESAIN 1) -->
<section class="py-20 px-4 sm:px-8 bg-gradient-to-b from-relakita2-navy-950 to-relakita2-navy-900 border-b border-slate-800/60" id="daftar">
<div class="max-w-4xl mx-auto relakita2-glass-card-navy p-8 sm:p-12 rounded-3xl border border-cyan-500/30 shadow-2xl relative">
<div class="text-center max-w-xl mx-auto mb-8">
<span class="text-xs font-bold text-relakita2-cyan-accent-400 uppercase tracking-widest">Langkah Awal Kontribusi</span>
<h2 class="text-2xl sm:text-3xl font-extrabold text-white mt-2">Formulir Minat Bergabung Relawan</h2>
<p class="text-slate-300 text-xs sm:text-sm mt-1">Daftarkan diri Anda hari ini. Tim koordinator kami akan menghubungi via WhatsApp dalam 1x24 jam.</p>
</div>
<form class="grid grid-cols-1 sm:grid-cols-2 gap-4" onsubmit="event.preventDefault(); alert('Terima kasih! Tim Relakita akan segera menghubungi Anda melalui WhatsApp.');">
<div>
<label class="block text-xs font-semibold text-slate-300 mb-1">Nama Lengkap *</label>
<input class="w-full bg-relakita2-navy-950 border border-slate-700 rounded-xl px-4 py-3 text-xs sm:text-sm text-white focus:outline-none focus:border-relakita2-cyan-accent-400 transition" placeholder="Contoh: Budi Pratama" required="" type="text">
</div>
<div>
<label class="block text-xs font-semibold text-slate-300 mb-1">Nomor WhatsApp *</label>
<input class="w-full bg-relakita2-navy-950 border border-slate-700 rounded-xl px-4 py-3 text-xs sm:text-sm text-white focus:outline-none focus:border-relakita2-cyan-accent-400 transition" placeholder="Contoh: 081234567890" required="" type="tel">
</div>
<div>
<label class="block text-xs font-semibold text-slate-300 mb-1">Kota Domisili *</label>
<input class="w-full bg-relakita2-navy-950 border border-slate-700 rounded-xl px-4 py-3 text-xs sm:text-sm text-white focus:outline-none focus:border-relakita2-cyan-accent-400 transition" placeholder="Contoh: Jakarta Selatan" required="" type="text">
</div>
<div>
<label class="block text-xs font-semibold text-slate-300 mb-1">Pilihan Minat Divisi *</label>
<select class="w-full bg-relakita2-navy-950 border border-slate-700 rounded-xl px-4 py-3 text-xs sm:text-sm text-white focus:outline-none focus:border-relakita2-cyan-accent-400 transition">
<option>Pendidikan &amp; Mengajar Anak</option>
<option>Lingkungan &amp; Penanaman Mangrove</option>
<option>Tanggap Darurat Bencana &amp; Medis</option>
<option>Media, Dokumentasi &amp; Desain Konten</option>
</select>
</div>
<div class="sm:col-span-2 pt-2">
<button class="w-full py-4 rounded-xl bg-gradient-to-r from-cyan-500 to-blue-600 hover:from-cyan-400 hover:to-blue-500 text-relakita2-navy-950 font-bold text-sm tracking-wide shadow-xl shadow-cyan-500/25 transition" type="submit">
              Kirim Pendaftaran Relawan Sekarang <i class="fa-solid fa-paper-plane ml-2"></i>
</button>
<p class="text-center text-[11px] text-slate-400 mt-2">
<i class="fa-solid fa-lock text-[10px] text-relakita2-cyan-accent-400 mr-1"></i> Data Anda dijamin kerahasiaannya dan hanya digunakan untuk keperluan koordinasi relawan.
            </p>
</div>
</form>
</div>
</section>
<!-- 8. FOOTER SECTION (DESAIN 1) -->
<footer class="bg-relakita2-navy-950 border-t border-slate-800 text-slate-400 text-xs py-14 px-4 sm:px-8" id="kontak">
<div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-8 mb-10">
<!-- Col 1: Brand & Bio -->
<div class="space-y-3">
<div class="flex items-center gap-2">
<div class="w-8 h-8 rounded-lg bg-cyan-500/20 text-relakita2-cyan-accent-400 flex items-center justify-center font-bold">
<i class="fa-solid fa-hand-holding-heart"></i>
</div>
<span class="text-base font-bold text-white tracking-wide">RELAKITA INDONESIA</span>
</div>
<p class="text-slate-400 leading-relaxed">
            Platform relawan independen berbadan hukum nirlaba yang berfokus pada pengentasan kesenjangan pendidikan, respons darurat bencana, dan kelestarian ekosistem pesisir.
          </p>
<div class="pt-1 text-[11px] text-relakita2-cyan-accent-400 font-medium">
<i class="fa-solid fa-certificate mr-1"></i> SK Kemenkumham RI: AHU-0012948.AH.01.07.2021
          </div>
</div>
<!-- Col 2: Navigasi Cepat -->
<div>
<h4 class="text-sm font-bold text-white mb-3 tracking-wider uppercase">Navigasi Cepat</h4>
<ul class="space-y-2"><li class=""><a class="hover:text-relakita2-cyan-accent-400 transition" href="#beranda">Beranda Utama</a></li>
<li class=""><a class="hover:text-relakita2-cyan-accent-400 transition" href="#tentang-kami">Tentang Kami &amp; SOP</a></li>
<li class=""><a class="hover:text-relakita2-cyan-accent-400 transition" href="#program">Program Aksi Aktif</a></li>
<li class=""><a class="hover:text-relakita2-cyan-accent-400 transition" href="#dampak">Dampak &amp; Laporan Donasi</a></li>
<li class=""><a class="hover:text-relakita2-cyan-accent-400 transition" href="#faq">Tanya Jawab (FAQ)</a></li></ul>
</div>
<!-- Col 3: Posko & Legalitas -->
<div>
<h4 class="text-sm font-bold text-white mb-3 tracking-wider uppercase">Sekretariat &amp; Hub</h4>
<p class="leading-relaxed">
            Gedung Sinergi Pemuda Lt. 3, Jl. Tebet Barat Raya No. 45, Jakarta Selatan 12810.
          </p>
<p class="mt-2">
<i class="fa-solid fa-envelope text-relakita2-cyan-accent-400 mr-1.5"></i> kontak@relakita.org
          </p>
<p class="mt-1">
<i class="fa-solid fa-phone text-relakita2-cyan-accent-400 mr-1.5"></i> (021) 7892-3401
          </p>
</div>
<!-- Col 4: Sosial Media -->
<div>
<h4 class="text-sm font-bold text-white mb-3 tracking-wider uppercase">Media Sosial</h4>
<p class="mb-3">Ikuti dokumentasi aksi relawan secara real-time di kanal media sosial kami:</p>
<div class="flex items-center gap-3">
<a class="w-9 h-9 rounded-lg bg-relakita2-navy-900 border border-slate-700 flex items-center justify-center text-slate-300 hover:text-relakita2-cyan-accent-400 hover:border-cyan-400 transition" href="#">
<i class="fa-brands fa-instagram"></i>
</a>
<a class="w-9 h-9 rounded-lg bg-relakita2-navy-900 border border-slate-700 flex items-center justify-center text-slate-300 hover:text-relakita2-cyan-accent-400 hover:border-cyan-400 transition" href="#">
<i class="fa-brands fa-youtube"></i>
</a>
<a class="w-9 h-9 rounded-lg bg-relakita2-navy-900 border border-slate-700 flex items-center justify-center text-slate-300 hover:text-relakita2-cyan-accent-400 hover:border-cyan-400 transition" href="#">
<i class="fa-brands fa-tiktok"></i>
</a>
<a class="w-9 h-9 rounded-lg bg-relakita2-navy-900 border border-slate-700 flex items-center justify-center text-slate-300 hover:text-relakita2-cyan-accent-400 hover:border-cyan-400 transition" href="#">
<i class="fa-brands fa-linkedin-in"></i>
</a>
</div>
</div>
</div>
<div class="max-w-7xl mx-auto pt-6 border-t border-slate-800/80 flex flex-col sm:flex-row items-center justify-between gap-3 text-slate-500 text-[11px]">
<div class="">
          © 2025 Komunitas Relawan Relakita Indonesia. Seluruh hak cipta dilindungi undang-undang.
        </div>
<div class="flex items-center gap-4">
<a class="hover:text-slate-300" href="#">Kebijakan Privasi</a>
<a class="hover:text-slate-300" href="#">Kode Etik Relawan</a>
<a class="hover:text-slate-300" href="#">Laporan Tahunan</a>
</div>
</div>
</footer>
</div>
<!-- ========================================================================================== -->
<!-- [DESAIN 2: CLASSIC STYLE - THEME: SUNSET GRADIENT & WARM HARMONY]                         -->
<!-- ========================================================================================== -->

<!-- ========================================================================================== -->
<!-- FLOATING ACTION BUTTONS (MANDATORY ACCORDING TO SPEC):                                       -->
<!-- 1. FLOATING AI ASSISTANT BUTTON                                                           -->
<!-- 2. FLOATING WHATSAPP BUTTON                                                               -->
<!-- ========================================================================================== -->
<!-- 1. Floating AI Assistant (Bottom-Left) -->
<div class="fixed bottom-6 left-6 z-50">
<button class="group relative flex items-center gap-2.5 px-4 py-3 rounded-full bg-slate-900 text-white border border-cyan-500/40 shadow-2xl hover:border-cyan-400 hover:scale-105 active:scale-95 transition-all" onclick="toggleAiModal()">
<span class="relative flex h-3 w-3">
<span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-cyan-400 opacity-75"></span>
<span class="relative inline-flex rounded-full h-3 w-3 bg-cyan-500"></span>
</span>
<i class="fa-solid fa-robot text-cyan-400 text-sm"></i>
<span class="text-xs font-bold tracking-wide">AI Relawan Bot</span>
<span class="hidden group-hover:inline text-[10px] text-slate-300 bg-slate-800 px-2 py-0.5 rounded-full border border-slate-700">
        Konsultasi
      </span>
</button>
</div>
<!-- Modal Interactive AI Assistant -->
<div class="fixed inset-0 z-50 bg-black/70 backdrop-blur-sm hidden flex items-center justify-center p-4" id="aiModal">
<div class="bg-slate-900 border border-cyan-500/40 w-full max-w-md rounded-2xl shadow-2xl overflow-hidden flex flex-col max-h-[85vh] animate-in fade-in zoom-in duration-200">
<!-- AI Header -->
<div class="p-4 bg-slate-950 border-b border-slate-800 flex items-center justify-between">
<div class="flex items-center gap-3">
<div class="w-9 h-9 rounded-xl bg-cyan-500/20 text-cyan-400 flex items-center justify-center">
<i class="fa-solid fa-robot"></i>
</div>
<div>
<h4 class="text-xs font-bold text-white">AI Relawan Matcher</h4>
<p class="text-[10px] text-cyan-400 flex items-center gap-1">
<span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span> Siap Merekomendasikan Program
            </p>
</div>
</div>
<button class="text-slate-400 hover:text-white p-1 text-sm" onclick="toggleAiModal()">
<i class="fa-solid fa-xmark"></i>
</button>
</div>
<!-- AI Chat Body -->
<div class="p-4 overflow-y-auto space-y-3 flex-1 text-xs text-slate-200" id="aiChatBody">
<div class="flex gap-2.5 items-start">
<div class="w-6 h-6 rounded-full bg-cyan-500/20 text-cyan-400 flex-shrink-0 flex items-center justify-center text-[10px]">
<i class="fa-solid fa-robot"></i>
</div>
<div class="bg-slate-800/80 p-3 rounded-2xl rounded-tl-none border border-slate-700">
            Halo! Saya asisten virtual komunitas relawan. Apa minat atau keahlian yang ingin Anda kontribusikan? (Misal: <em>mengajar, medis, masak, foto/video, atau lingkungan</em>)
          </div>
</div>
</div>
<!-- Quick Prompts Suggestions -->
<div class="px-4 py-2 bg-slate-950/60 border-t border-slate-800 flex gap-1.5 overflow-x-auto text-[10px]">
<button class="bg-slate-800 text-cyan-300 px-2.5 py-1 rounded-full whitespace-nowrap hover:bg-slate-700" onclick="sendQuickPrompt('Saya ingin mengajar anak-anak')">
          Mengajar Anak Pelosok
        </button>
<button class="bg-slate-800 text-cyan-300 px-2.5 py-1 rounded-full whitespace-nowrap hover:bg-slate-700" onclick="sendQuickPrompt('Saya ingin aksi lingkungan')">
          Tanam Mangrove
        </button>
<button class="bg-slate-800 hover:bg-slate-700 px-2.5 py-1 rounded-full text-cyan-300 whitespace-nowrap" onclick="sendQuickPrompt('Bagaimana syarat bergabung?')">
          Syarat Relawan
        </button>
</div>
<!-- Input box -->
<form class="p-3 bg-slate-950 border-t border-slate-800 flex gap-2" onsubmit="handleAiSubmit(event)">
<input class="flex-1 bg-slate-900 border border-slate-700 rounded-xl px-3 py-2 text-xs text-white focus:outline-none focus:border-cyan-400" id="aiInput" placeholder="Ketik pertanyaan atau minat Anda..." type="text">
<button class="bg-cyan-500 hover:bg-cyan-400 text-slate-950 font-bold px-3 py-2 rounded-xl text-xs transition" type="submit">
<i class="fa-solid fa-paper-plane"></i>
</button>
</form>
</div>
</div>
<!-- 2. Floating WhatsApp Coordinator Button (Bottom-Right) -->
<div class="fixed bottom-6 right-6 z-50">
<a class="group relative flex items-center gap-2.5 px-4 py-3 rounded-full bg-[#25D366] text-white shadow-2xl hover:bg-[#20ba59] hover:scale-105 active:scale-95 transition-all" href="https://wa.me/6281234567890?text=Halo%20Koordinator%20Relawan,%20saya%20ingin%20bertanya%20mengenai%20pendaftaran%20dan%20jadwal%20aksi%20terdekat." rel="noopener noreferrer" target="_blank">
<i class="fa-brands fa-whatsapp text-xl"></i>
<span class="text-xs font-bold tracking-wide">Tanya Koordinator</span>
<span class="absolute -top-1.5 -right-1.5 flex h-3 w-3">
<span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-300 opacity-75"></span>
<span class="relative inline-flex rounded-full h-3 w-3 bg-white"></span>
</span>
</a>
</div>
<!-- ========================================== -->
<!-- JAVASCRIPT LOGIC                           -->
<!-- ========================================== -->
<script>
    // Interactive Accordion Toggle
    function toggleAccordion(contentId, iconId) {
      const content = document.getElementById(contentId);
      const icon = document.getElementById(iconId);

      if (content.classList.contains('hidden')) {
        content.classList.remove('hidden');
        icon.classList.add('rotate-180');
      } else {
        content.classList.add('hidden');
        icon.classList.remove('rotate-180');
      }
    }

    // 3. Mobile Navigation Toggle
    function toggleMobileNav(menuId) {
      const menu = document.getElementById(menuId);
      menu.classList.toggle('hidden');
    }
    function closeMobileNav(menuId) {
      const menu = document.getElementById(menuId);
      menu.classList.add('hidden');
    }

    // 4. Interactive Floating AI Assistant
    function toggleAiModal() {
      const modal = document.getElementById('aiModal');
      modal.classList.toggle('hidden');
    }

    function sendQuickPrompt(text) {
      const input = document.getElementById('aiInput');
      input.value = text;
      handleAiSubmit(new Event('submit'));
    }

    function handleAiSubmit(e) {
      e.preventDefault();
      const input = document.getElementById('aiInput');
      const text = input.value.trim();
      if (!text) return;

      const chatBody = document.getElementById('aiChatBody');

      // User Message
      const userBubble = document.createElement('div');
      userBubble.className = "flex gap-2.5 items-start justify-end";
      userBubble.innerHTML = `
        <div class="bg-cyan-600 text-white p-3 rounded-2xl rounded-tr-none max-w-[80%]">
          <span></span>
        </div>
      `;
      userBubble.querySelector('span').textContent = text;
      chatBody.appendChild(userBubble);
      input.value = '';

      // Auto Response Bot
      setTimeout(() => {
        const botBubble = document.createElement('div');
        botBubble.className = "flex gap-2.5 items-start";
        
        let reply = "Pilihan luar biasa! Berdasarkan minat Anda, kami merekomendasikan klaster <strong>Pendidikan Pelosok</strong> atau <strong>Aksi Pesisir Mangrove</strong>. Silakan isi form di halaman atau langsung hubungi koordinator via tombol WhatsApp untuk wawancara singkat!";
        if (text.toLowerCase().includes("syarat")) {
          reply = "Syaratnya sangat mudah: Usia minimal 17 tahun, komitmen waktu, berbadan sehat, dan memiliki empati sosial. Tidak dipungut biaya apapun (100% gratis)!";
        } else if (text.toLowerCase().includes("lingkungan") || text.toLowerCase().includes("mangrove")) {
          reply = "Untuk aksi lingkungan terdekat ada Restorasi Mangrove di Muara Gembong akhir pekan ini. Kuota masih tersisa 25 orang relawan!";
        } else if (text.toLowerCase().includes("mengajar") || text.toLowerCase().includes("anak")) {
          reply = "Program Sahabat Mengajar sangat cocok! Anda dapat mengajar membaca atau mendongeng untuk anak-anak panti & pelosok desa.";
        }

        botBubble.innerHTML = `
          <div class="w-6 h-6 rounded-full bg-cyan-500/20 text-cyan-400 flex-shrink-0 flex items-center justify-center text-[10px]">
            <i class="fa-solid fa-robot"></i>
          </div>
          <div class="bg-slate-800/80 p-3 rounded-2xl rounded-tl-none border border-slate-700">
            ${reply}
          </div>
        `;
        chatBody.appendChild(botBubble);
        chatBody.scrollTop = chatBody.scrollHeight;
      }, 500);

      chatBody.scrollTop = chatBody.scrollHeight;
    }
  </script>

  
</body></html>