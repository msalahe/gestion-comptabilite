<!doctype html>
<html class="no-js " lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">
    <title>GESTION DU CoM</title>
    <link rel="icon" href="http://localhost/gcomptsonia/assets/images/profile_av.png" type="image/x-icon">
    <!-- Favicon-->
    <link rel="stylesheet" href="http://localhost/gcomptsonia/assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/gcomptsonia/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css"/>
    <link rel="stylesheet" href="http://localhost/gcomptsonia/assets/plugins/morrisjs/morris.min.css"/>
    <!-- Custom Css -->
    <link rel="stylesheet" href="http://localhost/gcomptsonia/assets/css/main.css">
    <link rel="stylesheet" href="http://localhost/gcomptsonia/assets/css/color_skins.css">
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
                            class="zmdi zmdi-menu"></i><span>Type dep??nse</span>
                </a>
                <ul class="ml-menu">
                    <li><a href="http://localhost/gcomptsonia/type/ajouter">Ajouter un type dep??nse</a></li>
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

                </ul>
            </li>
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-menu"></i><span>D??pense</span>
                </a>
                <ul class="ml-menu">
                    <li><a href="http://localhost/gcomptsonia/depense/ajouter">Ajouter D??pense</a></li>
                </ul>
            </li>
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-menu"></i><span>Calendar</span>
                </a>
                <ul class="ml-menu">
                    <li><a href="http://localhost/gcomptsonia/bc/calender">Date limite</a></li>
                </ul>
            </li>

            <li><a href="http://localhost/gcomptsonia/expot"><i
                            class="zmdi zmdi-file-text"></i><span>Export Base donn??s</span></a></li>


        </ul>
    </div>
</aside>

<!-- Right Sidebar -->


<!-- Chat-launcher -->


<!-- Main Content -->
<section class="content home">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Modifier Projet
                    <small class="text-muted"></small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">

                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i></a></li>
                    <li class="breadcrumb-item active">Modifier Projet</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid mt--0">
        <form method="post" action="http://localhost/gcomptsonia/projet/updateform">

            <div class="form-group">
                <input class="form-control" type="hidden" name="idp" value="<?= $projet["idp"] ?>" required>
            </div>

            <div class="form-group">
                <label for="example-date-input" class="form-control-label">Nom Projet</label>
                <input class="form-control" type="text" placeholder="Nom Projet" value="<?= $projet["nomp"] ?>"
                       name="nomp" required>
            </div>
            <div class="form-group">
                <label for="example-date-input" class="form-control-label">Date de creation</label>
                <input class="form-control" type="date" placeholder="Nom Produit" name="datec"
                       value="<?php echo date("Y-m-d", strtotime($projet["date_creation"])); ?>" required>
            </div>
            <div class="form-group">
                <label for="example-date-input" class="form-control-label">Estimation des jours </label>
                <input class="form-control" type="number" placeholder="Estimation des jours "
                       value="<?= $projet["estimation_t"] ?>" min="0" name="estim" required>
            </div>
            <div class="form-group">
                <label for="example-date-input" class="form-control-label">Pourencatge en %</label>
                <input class="form-control" type="number" placeholder="Pourencatge" min="0"
                       value="<?= $projet["pourcentage"] ?>" name="pourcen" required>
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect1">Client</label>
                <select class="form-control" id="" name="client"
                        required>
                    <option></option>
                    <?php foreach ($client as $dt) {
                        if ($dt["idc"] == $projet["idc"]) { ?>
                            <option value="<?= $dt['idc'] ?>" selected><?= $dt["nomc"]; ?></option>
                        <?php } else { ?>
                            <option value="<?= $dt['idc'] ?>"><?= $dt["nomc"]; ?></option>
                        <?php }
                    } ?>

                </select>
            </div>


            <div class="form-group">
                <label for="exampleFormControlSelect1">Etat</label>
                <select class="form-control" id="" name="etat"
                        required>
                    <option></option>
                    <?php if ($projet["drap"] == 2) { ?>
                        <option value="2" selected>T??rminer</option>
                        <option value="1">Pas Encore</option>
                    <?php } else { ?>
                        <option value="2">T??rminer</option>
                        <option value="1" selected>Pas Encore</option>
                    <?php } ?>
                </select>
            </div>


            <br>

            <div class="form-group">
                <div class="col-sm-3 col-sm-offset-1" style="float:;">
                    <button name="submit" type="submit" class="btn btn-primary btn-block stypo"
                            style=" background-color: #007bff; border-color:#007bff;border-radius: 20px;"> Modifier
                    </button>
                </div>
            </div>
        </form>
    </div>

</section>
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
</body>
</html>


