<?php
//importation de bibliothèque
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once "vendor/autoload.php";

$mail = new PHPMailer(true); //new objet de la classe, true active la gestion des erreur lors de l'envoi du mail

//Utilisation du SMTP/envoie du mail Simple Mail Transfère Protocoles
// $mail->isSMTP();

//Configuration de l'adresse du serveur/SMTP phpmailer doit se connecter et exécuter le script sur la même machine
$mail->Host = "localhost"; 

//Désactivation de l'authentification SMTP
$mail ->SMTPAuth = false;

//Configuration du port SMTP (MailHog)/le port ou phpmail doit se connecter
$mail->Port = 8025;

//Expéditeur du mail, adresse mail et nom
$mail->setFrom("from@thedistrict.com", "The District Company");

//Le(s) destinataire(s), adresse et nom
$mail->addAddress("client@example.com", "Mr client1");
$mail->addAddress("client2@example.com");

//Adresse de copie
$mail->addReplyTo("reply@thedistrict.com", "Reply");

//CC & BCC
$mail->addCC("cc@example.com");//les destinataires recevront une copie du message
$mail->addBCC("bcc@example.com");//les destinataires recevront une copie du message sans informer les autre destinataire

//On précise si l'on veut envoyer un email sous format HTML
$mail->isHTML(true);

//on ajoute la/les pièces jointes
//$mail->addAttachment("/path/to/file.pdf");

//Objet du mail
$mail->Subject = "test PHPMailer";

//corps du message
$mail->Body = "On teste l'envoi de mails avec PHPMailer";

//Envoie du Mail dans un block try/catch pour capturer les éventuelles erreurs
if($mail){
    try{
        $mail->send();//envoie du mail avec la fonction send
        echo "Email envoyé avec succès";
    }catch (Exception $e){
        //affiche un message d'erreur suivi des détails des erreurs
        echo "l'envoi de mail a échoué. L'erreur suivante s'est produite: ", $mail->ErrorInfo;
    }
}

?>