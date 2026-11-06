{{-- Course content. $full=true → ringkasan + daftar modul (accordion) --}}
@php
    $full  = $full ?? false;
    $c     = $t['course'];
    $mods  = $c['modules'];
    $total = count($mods);
    $done  = count(array_filter($mods, fn ($m) => $m['done']));
    $pct   = (int) round($done / max($total, 1) * 100);
    $next  = array_key_first(array_filter($mods, fn ($m) => ! $m['done']));
    $items = $full ? $mods : array_slice($mods, 0, 3);
@endphp

<section id="course-content" class="{{ $full ? 'block' : 'panel panel--course' }}" aria-labelledby="course-title">
    @if (! $full)
        <header class="panel__head">
            <h2 id="course-title">Course Content</h2>
            <a class="link-more" href="{{ route($rp.'course-content') }}">Lihat Semua <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
        </header>
    @else
        <h2 id="course-title" class="sr-only">Isi kursus</h2>
    @endif

    <div class="{{ $full ? 'course course--full' : 'course' }}">
        <div class="course__sum {{ $full ? 'card' : '' }}">
            <div class="course__top">
                <img class="course__thumb" src="{{ $img.$c['image'] }}" alt="" width="450" height="240" loading="lazy">
                <div class="course__info">
                    <h3>{{ $c['title'] }}</h3>
                    <ul class="pcard__meta"><li><i class="bi bi-journal-text" aria-hidden="true"></i>{{ $total }} Modul</li><li><i class="bi bi-clock-fill" aria-hidden="true"></i>{{ $c['hours'] }} Jam</li></ul>
                </div>
            </div>
            <div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="{{ $pct }}" aria-label="Progres belajar">
                <div class="progress__row"><span>Progress {{ $done }}/{{ $total }}</span><strong>{{ $pct }}%</strong></div>
                <div class="progress__track"><span class="progress__bar" style="--p: {{ $pct }}%"></span></div>
            </div>
            @if ($full)
                <a class="btn btn--primary btn--block" href="{{ route($rp.'member-area') }}">Lanjutkan Belajar <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
            @endif
        </div>

        @if (! $full)
            <ol class="modlist">
                @foreach ($items as $i => $m)
                    <li class="{{ $m['done'] ? 'is-done' : '' }}">
                        <span class="modlist__n">{{ $i + 1 }}.</span><span class="modlist__t">{{ $m['title'] }}</span>
                        <i class="bi {{ $m['done'] ? 'bi-check2' : 'bi-circle' }} modlist__s" aria-label="{{ $m['done'] ? 'Selesai' : 'Belum selesai' }}"></i>
                    </li>
                @endforeach
            </ol>
            <a class="btn btn--outline btn--block" href="{{ route($rp.'course-content') }}">Lanjutkan Belajar <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
        @else
            <div class="modules">
                @foreach ($items as $i => $m)
                    <details class="module {{ $m['done'] ? 'is-done' : '' }}" @if ($i === $next) open @endif>
                        <summary>
                            <span class="module__n">{{ $i + 1 }}</span>
                            <span class="module__t">{{ $m['title'] }}</span>
                            <span class="module__state"><i class="bi {{ $m['done'] ? 'bi-check-circle-fill' : 'bi-circle' }}" aria-label="{{ $m['done'] ? 'Selesai' : 'Belum selesai' }}"></i></span>
                            <i class="bi bi-chevron-down module__chev" aria-hidden="true"></i>
                        </summary>
                        <div class="module__body">
                            <p>{{ $m['summary'] }}</p>
                            <ul class="tags"><li>{{ $m['lessons'] }} materi</li><li>{{ $m['minutes'] }} menit</li>@if ($i === $next)<li class="tags__hot">Lanjutkan di sini</li>@endif</ul>
                        </div>
                    </details>
                @endforeach
            </div>
        @endif
    </div>
</section>
