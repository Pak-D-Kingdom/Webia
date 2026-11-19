@php $mode = $mode ?? 'preview'; $hr = $laundry['hours']; @endphp
@if ($mode === 'preview')
<article class="lb-card lb-hours-card" aria-labelledby="lb-hours-title">
    <header class="lb-card__head">
        <span class="lb-card__icon"><svg class="lb-i" aria-hidden="true"><use href="#i-calendar"/></svg></span>
        <div><h2 class="lb-card__title" id="lb-hours-title"><a href="{{ route('webia.laundry-baby-blue.jam') }}">Jam Operasional</a></h2><p class="lb-card__sub">{{ $hr['note'] }}</p></div>
    </header>
    <div class="lb-hours-box">
        <svg class="lb-i lb-hours-box__ico" aria-hidden="true"><use href="#i-clock"/></svg>
        <p><strong>{{ $hr['range'] }}</strong><span>{{ $hr['time'] }}</span></p>
    </div>
    <div class="lb-hours-card__decor" aria-hidden="true">
        <img class="lb-hours-card__plant-l" src="{{ asset($laundry['assets']['img'] . '/hours-plant-left.webp') }}" alt="" width="240" height="228" loading="lazy">
        <img class="lb-hours-card__plant" src="{{ asset($laundry['assets']['img'] . '/hours-plant.webp') }}" alt="" width="210" height="312" loading="lazy">
    </div>
</article>
@else
@php $noteIcons = ['truck', 'chat', 'clock']; @endphp
<section class="lb-section" aria-label="Jam operasional">
    <div class="lb-container lb-hrs">
        <article class="lb-card lb-card--lg lb-hrs__status" data-lb-hours-status>
            <p class="lb-open lb-open--lg" data-lb-open-badge hidden></p>
            <span class="lb-hrs__clock"><svg class="lb-i" aria-hidden="true"><use href="#i-clock"/></svg></span>
            <h2 class="lb-hrs__range">{{ $hr['range'] }}</h2>
            <p class="lb-hrs__time">{{ $hr['time'] }}</p>
            <p class="lb-hrs__sub" data-lb-hours-sub aria-live="polite"></p>
            <div class="lb-hrs__cta">
                <a class="lb-btn lb-btn--primary" href="{{ route('webia.laundry-baby-blue.order-inquiry') }}"><svg class="lb-i" aria-hidden="true"><use href="#i-calendar-check"/></svg>Order Sekarang</a>
                <a class="lb-btn lb-btn--outline" href="https://wa.me/{{ $laundry['contact']['whatsapp'] }}?text={{ rawurlencode($laundry['contact']['wa_greeting']) }}" target="_blank" rel="noopener"><svg class="lb-i" aria-hidden="true"><use href="#i-whatsapp"/></svg>Chat WhatsApp</a>
            </div>
        </article>

        <article class="lb-card lb-card--lg lb-hrs__week">
            <header class="lb-card__head">
                <span class="lb-card__icon"><svg class="lb-i" aria-hidden="true"><use href="#i-calendar"/></svg></span>
                <div><h2 class="lb-card__title">Jadwal Mingguan</h2><p class="lb-card__sub">{{ $hr['note'] }}</p></div>
            </header>
            <ul class="lb-hrs__days" data-lb-hours-list>
                @foreach ($hr['days'] as $i => $d)
                    <li class="lb-hrs__day" data-day="{{ ($i + 1) % 7 }}">
                        <span class="lb-hrs__dname">{{ $d['day'] }}</span>
                        <span class="lb-hrs__tag">Hari ini</span>
                        <span class="lb-hrs__dtime">{{ $d['open'] }} – {{ $d['close'] }} WIB</span>
                    </li>
                @endforeach
            </ul>
        </article>

        <ul class="lb-hrs__notes">
            @foreach ($hr['notes'] as $i => $n)
                <li class="lb-card lb-hrs__note">
                    <span class="lb-step__ico"><svg class="lb-i" aria-hidden="true"><use href="#i-{{ $noteIcons[$i] ?? 'clock' }}"/></svg></span>
                    <p>{{ $n }}</p>
                </li>
            @endforeach
        </ul>
    </div>
</section>
@endif
