{{-- Parameter: $title, $text, $current (nama halaman untuk breadcrumb) --}}
<section class="lm-pagehead">
    <img class="lm-pagehead__bg" src="{{ $img($cafe['slides'][0]['image']) }}" alt="">
    <div class="lm-container lm-pagehead__in">
        <nav class="lm-crumb" aria-label="Breadcrumb">
            <a href="{{ $url('home') }}">Beranda</a><span aria-hidden="true">/</span><span aria-current="page">{{ $current }}</span>
        </nav>
        <h1 class="lm-pagehead__title">{{ $title }}</h1>
        <p class="lm-pagehead__text">{{ $text }}</p>
    </div>
</section>
