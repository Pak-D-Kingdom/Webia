<div class="ag-dock" id="agDock">
    <a class="ag-wa" href="{{ $u['whatsapp'] }}" target="_blank" rel="noopener" aria-label="Chat WhatsApp AgroHarvest">
        <span class="ag-wa__icon"><svg class="ico"><use href="#i-whatsapp"></use></svg></span>
        <span class="ag-wa__text">WhatsApp</span>
    </a>

    <div class="ag-ai__hint" id="agAiHint" role="status" hidden>
        <strong>Halo, Sahabat Tani!</strong>
        <span>Tanya soal komoditas &amp; kemitraan di sini.</span>
        <button type="button" id="agAiHintClose" aria-label="Tutup petunjuk"><svg class="ico"><use href="#i-close"></use></svg></button>
    </div>

    <button class="ag-ai" type="button" id="agChatToggle" aria-expanded="false" aria-controls="agChat" aria-label="Buka AI Chat komoditas dan kemitraan">
        <span class="ag-ai__avatar">
            <img src="{{ $img }}/mascot-avatar.jpg" alt="" width="46" height="46">
            <i class="ag-ai__status" aria-hidden="true"></i>
        </span>
        <span class="ag-ai__label">AI Chat</span>
        <span class="ag-ai__leaf ag-ai__leaf--a" aria-hidden="true"><svg class="ico"><use href="#i-sprout"></use></svg></span>
        <span class="ag-ai__leaf ag-ai__leaf--b" aria-hidden="true"><svg class="ico"><use href="#i-sprout"></use></svg></span>
    </button>
</div>
