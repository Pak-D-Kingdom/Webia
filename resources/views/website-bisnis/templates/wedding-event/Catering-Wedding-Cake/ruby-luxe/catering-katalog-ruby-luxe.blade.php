
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu & Cake Collection — Ruby Luxe</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/website-bisnis/templates/wedding-event/catering-wedding-cake/ruby-luxe/ruby-luxe.css') }}">
</head>
<body>
    <div class="rl-topbar"><p>Thoughtfully crafted for life's sweetest occasions.</p><a href="#menu">Explore our collection ↗</a></div>
    <header class="rl-navbar">
        <a class="rl-brand" href="{{ url('/webia/template/catering-wedding-cake-ruby-luxe') }}"><span class="rl-brand-mark">R.</span><span><strong>Ruby Luxe</strong><small>CATERING & WEDDING CAKE</small></span></a>
        <button class="rl-menu-toggle" id="rlMenuToggle" type="button" aria-label="Buka navigasi" aria-expanded="false"><span></span><span></span><span></span></button>
        <nav class="rl-nav" id="rlNav">
            <a href="{{ url('/webia/template/catering-wedding-cake-ruby-luxe') }}">Home</a>
            <a href="#menu">Menu & Cakes</a>
            <a href="{{ url('/webia/template/catering-wedding-cake-ruby-luxe') }}#packages">Packages</a>
            <a href="{{ url('/webia/template/catering-wedding-cake-ruby-luxe') }}#faq">FAQ</a>
            <a class="rl-nav-cta" href="{{ url('/webia/template/catering-wedding-cake-ruby-luxe') }}#inquiry">Make an Inquiry ↗</a>
        </nav>
    </header>

    <main>
        <section class="rl-inner-hero">
            <div>
                <div class="rl-breadcrumb"><a href="{{ url('/webia/template/catering-wedding-cake-ruby-luxe') }}">Home</a><span>/</span><span>Menu & Cakes</span></div>
                <span class="rl-eyebrow rl-eyebrow-dark">OUR COLLECTION</span>
                <h1>Something lovely for <em>every table.</em></h1>
                <p>Browse our sample catering collections and cake styles, then inquire about customization, availability, and pricing.</p>
            </div>
            <img src="https://images.unsplash.com/photo-1578985545062-69928b1d9587?auto=format&fit=crop&w=1000&q=85" alt="Inspirasi wedding cake">
        </section>

        <section class="rl-catalog-section" id="menu">
            <div class="rl-heading">
                <div><span class="rl-eyebrow rl-eyebrow-dark">MENU & CAKE COLLECTION</span><h2>Find your <em>favorite.</em></h2></div>
                <p>These are illustrative offerings. Actual menus and designs depend on availability and confirmation from the team.</p>
            </div>

            <div class="rl-filter-row" role="group" aria-label="Filter katalog">
                <button class="rl-filter-btn is-active" type="button" data-filter="all">All Items</button>
                <button class="rl-filter-btn" type="button" data-filter="catering">Catering</button>
                <button class="rl-filter-btn" type="button" data-filter="cake">Wedding Cakes</button>
                <button class="rl-filter-btn" type="button" data-filter="dessert">Desserts</button>
            </div>

            <div class="rl-catalog-grid">
                <article class="rl-catalog-card" data-category="catering">
                    <a class="rl-catalog-image" href="{{ url('/webia/template/catering-wedding-cake-ruby-luxe/detail') }}?product=signature-buffet">
                        <img src="https://images.unsplash.com/photo-1547592180-85f173990554?auto=format&fit=crop&w=850&q=85" alt="Menu catering buffet">
                        <span>SIGNATURE MENU</span>
                    </a>
                    <div class="rl-catalog-card-body">
                        <span class="rl-catalog-type">CATERING</span><h3>Signature Buffet</h3>
                        <p>Discuss main dishes, side dishes, and serving arrangements for your event.</p>
                        <div class="rl-catalog-bottom"><div><small>Pricing</small><strong>Custom quote</strong></div><a href="{{ url('/webia/template/catering-wedding-cake-ruby-luxe/detail') }}?product=signature-buffet">↗</a></div>
                    </div>
                </article>

                <article class="rl-catalog-card" data-category="catering">
                    <a class="rl-catalog-image" href="{{ url('/webia/template/catering-wedding-cake-ruby-luxe/detail') }}?product=intimate-dining">
                        <img src="https://images.unsplash.com/photo-1515003197210-e0cd7184f8b5?auto=format&fit=crop&w=850&q=85" alt="Sajian makanan untuk private dining">
                        <span>INTIMATE COLLECTION</span>
                    </a>
                    <div class="rl-catalog-card-body">
                        <span class="rl-catalog-type">CATERING</span><h3>Intimate Dining</h3>
                        <p>A menu concept for family gatherings, private dinners, and intimate celebrations.</p>
                        <div class="rl-catalog-bottom"><div><small>Pricing</small><strong>Custom quote</strong></div><a href="{{ url('/webia/template/catering-wedding-cake-ruby-luxe/detail') }}?product=intimate-dining">↗</a></div>
                    </div>
                </article>

                <article class="rl-catalog-card" data-category="dessert">
                    <a class="rl-catalog-image" href="{{ url('/webia/template/catering-wedding-cake-ruby-luxe/detail') }}?product=dessert-table">
                        <img src="https://images.unsplash.com/photo-1555507036-ab1f4038808a?auto=format&fit=crop&w=850&q=85" alt="Dessert dan pastry">
                        <span>SWEET COLLECTION</span>
                    </a>
                    <div class="rl-catalog-card-body">
                        <span class="rl-catalog-type">DESSERTS</span><h3>Dessert Table</h3>
                        <p>A sweet spread of pastries and dessert selections for your guests.</p>
                        <div class="rl-catalog-bottom"><div><small>Pricing</small><strong>Custom quote</strong></div><a href="{{ url('/webia/template/catering-wedding-cake-ruby-luxe/detail') }}?product=dessert-table">↗</a></div>
                    </div>
                </article>

                <article class="rl-catalog-card" data-category="cake">
                    <a class="rl-catalog-image" href="{{ url('/webia/template/catering-wedding-cake-ruby-luxe/detail') }}?product=classic-ivory">
                        <img src="https://images.unsplash.com/photo-1535254973040-607b474cb50d?auto=format&fit=crop&w=850&q=85" alt="Classic ivory wedding cake">
                        <span>TIMELESS DESIGN</span>
                    </a>
                    <div class="rl-catalog-card-body">
                        <span class="rl-catalog-type">WEDDING CAKE</span><h3>Classic Ivory</h3>
                        <p>A timeless cake design with an elegant, understated finish.</p>
                        <div class="rl-catalog-bottom"><div><small>Pricing</small><strong>Custom quote</strong></div><a href="{{ url('/webia/template/catering-wedding-cake-ruby-luxe/detail') }}?product=classic-ivory">↗</a></div>
                    </div>
                </article>

                <article class="rl-catalog-card" data-category="cake">
                    <a class="rl-catalog-image" href="{{ url('/webia/template/catering-wedding-cake-ruby-luxe/detail') }}?product=romantic-bloom">
                        <img src="https://images.unsplash.com/photo-1578985545062-69928b1d9587?auto=format&fit=crop&w=850&q=85" alt="Romantic wedding cake">
                        <span>ROMANTIC DESIGN</span>
                    </a>
                    <div class="rl-catalog-card-body">
                        <span class="rl-catalog-type">WEDDING CAKE</span><h3>Romantic Bloom</h3>
                        <p>A floral-inspired look for romantic and garden-style celebrations.</p>
                        <div class="rl-catalog-bottom"><div><small>Pricing</small><strong>Custom quote</strong></div><a href="{{ url('/webia/template/catering-wedding-cake-ruby-luxe/detail') }}?product=romantic-bloom">↗</a></div>
                    </div>
                </article>

                <article class="rl-catalog-card" data-category="cake">
                    <a class="rl-catalog-image" href="{{ url('/webia/template/catering-wedding-cake-ruby-luxe/detail') }}?product=modern-minimal">
                        <img src="https://images.unsplash.com/photo-1557979619-445218f326b9?auto=format&fit=crop&w=850&q=85" alt="Modern minimalist cake">
                        <span>MODERN DESIGN</span>
                    </a>
                    <div class="rl-catalog-card-body">
                        <span class="rl-catalog-type">WEDDING CAKE</span><h3>Modern Minimal</h3>
                        <p>A clean contemporary cake concept that can be discussed around your theme.</p>
                        <div class="rl-catalog-bottom"><div><small>Pricing</small><strong>Custom quote</strong></div><a href="{{ url('/webia/template/catering-wedding-cake-ruby-luxe/detail') }}?product=modern-minimal">↗</a></div>
                    </div>
                </article>
            </div>
            <p class="rl-demo-note">Images and product descriptions are demo content. Confirm actual products, ingredients, allergens, serving sizes, prices, and availability before publishing.</p>
        </section>

        <section class="rl-catalog-cta">
            <span class="rl-eyebrow">HAVE A SPECIFIC IDEA?</span>
            <h2>Let's create something <em>personal.</em></h2>
            <p>Tell us your event date, guest count, favorite flavors, and menu preferences.</p>
            <a href="{{ url('/webia/template/catering-wedding-cake-ruby-luxe') }}#inquiry" class="rl-button rl-button-light">Start Your Inquiry ↗</a>
        </section>
    </main>

    <footer class="rl-footer">
        <div class="rl-footer-main">
            <a class="rl-brand rl-footer-brand" href="{{ url('/webia/template/catering-wedding-cake-ruby-luxe') }}"><span class="rl-brand-mark">R.</span><span><strong>Ruby Luxe</strong><small>CATERING & WEDDING CAKE</small></span></a>
            <p>Thoughtfully crafted.<br>Beautifully celebrated.</p>
            <a href="{{ url('/webia/template/catering-wedding-cake-ruby-luxe') }}#inquiry" class="rl-footer-cta">Let's plan your order ↗</a>
        </div>
        <div class="rl-footer-bottom"><span>© <span id="rlYear"></span> Ruby Luxe. All rights reserved.</span><span>Made with care ♡ · Website template by WEBIA</span></div>
    </footer>

    <div class="rl-floating-actions">
        <button class="rl-float-button rl-ai-button" type="button" id="rlChatbotButton" aria-label="AI Assistant"><span class="rl-ai-sparkle">✳</span><span>AI Assistant</span></button>
        <a class="rl-float-button rl-wa-button" id="rlFloatingWhatsApp" href="#" target="_blank" rel="noopener noreferrer" aria-label="Chat via WhatsApp"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20.52 3.48A11.8 11.8 0 0 0 12.1 0C5.55 0 .22 5.33.22 11.88c0 2.09.55 4.13 1.6 5.93L.12 24l6.35-1.67a11.9 11.9 0 0 0 5.63 1.43h.01c6.55 0 11.88-5.33 11.88-11.88a11.8 11.8 0 0 0-3.47-8.4Z"/></svg><span>WhatsApp</span></a>
    </div>

    <script>window.RUBY_LUXE_CONFIG = { whatsappNumber: '6285850180285' };</script>
    <script src="{{ asset('js/website-bisnis/templates/wedding-event/catering-wedding-cake/ruby-luxe/ruby-luxe.js') }}" defer></script>
    <script>
        document.querySelectorAll('[data-filter]').forEach((button) => {
            button.addEventListener('click', () => {
                const filter = button.dataset.filter;
                document.querySelectorAll('[data-filter]').forEach((item) => item.classList.toggle('is-active', item === button));
                document.querySelectorAll('.rl-catalog-card').forEach((card) => {
                    card.hidden = filter !== 'all' && card.dataset.category !== filter;
                });
            });
        });
    </script>
</body>
</html>
