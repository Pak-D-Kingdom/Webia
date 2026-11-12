{{-- STRIKE® — Neo Brutalist Branding & Creative Agency | WEBIA --}}
<!DOCTYPE html>

<html class="scroll-smooth" lang="id">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>STUDIO BOLD® / STRIKE® — Premium Branding &amp; Creative Agency</title>
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com" rel="preconnect"/>
<link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&amp;family=Space+Grotesk:wght@400;500;600;700&amp;family=Syne:wght@700;800;900&amp;family=JetBrains+Mono:wght@400;700&amp;display=swap" rel="stylesheet"/>
<!-- Tailwind CSS CDN -->
<script src="https://cdn.tailwindcss.com"></script>
<script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brandOrange: '#FF5A36',
                        brandBlack: '#171717',
                        brandLime: '#D7FF00',
                        brandBg: '#F5F0E8',
                        brandWhite: '#FFFFFF',
                    },
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                        display: ['Syne', 'sans-serif'],
                        mono: ['JetBrains Mono', 'monospace'],
                        grotesk: ['Space Grotesk', 'sans-serif'],
                    },
                    boxShadow: {
                        'brutal-sm': '3px 3px 0px #171717',
                        'brutal': '5px 5px 0px #171717',
                        'brutal-lg': '8px 8px 0px #171717',
                        'brutal-lime': '5px 5px 0px #D7FF00',
                        'brutal-orange': '5px 5px 0px #FF5A36',
                    }
                }
            }
        }
    </script>
<!-- FontAwesome Icons -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"/>
<!-- Alpine.js is loaded after appData so Alpine can resolve the component on startup. -->

<link href='{{ asset("css/website-bisnis/templates/professional-service/branding-creative/strike/strike.css") }}' rel="stylesheet"/></head>
<body class="antialiased selection:bg-brandLime selection:text-brandBlack" x-data="appData()">
<!-- TOPBAR ANNOUNCEMENT TICKER -->
<div class="bg-brandBlack text-brandLime border-b-4 border-brandBlack py-2 font-mono text-xs font-bold tracking-widest z-50 relative overflow-hidden">
<div class="animate-marquee whitespace-nowrap flex items-center gap-12">
<span>⚡ STUDIO BOLD® • ACCEPTING BRANDING &amp; REBRANDING PROJECTS FOR Q1 &amp; Q2</span>
<span>✦ BRAND STRATEGY • VISUAL IDENTITY • PACKAGING • DIGITAL EXPERIENCES</span>
<span>🔥 NO BORING CORPORATE TEMPLATES • WE DESIGN BRANDS THAT DOMINATE MARKET SECTORS</span>
<span>⚡ STUDIO BOLD® • ACCEPTING BRANDING &amp; REBRANDING PROJECTS FOR Q1 &amp; Q2</span>
<span>✦ BRAND STRATEGY • VISUAL IDENTITY • PACKAGING • DIGITAL EXPERIENCES</span>
</div>
</div>
<!-- MAIN STICKY NAVIGATION BAR -->
<header class="sticky top-0 z-40 bg-brandBg/95 backdrop-blur-md border-b-4 border-brandBlack px-4 lg:px-12 py-4 flex items-center justify-between">
<!-- Brand Logo -->
<a class="flex items-center gap-3 group" href="#">
<div class="bg-brandOrange text-brandWhite border-brutal font-display font-black text-2xl px-3 py-1 -rotate-1 group-hover:rotate-0 transition-transform shadow-brutal-sm">
                BOLD<span class="text-brandLime">®</span>
</div>
<div class="hidden sm:flex flex-col font-mono text-[10px] leading-tight font-bold">
<span class="text-brandBlack">STRIKE STUDIO</span>
<span class="text-brandOrange">BRANDING &amp; CREATIVE</span>
</div>
</a>
<!-- Desktop Navigation Links -->
<nav class="hidden lg:flex items-center gap-8 font-mono font-bold text-xs">
<a class="hover:bg-brandLime hover:px-2 py-1 transition-all" href="#services">01. SERVICES</a>
<a class="hover:bg-brandLime hover:px-2 py-1 transition-all" href="#portfolio">02. WORK</a>
<a class="hover:bg-brandLime hover:px-2 py-1 transition-all" href="#personality">03. VIBES</a>
<a class="hover:bg-brandLime hover:px-2 py-1 transition-all" href="#transformation">04. REBRAND</a>
<a class="hover:bg-brandLime hover:px-2 py-1 transition-all" href="#quiz">05. QUIZ</a>
<a class="hover:bg-brandLime hover:px-2 py-1 transition-all" href="#pricing">06. PACKAGES</a>
</nav>
<!-- Right Header Controls -->
<div class="flex items-center gap-3">
<!-- Language Toggle Switch -->
<button @click="toggleLanguage()" class="btn-brutal bg-white px-3 py-1.5 font-mono text-xs font-bold flex items-center gap-1.5">
<i class="fa-solid fa-globe text-brandOrange"></i>
<span x-text="lang.toUpperCase()"></span>
</button>
<!-- Start Project CTA -->
<a class="btn-brutal bg-brandOrange text-brandWhite font-bold text-xs px-5 py-2.5 flex items-center gap-2" href="#brief">
<span>START PROJECT</span>
<i class="fa-solid fa-arrow-right"></i>
</a>
<!-- Mobile Drawer Button -->
<button @click="mobileNav = !mobileNav" class="lg:hidden btn-brutal bg-brandLime p-2 text-brandBlack">
<i :class="mobileNav ? 'fa-xmark' : 'fa-bars'" class="fa-solid"></i>
</button>
</div>
</header>
<!-- Mobile Navigation Drawer -->
<div class="lg:hidden fixed inset-0 z-30 bg-brandBg border-b-4 border-brandBlack p-8 flex flex-col justify-center gap-6 font-display text-2xl font-black" x-show="mobileNav" x-transition="">
<a @click="mobileNav = false" class="hover:text-brandOrange" href="#services">01. SERVICES &amp; CAPABILITIES</a>
<a @click="mobileNav = false" class="hover:text-brandOrange" href="#portfolio">02. SELECTED WORK</a>
<a @click="mobileNav = false" class="hover:text-brandOrange" href="#personality">03. BRAND ARCHETYPES</a>
<a @click="mobileNav = false" class="hover:text-brandOrange" href="#transformation">04. REBRAND BEFORE/AFTER</a>
<a @click="mobileNav = false" class="hover:text-brandOrange" href="#quiz">05. BRAND AUDIT QUIZ</a>
<a @click="mobileNav = false" class="hover:text-brandOrange" href="#pricing">06. PRICING PACKAGES</a>
<a @click="mobileNav = false" class="hover:text-brandOrange" href="#brief">07. BRIEF GENERATOR</a>
</div>
<!-- KINETIC HERO SECTION (Refined Grid & Sharp Geometry) -->
<section class="relative border-b-4 border-brandBlack px-4 lg:px-12 py-16 lg:py-24 bg-brandBg grid-pattern overflow-hidden">
<div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-12 items-center relative z-10">
<!-- Left Headline Block -->
<div class="lg:col-span-7 space-y-6">
<!-- Status Badge -->
<div class="inline-flex items-center gap-2 bg-brandBlack text-brandLime border-brutal px-3 py-1 font-mono text-xs font-bold shadow-brutal-sm">
<span class="w-2 h-2 rounded-full bg-brandOrange animate-ping"></span>
<span>STUDIO BOLD® • CREATIVE &amp; BRANDING AGENCY</span>
</div>
<!-- Dynamic Dynamic Glitch Headline -->
<h1 class="font-display font-black text-5xl sm:text-7xl lg:text-7xl leading-[0.95] uppercase tracking-tight">
                    WE CRAFT <br/>
