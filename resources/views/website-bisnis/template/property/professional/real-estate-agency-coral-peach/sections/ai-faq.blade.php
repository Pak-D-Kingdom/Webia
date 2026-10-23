{{-- Kartu AI Property FAQ (inline, sesuai desain). Chip/input membuka panel chat melayang. --}}
@php $f = $site['faq']; @endphp
<section class="ai-card" id="ai-faq" aria-labelledby="ai-title">
  <div class="ai-card__top">
    <div class="ai-card__robot">@include('website-bisnis.template.property.professional.real-estate-agency-coral-peach.partials.robot', ['class' => 'robot--md'])</div>
    <div>
      <h2 class="ai-card__title" id="ai-title">AI Assistant</h2>
      <p class="ai-card__sub">Tanya apa saja tentang properti kami!</p>
      <p class="ai-card__bubble">{{ $f['greeting'] }}</p>
    </div>
  </div>
  <div class="ai-card__chips">
    @foreach ($f['quick'] as $q)
      <button class="chip" type="button" data-chat-open="{{ $q['key'] }}">{{ $q['label'] }}</button>
    @endforeach
  </div>
  <form class="ai-card__form" data-chat-inline autocomplete="off">
    <label class="sr-only" for="ai-inline">Tulis pertanyaan Anda</label>
    <input id="ai-inline" type="text" placeholder="Tulis pertanyaan Anda…" maxlength="200" required>
    <button class="chat-send" type="submit" aria-label="Kirim pertanyaan"><svg class="icon" aria-hidden="true"><use href="#i-send"/></svg></button>
  </form>
</section>
