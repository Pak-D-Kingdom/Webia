{{-- AI COMPANY FAQ + TOMBOL MELAYANG. Jawaban dibaca dari <script id="cp-faq-data"> di layout. --}}
<<<<<<< HEAD
<aside class="cp-ai" data-cp-ai data-autoopen="desktop" data-wa="{{ $waBase }}" aria-label="Bantuan cepat">
=======
<aside class="cp-ai" data-cp-ai data-autoopen="desktop" aria-label="Bantuan cepat">
>>>>>>> webia/nabiila-fe
    <div class="cp-ai__panel" id="cp-ai-panel" role="dialog" aria-modal="false" aria-labelledby="cp-ai-title" data-cp-ai-panel hidden>
        <header class="cp-ai__head">
            <img class="cp-ai__avatar" src="{{ $img('ai-avatar.png') }}" alt="" width="198" height="234" loading="lazy">
            <div class="cp-ai__who">
                <h2 class="cp-ai__name" id="cp-ai-title">AI Assistant</h2>
                <p class="cp-ai__status">Siap membantu Anda!</p>
            </div>
            <button class="cp-ai__close" type="button" data-cp-ai-close aria-label="Tutup AI Assistant">{!! $icon('close') !!}</button>
        </header>

        <div class="cp-ai__log" data-cp-ai-log role="log" aria-live="polite" aria-relevant="additions">
            <div class="cp-ai__msg cp-ai__msg--bot">
                <p>Halo! Saya AI Assistant dari {{ $company['name'] }}. Ada yang bisa saya bantu?</p>
            </div>
            <div class="cp-ai__chips">
                @foreach ($faq as $entry)
                    @if ($entry['chip'])
                        <button class="cp-chip" type="button" data-cp-ai-chip="{{ $entry['id'] }}">{{ $entry['chip'] }}</button>
                    @endif
                @endforeach
            </div>
        </div>

        <form class="cp-ai__form" data-cp-ai-form autocomplete="off">
            <label class="cp-sr" for="cp-ai-input">Tulis pertanyaan Anda</label>
            <input class="cp-ai__input" id="cp-ai-input" type="text" placeholder="Tulis pertanyaan Anda..." maxlength="200" data-cp-ai-input>
            <button class="cp-ai__send" type="submit" aria-label="Kirim pertanyaan">{!! $icon('send') !!}</button>
        </form>
    </div>

    @include($ns . '.partials.whatsapp-button')

    <div class="cp-ai__dock">
        <button class="cp-ai__teaser" type="button" data-cp-ai-teaser hidden>
            <span class="cp-ai__teaser-text">{{ $ai['teaser'] ?? 'Halo! Ada yang bisa kami bantu?' }}</span>
        </button>

        <button class="cp-ai__toggle" type="button" data-cp-ai-toggle aria-expanded="false" aria-controls="cp-ai-panel" aria-label="Buka AI Assistant">
            <span class="cp-ai__halo" aria-hidden="true"></span>
            <span class="cp-ai__face">
                <img class="cp-ai__robot" src="{{ $img('ai-avatar.png') }}" alt="" width="198" height="234">
            </span>
            <span class="cp-ai__online" aria-hidden="true"></span>
        </button>
    </div>
</aside>
