<!DOCTYPE html>
<html lang="fr">

<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/accueil.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <main>
        @yield('content')
    </main>
</body>

</html>
