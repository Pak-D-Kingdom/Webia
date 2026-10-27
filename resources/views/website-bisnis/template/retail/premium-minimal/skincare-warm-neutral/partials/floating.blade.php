<div class="float-stack">
    <div class="ai-pop" data-ai-pop aria-hidden="true">Tanya AI ✨</div>
    <button type="button" class="ai-fab" data-ai-open aria-label="Buka {{ $skin['ai']['name'] }}" aria-haspopup="dialog" aria-controls="aiPanel">
        <span class="ai-fab__ring" aria-hidden="true"></span>
        <span class="ai-fab__spark ai-fab__spark--1" aria-hidden="true"></span>
        <span class="ai-fab__spark ai-fab__spark--2" aria-hidden="true"></span>
        <img src="{{ asset($skin['img'] . '/robot.png') }}" alt="" width="72" height="72">
        <span class="ai-fab__dot" aria-hidden="true"></span>
    </button>
    <a class="wa-fab" href="https://wa.me/{{ $skin['whatsapp'] }}?text={{ rawurlencode('Halo ' . $skin['name'] . ', saya ingin bertanya tentang produk.') }}" target="_blank" rel="noopener" aria-label="Chat WhatsApp {{ $skin['name'] }}">
        <span class="wa-fab__ic"><i class="bi bi-whatsapp"></i></span>
        <span class="wa-fab__txt"><small>Butuh bantuan?</small><b>Chat WhatsApp</b></span>
    </a>
</div>
@include($ns . '.partials.ai-chat', ['mode' => 'panel'])
