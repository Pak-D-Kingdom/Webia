{{-- ===================== TOPBAR ===================== --}}
<div class="rea-topbar" id="top">
    <div class="rea-container rea-topbar__inner">
        <ul class="rea-topbar__info">
            <li class="rea-topbar__item rea-topbar__item--address">{{ $icon('pin') }}<span>{{ $site['address'] }}</span></li>
            <li class="rea-topbar__item rea-topbar__item--email">{{ $icon('mail') }}<a href="mailto:{{ $site['email'] }}">{{ $site['email'] }}</a></li>
            <li class="rea-topbar__item rea-topbar__item--hours">{{ $icon('clock') }}<span>{{ $site['hours'] }}</span></li>
        </ul>
        <div class="rea-topbar__right">
            <ul class="rea-social" aria-label="Social media">
                @foreach ($site['social'] as $s)
                    <li><a href="{{ $s['url'] }}" aria-label="{{ $s['label'] }}" rel="noopener">{{ $icon($s['icon']) }}</a></li>
                @endforeach
            </ul>
            <a class="rea-topbar__phone" href="tel:{{ preg_replace('/[^+\d]/', '', $site['phone']) }}">{{ $icon('phone') }}<span>{{ $site['phone'] }}</span></a>
        </div>
    </div>
</div>
