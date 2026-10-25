<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="theme-color" content="#9E0031"><meta name="description" content="Rustic Strawberry Fizz Pilates Studio — premium Gen-Z Pilates, Reformer, membership, jadwal kelas, dan reservasi melalui WhatsApp.">
<title>Rustic Strawberry Fizz — Premium Gen-Z Pilates Studio</title>
<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script><script>tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        berry: {
                            50: '#FFF0F3',
                            100: '#FFE4E1',
                            200: '#FFB7C5',
                            400: '#F472B6',
                            500: '#E63956',
                            600: '#D81B60',
                            800: '#9E0031',
                            900: '#5C001C',
                        },
                        milky: '#FFF9FA',
                        cream: '#FAF0E6',
                    },
                    fontFamily: {
                        serif: ['"Playfair Display"', 'serif'],
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                    },
                    boxShadow: {
                        'glow': '0 10px 30px -10px rgba(230, 57, 86, 0.35)',
                        'glow-lg': '0 20px 40px -15px rgba(216, 27, 96, 0.45)',
                        'soft': '0 15px 35px rgba(158, 0, 49, 0.05)',
                    }
                }
            }
        }</script>
<link rel="stylesheet" href="{{ asset('css/website-bisnis/templates/sports-fitness/pilates-studio/strawberry-fizz/strawberry-fizz.css') }}">
</head>
<body class="relative min-h-screen selection:bg-berry-200 selection:text-berry-900">

<div class="fixed top-0 left-0 w-full z-50" id="progress-container">
<div class="h-1 bg-gradient-to-r from-berry-400 via-berry-500 to-berry-800 w-0 transition-all duration-150" id="progress-bar"></div>
<div class="bg-gradient-to-r from-berry-800 via-berry-600 to-berry-800 text-white text-xs py-2 overflow-hidden font-medium border-b border-berry-400/20">
<div class="animate-marquee whitespace-nowrap flex items-center gap-8">
<span>✨ SPECIAL FIRST TIMER PROMO: Free Intro Reformer Trial + Matcha Latte at Studio! ✨</span>
<span>🍓 JOIN THE GLOW CLUB: 15% OFF VIP Membership Pass this Month 🍓</span>
<span>✨ INSTAGRAMMABLE PILATES &amp; REFORMER STUDIO IN TOWN ✨</span>
<span>🍓 SPECIAL FIRST TIMER PROMO: Free Intro Reformer Trial + Matcha Latte at Studio! ✨</span>
<span>🍓 JOIN THE GLOW CLUB: 15% OFF VIP Membership Pass this Month 🍓</span>
<span>✨ INSTAGRAMMABLE PILATES &amp; REFORMER STUDIO IN TOWN ✨</span>
</div>
</div>
</div>
<nav class="sticky top-7 z-40 px-4 md:px-8 mt-9 mb-4">
<div class="max-w-7xl mx-auto glass-card rounded-full px-5 py-3 shadow-soft flex items-center justify-between transition-all duration-300">
<!-- Brand Logo -->
<a class="flex items-center gap-2 group" href="#">
<div class="w-10 h-10 rounded-full bg-gradient-to-tr from-berry-500 to-berry-200 flex items-center justify-center text-white text-xl shadow-md group-hover:scale-105 transition-transform">
                    🍓
                </div>
<div class="flex flex-col">
<span class="font-serif-title font-bold text-lg md:text-xl text-berry-900 leading-tight">Rustic Strawberry</span>
<span class="text-[10px] tracking-widest text-berry-600 uppercase font-semibold">Fizz Pilates Studio</span>
</div>
</a>
<!-- Desktop Nav Links -->
<div class="hidden lg:flex items-center gap-7 text-sm font-semibold text-berry-900/80">
<a class="hover:text-berry-600 transition-colors" href="#classes">Classes</a>
<a class="hover:text-berry-600 transition-colors" href="#experience">Level &amp; Type</a>
<a class="hover:text-berry-600 transition-colors" href="#packages">Packages</a>
<a class="hover:text-berry-600 transition-colors" href="#instructors">Instructors</a>
<a class="hover:text-berry-600 transition-colors" href="#facilities">Facilities</a>
<a class="hover:text-berry-600 transition-colors" href="#schedule">Schedule</a>
<a class="hover:text-berry-600 transition-colors" href="#location">Studio</a>
<a class="hover:text-berry-600 transition-colors" href="#faq">FAQ</a>
</div>
<!-- Action CTA & Mobile Menu Toggle -->
<div class="flex items-center gap-3">
<button class="hidden sm:flex items-center gap-2 bg-gradient-to-r from-berry-500 to-berry-600 hover:from-berry-600 hover:to-berry-800 text-white font-bold text-xs md:text-sm px-5 py-2.5 rounded-full shadow-glow hover:shadow-glow-lg transition-all duration-300 transform hover:-translate-y-0.5" onclick="openBookingModal('General')">
<i class="w-4 h-4" data-lucide="sparkles"></i>
<span>Book Class</span>
</button>
<button class="lg:hidden p-2 rounded-full text-berry-900 hover:bg-berry-100/50" id="mobile-menu-btn" onclick="toggleMobileMenu()">
<i class="w-6 h-6" data-lucide="menu"></i>
</button>
</div>
</div>
<!-- Mobile Drawer Menu -->
<div class="hidden lg:hidden max-w-7xl mx-auto mt-2 glass-card rounded-2xl p-6 shadow-xl flex-col gap-4 border border-berry-200" id="mobile-menu">
<a class="text-berry-900 font-semibold py-2 border-b border-berry-100" href="#classes" onclick="toggleMobileMenu()">Classes Catalog</a>
<a class="text-berry-900 font-semibold py-2 border-b border-berry-100" href="#experience" onclick="toggleMobileMenu()">Beginner &amp; Private VIP</a>
<a class="text-berry-900 font-semibold py-2 border-b border-berry-100" href="#packages" onclick="toggleMobileMenu()">Membership &amp; Passes</a>
<a class="text-berry-900 font-semibold py-2 border-b border-berry-100" href="#instructors" onclick="toggleMobileMenu()">Our Instructors</a>
<a class="text-berry-900 font-semibold py-2 border-b border-berry-100" href="#facilities" onclick="toggleMobileMenu()">Studio Facilities</a>
<a class="text-berry-900 font-semibold py-2 border-b border-berry-100" href="#schedule" onclick="toggleMobileMenu()">Live Schedule</a>
<a class="text-berry-900 font-semibold py-2 border-b border-berry-100" href="#location" onclick="toggleMobileMenu()">Studio Location</a>
<a class="text-berry-900 font-semibold py-2 border-b border-berry-100" href="#faq" onclick="toggleMobileMenu()">FAQ</a>
<button class="mt-2 w-full bg-berry-500 text-white font-bold text-sm py-3 rounded-xl shadow-glow" onclick="toggleMobileMenu(); openBookingModal('General');">
                Book Slot Now 💕
            </button>
</div>
</nav>
<section class="relative pt-6 pb-16 md:py-20 px-4 md:px-8 max-w-7xl mx-auto overflow-hidden">
<!-- Aesthetic Decorative Blobs -->
<div class="absolute -top-10 -left-10 w-72 h-72 bg-berry-200/50 rounded-full blur-3xl -z-10 animate-float"></div>
<div class="absolute top-1/2 -right-10 w-96 h-96 bg-pink-300/30 rounded-full blur-3xl -z-10"></div>
<div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
<!-- Left Text Content -->
<div class="lg:col-span-7 flex flex-col items-start gap-6">
<div class="inline-flex items-center gap-2 bg-berry-100 border border-berry-200 px-4 py-2 rounded-full text-berry-800 text-xs md:text-sm font-semibold shadow-sm">
<span class="inline-block w-2 h-2 rounded-full bg-berry-500 animate-ping"></span>
<span>The #1 Gen-Z Aesthetics Pilates Studio</span>
<span class="text-base">🍓</span>
</div>
<h1 class="font-serif-title text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-bold text-berry-900 leading-[1.15]">
                    Flow, Glow &amp; <br/>
<span class="italic font-normal text-transparent bg-clip-text bg-gradient-to-r from-berry-500 via-berry-600 to-berry-800">Elevate Your Vibe</span> ✨
                </h1>
<p class="text-base md:text-lg text-berry-900/75 max-w-xl font-normal leading-relaxed">
                    Nikmati pengalaman Pilates tercantik &amp; terseru untuk membentuk posture sempurna, tone core muscle, dan boost serotonin level-mu. Safe space untuk cewek-cewek aesthetic &amp; modern glow girls!
                </p>
<!-- CTAs -->
<div class="flex flex-wrap items-center gap-4 pt-2 w-full sm:w-auto">
<button class="w-full sm:w-auto bg-gradient-to-r from-berry-500 to-berry-600 hover:from-berry-600 hover:to-berry-800 text-white font-bold px-8 py-4 rounded-full shadow-glow hover:shadow-glow-lg transition-all transform hover:-translate-y-1 flex items-center justify-center gap-3" onclick="openBookingModal('Trial Session')">
<span>Book First Trial 🍓</span>
<i class="w-5 h-5" data-lucide="arrow-right"></i>
</button>
<a class="w-full sm:w-auto text-center glass-card hover:bg-white text-berry-900 font-bold px-8 py-4 rounded-full border border-berry-200 transition-all flex items-center justify-center gap-2" href="#classes">
<i class="w-5 h-5 text-berry-500" data-lucide="play-circle"></i>
<span>Explore Classes</span>
</a>
</div>
<!-- Stats Highlights -->
<div class="pt-6 border-t border-berry-200/60 w-full grid grid-cols-3 gap-4 text-center sm:text-left">
<div>
<p class="font-serif-title text-2xl md:text-3xl font-bold text-berry-900">10k+</p>
<p class="text-xs text-berry-900/60 font-medium">Happy Glow Girls</p>
</div>
<div>
<p class="font-serif-title text-2xl md:text-3xl font-bold text-berry-900">100%</p>
<p class="text-xs text-berry-900/60 font-medium">Pure Reformer Energy</p>
</div>
<div>
<p class="font-serif-title text-2xl md:text-3xl font-bold text-berry-900">4.9 ★</p>
<p class="text-xs text-berry-900/60 font-medium">Aesthetic Ratings</p>
</div>
</div>
</div>
<!-- Right Hero Visual Grid -->
<div class="lg:col-span-5 relative">
<div class="relative mx-auto max-w-md lg:max-w-none">
<!-- Main Image Frame -->
<div class="relative rounded-3xl overflow-hidden border-4 border-white shadow-2xl bg-berry-100 group">
<img alt="Pilates Reformer Woman" class="w-full h-[450px] md:h-[520px] object-cover group-hover:scale-105 transition-transform duration-700" src="https://images.unsplash.com/photo-1518611012118-696072aa579a?auto=format&amp;fit=crop&amp;w=1000&amp;q=80"/>
<div class="absolute inset-0 bg-gradient-to-t from-berry-900/50 via-transparent to-transparent"></div>
<div class="absolute bottom-6 left-6 right-6 text-white glass-dark p-4 rounded-2xl">
<p class="text-xs text-berry-200 font-semibold tracking-wide uppercase">Featured Today</p>
<p class="font-serif-title text-lg font-bold">Strawberry Sculpt &amp; Reformer</p>
<p class="text-xs opacity-80 mt-1">Full body tone • High energy low impact</p>
</div>
</div>
<!-- Floating Badge Card 1 -->
<div class="absolute -top-6 -right-4 glass-card p-3 rounded-2xl shadow-xl flex items-center gap-3 animate-float border border-berry-200">
<div class="w-10 h-10 rounded-full bg-berry-500 flex items-center justify-center text-white font-bold text-lg">
                            🥤
                        </div>
