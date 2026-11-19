{{-- Header halaman dalam. Membaca $meta (judul, lead, crumb, gambar, tombol) dari config pages[$page]. --}}
<section class="fh-pagehead" aria-labelledby="fh-pagehead-title">
    <div class="fh-pagehead__bg" aria-hidden="true">
        <span class="fh-pagehead__blob fh-pagehead__blob--1"></span>
        <span class="fh-pagehead__blob fh-pagehead__blob--2"></span>
        <span class="fh-pagehead__leaf fh-pagehead__leaf--1">{{ $icon('leaf') }}</span>
        <span class="fh-pagehead__leaf fh-pagehead__leaf--2">{{ $icon('leaf') }}</span>
        <span class="fh-pagehead__leaf fh-pagehead__leaf--3">{{ $icon('leaf') }}</span>
    </div>

    <div class="fh-wrap fh-pagehead__in">
        <div class="fh-pagehead__copy">
            <nav class="fh-crumb" aria-label="Breadcrumb">
                <a href="{{ $url('') }}">Beranda</a>
                <span aria-hidden="true">{{ $icon('chevron', 'fh-ic fh-crumb__sep') }}</span>
                <span aria-current="page">{{ $meta['crumb'] }}</span>
            </nav>
            <p class="fh-script fh-pagehead__script">{{ $cfg['hero']['script'] }}</p>
            <h1 id="fh-pagehead-title">{{ $meta['heading'] }}</h1>
            <p class="fh-pagehead__lead">{{ $meta['lead'] }}</p>
            @if (! empty($meta['actions']))
                <div class="fh-pagehead__actions">
                    @foreach ($meta['actions'] as $act)
                        <a class="fh-btn {{ $act[2] === 'primary' ? 'fh-btn--lime' : 'fh-btn--ghost' }}" href="{{ $url($act[1]) }}">{{ $act[0] }} {{ $icon('arrow') }}</a>
                    @endforeach
                </div>
            @endif
        </div>

        <div class="fh-pagehead__art" aria-hidden="true">
            <figure class="fh-frame" style="max-width: {{ $meta['frame'] ?? 480 }}px">
                <img src="{{ $img($meta['image']) }}" alt="" style="object-position: {{ $meta['focus'] ?? '50% 50%' }}">
            </figure>
            <span class="fh-pagehead__badge">{{ $icon('leaf') }}</span>
        </div>
    </div>
</section>
