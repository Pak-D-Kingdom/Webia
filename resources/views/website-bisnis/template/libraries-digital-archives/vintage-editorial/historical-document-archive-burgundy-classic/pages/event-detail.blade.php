@extends($hv.'layouts.app')
@section('title', $page['title'])
@section('content')
@include($hv.'partials.inner-hero')
<div class="hda-page"><div class="hda-container">
<div class="hda-detail">
    <div class="hda-detail__media hda-detail__media--wide" style="width:min(100%,520px)"><img src="{{ $ha($item['image']) }}" alt="" width="800" height="600"></div>
    <div class="hda-detail__info">
        <span class="hda-tag hda-tag--gold">{{ $item['date'] }}</span>
        <h2 style="margin-top:.4em">{{ $item['title'] }}</h2>
        <p style="font-family:var(--serif);font-size:1.1rem;color:var(--brown-l)">{{ $item['desc'] }}</p>
        <div class="hda-prose hda-prose--plain">@foreach($item['body'] as $p)<p>{{ $p }}</p>@endforeach</div>
        <div class="hda-actions"><a class="hda-btn hda-btn--outline" href="{{ $hu('period', $item['period']) }}">{{ $hf('periods', $item['period'])['title'] }}</a><a class="hda-btn hda-btn--outline" href="{{ $hu('events') }}">All events</a></div>
    </div>
</div>
<section>
    <div class="hda-sechead"><h2>Documents about this event</h2></div>
    <div class="hda-grid">@foreach($hr('documents', $item['documents']) as $d)@include($hv.'partials.card-document')@endforeach</div>
    @if(count($item['documents']) == 0)<div class="hda-empty is-show"><strong>No linked documents yet</strong>Try the <a class="hda-textlink" href="{{ $hu('search') }}">search</a> to find related records.</div>@endif
</section>
</div></div>
@endsection
