{{-- Param: ico, title, sub (opsional), href + label (opsional), id (opsional) --}}
<div class="ta-head">
    <span class="ta-head__icon" aria-hidden="true">{{ $icon($ico) }}</span>
    <div class="ta-head__txt">
        <h2 class="ta-head__title" @isset($id) id="{{ $id }}" @endisset>{{ $title }}</h2>
        @isset($sub)<p class="ta-head__sub">{{ $sub }}</p>@endisset
    </div>
    @isset($href)
        <a class="ta-link" href="{{ $href }}">{{ $label }} {{ $icon('arrow') }}</a>
    @endisset
</div>
