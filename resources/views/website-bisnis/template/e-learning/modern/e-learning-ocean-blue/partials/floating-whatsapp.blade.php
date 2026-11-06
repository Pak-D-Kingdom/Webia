{{-- Floating WhatsApp: hijau WhatsApp dengan cincin putih & riak biru khas Ocean Blue --}}
<a class="el-wa" data-wa
   href="https://wa.me/{{ $e['contact']['whatsapp'] }}?text={{ rawurlencode($e['contact']['wa_text']) }}"
   target="_blank" rel="noopener noreferrer" aria-label="Chat WhatsApp E-learna">
    <span class="el-wa__label">Chat via WhatsApp</span>
    <span class="el-wa__btn">
        <span class="el-wa__ripple" aria-hidden="true"></span>
        <svg class="el-ico" aria-hidden="true"><use href="#i-whatsapp"/></svg>
    </span>
</a>
