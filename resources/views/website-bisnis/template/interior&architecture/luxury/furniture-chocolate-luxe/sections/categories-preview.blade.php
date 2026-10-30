@php
    $f = $furniture;
    $a = fn ($path) => asset($path);
    $r = fn ($key) => route($f['routes'][$key]);
@endphp
<div class="lf-cats">
    @foreach ($f['catalog']['categories'] as $cat)
        <a class="lf-cat" href="{{ $r('catalog') }}#{{ $cat['key'] }}">
            <span class="lf-cat__img"><img src="{{ $a($cat['image']) }}" alt="{{ $cat['name'] }} - {{ $cat['room'] }}" loading="lazy"></span>
            <span class="lf-cat__body">
                <span class="lf-cat__name"><strong>{{ $cat['name'] }}</strong><small>{{ $cat['room'] }}</small></span>
                <span class="lf-cat__go" aria-hidden="true"><svg class="ic"><use href="#i-arrow"/></svg></span>
            </span>
        </a>
    @endforeach
</div>
