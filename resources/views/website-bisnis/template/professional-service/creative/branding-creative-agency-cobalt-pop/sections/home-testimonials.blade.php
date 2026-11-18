<section class="bca-section bca-tone-tint" id="testimonials-preview" aria-labelledby="bca-ts-h">
    <div class="bca-wrap">
        <div class="bca-shead">
            <span class="bca-label">Client Testimonials</span>
            <h2 class="bca-h2" id="bca-ts-h">Kata mereka setelah proyek selesai.</h2>
        </div>
        <div class="bca-quotes bca-quotes--home">
            @include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.quote-card', ['q' => $site['testimonials'][0], 'variant' => 'yellow', 'big' => true])
            @include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.quote-card', ['q' => $site['testimonials'][1], 'variant' => 'cobalt', 'big' => false])
            @include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.quote-card', ['q' => $site['testimonials'][2], 'variant' => 'coral', 'big' => false])
        </div>
        <div class="bca-more"><span></span><a class="bca-btn" href="{{ route($site['routes']['testimonials']) }}">Baca semua testimoni @include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.icon', ['name' => 'arrow'])</a></div>
    </div>
</section>
