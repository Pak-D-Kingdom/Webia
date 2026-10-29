{{-- Param: $eyebrow, $title, $text --}}
<section class="fm-pagehead">
    <div class="fm-container">
        <nav class="fm-crumb" aria-label="Breadcrumb">
            <a href="{{ $route('home') }}">Beranda</a>
            <svg class="fm-i fm-i--xs" aria-hidden="true"><use href="#i-right"/></svg>
            <span aria-current="page">{{ $title }}</span>
        </nav>
        <p class="fm-eyebrow">{{ $eyebrow }}</p>
        <h1 class="fm-pagehead__title">{{ $title }}</h1>
        <p class="fm-pagehead__text">{{ $text }}</p>
    </div>
</section>
