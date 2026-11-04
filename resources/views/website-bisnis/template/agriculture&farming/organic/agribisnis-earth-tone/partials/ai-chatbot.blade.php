<section class="ag-chat" id="agChat" role="dialog" aria-modal="false" aria-labelledby="agChatTitle" hidden>
    <header class="ag-chat__head">
        <span class="ag-chat__avatar"><img src="{{ $img }}/mascot-avatar.jpg" alt="" width="44" height="44"></span>
        <div class="ag-chat__who">
            <h2 id="agChatTitle">{{ $data['chatbot']['name'] }}</h2>
            <p><i aria-hidden="true"></i>{{ $data['chatbot']['subtitle'] }}</p>
        </div>
        <button class="ag-chat__close" type="button" id="agChatClose" aria-label="Tutup chat"><svg class="ico"><use href="#i-close"></use></svg></button>
    </header>

    <div class="ag-chat__body" id="agChatBody" role="log" aria-live="polite" aria-relevant="additions"></div>

    <div class="ag-chat__quick" id="agChatQuick">
        @foreach ($data['chatbot']['quick'] as $q)
            <button type="button" class="chip" data-chat-quick="{{ $q }}">{{ $q }}</button>
        @endforeach
    </div>

    <form class="ag-chat__form" id="agChatForm" autocomplete="off">
        <label class="sr-only" for="agChatInput">Tulis pertanyaan Anda</label>
        <input type="text" id="agChatInput" placeholder="Tulis pertanyaan Anda..." maxlength="200">
        <button type="submit" aria-label="Kirim pertanyaan"><svg class="ico"><use href="#i-send"></use></svg></button>
    </form>
</section>
