<article class="lw-card lw-card--options">
    <header class="lw-card__head">
        <h2 class="lw-card__title">{{ $c['options']['title'] }}</h2>
        <p>{{ $c['options']['sub'] }}</p>
    </header>
    <ul class="lw-opt-grid">
        @foreach ($c['options']['items'] as $o)
            <li>
                <a class="lw-opt" href="{{ $r('opsi') }}">
                    <span class="lw-ico lw-ico--round"><svg class="lw-i"><use href="#i-{{ $o['icon'] }}"/></svg></span>
                    <span><strong>{{ $o['name'] }}</strong><small>{{ $o['desc'] }}</small></span>
                </a>
            </li>
        @endforeach
    </ul>
</article>
