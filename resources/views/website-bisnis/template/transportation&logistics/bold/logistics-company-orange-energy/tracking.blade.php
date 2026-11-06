@extends($v.'layouts.app')

@section('title', 'Lacak Pengiriman - '.$site['brand']['name'])

@section('content')
    @php $t = $site['tracking']; $stageIcons = ['box', 'clipboard', 'truck', 'check']; $demoKeys = array_keys($t['demo']); @endphp

    @include($v.'partials.page-header', ['ph' => [
        'crumb' => 'Tracking',
        'title' => $t['title'],
        'text'  => $t['text'],
        'image' => 'hero-scene.jpg',
    ]])

    <section class="lg-wrap lg-sec">
        <div class="lg-trkpage">
            <form class="lg-trkpage__form" data-track-form action="{{ $to('tracking') }}" method="get" novalidate>
                <label for="lg-resi">Nomor resi / tracking</label>
                <div class="lg-trkpage__row">
                    <input id="lg-resi" name="resi" type="text" placeholder="{{ $t['placeholder'] }}" autocomplete="off" value="{{ request("resi") }}" data-track-input>
                    <button class="lg-btn lg-btn--primary" type="submit">Lacak<svg class="lg-ic" aria-hidden="true"><use href="#i-arrow-right"></use></svg></button>
                </div>
                <p class="lg-trkpage__hint">
                    @if ($t['endpoint'])
                        Masukkan nomor resi yang tertera pada tanda terima Anda.
                    @else
                        Mode demo. Coba nomor:
                        @foreach ($demoKeys as $k)
                            <button type="button" class="lg-chip lg-chip--btn" data-track-demo="{{ $k }}">{{ $k }}</button>
                        @endforeach
                    @endif
                </p>
            </form>

            <div class="lg-trkpage__result" data-track-result aria-live="polite" hidden></div>

            <ol class="lg-trk__stages lg-trk__stages--page">
                @foreach ($t['stages'] as $i => $st)
                    <li>
                        <span><svg class="lg-ic" aria-hidden="true"><use href="#i-{{ $stageIcons[$i] }}"></use></svg></span>
                        <small>{{ $st }}</small>
                    </li>
                @endforeach
            </ol>
        </div>
    </section>
@endsection
