<div class="fh-topbar">
    <div class="fh-wrap fh-topbar__in">
        <ul class="fh-topbar__info">
            <li class="fh-topbar__addr">{{ $icon('pin') }}<span>{{ $cfg['contact']['address'] }}</span></li>
            <li><a href="tel:{{ preg_replace('/\s+/', '', $cfg['contact']['phone_top']) }}">{{ $icon('phone') }}<span>{{ $cfg['contact']['phone_top'] }}</span></a></li>
            <li class="fh-topbar__mail"><a href="mailto:{{ $cfg['contact']['email'] }}">{{ $icon('mail') }}<span>{{ $cfg['contact']['email'] }}</span></a></li>
        </ul>
        <div class="fh-topbar__social">
            <span>Ikuti Kami:</span>
            @foreach ($cfg['social'] as $s)
                <a href="{{ $s['url'] }}" aria-label="{{ $s['label'] }}" rel="noopener">{{ $icon($s['key']) }}</a>
            @endforeach
        </div>
    </div>
</div>
