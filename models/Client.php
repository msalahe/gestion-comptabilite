<?php


class Client
{

    public static function listClient()
    {

        $pdo = Connection::getConnection()->getpdo();
        $arra = array();
        try {
            $query = 'select idc,nomc,telephone from client';
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


    public static function update($idc, $nom, $tele)
    {
        $pdo = Connection::getConnection()->getpdo();
        try {

            $query = "UPDATE `client` set nomc=:nomc,telephone=:tele where idc=:idc";
            $stmt = $pdo->prepare($query);
            $stmt->bindValue(':idc', $idc);
            $stmt->bindValue(':nomc', $nom);
            $stmt->bindValue(':tele', $tele);


            if ($stmt->execute()) {
                return 1;

            } else {
                return 0;

            }

        } catch (Exception $e) {
            return -1;

        }
    }

    public static function addClient($nom,$tele)
    {
        $pdo = Connection::getConnection()->getpdo();
        $arra = array();
        try {

            $query = "INSERT INTO `client` (nomc,telephone) VALUES (:nom,:tele)";
            $stmt = $pdo->prepare($query);
            $stmt->bindValue(':nom', $nom);
            $stmt->bindValue(':tele', $tele);


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

    public static function deleteClient($data)
    {
        $id = $data["id"];
        $pdo = Connection::getConnection()->getpdo();
        $arra = array();
        try {
            $query = 'DELETE  from `client` where idc= :id';
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

    public static function getClientI($id)
    {
        $pdo = Connection::getConnection()->getpdo();
        $arra = array();
        try {
            $query = 'select idc,nomc,telephone from `client` where idc=:id';
            $stmt = $pdo->prepare($query);
            $stmt->bindValue(':id', $id);

            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row;
        } catch (Exception $e) {
            echo $e->getMessage();
            return null;

        }
    }

    public static function getClientSansInfo($id)
    {
        $pdo = Connection::getConnection()->getpdo();
        $arra = array();
        try {
            $query = 'select idclient,nomc from `client` where idc=:id';
            $stmt = $pdo->prepare($query);
            $stmt->bindValue(':id', $id);

            $stmt->execute();
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
            $query = 'select count(*) as count from `client`';
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