@php $pimg = $headerImage ?? ($t['page_images'][$active] ?? null); @endphp
<section class="page-header {{ $pimg ? 'has-media' : '' }}">
    @if ($pimg)
        <div class="page-header__media media"><img src="{{ $img($pimg) }}" alt="" data-fallback></div>
    @endif
    <svg class="deco page-header__deco" aria-hidden="true"><use href="#i-branch"/></svg>
    <div class="container container--nav">
        <div class="page-header__text">
            <nav class="crumb" aria-label="Breadcrumb">
                <a href="{{ $r('home') }}">Home</a><span aria-hidden="true">/</span>
                @isset($parent)<a href="{{ $parent['url'] }}">{{ $parent['label'] }}</a><span aria-hidden="true">/</span>@endisset
                <span aria-current="page">{{ $title }}</span>
            </nav>
            <h1>{{ $title }}</h1>
            @isset($desc)<p>{{ $desc }}</p>@endisset
        </div>
    </div>
</section>
