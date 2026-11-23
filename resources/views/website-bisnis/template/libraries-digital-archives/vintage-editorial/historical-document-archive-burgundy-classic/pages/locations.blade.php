@extends($hv.'layouts.app')
@section('title', $page['title'])
@section('content')
@include($hv.'partials.inner-hero')
<div class="hda-page"><div class="hda-container">
<div class="hda-board hda-reveal" data-board>
    <img src="{{ $ha('ui/world-board.svg') }}" alt="Stylised antique world map with location markers" width="1200" height="700">
    @foreach($hda['locations'] as $lc)
    <a class="hda-pin" href="{{ $hu('location', $lc['slug']) }}" data-pin="{{ $lc['slug'] }}" style="left:{{ $lc['hx'] * 100 }}%;top:{{ $lc['hy'] * 100 }}%" aria-label="{{ $lc['title'] }}"><span>{{ $lc['title'] }}</span></a>
    @endforeach
</div>
<section data-filter-root>
<div class="hda-toolbar">
    <label class="hda-toolbar__search"><span class="hda-sr">Filter this list</span><svg class="hda-icon"><use href="#i-search"/></svg><input class="hda-input" type="search" placeholder="Filter by keyword…" data-filter-q></label>

    <span class="hda-count" data-filter-count></span>
</div>
    <div class="hda-grid hda-grid--lg" data-filter-grid>
        @foreach($hda['locations'] as $lc)
        @include($hv.'partials.card-location')
        @endforeach
    </div>
<div class="hda-empty" data-filter-empty><strong>No matching records</strong>Try a different keyword or clear a filter.</div>
</section>
</div></div>
@endsection
