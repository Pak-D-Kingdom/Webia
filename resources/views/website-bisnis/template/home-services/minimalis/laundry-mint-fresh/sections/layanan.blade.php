<article class="lw-card lw-card--services">
    <header class="lw-card__head">
        <h2 class="lw-card__title"><a href="{{ $r('layanan') }}">{{ $c['services']['title'] }}</a></h2>
        <p>{{ $c['services']['sub'] }}</p>
    </header>
    <ul class="lw-svc-grid">
        @foreach ($c['services']['items'] as $s)
            <li>
                <a class="lw-svc" href="{{ $r('layanan') }}#{{ $s['key'] }}">
                    <span class="lw-ico"><svg class="lw-i"><use href="#i-{{ $s['icon'] }}"/></svg></span>
                    <strong>{{ $s['name'] }}</strong>
                    <small>{{ $s['tag'] }}</small>
                    <em class="lw-svc__from"><span>mulai</span>{{ str_replace('.000', 'rb', explode(' / ', $s['from'])[0]) }}</em>
                </a>
            </li>
        @endforeach
    </ul>
    <a class="lw-btn lw-btn--sm" href="{{ $r('layanan') }}">Lihat Semua Layanan <svg class="lw-i"><use href="#i-arrow"/></svg></a>
</article>
