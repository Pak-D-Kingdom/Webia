@extends($v . '.layouts.app')

@section('active', 'faq')
@section('title', 'FAQ — ' . $c['brand']['name'])

@section('content')
    @include($v . '.partials.page-header', [
        'heading' => 'Frequently Asked Questions',
        'lead'    => 'Temukan jawaban untuk pertanyaan yang sering diajukan.',
    ])

    <div class="cg-container cg-inner">
        @include($v . '.sections.faq', ['full' => true])
    </div>
@endsection
