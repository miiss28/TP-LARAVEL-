<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un produit</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <h2>Modifier le client {{($produit->{'id'})}}</h2>
    <form action="{{ route('produits.update', ['produit'=>$produit]) }}" method="post">

        @csrf
        @method('put')
        <div>
            <label >Nom</label>
            <input type="name" placeholder="Nom du produit" name="nom_prod" value="{{($produit->{'nom_prod'})}}" required>
        </div>
        <div>
            <label >Prix</label>
            <input type="name" placeholder="Prix" name="prix_prod" value="{{ ($produit->{'prix_prod'}) }}"required>
        </div>
        
        <div>
            <label >Quantite en stock</label>
            <input type="name" placeholder="Quantite" name="qtt_prod" value="{{ ($produit->{'qtt_prod'}) }}"required>
        </div>
        <div>
            <label >Description</label>
            <input type="text" placeholder="Description" name="desc_prod" value="{{ ($produit->{'desc_prod'}) }}" >
        </div>
        <div>
            <input type="submit"  value="Modifier">
        </div>
    </form>

</body>
</html>