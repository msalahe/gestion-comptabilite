<?php


class Controller_client extends Controller
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

                $nomC = $_POST["nomC"];
                $tel = $_POST["tele"];
                $idc = $_POST["idc"];
                $drapo = Client::update($idc,$nomC,$tel);
                if ($drapo == 1) {
                    header('Location: http://localhost/gcomptsonia/client/listclient');
                    exit;
                } else {
                    $v = 'Location: http://localhost/gcomptsonia/client/update'.$idc;
                    header($v);
                    exit;
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
                $nomC = $_POST["nomC"];
                $tel = $_POST["tele"];
                $drapo = Client::addClient($nomC, $tel);
                if ($drapo == 1) {
                    header('Location: http://localhost/gcomptsonia/client/listclient');
                    exit;
                } else {
                    header('Location: http://localhost/gcomptsonia/client/ajouter');
                    exit;
                }
            }
        } catch (Exception $e) {

        }

    }

    public function action_listclient()
    {
        $clients = Client::listClient();
        $data = [
            "clients" => $clients];
        $this->render("listclient", $data);
    }

    public function action_default()
    {
        // TODO: Implement action_default() method.
    }

    public function action_infoclient()
    {
        if (isset($_GET["f"])) {
            $id = $_GET["f"];

        }
    }
}