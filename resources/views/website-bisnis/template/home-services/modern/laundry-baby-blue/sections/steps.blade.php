@php $mode = $mode ?? 'preview'; @endphp
@if ($mode === 'preview')
<article class="lb-card lb-steps-card" aria-labelledby="lb-steps-title">
    <header class="lb-card__head">
        <span class="lb-card__icon"><svg class="lb-i" aria-hidden="true"><use href="#i-clipboard"/></svg></span>
        <div><h2 class="lb-card__title" id="lb-steps-title"><a href="{{ route('webia.laundry-baby-blue.cara-order') }}">Cara Order Laundry</a></h2><p class="lb-card__sub">Order laundry jadi lebih mudah.</p></div>
    </header>
    <ol class="lb-steps">
        @foreach ($laundry['steps'] as $i => $s)
            <li class="lb-step">
                <span class="lb-step__ico"><svg class="lb-i" aria-hidden="true"><use href="#i-{{ $s['icon'] }}"/></svg></span>
                <span class="lb-step__txt">{{ $i + 1 }}. {{ $s['title'] }}<br>{{ $s['title2'] }}</span>
            </li>
        @endforeach
    </ol>
</article>
@else
<section class="lb-section" aria-label="Cara order laundry">
    <div class="lb-container">
        <ol class="lb-flow">
            @foreach ($laundry['steps'] as $i => $s)
                <li class="lb-flow__item">
                    <span class="lb-flow__num" aria-hidden="true">{{ $i + 1 }}</span>
                    <article class="lb-card lb-flow__card">
                        <span class="lb-step__ico"><svg class="lb-i" aria-hidden="true"><use href="#i-{{ $s['icon'] }}"/></svg></span>
                        <h2>{{ $s['title'] }} {{ $s['title2'] }}</h2>
                        <p>{{ $s['text'] }}</p>
                    </article>
                </li>
            @endforeach
        </ol>

        <div class="lb-tips">
            <h2 class="lb-tips__title">Tips agar order lancar</h2>
            <ul class="lb-tips__grid">
                @foreach ($laundry['order_tips'] as $t)
                    <li class="lb-tip">
                        <span class="lb-tip__ico"><svg class="lb-i" aria-hidden="true"><use href="#i-{{ $t['icon'] }}"/></svg></span>
                        <div><h3>{{ $t['title'] }}</h3><p>{{ $t['text'] }}</p></div>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="lb-flow__cta">
            <a class="lb-btn lb-btn--primary lb-btn--lg" href="{{ route('webia.laundry-baby-blue.order-inquiry') }}"><svg class="lb-i" aria-hidden="true"><use href="#i-calendar-check"/></svg>Mulai Order</a>
            <a class="lb-btn lb-btn--outline lb-btn--lg" href="https://wa.me/{{ $laundry['contact']['whatsapp'] }}?text={{ rawurlencode($laundry['contact']['wa_greeting']) }}" target="_blank" rel="noopener"><svg class="lb-i" aria-hidden="true"><use href="#i-whatsapp"/></svg>Tanya via WhatsApp</a>
        </div>
    </div>
</section>
@endif
