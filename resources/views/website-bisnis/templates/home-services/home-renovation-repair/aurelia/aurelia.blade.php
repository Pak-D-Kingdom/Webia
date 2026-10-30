<!DOCTYPE html>

<html class="scroll-smooth" lang="en">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>AURELIA | Haute Architecture &amp; Renovation Services</title>
<!-- Tailwind CSS -->
<script src="https://cdn.tailwindcss.com"></script>
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com" rel="preconnect"/>
<link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
<link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;500;600;700;800;900&amp;family=Cormorant+Garamond:ital,wght@0,400;0,600;0,700;1,400&amp;family=Plus+Jakarta+Sans:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet"/>
<!-- FontAwesome Icons -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"/>
<script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        burgundy: {
                            50: '#FAF4F5',
                            100: '#F5E8EA',
                            200: '#EBD1D5',
                            600: '#A32839',
                            700: '#7A1C28',
                            800: '#58111A',
                            900: '#3D0A11',
                            950: '#220407',
                        },
                        gold: {
                            light: '#F4E0BB',
                            DEFAULT: '#D4A373',
                            dark: '#B08051',
                            shimmer: '#F9E8CA'
                        },
                        ivory: {
                            50: '#FFFFFF',
                            100: '#FCFAF7',
                            200: '#F7F2EA',
                            300: '#EFE5D8',
                            400: '#DFCDB7'
                        }
                    },
                    fontFamily: {
                        serif: ['Cormorant Garamond', 'Georgia', 'serif'],
                        cinzel: ['Cinzel', 'serif'],
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                    }
                }
            }
        }
    </script>

<link href="{{ asset('css/website-bisnis/templates/home-services/home-renovation-repair/aurelia/aurelia.css') }}?v=1" rel="stylesheet"/></head>
<body class="bg-ivory-100 text-neutral-800 font-sans selection:bg-burgundy-900 selection:text-gold-light antialiased overflow-x-hidden">
<!-- 1. TOPBAR WITH LANGUAGE SWITCHER -->
<div class="bg-burgundy-950 text-ivory-200 text-xs py-2 px-4 md:px-8 border-b border-gold/20 relative z-50">
<div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center gap-2">
<div class="flex items-center space-x-6 text-[11px]">
<span class="flex items-center text-gold-light font-medium">
<i class="fa-solid fa-phone-flip text-gold mr-2"></i>
<span data-i18n="topbar_phone_label">VIP Concierge:</span>
<a class="hover:underline ml-1 font-semibold text-white" href="tel:+6281234567890">+62 812-3456-7890</a>
</span>
<span class="hidden md:inline-block text-burgundy-800">|</span>
<span class="hidden md:flex items-center text-ivory-300" data-i18n="topbar_location">
<i class="fa-solid fa-location-dot mr-1.5 text-gold"></i> Beverly Hills • Manhattan • Pondok Indah • Menteng
                </span>
</div>
<div class="flex items-center space-x-5 text-[11px]">
<!-- Language Toggle Switcher -->
<div class="flex items-center bg-burgundy-900 border border-gold/40 rounded-full p-0.5 shadow-inner">
<button class="px-3 py-1 rounded-full text-[10px] font-bold uppercase transition tracking-wider bg-gold text-burgundy-950" id="langEN" onclick="setLanguage('en')">
                        🇺🇸 EN
                    </button>
<button class="px-3 py-1 rounded-full text-[10px] font-bold uppercase transition tracking-wider text-ivory-300 hover:text-white" id="langID" onclick="setLanguage('id')">
                        🇮🇩 ID
                    </button>
</div>
<span class="text-burgundy-800">|</span>
<button class="text-gold-light hover:text-white font-semibold uppercase text-[10px] tracking-widest flex items-center" onclick="openBookingModal()">
<span data-i18n="topbar_cta">Private Inspection</span> <i class="fa-solid fa-arrow-right-long ml-1.5 text-xs"></i>
</button>
</div>
</div>
</div>
<!-- 2. NAVBAR -->
<nav class="sticky top-0 z-40 transition-all duration-300 bg-ivory-100/95 border-b border-burgundy-900/10 backdrop-blur-md" id="navbar">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="flex items-center justify-between h-20">
<!-- Brand Logo -->
<a class="flex items-center space-x-3.5 group" href="#">
<div class="w-11 h-11 rounded-full bg-burgundy-950 flex items-center justify-center border-2 border-gold/50 group-hover:border-gold transition-all duration-300 shadow-xl">
<span class="font-cinzel text-gold font-bold text-2xl tracking-tighter">A</span>
</div>
<div class="flex flex-col">
<span class="font-cinzel text-2xl font-black tracking-[0.2em] text-burgundy-950 group-hover:text-burgundy-800 transition">AURELIA</span>
<span class="text-[9px] uppercase tracking-[0.3em] text-gold-dark font-bold" data-i18n="nav_tagline">Haute Architecture &amp; Renovation</span>
</div>
</a>
<!-- Desktop Nav Menu -->
<div class="hidden lg:flex items-center space-x-8 text-xs font-bold uppercase tracking-widest text-burgundy-950">
<a class="hover:text-gold-dark transition relative py-1" data-i18n="nav_services" href="#services">Services</a>
<a class="hover:text-gold-dark transition relative py-1" data-i18n="nav_transformations" href="#before-after">Transformations</a>
<a class="hover:text-gold-dark transition relative py-1" data-i18n="nav_portfolio" href="#portfolio">Portfolio</a>
<a class="hover:text-gold-dark transition relative py-1" data-i18n="nav_materials" href="#materials">Materials Studio</a>
<a class="hover:text-gold-dark transition relative py-1" data-i18n="nav_estimator" href="#calculator">Cost Estimator</a>
<a class="hover:text-gold-dark transition relative py-1" data-i18n="nav_packages" href="#packages">Packages</a>
</div>
<!-- Right Action Button -->
<div class="hidden sm:flex items-center space-x-4">
<button class="relative inline-flex items-center justify-center px-6 py-3.5 text-xs uppercase tracking-widest font-bold text-ivory-100 bg-burgundy-950 border border-gold/40 rounded-sm shadow-xl hover:border-gold transition duration-300 group overflow-hidden" onclick="openBookingModal()">
<span class="absolute w-0 h-0 transition-all duration-500 ease-out bg-gold rounded-full group-hover:w-64 group-hover:h-64 opacity-20"></span>
<span class="relative flex items-center" data-i18n="nav_book_btn">
<i class="fa-solid fa-calendar-check mr-2 text-gold"></i> Book Inspection
                        </span>
