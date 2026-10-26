<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AETHEL MOSS | Architectural & Building Design</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FontAwesome Icons CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&family=Syne:wght@400;600;700;800&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        forest: {
                            900: '#0B1911', // Deep Forest Dark
                            800: '#132E20', // Deep Moss
                            700: '#1E422F', // Forest Green
                            600: '#2E5D43', // Muted Moss
                            500: '#588157', // Sage Accent
                            300: '#8FB38D', // Soft Sage
                            100: '#E8F0E8', // Light Sage Tint
                        },
                        champagne: {
                            500: '#D4AF37', // Gold Metallic Accent
                            400: '#E5C76B',
                            300: '#F2E3B3',
                            100: '#FAF6E8',
                        },
                        linen: '#F4F1EA',
                        travertine: '#E3DED1',
                        darkSlate: '#0D110F',
                    },
                    fontFamily: {
                        syne: ['Syne', 'sans-serif'],
                        playfair: ['Playfair Display', 'serif'],
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                    },
                    backgroundImage: {
                        'hero-pattern': "radial-gradient(circle at 50% 50%, rgba(19, 46, 32, 0.8) 0%, rgba(11, 25, 17, 0.98) 100%)",
                        'gold-gradient': "linear-gradient(135deg, #D4AF37 0%, #E5C76B 50%, #9A7B1C 100%)",
                        'moss-gradient': "linear-gradient(135deg, #0B1911 0%, #132E20 50%, #1E422F 100%)",
                    }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="{{ asset('css/website-bisnis/templates/interior-architecture/architecture-building-design/aethel-moss/aethel-moss.css') }}">
