<section class="uh-cpanel" id="uh-cpanel" data-uh-cpanel role="dialog" aria-label="AI Assistant Muthawwif" hidden>
    <header class="uh-chatwin__head">
        <span class="uh-chatwin__avatar"><img src="{{ $img('maskot-robot.png') }}" alt="" width="46" height="42"></span>
        <div class="uh-chatwin__who">
            <strong>Muthawwif AI</strong>
            <span class="uh-chatwin__status"><i aria-hidden="true"></i>Online · FAQ paket &amp; pendaftaran</span>
        </div>
        <a class="uh-cpanel__btn" href="{{ $url('chatbot') }}" aria-label="Buka halaman AI Assistant" title="Buka halaman penuh">
            <svg class="uh-i" aria-hidden="true"><use href="#i-arrow-right"/></svg>
        </a>
        <button type="button" class="uh-cpanel__btn" data-uh-cpanel-close aria-label="Tutup chat">
            <svg class="uh-i" aria-hidden="true"><use href="#i-x"/></svg>
        </button>
    </header>

    <div class="uh-chatwin__log" data-uh-chat-log role="log" aria-live="polite" aria-label="Percakapan dengan AI Assistant"></div>

    <div class="uh-chatwin__chips" data-uh-chat-chips aria-label="Pertanyaan cepat">
        @foreach ($uh['ai']['items'] as $it)
            <button type="button" class="uh-chip uh-chip--sm" data-q="{{ $it['q'] }}">{{ $it['label'] }}</button>
        @endforeach
    </div>

    <form class="uh-chatwin__form" data-uh-chat-form autocomplete="off">
        <label class="uh-sr" for="uh-cpanel-input">Tulis pertanyaan Anda</label>
        <input id="uh-cpanel-input" class="uh-chatwin__input" type="text" name="q" maxlength="200" placeholder="Tulis pertanyaan Anda…" data-uh-chat-input>
        <button type="submit" class="uh-chatwin__send" aria-label="Kirim pertanyaan">
            <svg class="uh-i" aria-hidden="true"><use href="#i-send"/></svg>
        </button>
    </form>
</section>
