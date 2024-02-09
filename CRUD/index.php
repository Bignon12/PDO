<?php
$title = "La liste";
require_once "header.php";

include "connect.php";

// on prépare la requête
$requete = $db->prepare('SELECT * FROM disc');
// on exécute la requête
$requete->execute();
// on récupère les données
$discs = $requete->fetchAll();
?>

<div class="text-center cg mx-auto">
    <h1 class="test-center">Affichage des données de la table disc</h1>
</div>


<div class="container mt-4">
    <div class="d-flex">
        <div class="col-md-8">
            
                <div class="row">
                    <?php foreach ($discs as $disc) { ?>
                        <div class="card mb-3" style="max-width: 400px;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="images/<?= $disc['disc_picture'] ?>" class="img-fluid rounded-start" alt="image">
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <h5 class="card-title">Titre: <?= $disc['disc_title']  ?></h5>
                                        <h6 class="card-text">Année de sortie: <?= $disc['disc_year'] ?></h6>
                                        <h6 class="card-text">Label: <?= $disc['disc_label'] ?></h6>
                                        <h6 class="card-text">Genre Musical: <?= $disc['disc_genre'] ?></h6>
                                        <h6 class="card-text">Prix: <?= $disc['disc_price'] ?></h6>
                                        <a href = "details.php?id=<?= $disc['disc_id'] ?>" class="btn btn-primary">Détails</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
          
        </div>

        <div class="col-md-4">
            <a href="add_form.php" class="btn btn-primary">Ajouter</a>
        </div>
    </div>
</div>



