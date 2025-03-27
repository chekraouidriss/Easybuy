<!DOCTYPE html>
<html lang="en">
<head>
    <title>EasyBuy - Panier</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .btn-outline-light {
            color: #ffffff; /* Texte blanc clair */
            border-color: #3a784d; /* Bordure blanche claire */
        }

        .btn-outline-light:hover {
            background-color: #2d5136; /* Fond vert au survol */
            border-color: #28a745; /* Bordure verte au survol */
            color: rgb(15, 14, 14); /* Texte blanc au survol */
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">

            <a class="navbar-brand text-success logo h1 align-self-center" href="index">
                <img src="assets/img/logo.png" width="128" height="90">
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about">À Propos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="shop">Boutique</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact">Contact</a>
                        </li>
                    </ul>
                </div>
                <div class="navbar align-self-center d-flex">
                    <a class="nav-icon position-relative text-decoration-none" href="panier">
                        <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
                        <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">3</span>
                    </a> 
                </div>
            </div>

        </div>
    </nav>
    <!-- Close Header -->
    <!-- Open Content -->
    <section class="bg-light">
        <div class="container pb-5">
            <div class="row">
                <div class="col-lg-12 mt-5">
                    <h1 class="h2"><b>Votre Panier</b></h1>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Produit</th>
                                    <th>Prix</th>
                                    <th>Quantité</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="panierBody">
                                <!-- Les produits du panier seront insérés ici dynamiquement n3amasidi -->
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3" class="text-end"><strong>Total</strong></td>
                                    <td colspan="2"><strong id="totalPanier">0.00 MAD</strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="text-end">
                        <button class="btn btn-success btn-lg" onclick="window.location.href='buy'">Passer à la caisse</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Close Content -->
    <!-- Start Footer -->
    <footer class="bg-dark" id="tempaltemo_footer">
        <div class="container">
            <div class="row">

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-success border-bottom pb-3 border-light logo">EasyBuy</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li>
                            <i class="fas fa-map-marker-alt fa-fw"></i>
                            Bab Al Madina Tilila, Agadir 80000
                        </li>
                        <li>
                            <i class="fa fa-phone fa-fw"></i>
                            <a class="text-decoration-none" href="tel:010-020-0340">07-00354391</a>
                        </li>
                        <li>
                            <i class="fa fa-envelope fa-fw"></i>
                            <a class="text-decoration-none" href="mailto:info@company.com">EasyBuy@company.com</a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Produits</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li><a class="text-decoration-none" href="#">Pc Portable</a></li>
                        <li><a class="text-decoration-none" href="#">Disque dur externe</a></li>
                        <li><a class="text-decoration-none" href="#">Disque dur interne</a></li>
                        <li><a class="text-decoration-none" href="#">Carte réseaux</a></li>
                        <li><a class="text-decoration-none" href="#">Double écran</a></li>
                        <li><a class="text-decoration-none" href="#">Smartphone</a></li>
                    </ul>
                </div>

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Informations supplémentaires</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li><a class="text-decoration-none" href="#">Home</a></li>
                        <li><a class="text-decoration-none" href="#">About Us</a></li>
                        <li><a class="text-decoration-none" href="#">Shop Locations</a></li>
                        <li><a class="text-decoration-none" href="#">FAQs</a></li>
                        <li><a class="text-decoration-none" href="#">Contact</a></li>
                    </ul>
                </div>

            </div>

            <div class="row text-light mb-4">
                <div class="col-12 mb-3">
                    <div class="w-100 my-3 border-top border-light"></div>
                </div>
                <div class="col-auto me-auto">
                    <ul class="list-inline text-left footer-icons">
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="http://facebook.com/"><i class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://www.instagram.com/"><i class="fab fa-instagram fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://twitter.com/"><i class="fab fa-twitter fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://www.linkedin.com/"><i class="fab fa-linkedin fa-lg fa-fw"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-auto">
                    <label class="sr-only" for="subscribeEmail">Adresse e-mail</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control bg-dark border-light" id="subscribeEmail" placeholder="Email address">
                        <div class="input-group-text btn-success text-light">S'abonner</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-100 bg-black py-3"></div>
    </footer>
    <!-- End Footer -->
    <!-- Start Script -->
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
    <script> document.addEventListener('DOMContentLoaded', function() {
    // Récupérer les données du panier via une requête AJAX
    fetch('/panier/details')
        .then(response => response.json())
        .then(data => {
            const panierBody = document.getElementById('panierBody');
            let totalPanier = 0;

            data.forEach(produit => {
                const totalProduit = produit.prix * produit.quantite;
                totalPanier += totalProduit;

                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>
                        <div class="d-flex align-items-center">
                            <img src="${produit.image}" alt="${produit.nom}" width="50" class="me-3">
                            <div>
                                <h6 class="mb-0">${produit.nom}</h6>
                                <small class="text-muted">Catégorie: ${produit.categorie}</small>
                            </div>
                        </div>
                    </td>
                    <td>${produit.prix} MAD</td>
                    <td>
                        <input type="number" class="form-control" value="${produit.quantite}" min="1" style="width: 70px;">
                    </td>
                    <td>${totalProduit} MAD</td>
                    <td>
                        <button class="btn btn-danger btn-sm" onclick="supprimerProduit(${produit.id})">Supprimer</button>
                    </td>
                `;
                panierBody.appendChild(row);
            });

            // Mettre à jour le total du panier
            document.getElementById('totalPanier').textContent = `${totalPanier.toFixed(2)} MAD`;
        })
        .catch(error => console.error('Erreur lors de la récupération des données du panier:', error));
});

// Fonction pour supprimer un produit
function supprimerProduit(produitId) {
    if (confirm('Êtes-vous sûr de vouloir supprimer ce produit du panier ?')) {
        fetch(`/panier/supprimer/${produitId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Recharger la page pour voir les changements
                window.location.reload();
            }
        })
        .catch(error => console.error('Erreur lors de la suppression:', error));
    }
}</script>
</body>
</html>