<span class="bg-brandOrange text-white px-3 py-0.5 border-brutal inline-block -rotate-1 shadow-brutal mt-1">HIGH-IMPACT</span> <br/>
                    BRAND IDENTITIES.
                </h1>
<!-- Subtitle -->
<p class="font-sans text-base md:text-lg text-gray-800 font-medium max-w-xl border-l-4 border-brandOrange pl-4 py-1">
                    We turn ambitious startups and established companies into unstoppable market leaders. Sharp brand positioning, bold visual systems, packaging, and digital experiences.
                </p>
<!-- Action CTAs -->
<div class="flex flex-wrap items-center gap-4 pt-4">
<a class="btn-brutal bg-brandOrange text-white font-mono font-bold text-sm px-7 py-3.5 flex items-center gap-3" href="#brief">
<i class="fa-solid fa-bolt text-brandLime"></i>
<span>START A PROJECT</span>
</a>
<a class="btn-brutal bg-brandLime text-brandBlack font-mono font-bold text-sm px-7 py-3.5 flex items-center gap-3" href="#portfolio">
<i class="fa-solid fa-eye"></i>
<span>EXPLORE PORTFOLIO</span>
</a>
</div>
<!-- Studio Key Metrics -->
<div class="grid grid-cols-3 gap-4 pt-8 border-t-3 border-brandBlack font-mono">
<div class="bg-white border-brutal p-3 shadow-brutal-sm text-center">
<div class="font-black text-2xl md:text-3xl text-brandOrange">150+</div>
<div class="text-[10px] font-bold text-gray-700 uppercase mt-0.5">BRANDS LAUNCHED</div>
</div>
<div class="bg-white border-brutal p-3 shadow-brutal-sm text-center">
<div class="font-black text-2xl md:text-3xl text-brandBlack">100%</div>
<div class="text-[10px] font-bold text-gray-700 uppercase mt-0.5">CUSTOM DESIGNS</div>
</div>
<div class="bg-white border-brutal p-3 shadow-brutal-sm text-center">
<div class="font-black text-2xl md:text-3xl text-brandOrange">14+</div>
<div class="text-[10px] font-bold text-gray-700 uppercase mt-0.5">GLOBAL AWARDS</div>
</div>
</div>
</div>
<!-- Right Visual Interactive Archetype Canvas Block -->
<div class="lg:col-span-5 relative">
<div class="bg-white border-brutal-thick p-6 shadow-brutal-lg space-y-6 relative overflow-hidden">
<!-- Rotating Acid Decor Badge -->
<div class="absolute -top-8 -right-8 w-24 h-24 bg-brandLime border-brutal rounded-full animate-spin-slow flex items-center justify-center font-mono font-bold text-[10px] text-center p-2 z-10">
                        ✦ BOLD LABS ✦ CREATIVE ✦
                    </div>
<div class="flex items-center justify-between border-b-3 border-brandBlack pb-3">
<span class="font-mono text-xs font-bold text-brandOrange">// BRAND ARCHETYPE TESTER</span>
<span class="bg-brandBlack text-brandLime font-mono text-[10px] px-2 py-0.5 font-bold">INTERACTIVE</span>
</div>
<!-- Dynamic Live Scalability Canvas -->
<div :style="{ backgroundColor: activeCanvasBg, color: activeCanvasText }" class="h-44 border-brutal flex flex-col items-center justify-center p-6 text-center transition-all duration-300">
<span class="font-display font-black text-3xl md:text-4xl tracking-tighter uppercase mb-1" x-text="activeCanvasTitle">
                            STUDIO BOLD®
                        </span>
<span class="font-mono text-xs font-bold tracking-widest uppercase opacity-90" x-text="activeCanvasTag">
                            [NEO-BRUTALIST SYSTEM]
                        </span>
</div>
<!-- Archetype Selector Controls -->
<div class="grid grid-cols-3 gap-2 font-mono text-[11px] font-bold">
<button @click="setCanvas('NEO BOLD', '#FF5A36', '#171717', '[NEO-BRUTALIST SYSTEM]')" class="btn-brutal bg-brandOrange text-white py-2 text-center">
                            NEO
                        </button>
<button @click="setCanvas('ACID HIGH', '#D7FF00', '#171717', '[HIGH-ENERGY LIME]')" class="btn-brutal bg-brandLime text-brandBlack py-2 text-center">
                            ACID
                        </button>
<button @click="setCanvas('DARK OBSIDIAN', '#171717', '#D7FF00', '[MONOCHROME NOIR]')" class="btn-brutal bg-brandBlack text-brandLime py-2 text-center">
                            DARK
                        </button>
</div>
<div class="bg-brandBg border-brutal p-3 font-mono text-xs flex justify-between items-center">
<span class="text-gray-700">TARGET DISRUPT SCORE:</span>
<span class="font-black text-brandOrange text-sm">99.4 / 100</span>
</div>
</div>
</div>
</div>
</section>
<!-- SECTION 01: Agency Profile & Manifesto -->
<section class="py-20 px-4 lg:px-12 border-b-4 border-brandBlack bg-white">
<div class="max-w-7xl mx-auto space-y-12">
<div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
<div class="lg:col-span-5 space-y-6">
<span class="bg-brandLime text-brandBlack border-brutal px-3 py-1 font-mono text-xs font-bold uppercase">
                        // 01. PHILOSOPHY &amp; MANIFESTO
                    </span>
<h2 class="font-display font-black text-4xl sm:text-5xl uppercase leading-tight">
                        SAFE DESIGN IS THE BIGGEST RISK.
                    </h2>
<p class="font-sans text-base text-gray-800 leading-relaxed">
                        In an era dominated by repetitive minimalist templates and dull corporate beige, visual boldness is your primary competitive edge. We create high-contrast brand systems built to command attention.
                    </p>
