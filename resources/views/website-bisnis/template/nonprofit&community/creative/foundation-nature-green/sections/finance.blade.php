{{-- Preview Transparansi Keuangan --}}
<article class="fh-card fh-card--finance fh-reveal">
    <img class="fh-card__art fh-card__art--finance" src="{{ $img('finance.png') }}" alt="Dokumen laporan keuangan dengan kaca pembesar" width="328" height="248" loading="lazy">
    <div class="fh-card__body">
        <header class="fh-card__head">
            <img class="fh-card__icon fh-card__icon--raw" src="{{ $img('icons/sec-finance.png') }}" alt="" width="34" height="34">
            <h2>Transparansi Keuangan</h2>
        </header>
        <p class="fh-card__sub">{{ $cfg['finance']['text'] }}</p>
        <a class="fh-btn fh-btn--lime fh-btn--sm" href="{{ $url('transparansi') }}">Lihat Laporan Keuangan {{ $icon('arrow') }}</a>
    </div>
</article>
