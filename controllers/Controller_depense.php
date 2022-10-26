<?php


class Controller_depense extends Controller
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
            $depense = Depense::getById($id);
            $bcs = Bc::listTypes();
            $ty = TypeD::listTypes();
            $data = [
                "depense" => $depense,
                "bc" => $bcs,
                "ty" => $ty];
            $this->render("updatedepense", $data);
        }
    }

    public function action_updateform()
    {
        try {
            if (isset($_POST["submit"])) {
                $datep = $_POST["datep"];
                $avance = $_POST["avance"];
                $dp = $_POST["dp"];
                $bc = $_POST["bc"];
                $idp = $_POST["idp"];
                $time = strtotime($datep);
                $newformat = date('m/d/Y', $time);
                $drap = Depense::update($idp, $avance, $newformat, $bc, $dp);
                if ($drap == 1) {
                    $v = "Location:  http://localhost/gcomptsonia/bc/infobc/" . $bc;
                    header($v);
                    exit;
                } else {
                    $v = 'Location: http://localhost/gcomptsonia/depense/update/' . $idp;
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
            $type = TypeD::listTypes();
            $data = [

                "type" => $type,
                "bc" => $bc

            ];

            $this->render("adddepense", $data);
        } else {
            $bc = Bc::listTypes();
            $type = TypeD::listTypes();
            $data = [

                "type" => $type,
                "bc" => $bc

            ];
            $this->render("adddepense", $data);

        }
    }

    public function action_ajouterform()
    {
        try {
            if (isset($_POST["submit"])) {
                $datep = $_POST["datep"];
                $avance = $_POST["avance"];
                $dp = $_POST["dp"];
                $bc = $_POST["bc"];
                $time = strtotime($datep);
                $newformat = date('m/d/Y', $time);
                $drapo = Depense::add($avance, $newformat, $bc, $dp);


                if ($drapo == 1) {
                    $v = "Location:  http://localhost/gcomptsonia/bc/infobc/" . $bc;
                    header($v);
                    exit;
                } else {
                    header('Location: http://localhost/gcomptsonia/depense/ajouter');
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
        $this->render("listdepense", $data);
    }
}