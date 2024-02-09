 
<?php
$title = "Les plats";
require_once "header.php";
require_once "DAO.php";
?>
    
<section>
    <div class="re"></div>  

    <div>
        <h1 class="text-center" ;>Voici nos différents plats</h1>
    </div>

    <div id="aff" class="row d-flex justify-content-around mx-auto">
        <?php $plats = getPlat($db);?>
        <?php foreach ($plats as $plat) { ?>
        <div class= "row col-2 m-4" >
            <div class="card" style= "w-25 mx-1">
                <img src="images_the_district/food/<?=$plat->image?>" class="img-fluid cover rounded-start" alt="<?=$plat->libelle?>">
                <div class="card-body">
                    <h3 class="card-title text-center" value = <?= $plat->id?>><?=$plat->libelle?></h3>
                    <p><?=$plat->description?></p>
                    <p><?=$plat->prix?>€</p>
                    <a href ="commande.php?id=<?=$plat->id?>"  class="btn btn-primary">Commander</a>
                </div>
            </div>
        </div>
        <?php  } ?>
    </div>
</section>
   
<section>
    <div class="d-grid gap-2 d-md-flex justify-content-md-around">
        <a href = "categorie.php" class="btn btn-primary" type="button">Précédent</a>
        <a href = "contact.php" class="btn btn-primary" type="button">Suivant</a>
    </div>
</section> 


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
<?php require "footer.php";?>