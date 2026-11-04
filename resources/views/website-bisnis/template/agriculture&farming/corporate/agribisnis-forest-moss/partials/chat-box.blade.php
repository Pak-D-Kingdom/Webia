{{-- Kotak percakapan AI (FAQ komoditas & kemitraan). Dipakai di panel melayang dan halaman AI Assistant. --}}
<div class="chatbox" data-chat data-wa="{{ $cfg['site']['whatsapp'] }}">
    <div class="chatbox__log" data-chat-log role="log" aria-live="polite">
        <div class="msg msg--bot">
            <img class="msg__av" src="{{ asset($cfg['img']['bot']) }}" alt="" width="32" height="32">
            <div class="msg__bub">{{ $cfg['chatbot']['welcome'] }}</div>
        </div>
    </div>
    <div class="chatbox__chips" data-chat-chips>
        @foreach($cfg['chatbot']['faqs'] as $faq)
            <button class="chip" type="button" data-chat-q="{{ $faq['q'] }}">{{ $faq['q'] }}</button>
        @endforeach
    </div>
    <form class="chatbox__form" data-chat-form autocomplete="off">
        <label class="sr-only" for="chatInput{{ $suffix }}">Tulis pertanyaan</label>
        <input id="chatInput{{ $suffix }}" type="text" name="q" placeholder="Tulis pertanyaan Anda…" maxlength="200" data-chat-input>
        <button class="chatbox__send" type="submit" aria-label="Kirim pertanyaan"><svg class="ic" aria-hidden="true"><use href="#i-send"/></svg></button>
    </form>
    <script type="application/json" data-chat-data>{!! json_encode(['faqs' => $cfg['chatbot']['faqs'], 'fallback' => $cfg['chatbot']['fallback'], 'avatar' => asset($cfg['img']['bot'])], JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP) !!}</script>
</div>
