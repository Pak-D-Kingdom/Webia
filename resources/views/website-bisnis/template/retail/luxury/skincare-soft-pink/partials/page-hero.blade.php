{{-- Header halaman dalam. Variabel: $title, $lead --}}
<section class="phero">
    <img class="phero__leaf phero__leaf--l" src="{{ $img }}/leaf-hero-left.png" alt="" aria-hidden="true">
    <img class="phero__leaf phero__leaf--r" src="{{ $img }}/leaf-hero-right.png" alt="" aria-hidden="true">
    <div class="container">
        <nav class="crumb" aria-label="Breadcrumb">
            <a href="{{ route($rp . 'index') }}">Home</a><i class="bi bi-chevron-right" aria-hidden="true"></i><span aria-current="page">{{ $title }}</span>
        </nav>
        <h1>{{ $title }}</h1>
        <p>{{ $lead }}</p>
    </div>
</section>
