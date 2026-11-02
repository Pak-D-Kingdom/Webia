@php
    $ai     = $site['ai'];
    $inline = $inline ?? false;
    $items  = $inline ? array_keys($ai['faq']) : $ai['quick'];
@endphp
<section class="lc-chat{{ $inline ? ' lc-chat--inline' : '' }}"
         @if ($inline) data-lc-chat-inline aria-label="Chat AI Assistant GlobalCargo" @else id="lc-chat" role="dialog" aria-label="AI Assistant GlobalCargo" hidden @endif
         data-lc-chat
         data-greeting="{{ $ai['greeting'] }}"
         data-fallback="{{ $ai['fallback'] }}"
         data-wa="https://wa.me/{{ $site['contact']['whatsapp'] }}"
         data-faq="{{ json_encode($ai['faq'], JSON_UNESCAPED_UNICODE) }}">
    <header class="lc-chat__head">
        <span class="lc-chat__avatar">@include($site['view'] . '.partials.bot-face')</span>
        <div class="lc-chat__who">
            <strong>{{ $site['brand']['name'] }} AI Assistant</strong>
            <span><i class="lc-chat__dot" aria-hidden="true"></i>Siap membantu</span>
        </div>
        @unless ($inline)
            <button class="lc-chat__close" type="button" data-lc-chat-close aria-label="Tutup chat">
                <svg class="lc-ico" aria-hidden="true"><use href="#lc-i-close"></use></svg>
            </button>
        @endunless
    </header>

    <div class="lc-chat__log" role="log" aria-live="polite" data-lc-log></div>

    <div class="lc-chat__chips" aria-label="Pertanyaan cepat">
        @foreach ($items as $idx)
            <button class="lc-chip" type="button" data-lc-ask="{{ $idx }}">{{ $ai['faq'][$idx]['q'] }}</button>
        @endforeach
    </div>

    <form class="lc-chat__form" data-lc-chat-form autocomplete="off">
        <label class="lc-sr" for="lc-chat-input-{{ $inline ? 'page' : 'float' }}">Tulis pertanyaan Anda</label>
        <input id="lc-chat-input-{{ $inline ? 'page' : 'float' }}" type="text" name="q" maxlength="200" placeholder="Tulis pertanyaan seputar pengiriman…" data-lc-input>
        <button class="lc-chat__send" type="submit" aria-label="Kirim pertanyaan">
            <svg class="lc-ico" aria-hidden="true"><use href="#lc-i-send"></use></svg>
        </button>
    </form>
</section>
