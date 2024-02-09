
<?php 


// inclusion de la page en-tête
require_once "header.php";

// titre de la page
$title = "Formulaire de modification";

// connexion à la base de données
require_once "connect.php";

if(isset($_GET['id'])) {

    // Démarre la transaction
    $db->beginTransaction();
    
    $id = $_GET['id'];
    $query = "SELECT * FROM artist";
    $stm = $db->prepare($query);
    $stm->execute();
    $results = $stm->fetchAll(PDO::FETCH_OBJ);

    // utilisation de la requête préparée pour éviter les injections SQL
    $det = $db->prepare("SELECT * FROM disc INNER JOIN artist ON disc.artist_id = artist.artist_id WHERE disc_id = :id");
    $det->bindValue(':id', $id, PDO::PARAM_INT);
    $det->execute();

    // récupération des résultats
    $details = $det->fetchAll(PDO::FETCH_OBJ);

$db->commit();
}
?>
<div class="text-center">
    <h1 class="font-weight-bold">Modifier un vinyle</h1>
</div>
<div class="container mt-4">
    <form class="myform" action="update_script.php" method="POST" enctype="multipart/form-data">
        <?php foreach ($details as $disc): ?>
            <div class="row">
                <div class="mb-3 form-group col-12">
                    <label for="title" class="form-label"><h6>Titre</h6></label>
                    <input type="text" class="form-control m" name="title" value="<?= $disc->disc_title ?>">
                </div>
                <div class="mb-3 form-group col-12">
                    <label for="artist"><h6>Artiste</h6></label><br>
                    <select name="artist" class="col-12">
                        <?php foreach($results as $artist){ ?>
                        <option value="<?=$artist->artist_id?>"><?=$artist->artist_name?></option>
                         <?php };?>
                    </select>
                </div>
                <div class="mt-2 mb-2 form-group col-12">
                    <label for="annee" class="form-label"><h6>Année de sortie</h6></label>
                    <input type="text" class="form-control" name="annee" value="<?= $disc->disc_year ?>">
                </div>
                <div class="mb-3 form-group col-12">
                    <label for="text" class="form-label">Genre</label>
                    <input type="text" class="form-control m" name="genre" value="<?= $disc->disc_genre ?>">
                </div>
                <div class="mt-2 mb-2 form-group col-12">
                    <label for="label" class="form-label"><h6>Label</h6></label>
                    <input type="text" class="form-control" name="label" value="<?= $disc->disc_label ?>">
                </div>
                <div class="mb-3 form-group col-12">
                    <label for="prix" class="form-label">Prix</label>
                    <input type="nombre" class="form-control m" name="prix" value="<?= $disc->disc_price ?>">
                </div>
            </div>


            <div class="form-group w-100">
                <div class="col-12">
                    <label for="picture" class="mr-4"><h5>Picture</h5></label>
                    <input type="hidden" name="image" value="<?= $disc->disc_picture ?>">
                    <input name="filename" type="file" class="col-11 mb-4"><br>
                    <img src="images/<?= $disc->disc_picture ?>" class="col-4" alt="<?= $disc->disc_title ?>">
                </div>
            </div>
        <?php endforeach; ?>
        
        <div class="form-group col-12 mt-3">
            <button type="submit" name="id" value="<?= $disc->disc_id ?>" class="btn btn-primary">Enregistrer les modifications</button>
            <a href="index.php?page=liste" type="button" class="btn btn-primary">Retour</a>
        </div>
    </form>
</div>


