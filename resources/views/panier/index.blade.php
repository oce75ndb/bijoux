<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        
        <!-- Titre principal -->
        <h1 class="text-2xl font-bold mb-6">Votre panier</h1>

        @if(count($panier) > 0)
            <!-- Tableau du panier -->
            <table class="w-full border-collapse border border-brown">
                <thead>
                    <tr>
                        <th class="bg-white dark:bg-beige border border-brown px-4 py-2">Produit</th>
                        <th class="bg-white dark:bg-beige border border-brown px-4 py-2">Quantité</th>
                        <th class="bg-white dark:bg-beige border border-brown px-4 py-2">Prix</th>
                        <th class="bg-white dark:bg-beige border border-brown px-4 py-2">Total</th>
                        <th class="bg-white dark:bg-beige border border-brown px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($panier as $id => $article)
                        <tr>
                            <td class="border border-brown px-4 py-2">
                                {{ $article['nom'] }}
                            </td>
                            <td class="border border-brown px-4 py-2">
                                <div class="flex items-center">
                                    
                                    <!-- Bouton "-" -->
                                    <form method="POST" action="{{ route('panier.decrementer', $id) }}">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" 
                                                class="bg-white dark:bg-beige text-black px-2 py-1 rounded"
                                                @if($article['quantite'] <= 1) disabled @endif>
                                            -
                                        </button>
                                    </form>

                                    <!-- Quantité actuelle -->
                                    <span class="mx-2">{{ $article['quantite'] }}</span>

                                    <!-- Bouton "+" -->
                                    <form method="POST" action="{{ route('panier.incrementer', $id) }}">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" 
                                                class="bg-white dark:bg-beige text-black px-2 py-1 rounded">
                                            +
                                        </button>
                                    </form>
                                </div>
                            </td>
                            <td class="border border-brown px-4 py-2">
                                {{ number_format($article['prix'], 2) }} €
                            </td>
                            <td class="border border-brown px-4 py-2">
                                {{ number_format($article['prix'] * $article['quantite'], 2) }} €
                            </td>
                            <td class="border border-brown px-4 py-2">
                                <!-- Bouton pour supprimer l'article -->
                                <form method="POST" action="{{ route('panier.supprimer', $id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="font-bold text-gold dark:text-brown">
                                        Supprimer
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Montant total -->
            <div class="mt-6 text-right">
                <h2 class="text-2xl font-bold">
                    Montant total : {{ number_format($total, 2) }} €
                </h2>
            </div>

            <!-- Bouton passer à la caisse -->
            <div class="mt-4">
                <a href="{{ route('checkout') }}" 
                   class="bg-gold text-white dark:bg-brown dark:text-beige px-4 py-2 rounded">
                    Passer à la caisse
                </a>            
            </div>
        @else
            <p>Votre panier est vide.</p>
        @endif
        
    </div>
</x-app-layout>
