@php $full = ($mode ?? 'preview') === 'full'; $rows = $full ? $e['schedules'] : array_slice($e['schedules'], 0, 3); @endphp
<section class="{{ $full ? 'el-section ' : '' }}el-schedules {{ $full ? 'is-full' : 'el-panel' }}" id="schedules" aria-labelledby="schedulesTitle">
    @if ($full)<div class="el-container">@endif
    <header class="el-head el-head--sm">
        <div>
            <h2 class="el-title" id="schedulesTitle">{{ $e['pages']['schedules']['title'] }}</h2>
            <p class="el-sub">{{ $full ? 'Pilih kelas live yang cocok dengan waktumu.' : 'Jadwal kelas terbaru untuk kamu.' }}</p>
        </div>
        @unless ($full)<a class="el-link" href="{{ route('elearning.schedules') }}">Lihat Semua <svg class="el-ico" aria-hidden="true"><use href="#i-arrow"/></svg></a>@endunless
    </header>

    @if ($full)
        <div class="el-chips el-toolbar" role="group" aria-label="Filter program" data-filter-group="program">
            <button type="button" class="el-chip is-active" data-filter="all" aria-pressed="true">Semua program</button>
            @foreach ($e['programs'] as $p)
                <button type="button" class="el-chip" data-filter="{{ $p['slug'] }}" aria-pressed="false">{{ $p['title'] }}</button>
            @endforeach
        </div>
    @endif

    <ul class="el-schedule-list" data-schedule-list>
        @foreach ($rows as $s)
            <li class="el-schedule" data-program="{{ $s['program'] }}">
                <div class="el-date" aria-hidden="true"><strong>{{ $s['day'] }}</strong><span>{{ $s['month'] }}</span></div>
                <div class="el-schedule__info">
                    <h3>{{ $s['title'] }}</h3>
                    <p><span class="el-sr">{{ $s['day'] }} {{ $s['month'] }}, </span>{{ $s['time'] }}</p>
                    @if ($full)<p class="el-schedule__meta"><svg class="el-ico" aria-hidden="true"><use href="#i-user"/></svg>{{ $s['teacher'] }} · sisa {{ $s['left'] }} dari {{ $s['quota'] }} kursi</p>@endif
                </div>
                <span class="el-badge {{ $s['mode'] === 'Online' ? 'el-badge--online' : 'el-badge--hybrid' }}">{{ $s['mode'] }}</span>
                @if ($full)
                    <a class="el-btn el-btn--soft el-btn--sm" href="{{ route('elearning.registration', ['schedule' => $s['title']]) }}">Daftar kelas</a>
                @endif
            </li>
        @endforeach
    </ul>
    @if ($full)<p class="el-empty" data-empty hidden>Belum ada jadwal untuk program ini.</p></div>@endif
</section>
