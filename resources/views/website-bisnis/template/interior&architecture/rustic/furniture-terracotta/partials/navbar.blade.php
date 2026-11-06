<header class="rf-header" data-rf-header>
    <div class="rf-container rf-header__in">
        <a class="rf-logo" href="{{ $r('index') }}" aria-label="{{ $f['meta']['name'] }} — Beranda">
            <span class="rf-logo__mark">{!! $icon('logo') !!}</span>
            <span class="rf-logo__text"><strong>{{ $f['meta']['name'] }}</strong><small>{{ $f['meta']['tagline'] }}</small></span>
        </a>

        <button class="rf-burger" type="button" data-rf-nav-toggle aria-expanded="false" aria-controls="rf-nav" aria-label="Buka menu">
            <span class="rf-burger__open">{!! $icon('menu') !!}</span>
            <span class="rf-burger__close">{!! $icon('close') !!}</span>
        </button>

        <nav class="rf-nav" id="rf-nav" data-rf-nav aria-label="Navigasi utama">
            <ul>
                @foreach ($f['nav'] as $item)
                    @php $active = request()->routeIs($f['route_prefix'] . $item['route']); @endphp
                    <li>
                        <a href="{{ $r($item['route']) }}" @class(['is-active' => $active]) @if ($active) aria-current="page" @endif>{{ $item['label'] }}</a>
                    </li>
                @endforeach
            </ul>
            <a class="rf-btn rf-btn--solid rf-nav__cta" href="{{ $wa }}" target="_blank" rel="noopener">Hubungi Kami {!! $icon('arrow-right') !!}</a>
        </nav>
    </div>
</header>
