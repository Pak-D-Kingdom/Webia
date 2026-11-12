@php
    $bizName = $business['business_name'] ?? 'Toko';
    $waNumber = $whatsapp ?? ($business['whatsapp'] ?? '081234567890');
    $cleanWa = preg_replace('/[^0-9]/', '', $waNumber);
    if (str_starts_with($cleanWa, '0')) {
        $cleanWa = '62' . substr($cleanWa, 1);
    }
    $waChatUrl = "https://wa.me/{$cleanWa}?text=" . rawurlencode("Halo {$bizName}, saya ingin bertanya mengenai layanan dan produk Anda.");

    // Tema Desain Widget AI
    $currentTheme = $widgetTheme ?? 'clean_minimal';
@endphp

<!-- Webia Floating Customer AI Widget (10 Presets Theme Support) -->
<div id="webia-client-ai-widget" class="webia-ai-root theme-{{ $currentTheme }}" data-site-slug="{{ $siteSlug }}" data-chat-url="{{ route('sites.chat', ['order' => $siteSlug]) }}" data-wa-url="{{ $waChatUrl }}">
    <!-- Floating Launcher Button -->
    <button type="button" id="webia-ai-btn" class="webia-ai-launcher" aria-label="Buka Chat AI Asisten {{ $bizName }}">
        <div class="webia-ai-launcher-inner">
            <svg class="webia-ai-general-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M12 2L14.8 8.2L21 11L14.8 13.8L12 20L9.2 13.8L3 11L9.2 8.2L12 2Z"></path>
                <path d="M19 17L19.7 18.7L21.5 19.5L19.7 20.3L19 22L18.3 20.3L16.5 19.5L18.3 18.7L19 17Z"></path>
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
                    <svg class="webia-ai-general-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 2L14.8 8.2L21 11L14.8 13.8L12 20L9.2 13.8L3 11L9.2 8.2L12 2Z"></path>
                        <path d="M19 17L19.7 18.7L21.5 19.5L19.7 20.3L19 22L18.3 20.3L16.5 19.5L18.3 18.7L19 17Z"></path>
                    </svg>
                    <span class="webia-ai-status-dot"></span>
                </div>
                <div class="webia-ai-win-headings">
                    <h3 id="webia-ai-win-title" class="webia-ai-win-biz">{{ $bizName }}</h3>
                    <p class="webia-ai-win-sub">Asisten AI · Siap Membantu 24/7</p>
                </div>
            </div>
            <button type="button" id="webia-ai-close-btn" class="webia-ai-win-close" aria-label="Tutup Percakapan">✕</button>
        </div>

        <!-- Messages Body -->
        <div id="webia-ai-msgs" class="webia-ai-win-body">
            <!-- Initial Greeting -->
            <div class="webia-ai-msg-row webia-ai-row-bot">
                <div class="webia-ai-msg-avatar">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 2L14.8 8.2L21 11L14.8 13.8L12 20L9.2 13.8L3 11L9.2 8.2L12 2Z"></path>
                        <path d="M19 17L19.7 18.7L21.5 19.5L19.7 20.3L19 22L18.3 20.3L16.5 19.5L18.3 18.7L19 17Z"></path>
                    </svg>
                </div>
                <div class="webia-ai-msg-content">
                    <div class="webia-ai-bubble webia-ai-bubble-bot">
                        Halo! Selamat datang di <strong>{{ $bizName }}</strong>. Ada yang bisa kami bantu seputar produk, penawaran, atau layanan kami hari ini? 😊
                    </div>
                    <span class="webia-ai-msg-time">{{ date('H:i') }}</span>
                </div>
            </div>

            <!-- Quick Suggestions Menu -->
            <div class="webia-ai-quick-container" id="webia-ai-chips">
                <div class="webia-ai-quick-header">Pilihan Pertanyaan Cepat:</div>
                <div class="webia-ai-quick-list">
                    <button type="button" class="webia-ai-quick-btn" data-query="Jam operasional dan alamat toko di mana?">
                        <span class="webia-ai-quick-ico">📍</span>
                        <span class="webia-ai-quick-txt">Lokasi & Jam Operasional</span>
                        <span class="webia-ai-quick-arrow">&rsaquo;</span>
                    </button>
                    <button type="button" class="webia-ai-quick-btn" data-query="Apa saja daftar harga dan layanan unggulan?">
                        <span class="webia-ai-quick-ico">💼</span>
                        <span class="webia-ai-quick-txt">Layanan & Daftar Harga</span>
                        <span class="webia-ai-quick-arrow">&rsaquo;</span>
                    </button>
                    <button type="button" class="webia-ai-quick-btn" data-query="Bagaimana cara memesan atau konsultasi?">
                        <span class="webia-ai-quick-ico">💬</span>
                        <span class="webia-ai-quick-txt">Cara Pemesanan & Konsultasi</span>
                        <span class="webia-ai-quick-arrow">&rsaquo;</span>
                    </button>
                </div>
            </div>
        </div>

        <!-- Chat Input Form -->
        <form id="webia-ai-form" class="webia-ai-win-footer">
            @csrf
            <div class="webia-ai-input-bar">
                <input type="text" id="webia-ai-input" class="webia-ai-input" placeholder="Tulis pertanyaan Anda..." maxlength="500" required autocomplete="off">
                <button type="submit" id="webia-ai-send" class="webia-ai-send-btn" aria-label="Kirim Pesan">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="22" y1="2" x2="11" y2="13"></line>
                        <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                    </svg>
                </button>
            </div>
        </form>
    </div>
