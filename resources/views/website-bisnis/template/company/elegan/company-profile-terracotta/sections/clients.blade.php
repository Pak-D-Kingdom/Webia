@php $p = $c['clients']; @endphp
<section id="klien" class="cp-card" aria-labelledby="cp-cli-t">
    <header class="cp-card__head">
        <div><h2 id="cp-cli-t">{{ $p['title'] }}</h2><p>{{ $p['desc'] }}</p></div>
        <a class="cp-more" href="#klien">{{ $p['more'] }} {{ $ic('arrow') }}</a>
    </header>
    <ul class="cp-clients">
        @foreach ($p['items'] as $n)
            <li>{{ $n }}</li>
        @endforeach
    </ul>
</section>
