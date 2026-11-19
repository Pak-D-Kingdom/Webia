{{-- Preview Daftar Relawan --}}
<article class="fh-card fh-card--volunteer fh-reveal">
    <img class="fh-card__art fh-card__art--volunteer" src="{{ $img('volunteer-hands.jpg') }}" alt="Tangan para relawan bertumpuk menjadi satu" width="418" height="288" loading="lazy">
    <div class="fh-card__body">
        <header class="fh-card__head">
            <img class="fh-card__icon" src="{{ $img('icons/sec-relawan.png') }}" alt="" width="30" height="30">
            <h2>Daftar Relawan</h2>
        </header>
        <p class="fh-card__sub">{{ $cfg['volunteer']['text'] }}</p>
        <a class="fh-btn fh-btn--green fh-btn--sm" href="{{ $url('relawan') }}">Daftar Sekarang {{ $icon('arrow') }}</a>
    </div>
</article>
