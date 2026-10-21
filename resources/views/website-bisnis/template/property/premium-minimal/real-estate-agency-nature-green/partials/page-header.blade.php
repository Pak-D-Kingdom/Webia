<section class="page-header">
    <svg class="deco page-header__deco" aria-hidden="true"><use href="#i-branch"/></svg>
    <div class="container container--nav">
        <nav class="crumb" aria-label="Breadcrumb">
            <a href="{{ $r('home') }}">Home</a><span aria-hidden="true">/</span><span aria-current="page">{{ $title }}</span>
        </nav>
        <h1>{{ $title }}</h1>
        @isset($desc)<p>{{ $desc }}</p>@endisset
    </div>
</section>
