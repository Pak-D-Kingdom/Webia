<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="PawMart — kebutuhan makanan dan perlengkapan hewan kesayanganmu.">
    <title>PawMart — Pet Shop</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Nunito:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/website-bisnis/templates/pet-animal-service/petshop/glacierblue/petshop-minimalist-glacierblue.css') }}">
</head>
<body>

<div class="paw-topbar">
    Free konsultasi kebutuhan hewan kesayanganmu 🐾
    <a href="#contact">Hubungi kami</a>
</div>

<header class="paw-header">
    <a class="paw-logo" href="{{ url('/webia/template/petshop-minimalist-glacierblue') }}">
        <span class="paw-logo-icon">🐾</span>
        <span>Paw<span>Mart</span><small>YOUR PET'S HAPPY PLACE</small></span>
    </a>

    <button class="paw-menu-toggle" id="menuToggle" aria-label="Buka navigasi">☰</button>

    <nav class="paw-nav" id="mainNav">
        <a href="#home">Home</a>
        <a href="#categories">Kategori</a>
        <a href="#bestsellers">Produk</a>
        <a href="#about">Tentang Kami</a>
        <a href="#contact">Kontak</a>
        <a class="paw-nav-cta" href="{{ url('/webia/template/petshop-minimalist-glacierblue/katalog') }}">
            Belanja Sekarang ↗
        </a>
    </nav>
</header>

