@extends($hv.'layouts.app')
@section('title', $page['title'])
@section('content')
@include($hv.'partials.inner-hero')
<div class="hda-page"><div class="hda-container">
<div class="hda-layout">
<div>
    <div class="hda-detail">
        <div class="hda-detail__media"><img src="{{ $ha($item['image']) }}" alt="Preview of {{ $item['title'] }}"></div>
        <div class="hda-detail__info">
            <div class="hda-meta"><span class="hda-tag">{{ $item['type'] }}</span><span class="hda-tag hda-tag--gold">{{ $item['year'] }}</span></div>
            <h2 style="margin-top:.4em">{{ $item['title'] }}</h2>
            <p style="color:var(--muted)">By {{ $item['author'] }}</p>
            <dl class="hda-spec">
                <dt>Category</dt><dd><a href="{{ $hu('category', $item['category']) }}">{{ $hf('categories', $item['category'])['title'] }}</a></dd>
                <dt>Period</dt><dd>{{ $item['period'] }}</dd>
                <dt>Place</dt><dd><a href="{{ $hu('location', $item['location']) }}">{{ $hf('locations', $item['location'])['title'] }}</a></dd>
                <dt>Collection</dt><dd><a href="{{ $hu('collection', $item['collection']) }}">{{ $hf('collections', $item['collection'])['title'] }}</a></dd>
                <dt>Ref. No</dt><dd>{{ $item['ref'] }}</dd><dt>Language</dt><dd>{{ $item['language'] }}</dd><dt>Pages</dt><dd>{{ $item['pages'] }}</dd><dt>Formats</dt><dd>{{ $item['fmt'] }} ({{ $item['size'] }})</dd>
            </dl>
            <div class="hda-actions">
                <a class="hda-btn hda-btn--primary" href="{{ $hu('viewer', $item['slug']) }}"><svg class="hda-icon"><use href="#i-play"/></svg>Open Viewer</a>
                <button type="button" class="hda-btn hda-btn--outline" data-save="doc:{{ $item['slug'] }}" aria-pressed="false"><svg class="hda-icon"><use href="#i-bookmark"/></svg>Save</button>
                <a class="hda-btn hda-btn--outline" href="{{ $hu('downloads') }}"><svg class="hda-icon"><use href="#i-download"/></svg>Download</a>
                <a class="hda-btn hda-btn--outline" href="{{ $hu('citation') }}">Cite</a>
            </div>
        </div>
    </div>
    <div class="hda-prose" style="margin-top:34px"><h2>About this document</h2>@foreach($item['long'] as $p)<p>{{ $p }}</p>@endforeach</div>
</div>
<aside class="hda-aside">
    <div class="hda-panel"><h3>Rights &amp; use</h3><p style="font-size:.9rem;margin:0">Check the rights statement before reuse. See the <a class="hda-textlink" href="{{ $hu('policy') }}">Access &amp; Usage Policy</a>.</p></div>
    <div class="hda-panel"><h3>Share</h3><button type="button" class="hda-btn hda-btn--outline hda-btn--sm" data-copy="">Copy permanent link</button></div>
</aside>
</div>
<section>
    <div class="hda-sechead"><h2>Related documents</h2></div>
    <div class="hda-grid">
        @foreach($hw('documents', 'category', $item['category']) as $d)
        @if($d['slug'] != $item['slug'])
        @include($hv.'partials.card-document')
        @endif
        @endforeach
    </div>
</section>
</div></div>
@endsection
