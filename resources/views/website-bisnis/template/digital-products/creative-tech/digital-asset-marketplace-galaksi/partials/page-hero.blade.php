{{-- Param: $title, $desc, $crumbs (array [label, href|null]), $bg (opsional), $chips (opsional) --}}
<section class="page-hero">
    <div class="ph-bg" style="background-image:url('{{ $img('backgrounds/' . ($bg ?? 'nebula-violet-4k.jpg')) }}')"></div>
    <div class="ph-orbits" aria-hidden="true">
        <svg viewBox="-200 -200 400 400"><g transform="rotate(-16)"><ellipse rx="190" ry="58" class="o1"/><ellipse rx="150" ry="46" class="o2"/><ellipse rx="110" ry="34" class="o3"/><circle r="5" fill="#22d3ee" class="sat"><animateMotion dur="14s" repeatCount="indefinite" path="M190,0 A190,58 0 1,1 -190,0 A190,58 0 1,1 190,0"/></circle><circle r="4" fill="#e879f9" class="sat"><animateMotion dur="10s" begin="-4s" repeatCount="indefinite" path="M150,0 A150,46 0 1,1 -150,0 A150,46 0 1,1 150,0"/></circle></g></svg>
    </div>
    <div class="wrap">
        <nav class="crumbs" aria-label="Breadcrumb">
            <a href="{{ $u('') }}">{{ $ic('home', 'ico-sm') }} Beranda</a>
            @foreach ($crumbs ?? [] as $cr_)
                <span>/</span>@if (!empty($cr_[1]))<a href="{{ $cr_[1] }}">{{ $cr_[0] }}</a>@else<span>{{ $cr_[0] }}</span>@endif
            @endforeach
        </nav>
        <h1 class="reveal">{!! $title !!}</h1>
        @isset($desc)<p class="reveal" style="--d:.1s">{{ $desc }}</p>@endisset
        <div class="ph-chips reveal" style="--d:.2s">
            @foreach ($chips ?? [['shield', 'Lisensi jelas'], ['bolt', 'Unduh instan'], ['crown', 'Kurasi ketat']] as $ch_)<span class="chip">{{ $ic($ch_[0], 'ico-sm') }} {{ $ch_[1] }}</span>@endforeach
        </div>
    </div>
</section>
