<?php
$title = "page recherche";
require_once "header.php";
require_once "DAO.php";
?>

<body>
    
<div class="video-container">
    <video autoplay loop muted playsinline poster="images_the_district/video accueil.mp4" class="video rounded-3">
        <source src="images_the_district/video accueil.mp4" type="video/mp4">
    </video>
</div>


<div id = "affcat" class= "text-center ck mx-auto">
        <h1>Voici les résultats de vos recherches</h1>
</div>

<div id="aff" class="row justify-content-center mx-auto mt-3">

    <?php if (isset($_GET['search']) && !empty($_GET['search']))
{
    $keyWord = $_GET['search'];
    $plats =  searchBar($keyWord, $db);
  
    foreach ($plats as $plat) { ?>

        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-2">
                <div class="col-md-4">
                    <img src="images_the_district/food/<?=$plat->image?>" class="img-fluid cover rounded-start" alt="<?=$plat->libelle?>">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h3 class="card-title text-center"><?=$plat->libelle?></h3>
                        <p><?=$plat->description?></p>
                        <p><?=$plat->prix?>€</p>
                        <a href ="commande.php?id=<?=$plat->id?>"  class="btn btn-primary">Commander</a>
                    </div>
                </div>
            </div>
        </div>
    <?php  }?>
<?php  }?>