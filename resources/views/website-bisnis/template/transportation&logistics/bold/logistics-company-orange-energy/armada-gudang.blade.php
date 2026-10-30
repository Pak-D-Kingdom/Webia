@extends($v.'layouts.app')

@section('title', 'Armada & Gudang - '.$site['brand']['name'])

@section('content')
    @php $f = $site['fleet']; @endphp

    @include($v.'partials.page-header', ['ph' => [
        'crumb' => 'Armada & Gudang',
        'title' => $f['title'],
        'text'  => $f['text'],
        'image' => 'fleet-strip.jpg',
    ]])

    <section class="lg-wrap lg-sec">
        <div class="lg-stack">
            @foreach ($f['items'] as $item)
                <article class="lg-row" id="{{ \Illuminate\Support\Str::slug($item['line1'].' '.$item['line2']) }}">
                    <div class="lg-row__img"><img src="{{ $img($item['image']) }}" alt="{{ $item['line1'].' '.$item['line2'] }}" loading="lazy"></div>
                    <div class="lg-row__body">
                        <span class="lg-row__ic"><svg class="lg-ic" aria-hidden="true"><use href="#i-{{ $item['icon'] }}"></use></svg></span>
                        <h2>{{ $item['line1'].' '.$item['line2'] }}</h2>
                        <p>{{ $item['text'] }}</p>
                        <ul class="lg-check lg-check--2">
                            @foreach ($item['specs'] as $spec)
                                <li><svg class="lg-ic" aria-hidden="true"><use href="#i-check"></use></svg>{{ $spec }}</li>
                            @endforeach
                        </ul>
                    </div>
                </article>
            @endforeach
        </div>

        <h2 class="lg-h2">Galeri fasilitas</h2>
        <div class="lg-grid lg-grid--3">
            @foreach ($f['gallery'] as $g)
                <figure class="lg-fig">
                    <img src="{{ $img($g['image']) }}" alt="{{ $g['caption'] }}" loading="lazy">
                    <figcaption>{{ $g['caption'] }}</figcaption>
                </figure>
            @endforeach
        </div>
    </section>

    @include($v.'partials.cta-band')
@endsection
