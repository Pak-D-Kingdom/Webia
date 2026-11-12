@php
    $bizName = $business['business_name'] ?? 'Toko';
    $waNumber = $whatsapp ?? ($business['whatsapp'] ?? '081234567890');
    $cleanWa = preg_replace('/[^0-9]/', '', $waNumber);
    if (str_starts_with($cleanWa, '0')) {
        $cleanWa = '62' . substr($cleanWa, 1);
    }
    $waChatUrl = "https://wa.me/{$cleanWa}?text=" . rawurlencode("Halo {$bizName}, saya ingin bertanya mengenai layanan dan produk Anda.");
@endphp

<!-- Webia Floating Customer AI Widget -->
<div id="webia-client-ai-widget" class="webia-ai-root" data-site-slug="{{ $siteSlug }}" data-chat-url="{{ route('sites.chat', ['order' => $siteSlug]) }}" data-wa-url="{{ $waChatUrl }}">
    <!-- Floating Launcher Button -->
    <button type="button" id="webia-ai-btn" class="webia-ai-launcher" aria-label="Buka Chat AI Asisten {{ $bizName }}">
        <div class="webia-ai-launcher-inner">
            <svg class="webia-ai-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                <circle cx="9" cy="10" r="1" fill="currentColor"></circle>
                <circle cx="15" cy="10" r="1" fill="currentColor"></circle>
            </svg>
            <span class="webia-ai-btn-label">Tanya AI</span>
        </div>
        <span class="webia-ai-pulse-ring"></span>
    </button>

    <!-- Chat Window Modal -->
    <div id="webia-ai-window" class="webia-ai-window hidden" role="dialog" aria-modal="true" aria-labelledby="webia-ai-win-title">
        <!-- Header -->
        <div class="webia-ai-win-header">
            <div class="webia-ai-win-info">
                <div class="webia-ai-avatar">
                    <span class="webia-ai-avatar-icon">🤖</span>
                    <span class="webia-ai-status-dot"></span>
                </div>
                <div>
                    <h3 id="webia-ai-win-title" class="webia-ai-win-biz">{{ $bizName }}</h3>
                    <p class="webia-ai-win-sub">Asisten AI · Online 24/7</p>
                </div>
            </div>
            <button type="button" id="webia-ai-close-btn" class="webia-ai-win-close" aria-label="Tutup Percakapan">✕</button>
        </div>

        <!-- Messages Body -->
        <div id="webia-ai-msgs" class="webia-ai-win-body">
            <!-- Initial Greeting -->
            <div class="webia-ai-msg bot">
                <div class="webia-ai-bubble bot">
                    Halo! Selamat datang di <strong>{{ $bizName }}</strong>. Ada yang bisa kami bantu seputar produk, penawaran, atau layanan kami hari ini? 😊
                </div>
                <span class="webia-ai-msg-time">{{ date('H:i') }}</span>
            </div>

            <!-- Quick Suggestions -->
            <div class="webia-ai-chips" id="webia-ai-chips">
                <button type="button" class="webia-ai-chip" data-query="Jam operasional dan alamat toko di mana?">📍 Lokasi & Jam Buka</button>
                <button type="button" class="webia-ai-chip" data-query="Apa saja daftar harga dan layanan unggulan?">💼 Layanan & Harga</button>
                <button type="button" class="webia-ai-chip" data-query="Bagaimana cara memesan atau konsultasi?">💬 Cara Pemesanan</button>
            </div>
        </div>

        <!-- Chat Input Form -->
        <form id="webia-ai-form" class="webia-ai-win-footer">
            @csrf
            <input type="text" id="webia-ai-input" class="webia-ai-input" placeholder="Tulis pertanyaan Anda di sini..." maxlength="500" required autocomplete="off">
            <button type="submit" id="webia-ai-send" class="webia-ai-send-btn" aria-label="Kirim Pesan">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="22" y1="2" x2="11" y2="13"></line>
                    <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                </svg>
            </button>
        </form>
    </div>
</div>

<style>
/* Scoped Styling for Customer Live Site AI Widget */
.webia-ai-root {
    position: fixed;
    bottom: 24px;
    right: 24px;
    z-index: 999999;
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
    line-height: 1.4;
}

