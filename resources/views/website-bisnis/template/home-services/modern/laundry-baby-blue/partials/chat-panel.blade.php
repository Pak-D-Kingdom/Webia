{{-- $embed = true → panel tampil inline (halaman AI Chatbot); false → jendela melayang --}}
<section class="lb-chat {{ $embed ? 'lb-chat--embed' : '' }}" @unless($embed) id="lbChat" hidden @endunless
         data-lb-chat @if($embed) data-lb-chat-embed @endif role="{{ $embed ? 'region' : 'dialog' }}" aria-label="{{ $laundry['chatbot']['name'] }}">
    <header class="lb-chat__head">
        <span class="lb-chat__avatar"><img src="{{ asset($laundry['assets']['img'] . '/ai-robot-head.png') }}" alt="" width="44" height="27"></span>
        <div class="lb-chat__title">
            <strong>{{ $laundry['chatbot']['name'] }}</strong>
            <span class="lb-chat__status"><i aria-hidden="true"></i>Online · siap membantu</span>
        </div>
        @unless ($embed)
            <button class="lb-chat__icon-btn" type="button" data-lb-chat-close aria-label="Tutup AI Chat"><svg class="lb-i" aria-hidden="true"><use href="#i-minus"/></svg></button>
        @endunless
    </header>
    <div class="lb-chat__body" data-lb-chat-log aria-live="polite" tabindex="0"></div>
    <div class="lb-chat__chips" data-lb-chat-chips aria-label="Pertanyaan cepat"></div>
    <form class="lb-chat__form" data-lb-chat-form autocomplete="off">
        <label class="lb-sr" for="lbChatInput{{ $embed ? 'Embed' : '' }}">Tulis pertanyaan Anda</label>
        <input id="lbChatInput{{ $embed ? 'Embed' : '' }}" name="q" type="text" maxlength="200" placeholder="Tulis pertanyaan Anda..." enterkeyhint="send">
        <button type="submit" aria-label="Kirim pertanyaan"><svg class="lb-i" aria-hidden="true"><use href="#i-send"/></svg></button>
    </form>
</section>
