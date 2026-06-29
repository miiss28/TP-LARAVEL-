<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <h2>Liste des clients</h2>
    <a href="{{route('clients.create')}}">Ajouter un client</a>
    <div>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Telephone</th>
                <th>Adresse</th>
                <th>Email</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
            @foreach($clients as $client)
            <tr>
                <td>{{$client->id}}</td>
                <td>{{$client->nom}}</td>
                <td>{{$client->prenom}}</td>
                <td>{{$client->telephone}}</td>
                <td>{{$client->adresse}}</td>
                <td>{{$client->email}}</td>
                <td>
                    <a href="{{ route('clients.edit',['client'=>$client]) }}">Modifier</a>
                </td>
                <td>
                    <form action="{{ route('clients.destroy', ['client' =>$client]) }}" method="post">                
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