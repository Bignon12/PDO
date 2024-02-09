
<?php $title = "Page d'accueil";
require_once "header.php";
require_once "DAO.php";


?>


<body>
    <div class="par">
        <section class="container-fluid">
            <div class="ra">
                <form action = "resultsearch.php" method = "GET">
                    <?php if (isset($_GET['search']) && !empty($_GET['search'])) { 
                        $keyWord = $_GET['search'];
                        $plats =  searchBar($keyWord, $db);
                        header("location: resultsearch.php");
                        exit;

                    } ?>
                
                    <div class="search-bar">
                        <input class="search-input form-control" id="searchInput" name = "search" type="text" placeholder="Rechercher">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button class="search-button btn btn-primary" id="searchButton" type="submit">Rechercher</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>

        <section class="text-center ck mx-auto">
            <h1>Bienvenue! Voici nos catégories de plats populaires</h1>
            <div class="row d-flex justify-content-around mx-auto">
                <?php $categories = getCategorie($db); ?>
                <?php foreach ($categories as $categorie) { ?>
                    <div class= "row col-3 m-5" >
                        <div class="card" style="width: 25rem;">
                            <img src="images_the_district/category/<?= $categorie->image ?>" class="img-fluid cover rounded-start" alt="<?=$categorie->libelle?>">
                            <div class="card-body">
                                <h3 class="card-text text-center"><?= $categorie->libelle  ?></h3>    
                                <a href = "detailCategorie.php?id=<?= $categorie->id?>" class ="btn btn-primary">Selectionner</a>
                            </div>
                        </div>
                    </div>            
                <?php } ?>
            </div>
        </section>

        <section id= "affpla" class= "text-center cg mx-auto">
            <h2>Voici les plats les plus vendus</h2>
            <div class= "d-flex justify-content-around mx-auto" >
                <?php $bestPlats = getBestPlat($db);?>
                <?php foreach ($bestPlats as $plat) { ?>
                    <div class="row col-3 m-5">
                        <div class="card" style="width: 25rem;">
                            <img src="images_the_district/food/<?=$plat->image?>" class="img-fluid cover rounded-start" alt="<?=$plat->libelle?>">
                            <div class="card-body">
                                <h3 class="card-title text-center"><?=$plat->libelle?></h3>
                                <a href ="commande.php?id=<?=$plat->id?>"  class="btn btn-primary">Commander</a>
                            </div>
                        </div>
                    </div>  
                <?php } ?>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                <a href="categorie.php" class="btn btn-primary btn-lg zoom col-5 col-md-1 btns">Suivant</a>
            </div>
        </section>

<?php require_once "footer.php" ?>
