@php($r = $e['route'])
@php($full = $full ?? false)
<section @class(['nl-sec nl-sec--schedules', 'nl-card' => ! $full]) id="schedules" aria-labelledby="schedules-title" data-tabs>
    @if(! $full)
        <div class="nl-head">
            <h2 id="schedules-title">Jadwal Kelas</h2>
            <a class="nl-link" href="{{ route($r.'schedules') }}">Lihat Semua <svg class="ic"><use href="#i-arrow"/></svg></a>
        </div>
    @else
        <h2 class="nl-sr" id="schedules-title">Jadwal kelas</h2>
    @endif

    <div class="nl-tabs" role="tablist" aria-label="Rentang jadwal">
        @foreach($e['schedule_tabs'] as $key => $label)
            <button type="button" role="tab" id="tab-{{ $key }}" aria-controls="panel-{{ $key }}" aria-selected="{{ $loop->first ? 'true' : 'false' }}" tabindex="{{ $loop->first ? '0' : '-1' }}" data-tab="{{ $key }}">{{ $label }}</button>
        @endforeach
    </div>

    @foreach($e['schedules'] as $key => $rows)
        <ul class="nl-sched" role="tabpanel" id="panel-{{ $key }}" aria-labelledby="tab-{{ $key }}" @unless($loop->first) hidden @endunless>
            @foreach($rows as $row)
                @php($t = $e['teachers'][$row['teacher']])
                <li>
                    <span class="nl-sched__time">
                        @if($full)<em>{{ $row['day'] }}</em>@endif{{ $row['time'] }}
                    </span>
                    <span class="nl-sched__who">
                        <img src="{{ asset($e['img'].'/'.$t['img']) }}" alt="" width="44" height="44" loading="lazy">
                        <span class="nl-sched__what"><strong>{{ $row['title'] }}</strong><small>{{ $t['name'] }}</small></span>
                    </span>
                    <span class="nl-status">{{ $row['status'] }}</span>
                </li>
            @endforeach
        </ul>
    @endforeach
</section>