.webia-ai-launcher {
    position: relative;
    background: linear-gradient(135deg, #4f46e5 0%, #3b82f6 100%);
    color: #ffffff;
    border: none;
    border-radius: 9999px;
    padding: 12px 18px;
    display: inline-flex;
    align-items: center;
    cursor: pointer;
    box-shadow: 0 10px 25px -5px rgba(79, 70, 229, 0.45), 0 8px 10px -6px rgba(79, 70, 229, 0.25);
    transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
}
.webia-ai-launcher:hover {
    transform: translateY(-2px) scale(1.02);
    box-shadow: 0 16px 32px -4px rgba(79, 70, 229, 0.55);
}
.webia-ai-launcher-inner {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 13.5px;
    font-weight: 700;
    letter-spacing: 0.02em;
}
.webia-ai-icon {
    width: 20px;
    height: 20px;
}
.webia-ai-pulse-ring {
    position: absolute;
    top: -3px;
    right: -3px;
    width: 12px;
    height: 12px;
    background: #10b981;
    border: 2px solid #ffffff;
    border-radius: 9999px;
}

.webia-ai-window {
    position: fixed;
    bottom: 84px;
    right: 24px;
    width: 375px;
    max-width: calc(100vw - 32px);
    height: 520px;
    max-height: calc(100vh - 110px);
    background: #ffffff;
    border-radius: 20px;
    box-shadow: 0 20px 40px -10px rgba(0, 0, 0, 0.22), 0 0 0 1px rgba(0, 0, 0, 0.06);
    display: flex;
    flex-direction: column;
    overflow: hidden;
    animation: webiaAiSlideUp 0.25s cubic-bezier(0.16, 1, 0.3, 1) forwards;
}
.webia-ai-window.hidden {
    display: none !important;
}

@keyframes webiaAiSlideUp {
    from { opacity: 0; transform: translateY(16px) scale(0.97); }
    to { opacity: 1; transform: translateY(0) scale(1); }
}

.webia-ai-win-header {
    background: linear-gradient(135deg, #1e1b4b 0%, #312e81 100%);
    color: #ffffff;
    padding: 14px 16px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}
.webia-ai-win-info {
    display: flex;
    align-items: center;
    gap: 10px;
}
.webia-ai-avatar {
    position: relative;
    width: 38px;
    height: 38px;
    background: rgba(255, 255, 255, 0.15);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
}
.webia-ai-status-dot {
    position: absolute;
    bottom: -1px;
    right: -1px;
    width: 9px;
    height: 9px;
    background: #10b981;
    border: 2px solid #1e1b4b;
    border-radius: 9999px;
}
.webia-ai-win-biz {
    margin: 0;
    font-size: 14px;
    font-weight: 700;
    color: #ffffff;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    max-width: 220px;
}
.webia-ai-win-sub {
    margin: 2px 0 0 0;
    font-size: 11.5px;
    color: rgba(255, 255, 255, 0.75);
}
.webia-ai-win-close {
    background: transparent;
    border: none;
    color: rgba(255, 255, 255, 0.7);
    font-size: 16px;
    cursor: pointer;
    width: 28px;
    height: 28px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 8px;
    transition: background 0.15s;
}
.webia-ai-win-close:hover {
    background: rgba(255, 255, 255, 0.15);
    color: #ffffff;
}

.webia-ai-win-body {
    flex: 1;
    padding: 16px;
    overflow-y: auto;
    background: #f8fafc;
    display: flex;
    flex-direction: column;
    gap: 12px;
}
.webia-ai-msg {
    display: flex;
    flex-direction: column;
    max-width: 86%;
}
.webia-ai-msg.bot {
    align-self: flex-start;
}
.webia-ai-msg.user {
    align-self: flex-end;
}
.webia-ai-bubble {
    padding: 10px 14px;
    border-radius: 14px;
    font-size: 13px;
    line-height: 1.5;
    word-break: break-word;
}
.webia-ai-bubble.bot {
    background: #ffffff;
    color: #0f172a;
    border-top-left-radius: 4px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.06);
    border: 1px solid #e2e8f0;
}
.webia-ai-bubble.user {
    background: #4f46e5;
    color: #ffffff;
    border-top-right-radius: 4px;
    box-shadow: 0 2px 6px rgba(79, 70, 229, 0.25);
}
.webia-ai-msg-time {
    font-size: 10px;
    color: #94a3b8;
    margin-top: 3px;
    padding: 0 4px;
}
.webia-ai-msg.user .webia-ai-msg-time {
    text-align: right;
}

.webia-ai-chips {
    display: flex;
    flex-wrap: wrap;
    gap: 6px;
    margin-top: 4px;
}
.webia-ai-chip {
    background: #ffffff;
    border: 1px solid #cbd5e1;
    color: #334155;
    font-size: 11.5px;
    font-weight: 600;
    padding: 5px 10px;
    border-radius: 9999px;
    cursor: pointer;
    transition: all 0.15s;
    text-align: left;
}
.webia-ai-chip:hover {
    background: #eef2ff;
    border-color: #a5b4fc;
    color: #4338ca;
}

.webia-ai-fallback-box {
    background: #fffbeb;
    border: 1px solid #fcd34d;
    border-radius: 12px;
    padding: 12px;
    margin-top: 6px;
    font-size: 12.5px;
    color: #92400e;
    line-height: 1.5;
}
.webia-ai-wa-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    width: 100%;
    margin-top: 8px;
    background: #25d366;
    color: #ffffff;
    text-decoration: none;
    font-weight: 700;
    font-size: 12.5px;
    padding: 8px 12px;
    border-radius: 8px;
    box-shadow: 0 2px 6px rgba(37, 211, 102, 0.3);
    transition: opacity 0.15s;
}
.webia-ai-wa-btn:hover {
    opacity: 0.92;
}

