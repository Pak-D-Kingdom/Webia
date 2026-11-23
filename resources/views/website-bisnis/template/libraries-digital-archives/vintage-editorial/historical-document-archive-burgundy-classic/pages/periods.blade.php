@extends($hv.'layouts.app')
@section('title', $page['title'])
@section('content')
@include($hv.'partials.inner-hero')
<div class="hda-page"><div class="hda-container">
<div class="hda-grid hda-grid--lg">
    @foreach($hda['periods'] as $pd)
    @include($hv.'partials.card-period')
    @endforeach
</div>
<div class="hda-banner hda-reveal"><div><h2>See every era in one line</h2><p>The full timeline places events, people and documents on a single page.</p></div><a class="hda-btn hda-btn--gold" href="{{ $hu('timeline') }}">Open the timeline <svg class="hda-icon hda-arrow"><use href="#i-arrow"/></svg></a></div>
</div></div>
@endsection
