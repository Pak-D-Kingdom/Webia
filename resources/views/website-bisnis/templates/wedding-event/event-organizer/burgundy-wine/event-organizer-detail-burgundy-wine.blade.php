
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Detail paket event organizer Burgundy Moments dan formulir konsultasi acara.">
    <title>Package Details — Burgundy Moments</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/website-bisnis/templates/wedding-event/event-organizer/burgundy-wine/burgundy-moments.css') }}">
</head>
<body>
    <div class="bm-topbar">
        <p>Thoughtfully planned, beautifully remembered.</p>
        <a href="#detailInquiry">Discuss your event <span>↗</span></a>
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
            <a href="{{ url('/webia/template/event-organizer-modern-burgundy-wine/katalog') }}">Services & Packages</a>
            <a href="{{ url('/webia/template/event-organizer-modern-burgundy-wine') }}#process">Our Process</a>
            <a href="{{ url('/webia/template/event-organizer-modern-burgundy-wine') }}#faq">FAQ</a>
            <a class="bm-nav-cta" href="#detailInquiry">Send an Inquiry ↗</a>
        </nav>
    </header>

    @php
        $packageKey = request()->query('package', 'signature-celebration');

        $packages = [
            'intimate-moments' => [
                'name' => 'Intimate Moments',
                'type' => 'INTIMATE & PERSONAL',
                'event' => 'Wedding',
                'description' => 'A thoughtful planning experience for intimate weddings and smaller gatherings, with personal details at the heart of the celebration.',
                'image' => 'https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=1200&q=85',
                'services' => [
                    'Initial event concept discussion',
                    'Basic vendor coordination',
                    'Personalized event timeline',
                    'Event-day assistance',
                    'Planning based on your guest count and needs',
                ],
                'ideal' => 'Intimate weddings, engagements, anniversaries, and smaller celebrations.',
            ],
            'signature-celebration' => [
                'name' => 'Signature Celebration',
                'type' => 'FULL-SERVICE PLANNING',
                'event' => 'Wedding',
                'description' => 'A coordinated planning experience that brings your concept, venue, vendors, and event-day schedule together.',
                'image' => 'https://images.unsplash.com/photo-1519225421980-715cb0215aed?auto=format&fit=crop&w=1200&q=85',
                'services' => [
                    'Creative concept and moodboard',
                    'Venue and vendor coordination',
                    'Decoration planning',
                    'Event timeline and run sheet',
                    'Event-day coordination team',
                ],
                'ideal' => 'Couples and hosts looking for coordinated planning from concept to event day.',
            ],
            'grand-experience' => [
                'name' => 'Grand Experience',
                'type' => 'CORPORATE & LARGE EVENTS',
                'event' => 'Corporate Event',
                'description' => 'Planning and coordination for professional events where scheduling, venue logistics, and technical requirements matter.',
                'image' => 'https://images.unsplash.com/photo-1511578314322-379afb476865?auto=format&fit=crop&w=1200&q=85',
                'services' => [
                    'Event production planning',
                    'Venue and technical coordination',
                    'Run-of-show management',
                    'Vendor coordination',
                    'On-site event team',
                ],
                'ideal' => 'Conferences, launches, galas, company celebrations, and large events.',
            ],
            'private-celebration' => [
                'name' => 'Private Celebration',
                'type' => 'PERSONAL OCCASIONS',
                'event' => 'Private Celebration',
                'description' => 'Make birthdays, anniversaries, engagements, and other meaningful gatherings feel personal and well organized.',
                'image' => 'https://images.unsplash.com/photo-1464366400600-7168b8af9bc3?auto=format&fit=crop&w=1200&q=85',
                'services' => [
                    'Theme and decoration discussion',
                    'Vendor recommendations',
                    'Event schedule coordination',
                    'Venue planning support',
                    'Event-day assistance based on the agreed scope',
                ],
                'ideal' => 'Birthdays, anniversaries, engagements, and family celebrations.',
            ],
            'business-gathering' => [
                'name' => 'Business Gathering',
                'type' => 'CORPORATE EVENTS',
                'event' => 'Corporate Event',
                'description' => 'A practical event planning option for business gatherings, networking sessions, and company celebrations.',
                'image' => 'https://images.unsplash.com/photo-1505373877841-8d25f7d46678?auto=format&fit=crop&w=1200&q=85',
                'services' => [
                    'Event flow planning',
                    'Guest and venue coordination',
                    'Vendor coordination',
                    'Schedule and run sheet preparation',
                    'On-site event support',
                ],
                'ideal' => 'Company gatherings, networking events, team celebrations, and business functions.',
            ],
            'made-just-for-you' => [
                'name' => 'Made Just for You',
                'type' => 'CUSTOM PACKAGE',
                'event' => 'Other',
                'description' => 'Have an event concept that does not fit a standard package? Let us discuss a service scope built around your needs.',
                'image' => 'https://images.unsplash.com/photo-1511795409834-ef04bbd61622?auto=format&fit=crop&w=1200&q=85',
                'services' => [
                    'Personalized planning consultation',
                    'Custom service scope discussion',
                    'Venue and vendor requirements review',
                    'Planning timeline based on event needs',
                    'Quote based on agreed requirements',
                ],
                'ideal' => 'Unique events and requests that need a tailored planning approach.',
            ],
        ];

        $package = $packages[$packageKey] ?? $packages['signature-celebration'];
    @endphp

    <main>
        <section class="bm-detail-hero">
            <div class="bm-detail-hero-copy">
                <div class="bm-breadcrumb">
                    <a href="{{ url('/webia/template/event-organizer-modern-burgundy-wine') }}">Home</a>
                    <span>/</span>
                    <a href="{{ url('/webia/template/event-organizer-modern-burgundy-wine/katalog') }}">Packages</a>
                    <span>/</span>
                    <span>Details</span>
                </div>
                <span class="bm-eyebrow bm-eyebrow-dark">{{ $package['type'] }}</span>
                <h1>{{ $package['name'] }}<br><em>made meaningful.</em></h1>
                <p>{{ $package['description'] }}</p>
                <div class="bm-detail-actions">
                    <a href="#detailInquiry" class="bm-button bm-button-primary">Discuss This Package ↗</a>
                    <a href="{{ url('/webia/template/event-organizer-modern-burgundy-wine/katalog') }}" class="bm-underlined-link">Back to packages</a>
                </div>
                <p class="bm-detail-price-note">Custom quote · Pricing depends on your event requirements.</p>
            </div>
            <div class="bm-detail-hero-image">
                <img src="{{ $package['image'] }}" alt="Inspirasi acara untuk paket {{ $package['name'] }}">
            </div>
        </section>

        <section class="bm-detail-content">
            <div class="bm-detail-main">
                <span class="bm-eyebrow bm-eyebrow-dark">WHAT'S INCLUDED</span>
                <h2>Thoughtful planning, <em>step by step.</em></h2>
                <p class="bm-detail-description">
                    We start by understanding your vision, then discuss the service scope
                    that fits your event. The final inclusions will be agreed during consultation.
                </p>

                <div class="bm-detail-service-list">
                    @foreach ($package['services'] as $index => $service)
                        <div class="bm-detail-service">
                            <span>{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                            <strong>{{ $service }}</strong>
                            <span class="bm-detail-check">✓</span>
                        </div>
                    @endforeach
                </div>

                <div class="bm-detail-ideal">
                    <span class="bm-detail-ideal-icon">✳</span>
                    <div>
                        <strong>Perfect for</strong>
                        <p>{{ $package['ideal'] }}</p>
                    </div>
                </div>

                <div class="bm-detail-note">
                    <strong>A note about availability and pricing</strong>
                    <p>Package descriptions are sample template content. Services, staffing, venue options, date availability, and final pricing must be confirmed directly with the event organizer.</p>
                </div>
            </div>

            <aside class="bm-detail-sidebar">
                <span class="bm-eyebrow bm-eyebrow-dark">YOUR NEXT STEP</span>
                <h3>Let's talk about your event.</h3>
                <p>Send us your initial details and we'll continue the discussion through WhatsApp.</p>
                <div class="bm-sidebar-item"><span>01</span><p><strong>Share your plan</strong><small>Tell us your date, location, and estimated guests.</small></p></div>
                <div class="bm-sidebar-item"><span>02</span><p><strong>Discuss the details</strong><small>We'll review the requirements and availability together.</small></p></div>
                <div class="bm-sidebar-item"><span>03</span><p><strong>Review the proposal</strong><small>Confirm services and pricing directly with the organizer.</small></p></div>
                <a href="#detailInquiry" class="bm-button bm-button-primary bm-sidebar-button">Inquire About This Package ↗</a>
            </aside>
        </section>

        <section class="bm-detail-inquiry" id="detailInquiry">
            <div class="bm-detail-inquiry-copy">
                <span class="bm-eyebrow">LET'S START A CONVERSATION</span>
                <h2>Tell us about your <em>special day.</em></h2>
                <p>Complete the form below to prepare your inquiry. You'll review the information in WhatsApp before sending it to the organizer.</p>
            </div>

            <form class="bm-inquiry-form" id="bmInquiryForm">
                <div class="bm-form-heading">
                    <span>PACKAGE INQUIRY</span>
                    <h3>{{ $package['name'] }}</h3>
                </div>

                <input type="hidden" name="package" value="{{ $package['name'] }}">

                <div class="bm-form-row">
                    <label>Full name *
                        <input type="text" name="name" placeholder="Your name" required>
                    </label>
                    <label>WhatsApp number *
                        <input type="tel" name="phone" placeholder="08xxxxxxxxxx" required>
                    </label>
                </div>

                <div class="bm-form-row">
                    <label>Event type *
                        <select name="eventType" required>
                            <option value="">Choose event type</option>
                            <option value="Wedding" @selected($package['event'] === 'Wedding')>Wedding</option>
                            <option value="Corporate Event" @selected($package['event'] === 'Corporate Event')>Corporate Event</option>
                            <option value="Private Celebration" @selected($package['event'] === 'Private Celebration')>Private Celebration</option>
                            <option value="Birthday Party">Birthday Party</option>
                            <option value="Engagement">Engagement</option>
                            <option value="Other" @selected($package['event'] === 'Other')>Other</option>
                        </select>
                    </label>
                    <label>Event date
                        <input type="date" name="eventDate" id="bmEventDate">
                    </label>
                </div>

                <div class="bm-form-row">
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
                    <label>Estimated budget
                        <select name="budget">
                            <option value="">Prefer to discuss first</option>
                            <option>Under Rp10.000.000</option>
                            <option>Rp10.000.000–Rp25.000.000</option>
                            <option>Rp25.000.000–Rp50.000.000</option>
                            <option>Rp50.000.000–Rp100.000.000</option>
                            <option>Above Rp100.000.000</option>
                        </select>
                    </label>
                </div>

                <label>Event location *
                    <input type="text" name="location" placeholder="City or venue, if known" required>
                </label>

                <label>Additional details
                    <textarea name="message" rows="4" placeholder="Theme, special requests, or other event details..."></textarea>
                </label>

                <p class="bm-form-privacy">Submitting this inquiry does not confirm a booking. Availability and final pricing must be agreed with the organizer.</p>
                <button type="submit" class="bm-button bm-button-primary bm-submit-button">Review & Continue to WhatsApp <span>↗</span></button>
                <p class="bm-form-status" id="bmFormStatus" role="status" aria-live="polite"></p>
            </form>
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
</body>
</html>
