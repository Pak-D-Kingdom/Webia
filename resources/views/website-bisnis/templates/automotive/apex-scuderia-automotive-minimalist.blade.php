<!DOCTYPE html>

<html class="dark" lang="id"><head><meta charset="utf-8"/><meta content="width=device-width, initial-scale=1.0" name="viewport"/><meta content="web_standard" name="shell-type"/><link href="https://fonts.googleapis.com" rel="preconnect"/><link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/><link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&amp;family=Space+Grotesk:wght@500;600;700&amp;display=swap" rel="stylesheet"/><link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/><style>@layer base{html,body{margin:0;padding:0;}body{overscroll-behavior:none;}main>:first-child{margin-top:0!important;}main>:last-child{margin-bottom:0!important;}}::-webkit-scrollbar{display:none;}body.apex-scuderia-preview > main > div > :not(section:first-child), body.apex-scuderia-preview > footer { display: none !important; } body.apex-scuderia-preview > main { padding-top: 0 !important; }
</style><title>APEX Scuderia &mdash; Minimalist Automotive Collection</title>
@vite('resources/css/app.css')
</head><body class="bg-scuderia-surface font-scuderia-body-md text-scuderia-on-surface antialiased selection:bg-scuderia-primary-container selection:text-scuderia-on-primary-container{{ request()->boolean('preview') ? ' apex-scuderia-preview' : '' }}"><header class="fixed top-0 left-0 w-full z-50"><div class="w-full bg-scuderia-surface-container-lowest/90 backdrop-blur-md border-b border-white/5"><div class="max-w-[1720px] mx-auto px-scuderia-margin md:px-scuderia-margin-tablet lg:px-scuderia-margin-desktop h-9 flex items-center justify-between font-scuderia-label-sm text-scuderia-label-sm uppercase tracking-wider text-scuderia-secondary"><div class="flex items-center gap-scuderia-space-md"><div class="flex items-center gap-scuderia-space-xs"><span class="w-1.5 h-1.5 rounded-scuderia-full bg-emerald-500 animate-pulse"></span><span class="text-scuderia-on-surface font-semibold">Private Atelier Open</span></div><span class="hidden lg:inline text-scuderia-secondary/40">|</span><span class="hidden lg:inline">Mon-Sat 08:30-19:30 EST</span><span class="hidden xl:inline text-scuderia-secondary/40">|</span><span class="hidden xl:inline">Beverly Hills &amp; London Mayfair</span></div><div class="flex items-center gap-scuderia-space-lg"><div class="flex items-center gap-scuderia-space-xs text-scuderia-secondary hover:text-scuderia-on-surface transition-colors cursor-pointer"><span class="material-symbols-outlined text-[14px] text-scuderia-primary-container">call</span><span class="font-scuderia-label-sm text-scuderia-label-sm">VIP Concierge: +1 (800) 412-APEX</span></div><div class="hidden sm:flex items-center gap-scuderia-space-md text-scuderia-secondary"><div class="flex items-center gap-1 cursor-pointer hover:text-scuderia-on-surface transition-colors"><span>USD ($)</span><span class="material-symbols-outlined text-[12px]">expand_more</span></div><div class="flex items-center gap-1 cursor-pointer hover:text-scuderia-on-surface transition-colors"><span>EN</span><span class="material-symbols-outlined text-[12px]">expand_more</span></div></div></div></div></div><div class="w-full bg-scuderia-surface-container-lowest/80 backdrop-blur-2xl shadow-[0_4px_30px_rgba(0,0,0,0.5)] border-b border-white/[0.07]"><div class="max-w-[1720px] mx-auto px-scuderia-margin md:px-scuderia-margin-tablet lg:px-scuderia-margin-desktop h-20 flex items-center justify-between"><a class="flex items-center gap-scuderia-space-sm group" data-path="vault-inventory" href="#"><div class="w-8 h-8 rounded-scuderia-lg bg-scuderia-surface-container flex items-center justify-center border border-white/10 group-hover:border-scuderia-primary-container/80 transition-colors"><div class="w-3.5 h-3.5 rotate-45 bg-scuderia-primary-container shadow-[0_0_12px_rgba(196,30,58,0.6)]"></div></div><div class="flex flex-col"><span class="font-scuderia-headline-sm text-scuderia-headline-sm uppercase tracking-tight text-scuderia-on-surface leading-none group-hover:text-primary transition-colors">Apex Scuderia</span><span class="font-scuderia-label-sm text-scuderia-label-sm uppercase tracking-[0.25em] text-scuderia-primary-container leading-none mt-1">Atelier &amp; Provenance</span></div></a><nav class="hidden xl:flex items-center gap-1" data-active-classes="text-scuderia-on-surface bg-scuderia-surface-container-high/80 rounded-scuderia-lg shadow-[inset_0_1px_0_rgba(255,255,255,0.1)]"><a aria-current="page" class="px-3 py-2 font-scuderia-label-md uppercase tracking-wider transition-all text-scuderia-on-surface bg-scuderia-surface-container-high/80 rounded-scuderia-lg shadow-[inset_0_1px_0_rgba(255,255,255,0.1)]" data-path="vault-inventory" href="#">Vault Inventory</a><a class="px-3 py-2 font-scuderia-label-md text-scuderia-label-md uppercase tracking-wider text-scuderia-on-surface-variant hover:text-scuderia-on-surface hover:bg-scuderia-surface-container transition-all" data-path="categories" href="#">Categories</a><a class="px-3 py-2 font-scuderia-label-md text-scuderia-label-md uppercase tracking-wider text-scuderia-on-surface-variant hover:text-scuderia-on-surface hover:bg-scuderia-surface-container transition-all" data-path="showroom-atelier" href="#">Showroom Atelier</a><a class="px-3 py-2 font-scuderia-label-md text-scuderia-label-md uppercase tracking-wider text-scuderia-on-surface-variant hover:text-scuderia-on-surface hover:bg-scuderia-surface-container transition-all" data-path="bespoke-financing" href="#">Bespoke Financing</a><a class="px-3 py-2 font-scuderia-label-md text-scuderia-label-md uppercase tracking-wider text-scuderia-on-surface-variant hover:text-scuderia-on-surface hover:bg-scuderia-surface-container transition-all" data-path="vip-test-drive" href="#">VIP Test Drive</a><a class="px-3 py-2 font-scuderia-label-md text-scuderia-label-md uppercase tracking-wider text-scuderia-on-surface-variant hover:text-scuderia-on-surface hover:bg-scuderia-surface-container transition-all" data-path="provenance" href="#">Provenance</a><a class="px-3 py-2 font-scuderia-label-md text-scuderia-label-md uppercase tracking-wider text-scuderia-on-surface-variant hover:text-scuderia-on-surface hover:bg-scuderia-surface-container transition-all" data-path="faq" href="#">FAQ</a></nav><div class="flex items-center gap-scuderia-space-md"><a class="hidden sm:inline-flex items-center justify-center px-5 py-2.5 rounded-scuderia-lg bg-scuderia-primary-container text-scuderia-on-primary-container font-scuderia-label-md text-scuderia-label-md uppercase tracking-widest hover:brightness-110 shadow-[0_0_20px_rgba(196,30,58,0.35)] transition-all" data-path="book-private-viewing" href="#">Book Private Viewing</a><div class="w-8 h-8 rounded-scuderia-full bg-primary flex items-center justify-center shadow-md"><span class="material-symbols-outlined text-scuderia-on-primary text-[18px]">person</span></div><button class="xl:hidden p-2 text-scuderia-on-surface-variant hover:text-scuderia-on-surface rounded-scuderia-lg hover:bg-scuderia-surface-container"><span class="material-symbols-outlined text-[24px]">menu</span></button></div></div></div></header><main class="w-full pt-[116px] bg-scuderia-surface min-h-screen"><div class="flex flex-col w-full">
<!-- SECTION 1: HERO -->
<section class="relative w-full overflow-hidden bg-scuderia-surface-container-lowest">
<div class="absolute inset-0 bg-[radial-gradient(ellipse_80%_60%_at_50%_-20%,rgba(196,30,58,0.2),transparent_70%)] pointer-events-none"></div>
<div class="max-w-[1720px] mx-auto px-scuderia-margin md:px-scuderia-margin-tablet lg:px-scuderia-margin-desktop pt-10 pb-20">
<!-- Top Meta Eyebrow -->
<div class="flex flex-wrap items-center justify-between gap-4 mb-6">
<div class="inline-flex items-center gap-3 px-3 py-1.5 rounded-scuderia bg-scuderia-surface-container-high/60 backdrop-blur-md">
<span class="w-2 h-2 rounded-scuderia-full bg-scuderia-primary-container shadow-[0_0_8px_rgba(196,30,58,0.8)]"></span>
<span class="font-scuderia-label-sm text-scuderia-label-sm uppercase tracking-[0.2em] text-scuderia-secondary">Vault Drop Nº 248 • Private Treaty Release</span>
</div>
<div class="flex items-center gap-6 font-scuderia-label-sm text-scuderia-label-sm uppercase tracking-widest text-scuderia-secondary/70">
<span>Beverly Hills Atelier</span>
<span class="text-white/20">/</span>
<span>Mayfair Vault</span>
<span class="text-white/20">/</span>
<span class="text-scuderia-primary-container font-semibold">Immediate Escrow Ready</span>
</div>
</div>
<!-- Main Asymmetric Headline & Intro Grid -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-end mb-12">
<div class="lg:col-span-8 space-y-4">
<h1 class="font-scuderia-display-hero text-scuderia-display-hero text-scuderia-on-surface uppercase tracking-tight">
            Sculpted Velocity <br class="hidden sm:inline"/>
<span class="text-transparent bg-clip-text bg-gradient-to-r from-scuderia-on-surface via-scuderia-primary-fixed to-scuderia-primary-container">in Ruby &amp; Carbon</span>
</h1>
</div>
<div class="lg:col-span-4 space-y-6">
<p class="font-scuderia-body-lg text-scuderia-body-lg text-scuderia-secondary/90 leading-relaxed">
            Curated acquisitions of world-class coachbuilt machinery, hypercars, and historic racing provenance. Handled under total institutional discretion.
          </p>
<div class="flex flex-wrap items-center gap-4">
<a class="inline-flex items-center justify-center gap-2.5 px-7 py-3.5 rounded-scuderia bg-scuderia-primary-container text-scuderia-on-primary-container font-scuderia-label-md text-scuderia-label-md uppercase tracking-widest hover:brightness-110 shadow-[0_0_28px_rgba(196,30,58,0.4)] transition-all" href="#vault-inventory">
<span>Explore Vault Inventory</span>
<span class="material-symbols-outlined text-[18px]">arrow_downward</span>
</a>
<a class="inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-scuderia bg-scuderia-surface-container-high/80 hover:bg-scuderia-surface-container-highest text-scuderia-on-surface font-scuderia-label-md text-scuderia-label-md uppercase tracking-wider backdrop-blur-md transition-all" href="#vip-reservation">
<span class="material-symbols-outlined text-[18px] text-scuderia-primary-container">calendar_month</span>
<span>Schedule VIP Test Drive</span>
</a>
</div>
</div>
</div>
<!-- Main Showcase Bento: Ferrari SF90 XX Stradale & Vintage TZ2 -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
<!-- Primary Featured Hypercar (8 Cols) -->
<div class="lg:col-span-8 relative rounded-scuderia-xl overflow-hidden bg-scuderia-surface-container shadow-2xl group min-h-[520px] flex flex-col justify-between">
<div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-[1.02]" data-alt="2024 Ferrari SF90 XX Stradale finished in deep Rosso Rubino metallic paint with exposed twill carbon aero flickers, standing poised inside a moody architectural minimalist atelier with diffused slate reflections." style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBYr-KoOfAGMgHvEsuisclSeZETcQHqkTkQkyGkNU20naccCtjCFE93fPqFum2rOjhx8FRugt5q5tFPYD4DhMtUZnYJVIbd1VP-7nxUN5AA-V8jv5e-qZIlc4j2J6ynvyFn4ImXrzTqP3OIgo9GuvqMc6ylXfzeCn0lJYAtgspKElqV_6c7slyUVEjbz8ogs6Q2ywKoMY7C5JrQyuwcT4T5nnDhM3HCMtIDiSuj3K-jw0FCnrDsMGuutA')">
</div>
<div class="absolute inset-0 bg-gradient-to-t from-scuderia-surface-container-lowest via-scuderia-surface-container-lowest/40 to-transparent"></div>
<div class="absolute inset-0 bg-gradient-to-r from-scuderia-surface-container-lowest/80 via-transparent to-transparent"></div>
<!-- Top Badge Bar -->
<div class="relative z-10 p-6 sm:p-8 flex items-start justify-between">
<div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-scuderia bg-scuderia-surface-container-lowest/85 backdrop-blur-xl">
<span class="w-2 h-2 rounded-scuderia-full bg-scuderia-primary-container animate-ping"></span>
<span class="font-scuderia-label-sm text-scuderia-label-sm uppercase tracking-widest text-scuderia-on-surface">Vault Flagship • Allocation Confirmed</span>
</div>
<div class="px-3.5 py-1.5 rounded-scuderia bg-scuderia-surface-container-high/90 text-scuderia-primary-container font-scuderia-label-sm text-scuderia-label-sm uppercase tracking-widest backdrop-blur-md">
              Chassis Nº 01 of 799
            </div>
</div>
<!-- Bottom Telemetry HUD Overlay -->
<div class="relative z-10 p-6 sm:p-8 space-y-6">
<div class="max-w-xl">
<span class="font-scuderia-label-sm text-scuderia-label-sm uppercase tracking-[0.25em] text-scuderia-primary-container block mb-1">Maranello Works Speciale</span>
<h2 class="font-scuderia-headline-lg text-scuderia-headline-lg text-scuderia-on-surface uppercase tracking-tight">2024 Ferrari SF90 XX Stradale</h2>
<p class="font-scuderia-body-sm text-scuderia-body-sm text-scuderia-secondary/80 mt-1">Finished in Bespoke Rosso Rubino Metallizzato over Nero Alcantara with Giallo telemetry instrumentation.</p>
</div>
<!-- Telemetry Matrix Bar -->
<div class="grid grid-cols-2 sm:grid-cols-4 gap-3 pt-4 bg-scuderia-surface-container-lowest/70 backdrop-blur-xl p-4 rounded-scuderia-lg">
<div class="space-y-0.5">
<span class="font-scuderia-label-sm text-scuderia-label-sm uppercase text-scuderia-secondary/60 block">Output</span>
<span class="font-scuderia-headline-sm text-scuderia-headline-sm text-scuderia-on-surface tabular-nums">1,016 <span class="font-scuderia-label-sm text-scuderia-label-sm text-scuderia-secondary">BHP</span></span>
</div>
<div class="space-y-0.5">
<span class="font-scuderia-label-sm text-scuderia-label-sm uppercase text-scuderia-secondary/60 block">0–100 km/h</span>
<span class="font-scuderia-headline-sm text-scuderia-headline-sm text-scuderia-primary-container tabular-nums">2.3 <span class="font-scuderia-label-sm text-scuderia-label-sm text-scuderia-secondary">SEC</span></span>
</div>
<div class="space-y-0.5">
<span class="font-scuderia-label-sm text-scuderia-label-sm uppercase text-scuderia-secondary/60 block">Powertrain</span>
<span class="font-scuderia-title-md text-scuderia-title-md text-scuderia-on-surface">V8 Twin-Turbo + 3x e-Motors</span>
</div>
<div class="space-y-0.5">
<span class="font-scuderia-label-sm text-scuderia-label-sm uppercase text-scuderia-secondary/60 block">Acquisition Value</span>
<span class="font-scuderia-headline-sm text-scuderia-headline-sm text-scuderia-on-surface tabular-nums">$890,000</span>
</div>
</div>
</div>
</div>
<!-- Secondary Showcase: Vintage Zagato Icon (4 Cols) -->
<div class="lg:col-span-4 flex flex-col gap-6">
<div class="relative rounded-scuderia-xl overflow-hidden bg-scuderia-surface-container shadow-2xl group flex-1 min-h-[300px] flex flex-col justify-between p-6 sm:p-8">
<div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-105" data-alt="Rare 1965 Alfa Romeo Giulia TZ2 tubular competition chassis with sculpted aerodynamic Zagato Kamm tail in crimson livery resting in a pristine dark marble showroom." style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuCaX4L6ewMNyB2H7xjA9KafgCub-Tl_ZxxpVYLdo59sWtfHjmMkwdvkobaYJNMr71yHoPpYidZbEegguUUjNqgGMUrgmj8wrHHA-FSVYhLkG5irMfS7Sh6GU7jOtOPq4qsbcQ6GV6KAxquMe1Sn7wwesDvIYIZ9yYkuxwf_ZLDZul00w12qsUgrXQBqy1m8kf2c6gW0RVXJYY_Wf8nYaQocF9iSQ3VsMymlYvVfpsSMjIOqVnVdDtD10g')">
</div>
<div class="absolute inset-0 bg-gradient-to-t from-scuderia-surface-container-lowest via-scuderia-surface-container-lowest/60 to-scuderia-surface-container-lowest/20"></div>
<div class="relative z-10 flex items-center justify-between">
<span class="px-3 py-1 rounded-scuderia bg-scuderia-surface-container-lowest/80 text-scuderia-secondary font-scuderia-label-sm text-scuderia-label-sm uppercase tracking-widest backdrop-blur-md">Historic Competition</span>
<span class="font-scuderia-label-sm text-scuderia-label-sm uppercase tracking-wider text-scuderia-on-surface bg-scuderia-primary-container/20 px-2.5 py-1 rounded-scuderia text-primary">Zagato Nº 14/117</span>
</div>
<div class="relative z-10 space-y-3 mt-16">
<span class="font-scuderia-label-sm text-scuderia-label-sm uppercase tracking-widest text-scuderia-primary-container">Autodelta Factory Works</span>
<h3 class="font-scuderia-headline-sm text-scuderia-headline-sm text-scuderia-on-surface uppercase">1965 Alfa Romeo Giulia TZ2</h3>
<p class="font-scuderia-body-sm text-scuderia-body-sm text-scuderia-secondary/80">Campione d'Italia survivor. Unbroken FIA Historic passport, matching numbers Twin Cam 1.6L.</p>
<div class="flex items-center justify-between pt-3">
<span class="font-scuderia-headline-sm text-scuderia-headline-sm text-scuderia-on-surface tabular-nums">$2,450,000</span>
<a class="inline-flex items-center gap-1 font-scuderia-label-sm text-scuderia-label-sm uppercase tracking-wider text-scuderia-primary-container hover:text-primary transition-colors" href="#sf90-spotlight">
<span>Dossier</span>
<span class="material-symbols-outlined text-[14px]">arrow_forward</span>
</a>
</div>
</div>
</div>
<!-- Live Market Ticker Mini Bento -->
<div class="rounded-scuderia-xl bg-scuderia-surface-container-high p-6 flex flex-col justify-between gap-4">
<div class="flex items-center justify-between">
<span class="font-scuderia-label-sm text-scuderia-label-sm uppercase tracking-widest text-scuderia-secondary">Apex Vault Telemetry</span>
<span class="flex items-center gap-1.5 font-scuderia-label-sm text-scuderia-label-sm text-emerald-400">
<span class="w-1.5 h-1.5 rounded-scuderia-full bg-emerald-400 animate-pulse"></span>
                Consignment Live
              </span>
