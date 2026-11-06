@php
    $full = ($mode ?? 'preview') === 'full';
    $list = $full ? $e['courses'] : [$e['courses'][0]];
@endphp

<section class="{{ $full ? 'el-section ' : 'el-section el-section--tight ' }}el-coursec {{ $full ? 'is-full' : 'is-preview' }}" id="course-content" aria-labelledby="courseTitle">
    <div class="el-container">
        <header class="el-head">
            <div>
                <h2 class="el-title" id="courseTitle">{{ $e['pages']['course-content']['title'] }}</h2>
                <p class="el-sub">{{ $e['pages']['course-content']['sub'] }}</p>
            </div>
            @unless ($full)<a class="el-link" href="{{ route('elearning.course-content') }}">Lihat Semua <svg class="el-ico" aria-hidden="true"><use href="#i-arrow"/></svg></a>@endunless
        </header>

        @if ($full)
            <div class="el-chips el-toolbar" role="tablist" aria-label="Pilih kursus" data-course-tabs>
                @foreach ($e['courses'] as $c)
                    <button type="button" role="tab" class="el-chip {{ $loop->first ? 'is-active' : '' }}" id="tab-{{ $c['slug'] }}" aria-controls="panel-{{ $c['slug'] }}" aria-selected="{{ $loop->first ? 'true' : 'false' }}" data-course="{{ $c['slug'] }}">{{ $c['title'] }}</button>
                @endforeach
            </div>
        @endif

        @foreach ($list as $c)
            <div class="el-course" id="panel-{{ $c['slug'] }}" @if ($full) role="tabpanel" aria-labelledby="tab-{{ $c['slug'] }}" data-course-panel="{{ $c['slug'] }}" @if (!$loop->first) hidden @endif @endif>
                <div class="el-course__summary el-card el-card--blue">
                    <img src="{{ $img('cta-books.jpg') }}" alt="" loading="lazy" width="927" height="264">
                    <div class="el-course__summary-body">
                        <h3>{{ $c['title'] }}</h3>
                        <p>{{ $c['summary'] }}</p>
                        <ul class="el-course__meta">
                            <li><svg class="el-ico" aria-hidden="true"><use href="#i-user"/></svg>{{ $c['teacher'] }}</li>
                            <li><svg class="el-ico" aria-hidden="true"><use href="#i-clock"/></svg>{{ $c['hours'] }}</li>
                            <li><svg class="el-ico" aria-hidden="true"><use href="#i-book"/></svg>{{ count($c['modules']) }} modul · {{ collect($c['modules'])->sum('lessons') }} materi</li>
                            <li><svg class="el-ico" aria-hidden="true"><use href="#i-award"/></svg>Level {{ $c['level'] }}</li>
                        </ul>
                        <a class="el-btn el-btn--white el-btn--sm" href="{{ route('elearning.registration', ['program' => $c['program']]) }}">Daftar kursus ini</a>
                    </div>
                </div>

                <div class="el-accordion" data-accordion>
                    @foreach ($c['modules'] as $i => $m)
                        @php $id = $c['slug'].'-'.$i; $open = $i === 0; @endphp
                        <div class="el-acc-item {{ $open ? 'is-open' : '' }}">
                            <h4 class="el-acc-head">
                                <button type="button" class="el-acc-btn" id="accb-{{ $id }}" aria-expanded="{{ $open ? 'true' : 'false' }}" aria-controls="accp-{{ $id }}">
                                    <span class="el-acc-num">{{ $i + 1 }}</span>
                                    <span class="el-acc-title">{{ $m['title'] }}<small>{{ $m['lessons'] }} materi · {{ $m['duration'] }}</small></span>
                                    @if ($m['free'])<span class="el-tag-free">Preview gratis</span>@endif
                                    <svg class="el-ico el-acc-chev" aria-hidden="true"><use href="#i-chevron"/></svg>
                                </button>
                            </h4>
                            <div class="el-acc-panel" id="accp-{{ $id }}" role="region" aria-labelledby="accb-{{ $id }}" @unless ($open) hidden @endunless>
                                <ul>
                                    @foreach ($m['items'] as $it)
                                        <li><svg class="el-ico" aria-hidden="true"><use href="#{{ $m['free'] ? 'i-video' : 'i-lock' }}"/></svg>{{ $it }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</section>
