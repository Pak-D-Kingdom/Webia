@extends('website-bisnis.template.interior&architecture.luxury.furniture-chocolate-luxe.layouts.app')

@section('title', 'AI Chatbot - FAQ Produk & Kustomisasi')

@section('content')
    @php
        $f = $furniture;
        $v = 'website-bisnis.template.interior&architecture.luxury.furniture-chocolate-luxe.sections';
    @endphp

    @include($v . '.page-header', [
        'pageTitle' => $f['ai']['title'],
        'pageText'  => 'FAQ produk dan kustomisasi furniture, dijawab langsung oleh asisten AI kami.',
        'pageImage' => $f['paths']['images'] . '/footer-room.jpg',
        'pageCrumb' => 'AI Chatbot',
    ])

    @include($v . '.ai-faq')
@endsection
