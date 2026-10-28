{{-- Panel chatbot FAQ destinasi & paket. Isi pesan dibuat oleh JS dari #ta-data --}}
<section class="ta-chat" id="ta-chat" role="dialog" aria-modal="false" aria-labelledby="ta-chat-title" data-ta-chat hidden>
    <header class="ta-chat__head">
        <span class="ta-chat__avatar" aria-hidden="true"><img src="{{ $img('mascot-ai.jpg') }}" alt="" width="48" height="48"></span>
        <div class="ta-chat__who">
            <h2 id="ta-chat-title">{{ $ta['chat']['title'] }}</h2>
            <p>{{ $ta['chat']['subtitle'] }}</p>
        </div>
        <button class="ta-chat__close" type="button" data-ta-chat-close aria-label="Tutup chat">{{ $icon('close') }}</button>
    </header>

    <div class="ta-chat__log" data-ta-chat-log role="log" aria-live="polite" tabindex="0"></div>
    <div class="ta-chat__quick" data-ta-chat-quick aria-label="Pertanyaan cepat"></div>

    <form class="ta-chat__form" data-ta-chat-form autocomplete="off">
        <label class="ta-sr" for="ta-chat-input">Pesan Anda</label>
        <input id="ta-chat-input" type="text" name="q" maxlength="200" placeholder="{{ $ta['chat']['placeholder'] }}" data-ta-chat-input>
        <button type="submit" aria-label="Kirim pesan">{{ $icon('send') }}</button>
    </form>
</section>
