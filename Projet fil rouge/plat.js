$(document).ready(function () {
    $.getJSON("the_district.json", function (data) {
        var resultat = $("#aff");
        var plt = data.plat;

        for (var i = 0; i < plt.length; i++) {
            var truc = plt[i];
            console.log(truc);
            var affi = `
            <div class= "row col-2 m-4" >
            <div class="card" style="w-25 mx-1;">
                <img src="images_the_district/food/${truc.image}" class="img-fluid cover rounded-start" alt="image categorie">
                <div class="card-body">
                    <h3 class="card-title text-center">${truc.libelle}</h3>
                    <p>${truc.description}</p>
                    <p>${truc.prix}€</p>
                    <a href = "commande.php" role="button" button type="submit" name = "commander" class="btn btn-primary">Commander</a>
                </div>
            </div>
        </div>
            `;

            resultat.append(affi);
        }
    });
});