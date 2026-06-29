<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un client</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <h2>Modifier le client {{($client->{'id'})}}</h2>
    <form action="{{ route('clients.update', ['client'=>$client]) }}" method="post">

        @csrf
        @method('put')
        <div>
            <label >Nom</label>
            <input type="name" placeholder="Nom" name="nom" value="{{($client->{'nom'})}}" required>
        </div>
        <div>
            <label >prenom</label>
            <input type="name" placeholder="Prenom" name="prenom" value="{{ ($client->{'prenom'}) }}"required>
        </div>
        
        <div>
            <label >Numero de telephone</label>
            <input type="name" placeholder="Telephone" name="telephone" value="{{ ($client->{'telephone'}) }}"required>
        </div>
        <div>
            <label >Adresse</label>
            <input type="name" placeholder="Adresse" name="adresse" value="{{ ($client->{'adresse'}) }}" required>
        </div>
        <div>
            <label >Email</label>
            <input type="email" placeholder="Email" name="email" value="{{ ($client->{'email'}) }}" required>
        </div>
        <div>
            <input type="submit"  value="Modifier">
        </div>
    </form>

</body>
</html>