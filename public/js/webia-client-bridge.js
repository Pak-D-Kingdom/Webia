(function() {
    const clientCfg = window.WEBIA_CLIENT || {};
    const chatUrl = clientCfg.chatUrl || "";
    const telemetryUrl = clientCfg.telemetryUrl || "";
    const csrfToken = clientCfg.csrfToken || (document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || "");
    const defaultWaUrl = clientCfg.defaultWaUrl || "";
    const clientWa = clientCfg.whatsapp || window.WEBIA_WA_ADMIN || "";

    function report(event, details) {
        if (!telemetryUrl) return;
        const payload = JSON.stringify(Object.assign({ event: event }, details || {}));
        fetch(telemetryUrl, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken },
            body: payload,
            keepalive: true,
        }).catch(function() {});
    }

    function onReady(fn) {
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', fn, { once: true });
        } else {
            fn();
        }
    }

    onReady(function() {
        document.querySelectorAll('.fab .wa').forEach(function(wa) {
            if (clientWa) wa.href = 'https://wa.me/' + clientWa;
        });
    });

    // Unified WhatsApp link & window.open interceptor for demo numbers
    if (clientWa) {
        window.WEBIA_WA_ADMIN = clientWa;
        const demoWaPattern = /6285850180285|6281234567890|628123456789|6281200000000|628111222333/g;
        const origOpen = window.open;
        if (origOpen && !origOpen.__webiaPatched) {
            window.open = function(u, t, f) {
                if (typeof u === "string" && u.includes("wa.me")) {
                    u = u.replace(demoWaPattern, clientWa);
                }
                return origOpen.call(window, u, t, f);
            };
            window.open.__webiaPatched = true;
        }
        document.addEventListener("click", function(e) {
            const a = e.target.closest && e.target.closest("a[href*='wa.me']");
            if (a && typeof a.href === "string") {
                a.href = a.href.replace(demoWaPattern, clientWa);
            }
        }, true);
    }
    let chatBusy = false;
    const MAX_INPUT_LENGTH = 1000;

    function formatWebiaReplyHtml(rawText) {
        if (!rawText) return '';
        let html = String(rawText)
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#39;');

        html = html.replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>');
        html = html.replace(/\[([^\]]+)\]\((https?:\/\/[^\s)]+)\)/g, '<a href="$2" target="_blank" rel="noopener noreferrer" style="text-decoration:underline;">$1</a>');
        html = html.replace(/(^|[\s(])(https?:\/\/[^\s<)]+)/g, '$1<a href="$2" target="_blank" rel="noopener noreferrer" style="text-decoration:underline;">$2</a>');

        const lines = html.split(/\r?\n/);
        const out = [];
        let inUl = false;
        for (let i = 0; i < lines.length; i++) {
            const line = lines[i];
            const ulMatch = line.match(/^\s*[-*•]\s+(.+)$/);
            if (ulMatch) {
                if (!inUl) { out.push('<ul style="margin:6px 0;padding-left:18px;list-style:disc;">'); inUl = true; }
                out.push('<li>' + ulMatch[1] + '</li>');
            } else {
                if (inUl) { out.push('</ul>'); inUl = false; }
                out.push(line);
            }
        }
        if (inUl) out.push('</ul>');
        return out.join('<br>').replace(/<ul([^>]*)><br>/g, '<ul$1>').replace(/<br><\/ul>/g, '</ul>').replace(/<\/li><br>/g, '</li>');
    }

    function setNativeBusy(busy) {
        chatBusy = busy;
        document.querySelectorAll('[data-webia-chat-send], #send, #cf button[type="submit"]').forEach(function(button) {
            button.disabled = busy;
            button.setAttribute('aria-busy', busy ? 'true' : 'false');
        });
    }

    function appendRetry(message, container) {
        if (!container) return;
        const retry = document.createElement('button');
        retry.type = 'button';
        retry.className = 'webia-chat-retry';
        retry.textContent = 'Coba lagi';
        retry.style.cssText = 'margin-top:8px; display:block; font:inherit; cursor:pointer; text-decoration:underline;';
        retry.addEventListener('click', function() { window.__webiaAsk(message); });
        container.appendChild(retry);
    }

    // Kontrak ringan untuk template baru. Cukup gunakan data-webia-chat-*;
    // template lama tetap ditangani adapter spesifik di bawah.
    function bindDataChatContract() {
        document.querySelectorAll('[data-webia-chat-form]').forEach(function(form) {
            if (form.dataset.webiaBound) return;
            const input = form.querySelector('[data-webia-chat-input]');
            if (!input) return;
            form.dataset.webiaBound = 'true';
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                const value = input.value.trim();
                if (!value) return;
                input.value = '';
                window.__webiaAsk(value);
            });
        });
        document.querySelectorAll('[data-webia-chat-prompt]').forEach(function(button) {
            if (button.dataset.webiaBound) return;
            button.dataset.webiaBound = 'true';
            button.addEventListener('click', function(e) {
                e.preventDefault();
                window.__webiaAsk(button.dataset.webiaChatPrompt || button.textContent || '');
            });
        });
    }

    // Kontrak kompatibilitas untuk template batch lama/baru yang sudah memakai
    // data-chat-*. Adapter ini menangkap event pada fase capture, sehingga
    // FAQ demo bawaan template tidak sempat mengirim jawaban statis.
    function bindLegacyDataChatContract() {
        function messageContainer(form) {
            const panel = form.closest('[data-chat]') || document;
            return panel.querySelector('[data-chat-body], [data-msgs]');
        }

        function addMessage(container, text, role) {
            if (!container) return null;
            const element = document.createElement(container.matches('[data-chat-body]') ? 'div' : 'p');
            element.className = container.matches('[data-chat-body]')
                ? 'hda-msg hda-msg--' + role
                : 'm ' + (role === 'user' ? 'me' : 'bot');
            if (role === 'bot') {
                element.innerHTML = formatWebiaReplyHtml(text);
            } else {
                element.textContent = text;
                element.style.whiteSpace = 'pre-wrap';
            }
            container.appendChild(element);
            container.scrollTop = container.scrollHeight;
            return element;
        }

        async function askNativeDataChat(form, query) {
            if (!query || !query.trim() || form.dataset.webiaBusy === 'true') return;
            const text = query.trim();
            const input = form.querySelector('[data-chat-input], [data-webia-chat-input], input, textarea');
            const container = messageContainer(form);
            const submitters = form.querySelectorAll('button, [type="submit"]');
            form.dataset.webiaBusy = 'true';
            const startedAt = performance.now();
            report('chat_started', { adapter: 'data-chat' });
            submitters.forEach(function(button) { button.disabled = true; });
            addMessage(container, text, 'user');
            const typing = addMessage(container, 'Mengetik jawaban...', 'bot');
            if (typing) typing.style.opacity = '0.7';

            try {
                const data = await sendToAi(text);
                if (typing) typing.remove();
                addMessage(container, data.reply || 'Ada yang bisa kami bantu?', 'bot');
            } catch (error) {
                report('chat_failed', { adapter: 'data-chat', latency_ms: Math.round(performance.now() - startedAt) });
                if (typing) typing.remove();
                const fallback = addMessage(container, 'Mohon maaf, terjadi kendala jaringan. Silakan coba lagi atau hubungi kami via WhatsApp.', 'bot');
                if (fallback) {
                    const retry = document.createElement('button');
                    retry.type = 'button';
                    retry.className = 'webia-chat-retry';
                    retry.textContent = 'Coba lagi';
                    retry.addEventListener('click', function() { askNativeDataChat(form, text); });
                    fallback.appendChild(document.createElement('br'));
                    fallback.appendChild(retry);
                }
            } finally {
                form.dataset.webiaBusy = 'false';
                submitters.forEach(function(button) { button.disabled = false; });
                if (input) input.focus();
            }
        }

        document.querySelectorAll('[data-chat-form]').forEach(function(form) {
            if (form.dataset.webiaLegacyBound) return;
            form.dataset.webiaLegacyBound = 'true';
            form.addEventListener('submit', function(event) {
                event.preventDefault();
                event.stopImmediatePropagation();
                const input = form.querySelector('[data-chat-input], [data-webia-chat-input], input, textarea');
                const value = input ? input.value.trim() : '';
                if (!value) return;
                input.value = '';
                askNativeDataChat(form, value);
            }, true);
        });

        document.addEventListener('click', function(event) {
            const button = event.target.closest('[data-chat-quick] button, [data-chat-sugg] button, button[data-ask]');
            if (!button || button.closest('[data-chat-form]')) return;
            const form = button.closest('[data-chat]')?.querySelector('[data-chat-form]') || document.querySelector('[data-chat-form]');
            const question = button.dataset.ask || button.textContent || '';
            if (!form || !question.trim()) return;
            event.preventDefault();
            event.stopImmediatePropagation();
            askNativeDataChat(form, question);
        }, true);
    }

    async function sendToAi(message) {
        const cleanMessage = String(message || '').trim().slice(0, MAX_INPUT_LENGTH);
        if (!cleanMessage) {
            throw new Error('EMPTY_MESSAGE');
        }
        const res = await fetch(chatUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify({ message: cleanMessage })
        });
        if (!res.ok) throw new Error('HTTP ' + res.status);
        return await res.json();
    }

    // Satu pintu percakapan untuk semua UI chat bawaan template. Beberapa template
    // lama mendefinisikan `ask()` dan chip sendiri; semua input tetap harus melewati
    // endpoint Webia agar jawaban berasal dari L4 RAG tenant, bukan knowledge demo.
    window.__webiaAsk = async function(query) {
        if (!query || !query.trim() || chatBusy) return;
        const text = query.trim();
        setNativeBusy(true);

        if (typeof window.say === 'function') {
            window.say(text, 'u');
        }

        let typingEl = null;
        const ms = document.getElementById('ms') || document.getElementById('msgs');
        if (ms) {
            typingEl = document.createElement('div');
            typingEl.className = 'm b webia-typing-note';
            typingEl.style.cssText = 'opacity:0.75; font-style:italic;';
            typingEl.textContent = 'Mengetik jawaban...';
            ms.appendChild(typingEl);
            ms.scrollTop = ms.scrollHeight;
        }

        try {
            const data = await sendToAi(text);
            if (typingEl) typingEl.remove();
            const reply = data.reply || 'Ada yang bisa kami bantu seputar layanan kami?';
            if (typeof window.say === 'function') window.say(reply, 'b');
            const lastMessage = ms && ms.lastElementChild;
            if (lastMessage) {
                lastMessage.innerHTML = formatWebiaReplyHtml(reply);
            }

            const waLinkEl = document.getElementById('wa') || document.getElementById('cw') || document.getElementById('rw');
            if (waLinkEl) waLinkEl.href = data.whatsapp_url || defaultWaUrl;
        } catch (err) {
            if (typingEl) typingEl.remove();
            if (typeof window.say === 'function') {
                window.say('Mohon maaf, terjadi kendala jaringan. Silakan hubungi kami via WhatsApp.', 'b');
            }
            appendRetry(text, ms);
        } finally {
            setNativeBusy(false);
        }
    };

    // Placeholder yang dipasang bersama HTML dapat menerima klik sebelum
    // berkas bridge external selesai dimuat. Jalankan antrean hanya setelah
    // implementasi AI yang sebenarnya siap agar prompt tidak hilang.
    function drainQueuedPrompts() {
        if (!Array.isArray(window.__webiaAskQueue) || !window.__webiaAskQueue.length) return;
        const queued = window.__webiaAskQueue.splice(0);
        queued.forEach(function(query) { window.__webiaAsk(query); });
    }

    // 1. Hooking untuk template dengan ask(q) & say(t, role)
    function bindAskHook() {
        // Tetap timpa fungsi global untuk template yang memakai window.ask.
        window.ask = window.__webiaAsk;
        report('adapter_bound', { adapter: 'legacy-ask' });

        const cf = document.getElementById('cf');
        const ci = document.getElementById('ci');
        if (cf && ci) {
            const submitNativeChat = function(e) {
                e.preventDefault();
                e.stopImmediatePropagation();
                const v = ci.value.trim();
                if (v) {
                    ci.value = '';
                    window.__webiaAsk(v);
                }
            };
            // Capture menghentikan handler inline/legacy sebelum jawaban template dijalankan.
            cf.addEventListener('submit', submitNativeChat, true);
            cf.onsubmit = submitNativeChat;
        }

        // Chip pada template lama memanggil fungsi `ask` lexical secara langsung.
        // Tangkap di fase capture agar tidak sempat meneruskan ke KB demo template.
        document.addEventListener('click', function(e) {
            const chip = e.target.closest('#cs button, .chips button, #cps button');
            if (!chip) return;
            e.preventDefault();
            e.stopImmediatePropagation();
            window.__webiaAsk(chip.textContent || '');
        }, true);
    }

    if (document.readyState === 'loading') {
        onReady(function() { bindAskHook(); bindDataChatContract(); bindLegacyDataChatContract(); drainQueuedPrompts(); });
    } else {
        bindAskHook();
        bindDataChatContract();
        bindLegacyDataChatContract();
        drainQueuedPrompts();
    }
    report('loaded');
    setTimeout(function() { bindAskHook(); bindDataChatContract(); bindLegacyDataChatContract(); }, 400);

    // 2. Hooking untuk UI chat dengan input #msg, button #send, dan elemen #reply
    onReady( function() {
        const sendBtn = document.getElementById('send');
        const msgInput = document.getElementById('msg');
        const replySmall = document.getElementById('reply');
        if (sendBtn && msgInput) {
            sendBtn.onclick = async function(e) {
                e.preventDefault();
                const text = msgInput.value.trim();
                if (!text) return;
                if (replySmall) replySmall.textContent = 'Menghubungi asisten...';
                try {
                    const data = await sendToAi(text);
                    if (replySmall) replySmall.textContent = data.reply || 'Silakan hubungi WhatsApp kami.';
                    msgInput.value = '';
                } catch(err) {
                    if (replySmall) replySmall.textContent = 'Terjadi kesalahan jaringan.';
                }
            };
        }
    });

    // 3. Hooking untuk UI chat dengan [data-lw-chat-form] dan [data-lw-chat-log]
    onReady( function() {
        const lwForm = document.querySelector('[data-lw-chat-form]');
        const lwLog = document.querySelector('[data-lw-chat-log]');
        const lwInput = document.getElementById('lw-chat-input');
        if (lwForm && lwLog) {
            function addLwMsg(role, text) {
                const el = document.createElement('div');
                el.className = 'lw-msg lw-msg--' + role;
                el.textContent = text;
                lwLog.appendChild(el);
                lwLog.scrollTop = lwLog.scrollHeight;
                return el;
            }

            async function handleLwSend(text) {
                if (!text || !text.trim()) return;
                addLwMsg('user', text.trim());
                const typing = addLwMsg('bot', 'Mengetik jawaban...');
                typing.style.opacity = '0.7';
                try {
                    const data = await sendToAi(text.trim());
                    typing.remove();
                    addLwMsg('bot', data.reply || 'Ada yang bisa kami bantu?');
                } catch (e) {
                    typing.remove();
                    addLwMsg('bot', 'Mohon maaf, terjadi kendala jaringan.');
                }
            }

            lwForm.addEventListener('submit', function(e) {
                e.preventDefault();
                e.stopImmediatePropagation();
                if (lwInput && lwInput.value) {
                    const val = lwInput.value;
                    lwInput.value = '';
                    handleLwSend(val);
                }
            }, true);

            document.querySelectorAll('[data-lw-chat-topic]').forEach(function(btn) {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopImmediatePropagation();
                    const q = this.textContent.trim();
                    handleLwSend(q);
                }, true);
            });
        }
    });

    // 4. Hooking untuk UI chat dengan window.handleAiSubmit & window.appendAiMessage
    function bindAgriHook() {
        if (typeof window.handleAiSubmit === 'function' || document.getElementById('ai-chat-box')) {
            window.handleAiSubmit = async function(event) {
                if (event) event.preventDefault();
                const input = document.getElementById('ai-input');
                if (!input) return;
                const query = input.value.trim();
                if (!query) return;

                if (typeof window.appendAiMessage === 'function') {
                    window.appendAiMessage(query, 'user');
                }
                input.value = '';

                const chatBox = document.getElementById('ai-chat-box');
                let typingDiv = null;
                if (chatBox) {
                    typingDiv = document.createElement('div');
                    typingDiv.className = 'flex items-start gap-3';
                    typingDiv.innerHTML = '<div class="p-3 rounded-2xl rounded-tl-none bg-organic-surface-container-high text-xs italic opacity-75">Mengetik balasan...</div>';
                    chatBox.appendChild(typingDiv);
                    chatBox.scrollTop = chatBox.scrollHeight;
                }

                try {
                    const data = await sendToAi(query);
                    if (typingDiv) typingDiv.remove();
                    if (typeof window.appendAiMessage === 'function') {
                        window.appendAiMessage(data.reply || 'Ada yang bisa kami bantu seputar agrikultur organik?', 'bot');
                    }
                } catch(e) {
                    if (typingDiv) typingDiv.remove();
                    if (typeof window.appendAiMessage === 'function') {
                        window.appendAiMessage('Mohon maaf, terjadi kendala jaringan.', 'bot');
                    }
                }
            };
        }
    }
    setTimeout(bindAgriHook, 400);

    // 5. Hooking untuk UI chat dengan #ascChatForm, #ascChatInput, #ascChatMessages
    onReady( function() {
        const ascForm = document.getElementById('ascChatForm');
        const ascInput = document.getElementById('ascChatInput');
        const ascMsgs = document.getElementById('ascChatMessages');
        if (ascForm && ascMsgs) {
            function addAscBubble(text, isUser) {
                const p = document.createElement('p');
                p.className = 'asc-chat-bubble';
                if (isUser) {
                    p.style.cssText = 'background:var(--asc-primary,#0070f3); color:#fff; align-self:flex-end; border-radius:12px 12px 0 12px; margin-left:auto;';
                }
                p.textContent = text;
                ascMsgs.appendChild(p);
                ascMsgs.scrollTop = ascMsgs.scrollHeight;
                return p;
            }

            async function handleAscChat(text) {
                if (!text || !text.trim()) return;
                addAscBubble(text.trim(), true);
                const typing = addAscBubble('Mengetik jawaban...', false);
                typing.style.opacity = '0.7';
                try {
                    const data = await sendToAi(text.trim());
                    typing.remove();
                    addAscBubble(data.reply || 'Ada yang bisa kami bantu mengenai perawatan gigi Anda?', false);
                } catch(e) {
                    typing.remove();
                    addAscBubble('Mohon maaf, terjadi gangguan jaringan.', false);
                }
            }

            ascForm.addEventListener('submit', function(e) {
                e.preventDefault();
                e.stopImmediatePropagation();
                if (ascInput && ascInput.value) {
                    const q = ascInput.value;
                    ascInput.value = '';
                    handleAscChat(q);
                }
            }, true);

            document.querySelectorAll('.asc-chat-quick button').forEach(function(b) {
                b.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopImmediatePropagation();
                    handleAscChat(this.textContent.trim());
                }, true);
            });
        }
    });

    // 6. Hooking untuk UI chat dengan #lb-chat-form, #lb-chat-input, #lb-messages
    onReady( function() {
        const lbForm = document.getElementById('lb-chat-form');
        const lbInput = document.getElementById('lb-chat-input');
        const lbMsgs = document.getElementById('lb-messages');
        if (lbForm && lbMsgs) {
            function addLbMsg(text, isUser) {
                const div = document.createElement('div');
                div.className = isUser ? 'lb-msg lb-msg-user' : 'lb-msg lb-msg-bot';
                div.style.cssText = isUser ? 'background:var(--lb-blue,#0284c7); color:#fff; align-self:flex-end; border-radius:12px 12px 2px 12px; padding:8px 12px; max-width:85%; margin-bottom:8px;' : 'background:#f1f5f9; color:#0f172a; align-self:flex-start; border-radius:12px 12px 12px 2px; padding:8px 12px; max-width:85%; margin-bottom:8px;';
                div.textContent = text;
                lbMsgs.appendChild(div);
                lbMsgs.scrollTop = lbMsgs.scrollHeight;
                return div;
            }

            async function handleLbChat(text) {
                if (!text || !text.trim()) return;
                addLbMsg(text.trim(), true);
                const typing = addLbMsg('Mengetik jawaban...', false);
                typing.style.opacity = '0.7';
                try {
                    const data = await sendToAi(text.trim());
                    typing.remove();
                    addLbMsg(data.reply || 'Ada yang bisa kami bantu seputar menu seafood?', false);
                } catch(e) {
                    typing.remove();
                    addLbMsg('Mohon maaf, terjadi kendala jaringan.', false);
                }
            }

            lbForm.addEventListener('submit', function(e) {
                e.preventDefault();
                e.stopImmediatePropagation();
                if (lbInput && lbInput.value) {
                    const q = lbInput.value;
                    lbInput.value = '';
                    handleLbChat(q);
                }
            }, true);
        }
    });

    // 7. Hooking untuk UI chat dengan window.handleAiChat, #ai-input, #ai-chat-body
    function bindAryaHook() {
        if (typeof window.handleAiChat === 'function' || document.getElementById('ai-modal-box')) {
            window.handleAiChat = async function(e) {
                if (e) e.preventDefault();
                const input = document.getElementById('ai-input');
                if (!input) return;
                const query = input.value.trim();
                if (!query) return;

                const chatBody = document.getElementById('ai-chat-body');
                if (chatBody) {
                    const userDiv = document.createElement('div');
                    userDiv.className = 'flex gap-3 justify-end';
                    userDiv.innerHTML = '<div class="p-3 bg-arya-ruby-800 text-white rounded text-xs max-w-[80%] leading-relaxed">' + query + '</div>';
                    chatBody.appendChild(userDiv);

                    const typingDiv = document.createElement('div');
                    typingDiv.className = 'flex gap-3';
                    typingDiv.innerHTML = '<div class="p-3 bg-white border border-stone-200 rounded text-xs text-stone-500 italic">Mengetik balasan...</div>';
                    chatBody.appendChild(typingDiv);
                    chatBody.scrollTop = chatBody.scrollHeight;

                    input.value = '';

                    try {
                        const data = await sendToAi(query);
                        typingDiv.remove();
                        const botDiv = document.createElement('div');
                        botDiv.className = 'flex gap-3';
                        botDiv.innerHTML = '<div class="p-3 bg-white border border-stone-200 rounded text-xs text-arya-charcoal-900 leading-relaxed shadow-sm">' + (data.reply || 'Ada yang bisa saya bantu seputar karya tulis saya?') + '</div>';
                        chatBody.appendChild(botDiv);
                        chatBody.scrollTop = chatBody.scrollHeight;
                    } catch(err) {
                        typingDiv.remove();
                    }
                }
            };
        }
    }
    setTimeout(bindAryaHook, 400);

    // 8. Hooking untuk UI chat dengan window.handleAiMessage, #aiChatBox, #aiInput, #chatMessages
    function bindCocoHook() {
        if (typeof window.handleAiMessage === 'function' || document.getElementById('aiChatBox')) {
            window.handleAiMessage = async function(event) {
                if (event) event.preventDefault();
                const input = document.getElementById('aiInput');
                if (!input) return;
                const q = input.value.trim();
                if (!q) return;

                const chatMessages = document.getElementById('chatMessages');
                if (chatMessages) {
                    const uMsg = document.createElement('div');
                    uMsg.className = 'bg-coco-caramel text-white p-3 rounded-2xl rounded-tr-none text-right shadow-sm';
                    uMsg.textContent = q;
                    chatMessages.appendChild(uMsg);

                    const tMsg = document.createElement('div');
                    tMsg.className = 'bg-white p-3 rounded-2xl rounded-tl-none border border-coco-caramel/20 text-coco-dark italic opacity-75';
                    tMsg.textContent = 'ChocoBot sedang mencari info...';
                    chatMessages.appendChild(tMsg);
                    chatMessages.scrollTop = chatMessages.scrollHeight;

                    input.value = '';

                    try {
                        const data = await sendToAi(q);
                        tMsg.remove();
                        const bMsg = document.createElement('div');
                        bMsg.className = 'bg-white p-3 rounded-2xl rounded-tl-none border border-coco-caramel/20 text-coco-dark shadow-sm';
                        bMsg.textContent = data.reply || 'Ada yang bisa saya bantu seputar pengiriman paket Anda?';
                        chatMessages.appendChild(bMsg);
                        chatMessages.scrollTop = chatMessages.scrollHeight;
                    } catch(e) {
                        tMsg.remove();
                    }
                }
            };
        }
    }
    setTimeout(bindCocoHook, 400);

    // 9. Hooking untuk UI chat dengan window.sendChatMessage, #chat-input, #chat-messages
    function bindTerraHook() {
        if (typeof window.sendChatMessage === 'function' || document.getElementById('ai-chat-modal')) {
            window.sendChatMessage = async function() {
                const input = document.getElementById('chat-input');
                if (!input) return;
                const q = input.value.trim();
                if (!q) return;

                const messagesContainer = document.getElementById('chat-messages');
                if (messagesContainer) {
                    const uDiv = document.createElement('div');
                    uDiv.className = 'flex justify-end';
                    uDiv.innerHTML = '<div class="bg-terra-700 text-terra-100 rounded-2xl rounded-tr-none p-3 text-xs max-w-[80%]">' + q + '</div>';
                    messagesContainer.appendChild(uDiv);

                    const tDiv = document.createElement('div');
                    tDiv.className = 'flex justify-start';
                    tDiv.innerHTML = '<div class="bg-terra-800 text-terra-200 border border-terra-700 rounded-2xl rounded-tl-none p-3 text-xs italic">Menyiapkan jawaban desain...</div>';
                    messagesContainer.appendChild(tDiv);
                    messagesContainer.scrollTop = messagesContainer.scrollHeight;

                    input.value = '';

                    try {
                        const data = await sendToAi(q);
                        tDiv.remove();
                        const bDiv = document.createElement('div');
                        bDiv.className = 'flex justify-start';
                        bDiv.innerHTML = '<div class="bg-terra-800 text-terra-100 border border-terra-700 rounded-2xl rounded-tl-none p-3 text-xs max-w-[80%]">' + (data.reply || 'Ada yang bisa saya bantu seputar interior dan furnitur?') + '</div>';
                        messagesContainer.appendChild(bDiv);
                        messagesContainer.scrollTop = messagesContainer.scrollHeight;
                    } catch(e) {
                        tDiv.remove();
                    }
                }
            };
        }
    }
    setTimeout(bindTerraHook, 400);

    // 10. Hooking untuk UI chat dengan #qb button, #ms
    onReady( function() {
        const qb = document.getElementById('qb');
        const ms = document.getElementById('ms');
        if (qb && ms) {
            qb.addEventListener('click', async function(e) {
                const btn = e.target.closest('button');
                if (!btn) return;
                e.preventDefault();
                e.stopImmediatePropagation();
                const q = btn.textContent.trim();

                const uDiv = document.createElement('div');
                uDiv.className = 'm u';
                uDiv.textContent = q;
                ms.appendChild(uDiv);

                const tDiv = document.createElement('div');
                tDiv.className = 'm';
                tDiv.style.opacity = '0.75';
                tDiv.textContent = 'Mengetik balasan...';
                ms.appendChild(tDiv);
                ms.scrollTop = ms.scrollHeight;

                try {
                    const data = await sendToAi(q);
                    tDiv.remove();
                    const bDiv = document.createElement('div');
                    bDiv.className = 'm';
                    bDiv.textContent = data.reply || 'Ada yang bisa kami bantu?';
                    ms.appendChild(bDiv);
                    ms.scrollTop = ms.scrollHeight;
                } catch(err) {
                    tDiv.remove();
                }
            }, true);
        }
    });

    // 11. Hooking untuk UI chat dengan .chips button, #msgs
    onReady( function() {
        const pawChips = document.querySelector('#chat .chips');
        const pawMsgs = document.getElementById('msgs');
        if (pawChips && pawMsgs) {
            pawChips.addEventListener('click', async function(e) {
                const btn = e.target.closest('button');
                if (!btn) return;
                e.preventDefault();
                e.stopImmediatePropagation();
                const q = btn.textContent.trim();

                const uDiv = document.createElement('div');
                uDiv.className = 'm me';
                uDiv.textContent = q;
                pawMsgs.appendChild(uDiv);

                const tDiv = document.createElement('div');
                tDiv.className = 'm bot';
                tDiv.style.opacity = '0.75';
                tDiv.textContent = 'Sedang mencari info hewan...';
                pawMsgs.appendChild(tDiv);
                pawMsgs.scrollTop = pawMsgs.scrollHeight;

                try {
                    const data = await sendToAi(q);
                    tDiv.remove();
                    const bDiv = document.createElement('div');
                    bDiv.className = 'm bot';
                    bDiv.textContent = data.reply || 'Ada yang bisa kami bantu seputar anabul Anda?';
                    pawMsgs.appendChild(bDiv);
                    pawMsgs.scrollTop = pawMsgs.scrollHeight;
                } catch(err) {
                    tDiv.remove();
                }
            }, true);
        }
    });

    // 12. Hooking untuk UI chat dengan .cq button, #msgs
    onReady( function() {
        const hearthCq = document.querySelector('#chat .cq');
        const msgs = document.getElementById('msgs');
        if (hearthCq && msgs) {
            hearthCq.addEventListener('click', async function(e) {
                const btn = e.target.closest('button');
                if (!btn) return;
                e.preventDefault();
                e.stopImmediatePropagation();
                const q = btn.textContent.trim();

                const uDiv = document.createElement('div');
                uDiv.className = 'm me';
                uDiv.textContent = q;
                msgs.appendChild(uDiv);

                const tDiv = document.createElement('div');
                tDiv.className = 'm bot';
                tDiv.style.opacity = '0.75';
                tDiv.textContent = 'Mengecek ketersediaan properti...';
                msgs.appendChild(tDiv);
                msgs.scrollTop = ms.scrollHeight;

                try {
                    const data = await sendToAi(q);
                    tDiv.remove();
                    const bDiv = document.createElement('div');
                    bDiv.className = 'm bot';
                    bDiv.textContent = data.reply || 'Ada yang bisa kami bantu mengenai unit hunian ini?';
                    msgs.appendChild(bDiv);
                    msgs.scrollTop = msgs.scrollHeight;
                } catch(err) {
                    tDiv.remove();
                }
            }, true);
        }
    });

    // 13. Hooking untuk UI chat dengan #ch, [data-q], #ms
    onReady( function() {
        const ch = document.getElementById('ch');
        if (ch) {
            ch.addEventListener('click', async function(e) {
                const btn = e.target.closest('[data-q]');
                if (!btn) return;
                e.preventDefault();
                e.stopImmediatePropagation();
                const q = btn.textContent.trim();

                const msPulse = document.getElementById('ms');
                if (msPulse) {
                    const uP = document.createElement('p');
                    uP.className = 'u';
                    uP.textContent = q;
                    msPulse.appendChild(uP);

                    const tP = document.createElement('p');
                    tP.style.opacity = '0.75';
                    tP.style.fontStyle = 'italic';
                    tP.textContent = 'Pulse AI sedang mengecek program...';
                    msPulse.appendChild(tP);
                    msPulse.scrollTop = msPulse.scrollHeight;

                    try {
                        const data = await sendToAi(q);
                        tP.remove();
                        const bP = document.createElement('p');
                        bP.textContent = data.reply || 'Ada yang ingin ditanyakan seputar latihan dan membership?';
                        msPulse.appendChild(bP);
                        msPulse.scrollTop = msPulse.scrollHeight;
                    } catch(err) {
                        tP.remove();
                    }
                }
            }, true);
        }
    });

    // 14. Hooking untuk UI chat dengan data-chat-form, data-chat-log, data-chat-ask
    onReady( function() {
        const hrForm = document.querySelector('[data-webia-ai-form="home-services"]') || document.querySelector('[data-chat-form]');
        const hrLog = document.querySelector('[data-webia-ai-log="home-services"]') || document.querySelector('[data-chat-log]');
        const hrInput = document.querySelector('[data-webia-ai-input="home-services"]') || document.getElementById('hrChatInput') || document.querySelector('[data-chat-input]');
        if (hrForm && hrLog) {
            function addHrMsg(role, text) {
                const row = document.createElement('div');
                row.className = 'hr-msg hr-msg--' + role;
                const bubble = document.createElement('div');
                bubble.className = 'hr-bubble hr-bubble--' + role;
                bubble.textContent = text;
                row.appendChild(bubble);
                hrLog.appendChild(row);
                hrLog.scrollTop = hrLog.scrollHeight;
                return row;
            }

            async function handleHrSend(text) {
                if (!text || !text.trim()) return;
                addHrMsg('user', text.trim());
                const typing = addHrMsg('bot', 'Menghitung estimasi & jawaban...');
                typing.style.opacity = '0.7';
                try {
                    const data = await sendToAi(text.trim());
                    typing.remove();
                    addHrMsg('bot', data.reply || 'Ada yang bisa kami bantu seputar renovasi rumah?');
                } catch(e) {
                    typing.remove();
                    addHrMsg('bot', 'Mohon maaf, terjadi kendala jaringan.');
                }
            }

            hrForm.addEventListener('submit', function(e) {
                e.preventDefault();
                e.stopImmediatePropagation();
                if (hrInput && hrInput.value) {
                    const q = hrInput.value;
                    hrInput.value = '';
                    handleHrSend(q);
                }
            }, true);

            document.querySelectorAll('[data-chat-ask]').forEach(function(btn) {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopImmediatePropagation();
                    handleHrSend(this.getAttribute('data-chat-ask') || this.textContent.trim());
                }, true);
            });
        }
    });

    // 15. Hooking untuk UI chat dengan #rr-chat-form, #rr-chat-log, #rr-chat-input
    onReady( function() {
        const rrForm = document.getElementById('rr-chat-form');
        const rrLog = document.getElementById('rr-chat-log');
        const rrInput = document.getElementById('rr-chat-input');
        if (rrForm && rrLog) {
            function addRrMsg(role, text) {
                const el = document.createElement('div');
                el.className = 'rr-chat__msg rr-chat__msg--' + role;
                el.textContent = text;
                rrLog.appendChild(el);
                rrLog.scrollTop = rrLog.scrollHeight;
                return el;
            }

            async function handleRrSend(text) {
                if (!text || !text.trim()) return;
                addRrMsg('user', text.trim());
                const typing = addRrMsg('bot', 'Mengetik jawaban...');
                typing.style.opacity = '0.7';
                try {
                    const data = await sendToAi(text.trim());
                    typing.remove();
                    addRrMsg('bot', data.reply || 'Ada yang bisa kami bantu?');
                } catch(e) {
                    typing.remove();
                    addRrMsg('bot', 'Mohon maaf, terjadi kendala jaringan.');
                }
            }

            rrForm.addEventListener('submit', function(e) {
                e.preventDefault();
                e.stopImmediatePropagation();
                if (rrInput && rrInput.value) {
                    const q = rrInput.value;
                    rrInput.value = '';
                    handleRrSend(q);
                }
            }, true);

            document.querySelectorAll('#rr-chat-quick button').forEach(function(btn) {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopImmediatePropagation();
                    handleRrSend(this.textContent.trim());
                }, true);
            });
        }
    });

    // 16. Hooking untuk UI chat dengan .fd-chat__form, .fd-chat__body, .fd-chat__chips button
    onReady( function() {
        const fdForm = document.querySelector('[data-webia-ai-form="nonprofit"]') || document.querySelector('.fd-chat__form');
        const fdBody = document.querySelector('[data-webia-ai-log="nonprofit"]') || document.querySelector('.fd-chat__body');
        const fdInput = document.querySelector('[data-webia-ai-input="nonprofit"]') || (fdForm ? fdForm.querySelector('input') : null);
        if (fdForm && fdBody) {
            function addFdMsg(role, text) {
                const row = document.createElement('div');
                row.className = 'fd-chat__row fd-chat__row--' + role;
                const bubble = document.createElement('div');
                bubble.className = 'fd-chat__bubble';
                bubble.textContent = text;
                row.appendChild(bubble);
                fdBody.appendChild(row);
                fdBody.scrollTop = fdBody.scrollHeight;
                return row;
            }

            async function handleFdSend(text) {
                if (!text || !text.trim()) return;
                addFdMsg('user', text.trim());
                const typing = addFdMsg('bot', 'Menyiapkan info yayasan...');
                typing.style.opacity = '0.7';
                try {
                    const data = await sendToAi(text.trim());
                    typing.remove();
                    addFdMsg('bot', data.reply || 'Ada yang bisa kami bantu seputar program donasi?');
                } catch(e) {
                    typing.remove();
                    addFdMsg('bot', 'Mohon maaf, terjadi gangguan jaringan.');
                }
            }

            fdForm.addEventListener('submit', function(e) {
                e.preventDefault();
                e.stopImmediatePropagation();
                if (fdInput && fdInput.value) {
                    const q = fdInput.value;
                    fdInput.value = '';
                    handleFdSend(q);
                }
            }, true);

            document.querySelectorAll('.fd-chat__chips button').forEach(function(btn) {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopImmediatePropagation();
                    handleFdSend(this.textContent.trim());
                }, true);
            });
        }
    });

    // 17. Hooking untuk UI chat dengan [data-uh-chatbot]
    onReady( function() {
        const uhForm = document.querySelector('[data-webia-ai-form="travel"]') || document.querySelector('[data-uh-chatbot] form') || document.querySelector('.uh-chatwin__form');
        const uhBody = document.querySelector('[data-webia-ai-log="travel"]') || document.querySelector('.uh-chatwin__log') || document.querySelector('[data-uh-chat-log]');
        const uhInput = document.querySelector('[data-webia-ai-input="travel"]') || (uhForm ? uhForm.querySelector('input') : null);
        if (uhForm && uhBody) {
            function addUhMsg(role, text) {
                const row = document.createElement('div');
                row.className = 'uh-chatwin__row uh-chatwin__row--' + role;
                const bubble = document.createElement('div');
                bubble.className = 'uh-chatwin__bubble';
                bubble.textContent = text;
                row.appendChild(bubble);
                uhBody.appendChild(row);
                uhBody.scrollTop = uhBody.scrollHeight;
                return row;
            }

            async function handleUhSend(text) {
                if (!text || !text.trim()) return;
                addUhMsg('user', text.trim());
                const typing = addUhMsg('bot', 'Muthawwif AI sedang mencari rincian paket...');
                typing.style.opacity = '0.7';
                try {
                    const data = await sendToAi(text.trim());
                    typing.remove();
                    addUhMsg('bot', data.reply || 'Ada yang bisa kami bantu seputar keberangkatan umrah & haji?');
                } catch(e) {
                    typing.remove();
                    addUhMsg('bot', 'Mohon maaf, terjadi gangguan jaringan.');
                }
            }

            uhForm.addEventListener('submit', function(e) {
                e.preventDefault();
                e.stopImmediatePropagation();
                if (uhInput && uhInput.value) {
                    const q = uhInput.value;
                    uhInput.value = '';
                    handleUhSend(q);
                }
            }, true);

            document.querySelectorAll('.uh-chatwin__chips button').forEach(function(btn) {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopImmediatePropagation();
                    handleUhSend(this.textContent.trim());
                }, true);
            });
        }
    });

    // 18. Kontrak data-webia-ai-* untuk ArchiBot template arsitektur.
    onReady( function() {
        const form = document.querySelector('[data-webia-ai-form="architecture"]');
        const log = document.querySelector('[data-webia-ai-log="architecture"]');
        const input = document.querySelector('[data-webia-ai-input="architecture"]');
        if (!form || !log || !input) return;

        function addMessage(role, text) {
            const row = document.createElement('div');
            row.className = 'abd-row abd-row--' + role;
            if (role === 'bot') {
                const avatar = document.querySelector('.abd-chat__avatar img');
                if (avatar) {
                    const image = document.createElement('img');
                    image.className = 'abd-row__av';
                    image.src = avatar.src;
                    image.alt = '';
                    image.width = 30;
                    image.height = 30;
                    row.appendChild(image);
                }
            }
            const wrapper = document.createElement('div');
            wrapper.className = 'abd-row__wrap';
            const bubble = document.createElement('div');
            bubble.className = 'abd-msg abd-msg--' + role;
            bubble.textContent = text;
            wrapper.appendChild(bubble);
            row.appendChild(wrapper);
            log.appendChild(row);
            log.scrollTop = log.scrollHeight;
            return row;
        }

        async function submitArchitectureQuestion(value) {
            const question = String(value || '').trim();
            if (!question) return;
            const welcome = document.getElementById('abd-chat-welcome');
            if (welcome) welcome.classList.add('is-collapsed');
            addMessage('user', question);
            const typing = addMessage('bot', 'ArchiBot sedang menyiapkan jawaban...');
            typing.style.opacity = '0.7';
            try {
                const data = await sendToAi(question);
                typing.remove();
                addMessage('bot', data.reply || 'Ada yang bisa kami bantu seputar layanan arsitektur?');
            } catch (error) {
                typing.remove();
                addMessage('bot', 'Mohon maaf, terjadi kendala jaringan. Silakan hubungi kami via WhatsApp.');
            }
        }

        form.addEventListener('submit', function(event) {
            event.preventDefault();
            event.stopImmediatePropagation();
            const question = input.value;
            input.value = '';
            submitArchitectureQuestion(question);
        }, true);

        document.querySelectorAll('[data-webia-ai-prompt="architecture"]').forEach(function(button) {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                event.stopImmediatePropagation();
                const chat = document.getElementById('abd-chat');
                const opener = document.querySelector('[data-chat-open]');
                if (chat && chat.hidden && opener) opener.click();
                submitArchitectureQuestion(button.getAttribute('data-webia-ai-question') || button.textContent);
            }, true);
        });

        const previewForm = document.querySelector('[data-webia-ai-preview-form="architecture"]');
        const previewInput = document.querySelector('[data-webia-ai-preview-input="architecture"]');
        if (previewForm && previewInput) {
            previewForm.addEventListener('submit', function(event) {
                event.preventDefault();
                event.stopImmediatePropagation();
                const question = previewInput.value;
                previewInput.value = '';
                const opener = document.querySelector('[data-chat-open]');
                if (opener) opener.click();
                submitArchitectureQuestion(question);
            }, true);
        }
    });

    // 19. Hooking untuk UI chat dengan [data-bca-chat]
    onReady( function() {
        const bcaChat = document.querySelector('[data-bca-chat]');
        if (bcaChat) {
            const bcaForm = bcaChat.querySelector('form');
            const bcaLog = bcaChat.querySelector('[data-bca-chat-log]');
            const bcaInput = bcaForm ? bcaForm.querySelector('input') : null;

            if (bcaForm && bcaLog) {
                function addBcaMsg(text, role) {
                    const el = document.createElement('div');
                    el.className = 'bca-msg bca-msg--' + role;
                    const p = document.createElement('p');
                    p.textContent = text;
                    el.appendChild(p);
                    bcaLog.appendChild(el);
                    bcaLog.scrollTop = bcaLog.scrollHeight;
                    return el;
                }

                async function handleBcaSend(text) {
                    if (!text || !text.trim()) return;
                    addBcaMsg(text.trim(), 'me');
                    const typing = document.createElement('div');
                    typing.className = 'bca-msg bca-msg--bot';
                    typing.innerHTML = '<span class="bca-typing" aria-label="Sedang mengetik"><i></i><i></i><i></i></span>';
                    bcaLog.appendChild(typing);
                    bcaLog.scrollTop = bcaLog.scrollHeight;

                    try {
                        const data = await sendToAi(text.trim());
                        typing.remove();
                        addBcaMsg(data.reply || 'Ada yang bisa kami bantu seputar project branding Anda?', 'bot');
                    } catch(e) {
                        typing.remove();
                        addBcaMsg('Mohon maaf, terjadi kendala jaringan.', 'bot');
                    }
                }

                bcaForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    e.stopImmediatePropagation();
                    if (bcaInput && bcaInput.value) {
                        const q = bcaInput.value;
                        bcaInput.value = '';
                        handleBcaSend(q);
                    }
                }, true);

                bcaChat.querySelectorAll('[data-bca-quick]').forEach(function(btn) {
                    btn.addEventListener('click', function(e) {
                        e.preventDefault();
                        e.stopImmediatePropagation();
                        const q = this.getAttribute('data-bca-quick') || this.textContent.trim();
                        handleBcaSend(q);
                    }, true);
                });
            }
        }

        // 19. Hooking untuk UI chat dengan #ai-chat-window, #ai-chat-messages, #ai-chat-input
        function bindSodaHook() {
            const sodaWindow = document.getElementById('ai-chat-window');
            const sodaMessages = document.getElementById('ai-chat-messages');
            const sodaInput = document.getElementById('ai-chat-input');
            if (!sodaWindow || !sodaMessages || !sodaInput) return;

            function escapeHtml(str) {
                const div = document.createElement('div');
                div.textContent = str;
                return div.innerHTML;
            }

            async function handleSodaAiSend(text) {
                if (!text || !text.trim()) return;
                const query = text.trim();
                sodaMessages.innerHTML += '<div class="bg-coral text-white p-2.5 rounded-2xl rounded-tr-none ml-8 font-medium">' + escapeHtml(query) + '</div>';
                sodaInput.value = '';
                sodaMessages.scrollTop = sodaMessages.scrollHeight;

                const typing = document.createElement('div');
                typing.className = 'bg-white p-2.5 rounded-2xl rounded-tl-none border border-plum/15 text-cocoa italic opacity-75';
                typing.textContent = 'SodaAI sedang menyusun rekomendasi menu keluarga...';
                sodaMessages.appendChild(typing);
                sodaMessages.scrollTop = sodaMessages.scrollHeight;

                try {
                    const data = await sendToAi(query);
                    typing.remove();
                    const replyDiv = document.createElement('div');
                    replyDiv.className = 'bg-white p-2.5 rounded-2xl rounded-tl-none border border-plum/15 text-cocoa leading-relaxed';
                    replyDiv.innerHTML = data.reply ? data.reply.replace(/\\n/g, '<br>') : 'Ada yang bisa SodaAI bantu seputar meal plan keluarga Anda?';
                    sodaMessages.appendChild(replyDiv);
                } catch (e) {
                    typing.remove();
                    const errDiv = document.createElement('div');
                    errDiv.className = 'bg-white p-2.5 rounded-2xl rounded-tl-none border border-red-200 text-red-600';
                    errDiv.textContent = 'Mohon maaf, terjadi kendala jaringan. Silakan hubungi kami via WhatsApp.';
                    sodaMessages.appendChild(errDiv);
                }
                sodaMessages.scrollTop = sodaMessages.scrollHeight;
            }

            window.handleAIChatSubmit = function(e) {
                if (e) {
                    e.preventDefault();
                    if (typeof e.stopImmediatePropagation === 'function') e.stopImmediatePropagation();
                }
                if (sodaInput && sodaInput.value) {
                    handleSodaAiSend(sodaInput.value);
                }
            };

            window.sendQuickAIPrompt = function(txt) {
                handleSodaAiSend(txt);
            };

            const sodaForm = sodaInput.closest('form');
            if (sodaForm && !sodaForm.dataset.webiaBound) {
                sodaForm.dataset.webiaBound = '1';
                sodaForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    e.stopImmediatePropagation();
                    if (sodaInput && sodaInput.value) {
                        handleSodaAiSend(sodaInput.value);
                    }
                }, true);
            }
        }

        if (document.readyState === 'loading') {
            onReady( bindSodaHook);
        } else {
            bindSodaHook();
        }
        setTimeout(bindSodaHook, 400);
        setTimeout(bindSodaHook, 900);

        // 20. Hooking untuk Swimming School (#ai-chat-window, #ai-messages, #ai-input, askCoachAI)
        function bindTirtaHook() {
            const tirtaMsgs = document.getElementById('ai-messages');
            const tirtaInput = document.getElementById('ai-input');
            if (!tirtaMsgs || !tirtaInput) return;

            async function handleTirtaAiSend(text) {
                if (!text || !text.trim()) return;
                const query = text.trim();

                const uMsg = document.createElement('div');
                uMsg.className = 'bg-aqua text-white p-3 rounded-2xl rounded-tr-none ml-auto max-w-[82%] font-medium shadow-sm';
                uMsg.textContent = query;
                tirtaMsgs.appendChild(uMsg);
                tirtaInput.value = '';
                tirtaMsgs.scrollTop = tirtaMsgs.scrollHeight;

                const typing = document.createElement('div');
                typing.className = 'bg-mint/30 text-navy p-3 rounded-2xl rounded-tl-none mr-auto max-w-[88%] font-medium shadow-sm italic opacity-75';
                typing.textContent = 'Coach Splash sedang mencari info program...';
                tirtaMsgs.appendChild(typing);
                tirtaMsgs.scrollTop = tirtaMsgs.scrollHeight;

                try {
                    const data = await sendToAi(query);
                    typing.remove();
                    const bMsg = document.createElement('div');
                    bMsg.className = 'bg-mint/30 text-navy p-3 rounded-2xl rounded-tl-none mr-auto max-w-[88%] font-medium shadow-sm leading-relaxed';
                    bMsg.innerHTML = (data.reply || 'Ada yang bisa Coach Splash bantu seputar program renang?').replace(/\\n/g, '<br>');
                    tirtaMsgs.appendChild(bMsg);
                } catch(e) {
                    typing.remove();
                    const err = document.createElement('div');
                    err.className = 'bg-red-50 text-red-600 p-2.5 rounded-2xl rounded-tl-none mr-auto max-w-[88%] text-xs';
                    err.textContent = 'Mohon maaf, terjadi kendala jaringan. Silakan hubungi WhatsApp kami.';
                    tirtaMsgs.appendChild(err);
                }
                tirtaMsgs.scrollTop = tirtaMsgs.scrollHeight;
            }

            window.askCoachAI = function(question) {
                handleTirtaAiSend(question);
            };

            const origHandleAIChatSubmit = window.handleAIChatSubmit;
            window.handleAIChatSubmit = function(e) {
                if (e) {
                    e.preventDefault();
                    if (typeof e.stopImmediatePropagation === 'function') e.stopImmediatePropagation();
                }
                if (tirtaInput && tirtaInput.value) {
                    handleTirtaAiSend(tirtaInput.value);
                } else if (typeof origHandleAIChatSubmit === 'function') {
                    origHandleAIChatSubmit(e);
                }
            };

            const tirtaForm = tirtaInput.closest('form');
            if (tirtaForm && !tirtaForm.dataset.webiaBound) {
                tirtaForm.dataset.webiaBound = '1';
                tirtaForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    e.stopImmediatePropagation();
                    if (tirtaInput && tirtaInput.value) {
                        handleTirtaAiSend(tirtaInput.value);
                    }
                }, true);
            }
        }

        if (document.readyState === 'loading') {
            onReady( bindTirtaHook);
        } else {
            bindTirtaHook();
        }
        setTimeout(bindTirtaHook, 400);
        setTimeout(bindTirtaHook, 900);

        // 21. Hooking untuk Museum & Heritage (Aethelgard, Aquaverse - sendAIMessage, #ai-input, #ai-chat-box)
        function bindMuseumHook() {
            const mChatBox = document.getElementById('ai-chat-box');
            const mInput = document.getElementById('ai-input');
            if (!mChatBox || !mInput) return;

            window.sendAIMessage = async function(e) {
                if (e) {
                    e.preventDefault();
                    if (typeof e.stopImmediatePropagation === 'function') e.stopImmediatePropagation();
                }
                const query = mInput.value.trim();
                if (!query) return;

                const uMsg = document.createElement('p');
                uMsg.innerHTML = '<strong>Pengunjung:</strong> ' + query.replace(/</g, '&lt;');
                mChatBox.appendChild(uMsg);
                mInput.value = '';
                mChatBox.scrollTop = mChatBox.scrollHeight;

                const typing = document.createElement('p');
                typing.style.opacity = '0.7';
                typing.style.fontStyle = 'italic';
                typing.textContent = 'Kurator AI sedang mencari arsip sejarah...';
                mChatBox.appendChild(typing);
                mChatBox.scrollTop = mChatBox.scrollHeight;

                try {
                    const data = await sendToAi(query);
                    typing.remove();
                    const bMsg = document.createElement('p');
                    bMsg.innerHTML = '<strong>Panduan AI:</strong> ' + (data.reply || 'Ada artefak atau informasi pameran yang ingin Anda ketahui?').replace(/\\n/g, '<br>');
                    mChatBox.appendChild(bMsg);
                } catch(err) {
                    typing.remove();
                    const errMsg = document.createElement('p');
                    errMsg.style.color = '#ef4444';
                    errMsg.textContent = 'Mohon maaf, terjadi kendala jaringan saat menghubungi Kurator AI.';
                    mChatBox.appendChild(errMsg);
                }
                mChatBox.scrollTop = mChatBox.scrollHeight;
            };

            const mForm = mInput.closest('form');
            if (mForm && !mForm.dataset.webiaBound) {
                mForm.dataset.webiaBound = '1';
                mForm.addEventListener('submit', window.sendAIMessage, true);
            }
        }

        if (document.readyState === 'loading') {
            onReady( bindMuseumHook);
        } else {
            bindMuseumHook();
        }
        setTimeout(bindMuseumHook, 400);
        setTimeout(bindMuseumHook, 900);

        // 22. Adapter eksplisit untuk template Photography & Creative Studio.
        // Template-template ini lahir dengan UI chat yang berbeda-beda; jangan biarkan
        // respons demo bawaan menggantikan percakapan tenant yang sebenarnya.
        function bindPhotographyAiAdapters() {
            function bindInlineChat(inputId, buttonId, replyId) {
                const input = document.getElementById(inputId);
                const button = document.getElementById(buttonId);
                const reply = document.getElementById(replyId);
                if (!input || !button || !reply) return;

                const submit = async function() {
                    const question = input.value.trim();
                    if (!question) {
                        reply.textContent = 'Silakan tulis pertanyaan terlebih dahulu.';
                        return;
                    }

                    button.disabled = true;
                    reply.textContent = 'Mengetik jawaban...';
                    try {
                        const data = await sendToAi(question);
                        reply.textContent = data.reply || 'Ada yang bisa kami bantu?';
                    } catch (error) {
                        reply.textContent = 'Mohon maaf, terjadi kendala jaringan. Silakan hubungi kami via WhatsApp.';
                    } finally {
                        button.disabled = false;
                    }
                };

                button.onclick = submit;
                input.onkeydown = function(event) {
                    if (event.key === 'Enter') {
                        event.preventDefault();
                        submit();
                    }
                };
            }

            // Lumière dan Noir memiliki panel sederhana, tetapi memakai ID berbeda.
            bindInlineChat('chatInput', 'sendChat', 'chatReply');
            bindInlineChat('question', 'send', 'reply');

            // Candy Cloud memakai form dan handler inline sendiri.
            const candyForm = document.querySelector('form[onsubmit*="handleCandyAiSubmit"]');
            const candyInput = document.getElementById('candy-ai-input');
            const candyMessages = document.getElementById('candy-ai-messages');
            if (candyForm && candyInput && candyMessages) {
                candyForm.addEventListener('submit', async function(event) {
                    event.preventDefault();
                    event.stopImmediatePropagation();
                    const question = candyInput.value.trim();
                    if (!question) return;

                    const addMessage = function(text, isUser) {
                        const message = document.createElement('div');
                        message.className = isUser
                            ? 'bg-candy-pink text-white p-3 rounded-2xl rounded-tr-none ml-auto max-w-[85%]'
                            : 'bg-white p-3 rounded-2xl rounded-tl-none border border-candy-pinkLight max-w-[85%] shadow-sm';
                        message.textContent = text;
                        candyMessages.appendChild(message);
                        candyMessages.scrollTop = candyMessages.scrollHeight;
                        return message;
                    };

                    addMessage(question, true);
                    candyInput.value = '';
                    const typing = addMessage('Mengetik jawaban...', false);
                    typing.style.opacity = '0.7';
                    try {
                        const data = await sendToAi(question);
                        typing.remove();
                        addMessage(data.reply || 'Ada yang bisa kami bantu?', false);
                    } catch (error) {
                        typing.remove();
                        addMessage('Mohon maaf, terjadi kendala jaringan. Silakan hubungi kami via WhatsApp.', false);
                    }
                }, true);
            }

            // PusakaMotion memakai fungsi global dan quick prompt sendiri.
            const pusakaInput = document.getElementById('ai-chat-input');
            const pusakaStream = document.getElementById('pusaka-chat-stream');
            if (pusakaInput && pusakaStream) {
                window.sendPusakaMessage = async function() {
                    const question = pusakaInput.value.trim();
                    if (!question) return;

                    const addMessage = function(label, text, user) {
                        const message = document.createElement('div');
                        message.className = user
                            ? 'p-3 rounded-2xl bg-coral-100 border border-coral-200 text-right text-terracotta-900'
                            : 'p-3 rounded-2xl bg-peach-100 border border-coral-200 text-terracotta-900';
                        const strong = document.createElement('strong');
                        strong.textContent = label + ': ';
                        message.appendChild(strong);
                        message.appendChild(document.createTextNode(text));
                        pusakaStream.appendChild(message);
                        pusakaStream.scrollTop = pusakaStream.scrollHeight;
                        return message;
                    };

                    addMessage('Anda', question, true);
                    pusakaInput.value = '';
                    const typing = addMessage('PusakaAI', 'Mengetik jawaban...', false);
                    typing.style.opacity = '0.7';
                    try {
                        const data = await sendToAi(question);
                        typing.remove();
                        addMessage('PusakaAI', data.reply || 'Ada yang bisa kami bantu?', false);
                    } catch (error) {
                        typing.remove();
                        addMessage('PusakaAI', 'Mohon maaf, terjadi kendala jaringan. Silakan hubungi kami via WhatsApp.', false);
                    }
                };
            }

            // AuraMotion mempunyai stream dan fungsi global berbeda dari PusakaMotion.
            const auraInput = document.getElementById('ai-input');
            const auraStream = document.getElementById('chat-stream');
            if (auraInput && auraStream) {
                window.sendChatMessage = async function() {
                    const question = auraInput.value.trim();
                    if (!question) return;

                    const addMessage = function(label, text, user) {
                        const message = document.createElement('div');
                        message.className = user
                            ? 'p-3.5 rounded-2xl bg-champagne-200 border border-champagne-300 text-right text-stone-900'
                            : 'p-3.5 rounded-2xl bg-white border border-champagne-300/80 text-stone-800';
                        const strong = document.createElement('strong');
                        strong.textContent = label + ': ';
                        message.appendChild(strong);
                        message.appendChild(document.createTextNode(text));
                        auraStream.appendChild(message);
                        auraStream.scrollTop = auraStream.scrollHeight;
                        return message;
                    };

                    addMessage('Anda', question, true);
                    auraInput.value = '';
                    const typing = addMessage('AuraMotion AI', 'Mengetik jawaban...', false);
                    typing.style.opacity = '0.7';
                    try {
                        const data = await sendToAi(question);
                        typing.remove();
                        addMessage('AuraMotion AI', data.reply || 'Ada yang bisa kami bantu?', false);
                    } catch (error) {
                        typing.remove();
                        addMessage('AuraMotion AI', 'Mohon maaf, terjadi kendala jaringan. Silakan hubungi kami via WhatsApp.', false);
                    }
                };
            }

            // Peachy sebelumnya hanya menampilkan alert statis. Jadikan tombolnya pintu
            // percakapan yang benar tanpa mengubah desain template yang sudah ada.
            const peachyButton = document.querySelector('.floating-buttons .ai-btn');
            if (peachyButton) {
                peachyButton.onclick = async function() {
                    const question = window.prompt('Apa yang ingin Anda tanyakan?');
                    if (!question || !question.trim()) return;
                    try {
                        const data = await sendToAi(question.trim());
                        window.alert(data.reply || 'Ada yang bisa kami bantu?');
                    } catch (error) {
                        window.alert('Mohon maaf, terjadi kendala jaringan. Silakan hubungi kami via WhatsApp.');
                    }
                };
            }
        }

        bindPhotographyAiAdapters();
        setTimeout(bindPhotographyAiAdapters, 400);
    });
})();
