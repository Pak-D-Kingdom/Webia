@php $p = $c['portfolio']; @endphp
<section id="portofolio" class="cp-card" aria-labelledby="cp-portfolio-t">
    <header class="cp-card__head">
        <div><h2 id="cp-portfolio-t">{{ $p['title'] }}</h2><p>{{ $p['desc'] }}</p></div>
        <a class="cp-more" href="#portofolio">{{ $p['more'] }} {{ $ic('arrow') }}</a>
    </header>
    <ul class="cp-thumbs">
        @foreach ($p['items'] as $i)
            <li>
                <div class="cp-thumb cp-ph"><img src="{{ $img($i['img']) }}" alt="{{ $i['t'] }}" loading="lazy" onerror="this.remove()"></div>
                <strong>{{ $i['t'] }}</strong><small>{{ $i['c'] }}</small>
            </li>
        @endforeach
    </ul>
</section>
