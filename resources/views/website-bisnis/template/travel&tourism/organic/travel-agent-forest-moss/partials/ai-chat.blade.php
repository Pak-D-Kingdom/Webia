{{-- Widget chat. Parameter: $variant = panel | inline | page ; $cid = id unik --}}
@php $cid = $cid ?? 'chat-' . $variant; @endphp
<div class="ta-chat ta-chat--{{ $variant }}" data-ta-chat data-variant="{{ $variant }}">
    <div class="ta-chat__log" data-chat-log role="log" aria-live="polite" aria-label="Percakapan dengan asisten AI" @if ($variant === 'inline') hidden @endif></div>

    <div class="ta-chat__chips" data-chat-chips aria-label="Topik cepat">
        @foreach ($cfg['ai']['chips'] as $chip)
            <button type="button" class="ta-chip" data-chat-chip="{{ $chip }}">{{ $chip }}</button>
        @endforeach
    </div>

    <form class="ta-chat__form" data-chat-form autocomplete="off">
        <label class="ta-sr" for="{{ $cid }}-input">Tulis pertanyaan Anda</label>
        <input id="{{ $cid }}-input" class="ta-chat__input" data-chat-input type="text" maxlength="200" placeholder="Tulis pertanyaan Anda...">
        <button class="ta-chat__send" type="submit" aria-label="Kirim pertanyaan"><svg class="ta-i" aria-hidden="true"><use href="#i-arrow-right"/></svg></button>
    </form>
</div>
