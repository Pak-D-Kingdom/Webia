{{-- ===================== PAGE HEADER (halaman dalam) ===================== --}}
<section class="rea-pagehead" aria-labelledby="page-title">
    <div class="rea-container">
        <nav class="rea-crumbs" aria-label="Breadcrumb">
            <a href="{{ $route('index', '#top') }}">Home</a>
            <span aria-hidden="true">/</span>
            <span aria-current="page">{{ $pages[$page]['label'] }}</span>
        </nav>
        <h1 id="page-title">{{ $pages[$page]['title'] }}</h1>
        <p>{{ $pages[$page]['subtitle'] }}</p>
    </div>
</section>
