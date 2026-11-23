@extends($hv.'layouts.app')
@section('title', $page['title'])
@section('content')
@include($hv.'partials.inner-hero')
<div class="hda-page"><div class="hda-container">
<section data-search-page>
    <form class="hda-toolbar" action="{{ $hu('search') }}" method="get" role="search">
        <label class="hda-toolbar__search"><span class="hda-sr">Search</span><svg class="hda-icon"><use href="#i-search"/></svg><input class="hda-input" type="search" name="q" placeholder="Search by keyword, title, or topic…"></label>
        <select name="period" aria-label="Period"><option value="">Any Period</option>@foreach($hda['filters']['periods'] as $o)<option>{{ $o }}</option>@endforeach</select>
        <select name="category" aria-label="Category"><option value="">Any Category</option>@foreach($hda['filters']['categories'] as $o)<option>{{ $o }}</option>@endforeach</select>
        <select name="location" aria-label="Location"><option value="">Any Location</option>@foreach($hda['filters']['locations'] as $o)<option>{{ $o }}</option>@endforeach</select>
        <select name="type" aria-label="Document type"><option value="">Any Type</option>@foreach($hda['filters']['types'] as $o)<option>{{ $o }}</option>@endforeach</select>
        <button class="hda-btn hda-btn--primary" type="submit">Search</button>
        <a class="hda-textlink" href="{{ $hu('advanced') }}">Advanced search</a>
    </form>
    <p class="hda-count" data-search-count style="margin:0 0 16px"></p>
    <div class="hda-grid" data-search-out></div>
    <div class="hda-empty" data-search-empty><strong>No results</strong>Check the spelling or remove a filter. You can also try <a class="hda-textlink" href="{{ $hu('advanced') }}">advanced search</a>.</div>
</section>
</div></div>
@endsection
