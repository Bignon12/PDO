<?php 
$title = "Les catégories";
require_once "header.php";
require_once "DAO.php";
?>

<div class="par">
    
    <section>
        <div>
            <h1 class="text-center">Voici les différentes catégories de plats que nous vous proposons!</h1>
        </div>

            <div class="row d-flex justify-content-around mx-auto">
                <?php $categories = getCategorie($db); ?>
                <?php foreach ($categories as $categorie) { ?>
                    <div class= "row col-3 m-5" >
                        <div class="card" style="width: 25rem;">
                            <img src="images_the_district/category/<?= $categorie->image ?>" class="img-fluid cover rounded-start" alt="<?=$categorie->libelle?>">
                            <div class="card-body">
                                <h3 value="<?= $categorie->id?>"class="card-text text-center"><?= $categorie->libelle  ?></h3>
                                <a href = "detailCategorie.php?id=<?= $categorie->id?>" class ="btn btn-primary">Selectionner</a>
                            </div>
                        </div>
                    </div>  
                            
                <?php } ?>
            </div>
    </section>

    <section>
        <div class="d-grid gap-2 d-md-flex justify-content-md-around">
            <a href = "index.php" class="btn btn-primary" type="button">Précédent</a>
            <a href = "plat.php" class="btn btn-primary" type="button">Suivant</a>
        </div>
    </section>   

<?php require "footer.php";?>
