<x-app-layout :categories="$categories">
    
    <section class="py-12">
        <div class="container mx-auto px-8">
            <!-- Section principale -->
            <div class="bg-white shadow-md rounded-lg overflow-hidden flex items-center space-x-8 p-8 
                        animate-fade-in">

                <!-- Image du produit -->
                <div class="flex-shrink-0 w-1/3 bg-gold shadow-md rounded-lg 
                            animate-zoom-in">
                    <img src="{{ asset($produit->image) }}" alt="{{ $produit->nom }}"
                        class="w-full h-80 object-cover rounded-lg">
                </div>

                <!-- Informations du produit -->
                <div class="w-2/3 text-right">

                    <!-- Nom du produit -->
                    <h2 class="text-4xl font-bold mb-4 text-brown dark:text-brown animate-slide-up">
                        {{ $produit->nom }}
                    </h2>

                    <!-- Prix -->
                    <p class="text-3xl font-bold text-gold mb-4 animate-slide-up delay-100">
                        {{ number_format($produit->prix, 2) }} €
                    </p>

                    <!-- Disponibilité -->
                    <p class="text-lg font-semibold mb-6 animate-slide-up delay-200">
                        @if ($produit->stock > 0)
                            <span class="text-green-600">
                                En stock : {{ $produit->stock }} disponibles
                            </span>
                        @else
                            <span class="text-red-600">Rupture de stock</span>
                        @endif
                    </p>

                    <!-- Description -->
                    <p class="text-brown dark:text-brown text-lg mb-6 leading-relaxed animate-slide-up delay-300">
                        {{ $produit->description }}
                    </p>

                    <!-- Détails du produit -->
                    <h3 class="text-2xl font-bold mt-8 mb-4 text-brown dark:text-brown animate-slide-up delay-400">
                        Détails du produit
                    </h3>
                    <div class="text-brown dark:text-brown text-right space-y-2 animate-slide-up delay-500">
                        <p>Matériaux : {{ $produit->materiau->materiau }}</p>
                        <p>Style : {{ $produit->style->style }}</p>
                        <p>Dimensions : {{ $produit->dimensions }}</p>
                        <p>Fabrication : {{ $produit->fabrication->fabrication }}</p>
                    </div>

                    <!-- Bouton pour ajouter au panier -->
                    @if ($produit->stock > 0)
                        <div class="mt-6 animate-slide-up delay-600">
                            <form method="POST" action="{{ route('panier.ajouter') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $produit->id }}">
                                <input type="hidden" name="nom" value="{{ $produit->nom }}">
                                <input type="hidden" name="prix" value="{{ $produit->prix }}">
                                <button type="submit" class="bg-gold text-beige py-3 px-8 rounded text-lg font-semibold inline-block 
                                                   hover:scale-105 active:scale-95 transition-transform duration-300">
                                    Ajouter au panier
                                </button>
                            </form>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </section>
</x-app-layout>