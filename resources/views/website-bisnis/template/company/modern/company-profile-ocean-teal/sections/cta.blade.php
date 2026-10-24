@php $c = $z['cta']; @endphp
<section class="ot-cta" aria-labelledby="ot-cta-title">
    <div>
        <h2 id="ot-cta-title">{{ $c['title'] }}</h2>
        <p>{{ $c['text'] }}</p>
    </div>
    <button class="ot-btn ot-btn--light" type="button" data-open="quote">{{ $c['button'] }}<svg class="ot-ic" aria-hidden="true"><use href="#i-arrow-right"/></svg></button>
</section>