<div>
<p class="text-xs font-bold text-berry-900">Free Matcha Bar</p>
<p class="text-[10px] text-berry-600">Post-workout treat!</p>
</div>
</div>
<!-- Floating Badge Card 2 -->
<div class="absolute -bottom-6 -left-4 glass-card p-3 rounded-2xl shadow-xl flex items-center gap-3 border border-berry-200">
<div class="flex -space-x-2">
<img alt="User" class="w-8 h-8 rounded-full border-2 border-white object-cover" src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&amp;fit=crop&amp;w=100&amp;q=80"/>
<img alt="User" class="w-8 h-8 rounded-full border-2 border-white object-cover" src="https://images.unsplash.com/photo-1517841905240-472988babdf9?auto=format&amp;fit=crop&amp;w=100&amp;q=80"/>
<img alt="User" class="w-8 h-8 rounded-full border-2 border-white object-cover" src="https://images.unsplash.com/photo-1524504388940-b1c1722653e1?auto=format&amp;fit=crop&amp;w=100&amp;q=80"/>
</div>
<p class="text-xs font-bold text-berry-900">32+ Besties booked today 💕</p>
</div>
</div>
</div>
</div>
</section>
 SECTION 4: PILATES CLASS CATALOG WITH MODAL/DRAWER 
<section class="py-20 px-4 md:px-8 max-w-7xl mx-auto" id="classes">
<div class="text-center max-w-2xl mx-auto mb-12">
<span class="text-berry-600 font-bold text-xs uppercase tracking-widest bg-berry-100 px-3 py-1 rounded-full">Designed for Girls</span>
<h2 class="font-serif-title text-3xl md:text-5xl font-bold text-berry-900 mt-3">Pilates Class Catalog ✨</h2>
<p class="text-berry-900/70 text-sm md:text-base mt-3">Pilih signature workout yang pas dengan mood, fitness level, dan goal kamu hari ini.</p>
<!-- Category Tabs Filter -->
<div class="flex flex-wrap items-center justify-center gap-2 mt-8">
<button class="class-tab-btn active bg-berry-500 text-white font-semibold text-xs md:text-sm px-5 py-2.5 rounded-full transition-all" onclick="filterClasses('all', this)">All Signature</button>
<button class="class-tab-btn glass-card text-berry-900 hover:bg-berry-100 font-semibold text-xs md:text-sm px-5 py-2.5 rounded-full transition-all" onclick="filterClasses('reformer', this)">🍓 Reformer</button>
<button class="class-tab-btn glass-card text-berry-900 hover:bg-berry-100 font-semibold text-xs md:text-sm px-5 py-2.5 rounded-full transition-all" onclick="filterClasses('mat', this)">🧘‍♀️ Mat &amp; Sculpt</button>
<button class="class-tab-btn glass-card text-berry-900 hover:bg-berry-100 font-semibold text-xs md:text-sm px-5 py-2.5 rounded-full transition-all" onclick="filterClasses('chair', this)">👑 Cadillac &amp; Chair</button>
<button class="class-tab-btn glass-card text-berry-900 hover:bg-berry-100 filter-btn font-semibold text-xs md:text-sm px-5 py-2.5 rounded-full transition-all" onclick="filterClasses('hot', this)">🔥 Hot Infrared</button>
</div>
</div>
<!-- Class Cards Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="class-cards-container">
<!-- Card 1 -->
<div class="class-card class-reformer glass-card rounded-3xl overflow-hidden shadow-soft hover:shadow-glow transition-all duration-300 flex flex-col group border border-berry-200/60">
<div class="relative h-56 overflow-hidden">
<img alt="Reformer" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="https://images.unsplash.com/photo-1518611012118-696072aa579a?auto=format&amp;fit=crop&amp;w=600&amp;q=80"/>
<span class="absolute top-4 left-4 bg-berry-500 text-white text-[11px] font-bold px-3 py-1 rounded-full shadow">🍓 Signature Reformer</span>
<span class="absolute top-4 right-4 bg-white/90 backdrop-blur-md text-berry-900 text-xs font-bold px-2.5 py-1 rounded-full flex items-center gap-1">
<i class="w-3.5 h-3.5 text-berry-500" data-lucide="clock"></i> 50 Mins
                    </span>
</div>
<div class="p-6 flex-1 flex flex-col justify-between">
<div>
<div class="flex items-center justify-between text-xs text-berry-600 font-semibold mb-2">
<span>Intensity: 🔥🔥🔥 (Medium)</span>
<span>Calories: ~380 kcal</span>
</div>
<h3 class="font-serif-title text-xl font-bold text-berry-900">Strawberry Reformer Flow</h3>
<p class="text-xs text-berry-900/70 mt-2 line-clamp-2">Dynamic reformer carriage flow untuk membentuk lean muscles, memperbaiki postur, dan memperkuat core stability.</p>
</div>
<div class="mt-6 flex items-center justify-between gap-3 pt-4 border-t border-berry-100">
<button class="text-xs font-bold text-berry-600 hover:text-berry-900 flex items-center gap-1" onclick="openClassDetail('Strawberry Reformer Flow', 'Reformer', '50 Mins', 'Medium 🔥🔥🔥', 'Lean muscles, Core, Glutes', '380 kcal', 'Aesthetic Grip Socks + Fitted Activewear', 'Kelas reformer signature untuk membentuk seluruh tubuh secara holistik dengan gerakan fluid yang ramah sendi.')">
<span>View Details</span>
<i class="w-3.5 h-3.5" data-lucide="arrow-up-right"></i>
</button>
<button class="bg-berry-500 hover:bg-berry-600 text-white text-xs font-bold px-4 py-2 rounded-full shadow" onclick="openBookingModal('Strawberry Reformer Flow')">Book Slot</button>
</div>
</div>
</div>
<!-- Card 2 -->
<div class="class-card class-mat glass-card rounded-3xl overflow-hidden shadow-soft hover:shadow-glow transition-all duration-300 flex flex-col group border border-berry-200/60">
<div class="relative h-56 overflow-hidden">
<img alt="Mat Sculpt" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="https://images.unsplash.com/photo-1506126613408-eca07ce68773?auto=format&amp;fit=crop&amp;w=600&amp;q=80"/>
<span class="absolute top-4 left-4 bg-berry-600 text-white text-[11px] font-bold px-3 py-1 rounded-full shadow">🧘‍♀️ Mat &amp; Ankle Weights</span>
<span class="absolute top-4 right-4 bg-white/90 backdrop-blur-md text-berry-900 text-xs font-bold px-2.5 py-1 rounded-full flex items-center gap-1">
<i class="w-3.5 h-3.5 text-berry-500" data-lucide="clock"></i> 45 Mins
                    </span>
</div>
<div class="p-6 flex-1 flex flex-col justify-between">
<div>
<div class="flex items-center justify-between text-xs text-berry-600 font-semibold mb-2">
<span>Intensity: 🔥🔥 (Beginner Friendly)</span>
<span>Calories: ~290 kcal</span>
</div>
<h3 class="font-serif-title text-xl font-bold text-berry-900">Berry Barre &amp; Sculpt</h3>
<p class="text-xs text-berry-900/70 mt-2 line-clamp-2">Perpaduan ballet barre, mat pilates, dan ankle weight resistance dengan musik playlist TikTok upbeat ter-hits!</p>
</div>
<div class="mt-6 flex items-center justify-between gap-3 pt-4 border-t border-berry-100">
<button class="text-xs font-bold text-berry-600 hover:text-berry-900 flex items-center gap-1" onclick="openClassDetail('Berry Barre &amp; Sculpt', 'Mat &amp; Sculpt', '45 Mins', 'Beginner Friendly 🔥🔥', 'Glutes, Arms, Thighs, Abs', '290 kcal', 'Comfortable Mat Clothing + Ankle Weights Provided', 'Kombinasi menyenangkan yang fokus pada endurance otot kecil, glute burn, dan kelenturan tubuh.')">
<span>View Details</span>
<i class="w-3.5 h-3.5" data-lucide="arrow-up-right"></i>
</button>
<button class="bg-berry-500 hover:bg-berry-600 text-white text-xs font-bold px-4 py-2 rounded-full shadow" onclick="openBookingModal('Berry Barre &amp; Sculpt')">Book Slot</button>
</div>
</div>
</div>
<!-- Card 3 -->
<div class="class-card class-hot glass-card rounded-3xl overflow-hidden shadow-soft hover:shadow-glow transition-all duration-300 flex flex-col group border border-berry-200/60">
<div class="relative h-56 overflow-hidden">
<img alt="Hot Infrared Pilates" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="https://images.unsplash.com/photo-1599447421416-3414500d18a5?auto=format&amp;fit=crop&amp;w=600&amp;q=80"/>
<span class="absolute top-4 left-4 bg-berry-800 text-white text-[11px] font-bold px-3 py-1 rounded-full shadow">🔥 Hot Infrared Detox</span>
<span class="absolute top-4 right-4 bg-white/90 backdrop-blur-md text-berry-900 text-xs font-bold px-2.5 py-1 rounded-full flex items-center gap-1">
<i class="w-3.5 h-3.5 text-berry-500" data-lucide="clock"></i> 50 Mins
                    </span>
</div>
<div class="p-6 flex-1 flex flex-col justify-between">
<div>
<div class="flex items-center justify-between text-xs text-berry-600 font-semibold mb-2">
<span>Intensity: 🔥🔥🔥🔥 (High Burn)</span>
<span>Calories: ~480 kcal</span>
</div>
<h3 class="font-serif-title text-xl font-bold text-berry-900">Infrared Strawberry Burn</h3>
<p class="text-xs text-berry-900/70 mt-2 line-clamp-2">Latihan Pilates dalam ruangan infrared 32°C. Membantu keringat detox, bakar lemak maksimal, &amp; kulit glowing alami.</p>
</div>
<div class="mt-6 flex items-center justify-between gap-3 pt-4 border-t border-berry-100">
<button class="text-xs font-bold text-berry-600 hover:text-berry-900 flex items-center gap-1" onclick="openClassDetail('Infrared Strawberry Burn', 'Hot Infrared', '50 Mins', 'High Burn 🔥🔥🔥🔥', 'Full Body Fat Loss, Lymphatic Drainage', '480 kcal', 'Breathable Sports Wear + Sweat Towel &amp; Water Bottle', 'Sinar infrared menembus ke dalam lapisan otot untuk merelaksasi ketegangan sekaligus memicu pembakaran kalori ekstra.')">
<span>View Details</span>
<i class="w-3.5 h-3.5" data-lucide="arrow-up-right"></i>
</button>
<button class="bg-berry-500 hover:bg-berry-600 text-white text-xs font-bold px-4 py-2 rounded-full shadow" onclick="openBookingModal('Infrared Strawberry Burn')">Book Slot</button>
</div>
</div>
</div>
<!-- Card 4 -->
<div class="class-card class-chair glass-card rounded-3xl overflow-hidden shadow-soft hover:shadow-glow transition-all duration-300 flex flex-col group border border-berry-200/60">
<div class="relative h-56 overflow-hidden">
<img alt="Cadillac Chair" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="https://images.unsplash.com/photo-1575052814086-f385e2e2ad1b?auto=format&amp;fit=crop&amp;w=600&amp;q=80"/>
<span class="absolute top-4 left-4 bg-berry-500 text-white text-[11px] font-bold px-3 py-1 rounded-full shadow">👑 Cadillac &amp; Wunda Chair</span>
<span class="absolute top-4 right-4 bg-white/90 backdrop-blur-md text-berry-900 text-xs font-bold px-2.5 py-1 rounded-full flex items-center gap-1">
<i class="w-3.5 h-3.5 text-berry-500" data-lucide="clock"></i> 55 Mins
                    </span>
