<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $team->name ?? 'Football Club' }}</title>
    @vite('resources/css/app.css')
</head>
<body>
    @include('section.navbar')
    <div class="container mx-auto p-4">
        @yield('content')
    </div>
    @include('section.footer')
</body>
</html>
