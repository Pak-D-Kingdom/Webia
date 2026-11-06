@extends($v . '.layouts.app')

@section('active', 'policy')
@section('title', 'Kebijakan & Informasi — ' . $c['brand']['name'])

@section('content')
    @include($v . '.partials.page-header', [
        'heading' => 'Kebijakan & Informasi',
        'lead'    => 'Privasi, syarat layanan, dan pembatalan — ringkas dan jelas.',
    ])

    <div class="cg-container cg-inner">
        @include($v . '.sections.policy', ['full' => true])
    </div>
@endsection