</div>
<div class="p-6 flex-1 flex flex-col justify-between">
<div>
<div class="flex items-center justify-between text-xs text-berry-600 font-semibold mb-2">
<span>Intensity: 🔥🔥🔥 (Intermediate)</span>
<span>Calories: ~350 kcal</span>
</div>
<h3 class="font-serif-title text-xl font-bold text-berry-900">Cadillac Queen Alignment</h3>
<p class="text-xs text-berry-900/70 mt-2 line-clamp-2">Menggunakan apparatus Cadillac Trapeze &amp; Wunda Chair untuk precision alignment, koreksi spinal curve, &amp; core strength.</p>
</div>
<div class="mt-6 flex items-center justify-between gap-3 pt-4 border-t border-berry-100">
<button class="text-xs font-bold text-berry-600 hover:text-berry-900 flex items-center gap-1" onclick="openClassDetail('Cadillac Queen Alignment', 'Cadillac &amp; Chair', '55 Mins', 'Intermediate 🔥🔥🔥', 'Spine Alignment, Upper Body, Deep Core', '350 kcal', 'Grip Socks &amp; Form-fitting Top', 'Sangat direkomendasikan untuk kamu yang sering pegal karena kerja kantoran (office syndrome) dan ingin memperbaiki postur.')">
<span>View Details</span>
<i class="w-3.5 h-3.5" data-lucide="arrow-up-right"></i>
</button>
<button class="bg-berry-500 hover:bg-berry-600 text-white text-xs font-bold px-4 py-2 rounded-full shadow" onclick="openBookingModal('Cadillac Queen Alignment')">Book Slot</button>
</div>
</div>
</div>
<!-- Card 5 -->
<div class="class-card class-mat glass-card rounded-3xl overflow-hidden shadow-soft hover:shadow-glow transition-all duration-300 flex flex-col group border border-berry-200/60">
<div class="relative h-56 overflow-hidden">
<img alt="Prenatal Gentle" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="https://images.unsplash.com/photo-1518310383802-640c2de311b2?auto=format&amp;fit=crop&amp;w=600&amp;q=80"/>
<span class="absolute top-4 left-4 bg-pink-500 text-white text-[11px] font-bold px-3 py-1 rounded-full shadow">🌸 Mama-To-Be</span>
<span class="absolute top-4 right-4 bg-white/90 backdrop-blur-md text-berry-900 text-xs font-bold px-2.5 py-1 rounded-full flex items-center gap-1">
<i class="w-3.5 h-3.5 text-berry-500" data-lucide="clock"></i> 45 Mins
                    </span>
</div>
<div class="p-6 flex-1 flex flex-col justify-between">
<div>
<div class="flex items-center justify-between text-xs text-berry-600 font-semibold mb-2">
<span>Intensity: 🔥 (Gentle &amp; Safe)</span>
<span>Calories: ~200 kcal</span>
</div>
<h3 class="font-serif-title text-xl font-bold text-berry-900">Prenatal Glow &amp; Care</h3>
<p class="text-xs text-berry-900/70 mt-2 line-clamp-2">Gerakan lembut khusus ibu hamil untuk mengurangi nyeri punggung bawah, menjaga kesegaran, dan persiapan persalinan.</p>
</div>
<div class="mt-6 flex items-center justify-between gap-3 pt-4 border-t border-berry-100">
<button class="text-xs font-bold text-berry-600 hover:text-berry-900 flex items-center gap-1" onclick="openClassDetail('Prenatal Glow &amp; Care', 'Prenatal Care', '45 Mins', 'Gentle 🔥', 'Pelvic Floor, Lower Back Relief, Breathwork', '200 kcal', 'Loose Stretchable Clothes + Comfort Grip Socks', 'Didampingi oleh instruktur tersertifikasi khusus Prenatal Pilates untuk menjamin keamanan calon ibu dan janin.')">
<span>View Details</span>
<i class="w-3.5 h-3.5" data-lucide="arrow-up-right"></i>
</button>
<button class="bg-berry-500 hover:bg-berry-600 text-white text-xs font-bold px-4 py-2 rounded-full shadow" onclick="openBookingModal('Prenatal Glow &amp; Care')">Book Slot</button>
</div>
</div>
</div>
<!-- Card 6 -->
<div class="class-card class-reformer glass-card rounded-3xl overflow-hidden shadow-soft hover:shadow-glow transition-all duration-300 flex flex-col group border border-berry-200/60">
<div class="relative h-56 overflow-hidden">
<img alt="Jumpboard Reformer" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="https://images.unsplash.com/photo-1540497077202-7c8a3999166f?auto=format&amp;fit=crop&amp;w=600&amp;q=80"/>
<span class="absolute top-4 left-4 bg-berry-600 text-white text-[11px] font-bold px-3 py-1 rounded-full shadow">🍓 Jumpboard Cardio</span>
<span class="absolute top-4 right-4 bg-white/90 backdrop-blur-md text-berry-900 text-xs font-bold px-2.5 py-1 rounded-full flex items-center gap-1">
<i class="w-3.5 h-3.5 text-berry-500" data-lucide="clock"></i> 50 Mins
                    </span>
</div>
<div class="p-6 flex-1 flex flex-col justify-between">
<div>
<div class="flex items-center justify-between text-xs text-berry-600 font-semibold mb-2">
<span>Intensity: 🔥🔥🔥🔥 (High Energy)</span>
<span>Calories: ~420 kcal</span>
</div>
<h3 class="font-serif-title text-xl font-bold text-berry-900">Reformer Jumpboard Party</h3>
<p class="text-xs text-berry-900/70 mt-2 line-clamp-2">Kombinasi cardio jumpboard pada reformer yang zero-impact pada sendi tapi membakar lemak tinggi dengan ritme lagu pop trendy!</p>
</div>
<div class="mt-6 flex items-center justify-between gap-3 pt-4 border-t border-berry-100">
<button class="text-xs font-bold text-berry-600 hover:text-berry-900 flex items-center gap-1" onclick="openClassDetail('Reformer Jumpboard Party', 'Reformer', '50 Mins', 'High Energy 🔥🔥🔥🔥', 'Legs, Cardio Stamina, Core', '420 kcal', 'Cute Sports Bra/Top + Aesthetic Grip Socks', 'Rasakan sensasi melompat melayang di udara tanpa membebani lutut. Fun, energetic, and super sweaty!')">
<span>View Details</span>
<i class="w-3.5 h-3.5" data-lucide="arrow-up-right"></i>
</button>
<button class="bg-berry-500 hover:bg-berry-600 text-white text-xs font-bold px-4 py-2 rounded-full shadow" onclick="openBookingModal('Reformer Jumpboard Party')">Book Slot</button>
</div>
</div>
</div>
</div>
</section>
 SECTION 6: BEGINNER VS ADVANCED & PRIVATE VS GROUP OPTIONS 
<section class="py-16 px-4 md:px-8 max-w-7xl mx-auto" id="experience">
<div class="bg-gradient-to-br from-berry-100 via-milky to-pink-100 rounded-3xl p-6 md:p-12 border border-berry-200/60 shadow-soft">
<div class="text-center max-w-2xl mx-auto mb-10">
<span class="text-berry-600 font-bold text-xs uppercase tracking-widest bg-white/80 px-3 py-1 rounded-full shadow-sm">Tailored Experience</span>
<h2 class="font-serif-title text-3xl md:text-4xl font-bold text-berry-900 mt-2">Pilih Level &amp; Mode Session-mu 💕</h2>
<p class="text-berry-900/75 text-sm mt-2">Baru pertama kali Pilates atau mau VIP 1-on-1 private coaching? Kami sediakan experience terbaik untukmu!</p>
</div>
<!-- Grid 2x2: Level & Mode Options -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
<!-- Card 1: First Timer / Beginner -->
<div class="bg-white/90 p-6 rounded-2xl border border-berry-200 hover:border-berry-500 transition-all hover:-translate-y-1 shadow-sm">
<div class="w-12 h-12 rounded-2xl bg-berry-100 text-berry-600 flex items-center justify-center text-2xl font-bold mb-4">
                        🌱
                    </div>
<span class="text-[10px] font-extrabold uppercase tracking-wider text-berry-500 bg-berry-50 px-2.5 py-1 rounded-md">First Timers</span>
<h3 class="font-serif-title text-xl font-bold text-berry-900 mt-2">Beginner Flow</h3>
<p class="text-xs text-berry-900/70 mt-2 leading-relaxed">Pengenalan reformer springs, postur dasar, breathwork, &amp; latihan ramah sendi tanpa perlu takut merasa ketinggalan.</p>
</div>
<!-- Card 2: Advanced Pro -->
<div class="bg-white/90 p-6 rounded-2xl border border-berry-200 hover:border-berry-500 transition-all hover:-translate-y-1 shadow-sm">
<div class="w-12 h-12 rounded-2xl bg-berry-100 text-berry-600 flex items-center justify-center text-2xl font-bold mb-4">
                        ⚡
                    </div>
<span class="text-[10px] font-extrabold uppercase tracking-wider text-berry-500 bg-berry-50 px-2.5 py-1 rounded-md">Pro &amp; Intermediate</span>
<h3 class="font-serif-title text-xl font-bold text-berry-900 mt-2">Advanced Sculpt</h3>
<p class="text-xs text-berry-900/70 mt-2 leading-relaxed">Gerakan kompleks, tempo lebih cepat, tantangan balance tinggi untuk memahat otot lebih kencang &amp; terdefinisi.</p>
</div>
<!-- Card 3: Small Group Session -->
<div class="bg-white/90 p-6 rounded-2xl border border-berry-200 hover:border-berry-500 transition-all hover:-translate-y-1 shadow-sm">
<div class="w-12 h-12 rounded-2xl bg-berry-100 text-berry-600 flex items-center justify-center text-2xl font-bold mb-4">
                        👯‍♀️
                    </div>
<span class="text-[10px] font-extrabold uppercase tracking-wider text-berry-500 bg-berry-50 px-2.5 py-1 rounded-md">Small Group (Max 6)</span>
<h3 class="font-serif-title text-xl font-bold text-berry-900 mt-2">Girl Squad Class</h3>
<p class="text-xs text-berry-900/70 mt-2 leading-relaxed">Suasana intimate &amp; fun bersama 5 cewek lainnya! Instruktur tetap bisa memperhatikan form dan gerakanmu secara teliti.</p>
</div>
<!-- Card 4: 1-on-1 Private VIP -->
<div class="bg-white/90 p-6 rounded-2xl border border-berry-200 hover:border-berry-500 transition-all hover:-translate-y-1 shadow-sm">
<div class="w-12 h-12 rounded-2xl bg-berry-100 text-berry-600 flex items-center justify-center text-2xl font-bold mb-4">
                        👑
                    </div>
<span class="text-[10px] font-extrabold uppercase tracking-wider text-berry-800 bg-berry-200 px-2.5 py-1 rounded-md">Exclusive VIP</span>
<h3 class="font-serif-title text-xl font-bold text-berry-900 mt-2">1-on-1 Private Studio</h3>
<p class="text-xs text-berry-900/70 mt-2 leading-relaxed">Personalized program khusus kondisi fisikmu (skoliosis, post-natal, injury rehab) di private suite mewah kami.</p>
</div>
</div>
</div>
</section>
 SECTION 7: MEMBERSHIP & CLASS PACKAGES PRICING 
