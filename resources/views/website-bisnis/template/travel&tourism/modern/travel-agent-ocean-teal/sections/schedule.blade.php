{{-- Departure schedules. $mode: preview | page --}}
@php
    $full = ($mode ?? 'preview') === 'page';
    $label = ['tersedia' => 'Tersedia', 'terbatas' => 'Terbatas', 'penuh' => 'Penuh'];
    $items = $full ? $ta['schedules'] : array_slice($ta['schedules'], 0, 4);
@endphp

@if (! $full)
    <article class="ta-panel ta-panel--sched" aria-labelledby="ta-sched-title">
        @include($ns . '.partials.section-head', [
            'ico' => 'calendar', 'id' => 'ta-sched-title', 'title' => 'Jadwal Keberangkatan',
            'sub' => 'Tersedia jadwal keberangkatan setiap minggu / bulan.',
            'href' => $routes['jadwal'], 'label' => 'Lihat Semua Jadwal',
        ])
        <ul class="ta-sch-list">
            @foreach ($items as $s)
                <li>
                    <a class="ta-sch" href="{{ $routes['inquiry'] }}?dest={{ $s['dest'] }}&amp;tgl={{ $s['iso'] }}">
                        <span class="ta-sch__date"><b>{{ $s['day'] }}</b><span>{{ $s['month'] }}</span><small>{{ $s['year'] }}</small></span>
                        <span class="ta-sch__info">
                            <strong>{{ $s['name'] }}</strong>
                            <span class="ta-sch__pkg">{{ $s['package'] }} · {{ $s['seats'] > 0 ? 'Sisa ' . $s['seats'] . ' kursi' : 'Kuota penuh' }}</span>
                        </span>
                        <span class="ta-sch__end">
                            <span class="ta-sch__stat ta-sch__stat--{{ $s['status'] }}">{{ $label[$s['status']] }}</span>
                            <span class="ta-sch__go" aria-hidden="true">{{ $icon('right') }}</span>
                        </span>
                    </a>
                </li>
            @endforeach
        </ul>
    </article>
@else
    <section class="ta-section" aria-label="Jadwal keberangkatan">
        <div class="ta-container">
            <div class="ta-toolbar" data-ta-filter data-param="status">
                <div class="ta-chips" role="group" aria-label="Filter status">
                    <button type="button" class="ta-chip is-active" data-filter="*" aria-pressed="true">Semua</button>
                    @foreach ($label as $k => $v)
                        <button type="button" class="ta-chip" data-filter="{{ $k }}" aria-pressed="false">{{ $v }}</button>
                    @endforeach
                </div>
                <p class="ta-count" data-ta-count aria-live="polite"></p>

                <ul class="ta-sched-list" data-ta-items>
                    @foreach ($items as $s)
                        <li class="ta-sched" data-cat="{{ $s['status'] }}">
                            <div class="ta-sched__date"><b>{{ $s['day'] }}</b><span>{{ $s['month'] }} {{ $s['year'] }}</span></div>
                            <div class="ta-sched__info">
                                <h3>{{ $s['package'] }}</h3>
                                <p>{{ $icon('pin') }}{{ $s['name'] }} <span class="ta-dot"></span> {{ $icon('users') }}{{ $s['seats'] > 0 ? 'Sisa ' . $s['seats'] . ' kursi' : 'Kuota penuh' }}</p>
                            </div>
                            <span class="ta-status ta-status--{{ $s['status'] }}">{{ $icon('check') }}{{ $label[$s['status']] }}</span>
                            @if ($s['status'] === 'penuh')
                                <a class="ta-btn ta-btn--outline ta-btn--sm" href="{{ $routes['inquiry'] }}?dest={{ $s['dest'] }}">Daftar tunggu</a>
                            @else
                                <a class="ta-btn ta-btn--primary ta-btn--sm" href="{{ $routes['inquiry'] }}?dest={{ $s['dest'] }}&amp;tgl={{ $s['iso'] }}">Pesan {{ $icon('arrow') }}</a>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
@endif
