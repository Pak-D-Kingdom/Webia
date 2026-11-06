@extends($v . '.layouts.app')

@section('active', 'services')
@section('title', 'Services — ' . $c['brand']['name'])

@section('content')
    @include($v . '.partials.page-header', [
        'heading' => 'Our Services',
        'lead'    => 'Solusi perawatan kecantikan lengkap untuk kulit yang lebih sehat dan bercahaya.',
    ])

    <div class="cg-container cg-inner">
        @include($v . '.sections.services', ['full' => true])
    </div>
@endsection