</div>
<div class="grid grid-cols-2 gap-4">
<div class="space-y-1">
<span class="font-scuderia-label-sm text-scuderia-label-sm text-scuderia-secondary/60 uppercase block">Total Portfolio Value</span>
<span class="font-scuderia-title-lg text-scuderia-title-lg text-scuderia-on-surface tabular-nums">$48.2M USD</span>
</div>
<div class="space-y-1">
<span class="font-scuderia-label-sm text-scuderia-label-sm text-scuderia-secondary/60 uppercase block">Active Inquiries (24h)</span>
<span class="font-scuderia-title-lg text-scuderia-title-lg text-scuderia-primary-container tabular-nums">42 UHNW Clients</span>
</div>
</div>
</div>
</div>
</div>
<!-- Trust Pillars Row -->
<div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-8 pt-8">
<div class="flex items-center gap-3.5 p-4 rounded-scuderia-lg bg-scuderia-surface-container-high/50 backdrop-blur-sm">
<div class="w-10 h-10 rounded-scuderia bg-scuderia-surface-container-highest flex items-center justify-center text-scuderia-primary-container shrink-0">
<span class="material-symbols-outlined text-[20px]">verified</span>
</div>
<div>
<span class="font-scuderia-label-md text-scuderia-label-md uppercase tracking-wider text-scuderia-on-surface block">180+ Point Forensic Check</span>
<span class="font-scuderia-body-sm text-scuderia-body-sm text-scuderia-secondary/70">Factory master technicians</span>
</div>
</div>
<div class="flex items-center gap-3.5 p-4 rounded-scuderia-lg bg-scuderia-surface-container-high/50 backdrop-blur-sm">
<div class="w-10 h-10 rounded-scuderia bg-scuderia-surface-container-highest flex items-center justify-center text-scuderia-primary-container shrink-0">
<span class="material-symbols-outlined text-[20px]">flight_takeoff</span>
</div>
<div>
<span class="font-scuderia-label-md text-scuderia-label-md uppercase tracking-wider text-scuderia-on-surface block">Transatlantic Air Freight</span>
<span class="font-scuderia-body-sm text-scuderia-body-sm text-scuderia-secondary/70">Enclosed door-to-vault handling</span>
</div>
</div>
<div class="flex items-center gap-3.5 p-4 rounded-scuderia-lg bg-scuderia-surface-container-high/50 backdrop-blur-sm">
<div class="w-10 h-10 rounded-scuderia bg-scuderia-surface-container-highest flex items-center justify-center text-scuderia-primary-container shrink-0">
<span class="material-symbols-outlined text-[20px]">security</span>
</div>
<div>
<span class="font-scuderia-label-md text-scuderia-label-md uppercase tracking-wider text-scuderia-on-surface block">100% Title Verification</span>
<span class="font-scuderia-body-sm text-scuderia-body-sm text-scuderia-secondary/70">Unbroken provenance chain</span>
</div>
</div>
<div class="flex items-center gap-3.5 p-4 rounded-scuderia-lg bg-scuderia-surface-container-high/50 backdrop-blur-sm">
<div class="w-10 h-10 rounded-scuderia bg-scuderia-surface-container-highest flex items-center justify-center text-scuderia-primary-container shrink-0">
<span class="material-symbols-outlined text-[20px]">star</span>
</div>
<div>
<span class="font-scuderia-label-md text-scuderia-label-md uppercase tracking-wider text-scuderia-on-surface block">5.0 Collector Score</span>
<span class="font-scuderia-body-sm text-scuderia-body-sm text-scuderia-secondary/70">Concours &amp; Sotheby's rated</span>
</div>
</div>
</div>
</div>
</section>
<!-- SECTION 2: INTERACTIVE VEHICLE INVENTORY -->
<section class="w-full bg-scuderia-surface py-20" id="vault-inventory">
<div class="max-w-[1720px] mx-auto px-scuderia-margin md:px-scuderia-margin-tablet lg:px-scuderia-margin-desktop">
<!-- Section Header -->
<div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-10">
<div>
<div class="flex items-center gap-2 mb-2">
<span class="w-2.5 h-2.5 bg-scuderia-primary-container rounded-sm"></span>
<span class="font-scuderia-label-sm text-scuderia-label-sm uppercase tracking-[0.25em] text-scuderia-primary-container">Certified Atelier Catalog</span>
</div>
<h2 class="font-scuderia-headline-lg text-scuderia-headline-lg text-scuderia-on-surface uppercase tracking-tight">The Vault Inventory</h2>
</div>
<div class="flex items-center gap-4">
<span class="font-scuderia-label-sm text-scuderia-label-sm uppercase tracking-wider text-scuderia-secondary">Displaying 6 of 28 Curated Chassis</span>
<div class="w-12 h-1 bg-scuderia-surface-container-highest rounded-scuderia-full overflow-hidden">
<div class="w-1/3 h-full bg-scuderia-primary-container"></div>
</div>
</div>
</div>
<!-- Category Filter Pills -->
<div class="flex flex-wrap items-center gap-2.5 pb-6">
<button class="inventory-filter-pill active px-4 py-2 rounded-scuderia text-scuderia-on-primary-container bg-scuderia-primary-container font-scuderia-label-md text-scuderia-label-md uppercase tracking-wider transition-all" data-category="all">
          All Vault (28)
        </button>
<button class="inventory-filter-pill px-4 py-2 rounded-scuderia text-scuderia-secondary hover:text-scuderia-on-surface bg-scuderia-surface-container-high hover:bg-scuderia-surface-container-highest font-scuderia-label-md text-scuderia-label-md uppercase tracking-wider transition-all" data-category="exotic">
          Exotic Supercars (12)
        </button>
<button class="inventory-filter-pill px-4 py-2 rounded-scuderia text-scuderia-secondary hover:text-scuderia-on-surface bg-scuderia-surface-container-high hover:bg-scuderia-surface-container-highest font-scuderia-label-md text-scuderia-label-md uppercase tracking-wider transition-all" data-category="track">
          Track-Bred Classics (6)
        </button>
<button class="inventory-filter-pill px-4 py-2 rounded-scuderia text-scuderia-secondary hover:text-scuderia-on-surface bg-scuderia-surface-container-high hover:bg-scuderia-surface-container-highest font-scuderia-label-md text-scuderia-label-md uppercase tracking-wider transition-all" data-category="gt">
          Grand Tourers (7)
        </button>
<button class="inventory-filter-pill px-4 py-2 rounded-scuderia text-scuderia-secondary hover:text-scuderia-on-surface bg-scuderia-surface-container-high hover:bg-scuderia-surface-container-highest font-scuderia-label-md text-scuderia-label-md uppercase tracking-wider transition-all" data-category="suv">
          Ultra-Luxury SUVs (3)
        </button>
</div>
<!-- Secondary Controls Bar -->
<div class="p-4 rounded-scuderia-xl bg-scuderia-surface-container-high/60 backdrop-blur-md mb-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-12 gap-3 items-center">
<!-- Search Input -->
<div class="lg:col-span-4 relative">
<span class="material-symbols-outlined absolute left-3.5 top-1/2 -translate-y-1/2 text-scuderia-secondary text-[18px]">search</span>
<input class="w-full bg-scuderia-surface-container pl-10 pr-4 py-2.5 rounded-scuderia font-scuderia-body-sm text-scuderia-body-sm text-scuderia-on-surface placeholder:text-scuderia-secondary/50 focus:outline-none focus:bg-scuderia-surface-container-lowest transition-colors" placeholder="Search by model, chassis, or livery..." type="text"/>
</div>
<!-- Transmission -->
<div class="lg:col-span-3">
<select class="w-full bg-scuderia-surface-container px-3 py-2.5 rounded-scuderia font-scuderia-label-sm text-scuderia-label-sm text-scuderia-on-surface uppercase tracking-wider focus:outline-none">
<option>Transmission: All Configurations</option>
<option>F1 Dual-Clutch (8-Speed)</option>
<option>Porsche PDK Dual-Clutch</option>
<option>6-Speed Gated Manual</option>
</select>
</div>
<!-- Price Range -->
<div class="lg:col-span-3">
<select class="w-full bg-scuderia-surface-container px-3 py-2.5 rounded-scuderia font-scuderia-label-sm text-scuderia-label-sm text-scuderia-on-surface uppercase tracking-wider focus:outline-none">
<option>Price: Any Range</option>
<option>$300,000 – $500,000</option>
<option>$500,000 – $1,000,000</option>
<option>$1,000,000+</option>
</select>
</div>
<!-- Sort By -->
<div class="lg:col-span-2">
<select class="w-full bg-scuderia-surface-container px-3 py-2.5 rounded-scuderia font-scuderia-label-sm text-scuderia-label-sm text-scuderia-on-surface uppercase tracking-wider focus:outline-none">
<option>Sort: Acquired Date</option>
<option>Price: High to Low</option>
<option>Horsepower Output</option>
<option>Lowest Mileage</option>
</select>
</div>
</div>
<!-- Vehicle Grid (6 Cards) -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
<!-- Card 1: Ferrari SF90 XX Stradale -->
<div class="group rounded-scuderia-xl overflow-hidden bg-scuderia-surface-container flex flex-col justify-between transition-all duration-300 hover:shadow-2xl hover:shadow-primary-container/10">
<div>
<div class="relative w-full aspect-[16/10] overflow-hidden bg-scuderia-surface-container-highest">
<div class="w-full h-full bg-cover bg-center group-hover:scale-105 transition-transform duration-500" data-alt="2024 Ferrari SF90 XX Stradale in deep Rosso Rubino crimson paint with exposed matte carbon fiber aero elements in front 3/4 perspective on dark slate flooring." style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuCUlgulJ4xvGVX53UwDGEfsaVd1z7BvutLAI9wIWokigo-yqMo4Y-jPb9mijUcHm2JYG6v7ey4EjdpUv4evL0hW5t7zezdF3XzEgasAEmPrBX-ROttNAsC9IXkfe8hxmDOUecHBqTK6R2KyJtfe8R3ixMnRFOBLtlboXloE_QBvBSJKjwiE3bmmtTdrE2kx3jI133b6_xRVj0IdHZcmArhYhTNkCPbcKB5ZQ5oWgs9g_7aYHdMOPZGNXQ')">
</div>
<div class="absolute top-3 left-3 flex gap-2">
<span class="px-2.5 py-1 rounded-scuderia bg-scuderia-surface-container-lowest/80 backdrop-blur-md font-scuderia-label-sm text-scuderia-label-sm uppercase tracking-wider text-scuderia-primary-container font-semibold">CPO 180-Pt</span>
<span class="px-2.5 py-1 rounded-scuderia bg-scuderia-surface-container-lowest/80 backdrop-blur-md font-scuderia-label-sm text-scuderia-label-sm uppercase tracking-wider text-scuderia-on-surface">2024</span>
</div>
<div class="absolute top-3 right-3 px-2 py-0.5 rounded-scuderia bg-scuderia-primary-container text-scuderia-on-primary-container font-scuderia-label-sm text-scuderia-label-sm uppercase tracking-wider">
                1 of 799
              </div>
