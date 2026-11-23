@extends($hv.'layouts.app')
@section('title', $page['title'])
@section('content')
@include($hv.'partials.inner-hero')
<div class="hda-page"><div class="hda-container">
<div class="hda-vtl">
    @foreach($hda['periods'] as $pd)
    <article class="hda-vtl__era hda-reveal">
        <div class="hda-vtl__card">
            <img src="{{ $ha($pd['image']) }}" alt="" loading="lazy" width="600" height="260">
            <div>
                <span class="hda-vtl__range">{{ $pd['range'] }}</span>
                <h2 style="font-size:1.5rem;margin:.15em 0 .3em">{{ $pd['title'] }}</h2>
                <p style="margin:0 0 6px">{{ $pd['long'][0] }}</p>
                <div class="hda-vtl__events">
                    @foreach($hr('events', $pd['events']) as $ev)
                    <a href="{{ $hu('event', $ev['slug']) }}"><b>{{ $ev['date'] }}</b><span>{{ $ev['title'] }}</span></a>
                    @endforeach
                </div>
                <div class="hda-actions" style="margin-top:12px"><a class="hda-btn hda-btn--outline hda-btn--sm" href="{{ $hu('period', $pd['slug']) }}">Open period guide <svg class="hda-icon hda-arrow"><use href="#i-arrow"/></svg></a></div>
            </div>
        </div>
    </article>
    @endforeach
</div>
</div></div>
@endsection
