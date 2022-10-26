<?php


class TypeD
{

    public static function listTypes()
    {

        $pdo = Connection::getConnection()->getpdo();
        $arra = array();
        try {
            $query = 'select idType,nom from typere';
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

    public static function update($idc,$nom)
    {
        $pdo = Connection::getConnection()->getpdo();
        try {

            $query = "UPDATE `typere` set nom= :nomc where idType=:idc";
            $stmt = $pdo->prepare($query);
            $stmt->bindValue(':idc', $idc);
            $stmt->bindValue(':nomc',$nom);


            if ($stmt->execute()) {
                return 1;

            } else {
                return 0;

            }

        } catch (Exception $e) {
            return -1;

        }
    }

    public static function addType($nom)
    {
        $pdo = Connection::getConnection()->getpdo();
        $arra = array();
        try {

            $query = "INSERT INTO `typere` (nom)   VALUES (:nom)";
            $stmt = $pdo->prepare($query);
            $stmt->bindValue(':nom', $nom);


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
            $query = 'DELETE  from `typere` where idType= :id';
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

    public static function getTypeById($id)
    {
        $pdo = Connection::getConnection()->getpdo();
        $arra = array();
        try {
            $query = 'select idType,nom from `typere` where idType= :id';
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
}