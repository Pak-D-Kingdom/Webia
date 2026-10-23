<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Explore the curated pet collection at Furry & Co.">
    <title>The Boutique Edit — Furry & Co.</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@400;500;600;700&family=Manrope:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/website-bisnis/cart/webia-cart-popup.css') }}">
    <link rel="stylesheet"
        href="{{ asset('css/website-bisnis/templates/pet-animal-service/petshop/rosegold/petshop-katalog-luxury-rosegold.css') }}">
</head>

<body>

    <header class="fck-header">
        <a class="fck-logo" href="{{ url('/webia/template/petshop-luxury-rosegold') }}">
            <span class="fck-logo-mark">F<span>&</span>C</span>
            <span>FURRY <strong>& CO.</strong><small>THE PET BOUTIQUE</small></span>
        </a>

        <nav class="fck-nav">
            <a href="{{ url('/webia/template/petshop-luxury-rosegold') }}">Home</a>
            <a class="active" href="{{ url('/webia/template/petshop-luxury-rosegold/katalog') }}">The Collection</a>
            <a href="{{ url('/webia/template/petshop-luxury-rosegold#about') }}">Our Story</a>
            <a href="{{ url('/webia/template/petshop-luxury-rosegold#contact') }}">Concierge</a>
            <a href="{{ url('/webia/template/petshop-luxury-rosegold') }}#faq">FAQ</a>
            <button type="button" class="fck-cart-trigger" data-cart-open aria-label="Buka keranjang belanja">
                <span aria-hidden="true">♡</span>
                <span>Bag</span>
                <span data-cart-count hidden>0</span>
            </button>
        </nav>

        <button class="fck-contact-button" id="fckContact">Speak to Us ↗</button>
    </header>

    <main>
        <section class="fck-hero">
            <div class="fck-hero-content">
                <span class="fck-eyebrow">THE FURRY & CO. COLLECTION</span>
                <h1>Little luxuries.<br><em>Lovely little lives.</em></h1>
                <p>A considered edit of everyday essentials, thoughtfully selected for the companions who mean the world
                    to us.</p>
                <div class="fck-breadcrumb">
                    <a href="{{ url('/webia/template/petshop-luxury-rosegold') }}">Home</a>
                    <span>—</span>
                    <span>The Collection</span>
                </div>
            </div>
            <div class="fck-hero-art">
                <img src="https://images.unsplash.com/photo-1543466835-00a7907e9de1?auto=format&fit=crop&w=900&q=85"
                    alt="Anjing kesayangan">
                <span class="fck-art-note">A LITTLE LOVE<br>IN EVERY CHOICE</span>
            </div>
        </section>

        <section class="fck-catalog">
            <div class="fck-intro">
                <div>
                    <span class="fck-eyebrow">THE BOUTIQUE EDIT · Nº 001</span>
                    <h2>Find their <em>favourite.</em></h2>
                    <p>Discover the pieces that make their everyday a little more special.</p>
                </div>
                <div class="fck-intro-side">CURATED WITH CARE<br>ALWAYS CHOSEN WITH LOVE</div>
            </div>

            <div class="fck-toolbar">
                <label class="fck-search">
                    <span>⌕</span>
                    <input type="search" id="fckSearch" placeholder="Find something lovely..."
                        aria-label="Cari produk">
                </label>

                <select id="fckCategory" aria-label="Filter kategori">
                    <option value="all">All Collections</option>
                    <option value="makanan">Nutrition & Food</option>
                    <option value="camilan">Little Treats</option>
                    <option value="aksesoris">Accessories & Play</option>
                    <option value="perawatan">Grooming & Wellness</option>
                    <option value="perlengkapan">Comfort & Living</option>
                </select>

                <select id="fckSort" aria-label="Urutkan produk">
                    <option value="featured">Curated Selection</option>
                    <option value="low">Price: Low to High</option>
                    <option value="high">Price: High to Low</option>
                    <option value="name">Name: A to Z</option>
                </select>
            </div>

            <div class="fck-category-tabs" id="fckCategoryTabs">
                <button class="active" data-category="all">All Pieces</button>
                <button data-category="makanan">Nutrition</button>
                <button data-category="camilan">Treats</button>
                <button data-category="aksesoris">Accessories</button>
                <button data-category="perawatan">Wellness</button>
                <button data-category="perlengkapan">Comfort</button>
            </div>

            <div class="fck-result-line">
                <span id="fckCount">Our curated selection</span>
                <span>THOUGHTFULLY SELECTED · FURRY & CO.</span>
            </div>

            <div class="fck-product-grid" id="fckProductGrid">
                <article class="fck-product-card" data-name="Royal Canin Kitten" data-category="makanan"
                    data-price="185000" data-order="1">
                    <a class="fck-product-image fck-bg-rose"
                        href="{{ url('/webia/template/petshop-luxury-rosegold/produk/royal-canin-kitten') }}">
                        <span class="fck-product-badge">THE FAVOURITE</span>
                        <img src="https://images.unsplash.com/photo-1589924691995-400dc9ecc119?auto=format&fit=crop&w=700&q=85"
                            alt="Makanan kucing">
                    </a>
                    <div class="fck-product-info">
                        <span class="fck-product-category">01 / NOURISH</span>
                        <h3><a href="{{ url('/webia/template/petshop-luxury-rosegold/produk/royal-canin-kitten') }}">Royal
                                Canin Kitten</a></h3>
                        <p>Thoughtful nutrition for little paws.</p>
                        <div class="fck-product-bottom"><strong>Rp185.000</strong><button type="button"
                                class="fck-order" data-cart-add data-slug="royal-canin-kitten"
                                data-name="Royal Canin Kitten" data-price="185000"
                                data-image="https://images.unsplash.com/photo-1589924691995-400dc9ecc119?auto=format&fit=crop&w=700&q=85"
                                data-quantity="1">+ Add to Bag</button></div>
                    </div>
                </article>

                <article class="fck-product-card" data-name="Happy Bites Treats" data-category="camilan"
                    data-price="45000" data-order="2">
                    <a class="fck-product-image fck-bg-cream"
                        href="{{ url('/webia/template/petshop-luxury-rosegold/produk/dog-treats') }}">
                        <span class="fck-product-badge fck-badge-rose">A LITTLE TREAT</span>
                        <img src="https://images.unsplash.com/photo-1582798358481-d199fb7347bb?auto=format&fit=crop&w=700&q=85"
                            alt="Camilan hewan">
                    </a>
                    <div class="fck-product-info">
                        <span class="fck-product-category">02 / LITTLE TREATS</span>
                        <h3><a href="{{ url('/webia/template/petshop-luxury-rosegold/produk/dog-treats') }}">Happy
                                Bites Treats</a></h3>
                        <p>Little rewards, endless affection.</p>
                        <div class="fck-product-bottom"><strong>Rp45.000</strong><button type="button"
                                class="fck-order" data-cart-add data-slug="dog-treats" data-name="Happy Bites Treats"
                                data-price="45000"
                                data-image="https://images.unsplash.com/photo-1582798358481-d199fb7347bb?auto=format&fit=crop&w=700&q=85"
                                data-quantity="1">+ Add to Bag</button></div>
                    </div>
                </article>

                <article class="fck-product-card" data-name="Cloudy Pet Bed" data-category="perlengkapan"
                    data-price="220000" data-order="3">
                    <a class="fck-product-image fck-bg-sand"
                        href="{{ url('/webia/template/petshop-luxury-rosegold/produk/soft-pet-bed') }}">
                        <img src="https://images.unsplash.com/photo-1541599540903-216a46ca1dc0?auto=format&fit=crop&w=700&q=85"
                            alt="Tempat tidur hewan">
                    </a>
                    <div class="fck-product-info">
                        <span class="fck-product-category">03 / COMFORT</span>
                        <h3><a href="{{ url('/webia/template/petshop-luxury-rosegold/produk/soft-pet-bed') }}">Cloudy
                                Pet Bed</a></h3>
                        <p>A softer place to call their own.</p>
                        <div class="fck-product-bottom"><strong>Rp220.000</strong><button type="button"
                                class="fck-order" data-cart-add data-slug="soft-pet-bed" data-name="Cloudy Pet Bed"
                                data-price="220000"
                                data-image="https://images.unsplash.com/photo-1541599540903-216a46ca1dc0?auto=format&fit=crop&w=700&q=85"
                                data-quantity="1">+ Add to Bag</button></div>
                    </div>
                </article>

                <article class="fck-product-card" data-name="Gentle Grooming Kit" data-category="perawatan"
                    data-price="89000" data-order="4">
                    <a class="fck-product-image fck-bg-lilac"
                        href="{{ url('/webia/template/petshop-luxury-rosegold/produk/pet-grooming-kit') }}">
                        <img src="https://images.unsplash.com/photo-1516734212186-a967f81ad0d7?auto=format&fit=crop&w=700&q=85"
                            alt="Perlengkapan grooming">
                    </a>
                    <div class="fck-product-info">
                        <span class="fck-product-category">04 / WELLNESS</span>
                        <h3><a href="{{ url('/webia/template/petshop-luxury-rosegold/produk/pet-grooming-kit') }}">Gentle
                                Grooming Kit</a></h3>
                        <p>Everyday care, made more special.</p>
                        <div class="fck-product-bottom"><strong>Rp89.000</strong><button type="button"
                                class="fck-order" data-cart-add data-slug="pet-grooming-kit"
                                data-name="Gentle Grooming Kit" data-price="89000"
                                data-image="https://images.unsplash.com/photo-1516734212186-a967f81ad0d7?auto=format&fit=crop&w=700&q=85"
                                data-quantity="1">+ Add to Bag</button></div>
                    </div>
                </article>

                <article class="fck-product-card" data-name="Playful Rope Toy" data-category="aksesoris"
                    data-price="35000" data-order="5">
                    <a class="fck-product-image fck-bg-rose"
                        href="{{ url('/webia/template/petshop-luxury-rosegold/produk/playful-rope-toy') }}">
                        <img src="https://images.unsplash.com/photo-1535294435445-d7249524ef2e?auto=format&fit=crop&w=700&q=85"
                            alt="Mainan hewan">
                    </a>
                    <div class="fck-product-info">
                        <span class="fck-product-category">05 / PLAY</span>
                        <h3><a href="{{ url('/webia/template/petshop-luxury-rosegold/produk/playful-rope-toy') }}">Playful
                                Rope Toy</a></h3>
                        <p>For the joy of little adventures.</p>
                        <div class="fck-product-bottom"><strong>Rp35.000</strong><button type="button"
                                class="fck-order" data-cart-add data-slug="playful-rope-toy"
                                data-name="Playful Rope Toy" data-price="35000"
                                data-image="https://images.unsplash.com/photo-1535294435445-d7249524ef2e?auto=format&fit=crop&w=700&q=85"
                                data-quantity="1">+ Add to Bag</button></div>
                    </div>
                </article>

                <article class="fck-product-card" data-name="Cozy Pet Bowl" data-category="aksesoris"
                    data-price="55000" data-order="6">
                    <a class="fck-product-image fck-bg-cream"
                        href="{{ url('/webia/template/petshop-luxury-rosegold/produk/cozy-pet-bowl') }}">
                        <img src="https://images.unsplash.com/photo-1585837575652-267c041d77d4?auto=format&fit=crop&w=700&q=85"
                            alt="Mangkuk makan hewan">
                    </a>
                    <div class="fck-product-info">
                        <span class="fck-product-category">06 / DAILY RITUALS</span>
                        <h3><a href="{{ url('/webia/template/petshop-luxury-rosegold/produk/cozy-pet-bowl') }}">Cozy
                                Pet Bowl</a></h3>
                        <p>A thoughtful touch to every meal.</p>
                        <div class="fck-product-bottom"><strong>Rp55.000</strong><button type="button"
                                class="fck-order" data-cart-add data-slug="cozy-pet-bowl" data-name="Cozy Pet Bowl"
                                data-price="55000"
                                data-image="https://images.unsplash.com/photo-1585837575652-267c041d77d4?auto=format&fit=crop&w=700&q=85"
                                data-quantity="1">+ Add to Bag</button></div>
                    </div>
                </article>
            </div>

            <div class="fck-empty" id="fckEmpty" hidden>
                <span>✳</span>
                <h3>Nothing here just yet.</h3>
                <p>Try another search or explore a different collection.</p>
            </div>
        </section>

        <section class="fck-concierge">
            <div>
                <span class="fck-eyebrow">A PERSONAL TOUCH</span>
                <h2>Something specific<br><em>in mind?</em></h2>
                <p>Ask our team about product details, available variations, current prices, or recommendations for your
                    companion.</p>
            </div>
            <button id="fckConciergeButton">Speak to Our Concierge ↗</button>
        </section>
    </main>

    <footer class="fck-footer">
        <a class="fck-logo" href="{{ url('/webia/template/petshop-luxury-rosegold') }}">
            <span class="fck-logo-mark">F<span>&</span>C</span>
            <span>FURRY <strong>& CO.</strong><small>THE PET BOUTIQUE</small></span>
        </a>
        <p>A little luxury for the ones we love the most.</p>
        <div><a href="{{ url('/webia/template/petshop-luxury-rosegold') }}">Home</a><a href="#top">The
                Collection</a><a href="#" id="fckFooterContact">Concierge</a></div>
        <small>© {{ date('Y') }} Made with care ♡ · Website template by WEBIA</small>
    </footer>

    <script>
        window.FURRY_CONFIG = {
            whatsappNumber: '6285850180285',
            productBaseUrl: @json(url('/webia/template/petshop-luxury-rosegold/produk'))
        };
    </script>
    <script
        src="{{ asset('js/website-bisnis/templates/pet-animal-service/petshop/rosegold/petshop-katalog-luxury-rosegold.js') }}">
    </script>
    <script src="{{ asset('js/website-bisnis/cart/webia-cart.js') }}"></script>
    <script src="{{ asset('js/website-bisnis/cart/webia-cart-popup.js') }}"></script>
</body>

</html>
