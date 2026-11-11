<!DOCTYPE html>

<html class="scroll-smooth" lang="en">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>VERBA | Editorial Translation &amp; Interpreter House</title>
<!-- Tailwind CSS -->
<script src="https://cdn.tailwindcss.com"></script>
<!-- Google Fonts (Playfair Display, Cormorant Garamond, Plus Jakarta Sans) -->
<link href="https://fonts.googleapis.com" rel="preconnect"/>
<link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;0,700;1,400;1,600&amp;family=Playfair+Display:ital,wght@0,400;0,600;0,700;0,900;1,400;1,600&amp;family=Plus+Jakarta+Sans:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet"/>
<!-- Font Awesome Icons -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"/>
<!-- Three.js for 3D Interactive Canvas -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
<script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        ink: '#242424',
                        rose: '#D94F70',
                        gold: '#E6B566',
                        parchment: '#F3EDE2',
                        'parchment-dark': '#EAE1D0',
                        'ink-light': '#363636'
                    },
                    fontFamily: {
                        playfair: ['Playfair Display', 'serif'],
                        cormorant: ['Cormorant Garamond', 'serif'],
                        sans: ['Plus Jakarta Sans', 'sans-serif']
                    },
                    backgroundImage: {
                        'paper-pattern': "url('https://images.unsplash.com/photo-1586075010923-2dd4570fb338?q=80&w=1200&auto=format&fit=crop')",
                    }
                }
            }
        }
    </script>

<link href='{{ asset("css/website-bisnis/templates/professional-service/translation-interpreter/verba/verba.css") }}' rel="stylesheet"/></head>
<body class="font-sans antialiased overflow-x-hidden selection:bg-rose selection:text-white">
<!-- TOPBAR -->
<div class="bg-ink text-parchment text-xs py-2 px-4 md:px-12 border-b border-gold/30">
<div class="max-w-7xl mx-auto flex flex-col sm:flex-row justify-between items-center gap-2">
<div class="flex items-center space-x-6">
<span><i class="fa-solid fa-envelope text-gold mr-2"></i> dispatch@verbalingua.com</span>
<span><i class="fa-solid fa-phone text-gold mr-2"></i> +1 (800) 984-3822</span>
<span class="hidden md:inline-flex items-center text-rose text-[11px] font-semibold tracking-wider uppercase">
<i class="fa-solid fa-certificate mr-1"></i> ISO 17100:2015 &amp; Sworn Certified
                </span>
</div>
<div class="flex items-center space-x-4">
<span class="text-xs text-parchment/70">Language:</span>
<button class="bg-ink-light px-2.5 py-1 rounded text-gold font-serif hover:text-white transition flex items-center gap-1 border border-gold/40" id="langToggle" onclick="toggleLanguage()">
<span id="currentLangLabel">EN</span>
<i class="fa-solid fa-globe text-[10px]"></i>
</button>
</div>
</div>
</div>
<!-- GLOBAL NATIONAL FLAGS MARQUEE RIBBON -->
<div class="bg-ink-light border-b border-gold/20 overflow-hidden py-2 text-xs font-mono text-parchment/80">
<div class="animate-marquee flex items-center space-x-8 whitespace-nowrap">
<span class="flex items-center gap-2"><span class="text-base">🇺🇸</span> English (US)</span>
<span class="flex items-center gap-2"><span class="text-base">🇬🇧</span> English (UK)</span>
<span class="flex items-center gap-2"><span class="text-base">🇯🇵</span> Japanese (日本語)</span>
<span class="flex items-center gap-2"><span class="text-base">🇫🇷</span> French (Français)</span>
<span class="flex items-center gap-2"><span class="text-base">🇩🇪</span> German (Deutsch)</span>
<span class="flex items-center gap-2"><span class="text-base">🇨🇳</span> Chinese (Mandarin)</span>
<span class="flex items-center gap-2"><span class="text-base">🇸🇦</span> Arabic (العربية)</span>
<span class="flex items-center gap-2"><span class="text-base">🇮🇩</span> Indonesian (Bahasa)</span>
<span class="flex items-center gap-2"><span class="text-base">🇪🇸</span> Spanish (Español)</span>
<span class="flex items-center gap-2"><span class="text-base">🇮🇹</span> Italian (Italiano)</span>
<span class="flex items-center gap-2"><span class="text-base">🇰🇷</span> Korean (한국어)</span>
<span class="flex items-center gap-2"><span class="text-base">🇳🇱</span> Dutch (Nederlands)</span>
<span class="flex items-center gap-2"><span class="text-base">🇷🇺</span> Russian (Русский)</span>
<!-- Duplicated for smooth loop -->
<span class="flex items-center gap-2"><span class="text-base">🇺🇸</span> English (US)</span>
<span class="flex items-center gap-2"><span class="text-base">🇬🇧</span> English (UK)</span>
<span class="flex items-center gap-2"><span class="text-base">🇯🇵</span> Japanese (日本語)</span>
<span class="flex items-center gap-2"><span class="text-base">🇫🇷</span> French (Français)</span>
<span class="flex items-center gap-2"><span class="text-base">🇩🇪</span> German (Deutsch)</span>
<span class="flex items-center gap-2"><span class="text-base">🇨🇳</span> Chinese (Mandarin)</span>
<span class="flex items-center gap-2"><span class="text-base">🇸🇦</span> Arabic (العربية)</span>
<span class="flex items-center gap-2"><span class="text-base">🇮🇩</span> Indonesian (Bahasa)</span>
</div>
</div>
<!-- NAVBAR -->
<nav class="sticky top-0 z-40 bg-parchment/95 backdrop-blur-md border-b border-ink/10 shadow-sm transition-all duration-300">
<div class="max-w-7xl mx-auto px-4 md:px-12 py-4 flex justify-between items-center">
<!-- Brand Logo -->
<a class="flex items-center space-x-3 group" href="#">
<div class="w-10 h-10 rounded-full bg-ink flex items-center justify-center border-2 border-gold text-gold font-playfair text-xl font-bold group-hover:bg-rose group-hover:text-white group-hover:border-rose transition-all">
                    V
                </div>
<div>
<span class="font-playfair text-2xl font-black tracking-tight text-ink block leading-none">VERBA</span>
<span class="font-cormorant text-xs italic tracking-widest text-rose block uppercase">Editorial Translation House</span>
</div>
</a>
<!-- Nav Links -->
<div class="hidden lg:flex items-center space-x-8 text-sm font-medium tracking-wide">
<a class="hover:text-rose transition py-1 border-b-2 border-transparent hover:border-rose" href="#languages-grid">Bahasa Kami</a>
<a class="hover:text-rose transition py-1 border-b-2 border-transparent hover:border-rose" href="#services">Services</a>
<a class="hover:text-rose transition py-1 border-b-2 border-transparent hover:border-rose" href="#explorer">Language Pairs</a>
<a class="hover:text-rose transition py-1 border-b-2 border-transparent hover:border-rose" href="#estimator">Cost Calculator</a>
<a class="hover:text-rose transition py-1 border-b-2 border-transparent hover:border-rose" href="#interpreters">Interpreters</a>
<a class="hover:text-rose transition py-1 border-b-2 border-transparent hover:border-rose" href="#gallery">Work Showcase</a>
<a class="hover:text-rose transition py-1 border-b-2 border-transparent hover:border-rose" href="#packages">Rates</a>
</div>
<!-- CTA -->
<div class="flex items-center space-x-3">
<a class="hidden sm:inline-block px-5 py-2.5 bg-ink text-parchment font-serif text-xs uppercase tracking-widest hover:bg-rose transition duration-300 rounded shadow border border-gold/50" href="#estimator">
                    Get Instant Quote
                </a>
<button class="lg:hidden text-ink text-2xl p-2 focus:outline-none" onclick="toggleMobileMenu()">
<i class="fa-solid fa-bars-staggered"></i>
</button>
</div>
</div>
<!-- Mobile Navigation Menu -->
<div class="hidden lg:hidden bg-parchment border-b border-ink/10 px-6 py-6 space-y-4" id="mobileMenu">
<a class="block font-serif text-lg text-ink hover:text-rose" href="#languages-grid" onclick="toggleMobileMenu()">Bahasa Kami</a>
<a class="block font-serif text-lg text-ink hover:text-rose" href="#services" onclick="toggleMobileMenu()">Services</a>
<a class="block font-serif text-lg text-ink hover:text-rose" href="#explorer" onclick="toggleMobileMenu()">Language Pairs</a>
<a class="block font-serif text-lg text-ink hover:text-rose" href="#estimator" onclick="toggleMobileMenu()">Instant Cost Calculator</a>
<a class="block font-serif text-lg text-ink hover:text-rose" href="#interpreters" onclick="toggleMobileMenu()">Interpreters</a>
<a class="block font-serif text-lg text-ink hover:text-rose" href="#gallery" onclick="toggleMobileMenu()">Translation Gallery</a>
<a class="block font-serif text-lg text-ink hover:text-rose" href="#packages" onclick="toggleMobileMenu()">Pricing Packages</a>
</div>
</nav>
<!-- HERO SECTION (Interactive Spinning Dynamic 3D Globe Earth Canvas) -->
<section class="relative min-h-[90vh] bg-ink text-parchment overflow-hidden flex items-center py-16">
<!-- Background Canvas for Interactive Spinning 3D Globe -->
<div class="absolute inset-0 z-0 opacity-70 pointer-events-auto" id="heroCanvasContainer"></div>
<!-- Overlay Vintage Pattern -->
<div class="absolute inset-0 bg-[radial-gradient(#E6B566_1px,transparent_1px)] [background-size:24px_24px] opacity-10 pointer-events-none"></div>
<div class="max-w-7xl mx-auto px-4 md:px-12 relative z-10 w-full grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
<!-- Left Text Content -->
<div class="lg:col-span-7 space-y-8 text-left">
<div class="inline-flex items-center space-x-3 px-4 py-1.5 rounded-full bg-rose/20 border border-rose/40 text-rose text-xs font-serif tracking-widest uppercase">
<span class="w-2 h-2 rounded-full bg-rose animate-ping"></span>
<span>Editorial Precision • Certified Linguists</span>
</div>
<h1 class="font-playfair text-4xl sm:text-6xl lg:text-7xl font-bold leading-[1.1] tracking-tight">
                    Words Across Borders.<br/>
<span class="italic text-gold font-cormorant font-normal">Nuance</span> Across Cultures.
                </h1>
