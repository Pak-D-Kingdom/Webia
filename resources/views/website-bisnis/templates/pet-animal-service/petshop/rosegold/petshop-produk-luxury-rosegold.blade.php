<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Discover thoughtfully selected pet essentials at Furry & Co.">
    <title>Product Details — Furry & Co.</title>
    <link rel="stylesheet" href="{{ asset('css/website-bisnis/cart/webia-cart-popup.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@400;500;600;700&family=Manrope:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <link rel="stylesheet"
        href="{{ asset('css/website-bisnis/templates/pet-animal-service/petshop/rosegold/petshop-produk-luxury-rosegold.css') }}">
</head>

<body>

    <div class="fcp-announcement">
        A LITTLE LUXURY FOR THE ONES WE LOVE MOST <span>✦</span>
        <a href="{{ url('/webia/template/petshop-luxury-rosegold/katalog') }}">Discover the collection ↗</a>
    </div>

    <header class="fcp-header">
        <a class="fcp-logo" href="{{ url('/webia/template/petshop-luxury-rosegold') }}">
            <span class="fcp-logo-mark">F<span>&</span>C</span>
            <span>FURRY <strong>& CO.</strong><small>THE PET BOUTIQUE</small></span>
        </a>

        <nav>
            <a href="{{ url('/webia/template/petshop-luxury-rosegold') }}">Home</a>
            <a href="{{ url('/webia/template/petshop-luxury-rosegold/katalog') }}">The Collection</a>
            <a href="{{ url('/webia/template/petshop-luxury-rosegold#about') }}">Our Story</a>
            <button type="button" class="fck-cart-trigger" data-cart-open aria-label="Buka keranjang belanja">
                <span aria-hidden="true">♡</span>
                <span>Bag</span>
                <span data-cart-count hidden>0</span>
            </button>
        </nav>

        <button class="fcp-concierge-button" id="fcpHeaderContact">Concierge ↗</button>
    </header>

    <main class="fcp-main">
        <div class="fcp-breadcrumb">
            <a href="{{ url('/webia/template/petshop-luxury-rosegold') }}">Home</a>
            <span>—</span>
            <a href="{{ url('/webia/template/petshop-luxury-rosegold/katalog') }}">The Collection</a>
            <span>—</span>
            <span id="fcpBreadcrumbName">Product Details</span>
        </div>

        <section class="fcp-product">
            <div class="fcp-gallery">
                <div class="fcp-image-frame" id="fcpImageFrame">
                    <span class="fcp-image-label" id="fcpImageBadge">THE BOUTIQUE EDIT</span>
                    <img id="fcpProductImage" src="" alt="Product image">
                    <span class="fcp-image-index">F&C · Nº 001</span>
                </div>
                <p class="fcp-image-caption">THOUGHTFULLY SELECTED · ALWAYS WITH LOVE</p>
            </div>

            <div class="fcp-product-info">
                <span class="fcp-eyebrow" id="fcpCategory">THE BOUTIQUE COLLECTION</span>
                <h1 id="fcpProductName">A little something special.</h1>

                <div class="fcp-rating">
                    <span>★★★★★</span>
                    <small>Thoughtfully selected for your companion</small>
                </div>

                <div class="fcp-price" id="fcpProductPrice">Rp0</div>
                <p class="fcp-description" id="fcpProductDescription"></p>

                <div class="fcp-stock">
                    <span class="fcp-stock-dot"></span>
                    <div>
                        <strong>Availability on request</strong>
                        <small>Please confirm stock and current pricing with our team.</small>
                    </div>
                </div>

                <div class="fcp-divider"></div>

                <label class="fcp-quantity-label" for="fcpQuantity">YOUR DESIRED QUANTITY</label>
                <div class="fcp-quantity">
                    <button type="button" id="fcpMinus" aria-label="Kurangi jumlah">−</button>
                    <input type="number" id="fcpQuantity" min="1" max="99" value="1"
                        inputmode="numeric" aria-label="Jumlah produk">
                    <button type="button" id="fcpPlus" aria-label="Tambah jumlah">+</button>
                </div>

                <div class="fcp-actions">
                    <button class="fcp-order-button" id="fcpOrderButton">Enquire & Order via WhatsApp ↗</button>
                    <button class="fcp-stock-button" id="fcpStockButton">Check Availability</button>
                </div>

                <div class="fcp-benefits">
                    <div><span>✧</span>
                        <p><strong>A thoughtful choice</strong><small>Selected with your pet in mind</small></p>
                    </div>
                    <div><span>♡</span>
                        <p><strong>Personal assistance</strong><small>Ask our team for recommendations</small></p>
                    </div>
                    <div><span>✉</span>
                        <p><strong>Order with confidence</strong><small>Confirm details before purchasing</small></p>
                    </div>
                </div>
            </div>
        </section>

        <section class="fcp-details">
            <div class="fcp-details-heading">
                <span class="fcp-eyebrow">A CLOSER LOOK</span>
                <h2>The details that<br><em>make a difference.</em></h2>
            </div>

            <div class="fcp-details-copy">
                <h3 id="fcpDetailHeading">Meet your new favourite.</h3>
                <p id="fcpLongDescription"></p>

                <div class="fcp-note">
                    <span>✧</span>
                    <div>
                        <strong>A little note from our boutique</strong>
                        <p>Prices, product variations, sizes, and availability shown here are demonstration data. Please
                            confirm the latest information with our team before placing an order.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="fcp-concierge">
            <div>
                <span class="fcp-eyebrow">HERE FOR EVERY LITTLE PAW</span>
                <h2>Need a little<br><em>personal guidance?</em></h2>
                <p>Ask about product details, suitable variations, availability, or recommendations for your beloved
                    companion.</p>
            </div>
            <button id="fcpQuestionButton">Speak to Our Concierge ↗</button>
        </section>

        <div class="fcp-back">
            <a href="{{ url('/webia/template/petshop-luxury-rosegold/katalog') }}">← Back to the collection</a>
            <a href="{{ url('/webia/template/petshop-luxury-rosegold') }}">Return to homepage ↗</a>
        </div>
    </main>

    <footer class="fcp-footer">
        <a class="fcp-logo" href="{{ url('/webia/template/petshop-luxury-rosegold') }}">
            <span class="fcp-logo-mark">F<span>&</span>C</span>
            <span>FURRY <strong>& CO.</strong><small>THE PET BOUTIQUE</small></span>
        </a>
        <p>A little luxury for the ones we love the most.</p>
        <div class="fcp-footer-links">
            <a href="{{ url('/webia/template/petshop-luxury-rosegold') }}">Home</a>
            <a href="{{ url('/webia/template/petshop-luxury-rosegold/katalog') }}">The Collection</a>
            <a href="#" id="fcpFooterContact">Concierge</a>
        </div>
        <small>© {{ date('Y') }} Furry & Co. — Pet Boutique Demo.</small>
    </footer>

    <script>
        window.FURRY_CONFIG = {
            whatsappNumber: '6285850180285',
            productSlug: @json(request()->route('slug'))
        };
    </script>
    <script
        src="{{ asset('js/website-bisnis/templates/pet-animal-service/petshop/rosegold/petshop-produk-luxury-rosegold.js') }}">
    </script>
    <script src="{{ asset('js/website-bisnis/cart/webia-cart.js') }}"></script>
    <script src="{{ asset('js/website-bisnis/cart/webia-cart-popup.js') }}"></script>

</html>
