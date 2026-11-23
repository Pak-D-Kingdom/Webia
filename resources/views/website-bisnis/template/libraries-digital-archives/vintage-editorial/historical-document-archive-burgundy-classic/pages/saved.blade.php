@extends($hv.'layouts.app')
@section('title', $page['title'])
@section('content')
@include($hv.'partials.inner-hero')
<div class="hda-page"><div class="hda-container">
<section>
    <div class="hda-sechead"><div><h2>Your bookmarks</h2><p>Saved only in this browser. Clearing site data removes them.</p></div><span class="hda-count" data-saved-count></span></div>
    <div class="hda-grid" data-saved-list></div>
    <div class="hda-empty" data-saved-empty><strong>Nothing saved yet</strong>Use the bookmark icon on any document to keep it here. <a class="hda-textlink" href="{{ $hu('documents') }}">Browse documents</a></div>
</section>
</div></div>
@endsection
