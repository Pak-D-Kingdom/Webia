@php $c = $z['clients']; @endphp
<article class="ot-card" id="klien">
    <header class="ot-card__head">
        <div><h2>{{ $c['title'] }}</h2><p>{{ $c['subtitle'] }}</p></div>
    </header>
    <ul class="ot-clients">
        @foreach ($c['items'] as $i)
            <li><img src="{{ $img($i['logo']) }}" alt="{{ $i['name'] }}" loading="lazy" width="166" height="90"></li>
        @endforeach
    </ul>
</article>
