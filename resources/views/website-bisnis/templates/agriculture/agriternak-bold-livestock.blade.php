<html class="scroll-smooth" lang="id"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta content="web_standard" name="shell-type"/>
<title>AgriTernak - Precision Livestock &amp; Smart Pasture Ecosystem</title>
<link href="https://fonts.googleapis.com" rel="preconnect"/>
<link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;family=Plus+Jakarta+Sans:wght@600;700;800&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>


<style>
    @layer base {
      html, body {
        margin: 0;
        padding: 0;
      }
      body {
        overscroll-behavior: none;
      }
    }
    .custom-scroll::-webkit-scrollbar {
      width: 6px;
    }
    .custom-scroll::-webkit-scrollbar-thumb {
      background: #bccac0;
      border-radius: 9999px;
    }
    .glow-mint {
      box-shadow: 0 0 25px rgba(0, 208, 132, 0.28);
    }
  </style>
<style>body.agriternak-bold-preview main section:not([data-webia-preview-hero]), body.agriternak-bold-preview main footer, body.agriternak-bold-preview > footer, body.agriternak-bold-preview aside { display:none!important; } body.agriternak-bold-preview main { padding-top:0!important; }</style>
@vite('resources/css/app.css')
</head>
<body class="bg-bold-surface font-bold-body-md text-bold-on-surface antialiased selection:bg-bold-secondary-fixed selection:text-bold-on-secondary-fixed relative{{ request()->boolean('preview') ? ' agriternak-bold-preview' : '' }}">
<!-- NAVBAR STICKY DENGAN BACKDROP BLUR -->
<header class="fixed top-0 left-0 right-0 w-full z-50 bg-bold-surface/90 backdrop-blur-md border-b border-bold-surface-container-high/60 transition-all duration-300">
<div class="h-20 max-w-[1380px] mx-auto px-bold-margin md:px-bold-margin-md lg:px-bold-margin-lg flex items-center justify-between gap-bold-space-md">
<!-- Brand Logo -->
<div class="flex items-center gap-bold-space-md">
<a class="flex items-center gap-bold-space-sm group" href="#beranda">
<div class="w-11 h-11 rounded-bold-xl bg-bold-primary flex items-center justify-center text-bold-on-primary shadow-sm group-hover:scale-105 group-hover:bg-bold-primary-container transition-all">
<span class="material-symbols-outlined text-[26px]">potted_plant</span>
</div>
<div class="flex flex-col">
<span class="font-bold-headline-sm text-headline-sm text-bold-on-surface tracking-tight leading-none group-hover:text-bold-primary transition-colors font-bold">AgriTernak</span>
<span class="font-bold-label-sm text-label-sm text-bold-primary font-bold uppercase tracking-widest mt-1 flex items-center gap-1">
<span class="w-1.5 h-1.5 rounded-bold-full bg-bold-mint-neon"></span> Precision Pasture
            </span>
</div>
</a>
</div>
<!-- Desktop Navigation Menu -->
<nav class="hidden xl:flex items-center gap-1 p-1 bg-bold-surface-container/60 rounded-bold-xl border border-bold-surface-container-high/50">
<a class="px-bold-space-md py-2 rounded-bold-lg font-bold-label-lg text-label-lg text-bold-primary font-bold bg-bold-surface-container-lowest shadow-xs transition-all hover:text-bold-primary" href="#beranda">Beranda</a>
<a class="px-bold-space-md py-2 rounded-bold-lg font-bold-label-lg text-label-lg text-bold-on-surface-variant hover:text-bold-on-surface hover:bg-bold-surface-container-lowest/70 transition-all" href="#solusi">Solusi Peternakan</a>
<a class="px-bold-space-md py-2 rounded-bold-lg font-bold-label-lg text-label-lg text-bold-on-surface-variant hover:text-bold-on-surface hover:bg-bold-surface-container-lowest/70 transition-all" href="#teknologi">Teknologi</a>
<a class="px-bold-space-md py-2 rounded-bold-lg font-bold-label-lg text-label-lg text-bold-on-surface-variant hover:text-bold-on-surface hover:bg-bold-surface-container-lowest/70 transition-all" href="#keunggulan">Keunggulan</a>
<a class="px-bold-space-md py-2 rounded-bold-lg font-bold-label-lg text-label-lg text-bold-on-surface-variant hover:text-bold-on-surface hover:bg-bold-surface-container-lowest/70 transition-all" href="#faq">FAQ</a>
<a class="px-bold-space-md py-2 rounded-bold-lg font-bold-label-lg text-label-lg text-bold-on-surface-variant hover:text-bold-on-surface hover:bg-bold-surface-container-lowest/70 transition-all" href="#kontak">Kontak</a>
</nav>
<!-- CTA & Mobile Trigger -->
<div class="flex items-center gap-bold-space-sm sm:gap-bold-space-md">
<a class="hidden sm:inline-flex items-center justify-center gap-2 h-11 px-bold-space-lg rounded-bold-xl bg-bold-primary text-bold-on-primary font-bold-label-lg text-label-lg hover:bg-bold-primary-container shadow-sm hover:shadow-md transition-all active:scale-[0.98]" href="#kontak">
<span>Hubungi Kami</span>
<span class="material-symbols-outlined text-[18px]">arrow_forward</span>
</a>
<button aria-label="Buka Menu Navigasi" class="xl:hidden p-2.5 rounded-bold-xl bg-bold-surface-container text-bold-on-surface-variant hover:bg-bold-surface-container-high hover:text-bold-on-surface transition-colors" id="mobileMenuBtn" type="button">
<span class="material-symbols-outlined text-[26px]" id="mobileMenuIcon">menu</span>
</button>
</div>
</div>
<!-- Responsive Mobile Drawer Navigation -->
<div class="hidden xl:hidden border-b border-bold-surface-container-high bg-bold-surface px-bold-margin py-bold-space-md shadow-lg transition-all animate-fadeIn" id="mobileMenuDropdown">
<nav class="flex flex-col gap-2">
<a class="mobile-nav-link px-4 py-3 rounded-bold-xl font-bold-label-lg text-bold-on-surface hover:bg-bold-surface-container font-semibold transition-colors flex items-center justify-between" href="#beranda">
<span>Beranda</span>
<span class="material-symbols-outlined text-[18px] text-bold-primary">chevron_right</span>
</a>
<a class="mobile-nav-link px-4 py-3 rounded-bold-xl font-bold-label-lg text-bold-on-surface hover:bg-bold-surface-container font-semibold transition-colors flex items-center justify-between" href="#solusi">
<span>Solusi Peternakan</span>
<span class="material-symbols-outlined text-[18px] text-bold-primary">chevron_right</span>
</a>
<a class="mobile-nav-link px-4 py-3 rounded-bold-xl font-bold-label-lg text-bold-on-surface hover:bg-bold-surface-container font-semibold transition-colors flex items-center justify-between" href="#teknologi">
<span>Teknologi</span>
<span class="material-symbols-outlined text-[18px] text-bold-primary">chevron_right</span>
</a>
<a class="mobile-nav-link px-4 py-3 rounded-bold-xl font-bold-label-lg text-bold-on-surface hover:bg-bold-surface-container font-semibold transition-colors flex items-center justify-between" href="#keunggulan">
<span>Keunggulan</span>
<span class="material-symbols-outlined text-[18px] text-bold-primary">chevron_right</span>
</a>
<a class="mobile-nav-link px-4 py-3 rounded-bold-xl font-bold-label-lg text-bold-on-surface hover:bg-bold-surface-container font-semibold transition-colors flex items-center justify-between" href="#faq">
<span>FAQ</span>
<span class="material-symbols-outlined text-[18px] text-bold-primary">chevron_right</span>
</a>
<a class="mobile-nav-link px-4 py-3 rounded-bold-xl font-bold-label-lg text-bold-on-surface hover:bg-bold-surface-container font-semibold transition-colors flex items-center justify-between" href="#kontak">
<span>Kontak &amp; Kemitraan</span>
<span class="material-symbols-outlined text-[18px] text-bold-primary">chevron_right</span>
</a>
<div class="pt-2">
<a class="w-full flex items-center justify-center gap-2 h-12 rounded-bold-xl bg-bold-primary text-bold-on-primary font-bold-headline-sm text-label-lg font-bold shadow-md" href="#kontak">
<span>Daftar Kemitraan Sekarang</span>
<span class="material-symbols-outlined text-[20px]">assignment</span>
</a>
</div>
</nav>
</div>
</header>
<main class="w-full pt-20 bg-bold-surface">
<!-- SECTION 1: BERANDA (HERO SECTION) -->
<section data-webia-preview-hero class="relative w-full overflow-hidden bg-bold-surface pt-bold-space-xl pb-bold-space-3xl scroll-mt-24" id="beranda">
<div class="absolute -top-32 right-1/4 w-96 h-96 rounded-bold-full bg-bold-secondary-fixed/40 opacity-40 blur-3xl pointer-events-none"></div>
<div class="absolute top-1/2 -left-20 w-80 h-80 rounded-bold-full bg-bold-tertiary-fixed opacity-30 blur-3xl pointer-events-none"></div>
<div class="max-w-[1380px] mx-auto px-bold-margin md:px-bold-margin-md lg:px-bold-margin-lg">
<!-- Tag Pill & Live Ticker -->
<div class="flex flex-wrap items-center gap-bold-space-sm mb-bold-space-md">
<span class="inline-flex items-center gap-bold-space-xs px-bold-space-md py-1.5 rounded-bold-full bg-bold-inverse-surface text-bold-secondary-fixed font-bold-mono-telemetry text-mono-telemetry tracking-wide uppercase shadow-sm border border-bold-secondary-fixed/20">
<span class="w-2 h-2 rounded-bold-full bg-bold-mint-neon animate-ping"></span>
            AgriMint Precision OS v4.2
          </span>
<span class="inline-flex items-center gap-bold-space-xs px-bold-space-sm py-1.5 rounded-bold-full bg-bold-surface-container-high text-bold-primary font-bold-label-md text-label-md font-semibold">
<span class="material-symbols-outlined text-[16px] text-bold-primary">verified</span>
            Akreditasi Kementan RI No. 418/PK.200/2024
          </span>
</div>
<!-- Main Asymmetric Grid -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-bold-gutter lg:gap-bold-gutter-lg items-center">
<!-- Left: Impactful Typography & CTAs -->
<div class="lg:col-span-7 flex flex-col gap-bold-space-lg">
<h1 class="font-bold-display-hero text-3xl md:text-5xl lg:text-[54px] text-bold-on-surface font-extrabold tracking-tight leading-tight uppercase">
              Revolusi <span class="text-bold-primary bg-bold-secondary-fixed/50 px-2 py-0.5 rounded-bold-lg inline-block border border-bold-secondary-fixed">Peternakan</span> Modern: Produktivitas Tinggi, Hasil Maksimal.
            </h1>
