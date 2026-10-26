{{--
    FAQ.  $full = false → 4 pertanyaan pertama di beranda (tanpa halaman terpisah di preview, ada "Lihat Semua")
          $full = true  → semua pertanyaan di halaman FAQ
--}}
@php
    $full  = $full ?? false;
    $items = $full ? $c['faq'] : array_slice($c['faq'], 0, 4);
    $pfx   = $full ? 'faq-' : 'pfaq-';
@endphp

<section id="faq" class="cg-section cg-faq {{ $full ? 'cg-faq--full' : 'cg-faq--preview' }}" aria-labelledby="cg-faq-title">
    @unless ($full)
        <header class="cg-sechead cg-sechead--stack">
            <div>
                <h2 id="cg-faq-title" class="cg-sechead__title cg-sechead__title--sm">Frequently Asked Questions</h2>
                <p class="cg-sechead__sub cg-sechead__sub--xs">Temukan jawaban untuk pertanyaan yang sering diajukan.</p>
            </div>
            <a class="cg-link cg-link--sm" href="{{ route('glow.faq') }}">Lihat Semua <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
        </header>
    @else
        <h2 id="cg-faq-title" class="cg-sr">Pertanyaan yang sering diajukan</h2>
    @endunless

    <div class="cg-accordion" data-cg-accordion>
        @foreach ($items as $i => $f)
            <div class="cg-acc" id="{{ $pfx }}{{ $i + 1 }}">
                <h3 class="cg-acc__q">
                    <button type="button" class="cg-acc__btn" aria-expanded="false" aria-controls="{{ $pfx }}panel-{{ $i + 1 }}">
                        <span>{{ $f['q'] }}</span>
                        <i class="bi bi-plus-lg" aria-hidden="true"></i>
                    </button>
                </h3>
                <div class="cg-acc__panel" id="{{ $pfx }}panel-{{ $i + 1 }}" role="region" hidden>
                    <p>{{ $f['a'] }}</p>
                </div>
            </div>
        @endforeach
    </div>

    @if ($full)
        <div class="cg-callout">
            <div>
                <h3>Masih punya pertanyaan?</h3>
                <p>Tanya GlowCat, asisten informasi kami, atau hubungi tim lewat WhatsApp.</p>
            </div>
            <div class="cg-callout__actions">
                <button type="button" class="cg-btn cg-btn--primary" data-cg-ai-open><i class="bi bi-stars" aria-hidden="true"></i> Tanya GlowCat</button>
                <a class="cg-btn cg-btn--ghost" href="https://wa.me/{{ $c['contact']['whatsapp'] }}" target="_blank" rel="noopener"><i class="bi bi-whatsapp" aria-hidden="true"></i> WhatsApp</a>
            </div>
        </div>
    @endif
</section>
