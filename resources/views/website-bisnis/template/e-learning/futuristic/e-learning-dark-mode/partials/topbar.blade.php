@php($t = $e['topbar'])
<div class="nl-topbar">
    <div class="nl-container nl-topbar__in">
        <span class="nl-topbar__item nl-hide-md"><svg class="ic"><use href="#i-pin"/></svg>{{ $t['address'] }}</span>
        <a class="nl-topbar__item nl-hide-sm" href="mailto:{{ $t['email'] }}"><svg class="ic"><use href="#i-mail"/></svg>{{ $t['email'] }}</a>
        <span class="nl-topbar__item"><svg class="ic"><use href="#i-clock"/></svg>{{ $t['hours'] }}</span>
        <ul class="nl-topbar__social nl-hide-md" aria-label="Media sosial">
            @foreach($e['socials'] as $s)
                <li><a href="{{ $s['url'] }}" aria-label="{{ $s['label'] }}"><svg class="ic"><use href="#i-{{ $s['icon'] }}"/></svg></a></li>
            @endforeach
        </ul>
        <a class="nl-topbar__item" href="tel:{{ $t['phone_href'] }}"><svg class="ic"><use href="#i-phone"/></svg>{{ $t['phone'] }}</a>
    </div>
</div>
