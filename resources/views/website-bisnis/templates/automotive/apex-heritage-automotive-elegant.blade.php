<!DOCTYPE html>

<html class="dark" lang="id"><head><meta charset="utf-8"/><meta content="width=device-width, initial-scale=1.0" name="viewport"/><meta content="web_standard" name="shell-type"/><link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/><link href="https://fonts.googleapis.com" rel="preconnect"/><link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/><link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&amp;family=Plus+Jakarta+Sans:ital,wght@0,300..800;1,300..800&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/><style>@layer base{html,body{margin:0;padding:0;}body{overscroll-behavior:none;}main>:first-child{margin-top:0!important;}main>:last-child{margin-bottom:0!important;}}::-webkit-scrollbar{display:none;}body.apex-heritage-preview > main > :not(#home), body.apex-heritage-preview > footer { display: none !important; } body.apex-heritage-preview > main { padding-top: 120px !important; }
</style><title>APEX Heritage &mdash; Elegant Automotive Collection</title>
@vite('resources/css/app.css')

<style>
html { scroll-behavior: smooth; scroll-padding-top: 120px; }
section[id], div[id] { scroll-margin-top: 120px; }
#financing-studio { scroll-margin-top: 120px; }
@media (max-width: 1279px) {
  header nav { display: none; }
}
</style>
<script>
// Indonesian-local display formatter. Calculator source values are preserved; UI values are shown in IDR.
function formatIDR(amount) { return 'Rp ' + Math.round(Number(amount) * 16000).toLocaleString('id-ID'); }
</script>
</head><body class="bg-heritage-surface-container-lowest font-heritage-body-md text-heritage-on-surface antialiased selection:bg-heritage-primary-container selection:text-heritage-on-primary-container{{ request()->boolean('preview') ? ' apex-heritage-preview' : '' }}"><header class="fixed top-0 w-full z-50 bg-heritage-surface-container-lowest/90 backdrop-blur-2xl shadow-[0_4px_30px_rgba(0,0,0,0.5)]"><div class="bg-heritage-surface-container-low/80 text-heritage-on-surface-variant font-heritage-label-technical text-heritage-label-technical uppercase"><div class="max-w-7xl mx-auto px-heritage-gutter flex items-center justify-between h-9"><div class="flex items-center gap-heritage-space-lg"><div class="flex items-center gap-heritage-space-xs"><span class="w-1.5 h-1.5 bg-heritage-primary rounded-heritage-full animate-pulse"></span><span>Mon - Sat: 09:00 - 19:00 WIB</span></div><span class="hidden lg:inline text-heritage-outline-variant">|</span><div class="hidden lg:flex items-center gap-heritage-space-xs"><span>Surabaya, East Java, Indonesia</span></div></div><div class="flex items-center gap-heritage-space-lg"><a class="text-heritage-primary hover:text-heritage-primary-fixed transition-colors flex items-center gap-heritage-space-xs" href="https://wa.me/?text=Hello%20Apex%20Heritage%2C%20I%20would%20like%20to%20make%20an%20inquiry."><span>Concierge:</span><span class="tracking-widest font-bold">Indonesia Concierge</span></a><span class="text-heritage-outline-variant">|</span><div class="flex items-center gap-heritage-space-sm"><span>IDR</span><span>•</span><span>WIB</span><span>•</span><span>EN</span></div></div></div></div><div class="h-20 max-w-7xl mx-auto px-heritage-gutter flex items-center justify-between"><a class="flex items-center gap-heritage-space-md group" data-path="home" href="#home"><img alt="Profile" class="w-8 h-8 rounded-heritage-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCwnz9XRxLkyGSBLSy-TvQH7gRCFDcEdsjJz_P5GTErjv1J1KM4YbCjQlg0Mpn15qz8M3mssl5zsiCV_h4CSauEtj9Uz71DHwVYg9SzHBa63VNdTGWg3KoPyOZ40K_tsXUwSVXeviRdPF_fqGe1F3QB0tITxjrN1qO-NymDKxicUT7yBofdOdyOphqkaEjwsBavQPIWx5AKEM7ibhkR5UqEPV7UghGDIbEk34ZS_SrR94v9t-b6D_Q4BQ"/><div class="flex flex-col"><span class="font-heritage-headline-sm text-heritage-headline-sm uppercase tracking-widest text-heritage-on-surface group-hover:text-heritage-primary transition-colors leading-none">Apex Heritage</span><span class="font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-outline tracking-[0.28em] mt-1">Automotive Atelier</span></div></a><nav class="hidden xl:flex items-center gap-heritage-space-lg font-heritage-label-ui text-heritage-label-ui uppercase tracking-wider" data-active-classes="text-heritage-primary font-bold"><a class="text-heritage-on-surface-variant hover:text-heritage-on-surface transition-colors py-2" data-path="inventory" href="#inventory">Inventory</a><a class="text-heritage-on-surface-variant hover:text-heritage-on-surface transition-colors py-2" data-path="vehicle-categories" href="#vehicle-categories">Vehicle Categories</a><a class="text-heritage-on-surface-variant hover:text-heritage-on-surface transition-colors py-2" data-path="bespoke-financing" href="#financing-studio">Bespoke Financing</a><a class="text-heritage-on-surface-variant hover:text-heritage-on-surface transition-colors py-2" data-path="vip-test-drive" href="#test-drive">VIP Test Drive</a><a class="text-heritage-on-surface-variant hover:text-heritage-on-surface transition-colors py-2" data-path="about-showroom" href="#about-showroom">About Showroom</a><a class="text-heritage-on-surface-variant hover:text-heritage-on-surface transition-colors py-2" data-path="testimonials" href="#testimonials">Testimonials</a><a class="text-heritage-on-surface-variant hover:text-heritage-on-surface transition-colors py-2" data-path="faq" href="#faq">FAQ</a></nav><div class="flex items-center gap-heritage-space-md"><a class="bg-heritage-primary-container hover:bg-heritage-primary text-heritage-on-primary-container hover:text-heritage-on-primary px-heritage-space-lg py-2.5 font-heritage-label-ui text-heritage-label-ui uppercase tracking-widest transition-all duration-300 shadow-[0_10px_30px_-10px_rgba(212,175,55,0.3)]" data-path="vip-test-drive" href="#test-drive">Book Private Viewing</a></div></div></header><main class="w-full pt-29 bg-heritage-surface-container-lowest min-h-screen"><div class="flex flex-col w-full"><div class="flex flex-col w-full">
<!-- ========================================== -->
<!-- 1. HERO SECTION                            -->
<!-- ========================================== -->
<section id="home" class="relative w-full bg-heritage-surface-container-lowest text-heritage-on-surface overflow-hidden py-16 lg:py-24">
<!-- Ambient Under-Glow & Atmosphere -->
<div class="absolute -top-40 right-1/4 w-[600px] h-[600px] bg-heritage-primary/5 rounded-heritage-full blur-[140px] pointer-events-none"></div>
<div class="absolute bottom-0 left-10 w-[450px] h-[450px] bg-heritage-tertiary-container/5 rounded-heritage-full blur-[120px] pointer-events-none"></div>
<div class="max-w-7xl mx-auto px-heritage-gutter relative z-10">
<!-- Headline & Editorial Tagline -->
<div class="flex flex-col lg:flex-row lg:items-end justify-between gap-heritage-space-lg mb-12">
<div class="max-w-3xl">
<div class="inline-flex items-center gap-heritage-space-sm bg-heritage-surface-container-low px-3 py-1 mb-4 shadow-sm">
<span class="w-1.5 h-1.5 bg-heritage-primary rounded-heritage-full animate-pulse"></span>
<span class="font-heritage-label-technical text-heritage-label-technical uppercase tracking-[0.25em] text-heritage-primary">Private Vault Collection • Issue MMXXV</span>
</div>
<h1 class="font-heritage-display text-heritage-display lg:text-[4.5rem] tracking-tight leading-none text-heritage-on-surface mb-6">
            Curated Mastery <span class="italic font-normal text-heritage-tertiary">on Wheels.</span>
</h1>
<p class="font-heritage-body-lg text-heritage-body-lg text-heritage-on-surface-variant max-w-2xl leading-relaxed">
            Discover an uncompromising curation of rare coachbuilt hypercars, vintage icons, and bespoke grand tourers. Meticulously inspected, forensic provenance guaranteed, preserved for immediate acquisition.
          </p>
</div>
<!-- Hero CTAs -->
<div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-heritage-space-md lg:pb-3">
<a class="inline-flex items-center justify-center bg-heritage-primary-container hover:bg-heritage-primary text-heritage-on-primary font-heritage-label-ui text-heritage-label-ui uppercase tracking-widest px-heritage-space-xl py-4 transition-all shadow-[0_12px_36px_-8px_rgba(212,175,55,0.3)]" href="#inventory">
            Explore Current Vault
          </a>
<a class="inline-flex items-center justify-center bg-heritage-surface-container-low hover:bg-heritage-surface-container text-heritage-on-surface font-heritage-label-ui text-heritage-label-ui uppercase tracking-widest px-heritage-space-xl py-4 transition-all shadow-sm" href="#test-drive">
            Schedule VIP Viewing
          </a>
</div>
</div>
<!-- Hero Double Spotlight Display (Asymmetric Bento) -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-heritage-space-lg">
<!-- Primary Spotlight: Aston Martin DBS 770 -->
<div class="lg:col-span-8 bg-heritage-surface-container-low flex flex-col justify-between overflow-hidden group shadow-xl">
<div class="relative h-[360px] sm:h-[460px] w-full overflow-hidden">
<img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" data-alt="Photorealistic studio shot of an obsidian black 2024 Aston Martin DBS 770 Ultimate coupe in a dark minimalist architectural warehouse, cinematic top spotlight reflections in champagne gold hues, dramatic sleek angles, shallow depth of field, ultra-high dynamic range" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDOapJ06YjNzEZNbuh6i1QYppHZPZwWPpOWMCG8JtjWJUxdu_r0fErSPFLd6_9d1PKOb0Als1IeD1Bn_NCauE57wKxWrOlzO85WAy4vHHgLiRzkkbLNtYKjxuxYQx4GNrOc0Ian6Z0S11XjvOa9K_T7hJzwQv0i6Wk86eRPti8-EvxI7T1US3hfi1Z2d8uO7fb-O5l94bEhNB_s829DTB4x43x_dDAZ9m0NmXS8QfU4TtSkD3V_n9IpuQ"/>
<div class="absolute inset-0 bg-gradient-to-t from-heritage-surface-container-low via-heritage-surface-container-low/20 to-transparent"></div>
<div class="absolute top-4 left-4 flex flex-wrap gap-2">
<span class="bg-heritage-surface-container-lowest/90 backdrop-blur-md px-3 py-1 font-heritage-label-technical text-heritage-label-technical uppercase tracking-widest text-heritage-primary">Consignment Highlight</span>
<span class="bg-heritage-surface-container-lowest/90 backdrop-blur-md px-3 py-1 font-heritage-label-technical text-heritage-label-technical uppercase tracking-widest text-heritage-on-surface-variant">1 of 499 Worldwide</span>
</div>
<div class="absolute bottom-4 left-6 right-6 flex items-end justify-between">
<div>
<span class="font-heritage-label-technical text-heritage-label-technical uppercase tracking-wider text-heritage-outline">Featured Acquisition</span>
<h2 class="font-heritage-headline-md text-heritage-headline-md text-heritage-on-surface leading-tight">2024 Aston Martin DBS 770 Ultimate</h2>
</div>
<span class="font-heritage-headline-sm text-heritage-headline-sm text-heritage-primary tracking-tight font-medium">Rp 6.640.000.000</span>
</div>
</div>
<!-- Specification Strip -->
<div class="grid grid-cols-2 sm:grid-cols-4 bg-heritage-surface-container p-heritage-space-md gap-y-4">
<div class="flex flex-col px-3">
<span class="font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-outline tracking-wider">Engine Power</span>
<span class="font-heritage-title-lg text-heritage-title-lg text-heritage-on-surface font-semibold mt-1">759 BHP</span>
</div>
<div class="flex flex-col px-3">
<span class="font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-outline tracking-wider">Acceleration</span>
<span class="font-heritage-title-lg text-heritage-title-lg text-heritage-on-surface font-semibold mt-1">0-100 in 3.2s</span>
</div>
<div class="flex flex-col px-3">
<span class="font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-outline tracking-wider">Powertrain</span>
<span class="font-heritage-title-lg text-heritage-title-lg text-heritage-on-surface font-semibold mt-1">5.2L Twin-Turbo V12</span>
</div>
<div class="flex flex-col px-3">
<span class="font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-outline tracking-wider">Verification</span>
<span class="font-heritage-title-lg text-heritage-title-lg text-heritage-tertiary font-semibold mt-1 flex items-center gap-1">
<span class="material-symbols-outlined text-[18px]">verified</span> 100% Provenance
              </span>
</div>
</div>
</div>
<!-- Secondary Spotlight: Vintage 1967 Shelby GT500 -->
<div class="lg:col-span-4 bg-heritage-surface-container-low flex flex-col justify-between overflow-hidden group shadow-xl">
<div class="relative h-[260px] sm:h-[300px] w-full overflow-hidden">
<img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" data-alt="Classic vintage 1967 Shelby GT500 Fastback in deep midnight blue with Wimbledon white racing stripes parked inside an exclusive moody private gallery, museum lighting glowing off chrome bumpers and handcrafted metallic curves, luxury editorial style" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAL-1HEu1__4f3V1PJjvoBIm1mrmcQAesO3cC6gMo1Ui312t2sx0vf66U5sTLIXqXP8trZLozpbDn3TqjahOfIaNpiQdpqIVxAF2QzcfEXeF-Qfd6XThNvmWVrPCPMBvq5rRfinqBLv2XNAcfxqGQOecOSapB3HJYCNX7VVpO87llABNwQ0HiVYiirHhGWHwv2vYHnEzH0xfWVl6okIjzYll26drnAPoA41ufvyvggKfy0Rors3ZFCzIg"/>
<div class="absolute inset-0 bg-gradient-to-t from-heritage-surface-container-low via-heritage-surface-container-low/20 to-transparent"></div>
<div class="absolute top-4 left-4">
<span class="bg-heritage-surface-container-lowest/90 backdrop-blur-md px-3 py-1 font-heritage-label-technical text-heritage-label-technical uppercase tracking-widest text-heritage-tertiary">Historic Heritage</span>
</div>
<div class="absolute bottom-3 left-4 right-4">
<span class="font-heritage-label-technical text-heritage-label-technical uppercase tracking-wider text-heritage-outline">Coachwork Preservation</span>
<h3 class="font-heritage-headline-sm text-heritage-headline-sm text-heritage-on-surface leading-snug">1967 Shelby GT500 Fastback</h3>
</div>
</div>
<div class="p-heritage-space-md bg-heritage-surface-container flex flex-col gap-3">
<div class="flex items-center justify-between text-heritage-on-surface-variant font-heritage-body-sm text-heritage-body-sm">
<span>Engine Spec</span>
<span class="text-heritage-on-surface font-medium">428 Police Interceptor V8</span>
</div>
<div class="flex items-center justify-between text-heritage-on-surface-variant font-heritage-body-sm text-heritage-body-sm">
<span>Mileage</span>
<span class="text-heritage-on-surface font-medium">21,400 Documented Miles</span>
</div>
<div class="flex items-center justify-between text-heritage-on-surface-variant font-heritage-body-sm text-heritage-body-sm">
<span>Condition</span>
<span class="text-heritage-primary font-medium">Concours d'Elegance Preserved</span>
</div>
<div class="pt-2 flex items-center justify-between">
<span class="font-heritage-headline-sm text-heritage-headline-sm text-heritage-on-surface">Rp 4.720.000.000</span>
<button class="font-heritage-label-technical text-heritage-label-technical uppercase tracking-widest text-heritage-primary hover:text-heritage-primary-fixed flex items-center gap-1 transition-colors" onclick="openModal('GT500')">
                View Dossier <span class="material-symbols-outlined text-[16px]">arrow_forward</span>
</button>
</div>
</div>
</div>
</div>
<!-- Trust & Provenance Metrics Strip -->
<div class="mt-12 bg-heritage-surface-container-low p-heritage-space-lg shadow-lg">
<div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center md:text-left">
<div class="flex flex-col md:border-r border-heritage-outline-variant/30 pr-4">
<div class="flex items-center justify-center md:justify-start gap-2 text-heritage-primary mb-1">
<span class="material-symbols-outlined text-[20px]">verified_user</span>
<span class="font-heritage-headline-sm text-heritage-headline-sm font-semibold">150+</span>
</div>
<span class="font-heritage-label-technical text-heritage-label-technical uppercase tracking-wider text-heritage-on-surface-variant">Verified Exotic Deliveries</span>
<span class="font-heritage-body-sm text-heritage-body-sm text-heritage-outline mt-1 text-[11px]">Strict zero-accident disclosure</span>
</div>
<div class="flex flex-col md:border-r border-heritage-outline-variant/30 pr-4">
<div class="flex items-center justify-center md:justify-start gap-2 text-heritage-primary mb-1">
<span class="material-symbols-outlined text-[20px]">fingerprint</span>
<span class="font-heritage-headline-sm text-heritage-headline-sm font-semibold">100%</span>
</div>
<span class="font-heritage-label-technical text-heritage-label-technical uppercase tracking-wider text-heritage-on-surface-variant">Provenance &amp; Mileage Integrity</span>
<span class="font-heritage-body-sm text-heritage-body-sm text-heritage-outline mt-1 text-[11px]">Full chassis archive tracing</span>
</div>
<div class="flex flex-col md:border-r border-heritage-outline-variant/30 pr-4">
<div class="flex items-center justify-center md:justify-start gap-2 text-heritage-primary mb-1">
<span class="material-symbols-outlined text-[20px]">flight_takeoff</span>
<span class="font-heritage-headline-sm text-heritage-headline-sm font-semibold">Global</span>
</div>
<span class="font-heritage-label-technical text-heritage-label-technical uppercase tracking-wider text-heritage-on-surface-variant">Worldwide Enclosed Freight</span>
<span class="font-heritage-body-sm text-heritage-body-sm text-heritage-outline mt-1 text-[11px]">Customs clearance concierge</span>
</div>
<div class="flex flex-col">
<div class="flex items-center justify-center md:justify-start gap-2 text-heritage-primary mb-1">
<span class="material-symbols-outlined text-[20px]">grade</span>
<span class="font-heritage-headline-sm text-heritage-headline-sm font-semibold">5.0 / 5.0</span>
</div>
<span class="font-heritage-label-technical text-heritage-label-technical uppercase tracking-wider text-heritage-on-surface-variant">Private Client Rating</span>
<span class="font-heritage-body-sm text-heritage-body-sm text-heritage-outline mt-1 text-[11px]">Bespoke family office advisory</span>
</div>
</div>
</div>
</div>
</section>
<!-- ========================================== -->
<!-- 2. VEHICLE INVENTORY SECTION                -->
<!-- ========================================== -->
<section class="w-full bg-heritage-surface py-20" id="inventory">
<div class="max-w-7xl mx-auto px-heritage-gutter">
<!-- Section Header -->
<div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-10">
<div>
<span class="font-heritage-label-technical text-heritage-label-technical uppercase tracking-[0.2em] text-heritage-primary">Vault Inventory</span>
<h2 class="font-heritage-headline-lg text-heritage-headline-lg text-heritage-on-surface mt-2">The Current Collection</h2>
<p class="font-heritage-body-md text-heritage-body-md text-heritage-on-surface-variant mt-2 max-w-xl">
            Hand-selected rare editions, certified pre-owned masterpieces, and discreet off-market consignments available for acquisition.
          </p>
</div>
<div class="flex items-center gap-3">
<span class="font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-outline">Viewing Status:</span>
<span class="bg-heritage-surface-container-high text-heritage-primary px-3 py-1 font-heritage-label-technical text-heritage-label-technical tracking-widest uppercase">24 Motorcars Ready</span>
</div>
</div>
<!-- Filter Controls & Quick Search -->
<div class="bg-heritage-surface-container-low p-heritage-space-md mb-10 shadow-lg flex flex-col gap-heritage-space-md">
<!-- Category Pill Buttons -->
<div class="flex flex-wrap items-center gap-2" id="categoryTabs">
<button class="inventory-tab bg-heritage-primary text-heritage-on-primary font-heritage-label-ui text-heritage-label-ui uppercase tracking-wider px-4 py-2 transition-all" onclick="filterCategory('all', this)">All Showroom (24)</button>
<button class="inventory-tab bg-heritage-surface-container text-heritage-on-surface-variant hover:text-heritage-on-surface font-heritage-label-ui text-heritage-label-ui uppercase tracking-wider px-4 py-2 transition-all" onclick="filterCategory('supercar', this)">Exotic Supercars (8)</button>
<button class="inventory-tab bg-heritage-surface-container text-heritage-on-surface-variant hover:text-heritage-on-surface font-heritage-label-ui text-heritage-label-ui uppercase tracking-wider px-4 py-2 transition-all" onclick="filterCategory('vintage', this)">Vintage &amp; Heritage (5)</button>
<button class="inventory-tab bg-heritage-surface-container text-heritage-on-surface-variant hover:text-heritage-on-surface font-heritage-label-ui text-heritage-label-ui uppercase tracking-wider px-4 py-2 transition-all" onclick="filterCategory('grandtourer', this)">Grand Touring &amp; Sedans (6)</button>
<button class="inventory-tab bg-heritage-surface-container text-heritage-on-surface-variant hover:text-heritage-on-surface font-heritage-label-ui text-heritage-label-ui uppercase tracking-wider px-4 py-2 transition-all" onclick="filterCategory('electric', this)">Performance EV &amp; Hybrid (5)</button>
</div>
<!-- Filter Sub-bar: Search, Transmission, Sort -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 pt-2">
<div class="relative">
<span class="material-symbols-outlined absolute left-3 top-3 text-heritage-outline text-[18px]">search</span>
<input class="w-full bg-heritage-surface-container-lowest text-heritage-on-surface pl-10 pr-4 py-2.5 font-heritage-label-technical text-heritage-label-technical uppercase placeholder:text-heritage-outline focus:outline-none focus:bg-heritage-surface-container-highest" id="inventorySearch" onkeyup="searchInventory()" placeholder="SEARCH MODEL, CHASSIS..." type="text"/>
</div>
<div>
<select class="w-full bg-heritage-surface-container-lowest text-heritage-on-surface px-4 py-2.5 font-heritage-label-technical text-heritage-label-technical uppercase tracking-wider focus:outline-none focus:bg-heritage-surface-container-highest" id="filterTransmission" onchange="applyFilters()">
<option value="all">Transmission: All</option>
<option value="dual-clutch">Dual-Clutch / PDK</option>
<option value="manual">Manual 6-Speed</option>
<option value="automatic">Automatic ZF 8-Spd</option>
</select>
</div>
<div>
<select class="w-full bg-heritage-surface-container-lowest text-heritage-on-surface px-4 py-2.5 font-heritage-label-technical text-heritage-label-technical uppercase tracking-wider focus:outline-none focus:bg-heritage-surface-container-highest" id="filterPrice" onchange="applyFilters()">
<option value="all">Price Range: All</option>
<option value="under200k">Under Rp 3.200.000.000</option>
<option value="200k-400k">Rp 3.200.000.000 - Rp 6.400.000.000</option>
<option value="above400k">Rp 6.400.000.000 &amp; Above</option>
</select>
</div>
<div>
<select class="w-full bg-heritage-surface-container-lowest text-heritage-on-surface px-4 py-2.5 font-heritage-label-technical text-heritage-label-technical uppercase tracking-wider focus:outline-none focus:bg-heritage-surface-container-highest" id="sortOrder" onchange="applyFilters()">
<option value="featured">Sort: Curated Featured</option>
<option value="price-asc">Price: Low to High</option>
<option value="price-desc">Price: High to Low</option>
<option value="mileage-asc">Mileage: Lowest First</option>
</select>
</div>
</div>
</div>
<!-- Vehicle Grid: 6 Distinct High-End Models -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-heritage-space-lg" id="vehicleGrid">
<!-- CARD 1: 2023 Porsche 911 GT3 RS -->
<div class="vehicle-card bg-heritage-surface-container-low flex flex-col justify-between group shadow-lg hover:shadow-2xl transition-all duration-300" data-category="supercar" data-mileage="840" data-name="2023 Porsche 911 GT3 RS Weissach" data-price="389000" data-transmission="dual-clutch">
<div>
<div class="relative h-64 overflow-hidden">
<img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" data-alt="2023 Porsche 911 GT3 RS Weissach package in striking Shark Blue with raw carbon fiber aerokit and massive rear wing in a high-contrast luxury studio with black gloss reflective floor, studio lighting" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCkji7xBgqw45DaMfvgYq3aJa5skR3ALSfXfk8u7PoGPqtI6jeJ4WB-Ic_47VYrwk4tw6FFQpWc17ZUZZGk4EGL7ettas_8ABfozOgSGacyGzREP8MGLtWVk0OKQi3sKy3t3b13yy9czEBSdlkqJp552-Fanu4g7V64F0PSoS0rff6gYsSZypkM8pOZumyYQmtG_m85uJyuXw4stL6LuOjwJpK-T5JiJYhasuHa3Z85qubVOEyy70FLKQ"/>
<div class="absolute top-3 left-3 flex gap-2">
<span class="bg-heritage-surface-container-lowest/90 backdrop-blur-md px-2.5 py-1 font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-primary">CPO Certified</span>
<span class="bg-heritage-surface-container-lowest/90 backdrop-blur-md px-2.5 py-1 font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-on-surface">1 Owner</span>
</div>
<div class="absolute bottom-3 right-3 bg-heritage-surface-container-lowest/90 px-3 py-1 font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-on-surface">
                840 Miles
              </div>
</div>
<div class="p-heritage-space-md">
<div class="flex items-center justify-between mb-1">
<span class="font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-outline">Stuttgart, Germany</span>
<span class="font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-tertiary">Chassis Verified</span>
</div>
<h3 class="font-heritage-headline-sm text-heritage-headline-sm text-heritage-on-surface group-hover:text-heritage-primary transition-colors leading-snug">
                2023 Porsche 911 GT3 RS
              </h3>
<p class="font-heritage-body-sm text-heritage-body-sm text-heritage-on-surface-variant mt-1">Weissach Lightweight Package, Shark Blue, PCCB</p>
<div class="grid grid-cols-2 gap-2 mt-4 py-3 bg-heritage-surface-container px-3">
<div class="flex flex-col">
<span class="font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-outline">Engine</span>
<span class="font-heritage-body-sm text-heritage-body-sm text-heritage-on-surface font-semibold">4.0L Flat-6 (518 HP)</span>
</div>
<div class="flex flex-col">
<span class="font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-outline">Gearbox</span>
<span class="font-heritage-body-sm text-heritage-body-sm text-heritage-on-surface font-semibold">7-Speed PDK</span>
</div>
</div>
</div>
</div>
<div class="p-heritage-space-md pt-0">
<div class="flex items-center justify-between mb-4">
<span class="font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-outline">Acquisition Value</span>
<span class="font-heritage-headline-sm text-heritage-headline-sm text-heritage-primary font-bold">Rp 6.224.000.000</span>
</div>
<div class="grid grid-cols-2 gap-2">
<button class="bg-heritage-surface-container hover:bg-heritage-surface-bright text-heritage-on-surface py-2.5 font-heritage-label-ui text-heritage-label-ui uppercase tracking-wider text-center transition-colors" onclick="openModal('GT3RS')">
                View Specs
              </button>
<a class="bg-heritage-primary-container hover:bg-heritage-primary text-heritage-on-primary-container hover:text-heritage-on-primary py-2.5 font-heritage-label-ui text-heritage-label-ui uppercase tracking-wider text-center transition-colors flex items-center justify-center gap-1" href="https://wa.me/?text=Inquiring%20about%202023%20Porsche%20911%20GT3%20RS%20Weissach" target="_blank">
<span class="material-symbols-outlined text-[16px]">chat</span> WhatsApp
              </a>
</div>
</div>
</div>
<!-- CARD 2: 2022 Ferrari Roma -->
<div class="vehicle-card bg-heritage-surface-container-low flex flex-col justify-between group shadow-lg hover:shadow-2xl transition-all duration-300" data-category="supercar" data-mileage="2190" data-name="2022 Ferrari Roma Coupe" data-price="248000" data-transmission="dual-clutch">
<div>
<div class="relative h-64 overflow-hidden">
<img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" data-alt="2022 Ferrari Roma in Grigio Silverstone with Cuoio tan leather interior parked against modern architectural concrete minimalist backdrop with subtle warm gold illumination" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAXFTSM8dcuS1fyxVtzn7PRSl1EfhOyLlBeOjZeBD2lE4jtcHyiy4zF7YmwK_gQ-YaVl1iSMr3izSlZXNx5ejD0FGyT-jFwkEUU-86QU9u3kvrAbdRjQegdfwROMU9WNNevcJ0qBXnYUp249zScm_v3CfNphTYmwbKWwSoamN-rdd_Tcnmaw4hYvRjAZwa0OXwXHJceqzT7MbWL_mVusju139DuiglS1v2imR7AgxjkrvW6DToq-uMCEw"/>
<div class="absolute top-3 left-3 flex gap-2">
<span class="bg-heritage-surface-container-lowest/90 backdrop-blur-md px-2.5 py-1 font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-primary">Ferrari Approved</span>
</div>
<div class="absolute bottom-3 right-3 bg-heritage-surface-container-lowest/90 px-3 py-1 font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-on-surface">
                2,190 Miles
              </div>
</div>
<div class="p-heritage-space-md">
<div class="flex items-center justify-between mb-1">
<span class="font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-outline">Maranello, Italy</span>
<span class="font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-tertiary">Under Warranty</span>
</div>
<h3 class="font-heritage-headline-sm text-heritage-headline-sm text-heritage-on-surface group-hover:text-heritage-primary transition-colors leading-snug">
                2022 Ferrari Roma
              </h3>
<p class="font-heritage-body-sm text-heritage-body-sm text-heritage-on-surface-variant mt-1">Grigio Silverstone, Cuoio Hide, Carbon Steering Wheel</p>
<div class="grid grid-cols-2 gap-2 mt-4 py-3 bg-heritage-surface-container px-3">
<div class="flex flex-col">
<span class="font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-outline">Engine</span>
<span class="font-heritage-body-sm text-heritage-body-sm text-heritage-on-surface font-semibold">3.9L Twin-Turbo V8 (612 HP)</span>
</div>
<div class="flex flex-col">
<span class="font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-outline">Gearbox</span>
<span class="font-heritage-body-sm text-heritage-body-sm text-heritage-on-surface font-semibold">8-Speed F1 Dual-Clutch</span>
</div>
</div>
</div>
</div>
<div class="p-heritage-space-md pt-0">
<div class="flex items-center justify-between mb-4">
<span class="font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-outline">Acquisition Value</span>
<span class="font-heritage-headline-sm text-heritage-headline-sm text-heritage-primary font-bold">Rp 3.968.000.000</span>
</div>
<div class="grid grid-cols-2 gap-2">
<button class="bg-heritage-surface-container hover:bg-heritage-surface-bright text-heritage-on-surface py-2.5 font-heritage-label-ui text-heritage-label-ui uppercase tracking-wider text-center transition-colors" onclick="openModal('Roma')">
                View Specs
              </button>
<a class="bg-heritage-primary-container hover:bg-heritage-primary text-heritage-on-primary-container hover:text-heritage-on-primary py-2.5 font-heritage-label-ui text-heritage-label-ui uppercase tracking-wider text-center transition-colors flex items-center justify-center gap-1" href="https://wa.me/?text=Inquiring%20about%202022%20Ferrari%20Roma" target="_blank">
<span class="material-symbols-outlined text-[16px]">chat</span> WhatsApp
              </a>
</div>
</div>
</div>
<!-- CARD 3: 1968 Mercedes-Benz 280SL Pagoda -->
<div class="vehicle-card bg-heritage-surface-container-low flex flex-col justify-between group shadow-lg hover:shadow-2xl transition-all duration-300" data-category="vintage" data-mileage="41200" data-name="1968 Mercedes-Benz 280SL Pagoda" data-price="192000" data-transmission="manual">
<div>
<div class="relative h-64 overflow-hidden">
<img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" data-alt="Classic pristine 1968 Mercedes-Benz 280SL Pagoda roadster in metallic silver with midnight blue leather interior and matching hardtop in a vintage European heritage carriage house, soft studio rim lighting" src="https://lh3.googleusercontent.com/aida-public/AB6AXuADvEUAYqlAzw-Xtv8Q38Kr4Y9Ymt6-OjQpBGK-0V07kDqBYt9IbQz1ylQZfAHQuNxHj5JhrTp5mVZ1eaPSiSGQH4R6p6rjTdwVY_WITKuwnArjCZSAgDvcgc4j7UmjXrk9VxNVkFz3GJ7wF-VR3IujThXxlHJ39wgQS--YZWWnTTZhnzsJdnE3jdrpwb8A6LOE2tzxWxmd__XHpxanGyP4PV7UPNnK0hQKzeU4vFX3tUPeGHkMbeK6wg"/>
<div class="absolute top-3 left-3 flex gap-2">
<span class="bg-heritage-surface-container-lowest/90 backdrop-blur-md px-2.5 py-1 font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-tertiary">Matching Numbers</span>
</div>
<div class="absolute bottom-3 right-3 bg-heritage-surface-container-lowest/90 px-3 py-1 font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-on-surface">
                41,200 Miles
              </div>
</div>
<div class="p-heritage-space-md">
<div class="flex items-center justify-between mb-1">
<span class="font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-outline">Stuttgart Classic</span>
<span class="font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-tertiary">Nut-&amp;-Bolt Resto</span>
</div>
<h3 class="font-heritage-headline-sm text-heritage-headline-sm text-heritage-on-surface group-hover:text-heritage-primary transition-colors leading-snug">
                1968 Mercedes-Benz 280SL
              </h3>
<p class="font-heritage-body-sm text-heritage-body-sm text-heritage-on-surface-variant mt-1">W113 Pagoda, Hardtop &amp; Softtop Included, Both Keys</p>
<div class="grid grid-cols-2 gap-2 mt-4 py-3 bg-heritage-surface-container px-3">
<div class="flex flex-col">
<span class="font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-outline">Engine</span>
<span class="font-heritage-body-sm text-heritage-body-sm text-heritage-on-surface font-semibold">2.8L Inline-6 (170 HP)</span>
</div>
<div class="flex flex-col">
<span class="font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-outline">Gearbox</span>
<span class="font-heritage-body-sm text-heritage-body-sm text-heritage-on-surface font-semibold">Original 4-Speed Manual</span>
</div>
</div>
</div>
</div>
<div class="p-heritage-space-md pt-0">
<div class="flex items-center justify-between mb-4">
<span class="font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-outline">Acquisition Value</span>
<span class="font-heritage-headline-sm text-heritage-headline-sm text-heritage-primary font-bold">Rp 3.072.000.000</span>
</div>
<div class="grid grid-cols-2 gap-2">
<button class="bg-heritage-surface-container hover:bg-heritage-surface-bright text-heritage-on-surface py-2.5 font-heritage-label-ui text-heritage-label-ui uppercase tracking-wider text-center transition-colors" onclick="openModal('280SL')">
                View Specs
              </button>
<a class="bg-heritage-primary-container hover:bg-heritage-primary text-heritage-on-primary-container hover:text-heritage-on-primary py-2.5 font-heritage-label-ui text-heritage-label-ui uppercase tracking-wider text-center transition-colors flex items-center justify-center gap-1" href="https://wa.me/?text=Inquiring%20about%201968%20Mercedes-Benz%20280SL%20Pagoda" target="_blank">
<span class="material-symbols-outlined text-[16px]">chat</span> WhatsApp
              </a>
</div>
</div>
</div>
<!-- CARD 4: 2024 Rolls-Royce Ghost Black Badge -->
<div class="vehicle-card bg-heritage-surface-container-low flex flex-col justify-between group shadow-lg hover:shadow-2xl transition-all duration-300" data-category="grandtourer" data-mileage="320" data-name="2024 Rolls-Royce Ghost Black Badge" data-price="465000" data-transmission="automatic">
<div>
<div class="relative h-64 overflow-hidden">
<img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" data-alt="2024 Rolls-Royce Ghost Black Badge in Diamond Black with Mandarin orange coachline and illuminated Pantheon grille, parked in front of modern Surabaya private members club at dusk" src="https://lh3.googleusercontent.com/aida-public/AB6AXuB6Fi9x5bFCEZ7RYxUidubOuwraO249RzgIvn6DPZUvs9BeDXJK3uyn5tJE3kKe8eXKtQwAuYOV7XLBl4c3L5AiXB4ltN11aG0GfLpuak5Mmt0uN9YDDb7oRpT8Z1rGZI0z99CmbL65nIKAZlg4mzSCqox9HuBqSW3DzhlLcV0fFVwR5t63wMoGJz_xBD1DNJttpJ1O8KpLNEqV4zr_AqUtinEApwaQ7-eyIHkDcokZ9SZx7D9gaYsrjw"/>
<div class="absolute top-3 left-3 flex gap-2">
<span class="bg-heritage-surface-container-lowest/90 backdrop-blur-md px-2.5 py-1 font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-primary">Apex Vault Reserve</span>
<span class="bg-heritage-surface-container-lowest/90 backdrop-blur-md px-2.5 py-1 font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-on-surface">Immediate Delivery</span>
</div>
<div class="absolute bottom-3 right-3 bg-heritage-surface-container-lowest/90 px-3 py-1 font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-on-surface">
                320 Miles
              </div>
</div>
<div class="p-heritage-space-md">
<div class="flex items-center justify-between mb-1">
<span class="font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-outline">Goodwood, England</span>
<span class="font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-tertiary">Shooting Star Headliner</span>
</div>
<h3 class="font-heritage-headline-sm text-heritage-headline-sm text-heritage-on-surface group-hover:text-heritage-primary transition-colors leading-snug">
                2024 Rolls-Royce Ghost
              </h3>
<p class="font-heritage-body-sm text-heritage-body-sm text-heritage-on-surface-variant mt-1">Black Badge Edition, Bespoke Audio, Rear Theatre Lounge</p>
<div class="grid grid-cols-2 gap-2 mt-4 py-3 bg-heritage-surface-container px-3">
<div class="flex flex-col">
<span class="font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-outline">Engine</span>
<span class="font-heritage-body-sm text-heritage-body-sm text-heritage-on-surface font-semibold">6.75L Twin-Turbo V12 (591 HP)</span>
</div>
<div class="flex flex-col">
<span class="font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-outline">Gearbox</span>
<span class="font-heritage-body-sm text-heritage-body-sm text-heritage-on-surface font-semibold">8-Speed Satellite-Aided</span>
</div>
</div>
</div>
</div>
<div class="p-heritage-space-md pt-0">
<div class="flex items-center justify-between mb-4">
<span class="font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-outline">Acquisition Value</span>
<span class="font-heritage-headline-sm text-heritage-headline-sm text-heritage-primary font-bold">Rp 7.440.000.000</span>
</div>
<div class="grid grid-cols-2 gap-2">
<button class="bg-heritage-surface-container hover:bg-heritage-surface-bright text-heritage-on-surface py-2.5 font-heritage-label-ui text-heritage-label-ui uppercase tracking-wider text-center transition-colors" onclick="openModal('Ghost')">
                View Specs
              </button>
<a class="bg-heritage-primary-container hover:bg-heritage-primary text-heritage-on-primary-container hover:text-heritage-on-primary py-2.5 font-heritage-label-ui text-heritage-label-ui uppercase tracking-wider text-center transition-colors flex items-center justify-center gap-1" href="https://wa.me/?text=Inquiring%20about%202024%20Rolls-Royce%20Ghost%20Black%20Badge" target="_blank">
<span class="material-symbols-outlined text-[16px]">chat</span> WhatsApp
              </a>
</div>
</div>
</div>
<!-- CARD 5: 2021 Aston Martin Vantage V8 -->
<div class="vehicle-card bg-heritage-surface-container-low flex flex-col justify-between group shadow-lg hover:shadow-2xl transition-all duration-300" data-category="supercar" data-mileage="6800" data-name="2021 Aston Martin Vantage V8 Coupe" data-price="139000" data-transmission="automatic">
<div>
<div class="relative h-64 overflow-hidden">
<img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" data-alt="2021 Aston Martin Vantage in Racing Green with bronze forged alloy wheels captured on a dramatic mountain pass during overcast golden hour, luxury editorial automotive capture" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBaxYh4uZp9_FtoSRTngCfCi8S9wpFh_BDO5fsKS_Zpp3GpChnCMco3NMuEcSymYuKn-MXLWOb6zXO0zLqdzJjW2f3CU41Kn3_LtAFmyazRbUpwnBomGjqcvekzbl8TxLrYToupliXPE-iwIYQ88KXMQSIp9bGzv_cb_k5iiRZSOjeEmu2xy_hDLiJVfFhN4H0ldJ7Mt_PPua4diHE61528xS5icAsFMmh2RrOFvWXDLXDYXbprIOnIFA"/>
<div class="absolute top-3 left-3 flex gap-2">
<span class="bg-heritage-surface-container-lowest/90 backdrop-blur-md px-2.5 py-1 font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-primary">Aston Certified</span>
</div>
<div class="absolute bottom-3 right-3 bg-heritage-surface-container-lowest/90 px-3 py-1 font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-on-surface">
                6,800 Miles
              </div>
</div>
<div class="p-heritage-space-md">
<div class="flex items-center justify-between mb-1">
<span class="font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-outline">Gaydon, England</span>
<span class="font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-tertiary">Clean Title</span>
</div>
<h3 class="font-heritage-headline-sm text-heritage-headline-sm text-heritage-on-surface group-hover:text-heritage-primary transition-colors leading-snug">
                2021 Aston Martin Vantage
              </h3>
<p class="font-heritage-body-sm text-heritage-body-sm text-heritage-on-surface-variant mt-1">Aston Racing Green, Obsidian Black Semi-Aniline Leather</p>
<div class="grid grid-cols-2 gap-2 mt-4 py-3 bg-heritage-surface-container px-3">
<div class="flex flex-col">
<span class="font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-outline">Engine</span>
<span class="font-heritage-body-sm text-heritage-body-sm text-heritage-on-surface font-semibold">4.0L Twin-Turbo V8 (503 HP)</span>
</div>
<div class="flex flex-col">
<span class="font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-outline">Gearbox</span>
<span class="font-heritage-body-sm text-heritage-body-sm text-heritage-on-surface font-semibold">8-Speed ZF Sportshift</span>
</div>
</div>
</div>
</div>
<div class="p-heritage-space-md pt-0">
<div class="flex items-center justify-between mb-4">
<span class="font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-outline">Acquisition Value</span>
<span class="font-heritage-headline-sm text-heritage-headline-sm text-heritage-primary font-bold">Rp 2.224.000.000</span>
</div>
<div class="grid grid-cols-2 gap-2">
<button class="bg-heritage-surface-container hover:bg-heritage-surface-bright text-heritage-on-surface py-2.5 font-heritage-label-ui text-heritage-label-ui uppercase tracking-wider text-center transition-colors" onclick="openModal('Vantage')">
                View Specs
              </button>
<a class="bg-heritage-primary-container hover:bg-heritage-primary text-heritage-on-primary-container hover:text-heritage-on-primary py-2.5 font-heritage-label-ui text-heritage-label-ui uppercase tracking-wider text-center transition-colors flex items-center justify-center gap-1" href="https://wa.me/?text=Inquiring%20about%202021%20Aston%20Martin%20Vantage" target="_blank">
<span class="material-symbols-outlined text-[16px]">chat</span> WhatsApp
              </a>
</div>
</div>
</div>
<!-- CARD 6: 2023 Bentley Continental GT Speed -->
<div class="vehicle-card bg-heritage-surface-container-low flex flex-col justify-between group shadow-lg hover:shadow-2xl transition-all duration-300" data-category="grandtourer" data-mileage="1840" data-name="2023 Bentley Continental GT Speed" data-price="312000" data-transmission="dual-clutch">
<div>
<div class="relative h-64 overflow-hidden">
<img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" data-alt="2023 Bentley Continental GT Speed in Anthracite Metallic with Hotspur and Beluga dual-tone diamond-quilted leather interior inside an architecturally lit gallery garage" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBMsO2M7ndFe1IB4ZsZO21lijufVrBZ3nm3AzKFl1QA5jFeqlqYykNgWfELHZzyWIvEwUtdp6pcyfNxDNrWWMcN8dnqqrE206TFz9NiCSJejeLy8ok0bc1G9GZN2GMfIGB90jR_ptFxipnUjHzPkjKyM15egRvjRUBXF84-3WJBL43kMsAuw0dpcJ_Gb5E7m0U6anvevYxtim4o-80xEp8x9TVU5BmbYlGkI3HvSyP8YiIEj-FoLnfr6Q"/>
<div class="absolute top-3 left-3 flex gap-2">
<span class="bg-heritage-surface-container-lowest/90 backdrop-blur-md px-2.5 py-1 font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-primary">Bentley Certified</span>
<span class="bg-heritage-surface-container-lowest/90 backdrop-blur-md px-2.5 py-1 font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-on-surface">W12 Final Edition</span>
</div>
<div class="absolute bottom-3 right-3 bg-heritage-surface-container-lowest/90 px-3 py-1 font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-on-surface">
                1,840 Miles
              </div>
</div>
<div class="p-heritage-space-md">
<div class="flex items-center justify-between mb-1">
<span class="font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-outline">Crewe, England</span>
<span class="font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-tertiary">All-Wheel Steering</span>
</div>
<h3 class="font-heritage-headline-sm text-heritage-headline-sm text-heritage-on-surface group-hover:text-heritage-primary transition-colors leading-snug">
                2023 Bentley Continental GT Speed
              </h3>
<p class="font-heritage-body-sm text-heritage-body-sm text-heritage-on-surface-variant mt-1">Anthracite, Rotating Display, Naim High-End Audio System</p>
<div class="grid grid-cols-2 gap-2 mt-4 py-3 bg-heritage-surface-container px-3">
<div class="flex flex-col">
<span class="font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-outline">Engine</span>
<span class="font-heritage-body-sm text-heritage-body-sm text-heritage-on-surface font-semibold">6.0L Twin-Turbo W12 (650 HP)</span>
</div>
<div class="flex flex-col">
<span class="font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-outline">Gearbox</span>
<span class="font-heritage-body-sm text-heritage-body-sm text-heritage-on-surface font-semibold">8-Speed Dual-Clutch</span>
</div>
</div>
</div>
</div>
<div class="p-heritage-space-md pt-0">
<div class="flex items-center justify-between mb-4">
<span class="font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-outline">Acquisition Value</span>
<span class="font-heritage-headline-sm text-heritage-headline-sm text-heritage-primary font-bold">Rp 4.992.000.000</span>
</div>
<div class="grid grid-cols-2 gap-2">
<button class="bg-heritage-surface-container hover:bg-heritage-surface-bright text-heritage-on-surface py-2.5 font-heritage-label-ui text-heritage-label-ui uppercase tracking-wider text-center transition-colors" onclick="openModal('Bentley')">
                View Specs
              </button>
<a class="bg-heritage-primary-container hover:bg-heritage-primary text-heritage-on-primary-container hover:text-heritage-on-primary py-2.5 font-heritage-label-ui text-heritage-label-ui uppercase tracking-wider text-center transition-colors flex items-center justify-center gap-1" href="https://wa.me/?text=Inquiring%20about%202023%20Bentley%20Continental%20GT%20Speed" target="_blank">
<span class="material-symbols-outlined text-[16px]">chat</span> WhatsApp
              </a>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- ========================================== -->
<!-- 3. FEATURED SPOTLIGHT / CAR DETAIL CONTAINER -->
<!-- ========================================== -->
<section class="w-full bg-heritage-surface-container-lowest py-20" id="vehicle-categories">
<div class="max-w-7xl mx-auto px-heritage-gutter">
<div class="bg-heritage-surface-container-low p-heritage-space-lg lg:p-12 shadow-2xl relative overflow-hidden">
<div class="absolute -right-20 -bottom-20 w-96 h-96 bg-heritage-primary/5 rounded-heritage-full blur-[100px] pointer-events-none"></div>
<div class="flex flex-col lg:flex-row gap-10 items-stretch">
<!-- Visual Column -->
<div class="lg:w-7/12 flex flex-col justify-between">
<div>
<div class="flex items-center gap-2 mb-3">
<span class="bg-heritage-primary text-heritage-on-primary px-3 py-1 font-heritage-label-technical text-heritage-label-technical uppercase tracking-widest">Spotlight of the Week</span>
<span class="font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-outline tracking-wider">Asset ID: APX-992-GT3RS</span>
</div>
<h2 class="font-heritage-headline-lg text-heritage-headline-lg text-heritage-on-surface leading-none mb-3">
                2023 Porsche 911 GT3 RS
              </h2>
<p class="font-heritage-body-md text-heritage-body-md text-heritage-on-surface-variant max-w-lg mb-6">
                Equipped with the Weissach Package and lightweight magnesium wheels. The definitive naturally aspirated track instrument, calibrated for both the Nürburgring and discerning private collectors.
              </p>
</div>
<!-- HD Visual & Feature Chips -->
<div class="relative h-[320px] lg:h-[400px] w-full overflow-hidden shadow-lg group mb-6">
<img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" data-alt="Close up dynamic 3/4 angle shot of a 2023 Porsche 911 GT3 RS in Shark Blue highlighting carbon bonnet ducts, yellow ceramic brake calipers, magnesium forged wheels, dramatic automotive studio lighting" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCsDeuK02Dc1_JDzxwFleFbrFlcaT50-jvxvVPDOwoZRv9ogq36Py4uvLMintw9ddiIoK4OltpXxEWy7t2bd1yCaSLOk8RnLhj99B18B3hHjf5N3WAGr8HVYisinhpsxNOMDW6kAzsA-dLAeYGPsPh7GdJ7MVyGWzn52TkjVVT5Ptuf7dlH3hHyc6rbsE1bRveHiZUWExhtYtii6mU7svpFquilXdsmBSS3xiCjjr5td4FypcS1ik1Q9w"/>
<div class="absolute bottom-4 left-4 right-4 flex flex-wrap gap-2">
<span class="bg-heritage-surface-container-lowest/90 backdrop-blur-md px-3 py-1.5 font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-on-surface flex items-center gap-1.5">
<span class="material-symbols-outlined text-[16px] text-heritage-primary">check_circle</span> Front Axle Lift System
                </span>
<span class="bg-heritage-surface-container-lowest/90 backdrop-blur-md px-3 py-1.5 font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-on-surface flex items-center gap-1.5">
<span class="material-symbols-outlined text-[16px] text-heritage-primary">check_circle</span> PCCB Ceramic Brakes
                </span>
<span class="bg-heritage-surface-container-lowest/90 backdrop-blur-md px-3 py-1.5 font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-on-surface flex items-center gap-1.5">
<span class="material-symbols-outlined text-[16px] text-heritage-primary">check_circle</span> Weissach Carbon Package
                </span>
</div>
</div>
<!-- Action Buttons Strip -->
<div class="flex flex-wrap items-center gap-heritage-space-md">
<button class="bg-heritage-primary-container hover:bg-heritage-primary text-heritage-on-primary-container hover:text-heritage-on-primary px-heritage-space-lg py-3.5 font-heritage-label-ui text-heritage-label-ui uppercase tracking-widest transition-all" onclick="alert('Concierge reservation portal opened for 2023 Porsche 911 GT3 RS. Wire instructions transmitted upon confirmation.')">
                Reserve with Rp 160.000.000 Deposit
              </button>
<button class="bg-heritage-surface-container hover:bg-heritage-surface-bright text-heritage-on-surface px-heritage-space-lg py-3.5 font-heritage-label-ui text-heritage-label-ui uppercase tracking-widest transition-colors flex items-center gap-2" onclick="alert('Virtual walkaround link requested. Our Chief Curator will contact you via WhatsApp with 4K video recording.')">
<span class="material-symbols-outlined text-[18px]">play_circle</span> Request 4K Video Walkaround
              </button>
</div>
</div>
<!-- Technical Dossier Specs Column -->
<div class="lg:w-5/12 bg-heritage-surface-container p-heritage-space-lg flex flex-col justify-between shadow-inner">
<div>
<div class="flex items-center justify-between pb-4 border-b border-heritage-outline-variant/30">
<span class="font-heritage-label-technical text-heritage-label-technical uppercase tracking-widest text-heritage-outline">Forensic Dossier</span>
<span class="font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-tertiary">100% Match • Clean Title</span>
</div>
<!-- Spec Key-Value Table -->
<div class="space-y-3.5 py-5 font-heritage-body-sm text-heritage-body-sm">
<div class="flex justify-between items-center py-1 border-b border-heritage-outline-variant/20">
<span class="text-heritage-on-surface-variant font-heritage-label-technical text-heritage-label-technical uppercase">Powertrain</span>
<span class="text-heritage-on-surface font-semibold text-right">4.0L Boxer-6 Naturally Aspirated</span>
</div>
<div class="flex justify-between items-center py-1 border-b border-heritage-outline-variant/20">
<span class="text-heritage-on-surface-variant font-heritage-label-technical text-heritage-label-technical uppercase">Power Output</span>
<span class="text-heritage-on-surface font-semibold text-right">518 HP @ 9,000 RPM (Redline)</span>
</div>
<div class="flex justify-between items-center py-1 border-b border-heritage-outline-variant/20">
<span class="text-heritage-on-surface-variant font-heritage-label-technical text-heritage-label-technical uppercase">Transmission</span>
<span class="text-heritage-on-surface font-semibold text-right">7-Speed PDK Dual-Clutch</span>
</div>
<div class="flex justify-between items-center py-1 border-b border-heritage-outline-variant/20">
<span class="text-heritage-on-surface-variant font-heritage-label-technical text-heritage-label-technical uppercase">Odometer</span>
<span class="text-heritage-on-surface font-semibold text-right">840 Miles Verified</span>
</div>
<div class="flex justify-between items-center py-1 border-b border-heritage-outline-variant/20">
<span class="text-heritage-on-surface-variant font-heritage-label-technical text-heritage-label-technical uppercase">Exterior Livery</span>
<span class="text-heritage-on-surface font-semibold text-right">Shark Blue w/ Exposed Carbon</span>
</div>
<div class="flex justify-between items-center py-1 border-b border-heritage-outline-variant/20">
<span class="text-heritage-on-surface-variant font-heritage-label-technical text-heritage-label-technical uppercase">Interior Cabin</span>
<span class="text-heritage-on-surface font-semibold text-right">Black Leather &amp; Race-Tex w/ Silver</span>
</div>
<div class="flex justify-between items-center py-1 border-b border-heritage-outline-variant/20">
<span class="text-heritage-on-surface-variant font-heritage-label-technical text-heritage-label-technical uppercase">Chassis / VIN</span>
<span class="text-heritage-on-surface font-semibold text-right">WP0AF2A97PS289***</span>
</div>
<div class="flex justify-between items-center py-1">
<span class="text-heritage-on-surface-variant font-heritage-label-technical text-heritage-label-technical uppercase">Warranty Status</span>
<span class="text-heritage-primary font-semibold text-right">Factory Transferable thru 2027</span>
</div>
</div>
</div>
<!-- Price & PDF Download -->
<div class="pt-6 border-t border-heritage-outline-variant/30 flex flex-col gap-4">
<div class="flex items-center justify-between">
<div>
<span class="font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-outline">Showroom Listing</span>
<div class="font-heritage-headline-md text-heritage-headline-md text-heritage-primary font-bold leading-none">Rp 6.224.000.000</div>
</div>
<a class="font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-tertiary hover:underline tracking-wider" href="#financing-studio">
                  Estimate Financing →
                </a>
</div>
<button class="w-full bg-heritage-surface-container-high hover:bg-heritage-surface-bright text-heritage-on-surface py-3 font-heritage-label-ui text-heritage-label-ui uppercase tracking-wider flex items-center justify-center gap-2 transition-colors" onclick="alert('Inspection Dossier PDF (28 pages, complete paint-depth readings, ECU diagnostics, DME overrev report) downloaded.')">
<span class="material-symbols-outlined text-[18px]">download_for_offline</span> Download Inspection Dossier (PDF)
              </button>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- ========================================== -->
<!-- 4. VEHICLE CATEGORIES & HERITAGE GALLERY    -->
<!-- ========================================== -->
<section class="w-full bg-heritage-surface py-20">
<div class="max-w-7xl mx-auto px-heritage-gutter">
<div class="text-center max-w-2xl mx-auto mb-16">
<span class="font-heritage-label-technical text-heritage-label-technical uppercase tracking-[0.2em] text-heritage-primary">Curatorial Pillars</span>
<h2 class="font-heritage-headline-lg text-heritage-headline-lg text-heritage-on-surface mt-2">Vehicle Categories</h2>
<p class="font-heritage-body-md text-heritage-body-md text-heritage-on-surface-variant mt-2">
          From homologated track weapons to coachbuilt mid-century elegance, our acquisition specialists maintain discrete portfolios across four distinct disciplines.
        </p>
</div>
<!-- Category Split Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-heritage-space-lg mb-16">
<!-- Tile 1 -->
<div class="bg-heritage-surface-container-low group overflow-hidden shadow-lg flex flex-col justify-between">
<div class="relative h-64 overflow-hidden">
<img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" data-alt="Exotic McLaren Senna carbon track supercar in glossy bare carbon weave with orange aero accents, low angle shot in high tech race workshop" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDtdqnwtiWPbbShAVVKFs7gmN75j4zre_WhZYCvmYyeA2_Z5ePTAdbhok6h4b07G00RLW3YH5cFqBgbwhq6kqE6UrkB3aJcjEkBu9FAGYo902jh7yPvIdbbheHEe_lbLPf0COarQDfHYvquMGHuv1y-0EVloDxNZfH8r0VItq8DGEr3pwecrzdafXOIZUi00b0C_34SA5pWc7aNVWuwE16mU7p3c-W0vbGe9G3o1fxgiFRurg8EewlzHQ"/>
<div class="absolute inset-0 bg-gradient-to-t from-heritage-surface-container-low via-transparent to-transparent"></div>
<span class="absolute top-3 left-3 bg-heritage-surface-container-lowest/90 px-2.5 py-1 font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-primary">01</span>
</div>
<div class="p-heritage-space-md">
<h3 class="font-heritage-headline-sm text-heritage-headline-sm text-heritage-on-surface group-hover:text-heritage-primary transition-colors">
              Exotic &amp; Track Supercars
            </h3>
<p class="font-heritage-body-sm text-heritage-body-sm text-heritage-on-surface-variant mt-2">
              Homologation specials, aerodynamic marvels, and naturally aspirated V10/V12 legends engineered for supreme track precision.
            </p>
<div class="mt-4 pt-3 flex items-center justify-between text-heritage-outline">
<span class="font-heritage-label-technical text-heritage-label-technical uppercase">8 Vehicles Available</span>
<span class="material-symbols-outlined text-[18px] group-hover:translate-x-1 transition-transform text-heritage-primary">east</span>
</div>
</div>
</div>
<!-- Tile 2 -->
<div class="bg-heritage-surface-container-low group overflow-hidden shadow-lg flex flex-col justify-between">
<div class="relative h-64 overflow-hidden">
<img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" data-alt="1960s classic Jaguar E-Type Series 1 fixed head coupe in British Racing Green with chrome wire spoke wheels, moody studio heritage portrait" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCX8im7xiezyz6wQwvlhMDQOFm4CgEZ6HT2Il_guoQiKuUJKXpW-mTJuAkkAMNna_ltEd1Et01JwCEpx4e1Qd2oaqFtmj2lrNZWeaDo49wdW8eM3bV93JU9I5uoDnbwJW4U1vfkswVRaIPUVKXedqINdrGSEy5SLuXkZdydttv4C47DlhI3k6HjVQRnmoS8EIaCFJumPERzh4XsED9Ve-HSn4JEOMJ8R2a3DEkhTe5MoZE42inaAlFcBw"/>
<div class="absolute inset-0 bg-gradient-to-t from-heritage-surface-container-low via-transparent to-transparent"></div>
<span class="absolute top-3 left-3 bg-heritage-surface-container-lowest/90 px-2.5 py-1 font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-tertiary">02</span>
</div>
<div class="p-heritage-space-md">
<h3 class="font-heritage-headline-sm text-heritage-headline-sm text-heritage-on-surface group-hover:text-heritage-primary transition-colors">
              Timeless Coachbuilt Icons
            </h3>
<p class="font-heritage-body-sm text-heritage-body-sm text-heritage-on-surface-variant mt-2">
              Hand-formed aluminum bodywork, documented rally provenance, and concours preservation entries from historic eras.
            </p>
<div class="mt-4 pt-3 flex items-center justify-between text-heritage-outline">
<span class="font-heritage-label-technical text-heritage-label-technical uppercase">5 Vehicles Available</span>
<span class="material-symbols-outlined text-[18px] group-hover:translate-x-1 transition-transform text-heritage-primary">east</span>
</div>
</div>
</div>
<!-- Tile 3 -->
<div class="bg-heritage-surface-container-low group overflow-hidden shadow-lg flex flex-col justify-between">
<div class="relative h-64 overflow-hidden">
<img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" data-alt="Modern Bentley Flying Spur Mulliner sedan in dark metallic navy, ultra-luxury grand tourer interior visible through tinted glass, bespoke executive limousine" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAQionizDCp7GY3mebwIcLIJyj2dy5EWbosDM3qottn7tlJn-V6wsBDwg2VXMWV3S39fPUvwXwwMGho4PFtnzpuj-Fp0eEdI4ZGdCgZfiH_YIWAbqSsDLvacjhMGBK_9aNGpj5bRywxamLCMzYCbQo2y4LdF0BLowF6Ryw4qsMb3ZKpX-7hKLhdkxdnZ6ZRZUg6SDRICqsBrNbtolHuN2Cicq36bGCxlSyFRtfY-0o0o-Wp8Je_Wlog0Q"/>
<div class="absolute inset-0 bg-gradient-to-t from-heritage-surface-container-low via-transparent to-transparent"></div>
<span class="absolute top-3 left-3 bg-heritage-surface-container-lowest/90 px-2.5 py-1 font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-primary">03</span>
</div>
<div class="p-heritage-space-md">
<h3 class="font-heritage-headline-sm text-heritage-headline-sm text-heritage-on-surface group-hover:text-heritage-primary transition-colors">
              Executive Luxury &amp; Tourers
            </h3>
<p class="font-heritage-body-sm text-heritage-body-sm text-heritage-on-surface-variant mt-2">
              Peerless transcontinental grand tourers with acoustic glass, hand-stitched hides, and whisper-quiet twelve-cylinder refinement.
            </p>
<div class="mt-4 pt-3 flex items-center justify-between text-heritage-outline">
<span class="font-heritage-label-technical text-heritage-label-technical uppercase">6 Vehicles Available</span>
<span class="material-symbols-outlined text-[18px] group-hover:translate-x-1 transition-transform text-heritage-primary">east</span>
</div>
</div>
</div>
<!-- Tile 4 -->
<div class="bg-heritage-surface-container-low group overflow-hidden shadow-lg flex flex-col justify-between">
<div class="relative h-64 overflow-hidden">
<img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" data-alt="Limited edition Bugatti Chiron Pur Sport hypercar in matte blue and carbon weave sitting inside a climate-controlled vault with ambient linear ceiling lights" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDCJoJmABryHN613MAVvJ5xzLPWe_Bn0giSrukI9UnnSbwcEThCsf9S88MB5VTAlNIwOnFzzw3mVjU-IcNRZNAk7AO7bJT-4UdPlgsW4mIYRKUV1GZhGhytwPyqgT6xdSJA0MaKWte8FaxQ2vd_0UrQURU72YubGAq988h1TtfUVdl9eHNgSwNJasEP18dchDarbbHs58m62DYFE9R9o0EpcPBUDEJjO8ZLS5nKC5_35pjTaxp5zinZKA"/>
<div class="absolute inset-0 bg-gradient-to-t from-heritage-surface-container-low via-transparent to-transparent"></div>
<span class="absolute top-3 left-3 bg-heritage-surface-container-lowest/90 px-2.5 py-1 font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-tertiary">04</span>
</div>
<div class="p-heritage-space-md">
<h3 class="font-heritage-headline-sm text-heritage-headline-sm text-heritage-on-surface group-hover:text-heritage-primary transition-colors">
              Hypercars &amp; Off-Market
            </h3>
<p class="font-heritage-body-sm text-heritage-body-sm text-heritage-on-surface-variant mt-2">
              Confidential allocations, 1-of-few production serials, and private client consignments not displayed on open markets.
            </p>
<div class="mt-4 pt-3 flex items-center justify-between text-heritage-outline">
<span class="font-heritage-label-technical text-heritage-label-technical uppercase">Private Vault Inquiries</span>
<span class="material-symbols-outlined text-[18px] group-hover:translate-x-1 transition-transform text-heritage-primary">east</span>
</div>
</div>
</div>
</div>
<!-- Atelier & Handover Gallery Mosaic -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-heritage-space-lg">
<div class="relative h-80 bg-heritage-surface-container overflow-hidden group shadow-lg">
<img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" data-alt="Climate-controlled automotive vault with polished concrete floors and illuminated glass cases showcasing rare coachbuilt motorcars under moody directional downlights" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCoDVXooEtGRkMo68xZi4mmhfqMP6H8sRDo3dFNuh8GDt93CLHerD3GVegi0uuQYRx_9rcZi3OnZ0CAtUy_V7MlawgfQu9LMl03ZUQQvhMxfC_T4FzvNC3tVk5SV9_eGsWog49FbCBGyzCtGOmJwxz0bkgIK-LdlMs95NzB6Ia3JR_j0ok9SX4bBPCzfa6cp_EscH7h92wcgedv1lbw4EllbseYZ0qRIj9OpxkmyeEvBRSNRqzvpUSP7g"/>
<div class="absolute inset-0 bg-gradient-to-t from-heritage-surface-container-lowest via-transparent to-transparent"></div>
<div class="absolute bottom-4 left-4 right-4">
<span class="font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-primary">The Vault</span>
<h4 class="font-heritage-headline-sm text-heritage-headline-sm text-heritage-on-surface">Climate-Controlled Sanctuary</h4>
</div>
</div>
<div class="relative h-80 bg-heritage-surface-container overflow-hidden group shadow-lg">
<img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" data-alt="Master automotive detailer applying high-grade ceramic coating under specialized inspection lighting on a vintage Ferrari curved fender, surgical clean atelier" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBrmRVMnJUgqbkM7XjH9vRzjkxh2bYSV7oLZ8KmO6j8efUUiGm6EZpV7nf9awk8kPn5gwzXJX-jONKoxvK-ag9EpO_DptxCo88SGLidC3ECqV5So7fy2m5H5JmIR4T2-4yRoQtLdWfwlqP9S_LWoCQGshWZFsDwRka0wnCrlSbcS36m6-TNAdqzP9xuaS_hN-DD_1XyPsKzu2U1mw-LM2xkYNi9CDXe6T0TmtqeHMjaFzeMGiWkRV_tLg"/>
<div class="absolute inset-0 bg-gradient-to-t from-heritage-surface-container-lowest via-transparent to-transparent"></div>
<div class="absolute bottom-4 left-4 right-4">
<span class="font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-primary">The Atelier</span>
<h4 class="font-heritage-headline-sm text-heritage-headline-sm text-heritage-on-surface">180-Point Forensic Certification</h4>
</div>
</div>
<div class="relative h-80 bg-heritage-surface-container overflow-hidden group shadow-lg">
<img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" data-alt="Private handover lounge with mid-century leather armchairs, espresso bar, architectural fireplace, and an uncovered supercar ready for ceremonial key presentation" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBzvhNAmWz79RyftAEoSYvcPFFEml8PzikPmDwvWHw4HeIvnG6ddsPL-Ulpi-AWyioWDvRvjpB3lgyiOlrzsqrjGFDQ0k6LmdRCDcLwVL2Sf_BiJ2lGRfq8i2BC4QpktxebbXff4eQulIxeJaT4gWD73Md48h3g5e0VTWX_H5Qy8b1AnR10EzT93-Un7gZRybzhhms992l-5eAZwjbzk-vChG7LRQBH4oti98YcFuIOAphMpbPjg7s7jg"/>
<div class="absolute inset-0 bg-gradient-to-t from-heritage-surface-container-lowest via-transparent to-transparent"></div>
<div class="absolute bottom-4 left-4 right-4">
<span class="font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-primary">The Handover</span>
<h4 class="font-heritage-headline-sm text-heritage-headline-sm text-heritage-on-surface">Private VIP Delivery Salon</h4>
</div>
</div>
</div>
</div>
</section>
<!-- ========================================== -->
<!-- 5. BESPOKE FINANCING & TRADE-IN CALCULATOR -->
<!-- ========================================== -->
<section class="w-full bg-heritage-surface-container-lowest py-20" id="financing">
<div class="max-w-7xl mx-auto px-heritage-gutter">
<div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
<!-- Explanatory Text Column -->
<div class="lg:col-span-5">
<div class="inline-flex items-center gap-2 bg-heritage-surface-container-low px-3 py-1 mb-3">
<span class="material-symbols-outlined text-heritage-primary text-[18px]">account_balance</span>
<span class="font-heritage-label-technical text-heritage-label-technical uppercase tracking-widest text-heritage-primary">Structured Capital</span>
</div>
<h2 class="font-heritage-headline-lg text-heritage-headline-lg text-heritage-on-surface leading-tight">
            Bespoke Financing &amp; Asset Advisory
          </h2>
<p class="font-heritage-body-md text-heritage-body-md text-heritage-on-surface-variant mt-4 leading-relaxed">
            Apex Heritage collaborates with elite global private banks and specialty lenders to provide structured lease arrangements, balloon repayment frameworks, and non-recourse credit lines for distinguished acquisitions.
          </p>
<div class="mt-8 space-y-4 font-heritage-body-sm text-heritage-body-sm text-heritage-on-surface-variant">
<div class="flex items-start gap-3">
<span class="material-symbols-outlined text-heritage-primary text-[20px] shrink-0 mt-0.5">shield</span>
<div>
<strong class="text-heritage-on-surface block">Confidential Discretion</strong>
                Custom SPV and corporate trust purchasing facilities structured without credit bureau friction.
              </div>
</div>
<div class="flex items-start gap-3">
<span class="material-symbols-outlined text-heritage-primary text-[20px] shrink-0 mt-0.5">swap_horizontal_circle</span>
<div>
<strong class="text-heritage-on-surface block">Exotic Trade-In Appraisals</strong>
                Immediate liquidity against your current collection toward your incoming acquisition.
              </div>
</div>
</div>
<div class="mt-8 pt-6 border-t border-heritage-outline-variant/30 flex items-center gap-4">
<button class="bg-heritage-surface-container-high hover:bg-heritage-surface-bright text-heritage-on-surface px-heritage-space-md py-3 font-heritage-label-ui text-heritage-label-ui uppercase tracking-wider transition-colors" onclick="document.getElementById('test-drive').scrollIntoView({behavior: 'smooth'})">
              Request Trade Appraisal
            </button>
<span class="font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-outline">Indicative rates from 7.25% p.a.</span>
</div>
</div>
<!-- Interactive Calculator Widget Column -->
<div class="lg:col-span-7 bg-heritage-surface-container-low p-heritage-space-lg lg:p-10 shadow-2xl">
<div class="flex items-center justify-between pb-6 border-b border-heritage-outline-variant/30 mb-8">
<span class="font-heritage-headline-sm text-heritage-headline-sm text-heritage-on-surface">Payment Simulator</span>
<span class="font-heritage-label-technical text-heritage-label-technical uppercase px-2.5 py-1 bg-heritage-surface-container text-heritage-tertiary">Real-Time Estimator</span>
</div>
<!-- Controls -->
<div class="space-y-6">
<!-- Price Slider -->
<div>
<div class="flex justify-between items-center mb-2">
<label class="font-heritage-label-technical text-heritage-label-technical uppercase tracking-wider text-heritage-outline" for="calcPrice">Vehicle Purchase Price</label>
<span class="font-heritage-title-lg text-heritage-title-lg text-heritage-primary font-bold" id="priceDisplay">Rp 6.224.000.000</span>
</div>
<input class="w-full accent-primary h-1.5 bg-heritage-surface-container-highest cursor-pointer" id="calcPrice" max="1500000" min="150000" oninput="calculateFinance()" step="10000" type="range" value="389000"/>
<div class="flex justify-between text-heritage-outline text-[10px] font-heritage-label-technical mt-1 uppercase">
<span>Rp 2.400.000.000</span>
<span>Rp 12.000.000.000</span>
<span>Rp 24.000.000.000+</span>
</div>
</div>
<!-- Down Payment Slider -->
<div>
<div class="flex justify-between items-center mb-2">
<label class="font-heritage-label-technical text-heritage-label-technical uppercase tracking-wider text-heritage-outline" for="calcDown">Down Payment Percentage</label>
<span class="font-heritage-title-lg text-heritage-title-lg text-heritage-on-surface font-semibold" id="downDisplay">25% (Rp 1.556.000.000)</span>
</div>
<input class="w-full accent-primary h-1.5 bg-heritage-surface-container-highest cursor-pointer" id="calcDown" max="50" min="10" oninput="calculateFinance()" step="5" type="range" value="25"/>
<div class="flex justify-between text-heritage-outline text-[10px] font-heritage-label-technical mt-1 uppercase">
<span>10% (Min)</span>
<span>30%</span>
<span>50% (Max)</span>
</div>
</div>
<!-- Loan Term Selector -->
<div>
<label class="block font-heritage-label-technical text-heritage-label-technical uppercase tracking-wider text-heritage-outline mb-2">Amortization Term</label>
<div class="grid grid-cols-4 gap-2">
<button class="term-btn py-2.5 font-heritage-label-ui text-heritage-label-ui uppercase tracking-wider bg-heritage-surface-container text-heritage-on-surface-variant transition-colors" onclick="setTerm(24, this)" type="button">24 Mo</button>
<button class="term-btn py-2.5 font-heritage-label-ui text-heritage-label-ui uppercase tracking-wider bg-heritage-surface-container text-heritage-on-surface-variant transition-colors" onclick="setTerm(36, this)" type="button">36 Mo</button>
<button class="term-btn py-2.5 font-heritage-label-ui text-heritage-label-ui uppercase tracking-wider bg-heritage-primary text-heritage-on-primary font-bold transition-colors" onclick="setTerm(48, this)" type="button">48 Mo</button>
<button class="term-btn py-2.5 font-heritage-label-ui text-heritage-label-ui uppercase tracking-wider bg-heritage-surface-container text-heritage-on-surface-variant transition-colors" onclick="setTerm(60, this)" type="button">60 Mo</button>
</div>
</div>
</div>
<!-- Output Box -->
<div class="mt-8 pt-6 border-t border-heritage-outline-variant/30 bg-heritage-surface-container p-heritage-space-md flex flex-col sm:flex-row sm:items-center justify-between gap-4">
<div>
<span class="font-heritage-label-technical text-heritage-label-technical uppercase tracking-wider text-heritage-outline block">Estimated Monthly Commitment</span>
<div class="flex items-baseline gap-2">
<span class="font-heritage-headline-lg text-heritage-headline-lg text-heritage-primary font-bold" id="monthlyDisplay">Rp 108.512.000</span>
<span class="font-heritage-body-sm text-heritage-body-sm text-heritage-outline">/ month*</span>
</div>
<span class="font-heritage-body-sm text-heritage-body-sm text-heritage-outline text-[11px] block mt-0.5">Illustrative estimate using a 7.25% annual financing benchmark. Balloon structuring optional.</span>
</div>
<button class="bg-heritage-primary-container hover:bg-heritage-primary text-heritage-on-primary-container hover:text-heritage-on-primary px-heritage-space-lg py-3 font-heritage-label-ui text-heritage-label-ui uppercase tracking-widest transition-colors shrink-0" onclick="alert('Structured credit application dispatched to private client finance desk.')">
              Apply For Credit
            </button>
</div>
</div>
</div>
</div>
</section>
<!-- ========================================== -->
<!-- 6. SHOWROOM HERITAGE & THE APEX STANDARD   -->
<!-- ========================================== -->
<section class="w-full bg-heritage-surface py-20">
<div class="max-w-7xl mx-auto px-heritage-gutter">
<div class="text-center max-w-2xl mx-auto mb-16">
<span class="font-heritage-label-technical text-heritage-label-technical uppercase tracking-[0.2em] text-heritage-primary">Uncompromising Discipline</span>
<h2 class="font-heritage-headline-lg text-heritage-headline-lg text-heritage-on-surface mt-2">The Apex Standard</h2>
<p class="font-heritage-body-md text-heritage-body-md text-heritage-on-surface-variant mt-2">
          An automotive atelier rooted in forensic integrity. We reject over 92% of candidate consignments to guarantee only unimpeachable provenance enters our vault.
        </p>
</div>
<!-- 4 Core Pillars -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-heritage-space-lg">
<div class="bg-heritage-surface-container-low p-heritage-space-lg shadow-lg flex flex-col justify-between">
<div>
<div class="w-12 h-12 bg-heritage-surface-container flex items-center justify-center text-heritage-primary mb-6">
<span class="material-symbols-outlined text-[26px]">rule</span>
</div>
<h3 class="font-heritage-headline-sm text-heritage-headline-sm text-heritage-on-surface mb-2">180-Point Inspection</h3>
<p class="font-heritage-body-sm text-heritage-body-sm text-heritage-on-surface-variant">
              Comprehensive paint-meter forensic scan, DME rev-range verification, compression tests, and frame telemetry scan to ensure authentic structural integrity.
            </p>
</div>
<span class="font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-outline mt-6 tracking-widest">Protocol Alpha</span>
</div>
<div class="bg-heritage-surface-container-low p-heritage-space-lg shadow-lg flex flex-col justify-between">
<div>
<div class="w-12 h-12 bg-heritage-surface-container flex items-center justify-center text-heritage-primary mb-6">
<span class="material-symbols-outlined text-[26px]">history_edu</span>
</div>
<h3 class="font-heritage-headline-sm text-heritage-headline-sm text-heritage-on-surface mb-2">Forensic Provenance</h3>
<p class="font-heritage-body-sm text-heritage-body-sm text-heritage-on-surface-variant">
              Every chassis is matched to original factory build sheets, museum archive registries, service invoices, and previous ownership title chains.
            </p>
</div>
<span class="font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-outline mt-6 tracking-widest">Protocol Beta</span>
</div>
<div class="bg-heritage-surface-container-low p-heritage-space-lg shadow-lg flex flex-col justify-between">
<div>
<div class="w-12 h-12 bg-heritage-surface-container flex items-center justify-center text-heritage-primary mb-6">
<span class="material-symbols-outlined text-[26px]">security</span>
</div>
<h3 class="font-heritage-headline-sm text-heritage-headline-sm text-heritage-on-surface mb-2">Absolute Discretion</h3>
<p class="font-heritage-body-sm text-heritage-body-sm text-heritage-on-surface-variant">
              High-net-worth acquisitions protected by non-disclosure agreements, shielded escrow conduits, and encrypted family office records.
            </p>
</div>
<span class="font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-outline mt-6 tracking-widest">Protocol Gamma</span>
</div>
<div class="bg-heritage-surface-container-low p-heritage-space-lg shadow-lg flex flex-col justify-between">
<div>
<div class="w-12 h-12 bg-heritage-surface-container flex items-center justify-center text-heritage-primary mb-6">
<span class="material-symbols-outlined text-[26px]">local_shipping</span>
</div>
<h3 class="font-heritage-headline-sm text-heritage-headline-sm text-heritage-on-surface mb-2">Enclosed Delivery</h3>
<p class="font-heritage-body-sm text-heritage-body-sm text-heritage-on-surface-variant">
              Air-ride, climate-controlled enclosed transporters deliver directly to private hangars, motor courts, or overseas shipping harbors globally.
            </p>
</div>
<span class="font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-outline mt-6 tracking-widest">Protocol Delta</span>
</div>
</div>
</div>
</section>
<!-- ========================================== -->
<!-- 7. CLIENT TWIBIMONIALS & ACCREDITATIONS   -->
<!-- ========================================== -->
<section class="w-full bg-heritage-surface-container-lowest py-20" id="testimonials">
<div class="max-w-7xl mx-auto px-heritage-gutter">
<!-- Top Testimonials Headline & Google Badge -->
<div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12">
<div>
<span class="font-heritage-label-technical text-heritage-label-technical uppercase tracking-[0.2em] text-heritage-primary">Collector Accreditations</span>
<h2 class="font-heritage-headline-lg text-heritage-headline-lg text-heritage-on-surface mt-2">Testimonials of Distinction</h2>
</div>
<div class="bg-heritage-surface-container-low px-5 py-3 shadow-md flex items-center gap-4">
<div class="flex text-heritage-primary">
<span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">star</span>
</div>
<div class="flex flex-col border-l border-heritage-outline-variant/30 pl-4">
<span class="font-heritage-title-md text-heritage-title-md text-heritage-on-surface font-bold leading-none">5.0 / 5.0 Rating</span>
<span class="font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-outline text-[10px] mt-0.5">Verified Private Client Network</span>
</div>
</div>
</div>
<!-- Testimonial Cards Grid -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-heritage-space-lg mb-16">
<div class="bg-heritage-surface-container-low p-heritage-space-lg shadow-lg flex flex-col justify-between">
<div>
<div class="flex text-heritage-primary mb-4">
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
</div>
<p class="font-heritage-body-md text-heritage-body-md text-heritage-on-surface italic mb-6">
              "Acquiring my 1968 280SL Pagoda through Apex Heritage was the most transparent collector transaction I have experienced. The 28-page forensic binder matched the physical car to the micrometer."
            </p>
</div>
<div class="border-t border-heritage-outline-variant/30 pt-4 flex items-center justify-between">
<div>
<span class="font-heritage-title-md text-heritage-title-md text-heritage-on-surface font-semibold block">Dr. Julian Vance</span>
<span class="font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-outline text-[11px]">Pebble Beach Concours Entrant</span>
</div>
<span class="font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-primary">Surabaya</span>
</div>
</div>
<div class="bg-heritage-surface-container-low p-heritage-space-lg shadow-lg flex flex-col justify-between">
<div>
<div class="flex text-heritage-primary mb-4">
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
</div>
<p class="font-heritage-body-md text-heritage-body-md text-heritage-on-surface italic mb-6">
              "Discreet, swift, and thoroughly professional. Apex orchestrated the private off-market handover of my Ferrari Roma to Geneva without a single detail overlooked. Their enclosed transport is immaculate."
            </p>
</div>
<div class="border-t border-heritage-outline-variant/30 pt-4 flex items-center justify-between">
<div>
<span class="font-heritage-title-md text-heritage-title-md text-heritage-on-surface font-semibold block">Marcus Sterling</span>
<span class="font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-outline text-[11px]">Private Equity Managing Director</span>
</div>
<span class="font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-primary">Surabaya Private</span>
</div>
</div>
<div class="bg-heritage-surface-container-low p-heritage-space-lg shadow-lg flex flex-col justify-between">
<div>
<div class="flex text-heritage-primary mb-4">
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
</div>
<p class="font-heritage-body-md text-heritage-body-md text-heritage-on-surface italic mb-6">
              "The bespoke financing framework arranged by their family office advisory made adding the DBS 770 to my estate completely effortless. Apex defines modern automotive luxury."
            </p>
</div>
<div class="border-t border-heritage-outline-variant/30 pt-4 flex items-center justify-between">
<div>
<span class="font-heritage-title-md text-heritage-title-md text-heritage-on-surface font-semibold block">Lady Vivienne Montgomery</span>
<span class="font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-outline text-[11px]">Historic Automobile Society Trustee</span>
</div>
<span class="font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-primary">Surabaya, Indonesia</span>
</div>
</div>
</div>
<!-- Partner Accreditations Strip -->
<div class="bg-heritage-surface-container p-heritage-space-md flex flex-wrap items-center justify-around gap-6 text-heritage-on-surface-variant font-heritage-label-technical text-heritage-label-technical uppercase tracking-[0.2em] text-center">
<span>Sotheby's Motorsport Affiliate</span>
<span class="text-heritage-outline-variant">•</span>
<span>Concours d'Elegance Partner</span>
<span class="text-heritage-outline-variant">•</span>
<span>Goodwood Revival Accredited</span>
<span class="text-heritage-outline-variant">•</span>
<span>Mille Miglia Register Support</span>
</div>
</div>
</section>
<!-- ========================================== -->
<!-- 8. VIP TWIB DRIVE & PRIVATE VIEWING FORM   -->
<!-- ========================================== -->
<section class="w-full bg-heritage-surface py-20" id="test-drive">
<div class="max-w-7xl mx-auto px-heritage-gutter">
<div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
<!-- Booking Form Column -->
<div class="lg:col-span-7 bg-heritage-surface-container-low p-heritage-space-lg lg:p-12 shadow-2xl">
<div class="mb-8">
<span class="font-heritage-label-technical text-heritage-label-technical uppercase tracking-[0.2em] text-heritage-primary">Atelier Reservation</span>
<h2 class="font-heritage-headline-lg text-heritage-headline-lg text-heritage-on-surface mt-1">Schedule VIP Viewing</h2>
<p class="font-heritage-body-md text-heritage-body-md text-heritage-on-surface-variant mt-2">
              Private access to our vault showrooms or a tailored closed-circuit driving session accompanied by our Chief Performance Test Driver.
            </p>
</div>
<form class="space-y-5" id="viewingForm" onsubmit="handleReservation(event)">
<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
<div>
<label class="block font-heritage-label-technical text-heritage-label-technical uppercase tracking-wider text-heritage-outline mb-1" for="fullName">Full Legal Name *</label>
<input class="w-full bg-heritage-surface-container-lowest text-heritage-on-surface px-4 py-3 font-heritage-label-technical text-heritage-label-technical uppercase placeholder:text-heritage-outline focus:outline-none focus:bg-heritage-surface-container" id="fullName" placeholder="LORD / DR. / MR. SMITH" required="" type="text"/>
</div>
<div>
<label class="block font-heritage-label-technical text-heritage-label-technical uppercase tracking-wider text-heritage-outline mb-1" for="vipPhone">Direct Phone / WhatsApp *</label>
<input class="w-full bg-heritage-surface-container-lowest text-heritage-on-surface px-4 py-3 font-heritage-label-technical text-heritage-label-technical uppercase placeholder:text-heritage-outline focus:outline-none focus:bg-heritage-surface-container" id="vipPhone" placeholder="+1 (555) 019-2834" required="" type="tel"/>
</div>
</div>
<div>
<label class="block font-heritage-label-technical text-heritage-label-technical uppercase tracking-wider text-heritage-outline mb-1" for="vipEmail">Private Email *</label>
<input class="w-full bg-heritage-surface-container-lowest text-heritage-on-surface px-4 py-3 font-heritage-label-technical text-heritage-label-technical uppercase placeholder:text-heritage-outline focus:outline-none focus:bg-heritage-surface-container" id="vipEmail" placeholder="PRINCIPAL@FAMILYOFFICE.COM" required="" type="email"/>
</div>
<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
<div>
<label class="block font-heritage-label-technical text-heritage-label-technical uppercase tracking-wider text-heritage-outline mb-1" for="selectedCar">Motorcar of Interest *</label>
<select class="w-full bg-heritage-surface-container-lowest text-heritage-on-surface px-4 py-3 font-heritage-label-technical text-heritage-label-technical uppercase tracking-wider focus:outline-none focus:bg-heritage-surface-container" id="selectedCar">
<option value="Aston DBS 770">2024 Aston Martin DBS 770 Ultimate</option>
<option value="Porsche GT3 RS">2023 Porsche 911 GT3 RS Weissach</option>
<option value="Ferrari Roma">2022 Ferrari Roma Coupe</option>
<option value="Mercedes 280SL">1968 Mercedes-Benz 280SL Pagoda</option>
<option value="Rolls-Royce Ghost">2024 Rolls-Royce Ghost Black Badge</option>
<option value="Shelby GT500">1967 Shelby GT500 Fastback</option>
<option value="Other / Vault Consultation">Confidential Off-Market Consultation</option>
</select>
</div>
<div>
<label class="block font-heritage-label-technical text-heritage-label-technical uppercase tracking-wider text-heritage-outline mb-1" for="preferredDate">Preferred Date *</label>
<input class="w-full bg-heritage-surface-container-lowest text-heritage-on-surface px-4 py-2.5 font-heritage-label-technical text-heritage-label-technical uppercase focus:outline-none focus:bg-heritage-surface-container" id="preferredDate" required="" type="date"/>
</div>
</div>
<div>
<label class="block font-heritage-label-technical text-heritage-label-technical uppercase tracking-wider text-heritage-outline mb-2">Viewing Format</label>
<div class="grid grid-cols-1 sm:grid-cols-3 gap-2">
<label class="bg-heritage-surface-container p-3 flex items-center gap-2 cursor-pointer hover:bg-heritage-surface-bright">
<input checked="" class="accent-primary" name="format" type="radio" value="Showroom Vault"/>
<span class="font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-on-surface text-[11px]">Private Vault</span>
</label>
<label class="bg-heritage-surface-container p-3 flex items-center gap-2 cursor-pointer hover:bg-heritage-surface-bright">
<input class="accent-primary" name="format" type="radio" value="Residence Delivery"/>
<span class="font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-on-surface text-[11px]">Enclosed To Estate</span>
</label>
<label class="bg-heritage-surface-container p-3 flex items-center gap-2 cursor-pointer hover:bg-heritage-surface-bright">
<input class="accent-primary" name="format" type="radio" value="Virtual Live HD"/>
<span class="font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-on-surface text-[11px]">Virtual 4K Walkaround</span>
</label>
</div>
</div>
<div class="pt-3">
<button class="w-full bg-heritage-primary-container hover:bg-heritage-primary text-heritage-on-primary-container hover:text-heritage-on-primary py-4 font-heritage-label-ui text-heritage-label-ui uppercase tracking-widest transition-all shadow-[0_10px_30px_-10px_rgba(212,175,55,0.3)]" type="submit">
                Confirm VIP Viewing Invitation
              </button>
</div>
<p class="font-heritage-body-sm text-heritage-body-sm text-heritage-outline text-[11px] text-center">
              All appointments are strictly confidential. Our Chief Liaison contacts you within two operational hours.
            </p>
</form>
</div>
<!-- Showroom Location & Valet Card Column -->
<div class="lg:col-span-5 flex flex-col justify-between gap-heritage-space-lg" id="about-showroom">
<div class="bg-heritage-surface-container-low p-heritage-space-lg shadow-xl">
<span class="font-heritage-label-technical text-heritage-label-technical uppercase tracking-widest text-heritage-primary">Our Surabaya Showroom</span>
<h3 class="font-heritage-headline-sm text-heritage-headline-sm text-heritage-on-surface mt-2 mb-4">Surabaya, Indonesia</h3>
<!-- Map Container placeholder compliant with data-location spec -->
<div class="w-full h-48 bg-heritage-surface-container bg-cover bg-center mb-6 shadow-md relative group" data-location="Surabaya, East Java, Indonesia" style="">
<div class="absolute inset-0 bg-heritage-surface-container-lowest/40 backdrop-blur-[1px] flex items-center justify-center">
<span class="bg-heritage-surface-container-lowest/90 px-3 py-1 font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-primary flex items-center gap-1">
<span class="material-symbols-outlined text-[16px]">location_on</span> Surabaya Private Atelier
                </span>
</div>
</div>
<div class="space-y-4 font-heritage-body-sm text-heritage-body-sm">
<div class="flex flex-col pb-3 border-b border-heritage-outline-variant/30">
<span class="font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-primary font-bold">Surabaya Flagship Atelier</span>
<span class="text-heritage-on-surface">Surabaya Central Business District</span>
<span class="text-heritage-outline">Surabaya, East Java, Indonesia</span>
</div>
<div class="flex flex-col pb-3 border-b border-heritage-outline-variant/30">
<span class="font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-primary font-bold">Surabaya Private Vault</span>
<span class="text-heritage-on-surface">Surabaya, East Java, Indonesia</span>
<span class="text-heritage-outline">Surabaya, East Java, Indonesia</span>
</div>
<div class="flex justify-between items-center text-heritage-on-surface-variant font-heritage-label-technical text-heritage-label-technical uppercase">
<span>Showroom Hours</span>
<span class="text-heritage-on-surface">Mon - Sat: 09:00 - 19:00</span>
</div>
<div class="flex justify-between items-center text-heritage-on-surface-variant font-heritage-label-technical text-heritage-label-technical uppercase">
<span>Sunday</span>
<span class="text-heritage-primary">Private Appointment Only</span>
</div>
</div>
</div>
<div class="bg-heritage-surface-container p-heritage-space-md shadow-lg flex items-center gap-4">
<div class="w-10 h-10 bg-heritage-primary-container text-heritage-on-primary-container flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-[20px]">local_parking</span>
</div>
<div>
<span class="font-heritage-title-md text-heritage-title-md text-heritage-on-surface font-semibold block leading-tight">Complimentary Valet &amp; Security</span>
<span class="font-heritage-body-sm text-heritage-body-sm text-heritage-on-surface-variant">Subterranean private security checkpoint and enclosed vehicle reception upon arrival.</span>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- ========================================== -->
<!-- 9. FREQUENTLY ASKED QUWIBIONS (FAQ)       -->
<!-- ========================================== -->
<section class="w-full bg-heritage-surface-container-lowest py-20" id="faq">
<div class="max-w-4xl mx-auto px-heritage-gutter">
<div class="text-center mb-12">
<span class="font-heritage-label-technical text-heritage-label-technical uppercase tracking-[0.2em] text-heritage-primary">Inquiries &amp; Guidance</span>
<h2 class="font-heritage-headline-lg text-heritage-headline-lg text-heritage-on-surface mt-2">Frequently Asked Questions</h2>
<p class="font-heritage-body-md text-heritage-body-md text-heritage-on-surface-variant mt-2">
          Transparent advisory on provenance authenticity, worldwide freight mechanics, bespoke consignment, and private acquisition terms.
        </p>
</div>
<!-- Accordion FAQ Container -->
<div class="space-y-3" id="faqAccordion">
<!-- Item 1 -->
<div class="faq-item bg-heritage-surface-container-low shadow-md overflow-hidden">
<button class="w-full p-heritage-space-md text-left flex items-center justify-between font-heritage-headline-sm text-[1.25rem] text-heritage-on-surface hover:text-heritage-primary transition-colors" onclick="toggleFaq(this)">
<span>How does Apex verify the provenance and history of each vehicle?</span>
<span class="material-symbols-outlined faq-icon transition-transform duration-300 text-heritage-outline">expand_more</span>
</button>
<div class="faq-content hidden px-heritage-space-md pb-heritage-space-md font-heritage-body-md text-heritage-body-md text-heritage-on-surface-variant leading-relaxed border-t border-heritage-outline-variant/20 pt-3">
            Every motorcar undergoes our forensic 180-point inspection protocol. We cross-examine factory production records, historical logbooks, chassis and engine castings for matching numbers, DME over-rev counters, and international title registries. Only vehicles with unblemished titles and verifiable provenance receive the Apex Concours Certification.
          </div>
</div>
<!-- Item 2 -->
<div class="faq-item bg-heritage-surface-container-low shadow-md overflow-hidden">
<button class="w-full p-heritage-space-md text-left flex items-center justify-between font-heritage-headline-sm text-[1.25rem] text-heritage-on-surface hover:text-heritage-primary transition-colors" onclick="toggleFaq(this)">
<span>Do you handle worldwide enclosed shipping and customs clearance?</span>
<span class="material-symbols-outlined faq-icon transition-transform duration-300 text-heritage-outline">expand_more</span>
</button>
<div class="faq-content hidden px-heritage-space-md pb-heritage-space-md font-heritage-body-md text-heritage-body-md text-heritage-on-surface-variant leading-relaxed border-t border-heritage-outline-variant/20 pt-3">
            Yes. Our in-house logistics concierge manages complete white-glove enclosed air and ocean transport to over 40 countries. We prepare ATA carnets, EPA/DOT compliance documentation, EU customs clearance, and direct delivery to your private estate, yacht berth, or airport runway.
          </div>
</div>
<!-- Item 3 -->
<div class="faq-item bg-heritage-surface-container-low shadow-md overflow-hidden">
<button class="w-full p-heritage-space-md text-left flex items-center justify-between font-heritage-headline-sm text-[1.25rem] text-heritage-on-surface hover:text-heritage-primary transition-colors" onclick="toggleFaq(this)">
<span>Can I trade in my current exotic vehicle or arrange bespoke consignment?</span>
<span class="material-symbols-outlined faq-icon transition-transform duration-300 text-heritage-outline">expand_more</span>
</button>
<div class="faq-content hidden px-heritage-space-md pb-heritage-space-md font-heritage-body-md text-heritage-body-md text-heritage-on-surface-variant leading-relaxed border-t border-heritage-outline-variant/20 pt-3">
            Certainly. We offer direct capital acquisition for immediate liquidity, or discreet off-market consignment. Consigned motorcars remain housed within our climate-controlled vault or in your personal hangar while our international collector network evaluates private dossier releases.
          </div>
</div>
<!-- Item 4 -->
<div class="faq-item bg-heritage-surface-container-low shadow-md overflow-hidden">
<button class="w-full p-heritage-space-md text-left flex items-center justify-between font-heritage-headline-sm text-[1.25rem] text-heritage-on-surface hover:text-heritage-primary transition-colors" onclick="toggleFaq(this)">
<span>What warranty coverage is included with Certified Pre-Owned acquisitions?</span>
<span class="material-symbols-outlined faq-icon transition-transform duration-300 text-heritage-outline">expand_more</span>
</button>
<div class="faq-content hidden px-heritage-space-md pb-heritage-space-md font-heritage-body-md text-heritage-body-md text-heritage-on-surface-variant leading-relaxed border-t border-heritage-outline-variant/20 pt-3">
            All modern certified acquisitions transfer remaining manufacturer warranties or include a comprehensive 12-month / 12,000-mile Apex Atelier mechanical warranty covering powertrain, ECU architecture, and active aero components. Optional extensions up to 36 months are available.
          </div>
</div>
<!-- Item 5 -->
<div class="faq-item bg-heritage-surface-container-low shadow-md overflow-hidden">
<button class="w-full p-heritage-space-md text-left flex items-center justify-between font-heritage-headline-sm text-[1.25rem] text-heritage-on-surface hover:text-heritage-primary transition-colors" onclick="toggleFaq(this)">
<span>How do I schedule an after-hours private viewing in the vault?</span>
<span class="material-symbols-outlined faq-icon transition-transform duration-300 text-heritage-outline">expand_more</span>
</button>
<div class="faq-content hidden px-heritage-space-md pb-heritage-space-md font-heritage-body-md text-heritage-body-md text-heritage-on-surface-variant leading-relaxed border-t border-heritage-outline-variant/20 pt-3">
            Private after-hours showroom viewings are reserved for verified principals and their advisory teams. You may request your discreet reservation directly via the booking form above, or contact our Chief Concierge on WhatsApp for same-day private clearance.
          </div>
</div>
</div>
</div>
</section>
<!-- ========================================== -->
<!-- 10. MODAL: VEHICLE SPECIFICATION DOSSIER   -->
<!-- ========================================== -->
<div class="fixed inset-0 z-50 hidden bg-heritage-surface-container-lowest/80 backdrop-blur-md flex items-center justify-center p-4" id="carModal">
<div class="bg-heritage-surface-container-low max-w-3xl w-full p-heritage-space-lg lg:p-8 shadow-2xl relative max-h-[921px] overflow-y-auto">
<button class="absolute top-5 right-5 text-heritage-on-surface-variant hover:text-heritage-primary transition-colors" onclick="closeModal()">
<span class="material-symbols-outlined text-[28px]">close</span>
</button>
<div class="mb-4">
<span class="font-heritage-label-technical text-heritage-label-technical uppercase tracking-widest text-heritage-primary" id="modalTag">Chassis Dossier</span>
<h3 class="font-heritage-headline-md text-heritage-headline-md text-heritage-on-surface mt-1" id="modalTitle">Vehicle Details</h3>
<p class="font-heritage-body-sm text-heritage-body-sm text-heritage-on-surface-variant" id="modalSubtitle">Full mechanical specifications &amp; certification record.</p>
</div>
<div class="relative h-60 w-full mb-6 overflow-hidden bg-heritage-surface-container">
<img class="w-full h-full object-cover" data-alt="High resolution showcase shot of exotic luxury supercar in studio setting with rim lighting" id="modalImg" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBtQZ6Vr1YAdZlnX5S8xyrFbLpDo9AgMVFQglj-756NN8aLRp_v9JA3gXTYiOIhZZv14nAG2Fp3jk3i7M6X51jYHi-IMC_0dvUc9JtB5a3YdTfjjMwT7EzU7bgwUV5fiqdxZhcz8MOkqy3YL1H4wJdMJqxEg3H0lOCzwk1hWDhUhG7p_4eVJFZOF5NOuikrTkGkm9uE3eyqfM1Ev14Njagvy4bBzM8-4m_OI2aW6Y4vAJjQsLjBoba11w"/>
</div>
<div class="grid grid-cols-2 sm:grid-cols-4 gap-3 bg-heritage-surface-container p-heritage-space-md mb-6">
<div class="flex flex-col">
<span class="font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-outline">Price</span>
<span class="font-heritage-title-lg text-heritage-title-lg text-heritage-primary font-bold" id="modalPrice">Rp 6.224.000.000</span>
</div>
<div class="flex flex-col">
<span class="font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-outline">Odometer</span>
<span class="font-heritage-title-lg text-heritage-title-lg text-heritage-on-surface font-semibold" id="modalMileage">840 Miles</span>
</div>
<div class="flex flex-col">
<span class="font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-outline">Drivetrain</span>
<span class="font-heritage-title-lg text-heritage-title-lg text-heritage-on-surface font-semibold" id="modalEngine">V8 Twin-Turbo</span>
</div>
<div class="flex flex-col">
<span class="font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-outline">Transmission</span>
<span class="font-heritage-title-lg text-heritage-title-lg text-heritage-on-surface font-semibold" id="modalTrans">Dual-Clutch</span>
</div>
</div>
<div class="space-y-2 mb-6 font-heritage-body-sm text-heritage-body-sm text-heritage-on-surface-variant">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-[16px] text-heritage-tertiary">check</span>
<span>Forensic 180-point mechanical scan completed with DME zero over-rev verification.</span>
</div>
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-[16px] text-heritage-tertiary">check</span>
<span>Authentic factory build specification confirmed with manufacturer archive.</span>
</div>
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-[16px] text-heritage-tertiary">check</span>
<span>Clean ownership title, fully unencumbered and registered for immediate transfer.</span>
</div>
</div>
<div class="flex flex-col sm:flex-row gap-3 pt-4 border-t border-heritage-outline-variant/30">
<a class="flex-1 bg-heritage-primary-container hover:bg-heritage-primary text-heritage-on-primary-container hover:text-heritage-on-primary py-3 font-heritage-label-ui text-heritage-label-ui uppercase tracking-widest text-center transition-colors flex items-center justify-center gap-2" href="#home" id="modalWhatsApp" target="_blank">
<span class="material-symbols-outlined text-[18px]">chat</span> Reserve via WhatsApp
        </a>
<button class="flex-1 bg-heritage-surface-container hover:bg-heritage-surface-bright text-heritage-on-surface py-3 font-heritage-label-ui text-heritage-label-ui uppercase tracking-widest text-center transition-colors" onclick="alert('Viewing dossier dispatched to your registered address.')">
          Request Hardcopy Binder
        </button>
</div>
</div>
</div>
<!-- ========================================== -->
<!-- 11. AI CONCIERGE INTERACTIVE MODAL BOX     -->
<!-- ========================================== -->
<div class="fixed bottom-24 right-8 z-50 hidden max-w-sm w-full bg-heritage-surface-container-high/95 backdrop-blur-2xl shadow-2xl p-heritage-space-md border-t-2 border-heritage-primary" id="aiModal">
<div class="flex items-center justify-between pb-3 border-b border-heritage-outline-variant/30 mb-3">
<div class="flex items-center gap-2">
<div class="w-2.5 h-2.5 bg-heritage-primary rounded-heritage-full animate-ping"></div>
<span class="font-heritage-label-technical text-heritage-label-technical uppercase tracking-wider text-heritage-primary font-bold">Apex AI Concierge</span>
</div>
<button class="text-heritage-outline hover:text-heritage-on-surface" onclick="toggleAiModal()">
<span class="material-symbols-outlined text-[20px]">close</span>
</button>
</div>
<div class="h-60 overflow-y-auto space-y-3 mb-3 p-1 font-heritage-body-sm text-heritage-body-sm" id="chatLogs">
<div class="bg-heritage-surface-container p-2.5 text-heritage-on-surface-variant">
        Welcome to Apex Heritage Motors. I can verify real-time vault availability, provide technical DME specs, or structure an estimated lease. How may I assist your acquisition today?
      </div>
</div>
<!-- Suggested Quick Prompts -->
<div class="flex flex-wrap gap-1.5 mb-3">
<button class="bg-heritage-surface-container-highest hover:bg-heritage-surface-bright text-heritage-on-surface text-[10px] font-heritage-label-technical uppercase px-2 py-1 transition-colors" onclick="sendQuickPrompt('Is the GT3 RS still available?')">
        GT3 RS Availability
      </button>
<button class="bg-heritage-surface-container-highest hover:bg-heritage-surface-bright text-heritage-on-surface text-[10px] font-heritage-label-technical uppercase px-2 py-1 transition-colors" onclick="sendQuickPrompt('Explain vintage consignment terms')">
        Consignment Terms
      </button>
<button class="bg-heritage-surface-container-highest hover:bg-heritage-surface-bright text-heritage-on-surface text-[10px] font-heritage-label-technical uppercase px-2 py-1 transition-colors" onclick="sendQuickPrompt('Can I pay via escrow wire?')">
        Escrow Wire
      </button>
</div>
<form class="flex gap-2" onsubmit="handleAiChat(event)">
<input class="w-full bg-heritage-surface-container-lowest text-heritage-on-surface px-3 py-2 font-heritage-label-technical text-heritage-label-technical uppercase focus:outline-none placeholder:text-heritage-outline text-xs" id="aiInput" placeholder="ASK SPECS, PROVENANCE..." type="text"/>
<button class="bg-heritage-primary text-heritage-on-primary px-3 py-2 shrink-0" type="submit">
<span class="material-symbols-outlined text-[16px] block">send</span>
</button>
</form>
</div>
<!-- Inline Scripting for Micro-Interactions -->
<script>
    // 1. Inventory Category Filtering
    function filterCategory(cat, el) {
      document.querySelectorAll('.inventory-tab').forEach(tab => {
        tab.classList.remove('bg-heritage-primary', 'text-heritage-on-primary');
        tab.classList.add('bg-heritage-surface-container', 'text-heritage-on-surface-variant');
      });
      el.classList.remove('bg-heritage-surface-container', 'text-heritage-on-surface-variant');
      el.classList.add('bg-heritage-primary', 'text-heritage-on-primary');

      const cards = document.querySelectorAll('.vehicle-card');
      cards.forEach(card => {
        if (cat === 'all' || card.dataset.category === cat) {
          card.classList.remove('hidden');
        } else {
          card.classList.add('hidden');
        }
      });
    }

    // 2. Quick Search & Filter Combo
    function applyFilters() {
      const q = document.getElementById('inventorySearch').value.toLowerCase();
      const trans = document.getElementById('filterTransmission').value;
      const priceR = document.getElementById('filterPrice').value;
      const sort = document.getElementById('sortOrder').value;

      const grid = document.getElementById('vehicleGrid');
      const cards = Array.from(document.querySelectorAll('.vehicle-card'));

      cards.forEach(card => {
        const nameMatch = card.dataset.name.toLowerCase().includes(q);
        const transMatch = (trans === 'all' || card.dataset.transmission === trans);
        
        let priceMatch = true;
        const val = parseInt(card.dataset.price);
        if (priceR === 'under200k') priceMatch = val < 200000;
        else if (priceR === '200k-400k') priceMatch = val >= 200000 && val <= 400000;
        else if (priceR === 'above400k') priceMatch = val > 400000;

        if (nameMatch && transMatch && priceMatch) {
          card.classList.remove('hidden');
        } else {
          card.classList.add('hidden');
        }
      });

      // Sorting
      if (sort === 'price-asc') {
        cards.sort((a,b) => parseInt(a.dataset.price) - parseInt(b.dataset.price));
      } else if (sort === 'price-desc') {
        cards.sort((a,b) => parseInt(b.dataset.price) - parseInt(a.dataset.price));
      } else if (sort === 'mileage-asc') {
        cards.sort((a,b) => parseInt(a.dataset.mileage) - parseInt(b.dataset.mileage));
      }
      cards.forEach(c => grid.appendChild(c));
    }

    function searchInventory() {
      applyFilters();
    }

    // 3. Financing Calculator Logic
    let currentTerm = 48;

    function setTerm(months, btn) {
      currentTerm = months;
      document.querySelectorAll('.term-btn').forEach(b => {
        b.classList.remove('bg-heritage-primary', 'text-heritage-on-primary', 'font-bold');
        b.classList.add('bg-heritage-surface-container', 'text-heritage-on-surface-variant');
      });
      btn.classList.remove('bg-heritage-surface-container', 'text-heritage-on-surface-variant');
      btn.classList.add('bg-heritage-primary', 'text-heritage-on-primary', 'font-bold');
      calculateFinance();
    }

    function calculateFinance() {
      const price = parseFloat(document.getElementById('calcPrice').value);
      const downPct = parseFloat(document.getElementById('calcDown').value);
      const downAmount = price * (downPct / 100);
      const loanAmount = price - downAmount;

      document.getElementById('priceDisplay').textContent = formatIDR(price);
      document.getElementById('downDisplay').textContent = downPct + '% (' + formatIDR(downAmount) + ')';

      const annualRate = 0.0575;
      const monthlyRate = annualRate / 12;
      const monthlyPayment = (loanAmount * monthlyRate * Math.pow(1 + monthlyRate, currentTerm)) / (Math.pow(1 + monthlyRate, currentTerm) - 1);

      document.getElementById('monthlyDisplay').textContent = formatIDR(monthlyPayment);
    }

    // 4. Modal Dossier Preview
    const carData = {
      'GT3RS': {
        title: '2023 Porsche 911 GT3 RS',
        sub: 'Weissach Lightweight Carbon Package • Shark Blue Livery',
        price: 'Rp 6.224.000.000',
        mileage: '840 Miles',
        engine: '4.0L Boxer-6 (518 HP)',
        trans: '7-Spd PDK'
      },
      'Roma': {
        title: '2022 Ferrari Roma Coupe',
        sub: 'Grigio Silverstone • Cuoio Tan Hide • Carbon Wheel',
        price: 'Rp 3.968.000.000',
        mileage: '2,190 Miles',
        engine: '3.9L Twin-Turbo V8 (612 HP)',
        trans: '8-Spd F1 DCT'
      },
      '280SL': {
        title: '1968 Mercedes-Benz 280SL Pagoda',
        sub: 'Concours Nut-&-Bolt Restored • Matching Numbers W113',
        price: 'Rp 3.072.000.000',
        mileage: '41,200 Miles',
        engine: '2.8L Inline-6 (170 HP)',
        trans: '4-Spd Manual'
      },
      'Ghost': {
        title: '2024 Rolls-Royce Ghost Black Badge',
        sub: 'Diamond Black • Mandarin Coachline • Bespoke Audio',
        price: 'Rp 7.440.000.000',
        mileage: '320 Miles',
        engine: '6.75L Twin-Turbo V12 (591 HP)',
        trans: '8-Spd Satellite'
      },
      'Vantage': {
        title: '2021 Aston Martin Vantage V8',
        sub: 'Aston Racing Green • Semi-Aniline Leather Interior',
        price: 'Rp 2.224.000.000',
        mileage: '6,800 Miles',
        engine: '4.0L Twin-Turbo V8 (503 HP)',
        trans: '8-Spd ZF Sport'
      },
      'Bentley': {
        title: '2023 Bentley Continental GT Speed',
        sub: 'Anthracite Metallic • W12 Final Edition • All-Wheel Steer',
        price: 'Rp 4.992.000.000',
        mileage: '1,840 Miles',
        engine: '6.0L Twin-Turbo W12 (650 HP)',
        trans: '8-Spd DCT'
      },
      'GT500': {
        title: '1967 Shelby GT500 Fastback',
        sub: '428 Police Interceptor V8 • Concours d\'Elegance Preserved',
        price: 'Rp 4.720.000.000',
        mileage: '21,400 Miles',
        engine: '7.0L Police V8 (355 HP)',
        trans: '4-Spd Toploader'
      }
    };

    function openModal(id) {
      const data = carData[id] || carData['GT3RS'];
      document.getElementById('modalTitle').textContent = data.title;
      document.getElementById('modalSubtitle').textContent = data.sub;
      document.getElementById('modalPrice').textContent = data.price;
      document.getElementById('modalMileage').textContent = data.mileage;
      document.getElementById('modalEngine').textContent = data.engine;
      document.getElementById('modalTrans').textContent = data.trans;
      document.getElementById('modalWhatsApp').href = 'https://wa.me/?text=Inquiry%20regarding%20' + encodeURIComponent(data.title);
      document.getElementById('carModal').classList.remove('hidden');
    }

    function closeModal() {
      document.getElementById('carModal').classList.add('hidden');
    }

    // 5. Accordion FAQs
    function toggleFaq(button) {
      const content = button.nextElementSibling;
      const icon = button.querySelector('.faq-icon');
      const isHidden = content.classList.contains('hidden');

      document.querySelectorAll('.faq-content').forEach(c => c.classList.add('hidden'));
      document.querySelectorAll('.faq-icon').forEach(i => i.classList.remove('rotate-180'));

      if (isHidden) {
        content.classList.remove('hidden');
        icon.classList.add('rotate-180');
      }
    }

    // 6. Reservation Form Handler
    function handleReservation(e) {
      e.preventDefault();
      const car = document.getElementById('selectedCar').value;
      const name = document.getElementById('fullName').value;
      alert('Viewing Invitation Confirmed: Thank you, ' + name + '. Your appointment dossier for the ' + car + ' has been logged. Our Private Liaison will confirm your security pass shortly.');
      e.target.reset();
    }

    // 7. Interactive AI Concierge
    function toggleAiModal() {
      const modal = document.getElementById('aiModal');
      modal.classList.toggle('hidden');
    }

    // Link the aside AI trigger in App Shell
    window.addEventListener('DOMContentLoaded', () => {
      const aiTrigger = document.querySelector('aside .group');
      if (aiTrigger) {
        aiTrigger.addEventListener('click', toggleAiModal);
      }
      calculateFinance();
    });

    function sendQuickPrompt(promptText) {
      document.getElementById('aiInput').value = promptText;
      handleAiChat(new Event('submit'));
    }

    function handleAiChat(e) {
      e.preventDefault();
      const input = document.getElementById('aiInput');
      const val = input.value.trim();
      if (!val) return;

      const log = document.getElementById('chatLogs');
      
      // User bubble
      const userDiv = document.createElement('div');
      userDiv.className = 'bg-heritage-surface-container-highest p-2.5 text-heritage-on-surface text-right font-medium';
      userDiv.textContent = val;
      log.appendChild(userDiv);
      input.value = '';

      // AI reply simulation
      setTimeout(() => {
        const aiDiv = document.createElement('div');
        aiDiv.className = 'bg-heritage-surface-container p-2.5 text-heritage-tertiary';
        if (val.toLowerCase().includes('gt3 rs')) {
          aiDiv.textContent = 'The 2023 911 GT3 RS Weissach is physically on our Surabaya salon floor with 840 miles. Clean title, zero over-revs in DME ranges 1-6. Wire deposit reserves it immediately.';
        } else if (val.toLowerCase().includes('consignment')) {
          aiDiv.textContent = 'Apex Consignment offers private off-market indexing with 0% public disclosure or full salon curation. We manage insurance and worldwide logistics directly.';
        } else {
          aiDiv.textContent = 'Acknowledged. Your inquiry has been routed to our Chief Sales Officer with provenance archive access. May we transmit the spec dossier via WhatsApp?';
        }
        log.appendChild(aiDiv);
        log.scrollTop = log.scrollHeight;
      }, 400);
    }
  </script>
</div>
<div class="flex flex-col w-full">
<!-- Header & Breadcrumbs Precinct -->
<section id="financing-studio" class="w-full bg-heritage-surface-container-lowest py-heritage-space-xl relative overflow-hidden">
<div class="absolute -top-32 right-1/4 w-96 h-96 bg-heritage-primary/5 rounded-heritage-full blur-[140px] pointer-events-none"></div>
<div class="max-w-7xl mx-auto px-heritage-gutter relative z-10 flex flex-col gap-heritage-space-md">
<!-- Breadcrumb -->
<nav class="flex items-center gap-heritage-space-sm font-heritage-label-technical text-heritage-label-technical uppercase tracking-[0.2em] text-heritage-outline">
<a class="hover:text-heritage-primary transition-colors" href="#home">Home</a>
<span class="text-heritage-outline-variant">/</span>
<a class="hover:text-heritage-primary transition-colors" href="#home">Financing Advisory</a>
<span class="text-heritage-outline-variant">/</span>
<span class="text-heritage-on-surface-variant font-bold">Bespoke Credit &amp; Trade-In Simulator</span>
</nav>
<!-- Editorial Badge -->
<div class="inline-flex items-center gap-heritage-space-sm self-start bg-heritage-surface-container px-heritage-space-md py-1.5 shadow-sm">
<span class="w-1.5 h-1.5 bg-heritage-primary"></span>
<span class="font-heritage-label-technical text-heritage-label-technical tracking-[0.24em] text-heritage-primary uppercase">
          Bespoke Financial Advisory &amp; Capital Solutions
        </span>
</div>
<!-- Main Headline & Subtitle -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-heritage-space-lg items-end mt-heritage-space-sm">
<div class="lg:col-span-8 flex flex-col gap-heritage-space-sm">
<h1 class="font-heritage-headline-lg text-heritage-headline-lg text-heritage-on-surface font-normal leading-tight">
            Bespoke Financing Calculator &amp; <span class="italic text-heritage-primary">Trade-In Appraisal</span> Studio
          </h1>
</div>
<div class="lg:col-span-4">
<p class="font-heritage-body-md text-heritage-body-md text-heritage-on-surface-variant leading-relaxed">
            Tailored private-banking acquisition structures, balloon-payment schedules, and discreet collateral trade-in appraisals for fine collector motorcars.
          </p>
</div>
</div>
<!-- Interactive Tab Navigator -->
<div class="flex items-center gap-heritage-space-xs mt-heritage-space-lg bg-heritage-surface-container-low p-1.5 self-start">
<button class="px-heritage-space-xl py-3 font-heritage-label-ui text-heritage-label-ui uppercase tracking-widest transition-all duration-300 bg-heritage-primary-container text-heritage-on-primary-container shadow-md flex items-center gap-heritage-space-sm" id="tab-btn-finance" onclick="switchStudioTab('finance')">
<span class="material-symbols-outlined text-[18px]">calculate</span>
          Financing &amp; Lease Calculator
        </button>
<button class="px-heritage-space-xl py-3 font-heritage-label-ui text-heritage-label-ui uppercase tracking-widest transition-all duration-300 text-heritage-on-surface-variant hover:text-heritage-on-surface flex items-center gap-heritage-space-sm" id="tab-btn-tradein" onclick="switchStudioTab('tradein')">
<span class="material-symbols-outlined text-[18px]">sync_alt</span>
          Discreet Trade-In Valuation Appraisal
        </button>
</div>
</div>
</section>
<!-- STUDIO SECTION 1: FINANCING CALCULATOR (DEFAULT ACTIVE) -->
<section class="w-full bg-heritage-surface-container-low py-heritage-space-xl transition-opacity duration-500" id="section-finance">
<div class="max-w-7xl mx-auto px-heritage-gutter grid grid-cols-1 lg:grid-cols-12 gap-heritage-space-xl items-start">
<!-- Calculator Inputs Pane (7 Cols) -->
<div class="lg:col-span-7 flex flex-col gap-heritage-space-xl">
<!-- Preset Curated Inventory Selector -->
<div class="bg-heritage-surface-container p-heritage-space-lg shadow-xl flex flex-col gap-heritage-space-md">
<div class="flex items-center justify-between">
<span class="font-heritage-label-technical text-heritage-label-technical uppercase tracking-widest text-heritage-primary">01 / Curated Motorcar Preset</span>
<span class="font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-outline">Tier 1 Inventory Vault</span>
</div>
<div class="relative w-full">
<select class="w-full bg-heritage-surface-container-lowest text-heritage-on-surface font-heritage-title-md text-heritage-title-md py-3.5 px-heritage-space-md appearance-none focus:outline-none focus:bg-heritage-surface-container-high transition-colors cursor-pointer pr-10" id="preset-car" onchange="applyVehiclePreset(this.value)">
<option value="415000">2024 Aston Martin DBS 770 Ultimate — Rp 6.640.000.000</option>
<option value="389000">2023 Porsche 911 GT3 RS (Weissach) — Rp 6.224.000.000</option>
<option value="248000">2022 Ferrari Roma Atelier Spec — Rp 3.968.000.000</option>
<option value="192000">1968 Mercedes-Benz 280SL Pagoda — Rp 3.072.000.000</option>
<option value="custom">Custom Capital Asset Allocation...</option>
</select>
<span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-heritage-outline pointer-events-none">expand_more</span>
</div>
</div>
<!-- Metric Parameters Control Grid -->
<div class="bg-heritage-surface-container p-heritage-space-lg shadow-xl flex flex-col gap-heritage-space-xl">
<div class="flex items-center justify-between">
<span class="font-heritage-label-technical text-heritage-label-technical uppercase tracking-widest text-heritage-primary">02 / Financial Capital Architecture</span>
<span class="font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-outline">Dynamic Adjustment</span>
</div>
<!-- Parameter 1: Vehicle Price Input -->
<div class="flex flex-col gap-heritage-space-sm">
<div class="flex items-center justify-between">
<label class="font-heritage-label-ui text-heritage-label-ui uppercase tracking-wider text-heritage-on-surface" for="input-price">Vehicle Valuation Capital</label>
<span class="font-heritage-headline-sm text-heritage-headline-sm text-heritage-primary" id="display-price-header">Rp 6.640.000.000</span>
</div>
<input class="w-full h-1 bg-heritage-surface-container-highest appearance-none cursor-pointer accent-primary" id="slider-price" max="1500000" min="100000" oninput="updatePriceFromSlider(this.value)" step="5000" type="range" value="415000"/>
<div class="flex justify-between font-heritage-label-technical text-heritage-label-technical text-heritage-outline pt-1">
<span>Rp 1.600.000.000</span>
<span>Rp 12.000.000.000</span>
<span>Rp 24.000.000.000</span>
</div>
</div>
<!-- Parameter 2: Down Payment -->
<div class="flex flex-col gap-heritage-space-sm">
<div class="flex items-center justify-between">
<div class="flex items-center gap-heritage-space-xs">
<span class="font-heritage-label-ui text-heritage-label-ui uppercase tracking-wider text-heritage-on-surface">Initial Equity Contribution</span>
<span class="font-heritage-label-technical text-heritage-label-technical text-heritage-primary bg-heritage-surface-container-high px-2 py-0.5" id="downpayment-percent-badge">25%</span>
</div>
<span class="font-heritage-headline-sm text-heritage-headline-sm text-heritage-on-surface" id="display-downpayment-val">Rp 1.660.000.000</span>
</div>
<input class="w-full h-1 bg-heritage-surface-container-highest appearance-none cursor-pointer accent-primary" id="slider-downpayment" max="60" min="10" oninput="updateDownpaymentSlider(this.value)" step="5" type="range" value="25"/>
<div class="flex justify-between font-heritage-label-technical text-heritage-label-technical text-heritage-outline pt-1">
<span>10% (Rp 664.000.000)</span>
<span>35% (Rp 2.324.000.000)</span>
<span>60% (Rp 3.984.000.000)</span>
</div>
</div>
<!-- Parameter 3: Loan Term Tenor Selector -->
<div class="flex flex-col gap-heritage-space-sm">
<div class="flex items-center justify-between">
<span class="font-heritage-label-ui text-heritage-label-ui uppercase tracking-wider text-heritage-on-surface">Acquisition Tenor (Months)</span>
<span class="font-heritage-label-technical text-heritage-label-technical text-heritage-outline">Fixed Amortization</span>
</div>
<div class="grid grid-cols-5 gap-heritage-space-xs" id="term-buttons-group">
<button class="tenor-btn py-3 text-center font-heritage-label-ui text-heritage-label-ui uppercase tracking-wider bg-heritage-surface-container-lowest text-heritage-on-surface-variant hover:text-heritage-on-surface transition-all" data-tenor="24" onclick="setTenorTerm(24)">24 Mo</button>
<button class="tenor-btn py-3 text-center font-heritage-label-ui text-heritage-label-ui uppercase tracking-wider bg-heritage-surface-container-lowest text-heritage-on-surface-variant hover:text-heritage-on-surface transition-all" data-tenor="36" onclick="setTenorTerm(36)">36 Mo</button>
<button class="tenor-btn py-3 text-center font-heritage-label-ui text-heritage-label-ui uppercase tracking-wider bg-heritage-surface-container-lowest text-heritage-on-surface-variant hover:text-heritage-on-surface transition-all" data-tenor="48" onclick="setTenorTerm(48)">48 Mo</button>
<button class="tenor-btn py-3 text-center font-heritage-label-ui text-heritage-label-ui uppercase tracking-wider bg-heritage-primary-container text-heritage-on-primary-container font-bold shadow-md" data-tenor="60" onclick="setTenorTerm(60)">60 Mo</button>
<button class="tenor-btn py-3 text-center font-heritage-label-ui text-heritage-label-ui uppercase tracking-wider bg-heritage-surface-container-lowest text-heritage-on-surface-variant hover:text-heritage-on-surface transition-all" data-tenor="72" onclick="setTenorTerm(72)">72 Mo</button>
</div>
</div>
<!-- Parameter 4: Balloon Residual Allocation -->
<div class="flex flex-col gap-heritage-space-sm">
<div class="flex items-center justify-between">
<span class="font-heritage-label-ui text-heritage-label-ui uppercase tracking-wider text-heritage-on-surface">Balloon Residual Structure</span>
<span class="font-heritage-label-technical text-heritage-label-technical text-heritage-primary font-bold">End-of-Term Settlement</span>
</div>
<div class="grid grid-cols-4 gap-heritage-space-xs" id="balloon-buttons-group">
<button class="balloon-btn py-2.5 text-center font-heritage-label-ui text-heritage-label-ui uppercase tracking-wider bg-heritage-surface-container-lowest text-heritage-on-surface-variant transition-all" data-balloon="0" onclick="setBalloonResidual(0)">None (0%)</button>
<button class="balloon-btn py-2.5 text-center font-heritage-label-ui text-heritage-label-ui uppercase tracking-wider bg-heritage-surface-container-lowest text-heritage-on-surface-variant transition-all" data-balloon="15" onclick="setBalloonResidual(15)">15%</button>
<button class="balloon-btn py-2.5 text-center font-heritage-label-ui text-heritage-label-ui uppercase tracking-wider bg-heritage-primary-container text-heritage-on-primary-container font-bold shadow-md" data-balloon="25" onclick="setBalloonResidual(25)">25%</button>
<button class="balloon-btn py-2.5 text-center font-heritage-label-ui text-heritage-label-ui uppercase tracking-wider bg-heritage-surface-container-lowest text-heritage-on-surface-variant transition-all" data-balloon="35" onclick="setBalloonResidual(35)">35%</button>
</div>
</div>
<!-- Private Client APR Badge -->
<div class="bg-heritage-surface-container-lowest p-heritage-space-md flex items-center justify-between">
<div class="flex items-center gap-heritage-space-sm">
<span class="material-symbols-outlined text-heritage-primary text-[20px]">verified_user</span>
<div class="flex flex-col">
<span class="font-heritage-label-ui text-heritage-label-ui text-heritage-on-surface uppercase">Indicative Private Client Rate: 7.25% p.a.</span>
<span class="font-heritage-label-technical text-heritage-label-technical text-heritage-outline">Tier 1 Sovereign &amp; Family Office Credit Benchmark</span>
</div>
</div>
<span class="font-heritage-label-technical text-heritage-label-technical uppercase bg-heritage-surface-container px-2 py-1 text-heritage-tertiary">Locked 90 Days</span>
</div>
</div>
</div>
<!-- Real-Time Computational Dossier Output (5 Cols) -->
<div class="lg:col-span-5 flex flex-col gap-heritage-space-lg sticky top-28">
<div class="bg-heritage-surface-container-lowest p-heritage-space-xl shadow-[0_24px_64px_-16px_rgba(212,175,55,0.08)] relative overflow-hidden flex flex-col gap-heritage-space-lg">
<!-- Subtle Accent Background Blur -->
<div class="absolute top-0 right-0 w-48 h-48 bg-heritage-primary/10 rounded-heritage-full blur-[80px] pointer-events-none"></div>
<!-- Output Header -->
<div class="flex items-center justify-between pb-heritage-space-sm">
<div class="flex flex-col">
<span class="font-heritage-label-technical text-heritage-label-technical uppercase tracking-[0.25em] text-heritage-outline">Apex Treasury Model</span>
<span class="font-heritage-title-lg text-heritage-title-lg text-heritage-on-surface">Provisional Capital Schedule</span>
</div>
<div class="w-8 h-8 bg-heritage-surface-container flex items-center justify-center text-heritage-primary">
<span class="material-symbols-outlined text-[18px]">account_balance</span>
</div>
</div>
<!-- Main Investment Metric -->
<div class="bg-heritage-surface-container p-heritage-space-lg flex flex-col gap-heritage-space-xs">
<span class="font-heritage-label-technical text-heritage-label-technical uppercase tracking-[0.2em] text-heritage-outline">Estimated Monthly Commitment</span>
<div class="flex items-baseline gap-heritage-space-xs">
<span class="font-heritage-display text-heritage-display text-heritage-primary leading-none" id="output-monthly-payment">Rp 65.424.000</span>
<span class="font-heritage-label-ui text-heritage-label-ui text-heritage-on-surface-variant uppercase">/ mo*</span>
</div>
<p class="font-heritage-body-sm text-heritage-body-sm text-heritage-outline pt-heritage-space-xs leading-normal">
              Based on Tier 1 capital structure, exclusive of jurisdictional ad-valorem taxes and concierge registration fees.
            </p>
</div>
<!-- Metric Ledger Grid -->
<div class="grid grid-cols-2 gap-heritage-space-sm">
<div class="bg-heritage-surface-container p-heritage-space-md flex flex-col gap-1">
<span class="font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-outline">Total Financed Capital</span>
<span class="font-heritage-title-lg text-heritage-title-lg text-heritage-on-surface" id="output-financed-capital">Rp 4.980.000.000</span>
</div>
<div class="bg-heritage-surface-container p-heritage-space-md flex flex-col gap-1">
<span class="font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-outline">Down Payment Total</span>
<span class="font-heritage-title-lg text-heritage-title-lg text-heritage-on-surface" id="output-downpayment">Rp 1.660.000.000</span>
</div>
<div class="bg-heritage-surface-container p-heritage-space-md flex flex-col gap-1">
<span class="font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-outline">Total Projected Interest</span>
<span class="font-heritage-title-lg text-heritage-title-lg text-heritage-secondary" id="output-total-interest">Rp 605.440.000</span>
</div>
<div class="bg-heritage-surface-container p-heritage-space-md flex flex-col gap-1">
<span class="font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-outline">Balloon Residual (25%)</span>
<span class="font-heritage-title-lg text-heritage-title-lg text-heritage-tertiary" id="output-balloon-amount">Rp 1.660.000.000</span>
</div>
</div>
<!-- Inline Visual Amortization Progress Graph -->
<div class="bg-heritage-surface-container p-heritage-space-md flex flex-col gap-heritage-space-sm">
<div class="flex items-center justify-between font-heritage-label-technical text-heritage-label-technical uppercase">
<span class="text-heritage-on-surface">Capital Allocation Proportion</span>
<span class="text-heritage-primary">Principal vs Residual</span>
</div>
<div class="w-full h-3 bg-heritage-surface-container-highest flex overflow-hidden">
<div class="bg-heritage-primary h-full transition-all duration-500" id="bar-principal" style="width: 50%;"></div>
<div class="bg-heritage-tertiary-container h-full transition-all duration-500" id="bar-residual" style="width: 25%;"></div>
<div class="bg-heritage-secondary-container h-full transition-all duration-500" id="bar-interest" style="width: 25%;"></div>
</div>
<div class="flex items-center justify-between font-heritage-label-technical text-heritage-label-technical text-heritage-outline text-[10px]">
<div class="flex items-center gap-1"><span class="w-2 h-2 bg-heritage-primary inline-block"></span><span>Amortized Principal</span></div>
<div class="flex items-center gap-1"><span class="w-2 h-2 bg-heritage-tertiary-container inline-block"></span><span>Residual</span></div>
<div class="flex items-center gap-1"><span class="w-2 h-2 bg-heritage-secondary-container inline-block"></span><span>Interest</span></div>
</div>
</div>
<!-- Action Buttons -->
<div class="flex flex-col gap-heritage-space-sm pt-heritage-space-xs">
<button class="w-full bg-heritage-primary-container text-heritage-on-primary-container hover:bg-heritage-primary py-3.5 font-heritage-label-ui text-heritage-label-ui uppercase tracking-widest transition-all duration-300 shadow-lg text-center font-bold">
              Apply for Bespoke Financing Dossier
            </button>
<div class="grid grid-cols-2 gap-heritage-space-sm">
<button class="bg-heritage-surface-container hover:bg-heritage-surface-bright text-heritage-on-surface py-3 font-heritage-label-technical text-heritage-label-technical uppercase tracking-wider text-center transition-colors flex items-center justify-center gap-1.5" onclick="triggerPdfNotice()">
<span class="material-symbols-outlined text-[16px]">picture_as_pdf</span>
                Download Amortization
              </button>
<a class="bg-heritage-surface-container hover:bg-heritage-surface-bright text-heritage-primary py-3 font-heritage-label-technical text-heritage-label-technical uppercase tracking-wider text-center transition-colors flex items-center justify-center gap-1.5" href="https://wa.me/">
<span class="material-symbols-outlined text-[16px]">chat</span>
                Discuss with CFO
              </a>
</div>
</div>
<div class="text-center font-heritage-label-technical text-heritage-label-technical text-heritage-outline uppercase tracking-widest text-[10px]">
            Strictly Confidential • Non-Binding Private Simulation
          </div>
</div>
</div>
</div>
</section>
<!-- STUDIO SECTION 2: DISCREET TRADE-IN VALUATION APPRAISAL (HIDDEN INITIALLY) -->
<section class="hidden w-full bg-heritage-surface-container-low py-heritage-space-xl transition-opacity duration-500" id="section-tradein">
<div class="max-w-7xl mx-auto px-heritage-gutter grid grid-cols-1 lg:grid-cols-12 gap-heritage-space-xl items-start">
<!-- Trade-In Input Dossier (7 Cols) -->
<div class="lg:col-span-7 flex flex-col gap-heritage-space-lg">
<div class="bg-heritage-surface-container p-heritage-space-xl shadow-xl flex flex-col gap-heritage-space-lg">
<div class="flex items-center justify-between pb-heritage-space-sm">
<div class="flex flex-col">
<span class="font-heritage-label-technical text-heritage-label-technical uppercase tracking-widest text-heritage-primary">Collateral Portfolio Equity</span>
<span class="font-heritage-title-lg text-heritage-title-lg text-heritage-on-surface">Vehicle Provenance &amp; Appraisal Submission</span>
</div>
<span class="material-symbols-outlined text-heritage-outline text-[24px]">verified</span>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-heritage-space-md">
<!-- Make -->
<div class="flex flex-col gap-1.5">
<label class="font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-outline">Automotive Marque / Make</label>
<input class="w-full bg-heritage-surface-container-lowest text-heritage-on-surface px-heritage-space-md py-3 font-heritage-body-sm text-heritage-body-sm focus:outline-none focus:bg-heritage-surface-container-high transition-colors uppercase placeholder:text-heritage-outline/60" id="ti-make" placeholder="E.G. PORSCHE, FERRARI, ASTON MARTIN" type="text"/>
</div>
<!-- Model -->
<div class="flex flex-col gap-1.5">
<label class="font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-outline">Model &amp; Specification Variant</label>
<input class="w-full bg-heritage-surface-container-lowest text-heritage-on-surface px-heritage-space-md py-3 font-heritage-body-sm text-heritage-body-sm focus:outline-none focus:bg-heritage-surface-container-high transition-colors uppercase placeholder:text-heritage-outline/60" id="ti-model" placeholder="E.G. 911 GT3 TOURING / 812 GTS" type="text"/>
</div>
<!-- Year -->
<div class="flex flex-col gap-1.5">
<label class="font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-outline">Year of Manufacture</label>
<input class="w-full bg-heritage-surface-container-lowest text-heritage-on-surface px-heritage-space-md py-3 font-heritage-body-sm text-heritage-body-sm focus:outline-none focus:bg-heritage-surface-container-high transition-colors placeholder:text-heritage-outline/60" id="ti-year" max="2025" min="1930" placeholder="E.G. 2021" type="number"/>
</div>
<!-- Mileage -->
<div class="flex flex-col gap-1.5">
<label class="font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-outline">Current Certified Mileage (Mi / Km)</label>
<input class="w-full bg-heritage-surface-container-lowest text-heritage-on-surface px-heritage-space-md py-3 font-heritage-body-sm text-heritage-body-sm focus:outline-none focus:bg-heritage-surface-container-high transition-colors uppercase placeholder:text-heritage-outline/60" id="ti-mileage" placeholder="E.G. 3,420 MILES" type="text"/>
</div>
<!-- VIN / Chassis Number -->
<div class="flex flex-col gap-1.5 md:col-span-2">
<label class="font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-outline">VIN / Chassis Number (Confidential Verification)</label>
<input class="w-full bg-heritage-surface-container-lowest text-heritage-on-surface px-heritage-space-md py-3 font-heritage-label-technical text-heritage-label-technical focus:outline-none focus:bg-heritage-surface-container-high transition-colors uppercase placeholder:text-heritage-outline/60 tracking-wider" id="ti-vin" placeholder="17-DIGIT VEHICLE IDENTIFICATION NUMBER" type="text"/>
</div>
</div>
<!-- Provenance / Condition Grading -->
<div class="flex flex-col gap-heritage-space-sm pt-heritage-space-xs">
<label class="font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-outline">Preservation &amp; Mechanical Grade</label>
<div class="grid grid-cols-1 md:grid-cols-3 gap-heritage-space-sm">
<label class="bg-heritage-surface-container-lowest p-heritage-space-md flex flex-col gap-1 cursor-pointer hover:bg-heritage-surface-container-high transition-colors">
<div class="flex items-center justify-between">
<span class="font-heritage-label-ui text-heritage-label-ui uppercase text-heritage-primary font-bold">Grade 1: Concours</span>
<input checked="" class="accent-primary" name="car_condition" type="radio" value="concours"/>
</div>
<span class="font-heritage-body-sm text-heritage-body-sm text-heritage-outline text-[11px] leading-tight">Flawless paint meter readings, fully documented single-owner atelier servicing.</span>
</label>
<label class="bg-heritage-surface-container-lowest p-heritage-space-md flex flex-col gap-1 cursor-pointer hover:bg-heritage-surface-container-high transition-colors">
<div class="flex items-center justify-between">
<span class="font-heritage-label-ui text-heritage-label-ui uppercase text-heritage-on-surface font-bold">Grade 2: Pristine</span>
<input class="accent-primary" name="car_condition" type="radio" value="pristine"/>
</div>
<span class="font-heritage-body-sm text-heritage-body-sm text-heritage-outline text-[11px] leading-tight">Minor cosmetic factory patina, comprehensive official service stamps.</span>
</label>
<label class="bg-heritage-surface-container-lowest p-heritage-space-md flex flex-col gap-1 cursor-pointer hover:bg-heritage-surface-container-high transition-colors">
<div class="flex items-center justify-between">
<span class="font-heritage-label-ui text-heritage-label-ui uppercase text-heritage-on-surface font-bold">Grade 3: Driver</span>
<input class="accent-primary" name="car_condition" type="radio" value="driver"/>
</div>
<span class="font-heritage-body-sm text-heritage-body-sm text-heritage-outline text-[11px] leading-tight">Road-driven integrity, complete mechanical running provenance.</span>
</label>
</div>
</div>
<!-- Image & Dossier Upload Dropzone -->
<div class="flex flex-col gap-heritage-space-sm">
<span class="font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-outline">Confidential Vehicle Dossier &amp; Logbook Upload</span>
<div class="bg-heritage-surface-container-lowest p-heritage-space-xl flex flex-col items-center justify-center text-center gap-heritage-space-sm cursor-pointer hover:bg-heritage-surface-container-high transition-colors">
<span class="material-symbols-outlined text-heritage-primary text-[36px]">cloud_upload</span>
<div class="flex flex-col gap-0.5">
<span class="font-heritage-label-ui text-heritage-label-ui text-heritage-on-surface uppercase tracking-wider">Drag high-resolution imagery &amp; service logbook PDFs</span>
<span class="font-heritage-label-technical text-heritage-label-technical text-heritage-outline">ACCEPTED: RAW, TIFF, PNG, PDF (UP TO 50MB PER ARCHIVE)</span>
</div>
</div>
</div>
<button class="w-full bg-heritage-primary-container text-heritage-on-primary-container hover:bg-heritage-primary py-3.5 font-heritage-label-ui text-heritage-label-ui uppercase tracking-widest font-bold transition-all shadow-md" onclick="calculateTradeInEstimate()">
            Compute Preliminary Valuation Range
          </button>
</div>
</div>
<!-- Appraisal Output & Direct Equity Rollover Card (5 Cols) -->
<div class="lg:col-span-5 flex flex-col gap-heritage-space-lg sticky top-28">
<div class="bg-heritage-surface-container-lowest p-heritage-space-xl shadow-[0_24px_64px_-16px_rgba(212,175,55,0.08)] flex flex-col gap-heritage-space-lg relative overflow-hidden">
<div class="absolute -bottom-10 -right-10 w-48 h-48 bg-heritage-primary/10 rounded-heritage-full blur-[70px] pointer-events-none"></div>
<div class="flex items-center justify-between pb-heritage-space-sm">
<div class="flex flex-col">
<span class="font-heritage-label-technical text-heritage-label-technical uppercase tracking-[0.25em] text-heritage-outline">Algorithmic Appraisal Matrix</span>
<span class="font-heritage-title-lg text-heritage-title-lg text-heritage-on-surface">Estimated Market Equity Offset</span>
</div>
<span class="font-heritage-label-technical text-heritage-label-technical uppercase px-2 py-1 bg-heritage-surface-container text-heritage-tertiary">Real-Time</span>
</div>
<!-- Appraisal Range Box -->
<div class="bg-heritage-surface-container p-heritage-space-lg flex flex-col gap-heritage-space-xs">
<span class="font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-outline">Indicative Concours Appraisal</span>
<div class="flex items-baseline gap-heritage-space-xs">
<span class="font-heritage-headline-lg text-heritage-headline-lg text-heritage-primary" id="ti-appraisal-range">Rp 2.880.000.000 – Rp 3.360.000.000</span>
</div>
<p class="font-heritage-body-sm text-heritage-body-sm text-heritage-outline pt-heritage-space-xs leading-normal">
              Based on recent Monterey Car Week, Gooding &amp; Co., and private off-market transaction indices for matching provenance.
            </p>
</div>
<!-- Trade-In Rollover Integration Feature -->
<div class="bg-heritage-surface-container p-heritage-space-md flex flex-col gap-heritage-space-sm">
<div class="flex items-center justify-between">
<span class="font-heritage-label-ui text-heritage-label-ui uppercase text-heritage-on-surface font-bold">Apply As Financing Down Payment</span>
<input class="accent-primary w-4 h-4 cursor-pointer" id="check-rollover" onchange="toggleEquityRollover(this.checked)" type="checkbox"/>
</div>
<p class="font-heritage-body-sm text-heritage-body-sm text-heritage-on-surface-variant text-[12px] leading-relaxed">
              Seamlessly credit your certified vehicle valuation directly into the Apex Heritage bespoke financing schedule, mitigating initial out-of-pocket cash requirements.
            </p>
<div class="font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-primary hidden" id="rollover-status">
              ✓ Rp 3.120.000.000 median collateral equity applied to financing simulator
            </div>
</div>
<!-- Physical Inspection Booking Box -->
<div class="flex flex-col gap-heritage-space-sm">
<button class="w-full bg-heritage-surface-container hover:bg-heritage-surface-bright text-heritage-on-surface py-3.5 font-heritage-label-ui text-heritage-label-ui uppercase tracking-widest transition-colors flex items-center justify-center gap-2">
<span class="material-symbols-outlined text-heritage-primary text-[18px]">calendar_month</span>
              Request Forensic Appraisal at Salon
            </button>
<button class="w-full bg-heritage-primary-container text-heritage-on-primary-container hover:bg-heritage-primary py-3.5 font-heritage-label-ui text-heritage-label-ui uppercase tracking-widest font-bold transition-all" onclick="switchStudioTab('finance')">
              Transfer Equity to Financing Calculator →
            </button>
</div>
<div class="flex items-center gap-heritage-space-sm bg-heritage-surface-container p-heritage-space-sm text-heritage-outline font-heritage-label-technical text-heritage-label-technical uppercase">
<span class="material-symbols-outlined text-[16px] text-heritage-tertiary">lock</span>
<span>Non-public discreet records held under NDA</span>
</div>
</div>
</div>
</div>
</section>
<!-- Editorial Section: Curated Private Banking Structures -->
<section class="w-full bg-heritage-surface-container-lowest py-heritage-space-xl">
<div class="max-w-7xl mx-auto px-heritage-gutter flex flex-col gap-heritage-space-xl">
<!-- Section Title & Narrative -->
<div class="flex flex-col md:flex-row md:items-end justify-between gap-heritage-space-md">
<div class="flex flex-col gap-heritage-space-xs max-w-2xl">
<span class="font-heritage-label-technical text-heritage-label-technical uppercase tracking-[0.28em] text-heritage-primary">03 / Capital Architectures</span>
<h2 class="font-heritage-headline-lg text-heritage-headline-lg text-heritage-on-surface font-normal">Tiered Private Financing Structures</h2>
</div>
<p class="font-heritage-body-sm text-heritage-body-sm text-heritage-on-surface-variant max-w-md">
          Collaborating exclusively with venerable Swiss private banks and premier family office underwriters to tailor bespoke capital facilities.
        </p>
</div>
<!-- 3 Bespoke Program Cards -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-heritage-space-lg">
<!-- Card 1 -->
<div class="bg-heritage-surface-container p-heritage-space-xl flex flex-col justify-between gap-heritage-space-lg shadow-lg hover:shadow-[0_16px_40px_rgba(212,175,55,0.06)] transition-all">
<div class="flex flex-col gap-heritage-space-md">
<div class="flex items-center justify-between">
<span class="font-heritage-label-technical text-heritage-label-technical uppercase tracking-widest text-heritage-primary">Program Alpha</span>
<span class="material-symbols-outlined text-heritage-outline">currency_exchange</span>
</div>
<h3 class="font-heritage-headline-sm text-heritage-headline-sm text-heritage-on-surface">Heritage Balloon Lease</h3>
<p class="font-heritage-body-sm text-heritage-body-sm text-heritage-on-surface-variant leading-relaxed">
              Designed for ultra-low ongoing capital commitment. Preserves liquid working capital through structured high-residual settlement or simple roll-forward refinancing upon maturity.
            </p>
</div>
<div class="flex flex-col gap-heritage-space-sm">
<div class="flex justify-between font-heritage-label-technical text-heritage-label-technical uppercase py-2 bg-heritage-surface-container-low px-heritage-space-sm text-heritage-on-surface">
<span>Residual Ceilings</span>
<span class="text-heritage-primary font-bold">Up to 40%</span>
</div>
<div class="flex justify-between font-heritage-label-technical text-heritage-label-technical uppercase py-2 bg-heritage-surface-container-low px-heritage-space-sm text-heritage-on-surface">
<span>Tenor Duration</span>
<span class="text-heritage-secondary">24 to 60 Months</span>
</div>
<div class="flex justify-between font-heritage-label-technical text-heritage-label-technical uppercase py-2 bg-heritage-surface-container-low px-heritage-space-sm text-heritage-on-surface">
<span>Tax Optimization</span>
<span class="text-heritage-tertiary">Operational Structuring</span>
</div>
</div>
</div>
<!-- Card 2 -->
<div class="bg-heritage-surface-container p-heritage-space-xl flex flex-col justify-between gap-heritage-space-lg shadow-lg hover:shadow-[0_16px_40px_rgba(212,175,55,0.06)] transition-all relative">
<div class="absolute top-0 left-0 w-full h-1 bg-heritage-primary"></div>
<div class="flex flex-col gap-heritage-space-md">
<div class="flex items-center justify-between">
<span class="font-heritage-label-technical text-heritage-label-technical uppercase tracking-widest text-heritage-primary">Program Sovereign</span>
<span class="material-symbols-outlined text-heritage-primary">shield</span>
</div>
<h3 class="font-heritage-headline-sm text-heritage-headline-sm text-heritage-on-surface">Discreet Asset-Backed Line</h3>
<p class="font-heritage-body-sm text-heritage-body-sm text-heritage-on-surface-variant leading-relaxed">
              Non-recourse secured collateral credit lines that maintain complete off-balance-sheet privacy. Facilitates instantaneous acquisition execution without triggering taxable capital gains events.
            </p>
</div>
<div class="flex flex-col gap-heritage-space-sm">
<div class="flex justify-between font-heritage-label-technical text-heritage-label-technical uppercase py-2 bg-heritage-surface-container-low px-heritage-space-sm text-heritage-on-surface">
<span>Collateral LTV</span>
<span class="text-heritage-primary font-bold">Up to 75%</span>
</div>
<div class="flex justify-between font-heritage-label-technical text-heritage-label-technical uppercase py-2 bg-heritage-surface-container-low px-heritage-space-sm text-heritage-on-surface">
<span>Underwriting Timeline</span>
<span class="text-heritage-secondary">48-Hour Execution</span>
</div>
<div class="flex justify-between font-heritage-label-technical text-heritage-label-technical uppercase py-2 bg-heritage-surface-container-low px-heritage-space-sm text-heritage-on-surface">
<span>Credit Reporting</span>
<span class="text-heritage-tertiary">Private Sovereign Vault</span>
</div>
</div>
</div>
<!-- Card 3 -->
<div class="bg-heritage-surface-container p-heritage-space-xl flex flex-col justify-between gap-heritage-space-lg shadow-lg hover:shadow-[0_16px_40px_rgba(212,175,55,0.06)] transition-all">
<div class="flex flex-col gap-heritage-space-md">
<div class="flex items-center justify-between">
<span class="font-heritage-label-technical text-heritage-label-technical uppercase tracking-widest text-heritage-primary">Program Concours</span>
<span class="material-symbols-outlined text-heritage-outline">history_edu</span>
</div>
<h3 class="font-heritage-headline-sm text-heritage-headline-sm text-heritage-on-surface">Classic &amp; Historic Equity Loan</h3>
<p class="font-heritage-body-sm text-heritage-body-sm text-heritage-on-surface-variant leading-relaxed">
              Customized for irreplaceable vintage and coachbuilt machinery. Recognizes certified appreciation trajectories, indexing loan amortization against historic market gains.
            </p>
</div>
<div class="flex flex-col gap-heritage-space-sm">
<div class="flex justify-between font-heritage-label-technical text-heritage-label-technical uppercase py-2 bg-heritage-surface-container-low px-heritage-space-sm text-heritage-on-surface">
<span>Vehicle Eligibility</span>
<span class="text-heritage-primary font-bold">1920 – 1999 Blue-Chip</span>
</div>
<div class="flex justify-between font-heritage-label-technical text-heritage-label-technical uppercase py-2 bg-heritage-surface-container-low px-heritage-space-sm text-heritage-on-surface">
<span>Appraisal Model</span>
<span class="text-heritage-secondary">Concours Tri-Annual</span>
</div>
<div class="flex justify-between font-heritage-label-technical text-heritage-label-technical uppercase py-2 bg-heritage-surface-container-low px-heritage-space-sm text-heritage-on-surface">
<span>Repayment Structure</span>
<span class="text-heritage-tertiary">Interest-Only Options</span>
</div>
</div>
</div>
</div>
<!-- Private Banking Accreditation Partners Bar -->
<div class="bg-heritage-surface-container p-heritage-space-lg flex flex-col md:flex-row items-center justify-between gap-heritage-space-md shadow-md">
<span class="font-heritage-label-technical text-heritage-label-technical uppercase tracking-widest text-heritage-outline">
          Preferred Custodial &amp; Private Banking Consortia:
        </span>
<div class="flex flex-wrap items-center gap-heritage-space-xl font-heritage-label-ui text-heritage-label-ui uppercase tracking-widest text-heritage-on-surface-variant">
<span class="hover:text-heritage-primary transition-colors cursor-default">J.P. Morgan Private Bank</span>
<span class="text-heritage-outline-variant">•</span>
<span class="hover:text-heritage-primary transition-colors cursor-default">Coutts &amp; Co.</span>
<span class="text-heritage-outline-variant">•</span>
<span class="hover:text-heritage-primary transition-colors cursor-default">UBS Wealth Management</span>
<span class="text-heritage-outline-variant">•</span>
<span class="hover:text-heritage-primary transition-colors cursor-default">Lombard Odier</span>
</div>
</div>
</div>
</section>
<!-- Editorial Section: Financial FAQ Accordion -->
<section class="w-full bg-heritage-surface-container-low py-heritage-space-xl">
<div class="max-w-4xl mx-auto px-heritage-gutter flex flex-col gap-heritage-space-xl">
<div class="flex flex-col items-center text-center gap-heritage-space-xs">
<span class="font-heritage-label-technical text-heritage-label-technical uppercase tracking-[0.25em] text-heritage-primary">04 / Advisory Clarifications</span>
<h2 class="font-heritage-headline-lg text-heritage-headline-lg text-heritage-on-surface font-normal">Frequently Addressed Inquiries</h2>
<p class="font-heritage-body-sm text-heritage-body-sm text-heritage-outline max-w-lg mt-1">
          Confidential financial protocol and cross-border acquisition jurisprudence.
        </p>
</div>
<div class="flex flex-col gap-heritage-space-sm">
<!-- FAQ 1 -->
<div class="bg-heritage-surface-container shadow-md">
<button class="w-full p-heritage-space-lg flex items-center justify-between text-left focus:outline-none" onclick="toggleAccordion('faq-1')">
<span class="font-heritage-title-md text-heritage-title-md text-heritage-on-surface">How does Apex Heritage facilitate jurisdictional sales tax mitigation?</span>
<span class="material-symbols-outlined text-heritage-primary text-[20px] transition-transform duration-300" id="faq-icon-faq-1">add</span>
</button>
<div class="hidden px-heritage-space-lg pb-heritage-space-lg font-heritage-body-sm text-heritage-body-sm text-heritage-on-surface-variant leading-relaxed" id="faq-content-faq-1">
            Through compliant Indonesian business structures and specialist customs coordination, acquisitions can be managed with appropriate documentation and local regulatory compliance while coordinating delivery into Indonesia.mpletely mitigating ad-valorem state taxes.
          </div>
</div>
<!-- FAQ 2 -->
<div class="bg-heritage-surface-container shadow-md">
<button class="w-full p-heritage-space-lg flex items-center justify-between text-left focus:outline-none" onclick="toggleAccordion('faq-2')">
<span class="font-heritage-title-md text-heritage-title-md text-heritage-on-surface">Can existing vehicle debt or liens be absorbed into the trade-in valuation?</span>
<span class="material-symbols-outlined text-heritage-primary text-[20px] transition-transform duration-300" id="faq-icon-faq-2">add</span>
</button>
<div class="hidden px-heritage-space-lg pb-heritage-space-lg font-heritage-body-sm text-heritage-body-sm text-heritage-on-surface-variant leading-relaxed" id="faq-content-faq-2">
            Yes. Our treasury desk executes direct lien payoffs with any domestic or international banking institution within 24 hours of provenance verification. Any surplus equity rolls seamlessly into your new acquisition’s down payment schedule.
          </div>
</div>
<!-- FAQ 3 -->
<div class="bg-heritage-surface-container shadow-md">
<button class="w-full p-heritage-space-lg flex items-center justify-between text-left focus:outline-none" onclick="toggleAccordion('faq-3')">
<span class="font-heritage-title-md text-heritage-title-md text-heritage-on-surface">What level of financial documentation is required for private clients?</span>
<span class="material-symbols-outlined text-heritage-primary text-[20px] transition-transform duration-300" id="faq-icon-faq-3">add</span>
</button>
<div class="hidden px-heritage-space-lg pb-heritage-space-lg font-heritage-body-sm text-heritage-body-sm text-heritage-on-surface-variant leading-relaxed" id="faq-content-faq-3">
            Through our Sovereign Asset-Backed Line, clients may qualify strictly through existing asset proof or collateral pledge without disclosing personal tax returns, operating business financials, or public bureau inquiries. Discretion is paramount.
          </div>
</div>
<!-- FAQ 4 -->
<div class="bg-heritage-surface-container shadow-md">
<button class="w-full p-heritage-space-lg flex items-center justify-between text-left focus:outline-none" onclick="toggleAccordion('faq-4')">
<span class="font-heritage-title-md text-heritage-title-md text-heritage-on-surface">Are international client deliveries and foreign currency allocations supported?</span>
<span class="material-symbols-outlined text-heritage-primary text-[20px] transition-transform duration-300" id="faq-icon-faq-4">add</span>
</button>
<div class="hidden px-heritage-space-lg pb-heritage-space-lg font-heritage-body-sm text-heritage-body-sm text-heritage-on-surface-variant leading-relaxed" id="faq-content-faq-4">
            Apex Heritage quotes in Indonesian Rupiah (IDR) for local clients and coordinates vehicle import documentation, shipping, and customs clearance in accordance with Indonesian regulations.
          </div>
</div>
</div>
</div>
</section>
<!-- Interactive JavaScript -->
<script>
    let currentPrice = 415000;
    let currentDownPercent = 25;
    let currentTenorMonths = 60;
    let currentAprPercent = 5.49;
    let currentBalloonPercent = 25;
    let tradeInEquityApplied = 0;

    function recalculateFinancing() {
      const downAmount = (currentPrice * (currentDownPercent / 100)) + tradeInEquityApplied;
      const principal = Math.max(currentPrice - downAmount, 0);
      const balloonAmount = currentPrice * (currentBalloonPercent / 100);
      
      const monthlyRate = (currentAprPercent / 100) / 12;
      const n = currentTenorMonths;

      // Present value of balloon payment
      const pvBalloon = balloonAmount / Math.pow(1 + monthlyRate, n);
      // Principal amortized through monthly payments
      const amortizedPrincipal = principal - pvBalloon;

      let monthlyPayment = 0;
      if (amortizedPrincipal > 0) {
        monthlyPayment = (amortizedPrincipal * (monthlyRate * Math.pow(1 + monthlyRate, n))) / (Math.pow(1 + monthlyRate, n) - 1);
      }
      // Add interest-only portion on balloon
      monthlyPayment += balloonAmount * monthlyRate;

      const totalPayments = monthlyPayment * n;
      const totalInterest = Math.max((totalPayments + balloonAmount) - principal, 0);

      // DOM Updates
      document.getElementById('display-price-header').innerText = formatIDR(currentPrice);
      document.getElementById('display-downpayment-val').innerText = formatIDR(downAmount);
      document.getElementById('downpayment-percent-badge').innerText = currentDownPercent + '%';

      document.getElementById('output-monthly-payment').innerText = formatIDR(monthlyPayment);
      document.getElementById('output-financed-capital').innerText = formatIDR(principal);
      document.getElementById('output-downpayment').innerText = formatIDR(downAmount);
      document.getElementById('output-total-interest').innerText = formatIDR(totalInterest);
      document.getElementById('output-balloon-amount').innerText = formatIDR(balloonAmount);

      // Allocation bar widths
      const totalOutlay = principal + balloonAmount + totalInterest;
      if (totalOutlay > 0) {
        const principalPct = Math.round((principal / totalOutlay) * 100);
        const balloonPct = Math.round((balloonAmount / totalOutlay) * 100);
        const interestPct = 100 - principalPct - balloonPct;
        document.getElementById('bar-principal').style.width = principalPct + '%';
        document.getElementById('bar-residual').style.width = balloonPct + '%';
        document.getElementById('bar-interest').style.width = interestPct + '%';
      }
    }

    function updatePriceFromSlider(val) {
      currentPrice = parseInt(val, 10);
      recalculateFinancing();
    }

    function updateDownpaymentSlider(val) {
      currentDownPercent = parseInt(val, 10);
      recalculateFinancing();
    }

    function setTenorTerm(months) {
      currentTenorMonths = months;
      document.querySelectorAll('.tenor-btn').forEach(btn => {
        if (parseInt(btn.getAttribute('data-tenor'), 10) === months) {
          btn.className = 'tenor-btn py-3 text-center font-heritage-label-ui text-heritage-label-ui uppercase tracking-wider bg-heritage-primary-container text-heritage-on-primary-container font-bold shadow-md';
        } else {
          btn.className = 'tenor-btn py-3 text-center font-heritage-label-ui text-heritage-label-ui uppercase tracking-wider bg-heritage-surface-container-lowest text-heritage-on-surface-variant hover:text-heritage-on-surface transition-all';
        }
      });
      recalculateFinancing();
    }

    function setBalloonResidual(pct) {
      currentBalloonPercent = pct;
      document.querySelectorAll('.balloon-btn').forEach(btn => {
        if (parseInt(btn.getAttribute('data-balloon'), 10) === pct) {
          btn.className = 'balloon-btn py-2.5 text-center font-heritage-label-ui text-heritage-label-ui uppercase tracking-wider bg-heritage-primary-container text-heritage-on-primary-container font-bold shadow-md';
        } else {
          btn.className = 'balloon-btn py-2.5 text-center font-heritage-label-ui text-heritage-label-ui uppercase tracking-wider bg-heritage-surface-container-lowest text-heritage-on-surface-variant transition-all';
        }
      });
      recalculateFinancing();
    }

    function applyVehiclePreset(val) {
      if (val !== 'custom') {
        currentPrice = parseInt(val, 10);
        document.getElementById('slider-price').value = currentPrice;
        recalculateFinancing();
      }
    }

    function switchStudioTab(tab) {
      const financeSec = document.getElementById('section-finance');
      const tradeinSec = document.getElementById('section-tradein');
      const btnFinance = document.getElementById('tab-btn-finance');
      const btnTradein = document.getElementById('tab-btn-tradein');

      if (tab === 'finance') {
        financeSec.classList.remove('hidden');
        tradeinSec.classList.add('hidden');
        btnFinance.className = 'px-heritage-space-xl py-3 font-heritage-label-ui text-heritage-label-ui uppercase tracking-widest transition-all duration-300 bg-heritage-primary-container text-heritage-on-primary-container shadow-md flex items-center gap-heritage-space-sm';
        btnTradein.className = 'px-heritage-space-xl py-3 font-heritage-label-ui text-heritage-label-ui uppercase tracking-widest transition-all duration-300 text-heritage-on-surface-variant hover:text-heritage-on-surface flex items-center gap-heritage-space-sm';
      } else {
        tradeinSec.classList.remove('hidden');
        financeSec.classList.add('hidden');
        btnTradein.className = 'px-heritage-space-xl py-3 font-heritage-label-ui text-heritage-label-ui uppercase tracking-widest transition-all duration-300 bg-heritage-primary-container text-heritage-on-primary-container shadow-md flex items-center gap-heritage-space-sm';
        btnFinance.className = 'px-heritage-space-xl py-3 font-heritage-label-ui text-heritage-label-ui uppercase tracking-widest transition-all duration-300 text-heritage-on-surface-variant hover:text-heritage-on-surface flex items-center gap-heritage-space-sm';
      }
    }

    function calculateTradeInEstimate() {
      const make = document.getElementById('ti-make').value.toUpperCase();
      let low = 180000;
      let high = 210000;

      if (make.includes('FERRARI')) {
        low = 220000; high = 265000;
      } else if (make.includes('ASTON')) {
        low = 195000; high = 230000;
      } else if (make.includes('PORSCHE')) {
        low = 175000; high = 215000;
      }

      document.getElementById('ti-appraisal-range').innerText = formatIDR(low) + ' – ' + formatIDR(high);
    }

    function toggleEquityRollover(isChecked) {
      const rolloverStatus = document.getElementById('rollover-status');
      if (isChecked) {
        tradeInEquityApplied = 195000;
        rolloverStatus.classList.remove('hidden');
      } else {
        tradeInEquityApplied = 0;
        rolloverStatus.classList.add('hidden');
      }
      recalculateFinancing();
    }

    function toggleAccordion(id) {
      const content = document.getElementById('faq-content-' + id);
      const icon = document.getElementById('faq-icon-' + id);
      if (content.classList.contains('hidden')) {
        content.classList.remove('hidden');
        icon.innerText = 'remove';
      } else {
        content.classList.add('hidden');
        icon.innerText = 'add';
      }
    }

    function triggerPdfNotice() {
      alert("Amortization Schedule PDF for the 2024 Aston Martin DBS 770 Ultimate has been prepared for confidential download.");
    }

    // Initialize state
    recalculateFinancing();
  </script>
</div></div></main><footer class="w-full bg-heritage-surface-container-low text-heritage-on-surface-variant"><div class="max-w-7xl mx-auto px-heritage-gutter pt-heritage-space-xl pb-heritage-space-lg"><div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-heritage-space-xl mb-heritage-space-xl"><div class="lg:col-span-5 flex flex-col gap-heritage-space-md"><span class="font-heritage-headline-sm text-heritage-headline-sm uppercase tracking-widest text-heritage-on-surface">Apex Heritage Motors</span><p class="font-heritage-body-md text-heritage-body-md text-heritage-on-surface-variant max-w-md">Curators of rare, coachbuilt, and bespoke automotive marvels. Each motorcar undergoes rigorous provenance verification, mechanical certification, and concours preservation before entering our private vault.</p><div class="flex items-center gap-heritage-space-md pt-heritage-space-sm"><span class="font-heritage-label-technical text-heritage-label-technical uppercase px-heritage-space-sm py-1 bg-heritage-surface-container text-heritage-tertiary">100% Provenance Verified</span><span class="font-heritage-label-technical text-heritage-label-technical uppercase px-heritage-space-sm py-1 bg-heritage-surface-container text-heritage-tertiary">Concours Certified</span></div></div><div class="lg:col-span-3 flex flex-col gap-heritage-space-md"><span class="font-heritage-title-md text-heritage-title-md text-heritage-on-surface uppercase tracking-wider">Private Salons</span><div class="space-y-heritage-space-md font-heritage-body-sm text-heritage-body-sm"><div class="flex flex-col"><span class="text-heritage-primary font-bold uppercase font-heritage-label-technical text-heritage-label-technical">Surabaya Atelier</span><span class="text-heritage-on-surface-variant">9600 Wilshire Blvd, Enclave Suite 400</span><span class="text-heritage-outline">East Java, Indonesia</span></div><div class="flex flex-col"><span class="text-heritage-primary font-bold uppercase font-heritage-label-technical text-heritage-label-technical">Surabaya Private Vault</span><span class="text-heritage-on-surface-variant">Surabaya, East Java, Indonesia</span><span class="text-heritage-outline">Surabaya, East Java, Indonesia</span></div></div></div><div class="lg:col-span-4 flex flex-col gap-heritage-space-md"><span class="font-heritage-title-md text-heritage-title-md text-heritage-on-surface uppercase tracking-wider">Allocation Gazette</span><p class="font-heritage-body-sm text-heritage-body-sm text-heritage-on-surface-variant">Receive discreet, confidential releases of off-market private consignments and rare hypercar allocations prior to public unveiling.</p><div class="flex w-full"><input class="w-full bg-heritage-surface-container-lowest text-heritage-on-surface px-heritage-space-md py-3 font-heritage-label-technical text-heritage-label-technical uppercase placeholder:text-heritage-outline focus:outline-none focus:bg-heritage-surface-container" placeholder="CONFIDENTIAL EMAIL" type="email"/><button class="bg-heritage-primary-container text-heritage-on-primary-container hover:bg-heritage-primary px-heritage-space-lg font-heritage-label-ui text-heritage-label-ui uppercase tracking-widest transition-colors" type="button">Join</button></div></div></div><div class="pt-heritage-space-lg flex flex-col md:flex-row items-center justify-between gap-heritage-space-md font-heritage-label-technical text-heritage-label-technical uppercase text-heritage-outline"><div class="flex flex-wrap items-center gap-heritage-space-md"><a class="hover:text-heritage-primary transition-colors" data-path="inventory" href="#inventory">Vault Inventory</a><a class="hover:text-heritage-primary transition-colors" data-path="bespoke-financing" href="#financing-studio">Acquisition Advisory</a><a class="hover:text-heritage-primary transition-colors" data-path="about-showroom" href="#about-showroom">Atelier Heritage</a><a class="hover:text-heritage-primary transition-colors" data-path="faq" href="#faq">Consignment Terms</a></div><div>© 2025 Apex Heritage Motors Indonesia. All Rights Reserved.</div></div></div></footer><script>
  (function(){
    const aiButton = document.getElementById('floatingAiButton');
    const aiPanel = document.getElementById('aiModal');
    if (aiButton && aiPanel) {
      aiButton.addEventListener('click', function(){
        aiPanel.classList.toggle('hidden');
        const isOpen = !aiPanel.classList.contains('hidden');
        aiButton.setAttribute('aria-expanded', String(isOpen));
        if (isOpen) {
          const input = document.getElementById('aiInput');
          if (input) setTimeout(() => input.focus(), 100);
        }
      });
      const closeButton = aiPanel.querySelector('button[onclick="toggleAiModal()"]');
      if (closeButton) closeButton.addEventListener('click', () => aiButton.setAttribute('aria-expanded','false'));
    }
  })();
</script>

</body></html>