{{-- Jendela chat Nusa AI (dipakai di panel melayang & halaman AI Chatbot).
     Parameter: $chatClosable (bool) --}}
<div class="chat" data-chat>
    <header class="chat__head">
        <span class="chat__avatar"><img src="{{ $img('nusa-ai-avatar.png') }}" alt="" width="46" height="46"></span>
        <div class="chat__who">
            <strong>{{ $c['chatbot']['name'] }}</strong>
            <span class="chat__status"><i aria-hidden="true"></i>{{ $c['chatbot']['status'] }}</span>
        </div>
        @if ($chatClosable)
            <button type="button" class="chat__close" data-chat-close aria-label="Tutup chat">
                <svg class="ic" aria-hidden="true"><use href="#i-close"/></svg>
            </button>
        @endif
    </header>
    <div class="chat__body" data-chat-log role="log" aria-live="polite" aria-relevant="additions"></div>
    <div class="chat__chips" data-chat-chips></div>
    <form class="chat__form" data-chat-form autocomplete="off">
        <label class="sr-only" for="chat-input-{{ $chatClosable ? 'panel' : 'page' }}">Pertanyaan Anda</label>
        <input id="chat-input-{{ $chatClosable ? 'panel' : 'page' }}" type="text" data-chat-input maxlength="240" placeholder="{{ $c['chatbot']['placeholder'] }}">
        <button type="submit" class="chat__send" aria-label="Kirim pertanyaan">
            <svg class="ic" aria-hidden="true"><use href="#i-send"/></svg>
        </button>
    </form>
    <p class="chat__note">{{ $c['chatbot']['disclaimer'] }}</p>
</div>
