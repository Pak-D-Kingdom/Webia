<section class="uh-pagehero">
    <span class="uh-orb uh-orb--1" aria-hidden="true"></span>
    <span class="uh-orb uh-orb--2" aria-hidden="true"></span>
    <div class="uh-container uh-pagehero__in">
        <div class="uh-pagehero__txt">
            <nav class="uh-crumbs uh-anim" style="--d:.02s" aria-label="Breadcrumb">
                <a href="{{ $r('home') }}">Beranda</a><svg class="uh-ico" aria-hidden="true"><use href="#i-chev"/></svg><span>{{ $title }}</span>
            </nav>
            <p class="uh-eyebrow uh-anim" style="--d:.1s">{{ $eyebrow }}</p>
            <h1 class="uh-pagehero__title uh-anim" style="--d:.18s">{{ $title }}</h1>
            <i class="uh-orn uh-orn--left uh-anim" style="--d:.26s" aria-hidden="true"></i>
            <p class="uh-pagehero__desc uh-anim" style="--d:.32s">{{ $desc }}</p>
            @if (! empty($chips))
                <ul class="uh-chiplist uh-anim" style="--d:.42s">
                    @foreach ($chips as $c)
                        <li><svg class="uh-ico" aria-hidden="true"><use href="#i-check"/></svg>{{ $c }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
        <figure class="uh-pagehero__media {{ ! empty($contain) ? 'uh-pagehero__media--contain' : '' }} uh-anim" style="--d:.3s" aria-hidden="true">
            <img src="{{ $img($bg ?? 'hero.svg') }}" alt="" loading="eager">
            <figcaption class="uh-pagehero__badge"><svg class="uh-ico" aria-hidden="true"><use href="#i-sparkle"/></svg><span>Melayani dengan Hati</span></figcaption>
        </figure>
    </div>
    <div class="uh-hero__curve"></div>
</section>
