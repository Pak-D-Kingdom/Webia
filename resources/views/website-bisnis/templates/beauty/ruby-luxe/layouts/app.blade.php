
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#681e31">

    <title>@yield('title', 'Ruby Luxe | Organic Beauty')</title>
    <meta name="description"
          content="@yield('meta_description', 'Discover thoughtful organic skincare and personalized beauty treatments at Ruby Luxe.')">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet"
          href="{{ asset('css/website-bisnis/templates/beauty/ruby-luxe.css') }}">

    @stack('styles')
</head>
<body>
    @include('website-bisnis.templates.beauty.ruby-luxe.layouts.header')

    <main id="main-content">
        @yield('content')
    </main>

    @include('website-bisnis.templates.beauty.ruby-luxe.layouts.footer')

    <script src="{{ asset('js/website-bisnis/ruby-luxe.js') }}" defer></script>
    @stack('scripts')
</body>
</html>