<section class="py-20 px-4 md:px-8 max-w-7xl mx-auto" id="packages">
<div class="text-center max-w-2xl mx-auto mb-10">
<span class="text-berry-600 font-bold text-xs uppercase tracking-widest bg-berry-100 px-3 py-1 rounded-full">Transparent Pricing</span>
<h2 class="font-serif-title text-3xl md:text-5xl font-bold text-berry-900 mt-3">Membership &amp; Class Passes 🎟️</h2>
<p class="text-berry-900/70 text-sm md:text-base mt-2">Pilih paket sesuai komitmen fitness kamu. Tanpa hidden fees!</p>
<!-- Switcher Toggle -->
<div class="mt-8 inline-flex items-center bg-berry-100 p-1.5 rounded-full border border-berry-200 shadow-inner">
<button class="px-6 py-2.5 rounded-full text-xs md:text-sm font-bold transition-all bg-berry-500 text-white shadow" id="toggle-passes-btn" onclick="switchPricing('passes')">Class Passes</button>
<button class="px-6 py-2.5 rounded-full text-xs md:text-sm font-bold text-berry-900 hover:text-berry-600 transition-all" id="toggle-membership-btn" onclick="switchPricing('membership')">Monthly Unlimited</button>
</div>
</div>
<!-- Class Passes View -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-8" id="passes-pricing-grid">
<!-- Single Trial Slot -->
<div class="glass-card rounded-3xl p-8 border border-berry-200 shadow-soft hover:shadow-glow transition-all flex flex-col justify-between">
<div>
<span class="text-xs font-bold text-berry-600 bg-berry-100 px-3 py-1 rounded-full">First Timer Only</span>
<h3 class="font-serif-title text-2xl font-bold text-berry-900 mt-4">First Glow Trial</h3>
<p class="text-xs text-berry-900/70 mt-1">Satu kali sesi percobaan untuk merasai vibes studio kami.</p>
<div class="mt-6 mb-6">
<span class="text-xs text-berry-900/60 line-through">Rp 350.000</span>
<div class="flex items-baseline gap-1">
<span class="font-serif-title text-4xl font-bold text-berry-900">Rp 199k</span>
<span class="text-xs text-berry-900/60">/ 1 Session</span>
</div>
</div>
<ul class="space-y-3 text-xs text-berry-900/80 mb-8">
<li class="flex items-center gap-2"><i class="w-4 h-4 text-berry-500" data-lucide="check-circle-2"></i> Valid for all Reformer &amp; Mat classes</li>
<li class="flex items-center gap-2"><i class="w-4 h-4 text-berry-500" data-lucide="check-circle-2"></i> Free Complimentary Iced Matcha Latte</li>
<li class="flex items-center gap-2"><i class="w-4 h-4 text-berry-500" data-lucide="check-circle-2"></i> Free Grip Socks Rental for 1st time</li>
</ul>
</div>
<button class="w-full bg-berry-100 hover:bg-berry-200 text-berry-900 font-bold py-3.5 rounded-full transition-colors" onclick="openBookingModal('First Glow Trial')">Choose Trial</button>
</div>
<!-- 5 Class Pass (Most Loved 💕) -->
<div class="glass-card rounded-3xl p-8 border-2 border-berry-500 shadow-glow relative flex flex-col justify-between bg-gradient-to-b from-white via-berry-50/50 to-white transform md:-translate-y-3">
<div class="absolute -top-4 left-1/2 -translate-x-1/2 bg-gradient-to-r from-berry-500 to-berry-700 text-white text-xs font-extrabold px-4 py-1.5 rounded-full shadow">
                    Most Loved 💕
                </div>
<div>
<span class="text-xs font-bold text-berry-600 bg-berry-100 px-3 py-1 rounded-full">5 Sessions Bundle</span>
<h3 class="font-serif-title text-2xl font-bold text-berry-900 mt-4">Strawberry 5 Pass</h3>
<p class="text-xs text-berry-900/70 mt-1">Paket ideal untuk konsistensi mingguan cewek sibuk.</p>
<div class="mt-6 mb-6">
<div class="flex items-baseline gap-1">
<span class="font-serif-title text-4xl font-bold text-berry-900">Rp 1.250k</span>
<span class="text-xs text-berry-900/60">/ 5 Sessions</span>
</div>
<p class="text-[11px] text-berry-600 mt-1 font-semibold">Cuma Rp 250k per kedatangan!</p>
</div>
<ul class="space-y-3 text-xs text-berry-900/80 mb-8">
<li class="flex items-center gap-2"><i class="w-4 h-4 text-berry-500" data-lucide="check-circle-2"></i> Active for 45 Days</li>
<li class="flex items-center gap-2"><i class="w-4 h-4 text-berry-500" data-lucide="check-circle-2"></i> Can share 1 slot with a Bestie</li>
<li class="flex items-center gap-2"><i class="w-4 h-4 text-berry-500" data-lucide="check-circle-2"></i> Free locker &amp; luxury shower amenities</li>
<li class="flex items-center gap-2"><i class="w-4 h-4 text-berry-500" data-lucide="check-circle-2"></i> Free 10% Discount Coupon at Matcha Bar</li>
</ul>
</div>
<button class="w-full bg-gradient-to-r from-berry-500 to-berry-600 text-white font-bold py-3.5 rounded-full shadow-glow hover:shadow-glow-lg transition-all" onclick="openBookingModal('Strawberry 5 Pass')">Get 5 Sessions Pass 💕</button>
</div>
<!-- Bestie Pass (Shareable) -->
<div class="glass-card rounded-3xl p-8 border border-berry-200 shadow-soft hover:shadow-glow transition-all flex flex-col justify-between">
<div>
<span class="text-xs font-bold text-berry-800 bg-berry-200 px-3 py-1 rounded-full">Bestie Pass 👯‍♀️</span>
<h3 class="font-serif-title text-2xl font-bold text-berry-900 mt-4">10 Class Duo Bundle</h3>
<p class="text-xs text-berry-900/70 mt-1">Paket berdua bareng bestie kamu biar makin semangat!</p>
<div class="mt-6 mb-6">
<div class="flex items-baseline gap-1">
<span class="font-serif-title text-4xl font-bold text-berry-900">Rp 2.200k</span>
<span class="text-xs text-berry-900/60">/ 10 Sessions</span>
</div>
<p class="text-[11px] text-berry-600 mt-1 font-semibold">Hemat Rp 300k berdua!</p>
</div>
<ul class="space-y-3 text-xs text-berry-900/80 mb-8">
<li class="flex items-center gap-2"><i class="w-4 h-4 text-berry-500" data-lucide="check-circle-2"></i> Active for 90 Days</li>
<li class="flex items-center gap-2"><li class="flex items-center gap-2"><i class="w-4 h-4 text-berry-500" data-lucide="check-circle-2"></i> Fully shareable with 1 registered bestie</li>
<li class="flex items-center gap-2"><i class="w-4 h-4 text-berry-500" data-lucide="check-circle-2"></i> Priority Schedule Booking 7 days ahead</li>
</li></ul>
</div>
<button class="w-full bg-berry-100 hover:bg-berry-200 text-berry-900 font-bold py-3.5 rounded-full transition-colors" onclick="openBookingModal('10 Class Duo Bestie')">Choose Bestie Pass</button>
</div>
</div>
<!-- Monthly Membership View (Hidden by default) -->
<div class="hidden grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto" id="membership-pricing-grid">
<div class="glass-card rounded-3xl p-8 border border-berry-200 shadow-soft hover:shadow-glow transition-all flex flex-col justify-between">
<div>
<span class="text-xs font-bold text-berry-600 bg-berry-100 px-3 py-1 rounded-full">Monthly Glow</span>
<h3 class="font-serif-title text-2xl font-bold text-berry-900 mt-4">Monthly 8 Classes</h3>
<p class="text-xs text-berry-900/70 mt-1">Rutin 2x seminggu untuk transformasi posture yang nyata.</p>
<div class="mt-6 mb-6">
<span class="font-serif-title text-4xl font-bold text-berry-900">Rp 1.850k</span>
<span class="text-xs text-berry-900/60">/ Month</span>
</div>
<ul class="space-y-3 text-xs text-berry-900/80 mb-8">
<li class="flex items-center gap-2"><i class="w-4 h-4 text-berry-500" data-lucide="check-circle-2"></i> 8 Reformer / Mat Sessions per month</li>
<li class="flex items-center gap-2"><i class="w-4 h-4 text-berry-500" data-lucide="check-circle-2"></i> Free Aesthetic Merch T-Shirt</li>
<li class="flex items-center gap-2"><i class="w-4 h-4 text-berry-500" data-lucide="check-circle-2"></i> Free Cancelation up to 6h before class</li>
</ul>
</div>
<button class="w-full bg-berry-500 text-white font-bold py-3.5 rounded-full shadow" onclick="openBookingModal('Monthly 8 Classes')">Join Monthly Glow</button>
</div>
<div class="glass-card rounded-3xl p-8 border-2 border-berry-600 shadow-glow flex flex-col justify-between bg-gradient-to-b from-white via-berry-100/30 to-white">
<div>
<span class="text-xs font-bold text-white bg-berry-800 px-3 py-1 rounded-full">VIP Unlimited 👑</span>
<h3 class="font-serif-title text-2xl font-bold text-berry-900 mt-4">VIP VIP Strawberry Club</h3>
<p class="text-xs text-berry-900/70 mt-1">Akses tanpa batas ke semua kelas &amp; studio facilities.</p>
<div class="mt-6 mb-6">
<span class="font-serif-title text-4xl font-bold text-berry-900">Rp 2.990k</span>
<span class="text-xs text-berry-900/60">/ Month</span>
</div>
<ul class="space-y-3 text-xs text-berry-900/80 mb-8">
<li class="flex items-center gap-2"><i class="w-4 h-4 text-berry-500" data-lucide="check-circle-2"></i> Unlimited Group Classes (Reformer &amp; Hot)</li>
<li class="flex items-center gap-2"><i class="w-4 h-4 text-berry-500" data-lucide="check-circle-2"></i> 1x Free Monthly Private 1-on-1 Session</li>
<li class="flex items-center gap-2"><i class="w-4 h-4 text-berry-500" data-lucide="check-circle-2"></i> Unlimited Free Iced Matcha Drinks</li>
<li class="flex items-center gap-2"><i class="w-4 h-4 text-berry-500" data-lucide="check-circle-2"></i> VIP Shower Room Locker Reserved</li>
</ul>
</div>
<button class="w-full bg-gradient-to-r from-berry-600 to-berry-800 text-white font-bold py-3.5 rounded-full shadow-glow" onclick="openBookingModal('VIP Strawberry Club Unlimited')">Become VIP Club Member ✨</button>
</div>
</div>
</section>
 SECTION 8: INSTRUCTOR PROFILES & CERTIFICATIONS 