.webia-ai-typing {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    padding: 8px 12px;
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 12px;
    border-top-left-radius: 4px;
    width: fit-content;
}
.webia-ai-typing span {
    width: 6px;
    height: 6px;
    background: #94a3b8;
    border-radius: 50%;
    animation: webiaDotPulse 1.2s infinite ease-in-out;
}
.webia-ai-typing span:nth-child(2) { animation-delay: 0.2s; }
.webia-ai-typing span:nth-child(3) { animation-delay: 0.4s; }
@keyframes webiaDotPulse {
    0%, 80%, 100% { transform: scale(0.6); opacity: 0.4; }
    40% { transform: scale(1); opacity: 1; }
}

.webia-ai-win-footer {
    padding: 12px;
    background: #ffffff;
    border-top: 1px solid #f1f5f9;
    display: flex;
    align-items: center;
    gap: 8px;
}
.webia-ai-input {
    flex: 1;
    border: 1px solid #cbd5e1;
    border-radius: 10px;
    padding: 9px 12px;
    font-size: 13px;
    outline: none;
    color: #0f172a;
    transition: border-color 0.15s;
}
.webia-ai-input:focus {
    border-color: #4f46e5;
    box-shadow: 0 0 0 2px rgba(79, 70, 229, 0.15);
}
.webia-ai-send-btn {
    width: 36px;
    height: 36px;
    background: #4f46e5;
    color: #ffffff;
    border: none;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: background 0.15s;
    flex-shrink: 0;
}
.webia-ai-send-btn svg {
    width: 17px;
    height: 17px;
}
.webia-ai-send-btn:hover {
    background: #4338ca;
}
.webia-ai-send-btn:disabled {
    background: #cbd5e1;
    cursor: not-allowed;
}
</style>

