<section class="uh-pagehero">
    <div class="uh-pagehero__bg" aria-hidden="true">
        <img src="{{ $img('hero-kaaba.jpg') }}" alt="" width="1890" height="834">
        <span class="uh-pagehero__shade"></span>
        <span class="uh-pagehero__pattern"></span>
        <span class="uh-pagehero__arch"></span>
        <img class="uh-pagehero__lantern" src="{{ $img('lentera.png') }}" alt="" width="57" height="165">
    </div>
    <div class="uh-container uh-pagehero__inner">
        <nav class="uh-crumbs" aria-label="Breadcrumb">
            <a href="{{ $url('home') }}">Beranda</a>
            <svg class="uh-i" aria-hidden="true"><use href="#i-chevron-right"/></svg>
            <span aria-current="page">{{ $uh['pages'][$key]['title'] }}</span>
        </nav>
        <div class="uh-pagehero__head">
            <span class="uh-pagehero__icon" aria-hidden="true"><svg class="uh-i"><use href="#i-{{ $uh['pages'][$key]['icon'] }}"/></svg></span>
            <div>
                <h1 class="uh-pagehero__title">{{ $uh['pages'][$key]['title'] }}</h1>
                <p class="uh-pagehero__text">{{ $uh['pages'][$key]['text'] }}</p>
            </div>
        </div>
        <nav class="uh-subnav" aria-label="Pindah halaman">
            @foreach ($uh['nav'] as $item)
                @if ($item['key'] !== 'home')
                    <a class="uh-subnav__link @if ($item['key'] === $active) is-active @endif" href="{{ $url($item['key']) }}" @if ($item['key'] === $active) aria-current="page" @endif>{{ $item['label'] }}</a>
                @endif
            @endforeach
        </nav>
    </div>
</section>
