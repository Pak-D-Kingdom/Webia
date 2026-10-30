@extends($v.'layouts.app')

@section('title', 'Opsi Pengiriman - '.$site['brand']['name'])

@section('content')
    @php $f = $site['freight']; $optIcons = ['box', 'bolt', 'sparkle', 'cube']; @endphp

    @include($v.'partials.page-header', ['ph' => [
        'crumb' => 'Opsi Pengiriman',
        'title' => $f['title'],
        'text'  => $f['text'],
        'image' => 'hero-plane.jpg',
    ]])

    <section class="lg-wrap lg-sec" id="opsi">
        <div class="lg-split">
            <div data-tabs data-sync-url="tab">
                <div class="lg-tabs lg-tabs--lg" role="tablist" aria-label="Moda pengiriman">
                    @foreach ($f['tabs'] as $key => $tab)
                        <button type="button" role="tab" class="lg-tab {{ $key === $f['default'] ? 'is-active' : '' }}" data-tab="{{ $key }}" aria-selected="{{ $key === $f['default'] ? 'true' : 'false' }}">{{ $tab['label'] }}</button>
                    @endforeach
                </div>

                @foreach ($f['tabs'] as $key => $tab)
                    <div role="tabpanel" data-panel="{{ $key }}" @if ($key !== $f['default']) hidden @endif>
                        <p class="lg-lead">{{ $tab['text'] }}</p>
                        <div class="lg-grid lg-grid--2">
                            @foreach ($tab['options'] as $i => $o)
                                <article class="lg-opt">
                                    <header>
                                        <span class="lg-opt__ic"><svg class="lg-ic" aria-hidden="true"><use href="#i-{{ $optIcons[$i % 4] }}"></use></svg></span>
                                        <div>
                                            <h2>{{ $o['name'] }}</h2>
                                            <span class="lg-chip">{{ $o['eta'] }}</span>
                                        </div>
                                    </header>
                                    <p>{{ $o['desc'] }}</p>
                                    <dl>
                                        <div><dt>Estimasi tarif</dt><dd>{{ $o['price'] }}</dd></div>
                                        <div><dt>Cocok untuk</dt><dd>{{ $o['best'] }}</dd></div>
                                    </dl>
                                    <a class="lg-link" href="{{ $to('penawaran') }}?layanan={{ urlencode($tab['label'].' - '.$o['name']) }}">Minta penawaran<svg class="lg-ic" aria-hidden="true"><use href="#i-arrow-right"></use></svg></a>
                                </article>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

            <aside class="lg-aside">
                <img src="{{ $img($f['image']) }}" alt="Pesawat kargo Energi Cargo" loading="lazy">
                <p>{{ $f['note'] }}</p>
                <a class="lg-btn lg-btn--primary lg-btn--sm" href="{{ $to('penawaran') }}">Minta Penawaran<svg class="lg-ic" aria-hidden="true"><use href="#i-arrow-right"></use></svg></a>
            </aside>
        </div>
    </section>
@endsection
