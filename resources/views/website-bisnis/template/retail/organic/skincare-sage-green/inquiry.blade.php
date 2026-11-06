@php
    $active = 'inquiry';
    $cfg = config('template.retail.organic.skincare-sage-green.skincare');
@endphp
@extends($cfg['view'] . 'layouts.app')

@section('title', 'Inquiry — PureGlow')
@section('description', 'Kirim pertanyaan, permintaan penawaran, atau pre-order produk PureGlow lewat WhatsApp.')

@section('content')
    @include($cfg['view'] . 'partials.page-head', [
        'eyebrow' => 'Inquiry',
        'title'   => 'Inquiry & Konsultasi',
        'text'    => 'Isi formulir singkat dan pesanmu langsung terkirim ke WhatsApp tim PureGlow.',
    ])
    @include($cfg['view'] . 'sections.inquiry', ['full' => true])
@endsection