<main>
    <section class="paw-hero" id="home">
        <div class="paw-hero-content">
            <span class="paw-pill">🐶 FOR YOUR FURRY BEST FRIEND</span>

            <h1>Happy pets,<br> <span>happier lives.</span></h1>

            <p>
                Semua kebutuhan sahabat berbulu kesayanganmu ada di sini.
                Mulai dari makanan bernutrisi hingga perlengkapan favorit mereka.
            </p>

            <div class="paw-hero-actions">
                <a class="paw-btn paw-btn-primary"
                   href="{{ url('/webia/template/petshop-minimalist-glacierblue/katalog') }}">
                    Jelajahi Produk <span>→</span>
                </a>

                <a class="paw-btn paw-btn-outline" href="#categories">
                    Lihat Kategori
                </a>
            </div>

            <div class="paw-trust">
                <div class="paw-avatar-stack">
                    <span>🐶</span><span>🐱</span><span>🐰</span>
                </div>
                <div>
                    <strong>Made with love</strong>
                    <small>For every paw and whisker.</small>
                </div>
            </div>
        </div>

        <div class="paw-hero-visual">
            <div class="paw-hero-circle"></div>
            <div class="paw-hero-image">
                <img
                    src="https://images.unsplash.com/photo-1552053831-71594a27632d?auto=format&fit=crop&w=1000&q=85"
                    alt="Anjing golden retriever yang bahagia"
                >
            </div>
            <div class="paw-float-card paw-float-top">
                <span>💙</span>
                <div><strong>Pet-approved</strong><small>Quality you can trust</small></div>
            </div>
            <div class="paw-float-card paw-float-bottom">
                <span>🦴</span>
                <div><strong>Tail-wagging deals!</strong><small>Discover their favorites</small></div>
            </div>
            <span class="paw-deco paw-deco-one">✳</span>
            <span class="paw-deco paw-deco-two">🐾</span>
        </div>
    </section>

    <section class="paw-benefits">
        <div><span>🚚</span><p><strong>Praktis & Mudah</strong><small>Pesan tanpa ribet</small></p></div>
        <div><span>💙</span><p><strong>Produk Pilihan</strong><small>Untuk sahabat terbaikmu</small></p></div>
        <div><span>💬</span><p><strong>Ramah & Responsif</strong><small>Kami siap membantu</small></p></div>
        <div><span>🐾</span><p><strong>Pet Comes First</strong><small>Love in every choice</small></p></div>
    </section>

    <section class="paw-section" id="categories">
        <div class="paw-section-heading">
            <div>
                <span class="paw-eyebrow">SHOP BY CATEGORY</span>
                <h2>Little things for <span>big love.</span></h2>
                <p>Temukan semua yang dibutuhkan si kecil di setiap tahap kehidupannya.</p>
            </div>
            <a class="paw-text-link" href="{{ url('/webia/template/petshop-minimalist-glacierblue/katalog') }}">
                Semua produk →
            </a>
        </div>

        <div class="paw-category-grid">
            <a class="paw-category-card category-blue"
               href="{{ url('/webia/template/petshop-minimalist-glacierblue/katalog') }}?kategori=makanan">
                <span class="paw-category-emoji">🥣</span>
                <h3>Makanan Hewan</h3>
                <p>Nutrisi untuk tumbuh sehat</p>
                <span class="paw-category-arrow">↗</span>
            </a>

            <a class="paw-category-card category-peach"
               href="{{ url('/webia/template/petshop-minimalist-glacierblue/katalog') }}?kategori=aksesoris">
                <span class="paw-category-emoji">🦴</span>
                <h3>Aksesori & Mainan</h3>
                <p>Teman bermain setiap hari</p>
                <span class="paw-category-arrow">↗</span>
            </a>

            <a class="paw-category-card category-lilac"
               href="{{ url('/webia/template/petshop-minimalist-glacierblue/katalog') }}?kategori=perawatan">
                <span class="paw-category-emoji">🧴</span>
                <h3>Perawatan</h3>
                <p>Selalu bersih dan nyaman</p>
                <span class="paw-category-arrow">↗</span>
            </a>

            <a class="paw-category-card category-green"
               href="{{ url('/webia/template/petshop-minimalist-glacierblue/katalog') }}?kategori=perlengkapan">
                <span class="paw-category-emoji">🛏️</span>
                <h3>Perlengkapan</h3>
                <p>Nyaman untuk di rumah</p>
                <span class="paw-category-arrow">↗</span>
            </a>
        </div>
    </section>

    <section class="paw-featured" id="bestsellers">
        <div class="paw-section-heading">
            <div>
                <span class="paw-eyebrow">THE PET PARENT FAVORITES</span>
                <h2>Best-loved <span>essentials.</span></h2>
                <p>Produk pilihan untuk menemani hari-hari si kesayangan.</p>
            </div>
            <a class="paw-text-link" href="{{ url('/webia/template/petshop-minimalist-glacierblue/katalog') }}">
                Lihat katalog →
            </a>
        </div>

        <div class="paw-product-grid">
            <article class="paw-product-card">
                <a href="{{ url('/webia/template/petshop-minimalist-glacierblue/produk/royal-canin-kitten') }}" class="paw-product-image product-bg-blue">
                    <span class="paw-product-badge">BEST SELLER</span>
                    <img src="https://images.unsplash.com/photo-1589924691995-400dc9ecc119?auto=format&fit=crop&w=600&q=80" alt="Makanan kucing">
                </a>
                <div class="paw-product-info">
                    <small>CAT FOOD</small>
                    <h3>Royal Canin Kitten</h3>
                    <p class="paw-product-desc">Makanan anak kucing</p>
                    <div class="paw-product-bottom">
                        <strong>Rp185.000</strong>
                        <button class="paw-add-button" data-product="Royal Canin Kitten" data-price="185000" aria-label="Pesan Royal Canin Kitten">+</button>
                    </div>
                </div>
            </article>

            <article class="paw-product-card">
                <a href="{{ url('/webia/template/petshop-minimalist-glacierblue/produk/dog-treats') }}" class="paw-product-image product-bg-peach">
                    <span class="paw-product-badge badge-new">PET FAVORITE</span>
                    <img src="https://images.unsplash.com/photo-1582798358481-d199fb7347bb?auto=format&fit=crop&w=600&q=80" alt="Camilan anjing">
                </a>
                <div class="paw-product-info">
                    <small>DOG TREATS</small>
                    <h3>Happy Bites Treats</h3>
                    <p class="paw-product-desc">Camilan untuk anjing</p>
                    <div class="paw-product-bottom">
                        <strong>Rp45.000</strong>
                        <button class="paw-add-button" data-product="Happy Bites Treats" data-price="45000" aria-label="Pesan Happy Bites Treats">+</button>
                    </div>
                </div>
            </article>

            <article class="paw-product-card">
                <a href="{{ url('/webia/template/petshop-minimalist-glacierblue/produk/soft-pet-bed') }}" class="paw-product-image product-bg-green">
                    <img src="https://images.unsplash.com/photo-1541599540903-216a46ca1dc0?auto=format&fit=crop&w=600&q=80" alt="Tempat tidur hewan">
                </a>
                <div class="paw-product-info">
                    <small>PET COMFORT</small>
                    <h3>Cloudy Pet Bed</h3>
                    <p class="paw-product-desc">Tempat tidur empuk</p>
                    <div class="paw-product-bottom">
                        <strong>Rp220.000</strong>
                        <button class="paw-add-button" data-product="Cloudy Pet Bed" data-price="220000" aria-label="Pesan Cloudy Pet Bed">+</button>
                    </div>
                </div>
            </article>

            <article class="paw-product-card">
                <a href="{{ url('/webia/template/petshop-minimalist-glacierblue/produk/pet-grooming-kit') }}" class="paw-product-image product-bg-lilac">
                    <img src="https://images.unsplash.com/photo-1516734212186-a967f81ad0d7?auto=format&fit=crop&w=600&q=80" alt="Perawatan hewan">
                </a>
                <div class="paw-product-info">
                    <small>GROOMING</small>
                    <h3>Gentle Grooming Kit</h3>
                    <p class="paw-product-desc">Perlengkapan perawatan</p>
                    <div class="paw-product-bottom">
                        <strong>Rp89.000</strong>
                        <button class="paw-add-button" data-product="Gentle Grooming Kit" data-price="89000" aria-label="Pesan Gentle Grooming Kit">+</button>
                    </div>
                </div>
            </article>
        </div>
    </section>

    <section class="paw-promo">
        <div class="paw-promo-content">
            <span class="paw-eyebrow">A LITTLE TREAT FOR YOUR PET</span>
            <h2>More tail wags,<br><span>more happy days.</span></h2>
            <p>Tanyakan promo dan ketersediaan produk terbaru langsung kepada tim PawMart.</p>
            <button class="paw-btn paw-btn-white" id="promoButton">Tanya Promo ↗</button>
        </div>
        <div class="paw-promo-art">
            <span class="promo-star">✳</span>
            <span class="promo-bone">🦴</span>
            <span class="promo-heart">💙</span>
            <span class="promo-paw">🐾</span>
        </div>
    </section>

    <section class="paw-about" id="about">
        <div class="paw-about-art">
            <div class="paw-about-circle"></div>
            <img src="https://images.unsplash.com/photo-1543466835-00a7907e9de1?auto=format&fit=crop&w=900&q=85" alt="Anjing peliharaan">
            <span class="paw-about-note">Pets are family. Always. 💙</span>
        </div>
        <div class="paw-about-content">
            <span class="paw-eyebrow">A LITTLE ABOUT PAWMART</span>
            <h2>Because they're not just pets. <span>They're family.</span></h2>
            <p>
                Kami percaya setiap hewan peliharaan layak mendapatkan perawatan
                dan perhatian terbaik. PawMart hadir untuk membantu pet parents
                menemukan kebutuhan favorit mereka dengan lebih mudah.
            </p>
            <a class="paw-btn paw-btn-primary" href="#contact">Kenalan dengan Kami →</a>
        </div>
    </section>

    <section class="paw-contact" id="contact">
        <div>
            <span class="paw-eyebrow">LET'S TALK, PET PARENTS!</span>
            <h2>Need a little help?</h2>
            <p>Bingung memilih makanan, ingin cek stok, atau punya pertanyaan? Kami siap membantu.</p>
        </div>
        <button class="paw-btn paw-btn-primary" id="contactButton">Chat via WhatsApp ↗</button>
    </section>
