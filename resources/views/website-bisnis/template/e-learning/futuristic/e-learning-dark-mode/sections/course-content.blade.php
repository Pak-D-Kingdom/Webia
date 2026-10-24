{{-- Catatan: di file ini hanya dipakai satu blok PHP multi-baris; jangan menambah direktif PHP satu baris di sini. --}}
@php
    $r    = $e['route'];
    $full = $full ?? false;
    $c    = $e['course'];

    // Ratakan semua modul (key = nomor modul) tanpa kehilangan key numeriknya
    $all = [];
    foreach ($c['groups'] as $lessons) { foreach ($lessons as $id => $title) { $all[$id] = $title; } }
    $total   = count($all);
    $done    = $c['done'];
    $pct     = (int) round(count($done) / max($total, 1) * 100);
    $current = collect(array_keys($all))->first(fn ($id) => ! in_array($id, $done)) ?? 1;
@endphp

<section @class(['nl-sec nl-sec--course', 'nl-card' => ! $full]) id="course-content" aria-labelledby="course-title" data-course data-total="{{ $total }}" data-done='@json($done)'>
    @if(! $full)
        <div class="nl-head">
            <h2 id="course-title">Course Content</h2>
            <a class="nl-link" href="{{ route($r.'course-content') }}">Lihat Semua <svg class="ic"><use href="#i-arrow"/></svg></a>
        </div>
    @else
        <h2 class="nl-sr" id="course-title">Isi kursus</h2>
    @endif

    <div @class(['nl-course', 'nl-course--full' => $full])>
        <div class="nl-course__player">
            <div class="nl-course__media">
                <img src="{{ asset($e['img'].'/course-preview.png') }}" alt="Pratinjau video kursus {{ $c['title'] }}" width="360" height="124" loading="lazy">
                <button class="nl-play" type="button" aria-label="Putar pratinjau" data-play><svg class="ic"><use href="#i-play"/></svg></button>
            </div>
            <p class="nl-course__now"><small>Sedang dipelajari</small><strong data-now>{{ $current }}. {{ $all[$current] }}</strong></p>
            <div class="nl-progress-row">
                <div class="nl-progress" role="progressbar" aria-label="Progres kursus" aria-valuemin="0" aria-valuemax="100" aria-valuenow="{{ $pct }}" data-progress><i style="width:{{ $pct }}%"></i></div>
                <span data-progress-text>{{ $pct }}%</span>
            </div>
        </div>

        <div class="nl-course__list">
            @foreach($c['groups'] as $label => $lessons)
                @php $shown = $full ? $lessons : array_slice($lessons, 0, 4, true); @endphp
                @if($full)<details class="nl-acc" @if($loop->first) open @endif><summary>{{ $label }}<svg class="ic"><use href="#i-chevron"/></svg></summary>@endif
                <ul class="nl-lessons">
                    @foreach($shown as $id => $title)
                        <li @class(['nl-lesson', 'is-done' => in_array($id, $done), 'is-current' => $id === $current]) data-lesson="{{ $id }}">
                            <button type="button" class="nl-lesson__btn" data-pick="{{ $id }}. {{ $title }}">
                                <span class="nl-lesson__n">{{ $id }}.</span><span class="nl-lesson__t">{{ $title }}</span>
                            </button>
                            <button type="button" class="nl-lesson__done" data-done-btn aria-pressed="{{ in_array($id, $done) ? 'true' : 'false' }}" aria-label="Tandai selesai: {{ $title }}">
                                <svg class="ic ic-check"><use href="#i-check"/></svg><svg class="ic ic-play"><use href="#i-play"/></svg>
                            </button>
                        </li>
                    @endforeach
                </ul>
                @if($full)</details>@endif
                @break(! $full)
            @endforeach
        </div>
    </div>
</section>
