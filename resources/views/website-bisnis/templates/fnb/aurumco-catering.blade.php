@verbatim
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AURUM & CO. | Haute Gastronomie & Bespoke Atelier</title>
  
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;0,700;1,400;1,600&family=Plus+Jakarta+Sans:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
  
  <!-- FontAwesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  
  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      darkMode: 'class',
      theme: {
        extend: {
          colors: {
            obsidian: '#090a0f',
            charcoal: '#111319',
            graphite: '#191c24',
            gold: {
              300: '#f5e298',
              400: '#e5c365',
              500: '#d4af37',
              600: '#b89428',
              700: '#8e7118'
            },
            alabaster: '#fbf9f5',
            sand: '#e8e2d5',
            muted: '#8b919e'
          },
          fontFamily: {
            serif: ['"Cormorant Garamond"', 'serif'],
            sans: ['"Plus Jakarta Sans"', 'sans-serif'],
          },
          backgroundImage: {
            'gold-shimmer': 'linear-gradient(135deg, #f5e298 0%, #d4af37 50%, #aa841e 100%)',
            'radial-vignette': 'radial-gradient(circle at center, rgba(212,175,55,0.08) 0%, rgba(9,10,15,0) 70%)'
          }
        }
      }
    }
  </script>

  <style>
    /* Custom Luxury Styling */
    ::selection {
      background-color: #d4af37;
      color: #090a0f;
    }
    
    /* Subtle editorial borders */
    .border-editorial {
      border-color: rgba(212, 175, 55, 0.18);
    }
    
    .gold-glow {
      box-shadow: 0 0 35px -5px rgba(212, 175, 55, 0.15);
    }
    
    .glass-dark {
      background: rgba(17, 19, 25, 0.72);
      backdrop-filter: blur(16px);
      -webkit-backdrop-filter: blur(16px);
    }

    /* Custom range slider thumb */
    input[type=range]::-webkit-slider-thumb {
      -webkit-appearance: none;
      height: 22px;
      width: 22px;
      border-radius: 50%;
      background: #d4af37;
      border: 3px solid #090a0f;
      cursor: pointer;
      box-shadow: 0 0 10px rgba(212, 175, 55, 0.6);
      transition: all 0.2s ease;
    }
    input[type=range]::-webkit-slider-thumb:hover {
      transform: scale(1.15);
      background: #f5e298;
    }

    /* Ambient noise background texture */
    .ambient-noise {
      background-image: radial-gradient(rgba(212, 175, 55, 0.03) 1px, transparent 0);
      background-size: 32px 32px;
    }
  </style>
</head>

