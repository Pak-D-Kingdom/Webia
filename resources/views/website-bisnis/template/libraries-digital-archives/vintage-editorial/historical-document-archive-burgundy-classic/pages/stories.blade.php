@extends($hv.'layouts.app')
@section('title', $page['title'])
@section('content')
@include($hv.'partials.inner-hero')
<div class="hda-page"><div class="hda-container">
<section class="hda-reveal">
    @foreach($hda['stories'] as $st)
    @if($loop->index == 0)
    <a class="hda-feature" href="{{ $hu('story', $st['slug']) }}">
        <span class="hda-feature__img"><img src="{{ $ha($st['image']) }}" alt="" width="800" height="600"></span>
        <span class="hda-feature__body"><span class="hda-tag">Featured story · {{ $st['cat'] }}</span><h2 style="font-size:1.7rem">{{ $st['title'] }}</h2><span class="hda-card__text" style="font-size:.95rem">{{ $st['excerpt'] }}</span><span class="hda-meta"><span>{{ $st['author'] }}</span><span>{{ $st['date'] }}</span><span>{{ $st['read'] }} read</span></span></span>
    </a>
    @endif
    @endforeach
</section>
<section data-filter-root>
<div class="hda-toolbar">
    <label class="hda-toolbar__search"><span class="hda-sr">Filter this list</span><svg class="hda-icon"><use href="#i-search"/></svg><input class="hda-input" type="search" placeholder="Filter by keyword…" data-filter-q></label>

    <span class="hda-count" data-filter-count></span>
</div>
    <div class="hda-grid hda-grid--lg" data-filter-grid>
        @foreach($hda['stories'] as $st)
        @if($loop->index > 0)
        @include($hv.'partials.card-story')
        @endif
        @endforeach
    </div>
<div class="hda-empty" data-filter-empty><strong>No matching records</strong>Try a different keyword or clear a filter.</div>
</section>
</div></div>
@endsection
