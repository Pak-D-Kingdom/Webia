<div class="topbar"><div class="container">
    <ul>
        <li><a href="tel:+{{ config('cafe.whatsapp') }}"><svg class="i" aria-hidden="true"><use href="#i-phone"/></svg>{{ config('cafe.phone') }}</a></li>
        <li><a href="mailto:{{ config('cafe.email') }}"><svg class="i" aria-hidden="true"><use href="#i-mail"/></svg>{{ config('cafe.email') }}</a></li>
        <li class="topbar__addr"><svg class="i" aria-hidden="true"><use href="#i-pin"/></svg>{{ config('cafe.address') }}, {{ config('cafe.city_short') }}</li>
    </ul>
    <div class="social"><span class="topbar__follow">Follow Us</span> @include("$v.partials.social")</div>
</div></div>