<body class="bg-obsidian text-alabaster font-sans selection:bg-gold-500 selection:text-obsidian antialiased overflow-x-hidden ambient-noise">

  <!-- ================= NOTIFICATION TOAST ================= -->
  <div id="toast" class="fixed bottom-6 right-6 z-50 transform translate-y-32 opacity-0 transition-all duration-300 pointer-events-none flex items-center space-x-3 bg-charcoal border border-gold-500/40 text-alabaster px-5 py-4 rounded-xl shadow-2xl">
    <div class="w-8 h-8 rounded-full bg-gold-500/10 text-gold-400 flex items-center justify-center">
      <i class="fa-solid fa-check text-xs"></i>
    </div>
    <span id="toast-message" class="text-sm font-medium tracking-wide">Action executed successfully</span>
  </div>

  <!-- ================= TOP LUXURY STATUS BAR ================= -->
  <div class="w-full bg-charcoal/90 border-b border-editorial text-xs py-2 px-6 flex justify-between items-center text-muted">
    <div class="flex items-center space-x-4">
      <span class="inline-flex items-center gap-1.5 text-gold-400 font-medium tracking-wider">
        <span class="w-1.5 h-1.5 rounded-full bg-gold-400 animate-ping"></span>
        PRIVATE BOOKINGS OPEN
      </span>
      <span class="hidden md:inline text-neutral-500">|</span>
      <span class="hidden md:inline tracking-widest uppercase text-[10px]">Catering • Private Chef • Gala Production</span>
    </div>
    <div class="flex items-center space-x-6 text-[11px] tracking-wider">
      <span class="hover:text-gold-400 transition cursor-pointer" onclick="scrollToSection('architect')"><i class="fa-solid fa-calculator mr-1.5 text-gold-500"></i>Proposal Architect</span>
      <a href="tel:+6281234567890" class="hover:text-gold-400 transition"><i class="fa-solid fa-phone mr-1.5 text-gold-500"></i>Concierge Desk</a>
    </div>
  </div>

  <!-- ================= NAVIGATION ================= -->
  <nav class="sticky top-0 z-40 w-full glass-dark border-b border-white/5 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-6 lg:px-12 h-20 flex items-center justify-between">
      
      <!-- Brand Logo -->
      <a href="#" class="flex flex-col group">
        <span class="font-serif text-2xl lg:text-3xl tracking-[0.25em] font-light text-alabaster group-hover:text-gold-400 transition duration-300">AURUM &amp; CO.</span>
        <span class="text-[9px] tracking-[0.45em] uppercase text-gold-500 font-medium">Atelier Gastronomique</span>
      </a>

      <!-- Desktop Links -->
      <div class="hidden lg:flex items-center space-x-10 text-xs uppercase tracking-[0.2em] font-medium text-alabaster/80">
        <a href="#about" class="hover:text-gold-400 transition">Philosophy</a>
        <a href="#sensory-menus" class="hover:text-gold-400 transition">Sensory Menus</a>
        <a href="#dish-craft" class="hover:text-gold-400 transition">Culinary Craft</a>
        <a href="#architect" class="text-gold-400 hover:text-gold-300 flex items-center gap-1.5">
          <span class="w-1 h-1 bg-gold-400 rounded-full"></span> Experience Architect
        </a>
        <a href="#prestige" class="hover:text-gold-400 transition">Standards</a>
      </div>

      <!-- Action Button -->
      <div class="hidden sm:flex items-center space-x-4">
        <button onclick="openBookingModal()" class="relative px-6 py-2.5 rounded-full text-xs font-semibold uppercase tracking-[0.18em] text-obsidian bg-gold-shimmer hover:opacity-95 transition-all shadow-lg shadow-gold-500/10 hover:shadow-gold-500/25 active:scale-95">
          Reserve Event
        </button>
      </div>

      <!-- Mobile Hamburger -->
      <button onclick="toggleMobileMenu()" class="lg:hidden p-2 text-alabaster hover:text-gold-400 focus:outline-none" aria-label="Toggle navigation">
        <i id="menu-icon" class="fa-solid fa-bars text-xl"></i>
      </button>
    </div>

    <!-- Mobile Drawer -->
    <div id="mobile-menu" class="hidden lg:hidden px-6 pt-3 pb-8 glass-dark border-b border-editorial space-y-4 text-xs uppercase tracking-widest text-alabaster/80">
      <a href="#about" onclick="toggleMobileMenu()" class="block py-2 border-b border-white/5">Philosophy</a>
      <a href="#sensory-menus" onclick="toggleMobileMenu()" class="block py-2 border-b border-white/5">Sensory Menus</a>
      <a href="#dish-craft" onclick="toggleMobileMenu()" class="block py-2 border-b border-white/5">Culinary Craft</a>
      <a href="#architect" onclick="toggleMobileMenu()" class="block py-2 border-b border-white/5 text-gold-400">Experience Architect</a>
      <a href="#prestige" onclick="toggleMobileMenu()" class="block py-2 border-b border-white/5">Standards</a>
      <div class="pt-2">
        <button onclick="toggleMobileMenu(); openBookingModal();" class="w-full py-3 rounded-full text-xs font-semibold uppercase tracking-[0.2em] text-obsidian bg-gold-shimmer">
          Reserve Event
        </button>
      </div>
    </div>
  </nav>

  <!-- ================= HERO SECTION ================= -->
  <header class="relative min-h-[92vh] flex items-center justify-center overflow-hidden px-6">
    <!-- Atmospheric Background Layers -->
    <div class="absolute inset-0 z-0">
      <img src="https://images.unsplash.com/photo-1544025162-d76694265947?q=80&w=2000&auto=format&fit=crop" 
           alt="Haute Cuisine Plating" 
           class="w-full h-full object-cover object-center opacity-30 filter contrast-125 scale-105 transform hover:scale-100 transition-all duration-1000 ease-out"
           onerror="this.src='https://placehold.co/1920x1080/090a0f/d4af37?text=AURUM+Fine+Dining'">
      <div class="absolute inset-0 bg-gradient-to-t from-obsidian via-obsidian/75 to-transparent"></div>
      <div class="absolute inset-0 bg-gradient-to-r from-obsidian via-transparent to-obsidian"></div>
    </div>

    <div class="relative z-10 max-w-5xl mx-auto text-center flex flex-col items-center">
      
      <!-- Sub-headline Pill -->
      <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border border-gold-500/30 bg-charcoal/80 mb-8 backdrop-blur-md">
        <span class="w-1.5 h-1.5 rounded-full bg-gold-400"></span>
        <span class="text-[11px] tracking-[0.25em] uppercase text-sand font-medium">Avant-Garde Culinary Atelier</span>
      </div>

      <!-- Main Headline -->
      <h1 class="font-serif text-4xl sm:text-6xl md:text-7xl lg:text-8xl font-normal tracking-tight text-alabaster leading-[1.08] mb-8">
        Gastronomy as <br>
        <span class="italic font-light bg-gradient-to-r from-gold-300 via-gold-400 to-amber-200 bg-clip-text text-transparent">Living Sculpture.</span>
      </h1>

      <p class="max-w-2xl text-sm sm:text-base md:text-lg text-sand/80 font-light leading-relaxed mb-10 tracking-wide">
        Transcending conventional banquet catering. Aurum &amp; Co. orchestrates bespoke multisensory culinary productions for high-society galas, private summits, and cinematic weddings.
      </p>

      <!-- CTA Buttons & Live Indicator -->
      <div class="flex flex-col sm:flex-row gap-4 w-full sm:w-auto items-center justify-center">
        <a href="#architect" class="w-full sm:w-auto px-8 py-4 rounded-full text-xs font-semibold uppercase tracking-[0.2em] text-obsidian bg-gold-shimmer hover:brightness-110 shadow-xl shadow-gold-500/20 transition-all text-center">
          Design Tasting Itinerary
        </a>
        <a href="#sensory-menus" class="w-full sm:w-auto px-8 py-4 rounded-full text-xs font-medium uppercase tracking-[0.2em] text-alabaster border border-white/20 hover:border-gold-400/60 hover:bg-white/5 transition-all text-center">
          Explore Curation
        </a>
      </div>

      <!-- Key Accreditations Strip -->
      <div class="mt-16 pt-8 border-t border-white/10 w-full grid grid-cols-2 md:grid-cols-4 gap-6 text-center text-xs tracking-widest uppercase text-muted">
        <div>
          <span class="block font-serif text-2xl text-gold-400 mb-1">100%</span>
          <span>Artisanal Traceability</span>
        </div>
        <div>
          <span class="block font-serif text-2xl text-gold-400 mb-1">Grade-A</span>
          <span>Halal Certified</span>
        </div>
        <div>
          <span class="block font-serif text-2xl text-gold-400 mb-1">1:4</span>
          <span>Server to Guest Ratio</span>
        </div>
        <div>
          <span class="block font-serif text-2xl text-gold-400 mb-1">Michelin</span>
          <span>Trained Chef Collective</span>
        </div>
      </div>
    </div>
  </header>

  <!-- ================= BRAND PHILOSOPHY / EDITORIAL ================= -->
  <section id="about" class="py-24 px-6 border-y border-editorial relative bg-charcoal/40">
    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
      
      <div class="lg:col-span-5 space-y-6">
        <div class="text-[11px] uppercase tracking-[0.3em] text-gold-500 font-semibold">The Manifesto</div>
        <h2 class="font-serif text-3xl sm:text-5xl font-light leading-snug">
          Where culinary precision meets theatrical grace.
        </h2>
        <p class="text-sm text-sand/80 leading-relaxed font-light">
          We reject predictable chafing dishes and generic buffet arrangements. In every banquet we curate, every single plate is executed with temperature-controlled precision, bespoke stoneware, and intentional narrative arcs.
        </p>
        <div class="space-y-4 pt-4 text-xs font-light tracking-wide text-sand/90">
          <div class="flex items-start gap-4">
            <span class="w-5 h-5 rounded-full bg-gold-500/10 text-gold-400 flex items-center justify-center shrink-0 mt-0.5">✦</span>
            <div><strong class="font-semibold text-alabaster tracking-wider uppercase text-[11px]">Bespoke Crockery:</strong> Hand-thrown Japanese ceramic plates and hand-cut crystal stemware matched to your event aesthetic.</div>
          </div>
          <div class="flex items-start gap-4">
            <span class="w-5 h-5 rounded-full bg-gold-500/10 text-gold-400 flex items-center justify-center shrink-0 mt-0.5">✦</span>
            <div><strong class="font-semibold text-alabaster tracking-wider uppercase text-[11px]">Zero-Waste Harvest:</strong> Hyper-local sourcing directly from private organic orchards and sustainable highland farms.</div>
          </div>
        </div>
      </div>

      <div class="lg:col-span-7 grid grid-cols-2 gap-4">
        <div class="space-y-4">
          <div class="h-64 sm:h-80 rounded-2xl overflow-hidden relative border border-editorial group">
            <img src="https://images.unsplash.com/photo-1551218808-94e220e084d2?q=80&w=800&auto=format&fit=crop" 
                 alt="Chef finishing dish" 
                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
            <div class="absolute inset-0 bg-gradient-to-t from-obsidian/90 via-transparent to-transparent flex items-end p-6">
              <span class="text-xs uppercase tracking-widest font-mono text-gold-400">Micro-Plating Craft</span>
            </div>
          </div>
          <div class="p-6 rounded-2xl bg-graphite/40 border border-editorial">
            <span class="text-2xl font-serif text-gold-400">4,800+</span>
            <p class="text-xs text-muted mt-1 uppercase tracking-wider">Palates enchanted across private galas</p>
          </div>
        </div>
        <div class="space-y-4 pt-8">
          <div class="p-6 rounded-2xl bg-graphite/40 border border-editorial">
            <span class="text-2xl font-serif text-gold-400">100% Custom</span>
            <p class="text-xs text-muted mt-1 uppercase tracking-wider">No two menus ever duplicated</p>
          </div>
          <div class="h-64 sm:h-80 rounded-2xl overflow-hidden relative border border-editorial group">
            <img src="https://images.unsplash.com/photo-1510812431401-41d2bd2722f3?q=80&w=800&auto=format&fit=crop" 
                 alt="Sommelier and Wine pairing" 
                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
            <div class="absolute inset-0 bg-gradient-to-t from-obsidian/90 via-transparent to-transparent flex items-end p-6">
              <span class="text-xs uppercase tracking-widest font-mono text-gold-400">Sommelier Harmonization</span>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>

  <!-- ================= SENSORY MENU EXPERIENCES ================= -->
  <section id="sensory-menus" class="py-24 px-6 max-w-7xl mx-auto">
    <div class="flex flex-col md:flex-row md:items-end justify-between mb-16">
      <div>
        <span class="text-[11px] uppercase tracking-[0.3em] text-gold-500 font-semibold block mb-2">Curated Collections</span>
        <h2 class="font-serif text-3xl sm:text-5xl font-light">Sensory Menu Tiers</h2>
      </div>
      <p class="text-xs md:text-sm text-muted max-w-md mt-4 md:mt-0 font-light">
        Choose an intentional culinary progression or work directly with our master chef to create an unprecedented bespoke signature.
      </p>
    </div>

    <!-- Category Filters -->
    <div class="flex flex-wrap gap-2 mb-10 pb-2 border-b border-white/5">
      <button onclick="filterMenus('all', this)" class="menu-filter-btn px-5 py-2.5 rounded-full text-xs uppercase tracking-widest bg-gold-500 text-obsidian font-semibold transition">
        All Editions
      </button>
      <button onclick="filterMenus('gala', this)" class="menu-filter-btn px-5 py-2.5 rounded-full text-xs uppercase tracking-widest bg-charcoal text-sand/80 hover:text-gold-400 border border-white/10 transition">
        The Monolith (Seated)
      </button>
      <button onclick="filterMenus('buffet', this)" class="menu-filter-btn px-5 py-2.5 rounded-full text-xs uppercase tracking-widest bg-charcoal text-sand/80 hover:text-gold-400 border border-white/10 transition">
        Haute Couture Buffet
      </button>
      <button onclick="filterMenus('canapes', this)" class="menu-filter-btn px-5 py-2.5 rounded-full text-xs uppercase tracking-widest bg-charcoal text-sand/80 hover:text-gold-400 border border-white/10 transition">
        Nocturne Canapés
      </button>
      <button onclick="filterMenus('heritage', this)" class="menu-filter-btn px-5 py-2.5 rounded-full text-xs uppercase tracking-widest bg-charcoal text-sand/80 hover:text-gold-400 border border-white/10 transition">
        Imperial Rijsttafel
      </button>
    </div>

    <!-- Menu Cards Grid -->
    <div id="menus-container" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      
      <!-- Card 1 -->
      <div class="menu-card rounded-2xl bg-charcoal/70 border border-editorial overflow-hidden flex flex-col justify-between group hover:border-gold-500/50 transition-all duration-300" data-cat="gala">
        <div>
          <div class="relative h-60 overflow-hidden">
            <img src="https://images.unsplash.com/photo-1544025162-d76694265947?q=80&w=800&auto=format&fit=crop" 
                 alt="The Monolith Tasting" 
                 class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
            <div class="absolute top-4 left-4 bg-obsidian/80 backdrop-blur-md px-3 py-1 rounded-full border border-gold-500/30 text-[10px] uppercase tracking-widest text-gold-400">
              7-Course Plated
            </div>
            <div class="absolute bottom-4 right-4 bg-obsidian/85 px-3 py-1 rounded-lg text-xs font-serif text-alabaster">
              IDR 1.450.000 <span class="text-[10px] font-sans text-muted">/ pax</span>
            </div>
          </div>
          <div class="p-6">
            <h3 class="font-serif text-2xl font-light text-alabaster group-hover:text-gold-400 transition">The Monolith Symphony</h3>
            <p class="text-xs text-sand/70 mt-2 leading-relaxed">
              Full sensory sit-down protocol. Includes Wagyu A5 marble tenderloin, butter-poached slipper lobster, and gold-dusted dark Valrhona sphere.
            </p>
            <ul class="mt-6 space-y-2 text-[11px] text-muted border-t border-white/5 pt-4">
              <li class="flex items-center gap-2"><i class="fa-solid fa-check text-gold-500 text-[10px]"></i> Dedicated Butler for every 6 guests</li>
              <li class="flex items-center gap-2"><i class="fa-solid fa-check text-gold-500 text-[10px]"></i> Molecular amuse-bouche live show</li>
              <li class="flex items-center gap-2"><i class="fa-solid fa-check text-gold-500 text-[10px]"></i> Bespoke letterpress printed menus</li>
            </ul>
          </div>
        </div>
        <div class="p-6 pt-0">
          <button onclick="selectPackageForArchitect('The Monolith Symphony', 1450000, '7-Course Royal Heritage')" class="w-full py-2.5 rounded-xl border border-gold-500/40 text-xs font-medium uppercase tracking-widest hover:bg-gold-500 hover:text-obsidian transition duration-300">
            Select in Architect
          </button>
        </div>
      </div>

      <!-- Card 2 -->
      <div class="menu-card rounded-2xl bg-charcoal/70 border border-editorial overflow-hidden flex flex-col justify-between group hover:border-gold-500/50 transition-all duration-300" data-cat="buffet">
        <div>
          <div class="relative h-60 overflow-hidden">
            <img src="https://images.unsplash.com/photo-1555244162-803834f70033?q=80&w=800&auto=format&fit=crop" 
                 alt="Buffet Haute Couture" 
                 class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
            <div class="absolute top-4 left-4 bg-obsidian/80 backdrop-blur-md px-3 py-1 rounded-full border border-gold-500/30 text-[10px] uppercase tracking-widest text-gold-400">
              Live Artisanal Island
            </div>
            <div class="absolute bottom-4 right-4 bg-obsidian/85 px-3 py-1 rounded-lg text-xs font-serif text-alabaster">
              IDR 850.000 <span class="text-[10px] font-sans text-muted">/ pax</span>
            </div>
          </div>
          <div class="p-6">
            <h3 class="font-serif text-2xl font-light text-alabaster group-hover:text-gold-400 transition">Buffet Haute Couture</h3>
            <p class="text-xs text-sand/70 mt-2 leading-relaxed">
              Curated architectural buffet stations featuring live carving rotisserie, cold seafood raw bar on carved ice, and customized artisanal sides.
            </p>
            <ul class="mt-6 space-y-2 text-[11px] text-muted border-t border-white/5 pt-4">
              <li class="flex items-center gap-2"><i class="fa-solid fa-check text-gold-500 text-[10px]"></i> 3 Live chef interactive carving stations</li>
              <li class="flex items-center gap-2"><i class="fa-solid fa-check text-gold-500 text-[10px]"></i> Artisan marble buffet risers & floral styling</li>
              <li class="flex items-center gap-2"><i class="fa-solid fa-check text-gold-500 text-[10px]"></i> Unlimited infusion mixology bar</li>
            </ul>
          </div>
        </div>
        <div class="p-6 pt-0">
          <button onclick="selectPackageForArchitect('Buffet Haute Couture', 850000, '5-Course Sensory')" class="w-full py-2.5 rounded-xl border border-gold-500/40 text-xs font-medium uppercase tracking-widest hover:bg-gold-500 hover:text-obsidian transition duration-300">
            Select in Architect
          </button>
        </div>
      </div>

      <!-- Card 3 -->
      <div class="menu-card rounded-2xl bg-charcoal/70 border border-editorial overflow-hidden flex flex-col justify-between group hover:border-gold-500/50 transition-all duration-300" data-cat="canapes">
        <div>
          <div class="relative h-60 overflow-hidden">
            <img src="https://images.unsplash.com/photo-1541544741938-0af808871cc0?q=80&w=800&auto=format&fit=crop" 
                 alt="Nocturne Canapes" 
                 class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
            <div class="absolute top-4 left-4 bg-obsidian/80 backdrop-blur-md px-3 py-1 rounded-full border border-gold-500/30 text-[10px] uppercase tracking-widest text-gold-400">
              Cocktail &amp; Passes
            </div>
            <div class="absolute bottom-4 right-4 bg-obsidian/85 px-3 py-1 rounded-lg text-xs font-serif text-alabaster">
              IDR 550.000 <span class="text-[10px] font-sans text-muted">/ pax</span>
            </div>
          </div>
          <div class="p-6">
            <h3 class="font-serif text-2xl font-light text-alabaster group-hover:text-gold-400 transition">Nocturne &amp; Mixology</h3>
            <p class="text-xs text-sand/70 mt-2 leading-relaxed">
              Intimate evening reception with 12 rotating passed bite-sized gourmet canapés, smoked mocktails, and nitro-frozen dessert spoons.
            </p>
            <ul class="mt-6 space-y-2 text-[11px] text-muted border-t border-white/5 pt-4">
              <li class="flex items-center gap-2"><i class="fa-solid fa-check text-gold-500 text-[10px]"></i> 12 Signature micro-canapés passes</li>
              <li class="flex items-center gap-2"><i class="fa-solid fa-check text-gold-500 text-[10px]"></i> Flair mixologist station with craft botanical tonics</li>
              <li class="flex items-center gap-2"><i class="fa-solid fa-check text-gold-500 text-[10px]"></i> Ideal for art exhibitions & luxury launches</li>
            </ul>
          </div>
        </div>
        <div class="p-6 pt-0">
          <button onclick="selectPackageForArchitect('Nocturne & Mixology', 550000, '3-Course Executive')" class="w-full py-2.5 rounded-xl border border-gold-500/40 text-xs font-medium uppercase tracking-widest hover:bg-gold-500 hover:text-obsidian transition duration-300">
            Select in Architect
          </button>
        </div>
      </div>

      <!-- Card 4 -->
      <div class="menu-card rounded-2xl bg-charcoal/70 border border-editorial overflow-hidden flex flex-col justify-between group hover:border-gold-500/50 transition-all duration-300" data-cat="heritage">
        <div>
          <div class="relative h-60 overflow-hidden">
            <img src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?q=80&w=800&auto=format&fit=crop" 
                 alt="Imperial Rijsttafel" 
                 class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
            <div class="absolute top-4 left-4 bg-obsidian/80 backdrop-blur-md px-3 py-1 rounded-full border border-gold-500/30 text-[10px] uppercase tracking-widest text-gold-400">
              Heritage Modernist
            </div>
            <div class="absolute bottom-4 right-4 bg-obsidian/85 px-3 py-1 rounded-lg text-xs font-serif text-alabaster">
              IDR 980.000 <span class="text-[10px] font-sans text-muted">/ pax</span>
            </div>
          </div>
          <div class="p-6">
            <h3 class="font-serif text-2xl font-light text-alabaster group-hover:text-gold-400 transition">Imperial Archipelago</h3>
            <p class="text-xs text-sand/70 mt-2 leading-relaxed">
              Centuries-old royal Indonesian culinary manuscripts re-interpreted through modern French culinary techniques: 48-hour slow braised Rendang Wagyu.
            </p>
            <ul class="mt-6 space-y-2 text-[11px] text-muted border-t border-white/5 pt-4">
              <li class="flex items-center gap-2"><i class="fa-solid fa-check text-gold-500 text-[10px]"></i> Heirloom spices directly from Banda Islands</li>
              <li class="flex items-center gap-2"><i class="fa-solid fa-check text-gold-500 text-[10px]"></i> Traditional brass warming serviceware</li>
              <li class="flex items-center gap-2"><i class="fa-solid fa-check text-gold-500 text-[10px]"></i> Handcrafted sambal tasting flight</li>
            </ul>
          </div>
        </div>
        <div class="p-6 pt-0">
          <button onclick="selectPackageForArchitect('Imperial Archipelago', 980000, '5-Course Sensory')" class="w-full py-2.5 rounded-xl border border-gold-500/40 text-xs font-medium uppercase tracking-widest hover:bg-gold-500 hover:text-obsidian transition duration-300">
            Select in Architect
          </button>
        </div>
      </div>

    </div>
  </section>

  <!-- ================= EDITORIAL DISH GALLERY & CRAFTSMANSHIP ================= -->
  <section id="dish-craft" class="py-24 px-6 border-t border-editorial bg-charcoal/30">
    <div class="max-w-7xl mx-auto">
      <div class="text-center max-w-2xl mx-auto mb-16">
        <span class="text-[11px] uppercase tracking-[0.3em] text-gold-500 font-semibold block mb-2">Microscopic Precision</span>
        <h2 class="font-serif text-3xl sm:text-5xl font-light">The Atelier Gallery</h2>
        <p class="text-xs sm:text-sm text-muted mt-4">
          Click any signature creation below to inspect the culinary breakdown, tasting notes, and harmonic pairings.
        </p>
      </div>

      <!-- Dish Mosaic -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        
        <!-- Dish 1 -->
        <div onclick="openDishModal(0)" class="cursor-pointer group relative rounded-2xl overflow-hidden border border-editorial h-96">
          <img src="https://images.unsplash.com/photo-1544025162-d76694265947?q=80&w=800&auto=format&fit=crop" 
               alt="A5 Wagyu Glaze" 
               class="w-full h-full object-cover group-hover:scale-105 transition duration-700">
          <div class="absolute inset-0 bg-gradient-to-t from-obsidian via-obsidian/40 to-transparent flex flex-col justify-end p-6">
            <span class="text-[10px] uppercase font-mono tracking-widest text-gold-400 mb-1">Entrée Signature</span>
            <h4 class="font-serif text-2xl text-alabaster">A5 Miyazaki Beef &amp; Fermented Black Garlic</h4>
            <p class="text-xs text-sand/70 mt-1 line-clamp-1">Truffled bone marrow emulsion, charred baby leek veil.</p>
            <div class="mt-4 flex items-center justify-between text-[11px] text-gold-400 font-medium">
              <span>Inspect Profile →</span>
              <span class="border border-gold-400/40 px-2 py-0.5 rounded text-[9px] uppercase">Halal Grade A</span>
            </div>
          </div>
        </div>

        <!-- Dish 2 -->
        <div onclick="openDishModal(1)" class="cursor-pointer group relative rounded-2xl overflow-hidden border border-editorial h-96">
          <img src="https://images.unsplash.com/photo-1534422298391-e4f8c172dddb?q=80&w=800&auto=format&fit=crop" 
               alt="Hokkaido Scallop" 
               class="w-full h-full object-cover group-hover:scale-105 transition duration-700">
          <div class="absolute inset-0 bg-gradient-to-t from-obsidian via-obsidian/40 to-transparent flex flex-col justify-end p-6">
            <span class="text-[10px] uppercase font-mono tracking-widest text-gold-400 mb-1">Cold Amuse</span>
            <h4 class="font-serif text-2xl text-alabaster">Wild Hokkaido Scallop Tartare</h4>
            <p class="text-xs text-sand/70 mt-1 line-clamp-1">Kaluga caviar pearls, yuzu ponzu gel, sea fennel.</p>
            <div class="mt-4 flex items-center justify-between text-[11px] text-gold-400 font-medium">
              <span>Inspect Profile →</span>
              <span class="border border-gold-400/40 px-2 py-0.5 rounded text-[9px] uppercase">Seafood Raw</span>
            </div>
          </div>
        </div>

        <!-- Dish 3 -->
        <div onclick="openDishModal(2)" class="cursor-pointer group relative rounded-2xl overflow-hidden border border-editorial h-96">
          <img src="https://images.unsplash.com/photo-1587314168485-3236d6710814?q=80&w=800&auto=format&fit=crop" 
               alt="Golden Valrhona Sphere" 
               class="w-full h-full object-cover group-hover:scale-105 transition duration-700">
          <div class="absolute inset-0 bg-gradient-to-t from-obsidian via-obsidian/40 to-transparent flex flex-col justify-end p-6">
            <span class="text-[10px] uppercase font-mono tracking-widest text-gold-400 mb-1">Sensory Climax</span>
            <h4 class="font-serif text-2xl text-alabaster">The 24K Obsidian Valrhona Orb</h4>
            <p class="text-xs text-sand/70 mt-1 line-clamp-1">Smoked vanilla bean foam, liquid passionfruit heart.</p>
            <div class="mt-4 flex items-center justify-between text-[11px] text-gold-400 font-medium">
              <span>Inspect Profile →</span>
              <span class="border border-gold-400/40 px-2 py-0.5 rounded text-[9px] uppercase">Gold Leaf Pastry</span>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ================= BESPOKE EXPERIENCE ARCHITECT (INTERACTIVE TOOL) ================= -->
  <section id="architect" class="py-24 px-6 relative bg-gradient-to-b from-charcoal/80 to-obsidian border-b border-editorial">
    <div class="max-w-6xl mx-auto">
      
      <div class="text-center max-w-3xl mx-auto mb-16">
        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full border border-gold-500/40 bg-gold-500/10 text-gold-400 text-[10px] tracking-widest uppercase mb-4">
          <i class="fa-solid fa-wand-magic-sparkles"></i> Interactive Proposal Engine
        </div>
        <h2 class="font-serif text-3xl sm:text-5xl font-light">Culinary Bespoke Experience Architect</h2>
        <p class="text-xs sm:text-sm text-sand/70 mt-3 font-light">
          Calibrate your event typology, guest scale, and service structure to generate real-time cost models and customized tasting itineraries instantly.
        </p>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start">
        
        <!-- Controls Column (Left) -->
        <div class="lg:col-span-7 bg-charcoal/90 p-8 rounded-3xl border border-editorial gold-glow space-y-8">
          
          <!-- Step 1: Event Type Selection -->
          <div>
            <label class="block text-xs uppercase tracking-widest text-gold-400 font-semibold mb-3">1. Select Occasion Typology</label>
            <div class="grid grid-cols-2 sm:grid-cols-2 gap-3" id="occasion-grid">
              <button onclick="setOccasion('Gala Dinner', 1.0, this)" class="occasion-btn text-left p-3.5 rounded-xl border border-gold-500 bg-gold-500/10 text-alabaster transition">
                <span class="block text-xs font-semibold">Gala Dinner</span>
                <span class="text-[10px] text-muted">Black-tie, formal plated</span>
              </button>
              <button onclick="setOccasion('Private Soirée', 1.15, this)" class="occasion-btn text-left p-3.5 rounded-xl border border-white/10 hover:border-gold-500/50 bg-graphite/40 text-alabaster transition">
                <span class="block text-xs font-semibold">Private Villa Soirée</span>
                <span class="text-[10px] text-muted">Intimate private estate</span>
              </button>
              <button onclick="setOccasion('Avant-Garde Wedding', 1.2, this)" class="occasion-btn text-left p-3.5 rounded-xl border border-white/10 hover:border-gold-500/50 bg-graphite/40 text-alabaster transition">
                <span class="block text-xs font-semibold">Haute Wedding</span>
                <span class="text-[10px] text-muted">Luxury celebration &amp; banquet</span>
              </button>
              <button onclick="setOccasion('Corporate Summit', 0.95, this)" class="occasion-btn text-left p-3.5 rounded-xl border border-white/10 hover:border-gold-500/50 bg-graphite/40 text-alabaster transition">
                <span class="block text-xs font-semibold">Corporate Summit</span>
                <span class="text-[10px] text-muted">Executive networking dinner</span>
              </button>
            </div>
          </div>

          <!-- Step 2: Guest Count Range Slider -->
          <div>
            <div class="flex justify-between items-center mb-3">
              <label class="text-xs uppercase tracking-widest text-gold-400 font-semibold">2. Guest Capacity</label>
              <span class="font-serif text-2xl text-alabaster"><span id="guest-count-val">120</span> <span class="text-xs font-sans text-muted">Invited Guests</span></span>
            </div>
            <input id="guest-slider" type="range" min="20" max="600" step="10" value="120" oninput="updateGuestCount(this.value)" class="w-full h-1.5 bg-graphite rounded-lg appearance-none cursor-pointer">
            <div class="flex justify-between text-[10px] text-muted mt-2 font-mono">
              <span>20 (Boutique)</span>
              <span>150 (Mid-Gala)</span>
              <span>600+ (Grand Estate)</span>
            </div>
          </div>

          <!-- Step 3: Course Structure Selector -->
          <div>
            <label class="block text-xs uppercase tracking-widest text-gold-400 font-semibold mb-3">3. Course Sequence &amp; Service Format</label>
            <div class="space-y-3" id="course-selector">
              <label class="flex items-center justify-between p-3.5 rounded-xl border border-gold-500 bg-gold-500/10 cursor-pointer transition course-option">
                <div class="flex items-center space-x-3">
                  <input type="radio" name="course_struct" value="7-Course Royal Heritage" data-base-price="1450000" checked onchange="updateCourseSelection(this)" class="accent-gold-500">
                  <div>
                    <div class="text-xs font-semibold text-alabaster">7-Course Royal Heritage Plated</div>
                    <div class="text-[10px] text-muted">Full sensory gastronomic choreography with custom sommelier pairings</div>
                  </div>
                </div>
                <span class="text-xs font-mono text-gold-400">IDR 1.45M / pax</span>
              </label>

              <label class="flex items-center justify-between p-3.5 rounded-xl border border-white/10 hover:border-gold-500/50 bg-graphite/40 cursor-pointer transition course-option">
                <div class="flex items-center space-x-3">
                  <input type="radio" name="course_struct" value="5-Course Sensory" data-base-price="950000" onchange="updateCourseSelection(this)" class="accent-gold-500">
                  <div>
                    <div class="text-xs font-semibold text-alabaster">5-Course Contemporary Fine Dining</div>
                    <div class="text-[10px] text-muted">Balanced elegance for corporate honors and high-end receptions</div>
                  </div>
                </div>
                <span class="text-xs font-mono text-gold-400">IDR 950K / pax</span>
              </label>

              <label class="flex items-center justify-between p-3.5 rounded-xl border border-white/10 hover:border-gold-500/50 bg-graphite/40 cursor-pointer transition course-option">
                <div class="flex items-center space-x-3">
                  <input type="radio" name="course_struct" value="3-Course Executive" data-base-price="650000" onchange="updateCourseSelection(this)" class="accent-gold-500">
                  <div>
                    <div class="text-xs font-semibold text-alabaster">3-Course Atelier Express &amp; Canapé Reception</div>
                    <div class="text-[10px] text-muted">Focused, elevated culinary profile for high-tempo evenings</div>
                  </div>
                </div>
                <span class="text-xs font-mono text-gold-400">IDR 650K / pax</span>
              </label>
            </div>
          </div>

          <!-- Step 4: Add-On Curations (Checkboxes) -->
          <div>
            <label class="block text-xs uppercase tracking-widest text-gold-400 font-semibold mb-3">4. Atelier Enhancements</label>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
              <label class="flex items-center space-x-3 p-3 rounded-xl border border-white/5 bg-graphite/30 hover:border-gold-500/30 cursor-pointer">
                <input type="checkbox" id="addon-caviar" value="15000000" onchange="recalculateProposal()" class="accent-gold-500 rounded">
                <span class="text-xs text-sand/90">Kaluga Caviar &amp; Ice Bar (+15M)</span>
              </label>
              <label class="flex items-center space-x-3 p-3 rounded-xl border border-white/5 bg-graphite/30 hover:border-gold-500/30 cursor-pointer">
                <input type="checkbox" id="addon-mixology" value="9500000" onchange="recalculateProposal()" class="accent-gold-500 rounded">
                <span class="text-xs text-sand/90">Liquid Nitrogen Mixology (+9.5M)</span>
              </label>
              <label class="flex items-center space-x-3 p-3 rounded-xl border border-white/5 bg-graphite/30 hover:border-gold-500/30 cursor-pointer">
                <input type="checkbox" id="addon-sommelier" value="6500000" onchange="recalculateProposal()" class="accent-gold-500 rounded">
                <span class="text-xs text-sand/90">Chief Sommelier Presence (+6.5M)</span>
              </label>
              <label class="flex items-center space-x-3 p-3 rounded-xl border border-white/5 bg-graphite/30 hover:border-gold-500/30 cursor-pointer">
                <input type="checkbox" id="addon-ceramics" value="8000000" onchange="recalculateProposal()" class="accent-gold-500 rounded">
                <span class="text-xs text-sand/90">Artisanal Ceramic Tableware (+8M)</span>
              </label>
            </div>
          </div>

        </div>

        <!-- Live Proposal Document Card (Right) -->
        <div class="lg:col-span-5 sticky top-28 space-y-6">
          <div class="bg-charcoal p-8 rounded-3xl border border-gold-500/50 shadow-2xl relative overflow-hidden">
            <!-- Luxury watermark ornament -->
            <div class="absolute -right-10 -bottom-10 opacity-5 pointer-events-none text-9xl font-serif">
              A
            </div>

            <div class="border-b border-editorial pb-4 mb-6 flex justify-between items-start">
              <div>
                <span class="text-[9px] tracking-[0.3em] uppercase text-gold-500 font-mono">CONFIDENTIAL SPECIFICATION</span>
                <h3 class="font-serif text-2xl text-alabaster mt-1" id="preview-event-name">Gala Dinner Experience</h3>
              </div>
              <span class="text-[10px] font-mono text-muted bg-white/5 px-2.5 py-1 rounded">EST-2026</span>
            </div>

            <!-- Dynamic Specs List -->
            <div class="space-y-3 text-xs text-sand/80">
              <div class="flex justify-between py-1 border-b border-white/5">
                <span class="text-muted">Format:</span>
                <span class="font-medium text-alabaster" id="preview-format">7-Course Royal Heritage</span>
              </div>
              <div class="flex justify-between py-1 border-b border-white/5">
                <span class="text-muted">Headcount:</span>
                <span class="font-medium text-alabaster" id="preview-guests">120 Invited Guests</span>
              </div>
              <div class="flex justify-between py-1 border-b border-white/5">
                <span class="text-muted">Staff Allocation:</span>
                <span class="font-medium text-alabaster" id="preview-staff">30 Specialists (1:4 Ratio)</span>
              </div>
              <div class="flex justify-between py-1 border-b border-white/5">
                <span class="text-muted">Selected Addons:</span>
                <span class="font-medium text-gold-400" id="preview-addons-count">0 Enhancement Selected</span>
              </div>
            </div>

            <!-- Total Price Calculation -->
            <div class="mt-8 pt-6 border-t border-editorial">
              <div class="text-[10px] uppercase tracking-widest text-muted">Estimated Total Investment</div>
              <div class="font-serif text-3xl sm:text-4xl text-gold-400 font-normal mt-1" id="preview-total-price">
                IDR 174.000.000
              </div>
              <div class="text-[11px] text-muted mt-1">
                Approx. <span id="preview-per-guest" class="text-alabaster font-mono">IDR 1.450.000</span> per honored guest
              </div>
            </div>

            <!-- Interactive Actions -->
            <div class="mt-8 space-y-3">
              <button onclick="openBookingFromArchitect()" class="w-full py-4 rounded-xl text-xs font-semibold uppercase tracking-[0.2em] text-obsidian bg-gold-shimmer hover:opacity-95 shadow-lg shadow-gold-500/20 transition-all flex items-center justify-center gap-2">
                <i class="fa-solid fa-file-signature"></i> Finalize &amp; Lock Itinerary
              </button>
              
              <button onclick="copyProposalSummary()" class="w-full py-3 rounded-xl text-xs font-medium uppercase tracking-[0.15em] text-alabaster border border-white/10 hover:border-gold-500/40 bg-white/5 transition flex items-center justify-center gap-2">
                <i class="fa-regular fa-copy"></i> Copy Itinerary Blueprint
              </button>
            </div>

            <p class="text-[10px] text-center text-muted/70 mt-4 leading-relaxed">
              *Tasting preview session for 4 principals included upon formal reservation deposit.
            </p>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ================= PRESTIGE PROOF & STANDARDS ================= -->
  <section id="prestige" class="py-24 px-6 border-b border-editorial bg-charcoal/30">
    <div class="max-w-7xl mx-auto">
      
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
        <div class="p-8 rounded-2xl bg-charcoal border border-editorial">
          <div class="w-10 h-10 rounded-full bg-gold-500/10 text-gold-400 flex items-center justify-center text-lg mb-6">
            <i class="fa-solid fa-ribbon"></i>
          </div>
          <h4 class="font-serif text-xl text-alabaster mb-2">Grade-A Halal Certified</h4>
          <p class="text-xs text-muted leading-relaxed font-light">
            All livestock, poultry, and ingredients undergo strict certified halal processing standards without compromising haute cuisine presentation.
          </p>
        </div>

        <div class="p-8 rounded-2xl bg-charcoal border border-editorial">
          <div class="w-10 h-10 rounded-full bg-gold-500/10 text-gold-400 flex items-center justify-center text-lg mb-6">
            <i class="fa-solid fa-leaf"></i>
          </div>
          <h4 class="font-serif text-xl text-alabaster mb-2">Highland Farm Traceability</h4>
          <p class="text-xs text-muted leading-relaxed font-light">
            Micro-herbs, heirloom vegetables, and organic dairy are harvested within 24 hours of event plating from private partner elevations.
          </p>
        </div>

        <div class="p-8 rounded-2xl bg-charcoal border border-editorial">
          <div class="w-10 h-10 rounded-full bg-gold-500/10 text-gold-400 flex items-center justify-center text-lg mb-6">
            <i class="fa-solid fa-temperature-arrow-up"></i>
          </div>
          <h4 class="font-serif text-xl text-alabaster mb-2">Mobile Induction Guild</h4>
          <p class="text-xs text-muted leading-relaxed font-light">
            We deploy complete Swiss-engineered mobile induction kitchens to guarantee every entrée is plated at the exact optimal service temperature.
          </p>
        </div>
      </div>

      <!-- Marquee of Notable Patronage -->
      <div class="pt-8 border-t border-white/5 text-center">
        <span class="text-[10px] uppercase tracking-[0.35em] text-muted/70 block mb-8">Trusted By Private Galas &amp; Diplomatic Enclaves</span>
        <div class="flex flex-wrap items-center justify-center gap-10 md:gap-16 opacity-45 grayscale hover:grayscale-0 transition duration-500 text-xs tracking-widest font-serif">
          <span>THE KINSHIP GALA</span>
          <span>VALERIUS HERITAGE</span>
          <span>AETHEL GARDEN SUMMIT</span>
          <span>EMBASSY DIPLOMATIC BALL</span>
          <span>VOGUE ARTIFACTS</span>
        </div>
      </div>

    </div>
  </section>

  <!-- ================= FOOTER ================= -->
  <footer class="py-16 px-6 bg-obsidian text-muted text-xs border-t border-white/5">
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center gap-8">
      <div>
        <span class="font-serif text-xl text-alabaster tracking-widest block">AURUM &amp; CO.</span>
        <span class="text-[10px] tracking-widest uppercase text-gold-500">Atelier Haute Cuisine Indonesia</span>
      </div>

      <div class="flex space-x-8 text-[11px] uppercase tracking-widest">
        <a href="#about" class="hover:text-gold-400">Philosophy</a>
        <a href="#sensory-menus" class="hover:text-gold-400">Menus</a>
        <a href="#architect" class="hover:text-gold-400">Architect</a>
        <a href="#" onclick="openBookingModal()" class="hover:text-gold-400">Concierge</a>
      </div>

      <div class="text-[11px] text-neutral-500 text-center md:text-right">
        © 2026 Aurum &amp; Co. Atelier. All rights reserved. <br>
        Curated for private estates and luxury productions.
      </div>
    </div>
  </footer>

  <!-- ================= DISH DETAILS MODAL ================= -->
  <div id="dish-modal" class="fixed inset-0 z-50 bg-obsidian/85 backdrop-blur-md hidden items-center justify-center p-4">
    <div class="bg-charcoal border border-editorial max-w-2xl w-full rounded-3xl overflow-hidden shadow-2xl relative transform transition-all">
      <button onclick="closeDishModal()" class="absolute top-4 right-4 z-10 w-9 h-9 rounded-full bg-obsidian/70 text-alabaster hover:text-gold-400 flex items-center justify-center border border-white/10">
        <i class="fa-solid fa-xmark"></i>
      </button>

      <div class="h-64 relative">
        <img id="modal-dish-img" src="" alt="Dish Detail" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-t from-charcoal via-transparent to-transparent"></div>
      </div>

      <div class="p-8 space-y-4">
        <div class="flex justify-between items-center">
          <span id="modal-dish-tag" class="text-[10px] font-mono tracking-widest uppercase text-gold-400 bg-gold-500/10 px-3 py-1 rounded-full border border-gold-500/20"></span>
          <span id="modal-dish-pairing" class="text-xs text-muted"></span>
        </div>

        <h3 id="modal-dish-title" class="font-serif text-3xl text-alabaster"></h3>
        <p id="modal-dish-story" class="text-xs sm:text-sm text-sand/80 leading-relaxed font-light"></p>

        <div class="pt-4 border-t border-white/5 grid grid-cols-2 gap-4 text-xs">
          <div>
            <span class="block text-muted text-[10px] uppercase tracking-wider mb-1">Palate Architecture</span>
            <span id="modal-dish-notes" class="text-alabaster font-light"></span>
          </div>
          <div>
            <span class="block text-muted text-[10px] uppercase tracking-wider mb-1">Catering Logistics</span>
            <span id="modal-dish-logistics" class="text-alabaster font-light"></span>
          </div>
        </div>

        <div class="pt-4">
          <button onclick="closeDishModal(); scrollToSection('architect');" class="w-full py-3 rounded-xl bg-gold-shimmer text-obsidian text-xs font-semibold uppercase tracking-widest hover:brightness-105">
            Include This Profile in Your Proposal
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- ================= BESPOKE RESERVATION & WHATSAPP MODAL ================= -->
  <div id="booking-modal" class="fixed inset-0 z-50 bg-obsidian/90 backdrop-blur-md hidden items-center justify-center p-4">
    <div class="bg-charcoal border border-editorial max-w-xl w-full rounded-3xl p-8 shadow-2xl relative">
      <button onclick="closeBookingModal()" class="absolute top-5 right-5 text-muted hover:text-alabaster">
        <i class="fa-solid fa-xmark text-lg"></i>
      </button>

      <div class="mb-6">
        <span class="text-[10px] uppercase tracking-[0.3em] text-gold-500 font-semibold block">VIP Private Desk</span>
        <h3 class="font-serif text-2xl sm:text-3xl text-alabaster mt-1">Reserve Your Date &amp; Tasting</h3>
        <p class="text-xs text-muted mt-2 font-light">
          Submit your event particulars. Our Executive Concierge will generate an official dossier and connect directly via WhatsApp within 2 hours.
        </p>
      </div>

      <form id="reservation-form" onsubmit="handleReservationSubmit(event)" class="space-y-4 text-xs">
        <div>
          <label class="block text-muted uppercase tracking-wider text-[10px] mb-1">Full Name / Organization</label>
          <input type="text" id="res-name" required placeholder="e.g. Madame Clarissa Sutanto" class="w-full px-4 py-3 rounded-xl bg-graphite border border-white/10 text-alabaster focus:outline-none focus:border-gold-500 transition">
        </div>

        <div class="grid grid-cols-2 gap-3">
          <div>
            <label class="block text-muted uppercase tracking-wider text-[10px] mb-1">WhatsApp Contact</label>
            <input type="tel" id="res-wa" required placeholder="+62 812-xxxx-xxxx" class="w-full px-4 py-3 rounded-xl bg-graphite border border-white/10 text-alabaster focus:outline-none focus:border-gold-500 transition">
          </div>
          <div>
            <label class="block text-muted uppercase tracking-wider text-[10px] mb-1">Preferred Date</label>
            <input type="date" id="res-date" required class="w-full px-4 py-3 rounded-xl bg-graphite border border-white/10 text-alabaster focus:outline-none focus:border-gold-500 transition">
          </div>
        </div>

        <div>
          <label class="block text-muted uppercase tracking-wider text-[10px] mb-1">Event Venue / City</label>
          <input type="text" id="res-venue" required placeholder="e.g. Private Residence, Dharmawangsa / Bali Cliffside" class="w-full px-4 py-3 rounded-xl bg-graphite border border-white/10 text-alabaster focus:outline-none focus:border-gold-500 transition">
        </div>

        <!-- Proposal Snapshot Attached -->
        <div class="p-3.5 rounded-xl bg-graphite/60 border border-gold-500/30 text-[11px] text-sand space-y-1">
          <div class="flex justify-between font-medium">
            <span class="text-gold-400">Attached Specification:</span>
            <span id="res-summary-package">7-Course Plated (120 Guests)</span>
          </div>
          <div class="flex justify-between text-muted text-[10px]">
            <span>Estimated Total:</span>
            <span id="res-summary-cost" class="font-mono text-alabaster">IDR 174.000.000</span>
          </div>
        </div>

        <div>
          <label class="block text-muted uppercase tracking-wider text-[10px] mb-1">Dietary Restraints or Special Notes</label>
          <textarea id="res-notes" rows="2" placeholder="e.g. 10 guests pescatarian, gold cutlery requested, outdoor lawn setup" class="w-full px-4 py-2.5 rounded-xl bg-graphite border border-white/10 text-alabaster focus:outline-none focus:border-gold-500 transition"></textarea>
        </div>

        <button type="submit" class="w-full py-4 rounded-xl text-xs font-semibold uppercase tracking-[0.2em] text-obsidian bg-gold-shimmer hover:brightness-105 shadow-xl shadow-gold-500/20 transition flex items-center justify-center gap-2">
          <i class="fa-brands fa-whatsapp text-sm"></i> Send Instant WhatsApp Dossier
        </button>
      </form>
    </div>
  </div>

  <!-- ================= JAVASCRIPT LOGIC ================= -->
  <script>
    // State management for Culinary Architect
    let currentOccasion = 'Gala Dinner';
    let occasionMultiplier = 1.0;
    let currentGuests = 120;
    let selectedCourseName = '7-Course Royal Heritage';
    let selectedBasePrice = 1450000;

    // Dishes database for modal
    const dishes = [
      {
        title: "A5 Miyazaki Beef & Fermented Garlic Veil",
        tag: "Entrée Signature",
        image: "https://images.unsplash.com/photo-1544025162-d76694265947?q=80&w=800&auto=format&fit=crop",
        pairing: "Pairing: Royal Bordeaux Jus / Blackberry Shrub",
        story: "Each cut of A5 Japanese tenderloin is seared with binchotan charcoal for 18 seconds per face, then rested inside warm cedar smoking chests before being dressed with 100-day aged black garlic.",
        notes: "Rich umami, toasted caramel fat, delicate smoky finish.",
        logistics: "Mobile live induction grill with micro-hood filtration."
      },
      {
        title: "Wild Hokkaido Scallop & Kaluga Caviar",
        tag: "Cold Amuse Bouche",
        image: "https://images.unsplash.com/photo-1534422298391-e4f8c172dddb?q=80&w=800&auto=format&fit=crop",
        pairing: "Pairing: Clarified Sparkling Apple Yuzu",
        story: "Hand-harvested sea scallops diced within sub-zero marble vessels, kissed with cold-pressed lime leaf oil, finished with high-grade Kaluga hybrid caviar and sea fennel flowers.",
        notes: "Briny oceanic salinity balanced with bright citric acidity.",
        logistics: "Served on custom hand-carved frozen Himalayan salt disks."
      },
      {
        title: "The 24K Obsidian Valrhona Orb",
        tag: "Sensory Dessert Climax",
        image: "https://images.unsplash.com/photo-1587314168485-3236d6710814?q=80&w=800&auto=format&fit=crop",
        pairing: "Pairing: Smoked Espresso & Bergamot Elixir",
        story: "A delicate shell of 70% dark Valrhona Grand Cru chocolate painted in edible 24K gold leaf. Tableside warm spiced passionfruit ganache is poured by the butler to melt the sphere into an explosion of citrus.",
        notes: "Deep bitter chocolate crunch transitioning to tropical warmth.",
        logistics: "Interactive tableside hot pour by assigned waitstaff."
      }
    ];

    // Format IDR currency
    function formatCurrency(num) {
      return 'IDR ' + Math.round(num).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

    // Occasion Selection
    function setOccasion(name, multiplier, btnElement) {
      currentOccasion = name;
      occasionMultiplier = multiplier;
      
      const buttons = document.querySelectorAll('.occasion-btn');
      buttons.forEach(b => {
        b.classList.remove('border-gold-500', 'bg-gold-500/10');
        b.classList.add('border-white/10', 'bg-graphite/40');
      });

      btnElement.classList.add('border-gold-500', 'bg-gold-500/10');
      btnElement.classList.remove('border-white/10', 'bg-graphite/40');
      
      document.getElementById('preview-event-name').innerText = `${name} Experience`;
      recalculateProposal();
    }

    // Guest Count slider
    function updateGuestCount(val) {
      currentGuests = parseInt(val, 10);
      document.getElementById('guest-count-val').innerText = currentGuests;
      document.getElementById('preview-guests').innerText = `${currentGuests} Invited Guests`;
      
      // Calculate dynamic staff ratio (1 staff for every 4 guests)
      const staffCount = Math.ceil(currentGuests / 4);
      document.getElementById('preview-staff').innerText = `${staffCount} Specialists (1:4 Ratio)`;

      recalculateProposal();
    }

    // Course structure selection
    function updateCourseSelection(radio) {
      selectedCourseName = radio.value;
      selectedBasePrice = parseInt(radio.getAttribute('data-base-price'), 10);

      // Highlight active UI card
      document.querySelectorAll('.course-option').forEach(el => {
        el.classList.remove('border-gold-500', 'bg-gold-500/10');
        el.classList.add('border-white/10', 'bg-graphite/40');
      });
      radio.closest('.course-option').classList.add('border-gold-500', 'bg-gold-500/10');
      radio.closest('.course-option').classList.remove('border-white/10', 'bg-graphite/40');

      document.getElementById('preview-format').innerText = selectedCourseName;
      recalculateProposal();
    }

    // Select package from showcase cards into architect
    function selectPackageForArchitect(packageName, price, courseName) {
      selectedBasePrice = price;
      selectedCourseName = courseName;
      document.getElementById('preview-format').innerText = `${packageName} (${courseName})`;

      // Scroll smoothly to architect
      scrollToSection('architect');
      recalculateProposal();

      showToast(`Selected "${packageName}". Architect updated.`);
    }

    // Recalculate full proposal estimate
    function recalculateProposal() {
      // Add-ons calculation
      let addonsCost = 0;
      let addonCount = 0;
      
      const caviar = document.getElementById('addon-caviar');
      const mixology = document.getElementById('addon-mixology');
      const sommelier = document.getElementById('addon-sommelier');
      const ceramics = document.getElementById('addon-ceramics');

      if (caviar && caviar.checked) { addonsCost += parseInt(caviar.value); addonCount++; }
      if (mixology && mixology.checked) { addonsCost += parseInt(mixology.value); addonCount++; }
      if (sommelier && sommelier.checked) { addonsCost += parseInt(sommelier.value); addonCount++; }
      if (ceramics && ceramics.checked) { addonsCost += parseInt(ceramics.value); addonCount++; }

      document.getElementById('preview-addons-count').innerText = `${addonCount} Enhancement${addonCount === 1 ? '' : 's'} Selected`;

      // Base guest fee
      const effectivePerGuest = selectedBasePrice * occasionMultiplier;
      const guestFoodTotal = effectivePerGuest * currentGuests;
      const grandTotal = guestFoodTotal + addonsCost;

      document.getElementById('preview-total-price').innerText = formatCurrency(grandTotal);
      document.getElementById('preview-per-guest').innerText = formatCurrency(effectivePerGuest);

      // Update modal sync labels
      const summaryLabel = `${currentOccasion} • ${selectedCourseName} (${currentGuests} Guests)`;
      document.getElementById('res-summary-package').innerText = summaryLabel;
      document.getElementById('res-summary-cost').innerText = formatCurrency(grandTotal);
    }

    // Copy proposal summary to clipboard
    function copyProposalSummary() {
      const summaryText = `[AURUM & CO. BESPOKE CULINARY PROPOSAL]\n` +
        `Occasion: ${currentOccasion}\n` +
        `Structure: ${selectedCourseName}\n` +
        `Guests: ${currentGuests} Honored Palates\n` +
        `Estimated Total: ${document.getElementById('preview-total-price').innerText}\n` +
        `Per Guest: ${document.getElementById('preview-per-guest').innerText}\n` +
        `Staffing: ${document.getElementById('preview-staff').innerText}\n` +
        `Curated by Aurum Atelier conciergerie.`;

      const tempTextArea = document.createElement("textarea");
      tempTextArea.value = summaryText;
      document.body.appendChild(tempTextArea);
      tempTextArea.select();
      document.execCommand('copy');
      document.body.removeChild(tempTextArea);

      showToast("Proposal dossier copied to clipboard.");
    }

    // Sensory Menu Filter
    function filterMenus(category, btn) {
      document.querySelectorAll('.menu-filter-btn').forEach(b => {
        b.classList.remove('bg-gold-500', 'text-obsidian');
        b.classList.add('bg-charcoal', 'text-sand/80');
      });
      btn.classList.add('bg-gold-500', 'text-obsidian');
      btn.classList.remove('bg-charcoal', 'text-sand/80');

      const cards = document.querySelectorAll('.menu-card');
      cards.forEach(card => {
        if (category === 'all' || card.getAttribute('data-cat') === category) {
          card.classList.remove('hidden');
        } else {
          card.classList.add('hidden');
        }
      });
    }

    // Dish Modal Handlers
    function openDishModal(index) {
      const dish = dishes[index];
      if (!dish) return;

      document.getElementById('modal-dish-img').src = dish.image;
      document.getElementById('modal-dish-title').innerText = dish.title;
      document.getElementById('modal-dish-tag').innerText = dish.tag;
      document.getElementById('modal-dish-pairing').innerText = dish.pairing;
      document.getElementById('modal-dish-story').innerText = dish.story;
      document.getElementById('modal-dish-notes').innerText = dish.notes;
      document.getElementById('modal-dish-logistics').innerText = dish.logistics;

      const modal = document.getElementById('dish-modal');
      modal.classList.remove('hidden');
      modal.classList.add('flex');
    }

    function closeDishModal() {
      const modal = document.getElementById('dish-modal');
      modal.classList.add('hidden');
      modal.classList.remove('flex');
    }

    // Booking Modal Handlers
    function openBookingModal() {
      recalculateProposal();
      const modal = document.getElementById('booking-modal');
      modal.classList.remove('hidden');
      modal.classList.add('flex');
    }

    function openBookingFromArchitect() {
      openBookingModal();
    }

    function closeBookingModal() {
      const modal = document.getElementById('booking-modal');
      modal.classList.add('hidden');
      modal.classList.remove('flex');
    }

    // WhatsApp Direct Dispatch
    function handleReservationSubmit(e) {
      e.preventDefault();
      
      const name = document.getElementById('res-name').value;
      const phone = document.getElementById('res-wa').value;
      const date = document.getElementById('res-date').value;
      const venue = document.getElementById('res-venue').value;
      const notes = document.getElementById('res-notes').value || 'None specified';
      const grandTotal = document.getElementById('preview-total-price').innerText;

      const message = `*EXCLUSIVE EVENT INQUIRY - AURUM & CO.*%0A%0A` +
        `*Host:* ${encodeURIComponent(name)}%0A` +
        `*Phone:* ${encodeURIComponent(phone)}%0A` +
        `*Event Date:* ${encodeURIComponent(date)}%0A` +
        `*Venue / City:* ${encodeURIComponent(venue)}%0A` +
        `*Format:* ${encodeURIComponent(currentOccasion + ' - ' + selectedCourseName)}%0A` +
        `*Guest Count:* ${currentGuests} pax%0A` +
        `*Est. Investment:* ${encodeURIComponent(grandTotal)}%0A` +
        `*Specific Requirements:* ${encodeURIComponent(notes)}%0A%0A` +
        `Please confirm our private tasting calendar availability.`;

      closeBookingModal();
      showToast("Redirecting to WhatsApp Concierge...");

      // Default WhatsApp Concierge Desk link
      setTimeout(() => {
        window.open(`https://wa.me/6281234567890?text=${message}`, '_blank');
      }, 700);
    }

    // Smooth scroll helper
    function scrollToSection(id) {
      const target = document.getElementById(id);
      if (target) {
        target.scrollIntoView({ behavior: 'smooth' });
      }
    }

    // Mobile nav toggle
    function toggleMobileMenu() {
      const menu = document.getElementById('mobile-menu');
      menu.classList.toggle('hidden');
    }

    // Notification Toast System
    function showToast(msg) {
      const toast = document.getElementById('toast');
      const text = document.getElementById('toast-message');
      text.innerText = msg;
      toast.classList.remove('translate-y-32', 'opacity-0');
      toast.classList.add('translate-y-0', 'opacity-100');

      setTimeout(() => {
        toast.classList.remove('translate-y-0', 'opacity-100');
        toast.classList.add('translate-y-32', 'opacity-0');
      }, 3500);
    }

    // Initial calculation on load
    window.onload = function() {
      recalculateProposal();
    };
  </script>
</body>
</html>
@endverbatim
