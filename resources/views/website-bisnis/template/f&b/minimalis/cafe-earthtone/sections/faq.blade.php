<section id="faq" class="panel chat" aria-labelledby="t-faq">
    <h2 id="t-faq"><svg class="i" aria-hidden="true"><use href="#i-bot"/></svg> Tanya AI</h2>
    {{-- Backend/AI: ganti fungsi reply() di public/js/.../cafe.js dengan panggilan API chatbot. --}}
    <div id="chatLog" class="chat__log" role="log" aria-live="polite">
        <div class="msg-row"><span class="bot"><svg class="i" aria-hidden="true"><use href="#i-bot"/></svg></span>
            <div class="msg">Halo! 👋 Saya {{ config('cafe.name') }} Assistant. Ada yang bisa saya bantu?</div></div>
    </div>
    <div class="chips">
        @foreach (config('cafe.faq_chips') as $key => $label)
            <button type="button" class="chip" data-q="{{ $key }}">{{ $label }}</button>
        @endforeach
    </div>
    <form id="chatForm">
        <label class="sr" for="q">Pertanyaan</label>
        <input id="q" name="q" type="text" placeholder="Tulis pertanyaan..." autocomplete="off">
        <button class="send" type="submit" aria-label="Kirim"><svg class="i" aria-hidden="true"><use href="#i-send"/></svg></button>
    </form>
</section>
