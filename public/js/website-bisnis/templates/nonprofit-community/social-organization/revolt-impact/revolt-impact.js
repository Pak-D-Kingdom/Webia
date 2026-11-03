// 1. CUSTOM ANIMATED CYBER CURSOR & PARTICLE TRAIL
const cursorDot = document.getElementById('cursor-dot');
const cursorRing = document.getElementById('cursor-ring');

let mouseX = 0;
let mouseY = 0;
let ringX = 0;
let ringY = 0;

window.addEventListener('mousemove', (e) => {
    if (!cursorDot || !cursorRing) return;

    mouseX = e.clientX;
    mouseY = e.clientY;

    cursorDot.style.left = `${mouseX}px`;
    cursorDot.style.top = `${mouseY}px`;
});

function animateCursor() {
    if (!cursorRing) return;

    ringX += (mouseX - ringX) * 0.15;
    ringY += (mouseY - ringY) * 0.15;

    cursorRing.style.left = `${ringX}px`;
    cursorRing.style.top = `${ringY}px`;

    requestAnimationFrame(animateCursor);
}

if (
    cursorDot &&
    cursorRing &&
    window.matchMedia('(pointer: fine)').matches
) {
    animateCursor();
}

// Hover Effect on Cursor
document.querySelectorAll('a, button, input, .tilt-card').forEach(el => {
    el.addEventListener('mouseenter', () => {
        if (!cursorRing) return;

        cursorRing.style.width = '55px';
        cursorRing.style.height = '55px';
        cursorRing.style.borderColor = '#CCFF00';
    });

    el.addEventListener('mouseleave', () => {
        if (!cursorRing) return;

        cursorRing.style.width = '36px';
        cursorRing.style.height = '36px';
        cursorRing.style.borderColor = '#FF007F';
    });
});


// 2. HERO INTERACTIVE CANVAS PARTICLES
const heroCanvas = document.getElementById('heroCanvas');
const hCtx = heroCanvas ? heroCanvas.getContext('2d') : null;

let particles = [];

function resizeHeroCanvas() {
    if (!heroCanvas || !hCtx) return;

    heroCanvas.width = heroCanvas.offsetWidth;
    heroCanvas.height = heroCanvas.offsetHeight;
}

window.addEventListener('resize', resizeHeroCanvas);
resizeHeroCanvas();

class Particle {
    constructor() {
        this.x = Math.random() * heroCanvas.width;
        this.y = Math.random() * heroCanvas.height;
        this.size = Math.random() * 2 + 1;
        this.vx = (Math.random() - 0.5) * 1.5;
        this.vy = (Math.random() - 0.5) * 1.5;
        this.color = Math.random() > 0.5 ? '#FF007F' : '#CCFF00';
    }

    update() {
        this.x += this.vx;
        this.y += this.vy;

        if (this.x < 0 || this.x > heroCanvas.width) {
            this.vx *= -1;
        }

        if (this.y < 0 || this.y > heroCanvas.height) {
            this.vy *= -1;
        }
    }

    draw() {
        hCtx.fillStyle = this.color;
        hCtx.beginPath();
        hCtx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
        hCtx.fill();
    }
}

if (heroCanvas && hCtx) {
    for (let i = 0; i < 70; i++) {
        particles.push(new Particle());
    }
}

function animateHeroCanvas() {
    if (!heroCanvas || !hCtx) return;

    hCtx.clearRect(0, 0, heroCanvas.width, heroCanvas.height);

    particles.forEach((p, index) => {
        p.update();
        p.draw();

        for (let j = index + 1; j < particles.length; j++) {
            const dx = p.x - particles[j].x;
            const dy = p.y - particles[j].y;
            const dist = Math.sqrt(dx * dx + dy * dy);

            if (dist < 100) {
                hCtx.strokeStyle = 'rgba(255,0,127,0.15)';
                hCtx.lineWidth = 0.5;
                hCtx.beginPath();
                hCtx.moveTo(p.x, p.y);
                hCtx.lineTo(particles[j].x, particles[j].y);
                hCtx.stroke();
            }
        }
    });

    requestAnimationFrame(animateHeroCanvas);
}

