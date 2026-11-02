@extends($site['view'] . '.layouts.app')

@section('title', 'Jangkauan Layanan — ' . $site['brand']['name'])
@section('page', 'coverage')

@section('content')
    @include($site['view'] . '.partials.page-header', ['title' => 'Jangkauan Layanan', 'subtitle' => $site['coverage']['subtitle']])

    <section class="lc-band lc-band--dark lc-page-sec">
        <div class="lc-wrap">
            @include($site['view'] . '.sections.coverage', ['full' => true])

        </div>
    </section>

    @include($site['view'] . '.partials.cta-band')
@endsection