<!-- Multilingual Typing Headline Sub-Text -->
<p class="text-lg md:text-xl text-parchment/80 font-light max-w-2xl font-sans leading-relaxed h-16">
<span class="border-r-2 border-gold pr-1" id="typingText"></span>
</p>
<!-- Action Buttons -->
<div class="flex flex-wrap items-center gap-4 pt-4">
<a class="px-8 py-4 bg-rose text-white font-serif text-sm uppercase tracking-widest hover:bg-rose/90 transition-all rounded shadow-lg flex items-center gap-3 border border-rose/50 group" href="#estimator">
<span>Request Translation</span>
<i class="fa-solid fa-arrow-right-long group-hover:translate-x-1 transition-transform"></i>
</a>
<a class="px-8 py-4 bg-transparent border border-gold/60 text-gold font-serif text-sm uppercase tracking-widest hover:bg-gold/10 transition-all rounded flex items-center gap-2" href="#languages-grid">
<i class="fa-solid fa-flag text-xs"></i>
<span>Lihat Bahasa</span>
</a>
</div>
<!-- Live Language Ticker Banner -->
<div class="pt-8 border-t border-parchment/10 flex flex-wrap items-center gap-6 text-xs text-parchment/60 font-mono">
<span class="flex items-center gap-2"><i class="fa-solid fa-check text-gold"></i> 120+ Language Pairs</span>
<span class="flex items-center gap-2"><i class="fa-solid fa-check text-gold"></i> Sworn &amp; Legal Validity</span>
<span class="flex items-center gap-2"><i class="fa-solid fa-check text-gold"></i> ISO 17100 Compliant</span>
</div>
</div>
<!-- Right Interactive Express Portal Card -->
<div class="lg:col-span-5 relative">
<div class="p-6 md:p-8 rounded-2xl bg-ink-light/85 backdrop-blur-md border border-gold/30 shadow-2xl relative overflow-hidden">
<div class="absolute -right-12 -bottom-12 w-48 h-48 bg-rose/20 rounded-full blur-3xl pointer-events-none"></div>
<div class="flex items-center justify-between border-b border-parchment/10 pb-4 mb-6">
<div class="text-xs uppercase font-serif tracking-widest text-gold flex items-center gap-2">
<i class="fa-solid fa-globe text-rose"></i> Global Translation House
                        </div>
<span class="text-xs text-parchment/60 font-mono">24/7 Active Dispatch</span>
</div>
<!-- Quick Document Upload Prompt -->
<div class="space-y-4">
<div class="font-playfair text-xl text-parchment font-semibold flex items-center gap-2">
<i class="fa-solid fa-feather-pointed text-rose"></i> Document Appraisal Portal
                        </div>
<p class="text-xs text-parchment/70 font-sans">Upload your manuscript, legal deed, or document for priority appraisal.</p>
<div class="border-2 border-dashed border-gold/40 hover:border-rose rounded-xl p-6 text-center cursor-pointer transition bg-ink/50 group" id="heroDropZone" onclick="document.getElementById('heroFileInput').click()">
<i class="fa-solid fa-cloud-arrow-up text-3xl text-gold group-hover:scale-110 transition-transform mb-2"></i>
<p class="text-xs text-parchment/90 font-medium">Drag &amp; Drop PDF, DOCX, XLSX, PPTX</p>
<span class="text-[10px] text-parchment/50">Up to 50MB • Confidential NDA Protected</span>
<input accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.png,.jpg,.jpeg,.webp" class="hidden" id="heroFileInput" onchange="handleHeroFileUpload(this.files)" type="file"/>
</div>
<div class="hidden text-xs text-gold font-mono flex items-center justify-between bg-ink p-2 rounded" id="heroFileStatus">
<span id="heroFileName">document.pdf</span>
<span class="text-rose">Ready for Estimator <i class="fa-solid fa-arrow-down"></i></span>
</div>
</div>
<div class="mt-6 pt-4 border-t border-parchment/10 flex items-center justify-between text-xs">
<div class="flex items-center gap-2">
<div class="w-8 h-8 rounded-full border border-gold flex items-center justify-center text-gold text-xs shadow">
<i class="fa-solid fa-stamp"></i>
</div>
<div>
<span class="block text-parchment font-semibold text-[11px]">Official Sworn Stamp</span>
<span class="text-parchment/50 text-[10px]">Embassies &amp; Ministries Recognized</span>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- BAHASA YANG KAMI LAYANI - LARGE FLAG GRID (EXACT REPLICA OF THE ATTACHED IMAGE SPECIFICATION) -->
<section class="py-20 bg-parchment border-b border-ink/10" id="languages-grid">
<div class="max-w-7xl mx-auto px-4 md:px-12 space-y-10">
<!-- Section Header in Editorial Pink Tone -->
<div class="text-left border-b border-ink/10 pb-4">
<span class="text-xs md:text-sm font-mono tracking-widest text-rose uppercase font-semibold">BAHASA YANG KAMI LAYANI</span>
</div>
<!-- Flag Grid (12 Large Cards mirroring exact layout & native script typography) -->
<div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-6 md:gap-8">
<!-- 1. Bahasa Indonesia -->
<div class="flag-card rounded-xl overflow-hidden p-4 text-center cursor-pointer" onclick="quickSelectPair('id', 'en')">
<div class="h-32 md:h-40 w-full overflow-hidden rounded border border-ink/10 mb-3 shadow-sm flex items-center justify-center bg-gray-50">
<img alt="Bahasa Indonesia" class="w-full h-full object-cover" src="https://flagcdn.com/w320/id.png"/>
</div>
<span class="font-sans text-sm md:text-base font-semibold text-ink block">Bahasa Indonesia</span>
</div>
<!-- 2. English -->
<div class="flag-card rounded-xl overflow-hidden p-4 text-center cursor-pointer" onclick="quickSelectPair('gb', 'id')">
<div class="h-32 md:h-40 w-full overflow-hidden rounded border border-ink/10 mb-3 shadow-sm flex items-center justify-center bg-gray-50">
<img alt="English" class="w-full h-full object-cover" src="https://flagcdn.com/w320/gb.png"/>
</div>
<span class="font-sans text-sm md:text-base font-semibold text-ink block">English</span>
</div>
<!-- 3. Chinese Mandarin -->
<div class="flag-card rounded-xl overflow-hidden p-4 text-center cursor-pointer" onclick="quickSelectPair('zh', 'id')">
<div class="h-32 md:h-40 w-full overflow-hidden rounded border border-ink/10 mb-3 shadow-sm flex items-center justify-center bg-gray-50">
<img alt="中文" class="w-full h-full object-cover" src="https://flagcdn.com/w320/cn.png"/>
</div>
<span class="font-sans text-sm md:text-base font-semibold text-ink block">中文</span>
</div>
<!-- 4. Japanese -->
<div class="flag-card rounded-xl overflow-hidden p-4 text-center cursor-pointer" onclick="quickSelectPair('ja', 'id')">
<div class="h-32 md:h-40 w-full overflow-hidden rounded border border-ink/10 mb-3 shadow-sm flex items-center justify-center bg-gray-50">
<img alt="日本語" class="w-full h-full object-cover" src="https://flagcdn.com/w320/jp.png"/>
</div>
<span class="font-sans text-sm md:text-base font-semibold text-ink block">日本語</span>
</div>
<!-- 5. Korean -->
<div class="flag-card rounded-xl overflow-hidden p-4 text-center cursor-pointer" onclick="quickSelectPair('kr', 'id')">
<div class="h-32 md:h-40 w-full overflow-hidden rounded border border-ink/10 mb-3 shadow-sm flex items-center justify-center bg-gray-50">
<img alt="한국어" class="w-full h-full object-cover" src="https://flagcdn.com/w320/kr.png"/>
</div>
<span class="font-sans text-sm md:text-base font-semibold text-ink block">한국어</span>
</div>
<!-- 6. Arabic -->
<div class="flag-card rounded-xl overflow-hidden p-4 text-center cursor-pointer" onclick="quickSelectPair('sa', 'id')">
<div class="h-32 md:h-40 w-full overflow-hidden rounded border border-ink/10 mb-3 shadow-sm flex items-center justify-center bg-gray-50">
<img alt="العربية" class="w-full h-full object-cover" src="https://flagcdn.com/w320/sa.png"/>
</div>
<span class="font-sans text-sm md:text-base font-semibold text-ink block">العربية</span>
</div>
<!-- 7. French -->
<div class="flag-card rounded-xl overflow-hidden p-4 text-center cursor-pointer" onclick="quickSelectPair('fr', 'id')">
<div class="h-32 md:h-40 w-full overflow-hidden rounded border border-ink/10 mb-3 shadow-sm flex items-center justify-center bg-gray-50">
<img alt="Français" class="w-full h-full object-cover" src="https://flagcdn.com/w320/fr.png"/>
</div>
<span class="font-sans text-sm md:text-base font-semibold text-ink block">Français</span>
</div>
<!-- 8. German -->
<div class="flag-card rounded-xl overflow-hidden p-4 text-center cursor-pointer" onclick="quickSelectPair('de', 'id')">
<div class="h-32 md:h-40 w-full overflow-hidden rounded border border-ink/10 mb-3 shadow-sm flex items-center justify-center bg-gray-50">
<img alt="Deutsch" class="w-full h-full object-cover" src="https://flagcdn.com/w320/de.png"/>
</div>
<span class="font-sans text-sm md:text-base font-semibold text-ink block">Deutsch</span>
</div>
<!-- 9. Spanish -->
<div class="flag-card rounded-xl overflow-hidden p-4 text-center cursor-pointer" onclick="quickSelectPair('es', 'id')">
<div class="h-32 md:h-40 w-full overflow-hidden rounded border border-ink/10 mb-3 shadow-sm flex items-center justify-center bg-gray-50">
<img alt="Español" class="w-full h-full object-cover" src="https://flagcdn.com/w320/es.png"/>
</div>
<span class="font-sans text-sm md:text-base font-semibold text-ink block">Español</span>
</div>
<!-- 10. Italian -->
<div class="flag-card rounded-xl overflow-hidden p-4 text-center cursor-pointer" onclick="quickSelectPair('it', 'id')">
<div class="h-32 md:h-40 w-full overflow-hidden rounded border border-ink/10 mb-3 shadow-sm flex items-center justify-center bg-gray-50">
<img alt="Italiano" class="w-full h-full object-cover" src="https://flagcdn.com/w320/it.png"/>
</div>
<span class="font-sans text-sm md:text-base font-semibold text-ink block">Italiano</span>
</div>
<!-- 11. Dutch -->
<div class="flag-card rounded-xl overflow-hidden p-4 text-center cursor-pointer" onclick="quickSelectPair('nl', 'id')">
<div class="h-32 md:h-40 w-full overflow-hidden rounded border border-ink/10 mb-3 shadow-sm flex items-center justify-center bg-gray-50">
<img alt="Nederlands" class="w-full h-full object-cover" src="https://flagcdn.com/w320/nl.png"/>
</div>
<span class="font-sans text-sm md:text-base font-semibold text-ink block">Nederlands</span>
</div>
<!-- 12. Russian -->
<div class="flag-card rounded-xl overflow-hidden p-4 text-center cursor-pointer" onclick="quickSelectPair('ru', 'id')">
<div class="h-32 md:h-40 w-full overflow-hidden rounded border border-ink/10 mb-3 shadow-sm flex items-center justify-center bg-gray-50">
<img alt="Русский" class="w-full h-full object-cover" src="https://flagcdn.com/w320/ru.png"/>
</div>
<span class="font-sans text-sm md:text-base font-semibold text-ink block">Русский</span>
</div>
</div>
</div>
</section>
<!-- LANGUAGE PAIR EXPLORER -->
<section class="py-20 px-4 md:px-12 max-w-7xl mx-auto" id="explorer">
<div class="text-center max-w-3xl mx-auto space-y-4 mb-16">
<span class="text-xs font-serif uppercase tracking-widest text-rose font-bold block">Linguistic Matrix</span>
<h2 class="font-playfair text-3xl md:text-5xl font-bold text-ink">Language Pair Explorer</h2>
<div class="w-16 h-0.5 bg-gold mx-auto"></div>
<p class="text-sm md:text-base text-ink/70 font-sans">Select source and target parameters to check native linguist availability and specialized domain coverage.</p>
</div>
<div class="bg-parchment-dark/60 rounded-2xl p-6 md:p-10 border border-ink/10 shadow-sm">
<div class="grid grid-cols-1 md:grid-cols-12 gap-6 items-center">
<!-- Source Language -->
<div class="md:col-span-5 space-y-2">
<label class="block text-xs uppercase font-serif tracking-widest text-ink/80 font-bold">Source Language (From)</label>
<select class="w-full bg-parchment border border-ink/20 rounded-lg p-3 text-sm font-sans focus:outline-none focus:border-rose" id="sourceLang" onchange="updatePairMatrix()">
<option data-flag="🇺🇸" value="en">English (US/UK)</option>
<option data-flag="🇮🇩" value="id">Indonesian (Bahasa)</option>
<option data-flag="🇯🇵" value="ja">Japanese (日本語)</option>
<option data-flag="🇫🇷" value="fr">French (Français)</option>
<option data-flag="🇩🇪" value="de">German (Deutsch)</option>
<option data-flag="🇨🇳" value="zh">Mandarin Chinese (中文)</option>
<option data-flag="🇸🇦" value="ar">Arabic (العربية)</option>
<option data-flag="🇪🇸" value="es">Spanish (Español)</option>
</select>
</div>
<!-- Swap Button -->
<div class="md:col-span-2 flex justify-center py-2">
<button class="w-12 h-12 rounded-full bg-ink text-gold hover:bg-rose hover:text-white transition flex items-center justify-center shadow-md" onclick="swapLanguages()">
<i class="fa-solid fa-arrow-right-arrow-left"></i>
</button>
</div>
<!-- Target Language -->
<div class="md:col-span-5 space-y-2">
<label class="block text-xs uppercase font-serif tracking-widest text-ink/80 font-bold">Target Language (To)</label>
<select class="w-full bg-parchment border border-ink/20 rounded-lg p-3 text-sm font-sans focus:outline-none focus:border-rose" id="targetLang" onchange="updatePairMatrix()">
<option data-flag="🇮🇩" value="id">Indonesian (Bahasa)</option>
<option data-flag="🇺🇸" value="en">English (US/UK)</option>
<option data-flag="🇯🇵" value="ja">Japanese (日本語)</option>
<option data-flag="🇫🇷" value="fr">French (Français)</option>
<option data-flag="🇩🇪" value="de">German (Deutsch)</option>
<option data-flag="🇨🇳" value="zh">Mandarin Chinese (中文)</option>
<option data-flag="🇸🇦" value="ar">Arabic (العربية)</option>
<option data-flag="🇪🇸" value="es">Spanish (Español)</option>
</select>
</div>
</div>
<!-- Language Pair Result Card -->
<div class="mt-8 bg-parchment rounded-xl p-6 border border-gold/40 flex flex-col md:flex-row justify-between items-center gap-6" id="pairResult">
<div class="flex items-center space-x-4">
<div class="text-3xl" id="pairFlags">🇺🇸 ➔ 🇮🇩</div>
<div>
<h4 class="font-playfair text-xl font-bold text-ink" id="pairTitle">English to Indonesian Pair</h4>
<p class="text-xs text-ink/70 font-sans" id="pairDetail">Active Pool: 38 Certified Sworn Translators • Turnaround: ~2,500 words/day</p>
</div>
</div>
<div class="flex items-center space-x-3">
<span class="px-3 py-1 bg-rose/10 text-rose text-xs font-semibold rounded-full border border-rose/30">Sworn Available</span>
<a class="px-5 py-2.5 bg-rose text-white text-xs font-serif uppercase tracking-widest hover:bg-ink transition rounded" href="#estimator">Select Pair</a>
</div>
</div>
<!-- Flag Grid -->
<div class="mt-10 pt-8 border-t border-ink/10 grid grid-cols-2 sm:grid-cols-4 md:grid-cols-6 gap-4 text-center">
<div class="p-3 rounded-lg bg-parchment hover:shadow-md transition cursor-pointer border border-ink/5" onclick="quickSelectPair('ja', 'en')">
<div class="text-2xl mb-1">🇯🇵 ➔ 🇺🇸</div>
<span class="text-xs font-medium text-ink block">Japanese-English</span>
</div>
<div class="p-3 rounded-lg bg-parchment hover:shadow-md transition cursor-pointer border border-ink/5" onclick="quickSelectPair('fr', 'en')">
<div class="text-2xl mb-1">🇫🇷 ➔ 🇺🇸</div>
<span class="text-xs font-medium text-ink block">French-English</span>
</div>
<div class="p-3 rounded-lg bg-parchment hover:shadow-md transition cursor-pointer border border-ink/5" onclick="quickSelectPair('de', 'id')">
<div class="text-2xl mb-1">🇩🇪 ➔ 🇮🇩</div>
<span class="text-xs font-medium text-ink block">German-Indonesian</span>
</div>
<div class="p-3 rounded-lg bg-parchment hover:shadow-md transition cursor-pointer border border-ink/5" onclick="quickSelectPair('zh', 'en')">
<div class="text-2xl mb-1">🇨🇳 ➔ 🇺🇸</div>
<span class="text-xs font-medium text-ink block">Chinese-English</span>
</div>
<div class="p-3 rounded-lg bg-parchment hover:shadow-md transition cursor-pointer border border-ink/5" onclick="quickSelectPair('ar', 'id')">
<div class="text-2xl mb-1">🇸🇦 ➔ 🇮🇩</div>
<span class="text-xs font-medium text-ink block">Arabic-Indonesian</span>
</div>
<div class="p-3 rounded-lg bg-parchment hover:shadow-md transition cursor-pointer border border-ink/5" onclick="quickSelectPair('es', 'en')">
<div class="text-2xl mb-1">🇪🇸 ➔ 🇺🇸</div>
<span class="text-xs font-medium text-ink block">Spanish-English</span>
</div>
</div>
</div>
</section>
<!-- TRANSLATION SERVICE CATEGORIES (Rich Unsplash Visual Grid) -->
<section class="py-20 bg-ink text-parchment" id="services">
<div class="max-w-7xl mx-auto px-4 md:px-12">
<div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-6">
<div>
<span class="text-xs font-serif uppercase tracking-widest text-gold font-bold block mb-2">Domain Specializations</span>
<h2 class="font-playfair text-3xl md:text-5xl font-bold">Translation Categories</h2>
</div>
<p class="text-sm text-parchment/70 max-w-md font-sans">
                    Every discipline demands its own nomenclature. Our subject-matter experts hold advanced degrees in law, medicine, engineering, and literature.
                </p>
