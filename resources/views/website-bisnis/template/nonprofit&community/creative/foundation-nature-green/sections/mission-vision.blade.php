{{-- Preview Misi & Visi --}}
<article class="fh-card fh-card--mission fh-reveal">
    <img class="fh-card__art fh-card__art--mission" src="{{ $img('mission-globe.png') }}" alt="Dua tangan menopang bumi hijau" width="462" height="384" loading="lazy">
    <div class="fh-card__body">
        <header class="fh-card__head">
            <img class="fh-card__icon" src="{{ $img('icons/sec-mission.png') }}" alt="" width="34" height="34">
            <h2>Misi &amp; Visi Kami</h2>
        </header>
        <h3 class="fh-card__lead">{{ $cfg['mission']['heading'] }}</h3>
        <p>{{ $cfg['mission']['text'] }}</p>
        <a class="fh-btn fh-btn--dark fh-btn--sm" href="{{ $url('tentang-kami') }}">Tentang Kami {{ $icon('arrow') }}</a>
    </div>
</article>
