<div class="hda-topbar">
    <div class="hda-container hda-topbar__in">
        <div class="hda-topbar__group">
            <span class="hda-topbar__item hda-hide-sm"><svg class="hda-icon"><use href="#i-building"/></svg><span>{{ $hda['site']['institution'] }}</span></span>
            <span class="hda-topbar__item"><svg class="hda-icon"><use href="#i-clock"/></svg><span>{{ $hda['site']['hours'] }}</span></span>
            <a class="hda-topbar__item hda-hide-md" href="mailto:{{ $hda['site']['email'] }}"><svg class="hda-icon"><use href="#i-mail"/></svg><span>{{ $hda['site']['email'] }}</span></a>
        </div>
        <div class="hda-topbar__group">
            <div class="hda-lang" data-lang>
                <button type="button" class="hda-lang__btn" aria-haspopup="true" aria-expanded="false" data-lang-btn><span data-lang-label>EN</span><svg class="hda-icon" style="width:12px;height:12px"><use href="#i-down"/></svg></button>
                <div class="hda-lang__menu" role="menu">
                    @foreach($hda['site']['languages'] as $lg)
                    <button type="button" role="menuitem" data-lang-set="{{ $lg }}" aria-current="{{ $lg == 'EN' ? 'true' : 'false' }}">{{ $lg == 'EN' ? 'English' : 'Bahasa Indonesia' }}</button>
                    @endforeach
                </div>
            </div>
            <div class="hda-a11y" role="group" aria-label="Accessibility controls">
                <button type="button" class="s1" data-fs="-1" aria-label="Decrease text size">A</button>
                <button type="button" class="s2" data-fs="0" aria-label="Reset text size">A</button>
                <button type="button" class="s3" data-fs="1" aria-label="Increase text size">A</button>
                <button type="button" data-contrast aria-pressed="false" aria-label="Toggle high contrast"><svg class="hda-icon" style="width:15px;height:15px"><use href="#i-contrast"/></svg></button>
            </div>
        </div>
    </div>
</div>
