@extends($hv.'layouts.app')
@section('title', $page['title'])
@section('content')
@include($hv.'partials.inner-hero')
<div class="hda-page"><div class="hda-container">
<div class="hda-layout">
<article>
    <time class="hda-tag hda-tag--gold">{{ $item['date'] }}</time>
    <img src="{{ $ha($item['image']) }}" alt="" style="width:100%;border-radius:12px;border:2px solid var(--gold);margin:16px 0 24px" width="800" height="600">
    <div class="hda-prose"><p><strong>{{ $item['desc'] }}</strong></p>@foreach($item['body'] as $p)<p>{{ $p }}</p>@endforeach</div>
    <div class="hda-actions"><button type="button" class="hda-btn hda-btn--outline" data-copy="">Copy link</button><a class="hda-btn hda-btn--outline" href="{{ $hu('news') }}"><svg class="hda-icon"><use href="#i-left"/></svg>All news</a></div>
</article>
<aside class="hda-aside"><div class="hda-panel"><h3>More news</h3><ul class="hda-list">@foreach($hda['news'] as $nw)@if($nw['slug'] != $item['slug'])<li><a class="hda-textlink" href="{{ $hu('news-item', $nw['slug']) }}">{{ $nw['title'] }}</a></li>@endif @endforeach</ul></div></aside>
</div>
</div></div>
@endsection
