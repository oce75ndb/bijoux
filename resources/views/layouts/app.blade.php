@props(['categories'])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Océan de Bijoux' }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..800;1,400..800&display=swap"
        rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-beige dark:bg-gold">

        <!-- Navigation -->
        @include('layouts.navigation')

        <!-- Page Content -->
        <main class="bg-beige dark:bg-gold">
            {{ $slot }}
        </main>        

        <!-- Pied de page -->
        <footer class="bg-beige dark:bg-gold py-8">
            <div class="container mx-auto px-4 py-4 shadow-md rounded-lg border border-gold dark:border-brown">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 justify-center text-center max-w-xl mx-auto">
                    <!-- Colonne 1 : Liens utiles -->
                    <div>
                        <h4 class="text-lg font-bold text-brown dark:text-brown">Liens utiles</h4>
                        <ul class="mt-4 space-y-2">
                            <li><a href="{{ route('page.static', 'retours') }}" class="text-gold dark:text-beige hover:underline">Retours et
                                    remboursements</a></li>
                            <li><a href="{{ route('page.static', 'mentions-legales') }}" class="text-gold dark:text-beige hover:underline">Mentions légales</a></li>
                            <li><a href="{{ route('page.static', 'cgv') }}" class="text-gold dark:text-beige hover:underline">CGV</a></li>
                        </ul>
                    </div>
                    <!-- Colonne 2 : Contact -->
                    <div>
                        <h4 class="text-lg font-bold text-brown dark:text-brown">Contact</h4>
                        <ul class="mt-4 space-y-2">
                            <li><a href="{{ route('contact') }}" class="text-gold dark:text-beige hover:underline">Nous écrire</a></li>
                            <li><a href="{{ route('page.static', 'collaborations') }}" class="text-gold dark:text-beige hover:underline">Collaborations</a></li>
                            <li><a href="{{ route('page.static', 'nous-distribuer') }}" class="text-gold dark:text-beige hover:underline">Nous distribuer</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="container text-center mx-auto px-4 py-4">
                <p class="text-brown dark:text-brown">&copy; {{ date('Y') }} Océan de Bijoux
                    - Tous droits réservés</p>
            </div>
        </footer>
    </div>
</body>

</html>