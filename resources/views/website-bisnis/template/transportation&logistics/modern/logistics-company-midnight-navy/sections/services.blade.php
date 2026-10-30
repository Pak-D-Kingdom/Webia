@php
    $s    = $site['services'];
    $rp   = $site['route_prefix'];
    $full = $full ?? false;
@endphp
@if (! $full)
    <div class="lc-services">
        <div class="lc-services__intro">
            <h2 class="lc-services__title" id="lc-services-title"><a href="{{ route($rp . 'services') }}">{{ $s['title'] }}</a></h2>
            <p>{{ $s['subtitle'] }}</p>
            <a class="lc-link" href="{{ route($rp . 'services') }}">{{ $s['more'] }}
                <svg class="lc-ico" aria-hidden="true"><use href="#lc-i-arrow"></use></svg>
            </a>
        </div>
        <ul class="lc-services__list">
            @foreach ($s['items'] as $it)
                <li>
                    <a class="lc-svc" href="{{ route($rp . 'services') }}">
                        <span class="lc-svc__ico" aria-hidden="true"><svg class="lc-ico"><use href="#lc-i-{{ $it['icon'] }}"></use></svg></span>
                        <span class="lc-svc__name">{{ $it['title'] }}</span>
                        <span class="lc-svc__go" aria-hidden="true"><svg class="lc-ico"><use href="#lc-i-arrow"></use></svg></span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
@else
    <ul class="lc-svcgrid">
        @foreach ($s['items'] as $it)
            <li class="lc-svccard">
                <span class="lc-svccard__ico" aria-hidden="true"><svg class="lc-ico"><use href="#lc-i-{{ $it['icon'] }}"></use></svg></span>
                <h2 class="lc-svccard__title">{{ $it['title'] }}</h2>
                <p>{{ $it['desc'] }}</p>
                <ul class="lc-ticks">
                    @foreach ($it['points'] as $pt)
                        <li><svg class="lc-ico" aria-hidden="true"><use href="#lc-i-check"></use></svg>{{ $pt }}</li>
                    @endforeach
                </ul>
                <a class="lc-link" href="{{ route($rp . 'quotation') }}">Minta penawaran
                    <svg class="lc-ico" aria-hidden="true"><use href="#lc-i-arrow"></use></svg>
                </a>
            </li>
        @endforeach
    </ul>
@endif
