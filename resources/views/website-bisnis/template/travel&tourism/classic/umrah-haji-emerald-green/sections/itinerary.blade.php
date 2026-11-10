<section class="uh-card uh-it" aria-labelledby="uh-it-title">
    <figure class="uh-it__media">
        <img src="{{ $img($uh['itinerary']['image']) }}" alt="Masjid dan menara di tengah kota" width="130" height="102" loading="lazy">
    </figure>
    <div class="uh-it__body">
        <header class="uh-card__head">
            <h2 id="uh-it-title" class="uh-card__title">{{ $uh['itinerary']['title'] }}</h2>
        <a class="uh-card__link" href="{{ $url('itinerary') }}"><span>{{ $uh['itinerary']['button'] }}</span><svg class="uh-i" aria-hidden="true"><use href="#i-arrow-right"/></svg></a>
        <p class="uh-card__sub">{{ $uh['itinerary']['text'] }}</p>
        </header>
        <ol class="uh-it__steps">
            @foreach ($uh['itinerary']['steps'] as $s)
                <li>
                    <span class="uh-it__dot"><svg class="uh-i" aria-hidden="true"><use href="#i-{{ $s['icon'] }}"/></svg></span>
                    <span class="uh-it__day">{{ $s['day'] }}</span>
                    <span class="uh-it__lbl">{{ $s['label'] }}</span>
                </li>
            @endforeach
        </ol>
    </div>
</section>
