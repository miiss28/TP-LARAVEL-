<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>produit</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <h2>Liste des produits</h2>
    <a href="{{route('produits.create')}}">Ajouter un produit</a>
    <div>
        <table border="1">
            <tr>
                <th>Reference</th>
                <th>Nom</th>
                <th>prix unitaire</th>
                <th>Quantité en stock</th>
                <th>description</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
            @foreach($produits as $produit)
            <tr>
                <td>{{$produit->ref_prod}}</td>
                <td>{{$produit->nom_prod}}</td>
                <td>{{$produit->prix_prod}}</td>
                <td>{{$produit->qtt_prod}}</td>
                <td>{{$produit->desc_prod}}</td>
                <td>
                    <a href="{{ route('produits.edit',['produit'=>$produit]) }}">Modifier</a>
                </td>
                <td>
                    <form action="{{ route('produits.destroy', ['produit' =>$produit]) }}" method="post">                
                    @csrf
                    @method('delete')
                    <input type="submit" value="Supprimer">
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</body>
</html>