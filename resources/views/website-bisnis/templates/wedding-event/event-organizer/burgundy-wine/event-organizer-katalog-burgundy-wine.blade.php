
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Jelajahi paket wedding, corporate event, dan private celebration dari Burgundy Moments.">
    <title>Our Services & Packages — Burgundy Moments</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/website-bisnis/templates/wedding-event/event-organizer/burgundy-wine/burgundy-moments.css') }}">
</head>
<body>
    <div class="bm-topbar">
        <p>Thoughtfully planned, beautifully remembered.</p>
        <a href="#catalog">Explore our packages <span>↗</span></a>
    </div>

    <header class="bm-navbar">
        <a class="bm-brand" href="{{ url('/webia/template/event-organizer-modern-burgundy-wine') }}">
            <span class="bm-brand-mark">BM</span>
            <span><strong>Burgundy Moments</strong><small>EVENT PLANNER & ORGANIZER</small></span>
        </a>

        <button class="bm-menu-toggle" id="bmMenuToggle" type="button" aria-label="Buka navigasi" aria-expanded="false">
            <span></span><span></span><span></span>
        </button>

        <nav class="bm-nav" id="bmNav">
            <a href="{{ url('/webia/template/event-organizer-modern-burgundy-wine') }}">Home</a>
            <a href="#catalog">Services & Packages</a>
            <a href="#how-to-book">How It Works</a>
            <a href="{{ url('/webia/template/event-organizer-modern-burgundy-wine#faq') }}">FAQ</a>
            <a class="bm-nav-cta" href="#catalog">Find Your Package ↗</a>
        </nav>
    </header>

    <main>
        <section class="bm-inner-hero">
            <div class="bm-inner-hero-copy">
                <span class="bm-eyebrow bm-eyebrow-dark">OUR SERVICES & PACKAGES</span>
                <h1>Every event begins with a <em>beautiful idea.</em></h1>
                <p>Discover our planning services and find the right starting point for your next celebration.</p>
                <div class="bm-breadcrumb">
                    <a href="{{ url('/webia/template/event-organizer-modern-burgundy-wine') }}">Home</a>
                    <span>/</span>
                    <span>Services & Packages</span>
                </div>
            </div>
            <div class="bm-inner-hero-image">
                <img src="https://images.unsplash.com/photo-1519225421980-715cb0215aed?auto=format&fit=crop&w=1000&q=85" alt="Dekorasi acara elegan">
            </div>
        </section>

        <section class="bm-catalog-section" id="catalog">
            <div class="bm-catalog-heading">
                <div>
                    <span class="bm-eyebrow bm-eyebrow-dark">CURATED FOR YOUR OCCASION</span>
                    <h2>Choose your kind of <em>celebration.</em></h2>
                </div>
                <p>These packages are starting points. We can discuss the final scope and quote based on your needs.</p>
            </div>

            <div class="bm-filter-row" role="group" aria-label="Filter paket">
                <button class="bm-filter-btn is-active" type="button" data-filter="all">All Services</button>
                <button class="bm-filter-btn" type="button" data-filter="wedding">Wedding</button>
                <button class="bm-filter-btn" type="button" data-filter="corporate">Corporate</button>
                <button class="bm-filter-btn" type="button" data-filter="private">Private Events</button>
            </div>

            <div class="bm-catalog-grid">
                <article class="bm-catalog-card" data-category="wedding">
                    <div class="bm-catalog-image">
                        <img src="https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=900&q=85" alt="Wedding dengan dekorasi bunga" loading="lazy" decoding="async">
                        <span class="bm-catalog-tag">WEDDING</span>
                    </div>
                    <div class="bm-catalog-card-body">
                        <span class="bm-catalog-number">PACKAGE 01</span>
                        <h3>Intimate Moments</h3>
                        <p>For intimate weddings and smaller gatherings that feel personal and meaningful.</p>
                        <ul>
                            <li>Event concept discussion</li>
                            <li>Basic vendor coordination</li>
                            <li>Event-day assistance</li>
                        </ul>
                        <div class="bm-catalog-card-bottom">
                            <div><small>Pricing</small><strong>Custom quote</strong></div>
                            <a href="{{ url('/webia/template/event-organizer-modern-burgundy-wine/detail') }}?package=intimate-moments" aria-label="Lihat detail Intimate Moments">↗</a>
                        </div>
                    </div>
                </article>

                <article class="bm-catalog-card" data-category="wedding">
                    <div class="bm-catalog-image">
                        <img src="https://images.unsplash.com/photo-1519225421980-715cb0215aed?auto=format&fit=crop&w=900&q=85" alt="Wedding dengan penataan meja" loading="lazy" decoding="async">
                        <span class="bm-catalog-tag">WEDDING</span>
                    </div>
                    <div class="bm-catalog-card-body">
                        <span class="bm-catalog-number">PACKAGE 02</span>
                        <h3>Signature Celebration</h3>
                        <p>A more complete planning experience from creative concept to event-day coordination.</p>
                        <ul>
                            <li>Creative direction & moodboard</li>
                            <li>Venue and vendor coordination</li>
                            <li>Event-day coordination team</li>
                        </ul>
                        <div class="bm-catalog-card-bottom">
                            <div><small>Pricing</small><strong>Custom quote</strong></div>
                            <a href="{{ url('/webia/template/event-organizer-modern-burgundy-wine/detail') }}?package=signature-celebration" aria-label="Lihat detail Signature Celebration">↗</a>
                        </div>
                    </div>
                </article>

                <article class="bm-catalog-card" data-category="corporate">
                    <div class="bm-catalog-image">
                        <img src="https://images.unsplash.com/photo-1511578314322-379afb476865?auto=format&fit=crop&w=900&q=85" alt="Acara perusahaan" loading="lazy" decoding="async">
                        <span class="bm-catalog-tag">CORPORATE</span>
                    </div>
                    <div class="bm-catalog-card-body">
                        <span class="bm-catalog-number">PACKAGE 03</span>
                        <h3>Grand Experience</h3>
                        <p>Planning support for conferences, product launches, corporate gatherings, and galas.</p>
                        <ul>
                            <li>Production planning</li>
                            <li>Venue and technical coordination</li>
                            <li>Run-of-show management</li>
                        </ul>
                        <div class="bm-catalog-card-bottom">
                            <div><small>Pricing</small><strong>Custom quote</strong></div>
                            <a href="{{ url('/webia/template/event-organizer-modern-burgundy-wine/detail') }}?package=grand-experience" aria-label="Lihat detail Grand Experience">↗</a>
                        </div>
                    </div>
                </article>

                <article class="bm-catalog-card" data-category="private">
                    <div class="bm-catalog-image">
                        <img src="https://images.unsplash.com/photo-1464366400600-7168b8af9bc3?auto=format&fit=crop&w=900&q=85" alt="Private celebration dengan dekorasi" loading="lazy" decoding="async">
                        <span class="bm-catalog-tag">PRIVATE EVENTS</span>
                    </div>
                    <div class="bm-catalog-card-body">
                        <span class="bm-catalog-number">PACKAGE 04</span>
                        <h3>Private Celebration</h3>
                        <p>Thoughtful planning for birthdays, anniversaries, engagements, and special gatherings.</p>
                        <ul>
                            <li>Theme and decoration planning</li>
                            <li>Vendor recommendations</li>
                            <li>Event schedule coordination</li>
                        </ul>
                        <div class="bm-catalog-card-bottom">
                            <div><small>Pricing</small><strong>Custom quote</strong></div>
                            <a href="{{ url('/webia/template/event-organizer-modern-burgundy-wine/detail') }}?package=private-celebration" aria-label="Lihat detail Private Celebration">↗</a>
                        </div>
                    </div>
                </article>

                <article class="bm-catalog-card" data-category="corporate">
                    <div class="bm-catalog-image">
                        <img src="https://images.unsplash.com/photo-1505373877841-8d25f7d46678?auto=format&fit=crop&w=900&q=85" alt="Konferensi dan event profesional" loading="lazy" decoding="async">
                        <span class="bm-catalog-tag">CORPORATE</span>
                    </div>
                    <div class="bm-catalog-card-body">
                        <span class="bm-catalog-number">PACKAGE 05</span>
                        <h3>Business Gathering</h3>
                        <p>A coordinated experience for company celebrations, networking events, and team gatherings.</p>
                        <ul>
                            <li>Event flow planning</li>
                            <li>Guest and venue coordination</li>
                            <li>On-site event support</li>
                        </ul>
                        <div class="bm-catalog-card-bottom">
                            <div><small>Pricing</small><strong>Custom quote</strong></div>
                            <a href="{{ url('/webia/template/event-organizer-modern-burgundy-wine/detail') }}?package=business-gathering" aria-label="Lihat detail Business Gathering">↗</a>
                        </div>
                    </div>
                </article>

                <article class="bm-catalog-card" data-category="private">
                    <div class="bm-catalog-image">
                        <img src="https://images.unsplash.com/photo-1511795409834-ef04bbd61622?auto=format&fit=crop&w=900&q=85" alt="Perayaan dengan tamu undangan" loading="lazy" decoding="async">
                        <span class="bm-catalog-tag">CUSTOM</span>
                    </div>
                    <div class="bm-catalog-card-body">
                        <span class="bm-catalog-number">PACKAGE 06</span>
                        <h3>Made Just for You</h3>
                        <p>Have a unique event idea? Let's build a tailored plan around your requirements.</p>
                        <ul>
                            <li>Custom service scope</li>
                            <li>Personalized planning discussion</li>
                            <li>Quote based on requirements</li>
                        </ul>
                        <div class="bm-catalog-card-bottom">
                            <div><small>Pricing</small><strong>Custom quote</strong></div>
                            <a href="{{ url('/webia/template/event-organizer-modern-burgundy-wine/detail') }}?package=made-just-for-you" aria-label="Lihat detail Made Just for You">↗</a>
                        </div>
                    </div>
                </article>
            </div>

            <p class="bm-package-note">All package descriptions are sample template content. Final services, prices, venue options, and availability must be confirmed with the event organizer.</p>
        </section>

        <section class="bm-catalog-cta" id="how-to-book">
            <span class="bm-eyebrow">NOT SURE WHERE TO START?</span>
            <h2>Let's find the right plan <em>together.</em></h2>
            <p>Tell us about your event and we'll discuss the most suitable services for your needs.</p>
            <a class="bm-button bm-button-light" href="{{ url('/webia/template/event-organizer-modern-burgundy-wine') }}#inquiry">Discuss Your Event ↗</a>
        </section>
    </main>

    <footer class="bm-footer">
        <div class="bm-footer-main">
            <a class="bm-brand bm-footer-brand" href="{{ url('/webia/template/event-organizer-modern-burgundy-wine') }}">
                <span class="bm-brand-mark">BM</span>
                <span><strong>Burgundy Moments</strong><small>EVENT PLANNER & ORGANIZER</small></span>
            </a>
            <p>Thoughtfully planned.<br>Beautifully remembered.</p>
            <a href="{{ url('/webia/template/event-organizer-modern-burgundy-wine') }}#inquiry" class="bm-footer-cta">Let's create something meaningful ↗</a>
        </div>
        <div class="bm-footer-bottom">
            <span>© <span id="bmYear"></span> Burgundy Moments. All rights reserved.</span>
            <span>Made with care ♡ · Website template by WEBIA</span>
        </div>
    </footer>

    <div class="bm-floating-actions">
        <button type="button" class="bm-float-button bm-ai-button" id="bmChatbotButton" aria-label="AI Assistant" title="AI Assistant">
            <span class="bm-ai-sparkle">✳</span><span class="bm-float-label">AI Assistant</span>
        </button>
        <a class="bm-float-button bm-wa-button" id="bmFloatingWhatsApp" href="#" target="_blank" rel="noopener noreferrer" aria-label="Chat via WhatsApp" title="Chat via WhatsApp">
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20.52 3.48A11.8 11.8 0 0 0 12.1 0C5.55 0 .22 5.33.22 11.88c0 2.09.55 4.13 1.6 5.93L.12 24l6.35-1.67a11.9 11.9 0 0 0 5.63 1.43h.01c6.55 0 11.88-5.33 11.88-11.88a11.8 11.8 0 0 0-3.47-8.4Z"/></svg>
            <span class="bm-float-label">WhatsApp</span>
        </a>
    </div>

    <script>
        window.BURGUNDY_MOMENTS_CONFIG = {
            whatsappNumber: '6285850180285'
        };
    </script>
    <script src="{{ asset('js/website-bisnis/templates/wedding-event/event-organizer/burgundy-wine/burgundy-moments.js') }}" defer></script>
    <script>
        document.querySelectorAll('[data-filter]').forEach((button) => {
            button.addEventListener('click', () => {
                const filter = button.dataset.filter;

                document.querySelectorAll('[data-filter]').forEach((item) => {
                    item.classList.toggle('is-active', item === button);
                });

                document.querySelectorAll('.bm-catalog-card').forEach((card) => {
                    card.hidden = filter !== 'all' && card.dataset.category !== filter;
                });
            });
        });
    </script>
</body>
</html>
