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
            <div class="lang" data-dropdown>
                <button type="button" class="lang__btn" aria-expanded="false" aria-haspopup="true" aria-label="Pilih bahasa">ID <svg class="ic"><use href="#i-chev"/></svg></button>
                <ul class="lang__menu">
                    <li aria-current="true"><span>Bahasa Indonesia</span><svg class="ic"><use href="#i-check"/></svg></li>
                    <li aria-disabled="true"><span>English</span><small>Segera</small></li>
                </ul>
            </div>
        </div>
    </div>
</div>