</div>
<div class="p-6">
<div class="flex items-center justify-between gap-2 mb-1">
<span class="font-scuderia-label-sm text-scuderia-label-sm uppercase tracking-wider text-scuderia-secondary">Ferrari • Maranello</span>
<span class="font-scuderia-label-sm text-scuderia-label-sm uppercase text-scuderia-secondary/60">1,200 mi</span>
</div>
<h3 class="font-scuderia-title-lg text-scuderia-title-lg text-scuderia-on-surface uppercase font-bold group-hover:text-primary transition-colors">SF90 XX Stradale</h3>
<p class="font-scuderia-body-sm text-scuderia-body-sm text-scuderia-secondary/80 mt-1 mb-4">Rosso Rubino Metallizzato over Nero Alcantara</p>
<!-- Telemetry Split -->
<div class="grid grid-cols-3 gap-2 py-3 bg-scuderia-surface-container-high/60 rounded-scuderia px-3 font-scuderia-label-sm text-scuderia-label-sm uppercase">
<div>
<span class="text-scuderia-secondary/50 block">Output</span>
<span class="text-scuderia-on-surface font-semibold">1,016 BHP</span>
</div>
<div>
<span class="text-scuderia-secondary/50 block">0–100 km/h</span>
<span class="text-scuderia-on-surface font-semibold">2.3s</span>
</div>
<div>
<span class="text-scuderia-secondary/50 block">Gearbox</span>
<span class="text-scuderia-on-surface font-semibold">8-Spd F1 DCT</span>
</div>
</div>
</div>
</div>
<div class="px-6 pb-6 pt-2 flex items-center justify-between gap-3">
<div>
<span class="font-scuderia-label-sm text-scuderia-label-sm uppercase text-scuderia-secondary/60 block">Acquisition</span>
<span class="font-scuderia-headline-sm text-scuderia-headline-sm text-scuderia-on-surface tabular-nums font-bold">$890,000</span>
</div>
<div class="flex items-center gap-2">
<a class="p-2.5 rounded-scuderia bg-scuderia-surface-container-high hover:bg-scuderia-surface-container-highest text-scuderia-on-surface hover:text-primary transition-colors" href="#sf90-spotlight" title="Inspect Telemetry">
<span class="material-symbols-outlined text-[18px]">visibility</span>
</a>
<a class="flex items-center gap-1.5 px-3.5 py-2.5 rounded-scuderia bg-scuderia-primary-container text-scuderia-on-primary-container font-scuderia-label-sm text-scuderia-label-sm uppercase tracking-wider hover:brightness-110 shadow-[0_0_12px_rgba(196,30,58,0.3)] transition-all" href="https://wa.me/">
<span class="material-symbols-outlined text-[16px]">chat</span>
<span>WhatsApp</span>
</a>
</div>
</div>
</div>
<!-- Card 2: Porsche 911 GT3 RS -->
<div class="group rounded-scuderia-xl overflow-hidden bg-scuderia-surface-container flex flex-col justify-between transition-all duration-300 hover:shadow-2xl hover:shadow-primary-container/10">
<div>
<div class="relative w-full aspect-[16/10] overflow-hidden bg-scuderia-surface-container-highest">
<div class="w-full h-full bg-cover bg-center group-hover:scale-105 transition-transform duration-500" data-alt="2023 Porsche 911 GT3 RS in Slate Grey Satin paint with exposed Weissach Package carbon roof and colossal swan-neck rear wing in a dark studio." style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBA3GsYR7Bapp9eIV5QUQj_F4Le862ZFpoP2B-u35AmBx9WFOqRRiE44_t9HfG5dJsLjNavs2VeJD_m0rrm4drA7QDzXCLMOqGSVVvdnlYzyAPrjFLzj9KTj8FPk4uVLqBSOJOmcIZlD5pKpcSVetAi1PFQdkQYJTmV7Sg1Mfm4hDsVCxVpOKqCQ0wxp_9DCbFKbUIsQH15RacCHDyTBMIteHLtuFnUgWVDoN6-rohz3SyPd3AbXH73sA')">
</div>
<div class="absolute top-3 left-3 flex gap-2">
<span class="px-2.5 py-1 rounded-scuderia bg-scuderia-surface-container-lowest/80 backdrop-blur-md font-scuderia-label-sm text-scuderia-label-sm uppercase tracking-wider text-scuderia-primary-container font-semibold">Weissach Pack</span>
<span class="px-2.5 py-1 rounded-scuderia bg-scuderia-surface-container-lowest/80 backdrop-blur-md font-scuderia-label-sm text-scuderia-label-sm uppercase tracking-wider text-scuderia-on-surface">2023</span>
</div>
<div class="absolute top-3 right-3 px-2 py-0.5 rounded-scuderia bg-scuderia-surface-container-highest text-scuderia-secondary font-scuderia-label-sm text-scuderia-label-sm uppercase tracking-wider">
                840 mi
              </div>
</div>
<div class="p-6">
<div class="flex items-center justify-between gap-2 mb-1">
<span class="font-scuderia-label-sm text-scuderia-label-sm uppercase tracking-wider text-scuderia-secondary">Porsche • Weissach</span>
<span class="font-scuderia-label-sm text-scuderia-label-sm uppercase text-scuderia-secondary/60">Single Owner</span>
</div>
<h3 class="font-scuderia-title-lg text-scuderia-title-lg text-scuderia-on-surface uppercase font-bold group-hover:text-primary transition-colors">911 GT3 RS (992)</h3>
<p class="font-scuderia-body-sm text-scuderia-body-sm text-scuderia-secondary/80 mt-1 mb-4">Slate Grey Satin over Black Leather &amp; Guards Red Stitch</p>
<div class="grid grid-cols-3 gap-2 py-3 bg-scuderia-surface-container-high/60 rounded-scuderia px-3 font-scuderia-label-sm text-scuderia-label-sm uppercase">
<div>
<span class="text-scuderia-secondary/50 block">Output</span>
<span class="text-scuderia-on-surface font-semibold">518 BHP</span>
</div>
<div>
<span class="text-scuderia-secondary/50 block">0–100 km/h</span>
<span class="text-scuderia-on-surface font-semibold">3.0s</span>
</div>
<div>
<span class="text-scuderia-secondary/50 block">Gearbox</span>
<span class="text-scuderia-on-surface font-semibold">7-Spd PDK</span>
</div>
</div>
</div>
</div>
<div class="px-6 pb-6 pt-2 flex items-center justify-between gap-3">
<div>
<span class="font-scuderia-label-sm text-scuderia-label-sm uppercase text-scuderia-secondary/60 block">Acquisition</span>
<span class="font-scuderia-headline-sm text-scuderia-headline-sm text-scuderia-on-surface tabular-nums font-bold">$389,000</span>
</div>
<div class="flex items-center gap-2">
<a class="p-2.5 rounded-scuderia bg-scuderia-surface-container-high hover:bg-scuderia-surface-container-highest text-scuderia-on-surface hover:text-primary transition-colors" href="#vip-reservation" title="Inspect Telemetry">
<span class="material-symbols-outlined text-[18px]">visibility</span>
</a>
<a class="flex items-center gap-1.5 px-3.5 py-2.5 rounded-scuderia bg-scuderia-primary-container text-scuderia-on-primary-container font-scuderia-label-sm text-scuderia-label-sm uppercase tracking-wider hover:brightness-110 shadow-[0_0_12px_rgba(196,30,58,0.3)] transition-all" href="https://wa.me/">
<span class="material-symbols-outlined text-[16px]">chat</span>
<span>WhatsApp</span>
</a>
</div>
</div>
</div>
<!-- Card 3: Aston Martin DBS 770 Ultimate -->
<div class="group rounded-scuderia-xl overflow-hidden bg-scuderia-surface-container flex flex-col justify-between transition-all duration-300 hover:shadow-2xl hover:shadow-primary-container/10">
<div>
<div class="relative w-full aspect-[16/10] overflow-hidden bg-scuderia-surface-container-highest">
<div class="w-full h-full bg-cover bg-center group-hover:scale-105 transition-transform duration-500" data-alt="2022 Aston Martin DBS 770 Ultimate Coupe in Apex Crimson metallic with dark forged alloy wheels parked inside a luxury private gallery." style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuCz1rfoUanVc6k0PNQVRLi5fryYIF6haKzQe0gmvl26cXz7xyAsg2MKecNWGI8xNICMjnLOPxO3NbYAVmacflQlqYMn56oRuy-QU0wM4eHQ5R3P0D4iRZmEpo8mIbDSsXEHQT07_4dRiH5WI7PQinEF8mD20IrxQYcWBSf6n7iX7MQsBKH9hj9JIVsXvFMrIuwDnc3qDFbY9B_UzSxBIVqtNFMks5O31PmWu4791fu4DW_2IjeT_BWY5A')">
</div>
<div class="absolute top-3 left-3 flex gap-2">
<span class="px-2.5 py-1 rounded-scuderia bg-scuderia-surface-container-lowest/80 backdrop-blur-md font-scuderia-label-sm text-scuderia-label-sm uppercase tracking-wider text-scuderia-primary-container font-semibold">Q Bespoke</span>
<span class="px-2.5 py-1 rounded-scuderia bg-scuderia-surface-container-lowest/80 backdrop-blur-md font-scuderia-label-sm text-scuderia-label-sm uppercase tracking-wider text-scuderia-on-surface">2022</span>
</div>
<div class="absolute top-3 right-3 px-2 py-0.5 rounded-scuderia bg-scuderia-surface-container-highest text-scuderia-secondary font-scuderia-label-sm text-scuderia-label-sm uppercase tracking-wider">
                2,400 mi
              </div>
</div>
<div class="p-6">
<div class="flex items-center justify-between gap-2 mb-1">
<span class="font-scuderia-label-sm text-scuderia-label-sm uppercase tracking-wider text-scuderia-secondary">Aston Martin • Gaydon</span>
<span class="font-scuderia-label-sm text-scuderia-label-sm uppercase text-scuderia-secondary/60">Final V12 Series</span>
</div>
<h3 class="font-scuderia-title-lg text-scuderia-title-lg text-scuderia-on-surface uppercase font-bold group-hover:text-primary transition-colors">DBS 770 Ultimate</h3>
<p class="font-scuderia-body-sm text-scuderia-body-sm text-scuderia-secondary/80 mt-1 mb-4">Apex Crimson over Obsidian Black &amp; Spicy Red Quilting</p>
<div class="grid grid-cols-3 gap-2 py-3 bg-scuderia-surface-container-high/60 rounded-scuderia px-3 font-scuderia-label-sm text-scuderia-label-sm uppercase">
<div>
<span class="text-scuderia-secondary/50 block">Output</span>
<span class="text-scuderia-on-surface font-semibold">759 BHP</span>
</div>
<div>
<span class="text-scuderia-secondary/50 block">0–100 km/h</span>
<span class="text-scuderia-on-surface font-semibold">3.2s</span>
</div>
<div>
<span class="text-scuderia-secondary/50 block">Gearbox</span>
<span class="text-scuderia-on-surface font-semibold">8-Spd ZF Sport</span>
</div>
</div>
</div>
</div>
<div class="px-6 pb-6 pt-2 flex items-center justify-between gap-3">
<div>
<span class="font-scuderia-label-sm text-scuderia-label-sm uppercase text-scuderia-secondary/60 block">Acquisition</span>
<span class="font-scuderia-headline-sm text-scuderia-headline-sm text-scuderia-on-surface tabular-nums font-bold">$415,000</span>
</div>
<div class="flex items-center gap-2">
<a class="p-2.5 rounded-scuderia bg-scuderia-surface-container-high hover:bg-scuderia-surface-container-highest text-scuderia-on-surface hover:text-primary transition-colors" href="#vip-reservation" title="Inspect Telemetry">
<span class="material-symbols-outlined text-[18px]">visibility</span>
</a>
<a class="flex items-center gap-1.5 px-3.5 py-2.5 rounded-scuderia bg-scuderia-primary-container text-scuderia-on-primary-container font-scuderia-label-sm text-scuderia-label-sm uppercase tracking-wider hover:brightness-110 shadow-[0_0_12px_rgba(196,30,58,0.3)] transition-all" href="https://wa.me/">
<span class="material-symbols-outlined text-[16px]">chat</span>
<span>WhatsApp</span>
</a>
</div>
</div>
</div>
<!-- Card 4: 1971 Lamborghini Miura SV -->
<div class="group rounded-scuderia-xl overflow-hidden bg-scuderia-surface-container flex flex-col justify-between transition-all duration-300 hover:shadow-2xl hover:shadow-primary-container/10">
<div>
<div class="relative w-full aspect-[16/10] overflow-hidden bg-scuderia-surface-container-highest">
<div class="w-full h-full bg-cover bg-center group-hover:scale-105 transition-transform duration-500" data-alt="1971 Lamborghini Miura SV in original Rosso Corsa with gold magnesium alloy wheels and iconic Bertone curves under dramatic architectural lighting." style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBH_ONlhb_yPV2bo7mBE_ixUJNYX6H8dlljB2R_FJwld4Z3kfE9HZ6_socDmGLU9CtMVOkx8L6DLGSxZxcxxxK0qZdhwEFsF_0o_jLzZMEXNQrB2P5RasVLMwByRU1jM8QobiRZWAsgqxd5nrn6X1JqYj2JS-LYJNK_soFwWwXo-hEt7vP4Cc9y3MuEpj_HSnyyVpqFFDXR8BTawBrVOYaHd3EgwBbpmHH9gXIWwejD2KG-2RsRSejyQA')">
</div>
<div class="absolute top-3 left-3 flex gap-2">
<span class="px-2.5 py-1 rounded-scuderia bg-scuderia-surface-container-lowest/80 backdrop-blur-md font-scuderia-label-sm text-scuderia-label-sm uppercase tracking-wider text-scuderia-primary-container font-semibold">Polo Storico</span>
<span class="px-2.5 py-1 rounded-scuderia bg-scuderia-surface-container-lowest/80 backdrop-blur-md font-scuderia-label-sm text-scuderia-label-sm uppercase tracking-wider text-scuderia-on-surface">1971</span>
</div>
<div class="absolute top-3 right-3 px-2 py-0.5 rounded-scuderia bg-scuderia-surface-container-highest text-scuderia-secondary font-scuderia-label-sm text-scuderia-label-sm uppercase tracking-wider">
                18,200 mi
              </div>
</div>
<div class="p-6">
<div class="flex items-center justify-between gap-2 mb-1">
<span class="font-scuderia-label-sm text-scuderia-label-sm uppercase tracking-wider text-scuderia-secondary">Lamborghini • Sant'Agata</span>
<span class="font-scuderia-label-sm text-scuderia-label-sm uppercase text-scuderia-secondary/60">Matching Numbers</span>
</div>
<h3 class="font-scuderia-title-lg text-scuderia-title-lg text-scuderia-on-surface uppercase font-bold group-hover:text-primary transition-colors">Miura P400 SV</h3>
<p class="font-scuderia-body-sm text-scuderia-body-sm text-scuderia-secondary/80 mt-1 mb-4">Rosso Corsa over Senape Leather • Split Sump Factory Spec</p>
<div class="grid grid-cols-3 gap-2 py-3 bg-scuderia-surface-container-high/60 rounded-scuderia px-3 font-scuderia-label-sm text-scuderia-label-sm uppercase">
<div>
<span class="text-scuderia-secondary/50 block">Output</span>
<span class="text-scuderia-on-surface font-semibold">380 BHP</span>
</div>
<div>
<span class="text-scuderia-secondary/50 block">Engine</span>
<span class="text-scuderia-on-surface font-semibold">3.9L Quad V12</span>
</div>
<div>
<span class="text-scuderia-secondary/50 block">Gearbox</span>
<span class="text-scuderia-on-surface font-semibold">5-Speed Manual</span>
</div>
</div>
</div>
</div>
<div class="px-6 pb-6 pt-2 flex items-center justify-between gap-3">
<div>
<span class="font-scuderia-label-sm text-scuderia-label-sm uppercase text-scuderia-secondary/60 block">Acquisition</span>
<span class="font-scuderia-headline-sm text-scuderia-headline-sm text-scuderia-on-surface tabular-nums font-bold">$2,850,000</span>
</div>
<div class="flex items-center gap-2">
<a class="p-2.5 rounded-scuderia bg-scuderia-surface-container-high hover:bg-scuderia-surface-container-highest text-scuderia-on-surface hover:text-primary transition-colors" href="#vip-reservation" title="Inspect Telemetry">
<span class="material-symbols-outlined text-[18px]">visibility</span>
</a>
<a class="flex items-center gap-1.5 px-3.5 py-2.5 rounded-scuderia bg-scuderia-primary-container text-scuderia-on-primary-container font-scuderia-label-sm text-scuderia-label-sm uppercase tracking-wider hover:brightness-110 shadow-[0_0_12px_rgba(196,30,58,0.3)] transition-all" href="https://wa.me/">
<span class="material-symbols-outlined text-[16px]">chat</span>
<span>WhatsApp</span>
</a>
</div>
</div>
</div>
<!-- Card 5: 2023 Bentley Continental GT Mulliner -->
<div class="group rounded-scuderia-xl overflow-hidden bg-scuderia-surface-container flex flex-col justify-between transition-all duration-300 hover:shadow-2xl hover:shadow-primary-container/10">
<div>
<div class="relative w-full aspect-[16/10] overflow-hidden bg-scuderia-surface-container-highest">
<div class="w-full h-full bg-cover bg-center group-hover:scale-105 transition-transform duration-500" data-alt="2023 Bentley Continental GT Mulliner in deep metallic Anthracite with diamond-in-diamond quilted interior visible through tinted glass in an executive atelier." style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuAxU4QZnmbcXDRuTIbcSOafV83YaMZ2hi6RWuEelH1Xl0g86AoK_P9oidOoJg2SeptM5V3DVRzaBOfXu8zQetAHulzOz4EsKO0kXv24TFynCCkZghfK_WdEamTnBMImYe6-ijZ1z7_e5HN99c8wAS9LDxf5a3SSVfs44Fu5e6AeU1kDIIqkWRLNjk2wAKzClhzjjcKr9y9aDs5vTuJQwzHeJ4gyeiaMmCKpuXF_6dgGxZot5pPk-h7Syg')">
</div>
<div class="absolute top-3 left-3 flex gap-2">
<span class="px-2.5 py-1 rounded-scuderia bg-scuderia-surface-container-lowest/80 backdrop-blur-md font-scuderia-label-sm text-scuderia-label-sm uppercase tracking-wider text-scuderia-primary-container font-semibold">Mulliner Coach</span>
<span class="px-2.5 py-1 rounded-scuderia bg-scuderia-surface-container-lowest/80 backdrop-blur-md font-scuderia-label-sm text-scuderia-label-sm uppercase tracking-wider text-scuderia-on-surface">2023</span>
</div>
<div class="absolute top-3 right-3 px-2 py-0.5 rounded-scuderia bg-scuderia-surface-container-highest text-scuderia-secondary font-scuderia-label-sm text-scuderia-label-sm uppercase tracking-wider">
                1,600 mi
              </div>
