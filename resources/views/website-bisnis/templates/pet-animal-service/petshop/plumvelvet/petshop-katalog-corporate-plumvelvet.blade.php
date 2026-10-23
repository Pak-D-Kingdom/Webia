<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#432443">
    <title>Product Collection — PetBase</title>

    <link rel="stylesheet"
        href="{{ asset('css/website-bisnis/templates/pet-animal-service/petshop/plumvelvet/petshop-katalog-corporate-plumvelvet.css') }}">
    <link rel="stylesheet" href="{{ asset('css/website-bisnis/cart/webia-cart-popup.css') }}">
</head>

<body>
    <div class="pbc-topbar">
        Thoughtful care for every paw · Welcome to PetBase
    </div>

    <header class="pbc-header">
        <a class="pbc-logo" href="{{ url('/webia/template/petshop-corporate-plumvelvet') }}">
            <span class="pbc-logo-mark">P</span>
            petbase<span>.</span>
        </a>

        <nav class="pbc-nav" aria-label="Navigasi utama">
            <a href="{{ url('/webia/template/petshop-corporate-plumvelvet') }}">Home</a>
            <a href="{{ url('/webia/template/petshop-corporate-plumvelvet/katalog') }}" aria-current="page">Products</a>
            <a href="{{ url('/webia/template/petshop-corporate-plumvelvet') }}#about">About Us</a>
            <a href="{{ url('/webia/template/petshop-corporate-plumvelvet') }}#faq">FAQ</a>
        </nav>

        <button type="button" class="pbc-cart-trigger" data-cart-open aria-label="Buka keranjang">
            ♡ Bag <span data-cart-count hidden>0</span>
        </button>
    </header>

    <main>
        <section class="pbc-hero">
            <span class="pbc-eyebrow">THE PETBASE COLLECTION</span>
            <h1>Everyday essentials.<br><span>Exceptional care.</span></h1>
            <p>Discover thoughtfully selected products for your beloved companions.</p>
            <div class="pbc-hero-meta">
                <span>Food & Nutrition</span>
                <span>Daily Essentials</span>
                <span>Toys & Play</span>
            </div>
        </section>

        <section class="pbc-catalog">
            <div class="pbc-heading">
                <div>
                    <span class="pbc-eyebrow">SHOP OUR COLLECTION</span>
                    <h2>Find their favorites.</h2>
                    <p>Search and explore the essentials for your pets.</p>
                </div>
                <span class="pbc-result-count" id="pbcResultCount">6 products</span>
            </div>

            <div class="pbc-toolbar">
                <label class="pbc-search">
                    <span aria-hidden="true">⌕</span>
                    <input type="search" id="pbcSearch" placeholder="Search products or brands..."
                        aria-label="Cari produk">
                </label>

                <label class="pbc-sort-label">
                    <span>Sort by</span>
                    <select id="pbcSort" aria-label="Urutkan produk">
                        <option value="featured">Featured</option>
                        <option value="price-asc">Price: Low to High</option>
                        <option value="price-desc">Price: High to Low</option>
                        <option value="name">Product Name</option>
                    </select>
                </label>
            </div>

            <div class="pbc-layout">
                <aside class="pbc-sidebar">
                    <h3>Categories</h3>
                    <label><input type="radio" name="pbcCategory" value="all" checked> All Products</label>
                    <label><input type="radio" name="pbcCategory" value="food"> Food & Nutrition</label>
                    <label><input type="radio" name="pbcCategory" value="supplies"> Daily Essentials</label>
                    <label><input type="radio" name="pbcCategory" value="grooming"> Grooming & Care</label>
                    <label><input type="radio" name="pbcCategory" value="toys"> Toys & Play</label>

                    <div class="pbc-sidebar-note">
                        <strong>Need bulk quantities?</strong>
                        <p>Contact our team to discuss wholesale orders and stock availability.</p>
                        <button type="button" id="pbcBulkOrder">Ask about bulk orders ↗</button>
                    </div>
                </aside>

                <div class="pbc-product-area">
                    <div class="pbc-product-grid" id="pbcProductGrid">
                        <article class="pbc-product-card" data-name="Premium Dog Food" data-category="food"
                            data-price="185000" data-brand="PetBase Select" data-stock="available">
                            <a class="pbc-product-image"
                                href="{{ url('/webia/template/petshop-corporate-plumvelvet/produk/premium-dog-food') }}">
                                <img src="https://images.unsplash.com/photo-1589924691995-400dc9ecc119?auto=format&fit=crop&w=700&q=80"
                                    alt="Premium dog food" loading="lazy">
                                <span class="pbc-label">BESTSELLER</span>
                            </a>
                            <div class="pbc-product-info">
                                <span class="pbc-brand">PETBASE SELECT</span>
                                <h3><a
                                        href="{{ url('/webia/template/petshop-corporate-plumvelvet/produk/premium-dog-food') }}">Premium
                                        Dog Food</a></h3>
                                <p class="pbc-spec">Daily nutrition · Dry food</p>
                                <div class="pbc-product-bottom">
                                    <strong>Rp185.000</strong>
                                    <span class="pbc-stock">Demo stock</span>
                                </div>
                                <button type="button" data-cart-add data-slug="premium-dog-food"
                                    data-name="Premium Dog Food" data-price="185000"
                                    data-image="https://images.unsplash.com/photo-1589924691995-400dc9ecc119?auto=format&fit=crop&w=700&q=80">
                                    Add to Bag +
                                </button>
                            </div>
                        </article>

                        <article class="pbc-product-card" data-name="Cozy Pet Bed" data-category="supplies"
                            data-price="220000" data-brand="PetBase Home" data-stock="available">
                            <a class="pbc-product-image"
                                href="{{ url('/webia/template/petshop-corporate-plumvelvet/produk/cozy-pet-bed') }}">
                                <img src="https://images.unsplash.com/photo-1541599540903-216a46ca1dc0?auto=format&fit=crop&w=700&q=80"
                                    alt="Cozy pet bed" loading="lazy">
                                <span class="pbc-label">COMFORT PICK</span>
                            </a>
                            <div class="pbc-product-info">
                                <span class="pbc-brand">PETBASE HOME</span>
                                <h3><a
                                        href="{{ url('/webia/template/petshop-corporate-plumvelvet/produk/cozy-pet-bed') }}">Cozy
                                        Pet Bed</a></h3>
                                <p class="pbc-spec">Soft resting bed · Everyday comfort</p>
                                <div class="pbc-product-bottom">
                                    <strong>Rp220.000</strong>
                                    <span class="pbc-stock">Demo stock</span>
                                </div>
                                <button type="button" data-cart-add data-slug="cozy-pet-bed"
                                    data-name="Cozy Pet Bed" data-price="220000"
                                    data-image="https://images.unsplash.com/photo-1541599540903-216a46ca1dc0?auto=format&fit=crop&w=700&q=80">
                                    Add to Bag +
                                </button>
                            </div>
                        </article>

                        <article class="pbc-product-card" data-name="Interactive Rope Toy" data-category="toys"
                            data-price="35000" data-brand="PlayPaws" data-stock="available">
                            <a class="pbc-product-image"
                                href="{{ url('/webia/template/petshop-corporate-plumvelvet/produk/interactive-rope-toy') }}">
                                <img src="https://images.unsplash.com/photo-1535294435445-d7249524ef2e?auto=format&fit=crop&w=700&q=80"
                                    alt="Interactive pet toy" loading="lazy">
                                <span class="pbc-label">PLAYTIME</span>
                            </a>
                            <div class="pbc-product-info">
                                <span class="pbc-brand">PLAYPAWS</span>
                                <h3><a
                                        href="{{ url('/webia/template/petshop-corporate-plumvelvet/produk/interactive-rope-toy') }}">Interactive
                                        Rope Toy</a></h3>
                                <p class="pbc-spec">Interactive play · Rope toy</p>
                                <div class="pbc-product-bottom">
                                    <strong>Rp35.000</strong>
                                    <span class="pbc-stock">Demo stock</span>
                                </div>
                                <button type="button" data-cart-add data-slug="interactive-rope-toy"
                                    data-name="Interactive Rope Toy" data-price="35000"
                                    data-image="https://images.unsplash.com/photo-1535294435445-d7249524ef2e?auto=format&fit=crop&w=700&q=80">
                                    Add to Bag +
                                </button>
                            </div>
                        </article>

                        <article class="pbc-product-card" data-name="Pet Grooming Kit" data-category="grooming"
                            data-price="89000" data-brand="PetBase Care" data-stock="available">
                            <a class="pbc-product-image"
                                href="{{ url('/webia/template/petshop-corporate-plumvelvet/produk/pet-grooming-kit') }}">
                                <img src="https://images.unsplash.com/photo-1516734212186-a967f81ad0d7?auto=format&fit=crop&w=700&q=80"
                                    alt="Pet grooming care" loading="lazy">
                                <span class="pbc-label">CARE ESSENTIAL</span>
                            </a>
                            <div class="pbc-product-info">
                                <span class="pbc-brand">PETBASE CARE</span>
                                <h3><a
                                        href="{{ url('/webia/template/petshop-corporate-plumvelvet/produk/pet-grooming-kit') }}">Pet
                                        Grooming Kit</a></h3>
                                <p class="pbc-spec">Home grooming · Care accessories</p>
                                <div class="pbc-product-bottom">
                                    <strong>Rp89.000</strong>
                                    <span class="pbc-stock">Demo stock</span>
                                </div>
                                <button type="button" data-cart-add data-slug="pet-grooming-kit"
                                    data-name="Pet Grooming Kit" data-price="89000"
                                    data-image="https://images.unsplash.com/photo-1548199973-03cce0bbc87b?auto=format&fit=crop&w=650&q=80">
                                    Add to Bag +
                                </button>
                            </div>
                        </article>

                        <article class="pbc-product-card" data-name="Ceramic Pet Bowl" data-category="supplies"
                            data-price="55000" data-brand="PetBase Home" data-stock="available">
                            <a class="pbc-product-image"
                                href="{{ url('/webia/template/petshop-corporate-plumvelvet/produk/ceramic-pet-bowl') }}">
                                <img src="https://images.unsplash.com/photo-1583337130417-3346a1be7dee?auto=format&fit=crop&w=700&q=80"
                                    alt="Pet bowl" loading="lazy">
                                <span class="pbc-label">EVERYDAY PICK</span>
                            </a>
                            <div class="pbc-product-info">
                                <span class="pbc-brand">PETBASE HOME</span>
                                <h3><a
                                        href="{{ url('/webia/template/petshop-corporate-plumvelvet/produk/ceramic-pet-bowl') }}">Ceramic
                                        Pet Bowl</a></h3>
                                <p class="pbc-spec">Feeding accessory · Ceramic</p>
                                <div class="pbc-product-bottom">
                                    <strong>Rp55.000</strong>
                                    <span class="pbc-stock">Demo stock</span>
                                </div>
                                <button type="button" data-cart-add data-slug="ceramic-pet-bowl"
                                    data-name="Ceramic Pet Bowl" data-price="55000"
                                    data-image="https://images.unsplash.com/photo-1583337130417-3346a1be7dee?auto=format&fit=crop&w=700&q=80">
                                    Add to Bag +
                                </button>
                            </div>
                        </article>

                        <article class="pbc-product-card" data-name="Cat Nutrition Pack" data-category="food"
                            data-price="125000" data-brand="PetBase Select" data-stock="available">
                            <a class="pbc-product-image"
                                href="{{ url('/webia/template/petshop-corporate-plumvelvet/produk/cat-nutrition-pack') }}">
                                <img src="https://images.unsplash.com/photo-1573865526739-10659fec78a5?auto=format&fit=crop&w=700&q=80"
                                    alt="Cat nutrition product" loading="lazy">
                                <span class="pbc-label">NUTRITION</span>
                            </a>
                            <div class="pbc-product-info">
                                <span class="pbc-brand">PETBASE SELECT</span>
                                <h3><a
                                        href="{{ url('/webia/template/petshop-corporate-plumvelvet/produk/cat-nutrition-pack') }}">Cat
                                        Nutrition Pack</a></h3>
                                <p class="pbc-spec">Cat food · Daily nutrition</p>
                                <div class="pbc-product-bottom">
                                    <strong>Rp125.000</strong>
                                    <span class="pbc-stock">Demo stock</span>
                                </div>
                                <button type="button" data-cart-add data-slug="cat-nutrition-pack"
                                    data-name="Cat Nutrition Pack" data-price="125000"
                                    data-image="https://images.unsplash.com/photo-1573865526739-10659fec78a5?auto=format&fit=crop&w=700&q=80">
                                    Add to Bag +
                                </button>
                            </div>
                        </article>
                    </div>

                    <div class="pbc-empty" id="pbcEmpty" hidden>
                        <span>⌕</span>
                        <h3>No products found</h3>
                        <p>Try another keyword or choose a different category.</p>
                        <button type="button" id="pbcReset">Reset filters</button>
                    </div>
                </div>
            </div>
        </section>

        <section class="pbc-order-note">
            <div>
                <span class="pbc-eyebrow">BEFORE YOU ORDER</span>
                <h2>Need product details or bulk quantities?</h2>
                <p>Prices, product specifications, and stock in this preview are examples. Confirm the latest
                    information with our team before ordering.</p>
            </div>
            <button type="button" class="pbc-contact-button" id="pbcContact">Contact PetBase ↗</button>
        </section>
    </main>

    <footer class="pbc-footer">
        <a class="pbc-logo pbc-footer-logo" href="{{ url('/webia/template/petshop-corporate-plumvelvet') }}">
            <span class="pbc-logo-mark">P</span> petbase<span>.</span>
        </a>
        <div class="pbc-footer-links">
            <a href="{{ url('/webia/template/petshop-corporate-plumvelvet') }}">Home</a>
            <a href="{{ url('/webia/template/petshop-corporate-plumvelvet') }}#faq">FAQ</a>
            <a href="{{ url('/webia/template/petshop-corporate-plumvelvet') }}#about">About Us</a>
        </div>
        <p class="pbc-credit">Made with care ♡ · Website template by WEBIA</p>
    </footer>

    <script>
        window.PETBASE_CONFIG = {
            whatsappNumber: '6285850180285',
            catalogUrl: @json(url('/webia/template/petshop-corporate-plumvelvet/katalog')),
            productBaseUrl: @json(url('/webia/template/petshop-corporate-plumvelvet/produk'))
        };
    </script>

    <script
        src="{{ asset('js/website-bisnis/templates/pet-animal-service/petshop/plumvelvet/petshop-katalog-corporate-plumvelvet.js') }}">
    </script>
    <script src="{{ asset('js/website-bisnis/cart/webia-cart.js') }}"></script>
    <script src="{{ asset('js/website-bisnis/cart/webia-cart-popup.js') }}"></script>
</body>

</html>
