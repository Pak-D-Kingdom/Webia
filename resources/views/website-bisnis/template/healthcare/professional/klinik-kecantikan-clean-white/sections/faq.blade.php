{{-- FAQ (halaman FAQ). Accordion memakai <details name="gl-faq"> → bekerja tanpa JS; JS hanya merapikan perilaku. --}}
<section class="gl-section gl-faq" aria-label="Pertanyaan yang sering diajukan">
    <div class="gl-container gl-faq__layout">
        <div class="gl-acc" data-gl-accordion>
            @foreach ($clinic['faqs'] as $i => $f)
                <details class="gl-acc__item" name="gl-faq" @if ($i === 0) open @endif>
                    <summary class="gl-acc__q">
                        <span>{{ $f['q'] }}</span>
                        <svg class="gl-ic" aria-hidden="true"><use href="#gl-i-chevron-down"/></svg>
                    </summary>
                    <div class="gl-acc__a"><p>{{ $f['a'] }}</p></div>
                </details>
            @endforeach
        </div>

        <aside class="gl-card gl-faq__help">
            <img src="{{ $img($clinic['assistant']['mascot']) }}" alt="" width="132" height="196" loading="lazy" decoding="async">
            <h2 class="gl-card__title">Belum menemukan jawaban?</h2>
            <p class="gl-card__text">Tanyakan langsung pada asisten AI kami atau hubungi admin klinik.</p>
            <div class="gl-actions gl-actions--stack">
                <button type="button" class="gl-btn gl-btn--primary gl-btn--block" data-gl-ai-open>Tanya Asisten AI</button>
                <a class="gl-btn gl-btn--outline gl-btn--block" href="https://wa.me/{{ $clinic['contact']['whatsapp'] }}" target="_blank" rel="noopener noreferrer">Chat WhatsApp</a>
            </div>
        </aside>
    </div>
</section>
