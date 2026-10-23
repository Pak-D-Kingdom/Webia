@php $h = $z['hero']; @endphp
<section class="ot-hero" id="beranda" aria-labelledby="ot-hero-title">
    <div class="ot-container ot-hero__inner">
        <div class="ot-hero__content">
            <p class="ot-pill">{{ $h['eyebrow'] }}</p>
            <h1 id="ot-hero-title">{{ $h['title'][0] }} <span>{{ $h['title'][1] }}</span></h1>
            <p class="ot-hero__text">{{ $h['text'] }}</p>
            <div class="ot-hero__actions">
                <a class="ot-btn ot-btn--primary" href="#{{ $h['primary']['anchor'] }}">{{ $h['primary']['label'] }}<svg class="ot-ic" aria-hidden="true"><use href="#i-arrow-right"/></svg></a>
                <a class="ot-btn ot-btn--outline" href="{{ $url($h['secondary']['route']) }}"><svg class="ot-ic" aria-hidden="true"><use href="#i-users"/></svg>{{ $h['secondary']['label'] }}</a>
            </div>
            <ul class="ot-stats">
                @foreach ($h['stats'] as $s)
                    <li>
                        <span class="ot-stats__icon"><svg class="ot-ic" aria-hidden="true"><use href="#i-{{ $s['icon'] }}"/></svg></span>
                        <span><strong>{{ $s['value'] }}</strong><small>{{ $s['label'] }}</small></span>
                    </li>
                @endforeach
            </ul>
        </div>
        <figure class="ot-hero__media">
            <img src="{{ $img($h['image']) }}" alt="{{ $h['image_alt'] }}" width="990" height="576" fetchpriority="high">
            <figcaption class="ot-hero__tagline" aria-hidden="true">{{ $h['tagline'] }}</figcaption>
        </figure>
    </div>
    <a class="ot-hero__scroll" href="#layanan" aria-label="Gulir ke layanan"><svg class="ot-ic" aria-hidden="true"><use href="#i-arrow-down"/></svg></a>
</section>
