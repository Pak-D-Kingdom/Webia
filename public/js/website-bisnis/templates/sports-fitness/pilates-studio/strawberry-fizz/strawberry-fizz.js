
        // Initialize Lucide Icons
        lucide.createIcons();

        // Scroll Progress Bar Logic
        window.onscroll = function() {
            let winScroll = document.body.scrollTop || document.documentElement.scrollTop;
            let height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            let scrolled = (winScroll / height) * 100;
            document.getElementById("progress-bar").style.width = scrolled + "%";
        };

        // Mobile Menu Toggle
        function toggleMobileMenu() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
            menu.classList.toggle('flex');
        }

        // Class Catalog Filter Logic
        function filterClasses(category, clickedButton) {
            const cards = document.querySelectorAll('.class-card');
            const btns = document.querySelectorAll('.class-tab-btn');

            btns.forEach(btn => {
                btn.classList.remove('active', 'bg-berry-500', 'text-white');
                btn.classList.add('glass-card', 'text-berry-900');
            });
            (clickedButton || (typeof event !== 'undefined' ? event.currentTarget : null))?.classList.add('active', 'bg-berry-500', 'text-white');
            (clickedButton || (typeof event !== 'undefined' ? event.currentTarget : null))?.classList.remove('glass-card');

            cards.forEach(card => {
                if (category === 'all' || card.classList.contains('class-' + category)) {
                    card.style.display = 'flex';
                } else {
                    card.style.display = 'none';
                }
            });
        }

        // Class Detail Drawer/Modal
        function openClassDetail(title, category, duration, intensity, target, calories, outfit, description) {
            document.getElementById('modal-title').innerText = title;
            document.getElementById('modal-category-pill').innerText = category;
            document.getElementById('modal-duration-intensity').innerText = duration + ' • ' + intensity;
            document.getElementById('modal-calories').innerText = calories;
            document.getElementById('modal-target').innerText = target;
            document.getElementById('modal-outfit').innerText = outfit;
            document.getElementById('modal-description').innerText = description;
            
            document.getElementById('modal-book-btn').onclick = function() {
                closeClassDetail();
                openBookingModal(title);
            };

            const modal = document.getElementById('class-detail-modal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeClassDetail() {
            const modal = document.getElementById('class-detail-modal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }

        // Pricing Switcher Logic
        function switchPricing(type) {
            const passesGrid = document.getElementById('passes-pricing-grid');
            const membershipGrid = document.getElementById('membership-pricing-grid');
            const passBtn = document.getElementById('toggle-passes-btn');
            const memBtn = document.getElementById('toggle-membership-btn');

            if (type === 'passes') {
                passesGrid.classList.remove('hidden');
                passesGrid.classList.add('grid');
                membershipGrid.classList.add('hidden');
                membershipGrid.classList.remove('grid');

                passBtn.classList.add('bg-berry-500', 'text-white', 'shadow');
                passBtn.classList.remove('text-berry-900');
                memBtn.classList.remove('bg-berry-500', 'text-white', 'shadow');
                memBtn.classList.add('text-berry-900');
            } else {
                membershipGrid.classList.remove('hidden');
                membershipGrid.classList.add('grid');
                passesGrid.classList.add('hidden');
                passesGrid.classList.remove('grid');

                memBtn.classList.add('bg-berry-500', 'text-white', 'shadow');
                memBtn.classList.remove('text-berry-900');
                passBtn.classList.remove('bg-berry-500', 'text-white', 'shadow');
                passBtn.classList.add('text-berry-900');
            }
        }

        // Schedule Filter Logic by Day
        function filterSchedule(day, clickedButton) {
            const items = document.querySelectorAll('.schedule-item');
            const btns = document.querySelectorAll('.day-btn');

            btns.forEach(btn => {
                btn.classList.remove('active', 'bg-berry-500', 'text-white', 'shadow');
                btn.classList.add('glass-card', 'text-berry-900');
            });
            (clickedButton || (typeof event !== 'undefined' ? event.currentTarget : null))?.classList.add('active', 'bg-berry-500', 'text-white', 'shadow');
            (clickedButton || (typeof event !== 'undefined' ? event.currentTarget : null))?.classList.remove('glass-card');

            items.forEach(item => {
                if (item.classList.contains('day-' + day)) {
                    item.style.display = 'flex';
                } else {
                    item.style.display = 'none';
                }
            });
        }

        // Reservation inquiry flow: collect details, show review, then hand off to WhatsApp.
const ADMIN_WHATSAPP = '6281234567890';
let bookingDraft = {};
function openBookingModal(className) {
  document.getElementById('booking-class-input').value = className || 'General Inquiry';
  document.getElementById('booking-step-form').classList.remove('hidden');
  document.getElementById('booking-step-success').classList.add('hidden');
  const date = document.getElementById('booking-date');
  if (date) { const now = new Date(); date.min = new Date(now.getTime()-now.getTimezoneOffset()*60000).toISOString().slice(0,10); }
  const modal = document.getElementById('booking-modal'); modal.classList.remove('hidden'); modal.classList.add('flex');
}
function closeBookingModal() { const modal=document.getElementById('booking-modal'); modal.classList.add('hidden'); modal.classList.remove('flex'); }
function handleBookingSubmit(e) {
  e.preventDefault(); const form=e.currentTarget; if(!form.reportValidity()) return false;
  const fd=new FormData(form); bookingDraft={className:fd.get('class_or_package')||'',name:(fd.get('customer_name')||'').trim(),phone:(fd.get('customer_whatsapp')||'').trim(),date:fd.get('preferred_date')||'',time:fd.get('preferred_time')||'',notes:(fd.get('notes')||'').trim()};
  const summary=document.getElementById('booking-review-summary'); summary.replaceChildren();
  [['Kelas / Paket',bookingDraft.className],['Nama',bookingDraft.name],['WhatsApp',bookingDraft.phone],['Tanggal pilihan',bookingDraft.date],['Preferensi waktu',bookingDraft.time],['Catatan',bookingDraft.notes||'—']].forEach(([label,value])=>{const row=document.createElement('div');row.className='grid grid-cols-[110px_1fr] gap-2';const a=document.createElement('strong');a.textContent=label;const b=document.createElement('span');b.textContent=value;row.append(a,b);summary.append(row);});
  document.getElementById('booking-step-form').classList.add('hidden'); document.getElementById('booking-step-success').classList.remove('hidden'); return false;
}
function backToBookingForm(){document.getElementById('booking-step-success').classList.add('hidden');document.getElementById('booking-step-form').classList.remove('hidden');}
function sendBookingInquiryToWhatsApp(){if(!bookingDraft.name||!bookingDraft.phone||!bookingDraft.date||!bookingDraft.time)return;const msg=['Halo Rustic Strawberry Fizz Pilates Studio 🍓💕','Saya ingin mengajukan permintaan reservasi (belum booking terkonfirmasi).','',`Kelas / Paket: ${bookingDraft.className}`,`Nama: ${bookingDraft.name}`,`Nomor WhatsApp: ${bookingDraft.phone}`,`Tanggal pilihan: ${bookingDraft.date}`,`Preferensi waktu: ${bookingDraft.time}`,`Catatan: ${bookingDraft.notes||'-'}`,'','Mohon cek ketersediaan slot dan konfirmasi jadwal/detail paket melalui WhatsApp. Terima kasih!'].join('\n');window.open('https://wa.me/'+ADMIN_WHATSAPP+'?text='+encodeURIComponent(msg),'_blank','noopener,noreferrer');}

// Lightbox Logic for Gallery
        function openLightbox(imgUrl, caption) {
            document.getElementById('lightbox-img').src = imgUrl;
            document.getElementById('lightbox-caption').innerText = caption;
            const modal = document.getElementById('lightbox-modal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeLightbox() {
            const modal = document.getElementById('lightbox-modal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }

        // FAQ Accordion Toggle
        function toggleFaq(id) {
            const ans = document.getElementById('faq-answer-' + id);
            const icon = document.getElementById('faq-icon-' + id);
            
            if (ans.classList.contains('hidden')) {
                ans.classList.remove('hidden');
                icon.style.transform = 'rotate(180deg)';
            } else {
                ans.classList.add('hidden');
                icon.style.transform = 'rotate(0deg)';
            }
        }

        // Newsletter Handler
        function handleNewsletter(e) {
            e.preventDefault();
            alert('✨ Selamat! Kamu berhasil bergabung dengan Glow Club. Cek email kamu untuk promo 10% OFF!');
            e.target.reset();
        }

        // Strawberry AI entry point: inquiry helper only; no simulated AI responses.
function toggleAiChatbot(){const win=document.getElementById('ai-chatbot-window');win.classList.toggle('hidden');win.classList.toggle('flex');}
function handleAiSendMessage(e){e.preventDefault();const input=document.getElementById('ai-chat-input');const question=input.value.trim();if(!question)return;window.open('https://wa.me/'+ADMIN_WHATSAPP+'?text='+encodeURIComponent('Halo, saya ingin bertanya tentang Rustic Strawberry Fizz Pilates Studio 🍓\nPertanyaan: '+question),'_blank','noopener,noreferrer');input.value='';}
function sendQuickAiQuery(text){window.open('https://wa.me/'+ADMIN_WHATSAPP+'?text='+encodeURIComponent('Halo, saya ingin bertanya tentang '+text+' di Rustic Strawberry Fizz Pilates Studio 🍓'),'_blank','noopener,noreferrer');}
