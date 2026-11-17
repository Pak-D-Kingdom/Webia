<section class="bca-section bca-tone-paper" id="team-preview" aria-labelledby="bca-tm-h" style="border-top:3px solid var(--bca-ink)">
    <div class="bca-wrap">
        <div class="bca-shead">
            <span class="bca-label">Meet the Team</span>
            <h2 class="bca-h2" id="bca-tm-h">Orang-orang di balik warna.</h2>
        </div>
        <div class="bca-team bca-team--home">
            @foreach(array_slice($site['team'], 0, 4) as $m)
                @include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.team-card', ['m' => $m])
            @endforeach
        </div>
        <div class="bca-more"><span></span><a class="bca-btn bca-btn--cobalt" href="{{ route($site['routes']['team']) }}">Kenali seluruh tim @include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.icon', ['name' => 'arrow'])</a></div>
    </div>
</section>
