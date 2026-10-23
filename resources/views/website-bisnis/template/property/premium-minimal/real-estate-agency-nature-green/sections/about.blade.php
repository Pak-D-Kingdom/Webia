@php $a = $t['about']; $isPreview = !empty($preview); @endphp
<section class="panel" id="about" aria-labelledby="h-about">
    <div class="split">
        <div class="split__media media"><img src="{{ $img($a['image']) }}" alt="Hunian GreenEstate" loading="lazy" data-fallback></div>
        <div class="split__body">
            <h2 id="h-about" class="panel__title">{{ $a['title'] }}</h2>
            <p>{{ $a['text'] }}</p>
            <ul class="checks">
                @foreach ($a['points'] as $pt)<li><svg class="i" aria-hidden="true"><use href="#i-check"/></svg>{{ $pt }}</li>@endforeach
            </ul>
            @if ($isPreview)
                <a class="btn btn--primary" href="{{ $r('about') }}">Selengkapnya <svg class="i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
            @else
                <a class="btn btn--primary" href="{{ $r('booking') }}">Jadwalkan Viewing <svg class="i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
            @endif
        </div>
    </div>
</section>
