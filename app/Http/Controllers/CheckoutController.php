<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        // Logique pour afficher la page de paiement
        return view('checkout.index');
    }
}
