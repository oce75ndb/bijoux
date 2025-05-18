<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProduitController;
use App\Http\Controllers\Api\CategorieController;

Route::get('/produits', [ProduitController::class, 'index']);

Route::get('/categories', [CategorieController::class, 'index']);
Route::post('/categories', [CategorieController::class, 'store']);
Route::delete('/categories/{id}', [CategorieController::class, 'destroy']);