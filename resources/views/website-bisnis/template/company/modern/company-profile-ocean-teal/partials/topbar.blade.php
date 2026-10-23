@php $t = $z['topbar']; @endphp
<div class="ot-topbar">
    <div class="ot-container ot-topbar__inner">
        <ul class="ot-topbar__info">
            <li><svg class="ot-ic" aria-hidden="true"><use href="#i-pin"/></svg><span>{{ $t['address'] }}</span></li>
            <li><svg class="ot-ic" aria-hidden="true"><use href="#i-mail"/></svg><a href="mailto:{{ $t['email'] }}">{{ $t['email'] }}</a></li>
            <li><svg class="ot-ic" aria-hidden="true"><use href="#i-clock"/></svg><span>{{ $t['hours'] }}</span></li>
        </ul>
        <div class="ot-topbar__end">
            <ul class="ot-social">
                @foreach ($z['socials'] as $s)
                    <li><a href="{{ $s['url'] }}" aria-label="{{ $s['label'] }}" target="_blank" rel="noopener"><svg class="ot-ic" aria-hidden="true"><use href="#i-{{ $s['icon'] }}"/></svg></a></li>
                @endforeach
            </ul>
            <a class="ot-topbar__phone" href="tel:{{ $t['phone_href'] }}"><svg class="ot-ic" aria-hidden="true"><use href="#i-phone"/></svg><span>{{ $t['phone'] }}</span></a>
        </div>
    </div>
</div>
