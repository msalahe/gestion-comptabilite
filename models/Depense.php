<?php


class Depense
{
    public static function lister()
    {

        $pdo = Connection::getConnection()->getpdo();
        $arra = array();
        try {
            $query = 'select idde,date,price,idbc,idType from depense';
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

    public static function graph($id)
    {

        $pdo = Connection::getConnection()->getpdo();
        $arra = array();
        try {
            $query = 'select idde,date,price,idbc,idType from depense where idType=:idt';
            $stmt = $pdo->prepare($query);
            $stmt->bindValue(':idt', $id);
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                array_push($arra, $row);
            }
            return $arra;
        } catch (Exception $e) {
            return null;

        }

    }

    public static function usegraph($id)
    {
        $dept = self::graph($id);
        $years = date("Y");
        $tot = 0;
        $tabf = array();
        $tabv = array();
        for ($i = 0; $i < 12; $i++) {
            $j = $i + 1;
            if ($j > 1 && $j < 9) {
                $j = '0' . $j;
            }

            foreach ($dept as $dt) {
                $date = $dt["date"];
                $dat = explode('/', $date);
                if ($j == $dat["0"] && $years == $dat["2"]) {
                    $tot += $dt["price"];

                }
            }
            array_push($tabf, $tot);
            $tot = 0;
        }
        return $tabf;


    }


    public static function update($idde, $price, $date, $idbc, $idType)
    {
        $pdo = Connection::getConnection()->getpdo();
        try {

            $query = "UPDATE `depense` set price= :price,date=:date,idbc=:idbc,idType=:idType 
                     where idde=:idde";
            $stmt = $pdo->prepare($query);
            $stmt->bindValue(':idde', $idde);
            $stmt->bindValue(':price', $price);
            $stmt->bindValue(':date', $date);
            $stmt->bindValue(':idbc', $idbc);
            $stmt->bindValue(':idType', $idType);


            if ($stmt->execute()) {
                return 1;

            } else {
                return 0;

            }

        } catch (Exception $e) {
            return -1;

        }
    }

    public static function add($price, $date, $idbc, $idtype)
    {
        $pdo = Connection::getConnection()->getpdo();
        $arra = array();
        try {

            $query = "INSERT INTO `depense` (date,price,idbc,idType) 
                   VALUES (:date,:price,:idbc,:idtype)";
            $stmt = $pdo->prepare($query);
            $stmt->bindValue(':price', $price);
            $stmt->bindValue(':date', $date);
            $stmt->bindValue(':idbc', $idbc);
            $stmt->bindValue(':idtype', $idtype);


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
            $query = 'DELETE  from `depense` where idde= :id';
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
            $query = 'select idde,date,price,idbc,idType from `depense` where idde= :id LIMIT 0,1';
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

    public static function getbyBc($idbc)
    {
        $pdo = Connection::getConnection()->getpdo();
        $arra = array();
        try {
            $query = 'select idde,date,price,nom from depense d , typere t  where idbc= :id and t.idType = d.idType';
            $stmt = $pdo->prepare($query);
            $stmt->bindValue(':id', $idbc);

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