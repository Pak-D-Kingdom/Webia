@php($c = $cafe['contact'])
<div class="lm-topbar">
    <div class="lm-container lm-topbar__in">
        <ul class="lm-topbar__info">
            <li><svg class="i" aria-hidden="true"><use href="#i-pin"/></svg><span>{{ $c['address'] }}</span></li>
            <li>
                <svg class="i" aria-hidden="true"><use href="#i-phone"/></svg>
                <a href="tel:{{ preg_replace('/[^\d+]/', '', $c['phone']) }}">{{ $c['phone'] }}</a>
            </li>
            <li><svg class="i" aria-hidden="true"><use href="#i-clock"/></svg><span>{{ $c['open_text'] }}</span></li>
        </ul>

        <div class="lm-topbar__right">
            <ul class="lm-social">
                @foreach ($cafe['social'] as $s)
                    <li><a href="{{ $s['url'] }}" target="_blank" rel="noopener" aria-label="{{ $s['name'] }}"><svg class="i" aria-hidden="true"><use href="#i-{{ $s['icon'] }}"/></svg></a></li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
