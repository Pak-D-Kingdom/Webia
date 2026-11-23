<header class="hda-hero hda-hero--inner hda-hero--v{{ $page['variant'] }}">
    <div class="hda-hero__bg" data-parallax style="background-image:url('{{ $ha('hero-inner.webp') }}')"></div>
    <div class="hda-hero__shade"></div>
    <div class="hda-container hda-hero__in">
        <ol class="hda-crumbs" aria-label="Breadcrumb">
            <li><a href="{{ $hu('home') }}">Home</a></li>
            @if(!empty($page['parent']))
            <li><a href="{{ $hu($page['parent']) }}">{{ $hda['pages'][$page['parent']]['title'] }}</a></li>
            @endif
            <li aria-current="page">{{ $page['title'] }}</li>
        </ol>
        <div class="hda-hero__copy">
            <h1>{{ $page['title'] }}</h1>
            @if(!empty($page['lead']))<p>{{ $page['lead'] }}</p>@endif
        </div>
    </div>
</header>
