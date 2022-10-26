<?php
require "../utils/utils.php";
require "../db/Connection.php";
require "../models/TypeD.php";
require "../models/Depense.php";

if (isset($_POST["val"])) {
    $c = $_POST["val"];
    $bcs = Depense::getbyBc($c);
}

?>

    <?php $i = 0;
    foreach ($bcs as $dt) { ?>
        <tr>
            <td><?= ++$i; ?></td>
            <td><?= $dt["date"] ?></td>
            <td><?= $dt["price"] ?></td>
            <td><?= $dt["nom"] ?></td>
            <td>
                <a href="">
                    <button class="btn btn-default btn-icon btn-simple btn-icon-mini btn-round">
                        <i
                            class="zmdi zmdi-edit">
                        </i>
                    </button>
                </a>

            </td>
        </tr>
    <?php } ?>

