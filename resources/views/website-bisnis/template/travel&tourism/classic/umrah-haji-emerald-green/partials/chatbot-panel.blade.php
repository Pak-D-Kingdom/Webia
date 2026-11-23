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
        <span class="uh-sr" id="uh-cpanel-label">Tulis pertanyaan Anda</span>
        <div class="uh-chatfield">
            <div class="uh-sugg" data-uh-chat-suggest id="uh-cpanel-input-sugg" role="listbox" aria-label="Saran pertanyaan" hidden></div>
            <label class="uh-chatfield__box" for="uh-cpanel-input">
                <svg class="uh-i uh-chatfield__lens" aria-hidden="true"><use href="#i-search"/></svg>
                <input id="uh-cpanel-input" class="uh-chatfield__input" type="text" name="q" maxlength="200" placeholder="Cari atau tulis pertanyaan Anda…" autocomplete="off" role="combobox" aria-autocomplete="list" aria-expanded="false" aria-controls="uh-cpanel-input-sugg" data-uh-chat-input>
                <span class="uh-chatfield__count" data-uh-chat-count hidden></span>
                <button type="button" class="uh-chatfield__clear" data-uh-chat-clear aria-label="Hapus pertanyaan" hidden>
                    <svg class="uh-i" aria-hidden="true"><use href="#i-x"/></svg>
                </button>
            </label>
            <button type="submit" class="uh-chatfield__send" aria-label="Kirim pertanyaan" disabled>
                <svg class="uh-i" aria-hidden="true"><use href="#i-send"/></svg>
            </button>
        </div>
        <p class="uh-cpanel__hint"><span><kbd>Enter</kbd> kirim</span><span><kbd>↑</kbd><kbd>↓</kbd> pilih saran</span></p>
    </form>
    <a class="uh-cpanel__wa" href="{{ $wa($uh['hero']['wa_consult']) }}" target="_blank" rel="noopener noreferrer">
        <svg class="uh-i" aria-hidden="true"><use href="#i-whatsapp"/></svg>
        <span>Butuh bantuan langsung? Chat WhatsApp</span>
    </a>
</section>
