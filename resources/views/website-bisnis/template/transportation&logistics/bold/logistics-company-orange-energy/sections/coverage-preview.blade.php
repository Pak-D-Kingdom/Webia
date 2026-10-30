@php $c = $site['coverage']; @endphp
<article class="lg-panel lg-cov">
    <h2 class="lg-panel__title"><a href="{{ $to('jangkauan') }}">{{ $c['title'] }}</a></h2>
    <p class="lg-panel__text">{{ $c['text'] }}</p>
    <a class="lg-cov__map" href="{{ $to('jangkauan') }}" aria-label="Lihat jangkauan layanan"><img src="{{ $img($c['image']) }}" alt="Peta jangkauan layanan Energi Cargo" loading="lazy"></a>
    <ul class="lg-stats">
        @foreach ($c['stats'] as $s)
            <li>
                <strong @if ($s['value']) data-count="{{ $s['value'] }}" data-suffix="{{ $s['suffix'] }}" @endif>{{ $s['display'] ?? ($s['value'].$s['suffix']) }}</strong>
                <span>{{ $s['label'] }}</span>
            </li>
        @endforeach
    </ul>
</article>
