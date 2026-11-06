@php $c = $site['contact']; @endphp
<div class="lc-topbar">
    <div class="lc-wrap lc-topbar__in">
        <ul class="lc-topbar__list">
            <li class="lc-topbar__item lc-topbar__item--loc">
                <svg class="lc-ico" aria-hidden="true"><use href="#lc-i-pin"></use></svg>
                <span>{{ $c['location'] }}</span>
            </li>
            <li class="lc-topbar__item lc-topbar__item--hours">
                <svg class="lc-ico" aria-hidden="true"><use href="#lc-i-clock"></use></svg>
                <span>{{ $c['hours'] }}</span>
            </li>
            <li class="lc-topbar__item">
                <svg class="lc-ico" aria-hidden="true"><use href="#lc-i-phone"></use></svg>
                <a href="tel:{{ $c['phone_href'] }}">{{ $c['phone'] }}</a>
            </li>
            <li class="lc-topbar__item lc-topbar__item--mail">
                <svg class="lc-ico" aria-hidden="true"><use href="#lc-i-mail"></use></svg>
                <a href="mailto:{{ $c['email'] }}">{{ $c['email'] }}</a>
            </li>
        </ul>
    </div>
</div>
