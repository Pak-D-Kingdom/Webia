@extends($hv.'layouts.app')
@section('title', $page['title'])
@section('content')
@include($hv.'partials.inner-hero')
<div class="hda-page"><div class="hda-container">
<div class="hda-layout">
<form class="hda-panel hda-form" action="{{ $hu('search') }}" method="get">
    <div class="hda-field"><label for="a-q">Keywords</label><input id="a-q" name="q" type="search" placeholder="e.g. map, treaty, letter"></div>
    <div class="hda-range"><div class="hda-field"><label for="a-from">Year from</label><input id="a-from" name="from" type="number" min="0" max="2026" placeholder="1200"></div><div class="hda-field"><label for="a-to">Year to</label><input id="a-to" name="to" type="number" min="0" max="2026" placeholder="1950"></div></div>
    <div class="hda-form__row">
        <div class="hda-field"><label for="a-per">Period</label><select id="a-per" name="period"><option value="">Any Period</option>@foreach($hda['filters']['periods'] as $o)<option>{{ $o }}</option>@endforeach</select></div>
        <div class="hda-field"><label for="a-cat">Category</label><select id="a-cat" name="category"><option value="">Any Category</option>@foreach($hda['filters']['categories'] as $o)<option>{{ $o }}</option>@endforeach</select></div>
        <div class="hda-field"><label for="a-loc">Location</label><select id="a-loc" name="location"><option value="">Any Location</option>@foreach($hda['filters']['locations'] as $o)<option>{{ $o }}</option>@endforeach</select></div>
        <div class="hda-field"><label for="a-type">Document type</label><select id="a-type" name="type"><option value="">Any Type</option>@foreach($hda['filters']['types'] as $o)<option>{{ $o }}</option>@endforeach</select></div>
    </div>
    <div class="hda-actions" style="margin:0"><button class="hda-btn hda-btn--primary" type="submit"><svg class="hda-icon"><use href="#i-search"/></svg>Search archive</button><button class="hda-btn hda-btn--outline" type="reset">Reset</button></div>
</form>
<aside class="hda-aside"><div class="hda-panel"><h3>Search tips</h3><ul class="hda-list"><li>Use one or two keywords to start.</li><li>Year range applies to documents with a known year.</li><li>Combine a period with a location to narrow results.</li></ul></div></aside>
</div>
</div></div>
@endsection
