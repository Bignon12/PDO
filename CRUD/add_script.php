<?php

//session_start();

//var_dump ($_POST);

try {
    $db = new PDO('mysql:host=localhost;charset=utf8;dbname=record', 'admin', 'Afpa1234');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->beginTransaction();

    $requete = $db->prepare("SELECT * FROM disc");
    $requete->execute();
    $resultat = $requete->fetchAll(PDO::FETCH_OBJ);

    $title = $_POST["title"];
    $id = intval($_POST["artist"]);
    $year = intval($_POST["annee"]);
    $genre = $_POST["genre"];
    $label = $_POST["label"];
    $prix = intval($_POST["prix"]);
    $picture = $_FILES["filename"]["name"];

    // echo "TITRE: $title <br>";
    // echo "ID: $id <br>";
    // echo "ANNEE: $year <br>";
    // echo "GENRE: $genre <br>";
    // echo "LABEL: $label <br>";
    // echo "PRIX: $prix <br>";
    // echo "IMAGE: $picture";

    $dbStat = $db->prepare("INSERT INTO disc(disc_title, disc_year, disc_picture, disc_label, disc_genre, disc_price, artist_id) VALUES(:titre, :annee, :picture, :label, :genre, :prix, :id)");
    $dbStat->bindValue(':titre', $title, PDO::PARAM_STR);
    $dbStat->bindValue(':annee', $year, PDO::PARAM_INT);
    $dbStat->bindValue(':picture', $picture, PDO::PARAM_STR);
    $dbStat->bindValue(':label', $label, PDO::PARAM_STR);
    $dbStat->bindValue(':genre', $genre, PDO::PARAM_STR);
    $dbStat->bindValue(':prix', $prix, PDO::PARAM_INT);
    $dbStat->bindValue(':id', $id, PDO::PARAM_INT); 

    $dbStat->execute();

    $db->commit();

    echo "Vos données ont été bien prises en compte";
    header("location: index.php");
    exit();
} catch (Exception $e) {
    echo "Erreur de connexion.. " . $e->getMessage();
}

?>