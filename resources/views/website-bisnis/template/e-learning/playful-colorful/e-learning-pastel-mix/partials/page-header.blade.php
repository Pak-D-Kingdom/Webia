{{-- Banner judul halaman dalam. Param: $heading, $sub, $art (opsional), $artClass (opsional) --}}
<section class="pagehead">
    <i class="deco deco--star bi bi-star-fill pd1" aria-hidden="true"></i>
    <i class="deco deco--heart bi bi-heart-fill pd2" aria-hidden="true"></i>
    <i class="deco deco--plus bi bi-plus-lg pd3" aria-hidden="true"></i>
    <div class="container pagehead__in">
        <div class="pagehead__copy">
            <nav class="crumbs" aria-label="Breadcrumb">
                <a href="{{ route($rp.'home') }}">Home</a><i class="bi bi-chevron-right" aria-hidden="true"></i><span aria-current="page">{{ $heading }}</span>
            </nav>
            <h1>{{ $heading }}</h1>
            <p>{{ $sub }}</p>
        </div>
        <div class="pagehead__art {{ $artClass ?? '' }}"><img src="{{ $img }}{{ $art ?? 'books-plant.png' }}" alt="" width="220" height="176"></div>
    </div>
</section>
