@extends($hv.'layouts.app')
@section('title', $page['title'])
@section('content')
@include($hv.'partials.inner-hero')
<div class="hda-page"><div class="hda-container">
<div class="hda-layout">
    <div>
        <div class="hda-prose"><p>Every item that reaches your screen has been assessed, cleaned, imaged and checked. Here is how it works.</p></div>
        <ol class="hda-steps" style="margin-top:18px">@foreach($hda['preservation'] as $s)<li class="hda-step hda-reveal" style="--i:{{ $loop->index }}"><h3>{{ $s['title'] }}</h3><p>{{ $s['text'] }}</p></li>@endforeach</ol>
    </div>
    <aside class="hda-aside">
        <img src="{{ $ha('stories/story-inside-a-reading-room-conservation-lab.svg') }}" alt="Conservation workbench" style="border-radius:12px;border:2px solid var(--gold)" width="800" height="600">
        <div class="hda-panel hda-panel--dark"><h3>Want to help?</h3><p style="font-size:.9rem">Volunteers transcribe handwriting and check scans.</p><a class="hda-btn hda-btn--gold hda-btn--sm" href="{{ $hu('contributors') }}">See contributors</a></div>
    </aside>
</div>
<div class="hda-banner"><div><h2>Read the story behind the lab</h2><p>A short feature on how fragile paper is mended and scanned.</p></div><a class="hda-btn hda-btn--gold" href="{{ $hu('story', 'inside-a-reading-room-conservation-lab') }}">Read the story</a></div>
</div></div>
@endsection
