@php $bot = $f['faq']['bot']; @endphp
<section class="rf-section">
    <div class="rf-container rf-faqgrid">
        <div class="rf-faqlist">
            @foreach ($f['faq']['groups'] as $g)
                <div class="rf-faqgroup">
                    <h2>{{ $g['title'] }}</h2>
                    @foreach ($g['items'] as $it)
                        <details class="rf-card rf-faq">
                            <summary>{{ $it['q'] }}{!! $icon('chevron-down') !!}</summary>
                            <p>{{ $it['a'] }}</p>
                        </details>
                    @endforeach
                </div>
            @endforeach
        </div>

        <aside class="rf-card rf-botcard">
            <img src="{{ $img($bot['avatar']) }}" alt="Rudi, maskot asisten AI RusticFurni" width="120" height="120" loading="lazy">
            <p class="rf-script">{{ $bot['tip'] }}</p>
            <h2>Tanya {{ $bot['name'] }}</h2>
            <p>{{ $bot['role'] }}. Jawaban cepat seputar produk, material, dan desain custom.</p>
            <div class="rf-botcard__chips">
                @foreach ($bot['chips'] as $chip)
                    <button class="rf-chip" type="button" data-rf-chat-open data-rf-chat-q="{{ $chip }}">{{ $chip }}</button>
                @endforeach
            </div>
            <button class="rf-btn rf-btn--solid rf-btn--block" type="button" data-rf-chat-open>{!! $icon('chat') !!} Mulai Chat</button>
        </aside>
    </div>
</section>