</div>
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
<!-- Category 1: Legal & Sworn -->
<div class="group relative bg-ink-light rounded-xl overflow-hidden border border-gold/20 hover:border-rose transition-all duration-300">
<div class="h-48 overflow-hidden relative">
<img alt="Legal Translation" class="w-full h-full object-cover group-hover:scale-110 transition duration-500" src="https://images.unsplash.com/photo-1450133064473-71024230f91b?q=80&amp;w=800&amp;auto=format&amp;fit=crop"/>
<div class="absolute inset-0 bg-gradient-to-t from-ink via-transparent to-transparent"></div>
<span class="absolute top-3 right-3 bg-rose text-white text-[10px] font-serif uppercase px-2.5 py-1 rounded">Sworn Stamp</span>
</div>
<div class="p-6 space-y-3">
<h3 class="font-playfair text-xl font-bold text-parchment group-hover:text-gold transition">Legal &amp; Sworn</h3>
<p class="text-xs text-parchment/70 leading-relaxed">Contracts, court deeds, notarized certificates, patents, and legal compliance filings with official stamps.</p>
<a class="inline-flex items-center text-xs font-serif text-gold group-hover:text-rose transition gap-2 pt-2" href="#estimator">
<span>Request Appraisal</span> <i class="fa-solid fa-arrow-right text-[10px]"></i>
</a>
</div>
</div>
<!-- Category 2: Business & Finance -->
<div class="group relative bg-ink-light rounded-xl overflow-hidden border border-gold/20 hover:border-rose transition-all duration-300">
<div class="h-48 overflow-hidden relative">
<img alt="Business Translation" class="w-full h-full object-cover group-hover:scale-110 transition duration-500" src="https://images.unsplash.com/photo-1507679799987-c73779587ccf?q=80&amp;w=800&amp;auto=format&amp;fit=crop"/>
<div class="absolute inset-0 bg-gradient-to-t from-ink via-transparent to-transparent"></div>
</div>
<div class="p-6 space-y-3">
<h3 class="font-playfair text-xl font-bold text-parchment group-hover:text-gold transition">Corporate &amp; Finance</h3>
<p class="text-xs text-parchment/70 leading-relaxed">Annual audit reports, pitch decks, M&amp;A filings, prospectus documentation, and investor communications.</p>
<a class="inline-flex items-center text-xs font-serif text-gold group-hover:text-rose transition gap-2 pt-2" href="#estimator">
<span>Request Appraisal</span> <i class="fa-solid fa-arrow-right text-[10px]"></i>
</a>
</div>
</div>
<!-- Category 3: Medical & Pharmaceutical -->
<div class="group relative bg-ink-light rounded-xl overflow-hidden border border-gold/20 hover:border-rose transition-all duration-300">
<div class="h-48 overflow-hidden relative">
<img alt="Medical Translation" class="w-full h-full object-cover group-hover:scale-110 transition duration-500" src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?q=80&amp;w=800&amp;auto=format&amp;fit=crop"/>
<div class="absolute inset-0 bg-gradient-to-t from-ink via-transparent to-transparent"></div>
</div>
<div class="p-6 space-y-3">
<h3 class="font-playfair text-xl font-bold text-parchment group-hover:text-gold transition">Medical &amp; Scientific</h3>
<p class="text-xs text-parchment/70 leading-relaxed">Clinical trial protocols, medical device manuals, pharma dossiers, and patient record translations.</p>
<a class="inline-flex items-center text-xs font-serif text-gold group-hover:text-rose transition gap-2 pt-2" href="#estimator">
<span>Request Appraisal</span> <i class="fa-solid fa-arrow-right text-[10px]"></i>
</a>
</div>
</div>
<!-- Category 4: Academic & Publishing -->
<div class="group relative bg-ink-light rounded-xl overflow-hidden border border-gold/20 hover:border-rose transition-all duration-300">
<div class="h-48 overflow-hidden relative">
<img alt="Academic Books" class="w-full h-full object-cover group-hover:scale-110 transition duration-500" src="https://images.unsplash.com/photo-1457369804613-52c61a468e7d?q=80&amp;w=800&amp;auto=format&amp;fit=crop"/>
<div class="absolute inset-0 bg-gradient-to-t from-ink via-transparent to-transparent"></div>
</div>
<div class="p-6 space-y-3">
<h3 class="font-playfair text-xl font-bold text-parchment group-hover:text-gold transition">Academic &amp; Books</h3>
<p class="text-xs text-parchment/70 leading-relaxed">Research journals, dissertations, literary monographs, and published manuscript translations.</p>
<a class="inline-flex items-center text-xs font-serif text-gold group-hover:text-rose transition gap-2 pt-2" href="#estimator">
<span>Request Appraisal</span> <i class="fa-solid fa-arrow-right text-[10px]"></i>
</a>
</div>
</div>
<!-- Category 5: Technical & Engineering -->
<div class="group relative bg-ink-light rounded-xl overflow-hidden border border-gold/20 hover:border-rose transition-all duration-300">
<div class="h-48 overflow-hidden relative">
<img alt="Technical Engineering" class="w-full h-full object-cover group-hover:scale-110 transition duration-500" src="https://images.unsplash.com/photo-1581092160607-ee22621dd758?q=80&amp;w=800&amp;auto=format&amp;fit=crop"/>
<div class="absolute inset-0 bg-gradient-to-t from-ink via-transparent to-transparent"></div>
</div>
<div class="p-6 space-y-3">
<h3 class="font-playfair text-xl font-bold text-parchment group-hover:text-gold transition">Technical &amp; Engineering</h3>
<p class="text-xs text-parchment/70 leading-relaxed">User manuals, CAD specifications, safety data sheets (SDS), and industrial machinery guides.</p>
<a class="inline-flex items-center text-xs font-serif text-gold group-hover:text-rose transition gap-2 pt-2" href="#estimator">
<span>Request Appraisal</span> <i class="fa-solid fa-arrow-right text-[10px]"></i>
</a>
</div>
</div>
<!-- Category 6: Website & App Localization -->
<div class="group relative bg-ink-light rounded-xl overflow-hidden border border-gold/20 hover:border-rose transition-all duration-300">
<div class="h-48 overflow-hidden relative">
<img alt="Software Website" class="w-full h-full object-cover group-hover:scale-110 transition duration-500" src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&amp;w=800&amp;auto=format&amp;fit=crop"/>
<div class="absolute inset-0 bg-gradient-to-t from-ink via-transparent to-transparent"></div>
</div>
<div class="p-6 space-y-3">
<h3 class="font-playfair text-xl font-bold text-parchment group-hover:text-gold transition">Website &amp; Software</h3>
<p class="text-xs text-parchment/70 leading-relaxed">UI/UX string translation, JSON/PO localization, e-commerce stores, and SEO content adaptation.</p>
<a class="inline-flex items-center text-xs font-serif text-gold group-hover:text-rose transition gap-2 pt-2" href="#estimator">
<span>Request Appraisal</span> <i class="fa-solid fa-arrow-right text-[10px]"></i>
</a>
</div>
</div>
<!-- Category 7: Creative & Marketing -->
<div class="group relative bg-ink-light rounded-xl overflow-hidden border border-gold/20 hover:border-rose transition-all duration-300">
<div class="h-48 overflow-hidden relative">
<img alt="Creative Marketing" class="w-full h-full object-cover group-hover:scale-110 transition duration-500" src="https://images.unsplash.com/photo-1542744094-3a3121699493?q=80&amp;w=800&amp;auto=format&amp;fit=crop"/>
<div class="absolute inset-0 bg-gradient-to-t from-ink via-transparent to-transparent"></div>
</div>
<div class="p-6 space-y-3">
<h3 class="font-playfair text-xl font-bold text-parchment group-hover:text-gold transition">Transcreation &amp; Ads</h3>
<p class="text-xs text-parchment/70 leading-relaxed">Advertising copy, brand taglines, social media campaigns, and culturally sensitive transcreation.</p>
<a class="inline-flex items-center text-xs font-serif text-gold group-hover:text-rose transition gap-2 pt-2" href="#estimator">
<span>Request Appraisal</span> <i class="fa-solid fa-arrow-right text-[10px]"></i>
</a>
</div>
</div>
<!-- Category 8: Subtitling & Audiovisual -->
<div class="group relative bg-ink-light rounded-xl overflow-hidden border border-gold/20 hover:border-rose transition-all duration-300">
<div class="h-48 overflow-hidden relative">
<img alt="Subtitling Video" class="w-full h-full object-cover group-hover:scale-110 transition duration-500" src="https://images.unsplash.com/photo-1598899134739-24c46f58b8c0?q=80&amp;w=800&amp;auto=format&amp;fit=crop"/>
<div class="absolute inset-0 bg-gradient-to-t from-ink via-transparent to-transparent"></div>
</div>
<div class="p-6 space-y-3">
<h3 class="font-playfair text-xl font-bold text-parchment group-hover:text-gold transition">Media &amp; Subtitles</h3>
<p class="text-xs text-parchment/70 leading-relaxed">SRT subtitle alignment, dubbing scripts, podcast transcriptions, and video translation.</p>
<a class="inline-flex items-center text-xs font-serif text-gold group-hover:text-rose transition gap-2 pt-2" href="#estimator">
<span>Request Appraisal</span> <i class="fa-solid fa-arrow-right text-[10px]"></i>
</a>
</div>
</div>
</div>
</div>
</section>
<!-- INSTANT COST & TURNAROUND ESTIMATOR -->
<section class="py-20 px-4 md:px-12 max-w-7xl mx-auto" id="estimator">
<div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
<!-- Left Info Panel -->
<div class="lg:col-span-5 space-y-6">
<span class="text-xs font-serif uppercase tracking-widest text-rose font-bold block">Instant Calculator</span>
<h2 class="font-playfair text-3xl md:text-5xl font-bold text-ink">Translation Cost &amp; Delivery Estimator</h2>
<p class="text-sm text-ink/70 leading-relaxed font-sans">
                    Configure your document specifications below for an immediate fee estimate and preliminary delivery schedule.
                </p>
