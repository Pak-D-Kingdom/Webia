{{-- HERO / BERANDA --}}
<section class="cp-hero" id="beranda" aria-labelledby="cp-hero-title">
    <svg class="cp-hero__leaf" width="240" height="340" aria-hidden="true" focusable="false"><use href="#cp-branch"></use></svg>

    <div class="cp-container cp-hero__inner">
        <div class="cp-hero__content">
            <p class="cp-eyebrow">{!! $icon('leaf') !!}<span>{{ $hero['eyebrow'] }}</span></p>
            <h1 class="cp-hero__title" id="cp-hero-title">
                @foreach ($hero['title'] as $line)
                    <span class="cp-hero__line">{{ $line }}</span>
                @endforeach
            </h1>
            <p class="cp-hero__lead">{{ $hero['lead'] }}</p>
            <div class="cp-hero__actions">
                <a class="cp-btn cp-btn--primary" href="{{ $link('layanan') }}">{{ $hero['cta_primary'] }} {!! $icon('arrow') !!}</a>
                <a class="cp-btn cp-btn--outline" href="{{ $page('tentang') }}"><span class="cp-btn__badge">{!! $icon('leaf') !!}</span>{{ $hero['cta_secondary'] }}</a>
            </div>
        </div>
    </div>

    <div class="cp-hero__media">
        <img src="{{ $img('hero.jpg') }}" alt="Gedung kantor {{ $company['name'] }} dengan fasad kayu dan kaca" width="1872" height="488" fetchpriority="high">
    </div>
</section>
