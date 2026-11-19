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
            <div class="uh-select uh-select--lang" data-select>
                <button type="button" class="uh-select__btn" aria-haspopup="listbox" aria-expanded="false" aria-label="Pilih bahasa">
                    <i class="uh-flag" aria-hidden="true"></i><span class="uh-select__label">ID</span><svg class="uh-ico uh-select__caret" aria-hidden="true"><use href="#i-caret"/></svg>
                </button>
                <ul class="uh-select__menu" role="listbox" aria-label="Bahasa">
                    <li role="option" tabindex="-1" aria-selected="true" data-value="id" data-label="ID"><i class="uh-flag" aria-hidden="true"></i><span>Bahasa Indonesia</span><svg class="uh-ico" aria-hidden="true"><use href="#i-check"/></svg></li>
                    <li role="option" tabindex="-1" aria-selected="false" data-value="en" data-label="EN" data-lang="en"><i class="uh-flag uh-flag--en" aria-hidden="true"></i><span>English</span><svg class="uh-ico" aria-hidden="true"><use href="#i-check"/></svg></li>
                </ul>
            </div>
        </div>
    </div>
</div>
