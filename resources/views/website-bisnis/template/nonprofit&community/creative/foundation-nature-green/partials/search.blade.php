{{-- Pencarian situs (dialog). Dibuka dari tombol [data-fh-search-toggle] atau Ctrl/⌘+K. Logika di foundation.js. --}}
<div class="fh-searchmodal" id="fh-search" data-fh-search role="dialog" aria-modal="true" aria-labelledby="fh-search-title" hidden>
    <div class="fh-searchmodal__backdrop" data-fh-search-close></div>
    <div class="fh-searchmodal__panel">
        <h2 class="fh-sr" id="fh-search-title">Cari di situs GreenHope</h2>

        <div class="fh-searchmodal__box">
            {{ $icon('search') }}
            <input id="fh-search-input" type="search" placeholder="Cari halaman, program, atau informasi…" autocomplete="off" spellcheck="false" aria-label="Kata kunci pencarian" data-fh-search-input>
            <button class="fh-searchmodal__close" type="button" data-fh-search-close aria-label="Tutup pencarian"><span>Esc</span>{{ $icon('close') }}</button>
        </div>

        <div class="fh-searchmodal__popular">
            <span>Populer:</span>
            @foreach ($cfg['search_popular'] as $pop)
                <button type="button" data-fh-search-fill="{{ \Illuminate\Support\Str::lower($pop[0]) }}">{{ $pop[0] }}</button>
            @endforeach
        </div>

        <ul class="fh-searchmodal__list" data-fh-search-list>
            @foreach ($cfg['search_index'] as $s)
                <li data-text="{{ \Illuminate\Support\Str::lower($s['label'].' '.$s['desc'].' '.$s['hint']) }}">
                    <a href="{{ $url($s['slug']) }}">
                        <span class="fh-searchmodal__ic">{{ $icon($s['icon']) }}</span>
                        <span class="fh-searchmodal__txt"><strong>{{ $s['label'] }}</strong><small>{{ $s['desc'] }}</small></span>
                        <span class="fh-searchmodal__go">{{ $icon('arrow') }}</span>
                    </a>
                </li>
            @endforeach
        </ul>

        <div class="fh-searchmodal__empty" data-fh-search-empty hidden>
            <strong>Tidak ada hasil untuk “<span data-fh-search-term></span>”</strong>
            <p>Coba kata kunci lain, atau tanyakan langsung kepada kami.</p>
            <div class="fh-searchmodal__empty-actions">
                <a class="fh-btn fh-btn--dark fh-btn--sm" href="{{ $url('ai-chatbot') }}">{{ $icon('chat') }}Tanya GreenBot</a>
                <a class="fh-btn fh-btn--ghost-dark fh-btn--sm" href="{{ $wa('Halo GreenHope, saya mencari informasi.') }}" target="_blank" rel="noopener">{{ $icon('whatsapp') }}WhatsApp</a>
            </div>
        </div>

        <p class="fh-searchmodal__hint" aria-hidden="true"><span><kbd>↑</kbd><kbd>↓</kbd> pilih</span><span><kbd>Enter</kbd> buka</span><span><kbd>Esc</kbd> tutup</span></p>
    </div>
</div>
