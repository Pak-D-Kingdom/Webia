{{-- Param: $eyebrow, $title, $desc (opsional), $href, $label (opsional), $arrows (opsional, id carousel) --}}
<div class="sec-head reveal">
    <div class="ttl">
        <span class="eyebrow">{{ $eyebrow }}</span>
        <h2 class="h2">{!! $title !!}</h2>
        @isset($desc)<p class="lead">{{ $desc }}</p>@endisset
    </div>
    <div class="flex items-center gap-3">
        @isset($arrows)
            <div class="arrows">
                <button type="button" class="icon-btn" data-scroll="{{ $arrows }}" data-dir="-1" aria-label="Sebelumnya">{{ $ic('arrow-l') }}</button>
                <button type="button" class="icon-btn" data-scroll="{{ $arrows }}" data-dir="1" aria-label="Berikutnya">{{ $ic('arrow') }}</button>
            </div>
        @endisset
        @isset($href)<a href="{{ $href }}" class="btn btn-ghost btn-sm">{{ $label ?? 'Lihat Semua' }} {{ $ic('arrow', 'ico-sm') }}</a>@endisset
    </div>
</div>
