<div class="fh-topbar">
    <div class="fh-wrap fh-topbar__in">
        <ul class="fh-topbar__info">
            <li class="fh-topbar__addr">
                <a href="{{ $cfg['contact']['map_url'] }}" target="_blank" rel="noopener" title="Buka lokasi di peta">
                    <span class="fh-topbar__ic">{{ $icon('pin') }}</span><span class="fh-topbar__txt">{{ $cfg['contact']['address'] }}</span>
                </a>
            </li>
            <li class="fh-topbar__tel">
                <a href="tel:{{ preg_replace('/\s+/', '', $cfg['contact']['phone_top']) }}" aria-label="Telepon {{ $cfg['contact']['phone_top'] }}">
                    <span class="fh-topbar__ic">{{ $icon('phone') }}</span><span class="fh-topbar__txt">{{ $cfg['contact']['phone_top'] }}</span>
                </a>
            </li>
            <li class="fh-topbar__mail">
                <a href="mailto:{{ $cfg['contact']['email'] }}" aria-label="Email {{ $cfg['contact']['email'] }}">
                    <span class="fh-topbar__ic">{{ $icon('mail') }}</span><span class="fh-topbar__txt">{{ $cfg['contact']['email'] }}</span>
                </a>
            </li>
        </ul>
        <div class="fh-topbar__social">
            <span class="fh-topbar__follow">Ikuti Kami:</span>
            @foreach ($cfg['social'] as $s)
                <a href="{{ $s['url'] }}" aria-label="{{ $s['label'] }}" title="{{ $s['label'] }}" rel="noopener">{{ $icon($s['key']) }}</a>
            @endforeach
        </div>
    </div>
</div>
