@extends($hv.'layouts.app')
@section('title', $page['title'])
@section('content')
@include($hv.'partials.inner-hero')
<div class="hda-page"><div class="hda-container">
<div class="hda-detail">
    <div class="hda-detail__media hda-detail__media--wide" style="width:min(100%,520px)"><img src="{{ $ha($item['image']) }}" alt="" width="800" height="600"></div>
    <div class="hda-detail__info">
        <span class="hda-tag hda-tag--green">{{ $item['region'] }}</span>
        <h2 style="margin-top:.4em">{{ $item['title'] }}</h2>
        <p class="hda-prose hda-prose--plain" style="max-width:56ch">{{ $item['desc'] }}</p>
        <dl class="hda-spec"><dt>Documents</dt><dd>{{ $item['docs'] }}</dd><dt>Region</dt><dd>{{ $item['region'] }}</dd></dl>
        <div class="hda-actions"><a class="hda-btn hda-btn--primary" href="{{ $hu('search') }}?location={{ rawurlencode($item['title']) }}">Search this location <svg class="hda-icon hda-arrow"><use href="#i-arrow"/></svg></a><a class="hda-btn hda-btn--outline" href="{{ $hu('locations') }}">All locations</a></div>
    </div>
</div>
<section>
    <div class="hda-sechead"><h2>Featured documents</h2></div>
    <div class="hda-grid">
        @foreach($hr('documents', $item['documents']) as $d)
        @include($hv.'partials.card-document')
        @endforeach
    </div>
    @if(count($item['documents']) == 0)<div class="hda-empty is-show"><strong>No featured documents yet</strong>Use the search link above to explore this region.</div>@endif
</section>
</div></div>
@endsection
