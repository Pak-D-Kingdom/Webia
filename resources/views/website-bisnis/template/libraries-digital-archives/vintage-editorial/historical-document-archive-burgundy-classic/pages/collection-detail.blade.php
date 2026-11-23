@extends($hv.'layouts.app')
@section('title', $page['title'])
@section('content')
@include($hv.'partials.inner-hero')
<div class="hda-page"><div class="hda-container">
<div class="hda-detail">
    <div class="hda-detail__media hda-detail__media--wide" style="width:min(100%,520px)"><img src="{{ $ha($item['image']) }}" alt="" width="800" height="600"></div>
    <div class="hda-detail__info">
        <span class="hda-tag hda-tag--gold">{{ $item['period'] }}</span>
        <h2 style="margin-top:.4em">{{ $item['title'] }}</h2>
        <dl class="hda-spec" style="margin:14px 0 18px">
            <dt>Documents</dt><dd>{{ $item['docs'] }}</dd><dt>Sub-collections</dt><dd>{{ $item['subs'] }}</dd><dt>Region</dt><dd>{{ $hf('locations', $item['location'])['title'] }}</dd>
        </dl>
        <div class="hda-prose hda-prose--plain">@foreach($item['long'] as $p)<p>{{ $p }}</p>@endforeach</div>
        <div class="hda-actions"><a class="hda-btn hda-btn--primary" href="{{ $hu('documents') }}">Browse all documents <svg class="hda-icon hda-arrow"><use href="#i-arrow"/></svg></a><button type="button" class="hda-btn hda-btn--outline" data-copy="">Copy link</button></div>
    </div>
</div>
<section>
    <div class="hda-sechead"><div><h2>Documents in this collection</h2><p>Highlights from {{ $item['title'] }}.</p></div></div>
    <div class="hda-grid">
        @foreach($hr('documents', $item['documents']) as $d)
        @include($hv.'partials.card-document')
        @endforeach
    </div>
</section>
<section>
    <div class="hda-sechead"><h2>More collections</h2><a class="hda-textlink" href="{{ $hu('collections') }}">All collections →</a></div>
    <div class="hda-grid">
        @foreach($hda['collections'] as $col)
        @if($col['slug'] != $item['slug'] && $loop->index < 4)
        @include($hv.'partials.card-collection')
        @endif
        @endforeach
    </div>
</section>
</div></div>
@endsection
