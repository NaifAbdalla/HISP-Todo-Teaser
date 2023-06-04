<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('images/todo.png') }}">

    <title>TODO</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>
    <script src="https://kit.fontawesome.com/af57bf2882.js" crossorigin="anonymous"></script>
    @vite(['resources/js/app.js', 'resources/sass/app.scss'])
    <!-- Styles -->

</head>
<body>
<main class="main-content border-radius-lg">
    @yield('content')
</main>

</body>
</html>
