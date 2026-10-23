
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#432443">
    <meta name="description" content="PetBase menyediakan makanan, perlengkapan, dan kebutuhan hewan peliharaan pilihan dengan layanan yang tepercaya.">

    <title>PetBase — Trusted Essentials for Every Pet</title>

    <link rel="stylesheet" href="{{ asset('css/website-bisnis/templates/pet-animal-service/petshop/plumvelvet/petshop-corporate-plumvelvet.css') }}">
</head>
<body>

    <div class="pb-topbar">
        <p>Thoughtful care for every paw. Discover your pet's essentials.</p>
    </div>

    <header class="pb-header">
        <a href="{{ url('/webia/template/petshop-corporate-plumvelvet') }}"
           class="pb-logo">
            <span class="pb-logo-icon">P</span>
            <span>petbase<span class="pb-logo-dot">.</span></span>
        </a>

        <nav class="pb-nav" aria-label="Navigasi utama">
            <a href="#home">Home</a>
            <a href="#categories">Categories</a>
            <a href="#products">Products</a>
            <a href="#about">About Us</a>
            <a href="#faq">FAQ</a>
        </nav>

        <div class="pb-header-actions">
            <a href="{{ url('/webia/template/petshop-corporate-plumvelvet/katalog') }}"
               class="pb-button pb-button-primary">
                Explore Shop <span aria-hidden="true">↗</span>
            </a>
        </div>
    </header>

    <main>
        {{-- HERO --}}
        <section class="pb-hero" id="home">
            <div class="pb-hero-content">
                <span class="pb-eyebrow">THE PETBASE DIFFERENCE</span>

                <h1>
                    Better Care.<br>
                    <span>Happier Paws.</span>
                </h1>

                <p>
                    Everyday essentials, thoughtfully selected for the
                    pets who make our lives extraordinary.
                </p>

                <div class="pb-hero-actions">
                    <a href="{{ url('/webia/template/petshop-corporate-plumvelvet/katalog') }}"
                       class="pb-button pb-button-light">
                        Shop Collection <span aria-hidden="true">→</span>
                    </a>

                    <a href="#about" class="pb-text-link">
                        Discover PetBase
                    </a>
                </div>

                <div class="pb-hero-note">
                    <span class="pb-status-dot"></span>
                    Quality essentials for your beloved companions
                </div>
            </div>

            <div class="pb-hero-visual">
                <div class="pb-hero-orbit"></div>

                <img
                    src="https://images.unsplash.com/photo-1543466835-00a7907e9de1?auto=format&fit=crop&w=1000&q=85"
                    alt="Anjing peliharaan yang sehat dan bahagia"
                    class="pb-hero-image"
                >

                <div class="pb-floating-card">
                    <span class="pb-floating-icon">♡</span>
                    <div>
                        <strong>Care comes first</strong>
                        <p>Every pet deserves the best.</p>
                    </div>
                </div>

                <span class="pb-hero-decoration pb-decoration-one">✳</span>
                <span class="pb-hero-decoration pb-decoration-two">✦</span>
            </div>
        </section>

        {{-- TRUST POINTS --}}
        <section class="pb-trust-strip" aria-label="Keunggulan PetBase">
            <div><span>✦</span> Carefully Selected Products</div>
            <div><span>✦</span> Trusted Pet Essentials</div>
            <div><span>✦</span> Support for Bulk Orders</div>
            <div><span>✦</span> Friendly Customer Service</div>
        </section>

        {{-- CATEGORIES --}}
        <section class="pb-section pb-categories" id="categories">
            <div class="pb-section-heading">
                <div>
                    <span class="pb-eyebrow">FIND THEIR FAVORITES</span>
                    <h2>Everything they need,<br>all in one place.</h2>
                </div>

                <a href="{{ url('/webia/template/petshop-corporate-plumvelvet/katalog') }}"
                   class="pb-text-link">
                    View all categories →
                </a>
            </div>

            <div class="pb-category-grid">
                <a class="pb-category-card pb-category-food"
                   href="{{ url('/webia/template/petshop-corporate-plumvelvet/katalog') }}?category=food">
                    <span class="pb-category-number">01</span>
                    <div>
                        <h3>Food & Nutrition</h3>
                        <p>Daily nutrition for a happy, healthy life.</p>
                        <span class="pb-category-link">Explore collection ↗</span>
                    </div>
                </a>

                <a class="pb-category-card pb-category-supplies"
                   href="{{ url('/webia/template/petshop-corporate-plumvelvet/katalog') }}?category=supplies">
                    <span class="pb-category-number">02</span>
                    <div>
                        <h3>Daily Essentials</h3>
                        <p>Practical essentials for everyday care.</p>
                        <span class="pb-category-link">Explore collection ↗</span>
                    </div>
                </a>

                <a class="pb-category-card pb-category-toys"
                   href="{{ url('/webia/template/petshop-corporate-plumvelvet/katalog') }}?category=toys">
                    <span class="pb-category-number">03</span>
                    <div>
                        <h3>Toys & Play</h3>
                        <p>Make every playtime a little more special.</p>
                        <span class="pb-category-link">Explore collection ↗</span>
                    </div>
                </a>
            </div>
        </section>

        {{-- FEATURED PRODUCTS --}}
        <section class="pb-section pb-products" id="products">
            <div class="pb-section-heading">
                <div>
                    <span class="pb-eyebrow">THE PETBASE SELECTION</span>
                    <h2>Customer favorites.</h2>
                    <p>Discover a few essentials selected for your furry friends.</p>
                </div>

                <a href="{{ url('/webia/template/petshop-corporate-plumvelvet/katalog') }}"
                   class="pb-button pb-button-outline">
                    Browse All Products →
                </a>
            </div>

            <div class="pb-product-grid">
                <article class="pb-product-card">
                    <a href="{{ url('/webia/template/petshop-corporate-plumvelvet/katalog') }}"
                       class="pb-product-image">
                        <img
                            src="https://images.unsplash.com/photo-1589924691995-400dc9ecc119?auto=format&fit=crop&w=650&q=80"
                            alt="Makanan anjing"
                            loading="lazy"
                        >
                        <span class="pb-product-label">DAILY ESSENTIAL</span>
                    </a>
                    <div class="pb-product-info">
                        <span class="pb-product-category">Food & Nutrition</span>
                        <h3>Premium Pet Nutrition</h3>
                        <p>Nutritious everyday food for your companion.</p>
                        <a href="{{ url('/webia/template/petshop-corporate-plumvelvet/katalog') }}"
                           class="pb-product-link">
                            Explore product ↗
                        </a>
                    </div>
                </article>

                <article class="pb-product-card">
                    <a href="{{ url('/webia/template/petshop-corporate-plumvelvet/katalog') }}"
                       class="pb-product-image">
                        <img
                            src="https://images.unsplash.com/photo-1601758228041-f3b2795255f1?auto=format&fit=crop&w=650&q=80"
                            alt="Perlengkapan hewan peliharaan"
                            loading="lazy"
                        >
                        <span class="pb-product-label">EVERYDAY COMFORT</span>
                    </a>
                    <div class="pb-product-info">
                        <span class="pb-product-category">Daily Essentials</span>
                        <h3>Comfort & Care</h3>
                        <p>Thoughtful essentials for their daily routines.</p>
                        <a href="{{ url('/webia/template/petshop-corporate-plumvelvet/katalog') }}"
                           class="pb-product-link">
                            Explore product ↗
                        </a>
                    </div>
                </article>

                <article class="pb-product-card">
                    <a href="{{ url('/webia/template/petshop-corporate-plumvelvet/katalog') }}"
                       class="pb-product-image">
                        <img
                            src="https://images.unsplash.com/photo-1535294435445-d7249524ef2e?auto=format&fit=crop&w=650&q=80"
                            alt="Anjing bermain"
                            loading="lazy"
                        >
                        <span class="pb-product-label">PLAYTIME FAVORITE</span>
                    </a>
                    <div class="pb-product-info">
                        <span class="pb-product-category">Toys & Play</span>
                        <h3>Playtime Collection</h3>
                        <p>Little things that make playtime more joyful.</p>
                        <a href="{{ url('/webia/template/petshop-corporate-plumvelvet/katalog') }}"
                           class="pb-product-link">
                            Explore product ↗
                        </a>
                    </div>
                </article>
            </div>

            <p class="pb-demo-note">
                Product images and descriptions are demonstration content.
                Confirm actual products, prices, and stock with the store.
            </p>
        </section>

        {{-- WHOLESALE --}}
        <section class="pb-wholesale">
            <div class="pb-wholesale-content">
                <span class="pb-eyebrow">FOR PET BUSINESSES</span>
                <h2>Good care works<br>better together.</h2>
                <p>
                    Running a pet shop, grooming salon, or animal care business?
                    Contact our team to discuss bulk orders and product availability.
                </p>

                <button type="button"
                        class="pb-button pb-button-light"
                        id="pbWholesaleButton">
                    Discuss a Bulk Order ↗
                </button>
            </div>

            <div class="pb-wholesale-mark" aria-hidden="true">
                <span>PB</span>
                <small>CARE • QUALITY • TRUST</small>
            </div>
        </section>

        {{-- ABOUT / STORE INFORMATION --}}
        <section class="pb-section pb-about" id="about">
            <div class="pb-about-visual">
                <img
                    src="https://images.unsplash.com/photo-1601758123927-196e7b9e1cb6?auto=format&fit=crop&w=900&q=85"
                    alt="Pemilik merawat hewan peliharaannya"
                    loading="lazy"
                >
                <div class="pb-about-badge">
                    <span>Care</span>
                    <strong>That feels<br>like family.</strong>
                </div>
            </div>

            <div class="pb-about-content">
                <span class="pb-eyebrow">A LITTLE ABOUT US</span>
                <h2>More than products.<br>A partner in pet care.</h2>
                <p>
                    At PetBase, we believe caring for pets starts with choosing
                    the right essentials. Our goal is to make finding everyday
                    pet supplies simple, clear, and convenient.
                </p>

                <div class="pb-about-points">
                    <div>
                        <span>01</span>
                        <p><strong>Thoughtful selection</strong><br>Explore products for everyday pet needs.</p>
                    </div>
                    <div>
                        <span>02</span>
                        <p><strong>Clear product information</strong><br>Ask our team about specifications and availability.</p>
                    </div>
                    <div>
                        <span>03</span>
                        <p><strong>Orders that fit your needs</strong><br>Contact us for individual or bulk order enquiries.</p>
                    </div>
                </div>
            </div>
        </section>

        {{-- STORE INFORMATION --}}
        <section class="pb-store-info">
            <div class="pb-store-info-heading">
                <span class="pb-eyebrow">HERE TO HELP</span>
                <h2>Let's make pet care easier.</h2>
            </div>

            <div class="pb-store-info-grid">
                <article>
                    <span class="pb-info-icon">⌖</span>
                    <h3>Store Location</h3>
                    <p>Please contact our team for the current store address.</p>
                </article>

                <article>
                    <span class="pb-info-icon">◷</span>
                    <h3>Opening Hours</h3>
                    <p>Contact our team to confirm current operating hours.</p>
                </article>

                <article>
                    <span class="pb-info-icon">↗</span>
                    <h3>How to Order</h3>
                    <p>Browse the catalog, choose your items, and confirm your order with our team.</p>
                </article>
            </div>
        </section>

        {{-- FAQ: LANDING PAGE ONLY --}}
        <section class="pb-section pb-faq" id="faq">
            <div class="pb-faq-intro">
                <span class="pb-eyebrow">GOOD TO KNOW</span>
                <h2>Questions about<br>your pet's essentials?</h2>
                <p>Here are some helpful answers before you place an order.</p>

                <button type="button"
                        class="pb-button pb-button-primary"
                        id="pbFaqContact">
                    Ask Our Team ↗
                </button>
            </div>

            <div class="pb-faq-list">
                <details>
                    <summary>How can I place an order?</summary>
                    <p>
                        Browse the catalog and contact our team through WhatsApp
                        to confirm your selected products, quantities, and order details.
                    </p>
                </details>

                <details>
                    <summary>How do I check product availability?</summary>
                    <p>
                        Product availability may change. Contact our team to confirm
                        current stock before placing your order.
                    </p>
                </details>

                <details>
                    <summary>Can I place a wholesale or bulk order?</summary>
                    <p>
                        Yes, you can contact our team to discuss larger quantities,
                        product availability, and wholesale order requirements.
                    </p>
                </details>

                <details>
                    <summary>Where can I find product specifications?</summary>
                    <p>
                        Open the product details when available, or ask our team
                        for additional information about the product you need.
                    </p>
                </details>

                <details>
                    <summary>What payment and delivery options are available?</summary>
                    <p>
                        Please confirm the available payment, delivery, and pickup
                        options with our team when arranging your order.
                    </p>
                </details>
            </div>
        </section>
    </main>

    {{-- FOOTER --}}
    <footer class="pb-footer">
        <div class="pb-footer-main">
            <div class="pb-footer-brand">
                <a href="#home" class="pb-logo pb-footer-logo">
                    <span class="pb-logo-icon">P</span>
                    <span>petbase<span class="pb-logo-dot">.</span></span>
                </a>
                <p>
                    Thoughtful essentials for the pets who make life better.
                </p>
            </div>

            <div class="pb-footer-links">
                <h3>Explore</h3>
                <a href="#home">Home</a>
                <a href="#categories">Categories</a>
                <a href="#products">Products</a>
                <a href="#faq">FAQ</a>
            </div>

            <div class="pb-footer-links">
                <h3>Customer Care</h3>
                <a href="#about">About PetBase</a>
                <button type="button" id="pbFooterContact">Contact Us ↗</button>
                <a href="#faq">Ordering FAQ</a>
            </div>
        </div>

        <div class="pb-footer-bottom">
            <p>© {{ date('Y') }} PetBase. All rights reserved.</p>
            <p>Made with care ♡ · Website template by WEBIA</p>
        </div>
    </footer>

    {{-- FLOATING WHATSAPP --}}
    <button type="button"
            class="pb-whatsapp-button"
            id="pbWhatsAppButton"
            aria-label="Hubungi PetBase melalui WhatsApp">
        <span aria-hidden="true">↗</span>
        <span>Chat with us</span>
    </button>

    {{-- AI CHATBOT ENTRY POINT --}}
    <button type="button"
            class="pb-chatbot-button"
            id="pbChatbotButton"
            aria-label="Buka AI PetBase Assistant">
        <span aria-hidden="true">✳</span>
        <span>PetBase AI</span>
    </button>

    <script>
        window.PETBASE_CONFIG = {
            whatsappNumber: '6285850180285',
            catalogUrl: @json(url('/webia/template/petshop-corporate-plumvelvet/katalog')),
            productBaseUrl: @json(url('/webia/template/petshop-corporate-plumvelvet/produk')),
            chatbotEnabled: false
        };
    </script>

    <script src="{{ asset('js/website-bisnis/templates/pet-animal-service/petshop/plumvelvet/petshop-corporate-plumvelvet.js') }}"></script>
</body>
</html>
