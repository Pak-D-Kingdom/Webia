@extends($hv.'layouts.app')
@section('title', $page['title'])
@section('content')
@include($hv.'partials.inner-hero')
<div class="hda-page"><div class="hda-container">
<div class="hda-layout">
<div class="hda-panel" data-citation>
    <h3>Citation generator</h3>
    <div class="hda-form">
        <div class="hda-field"><label for="ci-item">Choose a document</label><select id="ci-item" data-cite-item>@foreach($hda['documents'] as $d)<option data-author="{{ $d['author'] }}" data-title="{{ $d['title'] }}" data-year="{{ $d['year'] }}" data-type="{{ $d['type'] }}">{{ $d['title'] }} ({{ $d['year'] }})</option>@endforeach</select></div>
        <div class="hda-field"><label for="ci-style">Style</label><select id="ci-style" data-cite-style>@foreach($hda['citation_styles'] as $s)<option>{{ $s['name'] }}</option>@endforeach</select></div>
        <div class="hda-panel" style="background:#fff7e4"><p data-cite-out style="margin:0;font-family:var(--serif)" aria-live="polite"></p></div>
        <button type="button" class="hda-btn hda-btn--primary" data-cite-copy style="justify-self:start">Copy citation</button>
    </div>
</div>
<aside class="hda-aside"><div class="hda-panel"><h3>Patterns</h3>@foreach($hda['citation_styles'] as $s)<p style="font-size:.85rem;margin-bottom:.8em"><strong>{{ $s['name'] }}</strong><br>{{ $s['pattern'] }}</p>@endforeach</div>
<div class="hda-panel"><h3>Tips</h3><ul class="hda-list"><li>Use the permanent link of the record.</li><li>Add the access date for online sources.</li><li>Check your institution’s style guide.</li></ul></div></aside>
</div>
</div></div>
@endsection
