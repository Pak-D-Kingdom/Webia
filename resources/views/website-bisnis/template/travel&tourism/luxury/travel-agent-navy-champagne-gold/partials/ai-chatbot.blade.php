{{--
    AI Chatbot (FAQ destinasi & paket) — frontend statis.
    Maskot (topi safari) diambil dari desain UI: mascot-head.jpg
--}}
<div class="ga-ai" data-ai>
    <p class="ga-ai__hint" data-ai-hint>Mau liburan ke mana?</p>

    <button class="ga-ai__fab" type="button" aria-expanded="false" aria-controls="ga-ai-panel" data-ai-toggle>
        <span class="ga-ai__avatar">
            <span class="ga-ai__orbit" aria-hidden="true"></span>
            <img src="{{ $img('mascot-head.jpg') }}" alt="" width="64" height="64" loading="lazy" decoding="async">
        </span>
        <span class="ga-ai__label">AI Chat</span>
        <span class="ga-sr">Buka AI Travel Assistant</span>
    </button>

    <section class="ga-ai__panel" id="ga-ai-panel" role="dialog" aria-modal="false" aria-labelledby="ga-ai-title" hidden data-ai-panel>
        <header class="ga-ai__head">
            <img class="ga-ai__headimg" src="{{ $img('mascot-head.jpg') }}" alt="" width="44" height="44" loading="lazy">
            <div>
                <h2 id="ga-ai-title">{{ $bot['title'] }}</h2>
                <p>{{ $bot['subtitle'] }}</p>
            </div>
            <button class="ga-ai__close" type="button" aria-label="Tutup chat" data-ai-close>{!! $icon('close') !!}</button>
        </header>

        <div class="ga-ai__log" role="log" aria-live="polite" tabindex="0" data-ai-log></div>

        <div class="ga-ai__chips" data-ai-chips aria-label="Topik cepat"></div>

        <form class="ga-ai__form" data-ai-form autocomplete="off">
            <label class="ga-sr" for="ga-ai-input">Tulis pertanyaan</label>
            <input id="ga-ai-input" type="text" name="q" maxlength="160" placeholder="Tanya destinasi atau paket…" data-ai-input>
            <button type="submit" aria-label="Kirim pertanyaan">{!! $icon('send') !!}</button>
        </form>

        <a class="ga-ai__wa" href="https://wa.me/{{ $brand['whatsapp'] }}" target="_blank" rel="noopener noreferrer">
            {!! $icon('whatsapp') !!}<span>Lanjut ke WhatsApp tim kami</span>
        </a>
    </section>
</div>
