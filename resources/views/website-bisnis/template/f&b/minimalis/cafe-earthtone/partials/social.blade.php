@foreach (config('cafe.social') as [$label, $icon, $url])
    <a href="{{ $url }}" aria-label="{{ $label }}"><svg class="i" aria-hidden="true"><use href="#i-{{ $icon }}"/></svg></a>
@endforeach
