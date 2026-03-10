<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Poli Gigi Paoman') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,800&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
    .wave-shape {
        /* Titik kiri atas kita geser ke 15% agar tidak menabrak teks form */
        clip-path: polygon(15% 0%, 100% 0%, 100% 100%, 0% 100%);
    }
    @media (max-width: 1024px) {
        .wave-shape { clip-path: none; }
    }
</style>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen bg-white">
            {{ $slot }}
        </div>
    </body>
</html>