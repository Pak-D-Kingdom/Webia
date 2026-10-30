@extends($v.'layouts.app')

@section('title', $site['brand']['name'].' - '.$site['brand']['tagline'])

@section('content')
    @include($v.'sections.hero')
    @include($v.'sections.services-preview')

    <section class="lg-wrap lg-trio">
        @include($v.'sections.freight-preview')
        @include($v.'sections.coverage-preview')
        @include($v.'sections.fleet-preview')
    </section>

    <section class="lg-band">
        <div class="lg-wrap lg-band__grid">
            @include($v.'sections.process-preview')
            @include($v.'sections.tracking-preview')
            @include($v.'sections.clients-preview')
            @include($v.'sections.quotation-preview')
        </div>
    </section>

    @include($v.'sections.ai-preview')
@endsection
