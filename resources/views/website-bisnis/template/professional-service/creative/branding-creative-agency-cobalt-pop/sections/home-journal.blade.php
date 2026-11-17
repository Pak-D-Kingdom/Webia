<section class="bca-section bca-tone-paper" id="journal-preview" aria-labelledby="bca-jr-h" style="border-top:3px solid var(--bca-ink)">
    <div class="bca-wrap">
        <div class="bca-shead">
            <span class="bca-label">Creative Journal</span>
            <h2 class="bca-h2" id="bca-jr-h">Catatan dari meja kerja kami.</h2>
        </div>
        <div class="bca-posts bca-posts--home">
            @include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.post-card', ['p' => $site['journal'][0], 'mode' => 'home', 'lead' => true])
            <div class="bca-posts__side">
                @foreach(array_slice($site['journal'], 1, 2) as $p)
                    @include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.post-card', ['p' => $p, 'mode' => 'home', 'lead' => false])
                @endforeach
            </div>
        </div>
        <div class="bca-more"><span></span><a class="bca-btn bca-btn--cobalt" href="{{ route($site['routes']['journal']) }}">Buka Creative Journal @include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.icon', ['name' => 'arrow'])</a></div>
    </div>
</section>
