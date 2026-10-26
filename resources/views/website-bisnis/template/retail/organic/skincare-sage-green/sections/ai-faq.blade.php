@php
    $cfg ??= config('template.retail.organic.skincare-sage-green.skincare');
    $img = asset($cfg['assets']['img']);
@endphp
<aside class="ai-panel" aria-labelledby="ai-panel-title">
    <svg class="deco deco--ai" aria-hidden="true"><use href="#i-branch"/></svg>
    <div class="ai-panel__top">
        <img class="ai-panel__robot" src="{{ $img }}/ai-robot.jpg" alt="Maskot robot AI Beauty Assistant" width="119" height="116" loading="lazy">
        <div class="ai-panel__hello">
            <h2 id="ai-panel-title">{{ $cfg['ai']['name'] }}</h2>
            <p>{{ $cfg['ai']['greeting'] }}</p>
        </div>
    </div>
    <ul class="ai-panel__chips">
        @foreach($cfg['ai']['chips'] as $chip)
            <li><button type="button" data-ai-open data-ai-question="{{ $chip }}">{{ $chip }}</button></li>
        @endforeach
    </ul>
    <form class="ai-panel__form" data-ai-inline autocomplete="off">
        <label class="sr-only" for="ai-inline-input">Tulis pertanyaan</label>
        <input id="ai-inline-input" type="text" name="q" placeholder="{{ $cfg['ai']['placeholder'] }}" maxlength="200">
        <button type="submit" class="round-btn" aria-label="Kirim pertanyaan"><svg class="ico"><use href="#i-send"/></svg></button>
    </form>
</aside>
