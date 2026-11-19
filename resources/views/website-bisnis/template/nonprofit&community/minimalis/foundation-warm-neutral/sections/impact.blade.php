<article class="hf-card hf-impact" data-reveal>
    @include($v.'.partials.map')
    <header class="hf-card__head">
        <svg class="hf-art" viewBox="0 0 48 48" aria-hidden="true"><use href="#ic-chart"/></svg>
        <h2 class="hf-card__title"><a class="hf-stretch" href="{{ route($rp.'impact') }}">{{ $f['impact']['title'] }}</a></h2>
    </header>
    <p class="hf-card__sub">{{ $f['impact']['subtitle'] }}</p>
    <ul class="hf-stats">
        @foreach($f['impact']['stats'] as $s)
            <li>
                <strong><span data-count="{{ $s['value'] }}">{{ $s['display'] }}</span>{{ $s['suffix'] }}</strong>
                <span>{{ $s['label'] }}</span>
            </li>
        @endforeach
    </ul>
</article>
