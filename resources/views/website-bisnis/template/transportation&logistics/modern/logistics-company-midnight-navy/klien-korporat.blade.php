@extends($site['view'] . '.layouts.app')

@section('title', 'Klien Korporat — ' . $site['brand']['name'])
@section('page', 'clients')

@section('content')
    @include($site['view'] . '.partials.page-header', ['title' => 'Klien Korporat', 'subtitle' => $site['clients']['subtitle']])

    <section class="lc-band lc-band--mist lc-page-sec">
        <div class="lc-wrap">
            @include($site['view'] . '.sections.clients', ['full' => true])

        </div>
    </section>

    @include($site['view'] . '.partials.cta-band')
@endsection
