<!DOCTYPE html>
<html lang="en">
<head>
    <title>EasyBuy</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
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
        /* contact-form.css */
.contact-form h2 {
    font-size: 2rem;
    margin-bottom: 20px;
    color: #333;
    text-align: left; /* Aligner le texte à gauche */
    margin-left: 90px; /* Déplacer le titre vers la droite */
}
.contact-form {
    padding: 50px 0;
    background-color: #f9f9f9;
}

.contact-form .container {
    max-width: 800px;
    margin: 0 auto;
    padding: 0 15px;
}

.contact-form .main {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background-color: #fff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.contact-form .content {
    flex: 1;
    margin-right: 30px;
}

.contact-form h2 {
    font-size: 2rem;
    margin-bottom: 20px;
    color: #333;
}

.contact-form form {
    display: flex;
    flex-direction: column;
}

.contact-form input[type="text"],
.contact-form input[type="email"],
.contact-form textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 1rem;
}

.contact-form textarea {
    resize: vertical;
    height: 150px;
}

.contact-form .btn {
    padding: 10px 20px;
    background-color: #28a745;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 1rem;
    transition: background-color 0.3s ease;
}

.contact-form .btn:hover {
    background-color: #218838;
}

.contact-form .form-img {
    flex: 1;
    text-align: center;
}

.contact-form .form-img img {
    max-width: 100%;
    border-radius: 10px;
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
                <div>
                    <a href="log_in" class="btn btn-outline-light">Login</a>
                    <a href="log_in" class="btn btn-outline-light">Sign Up</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="contact-form">
        <div class="container">
            <div class="main">
                <div class="content">
                    <h2>Contact Us</h2>
                    <form method="post" id="contact-form">
                        <input type="text" name="name" placeholder="Entrer votre Nom" />
                        <input type="email" name="email" placeholder="Entrer votre Email" />
                        <input type="text" name="objet" placeholder="Entrer votre Object" />
                        <textarea name="message" placeholder="Votre Message"></textarea>
                        <button type="submit" class="btn">Envoyer <i class="fas fa-paper-plane"></i></button>
                    </form>
                </div>
                <div class="form-img">
                    <img src="assets/img/cnta.jpg" alt="" />
                </div>
            </div>
        </div>
    </div>


    
<script>
    document.getElementById("contact-form").addEventListener("submit", function(event) {
      event.preventDefault(); // Empêche la soumission du formulaire
  
      // Récupère les valeurs des champs
      var name = document.getElementsByName("name")[0].value;
      var email = document.getElementsByName("email")[0].value;
  
      // Affiche l'alerte avec les informations
      var message = "Bonjour " + name + ", merci de nous contacter. Votre message est bien reçu. Nous vous répondrons à l'adresse e-mail suivante : " + email;
      alert(message);
    });
  </script>
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
    <!-- End Script -->
</body>

</html>