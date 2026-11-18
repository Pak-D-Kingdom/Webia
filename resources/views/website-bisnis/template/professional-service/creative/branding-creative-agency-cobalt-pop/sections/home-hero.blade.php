<section class="bca-hero" aria-labelledby="bca-hero-title">
    <div class="bca-hero__bg" aria-hidden="true"></div>
    <div class="bca-shape bca-shape--ring" style="left:-4%;top:46%" aria-hidden="true"></div>
    <div class="bca-shape bca-shape--dot" style="left:46%;top:12%" aria-hidden="true" data-bca-parallax="18"></div>
    <div class="bca-shape bca-shape--sq" style="left:52%;bottom:14%" aria-hidden="true" data-bca-parallax="-14"></div>
    <div class="bca-wrap bca-hero__grid">
        <div class="bca-hero__copy">
            <p class="bca-hero__tag"><i aria-hidden="true"></i>{{ $site['tagline'] }} · {{ $site['contact']['location'] }}</p>
            <h1 class="bca-hero__title" id="bca-hero-title">
                <span class="bca-line"><span style="--bca-d:.1s">{{ $site['hero']['headline_1'] }}</span></span>
                <span class="bca-line bca-line--yellow"><span style="--bca-d:.25s">{{ $site['hero']['headline_2'] }}</span></span>
            </h1>
            <p class="bca-hero__lead">{{ $site['hero']['lead'] }}</p>
            <div class="bca-actions">
                <a class="bca-btn" href="{{ route($site['routes']['contact']) }}">Start a Project @include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.icon', ['name' => 'arrow'])</a>
                <a class="bca-btn bca-btn--paper" href="{{ route($site['routes']['portfolio']) }}">Explore Our Work</a>
            </div>
        </div>
        <figure class="bca-hero__visual">
            <div class="bca-frame">
                <img src="{{ asset($site['asset_base'] . 'img/hero-collage.jpg') }}" width="1100" height="1283" alt="Komposisi poster, kartu nama, dan palet warna studio Pigmen di atas latar kuning" fetchpriority="high">
            </div>
            <div class="bca-badge" aria-hidden="true">
                <svg viewBox="0 0 160 160"><defs><path id="bca-circ" d="M80,80 m-62,0 a62,62 0 1,1 124,0 a62,62 0 1,1 -124,0"/></defs><text><textPath href="#bca-circ" textLength="380" lengthAdjust="spacing">{{ $site['hero']['badge'] }}</textPath></text></svg>
                <span class="bca-badge__core">@include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.icon', ['name' => 'spark'])</span>
            </div>
            <span class="bca-hero__sticker">Sejak 2016</span>
        </figure>
    </div>
    <div class="bca-ticker" aria-hidden="true">
        <div class="bca-ticker__track">
            @foreach([1, 2] as $copy)
                <div class="bca-ticker__set">
                    @foreach($site['hero']['ticker'] as $t)
                        <span class="bca-ticker__item">{{ $t }}</span>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
</section>
