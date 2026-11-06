@php $full = ($mode ?? 'preview') === 'full'; @endphp
<section class="el-section el-programs {{ $full ? 'is-full' : 'is-preview' }}" id="programs" aria-labelledby="programsTitle">
    <div class="el-container">
        <header class="el-head">
            <div>
                <h2 class="el-title" id="programsTitle">{{ $e['pages']['programs']['title'] }}</h2>
                <p class="el-sub">{{ $e['pages']['programs']['sub'] }}</p>
            </div>
            @unless ($full)
                <a class="el-link" href="{{ route('elearning.programs') }}">Lihat Semua <svg class="el-ico" aria-hidden="true"><use href="#i-arrow"/></svg></a>
            @endunless
        </header>

        @if ($full)
            <div class="el-toolbar">
                <div class="el-chips" role="group" aria-label="Filter level" data-filter-group="level">
                    <button type="button" class="el-chip is-active" data-filter="all" aria-pressed="true">Semua level</button>
                    <button type="button" class="el-chip" data-filter="pemula" aria-pressed="false">Pemula</button>
                    <button type="button" class="el-chip" data-filter="menengah" aria-pressed="false">Menengah</button>
                    <button type="button" class="el-chip" data-filter="lanjutan" aria-pressed="false">Lanjutan</button>
                </div>
                <label class="el-field-inline">
                    <span class="el-sr">Cari program</span>
                    <svg class="el-ico" aria-hidden="true"><use href="#i-search"/></svg>
                    <input type="search" placeholder="Cari program atau topik" data-program-search>
                </label>
            </div>
        @endif

        <div class="el-programs__grid" data-program-grid>
            @foreach ($e['programs'] as $p)
                @php
                    $attrs = 'data-level="'.implode(' ', $p['levels']).'" data-name="'.e(mb_strtolower($p['title'].' '.implode(' ', $p['topics']))).'"';
                @endphp
                @if ($full)
                    <article class="el-program" {!! $attrs !!}>
                        <span class="el-program__icon"><img src="{{ $img($p['icon']) }}" alt="" width="64" height="64" loading="lazy"></span>
                        <div class="el-program__body">
                            <h3>{{ $p['title'] }}</h3>
                            <p>{{ $p['desc'] }}</p>
                            <ul class="el-tags">@foreach ($p['topics'] as $t)<li>{{ $t }}</li>@endforeach</ul>
                            <p class="el-program__meta"><span>{{ $p['courses'] }} kursus</span><span>{{ $p['level'] }}</span></p>
                            <a class="el-btn el-btn--soft el-btn--sm" href="{{ route('elearning.registration', ['program' => $p['slug']]) }}">Daftar program<svg class="el-ico" aria-hidden="true"><use href="#i-arrow"/></svg></a>
                        </div>
                    </article>
                @else
                    <a class="el-program" href="{{ route('elearning.programs') }}#programs" {!! $attrs !!}>
                        <span class="el-program__icon"><img src="{{ $img($p['icon']) }}" alt="" width="56" height="56" loading="lazy"></span>
                        <span class="el-program__body"><h3>{{ $p['title'] }}</h3></span>
                    </a>
                @endif
            @endforeach
        </div>
        @if ($full)<p class="el-empty" data-empty hidden>Belum ada program yang cocok. Coba ubah filter atau kata kunci.</p>@endif
    </div>
</section>
