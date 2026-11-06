{{--
    Schedule.  $full = false → kartu "Jadwal Praktik" di beranda
               $full = true  → halaman Schedule (jam buka + jadwal dokter)
    Baris jam memakai data-* agar JS menandai "hari ini" & status buka/tutup (WIB).
--}}
@php
    $full = $full ?? false;
    $fmt  = fn ($t) => str_replace(':', '.', $t);
@endphp

<section id="schedule" class="cg-section cg-card cg-schedule {{ $full ? 'cg-schedule--full' : 'cg-schedule--preview' }}" aria-labelledby="cg-schedule-title">
    @unless ($full)
        <header class="cg-card__head">
            <h2 id="cg-schedule-title" class="cg-card__title">Jadwal Praktik</h2>
            <a class="cg-link cg-link--xs" href="{{ route('glow.schedule') }}">Lihat Semua</a>
        </header>
        <p class="cg-card__sub">Atur jadwal kunjungan Anda dengan mudah.</p>
    @else
        <header class="cg-status-row">
            <h2 id="cg-schedule-title" class="cg-card__title cg-card__title--lg">Jam Operasional</h2>
            <p class="cg-status" data-cg-status><i class="bi bi-circle-fill" aria-hidden="true"></i> <span>Memeriksa status…</span></p>
        </header>
    @endunless

    <ul class="cg-hours {{ $full ? 'cg-hours--full' : '' }}" data-cg-hours>
        @foreach ($c['schedule']['hours'] as $h)
            <li class="cg-hours__row"
                data-days="{{ implode(',', $h['days']) }}"
                data-open="{{ $h['open'] }}"
                data-close="{{ $h['close'] }}">
                <span class="cg-hours__day"><i class="bi {{ $h['icon'] }}" aria-hidden="true"></i> {{ $h['label'] }}</span>
                <span class="cg-hours__time">{{ $fmt($h['open']) }} - {{ $fmt($h['close']) }}</span>
            </li>
        @endforeach
    </ul>

    @unless ($full)
        <a class="cg-btn cg-btn--primary cg-btn--block cg-btn--sm" href="{{ route('glow.schedule') }}">
            Lihat Jadwal Lengkap <i class="bi bi-arrow-right" aria-hidden="true"></i>
        </a>
    @else
        <h3 class="cg-card__title cg-card__title--lg cg-mt">Jadwal Dokter &amp; Staff</h3>
        <div class="cg-table-wrap" tabindex="0" role="region" aria-label="Jadwal praktik dokter, geser ke samping untuk melihat semua hari">
            <table class="cg-table">
                <thead>
                    <tr>
                        <th scope="col">Dokter / Staff</th>
                        @foreach ($c['schedule']['weekdays'] as $wd)
                            <th scope="col" class="cg-table__day" data-day="{{ $wd[1] }}">{{ $wd[0] }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($c['doctors'] as $d)
                        <tr>
                            <th scope="row">
                                <a href="{{ route('glow.doctors') }}#{{ $d['slug'] }}">{{ $d['name'] }}</a>
                                <small>{{ $d['role'] }}</small>
                            </th>
                            @foreach ($c['schedule']['weekdays'] as $wd)
                                @php $on = in_array($wd[1], $d['days'], true); @endphp
                                <td class="cg-table__day" data-day="{{ $wd[1] }}">
                                    @if ($on)
                                        <i class="bi bi-check-circle-fill cg-on" aria-hidden="true"></i><span class="cg-sr">Praktik</span>
                                    @else
                                        <span class="cg-off" aria-hidden="true">–</span><span class="cg-sr">Tidak praktik</span>
                                    @endif
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <p class="cg-note"><i class="bi bi-info-circle" aria-hidden="true"></i> {{ $c['schedule']['note'] }}</p>
        <a class="cg-btn cg-btn--primary" href="{{ route('glow.appointment') }}">
            Book Appointment <i class="bi bi-arrow-right" aria-hidden="true"></i>
        </a>
    @endunless
</section>
