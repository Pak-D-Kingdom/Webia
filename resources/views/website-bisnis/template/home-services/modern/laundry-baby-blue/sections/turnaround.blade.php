@php $mode = $mode ?? 'preview'; @endphp
@if ($mode === 'preview')
<article class="lb-card lb-eta-card" aria-labelledby="lb-eta-title">
    <header class="lb-card__head">
        <span class="lb-card__icon"><svg class="lb-i" aria-hidden="true"><use href="#i-clock"/></svg></span>
        <div><h2 class="lb-card__title" id="lb-eta-title">Estimasi Waktu Pengerjaan</h2><p class="lb-card__sub">Proses cepat, sesuai pilihan layanan.</p></div>
    </header>
    <ul class="lb-eta-list">
        @foreach ($laundry['turnaround'] as $t)
            <li class="lb-eta">
                <svg class="lb-i lb-eta__ico" aria-hidden="true"><use href="#i-{{ $t['icon'] }}"/></svg>
                <strong>{{ $t['key'] }}</strong><span>{{ $t['time'] }}</span>
            </li>
        @endforeach
    </ul>
    <a class="lb-btn lb-btn--ghost lb-btn--sm lb-card__link" href="{{ $lbRoute('estimasi') }}">Hitung Estimasi <svg class="lb-i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
</article>
@else
<section class="lb-section" aria-label="Estimasi waktu pengerjaan">
    <div class="lb-container lb-split">
        <article class="lb-card lb-card--lg lb-eta-card">
            <header class="lb-card__head">
                <span class="lb-card__icon"><svg class="lb-i" aria-hidden="true"><use href="#i-clock"/></svg></span>
                <div><h2 class="lb-card__title">Estimasi Waktu Pengerjaan</h2><p class="lb-card__sub">Proses cepat, sesuai pilihan layanan.</p></div>
            </header>
            <ul class="lb-eta-list lb-eta-list--lg">
                @foreach ($laundry['turnaround'] as $t)
                    <li class="lb-eta">
                        <svg class="lb-i lb-eta__ico" aria-hidden="true"><use href="#i-{{ $t['icon'] }}"/></svg>
                        <strong>{{ $t['key'] }}</strong><span>{{ $t['time'] }}</span>
                    </li>
                @endforeach
            </ul>
            <ul class="lb-notes">
                @foreach ($laundry['turnaround_notes'] as $n)<li>{{ $n }}</li>@endforeach
            </ul>
        </article>

        <article class="lb-card lb-card--lg lb-estimator" data-lb-estimator aria-labelledby="lb-est-title">
            <header class="lb-card__head">
                <span class="lb-card__icon"><svg class="lb-i" aria-hidden="true"><use href="#i-calendar-check"/></svg></span>
                <div><h2 class="lb-card__title" id="lb-est-title">Hitung Perkiraan Selesai</h2><p class="lb-card__sub">Pilih layanan dan waktu penjemputan.</p></div>
            </header>
            <div class="lb-estimator__fields">
                <label class="lb-label">Pilihan layanan
                    <span class="lb-field lb-field--select">
                        <select name="option" data-lb-est-option>
                            @foreach ($laundry['turnaround'] as $t)<option value="{{ $t['key'] }}">{{ $t['key'] }} ({{ $t['time'] }})</option>@endforeach
                        </select>
                        <svg class="lb-i lb-field__chev" aria-hidden="true"><use href="#i-chevron"/></svg>
                    </span>
                </label>
                <label class="lb-label">Laundry dijemput / diserahkan
                    <span class="lb-field"><input type="datetime-local" name="when" data-lb-est-when></span>
                </label>
            </div>
            <div class="lb-estimator__result" data-lb-est-result aria-live="polite">Pilih layanan dan waktu untuk melihat perkiraan selesai.</div>
            <a class="lb-btn lb-btn--primary lb-btn--block" href="{{ $lbRoute('order-inquiry') }}">Order Sekarang</a>
        </article>
    </div>
</section>
@endif
