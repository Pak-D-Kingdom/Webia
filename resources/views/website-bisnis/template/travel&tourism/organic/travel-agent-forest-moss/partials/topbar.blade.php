<div class="ta-topbar">
    <div class="ta-container ta-topbar__in">
        <ul class="ta-topbar__info">
            <li class="ta-topbar__hours"><svg class="ta-i" aria-hidden="true"><use href="#i-clock"/></svg>{{ $cfg['contact']['hours'] }}</li>
            <li><a href="tel:+{{ $cfg['contact']['whatsapp'] }}"><svg class="ta-i" aria-hidden="true"><use href="#i-phone"/></svg>{{ $cfg['contact']['phone_display'] }}</a></li>
            <li class="ta-topbar__mail"><a href="mailto:{{ $cfg['contact']['email'] }}"><svg class="ta-i" aria-hidden="true"><use href="#i-mail"/></svg>{{ $cfg['contact']['email'] }}</a></li>
        </ul>
        <ul class="ta-social ta-social--topbar" aria-label="Media sosial">
            @foreach ($cfg['social'] as $s)
                <li><a href="{{ $s['url'] }}" aria-label="{{ $s['label'] }}" rel="noopener"><svg class="ta-i {{ $s['icon'] === 'tiktok' ? 'ta-i--fill' : '' }}" aria-hidden="true"><use href="#i-{{ $s['icon'] }}"/></svg></a></li>
            @endforeach
        </ul>
    </div>
</div>
