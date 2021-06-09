<?php
require_once ('../db/DBManager.php');
require_once ('../model/cliente.php');
require_once ('../model/cuenta.php');

function getLastId()
{
    $manager = new DBManager();
    try {
        $sql = "SELECT id FROM cuenta ORDER BY id DESC limit 1";
        $stmt = $manager->getConexion()->prepare($sql);
        $stmt->execute();
        $rt = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $manager->cerrarConexion();
        if (sizeof($rt) > 0) {
            return $rt[0]['id'];
        } else {
            return 0;
        }


    } catch (PDOException $e) {
        echo $e->getMessage();
    }

}
function getUserId($dni)
{
    $manager = new DBManager();
    try {
        $sql = "SELECT id FROM cliente WHERE dni=:dni";
        $stmt = $manager->getConexion()->prepare($sql);
        $stmt->bindParam(':dni', $dni);
        $stmt->execute();
        $rt = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $manager->cerrarConexion();
        return $rt[0]['id'];
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
function createAccount($user)
{

    $manager = new DBManager();
    $rt = null;
    try {
        $lastId = getLastId() + 1;
        $len = strlen($lastId);
        $iban = '';
        for ($i = 1; $i < 24 - $len; $i++) {
            $iban .= '0';
        }
        $iban .= $lastId;
        $id_cliente = getUserId($user);
        $sql = "INSERT INTO cuenta (id_cliente,saldo,creacion) VALUES (:id_cliente,0,now())";
        $stmt = $manager->getConexion()->prepare($sql);
        $stmt->bindParam(':id_cliente', $id_cliente);
        $stmt->execute();
        $manager->cerrarConexion();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
function getSaldo($cuenta)
{
    $manager = new DBManager();
    try {
        $sql = "SELECT saldo FROM cuenta WHERE id=:cuenta";
        $stmt = $manager->getConexion()->prepare($sql);
        $stmt->bindParam(':cuenta', $cuenta);
        $stmt->execute();
        $rt = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $manager->cerrarConexion();
        return $rt[0]['saldo'];
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
function getAccounts($dni){
    $manager = new DBManager();
    try {
        $sql = "SELECT * FROM cuenta WHERE id_cliente=:id_cliente";
        $stmt = $manager->getConexion()->prepare($sql);
        $id_cliente=getUserId($dni);
        $stmt->bindParam(':id_cliente',$id_cliente);
        $stmt->execute();
        $rt = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $manager->cerrarConexion();
        return $rt;

    }catch(PDOException $e){
        echo $e->getMessage();
    }

}
function existeCuenta($cuenta){
    $manager = new DBManager();
    try {
        $sql = "SELECT * FROM cuenta WHERE id=:cuenta";
        $stmt = $manager->getConexion()->prepare($sql);
        $stmt->bindParam(':cuenta',$cuenta);
        $stmt->execute();
        $rt = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $manager->cerrarConexion();

        if (count($rt)>0){
            return true;
        }else{
            return false;
        }
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

?>

