<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - EasyBuy</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="icon" type="image/png" href="assets/images/logo.png">
    <style>
        /* Réinitialisation des marges et paddings par défaut */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Montserrat", sans-serif;
        }

        body {
            background-color: rgb(255, 255, 255);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            height: 100vh;
            padding-top: 100px; /* Pour compenser la navbar fixe */
        }

        /* Styles pour la barre de navigation (navbar) */
        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 30px;
            background-color: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width: 100%;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            height: 70px;
        }

        .logo img {
            height: 70px;
        }

        /* Styles pour le conteneur principal */
        .container {
            background-color: #fff;
            border-radius: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.35);
            position: relative;
            overflow: hidden;
            width: 768px;
            max-width: 100%;
            min-height: 480px;
            margin: 20px auto;
        }

        .container p {
            font-size: 14px;
            line-height: 20px;
            letter-spacing: 0.3px;
            margin: 20px 0;
        }

        .container span {
            font-size: 12px;
        }

        .container a {
            color: #333;
            font-size: 13px;
            text-decoration: none;
            margin: 15px 0 10px;
        }

        .container button {
            background-color: #28a745;
            color: #fff;
            font-size: 12px;
            padding: 10px 45px;
            border: 1px solid transparent;
            border-radius: 8px;
            font-weight: 600;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            margin-top: 10px;
            cursor: pointer;
        }

        .container button.hidden {
            background-color: transparent;
            border-color: #fff;
        }

        .container form {
            background-color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0 40px;
            height: 100%;
        }

        .container input {
            background-color: #eee;
            border: none;
            margin: 8px 0;
            padding: 10px 15px;
            font-size: 13px;
            border-radius: 8px;
            width: 100%;
            outline: none;
        }

        /* Style spécifique pour les champs du formulaire d'inscription */
        .sign-up-input {
            width: 80%; /* Réduire la largeur des champs */
            max-width: 300px; /* Limiter la largeur maximale */
            margin: 8px auto; /* Centrer les champs */
        }

        .form-container {
            position: absolute;
            top: 0;
            height: 100%;
            transition: all 0.6s ease-in-out;
        }

        .sign-in {
            left: 0;
            width: 50%;
            z-index: 2;
        }

        .container.active .sign-in {
            transform: translateX(100%);
        }

        .sign-up {
            left: 0;
            width: 50%;
            opacity: 0;
            z-index: 1;
        }

        .container.active .sign-up {
            transform: translateX(100%);
            opacity: 1;
            z-index: 5;
            animation: move 0.6s;
        }

        @keyframes move {
            0%, 49.99% {
                opacity: 0;
                z-index: 1;
            }
            50%, 100% {
                opacity: 1;
                z-index: 5;
            }
        }

        .social-icons {
            margin: 20px 0;
        }

        .social-icons a {
            border: 1px solid #ccc;
            border-radius: 20%;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            margin: 0 3px;
            width: 40px;
            height: 40px;
        }

        .toggle-container {
            position: absolute;
            top: 0;
            left: 50%;
            width: 50%;
            height: 100%;
            overflow: hidden;
            transition: all 0.6s ease-in-out;
            border-radius: 150px 0 0 100px;
            z-index: 1000;
        }

        .container.active .toggle-container {
            transform: translateX(-100%);
            border-radius: 0 150px 100px 0;
        }

        .toggle {
            background-color: #28a745;
            height: 100%;
            background: linear-gradient(to right, #87e49d, #28a745);
            color: #fff;
            position: relative;
            left: -100%;
            height: 100%;
            width: 200%;
            transform: translateX(0);
            transition: all 0.6s ease-in-out;
        }

        .container.active .toggle {
            transform: translateX(50%);
        }

        .toggle-panel {
            position: absolute;
            width: 50%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0 30px;
            text-align: center;
            top: 0;
            transform: translateX(0);
            transition: all 0.6s ease-in-out;
        }

        .toggle-left {
            transform: translateX(-200%);
        }

        .container.active .toggle-left {
            transform: translateX(0);
        }

        .toggle-right {
            right: 0;
            transform: translateX(0);
        }

        .container.active .toggle-right {
            transform: translateX(200%);
        }

        .btn-outline-light {
            color: red;
            border-color: red;
            background-color: transparent;
            transition: all 0.3s ease;
            padding: 0.5rem 1.5rem;
            font-size: 1rem;
            font-weight: 500;
            border-radius: 25px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .btn-outline-light:hover {
            background-color: red;
            border-color: red;
            color: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
        }

        .btn-outline-light:active {
            transform: translateY(0);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .social-icons a {
            border: 1px solid #ccc;
            border-radius: 20%;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            margin: 0 3px;
            width: 40px;
            height: 40px;
            color: #333; /* Couleur par défaut des icônes */
            transition: all 0.3s ease; /* Animation fluide */
        }

        .social-icons a:hover {
            transform: translateY(-5px); /* Effet de soulèvement */
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2); /* Ombre au survol */
        }

        /* Couleurs spécifiques au survol pour chaque icône */
        .social-icons a[href*="google.com"]:hover {
            background-color: #db4437; /* Rouge Google */
            color: #fff;
        }

        .social-icons a[href*="facebook.com"]:hover {
            background-color: #1877f2; /* Bleu Facebook */
            color: #fff;
        }

        .social-icons a[href*="instagram.com"]:hover {
            background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285aeb 90%);
            color: #fff;
        }
        .form-container.sign-up {
            left: 0;
            width: 50%;
            opacity: 0;
            z-index: 1;
            overflow-y: auto; /* Ajout du scroll */
            max-height: 230%; /* Assurez-vous que cela prend toute la hauteur disponible */
            padding-bottom: 30px; /* Un peu d'espace en bas pour éviter que le dernier champ ne soit coupé */
        }
    </style>
</head>
<body>
<div class="top-bar container-fluid">
    <div class="logo">
        <img src="./assets/img/logo.png" alt="EasyBuy Logo" width="93">
    </div>
    <div>
        <a href="index" class="btn btn-outline-danger">
            Logout
        </a>
    </div>
</div>
<div class="container" id="container">
    <div class="form-container sign-up">
        <form method="POST" action="{{ route('signup.submit') }}">
            @csrf <!-- Jeton CSRF pour la sécurité -->
            <h1>Créer Un Compte</h1>
            <div class="social-icons">
                <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="#" class="icon"><i class="fa-brands fa-instagram"></i></a>
            </div>
            <span>ou utilisez votre email pour vous inscrire</span>
            <input type="text" placeholder="Nom Complet" name="nom" class="sign-up-input" autocomplete="name" required />
            <input type="text" placeholder="Adresse" name="adresse" class="sign-up-input" autocomplete="address-line1" required />
            <input type="text" placeholder="Code postal" name="code" class="sign-up-input" autocomplete="postal-code" required />
            <input type="text" placeholder="Ville" name="ville" class="sign-up-input" autocomplete="address-level2" required />
            <input type="tel" placeholder="Téléphone" name="telephone" class="sign-up-input" autocomplete="tel" required />
            <input type="email" placeholder="Email" name="email" class="sign-up-input" autocomplete="email" required />
            <input type="password" placeholder="Mot de Passe" name="password" class="sign-up-input" autocomplete="new-password" required />
            <input type="password" placeholder="Confirmer le mot de passe" name="password_confirmation" class="sign-up-input" autocomplete="new-password" required />
            <button type="submit" name="inscrire">S'inscrire</button>
        </form>
    </div>
    <div class="form-container sign-in">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
        <form method="POST" action="{{ route('login.submit') }}">
            @csrf <!-- Jeton CSRF pour la sécurité -->
            <h1>Se connecter</h1>
            <div class="social-icons">
                <a href="https://www.google.com" class="icon" target="_blank">
                    <i class="fa-brands fa-google-plus-g"></i>
                </a>
                <a href="https://www.facebook.com" class="icon" target="_blank">
                    <i class="fa-brands fa-facebook-f"></i>
                </a>
                <a href="https://www.instagram.com" class="icon" target="_blank">
                    <i class="fa-brands fa-instagram"></i>
                </a>
            </div>
            <span>Ou utilisez votre adresse e-mail et votre mot de passe actuel</span>
            <input type="email" placeholder="Email" required name="email" autocomplete="email" />
            <input type="password" placeholder="Mot de passe" required name="password" autocomplete="current-password" />
            <a href="" style="color:black"> Connectez-vous ici.?</a>
            <button type="submit" name="connexion">Se connecter</button>
        </form>
    </div>
    <div class="toggle-container">
        <div class="toggle">
            <div class="toggle-panel toggle-left">
                <h1>Bienvenue De Nouveau !</h1>
                <p>Veuillez saisir vos coordonnées personnelles pour pouvoir profiter de toutes les fonctionnalités du site</p>
                <button class="hidden" id="login">Se connecter</button>
            </div>
            <div class="toggle-panel toggle-right">
                <h1>Bonjour mon ami!</h1>
                <p>Inscrivez-vous avec vos informations personnelles pour utiliser toutes les fonctionnalités du site</p>
                <button class="hidden" id="register">S'inscrire</button>
            </div>
        </div>
    </div>
</div>
<script>
    const container = document.getElementById('container');
    const registerBtn = document.getElementById('register');
    const loginBtn = document.getElementById('login');

    registerBtn.addEventListener('click', () => {
        container.classList.add("active");
    });

    loginBtn.addEventListener('click', () => {
        container.classList.remove("active");
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>