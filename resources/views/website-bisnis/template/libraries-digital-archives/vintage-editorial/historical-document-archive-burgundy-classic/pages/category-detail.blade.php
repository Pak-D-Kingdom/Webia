@extends($hv.'layouts.app')
@section('title', $page['title'])
@section('content')
@include($hv.'partials.inner-hero')
<div class="hda-page"><div class="hda-container">
<div class="hda-layout">
    <div>
        <div class="hda-prose hda-prose--plain"><p>{{ $item['desc'] }}</p></div>
        <h3 style="margin:22px 0 10px">Sub-categories</h3>
        <div class="hda-meta">@foreach($item['subs'] as $s)<span class="hda-tag hda-tag--gold">{{ $s }}</span>@endforeach</div>
    </div>
    <aside class="hda-panel" style="text-align:center"><img src="{{ $ha($item['image']) }}" alt="" style="margin:0 auto;width:200px"><p style="margin:.6em 0 0"><strong style="font-family:var(--serif);font-size:1.6rem;color:var(--burg-700)">{{ $item['count'] }}</strong><br><span style="color:var(--muted);font-size:.85rem">records in this category</span></p></aside>
</div>
<section>
    <div class="hda-sechead"><h2>Featured in {{ $item['title'] }}</h2><a class="hda-textlink" href="{{ $hu('documents') }}">Browse all documents →</a></div>
    <div class="hda-grid">
        @foreach($hw('documents', 'category', $item['slug']) as $d)
        @include($hv.'partials.card-document')
        @endforeach
    </div>
    @if(count($hw('documents', 'category', $item['slug'])) == 0)<div class="hda-empty is-show"><strong>Digitisation in progress</strong>Records in this category are being catalogued. Try the <a class="hda-textlink" href="{{ $hu('search') }}">search</a> in the meantime.</div>@endif
</section>
<section>
    <div class="hda-sechead"><h2>Other categories</h2></div>
    <div class="hda-grid hda-grid--sm">
        @foreach($hda['categories'] as $cat)
        @if($cat['slug'] != $item['slug'])
        @include($hv.'partials.card-category')
        @endif
        @endforeach
    </div>
</section>
</div></div>
@endsection