<!-- Document Format Chips -->
<div class="pt-4 border-t border-ink/10 space-y-3">
<span class="text-xs font-serif uppercase text-ink/80 font-bold block">Supported Formats</span>
<div class="flex flex-wrap gap-2 text-xs">
<span class="px-3 py-1.5 bg-parchment-dark rounded border border-ink/10 text-ink font-mono"><i class="fa-solid fa-file-pdf text-red-600 mr-1"></i> PDF</span>
<span class="px-3 py-1.5 bg-parchment-dark rounded border border-ink/10 text-ink font-mono"><i class="fa-solid fa-file-word text-blue-600 mr-1"></i> DOCX</span>
<span class="px-3 py-1.5 bg-parchment-dark rounded border border-ink/10 text-ink font-mono"><i class="fa-solid fa-file-excel text-green-600 mr-1"></i> XLSX</span>
<span class="px-3 py-1.5 bg-parchment-dark rounded border border-ink/10 text-ink font-mono"><i class="fa-solid fa-file-powerpoint text-orange-600 mr-1"></i> PPTX</span>
<span class="px-3 py-1.5 bg-parchment-dark rounded border border-ink/10 text-ink font-mono"><i class="fa-solid fa-camera text-gray-600 mr-1"></i> Scans/OCR</span>
</div>
</div>
<div class="p-4 bg-gold/10 border border-gold/30 rounded-lg text-xs text-ink/80 flex items-start space-x-3">
<i class="fa-solid fa-shield-halved text-rose text-base mt-0.5"></i>
<span><strong>Strict NDA Guarantee:</strong> All uploaded manuscripts and details are handled strictly according to ISO 27001 data protection standards.</span>
</div>
</div>
<!-- Right Estimator Interactive Form -->
<div class="lg:col-span-7 bg-parchment-dark/70 rounded-2xl p-6 md:p-10 border border-ink/15 shadow-lg">
<form class="space-y-6" id="calculatorForm" onsubmit="event.preventDefault();">
<!-- Language Selection Row -->
<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
<div>
<label class="block text-xs uppercase font-serif tracking-widest text-ink/80 font-bold mb-2">Source Language</label>
<select class="w-full bg-parchment border border-ink/20 rounded-lg p-3 text-xs font-sans" id="calcSource" onchange="calculateEstimate()">
<option value="en">English</option>
<option value="id">Indonesian</option>
<option value="ja">Japanese</option>
<option value="fr">French</option>
<option value="de">German</option>
<option value="zh">Mandarin Chinese</option>
</select>
</div>
<div>
<label class="block text-xs uppercase font-serif tracking-widest text-ink/80 font-bold mb-2">Target Language</label>
<select class="w-full bg-parchment border border-ink/20 rounded-lg p-3 text-xs font-sans" id="calcTarget" onchange="calculateEstimate()">
<option value="id">Indonesian</option>
<option value="en">English</option>
<option value="ja">Japanese</option>
<option value="fr">French</option>
<option value="de">German</option>
<option value="zh">Mandarin Chinese</option>
</select>
</div>
</div>
<!-- Category & Sworn Options -->
<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
<div>
<label class="block text-xs uppercase font-serif tracking-widest text-ink/80 font-bold mb-2">Document Category</label>
<select class="w-full bg-parchment border border-ink/20 rounded-lg p-3 text-xs font-sans" id="calcCategory" onchange="calculateEstimate()">
<option value="general">General Text ($0.09/word)</option>
<option value="business">Business &amp; Corporate ($0.12/word)</option>
<option value="legal">Legal &amp; Sworn ($0.16/word)</option>
<option value="medical">Medical &amp; Scientific ($0.18/word)</option>
<option value="technical">Technical Manuals ($0.14/word)</option>
</select>
</div>
<div>
<label class="block text-xs uppercase font-serif tracking-widest text-ink/80 font-bold mb-2">Urgency Speed</label>
<select class="w-full bg-parchment border border-ink/20 rounded-lg p-3 text-xs font-sans" id="calcUrgency" onchange="calculateEstimate()">
<option value="1">Standard Speed (3-4 Days)</option>
<option value="1.3">Express Speed (48 Hours +30%)</option>
<option value="1.8">Urgent Speed (24 Hours +80%)</option>
</select>
</div>
</div>
<!-- Slider for Word Count -->
<div class="space-y-2">
<div class="flex justify-between items-center">
<label class="text-xs uppercase font-serif tracking-widest text-ink/80 font-bold">Estimated Word Count</label>
<span class="text-sm font-mono font-bold text-rose" id="wordCountLabel">1,500 Words</span>
</div>
<input class="w-full accent-rose cursor-pointer" id="wordSlider" max="15000" min="250" oninput="calculateEstimate()" step="250" type="range" value="1500"/>
<div class="flex justify-between text-[10px] text-ink/50 font-mono">
<span>250 Words (1 Page)</span>
<span>5,000 Words</span>
<span>15,000+ Words</span>
</div>
</div>
<!-- Output Estimation Box -->
<div class="bg-ink text-parchment rounded-xl p-6 border border-gold/40 space-y-4">
<div class="flex flex-col sm:flex-row justify-between sm:items-center gap-4 border-b border-parchment/10 pb-4">
<div>
<span class="text-[11px] uppercase tracking-widest text-gold block">Estimated Total</span>
<div class="text-3xl font-playfair font-bold text-parchment" id="calcPriceUSD">$216.00 <span class="text-xs font-normal text-parchment/60 font-sans">USD</span></div>
<div class="text-xs text-gold font-mono" id="calcPriceIDR">≈ Rp 3,450,000 IDR</div>
</div>
<div class="text-right">
<span class="text-[11px] uppercase tracking-widest text-parchment/60 block">Est. Delivery Date</span>
<div class="text-sm font-serif font-semibold text-rose" id="calcDeliveryDate">Nov 9, 2026</div>
<span class="text-[10px] text-parchment/50">Includes Editing &amp; Proofreading</span>
</div>
</div>
<!-- Formal Action CTA -->
<div class="pt-2 flex flex-col sm:flex-row gap-3">
<button class="flex-1 py-3 bg-rose text-white font-serif text-xs uppercase tracking-widest hover:bg-rose/90 transition rounded text-center" onclick="openUploadModal()" type="button">
                                Proceed with Order
                            </button>
