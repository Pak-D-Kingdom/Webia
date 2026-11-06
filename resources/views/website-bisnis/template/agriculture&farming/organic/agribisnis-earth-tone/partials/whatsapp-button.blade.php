<div class="dock" id="agDock">
    <div class="dock__hint" id="agAiHint" role="status" hidden>
        <span class="dock__hint-avatar"><img src="{{ $img }}/mascot-avatar.jpg" alt="" width="36" height="36"></span>
        <span class="dock__hint-txt"><strong>Halo, Sahabat Tani!</strong>Tanya komoditas &amp; kemitraan di sini.</span>
        <button type="button" id="agAiHintClose" aria-label="Tutup petunjuk"><svg class="ico"><use href="#i-close"></use></svg></button>
    </div>

    <a class="dock__wa" href="{{ $u['whatsapp'] }}" target="_blank" rel="noopener" aria-label="Chat WhatsApp AgroHarvest">
        <span class="dock__wa-icon"><svg class="ico"><use href="#i-whatsapp"></use></svg></span>
        <span class="dock__label">WhatsApp</span>
    </a>

    <button class="dock__ai" type="button" id="agChatToggle" aria-expanded="false" aria-controls="agChat" aria-label="Buka AI Chat komoditas dan kemitraan">
        <span class="dock__ai-avatar">
            <img src="{{ $img }}/mascot-avatar.jpg" alt="" width="44" height="44">
            <i class="dock__ai-status" aria-hidden="true"></i>
        </span>
        <span class="dock__label">AI Chat</span>
        <span class="dock__leaf dock__leaf--a" aria-hidden="true"><svg class="ico"><use href="#i-sprout"></use></svg></span>
        <span class="dock__leaf dock__leaf--b" aria-hidden="true"><svg class="ico"><use href="#i-sprout"></use></svg></span>
        <span class="dock__ai-close" aria-hidden="true"><svg class="ico"><use href="#i-close"></use></svg></span>
    </button>
</div>
