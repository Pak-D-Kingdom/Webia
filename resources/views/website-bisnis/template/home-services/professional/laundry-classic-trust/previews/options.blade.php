<section class="card b-opt" aria-labelledby="pv-opt">
    <header class="card__head"><div><h2 id="pv-opt">Service Options</h2><p>Layanan tambahan untuk hasil yang lebih maksimal.</p></div></header>
    <ul class="tiles tiles--4">
        @foreach ($c['options'] as $o)
            <li><a class="tile" href="{{ $url('options') }}">
                <span class="bub bub--sm"><svg class="ic"><use href="#i-{{ $o['icon'] }}"/></svg></span>
                <strong>{{ $o['name'] }}</strong><small>(+{{ $rp($o['price']) }})</small>
            </a></li>
        @endforeach
    </ul>
</section>