<button class="py-3 px-4 bg-ink-light text-gold border border-gold/40 font-serif text-xs uppercase tracking-widest hover:bg-gold hover:text-ink transition rounded text-center" onclick="downloadQuotePDF()" type="button">
<i class="fa-solid fa-file-pdf mr-1"></i> Download Quote
                            </button>
</div>
</div>
</form>
</div>
</div>
</section>
<!-- PROFESSIONAL INTERPRETER SERVICES & DIRECTORY -->
<section class="py-20 bg-ink text-parchment" id="interpreters">
<div class="max-w-7xl mx-auto px-4 md:px-12 space-y-16">
<div class="text-center max-w-3xl mx-auto space-y-4">
<span class="text-xs font-serif uppercase tracking-widest text-gold font-bold block">Live Oral Spoken Translation</span>
<h2 class="font-playfair text-3xl md:text-5xl font-bold">Professional Interpreter Services</h2>
<div class="w-16 h-0.5 bg-rose mx-auto"></div>
<p class="text-sm text-parchment/70 font-sans">
                    On-site and remote interpretation solutions for global summits, courtroom trials, diplomatic talks, and corporate negotiations.
                </p>
</div>
<!-- Interpretation Modes Grid -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-6">
<div class="p-6 rounded-xl bg-ink-light border border-parchment/10 hover:border-gold transition">
<div class="w-12 h-12 rounded-full bg-rose/20 text-rose flex items-center justify-center text-xl mb-4">
<i class="fa-solid fa-headset"></i>
</div>
<h3 class="font-playfair text-lg font-bold text-parchment mb-2">Simultaneous</h3>
<p class="text-xs text-parchment/70">Real-time interpretation in soundproof booths with headsets. Ideal for large international conferences.</p>
</div>
<div class="p-6 rounded-xl bg-ink-light border border-parchment/10 hover:border-gold transition">
<div class="w-12 h-12 rounded-full bg-gold/20 text-gold flex items-center justify-center text-xl mb-4">
<i class="fa-solid fa-comments"></i>
</div>
<h3 class="font-playfair text-lg font-bold text-parchment mb-2">Consecutive</h3>
<p class="text-xs text-parchment/70">Interpreter speaks after the speaker pauses. Perfect for press briefings, depositions, and business dinners.</p>
</div>
<div class="p-6 rounded-xl bg-ink-light border border-parchment/10 hover:border-gold transition">
<div class="w-12 h-12 rounded-full bg-rose/20 text-rose flex items-center justify-center text-xl mb-4">
<i class="fa-solid fa-ear-listen"></i>
</div>
<h3 class="font-playfair text-lg font-bold text-parchment mb-2">Whispered (Chuchotage)</h3>
<p class="text-xs text-parchment/70">Subtle whispered rendering directly to one or two listeners in private high-level meetings.</p>
</div>
<div class="p-6 rounded-xl bg-ink-light border border-parchment/10 hover:border-gold transition">
<div class="w-12 h-12 rounded-full bg-gold/20 text-gold flex items-center justify-center text-xl mb-4">
<i class="fa-solid fa-video"></i>
</div>
<h3 class="font-playfair text-lg font-bold text-parchment mb-2">Remote Video (RSI)</h3>
<p class="text-xs text-parchment/70">Cloud-based interpretation integrated with Zoom, Webex, or Teams for remote international sessions.</p>
</div>
</div>
<!-- Interpreter Directory List -->
<div class="space-y-6">
<div class="flex justify-between items-center border-b border-parchment/10 pb-4">
<h3 class="font-playfair text-2xl font-bold text-parchment">Certified Interpreter Directory</h3>
<span class="text-xs text-gold font-mono">14 Specialists On-Duty</span>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
<!-- Interpreter Card 1 -->
<div class="p-6 rounded-xl bg-ink-light border border-gold/20 space-y-4 relative">
<div class="flex items-center space-x-4">
<img alt="Interpreter Profile" class="w-16 h-16 rounded-full object-cover border-2 border-gold" src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?q=80&amp;w=300&amp;auto=format&amp;fit=crop"/>
<div>
<h4 class="font-playfair text-lg font-bold text-parchment">Dr. Eleanor Vance</h4>
<p class="text-xs text-gold font-serif">Diplomatic &amp; Legal Specialist</p>
<span class="text-[10px] text-parchment/50 font-mono">EN ⇄ FR / DE • 14 Yrs Exp</span>
</div>
</div>
<p class="text-xs text-parchment/70">Served at UN Summits, European Court of Human Rights, and international arbitrations.</p>
<!-- Sample Audio Player Simulation -->
<div class="p-3 bg-ink rounded-lg flex items-center justify-between">
<button class="text-xs text-gold hover:text-rose flex items-center gap-2 font-mono" onclick="playVoiceSample('eleanor')">
<i class="fa-solid fa-circle-play text-lg" id="icon-eleanor"></i>
<span>Voice Preview Sample</span>
</button>
<span class="text-[10px] text-parchment/40">00:24</span>
</div>
<button class="w-full py-2 bg-rose/20 text-rose border border-rose/40 rounded text-xs font-serif uppercase tracking-widest hover:bg-rose hover:text-white transition" onclick="openBookingModal('Dr. Eleanor Vance')">
                            Book Session
                        </button>
</div>
<!-- Interpreter Card 2 -->
<div class="p-6 rounded-xl bg-ink-light border border-gold/20 space-y-4 relative">
<div class="flex items-center space-x-4">
<img alt="Interpreter Profile" class="w-16 h-16 rounded-full object-cover border-2 border-gold" src="https://images.unsplash.com/photo-1560250097-0b93528c311a?q=80&amp;w=300&amp;auto=format&amp;fit=crop"/>
<div>
<h4 class="font-playfair text-lg font-bold text-parchment">Kenji Sato</h4>
<p class="text-xs text-gold font-serif">Financial &amp; Tech Specialist</p>
<span class="text-[10px] text-parchment/50 font-mono">JA ⇄ EN / ID • 11 Yrs Exp</span>
</div>
</div>
<p class="text-xs text-parchment/70">Specialized in corporate M&amp;A keynotes, automotive engineering conventions, and Tokyo trade talks.</p>
<div class="p-3 bg-ink rounded-lg flex items-center justify-between">
<button class="text-xs text-gold hover:text-rose flex items-center gap-2 font-mono" onclick="playVoiceSample('kenji')">
<i class="fa-solid fa-circle-play text-lg" id="icon-kenji"></i>
<span>Voice Preview Sample</span>
</button>
<span class="text-[10px] text-parchment/40">00:18</span>
</div>
<button class="w-full py-2 bg-rose/20 text-rose border border-rose/40 rounded text-xs font-serif uppercase tracking-widest hover:bg-rose hover:text-white transition" onclick="openBookingModal('Kenji Sato')">
                            Book Session
                        </button>
</div>
<!-- Interpreter Card 3 -->
<div class="p-6 rounded-xl bg-ink-light border border-gold/20 space-y-4 relative">
<div class="flex items-center space-x-4">
<img alt="Interpreter Profile" class="w-16 h-16 rounded-full object-cover border-2 border-gold" src="https://images.unsplash.com/photo-1580489944761-15a19d654956?q=80&amp;w=300&amp;auto=format&amp;fit=crop"/>
<div>
<h4 class="font-playfair text-lg font-bold text-parchment">Siti Rahmah, S.S., M.Hum.</h4>
<p class="text-xs text-gold font-serif">Sworn Arabic &amp; English Court Specialist</p>
<span class="text-[10px] text-parchment/50 font-mono">AR ⇄ ID / EN • 16 Yrs Exp</span>
</div>
</div>
<p class="text-xs text-parchment/70">Official court-sworn interpreter for energy summits, Islamic finance conventions, and embassy delegations.</p>
<div class="p-3 bg-ink rounded-lg flex items-center justify-between">
<button class="text-xs text-gold hover:text-rose flex items-center gap-2 font-mono" onclick="playVoiceSample('siti')">
<i class="fa-solid fa-circle-play text-lg" id="icon-siti"></i>
<span>Voice Preview Sample</span>
</button>
<span class="text-[10px] text-parchment/40">00:30</span>
</div>
<button class="w-full py-2 bg-rose/20 text-rose border border-rose/40 rounded text-xs font-serif uppercase tracking-widest hover:bg-rose hover:text-white transition" onclick="openBookingModal('Siti Rahmah')">
                            Book Session
                        </button>
</div>
</div>
</div>
</div>
</section>
<!-- TRANSLATION SAMPLE GALLERY (Interactive Side-by-Side Comparison) -->
<section class="py-20 px-4 md:px-12 max-w-7xl mx-auto" id="gallery">
<div class="text-center max-w-3xl mx-auto space-y-4 mb-16">
<span class="text-xs font-serif uppercase tracking-widest text-rose font-bold block">Fidelity &amp; Style</span>
<h2 class="font-playfair text-3xl md:text-5xl font-bold text-ink">Translation Sample Gallery</h2>
<div class="w-16 h-0.5 bg-gold mx-auto"></div>
<p class="text-sm text-ink/70 font-sans">
                Examine raw original manuscripts alongside our finalized target renderings showcasing stylistic nuance and terminology fidelity.
            </p>
