<div class="eo-topbar">
    <div class="eo-container eo-topbar__inner">
        <ul class="eo-topbar__info">
            <li class="eo-topbar__loc"><svg class="eo-i" aria-hidden="true"><use href="#i-pin"/></svg><span>{{ $eo['contact']['location'] }}</span></li>
            <li class="eo-topbar__hours"><svg class="eo-i" aria-hidden="true"><use href="#i-calendar"/></svg><span>{{ $eo['contact']['hours'] }}</span></li>
            <li class="eo-topbar__mail"><svg class="eo-i" aria-hidden="true"><use href="#i-mail"/></svg><a href="mailto:{{ $eo['contact']['email'] }}">{{ $eo['contact']['email'] }}</a></li>
        </ul>
        <div class="eo-topbar__right">
            <ul class="eo-topbar__social">
                @foreach($eo['socials'] as $soc)
                <li><a href="{{ $soc['url'] }}" target="_blank" rel="noopener noreferrer" aria-label="{{ $soc['label'] }}"><svg class="eo-i" aria-hidden="true"><use href="#{{ $soc['icon'] }}"/></svg></a></li>
                @endforeach
            </ul>
            <span class="eo-lang" title="Bahasa Indonesia"><svg class="eo-i" aria-hidden="true"><use href="#i-globe"/></svg>ID</span>
        </div>
    </div>
</div>
