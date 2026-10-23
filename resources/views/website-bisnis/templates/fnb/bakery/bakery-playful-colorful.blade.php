<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sweet Crumb Bakery — Playful & Colorful</title>
    @vite('resources/css/app.css')
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/website-bisnis/ai-assistant.css') }}">
    <!-- Google Fonts: Poppins & Fredoka -->
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@500;600;700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; color: #3D3130; background-color: #FFFDFB; }
        h1, h2, h3, .font-heading { font-family: 'Fredoka', cursive; }
        .floating-btn { transition: transform 0.2s ease, box-shadow 0.2s ease; }
        .floating-btn:hover { transform: translateY(-3px); }
        body.webia-bakery-preview > :not(.bakery-promo-banner):not(header):not(#hero) { display: none !important; }
    </style>
</head>
<body class="antialiased selection:bg-pastelPink selection:text-white{{ request()->boolean('preview') ? ' webia-bakery-preview' : '' }}">

    <!-- 1. TOPBAR & NAVBAR -->
    <div class="bakery-promo-banner bg-bakeryDark text-white text-xs font-medium py-2 px-4 text-center tracking-wide">
        <span>Promo Pekan Ini: Diskon 20% untuk Varian Croissant dan Custom Cake</span>
    </div>
    
    <header class="sticky top-0 z-40 bg-white/95 backdrop-blur-md border-b border-gray-100 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 min-h-20 flex flex-wrap items-center justify-between gap-4 py-3">
            <!-- Brand Logo -->
            <a href="#" class="flex items-center gap-2">
                <span class="font-heading text-2xl font-bold text-bakeryAccent tracking-tight">Sweet Crumb</span>
            </a>

            <!-- Nav Links -->
            <nav class="order-3 flex w-full items-center gap-5 overflow-x-auto whitespace-nowrap pb-1 text-xs font-medium text-gray-700 md:order-none md:w-auto md:gap-8 md:pb-0 md:text-sm">
                <a href="#hero" class="hover:text-bakeryAccent transition-colors">Beranda</a>
                <a href="#katalog" class="hover:text-bakeryAccent transition-colors">Katalog Roti</a>
                <a href="#promo" class="hover:text-bakeryAccent transition-colors">Promo</a>
                <a href="#lokasi" class="hover:text-bakeryAccent transition-colors">Lokasi Outlet</a>
                <a href="#faq" class="hover:text-bakeryAccent transition-colors">FAQ</a>
            </nav>

            <!-- CTA Button -->
            <div class="hidden md:block">
                <a href="#katalog" class="bg-bakeryAccent hover:bg-red-600 text-white font-heading px-5 py-2.5 rounded-full shadow-sm hover:shadow transition-all text-sm font-semibold">
                    Pesan Sekarang
                </a>
            </div>
        </div>
    </header>

    <!-- 2. HERO SECTION -->
    <section id="hero" class="relative overflow-hidden py-16 md:py-24 bg-gradient-to-b from-pastelYellow/30 via-pastelPink/10 to-transparent">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="space-y-6 text-center md:text-left">
                    <span class="bg-white border border-pastelPink text-bakeryAccent font-heading px-4 py-1.5 rounded-full text-xs font-semibold tracking-wider uppercase shadow-xs inline-block">
                        Freshly Baked Everyday
                    </span>
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-bakeryDark leading-tight">
                        Roti Sajian Hangat & <br>
                        <span class="text-bakeryAccent">Bahan Premium</span> <br>
                        Setiap Hari
                    </h1>
                    <p class="text-gray-600 text-base sm:text-lg max-w-lg mx-auto md:mx-0">
                        Dipanggang setiap pagi menggunakan bahan baku bersertifikasi halal. Nikmati aneka varian roti manis, pastry renyah, dan kue kustom untuk berbagai acara.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start">
                        <a href="#katalog" class="bg-bakeryAccent hover:bg-red-600 text-white font-heading px-8 py-3.5 rounded-full shadow-md text-center font-semibold text-base transition-all">
                            Lihat Menu
                        </a>
                        <a href="#lokasi" class="bg-white border border-gray-300 hover:bg-gray-50 text-bakeryDark font-heading px-8 py-3.5 rounded-full text-center font-semibold text-base transition-all">
                            Kunjungi Toko
                        </a>
                    </div>
                </div>
                <div class="relative flex justify-center">
                    <div class="w-72 h-72 sm:w-96 sm:h-96 bg-pastelPink rounded-full filter blur-3xl opacity-40 absolute -z-10"></div>
                    <img src="https://images.unsplash.com/photo-1509440159596-0249088772ff?auto=format&fit=crop&q=80&w=800" alt="Fresh Bakery Products" class="rounded-2xl shadow-xl border-4 border-white object-cover w-full max-w-md h-[380px]">
                </div>
            </div>
        </div>
    </section>

    <!-- 3. KATALOG PRODUK -->
    <section id="katalog" class="py-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-14">
            <span class="text-bakeryAccent font-heading font-bold text-xs tracking-widest uppercase">Pilihan Favorit</span>
            <h2 class="text-3xl sm:text-4xl font-bold text-bakeryDark mt-2">Katalog Roti & Pastry</h2>
            <p class="text-gray-500 mt-2 text-sm">Pilihan sajian terbaik dari dapur Sweet Crumb untuk hari Anda.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Item 1 -->
            <div class="bg-white rounded-xl p-4 border border-gray-200/80 shadow-xs hover:shadow-md transition-all duration-200 flex flex-col justify-between">
                <div>
                    <div class="relative overflow-hidden rounded-lg h-48 mb-4">
                        <img src="https://images.unsplash.com/photo-1555507036-ab1f4038808a?auto=format&fit=crop&q=80&w=400" alt="Butter Croissant" class="w-full h-full object-cover">
                        <span class="absolute top-2 right-2 bg-white/90 text-bakeryDark text-xs font-semibold px-2.5 py-1 rounded-md shadow-xs">Best Seller</span>
                    </div>
                    <h3 class="font-bold text-lg text-bakeryDark mb-1">Butter Croissant</h3>
                    <p class="text-gray-500 text-xs mb-4">Croissant renyah di luar dengan rasa mentega lembut di dalam.</p>
                </div>
                <div class="flex items-center justify-between border-t border-gray-100 pt-3">
                    <span class="font-heading font-bold text-base text-bakeryDark">Rp 18.000</span>
                    <a href="https://wa.me/6281234567890?text=Halo%20Sweet%20Crumb,%20saya%20mau%20pesan%20Butter%20Croissant" target="_blank" class="bg-bakeryDark hover:bg-black text-white font-heading text-xs font-semibold px-3.5 py-2 rounded-lg transition-colors">
                        Pesan
                    </a>
                </div>
            </div>

            <!-- Item 2 -->
            <div class="bg-white rounded-xl p-4 border border-gray-200/80 shadow-xs hover:shadow-md transition-all duration-200 flex flex-col justify-between">
                <div>
                    <div class="relative overflow-hidden rounded-lg h-48 mb-4">
                        <img src="https://images.unsplash.com/photo-1578985545062-69928b1d9587?auto=format&fit=crop&q=80&w=400" alt="Strawberry Shortcake" class="w-full h-full object-cover">
                    </div>
                    <h3 class="font-bold text-lg text-bakeryDark mb-1">Strawberry Shortcake</h3>
                    <p class="text-gray-500 text-xs mb-4">Spons lembut dengan krim segar dan buah stroberi asli.</p>
                </div>
                <div class="flex items-center justify-between border-t border-gray-100 pt-3">
                    <span class="font-heading font-bold text-base text-bakeryDark">Rp 35.000</span>
                    <a href="https://wa.me/6281234567890?text=Halo%20Sweet%20Crumb,%20saya%20mau%20pesan%20Strawberry%20Shortcake" target="_blank" class="bg-bakeryDark hover:bg-black text-white font-heading text-xs font-semibold px-3.5 py-2 rounded-lg transition-colors">
                        Pesan
                    </a>
                </div>
            </div>

            <!-- Item 3 -->
            <div class="bg-white rounded-xl p-4 border border-gray-200/80 shadow-xs hover:shadow-md transition-all duration-200 flex flex-col justify-between">
                <div>
                    <div class="relative overflow-hidden rounded-lg h-48 mb-4">
                        <img src="https://images.unsplash.com/photo-1509440159596-0249088772ff?auto=format&fit=crop&q=80&w=400" alt="Sourdough Bread" class="w-full h-full object-cover">
                        <span class="absolute top-2 right-2 bg-white/90 text-bakeryDark text-xs font-semibold px-2.5 py-1 rounded-md shadow-xs">Artisan</span>
                    </div>
                    <h3 class="font-bold text-lg text-bakeryDark mb-1">Artisan Sourdough</h3>
                    <p class="text-gray-500 text-xs mb-4">Roti ragi alami tanpa bahan pengawet sintesis.</p>
                </div>
                <div class="flex items-center justify-between border-t border-gray-100 pt-3">
                    <span class="font-heading font-bold text-base text-bakeryDark">Rp 42.000</span>
                    <a href="https://wa.me/6281234567890?text=Halo%20Sweet%20Crumb,%20saya%20mau%20pesan%20Artisan%20Sourdough" target="_blank" class="bg-bakeryDark hover:bg-black text-white font-heading text-xs font-semibold px-3.5 py-2 rounded-lg transition-colors">
                        Pesan
                    </a>
                </div>
            </div>

            <!-- Item 4 -->
            <div class="bg-white rounded-xl p-4 border border-gray-200/80 shadow-xs hover:shadow-md transition-all duration-200 flex flex-col justify-between">
                <div>
                    <div class="relative overflow-hidden rounded-lg h-48 mb-4">
                        <img src="https://images.unsplash.com/photo-1588195538326-c5b1e9f80a1b?auto=format&fit=crop&q=80&w=400" alt="Chocolate Donut" class="w-full h-full object-cover">
                    </div>
                    <h3 class="font-bold text-lg text-bakeryDark mb-1">Choco Glaze Donut</h3>
                    <p class="text-gray-500 text-xs mb-4">Donat empuk dengan baluran cokelat leleh Belgian.</p>
                </div>
                <div class="flex items-center justify-between border-t border-gray-100 pt-3">
                    <span class="font-heading font-bold text-base text-bakeryDark">Rp 12.000</span>
                    <a href="https://wa.me/6281234567890?text=Halo%20Sweet%20Crumb,%20saya%20mau%20pesan%20Choco%20Glaze%20Donut" target="_blank" class="bg-bakeryDark hover:bg-black text-white font-heading text-xs font-semibold px-3.5 py-2 rounded-lg transition-colors">
                        Pesan
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section id="promo" class="py-16 bg-pastelYellow/30">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-2xl border border-pastelPink p-8 sm:p-10 shadow-sm grid md:grid-cols-2 gap-6 items-center">
                <div>
                    <span class="text-bakeryAccent font-heading font-bold text-xs tracking-widest uppercase">Sweet moments, made to share</span>
                    <h2 class="text-3xl sm:text-4xl font-bold text-bakeryDark mt-2">Paket Promo & Event</h2>
                    <p class="text-gray-600 mt-3">Rayakan ulang tahun, acara kantor, atau momen spesial dengan paket roti dan custom cake. Tanya promo pekan ini langsung ke tim kami.</p>
                </div>
                <div class="flex justify-start md:justify-end">
                    <a href="https://wa.me/6281234567890?text=Halo%20Sweet%20Crumb,%20saya%20ingin%20bertanya%20tentang%20paket%20promo%20dan%20event" target="_blank" rel="noopener noreferrer" class="bg-bakeryAccent hover:bg-red-600 text-white font-heading px-7 py-3 rounded-full font-semibold transition-colors">
                        Tanya Paket Event <span aria-hidden="true">↗</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- 4. LOKASI & JAM OPERASIONAL -->
    <section id="lokasi" class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-8 items-center bg-white p-8 rounded-2xl border border-gray-200 shadow-xs">
                <div>
                    <span class="text-bakeryAccent font-heading font-bold text-xs tracking-wide uppercase">Outlet Resmi</span>
                    <h2 class="text-3xl font-bold text-bakeryDark mt-1 mb-6">Lokasi & Operasional</h2>
                    <div class="space-y-4 text-sm text-gray-600">
                        <div class="flex items-start gap-3">
                            <i class="fas fa-map-marker-alt text-bakeryAccent mt-1"></i>
                            <div>
                                <span class="font-semibold block text-bakeryDark">Alamat Outlet:</span>
                                <span>Jl. Mawar Indah No. 45, Gubeng, Surabaya</span>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <i class="fas fa-clock text-bakeryAccent mt-1"></i>
                            <div>
                                <span class="font-semibold block text-bakeryDark">Jam Operasional:</span>
                                <span>Senin - Minggu | 07.00 - 21.00 WIB</span>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <i class="fas fa-phone-alt text-bakeryAccent mt-1"></i>
                            <div>
                                <span class="font-semibold block text-bakeryDark">Telepon & WhatsApp:</span>
                                <span>+62 812-3456-7890</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="h-64 rounded-xl overflow-hidden bg-gray-100 border border-gray-200 relative">
                    <iframe class="w-full h-full border-0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.735183863456!2d112.7538!3d-7.2716!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zN8KwMTYnMTtuMS44IS0xMTIuNzUzOCE0ZjEzLjE!5e0!3m2!1sid!2sid!4v1620000000000!5m2!1sid!2sid" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </section>

    <!-- 5. FAQ SECTION -->
    <section id="faq" class="py-20 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="text-bakeryAccent font-heading font-bold text-xs tracking-widest uppercase">Pusat Informasi</span>
            <h2 class="text-3xl sm:text-4xl font-bold text-bakeryDark mt-2">Pertanyaan Umum (FAQ)</h2>
        </div>

        <div class="space-y-4">
            <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-xs">
                <h3 class="font-heading font-bold text-base text-bakeryDark mb-2">Bagaimana cara memesan roti dan pastry?</h3>
                <p class="text-gray-600 text-sm">Pilih produk dari katalog lalu hubungi kami melalui WhatsApp untuk konfirmasi ketersediaan, jumlah, dan waktu pengambilan atau pengiriman.</p>
            </div>

            <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-xs">
                <h3 class="font-heading font-bold text-base text-bakeryDark mb-2">Bisakah saya memesan custom cake?</h3>
                <p class="text-gray-600 text-sm">Bisa. Sampaikan tema, ukuran, rasa, dan tanggal acara melalui WhatsApp. Untuk hasil terbaik, pesan custom cake setidaknya dua hari sebelumnya.</p>
            </div>

            <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-xs">
                <h3 class="font-heading font-bold text-base text-bakeryDark mb-2">Apakah tersedia layanan pengiriman?</h3>
                <p class="text-gray-600 text-sm">Hubungi kami untuk mengecek jangkauan outlet dan pilihan pengiriman. Ongkos kirim dan waktu tiba dikonfirmasi sebelum pesanan diproses.</p>
            </div>
        </div>
    </section>

    <!-- 6. FOOTER -->
    <footer class="bg-bakeryDark text-white pt-12 pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 border-b border-gray-700 pb-8 grid grid-cols-1 md:grid-cols-3 gap-8">
            <div>
                <span class="font-heading text-2xl font-bold text-white block mb-4">Sweet Crumb</span>
                <p class="text-gray-400 text-xs leading-relaxed">
                    Penyedia roti dan produk pastry dengan standar bahan berkualitas untuk kebutuhan harian dan acara khusus Anda.
                </p>
            </div>
            <div>
                <h4 class="font-heading text-sm font-bold text-gray-200 uppercase tracking-wider mb-3">Navigasi</h4>
                <ul class="space-y-2 text-xs text-gray-400">
                    <li><a href="#hero" class="hover:text-white transition-colors">Beranda</a></li>
                    <li><a href="#katalog" class="hover:text-white transition-colors">Katalog Roti</a></li>
                    <li><a href="#promo" class="hover:text-white transition-colors">Promo & Event</a></li>
                    <li><a href="#lokasi" class="hover:text-white transition-colors">Lokasi Outlet</a></li>
                    <li><a href="#faq" class="hover:text-white transition-colors">FAQ</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-heading text-sm font-bold text-gray-200 uppercase tracking-wider mb-3">Media Sosial</h4>
                <div class="flex space-x-3 text-sm">
                    <a href="#" class="w-8 h-8 bg-gray-800 hover:bg-bakeryAccent rounded-full flex items-center justify-center transition-colors"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="w-8 h-8 bg-gray-800 hover:bg-bakeryAccent rounded-full flex items-center justify-center transition-colors"><i class="fab fa-tiktok"></i></a>
                    <a href="#" class="w-8 h-8 bg-gray-800 hover:bg-bakeryAccent rounded-full flex items-center justify-center transition-colors"><i class="fab fa-facebook"></i></a>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-6 text-center text-xs text-gray-500">
            <p>&copy; 2026 Sweet Crumb Bakery. Webia Service Architecture.</p>
        </div>
    </footer>

    <!-- 7. FLOATING BUTTONS (WA & AI CHATBOT) -->
    
    <!-- Floating WA Button -->
    <a href="https://wa.me/6281234567890?text=Halo%20Sweet%20Crumb,%20saya%20ingin%20bertanya%20mengenai%20produk" target="_blank" rel="noopener noreferrer" class="floating-btn fixed bottom-24 right-6 z-50 bg-emerald-600 hover:bg-emerald-700 text-white p-3.5 rounded-full shadow-lg flex items-center justify-center text-2xl w-13 h-13" title="Chat WhatsApp">
        <i class="fab fa-whatsapp"></i>
    </a>

    @include('website-bisnis.components.ai-assistant')
    <script src="{{ asset('js/website-bisnis/ai-assistant.js') }}" defer></script>

</body>
</html>