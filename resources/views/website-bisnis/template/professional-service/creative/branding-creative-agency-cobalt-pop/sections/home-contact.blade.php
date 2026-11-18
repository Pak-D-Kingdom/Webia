<section class="bca-section bca-contact" id="contact-preview" aria-labelledby="bca-ct-h">
    <div class="bca-wrap bca-contact__grid">
        <div class="bca-contact__copy">
            <span class="bca-label">Contact &amp; Project Inquiry</span>
            <h2 class="bca-h2" id="bca-ct-h" style="font-size:clamp(2.8rem,7vw,5.8rem)">Punya proyek? Mari bicara.</h2>
            <p class="bca-lead">Ceritakan tantangan merek Anda. Kami akan membalas dengan pertanyaan yang tepat, bukan penawaran generik.</p>
            <ul class="bca-clist">
                <li>@include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.icon', ['name' => 'mail'])<a href="mailto:{{ $site['contact']['email'] }}">{{ $site['contact']['email'] }}</a></li>
                <li>@include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.icon', ['name' => 'phone'])<a href="{{ $site['contact']['phone_href'] }}">{{ $site['contact']['phone'] }}</a></li>
                <li>@include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.icon', ['name' => 'pin'])<span>{{ $site['contact']['address'] }}</span></li>
                <li>@include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.icon', ['name' => 'clock'])<span>{{ $site['contact']['hours'] }}</span></li>
            </ul>
            <div class="bca-actions"><a class="bca-link" href="{{ route($site['routes']['contact']) }}">Halaman Contact Us @include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.icon', ['name' => 'arrow-right'])</a></div>
        </div>
        @include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.contact-form', ['fid' => 'bca-home'])
    </div>
</section>
