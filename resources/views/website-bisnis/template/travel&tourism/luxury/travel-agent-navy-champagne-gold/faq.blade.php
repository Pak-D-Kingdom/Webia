@extends($ns . '.layouts.app')

@section('title', 'FAQ & AI Chatbot — GrandJourney')

@section('content')
    @include($ns . '.partials.page-header', ['title' => 'FAQ & AI Chatbot', 'subtitle' => 'Jawaban cepat seputar destinasi dan paket tour, atau tanya langsung ke AI Travel Assistant.'])
    @include($ns . '.sections.faq', ['mode' => 'full'])
    @include($ns . '.sections.ai-banner')
@endsection
