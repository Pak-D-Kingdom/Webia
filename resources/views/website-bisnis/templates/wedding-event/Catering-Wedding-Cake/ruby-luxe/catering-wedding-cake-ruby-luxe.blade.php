
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Ruby Luxe menyediakan catering untuk acara spesial dan custom wedding cake dengan pilihan paket yang dapat disesuaikan.">
    <title>Ruby Luxe — Catering & Wedding Cake</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/website-bisnis/templates/wedding-event/catering-wedding-cake/ruby-luxe/ruby-luxe.css') }}">
</head>
<body>
    <div class="rl-topbar">
        <p>Thoughtfully crafted for life's sweetest occasions.</p>
        <a href="#inquiry">Plan your celebration <span>↗</span></a>
    </div>

    <header class="rl-navbar">
        <a class="rl-brand" href="#home">
            <span class="rl-brand-mark">R.</span>
            <span><strong>Ruby Luxe</strong><small>CATERING & WEDDING CAKE</small></span>
        </a>

        <button class="rl-menu-toggle" id="rlMenuToggle" type="button"
                aria-label="Buka navigasi" aria-expanded="false">
            <span></span><span></span><span></span>
        </button>

        <nav class="rl-nav" id="rlNav">
            <a href="#home">Home</a>
            <a href="#catering">Catering</a>
            <a href="#cakes">Wedding Cakes</a>
            <a href="#packages">Packages</a>
            <a href="#faq">FAQ</a>
            <a href="#inquiry" class="rl-nav-cta">Make an Inquiry ↗</a>
        </nav>
    </header>

    <main>
        <!-- HERO -->
        <section class="rl-hero" id="home">
            <div class="rl-hero-copy">
                <span class="rl-eyebrow"><span></span> MADE FOR YOUR MOST SPECIAL DAYS</span>
                <h1>Beautifully served.<br><em>Sweetly remembered.</em></h1>
                <p>
                    Thoughtful catering and custom wedding cakes, crafted to bring
                    elegance, flavor, and a little magic to every celebration.
                </p>
                <div class="rl-hero-actions">
                    <a href="#packages" class="rl-button rl-button-primary">Explore Our Packages <span>↗</span></a>
                    <a href="#cakes" class="rl-text-link">Discover Our Cakes</a>
                </div>
                <div class="rl-hero-note">
                    <span>✳</span>
                    <p><strong>Made with care, served with love.</strong><small>For weddings, intimate gatherings, and celebrations.</small></p>
                </div>
            </div>

            <div class="rl-hero-visual">
                <img src="https://images.unsplash.com/photo-1535254973040-607b474cb50d?auto=format&fit=crop&w=1200&q=85"
                     alt="Wedding cake elegan dengan dekorasi minimalis">
                <div class="rl-hero-image-caption">
                    <span>THE ART OF CELEBRATING</span>
                    <strong>Every detail, thoughtfully made.</strong>
                </div>
                <div class="rl-hero-stamp"><span>RUBY</span><strong>LUXE</strong><small>EST. WITH LOVE</small></div>
            </div>
            <div class="rl-hero-bottom">
                <span>WEDDING CATERING</span><i></i><span>ARTISAN CAKES</span><i></i><span>CELEBRATION MENUS</span>
            </div>
        </section>

        <!-- INTRO -->
        <section class="rl-intro rl-section">
            <div class="rl-section-label"><span>01</span> OUR PHILOSOPHY</div>
            <div class="rl-intro-copy">
                <h2>Good food brings us together.<br><em>Beautiful details make it memorable.</em></h2>
                <p>
                    Every celebration deserves something special. From a thoughtfully
                    prepared menu to a cake designed around your story, Ruby Luxe brings
                    flavor and visual elegance together for moments worth remembering.
                </p>
            </div>
        </section>

        <!-- CATERING MENU -->
        <section class="rl-section rl-catering" id="catering">
            <div class="rl-heading">
                <div>
                    <span class="rl-eyebrow rl-eyebrow-dark">OUR CATERING MENU</span>
                    <h2>A menu for every <em>gathering.</em></h2>
                </div>
                <p>Explore sample menu collections and tell us what suits your occasion.</p>
            </div>

            <div class="rl-food-grid">
                <article class="rl-food-card">
                    <div class="rl-food-image">
                        <img src="https://images.unsplash.com/photo-1547592180-85f173990554?auto=format&fit=crop&w=850&q=85" alt="Hidangan prasmanan dan sajian makanan" loading="lazy" decoding="async">
                        <span>01 / SIGNATURE</span>
                    </div>
                    <div class="rl-food-copy">
                        <h3>Signature Buffet</h3>
                        <p>A considered selection of main dishes and accompaniments for weddings and larger gatherings.</p>
                        <a href="{{ url('/webia/template/catering-wedding-cake-ruby-luxe/katalog') }}?category=signature-buffet">Explore menu <span>↗</span></a>
                    </div>
                </article>

                <article class="rl-food-card">
                    <div class="rl-food-image">
                        <img src="https://images.unsplash.com/photo-1547592180-85f173990554?auto=format&fit=crop&w=850&q=85" alt="Sajian makanan untuk acara keluarga" loading="lazy" decoding="async">
                        <span>02 / INTIMATE</span>
                    </div>
                    <div class="rl-food-copy">
                        <h3>Intimate Dining</h3>
                        <p>A menu concept for family celebrations, private dinners, and smaller occasions.</p>
                        <a href="{{ url('/webia/template/catering-wedding-cake-ruby-luxe/katalog') }}?category=intimate-dining">Explore menu <span>↗</span></a>
                    </div>
                </article>

                <article class="rl-food-card">
                    <div class="rl-food-image">
                        <img src="https://images.unsplash.com/photo-1555507036-ab1f4038808a?auto=format&fit=crop&w=850&q=85" alt="Pastry dan dessert untuk acara" loading="lazy" decoding="async">
                        <span>03 / DESSERTS</span>
                    </div>
                    <div class="rl-food-copy">
                        <h3>Dessert & Sweet Table</h3>
                        <p>A dessert spread with pastries and sweet bites to complete your celebration.</p>
                        <a href="{{ url('/webia/template/catering-wedding-cake-ruby-luxe/katalog') }}?category=dessert-table">Explore menu <span>↗</span></a>
                    </div>
                </article>
            </div>
            <div class="rl-centered">
                <a href="{{ url('/webia/template/catering-wedding-cake-ruby-luxe/katalog') }}" class="rl-button rl-button-outline">View Catering Menu ↗</a>
            </div>
        </section>

        <!-- WEDDING CAKES -->
        <section class="rl-section rl-cakes" id="cakes">
            <div class="rl-heading">
                <div>
                    <span class="rl-eyebrow rl-eyebrow-dark">THE WEDDING CAKE COLLECTION</span>
                    <h2>A sweet centerpiece, <em>made yours.</em></h2>
                </div>
                <p>Choose a design direction, then personalize the size, flavor, and finishing details.</p>
            </div>

            <div class="rl-cake-grid">
                <article class="rl-cake-card rl-cake-large">
                    <img src="https://images.unsplash.com/photo-1535254973040-607b474cb50d?auto=format&fit=crop&w=1000&q=85" alt="Wedding cake putih bertingkat" loading="lazy" decoding="async">
                    <div class="rl-cake-overlay">
                        <span>01 / TIMELESS</span>
                        <h3>Classic Ivory</h3>
                        <a href="{{ url('/webia/template/catering-wedding-cake-ruby-luxe/detail') }}?product=classic-ivory">Discover this style ↗</a>
                    </div>
                </article>

                <article class="rl-cake-card">
                    <img src="https://images.unsplash.com/photo-1578985545062-69928b1d9587?auto=format&fit=crop&w=800&q=85" alt="Kue bertingkat dengan hiasan bunga" loading="lazy" decoding="async">
                    <div class="rl-cake-overlay">
                        <span>02 / ROMANTIC</span>
                        <h3>Romantic Bloom</h3>
                        <a href="{{ url('/webia/template/catering-wedding-cake-ruby-luxe/detail') }}?product=romantic-bloom">Discover this style ↗</a>
                    </div>
                </article>

                <article class="rl-cake-card">
                    <img src="https://images.unsplash.com/photo-1557979619-445218f326b9?auto=format&fit=crop&w=800&q=85" alt="Kue perayaan dengan desain modern" loading="lazy" decoding="async">
                    <div class="rl-cake-overlay">
                        <span>03 / CONTEMPORARY</span>
                        <h3>Modern Minimal</h3>
                        <a href="{{ url('/webia/template/catering-wedding-cake-ruby-luxe/detail') }}?product=modern-minimal">Discover this style ↗</a>
                    </div>
                </article>
            </div>
            <p class="rl-demo-note">Cake imagery is illustrative. Actual designs, decoration, and availability depend on the final order consultation.</p>
        </section>

        <!-- PACKAGES & LIMITED-TIME DEMO OFFER -->
        <section class="rl-section rl-packages" id="packages">
            <div class="rl-heading">
                <div>
                    <span class="rl-eyebrow rl-eyebrow-dark">THE RUBY LUXE OFFER</span>
                    <h2>Exceptional moments, <em>thoughtfully priced.</em></h2>
                </div>
                <p>Explore sample packages with clear serving ranges, menu quantities, and celebration extras.</p>
            </div>

            <div class="rl-promo-banner">
                <div class="rl-promo-icon">✳</div>
                <div class="rl-promo-copy">
                    <span>LIMITED-TIME DEMO PROMOTION</span>
                    <strong>A little more luxury for your celebration.</strong>
                    <small>Illustrative offer ends 1 December 2026. Demo pricing and inclusions only.</small>
                </div>
                <div class="rl-countdown" data-countdown="2026-12-01T23:59:59+07:00" aria-label="Countdown promo">
                    <div><strong data-days>--</strong><small>DAYS</small></div>
                    <div><strong data-hours>--</strong><small>HRS</small></div>
                    <div><strong data-minutes>--</strong><small>MIN</small></div>
                    <div><strong data-seconds>--</strong><small>SEC</small></div>
                </div>
            </div>

            <div class="rl-package-grid">
                <article class="rl-package-card rl-sale-card">
                    <span class="rl-package-index">01 / INTIMATE CATERING</span>
                    <h3>Gather & Share</h3>
                    <p>Thoughtful favorites for intimate gatherings and family celebrations.</p>
                    <div class="rl-price">
                        <div class="rl-price-top"><small>Regular price</small><span class="rl-discount-badge">SAVE 18.5%</span></div>
                        <del>Rp2.439.000</del>
                        <strong>Rp1.987.000</strong>
                        <small class="rl-saving">You save Rp452.000</small>
                    </div>
                    <div class="rl-package-stats">
                        <div><small>Guest capacity</small><strong>20–30 guests</strong></div>
                        <div><small>Menu selection</small><strong>5 menu types</strong></div>
                        <div><small>Beverages</small><strong>2 varieties</strong></div>
                        <div><small>Extra bites</small><strong>30 snack pieces</strong></div>
                    </div>
                    <ul>
                        <li>2 main dishes + 2 sides</li>
                        <li>1 dessert selection</li>
                        <li>2 beverage varieties</li>
                        <li>Menu consultation and serving plan</li>
                    </ul>
                    <a href="{{ url('/webia/template/catering-wedding-cake-ruby-luxe/detail') }}?package=gather-and-share" class="rl-package-link">Explore package details <span>↗</span></a>
                </article>

                <article class="rl-package-card rl-package-featured rl-sale-card">
                    <span class="rl-popular-tag">MOST LOVED · DEMO</span>
                    <span class="rl-package-index">02 / CATERING + CAKE</span>
                    <h3>The Signature Day</h3>
                    <p>A coordinated menu and cake experience for your most meaningful occasions.</p>
                    <div class="rl-price">
                        <div class="rl-price-top"><small>Regular price</small><span class="rl-discount-badge">SAVE 20%</span></div>
                        <del>Rp4.850.000</del>
                        <strong>Rp3.880.000</strong>
                        <small class="rl-saving">You save Rp970.000</small>
                    </div>
                    <div class="rl-package-stats">
                        <div><small>Guest capacity</small><strong>40–60 guests</strong></div>
                        <div><small>Menu selection</small><strong>8 menu types</strong></div>
                        <div><small>Beverages</small><strong>3 varieties</strong></div>
                        <div><small>Extra bites</small><strong>60 snack pieces</strong></div>
                    </div>
                    <ul>
                        <li>3 main dishes + 3 sides</li>
                        <li>2 dessert selections + mini cake</li>
                        <li>3 beverage varieties</li>
                        <li>Catering and cake planning consultation</li>
                    </ul>
                    <a href="{{ url('/webia/template/catering-wedding-cake-ruby-luxe/detail') }}?package=signature-day" class="rl-package-link">Explore package details <span>↗</span></a>
                </article>

                <article class="rl-package-card rl-sale-card">
                    <span class="rl-package-index">03 / PREMIUM CELEBRATION</span>
                    <h3>Sweet Statement</h3>
                    <p>A generous celebration spread with a custom cake centerpiece.</p>
                    <div class="rl-price">
                        <div class="rl-price-top"><small>Regular price</small><span class="rl-discount-badge">SAVE 15%</span></div>
                        <del>Rp10.800.000</del>
                        <strong>Rp9.180.000</strong>
                        <small class="rl-saving">You save Rp1.620.000</small>
                    </div>
                    <div class="rl-package-stats">
                        <div><small>Guest capacity</small><strong>80–120 guests</strong></div>
                        <div><small>Menu selection</small><strong>12 menu types</strong></div>
                        <div><small>Beverages</small><strong>4 varieties</strong></div>
                        <div><small>Extra bites</small><strong>120 snack pieces</strong></div>
                    </div>
                    <ul>
                        <li>4 main dishes + 4 sides</li>
                        <li>4 dessert selections + custom cake</li>
                        <li>4 beverage varieties</li>
                        <li>Priority planning and custom menu discussion</li>
                    </ul>
                    <a href="{{ url('/webia/template/catering-wedding-cake-ruby-luxe/detail') }}?package=sweet-statement" class="rl-package-link">Explore package details <span>↗</span></a>
                </article>
            </div>
            <p class="rl-demo-note">Demo prices, discount amounts, guest capacities, and quantities are illustrative UI content only. Confirm real ingredient costs, portions, service scope, taxes, delivery, and availability before using as a live offer.</p>
        </section>

                <!-- CAKE OPTIONS -->
        <section class="rl-options">
            <div class="rl-options-image">
                <img src="https://images.unsplash.com/photo-1578985545062-69928b1d9587?auto=format&fit=crop&w=1000&q=85" alt="Wedding cake dengan dekorasi elegan" loading="lazy" decoding="async">
            </div>
            <div class="rl-options-copy">
                <span class="rl-eyebrow">MADE TO YOUR TASTE</span>
                <h2>Personalize every <em>little detail.</em></h2>
                <p>From cake size to flavor combinations, your order starts with the choices that matter most to you.</p>

                <div class="rl-option-row">
                    <span>01</span>
                    <div><strong>Cake sizes</strong><p>Single-tier, two-tier, three-tier, or custom dimensions subject to design feasibility.</p></div>
                </div>
                <div class="rl-option-row">
                    <span>02</span>
                    <div><strong>Flavor selections</strong><p>Discuss chocolate, vanilla, red velvet, fruit, and other available flavors with the baker.</p></div>
                </div>
                <div class="rl-option-row">
                    <span>03</span>
                    <div><strong>Custom finishing</strong><p>Share your preferred color palette, floral details, reference images, or celebration theme.</p></div>
                </div>
                <a href="#inquiry" class="rl-button rl-button-light">Request a Custom Cake ↗</a>
            </div>
        </section>

        <!-- CAPACITY -->
        <section class="rl-section rl-capacity">
            <div class="rl-heading">
                <div>
                    <span class="rl-eyebrow rl-eyebrow-dark">PLANNED AROUND YOUR GUESTS</span>
                    <h2>The right serving plan for <em>your day.</em></h2>
                </div>
                <p>Guest numbers help us discuss quantities, service style, logistics, and an appropriate proposal.</p>
            </div>
            <div class="rl-capacity-grid">
                <article><span>01</span><h3>Intimate Gathering</h3><p>For smaller family occasions and private celebrations.</p><small>Guest count confirmed during inquiry</small></article>
                <article><span>02</span><h3>Medium Celebration</h3><p>For weddings, birthdays, and events with a larger guest list.</p><small>Menu and serving scope by quotation</small></article>
                <article><span>03</span><h3>Large Events</h3><p>For larger celebrations requiring detailed service planning.</p><small>Capacity subject to confirmation</small></article>
            </div>
        </section>

        <!-- TASTING -->
        <section class="rl-tasting">
            <div class="rl-tasting-copy">
                <span class="rl-eyebrow">A LITTLE TASTE BEFORE THE BIG DAY</span>
                <h2>Let's find the flavors <em>you love.</em></h2>
                <p>Interested in tasting menu items or cake flavors before confirming an order? Tell us what you're planning and ask about tasting availability, sample options, scheduling, and any applicable fees.</p>
                <a href="#inquiry" class="rl-button rl-button-light">Ask About Food Tasting ↗</a>
            </div>
            <div class="rl-tasting-image">
                <img src="https://images.unsplash.com/photo-1555507036-ab1f4038808a?auto=format&fit=crop&w=950&q=85" alt="Pastry dan hidangan penutup" loading="lazy" decoding="async">
            </div>
        </section>

        <!-- TESTIMONIALS -->
        <section class="rl-section rl-testimonials">
            <div class="rl-heading">
                <div>
                    <span class="rl-eyebrow rl-eyebrow-dark">KIND WORDS</span>
                    <h2>Made with care, <em>remembered with love.</em></h2>
                </div>
                <p>A place for real customer stories about their catering and cake experience.</p>
            </div>
            <article class="rl-testimonial-card">
                <span class="rl-stars" aria-label="5 stars">★★★★★</span>
                <blockquote>“Every detail felt thoughtfully considered, from the presentation to the overall experience.”</blockquote>
                <strong>Sample testimonial</strong>
                <small>Replace with an approved, genuine customer review before publishing.</small>
            </article>
        </section>

        <!-- ORDER INQUIRY -->
        <section class="rl-inquiry" id="inquiry">
            <div class="rl-inquiry-copy">
                <span class="rl-eyebrow">LET'S CREATE SOMETHING DELICIOUS</span>
                <h2>Tell us what you're <em>celebrating.</em></h2>
                <p>Share your event details, menu preferences, and cake ideas. We'll prepare an inquiry summary for you to continue with our team on WhatsApp.</p>
                <div class="rl-inquiry-promise"><span>✳</span><p><strong>Every order begins with a conversation.</strong><small>Final pricing, availability, and delivery arrangements are confirmed directly with the team.</small></p></div>
            </div>

            <form class="rl-inquiry-form" id="rlInquiryForm">
                <div class="rl-form-heading">
                    <span>YOUR CELEBRATION</span>
                    <h3>Let's start your order inquiry.</h3>
                </div>

                <div class="rl-form-row">
                    <label>Full name *
                        <input name="name" type="text" placeholder="Your name" required>
                    </label>
                    <label>WhatsApp number *
                        <input name="phone" type="tel" placeholder="08xxxxxxxxxx" required>
                    </label>
                </div>

                <label>What would you like to order? *
                    <select name="orderType" id="rlOrderType" required>
                        <option value="">Choose an order type</option>
                        <option>Catering</option>
                        <option>Wedding Cake</option>
                        <option>Catering & Wedding Cake</option>
                        <option>Custom Celebration Cake</option>
                        <option>Dessert Table</option>
                    </select>
                </label>

                <div class="rl-form-row">
                    <label>Event date *
                        <input name="eventDate" id="rlEventDate" type="date" required>
                    </label>
                    <label>Estimated guests
                        <select name="guests">
                            <option value="">Select guest count</option>
                            <option>Under 50 guests</option>
                            <option>50–100 guests</option>
                            <option>101–300 guests</option>
                            <option>301–500 guests</option>
                            <option>More than 500 guests</option>
                        </select>
                    </label>
                </div>

                <label>Delivery or event location *
                    <input name="location" type="text" placeholder="City, venue, or delivery address area" required>
                </label>

                <div class="rl-form-row">
                    <label>Preferred cake size
                        <select name="cakeSize">
                            <option value="">Not applicable / undecided</option>
                            <option>Single-tier</option>
                            <option>Two-tier</option>
                            <option>Three-tier</option>
                            <option>Custom size</option>
                        </select>
                    </label>
                    <label>Preferred flavor
                        <input name="flavor" type="text" placeholder="e.g. chocolate, vanilla, red velvet">
                    </label>
                </div>

                <label>Menu, design, or special requests
                    <textarea name="message" rows="4" placeholder="Tell us about your menu preferences, cake inspiration, dietary requests, or event details..."></textarea>
                </label>

                <p class="rl-form-note">This form prepares a WhatsApp inquiry; it does not confirm an order. Please discuss availability, final pricing, dietary requirements, and delivery terms with the team.</p>
                <button class="rl-button rl-button-primary rl-submit" type="submit">Review & Continue to WhatsApp <span>↗</span></button>
                <p class="rl-form-status" id="rlFormStatus" role="status" aria-live="polite"></p>
            </form>
        </section>

        <!-- DELIVERY -->
        <section class="rl-section rl-delivery">
            <div>
                <span class="rl-eyebrow rl-eyebrow-dark">DELIVERY & SERVICE AREA</span>
                <h2>Thoughtfully delivered to <em>your celebration.</em></h2>
            </div>
            <div class="rl-delivery-copy">
                <p>Delivery coverage, setup availability, transport fees, and order lead times depend on your location and order requirements.</p>
                <a href="#inquiry" class="rl-text-link">Ask about your location ↗</a>
            </div>
        </section>

        <!-- FAQ -->
        <section class="rl-section rl-faq" id="faq">
            <div class="rl-faq-intro">
                <span class="rl-eyebrow rl-eyebrow-dark">FREQUENTLY ASKED QUESTIONS</span>
                <h2>A few details worth <em>knowing.</em></h2>
                <p>Need something more specific? Send us an inquiry and we'll discuss your requirements.</p>
                <a href="#inquiry" class="rl-text-link">Ask our team ↗</a>
            </div>
            <div class="rl-faq-list">
                <details>
                    <summary>How do I get a catering or cake quote?<span>+</span></summary>
                    <p>Fill in the inquiry form with your event date, location, guest count, and preferences. Our team can discuss available options and prepare a quote based on your requirements.</p>
                </details>
                <details>
                    <summary>Can I customize my wedding cake?<span>+</span></summary>
                    <p>Yes, custom designs can be discussed. Final size, flavors, decorations, feasibility, and pricing depend on the baker's capabilities and the order details.</p>
                </details>
                <details>
                    <summary>Can I request a food or cake tasting?<span>+</span></summary>
                    <p>You can ask about tasting availability, sample options, booking schedules, and applicable fees during your inquiry. Tastings are subject to confirmation.</p>
                </details>
                <details>
                    <summary>How early should I place an order?<span>+</span></summary>
                    <p>Lead time varies with the event date, menu, guest count, cake design, and production schedule. Contact the team early to discuss feasibility and availability.</p>
                </details>
                <details>
                    <summary>Do you deliver to my event location?<span>+</span></summary>
                    <p>Delivery coverage and fees depend on the destination, order size, and logistics. Share your location so the team can check the available service options.</p>
                </details>
                <details>
                    <summary>Does sending an inquiry confirm my order?<span>+</span></summary>
                    <p>No. The inquiry opens WhatsApp for discussion. An order is confirmed only after the team agrees on the details, availability, price, and ordering terms.</p>
                </details>
            </div>
        </section>
    </main>

    <footer class="rl-footer">
        <div class="rl-footer-main">
            <a class="rl-brand rl-footer-brand" href="#home">
                <span class="rl-brand-mark">R.</span>
                <span><strong>Ruby Luxe</strong><small>CATERING & WEDDING CAKE</small></span>
            </a>
            <p>Thoughtfully crafted.<br>Beautifully celebrated.</p>
            <a href="#inquiry" class="rl-footer-cta">Let's plan your order ↗</a>
        </div>
        <div class="rl-footer-bottom">
            <span>© <span id="rlYear"></span> Ruby Luxe. All rights reserved.</span>
            <span>Made with care ♡ · Website template by WEBIA</span>
        </div>
    </footer>

    <!-- Fixed floating buttons -->
    <div class="rl-floating-actions">
        <button class="rl-float-button rl-ai-button" type="button" id="rlChatbotButton" aria-label="AI Assistant" title="AI Assistant">
            <span class="rl-ai-sparkle">✳</span><span>AI Assistant</span>
        </button>
        <a class="rl-float-button rl-wa-button" id="rlFloatingWhatsApp" href="#" target="_blank" rel="noopener noreferrer" aria-label="Chat via WhatsApp" title="Chat via WhatsApp">
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20.52 3.48A11.8 11.8 0 0 0 12.1 0C5.55 0 .22 5.33.22 11.88c0 2.09.55 4.13 1.6 5.93L.12 24l6.35-1.67a11.9 11.9 0 0 0 5.63 1.43h.01c6.55 0 11.88-5.33 11.88-11.88a11.8 11.8 0 0 0-3.47-8.4Z"/></svg>
            <span>WhatsApp</span>
        </a>
    </div>

    <script>
        window.RUBY_LUXE_CONFIG = {
            whatsappNumber: '6285850180285',
            catalogUrl: @json(url('/webia/template/catering-wedding-cake-ruby-luxe/katalog')),
            detailUrl: @json(url('/webia/template/catering-wedding-cake-ruby-luxe/detail'))
        };
    </script>
    <script src="{{ asset('js/website-bisnis/templates/wedding-event/catering-wedding-cake/ruby-luxe/ruby-luxe.js') }}" defer></script>
</body>
</html>
