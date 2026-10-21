<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Furry & Co. — premium essentials for your beloved pets.">
    <title>Furry & Co. — A Luxury Pet Boutique</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@400;500;600;700&family=Manrope:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/website-bisnis/cart/webia-cart-popup.css') }}">
    <link rel="stylesheet"
        href="{{ asset('css/website-bisnis/templates/pet-animal-service/petshop/rosegold/petshop-luxury-rosegold.css') }}">
</head>

<body>

    <div class="fc-announcement">
        <span>THE LITTLE LUXURIES THEY DESERVE</span>
        <span class="fc-announcement-divider">✦</span>
        <a href="#contact">Personalised pet care starts here ↗</a>
    </div>

    <header class="fc-header">
        <button class="fc-mobile-toggle" id="fcMenuToggle" aria-label="Buka menu">☰</button>

        <nav class="fc-nav fc-nav-left" id="fcNavLeft">
            <a href="#home">Home</a>
            <a href="#collections">Collections</a>
            <a href="#bestsellers">Our Edit</a>
            <button type="button" class="fck-cart-trigger" data-cart-open aria-label="Buka keranjang belanja">
                <span aria-hidden="true">♡</span>
                <span>Bag</span>
                <span data-cart-count hidden>0</span>
            </button>
        </nav>

        <a href="{{ url('/webia/template/petshop-luxury-rosegold') }}" class="fc-brand">
            <span class="fc-brand-mark">F<span>&</span>C</span>
            <span class="fc-brand-name">FURRY <span>& CO.</span><small>THE PET BOUTIQUE</small></span>
        </a>

        <nav class="fc-nav fc-nav-right" id="fcNavRight">
            <a href="#about">Our Story</a>
            <a href="#contact">Concierge</a>
            <a class="fc-bag-link" href="{{ url('/webia/template/petshop-luxury-rosegold/katalog') }}">Explore Boutique
                <span>↗</span></a>
        </nav>
    </header>

    <main>
        <section class="fc-hero" id="home">
            <div class="fc-hero-copy">
                <span class="fc-eyebrow"><i></i> A MORE CONSIDERED PET LIFESTYLE</span>

                <h1>Because they<br>deserve a little<br><em>extra love.</em></h1>

                <p>
                    Thoughtfully selected essentials for the ones who make
                    our lives more beautiful. Discover a little luxury for
                    your beloved companion.
                </p>

                <div class="fc-hero-actions">
                    <a class="fc-btn fc-btn-dark" href="{{ url('/webia/template/petshop-luxury-rosegold/katalog') }}">
                        Discover the Collection <span>↗</span>
                    </a>
                    <a class="fc-link-underline" href="#about">Our Philosophy</a>
                </div>

                <div class="fc-hero-caption">
                    <span class="fc-caption-line"></span>
                    <span>CURATED WITH CARE · LOVED EVERY DAY</span>
                </div>
            </div>

            <div class="fc-hero-art">
                <div class="fc-hero-backdrop"></div>
                <div class="fc-hero-photo">
                    <img src="https://images.unsplash.com/photo-1552053831-71594a27632d?auto=format&fit=crop&w=1100&q=85"
                        alt="Golden retriever dengan tampilan elegan">
                </div>
                <div class="fc-hero-stamp">
                    <span>THE ART OF</span>
                    <strong>PET LOVING</strong>
                    <i>EST. WITH LOVE</i>
                </div>
                <div class="fc-hero-side-note">A LITTLE SOMETHING SPECIAL — Nº 001</div>
                <span class="fc-hero-sparkle">✳</span>
            </div>
        </section>

        <section class="fc-intro-strip">
            <p>FOR THE PAWS THAT MAKE A HOUSE A HOME.</p>
            <span>✦</span>
            <p>THOUGHTFUL FINDS. EVERYDAY INDULGENCE.</p>
            <span>✦</span>
            <p>ALWAYS CHOSEN WITH LOVE.</p>
        </section>

        <section class="fc-collections" id="collections">
            <div class="fc-section-heading">
                <div>
                    <span class="fc-eyebrow">THE BOUTIQUE EDIT</span>
                    <h2>Little luxuries,<br><em>beautifully chosen.</em></h2>
                </div>
                <p>Everyday essentials, elevated. Explore our curated collections made for every special companion.</p>
            </div>

            <div class="fc-collection-grid">
                <a class="fc-collection-card fc-collection-large"
                    href="{{ url('/webia/template/petshop-luxury-rosegold/katalog') }}?kategori=makanan">
                    <img src="https://images.unsplash.com/photo-1589924691995-400dc9ecc119?auto=format&fit=crop&w=900&q=85"
                        alt="Pilihan makanan hewan">
                    <div class="fc-collection-overlay">
                        <span>01 — NOURISH</span>
                        <h3>Daily<br>Nutrition</h3>
                        <span class="fc-collection-link">EXPLORE COLLECTION ↗</span>
                    </div>
                </a>

                <a class="fc-collection-card fc-collection-middle"
                    href="{{ url('/webia/template/petshop-luxury-rosegold/katalog') }}?kategori=aksesoris">
                    <img src="https://images.unsplash.com/photo-1601758228041-f3b2795255f1?auto=format&fit=crop&w=800&q=85"
                        alt="Aksesori hewan">
                    <div class="fc-collection-overlay">
                        <span>02 — PLAY</span>
                        <h3>Playful<br>Essentials</h3>
                        <span class="fc-collection-link">EXPLORE COLLECTION ↗</span>
                    </div>
                </a>

                <a class="fc-collection-card fc-collection-small"
                    href="{{ url('/webia/template/petshop-luxury-rosegold/katalog') }}?kategori=perawatan">
                    <img src="https://images.unsplash.com/photo-1516734212186-a967f81ad0d7?auto=format&fit=crop&w=800&q=85"
                        alt="Perawatan hewan">
                    <div class="fc-collection-overlay">
                        <span>03 — CARE</span>
                        <h3>Grooming<br>& Wellness</h3>
                        <span class="fc-collection-link">EXPLORE COLLECTION ↗</span>
                    </div>
                </a>
            </div>
        </section>

        <section class="fc-bestsellers" id="bestsellers">
            <div class="fc-section-heading">
                <div>
                    <span class="fc-eyebrow">THE MOST-LOVED EDIT</span>
                    <h2>Chosen by us.<br><em>Loved by them.</em></h2>
                </div>
                <a class="fc-link-underline" href="{{ url('/webia/template/petshop-luxury-rosegold/katalog') }}">VIEW
                    ALL PIECES ↗</a>
            </div>

            <div class="fc-product-grid">
                <article class="fc-product-card">
                    <a class="fc-product-photo fc-product-rose"
                        href="{{ url('/webia/template/petshop-luxury-rosegold/produk/royal-canin-kitten') }}">
                        <span class="fc-product-label">THE FAVOURITE</span>
                        <img src="https://images.unsplash.com/photo-1589924691995-400dc9ecc119?auto=format&fit=crop&w=700&q=85"
                            alt="Makanan kucing">
                    </a>
                    <div class="fc-product-details">
                        <span>01 / NOURISH</span>
                        <h3>Royal Canin Kitten</h3>
                        <p>Thoughtful nutrition for little paws.</p>
                        <div><strong>Rp89.000</strong>
                            <button type="button" class="fc-add-button" data-cart-add data-slug="royal-canin-kitten"
                                data-name="Royal Canin Kitten" data-price="185000"
                                data-image="https://images.unsplash.com/photo-1589924691995-400dc9ecc119?auto=format&fit=crop&w=700&q=85"
                                data-quantity="1" aria-label="Tambah Royal Canin Kitten ke keranjang">
                                +
                            </button>
                        </div>
                    </div>
                </article>

                <article class="fc-product-card">
                    <a class="fc-product-photo fc-product-cream"
                        href="{{ url('/webia/template/petshop-luxury-rosegold/produk/dog-treats') }}">
                        <img src="https://images.unsplash.com/photo-1582798358481-d199fb7347bb?auto=format&fit=crop&w=700&q=85"
                            alt="Camilan hewan">
                    </a>
                    <div class="fc-product-details">
                        <span>02 / LITTLE TREATS</span>
                        <h3>Happy Bites Treats</h3>
                        <p>Little rewards, endless affection.</p>
                        <div><strong>Rp89.000</strong>
                            <button type="button" class="fc-add-button" data-cart-add data-slug="royal-canin-kitten"
                                data-name="Royal Canin Kitten" data-price="185000"
                                data-image="https://images.unsplash.com/photo-1589924691995-400dc9ecc119?auto=format&fit=crop&w=700&q=85"
                                data-quantity="1" aria-label="Tambah Royal Canin Kitten ke keranjang">
                                +
                            </button>
                        </div>
                    </div>
                </article>

                <article class="fc-product-card">
                    <a class="fc-product-photo fc-product-sand"
                        href="{{ url('/webia/template/petshop-luxury-rosegold/produk/soft-pet-bed') }}">
                        <img src="https://images.unsplash.com/photo-1541599540903-216a46ca1dc0?auto=format&fit=crop&w=700&q=85"
                            alt="Tempat tidur hewan">
                    </a>
                    <div class="fc-product-details">
                        <span>03 / COMFORT</span>
                        <h3>Cloudy Pet Bed</h3>
                        <p>A softer place to call their own.</p>
                        <div><strong>Rp89.000</strong>
                            <button type="button" class="fc-add-button" data-cart-add data-slug="royal-canin-kitten"
                                data-name="Royal Canin Kitten" data-price="185000"
                                data-image="https://images.unsplash.com/photo-1589924691995-400dc9ecc119?auto=format&fit=crop&w=700&q=85"
                                data-quantity="1" aria-label="Tambah Royal Canin Kitten ke keranjang">
                                +
                            </button>
                        </div>
                    </div>
                </article>

                <article class="fc-product-card">
                    <a class="fc-product-photo fc-product-lilac"
                        href="{{ url('/webia/template/petshop-luxury-rosegold/produk/pet-grooming-kit') }}">
                        <img src="https://images.unsplash.com/photo-1516734212186-a967f81ad0d7?auto=format&fit=crop&w=700&q=85"
                            alt="Perlengkapan grooming">
                    </a>
                    <div class="fc-product-details">
                        <span>04 / WELLNESS</span>
                        <h3>Gentle Grooming Kit</h3>
                        <p>Everyday care, made more special.</p>
                        <div><strong>Rp89.000</strong>
                            <button type="button" class="fc-add-button" data-cart-add data-slug="royal-canin-kitten"
                                data-name="Royal Canin Kitten" data-price="185000"
                                data-image="https://images.unsplash.com/photo-1589924691995-400dc9ecc119?auto=format&fit=crop&w=700&q=85"
                                data-quantity="1" aria-label="Tambah Royal Canin Kitten ke keranjang">
                                +
                            </button>
                        </div>
                    </div>
                </article>
            </div>
        </section>

        <section class="fc-editorial">
            <div class="fc-editorial-photo">
                <img src="https://images.unsplash.com/photo-1543466835-00a7907e9de1?auto=format&fit=crop&w=1000&q=85"
                    alt="Anjing kesayangan">
                <span class="fc-editorial-photo-caption">A LIFE FULL OF LITTLE MOMENTS</span>
            </div>
            <div class="fc-editorial-copy">
                <span class="fc-eyebrow">THE FURRY & CO. PHILOSOPHY</span>
                <h2>For the love<br>that comes with<br><em>four little paws.</em></h2>
                <p>
                    They greet us like we're their whole world. We believe
                    the little things we choose for them should reflect
                    just how much they mean to us.
                </p>
                <p>
                    That's why we bring together thoughtful essentials
                    for happier, healthier, more beautiful everyday moments.
                </p>
                <a class="fc-link-underline" href="#about">A LITTLE MORE ABOUT US ↗</a>
            </div>
        </section>

        <section class="fc-brands">
            <span class="fc-eyebrow">A FEW NAMES PET PARENTS LOVE</span>
            <div class="fc-brand-list">
                <span>ROYAL CANIN</span>
                <span>HILL'S</span>
                <span>FARMINA</span>
                <span>WHISKAS</span>
                <span>PEDIGREE</span>
            </div>
            <small>Brand names are displayed for demo purposes. Availability and official partnerships must be
                confirmed.</small>
        </section>

        <section class="fc-promo">
            <div class="fc-promo-art">
                <img src="https://images.unsplash.com/photo-1548199973-03cce0bbc87b?auto=format&fit=crop&w=800&q=85"
                    alt="Dua anjing bermain">
                <span class="fc-promo-seal">A LITTLE<br>EXTRA LOVE<br>✦</span>
            </div>
            <div class="fc-promo-copy">
                <span class="fc-eyebrow">A SPECIAL SOMETHING</span>
                <h2>Every good pet<br>deserves a <em>treat.</em></h2>
                <p>Discover current offers, seasonal favourites, and little surprises for your beloved companion.</p>
                <button class="fc-btn fc-btn-dark" id="fcPromoButton">Ask About Our Offers ↗</button>
                <small>Promotions and terms are subject to confirmation by the store.</small>
            </div>
        </section>

        <section class="fc-about" id="about">
            <span class="fc-eyebrow">THE HEART BEHIND THE BOUTIQUE</span>
            <h2>More than essentials.<br><em>A little love in every choice.</em></h2>
            <p>Furry & Co. is a pet boutique concept built around thoughtful choices, everyday comfort, and the special
                bond between pets and their people.</p>
        </section>

        <section class="fc-contact" id="contact">
            <div>
                <span class="fc-eyebrow">YOUR PERSONAL PET CONCIERGE</span>
                <h2>May we help you<br><em>find something lovely?</em></h2>
                <p>Need a recommendation, want to check availability, or have a question? Our team is happy to help.</p>
            </div>
            <button class="fc-btn fc-btn-light" id="fcContactButton">Speak to Our Team ↗</button>
        </section>
    </main>

    <footer class="fc-footer">
        <a href="{{ url('/webia/template/petshop-luxury-rosegold') }}" class="fc-brand fc-footer-brand">
            <span class="fc-brand-mark">F<span>&</span>C</span>
            <span class="fc-brand-name">FURRY <span>& CO.</span><small>THE PET BOUTIQUE</small></span>
        </a>
        <p>A little luxury for the ones we love the most.</p>
        <div class="fc-footer-links">
            <a href="#home">Home</a>
            <a href="#collections">Collections</a>
            <a href="{{ url('/webia/template/petshop-luxury-rosegold/katalog') }}">Boutique</a>
            <a href="#contact">Concierge</a>
        </div>
        <small>© {{ date('Y') }} Furry & Co. — Pet Boutique Demo.</small>
    </footer>

    <button class="fc-chat-button" id="fcChatButton" aria-label="Hubungi Furry & Co.">✳</button>

    <script>
        window.FURRY_CONFIG = {
            whatsappNumber: '6285850180285',
            catalogUrl: @json(url('/webia/template/petshop-luxury-rosegold/katalog')),
            productBaseUrl: @json(url('/webia/template/petshop-luxury-rosegold/produk'))
        };
    </script>
    <script
        src="{{ asset('js/website-bisnis/templates/pet-animal-service/petshop/rosegold/petshop-luxury-rosegold.js') }}">
    </script>
    <script src="{{ asset('js/website-bisnis/cart/webia-cart.js') }}"></script>
    <script src="{{ asset('js/website-bisnis/cart/webia-cart-popup.js') }}"></script>
</body>

</html>
