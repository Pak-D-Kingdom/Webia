<div class="lw-topbar">
    <div class="lw-container lw-topbar__in">
        <ul class="lw-topbar__list">
            <li class="lw-topbar__addr"><svg class="lw-i"><use href="#i-pin"/></svg>{{ $c['contact']['address'] }}</li>
            <li><a href="tel:{{ preg_replace('/\s+/', '', $c['contact']['phone']) }}"><svg class="lw-i"><use href="#i-phone"/></svg>{{ $c['contact']['phone'] }}</a></li>
            <li class="lw-topbar__mail"><a href="mailto:{{ $c['contact']['email'] }}"><svg class="lw-i"><use href="#i-mail"/></svg>{{ $c['contact']['email'] }}</a></li>
            <li><svg class="lw-i"><use href="#i-clock"/></svg>{{ $c['contact']['hours'] }}</li>
        </ul>
        <ul class="lw-topbar__social" aria-label="Media sosial">
            @foreach ($c['social'] as $s)
                <li><a href="{{ $s['url'] }}" aria-label="{{ $s['label'] }}" target="_blank" rel="noopener"><svg class="lw-i"><use href="#i-{{ $s['icon'] }}"/></svg></a></li>
            @endforeach
        </ul>
    </div>
</div>
