
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Burgundy Moments membantu merencanakan wedding, corporate event, dan private celebration yang berkesan.">
    <title>Burgundy Moments — Event Organizer</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/website-bisnis/templates/wedding-event/event-organizer/burgundy-wine/burgundy-moments.css') }}">
</head>
<body>
    <div class="bm-topbar">
        <p>Thoughtfully planned, beautifully remembered.</p>
        <a href="#inquiry">Let's plan your event <span>↗</span></a>
    </div>

    <header class="bm-navbar">
        <a class="bm-brand" href="#home">
            <span class="bm-brand-mark">BM</span>
            <span>
                <strong>Burgundy Moments</strong>
                <small>EVENT PLANNER & ORGANIZER</small>
            </span>
        </a>

        <button class="bm-menu-toggle" id="bmMenuToggle"
                type="button" aria-label="Buka navigasi" aria-expanded="false">
            <span></span><span></span><span></span>
        </button>

        <nav class="bm-nav" id="bmNav">
            <a href="#home">Home</a>
            <a href="#services">Services</a>
            <a href="#packages">Packages</a>
            <a href="#portfolio">Portfolio</a>
            <a href="#process">Our Process</a>
            <a href="#faq">FAQ</a>
            <a class="bm-nav-cta" href="#inquiry">Plan Your Event ↗</a>
        </nav>
    </header>

    <main>
        <!-- HERO -->
        <section class="bm-hero" id="home">
            <div class="bm-hero-content">
                <span class="bm-eyebrow"><span></span> YOUR VISION, BEAUTIFULLY PLANNED</span>
                <h1>Every celebration deserves to be <em>unforgettable.</em></h1>
                <p>
                    From intimate weddings to grand celebrations, we turn your ideas
                    into meaningful moments that stay with you forever.
                </p>

                <div class="bm-hero-actions">
                    <a href="#inquiry" class="bm-button bm-button-light">Start Planning <span>↗</span></a>
                    <a href="#portfolio" class="bm-text-link">Explore Our Work <span>↗</span></a>
                </div>

                <div class="bm-hero-proof">
                    <div class="bm-avatar-stack" aria-hidden="true">
                        <span>A</span><span>M</span><span>S</span>
                    </div>
                    <div>
                        <strong>Made for your meaningful moments</strong>
                        <small>Personalized planning, every step of the way</small>
                    </div>
                </div>
            </div>

            <div class="bm-hero-visual">
                <img
                    src="https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=1200&q=85"
                    alt="Dekorasi wedding elegan dengan bunga dan pencahayaan hangat"
                >
                <div class="bm-image-caption">
                    <span>01 / OUR PHILOSOPHY</span>
                    <strong>Beautifully yours, from beginning to end.</strong>
                </div>
                <div class="bm-floating-note">
                    <span class="bm-note-icon">✳</span>
                    <span><strong>Every detail matters</strong><small>Designed around your story</small></span>
                </div>
            </div>

            <div class="bm-hero-bottom">
                <span>WEDDINGS</span><i></i><span>CORPORATE EVENTS</span><i></i><span>PRIVATE CELEBRATIONS</span>
            </div>
        </section>

        <!-- INTRO -->
        <section class="bm-intro bm-section">
            <div class="bm-intro-label">
                <span class="bm-section-index">01</span>
                <span>MORE THAN AN EVENT</span>
            </div>
            <div class="bm-intro-content">
                <h2>We create experiences.<br><em>You make the memories.</em></h2>
                <p>
                    We believe every event has a story worth telling. Our team brings
                    thoughtful planning, creative direction, and careful coordination
                    together to create celebrations that feel genuinely yours.
                </p>
                <a href="#process" class="bm-underlined-link">Discover how we work <span>↗</span></a>
            </div>
        </section>

        <!-- SERVICES -->
        <section class="bm-section bm-services" id="services">
            <div class="bm-section-heading">
                <div>
                    <span class="bm-eyebrow bm-eyebrow-dark">WHAT WE DO</span>
                    <h2>Made for every <em>occasion.</em></h2>
                </div>
                <p>Different occasions, one thoughtful approach: making every detail feel right.</p>
            </div>

            <div class="bm-service-grid">
                <article class="bm-service-card">
                    <img src="https://images.unsplash.com/photo-1519225421980-715cb0215aed?auto=format&fit=crop&w=800&q=80" alt="Dekorasi pernikahan" loading="lazy" decoding="async">
                    <div class="bm-service-overlay">
                        <span>01 / WEDDING</span>
                        <h3>Your love story,<br>beautifully celebrated.</h3>
                        <a href="#packages">Explore wedding services ↗</a>
                    </div>
                </article>
                <article class="bm-service-card">
                    <img src="https://images.unsplash.com/photo-1511578314322-379afb476865?auto=format&fit=crop&w=800&q=80" alt="Acara perusahaan" loading="lazy" decoding="async">
                    <div class="bm-service-overlay">
                        <span>02 / CORPORATE</span>
                        <h3>Professional events<br>with a personal touch.</h3>
                        <a href="#packages">Explore corporate events ↗</a>
                    </div>
                </article>
                <article class="bm-service-card">
                    <img src="https://images.unsplash.com/photo-1464366400600-7168b8af9bc3?auto=format&fit=crop&w=800&q=80" alt="Perayaan pribadi" loading="lazy" decoding="async">
                    <div class="bm-service-overlay">
                        <span>03 / PRIVATE EVENTS</span>
                        <h3>Little details.<br>Big memories.</h3>
                        <a href="#packages">Explore private events ↗</a>
                    </div>
                </article>
            </div>
        </section>

        <!-- PACKAGES -->
        <section class="bm-section bm-packages" id="packages">
            <div class="bm-section-heading">
                <div>
                    <span class="bm-eyebrow bm-eyebrow-dark">THOUGHTFULLY CURATED</span>
                    <h2>Find your kind of <em>celebration.</em></h2>
                </div>
                <p>Choose a starting point. We'll personalize the details to fit your event.</p>
            </div>

            <div class="bm-package-grid">
                <article class="bm-package-card">
                    <div class="bm-package-top">
                        <span class="bm-package-number">01</span>
                        <span class="bm-package-type">INTIMATE & PERSONAL</span>
                    </div>
                    <h3>Intimate Moments</h3>
                    <p>For smaller gatherings filled with warmth, meaning, and personal details.</p>
                    <ul>
                        <li>Event concept & moodboard</li>
                        <li>Vendor coordination</li>
                        <li>Event-day assistance</li>
                        <li>Personalized event timeline</li>
                    </ul>
                    <div class="bm-package-bottom">
                        <div><small>Starting from</small><strong>Custom quote</strong></div>
                        <a href="#inquiry" class="bm-package-cta" data-package="Intimate Moments" data-event="Private Celebration" data-package-label="Intimate Moments">↗</a>
                    </div>
                </article>

                <article class="bm-package-card bm-package-featured">
                    <div class="bm-featured-label">MOST REQUESTED</div>
                    <div class="bm-package-top">
                        <span class="bm-package-number">02</span>
                        <span class="bm-package-type">FULL-SERVICE PLANNING</span>
                    </div>
                    <h3>Signature Celebration</h3>
                    <p>A complete planning experience, from the first idea to the final moment.</p>
                    <ul>
                        <li>Concept & creative direction</li>
                        <li>Vendor and venue coordination</li>
                        <li>Decoration planning</li>
                        <li>Event-day coordination team</li>
                    </ul>
                    <div class="bm-package-bottom">
                        <div><small>Starting from</small><strong>Custom quote</strong></div>
                        <a href="#inquiry" class="bm-package-cta" data-package="Signature Celebration" data-event="Wedding" data-package-label="Signature Celebration">↗</a>
                    </div>
                </article>

                <article class="bm-package-card">
                    <div class="bm-package-top">
                        <span class="bm-package-number">03</span>
                        <span class="bm-package-type">CORPORATE & LARGE EVENTS</span>
                    </div>
                    <h3>Grand Experience</h3>
                    <p>For conferences, launches, galas, and large-scale celebrations.</p>
                    <ul>
                        <li>Event production planning</li>
                        <li>Venue & technical coordination</li>
                        <li>Run-of-show management</li>
                        <li>On-site event team</li>
                    </ul>
                    <div class="bm-package-bottom">
                        <div><small>Starting from</small><strong>Custom quote</strong></div>
                        <a href="#inquiry" class="bm-package-cta" data-package="Grand Experience" data-event="Corporate Event" data-package-label="Grand Experience">↗</a>
                    </div>
                </article>
            </div>

            <p class="bm-package-note">Every event is unique. Final pricing depends on event requirements, guest count, location, and selected services.</p>
            <div class="bm-centered-link">
                <a href="{{ url('/webia/template/event-organizer-modern-burgundy-wine/katalog') }}" class="bm-button bm-button-outline">View All Services & Packages ↗</a>
            </div>
        </section>

        <!-- PORTFOLIO -->
        <section class="bm-section bm-portfolio" id="portfolio">
            <div class="bm-section-heading">
                <div>
                    <span class="bm-eyebrow bm-eyebrow-dark">A FEW STORIES WE'VE TOLD</span>
                    <h2>Moments worth <em>remembering.</em></h2>
                </div>
                <p>A glimpse of the atmosphere, details, and experiences that inspire our work.</p>
            </div>

            <div class="bm-portfolio-grid">
                <figure class="bm-portfolio-item bm-portfolio-tall">
                    <img src="https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=900&q=85" alt="Dekorasi wedding romantis" loading="lazy" decoding="async">
                    <figcaption><span>WEDDING</span><strong>An evening in bloom</strong></figcaption>
                </figure>
                <figure class="bm-portfolio-item">
                    <img src="https://images.unsplash.com/photo-1507504031003-b417219a0fde?auto=format&fit=crop&w=800&q=80" alt="Meja makan acara spesial" loading="lazy" decoding="async">
                    <figcaption><span>PRIVATE CELEBRATION</span><strong>Gathered with love</strong></figcaption>
                </figure>
                <figure class="bm-portfolio-item">
                    <img src="https://images.unsplash.com/photo-1511578314322-379afb476865?auto=format&fit=crop&w=800&q=80" alt="Persiapan acara profesional" loading="lazy" decoding="async">
                    <figcaption><span>CORPORATE</span><strong>Ideas into experiences</strong></figcaption>
                </figure>
            </div>
            <p class="bm-demo-note">Portfolio images are visual examples and can be replaced with the organizer's actual event documentation.</p>
        </section>

        <!-- EVENT HIGHLIGHTS -->
        <section class="bm-highlight">
            <div class="bm-highlight-image">
                <img src="https://images.unsplash.com/photo-1464366400600-7168b8af9bc3?auto=format&fit=crop&w=1100&q=85" alt="Meja perayaan dengan dekorasi elegan" loading="lazy" decoding="async">
            </div>
            <div class="bm-highlight-content">
                <span class="bm-eyebrow">THE LITTLE THINGS</span>
                <h2>It's the details that make it <em>yours.</em></h2>
                <p>
                    The right flowers, a thoughtful seating plan, the perfect lighting,
                    and a schedule that lets you enjoy the moment. We take care of the
                    moving pieces so you can be present for the memories.
                </p>
                <div class="bm-highlight-points">
                    <div><span>01</span><p><strong>Personalized concepts</strong><small>Built around your story and preferences.</small></p></div>
                    <div><span>02</span><p><strong>Carefully selected partners</strong><small>Venue, decoration, and vendor coordination.</small></p></div>
                    <div><span>03</span><p><strong>Thoughtful execution</strong><small>Clear timelines and attention to detail.</small></p></div>
                </div>
            </div>
        </section>

        <!-- VENUE & DECOR -->
        <section class="bm-section bm-venue">
            <div class="bm-section-heading">
                <div>
                    <span class="bm-eyebrow bm-eyebrow-dark">THE PERFECT SETTING</span>
                    <h2>Set the scene for <em>your story.</em></h2>
                </div>
                <p>From intimate indoor spaces to open-air celebrations, we help you explore the possibilities.</p>
            </div>
            <div class="bm-venue-grid">
                <article class="bm-venue-card">
                    <img src="https://images.unsplash.com/photo-1519167758481-83f550bb49b3?auto=format&fit=crop&w=900&q=80" alt="Venue indoor elegan" loading="lazy" decoding="async">
                    <div><span>01</span><h3>Elegant Indoor</h3><p>Timeless settings with a polished atmosphere.</p></div>
                </article>
                <article class="bm-venue-card">
                    <img src="https://images.unsplash.com/photo-1465495976277-4387d4b0e4a6?auto=format&fit=crop&w=900&q=80" alt="Venue outdoor garden" loading="lazy" decoding="async">
                    <div><span>02</span><h3>Garden & Outdoor</h3><p>Natural scenery for a relaxed celebration.</p></div>
                </article>
                <article class="bm-venue-card">
                    <img src="https://images.unsplash.com/photo-1507504031003-b417219a0fde?auto=format&fit=crop&w=900&q=80" alt="Dekorasi meja dan bunga" loading="lazy" decoding="async">
                    <div><span>03</span><h3>Custom Decoration</h3><p>Finishing touches inspired by your vision.</p></div>
                </article>
            </div>
            <p class="bm-demo-note">Venue and decoration options are subject to location, availability, and vendor confirmation.</p>
        </section>

        <!-- PROCESS -->
        <section class="bm-section bm-process" id="process">
            <div class="bm-process-heading">
                <span class="bm-eyebrow">SIMPLE, THOUGHTFUL, PERSONAL</span>
                <h2>From “what if” to <em>“just perfect.”</em></h2>
                <p>A clear process that keeps your planning journey organized and enjoyable.</p>
            </div>
            <div class="bm-process-grid">
                <article><span>01</span><div class="bm-process-icon">✳</div><h3>Tell us your vision</h3><p>Share your event type, date, location, guest estimate, and ideas.</p></article>
                <article><span>02</span><div class="bm-process-icon">◇</div><h3>Explore possibilities</h3><p>We'll discuss your needs, budget, package options, and availability.</p></article>
                <article><span>03</span><div class="bm-process-icon">✧</div><h3>Shape the details</h3><p>Align the concept, vendors, venue, schedule, and event requirements.</p></article>
                <article><span>04</span><div class="bm-process-icon">♡</div><h3>Enjoy your moment</h3><p>Once agreed, our team coordinates the plan for your special day.</p></article>
            </div>
        </section>

        <!-- TESTIMONIALS -->
        <section class="bm-section bm-testimonials">
            <div class="bm-testimonial-copy">
                <span class="bm-eyebrow bm-eyebrow-dark">KIND WORDS</span>
                <h2>Good memories.<br><em>Even better company.</em></h2>
                <p>Every celebration is personal. The experience should be, too.</p>
            </div>
            <div class="bm-testimonial-card">
                <div class="bm-stars" aria-label="5 stars">★★★★★</div>
                <blockquote>
                    “The whole process felt organized and personal. We could focus on
                    enjoying the day while the details were coordinated with care.”
                </blockquote>
                <div class="bm-testimonial-person">
                    <span class="bm-person-initial">C</span>
                    <div><strong>Client testimonial preview</strong><small>Replace with an approved client review</small></div>
                </div>
                <div class="bm-testimonial-disclaimer">Demo content — replace with genuine testimonials before publishing.</div>
            </div>
        </section>

        <!-- INQUIRY -->
        <section class="bm-inquiry" id="inquiry">
            <div class="bm-inquiry-copy">
                <span class="bm-eyebrow">LET'S MAKE IT HAPPEN</span>
                <h2>Your next chapter deserves a <em>beautiful beginning.</em></h2>
                <p>Tell us a little about your event. We'll continue the conversation on WhatsApp to discuss your needs and check availability.</p>
                <div class="bm-contact-note">
                    <span>✳</span>
                    <p><strong>No pressure, just possibilities.</strong><small>Share your ideas first. We'll help you explore the next steps.</small></p>
                </div>
            </div>

            <form class="bm-inquiry-form" id="bmInquiryForm">
                <div class="bm-form-heading">
                    <span>YOUR EVENT, YOUR WAY</span>
                    <h3>Let's start with the details.</h3>
                </div>

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
                        <select name="eventType" id="bmEventType" required>
                            <option value="">Choose event type</option>
                            <option>Wedding</option>
                            <option>Corporate Event</option>
                            <option>Private Celebration</option>
                            <option>Birthday Party</option>
                            <option>Engagement</option>
                            <option>Other</option>
                        </select>
                    </label>
                    <label>Preferred package
                        <select name="package" id="bmPackage">
                            <option value="">Not sure yet</option>
                            <option>Intimate Moments</option>
                            <option>Signature Celebration</option>
                            <option>Grand Experience</option>
                            <option>Custom Package</option>
                        </select>
                    </label>
                </div>

                <div class="bm-form-row">
                    <label>Event date
                        <input type="date" name="eventDate" id="bmEventDate">
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

                <label>Event location *
                    <input type="text" name="location" placeholder="City or venue, if known" required>
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

                <label>Tell us about your event
                    <textarea name="message" rows="4" placeholder="Your ideas, theme, special requests, or anything we should know..."></textarea>
                </label>

                <p class="bm-form-privacy">Your details will be included in a WhatsApp inquiry so our team can follow up. Submitting this form does not confirm a booking.</p>
                <button type="submit" class="bm-button bm-button-primary bm-submit-button">Review & Continue to WhatsApp <span>↗</span></button>
                <p class="bm-form-status" id="bmFormStatus" role="status" aria-live="polite"></p>
            </form>
        </section>

        <!-- FAQ -->
        <section class="bm-section bm-faq" id="faq">
            <div class="bm-faq-intro">
                <span class="bm-eyebrow bm-eyebrow-dark">GOOD TO KNOW</span>
                <h2>A few things you might be <em>wondering.</em></h2>
                <p>Still have questions? Send us an inquiry and let's talk through your plans.</p>
                <a href="#inquiry" class="bm-underlined-link">Ask us directly ↗</a>
            </div>

            <div class="bm-faq-list">
                <details>
                    <summary>How early should I contact an event organizer?<span>+</span></summary>
                    <p>Earlier is usually better, especially for weddings and larger events. Share your preferred date so we can discuss availability and planning needs.</p>
                </details>
                <details>
                    <summary>Can I request a custom package?<span>+</span></summary>
                    <p>Yes. The listed packages are starting points. Services can be discussed based on your event concept, guest count, location, and budget.</p>
                </details>
                <details>
                    <summary>Does submitting the form confirm my booking?<span>+</span></summary>
                    <p>No. Your form opens a WhatsApp inquiry. The event date, service scope, pricing, and availability must be discussed and confirmed directly with the organizer.</p>
                </details>
                <details>
                    <summary>Can you help with venue and decoration?<span>+</span></summary>
                    <p>We can discuss venue and decoration options according to your event needs. Specific options depend on the event location, vendor availability, and budget.</p>
                </details>
                <details>
                    <summary>How is the final price determined?<span>+</span></summary>
                    <p>Pricing depends on the selected services, venue, date, guest count, production requirements, and other event details. A final quote is provided after consultation.</p>
                </details>
            </div>
        </section>
    </main>

    <footer class="bm-footer">
        <div class="bm-footer-main">
            <a class="bm-brand bm-footer-brand" href="#home">
                <span class="bm-brand-mark">BM</span>
                <span><strong>Burgundy Moments</strong><small>EVENT PLANNER & ORGANIZER</small></span>
            </a>
            <p>Thoughtfully planned.<br>Beautifully remembered.</p>
            <a href="#inquiry" class="bm-footer-cta">Let's create something meaningful ↗</a>
        </div>
        <div class="bm-footer-bottom">
            <span>© <span id="bmYear"></span> Burgundy Moments. All rights reserved.</span>
            <span>Made with care ♡ · Website template by WEBIA</span>
        </div>
    </footer>

    <!-- Floating action buttons -->
    <div class="bm-floating-actions">
        <button type="button" class="bm-float-button bm-ai-button" id="bmChatbotButton" aria-label="AI Assistant" title="AI Assistant">
            <span class="bm-ai-sparkle">✳</span><span class="bm-float-label">AI Assistant</span>
        </button>
        <a class="bm-float-button bm-wa-button" id="bmFloatingWhatsApp" href="#" target="_blank" rel="noopener noreferrer" aria-label="Chat via WhatsApp" title="Chat via WhatsApp">
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20.52 3.48A11.8 11.8 0 0 0 12.1 0C5.55 0 .22 5.33.22 11.88c0 2.09.55 4.13 1.6 5.93L.12 24l6.35-1.67a11.9 11.9 0 0 0 5.63 1.43h.01c6.55 0 11.88-5.33 11.88-11.88a11.8 11.8 0 0 0-3.47-8.4ZM12.1 21.74h-.01a9.87 9.87 0 0 1-5.03-1.38l-.36-.21-3.77.99 1.01-3.67-.24-.38a9.84 9.84 0 0 1-1.51-5.21c0-5.46 4.45-9.91 9.92-9.91a9.84 9.84 0 0 1 7.01 2.91 9.84 9.84 0 0 1 2.9 7.01c0 5.47-4.45 9.91-9.92 9.91Zm5.44-7.42c-.3-.15-1.77-.87-2.04-.97-.28-.1-.48-.15-.68.15-.2.3-.78.97-.95 1.17-.17.2-.35.23-.65.08-.3-.15-1.26-.46-2.4-1.47-.89-.79-1.49-1.77-1.66-2.07-.17-.3-.02-.46.13-.61.13-.13.3-.35.45-.52.15-.18.2-.3.3-.5.1-.2.05-.38-.03-.53-.07-.15-.68-1.63-.93-2.23-.24-.58-.49-.5-.68-.51h-.58c-.2 0-.53.08-.8.38-.27.3-1.05 1.02-1.05 2.48s1.08 2.88 1.23 3.08c.15.2 2.12 3.24 5.13 4.54.72.31 1.28.5 1.72.64.72.23 1.37.2 1.89.12.58-.09 1.77-.72 2.02-1.42.25-.7.25-1.3.17-1.42-.07-.13-.27-.2-.57-.35Z"/></svg>
            <span class="bm-float-label">WhatsApp</span>
        </a>
    </div>

    <script>
        window.BURGUNDY_MOMENTS_CONFIG = {
            whatsappNumber: '6285850180285',
            catalogUrl: @json(url('/webia/template/event-organizer-modern-burgundy-wine/katalog')),
            detailUrl: @json(url('/webia/template/event-organizer-modern-burgundy-wine/detail'))
        };
    </script>
    <script src="{{ asset('js/website-bisnis/templates/wedding-event/event-organizer/burgundy-wine/burgundy-moments.js') }}" defer></script>
</body>
</html>
