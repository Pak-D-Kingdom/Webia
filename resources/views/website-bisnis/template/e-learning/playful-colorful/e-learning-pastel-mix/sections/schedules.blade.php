{{-- Jadwal kelas dengan tab (Hari Ini / Minggu Ini / Mendatang) --}}
@php
    $full = $full ?? false;
    $sid  = $full ? 'full' : 'prev';
    $tm   = array_column($t['teachers'], null, 'slug');
    $tabs = $t['schedules']['tabs'];
@endphp
<section id="schedules" class="{{ $full ? 'block' : 'panel panel--schedules' }}" aria-labelledby="schedules-title" data-tabs>
    @if (! $full)
        <header class="panel__head">
            <h2 id="schedules-title">Jadwal Kelas</h2>
            <a class="link-more" href="{{ route($rp.'schedules') }}">Lihat Semua <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
        </header>
    @else
        <h2 id="schedules-title" class="sr-only">Jadwal kelas</h2>
    @endif

    <div class="tabs" role="tablist" aria-label="Rentang jadwal">
        @foreach ($tabs as $key => $label)
            <button class="tab {{ $loop->first ? 'is-active' : '' }}" type="button" role="tab" id="tab-{{ $key }}-{{ $sid }}"
                    aria-selected="{{ $loop->first ? 'true' : 'false' }}" aria-controls="sch-{{ $key }}-{{ $sid }}"
                    tabindex="{{ $loop->first ? '0' : '-1' }}" data-tab="{{ $key }}">{{ $label }}</button>
        @endforeach
    </div>

    @foreach ($tabs as $key => $label)
        @php $rows = $full ? $t['schedules']['items'][$key] : array_slice($t['schedules']['items'][$key], 0, 4); @endphp
        <ul class="schedule" role="tabpanel" id="sch-{{ $key }}-{{ $sid }}" aria-labelledby="tab-{{ $key }}-{{ $sid }}" @if (! $loop->first) hidden @endif>
            @foreach ($rows as $row)
                @php $tc = $tm[$row['teacher']] ?? null; @endphp
                <li class="srow">
                    <div class="srow__time">
                        @isset($row['label'])<small>{{ $row['label'] }}</small>@endisset
                        <time>{{ $row['time'] }}</time>
                    </div>
                    @if ($tc)<img class="avatar" src="{{ $img.$tc['image'] }}" alt="" width="40" height="40" loading="lazy">@endif
                    <div class="srow__body"><strong>{{ $row['title'] }}</strong><span>{{ $tc['name'] ?? '' }}</span></div>
                    <span class="status status--online">{{ $row['status'] }}</span>
                </li>
            @endforeach
        </ul>
    @endforeach
</section>
