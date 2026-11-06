@php($f = $cafe['faq'])
{{-- Statis: jawaban dicocokkan di browser (cafe.js) berdasarkan kata kunci. Ganti fungsi ask() di cafe.js bila AI backend sudah siap. --}}
<section class="lm-card lm-faq" id="faq" aria-labelledby="faq-title"
         data-faq="{{ json_encode($f['items'], JSON_UNESCAPED_UNICODE) }}"
         data-fallback="{{ $f['fallback'] }}">
    <p class="lm-eyebrow">{{ $f['eyebrow'] }}</p>
    <h2 class="lm-card__title lm-card__title--sm" id="faq-title">{{ $f['title'] }}</h2>
    <p class="lm-muted">{{ $f['text'] }}</p>

    <form class="lm-faq__form" role="search" novalidate>
        <svg class="i" aria-hidden="true"><use href="#i-search"/></svg>
        <label class="sr-only" for="faq-q">Pertanyaan Anda</label>
        <input id="faq-q" type="text" name="q" maxlength="150" autocomplete="off" placeholder="{{ $f['placeholder'] }}">
        <button type="submit" aria-label="Kirim pertanyaan"><svg class="i" aria-hidden="true"><use href="#i-send"/></svg></button>
    </form>

    <ul class="lm-chips">
        @foreach (array_slice($f['items'], 0, 4) as $it)
            <li><button class="lm-chip" type="button" data-q>{{ $it['q'] }}</button></li>
        @endforeach
    </ul>

    <div class="lm-faq__answer" role="status" aria-live="polite" hidden></div>
</section>