</div>
<div class="p-6">
<div class="flex items-center justify-between gap-2 mb-1">
<span class="font-scuderia-label-sm text-scuderia-label-sm uppercase tracking-wider text-scuderia-secondary">Bentley • Crewe</span>
<span class="font-scuderia-label-sm text-scuderia-label-sm uppercase text-scuderia-secondary/60">W12 Final Edition</span>
</div>
<h3 class="font-scuderia-title-lg text-scuderia-title-lg text-scuderia-on-surface uppercase font-bold group-hover:text-primary transition-colors">Continental GT Mulliner</h3>
<p class="font-scuderia-body-sm text-scuderia-body-sm text-scuderia-secondary/80 mt-1 mb-4">Anthracite Crystal over Hotspur &amp; Beluga Hide</p>
<div class="grid grid-cols-3 gap-2 py-3 bg-scuderia-surface-container-high/60 rounded-scuderia px-3 font-scuderia-label-sm text-scuderia-label-sm uppercase">
<div>
<span class="text-scuderia-secondary/50 block">Output</span>
<span class="text-scuderia-on-surface font-semibold">650 BHP</span>
</div>
<div>
<span class="text-scuderia-secondary/50 block">0–100 km/h</span>
<span class="text-scuderia-on-surface font-semibold">3.5s</span>
</div>
<div>
<span class="text-scuderia-secondary/50 block">Gearbox</span>
<span class="text-scuderia-on-surface font-semibold">8-Spd Dual-Clutch</span>
</div>
</div>
</div>
</div>
<div class="px-6 pb-6 pt-2 flex items-center justify-between gap-3">
<div>
<span class="font-scuderia-label-sm text-scuderia-label-sm uppercase text-scuderia-secondary/60 block">Acquisition</span>
<span class="font-scuderia-headline-sm text-scuderia-headline-sm text-scuderia-on-surface tabular-nums font-bold">$312,000</span>
</div>
<div class="flex items-center gap-2">
<a class="p-2.5 rounded-scuderia bg-scuderia-surface-container-high hover:bg-scuderia-surface-container-highest text-scuderia-on-surface hover:text-primary transition-colors" href="#vip-reservation" title="Inspect Telemetry">
<span class="material-symbols-outlined text-[18px]">visibility</span>
</a>
<a class="flex items-center gap-1.5 px-3.5 py-2.5 rounded-scuderia bg-scuderia-primary-container text-scuderia-on-primary-container font-scuderia-label-sm text-scuderia-label-sm uppercase tracking-wider hover:brightness-110 shadow-[0_0_12px_rgba(196,30,58,0.3)] transition-all" href="https://wa.me/">
<span class="material-symbols-outlined text-[16px]">chat</span>
<span>WhatsApp</span>
</a>
</div>
</div>
</div>
<!-- Card 6: 2024 McLaren 750S Spider -->
<div class="group rounded-scuderia-xl overflow-hidden bg-scuderia-surface-container flex flex-col justify-between transition-all duration-300 hover:shadow-2xl hover:shadow-primary-container/10">
<div>
<div class="relative w-full aspect-[16/10] overflow-hidden bg-scuderia-surface-container-highest">
<div class="w-full h-full bg-cover bg-center group-hover:scale-105 transition-transform duration-500" data-alt="2024 McLaren 750S Spider in Volcano Grey pearl with open retractable hardtop and McLaren Orange brake calipers on a dark slate platform." style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuDA-Wxn91tD-LWbG6CgzzaKIGcI4DK5cXcLz7aKjFBaYKUGTnOZA5zeILzv9I4aysYDHn5Vbh0ifLTDfuKH0pYTQHtSuE4ei9CqCVT0zY7MNEz-wwA0tjz9WZtWKaplx78sE0SlpXE5HYYzRBEdo-7_yqmt649vPKCgw5ZZCLiTdIdfMqqctCNxVMPiHuoEuYMUK2SfOJ-BCFN47Ex5isK5dKp1KuubblNOzwo0MCheArvJJBxXurSxUw')">
</div>
<div class="absolute top-3 left-3 flex gap-2">
<span class="px-2.5 py-1 rounded-scuderia bg-scuderia-surface-container-lowest/80 backdrop-blur-md font-scuderia-label-sm text-scuderia-label-sm uppercase tracking-wider text-scuderia-primary-container font-semibold">MSO Defined</span>
<span class="px-2.5 py-1 rounded-scuderia bg-scuderia-surface-container-lowest/80 backdrop-blur-md font-scuderia-label-sm text-scuderia-label-sm uppercase tracking-wider text-scuderia-on-surface">2024</span>
</div>
<div class="absolute top-3 right-3 px-2 py-0.5 rounded-scuderia bg-scuderia-surface-container-highest text-scuderia-secondary font-scuderia-label-sm text-scuderia-label-sm uppercase tracking-wider">
                620 mi
              </div>
</div>
<div class="p-6">
<div class="flex items-center justify-between gap-2 mb-1">
<span class="font-scuderia-label-sm text-scuderia-label-sm uppercase tracking-wider text-scuderia-secondary">McLaren • Woking</span>
<span class="font-scuderia-label-sm text-scuderia-label-sm uppercase text-scuderia-secondary/60">PDI Certified</span>
</div>
<h3 class="font-scuderia-title-lg text-scuderia-title-lg text-scuderia-on-surface uppercase font-bold group-hover:text-primary transition-colors">750S Spider</h3>
<p class="font-scuderia-body-sm text-scuderia-body-sm text-scuderia-secondary/80 mt-1 mb-4">Volcano Grey over Carbon Black Alcantara &amp; Apex Red Stitch</p>
<div class="grid grid-cols-3 gap-2 py-3 bg-scuderia-surface-container-high/60 rounded-scuderia px-3 font-scuderia-label-sm text-scuderia-label-sm uppercase">
<div>
<span class="text-scuderia-secondary/50 block">Output</span>
<span class="text-scuderia-on-surface font-semibold">740 BHP</span>
</div>
<div>
<span class="text-scuderia-secondary/50 block">0–100 km/h</span>
<span class="text-scuderia-on-surface font-semibold">2.7s</span>
</div>
<div>
<span class="text-scuderia-secondary/50 block">Gearbox</span>
<span class="text-scuderia-on-surface font-semibold">7-Spd SSG</span>
</div>
</div>
</div>
</div>
<div class="px-6 pb-6 pt-2 flex items-center justify-between gap-3">
<div>
<span class="font-scuderia-label-sm text-scuderia-label-sm uppercase text-scuderia-secondary/60 block">Acquisition</span>
<span class="font-scuderia-headline-sm text-scuderia-headline-sm text-scuderia-on-surface tabular-nums font-bold">$375,000</span>
</div>
<div class="flex items-center gap-2">
<a class="p-2.5 rounded-scuderia bg-scuderia-surface-container-high hover:bg-scuderia-surface-container-highest text-scuderia-on-surface hover:text-primary transition-colors" href="#vip-reservation" title="Inspect Telemetry">
<span class="material-symbols-outlined text-[18px]">visibility</span>
</a>
<a class="flex items-center gap-1.5 px-3.5 py-2.5 rounded-scuderia bg-scuderia-primary-container text-scuderia-on-primary-container font-scuderia-label-sm text-scuderia-label-sm uppercase tracking-wider hover:brightness-110 shadow-[0_0_12px_rgba(196,30,58,0.3)] transition-all" href="https://wa.me/">
<span class="material-symbols-outlined text-[16px]">chat</span>
<span>WhatsApp</span>
</a>
</div>
</div>
</div>
</div>
<!-- Vault Inquiry Strip -->
<div class="mt-12 p-8 rounded-scuderia-xl bg-gradient-to-r from-scuderia-surface-container-high via-scuderia-surface-container to-scuderia-surface-container-high flex flex-col md:flex-row items-center justify-between gap-6">
<div class="space-y-1">
<span class="font-scuderia-label-sm text-scuderia-label-sm uppercase tracking-widest text-scuderia-primary-container">Off-Market Private Treaty</span>
<h4 class="font-scuderia-headline-sm text-scuderia-headline-sm text-scuderia-on-surface uppercase">Seeking an unlisted allocation or bespoke homologation special?</h4>
<p class="font-scuderia-body-sm text-scuderia-body-sm text-scuderia-secondary">Our acquisitions desk accesses over 140 off-market collections across Geneva, Tokyo, and Monterey.</p>
</div>
<a class="px-7 py-3.5 rounded-scuderia bg-scuderia-on-surface text-scuderia-surface font-scuderia-label-md text-scuderia-label-md uppercase tracking-widest hover:bg-scuderia-primary-container hover:text-scuderia-on-primary-container transition-all whitespace-nowrap" href="#vip-reservation">
          Open Private Inquiry
        </a>
</div>
</div>
</section>
<!-- SECTION 3: INTEGRATED CAR DETAIL SPOTLIGHT / DOSSIER -->
<section class="w-full bg-scuderia-surface-container-lowest py-20 relative" id="sf90-spotlight">
<div class="max-w-[1720px] mx-auto px-scuderia-margin md:px-scuderia-margin-tablet lg:px-scuderia-margin-desktop">
<!-- Section Tagline -->
<div class="flex items-center gap-3 mb-4">
<span class="px-2.5 py-1 rounded-scuderia bg-scuderia-primary-container/20 text-scuderia-primary-container font-scuderia-label-sm text-scuderia-label-sm uppercase tracking-widest">Engineering Spotlight</span>
<span class="text-scuderia-secondary/40 font-scuderia-label-sm text-scuderia-label-sm">•</span>
<span class="text-scuderia-secondary font-scuderia-label-sm text-scuderia-label-sm uppercase tracking-wider">Chassis Verification Nº ZFF92NHE8P0288412</span>
</div>
<div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start">
<!-- Left 7 Cols: High-Res Angles & Interactive Hotspots -->
<div class="lg:col-span-7 space-y-4">
<div class="relative w-full aspect-[16/10] rounded-scuderia-xl overflow-hidden bg-scuderia-surface-container shadow-2xl">
<div class="w-full h-full bg-cover bg-center transition-all duration-500" data-alt="Detailed macro studio angle of the 2024 Ferrari SF90 XX Stradale showing the fixed high-downforce rear wing, carbon ceramic braking rotors, and sculpted Rosso Rubino body lines under low-key museum lighting." id="spotlight-main-img" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuB8cPb0hTb6U2FVYsImHITLTSlvyuhylJNCmuV72_xdhiFYz4TENeMolNaXfzwjUGebuxAoXL5QotWNmvfofbuFEfcHAP_ugQhKB6tmqfsRAqDZCirDZF7aX3WnLwqhSSxrgjgZLWdXKZlcrsNBxgEpv4LOBa95IQB9aV0m0ngRmfxVQ51QdjiJduvBKQnW33xuFeC7wZq-awwCTQx_KauBHlMQV6pTMNawe4cIYQzgBx46fbrq2ntg3A')">
</div>
<!-- Hotspot 1: Active Aero Wing -->
<div class="absolute top-[28%] right-[22%] group cursor-pointer">
<div class="w-4 h-4 rounded-scuderia-full bg-scuderia-primary-container flex items-center justify-center animate-ping"></div>
<div class="w-3 h-3 -mt-3.5 ml-0.5 rounded-scuderia-full bg-scuderia-on-surface shadow-lg"></div>
<div class="absolute right-6 top-0 w-56 p-3 rounded-scuderia-lg bg-scuderia-surface-container-lowest/90 backdrop-blur-xl opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none shadow-2xl z-20">
<span class="font-scuderia-label-sm text-scuderia-label-sm uppercase text-scuderia-primary-container block">Fixed Dual-Post Wing</span>
<span class="font-scuderia-body-sm text-scuderia-body-sm text-scuderia-on-surface">530 kg of downforce @ 250 km/h with active patented shut-off Gurney flap.</span>
</div>
</div>
<!-- Hotspot 2: Hybrid Tri-Motor Hub -->
<div class="absolute bottom-[35%] left-[30%] group cursor-pointer">
<div class="w-4 h-4 rounded-scuderia-full bg-scuderia-primary-container flex items-center justify-center animate-ping"></div>
<div class="w-3 h-3 -mt-3.5 ml-0.5 rounded-scuderia-full bg-scuderia-on-surface shadow-lg"></div>
<div class="absolute left-6 bottom-0 w-60 p-3 rounded-scuderia-lg bg-scuderia-surface-container-lowest/90 backdrop-blur-xl opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none shadow-2xl z-20">
<span class="font-scuderia-label-sm text-scuderia-label-sm uppercase text-scuderia-primary-container block">RAC-e Torque Vectoring</span>
<span class="font-scuderia-body-sm text-scuderia-body-sm text-scuderia-on-surface">Twin independent front axle electric motors + 1 rear MGU-K Formula 1 derivation.</span>
</div>
</div>
<div class="absolute bottom-4 left-4 px-3 py-1.5 rounded-scuderia bg-scuderia-surface-container-lowest/80 backdrop-blur-md font-scuderia-label-sm text-scuderia-label-sm uppercase tracking-wider text-scuderia-secondary">
              Hover hotspots for telemetry breakdown
            </div>
