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
    <ul class="fh-tiles fh-tiles--4">
        @foreach ($cfg['programs'] as $p)
            <li>
                <a class="fh-tile" href="{{ $url('program') }}#{{ $p['key'] }}">
                    <img src="{{ $img($p['icon']) }}" alt="" width="48" height="48" loading="lazy">
                    <span>{{ $p['short'][0] }}<br>{{ $p['short'][1] }}</span>
                </a>
            </li>
        @endforeach
    </ul>
</article>