if (heroCanvas && hCtx) {
    animateHeroCanvas();
}

function createParticleBurst(e) {
    if (!heroCanvas || !hCtx) return;

    for (let i = 0; i < 15; i++) {
        let p = new Particle();

        p.x = e.clientX;
        p.y = e.clientY;
        p.vx = (Math.random() - 0.5) * 6;
        p.vy = (Math.random() - 0.5) * 6;

        particles.push(p);
    }
}


// 3. 3D TILT EFFECT ON CARDS
document.querySelectorAll('.tilt-card').forEach(card => {
    card.addEventListener('mousemove', (e) => {
        const rect = card.getBoundingClientRect();

        const x = e.clientX - rect.left - rect.width / 2;
        const y = e.clientY - rect.top - rect.height / 2;

        card.style.transform =
            `perspective(1000px) rotateX(${-y / 12}deg) rotateY(${x / 12}deg) scale3d(1.02, 1.02, 1.02)`;
    });

    card.addEventListener('mouseleave', () => {
        card.style.transform =
            'perspective(1000px) rotateX(0deg) rotateY(0deg) scale3d(1, 1, 1)';
    });
});

// 4. INTERACTIVE CRISIS MAP CANVAS
const mapCanvas = document.getElementById('mapCanvas');
const mCtx = mapCanvas ? mapCanvas.getContext('2d') : null;
let radarAngle = 0;

function resizeMapCanvas() {
    if (mapCanvas && mapCanvas.parentElement) {
        mapCanvas.width = mapCanvas.parentElement.offsetWidth;
        mapCanvas.height = mapCanvas.parentElement.offsetHeight;
    }
}

window.addEventListener('resize', resizeMapCanvas);
resizeMapCanvas();

const mapNodes = [
    {
        x: 0.3,
        y: 0.4,
        label: "Papua Utara",
        tag: "Wilayah: PAPUA UTARA",
        title: "Penyelamatan Hutan Adat",
        desc: "Intervensi deforestasi liar seluas 1.200 Ha & pemulihan ekosistem endemik.",
        progress: "78%"
    },
    {
        x: 0.6,
        y: 0.3,
        label: "Kalimantan",
        tag: "Wilayah: KALIMANTAN",
        title: "Restorasi Paru-Paru Dunia",
        desc: "Pemadaman titik api cepat & konservasi habitat Orangutan.",
        progress: "85%"
    },
    {
        x: 0.2,
        y: 0.7,
        label: "Jawa Pesisir",
        tag: "Wilayah: JAWA PESISIR",
        title: "Tanggul Mangrove & Eco-City",
        desc: "Penanaman 50.000 bibit mangrove mencegah abrasi pantai utara.",
        progress: "92%"
    }
];

function drawMap() {
    if (!mapCanvas || !mCtx) return;

    mCtx.clearRect(0, 0, mapCanvas.width, mapCanvas.height);

    const cx = mapCanvas.width / 2;
    const cy = mapCanvas.height / 2;

    radarAngle += 0.02;

    // Radar scanner
    mCtx.strokeStyle = 'rgba(204,255,0,0.1)';
    mCtx.beginPath();
    mCtx.arc(cx, cy, 120, 0, Math.PI * 2);
    mCtx.stroke();

    mCtx.fillStyle = 'rgba(204,255,0,0.05)';
    mCtx.beginPath();
    mCtx.moveTo(cx, cy);
    mCtx.arc(cx, cy, 150, radarAngle, radarAngle + 0.5);
    mCtx.closePath();
    mCtx.fill();

    // Map nodes
    mapNodes.forEach(node => {
        const nx = node.x * mapCanvas.width;
        const ny = node.y * mapCanvas.height;

        mCtx.fillStyle = '#FF007F';
        mCtx.beginPath();
        mCtx.arc(nx, ny, 6, 0, Math.PI * 2);
        mCtx.fill();

        mCtx.strokeStyle = '#CCFF00';
        mCtx.beginPath();
        mCtx.arc(nx, ny, 12, 0, Math.PI * 2);
        mCtx.stroke();

        mCtx.fillStyle = '#FFFFFF';
        mCtx.font = '10px Space Grotesk';
        mCtx.fillText(node.label, nx + 15, ny + 4);
    });

    requestAnimationFrame(drawMap);
}

