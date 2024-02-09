<?php
session_start();
$title = "Contact";
require "header.php"
?>

<section>
    <div class="re"></div>  
    <div>
        <h1 class="text-center">Veuillez indiquer votre préoccupation</h1>
    </div>
</section>

<section>
    <form class = "myform2" action = "scriptcontact.php" method = "POST">
        <div class= "row">
            <div class="mb-3 form-group col-6">
                <label for="nom" class="form-label" style ="font-family: 'Trebuchet, sans-serif; font-size: 25px;">Nom</label>
                <input type="text" class="form-control m" id="nom" name = "nom">
                <div class="alert alert-danger alert-dismissible fade show" id="mes1"  role="alert">
                <strong>Ce champ est obligatoire</strong> 
              </div>
            </div>
            <div class="mb-3 form-group col-6">
                <label for="prenom" class="form-label" style ="font-family: 'Trebuchet, sans-serif; font-size: 25px;">Prénoms</label>
                <input type="text" class="form-control m" id="prenom" name = "prenom">
                <div class="alert alert-danger alert-dismissible fade show" id="mes2"  role="alert">
                    <strong>Ce champ est obligatoire</strong> 
                </div>
            </div>
        </div>

        <div class = "row">
            <div class="mb-3 form-group col-6">
                <label for="email" class="form-label" style ="font-family: 'Trebuchet, sans-serif; font-size: 25px;">Email</label>
                <input type="email" class="form-control" id="email" name = "email">
                <div class="alert alert-danger alert-dismissible fade show" id="mes3"  role="alert">
                    <strong>Ce champ est obligatoire</strong> 
                </div>
            </div>

            <div class="mb-3 form-group col-6">
                <label for="tel" class="form-label" style ="font-family: 'Trebuchet, sans-serif; font-size: 25px;">Téléphone</label>
                <input type="text" class="form-control m" id="tel" name = "tel">
                <div class="alert alert-danger alert-dismissible fade show" id="mes4"  role="alert">
                    <strong>Ce champ est obligatoire</strong> 
                </div>
            </div>
        </div>

        <div class="mb-3 form-group">
            <label for="text" style="font-family: 'Trebuchet MS', sans-serif; font-size: 25px;">Votre demande</label>
            <textarea type="text" class="form-control" id="text" name = "text"></textarea>
            <div class="alert alert-danger alert-dismissible fade show" id="mes5"  role="alert">
                <strong>Ce champ est obligatoire</strong> 
            </div>
        </div>

        <div class="d-grid justify-content-md-center">
            <button type="submit" id="btn_envoyer" class="btn btn-primary btn-lg" name="btn">Envoyer</button>
        </div>
    </form>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="contact.js"></script>

<?php require "footer.php"?>



