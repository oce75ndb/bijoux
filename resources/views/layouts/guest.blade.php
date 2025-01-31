<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-black dark:text-brown bg-beige dark:bg-gold">

        <div class="min-h-screen flex flex-col justify-center items-center pt-6 sm:pt-0">
            
            <!-- Logo -->
            <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-brown dark:text-black" />
                </a>
            </div>

            <!-- Contenu principal -->
            <div class="w-full sm:max-w-md mt-6 px-6 py-6 bg-white dark:bg-brown shadow-md sm:rounded-lg">
                {{ $slot }}
            </div>

        </div>
        
    </body>
</html>
