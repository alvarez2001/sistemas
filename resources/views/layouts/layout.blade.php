<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistema caritas')</title>
    <!-- CSS -->




    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src=" {{ asset('js/app.js') }}" defer></script>
</head>

<body>

    <div id="app">
        @yield('first-Content')
    </div>

</body>

</html>
