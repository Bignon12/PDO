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
    $requete = $db->query("SELECT * FROM artist");
    $tableau = $requete->fetchAll(PDO::FETCH_OBJ);
    $requete->closeCursor();
?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test PDO</title>
</head>
<body>
    <?php foreach ($tableau as $artist): ?>
        <div>
            <?= $artist->artist_id ?>
        </div>
    <?php endforeach; ?>
</body>
</html>

