@extends($hv.'layouts.app')
@section('title', $page['title'])
@section('content')
@include($hv.'partials.inner-hero')
<div class="hda-page"><div class="hda-container">
<div class="hda-viewer" data-viewer data-pages="{{ $item['pages'] }}">
    <div class="hda-viewer__bar">
        <strong class="hda-viewer__title">{{ $item['title'] }}</strong>
        <button type="button" class="hda-btn hda-btn--ghost" data-v="prev" aria-label="Previous page"><svg class="hda-icon"><use href="#i-left"/></svg></button>
        <span class="hda-zoom" data-pgno>1 / 1</span>
        <button type="button" class="hda-btn hda-btn--ghost" data-v="next" aria-label="Next page"><svg class="hda-icon"><use href="#i-right"/></svg></button>
        <button type="button" class="hda-btn hda-btn--ghost" data-v="out" aria-label="Zoom out"><svg class="hda-icon"><use href="#i-zout"/></svg></button>
        <span class="hda-zoom" data-zoom-label>100%</span>
        <button type="button" class="hda-btn hda-btn--ghost" data-v="in" aria-label="Zoom in"><svg class="hda-icon"><use href="#i-zin"/></svg></button>
        <button type="button" class="hda-btn hda-btn--ghost" data-v="rot" aria-label="Rotate"><svg class="hda-icon"><use href="#i-rotate"/></svg></button>
        <button type="button" class="hda-btn hda-btn--ghost" data-v="reset">Reset</button>
        <button type="button" class="hda-btn hda-btn--ghost" data-v="full" aria-label="Full screen"><svg class="hda-icon"><use href="#i-expand"/></svg></button>
        <button type="button" class="hda-btn hda-btn--ghost" data-v="side" aria-pressed="true">Transcript</button>
    </div>
    <div class="hda-viewer__stage"><div class="hda-viewer__page" data-vpage><img src="{{ $ha($item['image']) }}" alt="Digitised page of {{ $item['title'] }}" draggable="false"></div></div>
    <div class="hda-viewer__side" data-vside>
        <h3 style="font-size:1.05rem;margin-bottom:.5em">Transcription (sample)</h3>
        <div class="hda-progress" aria-hidden="true" style="margin-bottom:12px"><i></i></div>
        @foreach($item['long'] as $p)<p style="font-size:.9rem">{{ $p }}</p>@endforeach
        <p style="font-size:.8rem;color:var(--muted)">In a live archive this panel shows the page-by-page transcription.</p>
    </div>
</div>
<div class="hda-actions"><a class="hda-btn hda-btn--outline" href="{{ $hu('document', $item['slug']) }}"><svg class="hda-icon"><use href="#i-left"/></svg>Back to record</a><button type="button" class="hda-btn hda-btn--outline" data-save="doc:{{ $item['slug'] }}" aria-pressed="false"><svg class="hda-icon"><use href="#i-bookmark"/></svg>Save</button></div>
</div></div>
@endsection
