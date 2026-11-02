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
    <img class="lb-hours-card__plant" src="{{ asset($laundry['assets']['img'] . '/hours-plant.webp') }}" alt="" width="210" height="312" loading="lazy">
    <img class="lb-hours-card__plant-l" src="{{ asset($laundry['assets']['img'] . '/hours-plant-left.webp') }}" alt="" aria-hidden="true" width="240" height="228" loading="lazy">
</article>
@else
<section class="lb-section" aria-label="Jam operasional">
    <div class="lb-container lb-container--narrow">
        <article class="lb-card lb-card--lg">
            <header class="lb-card__head">
                <span class="lb-card__icon"><svg class="lb-i" aria-hidden="true"><use href="#i-calendar"/></svg></span>
                <div><h2 class="lb-card__title">Jam Operasional</h2><p class="lb-card__sub">{{ $hr['note'] }}</p></div>
            </header>
            <p class="lb-open lb-open--lg" data-lb-open-badge hidden></p>
            <ul class="lb-hours-list" data-lb-hours-list>
                @foreach ($hr['days'] as $i => $d)
                    <li class="lb-hours-list__row" data-day="{{ ($i + 1) % 7 }}">
                        <span>{{ $d['day'] }}</span><span>{{ $d['open'] }} – {{ $d['close'] }} WIB</span>
                    </li>
                @endforeach
            </ul>
            <ul class="lb-notes">
                @foreach ($hr['notes'] as $n)<li>{{ $n }}</li>@endforeach
            </ul>
        </article>
    </div>
</section>
@endif
