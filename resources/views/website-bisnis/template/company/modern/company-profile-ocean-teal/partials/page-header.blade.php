<section class="ot-page-head">
    <div class="ot-container">
        <nav aria-label="Breadcrumb">
            <ol class="ot-crumbs">
                <li><a href="{{ $url('home') }}">Beranda</a></li>
                <li aria-current="page">{{ $heading }}</li>
            </ol>
        </nav>
        <h1>{{ $heading }}</h1>
        @isset($lead)<p>{{ $lead }}</p>@endisset
    </div>
</section>