drawMap();

if (mapCanvas) {
    mapCanvas.addEventListener('click', (e) => {
        const rect = mapCanvas.getBoundingClientRect();
        const clickX = e.clientX - rect.left;
        const clickY = e.clientY - rect.top;

        mapNodes.forEach(node => {
            const nx = node.x * mapCanvas.width;
            const ny = node.y * mapCanvas.height;
            const dist = Math.sqrt((clickX - nx) ** 2 + (clickY - ny) ** 2);

            if (dist < 20) {
                document.getElementById('mapRegionTag').innerText = node.tag;
                document.getElementById('mapRegionTitle').innerText = node.title;
                document.getElementById('mapRegionDesc').innerText = node.desc;

                const progressText = document.getElementById('mapRegionProgress');
                if (progressText) {
                    progressText.innerText = node.progress;
                }

                document.getElementById('mapProgressBar').style.width = node.progress;
            }
        });
    });
}


// 5. SLOT MACHINE MISSION GENERATOR
const missions = [
    "Kurangi penggunaan plastik sekali pakai selama 3 hari berturut-turut.",
    "Tanam 1 bibit tanaman hijau di halaman atau pot kamarmu.",
    "Sumbangkan 1 buku bacaan ke rumah singgah terdekat.",
    "Bagikan tautan manifesto REVOLT ke 3 grup obrolanmu.",
    "Matikan seluruh aliran listrik tidak terpakai selama 2 jam malam ini."
];

function spinSlotMachine() {
    const textEl = document.getElementById('slotMachineText');
    if (!textEl) return;

    let count = 0;

    const interval = setInterval(() => {
        textEl.innerText =
            `"${missions[Math.floor(Math.random() * missions.length)]}"`;

        count++;

        if (count > 10) {
            clearInterval(interval);
        }
    }, 80);
}


// WhatsApp demo number.
// Ganti dengan nomor WhatsApp admin yang sebenarnya.
const REVOLT_WHATSAPP_NUMBER = '6281234567890';

function openWhatsApp(message) {
    const url =
        `https://wa.me/${REVOLT_WHATSAPP_NUMBER}?text=${encodeURIComponent(message)}`;

    window.open(url, '_blank', 'noopener,noreferrer');
}


// 6. GENERAL UTILITIES
function toggleFaq(btn) {
    btn.nextElementSibling.classList.toggle('hidden');
}

function openModal(id) {
    document.getElementById(id).classList.remove('hidden');
}

function closeModal(id) {
    document.getElementById(id).classList.add('hidden');
}

function showToast(title, desc) {
    const toast = document.getElementById('toast');

    document.getElementById('toastTitle').innerText = title;
    document.getElementById('toastDesc').innerText = desc;

    toast.classList.remove('translate-x-full');

    setTimeout(() => {
        toast.classList.add('translate-x-full');
    }, 3000);
}

function triggerAction(btn, msg) {
    showToast('Aksi Dicatat', msg);
    btn.innerText = 'Selesai ✓';
    btn.disabled = true;
}

function submitPledge(e) {
    e.preventDefault();

    const val = document.getElementById('pledgeInput').value;
    const feed = document.getElementById('actionWallFeed');

    const newCard = document.createElement('div');
    newCard.className =
        'bg-darkBg/80 p-4 rounded-xl border border-white/5';

    newCard.innerHTML = `
        <div class="flex justify-between text-xs text-mutedGray mb-1">
            <strong class="text-acidLime">Anda</strong>
            <span>Baru saja</span>
        </div>
        <p class="text-xs text-pureWhite">"${val}"</p>
    `;

    feed.prepend(newCard);

    document.getElementById('pledgeInput').value = '';

    showToast(
        'Ikrar Publik Terkirim',
        'Terima kasih atas kontribusimu!'
    );
}

