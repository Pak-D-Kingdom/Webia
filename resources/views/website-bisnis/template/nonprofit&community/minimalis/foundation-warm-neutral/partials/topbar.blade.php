<div class="hf-topbar">
    <div class="hf-container hf-topbar__inner">
        <ul class="hf-topbar__info">
            <li class="hf-topbar__address"><svg class="hf-i" aria-hidden="true"><use href="#i-pin"/></svg><span>{{ $f['contact']['address'] }}</span></li>
            <li><svg class="hf-i" aria-hidden="true"><use href="#i-phone"/></svg><a href="{{ $f['contact']['phone_href'] }}">{{ $f['contact']['phone'] }}</a></li>
            <li class="hf-topbar__mail"><svg class="hf-i" aria-hidden="true"><use href="#i-mail"/></svg><a href="mailto:{{ $f['contact']['email'] }}">{{ $f['contact']['email'] }}</a></li>
        </ul>
        <div class="hf-topbar__social">
            <span>Ikuti Kami:</span>
            @foreach($f['socials'] as $s)
                <a href="{{ $s['url'] }}" data-soon aria-label="{{ $s['label'] }}"><svg class="hf-i hf-i--fill" aria-hidden="true"><use href="#i-{{ $s['key'] }}"/></svg></a>
            @endforeach
        </div>
    </div>
</div>
