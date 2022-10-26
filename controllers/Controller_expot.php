<?php


class Controller_expot extends Controller
{
    public function __construct()
    {
        if (isset($_GET['action']) and
            method_exists($this, "action_" . $_GET["action"])) {
            $action = "action_" . $_GET["action"];
            $this->$action(); //On appelle cette action
        } else {
            $this->action_default();
        } //On appelle sinon l'action par défaut
    }

    public function action_default()
    {

        $this->render("exporting");
    }

    public function action_exprtexcel()
    {
        if (isset($_GET["f"])) {
            $bcs = Bc::getTypeById($_GET["f"]);
            $data = [

                "bcs" => $bcs
            ];

            $this->render("infobc", $data);
        }
    }
}