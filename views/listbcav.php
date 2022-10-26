<?php
require "../utils/utils.php";
require "../db/Connection.php";
require "../models/Avance.php";
if (isset($_POST["val"])) {
    $c = $_POST["val"];
   $bcs = Avance::getByBc($c);
}

?>

<table id="example" class="ui celled table" style="width:100%">
    <thead>
    <tr>
        <th>IDENTIFIANT</th>
        <th>Date</th>
        <th>Avance</th>
        <th>Action</th>

    </tr>
    </thead>
    <tbody>
    <?php $i = 0;
    foreach ($bcs as $dt) { ?>
        <tr>
            <td><?= ++$i; ?></td>
            <td><?= $dt["date"] ?></td>
            <td><?= $dt["price"] ?></td>
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

    </tbody>

</table>