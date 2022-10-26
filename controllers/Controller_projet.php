<?php


class Controller_projet extends Controller
{
    public function __construct()
    {
        if (isset($_GET['action']) and
            method_exists($this, "action_" . $_GET["action"])) {
            $action = "action_" . $_GET["action"];
            $this->$action(); //On appelle cette action
        } else
            $this->action_default(); //On appelle sinon l'action par défaut
    }

    public function action_update()
    {
        if (isset($_GET["f"])) {
            $id = $_GET["f"];
            $projets = Projet::getById($id);
            $client = Client::listClient();
            $data = [
                "client" => $client,
                "projet" => $projets];
            $this->render("updateprojet", $data);

        }
    }

    public function action_updateform()
    {
        try {
            if (isset($_POST["submit"])) {
                $idp = $_POST["idp"];
                $nom = $_POST["nomp"];
                $datep = $_POST["datec"];
                $estu = $_POST["estim"];
                $pour = $_POST["pourcen"];
                $client = $_POST["client"];
                $etat = $_POST["etat"];
                $time = strtotime($datep);
                $newformat = date('m/d/Y', $time);
                $drapo = Projet::update($idp,$nom,$newformat,$estu,$etat,$pour,$client);


                if ($drapo == 1) {
                    header('Location: http://localhost/gcomptsonia/projet/listprojet');
                    exit;
                } else {
                    header('Location: http://localhost/gcomptsonia/projet/ajouter');
                    exit;
                }
            }
        } catch (Exception $e) {

        }
    }

    public function action_ajouter()
    {
        $clients = Client::listClient();
        $data = [

            "client" => $clients
        ];

        $this->render("addproject", $data);
    }

    public function action_ajouterform()
    {
        try {
            if (isset($_POST["submit"])) {
                $nom = $_POST["nomp"];
                $datep = $_POST["datec"];
                $estu = $_POST["estim"];
                $pour = $_POST["pourcen"];
                $client = $_POST["client"];
                $etat = $_POST["etat"];
                $time = strtotime($datep);
                $newformat = date('m/d/Y', $time);
                $drapo = Projet::add($nom, $newformat, $estu, $etat, $pour, $client);


                if ($drapo == 1) {
                    header('Location: http://localhost/gcomptsonia/projet/listprojet');
                    exit;
                } else {
                    header('Location: http://localhost/gcomptsonia/projet/ajouter');
                    exit;
                }
            }
        } catch (Exception $e) {

        }
    }

    public function action_listprojet()
    {
        $clients = Client::listClient();
        $projets = Projet::lister();
        $data = [
            "clients" => $clients,
            "projets" => $projets
        ];
        $this->render("listprojet", $data);
    }

    public function action_default()
    {
        // TODO: Implement action_default() method.
    }

    public function action_infopro()
    {
        if (isset($_GET["f"])) {
            $bcs = Bc::getBcsByProjets($_GET["f"]);
            $data = [
                "bcs" => $bcs
            ];
            $this->render("listbc", $data);

        }
    }
}