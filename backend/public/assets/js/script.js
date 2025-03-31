let toggle_button = document.querySelector('.head .top .toglle');
let aside = document.querySelector('aside');
let main = document.querySelector("main");
let img = document.querySelector(".head img");
let p = document.querySelectorAll(".head p");
let option_titles = document.querySelectorAll('.nav .option a');
let options = document.querySelectorAll('.nav .option');
let topp = document.querySelector('aside .head .top');

// SIDE BAR MENUE

toggle_button.addEventListener("click",()=>{

    aside.classList.toggle("disabled-aside");
    main.classList.toggle("expended-main");
    img.classList.toggle("hide");

    p.forEach(pa => {
        pa.classList.toggle("hide");

    });

    option_titles.forEach(ot => {
        ot.classList.toggle("hide");
    })

    options.forEach(option => {
        option.classList.toggle("more-height");

    });

    topp.classList.toggle('centred');

});

// POPUP FOR REMOVE PRODUCT

let remove_product_btn = document.querySelectorAll(".opeartions2")
let remove_popup = document.querySelector(".remove-popup");
let ignore_remove_btn = document.querySelector(".centred-div .second-line button:first-child");
let centred_div = document.querySelector(".centred-div");
let deleteForm = document.querySelector("#deleteForm");  // Formulaire de suppression
let productIdInput = document.querySelector("#productId");  // Champ caché pour l'ID du produit

remove_popup.classList.toggle("hide-2");

ignore_remove_btn.addEventListener("click",()=>{
    remove_popup.classList.toggle("hide-2");
})

remove_product_btn.forEach(btn => {
    btn.addEventListener("click", () => {
        let productId = btn.id ; // Récupère l'ID du produit
        productIdInput.value = productId;  // Met à jour la valeur dans le formulaire
        deleteForm.action = '/produits/' + productId + '/supprimer';  // Mets à jour l'URL du formulaire avec l'ID
        console.log(deleteForm.action);
        remove_popup.classList.toggle("hide-2");  // Affiche la popup
    });
});


remove_popup.addEventListener("click", (event) => {
    if (!centred_div.contains(event.target)) {
        remove_popup.classList.add("hide-2");
    }
});

// POPUP FOR MODIFY PRODUCT

let remove_product_btn2 = document.querySelectorAll(".opeartions1")
let modify_popup = document.querySelector(".modify-popup");
let centred_div2 = document.querySelector(".modify-popup .centred-div");
let ModifyForm = document.querySelector("#deleteForm");  // Formulaire de suppression
let productIdInput2 = document.querySelector("#productId2");  // Champ caché pour l'ID du produit

modify_popup.classList.toggle("hide-2");

remove_product_btn2.forEach(btn => {
    btn.addEventListener("click",()=>{
        modify_popup.classList.toggle("hide-2");
    })
});


modify_popup.addEventListener("click", (event) => {
    if (!centred_div2.contains(event.target)) {
        modify_popup.classList.add("hide-2");
    }
});

// POPUP FOR ADD PRODUCT

let add_product_btn = document.querySelectorAll(".additional-buttons button"); // Remplace avec la bonne classe pour le bouton d'ajout
let add_popup = document.querySelector(".add-popup");
let centred_div3 = document.querySelector(".add-popup .centred-div");

add_popup.classList.toggle("hide-2");

add_product_btn.forEach(btn => {
    btn.addEventListener("click", () => {
        add_popup.classList.toggle("hide-2");
    });
});

add_popup.addEventListener("click", (event) => {
    if (!centred_div3.contains(event.target)) {
        add_popup.classList.add("hide-2");
    }
});

// LA RECHERCHE DANS LE TABLEAU :

document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.querySelector(".additional-buttons .search input");
    const tableRows = document.querySelectorAll("table tbody tr");

    searchInput.addEventListener("input", function () {
        const searchText = searchInput.value.toLowerCase();

        tableRows.forEach(row => {
            const rowText = row.textContent.toLowerCase();
            if (rowText.includes(searchText)) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        });
    });
});
