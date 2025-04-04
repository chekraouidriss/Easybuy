<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Produits</title>
    <style>
        .content-table tbody tr td  {        
            background-size: auto 90%;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>
    <link rel="icon" type="image/png" href="assets/images/logo.png">
</head>
<body>

    <!-- remove product popup -->

    <!-- <div class="remove-popup">
        <div class="centred-div">
            <div class="first-line">
                <p>Etes-vous sûr de vouloir supprimer ce porduit ?</p>
            </div>
            <div class="second-line">
                <button>Non</button>
                <button><a href="">Oui</a></button>
            </div>
        </div>
    </div> -->

    <div class="remove-popup">
    <div class="centred-div">
        <div class="first-line">
            <p>Êtes-vous sûr de vouloir supprimer ce produit ?</p>
        </div>
        <div class="second-line">
            <button>Non</button>
            <form id="deleteForm" method="POST" action="{{ route('produits.supprimer', '') }}">
                @csrf
                @method('DELETE') <!-- This tells Laravel to treat this form as a DELETE request -->
                <button type="submit">Oui</button>
                <input type="hidden" id="productId" name="productId" value="">
            </form>
        </div>
    </div>
    </div>



    <!-- modify product popup -->

    <div class="modify-popup">
        <div class="centred-div">
            <div class="icon top-modify" style="background-image: url('assets/icons/actualise.png');" ></div>
            
            <form action="{{ route('produits.modifier', '') }}" method="POST" id="modifyForm" enctype="multipart/form-data">
    @csrf
    @method('PUT') <!-- Spécifie que la requête est de type PUT -->

    <!-- Champ caché pour l'ID du produit -->
    <input type="hidden" id="modifyProductId" name="id" value="">

    <div class="line">
        <label for="IDM">ID : </label>
        <input id="IDM" type="text" class="form-control" disabled required>
    </div>

    <div class="line">
        <label for="Nom">Nom : </label>
        <input id="Nom" type="text" class="form-control" name="Nom" required>
    </div>

    <div class="line">
        <label for="Prix">Prix : </label>
        <input id="Prix" type="number" class="form-control" name="Prix" required>
    </div>

    <div class="line">
        <label for="Stock">Stock : </label>
        <input id="Stock" type="number" class="form-control" name="QntStock" required>
    </div>

    <div class="line">
        <label for="cars">Catégorie:</label>
        <select id="cars" name="Categorie" class="form-control" required>
            <option value="Laptop">Laptop</option>
            <option value="Desktop">Desktop</option>
        </select>
    </div>

    <div class="line">
        <label for="SrcImage">Image du Produit</label>
        <input type="file" class="form-control" id="SrcImage" name="SrcImage">
    </div>

    <div class="line">
        <input type="submit" class="btn btn-primary" value="Modifier">
    </div>
</form>


        </div>
    </div>
    <!-- <div class="modify-popup">
        <div class="centred-div">
            <div class="icon top-modify" style="background-image: url('assets/icons/actualise.png');" ></div>
            <form action="">

                <div class="line">
                    <label for="ID">ID : </label>
                    <input id="ID" type="text" value="#1500" disabled required >
                </div>

                <div class="line">
                    <label for="Nom">Nom : </label>
                    <input id="Nom" type="text" value=""  required >
                </div>

                <div class="line">
                    <label for="Prix">Prix : </label>
                    <input  id="Prix" type="number" value=""  required >
                </div>

                <div class="line">
                    <label for="Stock">Stock : </label>
                    <input  id="Stock" type="number" value=""  required >
                </div>

                <div class="line">
                    <label for="cars">Catégorie:</label>
                    <select id="cars" name="carlist" form="carform" required >
                        <option value="volvo">Electronique</option>
                        <option value="saab">Habillage</option>
                    </select>
                </div>

                <div class="line">
                    <input type="submit" value="Modifier" >
                </div>

            </form>
        </div>
    </div> -->




    <!-- Add product popup -->

    <!-- <div class="add-popup">
        <div class="centred-div">
            <div class="icon top-modify" style="background-image: url('assets/images/ajouter.png');" ></div>
            <form action="">

                <div class="line">
                    <label for="ID">ID : </label>
                    <input id="ID" type="text" value=""  required >
                </div>

                <div class="line">
                    <label for="Nom">Nom : </label>
                    <input id="Nom" type="text" value=""  required >
                </div>

                <div class="line">
                    <label for="Prix">Prix : </label>
                    <input  id="Prix" type="number" value=""  required >
                </div>

                <div class="line">
                    <label for="Stock">Stock : </label>
                    <input  id="Stock" type="number" value=""  required >
                </div>

                <div class="line">
                    <label for="cars">Catégorie : </label>
                    <select id="cars" name="carlist" form="carform" required >
                        <option value="volvo">Electronique</option>
                        <option value="saab">Habillage</option>
                        <option value="opel">Nourriture</option>
                        <option value="audi">Bébé</option>
                    </select>
                </div>

                <div class="line">
                    <label for="image">Image : </label>
                    <input type="file">
                </div>

                <div class="line">
                    <input type="submit" value="Ajouter" >
                </div>

            </form>
        </div>
    </div> -->

    <div class="add-popup">
    <div class="centred-div">
        <div class="icon top-modify" style="background-image: url('assets/images/ajouter.png');"></div>
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="line">
                <label for="Nom">Nom : </label>
                <input id="Nom" type="text" name="Nom" required>
            </div>

            <div class="line">
                <label for="Prix">Prix : </label>
                <input id="Prix" type="number" name="Prix" required>
            </div>

            <div class="line">
                <label for="QntStock">Stock : </label>
                <input id="QntStock" type="number" name="QntStock" required>
            </div>

            <div class="line">
                    <label for="Description">Description :</label>
                    <input type="text" id="Description" name="Description" required></input>
            </div>

            <div class="line">
                <label for="Categorie">Catégorie : </label>
                <select id="Categorie" name="Categorie" required>
                    <option value="Laptop">Laptop</option>
                    <option value="Desktop">Desktop</option>
                </select>
            </div>

            <div class="line">
                <label for="SrcImage">Image : </label>
                <input type="file" id="SrcImage" name="SrcImage" accept="image/*">
            </div>

            <div class="line">
                <input type="submit" value="Ajouter">
            </div>
        </form>
    </div>
</div>


    <aside>

        <div class="head">
            <div class="top">
                <p>Easy buy</p>
                <div class="toglle" style="background-image: url('assets/icons/menu.png');" ></div>
            </div>
            <img src="assets/images/setting.png" alt="">
            <p>Admin</p>
        </div>

        <div class="nav">
            <div class="option">
                <div class="icon" style="background-image: url('assets/icons/home.png');" ></div>
                <a href="./admin">Acceuil</a>
            </div>
            <div class="option active">
                <div class="icon" style="background-image: url('assets/icons/Product.png');" ></div>
                <a href="./produits">Produits</a>
            </div>
            <div class="option">
            <div class="icon" style="background-image: url('assets/icons/exit.png');"></div>
            <form action="{{ route('logout') }}" method="POST" id="logoutForm">
                @csrf
                <a href="#" onclick="document.getElementById('logoutForm').submit(); return false;">Déconnexion</a>
            </form>
            </div>

        </div>

        <div class="exit">
            <!-- <div class="option">
                <div class="icon" style="background-image: url('assets/icons/exit.png');" ></div>
                <a href="#">Deconnexion</a>
            </div> -->
        </div>

    </aside>

    <main>
        <div class="header">
            <p>Voila la liste des produits 📦</p>
        </div>
        <div class="general-infos">
            <div class="advanced-options">
                <p>Gerez vos produits avec plus de flexibilité ✨</p>
            </div>
        </div>
        <div class="additional-buttons">
            <div class="search">
                <input type="text" placeholder="Chercher ici ..." >
                <img src="assets/icons/recherche.png" alt="">
            </div>
            <button>Ajouter un produit</button>
        </div>
        <div class="table-container">
            <table class="content-table" >
            <thead>
                <tr>
                    <th></th>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prix</th>
                    <th>Stock</th>
                    <th>Catégorie</th>
                </tr>
            </thead>            
            <!-- <tbody>
                <tr>
                    <td style="background-image: url(assets/images/product2.png);" ></td>
                    <td>1</td>
                    <td>Product1</td>
                    <td>10$</td>
                    <td>15</td>
                    <td>1000</td>
                    <td class="opeartions1" ><a href="#"><img class="table-icons" src="assets/icons/edit.png" alt=""></a></td>
                    <td class="opeartions2" ><a href="#"><img class="table-icons" src="assets/icons/trash-can.png" alt=""></a></td>
                </tr>
                <tr>
                    <td style="background-image: url(assets/images/product3.png);" ></td>
                    <td>1</td>
                    <td>Product1</td>
                    <td>10$</td>
                    <td>15</td>
                    <td>1000</td>
                    <td class="opeartions1" ><a href="#"><img class="table-icons" src="assets/icons/edit.png" alt=""></a></td>
                    <td class="opeartions2" ><a href="#"><img class="table-icons" src="assets/icons/trash-can.png" alt=""></a></td>
                </tr>
                <tr>
                    <td style="background-image: url(assets/images/product4.png);" ></td>
                    <td>1</td>
                    <td>Product15135</td>
                    <td>10$</td>
                    <td>15</td>
                    <td>1000</td>
                    <td class="opeartions1" ><a href="#"><img class="table-icons" src="assets/icons/edit.png" alt=""></a></td>
                    <td class="opeartions2" ><a href="#"><img class="table-icons" src="assets/icons/trash-can.png" alt=""></a></td>
                </tr>
                <tr>
                    <td style="background-image: url(assets/images/product4.png);" ></td>
                    <td>1</td>
                    <td>Product25</td>
                    <td>10$</td>
                    <td>15</td>
                    <td>1000</td>
                    <td class="opeartions1" ><a href="#"><img class="table-icons" src="assets/icons/edit.png" alt=""></a></td>
                    <td class="opeartions2" ><a href="#"><img class="table-icons" src="assets/icons/trash-can.png" alt=""></a></td>
                </tr>
                <tr>
                    <td style="background-image: url(assets/images/product4.png);" ></td>
                    <td>1</td>
                    <td>Product1</td>
                    <td>10$</td>
                    <td>15</td>
                    <td>1000</td>
                    <td class="opeartions1" ><a href="#"><img class="table-icons" src="assets/icons/edit.png" alt=""></a></td>
                    <td class="opeartions2" ><a href="#"><img class="table-icons" src="assets/icons/trash-can.png" alt=""></a></td>
                </tr>
                <tr>
                    <td style="background-image: url(assets/images/product2.png);" ></td>
                    <td>1</td>
                    <td>Product1</td>
                    <td>10$</td>
                    <td>15</td>
                    <td>1000</td>
                    <td class="opeartions1" ><a href="#"><img class="table-icons" src="assets/icons/edit.png" alt=""></a></td>
                    <td class="opeartions2" ><a href="#"><img class="table-icons" src="assets/icons/trash-can.png" alt=""></a></td>
                </tr>
                <tr>
                    <td style="background-image: url(assets/images/product3.png);" ></td>
                    <td>1</td>
                    <td>Product1</td>
                    <td>10$</td>
                    <td>15</td>
                    <td>1000</td>
                    <td class="opeartions1" ><a href="#"><img class="table-icons" src="assets/icons/edit.png" alt=""></a></td>
                    <td class="opeartions2" ><a href="#"><img class="table-icons" src="assets/icons/trash-can.png" alt=""></a></td>
                </tr>
                <tr>
                    <td style="background-image: url(assets/images/product4.png);" ></td>
                    <td>1</td>
                    <td>Product1</td>
                    <td>10$</td>
                    <td>15</td>
                    <td>1000</td>
                    <td class="opeartions1" ><a href="#"><img class="table-icons" src="assets/icons/edit.png" alt=""></a></td>
                    <td class="opeartions2" ><a href="#"><img class="table-icons" src="assets/icons/trash-can.png" alt=""></a></td>
                </tr>
                <tr>
                    <td style="background-image: url(assets/images/product2.png);" ></td>
                    <td>1</td>
                    <td>Product1</td>
                    <td>10$</td>
                    <td>15</td>
                    <td>1000</td>
                    <td class="opeartions1" ><a href="#"><img class="table-icons" src="assets/icons/edit.png" alt=""></a></td>
                    <td class="opeartions2" ><a href="#"><img class="table-icons" src="assets/icons/trash-can.png" alt=""></a></td>
                </tr>
                <tr>
                    <td style="background-image: url(assets/images/product3.png);" ></td>
                    <td>1</td>
                    <td>Product1</td>
                    <td>10$</td>
                    <td>15</td>
                    <td>1000</td>
                    <td class="opeartions1" ><a href="#"><img class="table-icons" src="assets/icons/edit.png" alt=""></a></td>
                    <td class="opeartions2" ><a href="#"><img class="table-icons" src="assets/icons/trash-can.png" alt=""></a></td>
                </tr>
                <tr>
                    <td style="background-image: url(assets/images/product4.png);" ></td>
                    <td>1</td>
                    <td>Product1</td>
                    <td>10$</td>
                    <td>15</td>
                    <td>1000</td>
                    <td class="opeartions1" ><a href="#"><img class="table-icons" src="assets/icons/edit.png" alt=""></a></td>
                    <td class="opeartions2" ><a href="#"><img class="table-icons" src="assets/icons/trash-can.png" alt=""></a></td>
                </tr>
                <tr>
                    <td style="background-image: url(assets/images/product2.png);" ></td>
                    <td>1</td>
                    <td>Product1</td>
                    <td>10$</td>
                    <td>15</td>
                    <td>1000</td>
                    <td class="opeartions1" ><a href="#"><img class="table-icons" src="assets/icons/edit.png" alt=""></a></td>
                    <td class="opeartions2" ><a href="#"><img class="table-icons" src="assets/icons/trash-can.png" alt=""></a></td>
                </tr>
                <tr>
                    <td style="background-image: url(assets/images/product3.png);" ></td>
                    <td>1</td>
                    <td>Product1</td>
                    <td>10$</td>
                    <td>15</td>
                    <td>1000</td>
                    <td class="opeartions1" ><a href="#"><img class="table-icons" src="assets/icons/edit.png" alt=""></a></td>
                    <td class="opeartions2" ><a href="#"><img class="table-icons" src="assets/icons/trash-can.png" alt=""></a></td>
                </tr>
                <tr>
                    <td style="background-image: url(assets/images/product4.png);" ></td>
                    <td>1</td>
                    <td>Product1</td>
                    <td>10$</td>
                    <td>15</td>
                    <td>1000</td>
                    <td class="opeartions1" ><a href="#"><img class="table-icons" src="assets/icons/edit.png" alt=""></a></td>
                    <td class="opeartions2" ><a href="#"><img class="table-icons" src="assets/icons/trash-can.png" alt=""></a></td>
                </tr>
            </tbody> -->
            @foreach ($produits as $product)
            <tr>
                <td style="background-image: url('{{ asset($product->SrcImage) }}');"></td>
                <td>{{ $product->id }}</td>
                <td>{{ $product->Nom }}</td>
                <td>{{ $product->Prix }} DH</td>
                <td>{{ $product->QntStock }}</td>
                <td>{{ $product->Categorie }}</td>
                <td class="opeartions1" id="{{ $product->id }}" >
                    <a href="#"><img class="table-icons" src="{{ asset('assets/icons/edit.png') }}" alt=""></a>
                </td>
                <td class="opeartions2" id="{{ $product->id }}" >
                    <a href="#"><img class="table-icons" src="{{ asset('assets/icons/trash-can.png') }}" alt=""></a>
                </td>
            </tr>
             @endforeach
        </table>
        </div>
    </main>
    <footer>

    </footer>
    <script src="assets/js/script.js" ></script>
</body>
</html>