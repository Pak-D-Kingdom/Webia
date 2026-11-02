@extends($ns . '.layouts.app')
@section('title', 'Jadwal Keberangkatan')
@section('page', 'jadwal')
@section('content')
    @include($ns . '.partials.page-header', ['title' => 'Jadwal Keberangkatan', 'subtitle' => 'Pilih tanggal keberangkatan yang sesuai dengan kebutuhan Anda.'])
    @include($ns . '.sections.schedule')
@endsection
