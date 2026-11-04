{{-- Header halaman dalam. Variabel: $title, $sub, $icon --}}
<section class="lw-pagehead">
    <img class="lw-pagehead__bg" src="{{ $img($c['img']['hero']) }}" alt="" aria-hidden="true" width="3072" height="492">
    <div class="lw-container lw-pagehead__in">
        <nav class="lw-crumb" aria-label="Breadcrumb">
            <a href="{{ $r('home') }}">Beranda</a><span aria-hidden="true">/</span><span aria-current="page">{{ $title }}</span>
        </nav>
        <div class="lw-pagehead__row">
            <span class="lw-ico lw-ico--xl"><svg class="lw-i"><use href="#i-{{ $icon }}"/></svg></span>
            <div>
                <h1 class="lw-h1">{{ $title }}</h1>
                <p class="lw-lead">{{ $sub }}</p>
            </div>
        </div>
    </div>
</section>