function downloadReport(btn) {
    btn.innerHTML =
        `<i class="fa-solid fa-spinner fa-spin"></i> Mengunduh...`;

    setTimeout(() => {
        btn.innerHTML =
            `<i class="fa-solid fa-check"></i> Laporan Diunduh`;

        showToast(
            'Unduhan Selesai',
            'Laporan keuangan PDF berhasil diunduh.'
        );
    }, 1500);
}

function toggleChatbot() {
    document.getElementById('chatbotDrawer').classList.toggle('hidden');
}

function sendChatMessage() {
    const input = document.getElementById('chatInput');
    const messages = document.getElementById('chatMessages');

    if (input.value.trim() !== '') {
        const userMsg = document.createElement('div');

        userMsg.className =
            'bg-hotPink/20 text-pureWhite p-3 rounded-2xl max-w-[85%] ml-auto border border-hotPink/30';

        userMsg.innerText = input.value;
        messages.appendChild(userMsg);

        input.value = '';
        messages.scrollTop = messages.scrollHeight;

        setTimeout(() => {
            const aiMsg = document.createElement('div');

            aiMsg.className =
                'bg-surfaceBg p-3 rounded-2xl max-w-[85%] border border-white/10 text-pureWhite';

            aiMsg.innerText =
                "Sistem AI REVOLT siap memandu aksimu! Silakan pilih pilar aksi sosial di navigasi utama.";

            messages.appendChild(aiMsg);
            messages.scrollTop = messages.scrollHeight;
        }, 800);
    }
}

function submitJoinForm(e) {
    e.preventDefault();

    const form = e.currentTarget;

    const fields = Array.from(
        form.querySelectorAll('input')
    ).map(input => input.value.trim());

    const message = `Halo admin REVOLT // IMPACT, saya ingin mendaftar sebagai aktivis.
Nama: ${fields[0] || '-'}
Email: ${fields[1] || '-'}
Mohon info langkah selanjutnya. Pendaftaran menunggu konfirmasi admin.`;

    closeModal('joinModal');
    openWhatsApp(message);

    showToast(
        'Lanjutkan via WhatsApp',
        'Admin akan mengonfirmasi pendaftaranmu.'
    );
}


// Counter Animation
let counterAnimated = false;

window.addEventListener('scroll', () => {
    if (window.scrollY > 200 && !counterAnimated) {
        document.querySelectorAll('.counter').forEach(counter => {
            const target = +counter.getAttribute('data-target');
            let count = 0;
            const speed = target / 40;

            const update = () => {
                count += speed;

                if (count < target) {
                    counter.innerText = Math.floor(count).toLocaleString();
                    setTimeout(update, 30);
                } else {
                    counter.innerText = target.toLocaleString();
                }
            };

            update();
        });

        counterAnimated = true;
    }
});

document.getElementById('chatInput')?.addEventListener('keydown', (e) => {
    if (e.key === 'Enter') sendChatMessage();
});


// Event RSVP / volunteer matching demo.
// All actual inquiries are sent to WhatsApp for admin confirmation.
function rsvpEvent(eventName) {
    openWhatsApp(
        `Halo admin REVOLT // IMPACT, saya ingin RSVP acara: ${eventName}. Mohon konfirmasi jadwal, lokasi, dan ketersediaan peserta.`
    );
}

