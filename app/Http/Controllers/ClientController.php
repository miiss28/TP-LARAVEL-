<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients=client::all();
        return view('clients.index',['clients'=>$clients]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clients.creer');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $data=$request->validate([
            'nom'=> 'required',
            'prenom'=>'required',
            'telephone'=> 'required',
            'adresse'=> 'required',
            'email'=> 'required',
        ]);
        $newclient=Client::create($data);
        return redirect(route('clients.index'))->with('success','Client ajouté!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        return view('clients.modifier', ['client' =>$client]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {

        $data=$request->validate([
            'nom'=>'required',
            'prenom'=>'required',
            'telephone'=>'required',
            'adresse'=>'required',
            'email'=>'required'
        ]);
        
            $client->update($data);
            return redirect(route('clients.index'))->with('success','Client modifiée!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $client->delete();
        return redirect(route('clients.index'))->with('success','Client supprimé!');
    }
}
