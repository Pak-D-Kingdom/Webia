(() => {
'use strict';
const config=window.JELLY_POP_CONFIG||{};
const phone=String(config.whatsappNumber||'').replace(/\D/g,'');
const menuToggle=document.getElementById('jpMenuToggle');
const nav=document.getElementById('jpNav');
const year=document.getElementById('jpYear');
const wa=document.getElementById('jpFloatingWhatsApp');
if(year) year.textContent=new Date().getFullYear();
if(menuToggle&&nav){
 menuToggle.addEventListener('click',()=>{const open=nav.classList.toggle('is-open');menuToggle.setAttribute('aria-expanded',String(open));});
 nav.querySelectorAll('a').forEach(a=>a.addEventListener('click',()=>{nav.classList.remove('is-open');menuToggle.setAttribute('aria-expanded','false');}));
 document.addEventListener('click',e=>{if(nav.classList.contains('is-open')&&!nav.contains(e.target)&&!menuToggle.contains(e.target)){nav.classList.remove('is-open');menuToggle.setAttribute('aria-expanded','false');}});
}
const startDate=document.getElementById('jpStartDate');
if(startDate){const d=new Date();startDate.min=[d.getFullYear(),String(d.getMonth()+1).padStart(2,'0'),String(d.getDate()).padStart(2,'0')].join('-');}
function buildUrl(message){return `https://wa.me/${phone}?text=${encodeURIComponent(message)}`;}
function showStatus(status,message,url){
 if(!status)return;
 status.textContent=message;
 if(url){const a=document.createElement('a');a.href=url;a.target='_blank';a.rel='noopener noreferrer';a.textContent='Open WhatsApp ↗';status.append(' ',a);}
}
if(wa){
 if(phone)wa.href=buildUrl('Halo Jelly Pop! Saya ingin bertanya tentang program personal training.');
 else wa.addEventListener('click',e=>{e.preventDefault();const s=document.getElementById('jpFormStatus');showStatus(s,'Nomor WhatsApp admin belum diatur pada konfigurasi template.');});
}
document.querySelectorAll('.jp-countdown').forEach(el=>{
 const deadline=Date.parse(el.dataset.deadline||'2026-12-01T23:59:59+07:00');
 const fields={days:el.querySelector('[data-days]'),hours:el.querySelector('[data-hours]'),minutes:el.querySelector('[data-minutes]'),seconds:el.querySelector('[data-seconds]')};
 const status=el.querySelector('[data-countdown-status]');
 function update(){let ms=deadline-Date.now();if(ms<=0){Object.values(fields).forEach(n=>{if(n)n.textContent='00';});if(status)status.textContent='Demo promotion has ended. Ask the trainer about current offers.';el.classList.add('is-expired');return;}
 const d=Math.floor(ms/86400000);ms%=86400000;const h=Math.floor(ms/3600000);ms%=3600000;const m=Math.floor(ms/60000);const s=Math.floor((ms%60000)/1000);
 if(fields.days)fields.days.textContent=String(d).padStart(2,'0');if(fields.hours)fields.hours.textContent=String(h).padStart(2,'0');if(fields.minutes)fields.minutes.textContent=String(m).padStart(2,'0');if(fields.seconds)fields.seconds.textContent=String(s).padStart(2,'0');
 }
 update();window.setInterval(update,1000);
});
const forms=[document.getElementById('jpBookingForm'),document.getElementById('jpBooking')].filter(Boolean);
forms.forEach(form=>form.addEventListener('submit',e=>{
 e.preventDefault();if(!form.reportValidity())return;
 const status=form.querySelector('.jp-form-status')||document.getElementById('jpFormStatus');
 if(!phone){showStatus(status,'Nomor WhatsApp admin belum diatur. Silakan periksa konfigurasi template.');return;}
 const data=new FormData(form);const get=k=>String(data.get(k)||'Belum diisi').trim()||'Belum diisi';
 const message=['Halo Jelly Pop! Saya ingin berkonsultasi mengenai personal training.','','FITNESS PROGRAM INQUIRY','------------------------------',`Nama: ${get('name')}`,`WhatsApp: ${get('phone')}`,`Program: ${get('package')}`,`Harga demo yang terlihat: ${get('demoPrice')}`,`Tujuan: ${get('goal')}`,`Format latihan: ${get('format')}`,`Tanggal mulai pilihan: ${get('startDate')}`,`Jadwal pilihan: ${get('schedule')}`,`Catatan: ${get('message')}`,'','Mohon informasi harga aktual, ketersediaan, durasi sesi, dan ketentuan program. Saya memahami ini belum merupakan booking yang dikonfirmasi.'].join('\n');
 const url=buildUrl(message);showStatus(status,'Ringkasan siap. Lanjutkan melalui WhatsApp untuk konfirmasi dengan trainer.',url);
 try{window.open(url,'_blank','noopener,noreferrer');}catch(_){}
}));
// AI Assistant is a floating entry-point only; connect the real chatbot separately.
})();