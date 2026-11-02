<section class="card b-ins" aria-labelledby="pv-ins">
    <img class="ins__leaf" src="{{ $img('leaf.svg') }}" alt="" aria-hidden="true" loading="lazy">
    <header class="card__head"><div><h2 id="pv-ins">Cara Pemesanan</h2><p>Mudah, cepat, dan praktis!</p></div></header>
    <ol class="steps--row">
        @foreach ($c['steps'] as $i => $s)
            <li>
                <span class="steps__ic"><svg class="ic"><use href="#i-{{ $s['icon'] }}"/></svg></span>
                <strong>{{ $i + 1 }}. {{ $s['title'] }}</strong>
                <p>{{ $s['text'] }}</p>
            </li>
        @endforeach
    </ol>
</section>
