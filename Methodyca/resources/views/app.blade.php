<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="apple-touch-icon" sizes="180x180" href="/methodyca/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/methodyca/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/methodyca/favicon-16x16.png">
        <link rel="manifest" href="/methodyca/site.webmanifest">
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" crossorigin>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <?php
            if ($_SERVER['REQUEST_URI'] == '/' || $_SERVER['REQUEST_URI'] == ''
            || $_SERVER['REQUEST_URI'] == '/methodyca'
            || $_SERVER['REQUEST_URI'] == '/methodyca'.'/'
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
        <script src="https://www.google.com/recaptcha/api.js?render=<?php echo env('GOOGLE_RECAPTCHA_KEY');?>"></script>
        <?php
            }
        ?>
        <?php echo "<script> window.CAPTCHAKEY = '".env('GOOGLE_RECAPTCHA_KEY')."' </script>";?>

        @routes
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        @inertia
    </body>
</html>
