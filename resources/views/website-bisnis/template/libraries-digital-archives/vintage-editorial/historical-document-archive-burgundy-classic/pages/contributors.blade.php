@extends($hv.'layouts.app')
@section('title', $page['title'])
@section('content')
@include($hv.'partials.inner-hero')
<div class="hda-page"><div class="hda-container">
<div class="hda-grid">@foreach($hda['contributors'] as $pt)@include($hv.'partials.card-partner')@endforeach</div>
<div class="hda-banner hda-reveal"><div><h2>Become a contributor</h2><p>Donate records, transcribe pages or share expertise.</p></div><a class="hda-btn hda-btn--gold" href="{{ $hu('contact') }}">Get in touch <svg class="hda-icon hda-arrow"><use href="#i-arrow"/></svg></a></div>
</div></div>
@endsection
