<?php
include "connect.php";

// Vérifie si le formulaire a été soumis
if(isset($_POST['id'])) {
    // Démarre la transaction
    $db->beginTransaction();
    
    $id = $_POST['id'];
    
    // Utilisation de la requête préparée pour éviter les injections SQL
    $pdoS = $db->prepare("SELECT * FROM disc INNER JOIN artist ON disc.artist_id = artist.artist_id WHERE disc_id = :id");
    $pdoS->bindValue(':id', $id, PDO::PARAM_INT);
    $pdoS->execute();

    // Récupération des résultats
    $resulta = $pdoS->fetchAll(PDO::FETCH_OBJ);


    // Récupère les valeurs du formulaire
    $titre = $_POST["title"];
    $artiste = $_POST["artist"];
    $annee = $_POST["annee"];
    $genre = $_POST["genre"];
    $label = $_POST["label"];
    $prix = $_POST["prix"];

    // Prépare la requête avec les paramètres nommés
    $requet = $db->prepare("UPDATE disc INNER JOIN artist ON disc.artist_id = artist.artist_id SET disc.disc_title = :titre, disc.disc_year = :annee, disc.disc_picture = :image, disc.disc_label = :label, disc.disc_genre = :genre, disc.disc_price = :prix, disc.artist_id = :artist WHERE disc.disc_id = :id");

    // Vérifie si un fichier a été soumis et s'il n'y a pas d'erreur
    if(isset($_FILES["filename"]) && $_FILES["filename"]["error"] == UPLOAD_ERR_OK && $_FILES["filename"]["size"] > 0) {
        $image = $_FILES["filename"]["name"];
        $requet->bindValue(":image", $image, PDO::PARAM_STR);
    } else {
        // Si aucun fichier n'a été soumis ou s'il y a une erreur, conserve l'ancienne valeur
        $image = $_POST["image"];
        $requet->bindValue(":image", $image, PDO::PARAM_STR);
    }

    // Lie les valeurs aux paramètres de la requête
    $requet->bindValue(":titre", $titre, PDO::PARAM_STR);
    $requet->bindValue(":annee", $annee, PDO::PARAM_INT);
    $requet->bindValue(":genre", $genre, PDO::PARAM_STR);
    $requet->bindValue(":label", $label, PDO::PARAM_STR);
    $requet->bindValue(":prix", $prix, PDO::PARAM_INT);
    $requet->bindValue(":artist", $artiste, PDO::PARAM_STR);
    $requet->bindValue(':id', $id, PDO::PARAM_INT);

    // Exécute la requête
    $requet->execute();
    
    // Valide la transaction
    $db->commit();

    echo "Vos modifications ont été bien enregistrées";
    
    // Redirige vers la page d'index
    header("Location: index.php");
    exit();
} else {
    echo "Erreur lors du chargement du fichier";
}
?>

