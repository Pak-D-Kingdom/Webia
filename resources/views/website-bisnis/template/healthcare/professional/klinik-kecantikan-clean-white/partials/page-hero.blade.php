{{--
    Hero halaman dalam (Layanan, Dokter, Jadwal, Appointment, FAQ, Kebijakan)
    Param: $title, $text, $crumb, $image (file), $alt, $gallery (opsional: array file foto)
--}}
<section class="gl-pagehero" aria-labelledby="gl-pagehero-title">
    <div class="gl-container gl-pagehero__inner">
        <div class="gl-pagehero__content">
            <nav class="gl-crumb" aria-label="Breadcrumb">
                <ol>
                    <li><a href="{{ route('klinik-kecantikan.home') }}">Beranda</a></li>
                    <li aria-current="page">{{ $crumb }}</li>
                </ol>
            </nav>
            <h1 class="gl-pagehero__title" id="gl-pagehero-title">{{ $title }}</h1>
            <p class="gl-pagehero__text">{{ $text }}</p>
        </div>

        <div class="gl-pagehero__visual {{ ! empty($gallery) ? 'gl-pagehero__visual--gallery' : '' }}">
            @if (! empty($gallery))
                @foreach ($gallery as $g)
                    <img src="{{ $img($g) }}" alt="" loading="lazy" decoding="async">
                @endforeach
            @else
                <img src="{{ $img($image) }}" alt="{{ $alt ?? '' }}" loading="eager" decoding="async">
            @endif
        </div>
    </div>
</section>