<p class="font-bold-body-xl text-body-xl text-bold-on-surface-variant max-w-2xl leading-relaxed">
              Optimalisasi komoditas sapi potong, kambing etawa super, dan broiler modern melalui rekayasa pakan biokonversi, telemetri biosensor IoT, serta garansi <span class="font-bold text-bold-on-surface">100% penyerapan pasar berkeadilan</span>.
            </p>
<!-- Action Stack -->
<div class="flex flex-wrap items-center gap-bold-space-md pt-bold-space-xs">
<a class="inline-flex items-center justify-center gap-bold-space-sm px-bold-space-xl h-14 rounded-bold-xl bg-bold-primary text-bold-on-primary font-bold-headline-sm text-base md:text-lg hover:bg-bold-primary-container shadow-xl hover:shadow-2xl transition-all active:scale-95 group" href="#kontak">
<span>Konsultasi Ternak Sekarang</span>
<span class="material-symbols-outlined text-[22px] group-hover:translate-x-1 transition-transform">arrow_forward</span>
</a>
<a class="inline-flex items-center justify-center gap-bold-space-sm px-bold-space-lg h-14 rounded-bold-xl bg-bold-surface-container-highest text-bold-on-surface font-bold-label-lg text-label-lg hover:bg-bold-surface-container-high border border-bold-outline-variant/40 transition-all" href="#solusi">
<span class="material-symbols-outlined text-[20px] text-bold-primary">menu_book</span>
<span>Katalog Bibit &amp; Pakan</span>
</a>
</div>
<!-- Hero Metrics Bar -->
<div class="grid grid-cols-3 gap-bold-space-sm pt-bold-space-md bg-bold-surface-container-lowest p-bold-space-md rounded-bold-2xl shadow-sm border border-bold-surface-container-high">
<div class="flex flex-col">
<span class="text-2xl md:text-3xl text-bold-primary font-extrabold tracking-tight">99.2%</span>
<span class="font-bold-label-md text-label-md text-bold-on-surface-variant font-medium">Kelangsungan Hidup</span>
<span class="font-bold-mono-telemetry text-[11px] md:text-mono-telemetry text-bold-emerald-accent font-semibold flex items-center gap-1 mt-0.5">
<span class="w-1.5 h-1.5 rounded-bold-full bg-bold-emerald-accent"></span> Terkontrol Sensor
                </span>
</div>
<div class="flex flex-col border-l border-bold-surface-container-high pl-3 md:pl-4">
<span class="text-2xl md:text-3xl text-bold-tertiary font-extrabold tracking-tight">1.280+</span>
<span class="font-bold-label-md text-label-md text-bold-on-surface-variant font-medium">Mitra Peternak Aktif</span>
<span class="font-bold-mono-telemetry text-[11px] md:text-mono-telemetry text-bold-tertiary-container font-semibold mt-0.5">Jawa, Bali, Lampung</span>
</div>
<div class="flex flex-col border-l border-bold-surface-container-high pl-3 md:pl-4">
<span class="text-2xl md:text-3xl text-bold-on-surface font-extrabold tracking-tight">3.5x</span>
<span class="font-bold-label-md text-label-md text-bold-on-surface-variant font-medium">Percepatan Panen ADG</span>
<span class="font-bold-mono-telemetry text-[11px] md:text-mono-telemetry text-bold-primary font-semibold mt-0.5">FCR Rata-rata 1.34</span>
</div>
</div>
</div>
<!-- Right: Real-time Telemetry Dashboard Card Mockup -->
<div class="lg:col-span-5 relative mt-6 lg:mt-0">
<div class="absolute inset-0 bg-bold-primary-fixed-dim/30 rounded-bold-3xl blur-2xl transform rotate-1 scale-95 pointer-events-none"></div>
<div class="relative bg-bold-inverse-surface text-bold-inverse-on-surface rounded-bold-3xl p-bold-space-md shadow-2xl flex flex-col gap-bold-space-md border border-slate-700">
<!-- Header bar of telemetry box -->
<div class="flex items-center justify-between bg-bold-surface-container-lowest/10 p-bold-space-sm rounded-bold-xl">
<div class="flex items-center gap-bold-space-sm">
<span class="w-2.5 h-2.5 rounded-bold-full bg-bold-mint-neon animate-ping"></span>
<span class="font-bold-mono-telemetry text-[12px] font-bold text-bold-secondary-fixed">NODE-KANDANG-A04 • LIVE TELEMETRI</span>
</div>
<span class="font-bold-label-sm text-[11px] px-2.5 py-0.5 rounded-bold-full bg-slate-800 text-slate-300 border border-slate-700">Closed-House</span>
</div>
<!-- Image with HUD Overlay -->
<div class="relative rounded-bold-2xl overflow-hidden aspect-[4/3] bg-bold-surface-container-high border border-slate-800">
<img alt="Interior kandang modern dengan sensor" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBRpZ4G5wyMFbVvmEMwR58x98Q8IA9TewGKt-9VKYRsISGJcGcRcJz56WCdkabZRQkB55yZhmXncm7sTQ8CqNPatvjk8NczbCj1oKs3F52ItcQoebXKkNBunZouEakvZOU-MXZri9fkBuWzCDeO8PGyjG_5kbQ0YRAzdAEc1SrvH13r3m0qQa9ld8dK7xNVl1pPH6Df33xJum_84ylEfPfaoQtwL9ee6g8ckE4nYnA"/>
<div class="absolute bottom-3 left-3 bg-bold-inverse-surface/90 backdrop-blur-md px-bold-space-sm py-1.5 rounded-bold-lg flex items-center gap-bold-space-sm shadow-md border border-slate-700">
<span class="material-symbols-outlined text-bold-secondary-fixed text-[18px]">monitor_heart</span>
<div class="flex flex-col">
<span class="font-bold-label-sm text-[11px] text-bold-surface-container-high uppercase">Sapi Brahman Cross #BX-882</span>
<span class="font-bold-mono-telemetry text-mono-telemetry text-bold-secondary-fixed font-bold">BB: 624.5 kg (+1.45 kg/hari)</span>
</div>
</div>
</div>
<!-- Live Sparkline / FCR Monitoring Matrix -->
<div class="grid grid-cols-2 gap-bold-space-sm bg-bold-surface-container-lowest/5 p-bold-space-md rounded-bold-xl border border-slate-800">
<div class="flex flex-col gap-1">
<div class="flex items-center justify-between">
<span class="font-bold-label-md text-xs text-slate-300">Feed Conversion Ratio</span>
<span class="font-bold-mono-telemetry text-bold-secondary-fixed font-bold text-sm">1.28</span>
</div>
<svg class="w-full h-8 text-bold-secondary-fixed" fill="none" viewbox="0 0 160 30">
<path d="M0 25 L30 20 L60 22 L90 14 L120 16 L160 6" stroke="currentColor" stroke-linecap="round" stroke-width="2.5"></path>
<circle cx="160" cy="6" fill="currentColor" r="3.5"></circle>
</svg>
<span class="font-bold-label-sm text-[11px] text-bold-secondary-fixed">Efisiensi Pakan Naik +18%</span>
</div>
<div class="flex flex-col gap-1">
<div class="flex items-center justify-between">
<span class="font-bold-label-md text-xs text-slate-300">Rumen Temperature</span>
<span class="font-bold-mono-telemetry text-bold-tertiary-fixed-dim font-bold text-sm">38.6°C</span>
</div>
<div class="flex items-end gap-1.5 h-8 pt-1">
<div class="w-full bg-bold-tertiary-fixed-dim/40 h-3 rounded-t"></div>
<div class="w-full bg-bold-tertiary-fixed-dim/50 h-5 rounded-t"></div>
<div class="w-full bg-bold-tertiary-fixed-dim/70 h-4 rounded-t"></div>
<div class="w-full bg-bold-tertiary-fixed-dim/80 h-7 rounded-t"></div>
<div class="w-full bg-bold-secondary-fixed h-8 rounded-t"></div>
</div>
<span class="font-bold-label-sm text-[11px] text-bold-secondary-fixed">Status: Optimal Digestif</span>
</div>
</div>
<!-- Immediate Callout -->
<div class="flex items-center justify-between pt-1">
<span class="font-bold-mono-telemetry text-[11px] text-slate-300 flex items-center gap-1">
<span class="material-symbols-outlined text-[16px] text-bold-secondary-fixed">cloud_sync</span> Sinkron Cloud 30 dtk
                </span>
<a class="font-bold-label-md text-xs text-bold-secondary-fixed hover:text-white flex items-center gap-1 transition-colors" href="#teknologi">
<span>Lihat Arsitektur IoT</span>
<span class="material-symbols-outlined text-[14px]">arrow_forward</span>
</a>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- SECTION 2: SOLUSI PETERNAKAN (KOMODITAS INTI BENTO) -->
<section class="w-full bg-bold-surface-container-low py-bold-space-3xl scroll-mt-20" id="solusi">
<div class="max-w-[1380px] mx-auto px-bold-margin md:px-bold-margin-md lg:px-bold-margin-lg">
<div class="flex flex-col md:flex-row md:items-end justify-between mb-bold-space-2xl gap-bold-space-md">
<div class="max-w-xl flex flex-col gap-bold-space-xs">
<span class="font-bold-mono-telemetry text-mono-telemetry uppercase tracking-wider text-bold-primary font-bold">Genetika Terverifikasi</span>
<h2 class="font-bold-headline-xl text-3xl md:text-4xl text-bold-on-surface font-extrabold tracking-tight">Tiga Komoditas Inti Berorientasi Laba Tinggi</h2>
<p class="font-bold-body-lg text-body-lg text-bold-on-surface-variant">Dukungan bibit galur murni F1 dengan sertifikasi DNA dan rekayasa pakan terformulasi klinis.</p>
</div>
<div class="flex items-center gap-bold-space-sm">
<span class="inline-flex items-center gap-1.5 px-bold-space-md py-2.5 rounded-bold-xl bg-bold-surface-container-lowest shadow-sm font-bold-label-md text-label-md text-bold-on-surface border border-bold-outline-variant/30">
<span class="material-symbols-outlined text-bold-primary text-[20px]">verified_user</span> Asuransi Ternak Mandiri 100%
            </span>