<div class="space-y-3 font-mono text-xs font-bold">
<div class="bg-brandBg border-brutal p-3 flex items-center gap-3 shadow-brutal-sm">
<i class="fa-solid fa-check text-brandOrange text-base"></i>
<span>ZERO TEMPLATES. 100% STRATEGIC IDENTITY.</span>
</div>
<div class="bg-brandBg border-brutal p-3 flex items-center gap-3 shadow-brutal-sm">
<i class="fa-solid fa-check text-brandOrange text-base"></i>
<span>RIGID TYPOGRAPHY &amp; COLOR ARCHITECTURE.</span>
</div>
<div class="bg-brandBg border-brutal p-3 flex items-center gap-3 shadow-brutal-sm">
<i class="fa-solid fa-check text-brandOrange text-base"></i>
<span>FULL COPYRIGHT &amp; VECTOR ASSET OWNERSHIP.</span>
</div>
</div>
</div>
<div class="lg:col-span-7 grid grid-cols-1 sm:grid-cols-2 gap-6 font-sans">
<div class="bg-brandOrange text-white border-brutal p-6 shadow-brutal space-y-3">
<div class="w-10 h-10 bg-white text-brandBlack border-brutal flex items-center justify-center font-mono font-black text-base">01</div>
<h3 class="font-display font-black text-2xl uppercase">RADICAL POSITIONING</h3>
<p class="text-xs text-white/90 leading-relaxed">We extract your core market differentiator and amplify it visually so customers recognize you instantly.</p>
</div>
<div class="bg-brandLime text-brandBlack border-brutal p-6 shadow-brutal space-y-3 sm:translate-y-4">
<div class="w-10 h-10 bg-brandBlack text-brandLime border-brutal flex items-center justify-center font-mono font-black text-base">02</div>
<h3 class="font-display font-black text-2xl uppercase">HIGH SCROLL-STOPPER</h3>
<p class="text-xs text-gray-900 leading-relaxed">Design engineered to arrest attention within 0.3 seconds across digital feeds and physical shelves.</p>
</div>
<div class="bg-brandBlack text-white border-brutal p-6 shadow-brutal space-y-3">
<div class="w-10 h-10 bg-brandOrange text-white border-brutal flex items-center justify-center font-mono font-black text-base">03</div>
<h3 class="font-display font-black text-2xl uppercase text-brandLime">SYSTEM FLEXIBILITY</h3>
<p class="text-xs text-gray-300 leading-relaxed">Design toolkits built to adapt seamlessly from app icons to 50-foot commercial billboards.</p>
</div>
<div class="bg-brandBg border-brutal p-6 shadow-brutal space-y-3 sm:translate-y-4">
<div class="w-10 h-10 bg-brandBlack text-brandWhite border-brutal flex items-center justify-center font-mono font-black text-base">04</div>
<h3 class="font-display font-black text-2xl uppercase">COMMERCIAL ROI</h3>
<p class="text-xs text-gray-800 leading-relaxed">Branding isn't just art—it's a commercial multiplier engineered to increase customer lifetime value.</p>
</div>
</div>
</div>
</div>
</section>
<!-- SECTION 02: 8 Core Service Categories -->
<section class="py-20 px-4 lg:px-12 border-b-4 border-brandBlack bg-brandBg" id="services">
<div class="max-w-7xl mx-auto space-y-12">
<div class="flex flex-col md:flex-row md:items-end justify-between gap-6 border-b-4 border-brandBlack pb-6">
<div>
<span class="bg-brandBlack text-brandLime border-brutal px-3 py-1 font-mono text-xs font-bold uppercase">
                        // 02. AGENCY SERVICES
                    </span>
<h2 class="font-display font-black text-4xl sm:text-5xl uppercase mt-2">
                        OUR BRANDING CAPABILITIES
                    </h2>
</div>
<p class="font-mono text-xs font-bold text-gray-700 max-w-sm">
                    Structured creative disciplines tailored to transform companies into category leaders.
                </p>
</div>
<!-- 8 Services Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
<!-- Service 1 -->
<div class="bg-white border-brutal p-6 shadow-brutal hover:bg-brandLime transition-colors group">
<div class="flex justify-between items-start mb-6">
<i class="fa-solid fa-chess-king text-3xl text-brandOrange group-hover:text-brandBlack"></i>
<span class="font-mono font-black text-lg">01</span>
</div>
<h3 class="font-display font-black text-xl uppercase mb-2">Brand Strategy</h3>
<p class="text-xs text-gray-700 leading-relaxed mb-4">Market positioning, target audience mapping, brand messaging architecture, &amp; tone of voice.</p>
<div class="font-mono text-[11px] font-bold border-t-2 border-brandBlack pt-3">
                        ✦ Positioning Frameworks
                    </div>
</div>
<!-- Service 2 -->
<div class="bg-white border-brutal p-6 shadow-brutal hover:bg-brandOrange hover:text-white transition-colors group">
<div class="flex justify-between items-start mb-6">
<i class="fa-solid fa-vector-square text-3xl text-brandBlack group-hover:text-white"></i>
<span class="font-mono font-black text-lg">02</span>
</div>
<h3 class="font-display font-black text-xl uppercase mb-2">Brand Identity</h3>
<p class="text-xs text-gray-700 group-hover:text-gray-100 leading-relaxed mb-4">Comprehensive visual ecosystem, color theory, iconography, and custom typography pairings.</p>
<div class="font-mono text-[11px] font-bold border-t-2 border-brandBlack pt-3">
                        ✦ Primary &amp; Secondary Marks
                    </div>
</div>
<!-- Service 3 -->
<div class="bg-white border-brutal p-6 shadow-brutal hover:bg-brandLime transition-colors group">
<div class="flex justify-between items-start mb-6">
<i class="fa-solid fa-shapes text-3xl text-brandOrange group-hover:text-brandBlack"></i>
<span class="font-mono font-black text-lg">03</span>
</div>
<h3 class="font-display font-black text-xl uppercase mb-2">Logo Exploration</h3>
<p class="text-xs text-gray-700 leading-relaxed mb-4">Vector mark construction, scalability stress testing, and trademark-ready logo suites.</p>
<div class="font-mono text-[11px] font-bold border-t-2 border-brandBlack pt-3">
                        ✦ Responsive Logo Assets
                    </div>
</div>
<!-- Service 4 -->
<div class="bg-white border-brutal p-6 shadow-brutal hover:bg-brandBlack hover:text-brandLime transition-colors group">
<div class="flex justify-between items-start mb-6">
<i class="fa-solid fa-book-bookmark text-3xl text-brandLime"></i>
<span class="font-mono font-black text-lg">04</span>
</div>
<h3 class="font-display font-black text-xl uppercase mb-2">Brand Guidelines</h3>
<p class="text-xs text-gray-700 group-hover:text-gray-300 leading-relaxed mb-4">Rigid 40+ page visual brand manual detailing clear usage rules, clear spaces, and media specs.</p>
<div class="font-mono text-[11px] font-bold border-t-2 border-brandBlack group-hover:border-brandLime pt-3">
                        ✦ Digital Master PDF Manual
                    </div>
</div>
<!-- Service 5 -->
<div class="bg-white border-brutal p-6 shadow-brutal hover:bg-brandOrange hover:text-white transition-colors group">
<div class="flex justify-between items-start mb-6">
<i class="fa-solid fa-box text-3xl text-brandBlack group-hover:text-white"></i>
<span class="font-mono font-black text-lg">05</span>
</div>
<h3 class="font-display font-black text-xl uppercase mb-2">Packaging Design</h3>
<p class="text-xs text-gray-700 group-hover:text-gray-100 leading-relaxed mb-4">Structural unboxing, die-lines, foil stamp finishes, and retail-shelf graphic systems.</p>
<div class="font-mono text-[11px] font-bold border-t-2 border-brandBlack pt-3">
                        ✦ Print-Ready Dielines
                    </div>
</div>
<!-- Service 6 -->
<div class="bg-white border-brutal p-6 shadow-brutal hover:bg-brandLime transition-colors group">
<div class="flex justify-between items-start mb-6">
<i class="fa-solid fa-[#171717] fa-rotate-left text-3xl text-brandOrange group-hover:text-brandBlack"></i>
<span class="font-mono font-black text-lg">06</span>
</div>
<h3 class="font-display font-black text-xl uppercase mb-2">Complete Rebranding</h3>
<p class="text-xs text-gray-700 leading-relaxed mb-4">Total visual and strategic overhaul for legacy brands modernizing for next-gen markets.</p>
<div class="font-mono text-[11px] font-bold border-t-2 border-brandBlack pt-3">
                        ✦ Complete Legacy Shift
                    </div>
</div>
<!-- Service 7 -->
<div class="bg-white border-brutal p-6 shadow-brutal hover:bg-brandBlack hover:text-brandLime transition-colors group">
<div class="flex justify-between items-start mb-6">
<i class="fa-solid fa-laptop text-3xl text-brandLime"></i>
<span class="font-mono font-black text-lg">07</span>
</div>
<h3 class="font-display font-black text-xl uppercase mb-2">Digital Branding</h3>
<p class="text-xs text-gray-700 group-hover:text-gray-300 leading-relaxed mb-4">Brutalist web experiences, mobile UI design tokens, motion graphics, and social visual kits.</p>
<div class="font-mono text-[11px] font-bold border-t-2 border-brandBlack group-hover:border-brandLime pt-3">
                        ✦ High-Speed UI/UX Systems
                    </div>
