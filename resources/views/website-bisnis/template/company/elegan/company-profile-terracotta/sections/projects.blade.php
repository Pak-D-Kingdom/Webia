@php $p = $c['projects']; @endphp
<section id="proyek" class="cp-card" aria-labelledby="cp-projects-t">
    <header class="cp-card__head">
        <div><h2 id="cp-projects-t">{{ $p['title'] }}</h2><p>{{ $p['desc'] }}</p></div>
        <a class="cp-more" href="#proyek">{{ $p['more'] }} {{ $ic('arrow') }}</a>
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
