<x-app-layout :categories="$categories">
    <div class="container mx-auto px-4 py-8" id="panier-container">
        <div class="container mx-auto px-4 py-8" id="panier-container">
            @include('panier._contenu')
        </div>        
    </div>

    <script>
        function modifierQuantite(url) {
            fetch(url, {
                method: 'PUT',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                }
            }).then(() => rafraichirPanier());
        }

        function supprimerProduit(url) {
            fetch(url, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                }
            }).then(() => rafraichirPanier());
        }

        function rafraichirPanier() {
            fetch("{{ route('panier.html') }}")
                .then(response => response.text())
                .then(html => {
                    document.querySelector('#panier-container').innerHTML = html;
                });
        }
    </script>
</x-app-layout>
