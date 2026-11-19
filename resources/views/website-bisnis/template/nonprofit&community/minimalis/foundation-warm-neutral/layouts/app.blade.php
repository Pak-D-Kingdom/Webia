<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', $f['meta']['title'])</title>
    <meta name="description" content="@yield('description', $f['meta']['description'])">
    <meta name="theme-color" content="#F5EDE0">
    <link rel="icon" type="image/svg+xml" href="{{ asset($img.'/favicon.svg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset($css) }}">
    <script>document.documentElement.className += ' js';</script>
</head>
<body class="hf-body @yield('body_class')">
    <a class="hf-skip" href="#main">Lewati ke konten utama</a>

    @include($v.'.partials.sprite')
    @include($v.'.partials.topbar')
    @include($v.'.partials.navbar')

    <main id="main">
        @yield('content')
    </main>

    @include($v.'.partials.footer')
    @include($v.'.partials.whatsapp-button')
    @include($v.'.partials.chatbot-button')

    <div class="hf-toast" id="hf-toast" role="status" aria-live="polite" hidden></div>

    <script type="application/json" id="hf-routes">{"home":"{{ route($rp.'home') }}","mission-vision":"{{ route($rp.'mission-vision') }}","programs":"{{ route($rp.'programs') }}","impact":"{{ route($rp.'impact') }}","donation":"{{ route($rp.'donation') }}","transparency":"{{ route($rp.'transparency') }}","partners":"{{ route($rp.'partners') }}","volunteer":"{{ route($rp.'volunteer') }}","news":"{{ route($rp.'news') }}","chatbot":"{{ route($rp.'chatbot') }}","kontak":"#kontak"}</script>
    <script type="application/json" id="hf-chat-data">{!! json_encode($f['chatbot'], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG | JSON_HEX_AMP) !!}</script>
    <script src="{{ asset($js) }}" defer></script>
</body>
</html>
