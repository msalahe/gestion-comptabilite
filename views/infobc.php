<?php
$avance = 0;
$dep = 0;
foreach ($bcs["a"] as $dt) {
    $avance += $dt["price"];

}
foreach ($bcs["d"] as $dt) {
    $dep += $dt["price"];

}
$res = $avance - $dep;
$res1 = $bcs["bugdet"] - $avance;

?>


<!doctype html>
<html class="no-js " lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">
    <title>GESTION DU CoM</title>
    <link rel="icon" href="http://localhost/gcomptsonia/assets/images/profile_av.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css"
          href="http://localhost/gcomptsonia/assets/table/SemanticUI-2.2.13/semantic.min.css">
    <link rel="stylesheet" type="text/css"
          href="http://localhost/gcomptsonia/assets/table/DataTables-1.11.0/css/dataTables.semanticui.min.css">
    <!-- Favicon-->
    <link rel="stylesheet" href="http://localhost/gcomptsonia/assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/gcomptsonia/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css"/>
    <link rel="stylesheet" href="http://localhost/gcomptsonia/assets/plugins/morrisjs/morris.min.css"/>
    <link rel="stylesheet" href="http://localhost/gcomptsonia/assets/css/@fortawesome/fontawesome-free/css/all.min.css"
          type="text/css">
    <!-- Custom Css -->
    <link rel="stylesheet" href="http://localhost/gcomptsonia/assets/css/main.css">
    <link rel="stylesheet" href="http://localhost/gcomptsonia/assets/css/color_skins.css">
    <style>

        @import url('https://fonts.googleapis.com/css?family=Montserrat&display=swap');


        .progress {
            background-color: #d8d8d8;
            border-radius: 20px;
            position: relative;
            margin: 15px 0;
            height: 30px;
            width: 250px;
        }

        .progress-done {
            background: linear-gradient(to left, #F2709C, #FF9472);
            box-shadow: 0 3px 3px -5px #F2709C, 0 2px 5px #F2709C;
            border-radius: 20px;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
            width: 0;
            opacity: 0;
            transition: 1s ease 0.3s;
        }
    </style>
</head>
<body class="theme-blue">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img class="zmdi-hc-spin" src="http://localhost/gcomptsonia/assets/images/profile_av.png"
                                 width="48" height="48" alt="Compass"></div>
        <p>1..2..3</p>
    </div>
</div>
<!-- Overlay For Sidebars -->
<div class="overlay"></div>

<!-- Top Bar -->
<nav class="navbar">
    <div class="col-12">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href="index.html"><img
                        src="http://localhost/gcomptsonia/assets/images/profile_av.png" width="30" alt="Compass"><span
                        class="m-l-10">Sonia'z</span></a>
        </div>
        <ul class="nav navbar-nav navbar-left">
            <li><a href="javascript:void(0);" class="ls-toggle-btn" data-close="true"><i class="zmdi zmdi-swap"></i></a>
            </li>

        </ul>
        <ul class="nav navbar-nav navbar-right">


            <li>
                <a href="javascript:void(0);" class="fullscreen hidden-sm-down" data-provide="fullscreen"
                   data-close="true"><i class="zmdi zmdi-fullscreen"></i></a>
            </li>

        </ul>
    </div>
</nav>

<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <div class="menu">
        <ul class="list">
            <li>
                <div class="user-info">
                    <div class="image"><a href=""><img
                                    src="http://localhost/gcomptsonia/assets/images/profile_av.png" alt="User"></a>
                    </div>


                </div>
            </li>
            </li>
            <li><a href="http://localhost/gcomptsonia/" class=""><i
                            class="zmdi zmdi-view-dashboard"></i><span>Table de bord</span>
                </a>

            </li>

            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-accounts-outline"></i><span>Clients</span>
                </a>
                <ul class="ml-menu">
                    <li><a href="http://localhost/gcomptsonia/client/ajouter">Ajouter Un client</a></li>
                    <li><a href="http://localhost/gcomptsonia/client/listclient">Lister Les clients</a></li>
                </ul>
            </li>
            <li><a href="javascript:void(0);" class="menu-toggle"><i
                            class="zmdi zmdi-menu"></i><span>Type depénse</span>
                </a>
                <ul class="ml-menu">
                    <li><a href="http://localhost/gcomptsonia/type/ajouter">Ajouter un type depénse</a></li>
                    <li><a href="http://localhost/gcomptsonia/type/lister">Lister Les types</a></li>
                </ul>
            </li>
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-menu"></i><span>Projets</span>
                </a>
                <ul class="ml-menu">
                    <li><a href="http://localhost/gcomptsonia/projet/ajouter">Ajouter les projets</a></li>
                    <li><a href="http://localhost/gcomptsonia/projet/listprojet">lister les projet</a></li>
                </ul>
            </li>
            <li><a href="javascript:void(0);" class="menu-toggle"><i
                            class="zmdi zmdi-menu"></i><span>Bon Commande</span>
                </a>
                <ul class="ml-menu">
                    <li><a href="http://localhost/gcomptsonia/bc/ajouter">Ajouter Bon Commande</a></li>
                </ul>
            </li>
            <li class=""><a href="javascript:void(0);" class="menu-toggle"><i
                            class="zmdi zmdi-menu"></i><span>Avance</span>
                </a>
                <ul class="ml-menu">
                    <li><a href="http://localhost/gcomptsonia/avance/ajouter">Ajouter Avance</a></li>
                    <li><a href="http://localhost/gcomptsonia/avance/list">lister Avance</a></li>

                </ul>
            </li>
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-menu"></i><span>Dépense</span>
                </a>
                <ul class="ml-menu">
                    <li><a href="http://localhost/gcomptsonia/depense/ajouter">Ajouter Dépense</a></li>
                    <li><a href="http://localhost/gcomptsonia/depense/list">Lister Les Dépense</a></li>
                </ul>
            </li>
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-menu"></i><span>Calendar</span>
                </a>
                <ul class="ml-menu">
                    <li><a href="http://localhost/gcomptsonia/bc/calender">Date limite</a></li>
                </ul>
            </li>

            
            <li><a href="http://localhost/gcomptsonia/expot"><i
                            class="zmdi zmdi-file-text"></i><span>Export Base donnés</span></a></li>


        </ul>
    </div>
</aside>


<!-- Right Sidebar -->


<!-- Chat-launcher -->
<section class="content profile-page">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>INFO Bon Commande
                </h2>
            </div>

            <div class="col-lg-5 col-md-6 col-sm-12">
                <button class="btn btn-primary btn-icon btn-round hidden-sm-down float-right m-l-10" type="button">
                    <i class="zmdi zmdi-plus"></i>
                </button>
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="http://localhost/gcomptsonia"><i
                                    class="zmdi zmdi-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="http://localhost/gcomptsonia/projet/listprojet">Projets</a>
                    </li>
                    <li class="breadcrumb-item"><a
                                href="http://localhost/gcomptsonia/projet/infopro/<?= $bcs["idp"]["idp"] ?>">BC</a></li>
                    <li class="breadcrumb-item active">INFO</li>
                </ul>
            </div>
        </div>

    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-4 col-md-12">

                <div class="card">
                    <ul class="nav nav-tabs">
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#about">INFO</a>
                        </li>

                        <li class="nav-item"><a class="nav-link"
                                                href="http://localhost/gcomptsonia/avance/ajouter/<?= $bcs["idbc"] ?>"> Avance</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="http://localhost/gcomptsonia/depense/ajouter/<?= $bcs["idbc"] ?>"> Dépense</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane body active" id="about">
                            <small class="text-muted">NOM CLIENT: </small>
                            <p><?= $bcs["idp"]["nomc"] ?></p>
                            <hr>


                            <small class="text-muted">TELEPHONE: </small>
                            <p><?= $bcs["idp"]["telephone"] ?></p>
                            <hr>


                            <small class="text-muted">Date de debut du bon commande</small>
                            <p><?= $bcs["date"] ?></p>
                            <hr>
                            <small class="text-muted">Estimation du fin du bon commande</small>
                            <p>
                                <?php
                                echo date('m-d-Y', strtotime($bcs["date"] . ' + ' . $bcs["estimation_temp"] . ' days'));
                                echo "   (" . $bcs["estimation_temp"] . ") jrs";
                                ?></p>
                            <hr>

                            <small class="text-muted">Budget</small>
                            <p><?= $bcs["bugdet"] ?> Dhs</p>
                            <hr>
                            <small class="text-muted">Pourcentage du bon commande</small>
                            <p>
                            <div class="progress">
                                <div class="progress-done" data-done="<?= $bcs["pourentage"] ?>">
                                    <?= $bcs["pourentage"] ?>%
                                </div>
                            </div>
                            </p>
                            <hr>

                            <small class="text-muted">Total Avance</small>
                            <p><?= $avance ?> Dhs</p>
                            <hr>
                            <small class="text-muted">Total Dépense</small>
                            <p><?= $dep ?> Dhs</p>
                            <hr>
                            <small class="text-muted">Reste </small>
                            <?php if ($res > 0) { ?>
                                <p><?= $res ?> Dhs  <p class="mt-3 mb-0 text-sm">
                                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i></span>
                                </p></p>
                            <?php }
                            if ($res < 0) { ?>
                                <p><?= $res ?> Dhs   <p class="mt-3 mb-0 text-sm">
                                        <span class="text-success mr-2"> <i
                                                    class="fas fa-arrow-down text-warning mr-3"></i></span>
                                </p></p>
                            <?php } ?>
                            <hr>
                            <small class="text-muted">Reste sur les avances </small>
                            <?php if ($res1 > 0) { ?>
                                <p><?= $res1 ?> Dhs  <p class="mt-3 mb-0 text-sm">
                                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i></span>
                                </p></p>
                            <?php }
                            if ($res1 < 0) { ?>
                                <p><?= $res1 ?> Dhs   <p class="mt-3 mb-0 text-sm">
                                        <span class="text-success mr-2"> <i
                                                    class="fas fa-arrow-down text-warning mr-3"></i></span>
                                </p></p>
                            <?php } ?>
                            <hr>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="card">
                    <ul class="nav nav-tabs">
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#mypost">Avance
                            </a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#timeline">Dépense</a></li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane blog-page active" id="mypost">
                        <div class="card single_post">
                            <div class="body">
                                <div id="table"></div>
                                <table id="example1" class="ui celled table" style="width:100%">
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
                                    foreach ($bcs["a"] as $dt) { ?>
                                        <tr>
                                            <td><?= ++$i; ?></td>
                                            <td><?= $dt["date"] ?></td>
                                            <td><?= $dt["price"] ?></td>
                                            <td>
                                                <a href="http://localhost/gcomptsonia/avance/update/<?= $dt["idv"] ?>">
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
                            </div>
                            <div class="body">


                            </div>
                        </div>


                    </div>
                    <div role="tabpanel" class="tab-pane" id="timeline">
                        <div class="card single_post">
                            <div class="body">
                                <div id="table1"></div>
                                <table id="example2" class="ui celled table" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>IDENTIFIANT</th>
                                        <th>Date</th>
                                        <th>Budget</th>
                                        <th>nom</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i = 0;
                                    foreach ($bcs["d"] as $dt) { ?>
                                        <tr>
                                            <td><?= ++$i; ?></td>
                                            <td><?= $dt["date"] ?></td>
                                            <td><?= $dt["price"] ?></td>
                                            <td><?= $dt["nom"] ?></td>
                                            <td>
                                                <a href="http://localhost/gcomptsonia/depense/update/<?= $dt["idde"]?>">
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

                            </div>
                            <div class="body">


                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>


</section>

<!-- Main Content -->

<!-- Jquery Core Js -->
<script src="http://localhost/gcomptsonia/assets/bundles/libscripts.bundle.js"></script>
<!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) -->
<script src="http://localhost/gcomptsonia/assets/bundles/vendorscripts.bundle.js"></script>
<!-- slimscroll, waves Scripts Plugin Js -->

<script src="http://localhost/gcomptsonia/assets/bundles/morrisscripts.bundle.js"></script><!-- Morris Plugin Js -->
<script src="http://localhost/gcomptsonia/assets/bundles/jvectormap.bundle.js"></script> <!-- JVectorMap Plugin Js -->
<script src="http://localhost/gcomptsonia/assets/bundles/knob.bundle.js"></script> <!-- Jquery Knob Plugin Js -->
<script src="http://localhost/gcomptsonia/assets/bundles/countTo.bundle.js"></script> <!-- Jquery CountTo Plugin Js -->
<script src="http://localhost/gcomptsonia/assets/bundles/sparkline.bundle.js"></script> <!-- Sparkline Plugin Js -->

<script src="http://localhost/gcomptsonia/assets/bundles/mainscripts.bundle.js"></script>
<script src="http://localhost/gcomptsonia/assets/js/pages/index.js"></script>
<script type="text/javascript" language="javascript"
        src="http://localhost/gcomptsonia/assets/table/DataTables-1.11.0/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript"
        src="http://localhost/gcomptsonia/assets/table/DataTables-1.11.0/js/dataTables.foundation.min.js"></script>

<script type="text/javascript" language="javascript"
        src="http://localhost/gcomptsonia/assets/table/Responsive-2.2.9/js/responsive.foundation.min.js"></script>
<script type="text/javascript"
        src="http://localhost/gcomptsonia/assets/table/DataTables-1.11.0/js/jquery.dataTables.min.js"></script>

<script type="text/javascript"
        src="http://localhost/gcomptsonia/assets/table/DataTables-1.11.0/js/dataTables.semanticui.min.js"></script>
<script type="text/javascript" src="http://localhost/gcomptsonia/assets/table/SemanticUI-2.2.13/semantic.min.js"></script>

<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
    $(document).ready(function () {
        $('#example1').DataTable();
    });
    $(document).ready(function () {
        $('#example2').DataTable();
    });
</script>
<script>
    function etat(i, idv) {
        var c = i + 1;
        var xmlhttp = new XMLHttpRequest();
        console.log(i);
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("table1").innerHTML = this.responseText;
                document.getElementById("etat" + c).innerText = "Présente";
                document.getElementsByClassName("test")[i].innerHTML = "";
                console.log(this.responseText);


            }
        };
        xmlhttp.open("POST", "http://localhost/gcomptsonia/views/modetev.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("idv=" + idv);


    }

    function etat1(i, idr) {
        var c = i + 1;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("table").innerHTML = this.responseText;
                document.getElementById("tabe" + c).innerText = "présent";
                document.getElementsByClassName("test1")[i].innerHTML = "";
                console.log(this.responseText);


            }
        };
        xmlhttp.open("POST", "http://localhost/gcomptsonia/views/changerren.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("idr=" + idr);


    }
</script>
<script>
    const progress = document.querySelector('.progress-done');

    progress.style.width = progress.getAttribute('data-done') + '%';
    progress.style.opacity = 1;

</script>
</body>
</html>
