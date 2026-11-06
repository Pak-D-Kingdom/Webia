{{-- Preview Dampak Kami --}}
<article class="fh-card fh-card--impact fh-reveal">
    <img class="fh-card__art fh-card__art--sapling" src="{{ $img('impact-sapling.png') }}" alt="" aria-hidden="true" width="156" height="228" loading="lazy">
    <img class="fh-card__art fh-card__art--hands" src="{{ $img('impact-hands.png') }}" alt="Tangan memegang tanah dengan tunas tanaman" width="600" height="180" loading="lazy">
    <div class="fh-card__body">
        <header class="fh-card__head">
            <img class="fh-card__icon" src="{{ $img('icons/sec-impact.png') }}" alt="" width="30" height="30">
            <h2>Dampak Kami</h2>
        </header>
        <p class="fh-card__sub">{{ $cfg['impact']['text'] }}</p>
        <ul class="fh-stats">
            @foreach ($cfg['impact']['stats'] as $s)
                <li>
                    <img src="{{ $img($s['icon']) }}" alt="" width="44" height="40" loading="lazy">
                    <strong data-fh-count="{{ $s['value'] >= 1000 ? $s['value'] / 1000 : $s['value'] }}" data-fh-suffix="{{ $s['suffix'] }}">{{ $s['display'] }}</strong>
                    <span>{{ $s['label'] }}</span>
                </li>
            @endforeach
        </ul>
        <a class="fh-btn fh-btn--dark fh-btn--sm" href="{{ $url('dampak') }}">Lihat Laporan Dampak {{ $icon('arrow') }}</a>
    </div>
</article>
