@php $panel = ($mode ?? 'card') === 'panel'; @endphp
<div class="aichat {{ $panel ? 'aichat--panel' : 'aichat--card' }}" data-ai-chat @if ($panel) id="aiPanel" role="dialog" aria-label="{{ $skin['ai']['name'] }}" hidden @endif>
    <header class="aichat__head">
        <span class="aichat__avatar"><img src="{{ asset($skin['img'] . '/robot.png') }}" alt="Maskot {{ $skin['ai']['name'] }}" width="204" height="200" loading="lazy"></span>
        <div class="aichat__title"><strong>{{ $skin['ai']['name'] }}</strong><span class="aichat__status"><i></i> Online</span></div>
        @if ($panel)<button type="button" class="aichat__close" data-ai-close aria-label="Tutup chat"><i class="bi bi-x-lg"></i></button>@endif
    </header>
    <div class="aichat__log" data-ai-log aria-live="polite">
        <div class="msg msg--bot"><p>{{ $skin['ai']['greeting'] }}</p></div>
    </div>
    <div class="aichat__chips">
        @foreach ($skin['ai']['suggestions'] as $q)
            <button type="button" data-ai-q>{{ $q }}</button>
        @endforeach
    </div>
    <form class="aichat__form" data-ai-form autocomplete="off">
        <input type="text" name="q" placeholder="Tulis pertanyaan kamu..." aria-label="Tulis pertanyaan" maxlength="200">
        <button type="submit" aria-label="Kirim"><i class="bi bi-send-fill"></i></button>
    </form>
</div>
