{{-- Param: $title, $desc, $crumbs (array [label, href|null]), $bg (opsional) --}}
<section class="page-hero">
    <div class="ph-bg" style="background-image:url('{{ $img('backgrounds/' . ($bg ?? 'nebula-violet-4k.jpg')) }}')"></div>
    <div class="wrap">
        <nav class="crumbs" aria-label="Breadcrumb">
            <a href="{{ $u('') }}">Beranda</a>
            @foreach ($crumbs ?? [] as $cr_)
                <span>/</span>@if (!empty($cr_[1]))<a href="{{ $cr_[1] }}">{{ $cr_[0] }}</a>@else<span>{{ $cr_[0] }}</span>@endif
            @endforeach
        </nav>
        <h1 class="reveal">{!! $title !!}</h1>
        @isset($desc)<p class="reveal" style="--d:.1s">{{ $desc }}</p>@endisset
    </div>
</section>
