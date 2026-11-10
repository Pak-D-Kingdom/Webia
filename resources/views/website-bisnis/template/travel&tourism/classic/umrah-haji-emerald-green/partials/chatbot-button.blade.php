<div class="uh-chat" data-uh-chat>
    <aside class="uh-chat__bubble" data-uh-chat-bubble aria-label="Tanya Muthawwif AI">
        <button type="button" class="uh-chat__close" data-uh-chat-close aria-label="Tutup pesan">
            <svg class="uh-i" aria-hidden="true"><use href="#i-x"/></svg>
        </button>
        <p class="uh-chat__title">{{ $uh['ai']['bubble_title'] }}</p>
        <p class="uh-chat__text">{{ $uh['ai']['bubble_text'] }}</p>
        <a class="uh-chat__btn" href="{{ $url('chatbot') }}">
            <svg class="uh-i" aria-hidden="true"><use href="#i-message"/></svg>
            <span>{{ $uh['ai']['button'] }}</span>
        </a>
    </aside>
    <a class="uh-chat__fab" href="{{ $url('chatbot') }}" aria-label="Buka AI Assistant Muthawwif">
        <span class="uh-chat__ring" aria-hidden="true"></span>
        <span class="uh-chat__face">
            <img src="{{ $img('maskot-robot.png') }}" alt="" width="60" height="55" loading="lazy">
        </span>
        <span class="uh-chat__badge" aria-hidden="true"></span>
    </a>
</div>
