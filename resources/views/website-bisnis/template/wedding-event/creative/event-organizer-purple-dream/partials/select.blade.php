<div class="eo-field @if(!empty($wide)) eo-field--wide @endif" data-eo-field>
    <span class="eo-field__label" id="eo-lbl-{{ $name }}">{{ $label }}@if(!empty($required)) <b aria-hidden="true">*</b>@endif</span>
    <div class="eo-select" data-eo-select>
        <input type="hidden" name="{{ $name }}" value="" @if(!empty($required)) data-required="1" @endif>
        <button type="button" class="eo-select__btn" aria-haspopup="listbox" aria-expanded="false" aria-labelledby="eo-lbl-{{ $name }}">
            <span class="eo-select__val" data-placeholder="{{ $placeholder }}">{{ $placeholder }}</span>
            <svg class="eo-i" aria-hidden="true"><use href="#i-chev-down"/></svg>
        </button>
        <ul class="eo-select__list" role="listbox" tabindex="-1" aria-labelledby="eo-lbl-{{ $name }}">
            @foreach($options as $option)
            <li role="option" data-value="{{ $option }}" aria-selected="false">{{ $option }}</li>
            @endforeach
        </ul>
    </div>
    <small class="eo-field__msg" data-eo-msg></small>
</div>
