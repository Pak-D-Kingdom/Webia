<div class="abd-topbar">
    <div class="abd-container abd-topbar__in">
        <ul class="abd-topbar__info">
            <li><svg class="i" aria-hidden="true"><use href="#i-pin"/></svg><span>{{ $site['contact']['address'] }}</span></li>
            <li><svg class="i" aria-hidden="true"><use href="#i-phone"/></svg><a href="tel:{{ $site['contact']['phone_href'] }}">{{ $site['contact']['phone'] }}</a></li>
            <li><svg class="i" aria-hidden="true"><use href="#i-mail"/></svg><a href="mailto:{{ $site['contact']['email'] }}">{{ $site['contact']['email'] }}</a></li>
        </ul>
        <ul class="abd-topbar__social" aria-label="Media sosial">
            @foreach ($site['socials'] as $s)
                <li><a href="{{ $s['url'] }}" target="_blank" rel="noopener noreferrer" aria-label="{{ $s['label'] }}"><svg class="i" aria-hidden="true"><use href="#i-{{ $s['key'] }}"/></svg></a></li>
            @endforeach
        </ul>
    </div>
</div>
