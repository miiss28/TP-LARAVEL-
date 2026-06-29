<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ajouter un client</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>    
    <h1>Ajout d'un client</h1>
    <form action="{{route('clients.store')}}" method="POST">
        @csrf
        @method('post')
        <div>
            <label >Nom</label>
            <input type="name" placeholder="Nom" name="nom" required>
        </div>
        <div>
            <label >prenom</label>
            <input type="name" placeholder="Prenom" name="prenom" required>
        </div>
        
        <div>
            <label >Numero de telephone</label>
            <input type="name" placeholder="Telephone" name="telephone" required>
        </div>
        <div>
            <label >Adresse</label>
            <input type="name" placeholder="Adresse" name="adresse" required>
        </div>
        <div>
            <label >Email</label>
            <input type="email" placeholder="Email" name="email" required>
        </div>
        <div>
            <input type="submit"  value="Ajouter le client">
        </div>
    </form>
</body>
</html>