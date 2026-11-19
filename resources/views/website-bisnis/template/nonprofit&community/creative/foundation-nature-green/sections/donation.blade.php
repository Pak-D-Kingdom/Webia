{{-- Preview Opsi Donasi --}}
<article class="fh-card fh-card--donation fh-reveal">
    <header class="fh-card__head">
        <img class="fh-card__icon" src="{{ $img('icons/sec-donasi.png') }}" alt="" width="34" height="34">
        <h2>Opsi Donasi</h2>
    </header>
    <p class="fh-card__sub">{{ $cfg['donation']['text'] }}</p>
    <ul class="fh-dgrid">
        @foreach ($cfg['donation']['options'] as $o)
            <li>
                <a class="fh-dtile" href="{{ $url('donasi') }}#{{ $o['key'] }}">
                    <img src="{{ $img($o['icon']) }}" alt="" width="32" height="32" loading="lazy">
                    <span class="fh-dtile__txt">
                        <strong>{{ $o['label'] }}</strong>
                        <small>{{ $o['hint'] }}</small>
                    </span>
                </a>
            </li>
        @endforeach
    </ul>
    <a class="fh-btn fh-btn--green fh-btn--sm fh-btn--block" href="{{ $url('donasi') }}">Donasi Sekarang {{ $icon('arrow') }}</a>
</article>
