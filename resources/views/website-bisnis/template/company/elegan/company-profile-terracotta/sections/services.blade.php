@php $s = $c['services']; @endphp
<section id="layanan" aria-labelledby="cp-svc-t">
    <header class="cp-card__head">
        <div>
            <p class="cp-label">{{ $s['eyebrow'] }}</p>
            <h2 id="cp-svc-t" class="cp-h2 cp-h2--sm">{{ $s['title'] }}</h2>
        </div>
        <a class="cp-more" href="#layanan">{{ $s['more'] }} {{ $ic('arrow') }}</a>
    </header>
    <ul class="cp-svc">
        @foreach ($s['items'] as $i)
            <li>
                <span class="cp-ico">{{ $ic($i['i']) }}</span>
                <div><h3>{{ $i['t'] }}</h3><p>{{ $i['d'] }}</p></div>
            </li>
        @endforeach
    </ul>
</section>
