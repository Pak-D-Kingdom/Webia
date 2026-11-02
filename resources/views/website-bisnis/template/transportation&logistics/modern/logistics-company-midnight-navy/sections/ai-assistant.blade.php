@php
    $ai   = $site['ai'];
    $rp   = $site['route_prefix'];
    $img  = fn ($f) => asset($site['paths']['images'] . $f);
@endphp
<div class="lc-ai">
    <div class="lc-ai__bot">
        <img class="lc-ai__robot" src="{{ $img('ai-robot.png') }}" alt="" loading="lazy" width="675" height="348">
        <div class="lc-ai__bubble">
            <p>{{ $ai['bubble'] }}</p>
            <button class="lc-btn lc-btn--navy lc-btn--sm" type="button" data-lc-chat-open data-lc-chat-page="{{ route($rp . 'chatbot') }}">{{ $ai['button'] }}
                <svg class="lc-ico" aria-hidden="true"><use href="#lc-i-arrow"></use></svg>
            </button>
        </div>
    </div>

    <div class="lc-ai__copy">
        <h2 class="lc-ai__title"><a href="{{ route($rp . 'chatbot') }}">{{ $ai['title'] }}</a></h2>
        <p>{{ $ai['subtitle'] }}</p>
    </div>

    <ul class="lc-ai__faq" aria-label="Pertanyaan populer">
        @foreach ($ai['quick'] as $idx)
            <li>
                <a href="{{ route($rp . 'chatbot') }}">
                    <span class="lc-ai__faq-ico" aria-hidden="true"><svg class="lc-ico"><use href="#lc-i-chat"></use></svg></span>
                    {{ $ai['faq'][$idx]['q'] }}
                </a>
            </li>
        @endforeach
    </ul>

    <img class="lc-ai__courier" src="{{ $img('ai-courier.png') }}" alt="" loading="lazy" width="1098" height="348">
</div>
