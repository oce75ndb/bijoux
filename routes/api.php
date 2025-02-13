<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/produits', function (Request $request) {
    return response()->json(\App\Models\Produit::all()); 
});
// ->middleware('auth:sanctum');