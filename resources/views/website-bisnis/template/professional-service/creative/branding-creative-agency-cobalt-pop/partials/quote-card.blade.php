{{-- Parameter: $q (testimoni), $variant (yellow|cobalt|coral|ink|paper), $big (true|false) --}}
<figure class="bca-quote bca-quote--{{ $variant }} @if($big) bca-quote--big @endif bca-reveal">
    <blockquote>&ldquo;{{ $q['quote'] }}&rdquo;</blockquote>
    <figcaption class="bca-who">
        <span class="bca-avatar" data-tone="{{ $q['tone'] }}" aria-hidden="true">{{ $q['initials'] }}</span>
        <span><strong>{{ $q['name'] }}</strong><span>{{ $q['role'] }}, {{ $q['company'] }}</span></span>
    </figcaption>
</figure>
