<div class="topbar">
    <div class="topbar__inner">
        <ul class="topbar__info">
            <li><svg class="ico"><use href="#i-pin"></use></svg><span>{{ $data['contact']['location'] }}</span></li>
            <li><svg class="ico"><use href="#i-clock"></use></svg><span>{{ $data['contact']['hours'] }}</span></li>
            <li><svg class="ico"><use href="#i-phone"></use></svg><a href="tel:{{ $data['contact']['phone_link'] }}">{{ $data['contact']['phone'] }}</a></li>
            <li><svg class="ico"><use href="#i-mail"></use></svg><a href="mailto:{{ $data['contact']['email'] }}">{{ $data['contact']['email'] }}</a></li>
        </ul>
        <ul class="topbar__links">
            <li class="topbar__lang" aria-label="Bahasa: Indonesia"><span>ID</span><svg class="ico"><use href="#i-chev-down"></use></svg></li>
            <li><a href="{{ $u['whatsapp_karir'] }}" target="_blank" rel="noopener">Karir</a></li>
            <li><a href="{{ $u['panen'] }}">News &amp; Update</a></li>
        </ul>
    </div>
</div>
