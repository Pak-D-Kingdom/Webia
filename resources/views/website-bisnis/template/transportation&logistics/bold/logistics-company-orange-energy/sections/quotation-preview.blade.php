@php $q = $site['quotation']; @endphp
<article class="lg-quote">
    <img class="lg-quote__img" src="{{ $img($q['image']) }}" alt="" aria-hidden="true" loading="lazy">
    <div class="lg-quote__body">
        <h2 class="lg-panel__title"><a href="{{ $to('penawaran') }}">{{ $q['title'] }}</a></h2>
        <p>{{ $q['text'] }}</p>
        <a class="lg-btn lg-btn--white lg-btn--sm" href="{{ $to('penawaran') }}">{{ $q['cta'] }}<svg class="lg-ic" aria-hidden="true"><use href="#i-arrow-right"></use></svg></a>
    </div>
</article>
