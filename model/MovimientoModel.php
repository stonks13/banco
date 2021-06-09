<?php
require_once ('../db/DBManager.php');
require_once ('../model/cliente.php');
require_once ('../model/cuenta.php');
function transfer($origen, $destino, $cantidad)
{
    $manager = new DBManager();
    try {
        $sql="select saldo from cuenta where id=:origen;";
        $stmt= $manager->getConexion()->prepare($sql);
        $stmt->bindParam(':origen',$origen);
        $stmt->execute();
        if($stmt->saldo<$cantidad){
            return "INVALIDO NO HAY FONDOS";
        }else {

            $sql = "INSERT INTO movimientos (id_origen,id_destino,fecha,cantidad) VALUES (:origen,:destino,now(),:cantidad);";
            $stmt = $manager->getConexion()->prepare($sql);
            $stmt->bindParam(':origen', $origen);
            $stmt->bindParam(':destino', $destino);
            $stmt->bindParam(':cantidad', $cantidad);
            $stmt->execute();


            $sql = "UPDATE cuenta SET saldo = saldo - :cantidad WHERE id=:origen;";
            $stmt = $manager->getConexion()->prepare($sql);
            $stmt->bindParam(':origen', $origen);
            $stmt->bindParam(':cantidad', $cantidad);
            $stmt->execute();

            $sql = "UPDATE cuenta SET saldo = saldo + :cantidad WHERE id=:destino;";
            $stmt = $manager->getConexion()->prepare($sql);
            $stmt->bindParam(':destino', $destino);
            $stmt->bindParam(':cantidad', $cantidad);
            $stmt->execute();

            $manager->cerrarConexion();
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function getMovimientos($cuenta)
{
    $manager = new DBManager();
    try {
        $sql = "SELECT * FROM movimientos WHERE id_origen=:cuenta or id_destino=:cuenta;";
        $stmt = $manager->getConexion()->prepare($sql);
        $stmt->bindParam(':cuenta', $cuenta);
        $stmt->execute();
        $rt = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $manager->cerrarConexion();
        return $rt;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

?>

