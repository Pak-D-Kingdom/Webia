@extends($fdBase . '.layout')
@php
    $i = fn ($f) => asset($fdImg . '/' . $f);
    $r = fn ($n) => str_starts_with($n, '#') ? $n : route('foundation-classic-trust.' . $n);
@endphp
@section('title', 'HarapanBot — FAQ Program & Donasi')

@section('content')
@include($fdBase . '.partials.page-hero', ['title' => 'HarapanBot — FAQ Program & Donasi', 'lead' => 'Asisten AI kami siap membantu Anda seputar program, donasi, dan kegiatan terbaru.'])

<section class="fd-section">
    <div class="fd-wrap fd-split fd-split--chat">
        <div class="fd-reveal">@include($fdBase . '.partials.chat-box', ['mode' => 'inline'])</div>
        <div class="fd-reveal">
            @foreach (collect($fd['faq']['items'])->groupBy('group') as $group => $items)
                <div class="fd-sectionhead" style="margin:{{ $loop->first ? '0' : '26px' }} 0 12px"><h2 style="font-size:20px">FAQ {{ $group }}</h2></div>
                <div class="fd-acc">
                    @foreach ($items as $it)
                        <details>
                            <summary>{{ $it['q'] }}</summary>
                            <p>{{ $it['a'] }}</p>
                            <p style="padding-bottom:14px"><button type="button" class="fd-chip" data-fd-inline-ask="{{ $it['q'] }}">Tanyakan ke HarapanBot</button></p>
                        </details>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
