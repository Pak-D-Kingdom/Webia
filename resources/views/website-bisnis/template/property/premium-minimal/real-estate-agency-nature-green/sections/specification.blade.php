@php $isPreview = !empty($preview); @endphp
<section class="panel" id="specification" aria-labelledby="h-spec">
    @if ($isPreview)
        <header class="panel__head">
            <div>
                <h2 id="h-spec" class="panel__title">Spesifikasi Properti</h2>
                <p class="panel__sub">Detail lengkap properti Anda</p>
            </div>
        </header>
    @else
        <h2 id="h-spec" class="sr-only">Spesifikasi properti</h2>
    @endif

    <ul class="spec {{ $isPreview ? '' : 'spec--wide' }}">
        @foreach ($t['spec'] as $s)
            <li class="spec__item">
                <span class="spec__ico"><svg class="i" aria-hidden="true"><use href="#i-{{ $s['icon'] }}"/></svg></span>
                <span><small class="spec__lab">{{ $s['label'] }}</small><b class="spec__val">{{ $s['value'] }}</b></span>
            </li>
        @endforeach
    </ul>

    @if ($isPreview)
        <a class="link-all link-all--foot" href="{{ $r('specification') }}">Lihat Selengkapnya <svg class="i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
    @endif
</section>
