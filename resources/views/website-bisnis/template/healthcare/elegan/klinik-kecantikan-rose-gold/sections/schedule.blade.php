{{-- Jadwal. $full=false: kartu ringkas | $full=true: halaman Jadwal --}}
@php $full = $full ?? false; $sc = $c['schedule']; @endphp

@if (! $full)
<aside class="rg-card rg-sched" id="jadwal" aria-labelledby="rgSchedTitle">
    <div class="rg-sched__head">
        <span class="rg-roundicon"><i class="bi bi-calendar2-week" aria-hidden="true"></i></span>
        <div>
            <h2 id="rgSchedTitle" class="rg-h4">{{ $sc['title'] }}</h2>
            <p>{{ $sc['text'] }}</p>
        </div>
    </div>
    <a class="rg-btn rg-btn--outline rg-btn--sm" href="{{ route($rp . 'schedule') }}">Lihat Semua Jadwal <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
    <dl class="rg-hours">
        @foreach ($sc['hours'] as $hr)
            <div class="{{ $hr['open'] ? '' : 'is-closed' }}"><dt>{{ $hr['day'] }}</dt><dd>{{ $hr['time'] }}</dd></div>
        @endforeach
    </dl>
</aside>
@else
<section class="rg-section" aria-labelledby="rgSchedTitle">
    <div class="rg-container rg-sched-full">
        <div class="rg-card rg-sched-full__hours">
            <h2 id="rgSchedTitle" class="rg-h3">Jam Praktik Klinik</h2>
            <dl class="rg-hours rg-hours--lg">
                @foreach ($sc['hours'] as $hr)
                    <div class="{{ $hr['open'] ? '' : 'is-closed' }}"><dt>{{ $hr['day'] }}</dt><dd>{{ $hr['time'] }}</dd></div>
                @endforeach
            </dl>
            <p class="rg-note"><i class="bi bi-info-circle" aria-hidden="true"></i>{{ $sc['note'] }}</p>
            <a class="rg-btn rg-btn--primary" href="{{ route($rp . 'appointment') }}">Booking Appointment</a>
        </div>

        <div class="rg-card rg-sched-full__matrix">
            <h2 class="rg-h3">Jadwal Dokter &amp; Staff</h2>
            <div class="rg-tablewrap" tabindex="0" role="region" aria-label="Tabel jadwal dokter">
                <table class="rg-table">
                    <thead>
                        <tr>
                            <th scope="col">Nama</th>
                            @foreach ($sc['week'] as $day)<th scope="col">{{ \Illuminate\Support\Str::substr($day, 0, 3) }}</th>@endforeach
                            <th scope="col">Jam</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($c['doctors'] as $d)
                            <tr>
                                <th scope="row"><a href="{{ route($rp . 'doctors') }}#{{ $d['slug'] }}">{{ $d['name'] }}</a><small>{{ $d['role'] }}</small></th>
                                @foreach ($sc['week'] as $day)
                                    <td>
                                        @if (in_array($day, $d['days']))
                                            <i class="bi bi-check-circle-fill rg-yes" aria-hidden="true"></i><span class="rg-sr">Praktik</span>
                                        @else
                                            <span class="rg-no" aria-hidden="true">–</span><span class="rg-sr">Tidak praktik</span>
                                        @endif
                                    </td>
                                @endforeach
                                <td class="rg-nowrap">{{ $d['time'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endif
