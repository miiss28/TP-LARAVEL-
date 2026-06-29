<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Boutique Ali</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        .dashboard-title {
            text-align: center;
            margin-bottom: 30px;
        }

        .cards {
            margin-top: 15%;
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .card {
            width: 250px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            text-align: center;
        }

        .card h2 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .count {
            font-size: 30px;
            font-weight: bold;
            color: #40739e;
            margin-bottom: 10px;
        }

        .card a {
            display: inline-block;
            margin-top: 10px;
            text-decoration: none;
            background: #40739e;
            color: white;
            padding: 8px 12px;
            border-radius: 5px;
        }

        .card a:hover {
            background: #273c75;
        }
    </style>
</head>

<body>

<div class="container">

    <h1 class="dashboard-title">Boutique Ali</h1>

    <div class="cards">

        <!-- Clients -->
        <div class="card">
            <h2>Clients</h2>
            <div class="count">{{ $nbClients }}</div>
            <a href="{{ route('clients.index') }}">Plus</a>
        </div>

        <!-- Produits -->
        <div class="card">
            <h2>Produits</h2>
            <div class="count">{{ $nbProduits }}</div>
            <a href="{{ route('produits.index') }}">Plus</a>
        </div>

        <!-- Commandes -->
        <div class="card">
            <h2>Commandes</h2>
            <div class="count">{{ $nbCommandes }}</div>
            <a href="{{ route('commandes.index') }}">Plus</a>
        </div>

    </div>

</div>

</body>
</html>