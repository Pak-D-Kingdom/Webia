@php $ic = ($icon ?? 'heart'); $chips = ($chips ?? []); @endphp
<section class="fd-pagehero" data-fd-parallax>
    <div class="fd-pagehero__bg" aria-hidden="true">
        <i class="fd-ph-orb fd-ph-orb--1"></i><i class="fd-ph-orb fd-ph-orb--2"></i><i class="fd-ph-orb fd-ph-orb--3"></i>
        <span class="fd-fheart" style="--x:58%;--d:0s;--s:.8"></span><span class="fd-fheart" style="--x:74%;--d:-4s;--s:1"></span><span class="fd-fheart" style="--x:88%;--d:-8s;--s:.7"></span>
    </div>
    <div class="fd-wrap fd-pagehero__in">
        <div class="fd-pagehero__text">
            <nav class="fd-crumb" aria-label="Breadcrumb">
                <a href="{{ $r('index') }}"><svg class="fd-ico"><use href="#fd-i-heart"/></svg>Beranda</a>
                <svg class="fd-ico fd-crumb__sep"><use href="#fd-i-chevron"/></svg>
                <span>{{ $title }}</span>
            </nav>
            <h1>{{ $title }}</h1>
            <p>{{ $lead }}</p>
            @if (count($chips) > 0)
                <div class="fd-phchips">
                    @foreach ($chips as $c)
                        <a class="fd-phchip" href="{{ $c[1] }}">{{ $c[0] }}</a>
                    @endforeach
                </div>
            @endif
        </div>
        <div class="fd-pagehero__art" aria-hidden="true">
            <span class="fd-ph-ring fd-ph-ring--1"></span><span class="fd-ph-ring fd-ph-ring--2"></span><span class="fd-ph-ring fd-ph-ring--3"></span>
            <span class="fd-ph-core"><svg class="fd-ico"><use href="#fd-i-{{ $ic }}"/></svg></span>
            <span class="fd-ph-chip fd-ph-chip--1"><svg class="fd-ico fd-ico--fill"><use href="#fd-i-heart"/></svg></span>
            <span class="fd-ph-chip fd-ph-chip--2"><svg class="fd-ico"><use href="#fd-i-star"/></svg></span>
            <span class="fd-ph-chip fd-ph-chip--3"><svg class="fd-ico"><use href="#fd-i-circle-check"/></svg></span>
        </div>
    </div>
    <svg class="fd-pagehero__wave" viewBox="0 0 1440 60" preserveAspectRatio="none" aria-hidden="true"><path d="M0 60V30C240 0 480 0 720 22s480 34 720 8V60z"/></svg>
</section>
