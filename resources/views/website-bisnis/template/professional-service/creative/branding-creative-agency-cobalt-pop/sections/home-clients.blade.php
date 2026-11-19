<section class="bca-section bca-tone-paper" id="clients-preview" aria-labelledby="bca-cl-h" style="padding-top:0">
    <div class="bca-wrap">
        <div class="bca-shead bca-shead--split">
            <div style="display:grid;gap:18px">
                <span class="bca-label">Trusted Clients</span>
                <h2 class="bca-h2" id="bca-cl-h">Merek yang kami bantu tumbuh.</h2>
            </div>
        </div>
        @include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.client-wall', ['list' => array_slice($site['clients'], 0, 12)])
        <div class="bca-more"><p class="bca-muted">Nama dan logo klien pada template ini bersifat fiktif.</p><a class="bca-link" href="{{ route($site['routes']['clients']) }}">Semua klien @include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.icon', ['name' => 'arrow-right'])</a></div>
    </div>
</section>
