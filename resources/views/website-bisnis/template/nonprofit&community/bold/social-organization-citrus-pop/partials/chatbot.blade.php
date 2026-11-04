<section class="sec">
<div class="w g2 al">
<div class="bot"><img src="{{ $img }}bee.svg" alt="Bibi Lebah, maskot asisten" width="220" height="220" loading="lazy"><button class="btn btn-o" type="button" data-chat-open>Mulai ngobrol</button></div>
<div>
<h2>Bingung mau mulai dari mana? Tanya Bibi Lebah.</h2>
@foreach(array_slice($d['faqs'], 0, $limit ?? 99) as $f)
<details class="fq"><summary>{{ $f['q'] }}</summary><p>{{ $f['a'] }}</p></details>
@endforeach
@if(empty($full))
<a class="btn" href="{{ $base }}/chatbot">Semua pertanyaan</a>
@endif
</div>
</div>
</section>
