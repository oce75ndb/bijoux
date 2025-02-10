<x-app-layout>
    
    <div class="container mx-auto px-4 py-8">
        
        <!-- Titre principal -->
        <h1 class="text-3xl font-bold text-brown dark:text-beige mb-6 text-center">Votre Panier</h1>

        @if(count($panier) > 0)
            <!-- Tableau du panier -->
            <div class="overflow-x-auto">
                <table class="w-full border-collapse border border-brown rounded-lg shadow-md">
                    <thead>
                        <tr class="bg-gold dark:bg-brown text-white">
                            <th class="border border-brown px-4 py-3 text-left">Produit</th>
                            <th class="border border-brown px-4 py-3">Quantité</th>
                            <th class="border border-brown px-4 py-3">Prix</th>
                            <th class="border border-brown px-4 py-3">Total</th>
                            <th class="border border-brown px-4 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-beige">
                        @foreach($panier as $id => $article)
                            <tr class="">
                                <!-- Image + Nom du produit -->
                                <td class="border border-brown px-4 py-3 flex items-center space-x-4">
                                @if ($article['image'] !== null)
                                <img src="{{ asset($article['image']) }}"
                                alt="{{ $article['nom'] }}"
                                @endif
                                class="w-16 h-16 rounded shadow-md">
                                    <span class="font-semibold text-brown dark:text-brown">{{ $article['nom'] }}</span>
                                </td>
                                
                                <!-- Quantité avec boutons "+" et "-" -->
                                <td class="border border-brown px-4 py-3 text-center">
                                    <div class="flex items-center justify-center space-x-3">
                                        
                                        <!-- Bouton "-" -->
                                        <form method="POST" action="{{ route('panier.decrementer', $id) }}">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" 
                                                    class="bg-gray-200 dark:bg-brown text-brown px-3 py-1 rounded-full hover:bg-gray-300"
                                                    @if($article['quantite'] <= 1) disabled @endif>
                                                -
                                            </button>
                                        </form>

                                        <!-- Quantité actuelle -->
                                        <span class="text-lg font-semibold">{{ $article['quantite'] }}</span>

                                        <!-- Bouton "+" -->
                                        <form method="POST" action="{{ route('panier.incrementer', $id) }}">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" 
                                                    class="bg-gray-200 dark:bg-brown text-brown px-3 py-1 rounded-full hover:bg-gray-300">
                                                +
                                            </button>
                                        </form>
                                    </div>
                                </td>

                                <!-- Prix unitaire -->
                                <td class="border border-brown px-4 py-3 text-center">
                                    <span class="font-semibold text-gold">{{ number_format($article['prix'], 2) }} €</span>
                                </td>

                                <!-- Total du produit -->
                                <td class="border border-brown px-4 py-3 text-center">
                                    <span class="font-semibold text-gold">{{ number_format($article['prix'] * $article['quantite'], 2) }} €</span>
                                </td>

                                <!-- Suppression du produit -->
                                <td class="border border-brown px-4 py-3 text-center">
                                    <form method="POST" action="{{ route('panier.supprimer', $id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="font-bold text-red-500 hover:text-red-700 transition">
                                            ❌ Supprimer
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Montant total -->
            <div class="mt-6 text-right">
                <h2 class="text-2xl font-bold text-brown dark:text-beige">
                    Montant total : <span class="text-gold">{{ number_format($total, 2) }} €</span>
                </h2>
            </div>

            <!-- Bouton passer à la caisse -->
            <div class="mt-6 text-center">
                <a href="{{ route('checkout') }}" 
                   class="bg-gold text-white dark:bg-brown dark:text-beige px-6 py-3 rounded-lg text-lg font-semibold shadow-md hover:bg-brown dark:hover:bg-gold transition">
                    Passer à la caisse
                </a>            
            </div>

        @else
            <!-- Message Panier Vide -->
            <div class="text-center mt-10">
                <p class="text-xl font-semibold text-brown dark:text-beige">Votre panier est vide.</p>
                <a href="{{ route('produits.index') }}" class="mt-4 inline-block bg-gold text-white dark:bg-brown dark:text-beige px-6 py-3 rounded-lg shadow-md hover:bg-brown dark:hover:bg-gold transition">
                    Découvrir nos produits
                </a>
            </div>
        @endif
        
    </div>
</x-app-layout>
