@php $bot = $f['faq']['bot']; @endphp

<div class="rf-float" data-rf-float>
    <a class="rf-wa" href="{{ $wa }}" target="_blank" rel="noopener" aria-label="Chat WhatsApp RusticFurni">
        <span class="rf-wa__ring" aria-hidden="true"></span>
        <span class="rf-wa__icon">{!! $icon('whatsapp') !!}</span>
        <span class="rf-wa__label">WhatsApp</span>
    </a>

    <button class="rf-ai" type="button" data-rf-chat-open aria-haspopup="dialog" aria-controls="rf-chat" aria-label="Buka AI Chat dengan {{ $bot['name'] }}">
        <span class="rf-ai__tip" aria-hidden="true">{{ $bot['tip'] }}</span>
        <span class="rf-ai__avatar"><img src="{{ $img($bot['avatar']) }}" alt="" width="52" height="52" loading="lazy"></span>
        <span class="rf-ai__label">AI Chat</span>
    </button>
</div>

<section class="rf-chat" id="rf-chat" role="dialog" aria-modal="false" aria-labelledby="rf-chat-title" hidden>
    <header class="rf-chat__head">
        <img class="rf-chat__avatar" src="{{ $img($bot['avatar']) }}" alt="" width="44" height="44" loading="lazy">
        <div class="rf-chat__who">
            <strong id="rf-chat-title">{{ $bot['name'] }}</strong>
            <span>{{ $bot['role'] }}</span>
        </div>
        <button class="rf-iconbtn rf-iconbtn--light" type="button" data-rf-chat-close aria-label="Tutup chat">{!! $icon('close') !!}</button>
    </header>
    <div class="rf-chat__log" data-rf-chat-log aria-live="polite"></div>
    <div class="rf-chat__chips" data-rf-chat-chips></div>
    <form class="rf-chat__form" data-rf-chat-form autocomplete="off">
        <label class="rf-sr" for="rf-chat-input">Pertanyaan Anda</label>
        <input id="rf-chat-input" type="text" name="q" placeholder="{{ $bot['placeholder'] }}" maxlength="200" required>
        <button class="rf-chat__send" type="submit" aria-label="Kirim pertanyaan">{!! $icon('send') !!}</button>
    </form>
</section>
