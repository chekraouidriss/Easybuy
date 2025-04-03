<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du Produit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<<<<<<< HEAD
    <h1>{{ $produit->nom }}</h1>
=======
    <h1>{{ $produit->nom }}</h1> 
    <!-- Had l variable dyal produit fin kayna ? --> 
>>>>>>> origin/farah_branche
    <p><strong>Description :</strong> {{ $produit->description }}</p>
    <p><strong>Prix :</strong> {{ $produit->prix }} €</p>
    <p><strong>Stock :</strong> {{ $produit->stock }}</p>
    <p><strong>Catégorie :</strong> {{ $produit->categorie }}</p>

    <a href="{{ route('produits.index') }}" class="btn btn-secondary">Retour</a>
</body>
</html>
