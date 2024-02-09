<?php

require_once "header.php";
$title = "Formulaire d'Ajout";

require_once "connect.php";
$requete = $db->prepare("SELECT *FROM artist");
$requete->execute();
$results = $requete->fetchAll(PDO::FETCH_OBJ);

?>

<div class= "text-center">
    <h1 class="font-weigth-bold">Ajouter un vinyle</h1>
</div>
<div class = "container mt-4">
    <form class = "myform" action = "add_script.php" method = "POST" enctype="multipart/form-data">
        <div class= "row">
            <div class="mb-3 form-group col-12">
                <label for="title" class="form-label"><h6>Titre</h6></label>
                <input type="text" id = "label" class="form-control m" name = "title">
            </div>
            <div class="mb-3 form-group col-12">
                <label for="artist"><h6>Artiste</h6></label><br>
                <select name="artist" class="col-12">
                    <option id="0">Veuillez choisir un artiste</option>
                    <?php foreach($results as $artist){ ?>
                        <option value="<?=$artist->artist_id?>" id="<?=$artist->artist_id?>"><?=$artist->artist_name?></option>
                    <?php };?>
                </select>
            <div class="mt-2 mb-2 form-group col-12">
                <label for="date" class="form-label"><h6>Année de sortie</h6></label>
                <input type="text" class="form-control" name = "annee" placeholder ="Entrez l'année">
            </div>

            <div class="mb-3 form-group col-12">
                <label for="text" class="form-label">Genre</label>
                <input type="text" class="form-control m" name = "genre" placeholder ="Entrez le genre(Rock, pop, prog...)">
            </div>
        </div>

        <div class="mb-3 form-group col-12" >
            <label for="text" class="form-label"><h6>Label</h6></label>
            <input type="text" class="form-control" name = "label" placeholder ="Entrez le label(EMI, Warner, PolyGram, Univers sale...)">
        </div>
        
        <div class="mb-3 form-group col-12" >
            <label for="nombre" class="form-label"><h6>Prix</h6></label>
            <input type="number" class="form-control" name = "prix">
        </div>

        <div class="mb-3 form-group col-12">
            <label for="picture" class="form-label"><h6>Picture</h6></label>
        </div>

        <input type="file" name="filename" value="">
      
        
        <div class="form-group col-12 mt-3">
            <button type="submit" href ="add_script.php" class="btn btn-primary" name="envoyer">Ajouter</button>
            <a button type="submit" href ="index.php" class="btn btn-primary">Retour</a>
        </div>
    </form>
</div>
