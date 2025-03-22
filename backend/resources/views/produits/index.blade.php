<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Description</th>
            <th>Prix</th>
            <th>Stock</th>
            <th>Catégorie</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($produits as $produit)
        <tr>
            <td>{{ $produit->id }}</td>
            <td>{{ $produit->nom }}</td>
            <td>{{ $produit->description }}</td>
            <td>{{ $produit->prix }} €</td>
            <td>{{ $produit->stock }}</td>
            <td>{{ $produit->categorie }}</td>
            <td>
                @if($produit->image)
                    <img src="{{ asset('storage/' . $produit->image) }}" alt="Image du produit" class="img-thumbnail">
                @else
                    <p>Aucune image</p>
                @endif
            </td>
            <td>
                <button class="btn btn-warning btn-sm" data-id="{{ $produit->id }}" onclick="editProduit(this)" data-bs-toggle="modal" data-bs-target="#editProduitModal">
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
        @endforeach
    </tbody>
</table>

<script>
    function editProduit(button) {
        var produitId = button.getAttribute('data-id');
        // Faites ici ce que vous devez faire avec l'id du produit
    }
</script>