</div>
</div>
<!-- Bento Grid Cards -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-bold-gutter">
<!-- Card 1: Sapi Potong -->
<div class="group bg-bold-surface-container-lowest rounded-bold-3xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col border border-bold-surface-container-high/60">
<div class="relative aspect-[16/10] overflow-hidden bg-bold-surface-container">
<img alt="Sapi Potong Limousin" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBk9iNwlGN3vhEsnn9Xy8i-Mc1gUk8HkSJxI6vpzs6Lw4zBoCnTb64kQeB4D_2LODfScEldSM00cJViLOfXuTu_tCyptycCOttHSXS9fvsr2I6SG_p_JvK7OpNH5VPjdRwLugondXHBjbHCm0tWHL6X_2etTlit-ATTTL-ORM6J9rmF8NGVBrdTMYr1NtqDP32B7--n9t41otNrBtjpuqbKfwhWXXUMzLYaVSwtQGU"/>
<div class="absolute top-3 left-3 bg-bold-inverse-surface/85 text-bold-inverse-on-surface px-bold-space-sm py-1 rounded-bold-full font-bold-label-sm text-[11px] uppercase font-bold tracking-wider backdrop-blur-xs">
                Sapi Potong F1 Limousin &amp; Simmental
              </div>
<div class="absolute bottom-3 right-3 bg-bold-secondary-fixed text-bold-on-secondary-fixed font-bold-mono-telemetry text-mono-telemetry font-bold py-1 px-3 rounded-bold-lg shadow-sm">
                ADG: +1.6 kg/hari
              </div>
</div>
<div class="p-bold-space-lg flex flex-col flex-1 justify-between gap-bold-space-md">
<div>
<h3 class="font-bold-headline-sm text-xl text-bold-on-surface font-bold mb-bold-space-xs group-hover:text-bold-primary transition-colors">Penggemukan Intensif 90-120 Hari</h3>
<p class="font-bold-body-md text-body-md text-bold-on-surface-variant leading-relaxed">Protokol pakan silase terfermentasi konsentrat tinggi protein 16%, menurunkan risiko asidosis hingga 0%.</p>
</div>
<div class="pt-bold-space-sm flex items-center justify-between border-t border-bold-surface-container-high/60">
<span class="font-bold-headline-sm text-lg text-bold-primary font-extrabold">Est. ROI: 28-34%</span>
<a class="w-10 h-10 rounded-bold-xl bg-bold-primary text-bold-on-primary flex items-center justify-center hover:bg-bold-primary-container transition-all hover:scale-105" href="#kontak" title="Pilih Komoditas Sapi">
<span class="material-symbols-outlined text-[20px]">chevron_right</span>
</a>
</div>
</div>
</div>
<!-- Card 2: Kambing Etawa Unggulan -->
<div class="group bg-bold-surface-container-lowest rounded-bold-3xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col border border-bold-surface-container-high/60">
<div class="relative aspect-[16/10] overflow-hidden bg-bold-surface-container">
<img alt="Kambing Etawa Unggulan" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCZT_9ROQxKfSfShs79ULY993dn5myjqdDt1lAVFHVGiQNekGhyaR6EynD7DdQM3acNZr4WIrY8IF771QIsN-BJ5q8Ie7rPfXpCS1Al38Kgg-GrR3rY5w7mfzjgCaKzfeeZCQudO7STYdXFgrrTAEoK4Ys6j9OEgLeVJ_KTCctN4Lf3fvW1zqXqBgfc2tHWnoojxLmHXDEiiJLjCWgKtc2zZHiekeTLYk1yJu053rU"/>
<div class="absolute top-3 left-3 bg-bold-inverse-surface/85 text-bold-inverse-on-surface px-bold-space-sm py-1 rounded-bold-full font-bold-label-sm text-[11px] uppercase font-bold tracking-wider backdrop-blur-xs">
                Kambing Etawa Senduro &amp; Kaligesing
              </div>
<div class="absolute bottom-3 right-3 bg-bold-secondary-fixed text-bold-on-secondary-fixed font-bold-mono-telemetry text-mono-telemetry font-bold py-1 px-3 rounded-bold-lg shadow-sm">
                Susu: 2.8 Liter/hari
              </div>
</div>
<div class="p-bold-space-lg flex flex-col flex-1 justify-between gap-bold-space-md">
<div>
<h3 class="font-bold-headline-sm text-xl text-bold-on-surface font-bold mb-bold-space-xs group-hover:text-bold-primary transition-colors">Dua Manfaat: Susu &amp; Bibit Kontes</h3>
<p class="font-bold-body-md text-body-md text-bold-on-surface-variant leading-relaxed">Galur genetika murni dengan sertifikasi genealogis resmi, produktivitas laktasi tinggi bebas residu antibiotik.</p>
</div>
<div class="pt-bold-space-sm flex items-center justify-between border-t border-bold-surface-container-high/60">
<span class="font-bold-headline-sm text-lg text-bold-primary font-extrabold">Est. ROI: 32-41%</span>
<a class="w-10 h-10 rounded-bold-xl bg-bold-primary text-bold-on-primary flex items-center justify-center hover:bg-bold-primary-container transition-all hover:scale-105" href="#kontak" title="Pilih Komoditas Kambing">
<span class="material-symbols-outlined text-[20px]">chevron_right</span>
</a>
</div>
</div>
</div>
<!-- Card 3: Broiler Modern Closed-House -->
<div class="group bg-bold-surface-container-lowest rounded-bold-3xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col border border-bold-surface-container-high/60">
<div class="relative aspect-[16/10] overflow-hidden bg-bold-surface-container">
<img alt="Broiler Closed-House Modern" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="https://lh3.googleusercontent.com/aida-public/AB6AXuATrQPlbSaf6NztHa1g30ru0v1sGG9oK-XLRDwDqIYEDOahB7-HzoYVT51xtT04L3BEIv_3bU3LzhLCGR-Q7Wa2GLcVbpMkx5Ai1hN4-LJjbSuT-z3Lmgu1ZoLo0v17MLQGezkADlu37N_dcJRrb_qh3MzXALVaHSEuxWi6TaaQ2e1gcSRBOYIZyglPCAkP-ib5s2VFCmoJOE4WT4d8HG8OPVqvFTRazzoak29CIl8"/>
<div class="absolute top-3 left-3 bg-bold-inverse-surface/85 text-bold-inverse-on-surface px-bold-space-sm py-1 rounded-bold-full font-bold-label-sm text-[11px] uppercase font-bold tracking-wider backdrop-blur-xs">
                Unggas Broiler Platinum IoT
              </div>
<div class="absolute bottom-3 right-3 bg-bold-secondary-fixed text-bold-on-secondary-fixed font-bold-mono-telemetry text-mono-telemetry font-bold py-1 px-3 rounded-bold-lg shadow-sm">
                Siklus: 32 Hari
              </div>
</div>
<div class="p-bold-space-lg flex flex-col flex-1 justify-between gap-bold-space-md">
<div>
<h3 class="font-bold-headline-sm text-xl text-bold-on-surface font-bold mb-bold-space-xs group-hover:text-bold-primary transition-colors">Closed-House Otomatis Penuh</h3>
<p class="font-bold-body-md text-body-md text-bold-on-surface-variant leading-relaxed">Sistem pemanas infra-merah, drinker otomatis sensorik, dan monitoring amonia kandang secara real-time via smartphone.</p>
</div>
<div class="pt-bold-space-sm flex items-center justify-between border-t border-bold-surface-container-high/60">
<span class="font-bold-headline-sm text-lg text-bold-primary font-extrabold">FCR: 1.32 Stabil</span>
<a class="w-10 h-10 rounded-bold-xl bg-bold-primary text-bold-on-primary flex items-center justify-center hover:bg-bold-primary-container transition-all hover:scale-105" href="#kontak" title="Pilih Komoditas Ayam">
<span class="material-symbols-outlined text-[20px]">chevron_right</span>
</a>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- SECTION 3: TEKNOLOGI (TIGA PILAR SOLUSI AGRIMINT) -->
<section class="w-full bg-bold-surface py-bold-space-3xl scroll-mt-20" id="teknologi">
<div class="max-w-[1380px] mx-auto px-bold-margin md:px-bold-margin-md lg:px-bold-margin-lg">
<div class="max-w-2xl mx-auto text-center flex flex-col gap-bold-space-xs mb-bold-space-3xl">
<span class="font-bold-mono-telemetry text-mono-telemetry uppercase tracking-wider text-bold-secondary font-bold">Ekosistem End-to-End</span>
<h2 class="font-bold-headline-xl text-3xl md:text-4xl text-bold-on-surface font-extrabold tracking-tight">Teknologi Terpadu AgriMint</h2>
<p class="font-bold-body-lg text-body-lg text-bold-on-surface-variant">Kami mengintegrasikan hulu hingga hilir agar peternak hanya fokus pada manajemen teknis terbaik.</p>
</div>
<div class="grid grid-cols-1 lg:grid-cols-3 gap-bold-gutter lg:gap-bold-gutter-lg">
<!-- Pilar 1 -->
<div class="bg-bold-surface-container rounded-bold-3xl p-bold-space-xl flex flex-col justify-between shadow-sm hover:shadow-md transition-all relative overflow-hidden border border-bold-surface-container-high/70 hover:-translate-y-1">
<div class="absolute -top-10 -right-10 w-32 h-32 rounded-bold-full bg-bold-secondary-fixed/40 blur-xl pointer-events-none"></div>
<div>
<div class="w-14 h-14 rounded-bold-2xl bg-bold-primary text-bold-on-primary flex items-center justify-center mb-bold-space-lg shadow-md">
<span class="material-symbols-outlined text-[30px]">biotech</span>
</div>
<span class="font-bold-label-sm text-label-sm text-bold-primary font-bold uppercase tracking-wider">Pilar 01 • Bio-Nutrition</span>
<h3 class="font-bold-headline-md text-2xl text-bold-on-surface font-bold mt-1 mb-bold-space-sm">Nutrisi Presisi &amp; Biokonversi Pakan</h3>
<p class="font-bold-body-md text-body-md text-bold-on-surface-variant leading-relaxed">
                Formulasi ransum pakan berbasis kecerdasan komputasi menyesuaikan umur, iklim mikro kandang, dan target kenaikan bobot harian (ADG) tanpa antibiotik pemacu pertumbuhan (AGP).
              </p>
</div>
<div class="pt-bold-space-lg">
<div class="p-bold-space-sm rounded-bold-xl bg-bold-surface-container-lowest font-bold-mono-telemetry text-mono-telemetry text-bold-on-surface flex items-center gap-bold-space-xs border border-bold-surface-container-high/50">
<span class="material-symbols-outlined text-bold-secondary text-[18px]">check_circle</span>
                Hemat Biaya Pakan Konvensional 22%
              </div>
