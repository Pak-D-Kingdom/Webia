<section class="uh-hero" aria-labelledby="uh-hero-title">
    <div class="uh-hero__bg" aria-hidden="true">
        <div class="uh-hero__photo">
            <img src="{{ $img('hero-kaaba.jpg') }}" alt="" width="1890" height="834" fetchpriority="high">
        </div>
        <div class="uh-hero__panel">
            <span class="uh-hero__arch uh-hero__arch--outer"></span>
            <span class="uh-hero__arch uh-hero__arch--inner"></span>
            <img class="uh-hero__lantern" src="{{ $img('lentera.png') }}" alt="" width="57" height="165">
            <i class="uh-spark uh-spark--1"></i>
            <i class="uh-spark uh-spark--2"></i>
            <i class="uh-spark uh-spark--3"></i>
            <i class="uh-spark uh-spark--4"></i>
        </div>
        <svg class="uh-hero__plane" viewBox="0 0 24 24" aria-hidden="true"><use href="#i-plane"/></svg>
        <i class="uh-dust uh-dust--1"></i>
        <i class="uh-dust uh-dust--2"></i>
        <i class="uh-dust uh-dust--3"></i>
        <i class="uh-dust uh-dust--4"></i>
        <i class="uh-dust uh-dust--5"></i>
    </div>

    <div class="uh-container uh-hero__inner">
        <div class="uh-hero__copy">
            <p class="uh-hero__eyebrow"><i aria-hidden="true"></i>{{ $uh['hero']['eyebrow'] }}</p>
            <h1 id="uh-hero-title" class="uh-hero__title">{{ $uh['hero']['title'] }}</h1>
            <p class="uh-hero__sub">{{ $uh['hero']['subtitle'] }}</p>
            <p class="uh-hero__text">{{ $uh['hero']['text'] }}</p>

            <ul class="uh-hero__features">
                @foreach ($uh['hero']['features'] as $f)
                    <li>
                        <span class="uh-hero__ficon"><svg class="uh-i" aria-hidden="true"><use href="#i-{{ $f['icon'] }}"/></svg></span>
                        <span class="uh-hero__flabel">{{ $f['label'] }}</span>
                    </li>
                @endforeach
            </ul>

            <div class="uh-hero__actions">
                <a class="uh-btn uh-btn--gold uh-btn--shine" href="{{ $url('packages') }}">
                    <span>{{ $uh['hero']['cta_primary'] }}</span>
                    <svg class="uh-i" aria-hidden="true"><use href="#i-arrow-right"/></svg>
                </a>
                <a class="uh-btn uh-btn--ghost" href="{{ $wa($uh['hero']['wa_consult']) }}" target="_blank" rel="noopener noreferrer">
                    <svg class="uh-i" aria-hidden="true"><use href="#i-whatsapp"/></svg>
                    <span>{{ $uh['hero']['cta_secondary'] }}</span>
                </a>
            </div>
        </div>

        <p class="uh-hero__calli" aria-hidden="true">
            <span>{{ $uh['hero']['calligraphy'] }}</span>
            <i class="uh-hero__calli-orn"></i>
        </p>

        @include('website-bisnis.template.travel&tourism.classic.umrah-haji-emerald-green.sections.ai-assistant')
    </div>
</section>
