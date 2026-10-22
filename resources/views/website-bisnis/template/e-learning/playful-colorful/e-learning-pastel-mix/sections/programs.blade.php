{{-- Programs. $full=false → preview beranda (4 kartu); $full=true → halaman lengkap + filter --}}
@php
    $full  = $full ?? false;
    $items = $full ? $t['programs'] : array_slice($t['programs'], 0, 4);
    $cats  = ['web' => 'Web Development', 'uiux' => 'UI/UX Design', 'marketing' => 'Digital Marketing', 'data' => 'Data Science', 'english' => 'Bahasa Inggris', 'business' => 'Business & Finance'];
@endphp
<section id="programs" class="{{ $full ? 'block' : 'panel panel--programs' }}" aria-labelledby="programs-title" @if ($full) data-filter-root @endif>
    @if (! $full)
        <header class="panel__head panel__head--sub">
            <div>
                <h2 id="programs-title">Program Unggulan <i class="bi bi-patch-check-fill c-green" aria-hidden="true"></i></h2>
                <p>Pilih program terbaik untuk mengembangkan skill kamu.</p>
            </div>
            <a class="link-more" href="{{ route($rp.'programs') }}">Lihat Semua <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
        </header>
    @else
        <h2 id="programs-title" class="sr-only">Daftar program</h2>
        <div class="toolbar">
            <div class="search search--page">
                <div class="search__box">
                    <span class="search__ico" aria-hidden="true"><i class="bi bi-search"></i></span>
                    <label class="sr-only" for="program-q">Cari program</label>
                    <input id="program-q" class="search__input" type="search" data-filter-search placeholder="Cari program, contoh: web, desain, marketing..." value="{{ request('q') }}" autocomplete="off">
                    <button class="search__clear" type="button" data-filter-clear aria-label="Hapus pencarian" hidden><i class="bi bi-x-circle-fill" aria-hidden="true"></i></button>
                </div>
                <p class="search__count" data-filter-count role="status" aria-live="polite"></p>
            </div>
            <div class="chips" role="group" aria-label="Filter kategori">
                <button type="button" class="chip is-active" data-filter="all" aria-pressed="true">Semua</button>
                @foreach ($cats as $key => $label)
                    <button type="button" class="chip" data-filter="{{ $key }}" aria-pressed="false">{{ $label }}</button>
                @endforeach
            </div>
            <div class="chips chips--level" role="group" aria-label="Filter level">
                <button type="button" class="chip is-active" data-level-filter="all" aria-pressed="true">Semua Level</button>
                @foreach (['beginner' => 'Beginner', 'intermediate' => 'Intermediate', 'advanced' => 'Advanced'] as $key => $label)
                    <button type="button" class="chip" data-level-filter="{{ $key }}" aria-pressed="false">{{ $label }}</button>
                @endforeach
            </div>
        </div>
    @endif

    <div class="program-grid {{ $full ? 'program-grid--full' : '' }}" data-filter-list>
        @foreach ($items as $p)
            @include($v.'.partials.program-card', ['p' => $p])
        @endforeach
    </div>
    @if ($full)
        <p class="empty" data-filter-empty hidden><i class="bi bi-emoji-frown" aria-hidden="true"></i> Program tidak ditemukan. Coba kata kunci atau filter lain.</p>
    @endif
</section>
