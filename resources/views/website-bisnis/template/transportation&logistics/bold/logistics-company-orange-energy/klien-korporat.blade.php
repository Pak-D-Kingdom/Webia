@extends($v.'layouts.app')

@section('title', 'Klien Korporat - '.$site['brand']['name'])

@section('content')
    @php $c = $site['clients']; @endphp

    @include($v.'partials.page-header', ['ph' => [
        'crumb' => 'Klien Korporat',
        'title' => $c['title'],
        'text'  => $c['text'],
        'image' => 'fleet-trucks.jpg',
    ]])

    <section class="lg-wrap lg-sec">
        <ul class="lg-grid lg-grid--4 lg-logos">
            @foreach ($c['items'] as $client)
                <li class="lg-logos__item">
                    <div><img src="{{ $img($client['logo']) }}" alt="{{ $client['name'] }}" loading="lazy"></div>
                    <strong>{{ $client['name'] }}</strong>
                    <span>{{ $client['sector'] }}</span>
                </li>
            @endforeach
        </ul>

        <h2 class="lg-h2">Layanan untuk mitra korporat</h2>
        <div class="lg-grid lg-grid--4">
            @foreach ($c['benefits'] as $b)
                <article class="lg-mini">
                    <span class="lg-mini__ic"><svg class="lg-ic" aria-hidden="true"><use href="#i-check"></use></svg></span>
                    <h3>{{ $b['title'] }}</h3>
                    <p>{{ $b['text'] }}</p>
                </article>
            @endforeach
        </div>
    </section>

    @include($v.'partials.cta-band')
@endsection
