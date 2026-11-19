<section class="uh-cpanel" id="uh-cpanel" data-uh-cpanel role="dialog" aria-label="AI Assistant Muthawwif" hidden>
    <header class="uh-cpanel__head">
        <span class="uh-cpanel__avatar">
            <img src="{{ $img('maskot-robot.png') }}" alt="" width="52" height="48">
            <i class="uh-cpanel__live" aria-hidden="true"></i>
        </span>
        <div class="uh-cpanel__who">
            <strong>Muthawwif AI</strong>
            <span>Online · FAQ paket &amp; pendaftaran</span>
        </div>
        <div class="uh-cpanel__tools">
            <button type="button" data-uh-chat-reset aria-label="Mulai percakapan baru" title="Percakapan baru"><svg class="uh-i" aria-hidden="true"><use href="#i-refresh"/></svg></button>
            <a href="{{ $url('chatbot') }}" aria-label="Buka halaman AI Assistant" title="Buka halaman penuh"><svg class="uh-i" aria-hidden="true"><use href="#i-expand"/></svg></a>
            <button type="button" data-uh-cpanel-close aria-label="Tutup chat" title="Tutup"><svg class="uh-i" aria-hidden="true"><use href="#i-x"/></svg></button>
        </div>
    </header>

    <div class="uh-cpanel__scroll" data-uh-chat-scroll>
        <div class="uh-cpanel__welcome" data-uh-chat-welcome>
            <img class="uh-cpanel__robot" src="{{ $img('maskot-robot.png') }}" alt="" width="118" height="108">
            <p class="uh-cpanel__hello">Assalamu’alaikum!</p>
            <p class="uh-cpanel__intro">Saya Muthawwif AI. Pilih topik di bawah atau ketik pertanyaan Anda tentang paket, harga, jadwal, dan pendaftaran.</p>
            <div class="uh-cpanel__topics">
                @foreach ($uh['ai']['items'] as $n => $it)
                    <button type="button" class="uh-cpanel__topic" data-q="{{ $it['q'] }}" style="--i: {{ $n }}">
                        <span class="uh-cpanel__tico"><svg class="uh-i" aria-hidden="true"><use href="#i-{{ $it['icon'] }}"/></svg></span>
                        <span>{{ $it['label'] }}</span>
                    </button>
                @endforeach
            </div>
        </div>
        <div class="uh-chatwin__log uh-cpanel__log" data-uh-chat-log role="log" aria-live="polite" aria-label="Percakapan dengan AI Assistant"></div>
    </div>

    <div class="uh-cpanel__suggest" data-uh-chat-chips aria-label="Pertanyaan lanjutan" hidden>
        @foreach ($uh['ai']['items'] as $it)
            <button type="button" class="uh-chip uh-chip--sm" data-q="{{ $it['q'] }}">{{ $it['label'] }}</button>
        @endforeach
    </div>

    <form class="uh-cpanel__form" data-uh-chat-form autocomplete="off">
        <label class="uh-sr" for="uh-cpanel-input">Tulis pertanyaan Anda</label>
        <input id="uh-cpanel-input" class="uh-cpanel__input" type="text" name="q" maxlength="200" placeholder="Tulis pertanyaan Anda…" data-uh-chat-input>
        <button type="submit" class="uh-cpanel__send" aria-label="Kirim pertanyaan">
            <svg class="uh-i" aria-hidden="true"><use href="#i-send"/></svg>
        </button>
    </form>
    <a class="uh-cpanel__wa" href="{{ $wa($uh['hero']['wa_consult']) }}" target="_blank" rel="noopener noreferrer">
        <svg class="uh-i" aria-hidden="true"><use href="#i-whatsapp"/></svg>
        <span>Butuh bantuan langsung? Chat WhatsApp</span>
    </a>
</section>
