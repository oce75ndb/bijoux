<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProduitController;
use App\Http\Controllers\Api\CategorieController;
use App\Http\Controllers\Api\StyleController;
use App\Http\Controllers\Api\MateriauController;
use App\Http\Controllers\Api\FabricationController;

Route::get('/produits', [ProduitController::class, 'index']);
Route::post('/produits', [ProduitController::class, 'store']);
Route::delete('/produits/{id}', [ProduitController::class, 'destroy']);

Route::get('/categories', [CategorieController::class, 'index']);
Route::post('/categories', [CategorieController::class, 'store']);
Route::delete('/categories/{id}', [CategorieController::class, 'destroy']);

Route::get('/styles', [StyleController::class, 'index']);
Route::post('/styles', [StyleController::class, 'store']);
Route::delete('/styles/{id}', [StyleController::class, 'destroy']);

Route::get('/materiaux', [MateriauController::class, 'index']);
Route::post('/materiaux', [MateriauController::class, 'store']);
Route::delete('/materiaux/{id}', [MateriauController::class, 'destroy']);

Route::get('/fabrications', [FabricationController::class, 'index']);
Route::post('/fabrications', [FabricationController::class, 'store']);
Route::delete('/fabrications/{id}', [FabricationController::class, 'destroy']);