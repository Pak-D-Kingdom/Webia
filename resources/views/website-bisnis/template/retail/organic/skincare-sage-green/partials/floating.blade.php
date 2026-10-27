@php
    $cfg ??= config('template.retail.organic.skincare-sage-green.skincare');
    $img = asset($cfg['assets']['img']);
@endphp

{{-- ====== Tombol melayang: WhatsApp (daun) + AI Beauty Assistant (robot) ====== --}}
<div class="fab-stack" data-fab-stack>
    <a class="fab fab--wa"
       href="https://wa.me/{{ $cfg['whatsapp']['number'] }}?text={{ rawurlencode($cfg['whatsapp']['greeting']) }}"
       target="_blank" rel="noopener noreferrer" aria-label="Chat WhatsApp {{ $cfg['brand']['name'] }}">
        <span class="fab__ring" aria-hidden="true"></span>
        <span class="fab__sprout" aria-hidden="true"><svg class="ico"><use href="#i-leaf"/></svg></span>
        <span class="fab__body"><svg class="ico"><use href="#i-whatsapp"/></svg></span>
        <span class="fab__label"><strong>Chat via WhatsApp</strong><small>Balas cepat · {{ $cfg['whatsapp']['hours'] }}</small></span>
    </a>

    <button type="button" class="fab fab--ai" data-ai-open aria-haspopup="dialog" aria-controls="ai-chat" aria-label="Buka {{ $cfg['ai']['name'] }}">
        <span class="fab__bubble" data-ai-bubble role="status">Halo! Tanya aku soal skincare <svg class="ico"><use href="#i-sparkles"/></svg></span>
        <span class="fab__orbit" aria-hidden="true"><i></i><i></i><i></i></span>
        <span class="fab__face"><img src="{{ $img }}/ai-robot-head.jpg" alt="" width="64" height="64"></span>
        <span class="fab__online" aria-hidden="true"></span>
    </button>
</div>

{{-- ====== Popup chat AI Product FAQ ====== --}}
<section class="chat" id="ai-chat" data-chat role="dialog" aria-labelledby="ai-chat-title" aria-modal="false" hidden>
    <header class="chat__head">
        <span class="chat__avatar"><img src="{{ $img }}/ai-robot-head.jpg" alt="" width="44" height="44"></span>
        <div class="chat__title">
            <h2 id="ai-chat-title">{{ $cfg['ai']['name'] }}</h2>
            <p><i></i> Online · FAQ produk {{ $cfg['brand']['name'] }}</p>
        </div>
        <button type="button" class="icon-btn chat__close" data-ai-close aria-label="Tutup chat"><svg class="ico"><use href="#i-x"/></svg></button>
    </header>

    <div class="chat__body" data-chat-body aria-live="polite"></div>

    <div class="chat__chips" data-chat-chips>
        @foreach($cfg['ai']['chips'] as $chip)
            <button type="button" data-ai-ask="{{ $chip }}">{{ $chip }}</button>
        @endforeach
    </div>

    <form class="chat__form" data-chat-form autocomplete="off">
        <label class="sr-only" for="ai-chat-input">Pertanyaan</label>
        <input id="ai-chat-input" type="text" name="q" placeholder="{{ $cfg['ai']['placeholder'] }}" maxlength="200" required>
        <button type="submit" class="chat__send" aria-label="Kirim pertanyaan"><svg class="ico"><use href="#i-send"/></svg></button>
    </form>
    <p class="chat__foot">Jawaban otomatis dari FAQ. Butuh orang? <a href="https://wa.me/{{ $cfg['whatsapp']['number'] }}" target="_blank" rel="noopener noreferrer">Chat WhatsApp</a></p>
</section>

{{-- ====== Drawer keranjang / favorit ====== --}}
<div class="scrim" data-scrim hidden></div>
<aside class="drawer" data-drawer role="dialog" aria-modal="true" aria-labelledby="drawer-title" hidden>
    <header class="drawer__head">
        <h2 id="drawer-title" data-drawer-title>Keranjang</h2>
        <button type="button" class="icon-btn" data-drawer-close aria-label="Tutup"><svg class="ico"><use href="#i-x"/></svg></button>
    </header>
    <div class="drawer__body" data-drawer-body></div>
    <footer class="drawer__foot" data-drawer-foot></footer>
</aside>

{{-- ====== Quick view produk ====== --}}
<div class="modal" data-qv role="dialog" aria-modal="true" aria-labelledby="qv-title" hidden>
    <div class="modal__box" data-qv-box tabindex="-1"></div>
</div>

<div class="toast-wrap" data-toast aria-live="polite" aria-atomic="true"></div>
