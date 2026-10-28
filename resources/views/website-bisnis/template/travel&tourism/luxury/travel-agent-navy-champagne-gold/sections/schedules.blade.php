{{-- Departure schedules. $mode: 'preview' | 'full' --}}
@php
    $full  = ($mode ?? 'preview') === 'full';
    $state = fn ($s) => match ($s['status']) {
        'tersedia' => ['Tersedia', 'ok'],
        'terbatas' => ['Tersisa ' . $s['seats'] . ' kursi', 'low'],
        default    => ['Penuh', 'full'],
    };
    $dests = array_values(array_unique(array_column($t['schedules'], 'destination')));
@endphp

@if (! $full)
    <section class="ga-card ga-card--dark ga-pv ga-sch" aria-labelledby="ga-sch-title">
        <header class="ga-card__head">
            <span class="ga-emblem ga-emblem--dark ga-emblem--sm">{!! $icon('calendar') !!}</span>
            <div>
                <h2 id="ga-sch-title">Jadwal Keberangkatan</h2>
                <p>Pilih tanggal keberangkatan yang sesuai dengan rencana Anda.</p>
            </div>
        </header>
        <ul class="ga-sch__cards">
            @foreach (array_slice($t['schedules'], 0, 4) as $s)
                @php [$label, $tone] = $state($s); $parts = explode(' ', $s['label']); @endphp
                <li>
                    <a class="ga-scard" href="{{ $url('inquiry') }}?destinasi={{ urlencode($s['destination']) }}&tanggal={{ $s['iso'] }}" aria-label="Booking {{ $s['destination'] }}, keberangkatan {{ $s['label'] }}">
                        <span class="ga-scard__day">{{ $parts[0] }}</span>
                        <span class="ga-scard__month">{{ $parts[1] ?? '' }} {{ $parts[2] ?? '' }}</span>
                        <span class="ga-scard__dest">{!! $icon('pin') !!}{{ $s['destination'] }}</span>
                        <span class="ga-chip ga-chip--{{ $tone }}">@if ($tone === 'ok'){!! $icon('check') !!}@endif{{ $label }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
        <div class="ga-pv__foot"><a class="ga-link ga-link--light" href="{{ $url('jadwal') }}">Lihat Semua Jadwal {!! $icon('arrow') !!}</a></div>
    </section>
@else
    <section class="ga-block" aria-label="Jadwal keberangkatan">
        <div class="ga-container">
            <div class="ga-filter" role="group" aria-label="Filter destinasi" data-filter-group>
                <button type="button" class="is-active" data-filter="all">Semua</button>
                @foreach ($dests as $d)
                    <button type="button" data-filter="{{ $d }}">{{ $d }}</button>
                @endforeach
            </div>

            <ul class="ga-srows">
                @foreach ($t['schedules'] as $s)
                    @php [$label, $tone] = $state($s); @endphp
                    <li class="ga-srow" data-filter-item data-value="{{ $s['destination'] }}">
                        <p class="ga-srow__date">{!! $icon('calendar') !!}<time datetime="{{ $s['iso'] }}">{{ $s['label'] }}</time></p>
                        <div class="ga-srow__info">
                            <strong>{{ $s['destination'] }}</strong>
                            <span>{{ $s['package'] }}</span>
                        </div>
                        <span class="ga-chip ga-chip--{{ $tone }}">@if ($tone === 'ok'){!! $icon('check') !!}@endif{{ $label }}</span>
                        <a class="ga-btn {{ $tone === 'full' ? 'ga-btn--ghost' : 'ga-btn--gold' }} ga-btn--xs"
                           href="{{ $url('inquiry') }}?destinasi={{ urlencode($s['destination']) }}&tanggal={{ $s['iso'] }}">{{ $tone === 'full' ? 'Daftar Tunggu' : 'Booking' }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
@endif
