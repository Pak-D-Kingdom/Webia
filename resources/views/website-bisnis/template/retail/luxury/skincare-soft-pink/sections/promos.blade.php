<div class="promos">
    @foreach ($cfg['promos'] as $p)
        <article class="promo">
            <div class="promo__copy">
                <h3>{{ $p['title'] }}</h3>
                <p class="promo__line">{{ $p['line'] }}</p>
                <p class="promo__sub">{{ $p['sub'] }}</p>
                <a class="btn btn--rose btn--sm" href="{{ route($rp . $p['route'], $p['query'] ?? []) }}">{{ $p['cta'] }} <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
            </div>
            <img src="{{ $img }}/{{ $p['image'] }}" alt="" aria-hidden="true" loading="lazy">
        </article>
    @endforeach
</div>
