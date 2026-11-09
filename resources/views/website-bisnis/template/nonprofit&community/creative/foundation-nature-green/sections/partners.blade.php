{{-- Preview Mitra & Sponsor --}}
<article class="fh-card fh-card--partners fh-reveal">
    <header class="fh-card__head">
        <img class="fh-card__icon" src="{{ $img('icons/sec-mitra.png') }}" alt="" width="34" height="34">
        <h2>Mitra &amp; Sponsor</h2>
    </header>
    <p class="fh-card__sub">{{ $cfg['partners']['text'] }}</p>
    <ul class="fh-lgrid">
        @foreach ($cfg['partners']['list'] as $p)
            <li>
                <a class="fh-ltile" href="{{ $url('mitra') }}" title="{{ $p['name'] }} · {{ $p['field'] }}" aria-label="Mitra {{ $p['name'] }}">
                    <img src="{{ $img($p['logo']) }}" alt="{{ $p['name'] }}" width="148" height="84" loading="lazy">
                </a>
            </li>
        @endforeach
        <li>
            <a class="fh-ltile fh-ltile--more" href="{{ $url('mitra') }}">
                <span class="fh-ltile__go">{{ $icon('arrow') }}</span>
                <span>Lihat Semua Mitra</span>
            </a>
        </li>
    </ul>
</article>
