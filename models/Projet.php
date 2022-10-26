<?php


class Projet
{
    public static function lister()
    {

        $pdo = Connection::getConnection()->getpdo();
        $arra = array();
        try {
            $query = 'select idp,nomp,date_creation,estimation_t,drapo,pourcentage,nomc,telephone from projet p , client c 
                      where p.idc = c.idc';
            $stmt = $pdo->prepare($query);
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $row["count"] = Bc::countparp($row["idp"]);
                array_push($arra, $row);

            }
            return $arra;
        } catch (Exception $e) {
            return null;

        }

    }
    public static function listerbyclient($idc)
    {

        $pdo = Connection::getConnection()->getpdo();
        $arra = array();
        try {
            $query = 'select idp,nomp,date_creation,estimation_t,drapo,pourcentage,nomc,telephone from projet p , client c 
                      where p.idc = c.idc and p.idc =:idc';

            $stmt = $pdo->prepare($query);
            $stmt->bindValue(':idc', $idc);

            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $row["count"] = Bc::countparp($row["idp"]);
                array_push($arra, $row);

            }
            return $arra;
        } catch (Exception $e) {
            return null;

        }

    }
    public static function update($idp, $nom, $date, $est, $dr, $pourc,$idc)
    {
        $pdo = Connection::getConnection()->getpdo();
        try {

            $query = "UPDATE `projet` set nomp= :nomc,date_creation=:date,estimation_t=:est,drapo=:dr,pourcentage=:pourc,idc=:idc
                     where idp=:idp";
            $stmt = $pdo->prepare($query);
            $stmt->bindValue(':idp', $idp);
            $stmt->bindValue(':nomc', $nom);
            $stmt->bindValue(':date', $date);
            $stmt->bindValue(':est', $est);
            $stmt->bindValue(':dr', $dr);
            $stmt->bindValue(':idc', $idc);
            $stmt->bindValue(':pourc', $pourc);


            if ($stmt->execute()) {
                return 1;

            } else {
                return 0;

            }

        } catch (Exception $e) {
            return -1;

        }
    }

    public static function add($nom, $date, $esti, $drap, $pourcentage, $idc)
    {
        $pdo = Connection::getConnection()->getpdo();
        $arra = array();
        try {

            $query = "INSERT INTO `projet` (nomp,date_creation,estimation_t,drapo,pourcentage,idc) 
                   VALUES (:nom,:date,:esti,:drap,:pourcentage,:idc)";
            $stmt = $pdo->prepare($query);
            $stmt->bindValue(':nom', $nom);
            $stmt->bindValue(':date', $date);
            $stmt->bindValue(':esti', $esti);
            $stmt->bindValue(':drap', $drap);
            $stmt->bindValue(':pourcentage', $pourcentage);
            $stmt->bindValue(':idc', $idc);


            if ($stmt->execute()) {
                return 1;

            } else {
                return 0;

            }

        } catch (Exception $e) {
            echo $e->getMessage();
            return -1;

        }
    }

    public static function delete($data)
    {
        $id = $data["id"];
        $pdo = Connection::getConnection()->getpdo();
        $arra = array();
        try {
            $query = 'DELETE  from `projet` where idp= :id';
            $stmt = $pdo->prepare($query);
            $stmt->bindValue(':id', $id);

            if ($stmt->execute()) {
                return 1;

            } else {
                return 0;

            }

        } catch (Exception $e) {
            return -1;

        }
    }

    public static function getById($id)
    {
        $pdo = Connection::getConnection()->getpdo();
        $arra = array();
        try {
            $query = 'select idp,nomp,date_creation,estimation_t,drapo,pourcentage,nomc,telephone,p.idc as idc from projet p , client c 
                      where p.idc = c.idc and idp= :id LIMIT 0,1';
            $stmt = $pdo->prepare($query);
            $stmt->bindValue(':id', $id);

            $stmt->execute();
            $arra = array();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row;
        } catch (Exception $e) {
            echo $e->getMessage();
            return null;

        }
    }
    public static function count()
    {
        $pdo = Connection::getConnection()->getpdo();
        $arra = array();
        try {
            $query = 'select count(*) as count from `projet`';
            $stmt = $pdo->prepare($query);

            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row;
        } catch (Exception $e) {
            echo $e->getMessage();
            return null;

        }
    }

}