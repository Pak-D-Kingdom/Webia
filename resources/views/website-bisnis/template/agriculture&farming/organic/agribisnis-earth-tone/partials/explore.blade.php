{{-- Kartu "Jelajahi" di bawah halaman dalam. Variabel: $exploreKeys (array key halaman) --}}
<section class="explore">
    <div class="inner__wrap">
        <h2 class="explore__title">Jelajahi Lebih Lanjut</h2>
        <ul class="explore__grid">
            @foreach ($exploreKeys as $k)
                <li class="reveal">
                    <a class="explore__card" href="{{ $u[$k] }}">
                        <span class="explore__icon"><svg class="ico"><use href="#i-{{ $data['pages'][$k]['icon'] }}"></use></svg></span>
                        <span class="explore__txt"><strong>{{ $data['pages'][$k]['title'] }}</strong><small>{{ $data['pages'][$k]['desc'] }}</small></span>
                        <svg class="ico explore__arrow"><use href="#i-arrow"></use></svg>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</section>