</button>
</div>
<!-- Mobile menu button -->
<div class="lg:hidden flex items-center">
<button class="text-burgundy-950 hover:text-gold focus:outline-none p-2" id="mobileMenuBtn">
<i class="fa-solid fa-bars text-2xl"></i>
</button>
</div>
</div>
</div>
<!-- Mobile Drawer Menu -->
<div class="hidden lg:hidden bg-ivory-100 border-b border-burgundy-900/10 px-6 pt-2 pb-6 space-y-3 font-semibold text-xs uppercase tracking-wider" id="mobileMenu">
<a class="mobile-nav-link block py-2 text-burgundy-950" data-i18n="nav_services" href="#services">Services</a>
<a class="mobile-nav-link block py-2 text-burgundy-950" data-i18n="nav_transformations" href="#before-after">Transformations</a>
<a class="mobile-nav-link block py-2 text-burgundy-950" data-i18n="nav_portfolio" href="#portfolio">Portfolio</a>
<a class="mobile-nav-link block py-2 text-burgundy-950" data-i18n="nav_materials" href="#materials">Materials Studio</a>
<a class="mobile-nav-link block py-2 text-burgundy-950" data-i18n="nav_estimator" href="#calculator">Cost Estimator</a>
<a class="mobile-nav-link block py-2 text-burgundy-950" data-i18n="nav_packages" href="#packages">Packages</a>
<button class="w-full mt-4 py-3.5 bg-burgundy-950 border border-gold/40 text-gold-light font-bold tracking-widest uppercase text-xs rounded shadow-lg" onclick="openBookingModal()">
                Book Inspection
            </button>
</div>
</nav>
<!-- 3. HERO BANNER -->
<section class="relative min-h-[90vh] flex items-center justify-center overflow-hidden bg-burgundy-950 py-16 sm:py-24">
<div class="absolute inset-0 z-0 bg-cover bg-center opacity-30 scale-105 transition-all duration-1000" id="heroBg" style="background-image: url('https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&amp;fit=crop&amp;w=1920&amp;q=80')"></div>
<div class="absolute inset-0 bg-gradient-to-r from-burgundy-950 via-burgundy-950/85 to-burgundy-950/60 z-10"></div>
<div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-gold/10 via-transparent to-burgundy-950 z-10"></div>
<div class="relative z-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
<div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
<div class="lg:col-span-7 space-y-6">
<div class="inline-flex items-center space-x-2 bg-burgundy-900/90 border border-gold/40 rounded-full px-4 py-1.5 backdrop-blur-md">
<span class="w-2 h-2 rounded-full bg-gold animate-ping"></span>
<span class="text-gold-light text-[10px] uppercase tracking-[0.25em] font-bold" data-i18n="hero_badge">Bespoke Architectural Remodeling</span>
</div>
<h1 class="font-serif text-4xl sm:text-6xl lg:text-7xl font-bold text-ivory-100 leading-[1.08] tracking-tight">
<span data-i18n="hero_title_1">Redefining High-End</span> <br/>
<span class="italic font-serif text-gradient-gold" data-i18n="hero_title_2">Living Spaces.</span>
</h1>
<p class="text-ivory-300 text-sm sm:text-lg max-w-xl font-light leading-relaxed" data-i18n="hero_desc">
                        From historic estate restorations to cutting-edge penthouse transformations. We craft bespoke architectural interiors with uncompromising precision, rare materials, and white-glove artisan care.
                    </p>
