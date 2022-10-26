<?php


abstract class Controller
{
    abstract public function action_default();

    protected function render($vue, $data = [])
    {
        //On extrait les données à afficher
        extract($data);
        //On teste si la vue existe
        $file_name = "views/" . $vue . '.php';
        if (file_exists($file_name)) {
            //Si oui, on l'affiche
            require($file_name);
        } else {
            //Sinon, on affiche la page d'erreur
            $this->action_error("La vue n'existe pas !");
        }
    }

    public function action_error($msg)
    {

    }

}