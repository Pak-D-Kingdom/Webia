<section class="page-head">
    <div class="container page-head__in">
        <nav class="crumbs" aria-label="Breadcrumb">
            <a href="{{ route('agribisnis.home') }}">Beranda</a>
            <svg class="ic ic--xs" aria-hidden="true"><use href="#i-right"/></svg>
            <span aria-current="page">{{ $page['title'] }}</span>
        </nav>
        <h1>{{ $page['title'] }}</h1>
        <p>{{ $page['sub'] }}</p>
    </div>
</section>
