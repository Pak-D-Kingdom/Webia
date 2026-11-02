<section class="card b-opt" aria-labelledby="pv-opt">
    <header class="card__head"><div><h2 id="pv-opt">Service Options</h2><p>Layanan tambahan untuk hasil yang lebih maksimal.</p></div>
        <a class="link" href="{{ $url('options') }}">Lihat Semua <svg class="ic"><use href="#i-arrow"/></svg></a></header>
    <ul class="tiles tiles--4">
        @foreach ($c['options'] as $o)
            <li><a class="tile tile--sm" href="{{ $url('options') }}">
                <span class="tile__ic"><svg class="ic"><use href="#i-{{ $o['icon'] }}"/></svg></span>
                <strong>{{ $o['name'] }}</strong><small>(+{{ $rp($o['price']) }})</small>
            </a></li>
        @endforeach
    </ul>
</section>
