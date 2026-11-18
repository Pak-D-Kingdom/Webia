@php
    $waText = 'Halo ' . $site['brand']['name'] . ', saya ingin berkonsultasi mengenai desain arsitektur.';
@endphp

<div class="abd-fabs" id="abd-fabs">
    <a class="abd-fab abd-fab--wa" href="https://wa.me/{{ $site['contact']['whatsapp'] }}?text={{ rawurlencode($waText) }}"
       target="_blank" rel="noopener noreferrer" aria-label="Chat lewat WhatsApp">
        <span class="abd-fab__wave" aria-hidden="true"></span>
        <span class="abd-fab__wave abd-fab__wave--2" aria-hidden="true"></span>
        <svg class="i" aria-hidden="true"><use href="#i-whatsapp"/></svg>
        <span class="abd-fab__tip">Chat WhatsApp</span>
    </a>

    <button type="button" class="abd-fab abd-fab--bot" data-chat-open aria-label="Buka ArchiBot, asisten FAQ layanan arsitektur" aria-expanded="false" aria-controls="abd-chat">
        <span class="abd-fab__halo" aria-hidden="true"></span>
        <span class="abd-fab__ring" aria-hidden="true"></span>
        <span class="abd-fab__face" aria-hidden="true"><img src="{{ $img('archibot-avatar.svg') }}" alt="" width="200" height="200"></span>
        <span class="abd-fab__badge" aria-hidden="true"></span>
        <span class="abd-fab__tip abd-fab__tip--bot"><svg class="i" aria-hidden="true"><use href="#i-spark"/></svg>Tanya ArchiBot</span>
    </button>
</div>

<section class="abd-chat" id="abd-chat" role="dialog" aria-modal="false" aria-labelledby="abd-chat-title" hidden>
    <header class="abd-chat__head">
        <span class="abd-chat__avatar" aria-hidden="true"><img src="{{ $img('archibot-avatar.svg') }}" alt="" width="200" height="200"><i class="abd-chat__pulse"></i></span>
        <div class="abd-chat__who">
            <h2 id="abd-chat-title">ArchiBot</h2>
            <p><i class="abd-chat__on" aria-hidden="true"></i>Online · balas instan</p>
        </div>
        <button type="button" class="abd-iconbtn abd-iconbtn--light" data-chat-menu aria-label="Kembali ke menu topik" title="Menu topik"><svg class="i" aria-hidden="true"><use href="#i-grid"/></svg></button>
        <a class="abd-iconbtn abd-iconbtn--light" href="https://wa.me/{{ $site['contact']['whatsapp'] }}?text={{ rawurlencode($waText) }}" target="_blank" rel="noopener noreferrer" aria-label="Lanjut ke WhatsApp" title="Lanjut ke WhatsApp"><svg class="i" aria-hidden="true"><use href="#i-whatsapp"/></svg></a>
        <button type="button" class="abd-iconbtn abd-iconbtn--light" data-chat-close aria-label="Tutup chat"><svg class="i" aria-hidden="true"><use href="#i-close"/></svg></button>
    </header>

    <div class="abd-chat__body" id="abd-chat-body" aria-live="polite">
        <div class="abd-chat__welcome" id="abd-chat-welcome">
            <div class="abd-chat__hero"><img src="{{ $img('archibot.svg') }}" alt="" width="320" height="440"></div>
            <h3>Halo, saya ArchiBot!</h3>
            <p>Asisten FAQ layanan arsitektur {{ $site['brand']['name'] }}. Pilih topik di bawah atau tulis pertanyaan Anda.</p>
            <div class="abd-topics">
                @foreach ($site['topics'] as $t)
                    <button type="button" class="abd-topic" data-chat-topic="{{ $t[2] }}">
                        <span class="abd-topic__ico" aria-hidden="true"><svg class="i"><use href="#i-{{ $t[1] }}"/></svg></span>
                        <span class="abd-topic__t">{{ $t[0] }}</span>
                    </button>
                @endforeach
            </div>
        </div>
        <div class="abd-chat__thread" id="abd-chat-thread"></div>
    </div>

    <div class="abd-chat__quick" id="abd-chat-quick" aria-label="Pertanyaan lanjutan"></div>
    <form class="abd-chat__form" id="abd-chat-form" autocomplete="off">
        <input type="text" id="abd-chat-input" placeholder="Tulis pertanyaan Anda..." maxlength="200" aria-label="Pertanyaan Anda">
        <button type="submit" class="abd-chat__send" aria-label="Kirim pertanyaan"><svg class="i" aria-hidden="true"><use href="#i-send"/></svg></button>
    </form>
    <p class="abd-chat__note">Jawaban otomatis dari FAQ. Untuk kebutuhan khusus, lanjutkan lewat WhatsApp.</p>
</section>
