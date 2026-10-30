<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>MATCHA CLEAN | Organic Botanical & Deep Home Sanitization</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Sora:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>

        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        matcha: {
                            50: '#F4F7F2',
                            100: '#E8EFE0',
                            200: '#D2E1C3',
                            300: '#A2B889',
                            400: '#839F68',
                            DEFAULT: '#748E63',
                            600: '#5A724B',
                            700: '#435736',
                            800: '#2D3B2D',
                            900: '#1C2D1F',
                        },
                        oat: {
                            50: '#FFFFFF',
                            100: '#FBF9F5',
                            DEFAULT: '#F7F5F0',
                            200: '#EDE8DF',
                            300: '#DDD5C7',
                        },
                        foam: '#DCE5D3',
                        bark: '#3E342B'
                    },
                    fontFamily: {
                        sora: ['Sora', 'sans-serif'],
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                    },
                    borderRadius: {
                        'organic': '2.5rem 1rem 2.5rem 1rem',
                        'blob': '40% 60% 70% 30% / 40% 50% 60% 50%',
                        'blob-alt': '60% 40% 30% 70% / 50% 30% 70% 50%',
                    }
                }
            }
        }
    
    </script>
    <link rel="stylesheet" href="{{ asset('css/website-bisnis/templates/home-services/home-cleaning-deep-cleaning/matcha-clean/matcha-clean.css') }}">
