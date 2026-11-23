@extends($hv.'layouts.app')
@section('title', $page['title'])
@section('content')
@include($hv.'partials.inner-hero')
<div class="hda-page"><div class="hda-container">
<section>
    @foreach($hda['news'] as $nw)
    @if($loop->index == 0)
    <a class="hda-card hda-reveal" href="{{ $hu('news-item', $nw['slug']) }}" style="flex-direction:row;flex-wrap:wrap"><span class="hda-card__img" style="flex:1 1 320px;aspect-ratio:16/9"><img src="{{ $ha($nw['image']) }}" alt="" width="800" height="600"></span><span class="hda-card__body" style="flex:1 1 320px;justify-content:center"><time class="hda-tag hda-tag--gold">{{ $nw['date'] }}</time><h2 style="font-size:1.6rem">{{ $nw['title'] }}</h2><span class="hda-card__text" style="font-size:.95rem">{{ $nw['desc'] }}</span><span class="hda-textlink">Read More →</span></span></a>
    @endif
    @endforeach
</section>
<section>
    <div class="hda-sechead"><h2>Earlier announcements</h2></div>
    <div class="hda-newsgrid" style="grid-template-columns:repeat(auto-fill,minmax(min(100%,260px),1fr))">
        @foreach($hda['news'] as $nw)
        @if($loop->index > 0)
        @include($hv.'partials.card-news')
        @endif
        @endforeach
    </div>
</section>
</div></div>
@endsection
