<?php
try
{
    //connection à la base de données
    $db = new PDO('mysql:host=localhost;charset=utf8;dbname=the district_creation1', 'admin', 'Afpa1234');

    //définition de capture d'erreur de connexion à la base de données
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (Exception $e){
    echo "Erreur : " .$e->getMessage() . "<br>";
    echo "N° :" . $e->getCode();
    die ("Fin du script");
}