</div>
<!-- Service 8 -->
<div class="bg-white border-brutal p-6 shadow-brutal hover:bg-brandLime transition-colors group">
<div class="flex justify-between items-start mb-6">
<i class="fa-solid fa-shirt text-3xl text-brandOrange group-hover:text-brandBlack"></i>
<span class="font-mono font-black text-lg">08</span>
</div>
<h3 class="font-display font-black text-xl uppercase mb-2">Merch &amp; Campaigns</h3>
<p class="text-xs text-gray-700 leading-relaxed mb-4">Apparel graphics, promotional merchandise, billboard campaign art direction, and launch assets.</p>
<div class="font-mono text-[11px] font-bold border-t-2 border-brandBlack pt-3">
                        ✦ Campaign Art Assets
                    </div>
</div>
</div>
</div>
</section>
<!-- SECTION 03: Brand Personality Vibe Selector -->
<section class="py-20 px-4 lg:px-12 border-b-4 border-brandBlack bg-white" id="personality">
<div class="max-w-7xl mx-auto space-y-10">
<div class="text-center space-y-3 max-w-2xl mx-auto">
<span class="bg-brandOrange text-white border-brutal px-3 py-1 font-mono text-xs font-bold uppercase">// 03. VIBE SELECTOR</span>
<h2 class="font-display font-black text-4xl sm:text-5xl uppercase">BRAND PERSONALITY MATRIX</h2>
<p class="font-mono text-xs font-bold text-gray-700">Click a vibe below to preview how our creative team adapts visual systems across different brand personalities.</p>
</div>
<div class="flex flex-wrap justify-center gap-3 font-mono text-xs font-bold" role="group" aria-label="Choose brand personality">
<button type="button" class="btn-brutal px-4 py-2 vibe-tab is-active" data-vibe="bold">💥 BOLD NEO-BRUTALIST</button>
<button type="button" class="btn-brutal px-4 py-2 vibe-tab" data-vibe="luxury">🏛️ LUXURY MINIMAL</button>
<button type="button" class="btn-brutal px-4 py-2 vibe-tab" data-vibe="playful">🎨 PLAYFUL ACID</button>
<button type="button" class="btn-brutal px-4 py-2 vibe-tab" data-vibe="corporate">🏢 MODERN CORPORATE</button>
</div>
<div class="vibe-preview vibe-bold border-brutal-thick p-8 md:p-12 shadow-brutal-lg max-w-4xl mx-auto" id="vibePreview" aria-live="polite">
<div class="flex flex-col md:flex-row items-center justify-between gap-8">
<div class="space-y-4 text-left">
<span class="vibe-tag font-mono text-xs font-bold px-2 py-1 border-brutal inline-block" id="vibeTag">NEO-BRUTALIST</span>
<h3 class="font-display font-black text-4xl md:text-5xl uppercase" id="vibeHeadline">HIGH-IMPACT &amp; DISRUPTIVE</h3>
<p class="font-sans text-sm max-w-md leading-relaxed" id="vibeDesc">Unapologetic visual weight, oversized typography, and high-contrast color tokens.</p>
</div>
<div class="vibe-demo w-full md:w-64 h-44 border-brutal flex flex-col justify-center items-center p-4 text-center shadow-brutal" id="vibeDemo">
<span class="font-display font-black text-2xl uppercase tracking-tighter" id="vibeDemoLabel">BOLD IDENTITY</span>
<span class="font-mono text-[10px] mt-2 font-bold uppercase" id="vibeDemoTag">DISRUPTIVE</span>
</div>
</div>
</div>
</div>
</section>
<!-- SECTION 04: Interactive Color Palette & Typography Showcase -->
<section class="py-20 px-4 lg:px-12 border-b-4 border-brandBlack bg-brandBg">
<div class="max-w-7xl mx-auto space-y-16">
<!-- Color Palette Explorer -->
<div class="space-y-8">
<div class="flex flex-col md:flex-row md:items-end justify-between gap-4 border-b-4 border-brandBlack pb-4">
<div>
<span class="bg-brandBlack text-brandLime border-brutal px-3 py-1 font-mono text-xs font-bold uppercase">
                            // 04. DESIGN LAB
                        </span>
<h2 class="font-display font-black text-3xl sm:text-5xl uppercase mt-2">
                            COLOR PALETTE EXPLORER
                        </h2>
</div>
<span class="font-mono text-xs font-bold text-gray-700">CLICK SWATCH TO COPY HEX CODE</span>
</div>
<div class="grid grid-cols-2 sm:grid-cols-4 gap-6 font-mono">
<div @click="copyHex('#FF5A36')" class="bg-[#FF5A36] border-brutal p-6 shadow-brutal cursor-pointer hover:-translate-y-1 transition-transform">
<div class="font-black text-2xl mb-12 text-brandBlack">VIBRANT ORANGE</div>
<div class="bg-white border-brutal p-2 text-xs font-bold flex justify-between">
<span>#FF5A36</span>
<i class="fa-solid fa-copy"></i>
</div>
</div>
<div @click="copyHex('#D7FF00')" class="bg-[#D7FF00] border-brutal p-6 shadow-brutal cursor-pointer hover:-translate-y-1 transition-transform">
<div class="font-black text-2xl mb-12 text-brandBlack">ACID LIME</div>
<div class="bg-white border-brutal p-2 text-xs font-bold flex justify-between">
<span>#D7FF00</span>
<i class="fa-solid fa-copy"></i>
</div>
</div>
<div @click="copyHex('#171717')" class="bg-[#171717] border-brutal p-6 shadow-brutal cursor-pointer hover:-translate-y-1 transition-transform">
<div class="font-black text-2xl mb-12 text-brandLime">DEEP OBSIDIAN</div>
<div class="bg-white text-brandBlack border-brutal p-2 text-xs font-bold flex justify-between">
<span>#171717</span>
<i class="fa-solid fa-copy"></i>
</div>
</div>
<div @click="copyHex('#F5F0E8')" class="bg-[#F5F0E8] border-brutal p-6 shadow-brutal cursor-pointer hover:-translate-y-1 transition-transform">
<div class="font-black text-2xl mb-12 text-brandBlack">OFF-WHITE CANVAS</div>
<div class="bg-white border-brutal p-2 text-xs font-bold flex justify-between">
<span>#F5F0E8</span>
<i class="fa-solid fa-copy"></i>
</div>
</div>
</div>
</div>
<!-- Typography & Scale Tester -->
<div class="bg-white border-brutal p-8 shadow-brutal space-y-6">
<div class="flex flex-col md:flex-row md:items-center justify-between gap-4 border-b-2 border-brandBlack pb-4">
<h3 class="font-display font-black text-2xl uppercase">TYPOGRAPHY SCALABILITY TESTER</h3>
<div class="flex items-center gap-3 font-mono text-xs font-bold">
<span>INPUT CUSTOM TEXT:</span>
<input class="border-brutal px-3 py-1 font-mono text-xs focus:bg-brandLime focus:outline-none" type="text" x-model="sampleText"/>
</div>
</div>
<div class="space-y-4">
<div>
<span class="font-mono text-[10px] text-gray-500 font-bold uppercase">DISPLAY HEADER (SYNE 900)</span>
<div class="font-display font-black text-4xl sm:text-6xl tracking-tight leading-none uppercase text-brandOrange truncate" x-text="sampleText"></div>
</div>
<div>
<span class="font-mono text-[10px] text-gray-500 font-bold uppercase">HEADLINE (SPACE GROTESK 700)</span>
<div class="font-grotesk font-bold text-2xl sm:text-3xl text-brandBlack truncate" x-text="sampleText"></div>
</div>
<div>
<span class="font-mono text-[10px] text-gray-500 font-bold uppercase">MONO DATA BADGE (JETBRAINS MONO 700)</span>
<div class="font-mono font-bold text-sm bg-brandLime border-brutal px-3 py-1 inline-block text-brandBlack" x-text="'⚡ ' + sampleText"></div>
</div>
</div>
</div>
</div>
</section>
<!-- Toast Notification for Copying -->
<div class="fixed bottom-8 left-8 z-50 bg-brandLime text-brandBlack border-brutal-thick p-4 font-mono font-black text-xs shadow-brutal" x-show="toastShow" x-transition="">
        ⚡ COPIED HEX CODE TO CLIPBOARD!
    </div>
