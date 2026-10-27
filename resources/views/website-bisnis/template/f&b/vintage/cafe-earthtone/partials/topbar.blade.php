@php
    $socials = collect($cafe['socials'])->whereIn('key', $cafe['topbar_socials']);
@endphp
<div class="kl-topbar">
    <div class="kl-topbar__inner">
        <p class="kl-topbar__item kl-topbar__slogan">
            <svg class="kl-icon" aria-hidden="true"><use href="#kl-i-cup"/></svg>
            <span>{{ $cafe['brand']['slogan'] }}</span>
        </p>

        <p class="kl-topbar__item kl-topbar__addr">
            <svg class="kl-icon" aria-hidden="true"><use href="#kl-i-pin"/></svg>
            <span>{{ $cafe['contact']['address_short'] }}</span>
        </p>

        <p class="kl-topbar__item kl-topbar__phone">
            <svg class="kl-icon" aria-hidden="true"><use href="#kl-i-phone"/></svg>
            <a href="tel:+{{ preg_replace('/\D/', '', $cafe['contact']['phone']) }}">{{ $cafe['contact']['phone'] }}</a>
        </p>

        <div class="kl-topbar__right">
            <p class="kl-topbar__item kl-topbar__hours">
                <svg class="kl-icon" aria-hidden="true"><use href="#kl-i-clock"/></svg>
                <span>{{ $cafe['topbar']['hours'] }}</span>
            </p>
            <ul class="kl-socials kl-socials--bare">
                @foreach ($socials as $s)
                    <li>
                        <a href="{{ $s['url'] }}" target="_blank" rel="noopener" aria-label="{{ $s['label'] }}">
                            <svg class="kl-icon" aria-hidden="true"><use href="#kl-i-{{ $s['key'] }}"/></svg>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
