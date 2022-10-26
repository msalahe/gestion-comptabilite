<?php


class Controller_admin extends Controller
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
    public function action_default()
    {
        // TODO: Implement action_default() method.
    }
}