<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProduitController;
use App\Http\Controllers\Api\CategorieController;

Route::get('/produits',[ProduitController::class,'index']);

Route::get('/categories',[CategorieController::class,'index']);
