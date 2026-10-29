@extends($ns . '.layouts.app')

@section('title', 'Jadwal Keberangkatan — GrandJourney')

@section('content')
    @include($ns . '.partials.page-header', ['title' => 'Jadwal Keberangkatan', 'subtitle' => 'Pilih tanggal keberangkatan yang sesuai dengan rencana Anda.'])
    @include($ns . '.sections.schedules', ['mode' => 'full'])
@endsection
