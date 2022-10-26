<?php
require "../utils/utils.php";
require "../db/Connection.php";
require "../models/Depense.php";

if (isset($_POST["val"])) {
    $c = $_POST["val"];

    $values = Depense::usegraph($c);
    //echo json_encode($values);
    $char = "";
    foreach ($values as $val) {
        $char .= $val . ",";
    }
    echo $char;
}


