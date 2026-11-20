@extends('website-bisnis.template.interior&architecture.rustic.architecture-building-design-chocolate-luxe.layouts.app')
@section('title', 'Proses Proyek Kami — ArchiDesign')
@section('active', 'proses')
@section('content')
@php
    $site = config('template.interior&architecture.rustic.architecture-building-design-chocolate-luxe.architecture-building-design')
        ?: require config_path('template/interior&architecture/rustic/architecture-building-design-chocolate-luxe/architecture-building-design.php');
    $u   = fn (string $p = '') => url($site['base'] . $p);
    $img = fn (string $f) => asset($site['img'] . '/' . $f);
    $v   = $site['view'];
@endphp
@include($v . '.partials.page-hero', ['key' => 'proses'])

<section class="abd-section">
    <div class="abd-container">

        <div class="abd-gantt" data-reveal>
            <div class="abd-sec-head"><h2>Alur Proyek dalam Sekilas</h2><p>Lebar tiap tahap menggambarkan perkiraan porsi waktunya. Klik tahap untuk melihat detail.</p></div>
            <div class="abd-gantt__bar">
                @foreach ($site['process'] as $s)
                    <button type="button" class="abd-gantt__seg" style="flex: {{ $s['weight'] }} 1 0" data-goto="{{ $loop->iteration }}" aria-label="Tahap {{ $loop->iteration }}: {{ $s['title'] }}, {{ $s['time'] }}">
                        <span class="abd-gantt__n">{{ $loop->iteration }}</span>
                        <span class="abd-gantt__t">{{ $s['title'] }}</span>
                        <span class="abd-gantt__d">{{ $s['time'] }}</span>
                    </button>
                @endforeach
            </div>
        </div>

        <div class="abd-flow" data-flow data-reveal>
            <ol class="abd-flow__list" role="tablist" aria-label="Tahap proyek" aria-orientation="vertical">
                @foreach ($site['process'] as $s)
                    <li>
                        <button type="button" role="tab" id="abd-tab-{{ $loop->iteration }}" aria-controls="abd-panel-{{ $loop->iteration }}" aria-selected="{{ $loop->first ? 'true' : 'false' }}" data-step="{{ $loop->iteration }}" class="abd-flow__tab {{ $loop->first ? 'is-active' : '' }}">
                            <span class="abd-flow__num">{{ $loop->iteration }}</span>
                            <span class="abd-flow__ico" aria-hidden="true"><svg class="i"><use href="#i-{{ $s['icon'] }}"/></svg></span>
                            <span class="abd-flow__txt"><strong>{{ $s['title'] }}</strong><small>{{ $s['time'] }}</small></span>
                        </button>
                    </li>
                @endforeach
            </ol>

            <div class="abd-flow__stage">
                <div class="abd-flow__progress" aria-hidden="true"><i data-flow-bar></i></div>
                @foreach ($site['process'] as $s)
                    <article class="abd-flow__panel {{ $loop->first ? 'is-active' : '' }}" role="tabpanel" id="abd-panel-{{ $loop->iteration }}" aria-labelledby="abd-tab-{{ $loop->iteration }}" data-panel="{{ $loop->iteration }}" @if (!$loop->first) hidden @endif>
                        <header class="abd-flow__head">
                            <span class="abd-flow__badge" aria-hidden="true"><svg class="i"><use href="#i-{{ $s['icon'] }}"/></svg></span>
                            <div><p class="abd-flow__kicker">Tahap {{ $loop->iteration }} dari {{ $loop->count }}</p><h3>{{ $s['title'] }}</h3></div>
                            <span class="abd-pill"><svg class="i" aria-hidden="true"><use href="#i-clock"/></svg>{{ $s['time'] }}</span>
                        </header>
                        <p class="abd-flow__desc">{{ $s['desc'] }}</p>
                        <div class="abd-flow__roles">
                            <div class="abd-role abd-role--we"><span aria-hidden="true"><svg class="i"><use href="#i-compass"/></svg></span><h4>Yang kami lakukan</h4><p>{{ $s['we'] }}</p></div>
                            <div class="abd-role abd-role--you"><span aria-hidden="true"><svg class="i"><use href="#i-user"/></svg></span><h4>Peran Anda</h4><p>{{ $s['you'] }}</p></div>
                        </div>
                        <div class="abd-flow__out"><h4>Hasil yang Anda terima</h4><ul class="abd-chips">@foreach ($s['out'] as $o)<li>{{ $o }}</li>@endforeach</ul></div>
                        <footer class="abd-flow__nav">
                            <button type="button" class="abd-btn abd-btn--outline abd-btn--sm" data-flow-prev @if ($loop->first) disabled @endif><svg class="i abd-flip" aria-hidden="true"><use href="#i-arrow"/></svg><span>Sebelumnya</span></button>
                            @if ($loop->last)
                                <a class="abd-btn abd-btn--primary abd-btn--sm" href="{{ $u('/konsultasi') }}"><span>Mulai dengan Konsultasi</span><svg class="i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
                            @else
                                <button type="button" class="abd-btn abd-btn--primary abd-btn--sm" data-flow-next><span>Tahap berikutnya</span><svg class="i" aria-hidden="true"><use href="#i-arrow"/></svg></button>
                            @endif
                        </footer>
                    </article>
                @endforeach
            </div>
        </div>
    </div>
</section>
@include($v . '.partials.cta')
@endsection
