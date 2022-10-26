<?php


class Controller_avance extends Controller
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
            $avance = Avance::getById($id);
            $bcs = Bc::listTypes();
            $data = [
                "avance" => $avance,
                "bcs" => $bcs];
            $this->render("updateavance", $data);

        }
    }

    public function action_updateform()
    {
        try {
            if (isset($_POST["submit"])) {
                $datep = $_POST["datep"];
                $avance = $_POST["avance"];
                $bc = $_POST["bc"];
                $time = strtotime($datep);
                $idv = $_POST["idv"];
                $newformat = date('m/d/Y', $time);
                $drap = Avance::update($idv,$avance,$datep,$bc);
                if ($drap == 1) {
                    $v = "Location:  http://localhost/gcomptsonia/bc/infobc/" . $bc;
                    header($v);
                } else {
                    $v = "Location:  http://localhost/gcomptsonia/avance/update/" . $idv;
                    header($v);
                    exit;
                }
            }
        } catch (Exception $e) {

        }
    }

    public function action_ajouter()
    {
        if (isset($_GET["f"])) {
            $bc = Bc::getTypeById($_GET["f"]);
            $data = [


                "bc" => $bc

            ];

            $this->render("addavance", $data);
        } else {
            $bc = Bc::listTypes();
            $data = [


                "bc" => $bc

            ];
            $this->render("addavance", $data);
        }
    }

    public function action_ajouterform()
    {
        try {
            if (isset($_POST["submit"])) {
                $datep = $_POST["datep"];
                $avance = $_POST["avance"];
                $bc = $_POST["bc"];
                $time = strtotime($datep);
                $newformat = date('m/d/Y', $time);
                $drapo = Avance::add($avance, $newformat, $bc);


                if ($drapo == 1) {
                    $v = "Location:  http://localhost/gcomptsonia/bc/infobc/" . $bc;
                    header($v);
                    exit;
                } else {
                    header('Location: http://localhost/gcomptsonia/avance/ajouter');
                    exit;
                }
            }
        } catch (Exception $e) {

        }
    }

    public function action_default()
    {
        // TODO: Implement action_default() method.
    }

    public function action_list()
    {
        $names = Bc::listerBcP();
        $data = [
            "list" => $names];
        $this->render("listavance", $data);
    }
}