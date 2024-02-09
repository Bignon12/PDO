
<?php 
// titre de la page
$title = "Page de détail";

// inclusion de la page en-tête
require_once "header.php";


if(isset($_GET['id'])) {
    // connexion à la base de données
    require_once "connect.php";
    $id = $_GET['id'];

    // utilisation de la requête préparée pour éviter les injections SQL
    $query = "SELECT * FROM disc INNER JOIN artist ON disc.artist_id = artist.artist_id WHERE disc_id = :id";
    $det = $db->prepare($query);
    $det->bindValue(':id', $id, PDO::PARAM_INT);
    $det->execute();

    // récupération des résultats
    $details = $det->fetchAll(PDO::FETCH_OBJ);
 

}
?>

<h1 class="font-weight-bold text-center">Détails</h1>

<div class="d-flex justify-content-center">
    <form class="myform" action="#" method="GET">
        <?php foreach ($details as $disc): ?>
        <div class="row">
            <div class="mb-3 form-group col-6">
                <label for="title" class="form-label"><h5>Titre</h5></label>
                <input type="text" class="form-control m" name="title" value="<?=$disc->disc_title?>">
            </div>
            <?php foreach ($details as $artist): ?>
            <div class="mb-3 form-group col-6">
                <label for="text" class="form-label"><h5>Artiste</h5></label>
                <input type="text" class="form-control m" name="artist" value="<?=$artist->artist_name?>">
            </div>
            <?php endforeach ?>
        </div>

        <div class="row">
            <div class="mb-3 form-group col-6">
                <label for="date" class="form-label"><h5>Année de sortie</h5></label>
                <input type="text" class="form-control" name="annee" value="<?=$disc->disc_year?>">
            </div>

            <div class="mb-3 form-group col-6">
                <label for="text" class="form-label"><h5>Genre</h5></label>
                <input type="text" class="form-control m" name="genre" value="<?=$disc->disc_genre?>">
            </div>
        </div>

        <div class="row">
            <div class="mb-3 form-group col-6">
                <label for="label" class="form-label"><h5>Label</h5></label>
                <input type="text" class="form-control" name="label" value="<?=$disc->disc_label?>">
            </div>

            <div class="mb-3 form-group col-6">
                <label for="prix" class="form-label"><h5>Prix</h5></label>
                <input type="text" class="form-control" name="prix" value="<?=$disc->disc_price?>">
            </div>
        </div>

        <div class="col-6">
            <label for="picture" class="form-label"><h5>Picture</h5></label>
        </div>
        
        <div class="col-8">
            <img src="images/<?=$disc->disc_picture?>" alt="<?=$disc->disc_title?>" class="img-fluid rounded">
        </div>
        <?php endforeach ?>

        <div class="d-flex justify-content-md mt-3">
            <a href="update_form.php?id=<?=$id?>" type="button" class="btn btn-primary" name="update">Modifier</a>
            <a href="delete_form.php?id=<?=$id?>" type="button" class="btn btn-primary" name="delete">Supprimer</a>
            <a href="index.php?page=liste" type="button" class="btn btn-primary">Retour</a>
        </div>
    </form>
</div>

