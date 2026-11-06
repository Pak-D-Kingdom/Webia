{{-- Variabel: $title, $lead, $crumb --}}
<section class="hf-pagehead">
    <svg class="hf-pagehead__leaves" viewBox="0 0 140 240" aria-hidden="true"><use href="#deco-leaves"/></svg>
    <svg class="hf-pagehead__heart" viewBox="0 0 40 36" aria-hidden="true"><use href="#deco-heart"/></svg>
    <div class="hf-container hf-pagehead__inner">
        <nav class="hf-crumb" aria-label="Breadcrumb">
            <a href="{{ route($rp.'home') }}">Beranda</a>
            <span aria-hidden="true">/</span>
            <span aria-current="page">{{ $crumb }}</span>
        </nav>
        <h1 class="hf-pagehead__title">{{ $title }}</h1>
        <p class="hf-pagehead__lead">{{ $lead }}</p>
    </div>
</section>
