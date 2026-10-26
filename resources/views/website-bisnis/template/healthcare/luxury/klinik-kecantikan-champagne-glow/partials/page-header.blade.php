{{-- Header halaman dalam. Param: $heading, $lead --}}
<section class="cg-pagehead">
    <img class="cg-pagehead__leaf" src="{{ $img }}/hero-leaf-left.jpg" alt="" width="336" height="738" loading="eager" decoding="async">
    <img class="cg-pagehead__lotus" src="{{ $img }}/lotus-right.jpg" alt="" width="592" height="472" loading="eager" decoding="async">
    <div class="cg-container cg-pagehead__inner">
        <nav class="cg-crumb" aria-label="Breadcrumb">
            <a href="{{ route('glow.home') }}">Home</a>
            <i class="bi bi-chevron-right" aria-hidden="true"></i>
            <span aria-current="page">{{ $heading }}</span>
        </nav>
        <h1 class="cg-pagehead__title">{{ $heading }}</h1>
        @isset($lead)
            <p class="cg-pagehead__lead">{{ $lead }}</p>
        @endisset
    </div>
</section>
