@extends($hv.'layouts.app')
@section('title', $page['title'])
@section('content')
@include($hv.'partials.inner-hero')
<div class="hda-page"><div class="hda-container">
<section data-filter-root>
<div class="hda-toolbar">
    <label class="hda-toolbar__search"><span class="hda-sr">Filter this list</span><svg class="hda-icon"><use href="#i-search"/></svg><input class="hda-input" type="search" placeholder="Filter by keyword…" data-filter-q></label>
<select data-filter-select="fmt" aria-label="All formats"><option value="">All formats</option>@foreach(['PDF','TIFF','WAV','ZIP'] as $o)<option>{{ $o }}</option>@endforeach</select>
    <span class="hda-count" data-filter-count></span>
</div>
    <div class="hda-tablewrap"><table class="hda-table">
        <thead><tr><th>File</th><th>Format</th><th>Size</th><th>Rights</th><th><span class="hda-sr">Download</span></th></tr></thead>
        <tbody data-filter-grid>
            @foreach($hda['downloads'] as $dl)
            <tr data-filter-item data-text="{{ $dl['title'] }} {{ $dl['fmt'] }} {{ $dl['rights'] }}" data-fmt="{{ $dl['fmt'] }}"><td><strong>{{ $dl['title'] }}</strong></td><td><span class="hda-tag">{{ $dl['fmt'] }}</span></td><td>{{ $dl['size'] }}</td><td>{{ $dl['rights'] }}</td><td><button type="button" class="hda-btn hda-btn--outline hda-btn--sm" data-copy="Demo link — connect your file storage"><svg class="hda-icon"><use href="#i-download"/></svg>Get</button></td></tr>
            @endforeach
        </tbody>
    </table></div>
<div class="hda-empty" data-filter-empty><strong>No matching records</strong>Try a different keyword or clear a filter.</div>
    <p style="font-size:.85rem;color:var(--muted);margin-top:14px">Demo buttons copy a placeholder. Point each row to your real file URL. See the <a class="hda-textlink" href="{{ $hu('policy') }}">usage policy</a>.</p>
</section>
</div></div>
@endsection
