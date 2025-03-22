<!-- Modale Modification Produit -->
<div class="modal fade" id="editProduitModal" tabindex="-1" aria-labelledby="editProduitLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProduitLabel">Modifier un Produit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Formulaire de modification -->
                <form id="editProduitForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')  <!-- Utilisez @method('PUT') pour simuler une requête PUT -->

                    <!-- Champ caché pour l'ID du produit -->
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