<script>
(function() {
    const root = document.getElementById('webia-client-ai-widget');
    if (!root) return;

    const btn = document.getElementById('webia-ai-btn');
    const win = document.getElementById('webia-ai-window');
    const closeBtn = document.getElementById('webia-ai-close-btn');
    const form = document.getElementById('webia-ai-form');
    const input = document.getElementById('webia-ai-input');
    const msgs = document.getElementById('webia-ai-msgs');
    const sendBtn = document.getElementById('webia-ai-send');

    const chatUrl = root.getAttribute('data-chat-url');
    const defaultWaUrl = root.getAttribute('data-wa-url');

    function toggleChat(show) {
        if (show === undefined) {
            win.classList.toggle('hidden');
        } else if (show) {
            win.classList.remove('hidden');
            input.focus();
        } else {
            win.classList.add('hidden');
        }
        if (!win.classList.contains('hidden')) {
            msgs.scrollTop = msgs.scrollHeight;
        }
    }

    btn.addEventListener('click', () => toggleChat(true));
    closeBtn.addEventListener('click', () => toggleChat(false));

    // Handle Quick Chips
    document.querySelectorAll('.webia-ai-chip').forEach(chip => {
        chip.addEventListener('click', function() {
            const query = this.getAttribute('data-query');
            if (query) {
                input.value = query;
                form.dispatchEvent(new Event('submit'));
            }
        });
    });

    function formatTime() {
        const d = new Date();
        return String(d.getHours()).padStart(2, '0') + ':' + String(d.getMinutes()).padStart(2, '0');
    }

    function appendUserMessage(text) {
        const wrap = document.createElement('div');
        wrap.className = 'webia-ai-msg user';
        wrap.innerHTML = `<div class="webia-ai-bubble user">${escapeHtml(text)}</div><span class="webia-ai-msg-time">${formatTime()}</span>`;
        msgs.appendChild(wrap);
        msgs.scrollTop = msgs.scrollHeight;
    }

    function appendBotMessage(text) {
        const wrap = document.createElement('div');
        wrap.className = 'webia-ai-msg bot';
        wrap.innerHTML = `<div class="webia-ai-bubble bot">${escapeHtml(text)}</div><span class="webia-ai-msg-time">${formatTime()}</span>`;
        msgs.appendChild(wrap);
        msgs.scrollTop = msgs.scrollHeight;
    }

    function appendQuotaExhaustedCard(reply, waUrl) {
        const targetWa = waUrl || defaultWaUrl;
        const wrap = document.createElement('div');
        wrap.className = 'webia-ai-msg bot';
        wrap.innerHTML = `
            <div class="webia-ai-bubble bot">
                ${escapeHtml(reply)}
                <div class="webia-ai-fallback-box">
                    <strong>Zero Lost Lead:</strong> Anda dapat melanjutkan percakapan langsung dengan customer service kami di WhatsApp.
                    <a href="${targetWa}" target="_blank" rel="noopener" class="webia-ai-wa-btn">
                        <span>💬 Chat via WhatsApp</span>
                    </a>
                </div>
            </div>
            <span class="webia-ai-msg-time">${formatTime()}</span>
        `;
        msgs.appendChild(wrap);
        msgs.scrollTop = msgs.scrollHeight;
    }

    function showTyping() {
        const t = document.createElement('div');
        t.id = 'webia-ai-typing-indicator';
        t.className = 'webia-ai-typing';
        t.innerHTML = '<span></span><span></span><span></span>';
        msgs.appendChild(t);
        msgs.scrollTop = msgs.scrollHeight;
    }

    function hideTyping() {
        const t = document.getElementById('webia-ai-typing-indicator');
        if (t) t.remove();
    }

    function escapeHtml(str) {
        const div = document.createElement('div');
        div.textContent = str;
        return div.innerHTML;
    }

    form.addEventListener('submit', async function(e) {
        e.preventDefault();
        const text = input.value.trim();
        if (!text) return;

        appendUserMessage(text);
        input.value = '';
        input.disabled = true;
        sendBtn.disabled = true;
        showTyping();

        try {
            const token = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') 
                       || document.querySelector('input[name="_token"]')?.value 
                       || '';

            const resp = await fetch(chatUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': token
                },
                body: JSON.stringify({ message: text })
            });

            const data = await resp.json();
            hideTyping();

            if (data.status === 'quota_exhausted') {
                appendQuotaExhaustedCard(data.reply, data.whatsapp_url);
            } else {
                appendBotMessage(data.reply || 'Terima kasih atas pertanyaannya. Ada hal lain yang bisa kami bantu?');
            }
        } catch (err) {
            hideTyping();
            appendBotMessage('Mohon maaf, saat ini sedang terjadi kendala jaringan. Silakan hubungi kami via WhatsApp resmi.');
        } finally {
            input.disabled = false;
            sendBtn.disabled = false;
            input.focus();
        }
    });
})();
</script>
