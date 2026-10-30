<html class="scroll-smooth" lang="id"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>AgriTernak - Arctic Frost Precision Pasture &amp; AI IoT Livestock Platform</title>
<link href="https://fonts.googleapis.com" rel="preconnect"/>
<link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&amp;family=Plus+Jakarta+Sans:wght@500;600;700;800&amp;family=JetBrains+Mono:wght@400;500;600&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>


<style>
    @layer base {
      html { scroll-behavior: smooth; }
      body { -webkit-font-smoothing: antialiased; }
    }
    .frost-glass {
      background: rgba(255, 255, 255, 0.85);
      backdrop-filter: blur(16px);
      -webkit-backdrop-filter: blur(16px);
      border: 1px solid rgba(186, 230, 253, 0.45);
    }
    .frost-dark-glass {
      background: rgba(15, 23, 42, 0.88);
      backdrop-filter: blur(20px);
      -webkit-backdrop-filter: blur(20px);
      border: 1px solid rgba(56, 189, 248, 0.2);
    }
    .glow-cyan-border {
      border: 1px solid rgba(56, 189, 248, 0.3);
      box-shadow: 0 0 15px -3px rgba(56, 189, 248, 0.15);
    }
    /* Scrollbar */
    ::-webkit-scrollbar { width: 8px; }
    ::-webkit-scrollbar-track { background: #f0f9ff; }
    ::-webkit-scrollbar-thumb { background: #bae6fd; border-radius: 9999px; }
    ::-webkit-scrollbar-thumb:hover { background: #38bdf8; }
  </style>
<style>body.agriternak-futuristic-preview main section:not([data-webia-preview-hero]), body.agriternak-futuristic-preview main footer, body.agriternak-futuristic-preview > footer, body.agriternak-futuristic-preview aside { display:none!important; } body.agriternak-futuristic-preview main { padding-top:0!important; }</style>
@vite('resources/css/app.css')
</head>
<body class="bg-[#F8FAFC] text-slate-800 font-futuristic-sans selection:bg-futuristic-arctic-200 selection:text-futuristic-arctic-900 overflow-x-hidden relative{{ request()->boolean('preview') ? ' agriternak-futuristic-preview' : '' }}">
<!-- ================= TOP STATUS TICKER ================= -->
<aside class="sticky top-0 z-50 w-full bg-slate-950 text-slate-300 py-1.5 border-b border-cyan-900/40 text-xs font-futuristic-mono">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-wrap items-center justify-between gap-2">
<div class="flex items-center gap-3 overflow-x-auto no-scrollbar">
<span class="inline-flex items-center gap-1.5 text-cyan-400 font-medium">
<span class="w-2 h-2 rounded-full bg-cyan-400 animate-ping"></span>
          ARCTIC-CORE TELEMETRY: 99.98%
        </span>
<span class="text-slate-600 hidden sm:inline">|</span>
<span class="hidden sm:inline text-slate-300">LATENSI LORA-WAN: <span class="text-emerald-400 font-bold">14ms</span></span>
<span class="text-slate-600 hidden md:inline">|</span>
<span class="hidden md:inline text-slate-300">SENSOR NODE: <span class="text-cyan-300">14.820 AKTIF</span></span>
<span class="text-slate-600 hidden lg:inline">|</span>
<span class="hidden lg:inline text-cyan-300/80">EDGE AI: AP-ARCTIC-WEST1</span>
</div>
<div class="flex items-center gap-3 shrink-0">
<a class="text-cyan-400 hover:text-cyan-300 flex items-center gap-1 transition-colors text-[11px] uppercase tracking-wider font-semibold" href="#simulator">
<span>Live Feed</span>
<span class="material-symbols-outlined text-[14px]">arrow_downward</span>
</a>
<div class="h-3 w-px bg-slate-700"></div>
<div class="flex items-center gap-1 text-emerald-400 text-[11px]">
<span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
<span>SSL 256-BIT</span>
</div>
</div>
</div>
</aside>
<!-- ================= MAIN NAVBAR ================= -->
<header class="sticky top-[31px] z-40 w-full frost-glass transition-all duration-300 border-b border-sky-100 shadow-sm" id="main-navbar">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between gap-4">
<!-- Brand Logo -->
<a class="flex items-center gap-3 group focus:outline-none" href="#beranda">
<div class="w-11 h-11 rounded-xl bg-gradient-to-br from-futuristic-arctic-600 via-futuristic-arctic-700 to-slate-900 flex items-center justify-center text-white shadow-md shadow-sky-500/20 group-hover:scale-105 transition-transform duration-300 ring-1 ring-cyan-300/30">
<span class="material-symbols-outlined text-[26px]">potted_plant</span>
</div>
<div class="flex flex-col">
<span class="font-futuristic-display font-bold text-xl tracking-tight text-slate-900 group-hover:text-futuristic-arctic-600 transition-colors flex items-center gap-1.5">
            AgriTernak
            <span class="text-[10px] px-1.5 py-0.2 rounded-[0.25rem] bg-cyan-100 font-futuristic-mono text-cyan-800 border border-cyan-300">V4.2</span>
</span>
<span class="font-futuristic-mono text-[10px] text-futuristic-arctic-700 font-medium tracking-widest uppercase -mt-0.5">Arctic Frost AgTech</span>
</div>
</a>
<!-- Desktop Nav Menu -->
<nav class="hidden lg:flex items-center gap-1 bg-slate-100/80 p-1.5 rounded-xl border border-sky-200/60 font-medium text-sm text-slate-600" id="desktop-nav">
<a class="nav-link px-3.5 py-2 rounded-lg hover:text-futuristic-arctic-700 hover:bg-white transition-all text-futuristic-arctic-700 bg-white shadow-sm font-semibold" href="#beranda">Beranda</a>
<a class="nav-link px-3.5 py-2 rounded-lg hover:text-futuristic-arctic-700 hover:bg-white transition-all" href="#solusi">Solusi</a>
<a class="nav-link px-3.5 py-2 rounded-lg hover:text-futuristic-arctic-700 hover:bg-white transition-all" href="#simulator">Simulator IoT</a>
<a class="nav-link px-3.5 py-2 rounded-lg hover:text-futuristic-arctic-700 hover:bg-white transition-all" href="#teknologi">Teknologi</a>
<a class="nav-link px-3.5 py-2 rounded-lg hover:text-futuristic-arctic-700 hover:bg-white transition-all" href="#keunggulan">Keunggulan</a>
<a class="nav-link px-3.5 py-2 rounded-lg hover:text-futuristic-arctic-700 hover:bg-white transition-all" href="#faq">FAQ</a>
<a class="nav-link px-3.5 py-2 rounded-lg hover:text-futuristic-arctic-700 hover:bg-white transition-all" href="#kontak">Kontak</a>
</nav>
<!-- CTA Buttons & Mobile Hamburger -->
<div class="flex items-center gap-3">
<button class="hidden sm:inline-flex items-center gap-2 h-11 px-5 rounded-xl bg-gradient-to-r from-futuristic-arctic-600 to-futuristic-arctic-700 hover:from-futuristic-arctic-500 hover:to-futuristic-arctic-600 text-white font-semibold text-sm shadow-md shadow-sky-500/25 hover:shadow-lg hover:shadow-sky-500/35 transition-all duration-200 active:scale-95" onclick="openDemoModal()">
<span class="material-symbols-outlined text-[19px]">rocket_launch</span>
<span>Jadwalkan Demo</span>
</button>
<a class="hidden xl:inline-flex items-center justify-center w-11 h-11 rounded-xl bg-sky-100 hover:bg-sky-200 text-futuristic-arctic-700 transition-colors" href="#kontak" title="Hubungi CS Farm">
<span class="material-symbols-outlined text-[20px]">support_agent</span>
</a>
<!-- Mobile Menu Toggle Button -->
<button aria-label="Toggle Navigation Menu" class="lg:hidden p-2 rounded-xl text-slate-700 hover:bg-slate-100 focus:outline-none focus:ring-2 focus:ring-sky-500 transition-colors" id="mobile-menu-btn">
<span class="material-symbols-outlined text-[28px]" id="mobile-menu-icon">menu</span>
</button>
</div>
</div>
<!-- Mobile Drawer / Menu -->
<div class="hidden lg:hidden border-t border-sky-100 bg-white/95 backdrop-blur-xl px-4 pt-3 pb-6 space-y-2 shadow-xl animate-in slide-in-from-top" id="mobile-menu">
<div class="grid grid-cols-2 gap-2 text-sm font-medium">
<a class="mobile-nav-link p-3 rounded-lg bg-sky-50 text-futuristic-arctic-700 font-semibold flex items-center gap-2" href="#beranda">
<span class="material-symbols-outlined text-[18px]">home</span> Beranda
        </a>
<a class="mobile-nav-link p-3 rounded-lg hover:bg-slate-50 text-slate-700 flex items-center gap-2" href="#solusi">
<span class="material-symbols-outlined text-[18px]">precision_manufacturing</span> Solusi
        </a>
<a class="mobile-nav-link p-3 rounded-lg hover:bg-slate-50 text-slate-700 flex items-center gap-2" href="#simulator">
<span class="material-symbols-outlined text-[18px]">terminal</span> Simulator
        </a>
<a class="mobile-nav-link p-3 rounded-lg hover:bg-slate-50 text-slate-700 flex items-center gap-2" href="#teknologi">
<span class="material-symbols-outlined text-[18px]">memory</span> Teknologi
        </a>
<a class="mobile-nav-link p-3 rounded-lg hover:bg-slate-50 text-slate-700 flex items-center gap-2" href="#keunggulan">
<span class="material-symbols-outlined text-[18px]">stars</span> Keunggulan
        </a>
<a class="mobile-nav-link p-3 rounded-lg hover:bg-slate-50 text-slate-700 flex items-center gap-2" href="#faq">
<span class="material-symbols-outlined text-[18px]">help_center</span> FAQ
        </a>
</div>
<div class="pt-2 flex flex-col gap-2">
<a class="mobile-nav-link w-full py-2.5 text-center rounded-xl bg-slate-100 font-semibold text-slate-700 text-sm" href="#kontak">
          Kontak &amp; Layanan Wilayah
        </a>
<button class="w-full py-3 rounded-xl bg-futuristic-arctic-600 text-white font-semibold text-sm flex items-center justify-center gap-2 shadow" onclick="openDemoModal()">
<span class="material-symbols-outlined text-[20px]">calendar_today</span>
          Jadwalkan Konsultasi Blueprint
        </button>
</div>
</div>
</header>
<main>
<!-- ================= HERO SECTION (#beranda) ================= -->
<section data-webia-preview-hero class="relative pt-12 pb-20 md:pt-16 md:pb-28 overflow-hidden bg-gradient-to-b from-[#F0F9FF] via-white to-[#F8FAFC]" id="beranda">
<!-- Cyber Orbs & Grid Ambient Background -->
<div class="absolute top-0 left-1/4 -translate-x-1/2 w-96 h-96 bg-cyan-200/40 rounded-full blur-3xl pointer-events-none -z-10"></div>
<div class="absolute top-1/3 right-0 w-[550px] h-[550px] bg-sky-200/30 rounded-full blur-3xl pointer-events-none -z-10"></div>
<div class="absolute inset-0 bg-[radial-gradient(#38bdf8_1px,transparent_1px)] [background-size:24px_24px] opacity-15 pointer-events-none -z-10"></div>
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center">
<!-- Hero Left Column -->
<div class="lg:col-span-6 space-y-6">
<div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-cyan-100/80 border border-cyan-300 text-cyan-900 shadow-sm">
<span class="material-symbols-outlined text-futuristic-arctic-600 text-[18px]">satellite_alt</span>
<span class="font-futuristic-mono text-xs font-bold tracking-wide uppercase">Next-Gen Arctic Frost AgTech v4.2</span>
</div>
<h1 class="font-futuristic-display text-4xl sm:text-5xl lg:text-[54px] font-extrabold text-slate-900 tracking-tight leading-[1.12]">
              Platform AI &amp; IoT Peternakan: <span class="bg-clip-text text-transparent bg-gradient-to-r from-futuristic-arctic-600 via-sky-500 to-cyan-600">Automasi Presisi</span> Tanpa Kompromi
            </h1>
<p class="text-base sm:text-lg text-slate-600 leading-relaxed max-w-xl">
              Pantau biometrik ruminansia secara presisi, dinamika iklim mikro kandang, dan algoritma deteksi dini patogen 72 jam lebih cepat dengan toleransi kegagalan 0%.
            </p>
<!-- Action Buttons -->
<div class="flex flex-wrap items-center gap-3 pt-2">
<button class="inline-flex items-center justify-center gap-2.5 h-12 px-6 rounded-xl bg-gradient-to-r from-futuristic-arctic-600 to-futuristic-arctic-700 hover:from-futuristic-arctic-500 hover:to-futuristic-arctic-600 text-white font-semibold text-sm shadow-lg shadow-sky-500/25 hover:shadow-cyan-500/35 transition-all duration-200 active:scale-95" onclick="openDemoModal()">
<span class="material-symbols-outlined text-[20px]">calendar_month</span>
<span>Jadwalkan Demo AI Kandang</span>
</button>
<a class="inline-flex items-center justify-center gap-2 h-12 px-6 rounded-xl bg-white hover:bg-slate-50 text-slate-800 font-semibold text-sm border border-sky-200 shadow-sm transition-all hover:border-cyan-300 active:scale-95" href="#teknologi">
<span class="material-symbols-outlined text-futuristic-arctic-600 text-[20px]">hub</span>
<span>Lihat Arsitektur IoT</span>
</a>
</div>
<!-- Metric Callout Chips -->
<div class="grid grid-cols-3 gap-3 sm:gap-4 pt-6">
<div class="bg-white/90 backdrop-blur border border-sky-100 p-4 rounded-2xl shadow-sm hover:border-sky-300 transition-all hover:-translate-y-0.5">
<span class="font-futuristic-display text-2xl sm:text-3xl font-extrabold text-futuristic-arctic-600 block">-48%</span>
<span class="font-futuristic-mono text-[11px] text-slate-500 uppercase tracking-wider block mt-1 font-semibold">Mortalitas Ternak</span>
</div>
<div class="bg-white/90 backdrop-blur border border-sky-100 p-4 rounded-2xl shadow-sm hover:border-sky-300 transition-all hover:-translate-y-0.5">
<span class="font-futuristic-display text-2xl sm:text-3xl font-extrabold text-emerald-600 block">+26.4%</span>
<span class="font-futuristic-mono text-[11px] text-slate-500 uppercase tracking-wider block mt-1 font-semibold">Efisiensi Pakan FCR</span>
</div>
<div class="bg-white/90 backdrop-blur border border-sky-100 p-4 rounded-2xl shadow-sm hover:border-sky-300 transition-all hover:-translate-y-0.5">
<span class="font-futuristic-display text-2xl sm:text-3xl font-extrabold text-slate-900 block">72 Jam</span>
<span class="font-futuristic-mono text-[11px] text-slate-500 uppercase tracking-wider block mt-1 font-semibold">Deteksi Dini Wabah</span>
</div>
</div>
<!-- Trusted Badges -->
<div class="flex items-center gap-3 pt-2 text-xs text-slate-500">
<span class="flex items-center gap-1 text-slate-700 font-medium">
<span class="material-symbols-outlined text-emerald-500 text-[18px]">verified</span> ISO/IEC 27001 Teruji
              </span>
<span>•</span>
<span class="flex items-center gap-1 text-slate-700 font-medium">
<span class="material-symbols-outlined text-cyan-600 text-[18px]">sensors</span> LoRaWAN Alliance Member
              </span>
</div>
</div>
<!-- Hero Right Column: Futuristic Cyber HUD Mockup -->
<div class="lg:col-span-6 relative">
<div class="relative mx-auto rounded-3xl p-1 bg-gradient-to-br from-cyan-400/40 via-sky-600/30 to-slate-900/60 shadow-futuristic-cyber-glow">
<div class="frost-dark-glass text-slate-200 rounded-[22px] p-5 sm:p-6 shadow-2xl relative overflow-hidden">
<!-- HUD Ambient Scanline & Glow -->
<div class="absolute -right-20 -top-20 w-52 h-52 bg-cyan-500/20 rounded-full blur-2xl pointer-events-none"></div>
<!-- HUD Header -->
<div class="flex items-center justify-between pb-4 border-b border-slate-700/70 mb-5">
<div class="flex items-center gap-2.5">
<span class="relative flex h-3 w-3">
<span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-cyan-400 opacity-75"></span>
<span class="relative inline-flex rounded-full h-3 w-3 bg-cyan-400"></span>
</span>
<span class="font-futuristic-mono text-xs text-cyan-300 font-bold uppercase tracking-wider">HUD // TELEMETRI SENSOR ARCTIC</span>
</div>
<div class="flex items-center gap-2">
<span class="font-futuristic-mono text-[11px] bg-slate-800 text-cyan-300 px-2.5 py-1 rounded-md border border-cyan-800/80">KANDANG-BETA #04</span>
</div>
</div>
<!-- HUD Top Metrics Grid -->
<div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
<!-- Biometrics -->
<div class="bg-slate-800/70 border border-cyan-500/20 rounded-xl p-4 flex flex-col justify-between">
<div class="flex items-center justify-between text-slate-400 text-xs">
<span class="font-futuristic-mono tracking-wider">DENYUT KARDIA RATA-RATA</span>
<span class="material-symbols-outlined text-cyan-400 text-[18px]">ecg_heart</span>
</div>
<div class="my-2 flex items-baseline gap-2">
<span class="text-3xl font-futuristic-display font-extrabold text-white" id="hud-bpm">68</span>
<span class="font-futuristic-mono text-xs text-emerald-400">BPM (Optimal)</span>
</div>
<!-- Live Sparkline -->
<svg class="w-full h-8 text-cyan-400" fill="none" viewbox="0 0 160 32">
<path d="M0 16 L25 16 L35 4 L45 28 L55 12 L65 20 L75 16 L100 16 L110 2 L120 30 L130 14 L140 18 L160 16" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2"></path>
</svg>
</div>
<!-- Micro-Climate -->
<div class="bg-slate-800/70 border border-cyan-500/20 rounded-xl p-4 flex flex-col justify-between">
<div class="flex items-center justify-between text-slate-400 text-xs">
<span class="font-futuristic-mono tracking-wider">MIKRO IKLIM KANDANG</span>
<span class="material-symbols-outlined text-cyan-400 text-[18px]">device_thermostat</span>
</div>
<div class="my-2 flex items-baseline gap-2">
<span class="text-3xl font-futuristic-display font-extrabold text-white" id="hud-temp">22.4°C</span>
<span class="font-futuristic-mono text-xs text-cyan-300" id="hud-humidity">64% RH</span>
</div>
<div class="space-y-1">
<div class="flex justify-between text-[11px] font-futuristic-mono text-slate-400">
<span>Status Ventilasi Otomatis</span>
<span class="text-emerald-400 font-semibold">NORMAL</span>
</div>
<div class="w-full bg-slate-700 h-2 rounded-full overflow-hidden">
<div class="bg-gradient-to-r from-cyan-500 to-sky-400 h-full w-[64%]"></div>
</div>
</div>
</div>
</div>
<!-- HUD Lower Grid -->
<div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
<div class="bg-slate-800/60 border border-cyan-500/20 rounded-xl p-3.5">
<div class="flex items-center justify-between">
<span class="text-xs font-futuristic-mono text-slate-400">DISPENSER PAKAN SILO A</span>
<span class="material-symbols-outlined text-emerald-400 text-[16px]">precision_manufacturing</span>
</div>
<p class="text-xl font-bold font-futuristic-display text-white mt-1">Sisa: 84.6%</p>
<span class="text-[11px] font-futuristic-mono text-emerald-400 flex items-center gap-1 mt-1">
<span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span> Jadwal Auto Pakan: ON
                    </span>
</div>
<div class="bg-slate-800/60 border border-cyan-500/20 rounded-xl p-3.5">
<div class="flex items-center justify-between">
<span class="text-xs font-futuristic-mono text-slate-400">KADAR AMONIA (NH3)</span>
<span class="material-symbols-outlined text-cyan-400 text-[16px]">air</span>
</div>
<p class="text-xl font-bold font-futuristic-display text-cyan-300 mt-1" id="hud-nh3">3.8 PPM</p>
<span class="text-[11px] font-futuristic-mono text-slate-400 flex items-center gap-1 mt-1">
<span class="material-symbols-outlined text-[14px] text-emerald-400">check_circle</span> Aman (&lt; 10 PPM)
                    </span>
</div>
</div>
<!-- Console Stream Footer -->
<div class="bg-slate-950/80 border border-slate-800 rounded-lg p-3 font-futuristic-mono text-xs text-slate-400 flex items-center justify-between">
<div class="flex items-center gap-2 truncate">
<span class="text-cyan-400 font-bold">$</span>
<span class="truncate" id="hud-console-log">LOG [12:04:18] Ear-tag Node #B24 sync payload 100% verified.</span>
</div>
<span class="text-emerald-400 font-bold ml-2 shrink-0 text-[11px] px-2 py-0.5 bg-emerald-950/60 rounded-[0.25rem] border border-emerald-800">READY</span>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- ================= LIVE SIMULATOR WIDGET (#simulator) ================= -->
<section class="py-14 sm:py-20 bg-white border-y border-sky-100" id="simulator">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="bg-gradient-to-br from-slate-900 to-[#0F172A] text-white rounded-3xl p-6 sm:p-10 shadow-2xl relative overflow-hidden border border-cyan-500/20">
<div class="absolute -top-32 right-1/4 w-80 h-80 bg-cyan-500/10 rounded-full blur-3xl pointer-events-none"></div>
<!-- Section Header Inside Widget -->
<div class="flex flex-col md:flex-row md:items-end justify-between gap-6 pb-8 border-b border-slate-800">
<div>
<div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-cyan-950/80 border border-cyan-500/40 text-cyan-300 font-futuristic-mono text-xs uppercase mb-3">
<span class="w-2 h-2 rounded-full bg-cyan-400 animate-pulse"></span>
                LIVE TELEMETRY SIMULATOR
              </div>
<h2 class="font-futuristic-display text-2xl sm:text-3xl font-bold tracking-tight text-white">
                Data Feed Node Terdistribusi
              </h2>
<p class="text-slate-400 text-sm mt-1 max-w-xl">
                Simulasi aliran paket data sensor LoRaWAN dan inferensi model AI edge secara langsung.
              </p>
</div>
<!-- Controls Panel -->
<div class="flex flex-wrap items-center gap-3">
<div class="flex items-center gap-2 bg-slate-800/80 px-3 py-1.5 rounded-xl border border-slate-700 font-futuristic-mono text-xs text-slate-300">
<span class="w-2 h-2 rounded-full bg-emerald-400" id="sim-status-dot"></span>
<span>Status: <strong class="text-white" id="sim-status-text">Streaming (1s)</strong></span>
</div>
<button class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-gradient-to-r from-futuristic-arctic-600 to-sky-600 hover:from-futuristic-arctic-500 hover:to-sky-500 text-white font-medium text-xs shadow-md transition-all active:scale-95" id="toggle-sim-btn">
<span class="material-symbols-outlined text-[16px]" id="sim-btn-icon">pause</span>
<span id="sim-btn-text">Jeda Aliran Data</span>
</button>
<button class="p-2 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-300 hover:text-white transition-colors border border-slate-700" id="refresh-sim-btn" title="Paksa Refresh Node">
<span class="material-symbols-outlined text-[18px]">refresh</span>
</button>
</div>
</div>
<!-- Dynamic Metrics Cards -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-5 pt-8">
<!-- Card 1 -->
<div class="bg-slate-800/60 border border-slate-700/80 hover:border-cyan-500/40 transition-all rounded-2xl p-5 flex items-start gap-4">
<div class="w-12 h-12 rounded-xl bg-cyan-500/20 text-cyan-400 flex items-center justify-center shrink-0 border border-cyan-500/30">
<span class="material-symbols-outlined text-[24px]">sensors</span>
</div>
<div class="flex flex-col">
<span class="font-futuristic-mono text-xs text-slate-400 uppercase tracking-wider">Cluster Kandang Alpha</span>
<span class="font-futuristic-display font-bold text-lg text-white mt-1 transition-all" id="sim-node">Node #402: Normal</span>
<div class="flex items-center gap-1.5 font-futuristic-mono text-xs text-cyan-300 mt-2">
<span class="material-symbols-outlined text-[16px] text-emerald-400">solar_power</span>
<span id="sim-batt">Baterai: 98.4% (Solar Recharge)</span>
</div>
</div>
</div>
<!-- Card 2 -->
<div class="bg-slate-800/60 border border-slate-700/80 hover:border-emerald-500/40 transition-all rounded-2xl p-5 flex items-start gap-4">
<div class="w-12 h-12 rounded-xl bg-emerald-500/20 text-emerald-400 flex items-center justify-center shrink-0 border border-emerald-500/30">
<span class="material-symbols-outlined text-[24px]">query_stats</span>
</div>
<div class="flex flex-col">
<span class="font-futuristic-mono text-xs text-slate-400 uppercase tracking-wider">Indeks Konversi Pakan</span>
<span class="font-futuristic-display font-bold text-lg text-white mt-1 transition-all" id="sim-fcr">FCR Projected: 1.40</span>
<div class="flex items-center gap-1.5 font-futuristic-mono text-xs text-emerald-400 mt-2">
<span class="material-symbols-outlined text-[16px]">trending_up</span>
<span id="sim-target">+0.04 Efisiensi Target Q3</span>
</div>
</div>
</div>
<!-- Card 3 -->
<div class="bg-slate-800/60 border border-slate-700/80 hover:border-sky-500/40 transition-all rounded-2xl p-5 flex items-start gap-4">
<div class="w-12 h-12 rounded-xl bg-sky-500/20 text-sky-400 flex items-center justify-center shrink-0 border border-sky-500/30">
<span class="material-symbols-outlined text-[24px]">verified_user</span>
</div>
<div class="flex flex-col">
<span class="font-futuristic-mono text-xs text-slate-400 uppercase tracking-wider">AI Diagnostic Guard</span>
<span class="font-futuristic-display font-bold text-lg text-white mt-1" id="sim-alert">Alert: 0 Anomali Kritis</span>
<div class="flex items-center gap-1.5 font-futuristic-mono text-xs text-slate-300 mt-2">
<span class="material-symbols-outlined text-[16px] text-cyan-400">check_circle</span>
<span id="sim-scan">4.250 Ternak Dipindai (Clear)</span>
</div>
</div>
</div>
</div>
<!-- Real-Time Packet Visualizer Stream -->
<div class="mt-6 pt-5 border-t border-slate-800/80 flex flex-wrap items-center justify-between gap-4 font-futuristic-mono text-xs text-slate-400">
<div class="flex items-center gap-2">
<span class="text-cyan-400 font-semibold">STREAM PACKET:</span>
<span class="text-slate-300" id="sim-packet-stream">HEX: 0x4A82F • TEMP: 22.4°C • HR: 68 • RSSI: -62dBm</span>
</div>
<div class="flex items-center gap-4 text-[11px]">
<span class="text-slate-400">FREQ: 923.2 MHz</span>
<span class="text-emerald-400">CRC VALID</span>
</div>
</div>
</div>
</div>
</section>
<!-- ================= SOLUSI PETERNAKAN (#solusi) ================= -->
<section class="py-20 md:py-28 bg-[#F8FAFC]" id="solusi">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="text-center max-w-3xl mx-auto mb-16">
<div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-sky-100 text-futuristic-arctic-700 font-futuristic-mono text-xs uppercase font-bold tracking-wider mb-3">
            KOMPREHENSIF &amp; MODULAR
          </div>
<h2 class="font-futuristic-display text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">
            Solusi Peternakan Skala Komersial
          </h2>
<p class="text-slate-600 text-base sm:text-lg mt-3">
            Tingkatkan produktivitas breeding dan fattening dengan perangkat keras berdaya tahan ekstrem dan analitik prediktif awan.
          </p>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
<!-- Solusi 1 -->
<div class="bg-white rounded-2xl p-7 border border-sky-100 shadow-futuristic-frost-glass hover:shadow-xl hover:border-cyan-300 transition-all duration-300 group flex flex-col justify-between">
<div>
<div class="w-14 h-14 rounded-2xl bg-sky-50 text-futuristic-arctic-600 flex items-center justify-center mb-6 group-hover:scale-110 group-hover:bg-futuristic-arctic-600 group-hover:text-white transition-all duration-300">
<span class="material-symbols-outlined text-[30px]">contactless</span>
</div>
<h3 class="font-futuristic-display text-xl font-bold text-slate-900 mb-2">Smart Tag &amp; Collar Biometrik</h3>
<p class="text-slate-600 text-sm leading-relaxed mb-4">
                Identifikasi NFC/LoRa ultra-ringan dengan sensor gravitasi 3-sumbu untuk memantau frekuensi ruminasi, pola istirahat, dan waktu makan otomatis.
              </p>
<ul class="space-y-2 text-xs text-slate-600 font-medium">
<li class="flex items-center gap-2">
<span class="material-symbols-outlined text-futuristic-arctic-600 text-[16px]">check_circle</span>
                  Baterai tahan 5+ tahun tanpa penggantian
                </li>
<li class="flex items-center gap-2">
<span class="material-symbols-outlined text-futuristic-arctic-600 text-[16px]">check_circle</span>
                  Standar kedap air IP69K (tahan cuci bertekanan)
                </li>
</ul>
</div>
<div class="mt-6 pt-4 border-t border-slate-100 flex items-center justify-between">
<span class="font-futuristic-mono text-xs text-futuristic-arctic-700 font-semibold">AKURASI 98.2%</span>
<a class="text-futuristic-arctic-600 hover:text-futuristic-arctic-700 font-semibold text-xs flex items-center gap-1 group-hover:translate-x-1 transition-transform" href="#kontak">
                Spesifikasi <span class="material-symbols-outlined text-[14px]">arrow_forward</span>
</a>
</div>
</div>
<!-- Solusi 2 -->
<div class="bg-white rounded-2xl p-7 border border-sky-100 shadow-futuristic-frost-glass hover:shadow-xl hover:border-cyan-300 transition-all duration-300 group flex flex-col justify-between">
<div>
<div class="w-14 h-14 rounded-2xl bg-sky-50 text-futuristic-arctic-600 flex items-center justify-center mb-6 group-hover:scale-110 group-hover:bg-futuristic-arctic-600 group-hover:text-white transition-all duration-300">
<span class="material-symbols-outlined text-[30px]">scale</span>
</div>
<h3 class="font-futuristic-display text-xl font-bold text-slate-900 mb-2">Walk-Over Weighing Otomatis</h3>
<p class="text-slate-600 text-sm leading-relaxed mb-4">
                Platform timbang dinamik yang mengukur penambahan bobot harian (ADG) setiap kali sapi melintas menuju minum tanpa membuat ternak stres.
              </p>
<ul class="space-y-2 text-xs text-slate-600 font-medium">
<li class="flex items-center gap-2">
<span class="material-symbols-outlined text-futuristic-arctic-600 text-[16px]">check_circle</span>
                  Penghitungan Average Daily Gain (ADG) instan
                </li>
<li class="flex items-center gap-2">
<span class="material-symbols-outlined text-futuristic-arctic-600 text-[16px]">check_circle</span>
                  Sinkronisasi langsung dengan RFID reader
                </li>
</ul>
</div>
<div class="mt-6 pt-4 border-t border-slate-100 flex items-center justify-between">
<span class="font-futuristic-mono text-xs text-futuristic-arctic-700 font-semibold">TOLERANSI ±0.3 KG</span>
<a class="text-futuristic-arctic-600 hover:text-futuristic-arctic-700 font-semibold text-xs flex items-center gap-1 group-hover:translate-x-1 transition-transform" href="#kontak">
                Spesifikasi <span class="material-symbols-outlined text-[14px]">arrow_forward</span>
</a>
</div>
</div>
<!-- Solusi 3 -->
<div class="bg-white rounded-2xl p-7 border border-sky-100 shadow-futuristic-frost-glass hover:shadow-xl hover:border-cyan-300 transition-all duration-300 group flex flex-col justify-between">
<div>
<div class="w-14 h-14 rounded-2xl bg-sky-50 text-futuristic-arctic-600 flex items-center justify-center mb-6 group-hover:scale-110 group-hover:bg-futuristic-arctic-600 group-hover:text-white transition-all duration-300">
<span class="material-symbols-outlined text-[30px]">hvac</span>
</div>
<h3 class="font-futuristic-display text-xl font-bold text-slate-900 mb-2">Automasi Kandang Tertutup</h3>
<p class="text-slate-600 text-sm leading-relaxed mb-4">
                Sistem kontrol sirkulasi udara tunnel dan evaporative misting dengan algoritma THI (Temperature-Humidity Index) untuk mencegah heat stress.
              </p>
<ul class="space-y-2 text-xs text-slate-600 font-medium">
<li class="flex items-center gap-2">
<span class="material-symbols-outlined text-futuristic-arctic-600 text-[16px]">check_circle</span>
                  Kompensasi kecepatan angin otomatis
                </li>
<li class="flex items-center gap-2">
<span class="material-symbols-outlined text-futuristic-arctic-600 text-[16px]">check_circle</span>
                  Sensor Amonia (NH3) &amp; Karbon Dioksida (CO2)
                </li>
</ul>
</div>
<div class="mt-6 pt-4 border-t border-slate-100 flex items-center justify-between">
<span class="font-futuristic-mono text-xs text-futuristic-arctic-700 font-semibold">ZERO HEAT STRESS</span>
<a class="text-futuristic-arctic-600 hover:text-futuristic-arctic-700 font-semibold text-xs flex items-center gap-1 group-hover:translate-x-1 transition-transform" href="#kontak">
                Spesifikasi <span class="material-symbols-outlined text-[14px]">arrow_forward</span>
</a>
</div>
</div>
</div>
</div>
</section>
<!-- ================= ARSITEKTUR & TEKNOLOGI BENTO GRID (#teknologi) ================= -->
<section class="py-20 md:py-28 bg-white border-t border-sky-100" id="teknologi">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12">
<div class="max-w-2xl">
<span class="font-futuristic-mono text-xs text-futuristic-arctic-700 uppercase tracking-widest font-bold block mb-2">ARSITEKTUR END-TO-END</span>
<h2 class="font-futuristic-display text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">
              Ekosistem Presisi Terintegrasi
            </h2>
<p class="text-slate-600 text-base mt-2">
              Modular, tangguh di medan berlumpur dan ekstrem, terhubung melalui protokol nirkabel LoRaWAN dengan enkripsi berstandar perbankan.
            </p>
</div>
<div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs font-futuristic-mono font-medium self-start md:self-auto">
<span class="material-symbols-outlined text-[18px] text-emerald-600">verified</span>
            Standar Ketahanan Industri IP68 / IP69K
          </div>
</div>
<!-- Bento Grid Layout -->
<div class="grid grid-cols-1 md:grid-cols-12 gap-6">
<!-- Bento 1 (Large 7 Cols) -->
<div class="md:col-span-7 bg-gradient-to-br from-sky-50/70 to-slate-50 border border-sky-200/80 rounded-3xl p-6 sm:p-8 flex flex-col justify-between shadow-sm hover:border-cyan-400 transition-colors">
<div>
<div class="w-12 h-12 rounded-xl bg-futuristic-arctic-600 text-white flex items-center justify-center mb-5 shadow-sm">
<span class="material-symbols-outlined text-[26px]">sensors</span>
</div>
<h3 class="font-futuristic-display text-2xl font-bold text-slate-900 mb-3">Smart Ear Tag &amp; Collar Biometrics</h3>
<p class="text-slate-600 text-sm sm:text-base leading-relaxed mb-6">
                Sensor biometrik telinga dengan micro-power engine (baterai bertahan hingga 5 tahun). Secara presisi merekam ritme ruminasi, suhu inti tubuh, siklus estrus (birahi ternak) dengan akurasi 96%, serta koordinat geofencing pastura.
              </p>
</div>
<div class="grid grid-cols-1 sm:grid-cols-3 gap-3 pt-4 border-t border-sky-100">
<div class="bg-white p-3.5 rounded-xl border border-sky-100">
<span class="font-futuristic-mono text-xs text-futuristic-arctic-700 font-bold block">ESTRUS DETECT</span>
<span class="text-xs text-slate-700 font-medium">Alert 18 jam pra-ovulasi</span>
</div>
<div class="bg-white p-3.5 rounded-xl border border-sky-100">
<span class="font-futuristic-mono text-xs text-futuristic-arctic-700 font-bold block">RUMINASI</span>
<span class="text-xs text-slate-700 font-medium">Frekuensi kunyah harian</span>
</div>
<div class="bg-white p-3.5 rounded-xl border border-sky-100">
<span class="font-futuristic-mono text-xs text-futuristic-arctic-700 font-bold block">GEOFENCE</span>
<span class="text-xs text-slate-700 font-medium">Batas pastura virtual</span>
</div>
</div>
</div>
<!-- Bento 2 (5 Cols) -->
<div class="md:col-span-5 bg-gradient-to-br from-cyan-900 to-slate-900 text-white rounded-3xl p-6 sm:p-8 flex flex-col justify-between shadow-lg border border-cyan-500/20">
<div>
<div class="w-12 h-12 rounded-xl bg-cyan-500/20 text-cyan-400 flex items-center justify-center mb-5 border border-cyan-500/30">
<span class="material-symbols-outlined text-[26px]">air</span>
</div>
<h3 class="font-futuristic-display text-2xl font-bold text-white mb-3">Automasi Iklim Mikro Kandang</h3>
<p class="text-slate-300 text-sm leading-relaxed mb-6">
                Kendali aktuator terpusat yang mengatur ventilasi tunnel inverter, tirai otomatis, dan evaporative cooling pad saat indeks THI melonjak berbahaya.
              </p>
</div>
<div class="bg-slate-800/80 p-4 rounded-xl border border-cyan-500/30 flex items-center justify-between">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-cyan-400 text-[24px]">speed</span>
<span class="text-xs font-semibold text-slate-200">Ventilasi Adaptif</span>
</div>
<span class="font-futuristic-mono text-xs text-emerald-400 font-bold">PID CONTROL ACTIVE</span>
</div>
</div>
<!-- Bento 3 (5 Cols) -->
<div class="md:col-span-5 bg-gradient-to-br from-slate-900 to-slate-950 text-white rounded-3xl p-6 sm:p-8 flex flex-col justify-between shadow-lg border border-cyan-500/20">
<div>
<div class="w-12 h-12 rounded-xl bg-cyan-400/20 text-cyan-300 flex items-center justify-center mb-5 border border-cyan-400/30">
<span class="material-symbols-outlined text-[26px]">biotech</span>
</div>
<h3 class="font-futuristic-display text-2xl font-bold text-white mb-3">Prediktif AI Feed &amp; Genetika</h3>
<p class="text-slate-300 text-sm leading-relaxed mb-6">
                Algoritma machine learning menghitung formula nutrisi konsentrat harian berbasis kurva kenaikan bobot, cuaca lingkungan, dan profil silsilah bibit unggul.
              </p>
</div>
<div class="bg-slate-800/80 p-3.5 rounded-xl border border-slate-700 flex items-center justify-between font-futuristic-mono text-xs">
<span class="text-slate-300">Model: FeedGen-v4</span>
<span class="text-cyan-400 font-bold">R² = 0.96 (Akurat)</span>
</div>
</div>
<!-- Bento 4 (Large 7 Cols) -->
<div class="md:col-span-7 bg-gradient-to-br from-sky-50/70 to-slate-50 border border-sky-200/80 rounded-3xl p-6 sm:p-8 flex flex-col justify-between shadow-sm hover:border-cyan-400 transition-colors">
<div>
<div class="w-12 h-12 rounded-xl bg-slate-900 text-cyan-400 flex items-center justify-center mb-5 shadow-sm">
<span class="material-symbols-outlined text-[26px]">flight_takeoff</span>
</div>
<h3 class="font-futuristic-display text-2xl font-bold text-slate-900 mb-3">Drone Patroli &amp; Deteksi Dini Visual</h3>
<p class="text-slate-600 text-sm sm:text-base leading-relaxed mb-6">
                Penerbangan otonom drone termal infra-merah. Mendeteksi peradangan kuku (lameness), suhu demam gerombolan ternak di padang gembala, serta memverifikasi tutupan biomassa rumput pastura dengan indeks vegetasi NDVI.
              </p>
</div>
<div class="grid grid-cols-2 gap-3 pt-4 border-t border-sky-100">
<div class="bg-white p-3 rounded-xl border border-sky-100 flex items-center gap-2.5">
<span class="material-symbols-outlined text-futuristic-arctic-600 text-[20px]">save_as</span>
<span class="text-xs font-semibold text-slate-800">Analisis Termografi</span>
</div>
<div class="bg-white p-3 rounded-xl border border-sky-100 flex items-center gap-2.5">
<span class="material-symbols-outlined text-emerald-600 text-[20px]">grass</span>
<span class="text-xs font-semibold text-slate-800">Biomassa NDVI Pastura</span>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- ================= KEUNGGULAN OPERASIONAL (#keunggulan) ================= -->
<section class="py-20 md:py-28 bg-[#F0F9FF]" id="keunggulan">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
<div class="lg:col-span-5 space-y-6">
<span class="font-futuristic-mono text-xs text-futuristic-arctic-700 font-bold uppercase tracking-widest block">MENGAPA AGRITERNAK</span>
<h2 class="font-futuristic-display text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight leading-tight">
              Investasi AgTech dengan Payback Period Terukur
            </h2>
<p class="text-slate-600 text-base leading-relaxed">
              Bukan sekadar gadget, melainkan ekosistem terpadu yang telah terbukti menghasilkan ROI positif dalam waktu kurang dari satu tahun pada peternakan skala menengah hingga korporasi besar.
            </p>
<div class="space-y-4 pt-2">
<div class="flex items-start gap-3.5">
<div class="w-8 h-8 rounded-lg bg-futuristic-arctic-600 text-white flex items-center justify-center shrink-0 mt-0.5">
<span class="material-symbols-outlined text-[18px]">verified</span>
</div>
<div>
<h4 class="font-bold text-slate-900 text-sm">Offline First Architecture</h4>
<p class="text-xs text-slate-600 mt-0.5 leading-relaxed">Edge server kandang tetap beroperasi 100% saat sinyal internet putus. Data disinkronkan saat terhubung kembali.</p>
</div>
</div>
<div class="flex items-start gap-3.5">
<div class="w-8 h-8 rounded-lg bg-futuristic-arctic-600 text-white flex items-center justify-center shrink-0 mt-0.5">
<span class="material-symbols-outlined text-[18px]">engineering</span>
</div>
<div>
<h4 class="font-bold text-slate-900 text-sm">Dukungan Teknisi On-Site</h4>
<p class="text-xs text-slate-600 mt-0.5 leading-relaxed">Jaringan tim teknis di Jawa, Sumatera, NTB, dan Sulawesi siap melakukan pemasangan dan troubleshooting.</p>
</div>
</div>
<div class="flex items-start gap-3.5">
<div class="w-8 h-8 rounded-lg bg-futuristic-arctic-600 text-white flex items-center justify-center shrink-0 mt-0.5">
<span class="material-symbols-outlined text-[18px]">savings</span>
</div>
<div>
<h4 class="font-bold text-slate-900 text-sm">Reduksi Biaya Pakan &amp; Obat 30%+</h4>
<p class="text-xs text-slate-600 mt-0.5 leading-relaxed">Deteksi penyakit dini memangkas pengeluaran antibiotik dan mengurangi susut bobot ternak secara signifikan.</p>
</div>
</div>
</div>
<div class="pt-2">
<button class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-futuristic-arctic-600 hover:bg-futuristic-arctic-700 text-white font-semibold text-sm shadow transition-all" onclick="openDemoModal()">
<span>Pelajari Kalkulasi ROI Peternakan Anda</span>
<span class="material-symbols-outlined text-[18px]">arrow_forward</span>
</button>
</div>
</div>
<!-- Feature Metric Highlights -->
<div class="lg:col-span-7 grid grid-cols-1 sm:grid-cols-2 gap-5">
<div class="bg-white p-6 rounded-2xl border border-sky-200/80 shadow-sm flex flex-col justify-between">
<div>
<span class="font-futuristic-mono text-xs text-futuristic-arctic-700 font-bold uppercase">PAYBACK PERIOD</span>
<p class="text-4xl font-futuristic-display font-extrabold text-slate-900 mt-2">9 - 14</p>
<p class="text-slate-600 text-sm font-semibold">Bulan Balik Modal</p>
<p class="text-xs text-slate-500 mt-2 leading-relaxed">
                  Rata-rata audit dari 65+ peternakan komersial mitra di seluruh Indonesia.
                </p>
</div>
<div class="mt-4 pt-3 border-t border-slate-100 flex items-center gap-1.5 text-xs text-emerald-600 font-semibold">
<span class="material-symbols-outlined text-[16px]">trending_up</span> Terbukti Efektif
              </div>
</div>
<div class="bg-white p-6 rounded-2xl border border-sky-200/80 shadow-sm flex flex-col justify-between">
<div>
<span class="font-futuristic-mono text-xs text-futuristic-arctic-700 font-bold uppercase">JANGKAUAN SINYAL</span>
<p class="text-4xl font-futuristic-display font-extrabold text-slate-900 mt-2">15 Km</p>
<p class="text-slate-600 text-sm font-semibold">Radius Gateway LoRaWAN</p>
<p class="text-xs text-slate-500 mt-2 leading-relaxed">
                  Cakupan tanpa blindspot bahkan di kontur padang gembala perbukitan.
                </p>
</div>
<div class="mt-4 pt-3 border-t border-slate-100 flex items-center gap-1.5 text-xs text-emerald-600 font-semibold">
<span class="material-symbols-outlined text-[16px]">cell_tower</span> Low Power Long Range
              </div>
</div>
<div class="bg-white p-6 rounded-2xl border border-sky-200/80 shadow-sm flex flex-col justify-between">
<div>
<span class="font-futuristic-mono text-xs text-futuristic-arctic-700 font-bold uppercase">AKURASI DETEKSI BIRAHI</span>
<p class="text-4xl font-futuristic-display font-extrabold text-slate-900 mt-2">96.4%</p>
<p class="text-slate-600 text-sm font-semibold">Timing Inseminasi Tepat</p>
<p class="text-xs text-slate-500 mt-2 leading-relaxed">
                  Meningkatkan conception rate kawin suntik (IB) hingga 23% lebih tinggi.
                </p>
</div>
<div class="mt-4 pt-3 border-t border-slate-100 flex items-center gap-1.5 text-xs text-emerald-600 font-semibold">
<span class="material-symbols-outlined text-[16px]">favorite</span> Reproduksi Maksimal
              </div>
</div>
<div class="bg-white p-6 rounded-2xl border border-sky-200/80 shadow-sm flex flex-col justify-between">
<div>
<span class="font-futuristic-mono text-xs text-futuristic-arctic-700 font-bold uppercase">KETAHANAN PERANGKAT</span>
<p class="text-4xl font-futuristic-display font-extrabold text-slate-900 mt-2">5+ Thn</p>
<p class="text-slate-600 text-sm font-semibold">Baterai &amp; Garansi Hardware</p>
<p class="text-xs text-slate-500 mt-2 leading-relaxed">
                  Casing polimer polycarbonate tahan benturan tanduk ternak dan gigitan.
                </p>
</div>
<div class="mt-4 pt-3 border-t border-slate-100 flex items-center gap-1.5 text-xs text-emerald-600 font-semibold">
<span class="material-symbols-outlined text-[16px]">shield</span> Mil-Spec Toughness
              </div>
</div>
</div>
</div>
</div>
</section>
<!-- ================= FAQ SECTION (#faq) ================= -->
<section class="py-20 md:py-28 bg-white border-t border-sky-100" id="faq">
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="text-center mb-16">
<span class="font-futuristic-mono text-xs text-futuristic-arctic-700 font-bold uppercase tracking-widest block mb-2">KNOWLEDGE BASE // FAQ</span>
<h2 class="font-futuristic-display text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">
            Pertanyaan Umum Sistem AgTech
          </h2>
<p class="text-slate-600 text-base mt-2 max-w-xl mx-auto">
            Transparansi teknis mengenai proses implementasi, keandalan jaringan, dan pengembalian investasi hardware-software.
          </p>
</div>
<!-- Accordion Container -->
<div class="space-y-4" id="faq-accordion-container">
<!-- FAQ Item 1 -->
<div class="faq-item bg-[#F8FAFC] border border-sky-200/80 rounded-2xl overflow-hidden transition-all duration-300">
<button class="faq-toggle w-full px-6 py-5 text-left flex items-center justify-between gap-4 focus:outline-none" type="button">
<span class="font-futuristic-display font-bold text-slate-900 text-base sm:text-lg">Bagaimana cara integrasi sensor IoT dengan kandang konvensional yang sudah ada?</span>
<span class="faq-icon material-symbols-outlined text-futuristic-arctic-600 transition-transform duration-300 text-[24px]">expand_more</span>
</button>
<div class="faq-content max-h-0 overflow-hidden transition-all duration-300 px-6">
<p class="text-slate-600 text-sm leading-relaxed pb-5 border-t border-sky-100/60 pt-3">
                Sistem AgriTernak dirancang secara modular retrofitting tanpa perlu merombak struktur fisik bangunan kandang. Gateway LoRaWAN industrial kami mencakup radius hingga 15 km di area terbuka dan dapat dipasang langsung pada tiang struktural kandang, menghubungkan modul kendali kipas, feeding dispenser, dan ear-tag secara plug-and-play dalam waktu kurang dari 48 jam.
              </p>
</div>
</div>
<!-- FAQ Item 2 -->
<div class="faq-item bg-[#F8FAFC] border border-sky-200/80 rounded-2xl overflow-hidden transition-all duration-300">
<button class="faq-toggle w-full px-6 py-5 text-left flex items-center justify-between gap-4 focus:outline-none" type="button">
<span class="font-futuristic-display font-bold text-slate-900 text-base sm:text-lg">Apakah sistem AI dapat mendeteksi wabah penyakit sebelum gejala klinis muncul?</span>
<span class="faq-icon material-symbols-outlined text-futuristic-arctic-600 transition-transform duration-300 text-[24px]">expand_more</span>
</button>
<div class="faq-content max-h-0 overflow-hidden transition-all duration-300 px-6">
<p class="text-slate-600 text-sm leading-relaxed pb-5 border-t border-sky-100/60 pt-3">
                Ya. Melalui kombinasi biometrik continuous-monitoring (perubahan mikro pada suhu kulit, penurunan waktu kunyah/ruminasi 15-20%, dan anomali pola langkah ternak), model prediktif kami mampu mendeteksi prodromal stage (gejala awal pra-klinis) hingga 48 - 72 jam sebelum demam tampak kasat mata oleh perawat ternak.
              </p>
</div>
</div>
<!-- FAQ Item 3 -->
<div class="faq-item bg-[#F8FAFC] border border-sky-200/80 rounded-2xl overflow-hidden transition-all duration-300">
<button class="faq-toggle w-full px-6 py-5 text-left flex items-center justify-between gap-4 focus:outline-none" type="button">
<span class="font-futuristic-display font-bold text-slate-900 text-base sm:text-lg">Bagaimana jika koneksi internet di area peternakan tidak stabil atau terpencil?</span>
<span class="faq-icon material-symbols-outlined text-futuristic-arctic-600 transition-transform duration-300 text-[24px]">expand_more</span>
</button>
<div class="faq-content max-h-0 overflow-hidden transition-all duration-300 px-6">
<p class="text-slate-600 text-sm leading-relaxed pb-5 border-t border-sky-100/60 pt-3">
                Setiap instalasi dilengkapi unit Edge Computing lokal (AP-Edge Hub). Logika automasi iklim kandang, pembagian pakan terjadwal, dan peringatan sirine lokal tetap beroperasi mandiri 100% tanpa internet. Saat koneksi seluler atau satelit pulih, seluruh data telemetri historis akan melakukan sinkronisasi delta otomatis ke cloud tanpa kehilangan data sedikit pun.
              </p>
</div>
</div>
<!-- FAQ Item 4 -->
<div class="faq-item bg-[#F8FAFC] border border-sky-200/80 rounded-2xl overflow-hidden transition-all duration-300">
<button class="faq-toggle w-full px-6 py-5 text-left flex items-center justify-between gap-4 focus:outline-none" type="button">
<span class="font-futuristic-display font-bold text-slate-900 text-base sm:text-lg">Berapa perkiraan efisiensi biaya operasional setelah implementasi automasi?</span>
<span class="faq-icon material-symbols-outlined text-futuristic-arctic-600 transition-transform duration-300 text-[24px]">expand_more</span>
</button>
<div class="faq-content max-h-0 overflow-hidden transition-all duration-300 px-6">
<p class="text-slate-600 text-sm leading-relaxed pb-5 border-t border-sky-100/60 pt-3">
                Berdasarkan telemetri 65+ peternakan komersial mitra kami di Jawa &amp; Sumatera, peternak mencatatkan penurunan pemborosan pakan sebesar 18-24%, eliminasi kematian massal akibat heat stress hingga 0%, dan penurunan biaya antibiotik kuratif sebesar 35% dengan rata-rata Payback Period investasi dalam 9 hingga 14 bulan.
              </p>
</div>
</div>
<!-- FAQ Item 5 -->
<div class="faq-item bg-[#F8FAFC] border border-sky-200/80 rounded-2xl overflow-hidden transition-all duration-300">
<button class="faq-toggle w-full px-6 py-5 text-left flex items-center justify-between gap-4 focus:outline-none" type="button">
<span class="font-futuristic-display font-bold text-slate-900 text-base sm:text-lg">Apakah staf kandang kami diberikan pelatihan hingga mahir mengoperasikan sistem?</span>
<span class="faq-icon material-symbols-outlined text-futuristic-arctic-600 transition-transform duration-300 text-[24px]">expand_more</span>
</button>
<div class="faq-content max-h-0 overflow-hidden transition-all duration-300 px-6">
<p class="text-slate-600 text-sm leading-relaxed pb-5 border-t border-sky-100/60 pt-3">
                Tentu. Setiap paket implementasi menyertakan 14 hari pendampingan on-site intensif untuk operator kandang, pelatihan dashboard manajemen untuk pengelola, buku panduan berbahasa Indonesia, serta grup respons darurat prioritas 24/7.
              </p>
</div>
</div>
</div>
</div>
</section>
<!-- ================= CTA BANNER & KONTAK SECTION (#kontak) ================= -->
<section class="py-20 md:py-28 bg-[#F0F9FF] border-t border-sky-100" id="kontak">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<!-- Big CTA Card -->
<div class="bg-gradient-to-br from-slate-950 via-slate-900 to-cyan-950 text-white rounded-3xl p-8 sm:p-14 shadow-2xl relative overflow-hidden border border-cyan-500/30 mb-16">
<div class="absolute -right-24 -bottom-24 w-96 h-96 bg-cyan-500/10 rounded-full blur-3xl pointer-events-none"></div>
<div class="max-w-2xl relative z-10 space-y-4">
<span class="font-futuristic-mono text-xs text-cyan-400 font-bold uppercase tracking-wider block">AKSELERASI SMART FARMING</span>
<h2 class="font-futuristic-display text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white tracking-tight">
              Mulai Digitalisasi Kandang Anda Hari Ini
            </h2>
<p class="text-slate-300 text-base leading-relaxed">
              Dapatkan blueprint arsitektur sensor gratis serta uji coba pilot project 30 hari untuk 100 ekor ternak pertama Anda tanpa risiko.
            </p>
<div class="flex flex-wrap items-center gap-4 pt-4">
<button class="h-12 px-7 rounded-xl bg-cyan-400 hover:bg-cyan-300 text-slate-950 font-bold text-sm transition-all shadow-lg shadow-cyan-400/25 active:scale-95 flex items-center gap-2" onclick="openDemoModal()">
<span class="material-symbols-outlined text-[20px]">architecture</span>
<span>Konsultasi Blueprint Gratis</span>
</button>
<a class="h-12 px-6 rounded-xl bg-slate-800 hover:bg-slate-700 text-white font-semibold text-sm border border-slate-700 transition-all flex items-center gap-2" href="https://wa.me/6282189204100?text=Halo%20AgriTernak%2C%20saya%20tertarik%20konsultasi%20sistem%20IoT%20peternakan" rel="noopener noreferrer" target="_blank">
<span class="material-symbols-outlined text-emerald-400 text-[20px]">chat</span>
<span>Chat via WhatsApp</span>
</a>
</div>
<div class="pt-4 flex items-center gap-2 text-xs font-futuristic-mono text-cyan-300/80">
<span class="material-symbols-outlined text-[16px] text-emerald-400">check_circle</span>
              Dukungan Teknisi On-Site Siaga di Seluruh Wilayah Indonesia
            </div>
</div>
</div>
<!-- Contact & Branch Details -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
<div class="bg-white p-6 rounded-2xl border border-sky-100 shadow-sm flex items-start gap-4">
<div class="w-12 h-12 rounded-xl bg-sky-100 text-futuristic-arctic-700 flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-[24px]">location_on</span>
</div>
<div>
<h4 class="font-bold text-slate-900 text-sm">Sentra Riset &amp; Operasional</h4>
<p class="text-xs text-slate-600 mt-1 leading-relaxed">Sentra Agribisnis Terpadu, Jl. Agro Industri No. 42, Bogor, Jawa Barat 16115</p>
</div>
</div>
<div class="bg-white p-6 rounded-2xl border border-sky-100 shadow-sm flex items-start gap-4">
<div class="w-12 h-12 rounded-xl bg-sky-100 text-futuristic-arctic-700 flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-[24px]">call</span>
</div>
<div>
<h4 class="font-bold text-slate-900 text-sm">Kontak Telepon &amp; Hotline</h4>
<p class="text-xs text-slate-600 mt-1 leading-relaxed">+62 (21) 8920-4100<br/>Hotline Darurat: +62 821 8920 4100</p>
</div>
</div>
<div class="bg-white p-6 rounded-2xl border border-sky-100 shadow-sm flex items-start gap-4">
<div class="w-12 h-12 rounded-xl bg-sky-100 text-futuristic-arctic-700 flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-[24px]">mail</span>
</div>
<div>
<h4 class="font-bold text-slate-900 text-sm">Email Resmi &amp; Kemitraan</h4>
<p class="text-xs text-slate-600 mt-1 leading-relaxed">halo@agriternak.id<br/>partnership@agriternak.id</p>
</div>
</div>
</div>
</div>
</section>
</main>
<!-- ================= FOOTER ================= -->
<footer class="bg-slate-950 text-slate-400 text-sm border-t border-slate-800">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-16 pb-12">
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-10">
<div class="lg:col-span-4 space-y-4">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-xl bg-futuristic-arctic-600 flex items-center justify-center text-white">
<span class="material-symbols-outlined text-[24px]">potted_plant</span>
</div>
<span class="font-futuristic-display font-bold text-xl text-white">AgriTernak</span>
</div>
<p class="text-xs leading-relaxed text-slate-400">
            Platform integrasi ekosistem peternakan pintar, pemantauan biometrik ruminansia real-time, dan automasi iklim kandang presisi terdepan di Indonesia.
          </p>
<div class="flex flex-wrap gap-2 pt-2">
<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-md bg-slate-900 border border-slate-800 font-futuristic-mono text-[11px] text-cyan-300">
<span class="material-symbols-outlined text-emerald-400 text-[14px]">verified</span> ISO 22000 Terakreditasi
            </span>
<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-md bg-slate-900 border border-slate-800 font-futuristic-mono text-[11px] text-cyan-300">
<span class="material-symbols-outlined text-cyan-400 text-[14px]">eco</span> Standar Bebas Hormon
            </span>
</div>
</div>
<div class="lg:col-span-2 space-y-3">
<span class="font-futuristic-mono text-xs font-bold text-slate-200 uppercase tracking-wider block">Solusi Produk</span>
<ul class="space-y-2 text-xs">
<li><a class="hover:text-cyan-400 transition-colors" href="#solusi">Sensor Leher &amp; Tag</a></li>
<li><a class="hover:text-cyan-400 transition-colors" href="#solusi">Timbangan Dinamis</a></li>
<li><a class="hover:text-cyan-400 transition-colors" href="#solusi">Ventilasi Pintar</a></li>
<li><a class="hover:text-cyan-400 transition-colors" href="#teknologi">Manajemen Pastura</a></li>
<li><a class="hover:text-cyan-400 transition-colors" href="#teknologi">Drone Patroli NDVI</a></li>
</ul>
</div>
<div class="lg:col-span-2 space-y-3">
<span class="font-futuristic-mono text-xs font-bold text-slate-200 uppercase tracking-wider block">Perusahaan</span>
<ul class="space-y-2 text-xs">
<li><a class="hover:text-cyan-400 transition-colors" href="#beranda">Tentang AgriTernak</a></li>
<li><a class="hover:text-cyan-400 transition-colors" href="#keunggulan">Keunggulan Bisnis</a></li>
<li><a class="hover:text-cyan-400 transition-colors" href="#faq">Pusat Bantuan &amp; FAQ</a></li>
<li><a class="hover:text-cyan-400 transition-colors" href="#kontak">Kemitraan Distributor</a></li>
<li><a class="hover:text-cyan-400 transition-colors" href="#kontak">Karier Engineer</a></li>
</ul>
</div>
<div class="lg:col-span-4 space-y-3">
<span class="font-futuristic-mono text-xs font-bold text-slate-200 uppercase tracking-wider block">Hubungi Tim Teknis</span>
<p class="text-xs text-slate-400">Tim konsultan IoT peternakan siap mendiskusikan kebutuhan kandang Anda.</p>
<div class="flex items-center gap-2 pt-1">
<a class="w-10 h-10 rounded-xl bg-slate-900 border border-slate-800 hover:border-cyan-400 flex items-center justify-center text-slate-300 hover:text-cyan-400 transition-colors" href="https://wa.me/6282189204100" target="_blank" title="WhatsApp Konsultan">
<span class="material-symbols-outlined text-[18px]">chat</span>
</a>
<a class="w-10 h-10 rounded-xl bg-slate-900 border border-slate-800 hover:border-cyan-400 flex items-center justify-center text-slate-300 hover:text-cyan-400 transition-colors" href="mailto:halo@agriternak.id" title="Email Resmi">
<span class="material-symbols-outlined text-[18px]">mail</span>
</a>
<a class="w-10 h-10 rounded-xl bg-slate-900 border border-slate-800 hover:border-cyan-400 flex items-center justify-center text-slate-300 hover:text-cyan-400 transition-colors" href="#kontak" title="Peta Lokasi Kantor">
<span class="material-symbols-outlined text-[18px]">map</span>
</a>
</div>
</div>
</div>
<div class="mt-12 pt-6 border-t border-slate-800/80 flex flex-col md:flex-row items-center justify-between gap-4 text-xs text-slate-500">
<p>© 2025 PT AgriTernak Presisi Nusantara. Hak Cipta Dilindungi Undang-Undang.</p>
<div class="flex items-center gap-6">
<a class="hover:text-slate-300 transition-colors" href="#">Kebijakan Privasi</a>
<a class="hover:text-slate-300 transition-colors" href="#">Syarat &amp; Ketentuan</a>
<a class="hover:text-slate-300 transition-colors" href="#">Sertifikasi Edge IoT</a>
</div>
</div>
</div>
</footer>
<!-- ================= FLOATING AI BUTTON (LEFT) ================= -->
<div class="fixed bottom-6 left-6 z-40">
<button class="group flex items-center gap-3 h-14 pl-3.5 pr-5 rounded-full bg-slate-900/90 hover:bg-slate-900 text-white backdrop-blur-xl border border-cyan-400/40 shadow-2xl transition-all duration-300 hover:scale-105 active:scale-95 focus:outline-none" id="floating-ai-btn" type="button">
<div class="relative w-10 h-10 rounded-full bg-gradient-to-tr from-cyan-500 to-sky-400 flex items-center justify-center text-slate-950 font-bold">
<span class="material-symbols-outlined text-[22px]">smart_toy</span>
<span class="absolute -top-0.5 -right-0.5 flex h-3 w-3">
<span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-cyan-300 opacity-75"></span>
<span class="relative inline-flex rounded-full h-3 w-3 bg-cyan-400"></span>
</span>
</div>
<div class="flex flex-col text-left">
<span class="font-futuristic-display text-xs font-bold text-white tracking-wide">Tanya AgriAI</span>
<span class="font-futuristic-mono text-[10px] text-cyan-300">Online • Telemetri Aktif</span>
</div>
</button>
</div>
<!-- ================= FLOATING WHATSAPP BUTTON (RIGHT) ================= -->
<div class="fixed bottom-6 right-6 z-40 flex items-center gap-2">
<!-- Popover Hint Badge -->
<div class="hidden md:flex items-center gap-2 px-3.5 py-2 rounded-full bg-white text-slate-800 text-xs font-medium border border-sky-200 shadow-lg animate-pulse" id="wa-pill">
<span class="w-2 h-2 rounded-full bg-emerald-500"></span>
<span>Konsultasi Dokter Hewan &amp; IoT</span>
</div>
<!-- WhatsApp Direct Trigger -->
<a aria-label="Chat WhatsApp Dokter Hewan" class="relative w-14 h-14 rounded-full bg-[#25D366] hover:bg-[#20ba59] text-white flex items-center justify-center shadow-lg shadow-emerald-500/30 hover:scale-105 active:scale-95 transition-all focus:outline-none" href="https://wa.me/6282189204100?text=Halo%20Dokter%20Hewan%20AgriTernak%2C%20saya%20ingin%20konsultasi%20kesehatan%20ternak%20dan%20implementasi%20sensor." rel="noopener noreferrer" target="_blank">
<span class="material-symbols-outlined text-[30px]">chat</span>
<span class="absolute top-0 right-0 flex h-3.5 w-3.5">
<span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-white opacity-75"></span>
<span class="relative inline-flex rounded-full h-3.5 w-3.5 bg-white"></span>
</span>
</a>
</div>
<!-- ================= MODAL: TANYA AGRIAI ASSISTANT ================= -->
<div class="fixed inset-0 z-50 hidden items-center justify-center p-4 bg-slate-950/70 backdrop-blur-md" id="ai-modal">
<div class="relative w-full max-w-lg bg-slate-900 border border-cyan-500/40 rounded-3xl shadow-2xl overflow-hidden flex flex-col max-h-[85vh] animate-in zoom-in-95 duration-200 text-white">
<!-- AI Header -->
<div class="p-5 border-b border-slate-800 bg-slate-950/80 flex items-center justify-between">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-xl bg-cyan-500 text-slate-950 flex items-center justify-center font-bold">
<span class="material-symbols-outlined text-[22px]">smart_toy</span>
</div>
<div>
<h3 class="font-futuristic-display font-bold text-sm text-white">AgriAI Kandang Assistant</h3>
<p class="font-futuristic-mono text-[10px] text-cyan-300">MODEL: ARCTIC-EDGE-DIAGNOSTIC-V2</p>
</div>
</div>
<button class="w-8 h-8 rounded-lg bg-slate-800 hover:bg-slate-700 flex items-center justify-center text-slate-300 hover:text-white" onclick="closeAiModal()">
<span class="material-symbols-outlined text-[18px]">close</span>
</button>
</div>
<!-- AI Chat Body -->
<div class="p-5 overflow-y-auto space-y-4 text-xs font-futuristic-sans flex-1" id="ai-chat-body">
<!-- Welcome Message -->
<div class="flex items-start gap-2.5">
<div class="w-7 h-7 rounded-lg bg-cyan-500/20 text-cyan-400 flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-[16px]">smart_toy</span>
</div>
<div class="bg-slate-800 p-3.5 rounded-2xl rounded-tl-sm border border-slate-700 text-slate-200 leading-relaxed max-w-[85%]">
            Halo! Saya asisten telemetri AgriAI. Seluruh 14.820 sensor kandang dalam kondisi sinkron. Apa data parameter atau diagnosis yang ingin Anda periksa?
          </div>
</div>
</div>
<!-- Quick Suggestion Prompts -->
<div class="px-5 py-2.5 bg-slate-950 border-t border-slate-800/80 flex flex-wrap gap-1.5">
<button class="text-[11px] px-2.5 py-1 rounded-full bg-slate-800 hover:bg-cyan-900/60 text-cyan-300 border border-slate-700 transition-colors" onclick="sendQuickPrompt('Cek suhu &amp; kelembapan kandang')">
          🌡️ Cek suhu kandang
        </button>
<button class="text-[11px] px-2.5 py-1 rounded-full bg-slate-800 hover:bg-cyan-900/60 text-cyan-300 border border-slate-700 transition-colors" onclick="sendQuickPrompt('Analisis proyeksi FCR pakan')">
          📊 Analisis FCR
        </button>
<button class="text-[11px] px-2.5 py-1 rounded-full bg-slate-800 hover:bg-cyan-900/60 text-cyan-300 border border-slate-700 transition-colors" onclick="sendQuickPrompt('Status baterai node LoRaWAN')">
          🔋 Baterai sensor
        </button>
</div>
<!-- AI Input Area -->
<div class="p-4 bg-slate-950 border-t border-slate-800 flex items-center gap-2">
<input class="flex-1 bg-slate-900 border border-slate-700 text-white rounded-xl px-4 py-2.5 text-xs focus:outline-none focus:border-cyan-400 font-futuristic-sans" id="ai-user-input" onkeydown="if(event.key === 'Enter') handleAiSend()" placeholder="Ketik pertanyaan diagnostik peternakan..." type="text"/>
<button class="w-10 h-10 rounded-xl bg-cyan-500 hover:bg-cyan-400 text-slate-950 font-bold flex items-center justify-center shrink-0 transition-colors" onclick="handleAiSend()">
<span class="material-symbols-outlined text-[18px]">send</span>
</button>
</div>
</div>
</div>
<!-- ================= MODAL: JADWALKAN DEMO & BLUEPRINT ================= -->
<div class="fixed inset-0 z-50 hidden items-center justify-center p-4 bg-slate-950/70 backdrop-blur-md" id="demo-modal">
<div class="relative w-full max-w-lg bg-white border border-sky-200 rounded-3xl shadow-2xl overflow-hidden p-6 sm:p-8 animate-in zoom-in-95 duration-200">
<div class="flex items-center justify-between pb-4 border-b border-sky-100 mb-6">
<div>
<span class="font-futuristic-mono text-xs text-futuristic-arctic-700 font-bold uppercase">PILOT PROJECT 30 HARI</span>
<h3 class="font-futuristic-display font-extrabold text-xl text-slate-900">Jadwalkan Demo AI &amp; Blueprint</h3>
</div>
<button class="w-8 h-8 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-600 flex items-center justify-center" onclick="closeDemoModal()">
<span class="material-symbols-outlined text-[18px]">close</span>
</button>
</div>
<form class="space-y-4 text-xs" id="demo-form" onsubmit="handleDemoSubmit(event)">
<div>
<label class="block font-semibold text-slate-700 mb-1">Nama Lengkap Peternak / Penanggung Jawab</label>
<input class="w-full rounded-xl border border-sky-200 px-3.5 py-2.5 text-slate-900 focus:outline-none focus:ring-2 focus:ring-sky-500" placeholder="Contoh: Hendra Wijaya" required="" type="text"/>
</div>
<div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
<div>
<label class="block font-semibold text-slate-700 mb-1">Nomor WhatsApp Aktif</label>
<input class="w-full rounded-xl border border-sky-200 px-3.5 py-2.5 text-slate-900 focus:outline-none focus:ring-2 focus:ring-sky-500" placeholder="08xxxxxxxxxx" required="" type="tel"/>
</div>
<div>
<label class="block font-semibold text-slate-700 mb-1">Populasi Ternak (Ekor)</label>
<select class="w-full rounded-xl border border-sky-200 px-3.5 py-2.5 text-slate-900 focus:outline-none focus:ring-2 focus:ring-sky-500">
<option>50 - 200 Ekor</option>
<option>201 - 1.000 Ekor</option>
<option>&gt; 1.000 Ekor (Feedlot Besar)</option>
</select>
</div>
</div>
<div>
<label class="block font-semibold text-slate-700 mb-1">Lokasi Peternakan (Kota / Provinsi)</label>
<input class="w-full rounded-xl border border-sky-200 px-3.5 py-2.5 text-slate-900 focus:outline-none focus:ring-2 focus:ring-sky-500" placeholder="Contoh: Malang, Jawa Timur" required="" type="text"/>
</div>
<div>
<label class="block font-semibold text-slate-700 mb-1">Fokus Digitalisasi Utama</label>
<select class="w-full rounded-xl border border-sky-200 px-3.5 py-2.5 text-slate-900 focus:outline-none focus:ring-2 focus:ring-sky-500">
<option>Monitoring Siklus Birahi &amp; Reproduksi</option>
<option>Automasi Ventilasi &amp; Iklim Kandang Tertutup</option>
<option>Timbang Otomatis &amp; Manajemen Pakan ADG</option>
<option>Solusi Komprehensif Seluruh Farm</option>
</select>
</div>
<div class="pt-2">
<button class="w-full py-3 rounded-xl bg-futuristic-arctic-600 hover:bg-futuristic-arctic-700 text-white font-bold text-sm shadow-md transition-all" type="submit">
            Kirim Permintaan Blueprint &amp; Demo
          </button>
</div>
<p class="text-[11px] text-center text-slate-500 mt-2">
          Tim teknisi kami akan menghubungi Anda dalam waktu maksimal 1x24 jam kerja.
        </p>
</form>
</div>
</div>
<!-- ================= JAVASCRIPT LOGIC ================= -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
      // 1. Mobile Menu Toggle
      const mobileBtn = document.getElementById('mobile-menu-btn');
      const mobileMenu = document.getElementById('mobile-menu');
      const mobileIcon = document.getElementById('mobile-menu-icon');
      const mobileLinks = document.querySelectorAll('.mobile-nav-link');

      if (mobileBtn && mobileMenu) {
        mobileBtn.addEventListener('click', () => {
          const isHidden = mobileMenu.classList.contains('hidden');
          if (isHidden) {
            mobileMenu.classList.remove('hidden');
            mobileIcon.textContent = 'close';
          } else {
            mobileMenu.classList.add('hidden');
            mobileIcon.textContent = 'menu';
          }
        });

        mobileLinks.forEach(link => {
          link.addEventListener('click', () => {
            mobileMenu.classList.add('hidden');
            mobileIcon.textContent = 'menu';
          });
        });
      }

      // 2. Active Nav Link on Scroll
      const sections = document.querySelectorAll('section[id]');
      const navLinks = document.querySelectorAll('#desktop-nav a');

      window.addEventListener('scroll', () => {
        let current = '';
        sections.forEach(section => {
          const sectionTop = section.offsetTop - 140;
          if (window.pageYOffset >= sectionTop) {
            current = section.getAttribute('id');
          }
        });

        navLinks.forEach(link => {
          link.classList.remove('bg-white', 'text-futuristic-arctic-700', 'shadow-sm', 'font-semibold');
          if (link.getAttribute('href') === `#${current}`) {
            link.classList.add('bg-white', 'text-futuristic-arctic-700', 'shadow-sm', 'font-semibold');
          }
        });
      });

      // 3. FAQ Accordion Toggle
      const faqItems = document.querySelectorAll('.faq-item');
      faqItems.forEach(item => {
        const toggle = item.querySelector('.faq-toggle');
        const content = item.querySelector('.faq-content');
        const icon = item.querySelector('.faq-icon');

        toggle.addEventListener('click', () => {
          const isOpen = content.style.maxHeight && content.style.maxHeight !== '0px';

          // Close all other items for neat accordion behavior
          faqItems.forEach(otherItem => {
            const otherContent = otherItem.querySelector('.faq-content');
            const otherIcon = otherItem.querySelector('.faq-icon');
            otherContent.style.maxHeight = '0px';
            if (otherIcon) otherIcon.style.transform = 'rotate(0deg)';
          });

          // Toggle current
          if (!isOpen) {
            content.style.maxHeight = content.scrollHeight + 'px';
            if (icon) icon.style.transform = 'rotate(180deg)';
          } else {
            content.style.maxHeight = '0px';
            if (icon) icon.style.transform = 'rotate(0deg)';
          }
        });
      });

      // 4. Live Telemetry Simulator Engine
      let simActive = true;
      const simNodeEl = document.getElementById('sim-node');
      const simFcrEl = document.getElementById('sim-fcr');
      const simBattEl = document.getElementById('sim-batt');
      const simPacketEl = document.getElementById('sim-packet-stream');
      const hudBpmEl = document.getElementById('hud-bpm');
      const hudTempEl = document.getElementById('hud-temp');
      const hudNh3El = document.getElementById('hud-nh3');
      const hudConsoleEl = document.getElementById('hud-console-log');
      const toggleSimBtn = document.getElementById('toggle-sim-btn');
      const simBtnIcon = document.getElementById('sim-btn-icon');
      const simBtnText = document.getElementById('sim-btn-text');
      const refreshSimBtn = document.getElementById('refresh-sim-btn');
      const simStatusDot = document.getElementById('sim-status-dot');
      const simStatusText = document.getElementById('sim-status-text');

      const simDataSteps = [
        { node: 'Node #402: Normal', fcr: 'FCR Projected: 1.40', batt: '98.4%', temp: '22.4°C', bpm: '68', nh3: '3.8 PPM', hex: '0x4A82F' },
        { node: 'Node #403: Normal', fcr: 'FCR Projected: 1.39', batt: '97.9%', temp: '22.6°C', bpm: '70', nh3: '4.1 PPM', hex: '0x4A910' },
        { node: 'Node #404: Kalibrasi AI', fcr: 'FCR Projected: 1.41', batt: '99.1%', temp: '22.3°C', bpm: '66', nh3: '3.5 PPM', hex: '0x4AB77' },
        { node: 'Node #405: Sinkronisasi', fcr: 'FCR Projected: 1.38', batt: '98.8%', temp: '22.1°C', bpm: '69', nh3: '3.9 PPM', hex: '0x4AC19' }
      ];
      let stepIndex = 0;

      function updateSimData() {
        stepIndex = (stepIndex + 1) % simDataSteps.length;
        const data = simDataSteps[stepIndex];
        
        if (simNodeEl) simNodeEl.textContent = data.node;
        if (simFcrEl) simFcrEl.textContent = data.fcr;
        if (simBattEl) simBattEl.textContent = `Baterai: ${data.batt} (Solar Recharge)`;
        if (hudBpmEl) hudBpmEl.textContent = data.bpm;
        if (hudTempEl) hudTempEl.textContent = data.temp;
        if (hudNh3El) hudNh3El.textContent = data.nh3;
        if (simPacketEl) {
          simPacketEl.textContent = `HEX: ${data.hex} • TEMP: ${data.temp} • HR: ${data.bpm} • RSSI: -${Math.floor(58 + Math.random() * 8)}dBm`;
        }
        if (hudConsoleEl) {
          const now = new Date().toTimeString().split(' ')[0];
          hudConsoleEl.textContent = `LOG [${now}] ${data.node} payload verified with 0 dropped frames.`;
        }
      }

      let simInterval = setInterval(() => {
        if (simActive) updateSimData();
      }, 2500);

      if (toggleSimBtn) {
        toggleSimBtn.addEventListener('click', () => {
          simActive = !simActive;
          if (simActive) {
            simBtnText.textContent = 'Jeda Aliran Data';
            simBtnIcon.textContent = 'pause';
            simStatusDot.className = 'w-2 h-2 rounded-full bg-emerald-400';
            simStatusText.textContent = 'Streaming (1s)';
          } else {
            simBtnText.textContent = 'Lanjutkan Aliran Data';
            simBtnIcon.textContent = 'play_arrow';
            simStatusDot.className = 'w-2 h-2 rounded-full bg-amber-400';
            simStatusText.textContent = 'Dijeda Manual';
          }
        });
      }

      if (refreshSimBtn) {
        refreshSimBtn.addEventListener('click', () => {
          updateSimData();
        });
      }

      // 5. Floating AI Modal Interactions
      const floatingAiBtn = document.getElementById('floating-ai-btn');
      if (floatingAiBtn) {
        floatingAiBtn.addEventListener('click', () => {
          openAiModal();
        });
      }
    });

    // Global Modal Functions
    function openAiModal() {
      const modal = document.getElementById('ai-modal');
      if (modal) {
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.getElementById('ai-user-input')?.focus();
      }
    }

    function closeAiModal() {
      const modal = document.getElementById('ai-modal');
      if (modal) {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
      }
    }

    function sendQuickPrompt(promptText) {
      const input = document.getElementById('ai-user-input');
      if (input) {
        input.value = promptText;
        handleAiSend();
      }
    }

    function handleAiSend() {
      const input = document.getElementById('ai-user-input');
      const chatBody = document.getElementById('ai-chat-body');
      if (!input || !chatBody) return;
      const query = input.value.trim();
      if (!query) return;

      // Append User Bubble
      const userBubble = document.createElement('div');
      userBubble.className = 'flex justify-end';
      userBubble.innerHTML = `
        <div class="bg-cyan-600 text-white p-3 rounded-2xl rounded-tr-sm max-w-[85%] text-xs">
          ${query}
        </div>
      `;
      chatBody.appendChild(userBubble);
      input.value = '';
      chatBody.scrollTop = chatBody.scrollHeight;

      // Generate AI Answer
      setTimeout(() => {
        let reply = "Semua sensor telemetri dalam zona aman.";
        const lower = query.toLowerCase();
        if (lower.includes('suhu') || lower.includes('kandang')) {
          reply = "Data Iklim Mikro Saat Ini: Suhu 22.4°C, Kelembapan 64% RH, Gas NH3 3.8 PPM (Level Sangat Sehat). Kipas inverter bekerja di efisiensi 62%.";
        } else if (lower.includes('fcr') || lower.includes('pakan')) {
          reply = "Model Machine Learning FeedGen mendeteksi FCR harian pada angka 1.40 (+0.04 lebih efisien dari target kuartal). Rasio konversi nutrisi terpantau stabil.";
        } else if (lower.includes('baterai') || lower.includes('node') || lower.includes('sensor')) {
          reply = "Semua 14.820 sensor tag aktif dengan rerata kapasitas baterai 98.4%. Panel pengisi daya surya beroperasi normal tanpa hambatan transmisi LoRaWAN.";
        } else {
          reply = `Telemetri untuk "${query}" telah diverifikasi oleh Edge Hub. Tidak ditemukan anomali fisiologis ternak. Tim kami siaga jika Anda butuh pendampingan langsung.`;
        }

        const aiBubble = document.createElement('div');
        aiBubble.className = 'flex items-start gap-2.5';
        aiBubble.innerHTML = `
          <div class="w-7 h-7 rounded-lg bg-cyan-500/20 text-cyan-400 flex items-center justify-center shrink-0">
            <span class="material-symbols-outlined text-[16px]">smart_toy</span>
          </div>
          <div class="bg-slate-800 p-3.5 rounded-2xl rounded-tl-sm border border-slate-700 text-slate-200 leading-relaxed max-w-[85%]">
            ${reply}
          </div>
        `;
        chatBody.appendChild(aiBubble);
        chatBody.scrollTop = chatBody.scrollHeight;
      }, 500);
    }

    // Demo Modal Functions
    function openDemoModal() {
      const modal = document.getElementById('demo-modal');
      if (modal) {
        modal.classList.remove('hidden');
        modal.classList.add('flex');
      }
    }

    function closeDemoModal() {
      const modal = document.getElementById('demo-modal');
      if (modal) {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
      }
    }

    function handleDemoSubmit(e) {
      e.preventDefault();
      alert('Terima kasih! Permintaan Blueprint & Demo Anda telah diterima. Tim ahli AgriTernak akan segera menghubungi nomor WhatsApp Anda.');
      closeDemoModal();
    }
  </script>
</body></html>