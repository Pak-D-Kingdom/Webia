@extends($hv.'layouts.app')
@section('title', $page['title'])
@section('content')
@include($hv.'partials.inner-hero')
<div class="hda-page"><div class="hda-container">
<div data-glossary>
    <div class="hda-toolbar"><label class="hda-toolbar__search"><span class="hda-sr">Search terms</span><svg class="hda-icon"><use href="#i-search"/></svg><input class="hda-input" type="search" placeholder="Search terms…" data-gloss-q></label></div>
    <div class="hda-az" data-az style="margin-bottom:20px" role="group" aria-label="Filter by letter"></div>
    <dl class="hda-gloss">@foreach($hda['glossary'] as $g)<div data-term="{{ $g['term'] }}"><dt>{{ $g['term'] }}</dt><dd>{{ $g['def'] }}</dd></div>@endforeach</dl>
</div>
</div></div>
@endsection