</div>

<style>
/* ==================== 0. ISOLATION CSS RESET (Mencegah Kebocoran Style Template Induk) ==================== */
.webia-ai-root,
.webia-ai-root *,
.webia-ai-root *::before,
.webia-ai-root *::after {
    box-sizing: border-box !important;
    margin: 0;
    padding: 0;
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif !important;
    text-transform: none !important;
    letter-spacing: normal !important;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}

/* ==================== 1. BASE ROOT & THEME VARIABLES ==================== */
.webia-ai-root {
    position: fixed !important;
    bottom: 24px !important;
    right: 24px !important;
    z-index: 999999 !important;
    line-height: 1.4 !important;

    /* Default Theme (Modern Clean Indigo) */
    --w-primary: linear-gradient(135deg, #4f46e5 0%, #3b82f6 100%);
    --w-primary-shadow: rgba(79, 70, 229, 0.4);
    --w-header-bg: linear-gradient(135deg, #1e1b4b 0%, #312e81 100%);
    --w-header-text: #ffffff;
    --w-header-sub: rgba(255, 255, 255, 0.75);
    --w-user-bubble: #4f46e5;
    --w-user-text: #ffffff;
    --w-bot-bubble: #ffffff;
    --w-bot-text: #0f172a;
    --w-bot-border: #e2e8f0;
    --w-body-bg: #f8fafc;
    --w-chip-bg: #ffffff;
    --w-chip-text: #334155;
    --w-chip-border: #cbd5e1;
    --w-chip-hover-bg: #eef2ff;
    --w-chip-hover-text: #4338ca;
    --w-chip-hover-border: #a5b4fc;
    --w-border-radius: 20px;
    --w-launcher-radius: 9999px;
    --w-avatar-bg: rgba(255, 255, 255, 0.15);
}

/* ==================== 2. 10 PRESET THEMES ==================== */

/* 1. Earthy Cafe & Terracotta */
.webia-ai-root.theme-earthy_cafe {
    --w-primary: linear-gradient(135deg, #8B5A2B 0%, #A0522D 100%);
    --w-primary-shadow: rgba(139, 90, 43, 0.45);
    --w-header-bg: linear-gradient(135deg, #3E2723 0%, #4E342E 100%);
    --w-header-text: #FFF8E7;
    --w-header-sub: rgba(255, 248, 231, 0.75);
    --w-user-bubble: #8B5A2B;
    --w-user-text: #FFF8E7;
    --w-bot-bubble: #FFFFFF;
    --w-bot-text: #3E2723;
    --w-bot-border: #EFEBE9;
    --w-body-bg: #FAF7F2;
    --w-chip-bg: #FFFFFF;
    --w-chip-text: #5D4037;
    --w-chip-border: #D7CCC8;
    --w-chip-hover-bg: #EFEBE9;
    --w-chip-hover-text: #3E2723;
    --w-chip-hover-border: #BCAAA4;
    --w-border-radius: 18px;
    --w-launcher-radius: 9999px;
    --w-avatar-bg: rgba(255, 248, 231, 0.18);
}

/* 2. Ocean Teal & Modern Slate */
.webia-ai-root.theme-ocean_teal {
    --w-primary: linear-gradient(135deg, #0D9488 0%, #0284C7 100%);
    --w-primary-shadow: rgba(13, 148, 136, 0.4);
    --w-header-bg: linear-gradient(135deg, #0F172A 0%, #134E4A 100%);
    --w-header-text: #F0FDFA;
    --w-header-sub: rgba(240, 253, 250, 0.75);
    --w-user-bubble: #0D9488;
    --w-user-text: #FFFFFF;
    --w-bot-bubble: #FFFFFF;
    --w-bot-text: #0F172A;
    --w-bot-border: #CCFBF1;
    --w-body-bg: #F0FDFA;
    --w-chip-bg: #FFFFFF;
    --w-chip-text: #115E59;
    --w-chip-border: #99F6E4;
    --w-chip-hover-bg: #CCFBF1;
    --w-chip-hover-text: #042F2E;
    --w-chip-hover-border: #5EEAD4;
    --w-border-radius: 16px;
    --w-launcher-radius: 9999px;
    --w-avatar-bg: rgba(240, 253, 250, 0.18);
}

/* 3. Luxury Champagne & Gold */
.webia-ai-root.theme-luxury_gold {
    --w-primary: linear-gradient(135deg, #C59B27 0%, #9A7B2C 100%);
    --w-primary-shadow: rgba(197, 155, 39, 0.4);
    --w-header-bg: linear-gradient(135deg, #0A0D14 0%, #171510 100%);
    --w-header-text: #FBF3D5;
    --w-header-sub: rgba(251, 243, 213, 0.75);
    --w-user-bubble: #9A7B2C;
    --w-user-text: #FFFFFF;
    --w-bot-bubble: #FFFFFF;
    --w-bot-text: #1C1917;
    --w-bot-border: #FEF08A;
    --w-body-bg: #FCFBF7;
    --w-chip-bg: #FFFFFF;
    --w-chip-text: #713F12;
    --w-chip-border: #FEF08A;
    --w-chip-hover-bg: #FEF9C3;
    --w-chip-hover-text: #422006;
    --w-chip-hover-border: #FACC15;
    --w-border-radius: 14px;
    --w-launcher-radius: 9999px;
    --w-avatar-bg: rgba(251, 243, 213, 0.2);
}

/* 4. Pastel Rose & Blush */
.webia-ai-root.theme-pastel_rose {
    --w-primary: linear-gradient(135deg, #EC4899 0%, #F43F5E 100%);
    --w-primary-shadow: rgba(236, 72, 153, 0.35);
    --w-header-bg: linear-gradient(135deg, #831843 0%, #9D174D 100%);
    --w-header-text: #FFF1F2;
    --w-header-sub: rgba(255, 241, 242, 0.8);
    --w-user-bubble: #E11D48;
    --w-user-text: #FFFFFF;
    --w-bot-bubble: #FFFFFF;
    --w-bot-text: #4C0519;
    --w-bot-border: #FECDD3;
    --w-body-bg: #FFF5F7;
    --w-chip-bg: #FFFFFF;
    --w-chip-text: #9F1239;
    --w-chip-border: #FECDD3;
    --w-chip-hover-bg: #FFE4E6;
    --w-chip-hover-text: #881337;
    --w-chip-hover-border: #FDA4AF;
    --w-border-radius: 22px;
    --w-launcher-radius: 9999px;
    --w-avatar-bg: rgba(255, 241, 242, 0.22);
}

/* 5. Forest Moss & Botanical */
.webia-ai-root.theme-forest_moss {
    --w-primary: linear-gradient(135deg, #15803D 0%, #047857 100%);
    --w-primary-shadow: rgba(21, 128, 61, 0.4);
    --w-header-bg: linear-gradient(135deg, #064E3B 0%, #022C22 100%);
    --w-header-text: #ECFDF5;
    --w-header-sub: rgba(236, 253, 245, 0.8);
    --w-user-bubble: #15803D;
    --w-user-text: #FFFFFF;
    --w-bot-bubble: #FFFFFF;
    --w-bot-text: #052E16;
    --w-bot-border: #BBF7D0;
    --w-body-bg: #F0FDF4;
    --w-chip-bg: #FFFFFF;
    --w-chip-text: #166534;
    --w-chip-border: #BBF7D0;
    --w-chip-hover-bg: #DCFCE7;
    --w-chip-hover-text: #14532D;
    --w-chip-hover-border: #86EFAC;
    --w-border-radius: 16px;
    --w-launcher-radius: 9999px;
    --w-avatar-bg: rgba(236, 253, 245, 0.18);
}

/* 6. Dark Cyber & Sporty Orange */
.webia-ai-root.theme-dark_cyber {
    --w-primary: linear-gradient(135deg, #EA580C 0%, #F97316 100%);
    --w-primary-shadow: rgba(234, 88, 12, 0.5);
    --w-header-bg: linear-gradient(135deg, #0A0A0A 0%, #171717 100%);
    --w-header-text: #FAFAFA;
    --w-header-sub: rgba(250, 250, 250, 0.7);
    --w-user-bubble: #EA580C;
    --w-user-text: #FFFFFF;
    --w-bot-bubble: #1E1E1E;
    --w-bot-text: #F3F4F6;
    --w-bot-border: #2E2E2E;
    --w-body-bg: #121212;
    --w-chip-bg: #1F1F1F;
    --w-chip-text: #FB923C;
    --w-chip-border: #333333;
    --w-chip-hover-bg: #292524;
    --w-chip-hover-text: #FED7AA;
    --w-chip-hover-border: #EA580C;
    --w-border-radius: 12px;
    --w-launcher-radius: 12px;
    --w-avatar-bg: rgba(234, 88, 12, 0.25);
}
.webia-ai-root.theme-dark_cyber .webia-ai-window {
    background: #171717 !important;
    box-shadow: 0 20px 40px -10px rgba(0, 0, 0, 0.8), 0 0 0 1px #262626 !important;
}
.webia-ai-root.theme-dark_cyber .webia-ai-win-footer {
    background: #171717 !important;
    border-top: 1px solid #262626 !important;
}
.webia-ai-root.theme-dark_cyber .webia-ai-input {
    background: #242424 !important;
    border-color: #383838 !important;
    color: #FAFAFA !important;
}

/* 7. Classic Concierge */
.webia-ai-root.theme-classic_concierge {
    --w-primary: linear-gradient(135deg, #334155 0%, #1E293B 100%);
    --w-primary-shadow: rgba(30, 41, 59, 0.4);
    --w-header-bg: linear-gradient(135deg, #0F172A 0%, #1E293B 100%);
    --w-header-text: #F8FAFC;
    --w-header-sub: rgba(248, 250, 252, 0.7);
    --w-user-bubble: #334155;
    --w-user-text: #FFFFFF;
    --w-bot-bubble: #FFFFFF;
    --w-bot-text: #0F172A;
    --w-bot-border: #CBD5E1;
    --w-body-bg: #F8FAFC;
    --w-chip-bg: #FFFFFF;
    --w-chip-text: #1E293B;
    --w-chip-border: #CBD5E1;
    --w-chip-hover-bg: #E2E8F0;
    --w-chip-hover-text: #0F172A;
    --w-chip-hover-border: #94A3B8;
    --w-border-radius: 10px;
    --w-launcher-radius: 8px;
    --w-avatar-bg: rgba(255, 255, 255, 0.15);
}

/* 8. Frosted Glassmorphism */
.webia-ai-root.theme-frosted_glass {
    --w-primary: linear-gradient(135deg, rgba(99, 102, 241, 0.9) 0%, rgba(168, 85, 247, 0.9) 100%);
    --w-primary-shadow: rgba(99, 102, 241, 0.35);
    --w-header-bg: linear-gradient(135deg, rgba(30, 27, 75, 0.94) 0%, rgba(76, 29, 149, 0.94) 100%);
    --w-header-text: #FFFFFF;
    --w-header-sub: rgba(255, 255, 255, 0.8);
    --w-user-bubble: #6366F1;
    --w-user-text: #FFFFFF;
    --w-bot-bubble: rgba(255, 255, 255, 0.92);
    --w-bot-text: #1E1B4B;
    --w-bot-border: rgba(255, 255, 255, 0.7);
    --w-body-bg: rgba(245, 243, 255, 0.85);
    --w-chip-bg: rgba(255, 255, 255, 0.9);
    --w-chip-text: #4F46E5;
    --w-chip-border: #C7D2FE;
    --w-chip-hover-bg: #EEF2FF;
    --w-chip-hover-text: #3730A3;
    --w-chip-hover-border: #818CF8;
    --w-border-radius: 20px;
    --w-launcher-radius: 9999px;
    --w-avatar-bg: rgba(255, 255, 255, 0.25);
}
.webia-ai-root.theme-frosted_glass .webia-ai-window {
    backdrop-filter: blur(16px) !important;
    -webkit-backdrop-filter: blur(16px) !important;
}

/* 9. Clean Minimalist */
.webia-ai-root.theme-clean_minimal {
    --w-primary: linear-gradient(135deg, #18181B 0%, #27272A 100%);
    --w-primary-shadow: rgba(0, 0, 0, 0.25);
    --w-header-bg: linear-gradient(135deg, #18181B 0%, #27272A 100%);
    --w-header-text: #FFFFFF;
    --w-header-sub: rgba(255, 255, 255, 0.7);
    --w-user-bubble: #18181B;
    --w-user-text: #FFFFFF;
    --w-bot-bubble: #FFFFFF;
    --w-bot-text: #18181B;
    --w-bot-border: #E4E4E7;
    --w-body-bg: #F4F4F5;
    --w-chip-bg: #FFFFFF;
    --w-chip-text: #27272A;
    --w-chip-border: #E4E4E7;
    --w-chip-hover-bg: #F4F4F5;
    --w-chip-hover-text: #09090B;
    --w-chip-hover-border: #D4D4D8;
    --w-border-radius: 16px;
    --w-launcher-radius: 9999px;
    --w-avatar-bg: rgba(255, 255, 255, 0.15);
}

/* 10. Citrus Pop & Playful */
.webia-ai-root.theme-citrus_playful {
    --w-primary: linear-gradient(135deg, #F97316 0%, #FBBF24 100%);
    --w-primary-shadow: rgba(249, 115, 22, 0.4);
    --w-header-bg: linear-gradient(135deg, #C2410C 0%, #D97706 100%);
    --w-header-text: #FFFFFF;
    --w-header-sub: rgba(255, 255, 255, 0.85);
    --w-user-bubble: #EA580C;
    --w-user-text: #FFFFFF;
    --w-bot-bubble: #FFFFFF;
    --w-bot-text: #78350F;
    --w-bot-border: #FDE68A;
    --w-body-bg: #FFFBEB;
    --w-chip-bg: #FFFFFF;
    --w-chip-text: #92400E;
    --w-chip-border: #FDE68A;
    --w-chip-hover-bg: #FEF3C7;
    --w-chip-hover-text: #78350F;
    --w-chip-hover-border: #FBBF24;
    --w-border-radius: 20px;
    --w-launcher-radius: 9999px;
    --w-avatar-bg: rgba(255, 255, 255, 0.2);
}

/* ==================== 3. FLOATING LAUNCHER BUTTON ==================== */
.webia-ai-launcher {
    position: relative !important;
    background: var(--w-primary) !important;
    color: #ffffff !important;
    border: none !important;
    border-radius: var(--w-launcher-radius) !important;
    padding: 12px 20px !important;
    display: inline-flex !important;
    align-items: center !important;
    justify-content: center !important;
    cursor: pointer !important;
    box-shadow: 0 10px 25px -5px var(--w-primary-shadow), 0 8px 10px -6px var(--w-primary-shadow) !important;
    transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1) !important;
    user-select: none !important;
    outline: none !important;
}
.webia-ai-launcher:hover {
    transform: translateY(-2px) scale(1.02) !important;
    box-shadow: 0 16px 32px -4px var(--w-primary-shadow) !important;
}
.webia-ai-launcher-inner {
    display: flex !important;
    align-items: center !important;
    gap: 8px !important;
    font-size: 13.5px !important;
    font-weight: 700 !important;
    letter-spacing: 0.02em !important;
    line-height: 1 !important;
}
.webia-ai-general-icon {
    width: 17px !important;
    height: 17px !important;
    display: inline-block !important;
    flex-shrink: 0 !important;
}
.webia-ai-pulse-ring {
    position: absolute !important;
    top: -2px !important;
    right: -2px !important;
    width: 12px !important;
    height: 12px !important;
    background: #10b981 !important;
    border: 2px solid #ffffff !important;
    border-radius: 9999px !important;
}

/* ==================== 4. CHAT WINDOW MODAL ==================== */
.webia-ai-window {
    position: fixed !important;
    bottom: 86px !important;
    right: 24px !important;
    width: 380px !important;
    max-width: calc(100vw - 32px) !important;
    height: 540px !important;
    max-height: calc(100vh - 110px) !important;
    background: #ffffff !important;
    border-radius: var(--w-border-radius, 20px) !important;
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25), 0 0 0 1px rgba(0, 0, 0, 0.06) !important;
    display: flex !important;
    flex-direction: column !important;
    overflow: hidden !important;
    animation: webiaAiSlideUp 0.25s cubic-bezier(0.16, 1, 0.3, 1) forwards !important;
}
.webia-ai-window.hidden {
    display: none !important;
}

@keyframes webiaAiSlideUp {
    from { opacity: 0; transform: translateY(16px) scale(0.97); }
    to { opacity: 1; transform: translateY(0) scale(1); }
}

/* Header */
.webia-ai-win-header {
    background: var(--w-header-bg) !important;
    color: var(--w-header-text) !important;
    padding: 14px 16px !important;
    display: flex !important;
    flex-direction: row !important;
    align-items: center !important;
    justify-content: space-between !important;
    min-height: 64px !important;
    flex-shrink: 0 !important;
}
.webia-ai-win-info {
    display: flex !important;
    flex-direction: row !important;
    align-items: center !important;
    gap: 12px !important;
    min-width: 0 !important;
    flex: 1 !important;
}
.webia-ai-avatar {
    position: relative !important;
    width: 38px !important;
    height: 38px !important;
    background: var(--w-avatar-bg) !important;
    border-radius: 12px !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    flex-shrink: 0 !important;
    color: var(--w-header-text) !important;
}
.webia-ai-avatar .webia-ai-general-icon {
    width: 20px !important;
    height: 20px !important;
}
.webia-ai-status-dot {
    position: absolute !important;
    bottom: -1px !important;
    right: -1px !important;
    width: 10px !important;
    height: 10px !important;
    background: #10b981 !important;
    border: 2px solid rgba(0, 0, 0, 0.25) !important;
    border-radius: 9999px !important;
}
.webia-ai-win-headings {
    display: flex !important;
    flex-direction: column !important;
    min-width: 0 !important;
}
.webia-ai-win-biz {
    font-size: 14px !important;
    font-weight: 700 !important;
    color: var(--w-header-text) !important;
    white-space: nowrap !important;
    overflow: hidden !important;
    text-overflow: ellipsis !important;
    line-height: 1.25 !important;
    margin: 0 !important;
    padding: 0 !important;
}
.webia-ai-win-sub {
    font-size: 11px !important;
    color: var(--w-header-sub) !important;
    line-height: 1.2 !important;
    margin-top: 2px !important;
}
.webia-ai-win-close {
    background: transparent !important;
    border: none !important;
    color: var(--w-header-sub) !important;
    font-size: 16px !important;
    cursor: pointer !important;
    width: 30px !important;
    height: 30px !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    border-radius: 8px !important;
    transition: background 0.15s ease !important;
    padding: 0 !important;
    margin: 0 !important;
    flex-shrink: 0 !important;
    outline: none !important;
}
.webia-ai-win-close:hover {
    background: rgba(255, 255, 255, 0.18) !important;
    color: var(--w-header-text) !important;
}

/* ==================== 5. CHAT MESSAGES BODY (Modern & Presisi) ==================== */
.webia-ai-win-body {
    flex: 1 1 auto !important;
    min-height: 0 !important;
    padding: 16px 14px !important;
    overflow-y: auto !important;
    background: var(--w-body-bg) !important;
    display: flex !important;
    flex-direction: column !important;
    gap: 14px !important;
}
.webia-ai-win-body::-webkit-scrollbar {
    width: 5px;
}
.webia-ai-win-body::-webkit-scrollbar-track {
    background: transparent;
}
.webia-ai-win-body::-webkit-scrollbar-thumb {
    background: rgba(0, 0, 0, 0.12);
    border-radius: 10px;
}

/* Chat Message Row */
.webia-ai-msg-row {
    display: flex !important;
    flex-direction: row !important;
    gap: 10px !important;
    max-width: 88% !important;
    width: auto !important;
    box-sizing: border-box !important;
    margin: 0 !important;
}
.webia-ai-msg-row.webia-ai-row-bot {
    align-self: flex-start !important;
    align-items: flex-start !important;
}
.webia-ai-msg-row.webia-ai-row-user {
    align-self: flex-end !important;
    align-items: flex-end !important;
    justify-content: flex-end !important;
}

/* Avatar beside bot message */
.webia-ai-msg-avatar {
    width: 30px !important;
    height: 30px !important;
    border-radius: 50% !important;
    background: var(--w-user-bubble) !important;
    color: #ffffff !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    flex-shrink: 0 !important;
    margin-top: 2px !important;
    margin-bottom: 0 !important;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.12) !important;
}
.webia-ai-msg-avatar svg {
    width: 15px !important;
    height: 15px !important;
}

.webia-ai-msg-content {
    display: flex !important;
    flex-direction: column !important;
    min-width: 0 !important;
    flex: 1 1 auto !important;
    width: 100% !important;
}
.webia-ai-row-user .webia-ai-msg-content {
    align-items: flex-end !important;
}
.webia-ai-row-bot .webia-ai-msg-content {
    align-items: flex-start !important;
}

.webia-ai-bubble {
    display: inline-block !important;
    width: auto !important;
    max-width: 100% !important;
    min-width: 40px !important;
    min-height: 0 !important;
    height: auto !important;
    padding: 11px 14px !important;
    border-radius: 16px !important;
    font-size: 13px !important;
    line-height: 1.55 !important;
    word-break: break-word !important;
    overflow-wrap: break-word !important;
    white-space: pre-line !important;
    box-sizing: border-box !important;
}
.webia-ai-bubble * {
    font-size: inherit !important;
    line-height: inherit !important;
}
.webia-ai-bubble strong,
.webia-ai-bubble b {
    font-weight: 700 !important;
}

.webia-ai-bubble.webia-ai-bubble-bot {
    background: var(--w-bot-bubble) !important;
    color: var(--w-bot-text) !important;
    border-top-left-radius: 4px !important;
    border-bottom-left-radius: 16px !important;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05) !important;
    border: 1px solid var(--w-bot-border) !important;
    text-align: left !important;
}
.webia-ai-bubble.webia-ai-bubble-user {
    background: var(--w-user-bubble) !important;
    color: var(--w-user-text) !important;
    border-top-right-radius: 4px !important;
    border-bottom-right-radius: 16px !important;
    box-shadow: 0 3px 10px var(--w-primary-shadow) !important;
    text-align: left !important;
}

.webia-ai-msg-time {
    font-size: 10px !important;
    color: #94a3b8 !important;
    margin-top: 3px !important;
    padding: 0 2px !important;
    line-height: 1 !important;
    display: block !important;
}

/* Quick Action Suggestion Menu */
.webia-ai-quick-container {
    background: #ffffff !important;
    border: 1px solid #e2e8f0 !important;
    border-radius: 14px !important;
    padding: 12px 12px 10px !important;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04) !important;
    display: flex !important;
    flex-direction: column !important;
    gap: 8px !important;
    width: 100% !important;
    box-sizing: border-box !important;
}
.webia-ai-quick-header {
    font-size: 11px !important;
    font-weight: 700 !important;
    color: #64748b !important;
    text-transform: uppercase !important;
    letter-spacing: 0.04em !important;
    padding-left: 2px !important;
}
.webia-ai-quick-list {
    display: flex !important;
    flex-direction: column !important;
    gap: 6px !important;
}
.webia-ai-quick-btn {
    display: flex !important;
    align-items: center !important;
    width: 100% !important;
    gap: 8px !important;
    padding: 9px 12px !important;
    background: var(--w-body-bg) !important;
    border: 1px solid #e2e8f0 !important;
    border-radius: 10px !important;
    color: #1e293b !important;
    font-size: 12.5px !important;
    font-weight: 600 !important;
    cursor: pointer !important;
    transition: all 0.15s ease !important;
    text-align: left !important;
    box-sizing: border-box !important;
    outline: none !important;
}
.webia-ai-quick-btn:hover {
    background: #ffffff !important;
    border-color: var(--w-user-bubble) !important;
    color: var(--w-user-bubble) !important;
    transform: translateX(2px) !important;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05) !important;
}
.webia-ai-quick-ico {
    font-size: 14px !important;
    flex-shrink: 0 !important;
}
.webia-ai-quick-txt {
    flex: 1 !important;
    white-space: nowrap !important;
    overflow: hidden !important;
    text-overflow: ellipsis !important;
}
.webia-ai-quick-arrow {
    font-size: 16px !important;
    line-height: 1 !important;
    color: #94a3b8 !important;
    transition: transform 0.15s ease, color 0.15s ease !important;
}
.webia-ai-quick-btn:hover .webia-ai-quick-arrow {
    transform: translateX(2px) !important;
    color: var(--w-user-bubble) !important;
}

/* Zero Lost Lead Fallback Box */
.webia-ai-fallback-box {
    background: #fffbeb !important;
    border: 1px solid #fcd34d !important;
    border-radius: 12px !important;
    padding: 12px !important;
    margin-top: 8px !important;
    font-size: 12.5px !important;
    color: #92400e !important;
    line-height: 1.5 !important;
    box-sizing: border-box !important;
}
.webia-ai-fallback-box strong {
    font-size: 13px !important;
    display: block !important;
    margin-bottom: 2px !important;
}
.webia-ai-wa-btn {
    display: inline-flex !important;
    align-items: center !important;
    justify-content: center !important;
    gap: 6px !important;
    width: 100% !important;
    margin-top: 10px !important;
    background: #25d366 !important;
    color: #ffffff !important;
    text-decoration: none !important;
    font-weight: 700 !important;
    font-size: 12.5px !important;
    padding: 9px 14px !important;
    border-radius: 10px !important;
    box-shadow: 0 3px 8px rgba(37, 211, 102, 0.35) !important;
    transition: opacity 0.15s ease !important;
    box-sizing: border-box !important;
}
.webia-ai-wa-btn:hover {
    opacity: 0.92 !important;
}

/* Typing Indicator Animation */
.webia-ai-typing {
    display: inline-flex !important;
    align-items: center !important;
    gap: 4px !important;
    padding: 10px 14px !important;
    background: var(--w-bot-bubble) !important;
    border: 1px solid var(--w-bot-border) !important;
    border-radius: 14px !important;
    border-bottom-left-radius: 4px !important;
    width: fit-content !important;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05) !important;
}
.webia-ai-typing span {
    width: 6px !important;
    height: 6px !important;
    background: #94a3b8 !important;
    border-radius: 50% !important;
    display: inline-block !important;
    animation: webiaDotPulse 1.2s infinite ease-in-out !important;
}
.webia-ai-typing span:nth-child(2) { animation-delay: 0.2s !important; }
.webia-ai-typing span:nth-child(3) { animation-delay: 0.4s !important; }
@keyframes webiaDotPulse {
    0%, 80%, 100% { transform: scale(0.6); opacity: 0.4; }
    40% { transform: scale(1); opacity: 1; }
}

/* ==================== 6. INPUT FORM FOOTER (Presisi & Rapi) ==================== */
.webia-ai-win-footer {
    padding: 10px 14px 12px !important;
    background: #ffffff !important;
    border-top: 1px solid #f1f5f9 !important;
    flex-shrink: 0 !important;
    margin: 0 !important;
    box-sizing: border-box !important;
    display: flex !important;
    flex-direction: column !important;
}
.webia-ai-win-footer input[type="hidden"] {
    display: none !important;
}
.webia-ai-input-bar {
    display: flex !important;
    align-items: center !important;
    gap: 6px !important;
    background: #f8fafc !important;
    border: 1.5px solid #e2e8f0 !important;
    border-radius: 9999px !important;
    padding: 3px 4px 3px 14px !important;
    box-sizing: border-box !important;
    transition: all 0.2s ease !important;
}
.webia-ai-input-bar:focus-within {
    border-color: var(--w-user-bubble) !important;
    background: #ffffff !important;
    box-shadow: 0 0 0 3px var(--w-primary-shadow) !important;
}
.webia-ai-input {
    flex: 1 1 auto !important;
    min-width: 0 !important;
    height: 36px !important;
    line-height: 36px !important;
    border: none !important;
    background: transparent !important;
    font-size: 13px !important;
    color: #0f172a !important;
    outline: none !important;
    padding: 0 !important;
    margin: 0 !important;
    box-sizing: border-box !important;
}
.webia-ai-send-btn {
    flex: 0 0 34px !important;
    width: 34px !important;
    height: 34px !important;
    border-radius: 9999px !important;
    border: none !important;
    background: var(--w-user-bubble) !important;
    color: #ffffff !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    cursor: pointer !important;
    margin: 0 !important;
    padding: 0 !important;
    box-sizing: border-box !important;
    transition: opacity 0.15s ease, transform 0.1s ease !important;
    outline: none !important;
}
.webia-ai-send-btn svg {
    width: 15px !important;
    height: 15px !important;
    display: block !important;
    margin: 0 auto !important;
}
.webia-ai-send-btn:hover {
    opacity: 0.9 !important;
    transform: scale(1.05) !important;
}
.webia-ai-send-btn:disabled {
    background: #cbd5e1 !important;
    cursor: not-allowed !important;
    transform: none !important;
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
            if (!win.classList.contains('hidden')) {
                input.focus();
            }
        } else if (show) {
            win.classList.remove('hidden');
            input.focus();
        } else {
            win.classList.add('hidden');
        }
    }

    if (btn) btn.addEventListener('click', () => toggleChat());
    if (closeBtn) closeBtn.addEventListener('click', () => toggleChat(false));

    function formatMessageText(text) {
        if (!text) return '';
        // Escape HTML
        let safe = text.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;");
        // Format **bold**
        safe = safe.replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>');
        return safe;
    }

    function appendMessage(text, role, timeStr, fallbackBoxHtml = '') {
        const row = document.createElement('div');
        row.className = `webia-ai-msg-row webia-ai-row-${role}`;

        if (role === 'bot') {
            const avatar = document.createElement('div');
            avatar.className = 'webia-ai-msg-avatar';
            avatar.innerHTML = `<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2L14.8 8.2L21 11L14.8 13.8L12 20L9.2 13.8L3 11L9.2 8.2L12 2Z"></path><path d="M19 17L19.7 18.7L21.5 19.5L19.7 20.3L19 22L18.3 20.3L16.5 19.5L18.3 18.7L19 17Z"></path></svg>`;
            row.appendChild(avatar);
        }

        const content = document.createElement('div');
        content.className = 'webia-ai-msg-content';

        const bubble = document.createElement('div');
        bubble.className = `webia-ai-bubble webia-ai-bubble-${role}`;
        bubble.innerHTML = (role === 'bot') ? formatMessageText(text) : document.createTextNode(text).textContent;
        content.appendChild(bubble);

        if (fallbackBoxHtml) {
            const fb = document.createElement('div');
            fb.innerHTML = fallbackBoxHtml;
            content.appendChild(fb);
        }

        const timeSpan = document.createElement('span');
        timeSpan.className = 'webia-ai-msg-time';
        timeSpan.innerText = timeStr || new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
        content.appendChild(timeSpan);

        row.appendChild(content);
        msgs.appendChild(row);
        msgs.scrollTop = msgs.scrollHeight;
    }

    function showTyping() {
        const t = document.createElement('div');
        t.id = 'webia-typing-indicator';
        t.className = 'webia-ai-msg-row webia-ai-row-bot';
        t.innerHTML = `
            <div class="webia-ai-msg-avatar">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2L14.8 8.2L21 11L14.8 13.8L12 20L9.2 13.8L3 11L9.2 8.2L12 2Z"></path><path d="M19 17L19.7 18.7L21.5 19.5L19.7 20.3L19 22L18.3 20.3L16.5 19.5L18.3 18.7L19 17Z"></path></svg>
            </div>
            <div class="webia-ai-msg-content">
                <div class="webia-ai-typing"><span></span><span></span><span></span></div>
            </div>
        `;
        msgs.appendChild(t);
        msgs.scrollTop = msgs.scrollHeight;
    }

    function hideTyping() {
        const t = document.getElementById('webia-typing-indicator');
        if (t) t.remove();
    }

    async function handleSendMessage(text) {
        if (!text || !text.trim()) return;
        const userQuery = text.trim();

        // 1. Tampilkan pesan user
        appendMessage(userQuery, 'user');
        input.value = '';
        input.disabled = true;
        sendBtn.disabled = true;
        showTyping();

        // Sembunyikan quick suggestion chips setelah chat pertama
        const chips = document.getElementById('webia-ai-chips');
        if (chips) chips.style.display = 'none';

        try {
            const csrfToken = document.querySelector('input[name="_token"]')?.value || '';
            const res = await fetch(chatUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                },
                body: JSON.stringify({ message: userQuery })
            });

            hideTyping();
            const data = await res.json();

            if (data.status === 'quota_exhausted') {
                // Kuota AI Habis: Tampilkan fallback Zero Lost Lead ke WhatsApp
                const waUrl = data.whatsapp_url || defaultWaUrl;
                const fbHtml = `
                    <div class="webia-ai-fallback-box">
                        <strong>⚠️ Asisten AI Sedang Sibuk</strong>
                        <p style="margin: 4px 0 0 0;">Hubungi kami langsung via WhatsApp untuk respon cepat:</p>
                        <a href="${waUrl}" target="_blank" class="webia-ai-wa-btn">
                            Hubungi via WhatsApp &rarr;
                        </a>
                    </div>
                `;
                appendMessage(data.reply || 'Mohon maaf, kuota pesan asisten kami sedang penuh.', 'bot', null, fbHtml);
            } else if (data.status === 'success') {
                appendMessage(data.reply, 'bot');
            } else {
                appendMessage('Terima kasih atas pertanyaannya. Hubungi WhatsApp kami jika membutuhkan bantuan darurat.', 'bot');
            }
        } catch (err) {
            hideTyping();
            appendMessage('Mohon maaf, terjadi kendala koneksi ke server asisten. Silakan tanyakan kembali atau hubungi WhatsApp kami.', 'bot');
        } finally {
            input.disabled = false;
            sendBtn.disabled = false;
            input.focus();
        }
    }

    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            handleSendMessage(input.value);
        });
    }

    // Quick action / chips click listener
    document.querySelectorAll('.webia-ai-quick-btn, .webia-ai-chip').forEach(btn => {
        btn.addEventListener('click', function() {
            const q = this.getAttribute('data-query');
            if (q) handleSendMessage(q);
        });
    });
})();
</script>