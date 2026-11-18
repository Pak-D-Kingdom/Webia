/* =========================================
   WEBIA AI ASSISTANT
   Connected to AI Engine Layer 3 (L3 WEBIA)
   Supports local AI server with graceful fallback
========================================= */

(() => {
    const root = document.getElementById("webia-ai");

    if (!root || root.dataset.initialized === "true") return;
    root.dataset.initialized = "true";

    const launcher = root.querySelector("#webia-ai-launcher");
    const panel = root.querySelector("#webia-ai-panel");
    const closeButton = root.querySelector("#webia-ai-close");
    const messages = root.querySelector("#webia-ai-messages");
    const input = root.querySelector("#webia-ai-input");
    const sendButton = root.querySelector("#webia-ai-send");
    const form = root.querySelector("#webia-ai-form");
    const suggestions = root.querySelectorAll("[data-prompt]");

    if (
        !launcher ||
        !panel ||
        !closeButton ||
        !messages ||
        !input ||
        !sendButton ||
        !form
    ) {
        return;
    }

    // Session ID management
    let sessionId = "";
    try {
        sessionId = sessionStorage.getItem("webia_ai_session_id") || "";
        if (!sessionId) {
            sessionId = "sess_webia_" + Math.random().toString(36).substring(2, 10);
            sessionStorage.setItem("webia_ai_session_id", sessionId);
        }
    } catch (e) {
        sessionId = "sess_webia_" + Math.random().toString(36).substring(2, 10);
    }

    const history = [];
    let isSubmitting = false;

    // Open and close the chat panel.
    const setPanelOpen = (isOpen) => {
        panel.classList.toggle("is-open", isOpen);
        panel.setAttribute("aria-hidden", String(!isOpen));
        panel.inert = !isOpen;

        launcher.setAttribute("aria-expanded", String(isOpen));
        launcher.setAttribute(
            "aria-label",
            isOpen ? "Tutup AI Assistant WEBIA" : "Buka AI Assistant WEBIA"
        );

        if (isOpen) {
            scrollToBottom();
            input.focus();
        } else {
            launcher.focus();
        }
    };

    launcher.addEventListener("click", () => {
        setPanelOpen(!panel.classList.contains("is-open"));
    });

    const consultButton = document.getElementById("webia-nav-consult");
    if (consultButton) {
        consultButton.addEventListener("click", () => {
            setPanelOpen(true);
        });
    }

    closeButton.addEventListener("click", () => {
        setPanelOpen(false);
    });

    const scrollToBottom = () => {
        requestAnimationFrame(() => {
            messages.scrollTop = messages.scrollHeight;
        });
    };

    // Enable the send button when the visitor types.
    const updateSendButton = () => {
        sendButton.disabled = isSubmitting || input.value.trim().length === 0;
    };

    input.addEventListener("input", () => {
        input.style.height = "auto";
        input.style.height = `${Math.min(input.scrollHeight, 95)}px`;
        updateSendButton();
    });

    input.addEventListener("keydown", (event) => {
        if (event.key === "Enter" && !event.shiftKey) {
            event.preventDefault();
            if (!sendButton.disabled) {
                sendMessage(input.value);
            }
        }
    });

    // Helper: Markdown parser
    const renderMarkdown = (raw) => {
        if (!raw) return "";
        let str = String(raw)
            .replace(/&/g, "&amp;")
            .replace(/</g, "&lt;")
            .replace(/>/g, "&gt;");

        // Bold
        str = str.replace(/\*\*(.*?)\*\*/g, "<strong>$1</strong>");
        // Italic
        str = str.replace(/(^|[^\*])\*([^\*]+)\*([^\*]|$)/g, "$1<em>$2</em>$3");
        // Inline code
        str = str.replace(/`([^`]+)`/g, "<code>$1</code>");
        // Links: [text](url)
        str = str.replace(/\[([^\]]+)\]\((https?:\/\/[^\)]+)\)/g, '<a href="$2" target="_blank" rel="noopener noreferrer">$1</a>');

        // Lists (unordered)
        str = str.replace(/(?:^[•\-\*]\s+(.+)(?:\r?\n|$))+/gm, (match) => {
            const items = match.trim().split(/\r?\n/).map(line => {
                const content = line.replace(/^[•\-\*]\s+/, "");
                return `<li>${content}</li>`;
            }).join("");
            return `<ul>${items}</ul>`;
        });

        // Convert double newlines to paragraphs
        const paras = str.split(/\n{2,}/).map(p => {
            const trimmed = p.trim();
            if (!trimmed) return "";
            if (trimmed.startsWith("<ul>") && trimmed.endsWith("</ul>")) {
                return trimmed;
            }
            return `<p>${trimmed.replace(/\n/g, "<br>")}</p>`;
        }).filter(Boolean);

        return paras.join("");
    };

    // Helper: Append message to chat container
    const appendMessage = (role, text) => {
        const msg = document.createElement("div");
        msg.className = `webia-ai__message webia-ai__message--${role}`;

        if (role === "assistant") {
            msg.innerHTML = renderMarkdown(text);
        } else {
            msg.textContent = text;
        }

        messages.appendChild(msg);
        scrollToBottom();
        return msg;
    };

    // Typing indicator
    const showTyping = () => {
        if (root.querySelector("#webia-ai-typing")) return;

        const typing = document.createElement("div");
        typing.id = "webia-ai-typing";
        typing.className = "webia-ai__typing";
        typing.setAttribute("aria-label", "AI sedang mengetik...");
        typing.innerHTML = `
            <span class="webia-ai__dot"></span>
            <span class="webia-ai__dot"></span>
            <span class="webia-ai__dot"></span>
        `;
        messages.appendChild(typing);
        scrollToBottom();
    };

    const hideTyping = () => {
        const typing = root.querySelector("#webia-ai-typing");
        if (typing) {
            typing.remove();
        }
    };

    // Send message to AI Engine Layer 3
    const sendMessage = async (rawMessage) => {
        const message = (rawMessage || "").trim();
        if (!message || isSubmitting) return;

        isSubmitting = true;
        input.value = "";
        input.style.height = "auto";
        updateSendButton();

        // 1. Add user message
        appendMessage("user", message);
        history.push({ role: "user", content: message });

        // 2. Show typing indicator
        showTyping();

        // 3. Send request to Layer 3 AI Engine
        const endpoints = [
            window.WEBIA_AI_URL || "http://127.0.0.1:8001/api/v1/chat",
            "http://localhost:8001/api/v1/chat"
        ];

        let reply = "";
        let requestSuccess = false;

        for (const url of endpoints) {
            try {
                const res = await fetch(url, {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "Accept": "application/json",
                        "X-Site-Key": "site_webia_public"
                    },
                    body: JSON.stringify({
                        layer: "l3",
                        session_id: sessionId,
                        messages: history,
                        stream: false
                    })
                });

                if (res.ok) {
                    const data = await res.json();
                    reply =
                        data.message?.content ||
                        data.reply ||
                        data.response ||
                        (data.data && data.data.reply) ||
                        "";

                    if (reply) {
                        requestSuccess = true;
                        break;
                    }
                }
            } catch (err) {
                // Try alternate endpoint if any
            }
        }

        hideTyping();

        if (requestSuccess && reply) {
            appendMessage("assistant", reply);
            history.push({ role: "assistant", content: reply });
        } else {
            // Rollback user message from memory if request failed
            history.pop();
            const waUrl = "https://wa.me/6285850180285?text=" + encodeURIComponent("Halo WEBIA, saya ingin bertanya tentang layanan pembuatan website bisnis.");
            appendMessage(
                "assistant",
                `Mohon maaf, saat ini asisten AI WEBIA sedang offline atau tidak dapat terhubung ke server AI (port 8001). Silakan hubungi kami langsung via [WhatsApp Resmi WEBIA](${waUrl}) untuk informasi paket dan konsultasi gratis.`
            );
        }

        isSubmitting = false;
        updateSendButton();

        if (panel.classList.contains("is-open")) {
            input.focus();
        }
    };

    // Topic suggestions trigger immediate question send
    suggestions.forEach((button) => {
        button.addEventListener("click", () => {
            const prompt = button.dataset.prompt || button.textContent.trim();
            if (prompt) {
                sendMessage(prompt);
            }
        });
    });

    // Form submission
    form.addEventListener("submit", (event) => {
        event.preventDefault();
        sendMessage(input.value);
    });

    // Close the panel with Escape.
    document.addEventListener("keydown", (event) => {
        if (
            event.key === "Escape" &&
            panel.classList.contains("is-open")
        ) {
            setPanelOpen(false);
        }
    });

    updateSendButton();
})();