</div>
</div>
<!-- Pilar 2 -->
<div class="bg-bold-surface-container rounded-bold-3xl p-bold-space-xl flex flex-col justify-between shadow-sm hover:shadow-md transition-all relative overflow-hidden border border-bold-surface-container-high/70 hover:-translate-y-1">
<div class="absolute -top-10 -right-10 w-32 h-32 rounded-bold-full bg-bold-tertiary-fixed/50 blur-xl pointer-events-none"></div>
<div>
<div class="w-14 h-14 rounded-bold-2xl bg-bold-tertiary text-bold-on-tertiary flex items-center justify-center mb-bold-space-lg shadow-md">
<span class="material-symbols-outlined text-[30px]">genetics</span>
</div>
<span class="font-bold-label-sm text-label-sm text-bold-tertiary font-bold uppercase tracking-wider">Pilar 02 • IoT Biometrik</span>
<h3 class="font-bold-headline-md text-2xl text-bold-on-surface font-bold mt-1 mb-bold-space-sm">Genetik Unggul Terakreditasi</h3>
<p class="font-bold-body-md text-body-md text-bold-on-surface-variant leading-relaxed">
                Pasokan pedet (DOC) dan cempe dengan garis keturunan terbukti bebas penyakit menular PMK, LSD, dan Avian Influenza. Disertai chip RFID identitas genealogis.
              </p>
</div>
<div class="pt-bold-space-lg">
<div class="p-bold-space-sm rounded-bold-xl bg-bold-surface-container-lowest font-bold-mono-telemetry text-mono-telemetry text-bold-on-surface flex items-center gap-bold-space-xs border border-bold-surface-container-high/50">
<span class="material-symbols-outlined text-bold-tertiary text-[18px]">verified</span>
                RFID Microchip &amp; Rekam Medis Digital
              </div>
</div>
</div>
<!-- Pilar 3 -->
<div class="bg-bold-surface-container rounded-bold-3xl p-bold-space-xl flex flex-col justify-between shadow-sm hover:shadow-md transition-all relative overflow-hidden border border-bold-surface-container-high/70 hover:-translate-y-1">
<div class="absolute -top-10 -right-10 w-32 h-32 rounded-bold-full bg-bold-secondary-fixed-dim/40 blur-xl pointer-events-none"></div>
<div>
<div class="w-14 h-14 rounded-bold-2xl bg-bold-inverse-surface text-bold-secondary-fixed flex items-center justify-center mb-bold-space-lg shadow-md">
<span class="material-symbols-outlined text-[30px]">handshake</span>
</div>
<span class="font-bold-label-sm text-label-sm text-bold-secondary font-bold uppercase tracking-wider">Pilar 03 • Market Offtake</span>
<h3 class="font-bold-headline-md text-2xl text-bold-on-surface font-bold mt-1 mb-bold-space-sm">Kemitraan Terpadu &amp; Jaminan Offtake</h3>
<p class="font-bold-body-md text-body-md text-bold-on-surface-variant leading-relaxed">
                Kontrak perjanjian penyerapan 100% hasil panen ternak dengan harga dasar transparan (floor price agreement), membebaskan peternak dari fluktuasi spekulan pasar.
              </p>
</div>
<div class="pt-bold-space-lg">
<div class="p-bold-space-sm rounded-bold-xl bg-bold-surface-container-lowest font-bold-mono-telemetry text-mono-telemetry text-bold-on-surface flex items-center gap-bold-space-xs border border-bold-surface-container-high/50">
<span class="material-symbols-outlined text-bold-primary text-[18px]">lock</span>
                Jaminan Penyerapan Pasar Kontraktual
              </div>
</div>
</div>
</div>
</div>
</section>
<!-- SECTION 4: KEUNGGULAN (DATA MATRIX & METRIK NYATA) -->
<section class="w-full bg-bold-inverse-surface text-bold-inverse-on-surface py-bold-space-3xl relative scroll-mt-20" id="keunggulan">
<div class="max-w-[1380px] mx-auto px-bold-margin md:px-bold-margin-md lg:px-bold-margin-lg">
<div class="grid grid-cols-1 lg:grid-cols-12 gap-bold-gutter lg:gap-bold-gutter-lg items-center mb-bold-space-2xl">
<div class="lg:col-span-8 flex flex-col gap-bold-space-xs">
<span class="font-bold-mono-telemetry text-mono-telemetry text-bold-secondary-fixed uppercase tracking-wider font-bold">Keunggulan Operasional &amp; Verifikasi Nyata</span>
<h2 class="font-bold-headline-xl text-3xl md:text-4xl text-white font-extrabold tracking-tight">Kinerja Operasional Peternak Mitra 2024</h2>
<p class="font-bold-body-lg text-body-lg text-slate-300 max-w-xl">Hasil audit performa klaster peternakan di 42 kabupaten menunjukkan penurunan drastis angka morbiditas dan lonjakan margin bersih.</p>
</div>
<div class="lg:col-span-4 flex lg:justify-end">
<div class="p-bold-space-md rounded-bold-2xl bg-white/10 backdrop-blur-md flex items-center gap-bold-space-md border border-slate-700">
<div class="w-12 h-12 rounded-bold-xl bg-bold-secondary-fixed text-bold-on-secondary-fixed flex items-center justify-center font-bold">
<span class="material-symbols-outlined text-[26px]">trending_up</span>
</div>
<div class="flex flex-col">
<span class="font-bold-headline-sm text-2xl text-white font-bold">+41.8%</span>
<span class="font-bold-label-md text-label-md text-slate-300">Rerata Kenaikan Profit Bersih</span>
</div>
</div>
</div>
</div>
<!-- 3-Column Bold Metric Grid -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-bold-gutter">
<!-- Matriks 1 -->
<div class="p-bold-space-xl rounded-bold-3xl bg-slate-800/90 border border-slate-700 shadow-xl flex flex-col gap-bold-space-md">
<div class="flex items-center justify-between">
<span class="font-bold-mono-telemetry text-mono-telemetry text-bold-secondary-fixed font-bold">METRIK 01 • FCR</span>
<span class="material-symbols-outlined text-bold-secondary-fixed text-[24px]">scale</span>
</div>
<div>
<div class="font-bold-display-hero text-4xl md:text-5xl text-white font-black leading-none">1.28</div>
<span class="font-bold-label-lg text-label-lg text-bold-secondary-fixed-dim block mt-1">Feed Conversion Ratio Unggas &amp; Ruminansia</span>
</div>
<p class="font-bold-body-md text-body-md text-slate-300 leading-relaxed">
              Setiap 1.28 kg pakan presisi menghasilkan 1.00 kg penambahan bobot daging bersih. Menghemat anggaran pengeluaran pakan hingga Rp 4.200 per kilogram bobot hidup.
            </p>
<div class="h-2.5 w-full bg-slate-700 rounded-bold-full overflow-hidden">
<div class="h-full bg-bold-secondary-fixed rounded-bold-full w-[85%]"></div>
</div>
</div>
<!-- Matriks 2 -->
<div class="p-bold-space-xl rounded-bold-3xl bg-slate-800/90 border border-slate-700 shadow-xl flex flex-col gap-bold-space-md">
<div class="flex items-center justify-between">
<span class="font-bold-mono-telemetry text-mono-telemetry text-bold-tertiary-fixed-dim font-bold">METRIK 02 • HEALTH</span>
<span class="material-symbols-outlined text-bold-tertiary-fixed-dim text-[24px]">health_and_safety</span>
</div>
<div>
<div class="font-bold-display-hero text-4xl md:text-5xl text-white font-black leading-none">0.8%</div>
<span class="font-bold-label-lg text-label-lg text-bold-tertiary-fixed-dim block mt-1">Angka Mortalitas (Tingkat Kematian)</span>
</div>
<p class="font-bold-body-md text-body-md text-slate-300 leading-relaxed">
              Pemantauan preventif inframerah kandang mendeteksi lonjakan temperatur dan tanda dini letargi ternak 48 jam sebelum gejala klinis muncul ke permukaan.
            </p>
<div class="h-2.5 w-full bg-slate-700 rounded-bold-full overflow-hidden">
<div class="h-full bg-bold-tertiary-fixed-dim rounded-bold-full w-[96%]"></div>
</div>
</div>
<!-- Matriks 3 -->
<div class="p-bold-space-xl rounded-bold-3xl bg-slate-800/90 border border-slate-700 shadow-xl flex flex-col gap-bold-space-md">
<div class="flex items-center justify-between">
<span class="font-bold-mono-telemetry text-mono-telemetry text-bold-mint-neon font-bold">METRIK 03 • SUPPLY CHAIN</span>
<span class="material-symbols-outlined text-bold-mint-neon text-[24px]">ac_unit</span>
</div>
<div>
<div class="font-bold-display-hero text-4xl md:text-5xl text-white font-black leading-none">-18°C</div>
<span class="font-bold-label-lg text-label-lg text-bold-mint-neon block mt-1">Rantai Dingin RPH &amp; Distribusi Terintegrasi</span>
</div>
<p class="font-bold-body-md text-body-md text-slate-300 leading-relaxed">
              Hasil karkas langsung masuk sistem Rumah Potong Hewan (RPH) berstandar Halal &amp; HACCP dengan armada pendingin berinsulasi tinggi ke hotel, restoran, dan ritel.
            </p>
<div class="h-2.5 w-full bg-slate-700 rounded-bold-full overflow-hidden">
<div class="h-full bg-bold-mint-neon rounded-bold-full w-[100%]"></div>
</div>
</div>
</div>
</div>
</section>
<!-- SECTION 5: FAQ (ACCORDION INTERAKTIF VANILLA JS) -->
<section class="w-full bg-bold-surface-container-low py-bold-space-3xl scroll-mt-20" id="faq">
<div class="max-w-[960px] mx-auto px-bold-margin md:px-bold-margin-md">
<div class="text-center flex flex-col gap-bold-space-xs mb-bold-space-2xl">
<span class="font-bold-mono-telemetry text-mono-telemetry uppercase tracking-wider text-bold-primary font-bold">Pusat Transparansi Mitra</span>
<h2 class="font-bold-headline-xl text-3xl md:text-4xl text-bold-on-surface font-extrabold tracking-tight">Pertanyaan Umum (FAQ)</h2>
<p class="font-bold-body-lg text-body-lg text-bold-on-surface-variant">Segala hal yang perlu Anda ketahui mengenai skema peternakan modern dan kemitraan AgriMint.</p>
</div>
<!-- Accordion Items -->
<div class="flex flex-col gap-3" id="faq-accordion-group">
<!-- FAQ 1 -->
<div class="bg-bold-surface-container-lowest rounded-bold-2xl shadow-sm overflow-hidden border border-bold-surface-container-high/60">
<button aria-expanded="false" class="faq-btn w-full p-bold-space-lg text-left flex items-center justify-between gap-bold-space-md select-none group transition-colors" type="button">
<span class="font-bold-headline-sm text-lg md:text-xl text-bold-on-surface font-bold group-hover:text-bold-primary transition-colors">Bagaimana cara bergabung menjadi mitra peternak AgriMint?</span>
<span class="material-symbols-outlined text-bold-primary text-[26px] transform transition-transform duration-300 shrink-0">expand_more</span>
</button>
<div class="faq-panel hidden px-bold-space-lg pb-bold-space-lg text-bold-on-surface-variant font-bold-body-lg text-body-lg leading-relaxed border-t border-bold-surface-container-low pt-2">
              Calon mitra cukup mengisi formulir kemitraan di formulir bawah atau menghubungi tim spesialis lapangan via WhatsApp. Tim teknisi kami akan melakukan survei kelayakan kandang (akses air bersih, ventilasi, jalan logistik). Setelah diverifikasi, peternak menandatangani kontrak kemitraan, menerima transfer bibit bersertifikat, instalasi biosensor pintar, serta suplai pakan tahap pertama.
            </div>
