<article class="card card--certs" id="sertifikasi">
    <header class="card__head">
        <h2 class="card__title"><a href="{{ route('agribisnis.sertifikasi') }}">{{ $cfg['certs']['title'] }}</a></h2>
        <p class="card__sub">{{ $cfg['certs']['sub'] }}</p>
    </header>
    <ul class="certs">
        @foreach($cfg['certs']['items'] as $c)
            <li><a href="{{ route('agribisnis.sertifikasi') }}" title="{{ $c['name'] }}"><img src="{{ asset($cfg['img'][$c['img']]) }}" alt="{{ $c['name'] }}" loading="lazy" width="120" height="80"></a></li>
        @endforeach
    </ul>
</article>
