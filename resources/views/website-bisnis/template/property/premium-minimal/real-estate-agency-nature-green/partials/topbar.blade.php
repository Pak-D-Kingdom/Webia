<div class="topbar">
    <div class="container container--nav topbar__in">
        <ul class="topbar__info">
            <li><svg class="i" aria-hidden="true"><use href="#i-pin"/></svg><span>{{ $t['contact']['address'] }}</span></li>
            <li><svg class="i" aria-hidden="true"><use href="#i-mail"/></svg><a href="mailto:{{ $t['contact']['email'] }}">{{ $t['contact']['email'] }}</a></li>
            <li><svg class="i" aria-hidden="true"><use href="#i-clock"/></svg><span>{{ $t['contact']['hours'] }}</span></li>
        </ul>
        <div class="topbar__side">
            <ul class="socials">
                @foreach ($t['socials'] as $s)
                    <li><a href="{{ $s['url'] }}" aria-label="{{ $s['label'] }}" target="_blank" rel="noopener"><svg class="i" aria-hidden="true"><use href="#i-{{ $s['icon'] }}"/></svg></a></li>
                @endforeach
            </ul>
            <a class="topbar__phone" href="tel:{{ $t['contact']['phone_tel'] }}"><svg class="i" aria-hidden="true"><use href="#i-phone"/></svg><span>{{ $t['contact']['phone'] }}</span></a>
        </div>
    </div>
</div>
