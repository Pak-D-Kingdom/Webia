<header class="bca-nav" data-bca-nav>
    <div class="bca-wrap bca-nav__in">
        <a class="bca-brand" href="{{ route($site['routes']['home']) }}" aria-label="{{ $site['name'] }}, kembali ke beranda">
            <span class="bca-brand__mark" aria-hidden="true"></span>
            <span class="bca-brand__word">{{ $site['short_name'] }}<small>studio</small></span>
        </a>

        <nav class="bca-nav__menu" aria-label="Navigasi utama">
            <ul>
                @foreach($site['nav'] as $item)
                    @if(!in_array($item['route'], ['team', 'clients', 'testimonials', 'journal', 'contact']))
                        <li><a class="bca-nav__link @if($current === $item['route']) is-active @endif" href="{{ route($site['routes'][$item['route']]) }}" @if($current === $item['route']) aria-current="page" @endif>{{ $item['label'] }}</a></li>
                    @endif
                @endforeach
                <li class="bca-nav__more" data-bca-more>
                    <button type="button" class="bca-nav__link @if(in_array($current, ['team', 'clients', 'testimonials', 'journal', 'contact'])) is-active @endif" aria-expanded="false" aria-controls="bca-more-menu" data-bca-more-toggle>
                        More @include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.icon', ['name' => 'chevron'])
                    </button>
                    <div class="bca-nav__sub" id="bca-more-menu" data-open="false">
                        <p class="bca-nav__sub-title">Jelajahi lebih jauh</p>
                        @foreach($site['nav'] as $item)
                            @if(in_array($item['route'], ['team', 'clients', 'testimonials', 'journal', 'contact']))
                                <a class="bca-subcard @if($current === $item['route']) is-active @endif" data-t="{{ $loop->index % 4 }}" href="{{ route($site['routes'][$item['route']]) }}" @if($current === $item['route']) aria-current="page" @endif>
                                    <span class="bca-subcard__ico">@include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.icon', ['name' => $item['icon']])</span>
                                    <span class="bca-subcard__txt"><b>{{ $item['label'] }}</b><small>{{ $item['desc'] }}</small></span>
                                    <span class="bca-subcard__go" aria-hidden="true">@include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.icon', ['name' => 'arrow-right'])</span>
                                </a>
                            @endif
                        @endforeach
                    </div>
                </li>
            </ul>
        </nav>

        <button type="button" class="bca-nav__search" aria-label="Cari di situs" aria-haspopup="dialog" data-bca-search-open>
            @include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.icon', ['name' => 'search'])<span class="bca-nav__kbd" aria-hidden="true">Ctrl K</span>
        </button>

        <a class="bca-btn bca-btn--sm bca-nav__cta" href="{{ route($site['routes']['contact']) }}">Start a Project @include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.icon', ['name' => 'arrow'])</a>

        <button type="button" class="bca-nav__toggle" aria-expanded="false" aria-controls="bca-drawer" aria-label="Buka menu" data-bca-menu-toggle>
            <span class="bca-burger" aria-hidden="true"><i></i><i></i><i></i></span>
        </button>
    </div>
</header>

<div class="bca-drawer" id="bca-drawer" data-open="false" data-bca-drawer aria-hidden="true">
    <nav aria-label="Navigasi seluler">
        <ul>
            @foreach($site['nav'] as $item)
                <li><a class="bca-drawer__link @if($current === $item['route']) is-active @endif" href="{{ route($site['routes'][$item['route']]) }}" @if($current === $item['route']) aria-current="page" @endif>{{ $item['label'] }}</a></li>
            @endforeach
        </ul>
    </nav>
    <a class="bca-btn" href="{{ route($site['routes']['contact']) }}">Start a Project @include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.icon', ['name' => 'arrow'])</a>
    <div class="bca-drawer__meta">
        <span>{{ $site['contact']['email'] }}</span>
        <span>{{ $site['contact']['phone'] }}</span>
        <span>{{ $site['contact']['hours'] }}</span>
    </div>
</div>
