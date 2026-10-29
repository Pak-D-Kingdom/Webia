<div class="fm-chat__body" data-fm-chat-body role="log" aria-live="polite"></div>
<div class="fm-chat__quick" data-fm-chat-quick></div>
<form class="fm-chat__form" data-fm-chat-form autocomplete="off">
    <label class="fm-sr" for="fm-chat-input-{{ $uid ?? 'p' }}">Pertanyaan Anda</label>
    <input id="fm-chat-input-{{ $uid ?? 'p' }}" type="text" data-fm-chat-input placeholder="{{ $cfg['ai']['placeholder'] }}" maxlength="200">
    <button type="submit" aria-label="Kirim pertanyaan"><svg class="fm-i" aria-hidden="true"><use href="#i-send"/></svg></button>
</form>
