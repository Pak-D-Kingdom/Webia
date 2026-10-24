@php $p = $z['projects']; @endphp
<article class="ot-card" id="proyek" data-carousel>
    <header class="ot-card__head">
        <div><h2>{{ $p['title'] }}</h2><p>{{ $p['subtitle'] }}</p></div>
    </header>
    <div class="ot-carousel">
        <ul class="ot-thumbs" data-track>
            @foreach ($p['items'] as $i)
                <li class="ot-thumb">
                    <div class="ot-thumb__img">
                        <img src="{{ $img($i['image']) }}" alt="" loading="lazy" width="200" height="128">
                        <span class="ot-badge ot-badge--{{ $i['state'] }}">{{ $i['status'] }}</span>
                    </div>
                    <strong>{{ $i['title'] }}</strong><small>{{ $i['category'] }}</small>
                </li>
            @endforeach
        </ul>
    </div>
</article>
