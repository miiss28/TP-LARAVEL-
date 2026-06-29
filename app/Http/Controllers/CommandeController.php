<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Client;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommandeController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $commandes=Commande::with('client')->get();
        $commandes=Commande::all();
        return view('commandes.index',['commandes'=>$commandes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients=Client::all();
        $produits=produit::all();
        return view('commandes.ajouter', ['clients'=>$clients,'produits'=>$produits]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $valide=false;
    foreach($request->produits as $data){
    if(array_key_exists('selected',$data))  {  
                $valide=true; 
                break;
            }
    }
    if ($valide==false) return back()->with('error','Impossible d enregistrer une commande sans produits');
    else{
    $numero=Commande::count('id') +1;
    $reference = 'CMND' . str_pad($numero, 4, '0', STR_PAD_LEFT);
        $commande=Commande::create([
            'num_comm'=>$reference,
            'client_id'=> $request->client_id,
            'date_comm'=>$request->date_comm,
            'total_comm'=>0
        ]);
    $total=0;
        foreach($request->produits as $produitId=>$data){
            if(isset($data['selected'])){
                $produit=Produit::where('id', $produitId)->first();
                $prix=$produit->prix_prod;
                $quantite=$data['quantite'];
                $montant=$quantite*$prix;

                DB::table('commande_produit')->insert([
                    'commande_id'=>$commande->id,
                    'produit_id'=>$produitId,
                    'qtt_comm'=>$data['quantite'],
                    'prix_unit'=>$prix,
                    'total_prod'=>$montant,
                    'created_at'=>now(),
                    'updated_at'=>now(),

                ]);
                
            $total+=$montant;
            }
        }
        $commande->update([
            'total_comm'=>$total
        ]);
        return redirect(route('commandes.index'))->with('success','Commande enregistré!');
    }}
    /**
     * Display the specified resource.
     */
    public function show(Commande $commande)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Commande $commande)
    {
        $clients=Client::all();
        $produits=produit::all();
        return view('commandes.modifier',['commande'=>$commande, 'clients'=>$clients, 'produits'=>$produits]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Commande $commande)
    {
        $commande->update([
            'client_id'=> $request->client_id,
            'date_comm'=>$request->date_comm,
        ]);

        DB::table('commande_produit')->where('commande_id', $commande->id)->delete();

        $total=0;
        if($request->has('produits')){
            foreach($request->produits as $produitId=>$data){
                if(isset($data['selected'])){
                    $produit=Produit::where('id', $produitId)->first();
                    $prix=$produit->prix_prod;
                    $quantite=$data['quantite'];
                    $montant=$quantite*$prix;

                    DB::table('commande_produit')->insert([
                        'commande_id'=>$commande->id,
                        'produit_id'=>$produitId,
                        'qtt_comm'=>$data['quantite'],
                        'prix_unit'=>$prix,
                        'total_prod'=>$montant,
                        'created_at'=>now(),
                        'updated_at'=>now(),
                    ]);

                    $total+=$montant;
                }
            }
        }

        $commande->update([
            'total_comm'=>$total
        ]);

        return redirect(route('commandes.index'))->with('success','Commande modifiée!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Commande $commande)
    {
        $commande->delete();
        return redirect(route('commandes.index'))->with('success','commande supprimé!');
    }
    public function facture(Commande $commande)
{
    $commande1 = Commande::with('client', 'produits')->findOrFail($commande->id);
    return view('commandes.facture',compact('commande1'));
}
}