<div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-4 pt-4">
<button class="px-8 py-4 bg-gold hover:bg-gold-dark text-burgundy-950 font-bold tracking-widest text-xs uppercase rounded-sm shadow-2xl transition duration-300 text-center" onclick="openBookingModal()">
<span data-i18n="hero_cta_primary">Request Design Consultation</span>
</button>
<a class="px-8 py-4 bg-burgundy-900/60 hover:bg-burgundy-900 text-ivory-100 border border-gold/30 font-bold tracking-widest text-xs uppercase rounded-sm backdrop-blur-md transition text-center flex items-center justify-center space-x-2" href="#before-after">
<span data-i18n="hero_cta_secondary">Explore Transformations</span>
<i class="fa-solid fa-play text-[9px] text-gold"></i>
</a>
</div>
<!-- Key Metrics Banner -->
<div class="pt-8 border-t border-gold/20 grid grid-cols-3 gap-6 max-w-lg">
<div>
<span class="block font-serif text-3xl font-bold text-gold-light">18+</span>
<span class="text-[10px] text-ivory-300 uppercase tracking-widest" data-i18n="stat_years">Years Mastery</span>
</div>
<div>
<span class="block font-serif text-3xl font-bold text-gold-light">1,250+</span>
<span class="text-[10px] text-ivory-300 uppercase tracking-widest" data-i18n="stat_estates">Estates Restored</span>
</div>
<div>
<span class="block font-serif text-3xl font-bold text-gold-light">100%</span>
<span class="text-[10px] text-ivory-300 uppercase tracking-widest" data-i18n="stat_guarantee">10-Yr Guarantee</span>
</div>
</div>
</div>
<!-- Right Card - Quick Estimator Widget -->
<div class="lg:col-span-5">
<div class="glass-dark border border-gold/40 p-6 sm:p-8 rounded-xl shadow-2xl relative">
<div class="absolute -top-3 -right-3 bg-gold text-burgundy-950 text-[9px] font-black uppercase tracking-widest px-3 py-1 rounded shadow-md">
<span data-i18n="hero_widget_badge">Instant Concierge</span>
</div>
<h3 class="font-serif text-2xl text-ivory-100 font-bold mb-1" data-i18n="hero_widget_title">Quick Estimate Calculator</h3>
<p class="text-xs text-ivory-300 mb-6" data-i18n="hero_widget_subtitle">Select your property scope for an immediate luxury budget range.</p>
<div class="space-y-4">
<div>
<label class="block text-[10px] uppercase tracking-wider text-gold-light font-bold mb-1" data-i18n="hero_widget_prop_label">Property Type</label>
<select class="w-full bg-burgundy-900 border border-gold/30 text-ivory-100 text-xs rounded p-3 focus:outline-none focus:border-gold" id="heroPropType">
<option data-i18n="opt_penthouse" value="1.2">Luxury Penthouse / Apartment</option>
<option data-i18n="opt_villa" value="1.5">Private Villa / Estate</option>
<option data-i18n="opt_townhouse" value="1.0">Heritage Residence / Townhouse</option>
</select>
</div>
<div>
<label class="block text-[10px] uppercase tracking-wider text-gold-light font-bold mb-1" data-i18n="hero_widget_scope_label">Scope of Renovation</label>
<select class="w-full bg-burgundy-900 border border-gold/30 text-ivory-100 text-xs rounded p-3 focus:outline-none focus:border-gold" id="heroScope">
<option data-i18n="opt_full_remodel" value="75">Full Estate Structural &amp; Architectural Remodeling</option>
<option data-i18n="opt_kitchen_bath" value="45">Gourmet Kitchen &amp; Master Spa Restyling</option>
<option data-i18n="opt_finishes" value="30">Bespoke Wall, Flooring &amp; Lighting Suite</option>
</select>
</div>
<div>
<div class="flex justify-between text-xs text-ivory-200 mb-1 font-semibold">
<span class="uppercase tracking-wider text-gold-light text-[10px]" data-i18n="hero_widget_area_label">Approx. Area (Sq M / Sq Ft)</span>
<span class="text-gold" id="heroAreaVal">250 Sq M</span>
</div>
<input class="w-full accent-gold cursor-pointer" id="heroAreaRange" max="1000" min="50" step="25" type="range" value="250"/>
</div>
<div class="bg-burgundy-950 p-4 rounded border border-gold/30 flex items-center justify-between mt-4">
<div>
<span class="block text-[10px] uppercase text-ivory-300 font-bold" data-i18n="hero_widget_est_label">Estimated Investment</span>
<span class="font-serif text-xl font-bold text-gold-light" id="heroEstimatedCost">$187,500 - $225,000</span>
</div>
<i class="fa-solid fa-calculator text-gold text-xl"></i>
</div>
<button class="w-full py-3.5 bg-gold hover:bg-gold-dark text-burgundy-950 font-bold uppercase text-xs tracking-widest rounded transition" onclick="openBookingModal()">
<span data-i18n="hero_widget_cta">Lock In Preliminary Quote</span>
</button>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- 4. SERVICES SHOWCASE SECTION -->
<section class="py-24 bg-ivory-100 relative" id="services">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="text-center max-w-3xl mx-auto mb-16">
<span class="text-xs uppercase tracking-[0.25em] text-gold-dark font-bold" data-i18n="serv_sub">Uncompromising Craftsmanship</span>
<h2 class="font-serif text-3xl sm:text-5xl font-bold text-burgundy-950 mt-2 mb-4" data-i18n="serv_title">Master Renovation Services</h2>
<div class="w-20 h-1 bg-burgundy-800 mx-auto mb-6"></div>
<p class="text-neutral-600 text-sm sm:text-base leading-relaxed" data-i18n="serv_desc">
                    Every service is executed by specialized master artisans, licensed structural engineers, and interior architects committed to flawlessness.
                </p>
