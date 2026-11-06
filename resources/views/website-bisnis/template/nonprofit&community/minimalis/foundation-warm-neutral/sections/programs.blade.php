<article class="hf-card hf-programs" data-reveal>
    <header class="hf-card__head hf-card__head--split">
        <div class="hf-card__headmain">
            <svg class="hf-art" viewBox="0 0 48 48" aria-hidden="true"><use href="#ic-grid"/></svg>
            <h2 class="hf-card__title">{{ $f['programs']['title'] }}</h2>
        </div>
        <a class="hf-linkmini" href="{{ route($rp.'programs') }}">{{ $f['programs']['link'] }} <svg class="hf-i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
    </header>
    <p class="hf-card__sub">{{ $f['programs']['subtitle'] }}</p>
    <ul class="hf-programs__grid">
        @foreach($f['programs']['items'] as $p)
            <li>
                <a class="hf-tile" href="{{ route($rp.'programs') }}#{{ $p['key'] }}">
                    <svg class="hf-art hf-art--lg" viewBox="0 0 64 64" aria-hidden="true"><use href="#{{ $p['icon'] }}"/></svg>
                    <span>{{ $p['short'] }}</span>
                </a>
            </li>
        @endforeach
    </ul>
</article>