</div>
<!-- FAQ 2 -->
<div class="bg-bold-surface-container-lowest rounded-bold-2xl shadow-sm overflow-hidden border border-bold-surface-container-high/60">
<button aria-expanded="false" class="faq-btn w-full p-bold-space-lg text-left flex items-center justify-between gap-bold-space-md select-none group transition-colors" type="button">
<span class="font-bold-headline-sm text-lg md:text-xl text-bold-on-surface font-bold group-hover:text-bold-primary transition-colors">Apa saja jenis komoditas ternak yang didukung saat ini?</span>
<span class="material-symbols-outlined text-bold-primary text-[26px] transform transition-transform duration-300 shrink-0">expand_more</span>
</button>
<div class="faq-panel hidden px-bold-space-lg pb-bold-space-lg text-bold-on-surface-variant font-bold-body-lg text-body-lg leading-relaxed border-t border-bold-surface-container-low pt-2">
              Fokus komoditas inti kami adalah Sapi Potong (F1 Limousin, Simmental, Brahman Cross), Kambing Etawa Unggulan (Senduro dan Kaligesing untuk produksi susu &amp; bakalan super), serta Ayam Broiler modern bersistem Closed-House. Seluruh komoditas dilengkapi paket nutrisi presisi terformulasi khusus.
            </div>
</div>
<!-- FAQ 3 -->
<div class="bg-bold-surface-container-lowest rounded-bold-2xl shadow-sm overflow-hidden border border-bold-surface-container-high/60">
<button aria-expanded="false" class="faq-btn w-full p-bold-space-lg text-left flex items-center justify-between gap-bold-space-md select-none group transition-colors" type="button">
<span class="font-bold-headline-sm text-lg md:text-xl text-bold-on-surface font-bold group-hover:text-bold-primary transition-colors">Bagaimana jaminan pasar dan harga jual ternak saat panen?</span>
<span class="material-symbols-outlined text-bold-primary text-[26px] transform transition-transform duration-300 shrink-0">expand_more</span>
</button>
<div class="faq-panel hidden px-bold-space-lg pb-bold-space-lg text-bold-on-surface-variant font-bold-body-lg text-body-lg leading-relaxed border-t border-bold-surface-container-low pt-2">
              AgriMint menerapkan skema <em>Contract Farming &amp; Offtaker Guarantee</em> 100%. Kami menetapkan harga batas bawah (floor price) yang disepakati di awal akad kontrak notariil. Ketika panen, seluruh ternak yang memenuhi standar bobot minimal dibeli langsung oleh AgriMint tanpa perantara calo atau tengkulak liar.
            </div>
</div>
<!-- FAQ 4 -->
<div class="bg-bold-surface-container-lowest rounded-bold-2xl shadow-sm overflow-hidden border border-bold-surface-container-high/60">
<button aria-expanded="false" class="faq-btn w-full p-bold-space-lg text-left flex items-center justify-between gap-bold-space-md select-none group transition-colors" type="button">
<span class="font-bold-headline-sm text-lg md:text-xl text-bold-on-surface font-bold group-hover:text-bold-primary transition-colors">Apa jaminan standar kesehatan dan vaksinasi hewan ternak?</span>
<span class="material-symbols-outlined text-bold-primary text-[26px] transform transition-transform duration-300 shrink-0">expand_more</span>
</button>
<div class="faq-panel hidden px-bold-space-lg pb-bold-space-lg text-bold-on-surface-variant font-bold-body-lg text-body-lg leading-relaxed border-t border-bold-surface-container-low pt-2">
              Seluruh ternak divaksinasi lengkap sebelum pengiriman (PMK, Anthrax, ND, Gumboro untuk unggas). Didukung kunjungan periodik dokter hewan residen AgriMint setiap 14 hari serta pemantauan sensor biometrik IoT 24 jam untuk pencegahan wabah penyakit sedini mungkin.
            </div>
</div>
<!-- FAQ 5 -->
<div class="bg-bold-surface-container-lowest rounded-bold-2xl shadow-sm overflow-hidden border border-bold-surface-container-high/60">
<button aria-expanded="false" class="faq-btn w-full p-bold-space-lg text-left flex items-center justify-between gap-bold-space-md select-none group transition-colors" type="button">
<span class="font-bold-headline-sm text-lg md:text-xl text-bold-on-surface font-bold group-hover:text-bold-primary transition-colors">Apakah pemula tanpa latar belakang peternakan bisa ikut bermitra?</span>
<span class="material-symbols-outlined text-bold-primary text-[26px] transform transition-transform duration-300 shrink-0">expand_more</span>
</button>
<div class="faq-panel hidden px-bold-space-lg pb-bold-space-lg text-bold-on-surface-variant font-bold-body-lg text-body-lg leading-relaxed border-t border-bold-surface-container-low pt-2">
              Sangat bisa. Sekitar 46% mitra aktif kami adalah pebisnis dan pemilik modal tanpa latar belakang peternakan sebelumnya. Kami menyediakan opsi bimbingan intensif SOP teknis harian maupun opsi kemitraan <em>Full-Managed Farm</em> terakreditasi.
            </div>
</div>
</div>
</div>
</section>
<!-- SECTION 6: KONTAK & KEMITRAAN (FORMULIR INTERAKTIF LENGKAP) -->
<section class="w-full bg-bold-surface py-bold-space-3xl scroll-mt-20" id="kontak">
<div class="max-w-[1380px] mx-auto px-bold-margin md:px-bold-margin-md lg:px-bold-margin-lg">
<div class="bg-bold-surface-container-highest/60 rounded-bold-3xl p-bold-space-lg md:p-bold-space-2xl grid grid-cols-1 lg:grid-cols-12 gap-bold-gutter lg:gap-bold-gutter-lg items-center border border-bold-surface-container-high">
<!-- Form Left -->
<div class="lg:col-span-5 flex flex-col gap-bold-space-md">
<span class="inline-flex items-center gap-bold-space-xs px-3.5 py-1.5 rounded-bold-full bg-bold-primary text-bold-on-primary font-bold-mono-telemetry text-mono-telemetry w-fit font-bold shadow-xs">
              Program Kemitraan Periode Q2-2025
            </span>
<h2 class="font-bold-headline-xl text-3xl md:text-4xl text-bold-on-surface font-extrabold tracking-tight">Mulai Peternakan Modern Anda Bersama AgriMint</h2>
<p class="font-bold-body-lg text-body-lg text-bold-on-surface-variant">Dapatkan pendampingan dokter hewan residen, instalasi sensor biosensor gratis, serta kontrak offtake sebelum bibit masuk kandang.</p>
<div class="space-y-bold-space-sm pt-bold-space-xs">
<div class="flex items-center gap-bold-space-sm bg-bold-surface-container-lowest/80 p-3 rounded-bold-xl border border-bold-surface-container-high/50">
<span class="material-symbols-outlined text-bold-primary text-[22px]">check_circle</span>
<span class="font-bold-body-md text-body-md text-bold-on-surface font-medium">Modal Mandiri atau Pembiayaan Syariah Bank Mitra</span>
</div>
<div class="flex items-center gap-bold-space-sm bg-bold-surface-container-lowest/80 p-3 rounded-bold-xl border border-bold-surface-container-high/50">
<span class="material-symbols-outlined text-bold-primary text-[22px]">check_circle</span>
<span class="font-bold-body-md text-body-md text-bold-on-surface font-medium">Pelatihan Intensif Akademi Peternak Digital 14 Hari</span>
</div>
<div class="flex items-center gap-bold-space-sm bg-bold-surface-container-lowest/80 p-3 rounded-bold-xl border border-bold-surface-container-high/50">
<span class="material-symbols-outlined text-bold-primary text-[22px]">check_circle</span>
<span class="font-bold-body-md text-body-md text-bold-on-surface font-medium">Jaminan Buy-back Tertulis Bersertifikat Notaris</span>
</div>
</div>
<!-- Direct Contact Pill -->
<div class="mt-2 p-4 rounded-bold-2xl bg-bold-primary/10 border border-bold-primary/20 flex items-center justify-between">
<div>
<span class="font-bold-label-sm text-xs uppercase tracking-wider text-bold-primary font-bold">Hotline Prioritas</span>
<div class="font-bold-mono-telemetry text-base font-bold text-bold-on-surface">+62 821 8920 4100</div>
</div>
<button class="px-3.5 py-2 rounded-bold-xl bg-bold-primary text-white font-bold-label-md text-sm font-semibold hover:bg-bold-primary-container transition-all flex items-center gap-1.5" onclick="toggleWaPopup()">
<span class="material-symbols-outlined text-[18px]">chat</span> Chat Langsung
              </button>