</div>
<!-- Service Filter Tabs -->
<div class="flex flex-wrap justify-center gap-2 mb-12">
<button class="service-tab active border border-burgundy-900 px-5 py-2.5 rounded-full text-xs font-bold tracking-wider uppercase transition bg-burgundy-950 text-gold-light" data-i18n="tab_all" onclick="filterServices('all')">All Services</button>
<button class="service-tab border border-burgundy-900/20 px-5 py-2.5 rounded-full text-xs font-bold tracking-wider uppercase transition text-burgundy-950 hover:border-burgundy-900" data-i18n="tab_estates" onclick="filterServices('residential')">Residential Estates</button>
<button class="service-tab border border-burgundy-900/20 px-5 py-2.5 rounded-full text-xs font-bold tracking-wider uppercase transition text-burgundy-950 hover:border-burgundy-900" data-i18n="tab_kitchen" onclick="filterServices('kitchen')">Kitchen &amp; Bath</button>
<button class="service-tab border border-burgundy-900/20 px-5 py-2.5 rounded-full text-xs font-bold tracking-wider uppercase transition text-burgundy-950 hover:border-burgundy-900" data-i18n="tab_finishes" onclick="filterServices('finishing')">Flooring &amp; Finishes</button>
</div>
<!-- Service Cards Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="servicesGrid">
<!-- Card 1 -->
<div class="service-card residential group bg-ivory-50 border border-burgundy-900/10 rounded-xl overflow-hidden shadow-sm hover:shadow-2xl transition duration-500">
<div class="relative h-64 overflow-hidden">
<img alt="Full Residential Remodel" class="w-full h-full object-cover group-hover:scale-105 transition duration-700" src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&amp;fit=crop&amp;w=800&amp;q=80"/>
<div class="absolute inset-0 bg-gradient-to-t from-burgundy-950/90 via-transparent to-transparent"></div>
<span class="absolute top-4 left-4 bg-burgundy-950 border border-gold/40 text-gold-light text-[10px] font-bold px-3 py-1 rounded uppercase tracking-wider" data-i18n="badge_full_estate">Full Estate</span>
</div>
<div class="p-6">
<h3 class="font-serif text-xl font-bold text-burgundy-950 mb-2" data-i18n="s1_title">Villa &amp; Penthouse Remodeling</h3>
<p class="text-xs text-neutral-600 leading-relaxed mb-4" data-i18n="s1_desc">Complete structural re-engineering, luxury layout reconfiguration, Italian millwork, and full smart home integration.</p>
<button class="w-full py-3 border border-burgundy-950 text-burgundy-950 group-hover:bg-burgundy-950 group-hover:text-gold-light text-xs font-bold uppercase tracking-wider rounded transition duration-300" data-i18n="btn_specs" onclick="openServiceDetail('villa')">
                            Explore Specifications
                        </button>
</div>
</div>
<!-- Card 2 -->
<div class="service-card kitchen group bg-ivory-50 border border-burgundy-900/10 rounded-xl overflow-hidden shadow-sm hover:shadow-2xl transition duration-500">
<div class="relative h-64 overflow-hidden">
<img alt="Gourmet Kitchen" class="w-full h-full object-cover group-hover:scale-105 transition duration-700" src="https://images.unsplash.com/photo-1556911220-e15b29be8c8f?auto=format&amp;fit=crop&amp;w=800&amp;q=80"/>
<div class="absolute inset-0 bg-gradient-to-t from-burgundy-950/90 via-transparent to-transparent"></div>
<span class="absolute top-4 left-4 bg-burgundy-950 border border-gold/40 text-gold-light text-[10px] font-bold px-3 py-1 rounded uppercase tracking-wider" data-i18n="badge_kitchen">Kitchen &amp; Spa</span>
</div>
<div class="p-6">
<h3 class="font-serif text-xl font-bold text-burgundy-950 mb-2" data-i18n="s2_title">Gourmet Kitchens &amp; Wellness Spas</h3>
<p class="text-xs text-neutral-600 leading-relaxed mb-4" data-i18n="s2_desc">Book-matched Calacatta marble slabs, professional chef appliances, wine vaults, and hydrotherapy bath sanctuaries.</p>
<button class="w-full py-3 border border-burgundy-950 text-burgundy-950 group-hover:bg-burgundy-950 group-hover:text-gold-light text-xs font-bold uppercase tracking-wider rounded transition duration-300" data-i18n="btn_specs" onclick="openServiceDetail('kitchen')">
                            Explore Specifications
                        </button>
</div>
</div>
<!-- Card 3 -->
<div class="service-card finishing group bg-ivory-50 border border-burgundy-900/10 rounded-xl overflow-hidden shadow-sm hover:shadow-2xl transition duration-500">
<div class="relative h-64 overflow-hidden">
<img alt="Specialist Finishes" class="w-full h-full object-cover group-hover:scale-105 transition duration-700" src="https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?auto=format&amp;fit=crop&amp;w=800&amp;q=80"/>
<div class="absolute inset-0 bg-gradient-to-t from-burgundy-950/90 via-transparent to-transparent"></div>
<span class="absolute top-4 left-4 bg-burgundy-950 border border-gold/40 text-gold-light text-[10px] font-bold px-3 py-1 rounded uppercase tracking-wider" data-i18n="badge_finishes">Artisan Finishes</span>
</div>
<div class="p-6">
<h3 class="font-serif text-xl font-bold text-burgundy-950 mb-2" data-i18n="s3_title">Venetian Plaster &amp; Smoked Hardwoods</h3>
<p class="text-xs text-neutral-600 leading-relaxed mb-4" data-i18n="s3_desc">Hand-burnished Marmorino lime plaster, French oak herringbone flooring, and acoustic ceiling suspensions.</p>
<button class="w-full py-3 border border-burgundy-950 text-burgundy-950 group-hover:bg-burgundy-950 group-hover:text-gold-light text-xs font-bold uppercase tracking-wider rounded transition duration-300" data-i18n="btn_specs" onclick="openServiceDetail('finishing')">
                            Explore Specifications
                        </button>
</div>
</div>
</div>
</div>
</section>
<!-- 5. INTERACTIVE BEFORE-AND-AFTER RENOVATION GALLERY -->
<section class="py-24 bg-burgundy-950 text-ivory-100 relative overflow-hidden" id="before-after">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="text-center max-w-3xl mx-auto mb-16">
<span class="text-xs uppercase tracking-[0.25em] text-gold font-bold" data-i18n="ba_sub">Interactive Comparison</span>
<h2 class="font-serif text-3xl sm:text-5xl font-bold mt-2 mb-4" data-i18n="ba_title">Masterful Transformations</h2>
<div class="w-20 h-1 bg-gold mx-auto mb-6"></div>
<p class="text-ivory-300 text-sm sm:text-base" data-i18n="ba_desc">
                    Drag the slider below to witness how raw structural spaces evolve into refined architectural sanctuaries.
                </p>
