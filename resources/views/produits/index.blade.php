<x-app-layout> 
    <section class="py-8">
        <div class="container mx-auto px-4">
            
            <!-- Titre principal -->
            <h2 class="text-4xl font-bold text-center text-brown dark:text-brown mb-8 animate-fade-in">
                <a href="{{ route('produits.index') }}">Tous les Produits</a>
            </h2>

            <div class="flex flex-col md:flex-row md:space-x-4">
                
                <!-- Barre latérale -->
                <aside class="w-full md:w-1/4 bg-white p-4 border border-gold rounded-lg shadow 
                              animate-slide-left">
                    <h3 class="text-xl font-bold text-brown dark:text-brown mb-4">Filtres</h3>
                    <form action="{{ route('produits.index') }}" method="GET" class="space-y-4">
                        
                        <!-- Recherche -->
                        <div>
                            <label for="search" class="sr-only">Rechercher :</label>
                            <input 
                                type="text" id="search" name="search" 
                                placeholder="Nom du produit..." 
                                value="{{ request('search') }}" 
                                class="w-full p-2 border border-gold rounded focus:outline-none 
                                       focus:ring-2 focus:ring-gold focus:border-transparent 
                                       transition-all duration-300 hover:shadow-md"
                            >
                        </div>
                        <button 
                            type="submit" 
                            class="bg-brown dark:bg-brown text-beige px-4 py-2 w-full rounded hover:bg-gold 
                                   transition-transform transform hover:scale-105 active:scale-95">
                            Chercher
                        </button>

                        <!-- Filtre par catégorie -->
                        <div>
                            <label for="categorie" class="text-brown dark:text-brown font-medium">
                                Catégories :
                            </label>
                            <select id="categorie" name="categorie" 
                                    class="w-full p-2 border border-gold rounded transition-all 
                                           hover:shadow-md focus:ring-2 focus:ring-gold">
                                <option value="">Toutes les catégories</option>
                                @foreach ($categories as $categorie)
                                    <option value="{{ $categorie->id }}" 
                                            {{ request('categorie') == $categorie->id ? 'selected' : '' }}>
                                        {{ $categorie->categorie }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Bouton Filtrer -->
                        <button type="submit" 
                                class="bg-brown dark:bg-brown text-beige py-2 px-4 w-full rounded hover:bg-gold 
                                       transition-transform transform hover:scale-105 active:scale-95">
                            Appliquer
                        </button>
                    </form>
                </aside>

                <!-- Liste des produits -->
                <div class="w-full md:w-3/4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mt-8 md:mt-0">
                    @forelse ($produits as $index => $produit)
                        <div class="bg-white border border-gold shadow-md rounded-lg p-4 
                                    transition-transform transform hover:scale-105 active:scale-95 group 
                                    animate-slide-up delay-[{{ $index * 100 }}ms]">
                            <img src="{{ asset($produit->image) }}" 
                                 alt="{{ $produit->nom }}" 
                                 class="w-full h-48 object-cover rounded mb-4">
                            <h3 class="text-xl font-bold text-brown dark:text-brown">
                                {{ $produit->nom }}
                            </h3>
                            <p class="text-brown dark:text-brown mb-2">
                                {{ $produit->description }}
                            </p>
                            <p class="text-gold font-bold mb-4">
                                {{ number_format($produit->prix, 2) }} €
                            </p>
                            <a href="{{ route('produit.show', ['id' => $produit->id]) }}" 
                               class="block bg-brown dark:bg-brown text-beige py-2 px-4 rounded text-center 
                                      transition-transform transform group-hover:bg-gold hover:scale-105">
                                Voir le produit
                            </a>
                        </div>
                    @empty
                        <p class="text-center text-brown dark:text-brown animate-fade-in">
                            Aucun produit trouvé pour cette catégorie.
                        </p>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
