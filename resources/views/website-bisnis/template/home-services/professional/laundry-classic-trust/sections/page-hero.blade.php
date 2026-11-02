{{-- Banner halaman dalam. Data: $hero = [crumb, title, lead, image] --}}
<section class="phero">
    <img class="phero__leaf" src="{{ $img('leaf.svg') }}" alt="" aria-hidden="true">
    <div class="lw-wrap phero__in">
        <div class="phero__txt">
            <nav class="crumb" aria-label="Breadcrumb"><a href="{{ $url('home') }}">Home</a><span aria-hidden="true">/</span><span aria-current="page">{{ $hero['crumb'] }}</span></nav>
            <h1>{{ $hero['title'] }}</h1>
            <p>{{ $hero['lead'] }}</p>
        </div>
        <div class="phero__img"><img src="{{ $img($hero['image']) }}" alt="" loading="eager"></div>
    </div>
</section>
