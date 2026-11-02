{{-- ===================== AI PROPERTY ASSISTANT (FAQ) ===================== --}}
<aside class="rea-assistant" lang="id" aria-label="AI Property Assistant" data-assistant
       data-start="{{ $page === 'index' ? 'open' : 'closed' }}"
       data-fallback="{{ $assistant['fallback'] }}"
       data-wa-number="{{ $whatsapp['number'] }}"
       data-wa-intro="{{ $whatsapp['ai_intro'] }}"
       data-faq="{{ json_encode($assistant['faq'], JSON_UNESCAPED_UNICODE) }}">

    <button class="rea-assistant__launcher" type="button" aria-label="Buka AI Property Assistant" aria-expanded="false" aria-controls="rea-assistant-panel" data-assistant-open hidden>
        <span class="rea-assistant__orbit" aria-hidden="true"></span>
        <img src="{{ $img('ai-assistant.png') }}" alt="" width="56" height="56">
        <span class="rea-assistant__teaser" aria-hidden="true">{{ $assistant['teaser'] }}</span>
    </button>

    <section class="rea-assistant__panel" id="rea-assistant-panel" aria-labelledby="rea-assistant-title" data-assistant-panel>
        <button class="rea-assistant__close" type="button" aria-label="Tutup AI Property Assistant" data-assistant-close>{{ $icon('x') }}</button>

        <header class="rea-assistant__head">
            <img src="{{ $img('ai-assistant.png') }}" alt="" width="56" height="56">
            <div>
                <h2 id="rea-assistant-title">AI Property Assistant</h2>
                <p>{{ $assistant['greeting'] }}</p>
            </div>
        </header>

        <div class="rea-assistant__log" role="log" aria-live="polite" aria-label="Percakapan" data-assistant-log hidden></div>

        <ul class="rea-assistant__chips" aria-label="Pertanyaan cepat">
            @foreach (collect($assistant['faq'])->where('chip', true) as $item)
                <li><button type="button" data-assistant-chip="{{ $item['q'] }}">{{ $item['q'] }}</button></li>
            @endforeach
        </ul>

        <form class="rea-assistant__form" novalidate data-assistant-form>
            <label class="rea-sr" for="rea-assistant-input">Tulis pertanyaan Anda</label>
            <input id="rea-assistant-input" type="text" name="question" placeholder="Tulis pertanyaan Anda..." autocomplete="off" maxlength="200">
            <button type="submit" aria-label="Kirim pertanyaan">{{ $icon('send') }}</button>
        </form>
    </section>
</aside>
