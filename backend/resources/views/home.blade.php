<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Welcome back !!</title>
    <style>
        .content-table tbody tr td  {        
            background-size: auto 90%;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>
    <link rel="icon" type="image/png" href="./images/logo.png">
</head>
<body>

    <!-- remove product popup -->

    <div class="remove-popup">
        <div class="centred-div">
            <div class="first-line">
                <p>Etes-vous sûr de vouloir supprimer ce porduit ?</p>
            </div>
            <div class="second-line">
                <button>Non</button>
                <button><a href="">Oui</a></button>
            </div>
        </div>
    </div>

    <!-- modify product popup -->

    <div class="modify-popup">
        <div class="centred-div">
            <div class="icon top-modify" style="background-image: url('./icons/actualise.png');" ></div>
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
                        <option value="opel">Nourriture</option>
                        <option value="audi">Bébé</option>
                    </select>
                </div>

                <div class="line">
                    <input type="submit" value="Modifier" >
                </div>

            </form>
        </div>
    </div>

    <aside>

        <div class="head">
            <div class="top">
                <p>Easy buy</p>
                <div class="toglle" style="background-image: url('./icons/menu.png');" ></div>
            </div>
            <img src="./images/setting.png" alt="">
            <p>Admin</p>
        </div>

        <div class="nav">
            <div class="option active">
                <div class="icon" style="background-image: url('./icons/home.png');" ></div>
                <a href="./home.html">Acceuil</a>
            </div>
            <div class="option">
                <div class="icon" style="background-image: url('./icons/Product.png');" ></div>
                <a href="./products.html">Produits</a>
            </div>
            <div class="option">
                <div class="icon" style="background-image: url('./icons/exit.png');" ></div>
                <a href="#">Deconnexion</a>
            </div>
        </div>

        <div class="exit">
            <!-- <div class="option">
                <div class="icon" style="background-image: url('./icons/exit.png');" ></div>
                <a href="#">Deconnexion</a>
            </div> -->
        </div>

    </aside>

    <main>
        <div class="header">
            <p>Welcome back 🔥</p>
        </div>
        <div class="general-infos">
            <div class="cart">
                <div class="icon" style="background-image: url('./icons/Product.png');" >
                    
                </div>
                <div class="definition">
                    <p>Total Produits</p>
                    <p>{{ $totalProduits ?? 0 }}</p>
                </div>
            </div>
            <div class="cart product-stock">
                <div class="icon" style="background-image: url('./icons/stock.png');" >
                    
                </div>
                <div class="definition">
                    <p>Produits en Stock</p>
                    <p>{{ $produitsEnStock ?? 0 }}</p>
                </div>
            </div>
            <div class="cart empty-stock">
                <div class="icon" style="background-image: url('./icons/alert.png');" >
                    
                </div>
                <div class="definition">
                    <p>Rupture de Stock</p>
                    <p>{{ $ruptureDeStock ?? 0 }}</p>
                </div>
            </div>
        </div>
        <div class="charts">
            <canvas id="myChart" style="width:90%;max-width:400px" ></canvas>
            <canvas id="myChart2" style="width:70%;max-width:400px" ></canvas>
        </div>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="./script.js" ></script>
    <script>
        // PREMIER GRAPHE
        var xValues = ["Produit1", "Produit2", "Produit3", "Produit4"];
        var yValues = [55, 49, 44, 24];
        var barColors = [
        "#48b057",
        "#48b057bf",
        "#48b05780",
        "#48b05740"
        ];

        new Chart("myChart", {
        type: "pie",  // keep this as pie chart
        data: {
            labels: xValues,
            datasets: [{
            backgroundColor: barColors,
            data: yValues
            }]
        },
        options: {
            title: {
            display: true,
            text: "Produit les plus stockés"
            }
        }
        });
        // DEUXI2ME GRAPHE
        var xValues = ["Produit1", "Produit2", "Produit3", "Produit4"];
        var yValues = [55, 49, 44, 24];
        var barColors = [
        "#48b057",
        "#48b057bf",
        "#48b05780",
        "#48b05740"
        ];


        new Chart("myChart2", {
        type: "bar",
        data: {
            labels: xValues,
            datasets: [{
            backgroundColor: barColors,
            data: yValues
            }]
        },
        options: {
            legend: {display: false},
            title: {
            display: true,
            text: ''
            }
        }
        });
    </script>
</body>
</html>