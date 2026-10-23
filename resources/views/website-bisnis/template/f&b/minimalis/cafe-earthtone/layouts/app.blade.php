<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>@yield('title', config('cafe.name') . ' – Ngopi Nyaman, Makan Enak, Suasana Tenang')</title>
<meta name="description" content="@yield('description', config('cafe.name') . ' ' . config('cafe.city_short') . ': kopi berkualitas, menu lezat, dan tempat nyaman untuk bekerja, bersantai, atau berkumpul.')">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Playfair+Display:ital,wght@0,600;0,700;1,600;1,700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset("css/$path/cafe.css") }}">
<script src="{{ asset("js/$path/cafe.js") }}" defer></script>
@stack('head')
</head>
<body>
@include("$v.partials.icons")
<a class="sr skip" href="#main">Lewati ke konten</a>
@include("$v.partials.topbar")
@include("$v.partials.navbar")
<main id="main">
    @yield('content')
</main>
@include("$v.partials.whatsapp")
@include("$v.partials.footer")
</body>
</html>
