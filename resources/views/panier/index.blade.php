<x-app-layout :categories="$categories">
    <div class="container mx-auto px-4 py-8" id="panier-container">
        <div class="container mx-auto px-4 py-8" id="panier-container">
            @include('panier._contenu')
        </div>        
    </div>

    <script>
    function recalculerMontantTotal() {
        let total = 0;
        document.querySelectorAll('#total').forEach(element => {
            let montant = parseFloat(element.innerText.replace('€', '').replace(',', '.'));
            total += montant;
        });
        document.querySelector('#panier-total').innerText = total.toFixed(2) + ' €';
    }

    function modifierQuantite(url, bouton) {
        // Récupérer le conteneur de la ligne courante
        const ligne = bouton.closest('tr');

        const qteElement = ligne.querySelector('#qte');
        const prixElement = ligne.querySelector('#prix_article');
        const totalElement = ligne.querySelector('#total');

        let currentQte = parseInt(qteElement.innerText);

        if (url.includes('decrementer') && currentQte <= 1) {
            return;
        }

        fetch(url, {
            method: 'PUT',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            }
        }).then(() => {
            let nouvelleQte = currentQte + (url.includes('incrementer') ? 1 : -1);
            qteElement.innerText = nouvelleQte;

            let prix = parseFloat(prixElement.innerText.replace('€', '').replace(',', '.'));
            totalElement.innerText = (prix * nouvelleQte).toFixed(2) + ' €';

            recalculerMontantTotal();
        });
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
