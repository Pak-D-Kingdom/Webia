
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product['name'] }} — PetBase</title>

    <link rel="stylesheet" href="{{ asset('css/website-bisnis/templates/pet-animal-service/petshop/plumvelvet/petshop-katalog-corporate-plumvelvet.css') }}">
    <link rel="stylesheet" href="{{ asset('css/website-bisnis/templates/pet-animal-service/petshop/plumvelvet/petshop-produk-corporate-plumvelvet.css') }}">
    <link rel="stylesheet" href="{{ asset('css/website-bisnis/cart/webia-cart-popup.css') }}">
</head>
<body>
    <div class="pbc-topbar">Thoughtful care for every paw · Welcome to PetBase</div>

    <header class="pbc-header">
        <a class="pbc-logo" href="{{ url('/webia/template/petshop-corporate-plumvelvet') }}">
            <span class="pbc-logo-mark">P</span>
            petbase<span>.</span>
        </a>

        <nav class="pbc-nav" aria-label="Navigasi utama">
            <a href="{{ url('/webia/template/petshop-corporate-plumvelvet') }}">Home</a>
            <a href="{{ url('/webia/template/petshop-corporate-plumvelvet/katalog') }}">Products</a>
            <a href="{{ url('/webia/template/petshop-corporate-plumvelvet') }}#about">About Us</a>
            <a href="{{ url('/webia/template/petshop-corporate-plumvelvet') }}#faq">FAQ</a>
        </nav>

        <button type="button" class="pbc-cart-trigger" data-cart-open aria-label="Buka keranjang">
            ♡ Bag <span data-cart-count hidden>0</span>
        </button>
    </header>

    <main class="pbpd-main">
        <div class="pbpd-breadcrumb">
            <a href="{{ url('/webia/template/petshop-corporate-plumvelvet') }}">Home</a>
            <span>/</span>
            <a href="{{ url('/webia/template/petshop-corporate-plumvelvet/katalog') }}">Products</a>
            <span>/</span>
            <span>{{ $product['name'] }}</span>
        </div>

        <section class="pbpd-product">
            <div class="pbpd-image-wrap">
                @php
                    $productImages = [
                        'premium-dog-food' => 'photo-1589924691995-400dc9ecc119',
                        'cozy-pet-bed' => 'photo-1541599540903-216a46ca1dc0',
                        'interactive-rope-toy' => 'photo-1535294435445-d7249524ef2e',
                        'pet-grooming-kit' => 'photo-1516734212186-a967f81ad0d7',
                        'ceramic-pet-bowl' => 'photo-1583337130417-3346a1be7dee',
                        'cat-nutrition-pack' => 'photo-1573865526739-10659fec78a5',
                    ];
                    $imageId = $productImages[$slug] ?? 'photo-1589924691995-400dc9ecc119';
                @endphp

                <img
                    src="https://images.unsplash.com/{{ $imageId }}?auto=format&fit=crop&w=1000&q=85"
                    alt="{{ $product['name'] }}"
                >

                <span class="pbpd-image-label">PETBASE COLLECTION</span>
            </div>

            <div class="pbpd-info">
                <span class="pbpd-eyebrow">{{ $product['brand'] }}</span>
                <p class="pbpd-category">{{ $product['category'] }}</p>

                <h1>{{ $product['name'] }}</h1>

                <div class="pbpd-price">
                    Rp{{ number_format($product['price'], 0, ',', '.') }}
                </div>

                <p class="pbpd-description">{{ $product['description'] }}</p>

                <div class="pbpd-stock">
                    <span></span>
                    Demo product · Stock must be confirmed with the store
                </div>

                <div class="pbpd-quantity">
                    <label for="pbpdQuantity">Quantity</label>
                    <div>
                        <button type="button" id="pbpdMinus" aria-label="Kurangi jumlah">−</button>
                        <input type="number" id="pbpdQuantity" min="1" max="99" value="1">
                        <button type="button" id="pbpdPlus" aria-label="Tambah jumlah">+</button>
                    </div>
                </div>

                <button
                    type="button"
                    class="pbpd-add-button"
                    id="pbpdAddToCart"
                    data-cart-add
                    data-product="{{ $product['name'] }}"
                    data-price="{{ $product['price'] }}"
                >
                    Add to Bag ♡
                </button>

                <button type="button" class="pbpd-contact-button" id="pbpdContact">
                    Ask about this product ↗
                </button>

                <p class="pbpd-disclaimer">
                    Demonstration price and product information. Confirm current price,
                    specifications, and availability before ordering.
                </p>

                <div class="pbpd-specifications">
                    <h2>Product specifications</h2>

                    @foreach ($product['specifications'] as $label => $value)
                        <div class="pbpd-spec-row">
                            <span>{{ $label }}</span>
                            <strong>{{ $value }}</strong>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="pbpd-more">
            <div>
                <span class="pbpd-eyebrow">DISCOVER MORE</span>
                <h2>Find more essentials for your pet.</h2>
            </div>

            <a href="{{ url('/webia/template/petshop-corporate-plumvelvet/katalog') }}">
                Browse all products →
            </a>
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

    <script src="{{ asset('js/website-bisnis/templates/pet-animal-service/petshop/plumvelvet/petshop-produk-corporate-plumvelvet.js') }}"></script>
    <script src="{{ asset('js/website-bisnis/cart/webia-cart.js') }}"></script>
    <script src="{{ asset('js/website-bisnis/cart/webia-cart-popup.js') }}"></script>
</body>
</html>
