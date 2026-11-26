 <!DOCTYPE html>
 <html lang="id">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <title>@yield('title', 'WEBIA — Solusi Website Bisnis')</title>

     <meta name="description" content="@yield('meta_description', 'WEBIA, layanan pembuatan website bisnis dari D-KREASI.')">

     <meta name="theme-color" content="#123B82">

     <link rel="stylesheet" href="{{ asset('css/website-bisnis/website-bisnis.css') }}">
     <link rel="stylesheet" href="{{ asset('css/website-bisnis/webia-galaxy.css') }}">

     @stack('styles')
 </head>

 <body class="webia-body">

     @include('website-bisnis.components.navbar')

     <main id="main-content">
         @yield('content')
     </main>

     @include('website-bisnis.components.footer')

     <script src="{{ asset('js/website-bisnis/website-bisnis.js') }}" defer></script>
     <script src="{{ asset('js/website-bisnis/webia-galaxy.js') }}" defer></script> {{-- setelah website-bisnis.js --}}
     @stack('scripts')

     <script>
     (function() {
         function loadWebiaWidget() {
             if (document.getElementById('webia-public-ai-widget')) return;
             var s = document.createElement('script');
             s.id = 'webia-public-ai-widget';
             s.src = 'http://localhost:8001/widget/widget.js';
             s.dataset.siteKey = 'site_webia_public';
             s.dataset.layer = 'l3';
             s.defer = true;
             document.body.appendChild(s);
         }
         if ('requestIdleCallback' in window) {
             requestIdleCallback(loadWebiaWidget, { timeout: 1500 });
         } else {
             setTimeout(loadWebiaWidget, 250);
         }
     })();
     </script>

     @include('website-bisnis.components.portal-dkreasi')
 </body>

 </html>
