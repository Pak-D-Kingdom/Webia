<article class="hf-card hf-donation" data-reveal>
    <svg class="hf-deco hf-donation__heart" viewBox="0 0 40 36" aria-hidden="true"><use href="#deco-heart"/></svg>
    <header class="hf-card__head">
        <svg class="hf-art" viewBox="0 0 48 48" aria-hidden="true"><use href="#ic-gift"/></svg>
        <h2 class="hf-card__title">{{ $f['donation']['title'] }}</h2>
    </header>
    <p class="hf-card__sub">{{ $f['donation']['subtitle'] }}</p>
    <ul class="hf-donation__grid">
        @foreach($f['donation']['options'] as $o)
            <li>
                <a class="hf-tile hf-tile--sm" href="{{ route($rp.'donation') }}#{{ $o['key'] }}">
                    <svg class="hf-art hf-art--md" viewBox="0 0 48 48" aria-hidden="true"><use href="#{{ $o['icon'] }}"/></svg>
                    <span>{{ $o['title'] }}@if($o['sub'] !== '')<small>{{ $o['sub'] }}</small>@endif</span>
                </a>
            </li>
        @endforeach
    </ul>
    <a class="hf-btn hf-btn--dark hf-btn--sm hf-donation__cta" href="{{ route($rp.'donation') }}">{{ $f['donation']['button'] }} <svg class="hf-i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
</article>
