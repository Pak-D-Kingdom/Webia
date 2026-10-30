@extends($site['view'] . '.layouts.app')

@section('title', 'Armada & Gudang — ' . $site['brand']['name'])
@section('page', 'fleet')

@section('content')
    @include($site['view'] . '.partials.page-header', ['title' => 'Armada & Gudang', 'subtitle' => $site['fleet']['subtitle']])

    <section class="lc-band lc-band--dark lc-page-sec">
        <div class="lc-wrap">
            @include($site['view'] . '.sections.fleet', ['full' => true])

        </div>
    </section>

    @include($site['view'] . '.partials.cta-band')
@endsection
