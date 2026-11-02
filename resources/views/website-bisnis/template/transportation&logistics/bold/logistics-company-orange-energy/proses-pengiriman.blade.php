@extends($v.'layouts.app')

@section('title', 'Proses Pengiriman - '.$site['brand']['name'])

@section('content')
    @php $p = $site['process']; @endphp

    @include($v.'partials.page-header', ['ph' => [
        'crumb' => 'Proses Pengiriman',
        'title' => $p['title'],
        'text'  => $p['text'],
        'image' => 'hero-truck.jpg',
    ]])

    <section class="lg-wrap lg-sec">
        <ol class="lg-steps">
            @foreach ($p['steps'] as $i => $s)
                <li class="lg-step" id="langkah-{{ $i + 1 }}">
                    <span class="lg-step__dot">
                        @if ($s['icon'])
                            <svg class="lg-ic" aria-hidden="true"><use href="#i-{{ $s['icon'] }}"></use></svg>
                        @else
                            {{ $i + 1 }}
                        @endif
                    </span>
                    <div class="lg-step__body">
                        <span class="lg-chip">Langkah {{ $i + 1 }}</span>
                        <h2>{{ $s['title'] }} @if ($s['note'])<small>{{ $s['note'] }}</small>@endif</h2>
                        <p>{{ $s['text'] }}</p>
                    </div>
                </li>
            @endforeach
        </ol>

        <div class="lg-cta lg-cta--inline">
            <div>
                <h2>Sudah punya nomor resi?</h2>
                <p>Pantau posisi barang Anda kapan saja lewat halaman tracking.</p>
            </div>
            <div class="lg-cta__btns">
                <a class="lg-btn lg-btn--white" href="{{ $to('tracking') }}">Lacak Pengiriman<svg class="lg-ic" aria-hidden="true"><use href="#i-arrow-right"></use></svg></a>
            </div>
        </div>
    </section>
@endsection
