<?php 
$title = "Page commande";
require_once "header.php";

if(isset($_GET['id'])) {
    
    require_once "DAO.php";
    $id = $_GET['id'];
}
?>
<section>
    <div class="video-container">
        <video autoplay loop muted playsinline poster="images_the_district/burgervideo.mp4" class="video rounded-3">
            <source src="images_the_district/burgervideo.mp4" type="video/mp4">
        </video>
    </div>
</section>

<section>
    <div>
        <h1 class="text-center" ;>Veuillez faire votre commande</h1>
    </div>

    <?php $plat = getPlatbyId($id, $db);?>

    <form class="myform2" action="scriptcommande1.php" method="POST">
        <div id="aff" class="row justify-content-center mx-auto mt-3">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="images_the_district/food/<?=$plat->image?>" class="img-fluid cover rounded-start" alt="<?=$plat->libelle?>">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h3 class="card-title text-center"><?=$plat->libelle?></h3>
                            <p><?=$plat->description?></p>
                            <p><?=$plat->prix?>€</p>
                            <div class="d-flex">
                                <label for="quantity">Quantité</label>
                                <input type="number" min="0" max="9" name="quantity" id="quantity">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="mb-3 form-group col-12">
                <input type="hidden" class="form-control" name="text" value="<?=$plat->id?>">
                <label for="nom" class="form-label">Nom et Prénoms</label>
                <input type="text" class="form-control m" id="nom" name="nom">
                <div class="alert alert-danger alert-dismissible fade show" id="mes1" role="alert">
                    <strong>Ce champ est obligatoire</strong>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="mb-3 form-group col-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email">
                <div class="alert alert-danger alert-dismissible fade show" id="mes3" role="alert">
                    <strong>Ce champ est obligatoire</strong>
                </div>
            </div>

            <div class="mb-3 form-group col-6">
                <label for="tel" class="form-label">Téléphone</label>
                <input type="text" class="form-control m" id="tel" name="tel">
                <div class="alert alert-danger alert-dismissible fade show" id="mes4" role="alert">
                    <strong>Ce champ est obligatoire</strong>
                </div>
            </div>
        </div>

        <div class="mb-3 form-group">
            <label for="adr" class="form-label">Adresse</label>
            <textarea type="text" class="form-control" id="adr" name="adr"></textarea>
            <div class="alert alert-danger alert-dismissible fade show" id="mes5" role="alert">
                <strong>Ce champ est obligatoire</strong>
            </div>
        </div>

        <div class="d-grid justify-content-md-center">
            <button type="submit" id="btn_envoyer" class="btn btn-primary btn-lg" name="btn">Passer votre commande</button>
        </div>
    </form>
</section>

<script src="commande.js"></script>
<?php require_once "footer.php";?>


