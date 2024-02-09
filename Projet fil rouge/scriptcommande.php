<!-- < ?php
session_start();
//on vérifie que le formulaire a été soumis
    if (isset($_POST["btn"])){
        //on récupère ensuite chacune des valeurs
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $email = $_POST["email"];
        $tel = $_POST["tel"];
        $adresse = $_POST["adr"];

    //on crée des fonctions pour vérifier la validité de chaque champ
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
            $regex = "/^[A-Za-z]+$/";
            if (preg_match($regex, $adresse)){
                return true;
            }
            else{
                echo "Veuillez saisir votre demande";
                return false;
            }
        }
        
        if (valider_nom($nom) == true && valider_prenom($prenom) == true && valider_email($email) == true && valider_tel($tel) == true && valider_adresse($adresse) == true){
            //on crée une session
            // $_SESSION["nom"] = $nom;
            // $_SESSION["prenom"] = $prenom;
            // $_SESSION["email"] = $email;
            // $_SESSION["tel"] = $tel;
            // $_SESSION["text"] = $demande;

            //on crée le fichier devant contenur les informations saisies
            $file = date("y-m-d-H-i-s"). ".txt";
            $contenu = "Nom : " .$_SESSION["nom"]. "
                       Prénom : ". $_SESSION["prenom"]. "
                       Email : " .$_SESSION["email"]. "
                       Téléphone : ".$_SESSION["tel"]. "
                       Adresse : " .$_SESSION["adr"];

            //on enregistre les informations dans le fichjier
                       file_put_contents($file, $contenu);
                       echo "<p>Vos informations ont été bien enregistrées</p>";
                       header ("location: commandrecu.php");
                       exit();
        }
        else
        {
            //on supprime la session
            // unset ($_SESSION["nom"]);
            // unset ($_SESSION["prenom"]);
            // unset ($_SESSION["email"]);
            // unset ($_SESSION["tel"]);
            // session_destroy();
            // header ("location: commande.php");
            // exit();

            echo "<p>Veullez remplir correctement le formulaire</p>";
        }
    }
? > -->