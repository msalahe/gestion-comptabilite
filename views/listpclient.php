<?php
require "../utils/utils.php";
require "../db/Connection.php";
require "../models/Bc.php";
require "../models/Projet.php";
if (isset($_POST["val"])) {
    $c = $_POST["val"];
    $projets = Projet::listerbyclient($c);
}
?>
<?php foreach ($projets as $pr) { ?>
    <div class="col-lg-4 col-md-12">
        <div class="card property_list">
            <div class="property_image">
                <img class="img-thumbnail img-fluid"
                     src="http://localhost/gcomptsonia/assets/images/image-gallery/1.jpg" alt="img">
            </div>
            <div class="body">
                <div class="property-content">
                    <div class="detail">
                        <h5 class="text-success m-t-0 m-b-0">Date de debut
                            : <?= $pr["date_creation"] ?></h5>
                        <h4 class="m-t-0"><a href="#" class="col-blue-grey">Nom du projet
                                : <?= $pr["nomp"] ?></a>
                        </h4>
                        <p class="text-muted"><i
                                class="zmdi zmdi-account-box-mail zmd-fw"></i> <?= $pr["nomc"] ?></p>
                        <p class="text-muted m-b-0"><i
                                class="zmdi zmdi-smartphone-android zmd-fw"></i> <?= $pr["telephone"] ?>
                        </p>
                        <div class="progress">
                            <div class="progress-done" data-done="<?= $pr["pourcentage"] ?>" style="width: <?= $pr["pourcentage"]."%" ?> ; opacity: 1;">
                                <?= $pr["pourcentage"] ?>%
                            </div>
                        </div>

                    </div>
                    <div class="property-action m-t-15">
                        <a href="http://localhost/gcomptsonia/projet/infopro/<?= $pr["idp"] ?>"
                           title="Square Feet"><i
                                class="zmdi zmdi-calendar zmd-fw"></i><span><?= $pr["estimation_t"] ?> Jours</span></a>
                        <a href="#" title="Bedroom"><i class="zmdi zmdi-view-comfy"></i>
                            <span><?= $pr["count"]["count"] ?></span></a>
                        <a href="http://localhost/gcomptsonia/projet/infopro/<?= $pr["idp"] ?>"
                           title="Bedroom"><i
                                class="zmdi zmdi-info-outline zmd-fw"></i></a>

                    </div>
                </div>
            </div>
        </div>

    </div>

<?php } ?>
