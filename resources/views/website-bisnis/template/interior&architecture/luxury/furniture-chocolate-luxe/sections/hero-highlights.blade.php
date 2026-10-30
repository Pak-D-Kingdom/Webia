@php
    $f = $furniture;
    $r = fn ($key) => route($f['routes'][$key]);
@endphp
<section class="lf-section">
    <div class="lf-container">
        <div class="lf-highlights">
            @foreach ($f['hero']['highlights'] as $item)
                <article class="lf-highlight" id="{{ $item['id'] }}">
                    <span class="lf-highlight__icon"><svg class="ic"><use href="#i-{{ $item['icon'] }}"/></svg></span>
                    <h2 class="lf-highlight__title lf-serif">{{ $item['title'] }}</h2>
                    <p class="lf-highlight__sub">{{ $item['sub'] }}</p>
                    <p>{{ $item['text'] }}</p>
                </article>
            @endforeach
        </div>
        <div class="lf-actions lf-actions--center">
            <a class="lf-btn lf-btn--brown" href="{{ $r('catalog') }}">Jelajahi Katalog <svg class="ic"><use href="#i-arrow"/></svg></a>
            <a class="lf-btn lf-btn--outline-dark" href="{{ $r('quotation') }}">Minta Penawaran <svg class="ic"><use href="#i-arrow"/></svg></a>
        </div>
    </div>
</section>
