<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Commande</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <h2>Liste des commandes</h2>
    <a href="{{route('commandes.create')}}">Ajouter une comandes</a>
    <div>
        <table border="1">
            <tr>
                <th>Reference</th>
                <th>client concerné</th>
                <th>date de la commande</th>
                <th>Total de la commande</th>
                <th>Details</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
            @foreach($commandes as $commande)
            <tr>
                <td>{{$commande->num_comm}}</td>
                <td>{{$commande->client->nom ?? 'client supprimé'}}</td>
                <td>{{$commande->date_comm}}</td>
                <td>{{$commande->total_comm}}</td>
                <td><a href="{{ route('commandes.facture',['commande'=>$commande]) }}">Voir facture</a></td>
                <td>
                    <a href="{{ route('commandes.edit',['commande'=>$commande]) }}">Modifier</a>
                </td>
                <td>
                    <form action="{{ route('commandes.destroy', ['commande' =>$commande]) }}" method="post">                
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