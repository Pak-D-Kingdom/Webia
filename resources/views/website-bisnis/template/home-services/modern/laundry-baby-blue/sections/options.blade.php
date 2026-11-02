@php
    $mode = $mode ?? 'preview';
    $prefill = ['Regular' => 'Cuci Kering (Regular)', 'Express' => 'Cuci Setrika (Express)', 'Premium Care' => 'Premium Care'];
    $eta = collect($laundry['turnaround'])->keyBy('key');
@endphp
@if ($mode === 'preview')
<article class="lb-card lb-opts" aria-labelledby="lb-opts-title">
    <header class="lb-card__head">
        <span class="lb-card__icon"><svg class="lb-i" aria-hidden="true"><use href="#i-gear"/></svg></span>
        <div><h2 class="lb-card__title" id="lb-opts-title"><a href="{{ route('webia.laundry-baby-blue.pilihan') }}">Pilihan Layanan</a></h2><p class="lb-card__sub">Sesuaikan dengan kebutuhan Anda.</p></div>
    </header>
    <ul class="lb-optlist">
        @foreach ($laundry['options'] as $o)
            <li>
                <a class="lb-opt" href="{{ route('webia.laundry-baby-blue.pilihan') }}#{{ \Illuminate\Support\Str::slug($o['key']) }}">
                    <span class="lb-opt__ico"><svg class="lb-i" aria-hidden="true"><use href="#i-{{ $o['icon'] }}"/></svg></span>
                    <span class="lb-opt__txt"><strong>{{ $o['key'] }}</strong><small>{{ $o['sub'] }}</small></span>
                    <svg class="lb-opt__check" aria-hidden="true"><use href="#i-check-badge"/></svg>
                </a>
            </li>
        @endforeach
    </ul>
</article>
@else
<section class="lb-section" aria-label="Pilihan layanan">
    <div class="lb-container">
        <ul class="lb-opt-grid">
            @foreach ($laundry['options'] as $o)
                <li id="{{ \Illuminate\Support\Str::slug($o['key']) }}">
                    <article class="lb-card lb-opt-card lb-opt-card--{{ \Illuminate\Support\Str::slug($o['key']) }}">
                        <span class="lb-opt-card__ico"><svg class="lb-i" aria-hidden="true"><use href="#i-{{ $o['icon'] }}"/></svg></span>
                        <h2>{{ $o['key'] }}</h2>
                        <p class="lb-opt-card__sub">{{ $o['sub'] }}</p>
                        <p class="lb-opt-card__long">{{ $o['long'] }}</p>
                        <ul class="lb-checklist">
                            @foreach ($o['features'] as $f)
                                <li><svg class="lb-i" aria-hidden="true"><use href="#i-check"/></svg>{{ $f }}</li>
                            @endforeach
                        </ul>
                        <dl class="lb-opt-card__meta">
                            <div><dt>Estimasi</dt><dd>{{ $eta[$o['key']]['time'] ?? '-' }}</dd></div>
                            <div><dt>Harga</dt><dd>{{ $o['price_note'] }}</dd></div>
                        </dl>
                        <a class="lb-btn lb-btn--primary lb-btn--block" href="{{ route('webia.laundry-baby-blue.order-inquiry') }}?layanan={{ rawurlencode($prefill[$o['key']] ?? $o['key']) }}">Pilih {{ $o['key'] }}</a>
                    </article>
                </li>
            @endforeach
        </ul>
    </div>
</section>
@endif
