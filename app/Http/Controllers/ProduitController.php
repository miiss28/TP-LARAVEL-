<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produits=produit::all();
        return view('produits.index', ['produits'=>$produits]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produits.ajouter');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $numero=Produit::count('ref_prod') +1;
    $reference = 'PROD' . str_pad($numero, 4, '0', STR_PAD_LEFT);
    $data=$request->validate([
        'nom_prod'=> 'required',
        'prix_prod'=> 'required|numeric',
        'qtt_prod'=> 'required|numeric',
        'desc_prod'=> 'nullable'
    ]);

    $data['ref_prod']=$reference;
    
        $newproduit=Produit::create($data);
        $newproduit->id = $numero;
        $newproduit->save();
        return redirect(route('produits.index'))->with('success','Produit ajouté!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Produit $produit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produit $produit)
    {
       return view('produits.modifier', ['produit'=>$produit]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produit $produit)
    {

        $data=$request->validate([
            'nom_prod'=>'required',
            'prix_prod'=>'required|numeric',
            'qtt_prod'=>'required|numeric',
            'desc_prod'=>'nullable',
        ]);
        
            $produit->update($data);
            return redirect(route('produits.index'))->with('success','produit modifiée!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produit $produit)
    {
         $produit->delete($produit);
        return redirect(route('produits.index'))->with('success','produit supprimé!');
    }
}
