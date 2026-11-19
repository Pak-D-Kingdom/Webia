<header class="eo-chat__head">
    <span class="eo-chat__avatar"><img src="{{ asset($eo['assets']['img']) }}/robot-head.svg" alt="" width="40" height="41"></span>
    <div class="eo-chat__who">
        <strong>{{ $eo['brand']['name'] }} AI Assistant</strong>
        <small><i aria-hidden="true"></i>{{ $eo['assistant']['online'] }}</small>
    </div>
    <button type="button" class="eo-chat__close" data-eo-chat-close aria-label="Tutup chat"><svg class="eo-i" aria-hidden="true"><use href="#i-close"/></svg></button>
</header>
<div class="eo-chat__log" data-eo-chat-log aria-live="polite"></div>
<div class="eo-chat__chips" data-eo-chat-chips></div>
<form class="eo-chat__form" data-eo-chat-form autocomplete="off">
    <label class="eo-sr" for="eo-chat-input-{{ $chatid }}">Tulis pertanyaan</label>
    <input id="eo-chat-input-{{ $chatid }}" type="text" name="q" maxlength="200" placeholder="{{ $eo['assistant']['placeholder'] }}" autocomplete="off">
    <button type="submit" aria-label="Kirim pertanyaan"><svg class="eo-i" aria-hidden="true"><use href="#i-send"/></svg></button>
</form>
