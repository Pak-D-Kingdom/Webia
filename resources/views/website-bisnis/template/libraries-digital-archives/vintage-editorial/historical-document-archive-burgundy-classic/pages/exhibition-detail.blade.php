@extends($hv.'layouts.app')
@section('title', $page['title'])
@section('content')
@include($hv.'partials.inner-hero')
<div class="hda-page"><div class="hda-container">
<div class="hda-detail">
    <div class="hda-detail__media hda-detail__media--wide" style="width:min(100%,520px)"><img src="{{ $ha($item['image']) }}" alt="" width="800" height="600"></div>
    <div class="hda-detail__info">
        <span class="hda-tag {{ $item['status'] == 'On now' ? 'hda-tag--green' : 'hda-tag--gold' }}">{{ $item['status'] }}</span>
        <h2 style="margin-top:.4em">{{ $item['title'] }}</h2>
        <p class="hda-meta"><span><svg class="hda-icon"><use href="#i-calendar"/></svg>{{ $item['dates'] }}</span></p>
        <p style="font-family:var(--serif);font-size:1.1rem;color:var(--brown-l)">{{ $item['desc'] }}</p>
        <h3 style="margin:18px 0 8px">Sections</h3>
        <ul class="hda-list">@foreach($item['sections'] as $s)<li>{{ $s }}</li>@endforeach</ul>
        <div class="hda-actions"><a class="hda-btn hda-btn--primary" href="{{ $hu('visit') }}">Plan a visit</a><a class="hda-btn hda-btn--outline" href="{{ $hu('exhibitions') }}">All exhibitions</a></div>
    </div>
</div>
<section>
    <div class="hda-sechead"><h2>On display</h2></div>
    <div class="hda-grid">@foreach($hr('documents', $item['items']) as $d)@include($hv.'partials.card-document')@endforeach</div>
</section>
</div></div>
@endsection
