<x-app-layout :categories="$categories">
    <section class="py-8">
        <div class="container mx-auto px-4">

            <!-- Titre de la catégorie -->
            <h2 class="text-4xl font-bold text-center text-brown dark:text-brown mb-8 animate-fade-in">
                {{ $categorie->categorie }}
            </h2>

            <!-- Liste des produits -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 animate-fade-in">
                @forelse ($produits as $index => $produit)
                    <div class="bg-white border border-gold shadow-md rounded-lg p-4 
                                                        transition-transform transform hover:scale-105 active:scale-95 group 
                                                        animate-slide-up delay-[{{ $index * 100 }}ms]">
                        <a href="{{ route('produit.show', ['id' => $produit->id]) }}">
                            <img src="{{ asset($produit->image) }}" alt="{{ $produit->nom }}" class="w-full h-48 object-cover rounded mb-4 transition-transform 
                                                                transform group-hover:scale-105">
                        </a>
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

            <!-- Pagination -->
            @if ($produits->hasPages())
                <div class="mt-8 flex justify-center animate-fade-in">
                    {{ $produits->links('pagination::tailwind') }}
                </div>
            @endif

        </div>
    </section>
</x-app-layout>