@php
    $mode = $mode ?? 'preview';
    $faqById = collect($laundry['faq'])->keyBy('id');
@endphp
@if ($mode === 'preview')
<article class="lb-card lb-ai" aria-labelledby="lb-ai-title">
    <header class="lb-ai__head">
        <span class="lb-ai__avatar"><img src="{{ asset($laundry['assets']['img'] . '/ai-robot-head.png') }}" alt="" width="44" height="27" loading="lazy"><i class="lb-ai__dot" aria-hidden="true"></i></span>
        <div>
            <h2 id="lb-ai-title"><a href="{{ route('webia.laundry-baby-blue.ai-chatbot') }}">{{ $laundry['chatbot']['name'] }}</a></h2>
            <p>Tanya seputar harga, layanan, atau proses laundry.</p>
        </div>
    </header>
    <ul class="lb-ai__chips">
        @foreach ($laundry['chatbot']['quick'] as $id)
            @continue(! isset($faqById[$id]))
            <li><button type="button" class="lb-qchip" data-lb-ask="{{ $faqById[$id]['q'] }}">{{ $faqById[$id]['q'] }}</button></li>
        @endforeach
    </ul>
    <form class="lb-ai__form" data-lb-ask-form autocomplete="off">
        <label class="lb-sr" for="lbAiPreviewInput">Tulis pertanyaan Anda</label>
        <input id="lbAiPreviewInput" name="q" type="text" maxlength="200" placeholder="Tulis pertanyaan Anda...">
        <button type="submit" aria-label="Kirim pertanyaan"><svg class="lb-i" aria-hidden="true"><use href="#i-send"/></svg></button>
    </form>
</article>
@else
<section class="lb-section" aria-label="AI chatbot FAQ harga dan proses laundry">
    <div class="lb-container lb-split lb-split--chat">
        <div class="lb-chat-stage">
            <img class="lb-chat-stage__art" src="{{ asset($laundry['assets']['img'] . '/ai-mascot-scene.webp') }}" alt="" aria-hidden="true" width="262" height="168" loading="lazy">
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
                            <a class="lb-btn lb-btn--ghost lb-btn--sm" href="{{ route('webia.laundry-baby-blue.' . $f['cta']['route']) }}">{{ $f['cta']['label'] }} <svg class="lb-i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
                        @endif
                    </div>
                </details>
            @endforeach
        </div>
    </div>
</section>
@endif