</head>
<body class="bg-forest-900 text-linen font-sans antialiased overflow-x-hidden selection:bg-champagne-500 selection:text-forest-900">

    <!-- 1. TOPBAR: Studio Status & Global Timezones -->
    <div class="bg-darkSlate/90 border-b border-forest-700/40 text-xs py-2 px-4 md:px-8 text-linen/70 relative z-50">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center gap-2">
            <div class="flex items-center gap-6">
                <span class="flex items-center gap-2 text-champagne-400 font-medium">
                    <span class="w-2 h-2 rounded-full bg-emerald-400 animate-ping"></span>
                    STUDIO STATUS: ACCEPTING Q3/Q4 COMMISSIONS
                </span>
                <span class="hidden lg:inline text-linen/40">|</span>
                <span class="hidden lg:flex items-center gap-2 hover:text-champagne-400 transition-colors">
                    <i class="fa-solid me-1 fa-envelope text-champagne-500"></i> studio@aethelmoss.com
                </span>
            </div>
            
            <div class="flex items-center gap-6">
                <!-- World Clocks -->
                <div class="hidden sm:flex items-center gap-4 text-[11px] font-mono text-linen/60">
                    <span>JAK <strong id="clock-jk" class="text-linen">14:19</strong></span>
                    <span>SGP <strong id="clock-sg" class="text-linen">15:19</strong></span>
                    <span>TYO <strong id="clock-ty" class="text-linen">16:19</strong></span>
                    <span>LDN <strong id="clock-ld" class="text-linen">08:19</strong></span>
                </div>
                <button onclick="toggleQuickDrawer()" class="bg-forest-800 hover:bg-champagne-500 hover:text-forest-900 text-champagne-400 text-xs px-3 py-1 rounded-full border border-champagne-500/30 transition-all-custom font-semibold flex items-center gap-1.5">
                    <i class="fa-solid fa-bolt text-[10px]"></i> Quick Estimate
                </button>
            </div>
        </div>
    </div>

    <!-- 2. NAVBAR: Floating Glassmorphism Pill -->
    <header class="sticky top-4 z-40 px-4 md:px-8 max-w-7xl mx-auto">
        <nav class="glass-panel rounded-full px-6 py-3 flex items-center justify-between shadow-2xl transition-all duration-300 hover:border-champagne-500/40">
            <!-- Logo -->
            <a href="#" class="flex items-center gap-3 group">
                <div class="w-10 h-10 rounded-full bg-forest-800 border border-champagne-500/50 flex items-center justify-center group-hover:scale-105 transition-all">
                    <span class="font-syne font-bold text-lg text-champagne-400 tracking-tighter">AM</span>
                </div>
                <div class="flex flex-col">
                    <span class="font-syne font-bold tracking-widest text-lg text-linen leading-none">AETHEL<span class="text-champagne-400 font-normal">MOSS</span></span>
                    <span class="text-[9px] tracking-[0.25em] text-forest-300 font-mono">ARCHITECTS</span>
                </div>
            </a>

            <!-- Nav Links -->
            <div class="hidden lg:flex items-center gap-8 text-xs tracking-wider uppercase font-medium text-linen/80">
                <a href="#services" class="hover:text-champagne-400 transition-colors">Services</a>
                <a href="#portfolio" class="hover:text-champagne-400 transition-colors">Portfolio</a>
                <a href="#floorplan" class="hover:text-champagne-400 transition-colors">Floor Plans</a>
                <a href="#lighting-lab" class="hover:text-champagne-400 transition-colors">3D Viz Lab</a>
                <a href="#pricing" class="hover:text-champagne-400 transition-colors">Packages & Calc</a>
                <a href="#materials" class="hover:text-champagne-400 transition-colors">Materials</a>
                <a href="#process" class="hover:text-champagne-400 transition-colors">Process</a>
            </div>

            <!-- Actions & CTA -->
            <div class="flex items-center gap-3">
                <button class="text-xs font-mono text-linen/70 hover:text-champagne-400 border border-forest-600 rounded-full px-3 py-1">EN</button>
                <a href="#consultation" class="hidden sm:inline-flex bg-gold-gradient text-forest-900 font-bold text-xs px-5 py-2.5 rounded-full hover:shadow-lg hover:shadow-champagne-500/20 hover:scale-105 transition-all-custom items-center gap-2">
                    <span>BOOK CONSULTATION</span>
                    <i class="fa-solid fa-arrow-right text-[10px]"></i>
                </a>
                <!-- Mobile Menu Button -->
                <button onclick="toggleMobileMenu()" class="lg:hidden text-linen p-2 text-xl">
                    <i class="fa-solid fa-bars" id="menu-icon"></i>
                </button>
            </div>
        </nav>

        <!-- Mobile Drawer -->
        <div id="mobile-menu" class="hidden lg:hidden glass-panel rounded-2xl mt-2 p-6 flex flex-col gap-4 text-center border border-champagne-500/20">
            <a href="#services" onclick="toggleMobileMenu()" class="py-2 border-b border-forest-700/50">Services</a>
            <a href="#portfolio" onclick="toggleMobileMenu()" class="py-2 border-b border-forest-700/50">Portfolio</a>
            <a href="#floorplan" onclick="toggleMobileMenu()" class="py-2 border-b border-forest-700/50">Floor Plans</a>
            <a href="#lighting-lab" onclick="toggleMobileMenu()" class="py-2 border-b border-forest-700/50">3D Viz Lab</a>
            <a href="#pricing" onclick="toggleMobileMenu()" class="py-2 border-b border-forest-700/50">Packages</a>
            <a href="#process" onclick="toggleMobileMenu()" class="py-2 border-b border-forest-700/50">Process</a>
            <a href="#consultation" onclick="toggleMobileMenu()" class="bg-gold-gradient text-forest-900 font-bold py-3 rounded-xl mt-2">BOOK CONSULTATION</a>
        </div>
    </header>

    <!-- 3. HERO BANNER: Editorial Architecture Interactive Split-Screen -->
    <section class="relative min-h-[90vh] pt-12 pb-20 px-4 md:px-8 flex items-center justify-center overflow-hidden">
        <!-- Ambient Glow Backgrounds -->
        <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-forest-700/30 rounded-full blur-[120px] pointer-events-none"></div>
        <div class="absolute bottom-1/3 right-1/4 w-80 h-80 bg-champagne-500/10 rounded-full blur-[100px] pointer-events-none"></div>

        <div class="max-w-7xl mx-auto w-full grid grid-cols-1 lg:grid-cols-12 gap-12 items-center relative z-10">
            <!-- Left Hero Content -->
            <div class="lg:col-span-7 flex flex-col items-start gap-6">
                <div class="inline-flex items-center gap-3 px-4 py-1.5 rounded-full bg-forest-800/80 border border-champagne-500/30 text-xs text-champagne-400">
                    <i class="fa-solid fa-leaf text-forest-300"></i>
                    <span>BIOPHILIC & ORGANIC LUXURY ARCHITECTURE</span>
                </div>
                
                <h1 class="font-playfair text-4xl sm:text-6xl lg:text-7xl font-normal leading-tight text-linen">
                    Architectural <br>
                    <span class="italic text-champagne-400 font-normal">Sanctuaries</span> Designed for Generations.
                </h1>

                <p class="text-linen/70 text-base md:text-lg max-w-xl font-light leading-relaxed">
                    Aethel Moss blends sustainable biophilic design, precision BIM engineering, and timeless modern aesthetics to sculpt spaces that harmonize with nature.
                </p>

                <!-- Dual CTAs -->
                <div class="flex flex-wrap items-center gap-4 pt-2">
                    <a href="#consultation" class="bg-gold-gradient text-forest-900 font-bold px-8 py-4 rounded-full hover:shadow-xl hover:shadow-champagne-500/20 hover:-translate-y-0.5 transition-all-custom flex items-center gap-3">
                        <span>START COMMISION</span>
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                    <a href="#portfolio" class="bg-forest-800/80 hover:bg-forest-700 border border-champagne-500/30 text-linen px-8 py-4 rounded-full transition-all-custom flex items-center gap-3">
                        <i class="fa-regular fa-compass text-champagne-400"></i>
                        <span>EXPLORE PORTFOLIO</span>
                    </a>
                </div>

                <!-- Animated Metrics Counter Row -->
                <div class="grid grid-cols-3 gap-6 pt-10 border-t border-forest-700/50 w-full max-w-lg mt-4">
                    <div>
                        <div class="font-syne text-3xl md:text-4xl font-bold text-champagne-400" id="counter-sqm">180K+</div>
                        <div class="text-xs text-linen/60 mt-1 uppercase tracking-wider font-mono">SQM Designed</div>
                    </div>
                    <div>
                        <div class="font-syne text-3xl md:text-4xl font-bold text-champagne-400" id="counter-awards">24</div>
                        <div class="text-xs text-linen/60 mt-1 uppercase tracking-wider font-mono">Global Awards</div>
                    </div>
                    <div>
                        <div class="font-syne text-3xl md:text-4xl font-bold text-champagne-400" id="counter-satisfaction">99.4%</div>
                        <div class="text-xs text-linen/60 mt-1 uppercase tracking-wider font-mono">Satisfaction</div>
                    </div>
                </div>
            </div>

            <!-- Right Interactive Split View / Visual Showcase -->
            <div class="lg:col-span-5 relative">
                <div class="relative rounded-3xl overflow-hidden border border-champagne-500/30 shadow-2xl group">
                    <img id="hero-interactive-img" src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=1200&q=80" alt="Modern Architecture Villa" class="w-full h-[520px] object-cover transition-transform duration-700 group-hover:scale-105">
                    
                    <!-- Floating Project Tag Overlay -->
                    <div class="absolute bottom-6 left-6 right-6 glass-panel rounded-2xl p-4 border border-champagne-500/30 backdrop-blur-md">
                        <div class="flex justify-between items-center">
                            <div>
                                <span class="text-[10px] uppercase font-mono tracking-widest text-champagne-400">FEATURED COMMISSION</span>
                                <h3 class="font-playfair text-lg text-linen font-semibold">The Obsidian Moss Villa</h3>
                                <p class="text-xs text-linen/60">Ubud, Bali • 1,450 SQM • Completed 2025</p>
                            </div>
                            <button onclick="cycleHeroImage()" class="w-10 h-10 rounded-full bg-forest-800/80 border border-champagne-500/50 flex items-center justify-center text-champagne-400 hover:bg-champagne-500 hover:text-forest-900 transition-all">
                                <i class="fa-solid fa-arrows-rotate"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 4. ARCHITECTURAL DESIGN SERVICES -->
    <section id="services" class="py-24 px-4 md:px-8 bg-forest-800/30 border-y border-forest-700/40 relative">
        <div class="max-w-7xl mx-auto">
            <!-- Section Header -->
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-6">
                <div>
                    <span class="text-xs font-mono tracking-widest text-champagne-400 uppercase">EXPERTISE & CAPABILITIES</span>
                    <h2 class="font-playfair text-3xl sm:text-5xl font-normal text-linen mt-2">Comprehensive Design Services</h2>
                </div>
                <p class="text-linen/70 max-w-md text-sm font-light">
                    End-to-end architectural solutions engineered with Building Information Modeling (BIM), passive energy strategies, and tactile luxury.
                </p>
            </div>

            <!-- Service Tabs & Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Card 1 -->
                <div class="glass-panel p-8 rounded-3xl border border-forest-700 hover:border-champagne-500/50 transition-all-custom group hover:-translate-y-2">
                    <div class="w-14 h-14 rounded-2xl bg-forest-800 border border-champagne-500/30 flex items-center justify-center text-champagne-400 text-2xl mb-6 group-hover:bg-champagne-500 group-hover:text-forest-900 transition-all">
                        <i class="fa-solid fa-compass-drafting"></i>
                    </div>
                    <h3 class="font-syne text-xl font-bold text-linen mb-3">BIM Architectural Design</h3>
                    <p class="text-linen/70 text-sm leading-relaxed mb-6">
                        Full-scale LOD 400 BIM modeling delivering precise technical execution, structural integration, and clash detection before ground break.
                    </p>
                    <ul class="space-y-2 text-xs text-linen/80 font-mono border-t border-forest-700/60 pt-4">
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-champagne-400"></i> Parametric Geometry Modelling</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-champagne-400"></i> Code Compliance & Approvals</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-champagne-400"></i> High-Detail Working Blueprints</li>
                    </ul>
                </div>

                <!-- Card 2 -->
                <div class="glass-panel p-8 rounded-3xl border border-forest-700 hover:border-champagne-500/50 transition-all-custom group hover:-translate-y-2">
                    <div class="w-14 h-14 rounded-2xl bg-forest-800 border border-champagne-500/30 flex items-center justify-center text-champagne-400 text-2xl mb-6 group-hover:bg-champagne-500 group-hover:text-forest-900 transition-all">
                        <i class="fa-solid fa-seedling"></i>
                    </div>
                    <h3 class="font-syne text-xl font-bold text-linen mb-3">Sustainable Passive Design</h3>
                    <p class="text-linen/70 text-sm leading-relaxed mb-6">
                        Eco-responsive architecture utilizing natural solar orientation, cross-ventilation corridors, and green roof thermal insulation.
                    </p>
                    <ul class="space-y-2 text-xs text-linen/80 font-mono border-t border-forest-700/60 pt-4">
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-champagne-400"></i> Net-Zero Energy Strategies</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-champagne-400"></i> Rainwater Harvesting Integration</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-champagne-400"></i> Integrated Preserved Moss Systems</li>
                    </ul>
                </div>

                <!-- Card 3 -->
                <div class="glass-panel p-8 rounded-3xl border border-forest-700 hover:border-champagne-500/50 transition-all-custom group hover:-translate-y-2">
                    <div class="w-14 h-14 rounded-2xl bg-forest-800 border border-champagne-500/30 flex items-center justify-center text-champagne-400 text-2xl mb-6 group-hover:bg-champagne-500 group-hover:text-forest-900 transition-all">
                        <i class="fa-solid fa-couch"></i>
                    </div>
                    <h3 class="font-syne text-xl font-bold text-linen mb-3">Luxury Interior Integration</h3>
                    <p class="text-linen/70 text-sm leading-relaxed mb-6">
                        Seamless fusion of exterior architecture with bespoke interior spatial layouts, custom joinery, and organic lighting flows.
                    </p>
                    <ul class="space-y-2 text-xs text-linen/80 font-mono border-t border-forest-700/60 pt-4">
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-champagne-400"></i> Custom Millwork & Joinery</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-champagne-400"></i> Tactile Material Curation</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-champagne-400"></i> Architectural Lighting Design</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- 5. BUILDING DESIGN PORTFOLIO: Filterable Grid & Detail Modal -->
    <section id="portfolio" class="py-24 px-4 md:px-8 max-w-7xl mx-auto">
        <div class="text-center max-w-3xl mx-auto mb-12">
            <span class="text-xs font-mono tracking-widest text-champagne-400 uppercase">SELECTED WORKS</span>
            <h2 class="font-playfair text-4xl md:text-5xl font-normal text-linen mt-2">Architectural Portfolio</h2>
        </div>

        <!-- Category Filters -->
        <div class="flex flex-wrap items-center justify-center gap-3 mb-12">
            <button onclick="filterPortfolio('all')" class="port-filter-btn bg-champagne-500 text-forest-900 font-bold px-6 py-2 rounded-full text-xs transition-all">ALL PROJECTS</button>
            <button onclick="filterPortfolio('residential')" class="port-filter-btn glass-panel text-linen hover:text-champagne-400 px-6 py-2 rounded-full text-xs transition-all">RESIDENTIAL</button>
            <button onclick="filterPortfolio('commercial')" class="port-filter-btn glass-panel text-linen hover:text-champagne-400 px-6 py-2 rounded-full text-xs transition-all">COMMERCIAL</button>
            <button onclick="filterPortfolio('hospitality')" class="port-filter-btn glass-panel text-linen hover:text-champagne-400 px-6 py-2 rounded-full text-xs transition-all">HOSPITALITY</button>
        </div>

        <!-- Portfolio Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="portfolio-grid">
            <!-- Project Card 1 -->
            <div class="port-item residential glass-panel rounded-3xl overflow-hidden border border-forest-700 group hover:border-champagne-500/50 transition-all-custom cursor-pointer" onclick="openProjectModal('The Emerald Horizon Villa', 'Residential', '1,250 SQM', 'Nusa Dua, Bali', 'https://images.unsplash.com/photo-1613490493576-7fde63acd811?auto=format&fit=crop&w=800&q=80', 'A cliffside biophilic sanctuary featuring cantilevered infinity pools and automated louver facades.')">
                <div class="relative h-72 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1613490493576-7fde63acd811?auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" alt="Villa">
                    <div class="absolute inset-0 bg-gradient-to-t from-forest-900 via-transparent to-transparent opacity-80"></div>
                    <span class="absolute top-4 left-4 bg-forest-900/80 text-champagne-400 text-[10px] font-mono px-3 py-1 rounded-full border border-champagne-500/30">RESIDENTIAL</span>
                </div>
                <div class="p-6">
                    <h3 class="font-playfair text-xl font-bold text-linen mb-2 group-hover:text-champagne-400 transition-colors">The Emerald Horizon Villa</h3>
                    <div class="flex items-center justify-between text-xs text-linen/60 font-mono border-t border-forest-700/50 pt-4 mt-2">
                        <span>1,250 SQM</span>
                        <span>Nusa Dua, Bali</span>
                        <span>2025</span>
                    </div>
                </div>
            </div>

            <!-- Project Card 2 -->
            <div class="port-item commercial glass-panel rounded-3xl overflow-hidden border border-forest-700 group hover:border-champagne-500/50 transition-all-custom cursor-pointer" onclick="openProjectModal('Vertex Moss HQ Tower', 'Commercial', '18,500 SQM', 'Jakarta, CBD', 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=800&q=80', 'High-rise sustainable tower integrated with vertical preserved moss gardens and solar skin.')">
                <div class="relative h-72 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" alt="Tower">
                    <div class="absolute inset-0 bg-gradient-to-t from-forest-900 via-transparent to-transparent opacity-80"></div>
                    <span class="absolute top-4 left-4 bg-forest-900/80 text-champagne-400 text-[10px] font-mono px-3 py-1 rounded-full border border-champagne-500/30">COMMERCIAL</span>
                </div>
                <div class="p-6">
                    <h3 class="font-playfair text-xl font-bold text-linen mb-2 group-hover:text-champagne-400 transition-colors">Vertex Moss HQ Tower</h3>
                    <div class="flex items-center justify-between text-xs text-linen/60 font-mono border-t border-forest-700/50 pt-4 mt-2">
                        <span>18,500 SQM</span>
                        <span>Jakarta, CBD</span>
                        <span>2024</span>
                    </div>
                </div>
            </div>

            <!-- Project Card 3 -->
            <div class="port-item hospitality glass-panel rounded-3xl overflow-hidden border border-forest-700 group hover:border-champagne-500/50 transition-all-custom cursor-pointer" onclick="openProjectModal('AURA Forest Eco Retreat', 'Hospitality', '4,800 SQM', 'Kyoto, Japan', 'https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?auto=format&fit=crop&w=800&q=80', 'Ultra-luxury eco-resort pavilion designed with Japanese cedar, travertine walls, and passive thermal mass.')">
                <div class="relative h-72 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" alt="Resort">
                    <div class="absolute inset-0 bg-gradient-to-t from-forest-900 via-transparent to-transparent opacity-80"></div>
                    <span class="absolute top-4 left-4 bg-forest-900/80 text-champagne-400 text-[10px] font-mono px-3 py-1 rounded-full border border-champagne-500/30">HOSPITALITY</span>
                </div>
                <div class="p-6">
                    <h3 class="font-playfair text-xl font-bold text-linen mb-2 group-hover:text-champagne-400 transition-colors">AURA Forest Eco Retreat</h3>
                    <div class="flex items-center justify-between text-xs text-linen/60 font-mono border-t border-forest-700/50 pt-4 mt-2">
                        <span>4,800 SQM</span>
                        <span>Kyoto, Japan</span>
                        <span>2025</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 6. RESIDENTIAL & COMMERCIAL CATEGORIES COMPARISON -->
    <section class="py-20 px-4 md:px-8 bg-forest-800/40 border-y border-forest-700/40">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                <!-- Residential Pillar -->
                <div class="glass-panel p-8 rounded-3xl border border-champagne-500/20 relative overflow-hidden">
                    <span class="text-xs font-mono text-champagne-400 uppercase tracking-widest">PILLAR 01</span>
                    <h3 class="font-playfair text-3xl font-bold text-linen mt-2 mb-4">Luxury Residential</h3>
                    <p class="text-linen/70 text-sm leading-relaxed mb-6">
                        Custom tailored private estates, cliffside retreats, and biophilic multi-family compounds focused on serene living and long-term valuation.
                    </p>
                    <div class="grid grid-cols-2 gap-4 text-xs font-mono text-linen/80">
                        <div class="bg-forest-900/60 p-3 rounded-xl border border-forest-700"><i class="fa-solid fa-home text-champagne-400 mb-1 block"></i> Private Villas</div>
                        <div class="bg-forest-900/60 p-3 rounded-xl border border-forest-700"><i class="fa-solid fa-building text-champagne-400 mb-1 block"></i> Modern Penthouses</div>
                    </div>
                </div>

                <!-- Commercial Pillar -->
                <div class="glass-panel p-8 rounded-3xl border border-champagne-500/20 relative overflow-hidden">
                    <span class="text-xs font-mono text-champagne-400 uppercase tracking-widest">PILLAR 02</span>
                    <h3 class="font-playfair text-3xl font-bold text-linen mt-2 mb-4">Commercial & Iconic HQ</h3>
                    <p class="text-linen/70 text-sm leading-relaxed mb-6">
                        State-of-the-art corporate headquarters, luxury retail flagship spaces, and boutique hospitality developments engineered for impact.
                    </p>
                    <div class="grid grid-cols-2 gap-4 text-xs font-mono text-linen/80">
                        <div class="bg-forest-900/60 p-3 rounded-xl border border-forest-700"><i class="fa-solid fa-briefcase text-champagne-400 mb-1 block"></i> Green Offce Towers</div>
                        <div class="bg-forest-900/60 p-3 rounded-xl border border-forest-700"><i class="fa-solid fa-hotel text-champagne-400 mb-1 block"></i> Boutique Resorts</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 7. HOUSE PLANS & FLOOR PLAN GALLERY LAB -->
    <section id="floorplan" class="py-24 px-4 md:px-8 max-w-7xl mx-auto">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="text-xs font-mono tracking-widest text-champagne-400 uppercase">INTERACTIVE FLOOR PLAN LAB</span>
            <h2 class="font-playfair text-4xl md:text-5xl font-normal text-linen mt-2">Spatial Architecture Blueprint</h2>
            <p class="text-linen/70 text-sm font-light mt-4">Switch floor layers and hover over interactive hotspots to reveal spatial engineering specs.</p>
        </div>

        <div class="glass-panel rounded-3xl p-6 md:p-10 border border-champagne-500/30">
            <!-- Layer Controls -->
            <div class="flex flex-wrap items-center justify-between gap-4 mb-8 border-b border-forest-700 pb-6">
                <div class="flex items-center gap-3">
                    <button onclick="switchFloorLayer('ground')" id="btn-floor-ground" class="bg-champagne-500 text-forest-900 font-bold px-5 py-2 rounded-full text-xs transition-all">GROUND FLOOR</button>
                    <button onclick="switchFloorLayer('first')" id="btn-floor-first" class="glass-panel text-linen hover:text-champagne-400 px-5 py-2 rounded-full text-xs transition-all">1ST FLOOR SUITE</button>
                    <button onclick="switchFloorLayer('rooftop')" id="btn-floor-rooftop" class="glass-panel text-linen hover:text-champagne-400 px-5 py-2 rounded-full text-xs transition-all">ROOFTOP TERRACE</button>
                </div>
                <div class="text-xs font-mono text-champagne-400 flex items-center gap-2">
                    <i class="fa-solid fa-layer-group"></i> <span id="floor-layer-title">Ground Level: Grand Living & Courtyard</span>
                </div>
            </div>

            <!-- Floor Plan Display Area with Clickable Hotspots -->
            <div class="relative rounded-2xl bg-forest-900/90 border border-forest-700 p-8 min-h-[420px] flex items-center justify-center overflow-hidden">
                <!-- SVG Vector Grid Floor Plan Simulation -->
                <svg class="w-full max-w-3xl h-80 stroke-champagne-500/40 fill-none" viewBox="0 0 800 400">
                    <rect x="40" y="40" width="720" height="320" rx="10" stroke-width="2" stroke-dasharray="6,6" />
                    <!-- Outer Walls -->
                    <rect x="60" y="60" width="320" height="280" stroke="#D4AF37" stroke-width="3" />
                    <rect x="420" y="60" width="320" height="280" stroke="#D4AF37" stroke-width="3" />
                    <!-- Inner Partition Lines -->
                    <line x1="60" y1="180" x2="380" y2="180" stroke="#588157" stroke-width="2" />
                    <line x1="220" y1="180" x2="220" y2="340" stroke="#588157" stroke-width="2" />
                    <circle cx="580" cy="200" r="60" stroke="#D4AF37" stroke-width="2" />
                </svg>

                <!-- Hotspot 1: Living Area -->
                <div class="absolute top-1/3 left-1/4 group cursor-pointer" onclick="showHotspotInfo('Living Sanctuary', 'Double-height ceiling, floor-to-ceiling Low-E glass facade facing natural sunlight.')">
                    <div class="w-8 h-8 rounded-full bg-champagne-500/30 flex items-center justify-center border border-champagne-500 relative">
                        <span class="w-3 h-3 rounded-full bg-champagne-400"></span>
                        <div class="absolute inset-0 rounded-full border border-champagne-400 animate-ripple"></div>
                    </div>
                </div>

                <!-- Hotspot 2: Courtyard -->
                <div class="absolute bottom-1/3 right-1/3 group cursor-pointer" onclick="showHotspotInfo('Preserved Moss Atrium', 'Central passive cooling airshaft integrated with indoor waterfall feature.')">
                    <div class="w-8 h-8 rounded-full bg-emerald-500/30 flex items-center justify-center border border-emerald-400 relative">
                        <span class="w-3 h-3 rounded-full bg-emerald-400"></span>
                        <div class="absolute inset-0 rounded-full border border-emerald-400 animate-ripple"></div>
                    </div>
                </div>
            </div>

            <!-- Dynamic Hotspot Info Bar -->
            <div id="hotspot-info" class="mt-6 p-4 rounded-xl bg-forest-800/60 border border-forest-700 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <i class="fa-solid fa-circle-info text-champagne-400 text-lg"></i>
                    <div>
                        <h4 class="font-syne text-sm font-bold text-linen" id="hotspot-title">Interactive Room Callout</h4>
                        <p class="text-xs text-linen/70" id="hotspot-desc">Click any pulsing hotspot marker on the blueprint above to inspect space layout details.</p>
                    </div>
                </div>
                <button class="bg-forest-900 text-champagne-400 text-xs px-4 py-2 rounded-lg border border-champagne-500/30 hover:bg-champagne-500 hover:text-forest-900 transition-all font-mono">
                    <i class="fa-solid fa-download me-1"></i> CAD Specs (.DWG)
                </button>
            </div>
        </div>
    </section>

    <!-- 8. 3D RENDERING & VISUALIZATION GALLERY (WITH 4 WORKING LIGHTING MODES) -->
    <section id="lighting-lab" class="py-24 px-4 md:px-8 bg-forest-800/30 border-y border-forest-700/40">
        <div class="max-w-7xl mx-auto">
            <div class="text-center max-w-3xl mx-auto mb-12">
                <span class="text-xs font-mono tracking-widest text-champagne-400 uppercase">LIGHTING SIMULATION ENGINE</span>
                <h2 class="font-playfair text-4xl md:text-5xl font-normal text-linen mt-2">Dynamic Architectural Lighting Lab</h2>
                <p class="text-linen/70 text-sm font-light mt-2">Test how light interacts with architectural facade materials across 4 distinct times of day.</p>
            </div>

            <!-- Lighting Controls -->
            <div class="flex flex-wrap items-center justify-center gap-4 mb-8">
                <button onclick="setLightingMode('dawn')" id="btn-light-dawn" class="light-mode-btn bg-forest-800 text-linen border border-forest-600 px-6 py-3 rounded-2xl text-xs font-bold transition-all flex items-center gap-2">
                    <i class="fa-solid fa-sun text-purple-300"></i> Dawn (05:00)
                </button>
                <button onclick="setLightingMode('daylight')" id="btn-light-daylight" class="light-mode-btn bg-champagne-500 text-forest-900 font-bold px-6 py-3 rounded-2xl text-xs transition-all flex items-center gap-2 shadow-lg">
                    <i class="fa-solid fa-sun text-amber-900"></i> Daylight (12:00)
                </button>
                <button onclick="setLightingMode('dusk')" id="btn-light-dusk" class="light-mode-btn bg-forest-800 text-linen border border-forest-600 px-6 py-3 rounded-2xl text-xs font-bold transition-all flex items-center gap-2">
                    <i class="fa-solid fa-cloud-sun text-orange-400"></i> Dusk (18:00)
                </button>
                <button onclick="setLightingMode('night')" id="btn-light-night" class="light-mode-btn bg-forest-800 text-linen border border-forest-600 px-6 py-3 rounded-2xl text-xs font-bold transition-all flex items-center gap-2">
                    <i class="fa-solid fa-moon text-blue-300"></i> Night (21:00)
                </button>
            </div>

            <!-- Main Render Canvas Simulation Frame -->
            <div class="relative rounded-3xl overflow-hidden border border-champagne-500/40 shadow-2xl min-h-[500px] flex items-end p-8" id="lighting-canvas-bg" style="background: linear-gradient(180deg, #1A2E3B 0%, #132E20 100%);">
                <!-- Lighting Overlay Filter -->
                <div id="lighting-overlay" class="absolute inset-0 bg-amber-500/10 transition-all duration-700 pointer-events-none"></div>

                <!-- Simulation Architecture Facade Image -->
                <img src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?auto=format&fit=crop&w=1400&q=80" alt="Villa Simulation" class="absolute inset-0 w-full h-full object-cover mix-blend-overlay opacity-90 transition-all duration-700">

                <!-- Lighting Spec Overlay Box -->
                <div class="relative z-10 glass-panel p-6 rounded-2xl border border-champagne-500/30 max-w-md backdrop-blur-md">
                    <div class="flex items-center justify-between mb-3">
                        <span class="text-xs font-mono text-champagne-400 uppercase tracking-wider" id="light-mode-tag">DAYLIGHT SIMULATION</span>
                        <span class="text-xs font-mono text-linen/70" id="light-lux-meter">10,000 LUX • 5500K</span>
                    </div>
                    <h3 class="font-playfair text-2xl text-linen font-bold" id="light-mode-title">Natural Solar Horizon</h3>
                    <p class="text-xs text-linen/80 mt-2 leading-relaxed" id="light-mode-desc">
                        Full spectrum daylight revealing raw warm travertine texture, reflection off low-emissivity glazed windows, and deep natural shadows.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- 9. BUILDING DESIGN PACKAGES & DYNAMIC SQM ESTIMATOR -->
    <section id="pricing" class="py-24 px-4 md:px-8 max-w-7xl mx-auto">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="text-xs font-mono tracking-widest text-champagne-400 uppercase">TRANSPARENT INVESTMENT</span>
            <h2 class="font-playfair text-4xl md:text-5xl font-normal text-linen mt-2">Design Packages & Estimation Calculator</h2>
        </div>

        <!-- Dynamic SQM Calculator Slider -->
        <div class="glass-panel p-8 rounded-3xl border border-champagne-500/30 mb-16">
            <h3 class="font-syne text-xl font-bold text-linen mb-6 flex items-center gap-2">
                <i class="fa-solid fa-calculator text-champagne-400"></i> Instant Project Cost Estimator
            </h3>
            
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                <div class="lg:col-span-7">
                    <div class="flex justify-between items-center mb-2 text-sm font-mono">
                        <span class="text-linen/70">Building Footprint Area:</span>
                        <span class="text-champagne-400 font-bold text-lg"><span id="sqm-val">450</span> SQM</span>
                    </div>
                    <input type="range" id="sqm-slider" min="100" max="2000" step="25" value="450" oninput="updateSqmCalc(this.value)" class="w-full h-2 bg-forest-700 rounded-lg appearance-none cursor-pointer accent-champagne-500">
                    <div class="flex justify-between text-[10px] text-linen/40 font-mono mt-1">
                        <span>100 SQM</span>
                        <span>1,000 SQM</span>
                        <span>2,000+ SQM</span>
                    </div>
                </div>

                <div class="lg:col-span-5 bg-forest-900/80 p-6 rounded-2xl border border-forest-700 flex flex-col justify-between">
                    <div>
                        <span class="text-[10px] font-mono text-linen/60 uppercase">Estimated Architectural Fee</span>
                        <div class="font-syne text-3xl font-bold text-champagne-400 mt-1" id="est-cost-display">$67,500 USD</div>
                        <p class="text-[11px] text-linen/50 mt-1">Includes Schematic Design, BIM LOD 350, & Engineering Docs.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- 3 Tier Package Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Tier 1 -->
            <div class="glass-panel p-8 rounded-3xl border border-forest-700 flex flex-col justify-between hover:border-champagne-500/50 transition-all">
                <div>
                    <span class="text-xs font-mono text-champagne-400 uppercase">TIER 01</span>
                    <h3 class="font-playfair text-2xl font-bold text-linen mt-1">Concept Blueprint Pass</h3>
                    <p class="text-xs text-linen/60 mt-2">Essential schematic layouts and structural concept blueprints.</p>
                    <div class="my-6">
                        <span class="font-syne text-3xl font-bold text-linen">$120</span>
                        <span class="text-xs text-linen/60">/ SQM</span>
                    </div>
                    <ul class="space-y-3 text-xs text-linen/80">
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-champagne-400"></i> Conceptual Architectural Layouts</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-champagne-400"></i> 3D Exterior Mood Renderings</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-champagne-400"></i> Site & Elevation Masterplan</li>
                    </ul>
                </div>
                <a href="#consultation" class="mt-8 w-full bg-forest-800 hover:bg-champagne-500 hover:text-forest-900 border border-champagne-500/30 text-champagne-400 font-bold py-3 rounded-xl text-xs text-center transition-all">SELECT BLUEPRINT</a>
            </div>

            <!-- Tier 2 (Highlighted) -->
            <div class="glass-panel p-8 rounded-3xl border-2 border-champagne-500 relative flex flex-col justify-between glow-gold">
                <span class="absolute -top-3 right-8 bg-champagne-500 text-forest-900 font-bold text-[10px] font-mono px-3 py-1 rounded-full uppercase">MOST POPULAR</span>
                <div>
                    <span class="text-xs font-mono text-champagne-400 uppercase">TIER 02</span>
                    <h3 class="font-playfair text-2xl font-bold text-linen mt-1">Full Executive BIM</h3>
                    <p class="text-xs text-linen/60 mt-2">Complete working technical drawings, MEP & full structural engineering.</p>
                    <div class="my-6">
                        <span class="font-syne text-3xl font-bold text-champagne-400">$180</span>
                        <span class="text-xs text-linen/60">/ SQM</span>
                    </div>
                    <ul class="space-y-3 text-xs text-linen/80">
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-champagne-400"></i> Everything in Tier 01</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-champagne-400"></i> LOD 400 BIM Construction Blueprint</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-champagne-400"></i> Full MEP & Structural Specifications</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-champagne-400"></i> Material Board Curation</li>
                    </ul>
                </div>
                <a href="#consultation" class="mt-8 w-full bg-gold-gradient text-forest-900 font-bold py-3 rounded-xl text-xs text-center shadow-lg hover:scale-105 transition-all">SELECT EXECUTIVE</a>
            </div>

            <!-- Tier 3 -->
            <div class="glass-panel p-8 rounded-3xl border border-forest-700 flex flex-col justify-between hover:border-champagne-500/50 transition-all">
                <div>
                    <span class="text-xs font-mono text-champagne-400 uppercase">TIER 03</span>
                    <h3 class="font-playfair text-2xl font-bold text-linen mt-1">Turnkey Mastermind</h3>
                    <p class="text-xs text-linen/60 mt-2">End-to-end architecture, luxury interior, landscaping & site oversight.</p>
                    <div class="my-6">
                        <span class="font-syne text-3xl font-bold text-linen">$260</span>
                        <span class="text-xs text-linen/60">/ SQM</span>
                    </div>
                    <ul class="space-y-3 text-xs text-linen/80">
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-champagne-400"></i> Everything in Tier 02</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-champagne-400"></i> Full Custom Interior Design</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-champagne-400"></i> Biophilic Landscape Masterplan</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-champagne-400"></i> On-site Weekly Construction Oversight</li>
                    </ul>
                </div>
                <a href="#consultation" class="mt-8 w-full bg-forest-800 hover:bg-champagne-500 hover:text-forest-900 border border-champagne-500/30 text-champagne-400 font-bold py-3 rounded-xl text-xs text-center transition-all">SELECT TURNKEY</a>
            </div>
        </div>
    </section>

    <!-- 10. PROJECT SPECIFICATIONS & TACTILE MATERIAL SWATCH GALLERY -->
    <section id="materials" class="py-24 px-4 md:px-8 bg-forest-800/30 border-y border-forest-700/40">
        <div class="max-w-7xl mx-auto">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-xs font-mono tracking-widest text-champagne-400 uppercase">TACTILE CURATION</span>
                <h2 class="font-playfair text-4xl md:text-5xl font-normal text-linen mt-2">Architectural Material Library</h2>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-6">
                <!-- Swatch 1 -->
                <div class="glass-panel p-4 rounded-2xl border border-forest-700 hover:border-champagne-500 transition-all text-center group cursor-pointer">
                    <div class="w-full h-32 rounded-xl bg-forest-800 border border-champagne-500/30 mb-4 overflow-hidden relative flex items-center justify-center">
                        <div class="w-full h-full bg-emerald-950 opacity-90 group-hover:scale-110 transition-transform"></div>
                        <span class="absolute text-[10px] font-mono text-champagne-400 bg-forest-900/80 px-2 py-0.5 rounded">PRESERVED MOSS</span>
                    </div>
                    <h4 class="font-syne text-sm font-bold text-linen">Scandi Moss Facade</h4>
                    <p class="text-[10px] text-linen/60 mt-1">Acoustic & Humidity Control</p>
                </div>

                <!-- Swatch 2 -->
                <div class="glass-panel p-4 rounded-2xl border border-forest-700 hover:border-champagne-500 transition-all text-center group cursor-pointer">
                    <div class="w-full h-32 rounded-xl bg-travertine/20 border border-champagne-500/30 mb-4 overflow-hidden relative flex items-center justify-center">
                        <div class="w-full h-full bg-stone-300 opacity-60 group-hover:scale-110 transition-transform"></div>
                        <span class="absolute text-[10px] font-mono text-champagne-400 bg-forest-900/80 px-2 py-0.5 rounded">STONE</span>
                    </div>
                    <h4 class="font-syne text-sm font-bold text-linen">Travertine Marble</h4>
                    <p class="text-[10px] text-linen/60 mt-1">Warm Tactile Facade Cladding</p>
                </div>

                <!-- Swatch 3 -->
                <div class="glass-panel p-4 rounded-2xl border border-forest-700 hover:border-champagne-500 transition-all text-center group cursor-pointer">
                    <div class="w-full h-32 rounded-xl bg-amber-900/40 border border-champagne-500/30 mb-4 overflow-hidden relative flex items-center justify-center">
                        <div class="w-full h-full bg-amber-950 opacity-80 group-hover:scale-110 transition-transform"></div>
                        <span class="absolute text-[10px] font-mono text-champagne-400 bg-forest-900/80 px-2 py-0.5 rounded">TIMBER</span>
                    </div>
                    <h4 class="font-syne text-sm font-bold text-linen">Sustain-Bamboo Cedar</h4>
                    <p class="text-[10px] text-linen/60 mt-1">Thermal Insulation Slats</p>
                </div>

                <!-- Swatch 4 -->
                <div class="glass-panel p-4 rounded-2xl border border-forest-700 hover:border-champagne-500 transition-all text-center group cursor-pointer">
                    <div class="w-full h-32 rounded-xl bg-yellow-600/30 border border-champagne-500/30 mb-4 overflow-hidden relative flex items-center justify-center">
                        <div class="w-full h-full bg-yellow-700 opacity-60 group-hover:scale-110 transition-transform"></div>
                        <span class="absolute text-[10px] font-mono text-champagne-400 bg-forest-900/80 px-2 py-0.5 rounded">METALLIC</span>
                    </div>
                    <h4 class="font-syne text-sm font-bold text-linen">Brushed Copper Trim</h4>
                    <p class="text-[10px] text-linen/60 mt-1">Weather-Resistant Detailing</p>
                </div>

                <!-- Swatch 5 -->
                <div class="glass-panel p-4 rounded-2xl border border-forest-700 hover:border-champagne-500 transition-all text-center group cursor-pointer">
                    <div class="w-full h-32 rounded-xl bg-slate-800 border border-champagne-500/30 mb-4 overflow-hidden relative flex items-center justify-center">
                        <div class="w-full h-full bg-slate-900 opacity-90 group-hover:scale-110 transition-transform"></div>
                        <span class="absolute text-[10px] font-mono text-champagne-400 bg-forest-900/80 px-2 py-0.5 rounded">GLAZING</span>
                    </div>
                    <h4 class="font-syne text-sm font-bold text-linen">Low-E Smoked Glass</h4>
                    <p class="text-[10px] text-linen/60 mt-1">72% Solar Heat Reduction</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 11. DESIGN & CONSTRUCTION PLANNING PROCESS -->
    <section id="process" class="py-24 px-4 md:px-8 max-w-7xl mx-auto">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="text-xs font-mono tracking-widest text-champagne-400 uppercase">METHODOLOGY</span>
            <h2 class="font-playfair text-4xl md:text-5xl font-normal text-linen mt-2">5-Step Execution Workflow</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-5 gap-6 relative">
            <!-- Step 1 -->
            <div class="glass-panel p-6 rounded-2xl border border-forest-700 text-center relative">
                <span class="w-10 h-10 rounded-full bg-champagne-500 text-forest-900 font-bold font-syne flex items-center justify-center mx-auto mb-4">01</span>
                <h4 class="font-syne text-base font-bold text-linen">Site Analysis</h4>
                <p class="text-xs text-linen/60 mt-2">Topography mapping, sun-path study, and environmental regulations check.</p>
            </div>
            <!-- Step 2 -->
            <div class="glass-panel p-6 rounded-2xl border border-forest-700 text-center relative">
                <span class="w-10 h-10 rounded-full bg-forest-800 text-champagne-400 border border-champagne-500/30 font-bold font-syne flex items-center justify-center mx-auto mb-4">02</span>
                <h4 class="font-syne text-base font-bold text-linen">Concept Design</h4>
                <p class="text-xs text-linen/60 mt-2">Initial spatial schematics, 3D volumetric studies, and material moodboards.</p>
            </div>
            <!-- Step 3 -->
            <div class="glass-panel p-6 rounded-2xl border border-forest-700 text-center relative">
                <span class="w-10 h-10 rounded-full bg-forest-800 text-champagne-400 border border-champagne-500/30 font-bold font-syne flex items-center justify-center mx-auto mb-4">03</span>
                <h4 class="font-syne text-base font-bold text-linen">BIM & Technical</h4>
                <p class="text-xs text-linen/60 mt-2">Full MEP clash detection, LOD 400 drawings, and structural engineering.</p>
            </div>
            <!-- Step 4 -->
            <div class="glass-panel p-6 rounded-2xl border border-forest-700 text-center relative">
                <span class="w-10 h-10 rounded-full bg-forest-800 text-champagne-400 border border-champagne-500/30 font-bold font-syne flex items-center justify-center mx-auto mb-4">04</span>
                <h4 class="font-syne text-base font-bold text-linen">Permits & Bidding</h4>
                <p class="text-xs text-linen/60 mt-2">Government building authorization approval and contractor tender reviews.</p>
            </div>
            <!-- Step 5 -->
            <div class="glass-panel p-6 rounded-2xl border border-forest-700 text-center relative">
                <span class="w-10 h-10 rounded-full bg-forest-800 text-champagne-400 border border-champagne-500/30 font-bold font-syne flex items-center justify-center mx-auto mb-4">05</span>
                <h4 class="font-syne text-base font-bold text-linen">Oversight</h4>
                <p class="text-xs text-linen/60 mt-2">Weekly site quality audits, drone progress tracking, and final client hand-over.</p>
            </div>
        </div>
    </section>

    <!-- 12. PROJECT PROGRESS SHOWCASE DASHBOARD PREVIEW -->
    <section class="py-20 px-4 md:px-8 bg-forest-800/40 border-y border-forest-700/40">
        <div class="max-w-7xl mx-auto">
            <div class="glass-panel rounded-3xl p-8 border border-champagne-500/30">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8">
                    <div>
                        <span class="text-[10px] font-mono text-champagne-400 uppercase tracking-widest">LIVE CLIENT PORTAL DEMO</span>
                        <h3 class="font-playfair text-2xl font-bold text-linen">Active Site Construction Status</h3>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-500/20 text-emerald-300 text-xs font-mono border border-emerald-500/30">
                            <span class="w-2 h-2 rounded-full bg-emerald-400 animate-ping"></span> Live Drone Link Active
                        </span>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <div class="bg-forest-900/80 p-6 rounded-2xl border border-forest-700">
                        <span class="text-xs text-linen/60 font-mono">PROJECT NAME</span>
                        <h4 class="font-syne text-lg font-bold text-linen mt-1">Serenade Cliff Residence</h4>
                        <div class="mt-4">
                            <div class="flex justify-between text-xs font-mono mb-1">
                                <span class="text-linen/70">Structural Completion</span>
                                <span class="text-champagne-400">78%</span>
                            </div>
                            <div class="w-full bg-forest-800 h-2 rounded-full overflow-hidden">
                                <div class="bg-champagne-500 h-full w-[78%]"></div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-forest-900/80 p-6 rounded-2xl border border-forest-700">
                        <span class="text-xs text-linen/60 font-mono">CURRENT MILESTONE</span>
                        <h4 class="font-syne text-lg font-bold text-linen mt-1">Facade Glass Installation</h4>
                        <p class="text-xs text-linen/60 mt-2">Low-E double glazing panels being lifted via specialized tower crane.</p>
                    </div>

                    <div class="bg-forest-900/80 p-6 rounded-2xl border border-forest-700 flex items-center justify-between">
                        <div>
                            <span class="text-xs text-linen/60 font-mono">NEXT INSPECTION</span>
                            <h4 class="font-syne text-lg font-bold text-champagne-400 mt-1">Oct 28, 2026</h4>
                            <p class="text-xs text-linen/60">Lead Structural Engineer Review</p>
                        </div>
                        <i class="fa-solid fa-calendar-check text-3xl text-champagne-500/50"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 13. ARCHITECT & DESIGN TEAM PROFILES -->
    <section class="py-24 px-4 md:px-8 max-w-7xl mx-auto">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="text-xs font-mono tracking-widest text-champagne-400 uppercase">LEADERSHIP</span>
            <h2 class="font-playfair text-4xl md:text-5xl font-normal text-linen mt-2">Principal Architects & Directors</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Profile 1 -->
            <div class="glass-panel rounded-3xl overflow-hidden border border-forest-700 group hover:border-champagne-500/50 transition-all">
                <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=600&q=80" alt="Architect" class="w-full h-80 object-cover group-hover:scale-105 transition-transform duration-500">
                <div class="p-6">
                    <h3 class="font-playfair text-xl font-bold text-linen">Eleanor Vance, AIA</h3>
                    <p class="text-xs text-champagne-400 font-mono mt-1">Principal & Founder</p>
                    <p class="text-xs text-linen/70 mt-3">Former Senior Associate at Zaha Hadid Architects with 18+ years leading luxury biophilic masterplans.</p>
                </div>
            </div>

            <!-- Profile 2 -->
            <div class="glass-panel rounded-3xl overflow-hidden border border-forest-700 group hover:border-champagne-500/50 transition-all">
                <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=600&q=80" alt="Architect" class="w-full h-80 object-cover group-hover:scale-105 transition-transform duration-500">
                <div class="p-6">
                    <h3 class="font-playfair text-xl font-bold text-linen">Julian K. Thorne, RIBA</h3>
                    <p class="text-xs text-champagne-400 font-mono mt-1">Head of BIM & Engineering</p>
                    <p class="text-xs text-linen/70 mt-3">Specialist in parametric high-rise structural stability and energy-efficient building envelope systems.</p>
                </div>
            </div>

            <!-- Profile 3 -->
            <div class="glass-panel rounded-3xl overflow-hidden border border-forest-700 group hover:border-champagne-500/50 transition-all">
                <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=600&q=80" alt="Architect" class="w-full h-80 object-cover group-hover:scale-105 transition-transform duration-500">
                <div class="p-6">
                    <h3 class="font-playfair text-xl font-bold text-linen">Aria Kusuma, IAI</h3>
                    <p class="text-xs text-champagne-400 font-mono mt-1">Director of Sustainable Interior</p>
                    <p class="text-xs text-linen/70 mt-3">Curates organic tactile materials, bespoke interior joinery, and biophilic moss integrations.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 14. PROFESSIONAL CREDENTIALS & AWARDS WALL -->
    <section class="py-16 px-4 md:px-8 bg-forest-800/30 border-y border-forest-700/40">
        <div class="max-w-7xl mx-auto flex flex-wrap items-center justify-between gap-8 text-center md:text-left">
            <div>
                <span class="text-xs font-mono text-champagne-400 uppercase">ACCREDITATIONS & HONORS</span>
                <h3 class="font-playfair text-2xl font-bold text-linen mt-1">Recognized Worldwide</h3>
            </div>

            <div class="flex flex-wrap items-center justify-center gap-8 opacity-80">
                <div class="flex items-center gap-2 font-syne font-bold text-linen"><i class="fa-solid fa-award text-champagne-400 text-xl"></i> AIA EXCELLENCE 2025</div>
                <div class="flex items-center gap-2 font-syne font-bold text-linen"><i class="fa-solid fa-certificate text-champagne-400 text-xl"></i> RIBA CERTIFIED</div>
                <div class="flex items-center gap-2 font-syne font-bold text-linen"><i class="fa-solid fa-leaf text-champagne-400 text-xl"></i> GREEN BUILDING COUNCIL</div>
            </div>
        </div>
    </section>

    <!-- 15. CLIENT TESTIMONIALS CAROUSEL -->
    <section class="py-24 px-4 md:px-8 max-w-7xl mx-auto">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="text-xs font-mono tracking-widest text-champagne-400 uppercase">TESTIMONIALS</span>
            <h2 class="font-playfair text-4xl md:text-5xl font-normal text-linen mt-2">Client Experience</h2>
        </div>

        <div class="glass-panel rounded-3xl p-8 md:p-12 border border-champagne-500/30 max-w-4xl mx-auto relative">
            <i class="fa-solid fa-quote-left text-5xl text-champagne-500/20 absolute top-6 left-6"></i>
            <div class="text-center relative z-10">
                <p class="font-playfair text-lg md:text-2xl italic text-linen/90 leading-relaxed" id="testimonial-quote">
                    "Aethel Moss transformed our cliffside plot in Bali into an architectural masterpiece. The passive moss cooling system and full BIM coordination ensured zero construction delays."
                </p>
                <div class="mt-6">
                    <h4 class="font-syne text-base font-bold text-champagne-400" id="testimonial-author">Baron Henrik Von Berg</h4>
                    <p class="text-xs text-linen/60 font-mono mt-0.5" id="testimonial-role">Owner, The Emerald Horizon Villa</p>
                </div>

                <!-- Carousel Controls -->
                <div class="flex items-center justify-center gap-4 mt-8">
                    <button onclick="prevTestimonial()" class="w-10 h-10 rounded-full bg-forest-800 border border-forest-600 text-linen hover:border-champagne-500 transition-all flex items-center justify-center">
                        <i class="fa-solid fa-arrow-left"></i>
                    </button>
                    <button onclick="nextTestimonial()" class="w-10 h-10 rounded-full bg-forest-800 border border-forest-600 text-linen hover:border-champagne-500 transition-all flex items-center justify-center">
                        <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- 16. PROJECT CONSULTATION MULTI-STEP WIZARD FORM -->
    <section id="consultation" class="py-24 px-4 md:px-8 bg-forest-800/40 border-t border-forest-700/40 relative">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-12">
                <span class="text-xs font-mono tracking-widest text-champagne-400 uppercase">COMMISSION INQUIRY</span>
                <h2 class="font-playfair text-4xl md:text-5xl font-normal text-linen mt-2">Book Design Consultation</h2>
                <p class="text-xs text-linen/60 mt-2">Complete the multi-step form to schedule a private video briefing with a Lead Principal Architect.</p>
            </div>

            <div class="glass-panel p-8 md:p-12 rounded-3xl border border-champagne-500/30">
                <!-- Wizard Progress Indicator -->
                <div class="flex items-center justify-between mb-8 border-b border-forest-700 pb-6 text-xs font-mono">
                    <span id="step-label-1" class="text-champagne-400 font-bold">1. Project Type</span>
                    <span id="step-label-2" class="text-linen/40">2. Site & Location</span>
                    <span id="step-label-3" class="text-linen/40">3. Budget</span>
                    <span id="step-label-4" class="text-linen/40">4. Contact</span>
                </div>

                <!-- Step 1 Content -->
                <div id="wizard-step-1" class="wizard-step">
                    <h3 class="font-syne text-lg font-bold text-linen mb-4">Select Project Type:</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-8">
                        <button type="button" onclick="selectWizardType(this, 'Private Luxury Villa')" class="wiz-type-btn bg-forest-900 border border-champagne-500 p-4 rounded-2xl text-left hover:border-champagne-500 transition-all">
                            <i class="fa-solid fa-house-chimney text-champagne-400 text-xl mb-2 block"></i>
                            <div class="font-bold text-sm text-linen">Luxury Villa</div>
                            <div class="text-[10px] text-linen/60">Residential Estate</div>
                        </button>
                        <button type="button" onclick="selectWizardType(this, 'Commercial Headquarters')" class="wiz-type-btn bg-forest-900 border border-forest-700 p-4 rounded-2xl text-left hover:border-champagne-500 transition-all">
                            <i class="fa-solid fa-building text-champagne-400 text-xl mb-2 block"></i>
                            <div class="font-bold text-sm text-linen">Commercial HQ</div>
                            <div class="text-[10px] text-linen/60">Office Tower / Retail</div>
                        </button>
                        <button type="button" onclick="selectWizardType(this, 'Hospitality Eco Resort')" class="wiz-type-btn bg-forest-900 border border-forest-700 p-4 rounded-2xl text-left hover:border-champagne-500 transition-all">
                            <i class="fa-solid fa-hotel text-champagne-400 text-xl mb-2 block"></i>
                            <div class="font-bold text-sm text-linen">Hospitality</div>
                            <div class="text-[10px] text-linen/60">Eco Retreat / Hotel</div>
                        </button>
                    </div>
                    <button onclick="nextWizardStep(2)" class="w-full bg-gold-gradient text-forest-900 font-bold py-3.5 rounded-xl text-xs uppercase tracking-wider">Continue to Step 2</button>
                </div>

                <!-- Step 2 Content -->
                <div id="wizard-step-2" class="wizard-step hidden">
                    <h3 class="font-syne text-lg font-bold text-linen mb-4">Site Location & Footprint:</h3>
                    <div class="space-y-4 mb-8">
                        <div>
                            <label class="block text-xs font-mono text-linen/70 mb-1">Project Site City / Country</label>
                            <input type="text" id="wizard-location" name="project_location" placeholder="e.g. Bali, Singapore, Tokyo, London..." class="w-full bg-forest-900 border border-forest-700 rounded-xl px-4 py-3 text-sm text-linen focus:border-champagne-500 outline-none">
                        </div>
                        <div>
                            <label class="block text-xs font-mono text-linen/70 mb-1">Estimated Land Area (SQM)</label>
                            <input type="number" id="wizard-area" name="project_area" placeholder="e.g. 850" class="w-full bg-forest-900 border border-forest-700 rounded-xl px-4 py-3 text-sm text-linen focus:border-champagne-500 outline-none">
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <button onclick="nextWizardStep(1)" class="w-1/3 bg-forest-800 text-linen font-bold py-3.5 rounded-xl text-xs">Back</button>
                        <button onclick="nextWizardStep(3)" class="w-2/3 bg-gold-gradient text-forest-900 font-bold py-3.5 rounded-xl text-xs uppercase">Continue to Step 3</button>
                    </div>
                </div>

                <!-- Step 3 Content -->
                <div id="wizard-step-3" class="wizard-step hidden">
                    <h3 class="font-syne text-lg font-bold text-linen mb-4">Estimated Investment Budget:</h3>
                    <div class="grid grid-cols-2 gap-4 mb-8">
                        <button type="button" class="bg-forest-900 border border-champagne-500 p-4 rounded-2xl text-center text-xs font-bold text-linen" data-budget="$250k - $500k USD">$250k - $500k USD</button>
                        <button type="button" class="bg-forest-900 border border-forest-700 p-4 rounded-2xl text-center text-xs font-bold text-linen" data-budget="$500k - $1.5M USD">$500k - $1.5M USD</button>
                        <button type="button" class="bg-forest-900 border border-forest-700 p-4 rounded-2xl text-center text-xs font-bold text-linen" data-budget="$1.5M - $5M USD">$1.5M - $5M USD</button>
                        <button type="button" class="bg-forest-900 border border-forest-700 p-4 rounded-2xl text-center text-xs font-bold text-linen" data-budget="$5M+ USD">$5M+ USD</button>
                    </div>
                    <div class="flex gap-4">
                        <button onclick="nextWizardStep(2)" class="w-1/3 bg-forest-800 text-linen font-bold py-3.5 rounded-xl text-xs">Back</button>
                        <button onclick="nextWizardStep(4)" class="w-2/3 bg-gold-gradient text-forest-900 font-bold py-3.5 rounded-xl text-xs uppercase">Final Step</button>
                    </div>
                </div>

                <!-- Step 4 Content -->
                <div id="wizard-step-4" class="wizard-step hidden">
                    <h3 class="font-syne text-lg font-bold text-linen mb-4">Contact Details & Preferred Date:</h3>
                    <div class="space-y-4 mb-8">
                        <div class="grid grid-cols-2 gap-4">
                            <input type="text" id="wizard-name" name="full_name" placeholder="Full Name" required class="bg-forest-900 border border-forest-700 rounded-xl px-4 py-3 text-sm text-linen outline-none">
                            <input type="email" id="wizard-email" name="email" placeholder="Email Address" required class="bg-forest-900 border border-forest-700 rounded-xl px-4 py-3 text-sm text-linen outline-none">
                        </div>
                        <input type="tel" id="wizard-phone" name="phone" placeholder="Phone Number / WhatsApp" required class="w-full bg-forest-900 border border-forest-700 rounded-xl px-4 py-3 text-sm text-linen outline-none">
                    </div>
                    <button onclick="submitWizard()" class="w-full bg-gold-gradient text-forest-900 font-bold py-4 rounded-xl text-sm uppercase tracking-wider shadow-xl">SUBMIT COMMISSION REQUEST</button>
                </div>
            </div>
        </div>
    </section>

    <!-- 17. SERVICE AREA COVERAGE HUB -->
    <section class="py-20 px-4 md:px-8 max-w-7xl mx-auto text-center">
        <span class="text-xs font-mono tracking-widest text-champagne-400 uppercase">GLOBAL FOOTPRINT</span>
        <h2 class="font-playfair text-3xl font-normal text-linen mt-2 mb-8">Active Studio Service Hubs</h2>
        
        <div class="flex flex-wrap items-center justify-center gap-6 text-sm font-mono text-linen/80">
            <span class="glass-panel px-6 py-3 rounded-full border border-champagne-500/30"><i class="fa-solid fa-location-dot text-champagne-400 me-2"></i> JAKARTA</span>
            <span class="glass-panel px-6 py-3 rounded-full border border-champagne-500/30"><i class="fa-solid fa-location-dot text-champagne-400 me-2"></i> BALI</span>
            <span class="glass-panel px-6 py-3 rounded-full border border-champagne-500/30"><i class="fa-solid fa-location-dot text-champagne-400 me-2"></i> SINGAPORE</span>
            <span class="glass-panel px-6 py-3 rounded-full border border-champagne-500/30"><i class="fa-solid fa-location-dot text-champagne-400 me-2"></i> TOKYO</span>
            <span class="glass-panel px-6 py-3 rounded-full border border-champagne-500/30"><i class="fa-solid fa-location-dot text-champagne-400 me-2"></i> LONDON</span>
        </div>
    </section>

    <!-- 18. FAQ ACCORDION -->
    <section class="py-24 px-4 md:px-8 max-w-4xl mx-auto">
        <div class="text-center mb-16">
            <span class="text-xs font-mono tracking-widest text-champagne-400 uppercase">FREQUENTLY ASKED</span>
            <h2 class="font-playfair text-4xl font-normal text-linen mt-2">Architectural FAQ</h2>
        </div>

        <div class="space-y-4">
            <!-- FAQ 1 -->
            <div class="glass-panel rounded-2xl border border-forest-700 overflow-hidden">
                <button onclick="toggleFaq(1)" class="w-full p-6 text-left font-syne font-bold text-linen flex items-center justify-between">
                    <span>What is included in the BIM LOD 400 execution package?</span>
                    <i class="fa-solid fa-chevron-down text-champagne-400" id="faq-icon-1"></i>
                </button>
                <div id="faq-ans-1" class="hidden px-6 pb-6 text-xs text-linen/70 leading-relaxed border-t border-forest-700/50 pt-4">
                    Our Level of Development (LOD) 400 BIM package includes high-precision structural 3D blueprints, MEP clash-detection matrices, fabrication-ready component schedules, and exact bill of quantities (BOQ) for local contractor tender process.
                </div>
            </div>

            <!-- FAQ 2 -->
            <div class="glass-panel rounded-2xl border border-forest-700 overflow-hidden">
                <button onclick="toggleFaq(2)" class="w-full p-6 text-left font-syne font-bold text-linen flex items-center justify-between">
                    <span>How does the preserved biophilic moss wall maintenance work?</span>
                    <i class="fa-solid fa-chevron-down text-champagne-400" id="faq-icon-2"></i>
                </button>
                <div id="faq-ans-2" class="hidden px-6 pb-6 text-xs text-linen/70 leading-relaxed border-t border-forest-700/50 pt-4">
                    Our integrated preserved moss walls undergo a eco-glycerin treatment process. They require zero watering, sunlight, or trimming while maintaining natural acoustic dampening and indoor humidity balance for up to 10+ years.
                </div>
            </div>
        </div>
    </section>

    <!-- 19. FOOTER -->
    <footer class="bg-forest-900 border-t border-forest-700/60 pt-16 pb-12 px-4 md:px-8">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
            <div>
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-8 h-8 rounded-full bg-forest-800 border border-champagne-500/50 flex items-center justify-center font-bold text-champagne-400 text-sm">AM</div>
                    <span class="font-syne font-bold tracking-widest text-linen">AETHEL MOSS</span>
                </div>
                <p class="text-xs text-linen/60 leading-relaxed">
                    Ultra-modern architectural and biophilic building design studio creating sustainable architectural sanctuaries worldwide.
                </p>
            </div>

            <div>
                <h4 class="font-syne text-xs font-bold text-champagne-400 uppercase tracking-widest mb-4">Navigation</h4>
                <ul class="space-y-2 text-xs text-linen/70">
                    <li><a href="#services" class="hover:text-champagne-400 transition-colors">Design Services</a></li>
                    <li><a href="#portfolio" class="hover:text-champagne-400 transition-colors">Portfolio Gallery</a></li>
                    <li><a href="#floorplan" class="hover:text-champagne-400 transition-colors">Interactive Blueprints</a></li>
                    <li><a href="#pricing" class="hover:text-champagne-400 transition-colors">Packages & Calculator</a></li>
                </ul>
            </div>

            <div>
                <h4 class="font-syne text-xs font-bold text-champagne-400 uppercase tracking-widest mb-4">Contact Studio</h4>
                <p class="text-xs text-linen/70 leading-relaxed">
                    HQ: SCBD Equity Tower, Fl 28, Jakarta<br>
                    Email: studio@aethelmoss.com<br>
                    Direct: +62 812 8888 9900
                </p>
            </div>

            <div>
                <h4 class="font-syne text-xs font-bold text-champagne-400 uppercase tracking-widest mb-4">Architectural Digest</h4>
                <div class="flex gap-2">
                    <input type="email" placeholder="Your Email..." class="bg-forest-800 border border-forest-700 rounded-lg px-3 py-2 text-xs text-linen outline-none w-full">
                    <button class="bg-champagne-500 text-forest-900 px-4 py-2 rounded-lg text-xs font-bold">JOIN</button>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto border-t border-forest-800 pt-8 flex flex-col sm:flex-row justify-between items-center text-[10px] text-linen/40 font-mono">
            <span>© 2026 Made with care ♡ · Website template by WEBIA</span>
            <span>DESIGNED WITH PRECISION & PASSION</span>
        </div>
    </footer>

    <!-- 20. DUAL FLOATING SIDE-BY-SIDE ACTION BUTTONS (FIXED BOTTOM-RIGHT) -->
    <div class="fixed bottom-6 right-6 z-50 flex items-center gap-3">
        <!-- Floating WhatsApp Button -->
        <a href="https://wa.me/6281234567890?text=Hello%20Aethel%20Moss%20Studio%2C%20I%20would%20like%20to%20inquire%20about%20an%20architectural%20commission." target="_blank" class="w-14 h-14 rounded-full bg-emerald-600 hover:bg-emerald-500 text-white flex items-center justify-center text-2xl shadow-2xl transition-all hover:scale-110 relative group">
            <i class="fa-brands fa-whatsapp"></i>
            <span class="absolute -top-1 -right-1 w-4 h-4 rounded-full bg-champagne-400 border-2 border-forest-900"></span>
            <!-- Tooltip -->
            <span class="absolute right-16 bg-forest-900 text-linen text-[10px] font-mono px-3 py-1.5 rounded-lg border border-forest-700 whitespace-nowrap opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none">
                WhatsApp Studio Direct
            </span>
        </a>

        <!-- Floating Moss AI Assistant Button -->
        <button onclick="toggleAiChatbot()" class="w-14 h-14 rounded-full bg-gold-gradient text-forest-900 flex items-center justify-center text-xl font-bold shadow-2xl transition-all hover:scale-110 relative group">
            <i class="fa-solid fa-robot"></i>
            <!-- Tooltip -->
            <span class="absolute right-16 bg-forest-900 text-linen text-[10px] font-mono px-3 py-1.5 rounded-lg border border-forest-700 whitespace-nowrap opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none">
                Moss AI Architectural Concierge
            </span>
        </button>
    </div>

    <!-- MOSS AI CHATBOT POP-UP WINDOW -->
    <div id="ai-chatbot-window" class="fixed bottom-24 right-6 z-50 w-80 md:w-96 glass-panel rounded-3xl border border-champagne-500/40 shadow-2xl hidden flex-col overflow-hidden backdrop-blur-xl">
        <div class="bg-forest-800 p-4 border-b border-forest-700 flex justify-between items-center">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 rounded-full bg-champagne-500 text-forest-900 flex items-center justify-center font-bold text-xs">AI</div>
                <div>
                    <h4 class="font-syne text-xs font-bold text-linen">Moss AI Concierge</h4>
                    <span class="text-[9px] text-emerald-400 font-mono">● Active • Instant Estimation</span>
                </div>
            </div>
            <button onclick="toggleAiChatbot()" class="text-linen/60 hover:text-linen text-sm"><i class="fa-solid fa-xmark"></i></button>
        </div>

        <!-- Chat Messages -->
        <div class="p-4 space-y-3 h-64 overflow-y-auto text-xs" id="chat-messages">
            <div class="bg-forest-800/80 p-3 rounded-2xl border border-forest-700 text-linen/90 max-w-[85%]">
                Welcome to Aethel Moss Studio! How may I assist with your architectural project today? You can ask for dynamic $m^2$ estimates or service info.
            </div>
        </div>

        <!-- Chat Input -->
        <div class="p-3 border-t border-forest-700 flex gap-2 bg-forest-900/90">
            <input type="text" id="chat-input" placeholder="Type query or SQM..." onkeypress="handleChatKey(event)" class="w-full bg-forest-800 border border-forest-700 rounded-xl px-3 py-2 text-xs text-linen outline-none">
            <button onclick="sendChatMessage()" class="bg-champagne-500 text-forest-900 px-3 rounded-xl font-bold text-xs"><i class="fa-solid fa-paper-plane"></i></button>
        </div>
    </div>

    <!-- PROJECT DETAIL MODAL CONTAINER -->
    <div id="project-modal" class="fixed inset-0 z-50 bg-forest-900/90 backdrop-blur-md hidden items-center justify-center p-4">
        <div class="glass-panel p-8 rounded-3xl max-w-2xl w-full border border-champagne-500/40 relative">
            <button onclick="closeProjectModal()" class="absolute top-4 right-4 text-linen text-xl hover:text-champagne-400"><i class="fa-solid fa-xmark"></i></button>
            <img id="modal-img" src="" class="w-full h-60 object-cover rounded-2xl mb-6">
            <span id="modal-tag" class="text-[10px] font-mono text-champagne-400 bg-forest-800 px-3 py-1 rounded-full border border-champagne-500/30">CATEGORY</span>
            <h3 id="modal-title" class="font-playfair text-2xl font-bold text-linen mt-2">Project Title</h3>
            <p id="modal-desc" class="text-xs text-linen/70 mt-2 leading-relaxed">Project Description</p>
            <div id="modal-specs" class="flex justify-between text-xs font-mono text-champagne-400 border-t border-forest-700 pt-4 mt-4">
                <!-- Specs dynamically inserted -->
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT INTERACTIONS -->
    <script src="{{ asset('js/website-bisnis/templates/interior-architecture/architecture-building-design/aethel-moss/aethel-moss.js') }}" defer></script>
</body>
</html>