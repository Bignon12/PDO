<?php
session_start();

// Importation de bibliothèque
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once "PHPMAILER/vendor/autoload.php";
require_once "DAO.php";

// Récupération des valeurs du formulaire
$nom = $_POST["nom"];
$email = $_POST["email"];
$tel = $_POST["tel"];
$adresse = $_POST["adr"];
$id = $_POST["text"];

// Tester la validation des informations saisies
if (
    valider_nom($nom) == true &&
    valider_email($email) == true &&
    valider_tel($tel) == true &&
    valider_adresse($adresse) == true
) {
    // Créer une session
    $_SESSION["nom"] = $nom;
    $_SESSION["email"] = $email;
    $_SESSION["tel"] = $tel;
    $_SESSION["adr"] = $adresse;

    // Création de l'objet PHPMailer
    $mail = new PHPMailer(true); // "true" active la gestion des erreurs lors de l'envoi du mail

    // Utilisation du SMTP/envoi du mail Simple Mail Transfère Protocoles
    $mail->isSMTP();

    // Configuration de l'adresse du serveur/SMTP phpmailer doit se connecter et exécuter le script sur la même machine
    $mail->Host = "localhost";

    // Désactivation de l'authentification SMTP
    $mail->SMTPAuth = false;

    // Configuration du port SMTP (MailHog)/le port où phpmail doit se connecter
    $mail->Port = 1025;

    // Expéditeur du mail, adresse mail et nom
    $mail->setFrom("from@thedistrict.com", "The District Company");

    // Le(s) destinataire(s), adresse et nom
    $mail->addAddress($email, $nom);

    // On précise si l'on veut envoyer un email sous format HTML
    $mail->isHTML(true);

    // Objet du mail
    $mail->Subject = "Confirmation de votre commande";

    // Corps du message
    $plat = getPlatbyId($id, $db);

    $message = 'Merci pour votre commande dont voici les détails:';
    $message .= '<br><br><strong>Numéro de commande :</strong> #12345';
    $message .= "<br><br><strong>Nom du plat: </strong>" . $plat->libelle . ".";
    $message .= "<br><br><strong>Description du plat: </strong>" . $plat->description . ".";
    $message .= "<br><br><strong>Prix du plat: </strong>" . $plat->prix  ." ". "euros";
    $message .= "<p>Merci de votre confiance. Un livreur vous contactera sous peu</p>";
    $message .= "<p>La direction</p>";

    $mail->Body = $message;

    // Envoi du Mail dans un bloc try/catch pour capturer les éventuelles erreurs
    try {
        $mail->send(); // Envoie du mail avec la fonction send

        echo "Email envoyé avec succès";
        header("location: commandrecu.php");
       

    } catch (Exception $e) {
        // Affiche un message d'erreur suivi des détails des erreurs
        echo "L'envoi de mail a échoué. L'erreur suivante s'est produite: ", $mail->ErrorInfo;
    }

    // Insertion des données en base de données
    $quantite = $_POST["quantity"];
    $prix = $plat->prix;
    $total = $prix * $quantite;
    $date_commande = new DateTime("now");
    $date_commande = $date_commande->format("y-m-d");
    $etat = "En cours de préparation";

    $requete = $db->prepare("INSERT INTO commande(id_plat, quantite, total, date_commande, etat, nom_client, telephone_client, email_client, adresse_client) VALUES (:id_plat, :quantite, :total, :date_commande, :etat, :nom_client, :telephone_client, :email_client, :adresse_client)");
    $requete->bindValue(":id_plat", $id, PDO::PARAM_INT);
    $requete->bindValue(":quantite", $quantite, PDO::PARAM_INT);
    $requete->bindValue(":total", $total, PDO::PARAM_INT);
    $requete->bindValue(":date_commande", $date_commande, PDO::PARAM_STR);
    $requete->bindValue(":etat", $etat, PDO::PARAM_STR);
    $requete->bindValue(":nom_client", $nom, PDO::PARAM_STR);
    $requete->bindValue(":telephone_client", $tel, PDO::PARAM_STR);
    $requete->bindValue(":email_client", $email, PDO::PARAM_STR);
    $requete->bindValue(":adresse_client", $adresse, PDO::PARAM_STR);
    $requete->execute();
} else {
    // On supprime la session
    unset($_SESSION["nom"]);
    unset($_SESSION["email"]);
    unset($_SESSION["tel"]);
    unset($_SESSION["adr"]);

    session_destroy();

    echo "<p>Veuillez remplir correctement le formulaire</p>";
}
?>
