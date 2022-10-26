<?php


class Controller_home extends Controller
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
            $id = isset($_GET["f"]);
            $client = Client::getClientI($id);
            $data = [
                "client" => $client];
            $this->render("updateclient", $data);

        }
    }

    public function action_updateform()
    {
        try {
            if (isset($_POST["submit"])) {

                $drap = 1;
                if ($drap == 1) {

                } else {

                }
            }
        } catch (Exception $e) {

        }
    }

    public function action_ajouter()
    {
        $this->render("addclient");
    }

    public function action_ajouterform()
    {
        try {
            if (isset($_POST["submit"])) {

                $drapo = 1;
                if ($drapo == 1) {

                } else {

                }
            }
        } catch (Exception $e) {

        }
    }

    public function action_default()
    {
        $info = Admin::tablebord();
        $ty = TypeD::listTypes();
        Depense::usegraph(1);

        $data = [
            "info" => $info,
            "type" => $ty];
        $this->render("home", $data);
    }
}