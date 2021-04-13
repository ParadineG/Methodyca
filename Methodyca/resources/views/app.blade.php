<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" crossorigin>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <?php
            if ($_SERVER['REQUEST_URI'] == '/' || $_SERVER['REQUEST_URI'] == ''
            || strpos($_SERVER['REQUEST_URI'], 'database')
            || strpos($_SERVER['REQUEST_URI'], 'admin')
            || strpos($_SERVER['REQUEST_URI'], 'register')
            || strpos($_SERVER['REQUEST_URI'], 'login')
            || strpos($_SERVER['REQUEST_URI'], 'forgot-password')
            || strpos($_SERVER['REQUEST_URI'], 'reset-password')
            || strpos($_SERVER['REQUEST_URI'], 'dashboard')
            || strpos($_SERVER['REQUEST_URI'], 'edit-topic')
            || strpos($_SERVER['REQUEST_URI'], 'profile')) {
        ?>
        <!-- Scripts -->
        <script src="https://www.google.com/recaptcha/api.js?render=6LdQDp4aAAAAAKZX0uQ5-EdNWdAbmlbA2tO2WbBd"></script>
        <?php
            }
        ?>
        @routes
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        @inertia
    </body>
</html>
