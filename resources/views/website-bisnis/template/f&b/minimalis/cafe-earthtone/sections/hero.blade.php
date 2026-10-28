<section id="beranda" class="hero">
    <div class="container hero__txt">
        <p class="eyebrow">{{ strtoupper(config('cafe.name')) }}</p>
        <h1>{{ config('cafe.hero_title') ?? 'Ngopi Nyaman, Makan Enak, Suasana Tenang.' }}</h1>
        <p>{{ config('cafe.description') ?? 'Café minimalis dengan sajian kopi berkualitas, menu lezat, dan tempat nyaman untuk bekerja, bersantai, atau berkumpul.' }}</p>
        <div class="hero__btns">
            <a class="btn" href="{{ $pageUrl('menu') }}">Lihat Menu <svg class="i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
            <a class="btn btn--ghost" href="{{ $pageUrl('reservasi') }}"><svg class="i" aria-hidden="true"><use href="#i-calendar"/></svg> Reservasi Meja</a>
        </div>
    </div>
    <div class="dots" aria-hidden="true"><i class="on"></i><i></i><i></i></div>
</section>
