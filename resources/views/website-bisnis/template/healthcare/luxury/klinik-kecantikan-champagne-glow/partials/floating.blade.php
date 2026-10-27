{{--
    Tombol mengambang (kanan-bawah):
    1) AI Chatbot  — avatar kucing GlowCat (dari desain UI) + cincin emas berputar + kelopak teratai
    2) WhatsApp    — tombol champagne-gold dengan kelopak teratai berputar pelan
--}}
<div class="cg-float" data-cg-float>

    <div class="cg-teaser" data-cg-teaser role="status" hidden>
        <button type="button" class="cg-teaser__close" data-cg-teaser-close aria-label="Tutup"><i class="bi bi-x" aria-hidden="true"></i></button>
        <button type="button" class="cg-teaser__text" data-cg-ai-open>{{ $c['assistant']['teaser'] }}</button>
    </div>

    <button type="button" class="cg-fab cg-fab--ai" data-cg-ai-toggle aria-expanded="false" aria-controls="cg-ai" aria-label="Buka AI Information Assistant">
        <span class="cg-fab__halo" aria-hidden="true"></span>
        <span class="cg-fab__ring" aria-hidden="true"></span>
        <span class="cg-fab__face">
            <img src="{{ $img }}/ai-cat-avatar.jpg" alt="" width="64" height="64" loading="lazy" decoding="async">
        </span>
        <i class="bi bi-stars cg-fab__spark cg-fab__spark--1" aria-hidden="true"></i>
        <i class="bi bi-stars cg-fab__spark cg-fab__spark--2" aria-hidden="true"></i>
        <span class="cg-fab__tip" aria-hidden="true">Tanya GlowCat</span>
    </button>

    <a class="cg-fab cg-fab--wa" href="{{ $waUrl }}" target="_blank" rel="noopener" aria-label="Chat WhatsApp {{ $c['brand']['name'] }}">
        <svg class="cg-fab__petals" viewBox="0 0 80 80" aria-hidden="true" focusable="false">
            @for ($i = 0; $i < 8; $i++)
                <ellipse cx="40" cy="14" rx="6.500" ry="13" transform="rotate({{ $i * 45 }} 40 40)"/>
            @endfor
        </svg>
        <span class="cg-fab__core"><i class="bi bi-whatsapp" aria-hidden="true"></i></span>
        <span class="cg-fab__tip" aria-hidden="true">Chat WhatsApp</span>
    </a>
</div>
