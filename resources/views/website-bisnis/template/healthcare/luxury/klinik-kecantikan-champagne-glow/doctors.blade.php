@extends($v . '.layouts.app')

@section('active', 'doctors')
@section('title', 'Doctors — ' . $c['brand']['name'])

@section('content')
    @include($v . '.partials.page-header', [
        'heading' => 'Our Doctors & Staff',
        'lead'    => 'Tim dokter dan tenaga profesional kami siap memberikan perawatan terbaik untuk Anda.',
    ])

    <div class="cg-container cg-inner">
        @include($v . '.sections.doctors', ['full' => true])
    </div>
@endsection