<!-- SECTION 05: Draggable Before & After Brand Transformation -->
<section class="py-20 px-4 lg:px-12 border-b-4 border-brandBlack bg-white" id="transformation">
<div class="max-w-6xl mx-auto space-y-10">
<div class="text-center space-y-2">
<span class="bg-brandOrange text-white border-brutal px-3 py-1 font-mono text-xs font-bold uppercase">
                    // 05. REBRAND TRANSFORMATION
                </span>
<h2 class="font-display font-black text-4xl sm:text-5xl uppercase">
                    BEFORE vs AFTER REBRAND
                </h2>
<p class="font-mono text-xs font-bold text-gray-700">Drag the central handle left or right to inspect the identity transformation.</p>
</div>
<!-- Draggable Comparison Box -->
<div @mousemove="if(isDragging) sliderPos = Math.max(0, Math.min(100, (($event.clientX - $el.getBoundingClientRect().left) / $el.getBoundingClientRect().width) * 100))" @mouseup="isDragging = false" @touchend="isDragging = false" @touchmove="if(isDragging) sliderPos = Math.max(0, Math.min(100, (($event.touches[0].clientX - $el.getBoundingClientRect().left) / $el.getBoundingClientRect().width) * 100))" class="relative border-brutal-thick overflow-hidden select-none bg-white shadow-brutal-lg h-[360px] md:h-[460px]" x-data="{ sliderPos: 50, isDragging: false }">
<!-- AFTER LAYER (STRIKE Bold Identity) -->
<div class="absolute inset-0 bg-brandOrange p-8 flex flex-col justify-center items-center text-center text-brandBlack">
<span class="bg-brandLime text-brandBlack border-brutal font-mono font-bold text-xs px-3 py-1 mb-4 shadow-brutal-sm">AFTER (STRIKE® BOLD IDENTITY)</span>
<h3 class="font-display font-black text-5xl md:text-7xl tracking-tighter uppercase text-white drop-shadow-[4px_4px_0px_#171717]">
                        ⚡ VELOCITY AIR ⚡
                    </h3>
<p class="font-mono font-bold text-xs md:text-sm max-w-md mt-4 bg-white text-brandBlack border-brutal p-3 shadow-brutal">
                        HIGH-IMPACT SYSTEM • +380% ONLINE CONVERSIONS
                    </p>
</div>
<!-- BEFORE LAYER (Clipped Outdated Template) -->
<div :style="{ width: sliderPos + '%' }" class="absolute inset-0 bg-gray-200 p-8 flex flex-col justify-center items-center text-center text-gray-600 border-r-4 border-brandBlack">
<span class="bg-gray-400 text-black border-2 border-black font-mono font-bold text-xs px-3 py-1 mb-4 whitespace-nowrap">BEFORE (GENERIC TEMPLATE)</span>
<h3 class="font-sans font-normal text-3xl md:text-5xl text-gray-500 whitespace-nowrap">
                        Velocity Logistics Co.
                    </h3>
<p class="font-sans text-xs max-w-xs mt-4 text-gray-400 whitespace-nowrap">
                        Clip-Art Logo • Low Recognition
                    </p>
</div>
<!-- Slider Divider Bar -->
<div :style="{ left: sliderPos + '%' }" @mousedown="isDragging = true" @touchstart="isDragging = true" class="absolute top-0 bottom-0 w-1 bg-brandBlack cursor-ew-resize flex items-center justify-center">
<div class="w-10 h-10 bg-brandLime border-brutal rounded-full flex items-center justify-center font-black text-sm shadow-brutal">
                        ↔
                    </div>
</div>
</div>
</div>
</section>
<!-- SECTION 06: Filterable Portfolio & Case Studies -->
<section class="py-20 px-4 lg:px-12 border-b-4 border-brandBlack bg-brandBg" id="portfolio">
<div class="max-w-7xl mx-auto space-y-10">
<div class="flex flex-col md:flex-row md:items-end justify-between gap-6 border-b-4 border-brandBlack pb-6">
<div>
<span class="bg-brandBlack text-brandLime border-brutal px-3 py-1 font-mono text-xs font-bold uppercase">
                        // 06. SELECTED PROJECTS
                    </span>
<h2 class="font-display font-black text-4xl sm:text-5xl uppercase mt-2">
                        PORTFOLIO SHOWCASE
                    </h2>
