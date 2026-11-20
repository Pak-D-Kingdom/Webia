{{-- Variabel: $f (definisi field), $idp (prefix id) --}}
@if ($f['type'] === 'choice')
    <div class="abd-field abd-field--full" data-field>
        <span class="abd-label" id="{{ $idp }}-{{ $f['name'] }}-l">{{ $f['label'] }}@if (!empty($f['req'])) <b>*</b>@endif</span>
        <div class="abd-choice abd-choice--{{ $f['mode'] }}" data-choice role="radiogroup" aria-labelledby="{{ $idp }}-{{ $f['name'] }}-l">
            @foreach ($f['options'] as $o)
                <button type="button" class="abd-opt" role="radio" aria-checked="false" data-value="{{ $o[0] }}">
                    @if (!empty($o[1]))<span class="abd-opt__ico" aria-hidden="true"><svg class="i"><use href="#i-{{ $o[1] }}"/></svg></span>@endif
                    <span class="abd-opt__t">{{ $o[0] }}</span>
                    <svg class="i abd-opt__ck" aria-hidden="true"><use href="#i-check"/></svg>
                </button>
            @endforeach
        </div>
        <input type="hidden" id="{{ $idp }}-{{ $f['name'] }}" name="{{ $f['name'] }}" data-label="{{ $f['label'] }}" @if (!empty($f['req'])) required @endif>
        <span class="abd-err" role="alert"></span>
    </div>
@elseif ($f['type'] === 'select')
    <div class="abd-field {{ !empty($f['full']) ? 'abd-field--full' : '' }}" data-field>
        <label for="{{ $idp }}-{{ $f['name'] }}">{{ $f['label'] }}@if (!empty($f['req'])) <b>*</b>@endif</label>
        <div class="abd-control">
            <select id="{{ $idp }}-{{ $f['name'] }}" name="{{ $f['name'] }}" data-label="{{ $f['label'] }}" data-ph="{{ $f['ph'] ?? 'Pilih' }}" data-ico="{{ $f['icon'] ?? '' }}" @if (!empty($f['req'])) required @endif>
                <option value="">{{ $f['ph'] ?? 'Pilih' }}</option>
                @foreach ($f['options'] as $o)
                    <option value="{{ $o[0] }}" data-icon="{{ $o[1] ?? '' }}" data-desc="{{ $o[2] ?? '' }}">{{ $o[0] }}</option>
                @endforeach
            </select>
        </div>
        <span class="abd-err" role="alert"></span>
    </div>
@elseif ($f['type'] === 'textarea')
    <div class="abd-field abd-field--full" data-field>
        <label for="{{ $idp }}-{{ $f['name'] }}">{{ $f['label'] }}@if (!empty($f['req'])) <b>*</b>@endif</label>
        <div class="abd-control abd-control--ta">
            <textarea id="{{ $idp }}-{{ $f['name'] }}" name="{{ $f['name'] }}" data-label="{{ $f['label'] }}" rows="5" maxlength="{{ $f['max'] ?? 500 }}" placeholder="{{ $f['ph'] ?? '' }}" @if (!empty($f['req'])) required @endif></textarea>
            <span class="abd-count" data-count="{{ $f['max'] ?? 500 }}">0/{{ $f['max'] ?? 500 }}</span>
        </div>
        <span class="abd-err" role="alert"></span>
    </div>
@else
    <div class="abd-field {{ !empty($f['full']) ? 'abd-field--full' : '' }}" data-field>
        <label for="{{ $idp }}-{{ $f['name'] }}">{{ $f['label'] }}@if (!empty($f['req'])) <b>*</b>@endif</label>
        <div class="abd-control">
            @if (!empty($f['icon']))<svg class="i abd-control__ico" aria-hidden="true"><use href="#i-{{ $f['icon'] }}"/></svg>@endif
            <input type="{{ $f['type'] }}" id="{{ $idp }}-{{ $f['name'] }}" name="{{ $f['name'] }}" data-label="{{ $f['label'] }}" placeholder="{{ $f['ph'] ?? '' }}" autocomplete="{{ $f['ac'] ?? 'off' }}" @if ($f['type'] === 'tel') inputmode="tel" maxlength="18" @endif @if ($f['type'] === 'number') inputmode="numeric" @endif @if (!empty($f['min'])) min="{{ $f['min'] }}" @endif @if (!empty($f['today'])) data-min-today @endif @if (!empty($f['req'])) required @endif>
        </div>
        @if (!empty($f['hint']))<p class="abd-hint">{{ $f['hint'] }}</p>@endif
        <span class="abd-err" role="alert"></span>
    </div>
@endif
