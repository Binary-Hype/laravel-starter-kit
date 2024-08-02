<!DOCTYPE html>
<html class="scroll-smooth" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
        <link rel="icon" type="image/x-icon" href="/img/logo.svg">

        <title>{{ $title ?? 'Laravel Starter Kit' }}</title>

        @googlefonts

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @if (isset($metaDescription))
            <meta name="description" content="{{ $metaDescription }}"/>
        @endif
    </head>
    <body class="antialiased font-sans">
        <!-- Navbar -->
        <div>
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
            <a href="/forgot-password">Forgot</a>
        </div>

        {{ $slot }}

        <!-- Footer -->
    </body>
</html>
