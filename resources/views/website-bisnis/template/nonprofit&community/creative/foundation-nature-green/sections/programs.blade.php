{{-- Preview Program Kami --}}
<article class="fh-card fh-card--programs fh-reveal">
    <header class="fh-card__head fh-card__head--split">
        <div class="fh-card__headleft">
            <img class="fh-card__icon" src="{{ $img('icons/sec-program.png') }}" alt="" width="30" height="30">
            <h2>Program Kami</h2>
        </div>
        <a class="fh-more" href="{{ $url('program') }}">Lihat Semua {{ $icon('arrow') }}</a>
    </header>
    <p class="fh-card__sub">Berbagai program untuk mewujudkan perubahan.</p>
    <ul class="fh-pgrid">
        @foreach ($cfg['programs'] as $p)
            <li>
                <a class="fh-ptile" href="{{ $url('program') }}#{{ $p['key'] }}">
                    <img src="{{ $img($p['icon']) }}" alt="" width="44" height="44" loading="lazy">
                    <span class="fh-ptile__txt">
                        <strong>{{ $p['title'] }}</strong>
                        <small>{{ $p['stat'] }} {{ $p['stat_label'] }}</small>
                    </span>
                </a>
            </li>
        @endforeach
    </ul>
</article>