</main>

<footer class="paw-footer">
    <a class="paw-logo paw-footer-logo" href="#home">
        <span class="paw-logo-icon">🐾</span>
        <span>Paw<span>Mart</span><small>YOUR PET'S HAPPY PLACE</small></span>
    </a>
    <p>Made with love for every paw and whisker. 🐾</p>
    <div class="paw-footer-links">
        <a href="#home">Home</a>
        <a href="#categories">Kategori</a>
        <a href="{{ url('/webia/template/petshop-minimalist-glacierblue/katalog') }}">Katalog</a>
        <a href="#contact">Kontak</a>
    </div>
    <small>© {{ date('Y') }} PawMart. All rights reserved.</small>
</footer>

<button class="paw-chatbot" id="chatbotButton" aria-label="Tanya PawMart">💬</button>
<div class="paw-chatbot-hint">Ada yang bisa kami bantu?</div>

<script>
    window.PAWMART_CONFIG = {
        whatsappNumber: '6285850180285',
        catalogUrl: @json(url('/webia/template/petshop-minimalist-glacierblue/katalog')),
        productBaseUrl: @json(url('/webia/template/petshop-minimalist-glacierblue/produk'))
    };
</script>
<script src="{{ asset('js/website-bisnis/templates/pet-animal-service/petshop/glacierblue/petshop-minimalist-glacierblue.js') }}"></script>
</body>
</html>