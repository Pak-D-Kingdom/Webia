<article class="lw-card lw-card--services">
    <header class="lw-card__head">
        <h2 class="lw-card__title">{{ $c['services']['title'] }}</h2>
        <p>{{ $c['services']['sub'] }}</p>
    </header>
    <ul class="lw-svc-grid">
        @foreach ($c['services']['items'] as $s)
            <li>
                <a class="lw-svc" href="{{ $r('layanan') }}#{{ $s['key'] }}">
                    <span class="lw-ico"><svg class="lw-i"><use href="#i-{{ $s['icon'] }}"/></svg></span>
                    <strong>{{ $s['name'] }}</strong>
                    <small>{{ $s['tag'] }}</small>
                </a>
            </li>
        @endforeach
    </ul>
    <a class="lw-btn lw-btn--sm" href="{{ $r('layanan') }}">Lihat Semua Layanan <svg class="lw-i"><use href="#i-arrow"/></svg></a>
</article>