</div>
</div>
<!-- Form Right Component -->
<div class="lg:col-span-7 bg-bold-surface-container-lowest p-bold-space-lg md:p-bold-space-xl rounded-bold-2xl shadow-lg border border-bold-surface-container-high/80 relative">
<form class="flex flex-col gap-bold-space-md" id="kemitraanForm">
<div class="grid grid-cols-1 sm:grid-cols-2 gap-bold-space-md">
<div class="flex flex-col gap-1">
<label class="font-bold-label-md text-label-md text-bold-on-surface font-semibold" for="nama_lengkap">Nama Lengkap Peternak / Badan Usaha *</label>
<input class="w-full h-12 px-4 rounded-bold-xl bg-bold-surface-container-low text-bold-on-surface font-bold-body-md border border-bold-outline-variant/30 focus:border-bold-primary focus:bg-white outline-none focus:ring-2 focus:ring-bold-primary/20 transition-all" id="nama_lengkap" placeholder="Cth: Hendra Gunawan" required="" type="text"/>
</div>
<div class="flex flex-col gap-1">
<label class="font-bold-label-md text-label-md text-bold-on-surface font-semibold" for="kontak_wa">Nomor WhatsApp Aktif *</label>
<input class="w-full h-12 px-4 rounded-bold-xl bg-bold-surface-container-low text-bold-on-surface font-bold-body-md border border-bold-outline-variant/30 focus:border-bold-primary focus:bg-white outline-none focus:ring-2 focus:ring-bold-primary/20 transition-all" id="kontak_wa" placeholder="0812-XXXX-XXXX" required="" type="tel"/>
</div>
</div>
<div class="grid grid-cols-1 sm:grid-cols-2 gap-bold-space-md">
<div class="flex flex-col gap-1">
<label class="font-bold-label-md text-label-md text-bold-on-surface font-semibold" for="komoditas_select">Pilihan Komoditas Kemitraan *</label>
<select class="w-full h-12 px-4 rounded-bold-xl bg-bold-surface-container-low text-bold-on-surface font-bold-body-md border border-bold-outline-variant/30 focus:border-bold-primary focus:bg-white outline-none focus:ring-2 focus:ring-bold-primary/20 transition-all" id="komoditas_select">
<option value="Sapi Potong (Fattening)">Sapi Potong (Fattening)</option>
<option value="Kambing Etawa (Susu &amp; Bibit)">Kambing Etawa (Susu &amp; Bibit)</option>
<option value="Ayam Broiler (Closed House IoT)">Ayam Broiler (Closed House IoT)</option>
<option value="Integrasi Sapi Padi Ruminansia">Integrasi Sapi Padi Ruminansia</option>
</select>
</div>
<div class="flex flex-col gap-1">
<label class="font-bold-label-md text-label-md text-bold-on-surface font-semibold" for="luas_lahan">Kapasitas / Luas Lahan (m²)</label>
<input class="w-full h-12 px-4 rounded-bold-xl bg-bold-surface-container-low text-bold-on-surface font-bold-body-md border border-bold-outline-variant/30 focus:border-bold-primary focus:bg-white outline-none focus:ring-2 focus:ring-bold-primary/20 transition-all" id="luas_lahan" placeholder="Cth: 500 m² (Kapasitas 40 Ekor)" type="text"/>
</div>
</div>
<div class="flex flex-col gap-1">
<label class="font-bold-label-md text-label-md text-bold-on-surface font-semibold" for="lokasi_kandang">Kabupaten &amp; Provinsi Lokasi Kandang *</label>
<input class="w-full h-12 px-4 rounded-bold-xl bg-bold-surface-container-low text-bold-on-surface font-bold-body-md border border-bold-outline-variant/30 focus:border-bold-primary focus:bg-white outline-none focus:ring-2 focus:ring-bold-primary/20 transition-all" id="lokasi_kandang" placeholder="Cth: Kabupaten Malang, Jawa Timur" required="" type="text"/>
</div>
<button class="w-full h-14 mt-bold-space-xs rounded-bold-xl bg-bold-primary text-bold-on-primary font-bold-headline-sm text-base md:text-lg font-bold hover:bg-bold-primary-container shadow-md hover:shadow-lg transition-all active:scale-[0.99] flex items-center justify-center gap-bold-space-sm" id="submitFormBtn" type="submit">
<span>Ajukan Evaluasi Kandang &amp; Kemitraan</span>
<span class="material-symbols-outlined text-[20px]">assignment_turned_in</span>
</button>
<div class="flex items-center justify-between text-xs text-bold-on-surface-variant pt-1">
<span class="flex items-center gap-1">
<span class="material-symbols-outlined text-[15px] text-bold-primary">lock</span> Data terlindungi standar enkripsi SSL.
                </span>
<span>Respon cepat max 1x24 jam</span>
</div>
</form>
</div>
</div>
</div>
</section>
<!-- BOTTOM CALL-TO-ACTION BANNER -->
<section class="w-full bg-bold-primary text-bold-on-primary py-bold-space-3xl relative overflow-hidden">
<div class="absolute -right-20 -bottom-20 w-80 h-80 rounded-bold-full bg-bold-secondary-fixed opacity-20 blur-3xl pointer-events-none"></div>
<div class="max-w-[1380px] mx-auto px-bold-margin md:px-bold-margin-md lg:px-bold-margin-lg text-center flex flex-col items-center gap-bold-space-md relative z-10">
<span class="font-bold-mono-telemetry text-mono-telemetry uppercase tracking-widest text-bold-secondary-fixed font-bold bg-white/10 px-bold-space-md py-1.5 rounded-bold-full border border-bold-secondary-fixed/30">
          Wujudkan Swasembada Pangan Berkelanjutan
        </span>
<h2 class="font-bold-headline-xl text-3xl md:text-5xl text-white font-extrabold max-w-3xl leading-tight">
          Siap Melipatgandakan Hasil Peternakan Anda Sekarang?
        </h2>
<p class="font-bold-body-xl text-body-xl text-bold-on-primary-container max-w-2xl leading-relaxed">
          Jadwalkan konsultasi gratis dengan dokter hewan spesialis dan analis bisnis peternakan AgriMint hari ini.
        </p>
<div class="flex flex-wrap items-center justify-center gap-bold-space-md pt-bold-space-sm">
<a class="h-14 px-bold-space-xl rounded-bold-xl bg-bold-secondary-fixed text-bold-on-secondary-fixed font-bold-headline-sm text-base md:text-lg font-bold hover:bg-bold-secondary-fixed-dim transition-all shadow-xl active:scale-95 flex items-center gap-bold-space-sm" href="#kontak">
<span>Daftar Kemitraan Hari Ini</span>
<span class="material-symbols-outlined text-[20px]">arrow_forward</span>
</a>
<button class="h-14 px-bold-space-xl rounded-bold-xl bg-white/10 text-white font-bold-label-lg text-label-lg hover:bg-white/20 transition-all flex items-center gap-bold-space-sm border border-white/20" onclick="toggleWaPopup()">
<span class="material-symbols-outlined text-[20px]">chat</span>
<span>Bicara via WhatsApp</span>
</button>
</div>
</div>
</section>
</main>
<!-- FOOTER -->
<footer class="w-full bg-bold-surface-container-low shadow-[0_-1px_12px_rgba(0,0,0,0.02)] border-t border-bold-surface-container-high/60">
<div class="max-w-[1380px] mx-auto px-bold-margin md:px-bold-margin-md lg:px-bold-margin-lg pt-bold-space-3xl pb-bold-space-2xl">
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-bold-gutter lg:gap-bold-gutter-lg">
<div class="lg:col-span-4 flex flex-col gap-bold-space-md">
<div class="flex items-center gap-bold-space-sm">
<div class="w-10 h-10 rounded-bold-xl bg-bold-primary flex items-center justify-center text-bold-on-primary">
<span class="material-symbols-outlined text-[24px]">potted_plant</span>
</div>
<span class="font-bold-headline-sm text-headline-sm text-bold-on-surface font-bold">AgriTernak</span>
</div>
<p class="font-bold-body-md text-body-md text-bold-on-surface-variant leading-relaxed max-w-sm">
            Platform integrasi ekosistem peternakan pintar, pemantauan biometrik ternak real-time, dan manajemen pakan regeneratif terdepan di Indonesia.
          </p>
<div class="flex flex-wrap gap-bold-space-xs pt-bold-space-xs">
<div class="flex items-center gap-bold-space-xs px-bold-space-sm py-bold-space-xs rounded-bold-lg bg-bold-surface-container font-bold-mono-telemetry text-mono-telemetry text-bold-on-surface border border-bold-outline-variant/30">
<span class="material-symbols-outlined text-bold-primary text-[16px]">verified</span>ISO 22000 Terakreditasi
            </div>
<div class="flex items-center gap-bold-space-xs px-bold-space-sm py-bold-space-xs rounded-bold-lg bg-bold-surface-container font-bold-mono-telemetry text-mono-telemetry text-bold-on-surface border border-bold-outline-variant/30">
<span class="material-symbols-outlined text-bold-primary text-[16px]">eco</span>Organik &amp; Bebas Hormon
            </div>
