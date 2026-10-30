<section class="card b-ins" aria-labelledby="pv-ins">
    <header class="card__head"><div><h2 id="pv-ins">Cara Pemesanan</h2><p>Mudah, cepat, dan praktis!</p></div>
        <a class="link" href="{{ $url('instructions') }}">Lihat Detail <svg class="ic"><use href="#i-arrow"/></svg></a></header>
    <ol class="steps steps--row">
        @foreach ($c['steps'] as $i => $s)
            <li>
                <span class="steps__ic"><svg class="ic"><use href="#i-{{ $s['icon'] }}"/></svg></span>
                <strong>{{ $i + 1 }}. {{ $s['title'] }}</strong>
                <p>{{ $s['text'] }}</p>
            </li>
        @endforeach
    </ol>
</section>
