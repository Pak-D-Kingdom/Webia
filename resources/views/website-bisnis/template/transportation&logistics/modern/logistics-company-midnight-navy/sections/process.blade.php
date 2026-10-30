@php
    $pr   = $site['process'];
    $rp   = $site['route_prefix'];
    $full = $full ?? false;
@endphp
@if (! $full)
    <div class="lc-block lc-process">
        <h2 class="lc-block__title lc-block__title--dark"><a href="{{ route($rp . 'process') }}">{{ $pr['title'] }}</a></h2>
        <p class="lc-block__sub lc-block__sub--dark">{{ $pr['subtitle'] }}</p>
        <ol class="lc-steps">
            @foreach ($pr['steps'] as $i => $st)
                <li class="lc-step">
                    <span class="lc-step__ico" aria-hidden="true"><svg class="lc-ico"><use href="#lc-i-{{ $st['icon'] }}"></use></svg></span>
                    <span class="lc-step__name">{{ $i + 1 }}. {{ $st['title'] }}</span>
                </li>
            @endforeach
        </ol>
    </div>
@else
    <ol class="lc-timeline">
        @foreach ($pr['steps'] as $i => $st)
            <li class="lc-timeline__item">
                <span class="lc-timeline__ico" aria-hidden="true"><svg class="lc-ico"><use href="#lc-i-{{ $st['icon'] }}"></use></svg></span>
                <div class="lc-timeline__body">
                    <span class="lc-timeline__no">Tahap {{ $i + 1 }}</span>
                    <h2>{{ $st['title'] }}</h2>
                    <p>{{ $st['desc'] }}</p>
                </div>
            </li>
        @endforeach
    </ol>
@endif
