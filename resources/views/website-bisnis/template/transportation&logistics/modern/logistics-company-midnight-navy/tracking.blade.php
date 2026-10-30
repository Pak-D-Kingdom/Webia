@extends($site['view'] . '.layouts.app')

@section('title', 'Tracking Pengiriman — ' . $site['brand']['name'])
@section('page', 'tracking')

@section('content')
    @include($site['view'] . '.partials.page-header', ['title' => 'Tracking Pengiriman', 'subtitle' => $site['tracking']['subtitle']])

    <section class="lc-band lc-band--mist lc-page-sec">
        <div class="lc-wrap">
            @include($site['view'] . '.sections.tracking', ['full' => true])

        </div>
    </section>

    @include($site['view'] . '.partials.cta-band')
@endsection
