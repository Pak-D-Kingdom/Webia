@php
    $f = $furniture;
    $a = fn ($path) => asset($path);
    $ai = $f['ai'];
    $groups = collect($ai['faqs'])->groupBy('group');
@endphp
<section class="lf-section">
    <div class="lf-container">
        <div class="lf-aihero">
            <div class="lf-aihero__fig">
                <img src="{{ $a($ai['image']) }}" alt="Luxe, maskot AI Assistant LuxeFurni" loading="lazy">
                <span class="lf-aicard__bubble">{{ $ai['bubble'] }}</span>
            </div>
            <div class="lf-aihero__copy">
                <h2 class="lf-serif">Tanyakan apa saja pada {{ $ai['name'] }}</h2>
                <p>{{ $ai['text'] }} Luxe menjawab pertanyaan seputar produk dan kustomisasi furniture sepanjang waktu.</p>
                <button class="lf-btn lf-btn--gold" type="button" data-chat-open>Mulai Chat <svg class="ic"><use href="#i-arrow"/></svg></button>
            </div>
        </div>

        <div class="lf-faqcols">
            @foreach ($groups as $group => $items)
                <div class="lf-faqgroup">
                    <h2 class="lf-serif">FAQ {{ $group }}</h2>
                    @foreach ($items as $item)
                        <details class="lf-faq">
                            <summary>{{ $item['q'] }}</summary>
                            <p>{{ $item['a'] }}</p>
                            <button type="button" class="lf-link" data-chat-ask="{{ $item['q'] }}">Tanya Luxe tentang ini</button>
                        </details>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
</section>
