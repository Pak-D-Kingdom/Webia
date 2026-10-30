@php $mode = $mode ?? 'preview'; @endphp
@if ($mode === 'preview')
<article class="lb-card lb-cov-card" aria-labelledby="lb-cov-title">
    <header class="lb-card__head">
        <span class="lb-card__icon"><svg class="lb-i" aria-hidden="true"><use href="#i-truck"/></svg></span>
        <div><h2 class="lb-card__title" id="lb-cov-title">Area Pickup &amp; Delivery</h2><p class="lb-card__sub">Layanan antar–jemput laundry.</p></div>
    </header>
    <div class="lb-cov">
        <img class="lb-cov__map" src="{{ $lbAsset('img', 'coverage-map.webp') }}" alt="Peta area antar-jemput Surabaya dengan kurir BlueLaundry" width="432" height="462" loading="lazy">
        <ul class="lb-cov__list">
            @foreach ($laundry['areas'] as $a)
                <li><svg class="lb-i" aria-hidden="true"><use href="#i-pin"/></svg>{{ $a['name'] }}</li>
            @endforeach
        </ul>
    </div>
    <a class="lb-btn lb-btn--outline lb-btn--sm lb-btn--block" href="{{ $lbRoute('area') }}">Cek Jangkauan Area <svg class="lb-i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
</article>
@else
<section class="lb-section" aria-label="Area pickup dan delivery">
    <div class="lb-container lb-split lb-split--map">
        <article class="lb-card lb-card--lg lb-checker" data-lb-area-check aria-labelledby="lb-chk-title">
            <header class="lb-card__head">
                <span class="lb-card__icon"><svg class="lb-i" aria-hidden="true"><use href="#i-truck"/></svg></span>
                <div><h2 class="lb-card__title" id="lb-chk-title">Cek Jangkauan Area</h2><p class="lb-card__sub">Pilih area Anda untuk melihat ketentuan antar–jemput.</p></div>
            </header>
            <img class="lb-checker__map" src="{{ $lbAsset('img', 'coverage-map.webp') }}" alt="Peta area antar-jemput Surabaya dengan kurir BlueLaundry" width="432" height="462" loading="lazy">
            <label class="lb-label">Area Anda
                <span class="lb-field lb-field--select">
                    <svg class="lb-i lb-field__ico" aria-hidden="true"><use href="#i-pin"/></svg>
                    <select data-lb-area-select>
                        <option value="">Pilih area di Surabaya</option>
                        @foreach ($laundry['areas'] as $a)<option value="{{ $a['key'] }}">{{ $a['name'] }}</option>@endforeach
                    </select>
                    <svg class="lb-i lb-field__chev" aria-hidden="true"><use href="#i-chevron"/></svg>
                </span>
            </label>
            <div class="lb-checker__result" data-lb-area-result aria-live="polite">Pilih area untuk melihat biaya dan estimasi penjemputan.</div>
            <a class="lb-btn lb-btn--primary lb-btn--block" href="{{ $lbRoute('order-inquiry') }}">Jadwalkan Jemput</a>
        </article>

        <ul class="lb-area-grid">
            @foreach ($laundry['areas'] as $a)
                <li>
                    <article class="lb-card lb-area" id="area-{{ $a['key'] }}">
                        <h2><svg class="lb-i" aria-hidden="true"><use href="#i-pin"/></svg>{{ $a['name'] }}</h2>
                        <p class="lb-area__places">{{ $a['places'] }}</p>
                        <p class="lb-area__meta"><span>{{ $a['fee'] }}</span><span>{{ $a['eta'] }}</span></p>
                    </article>
                </li>
            @endforeach
        </ul>
    </div>
</section>
@endif
