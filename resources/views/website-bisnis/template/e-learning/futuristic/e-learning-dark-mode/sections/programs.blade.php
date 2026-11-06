@php($r = $e['route'])
@php($full = $full ?? false)
<section @class(['nl-sec nl-sec--programs', 'nl-card' => ! $full]) id="programs" aria-labelledby="programs-title">
    @if(! $full)
        <div class="nl-head">
            <div>
                <h2 id="programs-title">Program Unggulan</h2>
                <p>Kursus terbaik pilihan untuk meningkatkan skill dan karier kamu.</p>
            </div>
            <a class="nl-link" href="{{ route($r.'programs') }}">Lihat Semua <svg class="ic"><use href="#i-arrow"/></svg></a>
        </div>
    @else
        <h2 class="nl-sr" id="programs-title">Daftar program</h2>
        <div class="nl-toolbar" data-programs-tools>
            <div class="nl-toolbar__top">
                <form class="nl-search nl-search--sm" id="cari" role="search" onsubmit="return false">
                    <svg class="ic"><use href="#i-search"/></svg>
                    <label class="nl-sr" for="prog-q">Cari program</label>
                    <input id="prog-q" type="search" placeholder="Cari nama program, level, atau kategori..." data-prog-q autocomplete="off">
                    <button type="button" class="nl-search__clear" data-prog-clear hidden aria-label="Hapus pencarian"><svg class="ic"><use href="#i-close"/></svg></button>
                </form>
                <label class="nl-sort"><span>Urutkan</span>
                    <select data-prog-sort>
                        <option value="default">Rekomendasi</option>
                        <option value="price-asc">Harga terendah</option>
                        <option value="price-desc">Harga tertinggi</option>
                        <option value="name">Nama A–Z</option>
                        <option value="hours">Durasi tersingkat</option>
                    </select>
                </label>
            </div>
            <div class="nl-chips" role="group" aria-label="Filter level">
                <button type="button" class="is-on" data-level="all">Semua Level</button>
                <button type="button" data-level="beginner">Beginner</button>
                <button type="button" data-level="intermediate">Intermediate</button>
                <button type="button" data-level="advanced">Advanced</button>
            </div>
            <div class="nl-chips" role="group" aria-label="Filter kategori">
                <button type="button" class="is-on" data-cat="all">Semua Kategori</button>
                @foreach($e['categories'] as $key => $c)
                    <button type="button" data-cat="{{ $key }}">{{ $c['label'] }}</button>
                @endforeach
            </div>
            <div class="nl-resultbar">
                <p role="status" aria-live="polite">Menampilkan <strong data-count>{{ count($e['programs']) }}</strong> dari {{ count($e['programs']) }} program</p>
                <button type="button" class="nl-linkbtn" data-prog-reset hidden>Reset filter</button>
            </div>
        </div>
    @endif

    <div @class(['nl-programs', 'nl-programs--full' => $full]) data-programs>
        @foreach($e['programs'] as $p)
            <article class="nl-program" data-level="{{ strtolower($p['level']) }}" data-cat="{{ $p['cat'] }}" data-i="{{ $loop->index }}"
                     data-price="{{ $p['price'] }}" data-hours="{{ $p['hours'] }}" data-name="{{ strtolower($p['title']) }}"
                     data-k="{{ strtolower($p['title'].' '.$p['level'].' '.($e['categories'][$p['cat']]['label'] ?? '')) }}">
                <a class="nl-program__media" href="{{ route($r.'registration', ['program' => $p['slug']]) }}" tabindex="-1" aria-hidden="true">
                    <img src="{{ asset($e['img'].'/'.$p['img']) }}" alt="" loading="lazy" width="326" height="180">
                    <span class="nl-level nl-level--{{ strtolower($p['level']) }}">{{ $p['level'] }}</span>
                </a>
                <div class="nl-program__body">
                    <h3><a href="{{ route($r.'registration', ['program' => $p['slug']]) }}">{{ $p['title'] }}</a></h3>
                    <p class="nl-meta">
                        <span><svg class="ic"><use href="#i-file"/></svg>{{ $p['modules'] }} Modul</span>
                        <span><svg class="ic"><use href="#i-clock"/></svg>{{ $p['hours'] }} Jam</span>
                    </p>
                    <div class="nl-program__foot">
                        <strong>Rp {{ number_format($p['price'], 0, ',', '.') }}</strong>
                        <a class="nl-round nl-round--sm" href="{{ route($r.'registration', ['program' => $p['slug']]) }}" aria-label="Daftar {{ $p['title'] }}"><svg class="ic"><use href="#i-arrow"/></svg></a>
                    </div>
                </div>
            </article>
        @endforeach
    </div>
    @if($full)
        <div class="nl-empty" data-empty hidden>
            <p>Belum ada program yang cocok dengan pencarian ini.</p>
            <button type="button" class="nl-btn nl-btn--ghost" data-prog-reset>Reset filter</button>
        </div>
    @endif
</section>
