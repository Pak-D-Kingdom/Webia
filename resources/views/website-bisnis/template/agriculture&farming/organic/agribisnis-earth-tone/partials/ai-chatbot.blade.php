<section class="chat" id="agChat" role="dialog" aria-modal="false" aria-labelledby="agChatTitle" hidden>
    <header class="chat__head">
        <span class="chat__avatar"><img src="{{ $img }}/mascot-avatar.jpg" alt="" width="44" height="44"><i aria-hidden="true"></i></span>
        <div class="chat__who">
            <h2 id="agChatTitle">{{ $data['chatbot']['name'] }}</h2>
            <p>{{ $data['chatbot']['subtitle'] }}</p>
        </div>
        <button class="chat__icon-btn" type="button" id="agChatReset" aria-label="Mulai percakapan baru" title="Mulai ulang"><svg class="ico"><use href="#i-refresh"></use></svg></button>
        <button class="chat__icon-btn" type="button" id="agChatClose" aria-label="Tutup chat"><svg class="ico"><use href="#i-close"></use></svg></button>
    </header>

    <div class="chat__body" id="agChatBody" role="log" aria-live="polite" aria-relevant="additions"></div>

    <div class="chat__quick" id="agChatQuick" aria-label="Pertanyaan cepat">
        @foreach ($data['chatbot']['quick'] as $q)
            <button type="button" class="chip" data-chat-quick="{{ $q }}">{{ $q }}</button>
        @endforeach
    </div>

    <form class="chat__form" id="agChatForm" autocomplete="off">
        <label class="sr-only" for="agChatInput">Tulis pertanyaan Anda</label>
        <input type="text" id="agChatInput" placeholder="Tulis pertanyaan Anda..." maxlength="200">
        <button type="submit" aria-label="Kirim pertanyaan"><svg class="ico"><use href="#i-send"></use></svg></button>
    </form>
    <a class="chat__wa" href="{{ $u['whatsapp'] }}" target="_blank" rel="noopener"><svg class="ico"><use href="#i-whatsapp"></use></svg>Lebih suka bicara langsung? Chat via WhatsApp</a>
</section>
