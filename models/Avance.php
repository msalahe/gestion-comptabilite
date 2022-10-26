<?php


class Avance
{

    public static function lister()
    {

        $pdo = Connection::getConnection()->getpdo();
        $arra = array();
        try {
            $query = 'select idv,price,date,idbc from avance';
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

    public static function update($idv, $price, $date, $idbc)
    {
        $pdo = Connection::getConnection()->getpdo();
        try {

            $query = "UPDATE `avance` set price= :price,date=:date,idbc=:idbc 
                     where idv=:idv";
            $stmt = $pdo->prepare($query);
            $stmt->bindValue(':idv', $idv);
            $stmt->bindValue(':price', $price);
            $stmt->bindValue(':date', $date);
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

    public static function add($price, $date, $idbc)
    {
        $pdo = Connection::getConnection()->getpdo();
        $arra = array();
        try {

            $query = "INSERT INTO `avance` (price,date,idbc) 
                   VALUES (:price,:date,:idbc)";
            $stmt = $pdo->prepare($query);
            $stmt->bindValue(':price', $price);
            $stmt->bindValue(':date', $date);
            $stmt->bindValue(':idbc', $idbc);


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
            $query = 'DELETE  from `avance` where idv= :id';
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
            $query = 'select idv,price,date,idbc from `avance` where idv= :id LIMIT 0,1';
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

    public static function getByBc($idbc)
    {
        $pdo = Connection::getConnection()->getpdo();
        $arra = array();
        try {
            $query = 'select idv,price,date from avance where idbc = :idbc';
            $stmt = $pdo->prepare($query);
            $stmt->bindValue(':idbc', $idbc);

            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                array_push($arra, $row);
            }
            return $arra;
        } catch (Exception $e) {
            return null;

        }
    }

    public static function listBc($idbc)
    {
        $pdo = Connection::getConnection()->getpdo();
        $arra = array();
        try {
            $query = 'select idv,price,date from avance where idbc = :idbc';
            $stmt = $pdo->prepare($query);
            $stmt->bindValue(':idbc', $idbc);

            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                array_push($arra, $row);
            }
            return $arra;
        } catch (Exception $e) {
            return null;

        }
    }
}