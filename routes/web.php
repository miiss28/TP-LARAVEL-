<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CommandeController;
use App\Models\Commande;
use App\Models\Client;
use App\Models\Produit;

Route::get('/', function () {
    return view('home', [
        'nbClients' => Client::count(),
        'nbProduits' => Produit::count(),
        'nbCommandes' => Commande::count(),
    ]);
});


Route::resource('produits', ProduitController::class);

Route::resource('clients', ClientController::class);

Route::resource('commandes', CommandeController::class);

Route::get('/commandes/{commande}/facture', [CommandeController::class, 'facture'])->name('commandes.facture');



