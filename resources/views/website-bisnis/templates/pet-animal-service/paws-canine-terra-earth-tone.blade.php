<!DOCTYPE html>

<html class="scroll-smooth" lang="id"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Canine Terra — Sanctuary Pelatihan Anjing Holistik Berbasis Alam</title>
<!-- Tailwind CSS with plugins -->
<!-- Google Fonts: Fraunces (Editorial Display) & Plus Jakarta Sans (Clean Modern UI) -->
<link href="https://fonts.googleapis.com" rel="preconnect"/>
<link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
<link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,400;0,9..144,600;0,9..144,700;0,9..144,800;1,9..144,400;1,9..144,600;1,9..144,700&amp;family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&amp;display=swap" rel="stylesheet"/>
<!-- Font Awesome 6 Pro / Free CDN -->
  @vite('resources/css/app.css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet"/>
<style>
    body {
      font-family: 'Plus Jakarta Sans', sans-serif;
      background-color: #F6F3EC;
      color: #231812;
      background-image: radial-gradient(#244C38 0.5px, transparent 0.5px);
      background-size: 24px 24px;
      background-color: #F6F3EC;
    }
    
    .font-canine-display {
      font-family: 'Fraunces', serif;
      font-optical-sizing: auto;
    }

    /* Custom subtle scrollbar */
    ::-webkit-scrollbar {
      width: 9px;
    }
    ::-webkit-scrollbar-track {
      background: #EFE8DA;
    }
    ::-webkit-scrollbar-thumb {
      background: #31634B;
      border-radius: 999px;
    }
    ::-webkit-scrollbar-thumb:hover {
      background: #C85A32;
    }

    details summary::-webkit-details-marker {
      display: none;
    }
    body.canine-template-preview > :not(aside):not(header):not(#beranda) { display: none !important; }
  </style>
</head>
<body class="antialiased selection:bg-canine-terra selection:text-canine-linen-50{{ request()->boolean('preview') ? ' canine-template-preview' : '' }}">
<!-- 1. TOPBAR PRESTISIUS & REAL-TIME STATUS -->
<aside class="relative z-50 bg-gradient-to-r from-canine-forest-dark via-[#163123] to-canine-oak-dark text-canine-linen-100 text-xs py-2.5 px-4 border-b border-canine-forest-light/30 shadow-sm">
<div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center justify-between gap-2.5">
<!-- Status Kiri -->
<div class="flex flex-wrap items-center justify-center md:justify-start gap-2.5">
<span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-canine-forest text-emerald-300 font-bold tracking-wide uppercase text-[10px] border border-emerald-400/30">
<span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-ping"></span>
          Periode Musim Semi 2025
        </span>
<span class="text-canine-linen-200/90 hidden sm:inline text-[11px] font-medium">
          Slot Terbatas: Tersisa <strong>4 Kuota</strong> di Sentul Whispering Woods Field
        </span>
</div>
<!-- Informasi Kanan -->
<div class="flex items-center gap-4 text-[11px] text-canine-linen-200/80">
<span class="flex items-center gap-1.5">
<i class="fa-regular fa-clock text-canine-amber-ochre-light"></i>
<span>Sel – Min: 07.30 - 17.00 WIB</span>
</span>
<span class="text-white/20">|</span>
<span class="flex items-center gap-1.5">
<i class="fa-solid fa-certificate text-canine-amber-ochre-light"></i>
<span class="font-semibold text-canine-linen-100">CPDT-KA &amp; Fear-Free™ Certified</span>
</span>
<span class="hidden lg:inline text-white/20">|</span>
<a class="hidden lg:inline-flex items-center gap-1 text-canine-amber-ochre-light hover:text-white transition-colors font-semibold" href="#trial">
<span>Klaim Voucher Diskon 15%</span>
<i class="fa-solid fa-arrow-right text-[9px]"></i>
</a>
</div>
</div>
</aside>
<!-- 2. NAVBAR GLASSMORPHISM MEWAH -->
<header class="sticky top-0 z-40 bg-canine-linen-100/90 backdrop-blur-xl border-b border-canine-oak-soil/15 transition-all">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
<!-- Logo & Heraldic Shield -->
<a class="flex items-center gap-3.5 group" href="#">
<div class="relative w-11 h-11 rounded-xl bg-canine-gradient-forest-soil p-[2px] shadow-canine-elevation-1 group-hover:shadow-canine-glow-terra transition-all">
<div class="w-full h-full bg-canine-forest-dark rounded-[10px] flex items-center justify-center text-canine-amber-ochre-light border border-canine-forest-light/40">
<i class="fa-solid fa-shield-dog text-xl transition-transform group-hover:scale-110"></i>
</div>
<span class="absolute -bottom-1 -right-1 w-4 h-4 bg-canine-terra rounded-full border-2 border-canine-linen-100 flex items-center justify-center text-[8px] text-white">
<i class="fa-solid fa-seedling"></i>
</span>
</div>
<div>
<div class="font-canine-display text-2xl font-bold tracking-tight text-canine-forest-dark leading-none flex items-center gap-1">
            CANINE<span class="text-canine-terra italic font-normal">TERRA</span>
</div>
<p class="text-[9.5px] uppercase tracking-[0.22em] font-extrabold text-canine-oak-soil/80 mt-1">
            Holistic Instinct &amp; Bond Academy
          </p>
</div>
</a>
<!-- Nav Items -->
<nav class="hidden md:flex items-center space-x-1 lg:space-x-2 text-sm font-semibold text-canine-oak-dark">
<a class="px-3.5 py-2 rounded-lg text-canine-forest hover:bg-canine-linen-200/60 transition-colors" href="#beranda">Beranda</a>
<a class="px-3.5 py-2 rounded-lg hover:text-canine-terra hover:bg-canine-linen-200/60 transition-colors" href="#metode">Metode 3 Pilar</a>
<a class="px-3.5 py-2 rounded-lg hover:text-canine-terra hover:bg-canine-linen-200/60 transition-colors" href="#program">Kurikulum Program</a>
<a class="px-3.5 py-2 rounded-lg hover:text-canine-terra hover:bg-canine-linen-200/60 transition-colors" href="#fasilitas">Arena &amp; Fasilitas</a>
<a class="px-3.5 py-2 rounded-lg hover:text-canine-terra hover:bg-canine-linen-200/60 transition-colors" href="#testimoni">Cerita Pawrent</a>
<a class="px-3.5 py-2 rounded-lg hover:text-canine-terra hover:bg-canine-linen-200/60 transition-colors" href="#faq">FAQ</a>
</nav>
<!-- CTA Nav -->
<div class="flex items-center gap-3">
<a class="hidden sm:inline-flex items-center gap-2 px-3 py-2 text-xs font-bold text-canine-forest hover:text-canine-terra transition-colors" href="https://wa.me/6281277889900" target="_blank">
<i class="fa-brands fa-whatsapp text-emerald-700 text-base"></i>
<span>Konsultasi</span>
</a>
<a class="relative group inline-flex items-center justify-center gap-2.5 px-5 py-2.5 rounded-xl bg-canine-gradient-terra-amber text-white font-bold text-xs uppercase tracking-wider shadow-canine-elevation-1 hover:shadow-canine-glow-terra transition-all active:scale-[0.98] border border-white/20" href="#trial">
<span>Reservasi Sesi</span>
<i class="fa-solid fa-arrow-right-long transition-transform group-hover:translate-x-1"></i>
</a>
</div>
</div>
</header>
<!-- 3. HERO SECTION ASYMMETRIC DENGAN LAYERED VISUAL MEWAH -->
<section class="relative pt-10 pb-20 lg:pt-16 lg:pb-28 overflow-hidden" id="beranda">
<!-- Ambient Earth Accents -->
<div class="absolute -top-32 -left-32 w-96 h-96 bg-canine-forest/10 rounded-full blur-3xl pointer-events-none"></div>
<div class="absolute top-1/2 -right-32 w-96 h-96 bg-canine-terra/15 rounded-full blur-3xl pointer-events-none"></div>
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
<div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center">
<!-- Left Hero Column -->
<div class="lg:col-span-7 space-y-6 text-left">
<!-- Category Pill -->
<div class="inline-flex items-center gap-2.5 px-3.5 py-1.5 rounded-full bg-canine-forest-soft border border-canine-forest/15 text-canine-forest-dark text-xs font-bold tracking-wide">
<span class="w-2 h-2 rounded-full bg-canine-terra"></span>
<span class="uppercase tracking-widest text-[10px]">Positive Reinforcement &amp; Nature Therapy</span>
</div>
<!-- Editorial Serif Headline -->
<h1 class="font-canine-display text-4xl sm:text-5xl lg:text-6xl text-canine-forest-dark font-extrabold leading-[1.08] tracking-tight">
            Menghidupkan Harmoni <br class="hidden sm:inline"/>
<span class="text-canine-terra italic font-normal underline decoration-canine-amber-ochre/50 decoration-wavy underline-offset-8">Naluri Alam</span> 
            dan Cinta Kasih Anabul.
          </h1>
<p class="text-base sm:text-lg text-canine-oak-soil/90 font-normal leading-relaxed max-w-2xl">
            Bukan kepatuhan robotik atau hukuman intimidatif. Canine Terra memandu anjing Anda kembali ke habitat pertumbuhan alaminya: padang rumput segar, stimulasi sensorik olfaktori, serta komunikasi batin mendalam bersama pemilik.
          </p>
<!-- CTAs & Trust Mini Pill -->
<div class="pt-2 flex flex-col sm:flex-row items-stretch sm:items-center gap-4">
<a class="px-8 py-4 rounded-xl bg-canine-forest-dark hover:bg-canine-forest text-canine-linen-100 font-bold text-sm tracking-wider uppercase shadow-canine-elevation-2 hover:shadow-canine-elevation-3 transition-all flex items-center justify-center gap-3 border border-canine-forest-light/40 group" href="#trial">
<i class="fa-solid fa-tree text-canine-amber-ochre-light"></i>
<span>Booking Sesi Trial 60 Menit</span>
<i class="fa-solid fa-chevron-right text-xs opacity-70 group-hover:translate-x-1 transition-transform"></i>
</a>
<a class="px-7 py-4 rounded-xl bg-canine-linen-200/70 hover:bg-canine-linen-200 text-canine-forest-dark font-bold text-sm tracking-wide uppercase transition-all flex items-center justify-center gap-2.5 border border-canine-oak-soil/20" href="#program">
<i class="fa-solid fa-scroll text-canine-terra"></i>
<span>Jelajahi 4 Kurikulum</span>
</a>
</div>
<!-- Social Proof + Ratings Layer -->
<div class="pt-6 border-t border-canine-oak-soil/15 grid grid-cols-1 sm:grid-cols-2 gap-6 items-center">
<!-- Avatars Pawrents -->
<div class="flex items-center gap-3.5">
<div class="flex -space-x-3 overflow-hidden">
<img alt="Pawrent" class="inline-block h-10 w-10 rounded-full ring-2 ring-canine-linen-100 object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuC7ANRHodXv7_bwxooQd1AQYgfO8dvUfwIVmRygi0BY_jjn4njJbLVWzyHUPom8FZ7i4_7yGvV-zYl6aZZT4TB-mXY5IgwFUDDhtjYuwEMwJNoiGV1PBqNFTX42yV0XcXWX1i8AoJ4c7U4GtB1zehtZi_Zy-c-6XNYS2_1HMfk-803S9prDvWVnTInIr9P1Qtj_kal7gOUmPspMIehdvd8VOerkw0xRysg8gAn9tp0O12c5F5CkBJ5E"/>
<img alt="Pawrent" class="inline-block h-10 w-10 rounded-full ring-2 ring-canine-linen-100 object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCcEgEZFekJFhp8NYLZfuEpLkzPbIAzwElnyDiYZ8N4OGnJNGQy9D6xqr4iw-srX_nK4IqyKS9I8dX18xz7ZrhG1RWaTBdgO8HRmv4U87iLQ2ABlwv8AL24mCQzACwefJ2xEcr4UqRrvkZYW7C9Ux7SMlwb38JJ3_7xJiOXk04yw1cJHAA29EZsNM4OzeU6gt51SEbU45t83re33yCn7iEpZF7B9lIyL973AKMICVkRbE5UpnvB2Ujr"/>
<img alt="Pawrent" class="inline-block h-10 w-10 rounded-full ring-2 ring-canine-linen-100 object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCaHVwsd7jL411qGt1zNNnU17bLpZQOVRZ-5vK8qSqOkxIfIDsrhNS45aOPMOwm7Pb4qoEmh7hPUyjYl3n2JIYDUjKHrrxp8q0bmpOnWufzlr4wjvdXjZgd_NmE079h0uaRHZRp2dSFSg7e5hZLRXvQoPYwXlq2o090Dbb7PNatUVjeNVaG4HGMpUHdnswMIKDCK7jQcE_tdHf5TXbNGhvPEXisTXvZp0vb9JUDjOZIcIPUQYH8wKUt"/>
<div class="inline-flex h-10 w-10 rounded-full ring-2 ring-canine-linen-100 bg-canine-oak-soil text-canine-linen-100 text-xs font-bold items-center justify-center">
                  +1.8k
                </div>
</div>
<div>
<div class="flex text-canine-amber-ochre text-xs gap-1">
<i class="fa-solid fa-star"></i>
<i class="fa-solid fa-star"></i>
<i class="fa-solid fa-star"></i>
<i class="fa-solid fa-star"></i>
<i class="fa-solid fa-star"></i>
</div>
<p class="text-xs font-bold text-canine-forest-dark">4.98 / 5.0 Rating Kepuasan</p>
<p class="text-[10px] text-canine-oak-soil/70">Dari 1.840+ Pawrents Jabodetabek</p>
</div>
</div>
<!-- Certified Badge -->
<div class="flex items-center gap-3 bg-white/70 backdrop-blur-sm p-2.5 rounded-xl border border-canine-forest/10">
<div class="w-10 h-10 rounded-lg bg-canine-forest text-canine-amber-ochre-light flex items-center justify-center text-lg">
<i class="fa-solid fa-award"></i>
</div>
<div class="text-xs">
<span class="font-bold text-canine-forest-dark block">Standar CPDT-KA Terdaftar</span>
<span class="text-[10px] text-canine-oak-soil/75">Metodologi Uji Ilmiah Non-Aversif</span>
</div>
</div>
</div>
</div>
<!-- Right Hero Column: Layered Outdoor Card -->
<div class="lg:col-span-5 relative">
<div class="relative mx-auto max-w-md lg:max-w-none">
<!-- Textured Backing frame -->
<div class="absolute -inset-3 bg-canine-gradient-forest-soil rounded-3xl -rotate-2 opacity-90 shadow-canine-elevation-3"></div>
<!-- Main Photo Container -->
<div class="relative bg-canine-linen-100 p-3 rounded-2xl border-2 border-canine-forest-dark shadow-2xl overflow-hidden">
<div class="relative overflow-hidden rounded-xl">
<img alt="Trainer and Golden Retriever at Canine Terra" class="w-full h-[470px] object-cover scale-100 hover:scale-105 transition-transform duration-700" src="https://lh3.googleusercontent.com/aida/AEtjO1Vh4s0l7fqrO0zYQqg2LnEH4gNVAgVzeARBvvy2H8jG5xdCdWGOgaBHTW8oEIUq7AL-M9KDY_K6wWBrsmzJnlI_azlGlCFMGafA9pktcGESkfCsV8OoscrNay6vlL5gsbZ_e1o7XXdkqr7Utsz2d_3geUFb1tlE7qA57JegH8kNpPcx39z-zJNmOfVpgVg9pxyrNKK4rhFD4xEJ6CjYS2S-b_19Gjw5jXH6ON-PQnJ2ShOYGV3EeKSZWRo"/>
<!-- Overlay Gradient -->
<div class="absolute inset-0 bg-gradient-to-t from-canine-forest-dark/80 via-transparent to-transparent pointer-events-none"></div>
<!-- Floating Badge 1: Top Right Live Status -->
<div class="absolute top-4 right-4 bg-canine-forest-dark/90 backdrop-blur-md text-canine-linen-100 px-3.5 py-1.5 rounded-full border border-canine-linen-200/20 text-xs font-semibold flex items-center gap-2 shadow-lg">
<span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
<span>Sentul Valley Field 01</span>
</div>
<!-- Floating Glass Card: Bottom Left Detail -->
<div class="absolute bottom-4 left-4 right-4 bg-canine-linen-100/95 backdrop-blur-md p-4 rounded-xl border border-canine-forest/20 shadow-canine-elevation-2 flex items-center justify-between">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-lg bg-canine-terra text-white flex items-center justify-center text-lg font-bold">
<i class="fa-solid fa-seedling"></i>
</div>
<div>
<h4 class="text-xs font-bold text-canine-forest-dark uppercase tracking-wider">Bio-Safe Turf &amp; Agility</h4>
<p class="text-[11px] text-canine-oak-soil/80">3.200m² Rumput Bebas Pestisida Kimia</p>
</div>
</div>
<span class="text-canine-forest font-canine-display font-bold text-lg">100%</span>
</div>
</div>
</div>
<!-- Floating Sticker Pill: CPDT-KA -->
<div class="absolute -bottom-5 -left-4 bg-gradient-to-r from-canine-amber-ochre to-canine-terra text-white px-4 py-2 rounded-xl shadow-canine-elevation-2 border-2 border-canine-linen-100 flex items-center gap-2.5">
<i class="fa-solid fa-heart-pulse text-sm"></i>
<div class="text-[11px] font-bold tracking-tight">
                Stress-Free Conditioning
              </div>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- 4. SECTION FILOSOFI 3 PILAR HOLISTIK (Rich Earth Multi-Layer Cards) -->
<section class="py-20 bg-canine-linen-200/60 border-y border-canine-oak-soil/10 relative" id="metode">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<!-- Section Header -->
<div class="text-center max-w-3xl mx-auto mb-14">
<div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-canine-forest text-canine-linen-100 text-[10px] font-bold uppercase tracking-widest mb-3">
<i class="fa-solid fa-leaf text-canine-amber-ochre-light"></i>
          Etika Pelatihan Modern
        </div>
<h2 class="font-canine-display text-3xl sm:text-4xl lg:text-5xl font-bold text-canine-forest-dark tracking-tight">
          Tiga Pilar Holistik Canine Terra
        </h2>
<p class="text-canine-oak-soil/85 text-sm sm:text-base mt-3 leading-relaxed">
          Mengintegrasikan pemenuhan insting hewani (instinctual needs), ketenangan psikologis saraf, serta kepemimpinan bersahabat pemilik di rumah.
        </p>
</div>
<!-- 3 Cards -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
<!-- Pilar 1 -->
<div class="relative group bg-white rounded-2xl p-8 border-2 border-canine-forest/15 shadow-canine-elevation-1 hover:shadow-canine-elevation-2 hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between">
<div class="absolute top-0 right-0 w-24 h-24 bg-canine-forest-soft rounded-bl-full -z-0"></div>
<div class="relative z-10">
<!-- Icon 3D Box -->
<div class="w-14 h-14 rounded-xl bg-canine-forest text-canine-amber-ochre-light flex items-center justify-center text-2xl mb-6 shadow-canine-elevation-1 border border-canine-forest-light/40 group-hover:bg-canine-forest-dark transition-colors">
<i class="fa-solid fa-bone"></i>
</div>
<span class="text-[11px] font-extrabold text-canine-forest uppercase tracking-wider block mb-1">Pilar I — Nutrisi &amp; Pujian</span>
<h3 class="font-canine-display text-2xl font-bold text-canine-forest-dark mb-3">Treat &amp; Natural Praise</h3>
<p class="text-sm text-canine-oak-soil/80 leading-relaxed mb-6">
              Mengunci perilaku positif melalui camilan organik buatan tangan (dehydrated lamb &amp; sweet potato) serta apresiasi intonasi vokal yang konsisten.
            </p>
</div>
<div class="relative z-10 pt-4 border-t border-canine-linen-200">
<ul class="text-xs space-y-2 font-semibold text-canine-forest-dark">
<li class="flex items-center gap-2 text-canine-terra">
<i class="fa-solid fa-circle-check"></i> Bebas Rantai Pencekik &amp; Kejut
              </li>
<li class="flex items-center gap-2 text-canine-forest">
<i class="fa-solid fa-circle-check"></i> Motivasi intrinsik tinggi tanpa takut
              </li>
</ul>
</div>
</div>
<!-- Pilar 2 -->
<div class="relative group bg-white rounded-2xl p-8 border-2 border-canine-terra/30 shadow-canine-elevation-1 hover:shadow-canine-elevation-2 hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between">
<div class="absolute top-0 right-0 w-24 h-24 bg-canine-terra-soft rounded-bl-full -z-0"></div>
<div class="relative z-10">
<!-- Icon 3D Box -->
<div class="w-14 h-14 rounded-xl bg-canine-terra text-white flex items-center justify-center text-2xl mb-6 shadow-canine-elevation-1 border border-canine-terra-dark/30 group-hover:bg-canine-terra-dark transition-colors">
<i class="fa-solid fa-wind"></i>
</div>
<span class="text-[11px] font-extrabold text-canine-terra uppercase tracking-wider block mb-1">Pilar II — Stimulasi Sensorik</span>
<h3 class="font-canine-display text-2xl font-bold text-canine-forest-dark mb-3">Scent Work &amp; Olfactory</h3>
<p class="text-sm text-canine-oak-soil/80 leading-relaxed mb-6">
              Anjing 'melihat' dunia dengan hidungnya. Jalur tracking aroma alam kami mengaktifkan endorfin yang secara instan meredakan kecemasan dan kebosanan apartemen.
            </p>
</div>
<div class="relative z-10 pt-4 border-t border-canine-linen-200">
<ul class="text-xs space-y-2 font-semibold text-canine-forest-dark">
<li class="flex items-center gap-2 text-canine-terra">
<i class="fa-solid fa-circle-check"></i> 20 Menit Scenting = 1 Jam Lari
              </li>
<li class="flex items-center gap-2 text-canine-forest">
<i class="fa-solid fa-circle-check"></i> Stabilkan saraf sensorik anabul
              </li>
</ul>
</div>
</div>
<!-- Pilar 3 -->
<div class="relative group bg-white rounded-2xl p-8 border-2 border-canine-amber-ochre/40 shadow-canine-elevation-1 hover:shadow-canine-elevation-2 hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between">
<div class="absolute top-0 right-0 w-24 h-24 bg-canine-amber-ochre-soft rounded-bl-full -z-0"></div>
<div class="relative z-10">
<!-- Icon 3D Box -->
<div class="w-14 h-14 rounded-xl bg-gradient-to-br from-canine-amber-ochre to-canine-oak-soil text-white flex items-center justify-center text-2xl mb-6 shadow-canine-elevation-1 border border-canine-amber-ochre-deep/30 group-hover:bg-canine-oak-soil transition-colors">
<i class="fa-solid fa-hand-holding-heart"></i>
</div>
<span class="text-[11px] font-extrabold text-canine-amber-ochre-deep uppercase tracking-wider block mb-1">Pilar III — Sinergi Pawrent</span>
<h3 class="font-canine-display text-2xl font-bold text-canine-forest-dark mb-3">Edukasi Pawrent Terpadu</h3>
<p class="text-sm text-canine-oak-soil/80 leading-relaxed mb-6">
              Bukan melatih trik sirkus, melainkan mentransfer cara membaca micro-expression anjing agar pawrent menjadi pilar keamanan yang dihormati tanpa emosi kemarahan.
            </p>
</div>
<div class="relative z-10 pt-4 border-t border-canine-linen-200">
<ul class="text-xs space-y-2 font-semibold text-canine-forest-dark">
<li class="flex items-center gap-2 text-canine-terra">
<i class="fa-solid fa-circle-check"></i> Pendampingan WhatsApp Seumur Hidup
              </li>
<li class="flex items-center gap-2 text-canine-forest">
<i class="fa-solid fa-circle-check"></i> Solusi adaptif interior rumah Anda
              </li>
</ul>
</div>
</div>
</div>
</div>
</section>
<!-- 5. SECTION PROGRAM PELATIHAN UNGGULAN (4 Kurikulum Lengkap) -->
<section class="py-24 bg-canine-linen-100" id="program">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<!-- Heading & Filter Mini Info -->
<div class="flex flex-col lg:flex-row lg:items-end justify-between mb-14 gap-6">
<div>
<div class="inline-flex items-center gap-2 px-3 py-1 rounded-md bg-canine-terra-soft text-canine-terra text-xs font-bold uppercase tracking-wider mb-2">
<i class="fa-solid fa-graduation-cap"></i> Terstruktur &amp; Teruji
          </div>
<h2 class="font-canine-display text-3xl sm:text-4xl lg:text-5xl font-bold text-canine-forest-dark">
            Kurikulum Berbasis Usia &amp; Karakter
          </h2>
<p class="text-canine-oak-soil/85 text-sm sm:text-base mt-2 max-w-2xl">
            Dari anak anjing baru hingga anjing dewasa yang membutuhkan rehabilitasi emosional. Rasio ketat maksimal 5 anjing per pelatih.
          </p>
</div>
<div class="flex items-center gap-2 bg-white px-4 py-2.5 rounded-xl border border-canine-oak-soil/20 text-xs font-bold text-canine-forest-dark shadow-sm">
<i class="fa-solid fa-shield-virus text-canine-terra"></i>
<span>Protokol Higienis Tanah &amp; Wajib Cek Vaksin</span>
</div>
</div>
<!-- 4 Program Grid Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
<!-- Program 1: Puppy Camp -->
<div class="bg-white rounded-2xl p-6 border-2 border-canine-forest/20 flex flex-col justify-between shadow-canine-elevation-1 hover:shadow-canine-elevation-2 transition-all group">
<div>
<div class="flex items-center justify-between mb-4">
<span class="px-2.5 py-1 rounded-md bg-canine-forest-soft text-canine-forest-dark font-extrabold text-[11px] uppercase tracking-wider">
                Usia 2 - 5 Bulan
              </span>
<div class="w-8 h-8 rounded-lg bg-canine-linen-200 flex items-center justify-center text-canine-forest text-sm font-bold">
<i class="fa-solid fa-paw"></i>
</div>
</div>
<h3 class="font-canine-display text-2xl font-bold text-canine-forest-dark mb-2">Puppy Social Camp</h3>
<p class="text-xs text-canine-oak-soil/80 leading-relaxed mb-5">
              Fondasi emas pencegahan trauma seumur hidup, toilet training akurat, dan toleransi terhadap sentuhan dokter hewan.
            </p>
<div class="space-y-2.5 text-xs text-canine-oak-dark mb-6">
<div class="flex items-start gap-2">
<i class="fa-solid fa-check text-canine-terra mt-0.5"></i>
<span>Toilet Habit &amp; Crate Love (Kandang Nyaman)</span>
</div>
<div class="flex items-start gap-2">
<i class="fa-solid fa-check text-canine-terra mt-0.5"></i>
<span>Bite Inhibition (Hentikan Gigit Tangan/Kaki)</span>
</div>
<div class="flex items-start gap-2">
<i class="fa-solid fa-check text-canine-terra mt-0.5"></i>
<span>Desensitisasi Petir, Klakson &amp; Vacuum</span>
</div>
</div>
</div>
<div class="pt-4 border-t border-canine-linen-200">
<div class="text-[11px] text-canine-oak-soil/70 font-semibold mb-1">Durasi: 4 Pekan (1x seminggu)</div>
<div class="flex items-center justify-between">
<div>
<span class="text-xs text-canine-oak-soil/70 line-through">Rp 1.800.000</span>
<div class="text-xl font-canine-display font-bold text-canine-forest-dark">Rp 1.500.000</div>
</div>
<a class="w-10 h-10 rounded-xl bg-canine-forest-dark text-canine-linen-100 flex items-center justify-center hover:bg-canine-terra transition-colors shadow-sm" href="#trial">
<i class="fa-solid fa-arrow-right text-xs"></i>
</a>
</div>
</div>
</div>
<!-- Program 2: Basic Obedience (Highlighted) -->
<div class="bg-canine-gradient-card-glow rounded-2xl p-6 border-2 border-canine-terra relative flex flex-col justify-between shadow-canine-elevation-2 hover:shadow-canine-glow-terra transition-all group">
<!-- Populer Badge -->
<div class="absolute -top-3.5 left-1/2 -translate-x-1/2 bg-canine-gradient-terra-amber text-white text-[10px] font-extrabold uppercase tracking-widest px-4 py-1 rounded-full shadow-md">
            Paling Diminati Pawrents
          </div>
<div>
<div class="flex items-center justify-between mb-4 mt-1">
<span class="px-2.5 py-1 rounded-md bg-canine-terra-soft text-canine-terra font-extrabold text-[11px] uppercase tracking-wider">
                Semua Ras &amp; Usia
              </span>
<div class="w-8 h-8 rounded-lg bg-canine-terra text-white flex items-center justify-center text-sm font-bold">
<i class="fa-solid fa-compass"></i>
</div>
</div>
<h3 class="font-canine-display text-2xl font-bold text-canine-forest-dark mb-2">Terra Basic Obedience</h3>
<p class="text-xs text-canine-oak-soil/80 leading-relaxed mb-5">
              Komunikasi harian tanpa teriakan. Menguasai etika jalan santai bertali longgar (loose leash) di cafe maupun keramaian.
            </p>
<div class="space-y-2.5 text-xs text-canine-oak-dark mb-6">
<div class="flex items-start gap-2">
<i class="fa-solid fa-check text-canine-terra mt-0.5"></i>
<span>Reliable Recall (Datang Saat Dipanggil Seketika)</span>
</div>
<div class="flex items-start gap-2">
<i class="fa-solid fa-check text-canine-terra mt-0.5"></i>
<span>Loose-Leash Heel (Tidak Menarik Tali Leher)</span>
</div>
<div class="flex items-start gap-2">
<i class="fa-solid fa-check text-canine-terra mt-0.5"></i>
<span>Impulse Control di Depan Makanan Manusia</span>
</div>
</div>
</div>
<div class="pt-4 border-t border-canine-terra/20">
<div class="text-[11px] text-canine-terra-dark font-semibold mb-1">Durasi: 6 Pekan Komprehensif</div>
<div class="flex items-center justify-between">
<div>
<span class="text-xs text-canine-oak-soil/70 line-through">Rp 2.400.000</span>
<div class="text-xl font-canine-display font-bold text-canine-terra">Rp 2.100.000</div>
</div>
<a class="w-10 h-10 rounded-xl bg-canine-terra text-white flex items-center justify-center hover:bg-canine-forest transition-colors shadow-sm" href="#trial">
<i class="fa-solid fa-arrow-right text-xs"></i>
</a>
</div>
</div>
</div>
<!-- Program 3: Behavior Modification -->
<div class="bg-white rounded-2xl p-6 border-2 border-canine-forest/20 flex flex-col justify-between shadow-canine-elevation-1 hover:shadow-canine-elevation-2 transition-all group">
<div>
<div class="flex items-center justify-between mb-4">
<span class="px-2.5 py-1 rounded-md bg-canine-amber-ochre-soft text-canine-amber-ochre-deep font-extrabold text-[11px] uppercase tracking-wider">
                Privat 1-on-1 Sesi
              </span>
<div class="w-8 h-8 rounded-lg bg-canine-linen-200 flex items-center justify-center text-canine-amber-ochre text-sm font-bold">
<i class="fa-solid fa-heart-pulse"></i>
</div>
</div>
<h3 class="font-canine-display text-2xl font-bold text-canine-forest-dark mb-2">Behavior Correction</h3>
<p class="text-xs text-canine-oak-soil/80 leading-relaxed mb-5">
              Program desensitisasi khusus bagi anjing reaktif, gonggongan agresif terhadap anjing lain, trauma, atau separation anxiety.
            </p>
<div class="space-y-2.5 text-xs text-canine-oak-dark mb-6">
<div class="flex items-start gap-2">
<i class="fa-solid fa-check text-canine-terra mt-0.5"></i>
<span>Counter-Conditioning Trigger Agresi</span>
</div>
<div class="flex items-start gap-2">
<i class="fa-solid fa-check text-canine-terra mt-0.5"></i>
<span>Atasi Kegelisahan Saat Ditinggal Sendiri</span>
</div>
<div class="flex items-start gap-2">
<i class="fa-solid fa-check text-canine-terra mt-0.5"></i>
<span>Asesmen Lingkungan &amp; Tata Ruang Rumah</span>
</div>
</div>
</div>
<div class="pt-4 border-t border-canine-linen-200">
<div class="text-[11px] text-canine-oak-soil/70 font-semibold mb-1">Durasi: 5 Pertemuan Intensif</div>
<div class="flex items-center justify-between">
<div>
<span class="text-xs text-canine-oak-soil/70 line-through">Rp 2.900.000</span>
<div class="text-xl font-canine-display font-bold text-canine-forest-dark">Rp 2.500.000</div>
</div>
<a class="w-10 h-10 rounded-xl bg-canine-forest-dark text-canine-linen-100 flex items-center justify-center hover:bg-canine-terra transition-colors shadow-sm" href="#trial">
<i class="fa-solid fa-arrow-right text-xs"></i>
</a>
</div>
</div>
</div>
<!-- Program 4: Natural Agility & Trail -->
<div class="bg-white rounded-2xl p-6 border-2 border-canine-forest/20 flex flex-col justify-between shadow-canine-elevation-1 hover:shadow-canine-elevation-2 transition-all group">
<div>
<div class="flex items-center justify-between mb-4">
<span class="px-2.5 py-1 rounded-md bg-canine-forest-soft text-canine-forest-dark font-extrabold text-[11px] uppercase tracking-wider">
                Olahraga &amp; Stamina
              </span>
<div class="w-8 h-8 rounded-lg bg-canine-linen-200 flex items-center justify-center text-canine-forest text-sm font-bold">
<i class="fa-solid fa-mountain-sun"></i>
</div>
</div>
<h3 class="font-canine-display text-2xl font-bold text-canine-forest-dark mb-2">Natural Agility Trail</h3>
<p class="text-xs text-canine-oak-soil/80 leading-relaxed mb-5">
              Rintangan kayu alami, tanjakan kontur bukit Sentul, dan lorong terowongan rumput untuk menyalurkan energi anjing berenergi tinggi.
            </p>
<div class="space-y-2.5 text-xs text-canine-oak-dark mb-6">
<div class="flex items-start gap-2">
<i class="fa-solid fa-check text-canine-terra mt-0.5"></i>
<span>Rintangan Kayu Cedar Ramah Sendi Anabul</span>
</div>
<div class="flex items-start gap-2">
<i class="fa-solid fa-check text-canine-terra mt-0.5"></i>
<span>Koordinasi Gerak Cepat &amp; Fokus Mental</span>
</div>
<div class="flex items-start gap-2">
<i class="fa-solid fa-check text-canine-terra mt-0.5"></i>
<span>Tingkatkan Keberanian Melewati Hambatan</span>
</div>
</div>
</div>
<div class="pt-4 border-t border-canine-linen-200">
<div class="text-[11px] text-canine-oak-soil/70 font-semibold mb-1">Durasi: 4 Sesi Akhir Pekan</div>
<div class="flex items-center justify-between">
<div>
<span class="text-xs text-canine-oak-soil/70 line-through">Rp 2.000.000</span>
<div class="text-xl font-canine-display font-bold text-canine-forest-dark">Rp 1.700.000</div>
</div>
<a class="w-10 h-10 rounded-xl bg-canine-forest-dark text-canine-linen-100 flex items-center justify-center hover:bg-canine-terra transition-colors shadow-sm" href="#trial">
<i class="fa-solid fa-arrow-right text-xs"></i>
</a>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- 6. SECTION FASILITAS & ARENA ALAM TERBUKA (3 Interactive Zones) -->
<section class="py-20 bg-canine-linen-200/60 border-t border-canine-oak-soil/10" id="fasilitas">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="text-center max-w-3xl mx-auto mb-14">
<div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-canine-forest text-canine-linen-100 text-[10px] font-bold uppercase tracking-widest mb-3">
<i class="fa-solid fa-compass text-canine-amber-ochre-light"></i>
          Fasilitas Berstandar Alam Terbuka
        </div>
<h2 class="font-canine-display text-3xl sm:text-4xl lg:text-5xl font-bold text-canine-forest-dark tracking-tight">
          Arena Pelatihan Ramah Biologis Anabul
        </h2>
<p class="text-canine-oak-soil/80 text-sm sm:text-base mt-2">
          Didesain dengan material ramah sendi, rumput organik berdrainase cepat, dan dikelilingi pepohonan rindang penghasil oksigen murni.
        </p>
</div>
<!-- 3 Facility Cards Grid -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
<!-- Zona 1: Whispering Woods -->
<div class="bg-white rounded-2xl overflow-hidden border-2 border-canine-forest/20 shadow-canine-elevation-1 group hover:shadow-canine-elevation-2 transition-all">
<div class="relative h-56 overflow-hidden">
<img alt="Whispering Woods Sentul" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="https://lh3.googleusercontent.com/aida/AEtjO1Vh4s0l7fqrO0zYQqg2LnEH4gNVAgVzeARBvvy2H8jG5xdCdWGOgaBHTW8oEIUq7AL-M9KDY_K6wWBrsmzJnlI_azlGlCFMGafA9pktcGESkfCsV8OoscrNay6vlL5gsbZ_e1o7XXdkqr7Utsz2d_3geUFb1tlE7qA57JegH8kNpPcx39z-zJNmOfVpgVg9pxyrNKK4rhFD4xEJ6CjYS2S-b_19Gjw5jXH6ON-PQnJ2ShOYGV3EeKSZWRo"/>
<div class="absolute inset-0 bg-gradient-to-t from-canine-forest-dark/80 via-transparent to-transparent"></div>
<span class="absolute top-3 left-3 bg-canine-forest text-canine-linen-100 text-[10px] font-extrabold uppercase px-3 py-1 rounded-full">
              Sentul Field
            </span>
</div>
<div class="p-6">
<h4 class="font-canine-display text-xl font-bold text-canine-forest-dark mb-2">4.000m² Whispering Woods Trail</h4>
<p class="text-xs text-canine-oak-soil/80 leading-relaxed mb-4">
              Jalur tanah lembut alami berpohon pinus untuk melatih daya tahan, penciuman daun basah, dan ketahanan fokus di tengah distraksi serangga rimba.
            </p>
<div class="flex items-center gap-3 text-xs font-semibold text-canine-forest">
<i class="fa-solid fa-shield text-canine-terra"></i> Pagar Dobel Setinggi 2,2 Meter
            </div>
</div>
</div>
<!-- Zona 2: Studio & Paw Bonding -->
<div class="bg-white rounded-2xl overflow-hidden border-2 border-canine-terra/30 shadow-canine-elevation-1 group hover:shadow-canine-elevation-2 transition-all">
<div class="relative h-56 overflow-hidden">
<img alt="Studio Higienis BSD City" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="https://lh3.googleusercontent.com/aida/AEtjO1XUyh39Rth58Wv1PKjMYRKEOzYf_-moYIOJ1ScceYSSxPDq8evPZt5vE4mP6kkBE_malClmIqQeDLmmDQkswh2VW-Wqs_pGIAmOEJQ5VgxUYAtS0h0ZsqTQGNVBcDz3Hl2E5xw0mQvuRzR1cKW4J0ueEfXFqR4Up1IfOImXDTwa9pDGxOCeGdCkPeneM_xPRwjQQSv1UgDZDDutUkzt2XXb_yWrM0gdnJDkoYngCTlT3JsIh0OUR6zpdg"/>
<div class="absolute inset-0 bg-gradient-to-t from-canine-forest-dark/80 via-transparent to-transparent"></div>
<span class="absolute top-3 left-3 bg-canine-terra text-white text-[10px] font-extrabold uppercase px-3 py-1 rounded-full">
              BSD City Studio
            </span>
</div>
<div class="p-6">
<h4 class="font-canine-display text-xl font-bold text-canine-forest-dark mb-2">Climate-Controlled Sensory Room</h4>
<p class="text-xs text-canine-oak-soil/80 leading-relaxed mb-4">
              Ruang berpendingin udara khusus dengan lantai karet berperedam sendi. Sempurna untuk anak anjing pemula, paw-handshake conditioning, dan evaluasi temperamen.
            </p>
<div class="flex items-center gap-3 text-xs font-semibold text-canine-terra">
<i class="fa-solid fa-temperature-arrow-down text-canine-forest"></i> Sterilisasi UV-C Setiap Pergantian Sesi
            </div>
</div>
</div>
<!-- Zona 3: Cedar Rain-Proof Pavilion -->
<div class="bg-white rounded-2xl overflow-hidden border-2 border-canine-forest/20 shadow-canine-elevation-1 group hover:shadow-canine-elevation-2 transition-all">
<div class="relative h-56 overflow-hidden bg-canine-forest-dark flex items-center justify-center">
<img alt="Natural Agility Yard" class="w-full h-full object-cover opacity-90 group-hover:scale-105 transition-transform duration-500" src="https://lh3.googleusercontent.com/aida-public/AB6AXuChgdL7wE8a9eov0vth-cgGCc9oZa-lzNDnBCP8z1g7ifBM-ls5cwkf1Q2GMddxjjxVtJRuAXKk_3xoP_yqbqZzFw0uOukAE71unEwhuwr3-oystW379T_0POjEpEBUYLsKFts9Pyih9GPjc2JHn8RY_XyzahhijkpNeLV3-f0C21l3IwA5JJUzc_0If8lPoWJkBwjMdgMK7guw4UsEec2KerjcXXMLq9nzOgztMy9C2vUtisNQxb0i"/>
<div class="absolute inset-0 bg-gradient-to-t from-canine-forest-dark/80 via-transparent to-transparent"></div>
<span class="absolute top-3 left-3 bg-canine-amber-ochre text-canine-forest-dark text-[10px] font-extrabold uppercase px-3 py-1 rounded-full">
              All-Weather Shelter
            </span>
</div>
<div class="p-6">
<h4 class="font-canine-display text-xl font-bold text-canine-forest-dark mb-2">Rain-Proof Cedar Pavillion</h4>
<p class="text-xs text-canine-oak-soil/80 leading-relaxed mb-4">
              Pelatihan tidak terhenti oleh hujan deras tropis. Gazebo kayu cedar semi-terbuka berangin sejuk dengan rintangan indoor berstandar FCI internasional.
            </p>
<div class="flex items-center gap-3 text-xs font-semibold text-canine-forest">
<i class="fa-solid fa-cloud-sun text-canine-amber-ochre"></i> Latihan Konsisten di Segala Cuaca
            </div>
</div>
</div>
</div>
</div>
</section>
<!-- 7. SECTION TESTIMONI PAWRENTS & TRANSFORMASI ANABUL -->
<section class="py-20 bg-canine-linen-100" id="testimoni">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="text-center max-w-2xl mx-auto mb-14">
<div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-canine-forest-soft text-canine-forest-dark text-xs font-bold uppercase tracking-wider mb-2">
<i class="fa-solid fa-heart text-canine-terra"></i> Kisah Nyata Pawrents
        </div>
<h2 class="font-canine-display text-3xl sm:text-4xl font-bold text-canine-forest-dark">
          Transformasi Nyata dari Rumah &amp; Alam
        </h2>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
<!-- Review 1 -->
<div class="bg-white rounded-2xl p-6 border-2 border-canine-forest/15 shadow-canine-elevation-1 flex flex-col justify-between">
<div>
<div class="flex items-center gap-1 text-canine-amber-ochre text-sm mb-4">
<i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
</div>
<p class="text-xs sm:text-sm text-canine-oak-soil/90 italic leading-relaxed mb-6 font-medium">
              "Dulu Bruno (Golden Retriever) selalu menarik tali leher sampai tangan saya lecet setiap kali diajak jalan sore. Di Canine Terra, pelatih mengajarkan cara membaca bahasa tubuhnya di rumput terbuka. Dalam 3 minggu, Bruno jalan dengan tenang di samping saya!"
            </p>
</div>
<div class="flex items-center gap-3 pt-4 border-t border-canine-linen-200">
<div class="w-10 h-10 rounded-full bg-canine-forest text-canine-linen-100 flex items-center justify-center font-bold text-xs">
              AN
            </div>
<div>
<div class="text-xs font-bold text-canine-forest-dark">Anindya &amp; Bruno</div>
<div class="text-[10px] text-canine-oak-soil/70">Alumni Terra Basic Obedience — BSD</div>
</div>
</div>
</div>
<!-- Review 2 -->
<div class="bg-white rounded-2xl p-6 border-2 border-canine-terra/30 shadow-canine-elevation-1 flex flex-col justify-between">
<div>
<div class="flex items-center gap-1 text-canine-amber-ochre text-sm mb-4">
<i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
</div>
<p class="text-xs sm:text-sm text-canine-oak-soil/90 italic leading-relaxed mb-6 font-medium">
              "Kuki (Frenchie) sangat penakut dan selalu menggonggong histeris saat ada orang bertamu. Metode positive reinforcement dan olfaktori scent work di Sentul membuat dia jauh lebih tenang dan percaya diri tanpa paksaan."
            </p>
</div>
<div class="flex items-center gap-3 pt-4 border-t border-canine-linen-200">
<div class="w-10 h-10 rounded-full bg-canine-terra text-white flex items-center justify-center font-bold text-xs">
              DW
            </div>
<div>
<div class="text-xs font-bold text-canine-forest-dark">Dimas &amp; Kuki</div>
<div class="text-[10px] text-canine-oak-soil/70">Alumni Behavior Correction — Jakarta Selatan</div>
</div>
</div>
</div>
<!-- Review 3 -->
<div class="bg-white rounded-2xl p-6 border-2 border-canine-forest/15 shadow-canine-elevation-1 flex flex-col justify-between">
<div>
<div class="flex items-center gap-1 text-canine-amber-ochre text-sm mb-4">
<i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
</div>
<p class="text-xs sm:text-sm text-canine-oak-soil/90 italic leading-relaxed mb-6 font-medium">
              "Program Puppy Camp di sini sangat berbeda dari akademi lain. Tidak ada rantai besi atau nada membentak. Pelatih sangat berpendidikan, bahkan kami diajari nutrisi yang menyeimbangkan kadar dopamin anabul."
            </p>
</div>
<div class="flex items-center gap-3 pt-4 border-t border-canine-linen-200">
<div class="w-10 h-10 rounded-full bg-canine-oak-soil text-canine-linen-100 flex items-center justify-center font-bold text-xs">
              ST
            </div>
<div>
<div class="text-xs font-bold text-canine-forest-dark">Siti &amp; Mochi</div>
<div class="text-[10px] text-canine-oak-soil/70">Alumni Puppy Social Camp — Bogor</div>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- 8. SECTION FORMULIR TRIAL 60 MENIT (Gradasi Forest-Soil Berdimensi Tinggi) -->
<section class="py-20 bg-canine-linen-200/50" id="trial">
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="relative bg-canine-gradient-deep-moss rounded-3xl shadow-canine-elevation-3 overflow-hidden border-2 border-canine-forest/30">
<!-- Texture Ring Overlay -->
<div class="absolute -right-20 -bottom-20 w-80 h-80 rounded-full border-8 border-white/5 pointer-events-none"></div>
<div class="grid grid-cols-1 lg:grid-cols-12">
<!-- Sisi Kiri: Nilai Tambah & Trust -->
<div class="lg:col-span-5 p-8 sm:p-12 text-canine-linen-100 flex flex-col justify-between border-b lg:border-b-0 lg:border-r border-white/10">
<div>
<span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-canine-amber-ochre/20 text-canine-amber-ochre-light text-xs font-bold uppercase tracking-wider mb-4 border border-canine-amber-ochre/30">
<i class="fa-solid fa-seedling"></i> Langkah Awal Terbaik
              </span>
<h3 class="font-canine-display text-3xl sm:text-4xl font-bold mb-4 leading-tight">
                Mulai dengan Sesi Uji Coba 60 Menit
              </h3>
<p class="text-canine-linen-200/80 text-xs sm:text-sm leading-relaxed mb-8">
                Asesmen mendalam oleh Master Trainer CPDT-KA: membaca profil sensitivitas suara, pemicu agresi, ketertarikan scent work, serta jalur kurikulum yang paling hemat dan efektif bagi anjing Anda.
              </p>
<!-- Benefit List -->
<div class="space-y-4 text-xs font-medium">
<div class="flex items-center gap-3">
<div class="w-6 h-6 rounded-md bg-canine-terra text-white flex items-center justify-center text-xs">
<i class="fa-solid fa-check"></i>
</div>
<span>1-on-1 Evaluasi Temperamen Lengkap</span>
</div>
<div class="flex items-center gap-3">
<div class="w-6 h-6 rounded-md bg-canine-amber-ochre text-canine-forest-dark flex items-center justify-center text-xs">
<i class="fa-solid fa-check"></i>
</div>
<span>Paket Welcome Dehydrated Treats Alami</span>
</div>
<div class="flex items-center gap-3">
<div class="w-6 h-6 rounded-md bg-canine-forest-light text-canine-linen-100 flex items-center justify-center text-xs">
<i class="fa-solid fa-check"></i>
</div>
<span>Tanpa Biaya Tersembunyi &amp; Tanpa Paksaan Bergabung</span>
</div>
</div>
</div>
<!-- Guarantee Stamp -->
<div class="mt-8 pt-6 border-t border-white/10 flex items-center gap-3">
<div class="text-canine-amber-ochre-light text-2xl">
<i class="fa-solid fa-shield-cat"></i>
</div>
<p class="text-[11px] text-canine-linen-300">
                Garansi Fear-Free™: Anabul Anda diperlakukan dengan penuh empati, tanpa kekerasan fisik sama sekali.
              </p>
</div>
</div>
<!-- Sisi Kanan: Formulir Modern -->
<div class="lg:col-span-7 p-8 sm:p-12 bg-canine-linen-50">
<div class="flex items-center justify-between mb-6">
<div>
<h4 class="font-canine-display text-2xl font-bold text-canine-forest-dark">Formulir Reservasi Trial</h4>
<p class="text-xs text-canine-oak-soil/75 mt-0.5">Konfirmasi slot instan melalui WhatsApp Officer.</p>
</div>
<div class="w-10 h-10 rounded-full bg-canine-forest-soft text-canine-forest flex items-center justify-center font-bold">
<i class="fa-solid fa-calendar-check"></i>
</div>
</div>
<form id="canine-trial-form" class="space-y-4 text-left">
<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
<div>
<label class="block text-xs font-bold text-canine-oak-soil uppercase tracking-wider mb-1.5">Nama Lengkap Anda</label>
<input class="w-full px-4 py-3 rounded-xl bg-white border border-canine-forest/20 text-canine-forest-dark text-xs focus:ring-2 focus:ring-canine-terra focus:border-transparent outline-none transition-all" placeholder="Contoh: Sarah Wijaya" required="" type="text"/>
</div>
<div>
<label class="block text-xs font-bold text-canine-oak-soil uppercase tracking-wider mb-1.5">Nomor WhatsApp Aktif</label>
<input class="w-full px-4 py-3 rounded-xl bg-white border border-canine-forest/20 text-canine-forest-dark text-xs focus:ring-2 focus:ring-canine-terra focus:border-transparent outline-none transition-all" placeholder="0812-xxxx-xxxx" required="" type="tel"/>
</div>
</div>
<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
<div>
<label class="block text-xs font-bold text-canine-oak-soil uppercase tracking-wider mb-1.5">Nama &amp; Ras Anjing</label>
<input class="w-full px-4 py-3 rounded-xl bg-white border border-canine-forest/20 text-canine-forest-dark text-xs focus:ring-2 focus:ring-canine-terra focus:border-transparent outline-none transition-all" placeholder="Contoh: Chiko (Corgi)" required="" type="text"/>
</div>
<div>
<label class="block text-xs font-bold text-canine-oak-soil uppercase tracking-wider mb-1.5">Kelompok Usia Anjing</label>
<select class="w-full px-4 py-3 rounded-xl bg-white border border-canine-forest/20 text-canine-forest-dark text-xs focus:ring-2 focus:ring-canine-terra focus:border-transparent outline-none transition-all">
<option>Puppy (2 - 5 Bulan)</option>
<option>Junior (6 - 11 Bulan)</option>
<option>Dewasa (1 - 4 Tahun)</option>
<option>Senior (&gt; 4 Tahun)</option>
</select>
</div>
</div>
<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
<div>
<label class="block text-xs font-bold text-canine-oak-soil uppercase tracking-wider mb-1.5">Pilihan Lokasi Sesi</label>
<select class="w-full px-4 py-3 rounded-xl bg-white border border-canine-forest/20 text-canine-forest-dark text-xs focus:ring-2 focus:ring-canine-terra focus:border-transparent outline-none transition-all">
<option>Sentul Highlands (Outdoor Nature Yard)</option>
<option>BSD City (Indoor Climate Studio)</option>
<option>Home Visit (Khusus Konsultasi Khusus)</option>
</select>
</div>
<div>
<label class="block text-xs font-bold text-canine-oak-soil uppercase tracking-wider mb-1.5">Fokus Kebutuhan</label>
<select class="w-full px-4 py-3 rounded-xl bg-white border border-canine-forest/20 text-canine-forest-dark text-xs focus:ring-2 focus:ring-canine-terra focus:border-transparent outline-none transition-all">
<option>Sosialisasi Dini Puppy</option>
<option>Kepatuhan Harian &amp; Tidak Menarik Tali</option>
<option>Mengatasi Agresi / Gonggongan / Takut</option>
<option>Olahraga Ketangkasan Agility</option>
</select>
</div>
</div>
<button class="w-full py-4 px-6 rounded-xl bg-canine-gradient-terra-amber text-white font-canine-display font-bold text-base uppercase tracking-wider shadow-canine-elevation-2 hover:shadow-canine-glow-terra transition-all active:scale-[0.99] border border-white/20 flex items-center justify-center gap-2 mt-2" type="submit">
<span>Kirim Permintaan Sesi Trial 60 Menit</span>
<i class="fa-solid fa-paper-plane text-xs"></i>
</button>
<div class="text-center text-[10px] text-canine-oak-soil/60 mt-2">
                Data Anda aman. Kami tidak pernah membagikan kontak Anda kepada pihak ketiga.
              </div>
</form>
</div>
</div>
</div>
</div>
</section>
<!-- 9. SECTION FAQ ACCORDION -->
<section class="py-20 bg-canine-linen-100 border-t border-canine-oak-soil/10" id="faq">
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="text-center mb-12">
<span class="inline-block px-3 py-1 rounded-full bg-canine-forest text-canine-linen-100 text-[10px] font-bold uppercase tracking-widest mb-2">
          FAQ Seputar Kelas
        </span>
<h2 class="font-canine-display text-3xl sm:text-4xl font-bold text-canine-forest-dark">
          Pertanyaan yang Sering Diajukan
        </h2>
</div>
<div class="space-y-4">
<!-- Accordion Item 1 -->
<details class="group bg-white rounded-2xl p-6 border-2 border-canine-forest/15 shadow-canine-elevation-1 transition-all" open="">
<summary class="flex items-center justify-between font-canine-display text-lg font-bold text-canine-forest-dark cursor-pointer list-none">
<span class="flex items-center gap-3">
<i class="fa-solid fa-circle-question text-canine-terra text-base"></i>
              Berapa usia minimum anak anjing untuk bisa ikut kelas outdoor?
            </span>
<span class="w-7 h-7 rounded-full bg-canine-linen-200 flex items-center justify-center text-canine-forest group-open:rotate-180 transition-transform">
<i class="fa-solid fa-chevron-down text-xs"></i>
</span>
</summary>
<div class="text-xs sm:text-sm text-canine-oak-soil/85 mt-4 pt-4 border-t border-canine-linen-200 leading-relaxed">
            Anak anjing dapat mengikuti kelas Puppy Social Camp mulai usia 8 minggu (2 bulan), dengan syarat minimal sudah mendapatkan vaksin dasar pertama (DHPPi) dan obat cacing terkontrol demi keselamatan sanitasi area rumput alami kami.
          </div>
</details>
<!-- Accordion Item 2 -->
<details class="group bg-white rounded-2xl p-6 border-2 border-canine-forest/15 shadow-canine-elevation-1 transition-all">
<summary class="flex items-center justify-between font-canine-display text-lg font-bold text-canine-forest-dark cursor-pointer list-none">
<span class="flex items-center gap-3">
<i class="fa-solid fa-circle-question text-canine-terra text-base"></i>
              Apa beda metode Canine Terra dengan metode kepatuhan konvensional?
            </span>
<span class="w-7 h-7 rounded-full bg-canine-linen-200 flex items-center justify-center text-canine-forest group-open:rotate-180 transition-transform">
<i class="fa-solid fa-chevron-down text-xs"></i>
</span>
</summary>
<div class="text-xs sm:text-sm text-canine-oak-soil/85 mt-4 pt-4 border-t border-canine-linen-200 leading-relaxed">
            Pelatihan tradisional kerap menggunakan shock collars, choke chains, atau paksaan fisik yang memicu stres terpendam. Canine Terra 100% menggunakan <em>Fear-Free Positive Reinforcement</em> berbasis ilmu perilaku ilmiah, memberikan stimulasi olfaktori alam yang membuat anjing menurut karena merasa aman dan bahagia.
          </div>
</details>
<!-- Accordion Item 3 -->
<details class="group bg-white rounded-2xl p-6 border-2 border-canine-forest/15 shadow-canine-elevation-1 transition-all">
<summary class="flex items-center justify-between font-canine-display text-lg font-bold text-canine-forest-dark cursor-pointer list-none">
<span class="flex items-center gap-3">
<i class="fa-solid fa-circle-question text-canine-terra text-base"></i>
              Apakah Pawrent (pemilik) wajib hadir di lapangan setiap sesi?
            </span>
<span class="w-7 h-7 rounded-full bg-canine-linen-200 flex items-center justify-center text-canine-forest group-open:rotate-180 transition-transform">
<i class="fa-solid fa-chevron-down text-xs"></i>
</span>
</summary>
<div class="text-xs sm:text-sm text-canine-oak-soil/85 mt-4 pt-4 border-t border-canine-linen-200 leading-relaxed">
            Sangat diwajibkan! Filosofi kami adalah membangun ikatan seumur hidup antara Anda dan anjing Anda. Anjing yang hanya menurut pada trainer tidak akan berguna jika di rumah tetap membangkang terhadap pemiliknya. Kami mendidik Anda untuk menjadi pawrent yang tenang dan konsisten.
          </div>
</details>
<!-- Accordion Item 4 -->
<details class="group bg-white rounded-2xl p-6 border-2 border-canine-forest/15 shadow-canine-elevation-1 transition-all">
<summary class="flex items-center justify-between font-canine-display text-lg font-bold text-canine-forest-dark cursor-pointer list-none">
<span class="flex items-center gap-3">
<i class="fa-solid fa-circle-question text-canine-terra text-base"></i>
              Apakah ada opsi penjemputan atau sesi Home Visit di Jabodetabek?
            </span>
<span class="w-7 h-7 rounded-full bg-canine-linen-200 flex items-center justify-center text-canine-forest group-open:rotate-180 transition-transform">
<i class="fa-solid fa-chevron-down text-xs"></i>
</span>
</summary>
<div class="text-xs sm:text-sm text-canine-oak-soil/85 mt-4 pt-4 border-t border-canine-linen-200 leading-relaxed">
            Ya! Untuk kasus anjing dengan kecemasan tinggi atau ketakutan keluar rumah, kami menyediakan opsi Home Visit oleh pelatih senior di wilayah Jakarta, BSD/Tangerang Selatan, dan Depok-Bogor.
          </div>
</details>
</div>
</div>
</section>
<!-- 10. FOOTER PRESTISIUS & BERBOBOT -->
<footer class="bg-canine-forest-dark text-canine-linen-100 pt-16 pb-8 border-t-4 border-canine-terra">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<!-- Top Columns -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-10 pb-12 border-b border-canine-forest-light/30">
<!-- Col 1: Brand Info -->
<div class="lg:col-span-2 space-y-4">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-xl bg-canine-forest-medium flex items-center justify-center text-canine-amber-ochre-light border border-canine-forest-light/40">
<i class="fa-solid fa-shield-dog text-lg"></i>
</div>
<span class="font-canine-display text-2xl font-bold tracking-tight text-canine-linen-50">
              CANINE<span class="text-canine-terra italic font-normal">TERRA</span>
</span>
</div>
<p class="text-xs text-canine-linen-200/80 leading-relaxed max-w-sm">
            Sanctuary pelatihan anjing modern berbasis harmoni alam, penguatan positif (fear-free), dan pemahaman naluriah di iklim tropis Indonesia.
          </p>
<!-- Socials -->
<div class="flex items-center gap-2.5 pt-2">
<a class="w-9 h-9 rounded-lg bg-canine-forest-medium/80 hover:bg-canine-terra text-canine-linen-100 flex items-center justify-center transition-colors" href="#">
<i class="fa-brands fa-instagram text-sm"></i>
</a>
<a class="w-9 h-9 rounded-lg bg-canine-forest-medium/80 hover:bg-canine-terra text-canine-linen-100 flex items-center justify-center transition-colors" href="#">
<i class="fa-brands fa-tiktok text-sm"></i>
</a>
<a class="w-9 h-9 rounded-lg bg-canine-forest-medium/80 hover:bg-canine-terra text-canine-linen-100 flex items-center justify-center transition-colors" href="#">
<i class="fa-brands fa-youtube text-sm"></i>
</a>
<a class="w-9 h-9 rounded-lg bg-canine-forest-medium/80 hover:bg-emerald-600 text-canine-linen-100 flex items-center justify-center transition-colors" href="https://wa.me/6281277889900" target="_blank">
<i class="fa-brands fa-whatsapp text-sm"></i>
</a>
</div>
</div>
<!-- Col 2: Kurikulum -->
<div>
<h5 class="text-xs font-bold uppercase tracking-wider text-canine-amber-ochre-light mb-4">Kurikulum</h5>
<ul class="space-y-2.5 text-xs text-canine-linen-200/80">
<li><a class="hover:text-canine-terra transition-colors" href="#program">Puppy Social Camp (2-5 bln)</a></li>
<li><a class="hover:text-canine-terra transition-colors" href="#program">Terra Basic Obedience</a></li>
<li><a class="hover:text-canine-terra transition-colors" href="#program">Behavior Modification</a></li>
<li><a class="hover:text-canine-terra transition-colors" href="#program">Natural Agility Trail</a></li>
<li><a class="hover:text-canine-terra transition-colors" href="#trial">Sesi Trial 60 Menit</a></li>
</ul>
</div>
<!-- Col 3: Fasilitas -->
<div>
<h5 class="text-xs font-bold uppercase tracking-wider text-canine-amber-ochre-light mb-4">Arena &amp; Fasilitas</h5>
<ul class="space-y-2.5 text-xs text-canine-linen-200/80">
<li><a class="hover:text-canine-terra transition-colors" href="#fasilitas">Whispering Woods Sentul</a></li>
<li><a class="hover:text-canine-terra transition-colors" href="#fasilitas">Indoor Studio BSD City</a></li>
<li><a class="hover:text-canine-terra transition-colors" href="#fasilitas">Rain-Proof Cedar Pavilion</a></li>
<li><a class="hover:text-canine-terra transition-colors" href="#metode">Metode 3 Pilar Holistik</a></li>
<li><a class="hover:text-canine-terra transition-colors" href="#faq">Sertifikasi Pelatih</a></li>
</ul>
</div>
<!-- Col 4: Lokasi & Kontak -->
<div>
<h5 class="text-xs font-bold uppercase tracking-wider text-canine-amber-ochre-light mb-4">Lokasi &amp; Kontak</h5>
<div class="space-y-3 text-xs text-canine-linen-200/80">
<p class="flex items-start gap-2">
<i class="fa-solid fa-location-dot text-canine-terra mt-0.5"></i>
<span>Sentul Highlands Nature Park, Babakan Madang, Bogor</span>
</p>
<p class="flex items-start gap-2">
<i class="fa-solid fa-tree text-canine-amber-ochre mt-0.5"></i>
<span>The Breeze Area, BSD City, Tangerang Selatan</span>
</p>
<p class="flex items-center gap-2">
<i class="fa-solid fa-phone text-emerald-400"></i>
<span>+62 812-7788-9900</span>
</p>
</div>
</div>
</div>
<!-- Bottom Bar -->
<div class="pt-8 flex flex-col sm:flex-row items-center justify-between text-[11px] text-canine-linen-300/60 gap-4">
<p>© 2025 Canine Terra Sanctuary Indonesia. Seluruh hak cipta dilindungi.</p>
<div class="flex items-center gap-6">
<a class="hover:underline" href="#">Kebijakan Privasi</a>
<a class="hover:underline" href="#">Syarat &amp; Ketentuan</a>
<a class="hover:underline" href="#">Protokol Keamanan Anjing</a>
</div>
</div>
</div>
</footer>
<!-- 11. FLOATING ACTION BUTTONS (AI CHATBOT & WHATSAPP) -->
<div class="fixed bottom-6 right-6 z-50 flex flex-col items-end gap-3 pointer-events-auto">
<!-- Floating AI Assistant Button -->
<a class="w-13 h-13 sm:w-14 sm:h-14 rounded-2xl bg-canine-forest-dark text-canine-linen-100 flex items-center justify-center shadow-canine-elevation-3 hover:scale-105 active:scale-95 transition-all border-2 border-canine-forest-light/40 group relative" href="#trial" title="Konsultasi Instan AI Trainer">
<i class="fa-solid fa-robot text-xl text-canine-amber-ochre-light"></i>
<span class="absolute -top-1 -right-1 flex h-3.5 w-3.5">
<span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-canine-terra opacity-75"></span>
<span class="relative inline-flex rounded-full h-3.5 w-3.5 bg-canine-terra"></span>
</span>
<span class="absolute right-16 top-2.5 bg-canine-forest-dark text-canine-linen-100 text-xs font-bold px-3 py-1.5 rounded-lg shadow-canine-elevation-2 whitespace-nowrap opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none border border-white/20">
        Tanya AI TerraBot
      </span>
</a>
<!-- Floating WhatsApp Trainer Button -->
<a class="w-13 h-13 sm:w-14 sm:h-14 rounded-2xl bg-[#25D366] hover:bg-[#20ba59] text-white flex items-center justify-center shadow-canine-elevation-3 hover:scale-105 active:scale-95 transition-all border-2 border-white/30 group relative" href="https://wa.me/6281277889900" target="_blank" title="Chat WhatsApp Master Trainer">
<i class="fa-brands fa-whatsapp text-2xl"></i>
<span class="absolute right-16 top-2.5 bg-canine-forest-dark text-white text-xs font-bold px-3 py-1.5 rounded-lg shadow-canine-elevation-2 whitespace-nowrap opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none border border-white/20">
        WhatsApp Trainer (Fast Response)
      </span>
</a>
</div>
<script>
  document.getElementById('canine-trial-form')?.addEventListener('submit', function (event) {
    event.preventDefault();

    const fields = Array.from(this.querySelectorAll('input, select, textarea'))
      .map(function (field) {
        const label = field.parentElement.querySelector('label');
        return label ? label.textContent.trim() + ': ' + field.value.trim() : null;
      })
      .filter(Boolean);
    const message = 'Halo Canine Terra! Saya ingin memesan sesi trial 60 menit.\n' + fields.join('\n');

    window.open('https://wa.me/6281277889900?text=' + encodeURIComponent(message), '_blank', 'noopener,noreferrer');
  });
</script>
</body></html>