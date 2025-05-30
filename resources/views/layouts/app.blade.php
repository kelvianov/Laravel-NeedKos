<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'KosKu') - KosKu</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
</head>
<body>
    @include('components.navbar')

    <main class="container mx-auto mt-8 px-4">
        @yield('content')
    </main>

    @include('components.footer')

    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
