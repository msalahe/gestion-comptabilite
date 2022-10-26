<?php


class Controller_type extends Controller
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
            $ty = TypeD::getTypeById($id);
            $data = [
                "ty" => $ty];
            $this->render("updatetype", $data);

        }
    }

    public function action_updateform()
    {

        try {


            if (isset($_POST["submit"])) {
                $id = $_POST["idt"];
                $nomC = $_POST["nomT"];
                $drapo = TypeD::update($id, $nomC);
                if ($drapo == 1) {
                    header('Location: http://localhost/gcomptsonia/type/lister');
                    exit;
                } else {
                    header('Location: http://localhost/gcomptsonia/type');
                    exit;
                }
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function action_ajouter()
    {
        $this->render("addtypedepense");
    }

    public function action_ajouterform()
    {
        try {


            if (isset($_POST["submit"])) {
                $nomC = $_POST["nomT"];
                $drapo = TypeD::addType($nomC);
                if ($drapo == 1) {
                    header('Location: http://localhost/gcomptsonia/type/lister');
                    exit;
                } else {
                    header('Location: http://localhost/gcomptsonia/type/ajouter');
                    exit;
                }
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function action_default()
    {
        // TODO: Implement action_default() method.
    }

    public function action_lister()
    {
        $typ = TypeD::listTypes();
        $data = [
            "type" => $typ];
        $this->render("listtydepense", $data);
    }
}