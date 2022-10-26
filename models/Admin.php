<?php


class Admin
{
    public static function tablebord()
    {
        $tab = array();
        $tab["countc"] = Client::count();
        $tab["countp"] = Projet::count();
        $tab["countbc"] = Bc::count();
        $tab["sum"] = Bc::sumb();
        return $tab;
    }

    public static function graph($anne, $idt)
    {

    }
}