</div>
<!-- Multi-angle thumbnails -->
<div class="grid grid-cols-4 gap-3">
<button class="aspect-[16/10] rounded-scuderia-lg overflow-hidden bg-scuderia-surface-container p-0.5 relative group" onclick="changeSpotlightAngle(0)">
<div class="w-full h-full bg-cover bg-center rounded-scuderia" data-alt="Ferrari SF90 XX front fascia with carbon aero hood ducts in Rosso Rubino." style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuCx331FqVU_kWtfW3PQjd3000kWZXBanwuwRhBvuilJ5tffiL9waXU5868gX5In0Vw3TOAI9LibYn6tWah3GWHCx0Od2lsJEF9iyzlVJidKRiAJqeE7OTtXe3_yt1EXk93baleoW0kChs8-2tQcZujj-Ma1MZZQWVVAsPFQuPn79hu3LLV4MR1PyGJ5OeCSHQ2EfaWHj-XVjVK4MtuWM91lbepFmikpNUnr8RlLxPR--9MyZ4uyu2XOnQ')"></div>
<span class="absolute bottom-1.5 left-2 font-scuderia-label-sm text-[10px] uppercase text-scuderia-on-surface bg-scuderia-surface-container-lowest/80 px-1 rounded-scuderia">Front Aero</span>
</button>
<button class="aspect-[16/10] rounded-scuderia-lg overflow-hidden bg-scuderia-surface-container p-0.5 relative group" onclick="changeSpotlightAngle(1)">
<div class="w-full h-full bg-cover bg-center rounded-scuderia" data-alt="Cockpit view of SF90 XX Stradale featuring dry carbon racing buckets and yellow rev counter." style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBO7YJ_J9m2_nLLhbT6Ip3iAP_F1tdZx9SUDzt7nFPGeOFqMUF0FadPmF_gHbmJJFK4M6819kzjMYXYKlVr4F4-RSf4Aoe498XftQrkl97ZQ9ofhEtzrwgQCz_1bvzGYxruxpQKgvf8VXRStoSHKM3EUQOMVxUXVcdVuGYYMjunTPqEpwIfBuTapD2l98JT9c3cYmLRkGaE_H5zl5ZW7VG9kjgtf0pS1PE0i5ivoogg7Ba-mTaG7OfWsw')"></div>
<span class="absolute bottom-1.5 left-2 font-scuderia-label-sm text-[10px] uppercase text-scuderia-on-surface bg-scuderia-surface-container-lowest/80 px-1 rounded-scuderia">Cockpit</span>
</button>
<button class="aspect-[16/10] rounded-scuderia-lg overflow-hidden bg-scuderia-surface-container p-0.5 relative group" onclick="changeSpotlightAngle(2)">
<div class="w-full h-full bg-cover bg-center rounded-scuderia" data-alt="Rear 3/4 detail showing full-width light bar and twin high-exit titanium exhaust pipes." style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBwNyXUi0rDPbNVFTlX095rJWDr3A3NuP41-BWtaL0mVgO6dAESqgJJLv44indRR6Ov_q4_wTPUfES4xOYERa9I4a2tLWabf8hNFihBZKTsOJIh858_F7O8rJzSjEJ0cSsg73zp84qEus2fd2eJBGgZNhq_AH2c_cZerOv8fCyLUl18EgBqiePYejxkQ6XU06zOZZfEc1VIGrX383if39cj_bjQsYpjuA-kGKBgo1rSAQvblLOAsiSy4w')"></div>
<span class="absolute bottom-1.5 left-2 font-scuderia-label-sm text-[10px] uppercase text-scuderia-on-surface bg-scuderia-surface-container-lowest/80 px-1 rounded-scuderia">Rear Diffuser</span>
</button>
<button class="aspect-[16/10] rounded-scuderia-lg overflow-hidden bg-scuderia-surface-container p-0.5 relative group" onclick="changeSpotlightAngle(3)">
<div class="w-full h-full bg-cover bg-center rounded-scuderia" data-alt="Carbon ceramic braking system with red calliper and centerlock forged lightweight wheel." style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuCuMml2d9ZnbAY5vr_3_QYQVRAfei90haUWZ-Y3WtA_pu4TaYWn4E0lNWOQRk6l2Z0zLTFm-0rfecP2zBMS-nFSsj-XywZrjf854BNgADe-E8IWcFFEfOBVK84lNWKc5cd4VqqqvbobtJ-WMrQifhFRVbMYHNLtnLYsiVloX8srBo4OyYfsGmrAu4lOKxEqut1pZN5KwGPCwVh4to0RFEeQTXBs9Z-0tKvtC8nL90dKkConrg09PKtUOw')"></div>
<span class="absolute bottom-1.5 left-2 font-scuderia-label-sm text-[10px] uppercase text-scuderia-on-surface bg-scuderia-surface-container-lowest/80 px-1 rounded-scuderia">CCM-R Brakes</span>
</button>
</div>
</div>
<!-- Right 5 Cols: Technical Specifications Table & Escrow CTAs -->
<div class="lg:col-span-5 space-y-6">
<div>
<span class="font-scuderia-label-sm text-scuderia-label-sm uppercase tracking-widest text-scuderia-primary-container block mb-1">Dossier Breakdown</span>
<h3 class="font-scuderia-headline-md text-scuderia-headline-md text-scuderia-on-surface uppercase tracking-tight">2024 SF90 XX Stradale Spec</h3>
<p class="font-scuderia-body-md text-scuderia-body-md text-scuderia-secondary/80 mt-1">Homologated track prowess with full road registration authority. 1 of 799 examples globally.</p>
</div>
<!-- Spec Table -->
<div class="rounded-scuderia-xl bg-scuderia-surface-container overflow-hidden">
<div class="p-4 bg-scuderia-surface-container-high/60 flex items-center justify-between font-scuderia-label-sm text-scuderia-label-sm uppercase tracking-wider text-scuderia-secondary">
<span>Metric Parameter</span>
<span>Factory Telemetry</span>
</div>
<div class="divide-y divide-white/5 font-scuderia-body-sm text-scuderia-body-sm">
<div class="p-3.5 flex items-center justify-between">
<span class="text-scuderia-secondary">Combined Peak Output</span>
<span class="font-scuderia-label-md text-scuderia-label-md text-scuderia-on-surface uppercase font-semibold">1,016 BHP @ 7,900 RPM</span>
</div>
<div class="p-3.5 flex items-center justify-between bg-white/[0.01]">
<span class="text-scuderia-secondary">Internal Combustion Unit</span>
<span class="font-scuderia-label-md text-scuderia-label-md text-scuderia-on-surface uppercase">4.0L Twin-Turbo 90° V8 (F154FB)</span>
</div>
<div class="p-3.5 flex items-center justify-between">
<span class="text-scuderia-secondary">Electric Motor Array</span>
<span class="font-scuderia-label-md text-scuderia-label-md text-scuderia-on-surface uppercase">3x Permanent Magnet (233 BHP)</span>
</div>
<div class="p-3.5 flex items-center justify-between bg-white/[0.01]">
<span class="text-scuderia-secondary">Transmission</span>
<span class="font-scuderia-label-md text-scuderia-label-md text-scuderia-on-surface uppercase">8-Speed F1 Dual-Clutch</span>
</div>
<div class="p-3.5 flex items-center justify-between">
<span class="text-scuderia-secondary">0–100 km/h / 0–200 km/h</span>
<span class="font-scuderia-label-md text-scuderia-label-md text-scuderia-primary-container font-semibold uppercase">2.3s / 6.5s</span>
</div>
<div class="p-3.5 flex items-center justify-between bg-white/[0.01]">
<span class="text-scuderia-secondary">Maximum Velocity</span>
<span class="font-scuderia-label-md text-scuderia-label-md text-scuderia-on-surface uppercase">320 km/h (199 mph)</span>
</div>
<div class="p-3.5 flex items-center justify-between">
<span class="text-scuderia-secondary">Dry Weight / Downforce</span>
<span class="font-scuderia-label-md text-scuderia-label-md text-scuderia-on-surface uppercase">1,560 kg / 530 kg @ 250 km/h</span>
</div>
<div class="p-3.5 flex items-center justify-between bg-white/[0.01]">
<span class="text-scuderia-secondary">Warranty &amp; Service</span>
<span class="font-scuderia-label-md text-scuderia-label-md text-emerald-400 uppercase">Ferrari Genuine Maintenance to 2031</span>
</div>
</div>
</div>
<!-- Escrow & Reserve Actions -->
<div class="space-y-3 pt-2">
<button class="w-full py-4 rounded-scuderia bg-scuderia-primary-container text-scuderia-on-primary-container font-scuderia-label-md text-scuderia-label-md uppercase tracking-widest hover:brightness-110 shadow-[0_0_24px_rgba(196,30,58,0.4)] flex items-center justify-center gap-2 transition-all" onclick="handleEscrowReserve()">
<span class="material-symbols-outlined text-[18px]">lock</span>
<span>Reserve with $10,000 Escrow Deposit</span>
</button>
<div class="grid grid-cols-2 gap-3">
<button class="py-3 px-4 rounded-scuderia bg-scuderia-surface-container-high hover:bg-scuderia-surface-container-highest text-scuderia-on-surface font-scuderia-label-sm text-scuderia-label-sm uppercase tracking-wider flex items-center justify-center gap-1.5 transition-colors">
<span class="material-symbols-outlined text-[16px] text-scuderia-primary-container">videocam</span>
<span>Request 4K Video</span>
</button>
<button class="py-3 px-4 rounded-scuderia bg-scuderia-surface-container-high hover:bg-scuderia-surface-container-highest text-scuderia-on-surface font-scuderia-label-sm text-scuderia-label-sm uppercase tracking-wider flex items-center justify-center gap-1.5 transition-colors">
<span class="material-symbols-outlined text-[16px] text-scuderia-primary-container">description</span>
<span>Download PDF Dossier</span>
</button>
</div>
<p class="font-scuderia-label-sm text-scuderia-label-sm text-center text-scuderia-secondary/50 pt-1">
              Escrow handled via J.P. Morgan Private Bank Custody. 100% refundable within 72 hours.
            </p>
</div>
</div>
</div>
</div>
</section>
<!-- SECTION 4: VEHICLE CATEGORIES & CURATED HERITAGE ATELIER -->
<section class="w-full bg-scuderia-surface py-20">
<div class="max-w-[1720px] mx-auto px-scuderia-margin md:px-scuderia-margin-tablet lg:px-scuderia-margin-desktop">
<!-- Headline Row -->
<div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12">
<div>
<span class="font-scuderia-label-sm text-scuderia-label-sm uppercase tracking-[0.25em] text-scuderia-primary-container block mb-2">Curated Divisions</span>
<h2 class="font-scuderia-headline-lg text-scuderia-headline-lg text-scuderia-on-surface uppercase tracking-tight">Atelier Portfolios</h2>
</div>
<p class="font-scuderia-body-md text-scuderia-body-md text-scuderia-secondary/80 max-w-md">
          Every vehicle entered into the Apex registry is categorized across four distinct philosophical quadrants of performance and provenance.
        </p>
</div>
<!-- 4 Category Cards Mosaic -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-16">
<!-- Category 1 -->
<div class="group relative rounded-scuderia-xl overflow-hidden bg-scuderia-surface-container aspect-[3/4] flex flex-col justify-end p-6">
<div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-105" data-alt="Exotic and track hypercars lined up in a darkened minimalist carbon hangar with directional floor lighting." style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuD4ZkM8c7AKcpNTU9Q_PnPDJul7MJLQs9X940U2HZ8BMJ1M6VLgN29-6uJ-Nb7BXjeylZYkU2XHLdt2oRIZx_x2QNIJTAtW2uOhx3JOWBbJzn9MbgLHQFmsp2TPrevy7HxpqXGfPWtqzZnFfCk2hBB5OaNP73ZALu7NGWo1X8NlvppF1GD_GcfOFOsn7Sjc45B6VC6BzhxxCqXGqxO4w-Kzot_Lj6B-y1qki6QfbWunddWgu1rsH8XidA')">
</div>
<div class="absolute inset-0 bg-gradient-to-t from-scuderia-surface-container-lowest via-scuderia-surface-container-lowest/50 to-transparent"></div>
<div class="relative z-10 space-y-2">
<span class="font-scuderia-label-sm text-scuderia-label-sm uppercase tracking-widest text-scuderia-primary-container">Division 01</span>
<h3 class="font-scuderia-title-lg text-scuderia-title-lg text-scuderia-on-surface uppercase font-bold">Exotic &amp; Track Hypercars</h3>
<p class="font-scuderia-body-sm text-scuderia-body-sm text-scuderia-secondary/80">Homologated series, active aero, carbon monocoque innovations.</p>
<div class="pt-2">
<span class="font-scuderia-label-sm text-scuderia-label-sm uppercase tracking-wider text-scuderia-on-surface flex items-center gap-1 group-hover:text-primary transition-colors">
<span>View 12 Allocations</span>
<span class="material-symbols-outlined text-[14px]">arrow_forward</span>
</span>
</div>
</div>
</div>
<!-- Category 2 -->
<div class="group relative rounded-scuderia-xl overflow-hidden bg-scuderia-surface-container aspect-[3/4] flex flex-col justify-end p-6">
<div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-105" data-alt="Hand-formed vintage Italian sports car aluminum bodywork with master craftsmen examining lines under warm spotlighting." style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuAvkn1jGUd-Yp3-50-4LiV4jzwM9aSBayP7LJ2ibIj-1uTyvINkUP4rYXEIQNAI-cwGECuUHUtsiXgqqeXI3bCDIDMHytE7qwNFlHbSmRP6OgsZhzEHcC4uCTxog6llExTYy0RKKVdBGV0fNAN90KjpF0SoTz2oi5OgCDJ8Dm-pvuxQIeNbw5Dc1-2sGdHFtfVnFW3uODKNmYjZuaM8wbmWmy3xpLaGDkiVBrVX78iS8UfkOzPa-WXZ1w')">
</div>
<div class="absolute inset-0 bg-gradient-to-t from-scuderia-surface-container-lowest via-scuderia-surface-container-lowest/50 to-transparent"></div>
<div class="relative z-10 space-y-2">
<span class="font-scuderia-label-sm text-scuderia-label-sm uppercase tracking-widest text-scuderia-primary-container">Division 02</span>
<h3 class="font-scuderia-title-lg text-scuderia-title-lg text-scuderia-on-surface uppercase font-bold">Coachbuilt Icons</h3>
<p class="font-scuderia-body-sm text-scuderia-body-sm text-scuderia-secondary/80">Hand-formed aluminum, historic preservation, Mille Miglia eligibility.</p>
<div class="pt-2">
<span class="font-scuderia-label-sm text-scuderia-label-sm uppercase tracking-wider text-scuderia-on-surface flex items-center gap-1 group-hover:text-primary transition-colors">
<span>View 6 Historical Works</span>
<span class="material-symbols-outlined text-[14px]">arrow_forward</span>
</span>
</div>
</div>
</div>
<!-- Category 3 -->
<div class="group relative rounded-scuderia-xl overflow-hidden bg-scuderia-surface-container aspect-[3/4] flex flex-col justify-end p-6">
<div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-105" data-alt="Ultra-luxury grand tourer interior with bespoke tailored diamond stitching, milled aluminum dials and panoramic view through the windshield." style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuAU-hpjgmcPcMshL0S736uNrIF-wBy34qj_4y9Zm-0-a2M_R4j1SgKNeOS3am_7S28_ius0D6YOc_pSEgDsEK3D5Ft_ZyHScY7ppr58DUSi4bKPvB5v_K8JNP5LsOVBR5xP1UEmx4QOaKBcXym2AMY4L1JurBnqtohS0xMdxK-LSxeFUpgoL9nKkFTi0UydbTJVYYMTSsS3g7OrtkCLkx9obfpV7YR0UiLnc_ybQlfouQCiZltzb05a7Q')">
</div>
<div class="absolute inset-0 bg-gradient-to-t from-scuderia-surface-container-lowest via-scuderia-surface-container-lowest/50 to-transparent"></div>
<div class="relative z-10 space-y-2">
<span class="font-scuderia-label-sm text-scuderia-label-sm uppercase tracking-widest text-scuderia-primary-container">Division 03</span>
<h3 class="font-scuderia-title-lg text-scuderia-title-lg text-scuderia-on-surface uppercase font-bold">Executive Grand Tourers</h3>
<p class="font-scuderia-body-sm text-scuderia-body-sm text-scuderia-secondary/80">Peerless transcontinental luxury, twin-turbo V12s, bespoke upholstery.</p>
<div class="pt-2">
<span class="font-scuderia-label-sm text-scuderia-label-sm uppercase tracking-wider text-scuderia-on-surface flex items-center gap-1 group-hover:text-primary transition-colors">
<span>View 7 Grand Tourers</span>
<span class="material-symbols-outlined text-[14px]">arrow_forward</span>
</span>
</div>
</div>
</div>
<!-- Category 4 -->
<div class="group relative rounded-scuderia-xl overflow-hidden bg-scuderia-surface-container aspect-[3/4] flex flex-col justify-end p-6">
<div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-105" data-alt="Mysterious darkened private vault with silk vehicle dust covers faintly revealing hypercar silhouette in subtle crimson glow." style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuDk2__TNCwIj6ug2onRDF8DIRVdPuI_GGBJe7X0GTPcS14EfDKhLWLjwp3-sLU5KJqvubL6jVmdbBo-jSg0oe4PYB_pc1uGa8XWleOgL-upy8p4YuGw1BP5IhNZV6R_CGIxQ7vot99nWNOSWuOe1bFgCmYP6klWqoDvyYHc1sBn8lR80yFmK03P3nLmqoFoyEJsz00dVBtD7YMOXHnT9tvBNmx9R1qLb3dBmR5-hR7cuLyYpTrc6P6Odg')">
</div>
<div class="absolute inset-0 bg-gradient-to-t from-scuderia-surface-container-lowest via-scuderia-surface-container-lowest/50 to-transparent"></div>
<div class="relative z-10 space-y-2">
<span class="font-scuderia-label-sm text-scuderia-label-sm uppercase tracking-widest text-scuderia-primary-container">Division 04</span>
<h3 class="font-scuderia-title-lg text-scuderia-title-lg text-scuderia-on-surface uppercase font-bold">Off-Market Consignments</h3>
<p class="font-scuderia-body-sm text-scuderia-body-sm text-scuderia-secondary/80">Discreet private treaty sales shielded by bilateral non-disclosure pacts.</p>
<div class="pt-2">
<span class="font-scuderia-label-sm text-scuderia-label-sm uppercase tracking-wider text-scuderia-on-surface flex items-center gap-1 group-hover:text-primary transition-colors">
<span>Request NDA Dossier</span>
<span class="material-symbols-outlined text-[14px]">arrow_forward</span>
</span>
</div>
</div>
</div>
</div>
<!-- Atelier Facility Sanctuary Highlights -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
<div class="p-6 rounded-scuderia-xl bg-scuderia-surface-container flex flex-col gap-4">
<div class="w-12 h-12 rounded-scuderia-lg bg-scuderia-surface-container-highest flex items-center justify-center text-scuderia-primary-container">
<span class="material-symbols-outlined text-[24px]">thermostat</span>
</div>
<h4 class="font-scuderia-title-lg text-scuderia-title-lg text-scuderia-on-surface uppercase">Climate Vault Sanctuary</h4>
<p class="font-scuderia-body-sm text-scuderia-body-sm text-scuderia-secondary/80">52% relative humidity, de-ionized particulate filtration, and seismic isolated storage bays for long-term chassis preservation.</p>
</div>
<div class="p-6 rounded-scuderia-xl bg-scuderia-surface-container flex flex-col gap-4">
<div class="w-12 h-12 rounded-scuderia-lg bg-scuderia-surface-container-highest flex items-center justify-center text-scuderia-primary-container">
<span class="material-symbols-outlined text-[24px]">biotech</span>
</div>
<h4 class="font-scuderia-title-lg text-scuderia-title-lg text-scuderia-on-surface uppercase">180-Pt Forensic Lab</h4>
<p class="font-scuderia-body-sm text-scuderia-body-sm text-scuderia-secondary/80">Ultrasonic paint depth analysis, carbon fiber weave integrity scanning, and direct factory ECU telemetry decryption.</p>
</div>
<div class="p-6 rounded-scuderia-xl bg-scuderia-surface-container flex flex-col gap-4">
<div class="w-12 h-12 rounded-scuderia-lg bg-scuderia-surface-container-highest flex items-center justify-center text-scuderia-primary-container">
<span class="material-symbols-outlined text-[24px]">key</span>
</div>
<h4 class="font-scuderia-title-lg text-scuderia-title-lg text-scuderia-on-surface uppercase">Private Handover Suite</h4>
<p class="font-scuderia-body-sm text-scuderia-body-sm text-scuderia-secondary/80">Custom unveilings behind acoustic glass salons with personal sommelier service and biometric handover documentation.</p>
</div>
</div>
</div>
</section>
<!-- SECTION 5: BESPOKE FINANCING & LEASE ADVISORY STUDIO -->
<section class="w-full bg-scuderia-surface-container-lowest py-20 relative" id="financing-studio">
<div class="max-w-[1720px] mx-auto px-scuderia-margin md:px-scuderia-margin-tablet lg:px-scuderia-margin-desktop">
<div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
<!-- Left 6 Cols: Interactive Lease Calculator -->
<div class="lg:col-span-6 space-y-6">
<div>
<span class="font-scuderia-label-sm text-scuderia-label-sm uppercase tracking-widest text-scuderia-primary-container block mb-2">Bespoke Capital Solutions</span>
<h2 class="font-scuderia-headline-lg text-scuderia-headline-lg text-scuderia-on-surface uppercase tracking-tight">Structured Acquisition Studio</h2>
<p class="font-scuderia-body-md text-scuderia-body-md text-scuderia-secondary/80 mt-2">
              Apex Treasury coordinates tailored balloon leases, family office facilities, and offshore asset holding structures.
            </p>
