@if(count($panier) > 0)
    <div class="overflow-x-auto animate-fade-in">
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
                    <tr class="animate-slide-up delay-100ms]">
                        <td class="border border-brown px-4 py-3 flex items-center space-x-4">
                            @if ($article['image'])
                                <img src="{{ asset($article['image']) }}" alt="{{ $article['nom'] }}" class="w-16 h-16 rounded shadow-md transition-transform transform hover:scale-105">
                            @endif
                            <span class="font-semibold text-brown dark:text-brown">
                                {{ $article['nom'] }}
                            </span>
                        </td>

                        <td class="border border-brown px-4 py-3 text-center">
                            <div class="flex items-center justify-center space-x-3">
                                <button onclick="modifierQuantite('{{ route('panier.decrementer', $id) }}')" class="bg-gray-200 dark:bg-brown text-brown px-3 py-1 rounded-full hover:bg-gray-300 transition-transform transform hover:scale-105 active:scale-95" @if($article['quantite'] <= 1) disabled @endif>
                                    -
                                </button>
                                <span id="qte" class="text-lg font-semibold">
                                    {{ $article['quantite'] }}
                                </span>
                                <button onclick="modifierQuantite('{{ route('panier.incrementer', $id) }}')" class="bg-gray-200 dark:bg-brown text-brown px-3 py-1 rounded-full hover:bg-gray-300 transition-transform transform hover:scale-105 active:scale-95">
                                    +
                                </button>
                            </div>
                        </td>

                        <td class="border border-brown px-4 py-3 text-center">
                            <span id="prix_article" class="font-semibold text-gold">
                                {{ number_format($article['prix'], 2) }} €
                            </span>
                        </td>

                        <td class="border border-brown px-4 py-3 text-center">
                            <span id="total" class="font-semibold text-gold">
                                {{ number_format($article['prix'] * $article['quantite'], 2) }} €
                            </span>
                        </td>

                        <td class="border border-brown px-4 py-3 text-center">
                            <button onclick="supprimerProduit('{{ route('panier.supprimer', $id) }}')" class="font-bold text-red-500 hover:text-red-700 transition-transform transform hover:scale-110">
                                ❌ Supprimer
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-6 text-right animate-fade-in">
        <h2 class="text-2xl font-bold text-brown dark:text-beige">
            Montant total : <span class="text-gold">{{ number_format($total, 2) }} €</span>
        </h2>
    </div>

    <div class="mt-6 text-center animate-slide-up delay-200">
        <a href="{{ route('checkout') }}" class="bg-gold text-white dark:bg-brown dark:text-beige px-6 py-3 rounded-lg text-lg font-semibold shadow-md hover:bg-brown dark:hover:bg-gold transition-transform transform hover:scale-105 active:scale-95">
            Passer à la caisse
        </a>
    </div>
@else
    <div class="text-center mt-10 animate-fade-in">
        <p class="text-xl font-semibold text-brown dark:text-beige">
            Votre panier est vide.
        </p>
        <a href="{{ route('produits.index') }}" class="mt-4 inline-block bg-gold text-white dark:bg-brown dark:text-beige px-6 py-3 rounded-lg shadow-md hover:bg-brown dark:hover:bg-gold transition-transform transform hover:scale-105 active:scale-95">
            Découvrir nos produits
        </a>
    </div>
@endif