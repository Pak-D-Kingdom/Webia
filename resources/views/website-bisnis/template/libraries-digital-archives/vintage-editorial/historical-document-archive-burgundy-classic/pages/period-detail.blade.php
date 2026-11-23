@extends($hv.'layouts.app')
@section('title', $page['title'])
@section('content')
@include($hv.'partials.inner-hero')
<div class="hda-page"><div class="hda-container">
<div class="hda-layout">
    <div>
        <img src="{{ $ha($item['image']) }}" alt="" style="width:100%;max-width:640px;margin-bottom:18px">
        <span class="hda-tag hda-tag--gold">{{ $item['range'] }}</span>
        <div class="hda-prose" style="margin-top:12px">@foreach($item['long'] as $p)<p>{{ $p }}</p>@endforeach</div>
    </div>
    <aside class="hda-aside">
        <div class="hda-panel"><h3>Key events</h3>
            @if(count($item['events']) > 0)<ul class="hda-list">@foreach($hr('events', $item['events']) as $ev)<li><a class="hda-textlink" href="{{ $hu('event', $ev['slug']) }}">{{ $ev['date'] }} — {{ $ev['title'] }}</a></li>@endforeach</ul>@else<p style="margin:0;font-size:.9rem">No events listed yet.</p>@endif
        </div>
        <div class="hda-panel"><h3>People</h3>
            @if(count($item['figures']) > 0)<ul class="hda-list">@foreach($hr('figures', $item['figures']) as $fg)<li><a class="hda-textlink" href="{{ $hu('figure', $fg['slug']) }}">{{ $fg['title'] }}</a></li>@endforeach</ul>@else<p style="margin:0;font-size:.9rem">No people listed yet.</p>@endif
        </div>
    </aside>
</div>
<section>
    <div class="hda-sechead"><h2>Documents from this period</h2></div>
    <div class="hda-grid">
        @foreach($hw('documents', 'period', $item['title']) as $d)
        @include($hv.'partials.card-document')
        @endforeach
    </div>
    @if(count($hw('documents', 'period', $item['title'])) == 0)<div class="hda-empty is-show"><strong>Documents coming soon</strong>This period is being digitised. See the <a class="hda-textlink" href="{{ $hu('documents') }}">Documents Archive</a> for other eras.</div>@endif
</section>
</div></div>
@endsection
