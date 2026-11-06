@php($b = $cafe['booking'])
@php($t = $cafe['slides'][0]['title'])

{{-- Foto suasana + tagline --}}
<div class="lm-rsv-photo">
    <img src="{{ $img($b['image']) }}" alt="" loading="lazy">
    <div class="lm-rsv-photo__txt">
        <p class="lm-eyebrow lm-eyebrow--gold">{{ $cafe['brand']['name'] }}</p>
        <h2>{{ $t[0] }}<em>{{ $t[1] }}</em></h2>
        <p>{{ $b['text'] }}</p>
    </div>
</div>

{{-- Langkah reservasi --}}
<div class="lm-card lm-steps">
    <p class="lm-eyebrow">{{ $b['steps_title'] }}</p>
    <ol class="lm-steps__list">
        @foreach ($b['steps'] as $st)
            <li>
                <span class="lm-steps__n" aria-hidden="true">{{ $loop->iteration }}</span>
                <div>
                    <strong>{{ $st['title'] }}</strong>
                    <p>{{ $st['text'] }}</p>
                </div>
            </li>
        @endforeach
    </ol>
</div>

{{-- Kontak --}}
<div class="lm-card lm-rsv-contact">
    <p class="lm-eyebrow">{{ $b['contact_title'] }}</p>
    <ul>
        <li><svg class="i" aria-hidden="true"><use href="#i-phone"/></svg><a href="tel:{{ preg_replace('/[^\d+]/', '', $cafe['contact']['phone']) }}">{{ $cafe['contact']['phone'] }}</a></li>
        <li><svg class="i" aria-hidden="true"><use href="#i-mail"/></svg><a href="mailto:{{ $cafe['contact']['email'] }}">{{ $cafe['contact']['email'] }}</a></li>
        <li><svg class="i" aria-hidden="true"><use href="#i-pin"/></svg><span>{{ $cafe['contact']['address_full'] }}</span></li>
    </ul>
</div>
