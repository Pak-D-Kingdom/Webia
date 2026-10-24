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
            <form class="nl-search nl-search--sm" id="cari" role="search" onsubmit="return false">
                <svg class="ic"><use href="#i-search"/></svg>
                <label class="nl-sr" for="prog-q">Cari program</label>
                <input id="prog-q" type="search" placeholder="Cari kursus yang kamu inginkan..." data-prog-q autocomplete="off">
            </form>
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
        </div>
    @endif

    <div @class(['nl-programs', 'nl-programs--full' => $full]) data-programs>
        @foreach($e['programs'] as $p)
            <article class="nl-program" data-level="{{ strtolower($p['level']) }}" data-cat="{{ $p['cat'] }}" data-title="{{ strtolower($p['title']) }}">
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
        <p class="nl-empty" data-empty hidden>Belum ada program yang cocok dengan filter ini. Coba ubah kata kunci atau kategori.</p>
    @endif
</section>