</div>
</div>
<div class="lg:col-span-2 flex flex-col gap-bold-space-md">
<span class="font-bold-label-lg text-label-lg text-bold-on-surface font-bold uppercase tracking-wider">Solusi</span>
<ul class="flex flex-col gap-bold-space-sm">
<li><a class="font-bold-body-md text-bold-on-surface-variant hover:text-bold-primary transition-colors" href="#teknologi">Sensor Biometrik Leher</a></li>
<li><a class="font-bold-body-md text-bold-on-surface-variant hover:text-bold-primary transition-colors" href="#teknologi">Sistem Timbang Cerdas</a></li>
<li><a class="font-bold-body-md text-bold-on-surface-variant hover:text-bold-primary transition-colors" href="#solusi">Manajemen Pastura IoT</a></li>
<li><a class="font-bold-body-md text-bold-on-surface-variant hover:text-bold-primary transition-colors" href="#solusi">Silsilah &amp; Genetika Sapi</a></li>
</ul>
</div>
<div class="lg:col-span-2 flex flex-col gap-bold-space-md">
<span class="font-bold-label-lg text-label-lg text-bold-on-surface font-bold uppercase tracking-wider">Perusahaan</span>
<ul class="flex flex-col gap-bold-space-sm">
<li><a class="font-bold-body-md text-bold-on-surface-variant hover:text-bold-primary transition-colors" href="#beranda">Tentang AgriTernak</a></li>
<li><a class="font-bold-body-md text-bold-on-surface-variant hover:text-bold-primary transition-colors" href="#keunggulan">Keunggulan Operasional</a></li>
<li><a class="font-bold-body-md text-bold-on-surface-variant hover:text-bold-primary transition-colors" href="#faq">Pusat Bantuan &amp; FAQ</a></li>
<li><a class="font-bold-body-md text-bold-on-surface-variant hover:text-bold-primary transition-colors" href="#kontak">Hubungi Mitra Kerja</a></li>
</ul>
</div>
<div class="lg:col-span-4 flex flex-col gap-bold-space-md">
<span class="font-bold-label-lg text-label-lg text-bold-on-surface font-bold uppercase tracking-wider">Hubungi Operasional</span>
<div class="flex flex-col gap-bold-space-sm font-bold-body-md text-body-md text-bold-on-surface-variant">
<div class="flex items-start gap-bold-space-sm">
<span class="material-symbols-outlined text-[20px] text-bold-primary shrink-0">location_on</span>
<span>Sentra Agribisnis Terpadu, Jl. Agro Industri No. 42, Bogor, Jawa Barat</span>
</div>
<div class="flex items-center gap-bold-space-sm">
<span class="material-symbols-outlined text-[20px] text-bold-primary shrink-0">call</span>
<span>+62 821 8920 4100</span>
</div>
<div class="flex items-center gap-bold-space-sm">
<span class="material-symbols-outlined text-[20px] text-bold-primary shrink-0">mail</span>
<span>halo@agriternak.id</span>
</div>
</div>
<div class="flex items-center gap-bold-space-sm pt-bold-space-xs">
<a aria-label="WhatsApp Kami" class="w-9 h-9 rounded-bold-lg bg-bold-surface-container flex items-center justify-center text-bold-on-surface-variant hover:bg-bold-primary hover:text-white transition-colors" href="https://wa.me/6282189204100" rel="noopener noreferrer" target="_blank">
<span class="material-symbols-outlined text-[18px]">chat</span>
</a>
<a aria-label="Lokasi Farm" class="w-9 h-9 rounded-bold-lg bg-bold-surface-container flex items-center justify-center text-bold-on-surface-variant hover:bg-bold-primary hover:text-white transition-colors" href="#kontak">
<span class="material-symbols-outlined text-[18px]">map</span>
</a>
<a aria-label="Forum Diskusi Peternak" class="w-9 h-9 rounded-bold-lg bg-bold-surface-container flex items-center justify-center text-bold-on-surface-variant hover:bg-bold-primary hover:text-white transition-colors" href="#faq">
<span class="material-symbols-outlined text-[18px]">forum</span>
</a>
</div>
</div>
</div>
<div class="mt-bold-space-2xl pt-bold-space-lg flex flex-col md:flex-row items-center justify-between gap-bold-space-md border-t border-bold-surface-container-high/60">
<span class="font-bold-label-md text-label-md text-bold-on-surface-variant">© 2025 PT AgriTernak Presisi Nusantara. Seluruh Hak Cipta Dilindungi.</span>
<div class="flex items-center gap-bold-space-lg">
<a class="font-bold-label-md text-label-md text-bold-on-surface-variant hover:text-bold-primary transition-colors" href="#faq">Kebijakan Privasi</a>
<a class="font-bold-label-md text-label-md text-bold-on-surface-variant hover:text-bold-primary transition-colors" href="#faq">Syarat &amp; Ketentuan</a>
<a class="font-bold-label-md text-label-md text-bold-on-surface-variant hover:text-bold-primary transition-colors" href="#teknologi">Sertifikasi IoT</a>
</div>
</div>
</div>
</footer>
<!-- FLOATING ACTION BUTTONS (DIPOSISIKAN BERSIH TANPA TUMPAH TINDIH) -->
<!-- Left: Floating AI Button -->
<div class="fixed bottom-6 left-6 z-40">
<button aria-label="Buka Chat AI" class="group flex items-center gap-bold-space-sm h-14 pl-2.5 pr-4 rounded-bold-full bg-bold-surface-container-lowest/95 backdrop-blur-xl shadow-xl hover:shadow-2xl border border-bold-surface-container-high hover:border-bold-primary transition-all active:scale-95" id="agriAiBtn" onclick="toggleAiModal()" type="button">
<div class="relative w-10 h-10 rounded-bold-full bg-bold-primary flex items-center justify-center text-bold-on-primary">
<span class="material-symbols-outlined text-[22px]">smart_toy</span>
<span class="absolute -top-0.5 -right-0.5 flex h-3 w-3">
<span class="animate-ping absolute inline-flex h-full w-full rounded-bold-full bg-bold-mint-neon opacity-75"></span>
<span class="relative inline-flex rounded-bold-full h-3 w-3 bg-bold-mint-neon"></span>
</span>
</div>
<div class="flex flex-col text-left">
<span class="font-bold-label-lg text-xs md:text-sm text-bold-on-surface font-bold leading-tight">Tanya AgriAI</span>
<span class="font-bold-mono-telemetry text-[11px] text-emerald-600 font-semibold">Online • Telemetri Aktif</span>
</div>
</button>
</div>
<!-- Right: Floating WhatsApp Button & Label -->
<div class="fixed bottom-6 right-6 z-40 flex items-center gap-bold-space-sm">
<div class="hidden lg:flex items-center px-3.5 py-1.5 rounded-bold-full bg-bold-surface-container-lowest/90 backdrop-blur-md border border-bold-surface-container-high shadow-md pointer-events-none">
<span class="font-bold-label-md text-xs text-bold-on-surface font-semibold">Konsultasi Dokter Hewan</span>
</div>
<button aria-label="Buka Chat WhatsApp" class="relative w-14 h-14 rounded-bold-full bg-[#10B981] hover:bg-[#059669] text-white flex items-center justify-center shadow-xl hover:scale-105 active:scale-95 transition-all" onclick="toggleWaPopup()">
<span class="material-symbols-outlined text-[28px]">chat</span>
<span class="absolute top-0 right-0 flex h-3.5 w-3.5">
<span class="animate-ping absolute inline-flex h-full w-full rounded-bold-full bg-white opacity-75"></span>
<span class="relative inline-flex rounded-bold-full h-3.5 w-3.5 bg-white"></span>
</span>
</button>
</div>
<!-- MODAL INTERAKTIF: TANYA AGRIAI -->
<div class="hidden fixed inset-0 z-50 flex items-end sm:items-center justify-center p-4 bg-slate-900/60 backdrop-blur-xs" id="aiModal">
<div class="bg-bold-surface rounded-bold-3xl w-full max-w-lg shadow-2xl border border-bold-surface-container-high overflow-hidden flex flex-col max-h-[85vh] transition-all transform animate-fadeIn">
<!-- Modal Header -->
<div class="bg-bold-primary text-bold-on-primary p-4 px-6 flex items-center justify-between">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-bold-full bg-white/20 flex items-center justify-center">
<span class="material-symbols-outlined text-[22px]">smart_toy</span>
</div>
<div>
<h3 class="font-bold-headline-sm text-base font-bold">AgriAI Livestock Assistant</h3>
<span class="font-bold-mono-telemetry text-xs text-bold-secondary-fixed flex items-center gap-1.5">
<span class="w-2 h-2 rounded-bold-full bg-bold-secondary-fixed animate-pulse"></span> Mode Diagnostik Online
            </span>
</div>
</div>
<button aria-label="Tutup Modal AI" class="w-8 h-8 rounded-bold-full hover:bg-white/20 flex items-center justify-center transition-colors" onclick="toggleAiModal()">
<span class="material-symbols-outlined text-[22px]">close</span>
</button>
</div>
<!-- Modal Body (Chat Logs) -->
<div class="p-4 overflow-y-auto space-y-3 bg-bold-surface flex-1 custom-scroll max-h-[380px]" id="aiChatMessages">
<div class="flex items-start gap-2.5">
<div class="w-7 h-7 rounded-bold-full bg-bold-primary/20 flex items-center justify-center text-bold-primary shrink-0 mt-0.5">
<span class="material-symbols-outlined text-[16px]">smart_toy</span>
</div>
<div class="bg-bold-surface-container p-3 rounded-bold-2xl rounded-tl-none max-w-[85%] text-sm text-bold-on-surface leading-relaxed">
            Halo Peternak Mitra! Saya <strong>AgriAI</strong>. Saya dapat menganalisis rasio pakan (FCR), formulasi silase, atau rekomendasi kandang IoT. Ada yang ingin Anda konsultasikan?
          </div>
</div>
<div class="flex justify-end">
<div class="bg-bold-primary text-white p-3 rounded-bold-2xl rounded-tr-none max-w-[85%] text-sm leading-relaxed">
            Berapa estimasi bobot harian (ADG) sapi potong Simmental dengan pakan konsentrat AgriMint?
          </div>
</div>
<div class="flex items-start gap-2.5">
<div class="w-7 h-7 rounded-bold-full bg-bold-primary/20 flex items-center justify-center text-bold-primary shrink-0 mt-0.5">
<span class="material-symbols-outlined text-[16px]">smart_toy</span>
</div>
<div class="bg-bold-surface-container p-3 rounded-bold-2xl rounded-tl-none max-w-[85%] text-sm text-bold-on-surface leading-relaxed">
            Dengan protokol formulasi pakan fermentasi protein 16% AgriMint, rata-rata <em>Average Daily Gain</em> (ADG) sapi Simmental mencapai <strong>1.45 hingga 1.68 kg/hari</strong> dengan indeks mortalitas di bawah 0.8%.
          </div>
</div>
</div>
<!-- Quick prompts -->
<div class="px-4 py-2 bg-bold-surface-container-low flex gap-2 overflow-x-auto text-xs whitespace-nowrap border-t border-bold-surface-container-high/40">
<button class="px-2.5 py-1 bg-bold-surface rounded-bold-full border border-bold-outline-variant/40 hover:bg-bold-primary hover:text-white transition-colors" onclick="sendQuickAiPrompt('Berapa modal awal kandang closed house?')">Estimasi Modal Kandang</button>
<button class="px-2.5 py-1 bg-bold-surface rounded-bold-full border border-bold-outline-variant/40 hover:bg-bold-primary hover:text-white transition-colors" onclick="sendQuickAiPrompt('Bagaimana cara klaim asuransi ternak?')">Klaim Asuransi</button>
<button class="px-2.5 py-1 bg-bold-surface rounded-bold-full border border-bold-outline-variant/40 hover:bg-bold-primary hover:text-white transition-colors" onclick="sendQuickAiPrompt('Syarat kemitraan kambing etawa?')">Syarat Etawa</button>
</div>
<!-- Modal Input -->
<form class="p-3 bg-bold-surface border-t border-bold-surface-container-high flex gap-2" id="aiChatForm" onsubmit="handleAiSubmit(event)">
<input class="flex-1 h-11 px-4 rounded-bold-xl bg-bold-surface-container text-bold-on-surface text-sm outline-none focus:ring-2 focus:ring-bold-primary border-none" id="aiChatInput" placeholder="Tanyakan seputar nutrisi, IoT kandang, atau bibit..." type="text"/>
<button class="h-11 px-4 rounded-bold-xl bg-bold-primary text-white hover:bg-bold-primary-container font-semibold transition-all flex items-center justify-center" type="submit">
<span class="material-symbols-outlined text-[20px]">send</span>
</button>
</form>
</div>
</div>
<!-- MODAL / POPUP: QUICK WHATSAPP CHAT -->
<div class="hidden fixed bottom-24 right-6 z-50 w-80 sm:w-96 bg-white rounded-bold-3xl shadow-2xl border border-bold-surface-container-high overflow-hidden animate-fadeIn" id="waPopupCard">
<!-- Header WA -->
<div class="bg-[#075E54] text-white p-4 flex items-center justify-between">
<div class="flex items-center gap-3">
<div class="relative w-10 h-10 rounded-bold-full bg-white/20 flex items-center justify-center">
<span class="material-symbols-outlined text-[24px]">support_agent</span>
<span class="absolute bottom-0 right-0 w-2.5 h-2.5 bg-bold-mint-neon rounded-bold-full border-2 border-[#075E54]"></span>
</div>
<div>
<h4 class="font-bold text-sm">Tim Konsultan AgriTernak</h4>
<span class="text-[11px] text-bold-secondary-fixed block">Online • +62 821 8920 4100</span>
</div>
</div>
<button aria-label="Tutup WhatsApp Popup" class="w-7 h-7 rounded-bold-full hover:bg-white/20 flex items-center justify-center text-white" onclick="toggleWaPopup()">
<span class="material-symbols-outlined text-[18px]">close</span>
</button>
</div>
<!-- Chat preview content -->
<div class="p-4 bg-[#E5DDD5] space-y-2 text-xs">
<div class="bg-white p-3 rounded-bold-xl rounded-tl-none shadow-xs text-slate-800 leading-relaxed max-w-[90%]">
        Halo! Ada yang bisa kami bantu seputar kemitraan peternakan terintegrasi atau survey lokasi kandang?
        <div class="text-[10px] text-slate-400 text-right mt-1">Baru saja</div>
