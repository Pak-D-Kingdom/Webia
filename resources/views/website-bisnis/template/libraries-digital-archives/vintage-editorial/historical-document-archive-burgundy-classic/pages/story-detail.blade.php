@extends($hv.'layouts.app')
@section('title', $page['title'])
@section('content')
@include($hv.'partials.inner-hero')
<div class="hda-page"><div class="hda-container">
<div class="hda-layout">
<article>
    <div class="hda-meta" style="margin-bottom:14px"><span class="hda-tag">{{ $item['cat'] }}</span><span>{{ $item['author'] }}</span><span><svg class="hda-icon"><use href="#i-calendar"/></svg>{{ $item['date'] }}</span><span><svg class="hda-icon"><use href="#i-clock"/></svg>{{ $item['read'] }} read</span></div>
    <img src="{{ $ha($item['image']) }}" alt="" style="width:100%;border-radius:12px;border:2px solid var(--gold);margin-bottom:26px" width="800" height="600">
    <div class="hda-prose"><p><strong>{{ $item['excerpt'] }}</strong></p>@foreach($item['body'] as $p)<p>{{ $p }}</p>@endforeach</div>
    <div class="hda-actions"><button type="button" class="hda-btn hda-btn--outline" data-copy="">Copy link</button><a class="hda-btn hda-btn--outline" href="{{ $hu('stories') }}"><svg class="hda-icon"><use href="#i-left"/></svg>All stories</a></div>
</article>
<aside class="hda-aside">
    <div class="hda-panel"><h3>More stories</h3><ul class="hda-list">@foreach($hda['stories'] as $st)@if($st['slug'] != $item['slug'])<li><a class="hda-textlink" href="{{ $hu('story', $st['slug']) }}">{{ $st['title'] }}</a></li>@endif @endforeach</ul></div>
    <div class="hda-panel hda-panel--dark"><h3>Explore the sources</h3><p style="font-size:.9rem">Every story links back to records you can read yourself.</p><a class="hda-btn hda-btn--gold hda-btn--sm" href="{{ $hu('documents') }}">Documents Archive</a></div>
</aside>
</div>
</div></div>
@endsection
