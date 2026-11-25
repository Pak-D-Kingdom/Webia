<section class="bca-section bca-tone-paper" id="portfolio-preview" aria-labelledby="bca-pf-h">
    <div class="bca-wrap">
        <div class="bca-shead">
            <span class="bca-label">Featured Portfolio</span>
            <h2 class="bca-h2" id="bca-pf-h">Karya pilihan yang <mark class="bca-hl">paling kami banggakan.</mark></h2>
        </div>
        <div class="bca-pf-home">
            @foreach($site['portfolio'] as $p)
                @if($p['featured'])
                    <a class="bca-pcard bca-reveal" href="{{ route($site['routes']['portfolio']) }}#{{ $p['slug'] }}" style="--bca-d:{{ $loop->index * 0.04 }}s">
                        <img src="{{ asset($site['asset_base'] . $p['image']) }}" loading="lazy" alt="{{ $p['title'] }}: {{ $p['desc'] }}">
                        <span class="bca-pcard__go" aria-hidden="true">@include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.icon', ['name' => 'arrow'])</span>
                        <span class="bca-bubble" aria-hidden="true">Lihat</span>
                        <div class="bca-pcard__over">
                            <span class="bca-chip bca-chip--fill bca-pcard__tag">{{ $p['category'] }}</span>
                            <h3>{{ $p['title'] }}</h3>
                            <p>{{ $p['desc'] }}</p>
                        </div>
                    </a>
                @endif
            @endforeach
        </div>
        <div class="bca-more">
            <p class="bca-muted">Karya demo untuk keperluan template. Klien dan merek bersifat fiktif.</p>
            <a class="bca-btn bca-btn--cobalt" href="{{ route($site['routes']['portfolio']) }}">Lihat semua portofolio @include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.icon', ['name' => 'arrow'])</a>
        </div>
    </div>
</section>
