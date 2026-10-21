<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Produk — PawMart</title>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Nunito:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/website-bisnis/templates/pet-animal-service/petshop/glacierblue/petshop-katalog-minimalist-glacierblue.css') }}">
</head>
<body>
<header class="catalog-header">
    <a class="catalog-logo" href="{{ url('/webia/template/petshop-minimalist-glacierblue') }}">
        🐾 <span>Paw<strong>Mart</strong></span>
    </a>
    <nav>
        <a href="{{ url('/webia/template/petshop-minimalist-glacierblue') }}">Home</a>
        <a class="active" href="{{ url('/webia/template/petshop-minimalist-glacierblue/katalog') }}">Katalog</a>
        <a href="{{ url('/webia/template/petshop-minimalist-glacierblue#contact') }}">Kontak</a>
    </nav>
    <a class="catalog-wa" href="#" id="catalogHelp">💬 Tanya Admin</a>
</header>

<main>
    <section class="catalog-hero">
        <div>
            <span class="catalog-eyebrow">PAWMART PET COLLECTION</span>
            <h1>Find their <span>new favorite.</span></h1>
            <p>Jelajahi makanan, camilan, mainan, dan perlengkapan terbaik untuk sahabat berbulu kesayanganmu.</p>
            <div class="catalog-breadcrumb">
                <a href="{{ url('/webia/template/petshop-minimalist-glacierblue') }}">Home</a>
                <span>/</span>
                <span>Katalog Produk</span>
            </div>
        </div>
        <div class="catalog-hero-art">🐶<span>🐾</span></div>
    </section>

    <section class="catalog-content">
        <div class="catalog-heading">
            <div>
                <span class="catalog-eyebrow">OUR PRODUCTS</span>
                <h2>Shop all essentials</h2>
                <p id="productCount">Menampilkan semua produk pilihan.</p>
            </div>
        </div>

        <div class="catalog-toolbar">
            <label class="catalog-search">
                <span>⌕</span>
                <input id="productSearch" type="search" placeholder="Cari makanan, mainan, perlengkapan..." aria-label="Cari produk">
            </label>
            <select id="categoryFilter" aria-label="Filter kategori">
                <option value="all">Semua kategori</option>
                <option value="makanan">Makanan Hewan</option>
                <option value="camilan">Camilan</option>
                <option value="aksesoris">Aksesori & Mainan</option>
                <option value="perawatan">Perawatan</option>
                <option value="perlengkapan">Perlengkapan</option>
            </select>
            <select id="sortFilter" aria-label="Urutkan produk">
                <option value="featured">Produk pilihan</option>
                <option value="low">Harga terendah</option>
                <option value="high">Harga tertinggi</option>
                <option value="name">Nama A–Z</option>
            </select>
        </div>

        <div class="catalog-chips" id="categoryChips">
            <button class="active" data-category="all">Semua</button>
            <button data-category="makanan">Makanan</button>
            <button data-category="camilan">Camilan</button>
            <button data-category="aksesoris">Aksesori</button>
            <button data-category="perawatan">Perawatan</button>
            <button data-category="perlengkapan">Perlengkapan</button>
        </div>

        <div class="catalog-grid" id="catalogGrid">
            <article class="catalog-product" data-name="Royal Canin Kitten" data-category="makanan" data-price="185000" data-order="1">
                <a class="catalog-product-image bg-blue" href="{{ url('/webia/template/petshop-minimalist-glacierblue/produk/royal-canin-kitten') }}">
                    <span class="catalog-badge">BEST SELLER</span>
                    <img src="https://images.unsplash.com/photo-1589924691995-400dc9ecc119?auto=format&fit=crop&w=600&q=80" alt="Makanan kucing">
                </a>
                <div class="catalog-product-info">
                    <small>MAKANAN HEWAN</small>
                    <h3><a href="{{ url('/webia/template/petshop-minimalist-glacierblue/produk/royal-canin-kitten') }}">Royal Canin Kitten</a></h3>
                    <p>Makanan anak kucing</p>
                    <div class="catalog-product-bottom"><strong>Rp185.000</strong><button class="catalog-order" data-product="Royal Canin Kitten" data-price="185000">Pesan ↗</button></div>
                </div>
            </article>

            <article class="catalog-product" data-name="Happy Bites Treats" data-category="camilan" data-price="45000" data-order="2">
                <a class="catalog-product-image bg-peach" href="{{ url('/webia/template/petshop-minimalist-glacierblue/produk/dog-treats') }}">
                    <span class="catalog-badge badge-warm">FAVORIT</span>
                    <img src="https://images.unsplash.com/photo-1582798358481-d199fb7347bb?auto=format&fit=crop&w=600&q=80" alt="Camilan hewan">
                </a>
                <div class="catalog-product-info">
                    <small>CAMILAN</small>
                    <h3><a href="{{ url('/webia/template/petshop-minimalist-glacierblue/produk/dog-treats') }}">Happy Bites Treats</a></h3>
                    <p>Camilan untuk anjing</p>
                    <div class="catalog-product-bottom"><strong>Rp45.000</strong><button class="catalog-order" data-product="Happy Bites Treats" data-price="45000">Pesan ↗</button></div>
                </div>
            </article>

            <article class="catalog-product" data-name="Cloudy Pet Bed" data-category="perlengkapan" data-price="220000" data-order="3">
                <a class="catalog-product-image bg-green" href="{{ url('/webia/template/petshop-minimalist-glacierblue/produk/soft-pet-bed') }}">
                    <img src="https://images.unsplash.com/photo-1541599540903-216a46ca1dc0?auto=format&fit=crop&w=600&q=80" alt="Tempat tidur hewan">
                </a>
                <div class="catalog-product-info">
                    <small>PERLENGKAPAN</small>
                    <h3><a href="{{ url('/webia/template/petshop-minimalist-glacierblue/produk/soft-pet-bed') }}">Cloudy Pet Bed</a></h3>
                    <p>Tempat tidur empuk</p>
                    <div class="catalog-product-bottom"><strong>Rp220.000</strong><button class="catalog-order" data-product="Cloudy Pet Bed" data-price="220000">Pesan ↗</button></div>
                </div>
            </article>

            <article class="catalog-product" data-name="Gentle Grooming Kit" data-category="perawatan" data-price="89000" data-order="4">
                <a class="catalog-product-image bg-lilac" href="{{ url('/webia/template/petshop-minimalist-glacierblue/produk/pet-grooming-kit') }}">
                    <img src="https://images.unsplash.com/photo-1516734212186-a967f81ad0d7?auto=format&fit=crop&w=600&q=80" alt="Perawatan hewan">
                </a>
                <div class="catalog-product-info">
                    <small>PERAWATAN</small>
                    <h3><a href="{{ url('/webia/template/petshop-minimalist-glacierblue/produk/pet-grooming-kit') }}">Gentle Grooming Kit</a></h3>
                    <p>Perlengkapan perawatan</p>
                    <div class="catalog-product-bottom"><strong>Rp89.000</strong><button class="catalog-order" data-product="Gentle Grooming Kit" data-price="89000">Pesan ↗</button></div>
                </div>
            </article>

            <article class="catalog-product" data-name="Playful Rope Toy" data-category="aksesoris" data-price="35000" data-order="5">
                <a class="catalog-product-image bg-blue" href="{{ url('/webia/template/petshop-minimalist-glacierblue/produk/playful-rope-toy') }}">
                    <img src="https://images.unsplash.com/photo-1535294435445-d7249524ef2e?auto=format&fit=crop&w=600&q=80" alt="Mainan hewan">
                </a>
                <div class="catalog-product-info">
                    <small>AKSESORI & MAINAN</small>
                    <h3><a href="{{ url('/webia/template/petshop-minimalist-glacierblue/produk/playful-rope-toy') }}">Playful Rope Toy</a></h3>
                    <p>Mainan untuk waktu bermain</p>
                    <div class="catalog-product-bottom"><strong>Rp35.000</strong><button class="catalog-order" data-product="Playful Rope Toy" data-price="35000">Pesan ↗</button></div>
                </div>
            </article>

            <article class="catalog-product" data-name="Cozy Pet Bowl" data-category="aksesoris" data-price="55000" data-order="6">
                <a class="catalog-product-image bg-peach" href="{{ url('/webia/template/petshop-minimalist-glacierblue/produk/cozy-pet-bowl') }}">
                    <img src="https://images.unsplash.com/photo-1585837575652-267c041d77d4?auto=format&fit=crop&w=600&q=80" alt="Tempat makan hewan">
                </a>
                <div class="catalog-product-info">
                    <small>AKSESORI</small>
                    <h3><a href="{{ url('/webia/template/petshop-minimalist-glacierblue/produk/cozy-pet-bowl') }}">Cozy Pet Bowl</a></h3>
                    <p>Mangkuk makan hewan</p>
                    <div class="catalog-product-bottom"><strong>Rp55.000</strong><button class="catalog-order" data-product="Cozy Pet Bowl" data-price="55000">Pesan ↗</button></div>
                </div>
            </article>
        </div>

        <div class="catalog-empty" id="catalogEmpty" hidden>
            <span>🐾</span>
            <h3>Produk belum ditemukan</h3>
            <p>Coba kata kunci atau kategori yang berbeda, ya.</p>
        </div>
    </section>

    <section class="catalog-help">
        <div><span class="catalog-eyebrow">NEED A PAW-SOME RECOMMENDATION?</span><h2>Not sure what they need?</h2><p>Ceritakan kebutuhan hewan kesayanganmu, kami bantu memilih produk yang sesuai.</p></div>
        <button id="catalogHelpBottom">Tanya via WhatsApp ↗</button>
    </section>
</main>

<footer class="catalog-footer">
    <a class="catalog-logo" href="{{ url('/webia/template/petshop-minimalist-glacierblue') }}">🐾 <span>Paw<strong>Mart</strong></span></a>
    <p>Made with love for every paw and whisker. 🐾</p>
    <small>© {{ date('Y') }} PawMart. All rights reserved.</small>
</footer>

<script>
window.PAWMART_CONFIG = {
    whatsappNumber: '6285850180285',
    productBaseUrl: @json(url('/webia/template/petshop-minimalist-glacierblue/produk'))
};
</script>
<script src="{{ asset('js/website-bisnis/templates/pet-animal-service/petshop/glacierblue/petshop-katalog-minimalist-glacierblue.js') }}"></script>
</body>
</html>