</div>
<!-- Category Selector Tabs -->
<div class="flex flex-wrap justify-center gap-2 mb-8">
<button class="px-5 py-2 rounded-full text-xs font-serif uppercase tracking-wider bg-ink text-gold border border-ink" id="sampleBtn-legal" onclick="switchSample('legal')">Legal Deed</button>
<button class="px-5 py-2 rounded-full text-xs font-serif uppercase tracking-wider bg-parchment-dark text-ink hover:bg-ink hover:text-gold transition" id="sampleBtn-medical" onclick="switchSample('medical')">Medical Protocol</button>
<button class="px-5 py-2 rounded-full text-xs font-serif uppercase tracking-wider bg-parchment-dark text-ink hover:bg-ink hover:text-gold transition" id="sampleBtn-marketing" onclick="switchSample('marketing')">Luxury Brand Copy</button>
</div>
<!-- Side-by-Side Comparison Box -->
<div class="bg-parchment-dark/70 rounded-2xl p-6 md:p-10 border border-ink/15 shadow-md grid grid-cols-1 md:grid-cols-2 gap-8">
<!-- Left Original Box -->
<div class="bg-parchment rounded-xl p-6 border border-ink/10 space-y-4">
<div class="flex justify-between items-center border-b border-ink/10 pb-3">
<span class="text-xs uppercase font-serif tracking-widest text-ink/60 font-bold" id="sampleOrigLang">Original Text (English)</span>
<span class="text-[10px] bg-ink/10 px-2 py-0.5 rounded font-mono">Source Deed</span>
</div>
<div class="font-serif italic text-sm leading-relaxed text-ink/80 space-y-3" id="sampleOrigBody">
                    "The Licensee agrees to indemnify, defend, and hold harmless the Licensor from and against any and all claims, liabilities, losses, damages, or expenses arising out of any breach of warranty."
                </div>
</div>
<!-- Right Translated Result Box -->
<div class="bg-ink text-parchment rounded-xl p-6 border border-rose/30 space-y-4 relative overflow-hidden">
<div class="absolute top-0 right-0 w-16 h-16 bg-rose/10 rounded-bl-full pointer-events-none"></div>
<div class="flex justify-between items-center border-b border-parchment/10 pb-3">
<span class="text-xs uppercase font-serif tracking-widest text-gold font-bold" id="sampleTransLang">Translated Result (Indonesian - Sworn)</span>
<span class="text-[10px] bg-rose text-white px-2 py-0.5 rounded font-mono">Sworn Verified</span>
</div>
<div class="font-serif text-sm leading-relaxed text-parchment/90 space-y-3" id="sampleTransBody">
                    "Penerima Lisensi setuju untuk mengganti rugi, membela, dan membebaskan Pemberi Lisensi dari dan terhadap setiap dan seluruh klaim, kewajiban, kerugian, kerusakan, atau biaya yang timbul dari pelanggaran jaminan."
                </div>
</div>
</div>
</section>
<!-- QUALITY ASSURANCE WORKFLOW -->
<section class="py-20 bg-ink text-parchment border-t border-b border-gold/20">
<div class="max-w-7xl mx-auto px-4 md:px-12 space-y-16">
<div class="text-center max-w-3xl mx-auto space-y-4">
<span class="text-xs font-serif uppercase tracking-widest text-gold font-bold block">Rigorous Standard</span>
<h2 class="font-playfair text-3xl md:text-5xl font-bold">4-Stage Quality Assurance Workflow</h2>
<p class="text-sm text-parchment/70 font-sans">Compliant with International Quality Management Standard ISO 17100:2015.</p>
</div>
<div class="grid grid-cols-1 md:grid-cols-4 gap-6">
<div class="p-6 bg-ink-light rounded-xl border border-gold/20 relative space-y-3">
<span class="text-3xl font-playfair font-bold text-rose">01</span>
<h3 class="font-playfair text-lg font-bold text-parchment">Native Translation</h3>
<p class="text-xs text-parchment/70">Drafting by a native speaker translator holding degree qualifications in the target subject matter.</p>
</div>
<div class="p-6 bg-ink-light rounded-xl border border-gold/20 relative space-y-3">
<span class="text-3xl font-playfair font-bold text-gold">02</span>
<h3 class="font-playfair text-lg font-bold text-parchment">Bilingual Editing</h3>
<p class="text-xs text-parchment/70">Secondary senior linguist compares target sentence-by-sentence against original source manuscript.</p>
</div>
<div class="p-6 bg-ink-light rounded-xl border border-gold/20 relative space-y-3">
<span class="text-3xl font-playfair font-bold text-rose">03</span>
<h3 class="font-playfair text-lg font-bold text-parchment">Monolingual Proofreading</h3>
<p class="text-xs text-parchment/70">Pure target language specialist verifies flow, style, typography, punctuation, and readability.</p>
</div>
<div class="p-6 bg-ink-light rounded-xl border border-gold/20 relative space-y-3">
<span class="text-3xl font-playfair font-bold text-gold">04</span>
<h3 class="font-playfair text-lg font-bold text-parchment">Final Quality Control</h3>
<p class="text-xs text-parchment/70">Project director checks layout formatting, official stamps, sworn affidavits, and dispatch seals.</p>
</div>
</div>
</div>
</section>
<!-- TERMINOLOGY & GLOSSARY MANAGEMENT PREVIEW -->
<section class="py-20 px-4 md:px-12 max-w-7xl mx-auto">
<div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
<div class="lg:col-span-5 space-y-6">
<span class="text-xs font-serif uppercase tracking-widest text-rose font-bold block">Enterprise Termbase</span>
<h2 class="font-playfair text-3xl md:text-5xl font-bold text-ink">Custom Glossary &amp; Terminology Management</h2>
<p class="text-sm text-ink/70 leading-relaxed font-sans">
                    We create and maintain dedicated brand glossaries for corporate clients to ensure absolute brand voice consistency across all translated global assets.
                </p>
<div class="space-y-2">
<div class="flex items-center space-x-3 text-xs text-ink/80">
<i class="fa-solid fa-check text-rose"></i>
<span>Consistency across multi-lingual corporate documentation.</span>
</div>
<div class="flex items-center space-x-3 text-xs text-ink/80">
<i class="fa-solid fa-check text-rose"></i>
<span>Integrated with SDL Trados &amp; MemoQ termbase engines.</span>
</div>
</div>
</div>
<!-- Interactive Termbase Search Demo -->
<div class="lg:col-span-7 bg-parchment-dark/60 p-6 md:p-8 rounded-2xl border border-ink/15 shadow-sm space-y-4">
<div class="flex items-center justify-between">
<span class="text-xs font-serif uppercase font-bold text-ink">Interactive Termbase Search</span>
<span class="text-[10px] font-mono text-rose">Live Demo database</span>
</div>
<div class="relative">
<input class="w-full bg-parchment border border-ink/20 rounded-lg p-3 text-xs font-sans pl-10 focus:outline-none focus:border-rose" id="termSearchInput" onkeyup="filterGlossary()" placeholder="Type to search term e.g. 'force majeure', 'clinical trial'..." type="text"/>
<i class="fa-solid fa-magnifying-glass absolute left-3 top-3.5 text-ink/40 text-xs"></i>
</div>
<div class="bg-parchment rounded-xl border border-ink/10 overflow-hidden divide-y divide-ink/10 text-xs">
<div class="p-3 bg-ink/5 font-serif font-bold text-ink flex justify-between">
<span>Source Term</span>
<span>Approved Target Translation</span>
<span>Context Domain</span>
</div>
<div class="p-3 flex justify-between items-center glossary-row">
<span class="font-semibold text-ink">Force Majeure</span>
<span class="text-rose font-serif">Keadaan Memaksa / Overmacht</span>
<span class="text-[10px] bg-ink/10 px-2 py-0.5 rounded font-mono">Legal</span>
</div>
<div class="p-3 flex justify-between items-center glossary-row">
<span class="font-semibold text-ink">Clinical Trial Phase III</span>
<span class="text-rose font-serif">Uji Klinis Tahap III</span>
<span class="text-[10px] bg-ink/10 px-2 py-0.5 rounded font-mono">Medical</span>
</div>
<div class="p-3 flex justify-between items-center glossary-row">
<span class="font-semibold text-ink">EBITDA Margin</span>
<span class="text-rose font-serif">Margin EBITDA</span>
<span class="text-[10px] bg-ink/10 px-2 py-0.5 rounded font-mono">Finance</span>
</div>
<div class="p-3 flex justify-between items-center glossary-row">
<span class="font-semibold text-ink">Intellectual Property</span>
<span class="text-rose font-serif">Hak Kekayaan Intelektual (HKI)</span>
<span class="text-[10px] bg-ink/10 px-2 py-0.5 rounded font-mono">Legal</span>
</div>
</div>
</div>
</div>
</section>
<!-- TRANSLATION PACKAGE COMPARISON MATRIX -->
<section class="py-20 bg-ink text-parchment" id="packages">
<div class="max-w-7xl mx-auto px-4 md:px-12 space-y-16">
<div class="text-center max-w-3xl mx-auto space-y-4">
<span class="text-xs font-serif uppercase tracking-widest text-gold font-bold block">Transparent Investment</span>
<h2 class="font-playfair text-3xl md:text-5xl font-bold">Service Package Matrix</h2>
<div class="w-16 h-0.5 bg-rose mx-auto"></div>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
<!-- Package 1 -->
<div class="bg-ink-light rounded-2xl p-8 border border-parchment/10 hover:border-gold transition space-y-6 flex flex-col justify-between">
<div class="space-y-4">
<span class="text-xs font-serif uppercase tracking-widest text-gold block">Standard Tier</span>
<h3 class="font-playfair text-2xl font-bold text-parchment">Essential Business</h3>
<div class="text-3xl font-playfair font-bold text-gold">$0.09 <span class="text-xs font-sans text-parchment/60 font-normal">/ word</span></div>
<p class="text-xs text-parchment/70">Designed for non-sworn corporate manuals, newsletters, blogs, and internal emails.</p>
<ul class="text-xs text-parchment/80 space-y-2 pt-4 border-t border-parchment/10">
<li><i class="fa-solid fa-check text-gold mr-2"></i> Single Native Translator</li>
<li><i class="fa-solid fa-check text-gold mr-2"></i> Quality Proofreading</li>
<li><i class="fa-solid fa-check text-gold mr-2"></i> 3-Day Turnaround</li>
<li class="text-parchment/30"><i class="fa-solid fa-xmark mr-2"></i> Sworn Court Stamp</li>
</ul>
</div>
<a class="w-full py-3 bg-parchment/10 text-parchment rounded text-xs font-serif uppercase tracking-widest hover:bg-gold hover:text-ink transition text-center block" href="#estimator">Select Package</a>
</div>
<!-- Package 2 (Featured Sworn) -->
<div class="bg-ink-light rounded-2xl p-8 border-2 border-rose shadow-xl space-y-6 flex flex-col justify-between relative transform lg:-translate-y-2">
<span class="absolute -top-3 left-1/2 -translate-x-1/2 bg-rose text-white text-[10px] font-serif uppercase tracking-widest px-4 py-1 rounded-full">Most Requested</span>
<div class="space-y-4">
<span class="text-xs font-serif uppercase tracking-widest text-rose block">Certified Tier</span>
<h3 class="font-playfair text-2xl font-bold text-parchment">Certified &amp; Sworn</h3>
<div class="text-3xl font-playfair font-bold text-rose">$0.16 <span class="text-xs font-sans text-parchment/60 font-normal">/ word</span></div>
<p class="text-xs text-parchment/70">Official legal documents, visas, birth certificates, court deeds, and embassy filings.</p>
<ul class="text-xs text-parchment/80 space-y-2 pt-4 border-t border-parchment/10">
<li><i class="fa-solid fa-check text-rose mr-2"></i> Sworn Court-Appointed Translator</li>
<li><i class="fa-solid fa-check text-rose mr-2"></i> Official Embossed Stamp &amp; Seal</li>
<li><i class="fa-solid fa-check text-rose mr-2"></i> Certificate of Accuracy Included</li>
<li><i class="fa-solid fa-check text-rose mr-2"></i> Express 48h Delivery</li>
</ul>
</div>
<a class="w-full py-3 bg-rose text-white rounded text-xs font-serif uppercase tracking-widest hover:bg-rose/90 transition text-center block shadow" href="#estimator">Select Package</a>
</div>
<!-- Package 3 -->
<div class="bg-ink-light rounded-2xl p-8 border border-parchment/10 hover:border-gold transition space-y-6 flex flex-col justify-between">
<div class="space-y-4">
<span class="text-xs font-serif uppercase tracking-widest text-gold block">Enterprise Tier</span>
<h3 class="font-playfair text-2xl font-bold text-parchment">Global Enterprise</h3>
<div class="text-3xl font-playfair font-bold text-gold">Custom <span class="text-xs font-sans text-parchment/60 font-normal">/ volume quote</span></div>
<p class="text-xs text-parchment/70">Bulk localization, continuous website translation API, dedicated team lead &amp; customized termbase.</p>
<ul class="text-xs text-parchment/80 space-y-2 pt-4 border-t border-parchment/10">
<li><i class="fa-solid fa-check text-gold mr-2"></i> Dedicated Project Lead</li>
<li><i class="fa-solid fa-check text-gold mr-2"></i> Custom Brand Termbase</li>
<li><i class="fa-solid fa-check text-gold mr-2"></i> API Translation Connectors</li>
<li><i class="fa-solid fa-check text-gold mr-2"></i> 24/7 Priority SLA</li>
</ul>
</div>
<a class="w-full py-3 bg-parchment/10 text-parchment rounded text-xs font-serif uppercase tracking-widest hover:bg-gold hover:text-ink transition text-center block" href="#estimator">Contact Corporate</a>
</div>
</div>
</div>
</section>
<!-- CLIENT TESTIMONIALS & CASE STUDIES -->
<section class="py-20 px-4 md:px-12 max-w-7xl mx-auto">
<div class="text-center max-w-3xl mx-auto space-y-4 mb-16">
<span class="text-xs font-serif uppercase tracking-widest text-rose font-bold block">Client Endorsements</span>
<h2 class="font-playfair text-3xl md:text-5xl font-bold text-ink">Words of Trust</h2>
<div class="w-16 h-0.5 bg-gold mx-auto"></div>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
<div class="p-8 bg-parchment-dark/60 rounded-2xl border border-ink/10 space-y-4 relative">
<i class="fa-solid fa-quote-left text-3xl text-gold/40"></i>
<p class="text-xs font-serif italic text-ink/80 leading-relaxed">
                    "VERBA rendered our 400-page cross-border merger agreement in Japanese and English within 48 hours. The legal precision was praised by our Tokyo counsel."
                </p>
