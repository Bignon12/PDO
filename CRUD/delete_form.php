<?php 

require_once "header.php";
$title = "Suppression d'un vynile";

// connexion à la base de données
require_once "connect.php";

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // utilisation de la requête préparée pour éviter les injections SQL
    $query = "DELETE FROM disc WHERE disc_id = :id";
    $stm = $db->prepare($query);
    $stm->bindValue(':id', $id, PDO::PARAM_INT);

    $esecutIsOk = $stm->execute();

    if($esecutIsOk == true)
    {
        $message = "Ce vynile a été bien supprimé";
    }
    else
    {
        $message = "Echec de la suppression du vynile";
    }
}
?>

<div class = "container">
    <div class="text-center">
        <h1 class="font-weight-bold">Supprimer un vinyle</h1>
    </div>

    <div class="text-center">
        <h1 class="font-weight-bold"><?=$message?></h1>
    </div>

    <div class="form-group col-12 mt-3">
        <a href="index.php?page=liste" type="button" class="btn btn-primary">Retour</a>
    </div>
</div>