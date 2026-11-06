{{-- Preview Opsi Donasi --}}
<article class="fh-card fh-card--donation fh-reveal">
    <header class="fh-card__head">
        <img class="fh-card__icon" src="{{ $img('icons/sec-donasi.png') }}" alt="" width="34" height="34">
        <h2>Opsi Donasi</h2>
    </header>
    <p class="fh-card__sub">{{ $cfg['donation']['text'] }}</p>
    <ul class="fh-tiles fh-tiles--4 fh-tiles--don">
        @foreach ($cfg['donation']['options'] as $o)
            <li>
                <a class="fh-tile fh-tile--sm" href="{{ $url('donasi') }}#{{ $o['key'] }}">
                    <img src="{{ $img($o['icon']) }}" alt="" width="30" height="30" loading="lazy">
                    <span>{{ $o['label'] }}@if ($o['note'])<small>{{ $o['note'] }}</small>@endif</span>
                </a>
            </li>
        @endforeach
    </ul>
    <a class="fh-btn fh-btn--green fh-btn--sm fh-card__center" href="{{ $url('donasi') }}">Donasi Sekarang {{ $icon('arrow') }}</a>
</article>
