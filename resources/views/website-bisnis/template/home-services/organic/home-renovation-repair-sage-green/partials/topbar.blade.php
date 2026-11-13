<div class="hr-topbar">
    <div class="hr-container hr-topbar__inner">
        <ul class="hr-topbar__info">
            <li class="hr-topbar__addr">{{ $i('pin') }}<span>{{ $cfg['site']['address'] }}</span></li>
            <li><a href="{{ $cfg['site']['phone_href'] }}">{{ $i('phone') }}<span>{{ $cfg['site']['phone'] }}</span></a></li>
            <li class="hr-topbar__mail"><a href="mailto:{{ $cfg['site']['email'] }}">{{ $i('mail') }}<span>{{ $cfg['site']['email'] }}</span></a></li>
        </ul>
        <ul class="hr-social hr-social--top">
            @foreach ($cfg['social'] as $s)
                <li><a href="{{ $s['url'] }}" target="_blank" rel="noopener noreferrer" aria-label="{{ $s['label'] }}">{{ $i($s['icon']) }}</a></li>
            @endforeach
        </ul>
    </div>
</div>
