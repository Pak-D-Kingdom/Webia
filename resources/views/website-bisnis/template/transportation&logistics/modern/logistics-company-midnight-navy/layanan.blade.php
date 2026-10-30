@extends($site['view'] . '.layouts.app')

@section('title', 'Layanan Logistik Kami — ' . $site['brand']['name'])
@section('page', 'services')

@section('content')
    @include($site['view'] . '.partials.page-header', ['title' => 'Layanan Logistik Kami', 'subtitle' => $site['services']['subtitle']])

    <section class="lc-band lc-band--light lc-page-sec">
        <div class="lc-wrap">
            @include($site['view'] . '.sections.services', ['full' => true])

        </div>
    </section>

    @include($site['view'] . '.partials.cta-band')
@endsection
