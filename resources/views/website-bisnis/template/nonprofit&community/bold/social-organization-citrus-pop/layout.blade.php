<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>{{ $title }} | {{ $d['org']['name'] }}</title>
<meta name="description" content="{{ $d['org']['tag'] }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,700;12..96,800&family=Figtree:wght@500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ $css }}">
</head>
<body data-wa="{{ $d['wa'] }}">
<div class="tb"><div class="w tb-in">
<span>{{ $d['org']['jam'] }} · {{ $d['org']['tel'] }}</span>
<span class="tb-r">{{ $d['org']['ig'] }}</span>
</div></div>
<header class="nv"><div class="w nv-in">
<a class="logo" href="{{ $base }}"><img src="{{ $img }}logo.svg" alt="" width="40" height="40"><span>{{ $d['org']['name'] }}</span></a>
<button class="burger" aria-label="Buka menu" aria-expanded="false" data-burger><i></i><i></i><i></i></button>
<nav class="menu" data-menu>
@foreach($d['nav'] as $n)
<a href="{{ $base }}{{ $n['u'] }}">{{ $n['t'] }}</a>
@endforeach
<a class="btn btn-o" href="{{ $base }}/daftar">Gabung sekarang</a>
</nav>
</div></header>
<main>
@yield('content')
</main>
<footer class="ft">
<div class="w ft-g">
<div><div class="ft-big">{{ $d['org']['name'] }}</div><p>{{ $d['org']['tag'] }}</p></div>
<div><h3>Jelajah</h3>
@foreach($d['nav'] as $n)
<a href="{{ $base }}{{ $n['u'] }}">{{ $n['t'] }}</a>
@endforeach
<a href="{{ $base }}/chatbot">Tanya Bibi Lebah</a></div>
<div><h3>Temui kami</h3><p>{{ $d['org']['addr'] }}</p><p>{{ $d['org']['email'] }}</p><p>{{ $d['org']['tel'] }}</p></div>
</div>
<div class="ft-c">© 2026 WEBIA by D-KREASI. Seluruh hak cipta dilindungi.</div>
</footer>
<div class="fab">
<a class="fab-wa" href="https://wa.me/{{ $d['wa'] }}?text={{ $d['wa_text'] }}" target="_blank" rel="noopener" aria-label="Chat WhatsApp"><span class="tip">Chat WhatsApp</span>
<svg viewBox="0 0 24 24" width="30" height="30" aria-hidden="true"><path fill="#1F3A0F" d="M12 2a10 10 0 0 0-8.6 15L2 22l5.2-1.4A10 10 0 1 0 12 2zm0 2a8 8 0 1 1-4.2 14.8l-.4-.2-2.6.7.7-2.5-.3-.4A8 8 0 0 1 12 4z"/><path fill="#1F3A0F" d="M8.6 7.6c-.4.4-.9 1.1-.6 2.1.6 2 2.6 4 4.6 4.8 1 .4 1.7 0 2.1-.4l.4-.9-1.8-1-.7.7c-1-.4-2-1.4-2.4-2.4l.7-.7-.9-1.8z"/></svg></a>
<button class="fab-bee" type="button" aria-label="Buka Bibi Lebah, asisten FAQ" data-chat-open><span class="tip">Tanya Bibi Lebah</span><img src="{{ $img }}bee.svg" alt="" width="64" height="64"></button>
</div>
<section class="cb" data-chat hidden aria-label="Asisten FAQ Bibi Lebah">
<div class="cb-h"><img src="{{ $img }}bee.svg" alt="" width="42" height="42"><div><strong>Bibi Lebah</strong><small>Asisten program dan partisipasi</small></div><button type="button" aria-label="Tutup" data-chat-close>×</button></div>
<div class="cb-m" data-chat-log aria-live="polite"></div>
<div class="cb-q" data-chat-chips></div>
<form class="cb-f" data-chat-form><input type="text" name="q" placeholder="Tulis pertanyaanmu" autocomplete="off" aria-label="Pertanyaan"><button class="btn btn-o" type="submit">Kirim</button></form>
</section>
<script type="application/json" id="faq-data">{!! json_encode($d['faqs']) !!}</script>
<script src="{{ $js }}" defer></script>
</body>
</html>