<section class="py-20 px-4 md:px-8 max-w-7xl mx-auto bg-gradient-to-b from-transparent via-berry-100/40 to-transparent" id="instructors">
<div class="text-center max-w-2xl mx-auto mb-14">
<span class="text-berry-600 font-bold text-xs uppercase tracking-widest bg-berry-100 px-3 py-1 rounded-full">Certified Experts</span>
<h2 class="font-serif-title text-3xl md:text-5xl font-bold text-berry-900 mt-3">Meet Our Glow Instructors 🧘‍♀️</h2>
<p class="text-berry-900/70 text-sm md:text-base mt-2">Certified international trainers yang ramah, patient, &amp; siap bantu bentuk tubuh impianmu!</p>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
<!-- Instructor 1 -->
<div class="glass-card rounded-3xl p-6 shadow-soft hover:shadow-glow transition-all border border-berry-200/70 group text-center flex flex-col items-center">
<div class="relative w-36 h-36 rounded-full overflow-hidden border-4 border-white shadow-md mb-4 group-hover:scale-105 transition-transform duration-300">
<img alt="Instructor" class="w-full h-full object-cover" src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&amp;fit=crop&amp;w=400&amp;q=80"/>
</div>
<span class="text-[10px] font-extrabold text-berry-800 bg-berry-200 px-3 py-0.5 rounded-full tracking-wider uppercase mb-2">Lead Reformer Coach</span>
<h3 class="font-serif-title text-2xl font-bold text-berry-900">Giselle Anindya</h3>
<p class="text-xs text-berry-600 font-semibold mt-1">@giselle.pilates ✨</p>
<!-- Certification Badges -->
<div class="flex flex-wrap justify-center gap-1.5 my-4">
<span class="text-[10px] bg-white border border-berry-200 text-berry-900 px-2 py-0.5 rounded-md font-semibold">BALANCED BODY Certified</span>
<span class="text-[10px] bg-white border border-berry-200 text-berry-900 px-2 py-0.5 rounded-md font-semibold">500+ Hours Master</span>
</div>
<p class="text-xs text-berry-900/75 leading-relaxed">"Fokusku adalah alignment presisi &amp; posture correction tanpa bikin kamu merasa tersiksa. Flow safely &amp; glow up together!"</p>
</div>
<!-- Instructor 2 -->
<div class="glass-card rounded-3xl p-6 shadow-soft hover:shadow-glow transition-all border border-berry-200/70 group text-center flex flex-col items-center">
<div class="relative w-36 h-36 rounded-full overflow-hidden border-4 border-white shadow-md mb-4 group-hover:scale-105 transition-transform duration-300">
<img alt="Instructor" class="w-full h-full object-cover" src="https://images.unsplash.com/photo-1580489944761-15a19d654956?auto=format&amp;fit=crop&amp;w=400&amp;q=80"/>
</div>
<span class="text-[10px] font-extrabold text-berry-800 bg-berry-200 px-3 py-0.5 rounded-full tracking-wider uppercase mb-2">Sculpt &amp; Hot Specialist</span>
<h3 class="font-serif-title text-2xl font-bold text-berry-900">Valerie Claris</h3>
<p class="text-xs text-berry-600 font-semibold mt-1">@valerie.glowfit 🍓</p>
<!-- Certification Badges -->
<div class="flex flex-wrap justify-center gap-1.5 my-4">
<span class="text-[10px] bg-white border border-berry-200 text-berry-900 px-2 py-0.5 rounded-md font-semibold">STOTT Pilates Certified</span>
<span class="text-[10px] bg-white border border-berry-200 text-berry-900 px-2 py-0.5 rounded-md font-semibold">Hot Infrared Expert</span>
</div>
<p class="text-xs text-berry-900/75 leading-relaxed">"Siap-siap dengerin playlist TikTok terenak sambil glute burn maksimal di kelas Infrared Sculpt saya!"</p>
</div>
<!-- Instructor 3 -->
<div class="glass-card rounded-3xl p-6 shadow-soft hover:shadow-glow transition-all border border-berry-200/70 group text-center flex flex-col items-center">
<div class="relative w-36 h-36 rounded-full overflow-hidden border-4 border-white shadow-md mb-4 group-hover:scale-105 transition-transform duration-300">
<img alt="Instructor" class="w-full h-full object-cover" src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&amp;fit=crop&amp;w=400&amp;q=80"/>
</div>
<span class="text-[10px] font-extrabold text-berry-800 bg-berry-200 px-3 py-0.5 rounded-full tracking-wider uppercase mb-2">Prenatal &amp; Cadillac Queen</span>
<h3 class="font-serif-title text-2xl font-bold text-berry-900">Dr. Alyssa Chloe</h3>
<p class="text-xs text-berry-600 font-semibold mt-1">@alyssa.wellness 🌸</p>
<!-- Certification Badges -->
<div class="flex flex-wrap justify-center gap-1.5 my-4">
<span class="text-[10px] bg-white border border-berry-200 text-berry-900 px-2 py-0.5 rounded-md font-semibold">PMA Certified Alliance</span>
<span class="text-[10px] bg-white border border-berry-200 text-berry-900 px-2 py-0.5 rounded-md font-semibold">Prenatal Rehab Specialist</span>
</div>
<p class="text-xs text-berry-900/75 leading-relaxed">"Spesialisasi mengatasi nyeri tulang belakang, pemulihan pasca melahirkan, dan privat realignment kelas Cadillac."</p>
</div>
</div>
</section>
 SECTION 9: STUDIO FACILITIES GALLERY WITH LIGHTBOX 
<section class="py-20 px-4 md:px-8 max-w-7xl mx-auto" id="facilities">
<div class="flex flex-col md:flex-row md:items-end justify-between mb-12">
<div>
<span class="text-berry-600 font-bold text-xs uppercase tracking-widest bg-berry-100 px-3 py-1 rounded-full">Aesthetic Ambience</span>
<h2 class="font-serif-title text-3xl md:text-5xl font-bold text-berry-900 mt-3">Studio Facilities Tour 📸</h2>
<p class="text-berry-900/70 text-sm mt-2">Sudut-sudut cantik instagrammable dirancang khusus untuk kenyamanan &amp; foto OOTD kamu!</p>
</div>
<p class="text-xs text-berry-600 font-semibold mt-4 md:mt-0">✨ Click any photo for Lightbox Preview</p>
</div>
<!-- Gallery Grid -->
<div class="grid grid-cols-2 md:grid-cols-4 gap-4">
<!-- Photo 1 -->
<div class="relative h-64 md:h-80 rounded-3xl overflow-hidden cursor-pointer group border border-berry-200 shadow-soft" onclick="openLightbox('https://images.unsplash.com/photo-1518611012118-696072aa579a?auto=format&amp;fit=crop&amp;w=1200&amp;q=80', 'Pink Aesthetic Reformer Suite')">
<img alt="Reformer Suite" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" src="https://images.unsplash.com/photo-1518611012118-696072aa579a?auto=format&amp;fit=crop&amp;w=600&amp;q=80"/>
<div class="absolute inset-0 bg-gradient-to-t from-berry-900/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-4">
<span class="text-white text-xs font-bold">🍓 Pink Aesthetic Reformer Suite</span>
</div>
</div>
<!-- Photo 2 -->
<div class="relative h-64 md:h-80 rounded-3xl overflow-hidden cursor-pointer group border border-berry-200 shadow-soft" onclick="openLightbox('https://images.unsplash.com/photo-1545205597-3d9d02c29597?auto=format&amp;fit=crop&amp;w=1200&amp;q=80', 'Complimentary Iced Matcha Bar')">
<img alt="Matcha Bar" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" src="https://images.unsplash.com/photo-1545205597-3d9d02c29597?auto=format&amp;fit=crop&amp;w=600&amp;q=80"/>
<div class="absolute inset-0 bg-gradient-to-t from-berry-900/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-4">
<span class="text-white text-xs font-bold">🍵 Post-Workout Iced Matcha Bar</span>
</div>
</div>
<!-- Photo 3 -->
<div class="relative h-64 md:h-80 rounded-3xl overflow-hidden cursor-pointer group border border-berry-200 shadow-soft" onclick="openLightbox('https://images.unsplash.com/photo-1584622650111-993a426fbf0a?auto=format&amp;fit=crop&amp;w=1200&amp;q=80', 'Luxury Dyson Shower Room')">
<img alt="Luxury Vanity" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" src="https://images.unsplash.com/photo-1584622650111-993a426fbf0a?auto=format&amp;fit=crop&amp;w=600&amp;q=80"/>
<div class="absolute inset-0 bg-gradient-to-t from-berry-900/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-4">
<span class="text-white text-xs font-bold">✨ Dyson Vanity &amp; Shower Lounge</span>
</div>
</div>
<!-- Photo 4 -->
<div class="relative h-64 md:h-80 rounded-3xl overflow-hidden cursor-pointer group border border-berry-200 shadow-soft" onclick="openLightbox('https://images.unsplash.com/photo-1517838277536-f5f99be501cd?auto=format&amp;fit=crop&amp;w=1200&amp;q=80', 'OOTD Selfie Mirror Area')">
<img alt="Selfie Mirror" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" src="https://images.unsplash.com/photo-1517838277536-f5f99be501cd?auto=format&amp;fit=crop&amp;w=600&amp;q=80"/>
<div class="absolute inset-0 bg-gradient-to-t from-berry-900/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-4">
<span class="text-white text-xs font-bold">🪞 Gen-Z OOTD Selfie Mirror Spot</span>
</div>
</div>
</div>
</section>
 SECTION 10: CLASS SCHEDULES FILTER & CALENDAR VIEW 
<section class="py-20 px-4 md:px-8 max-w-7xl mx-auto" id="schedule">
<div class="text-center max-w-2xl mx-auto mb-10">
<span class="text-berry-600 font-bold text-xs uppercase tracking-widest bg-berry-100 px-3 py-1 rounded-full">Live Timetable</span>
<h2 class="font-serif-title text-3xl md:text-5xl font-bold text-berry-900 mt-3">Class Schedules &amp; Seats 🗓️</h2>
<p class="text-berry-900/70 text-sm md:text-base mt-2">Cek jadwal real-time minggu ini dan booking slot sebelum kehabisan!</p>
<!-- Day Selector Tabs -->
<div class="flex flex-wrap items-center justify-center gap-2 mt-8" id="day-selector">
<button class="day-btn active bg-berry-500 text-white font-bold text-xs px-4 py-2.5 rounded-2xl transition-all shadow" onclick="filterSchedule('Mon', this)">Senin</button>
<button class="day-btn glass-card text-berry-900 hover:bg-berry-100 font-bold text-xs px-4 py-2.5 rounded-2xl transition-all" onclick="filterSchedule('Tue', this)">Selasa</button>
<button class="day-btn glass-card text-berry-900 hover:bg-berry-100 font-bold text-xs px-4 py-2.5 rounded-2xl transition-all" onclick="filterSchedule('Wed', this)">Rabu</button>
<button class="day-btn glass-card text-berry-900 hover:bg-berry-100 font-bold text-xs px-4 py-2.5 rounded-2xl transition-all" onclick="filterSchedule('Thu', this)">Kamis</button>
<button class="day-btn glass-card text-berry-900 hover:bg-berry-100 font-bold text-xs px-4 py-2.5 rounded-2xl transition-all" onclick="filterSchedule('Fri', this)">Jumat</button>
<button class="day-btn glass-card text-berry-900 hover:bg-berry-100 font-bold text-xs px-4 py-2.5 rounded-2xl transition-all" onclick="filterSchedule('Sat', this)">Sabtu</button>
<button class="day-btn glass-card text-berry-900 hover:bg-berry-100 font-bold text-xs px-4 py-2.5 rounded-2xl transition-all" onclick="filterSchedule('Sun', this)">Minggu</button>
</div>
</div>
<!-- Schedule Table / Card List Container -->
<div class="glass-card rounded-3xl p-4 md:p-8 border border-berry-200/80 shadow-soft">
<div class="space-y-4" id="schedule-list">
<!-- Slot Item 1 -->
<div class="schedule-item day-Mon day-Wed day-Fri flex flex-col md:flex-row items-start md:items-center justify-between p-4 md:p-5 rounded-2xl bg-white/80 border border-berry-100 hover:border-berry-300 transition-all gap-4">
<div class="flex items-center gap-4">
<div class="bg-berry-100 text-berry-800 p-3 rounded-2xl text-center min-w-[80px]">
<span class="font-serif-title font-bold text-base block">08:00</span>
<span class="text-[10px] text-berry-600 font-semibold uppercase">AM</span>
</div>
<div>
<span class="text-[10px] font-bold text-berry-600 bg-berry-50 px-2.5 py-0.5 rounded-full border border-berry-200">Reformer Studio</span>
<h4 class="font-serif-title text-lg font-bold text-berry-900 mt-1">Strawberry Reformer Flow</h4>
<p class="text-xs text-berry-900/60 flex items-center gap-2 mt-0.5">
<span>Coach Giselle Anindya</span> • <span>50 Mins</span>
</p>
</div>
</div>
<div class="flex items-center justify-between w-full md:w-auto gap-4 pt-3 md:pt-0 border-t md:border-t-0 border-berry-100">
<div class="text-left md:text-right">
<span class="inline-flex items-center gap-1 text-xs font-bold text-emerald-600 bg-emerald-50 px-2.5 py-1 rounded-full">
<span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span> 4 Spots Left
                            </span>
