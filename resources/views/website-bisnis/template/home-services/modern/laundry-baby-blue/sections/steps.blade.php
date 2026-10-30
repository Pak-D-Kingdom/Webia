@php $mode = $mode ?? 'preview'; @endphp
@if ($mode === 'preview')
<article class="lb-card lb-steps-card" aria-labelledby="lb-steps-title">
    <header class="lb-card__head">
        <span class="lb-card__icon"><svg class="lb-i" aria-hidden="true"><use href="#i-clipboard"/></svg></span>
        <div><h2 class="lb-card__title" id="lb-steps-title">Cara Order Laundry</h2><p class="lb-card__sub">Order laundry jadi lebih mudah.</p></div>
    </header>
    <ol class="lb-steps">
        @foreach ($laundry['steps'] as $i => $s)
            <li class="lb-step">
                <span class="lb-step__ico"><svg class="lb-i" aria-hidden="true"><use href="#i-{{ $s['icon'] }}"/></svg></span>
                <span class="lb-step__txt">{{ $i + 1 }}. {{ $s['title'] }}<br>{{ $s['title2'] }}</span>
            </li>
        @endforeach
    </ol>
    <a class="lb-btn lb-btn--ghost lb-btn--sm lb-card__link" href="{{ $lbRoute('cara-order') }}">Lihat Panduan <svg class="lb-i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
</article>
@else
<section class="lb-section" aria-label="Cara order laundry">
    <div class="lb-container lb-container--narrow">
        <ol class="lb-timeline">
            @foreach ($laundry['steps'] as $i => $s)
                <li class="lb-timeline__item">
                    <span class="lb-timeline__num" aria-hidden="true">{{ $i + 1 }}</span>
                    <article class="lb-card lb-timeline__card">
                        <span class="lb-step__ico"><svg class="lb-i" aria-hidden="true"><use href="#i-{{ $s['icon'] }}"/></svg></span>
                        <div>
                            <h2>{{ $s['title'] }} {{ $s['title2'] }}</h2>
                            <p>{{ $s['text'] }}</p>
                        </div>
                    </article>
                </li>
            @endforeach
        </ol>
        <div class="lb-timeline__cta">
            <a class="lb-btn lb-btn--primary lb-btn--lg" href="{{ $lbRoute('order-inquiry') }}"><svg class="lb-i" aria-hidden="true"><use href="#i-calendar-check"/></svg>Mulai Order</a>
        </div>
    </div>
</section>
@endif
