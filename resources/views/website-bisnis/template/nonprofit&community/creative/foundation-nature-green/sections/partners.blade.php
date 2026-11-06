{{-- Preview Mitra & Sponsor --}}
<article class="fh-card fh-card--partners fh-reveal">
    <header class="fh-card__head">
        <img class="fh-card__icon" src="{{ $img('icons/sec-mitra.png') }}" alt="" width="34" height="34">
        <h2>Mitra &amp; Sponsor</h2>
    </header>
    <p class="fh-card__sub">{{ $cfg['partners']['text'] }}</p>
    <ul class="fh-logos">
        @foreach ($cfg['partners']['list'] as $p)
            <li><a href="{{ $url('mitra') }}" aria-label="Mitra {{ $p['name'] }}"><img src="{{ $img($p['logo']) }}" alt="{{ $p['name'] }}" width="148" height="84" loading="lazy"></a></li>
        @endforeach
    </ul>
    <a class="fh-more fh-card__center" href="{{ $url('mitra') }}">Lihat Semua Mitra {{ $icon('arrow') }}</a>
</article>
