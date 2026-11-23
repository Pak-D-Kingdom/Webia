@extends($hv.'layouts.app')
@section('title', $page['title'])
@section('content')
@include($hv.'partials.inner-hero')
<div class="hda-page"><div class="hda-container">
<section>
    @foreach($hda['documents'] as $d)
    @if($loop->index == 0)
    <div class="hda-detail hda-panel hda-reveal"><div class="hda-detail__media"><img src="{{ $ha($d['image']) }}" alt=""></div><div class="hda-detail__info"><span class="hda-tag hda-tag--gold">Editors’ pick</span><h2 style="margin-top:.4em">{{ $d['title'] }}</h2><p>{{ $d['desc'] }}</p><div class="hda-actions"><a class="hda-btn hda-btn--primary" href="{{ $hu('document', $d['slug']) }}">View Document <svg class="hda-icon hda-arrow"><use href="#i-arrow"/></svg></a></div></div></div>
    @endif
    @endforeach
</section>
<section>
    <div class="hda-sechead"><h2>Featured documents</h2></div>
    <div class="hda-grid">@foreach($hda['documents'] as $d)@if($loop->index > 0 && $loop->index < 7)@include($hv.'partials.card-document')@endif @endforeach</div>
</section>
<section>
    <div class="hda-sechead"><h2>Featured collections</h2><a class="hda-textlink" href="{{ $hu('collections') }}">All collections →</a></div>
    <div class="hda-grid hda-grid--lg">@foreach($hda['collections'] as $col)@if($loop->index < 3)@include($hv.'partials.card-collection')@endif @endforeach</div>
</section>
</div></div>
@endsection
