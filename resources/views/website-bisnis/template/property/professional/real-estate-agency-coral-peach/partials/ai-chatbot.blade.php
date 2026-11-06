{{-- AI Property FAQ: tombol maskot "Coco" + panel chat (frontend statis, jawaban dari config faq). --}}
@php $f = $site['faq']; @endphp
<div class="chatbot" data-chatbot>
  <section class="chat-panel" id="chat-panel" data-chat-panel hidden role="dialog" aria-label="AI Assistant" aria-live="polite">
    <header class="chat-panel__head">
      <div class="chat-panel__avatar">@include('website-bisnis.template.property.professional.real-estate-agency-coral-peach.partials.robot', ['class' => 'robot--sm'])</div>
      <div class="chat-panel__title"><strong>AI Assistant</strong><small>Tanya apa saja tentang properti kami!</small></div>
      <button class="chat-panel__close" type="button" data-chat-close aria-label="Tutup chat"><svg class="icon" aria-hidden="true"><use href="#i-x"/></svg></button>
    </header>
    <div class="chat-panel__body" data-chat-log>
      <div class="msg msg--bot"><p>{{ $f['greeting'] }}</p></div>
    </div>
    <div class="chat-panel__chips" data-chat-chips>
      @foreach ($f['quick'] as $q)
        <button class="chip" type="button" data-chat-quick="{{ $q['key'] }}">{{ $q['label'] }}</button>
      @endforeach
    </div>
    <form class="chat-panel__form" data-chat-form autocomplete="off">
      <label class="sr-only" for="chat-input">Tulis pertanyaan Anda</label>
      <input id="chat-input" type="text" name="message" placeholder="Tulis pertanyaan Anda…" maxlength="200" required>
      <button type="submit" class="chat-send" aria-label="Kirim"><svg class="icon" aria-hidden="true"><use href="#i-send"/></svg></button>
    </form>
  </section>

  <div class="chat-hint" data-chat-hint hidden><span>Halo! Ada yang bisa Coco bantu? 👋</span></div>
  <button class="chat-launcher" type="button" data-chat-toggle aria-expanded="false" aria-controls="chat-panel" aria-label="Buka AI Assistant">
    <span class="chat-launcher__glow" aria-hidden="true"></span>
    @include('website-bisnis.template.property.professional.real-estate-agency-coral-peach.partials.robot')
    <span class="chat-launcher__badge" aria-hidden="true">AI</span>
  </button>
</div>