</div>
<!-- Before/After Slider Container -->
<div class="relative w-full max-w-5xl h-[380px] sm:h-[500px] md:h-[600px] mx-auto rounded-xl overflow-hidden shadow-2xl border-2 border-gold/40 select-none" id="beforeAfterContainer">
<!-- AFTER IMAGE (Base) -->
<img alt="After Renovation" class="absolute inset-0 w-full h-full object-cover" src="https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?auto=format&amp;fit=crop&amp;w=1600&amp;q=80"/>
<span class="absolute top-6 right-6 bg-burgundy-950/90 text-gold border border-gold/40 text-[10px] sm:text-xs uppercase font-bold tracking-widest px-4 py-2 rounded backdrop-blur-md" data-i18n="ba_after">AFTER (Haute Finish)</span>
<!-- BEFORE IMAGE (Overlay) -->
<div class="absolute inset-0 w-full h-full before-after-overlay overflow-hidden" id="beforeOverlay">
<img alt="Before Renovation" class="absolute inset-0 w-full h-full object-cover" src="https://images.unsplash.com/photo-1503387762-592deb58ef4e?auto=format&amp;fit=crop&amp;w=1600&amp;q=80"/>
<span class="absolute top-6 left-6 bg-neutral-900/90 text-neutral-300 border border-neutral-700 text-[10px] sm:text-xs uppercase font-bold tracking-widest px-4 py-2 rounded backdrop-blur-md" data-i18n="ba_before">BEFORE (Raw State)</span>
</div>
<!-- SLIDER HANDLE -->
<div class="absolute top-0 bottom-0 w-1 bg-gold cursor-ew-resize z-30" id="sliderHandle" style="left: 50%;">
<div class="absolute top-1/2 -translate-y-1/2 -translate-x-1/2 w-12 h-12 rounded-full bg-burgundy-950 border-2 border-gold shadow-2xl flex items-center justify-center text-gold">
<i class="fa-solid fa-arrows-left-right text-sm"></i>
</div>
</div>
<!-- Range input for drag interaction -->
<input class="absolute inset-0 w-full h-full opacity-0 z-40 cursor-ew-resize" id="sliderRange" max="100" min="0" type="range" value="50"/>
</div>
</div>
</section>
<!-- 6. SERVICE PACKAGES SECTION -->
<section class="py-24 bg-ivory-200 border-t border-burgundy-900/10" id="packages">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="text-center max-w-3xl mx-auto mb-16">
<span class="text-xs uppercase tracking-[0.25em] text-gold-dark font-bold" data-i18n="pkg_sub">Curated Standards</span>
<h2 class="font-serif text-3xl sm:text-5xl font-bold text-burgundy-950 mt-2 mb-4" data-i18n="pkg_title">Renovation Service Packages</h2>
<div class="w-20 h-1 bg-burgundy-800 mx-auto mb-6"></div>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
<!-- Package 1 -->
<div class="bg-ivory-50 rounded-2xl p-8 border border-burgundy-900/10 hover:border-burgundy-900 transition shadow-lg flex flex-col justify-between">
<div>
<span class="text-[10px] uppercase font-bold tracking-widest text-gold-dark block mb-2" data-i18n="pkg1_badge">Essential Luxury</span>
<h3 class="font-serif text-2xl font-bold text-burgundy-950 mb-4" data-i18n="pkg1_title">Signature Refresh</h3>
<div class="font-serif text-3xl font-bold text-burgundy-950 mb-6" data-i18n="pkg1_price">$75,000+</div>
<ul class="text-xs space-y-3 text-neutral-700 mb-8 border-t border-burgundy-900/10 pt-6">
<li class="flex items-center"><i class="fa-solid fa-check text-gold-dark mr-2"></i> Venetian Plaster &amp; Paint Finishing</li>
<li class="flex items-center"><i class="fa-solid fa-check text-gold-dark mr-2"></i> Premium Hardwood / Marble Overlay</li>
<li class="flex items-center"><i class="fa-solid fa-check text-gold-dark mr-2"></i> Architectural Lighting Upgrades</li>
</ul>
</div>
<button class="w-full py-3.5 bg-burgundy-950 text-gold-light font-bold uppercase text-xs tracking-widest rounded transition hover:bg-burgundy-900" data-i18n="btn_choose" onclick="openBookingModal()">Select Package</button>
</div>
<!-- Package 2 (Featured) -->
<div class="bg-burgundy-950 text-ivory-100 rounded-2xl p-8 border-2 border-gold shadow-2xl relative flex flex-col justify-between transform lg:-translate-y-4">
<span class="absolute -top-3.5 right-6 bg-gold text-burgundy-950 text-[9px] font-black uppercase tracking-widest px-4 py-1.5 rounded-full shadow-md" data-i18n="pkg_popular">Most Popular</span>
<div>
<span class="text-[10px] uppercase font-bold tracking-widest text-gold-light block mb-2" data-i18n="pkg2_badge">Haute Architectural</span>
<h3 class="font-serif text-2xl font-bold text-ivory-100 mb-4" data-i18n="pkg2_title">Estate Remodel</h3>
<div class="font-serif text-3xl font-bold text-gold-light mb-6" data-i18n="pkg2_price">$180,000+</div>
<ul class="text-xs space-y-3 text-ivory-200 mb-8 border-t border-gold/20 pt-6">
<li class="flex items-center"><i class="fa-solid fa-check text-gold mr-2"></i> Full Structural Interior Re-engineering</li>
<li class="flex items-center"><i class="fa-solid fa-check text-gold mr-2"></i> Gourmet Chef Kitchen &amp; Master Spa</li>
<li class="flex items-center"><i class="fa-solid fa-check text-gold mr-2"></i> Crestron / Lutron Smart Automation</li>
<li class="flex items-center"><i class="fa-solid fa-check text-gold mr-2"></i> Dedicated Resident Project Manager</li>
</ul>
</div>
<button class="w-full py-3.5 bg-gold text-burgundy-950 font-bold uppercase text-xs tracking-widest rounded transition hover:bg-gold-dark" data-i18n="btn_choose" onclick="openBookingModal()">Select Package</button>
</div>
<!-- Package 3 -->
<div class="bg-ivory-50 rounded-2xl p-8 border border-burgundy-900/10 hover:border-burgundy-900 transition shadow-lg flex flex-col justify-between">
<div>
<span class="text-[10px] uppercase font-bold tracking-widest text-gold-dark block mb-2" data-i18n="pkg3_badge">Bespoke Masterpiece</span>
<h3 class="font-serif text-2xl font-bold text-burgundy-950 mb-4" data-i18n="pkg3_title">Imperial Masterpiece</h3>
<div class="font-serif text-3xl font-bold text-burgundy-950 mb-6" data-i18n="pkg3_price">Custom Quote</div>
<ul class="text-xs space-y-3 text-neutral-700 mb-8 border-t border-burgundy-900/10 pt-6">
<li class="flex items-center"><i class="fa-solid fa-check text-gold-dark mr-2"></i> Rare Imported Calacatta Marble Slabs</li>
<li class="flex items-center"><i class="fa-solid fa-check text-gold-dark mr-2"></i> Custom Subterranean Wine Vaults</li>
<li class="flex items-center"><i class="fa-solid fa-check text-gold-dark mr-2"></i> 10-Year White-Glove VIP Warranty</li>
</ul>
</div>
<button class="w-full py-3.5 bg-burgundy-950 text-gold-light font-bold uppercase text-xs tracking-widest rounded transition hover:bg-burgundy-900" data-i18n="btn_choose" onclick="openBookingModal()">Select Package</button>
</div>
</div>
</div>
</section>
<!-- 7. MATERIALS & FINISHING CUSTOMIZER -->
<section class="py-24 bg-ivory-100" id="materials">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="text-center max-w-3xl mx-auto mb-16">
<span class="text-xs uppercase tracking-[0.25em] text-gold-dark font-bold" data-i18n="mat_sub">Curated Atelier</span>
<h2 class="font-serif text-3xl sm:text-5xl font-bold text-burgundy-950 mt-2 mb-4" data-i18n="mat_title">Materials &amp; Finishes Studio</h2>
<div class="w-20 h-1 bg-burgundy-800 mx-auto mb-6"></div>
</div>
<div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center bg-ivory-50 p-6 sm:p-10 rounded-2xl border border-burgundy-900/10 shadow-xl">
<div class="lg:col-span-7">
<div class="relative h-80 sm:h-96 rounded-xl overflow-hidden shadow-inner border border-burgundy-900/20">
<img alt="Material Swatch" class="w-full h-full object-cover transition-all duration-500" id="matPreviewImg" src="https://images.unsplash.com/photo-1600585152220-90363fe7e115?auto=format&amp;fit=crop&amp;w=1000&amp;q=80"/>
<div class="absolute bottom-4 left-4 right-4 bg-burgundy-950/90 backdrop-blur-md p-4 rounded-lg border border-gold/40 text-ivory-100 flex justify-between items-center">
<div>
<span class="text-[9px] uppercase tracking-wider text-gold-light block font-bold" data-i18n="mat_spec_label">Curated Selection</span>
<h4 class="font-serif font-bold text-lg" id="matTitle">Calacatta Viola Marble &amp; Brushed Brass</h4>
</div>
<span class="text-xs font-bold bg-gold text-burgundy-950 px-3 py-1 rounded" id="matGrade">Italian Import Grade A1</span>
</div>
</div>
</div>
<div class="lg:col-span-5 space-y-4">
<h3 class="font-serif text-2xl font-bold text-burgundy-950" data-i18n="mat_palette_title">Select Swatch Combination</h3>
<button class="mat-opt-btn w-full p-4 rounded-lg border-2 border-gold bg-burgundy-950 text-ivory-100 flex items-center justify-between text-left transition" onclick="changeMaterial('marble')">
<div>
<span class="font-bold text-xs sm:text-sm block">1. Calacatta Viola Marble</span>
<span class="text-[11px] text-gold-light">Heavy burgundy veining, honed finish from Tuscany.</span>
</div>
<i class="fa-solid fa-circle-check text-gold"></i>
</button>
<button class="mat-opt-btn w-full p-4 rounded-lg border border-burgundy-900/20 bg-ivory-100 text-burgundy-950 flex items-center justify-between text-left transition hover:border-burgundy-900" onclick="changeMaterial('venetian')">
<div>
<span class="font-bold text-xs sm:text-sm block">2. Marmorino Venetian Plaster</span>
<span class="text-[11px] text-neutral-500">Tactile lime plaster with rose gold metallic highlights.</span>
</div>
<i class="fa-solid fa-circle text-neutral-300"></i>
</button>
<button class="mat-opt-btn w-full p-4 rounded-lg border border-burgundy-900/20 bg-ivory-100 text-burgundy-950 flex items-center justify-between text-left transition hover:border-burgundy-900" onclick="changeMaterial('wood')">
<div>
<span class="font-bold text-xs sm:text-sm block">3. French Smoked Oak Hardwood</span>
<span class="text-[11px] text-neutral-500">Wire-brushed French oak herringbone pattern.</span>
</div>
<i class="fa-solid fa-circle text-neutral-300"></i>
</button>
</div>
</div>
</div>
</section>
<!-- 8. ESTIMATOR CALCULATOR -->
<section class="py-24 bg-burgundy-950 text-ivory-100 relative" id="calculator">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="text-center max-w-3xl mx-auto mb-16">
<span class="text-xs uppercase tracking-[0.25em] text-gold font-bold" data-i18n="calc_sub">Interactive Estimator</span>
<h2 class="font-serif text-3xl sm:text-5xl font-bold mt-2 mb-4" data-i18n="calc_title">Comprehensive Project Calculator</h2>
<div class="w-20 h-1 bg-gold mx-auto mb-6"></div>
</div>
<div class="grid grid-cols-1 lg:grid-cols-12 gap-8 bg-burgundy-900/60 p-6 sm:p-10 rounded-2xl border border-gold/30 backdrop-blur-md">
<div class="lg:col-span-7 space-y-6">
<div>
<label class="block text-xs uppercase font-bold text-gold-light mb-2" data-i18n="calc_step1">1. Select Luxury Tier</label>
<div class="grid grid-cols-3 gap-3">
<button class="tier-btn border-2 border-gold bg-burgundy-800 text-ivory-100 p-3 rounded text-center" onclick="setCalcTier('signature', this)">
<span class="block font-serif font-bold text-sm">Signature</span>
<span class="text-[10px] text-gold-light">Luxury Standard</span>
</button>
<button class="tier-btn border border-gold/30 bg-burgundy-950 text-ivory-300 p-3 rounded text-center hover:border-gold" onclick="setCalcTier('haute', this)">
<span class="block font-serif font-bold text-sm">Haute</span>
<span class="text-[10px] text-gold-light">Ultra High</span>
</button>
<button class="tier-btn border border-gold/30 bg-burgundy-950 text-ivory-300 p-3 rounded text-center hover:border-gold" onclick="setCalcTier('heritage', this)">
<span class="block font-serif font-bold text-sm">Heritage</span>
<span class="text-[10px] text-gold-light">Historic Custom</span>
</button>
</div>
</div>
<div>
<div class="flex justify-between text-xs text-ivory-200 mb-2 font-bold">
<span class="uppercase tracking-wider text-gold-light" data-i18n="calc_step2">2. Total Interior Square Meters</span>
<span class="text-gold text-sm" id="sqftDisplay">300 Sq M</span>
</div>
<input class="w-full accent-gold cursor-pointer" id="calcSqft" max="1500" min="80" step="20" type="range" value="300"/>
</div>
</div>
<div class="lg:col-span-5 bg-burgundy-950 p-6 sm:p-8 rounded-xl border border-gold/40 flex flex-col justify-between">
<div>
<span class="text-xs uppercase tracking-widest text-gold-light block mb-1" data-i18n="calc_est_total">Estimated Total Investment</span>
<div class="font-serif text-3xl sm:text-4xl font-bold text-gold-light mb-4" id="calcTotalDisplay">$270,000 - $324,000</div>
<div class="w-full h-px bg-burgundy-800 mb-4"></div>
<p class="text-xs text-ivory-300 leading-relaxed mb-6" data-i18n="calc_includes">Includes end-to-end architectural blueprints, municipal permits, on-site project management, and 10-year structural warranty.</p>
</div>
<button class="w-full py-4 bg-gold hover:bg-gold-dark text-burgundy-950 font-bold uppercase text-xs tracking-widest rounded shadow-xl transition" data-i18n="calc_btn" onclick="openBookingModal()">
                        Lock Guarantee &amp; Schedule Inspection
                    </button>