</div>
<!-- Portfolio Category Filter Tabs -->
<div class="flex flex-wrap gap-2 font-mono text-xs font-bold">
<button :class="portfolioFilter === 'all' ? 'bg-brandBlack text-brandLime' : 'bg-white text-brandBlack'" @click="portfolioFilter = 'all'" class="btn-brutal px-3 py-1.5">ALL WORK</button>
<button :class="portfolioFilter === 'fnb' ? 'bg-brandBlack text-brandLime' : 'bg-white text-brandBlack'" @click="portfolioFilter = 'fnb'" class="btn-brutal px-3 py-1.5">F&amp;B &amp; PACKAGING</button>
<button :class="portfolioFilter === 'fashion' ? 'bg-brandBlack text-brandLime' : 'bg-white text-brandBlack'" @click="portfolioFilter = 'fashion'" class="btn-brutal px-3 py-1.5">APPAREL &amp; STREETWEAR</button>
<button :class="portfolioFilter === 'tech' ? 'bg-brandBlack text-brandLime' : 'bg-white text-brandBlack'" @click="portfolioFilter = 'tech'" class="btn-brutal px-3 py-1.5">TECH &amp; FINTECH</button>
</div>
</div>
<!-- Portfolio Cards Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
<!-- Project 1 -->
<div class="bg-white border-brutal shadow-brutal overflow-hidden group" x-show="portfolioFilter === 'all' || portfolioFilter === 'fnb'">
<div class="relative overflow-hidden aspect-video border-b-3 border-brandBlack">
<img alt="Energy Drink Packaging" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" src="https://images.unsplash.com/photo-1551024709-8f23befc6f87?auto=format&amp;fit=crop&amp;w=800&amp;q=80"/>
<span class="absolute top-3 left-3 bg-brandLime border-brutal font-mono text-[10px] font-bold px-2 py-0.5">F&amp;B BRANDING</span>
</div>
<div class="p-6 space-y-3">
<h3 class="font-display font-black text-2xl uppercase">NOVA ENERGY DRINK</h3>
<p class="text-xs text-gray-700">Acid-lime visual identity &amp; aluminum packaging design for Gen-Z functional beverage.</p>
<div class="flex items-center justify-between font-mono text-xs font-bold pt-2 border-t-2 border-brandBlack">
<span class="text-brandOrange">+340% RETAIL GROWTH</span>
<button @click="openModal('NOVA ENERGY DRINK', 'F&amp;B Packaging &amp; Brand System', 'Complete visual overhaul resulting in nationwide retail placement in over 1,200 supermarkets within 90 days.')" class="underline hover:bg-brandLime px-1">VIEW BRIEF →</button>
</div>
</div>
</div>
<!-- Project 2 -->
<div class="bg-white border-brutal shadow-brutal overflow-hidden group" x-show="portfolioFilter === 'all' || portfolioFilter === 'fashion'">
<div class="relative overflow-hidden aspect-video border-b-3 border-brandBlack">
<img alt="Streetwear Apparel" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" src="https://images.unsplash.com/photo-1523381210434-271e8be1f52b?auto=format&amp;fit=crop&amp;w=800&amp;q=80"/>
<span class="absolute top-3 left-3 bg-brandOrange text-white border-brutal font-mono text-[10px] font-bold px-2 py-0.5">STREETWEAR</span>
</div>
<div class="p-6 space-y-3">
<h3 class="font-display font-black text-2xl uppercase">CYBERPUNK APPAREL</h3>
<p class="text-xs text-gray-700">Raw brutalist lookbook, bespoke typography suite, and e-commerce web design.</p>
<div class="flex items-center justify-between font-mono text-xs font-bold pt-2 border-t-2 border-brandBlack">
<span class="text-brandOrange">SOLD OUT DROP IN 4 MINS</span>
<button @click="openModal('CYBERPUNK APPAREL', 'Apparel &amp; Digital Identity', 'High-voltage drop campaign architecture that created organic viral hype across social feeds.')" class="underline hover:bg-brandLime px-1">VIEW BRIEF →</button>
</div>
</div>
</div>
<!-- Project 3 -->
<div class="bg-white border-brutal shadow-brutal overflow-hidden group" x-show="portfolioFilter === 'all' || portfolioFilter === 'tech'">
<div class="relative overflow-hidden aspect-video border-b-3 border-brandBlack">
<img alt="Fintech Web Platform" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&amp;fit=crop&amp;w=800&amp;q=80"/>
<span class="absolute top-3 left-3 bg-brandLime border-brutal font-mono text-[10px] font-bold px-2 py-0.5">FINTECH UI</span>
</div>
<div class="p-6 space-y-3">
<h3 class="font-display font-black text-2xl uppercase">KINETIC PAY PLATFORM</h3>
<p class="text-xs text-gray-700">Neo-brutalist financial dashboard branding and mobile design system for web3 gateway.</p>
<div class="flex items-center justify-between font-mono text-xs font-bold pt-2 border-t-2 border-brandBlack">
<span class="text-brandOrange">$14M SERIES A RAISED</span>
<button @click="openModal('KINETIC PAY PLATFORM', 'Fintech Web &amp; Visual System', 'Shifted legacy financial corporate image into a high-trust, modern crypto payment brand.')" class="underline hover:bg-brandLime px-1">VIEW BRIEF →</button>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- SECTION 07: Interactive Quiz Diagnostic -->
<section class="py-20 px-4 lg:px-12 border-b-4 border-brandBlack bg-white" id="quiz">
<div class="max-w-4xl mx-auto bg-brandBg border-brutal-thick p-6 md:p-10 shadow-brutal-lg space-y-8">
<div class="border-b-4 border-brandBlack pb-6">
<span class="bg-brandOrange text-white border-brutal px-3 py-1 font-mono text-xs font-bold uppercase">
                    // 07. INTERACTIVE DIAGNOSTIC
                </span>
<h2 class="font-display font-black text-3xl md:text-4xl uppercase mt-2">
                    BRAND PACKAGE AUDIT QUIZ
                </h2>
<p class="font-mono text-xs font-bold text-gray-700">Answer 3 questions to discover the optimal branding package for your current business stage.</p>
</div>
<div x-data="{ step: 1, quiz: { goal: '', vibe: '', timeframe: '' } }">
<!-- Question 1 -->
<div class="space-y-6" x-show="step === 1">
<h3 class="font-display font-bold text-xl uppercase">1. What is your primary brand milestone right now?</h3>
<div class="grid grid-cols-1 md:grid-cols-3 gap-4 font-mono text-xs font-bold">
<button @click="quiz.goal = 'launch'; step = 2" class="btn-brutal bg-white p-4 text-left hover:bg-brandLime">
                            🚀 NEW PRODUCT LAUNCH
                        </button>
<button @click="quiz.goal = 'rebrand'; step = 2" class="btn-brutal bg-white p-4 text-left hover:bg-brandOrange hover:text-white">
                            ⚡ OUTDATED BRAND OVERHAUL
                        </button>
<button @click="quiz.goal = 'investor'; step = 2" class="btn-brutal bg-white p-4 text-left hover:bg-brandLime">
                            📈 PREPARING FOR FUNDRAISING
                        </button>
</div>
</div>
<!-- Question 2 -->
<div class="space-y-6" x-show="step === 2">
<h3 class="font-display font-bold text-xl uppercase">2. Which aesthetic direction suits your target market?</h3>
<div class="grid grid-cols-1 md:grid-cols-3 gap-4 font-mono text-xs font-bold">
<button @click="quiz.vibe = 'bold'; step = 3" class="btn-brutal bg-white p-4 text-left hover:bg-brandOrange hover:text-white">
                            💥 HIGH-IMPACT NEO-BRUTALIST
                        </button>
<button @click="quiz.vibe = 'luxury'; step = 3" class="btn-brutal bg-white p-4 text-left hover:bg-brandLime">
                            🏛️ CLEAN LUXURY MINIMAL
                        </button>
<button @click="quiz.vibe = 'playful'; step = 3" class="btn-brutal bg-white p-4 text-left hover:bg-brandLime">
                            🎨 ACID PLAYFUL CREATIVE
                        </button>
</div>
</div>
<!-- Question 3 -->
<div class="space-y-6" x-show="step === 3">
<h3 class="font-display font-bold text-xl uppercase">3. What is your target timeline for execution?</h3>
<div class="grid grid-cols-1 md:grid-cols-3 gap-4 font-mono text-xs font-bold">
<button @click="quiz.timeframe = 'rush'; step = 4" class="btn-brutal bg-white p-4 text-left hover:bg-brandLime">
                            ⚡ RUSH (UNDER 3 WEEKS)
                        </button>
<button @click="quiz.timeframe = 'standard'; step = 4" class="btn-brutal bg-white p-4 text-left hover:bg-brandOrange hover:text-white">
                            🎯 STANDARD (4-6 WEEKS)
                        </button>
<button @click="quiz.timeframe = 'enterprise'; step = 4" class="btn-brutal bg-white p-4 text-left hover:bg-brandLime">
                            🏛️ FULL ECOSYSTEM (8+ WEEKS)
                        </button>
</div>
</div>
<!-- Quiz Recommendation Box -->
<div class="bg-brandBlack text-brandWhite border-brutal p-6 space-y-4" x-show="step === 4">
<div class="flex items-center gap-2 text-brandLime font-mono text-xs font-bold">
<i class="fa-solid fa-circle-check text-brandOrange"></i>
<span>RECOMMENDED PACKAGE MATCH</span>
</div>
<h3 class="font-display font-black text-3xl text-brandLime uppercase">
                        THE COMPLETE REBRAND SLAP PACKAGE
                    </h3>
