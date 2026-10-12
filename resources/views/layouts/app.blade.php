
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#0C3685">

    <title>@yield('title', 'D-KREASI — Digital Creative Platform')</title>
    <meta name="description"
        content="@yield('meta_description', 'D-KREASI — Digital Creative Platform by PakDe Group.')">

    <link rel="stylesheet" href="{{ asset('css/d-kreasi.css') }}">

    @stack('styles')
</head>
<body>
    @include('components.announcement')
    @include('components.navbar')

    <main>
        @yield('content')
    </main>

    @include('components.footer')

    @stack('scripts')
</body>
</html>
