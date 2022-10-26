<?php


class Controller_bc extends Controller
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
            $bc = Bc::getById($id);
            $projet = Projet::lister();
            $data = [
                "bc" => $bc,
                "projet" => $projet];
            $this->render("updatebc", $data);
           //var_dump($bc);
        }
    }

    public function action_updateform()
    {
        try {
            if (isset($_POST["submit"])) {
                $nom = $_POST["nomc"];
                $datep = $_POST["datec"];
                $estu = $_POST["estim"];
                $pour = $_POST["pourcen"];
                $projet = $_POST["projet"];
                $etat = $_POST["etat"];
                $budget = $_POST["budget"];
                $time = strtotime($datep);
                $newformat = date('m/d/Y', $time);
                $idbc = $_POST["idbc"];
                $drap = Bc::update($projet,$nom,$newformat,$estu,$etat,$pour,$idbc,$budget);

                if ($drap == 1) {
                    $x = 'Location: http://localhost/gcomptsonia/projet/infopro/' . $projet;
                    header($x);
                    exit;

                } else {
                    $x = 'Location: http://localhost/gcomptsonia/bc/update/' . $idbc;
                    header($x);
                    exit;
                }
            }
        } catch (Exception $e) {

        }
    }

    public function action_ajouter()
    {
        $projet = Projet::lister();
        $data = [

            "projet" => $projet
        ];

        $this->render("addbc", $data);
    }

    public function action_ajouterform()
    {
        try {
            if (isset($_POST["submit"])) {
                $nom = $_POST["nomc"];
                $datep = $_POST["datec"];
                $estu = $_POST["estim"];
                $pour = $_POST["pourcen"];
                $projet = $_POST["projet"];
                $etat = $_POST["etat"];
                $budget = $_POST["budget"];
                $time = strtotime($datep);
                $newformat = date('m/d/Y', $time);
                $drapo = Bc::add($nom, $newformat, $estu, $etat, $pour, $projet, $budget);


                if ($drapo == 1) {
                    $x = 'Location: http://localhost/gcomptsonia/projet/infopro/' . $projet;
                    header($x);
                    exit;

                } else {
                    header('Location: http://localhost/gcomptsonia/bc/ajouter');
                    exit;

                }
            }
        } catch (Exception $e) {

        }
    }

    public function action_listbc()
    {
        if (isset($_GET["f"])) {

        }
    }

    public function action_default()
    {
        // TODO: Implement action_default() method.
    }

    public function action_infobc()
    {
        if (isset($_GET["f"])) {
              $bcs = Bc::getTypeById($_GET["f"]);
            $data = [

                "bcs" => $bcs
            ];

            $this->render("infobc", $data);
        }
    }
    public function action_calender(){
        $bcs = Bc::format();
        $data = [

            "bcs" => $bcs
        ];

        $this->render("calendier", $data);
    }
}