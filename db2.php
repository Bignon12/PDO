<?php
    try
    {
        $db = new PDO('mysql:host=localhost;charset=utf8;dbname=record', 'admin', 'Afpa1234');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e){
        echo "Erreur : " .$e->getMessage() . "<br>";
        echo "N° :" . $e->getCode();
        die ("Fin du script");
    }
    $requete = $db->prepare("SELECT * FROM disc");
    $requete->execute();
    $tableau = $requete->fetchAll(PDO::FETCH_OBJ);
?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test PDO</title>
</head>
<body>
    <?php foreach ($tableau as $disc ): ?>
        <div>
            Disc N° :<?= $disc->disc_id ?>
            Disc name: <?= $disc->disc_title ?>
            Disc year: <?= $disc->disc_year?>
        </div>
    <?php endforeach; ?>
</body>
</html>