</head>
<body class="bg-oat text-matcha-900 font-sans selection:bg-matcha-300 selection:text-matcha-900 antialiased overflow-x-hidden relative">


    <!-- CANVAS FOR ANIMATED FALLING MATCH LEAVES -->
    <canvas id="leavesCanvas"></canvas>

    <!-- 1. TOPBAR WITH BILINGUAL SWITCHER -->
    <div class="bg-matcha-900 text-matcha-100 text-xs py-2.5 px-4 sm:px-8 border-b border-matcha-700/60 relative z-30">
        <div class="max-w-7xl mx-auto flex flex-col sm:flex-row justify-between items-center gap-2">
            <div class="flex items-center space-x-6 text-[11px] sm:text-xs font-semibold">
                <span class="flex items-center text-matcha-200">
                    <i class="fa-solid fa-leaf mr-2 text-matcha-300 animate-pulse"></i>
                    <span data-i18n="topbar_badge">100% Non-Toxic Botanical Bio-Enzymes</span>
                </span>
                <span class="hidden md:inline text-matcha-700">|</span>
                <span class="hidden md:flex items-center text-oat-200">
                    <i class="fa-solid fa-clock mr-1.5 text-matcha-300"></i>
                    <span data-i18n="topbar_hours">Mon-Sun: 07:00 - 20:00</span>
                </span>
            </div>

            <div class="flex items-center space-x-4">
                <a href="tel:+628123456789" class="text-matcha-100 hover:text-white font-bold text-[11px] flex items-center">
                    <i class="fa-solid fa-phone text-matcha-300 mr-1.5"></i>
                    <span>+62 812-3456-7890</span>
                </a>
                
                <span class="text-matcha-700">|</span>

                <!-- Language Switcher Pill -->
                <div class="flex items-center bg-black/30 border border-matcha-400/50 rounded-full p-0.5 shadow-inner">
                    <button id="langEN" onclick="setLang('en')" class="px-2.5 py-0.5 rounded-full text-[10px] font-bold uppercase transition tracking-wider bg-matcha-300 text-matcha-900">
                        EN 🇺🇸
                    </button>
                    <button id="langID" onclick="setLang('id')" class="px-2.5 py-0.5 rounded-full text-[10px] font-bold uppercase transition tracking-wider text-matcha-200 hover:text-white">
                        ID 🇮🇩
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- 2. NAVBAR WITH HIGH CONTRAST & CLEAR VISIBILITY -->
    <nav class="sticky top-0 z-30 bg-oat/95 backdrop-blur-md border-b border-matcha-200/80 transition-all duration-300 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Brand Logo (High Contrast Dark Green) -->
                <a href="#" class="flex items-center space-x-3 group">
                    <div class="w-11 h-11 rounded-full bg-matcha-900 text-matcha-300 flex items-center justify-center text-xl shadow-md group-hover:scale-105 transition-transform duration-300 border border-matcha-600">
                        <i class="fa-solid fa-leaf"></i>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-sora text-2xl font-black tracking-tight text-matcha-900 flex items-center">
                            MATCHA <span class="text-matcha-DEFAULT font-normal ml-1">CLEAN</span>
                        </span>
                        <span class="text-[9px] uppercase tracking-[0.25em] text-matcha-700 font-extrabold" data-i18n="nav_tagline">Organic Botanical Sanitization</span>
                    </div>
                </a>

                <!-- Desktop Navigation Links -->
                <div class="hidden lg:flex items-center space-x-7 text-xs font-extrabold uppercase tracking-wider text-matcha-900">
                    <a href="#selector" class="hover:text-matcha-DEFAULT transition" data-i18n="nav_services">Service Selector</a>
                    <a href="#transformation" class="hover:text-matcha-DEFAULT transition" data-i18n="nav_transform">Transformations</a>
                    <a href="#rituals" class="hover:text-matcha-DEFAULT transition" data-i18n="nav_packages">Ritual Packages</a>
                    <a href="#calculator" class="hover:text-matcha-DEFAULT transition" data-i18n="nav_calculator">Price Estimator</a>
                    <a href="#products" class="hover:text-matcha-DEFAULT transition" data-i18n="nav_products">Eco Products</a>
                    <a href="#materials" class="hover:text-matcha-DEFAULT transition" data-i18n="nav_care">Surface Care</a>
                </div>

                <!-- High Contrast CTA Button -->
                <div class="hidden sm:flex items-center space-x-4">
                    <button onclick="scrollToSection('booking')" class="px-6 py-3 bg-matcha-900 hover:bg-matcha-700 text-white font-sora text-xs font-extrabold uppercase tracking-widest rounded-full shadow-lg hover:shadow-matcha-900/40 border border-matcha-700 transition duration-300 flex items-center space-x-2">
                        <i class="fa-solid fa-sparkles text-matcha-300"></i>
                        <span data-i18n="nav_book_btn">Book Botanical Reset</span>
                    </button>
                </div>

                <!-- Mobile Menu Hamburger -->
                <div class="lg:hidden flex items-center">
                    <button id="mobileMenuBtn" class="text-matcha-900 p-2 focus:outline-none">
                        <i class="fa-solid fa-bars text-2xl"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Drawer -->
        <div id="mobileMenu" class="hidden lg:hidden bg-oat-100 border-b border-matcha-200 px-6 py-4 space-y-3 font-bold text-xs uppercase tracking-wider">
            <a href="#selector" class="block py-2 text-matcha-900" data-i18n="nav_services">Service Selector</a>
            <a href="#transformation" class="block py-2 text-matcha-900" data-i18n="nav_transform">Transformations</a>
            <a href="#rituals" class="block py-2 text-matcha-900" data-i18n="nav_packages">Ritual Packages</a>
            <a href="#calculator" class="block py-2 text-matcha-900" data-i18n="nav_calculator">Price Estimator</a>
            <a href="#products" class="block py-2 text-matcha-900" data-i18n="nav_products">Eco Products</a>
            <a href="#materials" class="block py-2 text-matcha-900" data-i18n="nav_care">Surface Care</a>
            <button onclick="scrollToSection('booking')" class="w-full py-3 bg-matcha-900 text-white font-bold uppercase rounded-full shadow-md text-center">
                Book Botanical Reset
            </button>
        </div>
    </nav>

    <!-- 3. HERO BANNER -->
    <section class="relative min-h-[85vh] py-16 lg:py-20 overflow-hidden bg-gradient-to-b from-oat-100 via-matcha-100/50 to-oat">
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                
                <!-- Left Hero Copy -->
                <div class="lg:col-span-6 space-y-6 text-center lg:text-left">
                    <div class="inline-flex items-center space-x-2 bg-matcha-200/80 border border-matcha-400 px-4 py-2 rounded-full text-matcha-900 text-xs font-extrabold tracking-wider uppercase">
                        <i class="fa-solid fa-leaf text-matcha-DEFAULT"></i>
                        <span data-i18n="hero_pill">Organic Pure Living Standards</span>
                    </div>

                    <h1 class="font-sora text-4xl sm:text-5xl lg:text-6xl font-black text-matcha-900 leading-[1.12]">
                        <span data-i18n="hero_title1">Breathe Pure.</span> <br>
                        <span class="text-matcha-DEFAULT font-serif italic" data-i18n="hero_title2">Organic Home Reset</span> <br>
                        <span data-i18n="hero_title3">For Healthy Living.</span>
                    </h1>

                    <p class="text-neutral-700 text-sm sm:text-base leading-relaxed font-medium max-w-xl mx-auto lg:mx-0" data-i18n="hero_desc">
                        Experience deep, toxic-free home restoration infused with organic matcha leaf extract, tea tree antiseptics, and non-allergenic botanical bio-enzymes.
                    </p>

                    <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4 pt-2">
                        <button onclick="scrollToSection('calculator')" class="w-full sm:w-auto px-8 py-4 bg-matcha-900 hover:bg-matcha-800 text-white font-sora text-xs font-extrabold uppercase tracking-widest rounded-full shadow-xl hover:shadow-matcha-900/30 transition duration-300">
                            <span data-i18n="hero_cta_primary">Instant Area Price Quote</span>
                        </button>
                        <button onclick="scrollToSection('selector')" class="w-full sm:w-auto px-8 py-4 bg-matcha-100 hover:bg-matcha-200 text-matcha-900 border-2 border-matcha-300 font-sora text-xs font-extrabold uppercase tracking-widest rounded-full transition">
                            <span data-i18n="hero_cta_secondary">Explore Room Menu</span>
                        </button>
                    </div>

                    <!-- Stats -->
                    <div class="pt-8 border-t border-matcha-200 grid grid-cols-3 gap-4 text-center lg:text-left">
                        <div>
                            <span class="block font-sora text-2xl font-black text-matcha-900">99.9%</span>
                            <span class="text-[10px] text-neutral-600 uppercase tracking-widest font-extrabold" data-i18n="hero_stat1">Pathogen Free</span>
                        </div>
                        <div>
                            <span class="block font-sora text-2xl font-black text-matcha-900">100%</span>
                            <span class="text-[10px] text-neutral-600 uppercase tracking-widest font-extrabold" data-i18n="hero_stat2">Botanical & Pet Safe</span>
                        </div>
                        <div>
                            <span class="block font-sora text-2xl font-black text-matcha-900">4,800+</span>
                            <span class="text-[10px] text-neutral-600 uppercase tracking-widest font-extrabold" data-i18n="hero_stat3">Homes Reset</span>
                        </div>
                    </div>
                </div>

                <!-- Right Hero Cleanliness Interactive Widget -->
                <div class="lg:col-span-6">
                    <div class="relative bg-oat-100 p-6 sm:p-8 rounded-3xl border border-matcha-300 organic-shadow">
                        <div class="flex items-center justify-between mb-4">
                            <div>
                                <span class="text-[10px] font-extrabold uppercase tracking-widest text-matcha-700 block" data-i18n="hero_widget_label">Interactive Home Meter</span>
                                <h3 class="font-sora text-xl font-bold text-matcha-900" data-i18n="hero_widget_title">Simulate Organic Cleanliness</h3>
                            </div>
                            <span id="heroMeterScore" class="font-sora text-2xl font-black text-matcha-900 bg-matcha-200 px-4 py-1 rounded-full border border-matcha-400">98% Pure</span>
                        </div>

                        <!-- Interactive Image Preview -->
                        <div class="relative h-64 sm:h-80 rounded-2xl overflow-hidden border border-matcha-300 shadow-inner mb-6">
                            <img id="heroCleanImg" src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=800&q=80" alt="Clean Home Space" class="w-full h-full object-cover transition-all duration-700">
                            <div id="heroDirtOverlay" class="absolute inset-0 bg-bark/40 mix-blend-multiply opacity-20 transition-opacity duration-500"></div>
                            
                            <!-- Ambient Organic Floating Badges -->
                            <div class="absolute top-4 left-4 bg-oat/95 backdrop-blur-md px-3 py-1.5 rounded-full border border-matcha-300 text-[10px] font-bold text-matcha-900 shadow">
                                <i class="fa-solid fa-wind text-matcha-DEFAULT mr-1"></i> <span data-i18n="badge_dust">Dust-Free Air Filtered</span>
                            </div>
                            <div class="absolute bottom-4 right-4 bg-matcha-900/95 text-oat-50 backdrop-blur-md px-3 py-1.5 rounded-full border border-matcha-500 text-[10px] font-bold shadow">
                                <i class="fa-solid fa-sparkles text-matcha-300 mr-1"></i> <span data-i18n="badge_microbe">Bio-Sanitized Surface</span>
                            </div>
                        </div>

                        <!-- Slider Controls -->
                        <div class="space-y-2">
                            <div class="flex justify-between text-xs font-extrabold text-matcha-900">
                                <span data-i18n="meter_dusty">Heavy Dust & Bacteria</span>
                                <span data-i18n="meter_pure">Matcha Botanical Pure</span>
                            </div>
                            <input type="range" id="heroCleanSlider" min="20" max="100" value="98" class="w-full accent-matcha-900 cursor-pointer">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- 4. SERVICE SELECTOR -->
    <section id="selector" class="py-20 bg-oat relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-xs uppercase tracking-[0.25em] font-extrabold text-matcha-700" data-i18n="sel_sub">Smart Customization</span>
                <h2 class="font-sora text-3xl sm:text-4xl font-extrabold text-matcha-900 mt-2 mb-4" data-i18n="sel_title">Personalized Cleaning Service Selector</h2>
                <div class="w-16 h-1 bg-matcha-DEFAULT mx-auto rounded-full mb-4"></div>
                <p class="text-neutral-600 text-sm" data-i18n="sel_desc">Select your target room and current condition for a tailored organic care recipe.</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center bg-oat-100 p-6 sm:p-10 rounded-3xl border border-matcha-300 organic-shadow">
                
                <!-- Room Selector Buttons -->
                <div class="lg:col-span-6 space-y-4">
                    <label class="block text-xs uppercase font-extrabold tracking-wider text-matcha-900 mb-2" data-i18n="sel_room_label">1. Choose Target Room</label>
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                        <button onclick="selectRoom('living', this)" class="room-btn active bg-matcha-900 text-white p-4 rounded-2xl border border-matcha-700 font-sora text-xs font-bold text-left transition flex flex-col justify-between h-24">
                            <i class="fa-solid fa-couch text-lg text-matcha-300"></i>
                            <span data-i18n="room_living">Living Room</span>
                        </button>
                        <button onclick="selectRoom('kitchen', this)" class="room-btn bg-oat text-matcha-900 p-4 rounded-2xl border border-matcha-300 font-sora text-xs font-bold text-left transition hover:border-matcha-600 flex flex-col justify-between h-24">
                            <i class="fa-solid fa-kitchen-set text-lg text-matcha-DEFAULT"></i>
                            <span data-i18n="room_kitchen">Gourmet Kitchen</span>
                        </button>
                        <button onclick="selectRoom('bedroom', this)" class="room-btn bg-oat text-matcha-900 p-4 rounded-2xl border border-matcha-300 font-sora text-xs font-bold text-left transition hover:border-matcha-600 flex flex-col justify-between h-24">
                            <i class="fa-solid fa-bed text-lg text-matcha-DEFAULT"></i>
                            <span data-i18n="room_bed">Bedroom Sanctuary</span>
                        </button>
                        <button onclick="selectRoom('bath', this)" class="room-btn bg-oat text-matcha-900 p-4 rounded-2xl border border-matcha-300 font-sora text-xs font-bold text-left transition hover:border-matcha-600 flex flex-col justify-between h-24">
                            <i class="fa-solid fa-bath text-lg text-matcha-DEFAULT"></i>
                            <span data-i18n="room_bath">Bathroom & Spa</span>
                        </button>
                        <button onclick="selectRoom('balcony', this)" class="room-btn bg-oat text-matcha-900 p-4 rounded-2xl border border-matcha-300 font-sora text-xs font-bold text-left transition hover:border-matcha-600 flex flex-col justify-between h-24">
                            <i class="fa-solid fa-cloud-sun text-lg text-matcha-DEFAULT"></i>
                            <span data-i18n="room_balcony">Balcony & Patio</span>
                        </button>
                    </div>

                    <label class="block text-xs uppercase font-extrabold tracking-wider text-matcha-900 mt-6 mb-2" data-i18n="sel_cond_label">2. Select Current Room Condition</label>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                        <button onclick="selectCond('light', this)" class="cond-btn active border-2 border-matcha-900 bg-matcha-200 p-3 rounded-xl text-left text-xs font-extrabold text-matcha-900">
                            <span class="block text-matcha-900" data-i18n="cond_light">Light Dust</span>
                            <span class="text-[10px] text-neutral-600 font-normal" data-i18n="cond_light_sub">Routine Maintenance</span>
                        </button>
                        <button onclick="selectCond('moderate', this)" class="cond-btn border border-matcha-300 bg-oat p-3 rounded-xl text-left text-xs font-extrabold text-matcha-900 hover:border-matcha-600">
                            <span class="block text-matcha-900" data-i18n="cond_mod">Moderate Build-up</span>
                            <span class="text-[10px] text-neutral-600 font-normal" data-i18n="cond_mod_sub">Deep Dust & Stains</span>
                        </button>
                        <button onclick="selectCond('heavy', this)" class="cond-btn border border-matcha-300 bg-oat p-3 rounded-xl text-left text-xs font-extrabold text-matcha-900 hover:border-matcha-600">
                            <span class="block text-matcha-900" data-i18n="cond_heavy">Post-Renovation</span>
                            <span class="text-[10px] text-neutral-600 font-normal" data-i18n="cond_heavy_sub">Heavy Debris & Grime</span>
                        </button>
                    </div>
                </div>

                <!-- Dynamic Recipe Output Card -->
                <div class="lg:col-span-6 bg-matcha-900 text-oat-50 p-6 sm:p-8 rounded-2xl border border-matcha-700 shadow-2xl relative">
                    <span class="text-[10px] uppercase tracking-widest font-extrabold text-matcha-300 block mb-1" data-i18n="recipe_badge">Recommended Organic Treatment</span>
                    <h3 id="recipeTitle" class="font-sora text-2xl font-bold mb-3 text-matcha-100">Living Room Organic Care Recipe</h3>
                    <p id="recipeDesc" class="text-xs text-matcha-200 leading-relaxed mb-6">High-HEPA micro-dust suction, matcha leaf anti-static wood wipe, non-toxic leather steam condition, and botanical air purification.</p>
                    
                    <ul id="recipeList" class="text-xs space-y-2.5 text-oat-200 mb-6 border-t border-matcha-800 pt-4">
                        <li class="flex items-center"><i class="fa-solid fa-circle-check text-matcha-300 mr-2"></i> 99.97% HEPA Filtration for airborne dust</li>
                        <li class="flex items-center"><i class="fa-solid fa-circle-check text-matcha-300 mr-2"></i> Organic Tea Tree sanitization on high-touch handles</li>
                        <li class="flex items-center"><i class="fa-solid fa-circle-check text-matcha-300 mr-2"></i> Natural Lavender aroma fogging treatment</li>
                    </ul>

                    <div class="flex items-center justify-between bg-black/40 p-4 rounded-xl border border-matcha-800">
                        <div>
                            <span class="text-[10px] text-matcha-300 font-bold uppercase block" data-i18n="recipe_duration_label">Estimated Duration</span>
                            <span id="recipeDuration" class="font-sora text-base font-bold text-oat-50">1.5 - 2.0 Hours</span>
                        </div>
                        <button onclick="scrollToSection('booking')" class="px-5 py-2.5 bg-matcha-300 hover:bg-matcha-200 text-matcha-900 font-extrabold uppercase text-xs rounded-lg transition" data-i18n="btn_book_this">
                            Book This Recipe
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- 5. HOME FRESHNESS PROFILE GENERATOR -->
    <section class="py-20 bg-matcha-50 border-y border-matcha-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-12">
                <span class="text-xs uppercase tracking-[0.25em] font-extrabold text-matcha-700" data-i18n="fresh_sub">Health & Comfort Profile</span>
                <h2 class="font-sora text-3xl sm:text-4xl font-extrabold text-matcha-900 mt-2 mb-4" data-i18n="fresh_title">Home Freshness Profile Generator</h2>
                <p class="text-neutral-600 text-sm" data-i18n="fresh_desc">Check your primary home environment concerns to generate a custom botanical defense plan.</p>
            </div>

            <div class="bg-oat-100 p-6 sm:p-10 rounded-3xl border border-matcha-300 organic-shadow max-w-4xl mx-auto">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 mb-8">
                    <label class="flex items-center p-4 bg-oat rounded-2xl border border-matcha-200 cursor-pointer hover:border-matcha-DEFAULT transition">
                        <input type="checkbox" onchange="updateFreshnessScore()" class="fresh-cb accent-matcha-900 w-4 h-4 mr-3">
                        <span class="text-xs font-bold text-matcha-900" data-i18n="cb_dust">Dust Build-up & Mites</span>
                    </label>
                    <label class="flex items-center p-4 bg-oat rounded-2xl border border-matcha-200 cursor-pointer hover:border-matcha-DEFAULT transition">
                        <input type="checkbox" onchange="updateFreshnessScore()" class="fresh-cb accent-matcha-900 w-4 h-4 mr-3">
                        <span class="text-xs font-bold text-matcha-900" data-i18n="cb_pet">Pet Odors & Fur</span>
                    </label>
                    <label class="flex items-center p-4 bg-oat rounded-2xl border border-matcha-200 cursor-pointer hover:border-matcha-DEFAULT transition">
                        <input type="checkbox" onchange="updateFreshnessScore()" class="fresh-cb accent-matcha-900 w-4 h-4 mr-3">
                        <span class="text-xs font-bold text-matcha-900" data-i18n="cb_grease">Kitchen Grease Slime</span>
                    </label>
                    <label class="flex items-center p-4 bg-oat rounded-2xl border border-matcha-200 cursor-pointer hover:border-matcha-DEFAULT transition">
                        <input type="checkbox" onchange="updateFreshnessScore()" class="fresh-cb accent-matcha-900 w-4 h-4 mr-3">
                        <span class="text-xs font-bold text-matcha-900" data-i18n="cb_mold">Bathroom Mold & Grout</span>
                    </label>
                    <label class="flex items-center p-4 bg-oat rounded-2xl border border-matcha-200 cursor-pointer hover:border-matcha-DEFAULT transition">
                        <input type="checkbox" onchange="updateFreshnessScore()" class="fresh-cb accent-matcha-900 w-4 h-4 mr-3">
                        <span class="text-xs font-bold text-matcha-900" data-i18n="cb_allergen">Hidden Allergens</span>
                    </label>
                    <label class="flex items-center p-4 bg-oat rounded-2xl border border-matcha-200 cursor-pointer hover:border-matcha-DEFAULT transition">
                        <input type="checkbox" onchange="updateFreshnessScore()" class="fresh-cb accent-matcha-900 w-4 h-4 mr-3">
                        <span class="text-xs font-bold text-matcha-900" data-i18n="cb_air">Stale Air Quality</span>
                    </label>
                </div>

                <!-- Result Box -->
                <div class="bg-matcha-100 p-6 rounded-2xl border border-matcha-300 flex flex-col sm:flex-row items-center justify-between gap-4">
                    <div>
                        <span class="text-[10px] font-extrabold text-matcha-700 uppercase tracking-wider block" data-i18n="fresh_index_label">Target Freshness Restoration Index</span>
                        <h4 id="freshIndexText" class="font-sora text-xl font-extrabold text-matcha-900">Standard Refresh Required</h4>
                    </div>
                    <button onclick="scrollToSection('rituals')" class="px-6 py-3 bg-matcha-900 hover:bg-matcha-800 text-white font-sora font-extrabold text-xs uppercase tracking-wider rounded-xl transition">
                        <span data-i18n="btn_view_recommended">View Recommended Ritual</span>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- 6. BEFORE & AFTER TRANSFORMATION SLIDER -->
    <section id="transformation" class="py-20 bg-matcha-900 text-oat-50 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-xs uppercase tracking-[0.25em] font-extrabold text-matcha-300" data-i18n="trans_sub">Visual Proof</span>
                <h2 class="font-sora text-3xl sm:text-4xl font-extrabold mt-2 mb-4" data-i18n="trans_title">Botanical Before & After Slider</h2>
                <div class="w-16 h-1 bg-matcha-300 mx-auto rounded-full mb-4"></div>
                <p class="text-matcha-200 text-sm" data-i18n="trans_desc">Drag the interactive slider to view instant deep-cleaning results on delicate surfaces.</p>
            </div>

            <!-- Comparison Canvas -->
            <div id="transContainer" class="relative max-w-4xl h-[350px] sm:h-[480px] mx-auto rounded-3xl overflow-hidden border-2 border-matcha-500 shadow-2xl select-none">
                <img src="https://images.unsplash.com/photo-1584622650111-993a426fbf0a?auto=format&fit=crop&w=1200&q=80" alt="After Deep Cleaning" class="absolute inset-0 w-full h-full object-cover">
                <span class="absolute top-4 right-4 bg-matcha-900/90 text-matcha-200 border border-matcha-500 text-[10px] uppercase font-bold tracking-widest px-3 py-1.5 rounded-full backdrop-blur-md" data-i18n="trans_after">AFTER MATCHA RESET</span>

                <div id="transOverlay" class="absolute inset-0 w-full h-full before-after-overlay overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1527515637462-cff94eecc1ac?auto=format&fit=crop&w=1200&q=80" alt="Before Deep Cleaning" class="absolute inset-0 w-full h-full object-cover filter contrast-125">
                    <span class="absolute top-4 left-4 bg-bark/90 text-oat-200 border border-neutral-700 text-[10px] uppercase font-bold tracking-widest px-3 py-1.5 rounded-full backdrop-blur-md" data-i18n="trans_before">BEFORE (DUST & DIRT)</span>
                </div>

                <div id="transHandle" class="absolute top-0 bottom-0 w-1 bg-matcha-300 cursor-ew-resize z-30" style="left: 50%;">
                    <div class="absolute top-1/2 -translate-y-1/2 -translate-x-1/2 w-10 h-10 rounded-full bg-matcha-900 border-2 border-matcha-300 shadow-2xl flex items-center justify-center text-matcha-300">
                        <i class="fa-solid fa-arrows-left-right text-xs"></i>
                    </div>
                </div>

                <input type="range" id="transRange" min="0" max="100" value="50" class="absolute inset-0 w-full h-full opacity-0 z-40 cursor-ew-resize">
            </div>
        </div>
    </section>

    <!-- 7. CLEANING RITUAL PACKAGES -->
    <section id="rituals" class="py-20 bg-oat">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-xs uppercase tracking-[0.25em] font-extrabold text-matcha-700" data-i18n="pkg_sub">Structured Packages</span>
                <h2 class="font-sora text-3xl sm:text-4xl font-extrabold text-matcha-900 mt-2 mb-4" data-i18n="pkg_title">Cleaning Ritual Packages</h2>
                <div class="w-16 h-1 bg-matcha-DEFAULT mx-auto rounded-full mb-4"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Package 1 -->
                <div class="bg-oat-100 rounded-3xl p-8 border border-matcha-300 hover:border-matcha-DEFAULT transition shadow-lg flex flex-col justify-between">
                    <div>
                        <span class="text-[10px] uppercase font-bold tracking-widest text-matcha-700 block mb-2" data-i18n="p1_badge">Essential Care</span>
                        <h3 class="font-sora text-2xl font-bold text-matcha-900 mb-2" data-i18n="p1_title">Refresh Ritual</h3>
                        <p class="text-xs text-neutral-600 mb-6" data-i18n="p1_desc">Ideal for bi-weekly upkeep and allergen maintenance.</p>
                        <div class="font-sora text-3xl font-extrabold text-matcha-900 mb-6" data-i18n="p1_price">Rp 450.000 <span class="text-xs text-neutral-500 font-normal">/ session</span></div>
                        <ul class="text-xs space-y-3 text-neutral-700 mb-8 border-t border-matcha-200 pt-6">
                            <li class="flex items-center"><i class="fa-solid fa-leaf text-matcha-DEFAULT mr-2"></i> Dusting & Micro-vacuuming</li>
                            <li class="flex items-center"><i class="fa-solid fa-leaf text-matcha-DEFAULT mr-2"></i> Organic Floor Mopping</li>
                            <li class="flex items-center"><i class="fa-solid fa-leaf text-matcha-DEFAULT mr-2"></i> Kitchen & Bathroom Wipe-down</li>
                        </ul>
                    </div>
                    <button onclick="scrollToSection('booking')" class="w-full py-3.5 bg-matcha-100 hover:bg-matcha-200 text-matcha-900 font-extrabold uppercase text-xs tracking-wider rounded-xl transition" data-i18n="btn_choose_pkg">Choose Refresh</button>
                </div>

                <!-- Package 2 (Featured) -->
                <div class="bg-matcha-900 text-oat-50 rounded-3xl p-8 border-2 border-matcha-400 shadow-2xl relative flex flex-col justify-between transform md:-translate-y-4">
                    <span class="absolute -top-3.5 right-6 bg-matcha-300 text-matcha-900 text-[9px] font-extrabold uppercase tracking-widest px-3 py-1 rounded-full shadow" data-i18n="pkg_popular">Most Popular</span>
                    <div>
                        <span class="text-[10px] uppercase font-bold tracking-widest text-matcha-300 block mb-2" data-i18n="p2_badge">Deep Restoration</span>
                        <h3 class="font-sora text-2xl font-bold mb-2" data-i18n="p2_title">Reset Ritual</h3>
                        <p class="text-xs text-matcha-200 mb-6" data-i18n="p2_desc">Thorough bio-sanitization and deep extraction.</p>
                        <div class="font-sora text-3xl font-extrabold text-matcha-300 mb-6" data-i18n="p2_price">Rp 850.000 <span class="text-xs text-matcha-200 font-normal">/ session</span></div>
                        <ul class="text-xs space-y-3 text-oat-200 mb-8 border-t border-matcha-800 pt-6">
                            <li class="flex items-center"><i class="fa-solid fa-check text-matcha-300 mr-2"></i> Includes all Refresh Ritual tasks</li>
                            <li class="flex items-center"><i class="fa-solid fa-check text-matcha-300 mr-2"></i> Kitchen Degreasing & Steam Clean</li>
                            <li class="flex items-center"><i class="fa-solid fa-check text-matcha-300 mr-2"></i> Bathroom Grout Mold Removal</li>
                            <li class="flex items-center"><i class="fa-solid fa-check text-matcha-300 mr-2"></i> Mattress UV Mite Sanitization</li>
                        </ul>
                    </div>
                    <button onclick="scrollToSection('booking')" class="w-full py-3.5 bg-matcha-300 hover:bg-matcha-200 text-matcha-900 font-extrabold uppercase text-xs tracking-wider rounded-xl transition" data-i18n="btn_choose_pkg">Choose Reset</button>
                </div>

                <!-- Package 3 -->
                <div class="bg-oat-100 rounded-3xl p-8 border border-matcha-300 hover:border-matcha-DEFAULT transition shadow-lg flex flex-col justify-between">
                    <div>
                        <span class="text-[10px] uppercase font-bold tracking-widest text-matcha-700 block mb-2" data-i18n="p3_badge">Total Bio-Shield</span>
                        <h3 class="font-sora text-2xl font-bold text-matcha-900 mb-2" data-i18n="p3_title">Deep Restore Ritual</h3>
                        <p class="text-xs text-neutral-600 mb-6" data-i18n="p3_desc">For post-renovation or moving into a new home.</p>
                        <div class="font-sora text-3xl font-extrabold text-matcha-900 mb-6" data-i18n="p3_price">Rp 1.450.000 <span class="text-xs text-neutral-500 font-normal">/ session</span></div>
                        <ul class="text-xs space-y-3 text-neutral-700 mb-8 border-t border-matcha-200 pt-6">
                            <li class="flex items-center"><i class="fa-solid fa-leaf text-matcha-DEFAULT mr-2"></i> Full Home High-Access Scrub</li>
                            <li class="flex items-center"><i class="fa-solid fa-leaf text-matcha-DEFAULT mr-2"></i> Inside Cabinet & Appliance Clean</li>
                            <li class="flex items-center"><i class="fa-solid fa-leaf text-matcha-DEFAULT mr-2"></i> Organic Ozone Fog Sterilization</li>
                        </ul>
                    </div>
                    <button onclick="scrollToSection('booking')" class="w-full py-3.5 bg-matcha-100 hover:bg-matcha-200 text-matcha-900 font-extrabold uppercase text-xs tracking-wider rounded-xl transition" data-i18n="btn_choose_pkg">Choose Deep Restore</button>
                </div>
            </div>
        </div>
    </section>

    <!-- 8. ROOM COUNT & PRICE ESTIMATOR CALCULATOR -->
    <section id="calculator" class="py-20 bg-matcha-50 border-t border-matcha-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-xs uppercase tracking-[0.25em] font-extrabold text-matcha-700" data-i18n="calc_sub">Instant Transparency</span>
                <h2 class="font-sora text-3xl sm:text-4xl font-extrabold text-matcha-900 mt-2 mb-4" data-i18n="calc_title">Home Area & Price Estimator</h2>
                <div class="w-16 h-1 bg-matcha-DEFAULT mx-auto rounded-full mb-4"></div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 bg-oat p-6 sm:p-10 rounded-3xl border border-matcha-300 organic-shadow">
                <div class="lg:col-span-7 space-y-6">
                    <div>
                        <div class="flex justify-between text-xs font-bold text-matcha-900 mb-2">
                            <span data-i18n="calc_area_label">Home Area Size (m²)</span>
                            <span id="calcAreaVal" class="text-matcha-DEFAULT font-sora text-sm">75 m²</span>
                        </div>
                        <input type="range" id="calcAreaRange" min="30" max="400" step="5" value="75" class="w-full accent-matcha-900 cursor-pointer">
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-matcha-900 mb-2" data-i18n="calc_bed_label">Bedrooms</label>
                            <div class="flex items-center space-x-2">
                                <button onclick="adjustCalc('bed', -1)" class="w-9 h-9 rounded-lg bg-matcha-100 text-matcha-900 font-bold">-</button>
                                <span id="calcBedVal" class="font-sora font-bold text-base text-matcha-900 w-8 text-center">2</span>
                                <button onclick="adjustCalc('bed', 1)" class="w-9 h-9 rounded-lg bg-matcha-100 text-matcha-900 font-bold">+</button>
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-matcha-900 mb-2" data-i18n="calc_bath_label">Bathrooms</label>
                            <div class="flex items-center space-x-2">
                                <button onclick="adjustCalc('bath', -1)" class="w-9 h-9 rounded-lg bg-matcha-100 text-matcha-900 font-bold">-</button>
                                <span id="calcBathVal" class="font-sora font-bold text-base text-matcha-900 w-8 text-center">1</span>
                                <button onclick="adjustCalc('bath', 1)" class="w-9 h-9 rounded-lg bg-matcha-100 text-matcha-900 font-bold">+</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Price Summary Output Card -->
                <div class="lg:col-span-5 bg-matcha-900 text-oat-50 p-6 sm:p-8 rounded-2xl border border-matcha-700 flex flex-col justify-between">
                    <div>
                        <span class="text-[10px] uppercase font-bold text-matcha-300 block mb-1" data-i18n="calc_est_label">Estimated Total Price</span>
                        <div id="calcTotalPrice" class="font-sora text-3xl font-extrabold text-matcha-300 mb-4">Rp 585.000</div>
                        <div class="border-t border-matcha-800 pt-4 space-y-2 text-xs text-matcha-200">
                            <div class="flex justify-between">
                                <span data-i18n="calc_duration">Est. Duration:</span>
                                <span id="calcTimeVal" class="font-bold text-oat-50">2.5 Hours</span>
                            </div>
                            <div class="flex justify-between">
                                <span data-i18n="calc_team">Crew Size:</span>
                                <span id="calcCrewVal" class="font-bold text-oat-50">2 Botanical Specialists</span>
                            </div>
                        </div>
                    </div>

                    <button onclick="scrollToSection('booking')" class="w-full mt-6 py-3.5 bg-matcha-300 hover:bg-matcha-200 text-matcha-900 font-extrabold uppercase text-xs tracking-wider rounded-xl transition" data-i18n="btn_book_estimate">
                        Proceed to Booking
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- 9. ECO-CONSCIOUS PRODUCTS SHOWCASE -->
    <section id="products" class="py-20 bg-oat">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-xs uppercase tracking-[0.25em] font-extrabold text-matcha-700" data-i18n="prod_sub">Pure Botanical Ingredients</span>
                <h2 class="font-sora text-3xl sm:text-4xl font-extrabold text-matcha-900 mt-2 mb-4" data-i18n="prod_title">Eco-Conscious Cleaning Product Showcase</h2>
                <div class="w-16 h-1 bg-matcha-DEFAULT mx-auto rounded-full mb-4"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-oat-100 p-6 rounded-3xl border border-matcha-300 text-center space-y-4">
                    <div class="w-16 h-16 bg-matcha-200 rounded-full flex items-center justify-center text-matcha-900 text-2xl mx-auto">
                        <i class="fa-solid fa-leaf"></i>
                    </div>
                    <h3 class="font-sora text-lg font-bold text-matcha-900" data-i18n="p1_prod_title">Matcha Leaf Antioxidant Spray</h3>
                    <p class="text-xs text-neutral-600" data-i18n="p1_prod_desc">Natural polyphenols neutralize lingering organic odors without artificial perfumery.</p>
                </div>

                <div class="bg-oat-100 p-6 rounded-3xl border border-matcha-300 text-center space-y-4">
                    <div class="w-16 h-16 bg-matcha-200 rounded-full flex items-center justify-center text-matcha-900 text-2xl mx-auto">
                        <i class="fa-solid fa-droplet"></i>
                    </div>
                    <h3 class="font-sora text-lg font-bold text-matcha-900" data-i18n="p2_prod_title">Thyme & Tea Tree Disinfectant</h3>
                    <p class="text-xs text-neutral-600" data-i18n="p2_prod_desc">Bio-enzymatic anti-bacterial solution safe for infant cribs and high-touch areas.</p>
                </div>

                <div class="bg-oat-100 p-6 rounded-3xl border border-matcha-300 text-center space-y-4">
                    <div class="w-16 h-16 bg-matcha-200 rounded-full flex items-center justify-center text-matcha-900 text-2xl mx-auto">
                        <i class="fa-solid fa-seedling"></i>
                    </div>
                    <h3 class="font-sora text-lg font-bold text-matcha-900" data-i18n="p3_prod_title">Coconut Surfactant Scrub</h3>
                    <p class="text-xs text-neutral-600" data-i18n="p3_prod_desc">Biodegradable foaming agent derived from organic coconut oil for gentle grout polishing.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 10. SURFACE CARE GUIDE -->
    <section id="materials" class="py-20 bg-matcha-50 border-t border-matcha-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-xs uppercase tracking-[0.25em] font-extrabold text-matcha-700" data-i18n="mat_sub">Delicate Material Protection</span>
                <h2 class="font-sora text-3xl sm:text-4xl font-extrabold text-matcha-900 mt-2 mb-4" data-i18n="mat_title">Surface & Material Care Guide</h2>
                <div class="w-16 h-1 bg-matcha-DEFAULT mx-auto rounded-full mb-4"></div>
            </div>

            <div class="bg-oat-100 p-6 sm:p-10 rounded-3xl border border-matcha-300 max-w-4xl mx-auto">
                <div class="flex flex-wrap justify-center gap-2 mb-8">
                    <button onclick="showMatTab('wood', this)" class="mat-tab active bg-matcha-900 text-white px-5 py-2.5 rounded-full text-xs font-bold uppercase transition" data-i18n="tab_wood">Hardwood & Timber</button>
                    <button onclick="showMatTab('stone', this)" class="mat-tab bg-oat text-matcha-900 border border-matcha-300 px-5 py-2.5 rounded-full text-xs font-bold uppercase transition hover:border-matcha-600" data-i18n="tab_stone">Natural Marble & Stone</button>
                    <button onclick="showMatTab('fabric', this)" class="mat-tab bg-oat text-matcha-900 border border-matcha-300 px-5 py-2.5 rounded-full text-xs font-bold uppercase transition hover:border-matcha-600" data-i18n="tab_fabric">Velvet & Leather</button>
                </div>

                <div id="matTabContent" class="text-xs text-neutral-700 space-y-3 bg-oat p-6 rounded-2xl border border-matcha-200">
                    <h4 id="matTabTitle" class="font-sora text-base font-bold text-matcha-900">Hardwood & Timber Care Standards</h4>
                    <p id="matTabDesc">We utilize pH-neutral botanical oils and ultra-low moisture micro-mopping to prevent wood warping while conditioning wood grains.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 11. LIVE PROGRESS TRACKER PREVIEW -->
    <section class="py-20 bg-oat">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-matcha-900 text-oat-50 p-6 sm:p-10 rounded-3xl border border-matcha-700 shadow-2xl max-w-3xl mx-auto">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <span class="text-[10px] font-extrabold text-matcha-300 uppercase tracking-widest block" data-i18n="live_badge">Live Session Simulation</span>
                        <h3 class="font-sora text-xl font-bold" data-i18n="live_title">Clean Home Progress Tracker</h3>
                    </div>
                    <span class="flex items-center text-xs text-matcha-300 font-bold bg-black/40 px-3 py-1 rounded-full border border-matcha-700">
                        <span class="w-2 h-2 rounded-full bg-matcha-300 animate-ping mr-2"></span> <span data-i18n="live_status">In Progress</span>
                    </span>
                </div>

                <div class="space-y-4">
                    <div>
                        <div class="flex justify-between text-xs text-matcha-200 mb-1">
                            <span data-i18n="live_step1">Living Room HEPA Vacuuming</span>
                            <span class="font-bold text-matcha-300">100%</span>
                        </div>
                        <div class="w-full h-2 bg-black/50 rounded-full overflow-hidden">
                            <div class="w-full h-full bg-matcha-300"></div>
                        </div>
                    </div>

                    <div>
                        <div class="flex justify-between text-xs text-matcha-200 mb-1">
                            <span data-i18n="live_step2">Kitchen Degreasing & Marble Seal</span>
                            <span class="font-bold text-matcha-300">85%</span>
                        </div>
                        <div class="w-full h-2 bg-black/50 rounded-full overflow-hidden">
                            <div class="w-[85%] h-full bg-matcha-DEFAULT"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 12. BOOKING FORM -->
    <section id="booking" class="py-20 bg-matcha-50 border-t border-matcha-200">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-oat p-6 sm:p-10 rounded-3xl border border-matcha-300 organic-shadow">
                <div class="text-center mb-8">
                    <span class="text-xs uppercase tracking-[0.25em] font-extrabold text-matcha-700" data-i18n="book_sub">Schedule Your Session</span>
                    <h2 class="font-sora text-3xl font-extrabold text-matcha-900 mt-1" data-i18n="book_title">Book Your Botanical Home Reset</h2>
                </div>

                <form id="bookingForm" onsubmit="handleBooking(event)" class="space-y-6">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-extrabold text-matcha-900 mb-1" data-i18n="form_name">Full Name *</label>
                            <input name="customer_name" type="text" required placeholder="e.g. Maya Lin" class="w-full bg-oat-100 border border-matcha-300 rounded-xl p-3 text-xs focus:outline-none focus:border-matcha-DEFAULT">
                        </div>
                        <div>
                            <label class="block text-xs font-extrabold text-matcha-900 mb-1" data-i18n="form_phone">WhatsApp Phone *</label>
                            <input name="customer_phone" type="tel" required placeholder="+62 812 0000 0000" class="w-full bg-oat-100 border border-matcha-300 rounded-xl p-3 text-xs focus:outline-none focus:border-matcha-DEFAULT">
                        </div>
                        <div>
                            <label class="block text-xs font-extrabold text-matcha-900 mb-1" data-i18n="form_address">Property Area / Postal Code *</label>
                            <input name="property_area" type="text" required placeholder="Jakarta South / Bali Sanur" class="w-full bg-oat-100 border border-matcha-300 rounded-xl p-3 text-xs focus:outline-none focus:border-matcha-DEFAULT">
                        </div>
                        <div>
                            <label class="block text-xs font-extrabold text-matcha-900 mb-1" data-i18n="form_date">Preferred Date *</label>
                            <input name="preferred_date" type="date" required min="{{ date('Y-m-d') }}" class="w-full bg-oat-100 border border-matcha-300 rounded-xl p-3 text-xs focus:outline-none focus:border-matcha-DEFAULT">
                        </div>
                    </div>

                    <button type="submit" class="w-full py-4 bg-matcha-900 hover:bg-matcha-800 text-white font-sora font-extrabold uppercase text-xs tracking-wider rounded-xl shadow-lg transition" data-i18n="form_btn">
                        Confirm Session Inquiry
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- 13. FAQ -->
    <section class="py-20 bg-oat">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <span class="text-xs uppercase tracking-[0.25em] font-extrabold text-matcha-700" data-i18n="faq_sub">Common Inquiries</span>
                <h2 class="font-sora text-3xl font-extrabold text-matcha-900 mt-1" data-i18n="faq_title">Frequently Asked Questions</h2>
            </div>

            <div class="space-y-4">
                <div class="bg-oat-100 p-5 rounded-2xl border border-matcha-300">
                    <h4 class="font-sora text-sm font-bold text-matcha-900 mb-2" data-i18n="q1">Are your cleaning products safe for infants and pets?</h4>
                    <p class="text-xs text-neutral-600" data-i18n="a1">Yes! All solutions are 100% plant-based, bio-enzymatic, and free of harsh synthetic bleaches or toxic artificial fumes.</p>
                </div>
                <div class="bg-oat-100 p-5 rounded-2xl border border-matcha-300">
                    <h4 class="font-sora text-sm font-bold text-matcha-900 mb-2" data-i18n="q2">Do I need to provide cleaning tools or vacuums?</h4>
                    <p class="text-xs text-neutral-600" data-i18n="a2">No. Our crew arrives fully equipped with commercial HEPA vacuums, UV sanitizers, and fresh micro-fiber clothes.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 14. FOOTER (CLEANLY TERMINATED WITH ZERO RAW TEXT BELOW) -->
    <footer class="bg-matcha-900 text-oat-200 py-12 border-t border-matcha-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row justify-between items-center gap-6">
            <div class="text-center md:text-left">
                <span class="font-sora text-xl font-extrabold text-oat-50">MATCHA CLEAN</span>
                <p class="text-xs text-matcha-300 mt-1" data-i18n="footer_rights">&copy; 2026 MATCHA CLEAN Organic Botanical Care. All rights reserved.</p>
            </div>
            <div class="flex space-x-6 text-xs text-matcha-200 font-semibold">
                <a href="#selector" class="hover:text-matcha-300 transition" data-i18n="nav_services">Services</a>
                <a href="#rituals" class="hover:text-matcha-300 transition" data-i18n="nav_packages">Packages</a>
                <a href="#booking" class="hover:text-matcha-300 transition" data-i18n="nav_book_btn">Book Session</a>
            </div>
        </div>
    <div class="max-w-7xl mx-auto px-4 mt-8 pt-5 border-t border-matcha-800 text-center text-[10px] text-matcha-300">Made with care ♡ · Website template by WEBIA</div>
    </footer>

    <!-- 15. FLOATING WHATSAPP & AI CHATBOT -->
    <div class="fixed bottom-6 right-6 z-50 flex items-center space-x-3">
        <!-- MATCHA LEAF CUTE AI CHATBOT -->
        <div class="relative">
            <button id="aiChatBtn" onclick="toggleAiChat()" class="w-14 h-14 rounded-full bg-matcha-DEFAULT text-oat-50 flex items-center justify-center text-xl shadow-2xl border-2 border-matcha-300 animate-matcha-bounce matcha-ripple-effect hover:scale-110 transition duration-300">
                <i class="fa-solid fa-leaf text-matcha-100"></i>
            </button>

            <!-- CHATBOX POPUP -->
            <div id="aiChatBox" class="hidden absolute bottom-20 right-0 w-80 sm:w-96 bg-oat-100 border border-matcha-300 rounded-3xl shadow-2xl overflow-hidden flex flex-col z-50">
                <div class="bg-matcha-900 text-oat-50 p-4 flex items-center justify-between border-b border-matcha-800">
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 rounded-full bg-matcha-DEFAULT flex items-center justify-center text-oat-50 text-xs">
                            <i class="fa-solid fa-seedling"></i>
                        </div>
                        <div>
                            <h4 class="font-sora font-bold text-xs">Matcha Assistant</h4>
                            <span class="text-[9px] text-matcha-300" data-i18n="ai_status">Online | Organic Advice</span>
                        </div>
                    </div>
                    <button onclick="toggleAiChat()" class="text-matcha-300 hover:text-white"><i class="fa-solid fa-xmark"></i></button>
                </div>

                <div id="aiChatMessages" class="p-4 h-60 overflow-y-auto space-y-3 text-xs bg-oat">
                    <div class="flex space-x-2">
                        <div class="w-6 h-6 rounded-full bg-matcha-900 text-matcha-300 text-[10px] flex items-center justify-center flex-shrink-0"><i class="fa-solid fa-leaf"></i></div>
                        <div class="bg-matcha-100 p-3 rounded-2xl text-matcha-900" data-i18n="ai_welcome">
                            Hello! I am your Matcha Assistant. How can I guide your home reset today?
                        </div>
                    </div>
                </div>

                <div class="p-3 bg-oat-100 border-t border-matcha-200 flex items-center space-x-2">
                    <input type="text" id="aiInput" placeholder="Ask Matcha Assistant..." class="flex-1 bg-oat border border-matcha-300 rounded-xl p-2 text-xs focus:outline-none focus:border-matcha-DEFAULT">
                    <button onclick="sendAiMsg()" class="w-8 h-8 rounded-xl bg-matcha-900 text-oat-50 flex items-center justify-center"><i class="fa-solid fa-paper-plane text-xs"></i></button>
                </div>
            </div>
        </div>

        <!-- FLOATING WHATSAPP BUTTON -->
        <a id="waBtn" href="https://wa.me/6281234567890?text=Hello%20MATCHA%20CLEAN%20Concierge,%20I%20would%20like%20to%20inquire%20about%20a%20botanical%20home%20cleaning%20session." target="_blank" rel="noopener noreferrer" class="w-14 h-14 rounded-full bg-emerald-600 text-white flex items-center justify-center text-2xl shadow-2xl hover:scale-110 transition duration-300 border-2 border-white">
            <i class="fa-brands fa-whatsapp"></i>
        </a>
    </div>

    <!-- JAVASCRIPT LOGIC & FALLING LEAVES ENGINE -->
    

<script src="{{ asset('js/website-bisnis/templates/home-services/home-cleaning-deep-cleaning/matcha-clean/matcha-clean.js') }}"></script>
</body>
</html>
