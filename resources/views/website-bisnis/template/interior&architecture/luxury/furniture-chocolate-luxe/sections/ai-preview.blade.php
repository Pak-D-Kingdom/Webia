@php
    $f = $furniture;
    $a = fn ($path) => asset($path);
    $r = fn ($key) => route($f['routes'][$key]);
    $ai = $f['ai'];
@endphp
<article class="lf-card lf-card--light lf-aicard">
    <div class="lf-aicard__main">
        <div class="lf-aicard__figure">
            <img src="{{ $a($ai['image']) }}" alt="Luxe, maskot AI Assistant LuxeFurni" loading="lazy">
            <span class="lf-aicard__bubble">{{ $ai['bubble'] }}</span>
        </div>
        <div class="lf-aicard__copy">
            <h2 class="lf-aicard__title"><svg class="ic"><use href="#i-chat"/></svg> {{ $ai['title'] }}</h2>
            <p>{{ $ai['text'] }}</p>
            <div class="lf-aicard__actions">
                <button class="lf-btn lf-btn--brown lf-btn--sm" type="button" data-chat-open>Mulai Chat <svg class="ic"><use href="#i-arrow"/></svg></button>
                <a class="lf-link" href="{{ $r('ai-chat') }}">Lihat semua FAQ</a>
            </div>
        </div>
    </div>
    <ul class="lf-aicard__faq">
        @foreach ($ai['suggestions'] as $q)
            <li><button type="button" data-chat-ask="{{ $q }}"><span class="lf-aicard__dot"><svg class="ic"><use href="#i-chat"/></svg></span><span>{{ $q }}</span></button></li>
        @endforeach
    </ul>
</article>
