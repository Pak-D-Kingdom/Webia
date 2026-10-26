
document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('bbAiForm');
    const input = document.getElementById('bbAiInput');
    const messages = document.getElementById('bbAiMessages');
    const suggestions = document.querySelector('.bb-ai-suggestion-list');

    if (!form || !input || !messages) return;

    // Jawaban demo. Sesuaikan dengan informasi bisnis yang sebenarnya.
    const faq = [
        {
            keywords: ['treatment', 'layanan', 'perawatan', 'facial'],
            answer: 'Kami menyediakan berbagai pilihan perawatan kecantikan. Silakan lihat bagian Treatments untuk mengetahui layanan yang tersedia. Untuk rekomendasi sesuai kebutuhan kulit, konsultasikan dengan tenaga profesional.'
        },
        {
            keywords: ['harga', 'biaya', 'tarif', 'berapa'],
            answer: 'Harga layanan dapat kamu lihat di bagian daftar treatment dan harga pada halaman ini. Jika harga belum tercantum atau membutuhkan informasi terbaru, silakan hubungi tim kami melalui WhatsApp.'
        },
        {
            keywords: ['booking', 'appointment', 'reservasi', 'jadwal', 'daftar'],
            answer: 'Kamu bisa melakukan booking melalui formulir appointment pada halaman ini atau menghubungi kami melalui WhatsApp. Tim kami akan membantu mengonfirmasi jadwal yang tersedia.'
        },
        {
            keywords: ['skincare', 'produk', 'serum', 'moisturizer', 'sunscreen'],
            answer: 'Pemilihan skincare sebaiknya disesuaikan dengan jenis kulit dan kebutuhanmu. Kamu dapat melihat katalog produk pada halaman ini. Untuk masalah kulit atau reaksi tertentu, mintalah saran dokter kulit.'
        },
        {
            keywords: ['lokasi', 'alamat', 'dimana', 'di mana', 'buka'],
            answer: 'Informasi alamat dan jam operasional perlu disesuaikan dengan data klinik. Silakan hubungi tim kami melalui WhatsApp untuk memastikan lokasi dan jam layanan terbaru.'
        },
        {
            keywords: ['whatsapp', 'kontak', 'hubungi', 'admin'],
            answer: 'Kamu bisa menghubungi tim kami melalui tombol WhatsApp di halaman ini untuk bertanya lebih lanjut mengenai layanan, harga, dan jadwal.'
        }
    ];

    function addMessage(text, sender) {
        const row = document.createElement('div');
        row.className = `bb-ai-message ${sender === 'user' ? 'bb-ai-user' : 'bb-ai-bot'}`;

        if (sender === 'bot') {
            const avatar = document.createElement('span');
            avatar.className = 'bb-ai-message-avatar';
            avatar.textContent = '✦';
            row.appendChild(avatar);
        }

        const bubble = document.createElement('div');
        bubble.className = 'bb-ai-bubble';

        const paragraph = document.createElement('p');
        paragraph.textContent = text;

        bubble.appendChild(paragraph);
        row.appendChild(bubble);
        messages.appendChild(row);

        messages.scrollTop = messages.scrollHeight;
    }

    function getAnswer(question) {
        const normalized = question.toLowerCase();

        const match = faq.find(item =>
            item.keywords.some(keyword => normalized.includes(keyword))
        );

        if (match) return match.answer;

        return 'Terima kasih atas pertanyaanmu! Aku belum memiliki informasi yang tepat untuk menjawabnya. Silakan tanyakan tentang treatment, harga, skincare, atau booking. Untuk informasi lainnya, kamu bisa menghubungi tim kami melalui WhatsApp.';
    }

    function askQuestion(question) {
        const cleanQuestion = question.trim();

        if (!cleanQuestion) return;

        addMessage(cleanQuestion, 'user');
        input.value = '';

        // Simulasi jawaban demo, bukan pemanggilan model AI.
        window.setTimeout(() => {
            addMessage(getAnswer(cleanQuestion), 'bot');
        }, 350);
    }

    form.addEventListener('submit', event => {
        event.preventDefault();
        askQuestion(input.value);
    });

    if (suggestions) {
        suggestions.addEventListener('click', event => {
            const button = event.target.closest('[data-ai-question]');

            if (!button) return;

            askQuestion(button.dataset.aiQuestion);
        });
    }
});
