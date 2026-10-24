@php
    $r   = $e['route'];
    $ai  = $e['ai'];
    $wa  = 'https://wa.me/'.$e['whatsapp']['number'].'?text='.rawurlencode($e['whatsapp']['message']);
    $faq = collect($ai['faq'])->map(fn ($f) => [
        'q' => $f['q'], 'k' => $f['keywords'], 'a' => $f['a'], 'u' => route($r.$f['route']),
    ])->values();
@endphp

<div class="nl-float" data-float>
    {{-- Floating WhatsApp --}}
    <a class="nl-wa" href="{{ $wa }}" target="_blank" rel="noopener" aria-label="Chat via WhatsApp">
        <span class="nl-wa__pulse" aria-hidden="true"></span>
        <svg class="ic"><use href="#i-whatsapp"/></svg>
        <span class="nl-tip nl-tip--wa">Chat WhatsApp</span>
    </a>

    {{-- AI FAQ · panel chat --}}
    <section class="nl-ai" id="nl-ai" role="dialog" aria-label="{{ $ai['name'] }}" aria-modal="false" hidden
             data-ai data-faq='@json($faq, JSON_HEX_APOS | JSON_HEX_QUOT)' data-fallback="{{ $ai['fallback'] }}">
        <header class="nl-ai__head">
            <img src="{{ asset($e['img'].'/ai-bot.png') }}" alt="" width="40" height="40">
            <div><h2>{{ $ai['name'] }}</h2><p><i aria-hidden="true"></i> Online</p></div>
            <button type="button" class="nl-iconbtn" data-ai-close aria-label="Tutup chat"><svg class="ic"><use href="#i-close"/></svg></button>
        </header>

        <div class="nl-ai__body" data-ai-log role="log" aria-live="polite">
            <div class="nl-msg nl-msg--bot">{{ $ai['greeting'] }}</div>
        </div>

        <div class="nl-ai__quick" data-ai-quick>
            @foreach(array_slice($ai['faq'], 0, $ai['quick']) as $f)
                <button type="button" data-q="{{ $f['q'] }}">{{ $f['q'] }}</button>
            @endforeach
        </div>

        <form class="nl-ai__form" data-ai-form autocomplete="off">
            <label class="nl-sr" for="nl-ai-input">Pertanyaan</label>
            <input id="nl-ai-input" type="text" placeholder="{{ $ai['input'] }}" maxlength="200">
            <button type="submit" aria-label="Kirim pertanyaan"><svg class="ic"><use href="#i-send"/></svg></button>
        </form>
    </section>

    {{-- Floating AI Chatbot --}}
    <button class="nl-ai-btn" type="button" aria-expanded="false" aria-controls="nl-ai" aria-label="Buka {{ $ai['name'] }}" data-ai-toggle>
        <span class="nl-ai-btn__orbit" aria-hidden="true"></span>
        <span class="nl-ai-btn__core"><img src="{{ asset($e['img'].'/ai-bot.png') }}" alt="" width="64" height="64"></span>
        <span class="nl-ai-btn__chip" aria-hidden="true">AI</span>
        <span class="nl-tip nl-tip--ai" aria-hidden="true">Tanya Nova</span>
    </button>
</div>
