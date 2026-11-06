
document.addEventListener('DOMContentLoaded', () => {
    const config = window.PETBASE_CONFIG || {};
    const phone = String(config.whatsappNumber || '').replace(/\D/g, '');

    function contactWhatsApp(message) {
        if (!phone) {
            alert('Nomor WhatsApp toko belum dikonfigurasi.');
            return;
        }

        const url = `https://wa.me/${phone}?text=${encodeURIComponent(message)}`;
        window.open(url, '_blank', 'noopener,noreferrer');
    }

    document.getElementById('pbWhatsAppButton')
        ?.addEventListener('click', () => {
            contactWhatsApp(
                'Hello PetBase! I would like to ask about your pet products, prices, and stock availability.'
            );
        });

    document.getElementById('pbWholesaleButton')
        ?.addEventListener('click', () => {
            contactWhatsApp(
                'Hello PetBase! I am interested in wholesale or bulk orders. Could you share the available products, minimum order requirements, and pricing?'
            );
        });

    document.getElementById('pbFaqContact')
        ?.addEventListener('click', () => {
            contactWhatsApp(
                'Hello PetBase! I have a question about your products or ordering process. Could your team help me?'
            );
        });

    document.getElementById('pbFooterContact')
        ?.addEventListener('click', () => {
            contactWhatsApp(
                'Hello PetBase! I would like to contact your customer service team.'
            );
        });

    document.getElementById('pbChatbotButton')
        ?.addEventListener('click', () => {
            alert(
                'PetBase AI Assistant will be connected after the chatbot integration is configured.'
            );
        });
});
