@php $c = $site['clients']; @endphp
<article class="lg-clients">
    <h2 class="lg-panel__title"><a href="{{ $to('klien-korporat') }}">{{ $c['title'] }}</a></h2>
    <p class="lg-panel__text">{{ $c['text'] }}</p>
    <ul class="lg-clients__grid">
        @foreach ($c['items'] as $client)
            <li><a href="{{ $to('klien-korporat') }}" title="{{ $client['name'] }}"><img src="{{ $img($client['logo']) }}" alt="{{ $client['name'] }}" loading="lazy"></a></li>
        @endforeach
    </ul>
</article>
