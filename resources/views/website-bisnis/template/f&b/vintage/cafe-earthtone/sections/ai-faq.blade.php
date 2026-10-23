@php
    $f = $cafe['faq'];
    $faqData = [
        'fallback' => $f['fallback'],
        'whatsapp' => 'https://wa.me/' . $cafe['contact']['wa_number'] . '?text=' . rawurlencode($cafe['whatsapp']['message']),
        'whatsappLabel' => $cafe['whatsapp']['cta'],
        'endpoint' => $f['endpoint'],
        'items' => collect($f['items'])->map(function ($i) use ($cafe) {
            return [
                'keywords' => $i['keywords'],
                'answer'   => $i['answer'],
                'link'     => isset($i['link'])
                    ? ['label' => $i['link']['label'], 'url' => route($cafe['routes'][$i['link']['route']])]
                    : null,
            ];
        })->values(),
    ];
@endphp
<section class="kl-faq" id="faq" aria-labelledby="kl-faq-title" data-kl-faq>
    <img class="kl-faq__art kl-faq__art--cup" src="{{ $img('faq-cup.png') }}" alt="" aria-hidden="true" width="186" height="222" loading="lazy">

    <div class="kl-faq__intro">
        <p class="kl-faq__label">{{ $f['label'] }}</p>
        <h2 class="kl-faq__title" id="kl-faq-title">{{ $f['title'] }}</h2>
        <p class="kl-faq__text">{{ $f['text'] }}</p>
    </div>

    <div class="kl-faq__ask">
        <form class="kl-faq__form" data-kl-faq-form autocomplete="off">
            <label class="kl-sr" for="kl-faq-input">Pertanyaan Anda</label>
            <input class="kl-faq__input" id="kl-faq-input" type="text" name="q" placeholder="{{ $f['placeholder'] }}" maxlength="200" data-kl-faq-input>
            <button class="kl-faq__send" type="submit" aria-label="Kirim pertanyaan">
                <svg class="kl-icon" aria-hidden="true"><use href="#kl-i-arrow-up"/></svg>
            </button>
        </form>

        <ul class="kl-faq__chips" aria-label="Pertanyaan yang sering diajukan">
            @foreach ($f['chips'] as $chip)
                <li><button class="kl-faq__chip" type="button" data-kl-faq-chip>{{ $chip }}</button></li>
            @endforeach
        </ul>
    </div>

    <img class="kl-faq__art kl-faq__art--books" src="{{ $img('faq-books.png') }}" alt="" aria-hidden="true" width="312" height="210" loading="lazy">

    <div class="kl-faq__thread" data-kl-faq-thread aria-live="polite" hidden></div>

    <script type="application/json" id="kl-faq-data">@json($faqData)</script>
</section>