</div>
</div>
</div>
</section>
<!-- 9. INSPECTION BOOKING FORM -->
<section class="py-24 bg-ivory-100" id="booking">
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="bg-ivory-50 border border-burgundy-900/20 rounded-2xl p-6 sm:p-12 shadow-2xl relative">
<div class="text-center mb-10">
<span class="text-xs uppercase tracking-[0.25em] text-gold-dark font-bold" data-i18n="book_sub">Private Concierge</span>
<h2 class="font-serif text-3xl sm:text-4xl font-bold text-burgundy-950 mt-1" data-i18n="book_title">Schedule Site Inspection</h2>
</div>
<form class="space-y-6" id="inspectionBookingForm" onsubmit="handleFormSubmit(event)">
<div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
<div>
<label class="block text-xs uppercase font-bold text-burgundy-950 mb-1" data-i18n="form_name">Full Name *</label>
<input class="w-full bg-ivory-100 border border-burgundy-900/20 rounded p-3 text-xs focus:outline-none focus:border-burgundy-900" placeholder="e.g. Lord Harrington" required="" type="text"/>
</div>
<div>
<label class="block text-xs uppercase font-bold text-burgundy-950 mb-1" data-i18n="form_email">Private Email *</label>
<input class="w-full bg-ivory-100 border border-burgundy-900/20 rounded p-3 text-xs focus:outline-none focus:border-burgundy-900" placeholder="harrington@estate.com" required="" type="email"/>
</div>
<div>
<label class="block text-xs uppercase font-bold text-burgundy-950 mb-1" data-i18n="form_phone">Direct Telephone *</label>
<input class="w-full bg-ivory-100 border border-burgundy-900/20 rounded p-3 text-xs focus:outline-none focus:border-burgundy-900" placeholder="+1 (555) 000-0000" required="" type="tel"/>
</div>
<div>
<label class="block text-xs uppercase font-bold text-burgundy-950 mb-1" data-i18n="form_location">Property Location / City *</label>
<input class="w-full bg-ivory-100 border border-burgundy-900/20 rounded p-3 text-xs focus:outline-none focus:border-burgundy-900" placeholder="Beverly Hills / Menteng" required="" type="text"/>
</div>
</div>
<button class="w-full py-4 bg-burgundy-950 hover:bg-burgundy-900 text-gold-light font-bold uppercase text-xs tracking-widest rounded shadow-xl transition" data-i18n="form_btn" type="submit">
                        Confirm Site Inspection Request
                    </button>
