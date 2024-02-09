
$(document).ready(function(){
    $.getJSON("the_district.json", function(data){
        var affiche = $("#cac");
        var donnee = data.categorie;
        var affiche = $("#results");
       
      
        for (var i=0; i<donnee.length; i++){
            var cat = donnee[i];
            console.log(cat);
            var affichage = `
            
            <div class= "row col-2 m-5" >
            <div class="card" style="width: 25rem;">
                <img src="images_the_district/category/${cat.image}" class="img-fluid cover rounded-start" alt="image categorie">
                <div class="card-body">
                    <h3 class="card-title text-center">${cat.libelle}</h3>
                    <a href ="plat.php" type="button" class="btn btn-primary">Sélectionner</a>
                </div>
            </div>
        </div>      
            `
           affiche.append(affichage);
        }
    })
    });