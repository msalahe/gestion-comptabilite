<?php
require "utils/utils.php"; //Pour avoir la fonction e()
require "models/Client.php";
require "models/Projet.php";
require "models/Bc.php";
require"models/Avance.php";
require"models/Depense.php";
require "models/TypeD.php";
require "models/Admin.php";

require ("db/Connection.php");
require("controllers/Controller.php");

$controllers = ["admin","client","admin","avance","bc","client","depense","projet","type","expot"]; //Liste des contrôleurs
$controller_default = "home"; //Nom du contrôleur par défaut

//On teste si le paramètre controller existe et correspond à un contrôleur
//de la liste $controllers
 if(isset($_GET['controller']) and in_array($_GET['controller'], $controllers))
$nom_controller = $_GET['controller'];
else
$nom_controller = $controller_default;
//On détermine le nom de la classe du contrôleur
$nom_classe = 'Controller_' . $nom_controller;

//On détermine le nom du fichier contenant la définition du contrôleur $nom_fichier = 'Controllers/' . $nom_classe . '.php';
$nom_fichier = 'controllers/' . $nom_classe . '.php';
//Si le fichier existe
if (file_exists($nom_fichier)) {
    //On l'inclut et on instancie un objet de cette classe
    require_once($nom_fichier);
    $controller = new $nom_classe();
} else
    exit("Error 404: not found!");