</form>
</div>
</div>
</section>
<!-- 10. FOOTER -->
<footer class="bg-burgundy-950 text-ivory-200 py-16 border-t border-gold/20">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center sm:text-left flex flex-col sm:flex-row justify-between items-center gap-6">
<div>
<a class="font-cinzel text-2xl font-bold tracking-widest text-gold-light" href="#">AURELIA</a>
<p class="text-xs text-ivory-300 mt-1" data-i18n="footer_rights">© 2026 AURELIA Haute Architecture &amp; Renovation LLC. All rights reserved.</p>
</div>
<div class="flex space-x-6 text-xs text-ivory-300">
<a class="hover:text-gold transition" data-i18n="nav_services" href="#services">Services</a>
<a class="hover:text-gold transition" data-i18n="nav_estimator" href="#calculator">Estimator</a>
<a class="hover:text-gold transition" data-i18n="topbar_cta" href="#booking">Inspection</a>
</div>
</div>
<div class="aurelia-template-credit">Made with care ♡ · Website template by WEBIA</div></footer>
<!-- 11. FLOATING WHATSAPP BUTTON -->
<a class="fixed bottom-6 right-6 z-50 flex items-center" href="https://wa.me/6281234567890?text=Halo%20AURELIA%2C%20saya%20ingin%20konsultasi%20renovasi%20rumah." id="waLink" rel="noopener noreferrer" target="_blank">
<div class="w-14 h-14 rounded-full bg-emerald-600 text-white flex items-center justify-center text-2xl shadow-2xl hover:scale-110 transition duration-300 border-2 border-white">
<i class="fa-brands fa-whatsapp"></i>
</div>
</a>
<!-- 12. FLOATING CUTE AI CHATBOT -->
<div class="fixed bottom-24 right-6 z-50" id="aiChatbotContainer">
<button class="relative group focus:outline-none" id="aiChatToggle">
<div class="w-14 h-14 rounded-full bg-burgundy-950 border-2 border-gold shadow-2xl flex items-center justify-center text-gold text-xl hover:scale-110 transition duration-300 animate-float">
<i class="fa-solid fa-robot"></i>
</div>
</button>
<div class="hidden absolute bottom-16 right-0 w-80 sm:w-96 bg-ivory-50 border border-burgundy-900/20 rounded-2xl shadow-2xl overflow-hidden flex flex-col z-50" id="aiChatBox">
<div class="bg-burgundy-950 text-ivory-100 p-4 flex items-center justify-between border-b border-gold/30">
<div class="flex items-center space-x-3">
<div class="w-8 h-8 rounded-full bg-gold/20 border border-gold flex items-center justify-center text-gold text-xs">
<i class="fa-solid fa-wand-magic-sparkles"></i>
</div>
<div>
<h4 class="font-serif font-bold text-sm">Renova AI Assistant</h4>
<span class="text-[9px] text-gold-light" data-i18n="ai_status">Online | Bilingue EN / ID</span>
</div>
</div>
<button class="text-ivory-300 hover:text-white" id="closeAiChat"><i class="fa-solid fa-xmark text-base"></i></button>
</div>
<div class="p-4 h-64 overflow-y-auto space-y-3 bg-ivory-100/60 text-xs" id="chatMessages">
<div class="flex space-x-2">
<div class="w-6 h-6 rounded-full bg-burgundy-950 text-gold text-[10px] flex items-center justify-center flex-shrink-0"><i class="fa-solid fa-robot"></i></div>
<div class="bg-ivory-50 p-3 rounded-lg border border-burgundy-900/10 text-neutral-800" data-i18n="ai_welcome">
                        Welcome to AURELIA. I am Renova AI. How may I assist your estate vision today?
                    </div>
