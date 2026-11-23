@extends($hv.'layouts.app')
@section('title', $page['title'])
@section('content')
@include($hv.'partials.inner-hero')
<div class="hda-page"><div class="hda-container">
<div class="hda-layout">
    <div>
        <div class="hda-prose"><p>{{ $hda['about']['text'] }}</p><h2>Our mission</h2></div>
        <ul class="hda-list">@foreach($hda['about']['mission'] as $m)<li>{{ $m }}</li>@endforeach</ul>
    </div>
    <figure class="hda-photo" style="margin:0"><img src="{{ $ha('about-library.webp') }}" alt="Reading room" loading="lazy" width="1200" height="900"></figure>
</div>
<section>
    <div class="hda-sechead"><h2>What we value</h2></div>
    <div class="hda-grid">@foreach($hda['about']['values'] as $v)<div class="hda-panel hda-reveal" style="--i:{{ $loop->index }}"><h3>{{ $v['title'] }}</h3><p style="margin:0;font-size:.92rem">{{ $v['text'] }}</p></div>@endforeach</div>
</section>
<section>
    <div class="hda-sechead"><h2>Milestones</h2></div>
    <ol class="hda-steps">@foreach($hda['about']['milestones'] as $m)<li class="hda-step hda-reveal"><h3>{{ $m['title'] }}</h3><p>{{ $m['text'] }}</p></li>@endforeach</ol>
</section>
<section>
    <div class="hda-sechead"><h2>The team</h2><p>Roles that keep the archive running.</p></div>
    <div class="hda-grid hda-grid--sm">@foreach($hda['about']['team'] as $m)<div class="hda-panel hda-reveal"><h3>{{ $m['title'] }}</h3><p style="margin:0;font-size:.88rem">{{ $m['text'] }}</p></div>@endforeach</div>
</section>
<div class="hda-stat-row">@foreach($hda['stats'] as $st)<div class="hda-panel"><strong>{{ $st['value'] }}</strong><span>{{ $st['label'] }}</span></div>@endforeach</div>
</div></div>
@endsection
