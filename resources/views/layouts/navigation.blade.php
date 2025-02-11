<nav x-data="{ open: false, userDropdown: false, guestDropdown: false, categoryDropdown: false }">
    <!-- Barre de navigation principale -->
    <header class="bg-gold dark:bg-brown shadow-md py-6 animate-fade-in-down">
        <div class="container mx-auto px-4 flex justify-between items-center">
            
            <a href="{{ route('home') }}" class="flex items-center space-x-3 text-brown dark:text-beige hover:text-beige transition-all duration-300">
                <!-- Logo -->
                <img src="{{ asset('images/B.png') }}" alt="Logo" 
                     class="w-10 h-10 md:w-12 md:h-12 rounded-full shadow-lg border-2 border-beige dark:border-brown transition-transform transform hover:scale-105">
                
                <!-- Titre -->
                <span class="text-xl md:text-2xl font-bold tracking-wide">
                    Océan de Bijoux
                </span>
            </a>            

            <!-- Icône du menu hamburger (Mobile) -->
            <button @click="open = !open" class="md:hidden text-brown dark:text-beige focus:outline-none transition-transform transform hover:scale-110">
                ☰
            </button>

            <!-- Navigation principale (Desktop) -->
            <nav class="hidden md:flex space-x-6 items-center">
                
                <!-- Barre de recherche -->
                <form action="{{ route('produits.index') }}" method="GET" class="relative w-full md:w-80">
                    <input 
                        type="text" name="search" placeholder="Rechercher un produit..." 
                        value="{{ request('search') }}" 
                        class="w-full px-4 py-2 pr-10 border border-beige rounded-full focus:outline-none 
                               focus:ring-2 focus:ring-gold focus:border-transparent bg-white dark:bg-brown dark:text-beige transition-all duration-300 hover:shadow-md"
                    />
                    <button type="submit" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-brown dark:text-beige transition-transform transform hover:scale-110">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" 
                                  d="M21 21l-4.35-4.35M17 10A7 7 0 1110 3a7 7 0 017 7z" />
                        </svg>
                    </button>
                </form>                

                <!-- Catégories -->
                <div class="relative">
                    <ul class="flex space-x-4">
                        @foreach ($categories as $categorie)
                            <li>
                                <a href="{{ route('categorie.produits', ['id' => $categorie->id]) }}" 
                                   wire:navigate
                                   class="hover:text-beige text-brown dark:text-beige transition-all duration-300 hover:scale-105">
                                    {{ $categorie->categorie }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Panier -->
                <a href="{{ route('panier.index') }}" class="font-bold hover:text-beige text-brown dark:text-beige transition-all duration-300 hover:scale-105">
                    Panier 
                    @if(session()->has('panier') && count(session()->get('panier')) > 0)
                        ({{ count(session()->get('panier')) }})
                    @endif
                </a>

                <!-- Menu Utilisateur -->
                @guest
                    <!-- Profil invité (Log In / Inscription) -->
                    <div class="relative">
                        <button @click="guestDropdown = !guestDropdown" 
                                class="flex items-center space-x-2 text-brown dark:text-beige hover:text-beige transition-transform transform hover:scale-105">
                                <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3a3 3 0 11-.001 6.001A3 3 0 0112 5zm0 14.2c-2.5 0-4.71-1.28-6-3.22 0-2 4-3.08 6-3.08s6 1.08 6 3.08c-1.29 1.94-3.5 3.22-6 3.22z"/>
                                </svg>
                        </button>
                        <ul x-show="guestDropdown" @click.away="guestDropdown = false"
                            class="absolute right-0 mt-2 bg-white dark:bg-brown shadow-md rounded-lg w-40 transition-all duration-300 opacity-1 translate-y-2"
                            x-transition:enter="opacity-1 translate-y-2"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-1 translate-y-2">
                            <li><a href="{{ route('login') }}" class="block px-4 py-2 hover:bg-gold dark:hover:bg-gray-700">Connexion</a></li>
                            <li><a href="{{ route('register') }}" class="block px-4 py-2 hover:bg-gold dark:hover:bg-gray-700">Inscription</a></li>
                        </ul>
                    </div>
                @endguest

                @auth
                    <!-- Profil utilisateur -->
                    <div class="relative">
                        <button @click="userDropdown = !userDropdown" 
                                class="flex items-center space-x-2 text-brown dark:text-beige hover:text-beige transition-transform transform hover:scale-105">
                                <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3a3 3 0 11-.001 6.001A3 3 0 0112 5zm0 14.2c-2.5 0-4.71-1.28-6-3.22 0-2 4-3.08 6-3.08s6 1.08 6 3.08c-1.29 1.94-3.5 3.22-6 3.22z"/>
                                </svg>
                                <span>{{ Auth::user()->name }}</span>
                        </button>
                        <ul x-show="userDropdown" @click.away="userDropdown = false"
                            class="absolute right-0 mt-2 bg-white dark:bg-brown shadow-md rounded-lg w-40 transition-all duration-300 opacity-1 translate-y-2"
                            x-transition:enter="opacity-1 translate-y-2"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-1 translate-y-2">
                            <li><a href="{{ route('profile.edit') }}" class="block px-4 py-2 hover:bg-gold dark:hover:bg-gray-700">Profil</a></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="block px-4 py-2 w-full text-left hover:bg-gold dark:hover:bg-gray-700">
                                        Déconnexion
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @endauth
            </nav>
        </div>
    </header>
</nav>
