document.getElementById('menu').onclick=()=>document.getElementById('links').classList.toggle('show');
document.querySelectorAll('.links a').forEach(a=>a.onclick=()=>document.getElementById('links').classList.remove('show'));
document.querySelectorAll('.question').forEach(q=>q.onclick=()=>q.parentElement.classList.toggle('active'));
const chat=document.getElementById('chat');document.getElementById('ai').onclick=()=>chat.style.display=chat.style.display==='block'?'none':'block';document.getElementById('close').onclick=()=>chat.style.display='none';
document.getElementById('send').onclick=()=>{let v=document.getElementById('msg').value.trim();document.getElementById('reply').textContent=v?'Terima kasih! Untuk informasi lebih lanjut, silakan hubungi admin melalui WhatsApp.':'Silakan tulis pertanyaan terlebih dahulu.'};

const revealEls=document.querySelectorAll('section .heading, .intro, .card, .value, .gallery-grid figure, .testimonial, .event');
revealEls.forEach(el=>el.classList.add('reveal'));
const revealObserver=new IntersectionObserver(entries=>entries.forEach(entry=>{if(entry.isIntersecting){entry.target.classList.add('in-view');revealObserver.unobserve(entry.target)}}),{threshold:.12});
revealEls.forEach(el=>revealObserver.observe(el));
const toTop=document.getElementById('toTop');window.addEventListener('scroll',()=>toTop.classList.toggle('visible',window.scrollY>450));toTop.addEventListener('click',()=>window.scrollTo({top:0,behavior:'smooth'}));
