<section class="lg-phead">
    <div class="lg-hero__chev" aria-hidden="true"><i></i><i></i></div>
    @if (! empty($ph['image']))
        <div class="lg-phead__scene" aria-hidden="true"><img src="{{ $img($ph['image']) }}" alt=""></div>
    @endif
    <div class="lg-wrap lg-phead__in">
        <nav class="lg-crumb" aria-label="Breadcrumb">
            <a href="{{ $to('home') }}">Beranda</a>
            <svg class="lg-ic" aria-hidden="true"><use href="#i-chevron-right"></use></svg>
            <span aria-current="page">{{ $ph['crumb'] }}</span>
        </nav>
        <h1>{{ $ph['title'] }}</h1>
        <p>{{ $ph['text'] }}</p>
    </div>
</section>
