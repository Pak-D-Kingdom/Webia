@extends($hv.'layouts.app')
@section('title', $page['title'])
@section('content')
@include($hv.'partials.inner-hero')
<div class="hda-page"><div class="hda-container">
<section data-filter-root>
<div class="hda-toolbar">
    <label class="hda-toolbar__search"><span class="hda-sr">Filter this list</span><svg class="hda-icon"><use href="#i-search"/></svg><input class="hda-input" type="search" placeholder="Filter by keyword…" data-filter-q></label>
<select data-filter-select="location" aria-label="All regions"><option value="">All regions</option>@foreach($hda['filters']['locations'] as $o)<option>{{ $o }}</option>@endforeach</select>
    <span class="hda-count" data-filter-count></span>
</div>
    <div class="hda-grid hda-grid--lg" data-filter-grid>
        @foreach($hda['collections'] as $col)
        @include($hv.'partials.card-collection')
        @endforeach
    </div>
<div class="hda-empty" data-filter-empty><strong>No matching records</strong>Try a different keyword or clear a filter.</div>
</section>
<div class="hda-banner hda-reveal"><div><h2>Suggest a collection</h2><p>Know a set of records that belongs in the archive? Tell our curators.</p></div><a class="hda-btn hda-btn--gold" href="{{ $hu('contact') }}">Contact curators <svg class="hda-icon hda-arrow"><use href="#i-arrow"/></svg></a></div>
</div></div>
@endsection
