@php
    $mode = $mode ?? 'preview';
    $faqById = collect($laundry['faq'])->keyBy('id');
    $quick = collect($laundry['chatbot']['quick'])->map(fn ($id) => $faqById[$id] ?? null)->filter();
@endphp
@if ($mode === 'preview')
<article class="lb-card lb-ai" aria-labelledby="lb-ai-title">
    <div class="lb-ai__bubble">
        <svg class="lb-ai__heart lb-i" aria-hidden="true"><use href="#i-heart"/></svg>
        <h2 id="lb-ai-title">{{ $laundry['chatbot']['name'] }}</h2>
        <p>{{ $laundry['chatbot']['sub'] }}</p>
    </div>
    <div class="lb-ai__scene">
        <img src="{{ $lbAsset('img', 'ai-mascot-scene.webp') }}" alt="Maskot robot AI BlueLaundry dengan laptop, deterjen, dan setrika" width="262" height="168" loading="lazy">
    </div>
    <ul class="lb-ai__chips">
        @foreach ($quick as $f)
            <li><button type="button" class="lb-qchip" data-lb-ask="{{ $f['q'] }}"><span class="lb-qchip__dot" aria-hidden="true"><svg class="lb-i"><use href="#i-sparkle"/></svg></span>{{ $f['q'] }}</button></li>
        @endforeach
    </ul>
    <form class="lb-ai__form" data-lb-ask-form autocomplete="off">
        <label class="lb-sr" for="lbAiPreviewInput">Tulis pertanyaan Anda</label>
        <input id="lbAiPreviewInput" name="q" type="text" maxlength="200" placeholder="Tulis pertanyaan Anda...">
        <button type="submit" aria-label="Kirim pertanyaan"><svg class="lb-i" aria-hidden="true"><use href="#i-send"/></svg></button>
    </form>
    <a class="lb-ai__more" href="{{ $lbRoute('ai-chatbot') }}">Buka halaman AI Chatbot <svg class="lb-i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
</article>
@else
<section class="lb-section" aria-label="AI chatbot FAQ harga dan proses laundry">
    <div class="lb-container lb-split lb-split--chat">
        <div class="lb-chat-stage">
            <img class="lb-chat-stage__art" src="{{ $lbAsset('img', 'ai-mascot-scene.webp') }}" alt="" aria-hidden="true" width="262" height="168" loading="lazy">
            @include('website-bisnis.template.home-services.modern.laundry-baby-blue.partials.chat-panel', ['embed' => true])
        </div>
        <div class="lb-faq" aria-label="Pertanyaan yang sering diajukan">
            <h2 class="lb-faq__title">Pertanyaan yang sering diajukan</h2>
            @foreach ($laundry['faq'] as $f)
                <details class="lb-faq__item">
                    <summary><span>{{ $f['q'] }}</span><svg class="lb-i" aria-hidden="true"><use href="#i-chevron"/></svg></summary>
                    <div class="lb-faq__body">
                        <p>{{ $f['a'] }}</p>
                        @if (!empty($f['cta']))
                            <a class="lb-btn lb-btn--ghost lb-btn--sm" href="{{ $lbRoute($f['cta']['route']) }}">{{ $f['cta']['label'] }} <svg class="lb-i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
                        @endif
                    </div>
                </details>
            @endforeach
        </div>
    </div>
</section>
@endif
