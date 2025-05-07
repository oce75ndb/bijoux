<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commande;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Commandeligne;

class CommandeController extends Controller
{
    public function historique()
    {
        $commandes = Commande::with('commandeligne.produit')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('historique', compact('commandes'));
    }

    public function facture($id)
    {
        $commande = Commande::with('lignes')->where('id', $id)
            ->where('user_id', Auth::id())->firstOrFail();

        $pdf = Pdf::loadView('commandes.facture', compact('commande'));

        return $pdf->download('facture-commande-' . $commande->id . '.pdf');
    }
}
