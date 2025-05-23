<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProduitController;
use App\Http\Controllers\Api\CategorieController;
use App\Http\Controllers\Api\StyleController;
use App\Http\Controllers\Api\MateriauController;
use App\Http\Controllers\Api\FabricationController;
use App\Http\Controllers\Api\AuthController;

Route::post('/login', [AuthController::class, 'login']);

Route::get('/produits', [ProduitController::class, 'index']);
Route::middleware('auth:sanctum')->post('/produits', [ProduitController::class, 'store']);
Route::middleware('auth:sanctum')->delete('/produits/{id}', [ProduitController::class, 'destroy']);

Route::get('/categories', [CategorieController::class, 'index']);
Route::middleware('auth:sanctum')->post('/categories', [CategorieController::class, 'store']);
Route::middleware('auth:sanctum')->put('/categories/{id}', [CategorieController::class, 'update']);
Route::middleware('auth:sanctum')->delete('/categories/{id}', [CategorieController::class, 'destroy']);

Route::get('/styles', [StyleController::class, 'index']);
Route::middleware('auth:sanctum')->post('/styles', [StyleController::class, 'store']);
Route::middleware('auth:sanctum')->put('/styles/{id}', [StyleController::class, 'update']);
Route::middleware('auth:sanctum')->delete('/styles/{id}', [StyleController::class, 'destroy']);

Route::get('/materiaux', [MateriauController::class, 'index']);
Route::middleware('auth:sanctum')->post('/materiaux', [MateriauController::class, 'store']);
Route::middleware('auth:sanctum')->delete('/materiaux/{id}', [MateriauController::class, 'destroy']);

Route::get('/fabrications', [FabricationController::class, 'index']);
Route::middleware('auth:sanctum')->post('/fabrications', [FabricationController::class, 'store']);
Route::middleware('auth:sanctum')->delete('/fabrications/{id}', [FabricationController::class, 'destroy']);