@extends($v . '.layouts.app')

@section('active', 'schedule')
@section('title', 'Schedule — ' . $c['brand']['name'])

@section('content')
    @include($v . '.partials.page-header', [
        'heading' => 'Jadwal Praktik',
        'lead'    => 'Atur jadwal kunjungan Anda dengan mudah.',
    ])

    <div class="cg-container cg-inner">
        @include($v . '.sections.schedule', ['full' => true])
    </div>
@endsection
