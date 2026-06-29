<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajout de commande</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    
    <h1>Ajout d'une commande</h1>
    <form action="{{route('commandes.store')}}" method="POST">
        @csrf
        @method('post')
        <h3>Client concerné</h3>
        <select name="client_id" required>
            <option value="">Selectioner un client</option>
            @foreach($clients as $client)
            <option value="{{$client->id }}" >{{$client->nom }}</option>
            @endforeach
        </select><br>
        <h3>Produit(s) commandé(s)</h3>
        @foreach($produits as $produit)
        <label >{{$produit->nom_prod }}</label>
        <input type="checkbox" name="produits[{{$produit->id }}][selected]" value="1">
        
        <label >Quantité</label>
        <input type="number" name="produits[{{$produit->id }}][quantite]" min=1 value="1">
        <br>
        @endforeach

        <label>Date de la commande</label>
        <input type="date" name="date_comm" required>
        <div>
            <input type="submit"  value="Ajouter la commade">
        </div>
    </form>
</body>
</html>