@php $q = $c['quotation']; @endphp
<section id="penawaran" class="cp-quote cp-ph" aria-labelledby="cp-q-t">
    <img src="{{ $img($q['image']) }}" alt="" loading="lazy" onerror="this.remove()">
    <div class="cp-quote__in">
        <h2 id="cp-q-t">{{ $q['title'] }}</h2>
        <p>{{ $q['text'] }}</p>
        <a class="cp-btn cp-btn--light" href="{{ $link(['h' => '#kontak']) }}" data-quote>{{ $q['cta'] }} {{ $ic('arrow') }}</a>
    </div>
</section>