</div>
<div class="p-8 rounded-scuderia-xl bg-scuderia-surface-container space-y-6">
<!-- Vehicle Value Slider -->
<div class="space-y-3">
<div class="flex items-center justify-between">
<span class="font-scuderia-label-sm text-scuderia-label-sm uppercase text-scuderia-secondary">Acquisition Vehicle Price</span>
<span class="font-scuderia-headline-sm text-scuderia-headline-sm text-scuderia-on-surface tabular-nums font-bold" id="calc-price-display">$390,000</span>
</div>
<input class="w-full accent-primary-container cursor-pointer" id="calc-price-slider" max="1500000" min="200000" oninput="updateCalculator()" step="10000" type="range" value="390000"/>
<div class="flex justify-between font-scuderia-label-sm text-scuderia-label-sm text-scuderia-secondary/50">
<span>$200,000</span>
<span>$1,500,000+</span>
</div>
</div>
<!-- Down Payment Selector -->
<div class="space-y-3">
<div class="flex items-center justify-between">
<span class="font-scuderia-label-sm text-scuderia-label-sm uppercase text-scuderia-secondary">Down Payment Commitment</span>
<span class="font-scuderia-title-md text-scuderia-title-md text-scuderia-primary-container tabular-nums font-semibold" id="calc-down-display">25% ($97,500)</span>
</div>
<div class="grid grid-cols-4 gap-2">
<button class="down-btn py-2 rounded-scuderia bg-scuderia-surface-container-high hover:bg-scuderia-surface-container-highest font-scuderia-label-sm text-scuderia-label-sm uppercase text-scuderia-secondary" onclick="setDownPayment(15)" type="button">15%</button>
<button class="down-btn active py-2 rounded-scuderia bg-scuderia-primary-container font-scuderia-label-sm text-scuderia-label-sm uppercase text-scuderia-on-primary-container font-semibold" onclick="setDownPayment(25)" type="button">25%</button>
<button class="down-btn py-2 rounded-scuderia bg-scuderia-surface-container-high hover:bg-scuderia-surface-container-highest font-scuderia-label-sm text-scuderia-label-sm uppercase text-scuderia-secondary" onclick="setDownPayment(35)" type="button">35%</button>
<button class="down-btn py-2 rounded-scuderia bg-scuderia-surface-container-high hover:bg-scuderia-surface-container-highest font-scuderia-label-sm text-scuderia-label-sm uppercase text-scuderia-secondary" onclick="setDownPayment(50)" type="button">50%</button>
</div>
</div>
<!-- Tenor Duration -->
<div class="space-y-3">
<span class="font-scuderia-label-sm text-scuderia-label-sm uppercase text-scuderia-secondary block">Amortization Tenor</span>
<div class="grid grid-cols-4 gap-2">
<button class="tenor-btn py-2.5 rounded-scuderia bg-scuderia-surface-container-high hover:bg-scuderia-surface-container-highest font-scuderia-label-sm text-scuderia-label-sm uppercase text-scuderia-secondary" onclick="setTenor(24)" type="button">24 Mo</button>
<button class="tenor-btn py-2.5 rounded-scuderia bg-scuderia-surface-container-high hover:bg-scuderia-surface-container-highest font-scuderia-label-sm text-scuderia-label-sm uppercase text-scuderia-secondary" onclick="setTenor(36)" type="button">36 Mo</button>
<button class="tenor-btn active py-2.5 rounded-scuderia bg-scuderia-primary-container font-scuderia-label-sm text-scuderia-label-sm uppercase text-scuderia-on-primary-container font-semibold" onclick="setTenor(48)" type="button">48 Mo</button>
<button class="tenor-btn py-2.5 rounded-scuderia bg-scuderia-surface-container-high hover:bg-scuderia-surface-container-highest font-scuderia-label-sm text-scuderia-label-sm uppercase text-scuderia-secondary" onclick="setTenor(60)" type="button">60 Mo</button>
</div>
</div>
<!-- Calculated Output Banner -->
<div class="p-6 rounded-scuderia-lg bg-scuderia-surface-container-lowest flex items-center justify-between">
<div>
<span class="font-scuderia-label-sm text-scuderia-label-sm uppercase text-scuderia-secondary/60 block">Estimated Monthly Commitment</span>
<span class="font-scuderia-headline-lg text-scuderia-headline-lg text-scuderia-on-surface tabular-nums font-bold" id="calc-monthly-display">$6,836<span class="font-title-sm text-title-sm text-scuderia-secondary">/mo</span></span>
</div>
<div class="text-right">
<span class="font-scuderia-label-sm text-scuderia-label-sm uppercase text-emerald-400 block">5.4% Fixed APR</span>
<span class="font-scuderia-label-sm text-scuderia-label-sm text-scuderia-secondary/50">Residual Balloon: 40%</span>
</div>
</div>
<!-- Apply CTA -->
<button class="w-full py-4 rounded-scuderia bg-scuderia-primary-container text-scuderia-on-primary-container font-scuderia-label-md text-scuderia-label-md uppercase tracking-widest hover:brightness-110 shadow-[0_0_24px_rgba(196,30,58,0.35)] transition-all">
              Apply for Private Credit Dossier
            </button>
</div>
</div>
<!-- Right 6 Cols: Trade-In Equity Appraisal & Discreet Offset -->
<div class="lg:col-span-6 space-y-6">
<div class="p-8 rounded-scuderia-xl bg-scuderia-surface-container relative overflow-hidden">
<div class="flex items-center gap-3 mb-4">
<div class="w-10 h-10 rounded-scuderia bg-scuderia-surface-container-highest flex items-center justify-center text-scuderia-primary-container">
<span class="material-symbols-outlined text-[20px]">sync_alt</span>
</div>
<div>
<h3 class="font-scuderia-headline-sm text-scuderia-headline-sm text-scuderia-on-surface uppercase">Trade-In Equity Appraisal</h3>
<span class="font-scuderia-label-sm text-scuderia-label-sm uppercase text-scuderia-secondary">Instant valuation against curatorial vault machinery</span>
</div>
</div>
<p class="font-scuderia-body-md text-scuderia-body-md text-scuderia-secondary/80 mb-6">
              Transition smoothly out of existing allocations. Our valuation desk issues guaranteed buyout commitments within 4 hours, mitigating sales tax liabilities across qualifying jurisdictions.
            </p>
<form class="space-y-4" onsubmit="event.preventDefault(); alert('Trade-in dossier received. An acquisitions officer will establish contact.');">
<div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
<input class="w-full bg-scuderia-surface-container-high px-4 py-3 rounded-scuderia font-scuderia-body-sm text-scuderia-body-sm text-scuderia-on-surface placeholder:text-scuderia-secondary/50 focus:outline-none" placeholder="Year / Make / Model" type="text"/>
<input class="w-full bg-scuderia-surface-container-high px-4 py-3 rounded-scuderia font-scuderia-body-sm text-scuderia-body-sm text-scuderia-on-surface placeholder:text-scuderia-secondary/50 focus:outline-none" placeholder="Current Mileage (mi/km)" type="text"/>
</div>
<div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
<input class="w-full bg-scuderia-surface-container-high px-4 py-3 rounded-scuderia font-scuderia-body-sm text-scuderia-body-sm text-scuderia-on-surface placeholder:text-scuderia-secondary/50 focus:outline-none" placeholder="Chassis / VIN (Optional)" type="text"/>
<input class="w-full bg-scuderia-surface-container-high px-4 py-3 rounded-scuderia font-scuderia-body-sm text-scuderia-body-sm text-scuderia-on-surface placeholder:text-scuderia-secondary/50 focus:outline-none" placeholder="WhatsApp / Direct Line" type="tel"/>
</div>
<button class="w-full py-3.5 rounded-scuderia bg-scuderia-surface-container-highest hover:bg-white/15 text-scuderia-on-surface font-scuderia-label-md text-scuderia-label-md uppercase tracking-wider transition-all" type="submit">
                Request Trade-In Offset Dossier
              </button>
</form>
<div class="mt-6 pt-6 border-t border-white/5 flex items-center gap-4 text-scuderia-secondary/70 font-scuderia-body-sm text-scuderia-body-sm">
<span class="material-symbols-outlined text-scuderia-primary-container text-[20px]">shield</span>
<span>All appraisals shielded by strict non-disclosure. No public auctions or registry broadcasts.</span>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- SECTION 6: THE APEX STANDARD (TRUST & QUALITY) -->
<section class="w-full bg-scuderia-surface py-20">
<div class="max-w-[1720px] mx-auto px-scuderia-margin md:px-scuderia-margin-tablet lg:px-scuderia-margin-desktop">
<div class="text-center max-w-3xl mx-auto mb-16 space-y-3">
<span class="font-scuderia-label-sm text-scuderia-label-sm uppercase tracking-[0.25em] text-scuderia-primary-container">Integrity &amp; Stewardship</span>
<h2 class="font-scuderia-headline-lg text-scuderia-headline-lg text-scuderia-on-surface uppercase tracking-tight">The Apex Standard</h2>
<p class="font-scuderia-body-lg text-scuderia-body-lg text-scuderia-secondary/80">
          Four inviolable pillars that define our reputation amongst world-class private automotive collectors and family offices.
        </p>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
<div class="p-8 rounded-scuderia-xl bg-scuderia-surface-container flex flex-col justify-between space-y-6">
<div class="space-y-4">
<span class="font-scuderia-display-hero text-scuderia-headline-lg text-scuderia-primary-container/30 font-bold">01</span>
<h3 class="font-scuderia-headline-sm text-scuderia-headline-sm text-scuderia-on-surface uppercase">180-Point Forensic Check</h3>
<p class="font-scuderia-body-sm text-scuderia-body-sm text-scuderia-secondary/80">Every mechanical, electronic, and structural component is benchmarked to original factory homologation tolerances by factory-certified master technicians.</p>
</div>
<span class="font-scuderia-label-sm text-scuderia-label-sm uppercase tracking-wider text-scuderia-primary-container">Certified Pass Rate &lt; 8%</span>
</div>
<div class="p-8 rounded-scuderia-xl bg-scuderia-surface-container flex flex-col justify-between space-y-6">
<div class="space-y-4">
<span class="font-scuderia-display-hero text-scuderia-headline-lg text-scuderia-primary-container/30 font-bold">02</span>
<h3 class="font-scuderia-headline-sm text-scuderia-headline-sm text-scuderia-on-surface uppercase">Forensic Provenance</h3>
<p class="font-scuderia-body-sm text-scuderia-body-sm text-scuderia-secondary/80">Complete continuous logbook verification, historical MOT/service records, factory build sheets, and cryptographic digital title documentation with zero encumbrances.</p>
</div>
<span class="font-scuderia-label-sm text-scuderia-label-sm uppercase tracking-wider text-scuderia-primary-container">Unbroken Chain of Custody</span>
</div>
<div class="p-8 rounded-scuderia-xl bg-scuderia-surface-container flex flex-col justify-between space-y-6">
<div class="space-y-4">
<span class="font-scuderia-display-hero text-scuderia-headline-lg text-scuderia-primary-container/30 font-bold">03</span>
<h3 class="font-scuderia-headline-sm text-scuderia-headline-sm text-scuderia-on-surface uppercase">Absolute Discretion</h3>
<p class="font-scuderia-body-sm text-scuderia-body-sm text-scuderia-secondary/80">Bespoke escrow protocols with Tier-1 institutional custodians. Bilateral non-disclosure agreements protect every transaction from public registry disclosure.</p>
</div>
<span class="font-scuderia-label-sm text-scuderia-label-sm uppercase tracking-wider text-scuderia-primary-container">Private Escrow Facilities</span>
</div>
<div class="p-8 rounded-scuderia-xl bg-scuderia-surface-container flex flex-col justify-between space-y-6">
<div class="space-y-4">
<span class="font-scuderia-display-hero text-scuderia-headline-lg text-scuderia-primary-container/30 font-bold">04</span>
<h3 class="font-scuderia-headline-sm text-scuderia-headline-sm text-scuderia-on-surface uppercase">Enclosed Worldwide Transit</h3>
<p class="font-scuderia-body-sm text-scuderia-body-sm text-scuderia-secondary/80">Air-ride enclosed transporters and transatlantic cargo charters. Custom international bonded carnets and duty mitigation managed end-to-end.</p>
</div>
<span class="font-scuderia-label-sm text-scuderia-label-sm uppercase tracking-wider text-scuderia-primary-container">White-Glove Vault-to-Vault</span>
</div>
</div>
</div>
</section>
<!-- SECTION 7: TESTIMONIALS OF DISTINCTION & ACCREDITATIONS -->
<section class="w-full bg-scuderia-surface-container-lowest py-20">
<div class="max-w-[1720px] mx-auto px-scuderia-margin md:px-scuderia-margin-tablet lg:px-scuderia-margin-desktop">
<div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12">
<div>
<span class="font-scuderia-label-sm text-scuderia-label-sm uppercase tracking-[0.25em] text-scuderia-primary-container block mb-2">Collector Acclaim</span>
<h2 class="font-scuderia-headline-lg text-scuderia-headline-lg text-scuderia-on-surface uppercase tracking-tight">Testimonials of Distinction</h2>
</div>
<div class="flex items-center gap-1.5 text-scuderia-primary-container">
<span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="font-scuderia-label-md text-scuderia-label-md text-scuderia-on-surface ml-2">5.0 / 5.0 Private Rating</span>
</div>
</div>
<!-- Testimonial Cards -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-16">
<div class="p-8 rounded-scuderia-xl bg-scuderia-surface-container flex flex-col justify-between space-y-6">
<p class="font-scuderia-body-lg text-scuderia-body-lg text-scuderia-on-surface italic leading-relaxed">
            “Acquiring the SF90 XX Stradale allocation through Apex Scuderia felt more like working with an institutional private family office than any dealership. The provenance verification was immaculate.”
          </p>
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-scuderia-full bg-scuderia-surface-container-highest flex items-center justify-center font-scuderia-label-md text-scuderia-label-md text-scuderia-primary-container font-bold">
              HA
            </div>
