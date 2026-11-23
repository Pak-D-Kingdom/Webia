@extends($hv.'layouts.app')
@section('title', $page['title'])
@section('content')
@include($hv.'partials.inner-hero')
<div class="hda-page"><div class="hda-container">
<div class="hda-grid hda-grid--lg">
    @foreach($hda['categories'] as $cat)
    @include($hv.'partials.card-category')
    @endforeach
</div>
<div class="hda-stat-row">@foreach($hda['stats'] as $st)<div class="hda-panel hda-reveal"><strong>{{ $st['value'] }}</strong><span>{{ $st['label'] }}</span></div>@endforeach</div>
</div></div>
@endsection
