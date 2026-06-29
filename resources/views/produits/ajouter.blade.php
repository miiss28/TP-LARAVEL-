<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=h, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajouter un produit</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <h2>Ajouter un produit</h2>
     <form action="{{route('produits.store')}}" method="POST">
        @csrf
        @method('post')
        <div>
            <label >Nom</label>
            <input type="name" placeholder="Nom" name="nom_prod" required>
        </div>
        <div>
            <label >Prix Unitaire</label>
            <input type="name" placeholder="Prix" name="prix_prod" required>
        </div>
        
        <div>
            <label >Quantité en stock</label>
            <input type="name" placeholder="Quantité" name="qtt_prod" required>
        </div>
        <div>
            <label >Description</label>
            <input type="text" placeholder="description" name="desc_prod">
        </div>
        <div>
            <input type="submit"  value="Ajouter le produit">
        </div>
    </form>
</body>
</html>