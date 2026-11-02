{{-- Halaman AI Chatbot: FAQ destinasi & paket (accordion native <details>) --}}
@php
    $brand  = $t['brand'];
    $groups = collect($t['chatbot']['faq'])->groupBy('group');
@endphp
<section class="ga-block" aria-label="Pertanyaan yang sering diajukan">
    <div class="ga-container ga-faq">
        <div class="ga-faq__groups">
            @foreach ($groups as $name => $items)
                <section class="ga-faq__group" aria-labelledby="faq-{{ \Illuminate\Support\Str::slug($name) }}">
                    <h2 id="faq-{{ \Illuminate\Support\Str::slug($name) }}">FAQ {{ $name }}</h2>
                    @foreach ($items as $f)
                        <details class="ga-acc">
                            <summary>{{ $f['q'] }} {!! $icon('down') !!}</summary>
                            <p>{{ $f['a'] }}</p>
                        </details>
                    @endforeach
                </section>
            @endforeach
        </div>

        <aside class="ga-card ga-faq__cta">
            <img src="{{ $img('mascot-head.jpg') }}" alt="" width="84" height="84" loading="lazy">
            <h2>Masih ada pertanyaan?</h2>
            <p>Tanyakan langsung ke AI Travel Assistant, atau lanjutkan ke tim kami lewat WhatsApp.</p>
            <button class="ga-btn ga-btn--gold ga-btn--sm" type="button" data-ai-open>Mulai Chat</button>
            <a class="ga-btn ga-btn--ghost ga-btn--sm" href="https://wa.me/{{ $brand['whatsapp'] }}" target="_blank" rel="noopener noreferrer">WhatsApp</a>
        </aside>
    </div>
</section>
