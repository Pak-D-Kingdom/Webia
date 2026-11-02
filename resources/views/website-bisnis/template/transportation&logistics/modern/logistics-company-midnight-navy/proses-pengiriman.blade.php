@extends($site['view'] . '.layouts.app')

@section('title', 'Proses Pengiriman — ' . $site['brand']['name'])
@section('page', 'process')

@section('content')
    @include($site['view'] . '.partials.page-header', ['title' => 'Proses Pengiriman', 'subtitle' => $site['process']['subtitle']])

    <section class="lc-band lc-band--mist lc-page-sec">
        <div class="lc-wrap">
            @include($site['view'] . '.sections.process', ['full' => true])

        </div>
    </section>

    @include($site['view'] . '.partials.cta-band')
@endsection
