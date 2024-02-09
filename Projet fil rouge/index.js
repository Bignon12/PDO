$(document).ready(function(){

    var searchInput = $("#searchInput");
    var searchButton = $("#searchButton");
    var results = $("#resultspla");
    var affcat = $("#affcat");
    var affplat = $("#affpla");
    var resultat = $("#result");
    var div = $(".ck");
    var div2 = $(".cg");
   
    
    $.getJSON("the_district.json" , function(data){
        var categorie = data.categorie;
        var plat = data.plat;

        //Barre de recherche
        searchButton.click(function(){
            alert("a");
            affcat.empty();
            affplat.empty();
            div.hide();
            div2.hide();
            var saisi = searchInput.val();
            var filtrePlats=plat.filter(function(filtre)
                {
                    return filtre.libelle.toLowerCase().includes(saisi.toLowerCase());
              
                 })

            afficher(filtrePlats);

            function afficher(filtrePlats){ 
                if (saisi.length === 0)
                {
                    results.html("Veuillez saisir un nom de plats");
                }
                else
                {
                    $.each(filtrePlats, function(indice, plat)
                    {
                        
                        var html = `
                        <div class= "row col-2 m-4" >
                        <div class="card" style="w-25 mx-1;">
                            <img src="images_the_district/food/${plat.image}" class="img-fluid cover rounded-start" alt="image categorie">
                            <div class="card-body">
                                <h3 class="card-title text-center">${plat.libelle}</h3>
                                <p>${plat.description}</p>
                                <p>${plat.prix}€</p>
                                <a href = "commande.php" role="button" button type="submit" name = "commander" class="btn btn-primary">Commander</a>
                            </div>
                        </div>
                    </div>
                        ` 
                    results.append(html);
                    })
                }
            }
        });
        results.empty();  




//affichage des catégories

//         for (var i=0; i<categorie.length; i++){
//             var cat = categorie[i];
//             var affich = `
            
//             <div class= "row ok col-2 m-5" >
//             <div class="card" style="width: 25rem;">
//                 <img src="images_the_district/category/${cat.image}" class="img-fluid cover rounded-start" alt="image categorie">
//                 <div class="card-body">
//                 <h3 value="${cat.id_categorie}"class="card-text text-center">${cat.libelle}</h3>
//                 </div>
//             </div>
//         </div>      
//             `
//            affcat.append(affich);
//         }
   
    
//         //Affichage des plats
//         for (var i=0; i<3; i++){
//             var plt = plat[i];
//             var carte = `
            
//             <div class= "row col-2 m-5" >
//             <div class="card" style="width: 25rem;">
//                 <img src="images_the_district/food/${plt.image}" class="img-fluid cover rounded-start" alt="image categorie">
//                 <div class="card-body">
//                     <h3 class="card-title text-center">${plt.libelle}</h3>
//                     <a href ="commande.php" type="button" class="btn btn-primary">Commander</a>
//                 </div>
//             </div>
//         </div>      
//             `
//            affplat.append(carte);
//         }


//         // Sélectionner un plat en fonction de sa catégorie :
//         $(".ok") .click (function (){ // quand l'élément ok est cliqué 

//             affcat.empty();
//             affplat.empty();
//             div.hide();
//             div2.hide();
    

//             // trouvé la valeur sur l'élément cliqué puis l'affecte dans la variable 
//             var platid = $(this).find(".card-text").attr("value");
//             var plt = plat[i];
//             console.log(plt);

//             // vider le resultat de la recherche
//             resultat.empty();
        
//             // parcour chaque élément dans le tableau plat
//             $.each (plat, function (index, plt){

//                 // récupère l'id de la catégorie de l'élément 
//                 var catid = plt.id_categorie;

//                 // vérifie si l'id de la catégorie et l'id en cours de traitement correspondent
//                 if (catid == platid) {
                    
//                     // crée une carte carte qui s'affiche quand on click sur une carte de l'index
//                     var card = `
//                     <div class= "row col-2 m-5" >
//                     <div class="card" style="width: 25rem;">
//                         <img src="images_the_district/food/${plt.image}" class="img-fluid cover rounded-start" alt="image categorie">
//                         <div class="card-body">
//                             <h3 class="card-title text-center">${plt.libelle}</h3>
//                             <a href ="commande.php" type="button" class="btn btn-primary">Commander</a>
//                         </div>
//                     </div>
//                 </div>      
//                 `
//                     // afficher les carte de resultat    
//                     resultat.append(card);

//                 };

//             });

//         });

     });

});