</div>
<button class="bg-berry-500 hover:bg-berry-600 text-white text-xs font-bold px-5 py-2.5 rounded-full shadow transition-transform active:scale-95" onclick="openBookingModal('Strawberry Reformer Flow (08:00 AM)')">Book Slot</button>
</div>
</div>
<!-- Slot Item 2 -->
<div class="schedule-item day-Mon day-Tue day-Thu day-Sat flex flex-col md:flex-row items-start md:items-center justify-between p-4 md:p-5 rounded-2xl bg-white/80 border border-berry-100 hover:border-berry-300 transition-all gap-4">
<div class="flex items-center gap-4">
<div class="bg-berry-100 text-berry-800 p-3 rounded-2xl text-center min-w-[80px]">
<span class="font-serif-title font-bold text-base block">10:30</span>
<span class="text-[10px] text-berry-600 font-semibold uppercase">AM</span>
</div>
<div>
<span class="text-[10px] font-bold text-berry-800 bg-berry-200 px-2.5 py-0.5 rounded-full">Hot Studio 🔥</span>
<h4 class="font-serif-title text-lg font-bold text-berry-900 mt-1">Infrared Strawberry Burn</h4>
<p class="text-xs text-berry-900/60 flex items-center gap-2 mt-0.5">
<span>Coach Valerie Claris</span> • <span>50 Mins</span>
</p>
</div>
</div>
<div class="flex items-center justify-between w-full md:w-auto gap-4 pt-3 md:pt-0 border-t md:border-t-0 border-berry-100">
<div class="text-left md:text-right">
<span class="inline-flex items-center gap-1 text-xs font-bold text-amber-600 bg-amber-50 px-2.5 py-1 rounded-full">
<span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span> 2 Spots Left!
                            </span>
</div>
<button class="bg-berry-500 hover:bg-berry-600 text-white text-xs font-bold px-5 py-2.5 rounded-full shadow transition-transform active:scale-95" onclick="openBookingModal('Infrared Strawberry Burn (10:30 AM)')">Book Slot</button>
</div>
</div>
<!-- Slot Item 3 -->
<div class="schedule-item day-Mon day-Wed day-Sat day-Sun flex flex-col md:flex-row items-start md:items-center justify-between p-4 md:p-5 rounded-2xl bg-white/80 border border-berry-100 hover:border-berry-300 transition-all gap-4">
<div class="flex items-center gap-4">
<div class="bg-berry-100 text-berry-800 p-3 rounded-2xl text-center min-w-[80px]">
<span class="font-serif-title font-bold text-base block">05:00</span>
<span class="text-[10px] text-berry-600 font-semibold uppercase">PM</span>
</div>
<div>
<span class="text-[10px] font-bold text-berry-600 bg-berry-50 px-2.5 py-0.5 rounded-full border border-berry-200">Main Mat Lounge</span>
<h4 class="font-serif-title text-lg font-bold text-berry-900 mt-1">Berry Barre &amp; Sculpt</h4>
<p class="text-xs text-berry-900/60 flex items-center gap-2 mt-0.5">
<span>Coach Valerie Claris</span> • <span>45 Mins</span>
</p>
</div>
</div>
<div class="flex items-center justify-between w-full md:w-auto gap-4 pt-3 md:pt-0 border-t md:border-t-0 border-berry-100">
<div class="text-left md:text-right">
<span class="inline-flex items-center gap-1 text-xs font-bold text-emerald-600 bg-emerald-50 px-2.5 py-1 rounded-full">
<span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> 5 Spots Left
                            </span>
</div>
<button class="bg-berry-500 hover:bg-berry-600 text-white text-xs font-bold px-5 py-2.5 rounded-full shadow transition-transform active:scale-95" onclick="openBookingModal('Berry Barre &amp; Sculpt (05:00 PM)')">Book Slot</button>
</div>
</div>
<!-- Slot Item 4 -->
<div class="schedule-item day-Tue day-Thu day-Sun flex flex-col md:flex-row items-start md:items-center justify-between p-4 md:p-5 rounded-2xl bg-white/80 border border-berry-100 hover:border-berry-300 transition-all gap-4">
<div class="flex items-center gap-4">
<div class="bg-berry-100 text-berry-800 p-3 rounded-2xl text-center min-w-[80px]">
<span class="font-serif-title font-bold text-base block">07:00</span>
<span class="text-[10px] text-berry-600 font-semibold uppercase">PM</span>
</div>
<div>
<span class="text-[10px] font-bold text-berry-600 bg-berry-50 px-2.5 py-0.5 rounded-full border border-berry-200">Reformer Studio</span>
<h4 class="font-serif-title text-lg font-bold text-berry-900 mt-1">Reformer Jumpboard Party</h4>
<p class="text-xs text-berry-900/60 flex items-center gap-2 mt-0.5">
<span>Coach Giselle Anindya</span> • <span>50 Mins</span>
</p>
</div>
</div>
<div class="flex items-center justify-between w-full md:w-auto gap-4 pt-3 md:pt-0 border-t md:border-t-0 border-berry-100">
<div class="text-left md:text-right">
<span class="inline-flex items-center gap-1 text-xs font-bold text-rose-600 bg-rose-50 px-2.5 py-1 rounded-full">
<span class="w-1.5 h-1.5 rounded-full bg-rose-500 animate-ping"></span> Almost Full (1 Spot Left!)
                            </span>
</div>
<button class="bg-berry-500 hover:bg-berry-600 text-white text-xs font-bold px-5 py-2.5 rounded-full shadow transition-transform active:scale-95" onclick="openBookingModal('Reformer Jumpboard Party (07:00 PM)')">Book Slot</button>
</div>
</div>
</div>
</div>
</section>
 SECTION 12: STUDIO LOCATION & MAP PREVIEW 
<section class="py-20 px-4 md:px-8 max-w-7xl mx-auto" id="location">
<div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center glass-card rounded-3xl p-6 md:p-10 border border-berry-200/80 shadow-soft">
<div class="lg:col-span-5 space-y-6">
<span class="text-berry-600 font-bold text-xs uppercase tracking-widest bg-berry-100 px-3 py-1 rounded-full">Visit Our Studio</span>
<h2 class="font-serif-title text-3xl md:text-4xl font-bold text-berry-900">Where The Magic Happens ✨</h2>
<p class="text-berry-900/70 text-sm leading-relaxed">Berlokasi strategis di pusat kota dengan akses mudah, valet parking gratis, &amp; dikelilingi cafe hits favoritmu!</p>
<div class="space-y-4 pt-2">
<div class="flex items-start gap-3">
<div class="w-10 h-10 rounded-2xl bg-berry-100 text-berry-600 flex items-center justify-center shrink-0">
<i class="w-5 h-5" data-lucide="map-pin"></i>
</div>
<div>
<p class="text-xs font-bold text-berry-900">Studio Address</p>
<p class="text-xs text-berry-900/70">Jl. Senopati Aesthetic No. 88, Upper Level 2, Jakarta Selatan</p>
</div>
</div>
<div class="flex items-start gap-3">
<div class="w-10 h-10 rounded-2xl bg-berry-100 text-berry-600 flex items-center justify-center shrink-0">
<i class="w-5 h-5" data-lucide="clock"></i>
</div>
<div>
<p class="text-xs font-bold text-berry-900">Operating Hours</p>
<p class="text-xs text-berry-900/70">Senin - Minggu: 07:00 AM - 09:00 PM</p>
</div>
</div>
<div class="flex items-start gap-3">
<div class="w-10 h-10 rounded-2xl bg-berry-100 text-berry-600 flex items-center justify-center shrink-0">
<i class="w-5 h-5" data-lucide="car"></i>
</div>
<div>
<p class="text-xs font-bold text-berry-900">Parking &amp; Amenities</p>
<p class="text-xs text-berry-900/70">Free Valet Service • Private Locker • Dyson Vanity Room</p>
</div>
</div>
</div>
<a class="inline-flex items-center gap-2 text-xs font-bold bg-berry-900 text-white px-6 py-3 rounded-full hover:bg-berry-800 transition-colors shadow" href="https://maps.google.com" target="_blank">
<span>Open in Google Maps</span>
<i class="w-4 h-4" data-lucide="external-link"></i>
</a>
</div>
<!-- Simulated Interactive Map Preview -->
<div class="lg:col-span-7 relative rounded-2xl overflow-hidden border-2 border-berry-200 h-[350px] shadow-inner bg-berry-50">
<iframe allowfullscreen="" class="w-full h-full border-0 grayscale opacity-80 hover:grayscale-0 hover:opacity-100 transition-all duration-500" loading="lazy" referrerpolicy="no-referrer-when-downgrade" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.273030386266!2d106.8068!3d-6.2277!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f15000000001%3A0x1234567890!2sSenopati%20Jakarta!5e0!3m2!1sen!2sid!4v1680000000000!5m2!1sen!2sid"></iframe>
<div class="absolute top-4 left-4 glass-card px-4 py-2 rounded-xl border border-berry-200 text-xs font-bold text-berry-900 shadow">
                    🍓 Rustic Strawberry Fizz Studio
                </div>
</div>
</div>
</section>
 SECTION 13: CUSTOMER TESTIMONIALS (GEN-Z GLOW GIRLS) 
<section class="py-20 px-4 md:px-8 max-w-7xl mx-auto">
<div class="text-center max-w-2xl mx-auto mb-12">
<span class="text-berry-600 font-bold text-xs uppercase tracking-widest bg-berry-100 px-3 py-1 rounded-full">Real Reviews</span>
<h2 class="font-serif-title text-3xl md:text-5xl font-bold text-berry-900 mt-3">Glow Girls Love Us 💕</h2>
<p class="text-berry-900/70 text-sm md:text-base mt-2">Dengar langsung pengalaman seru cewek-cewek sehabis ikutan kelas Pilates kami!</p>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
<!-- Review 1 -->
<div class="glass-card rounded-3xl p-6 border border-berry-200 shadow-soft flex flex-col justify-between hover:-translate-y-1 transition-all">
<div>
<div class="flex items-center gap-1 text-amber-400 mb-4">
                        ★★★★★
                    </div>
<p class="text-xs text-berry-900/80 leading-relaxed italic">"Gila sih tempatnya aesthetic bgt!! Instrukturnya super patient ramah buat beginner kayak aku. Baru 4x datang beneran ngerasa posture punggung lebih tegak &amp; perut lebih kencang!"</p>
</div>
<div class="flex items-center gap-3 mt-6 pt-4 border-t border-berry-100">
<img alt="Avatar" class="w-10 h-10 rounded-full object-cover border border-berry-300" src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&amp;fit=crop&amp;w=100&amp;q=80"/>
<div>
<p class="text-xs font-bold text-berry-900">Natasha Clarissa</p>
<span class="text-[10px] text-berry-600 font-semibold bg-berry-50 px-2 py-0.5 rounded-md">Verified Glow Girl 💕</span>
</div>
</div>
</div>
<!-- Review 2 -->
<div class="glass-card rounded-3xl p-6 border border-berry-200 shadow-soft flex flex-col justify-between hover:-translate-y-1 transition-all">
<div>
<div class="flex items-center gap-1 text-amber-400 mb-4">
                        ★★★★★
                    </div>
