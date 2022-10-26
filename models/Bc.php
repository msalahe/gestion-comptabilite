<?php


class Bc
{
    public static function listTypes()
    {

        $pdo = Connection::getConnection()->getpdo();
        $arra = array();
        try {
            $query = 'select idbc,idp,estimation_temp,date,bugdet,nombc,drap,pourentage from bc';
            $stmt = $pdo->prepare($query);
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                array_push($arra, $row);
            }
            return $arra;
        } catch (Exception $e) {
            return null;

        }

    }

    public static function listerBcP()
    {
        $pdo = Connection::getConnection()->getpdo();
        $arra = array();
        $art = array();
        try {
            $query = 'select nombc,nomp,nomc,idbc from bc b,projet p ,client c where b.idp = p.idp and p.idc = c.idc';
            $stmt = $pdo->prepare($query);
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $str = $row["nomc"] . "/" . $row["nomp"] . "/" . $row["nombc"];
                $art["str"] = $str;
                $art["idbc"] = $row["idbc"];
                array_push($arra, $art);
            }
            return $arra;
        } catch (Exception $e) {
            return null;

        }
    }

    public static function update($idp, $nom, $date, $est, $dr, $pourc, $idbc, $budget)
    {
        $pdo = Connection::getConnection()->getpdo();
        try {

            $query = "UPDATE `bc` set idp= :idp,estimation_temp=:estimation_temp,date=:date,
                bugdet=:bugdet,nombc=:nombc,drap=:drap,pourentage=:pourentage
                     where idbc=:idbc";
            //idbc,idp,estimation_temp,date,bugdet,nombc,drap,pourentage
            $stmt = $pdo->prepare($query);
            $stmt->bindValue(':idp', $idp);
            $stmt->bindValue(':estimation_temp', $est);
            $stmt->bindValue(':date', $date);

            $stmt->bindValue(':bugdet', $budget);
            $stmt->bindValue(':nombc', $nom);
            $stmt->bindValue(':drap', $dr);
            $stmt->bindValue(':pourentage', $pourc);
            $stmt->bindValue(':idbc', $idbc);


            if ($stmt->execute()) {
                return 1;

            } else {
                return 0;

            }

        } catch (Exception $e) {
            return -1;

        }
    }

    public static function add($nom, $date, $esti, $drap, $pourcentage, $idp, $budget)
    {
        $pdo = Connection::getConnection()->getpdo();
        $arra = array();
        try {

            $query = "INSERT INTO `bc` (idp,estimation_temp,date,bugdet,nombc,drap,pourentage) 
                   VALUES (:idp,:estimation_temp,:date,:bugdet,:nombc,:drap,:pourentage)";
            $stmt = $pdo->prepare($query);
            $stmt->bindValue(':nombc', $nom);
            $stmt->bindValue(':idp', $idp);
            $stmt->bindValue(':estimation_temp', $esti);
            $stmt->bindValue(':bugdet', $budget);
            $stmt->bindValue(':date', $date);
            $stmt->bindValue(':pourentage', $pourcentage);
            $stmt->bindValue(':drap', $drap);


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

    public static function deleteType($data)
    {
        $id = $data["id"];
        $pdo = Connection::getConnection()->getpdo();
        $arra = array();
        try {
            $query = 'DELETE  from `bc` where idbc= :id';
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
            $query = 'select idbc,idp,estimation_temp,date,bugdet,nombc,drap,pourentage from `bc` where idbc= :id ';
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

    public static function getTypeById($id)
    {
        $pdo = Connection::getConnection()->getpdo();
        $arra = array();
        try {
            $query = 'select idbc,idp,estimation_temp,date,bugdet,nombc,drap,pourentage from `bc` where idbc= :id ';
            $stmt = $pdo->prepare($query);
            $stmt->bindValue(':id', $id);

            $stmt->execute();
            $arra = array();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $row["d"] = Depense::getbyBc($row["idbc"]);
            $row["a"] = Avance::getByBc($row["idbc"]);
            $row["idp"] = Projet::getById($row["idp"]);
            return $row;
        } catch (Exception $e) {
            echo $e->getMessage();
            return null;

        }
    }

    public static function getBcsByProjets($idp)
    {
        $pdo = Connection::getConnection()->getpdo();
        $arra = array();
        try {
            $query = 'select idbc,idp,estimation_temp,date,bugdet,nombc,drap,pourentage from `bc` where idp= :id';
            $stmt = $pdo->prepare($query);
            $stmt->bindValue(':id', $idp);
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $row["idp"] = Projet::getById($row["idp"]);
                array_push($arra, $row);
            }
            return $arra;
        } catch (Exception $e) {
            echo $e->getMessage();
            return null;

        }
    }

    public static function countparp($idp)
    {
        $pdo = Connection::getConnection()->getpdo();
        $arra = array();
        try {
            $query = 'select count(*) as count from `bc` where idp= :id';
            $stmt = $pdo->prepare($query);
            $stmt->bindValue(':id', $idp);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row;
        } catch (Exception $e) {
            echo $e->getMessage();
            return null;

        }
    }

    public static function format()
    {
        $tableau = self::listTypes();
        $tab = array();
        $tabfin = array();
        foreach ($tableau as $list) {
            $date = date('m-d-Y', strtotime($list["date"] . ' + ' . $list["estimation_temp"] . ' days'));
            $tab["title"] = $list["nombc"];
            $tab["start"] = $date;
            $tab["className"] = "b-primary";
            $tab["url"] = "http://localhost/gcomptsonia/bc/infobc/" . $list["idbc"];
            array_push($tabfin, $tab);
        }
        return $tabfin;
    }

    public static function count()
    {
        $pdo = Connection::getConnection()->getpdo();
        $arra = array();
        try {
            $query = 'select count(*) as count from `bc`';
            $stmt = $pdo->prepare($query);

            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row;
        } catch (Exception $e) {
            echo $e->getMessage();
            return null;

        }
    }

    public static function sumb()
    {  $pdo = Connection::getConnection()->getpdo();
        $arra = array();
        try {
            $query = 'select sum(bugdet) as sum from `bc`';
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