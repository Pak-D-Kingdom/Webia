@extends($site['view'] . '.layouts.app')

@section('title', 'Solusi Freight — ' . $site['brand']['name'])
@section('page', 'freight')

@section('content')
    @include($site['view'] . '.partials.page-header', ['title' => 'Solusi Freight', 'subtitle' => $site['freight']['subtitle']])

    <section class="lc-band lc-band--dark lc-page-sec">
        <div class="lc-wrap">
            @include($site['view'] . '.sections.freight', ['full' => true])

        </div>
    </section>

    @include($site['view'] . '.partials.cta-band')
@endsection