<p class="text-xs text-berry-900/80 leading-relaxed italic">"Matcha latte gratis sehabis workout itu BEST COMBO EVER! Plus kelas Infrared Sculpt-nya beneran bikin keringat ngucur berasa detox sebadan-badan. Auto langganan!"</p>
</div>
<div class="flex items-center gap-3 mt-6 pt-4 border-t border-berry-100">
<img alt="Avatar" class="w-10 h-10 rounded-full object-cover border border-berry-300" src="https://images.unsplash.com/photo-1517841905240-472988babdf9?auto=format&amp;fit=crop&amp;w=100&amp;q=80"/>
<div>
<p class="text-xs font-bold text-berry-900">Karin Novilda</p>
<span class="text-[10px] text-berry-600 font-semibold bg-berry-50 px-2 py-0.5 rounded-md">Verified Glow Girl 💕</span>
</div>
</div>
</div>
<!-- Review 3 -->
<div class="glass-card rounded-3xl p-6 border border-berry-200 shadow-soft flex flex-col justify-between hover:-translate-y-1 transition-all">
<div>
<div class="flex items-center gap-1 text-amber-400 mb-4">
                        ★★★★★
                    </div>
<p class="text-xs text-berry-900/80 leading-relaxed italic">"Tempatnya wangi strawberry herbal &amp; playlist lagunya hits banget. Gak berasa 50 menit cepet bgt berlalu. Worth it bgt ambil paket Bestie Duo bareng temen!"</p>
</div>
<div class="flex items-center gap-3 mt-6 pt-4 border-t border-berry-100">
<img alt="Avatar" class="w-10 h-10 rounded-full object-cover border border-berry-300" src="https://images.unsplash.com/photo-1524504388940-b1c1722653e1?auto=format&amp;fit=crop&amp;w=100&amp;q=80"/>
<div>
<p class="text-xs font-bold text-berry-900">Aurelia Stefani</p>
<span class="text-[10px] text-berry-600 font-semibold bg-berry-50 px-2 py-0.5 rounded-md">Verified Glow Girl 💕</span>
</div>
</div>
</div>
</div>
</section>
 SECTION 14: FAQ ACCORDION 
<section class="py-20 px-4 md:px-8 max-w-4xl mx-auto" id="faq">
<div class="text-center mb-12">
<span class="text-berry-600 font-bold text-xs uppercase tracking-widest bg-berry-100 px-3 py-1 rounded-full">Got Questions?</span>
<h2 class="font-serif-title text-3xl md:text-5xl font-bold text-berry-900 mt-3">Frequently Asked Questions ❓</h2>
</div>
<div class="space-y-4">
<!-- FAQ 1 -->
<div class="glass-card rounded-2xl border border-berry-200 overflow-hidden transition-all">
<button class="w-full text-left p-5 font-serif-title text-lg font-bold text-berry-900 flex items-center justify-between" onclick="toggleFaq(1)">
<span>Apakah saya yang belum pernah Pilates sama sekali boleh ikut?</span>
<i class="w-5 h-5 text-berry-500 transition-transform" data-lucide="chevron-down" id="faq-icon-1"></i>
</button>
<div class="hidden px-5 pb-5 text-xs text-berry-900/75 leading-relaxed border-t border-berry-100 pt-3" id="faq-answer-1">
                    Tentu saja! Hampir 60% member kami adalah First-Timer. Instruktur kami akan memberikan briefing alat reformer sebelum kelas dimulai dan siap membantu menyesuaikan tingkat beban springs.
                </div>
</div>
<!-- FAQ 2 -->
<div class="glass-card rounded-2xl border border-berry-200 overflow-hidden transition-all">
<button class="w-full text-left p-5 font-serif-title text-lg font-bold text-berry-900 flex items-center justify-between" onclick="toggleFaq(2)">
<span>Apa saja yang perlu saya bawa saat datang ke studio?</span>
<i class="w-5 h-5 text-berry-500 transition-transform" data-lucide="chevron-down" id="faq-icon-2"></i>
</button>
<div class="hidden px-5 pb-5 text-xs text-berry-900/75 leading-relaxed border-t border-berry-100 pt-3" id="faq-answer-2">
                    Cukup membawa baju olahraga yang nyaman (fitted activewear disarankan) dan **Grip Socks** (kaos kaki anti-slip). Jika kamu tidak punya grip socks, kami juga menyediakannya di studio reception!
                </div>
</div>
<!-- FAQ 3 -->
<div class="glass-card rounded-2xl border border-berry-200 overflow-hidden transition-all">
<button class="w-full text-left p-5 font-serif-title text-lg font-bold text-berry-900 flex items-center justify-between" onclick="toggleFaq(3)">
<span>Bagaimana kebijakan pembatalan (cancellation policy) kelas?</span>
<i class="w-5 h-5 text-berry-500 transition-transform" data-lucide="chevron-down" id="faq-icon-3"></i>
</button>
<div class="hidden px-5 pb-5 text-xs text-berry-900/75 leading-relaxed border-t border-berry-100 pt-3" id="faq-answer-3">
                    Pembatalan slot tanpa pemotongan kuota dapat dilakukan maksimal 6 jam sebelum jadwal kelas dimulai melalui WhatsApp admin atau aplikasi booking.
                </div>
</div>
<!-- FAQ 4 -->
<div class="glass-card rounded-2xl border border-berry-200 overflow-hidden transition-all">
<button class="w-full text-left p-5 font-serif-title text-lg font-bold text-berry-900 flex items-center justify-between" onclick="toggleFaq(4)">
<span>Apakah ada fasilitas kamar mandi &amp; hair dryer?</span>
<i class="w-5 h-5 text-berry-500 transition-transform" data-lucide="chevron-down" id="faq-icon-4"></i>
</button>
<div class="hidden px-5 pb-5 text-xs text-berry-900/75 leading-relaxed border-t border-berry-100 pt-3" id="faq-answer-4">
                    Ya, kami menyediakan Luxury Shower Room yang dilengkapi hot shower, handuk bersih, shampoo &amp; body wash organik, serta Dyson Hair Dryer di vanity lounge!
                </div>
</div>
</div>
</section>
 SECTION 15: FOOTER & NEWSLETTER 
<footer class="bg-berry-900 text-white pt-16 pb-12 px-4 md:px-8 border-t border-berry-800">
<div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-12 gap-10 pb-12 border-b border-berry-800">
<!-- Brand & Newsletter -->
<div class="md:col-span-6 space-y-4">
<div class="flex items-center gap-2">
<div class="w-10 h-10 rounded-full bg-berry-500 flex items-center justify-center text-white text-xl">
                        🍓
                    </div>
<span class="font-serif-title font-bold text-2xl text-white">Rustic Strawberry Fizz</span>
</div>
<p class="text-xs text-berry-200/80 max-w-md leading-relaxed">
                    Premium Gen-Z Pilates &amp; Reformer Studio. Tempat terbaik untuk workout, glowing, &amp; bersosialisasi dalam atmosfer girly &amp; elegan.
                </p>
<!-- Newsletter Join Glow Club -->
<div class="pt-4 max-w-md">
<p class="text-xs font-bold text-white mb-2">Join The Glow Club 💌 (Get 10% Off First Booking)</p>
<form class="flex gap-2" onsubmit="handleNewsletter(event)">
<input class="bg-berry-800/80 text-xs px-4 py-3 rounded-full text-white placeholder-berry-400 focus:outline-none focus:ring-2 focus:ring-berry-500 flex-1 border border-berry-700" placeholder="Masukkan email kamu..." required="" type="email"/>
<button class="bg-berry-500 hover:bg-berry-600 text-white font-bold text-xs px-5 py-3 rounded-full shadow" type="submit">Subscribe</button>
</form>
</div>
</div>
<!-- Quick Links -->
<div class="md:col-span-3 space-y-3">
<h4 class="font-serif-title font-bold text-base text-berry-200">Quick Navigation</h4>
<ul class="space-y-2 text-xs text-berry-200/70">
<li><a class="hover:text-white transition-colors" href="#classes">Class Catalog</a></li>
<li><a class="hover:text-white transition-colors" href="#packages">Membership &amp; Passes</a></li>
<li><a class="hover:text-white transition-colors" href="#instructors">Our Certified Coaches</a></li>
<li><a class="hover:text-white transition-colors" href="#schedule">Live Schedule Timetable</a></li>
<li><a class="hover:text-white transition-colors" href="#location">Studio Location &amp; Valet</a></li>
</ul>
</div>
<!-- Social & Contact -->
<div class="md:col-span-3 space-y-3">
<h4 class="font-serif-title font-bold text-base text-berry-200">Connect With Us</h4>
<div class="flex items-center gap-3 pt-1">
<a class="w-9 h-9 rounded-full bg-berry-800 flex items-center justify-center text-white hover:bg-berry-500 transition-colors" href="https://instagram.com" target="_blank">
<i class="w-4 h-4" data-lucide="instagram"></i>
</a>
<a class="w-9 h-9 rounded-full bg-berry-800 flex items-center justify-center text-white hover:bg-berry-500 transition-colors" href="https://tiktok.com" target="_blank">
<i class="w-4 h-4" data-lucide="video"></i>
</a>
<a class="w-9 h-9 rounded-full bg-berry-800 flex items-center justify-center text-white hover:bg-berry-500 transition-colors" href="https://pinterest.com" target="_blank">
<i class="w-4 h-4" data-lucide="image"></i>
</a>
</div>
<p class="text-xs text-berry-300 pt-2">Customer Care: +62 812-3456-7890</p>
<p class="text-xs text-berry-300">Email: hello@strawberryfizzpilates.com</p>
</div>
</div>
<div class="max-w-7xl mx-auto pt-8 flex flex-col md:flex-row items-center justify-between text-[11px] text-berry-400 gap-4">
<p>Made with care 💕· Website template by WEBIA  for Glow Girls.</p>
<div class="flex gap-6">
<a class="hover:underline" href="#">Privacy Policy</a>
<a class="hover:underline" href="#">Terms of Service</a>
<a class="hover:underline" href="#">Studio Rules</a>
</div>
</div>
</footer>
<div class="fixed bottom-6 right-4 sm:right-8 z-50 flex items-center gap-3">
<!-- Floating WhatsApp Button -->
<a class="bg-emerald-500 hover:bg-emerald-600 text-white p-3.5 rounded-full shadow-lg hover:shadow-2xl transition-all duration-300 flex items-center justify-center group relative transform hover:-translate-y-1" href="https://wa.me/6281234567890?text=Halo%20Strawberry%20Fizz%20Pilates,%20saya%20mau%20tanya%20jadwal%20dan%20trial%20class!" target="_blank">
<i class="w-6 h-6" data-lucide="message-circle"></i>
<span class="absolute -top-10 right-0 bg-white text-emerald-900 text-[10px] font-bold px-2.5 py-1 rounded-full shadow border border-emerald-100 whitespace-nowrap opacity-0 group-hover:opacity-100 transition-opacity">
                Chat WhatsApp Admin
            </span>
</a>
<!-- Floating AI Chatbot Button -->
<button class="bg-gradient-to-r from-berry-500 to-berry-700 hover:from-berry-600 hover:to-berry-800 text-white px-4 py-3 rounded-full shadow-glow hover:shadow-glow-lg transition-all duration-300 flex items-center gap-2 transform hover:-translate-y-1 border border-berry-300" onclick="toggleAiChatbot()">
<span class="text-xl animate-bounce">🍓</span>
<span class="text-xs font-extrabold tracking-wide hidden sm:inline">Strawberry AI</span>
<i class="w-5 h-5" data-lucide="bot"></i>
</button>
</div>
<div class="fixed bottom-24 right-4 sm:right-8 w-[90vw] sm:w-[380px] h-[500px] glass-dark rounded-3xl shadow-2xl z-50 hidden flex-col overflow-hidden border border-berry-300/40 text-white" id="ai-chatbot-window">
<!-- AI Header -->
<div class="bg-gradient-to-r from-berry-800 to-berry-900 p-4 flex items-center justify-between border-b border-berry-700/50">
<div class="flex items-center gap-2">
<div class="w-8 h-8 rounded-full bg-berry-500 flex items-center justify-center text-sm">
                    🤖
                </div>
