<aside class="uh-ai" aria-labelledby="uh-ai-title">
    <img class="uh-ai__robot" src="{{ $img('maskot-robot.png') }}" alt="" width="150" height="138" loading="lazy">
    <div class="uh-ai__frame">
        <div class="uh-ai__head">
            <span class="uh-ai__emblem"><img src="{{ $img('logo-emblem-gelap.jpg') }}" alt="" width="28" height="30"></span>
            <h2 id="uh-ai-title" class="uh-ai__title">{{ $uh['ai']['title'] }}</h2>
        </div>
        <p class="uh-ai__text">{{ $uh['ai']['text'] }}</p>
        <ul class="uh-ai__list">
            @foreach ($uh['ai']['items'] as $it)
                <li>
                    <a href="{{ $url('chatbot') }}?q={{ rawurlencode($it['q']) }}">
                        <span class="uh-ai__ico"><svg class="uh-i" aria-hidden="true"><use href="#i-{{ $it['icon'] }}"/></svg></span>
                        <span class="uh-ai__lbl">{{ $it['label'] }}</span>
                        <svg class="uh-i uh-ai__chev" aria-hidden="true"><use href="#i-chevron-right"/></svg>
                    </a>
                </li>
            @endforeach
        </ul>
        <a class="uh-ai__cta" href="{{ $url('chatbot') }}">
            <span>{{ $uh['ai']['button'] }}</span>
            <svg class="uh-i" aria-hidden="true"><use href="#i-arrow-right"/></svg>
        </a>
    </div>
</aside>