</div>
</div>
<!-- Form input to redirect to WhatsApp -->
<div class="p-3 bg-white border-t border-slate-200">
<div class="flex flex-col gap-2">
<textarea class="w-full text-xs p-2.5 rounded-bold-xl border border-slate-300 focus:border-[#10B981] outline-none resize-none" id="waQuickMessage" placeholder="Tulis pesan cepat Anda di sini..." rows="2">Halo AgriTernak, saya tertarik untuk konsultasi kemitraan peternakan modern.</textarea>
<button class="w-full h-10 rounded-bold-xl bg-[#25D366] hover:bg-[#1ebc5a] text-white font-bold text-xs flex items-center justify-center gap-2 shadow-sm transition-all active:scale-98" onclick="sendToWhatsapp()">
<span class="material-symbols-outlined text-[18px]">send</span> Kirim ke WhatsApp (+62 821 8920 4100)
        </button>
</div>
</div>
</div>
<!-- TOAST NOTIFIKASI SUKSES -->
<div class="fixed top-6 right-6 z-50 hidden max-w-md bg-white border-l-4 border-bold-mint-neon shadow-2xl rounded-bold-2xl p-4 transition-all duration-300 transform translate-y-[-20px]" id="toastSuccess">
<div class="flex items-start gap-3">
<div class="w-9 h-9 rounded-bold-full bg-bold-secondary-fixed/50 text-bold-primary flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-[22px]">check_circle</span>
</div>
<div class="flex-1">
<h4 class="font-bold text-sm text-bold-on-surface">Pendaftaran Berhasil Dikirim!</h4>
<p class="text-xs text-bold-on-surface-variant mt-0.5 leading-relaxed" id="toastMessage">Spesialis peternakan AgriMint akan menghubungi kontak WhatsApp Anda dalam waktu maksimal 1x24 jam.</p>
</div>
<button class="text-slate-400 hover:text-slate-700" onclick="dismissToast()">
<span class="material-symbols-outlined text-[18px]">close</span>
</button>
</div>
</div>
<!-- SCRIPT INTERAKTIVITAS PRODUKSI -->
<script>
    // 1. Mobile Menu Toggle
    const mobileMenuBtn = document.getElementById('mobileMenuBtn');
    const mobileMenuDropdown = document.getElementById('mobileMenuDropdown');
    const mobileMenuIcon = document.getElementById('mobileMenuIcon');
    const mobileNavLinks = document.querySelectorAll('.mobile-nav-link');

    if (mobileMenuBtn) {
      mobileMenuBtn.addEventListener('click', () => {
        const isClosed = mobileMenuDropdown.classList.contains('hidden');
        if (isClosed) {
          mobileMenuDropdown.classList.remove('hidden');
          mobileMenuIcon.textContent = 'close';
        } else {
          mobileMenuDropdown.classList.add('hidden');
          mobileMenuIcon.textContent = 'menu';
        }
      });

      mobileNavLinks.forEach(link => {
        link.addEventListener('click', () => {
          mobileMenuDropdown.classList.add('hidden');
          mobileMenuIcon.textContent = 'menu';
        });
      });
    }

    // 2. FAQ Accordion Vanilla JS (Dengan State aria-expanded & rotasi icon)
    const faqButtons = document.querySelectorAll('#faq-accordion-group .faq-btn');
    faqButtons.forEach(button => {
      button.addEventListener('click', () => {
        const panel = button.nextElementSibling;
        const icon = button.querySelector('.material-symbols-outlined');
        const isExpanded = button.getAttribute('aria-expanded') === 'true';

        // Tutup item FAQ lainnya
        faqButtons.forEach(otherBtn => {
          if (otherBtn !== button) {
            otherBtn.setAttribute('aria-expanded', 'false');
            otherBtn.nextElementSibling.classList.add('hidden');
            const otherIcon = otherBtn.querySelector('.material-symbols-outlined');
            if (otherIcon) otherIcon.classList.remove('rotate-180');
          }
        });

        // Toggle item yang diklik
        if (isExpanded) {
          button.setAttribute('aria-expanded', 'false');
          panel.classList.add('hidden');
          icon.classList.remove('rotate-180');
        } else {
          button.setAttribute('aria-expanded', 'true');
          panel.classList.remove('hidden');
          icon.classList.add('rotate-180');
        }
      });
    });

    // 3. Floating AI Modal Controls
    const aiModal = document.getElementById('aiModal');
    function toggleAiModal() {
      if (aiModal.classList.contains('hidden')) {
        aiModal.classList.remove('hidden');
        document.getElementById('aiChatInput')?.focus();
      } else {
        aiModal.classList.add('hidden');
      }
    }

    function handleAiSubmit(e) {
      e.preventDefault();
      const input = document.getElementById('aiChatInput');
      const val = input.value.trim();
      if (!val) return;

      appendAiMessage(val, true);
      input.value = '';

      setTimeout(() => {
        const botAnswers = [
          "Data telemetri mendeteksi bahwa formula nutrisi pakan presisi dapat memangkas FCR hingga 18% pada siklus 90 hari.",
          "Tim teknisi kami siap melakukan survey lahan dan instalasi biosensor kandang. Silakan lengkapi form kemitraan di section Kontak.",
          "Setiap hewan mitra mendapatkan perlindungan rekam medis berbasis chip RFID dan jaminan buy-back 100% saat panen."
        ];
        const randomAnswer = botAnswers[Math.floor(Math.random() * botAnswers.length)];
        appendAiMessage(randomAnswer, false);
      }, 600);
    }

    function sendQuickAiPrompt(text) {
      appendAiMessage(text, true);
      setTimeout(() => {
        appendAiMessage("Informasi mengenai: '" + text + "' dapat langsung dijadwalkan bersama analis bisnis peternakan melalui formulir atau WhatsApp kami (+62 821 8920 4100).", false);
      }, 500);
    }

    function appendAiMessage(text, isUser) {
      const chatBox = document.getElementById('aiChatMessages');
      const msgDiv = document.createElement('div');
      if (isUser) {
        msgDiv.className = "flex justify-end";
        msgDiv.innerHTML = `<div class="bg-bold-primary text-white p-3 rounded-bold-2xl rounded-tr-none max-w-[85%] text-sm leading-relaxed">${escapeHtml(text)}</div>`;
      } else {
        msgDiv.className = "flex items-start gap-2.5";
        msgDiv.innerHTML = `
          <div class="w-7 h-7 rounded-bold-full bg-bold-primary/20 flex items-center justify-center text-bold-primary shrink-0 mt-0.5">
            <span class="material-symbols-outlined text-[16px]">smart_toy</span>
          </div>
          <div class="bg-bold-surface-container p-3 rounded-bold-2xl rounded-tl-none max-w-[85%] text-sm text-bold-on-surface leading-relaxed">
            ${escapeHtml(text)}
          </div>
        `;
      }
      chatBox.appendChild(msgDiv);
      chatBox.scrollTop = chatBox.scrollHeight;
    }

    function escapeHtml(string) {
      const div = document.createElement('div');
      div.innerText = string;
      return div.innerHTML;
    }

    // 4. WhatsApp Quick Popup Controls
    const waPopupCard = document.getElementById('waPopupCard');
    function toggleWaPopup() {
      if (waPopupCard.classList.contains('hidden')) {
        waPopupCard.classList.remove('hidden');
      } else {
        waPopupCard.classList.add('hidden');
      }
    }

    function sendToWhatsapp() {
      const msg = document.getElementById('waQuickMessage').value.trim();
      const phone = '6282189204100';
      const url = `https://wa.me/${phone}?text=${encodeURIComponent(msg)}`;
      window.open(url, '_blank');
      toggleWaPopup();
    }

    // 5. Form Kemitraan Validation & Toast Feedback
    const kemitraanForm = document.getElementById('kemitraanForm');
    const toast = document.getElementById('toastSuccess');
    let toastTimeout;

    if (kemitraanForm) {
      kemitraanForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const nama = document.getElementById('nama_lengkap').value.trim();
        const wa = document.getElementById('kontak_wa').value.trim();
        const komoditas = document.getElementById('komoditas_select').value;

        if (!nama || !wa) {
          alert('Mohon lengkapi nama dan kontak WhatsApp Anda.');
          return;
        }

        const submitBtn = document.getElementById('submitFormBtn');
        submitBtn.disabled = true;
        submitBtn.innerHTML = `<span>Memproses Data...</span><span class="material-symbols-outlined text-[20px] animate-spin">sync</span>`;

        setTimeout(() => {
          submitBtn.disabled = false;
          submitBtn.innerHTML = `<span>Ajukan Evaluasi Kandang & Kemitraan</span><span class="material-symbols-outlined text-[20px]">assignment_turned_in</span>`;
          kemitraanForm.reset();

          showToast(`Terima kasih Bapak/Ibu ${nama}! Pengajuan evaluasi kandang untuk ${komoditas} telah diterima. Kami akan menghubungi ke WhatsApp ${wa} secepatnya.`);
        }, 800);
      });
    }

    function showToast(customMsg) {
      if (customMsg) {
        document.getElementById('toastMessage').textContent = customMsg;
      }
      toast.classList.remove('hidden');
      toast.classList.remove('translate-y-[-20px]');
      clearTimeout(toastTimeout);
      toastTimeout = setTimeout(() => {
        dismissToast();
      }, 6000);
    }

    function dismissToast() {
      toast.classList.add('translate-y-[-20px]');
      setTimeout(() => {
        toast.classList.add('hidden');
      }, 200);
    }
  </script>
</body></html>