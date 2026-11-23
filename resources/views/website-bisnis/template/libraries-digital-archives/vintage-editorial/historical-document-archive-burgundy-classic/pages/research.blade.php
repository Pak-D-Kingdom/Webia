@extends($hv.'layouts.app')
@section('title', $page['title'])
@section('content')
@include($hv.'partials.inner-hero')
<div class="hda-page"><div class="hda-container">
<div class="hda-banner hda-reveal">
    <div><h2>Start your research</h2><p>Search records, follow guides, then save and cite what you find.</p></div>
    <form action="{{ $hu('search') }}" method="get" style="display:flex;gap:8px;min-width:min(100%,380px)"><input class="hda-input" type="search" name="q" placeholder="Search the archive…" aria-label="Search the archive"><button class="hda-btn hda-btn--gold" type="submit">Search</button></form>
</div>
<section>
    <div class="hda-sechead"><div><h2>Research guides</h2><p>Short, step-by-step guides.</p></div></div>
    <div class="hda-grid hda-grid--lg">
        @foreach($hda['guides'] as $gd)
        <a class="hda-card hda-reveal" style="--i:{{ $loop->index }}" href="{{ $hu('guide', $gd['slug']) }}">
            <span class="hda-card__body"><span class="hda-meta"><span class="hda-tag">{{ $gd['level'] }}</span></span><strong class="hda-card__title" style="font-family:var(--serif)">{{ $gd['title'] }}</strong><span class="hda-card__text">{{ $gd['desc'] }}</span><span class="hda-card__foot"><span>{{ count($gd['steps']) }} steps</span><svg class="hda-icon"><use href="#i-arrow"/></svg></span></span>
        </a>
        @endforeach
    </div>
</section>
<section>
    <div class="hda-sechead"><h2>Research tools</h2></div>
    <div class="hda-grid hda-grid--sm">
        <a class="hda-panel is-hover hda-reveal" href="{{ $hu('citation') }}"><h3>Citation Guide</h3><p style="margin:0;font-size:.85rem">Format APA, MLA or Chicago references.</p></a>
        <a class="hda-panel is-hover hda-reveal" href="{{ $hu('glossary') }}"><h3>Glossary</h3><p style="margin:0;font-size:.85rem">Archive terms in plain language.</p></a>
        <a class="hda-panel is-hover hda-reveal" href="{{ $hu('my-research') }}"><h3>My Research</h3><p style="margin:0;font-size:.85rem">Keep notes as you read.</p></a>
        <a class="hda-panel is-hover hda-reveal" href="{{ $hu('downloads') }}"><h3>Download Center</h3><p style="margin:0;font-size:.85rem">Files for study and teaching.</p></a>
    </div>
</section>
</div></div>
@endsection
