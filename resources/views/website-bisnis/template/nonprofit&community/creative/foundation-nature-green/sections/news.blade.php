{{-- Preview Berita & Acara (3 berita terbaru dari config) --}}
<article class="fh-card fh-card--news fh-reveal">
    <header class="fh-card__head fh-card__head--split">
        <div class="fh-card__headleft">
            <img class="fh-card__icon" src="{{ $img('icons/sec-news.png') }}" alt="" width="30" height="30">
            <div>
                <h2>Berita &amp; Acara</h2>
                <p class="fh-card__sub fh-card__sub--tight">{{ $cfg['news']['text'] }}</p>
            </div>
        </div>
        <a class="fh-more" href="{{ $url('berita') }}">Lihat Semua {{ $icon('arrow') }}</a>
    </header>
    <ul class="fh-minis">
        @foreach (array_slice($cfg['news']['items'], 0, 3) as $n)
            <li>
                <a class="fh-mini" href="{{ $url('berita') }}#{{ $n['id'] }}">
                    <img src="{{ $img($n['image']) }}" alt="" width="528" height="138" loading="lazy">
                    <time>{{ $n['date'] }}</time>
                    <strong>{{ $n['title'] }}</strong>
                </a>
            </li>
        @endforeach
    </ul>
</article>
