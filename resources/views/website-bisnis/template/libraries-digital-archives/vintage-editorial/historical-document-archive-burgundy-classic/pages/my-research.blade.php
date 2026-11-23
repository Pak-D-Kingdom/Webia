@extends($hv.'layouts.app')
@section('title', $page['title'])
@section('content')
@include($hv.'partials.inner-hero')
<div class="hda-page"><div class="hda-container">
<div class="hda-layout" data-notes>
<div>
    <div class="hda-panel"><h3>New note</h3>
        <form class="hda-form"><div class="hda-field"><label for="n-title">Title</label><input id="n-title" name="title" type="text" required placeholder="e.g. Questions about the Mercator map"></div><div class="hda-field"><label for="n-text">Note</label><textarea id="n-text" name="text" required></textarea></div><button class="hda-btn hda-btn--primary" type="submit" style="justify-self:start">Save note</button></form>
    </div>
    <div style="display:grid;gap:12px;margin-top:22px" data-note-list></div>
</div>
<aside class="hda-aside"><div class="hda-panel"><h3>Shortcuts</h3><ul class="hda-list"><li><a class="hda-textlink" href="{{ $hu('saved') }}">My Saved Archives</a></li><li><a class="hda-textlink" href="{{ $hu('citation') }}">Citation Guide</a></li><li><a class="hda-textlink" href="{{ $hu('research') }}">Research guides</a></li></ul></div><div class="hda-panel"><p style="margin:0;font-size:.85rem">Notes live in this browser only. Export or back them up if they matter.</p></div></aside>
</div>
</div></div>
@endsection
