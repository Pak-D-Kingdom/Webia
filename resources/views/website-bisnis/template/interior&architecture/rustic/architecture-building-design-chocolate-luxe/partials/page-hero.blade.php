{{-- Variabel: $title, $sub, $bg (nama file gambar), $icon, $crumb --}}
<section class="abd-phero">
    <div class="abd-phero__bg" aria-hidden="true"><img src="{{ $img($bg) }}" alt="" loading="eager"></div>
    <div class="abd-container abd-phero__in">
        <nav class="abd-crumb" aria-label="Jejak halaman">
            <a href="{{ $u() }}">Beranda</a><span aria-hidden="true">/</span><span aria-current="page">{{ $crumb }}</span>
        </nav>
        <div class="abd-phero__title">
            <span class="abd-phero__ico" aria-hidden="true"><svg class="i"><use href="#i-{{ $icon }}"/></svg></span>
            <h1>{{ $title }}</h1>
        </div>
        <p>{{ $sub }}</p>
    </div>
</section>
