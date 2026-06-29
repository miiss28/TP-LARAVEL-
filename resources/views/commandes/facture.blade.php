<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Facture</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <h2>Facture n° {{ $commande1->num_comm }}</h2>

<p>Client : {{ $commande1->client->nom }}</p>

<table border="1">
    <tr>
        <th>Produit</th>
        <th>Prix</th>
        <th>Quantité</th>
        <th>Montant</th>
    </tr>

    @php
        $total = 0;
    @endphp

    @foreach($commande1->produits as $produit)

        @php
            $montant = $produit->prix_prod * $produit->pivot->qtt_comm;
            $total += $montant;
        @endphp

        <tr>
            <td>{{ $produit->nom_prod }}</td>
            <td>{{ $produit->prix_prod }}</td>
            <td>{{ $produit->pivot->qtt_comm }}</td>
            <td>{{ $montant }}</td>
        </tr>

    @endforeach

    <tr>
        <td colspan="3"><strong>Total</strong></td>
        <td>{{ $total }}</td>
    </tr>
</table>
</body>
</html>