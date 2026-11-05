<div class="topbar">
    <div class="container topbar__in">
        <ul class="topbar__info">
            <li><svg class="ic" aria-hidden="true"><use href="#i-pin"/></svg><span>{{ $cfg['site']['address'] }}</span></li>
            <li><svg class="ic" aria-hidden="true"><use href="#i-clock"/></svg><span>{{ $cfg['site']['hours'] }}</span></li>
            <li><svg class="ic" aria-hidden="true"><use href="#i-phone"/></svg><a href="tel:+{{ $cfg['site']['phone_raw'] }}">{{ $cfg['site']['phone'] }}</a></li>
            <li><svg class="ic" aria-hidden="true"><use href="#i-mail"/></svg><a href="mailto:{{ $cfg['site']['email'] }}">{{ $cfg['site']['email'] }}</a></li>
        </ul>

        <div class="topbar__right">
            @foreach($cfg['topbar']['links'] as $link)
                <a class="topbar__link" href="{{ $link['href'] }}" data-noop>{{ $link['label'] }}</a>
            @endforeach

            <div class="lang" data-lang>
                <button class="lang__btn" type="button" aria-haspopup="listbox" aria-expanded="false">
                    <span class="flag" data-flag="id" aria-hidden="true"></span>
                    <span data-lang-label>ID</span>
                    <svg class="ic ic--xs" aria-hidden="true"><use href="#i-down"/></svg>
                </button>
                <ul class="lang__menu" role="listbox" hidden>
                    @foreach($cfg['topbar']['langs'] as $lang)
                        <li role="option"><button type="button" data-lang-code="{{ $lang['code'] }}" data-lang-flag="{{ $lang['flag'] }}"><span class="flag" data-flag="{{ $lang['flag'] }}" aria-hidden="true"></span><span class="lang__name">{{ $lang['label'] }}</span><em>{{ $lang['code'] }}</em></button></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
