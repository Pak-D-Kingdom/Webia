<!DOCTYPE html>

<html class="scroll-smooth" lang="id">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Artistic Terracotta — Interior Design Studio</title>
    <!-- Tailwind CSS CDN -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        terra: {
                            50: '#FDF8F5',
                            100: '#F5E6D3',
                            200: '#E8D5C4',
                            300: '#D97706',
                            400: '#EA580C',
                            500: '#C2410C',
                            600: '#9A3412',
                            700: '#7C2D12',
                            800: '#451A03',
                            900: '#290F0B',
                            950: '#1C0A08',
                        },
                        copper: {
                            light: '#E0A96D',
                            DEFAULT: '#C87D55',
                            dark: '#9C5835'
                        }
                    },
                    fontFamily: {
                        cinzel: ['Cinzel', 'serif'],
                        serif: ['Playfair Display', 'serif'],
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FontAwesome Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link
        href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;500;600;700;800&amp;family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&amp;family=Plus+Jakarta+Sans:wght@300;400;500;600;700&amp;display=swap"
        rel="stylesheet" />
    <link
        href="{{ asset('css/website-bisnis/templates/interior-architecture/interior-design-studio/artistic-terracotta/artistic-terracotta.css') }}"
        rel="stylesheet" />
</head>

<body class="bg-terra-950 text-terra-100 antialiased selection:bg-terra-600 selection:text-terra-100">
    <!-- 1. Topbar & Announcement Marquee -->
    <div class="bg-terra-900 border-b border-terra-700/40 text-xs py-2 px-4">
        <div class="max-w-7xl mx-auto flex flex-wrap justify-between items-center gap-2">
            <div class="flex items-center space-x-6 text-terra-200/80">
                <span><i class="fa-solid fa-location-dot text-terra-500 mr-2"></i>Jakarta • Bali • Singapore</span>
                <span class="hidden md:inline"><i
                        class="fa-solid fa-envelope text-terra-500 mr-2"></i>contact@terracottastudio.com</span>
                <span class="hidden lg:inline"><i class="fa-solid fa-phone text-terra-500 mr-2"></i>+62 (021)
                    8062-8888</span>
            </div>
            <div
                class="overflow-hidden whitespace-nowrap max-w-xs md:max-w-md lg:max-w-xl text-copper-light font-cinzel text-[11px] tracking-wider">
                <div class="inline-block animate-marquee">
                    ✦ PREMIER WINNER: LUXURY ARCHITECTURE AWARDS 2026 ✦ PRIVATE CONSULTATIONS NOW OPEN FOR Q3/Q4 ✦
                </div>
            </div>
        </div>
    </div>
    <!-- 2. Sticky Navbar with Logo & Navigation -->
    <nav class="sticky top-0 z-40 glass-terra transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Logo -->
                <a class="flex items-center space-x-3 group" href="#">
                    <div
                        class="w-10 h-10 rounded-lg bg-gradient-to-br from-terra-600 to-terra-800 border border-copper-light/40 flex items-center justify-center shadow-lg group-hover:border-terra-400 transition-all">
                        <span class="font-cinzel text-xl font-bold text-terra-100">T</span>
                    </div>
                    <div class="flex flex-col">
                        <span
                            class="font-cinzel text-xl font-bold tracking-widest text-terra-100 group-hover:text-copper-light transition-colors">TERRACOTTA</span>
                        <span class="text-[9px] tracking-[0.3em] text-terra-300/80 uppercase">Architecture &amp;
                            Interior</span>
                    </div>
                </a>
                <!-- Desktop Nav Links -->
                <div class="hidden lg:flex items-center space-x-8 text-sm font-medium tracking-wide">
                    <a class="hover:text-copper-light transition-colors relative py-1 after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-0 after:h-[2px] after:bg-terra-500 hover:after:w-full after:transition-all"
                        href="#services">Services</a>
                    <a class="hover:text-copper-light transition-colors relative py-1 after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-0 after:h-[2px] after:bg-terra-500 hover:after:w-full after:transition-all"
                        href="#styles">Design Styles</a>
                    <a class="hover:text-copper-light transition-colors relative py-1 after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-0 after:h-[2px] after:bg-terra-500 hover:after:w-full after:transition-all"
                        href="#portfolio">Portfolio</a>
                    <a class="hover:text-copper-light transition-colors relative py-1 after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-0 after:h-[2px] after:bg-terra-500 hover:after:w-full after:transition-all"
                        href="#transformation">Before/After</a>
                    <a class="hover:text-copper-light transition-colors relative py-1 after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-0 after:h-[2px] after:bg-terra-500 hover:after:w-full after:transition-all"
                        href="#packages">Rates</a>
                    <a class="hover:text-copper-light transition-colors relative py-1 after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-0 after:h-[2px] after:bg-terra-500 hover:after:w-full after:transition-all"
                        href="#swatches">Materials</a>
                    <a class="hover:text-copper-light transition-colors relative py-1 after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-0 after:h-[2px] after:bg-terra-500 hover:after:w-full after:transition-all"
                        href="#faq">FAQ</a>
                </div>
                <!-- CTA Button & Mobile Trigger -->
                <div class="flex items-center space-x-4">
                    <a class="hidden sm:inline-flex items-center justify-center px-5 py-2.5 rounded-full text-xs font-semibold tracking-wider uppercase bg-gradient-to-r from-terra-700 via-terra-600 to-copper-dark hover:from-terra-600 hover:to-terra-500 text-terra-100 border border-copper-light/30 shadow-lg hover:shadow-terra-600/30 transition-all duration-300"
                        href="#booking">
                        Book Consultation
                    </a>
                    <button aria-label="Toggle Menu" class="lg:hidden text-terra-200 hover:text-terra-100 p-2"
                        id="mobile-menu-btn">
                        <i class="fa-solid fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>
        <!-- Mobile Menu Dropdown -->
        <div class="hidden lg:hidden border-t border-terra-800 bg-terra-950/95 px-4 pt-4 pb-6 space-y-3 font-medium text-sm"
            id="mobile-menu">
            <a class="block py-2 text-terra-200 hover:text-copper-light" href="#services">Services</a>
            <a class="block py-2 text-terra-200 hover:text-copper-light" href="#styles">Design Styles</a>
            <a class="block py-2 text-terra-200 hover:text-copper-light" href="#portfolio">Portfolio</a>
            <a class="block py-2 text-terra-200 hover:text-copper-light" href="#transformation">Before / After
                Gallery</a>
            <a class="block py-2 text-terra-200 hover:text-copper-light" href="#packages">Packages &amp; Pricing</a>
            <a class="block py-2 text-terra-200 hover:text-copper-light" href="#process">Design Process</a>
            <a class="block py-2 text-terra-200 hover:text-copper-light" href="#swatches">Material Swatches</a>
            <a class="block py-2 text-terra-400 font-semibold" href="#booking">Book Studio Consultation</a>
        </div>
    </nav>
    <!-- 3. Hero Banner with Stats Counter & CTA -->
    <section class="relative min-h-[90vh] flex items-center justify-center overflow-hidden py-20 px-4">
        <!-- Deep Atmospheric Background Image Overlay -->
        <div class="absolute inset-0 z-0">
            <img alt="Atmospheric Luxury Terracotta Interior"
                class="w-full h-full object-cover opacity-25 filter brightness-75 contrast-125 scale-105 transform hover:scale-100 transition-transform duration-10000"
                onerror="this.src='https://placehold.co/1920x1080/290F0B/E8D5C4?text=Terracotta+Interior'"
                src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&amp;w=2070&amp;auto=format&amp;fit=crop" />
            <div class="absolute inset-0 bg-gradient-to-t from-terra-950 via-terra-950/80 to-terra-900/60"></div>
            <div
                class="absolute inset-0 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-terra-700/20 via-transparent to-transparent">
            </div>
        </div>
        <div class="relative z-10 max-w-5xl mx-auto text-center space-y-8">
            <div
                class="inline-flex items-center space-x-2 px-4 py-1.5 rounded-full glass-card border border-copper-light/30 text-xs text-copper-light font-cinzel tracking-widest uppercase">
                <span class="w-2 h-2 rounded-full bg-terra-500 animate-pulse"></span>
                <span>Crafting Earth-Inspired Architectural Mastery</span>
            </div>
            <h1
                class="font-cinzel text-4xl sm:text-6xl md:text-7xl font-bold leading-tight tracking-wide text-terra-100">
                Sculpting Warmth &amp; <br />
                <span class="copper-gradient-text text-glow italic font-serif">Timeless Atmosphere</span>
            </h1>
            <p class="max-w-2xl mx-auto text-terra-200/90 text-base sm:text-lg font-light leading-relaxed">
                We merge earthy organic terracotta hues, tactile natural materials, and bespoke interior architecture to
                design high-end sanctuaries that resonate with soul, warmth, and refined elegance.
            </p>
            <!-- CTA Action Buttons -->
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4 pt-4">
                <a class="w-full sm:w-auto px-8 py-4 rounded-full font-cinzel text-xs tracking-widest font-semibold uppercase bg-gradient-to-r from-terra-600 via-terra-700 to-terra-800 hover:from-terra-500 hover:to-terra-600 text-terra-100 border border-copper-light/40 shadow-xl copper-glow transition-all duration-300 transform hover:-translate-y-0.5"
                    href="#portfolio">
                    Explore Portfolio
                </a>
                <a class="w-full sm:w-auto px-8 py-4 rounded-full font-cinzel text-xs tracking-widest font-semibold uppercase glass-card hover:bg-terra-900/80 text-terra-200 border border-terra-700/60 hover:border-copper-light/50 transition-all duration-300"
                    href="#booking">
                    Schedule Private Consultation
                </a>
            </div>
            <!-- Stats Counter Grid -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 sm:gap-6 pt-12 max-w-4xl mx-auto">
                <div class="glass-card p-4 sm:p-6 rounded-2xl text-center border border-copper-light/15">
                    <div class="font-cinzel text-3xl sm:text-4xl font-bold copper-gradient-text" id="stat-1">180+
                    </div>
                    <div class="text-xs text-terra-200/70 mt-1 uppercase tracking-wider">Completed Projects</div>
                </div>
                <div class="glass-card p-4 sm:p-6 rounded-2xl text-center border border-copper-light/15">
                    <div class="font-cinzel text-3xl sm:text-4xl font-bold copper-gradient-text" id="stat-2">14
                    </div>
                    <div class="text-xs text-terra-200/70 mt-1 uppercase tracking-wider">Design Awards</div>
                </div>
                <div class="glass-card p-4 sm:p-6 rounded-2xl text-center border border-copper-light/15">
                    <div class="font-cinzel text-3xl sm:text-4xl font-bold copper-gradient-text" id="stat-3">99%
                    </div>
                    <div class="text-xs text-terra-200/70 mt-1 uppercase tracking-wider">Client Satisfaction</div>
                </div>
                <div class="glass-card p-4 sm:p-6 rounded-2xl text-center border border-copper-light/15">
                    <div class="font-cinzel text-3xl sm:text-4xl font-bold copper-gradient-text" id="stat-4">12 Yrs
                    </div>
                    <div class="text-xs text-terra-200/70 mt-1 uppercase tracking-wider">Architectural Expertise</div>
                </div>
            </div>
        </div>
    </section>
    <!-- 4. Services Grid Section -->
    <section class="py-24 px-4 max-w-7xl mx-auto border-t border-terra-900" id="services">
        <div class="text-center max-w-3xl mx-auto mb-16 space-y-3">
            <span class="text-xs font-cinzel text-copper-light tracking-widest uppercase">Bespoke Offerings</span>
            <h2 class="text-3xl sm:text-5xl font-cinzel font-bold text-terra-100">Architectural &amp; Design Services
            </h2>
            <div class="w-16 h-0.5 bg-gradient-to-r from-terra-600 via-copper-light to-terra-600 mx-auto mt-4"></div>
            <p class="text-terra-200/80 text-sm sm:text-base pt-2">Comprehensive design execution tailored to high-end
                residential estates, commercial hubs, and luxury spaces.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Service Item 1 -->
            <div
                class="glass-card p-8 rounded-2xl space-y-4 hover:border-copper-light/50 transition-all duration-300 group hover:-translate-y-1">
                <div
                    class="w-14 h-14 rounded-xl bg-terra-900 border border-terra-700/50 flex items-center justify-center text-copper-light text-2xl group-hover:bg-terra-700 group-hover:text-terra-100 transition-all">
                    <i class="fa-solid fa-house-chimney-window"></i>
                </div>
                <h3
                    class="font-cinzel text-xl font-bold text-terra-100 group-hover:text-copper-light transition-colors">
                    Residential Architecture</h3>
                <p class="text-terra-200/70 text-sm leading-relaxed">Full-scale luxury home architecture, spatial
                    planning, and structural artistic direction infused with warm natural elements.</p>
                <ul class="text-xs text-terra-200/60 space-y-2 pt-2">
                    <li class="flex items-center"><i class="fa-solid fa-circle-check text-terra-500 mr-2"></i>Custom
                        Estate Design</li>
                    <li class="flex items-center"><i class="fa-solid fa-circle-check text-terra-500 mr-2"></i>Spatial
                        Layout Optimization</li>
                </ul>
            </div>
            <!-- Service Item 2 -->
            <div
                class="glass-card p-8 rounded-2xl space-y-4 hover:border-copper-light/50 transition-all duration-300 group hover:-translate-y-1">
                <div
                    class="w-14 h-14 rounded-xl bg-terra-900 border border-terra-700/50 flex items-center justify-center text-copper-light text-2xl group-hover:bg-terra-700 group-hover:text-terra-100 transition-all">
                    <i class="fa-solid fa-building-user"></i>
                </div>
                <h3
                    class="font-cinzel text-xl font-bold text-terra-100 group-hover:text-copper-light transition-colors">
                    Commercial &amp; Hospitality</h3>
                <p class="text-terra-200/70 text-sm leading-relaxed">Artistic interiors for boutique hotels, fine
                    dining, high-end cafes, and executive suites designed to evoke rich sensory atmospheres.</p>
                <ul class="text-xs text-terra-200/60 space-y-2 pt-2">
                    <li class="flex items-center"><i class="fa-solid fa-circle-check text-terra-500 mr-2"></i>Brand
                        Architecture Alignment</li>
                    <li class="flex items-center"><i class="fa-solid fa-circle-check text-terra-500 mr-2"></i>Acoustic
                        &amp; Lighting Design</li>
                </ul>
            </div>
            <!-- Service Item 3 -->
            <div
                class="glass-card p-8 rounded-2xl space-y-4 hover:border-copper-light/50 transition-all duration-300 group hover:-translate-y-1">
                <div
                    class="w-14 h-14 rounded-xl bg-terra-900 border border-terra-700/50 flex items-center justify-center text-copper-light text-2xl group-hover:bg-terra-700 group-hover:text-terra-100 transition-all">
                    <i class="fa-solid fa-paint-roller"></i>
                </div>
                <h3
                    class="font-cinzel text-xl font-bold text-terra-100 group-hover:text-copper-light transition-colors">
                    Full Space Renovation</h3>
                <p class="text-terra-200/70 text-sm leading-relaxed">Complete structural and cosmetic overhauls
                    transforming outdated premises into mood-lit, textured terracotta havens.</p>
                <ul class="text-xs text-terra-200/60 space-y-2 pt-2">
                    <li class="flex items-center"><i class="fa-solid fa-circle-check text-terra-500 mr-2"></i>Historic
                        &amp; Modern Refurbishment</li>
                    <li class="flex items-center"><i
                            class="fa-solid fa-circle-check text-terra-500 mr-2"></i>End-to-End Project Management</li>
                </ul>
            </div>
            <!-- Service Item 4 -->
            <div
                class="glass-card p-8 rounded-2xl space-y-4 hover:border-copper-light/50 transition-all duration-300 group hover:-translate-y-1">
                <div
                    class="w-14 h-14 rounded-xl bg-terra-900 border border-terra-700/50 flex items-center justify-center text-copper-light text-2xl group-hover:bg-terra-700 group-hover:text-terra-100 transition-all">
                    <i class="fa-solid fa-couch"></i>
                </div>
                <h3
                    class="font-cinzel text-xl font-bold text-terra-100 group-hover:text-copper-light transition-colors">
                    Custom Terracotta Furniture</h3>
                <p class="text-terra-200/70 text-sm leading-relaxed">Handcrafted bespoke furniture, raw clay fixtures,
                    micro-cement countertops, and brass-trimmed joinery designed in-house.</p>
                <ul class="text-xs text-terra-200/60 space-y-2 pt-2">
                    <li class="flex items-center"><i class="fa-solid fa-circle-check text-terra-500 mr-2"></i>Bespoke
                        Joinery &amp; Cabinetry</li>
                    <li class="flex items-center"><i
                            class="fa-solid fa-circle-check text-terra-500 mr-2"></i>Hand-molded Clay Sculpting</li>
                </ul>
            </div>
            <!-- Service Item 5 -->
            <div
                class="glass-card p-8 rounded-2xl space-y-4 hover:border-copper-light/50 transition-all duration-300 group hover:-translate-y-1">
                <div
                    class="w-14 h-14 rounded-xl bg-terra-900 border border-terra-700/50 flex items-center justify-center text-copper-light text-2xl group-hover:bg-terra-700 group-hover:text-terra-100 transition-all">
                    <i class="fa-solid fa-vr-cardboard"></i>
                </div>
                <h3
                    class="font-cinzel text-xl font-bold text-terra-100 group-hover:text-copper-light transition-colors">
                    3D VR Visualizations</h3>
                <p class="text-terra-200/70 text-sm leading-relaxed">Photorealistic 3D renders, ray-traced lighting
                    simulations, and immersive VR walkthroughs prior to physical construction.</p>
                <ul class="text-xs text-terra-200/60 space-y-2 pt-2">
                    <li class="flex items-center"><i class="fa-solid fa-circle-check text-terra-500 mr-2"></i>4K
                        Cinematic Renderings</li>
                    <li class="flex items-center"><i class="fa-solid fa-circle-check text-terra-500 mr-2"></i>Virtual
                        Reality Walkthroughs</li>
                </ul>
            </div>
            <!-- Service Item 6 -->
            <div
                class="glass-card p-8 rounded-2xl space-y-4 hover:border-copper-light/50 transition-all duration-300 group hover:-translate-y-1">
                <div
                    class="w-14 h-14 rounded-xl bg-terra-900 border border-terra-700/50 flex items-center justify-center text-copper-light text-2xl group-hover:bg-terra-700 group-hover:text-terra-100 transition-all">
                    <i class="fa-solid fa-lightbulb"></i>
                </div>
                <h3
                    class="font-cinzel text-xl font-bold text-terra-100 group-hover:text-copper-light transition-colors">
                    Lighting &amp; Atmosphere Curation</h3>
                <p class="text-terra-200/70 text-sm leading-relaxed">Custom warm LED ambient strip integration,
                    architectural spotlights, and shadow styling designed to elevate warm dark tones.</p>
                <ul class="text-xs text-terra-200/60 space-y-2 pt-2">
                    <li class="flex items-center"><i class="fa-solid fa-circle-check text-terra-500 mr-2"></i>Smart
                        Mood Lighting Controls</li>
                    <li class="flex items-center"><i
                            class="fa-solid fa-circle-check text-terra-500 mr-2"></i>Architectural Shadow Artistry</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- 5. Interactive Design Style Showcase (Tabs) -->
    <section class="py-24 px-4 bg-terra-900/40 border-t border-terra-900" id="styles">
        <div class="max-w-7xl mx-auto">
            <div class="text-center max-w-3xl mx-auto mb-12 space-y-3">
                <span class="text-xs font-cinzel text-copper-light tracking-widest uppercase">Design Aesthetics</span>
                <h2 class="text-3xl sm:text-5xl font-cinzel font-bold text-terra-100">Curated Artistic Directions</h2>
                <p class="text-terra-200/80 text-sm sm:text-base">Click below to explore our core signature design
                    aesthetics.</p>
            </div>
            <!-- Style Navigation Tabs -->
            <div class="flex flex-wrap justify-center gap-3 mb-10" id="style-tabs">
                <button
                    class="style-tab active px-6 py-3 rounded-full text-xs font-cinzel font-semibold tracking-wider transition-all bg-terra-700 text-terra-100 border border-copper-light/40"
                    data-tab="japandi" onclick="switchStyle('japandi')">
                    Terracotta Japandi
                </button>
                <button
                    class="style-tab px-6 py-3 rounded-full text-xs font-cinzel font-semibold tracking-wider transition-all bg-terra-950 text-terra-300 border border-terra-800 hover:border-terra-600"
                    data-tab="organic" onclick="switchStyle('organic')">
                    Modern Organic Earth
                </button>
                <button
                    class="style-tab px-6 py-3 rounded-full text-xs font-cinzel font-semibold tracking-wider transition-all bg-terra-950 text-terra-300 border border-terra-800 hover:border-terra-600"
                    data-tab="mediterranean" onclick="switchStyle('mediterranean')">
                    Mediterranean Terracotta
                </button>
                <button
                    class="style-tab px-6 py-3 rounded-full text-xs font-cinzel font-semibold tracking-wider transition-all bg-terra-950 text-terra-300 border border-terra-800 hover:border-terra-600"
                    data-tab="industrial" onclick="switchStyle('industrial')">
                    Industrial Luxe
                </button>
                <button
                    class="style-tab px-6 py-3 rounded-full text-xs font-cinzel font-semibold tracking-wider transition-all bg-terra-950 text-terra-300 border border-terra-800 hover:border-terra-600"
                    data-tab="minimalist" onclick="switchStyle('minimalist')">
                    Warm Mood Minimalist
                </button>
            </div>
            <!-- Style Showcase Content Display -->
            <div class="glass-card rounded-3xl p-6 md:p-10 border border-copper-light/20 relative overflow-hidden"
                id="style-content">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                    <div class="space-y-6">
                        <span class="text-xs font-cinzel tracking-widest text-copper-light uppercase"
                            id="style-tag">Japanese Simplicity × Clay Warmth</span>
                        <h3 class="text-3xl font-cinzel font-bold text-terra-100" id="style-title">Terracotta Japandi
                            Sanctuary</h3>
                        <p class="text-terra-200/80 text-sm leading-relaxed" id="style-desc">
                            A tranquil fusion of Scandinavian functionalism and rustic Japanese minimalism, grounded by
                            rich matte terracotta plaster walls, light oak woods, and subtle dark stone accents.
                        </p>
                        <div class="space-y-3 pt-2">
                            <h4 class="text-xs font-cinzel uppercase text-terra-300 tracking-wider">Key Design
                                Characteristics:</h4>
                            <div class="grid grid-cols-2 gap-3 text-xs text-terra-200/80" id="style-features">
                                <div class="flex items-center space-x-2"><i
                                        class="fa-solid fa-leaf text-terra-500"></i><span>Textured Clay Plaster</span>
                                </div>
                                <div class="flex items-center space-x-2"><i
                                        class="fa-solid fa-leaf text-terra-500"></i><span>Low Profile Wood
                                        Frames</span></div>
                                <div class="flex items-center space-x-2"><i
                                        class="fa-solid fa-leaf text-terra-500"></i><span>Diffused Ambient
                                        Lighting</span></div>
                                <div class="flex items-center space-x-2"><i
                                        class="fa-solid fa-leaf text-terra-500"></i><span>Earthy Neutral Linen</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="relative h-80 sm:h-96 rounded-2xl overflow-hidden border border-copper-light/30">
                        <img alt="Terracotta Japandi Style"
                            class="w-full h-full object-cover transform hover:scale-105 transition-transform duration-700"
                            id="style-img"
                            onerror="this.src='https://placehold.co/800x600/451A03/F5E6D3?text=Japandi+Style'"
                            src="https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?q=80&amp;w=1000&amp;auto=format&amp;fit=crop" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- 6. Filterable Interior Project Portfolio -->
    <section class="py-24 px-4 max-w-7xl mx-auto border-t border-terra-900" id="portfolio">
        <div class="text-center max-w-3xl mx-auto mb-12 space-y-3">
            <span class="text-xs font-cinzel text-copper-light tracking-widest uppercase">Masterpiece Showcase</span>
            <h2 class="text-3xl sm:text-5xl font-cinzel font-bold text-terra-100">Featured Architecture Portfolio</h2>
            <p class="text-terra-200/80 text-sm sm:text-base">Explore our signature private villas, luxury penthouses,
                and commercial spaces.</p>
        </div>
        <!-- Portfolio Filter Buttons -->
        <div class="flex flex-wrap justify-center gap-3 mb-10">
            <button
                class="port-filter active px-5 py-2 rounded-full text-xs font-cinzel font-semibold bg-terra-700 text-terra-100 border border-copper-light/30"
                data-filter="all" onclick="filterPortfolio('all')">All Projects</button>
            <button
                class="port-filter px-5 py-2 rounded-full text-xs font-cinzel font-semibold bg-terra-950 text-terra-300 border border-terra-800 hover:border-terra-600"
                data-filter="residential" onclick="filterPortfolio('residential')">Residential</button>
            <button
                class="port-filter px-5 py-2 rounded-full text-xs font-cinzel font-semibold bg-terra-950 text-terra-300 border border-terra-800 hover:border-terra-600"
                data-filter="commercial" onclick="filterPortfolio('commercial')">Commercial</button>
            <button
                class="port-filter px-5 py-2 rounded-full text-xs font-cinzel font-semibold bg-terra-950 text-terra-300 border border-terra-800 hover:border-terra-600"
                data-filter="villa" onclick="filterPortfolio('villa')">Luxury Villas</button>
        </div>
        <!-- Portfolio Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="portfolio-grid">
            <!-- Project 1 -->
            <div
                class="port-item residential villa group glass-card rounded-2xl overflow-hidden border border-copper-light/20">
                <div class="relative h-72 overflow-hidden">
                    <img alt="Villa Terracotta Bali"
                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                        src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?q=80&amp;w=1000&amp;auto=format&amp;fit=crop" />
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-terra-950 via-transparent to-transparent opacity-80">
                    </div>
                    <span
                        class="absolute top-4 right-4 bg-terra-900/80 border border-copper-light/40 text-copper-light text-[10px] font-cinzel px-3 py-1 rounded-full uppercase">Canggu,
                        Bali</span>
                </div>
                <div class="p-6 space-y-2">
                    <h3
                        class="font-cinzel text-xl font-bold text-terra-100 group-hover:text-copper-light transition-colors">
                        The Clay Haven Estate</h3>
                    <p class="text-xs text-terra-200/70">Modern tropical villa featuring hand-sculpted terracotta
                        archways and warm ambient lighting.</p>
                </div>
            </div>
            <!-- Project 2 -->
            <div
                class="port-item commercial group glass-card rounded-2xl overflow-hidden border border-copper-light/20">
                <div class="relative h-72 overflow-hidden">
                    <img alt="Terracotta Lounge Jakarta"
                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                        src="https://images.unsplash.com/photo-1554118811-1e0d58224f24?q=80&amp;w=1000&amp;auto=format&amp;fit=crop" />
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-terra-950 via-transparent to-transparent opacity-80">
                    </div>
                    <span
                        class="absolute top-4 right-4 bg-terra-900/80 border border-copper-light/40 text-copper-light text-[10px] font-cinzel px-3 py-1 rounded-full uppercase">Jakarta</span>
                </div>
                <div class="p-6 space-y-2">
                    <h3
                        class="font-cinzel text-xl font-bold text-terra-100 group-hover:text-copper-light transition-colors">
                        Aura Roasted Lounge</h3>
                    <p class="text-xs text-terra-200/70">Boutique dining lounge with roasted earth brick interiors and
                        warm copper lighting fixture grid.</p>
                </div>
            </div>
            <!-- Project 3 -->
            <div
                class="port-item residential group glass-card rounded-2xl overflow-hidden border border-copper-light/20">
                <div class="relative h-72 overflow-hidden">
                    <img alt="Penthouse Residence"
                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                        src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?q=80&amp;w=1000&amp;auto=format&amp;fit=crop" />
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-terra-950 via-transparent to-transparent opacity-80">
                    </div>
                    <span
                        class="absolute top-4 right-4 bg-terra-900/80 border border-copper-light/40 text-copper-light text-[10px] font-cinzel px-3 py-1 rounded-full uppercase">Singapore</span>
                </div>
                <div class="p-6 space-y-2">
                    <h3
                        class="font-cinzel text-xl font-bold text-terra-100 group-hover:text-copper-light transition-colors">
                        The Warm Minimalist Suite</h3>
                    <p class="text-xs text-terra-200/70">Luxury penthouse interior leveraging micro-cement terracotta
                        floors and bespoke walnut wood joinery.</p>
                </div>
            </div>
            <!-- Project 4 -->
            <div class="port-item villa group glass-card rounded-2xl overflow-hidden border border-copper-light/20">
                <div class="relative h-72 overflow-hidden">
                    <img alt="Mediterranean Terracotta Villa"
                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                        src="https://images.unsplash.com/photo-1600585154526-990dced4db0d?q=80&amp;w=1000&amp;auto=format&amp;fit=crop" />
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-terra-950 via-transparent to-transparent opacity-80">
                    </div>
                    <span
                        class="absolute top-4 right-4 bg-terra-900/80 border border-copper-light/40 text-copper-light text-[10px] font-cinzel px-3 py-1 rounded-full uppercase">Uluwatu,
                        Bali</span>
                </div>
                <div class="p-6 space-y-2">
                    <h3
                        class="font-cinzel text-xl font-bold text-terra-100 group-hover:text-copper-light transition-colors">
                        Casa Del Sol Sanctuary</h3>
                    <p class="text-xs text-terra-200/70">Cliffside sanctuary blending Mediterranean terracotta tile
                        craftsmanship with raw stone accents.</p>
                </div>
            </div>
            <!-- Project 5 -->
            <div
                class="port-item commercial group glass-card rounded-2xl overflow-hidden border border-copper-light/20">
                <div class="relative h-72 overflow-hidden">
                    <img alt="Terracotta Boutique Store"
                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                        src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?q=80&amp;w=1000&amp;auto=format&amp;fit=crop" />
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-terra-950 via-transparent to-transparent opacity-80">
                    </div>
                    <span
                        class="absolute top-4 right-4 bg-terra-900/80 border border-copper-light/40 text-copper-light text-[10px] font-cinzel px-3 py-1 rounded-full uppercase">Bandung</span>
                </div>
                <div class="p-6 space-y-2">
                    <h3
                        class="font-cinzel text-xl font-bold text-terra-100 group-hover:text-copper-light transition-colors">
                        Earthy Luxury Atelier</h3>
                    <p class="text-xs text-terra-200/70">High-end fashion retail concept showcasing curved terracotta
                        display pedestals and bronze mirrors.</p>
                </div>
            </div>
            <!-- Project 6 -->
            <div
                class="port-item residential group glass-card rounded-2xl overflow-hidden border border-copper-light/20">
                <div class="relative h-72 overflow-hidden">
                    <img alt="Urban Apartment Renovation"
                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                        src="https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?q=80&amp;w=1000&amp;auto=format&amp;fit=crop" />
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-terra-950 via-transparent to-transparent opacity-80">
                    </div>
                    <span
                        class="absolute top-4 right-4 bg-terra-900/80 border border-copper-light/40 text-copper-light text-[10px] font-cinzel px-3 py-1 rounded-full uppercase">Surabaya</span>
                </div>
                <div class="p-6 space-y-2">
                    <h3
                        class="font-cinzel text-xl font-bold text-terra-100 group-hover:text-copper-light transition-colors">
                        The Ochre Residence</h3>
                    <p class="text-xs text-terra-200/70">Moody modern home featuring warm terracotta tone feature walls
                        and custom leather upholstery.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- 7. Interactive Before-and-After Project Gallery -->
    <section class="py-24 px-4 bg-terra-900/40 border-t border-terra-900" id="transformation">
        <div class="max-w-6xl mx-auto">
            <div class="text-center max-w-3xl mx-auto mb-12 space-y-3">
                <span class="text-xs font-cinzel text-copper-light tracking-widest uppercase">Dramatic Spatial
                    Renovation</span>
                <h2 class="text-3xl sm:text-5xl font-cinzel font-bold text-terra-100">Before &amp; After Transformation
                </h2>
                <p class="text-terra-200/80 text-sm sm:text-base">Drag the center handle horizontally to witness how we
                    elevate cold white interiors into warm, moody terracotta luxury.</p>
            </div>
            <!-- Interactive Slider Box -->
            <div class="glass-card rounded-3xl p-4 sm:p-6 border border-copper-light/30 max-w-4xl mx-auto">
                <div class="ba-slider-container h-[350px] sm:h-[500px] rounded-2xl border border-terra-700/50"
                    id="ba-slider" style="--slider-pos: 50%;">
                    <!-- After Image (Deep Terracotta Interior) -->
                    <img alt="After Transformation Terracotta Interior" class="ba-slider-img-after"
                        src="https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?q=80&amp;w=1600&amp;auto=format&amp;fit=crop" />
                    <!-- Before Image (Stark White Dull Room) -->
                    <img alt="Before Plain Room" class="ba-slider-img-before"
                        src="https://images.unsplash.com/photo-1513694203232-719a280e022f?q=80&amp;w=1600&amp;auto=format&amp;fit=crop" />
                    <!-- Handle & Badges -->
                    <div class="ba-handle" id="ba-handle">
                        <div class="ba-handle-btn">
                            <i class="fa-solid fa-arrows-left-right text-xs"></i>
                        </div>
                    </div>
                    <span
                        class="absolute top-4 left-4 bg-terra-950/90 text-terra-300 font-cinzel text-xs px-3 py-1 rounded-full border border-terra-700">BEFORE
                        (Plain &amp; Cold)</span>
                    <span
                        class="absolute top-4 right-4 bg-terra-700/90 text-terra-100 font-cinzel text-xs px-3 py-1 rounded-full border border-copper-light">AFTER
                        (Terracotta Luxury)</span>
                </div>
            </div>
        </div>
    </section>
    <!-- 8. Residential vs Commercial Design Categories -->
    <section class="py-24 px-4 max-w-7xl mx-auto border-t border-terra-900">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Residential Focus -->
            <div
                class="glass-card rounded-3xl p-8 sm:p-12 relative overflow-hidden group hover:border-copper-light/50 transition-all">
                <div class="space-y-4 relative z-10">
                    <span class="text-xs font-cinzel text-copper-light tracking-widest uppercase">Private Havens</span>
                    <h3 class="text-3xl font-cinzel font-bold text-terra-100">Residential Architecture</h3>
                    <p class="text-terra-200/70 text-sm leading-relaxed">
                        Creating intimate, soul-restoring living environments. We blend warm earthy clays, organic
                        curved plaster walls, custom lighting, and bespoke furnishings tailored for ultimate private
                        comfort.
                    </p>
                    <ul class="space-y-2 text-xs text-terra-200/80 pt-2">
                        <li class="flex items-center"><i
                                class="fa-solid fa-angle-right text-terra-500 mr-2"></i>Private Villas &amp; Luxury
                            Estates</li>
                        <li class="flex items-center"><i
                                class="fa-solid fa-angle-right text-terra-500 mr-2"></i>High-rise Moody Penthouses</li>
                        <li class="flex items-center"><i
                                class="fa-solid fa-angle-right text-terra-500 mr-2"></i>Bespoke Kitchen &amp; Bath
                            Sanctuaries</li>
                    </ul>
                </div>
            </div>
            <!-- Commercial Focus -->
            <div
                class="glass-card rounded-3xl p-8 sm:p-12 relative overflow-hidden group hover:border-copper-light/50 transition-all">
                <div class="space-y-4 relative z-10">
                    <span class="text-xs font-cinzel text-copper-light tracking-widest uppercase">Experiential
                        Hubs</span>
                    <h3 class="text-3xl font-cinzel font-bold text-terra-100">Commercial &amp; Hospitality</h3>
                    <p class="text-terra-200/70 text-sm leading-relaxed">
                        Elevating commercial spaces with unforgettable aesthetic identities. Designed to captivate
                        visitors, improve ambient comfort, and reinforce luxury brand storytelling.
                    </p>
                    <ul class="space-y-2 text-xs text-terra-200/80 pt-2">
                        <li class="flex items-center"><i class="fa-solid fa-angle-right text-terra-500 mr-2"></i>Fine
                            Dining &amp; Earthy Cocktail Lounges</li>
                        <li class="flex items-center"><i
                                class="fa-solid fa-angle-right text-terra-500 mr-2"></i>Boutique Hotels &amp; Wellness
                            Resorts</li>
                        <li class="flex items-center"><i
                                class="fa-solid fa-angle-right text-terra-500 mr-2"></i>Flagship Luxury Retail Ateliers
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- 9. Interior Design Packages & Consultation Rates -->
    <section class="py-24 px-4 bg-terra-900/30 border-t border-terra-900" id="packages">
        <div class="max-w-7xl mx-auto">
            <div class="text-center max-w-3xl mx-auto mb-12 space-y-3">
                <span class="text-xs font-cinzel text-copper-light tracking-widest uppercase">Transparent
                    Investment</span>
                <h2 class="text-3xl sm:text-5xl font-cinzel font-bold text-terra-100">Design Packages &amp; Rates</h2>
                <p class="text-terra-200/80 text-sm sm:text-base">Toggle between standard design direction and full
                    turnkey build-out services.</p>

                <!-- Package Toggle -->
                <div class="artistic-package-toggle">
                    <span class="artistic-toggle-label artistic-toggle-label--left">
                        Design Concept Only
                    </span>

                    <button type="button" id="pkg-toggle-btn" class="artistic-toggle" role="switch"
                        aria-checked="false"
                        aria-label="Switch between Design Concept Only and Full Turnkey Execution">
                        <span id="pkg-toggle-circle" class="artistic-toggle__knob"></span>
                    </button>

                    <span class="artistic-toggle-label artistic-toggle-label--right">
                        Full Turnkey Execution
                    </span>
                </div>

            </div>
            <!-- Pricing Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Package 1 -->
                <div
                    class="glass-card rounded-3xl p-8 border border-copper-light/20 flex flex-col justify-between space-y-6">
                    <div class="space-y-4">
                        <span class="text-xs font-cinzel text-terra-400 tracking-wider uppercase">Essential
                            Concept</span>
                        <h3 class="text-2xl font-cinzel font-bold text-terra-100">Artistic Consultation</h3>
                        <div class="font-cinzel text-3xl font-bold copper-gradient-text" id="price-1">IDR 25.000.000
                        </div>
                        <p class="text-xs text-terra-200/70">Ideal for clients seeking spatial direction, aesthetic
                            curation, and material swatches.</p>
                        <hr class="border-terra-800" />
                        <ul class="space-y-3 text-xs text-terra-200/80">
                            <li class="flex items-center"><i class="fa-solid fa-check text-terra-500 mr-2"></i>2D
                                Spatial Layout &amp; Furniture Plan</li>
                            <li class="flex items-center"><i
                                    class="fa-solid fa-check text-terra-500 mr-2"></i>Terracotta Material Board</li>
                            <li class="flex items-center"><i class="fa-solid fa-check text-terra-500 mr-2"></i>Color
                                Palette &amp; Mood Lighting Plan</li>
                        </ul>
                    </div>
                    <a class="w-full py-3 rounded-full font-cinzel text-xs text-center font-semibold uppercase bg-terra-900 hover:bg-terra-800 text-terra-200 border border-terra-700 transition-all"
                        href="#booking">Select Package</a>
                </div>
                <!-- Package 2 (Highlighted) -->
                <div
                    class="glass-card rounded-3xl p-8 border-2 border-copper-light relative flex flex-col justify-between space-y-6 copper-glow transform md:-translate-y-2">
                    <span
                        class="absolute -top-3.5 left-1/2 -translate-x-1/2 bg-gradient-to-r from-terra-600 to-copper-dark text-terra-100 text-[10px] font-cinzel uppercase px-4 py-1 rounded-full border border-copper-light">Most
                        Requested</span>
                    <div class="space-y-4">
                        <span class="text-xs font-cinzel text-copper-light tracking-wider uppercase">Full
                            Architectural</span>
                        <h3 class="text-2xl font-cinzel font-bold text-terra-100">Signature Studio</h3>
                        <div class="font-cinzel text-3xl font-bold copper-gradient-text" id="price-2">IDR 75.000.000
                        </div>
                        <p class="text-xs text-terra-200/70">Comprehensive design, 3D photorealistic renderings, and
                            detailed construction technical drawings.</p>
                        <hr class="border-terra-800" />
                        <ul class="space-y-3 text-xs text-terra-200/80">
                            <li class="flex items-center"><i class="fa-solid fa-check text-copper-light mr-2"></i>All
                                Essential Package Features</li>
                            <li class="flex items-center"><i class="fa-solid fa-check text-copper-light mr-2"></i>3D
                                Photorealistic VR Renderings</li>
                            <li class="flex items-center"><i
                                    class="fa-solid fa-check text-copper-light mr-2"></i>Bespoke Furniture Blueprints
                            </li>
                            <li class="flex items-center"><i class="fa-solid fa-check text-copper-light mr-2"></i>Site
                                Supervision Visits (3x)</li>
                        </ul>
                    </div>
                    <a class="w-full py-3.5 rounded-full font-cinzel text-xs text-center font-semibold uppercase bg-gradient-to-r from-terra-600 to-copper-dark text-terra-100 border border-copper-light shadow-lg transition-all"
                        href="#booking">Select Package</a>
                </div>
                <!-- Package 3 -->
                <div
                    class="glass-card rounded-3xl p-8 border border-copper-light/20 flex flex-col justify-between space-y-6">
                    <div class="space-y-4">
                        <span class="text-xs font-cinzel text-terra-400 tracking-wider uppercase">Bespoke
                            Enterprise</span>
                        <h3 class="text-2xl font-cinzel font-bold text-terra-100">Masterpiece Residence</h3>
                        <div class="font-cinzel text-3xl font-bold copper-gradient-text" id="price-3">Custom Quote
                        </div>
                        <p class="text-xs text-terra-200/70">End-to-end luxury villa architecture, full construction
                            management, and custom interior crafting.</p>
                        <hr class="border-terra-800" />
                        <ul class="space-y-3 text-xs text-terra-200/80">
                            <li class="flex items-center"><i
                                    class="fa-solid fa-check text-terra-500 mr-2"></i>Complete Turnkey Execution</li>
                            <li class="flex items-center"><i
                                    class="fa-solid fa-check text-terra-500 mr-2"></i>Dedicated Principal Architect
                            </li>
                            <li class="flex items-center"><i
                                    class="fa-solid fa-check text-terra-500 mr-2"></i>Hand-molded Clay Sculptures &amp;
                                Art</li>
                        </ul>
                    </div>
                    <a class="w-full py-3 rounded-full font-cinzel text-xs text-center font-semibold uppercase bg-terra-900 hover:bg-terra-800 text-terra-200 border border-terra-700 transition-all"
                        href="#booking">Request Custom Quote</a>
                </div>
            </div>
        </div>
    </section>
    <!-- 10. 4-Step Design Process Timeline -->
    <section class="py-24 px-4 max-w-7xl mx-auto border-t border-terra-900" id="process">
        <div class="text-center max-w-3xl mx-auto mb-16 space-y-3">
            <span class="text-xs font-cinzel text-copper-light tracking-widest uppercase">Methodology</span>
            <h2 class="text-3xl sm:text-5xl font-cinzel font-bold text-terra-100">Our 4-Step Design Process</h2>
            <p class="text-terra-200/80 text-sm sm:text-base">A seamless journey from initial clay sketch to luxury
                spatial completion.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 relative">
            <!-- Process Step 1 -->
            <div class="glass-card p-6 rounded-2xl relative border border-copper-light/20 text-center space-y-3">
                <div
                    class="w-12 h-12 rounded-full bg-terra-800 border border-copper-light text-copper-light flex items-center justify-center font-cinzel font-bold text-lg mx-auto">
                    01</div>
                <h3 class="font-cinzel text-lg font-bold text-terra-100">Discovery &amp; Clay Sketch</h3>
                <p class="text-xs text-terra-200/70">In-depth consultation to map spatial flow, client lifestyle, and
                    initial material direction.</p>
            </div>
            <!-- Process Step 2 -->
            <div class="glass-card p-6 rounded-2xl relative border border-copper-light/20 text-center space-y-3">
                <div
                    class="w-12 h-12 rounded-full bg-terra-800 border border-copper-light text-copper-light flex items-center justify-center font-cinzel font-bold text-lg mx-auto">
                    02</div>
                <h3 class="font-cinzel text-lg font-bold text-terra-100">3D Atmospheric Render</h3>
                <p class="text-xs text-terra-200/70">Ray-traced 3D visual development displaying exact warmth, tone,
                    shadows, and textures.</p>
            </div>
            <!-- Process Step 3 -->
            <div class="glass-card p-6 rounded-2xl relative border border-copper-light/20 text-center space-y-3">
                <div
                    class="w-12 h-12 rounded-full bg-terra-800 border border-copper-light text-copper-light flex items-center justify-center font-cinzel font-bold text-lg mx-auto">
                    03</div>
                <h3 class="font-cinzel text-lg font-bold text-terra-100">Material Curation</h3>
                <p class="text-xs text-terra-200/70">Hands-on swatch selection including imported terracotta tiles,
                    roasted clay, and brass accents.</p>
            </div>
            <!-- Process Step 4 -->
            <div class="glass-card p-6 rounded-2xl relative border border-copper-light/20 text-center space-y-3">
                <div
                    class="w-12 h-12 rounded-full bg-terra-800 border border-copper-light text-copper-light flex items-center justify-center font-cinzel font-bold text-lg mx-auto">
                    04</div>
                <h3 class="font-cinzel text-lg font-bold text-terra-100">Build &amp; Reveal</h3>
                <p class="text-xs text-terra-200/70">Precision construction supervision and final atmospheric styling
                    for handover.</p>
            </div>
        </div>
    </section>
    <!-- 11. Interactive Material and Finishing Options Swatch Viewer -->
    <section class="py-24 px-4 bg-terra-900/40 border-t border-terra-900" id="swatches">
        <div class="max-w-7xl mx-auto">
            <div class="text-center max-w-3xl mx-auto mb-12 space-y-3">
                <span class="text-xs font-cinzel text-copper-light tracking-widest uppercase">Tactile Curation</span>
                <h2 class="text-3xl sm:text-5xl font-cinzel font-bold text-terra-100">Interactive Material Swatches
                </h2>
                <p class="text-terra-200/80 text-sm sm:text-base">Click on a swatch to preview texture properties and
                    architectural applications.</p>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-center">
                <!-- Swatch Grid Selection -->
                <div class="lg:col-span-2 grid grid-cols-2 sm:grid-cols-3 gap-4" id="swatch-grid">
                    <!-- Swatch 1 -->
                    <div class="swatch-card active glass-card p-4 rounded-2xl cursor-pointer border-2 border-copper-light hover:border-copper-light transition-all text-center space-y-2"
                        data-swatch="raw-terra" onclick="selectSwatch('raw-terra')">
                        <div class="w-full h-24 rounded-xl bg-[#7C2D12] shadow-inner border border-copper-light/30">
                        </div>
                        <h4 class="font-cinzel text-xs font-bold text-terra-100">Raw Terracotta Clay</h4>
                    </div>
                    <!-- Swatch 2 -->
                    <div class="swatch-card glass-card p-4 rounded-2xl cursor-pointer border border-terra-800 hover:border-copper-light transition-all text-center space-y-2"
                        data-swatch="roasted-earth" onclick="selectSwatch('roasted-earth')">
                        <div class="w-full h-24 rounded-xl bg-[#451A03] shadow-inner border border-copper-light/30">
                        </div>
                        <h4 class="font-cinzel text-xs font-bold text-terra-100">Roasted Earth Plaster</h4>
                    </div>
                    <!-- Swatch 3 -->
                    <div class="swatch-card glass-card p-4 rounded-2xl cursor-pointer border border-terra-800 hover:border-copper-light transition-all text-center space-y-2"
                        data-swatch="brushed-copper" onclick="selectSwatch('brushed-copper')">
                        <div
                            class="w-full h-24 rounded-xl bg-gradient-to-br from-[#E0A96D] to-[#9C5835] shadow-inner border border-copper-light/30">
                        </div>
                        <h4 class="font-cinzel text-xs font-bold text-terra-100">Brushed Copper Accents</h4>
                    </div>
                    <!-- Swatch 4 -->
                    <div class="swatch-card glass-card p-4 rounded-2xl cursor-pointer border border-terra-800 hover:border-copper-light transition-all text-center space-y-2"
                        data-swatch="warm-sand" onclick="selectSwatch('warm-sand')">
                        <div class="w-full h-24 rounded-xl bg-[#E8D5C4] shadow-inner border border-copper-light/30">
                        </div>
                        <h4 class="font-cinzel text-xs font-bold text-terra-100">Warm Sand Travertine</h4>
                    </div>
                    <!-- Swatch 5 -->
                    <div class="swatch-card glass-card p-4 rounded-2xl cursor-pointer border border-terra-800 hover:border-copper-light transition-all text-center space-y-2"
                        data-swatch="charcoal-stone" onclick="selectSwatch('charcoal-stone')">
                        <div class="w-full h-24 rounded-xl bg-[#290F0B] shadow-inner border border-copper-light/30">
                        </div>
                        <h4 class="font-cinzel text-xs font-bold text-terra-100">Deep Earth Basalt</h4>
                    </div>
                    <!-- Swatch 6 -->
                    <div class="swatch-card glass-card p-4 rounded-2xl cursor-pointer border border-terra-800 hover:border-copper-light transition-all text-center space-y-2"
                        data-swatch="terrazzo" onclick="selectSwatch('terrazzo')">
                        <div
                            class="w-full h-24 rounded-xl bg-gradient-to-tr from-[#7C2D12] via-[#E8D5C4] to-[#451A03] shadow-inner border border-copper-light/30">
                        </div>
                        <h4 class="font-cinzel text-xs font-bold text-terra-100">Warm Clay Terrazzo</h4>
                    </div>
                </div>
                <!-- Swatch Details Box -->
                <div class="glass-card p-8 rounded-3xl border border-copper-light/30 space-y-4"
                    id="swatch-detail-box">
                    <span class="text-xs font-cinzel text-copper-light tracking-widest uppercase">Material
                        Profile</span>
                    <h3 class="text-2xl font-cinzel font-bold text-terra-100" id="swatch-title">Raw Terracotta Clay
                    </h3>
                    <p class="text-xs text-terra-200/80 leading-relaxed" id="swatch-desc">
                        Hand-harvested natural clay baked at low temperatures to retain its porous tactile warmth.
                        Perfect for interior accent walls, arched niches, and feature columns.
                    </p>
                    <div class="space-y-2 pt-2 text-xs">
                        <div class="flex justify-between border-b border-terra-800 pb-1">
                            <span class="text-terra-300">Origin:</span>
                            <span class="text-terra-100" id="swatch-origin">Tuscany &amp; Bali Handcrafted</span>
                        </div>
                        <div class="flex justify-between border-b border-terra-800 pb-1">
                            <span class="text-terra-300">Finish:</span>
                            <span class="text-terra-100" id="swatch-finish">Matte Organic Tactile</span>
                        </div>
                        <div class="flex justify-between border-b border-terra-800 pb-1">
                            <span class="text-terra-300">Recommended Use:</span>
                            <span class="text-terra-100" id="swatch-use">Feature Walls, Living Rooms</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- 12. Designer Profiles & Certifications -->
    <section class="py-24 px-4 max-w-7xl mx-auto border-t border-terra-900">
        <div class="text-center max-w-3xl mx-auto mb-16 space-y-3">
            <span class="text-xs font-cinzel text-copper-light tracking-widest uppercase">Master Craftsmen</span>
            <h2 class="text-3xl sm:text-5xl font-cinzel font-bold text-terra-100">Principal Architects &amp; Designers
            </h2>
            <p class="text-terra-200/80 text-sm sm:text-base">Certified international visionaries specializing in
                high-end earth-toned spatial mastery.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Designer 1 -->
            <div class="glass-card rounded-3xl overflow-hidden border border-copper-light/20 group">
                <div class="h-80 overflow-hidden relative">
                    <img alt="Principal Architect"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                        src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?q=80&amp;w=800&amp;auto=format&amp;fit=crop" />
                    <div class="absolute inset-0 bg-gradient-to-t from-terra-950 via-transparent to-transparent"></div>
                </div>
                <div class="p-6 text-center space-y-2">
                    <h3 class="font-cinzel text-xl font-bold text-terra-100">Elena Rostova, M.Arch</h3>
                    <p class="text-xs text-copper-light font-cinzel">Founder &amp; Principal Architect</p>
                    <p class="text-xs text-terra-200/70 pt-2">15+ years experience in luxury Mediterranean and
                        South-East Asian tropical architecture.</p>
                </div>
            </div>
            <!-- Designer 2 -->
            <div class="glass-card rounded-3xl overflow-hidden border border-copper-light/20 group">
                <div class="h-80 overflow-hidden relative">
                    <img alt="Lead Interior Designer"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                        src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&amp;w=800&amp;auto=format&amp;fit=crop" />
                    <div class="absolute inset-0 bg-gradient-to-t from-terra-950 via-transparent to-transparent"></div>
                </div>
                <div class="p-6 text-center space-y-2">
                    <h3 class="font-cinzel text-xl font-bold text-terra-100">Aris Setiawan, HDII</h3>
                    <p class="text-xs text-copper-light font-cinzel">Lead Interior Stylist &amp; Sculptor</p>
                    <p class="text-xs text-terra-200/70 pt-2">Pioneer in terracotta clay plaster application and modern
                        organic furniture curation.</p>
                </div>
            </div>
            <!-- Designer 3 -->
            <div class="glass-card rounded-3xl overflow-hidden border border-copper-light/20 group">
                <div class="h-80 overflow-hidden relative">
                    <img alt="Lighting Director"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                        src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?q=80&amp;w=800&amp;auto=format&amp;fit=crop" />
                    <div class="absolute inset-0 bg-gradient-to-t from-terra-950 via-transparent to-transparent"></div>
                </div>
                <div class="p-6 text-center space-y-2">
                    <h3 class="font-cinzel text-xl font-bold text-terra-100">Maya Lin, IALD</h3>
                    <p class="text-xs text-copper-light font-cinzel">Atmospheric Lighting Director</p>
                    <p class="text-xs text-terra-200/70 pt-2">Specialist in warm ambient ray tracing, hidden LED
                        strips, and shadow manipulation.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- 13. Client Testimonials Carousel/Grid -->
    <section class="py-24 px-4 bg-terra-900/30 border-t border-terra-900">
        <div class="max-w-7xl mx-auto">
            <div class="text-center max-w-3xl mx-auto mb-16 space-y-3">
                <span class="text-xs font-cinzel text-copper-light tracking-widest uppercase">Words of
                    Appreciation</span>
                <h2 class="text-3xl sm:text-5xl font-cinzel font-bold text-terra-100">Client Experiences</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Testimonial 1 -->
                <div class="glass-card p-8 rounded-3xl border border-copper-light/20 space-y-4">
                    <div class="flex text-copper-light text-xs space-x-1">
                        <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                            class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                            class="fa-solid fa-star"></i>
                    </div>
                    <p class="text-xs text-terra-200/80 italic leading-relaxed">
                        "Terracotta Studio completely reshaped our Bali residence into an earth-toned sanctuary. The
                        dark terracotta walls paired with copper lighting created an unparalleled sense of calmness."
                    </p>
                    <div>
                        <h4 class="font-cinzel text-sm font-bold text-terra-100">Alexander &amp; Sophia V.</h4>
                        <span class="text-[10px] text-terra-400">Villa Owner, Uluwatu</span>
                    </div>
                </div>
                <!-- Testimonial 2 -->
                <div class="glass-card p-8 rounded-3xl border border-copper-light/20 space-y-4">
                    <div class="flex text-copper-light text-xs space-x-1">
                        <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                            class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                            class="fa-solid fa-star"></i>
                    </div>
                    <p class="text-xs text-terra-200/80 italic leading-relaxed">
                        "The atmosphere they created for our Jakarta lounge is world-class. Our guests constantly
                        compliment the roasted clay texture walls and bespoke joinery."
                    </p>
                    <div>
                        <h4 class="font-cinzel text-sm font-bold text-terra-100">Dermawan S.</h4>
                        <span class="text-[10px] text-terra-400">Hospitality Director</span>
                    </div>
                </div>
                <!-- Testimonial 3 -->
                <div class="glass-card p-8 rounded-3xl border border-copper-light/20 space-y-4">
                    <div class="flex text-copper-light text-xs space-x-1">
                        <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                            class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                            class="fa-solid fa-star"></i>
                    </div>
                    <p class="text-xs text-terra-200/80 italic leading-relaxed">
                        "From the initial VR rendering to final furniture placement, Elena and her team displayed
                        absolute architectural mastery. Highly recommended."
                    </p>
                    <div>
                        <h4 class="font-cinzel text-sm font-bold text-terra-100">Claire Chen</h4>
                        <span class="text-[10px] text-terra-400">Penthouse Owner, Singapore</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- 14. Consultation Booking & Project Inquiry Form -->
    <section class="py-24 px-4 max-w-5xl mx-auto border-t border-terra-900" id="booking">
        <div class="glass-card p-8 sm:p-12 rounded-3xl border border-copper-light/30 space-y-8 copper-glow">
            <div class="text-center max-w-2xl mx-auto space-y-3">
                <span class="text-xs font-cinzel text-copper-light tracking-widest uppercase">Begin Your Journey</span>
                <h2 class="text-3xl sm:text-4xl font-cinzel font-bold text-terra-100">Book Studio Consultation</h2>
                <p class="text-xs sm:text-sm text-terra-200/80">Schedule a private session with our principal design
                    architects at our Jakarta or Bali studio.</p>
            </div>
            <form class="space-y-6" id="booking-form" onsubmit="handleBooking(event)">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-cinzel text-terra-300 mb-2">Full Name *</label>
                        <input
                            class="w-full bg-terra-950/80 border border-terra-800 focus:border-copper-light rounded-xl px-4 py-3 text-sm text-terra-100 focus:outline-none transition-colors"
                            name="full_name" placeholder="e.g. Alexandra Wright" required="" type="text" />
                    </div>
                    <div>
                        <label class="block text-xs font-cinzel text-terra-300 mb-2">Email Address *</label>
                        <input
                            class="w-full bg-terra-950/80 border border-terra-800 focus:border-copper-light rounded-xl px-4 py-3 text-sm text-terra-100 focus:outline-none transition-colors"
                            name="email" placeholder="alexandra@domain.com" required="" type="email" />
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label class="block text-xs font-cinzel text-terra-300 mb-2">Phone / WhatsApp *</label>
                        <input
                            class="w-full bg-terra-950/80 border border-terra-800 focus:border-copper-light rounded-xl px-4 py-3 text-sm text-terra-100 focus:outline-none transition-colors"
                            name="phone" placeholder="+62 812 XXXX XXXX" required="" type="tel" />
                    </div>
                    <div>
                        <label class="block text-xs font-cinzel text-terra-300 mb-2">Project Category</label>
                        <select
                            class="w-full bg-terra-950/80 border border-terra-800 focus:border-copper-light rounded-xl px-4 py-3 text-sm text-terra-100 focus:outline-none transition-colors"
                            name="project_category">
                            <option>Private Villa / Estate</option>
                            <option>Luxury Apartment / Penthouse</option>
                            <option>Hospitality / Commercial Lounge</option>
                            <option>Custom Terracotta Furniture</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-cinzel text-terra-300 mb-2">Estimated Budget Range</label>
                        <select
                            class="w-full bg-terra-950/80 border border-terra-800 focus:border-copper-light rounded-xl px-4 py-3 text-sm text-terra-100 focus:outline-none transition-colors"
                            name="budget_range">
                            <option>IDR 100M - 300M</option>
                            <option>IDR 300M - 750M</option>
                            <option>IDR 750M - 2 Billion</option>
                            <option>&gt; IDR 2 Billion+</option>
                        </select>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                    <div><label class="block text-xs font-cinzel text-terra-300 mb-2">Preferred Consultation Date
                            *</label><input
                            class="w-full bg-terra-950/80 border border-terra-800 focus:border-copper-light rounded-xl px-4 py-3 text-sm text-terra-100 focus:outline-none transition-colors"
                            name="preferred_date" required="required" type="date" /></div>
                    <div><label class="block text-xs font-cinzel text-terra-300 mb-2">Preferred Time *</label><select
                            class="w-full bg-terra-950/80 border border-terra-800 focus:border-copper-light rounded-xl px-4 py-3 text-sm text-terra-100 focus:outline-none transition-colors"
                            name="preferred_time">
                            <option value="09:00">09:00</option>
                            <option value="10:00">10:00</option>
                            <option value="11:00">11:00</option>
                            <option value="13:00">13:00</option>
                            <option value="14:00">14:00</option>
                            <option value="15:00">15:00</option>
                            <option value="16:00">16:00</option>
                        </select></div>
                    <div><label class="block text-xs font-cinzel text-terra-300 mb-2">Consultation
                            Method</label><select
                            class="w-full bg-terra-950/80 border border-terra-800 focus:border-copper-light rounded-xl px-4 py-3 text-sm text-terra-100 focus:outline-none transition-colors"
                            name="consultation_method">
                            <option value="Studio Jakarta">Studio Jakarta</option>
                            <option value="Studio Bali">Studio Bali</option>
                            <option value="Video Call">Video Call</option>
                        </select></div>
                    <div><label class="block text-xs font-cinzel text-terra-300 mb-2">Package Interest</label><select
                            class="w-full bg-terra-950/80 border border-terra-800 focus:border-copper-light rounded-xl px-4 py-3 text-sm text-terra-100 focus:outline-none transition-colors"
                            name="package_interest">
                            <option value="Artistic Consultation">Artistic Consultation</option>
                            <option value="Signature Studio">Signature Studio</option>
                            <option value="Masterpiece Residence">Masterpiece Residence</option>
                            <option value="Belum yakin — perlu rekomendasi">Belum yakin — perlu rekomendasi</option>
                        </select></div>
                </div>
                <div>
                    <label class="block text-xs font-cinzel text-terra-300 mb-2">Project Vision &amp; Location
                        Details</label>
                    <textarea
                        class="w-full bg-terra-950/80 border border-terra-800 focus:border-copper-light rounded-xl p-4 text-sm text-terra-100 focus:outline-none transition-colors"
                        name="project_vision" placeholder="Tell us about your spatial dimensions, design vision, and location..."
                        rows="4"></textarea>
                </div>
                <div class="text-center">
                    <button
                        class="px-10 py-4 rounded-full font-cinzel text-xs font-semibold tracking-widest uppercase bg-gradient-to-r from-terra-600 via-terra-700 to-copper-dark hover:from-terra-500 hover:to-terra-600 text-terra-100 border border-copper-light/40 shadow-xl copper-glow transition-all"
                        type="submit">
                        Submit Consultation Inquiry
                    </button>
                </div>
            </form>
        </div>
    </section>
    <!-- 15. Interactive Service Area Coverage Map/List -->
    <section class="py-24 px-4 max-w-7xl mx-auto border-t border-terra-900">
        <div class="text-center max-w-3xl mx-auto mb-16 space-y-3">
            <span class="text-xs font-cinzel text-copper-light tracking-widest uppercase">Global Footprint</span>
            <h2 class="text-3xl sm:text-5xl font-cinzel font-bold text-terra-100">Studio Locations &amp; Service
                Coverage</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
            <div class="glass-card p-8 rounded-2xl border border-copper-light/20 space-y-3">
                <i class="fa-solid fa-city text-3xl text-copper-light"></i>
                <h3 class="font-cinzel text-xl font-bold text-terra-100">Greater Jakarta</h3>
                <p class="text-xs text-terra-200/70">Senopati Flagship Studio • PIK • Menteng • Pondok Indah • BSD City
                </p>
            </div>
            <div class="glass-card p-8 rounded-2xl border border-copper-light/20 space-y-3">
                <i class="fa-solid fa-umbrella-beach text-3xl text-copper-light"></i>
                <h3 class="font-cinzel text-xl font-bold text-terra-100">Bali Sanctuary Studio</h3>
                <p class="text-xs text-terra-200/70">Canggu Atelier • Seminyak • Uluwatu • Ubud Luxury Estates</p>
            </div>
            <div class="glass-card p-8 rounded-2xl border border-copper-light/20 space-y-3">
                <i class="fa-solid fa-globe text-3xl text-copper-light"></i>
                <h3 class="font-cinzel text-xl font-bold text-terra-100">International Projects</h3>
                <p class="text-xs text-terra-200/70">Singapore • Kuala Lumpur • Dubai • Australia Remote Architecture
                </p>
            </div>
        </div>
    </section>
    <!-- 16. FAQ Accordion -->
    <section class="py-24 px-4 max-w-4xl mx-auto border-t border-terra-900" id="faq">
        <div class="text-center max-w-3xl mx-auto mb-16 space-y-3">
            <span class="text-xs font-cinzel text-copper-light tracking-widest uppercase">Inquiries</span>
            <h2 class="text-3xl sm:text-5xl font-cinzel font-bold text-terra-100">Frequently Asked Questions</h2>
        </div>
        <div class="space-y-4">
            <!-- FAQ 1 -->
            <div class="glass-card rounded-2xl border border-terra-800 overflow-hidden">
                <button
                    class="w-full px-6 py-4 text-left font-cinzel font-semibold text-sm text-terra-100 flex justify-between items-center focus:outline-none"
                    onclick="toggleFaq(1)">
                    <span>Why choose terracotta and dark earthy tones over conventional white interiors?</span>
                    <i class="fa-solid fa-chevron-down text-copper-light transition-transform" id="faq-icon-1"></i>
                </button>
                <div class="hidden px-6 pb-4 text-xs text-terra-200/70 leading-relaxed" id="faq-ans-1">
                    Dark terracotta and roasted clay tones absorb lighting dramatically, creating intimate, acoustic,
                    and soul-restoring atmospheres. Unlike stark white walls that feel sterile, dark earth tones radiate
                    warmth, timeless elegance, and grounding comfort.
                </div>
            </div>
            <!-- FAQ 2 -->
            <div class="glass-card rounded-2xl border border-terra-800 overflow-hidden">
                <button
                    class="w-full px-6 py-4 text-left font-cinzel font-semibold text-sm text-terra-100 flex justify-between items-center focus:outline-none"
                    onclick="toggleFaq(2)">
                    <span>How long does a typical villa design and renovation take?</span>
                    <i class="fa-solid fa-chevron-down text-copper-light transition-transform" id="faq-icon-2"></i>
                </button>
                <div class="hidden px-6 pb-4 text-xs text-terra-200/70 leading-relaxed" id="faq-ans-2">
                    Design concept phase takes approximately 4-8 weeks. Full turnkey execution typically ranges between
                    4 to 9 months depending on scope and custom clay plastering requirements.
                </div>
            </div>
            <!-- FAQ 3 -->
            <div class="glass-card rounded-2xl border border-terra-800 overflow-hidden">
                <button
                    class="w-full px-6 py-4 text-left font-cinzel font-semibold text-sm text-terra-100 flex justify-between items-center focus:outline-none"
                    onclick="toggleFaq(3)">
                    <span>Are raw terracotta finishes durable and easy to maintain?</span>
                    <i class="fa-solid fa-chevron-down text-copper-light transition-transform" id="faq-icon-3"></i>
                </button>
                <div class="hidden px-6 pb-4 text-xs text-terra-200/70 leading-relaxed" id="faq-ans-3">
                    Yes. We apply modern hydrophobic organic sealants over our hand-sculpted clay plaster and terracotta
                    tiles. This prevents moisture damage while keeping the authentic matte texture intact.
                </div>
            </div>
        </div>
    </section>
    <!-- 17. Footer with Newsletter & Quick Links -->
    <footer class="bg-terra-950 border-t border-terra-900 py-16 px-4">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-10">
            <!-- Brand Info -->
            <div class="space-y-4">
                <div class="flex items-center space-x-3">
                    <div
                        class="w-8 h-8 rounded-lg bg-terra-700 border border-copper-light/40 flex items-center justify-center font-cinzel font-bold text-terra-100">
                        T</div>
                    <span class="font-cinzel text-lg font-bold text-terra-100 tracking-widest">TERRACOTTA</span>
                </div>
                <p class="text-xs text-terra-200/60 leading-relaxed">
                    Sculpting atmospheric earthy sanctuaries, high-end private villas, and bespoke architectural spaces.
                </p>
            </div>
            <!-- Quick Links -->
            <div class="space-y-3">
                <h4 class="font-cinzel text-xs font-bold text-copper-light uppercase tracking-wider">Navigation</h4>
                <ul class="text-xs text-terra-200/70 space-y-2">
                    <li><a class="hover:text-copper-light" href="#services">Services</a></li>
                    <li><a class="hover:text-copper-light" href="#styles">Design Styles</a></li>
                    <li><a class="hover:text-copper-light" href="#portfolio">Portfolio</a></li>
                    <li><a class="hover:text-copper-light" href="#transformation">Before / After Gallery</a></li>
                </ul>
            </div>
            <!-- Contact -->
            <div class="space-y-3">
                <h4 class="font-cinzel text-xs font-bold text-copper-light uppercase tracking-wider">Studio Locations
                </h4>
                <p class="text-xs text-terra-200/70">Jl. Senopati No. 88, Kebayoran Baru, Jakarta Selatan</p>
                <p class="text-xs text-terra-200/70">Jl. Raya Canggu No. 12, Badung, Bali</p>
                <p class="text-xs text-copper-light">contact@terracottastudio.com</p>
            </div>
            <!-- Newsletter -->
            <div class="space-y-3">
                <h4 class="font-cinzel text-xs font-bold text-copper-light uppercase tracking-wider">Architectural
                    Gazette</h4>
                <p class="text-xs text-terra-200/60">Subscribe for private project previews and terracotta styling
                    insights.</p>
                <div class="flex">
                    <input
                        class="bg-terra-900 border border-terra-800 rounded-l-xl px-3 py-2 text-xs text-terra-100 focus:outline-none w-full"
                        placeholder="Your email..." type="email" />
                    <button
                        class="bg-terra-700 hover:bg-terra-600 text-terra-100 px-4 rounded-r-xl text-xs font-cinzel border border-copper-light/30">Join</button>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto border-t border-terra-900 mt-12 pt-6 text-center text-[11px] text-terra-200/40">
            © 2026 Terracotta Architecture &amp; Interior Studio. All rights reserved.
        </div>
    </footer>
    <!-- Floating Buttons (Bottom Right): 18. WhatsApp & 19. AI Chatbot -->
    <div class="fixed bottom-6 right-6 z-50 flex items-center space-x-3">
        <!-- 19. Floating Interactive AI Chatbot Button -->
        <button type="button" id="ai-assistant-button" class="artistic-ai-button" onclick="toggleAiModal()"
            title="AI Design Assistant" aria-label="Buka AI Design Assistant" aria-controls="ai-chat-modal"
            aria-expanded="false">
            <img src="{{ asset('images/website-bisnis/robotic.png') }}" alt=""
                class="artistic-ai-button__robot">
        </button>

        <!-- 18. Floating WhatsApp Button -->
        <a class="w-12 h-12 rounded-full bg-emerald-700 border border-emerald-400 text-white flex items-center justify-center shadow-2xl hover:scale-110 transition-transform"
            href="https://wa.me/6281234567890?text=Hello%20Terracotta%20Studio,%20I%20would%20like%20to%20consult%20about%20an%20interior%20project."
            target="_blank" title="WhatsApp Studio Desk">
            <i class="fa-brands fa-whatsapp text-2xl"></i>
        </a>
    </div>
    <!-- AI Chatbot Modal Box -->
    <div class="hidden fixed bottom-24 right-6 z-50 w-80 sm:w-96 glass-card rounded-3xl border border-copper-light/40 shadow-2xl overflow-hidden flex flex-col h-[450px]"
        id="ai-chat-modal">
        <!-- Chat Header -->
        <div class="bg-terra-900 px-5 py-4 border-b border-terra-800 flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <div
                    class="w-8 h-8 rounded-full bg-terra-700 border border-copper-light flex items-center justify-center text-terra-100 text-xs">
                    <i class="fa-solid fa-robot"></i>
                </div>
                <div>
                    <h4 class="font-cinzel text-xs font-bold text-terra-100">TerraAI Consultant</h4>
                    <span class="text-[9px] text-emerald-400">● Online Design Assistant</span>
                </div>
            </div>
            <button class="text-terra-300 hover:text-terra-100" onclick="toggleAiModal()"><i
                    class="fa-solid fa-xmark"></i></button>
        </div>
        <!-- Chat Messages Container -->
        <div class="p-4 flex-1 overflow-y-auto space-y-3 text-xs" id="chat-messages">
            <div class="bg-terra-900/90 border border-terra-800 p-3 rounded-2xl max-w-[85%] text-terra-200">
                Greetings! I am TerraAI. How may I assist with your terracotta interior vision today? Ask me about
                materials, estimated budgets, or design styles!
            </div>
        </div>
        <!-- Chat Input -->
        <div class="p-3 bg-terra-950 border-t border-terra-900 flex space-x-2">
            <input
                class="flex-1 bg-terra-900 border border-terra-800 rounded-xl px-3 py-2 text-xs text-terra-100 focus:outline-none"
                id="chat-input" onkeypress="if(event.key==='Enter') sendChatMessage()" placeholder="Ask TerraAI..."
                type="text" />
            <button class="bg-terra-700 text-terra-100 px-3 py-2 rounded-xl text-xs" onclick="sendChatMessage()"><i
                    class="fa-solid fa-paper-plane"></i></button>
        </div>
    </div>
    <!-- Notification Toast Message Box -->
    <div class="hidden fixed top-6 right-6 z-50 bg-terra-800 border border-copper-light text-terra-100 px-6 py-3 rounded-2xl shadow-2xl text-xs font-cinzel"
        id="toast-msg">
        <span id="toast-text">Consultation request sent successfully!</span>
    </div>
    <!-- JavaScript Logic -->
    <script defer="True"
        src="{{ asset('js/website-bisnis/templates/interior-architecture/interior-design-studio/artistic-terracotta/artistic-terracotta.js') }}">
    </script>
</body>

</html>
