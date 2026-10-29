@extends($ns . '.layouts.app')
@section('title', 'Testimoni Pelanggan')
@section('page', 'testimoni')
@section('content')
    @include($ns . '.partials.page-header', ['title' => 'Testimoni Pelanggan', 'subtitle' => 'Kepuasan pelanggan adalah prioritas kami.'])
    @include($ns . '.sections.testimonials')
@endsection
