@php
    $f = $furniture;
    $r = fn ($key) => route($f['routes'][$key]);
    $l = $f['lead_time'];
@endphp
<section class="lf-section">
    <div class="lf-container">
        <div class="lf-lead">
            <div class="lf-lead__est lf-card--paper" data-estimator>
                <h2 class="lf-serif">Hitung estimasi produksi</h2>
                <p class="lf-form__lead">Pilih jenis pesanan untuk melihat perkiraan lama pengerjaan.</p>
                <div class="lf-radios" role="radiogroup" aria-label="Jenis pesanan">
                    @foreach ($l['types'] as $key => $type)
                        <label class="lf-radio">
                            <input type="radio" name="lead-type" value="{{ $key }}" @checked($loop->first)>
                            <span><strong>{{ $type['label'] }}</strong><small>{{ $type['text'] }}</small></span>
                        </label>
                    @endforeach
                </div>
                <div class="lf-result" aria-live="polite">
                    <p class="lf-result__label">Perkiraan produksi</p>
                    <p class="lf-result__value" data-est-weeks>2 - 3 minggu</p>
                    <p class="lf-result__date" data-est-date></p>
                </div>
                <a class="lf-btn lf-btn--brown lf-btn--block" href="{{ $r('order') }}">Mulai Pesanan <svg class="ic"><use href="#i-arrow"/></svg></a>
            </div>

            <ol class="lf-timeline">
                @foreach ($l['steps'] as $i => $step)
                    <li class="lf-timeline__item">
                        <span class="lf-timeline__icon"><svg class="ic"><use href="#i-{{ $step['icon'] }}"/></svg></span>
                        <div>
                            <p class="lf-timeline__time">Tahap {{ $i + 1 }} &middot; {{ $step['time'] }}</p>
                            <h3>{{ $step['title'] }}</h3>
                            <p>{{ $step['text'] }}</p>
                        </div>
                    </li>
                @endforeach
            </ol>
        </div>
        <p class="lf-note">{{ $l['note'] }}</p>
    </div>
</section>