<div class="pt-4 border-t border-ink/10 flex items-center space-x-3">
<img alt="Client Headshot" class="w-10 h-10 rounded-full object-cover" src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?q=80&amp;w=150&amp;auto=format&amp;fit=crop"/>
<div>
<h4 class="font-playfair font-bold text-sm text-ink">Victoria Sterling</h4>
<span class="text-[10px] text-ink/60">Senior Legal Partner • Sterling &amp; Co. London</span>
</div>
</div>
</div>
<div class="p-8 bg-parchment-dark/60 rounded-2xl border border-ink/10 space-y-4 relative">
<i class="fa-solid fa-quote-left text-3xl text-rose/40"></i>
<p class="text-xs font-serif italic text-ink/80 leading-relaxed">
                    "Their simultaneous interpreters at the G20 Climate Summit delivered flawless whisper and booth interpretation across French, Arabic, and Indonesian."
                </p>
<div class="pt-4 border-t border-ink/10 flex items-center space-x-3">
<img alt="Client Headshot" class="w-10 h-10 rounded-full object-cover" src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&amp;w=150&amp;auto=format&amp;fit=crop"/>
<div>
<h4 class="font-playfair font-bold text-sm text-ink">Bambang Suryo</h4>
<span class="text-[10px] text-ink/60">Director • ASEAN Trade Secretariat</span>
</div>
</div>
</div>
<div class="p-8 bg-parchment-dark/60 rounded-2xl border border-ink/10 space-y-4 relative">
<i class="fa-solid fa-quote-left text-3xl text-gold/40"></i>
<p class="text-xs font-serif italic text-ink/80 leading-relaxed">
                    "Translating luxury literary prose requires soul, not just algorithms. VERBA's editorial house captured our brand's poetic essence beautifully."
                </p>
<div class="pt-4 border-t border-ink/10 flex items-center space-x-3">
<img alt="Client Headshot" class="w-10 h-10 rounded-full object-cover" src="https://images.unsplash.com/photo-1517841905240-472988babdf9?q=80&amp;w=150&amp;auto=format&amp;fit=crop"/>
<div>
<h4 class="font-playfair font-bold text-sm text-ink">Camille Laurent</h4>
<span class="text-[10px] text-ink/60">Editor-in-Chief • Éditions Parisienne</span>
</div>
</div>
</div>
</div>
</section>
<!-- FAQ ACCORDION SECTION -->
<section class="py-20 bg-ink text-parchment">
<div class="max-w-4xl mx-auto px-4 md:px-12 space-y-12">
<div class="text-center space-y-4">
<span class="text-xs font-serif uppercase tracking-widest text-gold font-bold block">Inquiries</span>
<h2 class="font-playfair text-3xl md:text-5xl font-bold">Frequently Asked Questions</h2>
</div>
<div class="space-y-4">
<!-- FAQ Item 1 -->
<div class="bg-ink-light rounded-xl border border-parchment/10 overflow-hidden">
<button class="w-full p-5 text-left font-playfair font-bold text-base text-parchment flex justify-between items-center hover:text-gold transition" onclick="toggleFaq(1)">
<span>What is the difference between a Sworn and Standard translation?</span>
<i class="fa-solid fa-plus text-xs text-gold" id="faqIcon-1"></i>
</button>
<div class="hidden p-5 pt-0 text-xs text-parchment/70 font-sans leading-relaxed border-t border-parchment/5" id="faqAns-1">
                        A Sworn Translation is executed by a court-appointed linguist who takes an official oath before the Ministry of Law &amp; Human Rights. It bears an official physical stamp, seal, and affidavit of accuracy, making it legally binding for court proceedings, visa applications, and embassy submissions.
                    </div>
</div>
<!-- FAQ Item 2 -->
<div class="bg-ink-light rounded-xl border border-parchment/10 overflow-hidden">
<button class="w-full p-5 text-left font-playfair font-bold text-base text-parchment flex justify-between items-center hover:text-gold transition" onclick="toggleFaq(2)">
<span>How fast can urgent translation requests be delivered?</span>
<i class="fa-solid fa-plus text-xs text-gold" id="faqIcon-2"></i>
</button>
<div class="hidden p-5 pt-0 text-xs text-parchment/70 font-sans leading-relaxed border-t border-parchment/5" id="faqAns-2">
                        For urgent requests, we operate a 24-hour express squad capable of dispatching up to 5,000 words within 24 hours by splitting files among synchronized native translators under a single lead editor.
                    </div>
</div>
<!-- FAQ Item 3 -->
<div class="bg-ink-light rounded-xl border border-parchment/10 overflow-hidden">
<button class="w-full p-5 text-left font-playfair font-bold text-base text-parchment flex justify-between items-center hover:text-gold transition" onclick="toggleFaq(3)">
<span>How do you maintain document confidentiality and data security?</span>
<i class="fa-solid fa-plus text-xs text-gold" id="faqIcon-3"></i>
</button>
<div class="hidden p-5 pt-0 text-xs text-parchment/70 font-sans leading-relaxed border-t border-parchment/5" id="faqAns-3">
                        All linguists sign non-disclosure agreements (NDAs) subject to high legal liability. Our digital portal uses 256-bit SSL encryption, and documents are automatically purged from working servers 30 days post-dispatch.
                    </div>
</div>
</div>
</div>
</section>
<!-- EDITORIAL VINTAGE FOOTER -->
<footer class="bg-ink border-t border-gold/30 text-parchment py-16 px-4 md:px-12 text-xs">
<div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-12 gap-12">
<div class="md:col-span-4 space-y-4">
<div class="flex items-center space-x-3">
<div class="w-8 h-8 rounded-full bg-rose text-white font-playfair text-base font-bold flex items-center justify-center">V</div>
<span class="font-playfair text-xl font-bold tracking-tight text-parchment">VERBA</span>
</div>
<p class="text-parchment/60 leading-relaxed font-sans">
                    VERBA Editorial Translation House is a premiere translation &amp; diplomatic interpretation agency delivering sworn fidelity and literary elegance worldwide.
                </p>