</div>
</div>
<div class="p-3 bg-ivory-50 border-t border-burgundy-900/10 flex items-center space-x-2">
<input class="flex-1 bg-ivory-100 border border-burgundy-900/20 rounded p-2 text-xs focus:outline-none focus:border-burgundy-900" id="aiInput" placeholder="Ask Renova AI..." type="text"/>
<button class="w-8 h-8 rounded bg-burgundy-950 text-gold flex items-center justify-center" onclick="sendAiMessage()"><i class="fa-solid fa-paper-plane text-xs"></i></button>
</div>
</div>
</div>
<!-- MODAL SPECIFICATIONS -->
<div class="fixed inset-0 z-50 hidden bg-burgundy-950/80 backdrop-blur-md flex items-center justify-center p-4" id="serviceModal">
<div class="bg-ivory-50 border border-gold/40 rounded-2xl max-w-xl w-full p-8 relative shadow-2xl">
<button class="absolute top-4 right-4 text-burgundy-950 text-xl" onclick="closeServiceModal()"><i class="fa-solid fa-xmark"></i></button>
<h3 class="font-serif text-2xl font-bold text-burgundy-950 mb-2" id="modalTitle">Service Specification</h3>
<div class="w-16 h-1 bg-burgundy-800 mb-4"></div>
<p class="text-xs text-neutral-600 leading-relaxed mb-6" id="modalDesc"></p>
<button class="w-full py-3 bg-burgundy-950 text-gold-light font-bold text-xs uppercase tracking-widest rounded" data-i18n="btn_modal_book" onclick="closeServiceModal(); openBookingModal();">
                Book Consultation For This Service
            </button>
</div>
</div>
<!-- I18N DICTIONARY & INTERACTIVE SCRIPT -->

<script defer="True" src="{{ asset('js/website-bisnis/templates/home-services/home-renovation-repair/aurelia/aurelia.js') }}?v=1"></script></body>
</html>