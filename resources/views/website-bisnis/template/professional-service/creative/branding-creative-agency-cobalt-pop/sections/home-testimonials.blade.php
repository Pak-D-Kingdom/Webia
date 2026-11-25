<section class="bca-section bca-tone-tint" id="testimonials-preview" aria-labelledby="bca-ts-h">
    <div class="bca-wrap">
        <div class="bca-shead">
            <span class="bca-label">Client Testimonials</span>
            <h2 class="bca-h2" id="bca-ts-h">Kata mereka <mark class="bca-hl">setelah proyek selesai.</mark></h2>
        </div>
        @include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.testimonial-stage', ['items' => array_slice($site['testimonials'], 0, 5), 'uid' => 'home'])
        <div class="bca-more"><span></span><a class="bca-btn" href="{{ route($site['routes']['testimonials']) }}">Baca semua testimoni @include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.icon', ['name' => 'arrow'])</a></div>
    </div>
</section>
