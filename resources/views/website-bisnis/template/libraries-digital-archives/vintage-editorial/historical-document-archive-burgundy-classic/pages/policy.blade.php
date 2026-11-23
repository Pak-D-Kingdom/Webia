@extends($hv.'layouts.app')
@section('title', $page['title'])
@section('content')
@include($hv.'partials.inner-hero')
<div class="hda-page"><div class="hda-container">
<div class="hda-layout">
<div>
    @foreach($hda['policy'] as $p)
    <section id="pol-{{ $loop->iteration }}" class="hda-panel" style="margin-bottom:18px"><h3>{{ $loop->iteration }}. {{ $p['title'] }}</h3>@foreach($p['paras'] as $t)<p style="font-size:.95rem">{{ $t }}</p>@endforeach</section>
    @endforeach
    <p style="font-size:.85rem;color:var(--muted)">This page also covers privacy, terms of use and accessibility in summary. Replace with your institution’s official text before launch.</p>
</div>
<aside class="hda-aside"><div class="hda-panel"><h3>On this page</h3><ul class="hda-list">@foreach($hda['policy'] as $p)<li><a class="hda-textlink" href="#pol-{{ $loop->iteration }}">{{ $p['title'] }}</a></li>@endforeach</ul></div></aside>
</div>
</div></div>
@endsection
