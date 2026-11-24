<section class="bca-section bca-tone-paper bca-clients" id="clients-preview" aria-labelledby="bca-cl-h">
    <div class="bca-wrap">
        <div class="bca-shead">
            <span class="bca-label">Trusted Clients</span>
            <h2 class="bca-h2" id="bca-cl-h">Merek dan mitra yang <mark class="bca-hl">tumbuh bersama</mark> kami.</h2>
        </div>
    </div>
    <div class="bca-marquee" aria-label="Logo klien">
        <div class="bca-marquee__track">
            @foreach([1, 2] as $copy)
                <ul class="bca-marquee__set" @if($copy === 2) aria-hidden="true" @endif>
                    @foreach($site['clients'] as $c)
                        <li class="bca-logocard"><span><img src="{{ asset($site['asset_base'] . 'logos/client-' . $c['key'] . '.png') }}" alt="{{ $copy === 1 ? 'Logo ' . $c['name'] : '' }}" loading="lazy"><small>{{ $c['industry'] }}</small></span></li>
                    @endforeach
                </ul>
            @endforeach
        </div>
    </div>
    <div class="bca-wrap"><p class="bca-marquee__label">Mitra produksi &amp; teknologi</p></div>
    <div class="bca-marquee bca-marquee--rev" aria-label="Logo mitra">
        <div class="bca-marquee__track">
            @foreach([1, 2] as $copy)
                <ul class="bca-marquee__set" @if($copy === 2) aria-hidden="true" @endif>
                    @foreach($site['partners'] as $c)
                        <li class="bca-logocard bca-logocard--partner"><span><img src="{{ asset($site['asset_base'] . 'logos/partner-' . $c['key'] . '.png') }}" alt="{{ $copy === 1 ? 'Logo ' . $c['name'] : '' }}" loading="lazy"><small>{{ $c['role'] }}</small></span></li>
                    @endforeach
                    @foreach($site['partners'] as $c)
                        <li class="bca-logocard bca-logocard--partner"><span><img src="{{ asset($site['asset_base'] . 'logos/partner-' . $c['key'] . '.png') }}" alt="" loading="lazy"><small>{{ $c['role'] }}</small></span></li>
                    @endforeach
                </ul>
            @endforeach
        </div>
    </div>
    <div class="bca-wrap">
        <div class="bca-more"><p class="bca-muted">Nama dan logo pada template ini bersifat fiktif.</p><a class="bca-btn bca-btn--cobalt" href="{{ route($site['routes']['clients']) }}">Lihat semua klien &amp; mitra @include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.icon', ['name' => 'arrow'])</a></div>
    </div>
</section>
