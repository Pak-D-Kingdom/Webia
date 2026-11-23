@extends($hv.'layouts.app')
@section('title', $page['title'])
@section('content')
@include($hv.'partials.inner-hero')
<div class="hda-page"><div class="hda-container">
<div class="hda-detail">
    <div class="hda-detail__media" style="width:min(100%,360px)"><img src="{{ $ha($item['image']) }}" alt="Portrait illustration of {{ $item['title'] }}" width="600" height="780"></div>
    <div class="hda-detail__info">
        <span class="hda-tag hda-tag--gold">{{ $item['life'] }}</span>
        <h2 style="margin-top:.4em">{{ $item['title'] }}</h2>
        <dl class="hda-spec" style="margin:12px 0 18px"><dt>Known as</dt><dd>{{ $item['role'] }}</dd><dt>Associated with</dt><dd>{{ $item['place'] }}</dd></dl>
        <div class="hda-prose hda-prose--plain">@foreach($item['bio'] as $p)<p>{{ $p }}</p>@endforeach</div>
        <p style="font-size:.8rem;color:var(--muted)">Illustration is symbolic and not a portrait likeness.</p>
    </div>
</div>
<section>
    <div class="hda-sechead"><h2>Related documents</h2></div>
    <div class="hda-grid">
        @foreach($hr('documents', $item['docs']) as $d)
        @include($hv.'partials.card-document')
        @endforeach
    </div>
    @if(count($item['docs']) == 0)<div class="hda-empty is-show"><strong>Records being catalogued</strong>Search the archive for notebooks, letters and printed works connected to this person.</div>@endif
</section>
<section>
    <div class="hda-sechead"><h2>More people</h2></div>
    <div class="hda-grid hda-grid--sm">@foreach($hda['figures'] as $fg)@if($fg['slug'] != $item['slug'] && $loop->index < 5)@include($hv.'partials.card-figure')@endif @endforeach</div>
</section>
</div></div>
@endsection
