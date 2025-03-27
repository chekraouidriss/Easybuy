<!DOCTYPE html>
<html lang="fr">
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
</head>
<body>
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
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
            </div>
        </div>
    </nav>
    <!-- Close Header -->
    <!-- Open Content -->
    <div class="payment-card-gif"> <img src="assets/img/git.gif" alt="GIF animé"> </div>
    <div class="payment-card">
        <div class="payment-card-title text-center mb-4">
            <b>Paiement</b>
            <div class="payment-cardd-gif"> <img src="assets/img/giff.gif" alt="GIF animé"> </div>
        </div>
        
        <!-- Cartes enregistrées -->
        @if($cartes->count() > 0)
        <span class="payment-card-header">Cartes enregistrées :</span>
        @foreach($cartes as $carte)
        <div class="payment-row payment-row-vertical">
            <div class="d-flex align-items-center gap-2">
                <!-- Icône de la carte (Visa/Mastercard basé sur le numéro) -->
                @if(substr($carte->numcart, 0, 1) == '4')
                <img class="img-fluid" src="https://img.icons8.com/color/48/000000/visa.png" alt="Visa"/>
                @else
                <img class="img-fluid" src="https://img.icons8.com/color/48/000000/mastercard-logo.png" alt="Mastercard"/>
                @endif
                
                <input type="text" value="**** **** **** {{ substr($carte->numcart, -4) }}" class="form-control-sm" readonly>
                
                <form method="POST" action="{{ route('payment.confirm') }}" class="d-inline">
                    @csrf
                    <input type="hidden" name="carte_id" value="{{ $carte->id }}">
                    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#codeVerificationModal-{{ $carte->id }}">
                        Valider
                    </button>
                </form>
            </div>
        </div>
        @endforeach
        @endif
        
        <!-- Formulaire pour ajouter une nouvelle carte -->
        <form method="POST" action="{{ route('payment.store') }}">
            @csrf
            <span class="payment-card-header">Ajouter une nouvelle carte :</span>
            <div class="payment-row payment-row-vertical">
                <div class="d-flex gap-2">
                    <div class="flex-grow-1">
                        <span class="payment-card-inner">Nom du titulaire de la carte</span>
                        <input type="text" name="nom" placeholder="Jean Dupont" class="form-control-sm" required>
                    </div>
                    <div class="flex-grow-1">
                        <span class="payment-card-inner">Numéro de carte</span>
                        <input type="text" name="numcart" placeholder="513452644" class="form-control-sm" required>
                    </div>
                </div>
            </div>
            <div class="payment-row payment-row-vertical">
                <div class="d-flex gap-2">
                    <div class="flex-grow-1">
                        <span class="payment-card-inner">Date d'expiration</span>
                        <input type="text" name="expiration_date" placeholder="MM/YY" class="form-control-sm" required>
                    </div>
                    <div class="flex-grow-1">
                        <span class="payment-card-inner">CVV</span>
                        <input type="password" name="cvv" placeholder="123" class="form-control-sm" required>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success btn-sm d-flex mx-auto mt-3">
                <b>Ajouter la carte</b>
            </button>
        </form>
    </div>
    
    <!-- Fenêtres modales pour la vérification du code (une par carte) -->
    @foreach($cartes as $carte)
    <div class="modal fade" id="codeVerificationModal-{{ $carte->id }}" tabindex="-1" aria-labelledby="codeVerificationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="codeVerificationModalLabel">Vérification du code</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('payment.confirm') }}">
                    @csrf
                    <input type="hidden" name="carte_id" value="{{ $carte->id }}">
                    <div class="modal-body">
                        <p>Veuillez entrer le code envoyé à votre adresse e-mail pour confirmer le paiement.</p>
                        <input type="text" name="verification_code" class="form-control form-control-sm" placeholder="Entrez le code" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-success btn-sm">Confirmer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach
    
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- End Script -->
</body>
</html>