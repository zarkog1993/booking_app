<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $team->name ?? 'Football Club' }}</title>
    @vite('resources/css/app.css')
    <style>
        body { font-family: sans-serif; padding: 2rem; max-width: 600px; margin: auto; }
        .club-card { border: 1px solid #ddd; padding: 2rem; border-radius: 8px; text-align: center; }
        .club-image { max-width: 150px; }
        .details { text-align: left; margin-top: 2rem; }
        .details p { margin: 0.5rem 0; }
    </style>
    @vite('resources/css/app.css')
</head>
<body>
    @include('section.navbar')
    @yield('content')
    @include('section.footer')
</body>
</html>
