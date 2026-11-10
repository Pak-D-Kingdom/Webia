<div class="uh-topbar">
    <div class="uh-container uh-topbar__in">
        <ul class="uh-topbar__info">
            <li><svg class="uh-ico" aria-hidden="true"><use href="#i-pin"/></svg><span>{{ $d['contact']['city'] }}</span></li>
            <li><svg class="uh-ico" aria-hidden="true"><use href="#i-clock"/></svg><span>{{ $d['contact']['hours'] }}</span></li>
            <li><svg class="uh-ico" aria-hidden="true"><use href="#i-mail"/></svg><a href="mailto:{{ $d['contact']['email'] }}">{{ $d['contact']['email'] }}</a></li>
        </ul>
        <div class="uh-topbar__right">
            <ul class="uh-topbar__social">
                @foreach ($d['social'] as $s)
                    <li><a href="{{ $s['url'] }}" target="_blank" rel="noopener" aria-label="{{ $s['label'] }}"><svg class="uh-ico" aria-hidden="true"><use href="#i-{{ $s['key'] }}"/></svg></a></li>
                @endforeach
            </ul>
            <span class="uh-lang" title="Bahasa Indonesia"><i class="uh-flag" aria-hidden="true"></i>ID<svg class="uh-ico" aria-hidden="true"><use href="#i-caret"/></svg></span>
        </div>
    </div>
</div>
