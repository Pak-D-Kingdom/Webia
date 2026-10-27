@php
    $v      = 'website-bisnis.template.healthcare.professional.klinik-kecantikan-clean-white.';
    $clinic = config('template.healthcare.professional.klinik-kecantikan-clean-white.klinik-kecantikan');
    $img    = fn (string $file) => asset($clinic['paths']['images'] . '/' . $file);
@endphp
@extends($v . 'layouts.app')

@section('title', 'Pertanyaan yang Sering Diajukan — ' . $clinic['brand']['name'])

@section('content')
    @include($v . 'partials.page-hero', [
        'crumb' => 'FAQ',
        'title' => 'Pertanyaan yang Sering Diajukan',
        'text'  => 'Jawaban singkat seputar booking, perawatan, pembayaran, dan kenyamanan Anda.',
        'image' => 'assistant-mascot.jpg',
        'alt'   => 'Maskot asisten kecantikan',
    ])
    @include($v . 'sections.faq', ['full' => true])
@endsection
