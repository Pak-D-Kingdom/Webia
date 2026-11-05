<div class="topbar">
    <div class="topbar__inner">
        <ul class="topbar__info">
            <li><svg class="ico"><use href="#i-pin"></use></svg><span>{{ $data['contact']['location'] }}</span></li>
            <li><svg class="ico"><use href="#i-clock"></use></svg><span>{{ $data['contact']['hours'] }}</span></li>
            <li><svg class="ico"><use href="#i-phone"></use></svg><a href="tel:{{ $data['contact']['phone_link'] }}">{{ $data['contact']['phone'] }}</a></li>
            <li><svg class="ico"><use href="#i-mail"></use></svg><a href="mailto:{{ $data['contact']['email'] }}">{{ $data['contact']['email'] }}</a></li>
        </ul>
        <ul class="topbar__links">
            <li class="dd-wrap" data-dd>
                <button class="topbar__lang" type="button" aria-haspopup="true" aria-expanded="false" aria-controls="langMenu" data-dd-toggle>
                    <span>ID</span><svg class="ico"><use href="#i-chev-down"></use></svg>
                </button>
                <div class="dd dd--sm dd--right" id="langMenu" role="menu" hidden>
                    <button class="dd__item is-current" type="button" role="menuitemradio" aria-checked="true"><span class="dd__txt"><strong>Bahasa Indonesia</strong><small>Bahasa saat ini</small></span><svg class="ico dd__check"><use href="#i-check"></use></svg></button>
                    <button class="dd__item" type="button" role="menuitemradio" aria-checked="false" disabled><span class="dd__txt"><strong>English</strong><small>Segera hadir</small></span></button>
                </div>
            </li>
            <li><a href="{{ $u['whatsapp_karir'] }}" target="_blank" rel="noopener">Karir</a></li>
            <li><a href="{{ $u['panen'] }}">News &amp; Update</a></li>
        </ul>
    </div>
</div>