function submitRsvp(e) {
    e.preventDefault();

    const form = e.currentTarget;
    const data = new FormData(form);

    const message = `Halo admin REVOLT // IMPACT, saya ingin bergabung / RSVP.
Nama: ${data.get('name')}
WhatsApp: ${data.get('phone')}
Kota: ${data.get('city')}
Minat: ${data.get('interest')}
Pesan: ${data.get('message') || '-'}
Mohon konfirmasi langkah selanjutnya.`;

    openWhatsApp(message);

    showToast(
        'Permintaan Disiapkan',
        'WhatsApp terbuka untuk konfirmasi dengan admin.'
    );
}

function matchVolunteer() {
    const interest =
        document.getElementById('volInterest')?.value || 'Relawan umum';

    const time =
        document.getElementById('volTime')?.value || 'Fleksibel';

    const recommendations = {
        'Lingkungan & iklim':
            'aksi penanaman, pemetaan ruang hijau, dan kampanye lingkungan',

        'Edukasi digital':
            'kelas literasi digital dan pendampingan teknologi',

        'Kesetaraan hak':
            'edukasi publik, riset komunitas, dan dukungan advokasi',

        'Pengembangan komunitas':
            'koordinasi kegiatan warga dan gotong royong',

        'Media & kreativitas':
            'dokumentasi, desain kampanye, dan konten edukasi'
    };

    const result =
        `Rekomendasi awal: ${recommendations[interest] || 'aksi komunitas lokal'}. Ketersediaan: ${time}.`;

    const target = document.getElementById('volMatchResult');

    if (target) {
        target.textContent = result;
    }

    openWhatsApp(
        `Halo admin REVOLT // IMPACT, saya ingin dicocokkan sebagai relawan. Minat: ${interest}. Ketersediaan: ${time}. Mohon rekomendasi program dan konfirmasi admin.`
    );
}


// Demo countdown to the next sample campaign date.
// Change the date when a real event is scheduled.
(function initEventCountdown() {
    const target = document.getElementById('eventCountdown');

    if (!target) return;

    const eventDate = new Date();

    eventDate.setDate(eventDate.getDate() + 14);
    eventDate.setHours(9, 0, 0, 0);

    const update = () => {
        const diff = eventDate.getTime() - Date.now();

        if (diff <= 0) {
            target.textContent = 'HARI INI';
            return;
        }

        const days = Math.floor(diff / 86400000);
        const hours = Math.floor((diff % 86400000) / 3600000);

        target.textContent = `${days}H ${hours}J`;
    };

    update();
    setInterval(update, 60000);
})();


// 7. RESPONSIVE MOBILE NAVIGATION
document.addEventListener('DOMContentLoaded', () => {
    const menuBtn = document.getElementById('mobileMenuBtn');
    const mobileMenu = document.getElementById('mobileMenu');

    if (!menuBtn || !mobileMenu) return;

    // Buka dan tutup menu hamburger
    menuBtn.addEventListener('click', () => {
        const isOpening = mobileMenu.classList.contains('hidden');

        mobileMenu.classList.toggle('hidden');
        menuBtn.setAttribute('aria-expanded', String(isOpening));

        // Ganti ikon hamburger menjadi X ketika menu terbuka
        const icon = menuBtn.querySelector('i');
        if (icon) {
            icon.classList.toggle('fa-bars-staggered', !isOpening);
            icon.classList.toggle('fa-xmark', isOpening);
        }
    });

    // Tutup menu setelah salah satu link dipilih
    mobileMenu.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', () => {
            mobileMenu.classList.add('hidden');
            menuBtn.setAttribute('aria-expanded', 'false');

            const icon = menuBtn.querySelector('i');
            if (icon) {
                icon.classList.add('fa-bars-staggered');
                icon.classList.remove('fa-xmark');
            }
        });
    });

    // Tutup menu jika layar kembali ke ukuran desktop
    window.addEventListener('resize', () => {
        if (window.innerWidth >= 1536) {
            mobileMenu.classList.add('hidden');
            menuBtn.setAttribute('aria-expanded', 'false');

            const icon = menuBtn.querySelector('i');
            if (icon) {
                icon.classList.add('fa-bars-staggered');
                icon.classList.remove('fa-xmark');
            }
        }
    });
});
