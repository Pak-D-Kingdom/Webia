<div class="tb">
    <div class="lw-wrap tb__in">
        <ul class="tb__info">
            <li><svg class="ic"><use href="#i-pin"/></svg><span>{{ $c['contact']['address'] }}</span></li>
            <li><svg class="ic"><use href="#i-phone"/></svg><a href="tel:{{ $c['contact']['phone_tel'] }}">{{ $c['contact']['phone'] }}</a></li>
            <li><svg class="ic"><use href="#i-mail"/></svg><a href="mailto:{{ $c['contact']['email'] }}">{{ $c['contact']['email'] }}</a></li>
            <li><svg class="ic"><use href="#i-clock"/></svg><span>{{ $c['contact']['hours'] }}</span></li>
        </ul>
        <div class="tb__right">
            <ul class="tb__social">
                @foreach ($c['social'] as $s)
                    <li><a href="{{ $s['url'] }}" aria-label="{{ $s['label'] }}" target="_blank" rel="noopener"><svg class="ic"><use href="#i-{{ $s['icon'] }}"/></svg></a></li>
                @endforeach
            </ul>
            <span class="tb__lang" aria-label="Bahasa">ID <svg class="ic"><use href="#i-chev"/></svg></span>
        </div>
    </div>
</div>
