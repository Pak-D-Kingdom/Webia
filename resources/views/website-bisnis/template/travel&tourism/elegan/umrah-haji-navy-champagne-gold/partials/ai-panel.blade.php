<aside class="uh-aipanel" aria-label="AI Assistant">
    <div class="uh-aipanel__card">
        <div class="uh-aipanel__head">
            <div class="uh-aipanel__intro">
                <h2><span class="uh-aipanel__badge"><svg class="uh-ico" aria-hidden="true"><use href="#i-bot"/></svg></span>AI Assistant</h2>
                <p>Tanya apa saja tentang paket umrah, haji, jadwal, harga, dan persyaratan pendaftaran.</p>
            </div>
            <img class="uh-aipanel__bot" src="{{ $img('bot.svg') }}" alt="Maskot AI Assistant Al Hijrah" width="150" height="150" loading="lazy">
        </div>
        <div class="uh-bubble">
            <span>"Assalamu'alaikum!<br>Ada yang bisa kami bantu?<br>Pilih topik di bawah ya!"</span>
        </div>
        <ul class="uh-aipanel__list">
            @foreach ($d['ai_topics'] as $t)
                <li>
                    <button type="button" data-chat-ask="{{ $t[2] }}">
                        <svg class="uh-ico" aria-hidden="true"><use href="#i-{{ $t[0] }}"/></svg>
                        <span>{{ $t[1] }}</span>
                        <svg class="uh-ico uh-ico--chev" aria-hidden="true"><use href="#i-chev"/></svg>
                    </button>
                </li>
            @endforeach
        </ul>
        <button type="button" class="uh-btn uh-btn--dark uh-btn--block" data-chat-open>Chat Sekarang <svg class="uh-ico" aria-hidden="true"><use href="#i-arrow"/></svg></button>
    </div>
</aside>