<p class="font-sans text-xs text-gray-300 leading-relaxed">
                        Based on your selections (<span x-text="quiz.goal"></span> / <span x-text="quiz.vibe"></span> vibe), your brand requires a full identity system, typography architecture, packaging dielines, and web UI toolkit.
                    </p>
<div class="pt-2 flex flex-wrap gap-4 font-mono text-xs font-bold">
<a class="btn-brutal bg-brandOrange text-white px-4 py-2" href="#brief">
                            APPLY THIS IN BRIEF →
                        </a>
<button @click="step = 1" class="btn-brutal bg-white text-brandBlack px-4 py-2">
                            RESET AUDIT ↺
                        </button>
</div>
</div>
</div>
</div>
</section>
<!-- SECTION 08: Pricing & Packages -->
<section class="py-20 px-4 lg:px-12 border-b-4 border-brandBlack bg-brandBg" id="pricing">
<div class="max-w-7xl mx-auto space-y-12">
<div class="text-center space-y-2 max-w-xl mx-auto">
<span class="bg-brandBlack text-brandLime border-brutal px-3 py-1 font-mono text-xs font-bold uppercase">
                    // 08. TRANSPARENT INVESTMENT
                </span>
<h2 class="font-display font-black text-4xl sm:text-5xl uppercase">
                    CREATIVE PACKAGES
                </h2>
<p class="font-mono text-xs font-bold text-gray-700">Fixed scope packages designed for rapid execution and maximum return on branding.</p>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
<!-- Package 1 -->
<div class="bg-white border-brutal-thick p-8 shadow-brutal flex flex-col justify-between space-y-6">
<div class="space-y-4">
<span class="bg-brandBg border-brutal font-mono text-xs font-bold px-2 py-1">STARTUP</span>
<h3 class="font-display font-black text-3xl uppercase">ESSENTIALS</h3>
<div class="font-mono font-black text-3xl">$2,400 <span class="text-xs font-normal text-gray-600">/ FLAT</span></div>
<ul class="font-mono text-xs space-y-2 border-t-2 border-brandBlack pt-4 font-bold">
<li>✓ Primary Logo &amp; Mark System</li>
<li>✓ Core Color &amp; Palette Tokens</li>
<li>✓ Typography Pairings</li>
<li>✓ Mini Style Guideline Sheet</li>
<li>✓ Vector Source Files (.AI, .SVG)</li>
</ul>
</div>
<a class="btn-brutal bg-white text-brandBlack font-mono font-bold text-xs text-center py-3 w-full block" href="#brief">
                        SELECT ESSENTIALS
                    </a>
</div>
<!-- Package 2 (Featured) -->
<div class="bg-brandOrange text-white border-brutal-thick p-8 shadow-brutal-lg flex flex-col justify-between space-y-6 relative -rotate-1">
<span class="absolute -top-3.5 right-4 bg-brandLime text-brandBlack border-brutal font-mono text-xs font-black px-3 py-0.5">MOST POPULAR</span>
<div class="space-y-4">
<span class="bg-brandBlack text-brandLime border-brutal font-mono text-xs font-bold px-2 py-1">COMPLETE OVERHAUL</span>
<h3 class="font-display font-black text-3xl uppercase">THE REBRAND</h3>
<div class="font-mono font-black text-3xl text-brandBlack">$4,800 <span class="text-xs font-normal text-gray-900">/ FLAT</span></div>
<ul class="font-mono text-xs space-y-2 border-t-2 border-brandBlack pt-4 font-bold text-brandBlack">
<li>✓ Everything in Essentials</li>
<li>✓ Brand Positioning &amp; Strategy</li>
<li>✓ 40+ Page Master Brand Book</li>
<li>✓ Social Media Visual Kit (15 Templates)</li>
<li>✓ Packaging or Stationary Dielines</li>
</ul>
</div>
<a class="btn-brutal bg-brandLime text-brandBlack font-mono font-bold text-xs text-center py-3 w-full block" href="#brief">
                        GET THE REBRAND →
                    </a>
</div>
<!-- Package 3 -->
<div class="bg-white border-brutal-thick p-8 shadow-brutal flex flex-col justify-between space-y-6">
<div class="space-y-4">
<span class="bg-brandBlack text-brandLime border-brutal font-mono text-xs font-bold px-2 py-1">ENTERPRISE</span>
<h3 class="font-display font-black text-3xl uppercase">ECOSYSTEM</h3>
<div class="font-mono font-black text-3xl">$8,500+ <span class="text-xs font-normal text-gray-600">/ FLAT</span></div>
<ul class="font-mono text-xs space-y-2 border-t-2 border-brandBlack pt-4 font-bold">
<li>✓ Full Multi-Platform Strategy</li>
<li>✓ Bespoke Brutalist Website UI/UX</li>
<li>✓ 3D Packaging Render Suite</li>
<li>✓ Launch Campaign Art Direction</li>
<li>✓ Dedicated Creative Director</li>
</ul>
</div>
<a class="btn-brutal bg-white text-brandBlack font-mono font-bold text-xs text-center py-3 w-full block" href="#brief">
                        REQUEST ENTERPRISE
                    </a>
</div>
</div>
</div>
</section>
<!-- SECTION 09: Project Brief Generator & Form -->
<section class="py-20 px-4 lg:px-12 border-b-4 border-brandBlack bg-white" id="brief">
<div class="max-w-4xl mx-auto bg-brandBg border-brutal-thick p-6 md:p-10 shadow-brutal-lg space-y-6">
    <label class="block cursor-pointer">
        <i class="fa-solid fa-cloud-arrow-up text-2xl text-brandOrange"></i>
        <p class="font-bold mt-2">DROP FILES OR CLICK TO UPLOAD PDF / MOODBOARD / ZIP</p>
        <p class="text-[10px] text-gray-500">PDF, PNG, JPG, ZIP · pilih satu atau beberapa file referensi</p>
        <input @change="handleFiles($event)" accept=".pdf,.png,.jpg,.jpeg,.zip" class="block w-full mt-3 text-xs" multiple type="file"/>
    </label>
    <div class="border-t-2 border-brandBlack/20 pt-4 space-y-3">
        <div x-show="selectedFiles.length" class="bg-white border-brutal p-3">
            <p class="font-mono text-[10px] font-bold uppercase mb-2 text-brandBlack">File terpilih</p>
            <ul class="font-mono text-xs space-y-1" >
                <template x-for="(file, index) in selectedFiles" :key="index">
                    <li class="flex items-start gap-2"><i class="fa-solid fa-paperclip text-brandOrange mt-0.5"></i><span x-text="file"></span></li>
                </template>
            </ul>
        </div>
        <button type="button" @click.stop.prevent="submitBrief()" class="btn-brutal bg-brandOrange text-white font-mono font-black text-sm px-6 py-4 w-full flex items-center justify-center gap-3 hover:bg-brandLime hover:text-brandBlack transition-colors">
            <i class="fa-brands fa-whatsapp text-xl"></i> KIRIM BRIEF VIA WHATSAPP <i class="fa-solid fa-arrow-up-right-from-square"></i>
        </button>
        <p class="font-mono text-[10px] leading-relaxed text-gray-600"><strong>CATATAN:</strong> Tombol ini akan mengarahkan halaman ke WhatsApp dengan ringkasan brief dan nama file. Untuk mengirim file aslinya, lampirkan kembali file yang dipilih di chat WhatsApp sebelum menekan Send. File belum diunggah ke server website.</p>
    </div>
