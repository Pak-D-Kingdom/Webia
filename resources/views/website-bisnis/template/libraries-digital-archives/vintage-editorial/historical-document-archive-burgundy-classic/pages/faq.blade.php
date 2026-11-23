@extends($hv.'layouts.app')
@section('title', $page['title'])
@section('content')
@include($hv.'partials.inner-hero')
<div class="hda-page"><div class="hda-container">
<div class="hda-layout">
<div class="hda-faq">
    @foreach($hda['faqs'] as $g)
    <section id="faq-{{ $loop->iteration }}" style="margin-bottom:26px">
        <h2 style="font-size:1.4rem;margin-bottom:12px">{{ $g['group'] }}</h2>
        @foreach($g['items'] as $it)
        <details><summary>{{ $it['q'] }}</summary><div class="hda-faq__a">{{ $it['a'] }}</div></details>
        @endforeach
    </section>
    @endforeach
</div>
<aside class="hda-aside"><div class="hda-panel"><h3>Jump to</h3><ul class="hda-list">@foreach($hda['faqs'] as $g)<li><a class="hda-textlink" href="#faq-{{ $loop->iteration }}">{{ $g['group'] }}</a></li>@endforeach</ul></div>
<div class="hda-panel hda-panel--dark"><h3>Still stuck?</h3><p style="font-size:.9rem">Ask the Library Assistant or write to us.</p><a class="hda-btn hda-btn--gold hda-btn--sm" href="{{ $hu('contact') }}">Contact</a></div></aside>
</div>
</div></div>
@endsection
