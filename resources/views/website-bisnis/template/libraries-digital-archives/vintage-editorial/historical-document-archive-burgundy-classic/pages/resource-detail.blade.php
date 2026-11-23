@extends($hv.'layouts.app')
@section('title', $page['title'])
@section('content')
@include($hv.'partials.inner-hero')
<div class="hda-page"><div class="hda-container">
<div class="hda-layout">
<div>
    <img src="{{ $ha($item['image']) }}" alt="" style="width:100%;max-width:640px;border-radius:12px;border:2px solid var(--gold);margin-bottom:22px" width="800" height="600">
    <div class="hda-meta" style="margin-bottom:10px"><span class="hda-tag">{{ $item['kind'] }}</span><span class="hda-tag hda-tag--gold">{{ $item['level'] }}</span></div>
    <div class="hda-prose hda-prose--plain"><p>{{ $item['desc'] }}</p></div>
    <h3 style="margin:22px 0 10px">What’s inside</h3>
    <ul class="hda-list">@foreach($item['items'] as $it)<li>{{ $it }}</li>@endforeach</ul>
    <div class="hda-actions"><a class="hda-btn hda-btn--primary" href="{{ $hu('downloads') }}"><svg class="hda-icon"><use href="#i-download"/></svg>Get the files</a><a class="hda-btn hda-btn--outline" href="{{ $hu('resources') }}">All resources</a></div>
</div>
<aside class="hda-aside"><div class="hda-panel"><h3>More resources</h3><ul class="hda-list">@foreach($hda['resources'] as $rs)@if($rs['slug'] != $item['slug'])<li><a class="hda-textlink" href="{{ $hu('resource', $rs['slug']) }}">{{ $rs['title'] }}</a></li>@endif @endforeach</ul></div></aside>
</div>
</div></div>
@endsection
