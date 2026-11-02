{{-- Header halaman dalam. Parameter: $title, $subtitle --}}
<section class="ga-phead">
    <div class="ga-container ga-phead__in">
        <nav class="ga-crumb" aria-label="Breadcrumb">
            <a href="{{ $url() }}">Beranda</a>
            <span aria-hidden="true">/</span>
            <span aria-current="page">{{ $title }}</span>
        </nav>
        <h1>{{ $title }}</h1>
        <p>{{ $subtitle }}</p>
    </div>
</section>
