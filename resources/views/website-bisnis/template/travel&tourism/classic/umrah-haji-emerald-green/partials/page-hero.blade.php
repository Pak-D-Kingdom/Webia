<section class="uh-pagehero">
    <div class="uh-pagehero__bg" aria-hidden="true">
        <img src="{{ $img('hero-kaaba.jpg') }}" alt="" width="1890" height="834">
        <span class="uh-pagehero__shade"></span>
        <span class="uh-pagehero__pattern"></span>
    </div>
    <div class="uh-container uh-pagehero__inner">
        <nav class="uh-crumbs" aria-label="Breadcrumb">
            <a href="{{ $url('home') }}">Beranda</a>
            <svg class="uh-i" aria-hidden="true"><use href="#i-chevron-right"/></svg>
            <span aria-current="page">{{ $uh['pages'][$key]['title'] }}</span>
        </nav>
        <h1 class="uh-pagehero__title">{{ $uh['pages'][$key]['title'] }}</h1>
        <p class="uh-pagehero__text">{{ $uh['pages'][$key]['text'] }}</p>
    </div>
</section>
