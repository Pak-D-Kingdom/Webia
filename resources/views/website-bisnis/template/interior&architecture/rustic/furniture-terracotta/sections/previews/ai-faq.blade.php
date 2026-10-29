@php $bot = $f['faq']['bot']; @endphp
<aside class="rf-botpanel" aria-label="Tanya {{ $bot['name'] }}, asisten AI">
    <svg class="rf-botpanel__leaf" viewBox="0 0 120 160" aria-hidden="true"><path d="M60 150C20 120 10 70 55 10c45 55 35 110 5 140zM60 150V40M60 100l-22-24M60 80l20-20M60 122l-18-16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>

    <header class="rf-botpanel__head">
        <span class="rf-botpanel__avatar"><img src="{{ $img($bot['avatar']) }}" alt="Rudi, maskot asisten AI RusticFurni" width="70" height="70" loading="lazy"></span>
        <div class="rf-botpanel__who"><strong>Tanya {{ $bot['name'] }}</strong><span>Asisten AI · Online</span></div>
        <p class="rf-script" aria-hidden="true">{{ $bot['tip'] }}</p>
    </header>

    <p class="rf-bubble">{{ $bot['greeting'] }}</p>

    <p class="rf-botpanel__label" id="rf-bot-chips-label">Pertanyaan populer</p>
    <ul class="rf-botpanel__chips" aria-labelledby="rf-bot-chips-label">
        @foreach ($bot['chips'] as $chip)
            <li>
                <button type="button" data-rf-chat-open data-rf-chat-q="{{ $chip }}">
                    {!! $icon('chat') !!}<span>{{ $chip }}</span>{!! $icon('chevron-right') !!}
                </button>
            </li>
        @endforeach
    </ul>

    <form class="rf-botpanel__form" data-rf-chat-inline autocomplete="off">
        <label class="rf-sr" for="rf-bot-inline">Pertanyaan Anda</label>
        <input id="rf-bot-inline" type="text" name="q" placeholder="{{ $bot['placeholder'] }}" maxlength="200" required>
        <button type="submit" class="rf-roundarrow" aria-label="Kirim pertanyaan">{!! $icon('send') !!}</button>
    </form>

    <p class="rf-script rf-botpanel__sign" aria-hidden="true">Your Dream Furniture<br>Our Craft</p>
</aside>
