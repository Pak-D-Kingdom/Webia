@php $preview = $preview ?? false; @endphp

@if ($preview)
<section class="ta-card ta-sched" aria-labelledby="sched-title">
    <header class="ta-card__head">
        <span class="ta-ico-circle ta-ico-circle--sm"><svg class="ta-i" aria-hidden="true"><use href="#i-calendar"/></svg></span>
        <div>
            <p class="ta-eyebrow">Jadwal</p>
            <h3 id="sched-title">Jadwal Keberangkatan</h3>
            <p>Pilih tanggal keberangkatan yang sesuai dengan kebutuhan Anda.</p>
        </div>
    </header>
    <ul class="ta-sched__list">
        @foreach (array_slice($cfg['schedules'], 0, 4) as $s)
            @php
                $pkg   = collect($cfg['packages'])->firstWhere('slug', $s['package']);
                $parts = explode(' ', $s['label']);
            @endphp
            <li>
                <a class="ta-sitem" href="{{ $r('booking-inquiry') }}?paket={{ $s['package'] }}&amp;tanggal={{ $s['date'] }}" title="Pesan keberangkatan {{ $s['label'] }}">
                    <time class="ta-sitem__date" datetime="{{ $s['date'] }}"><b>{{ $parts[0] }}</b><span>{{ $parts[1] ?? '' }}</span></time>
                    <span class="ta-sitem__main">
                        <strong>{{ $s['destination'] }}</strong>
                        <small>{{ $pkg['duration'] ?? '' }} · Sisa {{ $s['seats'] }} kursi</small>
                    </span>
                    <b class="ta-status ta-status--{{ strtolower($s['status']) }}"><svg class="ta-i" aria-hidden="true"><use href="#i-check-circle"/></svg>{{ $s['status'] }}</b>
                    <span class="ta-sitem__go" aria-hidden="true"><svg class="ta-i" aria-hidden="true"><use href="#i-arrow-right"/></svg></span>
                </a>
            </li>
        @endforeach
    </ul>
    <a class="ta-btn ta-btn--outline ta-btn--sm ta-card__cta" href="{{ $r('jadwal-keberangkatan') }}">Lihat Semua Jadwal <svg class="ta-i ta-i--sm" aria-hidden="true"><use href="#i-arrow-right"/></svg></a>
</section>
@else
<section class="ta-section" aria-label="Jadwal keberangkatan">
    <div class="ta-container">
        <div class="ta-sfull">
            @foreach ($cfg['schedules'] as $s)
                @php $pkg = collect($cfg['packages'])->firstWhere('slug', $s['package']); @endphp
                <article class="ta-srow">
                    <time class="ta-srow__date" datetime="{{ $s['date'] }}">
                        <b>{{ explode(' ', $s['label'])[0] }}</b>
                        <span>{{ explode(' ', $s['label'])[1] }} {{ explode(' ', $s['label'])[2] }}</span>
                    </time>
                    <div class="ta-srow__main">
                        <h3>{{ $s['destination'] }}</h3>
                        <p>{{ $pkg['name'] ?? '' }} · {{ $pkg['duration'] ?? '' }}</p>
                    </div>
                    <div class="ta-srow__meta">
                        <b class="ta-status ta-status--{{ strtolower($s['status']) }}"><svg class="ta-i" aria-hidden="true"><use href="#i-check-circle"/></svg>{{ $s['status'] }}</b>
                        <small><svg class="ta-i" aria-hidden="true"><use href="#i-users"/></svg>Sisa {{ $s['seats'] }} kursi</small>
                    </div>
                    <div class="ta-srow__price">
                        @if ($pkg)<small>Mulai dari</small><b>Rp {{ number_format($pkg['price'], 0, ',', '.') }}</b>@endif
                    </div>
                    <a class="ta-btn ta-btn--primary ta-btn--sm" href="{{ $r('booking-inquiry') }}?paket={{ $s['package'] }}&amp;tanggal={{ $s['date'] }}">Pesan</a>
                </article>
            @endforeach
        </div>
    </div>
</section>
@endif
