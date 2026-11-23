@extends($hv.'layouts.app')
@section('title', $page['title'])
@section('content')
@include($hv.'partials.inner-hero')
<div class="hda-page"><div class="hda-container">
<div class="hda-events">
    @foreach($hda['documents'] as $d)
    <a class="hda-event hda-reveal" href="{{ $hu('document', $d['slug']) }}" style="--i:{{ $loop->index }}">
        <span class="hda-event__img"><img src="{{ $ha($d['image']) }}" alt="" loading="lazy"></span>
        <span><span class="hda-event__date">Added {{ $d['added'] }}</span><h3>{{ $d['title'] }} <small style="font-weight:400">({{ $d['year'] }})</small></h3><span class="hda-card__text" style="display:block">{{ $d['type'] }} · {{ $d['author'] }}</span></span>
    </a>
    @endforeach
</div>
</div></div>
@endsection
