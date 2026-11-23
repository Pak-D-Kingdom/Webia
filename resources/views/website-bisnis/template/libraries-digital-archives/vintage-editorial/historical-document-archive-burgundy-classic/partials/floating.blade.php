<div class="hda-float" data-float>
    <button type="button" class="hda-top" data-top aria-label="Back to top"><svg class="hda-icon"><use href="#i-up"/></svg></button>
    <a class="hda-wa" href="{{ $hwa }}" target="_blank" rel="noopener" aria-label="{{ $hda['site']['whatsapp']['tooltip'] }}">
        <svg viewBox="0 0 24 24" aria-hidden="true"><use href="#i-wa"/></svg>
        <span class="hda-tip">{{ $hda['site']['whatsapp']['tooltip'] }}</span>
    </a>
    <button type="button" class="hda-bot-btn" data-chat-toggle aria-label="Ask Library Assistant" aria-expanded="false" aria-controls="hda-chat">
        <img src="{{ $ha('ui/mascot-archie.svg') }}" alt="" width="62" height="62">
        <span class="hda-dotnew"></span>
        <span class="hda-tip">Ask Library Assistant</span>
    </button>
</div>
<section class="hda-chat" id="hda-chat" role="dialog" aria-label="Archive Assistant" aria-modal="false" data-chat>
    <div class="hda-chat__head">
        <div class="hda-chat__av"><img src="{{ $ha('ui/mascot-archie.svg') }}" alt=""></div>
        <div><strong>Archive Assistant</strong><small>Archie · help topics &amp; FAQ</small></div>
        <button type="button" class="hda-chat__x" data-chat-close aria-label="Close Archive Assistant"><svg class="hda-icon"><use href="#i-x"/></svg></button>
    </div>
    <div class="hda-chat__body" data-chat-body aria-live="polite"></div>
    <div class="hda-chat__quick" data-chat-quick aria-label="Quick replies"></div>
    <div class="hda-chat__sugg" data-chat-sugg aria-label="Suggested questions"></div>
    <form class="hda-chat__form" data-chat-form>
        <input type="text" data-chat-input placeholder="Ask about the archive…" aria-label="Type your question" autocomplete="off">
        <button type="submit" aria-label="Send"><svg class="hda-icon"><use href="#i-send"/></svg></button>
    </form>
</section>
