{{-- Parameter: $p (artikel), $mode ('home' | 'page'), $lead (true|false) --}}
<article class="bca-post @if($lead) bca-post--lead @endif bca-reveal" id="{{ $p['slug'] }}" data-bca-category="{{ $p['category'] }}">
    @if($mode === 'home')
        <a class="bca-post__img" href="{{ route($site['routes']['journal']) }}#{{ $p['slug'] }}" tabindex="-1" aria-hidden="true"><img src="{{ asset($site['asset_base'] . $p['image']) }}" width="1200" height="800" loading="lazy" alt=""></a>
        <div style="display:grid;gap:10px;align-content:start">
            <div class="bca-post__meta"><span class="bca-chip">{{ $p['category'] }}</span><span>{{ $p['date'] }}</span><span>{{ $p['read'] }}</span></div>
            <h3><a href="{{ route($site['routes']['journal']) }}#{{ $p['slug'] }}">{{ $p['title'] }}</a></h3>
            <p class="bca-excerpt">{{ $p['excerpt'] }}</p>
        </div>
    @else
        <button type="button" class="bca-post__img" data-bca-open="bca-post-{{ $p['slug'] }}" aria-label="Baca: {{ $p['title'] }}"><img src="{{ asset($site['asset_base'] . $p['image']) }}" width="1200" height="800" loading="lazy" alt=""></button>
        <div style="display:grid;gap:10px;align-content:start">
            <div class="bca-post__meta"><span class="bca-chip">{{ $p['category'] }}</span><span>{{ $p['date'] }}</span><span>{{ $p['read'] }}</span></div>
            <h3><button type="button" style="text-align:left" data-bca-open="bca-post-{{ $p['slug'] }}">{{ $p['title'] }}</button></h3>
            <p class="bca-excerpt">{{ $p['excerpt'] }}</p>
        </div>
    @endif
</article>
