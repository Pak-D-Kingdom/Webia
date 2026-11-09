<article class="hf-card hf-partners" data-reveal>
    <header class="hf-card__head">
        <svg class="hf-art" viewBox="0 0 48 48" aria-hidden="true"><use href="#ic-handshake"/></svg>
        <h2 class="hf-card__title">{{ $f['partners']['title'] }}</h2>
    </header>
    <p class="hf-card__sub">{{ $f['partners']['subtitle'] }}</p>
    <ul class="hf-partners__grid">
        @foreach($f['partners']['items'] as $p)
            <li><a class="hf-logo-tile" href="{{ route($rp.'partners') }}#{{ $p['key'] }}" aria-label="{{ $p['name'] }}" title="{{ $p['name'] }}"><svg viewBox="0 0 120 40" aria-hidden="true"><use href="#logo-{{ $p['key'] }}"/></svg></a></li>
        @endforeach
    </ul>
    <a class="hf-btn hf-btn--dark hf-btn--sm hf-partners__cta" href="{{ route($rp.'partners') }}">{{ $f['partners']['button'] }} <svg class="hf-i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
</article>
