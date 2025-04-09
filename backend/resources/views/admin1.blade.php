<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .sidebar {
            height: 100vh;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #343a40;
            padding-top: 20px;
            color: white;
        }
        .sidebar a {
            padding: 10px 15px;
            text-decoration: none;
            font-size: 18px;
            color: white;
            display: block;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .content {
            margin-left: 260px;
            padding: 20px;
        }
        .card {
            border: none;
            border-radius: 10px;
        }
        .card-title {
            font-size: 1.2rem;
        }
        .display-4 {
            font-size: 2.5rem;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h4 class="text-center">Admin</h4>
        <a href="#">
            <i class="bi bi-speedometer2"></i> Tableau de bord
        </a>
        <a href="#">
            <i class="bi bi-box-seam"></i> Produits
        </a>
        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="bi bi-box-arrow-right"></i> Déconnexion
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>

    <!-- Main Content -->
    <div class="content">
        <h1 class="mb-4">Tableau de Bord</h1>

        <!-- Cartes de statistiques -->
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card text-white bg-primary">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-box"></i> Total Produits</h5>
                        <p class="card-text display-4">{{ $totalProduits ?? 0 }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-success">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-stack"></i> Produits en Stock</h5>
                        <p class="card-text display-4">{{ $produitsEnStock ?? 0 }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-danger">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-exclamation-triangle"></i> Rupture de Stock</h5>
                        <p class="card-text display-4">{{ $ruptureDeStock ?? 0 }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bouton pour ajouter un produit -->
        <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#ajoutProduitModal">
            <i class="bi bi-plus-circle"></i> Ajouter un Produit
        </button>

        <!-- Tableau des produits -->
        <table class="table table-bordered" id="produits-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prix</th>
                    <th>Stock</th>
                    <th>Catégorie</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody> 
                @forelse($produits as $produit)
                    <tr>
                        <td>{{ $produit->id }}</td>
                        <td>{{ $produit->Nom }}</td>
                        <td>{{ $produit->Prix }} €</td>
                        <td>{{ $produit->QntStock }}</td>
                        <td>{{ $produit->Categorie }}</td>
                        <td>
                            @if($produit->SrcImage)
                                <img src="{{ asset($produit->SrcImage) }}" alt="Image du produit" class="img-thumbnail" width="50">
                            @else
                                <p>Aucune image</p>
                            @endif
                        </td>
                        <td>
                            <button class="btn btn-warning btn-sm" data-id="{{ $produit->id }}" onclick="editProduitFromButton(this)" data-bs-toggle="modal" data-bs-target="#editProduitModal">
                                <i class="bi bi-pencil"></i> Modifier
                            </button>
                            <form action="{{ route('produits.destroy', $produit->id) }}" method="POST" class="delete-form" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i> Supprimer
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">Aucun produit disponible</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Modale pour l'ajout d'un produit -->
    @include('produits.create')

    <!-- Modale pour la modification d'un produit -->
    <div class="modal fade" id="editProduitModal" tabindex="-1" aria-labelledby="editProduitLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProduitLabel">Modifier un Produit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editProduitForm" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="editProduitId" name="id">
                        <div class="mb-3">
                            <label for="editNom" class="form-label">Nom du Produit</label>
                            <input type="text" class="form-control" id="editNom" name="Nom" required>
                        </div>
                        <div class="mb-3">
                            <label for="editPrix" class="form-label">Prix</label>
                            <input type="number" class="form-control" id="editPrix" name="Prix" required>
                        </div>
                        <div class="mb-3">
                            <label for="editStock" class="form-label">Quantité en Stock</label>
                            <input type="number" class="form-control" id="editStock" name="QntStock" required>
                        </div>
                        <div class="mb-3">
                            <label for="editCategorie" class="form-label">Catégorie</label>
                            <input type="text" class="form-control" id="editCategorie" name="Categorie" required>
                        </div>
                        <div class="mb-3">
                            <label for="editSrcImage" class="form-label">Image du Produit</label>
                            <input type="file" class="form-control" id="editSrcImage" name="SrcImage">
                        </div>
                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Fonction pour pré-remplir la modale de modification
        function editProduitFromButton(button) {
            let produitId = button.getAttribute('data-id');
            
            // Effectuer une requête AJAX pour récupérer les détails du produit
            fetch('/produits/' + produitId + '/edit')
                .then(response => response.json())
                .then(produit => {
                    // Remplir les champs du formulaire de la modale avec les données du produit
                    document.getElementById('editProduitForm').action = '/produits/' + produit.id;
                    document.getElementById('editProduitId').value = produit.id;
                    document.getElementById('editNom').value = produit.Nom;
                    document.getElementById('editPrix').value = produit.Prix;
                    document.getElementById('editStock').value = produit.QntStock;
                    document.getElementById('editCategorie').value = produit.Categorie;
                })
                .catch(error => {
                    console.error('Erreur lors de la récupération du produit:', error);
                });
        }
    </script>
</body>
</html>