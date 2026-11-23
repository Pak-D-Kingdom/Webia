@extends($hv.'layouts.app')
@section('title', $page['title'])
@section('content')
@include($hv.'partials.inner-hero')
<div class="hda-page"><div class="hda-container">
<section data-filter-root>
<div class="hda-toolbar">
    <label class="hda-toolbar__search"><span class="hda-sr">Filter this list</span><svg class="hda-icon"><use href="#i-search"/></svg><input class="hda-input" type="search" placeholder="Filter by keyword…" data-filter-q></label>
<select data-filter-select="level" aria-label="All levels"><option value="">All levels</option>@foreach(['Beginner','Intermediate','Teachers'] as $o)<option>{{ $o }}</option>@endforeach</select>
    <span class="hda-count" data-filter-count></span>
</div>
    <div class="hda-grid hda-grid--lg" data-filter-grid>
        @foreach($hda['resources'] as $rs)
        @include($hv.'partials.card-resource')
        @endforeach
    </div>
<div class="hda-empty" data-filter-empty><strong>No matching records</strong>Try a different keyword or clear a filter.</div>
</section>
<div class="hda-banner hda-reveal"><div><h2>Teacher training workshops</h2><p>Free sessions on teaching with primary sources, online and on site.</p></div><a class="hda-btn hda-btn--gold" href="{{ $hu('news-item', 'teacher-training-workshops') }}">Read the announcement <svg class="hda-icon hda-arrow"><use href="#i-arrow"/></svg></a></div>
</div></div>
@endsection
