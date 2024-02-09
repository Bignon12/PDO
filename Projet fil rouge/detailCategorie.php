<?php 
// titre de la page
$title = "Les plats de cette catégorie";

require_once "header.php";


if(isset($_GET['id'])) 
{ 
    require_once "DAO.php";
    $id = $_GET['id'];
}
?>

<section>
    <div class="re"></div>  

    <div>
        <h1 class="text-center">Voici les plats de cette catégorie!</h1>
    </div>

    <div id="aff" class="row d-flex justify-content-around mx-auto">
        <?php $plats = getPlatByCategorieId($id, $db);?>
        <?php foreach ($plats as $plat) { ?>
            <div class= "row col-2 m-4" >
                <div class="card">
                    <img src="images_the_district/food/<?=$plat->image?>" class="img-fluid cover rounded-start" alt="<?=$plat->libelle?>">
                    <div class="card-body">
                        <h3 class="card-title text-center" value = <?= $plat->id?>><?=$plat->libelle?></h3>
                        <p><?=$plat->description?></p>
                        <p><?=$plat->prix?>€</p>
                        <a href = "commande.php?id=<?=$plat->id?>" class="btn btn-primary">Commander</a>
                    </div>
                </div>
            </div>
        <?php  } ?>
    </div>
</section>

<section>
    <div class="d-grid gap-2 d-md-flex justify-content-md-around">
        <a href = "index.php" class="btn btn-primary" type="button">Précédent</a>
        <a href = "plat.php" class="btn btn-primary" type="button">Suivant</a>
    </div>
</section>  