@extends($hv.'layouts.app')
@section('title', $page['title'])
@section('content')
@include($hv.'partials.inner-hero')
<div class="hda-page"><div class="hda-container">
<section data-filter-root>
<div class="hda-toolbar">
    <label class="hda-toolbar__search"><span class="hda-sr">Filter this list</span><svg class="hda-icon"><use href="#i-search"/></svg><input class="hda-input" type="search" placeholder="Filter by keyword…" data-filter-q></label>
<select data-filter-select="type" aria-label="All types"><option value="">All types</option>@foreach($hda['filters']['types'] as $o)<option>{{ $o }}</option>@endforeach</select><select data-filter-select="period" aria-label="All periods"><option value="">All periods</option>@foreach($hda['filters']['periods'] as $o)<option>{{ $o }}</option>@endforeach</select><select data-filter-select="category" aria-label="All categories"><option value="">All categories</option>@foreach($hda['filters']['categories'] as $o)<option>{{ $o }}</option>@endforeach</select><select data-filter-sort aria-label="Sort"><option value="newest">Newest first</option><option value="oldest">Oldest first</option><option value="title">Title A–Z</option></select>
    <span class="hda-seg" role="group" aria-label="View"><button type="button" data-view="grid" aria-pressed="true" aria-label="Grid view"><svg class="hda-icon"><use href="#i-grid"/></svg></button><button type="button" data-view="list" aria-pressed="false" aria-label="List view"><svg class="hda-icon"><use href="#i-list"/></svg></button></span>
    <span class="hda-count" data-filter-count></span>
</div>
    <div class="hda-grid" data-filter-grid>
        @foreach($hda['documents'] as $d)
        @include($hv.'partials.card-document')
        @endforeach
    </div>
<div class="hda-empty" data-filter-empty><strong>No matching records</strong>Try a different keyword or clear a filter.</div>
    <div class="hda-pager" aria-label="Pagination"><span class="is-on">1</span><a href="#">2</a><a href="#">3</a><a href="#" aria-label="Next page">›</a></div>
</section>
</div></div>
@endsection
