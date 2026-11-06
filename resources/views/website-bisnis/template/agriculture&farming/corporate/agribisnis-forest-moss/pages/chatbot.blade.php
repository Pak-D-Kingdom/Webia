@php($cfg = $cfg ?? config('template.agriculture&farming.corporate.agribisnis-forest-moss.agribisnis'))
@extends('website-bisnis.template.agriculture&farming.corporate.agribisnis-forest-moss.layouts.app')

@section('title', 'AI Assistant — Green Harvest')

@section('content')
    @include('website-bisnis.template.agriculture&farming.corporate.agribisnis-forest-moss.partials.page-header', ['page' => $cfg['pages']['chatbot']])

    <section class="section container">
        <div class="ai-layout">
            <div class="ai-hero">
                <img src="{{ asset($cfg['img']['robot']) }}" alt="Maskot AI Assistant Green Harvest" loading="lazy" width="480" height="488">
                <h2>{{ $cfg['ai']['title'] }}<br>{{ $cfg['ai']['title2'] }}</h2>
                <p>{{ $cfg['ai']['text'] }}</p>
            </div>
            <div class="chat-card">
                <header class="chat-panel__head">
                    <img src="{{ asset($cfg['img']['bot']) }}" alt="" width="42" height="42">
                    <div><strong>{{ $cfg['chatbot']['name'] }}</strong><small>{{ $cfg['chatbot']['status'] }}</small></div>
                    <button class="icon-btn icon-btn--light" type="button" aria-label="Mulai ulang percakapan" title="Mulai ulang" data-chat-reset><svg class="ic" aria-hidden="true"><use href="#i-refresh"/></svg></button>
                </header>
                @include('website-bisnis.template.agriculture&farming.corporate.agribisnis-forest-moss.partials.chat-box', ['suffix' => 'Page'])
            </div>
        </div>
    </section>
@endsection
