@extends($v.'layouts.app')

@section('title', 'Jangkauan Layanan - '.$site['brand']['name'])

@section('content')
    @php $c = $site['coverage']; @endphp

    @include($v.'partials.page-header', ['ph' => [
        'crumb' => 'Jangkauan',
        'title' => $c['title'],
        'text'  => $c['text'],
        'image' => 'hero-ship.jpg',
    ]])

    <section class="lg-wrap lg-sec">
        <div class="lg-panel lg-cov lg-cov--page">
            <div class="lg-cov__map"><img src="{{ $img($c['image']) }}" alt="Peta jangkauan layanan Energi Cargo"></div>
            <ul class="lg-stats">
                @foreach ($c['stats'] as $s)
                    <li>
                        <strong @if ($s['value']) data-count="{{ $s['value'] }}" data-suffix="{{ $s['suffix'] }}" @endif>{{ $s['display'] ?? ($s['value'].$s['suffix']) }}</strong>
                        <span>{{ $s['label'] }}</span>
                    </li>
                @endforeach
            </ul>
        </div>

        <h2 class="lg-h2">Wilayah tujuan internasional</h2>
        <div class="lg-grid lg-grid--4">
            @foreach ($c['regions'] as $r)
                <article class="lg-mini">
                    <span class="lg-mini__ic"><svg class="lg-ic" aria-hidden="true"><use href="#i-globe"></use></svg></span>
                    <h3>{{ $r['title'] }}</h3>
                    <p>{{ $r['text'] }}</p>
                </article>
            @endforeach
        </div>

        <h2 class="lg-h2">{{ count($c['hubs']) }} kantor cabang di Indonesia</h2>
        <ul class="lg-hubs">
            @foreach ($c['hubs'] as $hub)
                <li><svg class="lg-ic" aria-hidden="true"><use href="#i-pin"></use></svg>{{ $hub }}</li>
            @endforeach
        </ul>
    </section>

    @include($v.'partials.cta-band')
@endsection
