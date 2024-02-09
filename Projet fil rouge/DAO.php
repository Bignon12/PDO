
<?php
require_once "connectdb.php";

function getCategorie($db)
{
    // on prépare la requête
    $requete = $db->prepare('SELECT * FROM categorie LIMIT 6');
    // on exécute la requête
    $requete->execute();
    // on récupère les données
    $categories = $requete->fetchAll(PDO::FETCH_OBJ);
    return $categories;
} 

function getPlat($db)
{
    // on prépare la requête
    $requete = $db->prepare('SELECT * FROM plat');
    // on exécute la requête
    $requete->execute();
    // on récupère les données
    $plat = $requete->fetchAll(PDO::FETCH_OBJ);
    return $plat;
}
   
function getBestPlat($db)
{
    $request = $db->prepare("SELECT * FROM commande INNER JOIN plat ON commande.id_plat=plat.id ORDER BY commande.quantite DESC LIMIT 3");
    $request->execute();
    $bestplat = $request->fetchAll(PDO::FETCH_OBJ);
    return $bestplat;
}

function getPlatByCategorieId($id, $db)
{
    $query = "SELECT * FROM plat WHERE id_categorie = :id";
    $det = $db->prepare($query);
    $det->bindValue(':id', $id, PDO::PARAM_INT);
    $det->execute();
    $plats = $det->fetchAll(PDO::FETCH_OBJ);
    return $plats;
}
function getPlatbyId($id, $db)
{
    $requete = $db->prepare("SELECT * FROM plat WHERE id = :id");
    $requete->bindValue(':id', $id, PDO::PARAM_INT);
    // on exécute la requête
    $requete->execute();
    // on récupère les données
    $plat = $requete->fetch(PDO::FETCH_OBJ);
    return $plat;
}

function searchBar($keyWord, $db)
{
    $requete = $db->prepare("SELECT * FROM plat WHERE libelle LIKE '%$keyWord%'");
    $requete->execute();
    $plats = $requete->fetchAll(PDO::FETCH_OBJ);
    return $plats;
    

// $requete = $db->prepare("SELECT * FROM plat WHERE libelle LIKE :keyword");
// $requete->execute(array(':keyword' => '%$keyWord%'));
// $plats = $requete->fetchAll(PDO::FETCH_OBJ);

}



function valider_nom($nom){
    $regex = "/[A-Za-z]+$/";
    if (preg_match($regex, $nom)){
        return true;
    }
    else{
        echo "Veuillez saisir votre nom";
        return false;
    }
}
function valider_prenom($prenom){
    $regex = "/[A-Za-z]+$/";
    if (preg_match($regex, $prenom)){
        return true;
    }
    else{
        echo "Veuillez saisir votre prenom";
        return false;
    }
}
function valider_email($email){
    $regex = "/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+\.[a-zA-Z]{2,}$/";
    if (preg_match($regex, $email)){
        return true;
    }
    else{
        echo "Email invalide";
        return false;
    }
}   
function valider_tel($tel){
    $regex = "/[0-9.-]+$/";
    if (preg_match($regex, $tel)){
        return true;
    }
    else{
        echo "Numéro de téléphone invalide";
        return false;
    }
}
function valider_adresse($adresse){
    $regex = "/^[a-zA-Z0-9, -]+$/";
    if (preg_match($regex, $adresse)){
        return true;
    }
    else{
        echo "Veuillez saisir votre adresse";
        return false;
    }
}
?>