</div>
</section>
<!-- FOOTER -->
<footer class="bg-brandBlack text-white border-t-4 border-brandBlack px-4 lg:px-12 py-16 font-mono text-xs">
<div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-12 gap-10">
<div class="md:col-span-6 space-y-4">
<div class="bg-brandOrange text-white border-brutal font-display font-black text-2xl px-3 py-1 inline-block">
                    STUDIO BOLD®
                </div>
<p class="text-gray-400 max-w-sm font-sans text-xs leading-relaxed">
                    Independent creative agency crafting unboring brand identities, packaging, and high-impact digital experiences for ambitious global companies.
                </p>
<div class="text-brandLime space-y-1">
<p>📍 JAKARTA • BALI • SINGAPORE</p>
<p>📧 HELLO@STUDIO-BOLD.COM</p>
</div>
</div>
<div class="md:col-span-3 space-y-3 font-bold">
<div class="text-brandLime underline mb-2">PAGES</div>
<p><a class="hover:text-brandOrange" href="#services">SERVICES</a></p>
<p><a class="hover:text-brandOrange" href="#portfolio">PORTFOLIO</a></p>
<p><a class="hover:text-brandOrange" href="#pricing">PACKAGES</a></p>
<p><a class="hover:text-brandOrange" href="#brief">PROJECT BRIEF</a></p>
</div>
<div class="md:col-span-3 space-y-3 font-bold">
<div class="text-brandLime underline mb-2">SOCIAL</div>
<p><a class="hover:text-brandOrange" href="#">INSTAGRAM ↗</a></p>
<p><a class="hover:text-brandOrange" href="#">BEHANCE ↗</a></p>
<p><a class="hover:text-brandOrange" href="#">DRIBBBLE ↗</a></p>
<p><a class="hover:text-brandOrange" href="#">LINKEDIN ↗</a></p>
</div>
</div>
<div class="max-w-7xl mx-auto border-t border-gray-800 mt-12 pt-6 flex flex-col md:flex-row justify-between items-center text-[10px] text-gray-500 gap-4">
<span>© 2026 STUDIO BOLD® CREATIVE AGENCY. ALL RIGHTS RESERVED.</span>
<span>HIGH-IMPACT DESIGN ARCHITECTURE.</span>
</div>
</footer>
<!-- DUAL FLOATING BOTTOM-RIGHT WIDGETS -->
<div class="fixed bottom-6 right-6 z-50 flex items-center gap-3">
<!-- 1. WhatsApp Button -->
<a class="btn-brutal bg-[#25D366] text-brandBlack w-14 h-14 flex items-center justify-center text-2xl shadow-brutal hover:scale-105 transition-transform" href="https://wa.me/6281234567890?text=Halo%20Studio%20Bold!%20Saya%20ingin%20konsultasi%20branding." target="_blank" title="Contact on WhatsApp">
<i class="fa-brands fa-whatsapp"></i>
</a>
<!-- 2. AI Chatbot Trigger (Rotated Acid Shape with Glitch Burst) -->
<div class="relative" x-data="{ chatOpen: false }">
<div class="absolute -top-2 -right-2 bg-brandOrange text-white font-mono text-[9px] font-bold px-1.5 py-0.5 border-brutal z-10 animate-bounce">
                AI 24/7
            </div>
<button @click="chatOpen = !chatOpen" class="glitch-pulse btn-brutal bg-brandLime text-brandBlack w-16 h-16 flex items-center justify-center text-2xl shadow-brutal-orange relative overflow-hidden group">
<div class="absolute inset-0 bg-brandLime animate-spin-slow opacity-30 border border-dashed border-brandBlack pointer-events-none"></div>
<span class="absolute -top-3 -left-3 text-brandOrange text-xl sticker-burst pointer-events-none">✳</span><span class="absolute -bottom-2 -right-2 text-brandBlack text-lg acid-orbit pointer-events-none">✦</span><span class="absolute top-1 right-1 text-[9px] font-black font-mono text-brandOrange glitch-word pointer-events-none">BOLD!</span>
<i :class="chatOpen ? 'fa-xmark text-2xl' : 'fa-robot text-2xl group-hover:rotate-12 transition-transform'" class="fa-solid"></i>
</button>
<!-- Chat Drawer Window -->
<div class="fixed bottom-24 right-6 w-[90vw] sm:w-[360px] bg-brandBg border-brutal-thick shadow-brutal-lg z-50 font-mono flex flex-col h-[460px]" x-show="chatOpen" x-transition="">
<div class="bg-brandBlack text-brandLime p-3 border-b-4 border-brandBlack flex justify-between items-center text-xs font-bold">
<div class="flex items-center gap-2">
<span class="w-2 h-2 rounded-full bg-brandOrange animate-ping"></span>
<span>BRANDBOT AI assistant</span>
</div>
<button @click="chatOpen = false" class="text-white hover:text-brandOrange">✕</button>
</div>
<div class="flex-1 p-4 overflow-y-auto space-y-3 text-xs" id="chatWindow">
<div class="bg-white border-brutal p-3 shadow-brutal max-w-[85%]">
<span class="bg-brandLime text-black font-bold px-1 text-[10px]">BRANDBOT:</span>
<p class="mt-1 font-sans font-medium text-gray-800">⚡ Yo! Ready to elevate your visual identity? Ask me about our branding process, pricing, or custom packages!</p>
</div>
<template :key="i" x-for="(m, i) in messages">
<div :class="m.role === 'user' ? 'ml-auto bg-brandOrange text-white' : 'bg-white text-brandBlack'" class="border-brutal p-3 shadow-brutal max-w-[85%] space-y-1">
<span class="font-bold text-[10px] uppercase" x-text="m.role === 'user' ? 'YOU:' : 'BRANDBOT:'"></span>
<p class="font-sans font-medium text-xs leading-relaxed" x-text="m.text"></p>
</div>
</template>
</div>
<form @submit.prevent="sendMessage()" class="p-3 border-t-4 border-brandBlack bg-white flex gap-2">
<input class="flex-1 bg-brandBg border-brutal p-2 text-xs focus:bg-brandLime focus:outline-none" placeholder="Ask about branding..." type="text" x-model="chatInput"/>
<button class="btn-brutal bg-brandOrange text-white px-3 py-2 text-xs font-bold" type="submit">
<i class="fa-solid fa-paper-plane"></i>
</button>
</form>
</div>
</div>
</div>
<!-- Case Modal -->
<div class="fixed inset-0 z-50 bg-brandBlack/80 flex items-center justify-center p-4" x-show="modalOpen" x-transition="">
<div class="bg-brandBg border-brutal-thick p-6 md:p-8 max-w-xl w-full shadow-brutal-lg space-y-4 font-mono">
<div class="flex justify-between items-start border-b-4 border-brandBlack pb-3">
<div>
<span class="bg-brandLime text-black px-2 py-0.5 text-xs font-bold" x-text="mCategory"></span>
<h3 class="font-display font-black text-2xl uppercase mt-1" x-text="mTitle"></h3>
</div>
<button @click="modalOpen = false" class="btn-brutal bg-brandOrange text-white px-3 py-1 font-bold text-xs">✕</button>
</div>
<p class="font-sans text-xs text-gray-800 leading-relaxed" x-text="mDesc"></p>
<button @click="modalOpen = false" class="btn-brutal bg-brandBlack text-brandLime w-full py-3 font-bold text-xs">
                CLOSE CASE PREVIEW
            </button>
</div>
</div>
<!-- App data must load before Alpine initializes. Keep this order. -->
<script defer src="{{ asset('js/website-bisnis/templates/professional-service/branding-creative/strike/strike.js') }}"></script>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>