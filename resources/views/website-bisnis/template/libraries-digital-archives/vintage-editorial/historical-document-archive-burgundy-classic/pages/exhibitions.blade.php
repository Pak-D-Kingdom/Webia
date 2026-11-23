@extends($hv.'layouts.app')
@section('title', $page['title'])
@section('content')
@include($hv.'partials.inner-hero')
<div class="hda-page"><div class="hda-container">
<div class="hda-grid hda-grid--lg">@foreach($hda['exhibitions'] as $ex)@include($hv.'partials.card-exhibition')@endforeach</div>
<div class="hda-banner hda-reveal"><div><h2>Plan your visit</h2><p>Exhibition hours follow the reading room schedule.</p></div><a class="hda-btn hda-btn--gold" href="{{ $hu('visit') }}">Visit the Archive <svg class="hda-icon hda-arrow"><use href="#i-arrow"/></svg></a></div>
</div></div>
@endsection