<div class="flex space-x-4 text-gold text-base pt-2">
<a class="hover:text-rose transition" href="#"><i class="fa-brands fa-linkedin"></i></a>
<a class="hover:text-rose transition" href="#"><i class="fa-brands fa-twitter"></i></a>
<a class="hover:text-rose transition" href="#"><i class="fa-brands fa-instagram"></i></a>
</div>
</div>
<div class="md:col-span-2 space-y-3 font-sans">
<h4 class="font-serif text-gold font-bold uppercase tracking-widest text-[11px]">Services</h4>
<ul class="space-y-2 text-parchment/70">
<li><a class="hover:text-rose" href="#services">Legal Translation</a></li>
<li><a class="hover:text-rose" href="#services">Sworn Certification</a></li>
<li><a class="hover:text-rose" href="#services">Medical Dossiers</a></li>
<li><a class="hover:text-rose" href="#services">Academic Journals</a></li>
<li><a class="hover:text-rose" href="#services">Website Localization</a></li>
</ul>
</div>
<div class="md:col-span-2 space-y-3 font-sans">
<h4 class="font-serif text-gold font-bold uppercase tracking-widest text-[11px]">Global Hubs</h4>
<ul class="space-y-2 text-parchment/70">
<li>London: Mayfair HQ</li>
<li>Paris: Rue de Rivoli</li>
<li>Tokyo: Ginza Tower</li>
<li>Jakarta: SCBD District</li>
</ul>
</div>
<div class="md:col-span-4 space-y-3">
<h4 class="font-serif text-gold font-bold uppercase tracking-widest text-[11px]">Editorial Newsletter</h4>
<p class="text-parchment/60">Subscribe to 'The Global Linguist' for insights on transcreation, localization, and language dynamics.</p>
<form class="flex gap-2" onsubmit="event.preventDefault(); alert('Subscribed to Editorial Newsletter!');">
<input class="bg-ink-light border border-gold/30 rounded px-3 py-2 text-xs text-parchment focus:outline-none focus:border-rose flex-1" placeholder="Your email address" required="" type="email"/>
<button class="bg-rose text-white px-4 py-2 font-serif text-xs uppercase tracking-wider rounded hover:bg-rose/80" type="submit">Join</button>
</form>
</div>
</div>
<div class="max-w-7xl mx-auto pt-12 mt-12 border-t border-parchment/10 flex flex-col sm:flex-row justify-between items-center text-parchment/40 text-[11px] gap-4">
<div>© 2026 VERBA Editorial Translation House. All rights reserved.</div>
<div class="flex space-x-6">
<a class="hover:text-gold" href="#">Privacy Policy</a>
<a class="hover:text-gold" href="#">Terms of Service</a>
<a class="hover:text-gold" href="#">ISO 17100 Verification</a>
</div>
</div>
</footer>
<!-- SIDE-BY-SIDE FIXED BOTTOM-RIGHT FLOATING ACTION CONTROLS -->
<div class="fixed bottom-6 right-6 z-50 flex items-center space-x-3 pointer-events-auto">
<!-- Floating WhatsApp Button -->
<a class="relative group w-14 h-14 rounded-full bg-emerald-600 text-white flex items-center justify-center shadow-2xl hover:scale-110 transition duration-300 border-2 border-white" href="https://wa.me/18009843822?text=Hello%20VERBA%20Translation,%20I%20need%20a%20quick%20quote" target="_blank" title="Chat via WhatsApp">
<span class="absolute -inset-1 rounded-full bg-emerald-500 animate-ping opacity-40"></span>
<i class="fa-brands fa-whatsapp text-2xl"></i>
<span class="absolute right-16 top-1/2 -translate-y-1/2 bg-ink text-parchment text-[10px] font-serif uppercase tracking-widest px-3 py-1.5 rounded shadow-lg whitespace-nowrap opacity-0 group-hover:opacity-100 transition duration-300 pointer-events-none border border-gold/40">
                WhatsApp Express
            </span>
</a>
<!-- Floating AI Chatbot Button ('VERBA AI Multilingual Assistant') -->
<button class="relative group w-14 h-14 rounded-full rose-gold-shimmer text-white flex items-center justify-center shadow-2xl hover:scale-110 transition duration-300 border-2 border-gold/60 overflow-hidden" onclick="toggleAiModal()" title="VERBA AI Multilingual Assistant">
<!-- Animated Multilingual Particles -->
<span class="absolute top-1 left-2 text-[10px] font-bold text-gold float-symbol-1 pointer-events-none">文</span>
<span class="absolute bottom-1 right-2 text-[10px] font-bold text-parchment float-symbol-2 pointer-events-none">あ</span>
<span class="absolute top-2 right-2 text-[10px] font-bold text-white float-symbol-3 pointer-events-none">?</span>
<i class="fa-solid fa-sparkles text-xl text-parchment z-10"></i>
<span class="absolute right-16 top-1/2 -translate-y-1/2 bg-ink text-parchment text-[10px] font-serif uppercase tracking-widest px-3 py-1.5 rounded shadow-lg whitespace-nowrap opacity-0 group-hover:opacity-100 transition duration-300 pointer-events-none border border-rose/40">
                VERBA AI Assistant
            </span>
</button>
</div>
<!-- AI CHATBOT MODAL POPUP POPOVER -->
<div class="fixed inset-0 z-50 bg-ink/70 backdrop-blur-sm flex justify-end items-end p-4 md:p-6 hidden transition-all duration-300" id="aiChatModal">
<div class="w-full sm:w-[420px] bg-ink border-2 border-gold/50 rounded-2xl shadow-2xl flex flex-col h-[520px] overflow-hidden text-parchment relative">
<!-- Chat Header -->
<div class="p-4 bg-ink-light border-b border-gold/30 flex justify-between items-center rose-gold-shimmer">
<div class="flex items-center space-x-3">
<div class="w-9 h-9 rounded-full bg-ink flex items-center justify-center text-gold font-playfair font-bold text-sm border border-gold">
                        AI
                    </div>
<div>
<h4 class="font-playfair text-sm font-bold text-white">VERBA AI Linguist</h4>
<span class="text-[10px] text-parchment/80 font-mono block">Powered by Gemini 3 Flash</span>
</div>
</div>
<button class="text-white hover:text-rose transition text-lg p-1" onclick="toggleAiModal()">
<i class="fa-solid fa-xmark"></i>
</button>
</div>
<!-- Chat Message History Body -->
<div class="flex-1 p-4 overflow-y-auto space-y-3 text-xs font-sans" id="aiChatBody">
<div class="p-3 rounded-lg bg-ink-light border border-gold/20 max-w-[85%] space-y-1">
<p class="font-semibold text-gold font-serif">VERBA AI Assistant</p>
<p class="text-parchment/90">Greetings! I am your multilingual editorial advisor. Ask me for instant translation draft samples, word count estimations, or sworn compliance guidance.</p>
</div>
</div>
<!-- Quick Preset Prompts -->
<div class="p-2 bg-ink-light/50 border-t border-parchment/10 flex gap-2 overflow-x-auto text-[10px] font-mono">
<button class="px-2.5 py-1 bg-ink border border-gold/30 rounded hover:border-rose whitespace-nowrap text-gold" onclick="sendPresetAi('How much does sworn translation cost?')">💰 Sworn Rates</button>
<button class="px-2.5 py-1 bg-ink border border-gold/30 rounded hover:border-rose whitespace-nowrap text-gold" onclick="sendPresetAi('Can you translate Japanese to English?')">🇯🇵 Japanese Pair</button>
<button class="px-2.5 py-1 bg-ink border border-gold/30 rounded hover:border-rose whitespace-nowrap text-gold" onclick="sendPresetAi('What is ISO 17100 standard?')">📜 ISO 17100</button>
</div>
<!-- Chat Input Area -->
<form class="p-3 bg-ink-light border-t border-gold/30 flex gap-2 items-center" onsubmit="handleAiChatSubmit(event)">
<input class="flex-1 bg-ink border border-gold/30 rounded-lg px-3 py-2 text-xs text-parchment focus:outline-none focus:border-rose" id="aiInput" placeholder="Ask AI translation question..." required="" type="text"/>
<button class="p-2 bg-rose text-white rounded-lg hover:bg-rose/80 transition w-9 h-9 flex items-center justify-center" type="submit">
<i class="fa-solid fa-paper-plane text-xs"></i>
</button>
</form>
</div>
</div>
<!-- BOOKING & UPLOAD MODAL -->
<div class="fixed inset-0 z-50 bg-ink/80 backdrop-blur-sm flex justify-center items-center p-4 hidden" id="bookingModal">
<div class="w-full max-w-lg bg-parchment rounded-2xl p-6 md:p-8 border-2 border-gold space-y-6 relative text-ink">
<button class="absolute top-4 right-4 text-ink hover:text-rose text-xl" onclick="closeBookingModal()">
<i class="fa-solid fa-xmark"></i>
</button>
<div class="space-y-1">
<span class="text-xs font-serif uppercase tracking-widest text-rose font-bold block">Official Booking</span>
<h3 class="font-playfair text-2xl font-bold" id="modalTitle">Schedule Interpreter Session</h3><p class="verba-request-note">This form sends an inquiry to VERBA via WhatsApp. Your booking or project is confirmed only after the team reviews availability, files, scope, and final quotation.</p>
</div>
<form class="space-y-4 text-xs" onsubmit="handleBookingSubmit(event)">
<div>
<label class="block font-bold mb-1">Your Full Name</label>
<input class="w-full bg-parchment-dark p-3 rounded border border-ink/20" name="customer_name" placeholder="John Doe" required="" type="text"/>
</div>
<div>
<label class="block font-bold mb-1">Corporate / Personal Email</label>
<input class="w-full bg-parchment-dark p-3 rounded border border-ink/20" name="customer_email" placeholder="john@company.com" required="" type="email"/>
</div>
<div class="grid grid-cols-2 gap-3">
<div>
<label class="block font-bold mb-1">Target Date</label>
<input class="w-full bg-parchment-dark p-3 rounded border border-ink/20" name="target_date" required="" type="date"/>
</div>
<div>
<label class="block font-bold mb-1">Mode</label>
<select class="w-full bg-parchment-dark p-3 rounded border border-ink/20" name="session_mode">
<option>On-Site Interpretation</option>
<option>Remote Zoom/Teams</option>
<option>Document Sworn Appraisal</option>
</select>
</div>
</div>
<div>
<label class="block font-bold mb-1">Special Instructions / Context</label>
<textarea class="w-full bg-parchment-dark p-3 rounded border border-ink/20" name="project_details" placeholder="Brief details about your document or summit..." rows="3"></textarea>
</div>
<button class="w-full py-3 bg-rose text-white font-serif uppercase tracking-widest text-xs rounded hover:bg-ink transition shadow" type="submit">
                    Submit Request
                </button>
</form>
</div>
</div>
<!-- JAVASCRIPT LOGIC -->

<script src='{{ asset("js/website-bisnis/templates/professional-service/translation-interpreter/verba/verba.js") }}'></script>
<div aria-label="Contact VERBA" class="verba-floating-actions">
<a aria-label="Contact via WhatsApp" class="verba-wa" href="#" id="verbaWhatsApp" rel="noopener" target="_blank" title="WhatsApp"><i class="fa-brands fa-whatsapp"></i><span>WhatsApp</span></a>
<button aria-label="Open VERBA AI" class="verba-ai-launch" onclick="toggleAiModal()" title="VERBA AI" type="button"><span class="verba-ai-letters">文<span>あ</span>A</span><span>VERBA AI</span></button>
</div>
</body>
</html>