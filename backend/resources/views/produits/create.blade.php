<!-- Modale Ajout Produit -->
<div class="modal fade" id="ajoutProduitModal" tabindex="-1" aria-labelledby="ajoutProduitLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ajoutProduitLabel">Ajouter un Produit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="{{ route('produits.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="Nom" class="form-label">Nom du Produit</label>
        <input type="text" class="form-control" id="Nom" name="Nom" required>
    </div>
    <div class="mb-3">
        <label for="Prix" class="form-label">Prix</label>
        <input type="number" class="form-control" id="Prix" name="Prix" required>
    </div>
    <div class="mb-3">
        <label for="QntStock" class="form-label">Quantité en Stock</label>
        <input type="number" class="form-control" id="QntStock" name="QntStock" required>
    </div>
    <div class="mb-3">
        <label for="Categorie" class="form-label">Catégorie</label>
        <input type="text" class="form-control" id="Categorie" name="Categorie" required>
    </div>
    <div class="mb-3">
        <label for="SrcImage" class="form-label">Image du Produit</label>
        <input type="file" class="form-control" id="SrcImage" name="SrcImage">
    </div>
    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>

            </div>
        </div>
    </div>
</div>