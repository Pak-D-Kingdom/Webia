@extends('website-bisnis.template.transportation&logistics.luxury.logistics-company-rose-atelier.layouts.app')

@section('content')
<section class="atelier-hero">
    <div class="atelier-container atelier-hero__grid">
        <div class="atelier-hero__copy" data-reveal>
            <p class="atelier-overline">Private moving concierge <span>·</span> Jakarta &amp; beyond</p>
            <h1>Arrive with<br><em>intention.</em></h1>
            <p class="atelier-hero__lead">Atelier Move brings the care of a private service to the art of moving. For considered homes, treasured objects, and new beginnings.</p>
            <div class="atelier-hero__actions">
                <a class="atelier-button atelier-button--rose" href="#contact">Request a consultation <span>↗</span></a>
                <a class="atelier-text-link" href="#method">Discover our method <span>↓</span></a>
            </div>
            <div class="atelier-hero__note"><span class="atelier-hero__note-line"></span><span>White-glove service from first conversation to final placement.</span></div>
        </div>
        <div class="atelier-hero__visual" data-reveal>
            <img src="{{ asset($site['assets']['hero']) }}" alt="Interior rumah elegan untuk layanan Atelier Move">
            <div class="atelier-hero__visual-caption"><span>01</span><span>Moving, considered.</span></div>
            <div class="atelier-hero__vertical">The art of arriving well</div>
        </div>
    </div>
</section>

<section class="atelier-section atelier-statement">
    <div class="atelier-container atelier-statement__grid">
        <p class="atelier-overline" data-reveal>A more thoughtful move</p>
        <div class="atelier-statement__copy" data-reveal>
            <h2>Because the details<br><em>are the destination.</em></h2>
            <span class="atelier-rule"></span>
            <p>We coordinate the practical and protect the personal. Every object is catalogued, every room is considered, and every arrival is quietly complete.</p>
        </div>
    </div>
</section>

<section class="atelier-section atelier-services" id="services">
    <div class="atelier-container">
        <div class="atelier-services__top" data-reveal>
            <div><p class="atelier-overline">Our services</p><h2>Tailored to<br><em>your world.</em></h2></div>
            <p>A discreet, end-to-end service for people who expect more from moving day.</p>
        </div>
        <div class="atelier-service-list" data-reveal>
            <article class="atelier-service-row"><span>01</span><div><h3>Luxury home moving</h3><p>White-glove coordination for residences, artful interiors, and the things that make a home yours.</p></div><a href="#contact" aria-label="Learn about luxury home moving">↗</a></article>
            <article class="atelier-service-row"><span>02</span><div><h3>Premium packing</h3><p>Archival wrapping, custom crating, and a visual inventory for complete peace of mind.</p></div><a href="#contact" aria-label="Learn about premium packing">↗</a></article>
            <article class="atelier-service-row"><span>03</span><div><h3>Office relocation</h3><p>A composed transition for studios, executive offices, and creative spaces with no unnecessary noise.</p></div><a href="#contact" aria-label="Learn about office relocation">↗</a></article>
            <article class="atelier-service-row"><span>04</span><div><h3>Furniture handling</h3><p>Specialist care for heirlooms, statement pieces, and furniture that deserves its own plan.</p></div><a href="#contact" aria-label="Learn about furniture handling">↗</a></article>
        </div>
    </div>
</section>

<section class="atelier-image-band">
    <img src="{{ asset($site['assets']['interior']) }}" alt="Ruang interior yang tertata dengan elegan" loading="lazy">
    <div class="atelier-image-band__copy" data-reveal><p class="atelier-overline">A home, uninterrupted</p><h2>More than a move.<br><em>A softer landing.</em></h2><p>From the first room plan to the last piece placed, your new beginning is handled with intention.</p></div>
</section>

<section class="atelier-section atelier-method" id="method">
    <div class="atelier-container atelier-method__grid">
        <div class="atelier-method__image" data-reveal><img src="{{ asset($site['assets']['hands']) }}" alt="Tim Atelier Move menangani barang dengan hati-hati" loading="lazy"><span>Care, at every touchpoint.</span></div>
        <div class="atelier-method__copy" data-reveal><p class="atelier-overline">The Atelier method</p><h2>Quietly precise.<br><em>Deeply personal.</em></h2><ol>
            <li><span>01</span><div><h3>Consultation</h3><p>We begin with your space, your story, and an unhurried conversation about what matters.</p></div></li>
            <li><span>02</span><div><h3>Estimate</h3><p>A considered plan with transparent scope, timing, and investment. No surprises, ever.</p></div></li>
            <li><span>03</span><div><h3>Scheduling</h3><p>Your dedicated move director orchestrates each detail, from first box to final placement.</p></div></li>
        </ol></div>
    </div>
</section>

<section class="atelier-section atelier-testimonial">
    <div class="atelier-container atelier-testimonial__inner" data-reveal><p class="atelier-overline">A note from a client</p><blockquote>“The team understood that we were not just moving furniture. They were moving the feeling of home.”</blockquote><cite>— Maya S. <span>·</span> South Jakarta</cite><div class="atelier-line"></div></div>
</section>

<section class="atelier-section atelier-contact" id="contact">
    <div class="atelier-container atelier-contact__grid">
        <div class="atelier-contact__copy" data-reveal><p class="atelier-overline">Begin your move</p><h2>Let’s make room<br><em>for what’s next.</em></h2><p>Tell us what you are envisioning. Our concierge desk will reply personally within one business day.</p><div class="atelier-contact__details"><span>Concierge desk</span><a href="mailto:hello@ateliermove.example">hello@ateliermove.example</a><a href="tel:+622155501987">+62 21 5550 1987</a></div></div>
        <form class="atelier-form" data-consultation-form data-reveal><div class="atelier-form-heading"><span>Consultation request</span><span>01 / 04</span></div><label>Your name<input name="name" required placeholder="Full name"></label><label>Email address<input name="email" required type="email" placeholder="you@example.com"></label><label>What are you moving?<select name="service"><option>Luxury home</option><option>Premium packing</option><option>Office relocation</option><option>Furniture handling</option></select></label><label>Preferred timing<input name="date" type="text" placeholder="A month or date range"></label><button class="atelier-button atelier-button--dark" type="submit">Send request <span>↗</span></button><p class="atelier-form-message" data-consultation-message aria-live="polite"></p></form>
    </div>
</section>
@endsection
