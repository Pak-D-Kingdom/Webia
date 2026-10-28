{{-- Preview AI Chatbot (beranda): kartu asisten + pertanyaan cepat --}}
@php $byId = collect($ta['faqs'])->keyBy('id'); @endphp
<aside class="ta-aip" aria-labelledby="ta-aip-title">
    <img class="ta-aip__mascot" src="{{ $img('mascot-ai.jpg') }}" alt="Maskot robot AI Travel Assistant" loading="lazy">
    <div class="ta-aip__card">
        <header>
            <span class="ta-aip__logo" aria-hidden="true">{{ $icon('sparkle') }}</span>
            <div>
                <h2 id="ta-aip-title">{{ $ta['chat']['title'] }}</h2>
                <p>{{ $ta['chat']['subtitle'] }}</p>
            </div>
        </header>
        <ul class="ta-aip__list">
            @foreach ($ta['chat']['quick'] as $id)
                <li>
                    <button type="button" data-ta-chat-ask="{{ $id }}">
                        {{ $icon('check') }}<span>{{ $byId[$id]['q'] }}</span>{{ $icon('right') }}
                    </button>
                </li>
            @endforeach
        </ul>
        <button class="ta-aip__input" type="button" data-ta-chat-open>
            <span>{{ $ta['chat']['placeholder'] }}</span><span class="ta-aip__send">{{ $icon('send') }}</span>
        </button>
    </div>
</aside>