<div>
<h4 class="font-serif-title font-bold text-sm text-white">Strawberry Inquiry Assistant</h4>
<p class="text-[10px] text-berry-200">Bantuan info kelas • via WhatsApp</p>
</div>
</div>
<button class="text-berry-200 hover:text-white p-1" onclick="toggleAiChatbot()">
<i class="w-5 h-5" data-lucide="x"></i>
</button>
</div>
<!-- Chat History Area -->
<div class="flex-1 p-4 overflow-y-auto space-y-3 text-xs" id="chat-messages">
<div class="bg-berry-800/60 p-3 rounded-2xl rounded-tl-none border border-berry-700/40 max-w-[85%]">
                Halo Glow Girl! 🍓 Aku Strawberry Inquiry Assistant. Bingung mau pilih kelas mana atau mau rekomendasi Pilates sesuai goal tubuhmu? Tanya aku ya! 💕
            </div>
</div>
<!-- Quick Inquiry Chips -->
<div class="px-3 py-2 bg-berry-900/80 border-t border-berry-800 flex gap-1.5 overflow-x-auto whitespace-nowrap">
<button class="text-[10px] bg-berry-800 hover:bg-berry-700 text-berry-200 px-2.5 py-1 rounded-full border border-berry-700" onclick="sendQuickAiQuery('Rekomendasi kelas pemula')">🌱 Pemula/First Timer</button>
<button class="text-[10px] bg-berry-800 hover:bg-berry-700 text-berry-200 px-2.5 py-1 rounded-full border border-berry-700" onclick="sendQuickAiQuery('Kelas untuk membentuk lekuk pinggul &amp; perut')">🔥 Bakar Lemak &amp; Toning</button>
<button class="text-[10px] bg-berry-800 hover:bg-berry-700 text-berry-200 px-2.5 py-1 rounded-full border border-berry-700" onclick="sendQuickAiQuery('Berapa harga trial class?')">🎟️ Promo Harga</button>
</div>
<!-- AI Input Form -->
<form class="p-3 bg-berry-900 flex items-center gap-2 border-t border-berry-800" onsubmit="handleAiSendMessage(event)">
<input class="bg-berry-800/80 text-xs px-4 py-2.5 rounded-full text-white placeholder-berry-400 focus:outline-none focus:ring-1 focus:ring-berry-500 flex-1 border border-berry-700" id="ai-chat-input" placeholder="Tanyakan seputar Pilates..." type="text"/>
<button class="bg-berry-500 hover:bg-berry-600 text-white p-2.5 rounded-full shadow" type="submit">
<i class="w-4 h-4" data-lucide="send"></i>
</button>
</form>
</div>
<div class="fixed inset-0 z-50 bg-black/60 backdrop-blur-sm hidden items-center justify-center p-4" id="class-detail-modal">
<div class="glass-card bg-white rounded-3xl max-w-lg w-full p-6 md:p-8 relative shadow-2xl border border-berry-200 max-h-[90vh] overflow-y-auto">
<button class="absolute top-5 right-5 text-berry-900 hover:bg-berry-100 p-2 rounded-full" onclick="closeClassDetail()">
<i class="w-5 h-5" data-lucide="x"></i>
</button>
<span class="text-xs font-bold text-berry-600 bg-berry-100 px-3 py-1 rounded-full" id="modal-category-pill">Reformer</span>
<h3 class="font-serif-title text-2xl md:text-3xl font-bold text-berry-900 mt-3" id="modal-title">Strawberry Reformer Flow</h3>
<div class="grid grid-cols-2 gap-3 my-4">
<div class="bg-berry-50 p-3 rounded-xl">
<p class="text-[10px] text-berry-600 font-semibold">Duration &amp; Intensity</p>
<p class="text-xs font-bold text-berry-900 mt-0.5" id="modal-duration-intensity">50 Mins • Medium 🔥🔥🔥</p>
</div>
<div class="bg-berry-50 p-3 rounded-xl">
<p class="text-[10px] text-berry-600 font-semibold">Calorie Burn</p>
<p class="text-xs font-bold text-berry-900 mt-0.5" id="modal-calories">~380 kcal</p>
</div>
</div>
<div class="space-y-3 text-xs text-berry-900/80">
<div>
<p class="font-bold text-berry-900 mb-1">Target Muscles &amp; Benefit:</p>
<p class="text-berry-800" id="modal-target">Lean muscles, Core, Glutes</p>
</div>
<div>
<p class="font-bold text-berry-900 mb-1">Outfit Recommendation:</p>
<p class="text-berry-800" id="modal-outfit">Aesthetic Grip Socks + Fitted Activewear</p>
</div>
<div>
<p class="font-bold text-berry-900 mb-1">What to expect:</p>
<p class="leading-relaxed" id="modal-description">Deskripsi lengkap kelas akan muncul di sini.</p>
</div>
</div>
<div class="mt-6 pt-4 border-t border-berry-100 flex justify-end gap-3">
<button class="px-5 py-2.5 rounded-full text-xs font-bold text-berry-900 hover:bg-berry-100" onclick="closeClassDetail()">Close</button>
<button class="bg-berry-500 hover:bg-berry-600 text-white px-6 py-2.5 rounded-full text-xs font-bold shadow-glow" id="modal-book-btn" onclick="">Book This Class</button>
</div>
</div>
</div>
<div class="fixed inset-0 z-50 bg-black/60 backdrop-blur-sm hidden items-center justify-center p-4" id="booking-modal">
<div class="glass-card bg-white rounded-3xl max-w-md w-full p-6 md:p-8 relative shadow-2xl border border-berry-200">
<button class="absolute top-5 right-5 text-berry-900 hover:bg-berry-100 p-2 rounded-full" onclick="closeBookingModal()">
<i class="w-5 h-5" data-lucide="x"></i>
</button>
<!-- Booking Form Step 1 -->
<div id="booking-step-form">
<div class="flex items-center gap-2 mb-2">
<span class="text-xl">🍓</span>
<span class="text-xs font-bold text-berry-600 uppercase tracking-widest">BOOKING INQUIRY</span>
</div>
<h3 class="font-serif-title text-2xl font-bold text-berry-900">Ajukan Reservasi Kelas ✨</h3>
<p class="text-xs text-berry-900/70 mt-1 mb-6">Pilih kelas atau paket dan isi preferensi jadwalmu. Admin akan mengecek ketersediaan dan mengonfirmasi detail melalui WhatsApp.</p>
<form class="space-y-4" onsubmit="return handleBookingSubmit(event)">
<div>
<label class="block text-xs font-bold text-berry-900 mb-1">Selected Class / Pass</label>
<input class="w-full bg-berry-50 border border-berry-200 rounded-xl px-4 py-2.5 text-xs font-bold text-berry-900 focus:outline-none" id="booking-class-input" name="class_or_package" readonly="" type="text"/>
</div>
<div>
<label class="block text-xs font-bold text-berry-900 mb-1">Nama Lengkap</label>
<input autocomplete="name" class="w-full bg-white border border-berry-200 rounded-xl px-4 py-2.5 text-xs text-berry-900 focus:ring-2 focus:ring-berry-500 focus:outline-none" id="booking-name" name="customer_name" placeholder="Contoh: Jessica Anindya" required="" type="text"/>
</div>
<div>
<label class="block text-xs font-bold text-berry-900 mb-1">Nomor WhatsApp</label>
<input autocomplete="tel" class="w-full bg-white border border-berry-200 rounded-xl px-4 py-2.5 text-xs text-berry-900 focus:ring-2 focus:ring-berry-500 focus:outline-none" id="booking-phone" name="customer_whatsapp" placeholder="0812xxxxxxx" required="" type="tel"/>
</div>
<div>
<label class="block text-xs font-bold text-berry-900 mb-1">Pilih Tanggal Slot</label>
<input class="w-full bg-white border border-berry-200 rounded-xl px-4 py-2.5 text-xs text-berry-900 focus:ring-2 focus:ring-berry-500 focus:outline-none" id="booking-date" name="preferred_date" required="" type="date"/>
</div>
<div><label class="block text-xs font-bold text-berry-900 mb-1" for="booking-time">Preferensi Waktu</label><select class="w-full bg-white border border-berry-200 rounded-xl px-4 py-2.5 text-xs text-berry-900" id="booking-time" name="preferred_time" required=""><option value="">Pilih waktu</option><option>08:00</option><option>10:30</option><option>13:00</option><option>17:00</option><option>19:00</option><option>Fleksibel / minta rekomendasi</option></select></div><div><label class="block text-xs font-bold text-berry-900 mb-1" for="booking-notes">Catatan (opsional)</label><textarea class="w-full bg-white border border-berry-200 rounded-xl px-4 py-2.5 text-xs text-berry-900" id="booking-notes" name="notes" placeholder="Level pemula, ingin private session, dll." rows="2"></textarea></div><button class="w-full bg-gradient-to-r from-berry-500 to-berry-600 hover:from-berry-600 hover:to-berry-800 text-white font-bold text-xs py-3.5 rounded-full shadow-glow transition-all mt-4" type="submit">Review Permintaan 💕</button>
</form>
</div>
<!-- Booking Success Confirmation State -->
<div class="hidden text-center py-4 space-y-4" id="booking-step-success"><div class="w-14 h-14 rounded-full bg-berry-100 text-berry-600 flex items-center justify-center text-3xl mx-auto">🍓</div><h3 class="font-serif-title text-2xl font-bold text-berry-900">Review Permintaanmu</h3><p class="text-xs text-berry-900/75 leading-relaxed">Periksa ringkasan berikut. Ini adalah permintaan reservasi, bukan booking terkonfirmasi. Admin perlu mengecek ketersediaan dan mengonfirmasi jadwal melalui WhatsApp.</p><div class="p-4 bg-berry-50 rounded-2xl text-left text-xs text-berry-900 space-y-2" id="booking-review-summary"></div><button class="w-full bg-gradient-to-r from-berry-500 to-berry-600 text-white font-bold text-xs py-3.5 rounded-full shadow-glow" onclick="sendBookingInquiryToWhatsApp()" type="button">Kirim Permintaan via WhatsApp ↗</button><button class="w-full border border-berry-200 text-berry-900 font-bold text-xs py-3 rounded-full" onclick="backToBookingForm()" type="button">Kembali &amp; Edit</button><p class="text-[11px] text-berry-900/60">Tidak ada pembayaran otomatis atau konfirmasi booking otomatis.</p></div>
</div>
</div>
 LIGHTBOX MODAL FOR GALLERY 
<div class="fixed inset-0 z-50 bg-black/80 backdrop-blur-md hidden items-center justify-center p-4" id="lightbox-modal" onclick="closeLightbox()">
<div class="relative max-w-4xl w-full" onclick="event.stopPropagation()">
<button class="absolute -top-10 right-0 text-white hover:text-berry-200" onclick="closeLightbox()">
<i class="w-8 h-8" data-lucide="x"></i>
</button>
<img alt="Zoom Preview" class="w-full h-auto max-h-[80vh] object-contain rounded-2xl shadow-2xl" id="lightbox-img" src=""/>
<p class="text-center text-white font-serif-title text-base mt-4 font-semibold" id="lightbox-caption"></p>
</div>
</div>
 JAVASCRIPT LOGIC & INTERACTION 


<script src="https://unpkg.com/lucide@latest"></script>
<script src="{{ asset('js/website-bisnis/templates/sports-fitness/pilates-studio/strawberry-fizz/strawberry-fizz.js') }}"></script>
</body></html>
