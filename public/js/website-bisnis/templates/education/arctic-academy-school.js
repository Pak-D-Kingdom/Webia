document.querySelectorAll('.question').forEach(q=>q.addEventListener('click',()=>q.parentElement.classList.toggle('active')));
function reply(){let v=document.getElementById('questionInput').value.trim();document.getElementById('reply').textContent=v?'Terima kasih! Untuk informasi akurat, silakan hubungi tim penerimaan melalui tombol WhatsApp.':'Silakan tulis pertanyaan terlebih dahulu.'}