<div>
<span class="font-scuderia-label-md text-scuderia-label-md text-scuderia-on-surface uppercase block font-semibold">Lord H. Alistair</span>
<span class="font-scuderia-label-sm text-scuderia-label-sm text-scuderia-secondary/70">Mayfair Private Collection • London</span>
</div>
</div>
</div>
<div class="p-8 rounded-scuderia-xl bg-scuderia-surface-container flex flex-col justify-between space-y-6">
<p class="font-scuderia-body-lg text-scuderia-body-lg text-scuderia-on-surface italic leading-relaxed">
            “The trade-in offset of my 991 Speedster against the GT3 RS was completed in under 48 hours without a single leak to the broker circuit. Their enclosed air-freight logistics into Zurich were flawless.”
          </p>
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-scuderia-full bg-scuderia-surface-container-highest flex items-center justify-center font-scuderia-label-md text-scuderia-label-md text-scuderia-primary-container font-bold">
              MZ
            </div>
<div>
<span class="font-scuderia-label-md text-scuderia-label-md text-scuderia-on-surface uppercase block font-semibold">Marcus Zimmermann</span>
<span class="font-scuderia-label-sm text-scuderia-label-sm text-scuderia-secondary/70">Helvetia Motorsport Syndicate • Geneva</span>
</div>
</div>
</div>
<div class="p-8 rounded-scuderia-xl bg-scuderia-surface-container flex flex-col justify-between space-y-6">
<p class="font-scuderia-body-lg text-scuderia-body-lg text-scuderia-on-surface italic leading-relaxed">
            “Their historical dossier on the 1965 Alfa Romeo TZ2 proved decisive at Villa d’Este. Unrivaled curatorial integrity and the gold standard for high-end international automotive consignments.”
          </p>
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-scuderia-full bg-scuderia-surface-container-highest flex items-center justify-center font-scuderia-label-md text-scuderia-label-md text-scuderia-primary-container font-bold">
              ER
            </div>
<div>
<span class="font-scuderia-label-md text-scuderia-label-md text-scuderia-on-surface uppercase block font-semibold">Elena Rossi-Vidal</span>
<span class="font-scuderia-label-sm text-scuderia-label-sm text-scuderia-secondary/70">Scuderia Classica Trustee • Milan</span>
</div>
</div>
</div>
</div>
<!-- Accreditations Logos Strip -->
<div class="pt-8 border-t border-white/5 grid grid-cols-2 md:grid-cols-4 gap-6 items-center text-center">
<div class="p-4 rounded-scuderia bg-scuderia-surface-container/50 font-scuderia-label-md text-scuderia-label-md uppercase tracking-[0.2em] text-scuderia-secondary/70">
          Sotheby's Motorsport Affiliate
        </div>
<div class="p-4 rounded-scuderia bg-scuderia-surface-container/50 font-scuderia-label-md text-scuderia-label-md uppercase tracking-[0.2em] text-scuderia-secondary/70">
          Concours d'Elegance Partner
        </div>
<div class="p-4 rounded-scuderia bg-scuderia-surface-container/50 font-scuderia-label-md text-scuderia-label-md uppercase tracking-[0.2em] text-scuderia-secondary/70">
          Goodwood Revival Accredited
        </div>
<div class="p-4 rounded-scuderia bg-scuderia-surface-container/50 font-scuderia-label-md text-scuderia-label-md uppercase tracking-[0.2em] text-scuderia-secondary/70">
          Villa d'Este Patrons Circle
        </div>
</div>
</div>
</section>
<!-- SECTION 8: LOCATION, HOURS & VIP VIEWING RESERVATION -->
<section class="w-full bg-scuderia-surface py-20" id="vip-reservation">
<div class="max-w-[1720px] mx-auto px-scuderia-margin md:px-scuderia-margin-tablet lg:px-scuderia-margin-desktop">
<div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
<!-- Left 5 Cols: Atelier Salons Info & Map Previews -->
<div class="lg:col-span-5 space-y-8">
<div>
<span class="font-scuderia-label-sm text-scuderia-label-sm uppercase tracking-[0.25em] text-scuderia-primary-container block mb-2">Private Access Salons</span>
<h2 class="font-scuderia-headline-lg text-scuderia-headline-lg text-scuderia-on-surface uppercase tracking-tight">Atelier Enclaves</h2>
<p class="font-scuderia-body-md text-scuderia-body-md text-scuderia-secondary/80 mt-2">
              Viewing appointments operate under private salon protocols. All guests receive complimentary private chauffeur collection and dedicated security detail.
            </p>
</div>
<!-- Beverly Hills Flagship Card -->
<div class="p-6 rounded-scuderia-xl bg-scuderia-surface-container space-y-4">
<div class="flex items-center justify-between">
<span class="font-scuderia-title-lg text-scuderia-title-lg text-scuderia-on-surface uppercase font-bold">Beverly Hills Flagship</span>
<span class="px-2.5 py-1 rounded-scuderia bg-scuderia-primary-container/20 text-scuderia-primary-container font-scuderia-label-sm text-scuderia-label-sm uppercase">Atelier I</span>
</div>
<p class="font-scuderia-body-sm text-scuderia-body-sm text-scuderia-secondary">
              9600 Wilshire Boulevard, Suite 400<br/>
              Beverly Hills, CA 90212, USA
            </p>
<div class="flex items-center justify-between text-scuderia-secondary/70 font-scuderia-label-sm text-scuderia-label-sm uppercase pt-2">
<span>Mon – Sat: 08:30 – 19:30 PST</span>
<span>Subterranean Vault Access</span>
</div>
<div class="w-full h-36 bg-cover bg-center rounded-scuderia-lg" data-location="9600 Wilshire Blvd, Beverly Hills, CA" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuD8AYAD97F7u-yCofrYI8NhdRJ9SrXpcJ0m-6RpWVEpP9-dy-9uCtTZMcjka9aIUonS8EeMAGENyruqVIuOzIwwLMoHrN2FbQ2Kv_zXaCcuAa8XxlFkS_ekFsXJgZ0QbIguFPP6VJIo5L57-TuMbrguk_LyjzCooTyc77o5R-56frwfhhwruc4Ya0rCUyviC4p8hduce9kYDXn93a_Xv5Zkz6PUf-84HNgbJj_w8pGVSb1lP-ScnwUdWg')"></div>
</div>
<!-- London Mayfair Card -->
<div class="p-6 rounded-scuderia-xl bg-scuderia-surface-container space-y-4">
<div class="flex items-center justify-between">
<span class="font-scuderia-title-lg text-scuderia-title-lg text-scuderia-on-surface uppercase font-bold">London Mayfair Enclave</span>
<span class="px-2.5 py-1 rounded-scuderia bg-scuderia-surface-container-highest text-scuderia-secondary font-scuderia-label-sm text-scuderia-label-sm uppercase">Atelier II</span>
</div>
<p class="font-scuderia-body-sm text-scuderia-body-sm text-scuderia-secondary">
              14 Old Bond Street, Mayfair<br/>
              London W1S 4PP, United Kingdom
            </p>
<div class="flex items-center justify-between text-scuderia-secondary/70 font-scuderia-label-sm text-scuderia-label-sm uppercase pt-2">
<span>Mon – Sat: 09:00 – 19:00 GMT</span>
<span>Private Treaty Chamber</span>
</div>
<div class="w-full h-36 bg-cover bg-center rounded-scuderia-lg" data-location="14 Old Bond Street, London, UK" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuD9NNTXoTctG42ASJERVOMlfHhyOmqq9bsmksq5T4vCZ4ZFnJQy0qhHZtWNznrsnB3eak-uBvqzMlFfs90L3vHQcsY-Opiw8LiyxjA3EzAJ4mVClpcfA73vKPnZ3garZsjiAUiIzus-rPHJE4cvVZjzOMWw84AaxCPvZWb8aY8gE1QO77BhiKLDLZ4MxJnyYA40FHxS1RyDl5FTdJ1jn10-UCUt9XZeqv1f3wwyyepUyZkQR9KjYfLr0A')"></div>
</div>
</div>
<!-- Right 7 Cols: Interactive VIP Booking Form -->
<div class="lg:col-span-7 p-8 sm:p-10 rounded-scuderia-xl bg-scuderia-surface-container space-y-6">
<div>
<span class="font-scuderia-label-sm text-scuderia-label-sm uppercase tracking-widest text-scuderia-primary-container block mb-1">Strict Discretion</span>
<h3 class="font-scuderia-headline-md text-scuderia-headline-md text-scuderia-on-surface uppercase tracking-tight">Reserve VIP Viewing / Test Drive</h3>
<p class="font-scuderia-body-sm text-scuderia-body-sm text-scuderia-secondary/80 mt-1">
              Select your preferred machine and experience profile. An Apex Concierge Director confirms arrangements within two hours.
            </p>
</div>
<form class="space-y-4" onsubmit="event.preventDefault(); alert('VIP Viewing Request confirmed. Our Concierge Director will reach out within 2 hours.');">
<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
<div class="space-y-1.5">
<label class="font-scuderia-label-sm text-scuderia-label-sm uppercase text-scuderia-secondary">Full Name &amp; Title</label>
<input class="w-full bg-scuderia-surface-container-high px-4 py-3 rounded-scuderia font-scuderia-body-sm text-scuderia-body-sm text-scuderia-on-surface placeholder:text-scuderia-secondary/40 focus:outline-none" placeholder="e.g. Alexander Vance" required="" type="text"/>
</div>
<div class="space-y-1.5">
<label class="font-scuderia-label-sm text-scuderia-label-sm uppercase text-scuderia-secondary">Direct Phone / WhatsApp</label>
<input class="w-full bg-scuderia-surface-container-high px-4 py-3 rounded-scuderia font-scuderia-body-sm text-scuderia-body-sm text-scuderia-on-surface placeholder:text-scuderia-secondary/40 focus:outline-none" placeholder="+1 (310) 555-0199" required="" type="tel"/>
</div>
</div>
<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
<div class="space-y-1.5">
<label class="font-scuderia-label-sm text-scuderia-label-sm uppercase text-scuderia-secondary">Confidential Email</label>
<input class="w-full bg-scuderia-surface-container-high px-4 py-3 rounded-scuderia font-scuderia-body-sm text-scuderia-body-sm text-scuderia-on-surface placeholder:text-scuderia-secondary/40 focus:outline-none" placeholder="collector@holdings.com" required="" type="email"/>
</div>
<div class="space-y-1.5">
<label class="font-scuderia-label-sm text-scuderia-label-sm uppercase text-scuderia-secondary">Chassis / Vehicle of Interest</label>
<select class="w-full bg-scuderia-surface-container-high px-4 py-3 rounded-scuderia font-scuderia-body-sm text-scuderia-body-sm text-scuderia-on-surface focus:outline-none">
<option>2024 Ferrari SF90 XX Stradale ($890,000)</option>
<option>2023 Porsche 911 GT3 RS ($389,000)</option>
<option>2022 Aston Martin DBS 770 Ultimate ($415,000)</option>
<option>1971 Lamborghini Miura SV ($2,850,000)</option>
<option>2023 Bentley Continental GT Mulliner ($312,000)</option>
<option>2024 McLaren 750S Spider ($375,000)</option>
<option>Off-Market / Private Commission Search</option>
</select>
</div>
</div>
<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
<div class="space-y-1.5">
<label class="font-scuderia-label-sm text-scuderia-label-sm uppercase text-scuderia-secondary">Preferred Date &amp; Time</label>
<input class="w-full bg-scuderia-surface-container-high px-4 py-3 rounded-scuderia font-scuderia-body-sm text-scuderia-body-sm text-scuderia-on-surface placeholder:text-scuderia-secondary/40 focus:outline-none" placeholder="e.g. Next Tuesday at 14:00" type="text"/>
</div>
<div class="space-y-1.5">
<label class="font-scuderia-label-sm text-scuderia-label-sm uppercase text-scuderia-secondary">Preferred Atelier Location</label>
<select class="w-full bg-scuderia-surface-container-high px-4 py-3 rounded-scuderia font-scuderia-body-sm text-scuderia-body-sm text-scuderia-on-surface focus:outline-none">
<option>Beverly Hills Atelier (California)</option>
<option>London Mayfair Enclave (UK)</option>
<option>Private Residence / Hangar Delivery</option>
</select>
</div>
</div>
<div class="space-y-1.5 pt-2">
<label class="font-scuderia-label-sm text-scuderia-label-sm uppercase text-scuderia-secondary block">Desired Experience Profile</label>
<div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
<label class="flex items-center gap-3 p-3.5 rounded-scuderia bg-scuderia-surface-container-high cursor-pointer hover:bg-scuderia-surface-container-highest">
<input checked="" class="accent-primary-container" name="exp_type" type="radio"/>
<div>
<span class="font-scuderia-label-sm text-scuderia-label-sm uppercase text-scuderia-on-surface font-semibold block">Private Vault Viewing</span>
<span class="font-scuderia-body-sm text-scuderia-body-sm text-scuderia-secondary/70">Acoustic salon, full hoist inspection</span>
</div>
</label>
<label class="flex items-center gap-3 p-3.5 rounded-scuderia bg-scuderia-surface-container-high cursor-pointer hover:bg-scuderia-surface-container-highest">
<input class="accent-primary-container" name="exp_type" type="radio"/>
<div>
<span class="font-scuderia-label-sm text-scuderia-label-sm uppercase text-scuderia-on-surface font-semibold block">VIP Track / Road Test Drive</span>
<span class="font-scuderia-body-sm text-scuderia-body-sm text-scuderia-secondary/70">Closed tarmac circuit accompaniment</span>
</div>
</label>
</div>
</div>
<div class="pt-4">
<button class="w-full py-4 rounded-scuderia bg-scuderia-primary-container text-scuderia-on-primary-container font-scuderia-label-md text-scuderia-label-md uppercase tracking-widest hover:brightness-110 shadow-[0_0_24px_rgba(196,30,58,0.4)] transition-all" type="submit">
                Confirm VIP Reservation Request
              </button>
</div>
<p class="font-scuderia-label-sm text-scuderia-label-sm text-scuderia-secondary/50 text-center">
              Appointment requires valid government ID or biometric verification upon arrival. Security escorts provided on request.
            </p>
</form>
</div>
</div>
</div>
</section>
<!-- SECTION 9: FREQUENTLY ASKED QUESTIONS (ACCORDION) -->
<section class="w-full bg-scuderia-surface-container-lowest py-20" id="faq">
<div class="max-w-[1720px] mx-auto px-scuderia-margin md:px-scuderia-margin-tablet lg:px-scuderia-margin-desktop">
<div class="max-w-3xl mx-auto space-y-12">
<div class="text-center space-y-2">
<span class="font-scuderia-label-sm text-scuderia-label-sm uppercase tracking-[0.25em] text-scuderia-primary-container">Clarity &amp; Protocol</span>
<h2 class="font-scuderia-headline-lg text-scuderia-headline-lg text-scuderia-on-surface uppercase tracking-tight">Frequently Asked Questions</h2>
<p class="font-scuderia-body-md text-scuderia-body-md text-scuderia-secondary/80">Everything you need to know about our acquisitions, escrow, and global delivery services.</p>
</div>
<div class="space-y-4" id="faq-accordion-group">
<!-- FAQ Item 1 -->
<div class="rounded-scuderia-xl bg-scuderia-surface-container overflow-hidden">
<button class="w-full p-6 text-left flex items-center justify-between gap-4 hover:bg-scuderia-surface-container-high transition-colors" onclick="toggleFaq(1)">
<span class="font-scuderia-title-md text-scuderia-title-md text-scuderia-on-surface uppercase font-bold">How does Apex authenticate vehicle provenance and continuous ownership?</span>
<span class="material-symbols-outlined text-scuderia-primary-container text-[20px] transition-transform" id="faq-icon-1">expand_more</span>
</button>
<div class="px-6 pb-6 pt-0 font-scuderia-body-md text-scuderia-body-md text-scuderia-secondary/80 leading-relaxed hidden" id="faq-content-1">
              Every prospective acquisition undergoes our 180-Point Forensic Audit. We contact the original manufacturer’s historical archives in Maranello, Stuttgart, or Gaydon to cross-reference chassis stampings, engine serial numbers, transmission tags, and original build option sheets. Vehicles with unexplained gaps in registration or title discrepancies are disqualified.
            </div>
