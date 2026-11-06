
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Collection Details — Ruby Luxe</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/website-bisnis/templates/wedding-event/catering-wedding-cake/ruby-luxe/ruby-luxe.css') }}">
</head>
<body>
    <div class="rl-topbar"><p>Thoughtfully crafted for life's sweetest occasions.</p><a href="#detailInquiry">Discuss your order ↗</a></div>
    <header class="rl-navbar">
        <a class="rl-brand" href="{{ url('/webia/template/catering-wedding-cake-ruby-luxe') }}"><span class="rl-brand-mark">R.</span><span><strong>Ruby Luxe</strong><small>CATERING & WEDDING CAKE</small></span></a>
        <button class="rl-menu-toggle" id="rlMenuToggle" type="button" aria-label="Buka navigasi" aria-expanded="false"><span></span><span></span><span></span></button>
        <nav class="rl-nav" id="rlNav">
            <a href="{{ url('/webia/template/catering-wedding-cake-ruby-luxe') }}">Home</a>
            <a href="{{ url('/webia/template/catering-wedding-cake-ruby-luxe/katalog') }}">Menu & Cakes</a>
            <a href="{{ url('/webia/template/catering-wedding-cake-ruby-luxe') }}#packages">Packages</a>
            <a href="{{ url('/webia/template/catering-wedding-cake-ruby-luxe') }}#faq">FAQ</a>
            <a href="#detailInquiry" class="rl-nav-cta">Make an Inquiry ↗</a>
        </nav>
    </header>

    @php
        $items = [
            'signature-buffet' => [
                'name' => 'Signature Buffet',
                'type' => 'CATERING COLLECTION',
                'kind' => 'Catering',
                'image' => 'https://images.unsplash.com/photo-1547592180-85f173990554?auto=format&fit=crop&w=1100&q=85',
                'description' => 'A catering concept for celebrations with menu selections and serving arrangements discussed around your event needs.',
                'features' => ['Menu selection consultation', 'Guest count and portion planning', 'Serving style discussion', 'Delivery and service requirements review'],
                'ideal' => 'Weddings, receptions, and larger family celebrations.',
            ],
            'intimate-dining' => [
                'name' => 'Intimate Dining',
                'type' => 'CATERING COLLECTION',
                'kind' => 'Catering',
                'image' => 'https://images.unsplash.com/photo-1515003197210-e0cd7184f8b5?auto=format&fit=crop&w=1100&q=85',
                'description' => 'A menu concept for private dinners and smaller gatherings where the food and presentation complement the occasion.',
                'features' => ['Menu preference consultation', 'Guest count planning', 'Serving arrangement discussion', 'Dietary requirement discussion'],
                'ideal' => 'Family dinners, private gatherings, and intimate celebrations.',
            ],
            'dessert-table' => [
                'name' => 'Dessert Table',
                'type' => 'DESSERT COLLECTION',
                'kind' => 'Dessert Table',
                'image' => 'https://images.unsplash.com/photo-1555507036-ab1f4038808a?auto=format&fit=crop&w=1100&q=85',
                'description' => 'A sweet-table concept with dessert and pastry selections to complement your celebration.',
                'features' => ['Dessert selection discussion', 'Quantity planning based on guest count', 'Presentation and styling discussion', 'Delivery logistics review'],
                'ideal' => 'Weddings, birthdays, receptions, and dessert-focused gatherings.',
            ],
            'classic-ivory' => [
                'name' => 'Classic Ivory',
                'type' => 'WEDDING CAKE COLLECTION',
                'kind' => 'Wedding Cake',
                'image' => 'https://images.unsplash.com/photo-1535254973040-607b474cb50d?auto=format&fit=crop&w=1100&q=85',
                'description' => 'A timeless cake design direction featuring a clean ivory look, subject to the baker’s available techniques and materials.',
                'features' => ['Cake size and tier discussion', 'Available flavor selection', 'Decoration and finishing consultation', 'Serving and delivery requirements review'],
                'ideal' => 'Classic, elegant, and minimalist wedding themes.',
            ],
            'romantic-bloom' => [
                'name' => 'Romantic Bloom',
                'type' => 'WEDDING CAKE COLLECTION',
                'kind' => 'Wedding Cake',
                'image' => 'https://images.unsplash.com/photo-1578985545062-69928b1d9587?auto=format&fit=crop&w=1100&q=85',
                'description' => 'A romantic floral-inspired cake concept that can be discussed around your chosen colors and event theme.',
                'features' => ['Floral decoration discussion', 'Tier and serving size planning', 'Available flavors consultation', 'Reference image review'],
                'ideal' => 'Romantic weddings, garden themes, and floral celebrations.',
            ],
            'modern-minimal' => [
                'name' => 'Modern Minimal',
                'type' => 'WEDDING CAKE COLLECTION',
                'kind' => 'Wedding Cake',
                'image' => 'https://images.unsplash.com/photo-1557979619-445218f326b9?auto=format&fit=crop&w=1100&q=85',
                'description' => 'A contemporary cake concept with a clean visual direction and finishing details tailored to the agreed design.',
                'features' => ['Design and color consultation', 'Cake size and tier discussion', 'Available flavor selection', 'Custom finishing discussion'],
                'ideal' => 'Contemporary, minimalist, and modern wedding themes.',
            ],
        ];

        $packages = [
            'gather-and-share' => [
                'name' => 'Gather & Share',
                'type' => 'CATERING PACKAGE',
                'kind' => 'Catering',
                'image' => 'https://images.unsplash.com/photo-1547592180-85f173990554?auto=format&fit=crop&w=1100&q=85',
                'description' => 'A starting package for intimate gatherings, with the menu and service scope discussed based on your guest count.',
                'features' => ['Menu consultation', 'Guest count and serving plan', 'Delivery requirements discussion', 'Custom quotation based on requirements'],
                'ideal' => 'Smaller gatherings and family celebrations.',
                'regular_price' => 2439000, 'sale_price' => 1987000, 'discount' => '18.5%', 'saving' => 452000,
                'guests' => '20–30 guests', 'menu_count' => '5 menu types', 'beverages' => '2 varieties', 'snacks' => '30 pieces',
                'menu_items' => ['2 main dishes: choose from chicken or beef options', '2 side dishes: vegetables, rice or potato selection', '1 dessert selection', '2 beverage varieties', '30 snack pieces for guests'],
                'extras' => ['Menu consultation', 'Serving plan based on guest count', 'Dietary preferences discussion', 'Delivery options reviewed during consultation'],
                'package_note' => 'Ideal for a smaller gathering with a curated menu and straightforward serving plan.',
            ],
            'signature-day' => [
                'name' => 'The Signature Day',
                'type' => 'CATERING + CAKE PACKAGE',
                'kind' => 'Catering & Wedding Cake',
                'image' => 'https://images.unsplash.com/photo-1535254973040-607b474cb50d?auto=format&fit=crop&w=1100&q=85',
                'description' => 'A combined catering and cake concept for celebrations that need a coordinated food and dessert plan.',
                'features' => ['Catering menu consultation', 'Cake design discussion', 'Guest count and serving plan', 'Delivery coordination discussion'],
                'ideal' => 'Weddings and celebrations seeking catering and cake in one inquiry.',
                'regular_price' => 4850000, 'sale_price' => 3880000, 'discount' => '20%', 'saving' => 970000,
                'guests' => '40–60 guests', 'menu_count' => '8 menu types', 'beverages' => '3 varieties', 'snacks' => '60 pieces',
                'menu_items' => ['3 main dishes: mix of chicken, beef or fish options', '3 side dishes: vegetables, rice and complementary sides', '2 dessert selections', '3 beverage varieties', '1 mini celebration cake', '60 snack pieces for guests'],
                'extras' => ['Catering and cake planning consultation', 'Menu selection guidance', 'Cake design and flavor discussion', 'Guest count and serving plan', 'Delivery coordination discussion'],
                'package_note' => 'A coordinated catering and cake package for a more complete celebration experience.',
            ],
            'sweet-statement' => [
                'name' => 'Sweet Statement',
                'type' => 'CUSTOM CAKE PACKAGE',
                'kind' => 'Custom Celebration Cake',
                'image' => 'https://images.unsplash.com/photo-1578985545062-69928b1d9587?auto=format&fit=crop&w=1100&q=85',
                'description' => 'A custom cake consultation for a celebration centerpiece, with design, size, and flavor discussed before a quote is prepared.',
                'features' => ['Custom cake design consultation', 'Size and tier discussion', 'Flavor options review', 'Pickup or delivery discussion'],
                'ideal' => 'Wedding cakes and custom celebration cakes.',
                'regular_price' => 10800000, 'sale_price' => 9180000, 'discount' => '15%', 'saving' => 1620000,
                'guests' => '80–120 guests', 'menu_count' => '12 menu types', 'beverages' => '4 varieties', 'snacks' => '120 pieces',
                'menu_items' => ['4 main dishes: selection discussed with the team', '4 side dishes: vegetables, rice and complementary sides', '4 dessert selections', '4 beverage varieties', '1 custom cake concept, size confirmed after consultation', '120 snack pieces for guests'],
                'extras' => ['Priority planning consultation', 'Custom menu and cake discussion', 'Serving quantity planning', 'Flavor and finishing preferences', 'Delivery and event logistics review'],
                'package_note' => 'A premium-style demo package with a broader menu selection and custom cake concept.',
            ],
        ];

        $key = request()->query('product') ?: request()->query('package', 'classic-ivory');
        $item = $items[$key] ?? $packages[$key] ?? $items['classic-ivory'];
        $isPackage = isset($packages[$key]);
    @endphp

    <main>
        <section class="rl-detail-hero">
            <div class="rl-detail-hero-copy">
                <div class="rl-breadcrumb"><a href="{{ url('/webia/template/catering-wedding-cake-ruby-luxe') }}">Home</a><span>/</span><a href="{{ url('/webia/template/catering-wedding-cake-ruby-luxe/katalog') }}">Collection</a><span>/</span><span>Details</span></div>
                <span class="rl-eyebrow rl-eyebrow-dark">{{ $item['type'] }}</span>
                <h1>{{ $item['name'] }}<br><em>made for your occasion.</em></h1>
                <p>{{ $item['description'] }}</p>
                @if ($isPackage)
                    <div class="rl-detail-promo">
                        <div class="rl-detail-promo-top"><span class="rl-discount-badge">DEMO OFFER · SAVE {{ $item['discount'] }}</span><span class="rl-detail-expiry">Ends 1 December 2026</span></div>
                        <div class="rl-detail-price-line"><del>Rp{{ number_format($item['regular_price'], 0, ',', '.') }}</del><strong>Rp{{ number_format($item['sale_price'], 0, ',', '.') }}</strong></div>
                        <p>You save <strong>Rp{{ number_format($item['saving'], 0, ',', '.') }}</strong> in this illustrative offer.</p>
                        <div class="rl-countdown" data-countdown="2026-12-01T23:59:59+07:00">
                            <div><strong data-days>--</strong><small>DAYS</small></div><div><strong data-hours>--</strong><small>HRS</small></div><div><strong data-minutes>--</strong><small>MIN</small></div><div><strong data-seconds>--</strong><small>SEC</small></div>
                        </div>
                    </div>
                @endif
                <div class="rl-detail-actions">
                    <a href="#detailInquiry" class="rl-button rl-button-primary">Inquire About This Item ↗</a>
                    <a href="{{ url('/webia/template/catering-wedding-cake-ruby-luxe/katalog') }}" class="rl-text-link">Back to collection</a>
                </div>
                <p class="rl-detail-price-note">{{ $isPackage ? 'Demo package price · Final scope and price must be confirmed with the business.' : 'Custom quote · Final price depends on selected options and order requirements.' }}</p>
            </div>
            <div class="rl-detail-hero-image"><img src="{{ $item['image'] }}" alt="{{ $item['name'] }} — Ruby Luxe"></div>
        </section>

        <section class="rl-detail-content">
            <div class="rl-detail-main">
                <span class="rl-eyebrow rl-eyebrow-dark">COLLECTION DETAILS</span>
                <h2>Thoughtfully planned, <em>made personal.</em></h2>
                <p class="rl-detail-description">{{ $item['description'] }} The final inclusions will be discussed and confirmed with the team before an order is accepted.</p>
                @if ($isPackage)
                    <div class="rl-package-detail-stats">
                        <div><small>Suggested guest range</small><strong>{{ $item['guests'] }}</strong></div>
                        <div><small>Menu selection</small><strong>{{ $item['menu_count'] }}</strong></div>
                        <div><small>Beverages</small><strong>{{ $item['beverages'] }}</strong></div>
                        <div><small>Snack allowance</small><strong>{{ $item['snacks'] }}</strong></div>
                    </div>
                    <section class="rl-menu-breakdown">
                        <span class="rl-eyebrow rl-eyebrow-dark">WHAT'S INCLUDED</span>
                        <h3>Every detail, <em>clearly considered.</em></h3>
                        <p>{{ $item['package_note'] }}</p>
                        <ul>
                            @foreach ($item['menu_items'] as $menuItem)
                                <li><span>✓</span>{{ $menuItem }}</li>
                            @endforeach
                        </ul>
                    </section>
                    <section class="rl-menu-breakdown rl-included-breakdown">
                        <span class="rl-eyebrow rl-eyebrow-dark">THE EXPERIENCE</span>
                        <h3>More than just <em>a menu.</em></h3>
                        <ul>
                            @foreach ($item['extras'] as $extra)
                                <li><span>✦</span>{{ $extra }}</li>
                            @endforeach
                        </ul>
                    </section>
                    <p class="rl-demo-note">All prices, discount rates, quantities, guest ranges, menu examples, and bonus pieces on this page are demo values for template preview. Actual inclusions depend on menu choices, portion sizes, service area, staffing, equipment, taxes, and delivery. No order is confirmed until the team confirms availability and final quotation.</p>
                @endif
                <div class="rl-detail-list">
                    @foreach ($item['features'] as $index => $feature)
                        <div><span>{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span><strong>{{ $feature }}</strong><span>✓</span></div>
                    @endforeach
                </div>
                <div class="rl-detail-note"><span>✳</span><div><strong>Perfect for</strong><p>{{ $item['ideal'] }}</p></div></div>
                <p class="rl-demo-note">Product photos and descriptions are examples. Confirm actual ingredients, allergens, serving quantities, design feasibility, and prices with the business before publishing.</p>
            </div>

            <aside class="rl-detail-sidebar">
                <span class="rl-eyebrow rl-eyebrow-dark">YOUR ORDER INQUIRY</span>
                <h3>Let's discuss the details.</h3>
                <p>We'll use your event information to start a conversation about the right options.</p>
                <div class="rl-detail-meta">
                    <div><strong>Collection</strong><small>{{ $item['kind'] }}</small></div>
                    <div><strong>Pricing</strong><small>{{ $isPackage ? 'Demo price shown · final quote requires confirmation' : 'Quote confirmed after consultation' }}</small></div>
                    <div><strong>Availability</strong><small>Subject to production schedule and confirmation</small></div>
                </div>
                <a href="#detailInquiry" class="rl-button rl-button-primary">Continue to Inquiry ↗</a>
            </aside>
        </section>

        <section class="rl-inquiry" id="detailInquiry">
            <div class="rl-inquiry-copy">
                <span class="rl-eyebrow">LET'S TALK ABOUT YOUR ORDER</span>
                <h2>Make it a little more <em>personal.</em></h2>
                <p>Tell us about your celebration, and we'll prepare a WhatsApp inquiry with your selected item.</p>
            </div>

            <form class="rl-inquiry-form" id="rlInquiryForm">
                <div class="rl-form-heading"><span>YOUR ORDER</span><h3>{{ $item['name'] }}</h3></div>
                <input type="hidden" name="selectedItem" value="{{ $item['name'] }}">
                <input type="hidden" name="orderType" value="{{ $item['kind'] }}">

                <div class="rl-form-row">
                    <label>Full name *<input name="name" type="text" placeholder="Your name" required></label>
                    <label>WhatsApp number *<input name="phone" type="tel" placeholder="08xxxxxxxxxx" required></label>
                </div>
                <div class="rl-form-row">
                    <label>Event date *<input name="eventDate" id="rlEventDate" type="date" required></label>
                    <label>Estimated guests
                        <select name="guests">
                            <option value="">Select guest count</option>
                            <option>Under 50 guests</option><option>50–100 guests</option>
                            <option>101–300 guests</option><option>301–500 guests</option>
                            <option>More than 500 guests</option>
                        </select>
                    </label>
                </div>
                <label>Delivery or event location *<input name="location" type="text" placeholder="City or venue" required></label>
                <div class="rl-form-row">
                    <label>Cake size
                        <select name="cakeSize"><option value="">Not applicable / undecided</option><option>Single-tier</option><option>Two-tier</option><option>Three-tier</option><option>Custom size</option></select>
                    </label>
                    <label>Flavor preference<input name="flavor" type="text" placeholder="Preferred flavor, if applicable"></label>
                </div>
                <label>Additional details<textarea name="message" rows="4" placeholder="Menu, cake design, dietary requirements, or other preferences..."></textarea></label>
                <p class="rl-form-note">Submitting this form does not confirm an order. Final details, availability, pricing, and delivery arrangements must be confirmed with the team.</p>
                <button class="rl-button rl-button-primary rl-submit" type="submit">Review & Continue to WhatsApp ↗</button>
                <p class="rl-form-status" id="rlFormStatus" role="status" aria-live="polite"></p>
            </form>
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
        <a class="rl-float-button rl-wa-button" id="rlFloatingWhatsApp" href="#" target="_blank" rel="noopener noreferrer" aria-label="Chat via WhatsApp"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20.52 3.48A11.8 11.8 0 0 0 12.1 0C5.55 0 .22 5.33.22 11.88c0 2.09.55 4.13 1.6 5.93L.12 24l6.35-1.67a11.9 11.9 0 0 0 5.63 1.43h.01c6.55 0 11.88-5.33 11.88-11.88Z"/></svg><span>WhatsApp</span></a>
    </div>

    <script>window.RUBY_LUXE_CONFIG = { whatsappNumber: '6285850180285' };</script>
    <script src="{{ asset('js/website-bisnis/templates/wedding-event/catering-wedding-cake/ruby-luxe/ruby-luxe.js') }}" defer></script>
</body>
</html>
