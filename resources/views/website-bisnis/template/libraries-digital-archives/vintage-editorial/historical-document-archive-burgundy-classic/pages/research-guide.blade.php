@extends($hv.'layouts.app')
@section('title', $page['title'])
@section('content')
@include($hv.'partials.inner-hero')
<div class="hda-page"><div class="hda-container">
<div class="hda-layout">
<div>
    <div class="hda-prose hda-prose--plain"><p style="font-size:1.15rem">{{ $item['desc'] }}</p></div>
    <ol class="hda-steps" style="margin-top:20px">@foreach($item['steps'] as $s)<li class="hda-step hda-reveal" style="--i:{{ $loop->index }}"><h3>Step {{ $loop->iteration }}</h3><p>{{ $s }}</p></li>@endforeach</ol>
    <div class="hda-actions"><a class="hda-btn hda-btn--primary" href="{{ $hu('documents') }}">Put it into practice <svg class="hda-icon hda-arrow"><use href="#i-arrow"/></svg></a><a class="hda-btn hda-btn--outline" href="{{ $hu('research') }}">All guides</a></div>
</div>
<aside class="hda-aside"><div class="hda-panel"><span class="hda-tag">{{ $item['level'] }}</span><h3 style="margin-top:.6em">Other guides</h3><ul class="hda-list">@foreach($hda['guides'] as $gd)@if($gd['slug'] != $item['slug'])<li><a class="hda-textlink" href="{{ $hu('guide', $gd['slug']) }}">{{ $gd['title'] }}</a></li>@endif @endforeach</ul></div></aside>
</div>
</div></div>
@endsection
