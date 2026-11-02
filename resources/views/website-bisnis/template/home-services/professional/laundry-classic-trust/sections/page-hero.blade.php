{{-- Banner halaman dalam. Data: $hero = [crumb, title, lead, image, frame (bool), pos (object-position)] --}}
<section class="phero">
    <img class="phero__leaf" src="{{ $img('leaf.svg') }}" alt="" aria-hidden="true">
    <div class="lw-wrap phero__in">
        <div class="phero__txt">
            <nav class="crumb" aria-label="Breadcrumb"><a href="{{ $url('home') }}">Home</a><span aria-hidden="true">/</span><span aria-current="page">{{ $hero['crumb'] }}</span></nav>
            <h1>{{ $hero['title'] }}</h1>
            <p>{{ $hero['lead'] }}</p>
        </div>
        <div class="phero__img {{ ! empty($hero['frame']) ? 'is-frame' : 'is-card' }}" style="--pos: {{ $hero['pos'] ?? 'center' }}">
            <img src="{{ $img($hero['image']) }}" alt="">
        </div>
    </div>
</section>