</div>
<!-- FAQ Item 2 -->
<div class="rounded-scuderia-xl bg-scuderia-surface-container overflow-hidden">
<button class="w-full p-6 text-left flex items-center justify-between gap-4 hover:bg-scuderia-surface-container-high transition-colors" onclick="toggleFaq(2)">
<span class="font-scuderia-title-md text-scuderia-title-md text-scuderia-on-surface uppercase font-bold">Can Apex manage worldwide enclosed freight and customs duties?</span>
<span class="material-symbols-outlined text-scuderia-primary-container text-[20px] transition-transform" id="faq-icon-2">expand_more</span>
</button>
<div class="px-6 pb-6 pt-0 font-scuderia-body-md text-scuderia-body-md text-scuderia-secondary/80 leading-relaxed hidden" id="faq-content-2">
              Yes. Over 60% of our transactions involve international delivery. We coordinate ATA Carnets, bonded international air freight via Lufthansa Cargo or Emirates SkyCargo, climate-controlled containerized seafreight, and import duty minimization structures through qualified freeports in Geneva, Delaware, or Dubai.
            </div>
</div>
<!-- FAQ Item 3 -->
<div class="rounded-scuderia-xl bg-scuderia-surface-container overflow-hidden">
<button class="w-full p-6 text-left flex items-center justify-between gap-4 hover:bg-scuderia-surface-container-high transition-colors" onclick="toggleFaq(3)">
<span class="font-scuderia-title-md text-scuderia-title-md text-scuderia-on-surface uppercase font-bold">What is the protocol for trade-in equity offsets and appraisals?</span>
<span class="material-symbols-outlined text-scuderia-primary-container text-[20px] transition-transform" id="faq-icon-3">expand_more</span>
</button>
<div class="px-6 pb-6 pt-0 font-scuderia-body-md text-scuderia-body-md text-scuderia-secondary/80 leading-relaxed hidden" id="faq-content-3">
              Clients may offset high-value hypercars or classics toward new acquisitions. Our curatorial desk reviews documentation and condition reports to issue a binding, guaranteed cash equity value within four business hours. The trade equity is deducted directly from the escrow balance, frequently generating substantial state or regional sales tax credits.
            </div>
</div>
<!-- FAQ Item 4 -->
<div class="rounded-scuderia-xl bg-scuderia-surface-container overflow-hidden">
<button class="w-full p-6 text-left flex items-center justify-between gap-4 hover:bg-scuderia-surface-container-high transition-colors" onclick="toggleFaq(4)">
<span class="font-scuderia-title-md text-scuderia-title-md text-scuderia-on-surface uppercase font-bold">What warranty and post-acquisition protections are included?</span>
<span class="material-symbols-outlined text-scuderia-primary-container text-[20px] transition-transform" id="faq-icon-4">expand_more</span>
</button>
<div class="px-6 pb-6 pt-0 font-scuderia-body-md text-scuderia-body-md text-scuderia-secondary/80 leading-relaxed hidden" id="faq-content-4">
              All modern vehicles convey remaining factory manufacturer warranties, supplemented by the Apex Certified Pre-Owned (CPO) 12-Month Comprehensive Powertrain Guarantee. Historic and vintage machinery receives our 90-Day Mechanical Integrity Warranty with dedicated mobile trackside mechanics dispatched worldwide if required.
            </div>
</div>
<!-- FAQ Item 5 -->
<div class="rounded-scuderia-xl bg-scuderia-surface-container overflow-hidden">
<button class="w-full p-6 text-left flex items-center justify-between gap-4 hover:bg-scuderia-surface-container-high transition-colors" onclick="toggleFaq(5)">
<span class="font-scuderia-title-md text-scuderia-title-md text-scuderia-on-surface uppercase font-bold">Are after-hours or weekend private vault viewings accommodated?</span>
<span class="material-symbols-outlined text-scuderia-primary-container text-[20px] transition-transform" id="faq-icon-5">expand_more</span>
</button>
<div class="px-6 pb-6 pt-0 font-scuderia-body-md text-scuderia-body-md text-scuderia-secondary/80 leading-relaxed hidden" id="faq-content-5">
              Yes. Private viewings are conducted 24/7 for qualified principals and wealth trustees. The salon is cleared of other guests, and complete confidentiality is enforced by our security team. Valet service and direct subterranean vehicular elevators guarantee an entirely discreet arrival.
            </div>
</div>
</div>
</div>
</div>
</section>
</div>
<script>
  // Calculator state
  let currentDownPercent = 25;
  let currentTenor = 48;

  function setDownPayment(percent) {
    currentDownPercent = percent;
    document.querySelectorAll('.down-btn').forEach(btn => {
      btn.classList.remove('bg-scuderia-primary-container', 'text-scuderia-on-primary-container', 'font-semibold');
      btn.classList.add('bg-scuderia-surface-container-high', 'text-scuderia-secondary');
      if (btn.textContent.includes(percent + '%')) {
        btn.classList.add('bg-scuderia-primary-container', 'text-scuderia-on-primary-container', 'font-semibold');
        btn.classList.remove('bg-scuderia-surface-container-high', 'text-scuderia-secondary');
      }
    });
    updateCalculator();
  }

  function setTenor(months) {
    currentTenor = months;
    document.querySelectorAll('.tenor-btn').forEach(btn => {
      btn.classList.remove('bg-scuderia-primary-container', 'text-scuderia-on-primary-container', 'font-semibold');
      btn.classList.add('bg-scuderia-surface-container-high', 'text-scuderia-secondary');
      if (btn.textContent.includes(months + ' Mo')) {
        btn.classList.add('bg-scuderia-primary-container', 'text-scuderia-on-primary-container', 'font-semibold');
        btn.classList.remove('bg-scuderia-surface-container-high', 'text-scuderia-secondary');
      }
    });
    updateCalculator();
  }

  function updateCalculator() {
    const slider = document.getElementById('calc-price-slider');
    const price = parseInt(slider.value, 10);
    const downAmount = Math.round(price * (currentDownPercent / 100));
    
    document.getElementById('calc-price-display').textContent = '$' + price.toLocaleString();
    document.getElementById('calc-down-display').textContent = `${currentDownPercent}% ($${downAmount.toLocaleString()})`;
    
    // Lease calculation with 40% balloon residual and 5.4% interest
    const financed = price - downAmount;
    const residual = price * 0.40;
    const rate = 0.054 / 12;
    const months = currentTenor;
    
    const monthlyPrincipal = (financed - residual) / months;
    const monthlyInterest = (financed + residual) * (rate / 2);
    const totalMonthly = Math.round(monthlyPrincipal + monthlyInterest);

    document.getElementById('calc-monthly-display').innerHTML = `$${totalMonthly.toLocaleString()}<span class="font-title-sm text-title-sm text-scuderia-secondary">/mo</span>`;
  }

  // FAQ Accordion Toggle
  function toggleFaq(index) {
    const content = document.getElementById(`faq-content-${index}`);
    const icon = document.getElementById(`faq-icon-${index}`);
    const isHidden = content.classList.contains('hidden');
    
    // Close all
    for (let i = 1; i <= 5; i++) {
      const c = document.getElementById(`faq-content-${i}`);
      const ic = document.getElementById(`faq-icon-${i}`);
      if (c && ic) {
        c.classList.add('hidden');
        ic.style.transform = 'rotate(0deg)';
      }
    }

    if (isHidden) {
      content.classList.remove('hidden');
      icon.style.transform = 'rotate(180deg)';
    }
  }

  // Spotlight angle changer
  const spotlightAngleData = [
    { title: "Front Aero Flickers", alt: "Ferrari SF90 XX front fascia with carbon aero hood ducts in Rosso Rubino." },
    { title: "Cockpit Alcantara", alt: "Cockpit view of SF90 XX Stradale featuring dry carbon racing buckets and yellow rev counter." },
    { title: "Rear Dual Diffuser", alt: "Rear 3/4 detail showing full-width light bar and twin high-exit titanium exhaust pipes." },
    { title: "CCM-R Brakes & Hub", alt: "Carbon ceramic braking system with red calliper and centerlock forged lightweight wheel." }
  ];

  function changeSpotlightAngle(index) {
    const target = spotlightAngleData[index];
    const el = document.getElementById('spotlight-main-img');
    if (el && target) {
      el.setAttribute('data-alt', target.alt);
      el.style.opacity = '0.5';
      setTimeout(() => {
        el.style.opacity = '1';
      }, 200);
    }
  }

  function handleEscrowReserve() {
    alert("Apex Escrow Gateway initialized. Redirecting to J.P. Morgan Private Bank Custody deposit portal for 2024 Ferrari SF90 XX Stradale.");
  }

  // Inventory pill filtering micro-interaction
  document.querySelectorAll('.inventory-filter-pill').forEach(btn => {
    btn.addEventListener('click', () => {
      document.querySelectorAll('.inventory-filter-pill').forEach(b => {
        b.classList.remove('bg-scuderia-primary-container', 'text-scuderia-on-primary-container');
        b.classList.add('bg-scuderia-surface-container-high', 'text-scuderia-secondary');
      });
      btn.classList.add('bg-scuderia-primary-container', 'text-scuderia-on-primary-container');
      btn.classList.remove('bg-scuderia-surface-container-high', 'text-scuderia-secondary');
    });
  });
</script></main><div class="fixed bottom-6 right-6 z-40 flex flex-col items-end gap-3"><a class="flex items-center gap-2.5 px-4 py-2.5 rounded-scuderia-full bg-scuderia-surface-container-high/90 hover:bg-scuderia-surface-container-highest backdrop-blur-xl border border-white/10 shadow-[0_8px_32px_rgba(0,0,0,0.6)] text-scuderia-on-surface group transition-all" data-path="vip-concierge-chat" href="#"><span class="w-2 h-2 rounded-scuderia-full bg-emerald-500 animate-ping"></span><span class="font-scuderia-label-md text-scuderia-label-md uppercase tracking-wider group-hover:text-primary transition-colors">WhatsApp VIP Concierge</span><span class="material-symbols-outlined text-[16px] text-emerald-400">chat</span></a><button class="flex items-center gap-3 px-5 py-3 rounded-scuderia-full bg-scuderia-primary-container text-scuderia-on-primary-container font-scuderia-label-md text-scuderia-label-md uppercase tracking-wider shadow-[0_8px_30px_rgba(196,30,58,0.45)] hover:shadow-[0_8px_36px_rgba(196,30,58,0.65)] hover:scale-[1.02] active:scale-[0.98] transition-all"><span class="material-symbols-outlined text-[20px]">auto_awesome</span><span>Apex AI Concierge</span></button></div><footer class="w-full bg-scuderia-surface-container-lowest border-t border-white/5 pt-scuderia-space-2xl pb-scuderia-space-lg"><div class="max-w-[1720px] mx-auto px-scuderia-margin md:px-scuderia-margin-tablet lg:px-scuderia-margin-desktop"><div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-y-12 lg:gap-x-12 pb-scuderia-space-2xl border-b border-white/5"><div class="lg:col-span-4 flex flex-col items-start"><div class="flex items-center gap-scuderia-space-sm mb-6"><div class="w-7 h-7 rounded-scuderia-lg bg-scuderia-surface-container flex items-center justify-center border border-white/10"><div class="w-3 h-3 rotate-45 bg-scuderia-primary-container"></div></div><span class="font-scuderia-headline-sm text-scuderia-headline-sm uppercase tracking-tight text-scuderia-on-surface">Apex Scuderia</span></div><p class="font-scuderia-body-md text-scuderia-body-md text-scuderia-secondary/80 max-w-sm mb-8 leading-relaxed">Curating the world's most coveted hypercars, motorsport icons, and bespoke coachbuilt commissions. Engineered for discerning automotive collectors and private racing ateliers.</p><div class="flex items-center gap-4"><div class="px-3 py-1.5 rounded-scuderia-lg bg-scuderia-surface-container border border-white/5 font-scuderia-label-sm text-scuderia-label-sm uppercase tracking-wider text-scuderia-secondary">Concours D'Elegance Certified</div><div class="px-3 py-1.5 rounded-scuderia-lg bg-scuderia-surface-container border border-white/5 font-scuderia-label-sm text-scuderia-label-sm uppercase tracking-wider text-scuderia-secondary">Sotheby's Provenance Verified</div></div></div><div class="lg:col-span-2 flex flex-col"><span class="font-scuderia-label-lg text-scuderia-label-lg uppercase tracking-wider text-scuderia-on-surface mb-6">Atelier Salons</span><div class="space-y-6 font-scuderia-body-sm text-scuderia-body-sm text-scuderia-secondary"><div class="space-y-1"><div class="text-scuderia-on-surface font-medium">Beverly Hills Private Salon</div><div>9641 Wilshire Boulevard</div><div>Beverly Hills, CA 90212</div><div class="text-scuderia-primary-container font-scuderia-label-sm text-scuderia-label-sm pt-1">Private Access Only</div></div><div class="space-y-1"><div class="text-scuderia-on-surface font-medium">London Mayfair Atelier</div><div>14 Berkeley Square</div><div>Mayfair, London W1J 6BL</div><div class="text-scuderia-primary-container font-scuderia-label-sm text-scuderia-label-sm pt-1">By Appointment</div></div></div></div><div class="lg:col-span-2 flex flex-col"><span class="font-scuderia-label-lg text-scuderia-label-lg uppercase tracking-wider text-scuderia-on-surface mb-6">Inventory &amp; Vault</span><div class="flex flex-col space-y-3 font-scuderia-label-md text-scuderia-label-md uppercase tracking-wider"><a class="text-scuderia-secondary hover:text-scuderia-on-surface transition-colors" data-path="vault-inventory" href="#">Hypercars &amp; Prototypes</a><a class="text-scuderia-secondary hover:text-scuderia-on-surface transition-colors" data-path="vault-inventory" href="#">Homologation Specials</a><a class="text-scuderia-secondary hover:text-scuderia-on-surface transition-colors" data-path="vault-inventory" href="#">Historical Grand Prix</a><a class="text-scuderia-secondary hover:text-scuderia-on-surface transition-colors" data-path="provenance" href="#">Provenance Archives</a><a class="text-scuderia-secondary hover:text-scuderia-on-surface transition-colors" data-path="bespoke-financing" href="#">Structured Acquisitions</a></div></div><div class="lg:col-span-4 flex flex-col"><span class="font-scuderia-label-lg text-scuderia-label-lg uppercase tracking-wider text-scuderia-on-surface mb-2">Allocation Gazette</span><p class="font-scuderia-body-sm text-scuderia-body-sm text-scuderia-secondary mb-6">Direct intelligence on unlisted allocations, off-market commissions, and international auction previews.</p><div class="flex flex-col sm:flex-row gap-3 w-full"><input class="flex-1 bg-scuderia-surface-container border border-white/10 rounded-scuderia-lg px-4 py-2.5 font-scuderia-body-md text-scuderia-body-md text-scuderia-on-surface placeholder:text-scuderia-secondary/40 focus:outline-none focus:border-scuderia-primary-container transition-colors" placeholder="collector@atelier.com" type="email"/><button class="px-6 py-2.5 rounded-scuderia-lg bg-scuderia-surface-container-high border border-white/10 hover:border-scuderia-primary-container font-scuderia-label-md text-scuderia-label-md uppercase tracking-wider text-scuderia-on-surface hover:text-primary transition-all whitespace-nowrap">Subscribe</button></div></div></div><div class="pt-8 flex flex-col md:flex-row items-center justify-between gap-4 font-scuderia-body-sm text-scuderia-body-sm text-scuderia-secondary/60"><p>© 2025 Apex Scuderia Automobili S.p.A. All rights reserved.</p><div class="flex items-center gap-6 font-scuderia-label-sm text-scuderia-label-sm uppercase tracking-wider"><a class="hover:text-scuderia-secondary transition-colors" data-path="privacy-charter" href="#">Privacy Charter</a><a class="hover:text-scuderia-secondary transition-colors" data-path="consignment-terms" href="#">Consignment Terms</a><a class="hover:text-scuderia-secondary transition-colors" data-path="escrow-protocols" href="#">Escrow Protocols</a></div></div></div></footer></body></html>